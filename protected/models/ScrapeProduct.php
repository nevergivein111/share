<?php

Yii::import('application.models._base.BaseScrapeProduct');

class ScrapeProduct extends BaseScrapeProduct
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function behaviors()
	{
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'create_date',
				'updateAttribute' => 'update_Date',
			),
		);
	}

	public function process()
	{
		//validate url ana category_id
		if(!$this->validate(array('url','category_id'))){
			return false;
		}

		if(!$this->takeCategoryIdFromUrl()){
			$this->addError('url', 'Invalid Url!');
			return false;
		}
		$this->scrape();
		return true;
	}

	public function takeCategoryIdFromUrl()
	{

		$url = $this->url;
		//$url = "http://www.bestbuy.com/site/olstemplatemapper.jsp?id=pcat17080&type=page&qp=cabcat0200000%23%239%23%2313w~~cabcat0204000%23%234%23%2336~~q70726f63657373696e6774696d653a3e313930302d30312d3031~~f1255%7C%7C42656174732042792044722e20447265&list=y&nrp=15&cp=1&sc=audioSP&sp=&usc=abcat0200000&gf=y";

		$dom = $this->loadUrlAndDom($url);
		if(!$dom){
			return false;
		}

		preg_match("/var\scatid\s=\s'([a-z0-9]*)';/", $dom, $matches);

		if(isset($matches[1])){
			$this->site_category_id = $matches[1];
			return true;
		}

		return false;
	}

	public function scrape()
	{
		$productProcess = new ProductProcess();
		$productProcess->category_id = $this->category->category_id;
		$productProcess->subcategory_id = $this->category_id;
		$productProcess->site_category_id = $this->site_category_id;
		$productProcess->product_attribute = $this->attribute;
		$productProcess->process();
	}

	protected function loadUrlAndDom($url)
	{
		$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);

		return $result;
	}
}