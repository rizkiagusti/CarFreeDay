br>
		<div class="section section-full-screen section-signup" style="background-image: url('http://infobudayaindonesia.com/wp-content/uploads/2017/01/Menilik-Keunikan-Gedung-Sate-Sebagai-Tempat-Bersejarah-Di-Bandung.jpg'); background-size: cover; background-position: top center; min-height: 700px;">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="card card-signup">
								<div class="header header-primary text-center">
									<h4>DAFTAR PETUGAS</h4>
									
								</div>
								<div class="content">
									<table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
   										<thead>
								            <tr class="danger">
								                <th>No</th>
								                <th>CFD</th>
								                <th>Petugas</th>
								                <th>Kontak</th>
								                <th>Email</th>
								            </tr>
								        </thead>
								        <tbody>
								            <?php $no=1; foreach ($petugas as $p): ?>
								            
								            <tr>
								                <td><?php echo $no++?></td>
								                <td><?php echo $p->namaCFD ?></td>
								                <td><?php echo $p->nama ?></td>
								                <td><?php echo $p->kontak ?></td>
								                <td><?php echo $p->email ?></td>
								                
								            </tr>
								            <?php endforeach?>
								        </tbody>
								    </table>
								</div>
						</div>

					</div>
				</div>
			</div>
		</div>