<?php

class m131008_065608_add_slider_table
  extends CDbMigration
{
	public function up(){
		if(Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('slider',array(
				  'id' => 'pk',
				  'product_id' => 'int(11) NOT NULL',
				  'image' => 'varchar(100) NOT NULL',
				  'status' => 'TINYINT(1) NOT NULL DEFAULT 1',
				  'ordering'=>'int(11) NOT NULL DEFAULT 1',
				  'create_date' => 'datetime',
				  'update_Date' => 'datetime',
		  ),$options);

		$this->addForeignKey('fk_slider_product_id','slider','product_id','product','id','CASCADE','CASCADE');

	}

	public function down(){
		echo "m131008_065608_add_slider_table does not support migration down.\n";
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