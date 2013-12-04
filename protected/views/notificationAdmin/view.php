<?php
/* @var $this NotificationAdminController */
/* @var $viewModel NotificationAdmin */

$this->breadcrumbs=array(
	'Notification Admins'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List NotificationAdmin', 'url'=>array('index')),
	array('label'=>'Create NotificationAdmin', 'url'=>array('create')),
	array('label'=>'Update NotificationAdmin', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete NotificationAdmin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NotificationAdmin', 'url'=>array('admin')),
);
?>

<h3>View Notification Admin</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'url',
		'waktu',
		'read_by',
	),
)); ?>


<?php 
if(!isset($_GET['ajax'])){
    $this->splitContent();
    $this->renderPartial('admin',array(
            'model'=>$model,
    ));
}else{
    echo '</div>
                </div>
                </div>';
} ?>    
</div>
