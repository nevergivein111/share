<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UrlAliasBehavior
 *
 * @author Denis Alexsandrov
 */
class UrlAliasBehavior extends CActiveRecordBehavior
{
	public $aliasField = 'alias';

	//$nameField what will be replaced and set to alias
	public $nameField = 'name';

	/**
	 * Uploads selected image and removes the old one if exist
	 * @param string $getInstance
	 * @param null $currentImage
	 * @return bool
	 */
	protected function generateAlias(){
		$sVar = $this->getOwner()->{$this->nameField};
		if(isset($this->getOwner()->slug)){
			$sVar = $sVar.'-'.$this->getOwner()->slug;
		}
		
		$sDelimiter = '-';
		$sVar = urldecode($sVar);
		$sVar = iconv('UTF-8', 'ASCII//TRANSLIT', $sVar);
		$sVar = preg_replace('/[^a-zA-Z0-9\/_|+ -]/', '', $sVar);
		$sVar = strtolower(trim($sVar,'-'));
		$sVar = preg_replace('/[\/_|+ -]+/', $sDelimiter,$sVar);
		return $sVar;

	}

	public function beforeSave($event){
		parent::beforeSave($event);
		$this->getOwner()->{$this->aliasField} = $this->generateAlias();
		return true;

	}

}

?>
