<?php

class ReviewProductController
  extends GxController
{
	public $layout = 'column1';

	public function filters(){
		return array(
		  //'accessControl',
		);

	}

	public function accessRules(){
		return array(
				  array('allow',
							'actions' => array('view','component'),
							'users' => array('@'),
				  ),
		);

	}

	public function actionView($id){

		$this->render('view',array(
				  'review' => $this->loadModel($id,'ReviewProduct'),
		));

	}

	public function actionCreate(){
		$model = new ReviewProduct;
		$product_id = Yii::app()->request->getParam('product_id');
		if($product_id)
			$model->product_id = $product_id;
		$component = new ReviewProductComponent();
		$login = new LoginForm();
		$user = new User();
		$user->scenario = "register";

		$this->ajaxValidation($user);


		if(isset($_POST['ReviewProduct'])){
			
			if($_POST['ReviewProduct']['id'] > 0){
				$model = ReviewProduct::model()->findByPk($_POST['ReviewProduct']['id']);
				$model->scenario = 'update';
			}else{
				$model->scenario = 'create';
			}
			$model->setAttributes($_POST['ReviewProduct']);
			$model->user_id = Yii::app()->user->id;

			if(isset($_POST['Component'])){
				$model->setRatingAttributes($_POST["Component"]);
			}
			$model->process();
			
			
			if($model->validate()){
				if ($model->isValidRatingAttributes === false){
					$model->addError('rating', 'One attribute must be marked');
				}
					if (!$model->hasErrors()){
					$model->save(false);
					$model->saveRatingAttributes();
	
					if(Yii::app()->getRequest()->getIsAjaxRequest())
						Yii::app()->end();
					else
						$this->redirect(array('profile/' . $model->user_id . '#' . $model->id));
					}
			}elseif(isset($model->errors['user_id'])){
				if ($model->isValidRatingAttributes === false){
					$model->addError('rating', 'One attribute must be marked');
				}
				$review = ReviewProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'product_id'=>$model->product_id));
				$this->redirect(Yii::app()->createUrl('reviewProduct/update',array('id'=>$review->id)));
			}else {
				if ($model->isValidRatingAttributes === false){
					$model->addError('rating', 'One attribute must be marked');
				}
			}
		}

		$this->render('create',array(
				  'model' => $model,
				  'component' => $component,
				  'user' => $user,
				  'login' => $login,
		));

	}
	
	public function actionWriteReview()
	{
		$this->render('writeReview');
	}

	public function actionUpdate($id){
		if(!Yii::app()->user->id){
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}else{
			$model = $this->loadModel($id,'ReviewProduct');
			if(Yii::app()->user->id != $model->user_id){
				throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
			}
			$model->scenario = 'update';
			$component = $model->loadReviewComponent();
			$login = new LoginForm();
			$user = new User();
			if(isset($_POST['ReviewProduct'])){
				if($_POST['ReviewProduct']['id'] > 0){
					$model = ReviewProduct::model()->findByPk($_POST['ReviewProduct']['id']);
					$model->scenario = 'update';
				}else{
					$model->scenario = 'create';
				}
				$model->setAttributes($_POST['ReviewProduct']);
				$model->user_id = Yii::app()->user->id;
				
				if(isset($_POST['Component'])){
					$model->setRatingAttributes($_POST["Component"]);
				}
				$model->process();
				
				if($model->validate()){
					$model->save(false);
					$model->saveRatingAttributes();
				
					if(Yii::app()->getRequest()->getIsAjaxRequest())
						Yii::app()->end();
					else
						$this->redirect(array('profile/' . $model->user_id . '#' . $model->id));
				}elseif(isset($model->errors['user_id'])){
					$review = ReviewProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'product_id'=>$model->product_id));
					$this->redirect(Yii::app()->createUrl('reviewProduct/update',array('id'=>$review->id)));
				}
				
				
				/*
				$model->setAttributes($_POST['ReviewProduct']);

				if(isset($_POST['Component'])){
					$model->setRatingAttributes($_POST["Component"]);
				}

				if($model->validate(array('text'))){
					$model->save(false);
					$model->saveRatingAttributes();
					$this->redirect(array('profile/' . $model->user_id . '#' . $model->id));
				}*/
			}

			$this->render('create',array(
					  'model' => $model,
					  'component' => $component,
					  'user' => $user,
					  'login' => $login,
			));
		}

	}

	public function actionDelete($id){
		    $model = $this->loadModel($id,'ReviewProduct');
			
			if(Yii::app()->user->id != $model->user_id){
				throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
			}
		$model->delete();
		if(!Yii::app()->getRequest()->getIsAjaxRequest())
			$this->redirect(Yii::app()->request->urlReferrer);
		else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}
	public function actionDeleteRev(){
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
		}else{
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
		}

		    $model = $this->loadModel($id,'ReviewProduct');

			if(Yii::app()->user->id != $model->user_id){
				throw new CHttpException(400,Yii::t('app','Your request is invalid.'));
			}
			
		$model->delete();
		if(Yii::app()->getRequest()->getIsAjaxRequest()){
			echo CJSON::encode(array('success'=>true));
			Yii::app()->end();
		}
			
		else
			throw new CHttpException(400,Yii::t('app','Your request is invalid.'));

	}

	public function actionComponent(){
		$id = Yii::app()->request->getParam('id');
		if(Yii::app()->user->id){
			$model = Product::userReviewd($id,Yii::app()->user->id);
			if($model){
				$component = $model->loadReviewComponent();
				$s = $this->renderPartial('shared/_update_component',array('model' => $model,'component' => $component),true,true);
				$text =$model->text;
				echo CJSON::encode(array('success'=>true,'comp'=>$s,'text'=>$text,'id'=>$model->id));
				Yii::app()->end();
			}
		}
		$model = new ReviewProduct();
		$model->product_id = $id;
		$component = new ReviewProductComponent();	
		$s = $this->renderPartial('shared/_component',array('model' => $model,'component' => $component),true,true);
		$text = '';
		echo CJSON::encode(array('success'=>true,'comp'=>$s,'text'=>$text,'id'=>NULL));
		Yii::app()->end();

	}

	public function actionupdateComponent(){
		$id = Yii::app()->request->getParam('id');
		$component = new ReviewProductComponent();
		$model = ReviewProduct::model()->findByPk($id);
		$component = $model->loadReviewComponent();
		$this->renderPartial('shared/_update_component',array('model' => $model,'component' => $component)
		);
	}

	public function actionValidate(){
		$result = array();
		$model = new ReviewProduct;

		if(isset($_POST['ReviewProduct'])){
			$model->setAttributes($_POST['ReviewProduct']);

			if(isset($_POST['Component'])){
				$model->setRatingAttributes($_POST["Component"]);
			}
			$model->process();

			if($model->validate()){
				$result['status'] = true;
			}else{
				if(isset($model->errors['product_id'])){
					$result['errors'][] = $model->errors['product_id'][0];
				}
				if(isset($model->errors['attributes'])){
					$result['errors'][] = $model->errors['attributes'][0];
				}

				if(isset($model->errors['text'])){
					$result['errors'][] = $model->errors['text'][0];
				}

				if(count($model->errors) == 1 && isset($model->errors['user_id'])){
					$result['status'] = true;
				}else{
					$result['status'] = false;
				}
			}
		}

		echo CJSON::encode($result);

	}

	public function actionReviewOfTheDay()
	{
		$categories = Category::model()->showCategory()->published()->orderByOrdering()->findAll();

		$this->render('review-of-the-day', array(
			'categories' => $categories
		));
	}

	protected function ajaxValidation($model){
		// if it is ajax validation request
		if(isset($_POST['ajax'])){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

	}

}