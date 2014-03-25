<div class="post">
	<div class="title">
		<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
	</div>
	<div class="author">
		posted by <?php echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
	</div>
	<div class="content">
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content;
			$this->endWidget();
		?>

	</div>
	<div class="nav">
        <?php
        //because we are activating CSRF and se using POST, we must give token to the AJAX Parameter
        echo CHtml::beginForm();
        $this->widget('CStarRating',array(
            'name'=>'rating',
            'minRating'=>1, //minimal value
            'maxRating'=>6,//max value
            'starCount'=>6, //number of stars
        ));
        echo CHtml::submitButton("Vote!");
        echo CHtml::endForm();
        echo "You just vote :".$ratingValue;
        ?>

        <div id="fb-root"></div>


		<b>Tags:</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Permalink', $data->url); ?> |
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?>


	</div>
</div>
