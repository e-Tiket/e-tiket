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
		<?php echo $form->label($model,'asal',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'asal',array('size'=>30,'maxlength'=>30,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'tujuan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'tujuan',array('size'=>30,'maxlength'=>30,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'mobil',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'mobil',array()); ?>
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
		<?php echo $form->label($model,'jumlah_seat',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'jumlah_seat',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'id_agen_travel',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_agen_travel',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'keterangan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'keterangan',array()); ?>
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
