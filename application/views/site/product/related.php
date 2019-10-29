<!-- Relate Product -->
<?php if ($list_rela) {
?>
  <section class="relateproduct bgwhite p-t-45 p-b-138">
    <div class="container">
      <div class="sec-title p-b-60">
        <h3 class="m-text5 t-center">
          Related Products
        </h3>
      </div>
     <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <?php foreach ($list_rela as $key) {
                ?>
                <div class="item-slick2 p-l-15 p-r-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                            <?php 
                               $path = $key->attr->path;
                                $img = $key->attr->image_list; 
                                $img = array_filter (explode('|', $img)); 
                                $img = json_decode($img[0]);
                                
                                $mau = array_filter (explode('|', $key->attr->name));                                 
                            ?>
                            <img src="<?php echo base_url($path.'300x300/'.$key->name.'/'.$mau[0].'/'.$img[0]) ?>" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                <?php 
                                    if ($this->session->userdata('wishlist')) {
                                        if (in_array($key->id, $this->session->userdata('wishlist'))) {
                                            $display = 'block2-btn-towishlist';
                                        }else{
                                            $display = '';
                                        }
                                    }else{
                                            $display = '';
                                    }
                                ?>
                                <a href="javascript:voi(0)" class="block2-btn-addwishlist hov-pointer trans-0-4 <?php echo $display ?>" data-pr="<?php echo $key->id ?>" data-url="<?php echo base_url('product/wishlist'); ?>">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>

                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button -->
                                    <button url="<?php echo base_url('cart/add') ?>" data-id="<?php echo $key->id ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <?php $name = stripUnicode($key->name); ?>
                            <a href="<?php echo base_url($name.'-v'.$key->id.'.html') ?>" class="block2-name dis-block s-text3 p-b-5">
                                <?php echo $key->name ; ?>
                            </a>

                            <span class="block2-price m-text6 p-r-5">
                                <?php echo get_price($key->price,$key->discount).'<sup>.đ</sup>'; ?>
                            </span>
                        </div>
                        <div class="dis-none sz-cl">
                            <div class="chos-col size50 p-r-5">
                                <div class="rs2-select2 rs3-select2 bo4 of-hidden">
                                  <select class="selection-2 clr" name="color">
                                    <?php foreach (cut_str($key->color) as $ele) {
                                    ?>
                                    <option><?php echo $ele; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                            </div>

                            <div class="chos-siz size50 p-l-5">
                                <div class="rs2-select2 rs3-select2 bo4 of-hidden">
                                  <select class="selection-2 siz" name="size">
                                    <?php foreach (cut_str($key->size) as $ele) {
                                    ?>
                                    <option><?php echo $ele; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>              
                            </div>
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <input class="size8 m-text18 t-center num-prod" type="number" name="num-product" value="1">
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>

    </div>
  </section>
  <?php 
  }?>