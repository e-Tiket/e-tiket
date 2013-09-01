<?php
/**
 * @var $this SiteController
 */
?>
<div class="titleHeader clearfix">
    <h3>Flight Order</h3>
</div>
<form method="POST" action="<?php echo Yii::app()->createUrl('flight/orderNow')?>" id="flight-order-form">
<div class="checkout-outer" id="">
    <?php
    $param = $data['search_param'];
    show_order($data['go'], 'go', $data['search_param']);
    if (isset($data['ret'])) {
        show_order($data['ret'], 'ret', $data['search_param']);
    }
    ?>

    <?php

    function show_order($data, $type, $param) {
        $hargaAnak2 = $data['price_child'] == 0 ? $data['price_adult'] : $data['price_child'];
        $hargaBayi = $data['price_infant'] == 0 ? $data['price_adult'] : $data['price_infant'];
        ?>

        <div class="checkout-header"><h4><i class="icon "></i><?php echo ($type == 'go' ? 'Berangkat' : 'Pulang') . ' ' . ($type == 'go' ? $param['tanggal_berangkat'] : $param['tanggal_pulang']) . ' ' . $data['full_via'] ?></h4></div>
        <div class="checkout-content">
            <table class=""  style="border: none">
                    <tr>
                    <td style="width:15%;">    
                        <div class="thumbnail"><img src="<?php echo $data['image'] ?>" alt="logo maskapai" class="img-rounded"></div><br>
                            <?php echo $data['flight_number'] ?>
                        
                    </td>
                    <td valign="top" style="padding-left: 20px">
                        <table>
                            <tr>
                                <td style="width: 100px">Dewasa</td>
                                <td style="text-align: right;width: 150px"><?php echo "$param[dewasa] x " . Helper::rupiah($data['price_adult'], false) ?></td>
                                <td class="jumlahBayar" style="text-align: right;width: 150px"><?php echo Helper::rupiah($param['dewasa'] * $data['price_adult'], false) ?></td>
                            </tr>
                            <?php if ($param['anak'] > 0) { ?>
                                <tr>
                                    <td style="padding-left: 2em">Anak-anak</td>
                                    <td style="text-align: right"><?php echo "$param[anak] x " . Helper::rupiah($hargaAnak2, false) ?></td>
                                    <td class="jumlahBayar" style="text-align: right"><?php echo Helper::rupiah($param['anak'] * $hargaAnak2, false) ?></td>
                                </tr>
                            <?php }
                            if ($param['bayi'] > 0) {
                                ?>
                                <tr>
                                    <td>Bayi</td>
                                    <td style="text-align: right"><?php echo "$param[bayi] x " . Helper::rupiah($hargaBayi, false) ?></td>
                                    <td class="jumlahBayar" style="text-align: right"><?php echo Helper::rupiah($param['bayi'] * $hargaBayi, false) ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><i class='icon icon-lock'></i> Bagasi: <?php echo $data['need_baggage'] ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }

    if (!Helper::getUserLogin()->isLogin()) {
        ?><div class="alert alert-info">Untuk mempermudah pembelian tiket, silakan login terlebih dahulu!</div><?php
    $this->renderPartial('//user/login', array('urlReturn' => Yii::app()->createUrl('site/flightOrder')));
} else {
    ?>

        <div class="checkout-header"><h4>Data Penumpang</h4></div>
        <div class="checkout-content" style="height: fit-content">
    <?php
    for ($i = 0; $i < ($param['anak'] + $param['dewasa'] + $param['bayi']); $i++) {
        ?>
                <table>
                    <tr>
                         <td style="vertical-align: top">Title</td>
                         <td style="vertical-align: top">
                            <?php echo CHtml::dropDownList("penumpang[$i][title]", '', Helper::getTitleList());?>
                        </td>
                    </tr>
                    <tr>
                         <td style="vertical-align: top">Nama</td>
                         <td style="vertical-align: top">
                            <input type="text" name="penumpang[<?php $i ?>][nama_depan]" class="span2 required" placeholder="nama depan">
                            <input type="text" name="penumpang[<?php $i ?>][nama_belakang]" class="span3" placeholder="nama belakang">
                        </td>
                    </tr>
                    <tr>
                         <td style="vertical-align: top">No Identitas</td>
                         <td style="vertical-align: top">
                            <input type="text" name="penumpang[<?php $i ?>][no_identitas]" class="span2" >
                        </td>
                    </tr>
                    <tr>
                         <td style="vertical-align: top">Tgl. Lahir</td>
                         <td style="vertical-align: top">
                             <input type="text" name="penumpang[<?php $i ?>][tgl_lahir]" class="span2 tanggal" placeholder="dd/mm/yyyy">
                        </td>
                    </tr>
                </table>    
            <hr>
            <?php
        }
        ?>
        </div>
    <?
}
?>
</div>
<div class="modal-footer">
    <button class="btn btn-primary">Simpan</button>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('.tanggal').datepicker({
            'changeMonth':true,
            'changeYear':true,
            
        });
        $('#flight-order-form').validate();
        $('#flight-order-form').formatTanggal();
    })
</script>