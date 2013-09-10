<div class="row-fluid">
    <div class="span3" >
        <div class="search">
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <div class="tab-content" style="overflow-y: visible;width: fit-content">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo ($search_type=='flight' || $search_type=='')?'active':''?>"><a href="#tab1" data-toggle="tab">Pesawat</a></li>
                        <li class="<?php echo ($search_type=='travel')?'active':''?>"><a href="#tab2" data-toggle="tab">Travel</a></li>
                        <li class="<?php echo ($search_type=='kapal')?'active':''?>"><a href="#tab3" data-toggle="tab">Kapal</a></li>
                    </ul>
                    <div class="tab-pane <?php echo ($search_type=='flight' || $search_type=='')?'active':''?>" id="tab1">
                        <p><?php $this->renderPartial('flight_form',array('airport'=>$airport,'from'=>$from,'to'=>$to,'tanggal_berangkat'=>$tanggal_berangkat,'tanggal_pulang'=>$tanggal_pulang))?></p>
                    </div>
                    <div class="tab-pane <?php echo ($search_type=='travel')?'active':''?>" id="tab2" style="">
                        <p><?php $this->renderPartial('travel_form',array('travel'=>$travel))?></p>
                    </div>
                    <div class="tab-pane <?php echo ($search_type=='kapal')?'active':''?>" id="tab3">
                        <p>
                        <?php $this->renderPartial('kapal_form')?>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="titleHeader clearfix">
                <h3>Search</h3>
            </div>
            
        </div><!--end search-->
    </div><!--end span3-->
    
    <div class="span8" id="home-content">
        <?php
        switch ($search_type){
                    case "flight": 
                        if(isset($flight['go_det']))
                            $this->renderPartial('flight',array(
                                'flight'=>$flight
                            ));
                        else{
                            ?><div class="alert alert-error"><?php echo $flight['diagnostic']['error_msgs']?></div><?php
                        }
                        break;
                    case "kapal": 
                        if(isset($kapal))
                            $this->renderPartial('kapal',array(
                                'kapal'=>$kapal
                            ));
                        break;
                    case "travel": 
                        if(isset($travel))
                            $this->renderPartial('travel',array(
                                'travel'=>$travel
                            ));
                        break;
                        
                }
        ?>
    </div><!--end span8-->
</div><!--end row-->
<script type="text/javascript">
    $(document).ready(function(){
        $('.tanggal').datepicker();
        $('form').formatTanggal();      
        $('input[name=type_berangkat]').click(function(){
           initDatePicker();
        });
        function initDatePicker(){
            $("#from,#to").datepicker("destroy");
            if($('input[name=type_berangkat]:checked').attr('value')=='pergi'){
               $('.pulang').hide();
               $('input.pulang').attr('value','');
               $( "#from" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function( selectedDate ) {
//                      $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                  });
           }else{
               $('.pulang').show();
               $( "#from" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function( selectedDate ) {
                      $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                  });
                  $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function( selectedDate ) {
                      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                    }
                  });
           }
        }
        initDatePicker();
    });
    
</script>