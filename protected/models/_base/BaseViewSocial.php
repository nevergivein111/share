<?php

/**
 * This is the model base class for the table "view_social".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ViewSocial".
 *
 * Columns in table "view_social" available as properties of the model,
 * followed by relations of table "view_social" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $last_view
 *
 * @property User $user
 */
abstract class BaseViewSocial extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'view_social';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ViewSocial|ViewSocials', $n);
	}

	public static function representingColumn() {
		return 'last_view';
	}

	public function rules() {
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('last_view', 'safe'),
			array('user_id, last_view', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, last_view', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'last_view' => Yii::t('app', 'Last View'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('last_view', $this->last_view, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}