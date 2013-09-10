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
         echo $form->textField($model,'bayar_via',array('size'=>32,'maxlength'=>32,'class'=>'span3','placeholder'=>'Bayar Via',)); 
         echo $form->textField($model,'bayar_bank',array('size'=>20,'maxlength'=>20,'class'=>'span3','placeholder'=>'Bayar Bank',)); 
        // echo $form->textField($model,'bayar_total',array('class'=>'span3','placeholder'=>'Bayar Total',)); 
        // echo $form->textField($model,'pay_keterangan',array('size'=>50,'maxlength'=>50,'class'=>'span3','placeholder'=>'Pay Keterangan',)); 
        // echo $form->textField($model,'id_custommer',array('class'=>'span3','placeholder'=>'Id Custommer',)); 
        // echo $form->textField($model,'waktu',array('class'=>'span3','placeholder'=>'Waktu',)); 
        // echo $form->textField($model,'total_tagihan',array('class'=>'span3','placeholder'=>'Total Tagihan',)); 
        // echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10,'class'=>'span3','placeholder'=>'Status',)); 
        // echo $form->textField($model,'jenis_order',array('size'=>6,'maxlength'=>6,'class'=>'span3','placeholder'=>'Jenis Order',)); 
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