<?php

class m130925_065331_filter_value extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('filter_value',array(
			'id'=>'pk',
			'filter_id'=>'int(11) NOT NULL',
			'value'=>'varchar(255) NOT NULL',
		), $options);

		$this->addForeignKey('fk_filter__value_filterl','filter_value','filter_id','filter','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130925_065331_filter_value does not support migration down.\n";
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