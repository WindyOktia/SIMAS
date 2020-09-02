<a href="<?=base_url('admin/tambahMutu')?>" class="btn btn-sm btn-success mb-3">Tambah Mutu</a>
<div class="card card-body">
    <h4>Laporan Mutu Sekolah</h4>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tahun Akademik</th>
            <th scope="col">Semester</th>
            <th scope="col">Total Item</th>
            <th scope="col">Total Bobot</th>
            <th scope="col">Total Nilai</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Joko</td>
                <td>3</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td><span class="badge badge-success">Lengkap</span></td>
                <td><a href="<?= base_url('admin/detailMutu')?>" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Joko</td>
                <td>3</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td><span class="badge badge-danger">Belum Lengkap</span></td>
                <td><a href="<?= base_url('admin/detailMutu')?>" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
        </tbody>
    </table>
</div>