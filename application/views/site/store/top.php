<div class="row m-t-5 p-b-30">
	<ul id="mycust" class="flex-w col-lg-12">

	<li class="m-b-5" id="drag-left">
		<a href="javascript:void(0)" class="s-text12 pa ma bg0">
			<i class="fs-17 fa fa-tasks" aria-hidden="true"></i>
		</a>
	</li>
	<li class="m-b-5">
		<a href="javascript:void(0)" class="s-text12 pa ma bg0 " data-toggle="modal" data-target="#myModal">
			<i class="fs-17 fa fa-filter" aria-hidden="true"></i>
		</a>
	</li>

	<li class="m-b-5">
		<a href="javascript:void(0)" class="s-text12 pa ma bg0 view-grid">
			<i class="fs-17 fa fa-th" aria-hidden="true"></i>
		</a>
	</li>

	<li class="m-b-5">
		<a href="javascript:void(0)" class="s-text12 pa ma bg0 view-list">
			<i class="fs-17 fa fa-th-list" aria-hidden="true"></i>
		</a>
	</li>
	</ul>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-filter"></i>Filter</h4>
      </div>
      	<form method="get" action="<?php echo base_url('store') ?>">
      	<div class="modal-body">
      		<div class="flex-w">
		      	<div class="chos-col size50 p-r-5">
		            <div class="s-text15 w-size15 t-left">
		              <strong>Consumers:</strong>
		            </div>
		            <div class="rs2-select2 rs3-select2 bo4 of-hidden">
				        <select class="select2insidemodal consu" name="consumers" url="<?php echo base_url('store/filter') ?>">
				        	<option value="0">Choose an Option</option>
				        	<?php foreach ($Consumers as $key) {
				        	?>
				          	<option value="<?php echo $key->id ?>"><?php echo $key->name; ?></option>
				          	<?php } ?>
				        </select>
			    	</div>
			    </div>

			    <div class="chos-col size50 p-r-5">
		            <div class="s-text15 w-size15 t-left">
		              <strong>Catefories:</strong>
		            </div>
		            <div class="rs2-select2 rs3-select2 bo4 of-hidden">
				        <select class="select2insidemodal categ" name="categories">
				        	<option value="">Choose an Option</option>
				        	<?php foreach ($categories as $key) {
				        	?>
				          	<option value="<?php echo $key->id ?>"><?php echo $key->name; ?></option>
				          	<?php } ?>
				        </select>
			    	</div>
			    </div>

			    <div class="chos-col size50 p-r-5">
		            <div class="s-text15 w-size15 t-left">
		              <strong>Brand:</strong>
		            </div>
		            <div class="rs2-select2 rs3-select2 bo4 of-hidden">
				        <select class="select2insidemodal" name="brand">
				        	<option value="">Choose an Option</option>
				        	<?php foreach ($brand as $key) {
				        	?>
				          	<option value="<?php echo $key->id ?>"><?php echo $key->name; ?></option>
				          	<?php } ?>
				        </select>
			    	</div>
			    </div>

			    <div class="chos-col size50 p-r-5">
		            <div class="s-text15 w-size15 t-left">
		              <strong>Sort:</strong>
		            </div>
		            <div class="rs2-select2 rs3-select2 bo4 of-hidden">
				        <select class="select2insidemodal" name="sort">
				        	
				          	<option value="1">High to low</option>
				          	<option value="2">Low to high</option>
				          	<option value="3">Latest</option>
				          	<option value="4">Buy the most</option>

				        </select>
			    	</div>
			    </div>
	   		</div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save</button>
      	</div>
		</form>
    </div>
  </div>
</div>