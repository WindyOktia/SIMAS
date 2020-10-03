<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>E - survei Bosa</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E- survei Bosa</a>
    </nav>

    <div class="container mt-5">
        <div class="card card-body border-info">
        <h4>Informasi Survei Guru</h4>
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
            <h5>Pilih Guru</h5>
            <?php foreach($namaKelas as $nm):?>
                <p>daftar guru mengajar di kelas <?=$nm['kelas']?> <?=$nm['jurusan']?> <?=$nm['sub']?></p>
            <?php endforeach?>
        
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($daftarGuru as $daf):?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $daf['nama_guru']?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            Isi Survei
                            </button>
                        </td>
                    </tr>
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
    </div>

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Survei Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                <?php $i = 1; foreach ($pertanyaan as $soal) { ?>
                <label for="soal"><?= $i ?>. <?= $soal['pertanyaan']; ?></label>
                <div class="position-relative form-group ml-3">
                    <div class="form-row ml-3">
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio1<?=$i?>" name="opsi[<?=$i?>]" value="4" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio1<?=$i?>">Sangat Baik</label>
                        </div>
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio2<?=$i?>" name="opsi[<?=$i?>]" value="3" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio2<?=$i?>">Baik</label>
                        </div>
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio3<?=$i?>" name="opsi[<?=$i?>]" value="2" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio3<?=$i?>">Cukup</label>
                        </div>
                        <div class="custom-radio custom-control col-md-3">
                            <input type="radio" id="exampleCustomRadio4<?=$i?>" name="opsi[<?=$i?>]" value="1" class="custom-control-input" required>
                            <label class="custom-control-label ml-3" for="exampleCustomRadio4<?=$i?>">Kurang</label>
                        </div>
                    </div>
                </div>
        <?php $i++;} ?>

                    <div class="form-group mt-5">
                        <label for="">Masukan Untuk Guru</label>
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Kirim Jawaban</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>