<?php

class m130806_083844_add_combine_category extends CDbMigration
{
	public function up()
	{
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('combine',array(
			'id'=>'pk',
			'name'=>'varchar(255) NOT NULL',
			'create_date'=>'datetime',
			'update_Date'=>'datetime',
		),$options);

		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('combine_category',array(
			'id'=>'pk',
			'category_id'=>'int(11) NOT NULL',
			'combine_id'=>'int(11) NOT NULL',
		),$options);

		$this->addForeignKey('fk_category_combine_1','combine_category','category_id','category','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_category_combine_2','combine_category','combine_id','combine','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130806_083844_add_combine_category does not support migration down.\n";
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