	<?php if(!empty($page_title)){?>
    <title><?php echo $page_title; ?></title>
	<?php }else{ ?>
	    <title>Home | <?php echo site_name(); ?></title>
	<?php } ?>

	<?php if(!empty($meta_desc)){?>
	    <meta name="description" content="<?php echo $meta_desc; ?>">
	<?php } ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo public_url('upload/logo') ?>/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/fonts') ?>/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/fonts') ?>/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/fonts') ?>/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/fonts') ?>/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/css/') ?>util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/css/') ?>main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/css/') ?>jquery-ui.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo public_url('site/vendor') ?>/toastrjs/toastr.min.css">