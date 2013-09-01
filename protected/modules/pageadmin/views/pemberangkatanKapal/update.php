<?php
/* @var $this PemberangkatanKapalController */
/* @var $model PemberangkatanKapal */

$this->breadcrumbs=array(
	'Pemberangkatan Kapals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PemberangkatanKapal', 'url'=>array('index')),
	array('label'=>'Create PemberangkatanKapal', 'url'=>array('create')),
	array('label'=>'View PemberangkatanKapal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PemberangkatanKapal', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>