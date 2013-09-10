<?php
/* @var $this OrderController */
/* @var $viewModel Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h3>View Order</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'bayar_via',
		'bayar_bank',
		'bayar_total',
		'pay_keterangan',
		'id_custommer',
		'waktu',
		'total_tagihan',
		'status',
		'jenis_order',
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
