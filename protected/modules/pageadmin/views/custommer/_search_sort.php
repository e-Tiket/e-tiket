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
         echo $form->textField($model,'nama_depan',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Nama Depan',)); 
         echo $form->textField($model,'alamat',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Alamat',)); 
        // echo $form->textField($model,'nama_belakang',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Nama Belakang',)); 
        // echo $form->textField($model,'no_telp',array('size'=>15,'maxlength'=>15,'class'=>'span3','placeholder'=>'No Telp',)); 
        // echo $form->textField($model,'no_telp_lainnya',array('size'=>15,'maxlength'=>15,'class'=>'span3','placeholder'=>'No Telp Lainnya',)); 
        // echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Username',)); 
        // echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Email',)); 
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