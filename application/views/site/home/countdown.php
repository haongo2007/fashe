<!-- Banner2 -->
	<section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="<?php echo public_url('site/images/') ?>/banner-08.jpg" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								The Beauty
							</span>

							<h3 class="l-text1 fs-35-sm">
								Lookbook
							</h3>

							<a href="#" class="s-text4 hov2 p-t-20 ">
								View Collection
							</a>
						</div>
					</div>
				</div>
				<?php if (isset($hotdeal)){
				?>
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
						<img src="<?php echo public_url('upload/hotdeal/'.$hotdeal->image_link) ?>" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
								<input type="hidden" name="hotdeal" value="<?php echo $hotdeal->id ?>">
								<a href="<?php echo base_url('store?hotdeal='.$hotdeal->id) ?>">
								<div class="t-center" id="price-block">
									<span class="dis-block s-text3 p-b-5">
										<?php echo $hotdeal->name; ?>
									</span>

									<!-- <span class="block2-oldprice m-text7 p-r-5">
										<?php //echo number_format($hotdeal->price).'<sup>.đ</sup>'; ?>
									</span> -->

									<span class="block2-newprice m-text8">
										Giảm đến <?php echo number_format($hotdeal->discount).'.VNĐ' ?>
									</span>
								</div>
								</a>
							<?php 
								$time = explode('-', $hotdeal->time);
								$time = str_replace('/', '-', $time[1]);
								$time = trim($time);
							?>
							<div id="getting-started" data-time="<?php echo date("Y-m-d", strtotime($time)) ?>" class="flex-c-m p-t-44 p-t-30-xl">
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 days">
										
									</span>

									<span class="s-text5">
										days
									</span>
								</div>
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 hours">
										
									</span>

									<span class="s-text5">
										hrs
									</span>
								</div>
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 minutes">
										
									</span>

									<span class="s-text5">
										mins
									</span>
								</div>
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 seconds">
										
									</span>

									<span class="s-text5">
										secs
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>