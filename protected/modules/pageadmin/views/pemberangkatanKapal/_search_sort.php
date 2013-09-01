<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
                ));
        ?>    
        
                <?php 
         echo $form->dropdownList($model,'id_pelabuhan_awal',  Pelabuhan::model()->dropdownModel('Pelabuhan Awal'),array('class'=>'span4 chosen')); 
         echo $form->dropdownList($model,'id_pelabuhan_tujuan',  Pelabuhan::model()->dropdownModel('Pelabuhan Tujuan'),array('class'=>'span4 chosen')); 
         echo $form->dropdownList($model,'id_kapal',Kapal::model()->dropdownModel(),array('class'=>'span4 chosen','placeholder'=>'Id Kapal',)); 
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