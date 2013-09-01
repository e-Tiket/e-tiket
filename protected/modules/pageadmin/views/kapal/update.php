<?php
/* @var $this KapalController */
/* @var $model Kapal */

$this->breadcrumbs=array(
	'Kapals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kapal', 'url'=>array('index')),
	array('label'=>'Create Kapal', 'url'=>array('create')),
	array('label'=>'View Kapal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Kapal', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>