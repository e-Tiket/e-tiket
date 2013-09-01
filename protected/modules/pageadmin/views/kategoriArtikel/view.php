<?php
/* @var $this KategoriArtikelController */
/* @var $viewModel KategoriArtikel */

$this->breadcrumbs=array(
	'Kategori Artikels'=>array('index'),
	$viewModel->id,
);

$this->menu=array(
	array('label'=>'List KategoriArtikel', 'url'=>array('index')),
	array('label'=>'Create KategoriArtikel', 'url'=>array('create')),
	array('label'=>'Update KategoriArtikel', 'url'=>array('update', 'id'=>$viewModel->id)),
	array('label'=>'Delete KategoriArtikel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$viewModel->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KategoriArtikel', 'url'=>array('admin')),
);
?>

<h3>View Kategori Artikel</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$viewModel,
	'attributes'=>array(
		'id',
		'nama',
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
