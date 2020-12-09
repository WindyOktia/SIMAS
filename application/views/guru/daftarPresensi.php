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
                   <a href="<?=base_url('admin/daftarPresensi')?>" class="btn btn-danger btn-block">Hapus Filter</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php if(isset($_GET['dari'])||isset($_GET['sampai'])||isset($_GET['semester'])){?>
    <h6> <i class="	fa fa-clock-o mr-2"></i>Nilai rata-rata guru dari tahun akademik <b><?=$_GET['dari']?></b> 

    <?php if(isset($_GET['sampai'])){?>
        sampai <b><?=$_GET['sampai']?></b> 
    <?php } ; ?>
<?php } else { ?>
    <h6> <i class="	fa fa-clock-o mr-2"></i>Nilai rata-rata guru dalam 2 tahun terakhir </h6>
<?php } ;?>

<div class="row mt-2">
    <div class="col">
        <div class="card card-body border-success">
            <h6 class="text-center">Kehadiran</h6>
            <?php foreach($getDefaultTotalKehadiran as $hdr):?>
            <h3 class="text-center"><b><?= (int)$hdr['rata_rata_presensi']?></b> hari 
            <?php endforeach ?>
            <!-- <span class="text-success">( 80 % )</span> -->

            </h3>

            <a href="<?= base_url('admin/unduhSemuaPresensi')?>" class="btn btn-sm btn-success btn-block">Unduh Data Presensi <i class="fa fa-download ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h6 class="text-center">Keterlambatan</h6>
            <?php foreach($getDefatultKeterlambatan as $tlb):?>
            <h3 class="text-center"><b><?= (int)$tlb['rata_rata_terlambat']?> </b> x</h3>
            <?php endforeach ?>
            <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#modalTerlambat">
                Lihat Detail <i class="	fa fa-eye ml-2"></i>
            </button>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h6 class="text-center">Kelebihan jam</h6>
            <?php foreach($getDefaultLebih as $lbh):?>
            <h3 class="text-center"><b><?= (int)$lbh['rata_rata_lebih']?> </b> x</h3>
            <?php endforeach?>
            <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#modalLebih">
                Lihat Detail <i class="	fa fa-eye ml-2"></i>
            </button>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h6 class="text-center">Tidak Hadir</h6>
            <?php foreach($getDefaultCountIjin as $ij):?>
            <h3 class="text-center"><b><?=$ij['jml_ijin']?> </b> x</h3>
            <?php endforeach?>
            <button type="button" class="btn btn-sm btn-info btn-block" data-toggle="modal" data-target="#modalAbsen">
                Lihat Detail <i class="	fa fa-eye ml-2"></i>
            </button>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success ">
            <h6 class="text-center">Nilai survei</h6>
            <?php if(count($getDefaultNilaiSurvei)>0){?>
            <?php 
                $arrMax = array();
                $arrPerolehan = array();
                foreach($getDefaultNilaiSurvei as $dfNilai)
                {
                    $arrMax[] += $dfNilai['nilai_max'];
                    $arrPerolehan[] += $dfNilai['nilai_diperoleh'];
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

<h6> <i class="	fa fa-clock-o mr-2"></i>Grafik perubahan nilai dalam 2 tahun terakhir </h6>

<div class="card card-body ">
<canvas id="chartTrack"  height="350"></canvas>
</div>


<div class="card">
    <div class="card-body">
        <legend>Daftar Guru</legend>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>NIP</th>
					<th style="width:30%">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;foreach($guru as $guru):?>
				<tr>
					<td><?= $i++?></td>
					<td><b><?= $guru['nama_guru']?></b></td>
					<td><?= $guru['nip']?></td>
					<td>
						<a href="<?= base_url('admin/detailPresensi')?>/<?=$guru['id_guru']?>"class="btn btn-success btn-sm mb-1">Lihat Detail Laporan</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>



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
                <th scope="col">Nama Guru</th>
                <th scope="col">Status Guru</th>
                <th scope="col">Jam Hadir</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($getDefaultDataTerlambat as $dtTerlambat):?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=$dtTerlambat['tahun_akademik']?></td>
                    <td><?=$dtTerlambat['semester']?></td>
                    <td><?=$dtTerlambat['tanggal']?></td>
                    <td><?=$dtTerlambat['nama_guru']?></td>
                    <td>
                        <?php
                            if($dtTerlambat['status_guru']==1){
                                echo "PNS";
                            }
                            if($dtTerlambat['status_guru']==2){
                                echo "GTT";
                            }
                            if($dtTerlambat['status_guru']==3){
                                echo "GTY";
                            }
                        ?>
                    </td>
                    <td><?=$dtTerlambat['jam_masuk']?></td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalLebih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kelebihan Jam Kerja</h5>
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
                <th scope="col">Nama Guru</th>
                <th scope="col">Status Guru</th>
                <th scope="col">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($getDefaultDataLewat as $dtLewat):?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=$dtLewat['tahun_akademik']?></td>
                    <td><?=$dtLewat['semester']?></td>
                    <td><?=$dtLewat['tanggal']?></td>
                    <td><?=$dtLewat['nama_guru']?></td>
                    <td>
                        <?php
                            if($dtLewat['status_guru']==1){
                                echo "PNS";
                            }
                            if($dtLewat['status_guru']==2){
                                echo "GTT";
                            }
                            if($dtLewat['status_guru']==3){
                                echo "GTY";
                            }
                        ?>
                    </td>
                    <td><?=$dtLewat['jam_pulang']?></td>
                </tr>
            <?php endforeach?>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ketidakhadiran Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table datatable-show-all">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Tgl Ijin</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($getDefaultIjin as $dfIjin):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$dfIjin['nama_guru']?></td>
                    <td><?= $dfIjin['tanggal_pengajuan']?></td>
                    <td><?= $dfIjin['perihal_ijin']?></td>
                    <td><a href="<?=base_url('guru/findFile')?>/<?= $dfIjin['id_ijin']?>" class="ml-2 "><i class="fa fa-download"></i> </a></td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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