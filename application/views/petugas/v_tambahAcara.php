<div class="wrapper">

		<div class="main main-raised" style="margin-top:5%">
				<div class="section section-basic">
			    	<div class="container">
				            <div class="title">
				           		<center><h3>Tambah Acara </h3></center>
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
					            	<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>petugas/acara/tambah">
					            <div class="col-sm-12" >
					            	<div class="col-sm-5">
					            		<div class="form-group label-statis">
											<label class="control-label">Nama Acara</label>
											<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama')?>">
										</div>
										<div class="form-group label-statis">
											<label class="control-label">Tanggal Acara</label>
											<select name="tgl" type="checkbox" class="form-control">
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
										<div class="form-group label-statis">
											<label class="control-label">Lattitude</label>
											<input type="text" class="form-control"  id="lat" name="lat" value="<?php echo set_value('lat')?>">
										</div>
										<div class="form-group label-statis">
											<label class="control-label">Longitude</label>
											<input type="text" class="form-control"  id="lng" name="lng" value="<?php echo set_value('lng')?>">
										</div>
										<div class="form-group label-statis">
											<label class="control-label">Deskripsi</label>
											<textarea name="desk" class="form-control" rows="5"><?php echo set_value('desk')?></textarea>
										</div>						
					            	</div>

					            	<div class="col-sm-1">
					            	</div>

					            	<div class="col-sm-6">
					            	<div class="form-group label-floating">
                                                <label class="control-label">Pamflet</label>
                                                <div class="fileupload">
                                                    <input onchange="document.getElementById('image-preview').src=window.URL.createObjectURL(this.files[0])" accept="image/jpeg,image/png,image/JPG" type="file" title="Click untuk Foto" name="foto" value="<?php echo set_value('foto')?>"/>
                                                    <img src='<?php echo base_url(); ?>assets/img/camera.png' id='image-preview' alt='your pamflet' class='img-responsive'>
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