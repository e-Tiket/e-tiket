<?php
/* @var $this CustommerController */
/* @var $viewModel Custommer */

$this->breadcrumbs=array(
	'Custommers'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Custommer', 'url'=>array('index')),
	array('label'=>'Create Custommer', 'url'=>array('create')),
	array('label'=>'Update Custommer', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Custommer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Custommer', 'url'=>array('admin')),
);
?>

<h3>View Custommer</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama_depan',
		'alamat',
		'nama_belakang',
		'no_telp',
		'no_telp_lainnya',
		'username',
		'password',
		'email',
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
