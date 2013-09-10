<div style="display: none" id="flightSelected" class='register'>
    <div class="checkout-outer" id="goFlightSelected"></div>
    <div class="clear"></div>
    <div class="checkout-outer" id="returnFlightSelected"></div>
    <div class="clear"></div>
    <div class="" id="jumlahTagihan" style="text-align: right"></div>
    <form action="<?php echo Yii::app()->createUrl('site/flightOrder')?>" method="POST">
        <input type="hidden" name="param" id="pesanParam"value="">
        <button href="#" id="pesanBtn" class="btn btn-primary" style="width: 100%">Pesan</button>
    </form>
</div>
<div class="titleHeader clearfix">
    <h3>Hasil Pencarian</h3>
</div>
<div class="tab-content">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#pergiTab" data-toggle="tab">
                Pergi <?php echo $flight['go_det']['dep_airport']['airport_code'].'-'.$flight['go_det']['arr_airport']['airport_code'].'<br>'.Yii::app()->request->getParam('tanggal_berangkat')?>
            </a>
        </li>
        <?php if(isset($flight['ret_det'])){?>
        <li>
            <a href="#pulangTab" data-toggle="tab">
                Pulang <?php echo $flight['ret_det']['dep_airport']['airport_code'].'-'.$flight['ret_det']['arr_airport']['airport_code'].'<br>'.Yii::app()->request->getParam('tanggal_pulang')?>
            </a>
        </li>
        <?php }?>
    </ul>
    <div class="tab-pane active" id="pergiTab">
            <?php 
            if(count($flight['departures']['result'])>0)
                showFlightResult($flight['departures']['result'],'go');
            else{
                ?><div class="alert alert-danger">Jadwal tidak ditemukan</div><?php
            }
            ?>
    </div>
    <?php if(isset($flight['ret_det'])){?>
    <div class="tab-pane" id="pulangTab">
        <?php 
            if(isset($flight['returns']['result'])&&count($flight['returns']['result'])>0)
                showFlightResult($flight['returns']['result'],'return');
            else{
                ?><div class="alert alert-danger">Jadwal tidak ditemukan</div><?php
            }
            ?>
    </div>
    <?php }?>
</div>
<?php
    function showFlightResult($flight,$type){
        ?>
            <table class="table">
        <thead>
            <tr>
                <th><h5>Pesawat</h5></th>
                <th><h5>Pergi</h5></th>
                <th><h5>Tiba</h5></th>
                <th><h5>Durasi</h5></th>
                <th><h5>Harga</h5></th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=-1;
            foreach ($flight as $f) { $i++;
                $flightPrice=FlightPrice::model()->getFlightPriceByFlightNumber($f['flight_number']);
                ?>
                <tr>
                    <td>
                        <a href="#"><img src="<?php echo $f['image'] ?>" alt="">&nbsp;&nbsp;<?php echo $f['flight_number'] ?></a>
                    </td>
                    <td><?php echo $f['simple_departure_time']; ?></td>
                    <td><?php echo $f['simple_arrival_time']; ?></td>
                    <td><?php echo $f['duration']; ?></td>
                    <td>
                        <span style="font-size: 1.2em"><?php echo Helper::rupiah($f['price_adult']+$flightPrice['harga_naik']-$flightPrice['harga_turun']); ?></span>
                        <?php if($flightPrice['harga_turun']>0){?>
                            <br>
                            <span style="color: #c90101;text-decoration: line-through;font-size: 0.7em"><?php echo Helper::rupiah($f['price_adult']+$flightPrice['harga_naik'])?></span>
                        <?php }?>
                    </td>
                    <td>
                        <a class="btn btn-small btn-success" href="#" data-title="Edit" data-placement="top" rel="tooltip" onclick="pilihPesawat(<?php echo "'$i','$type'";?>)"><i class="icon-plus"></i> Pesan</a>
                    </td>
                </tr>    
                <?php
            }
            ?>
        </tbody>
    </table>
          <?php
    }
?>
<script type="text/javascript">
    var flightData=<?php echo json_encode($flight)?>;
    var isGoSelected=false;
    var isRetSelected=<?php echo (isset($flight['ret_det']))?'false':'true'?>;
    var goFlightSelected=null;
    var retFlightSelected=null;
    var jsonFlight={'go':null,'ret':null,'search_param':<?php echo json_encode($_GET)?>};
    var anak=<?php echo Yii::app()->getRequest()->getParam('anak',0)?>;
    var dewasa=<?php echo Yii::app()->getRequest()->getParam('dewasa',0)?>;
    var bayi=<?php echo Yii::app()->getRequest()->getParam('bayi',0)?>;
    function pilihPesawat(index,type){
        var flightSelected=null;
        if(type=='go'){
                $.ajax({
                    url:'<?php echo Yii::app()->createUrl('flight/cekPenerbangan') ?>',
                    data:decodeURIComponent($.param(flightData.departures.result[index]))+'&'+decodeURIComponent($.param(jsonFlight.search_param)),
                    cache: false,
                    dataType: 'json',
                    type:'POST',
                    success:function (data){
                        if(data.success){
                            isGoSelected=true;
                            goFlightSelected=flightData.departures.result[index];
                            showFlightSelected(goFlightSelected,'go');
                        }else{
                            noticeFailed("Penerbangan tidak ditemukan");
                        }
                    },error:function(){
                        noticeFailed("Cek data gagal dilakukan");
                    }
                });
            
        }else{//return
            isRetSelected=true;
            retFlightSelected=flightData.returns.result[index];
            showFlightSelected(retFlightSelected,'ret');
        }
        $('#flightSelected').show();
    }
    function showFlightSelected(flight,type){
        var date_go=type=='go'?flightData.search_queries.date:flightData.search_queries.ret_date;
        var hargaAnak2=flight.price_child==0?flight.price_adult:flight.price_child;
        var hargaBayi=flight.price_infant==0?flight.price_adult:flight.price_infant;
        var str=''+
        '<div class="checkout-header"><h4>'+(type=='go'?'Berangkat':'Pulang')+': '+date_go+' '+flight.full_via+'</h4></div>'+
            '<div class="checkout-content">'+
                '<table>\n\
                    <tr>\n\
                        <td>'+
                            '<img src="'+flight.image+'" alt=""><br>'+flight.flight_number+
                        '</td>'+
                        '<td>'+
                            '<table style="width: 100%">'+
                                '<tr>'+
                                    '<td>Dewasa</td>'+
                                    '<td style="text-align: right">'+dewasa+' x '+rupiah(flight.price_adult)+'</td>'+
                                    '<td class="jumlahBayar" style="text-align: right">'+(dewasa*flight.price_adult)+'</td>'+
                                '</tr>';
                        if(anak>0){
                                str+='<tr>'+
                                    '<td>Anak-anak</td>'+
                                    '<td style="text-align: right">'+anak+' x '+rupiah(hargaAnak2)+'</td>'+
                                    '<td class="jumlahBayar" style="text-align: right">'+(anak*hargaAnak2)+'</td>'+
                                '</tr>';
                        }
                        if(bayi>0){
                                str+='<tr>'+
                                    '<td>Bayi</td>'+
                                    '<td style="text-align: right">'+bayi+' x '+rupiah(hargaBayi)+'</td>'+
                                    '<td class="jumlahBayar" style="text-align: right">'+(bayi*hargaBayi)+'</td>'+
                                '</tr>';
                        }
                            str+='</table>'+
                      '</td>\n\
                    </tr>\n\
                </table>'+
        '</div>';
        if(type=='go'){
            $('#goFlightSelected').hide(500);
            $('#goFlightSelected').html(str);
            $('#goFlightSelected').show(500);
        }else{
            $('#returnFlightSelected').hide(500);
            $('#returnFlightSelected').html(str);
            $('#returnFlightSelected').show(500);
        }
        var jumlah=0;
        $('.jumlahBayar').each(function(index){
            jumlah+=$(this).html()*1;
        });
        jsonFlight.go=goFlightSelected;
        jsonFlight.ret=retFlightSelected;
        $('#jumlahTagihan').html("<h3> Jumlah Transaksi: "+jumlah+"</h3>");
//        $('#pesanBtn').attr('href',site_url()+'/site/order?'+decodeURIComponent($.param(jsonFlight)));
    }
    $(document).ready(function(){
        $('#pesanBtn').click(function(event){
            event.preventDefault();
//            $('#pesanParam').attr('value',decodeURIComponent($.param(jsonFlight)));
//            $('#pesanParam').attr('value',decodeURIComponent($.param(jsonFlight)));
            $('#pesanParam').attr('value',(JSON.stringify(jsonFlight)));
            if(!isGoSelected){
                noticeFailed('Maskapai untuk pergi belum dipilih');
            }if(!isRetSelected){
                noticeFailed('Maskapai untuk pulang belum dipilih');
            }
            if(isGoSelected && isRetSelected){
                $('#pesanBtn').unbind('click').submit();
//                $.ajax({
//                    url:'<?php echo Yii::app()->createUrl('site/flightOrder')?>?ajax=1',
//                    data:decodeURIComponent($.param(jsonFlight)),
//                    cache: false,
//                    dataType: 'html',
//                    type:'POST',
//                    success:function (data){
//                        $('#home-content').html(data);
//                    }
//                });
            }
        });
    });
</script>
