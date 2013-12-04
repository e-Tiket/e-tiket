<?php
/* @var $this NotificationAdminController */
/* @var $model NotificationAdmin */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'notification-admin-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> NotificationAdmin </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'url',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255,)); ?>
                    <?php echo $form->error($model,'url'); ?>
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
		<?php echo $form->labelEx($model,'read_by',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'read_by',array()); ?>
                    <?php echo $form->error($model,'read_by'); ?>
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
