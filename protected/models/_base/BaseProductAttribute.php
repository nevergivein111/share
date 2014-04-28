<?php

/**
 * This is the model base class for the table "product_attribute".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ProductAttribute".
 *
 * Columns in table "product_attribute" available as properties of the model,
 * followed by relations of table "product_attribute" available as properties of the model.
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $key
 * @property string $value
 *
 * @property Product $product
 */
abstract class BaseProductAttribute extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'product_attribute';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ProductAttribute|ProductAttributes', $n);
	}

	public static function representingColumn() {
		return 'key';
	}

	public function rules() {
		return array(
			array('product_id, key, value', 'required'),
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('key', 'length', 'max'=>100),
			array('id, product_id, key, value', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'product_id' => null,
			'key' => Yii::t('app', 'Key'),
			'value' => Yii::t('app', 'Value'),
			'product' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('product_id', $this->product_id);
		$criteria->compare('key', $this->key, true);
		$criteria->compare('value', $this->value, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}