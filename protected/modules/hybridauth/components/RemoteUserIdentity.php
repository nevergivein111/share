<?php

class RemoteUserIdentity extends CBaseUserIdentity {

	public $id;
	public $userData;
	public $username;
	public $loginProvider;
	public $loginProviderIdentifier;
	private $_adapter;
	private $_hybridAuth;

	/**
	 * @param string The provider you are using
	 * @param Hybrid_Auth $hybridAuth instance of Hybrid_Auth
	 */
	public function __construct($provider,Hybrid_Auth $hybridAuth) {
		$this->loginProvider = $provider;
		$this->_hybridAuth = $hybridAuth;
	}

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		if (strtolower($this->loginProvider) == 'openid') {
			if (!isset($_GET['openid-identity'])) {
				throw new Exception('You chose OpenID but didn\'t provide an OpenID identifier');
			} else {
				$params = array( "openid_identifier" => $_GET['openid-identity']);
			}
		} else {
			$params = array();
		}
		
		$adapter = $this->_hybridAuth->authenticate($this->loginProvider,$params);
		
		$profile = $adapter->getUserProfile();
		$identifier = $profile->identifier;
		$user_info = User::model()->find("email = :email", array(':email' => $profile->email));
		
		if( !empty( $user_info->id ) ) {
			$ha_info = HaLogin::model()->find("userId = :user_id and loginProvider = :loginProvider", array(":user_id" =>$user_info->id, ":loginProvider"=>$this->loginProvider) );
			if ( !isset($ha_info->userId) ) {
				$model  = new HaLogin;
				$model->loginProvider = $this->loginProvider;
				$model->loginProviderIdentifier = $identifier;
				$model->userId = $user_info->id;
				$model->save();
			}
		}
				
		if ($adapter->isUserConnected()) {
			$this->_adapter = $adapter;
			$this->loginProviderIdentifier = $this->_adapter->getUserProfile()->identifier;

			$user = HaLogin::getUser($this->loginProvider, $this->loginProviderIdentifier);
			if ($user == null) {
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			} else {
				$this->id = $user->id;
				$this->username = $user->email;
				$this->errorCode = self::ERROR_NONE;
			}
			return $this->errorCode == self::ERROR_NONE;
		}
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string the username of the user record
	 */
	public function getName() {
		return $this->username;
	}
	
	/**
	 * Returns the Adapter provided by Hybrid_Auth.  See http://hybridauth.sourceforge.net
	 * for details on how to use this
	 * @return Hybrid_Provider_Adapter adapter
	 */
	public function getAdapter() {
		return $this->_adapter;
	}
}