<?php

class m130925_062733_adding_filter extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('filter',array(
			'id'=>'pk',
			'category_id'=>'int(11) NOT NULL',
			'name'=>'varchar(255) NOT NULL',
			'create_date'=>'datetime',
		), $options);

		$this->addForeignKey('fk_filter_category','filter','category_id','category','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130925_062733_adding_filter does not support migration down.\n";
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