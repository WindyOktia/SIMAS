<script>
    function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
    }
</script>

<div class="card card-body">
    <h4><i class="fa fa-plus-circle mr-2" style="color:green"></i>Presensi Manual Mengajar</h4>
    <br>
    <h6><i class="fa fa-info-circle mr-2"></i><b>Informasi</b></h6>
    <h6>
        <ul>
            <li>Presensi mengajar secara manual melalui portal web hanya dapat dilakukan maksimal 10 kali dalam 1 semester, 
                lebih dari itu maka akan dianggap tidak masuk mengajar </li>
            <li>Anda sudah melakukan presensi mengajar secara manual sebanyak <b>0</b> kali dalam semester ini</li>
            <li>Apabila kartu RFID hilang / rusak segera hubungi waka kurikulum.</li>
        </ul>
    </h6>
<?= json_encode($dataMengajar)?>
    <form action="" class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Tanggal Presensi</label>
                    <h6 class="ml-3"><b><?php echo date('Y-m-d')?></b></h6>
                </div>
                <div class="form-group ">
                    <label for="">Waktu Server</label>
                    <h6 class="ml-3"><b class="text-danger"><div id="txt"></div></b></h6>
                </div>
                <?php if($dataMengajar!=null){?>
                <div class="form-group ">
                    <label for="">Jadwal Mengajar Saat Ini</label>
                    <h6 class="ml-3"><b class="text-danger">
                        Bahasa Indonesia - XI IPS 1 | 08.30 - 11.00
                    </b></h6>
                </div>
                <?php }else{?>
                    Tidak ada jadwal mengajar
                <?php } ?>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Alasan Input Presensi Manual</label>
                    <textarea name="alasan" id="" cols="30" rows="8" class="form-control border-info"></textarea>
                </div>
                <button class="btn btn-success float-right" type="submit">Simpan Presensi</button>
            </div>
        </div>
    </form>
  
</div>
<body onload="startTime()">

<div class="card card-body">
    <h6><i class="fa fa-history mr-2"></i>Riwayat Presensi Manual</h6>
    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Datang</th>
                <th>Jam Pulang</th>
                <th style="width:30%">Alasan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
</div>

