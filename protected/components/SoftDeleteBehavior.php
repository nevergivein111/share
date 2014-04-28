<?php

class SoftDeleteBehavior
  extends CActiveRecordBehavior
{
	/*
	 * image column
	 */
	private $deleted_rels = array('CHasManyRelation');

	public $flagField = 'is_deleted';

	public $deletedDate = 'delete_date';

	public function remove(){
		if($this->flagField !== false){
			$this->getOwner()->{$this->flagField} = 1;
		}
		if($this->deletedDate !== false){
			$this->getOwner()->{$this->deletedDate} = date('Y-m-d H:i:s');
		}
		return $this->getOwner()->save(false);

	}

	public function restore(){
		if($this->flagField !== false){
			$this->getOwner()->{$this->flagField} = 0;
		}
		if($this->deletedDate !== false){
			$this->getOwner()->{$this->deletedDate} = null;
		}

		return $this->getOwner()->save(false);

	}

	public function notRemoved(){
		$criteria = $this->getOwner()->getDbCriteria();
		$criteria->compare($this->flagField,0);
		return $this->getOwner();

	}

	public function removed(){
		$criteria = $this->getOwner()->getDbCriteria();
		$criteria->compare($this->flagField,1);
		return $this->getOwner();

	}

	/**
	 * @return bool
	 */
	public function isRemoved(){
		return (boolean)$this->getOwner()->{$this->flagField};

	}

	public function removeRelations(){
		if(method_exists($this->getOwner(),'beforeRemoveRelations') && !$this->getOwner()->beforeRemoveRelations()){
			return false;
		}

		$relations = $this->getOwner()->relations();

		foreach($relations as $relation => $info){
			if(!in_array($info[0],$this->deleted_rels)){
				continue;
			}
			if(!is_array($this->getOwner()->{$relation})){
				continue;
			}

			foreach($this->getOwner()->{$relation} as $items){
				if(array_key_exists('SoftDeleteBehavior',$items->behaviors())){
					$items->remove();
				}else{
					$items->delete();
				}
			}
		}
		if(method_exists($this->getOwner(),'afterRemoveRelations')){
			$this->getOwner()->afterRemoveRelations();
		}
		return true;

	}

}
