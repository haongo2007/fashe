
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
		$this->load->view('admin/product/head',$this->data);
	?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        	<div class="col-xs-12">
        		<form class="form" action="<?php echo admin_url('product/add') ?>" method="post" enctype="multipart/form-data">
	          	          				
  					<div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			              <li class="active"><a href="#tab_1-1" data-toggle="tab">Thông Tin Chung</a></li>
			              <li><a href="#tab_2-2" data-toggle="tab">Thông Số Kỹ Thuật</a></li>
			              <li><a href="#tab_3-2" data-toggle="tab">SEO</a></li>
			              <li><a href="#tab_4-2" data-toggle="tab">Bài Viết</a></li>
			              <li class="pull-right header"><i class="fa fa-th"></i> Thêm Sản Phẩm</li>
			            </ul>
			            <div class="tab-content">
			            	<div class="tab-pane active" id="tab_1-1">
				            		<div class="box box-success">
          								<div class="box-body">
          									<div class="col-xs-6">
          										<?php if(isset($_SESSION['notif'])){ ?>
												<div class="alert alert-danger alert-dismissible">
							                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							                	<h4><i class="icon fa fa-ban"></i>Alert</h4>
							                	<?php echo $_SESSION['notif']; ?>
								              	</div>
								              	<?php } ?>
							            		<div class="form-group">
													<label >Tên Sản Phẩm:</label>
													<span class="text-red"><?php echo form_error('name'); ?></span>
													<input class="form-control" name="name" type="text" />	
												</div>

												<div class="form-group" id="box-cl">
													<label >Thuộc Tính Sản Phẩm:</label>
													<input type="hidden" name="count" value="1" class="count_file">
													<span class="text-red"><?php echo form_error('color_1'); ?></span>
													<input class="form-control" name="color_1" type="text" placeholder="Tên Màu" />
													<input class="form-control" name="code_1" type="color" />
													<label style="margin-top: 10px;">Có Thể Chọn Nhiều Ảnh:</label>
													<input class="form-control" type="file" name="image_attr_1[]" multiple/>	
													<span class="text-red"><?php echo form_error('size_1'); ?></span>
													<input class="form-control" name="size_1" type="text" placeholder="Size (VD: Size L)" />
												</div>
												<div class="box-footer">
							              			<button type="button" class="addclr pull-right btn bg-green btn-flat">Thêm Màu</button>
							              		</div>
												<div class="form-group">
													<label>Video Mô Tả:</label>
													<select url="<?php echo admin_url('product/get_input'); ?>" class="form-control select2" id="video" name="video">
														<option></option>
														<option value="0">Upload file</option>
														<option value="1">Nhúng file</option>
													</select>
												</div>

												<div  class="form-group">
													<input class="form-control video" type="" name="video" style="display: none;">		
												</div>

											</div>

											<div class="col-xs-6">

												<div class="form-group">
													<label >Giá:</label>
													<span class="text-red"><?php echo form_error('price'); ?></span>
													<input class="form-control price" name="price" type="text" />	
												</div>

												<div class="form-group">
													<label >Giá Giảm(VNĐ):</label>
													
													<input class="form-control price" id="discount" name="discount" type="text" />
													<input class="form-control" id="totalPrice" name="totalPrice" type="text" disabled />		
												</div>

												<div class="form-group">
													<label >Danh Mục SP:</label>
													<span class="text-red"><?php echo form_error('catalog'); ?></span>
													<select name="catalog" class="form-control select2">
														<option value=""></option>
													<!-- kiem tra danh muc co danh muc con hay khong -->
														<?php foreach ($catalogs as $row):?>
															<?php if (count($row->subs) > 0):?>

														            <optgroup label="<?php echo $row->name ?>">

														            	<?php foreach ($row->subs as $subs):?>
																        
																        <option value="<?php echo $row->id ?>,<?php echo $subs->id ?>">
																        
																        	<?php echo $subs->name ?>
																        		
																        </option>
																    	
																    	<?php endforeach; ?>

																    </optgroup>

															<?php else: ?>

																<optgroup label="<?php echo $row->name; ?>">

																	
																	
																</optgroup>
															
															<?php endif ?>
														
														<?php endforeach; ?>				     
													</select>
												</div>
												<div class="form-group">
													<label >Hiệu SP:</label>
													<select name="brand" class="form-control select2">
														<option value=""></option>
													<!-- kiem tra danh muc co danh muc con hay khong -->
														<?php foreach ($brand as $row):?>
															
													        <option value="<?php echo $row->id ?>">
													        
													        	<?php echo $row->name ?>
													        		
													        </option>
																    	
														<?php endforeach; ?>				     
													</select>
												</div>

												<div class="form-group">
													<label >Số Lượng:</label>
													<input class="form-control" name="stock" type="text" />	
												</div>
											</div>

										</div>
									</div>
								
		    				</div>
		            	
			              <!-- /.tab-pane -->
			              <div class="tab-pane" id="tab_2-2">
			              	<div class="box box-success">
  								<div class="box-body">
  									<span class="text-red"><?php echo form_error('infomation'); ?></span>
				                	<textarea id="editor1" name="infomation" rows="10" cols="80">

		                			</textarea>
		                		</div>
		                	</div>
			              </div>
			              <!-- /.tab-pane -->
			              <div class="tab-pane" id="tab_3-2">
			              	<div class="box box-success">
  								<div class="box-body">
				            		<div class="form-group">
										<label >Title:</label>
										<input class="form-control" name="site_title" type="text" />	
									</div>

									<div class="form-group">
										<label >Meta Desciption:</label>
										<textarea class="form-control" name="meta_desc" type="text"></textarea>	
									</div>

									<div class="form-group">
										<label >Meta Tags:</label>
										<select class="form-control js-example-tokenizer" name="meta_key[]" multiple="multiple" style="width: 100%;">
  
										</select>
										<!-- <input class="form-control" name="meta_key" type="text" />	 -->
									</div>
								</div>
							</div>
			              </div>
			              <div class="tab-pane" id="tab_4-2">
			              	<div class="box box-success">
  								<div class="box-body">
  									<span class="text-red"><?php echo form_error('content'); ?></span>
			                		<textarea id="content" name="content" rows="10" cols="80">

			                		</textarea>
			                	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
			                	<div class="box-footer">
			              			<button type="submit" class="pull-right btn bg-green btn-flat subm">Thêm</button>
			              		</div>
			                </div>
			              </div>

			              

			              <!-- /.tab-pane -->
			            </div>
			            <!-- /.tab-content -->
			          </div>
          				
	        	</form>
    		</div>
    	</div>
	</section>
</div>

<script type="text/javascript">
	$('.select2').select2();
	
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
  	$(".js-example-tokenizer").select2({
	    tags: true,
	    tokenSeparators: [',', ' ']
	});
</script>

<script>
CKEDITOR.replace( 'content' ,
{
filebrowserBrowseUrl : 		'<?php echo public_url() ?>admin/plugin/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo public_url() ?>admin/plugin/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo public_url() ?>admin/plugin/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 		'<?php echo public_url() ?>admin/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo public_url() ?>admin/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?php echo public_url() ?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
<script>
// we used jQuery 'keyup' to trigger the computation as the user type
var format = function(num){
    var str = num.toString(), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};

var rep = function(str){
	var str = str.replace(/,/g, '');
	var str = parseInt(str);
	return str;
}

$('.price').keyup(function () {
	$(this).val(format($(this).val()));
 	
	var l = rep($(this).val());
 	
 	$('#totalPrice').val(l);
});

$('#discount').keyup(function(event) {
	var l = rep($('.price').val());
	var d = rep($(this).val());
	$('#totalPrice').val(l - d);
});
var i = 2;
$('.addclr').click(function(event) {
	var vl = parseInt($('.count_file').val());
	$('.count_file').val(vl+1);
	$('#box-cl').append(
		'<hr>'+
	'<input class="form-control color_'+i+'" name="color_'+i+'" type="text" placeholder="Tên Màu" />'+
	'<input class="form-control" name="code_'+i+'" type="color" />'+
	'<input class="form-control" type="file" name="image_attr_'+i+'[]" multiple/>'+
	'<input class="form-control size_'+i+'" name="size_'+i+'" type="text" placeholder="Size (VD: Size L)" />'
	);
	i++;
});
$('.subm').click(function(event) {
	for (var j = 0; j < i; j++) {
		if ($(".color_"+j).val() == '' || $(".size_"+j).val() == '') {
			alert('Thuộc Tính Sản Phẩm Thứ '+j+' Là Bắt Buộc !');
			return false;
		}
	}
});
</script>