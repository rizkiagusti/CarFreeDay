<?php
  error_reporting(E_ALL^(E_NOTICE | E_WARNING));
?>
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
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/material-kit.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/event.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />

</head>

<body class="index-page">
<!-- Navbar -->
<div id="utama">
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

	    
	</div>
</nav>
</div>


<body class="index-page">
<br>
		<div class="section section-full-screen section-signup" style="background-image: url('http://infobudayaindonesia.com/wp-content/uploads/2017/01/Menilik-Keunikan-Gedung-Sate-Sebagai-Tempat-Bersejarah-Di-Bandung.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="card card-signup">
							<form class="form" method="POST" action="<?php echo base_url();?>login/login_act">
								<div class="header header-primary text-center">
									<h4>LOGIN</h4>
									
								</div>
								
								<div class="content">
									<p align="center"><font color="red"><i><b><?php echo $pesan; ?></b></i></font></p>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name="email" class="form-control" value="<?php echo set_value('email')?>" placeholder="Email..."/>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="password" placeholder="Kata Sandi..." class="form-control" />
									</div>

									<!-- If you want to add a checkbox to this form, uncomment this code

									<div class="checkbox">
										<label>
											<input type="checkbox" name="optionsCheckboxes" checked>
											Subscribe to newsletter
										</label>
									</div> -->
								</div>
								<div class="footer text-center">
									<input type="submit" class="btn btn-simple btn-primary btn-lg" value="Login">
									<br>
									<a href="<?php echo base_url()?>login/lupaKataSandi"><font color="darkblue">Lupa Kata Sandi?</font></a>
									<br>
									<br>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
</body>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>/assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>/assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?php echo base_url();?>/assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="<?php echo base_url();?>/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="<?php echo base_url();?>/assets/js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>
</html>
