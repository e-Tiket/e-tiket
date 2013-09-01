<?php
/* @var $this PaketTourController */
/* @var $viewModel PaketTour */

$this->breadcrumbs=array(
	'Paket Tours'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List PaketTour', 'url'=>array('index')),
	array('label'=>'Create PaketTour', 'url'=>array('create')),
	array('label'=>'Update PaketTour', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete PaketTour', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaketTour', 'url'=>array('admin')),
);
?>

<h3>View Paket Tour</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'gambar',
		'nama',
		'tujuan',
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
