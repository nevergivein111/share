<?php

class HelpfulController extends GxController
{
	public function actionProcess()
	{
		$request = Yii::app()->request;
		$review_id = $request->getParam('review_id');
		$result = array();
		if (!$review_id) {
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		}

		$model = ViewReview::model()->findByAttributes(array(
			'user_id' => Yii::app()->user->id,
			'review_product_id' => $review_id,
		));

		if ($model) {
			$result['count'] = $this->removeHelpful($model);
		} else {
			$result['count'] = $this->saveHelpful($review_id);
		}

		echo CJSON::encode($result);
	}

	public function saveHelpful($review_id)
	{
		$model = new ViewReview();
		$model->status = ViewReview::STATUS_HELPFUL;
		$model->user_id = Yii::app()->user->id;
		$model->review_product_id = $review_id;
		$model->save(false);
		return $this->getCountHelpful($review_id);
	}

	public function removeHelpful($model)
	{
		$model->delete();
		return $this->getCountHelpful($model->review_product_id);
	}

	public function getCountHelpful($review_id)
	{
		$models = ViewReview::model()->countByAttributes(array(
			'review_product_id' => $review_id,
		));

		return $models;
	}

}

?>
