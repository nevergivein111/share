<?php

class ViewReviewController extends GxController
{
	public $layout = 'column1';

	public function actionMore()
	{
		if (!isset($_POST['page'])) {
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		}
		$page = $_POST['page'];
		$data = ViewReview::getFiveRecentView(Yii::app()->user->id, $page);
		$recent_view = $data['models'];
		$page = $data['page'];
		$nextPage = $page + 1;

		$this->renderPartial('_list', array(
			'recent_view' => $recent_view,
			'page' => $nextPage,
		));
	}


	public function actionRelatedProduct()
	{
		if (!isset($_POST['page'])) {
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
		}
		$page = $_POST['page'];
		$data = ViewReview::getFiveRelatedProduct($page);
		$recent_view = $data['models'];
		$page = $data['page'];
		$nextPage = $page + 1;

		$this->renderPartial('_related_product_list', array(
			'recent_view' => $recent_view,
			'page' => $nextPage,
		));
	}
}

?>
