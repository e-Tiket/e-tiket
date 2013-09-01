<?php
/* @var $this PemberangkatanKapalController */
/* @var $viewModel PemberangkatanKapal */

$this->breadcrumbs=array(
	'Pemberangkatan Kapals'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List PemberangkatanKapal', 'url'=>array('index')),
	array('label'=>'Create PemberangkatanKapal', 'url'=>array('create')),
	array('label'=>'Update PemberangkatanKapal', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete PemberangkatanKapal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PemberangkatanKapal', 'url'=>array('admin')),
);
?>

<h3>View Pemberangkatan Kapal</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'id_pelabuhan_awal',
		'id_pelabuhan_tujuan',
		'id_kapal',
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
