<?php
/** @var Custommer $user */
if (!Helper::getUserLogin()->isLogin()) {
        ?><div class="alert alert-info">Untuk mempermudah pembelian tiket, silakan 
            <a href="<?php echo Yii::app()->createUrl('user/login',array('urlReturn'=>  Yii::app()->createUrl("travel/travelOrder", array("id"=>Helper::getQuery("id"),"tanggal"=>Helper::getQuery("tanggal")))))?>" target="ajax-modal" class=""><b>login</b></a>
            terlebih dahulu!</div><?php
}
?>
<form class="form-horizontal" id="travel-order-form" method="POST">
    <div class="modal-header">
        <!--<a class="close" data-dismiss="modal">&times;</a>-->
        <h3>Order Travel </h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span5">
                <table class="table">
                    <tr>
                        <td class="title">Agen</td>
                        <td><?php echo $travel->idAgenTravel->nama ?></td>
                    </tr>
                    <tr>
                        <td class="title">Harga</td>
                        <td><?php echo Helper::rupiah($travel->harga) ?></td>
                    </tr>
                    <tr>
                        <td class="title">Rute</td>
                        <td><?php echo $travel->asal . ' - ' . $travel->tujuan ?></td>
                    </tr>
                    <tr>
                        <td class="title">Tanggal</td>
                        <td><?php echo $this->datefmysql(Helper::getQuery('tanggal')) ?></td>
                    </tr>
                    <tr>
                        <td class="title">Jam</td>
                        <td><?php echo $travel->jam_berangkat . ' - ' . $travel->jam_sampai ?></td>
                    </tr>
                    <tr>
                        <td class="title">Sisa Seat</td>
                        <td><?php echo $travel->jumlah_seat - Travel::model()->getSeatTerpakai($travel->id, $tanggal) . ' dari ' . $travel->jumlah_seat . ' seat' ?></td>
                    </tr>
                </table>
            </div>
            <div class="span7">
                <div class="form">    
                    <fieldset>
                        <input type="hidden" name="order[tanggal_berangkat]" value="<?php echo (Helper::getQuery('tanggal'))?>">
                        <div class="control-group">
                            <label class="control-label">Pilih Seat</label>
                            <div class="controls">
                                <table>
                                    <tr>
                                        <td width="30%" style="vertical-align: top">
                                <?php echo CHtml::dropDownList('seat_list', '', $listKosong, array('multiple'=>'multiple','style'=>'width:"10px"','data-selected-text-format'=>"count",'data-width'=>'120px','class'=>'required'))?>
                                        </td>
                                        <td>
                                <?php if($travel->gambar_seat!='' || true){?>
                                        <img src="<?php echo Yii::app()->baseUrl.'/'.($travel->gambar_seat) ?>" width="150px" style="text-align: right">
                                <?php }?>
                                        </td>
                                    </tr>
                                </table>
                            </div>    
                        </div>
                        <div class="control-group">
                            <label class="control-label">Alamat Asal</label>
                            <div class="controls">
                                <textarea name="order[alamat]" cols="50" rows="2" class="span8 required"></textarea>
                            </div>    
                        </div>
                        <div class="control-group">
                            <label class="control-label">Alamat Tujuan</label>
                            <div class="controls">
                                <textarea name="order[alamat_tujuan]" cols="50" rows="2" class="span8 required"></textarea>
                            </div>    
                        </div>
                    </fieldset>
                </div><!-- form -->
            </div>
        </div>
    </div>
    <div class="modal-header">
        <h3>Kontak yang bisa dihubungi</h3>
    </div>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label">Nama</label>
            <div class="controls">
                <input type="text" name="order[nama]" value="<?php echo $user->nama_depan.' '.$user->nama_belakang?>" class="required">
            </div>    
        </div>
        <div class="control-group">
            <label class="control-label">No Telp</label>
            <div class="controls">
                <input type="text" name="order[no_telp]" value="<?php echo $user->no_telp?>" class="required">
            </div>    
        </div>
        <div class="control-group">
            <label class="control-label">Keterangan</label>
            <div class="controls">
                <textarea name="order[keterangan]" cols="50" rows="2" class="span4"></textarea>
            </div>    
        </div>
    </div>
    <div class="modal-footer">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'label' => 'Order Sekarang',
            'buttonType' => 'submit'
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Close',
            'url' => '#',
            'htmlOptions' => array('data-dismiss' => 'modal', 'class' => 'btn btn-warning'),
        ));
        ?></div>    

</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#seat_list').selectpicker({
            countSelectedText:'{0} dari {1} seat'
        });
        $('#travel-order-form').validate();
    })
</script>