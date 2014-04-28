<?php

class NotificationController extends GxController
{
	public $layout = 'column1';

	public function actionCheck()
	{
		$result = array();

		if(isset($_POST['id'])){
			foreach($_POST['id'] as $id){
				$model = ReviewProduct::model()->findByPk($id);

				foreach($model->reviewComments as $comment){
					$this->comment($comment);
				}

				foreach($model->findHelpful as $view){
					$this->helpful($view);
				}
			}
		}

		$result['status'] = true;
		echo CJSON::encode($result);
	}

	public function comment(ReviewComment $comment){
		if((int)$comment->status === ReviewComment::STATUS_UNCHECKED){
			$comment->status = ReviewComment::STATUS_CHECK;
			$comment->save(false);
		}
	}

	public function helpful(ViewReview $view){
		if((int)$view->status === ViewReview::STATUS_HELPFUL && (int)$view->is_view === ViewReview::IS_VIEW_UNCHECKED){
			$view->is_view = ViewReview::IS_VIEW_CHECK;
			$view->save(false);
		}
	}
}

?>
