




<?php 
	$this->load->view('admin/slide/head',$this->data);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Slider
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
        		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
	          	      
	        		<div class="box box-success">
						<div class="box-body">
							<img src="<?php echo base_url('public/upload/slide/'.$slide->image_link) ?>" width="100%">
							<div class="col-xs-6">

			            		<div class="form-group">
									<label >Tên Slide:</label>
									<input class="form-control" name="name" type="text" value="<?php echo $slide->name ?>" />	
								</div>

								<div class="form-group">
									<label>Hình ảnh:</label>
									<input class="form-control" type="file"  id="image" name="image">
									
								</div>
								
								<div class="form-group">
									<label >Link:</label>
									<input class="form-control" name="link" type="text" value="<?php echo $slide->link ?>"  />	
								</div>
							</div>

							<div class="col-xs-6">

								<div class="form-group">
									<label >Thứ Tự:</label>
									<input class="form-control" name="sort_order" type="text" value="<?php echo $slide->sort_order ?>"  />	
								</div>

								<div class="form-group">
									<label >info:</label>
									<input class="form-control" name="info" type="text" value="<?php echo $slide->info ?>"  />	
								</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
								<button type="submit" class="btn bg-green btn-flat margin">Sửa</button>
							</div>

						</div>
					</div>
								
	        	</form>
    		</div>
    	</div>
	</section>
</div>

<script type="text/javascript">
	$('.select2').select2();
	
    
</script>
