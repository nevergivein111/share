<?php

/**
 * This is the model base class for the table "message_to_user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "MessageToUser".
 *
 * Columns in table "message_to_user" available as properties of the model,
 * followed by relations of table "message_to_user" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $message_id
 * @property integer $status
 *
 * @property Message $message
 * @property User $user
 */
abstract class BaseMessageToUser extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'message_to_user';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'MessageToUser|MessageToUsers', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('user_id, message_id', 'required'),
			array('user_id, message_id, status', 'numerical', 'integerOnly'=>true),
			array('status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, message_id, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'message' => array(self::BELONGS_TO, 'Message', 'message_id'),
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
			'message_id' => null,
			'status' => Yii::t('app', 'Status'),
			'message' => null,
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('message_id', $this->message_id);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}