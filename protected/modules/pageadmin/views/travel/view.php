<?php
/* @var $this TravelController */
/* @var $viewModel Travel */

$this->breadcrumbs=array(
	'Travels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Travel', 'url'=>array('index')),
	array('label'=>'Create Travel', 'url'=>array('create')),
	array('label'=>'Update Travel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Travel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Travel', 'url'=>array('admin')),
);
?>

<h3>View Travel</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'asal',
		'tujuan',
		'mobil',
		'jam_berangkat',
		'jam_sampai',
		'jumlah_seat',
		'id_agen_travel',
		'keterangan',
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
