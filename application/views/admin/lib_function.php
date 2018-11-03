<title>Sistem Informasi Geografis Potensi Usaha Kota Bandung </title>
<link href="../admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="../admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../admin/css/css.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Location Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link rel="shortcut icon" href="images/favicon.png" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<!-- Mega Menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- Mega Menu -->
<?php
	function header_web(){
	?>
<!-- banner -->
	<div class="header">
		<div class="coscos">
			<div class="logo">
				<a href="index.php"><img width="120px" height="160px" src="images/KB.png" class="img-responsive" alt=""></a>
				
			</div>
			<div class="clearfix"></div>
		</div>
		<br>
		<div class="judulsaya"><h2>Potensi Usaha Di Kota Bandung</h2></div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<span class="menu"> </span>
					<ul class="navig megamenu skyblue">
						<li><a href="tambah_usaha.php" class="scroll"> Tambah Usaha</a>
						</li>
						<li><a href="usaha.php" class="scroll">Kelola Usaha</a></li>
						<div class="clearfix"></div>
					</ul>
					<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(300, function(){
						});
					});
				</script>
			</div>
			<div class="head-right">
				<ul class="number">
					<li><a href="logout.php"><i class="phone"> </i>Log Out</a></li>
						<div class="clearfix"> </div>						
				</ul>
			</div>
			<div class="clearfix"> </div>	
	
		</div>
	</div>
		<?php }
	function form_login(){
	?>
	<div class="login-page">
		<div class="container">
			<div class="account_grid">
				<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
					<h3>Member Baru</h3>
					<p>bla bla bla</p>
					<a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
					<h3>Daftar Member</h3>
					<p>If you have an account with us, please log in.</p>
					<form method="post" action="login.php">
						<div>
							<span>User Name<label>*</label></span>
							<input type="text" name="username" maxlength="8" size="9" />
						</div>
						<div>
							<span>Password<label>*</label></span>
							<input type="password" name="userpass" maxlength="8" size="9" />
						</div>
						<a class="forgot" href="#">Forgot Your Password?</a>
						<input type="submit" name="btn submit" value="Login" />
					</form>
			   </div>	
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
	}
	function footer_web(){
	?>	
		<div class="footer">
		<div class="container">
			<div class="col-md-2 abo-foo1">
				<h5>About Us</h5>
					<ul>
						<li><b><a href="https://www.facebook.com/qhiqhi.rizki">Rizki Agusti Ghofur</a></b></li>
						<li><b><a href="https://www.facebook.com/mohammad.alawy">Mohammad Syukron Alawy</a></b></li>
						<li><b><a href="https://www.facebook.com/deska.sagyta">Deska Sagyta</a></b></li>
						<li><b><a href="https://www.facebook.com/giezcr">Agi Krisna</a></b></li>
						<li><b><a href=" https://www.facebook.com/adebagussandry">ade bagus sandry</a></b></li>
						<li><b><a href=" https://www.facebook.com/Desrezakolok">Desreza Arief</a></b></li>
					</ul>
			</div>
			<div class="col-md-2 abo-foo1">
				<h5>Location</h5>
				<p> Jl. Dipatiukur 105</p>
				<p>	Unikom,</p>
				<p>	Bandung</p>
			</div>
			<div class="col-md-2 abo-foo1">
		</div>
			<div class="footer-bottom">
				<div align="center" class="img-rounded">
				<p>Copyrights © 2017 Team Imajinasi ATOL</p>
				<img src="images/favicon.png" height="150"  /></div>
			</div>
		</div>
	</div>

		<?php
	}
	function hak_akses(){
		$telahlogin=$_SESSION['sudahlogin']; //Nanti diisi perintah pemeriksaan status login 
		if($telahlogin==false)
			;
		else
		    ;
	}
	function koneksi_db(){
		$host="localhost";
		$database="bandung_kota";
		$user="root";
		$password="";
		$link=mysql_connect($host,$user,$password);
		mysql_select_db($database,$link);
		if(!$link)
			echo "Error : ".mysql_error();
		return $link;
	}
	
?>