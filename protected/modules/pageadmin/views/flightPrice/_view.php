<?php
/* @var $this FlightPriceController */
/* @var $data FlightPrice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_flight')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kd_flight), array('view', 'id'=>$data->kd_flight)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesawat')); ?>:</b>
	<?php echo CHtml::encode($data->pesawat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_naik')); ?>:</b>
	<?php echo CHtml::encode($data->harga_naik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_turun')); ?>:</b>
	<?php echo CHtml::encode($data->harga_turun); ?>
	<br />


</div>