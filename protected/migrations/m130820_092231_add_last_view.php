<?php

class m130820_092231_add_last_view extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('last_view',array(
			'id'=>'pk',
			'user_id'=>'int(11) NOT NULL',
			'review_product_id'=>'int(11) NOT NULL',
			'create_date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_last_view_user_id','last_view','user_id','user','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_last_view_review_id','last_view','review_product_id','review_product','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130820_092231_add_last_view does not support migration down.\n";
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