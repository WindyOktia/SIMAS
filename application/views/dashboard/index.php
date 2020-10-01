<div class="row">
        <div class="col-md-12">
            <div class="card card-body border-info">
                <h6>Grafik Mutu Kinerja Guru</h6>
                <div class="row">
                    <div class="col-md-8">
                    <canvas id="dashBobot" height="100"></canvas>
                    </div>
                    <div class="col-md-4">
                    <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Detail Informasi Item Penilaian</h6>
            <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Kinerja Guru </div>
                        <div class="col-md-6">: 12</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Kegiatan </div>
                        <div class="col-md-6">: 10</div>
                    </div>
                </li>
                </div>
            </div>
                <div class="row">
                    <div class="col md-12">
                    <a href="<?=base_url('admin/info')?>" class="btn btn-sm btn-success float-right mt-2">Lihat Detail</a>
                    </div>
                </div>
        </div>
    </div>
</div>
            <div class="card card-body border-info">
                <h6>Grafik Perbandingan Kegiatan Siswa</h6>
                <div class="row">
                    <div class="col-md-8">
                    <canvas id="dashKetertarikan" height="100"></canvas>
                    </div>
                    <div class="col-md-4">
                    <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Detail Informasi</h6>
            <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Basket </div>
                        <div class="col-md-6">: 12</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Futsal </div>
                        <div class="col-md-6">: 19</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Renang </div>
                        <div class="col-md-6">: 10</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Bulu Tangkis</div>
                        <div class="col-md-6">: 5</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Catur</div>
                        <div class="col-md-6">: 5</div>
                    </div>
                </li>
                </div>
            </div>
                <div class="row">
                    <div class="col md-12">
                    <a href="<?=base_url('admin/info')?>" class="btn btn-sm btn-success float-right mt-2">Lihat Detail</a>
                    </div>
                </div>
        </div>
    </div>
</div>


<script>
var dash1 = document.getElementById('dashBobot').getContext('2d');
var dashBobot = new Chart(dash1, {
	type: 'pie',
	data: {
		labels: ['Kinerja Guru', 'Kegiatan'],
		datasets: [{
			label: 'Tahun Akademik',
			data: [12, 10],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)'
			],
			borderWidth: 2
		}]
	}
});

var dash2 = document.getElementById('dashKetertarikan').getContext('2d');
var dashKetertarikan = new Chart(dash2, {
	type: 'bar',
	data: {
		labels: ['Basket', 'Futsal','Renang','Bulu Tangkis','Catur'],
		datasets: [{
			label: 'Basket',
			data: [12, 19, 10, 5, 15],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
                '#374B4A',
                '#73EEDC',
                '#F9564F'
			],
			borderWidth: 2
		}]
	}
});
</script>