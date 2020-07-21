<div class="card card-body">
    <h3>Dashboard</h3>
    <div class="form-group">
    <select name="" id="" class="form-control col-3">
        <option value="">- pilih tahun ajaran -</option>
    </select>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-body border-info">
                <h6>Grafik Nilai Guru</h6>
                <div class="row">
                    <div class="col-md-8">
                    <canvas id="dashGuru" width="100" height="100"></canvas>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Tahun Ajaran</b></h5>
                        5 Tahun Terakhir
                        <div class="mb-3"></div>
                        <h5><b>Kriteria</b></h5>
                        Baik : <br>
                        Kurang Baik : 
                    </div>
                </div>
                <a href="<?=base_url('admin/detailRecordPresensi')?>" class="btn btn-sm btn-info float-right mt-2">lihat detail</a>
            </div>
        </div>
        <div class="col-md-6">
            grafik kegiatan Basket
        </div>
    </div>
</div>

<script>
var dash = document.getElementById('dashGuru').getContext('2d');
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