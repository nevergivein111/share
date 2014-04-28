<?php

class TopTrendingController extends GxController
{
	public $layout = 'column1';

	public function actionIndex(){
		$model = new Product();
		if(!Yii::app()->session['new_filter'] && !isset($_GET['page'])){
			Yii::app()->session['sort_by'] = Product::RESENT_VIEW;
			Yii::app()->session['cat_id'] = 0;
		}
	
		Yii::app()->session['new_filter'] = false;
		
		$model->sort_by     = Yii::app()->session['sort_by'];
	    $model->category_id = Yii::app()->session['cat_id'];
		
		$topTrending = new TopTrending();
		$topTrending->user_id = Yii::app()->user->id;
		
		$this->render('index',array(
			'model' => $model,
			'topTrending' => $topTrending
		));

	}

	public function actionList(){
		if(isset($_POST['cat_id']) && isset($_POST['sort_by']) && Yii::app()->request->isAjaxRequest){
			Yii::app()->session['cat_id'] = $_POST['cat_id'];
			Yii::app()->session['sort_by'] = $_POST['sort_by'];
			Yii::app()->session['new_filter'] = true;
			echo CJSON::encode(array('success' => true));
			Yii::app()->end();
		}else{
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}

	}

}

?>
