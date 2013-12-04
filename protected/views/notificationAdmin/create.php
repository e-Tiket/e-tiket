<?php
/* @var $this NotificationAdminController */
/* @var $model NotificationAdmin */

$this->breadcrumbs=array(
	'Notification Admins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NotificationAdmin', 'url'=>array('index')),
	array('label'=>'Manage NotificationAdmin', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>