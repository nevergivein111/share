<?php

Yii::import('application.models._base.BaseMessageToUser');

/**
 * @method MessageToUser replayMessage()
 * @method MessageToUser postMessage()
 */
class MessageToUser extends BaseMessageToUser
{
	const STATUS_NEW = 1;
	const STATUS_NOT_READ = 2;
	const STATUS_READ = 3;
	const STATUS_TRASH = 4;

	/**
	 * @param string $className
	 * @return MessageToUser
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function scopes()
	{
		return array(
			'replayMessage' => array(
				'with' => array('message'),
				'condition' => 'message.message_id IS NOT NULL',
			),
			'postMessage' => array(
				'with' => array('message'),
				'condition' => 'message.message_id IS NULL',
			),
		);

	}

	public function setStatusNotRead()
	{
		$this->status = MessageToUser::STATUS_NOT_READ;
		$this->save(false);
	}

	/**
	 * @param $user_id
	 * @return MessageToUser[]
	 */
	public static function getMessageToCurrentUser($user_id)
	{
		$models = MessageToUser::model()->with(array('message'))->findAll(array(
			"condition" => MessageToUser::model()->getTableAlias() . ".user_id = :user_id AND " . MessageToUser::model()->getTableAlias() . ".status = :status",
			"params" => array(
				':user_id' => $user_id,
				':status' => self::STATUS_NEW,
			),
			"order" => "message.create_date DESC"
		));

		return $models;
	}


	public function getReplayMessages()
	{
		$models = MessageToUser::model()->with(array('message'))->findAll(array(
			'condition' => 'message.message_id = :id OR message.id = :id',
			'params' => array(
				':id' => $this->message_id
			),
			'order' => 'message.create_date ASC',
		));

		return $models;
	}
}