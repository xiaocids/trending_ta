<?php
/*$this->breadcrumbs=array(
	'Tweet Models'=>array('index'),
	'Manage',
);*/

$this->menu=array(
array('label'=>'List Tweet_model','url'=>array('index')),
array('label'=>'Create Tweet_model','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tweet-model-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Data Tweet Bersih</h1>

<div class="well">
    <?php echo CHtml::link('<i class="icon icon-retweet icon-white"></i> Mulai Crawler',array('/crawler/indexCrawler'),array('class'=>'btn btn-primary')); ?>
    <div class="search-form" style="display:none">
    	<?php $this->renderPartial('_search',array(
    	'model'=>$model,
    )); ?>
    </div><!-- search-form -->
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'tweet-model-grid',
'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
            'header'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
		array(
            'type'=>'raw',
            'name'=>'idstr',
            'value'=>'CHtml::link($data->idstr,"https://twitter.com/".$data->screen_name."/statuses/".$data->idstr, array("target"=>"_blank"))',
        ),
		array(
            'name'=>'screen_name',
            'type'=>'raw',
            'value'=>'CHtml::link("@".$data->screen_name, "https://twitter.com/".$data->screen_name, array("target"=>"_blank"))',
        ),
        array(
            'header'=>'Tweet Mentah',
            'name'=>'text_mentah',
        ),
		array(
            'header'=>'Tweet Bersih',
            'name'=>'hasil_proses1',
        ),
		'create_at',
		/*
		'hasil_proses3',
		'label',
		'location',
		'longitude',
		'latitude',
		'crawler_id',
		'create_at',
		'create_time',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
