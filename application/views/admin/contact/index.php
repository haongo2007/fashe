
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $this->load->view('admin/contact/head',$this->data) ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bảng Liên Hệ</h3>
            </div>
            <!-- /.box-header -->
        		<div class="box-body table-responsive">
		              <table id="example2" class="table table-bordered table-hover">
		                <thead id="cter">
		                <tr>
		                  <th>ID</th>
		                  <th>Tên</th>
		                  <th>Email</th>
		                  <th>SĐT</th>
		                  <th>Địa Chỉ</th>
		                  <th>Logo</th>	
		                  <th>Action</th>		                  
		                </tr>
		                </thead>
		                <tbody align="center" id="watch">
		                <!-- Filter -->
		               
							<?php 
								foreach ($list as $row):
							?>
							
								<tr>
									<td><?php echo $row->id; ?></td>
									<td id="name"><?php echo $row->name; ?></td>
									<td id="email"><?php echo $row->email; ?></td>
									<td id="phone"><?php echo $row->phone; ?></td>
									<td id="address"><?php echo $row->address; ?></td>
									<td id="logo"><img width="100" src="<?php echo public_url('upload/logo/').$row->logo ?>"></td>
									<td>					                  	
				                  		<a id="edit" class="btn bg-olive btn-flat" href="javascript:void(0)">Thay Đổi</a>
				                  	</td>
								</tr>
							
							<?php 
								endforeach;
							?>
		                </tbody>
		                <tbody id="fill" style="display: none;">
		                	<form action="<?php echo admin_url('contact/edit/'.$row->id) ?>" method="post" enctype="multipart/form-data">
		                		<tr>
									<td><?php echo $row->id; ?></td>
									<td>
										<div class="form-group">
				                
				        					<input name="name" type="text" class="form-control" value="<?php echo $row->name; ?>">
				     
				    					</div>
				    				</td>
				    				<td>
										<div class="form-group">
				                
				        					<input name="email" type="email" class="form-control" value="<?php echo $row->email; ?>">
				     
				    					</div>
				    				</td>
				    				<td>
										<div class="form-group">
				                
				        					<input name="phone" type="number" class="form-control" value="<?php echo $row->phone; ?>">
				     
				    					</div>
				    				</td>
				    				<td>
										<div class="form-group">
				                
				        					<input name="address" type="text" class="form-control" value="<?php echo $row->address; ?>">
				     
				    					</div>
				    				</td>
									<td>
										<div class="form-group">
											<input name="logo" type="file" class="form-control" >
										</div>
									</td>
									<td>		
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
				                  		<button type="submit" class="btn bg-olive btn-flat">Thay Đổi</button>
				                  		<a href="" id="cancel" class="btn bg-red btn-flat">Hủy Bỏ</a>
				                  	</td>
								</tr>
								<tr>
									<td colspan="4">
									<div class="form-group">
										<input name="map" type="text" class="form-control" placeholder="Nhúng Địa Chỉ Google Map Của Bạn Vào Đây" >
									</div>
									</td>
								</tr>
							</form>
		                </tbody>
		              </table>
            		</div>
            <!-- /.box-body -->
            	<div class="box-footer">
            	<?php echo $row->map; ?>
            	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7837.308357615051!2d106.75063574285272!3d10.837754798935324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1538064964972" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
          		</div>
          		</div>
      		</div>
  		</div>
	</section>
</div>

