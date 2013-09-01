<?php
/* @var $this PaketTourController */
/* @var $model PaketTour */

$this->breadcrumbs=array(
	'Paket Tours'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaketTour', 'url'=>array('index')),
	array('label'=>'Create PaketTour', 'url'=>array('create')),
	array('label'=>'View PaketTour', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PaketTour', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>