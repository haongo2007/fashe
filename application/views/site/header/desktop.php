<div class="container-menu-header">
    <div class="topbar">
        <div class="topbar-social">
            <a href="#" title="facebook" class="topbar-social-item fa fa-facebook"></a>
            <a href="#" title="instagram" class="topbar-social-item fa fa-instagram"></a>
            <a href="#" title="pinterest" class="topbar-social-item fa fa-pinterest-p"></a>
            <a href="#" title="snapchat" class="topbar-social-item fa fa-snapchat-ghost"></a>
            <a href="#" title="youtube" class="topbar-social-item fa fa-youtube-play"></a>
        </div>

        <span class="topbar-child1">
            <?php echo $this->lang->line('delivery') ?>
        </span>

        <div class="topbar-child2">
            <span class="topbar-email">
                <a title="tel" href="tel:<?php echo $contact->phone; ?>"><i class="fa fa-phone"></i> <?php echo $contact->phone; ?>    </a>
            </span>
            <div class="topbar-language rs1-select2">
                <select class="selection-1" name="time" url="<?php echo base_url(); ?>">
                    <option value="vietnamese" <?php echo ($this->session->userdata('lang') == 'vietnamese') ? 'selected' : '' ?> >Vie </option>
                    <option value="english" <?php echo ($this->session->userdata('lang') == 'english') ? 'selected' : '' ?> >Eng </option>
                </select>
            </div>
        </div>
    </div>
    <div class="wrap_header">
        <!-- Logo -->
        <a title="fashe" href="<?php echo base_url('home') ?>" class="logo">
            <img src="<?php echo public_url('upload/logo/'.$contact->logo) ?>" alt="IMG-LOGO">
        </a>

        <!-- Menu -->
        <div class="wrap_menu">
            <nav class="menu">
                <ul class="main_menu">
                    <li>
                        <a title="Home" href="<?php echo base_url('home') ?>"><?php echo $this->lang->line('home') ?></a>
                       <!-- <ul class="sub_menu">
                            <li><a href="index.html">Homepage V1</a></li>
                            <li><a href="home-02.html">Homepage V2</a></li>
                            <li><a href="home-03.html">Homepage V3</a></li>
                        </ul>-->
                    </li> 

                    <li>
                        <a title="Store" href="<?php echo base_url('store')?>"><?php echo $this->lang->line('store') ?></a>
                    </li>
                    <?php if (isset($hotdeal)) {
                    ?>
                    <li>
                        <a title="Hotdeal" href="<?php echo base_url('store?hotdeal='.$hotdeal->id)?>">
                            <?php echo $this->lang->line('sale') ?></a>
                    </li>
                    <?php } ?>

                    <?php if (isset($contact)) {
                    ?>
                    <li>
                        <a title="Contact" href="<?php echo base_url('contact')?>"><?php echo $this->lang->line('contact') ?></a>
                    </li>
                    <?php } ?>

                    <?php if(isset($menu)){ ?>
                        <?php foreach ($menu as $key) {
                    ?>           
                    <li>
                        <a href="<?php echo base_url('product/categories_parent/'.$key->id)?>"><?php echo $key->name; ?></a>
                        <?php if (count($key->result) > 0)  {
                          echo "<ul class='sub_menu'>";
                            foreach ($key->result as $row) { 
                        ?>
                          
                            <li><a href="<?php echo base_url('product/categories/'.$row->id) ?>" href=""><?php echo $row->name; ?></a>
                                <?php if (count($row->brand) > 0)  {
                                    echo "<ul class='sub_menu'>";
                                    foreach ($row->brand as $brand) { 
                                ?>
                                    <li><a href="<?php echo base_url('product/brand/'.$brand->id) ?>" href=""><?php echo $brand->name; ?></a></li>
                                <?php }
                                    echo "</ul>";
                                } ?>
                            </li>  
                        <?php }
                          echo "</ul>";
                      } ?>
                    </li>

                    <?php 
                        }
                    }?>
                </ul>
            </nav>
        </div>

        <!-- Header Icon -->
        <div class="header-icons">
            <?php if ($this->session->userdata('recentlyViewed')) { ?>
            <div class="header-wrapicon1">
                <img src="<?php echo public_url('site/images/') ?>icons/eye.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti">
                    <?php if (count($this->session->userdata('recentlyViewed')) > 0 ) {
                            echo count($this->session->userdata('recentlyViewed'));
                    }else{echo "<span>0</span>";} ?>
                </span>
                <div class="header-cart header-dropdown desktop" style="width: 90vw;padding: 10px;">
                    <?php   
                        $this->load->view('site/header/desktop_recentlyviewed');
                    ?>
                </div>
            </div>
            <span class="linedivide1"></span>
            <?php } ?>
            <div class="header-wrapicon2">
                <img src="<?php echo public_url('site/images/') ?>icons/like.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti notifycation-heart">
                    <?php if ($this->session->userdata('wishlist') > 0 ) {
                            echo count($this->session->userdata('wishlist'));
                    }else{echo "<span>0</span>";} ?>
                </span>
                <div class="header-cart header-dropdown desktop" style="width: 90vw;padding: 10px;">
                    <div class='row recip-cpn'>
                    <?php   
                        if ($this->session->userdata('wishlist')) { 
                            $this->load->view('site/header/desktop_wishlist');
                        }else{
                            echo '<h3 class="m-text8 text-center">'.$this->lang->line('empty-wishlist').'</h3>';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <span class="linedivide1"></span>

            <div class="header-wrapicon3">
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
                                        <a title="Logout" href="<?php echo base_url('user/logout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            <?php echo $this->lang->line('logout') ?>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <?php }else{ ?>
                            <div class="col-md-12">
                                <h4 title="Login" class="m-text26 p-b-10">
                                    <?php echo $this->lang->line('login') ?>
                                </h4><span class="err m-text8" style="font-size: 13px;"></span>
                                <form class="FormCl">
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
                                        <button type="button" url="<?php echo base_url('user/login'); ?>" class="login flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4"><?php echo $this->lang->line('login') ?></button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                </div>
            </div>

            <span class="linedivide1"></span>

            <div class="header-wrapicon4">
                <img src="<?php echo public_url('site/images/') ?>icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti notifycation">
                    <?php if ($total_items > 0) {
                            echo $total_items;
                    }else{echo "<span>0</span>";} ?>
                </span>
                <!-- Header cart noti -->
                <div class="header-cart header-dropdown cart-cont">
                <?php if ($total_items > 0){?>
                    <a class="clear-cart" href="#" url="<?php echo base_url('cart/clear') ?>"><i class="fa fa-close"></i></a>
                    <ul class="header-cart-wrapitem ul-cart">
                        <?php $total_count = 0; ?>
                            <?php foreach ($cart as $row):?>
                                <?php $total_count += $row['subtotal']; ?>
                                    <li class="header-cart-item">
                                        <a class="remove_cart" data-id="<?php echo $row['id'] ?>" url="<?php echo base_url('cart/del') ?>">
                                        <div class="header-cart-item-img">        
                                            <img src="<?php echo $row['image_link'] ?>" alt="IMG">
                                        </div>
                                        </a>
                                        <div class="header-cart-item-txt">
                                            <a href="#" class="header-cart-item-name" remove-cart="<?php echo $this->lang->line('remove-cart') ?>" title="<?php echo $row['name']; ?>">
                                                <?php echo count_text($row['name']); ?>
                                            </a>

                                            <span class="header-cart-item-info">
                                                <?php echo $row['qty']; ?> x <?php echo number_format($row['subtotal']); ?>.vnđ
                                            </span>
                                        </div>
                                    </li>
                            <?php endforeach; ?>
                    </ul>

                    <div class="header-cart-total">
                        <?php echo $this->lang->line('total') ?><?php echo number_format($total_count).'.vnđ'; ?>
                    </div>
                    <div class="header-cart-buttons">
                            <!-- Button -->
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
        </div>
    </div>
</div>