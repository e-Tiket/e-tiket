<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */
/* @var $form CActiveForm */
?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'searchModal')); ?><div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Advanced Search Gallery Photo</h3>
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
		<?php echo $form->label($model,'id_gallery',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'id_gallery',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'rank',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'rank',array()); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'nama',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>512,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'deskripsi',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textArea($model,'deskripsi',array('rows'=>6, 'cols'=>50,)); ?>
</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'path_file',array('class'=>'control-label')); ?>
		<div class="controls"><?php echo $form->textField($model,'path_file',array('size'=>60,'maxlength'=>128,)); ?>
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
