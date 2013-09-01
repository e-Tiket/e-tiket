<?php
/* @var $this AgenTravelController */
/* @var $model AgenTravel */

$this->breadcrumbs=array(
	'Agen Travels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AgenTravel', 'url'=>array('index')),
	array('label'=>'Manage AgenTravel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>