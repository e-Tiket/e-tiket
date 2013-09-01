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
                echo $form->dropDownList($model,'id_agen_travel',  AgenTravel::model()->dropdownModel(),array('class'=>'span4','placeholder'=>'Id Agen Travel',)); 
         echo $form->textField($model,'asal',array('size'=>30,'maxlength'=>30,'class'=>'span3','placeholder'=>'Asal',)); 
         echo $form->textField($model,'tujuan',array('size'=>30,'maxlength'=>30,'class'=>'span3','placeholder'=>'Tujuan',)); 
        // echo $form->textField($model,'mobil',array('class'=>'span3','placeholder'=>'Mobil',)); 
        // echo $form->textField($model,'jam_berangkat',array('class'=>'span3','placeholder'=>'Jam Berangkat',)); 
        // echo $form->textField($model,'jam_sampai',array('class'=>'span3','placeholder'=>'Jam Sampai',)); 
        // echo $form->textField($model,'jumlah_seat',array('class'=>'span3','placeholder'=>'Jumlah Seat',)); 
         
        // echo $form->textField($model,'keterangan',array('class'=>'span3','placeholder'=>'Keterangan',)); 
                ?> 
        
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Search',
            'url' => '#',
            'buttonType' => 'submit',
            'htmlOptions' => array('data-dismiss' => 'modal', 'onclick' => "$('#searchForm').submit()"),
        ));
        ?>
        
        <?php $this->endWidget(); ?>    
            </div>
</div>