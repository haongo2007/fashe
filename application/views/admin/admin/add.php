<div class="content-wrapper">
<?php 
	$this->load->view('admin/admin/head',$this->data);
?>
<section class="content">

	<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Thêm Admin</h3>
					</div>
			
				  	<div class="box-body">
					    <div class="form-group">
					      <label for="exampleInputEmail1">Tên Đăng Nhập <span class="text-red"><?php echo form_error('username'); ?></span></label>
					      <input type="text" class="form-control" name="username" placeholder="Tên Đăng Nhập">
					    </div>
					    <div class="form-group">
					      <label for="exampleInputPassword1">Password <span class="text-red"><?php echo form_error('password'); ?></span></label>
					      <input type="password" class="form-control" name="password" placeholder="Password">
					    </div>
					    <div class="form-group">
					      <label for="exampleInputPassword1">Nhập Lại Password <span class="text-red"><?php echo form_error('repassword'); ?></span></label>
					      <input type="password" class="form-control" name="repassword" placeholder="Re_password">
					    </div>
					    <div class="form-group">
					      <label for="exampleInputEmail1">Tên <span class="text-red"><?php echo form_error('name'); ?></span></label>
					      <input type="text" class="form-control" name="name" placeholder="Tên Của Bạn">
					    </div>
					    <div class="form-group">
					      <label for="exampleInputEmail1">Email <span class="text-red"><?php echo form_error('email'); ?></span></label>
					      <input type="email" class="form-control" name="email" placeholder="Nhập email">
					    </div>
					    <div class="form-group">
		                	<label>Số ĐT: <span class="text-red"><?php echo form_error('phone'); ?></span></label>
			                <div class="input-group">
			                  <div class="input-group-addon">
			                    <i class="fa fa-phone"></i>
			                  </div>
			                  <input name="phone" type="number" class="form-control">
			                </div>
		              	</div>
		              	<div class="form-group">
					      <label for="exampleInputEmail1">Địa Chỉ <span class="text-red"><?php echo form_error('address'); ?></span></label>
					      <input type="text" class="form-control" name="address" placeholder="Nhập Địa Chỉ">
					    </div>
					    <div class="form-group">
					      <label for="exampleInputEmail1">Chức Vụ <span class="text-red"><?php echo form_error('position'); ?></span></label>
					      <input type="text" class="form-control" name="position" placeholder="Nhập Chức Vụ">
					    </div>
					</div>
				</div>
			
			</div>
			<div class="col-md-6">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">Chọn Quyền Admin</h3>
					</div>
					<div class="mailbox-controls">
                		<!-- Check all button -->
               	 		<button type="button" class="btn btn-default btn-sm checkbox-toggle">chọn Tất Cả</button>
              		</div>
              		<div id="flex" class="box-body">
              		
					<?php 
						foreach ($config_pm as $controller => $actions) {
					?>
					<div class="form-group">
						<label><?php echo $controller; ?></label>
						<div class="box-body no-padding">              
				              <div class="table-responsive mailbox-messages">
				                <table class="table table-hover table-striped">
				                  <tbody>
				                  
				                  <tr>
				                  	<?php 
				                  		foreach ($actions as $action) {
									?>	
									<p style="padding: 4px;">
										<input type="checkbox" name="permissions[<?php echo $controller ?>][]" value="<?php echo $action; ?>">
										<span> <?php echo $action; ?></span>
									</p>							
									<?php
										} 
									?>			                    
				                  </tr>

				                  </tbody>
				                </table>
				              </div>
			            </div>
				    </div>

					<?php 
						}
					?>
					</div>
				</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
				<div class="box-footer">
			    	<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</div>
			
		</div>
	</form>
</section>
</div>
<style type="text/css">
	#flex{
		display: flex;
		flex-wrap: wrap;
	}
	#flex .form-group{
		width: 25%;
	}
</style>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
  });
</script>
