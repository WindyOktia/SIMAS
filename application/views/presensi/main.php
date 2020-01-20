<div class="row">
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
</div>