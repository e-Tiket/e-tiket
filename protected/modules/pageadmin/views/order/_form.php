<?php
/* @var $this OrderController */
/* @var $model Order */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'order-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Order </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'bayar_via',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'bayar_via',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'bayar_via'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'bayar_bank',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'bayar_bank',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'bayar_bank'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'bayar_total',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'bayar_total',array()); ?>
                    <?php echo $form->error($model,'bayar_total'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'pay_keterangan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'pay_keterangan',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'pay_keterangan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_custommer',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_custommer',array()); ?>
                    <?php echo $form->error($model,'id_custommer'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'waktu',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'waktu',array()); ?>
                    <?php echo $form->error($model,'waktu'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'total_tagihan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'total_tagihan',array()); ?>
                    <?php echo $form->error($model,'total_tagihan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10,)); ?>
                    <?php echo $form->error($model,'status'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'jenis_order',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'jenis_order',array('size'=>6,'maxlength'=>6,)); ?>
                    <?php echo $form->error($model,'jenis_order'); ?>
                </div>    
	</div>

        </fieldset>
    </div><!-- form -->
</div>
<div class="modal-footer">
    <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
                'buttonType' => 'submit'
            ));
            ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
            )); ?></div>    

<?php $this->endWidget(); ?>
