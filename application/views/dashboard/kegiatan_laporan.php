<style>
    .content-wrapper{
        background-color:#ebebeb
    }
</style>

<!-- <?=json_encode($minatSiswa)?> -->

<h3>Detail Laporan Kegiatan Tahun <b><?=$_GET['key1']?></b> - Semester <b><?=$_GET['semester']?></b></h3>
<div class="row mt-3">
    <div class="col-md-3">
    <?php foreach ($kgiatn_berjalan as $kg_berjalan):?>
        <div style="background-color:#FFB800" class="card card-body">
            <h6>Jumlah Kegiatan Berjalan</h6>
            <h4 class="text-center"><b><?=$kg_berjalan['jmlh_survei_terlaksana'];?></b></h4>
        </div>
        <?php endforeach?>
    </div>
    <div class="col-md-3">
    <?php foreach ($jmlh_laporan as $jmlh):?>
        <div class="card card-body bg-info-300">
            <h6>Jumlah Laporan Masuk</h6>
            <h4 class="text-center"><b><?=$jmlh['jmlh_laporan'];?></b></h4>
        </div>
        <?php endforeach?>
    </div>
    <div class="col-md-3">
    <?php foreach ($survei as $jm_survei):?>
        <div class="card card-body bg-success-400">
            <h6>Jumlah Survei Terlaksana</h6>
            <h4 class="text-center"><b><?=$jm_survei['jmlh_survei_terlaksana'];?></b></h4>
        </div>
        <?php endforeach?>
    </div>
    <div class="col-md-3">
    <?php foreach ($jumlah as $jmlh_kg):?>
        <div class="card card-body bg-info">
            <h6>Siswa Terlibat</h6>
            <h4 class="text-center">~ <b><?=$jmlh_kg['jumlah_peserta'];?></b></h4>
        </div>
        <?php endforeach?>
    </div>
</div>
<ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Laporan Anggaran Kegiatan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Keterlibatan Siswa</a>
  </li>
  <!-- <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li> -->
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <h6 class="text text-indigo-600">Laporan Umum</h6>
                    <canvas id="kegiatan"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <h6 class="text text-indigo-600">Efektifitas Penggunaan Dana</h6>
                    <canvas id="efektifitas"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
                <div class="card card-body">
                    <h6 class="text-orange-600">Alokasi Dana Anggaran</h6>
                    <canvas id="alokasiAnggaran" height="293"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body">
                    <h6 class="text-orange-600">Alokasi Dana Masuk</h6>
                    <canvas id="alokasiBiaya" height="293"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body">
                    <h6 class="text-orange-600">Alokasi Dana Terpakai</h6>
                    <canvas id="alokasiTerpakai" height="293"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
                <?php $i=1; foreach ($kegiatan as $nm_kegiatan):?>

                    <div class="col-md-4">
                            <div class="card card-body">
                                <h6><?=$nm_kegiatan['nama_kegiatan'];?></h6>
                                <canvas id="kegiatan<?=$nm_kegiatan['id_proposal'];?>" ></canvas>
                            </div>
                    </div>
                <?php endforeach ?>
        </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
            <h6>Keterlibatan Siswa</h6>
                <canvas id="siswa"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body">
                Minat Siswa
                <canvas id="minatSiswa"></canvas>
            </div>
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>



<script>
var kegiatan = document.getElementById('kegiatan');
var ctkegiatan = new Chart(kegiatan, {
    type: 'bar',
    data: {
        labels: [
            'Dana Anggaran', 'Dana Masuk', 'Dana Terpakai'
        ],
        datasets: [{
            label: 'Laporan Umum',
            data: [
                //foreach
                <?php foreach ($rataKeuangan as $rt_uang):?>
                '<?=$rt_uang['rata_anggaran']?>', '<?=$rt_uang['rata_pendapatan']?>', '<?=$rt_uang['rata_pengeluaran']?>'
                <?php endforeach ?>
                //endforeach
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
        display: false
    },
    tooltips: {
        callbacks: {
        label: function(tooltipItem) {
            return tooltipItem.yLabel;
        }
        }
    }
    }
});

//Grafik Efektifitas Penggunaan Dana
// Kegiatan Yang paling efektif menggunakan biaya
// jadi pengeluaran kegiatan mendekati biaya yang didapatkan.
var chartefek = document.getElementById('efektifitas').getContext('2d');
var chartEfek = new Chart(chartefek, {
	type: 'horizontalBar',
	data: {
		labels: [
        <?php foreach ($siswa as $efektif):?>
            '<?=$efektif['nama_kegiatan']?>',
            <?php endforeach ?>
        ],
		datasets: [{
			label: 'Anggaran',
			data: [
                <?php foreach($kegiatan as $persenEfektif):?>
            '<?=number_format(($persenEfektif['rata_pengeluaran'] / $persenEfektif['rata_pendapatan']) * 100,2)?>',
            <?php endforeach ?> 
            ],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
			],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 2 ,
            fill: true
        }
    ]
},
options: {
        scales: {
            xAxes: [{
                ticks: {
                    min: 0 // Edit the value according to what you need
                }
            }],
            yAxes: [{
                stacked: true
            }]
        },
        legend: {
        display: false
        },
        tooltips: {
    callbacks: {
        label: function(tooltipItem, data) {
        //get the concerned dataset
        var dataset = data.datasets[tooltipItem.datasetIndex];
        //calculate the total of this data set
        var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
        });
        //get the current items value
        var currentValue = dataset.data[tooltipItem.index];
        //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
        var percentage = Math.floor(((currentValue/total) * 100)+0.5);

        return currentValue + "%";
        }
    }
    } 
    }
});
<?php foreach($kegiatan as $grf):?>
var anu<?=$grf['id_proposal']?> = document.getElementById('kegiatan<?=$grf['id_proposal']?>');
var myChartanu<?=$grf['id_proposal']?> = new Chart(anu<?=$grf['id_proposal']?>, {
    type: 'bar',
    data: {
        labels: ['Dana Anggaran', 'Dana Masuk', 'Dana Terpakai'],
        datasets: [{
            data: [<?=$grf['rata_anggaran']?>,<?=$grf['rata_pendapatan']?>,<?=$grf['rata_pengeluaran']?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
        display: false
        },
        tooltips: {
            callbacks: {
            label: function(tooltipItem) {
                    return tooltipItem.yLabel;
            }
            }
        }
    }
});
<?php endforeach?>



var alokasiBiaya = document.getElementById('alokasiBiaya');
var alokasi = new Chart(alokasiBiaya, {
    type: 'doughnut',
    data: {
        labels: [
            <?php foreach ($alokasiBiaya as $aloBiaya):?>
            '<?=$aloBiaya['nama_kegiatan']?>',
            <?php endforeach ?> 
        ],
        datasets: [{
            data: [
                <?php foreach ($alokasiBiaya as $danaMasuk):?>
            <?= $danaMasuk['rata_pendapatan']?>,
            <?php endforeach ?> 
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                '#58A4B0',
                'rgba(161, 212, 247, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return percentage + "%";
    }
  }
} 
    } 
});
var alokasiAnggaran = document.getElementById('alokasiAnggaran');
var alokasi2 = new Chart(alokasiAnggaran, {
    type: 'doughnut',
    data: {
        labels: [
            <?php foreach ($alokasiBiaya as $aloAnggaran):?>
            '<?=$aloAnggaran['nama_kegiatan']?>',
            <?php endforeach ?> 
        ],
        datasets: [{
            data: [
                <?php foreach ($alokasiBiaya as $danaAnggaran):?>
            <?= $danaAnggaran['rata_anggaran']?>,
            <?php endforeach ?> 
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                '#58A4B0',
                'rgba(161, 212, 247, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return percentage + "%";
    }
  }
} 
    } 
});
var alokasiTerpakai = document.getElementById('alokasiTerpakai');
var alokasi3 = new Chart(alokasiTerpakai, {
    type: 'doughnut',
    data: {
        labels: [
            <?php foreach ($alokasiBiaya as $aloterpakai):?>
            '<?=$aloterpakai['nama_kegiatan']?>',
            <?php endforeach ?> 
        ],
        datasets: [{
            data: [
                <?php foreach ($alokasiBiaya as $danaterpakai):?>
            <?= $danaterpakai['rata_pengeluaran']?>,
            <?php endforeach ?> 
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                '#58A4B0',
                'rgba(161, 212, 247, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return percentage + "%";
    }
  }
} 
    } 
});

var minatSiswa = document.getElementById('minatSiswa');
var minatsiswa = new Chart(minatSiswa, {
    type: 'doughnut',
    data: {
        labels: [
            <?php foreach ($keterlibatan as $terlibat_siswa):?>
            '<?=$terlibat_siswa['nama_kegiatan']?>',
            <?php endforeach ?> 
        ],
        datasets: [{
            data: [
                <?php foreach ($keterlibatan as $siswa_terlibat):?>
            <?=$siswa_terlibat['Nilai']?>,
            <?php endforeach ?> 
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return percentage + "%";
    }
  }
} 
    } 
});

var siswa = document.getElementById('siswa');
var Siswa = new Chart(siswa, {
    type: 'bar',
    data: {
        labels: [
            <?php foreach ($siswa as $minat_siswa):?>
            '<?=$minat_siswa['nama_kegiatan']?>',
            <?php endforeach ?> 
        ],
        datasets: [{
            data: [
                <?php foreach ($siswa as $jmlh_siswa_mengisi):?>
            '<?=$jmlh_siswa_mengisi['Jumlah_siswa_mengisi']?>',
            <?php endforeach ?>  
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
        display: false
        }
    }
});
</script>