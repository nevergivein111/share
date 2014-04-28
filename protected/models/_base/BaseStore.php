<?php

/**
 * This is the model base class for the table "store".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Store".
 *
 * Columns in table "store" available as properties of the model,
 * followed by relations of table "store" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $is_deleted
 * @property string $delete_date
 * @property string $create_date
 * @property string $update_date
 *
 * @property StoreProductInfo[] $storeProductInfos
 */
abstract class BaseStore extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'store';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Store|Stores', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, image', 'required'),
			array('is_deleted', 'numerical', 'integerOnly'=>true),
			array('name, image', 'length', 'max'=>100),
			array('delete_date, create_date, update_date', 'safe'),
			array('is_deleted, delete_date, create_date, update_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, image, is_deleted, delete_date, create_date, update_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'storeProductInfos' => array(self::HAS_MANY, 'StoreProductInfo', 'store_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'image' => Yii::t('app', 'Image'),
			'is_deleted' => Yii::t('app', 'Is Deleted'),
			'delete_date' => Yii::t('app', 'Delete Date'),
			'create_date' => Yii::t('app', 'Create Date'),
			'update_date' => Yii::t('app', 'Update Date'),
			'storeProductInfos' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('is_deleted', $this->is_deleted);
		$criteria->compare('delete_date', $this->delete_date, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('update_date', $this->update_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}