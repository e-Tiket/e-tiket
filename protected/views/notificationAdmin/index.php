<?php
/* @var $this NotificationAdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notification Admins',
);

$this->menu=array(
	array('label'=>'Create NotificationAdmin', 'url'=>array('create')),
	array('label'=>'Manage NotificationAdmin', 'url'=>array('admin')),
);
?>

<h1>Notification Admins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
