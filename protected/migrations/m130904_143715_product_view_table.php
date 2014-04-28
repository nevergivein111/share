<?php

class m130904_143715_product_view_table extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('view_product',array(
			'id'=>'pk',
			'product_id'=>'int(11) NOT NULL',
			'user_id'=>'int(11) NULL',
			'ip'=>'varchar(100) NULL',
			'create_date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_product_view_id','view_product','product_id','product','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_product_view_user_id','view_product','user_id','user','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130904_143715_product_view_table does not support migration down.\n";
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