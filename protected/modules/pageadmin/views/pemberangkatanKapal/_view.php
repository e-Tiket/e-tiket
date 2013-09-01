<?php
/* @var $this PemberangkatanKapalController */
/* @var $data PemberangkatanKapal */
?>
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pelabuhan_awal')); ?>:</b>
	<?php echo CHtml::encode($data->idPelabuhanAwal->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pelabuhan_tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->idPelabuhanTujuan->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kapal')); ?>:</b>
	<?php echo CHtml::encode($data->idKapal->nama); ?>
	<br />
	<b>Berangkat:</b>
	<?php echo CHtml::encode($data->tanggal_berangkat.' '.$data->jam_berangkat); ?>
	<br />
	<b>Sampai:</b>
	<?php echo CHtml::encode($data->tanggal_sampai.' '.$data->jam_sampai); ?>
	<br />


</div>