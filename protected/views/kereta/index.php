<div class="span8">
    
    <?php 
    if($content==""){
        ?><div class="alert alert-info">Isi Form untuk melakukan pencarian</div><?php
    }else
        echo $content?>
</div>
<div class="span4">
    <?php echo $form?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name=children],select[name=adult],select[name=infant]').addClass("span1");
        $('form[name=input]').attr('action',"<?php Yii::app()->createUrl('kereta')?>"+$('form[name=input]').attr('action'));
        $('table.itJadwalText').addClass('table table-bordered');
        $('input[value=Booking]').hide();
    })
</script>