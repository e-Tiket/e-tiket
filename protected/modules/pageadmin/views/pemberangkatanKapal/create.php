<?php
/* @var $this PemberangkatanKapalController */
/* @var $model PemberangkatanKapal */

$this->breadcrumbs=array(
	'Pemberangkatan Kapals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PemberangkatanKapal', 'url'=>array('index')),
	array('label'=>'Manage PemberangkatanKapal', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>