<?php
/* @var $this KategoriArtikelController */
/* @var $model KategoriArtikel */

$this->breadcrumbs=array(
	'Kategori Artikels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KategoriArtikel', 'url'=>array('index')),
	array('label'=>'Create KategoriArtikel', 'url'=>array('create')),
	array('label'=>'View KategoriArtikel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KategoriArtikel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>