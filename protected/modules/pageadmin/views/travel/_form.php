<?php
/* @var $this TravelController */
/* @var $model Travel */
?>

<?php
$form = $this->beginWidget('MyCActiveForm', array(
    'id' => 'travel-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')
        ));
/* @var $form CActiveForm */
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo $model->isNewRecord ? 'Tambah' : 'Edit' ?> Travel </h3>
</div>
<div class="modal-body" >
    <div class="form">    
        <fieldset>
            <?php echo $form->errorSummary($model); ?>
            <div class="span4">
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'id_agen_travel', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model, 'id_agen_travel', AgenTravel::model()->dropdownModel(), array()); ?>
                        <?php echo $form->error($model, 'id_agen_travel'); ?>
                    </div>    
                </div>    
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'tujuan', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'tujuan', array('size' => 30, 'maxlength' => 30,)); ?>
                        <?php echo $form->error($model, 'tujuan'); ?>
                    </div>    
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($model, 'mobil', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'mobil', array()); ?>
                        <?php echo $form->error($model, 'mobil'); ?>
                    </div>    
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($model, 'jam_berangkat', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'jam_berangkat', array()); ?>
                        <?php echo $form->error($model, 'jam_berangkat'); ?>
                    </div>    
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($model, 'jam_sampai', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'jam_sampai', array()); ?>
                        <?php echo $form->error($model, 'jam_sampai'); ?>
                    </div>    
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($model, 'jumlah_seat', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'jumlah_seat', array()); ?>
                        <?php echo $form->error($model, 'jumlah_seat'); ?>
                    </div>    
                </div>
            </div>    
            <div class="span4">
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'harga', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'harga', array('size' => 30, 'maxlength' => 30,)); ?>
                        <?php echo $form->error($model, 'harga'); ?>
                    </div>    
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'asal', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'asal', array('size' => 30, 'maxlength' => 30,)); ?>
                        <?php echo $form->error($model, 'asal'); ?>
                    </div>    
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($model, 'keterangan', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model, 'keterangan', array()); ?>
                        <?php echo $form->error($model, 'keterangan'); ?>
                    </div>    
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'gambar_seat', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->fileField($model, 'gambar_seat'); ?>
                        <?php echo $form->error($model, 'gambar_seat'); ?>
                        <?php
                        if (!$model->isNewRecord && $model->gambar_seat != '') {
                            ?><i class="inline small" style="font-size: 0.75em;width: 100%">* Kosongkan jika tidak ingin diganti</i>
                            <div class="clear"></div>
                            <img src="<?php echo Yii::app()->baseUrl.'/'.($model->gambar_seat) ?>" width="100px"><?php
                        }
                        ?>
                    </div>    
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
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal', 'class' => 'btn btn-warning'),
    ));
    ?></div>    

<?php $this->endWidget(); ?>
