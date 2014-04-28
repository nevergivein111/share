<?php

class ProductController
  extends GxController
{
	public $layout = 'column1';

	public function actionView($name){
		$user = null;
		if(Yii::app()->user->id)
			$user = User::model()->findByPk(Yii::app()->user->id);
		$product = Product::model()->findByAttributes(array('alias' => $name));
		//save product view
		ViewProduct::addView($product,Yii::app()->user->id,Yii::app()->request->userHostAddress);
		$this->render('view',array(
				  'model' => $product,
				  'user' => $user
		));

	}

	public function actionSearch(){
		$results = Product::itemJsonList($_GET['q']);
		echo CJSON::encode($results);
		Yii::app()->end();

	}

	public function actionGetProduct(){
		$result = array();
		$model = Product::model()->findByPk($_POST['id']);

		$result = array($model);
		echo CJSON::encode($result);

	}

	public function actionupdateReviewList(){
		if(Yii::app()->request->isAjaxRequest){
			$user = null;
			if(Yii::app()->user->id){
				$user = User::model()->findByPk(Yii::app()->user->id);
			}
			$request = Yii::app()->request;
			$product_id = $request->getPost('product_id');
			$sort_type = $request->getPost('sortBy');
			$product = Product::model()->findByPk($product_id);
			$product->sortBy = $sort_type;
			$reviews = $product->productReviewList();
			$html = '';
			if(empty($reviews)){
				$html = 'No review found.';
			}else{
				foreach($reviews as $key=>$review):
					$html .= $this->renderPartial("_review_list",array('data' => $review,'user' => $user,'key'=>$key));
				endforeach;
			}
			echo $html;
			Yii::app()->end();
		}

	}

	public function actionUpdateProductList(){
		if(Yii::app()->request->isAjaxRequest){
			$request = Yii::app()->request;
			$sort_type = $request->getPost('sortBy');
			$category_id = $request->getPost('category_id');
			$inputs = $request->getPost('inputs');
			Yii::app()->session['categoryFilter_inputs'] =  $inputs;
			Yii::app()->session['categoryFilter_sort_by'] =  $sort_type;
			$product = new Product;
			$product->sort_by = $sort_type;

			$product->filterInputs = $inputs;
			$products = $product->categoryProductList($category_id);
			$html = '';
			if(empty($products)){
				$html = 'No product found.';
			}else{
				foreach($products as $data):
					$html .= $this->renderPartial("//category/_product_view",array('data' => $data));
				endforeach;
			}
			echo $html;
			Yii::app()->end();
		}

	}

	public function actionFilterTab()
	{
		if(!isset($_POST['inputs'])){

		}

		$request = Yii::app()->request;
		$filter = new Filter;
		$filter->setAttributes($_POST);
		$filter->category_id = $request->getPost('category_id');
		$this->renderPartial("//category/filter/_form",array('filter' => $filter));
	}

	public function filterTab()
	{
		$filter = new Filter;
		$filter->setAttributes($_POST);
		$filter->process();
	}

	public function actionSearchProducts(){
		$request = Yii::app()->request;
		
		$query = $request->getParam('query');
		$empty = array(
				  'pid' => 0,
				  'category' => NULL,
				  'brand' => NULL,
				  'photo' => NULL,
				  'link' => '#',
				  'name' => 'No Product Found',
		);
		
		if($request->isAjaxRequest){
			
			$products = Product::searchProducts($query,7);

			//echo"<pre>";print_r($products);die;
			foreach($products as $key => $val){
				$result[] = array(
						  'pid' => $val->id,
						  'name' => $val->name,
						  'photo' => $val->getNormalImage(false),
						  'category' => $val->subCategory->name,
						  'brand' => $val->brand->name,
						  'link' => Yii::app()->createUrl('product/view',array('name' => $val->alias))
				);
			}
			if(!empty($products)){
				$result[] = array(
						  'pid' => 0,
						  'category' => NULL,
						  'brand' => NULL,
						  'photo' => NULL,
						  'link' => Yii::app()->createUrl('product/searchProducts',array('query' => $query)),
						  'name' => 'See more products',
				);
			}else{
				$result[] = $empty;
			}
			echo CJSON::encode($result);
			Yii::app()->end();
		}else{
			$products = Product::searchProducts($query,0);
			$user = User::model()->findByPk(Yii::app()->user->id);
			$this->render('search',array(
					  'products' => $products,
					  'term' => $query,
					  'filter'=> new Filter()	
			));
		}

	}

}