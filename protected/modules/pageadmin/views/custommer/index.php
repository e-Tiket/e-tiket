<?php
/* @var $this CustommerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Custommers',
);

$this->menu=array(
	array('label'=>'Create Custommer', 'url'=>array('create')),
	array('label'=>'Manage Custommer', 'url'=>array('admin')),
);
?>

<h1>Custommers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
