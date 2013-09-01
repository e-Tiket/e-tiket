<form>
    Dari<div class="clear"></div>
    <?php echo CHtml::dropDownList('id_pelabuhan_awal', Yii::app()->request->getQuery('id_pelabuhan_awal'), Pelabuhan::model()->dropdownModel(), array('class'=>'chosen'))?><div class="clear"></div>
    Ke<div class="clear"></div>
    <?php echo CHtml::dropDownList('id_pelabuhan_tujuan', Yii::app()->request->getQuery('id_pelabuhan_tujuan'), Pelabuhan::model()->dropdownModel(), array('class'=>'chosen'))?><div class="clear"></div>
    Tanggal<div class="clear"></div>
    <?php echo CHtml::textField('tanggal', Yii::app()->request->getQuery('tanggal'), array('class'=>'tanggal','placeholder'=>'dd/mm/yyyy'))?><div class="clear"></div>
    Sampai<div class="clear"></div>
    <?php echo CHtml::textField('tanggal_sebelum', Yii::app()->request->getQuery('tanggal_sebelum'), array('class'=>'tanggal','placeholder'=>'dd/mm/yyyy'))?><div class="clear"></div>
    <input type="hidden" name="search_type" value="kapal">
    <div class="controls">
        <input type="submit" value="Cari" style="text-align: right">
    </div>
</form>
