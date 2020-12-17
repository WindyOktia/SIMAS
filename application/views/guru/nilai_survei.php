<!-- Button trigger modal -->
<?php $hitungSurvei=0; foreach($surveiID as $key):?>
    <?php foreach($akademik as $keyAkad):?>
        <?php if($key['tahun_akademik']==$keyAkad['tahun_akademik']){?>
            <?php if($key['semester']==$keyAkad['semester']){?>
                <?php $hitungSurvei++?>
            <?php } ;?>
        <?php } ;?>
    <?php endforeach?>
<?php endforeach?>

<button type="button" class="btn btn-primary btn-sm mb-3 " <?php if($hitungSurvei>=1){echo 'disabled';};?> data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-bars mr-2"></i>Kelola Pertanyaan Survei Guru
</button>

<a href="" class="btn btn-secondary btn-sm mb-3 ml-2"><i class="fa fa-history mr-2"></i>Lihat Riwayat Survei</a>



<div class="card card-body">
    <h6><i class="fa fa-info-circle mr-2"></i><b>Informasi e-survei guru</b></h6>
    <h6>
        <ul>
            <li>Hanya guru yang memiliki jadwal mengajar yang akan ditampilkan</li>
            <li>Responden dalam survei guru adalah siswa</li>
            <li>Hanya siswa yang diampu oleh tiap-tiap guru yang dapat memberi nilai</li>
        </ul>
    </h6>
    <h4><i class="fa fa-plus-circle mr-2" style="color:green"></i>
        Buat Survei Guru | Tahun Akademik
        <?php foreach($akademik as $ak):?>
            <b><?= $ak['tahun_akademik']?></b> semester  <b><?= $ak['semester']?></b>
        <?php endforeach?>
    </h4>
    <form action="<?=base_url('survei/addSurveiGuru')?>" method="post">
        <div class="form-group">
            <?php foreach($akademik as $akad):?>
                <input type="hidden" name="tahun_akademik" value="<?=$akad['tahun_akademik']?>">
                <input type="hidden" name="semester" value="<?=$akad['semester']?>">
            <?php endforeach?>

            <label for="">1. Pilih Guru</label>
            <select class="js-example-basic-multiple form-control" name="id_guru[]" multiple="multiple">
                <?php foreach($guru as $gr):?>
                <option value="<?=$gr['id_guru']?>" selected><?=$gr['nama_guru']?></option>
                <?php endforeach?>
            </select>
        </div>
        <div class="form-group">
            <label for="">2. Pilih Pertanyaan</label>
            <select class="js-example-basic-multiple form-control" name="pertanyaan[]" multiple="multiple">
                <?php foreach($pertanyaan as $tanyas):?>
                    <option value="<?=$tanyas['id_soal_survei_guru']?>" selected><?=$tanyas['pertanyaan']?></option>\
                <?php endforeach?>
            </select>
        </div>
        
        <b>Durasi Kuesioner</b>
        
        <div class="row mt-1">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tanggal Mulai </label>
                    <input type="date" name="tgl_mulai" class="form-control" value="<?=date('Y-m-d')?>" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Tanggal Selesai </label>
                    <input type="date" name="tgl_selesai" class="form-control" value="" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-success float-right"><i class="fa fa-paper-plane-o mr-2"></i> Generate e-survei</button>
    </form>
</div>

<div class="card card-body">
    <div class="row">
        <div class="col">
            <h6><b>Daftar Guru Disurvei</b></h6>
        </div>
        <?php foreach($surveiID as $delsur):?>
            <?php if($delsur['tahun_akademik']==$akad['tahun_akademik']){?>
                <?php if($delsur['semester']==$akad['semester']){?>

                    <div class="col">
                        <a href="<?=base_url('survei/deleteSurveiGuru')?>/<?=$delsur['id_survei_guru']?>" class="btn btn-sm btn-danger float-right mb-2 tombol-hapus">Batalkan Survei</a>
                    </div>
                <?php } ;?>
            <?php } ;?>
        <?php endforeach?>
    </div>
    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($survei as $surv):?>
                <?php if($surv['tahun_akademik']==$akad['tahun_akademik']){?>
                    <?php if($surv['semester']==$akad['semester']){?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$surv['nama_guru']?></td>
                            <td>
                                <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalNilai">
                                    Lihat Nilai
                                </button> -->
                                <a href="<?=base_url('admin/detailPresensi')?>/<?=$surv['id_guru']?>" class="btn btn-info">Laporan Nilai</a>
                            
                            </td>
                        </tr>
                    <?php } ;?>
                <?php } ;?>
            <?php endforeach?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
      
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kelola Pertanyaan Survei Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="<?=base_url('survei/addPertanyaan')?>" method="post">
                <div class="form-group">
                    <label for="">Input Pertanyaan</label>
                    <input type="text" name="pertanyaan" class="form-control border-info" autocomplete="off" required>
                </div>
                Note: Setiap pertanyaan akan memiliki 4 opsi jawaban ( <b>Sangat Baik, Baik, Cukup, Kurang</b> )
                <h6 class="mt-3"><i class="fa fa-history mr-2"></i>Daftar Pertanyaan</h6>
                <table class="table datatable-show-all">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($pertanyaan as $tanya):?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$tanya['pertanyaan']?></td>
                            <td>
                                <a href="<?=base_url('survei/hapusPertanyaan')?>/<?=$tanya['id_soal_survei_guru']?>" class="btn btn-danger btn-sm"><i class="	fa fa-close"></i></a>
                            </td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Nilai Angka</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Masukan Siswa</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h4>Nilai Survei</h4>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <h4>Masukan Siswa</h4> 
                <table class="table datatable-show-all">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tgl</th>
                            <th scope="col">Masukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
