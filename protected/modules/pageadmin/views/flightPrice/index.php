<?php
/* @var $this FlightPriceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Flight Prices',
);

$this->menu=array(
	array('label'=>'Create FlightPrice', 'url'=>array('create')),
	array('label'=>'Manage FlightPrice', 'url'=>array('admin')),
);
?>

<h1>Flight Prices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
