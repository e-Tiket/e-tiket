<?php
/* @var $this PemberangkatanKapalController */
/* @var $model PemberangkatanKapal */

$this->breadcrumbs=array(
	'Pemberangkatan Kapal'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PemberangkatanKapal', 'url'=>array('index')),
	array('label'=>'Create PemberangkatanKapal', 'url'=>array('create')),
);

?>

<h3>Manage Pemberangkatan Kapal</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Pemberangkatan Kapal',
                'url'=>Yii::app()->createUrl('pageadmin/pemberangkatanKapal/create'),
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
	'id'=>'pemberangkatan-kapal-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('PemberangkatanKapal',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
                'kapal::Kapal',
		'pelabuhan_awal::Pelabuhan Awal',
		'pelabuhan_tujuan::Pelabuhan Tujuan',
		array(
                    'header'=>'Berangkat',
                    'value'=>'$data["tanggal_berangkat"]." ".$data["jam_berangkat"]'
                ),
		array(
                    'header'=>'Sampai',
                    'value'=>'$data["tanggal_sampai"]." ".$data["jam_sampai"]'
                ),
		array(
                    'class'=>'MyCButtonColumn',
                    'template'=>'{tarif} {view} {update} {delete} {duplicate}',
                    'htmlOptions'=>array('width'=>'75px'),
                    'buttons'=>array(
                        'tarif'=>array(
                            'options'=>array('target'=>'','title'=>'Tarif Kapal','class'=>'icon-list-alt'),
                            'url' => 'Yii::app()->createUrl("pageadmin/tarifKapal/admin/", array("id_pemberangkatan"=>$data["id"]))',
                            'label'=>' ',
                        ),
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/pemberangkatanKapal/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/pemberangkatanKapal/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/pemberangkatanKapal/delete/", array("id"=>$data["id"]))',
                        ),
                        'duplicate'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Gandakan','class'=>'icon-copy'),
                            'url' => 'Yii::app()->createUrl("pageadmin/pemberangkatanKapal/duplicate/", array("id"=>$data["id"]))',
                            'label'=>''
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>
