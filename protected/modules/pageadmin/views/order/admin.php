<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Order'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
);

?>

<h3>Manage Order</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Order',
                'url'=>Yii::app()->createUrl('pageadmin/order/create'),
                'type'=>'primary',
                'htmlOptions'=>array('target' => 'ajax-modal')
        )); ?>    
            </div>
</div>
<div class="span7" style="text-align: right">
   
    <?php $this->renderPartial('_search_sort',array(
            'model'=>$model,
    )); ?>
        
</div>
</div>

<?php $this->widget('MyCGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('Order',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'bayar_via::Bayar Via',
		'bayar_bank::Bayar Bank',
		'bayar_total::Bayar Total',
		'pay_keterangan::Pay Keterangan',
		'id_custommer::Id Custommer',
		'waktu::Waktu',
		/*
		'total_tagihan::Total Tagihan',
		'status::Status',
		'jenis_order::Jenis Order',
		*/
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/order/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/order/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/order/delete/", array("id"=>$data["id"]))',
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>


 <?php 
    $this->renderPartial('_search',array(
            'model'=>$model,
    )); 
    ?>    
