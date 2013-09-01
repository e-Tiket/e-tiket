<?php
/* @var $this KapalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kapals',
);

$this->menu=array(
	array('label'=>'Create Kapal', 'url'=>array('create')),
	array('label'=>'Manage Kapal', 'url'=>array('admin')),
);
?>

<h1>Kapals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
