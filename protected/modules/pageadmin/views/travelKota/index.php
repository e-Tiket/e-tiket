<?php
/* @var $this TravelKotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Travel Kotas',
);

$this->menu=array(
	array('label'=>'Create TravelKota', 'url'=>array('create')),
	array('label'=>'Manage TravelKota', 'url'=>array('admin')),
);
?>

<h1>Travel Kotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
