<?php

class m130704_124622_add_category extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('category',array(
			'id'=>'pk',
			'category_id'=>'int(11) NULL',
			'name'=>'varchar(100) NOT NULL',
			'name_slug'=>'varchar(100) NOT NULL',
			'status'=>'TINYINT(1) NOT NULL',
			'create_date'=>'datetime',
			'update_Date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_category','category','category_id','category','id','CASCADE','CASCADE');

	}

	public function down()
	{
		echo "m130704_124622_add_category does not support migration down.\n";
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