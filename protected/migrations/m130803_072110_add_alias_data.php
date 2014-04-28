<?php

class m130803_072110_add_alias_data extends CDbMigration
{
	public function up()
	{
		$sql  = 'SELECT `id`,`name` FROM `category`';
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		foreach($data as $item){
			$alias = $this->generateAlias($item['name']);
			$insert ='UPDATE `category` set alias="'.$alias.'"  WHERE id='.$item['id'];
			$this->execute($insert);
		}
	}

	public function down()
	{
		echo "m130803_072110_add_alias_data does not support migration down.\n";
		return false;
	}

	protected function generateAlias($sVar){
		$sDelimiter = '-';
		$sVar = urldecode($sVar);
		$sVar = iconv('UTF-8', 'ASCII//TRANSLIT', $sVar);
		$sVar = preg_replace('/[^a-zA-Z0-9\/_|+ -]/', '', $sVar);
		$sVar = strtolower(trim($sVar,'-'));
		$sVar = preg_replace('/[\/_|+ -]+/', $sDelimiter,$sVar);
		return $sVar;

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