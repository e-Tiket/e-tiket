<?php
/* @var $this CustommerController */
/* @var $model Custommer */

$this->breadcrumbs=array(
	'Custommers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Custommer', 'url'=>array('index')),
	array('label'=>'Create Custommer', 'url'=>array('create')),
	array('label'=>'View Custommer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Custommer', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>