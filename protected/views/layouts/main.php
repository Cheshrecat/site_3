<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/assets/css/bootstrap-responsive.css" />

    <?Yii::app()->bootstrap->register();?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->



           <h1 style="text-align:center;">ALL POSTS</h1>

            <div class="container">
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
            'type'=>'inverse', // null or 'inverse'
            #'brand'=>'My Blog',
            'brandUrl'=>'#',
            'collapse'=>true, // requires bootstrap-responsive.css

            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'items'=>array(
                        array('label'=>'Home','url'=>array('/post/index')),
                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                        array('label'=>"Posts" , 'items'=>array(
                            array('label'=>'Show Posts', 'url'=>array('/post/index')),
                            array('label'=>'Create New Post', 'url'=>array('/post/create')),
                            array('label'=>'Manage Posts', 'url'=>array('/post/admin')),
                            array('label'=>'Approve Comments', 'url'=>array('/comment/index'),'visible'=>Yii::app()->getModule('user')->isAdmin()),
                        )),

                        array('label'=>'Profile' ,'items'=>array(
                            array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                             array('label'=>UserModule::t('Edit'), 'url'=>array('/user/profile/edit')),
                            array('label'=>'Change password','url'=>array('/user/profile/changepassword')),
                            array('label'=>'Logout','url'=>array('/user/logout')),
                        ) ),




                    ),
                ),
                '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'htmlOptions'=>array('class'=>'pull-right'),

                    'items'=>array(
                        array('label'=>Yii::app()->getModule('user')->t("Login"),'url'=>Yii::app()->getModule('user')->loginUrl,  'visible'=>Yii::app()->user->isGuest),

                        array('label'=>"Admin" ,'visible'=>Yii::app()->getModule('user')->isAdmin(), 'items'=>array(
                            array('label'=>UserModule::t('Create User'), 'url'=>array('/user/admin/create')),
                           # array('label'=>UserModule::t('Update User'), 'url'=>array('/user/admin/update','user/id'=>$model->id)),
                           # array('label'=>UserModule::t('Delete User'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
                            array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
                            array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('/user/profileField/admin')),
                            array('label'=>UserModule::t('List User'), 'url'=>array('/user')),

                        )),

                        array('label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')','url'=>Yii::app()->getModule('user')->logoutUrl, 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Sign up  ' ,'visible'=>Yii::app()->user->isGuest, 'items'=>array(

                            array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                          /**  array('label'=>'via Facebook', 'url'=>'#'),
                            array('label'=>'via Google', 'url'=>'#'),**/

                        )),
                    ),
                ),
            ),
        )); ?>
    </div>






    <!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">

        <?php $this->widget('application.extensions.WSocialButton', array('style'=>'box'));?>
		Copyright &copy; <?php echo date('Y'); ?> by Kseniya.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>