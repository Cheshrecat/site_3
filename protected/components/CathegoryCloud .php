<?php

Yii::import('bootstrap.widgets.TbPortlet');

class CathegoryCloud extends TbPortlet
{
	public $title='Cathegories';
	public $maxTags=20;

	protected function renderContent()
	{
		$tags=Cathegory::model()->findTagWeights($this->maxTags);

		foreach($tags as $tag=>$weight)
		{
			$link=CHtml::link(CHtml::encode($tag), array('post/index','cathegory'=>$tag));
			echo CHtml::tag('span', array(
				'class'=>'cathegory',
				'style'=>"font-size:{$weight}pt",
			), $link)."\n";
		}
	}
}