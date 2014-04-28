<?php
class TopTrending extends Social
{
	const PEOPLE_YOU_ARE_FOLLOWING_FEEDS_COUNT = 5;

	/**
	 * overwrite getHeaderText in Social
	 * @param ReviewProduct $model
	 * @param string $type
	 * @param int $key
	 * @return string
	 */
	public function getHeaderText($model, $type, $key){
		$username = ($model->user->id != Yii::app()->user->id)?$model->user->getDisplayname():'You';
		
		if($type == 'update'){
			$text = $username.' updated his review of the '.$model->product->name;
		}else{
			$text = $username.' reviewed the '.$model->product->name;
		}

		return $text;
	}
}
