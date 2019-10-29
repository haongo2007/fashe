<div class="container margin-t">
	<div class="col-sm-3"><h2><span>INFO</span></h2></div>
	<div class="col-sm-9">
		<table class="table">
		    <thead>
		      <tr>
		        <th>Tên</th>
		        <th>Email</th>
		        <th>Mật Khẩu</th>
		        <th>Địa Chỉ</th>
		        <th>Số Điện Thoại</th>
		      </tr>
		    </thead>
		    <tbody>

		      <tr id="watch">
		      	
		        <td><?php echo $user->name; ?></td>
		        <td><?php echo $user->email; ?></td>
		        <td><input disabled type="password" class="form-control" value="<?php echo $user->password; ?>"></td>
		        <td><?php echo $user->address; ?></td>
		        <td><?php echo $user->phone; ?></td>
		        
		      </tr>

		      <tr id="fill" style="display: none;">
		      	
		        <td>
		        	<div class="form-group">
				               
				        <input id="name" type="text" class="form-control" value="<?php echo $user->name; ?>">
				     
				    </div>
		        </td>
		        <td>
		        	<div class="form-group">
				                
				        <input disabled class="form-control" value="<?php echo $user->email; ?>">
				     
				    </div>
		        </td>
		        <td>
		        	<div class="form-group">
				                
				        <input id="psw" type="password" class="form-control" value="">
				     
				    </div>
		        </td>
		        <td>
		        	<div class="form-group">
				             
				        <input id="address" type="text" class="form-control" value="<?php echo $user->address; ?>">
				     
				    </div>
		        </td>
		        <td>
		        	<div class="form-group">
				            
				        <input id="phone" type="number" class="form-control" value="<?php echo $user->phone; ?>">
				     
				    </div>
		        </td>
		        
		      </tr>

		      </tr>
		    </tbody>	    	
		</table>
			<a id="edit" url="<?php echo site_url('user/edit') ?>" class="btn btn-primary">Chỉnh Sửa</a>
	</div>
</div>

<div id="prod"></div>
</div>  <!-- End box-center product-->
<script type="text/javascript">
	////////////// edit thong tin thanh vien


</script>