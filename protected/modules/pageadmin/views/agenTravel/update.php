<?php
/* @var $this AgenTravelController */
/* @var $model AgenTravel */

$this->breadcrumbs=array(
	'Agen Travels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AgenTravel', 'url'=>array('index')),
	array('label'=>'Create AgenTravel', 'url'=>array('create')),
	array('label'=>'View AgenTravel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AgenTravel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>