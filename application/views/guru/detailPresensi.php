<a href="<?=base_url('admin/daftarPresensi')?>" class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-arrow-circle-left"></i> Kembali</a>
<!-- <a href="<?=base_url('admin/rekapKehadiran')?>/<?=$id?>" class="btn btn-primary float-right btn-sm">Lihat Data Kehadiran <i class="ml-2 fa fa-arrow-circle-right"></i> </a> -->
<!-- <h5><b>Filter Data Presensi</b></h5> -->

<div class="mt-3">
<?php foreach($dataGuru as $dt):?>
<h6> <i class="	fa fa-user mr-2"></i><b><?=$dt['nama_guru']?></b> ( <?=$dt['nip']?> ) : Rekapitulasi Presensi  </h6>
<?php endforeach?>
</div>
<div class="card card-body border-warning mt-2">
    <form action="" id="filterRentang" method="get">
        <div class="form-group my-auto">
            <label for=""><b>Filter Tahun Akademik</b></label>
            <!-- <div class="form-check form-check-switchery">
                <label class="form-check-label">
                    <input type="checkbox" name="rentang" id="useRentang" class="form-check-input-switchery" data-fouc 
                    <?php if(isset($_GET['rentang'])&&$_GET['rentang']=='on'){echo 'checked';};?>
                    >
                    Rentang Tahun
                </label>
            </div> -->
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

<div class="row mt-3">
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Jumlah Kehadiran</h5>
            <h3 class="text-center"><b>56 </b> hari</h3>
            <a href="" class="btn btn-sm btn-info btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Keterlambatan</h5>
            <h3 class="text-center"><b>1 </b> x</h3>
            <a href="" class="btn btn-sm btn-info btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Kelebihan Jam</h5>
            <h3 class="text-center"><b>0 </b> x</h3>
            <a href="" class="btn btn-sm btn-info btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-danger">
            <h5 class="text-center">Tidak Hadir</h5>
            <h3 class="text-center"><b>8 </b> x</h3>
            <a href="" class="btn btn-sm btn-danger btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Nilai Survei</h5>
            <h3 class="text-center"><b>8 </b> x</h3>
            <a href="" class="btn btn-sm btn-success btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col md-12">
        <div class="card card-body border-primary">

<?php if(count($jamhadir)>0){?>
<?php
    $times = array();
    
    foreach($jamhadir as $rt)
    {
        $inputTime = $rt['rata_rata_jam_hadir_guru'];
        $dates = strtotime($inputTime);
        $times[] = date('h:i',$dates);
    };

    $total_minutes = 0;
    foreach ($times as $time) {
        list($hours, $minutes) = explode(':', $time);
        $total_minutes += $hours * 60 + $minutes;
    }

    $average_minutes = $total_minutes / count($times);
    $average_hours = floor($average_minutes / 60);
    $average_minutes = $average_minutes % 60;

    $jamHadirs = str_pad($average_hours, 2, 0, STR_PAD_LEFT) . ":" . str_pad($average_minutes, 2, 0, STR_PAD_LEFT) . " AM \n";
    
    //echo "Average time is " . str_pad($average_hours, 2, 0, STR_PAD_LEFT) . ":" . str_pad($average_minutes, 2, 0, STR_PAD_LEFT) . "\n";
   
?>
<?php
    $kerja = array();
    
    foreach($jamkerja as $kr)
    {
        $inputTimes = $kr['average_time'];
        $conKerja = strtotime($inputTimes);
        $kerja[] = date('h:i',$conKerja);
    };

    $tot_minutes = 0;
    foreach ($kerja as $wktu) {
        list($hourz, $minutez) = explode(':', $wktu);
        $tot_minutes += $hourz * 60 + $minutez;
    }

    $av_mins = $tot_minutes / count($kerja);
    $jamKerja = round($av_mins / 60, 2) . " jam\n"
    //$av_hours = floor($av_mins / 60);
    //$av_mins = $av_mins % 60;

    
    //echo "Average time is " . str_pad($average_hours, 2, 0, STR_PAD_LEFT) . ":" . str_pad($average_minutes, 2, 0, STR_PAD_LEFT) . "\n";
   
?>

            <h5><b>Kehadiran Harian  </b>
                <span class="float-right">
                    <!-- <a type="button"data-toggle="modal" data-target="#modalHarian">
                        <i class="fa fa-info-circle"></i> Unduh data
                    </a> -->
                    <a href="" class="btn btn-success btn-sm">Unduh data presensi harian</a>
                </span>
            </h5>
            <div class="row">
                <div class="col">
                    <label for=""> Rata-rata jam masuk guru</label>
                    <h2 class=""><b> <?= $jamHadirs?></b></h2>
                   
                </div>
                <div class="col border-left">
                    <label for="">Rata-rata jam kerja</label>
                    <h2 class=""><b><?= $jamKerja?></b></h2>
                </div>
            </div>
        </div>
    </div>
<?php }else{?>
    <div class="card card-body border-danger">
    Presensi belum memenuhi standar perhitungan
    </div>
<?php } ?>

    <div class="col-md-12">
        <div class="card card-body border-primary">
            <h6><b>Resume Mengajar</b>
                <span class="float-right">
                    <!-- <a type="button"data-toggle="modal" data-target="#modalMengajar">
                        <i class="fa fa-info-circle"></i>
                    </a> -->
                    <a href="" class="btn btn-success btn-sm">Unduh data presensi mengajar</a>
                </span>
            </h6>
            <div class="row">
                <div class="col">
                    <label for="">Beban mengajar</label>
                    <h2 class=""><b>3 Mata pelajaran</b></h2>
                </div>
                <div class="col border-left">
                    <label for="">Rata-rata durasi mengajar</label>
                    <h2 class=""><b>2 jam</b></h2>
                </div>
            </div>
            <!-- <h2 class="text-center"><b>70</b></h2> -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-body border-primary">
            <h5><b>Rata-Rata Nilai Survei Guru</b>
                <span class="float-right">
                    <!-- <a type="button"data-toggle="modal" data-target="#modalSurvei">
                        <i class="fa fa-info-circle"></i>
                    </a>
                    <a type="button"data-toggle="modal" data-target="#modalRekap">
                        <i class="fa fa-plus-circle"></i>
                    </a> -->
                    <a href="" class="btn btn-success btn-sm">Unduh laporan nilai survei</a>
                </span>
            </h5>
            <h2 class="text-center"><b>80</b></h2>
        </div>
    </div>
</div>

<h6> <i class="	fa fa-clock-o mr-2"></i>Grafik perubahan nilai dalam 2 tahun terakhir </h6>

<div class="card card-body ">
<canvas id="chartTrack"  height="350"></canvas>
</div>





<!-- modal -->

<div class="modal fade" id="modalHarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Nilai Kehadiran Harian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5><b>Umum</b></h5>
        <p>Nilai kehadiran harian diambil berdasarkan total hari terpenuhi dari target jumlah hari dalam satu semester</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalMengajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Nilai Kehadiran Mengajar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5><b>Umum</b></h5>
        <p>Nilai kehadiran harian mengajar diambil berdasarkan total jadwal mengajar terpenuhi dari target jumlah mengajar dalam satu semester</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSurvei" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Nilai Survei</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5><b>Umum</b></h5>
        <p>Nilai Survei diambil diambil dari proses pelaksanaan survei guru yang diisi oleh siswa. </p>
        <p><span class="badge badge-danger">Data Belum Lengkap</span></p>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tahun Akademik</th>
            <th scope="col">Semester</th>
            <th scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>2019</td>
                <td>Ganjil</td>
                <td>7</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
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

<div class="modal fade" id="modalRekap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Nilai Survei</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5><b>Rekap Nilai Survei</b></h5>
        <p>Cek nilai survei yang masih belum terisi. </p>
        <div class="form-group my-auto">
            <!-- <label for="">Filter Tahun Akademik</label> -->
            <div class="row">
                <div class="col-md-4">
                <label for="">Tahun Akademik</label>
                    <select name="dari" id="" class="form-control">
                        <option value="2016/2017">2016/2017</option>
                        <option value="2017/2018">2017/2018</option>
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                        <option value="2020/2021">2020/2021</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group my-auto">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control" required>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group my-auto">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nilai</label>
                        <input name="lb_laporan" type="text" class="form-control" required>
                </div>
            </div><br>
                <button type="button" class="btn btn-success" data-dismiss="modal">Tambah</button>
        </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script>
var chartTrack = document.getElementById('chartTrack').getContext('2d');
var chartTrack_graph = new Chart(chartTrack, {
    type: 'line',
    data: {
        labels: ['2018 / 2019 - Ganjil', '2018 / 2019 - Genap', '2019 / 2020 - Ganjil', '2019 / 2020 - Genap'],
        datasets: [{
            label: 'Kepuasan Siswa',
            data: [86, 88, 86, 89],
            borderColor: [
                '#3A3042'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Kehadiran Harian',
            data: [90, 90, 88, 95],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Kehadiran Mengajar',
            data: [86, 90, 92, 85],
            borderColor: [
                '#20A39E'
               
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