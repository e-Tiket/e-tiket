<form id="duplicate"class="form-horizontal" method="POST" action="<?php echo Yii::app()->createUrl('pageadmin/pemberangkatanKapal/duplicate', array('id'=>$pemberangkatan['id']))?>">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3>Gandakan Jadwal</h3>
    </div>
    <div class="modal-body">
        <div class="form">    
            <fieldset>
                <div class="control-group">
                    <label class="control-label">Pelabuhan Awal</label>
                    <div class="controls inline">
                        <?php echo $pemberangkatan['pelabuhan_asal'] ?>
                    </div>    
                </div>
                <div class="control-group">
                    <label class="control-label">Pelabuhan Tujuan</label>
                    <div class="controls inline">
                        <?php echo $pemberangkatan['pelabuhan_tujuan'] ?>
                    </div>    
                </div>
                <div class="control-group">
                    <label class="control-label">Kapal</label>
                    <div class="controls inline">
                        <?php echo $pemberangkatan['kapal'] ?>
                    </div>    
                </div>
                <div class="control-group">
                    <label class="control-label">Berangkat</label>
                    <div class="controls">
                        <?php echo CHtml::textField('tanggal_berangkat','', array('class' => 'tanggal_pemberangkatan span2 tanggal required',)); ?>
                        <div style="display: inline"> Jam </div>    
                        <?php echo CHtml::textField('jam_berangkat','', array('maxlength' => 5, 'class' => 'span1 required','placeholder'=>'00:00',)); ?>
                    </div>    
                </div>
                <div class="control-group">
                    <label class="control-label">Sampai</label>
                    <div class="controls">
                        <?php echo CHtml::textField('tanggal_sampai','', array('class' => 'tanggal_pemberangkatan span2 tanggal required',)); ?>
                        <div style="display: inline"> Jam </div>    
                        <?php echo CHtml::textField('jam_sampai','', array('maxlength' => 5, 'class' => 'span1 required','placeholder'=>'00:00')); ?>
                    </div>    
                </div>
            </fieldset>
        </div><!-- form -->
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary">Gandakan</button>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $('.pelabuhanChosen').chosen();
        $('.tanggal_pemberangkatan').datepicker();
//        $('#duplicate').validate();
        $('#duplicate').formatTanggal();
    });
</script>