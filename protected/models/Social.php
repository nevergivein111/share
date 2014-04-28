<?php
class Social
{
	public $model;
	public $user_id;

	public function getResult()
	{
		$data = $this->getRow();

		return array(
			'review' => $data['model'],
			'headerText' => $data['headerText'],
		);
	}

	public function getRow($date=null)
	{
		$result = array();
		$user_ids = $this->getFollowedUsers();
		if (!$user_ids) {
			return array(
				'model' => array(),
				'headerText' => array(),
			);
		}


		if($date){
			$view = $this->getLastView();
			if($view){
				$data = $this->query($user_ids, $view->last_view);
			}else{
				$data = $this->query($user_ids);
			}
		}else{
			$data = $this->query($user_ids);
		}
		if(count($data) < 1){
			$result['model'] = array();
			$result['headerText'] = array();
		}
		foreach ($data as $key => $value) {
			$result['model'][$key] = ReviewProduct::model()->findByPk($value['id']);
			$result['headerText'][$key] = $this->getHeaderText($result['model'][$key], $value['TYPE'],$key);
		}

		return $result;
	}

	public function query($users_id, $last_view = null)
	{
		$create_date = null;
		$update_date = null;
		if($last_view){
			$create_date = "AND create_date >= '$last_view'";
			$update_date = "AND update_date >= '$last_view'";
		}

		$sql = "SELECT id, user_id, create_date AS date, 'create' AS TYPE
				FROM review_product
				WHERE user_id IN ($users_id) $create_date

				UNION

				SELECT id, user_id, update_date, 'update' AS TYPE
				FROM review_product
				WHERE user_id IN ($users_id) AND update_date IS NOT NULL $update_date

				ORDER BY date DESC";

		$data = Yii::app()->db->createCommand($sql)->queryAll();
		return $data;

	}

	public function getFollowedUsers()
	{
		$follow = Follow::model()->findAllByAttributes(array('follower_id' => $this->user_id));
		$result = array();

		if (count($follow) < 1) {
			return null;
		}
		foreach ($follow as $value) {
			$result[] = $value->following_id;
		}

		$string = implode(",", $result);
		return $string;
	}

	public function getLastView()
	{
		$view = ViewSocial::model()->findByAttributes(array('user_id'=>$this->user_id));
		return $view;
	}

	public function getCount()
	{
		$data = $this->getRow(date('Y-m-d H:i:s', time()));

		$count = count($data['model']);
		return $count > 0 ? $count : '';
	}

	public function getHeaderText($model, $type,$key){
		$username = ($model->user->id != Yii::app()->user->id)?$model->user->getDisplayname():'You';
		if($type == 'update'){
			$text ="<span class='hglightName'><a href='".Yii::app()->createUrl('profile/view',array('id'=>$model->user->id))."' class='tooltips' id='tooltip_user_$key' title='aaa'>" .$username. "</a></span> has update his review for <span class='hglightProName'  ><a id='atooltip_products_".$key."' style='color:black;' href='".Yii::app()->createUrl('product/view',array('name'=>$model->product->alias))." 'title='aaa' >".$model->product->name."</a></span>";
		}else{
			$text = "<span class='hglightName'><a href='".Yii::app()->createUrl('profile/view',array('id'=>$model->user->id))."' class='tooltips' id='tooltip_user_$key' title='aaa'>" .$username. "</a></span> reviewed the <span class='hglightProName'  ><a id='atooltip_products_".$key."' style='color:black;' href='".Yii::app()->createUrl('product/view',array('name'=>$model->product->alias))." 'title='aaa'>".$model->product->name."</a></span>";
		}

		return $text;
	}

}