<div class="row">
    <div class="col-md-2">
        <a href="" class="btn btn-primary">Tambah Peserta</a>
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