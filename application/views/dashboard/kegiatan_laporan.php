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
                <?php foreach ($kegiatan as $ni_kegiatan):?> 
            
                <li>
                    <div class="row h6">
                        <div class="col-md-6"><?=$ni_kegiatan['nama_kegiatan'];?> </div>
                        <div class="col-md-6">: <?=$ni_kegiatan['Nilai'];?></div>
                    </div>
                </li>
                <?php endforeach ?>
            </ol>
        </div>
        <div class="col-md-8">
           <h5><b> </b></h5>
           <canvas id="dashSiswa"  height=""></canvas>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col md-12">
        <a href="<?=base_url('')?>" class="btn btn-sm btn-success float-right mt-2">Unduh</a>
        </div>
    </div>
</div>

<div class="card card-body">
<h3>Detail Laporan Keuangan</h3>
    <div class="card card-body">
    <div class="row">
        <div class="col-md-4">
            <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Grafik Rincian Penggunaan Biaya Kegiatan</h6>
            <ol>
            <?php foreach ($infoKegiatan as $biaya_kg):?>
                <li>
                    <div class="row h6">
                        <div class="col-md-6"><?=$biaya_kg['nama_kegiatan'];?></div>
                        <div class="col-md-6">: Rp. <?=$biaya_kg['rata_pengeluaran'];?></div>
                    </div>
                </li>
                <!-- <li>
                    <div class="row h6">
                        <div class="col-md-6">Renang </div>
                        <div class="col-md-6">: Rp. 6.000.000</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Bulu Tangkis</div>
                        <div class="col-md-6">: Rp. 10.000.000</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Catur</div>
                        <div class="col-md-6">: Rp. 1.000.000</div>
                    </div>
                </li> -->
                <?php endforeach ?>
            </ol>
        </div>
        <div class="col-md-8">
           <h5><b> </b></h5>
           <canvas id="chartBiaya"  height=""></canvas>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col md-12">
        <a href="<?=base_url('')?>" class="btn btn-sm btn-success float-right mt-2">Unduh</a>
        </div>
    </div>
    </div>

<div class="card card-body">
    <h3>Detail Laporan Kegiatan Siswa</h3>
    <div class="card card-body">
    <div class="row">
        <div class="col-md-4">
            <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Grafik Keterlibatan Siswa Dalam Kegiatan</h6>
            <ol>
            <?php foreach ($jumlah as $jmlh_kg):?>
                <li>
                    <div class="row h6">
                        <div class="col-md-6"><?=$jmlh_kg['nama_kegiatan'];?></div>
                        <div class="col-md-6">: <?=$jmlh_kg['jumlah_peserta'];?></div>
                    </div>
                </li>
                <?php endforeach ?>
            </ol>
        </div>
        <div class="col-md-8">
           <h5><b> </b></h5>
           <canvas id="chartKeterlibatan"  height=""></canvas>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col md-12">
        <a href="<?=base_url('')?>" class="btn btn-sm btn-success float-right mt-2">Unduh</a>
        </div>
    </div>
    </div>

    <div class="card card-body">
<h3>Detail Laporan Pendanaan</h3>
    <div class="card card-body">
    <?php foreach ($rataKeuangan as $rt_uang):?> 
    <div class="row">
        <div class="col-md-4">
            <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Grafik Keuangan Kegiatan</h6>
            <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-12">Rata-Rata Anggaran</div>
                        <div class="col-md-12">Rp. <?=$rt_uang['rata_anggaran'];?></div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-12">Rata-Rata Pendapatan Biaya </div>
                        <div class="col-md-12 ">Rp. <?=$rt_uang['rata_pendapatan'];?></div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-12">Rata-Rata Pengeluaran Biaya </div>
                        <div class="col-md-12">Rp. <?=$rt_uang['rata_pengeluaran'];?></div>
                    </div>
                </li>
            </ol>
        </div>
    <?php endforeach; ?>
        <div class="col-md-8">
           <h5><b> </b></h5>
           <canvas id="dashPendanaan"  height=""></canvas>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col md-12">
        <a href="<?=base_url('')?>" class="btn btn-sm btn-success float-right mt-2">Unduh</a>
        </div>
    </div>
    </div>

</div>

<script>
var dash1 = document.getElementById('dashSiswa').getContext('2d');
var dashSiswa = new Chart(dash1, {
	type: 'bar',
	data: {
		labels: [
            <?php foreach($kegiatan as $th_akademik):?>
            '<?=$th_akademik['tahun_akademik']?> - <?=$th_akademik['semester']?>',
            <?php endforeach?>
            ],
		datasets: [
            
            {
			label: 'Basket',
			data: [
                //foreach
                <?php foreach($kegiatan as $nilai1):?>
                '<?=$nilai1['Nilai']?>',
                <?php endforeach?>
                //end foreach
            ],
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
			data: [
                //foreach
                <?php foreach($kegiatan as $nilai2):?>
                '<?=$nilai2['Nilai']?>',
                <?php endforeach?>
                //end foreach
            ],
			backgroundColor: [
				'rgba(54, 162, 235, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(54, 162, 235, 0.2)',
			],
            borderWidth: 2 ,
            fill: true
        },
    ]
},
options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var chart = document.getElementById('chartBiaya').getContext('2d');
var chartBiaya = new Chart(chart, {
	type: 'bar',
	data: {
		labels: [
            <?php foreach($infoKegiatan as $tahun1):?>
            '<?=$tahun1['tahun_akademik']?> - <?=$th_akademik['semester']?>',
            <?php endforeach?>
        ],
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
},
options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var chart = document.getElementById('chartKeterlibatan').getContext('2d');
var chartKeterlibatan = new Chart(chart, {
    type: 'line',
    data: {
        labels: [
            <?php foreach($jumlah as $tahun2):?>
            '<?=$tahun2['tahun_akademik']?> - <?=$th_akademik['semester']?>',
            <?php endforeach?>
        ],
        datasets: [{
            label: 'Basket',
            data: [12, 5, 6, 10, 22, 50],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Futsal',
            data: [15, 10, 15, 30, 40],
            borderColor: [
                '#20A39E'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Renang',
            data: [20, 15, 20, 30, 50],
            borderColor: [
                '#CC4BC2'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Bulu Tangkis',
            data: [20, 15, 20, 30, 50],
            borderColor: [
                '#F9564F'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Catur',
            data: [20, 15, 20, 30, 50],
            borderColor: [
                '#73EEDC'
               
            ],
            fill:false,
            borderWidth: 2
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var chart = document.getElementById('dashPendanaan').getContext('2d');
var chartBiaya = new Chart(chart, {
	type: 'bar',
	data: {

		labels: [
            <?php foreach ($infoKegiatan as $nm_kegiatan):?>
            '<?=$nm_kegiatan['nama_kegiatan']?>',
            <?php endforeach ?>
            ],
		datasets: [{
			label: 'Anggaran',
			data: [
                //foreach
                <?php foreach ($infoKegiatan as $anggaran):?>
                '<?=$anggaran['rata_anggaran']?>',
                <?php endforeach ?>
                //end foreach
                ],
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
            label: 'Pendapatan Biaya',
			data: [
                <?php foreach ($infoKegiatan as $pendapatan):?>
            '<?=$pendapatan['rata_pendapatan']?>',
            <?php endforeach ?>
            ],
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
            label: 'Pengeluaran Biaya',
			data: [
                <?php foreach ($infoKegiatan as $pengeluaran):?>
            '<?=$pengeluaran['rata_pengeluaran']?>',
            <?php endforeach ?>
            ],
			backgroundColor: [
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
			],
            borderWidth: 2 ,
            fill: true
            
        }
    ]
},
options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>