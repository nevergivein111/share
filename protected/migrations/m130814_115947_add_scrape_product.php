<?php

class m130814_115947_add_scrape_product extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('scrape_product',array(
			'id'=>'pk',
			'category_id'=>'int(11) NOT NULL',
			'site_category_id'=>'varchar(50) NOT NULL',
			'url'=>'text NOT NULL',
			'attribute'=>'text NULL',
			'create_date'=>'datetime',
			'update_Date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_scrape_product_category','scrape_product','category_id','category','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130814_115947_add_scrape_product does not support migration down.\n";
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