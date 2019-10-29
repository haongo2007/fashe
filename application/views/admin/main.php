<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head') ?>
</head>
<body id="site-body" class="hold-transition skin-green sidebar-mini fixed">
	<?php 
		if (isset($message)) {
			$this->load->view('admin/message');
		}else{}
	?>

	<div class="wrapper">
		<?php $this->load->view('admin/header') ?>
		<?php $this->load->view('admin/left') ?>
		<?php $this->load->view($temp,$this->data); ?>
		<?php $this->load->view('admin/footer') ?>
	</div>
	<!-- <div id="left_content">
		<?php //$this->load->view('admin/left') ?>
	</div>
	<div id="rightSide">
		<?php //$this->load->view('admin/header') ?>
		
		

		<?php //$this->load->view('admin/footer') ?>
	</div>
	<div class="clear"></div> -->
</body>
</html>