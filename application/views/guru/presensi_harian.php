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
    <h4><i class="fa fa-plus-circle mr-2" style="color:green"></i>Presensi Manual Harian</h4>
    <br>
    <h6><i class="fa fa-info-circle mr-2"></i><b>Informasi</b></h6>
    <h6>
        <ul>
            <li>Presensi harian secara manual melalui portal web hanya dapat dilakukan maksimal 5 kali dalam 1 semester, 
                lebih dari itu maka akan dianggap tidak masuk </li>
            <li>Anda sudah melakukan presensi harian secara manual sebanyak <b>0</b> kali dalam semester ini</li>
            <li>Apabila kartu RFID hilang / rusak segera hubungi waka kurikulum.</li>
        </ul>
    </h6>
  
    <form action="<?=base_url('guru/manualHarian')?>" method="POST" class="mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group ">
                    <label for="">Tanggal Presensi</label>
                    <h6 class="ml-3"><b><?php echo date('Y-m-d')?></b></h6>
                </div>
                <div class="form-group ">
                    <label for="">Waktu Server</label>
                    <h6 class="ml-3"><b class="text-danger"><div id="txt"></div></b></h6>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Alasan Input Presensi Manual</label>
                    <?php foreach($id_guru as $id):?>
                    <input type="hidden" name="id_guru" value="<?=$id['id_guru']?>">
                    <?php endforeach?>
                    <textarea name="alasan" id="" cols="30" rows="4" class="form-control border-info"></textarea>
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
                <th>Metode</th>
                <th style="width:30%">Alasan</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1 ;foreach($dataPresensi as $dtP):?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$dtP['tanggal']?></td>
                <td><?=$dtP['jam_masuk']?></td>
                <td><?=$dtP['jam_pulang']?></td>
                <td><?=$dtP['metode']?></td>
                <td><?=$dtP['keterangan']?></td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>

