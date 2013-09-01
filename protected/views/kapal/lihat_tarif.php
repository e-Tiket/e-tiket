<?php $form=$this->beginWidget('MyCActiveForm', array(
	'id'=>'lihat-tarif-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
)); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Lihat Tarif</h3>
</div>
<div class="modal-body">
    <form action="<?php echo Yii::app()->createUrl("kapal/pesan")?>"></form>
    <div class="form">    
        <fieldset>
	<div class="control-group">
            <label>Tes</label>
                <div class="controls">
                    <input type="text">
                </div>    
	</div>
        </fieldset>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Harga</th>
                    <th>Pesan Kursi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 foreach ($tarifList as $tarif) {
                     ?>
                <tr>
                    <td><?php echo $tarif['kelas']?></td>
                    <td style="text-align: right"><?php echo Helper::rupiah($tarif['harga'],false)?></td>
                    <td><input type="text" name="<?php echo "tarif[$tarif[id]][jumlah]"?>" class="span1 number"></td>
                </tr>
                         <?php
                 }
                ?>
            </tbody>
        </table>
    </div><!-- form -->
</div>
<div class="modal-footer">
    <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'type' => 'primary',
                'label' => 'Pesan Sekarang',
                'buttonType' => 'submit'
            ));
            ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal','class'=>'btn btn-warning'),
            )); ?></div>    
<?php
$this->endWidget();
?>
<script type="text/javascript">
    $(document).ready(function(){
        
    })
</script>