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
         echo $form->textField($model,'nama',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Nama',)); 
         echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>100,'class'=>'span3','placeholder'=>'Alamat',)); 
        // echo $form->textField($model,'no_telp',array('size'=>15,'maxlength'=>15,'class'=>'span3','placeholder'=>'No Telp',)); 
        // echo $form->textField($model,'id_admin',array('class'=>'span3','placeholder'=>'Id Admin',)); 
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