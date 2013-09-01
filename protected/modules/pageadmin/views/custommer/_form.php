<?php
/* @var $this CustommerController */
/* @var $model Custommer */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'custommer-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Custommer </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama_depan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama_depan',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'nama_depan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'alamat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'alamat'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama_belakang',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama_belakang',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'nama_belakang'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'no_telp',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'no_telp',array('size'=>15,'maxlength'=>15,)); ?>
                    <?php echo $form->error($model,'no_telp'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'no_telp_lainnya',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'no_telp_lainnya',array('size'=>15,'maxlength'=>15,)); ?>
                    <?php echo $form->error($model,'no_telp_lainnya'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'email'); ?>
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
