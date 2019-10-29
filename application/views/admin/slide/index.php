
<?php 
	$this->load->view('admin/slide/head',$this->data);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slider
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
            <!-- /.box-header -->
        		<div class="box-body">
		             
					<div class="col-md-12">
			          <div class="box box-solid">
							
			            <div class="box-header with-border">
			              <h3 class="box-title">Carousel</h3>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			            	
			              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			                <ol class="carousel-indicators">
		                		<?php $i=1; foreach ($list as $row): ?>
			                  		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="<?php if($i == 1){ echo 'active'; } ?>"></li>
			                	<?php $i++ ; endforeach;?>
			                </ol>
			                <div class="carousel-inner">
		                		<?php $i=1; foreach ($list as $row): ?>
				                  <div class="item <?php if($i == 1){ echo 'active'; } ?>">
				                    <img src="<?php echo public_url('upload/slide/'.$row->image_link) ?>" alt="<?php echo $row->name ;?>">

				                    <div class="carousel-caption">
				                    	<?php echo $row->name; ?>
				                    </div>
				                  </div>
			                 	<?php $i++ ; endforeach;?>
			                </div>
			                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			                  <span class="fa fa-angle-left"></span>
			                </a>
			                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			                  <span class="fa fa-angle-right"></span>
			                </a>
			              </div>
			            </div>
			            <!-- /.box-body -->
			            <div class="box-footer">
			            	<a href="<?php echo admin_url('slide/add') ?>" style="float: left;" >
							    <button class="btn bg-green btn-flat">Thêm</button>
							</a>
							<a class="get_slide" href="" url="<?php echo admin_url('slide/edit/') ?>" >
								<button class="btn bg-blue btn-flat">Sửa</button>
							</a>
							<a class="del_slide" href="" url="<?php echo admin_url('slide/delete/') ?>" >
								<button class="btn bg-red btn-flat">Xóa</button>
							</a>
							<div class="form-group col-md-3">
								<select class="form-control select2 slide_name">
									<option>Chọn Slide Để Sửa</option>
									<?php foreach ($list as $row): ?>
										<option value="<?php echo $row->id ?>"><?php echo $row->name; ?></option>
									<?php endforeach;?>
								</select>
							</div>
			            </div>
			          </div>
			          <!-- /.box -->
			        </div>
        		</div>
            <!-- /.box-body -->
          		</div>
  			</div>
		</div>
	</section>

	

</div>
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










































