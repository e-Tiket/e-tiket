<?php
/* @var $this FlightPriceController */
/* @var $model FlightPrice */

$this->breadcrumbs=array(
	'Flight Prices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlightPrice', 'url'=>array('index')),
	array('label'=>'Manage FlightPrice', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>