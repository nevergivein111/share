<?php

class m130925_113046_add_table_unique_attribute extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('unique_product_attribute',array(
			'id'=>'pk',
			'category_id'=>'int(11) NOT NULL',
			'name'=>'varchar(255) NOT NULL',
		), $options);

		$this->addForeignKey('fk_unique_product_attribute_category','unique_product_attribute','category_id','category','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130925_113046_add_table_unique_attribute does not support migration down.\n";
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