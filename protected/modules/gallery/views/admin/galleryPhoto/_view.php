<?php
/* @var $this GalleryPhotoController */
/* @var $data GalleryPhoto */

?>
<li>
    <input type="hidden" class="delete-url" value="<?php echo Yii::app()->createUrl($this->getModuleUrl().'/admin/galleryPhoto/delete',array('id'=>$data->id))?>"/>
    <a href="<?php echo Yii::app()->createUrl($this->getModuleUrl().'/admin/galleryPhoto/update',array('id'=>$data->id))?>" data-rel="image" data-id="<?php echo $data->id?>">
        <img src="<?php echo Yii::app()->baseUrl.'/'.$this->getGalleryThumbPath().'/'.$data->path_file?>" alt="" />
    </a>
    <span class="filename" style=""><?php echo $data->nama?></span>
</li>