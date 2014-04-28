<?php

class WebUser
  extends CWebUser
{
	public $loginUrl = array('/admin/login');

	public $model;
	/**
	 * Check if the user is super admin
	 * @return bool
	 */
	public function getIsAdmin(){
		$user = $this->loadUser($this->id);
		return ($user !== null && $user->role == User::ADMIN) ? true : false;
	}

	/**
	 * Check if the user is super admin
	 * @return bool
	 */
	public function getIsStaff(){
		$user = $this->loadUser(+$this->id);
		return ($user !== null && $user->role == User::STAFF) ? true : false;

	}

	/**
	 * @param $id user primary key
	 * @return CActiveRecord|null
	 */
	protected function loadUser($id){
		return User::model()->findByPk($id);

	}

	public function getUserInfo(){
			return $this->loadUser($this->id);
	}

}

class UserRoles
{
	/**
	 * Used to display roles in drop-down etc
	 * @return array
	 */
	public static function get(){
		$a = new ReflectionClass(__CLASS__);
		$res = $a->getConstants();
		$return = array();
		foreach($res as $key => $val)
			$return[$val] = Yii::t('app',$key);

		return $return;

	}

}