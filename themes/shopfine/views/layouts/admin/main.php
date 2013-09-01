<?php $this->renderPartial('//layouts/layout_top');?>
<div class="span3">
    <ul class="unstyled my-account">
                <?php
                $userType = Yii::app()->user->getUserType();
                foreach ($this->widget('ext.MainMenu')->getAdminMenu() as $menu) {
                    foreach ($menu['menu'] as $m) {
                        $param = array();
                        if (isset($m['param'])) {
                            $param = $m['param'];
                        }
                        if (isset($m['access'][$userType]) && $m['access'][$userType]) {
                            ?><li class=""><a class="invarseColor" href="<?php echo Yii::app()->createUrl(($this->is_admin?'pageadmin/':'').$m['url'], $param) ?>"><i class="icon-caret-right"></i> <span class="hidden-tablet"><?php echo $m['title'] ?></span></a></li><?php
                        }
                    }
                }
                    ?>
    </ul>
</div>
<div class="span9"><?php echo $content;?></div>
<?php $this->renderPartial('//layouts/layout_bottom');?>