<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
    <img class="img-responsive" alt="paypal-banner" src="<?php echo public_url('upload/logo/paypal_banner.png') ?>">
</section>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Product</th>
                        <th class="column-3">Color</th>
                        <th class="column-3">Size</th>
                        <th class="column-3">Price</th>
                        <th class="column-4">Quantity</th>
                        <th class="column-5">Total</th>
                    </tr>
            <?php foreach ($cart_paypal['shopping_cart']['items'] as $row):?>
                    <tr class="table-row xxx">
                        <td class="column-1">
                            <img src="<?php echo $row['image_link'] ?>" alt="IMG-PRODUCT" width="100">
                        </td>
                        <td class="column-2"><span><?php echo $row['name']; ?></span></td>
                        <td class="column-2">
                            <span><?php echo $row['color']; ?></span>
                        </td>
                        <td class="column-2">
                            <span><?php echo $row['size']; ?></span>
                        </td>
                        <td class="column-2">
                            <span><?php echo $row['price'].'.$'; ?></span>
                        </td>
                        <td class="column-2">
                            <span><?php echo $row['qty']; ?></span>
                        </td>
                        <td class="column-2"><?php echo $row['total'].'.$'; ?></td>
                    </tr>
                <?php endforeach; ?>
                
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><strong> Subtotal</strong></td>
                        <td> $<?php echo $cart_paypal['shopping_cart']['subtotal']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Shipping</strong></td>
                        <td>$<?php echo $cart_paypal['shopping_cart']['shipping']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Handling</strong></td>
                        <td>$<?php echo $cart_paypal['shopping_cart']['handling']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tax</strong></td>
                        <td>$<?php echo $cart_paypal['shopping_cart']['tax']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Grand Total</strong></td>
                        <td>$<?php echo $cart_paypal['shopping_cart']['grand_total']; ?></td>
                    </tr>
                    <tr>
                        <td class="center" colspan="2"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <?php 
                            $link_out = isset($cart_paypal['paypal_payer_id']) ? base_url('express_checkout/DoExpressCheckoutPayment') : base_url('express_checkout/SetExpressCheckout');
                            $button = isset($cart_paypal['paypal_payer_id']) ? 'Finish' : 'Continue';
                        ?>
                    <a href="<?php echo $link_out; ?>" class="flex-c-m sizefull bo-rad-23 s-text1 btn btn-primary"><?php echo $button; ?></a>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (isset($cart_paypal['paypal_payer_id'])) { ?>
                    <table class="table">
                        <thead>
                            <th><strong> Billing Information</strong></th>
                            <th><strong>Shipping Information</strong></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <?php echo $cart_paypal['first_name'] . ' ' . $cart_paypal['last_name']; ?>
                            </td>
                            <td>
                                <?php echo $cart_paypal['shipping_name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $cart_paypal['email']; ?>
                            </td>
                            <td>
                                <?php echo $cart_paypal['shipping_street'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $cart_paypal['phone_number']; ?>
                            </td>
                            <td>
                                <?php echo $cart_paypal['shipping_city'] . ', ' . $cart_paypal['shipping_state'] . '  ' . $cart_paypal['shipping_zip'] . '<br />' .$cart_paypal['shipping_country_name'] ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div id="dropDownSelect2"></div>