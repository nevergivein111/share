<?php

class m130718_132750_add_message_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('message',"message_id","int(11) NULL AFTER id");
		$this->addForeignKey('fk_message_id','message','message_id','message','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m130718_132750_add_message_field does not support migration down.\n";
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