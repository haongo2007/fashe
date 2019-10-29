    <!-- Footer -->
    <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
        <div class="flex-w p-b-90">
            <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    <?php echo $this->lang->line('tit1') ?>
                </h4>

                <div>
                    <p class="s-text7 w-size27">
                        <?php echo $this->lang->line('info').' '.$contact->address ?>
                    </p>

                    <div class="flex-m p-t-30">
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                    </div>
                </div>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    <?php echo $this->lang->line('tit2') ?>
                </h4>

                <ul>
                    <?php 
                        foreach ($foot_cate as $key) {
                    ?>
                    <li class="p-b-9">
                        <a href="<?php echo base_url('store?consumers='.$key->id) ?>" class="s-text7">
                            <?php echo $key->name; ?>
                        </a>
                    </li>
                    <?php 
                        }
                    ?>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    <?php echo $this->lang->line('tit3') ?>
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Search
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            About Us
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Contact Us
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Returns
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    <?php echo $this->lang->line('tit4') ?>
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    <?php echo $this->lang->line('tit5') ?>
                </h4>

                <form>
                    <div class="effect1 w-size9">
                        <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
                        <span class="effect1-line"></span>
                    </div>

                    <div class="w-size2 p-t-20">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4" type="button">
                            <?php echo $this->lang->line('subcri') ?>
                        </button>
                        <div class="messa"></div>
                    </div>

                </form>
            </div>
        </div>

        <div class="t-center p-l-15 p-r-15">
            <a href="#">
                <img class="h-size2" src="<?php echo public_url('site/images') ?>/icons/paypal.png" alt="IMG-PAYPAL">
            </a>

            <a href="#">
                <img class="h-size2" src="<?php echo public_url('site/images') ?>/icons/visa.png" alt="IMG-VISA">
            </a>

            <a href="#">
                <img class="h-size2" src="<?php echo public_url('site/images') ?>/icons/mastercard.png" alt="IMG-MASTERCARD">
            </a>

            <a href="#">
                <img class="h-size2" src="<?php echo public_url('site/images') ?>/icons/express.png" alt="IMG-EXPRESS">
            </a>

            <a href="#">
                <img class="h-size2" src="<?php echo public_url('site/images') ?>/icons/discover.png" alt="IMG-DISCOVER">
            </a>

            <div class="t-center s-text8 p-t-20">
                Copyright © 2018 All rights reserved. | This Site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/profile.php?id=100009628893770" target="_blank">HaongoDEV</a>
            </div>
        </div>
        <div class="col-md-3 chat-box">
          <!-- DIRECT CHAT SUCCESS -->
          <div class="box box-success direct-chat direct-chat-success">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span class="badge">3</span>
                <button type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="<?php echo base_url('pusher') ?>" method="post" id="myvoteform">
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control txt-mess">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat send-mess">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
    </footer>
    


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->   
    <script src="<?php echo public_url('site/vendor') ?>/toastrjs/toastr.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/bootstrap/js/popper.js"></script>
    <script  src="<?php echo public_url('site/vendor') ?>/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/slick/slick.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/') ?>js/slick-custom.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/js') ?>/my.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/js') ?>/progress-ajax-product.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/countdown/jquery.countdown.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
    <script  src="<?php echo public_url('site/vendor') ?>/autocomplete/jquery-ui.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo public_url('admin/LTE/my') ?>/js.cookie.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo public_url('site/') ?>js/main.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo public_url('site/') ?>js/pusher.min.js"></script>
<script>
lightbox.option({
  'resizeDuration': 200,
  'wrapAround': true
})
</script>
<?php if (isset($notify)) {?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        toastr.success('<?php echo $notify; ?>');
    });
    </script>
<?php } ?>
<?php $this->load->view('site/direct_client') ?>
