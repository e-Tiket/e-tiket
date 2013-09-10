<?php
/* @var $this FlightPriceController */
/* @var $viewModel FlightPrice */

$this->breadcrumbs=array(
	'Flight Prices'=>array('index'),
	$viewModel->kd_flight,
);

$this->menu=array(
	array('label'=>'List FlightPrice', 'url'=>array('index')),
	array('label'=>'Create FlightPrice', 'url'=>array('create')),
	array('label'=>'Update FlightPrice', 'url'=>array('update', 'id'=>$viewModel->kd_flight)),
	array('label'=>'Delete FlightPrice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->kd_flight),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlightPrice', 'url'=>array('admin')),
);
?>

<h3>View Flight Price</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'kd_flight',
		'pesawat',
		'harga_naik',
		'harga_turun',
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
