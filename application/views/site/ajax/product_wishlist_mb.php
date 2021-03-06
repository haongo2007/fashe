<?php if (isset($wishlist) && count($wishlist) > 0) { ?>
    <?php 
    echo '<h4 class="tam m-text20 t-center col-md-12 m-b-10">'.$this->lang->line('wishlist').'</h4>';  
    $wishlist = $this->session->userdata('wishlist');
    foreach ($wishlist as $row => $value) {
    $row = $this->product_model->get_info($value);
    $id_pr = $row->id;
    $name_pr = stripUnicode($row->name);
    $name_x = $row->name;    

    $where = array('id_product' => $value);
    $attr = $this->atribute_model->get_info_rule($where);
    $path = $attr->path;
    $img_exp = array_filter (explode('|', $attr->image_list));
    $img = json_decode($img_exp[0]); 
    $mau = array_filter(explode('|', $attr->name));
    $size = array_filter(explode('|', $attr->size));
?>
    <!-- Block2 -->
    <div class="block2 col-md-6 dis-flex">
        <div class="block2-img-header size50 wrap-pic-w wrap-pic-h of-hidden pos-relative block2-labelnew m-r-10">
            <img id="img_ne" src="<?php echo base_url($path.'300x300/'.$row->title.'/'.$mau[0].'/'.$img[0]) ?>" alt="IMG-PRODUCT">

            <div class="block2-overlay trans-0-4">
                <?php 
                    if ($this->session->userdata('wishlist')) {
                        if (in_array($row->id, $this->session->userdata('wishlist'))) {
                            $display = 'block2-btn-towishlist';
                        }else{
                            $display = 'block2-btn-addwishlist';
                        }
                    }else{
                            $display = 'block2-btn-addwishlist';
                    }
                ?>
                <a href="#" class="rmv_w hov-pointer trans-0-4 <?php echo $display ?>" data-pr="<?php echo $row->id ?>" data-url="<?php echo base_url('product/wishlist'); ?>">
                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                </a>
                <ul class="dis-block ab-r-t">
                  <?php 
                    foreach (explode('|', $attr->code) as $clr => $value) {
                        $data_img = json_decode($img_exp[$clr]);
                  ?>
                  <li>
                    <label class="color-filter-2" style="background: <?php echo $value; ?>" 
                    data-img="<?php echo base_url($path.'300x300/'.$row->title.'/'.$mau[$clr].'/'.$data_img[0]) ?>"></label>
                  </li>
                  <?php } ?>
                </ul>
            </div>
        </div>
        <div class="mb-elm-hv xxx flex-w size50">
            <div class="chos-col">
                <div class="rs2-select2 rs3-select2 bo4 of-hidden">
                  <select class="selection-2 clr change-size" name="color" data-url="<?php echo base_url('product/change_size'); ?>" data-attr-id="<?php echo $attr->id ?>">
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

                  <input class="size50 m-text18 t-center num-prod" type="number" name="num-product" value="1">

                  <button class="btn-num-product-up color1 w-size29 bg8 eff2">
                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                  </button>
            </div>
            <div class="block2-txt p-t-10">
                <?php $name = stripUnicode($row->name); ?>
                <a href="<?php echo base_url($name.'-v'.$row->id.'.html') ?>" add_wish="<?php echo $this->lang->line('add-wish') ?>"
                remove_wish="<?php echo $this->lang->line('remove-wish') ?>" add_cart="<?php echo $this->lang->line('add-cart') ?>" class="block2-name dis-block s-text3 p-b-5" title="<?php echo $row->name ?>">
                    <?php echo count_text($row->name) ; ?>
                </a>
                <?php if ($row->discount > 0) { ?>
                    <span class="block2-price m-text7 p-r-5">
                        <?php echo number_format($row->price).'<sup>.đ</sup>'; ?>
                    </span>
                <?php } ?>
                <span class="block2-price m-text6 p-r-5">
                    <?php echo get_price($row->price,$row->discount).'<sup>.đ</sup>'; ?>
                </span>
            </div>
            <div class="block2-btn-addcart p-t-10 w-full trans-0-4">
                <!-- Button -->
                <button url="<?php echo base_url('cart/add') ?>" data-id="<?php echo $row->id ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
<?php   }}else{
            echo '<h3 class="m-text8 text-center">'.$this->lang->line('empty-wishlist').'</h3>';
        } ?>
<script type="text/javascript">
    $('.notifycation-heart').html(<?php echo $count; ?>);
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
    $('.rmv_w').click(function(e) {
        e.preventDefault();
        var _this = $(this),
            id = _this.attr('data-pr'),
            url = _this.attr('data-url'),
            ttx = _this.parents('.block2').find('.block2-name'),
            nameProduct = ttx.text(),
            alertProduct = ttx.attr('remove_wish');
        $('.'+id+'_pr').addClass('block2-btn-addwishlist');
        $('.'+id+'_pr').removeClass('block2-btn-towishlist');
        if ($(window).width() < 992) {
            var dataform = 'id='+id+'&callback=oke&mb=ok';
        }else{
            var dataform = 'id='+id+'&callback=oke';
        }
        $.ajax({
            url: url,
            type: 'post',
            data:  dataform,
            async: true
        }).done(function (data) {
                swal(nameProduct, alertProduct, "success");
                $('.notifycation-heart').html(data);
                _this.parents('.block2').remove();
                if (data == 0) {
                    $('.tam').text('<?php echo $this->lang->line('empty-wishlist'); ?>');
                }
        });
    });
</script>