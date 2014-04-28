<?php

class m130724_123441_add_store_table extends CDbMigration
{
	public function up()
	{

		$this->execute('DROP table IF EXISTS `store`');
        if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('store',array(
			'id'=>'pk',
			'name'=>'varchar(100) NOT NULL',
            'image'=>'varchar(100) NOT NULL',
			'is_deleted'=>'tinyint(1) NOT NULL DEFAULT 0',
			'delete_date'=>'datetime',
			'create_date'=>'datetime',
			'update_date'=>'datetime',
		),$options);
	}

	public function down()
	{
		echo "m130724_123441_add_store_table does not support migration down.\n";
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