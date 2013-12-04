<?php
/* @var $this TravelSeatController */
/* @var $viewModel TravelSeat */

$this->breadcrumbs=array(
	'Travel Seats'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List TravelSeat', 'url'=>array('index')),
	array('label'=>'Create TravelSeat', 'url'=>array('create')),
	array('label'=>'Update TravelSeat', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete TravelSeat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TravelSeat', 'url'=>array('admin')),
);
?>

<h3>View Travel Seat</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'keterangan',
		'jumlah',
		'gambar',
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
