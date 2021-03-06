<div class="body" style="min-height: 555px;text-align: center;">
	<div class="container-fluid" style="padding-top: 80px;">
		<h3>Daftar Mata Pelajaran</h3>
		<a href="#" id="tambahMapel" class="btn btn-default" style="margin-left: 850px; width: 150px; color: blue"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>Tambah Mata Pelajaran </a>
		<table class="table table-bordered" style="width: 1000px; margin-top: 15px" align="center">
			<thead>	
				<tr>	
					<th class="text-center">No</th>
					<th style="width: 300px" class="text-center">Nama Mata Pelajaran</th>
					<th style="width: 120px" class="text-center">KKM</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($data as $mapel): ?>	
				<tr style="text-align: left;">
					<td class="text-center" style="padding-top: 15px"><?php echo $no; $no++; ?></td>
					<td class="text-left" style="padding-top: 15px"><?php echo $mapel->nama_mata_pelajaran; ?></td>
					<td class="text-center" style="padding-top: 15px"><?php echo $mapel->kkm; ?></td>
					<td class="text-center">
						<a href="<?php echo base_url('index.php/Controller_mapel/ambilDataMapel/'.$mapel->id_mata_pelajaran); ?>">
							<button class="btn btn-default" style="width: 130px">Ubah</button>
						</a>
					</td>
				</tr>
				<?php endforeach ?>				
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
        <div class="modal fade" id="modalTambahMapel" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" id="formBody">
                    <div class="modal-header" id="formHeader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 align="center"><span class="glyphicon glyphicon-user"></span> Register</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 30px;">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label for="name"><span class="glyphicon glyphicon-user"></span> Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" id="name" placeholder="Masukkan Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Masukkan Username" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Masukkan Email" required>
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
                                <input name="pass" type="password" class="form-control" id="psw" placeholder="Masukkan Password" required>
                            </div>
                            <a href="<?php echo base_url('index.php/home/login/'.$iklan->iklan_id); ?>" id="login"><button type="submit" class="btn btn-success btn-block" id="formSubmit" style="margin-bottom: 25px">Register</button></a>
                        </form>
                    </div>
                </div>

            </div>
        </div> 

        <script>
            $(document).ready(function () {
                $("#tambahMapel").click(function () {
                    $("#modalTambahMapel").modal();
                });
            });
        </script>