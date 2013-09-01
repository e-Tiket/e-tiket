<?php
/* @var $this PendudukController */
/* @var $model Penduduk */

$this->breadcrumbs=array(
	'Penduduks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Penduduk', 'url'=>array('index')),
	array('label'=>'Manage Penduduk', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>