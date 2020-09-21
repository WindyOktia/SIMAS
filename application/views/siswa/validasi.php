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
            <div class="col-md-5">
                <div class="card card-body border-secondary">    
                <h2>Verifikasi data diri siswa</h2>
                <br>
                    <form action="" method="post">
                        <div class="form-group col-6">
                            <label for="">NIPD</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Pilih Nama Ibu</label> <br>
                            <select name="" id="" class="pilih" required>
                                <option value="" selected disabled>- Pilih Data -</option>
                                <?php foreach($siswa as $sis):?>
                                <option value=""><?=$sis['nama_ibu']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        
                        <button class="btn btn-warning float-right mt-3">Verifikasi Data</button>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-body border-info">
                    <h3>Hasil Verifikasi</h3>
                    <ul>
                        <li>NIPD</li>
                        <li>Nama Siswa</li>
                        <li>Kelas</li>
                        <li>Nama Ibu</li>
                    </ul>
                   <div class="row">
                        <div class="col">
                            <a href="<?=base_url('siswa/survei')?>" class="btn btn-success float-right">Lanjutkan E - survei</a>
                        </div>
                   </div>
                </div>
            </div>
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