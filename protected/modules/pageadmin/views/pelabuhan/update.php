<?php
/* @var $this PelabuhanController */
/* @var $model Pelabuhan */

$this->breadcrumbs=array(
	'Pelabuhans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pelabuhan', 'url'=>array('index')),
	array('label'=>'Create Pelabuhan', 'url'=>array('create')),
	array('label'=>'View Pelabuhan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pelabuhan', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>