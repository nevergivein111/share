<?php

class m130809_073543_add_review_comment extends CDbMigration
{
	public function up()
	{
		 $this->execute('DROP table IF EXISTS `review_comment`');
        if (Yii::app()->db->schema instanceof CMysqlSchema)
			$options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
		else
			$options = '';

		$this->createTable('review_comment',array(
			'id'=>'pk',
			'user_id'=>'int(11) NOT NULL',
            'review_id'=>'int(11) NOT NULL',
            'comment'=>'varchar(5000) NOT NULL',
			'is_deleted'=>'tinyint(1) NOT NULL DEFAULT 0',
			'create_date'=>'datetime',
            'update_date'=>'datetime',
			'delete_date'=>'datetime'
		),$options);

        $this->addForeignKey('fk_reviewId','review_comment','review_id','review_product','id','CASCADE','CASCADE');
        $this->addForeignKey('fk_reviewCommentUserId','review_comment','user_id','user','id','CASCADE','CASCADE');

	}

	public function down()
	{
		echo "m130809_073543_add_review_comment does not support migration down.\n";
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