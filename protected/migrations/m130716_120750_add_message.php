<?php

class m130716_120750_add_message extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('message',array(
			'id'=>'pk',
			'user_id'=>'int(11) NOT NULL',
			'subject'=>'varchar(100) NOT NULL',
			'message'=>'text NOT NULL',
			'status'=>'TINYINT(1) NOT NULL',
			'create_date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_user','message','user_id','user','id','CASCADE','CASCADE');

	}

	public function down()
	{
		echo "m130716_120750_add_message does not support migration down.\n";
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