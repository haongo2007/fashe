
<div class="content-wrapper">
<?php 
	$this->load->view('admin/admin/head',$this->data);
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
        		<div class="box-body table-responsive">
		              <table id="example2" class="table table-bordered table-hover">
		                <thead id="cter">
		                <tr>
		                  <th>ID</th>
		                  <th>Ảnh Đại Diện</th>
		                  <th>Tên Đăng Nhập</th>
		                  <th>Tên</th>
		                  <th>Email</th>
		                  <th>SĐT</th>
		                  <th>Địa Chỉ</th>
		                  <th>Vị Trí</th>
		                  <th>Ngày Tạo</th>
		                  <th>Hành Động</th>
		                </tr>
		                </thead>
		                <tbody id="lnhei" align="center">
		                <!-- Filter -->
		               
							<?php 
								foreach ($list as $row):
							?>
								<tr>
									
									<td><?php echo $row->id; ?></td>
									<td>
										<img width="50" src="<?php echo public_url('admin/LTE/dist/img/') ?><?php echo $row->avatar; ?>" class="img-circle" alt="User Image">
									</td>
									<td><?php echo $row->username; ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->email; ?></td>
									<td><?php echo $row->phone; ?></td>
									<td><?php echo $row->address; ?></td>
									<td><?php echo $row->chucvu; ?></td>
									<td><?php echo get_date($row->created); ?></td>
									<td>
										
										
										<a href="<?php echo admin_url('admin/edit/'.$row->id) ?>" class="tipS" original-title="Chỉnh sửa">
										    <button class="btn bg-olive btn-flat"><i class="fa fa-legal"></i></button>
										</a>
										<?php 
											if ($admin->id == $row->id) {
												
											}else{
										?>
										<a href="<?php echo admin_url('admin/delete/'.$row->id) ?>" class="tipS verify_action" 
										original-title="Xóa">
										    <button class="btn bg-red btn-flat"><i class="fa fa-close"></i></button>
										</a>
										<?php } ?>
									</td>
								</tr>
							<?php 
								endforeach;
							?>
		                </tbody>
		                <tfoot>
		                		<?php if($admin->id == 9){ ?>

										<a href="<?php echo admin_url('admin/add/') ?>" class="tipS " original-title="Chỉnh sửa">
										    <button class="btn bg-olive btn-flat">Thêm Admin</button>
										</a>
										
								<?php } ?>
		                </tfoot>
		              </table>
            		</div>
            <!-- /.box-body -->
          		</div>
      		</div>
  		</div>
	</section>
</div>

<!-- DataTables -->
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo public_url('admin/LTE/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {

    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
