<div class="modal-header">
    <h3 class="title">History</h3>
</div>
<div class="modal-body">
    <?php $this->widget('MyCGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>  $orderList,
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
                'waktu::Waktu',
		'status::Status',
            array(
                    'header'=>'Total Tagihan',
                    'value'=>'Helper::rupiah($data["total_tagihan"],false)',
                    'htmlOptions'=>array('align'=>'right','style'=>'text-align:right')
                ),
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("pageadmin/order/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("pageadmin/order/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("pageadmin/order/delete/", array("id"=>$data["id"]))',
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>
</div>