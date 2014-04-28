<?php

class m130910_121452_view_social_2 extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('view_social',array(
			'id'=>'pk',
			'user_id'=>'int(11) NULL',
			'last_view'=>'datetime',
		),$options);

		$this->addForeignKey('fk_vew_social_user_id','view_social','user_id','user','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130910_121452_view_social_2 does not support migration down.\n";
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