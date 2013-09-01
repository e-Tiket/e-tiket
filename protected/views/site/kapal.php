<div class="titleHeader clearfix">
    <h3>Hasil Pencarian Jadwal Kapal</h3>
</div>
<div class="tab-content">
    <table class="table">
        <thead>
            <tr>
                <th><h5>Kapal</h5></th>
                <th><h5>Pergi</h5></th>
                <th><h5>Tiba</h5></th>
                <th><h5>Tarif</h5></th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($kapal as $k){
                ?>
                    <tr>
                        <td><?php echo $k['kapal']?></td>
                        <td><?php echo $k['tanggal_berangkat'].' '.$k['jam_berangkat']?></td>
                        <td><?php echo $k['tanggal_sampai'].' '.$k['jam_sampai']?></td>
                        <td><a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('kapal/lihatTarif',array('id'=>$k['id']))?>" target="ajax-modal"><i class="icon icon-list"></i> Lihat Detail Tarif</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php
            }
            
            ?>
        </tbody>
    </table>
    <?php 
    
    if(count($kapal)==0){
        Helper::alert("Jadwal kapal tidak ditemukan", 'danger');
    }
    ?>
</div>