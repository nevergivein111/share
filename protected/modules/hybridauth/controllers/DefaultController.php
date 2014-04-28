<?php

class DefaultController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function registerUser($user)
	{
		if (!isset($_POST['User'])) {
			return $user;
		}
		$user->setAttributes($_POST['User']);
		if ($user->validate()) {
			$user->save(false);
			$user_login = new LoginForm();
			$user_login->password = $_POST['User']['password'];
			$user_login->email = $user->email;
			$user_login->login();
			$this->redirect(Yii::app()->createUrl('category'));
		}

		return $user;
	}

	public function loginIfExist($user)
	{
		$user = User::model()->findByAttributes(array('email'=>$user->email, 'status'=>User::STATUS_ACTIVE));

		if($user){
			$user_login = new LoginForm();
			$user_login->email = $user->email;
			$user_login->loginWithSocial();
			$this->redirect(Yii::app()->createUrl('category'));
		}

	}

	/**
	 * Public login action.  It swallows exceptions from Hybrid_Auth. Comment try..catch to bubble exceptions up.
	 */
	public function actionLogin()
	{
		try {
			if (!isset(Yii::app()->session['hybridauth-ref'])) {
				Yii::app()->session['hybridauth-ref'] = Yii::app()->request->urlReferrer;
			}
			$this->_doLogin();
		} catch (Exception $e) {
			Yii::app()->user->setFlash('hybridauth-error', $e->getMessage());
			$this->redirect(Yii::app()->session['hybridauth-ref'], true);
		}
	}

	/**
	 * Main method to handle login attempts.  If the user passes authentication with their
	 * chosen provider then it displays a form for them to choose their username and email.
	 * The email address they choose is *not* verified.
	 *
	 * If they are already logged in then it links the new provider to their account
	 *
	 * @throws Exception if a provider isn't supplied, or it has non-alpha characters
	 */
	private function _doLogin()
	{

		if (!isset($_GET['provider']))
			throw new Exception("You haven't supplied a provider");

		if (!ctype_alpha($_GET['provider'])) {
			throw new Exception("Invalid characters in provider string");
		}

		$identity = new RemoteUserIdentity($_GET['provider'], $this->module->getHybridauth());

		if ($identity->authenticate()) {
			// They have authenticated AND we have a user record associated with that provider
			if (Yii::app()->user->isGuest) {
				$this->_loginUser($identity);
			} else {
				//they shouldn't get here because they are already logged in AND have a record for
				// that provider.  Just bounce them on
				$this->redirect(Yii::app()->user->returnUrl);
			}
		} else if ($identity->errorCode == RemoteUserIdentity::ERROR_USERNAME_INVALID) {
			// They have authenticated to their provider but we don't have a matching HaLogin entry
			if (Yii::app()->user->isGuest) {
				// They aren't logged in => display a form to choose their username & email
				// (we might not get it from the provider)
				$this->layout = '//layouts/column3';

				$adapter_profile = $identity->adapter->adapter->user->profile;
				$user = new User;
				$user->scenario = "social";
				$user->email = $adapter_profile->email;
				$user->firstname = $adapter_profile->firstName;
				$user->lastname = $adapter_profile->lastName;
				$user->gender = $adapter_profile->gender;
				$user->birthday = sprintf('%s-%s-%s', $adapter_profile->birthYear, $adapter_profile->birthMonth, $adapter_profile->birthDay);
				$user->i_agree = true;
				$user->role = User::MEMBER;
				$user->status = User::STATUS_ACTIVE;

				$this->loginIfExist($user);
				$user = $this->registerUser($user);

				if (!$user->validate()) {
					//Display the form with some entries prefilled if we have the info.
					if (isset($adapter_profile->email)) {
						$user->email = $adapter_profile->email;
					}
				}

				$this->render('createUser', array(
					'user' => $user,
				));
			} else {
				// They are already logged in, link their user account with new provider
				$identity->id = Yii::app()->user->id;
				$this->_linkProvider($identity);
				$this->redirect(array('category'));
				unset(Yii::app()->session['hybridauth-ref']);
			}
		}
	}

	private function _linkProvider($identity)
	{
		$haLogin = new HaLogin();
		$haLogin->loginProviderIdentifier = $identity->loginProviderIdentifier;
		$haLogin->loginProvider = $identity->loginProvider;
		$haLogin->userId = $identity->id;
		$haLogin->save();
	}

	private function _loginUser($identity)
	{
		Yii::app()->user->login($identity, 0);
		$this->redirect(Yii::app()->user->returnUrl);
	}

	/**
	 * Action for URL that Hybrid_Auth redirects to when coming back from providers.
	 * Calls Hybrid_Auth to process login.
	 */
	public function actionCallback()
	{
		require dirname(__FILE__) . '/../Hybrid/Endpoint.php';
		Hybrid_Endpoint::process();
	}

	public function actionUnlink()
	{
		$login = HaLogin::getLogin(Yii::app()->user->getid(), $_POST['hybridauth-unlinkprovider']);
		$login->delete();
		$this->redirect(Yii::app()->getRequest()->urlReferrer);
	}


}