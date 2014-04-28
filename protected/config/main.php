<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
		  'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
		  'name' => 'Shareview',
		  'theme'=>'sharedview',
		  // preloading 'log' component
		  'preload' => array('log'),
		  // autoloading model and component classes
		  'import' => array(
					'application.models.*',
					'application.modules.*',
					'application.components.*',
					'application.helpers.*',
					'ext.giix-components.*',
					'ext.yii-mail.YiiMailMessage',
		  ),
		  'modules' => array(
					'gii' => array(
							  'class' => 'system.gii.GiiModule',
							  'generatorPaths' => array(
										'ext.giix-core',// giix generators
							  ),
							  'password' => '123',
							  // If removed, Gii defaults to localhost only. Edit carefully to taste.
							  'ipFilters' => array('*'),
					),
					'admin' => array(
							  'defaultController' => 'admin',
					),
					'hybridauth' => array(
							  'baseUrl' => array('/hybridauth/default/callback'),
							  "providers" => array(
										"Facebook" => array(
												  "enabled" => true,
												  "keys" => array("id" => "251363104884919","secret" => "9019aafccc7382c08337c5835984b22f"),
												  //"scope"   => "email, publish_stream",
												  "display" => ""
										),
							  )
					),
		  ),
		  // application components
		  'components' => array(
				
					'user' => array(
							  'class' => 'WebUser',
							  // enable cookie-based authentication
							  'allowAutoLogin' => true,
					),
					'mail' => array(
							  'class' => 'ext.yii-mail.YiiMail',
							  'transportType' => 'smtp',
							  'transportOptions' => array(
										'host' => 'retail.smtp.com',
										'username' => 'donmj3@gmail.com',
										'password' => 'fc6551a8',
										'port' => 2525,
							  ),
							  'viewPath' => 'application.views.mailer',
							  'logging' => true,
							  'dryRun' => false
					),
					'urlManager' => array(
						//	  'class' => 'UrlManager',
							  'urlFormat' => 'path',
							  'showScriptName' => false,
							  'rules' => require(dirname(__FILE__) . '/routes.php'),
					),
					// uncomment the following to use a MySQL database
					'db' => require(dirname(__FILE__) . '/databaseConfig.php'),
					'cache' => array(
							  'class' => 'CDummyCache',
					),
					'errorHandler' => array(
							  // use 'site/error' action to display errors
							  'errorAction' => 'site/error',
					),
					'log' => array(
							  'class' => 'CLogRouter',
							  'routes' => array(
										array(
												  'class' => 'CFileLogRoute',
												  'levels' => 'error, warning',
										),
							  // uncomment the following to show log messages on web pages
//				array(
//					'class'=>'CWebLogRoute',
//				),
							  ),
					),
		  ),
		  // application-level parameters that can be accessed
		  // using Yii::app()->params['paramName']
		  'params' => require(dirname(__FILE__) . '/params.php'),
);