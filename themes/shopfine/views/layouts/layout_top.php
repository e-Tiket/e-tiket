<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<html lang="en">
<head>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/excanvas.min.js"></script><![endif]-->
        <script type="text/javascript">
            function base_url(){
                return "<?php echo Yii::app()->baseUrl?>";
            }
            function site_url(){
                return "<?php echo Yii::app()->getBaseUrl()?>/index.php";
            }
            function base_url(){
                return "<?php echo Yii::app()->getBaseUrl()?>/index.php";
            }
        </script>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
        <title><?php echo $this->title?></title>
	<meta name="description" content="">
	<meta name="author" content="Ahmed Saeed">
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.min.css" media="screen">
	<!-- jquery ui css -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery-ui-1.10.1.min.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/customize.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/chosen.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery.validate.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/flexslider.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery.autocomplete.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/fancybox/jquery.fancybox.css">
<!--	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon.html">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/apple-touch-icon.html">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/apple-touch-icon-72x72.html">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/apple-touch-icon-114x114.html">-->
        
        <!-- JS
	================================================== -->
	<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.1.9.1.min.js"></script>-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.1.8.3.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.ui.1.10.1.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cookie.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.flexslider-min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cycle2.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cycle2.carousel.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.tweet.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.truncatable.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.autocomplete.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/tiny_mce/jquery.tinymce.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/custom.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.validate.js"></script>
         <script type="text/javascript">
$().ready(function() {
                $('textarea.tinymce').tinymce({
                    // Location of TinyMCE script
                    script_url : '/windows/_proyek/reservasi_hotel/assets/js/tiny_mce/tiny_mce.js',

                    // General options
                    theme : "advanced",
                    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

                    // Theme options
                    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "cut,copy,paste,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,code,preview,|,forecolor,backcolor",
//                    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
//                    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : true,

                    // Example content CSS (should be your site CSS)
                    content_css : "/windows/_proyek/reservasi_hotel/assets/css/content.css",

                    // Drop lists for link/image/media/template dialogs
//                    template_external_list_url : "lists/template_list.js",
//                    external_link_list_url : "lists/link_list.js",
//                    external_image_list_url : "lists/image_list.js",
//                    media_external_list_url : "lists/media_list.js",

                    // Replace values for the template plugin
                    template_replace_values : {
                        username : "Some User",
                        staffid : "991234"
                    }
                });
            });
</script>
</head>

<body>
	<div id="mainContainer" class="clearfix">

		<!--begain header-->
		<header>
			<div class="upperHeader">
				<div class="container">
					<ul class="pull-right inline">
						<li><a class="invarseColor" href="#">My Account</a></li>
						<li class="divider-vertical"></li>
						<li><a class="invarseColor" href="#">My Wish List (5)</a></li>
						<li class="divider-vertical"></li>
						<li><a class="invarseColor" href="#">Shoping Cart</a></li>
						<li class="divider-vertical"></li>
						<li><a class="invarseColor" href="#">Checkout</a></li>
						<li class="divider-vertical"></li>
                                                <?php
                                                if(Helper::getUserLogin()->isLogin()){
                                                    echo '<li><a class="invarseColor" href="'.Yii::app()->createUrl('user/logout').'">Logout</a></li>';
                                                }
                                                ?>
						
					</ul>
					<p>
                                        
					Selamat datang di garasitiket.com, 
                                        <?php
                                        if(Yii::app()->user->isLogin()){
                                            $user=  Yii::app()->user->getUserProfile();
                                            if(Helper::getUserLogin()->isCustommer())
                                                echo $user->nama_depan.' '.$user->nama_belakang;
                                            else
                                                echo $user->username;
                                        }else{
                                            ?><a href="<?php echo Yii::app()->createUrl('user/login')?>">Login</a> atau <a href="<?php echo Yii::app()->createUrl('user/daftar')?>">Daftar</a><?php
                                        }
                                        ?>
					</p>
				</div><!--end container-->
			</div><!--end upperHeader-->

			<div class="middleHeader">
				<div class="container">

					<div class="middleContainer clearfix">

					<div class="siteLogo pull-left">
						<h1><a href="index-2.html">ShopFine</a></h1>
					</div>

					<div class="pull-right">
						<form method="#" action="#" class="siteSearch">
							<div class="input-append">
								<input type="text" class="span2" id="appendedInputButton" placeholder="Search...">
								<button class="btn btn-primary" type="submit" name=""><i class="icon-search"></i></button>
							</div>
						</form><!--end form-->
					</div><!--end pull-right-->

					<div class="pull-right">
						<div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							    $ <span class="caret"></span>
							</a>
							<ul class="dropdown-menu currency" role="menu">
								<li><a href="#">$</a></li>
								<li class="divider"></li>
								<li><a href="#">¥</a></li>
								<li class="divider"></li>
								<li><a href="#">£</a></li>
								<li class="divider"></li>
								<li><a href="#">€</a></li>
							</ul>
						</div>
						<div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							    EN <span class="caret"></span>
							</a>
							<ul class="dropdown-menu language" role="menu">
								<li><a href="#">FR</a></li>
								<li class="divider"></li>
								<li><a href="#">CH</a></li>
								<li class="divider"></li>
								<li><a href="#">AR</a></li>
							</ul>
						</div>

						<div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							    <i class="icon-shopping-cart"></i> 3 Items
							    <span class="caret"></span>
							</a>
							<div class="dropdown-menu cart-content pull-right">
								<table class="table-cart">
									<tbody>
									<tr>
										<td class="cart-product-info">
											<a href="#"><img src="img/72x72.jpg" alt="product image"></a>
											<div class="cart-product-desc">
												<p><a class="invarseColor" href="#">Foliomania the designer portfolio brochure</a></p>
												<ul class="unstyled">
													<li>Available: Yes</li>
													<li>Color: Black</li>
												</ul>
											</div>
										</td>
										<td class="cart-product-setting">
											<p><strong>1x-$500.00</strong></p>
											<a href="#" class="remove-pro" rel="tooltip" data-title="Delete"><i class="icon-trash"></i></a>
										</td>
									</tr>
									<tr>
										<td class="cart-product-info">
											<a href="#"><img src="img/72x72.jpg" alt="product image"></a>
											<div class="cart-product-desc">
												<p><a class="invarseColor" href="#">Foliomania the designer portfolio brochure</a></p>
												<ul class="unstyled">
													<li>Available: Yes</li>
													<li>Color: Black</li>
												</ul>
											</div>
										</td>
										<td class="cart-product-setting">
											<p><strong>2x-$450.00</strong></p>
											<a href="#" class="remove-pro" rel="tooltip" data-title="Delete"><i class="icon-trash"></i></a>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td class="cart-product-info">
											<a href="#" class="btn btn-small">Vew cart</a>
											<a href="#" class="btn btn-small btn-primary">Checkout</a>
										</td>
										<td>
											<h3>TOTAL<br>$1,598.30</h3>
										</td>
									</tr>
								</tfoot>
								</table>
							</div>
						</div>
					</div><!--end pull-right-->

					</div><!--end middleCoontainer-->

				</div><!--end container-->
			</div><!--end middleHeader-->

			<div class="mainNav">
				<div class="container">
					<div class="navbar">
					      	
				      	<ul class="nav">
                                            <?php
                                            foreach ($this->widget('ext.MainMenu')->getSiteMenu() as $menu) {
                                                ?><li class="">
                                                    <a href="<?php echo Yii::app()->createUrl($menu['url']) ?>">
                                                        <?php echo (isset($menu['icon']) && $menu['icon']!='')?"<i class='$menu[icon]'></i>":''?> 
                                                            <?php echo $menu['title'] ?>
                                                    </a>
                                                </li><?php
                                            }
                                                ?>
				      		<!--<li class="active"><a href="#"><i class="icon-home"></i></a></li>-->
				      		<li>
				      			<a href="#">Pages &nbsp;<i class="icon-caret-down"></i></a>
				      			<div>
					      			<ul>
					      				<li><a href="index-2.html"> <span>-</span> index1</a></li>
					      			</ul>
					      		</div>
				      		</li>
				      		
				      	</ul><!--end nav-->

					</div>
				</div><!--end container-->
			</div><!--end mainNav-->	
			
		</header>
        
<div class="container">
    <div class="modal hide fade" id="myModelDialog" ></div>
    <div class="modal hide fade" id="myModal"></div>
    <div class="row">
        <div id="alertMessage"></div>    
                <?php
                $isShowMessage=true;
                
                if(isset(Yii::app()->session['success'])){
                    $alert='alert-success';
                    $pesan=Yii::app()->session['success'];
                    unset(Yii::app()->session['success']);
                }else if(Yii::app()->session['failed']){
                    $alert='alert-error';
                    $pesan=Yii::app()->session['failed'];
                    unset(Yii::app()->session['failed']);
                }else if(Yii::app()->session['info']){
                    $alert='alert-info';
                    $pesan=Yii::app()->session['info'];
                    unset(Yii::app()->session['info']);
                }else
                    $isShowMessage=false;
                ?>    
                <?php if($isShowMessage):?>    
            	<div class="alert <?php echo $alert;?>">
                	<button type="button" class="close" data-dismiss="alert"> x </button>
                        <?php echo $pesan?>
                </div><!--alert-->
                <?php endif;?>
                
                