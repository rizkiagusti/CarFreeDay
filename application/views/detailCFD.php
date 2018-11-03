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
	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c927869b774c00116590a5&product=sticky-share-buttons"></script>
</head>

<body class="components-page">
<!-- Navbar -->
<div id="utama">
<nav class="navbar navbar-info navbar-fixed-top navbar">
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
	                    <img src="<?php echo base_url(); ?>assets/img/favicon.png" alt="Creative Tim Logo" rel="tooltip" title="<b>CFD Kota Bandung</b> selamat datang di webisite Car Free Day" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">
	                    CFD Bandung
	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="example-navbar-info">
			<ul class="nav navbar-nav navbar-right">
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
		        
		        <li>
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>
				</li>

			</ul>
		</div>
	</div>
</nav>
</div>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('https://1.bp.blogspot.com/-r2XbMVG9GSE/V0rCd4HkY_I/AAAAAAAABm4/SS0nQA1mbSQJZCINRSzug_Tae6TbCxMZwCLcB/s1600/gedung-sate_.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1 class="title text-center">Car Free Day <br>Bandung</h1>
				</div>
			</div>
		</div>
	</div>

    <div class="main main-raised">
        <div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="fixed-section" data-spy="affix" data-offset-top="340"><center><span class="label label-primary">   Event per Jadwal</span></center><br>
                    <ul>
                    <?php 
  					foreach ($jdw->result() as $j): ?>
                    
                        <li><a href="<?php echo base_url(); ?>Utama/listAcara/<?php echo $j->idJadwal;?>"><?php echo date('d-m-Y', strtotime($j->tgl));?></a></li>
                        
                    
                    <?php endforeach?>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1">
               
	        	<div id="detail-acara">
	        	<h2>Car Free Day Bandung</h2>
                <legend></legend>
                <h3><?php echo $no->namaCFD ?></h3>
                
                <?php  $this->load->view('map/mapDetail');?>
                 
					<div class="section" id="carousel">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">

								<!-- Carousel Card -->
								<div class="card card-raised card-carousel">
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
										<div class="carousel slide" data-ride="carousel">

											<!-- Indicators -->
											<ol class="carousel-indicators">
												<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
												<li data-target="#carousel-example-generic" data-slide-to="1"></li>
												<li data-target="#carousel-example-generic" data-slide-to="2"></li>
											</ol>


											<!-- Wrapper for slides -->
											<div class="carousel-inner">
											
											<?php
											$so=1; 
						  					foreach ($pmf->result() as $f): ?>
						                    	<?php if ($so == 1) {
						                    	?>
													<div class="item active">
												<?php } else { ?>
													<div class="item">
												<?php  } $so++ ?>
													<img src="<?php echo base_url(); ?>assets/img/pamflet/<?php echo $f->pamflet;?>" alt="Awesome Image">
												</div>											

											<?php endforeach?>
										
											</div>

											<!-- Controls -->
											<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
												<i class="material-icons">keyboard_arrow_left</i>
											</a>
											<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
												<i class="material-icons">keyboard_arrow_right</i>
											</a>
										</div>
									</div>
								</div>
								<!-- End Carousel Card -->
							</div>
						</div>
 					</div>
 					
 					<CENTER>
 						<a target="_blank" href="https://www.google.co.id/maps/dir//'<?php echo $no->lat ?>,<?php echo $no->lng ?>'/@-6.8881509,107.6128083,17z/data=!3m1!4b1!4m6!4m5!1m0!1m3!2m2!1d107.615!2d-6.88767">
 						<button class="btn btn-primary btn-round">
							Ayo PERGI
						</button>
						</a>
					</CENTER>
 					<br>
					<p><?php echo $no->deskrip ?></p>
 				</div>

				<!-- end row -->

                <!-- end container -->
            </div>

        </div>
        </div>
    </div>
    </div>
    <footer class="footer footer-transparent">
        <div class="container">
            
            
            <div class="copyright pull-right">
                &copy; 2017, Developer Web CFD Bandung.
            </div>
        </div>
    </footer>

</div>
<!--  End Modal -->


</body>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?php echo base_url(); ?>assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="<?php echo base_url(); ?>assets/js/material-kit.js" type="text/javascript"></script>

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
