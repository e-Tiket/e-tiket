<?php
/* @var $this PemberangkatanKapalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pemberangkatan Kapals',
);

$this->menu=array(
	array('label'=>'Create PemberangkatanKapal', 'url'=>array('create')),
	array('label'=>'Manage PemberangkatanKapal', 'url'=>array('admin')),
);
?>

<h1>Pemberangkatan Kapals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
