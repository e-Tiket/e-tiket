<?php
/* @var $this FlightPriceController */
/* @var $model FlightPrice */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'flight-price-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> FlightPrice </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'kd_flight',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'kd_flight',array('size'=>20,'maxlength'=>20,)); ?>
                    <?php echo $form->error($model,'kd_flight'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'pesawat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'pesawat',array('size'=>30,'maxlength'=>30,)); ?>
                    <?php echo $form->error($model,'pesawat'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'harga_naik',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'harga_naik',array()); ?>
                    <?php echo $form->error($model,'harga_naik'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'harga_turun',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'harga_turun',array()); ?>
                    <?php echo $form->error($model,'harga_turun'); ?>
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
