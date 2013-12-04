<?php
/* @var $this TravelSeatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Travel Seats',
);

$this->menu=array(
	array('label'=>'Create TravelSeat', 'url'=>array('create')),
	array('label'=>'Manage TravelSeat', 'url'=>array('admin')),
);
?>

<h1>Travel Seats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
