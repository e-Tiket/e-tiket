<!DOCTYPE html>
<html lang="en">
<head>
        <title><?php echo $this->title?></title>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
        <script type="text/javascript">
            function base_url(){
                return "<?php echo Yii::app()->baseUrl?>";
            }
        </script>	
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.autocomplete.css" type="text/css" />
        <!--<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-datetimepicker.css" type="text/css" />-->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/prettify/prettify.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/elfinder/css/elfinder.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/elfinder/css/theme.css">
        
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/prettify/prettify.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.chosen.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/dialog.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.timer.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/notification.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/elfinder/elfinder.min.js"></script>
        <script type="text/javascript">
            function site_url(){
                return "<?php echo Yii::app()->getBaseUrl()?>/index.php/pageadmin";
            }
            function base_url(){
                return "<?php echo Yii::app()->getBaseUrl()?>/index.php/pageadmin";
            }
        </script>
</head>

<body>

<div class="mainwrapper">
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">

        <div class="logopanel">
            <h1><a href="dashboard.html">E-Tiket Admin</a></h1>
        </div><!--logopanel-->
            
        <div class="datewidget breadcrumbwidget">&nbsp;<span id="date_time"></span></div>
        <script type="text/javascript">window.onload = date_time('date_time');</script>
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
                <?php
                $userType = Yii::app()->user->getUserType();
                foreach ($this->widget('ext.MainMenu')->getMenu() as $menu) {
                    foreach ($menu['menu'] as $m) {
                        $param = array();
                        if (isset($m['param'])) {
                            $param = $m['param'];
                        }
                        if ($userType=="admin" || ($userType=="operator" && $m['access']['admin']==0)) {
                            ?><li class=""><a class="ajax-link" href="<?php echo Yii::app()->createUrl($m['url'], $param) ?>"><i class="icon-th-list"></i> <span class="hidden-tablet"><?php echo $m['title'] ?></span></a></li><?php
                        }
                    }
                }
                    ?>
            </ul>
        </div><!--leftmenu-->
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
      <div class="headerpanel">
            <a href="#" class="showmenu"></a>
            
            <div class="headerright" style="display: inline">
            	<div class="dropdown notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="http://themepixels.com/page.html">
                        <span class="iconsweets-globe iconsweets-white"></span> <div id="notificationCount" style="color: red;display: inline;font-weight: bold"> <?php echo NotificationAdmin::model()->countUnreadNotification()?></div>
                    </a>
                    <?php
                    $notification=  NotificationAdmin::model()->getNotification();
                    ?>
                    <ul class="dropdown-menu" id="notificationList">
                        <?php
                        foreach($notification as $n){
                            ?><li <?php echo ($n['read_by']=='')?'style="background-color: #f1f1f1"':''?>>
                               <a href="<?php echo Yii::app()->createUrl($this->getModule()->getName()."/notificationAdmin/viewNotif",array('id'=>$n['id']))?>">
                                <span class="icon-user"></span>
                                <?php echo $n['message']?>
                                <br/>
                                <small><?php echo $n['waktu']?></small>
                                </a>
                            </li><?php
                        }
                        ?>
                        <li class="viewmore"><a href="<?php echo Yii::app()->createUrl($this->getModule()->getName().'/notificationAdmin/view')?>">View More Notifications</a></li>
                    </ul>
                </div><!--dropdown-->
                
                <script type="text/javascript">
                    var LAST_NOTIF='<?php echo (count($notification)>0)?$notification[0]['waktu']:'0000-00-00 00:00:00'?>';
                </script>
                <div class="dropdown">
                    <a href="<?php echo Yii::app()->createUrl($this->getModule()->getName().'/site/logout')?>" title="Sign Out"><span class="icon-off icon-white"></span></a>
                    <a target="ajax-modal" href="<?php echo Yii::app()->createUrl($this->getModule()->getName().'/admin/update',array('id'=>  Yii::app()->user->getUserId(),'returnUrl'=>  Yii::app()->createUrl('')))?>" title="Ganti Password"><span class="icon-user icon-white"></span></a>
                </div>    		
            </div><!--headerright-->
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
            <ul class="breadcrumb">
                <li><?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?>
                </li>
            </ul>
        </div><!--breadcrumbs-->  
        <div class="modal hide fade" id="myModelDialog" ></div>
        <div class="modal hide fade" id="myModal"></div>
        <div class="maincontent">
        	<div class="contentinner content-dashboard">
                <?php
                $isShowMessage=true;
                if(isset($_SESSION['success'])){
                    $alert='alert-success';
                    $pesan=$_SESSION['success'];
                    unset($_SESSION['success']);
                }else if(isset($_SESSION['failed'])){
                    $alert='alert-erroe';
                    $pesan=$_SESSION['failed'];
                    unset($_SESSION['failed']);
                }else{
                    $isShowMessage=false;
                }
                ?>    
                <?php if($isShowMessage):?>    
            	<div class="alert <?php echo $alert;?>">
                	<button type="button" class="close" data-dismiss="alert"> x </button>
                        <?php echo $pesan?>
                </div><!--alert-->
                <?php endif;?>
                <div class="row-fluid">
                