<?php
$this->breadcrumbs=array(
	'Manage Posts',
);
?>
<h1>Manage Posts</h1>
<?php $this->beginWidget('zii.widgets.jui.CJuiDraggable',array(
// additional javascript options for the draggable plugin
'options'=>array(
'scope'=>'myScope',
),
));
#echo 'Your draggable content here';

$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
            
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
		),
		array(
			'name'=>'status',
			'value'=>'Lookup::item("PostStatus",$data->status)',
			'filter'=>Lookup::items('PostStatus'),
		),
		array(
			'name'=>'create_time',
			'type'=>'datetime',
			'filter'=>false,
		),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
));
$this->endWidget();?>


<script>$str_js = "
var fixHelper = function(e, ui) {
ui.children().each(function() {
$(this).width($(this).width());
});
return ui;
};

$('#projects-grid table.items tbody').sortable({
forcePlaceholderSize: true,
forceHelperSize: true,
items: 'tr',
update : function () {
serial = $('#projects-grid table.items tbody').sortable('serialize', {key: 'items[]', attribute: 'class'});
$.ajax({
'url': '" . $this->createUrl('/admin/projects/producing') . "',
'type': 'post',
'data': serial,
'success': function(data){
},
'error': function(request, status, error){
alert('We are unable to set the sort order at this time.  Please try again in a few minutes.');
}
});
},
helper: fixHelper
}).disableSelection();
";
Yii::app()->clientScript->registerScript('sortable-project', $str_js);</script>