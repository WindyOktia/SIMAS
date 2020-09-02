<div class="card">
    <div class="card-body">
    <?php foreach($guru as $guru):?>
        <legend>Nama Guru : <b><?= $guru['nama_guru']?></b></legend>
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
                    <select class="form-control" name="hari[]" required>
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
                    <select id="selectKelasA" class="form-control" name="kelas[]" required>
                    <option selected disabled value="">- pilih -</option>
                        <?php foreach($kelas as $kelas):?>
                            <option value="<?= $kelas['id_kelas']?>"><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></option>
                        <?php endforeach;?>
                    </select>
                </div> 
                <div class="form-group col-md">
                <label for="">Pilih Mata Pelajaran</label>
                    <select id="selectKelasA" class="form-control" name="mapel[]" required>
                    <option selected disabled value="">- pilih -</option>
                        <?php foreach($mapel as $mapel):?>
                            <option value="<?= $mapel['id_mapel']?>"><?= $mapel['nama_mapel']?></option>
                        <?php endforeach;?>
                    </select>
                </div> 
                <div class="form-group col-md">
                <label for="">Jam Mulai</label>
                    <input type="time" class="form-control" placeholder="Jam Mulai" name="mulai[]" required>
                </div> 
                <div class="form-group col-md">
                <label for="">Jam Selesai</label>
                    <input type="time" class="form-control" placeholder="Jam Selesai" name="selesai[]" required>
                </div> 
                <div class="form-group col-md">
                <label for="">Aksi</label>
                <a href="" class="tbhJadwal btn btn-success form-control">Add More</a>
                </div> 
            </div>
        </div>
        <button class="btn btn-primary btn-sm float-right" type="submit">Submit</button>
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