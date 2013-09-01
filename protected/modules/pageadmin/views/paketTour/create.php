<?php
/* @var $this PaketTourController */
/* @var $model PaketTour */

$this->breadcrumbs=array(
	'Paket Tours'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PaketTour', 'url'=>array('index')),
	array('label'=>'Manage PaketTour', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>