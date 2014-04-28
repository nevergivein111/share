<?php

class m130730_090527_add_review_product_component extends CDbMigration
{
	public function up()
	{
		$this->execute('DROP table IF EXISTS `review_product_component`');
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('review_product_component',array(
			'id'=>'pk',
			'review_product_id' => 'int(11) NOT NULL',
			'component_id'=>'int(11) NOT NULL',
			'rating'=>'varchar(3) NOT NULL',
			'create_date'=>'datetime',
			'update_date'=>'datetime',
			'is_deleted'=>'tinyint(1) NOT NULL DEFAULT 0',
			'delete_date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_review_component_user','review_product_component','review_product_id','review_product','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_review_component_product','review_product_component','component_id','component','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130730_090527_add_review_product_component does not support migration down.\n";
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