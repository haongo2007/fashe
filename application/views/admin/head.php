<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php if(isset($total_stt)){ echo 'Có ('.$total_stt.') Đơn Hàng Mới | ' ;}else{ echo 'Login | ';} ?>Dashboard</title>
<!-- my custom css -->
<link rel="icon" type="image/png" href="<?php echo public_url('admin/LTE') ?>/favicon.png"/>

<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>/dist/css/mycustom.css">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>dist/css/skins/_all-skins.min.css">
<!-- Morris chart -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/morris.js/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/jvectormap/jquery-jvectormap.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- table plugin -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- check box plugin -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>plugins/iCheck/flat/blue.css">
<!-- select2 -->
<link rel="stylesheet" href="<?php echo public_url('admin/LTE/') ?>bower_components/select2/dist/css/select2.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




<!-- jQuery 3 -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo public_url('admin/LTE/') ?>bower_components/raphael/raphael.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo public_url('admin/LTE/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo public_url('admin/LTE/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo public_url('admin/LTE/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo public_url('admin/LTE/') ?>dist/js/adminlte.min.js"></script>
<!-- nestable plugin for setup menu -->
<script src="<?php echo public_url('admin/LTE/') ?>dist/js/jquery.nestable.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo public_url('admin/LTE/') ?>dist/js/demo.js"></script>
<!-- icheck -->
<script src="<?php echo public_url('admin/LTE/') ?>plugins/iCheck/icheck.min.js"></script>  
<!-- select2 -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- ck editor -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/ckeditor/ckeditor.js"></script>
<!-- token -->
<script src="<?php echo public_url('admin/LTE/') ?>my/js.cookie.min.js"></script>
<!-- DataTables -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- my script -->
<script src="<?php echo public_url('admin/LTE/') ?>my/script.js"></script>
<!-- pusher -->
<script src="<?php echo public_url('site/') ?>js/pusher.min.js"></script>
<style type="text/css">
	#lnhei > tr > td{
		line-height: 45px;
	}
	#cter > tr > th{
		text-align: center;
	}
</style>
<script type="text/javascript">
	var pusher = new Pusher('101d71ba1f48fc65f0f8', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('send_cart');
    channel.bind('my-event', function(data) {
    	document.title = 'Có ('+data.count+') Đơn Hàng Mới';
    });
</script>