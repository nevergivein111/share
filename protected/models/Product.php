<?php

Yii::import('application.models._base.BaseProduct');

/**
 * @method bool uploadImage($currentImage = null, $getInstance = 'image')
 * @method string getOrigImage($absolute = false)
 * @method string getThumbImage($absolute = false)
 * @method string getNormalImage($absolute = false)
 * @method string imgPath($type, $absolute = false)
 * @method bool batchResize($source)
 */
class Product
	extends BaseProduct
{
	const STATUS_PUBLISHED = 1;

	const STATUS_NOT_PUBLISHED = 2;

	//sort by

	const MOST_POPULAR = 1;

	const RESENT_VIEW = 2;

	const LOWEST_PRICE = 2;

	const HIGHEST_PRICE = 4;
	//sort reviews in product detail  page

	const MOST_HELPFUL = 1;

	const TOP_RATED = 2;

	const BOTTOM_RATED = 4;

	const RECENTLY_ADDED = 3;

	const PAGE_LIMIT = 5;

	public $newProductAttributes = array();

	public $isValidProductAttributes = true;

	//new attribute for filtering products
	public $sort_by;

	public $pages;

	public $review_list;

	public $sortBy;

	public $filterInputs = array();

	public $criteria = array();

	/**
	 * @param string $className
	 * @return Product
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);

	}

	public function rules()
	{
		return CMap::mergeArray(parent::rules(), array(
			array('slug', 'unique'),
			array('brand_id,category_id,sub_category_id', 'required'),
			array('image', 'file', 'types' => 'jpg, gif, png, jpeg', 'allowEmpty' => true),
		));

	}

	public function relations()
	{
		return CMap::mergeArray(parent::relations(), array(
			'reviewCount' => array(self::STAT, 'ReviewProduct', 'product_id', 'select' => 'count(*)', 'condition' => 't.status = ' . ReviewProduct::STATUS_PUBLISHED),
			'allReviewCount' => array(self::STAT, 'ReviewProduct', 'product_id', 'select' => 'count(*)'),
			'lastReview' => array(self::HAS_MANY, 'ReviewProduct', 'product_id', 'order' => 'lastReview.create_date DESC', 'limit' => 1),
		));

	}

	public function behaviors()
	{
		return array(
			'ImageBehavior' => array(
				'class' => 'application.components.ImageBehavior',
				'image_path' => '/../uploads/product',
				'image_url' => '/uploads/product',
				'default_image' => '/images/no-image.jpg',
			),
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'update_date',
			),
			'SoftDeleteBehavior' => array(
				'class' => 'SoftDeleteBehavior',
			),
			'UrlAliasBehavior' => array(
				'class' => 'UrlAliasBehavior',
			)
		);

	}

	public function defaultScope()
	{
		$a = $this->getTableAlias(false, false);
		return array(
			'condition' => "$a.is_deleted = 0",
		);

	}

	public function scopes()
	{
		return array(
			'published' => array(
				'with' => array('category', 'subCategory'),
				'condition' => $this->tableAlias . '.status=:status AND category.status = :status_category AND subCategory.status = :status_category',
				'params' => array(
					':status' => self::STATUS_PUBLISHED,
					':status_category' => Category::STATUS_ACTIVE,
				)
			),
			'notPublished' => array(
				'with' => array('category', 'subCategory'),
				'condition' => $this->tableAlias . '.status=:status AND category.status = :status_category AND subCategory.status = :status_category',
				'params' => array(
					':status' => self::STATUS_NOT_PUBLISHED,
					':status_category' => Category::STATUS_ACTIVE,
				)
			),
		);

	}

	public function attributeLabels()
	{
		return CMap::mergeArray(parent::attributeLabels(), array(
			'sub_category_id' => 'Sub Category',
		));

	}

	public function getStatusList()
	{
		return array(
			self::STATUS_PUBLISHED => "Published",
			self::STATUS_NOT_PUBLISHED => "Not Published",
		);

	}

	public function getStatusName()
	{
		$name = $this->getStatusList();
		return (isset($name[$this->status])) ? $name[$this->status] : null;

	}

	public function getStatusNameButton()
	{
		if (!$this->getStatusName()) {
			return null;
		}

		$button = "";
		switch ($this->status) {
			case self::STATUS_PUBLISHED:
				$button .= '<span class="label label-success disable">';
				break;
			case self::STATUS_NOT_PUBLISHED :
				$button .= '<span class="label disable">';
				break;
		}

		$button .= $this->getStatusName() . '</span>';

		return $button;

	}

	public function getShortDescription()
	{
		$length = strlen($this->description);
		if ($length > 100) {
			$result = substr($this->description, 0, 100) . '...';
		} else {
			$result = $this->description;
		}
		return $result;

	}

	/**
	 * collection inputs
	 * @param $values
	 */
	public function setProductAttributes($values)
	{
		if ($this->isNewRecord) {
			foreach ($values as $value) {
				// there must be value for key
				if (!$value['key']) {
					continue;
				}

				$model = new ProductAttribute();
				$model->setAttributes($value);
				$model->isValid = $model->validate(array('key', 'value'));
				$this->isValidProductAttributes &= $model->isValid;
				$this->newProductAttributes[] = $model;
			}
		} else {
			foreach ($values as $value) {
				// new record but don't have key.
				if (!$value['id'] && !$value['key']) {
					continue;
				}

				$model = ProductAttribute::model()->findByPk($value["id"]);
				if ($model == null) {
					$model = new ProductAttribute();
					$model->product_id = $this->id;
				}
				// the model is to be deleted. assign toDelete = true
				if (!$value['key'] && !$value['value']) {
					$model->toDelete = true;
					$this->newProductAttributes[] = $model;
				} else {
					$model->setAttributes($value);
					$model->isValid = $model->validate(array('key', 'value'));
					$this->isValidProductAttributes &= $model->isValid;
					$this->newProductAttributes[] = $model;
				}
			}
		}

	}

	public function saveProductAttributes()
	{
		foreach ($this->newProductAttributes as $attribute) {
			/* @var $attribute ProductAttribute */
			if ($attribute->toDelete === false && $attribute->isValid === true) {
				$attribute->product_id = $this->id;
				$attribute->save(false);
			} else {
				$attribute->delete();
			}
		}

	}

	public function saveProductAttributesFromBestBuy()
	{
		foreach ($this->newProductAttributes as $attribute) {
			/* @var $attribute ProductAttribute */
			if ($attribute->toDelete === false && $attribute->isValid === true) {
				$attribute->product_id = $this->id;
				$attribute->save(false);
			}
		}

	}

	public function getComponents()
	{
		return $this->subCategory->components;
	}

	public function isPublished()
	{
		if ($this->status == self::STATUS_PUBLISHED && (!$this->isNewRecord))
			return true;
		else
			return false;

	}

	public function getBreadcrumb()
	{
		$breadcrumbs = array(
			$this->category->name => Yii::app()->createUrl('category'),
			$this->subCategory->name => Yii::app()->createUrl('category/view', array('name' => $this->category->alias, 'subcategory' => $this->subCategory->alias)),
			$this->name => Yii::app()->createUrl('product/view', array('name' => $this->alias))
		);

		return $breadcrumbs;

	}

	public function getReviewCountText()
	{
		$reviews_count = ReviewProduct::model()->count("product_id = $this->id AND status = " . self::STATUS_PUBLISHED);
        if ($reviews_count < 1) return 'No reviews';

		$rev_text = ($reviews_count > 1) ? 'Reviews' : 'Review';
		return $reviews_count . ' ' . $rev_text;

	}

	public function getLastReview()
	{
		$time = '';
		if (!empty($this->lastReview)) {
			$time = Additional::TimeAgoFormat($this->lastReview[0]->create_date);
		}
		return $time;

	}

	/**
	 * getStoreLinkFor product admin
	 * @return string
	 */
	public function getStoreLink()
	{
		$arr = array();
		foreach ($this->storeProductInfos as $info) {
			$arr[] = CHtml::link($info->store->name, $info->url) . ' - ' . $info->price;
		}

		$string = implode("<br/>", $arr);

		return $string;

	}

	/**
	 * @return array
	 */
	public function getSortBy()
	{
		return array(
			self::MOST_POPULAR => 'Top Rated',
			self::RESENT_VIEW => 'Most Active',
		);

	}

	public static function getProductListSortBy()
	{
		return array(
			self::MOST_POPULAR => 'Top Rated',
			self::LOWEST_PRICE => 'Lowest Price',
			self::HIGHEST_PRICE => 'Highest Price',
			self::RECENTLY_ADDED => 'Newest',
		);

	}

	public static function getSortReviewBy()
	{
		return array(
			self::TOP_RATED => 'Highest Rating',
			self::BOTTOM_RATED => 'Lowest Rating',
			self::RECENTLY_ADDED => 'Newest',
			self::MOST_HELPFUL => 'Most Helpful',
		);

	}

	public static function getSortReviewProfile()
	{
		return array(
			self::RECENTLY_ADDED => 'Newest',
			self::TOP_RATED => 'Highest Rating',
			self::MOST_HELPFUL => 'Most Helpful',
		);
	}

	public function topTrending()
	{
		$criteria = new CDbCriteria;

		if ($this->category_id > 0) {
			$criteria->addCondition("t.category_id = :category_id");
			$criteria->params = array(
				':category_id' => $this->category_id
			);
		}

		switch ((int)$this->sort_by) {
			case self::MOST_POPULAR:
				$criteria = $this->mostPopularCriteria($criteria);
				break;
			case self::RESENT_VIEW:
				$criteria = $this->resentViewCriteria($criteria);
				break;
			default:
				$criteria = $this->resentViewCriteria($criteria);
		}
		$models = $this->getProductList($criteria);

		return $models;

	}

	public function topRatedCriteriaForProduct(CDbCriteria $criteria)
	{
		$criteria->select = "t.*, COUNT(rp.id) AS count_review, AVG(rpc.rating) AS rating_avg,
			CASE
				WHEN AVG(rpc.rating) > 4.5 THEN 5
				WHEN AVG(rpc.rating) > 4 THEN 4.5
				WHEN AVG(rpc.rating) > 3.5 THEN 4
				WHEN AVG(rpc.rating) > 3 THEN 3.5
				WHEN AVG(rpc.rating) > 2.5 THEN 3
				WHEN AVG(rpc.rating) > 2 THEN 2.5
				WHEN AVG(rpc.rating) > 1.5 THEN 2
				WHEN AVG(rpc.rating) > 1 THEN 1.5
				WHEN AVG(rpc.rating) > 0.5 THEN 1
				WHEN AVG(rpc.rating) > 0 THEN 1
				ELSE 0
			END AS ord1
		";
		$criteria->join .= "LEFT JOIN review_product AS rp ON rp.product_id = t.`id`";
		$criteria->join .= " LEFT JOIN `review_product_component` AS rpc ON rp.id = rpc.review_product_id ";
		$this->criteria['group'][] = "t.id";
		$this->criteria['order'][] = "ord1 DESC, count_review DESC";
		return $criteria;
	}

	public function mostPopularCriteriaForProduct(CDbCriteria $criteria)
	{

		$criteria->select .= ' t.* ,COUNT(rp.id) AS count_review ';
		$criteria->join .= " LEFT JOIN review_product AS rp ON t.id = rp.product_id ";
		$this->criteria['group'][] = "t.id";
		$this->criteria['order'][] = "count_review DESC,t.create_date DESC";
		return $criteria;

	}

	public function lowestPriceCriteriaForProduct(CDbCriteria $criteria)
	{
		$criteria->select .= ' t.*';
		$criteria->join .= " INNER JOIN (SELECT MIN(price) mp, product_id FROM store_product_info GROUP BY product_id) AS min_price ON t.id = min_price.product_id ";
		$this->criteria['group'][] = "t.id";
		$this->criteria['order'][] = "min_price.mp ASC";
		return $criteria;

	}

	public function hightPriceCriteriaForProduct(CDbCriteria $criteria)
	{
		$criteria->select .= ' t.*';
		$criteria->join .= " INNER JOIN (SELECT MIN(price) mp, product_id FROM store_product_info GROUP BY product_id) AS min_price ON t.id = min_price.product_id ";
		$this->criteria['group'][] = "t.id";
		$this->criteria['order'][] = "min_price.mp DESC";
		return $criteria;

	}

	public function mostPopularCriteria(CDbCriteria $criteria)
	{

		$criteria->select = ' t.* ,COUNT(rp.id) AS count_review, AVG(rpc.rating) as rating_avg ';
		$criteria->join .= "  JOIN review_product AS rp ON t.id = rp.product_id ";
		$criteria->join .= "  JOIN review_product_component AS rpc ON rpc.review_product_id = rp.id ";
		$criteria->group = " t.id ";
		$criteria->addCondition(" rp.id IS NOT NULL");
		$criteria->addCondition("rp.status = " . ReviewProduct::STATUS_PUBLISHED);
		$criteria->order = "rating_avg DESC, count_review DESC ";
		return $criteria;

	}

	public function resentViewCriteria($criteria)
	{
		$criteria->select = 't.* ,COUNT(vp.id) AS count_view';
		$criteria->join .= "LEFT JOIN view_product AS vp ON t.id = vp.product_id";
		$criteria->addCondition("vp.create_date >= DATE_SUB(NOW(),INTERVAL 14 DAY)");
		$criteria->group = "t.id";
		$criteria->order = "count_view DESC";
		return $criteria;

	}

	public function getRatingSum()
	{
		$sum = 0;
		foreach ($this->reviewProducts as $review) {
			$sum += $review->getAvgRating();
		}

		return $sum;

	}

	public function getRating()
	{
		if ($this->getRatingSum()) {
			$result = floor($this->getRatingSum() / $this->reviewCount);
		} else {
			$result = 0;
		}
		return $result;

	}

	public function getCriteriaFromArray(CDbCriteria $criteria)
	{
		if (isset($this->criteria['group'])) {
			$criteria->group = implode(", ", $this->criteria['group']);
		}

		if (isset($this->criteria['having'])) {
			$criteria->having = implode(", ", $this->criteria['having']);
		}

		if (isset($this->criteria['order'])) {
			$criteria->order = implode(", ", $this->criteria['order']);
		}

		return $criteria;
	}

	public function getCriteriaForFilterInput(CDbCriteria $criteria)
	{
		if (count($this->filterInputs) === 0) {
			return $criteria;
		}
		$attr = array();
		foreach ($this->filterInputs as $key => $input) {
			if ($key === 'brand') {
				$brand = array();
				foreach ($input as $ke => $va) {
					$brand[] = $ke;
				}
				$criteria->addInCondition('t.brand_id', $brand);
			} else {
				foreach ($input as $k => $v) {
					$attr[$key] = $k;
				}
			}
		}
		$criteria->join = " LEFT JOIN product_attribute AS pa ON pa.product_id = t.id ";
		if (count($attr) > 0) {
			$array_attr_condition = array();
			foreach ($attr as $key => $attribute) {
				$array_attr_condition[] = "(pa.value = '$attribute' AND pa.key='$key')";
			}
			$im = implode(" OR ", $array_attr_condition);
			$criteria->addCondition($im);
			$this->criteria['group'][] = "pa.product_id";
			$this->criteria['having'][] = "COUNT(pa.`product_id`) = " . count($attr);
		}

		return $criteria;
	}

	public function categoryProductList($category_id, $page_size = 10, $publishedOnly = true)
	{
		$criteria = new CDbCriteria();
		$criteria = $this->getCriteriaForFilterInput($criteria);

		if ($category_id > 0) {
			$criteria->addCondition("t.sub_category_id = $category_id OR t.sub_category_id IN (SELECT id from `category` where `combine_category_id` = $category_id)");
		}

		switch ($this->sort_by):
			case self::RECENTLY_ADDED:
				$this->criteria['group'][] = "t.id";
				$this->criteria['order'][] = 't.create_date DESC';
				break;
			case self::MOST_POPULAR:
				$criteria = $this->topRatedCriteriaForProduct($criteria);
				break;
			case self::LOWEST_PRICE:
				$criteria = $this->lowestPriceCriteriaForProduct($criteria);
				break;
			case self::HIGHEST_PRICE:
				$criteria = $this->hightPriceCriteriaForProduct($criteria);
				break;
			default:
				$this->topRatedCriteriaForProduct($criteria);
		endswitch;

		$criteria = $this->getCriteriaFromArray($criteria);
		$models = $this->getProductList($criteria, $page_size, $publishedOnly);

		return $models;

	}

	public function getProductList(CDbCriteria $criteria, $page_size = 10, $publishedOnly = true)
	{
		if($page_size) {
			$total = Product::model()->published()->count($criteria);
			if ($total <= $page_size) {
				$page_size = $total;
			}
			$pages = new CPagination($total);
			$pages->pageSize = $page_size;

			$pages->applyLimit($criteria);
			$this->pages = $pages;
		}
		if($publishedOnly) {
			$models = Product::model()->published()->findAll($criteria);
		} else {
			$models = Product::model()->findAll($criteria);
		}
		return $models;

	}

	public static function itemJsonList($search_name)
	{
		$results = array();
		$criteria = new CDbCriteria();
		$criteria->compare('t.name', $search_name, true);

		$models = Product::model()->published()->findAll($criteria);

		foreach ($models as $model) {
			$results[] = array(
				'id' => $model->id,
				'text' => html_entity_decode($model->name),
				'image' => $model->image,
			);
		}

		return $results;

	}

	public function multiDelete($products)
	{
		foreach ($products as $id) {
			$product = $this->findByPk($id);
			$product->delete();
		}

	}

	public function multiPublish($products, $publish = true)
	{
		foreach ($products as $id) {
			$product = $this->findByPk($id);
			//var_dump(self::STATUS_NOT_PUBLISHED); die();
			if ($publish)
				$product->status = self::STATUS_PUBLISHED;
			else
				$product->status = self::STATUS_NOT_PUBLISHED;
			$product->save(false);
//                        $prod = $this->findByPk($id);
//                        var_dump($prod->status); die();
		}

	}

	public function multiAddtoslide($products)
	{
		$allsliderpics = Slider::model();
		$allcurrentpics = count($allsliderpics->findAll());
		$allnewpics = count($products);
		if ($allcurrentpics == 7) {
			return false;
		}
		else {
			if ($allcurrentpics + $allnewpics > 7) {
				$allnewpics_string = implode(",", $products);
				//$allexistpics = count ($allsliderpics->findAll(array("condition"=>"product_id in  (".$allnewpics_string.")")));
				$Criteria = new CDbCriteria();
				$Criteria->condition = "product_id in  (" . $allnewpics_string . ")";
				$allexistpics = count($allsliderpics->findAll($Criteria));
				if ($allcurrentpics + $allnewpics - $allexistpics > 7) {
					return false;
				}
			}
		}
		foreach ($products as $id) {
			$countpics = count($allsliderpics->findAll(array("condition" => "product_id =  $id")));
			if ($countpics == 0) {
				$product = $this->findByPk($id);
				$slider = new Slider();
				$slider->product_id = $id;
				$slider->image = $product->image;
				$slider->save(false);
			}
		}
		return true;
	}

	public function getHelpfulCount($published = true)
	{
		$sum = 0;
		if (!$published)
			$reviews = $this->reviewProducts;
		else
			$reviews = $this->getPublishedReviews();
		foreach ($reviews as $review) {
			$count = count($review->findHelpful);
			if ($count < 1) {
				$sum += 1;
			} else {
				$sum += count($review->findHelpful);
			}
		}

		return $sum;

	}

	public function getPublishedReviews()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'product_id=:id';
		$criteria->params = array(
			':id' => $this->id
		);
		$reviews = ReviewProduct::model()->published()->findAll($criteria);
		return $reviews;

	}

	public function getOverall($published = true)
	{
		$all_helpful = $this->getHelpfulCount($published);
		if ($all_helpful < 1) {
			$all_helpful = 1;
		}
		$component_sum = 0;
		if (!$published)
			$reviews = $this->reviewProducts;
		else
			$reviews = $this->getPublishedReviews();
		foreach ($reviews as $review) {

			if (count($review->findHelpful) < 1) {
				$review_helpful_count = 1;
			} else {
				$review_helpful_count = count($review->findHelpful);
			}
			foreach ($review->reviewProductComponents as $component) {
				$component_sum += ($review_helpful_count / $all_helpful) * $component->rating;
			}
		}
		$component_count = count($this->subCategory->components);
		if ($component_count < 1) {
			$component_count = 1;
		}
		$sum = $component_sum / $component_count;
		return $sum;

	}

	public function getAvgRatingImageUrl()
	{
		$rate = $this->getOverall();
		if (is_float($rate)) {
			$number = floor($rate);
			$image = $number . 'nhalf.png';
		} else {
			$number = $rate;
			$image = 'star' . $number . '.png';
		}

		$url = Yii::app()->theme->baseUrl . "/images/$image";
		return $url;

	}

	public function getOverallImageUrl()
	{
		if (is_float($this->getOverall())) {
			$number = floor($this->getOverall());
			$image = $number . 'nhalf.png';
		} else {
			$number = ($this->getOverall());
			$image = 'star' . $number . '.png';
		}

		$url = Yii::app()->theme->baseUrl . "/images/$image";
		return $url;

	}

	public function getLastView()
	{
		$viewReview = ViewReview::model()->find(array(
			'join' => 'LEFT JOIN review_product ON review_product.id = t.review_product_id
				   LEFT JOIN product ON product.id = review_product.product_id',
			'condition' => "product.id = $this->id AND t.status = " . ViewReview::STATUS_VIEW,
			'order' => 't.create_date DESC',
			'limit' => 1,
		));

		return ($viewReview) ? $viewReview->create_date : $this->create_date;

	}

	public function getProductReviewList(CDbCriteria $criteria, $page_size = 10)
	{
		$total = count($this->reviewProducts);
		if ($total <= $page_size) {
			$page_size = $total;
		}

		$review_list = new CPagination($total);
		$review_list->pageSize = $page_size;
		$review_list->applyLimit($criteria);
		$this->review_list = $review_list;
		$models = ReviewProduct::model()->published()->findAll($criteria);
		return $models;

	}

	public function productReviewList()
	{
		switch ($this->sortBy):
			case self::RECENTLY_ADDED:
				$criteria = $this->sortReviewByLatesCriteria();
				break;
			case self::TOP_RATED:
				$criteria = $this->sortReviewByRatingCriteria('DESC');
				break;
			case self::BOTTOM_RATED:
				$criteria = $this->sortReviewByRatingCriteria('ASC');
				break;
			case self::MOST_HELPFUL:
				$criteria = $this->sortReviewByHelpfullCriteria();
				break;
			default:
				$criteria = $this->sortReviewByRatingCriteria();
		endswitch;
		$models = $this->getProductReviewList($criteria);
		return $models;

	}

	public function getComponentsRate($component_id)
	{
		$all_helpful = $this->getHelpfulCount(true);
		$component_sum = 0;
		if ($all_helpful < 1) {
			$all_helpful = 1;
		}
		//$reviews = $this->reviewProducts;
		$reviews = $this->getPublishedReviews();
		foreach ($reviews as $review) {
			if (count($review->findHelpful) < 1) {
				$review_helpful_count = 1;
			} else {
				$review_helpful_count = count($review->findHelpful);
			}
			foreach ($review->reviewProductComponents as $component) {
				if ($component_id == $component->component_id) {
					$component_sum += ($review_helpful_count / $all_helpful) * $component->rating;
				}
			}
		}
		return $component_sum;

	}

	public function getComponentRateImage($component_id)
	{
		$rate = $this->getComponentsRate($component_id);
		if (is_float($rate)) {
			$number = floor($rate);
			$image = $number . 'nhalf.png';
		} else {
			$number = $rate;
			$image = 'star' . $number . '.png';
		}

		$url = Yii::app()->theme->baseUrl . "/images/$image";
		return $url;

	}

	public function sortReviewByLatesCriteria()
	{

		$criteria = new CDbCriteria();
		$criteria->condition = 't.product_id = :product_id AND t.is_deleted=0';
		$criteria->params = array(
			':product_id' => $this->id,
		);
		$criteria->order = 'create_date DESC';
		return $criteria;

	}

	public function sortReviewByRatingCriteria($sort = 'DESC')
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.* ,AVG(rpc.rating) AS top_rated, COUNT(vr.id) AS most_helpfull';
		$criteria->join = "LEFT JOIN `review_product_component` AS rpc ON t.id = rpc.review_product_id";
		$criteria->join .= " LEFT JOIN `view_review` AS vr ON t.id = vr.review_product_id";
		$criteria->group = "t.id";
		$criteria->order = "top_rated " . $sort . ", most_helpfull DESC, create_date DESC";
		$criteria->condition = 't.product_id = :product_id AND t.is_deleted=0';
		$criteria->params = array(
			':product_id' => $this->id,
		);
		return $criteria;

	}

	public function sortReviewByHelpfullCriteria()
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.* ,COUNT(vr.id) AS most_helpfull';
		$criteria->join = "LEFT JOIN `view_review` AS vr ON t.id = vr.review_product_id";
		$criteria->group = "t.id";
		$criteria->order = "most_helpfull DESC, t.create_date DESC";
		$criteria->condition = 't.product_id = :product_id AND t.is_deleted=0';
		$criteria->params = array(
			':product_id' => $this->id,
		);
		return $criteria;

	}

	public static function searchProducts($term, $limit)
	{

		$criteria = new CDbCriteria();
		$criteria->condition = 't.name LIKE :match OR t.brand_id IN (SELECT id FROM `brand` WHERE name LIKE :match ) OR t.category_id IN (SELECT id FROM `category` WHERE name LIKE :match ) OR t.sub_category_id IN (SELECT id FROM `category` WHERE name LIKE :match )';
		$criteria->params = array(
			':match' => '%' . $term . '%',
		);
		$criteria->order = 't.create_date DESC';
		if ($limit > 0) {
			$criteria->limit = $limit;
		}


		$products = Product::model()->findAll($criteria);

		return $products;

	}

	public function getSearchStatusList()
	{
		return array(
			0 => 'ALL',
			self::STATUS_PUBLISHED => "Published",
			self::STATUS_NOT_PUBLISHED => "Not Published",
		);

	}

	public function getLowestPrice()
	{
		$store = StoreProductInfo::model()->find(array(
			'condition' => "product_id = $this->id",
			'order' => 'price ASC',
		));

		return ($store) ? $store->price : '';
	}

	public function afterFind()
	{
		parent::afterFind();
		$this->name = html_entity_decode($this->name);
		return true;

	}

	public function checkUserReviewd()
	{
		$data = null;
		if (Yii::app()->user->id) {
			$criteria = new CDbCriteria();
			$criteria->addCondition('product_id=:product_id AND user_id = :user_id');
			$criteria->params = array(
				':user_id' => Yii::app()->user->id,
				':product_id' => $this->id
			);
			$data = ReviewProduct::model()->find($criteria);
		}
		return $data;
	}

	public static function userReviewd($product_id, $user_id)
	{
		$data = new ReviewProduct;

		$criteria = new CDbCriteria();
		$criteria->addCondition('product_id=:product_id AND user_id = :user_id');
		$criteria->params = array(
			':user_id' => $user_id,
			':product_id' => $product_id
		);
		$data = ReviewProduct::model()->find($criteria);
		return $data;
	}


}

?>