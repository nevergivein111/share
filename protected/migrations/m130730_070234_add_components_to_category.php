<?php

class m130730_070234_add_components_to_category extends CDbMigration
{
	public function up()
	{
		$this->execute('DROP table IF EXISTS `component`');
		if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('component',array(
			'id'=>'pk',
			'category_id' => 'int(11) NOT NULL',
			'name'=>'varchar(100) NOT NULL',
			'is_deleted'=>'tinyint(1) NOT NULL DEFAULT 0',
			'delete_date'=>'datetime',
			'create_date'=>'datetime',
			'update_date'=>'datetime',
		),$options);

		$this->addForeignKey('fk_category_components','component','category_id','category','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130730_070234_add_components_to_category does not support migration down.\n";
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