<?php
/* @var $this AgenTravelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Agen Travels',
);

$this->menu=array(
	array('label'=>'Create AgenTravel', 'url'=>array('create')),
	array('label'=>'Manage AgenTravel', 'url'=>array('admin')),
);
?>

<h1>Agen Travels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
