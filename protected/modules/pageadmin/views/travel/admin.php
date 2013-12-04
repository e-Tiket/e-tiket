<?php
/* @var $this TravelController */
/* @var $model Travel */

$this->breadcrumbs=array(
	'Travel'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Travel', 'url'=>array('index')),
	array('label'=>'Create Travel', 'url'=>array('create')),
);

?>

<h3>Manage Travel</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Travel',
                'url'=>Yii::app()->createUrl('pageadmin/travel/create'),
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
	'id'=>'travel-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('Travel',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'kota_asal::Kota Asal',
		'kota_tujuan::Kota Tujuan',
		'mobil::Mobil',
		'harga::Harga',
		'jam_berangkat::Jam Berangkat',
		'jam_sampai::Jam Sampai',
		/*
		'id_agen_travel::Id Agen Travel',
		'keterangan::Keterangan',
		'is_active::Is Active',
		'id_travel_seat::Id Travel Seat',
		*/
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/travel/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/travel/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/travel/delete/", array("id"=>$data["id"]))',
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
