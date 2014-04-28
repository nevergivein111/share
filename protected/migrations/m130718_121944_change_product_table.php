<?php

class m130718_121944_change_product_table extends CDbMigration
{
	public function up()
	{
        $this->execute('DROP table IF EXISTS `product`');
        if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('product',array(
			'id'=>'pk',
			'name'=>'varchar(100) NOT NULL',
            'slug'=>'varchar(100) NOT NULL',
            'image'=>'varchar(100) NOT NULL',
			'description'=>'text NOT NULL',
			'status'=>'TINYINT(1) NOT NULL DEFAULT 1',
			'create_date'=>'datetime',
            'update_date'=>'datetime',
            'category_id'=>'int(11) DEFAULT NULL',
            'sub_category_id'=>'int(11) DEFAULT NULL',
            'brand_id'=>'int(11) DEFAULT NULL',
		),$options);

        $this->addForeignKey('fk_subcategoryId','product','sub_category_id','category','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_categoryId','product','category_id','category','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_brandId','product','brand_id','brand','id','CASCADE','CASCADE');

	}

	public function down()
	{
		echo "m130718_121944_change_product_table does not support migration down.\n";
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