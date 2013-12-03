<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
                <?php 
// echo $form->textField($model,'id',array('class'=>'span3','placeholder'=>'Id',)); 
         echo $form->textField($model,'id_gallery',array('class'=>'span3','placeholder'=>'Id Gallery',)); 
         echo $form->textField($model,'rank',array('class'=>'span3','placeholder'=>'Rank',)); 
        // echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>512,'class'=>'span3','placeholder'=>'Nama',)); 
        // echo $form->textArea($model,'deskripsi',array('rows'=>6, 'cols'=>50,'class'=>'span3','placeholder'=>'Deskripsi',)); 
        // echo $form->textField($model,'path_file',array('size'=>60,'maxlength'=>128,'class'=>'span3','placeholder'=>'Nama File',)); 
                ?> 
        
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
        ));
         $this->widget('bootstrap.widgets.TbButton', array(
            'icon' => 'search white',
            'label' => 'Advanced Search',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#searchModal',
            ),
        )); 
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>