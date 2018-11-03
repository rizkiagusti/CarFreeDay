
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
						<div class="navbar-brand"><a href="<?php echo base_url('admin/kelolacfd');?>">Kelola CFD </a> / Ubah </div>
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
	                                <h4 class="title">Ubah Data CFD</h4>
	                                <p class="category">Lengkapi data CFD berikut ini.</p>
	                            </div>

	                        	<div class="col-md-12">
	                        	<br>
	                        	<!-- map -->
								<?php  $this->load->view('admin/mantap');?>				
								<!-- akhir map -->
	                        		<form action="" method="POST">
	                        		<br>
	                        		 <font color="red"> <?php echo validation_errors();?> </font>

	                        		 <?php if($this->session->flashdata('peringatan')):?>
				                        <br><div class="alert alert-danger"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('peringatan'); ?>  
				                        </div>
				                    <?php endif;?>
	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													<label class="control-label">ID CFD</label>
													<input type="text" class="form-control" name="idCarFree" value="<?=$carfreeday->idCarFree;?>" readonly>
												</div>
	                                        </div>
	                                    </div>	                        		
	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													<label class="control-label">Nama CFD</label>
														<input type="text" class="form-control" name="namaCFD" value="<?=$carfreeday->namaCFD;?>">
												</div>
	                                        </div>
	                                    </div>
	                                   	<div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													
														<input type="text" class="form-control" id="lat" name="lat" value="<?=$carfreeday->lat;?>" readonly>
												</div>
	                                        </div>
	                                    </div>
	                                   	<div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													
														<input type="text" class="form-control" id="lng" name="lng" value="<?=$carfreeday->lng;?>" readonly>
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													<label class="control-label">Deskripsi</label>
													<textarea class="form-control" rows="3" name="deskrip"><?=$carfreeday->deskrip;?></textarea>
												</div>
	                                        </div>
	                                    </div>

	                                    <input type="submit" class="btn btn-primary pull-left" name="simpan" value="SIMPAN"></input>
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
	
