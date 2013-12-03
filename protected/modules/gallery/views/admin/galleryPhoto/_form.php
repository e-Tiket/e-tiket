<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'gallery-photo-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal','enctype' => 'multipart/form-data')
)); 
/* @var $form MyCActiveForm */
?>

<div class="mediaWrapper row-fluid">
	<div class="span5 imginfo">
        <p style="margin-top: 10px;">
            <img src="<?php echo $model->isNewRecord?Helper::getImageUrl('upload/no-image.png'):Helper::getImageUrl($this->getGalleryPath().'/'.$model->path_file)?>" alt="" class="imgpreview img-polaroid"/>
                <?php echo $form->fileField($model, 'path_file')?>
                <?php echo $model->isNewRecord?'':'*) <i>Kosongkan jika tidak ingin diganti</i>'?>
        	<!--<a href="#" class="btn"><span class="icon-pencil"></span> Edit Document</a> &nbsp;--> 
        	<a href="#" class="btn"><span class="icon-download"></span> Download</a>    
                
        </p>
<!--        <p>
        	<strong>Filename:</strong> Tutorial1.pdf <br />
        	<strong>File Type:</strong> application/pdf <br />
        	<strong>Upload Date:</strong> Dec 21, 2012 <br />
        	<strong>Pages:</strong> 231 <br />
        	<strong>Uploaded by:</strong> <a href="#">katniss</a>
        </p>-->
    </div><!--span3-->
    <div class="span7 imgdetails">
        <p><?php echo $form->errorSummary($model); ?></p>
    	<p>
            <?php echo $form->labelEx($model,'id_gallery',array('class'=>'')); ?>
            <?php echo $form->dropDownList($model,'id_gallery',  Gallery::model()->dropdownModel()); ?>
            <?php echo $form->error($model,'id_gallery'); ?>
        </p>
        <p>
            <?php echo $form->labelEx($model,'nama',array('class'=>'')); ?>
            <?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>512,)); ?>
            <?php echo $form->error($model,'nama'); ?>
        </p>
        <p>
        	<?php echo $form->labelEx($model,'deskripsi',array('class'=>'')); ?>
                <?php echo $form->textArea($model,'deskripsi',array('rows'=>6, 'cols'=>50,)); ?>
                <?php echo $form->error($model,'deskripsi'); ?>
        </p>
        <br />
        <p>
        	<button class="btn btn-primary">Save Changes</button>
        </p>
    </div><!--span3-->
</div><!--imageWrapper-->
<?php $this->endWidget(); ?>