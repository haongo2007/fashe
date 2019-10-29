<style type="text/css">
	.error{color: red;}
</style>
<div class="container margin-t" >
	<div class="col-sm-3"><h2><span>LOGIN</span></h2></div>
	<div class="col-sm-6"><!-- The box-center product-->
		
    	<div class="error"><?php echo form_error('login'); ?></div>
    	<form action="<?php echo site_url('user/login') ?>" method="post">
    		<div class="form-group">
			    <label for="email">EMAIL</label><div class="error"><?php echo form_error('email'); ?></div>
			    <input placeholder="Enter email" type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>">
			</div>

			<div class="form-group">
				<label for="pwd">PASSWORD:</label><div class="error"><?php echo form_error('psw'); ?></div>
				<input placeholder="Enter Password" type="password" class="form-control" name="psw" id="pwd">
			</div>
			<div class="checkbox">
				<label><input type="checkbox"> REMEMBER ME</label>
			</div>
			<button type="submit" class="btn btn-default">Đăng Nhập</button>
			<a href="<?php echo base_url('user/register') ?>"><button type="button" class="btn btn-default">Đăng Ký</button></a>
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>





