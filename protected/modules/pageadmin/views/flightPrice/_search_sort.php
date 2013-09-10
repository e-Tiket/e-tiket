<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
                <?php 
 echo $form->textField($model,'kd_flight',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Kd Flight',)); 
         echo $form->textField($model,'pesawat',array('size'=>30,'maxlength'=>30,'class'=>'span3','placeholder'=>'Pesawat',)); 
        // echo $form->textField($model,'harga_naik',array('class'=>'span3','placeholder'=>'Harga Naik',)); 
        // echo $form->textField($model,'harga_turun',array('class'=>'span3','placeholder'=>'Harga Turun',)); 
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