<div class="container bgwhite p-t-86 p-b-80">
    <div class="flex-w flex-sb">
      <div class="w-size13 p-t-30 respon5 place_append">
        <div class="wrap-slick3 flex-sb flex-w">
          <div class="wrap-slick3-dots"></div>
          <?php
              $original = 'original/';
              $small = '300x300/'; 
              $name = $product->title;
              $mau = array_filter(explode('|', $product->attr->name));
              $path = $product->attr->path;
              $img = array_filter (explode('|', $product->attr->image_list));
              $img = json_decode($img[0]);               
          ?>
          <div class="slick3">
            <div class="item-slick3" data-thumb="<?php echo base_url($path.$original.$name.'/'.$mau[0].'/'.$img[0]) ?>">
              <div class="wrap-pic-w">
                <a class="over-view" href="<?php echo base_url($path.$original.$name.'/'.$mau[0].'/'.$img[0]) ?>" data-lightbox="roadtrip">
                 <img src="<?php echo base_url($path.$original.$name.'/'.$mau[0].'/'.$img[0]) ?>" alt="IMG-PRODUCT">
                </a>
              </div>
            </div>
            <?php foreach ($img as $key => $value) {
              if ($key < 1) continue;
            ?>
            <div class="item-slick3" data-thumb="<?php echo base_url($path.$original.$name.'/'.$mau[0].'/'.$value) ?>">
              <div class="wrap-pic-w">
                <a class="over-view-list" href="<?php echo base_url($path.$original.$name.'/'.$mau[0].'/'.$value) ?>" data-lightbox="roadtrip">
                  <img src="<?php echo base_url($path.$original.$name.'/'.$mau[0].'/'.$value) ?>" alt="IMG-PRODUCT">
                </a>
              </div>
            </div>
            <?php 
            }
            ?>
          </div>
        </div>
      </div>

      <div class="w-size14 p-t-30 respon5">
        <ul class="flex-w">
          <?php 
            foreach (array_filter(explode('|', $product->attr->code)) as $key => $value) {
          ?>
          <li class="m-r-10">
            <input class="checkbox-color-filter" <?php if($key == 0){ echo "checked";} ?> id="<?php echo 'color-filter'.$key ?>" type="radio" name="color-filter" value="<?php echo $key ?>" data-id="<?php echo $product->attr->id ?>" data-url="<?php echo base_url('product/get_img') ?>" data-name="<?php echo $product->title ?>">
            <label class="color-filter" for="<?php echo 'color-filter'.$key ?>" style="background: <?php echo $value; ?>"></label>
          </li>
          <?php } ?>
        </ul>
        <h4 class="product-detail-name m-text16 p-b-13">
          <?php echo $product->name; ?>
        </h4>

        <span class="m-text17">
          <?php echo get_price($product->price,$product->discount).'.vnđ'; ?>
        </span>

        <p class="s-text8 p-t-10">
          Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
        </p>

        <!--  -->
        <div class="p-t-33 p-b-60 xxx">
          <form method="post" action="<?php echo base_url('cart/add') ?>">
            <div class="flex-m flex-w p-b-10">
              <div class="s-text15 w-size15 t-center">
                Color
              </div>

              <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                <select class="selection-2 change-size" name="color" data-url="<?php echo base_url('product/change_size'); ?>" data-attr-id="<?php echo $product->attr->id ?>">
                  <?php 
                    foreach (array_filter(explode('|', $product->attr->name)) as $key) {
                  ?>
                  <option><?php echo $key; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div> 
            
            <div class="flex-m flex-w">
              <div class="s-text15 w-size15 t-center">
                Size
              </div>
              <input type="hidden" class="posi" name="posi" value="0">
              <input type="hidden" name="redi" value="ref">
              <input type="hidden" name="id" value="<?php echo $product->id ?>">
              <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                <select class="selection-2 recipients" name="size">
                  <?php 
                    $size = explode('|', $product->attr->size);
                    foreach (explode(',',$size[0]) as $ele) {
                  ?>
                    <option><?php echo $ele; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="flex-r-m flex-w p-t-10">
              <div class="w-size16 flex-m flex-w">
                <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                  <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                  </button>

                  <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

                  <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                  </button>
                </div>

                <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                  <!-- Button -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                  <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Add to Cart
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="p-b-45">
          <span class="s-text8 m-r-35">SKU: <?php echo $product->in_stock; ?></span>
          <span class="s-text8">Categories: <?php echo $catalog->name; ?></span>
        </div>

        <!--  -->
        <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
          <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
            Description
            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
          </h5>

          <div class="dropdown-content dis-none p-t-15 p-b-23">
            <p class="s-text8">
              <?php echo $product->content; ?>
            </p>
          </div>
        </div>

        <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
          <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
            Additional information
            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
          </h5>

          <div class="dropdown-content dis-none p-t-15 p-b-23">
            <p class="s-text8">
              Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
            </p>
          </div>
        </div>

        <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
          <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
            Reviews (0)
            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
          </h5>

          <div class="dropdown-content dis-none p-t-15 p-b-23">
            <p class="s-text8">
              Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-m flex-w p-t-20">
      <span class="s-text20 p-r-20">
        Tags
      </span>

      <div class="wrap-tags flex-w">
        <?php 
          if ($product->meta_key && is_array(json_decode($product->meta_key))) {
              $meta_key = json_decode($product->meta_key);
              foreach ($meta_key as $key => $value) {
        ?>
              <a title="<?php echo $value ?>" href="<?php echo base_url('store?q='.$value) ?>" class="tag-item">
                  <?php echo $value; ?>
              </a>
        <?php
              }
          }
        ?>
      </div>
    </div>
</div>
<div id="dropDownSelect2"></div>
<?php $this->load->view('site/product/related') ?>
