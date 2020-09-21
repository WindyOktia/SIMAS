<a href="<?= base_url('admin/siswa')?>" class="btn btn-primary btn-sm">Tambah Data Siswa</a>

<div class="card mt-3">
    <div class="card-body"> 
        <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Siswa</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Siswa</th>
				<th>NIPD</th>
				<th>Kelas</th>
				<th>Nama Ibu</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php $i=1;foreach($daftar as $dft):?>
			<tr>
				<td><?= $i++?></td>
				<td><b><?= $dft['nama_siswa']?></b></td>
				<td><?= $dft['nipd']?></td>
				<td>
					<?php if($dft['id_kelas']==''){echo '<div class="badge bg-danger">Tidak ada kelas</div>';}?>
					<?= $dft['kelas']?> <?= $dft['jurusan']?> <?= $dft['sub']?>
				</td>
				<td><?= $dft['nama_ibu']?></td>
				<td>
					<a href="<?= base_url('admin/detailSiswa')?>"class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalSiswa<?= $dft['id_siswa']?>">Detail/Ubah</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>

<!-- modal -->
<?php foreach($daftar as $mdl):?>
<div class="modal fade" id="modalSiswa<?= $mdl['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Detail Siswa</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <p class="text-warning">Klik <i>close</i> apabila tidak ada perubahan</p>
        <form action="" method="post">
			<div class="form-group">
				<label for="">NIPD</label>
				<input type="number" class="form-control" value="<?= $mdl['nipd']?>">
			</div>
			<div class="form-group">
				<label for="">Nama Siswa</label>
				<input type="text" class="form-control" value="<?= $mdl['nama_siswa']?>">
			</div>
			<div class="form-group">
				<label for="">Kelas</label>
				<div class="row">
					<div class="col-md-4">
						<input type="text" class="form-control" value="<?= $mdl['kelas']?> <?= $mdl['jurusan']?> <?= $mdl['sub']?>" readonly>
					</div>
					<div class="col-md">
						<select name="" id="" class="form-control">
							<option value="">Ubah Kelas</option>
							<?php foreach($kelas as $kls):?>
							<option value="<?= $kls['id_kelas']?>"><?= $kls['kelas']?> <?= $kls['jurusan']?> <?= $kls['sub']?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="">Nama Ibu</label>
				<input type="text" class="form-control" value="<?= $mdl['nama_ibu']?>">
			</div>
			<div class="form-group">
				<label for="">Alamat</label>
				<textarea type="text" class="form-control" rows="3"><?= $mdl['alamat']?></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<?php endforeach ;?>