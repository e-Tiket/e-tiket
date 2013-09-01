<?php
/* @var $this TarifKapalController */
/* @var $model TarifKapal */

$this->breadcrumbs=array(
	'Tarif Kapals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TarifKapal', 'url'=>array('index')),
	array('label'=>'Create TarifKapal', 'url'=>array('create')),
	array('label'=>'View TarifKapal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TarifKapal', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>