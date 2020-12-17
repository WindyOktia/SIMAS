<a href="<?=base_url('admin/daftarPresensi')?>" class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-arrow-circle-left"></i> Kembali</a>

<!-- <?=json_encode($dataGuru);?> -->

<div class="card card-body border-info mt-3">
<h4><b><i class="	fa fa-user mr-2"></i>Detail Guru</b></h4>
<?php foreach($dataGuru as $dt):?>
<ul>
    <li>
        <div class="row">
            <div class="col-md-2">NIP</div>
            <div class="col">: <?=$dt['nip']?></div>
        </div>
    </li>
    <li>
        <div class="row">
            <div class="col-md-2">Nama Guru</div>
            <div class="col">: <?=$dt['nama_guru']?></div>
        </div>
    </li>
    <li>
        <div class="row">
            <div class="col-md-2">Status Guru</div>
            <?php
                if($dt['status_guru']=='1'){
                    $stat = 'PNS';
                }
                if($dt['status_guru']=='2'){
                    $stat = 'Guru Tidak Tetap';
                }
                if($dt['status_guru']=='3'){
                    $stat = 'Guru Tetap Yayasan';
                }
            ?>
            <div class="col-md-2">: <b><?= $stat ?></b></div>
        </div>
    </li>
</ul>
<?php endforeach?>

<h6>Informasi Umum</h6>
<ul>
    <li>Guru dengan status <b>Guru Tidak Tetap ( GTT )</b> tidak wajib hadir setiap hari</li>
</ul>
</div>

<legend class="text-center"><h4>- Rekapitulasi Presensi dan Survei -</h4></legend>

<div class="card card-body border-warning mt-2">
    <form action="" id="filterRentang" method="get">
        <div class="form-group my-auto">
            <label for=""><b>Filter Tahun Akademik</b></label>
            <div class="row">
                <div class="col-md-2">
                    <select name="dari" id="" class="form-control">
                        <option value="semua">semua tahun</option>
                        <?php foreach($getFilterTahun as $th1):?>
                        <option value="<?= $th1['tahun_akademik']?> - <?= $th1['semester']?>" 
                            
                            <?php if(isset($_GET['dari']) && $_GET['dari']==$th1['tahun_akademik'].' - '.$th1['semester']){echo 'selected';};?>>
                            
                            <?= $th1['tahun_akademik']?> - <?= $th1['semester']?></option>
                        <?php endforeach?>
                    </select>
                </div>
                
                <span class=" my-auto"> sampai </span>
                <div class="col-md-2">
                    <select name="sampai" id="" class="form-control">
                        <option value="semua">semua tahun</option>
                        <?php foreach($getFilterTahun as $th2):?>
                        <option value="<?= $th2['tahun_akademik']?> - <?= $th2['semester']?>" 
                            <?php if(isset($_GET['sampai'])&& $_GET['sampai']==$th2['tahun_akademik'].' - '.$th2['semester']){echo 'selected';};?>>
                            <?= $th2['tahun_akademik']?> - <?= $th2['semester']?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="col-md-2 ml-5">
                    <button type="submit" class="btn btn-success btn-block ">Filter Data</button>
                </div>
                <div class="col-md-2 ml-5">
                   <a href="<?=base_url('admin/detailPresensi')?>/<?=$id?>" class="btn btn-danger btn-block">Hapus Filter</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php if(isset($_GET['dari'])||isset($_GET['sampai'])||isset($_GET['semester'])){?>
    <h6> <i class="	fa fa-clock-o mr-2"></i>Rekam jejak nilai dari tahun akademik <b><?=$_GET['dari']?></b> 

    <?php if(isset($_GET['sampai'])){?>
        sampai <b><?=$_GET['sampai']?></b> 
    <?php } ; ?>
    
<?php } else { ?>
    <h6> <i class="	fa fa-clock-o mr-2"></i>Rekam jejak nilai dalam 2 tahun terakhir </h6>
<?php } ;?>

<?php if(count($presensi_harian)>0){ ?>


<?php

$ph = array();
$countph = count($presensi_harian);
$jam_masuk = array();
$jam_pulang = array();

foreach($presensi_harian as $prh){
    $ph[]= $prh['selisih'];
    $jam_masuk[] = $prh['jam_masuk'];
    $jam_pulang[] = $prh['jam_pulang'];
}

// rata rata jam kerja
function explode_time($time) { //explode time and convert into seconds
    $time = explode(':', $time);
    $time = $time[0] * 3600 + $time[1] * 60;
    return $time;
}

function second_to_hhmm($time) { //convert seconds to hh:mm
    $hour = floor($time / 3600);
    $minute = strval(floor(($time % 3600) / 60));
    if ($minute == 0) {
        $minute = "00";
    } else {
        $minute = $minute;
    }
    $time = $hour . "," . $minute;
    return $time;
}

$time = 0;
foreach ($ph as $time_val) {
$time +=explode_time($time_val); // this fucntion will convert all hh:mm to seconds
}
// end of rata rata jam kerja

// jam masuk
$menitMasuk = 0;
foreach ($jam_masuk as $jm) {
    list($hours, $minutes) = explode(':', $jm);
    $menitMasuk += $hours * 60 + $minutes;
}
$average_menit_masuk = $menitMasuk  / count($jam_masuk);
$av_jam_masuk = floor($average_menit_masuk / 60);
$average_menit_masuk = $average_menit_masuk % 60;
// end of jam masuk

$menitPulang = 0;
foreach ($jam_pulang as $jm) {
    list($jam, $menit) = explode(':', $jm);
    $menitPulang += $jam * 60 + $menit;
}
$average_menit_pulang = $menitPulang  / count($jam_pulang);
$av_jam_pulang = floor($average_menit_pulang / 60);
$average_menit_pulang = $average_menit_pulang % 60;
// end of jam masuk

?>
<?php } ?>


<?php

    $arrPM= array();
    
    foreach($presensi_mengajar as $pres)
    {
        $arrPM[]= $pres['selisih'];
    }

    function explode_times($waktu) { //explode time and convert into seconds
        $waktu = explode(':', $waktu);
        $waktu = $waktu[0] * 3600 + $waktu[1] * 60;
        return $waktu;
    }
    
    function second_to_hhmms($waktu) { //convert seconds to hh:mm
        $jam = floor($waktu / 3600);
        $menit = strval(floor(($waktu % 3600) / 60));
        if ($menit == 0) {
            $menit = "00";
        } else {
            $menit = $menit;
        }
        $waktu = $jam . "," . $menit;
        return $waktu;
    }
    
    $waktu = 0;
    foreach ($arrPM as $slsh) {
    $waktu +=explode_times($slsh); // this fucntion will convert all hh:mm to seconds
    }

    foreach($getCountSemesterAndMinggu as $SnM)
    {
        $jml_semester = $SnM['jml_semester'];
        $jml_minggu = $SnM['jml_minggu'];
    }

    $jml_jam_mingguan = second_to_hhmms($waktu/$jml_semester/$jml_minggu);

?>

<?php
    $jml_terlambat = 0;
    $jml_lebih = 0;
    foreach($presensi_harian as $prsh)
    {
        if($prsh['jam_masuk']>='07:15:00'){
            $jml_terlambat++;
        }
        if($prsh['jam_pulang']>='16:00:00'){
            $jml_lebih++;
        }
    }

    $jml_ijin = 0 ;
    foreach($getDefaultIjin as $dfIjin)
    {
        if($dfIjin['id_guru']==$id){
            $jml_ijin++;
        }
    }

?>

<?php if(count($presensi_harian)>0){?>
<div class="row mt-3">
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Jumlah Kehadiran</h5>
            <h3 class="text-center"><b><?= count($presensi_harian);?> </b> hari</h3>
            <a href="<?= base_url('admin/unduhPresensiId')?>/<?=$id?>" class="btn btn-sm btn-success btn-block">Unduh Presensi Guru <i class="fa fa-download ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Keterlambatan</h5>
            <h3 class="text-center"><b><?= $jml_terlambat?> </b> x</h3>
            <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#modalTerlambat">
                Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i>
            </button>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Kelebihan Jam</h5>
            <h3 class="text-center"><b><?= $jml_lebih?> </b> x</h3>
            <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#modalLebih">
                Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i>
            </button>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-danger">
            <h5 class="text-center">Tidak Hadir</h5>
            <h3 class="text-center"><b> <?= $jml_ijin ?> </b> x</h3>
            <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#modalTidak">
                Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i>
            </button>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Nilai Survei</h5>
            <?php if(count($getDefaultNilaiSurvei)>0){?>
            <?php 
                $arrMax = array();
                $arrPerolehan = array();
                foreach($getDefaultNilaiSurvei as $dfNilai)
                {
                    if($dfNilai['id_guru']==$id){
                        $arrMax[] += $dfNilai['nilai_max'];
                        $arrPerolehan[] += $dfNilai['nilai_diperoleh'];
                    }
                }
                
                $nilai_max= array_sum($arrMax);
                $nilai_diperoleh= array_sum($arrPerolehan);

                $persentaseNilai = ($nilai_diperoleh/$nilai_max)*100;
            
            ?>
                <h3 class="text-center"><b><?=number_format($persentaseNilai,2)?></b></h3>
            <?php }else{?>
                <h3 class="text-center"><b>0 </b></h3>
            <?php }?> 

            <a href="<?= base_url('admin/unduhNilaiSurvei')?>" class="btn btn-sm btn-success btn-block">Unduh Nilai Survei <i class="fa fa-download ml-2"></i></a>
        </div>
    </div>
</div>

<?php } ?>


<div class="row">
    <div class="col md-12">
        <div class="card card-body border-primary">
            <h5><b>Kehadiran Harian  </b>
                <span class="float-right">
                    <?php if(count($presensi_harian)>0){?>
                    <a href="<?=base_url('admin/unduhPresensiId')?>/<?= $id ?>" class="btn btn-success btn-sm">Unduh data presensi harian</a>
                    <?php } ?>
                </span>
            </h5>
            <?php if(count($presensi_harian)>0){?>
            <div class="row">
                <div class="col">
                    <label for=""> Rata-rata jam masuk guru</label>
                    <h2 class=""><b> <?= str_pad($av_jam_masuk, 2, 0, STR_PAD_LEFT) . ":" . str_pad($average_menit_masuk, 2, 0, STR_PAD_LEFT)?> </b></h2>
                </div>
                <div class="col border-left">
                    <label for=""> Rata-rata jam pulang guru</label>
                    <h2 class=""><b><?= str_pad($av_jam_pulang, 2, 0, STR_PAD_LEFT) . ":" . str_pad($average_menit_pulang, 2, 0, STR_PAD_LEFT)?> </b></h2>
                </div>
                <div class="col border-left">
                    <label for="">Rata-rata jam kerja</label>
                    <h2 class=""><b><?= second_to_hhmm($time/$countph);?></b> jam</h2>
                </div>
            </div>
            <?php } else {?>
                <div class="row">
                    <div class="col">
                       <div class="text-center">- Belum ada presensi harian - </div> 
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card card-body border-primary">
            <h6><b>Resume Mengajar</b>
                <span class="float-right">
                    <a href="" class="btn btn-success btn-sm">Unduh data presensi mengajar</a>
                </span>
            </h6>
            <div class="row">
                <div class="col">
                    <label for="">Beban mengajar</label>
                    <?php foreach($jadwal as $jds):?>
                    <h2 class=""><b><?=$jds['jml_mapel']?> Mata pelajaran | <?=$jds['beban_mengajar']?> sesi</b></h2>
                    <?php endforeach?>
                </div>
                <div class="col border-left">
                    <label for="">Rata-rata total jam mengajar per minggu</label>
                    <h2 class=""><b><?= $jml_jam_mingguan ?></b></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-12">
        <div class="card card-body border-primary">
            <h5><b>Rata-Rata Nilai Survei Guru</b>
                <span class="float-right">
                    <a href="" class="btn btn-success btn-sm">Unduh laporan nilai survei</a>
                </span>
            </h5>
            <h2 class="text-center"><b>80</b></h2>
        </div>
    </div> -->
</div>

<h6> <i class="	fa fa-clock-o mr-2"></i>Grafik perubahan nilai dalam 2 tahun terakhir </h6>

<ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
<?php if(count($presensi_harian)>0){ ?>
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Jam Kerja</a>
  </li>
  <?php } ?>
  <li class="nav-item">
    <a class="nav-link <?php if(count($presensi_harian)==0){echo 'active';};?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Jam Mengajar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Kepuasan Siswa</a>
  </li>
</ul>

<div class="card card-body ">
    <div class="tab-content" id="pills-tabContent">
    <?php if(count($presensi_harian)>0){ ?>
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <canvas id="chartTrackHarian"  height="80"></canvas>
        </div>
    <?php }?>
        <div class="tab-pane fade <?php if(count($presensi_harian)==0){echo 'show active';};?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <canvas id="chartTrackMengajar"  height="80"></canvas>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <canvas id="chartTrackKepuasan"  height="80"></canvas>
        </div>
    </div>
</div>


<!-- modal keterlambatan -->
<div class="modal fade bd-example-modal-lg" id="modalTerlambat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keterlambatan Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table datatable-show-all">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Tahun Akademik</th>
                <th scope="col">Semester</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($presensi_harian as $preshar):?>
                    <?php if($preshar['jam_masuk']>= '07:15:00'){?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $preshar['tahun_akademik']?></td>
                            <td><?= $preshar['semester']?></td>
                            <td><?= $preshar['tanggal']?></td>
                            <td><?= $preshar['jam_masuk']?></td>
                        </tr>
                    <?php }?>
                <?php endforeach?>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- end of modal keterlambatan -->

<!-- modal kelebihan jam -->
<div class="modal fade bd-example-modal-lg" id="modalLebih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kelebihan Jam Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table datatable-show-all">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Tahun Akademik</th>
                <th scope="col">Semester</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($presensi_harian as $preshar):?>
                    <?php if($preshar['jam_pulang']>= '16:00:00'){?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $preshar['tahun_akademik']?></td>
                            <td><?= $preshar['semester']?></td>
                            <td><?= $preshar['tanggal']?></td>
                            <td><?= $preshar['jam_pulang']?></td>
                        </tr>
                    <?php }?>
                <?php endforeach?>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- end of modal kelebihan jam -->

<!-- modal tidakHadir -->
<div class="modal fade bd-example-modal-lg" id="modalTidak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar ijin Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table datatable-show-all">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tgl Ijin</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($getDefaultIjin as $dfIjin):?>
            <?php if($dfIjin['id_guru']==$id){?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?= $dfIjin['tanggal_pengajuan']?></td>
                    <td><?= $dfIjin['perihal_ijin']?></td>
                    <td><a href="<?=base_url('guru/findFile')?>/<?= $dfIjin['id_ijin']?>" class="ml-2 "><i class="fa fa-download"></i> </a></td>
                </tr>
            <?php }?>
            <?php endforeach?>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- end of modal kelebihan jam -->

<script>
<?php if(count($presensi_harian)>0){ ?>
var chartTrackHarian = document.getElementById('chartTrackHarian').getContext('2d');
var chartTrackHarian_graph = new Chart(chartTrackHarian, {
    type: 'line',
    data: {
        labels: ['2018 / 2019 - Ganjil', '2018 / 2019 - Genap', '2019 / 2020 - Ganjil', '2019 / 2020 - Genap'],
        datasets: [{
            label: 'Jumlah Jam Kerja',
            data: [88, 88, 86, 89],
            borderColor: [
                '#004F2D'
               
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
                    beginAtZero: false
                }
            }]
        }
    }
});
<?php }?>
var chartTrackMengajar = document.getElementById('chartTrackMengajar').getContext('2d');
var chartTrackMengajar_graph = new Chart(chartTrackMengajar, {
    type: 'line',
    data: {
        labels: ['2018 / 2019 - Ganjil', '2018 / 2019 - Genap', '2019 / 2020 - Ganjil', '2019 / 2020 - Genap'],
        datasets: [{
            label: 'Jumlah Jam Mengajar',
            data: [88, 88, 86, 89],
            borderColor: [
                '#1B4079'
               
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
                    beginAtZero: false
                }
            }]
        }
    }
});

var chartTrackKepuasan = document.getElementById('chartTrackKepuasan').getContext('2d');
var chartTrackKepuasan_graph = new Chart(chartTrackKepuasan, {
    type: 'line',
    data: {
        labels: ['2018 / 2019 - Ganjil', '2018 / 2019 - Genap', '2019 / 2020 - Ganjil', '2019 / 2020 - Genap'],
        datasets: [{
            label: 'Nilai Survei',
            data: [88, 88, 86, 89],
            borderColor: [
                '#EA9010'
               
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
                    beginAtZero: false
                }
            }]
        }
    }
});
</script>