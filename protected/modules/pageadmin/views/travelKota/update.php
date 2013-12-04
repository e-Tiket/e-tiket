<?php
/* @var $this TravelKotaController */
/* @var $model TravelKota */

$this->breadcrumbs=array(
	'Travel Kotas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TravelKota', 'url'=>array('index')),
	array('label'=>'Create TravelKota', 'url'=>array('create')),
	array('label'=>'View TravelKota', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TravelKota', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>