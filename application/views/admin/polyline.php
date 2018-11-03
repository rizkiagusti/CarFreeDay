
<body>
								<?php  $this->load->view('admin/header');?>	
<!-- map-->
	<div id="map" style="height:80%"> </div>
	<textarea id="json_polyline" style="height:10%;width:100%"></textarea>



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
						<div class="navbar-brand"><a href="<?php echo base_url('admin/kelolacfd');?>">Kelola CFD </a> / Tambah </div>
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
	                                <h4 class="title">Tambah Data CFD</h4>
	                                <p class="category">Lengkapi data CFD berikut ini.</p>
	                            </div>

	                        	<div class="col-md-12">
	                        	<br>
	                        	<!-- map -->
	                            <?php if($this->session->flashdata('peringatan')):?>
				                        <br>
				                        <div class="alert alert-danger"> <a class="close" data-dismiss="alert" aria-label="close">×</a> <?php echo $this->session->flashdata('peringatan'); ?>  
				                        </div>
				                    	<?php endif;?>
			
								<!-- akhir map -->
	                        		<form action="" method="POST">
	                        			<br>


	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													<label class="control-label">ID CFD</label>
													<input type="text" class="form-control" name="idCarFree" value="<?php echo $kodeunik; ?>" readonly>
												</div>
	                                        </div>
	                                    </div>	                        		
	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													<label class="control-label">Nama CFD</label>
														<input type="text" class="form-control" name="namaCFD" value="<?php echo set_value('namaCFD')?>">
												</div>
	                                        </div>
	                                    </div>
	                                   	<div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													
														<input type="text" class="form-control" id="lat" name="lat" value="<?php echo set_value('json_polyline')?>" readonly>
												</div>
	                                        </div>
	                                    </div>
	                                   	<div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													
														<input type="text" class="form-control" id="lng" name="lng" value="<?php echo set_value('lng')?>" readonly>
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-8">
												<div class="form-group label-floating">
													<label class="control-label">Deskripsi</label>
													<textarea class="form-control" rows="3" name="deskrip"><?php echo set_value('deskrip')?></textarea>
												</div>
	                                        </div>
	                                    </div>

	                                    <input type="submit" class="btn btn-primary pull-left" name="simpan" value="SIMPAN" />
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
		<?php  $this->load->view('admin/footer');?>	
</body>
<!--googlemap-v3.js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU4ozT2gwSNOibrQsc6zSCE9157kpFzyk"></script>

<script>

	function initialize(){
		//setup 
		var mapOptions = {
			zoom : 13,
			center: new google.maps.LatLng(-6.911717, 107.608060),
			}

		var map = new google.maps.Map(document.getElementById('map'), mapOptions);

		//config polyline

		var polyOptions = {
			geodesic: true,
			strokeColor: 'rgb(20, 120, 218) ',
			strokeOpacity: 1.0,
			strokeWeight: 2,
			editable: true, //importand editable
		}

		//apply config 
		var poly = new google.maps.Polyline(polyOptions);
		poly.setMap(map);

		//event to create polyline by click
		google.maps.event.addListener(map, "click", function(event){

			//menggambar
			var path = poly.getPath();
			path.push(event.latLng);

			var coordinates_poly = poly.getPath().getArray();
			var newCoordinates_poly = [];
			for (var i = 0; i < coordinates_poly.length;i++) {
				lat_poly = coordinates_poly[i].lat();
				lng_poly = coordinates_poly[i].lng();

				latlng_poly = [lat_poly, lng_poly];
				newCoordinates_poly.push(latlng_poly);
			}

			var str_coordinates_poly = JSON.stringify(newCoordinates_poly);
			var json_poly = "{\"coordinates\":" + str_coordinates_poly + "}";

			document.getElementById('json_polyline').value = json_poly;
		});
	}
//load maps
google.maps.event.addDomListener(window, 'load', initialize);
</script>

