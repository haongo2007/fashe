
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
		$this->load->view('admin/product/head',$this->data);
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
		                  <th>Tên Sản Phẩm</th>
		                  <th>Hình Ảnh</th>
		                  <th>Màu Sắc</th>
		                  <th>Giá</th>
		                  <th>Ngày Tạo</th>
		                  <th>Ngày Sửa</th>
		                  <th>Người Tạo</th>
		                  <th>Hành Động</th>
		                </tr>
		                </thead>
		                <tbody align="center" class="lnhei">
		                	
		                </tbody>
		                <tfoot>
		                	<a href="<?php echo admin_url('product/add') ?>" class="tipS" 
							original-title="thêm">
							    <button class="btn bg-green btn-flat margin">Thêm</button>
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
	.active-pagination{
		pointer-events: none;
  		cursor: default;
  		background: #c3c3c3!important;
	}
	.code{
		transition: .2s;
		cursor: pointer;
		border: 1px solid;
		margin: 2px;
	}
	.activ{
		transform: scale(.7);
	}
	.lnhei tr td{
		vertical-align: middle!important;
	}
</style>
<script>
  $(function () {
  	var dataTable = $('#example2').DataTable({
			"lengthMenu": [5,10,15,20],
           	"processing":true,  
           	"serverSide":true,  
           	"order":[],  
           	"ajax":{  
                url:"<?php echo admin_url('product/get_list') ?>",  
                type:"POST",
           	},
           	"columns":[
	            {"data":"id"},
	            {"data":"ten_sp","orderable":false},
	            {"data":"img","orderable":false},
	            {"data":"color","orderable":false},		
	            {"data":"gia"},
	            {"data":"date_created","orderable":false},
	            {"data":"date_update","orderable":false},
	            {"data":"user_created","orderable":false},
	            {"data":"hanhdong","orderable":false},
        	],
        	"initComplete": function () {
	            $('#example2 tbody').on('click','.code',function(event) {
	            	var data = $(this).attr('data-img');
					$(this).parent().parent().prev().children('.ima-res').attr('src', data);
					$('.code').removeClass('activ');
					$(this).addClass('activ');
				});
        	}
  	});
  	
		
  })
</script>