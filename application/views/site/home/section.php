<!-- Banner -->
<?php if ($catalog) { ?>
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<?php foreach ($catalog as $key) { ?>
				<?php if ($key->product) { ?>
					<div class="col-sm-10 col-md-6 col-lg-4 m-l-r-auto">
						<?php 		
								foreach ($key->product as $row) {
									$path = $row->attr->path;

									$img = $row->attr->image_list; 
									$img = array_filter(explode('|', $img));
									$img = json_decode($img[0]); 
									$name = $row->title;
									$mau = array_filter(explode('|', $row->attr->name));
						?>
						<!-- block1 -->
						<div class="block1 hov-img-zoom pos-relative m-b-30">
							<img src="<?php echo base_url($path.'original/'.$name.'/'.$mau[0].'/'.$img[0]) ?>" alt="IMG-BENNER">

							<div class="block1-wrapbtn w-size2">
								<!-- Button -->
								<a href="<?php echo base_url('store?consumers='.$key->id) ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
									<?php echo $key->name; ?>
								</a>
							</div>
						</div>
						<?php } ?>
					</div>
				<?php }} ?>
			</div>
		</div>
	</section>
	<?php }
