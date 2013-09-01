<?php
/* @var $this PaketTourController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Paket Tours',
);

$this->menu=array(
	array('label'=>'Create PaketTour', 'url'=>array('create')),
	array('label'=>'Manage PaketTour', 'url'=>array('admin')),
);
?>

<h1>Paket Tours</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
