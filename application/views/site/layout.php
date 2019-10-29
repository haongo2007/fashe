<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('site/head'); ?>
</head>
<body class="animsition">
	<?php $this->load->view('site/header/header'); ?>
	<?php $this->load->view($temp,$this->data); ?>
	<?php $this->load->view('site/footer'); ?>
</body>
</html>
