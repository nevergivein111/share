<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array(
			'email' => $this->username,
		));

		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if ($user->hashPassword($this->password) != $user->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $user->getPrimaryKey();
			$this->errorCode = self::ERROR_NONE;
			$user->last_login = date('Y-m-d H:i:s');
			$user->save(false);
		}
		return !$this->errorCode;
	}

	public function authenticateSocial()
	{
		$user = User::model()->findByAttributes(array(
			'email' => $this->username,
		));

		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else {
			$this->_id = $user->getPrimaryKey();
			$this->errorCode = self::ERROR_NONE;
			$user->last_login = date('Y-m-d H:i:s');
			$user->save(false);
		}
		return !$this->errorCode;
	}

	/**
	 * Replace the original Yii::app()->user->id with the PK (not the username, it can be called from Yii::app()->user->name)
	 * @return int PK of the user
	 */
	public function getId()
	{
		return $this->_id;
	}
}