
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
		                        <div class="col-md-8">
		                        <div class="card">
		                            <div class="card-header" style="background-color:darkblue">
		                                <h4 class="title">Data Petugas</h4>
										<p class="category">Data Lengkap petugas </p>
		                            </div>
		                            <div class="card-content">
		                                <form>
		                                	  
		                                     <div class="form-group">
										              <label class="col-sm-4 text-right" style="margin-top:1.5%;"> No KTP :</label>
										              <div class="col-sm-8">
										              	 <input type="text" class="form-control" name="idAdmin" value="<?php echo $petugas->noKTP;?>"  disabled>
										              </div> <br><br>
										      </div>  
		                                      <div class="form-group">
										              <label class="col-sm-4 text-right" style="margin-top:1.5%;"> Nama :</label>
										              <div class="col-sm-8">
										               	<input type="text" class="form-control" name="idAdmin" value="<?php echo $petugas->nama;?>"  disabled>
										              </div> <br><br>
										      </div>  
										      <div class="form-group">
										              <label class="col-sm-4 text-right" style="margin-top:1.5%;"> Kontak :</label>
										              <div class="col-sm-8">
										               	<input type="text" class="form-control" name="idAdmin" value="<?php echo $petugas->kontak;?>"  disabled>
										              </div> <br><br>
										      </div>
										      <div class="form-group">
										              <label class="col-sm-4 text-right" style="margin-top:1.5%;"> Email :</label>
										              <div class="col-sm-8">
										               	<input type="text" class="form-control" name="idAdmin" value="<?php echo $petugas->email;?>"  disabled>
										              </div> <br><br>
										      </div> 
		                                </form>
		                            </div>
		                        </div>
		                    </div>
							<div class="col-md-4">
	    						<div class="card card-profile">
	    							<!--  <div class="card-avatar">
	    								<a href="#pablo">
	    									<img class="img" src="<?php echo base_url('assets/img/petugas/'.$petugas->foto.'');?>" />
	    								</a>
	    							</div>-->

	    							<div class="content">
	    								<h6 class="category text-gray"></h6>
	    								<h4 class="card-title"></h4>
	    								<p class="card-content">
	    									<?php echo "Tempat:<br>".$petugas->deskrip;?>
	    								</p>
	    								
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
