<?php

/**
 *
 * example
 *
 *	Yii::import('ext.mytexteditor.MyTextEditor');
 *	$this->widget('MyTextEditor', array(
 *		'model' => $model,
 *		'value' => $model->isNewRecord ? '' : $model->content,
 *		'attribute' => 'content',
 *		'options' => array(
 *			'theme_advanced_resizing' => 'true',
 *			'theme_advanced_statusbar_location' => 'bottom',
 *		),
 *	));
 *
 * 
 * The default options are:  you can define custom options, but thay will rewrite default options set by jquery tiny mce
 *
 * public $defaultOptions = array(
 * 	'theme' => 'advanced',
 * 	'theme_advanced_toolbar_location' => 'top',
 * 	'theme_advanced_toolbar_align' => 'left',
 * 	'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
 * 	'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,cleanup,code,|,forecolor,backcolor",
 * 	'theme_advanced_buttons3' => '',
 * );
 *
 */
class MyTextEditor extends CInputWidget {

	
	public $options;

	
	public $defaultOptions = array(
		'theme' => 'advanced',
		'theme_advanced_toolbar_location' => 'top',
		'theme_advanced_toolbar_align' => 'left',
		'theme_advanced_buttons1' => "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect",
		'theme_advanced_buttons2' => "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,cleanup,code,|,forecolor,backcolor",
		'theme_advanced_buttons3' => '',
	);

	
	public function run() {
		list($name, $id) = $this->resolveNameID();
		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $id;
		if (isset($this->htmlOptions['name']))
			$name = $this->htmlOptions['name'];

		$this->registerClientScript();
		if ($this->hasModel())
			echo CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
		else
			echo CHtml::textArea($name, $this->value, $this->htmlOptions);
	}

	/**
	 * Registers the needed CSS and JavaScript.
	 */
	public function registerClientScript() {
        
		$clientScript = Yii::app()->getClientScript();
		$clientScript->registerCoreScript('jquery');
        
        /*
         * including jquery library for tiny mce
         */
		$asset_url = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tinymce', false, -1, true);
		$clientScript->registerScriptFile("$asset_url/jquery.tinymce.js", CClientScript::POS_END);
        
        
        /*
         * passsing custom options to jquery plugin
         */
		$id = $this->htmlOptions['id'];
		$this->options = CMap::mergeArray($this->defaultOptions, $this->options);
		$this->options['script_url'] = "$asset_url/tiny_mce.js";
		$options = $this->options !== array() ? CJavaScript::encode($this->options) : '';
		$jScript ="jQuery(\"#{$id}\").tinymce({$options});";
		$clientScript->registerScript('My.MyTextEditor#' . $id, $jScript);
	}

}
