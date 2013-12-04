<?php
/* @var $this TravelSeatController */
/* @var $model TravelSeat */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'travel-seat-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> TravelSeat </h3>
</div>
<div class="modal-body">
    <div class="form">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'keterangan',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'keterangan',array('size'=>30,'maxlength'=>30,)); ?>
                    <?php echo $form->error($model,'keterangan'); ?>
                </div>    
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'jumlah',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'jumlah',array()); ?>
                    <?php echo $form->error($model,'jumlah'); ?>
                </div>    
	</div>
        <div class="control-group">
                    <?php echo $form->labelEx($model, 'gambar', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->fileField($model, 'gambar'); ?>
                        <?php echo $form->error($model, 'gambar'); ?>
                        <?php
                        if (!$model->isNewRecord && $model->gambar != '') {
                            ?><i class="inline small" style="font-size: 0.75em;width: 100%"><br>* Kosongkan jika tidak ingin diganti</i>
                            <div class="clear"></div>
                            <img src="<?php echo Yii::app()->baseUrl.'/'.($model->gambar) ?>" width="100px"><?php
                        }
                        ?>
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
