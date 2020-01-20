<div class="row">
    <div class="col-md-2">
        <a href="" class="btn btn-primary"data-toggle="modal" data-target="#modalAdd">Tambah Peserta</a>
    </div>
    <div class="col-md-2">
        <a href="" class="btn btn-danger">Hapus Semua</a>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Kelas</h5>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>NIPD</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($peserta as $peserta):?>
				<tr>
					<td><?=$i++?></td>
					<td><?= $peserta['nipd']?></td>
					<td><b><?= $peserta['nama_siswa']?></b></td>
					<td><?= $peserta['alamat']?></td>
					<td>
						<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
			<div class="form-group">
				<label for="">Masukkan NIPD</label>
				<input type="text" class="form-control" id="search" autocomplete="off">
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>