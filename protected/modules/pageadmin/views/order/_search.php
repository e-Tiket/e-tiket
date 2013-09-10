<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Order</h3>
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
		<?php echo $form->label($model,'bayar_via',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'bayar_via',array('size'=>32,'maxlength'=>32,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'bayar_bank',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'bayar_bank',array('size'=>20,'maxlength'=>20,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'bayar_total',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'bayar_total',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'pay_keterangan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'pay_keterangan',array('size'=>50,'maxlength'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_custommer',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_custommer',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'waktu',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'waktu',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'total_tagihan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'total_tagihan',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'status',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'jenis_order',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jenis_order',array('size'=>6,'maxlength'=>6,)); ?>
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
