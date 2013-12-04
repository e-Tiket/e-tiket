<?php
/* @var $this NotificationAdminController */
/* @var $model NotificationAdmin */

$this->breadcrumbs=array(
	'Notification Admins'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NotificationAdmin', 'url'=>array('index')),
	array('label'=>'Create NotificationAdmin', 'url'=>array('create')),
	array('label'=>'View NotificationAdmin', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NotificationAdmin', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>