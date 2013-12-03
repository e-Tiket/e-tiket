<?php
/* @var $this DefaultController*/
?>
<div class="slider">
    <div class="portfolio portfolio-page container">
        <div class="row">
            <div class="span8 offset1">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        foreach($photoList as $photo){
                            ?>
                            <li data-thumb="<?php echo Helper::getImageUrl($this->getGalleryThumbPath($photo['path_file']))?>">
                                <img src="<?php echo Helper::getImageUrl($this->getGalleryPath($photo['path_file']))?>">
                                <p class="flex-caption" style="width: 100%"><?php echo $photo['deskripsi']?></p>
                            </li>    
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="span3">
                <div class="mediamgr_rightinner">
                    <h4>Browse Files</h4>
                </div>
                <ul class="nav nav-list">
                    <?php foreach ($galleryList as $gallery):?>
                        <li class="">
                            <a href="">
                                <?php echo $gallery['nama']?>
                            </a>
                        </li>
                    <?php endforeach;?>    
                    </ul>
            </div>
        </div>
    </div>
</div>
