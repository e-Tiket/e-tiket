<?php
/* @var $this TravelController */
/* @var $model Travel */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'travel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Travel </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kota_asal',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'id_kota_asal', TravelKota::model()->dropdownModel(), array()); ?>
                    <?php echo $form->error($model,'id_kota_asal'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kota_tujuan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'id_kota_tujuan', TravelKota::model()->dropdownModel(), array()); ?>
                    <?php echo $form->error($model,'id_kota_tujuan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'mobil',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'mobil',array('size'=>32,'maxlength'=>32,)); ?>
                    <?php echo $form->error($model,'mobil'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'harga',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'harga',array()); ?>
                    <?php echo $form->error($model,'harga'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'jam_berangkat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'jam_berangkat',array()); ?>
                    <?php echo $form->error($model,'jam_berangkat'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'jam_sampai',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'jam_sampai',array()); ?>
                    <?php echo $form->error($model,'jam_sampai'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_agen_travel',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'id_agen_travel',array()); ?>
                    <?php echo $form->error($model,'id_agen_travel'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'keterangan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'keterangan',array('size'=>60,'maxlength'=>100,)); ?>
                    <?php echo $form->error($model,'keterangan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_travel_seat',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model, 'id_travel_seat', TravelSeat::model()->dropdownModel(), array()); ?>
                    <?php echo $form->error($model,'id_travel_seat'); ?>
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
