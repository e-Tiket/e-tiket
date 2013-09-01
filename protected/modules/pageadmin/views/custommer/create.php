<?php
/* @var $this CustommerController */
/* @var $model Custommer */

$this->breadcrumbs=array(
	'Custommers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Custommer', 'url'=>array('index')),
	array('label'=>'Manage Custommer', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>