

<form action="" method="post">
    <div class="row">
        <div class="col mx-auto my-auto">
            <input type="text" class="form-control " placeholder="Kelas">
        </div>
        <div class="col mx-auto my-auto">
            <input type="text" class="form-control" placeholder="Jurusan">
        </div>
        <div class="col mx-auto my-auto">
            <input type="text" class="form-control" placeholder="Sub">
        </div>
        <div class="col mx-auto my-auto">
            <button type="submit" class="btn btn-primary btn-sm">Tambah Kelas</button>
        </div>
    </div>
</form>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Kelas</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
				<th>Jumlah Siswa</th>
				<th>Detail</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td><b>XI IPS 1</b></td>
				<td>24</td>
				<td>
                    <a href="<?= base_url('admin/detail')?>"class="btn btn-primary btn-sm">Daftar Peserta</a>
                </td>
				<td>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
			
			<tr>
				<td>2</td>
				<td><b>XI IPA 2</b></td>
				<td>25</td>
				<td>
                    <a href="<?= base_url('admin/detail')?>"class="btn btn-primary btn-sm">Daftar Peserta</a>
                </td>
				<td>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
		</tbody>
	</table>
    </div>
</div>