
<div class="content-wrapper">
	<?php 
		$this->load->view('admin/catalog/head',$this->data);
	?>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title">Sửa
					  Danh Mục</h3>
					</div>
					<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
						<div class="box-body">
						
							<div class="form-group">
									<label >Tên Danh Mục</label><span class="text-red"><?php echo form_error('name'); ?></span>
								
									<input type="text" class="form-control" name="name" value="<?php echo $info->name?>">
								
							</div>

							<div class="form-group">
									<label >Thứ Tự Hiển Thị</label><span class="text-red"><?php echo form_error('sort_order'); ?></span>
								
									<input type="text" class="form-control" name="sort_order" value="<?php echo $info->sort_order?>">
								
							</div>

							<div class="form-group">
				                <label>Chọn Danh Mục</label>
				                <select name="parent_id" class="form-control select2" style="width: 100%;">
				                  
									<option value="0">Là Danh Mục Cha</option>
									<?php foreach ($list as $row): ?>
											<option value="<?php echo $row->id?>"
									  			<?php echo ($row->id == $info->parent_id)? 'selected' : '' ; ?>
													><?php echo $row->name ?>										
											</option>
									<?php endforeach ;?>											
								
				                </select>
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



