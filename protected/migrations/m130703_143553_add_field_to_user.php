<?php

class m130703_143553_add_field_to_user extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user',"gender","VARCHAR(50) NULL AFTER image");
		$this->addColumn('user',"birthday","VARCHAR(50) NULL AFTER gender");
		$this->addColumn('user',"address","VARCHAR(50) NULL AFTER birthday");
		$this->addColumn('user',"city","VARCHAR(50) NULL AFTER address");
		$this->addColumn('user',"state","VARCHAR(50) NULL AFTER city");
	}

	public function down()
	{
		echo "m130703_143553_add_field_to_user does not support migration down.\n";
		return false;
	}
}