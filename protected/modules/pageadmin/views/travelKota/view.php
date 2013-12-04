<?php
/* @var $this TravelKotaController */
/* @var $viewModel TravelKota */

$this->breadcrumbs=array(
	'Travel Kotas'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List TravelKota', 'url'=>array('index')),
	array('label'=>'Create TravelKota', 'url'=>array('create')),
	array('label'=>'Update TravelKota', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete TravelKota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TravelKota', 'url'=>array('admin')),
);
?>

<h3>View Travel Kota</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'kota',
		'status',
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
