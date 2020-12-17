<?php

$totalselisih = array();

foreach($jadwal as $slsh)
{
    $totalselisih[]= $slsh['selisih'];
}


function explode_time($time) { //explode time and convert into seconds
    $time = explode(':', $time);
    $time = $time[0] * 3600 + $time[1] * 60;
    return $time;
}

function second_to_hhmm($time) { //convert seconds to hh:mm
    $hour = floor($time / 3600);
    $minute = strval(floor(($time % 3600) / 60));
    if ($minute == 0) {
        $minute = "00";
    } else {
        $minute = $minute;
    }
    $time = $hour . "," . $minute;
    return $time;
}

$time = 0;
foreach ($totalselisih as $time_val) {
$time +=explode_time($time_val); // this fucntion will convert all hh:mm to seconds
}

// echo second_to_hhmm($time);

?>






<div class="card">
    <div class="card-body">
    <?php foreach($guru as $guru):?>
        <legend>
            <p>Nama Guru : <b><?= $guru['nama_guru']?></b> </p>
            <p>Total Jam Mengajar : <b><?=second_to_hhmm($time)?> jam</b>  </p>
        </legend>
        <form action="<?= base_url('admin/addJadwal')?>" method="post">
        <input type="hidden" value="<?= $guru['id_guru']?>" name="guru">
    <?php endforeach;?>

    <?php foreach($tahun_akademik as $tahun):?>
        <p><i><i class="fa fa-info-circle mr-2"></i></i> Tahun akademik yang sedang berjalan : <?= $tahun['tahun_akademik']?> - <?= $tahun['semester']?></p>
        <input type="hidden" name="tahun_akademik" value="<?=$tahun['tahun_akademik']?>">
        <input type="hidden" name="semester" value="<?=$tahun['semester']?>">
    <?php endforeach ?>
        <p><i class="fa fa-bars mr-2 mt-3"></i> Tambah Jadwal</p>
        <div class="input_fields_wrap">
            <div class="row">
                <div class="form-group col-md">
                <label for="">Pilih Hari</label>
                    <select class="form-control" onchange="cekData()" id="hari" name="hari" required>
                        <option selected disabled value="">- pilih -</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div> 
                <div class="form-group col-md">
                <label for="">Pilih Kelas</label>
                    <select id="selectKelas" class="form-control" onchange="cekData()" name="kelas" required>
                    <option selected disabled value="">- pilih -</option>
                        <?php foreach($kelas as $kelas):?>
                            <option value="<?= $kelas['id_kelas']?>"><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></option>
                        <?php endforeach;?>
                    </select>
                </div> 
                <div class="form-group col-md">
                <label for="">Pilih Mata Pelajaran</label>
                    <select id="selectMapel" class="form-control" onchange="cekData()" name="mapel" required>
                    <option selected disabled value="">- pilih -</option>
                        <?php foreach($mapel as $mapel):?>
                            <option value="<?= $mapel['id_mapel']?>"><?= $mapel['nama_mapel']?></option>
                        <?php endforeach;?>
                    </select>
                </div> 
                <div class="form-group col-md">
                <label for="">Jam Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" onchange="cekData()" placeholder="Jam Mulai" name="mulai" required>
                </div> 
                <div class="form-group col-md">
                <label for="">Jam Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" onchange="cekData()" placeholder="Jam Selesai" name="selesai" required>
                </div> 
            </div>
            <div id="jadwalResult">
                
            </div>
        </div>
        <button class="btn btn-primary btn-sm float-right" id="submitBtn" type="submit">Submit</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <legend>
            <?php foreach($tahun_akademik as $aka):?>
                <p><i><i class="fa fa-info-circle mr-2"></i></i>Jadwal mengajar untuk tahun akademik <b><?= $aka['tahun_akademik']?> </b> semester <b><?= $aka['semester']?></b></p>
            <?php endforeach ?>
        </legend>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Hari</th>
					<th>Kelas</th>
					<th>Mata Pelajaran</th>
					<th>Jam Mulai</th>
					<th>Jam Selesai</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($jadwal as $jdw):?>
				<tr>
					<td><?=$i++?></td>
					<td><?= $jdw['hari']?></td>
					<td><?= $jdw['kelas']?> <?= $jdw['jurusan']?> <?= $jdw['sub']?></td>
					<td><?= $jdw['nama_mapel']?></td>
					<td><?= $jdw['jam_mulai']?></td>
					<td><?= $jdw['jam_selesai']?></td>
					<td>
						<a href="<?= base_url('admin/deleteJadwal')?>/<?=$jdw['id_jadwal_guru']?>/<?=$jdw['id_guru']?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>





<script type="text/javascript">
    function cekData(){
        var hari = $('#hari').val();
        var kelas = $('#selectKelas').val();
        var mapel = $('#selectMapel').val();
        var jam_mulai = $('#jam_mulai').val();
        var jam_selesai = $('#jam_selesai').val();

        var diffTime=( new Date("1970-1-1 "+  jam_selesai ) - new Date("1970-1-1 "+ jam_mulai ))/1000/60;

        // console.log(diffTime);
        // if(diffTime<15){
        //     $('#jadwalResult').html('<span class="text-warning"><i>Minimal durasi mengajar adalah 15 menit</i></span>');
        //     $('#submitBtn').prop('disabled',true);
        // }

        // if(diffTime >=15){
        //     $('#jadwalResult').html('');
        //     $('#submitBtn').prop('disabled',false);
        // }
       

        $.ajax({
            type: 'post',
            url: '<?= base_url('admin/validasiJadwal')?>',
            data: {hari:hari, kelas:kelas, mapel:mapel, jam_mulai:jam_mulai, jam_selesai:jam_selesai,id_guru:<?=$id_guru?>},
            success: function (data) {
                var dt = JSON.parse(data);
                console.log(dt);
                if(dt!=''){
                    $('#jadwalResult').html(`
                        <div class="card card-body border-warning">
                            <h6><b>Informasi Kesalahan</b></h6>
                        <p> Jam <b>`+jam_mulai+` - `+jam_selesai+`</b> bersamaan dengan mata pelajaran <b>`+dt[0].nama_mapel+`</b> pada kelas <b>`+dt[0].kelas+' '+dt[0].jurusan+' '+dt[0].sub+`</b></p>
                        </div>
                    `);
                    $('#submitBtn').prop('disabled',true);
                }else
                {
                    $('#jadwalResult').html(``);
                    if(diffTime<15){
                        $('#jadwalResult').html('<span class="text-warning"><i>Minimal durasi mengajar adalah 15 menit</i></span>');
                        $('#submitBtn').prop('disabled',true);
                    }

                    if(diffTime >=15){
                        $('#jadwalResult').html('');
                        $('#submitBtn').prop('disabled',false);
                    }
                }
            }
        });

        
        // console.log(hari + kelas + mapel + jam_mulai + jam_selesai);
    }

   
</script>