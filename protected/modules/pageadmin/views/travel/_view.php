<?php
/* @var $this TravelController */
/* @var $data Travel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asal')); ?>:</b>
	<?php echo CHtml::encode($data->asal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->tujuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobil')); ?>:</b>
	<?php echo CHtml::encode($data->mobil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_berangkat')); ?>:</b>
	<?php echo CHtml::encode($data->jam_berangkat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jam_sampai')); ?>:</b>
	<?php echo CHtml::encode($data->jam_sampai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_seat')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_seat); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_agen_travel')); ?>:</b>
	<?php echo CHtml::encode($data->id_agen_travel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	*/ ?>

</div>