<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

    'modules'=>array(
        #...
        'user'=>array(
            'hash' => 'md5',
            'sendActivationMail' => false , #true
            'loginNotActiv' => true,
            'activeAfterRegister' => true ,   #false
            'autoLogin' => true,
            'registrationUrl' => array('/user/registration'),
            'recoveryUrl' => array('/user/recovery'),
            'loginUrl' => array('/user/login'),
            'returnUrl' => array('/user/profile'),
            'returnLogoutUrl' => array('/user/login'),
        ),
        #...
    ),
);