<!-- <div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('presensi/harian')?>" method="post" id="presensi">
                    <input type="text" name="id" class="rfid" autofocus required>
                    <button type="submit">tes</button>
                </form>
                <img src="<?= base_url('assets/images/tap.png')?>" alt="" srcset="" width="60%" class="mx-auto d-block">
                <p class="text-center text-warning" style="font-size:32px;">Tempelkan kartu presensi anda</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <legend>INFORMASI</legend>
                <ul>
                    <li class="border-bottom"><h4>Jika kartu presensi hilang / rusak silahkan akses<br> <b><i>http://localhost/SIMAS/presensi</i></b> <br>untuk melakukan presensi secara manual</h4></li>
                    <li class="border-bottom"><h4>Presensi manual hanya boleh dilakukan max 5x</h4></li>
                    <li class="border-bottom"><h4>Segera hubungi waka kurikulum apabila kartu presensi hilang / rusak</h4></li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
<style>
    input{
        caret-color:transparent;
        border:0;
        color:transparent;
        outline:none;
        background-color:transparent;
    }
</style>

<div class="container">
<form action="<?= base_url('presensi/harian')?>" method="post" id="presensi">
                    <input type="text" name="id" class="rfid" id="rfid" autocomplete="off" autofocus required>
                    <!-- <button type="submit">tes</button> -->
                </form> 
    <h1 class="text-white text-center" style="font-size:34px"><b>Selamat Datang di SMA Bopkri 1 Yogyakarta</b></h1>
    <h2 class="text-white text-center">Silahkan tempelkan kartu presensi anda</h2>
    <div class="card card-body">
   
        <h2><b>Informasi</b></h2>
        <ul>
            <li><h4>Jika kartu presensi hilang / rusak silahkan akses <b><i>http://localhost/SIMAS/presensi</i></b> untuk melakukan presensi secara manual</h4></li>
            <li><h4>Presensi manual hanya boleh dilakukan max 5x</h4></li>
            <li><h4>Segera hubungi waka kurikulum apabila kartu presensi hilang / rusak</h4></li>
        </ul>
        <h4>Lainnya</h4>
        <ul>
            <li><h4>[info lain]</h4></li>
        </ul>
                
    </div>
</div>
