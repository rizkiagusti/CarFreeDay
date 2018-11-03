<div class="wrapper">
		<div class="main main-raised" style="margin-top:5%">
				<div class="section section-basic">
			    	<div class="container">
			    	    
				            	<?php echo $this->session->flashdata('notifsukses'); ?>
				            <div class="title">
				           		<!-- Don't Delete -->
				            </div>  

					            <div class="col-sm-4 col-md-4" >

								    <div class="col-sm-99" style="border:0px;">
								      <div class="panel panel-success">
								        <div class="panel-heading"><?php echo $petugas->nama ?></div>
								        <center>
								        <div class="panel-body">
								            <b><?php echo $petugas->namaCFD ?></b> </div>
								      	</center>
								      </div>
								    </div>

								    <div class="col-sm-99" style="border:0px;">
								      <div class="panel panel-success">
								       <div class="panel-heading" >Profil User</div>
								       <div class="panel-body">
								         <table class="col-sm-12">
								          <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"><font size="2"> KTP  </font></th>
								            <tr class="col-sm-12">
								              <td style="float:right;"><?php echo $petugas->noKTP ?></td>
								            </tr>
								          <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"><font size="2"> Nama </font> </th>
								            <tr class="col-sm-12">
								              <td style="float:right;"><?php echo $petugas->nama ?></td>
								            </tr>
								          <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"><font size="2"> Kontak HP  </font> </th>
								            <tr class="col-sm-12">
								              <td style="float:right;"><?php echo $petugas->kontak ?></td>
								            </tr>
								           <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"> <font size="2">Email</font></th>
								            <tr class="col-sm-12">
								              <td style="float:right;"><?php echo $petugas->email ?></td>
								            </tr>


								         </table>
								       </div>
								      </div>
								    </div>

								</div>
								
			                    <div class="col-lg-2 col-md-8">
				                    <div class="panel panel-primary">
				                        <div class="panel-heading">
				                            <div class="row">
				                                <div class="col-xs-3">
				                                    <i class="fa fa-list-alt fa-5x"></i>
				                                </div>
				                                <div class="col-xs-9 text-right">
				                                    <h3><?php echo $selectAcara ?></h3>
				                                </div>
				                            </div>
				                        </div>
				                        
				                            <div class="panel-footer">
				                                <font><b>Acara -> <?php  echo date('d/m/y', strtotime('sunday'));?></b></font>
				                                <div class="clearfix"></div>
				                            </div>
				                    </div>
			                    </div>
			                    <div class="col-lg-2 col-md-8">
				                    <div class="panel panel-primary">
				                        <div class="panel-heading">
				                            <div class="row">
				                                <div class="col-xs-3">
				                                    <i class="fa fa-list-alt fa-5x"></i>
				                                </div>
				                                <div class="col-xs-9 text-right">
				                                    <h3><?php echo $allAcara->num_rows() ?></h3>
				                                    
				                                </div>
				                            </div>
				                        </div>
				                            <div class="panel-footer">
				                                <font><b>Jumlah Acara</b></font>
				                                <div class="clearfix"></div>
				                            </div>
				                    </div>
			                    </div>
			                    <div class="col-lg-2 col-md-8">
				                    <div class="panel panel-primary">
				                        <div class="panel-heading">
				                            <div class="row">
				                                <div class="col-xs-3">
				                                    <i class="fa fa-list-alt fa-5x"></i>
				                                </div>
				                                <div class="col-xs-9 text-right">
				                                    <h3><?php echo $acaraKonf->num_rows();?></h3>
				                                    
				                                </div>
				                            </div>
				                        </div>
				                            <div class="panel-footer">
				                                <font><b>Acara Aktif</b></font>
				                                <div class="clearfix"></div>
				                            </div>
				                    </div>
			                    </div>
			                    <div class="col-lg-2 col-md-8">
				                    <div class="panel panel-primary">
				                        <div class="panel-heading">
				                            <div class="row">
				                                <div class="col-xs-3">
				                                    <i class="fa fa-list-alt fa-5x"></i>
				                                </div>
				                                <div class="col-xs-9 text-right">
				                                    <h3><?php echo $acaraGagal ?></h3>
				                                </div>
				                            </div>
				                        </div>
				                        
				                            <div class="panel-footer">
				                                <font><b>Acara Belum Aktif</b></font>
				                                <div class="clearfix"></div>
				                            </div>
				                    </div>
			                    </div>
			                    <br>
							<div class="col-sm-8">
								<div class="card card-nav-tabs" style="margin-top:4%;">
									<div class="header header-success">
																	
									<h5 style="margin-left:2%"><?php echo $petugas->namaCFD ?></h5>
								
										<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
										<div class="nav-tabs-navigation" style="margin-left:2%">
											<div class="nav-tabs-wrapper">
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="active">
														<a href="#list" data-toggle="tab">
															<i class="material-icons">content_paste</i>
															Daftar Acara
														</a>
													</li>
													
												</ul>
											</div>
										</div>
									</div>
									<div class="content">
										<div class="tab-content">
											
											</div>
											<div class="tab-pane active" id="list">
												<div class="tab-pane active" id="profile">
													<table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
				   										<thead>
												            <tr class="danger">
												                <th>No</th>
												                <th>Nama Acara</th>
												                <th>Tempat</th>
												                <th>Tanggal</th>
												                <th>Status</th>
												                <th>Pamflet</th>
												                <th>Opsi</th>
												            </tr>
												        </thead>
												        <tbody>
												            <?php $no=1; foreach ($allAcara->result() as $p): ?>
												            <tr>
												                <td><?php echo $no++?></td>
												                <td><?php echo $p->namaAcara ?></td>
												                <td><?php echo $p->namaCFD ?></td>
												                <td><?php echo date('d F Y', strtotime($p->tgl)) ?></td>
												                <td><?php echo $p->status ?></td>
												                <td><img src="<?php echo base_url(); ?>assets/img/pamflet/<?php echo $p->pamflet ?>" class="img-responsive" alt="Image"></td>
												                <td align="center"><a href="<?php echo base_url();?>petugas/acara/ubah/<?php echo $p->idAcara ?>" rel="tooltip" title="Ubah" style="color:purple" data-placement="bottom"><i class="material-icons">mode_edit</i></a></td>
												            </tr>
												            <?php endforeach?>
												        </tbody>
												    </table>
									
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Tabs with icons on Card -->	
								</div>
							
							

					   
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