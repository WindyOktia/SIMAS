<a href="<?= base_url('admin/guru')?>" class="btn btn-primary btn-sm">Tambah Data Guru</a>

<div class="card mt-3">
    <div class="card-body"> 
        <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Guru</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Guru</th>
				<th>NIP</th>
				<th style="width:30%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td><b>Joko</b></td>
				<td>1111</td>
				<td>
					<a href="<?= base_url('admin/jadwalMengajar')?>"class="btn btn-success btn-sm mb-1">Jadwal Mengajar</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-info btn-sm mb-1">Edit</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm mb-1">Hapus</a>
				</td>
			</tr>
			
			<tr>
				<td>2</td>
				<td><b>Janu</b></td>
				<td>666</td>
				<td>
					<a href="<?= base_url('admin/jadwalMengajar')?>"class="btn btn-success btn-sm mb-1">Jadwal Mengajar</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-info btn-sm mb-1">Edit</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm mb-1">Hapus</a>
				</td>
			</tr>
		</tbody>
	</table>
    </div>
</div>