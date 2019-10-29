
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  		<span aria-hidden="true">&times;</span>
  	</button>
	<h4 class="modal-title">Chi Tiết Giao Hàng</h4>
</div>
<div class="modal-body">
	<div class="box table-responsive">
		<table class="table table-bordered table-hover">
        <thead id="cter">
        <tr>
			<th>Tên SP</th>
			<th>Hình Ảnh</th>
			<th>Kích Thước</th>
			<th>Màu Sắc</th>
			<th>Số Lượng</th>
			<th>Giá</th>
			<th>Trạng Thái</th>
        </tr>
        </thead>
        <tbody align="center">
        	<?php 
				foreach ($order as $key) {
					$where = array('id' => $key->product_id);
					$product = $this->product_model->get_info_rule($where);
					$where = array('id_product' => $key->product_id);
					$attr = $this->atribute_model->get_info_rule($where);
					$option = json_decode($key->data);
					$img = explode('|', $attr->image_list);
					$img = json_decode($img[$option->posi[0]]);
					$color_name = $option->color[0];
					$path = base_url().$attr->path.'300x300/'.$product->title.'/'.$color_name.'/'.$img[0];

					if ($key->status == 0) {
						$status = '<strong class="text-yellow">Chưa Gửi Hàng</strong>';
					}else if($key->status == 1){
						$status = '<strong class="text-green">Đã Gửi Hàng</strong>';
					}
					else if($key->status == 2){
						$status = '<strong class="text-red">Đơn Hàng Bị Hủy</strong>';
					}
			?>
				<tr>
					<td><?php echo $product->name; ?></td>
					<td><?php echo '<img src="'.$path.'" width="100">' ?></td>
					<td><?php echo $option->size[0]; ?></td>
					<td><?php echo $color_name; ?></td>
					<td><?php echo $key->qty; ?></td>
					<td><?php echo number_format($key->amount).'.vnđ'; ?></td>
					<td><?php echo $status; ?></td>
				</tr>
			<?php
					$ulr = base_url('admin/transaction/update/'.$key->transaction_id);
					if ($key->status == 0) {
						$button = '<a href="'.$ulr.'"><button type="button" class="btn btn-success">Shipping</button></a>';
					}else if($key->status == 1){
						$button = '';
					}
					else if($key->status == 2){
						$button = '<a href="'.$ulr.'"><button type="button" class="btn btn-success">Shipping</button></a>';
					} 
				}
			?>
        </tbody>
      </table>
	</div>
</div>
<div class="modal-footer" data-update="<?php echo admin_url('transaction/update') ?>">
	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	<?php echo $button; ?>
</div>