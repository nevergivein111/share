<?php

class m130722_100434_fix_db_design extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('product','description','LONGTEXT NOT NULL');

        if (Yii::app()->db->schema instanceof CMysqlSchema)
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        else
            $options = '';

        $this->createTable('product_attribute',array(
            'id'=>'pk',
            'product_id'=>'INT(11) NOT NULL',
            'key'=>'VARCHAR(100) NOT NULL',
            'value'=>'LONGTEXT NOT NULL',
        ),$options);

        $this->addForeignKey('fk_productAttribute_productId','product_attribute','product_id','product','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130722_100434_fix_db_design does not support migration down.\n";
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