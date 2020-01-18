<div class="card">
    <div class="card-body">
    <?php foreach($guru as $guru):?>
        <legend>Nama Guru : <b><?= $guru['nama_guru']?></b></legend>
        <p><i class="fa fa-bars mr-2"></i> Tambah Jadwal</p>
        <form action="<?= base_url('admin/addJadwal')?>" method="post">
        <input type="hidden" value="<?= $guru['id_guru']?>" name="guru">
    <?php endforeach;?>
        <div class="input_fields_wrap">
            <div class="row">
                <div class="form-group col-md">
                <label for="">Pilih Hari</label>
                    <select class="form-control" name="hari[]">
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
                    <select id="selectKelasA" class="form-control" name="kelas[]">
                        <?php foreach($kelas as $kelas):?>
                            <option value="<?= $kelas['id_kelas']?>"><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></option>
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
        <legend>Jadwal Mengajar</legend>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Hari</th>
					<th>Kelas</th>
					<th>Jam Mulai</th>
					<th>Jam Selesai</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($jadwal as $jadwal):?>
				<tr>
					<td><?=$i++?></td>
					<td><?= $jadwal['hari']?></td>
					<td><?= $jadwal['kelas']?> <?= $jadwal['jurusan']?> <?= $jadwal['sub']?></td>
					<td><?= $jadwal['jam_mulai']?></td>
					<td><?= $jadwal['jam_selesai']?></td>
					<td>
						<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>