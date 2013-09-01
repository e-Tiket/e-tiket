<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$label=($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

?>

<h3>Manage <?php echo ($this->class2name($this->modelClass)); ?></h3>
<hr>
<div class="row-fluid">
<div class="span5" style="text-align: left">
    <div class="cms-admin-buttons">
        <?php
        $urlClass=(($this->getModuleID()!=null && $this->getModuleID()!='')?$this->getModuleID().'/':'').$this->getControllerID()."";
        echo "
        <?php \$this->widget('bootstrap.widgets.TbButton',array(
                'icon'=>'plus white',
                'label'=>'Tambah ".($this->class2name($this->modelClass))."',
                'url'=>Yii::app()->createUrl('$urlClass/create'),
                'type'=>'primary',
                'htmlOptions'=>array('target' => 'ajax-modal')
        )); ?>    
        ";
        ?>
    </div>
</div>
<div class="span7" style="text-align: right">
   <?php
   echo "
    <?php \$this->renderPartial('_search_sort',array(
            'model'=>\$model,
    )); ?>
    ";
   ?>    
</div>
</div>

<?php echo "<?php"; ?> $this->widget('MyCGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(Yii::app()->request->getQuery('<?php echo $this->modelClass?>',array())),
	//'filter'=>$model,
	'columns'=>array(
            array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    'htmlOptions'=>array('align'=>'center','style'=>'width: 5%')
                ),
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
        if($column->autoIncrement)
		continue;
	if(++$count==7)
		echo "\t\t/*\n";
        $label=ucwords(trim(strtolower(str_replace(array('-','_'),' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $column->name)))));
	$label=preg_replace('/\s+/',' ',$label);
	echo "\t\t'".$column->name.'::'.$label."',\n";
}

if($count>=7)
	echo "\t\t*/\n";
?>
		array(
                    'class'=>'MyCButtonColumn',
                    'buttons'=>array(
                        'view'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'View'),
                            'url' => 'Yii::app()->createUrl("<?php echo $urlClass?>/view/", array("id"=>$data["id"]))',
                        ),
                        'update'=>array(
                            'options'=>array('target'=>'ajax-modal','title'=>'Edit'),
                            'url' => 'Yii::app()->createUrl("<?php echo $urlClass?>/update/", array("id"=>$data["id"]))',
                        ),
                        'delete'=>array(
                            'url' => 'Yii::app()->createUrl("<?php echo $urlClass?>/delete/", array("id"=>$data["id"]))',
                        ),
                    ),
                    'header'=>'Action'
		),
	),
)); ?>

<?php
echo "
 <?php 
    \$this->renderPartial('_search',array(
            'model'=>\$model,
    )); 
    ?>    
";
?>