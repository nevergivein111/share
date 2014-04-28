<?php

class m130810_104947_add_follow_table extends CDbMigration
{
	public function up()
	{
		$this->execute('DROP table IF EXISTS `follow`');
        if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('follow',array(
			'id'=>'pk',
			'follower_id'=>'int(11) NOT NULL',
            'following_id'=>'int(11) NOT NULL',
			'create_date'=>'datetime'
         
		),$options);

        $this->addForeignKey('fk_followerId','follow','follower_id','user','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_followingId','follow','following_id','user','id','CASCADE','CASCADE');

	}

	public function down()
	{
		echo "m130810_104947_add_follow_table does not support migration down.\n";
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