<?php

Yii::import('application.models._base.BaseUser');

/**
 * @method bool uploadImage($currentImage = null, $getInstance = 'image')
 * @method string getOrigImage($absolute = false)
 * @method string getThumbImage($absolute = false)
 * @method string getNormalImage($absolute = false)
 * @method string imgPath($type, $absolute = false)
 * @method bool batchResize($source)
 */
class User
  extends BaseUser
{
	const ADMIN = 1;

	const MEMBER = 2;

	const STAFF = 3;

	const STATUS_ACTIVE = 1;

	const STATUS_NEED_TO_CONFIRM = 2;

	public $old_password,$new_password,$repeat_new_password;

	public $confirm_password;

	public $i_agree;

	public $day;

	public $month;

	public $year;

	public $sortBy;

	public $review_list;

	public $filterCategoryId;

	public $sortReviewBy;

	public $filterInputs = array();

	/*
	 * birthday format date('j/n/Y)
	 */
	/**
	 * @param string $className
	 * @return User
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);

	}

	public function rules(){
		return CMap::mergeArray(parent::rules(),array(
					array('email','email'),
					array('email','unique'),
					array('password,confirm_password','required','on' => 'register'),
					array('password, ','required','on' => 'social'),
					array('firstname,lastname','required','message' => '*Required','on' => 'register'),
					array('i_agree','required','message' => 'You need to agree Term of use','on' => 'register'),
					array('password','length','min' => 5,'on' => 'register'),
					array('password','length','min' => 5,'on' => 'social'),
					array('image','file','types' => 'jpg, gif, png, jpeg','allowEmpty' => true),
					array('old_password, new_password, repeat_new_password','required','on' => 'change_password'),
					array('password','compare','compareAttribute' => 'confirm_password','on' => 'register'),
					array('password','compare','compareAttribute' => 'confirm_password','on' => 'add_password'),
					array('last_login, create_date, firstname, lastname, update_date, birthday, delete_date, confirm_password, i_agree, day, month, year','safe'),
		  ));

	}

	public function defaultScope(){
		$a = $this->getTableAlias(false,false);
		return array(
				  'condition' => "$a.is_deleted = 0",
		);

	}

	public function behaviors(){
		return array(
				  'ImageBehavior' => array(
							'class' => 'application.components.ImageBehavior',
							'thumb_width' => 65,
							'thumb_height' => 65,
							'normal_width' => 125,
				  ),
				  'CTimestampBehavior' => array(
							'class' => 'zii.behaviors.CTimestampBehavior',
							'createAttribute' => 'create_date',
							'updateAttribute' => 'update_date',
				  ),
				  'SoftDeleteBehavior' => array(
							'class' => 'SoftDeleteBehavior',
				  )
		);

	}

	/**
	 * @param $phrase
	 * @param null $salt
	 * @return string hashed value
	 */
	public function hashPassword($phrase,$salt = null){
		//define('SALT_LENGTH', 5);
		$key = '-K*{wf|@9K9j5?d+ -:11ii<}ZM?PO!96';
		if($salt == "")
			$salt = substr(hash('sha512',$key),0,5);
		else
			$salt = substr($salt,0,5);

		return hash('sha512',$salt . $key . $phrase);

	}

	/**
	 * @return bool
	 */
	protected function beforeSave(){
		if($this->password && ($this->scenario === "create" || $this->scenario === "change_password" || $this->scenario === "register" || $this->scenario === "add_password" || $this->scenario === "forgot_password" || $this->scenario === "social")){
			$this->password = $this->hashPassword($this->password);
		}

		if($this->isNewRecord){
			$this->auth_token = $this->getToken();
		}
		$this->birthday = $this->day . '/' . $this->month . '/' . $this->year;
		return parent::beforeSave();

	}

	protected function beforeValidate(){
		parent::beforeValidate();
		if(($this->day != '') && ($this->month != '') && ($this->year != '')){
			$this->birthday = $this->day . '/' . $this->month . '/' . $this->year;
		}
		return parent::beforeValidate();

	}

	protected function afterFind(){
		parent::afterFind();
		$days = explode('/',$this->birthday);
		$this->day = (isset($days[0]) && $days[0] != '') ? $days[0] : NULL;
		$this->month = (isset($days[1]) && $days[1] != '') ? $days[1] : NULL;
		$this->year = (isset($days[2]) && $days[2] != '') ? $days[2] : NULL;

		return true;

	}

	/**
	 * @return array
	 */
	public function getRolesType(){
		return array(
				  self::ADMIN => "Admin",
				  self::STAFF => "Staff",
				  self::MEMBER => "Member",
		);

	}

	/**
	 * @return array
	 */
	public function getCreateRolesType(){
		return array(
				  self::ADMIN => "Admin",
				  self::STAFF => "Staff",
		);

	}

	public function getCreateRolesTypeAdmin(){
		if(Yii::app()->user->isAdmin)
			return array(
					  self::ADMIN => "Admin",
					  self::STAFF => "Staff",
			);
		else
			return array(
					  self::STAFF => "Staff",
			);

	}

	/**
	 * @return null
	 */
	public function getRoleName(){
		$type = $this->getRolesType();
		return (isset($type[$this->role])) ? $type[$this->role] : null;

	}

	/**
	 * getter method to get the fullname
	 * concatenated by firstname and lastname
	 * @return string
	 */
	public function getDisplayName($full_name = true){
		if($full_name)
			return $this->firstname . ' ' . $this->lastname;
		else
			return $this->firstname . ' ' . substr(trim($this->lastname),0,1) . '.';

	}

	/**
	 * Search user by role
	 * @param array $role
	 * @return CActiveDataProvider
	 */
	public function searchByRole($role = array()){
		$criteria = new CDbCriteria;

		$criteria->addNotInCondition('id',array(Yii::app()->user->id));
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->addInCondition('role',$role);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this,array(
					'criteria' => $criteria,
		  ));

	}

	/**
	 * get Gender list M and F
	 * @return array
	 */
	public function getGenderList(){
		return array(
				  'Male' => 'Male',
				  'Female' => 'Female'
		);

	}

	/**
	 * validate password on=>change_password
	 * @return bool
	 */
	public function validatePassword(){
		$return = true;
		if($this->hashPassword($this->old_password) != $this->password){
			$return = false;
			$this->addError('old_password','Old password is incorrect!');
		}

		if($return){
			$this->password = $this->new_password;
		}

		return $return;

	}

	/**
	 * Format the login date time
	 * @return null|string
	 */
	public function formatLastLogin(){
		return ($this->last_login) ? date("m/d/Y h:i A",strtotime($this->last_login)) : null;

	}

	/**
	 * check the role of the user
	 * @static
	 * @param $id
	 * @param $role
	 * @return bool
	 * @throws CHttpException
	 */
	public static function inRole($id,$role){
		$model = User::model()->findByPk($id);

		if(!$model){
			throw new CHttpException(400,Yii::t('app','Invalid user id.'));
		}
		return ((int)$model->role === $role) ? true : false;

	}

	/**
	 * generate token key
	 * @param string $type
	 * @param int $len
	 * @return int|string
	 */
	public function getToken($type = 'token',$len = 32){
		return Util::generateToken($type,$len);

	}

	/**
	 * get user in role
	 * @static
	 * @param array $roles
	 * @return array|mixed|null
	 */
	public static function getUserInRole($roles = array()){
		$criteria = new CDbCriteria();
		$criteria->addInCondition('role',$roles);
		$criteria->addNotInCondition('id',array(Yii::app()->user->id));
		$models = User::model()->findAll($criteria);

		return $models;

	}

	public function getStatusList($prompt = false){
		if($prompt){
			$statuses = array(
					  '' => '-- ALL --',
					  self::STATUS_ACTIVE => "YES",
					  self::STATUS_NEED_TO_CONFIRM => "NO",
			);
		}else{
			$statuses = array(
					  self::STATUS_ACTIVE => "YES",
					  self::STATUS_NEED_TO_CONFIRM => "NO",
			);
		}
		return $statuses;

	}

	/**
	 * get status name
	 * @return null
	 */
	public function getStatusName(){
		$name = $this->getStatusList();
		return (isset($name[$this->status])) ? $name[$this->status] : null;

	}

	/**
	 * get status button for gridview
	 * @return null|string
	 */
	public function getStatusNameButton(){
		if(!$this->getStatusName()){
			return null;
		}

		$button = "";
		switch($this->status){
			case self::STATUS_ACTIVE:
				$button .= '<span class="label label-success disable">';
				break;
			case self::STATUS_NEED_TO_CONFIRM :
				$button .= '<span class="label disable">';
				break;
		}

		$button .= $this->getStatusName() . '</span>';

		return $button;

	}

	public function afterRemoveRelations(){
		Yii::import('application.modules.hybridauth.models.*');
		$count = HaLogin::model()->deleteAllByAttributes(array('userId' => $this->id));
		return true;

	}

	/*
	 * GENERATE STRING WITH $n lenght
	 *
	 */
	public function generatePassword($n = 6){
		return substr(hash('sha512',rand()),0,$n);

	}

	/**
	 * is the email is confirm
	 * @param $user_id
	 * @return bool
	 */
	public function needToConfirmEmail(){
		return ((int)$this->status == self::STATUS_NEED_TO_CONFIRM) ? true : false;

	}

	public function sinceDate(){
		return date('F y',strtotime($this->create_date));

	}

	public function getFollower(){
		$criteria = new CDbCriteria();
		$criteria->with = 'user';
		$criteria->addCondition('following_id=:following_id');
		$criteria->addCondition('user.is_deleted=:status');
		$criteria->params = array(
			':following_id' => $this->id,
			':status' => 0
		);


		$follow = Follow::model()->findAllByAttributes(array('following_id' => $this->id));
		return $follow;
	}

	public function getFollowing(){
		$follow = Follow::model()->findAllByAttributes(array('follower_id' => $this->id));
		return $follow;

	}

	public function getReviewList(CDbCriteria $criteria,$page_size = 10){

		if($this->filterCategoryId){
			$criteria->addCondition('t.product_id IN (SELECT product_id FROM `product` WHERE category_id=:category_id)');
			$criteria->params[':category_id'] = $this->filterCategoryId;
		}
		$total = count($this->reviewProducts);
		if($total <= $page_size){
			$page_size = $total;
		}
		$review_list = new CPagination($total);
		$review_list->pageSize = $page_size;
		$review_list->applyLimit($criteria);
		$this->review_list = $review_list;
		$models = ReviewProduct::model()->findAll($criteria);
		return $models;

	}

	public function reviewList(){
		switch($this->sortReviewBy):
			case Product::RECENTLY_ADDED:
				$criteria = $this->sortReviewByLatesCriteria();
				break;
			case Product::TOP_RATED:
				$criteria = $this->sortReviewByRatingCriteria("DESC");
				break;
			case Product::BOTTOM_RATED:
				$criteria = $this->sortReviewByRatingCriteria("ASC");
				break;
			case Product::MOST_HELPFUL:
				$criteria = $this->sortReviewByHelpfullCriteria();
				break;
			default:
				$criteria = $this->sortReviewByRatingCriteria();
		endswitch;
		$models = $this->getReviewList($criteria);

		return $models;

	}

	/*
	 * Went user confirm the email set all review active
	 */
	public function setReviewToActive(){
		foreach($this->reviewProducts as $review){
			$review->status = ReviewProduct::STATUS_PUBLISHED;
			$review->save(false);
		}

	}

	public function getLeaderBoard(){
		$review_count = count($this->reviewProducts);
		$helpful_count = 0;
		foreach($this->reviewProducts as $review){
			$helpful_count += count($review->findHelpful);
		}

		$count = $helpful_count + $review_count;

		return $count;

	}

	public function checkFollwing($follower_id,$following_id){
		$criteria = new CDbCriteria();
		$criteria->condition = 'follower_id=:follower_id AND following_id=:following_id';
		$criteria->params = array(
				  ':follower_id' => $follower_id,
				  ':following_id' => $following_id
		);
		$follow = Follow::model()->find($criteria);
		return $follow;

	}

	public function sortReviewByLatesCriteria(){

		$criteria = new CDbCriteria();
		$criteria->condition = 't.user_id = :user_id AND t.is_deleted=0';
		$criteria->params = array(
				  ':user_id' => $this->id,
		);
		$criteria->order = 'create_date DESC';
		return $criteria;

	}

	public function sortReviewByRatingCriteria($sort = 'DESC'){
		$criteria = new CDbCriteria();
		$criteria->select = 't.* ,AVG(rpc.rating) AS top_rated, COUNT(vr.id) AS most_helpfull';
		$criteria->join = "LEFT JOIN `review_product_component` AS rpc ON t.id = rpc.review_product_id";
		$criteria->join .= " LEFT JOIN `view_review` AS vr ON t.id = vr.review_product_id";
		$criteria->group = "t.id";
		$criteria->order = "top_rated " . $sort . ", most_helpfull DESC, create_date DESC";
		$criteria->condition = 't.user_id = :user_id AND t.is_deleted=0';
		$criteria->params = array(
				  ':user_id' => $this->id,
		);
		return $criteria;

	}

	public function sortReviewByHelpfullCriteria(){
		$criteria = new CDbCriteria();
		$criteria->select = 't.* ,COUNT(vr.id) AS most_helpfull';
		$criteria->join = "LEFT JOIN `view_review` AS vr ON t.id = vr.review_product_id";
		$criteria->group = "t.id";
		$criteria->order = "most_helpfull DESC, t.create_date DESC";
		$criteria->condition = 't.user_id = :user_id AND t.is_deleted=0';
		$criteria->params = array(
				  ':user_id' => $this->id,
		);
		return $criteria;

	}

	public function getComments(){
		$comments = ReviewComment::model()->findAll(array(
				  'condition' => "user_id = $this->id",
				  'order' => "create_date DESC"
		  ));

		return $comments;

	}

	public function getReviews($category_id = 0,$sort_by){
		$criteria = new CDbCriteria();
		$criteria->addCondition('t.user_id=:user_id AND t.is_deleted = 0');
		$criteria->order = 't.update_date DESC';
		$criteria->params = array(
				  ':user_id' => $this->id
		);
		if($category_id > 0){
			$criteria->with = array('product');
			$criteria->together = true;
			$criteria->addCondition('product.category_id = :category_id');
			$criteria->params[':category_id'] = $category_id;
		}
		switch($sort_by):
			case Product::RECENTLY_ADDED:
				$criteria->order = 't.update_date DESC';
				break;
			case Product::TOP_RATED:
				$criteria->select = 't.* ,AVG(rpc.rating) AS top_rated';
				$criteria->join = "LEFT JOIN `review_product_component` AS rpc ON t.id = rpc.review_product_id";
				$criteria->group = "t.id";
				$criteria->order = "top_rated DESC, t.create_date DESC";
				break;
			case Product::MOST_HELPFUL:
				$criteria->select = 't.* ,COUNT(vr.id) AS most_helpfull';
				$criteria->join = "LEFT JOIN `view_review` AS vr ON t.id = vr.review_product_id";
				$criteria->group = "t.id";
				$criteria->order = "most_helpfull DESC, t.create_date DESC";
				break;
			default:
				$criteria->order = 't.update_date DESC';
		endswitch;
		if(Yii::app()->user->id != $this->id){
			$criteria->addCondition('t.status=:status');
			$criteria->params[':status'] = ReviewProduct::STATUS_PUBLISHED;
		}
		$review = ReviewProduct::model()->findAll($criteria);

		return $review;

	}


}