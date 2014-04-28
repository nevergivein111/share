<?php

class m130730_085215_add_review_product extends CDbMigration
{
	public function up()
	{
		$this->execute('DROP table IF EXISTS `review_product`');
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('review_product',array(
			'id'=>'pk',
			'user_id' => 'int(11) NOT NULL',
			'product_id' => 'int(11) NOT NULL',
			'title'=>'varchar(100) NOT NULL',
			'pros'=>'text NULL',
			'cons'=>'text NULL',
			'create_date'=>'datetime',
			'update_date'=>'datetime',
			'is_deleted'=>'tinyint(1) NOT NULL DEFAULT 0',
			'delete_date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_review_user','review_product','user_id','user','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_review_product','review_product','product_id','product','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130730_085215_add_review_product does not support migration down.\n";
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