<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head') ?>
</head>
<body class="nobg loginPage" style="min-height:85%;">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Admin</b>ELECT</a>
		</div>
		<div class="login-box-body">
			<input type="hidden" name="" data-re="<?php echo base_url(); ?>" id="redir">
			<div  id="form-box">		    	
				<i id="prev-btn" class=""></i>
				<i id="next-btn" class="fa fa-arrow-right"></i>
				<div id="input-group">
					<input id="input-field" type="" required>
					<label url="<?php echo admin_url('login/check_ajax') ?>" id="input-label"></label>
					<div id="input-progress"></div>
				</div>
				<div class="progress progress-xs progress-striped active">
                      <div id="progress-bar" class="progress-bar progress-bar-primary" style="width: 0%"></div>
                </div>
			</div>
		</div>
	  <!-- /.login-box-body -->
	</div>

</body>
<script src="<?php echo public_url('admin/LTE/') ?>my/js.cookie.min.js"></script>
<script src="<?php echo public_url('admin/LTE/') ?>my/login.js"></script>
</html>