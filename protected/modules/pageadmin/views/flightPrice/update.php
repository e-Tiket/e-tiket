<?php
/* @var $this FlightPriceController */
/* @var $model FlightPrice */

$this->breadcrumbs=array(
	'Flight Prices'=>array('index'),
	$model->kd_flight=>array('view','id'=>$model->kd_flight),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlightPrice', 'url'=>array('index')),
	array('label'=>'Create FlightPrice', 'url'=>array('create')),
	array('label'=>'View FlightPrice', 'url'=>array('view', 'id'=>$model->kd_flight)),
	array('label'=>'Manage FlightPrice', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>