<?php
/* @var $this GalleryPhotoController */
/* @var $viewModel GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List GalleryPhoto', 'url'=>array('index')),
	array('label'=>'Create GalleryPhoto', 'url'=>array('create')),
	array('label'=>'Update GalleryPhoto', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete GalleryPhoto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GalleryPhoto', 'url'=>array('admin')),
);
?>

<h3>View Gallery Photo</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'id_gallery',
		'rank',
		'nama',
		'deskripsi',
		'path_file',
	),
)); ?>


<?php 
$this->actionAdmin();
?>    
</div>
