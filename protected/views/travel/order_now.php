<?php
/* @var $travel Travel */
?>
<form class="form-horizontal">
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Travel </h3>
</div>
<div class="modal-body">
    <table class="table">
        <tr>
            <td class="title">Agen</td>
            <td><?php  echo $travel->idAgenTravel->nama?></td>
        </tr>
        <tr>
            <td class="title">Harga</td>
            <td><?php  echo $travel->harga?></td>
        </tr>
        <tr>
            <td class="title">Rute</td>
            <td><?php  echo $travel->asal.' - '.$travel->tujuan?></td>
        </tr>
        <tr>
            <td class="title">Jam</td>
            <td><?php  echo $travel->jam_berangkat.' - '.$travel->jam_sampai?></td>
        </tr>
        <tr>
            <td class="title">Sisa Seat</td>
            <td><?php  echo $travel->jumlah_seat-Travel::model()->getSeatTerpakai($travel->id,$tanggal).' dari '.$travel->jumlah_seat.' seat'?></td>
        </tr>
    </table>
    <div class="form">    
        <fieldset>
	
        <div class="control-group">
                <label class="control-label">Pilih Seat</label>
                <div class="controls">
                    
                </div>    
	</div>
            
            
	

        </fieldset>
    </div><!-- form -->
</div>
<div class="modal-footer">
    <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => 'Order Sekarang',
                'buttonType' => 'submit'
            ));
            ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
            )); ?></div>    

</form>