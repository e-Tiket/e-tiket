<?php
/* @var $this KategoriArtikelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kategori Artikels',
);

$this->menu=array(
	array('label'=>'Create KategoriArtikel', 'url'=>array('create')),
	array('label'=>'Manage KategoriArtikel', 'url'=>array('admin')),
);
?>

<h1>Kategori Artikels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
