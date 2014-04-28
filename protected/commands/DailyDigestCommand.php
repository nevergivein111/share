 <?php
class DailyDigestCommand extends CConsoleCommand
{
	public function getHelp(){
		return <<<EOD
	USAGE
	  yiic product run

	DESCRIPTION
	  This command will send daily digest email's to all users .

	PARAMETERS
	  * run: required, trigger to run the digest


EOD;
	}


	public function run($args)
	{

		if(!isset($args[0]))
			$this->usageError('Run trigger needed .');
		if ($args[0]=="run"){
			$this->getUsers();

		}
	}

	public function getUsers()
	{

		$criteria = new CDbCriteria();
		$criteria -> join = "LEFT JOIN useremail AS ue  ON  users.idUser = ue.idUser";
		$criteria->join .= " LEFT JOIN unclaimedjobs AS uj ON uj.Address = ue.Address ";
		$criteria->join .= " LEFT JOIN jobcustomer AS jc ON  uj.idJob = jc.idJob ";
		$criteria -> condition = 'ue.idUser=users.idUser    ';
		//$criteria -> params = array(':user_id'=> Yii::app()->user->id,'allowed'=>self::CONVERSATIONS_ALLOWED);
		//$criteria -> order = ' jc.Added DESC' ;

		//$users = Users::model()->findAll($criteria );
	  	$unclaimedJobs = Unclaimedjobs::model()->findAll($criteria);

		$res = array();
		foreach($unclaimedJobs as $user){
			$res[]= $user->idUser;

		}
		var_dump($res);
		die();


	}




}
