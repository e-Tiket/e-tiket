<?php
/* @var $this NotificationAdminController */
/* @var $model NotificationAdmin */

$this->breadcrumbs=array(
	'Notification Admin'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NotificationAdmin', 'url'=>array('index')),
	array('label'=>'Create NotificationAdmin', 'url'=>array('create')),
);

?>

<h3>Manage Notification Admin</h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <a href="<?php echo Yii::app()->createUrl($this->getModule()->getName()."/notificationAdmin/markAsRead")?>" class="btn btn-primary"onclick="return confirm('Apakah anda yakin?')"><i class="icon icon-ok-circle icon-white"></i> Tandai Sudah Terbaca Semua</a>
</div>
<div class="span7" style="text-align: right">
   
    <?php $this->renderPartial('_search_sort',array(
            'model'=>$model,
    )); ?>
        
</div>
</div>    

<?php 
    
    $this->widget('MyCGridView', array(
	'id'=>'notification-admin-grid',
	'dataProvider'=>$model->search2(Yii::app()->request->getQuery('NotificationAdmin',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                'header'=>'Notification',
                'value'=>'"<div class=\"span8\">".CHtml::link($data["message"], Yii::app()->createUrl("pageadmin/notificationAdmin/viewNotif",array("id"=>$data["id"])),array("style"=>"color: ".($data["read_by"]==""?"red":"")))."</div><div class=\"span4\" style=\"text-align: right\"> ".$data["waktu"]."</div>"',
                'type'=>'raw',
//                'htmlOptions'=>array('class'=>'tes')
            ),
	),
)); ?>
 <?php 
    $this->renderPartial('_search',array(
            'model'=>$model,
    )); 
    ?>    
