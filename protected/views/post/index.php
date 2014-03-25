<?php $this->widget('application.extensions.EListView.EListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'itemsPerPageMenu'=>array(1,2,5,10),
    'itemsPerPageMenuItemOptionPrefix'=>'View',
    'itemsPerPageMenuItemOptionSufix'=>'Per Page',
    'itemsPerPageMenuClass'=>'ippm',
    'scrollToItem'=>array('on'=>'MISMATCH', 'containerEntity'=>'body', 'itemClass'=>'view'),
    'renderMenuInAltDomElmWithID'=>false, //use and DOM ELEMENT ID IE "myID"
)); ?>

<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php /**$this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
));**/ ?>

