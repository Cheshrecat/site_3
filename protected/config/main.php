<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii',

	// preloading 'log' component
	'preload'=>array('log',
       # 'bootstrap',
    ),

	// autoloading model and component classes
	'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
         'application.extensions.UserCounter',
        'bootstrap.helpers.TbHtml',


	),

	'defaultController'=>'post',

    'modules'=>array(

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1111',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            )),

        #...
        'user'=>array(
            'hash' => 'md5',

            'sendActivationMail' => false, #true

            'tableUsers' => 'tbl_users',

            #'tableUser' => 'tbl_user', ###########

            'tableProfiles' => 'tbl_profiles',

            'tableProfileFields' => 'tbl_profiles_fields',

             # allow access for non-activated users
            'loginNotActiv' => true,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => true ,   #false

            'autoLogin' => true,

            'registrationUrl' => array('/user/registration'),

            'recoveryUrl' => array('/user/recovery'),

            'loginUrl' => array('/user/login'),

            'returnUrl' => array('/site/index'),  #user/profile

            'returnLogoutUrl' => array('/user/login'),

        ),
        'rights',    #...
),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'class' => 'WebUser',
		),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap'),/*

		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),*/
		// uncomment the following to use a MySQL database
        'counter' => array(
            'class' => 'UserCounter', ),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yii',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
    'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),

);