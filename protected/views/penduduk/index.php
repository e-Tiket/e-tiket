<?php
/* @var $this PendudukController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Penduduks',
);

$this->menu=array(
	array('label'=>'Create Penduduk', 'url'=>array('create')),
	array('label'=>'Manage Penduduk', 'url'=>array('admin')),
);
?>

<h1>Penduduks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
