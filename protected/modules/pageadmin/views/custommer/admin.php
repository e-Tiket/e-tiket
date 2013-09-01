<?php
/* @var $this CustommerController */
/* @var $model Custommer */

$this->breadcrumbs=array(
	'Custommer'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Custommer', 'url'=>array('index')),
	array('label'=>'Create Custommer', 'url'=>array('create')),
);

?>

<h3>Manage Custommer</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Custommer',
                'url'=>Yii::app()->createUrl('pageadmin/custommer/create'),
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
	'id'=>'custommer-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('Custommer',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'nama_depan::Nama Depan',
		'alamat::Alamat',
		'nama_belakang::Nama Belakang',
		'no_telp::No Telp',
		'no_telp_lainnya::No Telp Lainnya',
		'username::Username',
		/*
		'password::Password',
		'email::Email',
		*/
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/custommer/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/custommer/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/custommer/delete/", array("id"=>$data["id"]))',
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
