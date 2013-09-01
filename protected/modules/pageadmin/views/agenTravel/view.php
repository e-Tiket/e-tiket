<?php
/* @var $this AgenTravelController */
/* @var $viewModel AgenTravel */

$this->breadcrumbs=array(
	'Agen Travels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List AgenTravel', 'url'=>array('index')),
	array('label'=>'Create AgenTravel', 'url'=>array('create')),
	array('label'=>'Update AgenTravel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete AgenTravel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AgenTravel', 'url'=>array('admin')),
);
?>

<h3>View Agen Travel</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'no_telp',
		'id_admin',
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
