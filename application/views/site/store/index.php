<!-- header page -->
<?php $this->load->view('site/store/head'); ?>
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<!-- left -->
			<?php $this->load->view('site/store/left'); ?>
			<div class="col-sm-12 col-md-12 col-lg-9 p-b-50 bigcontent">
				<!-- top -->
				<?php $this->load->view('site/store/top'); ?>

				<!-- Product -->
				<div class="row conthere">
					<!-- content -->
					<?php $this->load->view('site/store/content');?>
					
				</div>

				<!-- Pagination -->
				<?php $this->load->view('site/store/pagination'); ?>
			</div>
		</div>
	</div>
</section>
<!-- footer page -->
<?php $this->load->view('site/store/footer'); ?>