<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            
                <div class="col-md-12 p-b-35">
                    <h3 class="m-text5 t-center"><?php echo strtoupper($name->name); ?></h3>
                    <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination"><?php echo count($list); ?></a>
                </div>
                <?php foreach ($list as $row) {
                     $name = stripUnicode($row->name);
                ?>
                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                            <img src="<?php echo public_url('upload/product/'.$row->image_link)?>" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>

                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button -->
                                   <button url="<?php echo base_url('cart/add') ?>" data-id="<?php echo $row->id ?>"  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                   Add to Cart</button>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="<?php echo base_url($name.'-v'.$row->id.'.html') ?>" title="<?php echo $row->name ?>" class="block2-name dis-block s-text3 p-b-5">
                                <?php echo count_text($row->name); ?>   
                            </a>
                            <span class="block2-oldprice m-text7 p-r-5">
                                <?php if ($row->discount) {
                                    echo number_format($row->price).'.đ';
                                } ?>
                            </span>
                            <span class="block2-newprice m-text8 p-r-5">
                                <?php echo get_price($row->price,$row->discount) ?>.đ
                            </span>
                        </div>
                    </div>
                </div>
                <?php }; ?>
        </div>
    </div>
</section>


