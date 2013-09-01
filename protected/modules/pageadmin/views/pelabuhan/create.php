<?php
/* @var $this PelabuhanController */
/* @var $model Pelabuhan */

$this->breadcrumbs=array(
	'Pelabuhans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pelabuhan', 'url'=>array('index')),
	array('label'=>'Manage Pelabuhan', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>