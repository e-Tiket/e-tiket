<?php
/* @var $this PelabuhanController */
/* @var $model Pelabuhan */

$this->breadcrumbs=array(
	'Pelabuhan'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pelabuhan', 'url'=>array('index')),
	array('label'=>'Create Pelabuhan', 'url'=>array('create')),
);

?>

<h3>Manage Pelabuhan</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Pelabuhan',
                'url'=>Yii::app()->createUrl('pageadmin/pelabuhan/create'),
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
	'id'=>'pelabuhan-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('Pelabuhan',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'nama::Nama',
		'kota::Kota',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/pelabuhan/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/pelabuhan/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/pelabuhan/delete/", array("id"=>$data["id"]))',
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
