<?php

/**
 * ForgotForm class.
 * ForgotForm is the data structure for keeping
 *
 */
class ForgotForm extends CFormModel
{
	public $email;

	public $user;

	public $new_password;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('email', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('email', 'checkExistEmail'),
		);

	}

	public function checkExistEmail($attribute, $params)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'email = :email AND role=:member';
		$criteria->params = array(
			':email' => $this->email,
			':member' => User::MEMBER
		);
		if (!($this->user = User::model()->find($criteria))) {
			$this->addError('email', 'Email not found in our system.');
		}

	}

	public function changePassword()
	{
		if ($this->user instanceof User) {
			$this->user->scenario = 'forgot_password';
			$this->new_password = $this->user->generatePassword();
			$this->user->password = $this->new_password;
			return $this->user->save(false);
		}
	}

	public function beforeValidate()
	{
		$user = User::model()->findByAttributes(array("email" => $this->email));

		if (parent::beforeValidate()) {
			if ($user && $user->needToConfirmEmail()) {
				$this->addError('email', 'You need to confirm the email first!');
				return false;

			}
			return true;
		}
		return false;

	}

}