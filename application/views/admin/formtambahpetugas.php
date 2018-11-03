
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
						<div class="navbar-brand"><a href="<?php echo base_url('admin/kelolapetugas');?>">Kelola Petugas </a> / Tambah </div>
						<!-- <div class="navbar-brand" >Material Dashboard / <a href=""> Hello</a> </div> -->
					</div>
				</div>
			</nav>
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" style="background-color:darkblue">
	                                <h4 class="title">Tambah Data Petugas</h4>
	                                <p class="category">Dapatkan password melalui email, Pastikan email yang dimasukan Aktif</p>
	                            </div>

	                        	<div class="col-md-12">
	                        	   <?php if($this->session->flashdata('info')):?>
				                        <br><div class="alert alert-danger"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('info'); ?>  
				                        </div>
				                    <?php endif;?>
	                                  
	                        		<form method="POST" action="<?php echo base_url();?>petugas/sendMail">
	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-static">
													<label >ID CFD :</label>
													<select class="form-control" name="idCarFree">
														<option value="" selected="true" disabled="true">Pilih data</option>  
													<?php foreach ($data as $cfd) {
													?>
														<option value="<?php echo $cfd->idCarFree;?>"><?php echo $cfd->idCarFree;echo ' - '.$cfd->namaCFD;?></option>
													
													<?php } ?>
													</select>
												</div>
												<div class="form-group label-floating">
													<label class="control-label">No. KTP</label>
													<input type="text" class="form-control" name="noKtp" value="<?php echo set_value('noKtp')?>">
												</div>
												<div class="form-group label-floating">
													<label class="control-label">Nama</label>
													<input type="text" class="form-control" name="namaPetugas" value="<?php echo set_value('namaPetugas')?>">
												</div>
												<div class="form-group label-floating">
													<label class="control-label">Kontak</label>
													<input type="text" class="form-control" name="kontak" value="<?php echo set_value('kontak')?>">
												</div>
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="text" class="form-control" name="email" value="<?php echo set_value('email')?>">
												</div>
												
												<!-- <div class="form-group label-static"> 
													<label >Admin Penanggungjawab :</label>
													<select class="form-control" name="idAdmin" required>
														<option value="" selected="true" disabled="true">Pilih data</option>  
													<?php foreach ($dataadmin as $admin) {
													?>
														<option value="<?php echo $admin->idAdmin;?>"><?php echo $admin->namaAdmin;?></option>
													
													<?php } ?>
													</select>
												</div>-->
	                                        </div>
	                                    </div>


	                                    <button type="submit" name="submit" value="submit" class="btn btn-primary center"><i class="material-icons">person</i> Get Password</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                        
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
