<?php
/* @var $this TarifKapalController */
/* @var $viewModel TarifKapal */

$this->breadcrumbs=array(
	'Tarif Kapals'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List TarifKapal', 'url'=>array('index')),
	array('label'=>'Create TarifKapal', 'url'=>array('create')),
	array('label'=>'Update TarifKapal', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete TarifKapal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TarifKapal', 'url'=>array('admin')),
);
?>

<h3>View Tarif Kapal</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'id_pemberangkatan',
		'harga',
		'kelas',
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
