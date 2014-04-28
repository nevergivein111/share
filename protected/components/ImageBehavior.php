<?php

class ImageBehavior extends CActiveRecordBehavior
{
	/*
	 * image column
	 */
	public $imageField = 'image';

	/*
	 * image path
	 */
	public $image_path = '/../uploads/user';

	/*
	 * Default image that will show if there is no image
	 */
	public $default_image = '/images/avatar.jpeg';

	public $image_url = "/uploads/user";
	public $orig_folder = '/orig';
	public $normal_folder = '/normal';
	public $thumb_folder = '/thumb';

	public $thumb_width = 50;
	public $thumb_height = 50;

	public $normal_width = 250;
	/**
	 * null means height can be dynamic
	 */
	public $normal_height = 0;
	public $max_normal_height = 250;

	/**
	 * Uploads selected image and removes the old one if exist
	 * @param string $getInstance
	 * @param null $currentImage
	 * @return bool
	 */
	public function uploadImage($currentImage = null, $getInstance = 'image')
	{
		$result = true;

		$objUploader = CUploadedFile::getInstance($this->getOwner(), $getInstance);
		if ($objUploader && ($objUploader != $currentImage)) {
			if ($currentImage)
				$this->unlinkImage($currentImage);

			$encryptFileName = sprintf('%s.%s', md5(microtime(true)), $objUploader->getExtensionName());
			$imgPath = $this->imageOrigPath() . '/' . $encryptFileName;
			$this->getOwner()->{$this->imageField} = $encryptFileName;
			$objUploader->saveAs($imgPath);
		

			$result &= $this->batchResize($imgPath);
		}

		return $result;
	}


	/**
	 * Upload image from given url
	 * @param $url
	 * @return bool
	 */
	public function uploadImageFromUrl($url)
	{
		if(!$url){
			return false;
		}

		$result = true;
		$pieces = explode(".", basename($url));
		$encryptFileName = sprintf('%s.%s', md5(microtime(true)), $pieces[1]);
		$imgPath = $this->imageOrigPath() . '/' . $encryptFileName;

		$this->getOwner()->{$this->imageField} = $encryptFileName;

		file_put_contents($imgPath, file_get_contents($url));
		$result &= $this->batchResize($imgPath);

		return $result;
	}

	/**
	 * get original image from orig folder
	 * no resized version
	 * @param bool $absolute
	 * @return string
	 */
	public function getOrigImage($absolute = false)
	{
		$baseUrl = Yii::app()->request->getBaseUrl($absolute);
		if ($this->getOwner()->{$this->imageField}) {
			$image = $this->image_url . $this->orig_folder . '/' . $this->getOwner()->{$this->imageField};
		} else {
			$image = $this->default_image;
		}

		return $baseUrl . $image;
	}

	/**
	 * get thumbnail image from thumb folder
	 * sizes is 50 x 50
	 * @param bool $absolute
	 * @return string
	 */
	public function getThumbImage($absolute = false)
	{
		$baseUrl = Yii::app()->request->getBaseUrl($absolute);
		if ($this->getOwner()->{$this->imageField}) {
			$image = $this->image_url . $this->thumb_folder . '/' . $this->getOwner()->{$this->imageField};
		} else {
			$image = $this->default_image;
		}

		return $baseUrl . $image;
	}

	/**
	 * get normal image from normal folder
	 * sizes is 250 x anything or anything x 100
	 * max width 250, max height 100
	 * @param bool $absolute
	 * @return string
	 */
	public function getNormalImage($absolute = false)
	{
		$baseUrl = Yii::app()->request->getBaseUrl($absolute);
		if ($this->getOwner()->{$this->imageField}) {
			$image = $this->image_url . $this->normal_folder . '/' . $this->getOwner()->{$this->imageField};
		} else {
			$image = $this->default_image;
		}

		return $baseUrl . $image;
	}

	/**
	 * get Image Path
	 * @param string $type available parameter is orig, normal and thumb
	 * @param bool $absolute
	 * @return string
	 */

	public function imgPath($type, $absolute = false)
	{
		switch ($type) {
			case 'orig':
				$folder = $this->orig_folder;
				break;
			case 'normal':
				$folder = $this->normal_folder;
				break;
			case 'thumb':
				$folder = $this->thumb_folder;
				break;
			default:
				$folder = null;
		}

		if ($this->getOwner()->{$this->imageField} && $folder) {
			$path = Yii::app()->request->getBaseUrl($absolute) . $this->image_url . $folder . '/' . $this->getOwner()->{$this->imageField};
		} else {
			$path = Yii::app()->request->getBaseUrl($absolute) . $this->default_image;
		}

		return $path;
	}

	/**
	 * Resizes image to normal & thumb
	 * @param $source
	 * @return bool
	 */
	public function batchResize($source)
	{	
		return $this->resizeThumb($source) && $this->resizeNormal($source);
	}

	/**
	 *      * Resizes image to thumbnail
	 * sizes is 50x50
	 * @param $source
	 * @return object
	 */
	protected function resizeThumb($source)
	{
		Yii::import('ext.iwi.Iwi');
		$image = new Iwi($source);
		$image->adaptive($this->thumb_width, $this->thumb_height, Iwi::NONE);
		return $image->save(self::imageThumbPath() . '/' . $this->getOwner()->{$this->imageField});
	}

	/**
	 * Resizes image to normal
	 * sizes is 250 x anything or 
	 * @param $source
	 * @return object
	 */
	protected function resizeNormal($source)
	{
		Yii::import('ext.iwi.Iwi');
		$image = new Iwi($source);

		if($image->height > $image->width) {
			$this->normal_width = 0;
			$this->normal_height = $this->max_normal_height;
		}
			
		$image->resize($this->normal_width, $this->normal_height, Iwi::NONE);
		return $image->save(self::imageNormalPath() . '/' . $this->getOwner()->{$this->imageField});
	}

	/**
	 * * Deletes the image from file system if exists
	 * @param $image name of the image
	 */
	public function unlinkImage($image)
	{
		if (file_exists($this->imageOrigPath() . '/' . $image))
			unlink($this->imageOrigPath() . '/' . $image);
		if (file_exists($this->imageThumbPath() . '/' . $image))
			unlink($this->imageThumbPath() . '/' . $image);
		if (file_exists($this->imageNormalPath() . '/' . $image))
			unlink($this->imageNormalPath() . '/' . $image);
	}

	protected function fullImagePath()
	{
		return Yii::app()->basePath . $this->image_path;
	}

	public function imageOrigPath()
	{
		return $this->fullImagePath() . $this->orig_folder;
	}

	public function imageThumbPath()
	{
		return $this->fullImagePath() . $this->thumb_folder;
	}

	public function imageNormalPath()
	{
		return $this->fullImagePath() . $this->normal_folder;
	}
}
