
<div id="title-product" class="col-sm-12"><h2><span>Tất Cả Sản Phẩm</span></h2></div>
    
<div id="res" class="col-sm-12 chang">
<?php foreach ($list as $row):?>
    <?php 
        $name = stripUnicode($row->name);
        $name = strtolower($name);
        $name = str_replace(' ',"-",$name);
    ?>
        <div class="col-sm-3" id="product"><!-- The box-content-center -->
            <a  href="<?php echo base_url($name.'-v'.$row->id.'.html'); ?>" title="<?php echo $row->name; ?>">
                <img class="img-responsive" src="<?php echo public_url('upload/product/'.$row->image_link)?>" alt='<?php echo $row->name ?>'/>
            </a>
            <div id="col">
                <h4><?php echo $row->name; ?></h4>
                <?php 
                $price_new = $row->price - $row->discount;
                if ($row->discount > 0 ) {
                ?>  
                    <h4><span style="color: red"><?php echo number_format($price_new).'đ'; ?></span>
                        <sub style="text-decoration:line-through"><?php echo number_format($row->price).'đ'; ?></sub>
                    </h4>
                    
                <?php
                }
                else{
                    echo '<h4 class="price">'.number_format($row->price).'đ'.'</h4>';
                }
                ?>
                <?php 

                    $row->raty = ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0;
                    $raty = $row->raty;
                    
                ?>
                <span>Tổng Lượt Đánh Giá <span class="rate_count" ><?php echo $row->rate_count; ?></span></span>
                <div class="starType" data-score="<?php echo $raty; ?>" style="margin-bottom: 10px;color:rgb(0, 1, 1);">
                  
                </div>
                <div class="btn-group">
                  <button class="btn btn-primary"><a href="<?php echo base_url('cart/add/'.$row->id.'/1') ?>" title="Sản phẩm">Mua Ngay</a></button>
                  <button class="btn btn-primary"><a href="<?php echo base_url('cart/add/'.$row->id) ?>" title="Sản phẩm">Trả Góp</a></button>
                </div>
            </div>              
            
        </div><!-- End box-content-center -->
<?php endforeach; ?>
</div>
</div>
</div>
<script type="text/javascript">
    $('.starType').raty({
      cancel   : false,
      starType : 'i',
      score    : function(){
        return $(this).attr('data-score');
      },
      half     : true,
    });

</script>
