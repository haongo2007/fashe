
<div class="content-wrapper">
	<?php 
		$this->load->view('admin/brand/head',$this->data);
	?>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Sửa Hiệu Sản Phẩm</h3>
					</div>
					<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="form-group">
									<label >Tên Hiệu</label><span class="text-red"><?php echo form_error('name'); ?></span>
								
									<input type="text" class="form-control" name="name" value="<?php echo $info->name?>">
								
							</div>

							<div class="form-group">
									<label >Thứ Tự Hiển Thị</label><span class="text-red"><?php echo form_error('sort_order'); ?></span>
								
									<input type="text" class="form-control" name="sort_order" value="<?php echo $info->sort_order?>">
								
							</div>

							<div class="form-group">
									<label >Logo Brand</label></span>
									<img src="<?php echo public_url('upload/brand/'.$info->logo) ?>" width="100">
									<input type="file" class="form-control" name="image">
							</div>
							
						</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
						<div class="box-footer">
				    		<button type="submit" class="btn btn-primary">Sửa</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
</div>


<script type="text/javascript">
	$('.select2').select2()
</script>



