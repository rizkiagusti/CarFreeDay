<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Car Free Day Bandung</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/material-kit.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/event.css" rel="stylesheet"/>
  	
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />	

	<link href="<?php echo base_url();?>assets/panitia/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/panitia/css/fixedHeader.bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/panitia/css/responsive.bootstrap.min.css" rel="stylesheet" />

</head>
<body class="index-page">
<nav class="navbar navbar-info navbar-fixed-top ">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-info">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	    	<a href="<?php echo base_url(); ?>">
	        	<div class="logo-container">
	        	    <div class="logo">
	                    <img height="45px" src="<?php echo base_url(); ?>assets/img/1.png" alt="CFD Bandung" rel="tooltip" title="<b>CFD Kota Bandung</b> selamat datang di webisite Car Free Day" data-placement="bottom" data-html="true">
	                </div>
	                <div class="logo">
	                    <img src="<?php echo base_url(); ?>assets/img/favicon.png" alt="CFD Bandung" rel="tooltip" title="<b>CFD Kota Bandung</b> selamat datang di webisite Car Free Day" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                    CFD Bandung
	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="example-navbar-info">
			<ul class="nav navbar-nav navbar-right">
		        <?php
    				if (empty($_SESSION['petugas_email'])) {
				?>
				<li>
		            <a href="<?php echo base_url(); ?>">
		               <i class="material-icons">home</i> Beranda
		            </a>
		        </li>
		        <li>
		            <a href="<?php echo base_url(); ?>#event">
		                <i class="material-icons">schedule</i>Jadwal
		            </a>
		        </li>
		        <li>
		            <a href="<?php echo base_url(); ?>petugas">
		                <i class="material-icons">list</i>Petugas
		            </a>
		        </li>
		        <?php
				}else{
				?>
				<li>
					<a href="<?php echo base_url();?>petugas/home">
						<i class="material-icons">home</i> Home
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>petugas/acara/tambah">
						<i class="material-icons">add</i> Acara
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>petugas/pengaturan">
						<i class="fa fa-cog"></i> Pengaturan
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>petugas/logout">
						<i class="fa fa-sign-out"></i> Log Out
					</a>
				</li>
				<?php	
				}
				?>
		        		        
		        
			</ul>
		</div>
	</div>
</nav>
