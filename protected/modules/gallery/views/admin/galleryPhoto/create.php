<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GalleryPhoto', 'url'=>array('index')),
	array('label'=>'Manage GalleryPhoto', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>