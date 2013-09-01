<?php
/* @var $this PaketTourController */
/* @var $model PaketTour */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'paket-tour-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>
/* @var $form CActiveForm */
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> PaketTour </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'gambar',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'gambar',array()); ?>
                    <?php echo $form->error($model,'gambar'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'nama',array()); ?>
                    <?php echo $form->error($model,'nama'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'tujuan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'tujuan',array()); ?>
                    <?php echo $form->error($model,'tujuan'); ?>
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
