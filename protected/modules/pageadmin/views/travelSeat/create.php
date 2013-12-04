<?php
/* @var $this TravelSeatController */
/* @var $model TravelSeat */

$this->breadcrumbs=array(
	'Travel Seats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TravelSeat', 'url'=>array('index')),
	array('label'=>'Manage TravelSeat', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>