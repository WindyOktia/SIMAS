<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>E - survei Bosa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E-survei Bosa</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link"><?= $this->session->userdata('nama_siswa');?></a>
            </li>
            <li class="nav-item active">
                <a href="<?= base_url('siswa/logoutSurvei')?>" class="nav-link btn btn-sm btn-danger ml-3">Logout <i class="fa fa-chevron-circle-right ml-2"></i></a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">
        <div class="">
        <h3>Informasi Survei</h3>
        <?php foreach($akademik as $akd):?>
        <ul>
            <li>
                <div class="row">
                    <div class="col-md-3">Tahun Akademik</div>
                    <div class="col">: <?= $akd['tahun_akademik']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-3">Semester</div>
                    <div class="col">: <?= $akd['semester']?></div>
                </div>
            </li>
        </ul>
        <?php endforeach?>
            <div class="card card-body mt-3">
                <h5>Survei Guru</h5>
                <?php foreach($namaKelas as $nm):?>
                    <p>Daftar guru mengajar di kelas <?=$nm['kelas']?> <?=$nm['jurusan']?> <?=$nm['sub']?></p>
                <?php endforeach?>
       
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $n=1; foreach($daftarGuru as $daf):?>
                            <?php 

                                $arrId = array();

                                foreach($transGuru as $tGuru){
                                    $arrId[] += $tGuru['id_guru'];
                                }
                                
                                if (in_array($daf['id_guru'], $arrId))
                                {?>


                                    <tr>
                                        <th scope="row"><?=$n++?></th>
                                        <td><?= $daf['nama_guru']?></td>
                                        <td id="stat<?=$daf['id_guru']?>"><span class="badge badge-danger">Belum Terisi</span></td>
                                        <td>
                                            <button type="button" id="btn<?=$daf['id_guru']?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?=$daf['id_guru']?>">
                                            Isi Survei
                                            </button>
                                        </td>
                                    </tr>

                               <?php } else {?>
                                   
                                   <div class="card card-body border-warning">
                                   <h6><b>Informasi</b></h6>
                                    <ul>
                                        <li>Tidak ada data guru untuk di survei</li>
                                    </ul>
                                   </div>
                                <?php } ?>
                            
                        <?php endforeach?>
                        </tbody>
                    </table>
                    <?php if(count($daftarGuru)==0){?>
                    <div class="text-center">
                    tidak ada data guru
                    </div>
                    <?php }?>
                </div>
            </div>

            <!-- daniel -->
            <div class="card card-body mt-3 mb-5">
                <h5>Survei Kegiatan</h5>
                <form action="" method="get">
                    <div class="form-group">
                        <label for="">Kode kegiatan</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input name="kode" type="text" class="form-control" value="<?php if(isset($_GET['kode'])){echo $_GET['kode'];};?>" required>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-info">Cari</button>
                                <a href="<?= base_url('siswa/survei')?>" class="btn btn-light">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if(isset($_GET['kode'])){?>
                <div class="table-responsive">
                <table style="width: 100%;" id="example"
                    class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($kuesionerkegiatan as $kuesioner) : ?>
                <tr>
                <td class="align-middle"><?= $i++ ?></td>
                    <td class="align-middle"><?= $kuesioner['nama_kegiatan']; ?></td>
                    <td class="align-middle"><?= $kuesioner['tgl_mulai']; ?></td>
                    <td class="align-middle"><?= $kuesioner['tgl_selesai']; ?></td>
                    <?php
						if($kuesioner['tgl_selesai'] < date("Y-m-d")){
                            echo '<td class="align-middle"><span class="align-middle badge badge-danger">Masa Aktif Kuesioner Habis</span></td>';
						} else {
							echo '<td class="align-middle"><a class="btn btn-info btn-sm" role="button" href="">Isi Kuesioner</a></td>';
						}
					?>
                </tr>
                <?php endforeach; ?>
            </table>
                </div>
                <?php } ?>

                <!-- daniel -->
            </div>
        </div>
    </div>

<?php foreach($daftarGuru as $formSurvei):?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?=$formSurvei['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Survei Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="return confirm('Data yang dikirim tidak dapat diubah lagi. Yakin untuk kirim data?');" action="<?= base_url('siswa/insertSurveiGuru')?>" method="post">
                <?php 
                    $arrIdSurvei = array();
                    foreach($transGuru as $subForm){
                        $arrIdSurvei[] += $subForm['id_survei_guru'];
                    }
                ?>
                <input type="hidden" name="id_survei_guru" class="form-control" value="<?=$arrIdSurvei[0]?>">
                <input type="hidden" name="id_siswa" class="form-control" value="<?= $this->session->userdata('id_siswa');?>">
                <input type="hidden" name="id_guru" class="form-control" value="<?= $formSurvei['id_guru']?>">

                <?php $i = 1; foreach ($pertanyaan as $soal) { ?>
                <label for="soal"><?= $i ?>. <?= $soal['pertanyaan']; ?></label>
                <input type="hidden" name="pertanyaan[]" value="<?= $soal['id_soal_survei_guru']; ?>"> 
                <div class="position-relative form-group ml-3">
                    <div class="form-row ml-3">
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio1<?=$i?><?=$formSurvei['id_guru']?>" name="opsi[<?=$i?>]" value="4" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio1<?=$i?><?=$formSurvei['id_guru']?>">Sangat Baik</label>
                        </div>
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio2<?=$i?><?=$formSurvei['id_guru']?>" name="opsi[<?=$i?>]" value="3" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio2<?=$i?><?=$formSurvei['id_guru']?>">Baik</label>
                        </div>
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio3<?=$i?><?=$formSurvei['id_guru']?>" name="opsi[<?=$i?>]" value="2" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio3<?=$i?><?=$formSurvei['id_guru']?>">Cukup</label>
                        </div>
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio4<?=$i?><?=$formSurvei['id_guru']?>" name="opsi[<?=$i?>]" value="1" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio4<?=$i?><?=$formSurvei['id_guru']?>">Kurang</label>
                        </div>
                    </div>
                </div>
        <?php $i++;} ?>

                    <div class="form-group mt-5">
                        <label for="">Masukan Untuk Guru</label>
                        <textarea name="masukan" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
            </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        <?php foreach($getActorSurvei as $act):?>
        <?php if($act['id_siswa']==$this->session->userdata('id_siswa')){?>
            $('#stat<?=$act['id_guru']?>').html('<span class="badge badge-success">Sudah Terisi</span>');
            $('#btn<?=$act['id_guru']?>').prop('disabled',true);

        <?php } ?>
        <?php endforeach?>

    </script>              
  </body>
</html>