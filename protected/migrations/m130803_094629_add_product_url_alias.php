<?php

class m130803_094629_add_product_url_alias extends CDbMigration
{
	public function up()
	{
		$sql  = 'SELECT `id`,`name` FROM `product`';
		$data = Yii::app()->db->createCommand($sql)->queryAll();
		foreach($data as $item){
			$alias = $this->generateAlias($item['name']);
			$insert ='UPDATE `product` set alias="'.$alias.'"  WHERE id='.$item['id'];
			$this->execute($insert);
		}
	}

	public function down()
	{
		echo "m130803_094629_add_product_url_alias does not support migration down.\n";
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