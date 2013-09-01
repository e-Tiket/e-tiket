<?php
/* @var $this KapalController */
/* @var $model Kapal */

$this->breadcrumbs=array(
	'Kapals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kapal', 'url'=>array('index')),
	array('label'=>'Manage Kapal', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>