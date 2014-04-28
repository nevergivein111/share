<?php

class m130813_143251_add_store_product_info extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('store_product_info',array(
			'id'=>'pk',
			'product_id'=>'int(11) NOT NULL',
			'store_id'=>'int(11) NOT NULL',
			'price'=>'varchar(100) NOT NULL',
			'url'=>'varchar(255) NOT NULL',
			'create_date'=>'datetime',
			'update_Date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_product_store_id','store_product_info','product_id','product','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_store_product_id','store_product_info','store_id','store','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130813_143251_add_store_product_info does not support migration down.\n";
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