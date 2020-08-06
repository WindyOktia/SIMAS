<div class="card card-body">
    <h3>Detail Dashboard Presensi</h3>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                <select name="" id="" class="form-control">
                    <option value="">- Kriteria -</option>
                    <option value="">Hadir</option>
                    <option value="">Izin</option>
                    <option value="">Tugas</option>
                    <option value="">Tidak Hadir</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="" id="" class="form-control">
                    <option value="">- Anu -</option>
                    <option value="">Lebih Dari</option>
                    <option value="">Kurang Dari</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" placeholder="">
            </div>
            <div class="col-md-3">
                <button class="btn  btn-info">Cari</button>
            </div>
        </div>
    </div>
    <div class="card card-body border-info">
        <div class="row">
            <div class="col-md-8">
                <canvas id="dashDetailGuru" height="100"></canvas>
            </div>
            <div class="col-md-4">
                <h5><b>Detail</b></h5>
                Hadir : <br>
                Izin : <br>
                Tugas : <br>
                Tidak Hadir :
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Hadir</th>
            <th scope="col">Izin</th>
            <th scope="col">Tugas</th>
            <th scope="col">Tidak Hadir</th>
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
                <td>5</td>
                <td><a href="" class="btn btn-sm btn-info">Track Record</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Anu</td>
                <td>3</td>
                <td>1</td>
                <td>1</td>
                <td><span class="badge badge-danger">30</span></td>
                <td><a href="" class="btn btn-sm btn-info">Track Record</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Itu</td>
                <td>3</td>
                <td>1</td>
                <td>1</td>
                <td>9</td>
                <td><a href="<?= base_url('admin/trackRecord')?>" class="btn btn-primary btn-sm">Track Record</a></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
var dash = document.getElementById('dashDetailGuru').getContext('2d');
var dashGuru = new Chart(dash, {
	type: 'pie',
	data: {
		labels: ['Baik', 'Kurang Baik'],
		datasets: [{
			label: '# of Votes',
			data: [12, 19],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)'
			],
			borderWidth: 2
		}]
	}
});
</script>