<?php

Yii::import('application.models._base.BaseReviewProduct');

class ReviewProduct
  extends BaseReviewProduct
{
	const STATUS_PUBLISHED = 1;

	const STATUS_UNPUBLISHED = 2;

	public $newRatingAttributes = array();

	public $isValidRatingAttributes = false;

	public $attributes;

	//count new comment and new helpful
	  public $comment_count,$helpful_count;

	public static function model($className = __CLASS__){
		return parent::model($className);

	}

	public function rules(){
		return CMap::mergeArray(parent::rules(),array(
					//array('attributes,text','required'),
					array('text','required'),
					array('user_id','checkExists','on'=>'create'),
		  ));

	}

	public function checkExists($attribute){
		$data = null;
		 if(Yii::app()->user->id){
			 $criteria = new CDbCriteria();
			 $criteria->addCondition('product_id=:product_id AND user_id = :user_id');
			 $criteria->params = array(
				  ':user_id'=>Yii::app()->user->id,
				  ':product_id'=>$this->product_id
		  );
		  $data = $this->find($criteria);
		 }
		 if($data){
			$this->addError($attribute,'You have already review this product.');
			return false;
		 }

	}

	public function attributeLabels(){
		return CMap::mergeArray(parent::attributeLabels(),array(
					"text" => "Review Summary",
		  ));

	}

	public function relations(){
		return CMap::mergeArray(parent::relations(),array(
					'reviewRatingSum' => array(self::STAT,'ReviewProductComponent','review_product_id','select' => 'SUM(rating)'),
					//'reviewRatingCount' => array(self::STAT,'ReviewProductComponent','review_product_id','select' => 'count(*)'),
					'reviewRatingCount' => array(self::STAT,'ReviewProductComponent','review_product_id','select' => 'count(*)','condition'=>'rating !=""'),
					'findHelpful' => array(self::HAS_MANY,'ViewReview','review_product_id','condition' => 'status=' . ViewReview::STATUS_HELPFUL),
		  ));

	}

	public function behaviors(){
		return array(
				  'CTimestampBehavior' => array(
							'class' => 'zii.behaviors.CTimestampBehavior',
							'createAttribute' => 'create_date',
							'updateAttribute' => 'update_date',
				  			'setUpdateOnCreate'=>true
				  ),
				  'SoftDeleteBehavior' => array(
							'class' => 'SoftDeleteBehavior',
				  )
		);

	}

	public function defaultScope(){
		$a = $this->getTableAlias(false,false);
		return array(
				  'condition' => "$a.is_deleted = 0",
		);

	}

	public function scopes(){
		return array(
				  'published' => array(
							'condition' => $this->tableAlias . '.status=:status',
							'params' => array(
									  ':status' => self::STATUS_PUBLISHED,
							)
				  ),
		);

	}

	/**
	 * @return bool
	 */
	public function beforeSave(){
		if(parent::beforeSave()){
			if($this->isNewRecord){
				$user = User::model()->findByPk($this->user_id);
				if(!$user->needToConfirmEmail()){
					$this->status = self::STATUS_PUBLISHED;
				}else{
					$this->status = self::STATUS_UNPUBLISHED;
				}
			}
			return true;
		}
		return false;

	}

	/**
	 * @return bool
	 */
	public function afterSave(){
		if(parent::beforeSave()){
			if($this->scenario == 'update'){
				$this->removeComments();
				$this->removeHelpful();
			}
			return true;
		}
		return false;

	}

	public function removeComments(){
		return ReviewComment::model()->deleteAllByAttributes(array('review_id' => $this->id));

	}

	public function removeHelpful(){
		return ViewReview::model()->deleteAllByAttributes(array('review_product_id' => $this->id,'status' => ViewReview::STATUS_HELPFUL));

	}

	public function process(){
		if($this->isValidRatingAttributes){
			$this->attributes = true;
		}

	}

	public function getComponent(){
		if(!$this->product){
			return array();
		}

		return $this->product->getComponents();

	}

	public function setRatingAttributes($values){
		$this->isValidRatingAttributes = false;

		
		if($this->isNewRecord){
			foreach($values as $value){

				$model = new ReviewProductComponent();
				$model->setAttributes($value);
				$model->isValid = $model->validate(array('rating'));
				//$this->isValidRatingAttributes &= $model->isValid;
				$this->newRatingAttributes[] = $model;
				if($value['rating'] != "" && $this->isValidRatingAttributes === false){
					$this->isValidRatingAttributes = true;
					
				}
			}
		}else{
			
			foreach($values as $value){
				// new record but don't have key.
				if(!isset($value['id'])){
					continue;
				}
				$model = ReviewProductComponent::model()->findByPk($value["id"]);
				// the model is to be deleted. assign toDelete = true
				if(!$value['rating'] && !$value['component_id']){
					$model->toDelete = true;
					$this->newRatingAttributes[] = $model;
				}else{
					$model->setAttributes($value);
					$model->isValid = $model->validate(array('rating','component_id'));
					//$this->isValidRatingAttributes &= $model->isValid;
					$this->newRatingAttributes[] = $model;
				}
			}
		}
		
	}

	public function saveRatingAttributes(){
		foreach($this->newRatingAttributes as $attribute){
			/* @var $attribute ReviewProductComponent */
			$attribute->review_product_id = $this->id;
			$attribute->save(false);
			/**commented by Denis may be will  be recommeted
			/**if($attribute->toDelete === false && $attribute->isValid === true){
				$attribute->review_product_id = $this->id;
				$attribute->save(false);
			}else{
				$attribute->delete();
			}*/
		}

	}

	public function loadReviewComponent(){
		$components = ReviewProductComponent::model()->findAllByAttributes(array("review_product_id" => $this->id));

		return $components;

	}

	public function getAvgRating(){
		$result = 0;
		if($this->reviewRatingSum && $this->reviewRatingCount){
			$result = round($this->reviewRatingSum / $this->reviewRatingCount,1);
		}
		return $result;

	}

	public function getOverall(){
		$result = 0;
		if($this->reviewRatingSum && $this->reviewRatingCount){
			$result = (int)$this->reviewRatingSum / (int)$this->reviewRatingCount;
		}
		return $result;

	}

	public function reviewProductForActivityPage($left_side = true){
		$count = count($this->reviewProductComponents);
		$half = round($count / 2 - 1);
		$min = array();
		$max = array();
		foreach($this->reviewProductComponents as $key => $value){
			if($key <= $half){
				$min[] = $value;
			}else{
				$max[] = $value;
			}
		}

		return ($left_side) ? $min : $max;

	}

	public function getCommentForActivityPage($user_id){
		$count = count($this->reviewComments);
		if($count < 1){
			return null;
		}

		$is_user = false;
		foreach($this->reviewComments as $comment){
			if($comment->user_id === $user_id){
				$is_user = true;
			}
		}
		$count_user = $count - 1;
		$str = "<span>$count comments</span>";
		$str_user = "<span>Your comments and $count_user others</span>";

		return ($is_user) ? $str_user : $str;

	}

	public function getHelpfulForActivityPage($user_id){
		$count = count($this->findHelpful);
		if($count < 1){
			return null;
		}

		$is_user = false;
		foreach($this->findHelpful as $comment){
			if($comment->user_id === $user_id){
				$is_user = true;
			}
		}

		$count_user = $count - 1;
		$str = "$count People found helpful";
		$str_user = "You and $count_user People found helpful";

		return ($is_user) ? $str_user : $str;

	}

	public function getTextForCommentAndHelpful($user_id){
		$arr = array();
		$comment = $this->getCommentForActivityPage($user_id);
		$helpful = $this->getHelpfulForActivityPage($user_id);

		if($comment){
			$arr[] = $comment;
		}

		if($helpful){
			$arr[] = $helpful;
		}

		$str = implode(" | ",$arr);

		return $str;

	}

	public function getTextRow($holder_div){
		$pattern = '/<p>.*?<\/p>/';
		preg_match_all($pattern,$this->text,$matches);
		$string = null;
		$string_hide = null;
		$return = null;
		if(count($matches[0]) > 3){
			for($i = 0; $i < 3; $i++){

				if($i === 2){
					$string .= substr($matches[0][$i],0,-4) . '<span class="long_text_comma_holder" data-id="show">...</span </p>';
				}else{
					$string .= $matches[0][$i];
				}
			}
			for($i = 3; $i <= count($matches[0]) - 1; $i++){
				$string_hide .= $matches[0][$i];
			}
			$return = $string . $holder_div . $string_hide . '</div>';
		}

		return $return;

	}

	public function getShortDescription($len){
		$holder_div = '<div class="long_text_holder">';
		$row = $this->getTextRow($holder_div);
		if($row){
			return $row;
		}
		if(strlen($this->text) > $len){
			return substr($this->text,0,$len) . $holder_div . substr($this->text,$len) . '</div>';
		}else{
			return $this->text;
		}

	}

	public function getLastFourComment(){
		$four = 4;
		$criteria = new CDbCriteria();
		$criteria->condition = 'review_id = :review_id';
		$criteria->params = array(
				  ':review_id' => $this->id
		);
		$criteria->order = 'create_date ASC';
		$count = count($this->reviewComments);
		$offset = $count - $four;
		if($four > $count){
			$four = $count;
			$offset = 0;
		}
		$criteria->limit = $four;
		$criteria->offset = $offset;

		$comments = ReviewComment::model()->findAll($criteria);
		return $comments;

	}

	public function getCommentCountText($comm_count){
		$comment_count = $comm_count - 4;
		$text = 'View ';
		$text .= ($comment_count > 1) ? $comment_count . ' more comments' : $comment_count . ' more comment';
		return $text;

	}

	public function getReviewCommentProvider($four){
		$criteria = new CDbCriteria();
		$criteria->condition = 'review_id = :review_id AND is_deleted = 0';
		$criteria->params = array(
				  ':review_id' => $this->id
		);
		$criteria->order = 'create_date ASC';
		if($four > 0){
			$count = count($this->reviewComments);
			$offset = $count - $four;
			if($four > $count){
				$four = $count;
				$offset = 0;
			}
			$criteria->limit = $four;
			$criteria->offset = $offset;
		}
		$comments = ReviewComment::model()->findAll($criteria);
		$dataProvider = new CArrayDataProvider($comments,array(
					'id' => 'review_comments',
					'sort' => array(
							  'attributes' => array(
										'create_date'
							  ),
					),
					'pagination' => array(
							  'pageSize' => count($this->reviewComments),
					),
		  ));
		return $dataProvider;

	}

	public function showComboText(){
		$string = '';
		$result = array();
		if(count($this->reviewComments) > 0){
			if(count($this->reviewComments) === 1){
				$result[] = count($this->reviewComments) . " comment";
			}else{
				$result[] = count($this->reviewComments) . " comments";
			}
		}

		if(count($this->findHelpful) > 0){
			$result[] = count($this->findHelpful) . " found helpful";
		}

		$string = implode(" | ",$result);

		return $string;

	}

}