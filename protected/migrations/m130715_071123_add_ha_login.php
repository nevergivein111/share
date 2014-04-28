<?php

class m130715_071123_add_ha_login extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('ha_logins',array(
			'id'=>'pk',
			'userId'=>'int(11) NULL',
			'name'=>'int(11) NOT NULL',
			'loginProvider'=>'varchar(50) NOT NULL',
			'loginProviderIdentifier'=>'varchar(100) NOT NULL',
		),$options);

		//$this->addForeignKey('FK_ha_logins','ha_logins','userId','user','id','CASCADE','CASCADE');

	}

	public function down()
	{
		echo "m130715_071123_add_ha_login does not support migration down.\n";
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