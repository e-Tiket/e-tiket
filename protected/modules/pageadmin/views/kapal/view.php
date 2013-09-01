<?php
/* @var $this KapalController */
/* @var $viewModel Kapal */

$this->breadcrumbs=array(
	'Kapals'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Kapal', 'url'=>array('index')),
	array('label'=>'Create Kapal', 'url'=>array('create')),
	array('label'=>'Update Kapal', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Kapal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kapal', 'url'=>array('admin')),
);
?>

<h3>View Kapal</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
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
