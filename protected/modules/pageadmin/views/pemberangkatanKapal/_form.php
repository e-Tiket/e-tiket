<?php
/* @var $this PemberangkatanKapalController */
/* @var $model PemberangkatanKapal */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'pemberangkatan-kapal-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> PemberangkatanKapal </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_pelabuhan_awal',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'id_pelabuhan_awal',  Pelabuhan::model()->dropdownModel(),array('data-rel'=>'chosen','class'=>'pelabuhanChosen')); ?>
                    <?php echo $form->error($model,'id_pelabuhan_awal'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_pelabuhan_tujuan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'id_pelabuhan_tujuan',Pelabuhan::model()->dropdownModel(),array('data-rel'=>"chosen",'class'=>'pelabuhanChosen')); ?>
                    <?php echo $form->error($model,'id_pelabuhan_tujuan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_kapal',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'id_kapal',Kapal::model()->dropdownModel(),array('class'=>'pelabuhanChosen')); ?>
                    <?php echo $form->error($model,'id_kapal'); ?>
                </div>    
	</div>
        <div class="control-group">
                <label class="control-label">Berangkat</label>
                <div class="controls">
                    <?php echo $form->textField($model,'tanggal_berangkat',array('class'=>'tanggal_pemberangkatan span2 tanggal',)); ?>
                    <div style="display: inline"> Jam </div>    
                    <?php echo $form->textField($model,'jam_berangkat',array('maxlength'=>5,'class'=>'span1',)); ?>
                    <?php echo $form->error($model,'tanggal_berangkat'); ?>
                    <?php echo $form->error($model,'jam_berangkat'); ?>
                </div>    
	</div>
        <div class="control-group">
                <label class="control-label">Sampai</label>
                <div class="controls">
                    <?php echo $form->textField($model,'tanggal_sampai',array('class'=>'tanggal_pemberangkatan span2 tanggal',)); ?>
                    <div style="display: inline"> Jam </div>    
                    <?php echo $form->textField($model,'jam_sampai',array('maxlength'=>5,'class'=>'span1',)); ?>
                    <?php echo $form->error($model,'tanggal_sampai'); ?>
                    <?php echo $form->error($model,'jam_sampai'); ?>
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
<script type="text/javascript">
$(document).ready(function(){
   $('.pelabuhanChosen').chosen();
   $('.tanggal_pemberangkatan').datepicker();
   $('#pemberangkatan-kapal-form').formatTanggal();
});
</script>