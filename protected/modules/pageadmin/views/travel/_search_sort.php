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
         echo $form->textField($model,'id_kota_asal',array('class'=>'span3','placeholder'=>'Id Kota Asal',)); 
         echo $form->textField($model,'id_kota_tujuan',array('class'=>'span3','placeholder'=>'Id Kota Tujuan',)); 
        // echo $form->textField($model,'mobil',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Mobil',)); 
        // echo $form->textField($model,'harga',array('class'=>'span3','placeholder'=>'Harga',)); 
        // echo $form->textField($model,'jam_berangkat',array('class'=>'span3','placeholder'=>'Jam Berangkat',)); 
        // echo $form->textField($model,'jam_sampai',array('class'=>'span3','placeholder'=>'Jam Sampai',)); 
        // echo $form->textField($model,'id_agen_travel',array('class'=>'span3','placeholder'=>'Id Agen Travel',)); 
        // echo $form->textField($model,'keterangan',array('size'=>60,'maxlength'=>100,'class'=>'span3','placeholder'=>'Keterangan',)); 
        // echo $form->textField($model,'is_active',array('class'=>'span3','placeholder'=>'Is Active',)); 
        // echo $form->textField($model,'id_travel_seat',array('class'=>'span3','placeholder'=>'Id Travel Seat',)); 
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