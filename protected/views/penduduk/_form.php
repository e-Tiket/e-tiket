<?php
/* @var $this PendudukController */
/* @var $model Penduduk */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'penduduk-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Penduduk </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50,)); ?>
                    <?php echo $form->error($model,'nama'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'alamat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>100,)); ?>
                    <?php echo $form->error($model,'alamat'); ?>
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
