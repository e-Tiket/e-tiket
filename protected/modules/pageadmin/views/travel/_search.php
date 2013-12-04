<?php
/* @var $this TravelController */
/* @var $model Travel */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Travel</h3>
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
		<?php echo $form->label($model,'id_kota_asal',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_kota_asal',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_kota_tujuan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_kota_tujuan',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'mobil',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'mobil',array('size'=>32,'maxlength'=>32,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'harga',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'harga',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'jam_berangkat',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jam_berangkat',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'jam_sampai',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jam_sampai',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_agen_travel',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_agen_travel',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'keterangan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'keterangan',array('size'=>60,'maxlength'=>100,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'is_active',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'is_active',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_travel_seat',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_travel_seat',array()); ?>
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
