<?php

Yii::import('application.models._base.BaseMessage');

class Message extends BaseMessage
{
	const SCENARIO_SEND = 'send';

	public $to;

	/**
	 * @param string $className
	 * @return Message
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);

	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'condition' => "$a.is_deleted = 0",
		);

	}

	/**
	 * @return array
	 */
	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('to', 'required', 'on' => 'send'),
			array('to', 'safe'),
		));

	}

	/**
	 * @return bool
	 */
	public function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->scenario == self::SCENARIO_SEND) {
				$this->status = 1;
			}
			return true;
		}
		return false;

	}

	public function behaviors()
	{
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => null,
			),
			'SoftDeleteBehavior' => array(
				'class' => 'SoftDeleteBehavior',
			)
		);

	}

	/**
	 * save message to user
	 */
	public function saveToUser()
	{
		$model = new MessageToUser();
		$model->user_id = $this->to;
		$model->message_id = $this->id;
		$model->status = MessageToUser::STATUS_NEW;
		$model->save();

	}

	/**
	 * htmlOption for select2
	 * @return array
	 */
	public function getToHtmlOptions()
	{
		$htmlOptions = array(
			'class' => 'span12',
		);

		$htmlOptions['disabled'] = 'disabled';
		return $htmlOptions;

	}

	public function getMultipleHtmlOptions()
	{
		$htmlOptions = array(
			'class' => 'span12',
		);

		$htmlOptions['multiple'] = 'multiple';
		$htmlOptions['placeholder'] = 'Select recipients';

		return $htmlOptions;

	}

	public function getConversationMessage()
	{
		$models = Message::model()->findAll(array(
			'condition' => 'id = :id OR message_id = :id',
			'params' => array(
				':id' => $this->id,
			)
		));

		return $models;

	}

	public function toMessage($user_id)
	{
		$to_user = $this->user->id;
		if ($this->user->id === $user_id) {
			foreach ($this->messageToUsers as $messageToUser) {
				$to_user = $messageToUser->user_id;
			}
		}

		return $to_user;

	}

	public function inbox($user_id)
	{
		$criteria = new CDbCriteria;
		$criteria->join = "LEFT JOIN message_to_user ON t.id = message_to_user.message_id";
		$criteria->condition = 't.message_id IS NULL AND (message_to_user.user_id = :user_id)';
		$criteria->params = array(
			':user_id' => $user_id,
		);

		$criteria->order = 't.create_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

	public function send($user_id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 't.user_id = :user_id AND t.message_id IS NULL';
		$criteria->params = array(
			':user_id' => $user_id,
		);

		$criteria->order = 't.create_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

}