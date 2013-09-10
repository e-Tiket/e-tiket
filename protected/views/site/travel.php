<div class="titleHeader clearfix">
    <h3>Hasil Pencarian</h3>
</div>
<?php $this->widget('MyCGridView', array(
	'id'=>'pemberangkatan-kapal-grid',
	'dataProvider'=>Travel::model()->getJadwal(Helper::getQuery('asal'), 
                                Helper::getQuery('tujuan'), Helper::getQuery('tanggal'), Helper::getQuery('tanggal_sebelum'),Helper::getQuery('jumlah')),
        'itemsCssClass'=>'table ',
        'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(
                'mobil::Mobil',
                'asal::Asal',
                'tujuan::Tujuan',
                'tanggal::Tanggal',
                'sisa_seat::Sisa Seat',
                array(
                    'header'=>'Jam',
                    'value'=>'"$data[jam_berangkat] - $data[jam_sampai]"',
                    'htmlOptions'=>array('style'=>'text-align:center'),
                ),
                array(
                    'header'=>'Harga',
                    'value'=>'Helper::rupiah($data["harga"],false)',
                    'htmlOptions'=>array('style'=>'text-align:right'),
                ),
		array(
                    'class'=>'MyCButtonColumn',
                    'template'=>'{tarif}',
                    'htmlOptions'=>array('width'=>'75px'),
                    'buttons'=>array(
                        'tarif'=>array(
                            'options'=>array('target'=>'','title'=>'','class'=>'btn btn-primary btn-large modal-large'),
                            'url' => 'Yii::app()->createUrl("travel/travelOrder", array("id"=>$data["id"],"tanggal"=>$data["tanggal"]))',
                            'label'=>'Pesan',
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>