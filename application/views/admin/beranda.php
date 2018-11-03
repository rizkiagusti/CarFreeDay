
	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Beranda </a>
						<!-- <div class="navbar-brand" >Material Dashboard / <a href=""> Hello</a> </div> -->
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">

							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="material-icons">content_copy</i>
								</div>
								<div class="card-content">
									<p class="category">Data CFD</p>
									<h3 class="title"><?=$datacfd?><small></small></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> <a href="<?=base_url('admin/kelolacfd');?>">Lihat Data Lengkap...</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">store</i>
								</div>
								<div class="card-content">
									<p class="category">Data Acara Keseluruhan</p>
									<h3 class="title"><?=$dataevent?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> <a href="<?=base_url('admin/aktivasiacara');?>">Lihat Data Lengkap...</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" style="background-color:#b551f7">
									<i class="material-icons">person</i>
								</div>
								<div class="card-content">
									<p class="category">Data Petugas</p>
									<h3 class="title"><?=$datapetugas?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> <a href="<?=base_url('admin/kelolapetugas');?>">Lihat Data Lengkap...</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" style="background-color:#ebf750">
									<i class="material-icons">person</i>
								</div>
								<div class="card-content">
									<p class="category">Data Admin</p>
									<h3 class="title"><?=$dataadmin?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> <a href="<?=base_url('admin/kelolaadmin');?>">Lihat Data Lengkap...</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">check_box</i>
								</div>
								<div class="card-content">
									<p class="category">Data Acara Aktif</p>
									<h3 class="title"><?=$dataacaraaktif?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> <a href="<?=base_url('admin/beranda/dataacaraaktif');?>">Lihat Data Lengkap...</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="material-icons">info_outline</i>
								</div>
								<div class="card-content">
									<p class="category">Data Acara Belum Aktif</p>
									<h3 class="title"><?=$dataacarabelumaktif?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i> <a href="<?=base_url('admin/beranda/dataacarabelumaktif');?>">Lihat Data Lengkap...</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									&copy; Team Developer CFD 2017
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</footer>
		</div>
	</div>
