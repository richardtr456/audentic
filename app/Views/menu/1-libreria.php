<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../public/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	 <script src="<?php echo base_url('public/js/plugin/webfont/webfont.min.js');?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["<?php echo base_url('public/css/fonts.min.css');?>"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/css/atlantis.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('public/css/sweetalert.min.css'); ?>">

	
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url('public/css/demo.css');?>">
	
</head>
<body>