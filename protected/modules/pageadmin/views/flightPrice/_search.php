<?php
/* @var $this FlightPriceController */
/* @var $model FlightPrice */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Flight Price</h3>
</div>

<div class="modal-body">

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'htmlOptions'=>array('class'=>'form-horizontal','id'=>'searchForm')
)); ?>
<fieldset>
	<div class="control-group">
		<?php echo $form->label($model,'kd_flight',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'kd_flight',array('size'=>20,'maxlength'=>20,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'pesawat',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'pesawat',array('size'=>30,'maxlength'=>30,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'harga_naik',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'harga_naik',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'harga_turun',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'harga_turun',array()); ?>
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
