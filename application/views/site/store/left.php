
<div class="col-sm-6 col-md-4 col-lg-3 p-b-50" id="leftbar">
	<div class="leftbar p-r-20 p-r-0-sm">
		<!-- search -->
		<div class="search-product pos-relative bo4 of-hidden w-size10 m-b-5">
			<form method="get" action="<?php echo base_url('store') ?>">
			<input id="text-search" url="<?php echo base_url('store') ?>" class="s-text7 size6 p-l-23" type="text" value="<?php if(isset($key)){echo $key;} ?>" name="q" placeholder="Search Products...">
				<button type="submit" class="get-search flex-c-m size5 ab-r-m color2 color0-hov bgwhite trans-0-4">
					<i class="fs-12 fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>

		<h4 class="m-text14 p-b-7">
			Consumers
		</h4>

		<ul class="p-b-54 flex-w" id="mycust">
			<li class="m-b-5">
				<a href="<?php echo base_url('store') ?>" class="s-text13 active1 pa bg0 ma">
					All
				</a>
			</li>
			<?php 
				foreach ($Consumers as $key) {
					if ($key->count_pro > 0) {
			?>
			<li class="m-b-5">
				<a href="<?php echo base_url('store?consumers='.$key->id) ?>" class="s-text13 pa ma bg0 
					<?php 
						if($key->id == $this->input->get('consumers')){
						echo 'active';
						}else{ echo 'active1';}
					?>">
					<?php echo $key->name; ?>
					<span class="item-pagination trans-0-4 bg1 p-1"><?php echo $key->count_pro; ?></span>
				</a>
			</li>
			<?php 
			}}?>
		</ul>

		<h4 class="m-text14 p-b-7">
			Categories
		</h4>

		<ul class="p-b-54 flex-w" id="mycust">
			<?php 
				foreach ($categories as $key) {
					if ($key->count_pro > 0) {
			?>
			<li class="m-b-5">
				<a href="<?php echo base_url('store?categories='.$key->id) ?>" class="s-text13 pa ma bg0 
					<?php 
						if($key->id == $this->input->get('categories')){
						echo 'active';
						}else{ echo 'active1';}
					?>">
					<?php echo $key->name; ?>
					<span class="item-pagination trans-0-4 bg1 p-1"><?php echo $key->count_pro; ?></span>
				</a>
			</li>
			<?php 
			}}?>
		</ul>

		<h4 class="m-text14 p-b-7">
			Brand
		</h4>

		<ul class="p-b-54 flex-w" id="mycust">
			<?php 
				foreach ($brand as $key) {
					if ($key->count_pro > 0) {
			?>
			<li class="m-b-5">
				<a href="<?php echo base_url('store?brands='.$key->id) ?>" class="s-text13 pa ma bg0 
					<?php 
						if($key->id == $this->input->get('brands')){
						echo 'active';
						}else{ echo 'active1';}
					?>">
					<?php echo $key->name; ?>
					<span class="item-pagination trans-0-4 bg1 p-1"><?php echo $key->count_pro; ?></span>
				</a>
			</li>
			<?php 
			}}?>
		</ul>

		<div class="filter-price p-t-22 p-b-50 bo3">
			<form action="<?php echo base_url('store/index') ?>" method="get">
				<?php if (isset($count)) {
				?>
				<span class="item-pagination flex-c-m trans-0-4 active-pagination"><?php echo $count; ?></span>
				<?php } ?>
				<?php if (isset($max)) {
				?>
				<div class="s-text3 p-t-10 p-b-10">
					<?php echo number_format($min).'.VNĐ'.' -> '.number_format($max).'.VNĐ'; ?>
				</div>
				<?php } ?>
				<div class="s-text3 p-t-10 p-b-10">
					Price: $<span id="value-lower">610</span> - $<span id="value-upper" max="<?php echo $max_price->price ?>">980</span>
				</div>
				<div class="wra-filter-bar">
					<div id="filter-bar"></div>
				</div>
				<input type="hidden" name="min" class="min" value="0">
				<input type="hidden" name="max" class="max" value="<?php echo $max_price->price ?>">
				<div class="flex-sb-m flex-w p-t-16">
					<div class="w-size11">
						<!-- Button -->
						<button type="button" class="get-pric flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
							Filter
						</button>
					</div>
				</div>
			</form>
		</div>

		<div class="filter-color p-t-22 p-b-50 bo3">
			<div class="m-text15 p-b-12">
				Color
			</div>

			<ul class="flex-w">
				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
					<label class="color-filter color-filter1" for="color-filter1"></label>
				</li>

				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
					<label class="color-filter color-filter2" for="color-filter2"></label>
				</li>

				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
					<label class="color-filter color-filter3" for="color-filter3"></label>
				</li>

				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
					<label class="color-filter color-filter4" for="color-filter4"></label>
				</li>

				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
					<label class="color-filter color-filter5" for="color-filter5"></label>
				</li>

				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
					<label class="color-filter color-filter6" for="color-filter6"></label>
				</li>

				<li class="m-r-10">
					<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
					<label class="color-filter color-filter7" for="color-filter7"></label>
				</li>
			</ul>
		</div>
	</div>
	<a href="javascript:void(0)" class="s-text12 pa ma bg0" id="clse">
		<i class="fs-17 fa fa-close" aria-hidden="true"></i>
	</a>
</div>