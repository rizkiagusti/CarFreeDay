<div class="wrapper">

		<div class="main main-raised" style="margin-top:5%">
				<div class="section section-basic">
			    	<div class="container">
				            <div class="title">
				           		<center><h3>Ubah Acara </h3></center>
				            </div>
				            <?php if($this->session->flashdata('info')):?>
				                        <br><div class="alert alert-danger"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('info'); ?>  
				                        </div>
				            <?php endif;?>
	                                 
				            	<div class="col-md-12">
	                        	<br>
	                        	<!-- map -->
								<?php  $this->load->view('petugas/mantap');?>				
								<!-- akhir map -->
								</div>
					            	<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>petugas/acara/ubah/<?php echo $acara->idAcara ;?>">
					            <div class="col-sm-12" >
					            	<div class="col-sm-5">
					            		<div class="form-group">
											<b>Nama Acara</b>
											<input type="text" name="nama" class="form-control" value="<?php echo $acara->namaAcara ;?>">
										</div>
										<div class="form-group ">
											<b>Tanggal Acara</b>
											<select name="tgl" type="checkbox" class="form-control">
												<option value="<?php  echo date('Y-m-d', strtotime($acara->tgl));?>">
													<?php  echo date('d F Y', strtotime($acara->tgl));?>
												</option>
												<option value="<?php  echo date('Y-m-d', strtotime('sunday'));?>">
													<?php  echo date('d F Y', strtotime('sunday'));?>
												</option>
												<option value="<?php  echo date('Y-m-d', strtotime('+2 sunday'));?>">
													<?php  echo date('d F Y', strtotime('+2 sunday'));?>
												</option>
												<option value="<?php  echo date('Y-m-d', strtotime('+3 sunday'));?>">
													<?php  echo date('d F Y', strtotime('+3 sunday'));?>
												</option>
												<option value="<?php  echo date('Y-m-d', strtotime('+4 sunday'));?>">
													<?php  echo date('d F Y', strtotime('+4 sunday'));?>
												</option>
											</select>
										</div>
										<div class="form-group">
											<b>Lattitude</b>
											<input type="text" class="form-control"  id="lat" name="lat" value="<?php echo $acara->lat ;?>">
										</div>
										<div class="form-group">
											<b>Longitude</b>
											<input type="text" class="form-control"  id="lng" name="lng" value="<?php echo $acara->lng ;?>">
										</div>
										<div class="form-group">
											<b>Deskripsi</b>
											<textarea name="desk" class="form-control" rows="5"><?php echo $acara->deskripAcara ;?> </textarea>
										</div>
					            	</div>

					            	<div class="col-sm-1">
					            	</div>

					            	<div class="col-sm-6">
					            	<div class="form-group">
                                                <b>Pamflet</b>
                                                <div class="fileupload">
                                                    <input onchange="document.getElementById('image-preview').src=window.URL.createObjectURL(this.files[0])" accept="image/jpeg,image/png" type="file" title="Click untuk mengubah foto" name="foto" value="<?php echo $acara->pamflet ;?>"/>
                                                    <img src='<?php echo base_url(); ?>assets/img/pamflet/<?php echo $acara->pamflet ;?>' id='image-preview' alt='your pamflet' class='img-responsive'>
                                                </div>
										</div>
									</div>

								</div>
								<div class="col-sm-12">
									<div class="col-sm-5">
										<div class="form-group">
											<input type="submit" value="Simpan" class="btn btn-primary">
										</div>
									</div>
					            </div>
							</form>
				    </div>
				 </div>
			</div>
		
	    <footer class="footer">
		    <div class="container">
				<a href="#">
					&copy; Team Developer CFD 2017
				</a>
		    </div>
		</footer>
</div>