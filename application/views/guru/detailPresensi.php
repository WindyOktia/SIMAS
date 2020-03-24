<div class="card">
    <div class="card-body">
        <legend>INFORMASI</legend>
        <div class="row">
            <div class="col-3">
                <p>Nama Guru</p>
            </div>
            <div class="col">
                <p>: Handi</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>NIP</p>
            </div>
            <div class="col">
                <p>: 111</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>Total Kelas Ampuan</p>
            </div>
            <div class="col">
                <p>: 3 Kelas</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>Total Sesi Mengajar</p>
            </div>
            <div class="col">
                <p>: 9 Sesi</p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>Total Absensi</p>
            </div>
            <div class="col">
                <p>: 24 Hari </p>
            </div>
        </div>
        <br>
        <form action="" id="filter" method="get">
        <div class="row">
            <div class="col-3"><b>Tahun</b></div>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="2019">
            <label class="form-check-label" for="2019">2019</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="2017">
            <label class="form-check-label" for="2017">2017</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="2016">
            <label class="form-check-label" for="2016">2016</label>
        </div>
    
        <div class="row mt-2">
            <div class="col-3"><b>Bulan</b></div>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['1']) && $_GET['1'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="1" value="true" onclick="" id="Januari">
            <label class="form-check-label" for="Januari">Januari</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['2']) && $_GET['2'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="2" value="true" id="Februari">
            <label class="form-check-label" for="Februari">Februari</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['3']) && $_GET['3'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="3" value="true" id="Maret">
            <label class="form-check-label" for="Maret">Maret</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['4']) && $_GET['4'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="4" value="true" id="April">
            <label class="form-check-label" for="April">April</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['5']) && $_GET['5'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="5" value="true" id="Mei">
            <label class="form-check-label" for="Mei">Mei</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['6']) && $_GET['6'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="6" value="true" id="Juni">
            <label class="form-check-label" for="Juni">Juni</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['7']) && $_GET['7'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="7" value="true" id="Juli">
            <label class="form-check-label" for="Juli">Juli</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['8']) && $_GET['8'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="8" value="true" id="Agustus">
            <label class="form-check-label" for="Agustus">Agustus</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['9']) && $_GET['9'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="9" value="true" id="September">
            <label class="form-check-label" for="September">September</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['10']) && $_GET['10'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="10" value="true" id="Oktober">
            <label class="form-check-label" for="Oktober">Oktober</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" <?= isset($_GET['11']) && $_GET['11'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="11" value="true" id="November">
            <label class="form-check-label" for="November">November</label>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input type="checkbox" <?= isset($_GET['12']) && $_GET['12'] == 'true' ? 'checked=""' : '' ?> class="form-check-input cek" name="12" value="true" id="Desember">
            <label class="form-check-label" for="Desember">Desember</label>
        </div>
        </form>

        <table class="table datatable-show-all mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Harian</th>
                    <th>Mengajar</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2019</td>
                    <td>Maret</td>
                    <td>OK</td>
                    <td>OK</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <legend>Presensi Harian</legend>
                <canvas id="myChart" width="400" height="400"></canvas>
                <!-- <a href="" class="btn btn-primary float-right mt-3">Lihat Distribusi</a> -->
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <legend>Kehadiran Mengajar</legend>
                <canvas id="myChart2" width="400" height="400"></canvas>
                <!-- <a href="" class="btn btn-primary float-right mt-3">Lihat Distribusi</a> -->
            </div>
        </div>
    </div>
</div>