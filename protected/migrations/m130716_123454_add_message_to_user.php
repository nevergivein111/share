<?php

class m130716_123454_add_message_to_user extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('message_to_user',array(
			'id'=>'pk',
			'user_id'=>'int(11) NOT NULL',
			'message_id'=>'int(11) NOT NULL',
			'status'=>'TINYINT(1) NULL',
		),$options);

		$this->addForeignKey('fk_user_message','message_to_user','user_id','user','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_message_to_user','message_to_user','message_id','message','id','CASCADE','CASCADE');

	}


	public function down()
	{
		echo "m130716_123454_add_message_to_user does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}