<?php
/* @var $this ArtikelController */
/* @var $model Artikel */

$this->breadcrumbs=array(
	'Artikel'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Artikel', 'url'=>array('index')),
	array('label'=>'Create Artikel', 'url'=>array('create')),
);

?>

<h3>Manage Artikel</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah Artikel',
                'url'=>Yii::app()->createUrl('pageadmin/artikel/create'),
                'type'=>'primary',
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
	'id'=>'artikel-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('Artikel',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
		'judul::Judul',
                array(
                  'header'=>'Kategori Artikel',
                  'value' =>'KategoriArtikel::model()->findByPk($data->id_kategori)->nama' 
                ),
		'tanggal_post::Tanggal Post',
		'id_admin_post::Id Admin Post',
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'_blank','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("artikel/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'','title'=>'Edit'),
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/artikel/delete/", array("id"=>$data["id"]))',
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
