<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>

<legend>Tambah Kelas</legend>
<form action="<?= base_url('admin/addKelas')?>" method="post">
    <div class="row">
        <div class="col mx-auto my-auto">
			<select class="form-control" id="exampleFormControlSelect1" name="kelas" >
				<option value="0">Pilih Kelas</option>
				<option value="X">X</option>
				<option value="XI">XI</option>
				<option value="XII">XII</option>
			</select>
        </div>
        <div class="col mx-auto my-auto">
			<select class="form-control" id="exampleFormControlSelect1" name="jurusan">
				<option value="0">Pilih Jurusan</option>
				<option value="IPA">IPA</option>
				<option value="IPS">IPS</option>
				<option value="Bahasa">Bahasa</option>
			</select>
        </div>
        <div class="col mx-auto my-auto">
			<input type="number" class="form-control" placeholder="0" name="sub" required>
        </div>
        <div class="col mx-auto my-auto">
			<button type="submit" class="btn btn-primary btn-sm">Tambah Kelas</button>
        </div>
    </div>
</form>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Kelas</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Kelas</th>
				<th>Jumlah Siswa</th>
				<th>Detail</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($kelas as $kelas):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></b></td>
				<td>24</td>
				<td>
                    <a href="<?= base_url('admin/daftarPeserta')?>"class="btn btn-primary btn-sm">Daftar Peserta</a>
                </td>
				<td>
					<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>