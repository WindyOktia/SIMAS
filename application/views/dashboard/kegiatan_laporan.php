<div class="card card-body">
    <h3>Detail Dashboard Laporan Kegiatan</h3>
    <div class="form-group">
        <div class="row">
            <!-- <div class="col-md-3">
                <select name="" id="" class="form-control">
                <option value="">- Tahun Ajaran -</option>
                <option value="">- 2016 -</option>
                <option value="">- 2017 -</option>
                <option value="">- 2018 -</option>
                <option value="">- 2019 -</option>
                <option value="">- 2020 -</option>
                </select>
            </div> -->
            <div class="col-md-3">
                <select name="" id="" class="form-control">
                    <option value="">- Terkait -</option>
                    <option value="">OSIS</option>
                    <option value="">TIM SEKOLAH</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn  btn-info">Cari</button>
            </div>
        </div>
    </div> <br>

    <div class="card card-body">
    <div class="row">
        <div class="col-md-4">
           

            <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Detail Informasi Rata - rata Nilai</h6>
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
                        <div class="col-md-6">: 5</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Renang </div>
                        <div class="col-md-6">: 6</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Bulu Tangkis</div>
                        <div class="col-md-6">: 10</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Catur</div>
                        <div class="col-md-6">: 1</div>
                    </div>
                </li>
            </ol>
        </div>
        <div class="col-md-8">
           <h5><b> </b></h5>
           <canvas id="dashSiswa"  height=""></canvas>
        </div>
    </div>
    
</div>

    </div>

<div class="card card-body">
<h3>Detail Laporan Keuangan</h3>
    <div class="col">
            <div class="card card-body border-info">
                <h6>Grafik Efektifitas Penggunaan Biaya Untuk Kegiatan</h6>
                <div class="row">
                    <div class="col-md-12">
                    <canvas id="chartBiaya" height="80"></canvas>
                    </div>
                </div>
            </div>
            <td><a href="" class="btn btn-sm btn-success float-right">Export</a></td>
        </div>
    </div>
</div>


<div class="card mt-3">
    <div class="card-body">
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Laporan</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Kegiatan</th>
				<th>Tahun Ajaran</th>
				<th>Detail Kegiatan</th>
				<th>Actions</th>
                <th>Info Pembina</th>
				<th>Info Waka</th>
				<th>Info Kepala Sekolah</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($kelas as $kelas):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></b></td>
				<td>24</td>
				<td>
                    <a href="<?= base_url('admin/daftarPeserta')?>/<?= $kelas['id_kelas']?>" class="btn btn-primary btn-sm">Daftar Peserta</a>
                </td>
				<td>
					<a href="<?= base_url('admin/deleteKelas')?>/<?= $kelas['id_kelas']?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>

<script>
var dash1 = document.getElementById('dashSiswa').getContext('2d');
var dashSiswa = new Chart(dash1, {
	type: 'bar',
	data: {
		labels: ['2016', '2017','2018','2019','2020'],
		datasets: [{
			label: 'Basket',
			data: [12, 19, 10, 17, 2],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
			],
            borderWidth: 2 ,
            fill: true
        },
        {
            label: 'Futsal',
			data: [5, 12, 16, 19, 22],
			backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
			],
            borderWidth: 2 ,
            fill: true
            
        },
        {
            label: 'Renang',
			data: [6, 10, 15, 20, 25],
			backgroundColor: [
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                
                
			],
            borderWidth: 2 ,
            fill: true
            
        },
        {
            label: 'Bulu Tangkis',
			data: [10, 17, 21, 3, 30],
			backgroundColor: [
                '#73EEDC',
                '#73EEDC',
                '#73EEDC',
                '#73EEDC',
                '#73EEDC',
                
			],
            borderWidth: 2 ,
            fill: true
            
        },
        {
            label: 'Catur',
			data: [1, 18, 26, 29, 32],
			backgroundColor: [
                '#F9564F',
                '#F9564F',
                '#F9564F',
                '#F9564F',
                '#F9564F'
                
			],
            borderWidth: 2 ,
            fill: true
            
		}
    ]
}
});
var chart = document.getElementById('chartBiaya').getContext('2d');
var chartBiaya = new Chart(chart, {
    type: 'bar',
	data: {
        labels: ['2016', '2017','2018','2019','2020'],
		datasets: [{
            label: 'Terpenuhi',
			data: [12, 19, 10, 17, 2],
			backgroundColor: [
				'#90FCF9',
				'#90FCF9',
				'#90FCF9',
				'#90FCF9',
				'#90FCF9',
				'#90FCF9'
			],
            borderWidth: 2 ,
            fill: true
		},
        {
			label: 'Tidak Terpenuhi',
			data: [5, 12, 16, 19, 22],
			backgroundColor: [
				'#824C71',
				'#824C71',
				'#824C71',
				'#824C71',
				'#824C71'
			],
            borderWidth: 2 ,
            fill: true
            
		},
        ]
	}
});
</script>