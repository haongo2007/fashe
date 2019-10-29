

<?php foreach ($product as $key) {?>z
	<div class="col-sm-6 col-md-4 col-lg-4 p-b-50">
		<div class="block2">
            <div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative <?php echo ($key->discount > 0) ? 'block2-labelsale' : 'block2-labelnew' ?> ">
                <?php 
                    $path = $key->attr->path;
                    $img = $key->attr->image_list; 
                    $img_exp = array_filter (explode('|', $img)); 
                    $img = json_decode($img_exp[0]);

                    $mau = array_filter (explode('|', $key->attr->name));
                    $size = array_filter(explode('|', $key->attr->size));                                 
                ?>
                <img id="img_ne" src="<?php echo base_url($path.'300x300/'.$key->title.'/'.$mau[0].'/'.$img[0]) ?>" alt="IMG-PRODUCT">

                <div class="block2-overlay trans-0-4">
                    <?php 
                        if ($this->session->userdata('wishlist')) {
                            if (in_array($key->id, $this->session->userdata('wishlist'))) {
                                $display = 'block2-btn-towishlist';
                            }else{
                                $display = 'block2-btn-addwishlist';
                            }
                        }else{
                                $display = 'block2-btn-addwishlist';
                        }
                    ?>
                    <a href="#" class="hov-pointer trans-0-4 <?php echo $display ?> <?php echo $key->id.'_pr' ?>" data-pr="<?php echo $key->id ?>" data-url="<?php echo base_url('product/wishlist'); ?>">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                    </a>
                    <ul class="dis-block ab-r-t">
                      <?php 
                        foreach (explode('|', $key->attr->code) as $clr => $value) {
                            $data_img = json_decode($img_exp[$clr]);
                      ?>
                      <li>
                        <label class="color-filter-2" style="background: <?php echo $value; ?>" 
                        data-img="<?php echo base_url($path.'300x300/'.$key->title.'/'.$mau[$clr].'/'.$data_img[0]) ?>"></label>
                      </li>
                      <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="mb-elm-hv xxx flex-w size50 p-l-10">
                <div class="chos-col">
                    <div class="rs2-select2 rs3-select2 bo4 of-hidden">
                      <select class="selection-2 clr change-size" name="color" data-url="<?php echo base_url('product/change_size'); ?>" data-attr-id="<?php echo $key->attr->id ?>">
                        <?php foreach ($mau as $ele) {
                        ?>
                        <option><?php echo $ele; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>

                <div class="chos-siz m-t-5">
                    <div class="rs2-select2 rs3-select2 bo4 of-hidden">
                      <select class="selection-2 siz recipients" name="size">
                        <?php foreach (explode(',',$size[0]) as $ele) {
                        ?>
                        <option><?php echo $ele; ?></option>
                        <?php } ?>
                      </select>
                    </div>              
                </div>
                <div class="flex-w bo5 of-hidden m-t-5 chos-qty size22">
                      <button class="btn-num-product-down color1 w-size29 bg8 eff2">
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                      </button>

                      <input class="size50 m-text18 t-center num-prod num-product" type="number" name="num-product" value="1">

                      <button class="btn-num-product-up color1 w-size29 bg8 eff2">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                      </button>
                </div>
                <div class="block2-txt p-t-10">
                    <?php $name = stripUnicode($key->name); ?>
                    <a href="<?php echo base_url($name.'-v'.$key->id.'.html') ?>" add_wish="<?php echo $this->lang->line('add-wish') ?>"
                    remove_wish="<?php echo $this->lang->line('remove-wish') ?>" add_cart="<?php echo $this->lang->line('add-cart') ?>" class="block2-name dis-block s-text3 p-b-5" title="<?php echo $key->name ?>">
                        <?php echo count_text($key->name) ; ?>
                    </a>
                    <?php if ($key->discount > 0) { ?>
                        <span class="block2-price m-text7 p-r-5">
                            <?php echo number_format($key->price).'<sup>.đ</sup>'; ?>
                        </span>
                    <?php } ?>
                    <span class="block2-price m-text8 p-r-5">
                        <?php echo get_price($key->price,$key->discount).'<sup>.đ</sup>'; ?>
                    </span>
                </div>
                <div class="block2-btn-addcart p-t-10 w-full trans-0-4">
                    <!-- Button -->
                    <button url="<?php echo base_url('cart/add') ?>" data-id="<?php echo $key->id ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                        <?php echo $this->lang->line('add-to-cart-button'); ?>
                    </button>
                </div>
            </div>
        </div>
	</div>
<?php }?>
