<div id="title-product" class="col-sm-12"><h2><span>Tin Tức<sup class="badge"><?php echo count($news_list); ?></sup></span></h2></div>
  
<div class="col-sm-12 catagori" id="res"><!-- The box-content-center -->
    <?php foreach ($news_list as $row) {
    ?>
    <div class="col-sm-6">
            <a  href="<?php echo base_url('news/view/'.$row->id) ?>" title="<?php echo $row->title; ?>">
                <span><h4><?php echo $row->title ;?></h4></span>
                <img style="float: left;margin-right: 10px" width="200" class="img-responsive" src="<?php echo public_url('upload/news/'.$row->image_link)?>" alt='<?php echo $row->title ?>'/>
            </a>
            <div id="col">
                <h4><?php echo $row->intro; ?></h4>
            </div>              
            
    </div>
    <?php } ?>
           
</div><!-- End box-content-center -->

