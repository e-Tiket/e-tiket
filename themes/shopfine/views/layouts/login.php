<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.min.css" media="screen">
    <!-- jquery ui css -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery-ui-1.10.1.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/customize.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/charisma.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery.validate.css">
    <!--<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/flexslider.css">-->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/fancybox/jquery.fancybox.css">
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/favicon.html">
    <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/apple-touch-icon-114x114.html">
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.1.8.3.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.ui.1.10.1.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cookie.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cycle2.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cycle2.carousel.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.tweet.js"></script>
    <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.placeholder.min.html"></script>-->
    <script href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/fancybox/jquery.fancybox.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/custom.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.validate.js"></script>
</head>

<body style="background: #d9d9d9;">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="row-fluid" >
                <?php echo $content?>
            </div><!--/row-->
        </div><!--/fluid-row-->

    </div><!--/.fluid-container-->
    
</body>
</html>