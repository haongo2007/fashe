<?php if ($total_items <= 0){ redirect(site_url()); }?>
<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?php echo public_url('upload/logo/') ?>/backgroundstore.jpg);">
		<h2 title="cart" class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<form action="<?php echo base_url('cart/update') ?>" method="post">
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Color</th>
							<th class="column-3">Size</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
			<?php $total_count = 0; $i = 0;?>
		    	<?php foreach ($cart as $row):?>
		    		<?php $total_count += $row['subtotal']; ?>
						<?php 
							$where = array('id_product' => $row['id']);
            				$attr = $this->atribute_model->get_info_rule($where);
						?>
						<tr class="table-row xxx">
							<td class="column-1">
								<a title="<?php echo $row['name']; ?>" href="<?php echo base_url('cart/del/'.$row['id']); ?>">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="<?php echo $row['image_link'] ?>" alt="IMG-PRODUCT">
									</div>
								</a>
							</td>
							<td class="column-2"><span><?php echo $row['name']; ?></span></td>
							<td class="column-2">
								<div class="rs2-select2 rs3-select2 bo4 of-hidden">
									<select class="selection-2 clr change-size" name="color_<?php echo $row['id'] ?>" data-url="<?php echo base_url('product/change_size'); ?>" data-attr-id="<?php echo $attr->id ?>">
									<?php
										$color = $row['options']['color'][0];
											foreach (explode('|', $attr->name) as $key => $value) {
										?>
											<option <?php  echo ($color == $value) ? 'selected' : '' ?>>
											<?php echo trim($value); ?>
											</option>
										<?php 
											}
										?>
									</select>
					            </div>
							</td>
							<td class="column-2">
								<div class="rs2-select2 rs3-select2 bo4 of-hidden">
				              		<select class="selection-2 siz recipients" name="size_<?php echo $row['id'] ?>">
						                <?php 
						                	$posi = $row['options']['posi'][0];
						                	$size = $row['options']['size'][0];
						                	$size_arr = explode('|', $attr->size);
						                	$size_arr = explode(',', $size_arr[$posi]);
						                	foreach ($size_arr as $key => $value) { 
						                ?>
						                	<option <?php echo ($size == $value) ? 'selected' : '' ?>>
						              		<?php echo trim($value); ?>
						              		</option>
						                <?php 
						            		}	 
						                ?>
				              		</select>
				            	</div>
							</td>
							<input type="hidden" class="posi" name="posi_<?php echo $row['id'] ?>" value="<?php echo $posi ?>">
							<td class="column-3"><?php echo number_format($row['price']).'.vnđ'; ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="qty_<?php echo $row['id'] ?>" value="<?php echo $row['qty']; ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5"><?php echo number_format($row['subtotal']).'.vnđ'; ?></td>
						</tr>
					<?php $i++; endforeach; ?>

					</table>
				</div>
			</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div>
			</div>
			</form>
			<!-- Total -->
			<form method="post" action="<?php echo base_url('cart') ?>">
			<div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm row">
				<div class="col-md-12">
					<h5 title="cart totals" class="m-text20 p-b-24 t-center ">
							Cart Totals
					</h5>
					<div class="bo10 p-b-12 p-t-12">
						<span class="s-text18 w-full-sm">
							Subtotal:
						</span>

						<span class="m-text18 w-full-sm">
							<?php echo number_format($total_count); ?>.vnđ
						</span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="flex-w p-t-15 p-b-20">
						<span class="s-text18 w-size17 w-full-sm">
							Infomation:
						</span>

						<div class="w-size20 w-full-sm error">

							<span class="s-text19">
								Name
							</span><?php echo form_error('name'); ?>
							<div class="size16 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name" value="<?php echo isset($user->name) ? $user->name : '' ?>" placeholder="Your Name">
							</div>

							<span class="s-text19">
								Email
							</span><?php echo form_error('email'); ?>
							<div class="size16 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="email" value="<?php echo isset($user->email) ? $user->email : '' ?>" placeholder="Your mail">
							</div>

							<span class="s-text19">
								Address
							</span><?php echo form_error('address'); ?>
							<div class="size16 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address" value="<?php echo isset($user->address) ? $user->address : '' ?>" placeholder="Your Address">
							</div>

							<span class="s-text19">
								Phone
							</span><?php echo form_error('phone'); ?>
							<div class="size16 bo4 m-b-12">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="number" name="phone" value="<?php echo isset($user->phone) ? $user->phone : '' ?>" placeholder="Your Phone">
							</div>
							<span class="s-text19">
								Note *:
							</span>
							<div class="size16 m-b-12">
								<textarea class="sizefull bo4 s-text7 p-l-15 p-r-15" name="note"></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<!--  -->

					<!--  -->
					<div class="flex-w p-t-15 p-b-20">
						<span class="s-text18 w-size17	 w-full-sm">
							Shipping:
						</span>
						<div class="w-size20 w-full-sm error">
							<p class="s-textnote p-b-23 notif">
								There are no shipping methods available. Please double check your address, or contact us if you need any help.
							</p>

							<span class="s-text19">
								Calculate Shipping
							</span><?php echo form_error('postcode'); ?>

							<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
								<select class="selection-2 get_citi">
									<option>Select a country...</option>
									<?php foreach ($citi as $key) {
									?>
										<option value="<?php echo $key->fee; ?>"><?php echo $key->citi; ?></option>
									<?php }?>
								</select>
							</div>
							<input type="hidden" name="citi" class="cti">
							<div class="size13 bo4 m-b-22">
								<input class="sizefull s-text7 p-l-15 p-r-15" type="number" name="postcode" placeholder="Postcode / Zip">
							</div>
						</div>
					</div>
					<div class="flex-w p-t-15 p-b-20">
						<span class="s-text18 w-size17	 w-full-sm">
							Payment:
						</span>
						<div class="w-size20 w-full-sm error">
							<span class="s-text19">
								Choose Payment Method
							</span><?php echo form_error('payment'); ?>

							<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
								<select class="selection-2" name="payment">
									<option value="1">Paypal</option>
									<option value="0">Thanh Toán Khi Nhận Hàng</option>
								</select>
							</div>
						</div>
					</div>
					<input type="hidden" name="totalmount" class="ttmount">
					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Total:
						</span>

						<span class="m-text21 w-size20 w-full-sm data_price" data-price="<?php echo $total_count; ?>">
							<?php echo number_format($total_count); ?>.vnđ
						</span>
					</div>
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
					<div class="size15 trans-0-4">
						<!-- Button -->
						<button type="submit" disabled class="sub-order flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Proceed to Checkout
						</button>
					</div>
				</div>

			</div>
			</form>
		</div>
	</section>
	<div id="dropDownSelect2"></div>	