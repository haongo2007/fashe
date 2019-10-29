<div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <a href="<?php echo base_url('home') ?>" class="logo-mobile">
        <img src="<?php echo public_url('upload/logo/'.$contact->logo) ?>" alt="IMG-LOGO">
    </a>

    <!-- Button show menu -->
    <div class="btn-show-menu">
        

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>
<!-- Menu Mobile -->
<div class="wrap-side-menu" >
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <span class="topbar-child1">
                    <?php echo $this->lang->line('delivery') ?>
                </span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
                    <span style="margin-right: 10px;" class="topbar-email">
                        <a href="tel:<?php echo $contact->phone; ?>"><i class="fa fa-envelope"></i>  <?php echo $contact->email; ?></a>
                    </span>
                    <span class="topbar-email">
                        <a href="mailto:<?php echo $contact->email; ?>"><i class="fa fa-phone"></i>  <?php echo $contact->phone; ?></a>            
                    </span>
                    
                    <div class="topbar-language rs1-select2" url="<?php echo base_url(); ?>">
                        <select class="selection-1" name="time">
                        <option value="vietnamese" <?php echo ($this->session->userdata('lang') == 'vietnamese') ? 'selected' : '' ?> >Vie </option>
                        <option value="english" <?php echo ($this->session->userdata('lang') == 'english') ? 'selected' : '' ?> >Eng </option>
                        </select>
                    </div>
                </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('home')?>"><?php echo $this->lang->line('home') ?></a>
            </li>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('store')?>"><?php echo $this->lang->line('store') ?></a>
            </li>
            <?php if (isset($hotdeal)) {
            ?>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('store?hotdeal='.$hotdeal->id)?>"><?php echo $this->lang->line('sale') ?></a>
            </li>
            <?php } ?>

            <?php if (isset($contact)) {
            ?>
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('contact')?>"><?php echo $this->lang->line('contact') ?></a>
            </li>
            <?php } ?>

            <?php if(isset($menu)){ ?>
                <?php foreach ($menu as $key) {
            ?>

            <li class="item-menu-mobile">
                <a href="<?php echo base_url('product/'.$key->url)?>"><?php echo $key->name; ?></a>
                <?php if (count($key->result) > 0)  {
                    echo '<ul class="sub-menu">';
                        foreach ($key->result as $row) { 
                ?>
                    <li><a href="<?php echo base_url('product/'.$row->url) ?>" href=""><?php echo $row->name; ?></a>
                        <?php if (count($row->brand) > 0)  {
                            echo "<ul class='sub-menu'>";
                            foreach ($row->brand as $brand) { 
                        ?>
                            <li><a href="<?php echo base_url('product/brand/'.$brand->id) ?>" href=""><?php echo $brand->name; ?></a></li>
                        <?php }
                            echo "</ul>";
                        } ?>
                    </li>
                <?php }
                    echo "</ul><i class='arrow-main-menu fa fa-angle-right' aria-hidden='true'></i>";
                } ?>  
            </li>

            <?php 
                }
            }?>
        </ul>
    </nav>
</div>
<!-- Header Icon mobile -->
<div class="header-icons-mobile">
    <div class="header-wrapicon1">
        <img src="<?php echo public_url('site/images/') ?>icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
        <div class="header-cart header-dropdown">
            <section class="bgwhite p-t-10 p-b-10">
                <div class="row">
                    <?php if ($this->session->userdata('user_id_login')) {
                    ?>
                    <div class="col-md-12">                                           
                        <h4 class="m-text20 p-b-10 t-center">
                            <?php echo $this->lang->line('hello') ?>: <span class="m-text8"><?php echo $user->name; ?></span>
                        </h4>
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    <?php echo $this->lang->line('infomation') ?>
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo base_url('user/logout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    <?php echo $this->lang->line('logout') ?>
                                </a>
                            </div>
                        </div>

                    </div>
                    <?php }else{ ?>
                    <div class="col-md-12">
                        <h4 class="m-text26 p-b-10">
                            <?php echo $this->lang->line('login') ?>
                        </h4><span class="err-mobile m-text8" style="font-size: 13px;"></span>
                        <form class="FormCl-mobile">
                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" 
                                placeholder="<?php echo $this->lang->line('email') ?>">
                            </div>

                            <div class="bo4 of-hidden size15 m-b-10">
                                <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" 
                                placeholder="<?php echo $this->lang->line('password') ?>">
                            </div>

                            <div class="w-size25">
                                <!-- Button -->
                                <button type="button" url="<?php echo base_url('user/login'); ?>" class="login-mobile flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4"><?php echo $this->lang->line('login') ?></button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>

    <span class="linedivide1"></span>

    <div class="header-wrapicon2">
        <img src="<?php echo public_url('site/images/') ?>icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
        <span class="header-icons-noti subtotal notifycation">
            <?php if ($total_items > 0) {
                    echo $total_items;
            }else{echo "0";} ?>
        </span>
        <!-- Header cart noti -->
        <div class="header-cart header-dropdown cart-cont">
            <?php if ($total_items > 0){?>
            <a class="clear-cart" href="javascript:void(0)" url="<?php echo base_url('cart/clear') ?>"><i class="fa fa-close"></i></a>
            <ul class="header-cart-wrapitem ul-cart">
                <?php $total_count = 0; ?>
                <?php foreach ($cart as $row):?>
                    <?php $total_count += $row['subtotal']; ?>
                        <li class="header-cart-item">
                            <a class="remove_cart" url="<?php echo base_url('cart/del') ?>" data-id="<?php echo $row['id'] ?>">
                            <div class="header-cart-item-img">        
                                <img src="<?php echo $row['image_link'] ?>" alt="IMG">
                            </div>
                            </a>
                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name" title="<?php echo $row['name']; ?>">
                                    <?php echo count_text($row['name']); ?>
                                </a>

                                <span class="header-cart-item-info">
                                    <?php echo $row['qty']; ?> x <?php echo number_format($row['subtotal']).'.vnđ'; ?>
                                </span>
                            </div>
                        </li>
                <?php endforeach; ?>
            </ul>

            <div class="header-cart-total">
                <?php echo $this->lang->line('total').number_format($total_count).'.vnđ'; ?>
            </div>

            <div class="header-cart-buttons">
                    <a href="<?php echo base_url('cart') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        <?php echo $this->lang->line('checkout') ?>
                    </a>
            </div>
            <?php }else{ ?>
                <h3 class="m-text8 text-center"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                    <?php echo $this->lang->line('empty-cart') ?></h3>
            <?php } ?>
        </div>
    </div>
    <span class="linedivide1"></span>
    <div class="header-wrapicon1">
        <img src="<?php echo public_url('site/images/') ?>icons/like.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
        <span class="header-icons-noti notifycation-heart">
            <?php if (count($this->session->userdata('wishlist')) > 0) {
                    echo count($this->session->userdata('wishlist'));
            }else{echo "<span>0</span>";} ?>
        </span>
        <div class="header-cart header-dropdown" style="width: 95vw;max-height:90vh;padding: 10px;overflow-y: scroll;overflow-x: hidden;">
            <div class='row recip-cpn'>
            <?php   
                if ($this->session->userdata('wishlist')) { 
                    $this->load->view('site/header/mobile_wishlist');
                }else{
                    echo '<h3 class="m-text8 text-center">'.$this->lang->line('empty-wishlist').'</h3>';
                }
            ?>
            </div>
        </div>
    </div>
    <?php   
        if ($this->session->userdata('recentlyViewed')) { 
    ?>
    <span class="linedivide1"></span>
    <div class="header-wrapicon1">
        <img src="<?php echo public_url('site/images/') ?>icons/eye.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
        <span class="header-icons-noti">
            <?php if (count($this->session->userdata('recentlyViewed')) > 0 ) {
                    echo count($this->session->userdata('recentlyViewed'));
            }else{echo "<span>0</span>";} ?>
        </span>
        <div class="header-cart header-dropdown" style="width: 95vw;max-height:90vh;padding: 10px;overflow-y: scroll;overflow-x: hidden;">
            <?php   
                if ($this->session->userdata('recentlyViewed')) {
                    $this->load->view('site/header/mobile_recentlyviewed');
                }
            ?>
        </div>
    </div>
    <?php } ?>
</div>