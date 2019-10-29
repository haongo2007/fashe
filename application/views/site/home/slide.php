<!-- Slide1 -->
<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			<?php  
				$anima = array('fadeInDown','fadeInUp','zoomIn','rollIn','lightSpeedIn','slideInUp','rotateInDownLeft','rotateInUpRight','rotateIn');
			?>
			<?php $i=1; foreach ($list_sli as $row): ?>
			<div class="item-slick1 <?php echo 'item'.$i ?>-slick1" style="background-image: url(<?php echo public_url('upload/slide/'.$row->image_link) ?>);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="<?php echo $anima[rand(0, count($anima) - 1)]; ?>">
						<?php echo $row->info; ?>
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="<?php echo $anima[rand(0, count($anima) - 1)]; ?>">
						<?php echo $row->name; ?>
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="<?php echo $anima[rand(0, count($anima) - 1)]; ?>">
						<!-- Button -->
						<a href="<?php echo $row->link; ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>
			<?php $i++ ; endforeach;?>
			<!-- <div class="item-slick1 item2-slick1" style="background-image: url(<?php //echo public_url('site/images/') ?>/master-slide-03.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
						Women Collection 2018
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						New arrivals
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
						
						<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item3-slick1" style="background-image: url(<?php //echo public_url('site/images/') ?>/master-slide-04.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
						Women Collection 2018
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
						New arrivals
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
						
						<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div> -->

		</div>
	</div>
</section>