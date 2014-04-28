<?php

/**
 * This is the model base class for the table "review_product".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ReviewProduct".
 *
 * Columns in table "review_product" available as properties of the model,
 * followed by relations of table "review_product" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property string $text
 * @property integer $status
 * @property string $create_date
 * @property string $update_date
 * @property integer $is_deleted
 * @property string $delete_date
 *
 * @property ReviewComment[] $reviewComments
 * @property Product $product
 * @property User $user
 * @property ReviewProductComponent[] $reviewProductComponents
 * @property ViewReview[] $viewReviews
 */
abstract class BaseReviewProduct extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'review_product';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ReviewProduct|ReviewProducts', $n);
	}

	public static function representingColumn() {
		return 'text';
	}

	public function rules() {
		return array(
			array('user_id, product_id', 'required'),
			array('user_id, product_id, status, is_deleted', 'numerical', 'integerOnly'=>true),
			array('text, create_date, update_date, delete_date', 'safe'),
			array('text, status, create_date, update_date, is_deleted, delete_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, user_id, product_id, text, status, create_date, update_date, is_deleted, delete_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'reviewComments' => array(self::HAS_MANY, 'ReviewComment', 'review_id'),
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'reviewProductComponents' => array(self::HAS_MANY, 'ReviewProductComponent', 'review_product_id'),
			'viewReviews' => array(self::HAS_MANY, 'ViewReview', 'review_product_id'),
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
			'product_id' => null,
			'text' => Yii::t('app', 'Text'),
			'status' => Yii::t('app', 'Status'),
			'create_date' => Yii::t('app', 'Create Date'),
			'update_date' => Yii::t('app', 'Update Date'),
			'is_deleted' => Yii::t('app', 'Is Deleted'),
			'delete_date' => Yii::t('app', 'Delete Date'),
			'reviewComments' => null,
			'product' => null,
			'user' => null,
			'reviewProductComponents' => null,
			'viewReviews' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('product_id', $this->product_id);
		$criteria->compare('text', $this->text, true);
		$criteria->compare('status', $this->status);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('update_date', $this->update_date, true);
		$criteria->compare('is_deleted', $this->is_deleted);
		$criteria->compare('delete_date', $this->delete_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}