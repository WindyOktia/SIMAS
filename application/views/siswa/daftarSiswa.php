<a href="" class="btn btn-primary btn-sm">Tambah Data Siswa</a>

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
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td><b>Joko</b></td>
				<td>1111</td>
				<td>XI IPS 1</td>
				<td>
					<a href="<?= base_url('admin/detailSiswa')?>"class="btn btn-info btn-sm">Detail</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
			
			<tr>
				<td>2</td>
				<td><b>Janu</b></td>
				<td>666</td>
				<td>XI IPA 2 </td>
				<td>
					<a href="<?= base_url('admin/detailSiswa')?>"class="btn btn-info btn-sm">Detail</a>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
		</tbody>
	</table>
    </div>
</div>