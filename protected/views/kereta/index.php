<div class="row-fluid">
    <div class="span4">
        <?php echo $form ?>
    </div>
    <div class="span8">
        
        <?php
        if ($content == "") {
            ?><div class="alert alert-info">Isi Form untuk melakukan pencarian</div><?php
        }
        else{
            ?><div class="alert alert-info">Pemesanan Bisa dilakukan dengan munghubungi CS kami</div><?php
            echo $content;
        }?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name=children],select[name=adult],select[name=infant]').addClass("span14");
        $('form[name=input]').attr('action',"<?php Yii::app()->createUrl('kereta')?>"+$('form[name=input]').attr('action'));
        $('table.itJadwalText').addClass('');
        $('input[value=Booking]').hide();
        $('input[value="Cek Kode Booking"]').hide();
        $('img[alt="Banner - Channel Alternatif"]').hide();
    })
</script>
<style>
    tr.itRowTable0 td, .itRowTable1, .itRowTable2{
        border-width: thin;
    }
    div.item-page h1{
        font-size: 1.5em;
    }
</style>