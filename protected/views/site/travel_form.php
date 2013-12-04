<form action="<?php echo Yii::app()->createUrl('site/index#tab2')?>" name="travel-form">
    Dari<div class="clear"></div>
    <?php echo CHtml::dropDownList('asal', Yii::app()->request->getQuery('asal'), TravelKota::model()->dropdownModel(array('- Pilih Asal Kota -')), array('class'=>'chosen span12'))?><div class="clear"></div>
    Ke<div class="clear"></div>
    <?php echo CHtml::dropDownList('tujuan', Yii::app()->request->getQuery('tujuan'), TravelKota::model()->dropdownModel(array('- Pilih Kota Tujuan -')), array('class'=>'chosen span12'))?><div class="clear"></div>
    Tanggal<div class="clear"></div>
    <?php echo CHtml::textField('tanggal', Yii::app()->request->getQuery('tanggal'), array('class'=>'tanggal span6','placeholder'=>'dd/mm/yyyy'))?><div class="clear"></div>
    Jumlah<div class="clear"></div>
    <?php echo CHtml::textField('jumlah', Yii::app()->request->getQuery('jumlah'), array('class'=>'span4','placeholder'=>''))?><div class="clear"></div>
    <input type="hidden" name="search_type" value="travel" class="">
    <div class="controls">
        <input type="submit" value="Cari" style="text-align: right">
    </div>
</form>