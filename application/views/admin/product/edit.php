
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
		$this->load->view('admin/product/head',$this->data);
	?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        	<div class="col-md-12">
        		<form class="form" action="<?php echo admin_url('product/edit/'.$product->id) ?>" method="post" enctype="multipart/form-data">
	          	          				
  					<div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			              <li class="active"><a href="#tab_1-1" data-toggle="tab">Thông Tin Chung</a></li>
			              <li><a href="#tab_2-2" data-toggle="tab">Thông Số Kỹ Thuật</a></li>
			              <li><a href="#tab_3-2" data-toggle="tab">SEO</a></li>
			              <li><a href="#tab_4-2" data-toggle="tab">Bài Viết</a></li>
			              <li class="pull-right header"><i class="fa fa-th"></i> Sửa Sản Phẩm</li>
			            </ul>
			            <div class="tab-content">
			            	<div class="tab-pane active" id="tab_1-1">
				            		<div class="box box-success">
          								<div class="box-body">
          									<div class="col-md-6">
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
													<input class="form-control" name="name" type="text" value="<?php echo $product->name ?>" />	
												</div>
												
												<div class="form-group">
													<label >Thuộc Tính Sản Phẩm:</label>
												</div>
												<?php 
													$image = array_filter(explode('|', $attr->image_list));

													$name_cl = array_filter(explode('|', $attr->name));

													$code_cl = array_filter(explode('|', $attr->code));
													$size = array_filter(explode('|', $attr->size));
													$i = 0;
													foreach ($name_cl as $key => $name) {
														$img_list = json_decode($image[$i]);
														$k = $i+1;
													?>

												<div class="form-group col-md-6 count">
													<input class="form-control" name="<?php echo 'color_'.$k; ?>" type="text"  value="<?php echo $name ?>" />
													<input class="form-control" name="<?php echo 'code_'.$k; ?>" type="color" value="<?php echo $code_cl[$i] ?>" />

													<input class="form-control" type="file" name="<?php echo 'image_attr_'.$k.'[]' ?>" multiple/>
													<input class="form-control" name="<?php echo 'size_'.$k; ?>" type="text" value="<?php echo $size[$i] ?>" />
													<button data-mau="<?php echo $name ?>" data-mamau="<?php echo $code_cl[$i] ?>" data-toggle="modal" data-target="#modal-default" type="button" class="margin btn bg-green btn-flat open-modal" 
													data-image-sma="
														<?php 
															$count = count($img_list);
															$soc = '|';
																for ($j=0; $j < $count; $j++) {
																	if($j == $count - 1){
																		$soc = '';
																	} 
																	echo $attr->path.'300x300/'.$product->title.'/'.$name_cl[$i].'/'.$img_list[$j].$soc;
																}
														?>
													"
													data-base="<?php echo base_url(); ?>"
													>Xem</button>
													<button data-id="<?php echo $attr->id ?>" data-position="<?php echo $i ?>" data-url="<?php echo admin_url('product/del_img') ?>" data-name="<?php echo $product->title ?>" type="button" class="del-imcl margin btn bg-red btn-flat">Xóa</button>
												</div>

												<?php 
													$i++; 
												} ?>
												<input type="hidden" name="count" class="count_file" value="<?php echo count($image) ?>">
												<div class="form-group col-md-12" id="box-cl">

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
													
													<?php 
														$str = $product->video;
														switch (strstr($str, 'mp4')) {
															case 'mp4':
													?>
																<video width="100%" controls>
																  <source src="<?php echo base_url($attr->path.'video/'.$product->title.'/'.$product->video) ?>" type="video/mp4">
																</video>
													<?php
																break;
															
															default:
													?>
																<?php echo $product->video; ?>
													<?php
																break;
														}
													?>
													
												</div>

											</div>

											<div class="col-md-6">

												<div class="form-group">
													<label >Giá:</label>
													<span class="text-red"><?php echo form_error('price'); ?></span>
													<input class="form-control price" name="price" type="text" value="<?php echo number_format($product->price) ?>" />	
												</div>

												<div class="form-group">
													<label >Giá Giảm(VNĐ):</label>
													
													<?php 
														if($product->discount){
															$discount = $product->discount;
															$total = $product->price - $product->discount;
														}else{
															$discount = 0;
															$total = $product->price;
														}
													?>
													<input class="form-control price" id="discount" name="discount" type="text" value="<?php echo number_format($discount) ?>" />
													<input class="form-control" id="totalPrice" name="totalPrice" type="text" disabled value="<?php echo number_format($total) ?>" />		
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
																        
																        <option value="<?php echo $row->id ?>,<?php echo $subs->id ?>"
																        	<?php if ($subs->id == $product->catalog_id): ?>
																        		selected
																        	<?php endif ?>>
																        
																        
																        	<?php echo $subs->name ?>
																        		
																        </option>
																    	
																    	<?php endforeach; ?>

																    </optgroup>

															<?php else: ?>

																<option value="<?php echo $row->id ?>">

																	<?php echo $row->name; ?>
																	
																</option>
															
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
															
													        <option value="<?php echo $row->id ?>"
													        	<?php if ($product->brand_id == $row->id) {
													        		echo "selected";
													        	} ?>
													        >
													        
													        	<?php echo $row->name ?>
													        		
													        </option>
																    	
														<?php endforeach; ?>				     
													</select>
												</div>

												<div class="form-group">
													<label >Số Lượng:</label>
													<input class="form-control" name="stock" type="text" value="<?php echo $product->in_stock ?>" />	
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
		                        		<?php echo $product->infomation; ?>
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
										<input value="<?php echo $product->site_title ?>" class="form-control" name="site_title" type="text" />	
									</div>

									<div class="form-group">
										<label >Meta Desciption:</label>
										<textarea class="form-control" name="meta_desc" type="text">
											<?php echo $product->meta_desc ?>
										</textarea>	
									</div>

									<div class="form-group">
										<label >Meta Tags:</label>
										<select class="form-control js-example-tokenizer" name="meta_key[]" multiple="multiple" style="width: 100%;">
  											<?php if ($product->meta_key && is_array(json_decode($product->meta_key))) {
  												$arr = json_decode($product->meta_key);
	  												foreach ($arr as $key => $value) {
	  													echo "<option selected>".$value."</option>";
	  												}
  												}else{
  													echo "<option selected>".$product->meta_key."</option>";	
  												}
  											?>
										</select>
									</div>
								</div>
							</div>
			              </div>
			              <div class="tab-pane" id="tab_4-2">
			              	<div class="box box-success">
  								<div class="box-body">
			                		<textarea id="content" name="content" rows="10" cols="80">
			                			<?php echo $product->content; ?>
			                		</textarea>
			                	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
			                	<div class="box-footer">
			              			<button type="submit" class="pull-right btn bg-green btn-flat subm">Sửa</button>
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
	<div class="modal modal-default fade" id="modal-default">
		<div class="modal-dialog" style="width: 100%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  		<span aria-hidden="true">&times;</span>
				  	</button>
					<h4 class="modal-title"></h4>
				</div>
			  	<div class="modal-body">
			  		<div class="box box-success content-img">
			  		</div>
			  	</div>
			</div>
		<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<style type="text/css">
	.content-img{
		display: flex;
		flex-wrap: wrap;
	}
	.content-img .box-img{
		border: 1px solid #eee;
	    margin: 10px;
	    border-radius: 15px;
	    padding: 5px;
	}
	.modal-title{
	    text-align: center;
    	font-weight: 900;
	}
	.modal-default{
		padding: 0!important;
	}
</style>
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
var i = $('.count').length + 1;
$('.addclr').click(function(event) {
	var vl = parseInt($('.count_file').val());
	$('.count_file').val(vl+1);
	$('#box-cl').append(
		'<hr>'+
	'<input class="form-control color_'+i+'" name="color_'+i+'" type="text" placeholder="Tên Màu" />'+
	'<input class="form-control" name="code_'+i+'" type="color" />'+
	'<input class="form-control" type="file" name="image_attr_'+i+'[]" multiple/>'+
	'<input class="form-control" name="size_'+i+'" type="text" placeholder="Size (VD: Size L)" />'
	);
	i++;
});
$('.del-imcl').click(function(event) {
	if(!confirm('Bạn chắc chắn muốn xóa ?'))
	{
		return false;
	}
	var _this 	 = $(this);
	var position = _this.attr('data-position');
	var id 		 = _this.attr('data-id');
	var url 	 = _this.attr('data-url');
	var nam 	 = _this.attr('data-name');
	var mau  	 = _this.prev().attr('data-mau');

	$.ajax({
        method: "POST",
        url: url,
        data:'id='+id+'&po='+position+'&nam='+nam+'&mau='+mau,
        success: function(data)
		{	
			if (data === '1') {
				_this.parents('.count').fadeOut('slow');
			}else{
				alert('Xử Lý Gặp Lỗi !!');
			}
			
		}
    });
});
$('.subm').click(function(event) {
	for (var j = 0; j < i; j++) {
		if ($(".color_"+j).val() == '' || $(".size_"+j).val() == '') {
			alert('Thuộc Tính Sản Phẩm Thứ '+j+' Rỗng Không Thể Sửa !');
			return false;
		}
	}
});
$('.open-modal').click(function(event) {
	var data = $(this).attr('data-image-sma');
	var tit = $(this).attr('data-mau');
	var mamau = $(this).attr('data-mamau');
	var res = data.split('|');
	var base = $(this).attr('data-base');
	$('.content-img').html('');
	$('.modal-title').html('');
	for (var i = 0; i < res.length; i++) {
		$('.content-img').append(
	        	'<div class="box-img"><img src="'+base+res[i]+'" ></div>'
		);
	}
	$('.modal-title').append(tit.toUpperCase());
	$('.modal-title').css('color', mamau);
});
</script>
