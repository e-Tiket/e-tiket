<?php
/* @var $this TarifKapalController */
/* @var $model TarifKapal */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Tarif Kapal</h3>
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
		<?php echo $form->label($model,'id_pemberangkatan',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_pemberangkatan',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'harga',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'harga',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'kelas',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'kelas',array('size'=>50,'maxlength'=>50,)); ?>
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
