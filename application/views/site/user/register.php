<style type="text/css">
	.error{color: red;}
</style>
<div class="container margin-t">
	<div class="col-sm-3"><h2><span>REGISTER</span></h2></div>
	<div class="col-sm-9"><!-- The box-center product-->
		<form action="<?php echo site_url('user/register') ?>" method="post">
			<div class="form-group">
			    <label for="name">NAME</label><div class="error"><?php echo form_error('name'); ?></div>
			    <input type="text" placeholder="Enter Name" class="form-control" name="name" id="text" value="<?php echo set_value('name') ?>">
			</div>

			<div class="form-group">
				<label for="pwd">PASSWORD:</label><div class="error"><?php echo form_error('psw'); ?></div>
				<input type="password" placeholder="Enter Password" class="form-control" name="psw" id="pwd">
			</div>

			<div class="form-group">
				<label for="pwd">RE_PASSWORD:</label><div class="error"><?php echo form_error('re_psw'); ?></div>
				<input type="password" placeholder="Enter RE_Password" class="form-control" name="re_psw" id="pwd">
			</div>

			<div class="form-group">
				<label for="email">EMAIL:</label><div class="error"><?php echo form_error('email'); ?></div>
				<input type="email" placeholder="Enter Email" class="form-control" name="email" id="email" value="<?php echo set_value('email') ?>">
			</div>
			
			<div class="form-group">
				<label for="phone">PHONE:</label><div class="error"><?php echo form_error('phone'); ?></div>
				<input type="number" placeholder="Enter Phone Number" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone') ?>">
			</div>

			<div class="form-group">
				<label for="address">ADDRESS:</label><div class="error"><?php echo form_error('address'); ?></div>
				<input type="text" class="form-control" placeholder="Enter address" name="address" id="text" value="<?php echo set_value('address') ?>">
			</div>
			<button type="submit" class="btn btn-default">SUBCRIBE</button>
		</form>
	</div>
</div>

  <!-- End box-center product-->
