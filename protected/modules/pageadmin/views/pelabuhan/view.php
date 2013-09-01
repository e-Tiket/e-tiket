<?php
/* @var $this PelabuhanController */
/* @var $viewModel Pelabuhan */

$this->breadcrumbs=array(
	'Pelabuhans'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Pelabuhan', 'url'=>array('index')),
	array('label'=>'Create Pelabuhan', 'url'=>array('create')),
	array('label'=>'Update Pelabuhan', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Pelabuhan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pelabuhan', 'url'=>array('admin')),
);
?>

<h3>View Pelabuhan</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
		'kota',
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
