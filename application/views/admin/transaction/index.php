

<?php 
	$this->load->view('admin/transaction/head',$this->data);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Giao Dịch
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo $this->uri->rsegment(1); ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bảng Xem Các Giao Dịch</h3>
            </div>
            <!-- /.box-header -->
        		<div class="box-body table-responsive">
		              <table id="example2" class="table table-bordered table-hover">
		                <thead id="cter">
		                <tr>
							<th>Trạng Thái</th>
							<th>Tên</th>
							<th>PTT</th>
							<th>email</th>
							<th>SĐT</th>
							<th>Tổng tiền</th>
							<th>Địa chỉ</th>
							<th>Thời gian</th>
							<th>Hành động</th>
		                </tr>
		                </thead>
		                <tbody>
		                	
		                </tbody>
		              </table>
            		</div>
            <!-- /.box-body -->
          		</div>
      		</div>
  		</div>
	</section>

	<div class="modal modal-default fade" id="modal-default">
		<div class="modal-dialog" style="width: 100%">
			<div class="modal-content content-order">
				
			</div>
		<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<style type="text/css">
	.table>tbody>tr>td{
		vertical-align: middle;
	}
</style>
<script>
$(function () {
	function get_order() {
		$('#example2 > tbody').on('click', '.get_order', function () {
        	$('.content-order').html('');
			var _this = $(this),
				id = _this.attr('data-id'),
				url = _this.attr('data-url'),
				link = $(".modal-footer").attr('data-update');
			$.ajax({
		            method: "POST",
		            url: url,
		            data:'or='+id,
		            async: true,
		            success: function(data)
					{	
						$('.content-order').html(data);
					
					}
	        }).fail(function(jqXHR, textStatus, errorThrown){
			            alert("Unable to save new list order: " + errorThrown);
	        });
        });
	}
  	var dataTable = $('#example2').DataTable({
			"lengthMenu": [10,15,20],
           	"processing":true,  
           	"serverSide":true,  
           	"order":[],  
           	"ajax":{  
                url:"<?php echo admin_url('transaction/get_list') ?>",  
                type:"POST",
           	},  
           	"columns":[
	            {"data":"status"},
	            {"data":"user_name","orderable":false},
	            {"data":"ptt","orderable":false},
	            {"data":"user_mail","orderable":false},
	            {"data":"sdt","orderable":false},
	            {"data":"tongtien","orderable":false},
	            {"data":"diachi","orderable":false},
	            {"data":"thoigian"},
	            {"data":"hanhdong","orderable":false},
        	],
        	"initComplete": function () {
	            get_order();
        	}
      });
  	var pusher = new Pusher('101d71ba1f48fc65f0f8', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('send_cart');
    channel.bind('my-event', function(data) {
    	$('#example2 > tbody').prepend('<tr role="row" class="odd">'+
				'<td>'+data.status+'</td>'+
				'<td>'+data.user_name+'</td>'+
				'<td>'+data.ptt+'</td>'+
				'<td>'+data.user_email+'</td>'+
				'<td>'+data.user_phone+'</td>'+
				'<td>'+data.amount+'</td>'+
				'<td>'+data.user_address+'</td>'+
				'<td>'+data.created+'</td>'+
				'<td>'+data.get_order+data.update_tran+data.destroy_tran+'</td>'+
			'</tr>');
    	get_order();
    })
})
</script>