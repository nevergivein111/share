<?php
 return array(
	 'admin'=>'admin/admin',
	 'admin/login'=>'admin/admin/login',
	 'login'=>'account/login',
	 'register'=>'account/register',
	 'confirm'=>'account/confirm',
	 'write-review'=>'reviewProduct/create',
 	 'review-of-the-day' => 'reviewProduct/reviewOfTheDay',
	 '<controller:\w+>/<id:\d+>/*'=>'<controller>/view',
	 'category/<name:[a-zA-Z0-9-]+>/<subcategory:[a-zA-Z0-9-]+>' => 'category/view',
	 'category/<name:[a-zA-Z0-9-]+>/*'=> 'category/view',
	 'product/view/<name:[a-zA-Z0-9-]+>/*'=> 'product/view',
	 '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	 '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
	
 );
