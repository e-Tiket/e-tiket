<?php
/* @var $this FlightPriceController */
/* @var $model FlightPrice */

$this->breadcrumbs=array(
	'Flight Price'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FlightPrice', 'url'=>array('index')),
	array('label'=>'Create FlightPrice', 'url'=>array('create')),
);

?>

<h3>Manage Flight Price</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Flight Price',
                'url'=>Yii::app()->createUrl('pageadmin/flightPrice/create'),
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
	'id'=>'flight-price-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('FlightPrice',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'kd_flight::Kd Flight',
		'pesawat::Pesawat',
		'harga_naik::Harga Naik',
		'harga_turun::Harga Turun',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/flightPrice/view/", array("kd_flight"=>$data["kd_flight"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/flightPrice/update/", array("kd_flight"=>$data["kd_flight"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/flightPrice/delete/", array("kd_flight"=>$data["kd_flight"]))',
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
