<div class="controls">
    <div class="input-append">
        
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->getModule()->getName().'/notificationAdmin'),
            'method' => 'get',
                ));
        /* @var $form CActiveForm          */
        ?>    
                <?php 
//         echo $form->textField($model,'id',array('class'=>'span3','placeholder'=>'Id',)); 
         echo $form->dropDownList($model, 'url', array(''=>'Semua Jenis Notifikasi','pesan/view'=>'Booking','bayarSaldo/view'=>'Tambah Saldo'),array('class'=>'span3'));
         echo $form->dropDownList($model, 'read_by', array(''=>'Semua','0'=>'Belum Terbaca','1'=>'Sudah dibaca'),array('class'=>'span3'));
         
//         echo $form->textField($model,'waktu',array('class'=>'span3','placeholder'=>'Waktu',)); 
//         echo $form->textField($model,'read_by',array('class'=>'span3','placeholder'=>'Read By',)); 
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