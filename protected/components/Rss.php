<?php

/**
* RSS class file
*
*
*
*/

Class Rss extends CWidget {

var $config = array();

function init()
{
if (empty($this->config))
$this->config = array(
'url'  => 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."/",
'name' => Yii::app()->params['name'],
'desc' => Yii::app()->params['desc'],);
$this->render('rss/index',
array(
// вместо Posts укажите название вашей модели
'arr' => Post::model()->findAll('status = 1 ORDER BY created DESC')
));
}
}

?>