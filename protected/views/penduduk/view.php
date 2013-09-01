<?php
/* @var $this PendudukController */
/* @var $viewModel Penduduk */

$this->breadcrumbs=array(
	'Penduduks'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Penduduk', 'url'=>array('index')),
	array('label'=>'Create Penduduk', 'url'=>array('create')),
	array('label'=>'Update Penduduk', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Penduduk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penduduk', 'url'=>array('admin')),
);
?>

<h3>View Penduduk</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
		'alamat',
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
