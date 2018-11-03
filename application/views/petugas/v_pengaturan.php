<div class="wrapper">

		<div class="main main-raised" style="margin-top:5%">
				<div class="section section-basic">
			    	<div class="container">
				            <div class="title">
				                <center><h2>Pengaturan</h2> </center>
				            </div>
				            <?php if($this->session->flashdata('notifsukses')):?>
				                        <center><br><div class="alert alert-success"><a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('notifsukses'); ?>  
				                        </div></center>
				            <?php endif;?>
				            <?php if($this->session->flashdata('notifgagal')):?>
				                        <center><br><div class="alert alert-danger"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('notifgagal'); ?>  
				                        </div></center>
				            <?php endif;?>
				            <form action="<?php echo base_url();?>petugas/pengaturan" method="POST" enctype="multipart/form-data">
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
								<br>
								
								<div class="col-sm-8">
								<div class="card card-nav-tabs" style="margin-top:4%;">
									<div class="header header-success">
																	
									<h5 style="margin-left:2%"></h5>
								
										<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
										<div class="nav-tabs-navigation" style="margin-left:2%">
											<div class="nav-tabs-wrapper">
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="active">
														<a href="#profile" data-toggle="tab">
															<i class="material-icons">face</i>
															Profile
														</a>
													</li>
													<li>
														<a href="#sandi" data-toggle="tab">
															<i class="material-icons">lock</i>
															Kata Sandi
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="content">
										<div class="tab-content text-center">
											<div class="tab-pane active" id="profile">
										          <div class="form-group">
										              <label class="col-sm-2 text-right" style="margin-top:5px;" for="nama"> No.KTP  : </label>
										              <div class="col-sm-10">
										                <input type="text" class="form-control" name="noKtp" value="<?php echo $petugas->noKTP ?>" readonly/>
										              </div> <center> <p id="user"> </p> </center><br><br>
										          </div>
										          <div class="form-group">
										              <label class="col-sm-2 text-right" style="margin-top:5px;" for="nama"> Nama  : </label>
										              <div class="col-sm-10">
										                <input type="text" class="form-control" name="petugas_nama" value="<?php echo $petugas->nama ?>" required/>
										              </div> <center> <p id="user"> </p> </center><br><br>
										          </div>
										                    <div class="form-group">
										              <label class="col-sm-2 text-right" style="margin-top:5px;" for="nama"> kontak HP  : </label>
										              <div class="col-sm-10">
										                <input type="text" class="form-control" name="petugas_kontak" value="<?php echo $petugas->kontak ?>" required/>
										              </div> <center> <p id="user"> </p> </center><br><br>
										          </div>
										          
										          <div class="form-group">
										              <label class="col-sm-2 text-right" style="margin-top:5px;" for="nama"> Email  : </label>
										              <div class="col-sm-10">
										                <input type="text" class="form-control" name="petugas_email" value="<?php echo $petugas->email ?>" required/>
										              </div> <center> <p id="user"> </p> </center><br><br>
										          </div>

										          
											</div>

									
											<div class="tab-pane" id="sandi">
													<font color="red"> <?php echo validation_errors();?> </font>
												   		  <div class="form-group">
												              <label class="col-sm-3 text-right" style="margin-top:5px;" for="nama"> Kata Sandi Lama  : </label>
												              <div class="col-sm-9">
												                <input type="password" class="form-control" name="sandi_lama" value="<?php echo set_value('sandilama')?>"/>
												              </div> <center> <p id="user"> </p> </center><br><br>
												          </div>
												          <div class="form-group">
												              <label class="col-sm-3 text-right" style="margin-top:5px;" for="nama"> Kata Sandi Baru  : </label>
												              <div class="col-sm-9">
												                <input type="password" class="form-control" name="sandi_baru" value="<?php echo set_value('sandibaru')?>"/>
												              </div> <center> <p id="user"> </p> </center><br><br>
												          </div>
												          <div class="form-group">
												              <label class="col-sm-3 text-right" style="margin-top:5px;" for="nama"> Varifikasi Kata Sandi Baru  : </label>
												              <div class="col-sm-9">
												                <input type="password" class="form-control" name="sandi_konf" value="<?php echo set_value('sandikonf')?>"/>
												              </div> <center> <p id="user"> </p> </center><br><br>
												          </div>

												          
												   
											</div>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 text-right" style="margin-top:5px;" for="nama"> &nbsp; </label>
									<input type="submit" class="btn btn-primary pull-left" value="Simpan" name="simpan">
								</div>
								<!-- End Tabs with icons on Card -->	
								</div>
							</form>
				    </div>
				 </div>
			</div>