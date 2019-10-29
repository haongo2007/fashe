<div class="content-wrapper">
    
	<?php 
		$this->load->view('admin/brand/head',$this->data);
	?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
        		<div class="box-body">
		              <table id="example2" class="table table-bordered table-hover">
		                <thead id="cter">
		                <tr>
		                  <th>ID</th>
		                  <th>Thứ Tự</th>
		                  <th>Tên Hiệu</th>
		                  <th>Logo Hiệu</th>
		                  <th>Hành Động</th>
		                  <th>
		                  	<div class="mailbox-controls">
                				<!-- Check all button -->
               	 				<button id="titleCheck" name="titleCheck" type="button" class="btn btn-default btn-sm checkbox-toggle">chọn Tất Cả</button>
              				</div>
              			</th>
		                </tr>
		                </thead>
		                <tbody align="center">
		                <!-- Filter -->
		               
							<?php 
								foreach ($list as $row):
							?>
								<tr class="row_<?php echo $row->id ?>" id="lhei">
									
									<td class="textC"><?php echo $row->id ?></td>
									<td class="textC"><?php echo $row->sort_order ?></td>
									<td><span><?php echo $row->name; ?></span></td>
									<td><img width="100" src="<?php echo public_url('upload/brand/'.$row->logo) ?>"></td>		
									<td>
										 <a href="<?php echo admin_url('brand/edit/'.$row->id) ?>" class="tipS " original-title="Chỉnh sửa">
										    <button class="btn bg-olive btn-flat"><i class="fa fa-legal"></i></button>
										</a>
										
										<a href="<?php echo admin_url('brand/delete/'.$row->id) ?>" class="tipS verify_action" 
										original-title="Xóa">
										    <button class="btn bg-red btn-flat"><i class="fa fa-close"></i></button>
										</a>
									</td>
									<td>
										<div class="table-responsive mailbox-messages">
											<input type="checkbox"  name="id[]" value="<?php echo $row->id ?>">
										</div>
									</td>
								</tr>
							<?php 
								endforeach;
							?>
		                </tbody>
		                <tfoot>
		                	<a href="<?php echo admin_url('brand/add') ?>" class="tipS" 
							original-title="thêm">
							    <button class="btn bg-green btn-flat margin">Thêm</button>
							</a>
							<a href="#submit" id="submit" url="<?php echo admin_url('brand/delete_all') ?>">
								<button class="btn bg-red btn-flat margin">Xóa</button>
							</a>
		                </tfoot>
		              </table>
            		</div>
            <!-- /.box-body -->
          		</div>
      		</div>
  		</div>
	</section>
</div>
<style type="text/css">
	#cato{
		position: absolute;
	    top: -5px;
	    padding: 2px 3px;
	    line-height: .9;
	}
	#chil{
	    position: relative;
	}
	#lhei td{
		line-height: 50px;
	}
</style>
<script>
  $(function () {

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
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