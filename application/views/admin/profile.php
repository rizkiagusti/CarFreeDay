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
						<div class="navbar-brand"><a href="<?php echo base_url('admin/kelolaadmin');?>">Kelola Admin </a> / Profil </div>
						<!-- <div class="navbar-brand" >Material Dashboard / <a href=""> Hello</a> </div> -->
					</div>
				</div>
			</nav>

			<div class="content">
					<div class="row">
						<div class="col-md-12">
		                        <div class="col-md-12">
		                        <div class="card">
		                            <div class="card-header" style="background-color:darkblue">
		                                <h4 class="title">Selamat Datang</h4>
										<p class="category">Data Lengkap akun admin anda. </p>
		                            </div>
		                            <div class="card-content">
		                                Nama :<?=$person->nama;?> <br>
		                                email : <?=$person->email;?><br>
		                                <a href="<?=base_url('admin/profil/ubah/'.$person->noKTP);?>" class="btn btn-primary btn-md"><i class="material-icons">edit</i> Ubah Profile </a>
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
