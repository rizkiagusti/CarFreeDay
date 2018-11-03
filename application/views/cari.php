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

	    <div class="collapse navbar-collapse" id="example-navbar-info">
			<ul class="nav navbar-nav navbar-right">
				<li>
		            <a href="#utama">
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
		        	        
			</ul>
		</div>
	</div>
</nav>
</div>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header">
		<?php include("map_utama.php") ;?>
	</div>
	
	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">

	            <div id="event">
	            <form class="form" method="POST" action="<?php echo base_url();?>Utama/cari">
	                    <div class="form-group label-floating">
							<label class="control-label">Pencarian</label>
							<input type="text" name="cari" pcholder="cari" class="form-control">
							<center><input type="submit" value="Cari" class="btn btn-primary"></center>
						</div>
	                    
		        </from>
	            <div class="title">
	                <h2>Pencarian Kegiatan</h2>
	                <h3>Car Free Day Bandung</h3>
	            </div>    
					<div class="row">
						<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
							<ul class="event-list">
							<?php 
  							foreach ($evn->result() as $e): ?>
						
								<li>		
									<img alt="Independence Day" src="<?php echo base_url(); ?>assets/img/pamflet/<?php echo $e->pamflet;?>" />
									<div class="info">
										
										<h2 class="title"><font color="black"> <a href="<?php echo base_url(); ?>Utama/listAcara/<?php echo $e->idJadwal;?>"><?php echo $e->namaAcara;?></a></font></h2>
										<p class="desc"><font color="black">Lokasi CFD : <?php echo $e->namaCFD;?></font></p>
									</div>
								</li>
							

								
							<?php 
							endforeach
							?>	
							
							</ul>
						</div>
					</div>
 				</div>

 				

	        </div>
	    </div>
	</div>
    
    <footer class="footer">
	    <div class="container">
	        
	        <div class="copyright pull-right">
	            &copy; 2017, Developer Web CFD Bandung.
	        </div>
	    </div>
	</footer>
</div>

<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-simple">Nice Button</button>
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
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
