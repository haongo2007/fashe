
<div class="wrap-slick3 flex-sb flex-w">
  <div class="wrap-slick3-dots"></div>
  <?php
      $original = 'original/';
      $small = '300x300/'; 
      $pos = $pos;
      $mau = array_filter(explode('|', $attr->name));
      $path = $attr->path;
      $img = array_filter (explode('|', $attr->image_list));
      $img = json_decode($img[$pos]);               
  ?>
  <div class="slick3">
    <div class="item-slick3" data-thumb="<?php echo base_url($path.$original.$name.'/'.$mau[$pos].'/'.$img[0]) ?>">
      <div class="wrap-pic-w">
        <a class="over-view" href="<?php echo base_url($path.$original.$name.'/'.$mau[$pos].'/'.$img[0]) ?>" data-lightbox="roadtrip">
         <img src="<?php echo base_url($path.$original.$name.'/'.$mau[$pos].'/'.$img[0]) ?>" alt="IMG-PRODUCT">
        </a>
      </div>
    </div>
    <?php foreach ($img as $key => $value) {
      if ($key < 1) continue;
    ?>
    <div class="item-slick3" data-thumb="<?php echo base_url($path.$original.$name.'/'.$mau[$pos].'/'.$value) ?>">
      <div class="wrap-pic-w">
        <a class="over-view-list" href="<?php echo base_url($path.$original.$name.'/'.$mau[$pos].'/'.$value) ?>" data-lightbox="roadtrip">
          <img src="<?php echo base_url($path.$original.$name.'/'.$mau[$pos].'/'.$value) ?>" alt="IMG-PRODUCT">
        </a>
      </div>
    </div>
    <?php 
    }
    ?>
  </div>
</div>
<script type="text/javascript">
  $('.slick3').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      dots: true,
      appendDots: $('.wrap-slick3-dots'),
      dotsClass:'slick3-dots',
      infinite: true,
      autoplay: false,
      autoplaySpeed: 6000,
      arrows: false,
      customPaging: function(slick, index) {
          var portrait = $(slick.$slides[index]).data('thumb');
          return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
      },  
  });
</script>