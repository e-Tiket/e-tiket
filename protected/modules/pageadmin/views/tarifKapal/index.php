<?php
/* @var $this TarifKapalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tarif Kapals',
);

$this->menu=array(
	array('label'=>'Create TarifKapal', 'url'=>array('create')),
	array('label'=>'Manage TarifKapal', 'url'=>array('admin')),
);
?>

<h1>Tarif Kapals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
