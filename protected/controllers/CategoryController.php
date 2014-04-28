<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author User
 */
class CategoryController extends GxController
{
	public $layout = 'column1';

	public function actionIndex()
	{
		$dataProvider = Category::model()->published()->orderByOrdering()->searchCategory(false);
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));

	}

	public function actionView()
	{
		$this->unsetSession();
		$request = Yii::app()->request;
		$name = $request->getParam('name');
		$sub = $request->getParam('subcategory');
		$tab = $request->getParam('tab');

		if (!$tab) {
			$tab = null;
		}

//		if (is_null($tab) || )

		if ($sub)
			$category = Category::model()->findByAttributes(array('alias' => $sub));
		else
			$category = Category::model()->findByAttributes(array('alias' => $name));

		$product = new Product();
		$filter = new Filter;
		$filter->category_id = $category->id;
		$product = $this->filter($product);

		if (isset($_POST['Filter'])) {
			$filter->setAttributes($_POST['Filter']);
			$filter->process();
			$product->filterInputs = $filter->inputs;
			Yii::app()->session['categoryFilter_inputs'] = $filter->inputs;
			if ($filter->sort_by && $filter->sort_by != "") {
				$product->sort_by = $filter->sort_by;
				Yii::app()->session['categoryFilter_sort_by'] = $filter->sort_by;
			}
		}

		$dataProvider = $product->categoryProductList($category->id);

		$this->render('view', array(
			'model' => $category,
			'product' => $product,
			'filter' => $filter,
			'dataProvider' => $dataProvider,
			'tab' => $tab
		));

	}
	public function unsetSession()
	{
		if(!isset($_GET['page'])){
			unset(Yii::app()->session['categoryFilter_sort_by']);
			unset(Yii::app()->session['categoryFilter_inputs']);
		}
	}

	public function filter($product)
	{
		if(isset($_GET['pages'])){
			return $product;
		}

		if(isset(Yii::app()->session['categoryFilter_inputs'])){
			$product->filterInputs = Yii::app()->session['categoryFilter_inputs'];
		}

		if(isset(Yii::app()->session['categoryFilter_sort_by'])){
			$product->sort_by = Yii::app()->session['categoryFilter_sort_by'];
		}

		return $product;
	}
}

?>
