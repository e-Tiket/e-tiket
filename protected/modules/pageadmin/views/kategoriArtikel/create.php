<?php
/* @var $this KategoriArtikelController */
/* @var $model KategoriArtikel */

$this->breadcrumbs=array(
	'Kategori Artikels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KategoriArtikel', 'url'=>array('index')),
	array('label'=>'Manage KategoriArtikel', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>