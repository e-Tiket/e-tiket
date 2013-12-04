<?php
/* @var $this TravelSeatController */
/* @var $model TravelSeat */

$this->breadcrumbs=array(
	'Travel Seats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TravelSeat', 'url'=>array('index')),
	array('label'=>'Create TravelSeat', 'url'=>array('create')),
	array('label'=>'View TravelSeat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TravelSeat', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>