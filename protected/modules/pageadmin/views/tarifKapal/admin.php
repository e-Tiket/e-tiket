<?php
/* @var $this TarifKapalController */
/* @var $model TarifKapal */

$this->breadcrumbs=array(
	'Tarif Kapal'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TarifKapal', 'url'=>array('index')),
	array('label'=>'Create TarifKapal', 'url'=>array('create')),
);
$this->renderPartial('/pemberangkatanKapal/_view',array('data'=>$pemberangkatanModel));
?>

<h3>Manage Tarif Kapal</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Tarif Kapal',
                'url'=>Yii::app()->createUrl('pageadmin/tarifKapal/create',array('id_pemberangkatan'=>$pemberangkatanModel->id)),
                'type'=>'primary',
                'htmlOptions'=>array('target' => 'ajax-modal')
        )); ?>    
            </div>
</div>
</div>

<?php 
$model->id_pemberangkatan=$id_pemberangkatan;
$this->widget('MyCGridView', array(
	'id'=>'tarif-kapal-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('TarifKapal',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'kelas::Kelas',
                'harga::Harga',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/tarifKapal/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/tarifKapal/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/tarifKapal/delete/", array("id"=>$data["id"]))',
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
