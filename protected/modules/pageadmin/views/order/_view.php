<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bayar_via')); ?>:</b>
	<?php echo CHtml::encode($data->bayar_via); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bayar_bank')); ?>:</b>
	<?php echo CHtml::encode($data->bayar_bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bayar_total')); ?>:</b>
	<?php echo CHtml::encode($data->bayar_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->pay_keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_custommer')); ?>:</b>
	<?php echo CHtml::encode($data->id_custommer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('total_tagihan')); ?>:</b>
	<?php echo CHtml::encode($data->total_tagihan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_order')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_order); ?>
	<br />

	*/ ?>

</div>