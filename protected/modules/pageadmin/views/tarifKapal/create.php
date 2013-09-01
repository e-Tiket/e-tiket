<?php
/* @var $this TarifKapalController */
/* @var $model TarifKapal */

$this->breadcrumbs=array(
	'Tarif Kapals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TarifKapal', 'url'=>array('index')),
	array('label'=>'Manage TarifKapal', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>