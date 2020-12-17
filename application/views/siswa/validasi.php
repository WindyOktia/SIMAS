<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   
    <title>E-survei Bosa</title>
  </head>
  <body>
    
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E- survei SMA Bosa</a>
    </nav>

   <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body border-secondary">    
                <h2>Verifikasi data diri siswa</h2>
                <br>
                    <form action="" method="get">
                        <div class="form-group ">
                            <label for="">NIPD</label>
                            <input type="number" name="nipd" value="<?php if(isset($_GET['nipd'])){echo $_GET['nipd'];};?>" class="form-control col-12" required>
                        </div>
                        <div class="form-group ">
                            <label for="">Nama Panggilan Ibu</label> <br>
                            <input type="password" name="ibu" value="<?php if(isset($_GET['ibu'])){echo $_GET['ibu'];};?>" class="form-control col-12" required>
                        </div>
                        <button type="submit" class="btn btn-warning float-right mt-3">Verifikasi Data</button>
                        <a href="<?=base_url('siswa/logoutSurvei')?>" class="btn btn-light float-right mt-3 mr-2">Reset</a>
                    </form>
                </div>
            </div>
            <?php if(isset($_GET['nipd'])&& isset($_GET['ibu'])){?>
            <?php if(count($dataSiswa)>0){?>
            <?php foreach($dataSiswa as $valid):?>
            <div class="col-md-7">
                <div class="card card-body border-info">
                    <h3>Hasil Verifikasi</h3>
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-md-3">NIPD</div>
                                <div class="col">: <?=$valid['nipd']?></div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3">Nama Siswa</div>
                                <div class="col">: <?=$valid['nama_siswa']?></div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="row">
                                <div class="col-md-3">Kelas</div>
                                <div class="col">: <?=$valid['kelas']?> <?=$valid['jurusan']?> <?=$valid['sub']?></div>
                            </div>
                        </li>
                    </ul>
                   <div class="row">
                        <div class="col">
                            <a href="<?=base_url('siswa/survei')?>" class="btn btn-success float-right">Lanjutkan E - survei</a>
                        </div>
                   </div>
                </div>
            </div>
            <?php endforeach?>
            <?php }else{?>
                <div class="col-md-7">
                    <div class="card card-body border-warning">
                        <h4>Data siswa tidak ditemukan</h4>
                    </div>
                </div>
            <?php };?>
            <?php };?>
        </div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.pilih').select2();

        });
           
        
    </script>
  </body>
</html>