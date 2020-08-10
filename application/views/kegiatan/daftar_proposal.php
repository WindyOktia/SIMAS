<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>

<legend>Proposal Kegiatan SMA Bopkri 1 Yogyakarta</legend>
<!-- <form action="<?= base_url('admin/addProposal')?>" method="post">
    <div class="row">
        <div class="col mx-auto my-auto">
			<button class="btn btn-primary btn-sm">Tambah Proposal</button>
        </div>
    </div>
</form> -->

<a href="<?=base_url('admin/addProposal')?>" class="btn btn-primary btn-sm">Tambah Proposal </a>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Proposal</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Kegiatan</th>
				<th>Tahun Ajaran</th>
				<th>Detail Kegiatan</th>
				<th>Actions</th>
                <th>Info Pembina</th>
				<th>Info Waka</th>
				<th>Info Kepala Sekolah</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($kelas as $kelas):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></b></td>
				<td>24</td>
				<td>
                    <a href="<?= base_url('admin/daftarPeserta')?>/<?= $kelas['id_kelas']?>" class="btn btn-primary btn-sm">Daftar Peserta</a>
                </td>
				<td>
					<a href="<?= base_url('admin/deleteKelas')?>/<?= $kelas['id_kelas']?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>