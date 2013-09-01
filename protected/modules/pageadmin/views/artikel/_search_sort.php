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
         echo $form->textField($model,'id_kategori',array('class'=>'span3','placeholder'=>'Id Kategori',)); 
         echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>100,'class'=>'span3','placeholder'=>'Judul',)); 
        // echo $form->textField($model,'tanggal_post',array('class'=>'span3','placeholder'=>'Tanggal Post',)); 
        // echo $form->textField($model,'id_admin_post',array('class'=>'span3','placeholder'=>'Id Admin Post',)); 
        // echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>50,'class'=>'span3','placeholder'=>'Isi',)); 
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