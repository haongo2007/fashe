<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                New Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <?php foreach ($product_new as $key) {
                ?>
                <div class="item-slick2 p-l-15 p-r-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w wrap-pic-h of-hidden pos-relative block2-labelnew">
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
                        <div class="dk-elm-hv xxx dis-flex p-t-10">
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

                            <div class="chos-siz">
                                <div class="rs2-select2 rs3-select2 bo4 of-hidden">
                                  <select class="selection-2 siz recipients" name="size">
                                    <?php foreach (explode(',',$size[0]) as $ele) {
                                    ?>
                                    <option><?php echo $ele; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>              
                            </div>
                            <div class="bo5 chos-qty">
                                <input class="size1 m-text18 t-center num-prod" type="number" name="num-product" value="1">
                            </div>
                        </div>
                        <div class="block2-txt p-t-10">
                            <?php $name = $key->title; ?>
                            <a href="<?php echo base_url($name.'-v'.$key->id.'.html') ?>" add_wish="<?php echo $this->lang->line('add-wish') ?>"
                            remove_wish="<?php echo $this->lang->line('remove-wish') ?>" add_cart="<?php echo $this->lang->line('add-cart') ?>" class="block2-name dis-block s-text3 p-b-5" title="<?php echo $key->name ?>">
                                <?php echo count_text($key->name) ; ?>
                            </a>
                            <?php if ($key->discount > 0) { ?>
                                <span class="block2-price m-text7 p-r-5">
                                    <?php echo number_format($key->price).'<sup>.đ</sup>'; ?>
                                </span>
                            <?php } ?>
                            <span class="block2-price m-text6 p-r-5">
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
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div id="dropDownSelect2"></div>
