<?php
/* @var $this ArtikelController */
/* @var $model Artikel */

?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'artikel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); 
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit'?> Artikel </h3>
</div>
<div class="modal-body">
    <div class="form" style="width: content-box">    
        <fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'judul',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>100,)); ?>
                    <?php echo $form->error($model,'judul'); ?>
                </div>    
	</div>
        <div class="control-group">
		<?php echo $form->labelEx($model,'id_kategori',array('class'=>'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'id_kategori',  KategoriArtikel::model()->dropdownModel(),array()); ?>
                    <?php echo $form->error($model,'id_kategori'); ?>
                </div>    
	</div>    
	<!--<div class="control-group">-->
		<?php // echo $form->labelEx($model,'isi',array('class'=>'control-label')); ?>
                <!--<div class="controls">-->
                    <?php echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>80,'class'=>'cleditor')); ?>
                    <?php echo $form->error($model,'isi'); ?>
                <!--</div>-->    
	<!--</div>-->
        
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
