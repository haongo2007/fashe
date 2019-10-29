
  <!-- Modal -->
  <div class="modal fade myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="section">
                <!-- container -->
                <div class="container">
                  <!-- row -->
                  <div class="row">
                    
                    <div class="col-md-5 col-md-push-2">
                      <div class="link-img zoom">
                          
                      </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2 col-md-pull-5">
                        
                        <div class="list-img" url="<?php echo public_url('upload/product/') ?>">
                          
                        </div>
                    </div>

                    <div class="col-md-5">
                      <div class="product-details">
                        <h2 class="product-name"></h2>
                        <div>
                          <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                          </div>
                          <a class="review-link" href="#"></a>
                        </div>
                        <div>
                          <h3 class="product-price"></h3><del class="product-old-price"></del>
                          <span class="product-available"></span>
                        </div>

                        <div class="infomation">
                          
                        </div>
                        <form method="post" action=" " class="form_add">
                        <div class="product-options">
                          <label>
                            Color
                            <select name="color" class="input-select">
                              <option value="0">Red</option>
                            </select>
                          </label>
                        </div>

                        <div class="add-to-cart">
                          <div class="qty-label">
                            Qty
                            <div class="input-number">
                              <input type="number" name="qty" value="1">
                              <span class="qty-up">+</span>
                              <span class="qty-down">-</span>
                            </div>
                          </div>
                          <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                        </form>
                        <ul class="product-btns">
                          <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                          <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                          <li>Category:</li>
                          <li><a href="#">Headphones</a></li>
                          <li><a href="#">Accessories</a></li>
                        </ul>

                        <ul class="product-links">
                          <li>Share:</li>
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                      </div>
                    </div>
                    <!-- /Product details -->

                    <!-- Product tab -->
                    
                    <!-- /product tab -->
                  </div>
                  <!-- /row -->
                </div>
                <!-- /container -->
              </div>
        </div>

      </div>
      
    </div>
  </div>
  
<style type="text/css">
.zoom {
display:inline-block;
position: relative;
}
.zoom img {
display: block;
}
.zoom img::selection { background-color: transparent; }
.item{
  width: 100%;
}
</style>

<!--Modal compare-->
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
    <div  id="btn-close-modal" class="close-animatedModal"> 
        <i class="fa fa-close"></i>
    </div>
        
    <div class="modal-content">
        <div class="modal-inner">
          <div class="no-products">Select some products to compare first</div>  
          <div class="modal-products row"></div>     
        </div>
    </div>
</div>