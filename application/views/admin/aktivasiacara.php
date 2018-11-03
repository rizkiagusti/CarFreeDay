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
						<a class="navbar-brand" href="#">Aktivasi Daftar Acara </a>
						<!-- <div class="navbar-brand" >Material Dashboard / <a href=""> Hello</a> </div> -->
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">

							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" style="background-color:darkblue">
	                                <h4 class="title">Data Car Free Day</h4>
	                                <p class="category">Tabel Car Free Day Kota Bandung</p>
	                            </div>
	                        	<div class="col-md-12">
	                      			<?php if($this->session->flashdata('info')):?>
				                        <br><div class="alert alert-success"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('info'); ?>  
				                        </div>
				                    <?php endif;?>
				                   	<?php if($this->session->flashdata('salah')):?>
				                        <br><div class="alert alert-danger"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('salah'); ?>  
				                        </div>
				                    <?php endif;?>
				                    <br>
	                        	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								        <thead>
								            <tr>
								                <th>ID </th>
								                <th>Nama Acara</th>
								                <th>Tempat</th>
								                <th>Tanggal</th>
								                <th>Status </th>
								                <th>Opsi</th>
								            </tr>
								        </thead>

								        <tbody>
								            <?php foreach ($data as $acara) {
								          	?>
								 			  
									            <tr>
									                <td><?= $acara->idAcara?></td>
									                <td><?= $acara->namaAcara?></td>
									                <td><?= $acara->namaCFD?></td>
									                <td><?= $acara->tgl?></td>
									                <td>
									                	<?php if ($acara->status=='Aktif') {
									                		 echo "<span class='new badge' style='background-color:#3ba1f9'> Aktif</span>";
									                	}elseif ($acara->status=='Belum Aktif') {
									                		echo "<span class='new badge' style='background-color:#f22e2e'> Belum Aktif</span>";
									                	}else{
	            							         		echo "<span class='new badge' style='background-color:#f22e2e'> Ditolak</span>";
									                	    
									                	}
									                	?>
									                </td>
									                <td> 
									                	 <a href="<?php echo base_url('admin/aktivasiacara/tampil/'.$acara->idAcara); ?>" style="color:#4286f4" rel="tooltip" title="Tampil"><i class="material-icons">pageview</i></a> &nbsp;
									                	 <a href="" data-toggle='modal' data-target='#konfirmasi_hapus' data-href='<?php echo base_url('admin/aktivasiacara/hapus/'.$acara->idAcara); ?>' style="color:red" rel="tooltip" title="Hapus"><i class="material-icons">delete</i></a> &nbsp;
								                </td>
									               </td>
									            </tr>
								        </tbody>
								    <?php }  ?>
								    </table>
								    
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

<!-- Keputusan -->
        	<div class="container">
                <div class="modal fade" id="konfirmasi_hapus" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header" style="padding:35px 50px;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <font color=#E0E0E0><h4>Anda yakin ingin menghapus?</h4></font>
                            </div>
                            <div class="modal-body" style="padding:40px 50px;" width>
                                <div class="login-block">
                                    <center>
                                        <a class="btn btn-danger btn-ok"> Hapus</a>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                                    </center>
                                </div>
                            </div>
                           </div>      
                    </div>
                </div> 
            </div>