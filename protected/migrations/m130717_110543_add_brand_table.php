<?php

class m130717_110543_add_brand_table extends CDbMigration
{
		public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('brand',array(
			'id'=>'pk',
			'name'=>'varchar(100) NOT NULL',
            'description'=>'varchar(5000) NOT NULL',
			'image'=>'varchar(100)',
			'status'=>'TINYINT(1) NOT NULL default 1',
			'create_date'=>'datetime',
			'update_date'=>'datetime',
		),$options);
	}

	public function down()
	{
		echo "m130717_110543_add_brand_table does not support migration down.\n";
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