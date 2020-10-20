<div class="main-card card mb-3">
    <div class="card-body border border-warning">
        <h5 class="card-title">Tambah Penugasan</h5>
        <form id="signupForm" class="mx-auto" action="<?=base_url('document/do_addpenugasan')?>" method="post" novalidate="novalidate">
            <div>
                <div class="form-group col-6 align-middle">
                    <label for="username">Pilih Kegiatan</label>
                    <select name="id_proposal" class="multiselect-dropdown form-control">
                    <?php $i = 1; foreach ($dokumenproposal as $kat) : ?>
                        <option value="<?= $kat['id_proposal']; ?>"><?= $kat['nama_kegiatan']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-6 align-middle">
                    <label for="username">Pilih Guru</label>
                    <select name="id_guru" class="multiselect-dropdown form-control">
                    <?php $i = 1; foreach ($guru as $guru) : ?>
                        <option value="<?= $guru['id_guru']; ?>"><?= $guru['nama_guru']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary ml-2" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Guru Yang Ditugaskan</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kegiatan</th>
                <th>NIP</th>
                <th>Nama Guru</th>
				<th style="width:30%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($penugasan as $tugas):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $tugas['nama_kegiatan']; ?></b></td>
                <td><b><?= $tugas['nip']; ?></b></td>
                <td><b><?= $tugas['nama_guru']; ?></b></td>
				<td>
					<a href="<?= base_url('document/deletePenugasan')?>/<?= $tugas['id_tugas']?>"class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
                </td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>

