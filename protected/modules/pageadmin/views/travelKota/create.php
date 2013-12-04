<?php
/* @var $this TravelKotaController */
/* @var $model TravelKota */

$this->breadcrumbs=array(
	'Travel Kotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TravelKota', 'url'=>array('index')),
	array('label'=>'Manage TravelKota', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>