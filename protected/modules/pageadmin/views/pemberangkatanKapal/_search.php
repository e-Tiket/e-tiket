<?php
/* @var $this PemberangkatanKapalController */
/* @var $model PemberangkatanKapal */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Pemberangkatan Kapal</h3>
</div>

<div class="modal-body">

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','id'=>'searchForm')
)); ?>
<fieldset>
	<div class="control-group">
		<?php echo $form->label($model,'id',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_pelabuhan_awal',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_pelabuhan_awal',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_pelabuhan_tujuan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_pelabuhan_tujuan',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_kapal',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_kapal',array()); ?>
</div>
	</div>

</fieldset>    
</div><!-- search-form -->    
<?php $this->endWidget(); ?>
    
<div class="modal-footer">
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Search',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','onclick'=>"$('#searchForm').submit()"),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
    )); ?>    
    </div>
<?php $this->endWidget(); ?>
