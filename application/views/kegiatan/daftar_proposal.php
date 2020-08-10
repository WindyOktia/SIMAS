<legend>Proposal Kegiatan SMA Bopkri 1 Yogyakarta</legend>

<a href="<?=base_url('document/addProposal')?>" class="btn btn-primary btn-sm">Tambah Proposal </a>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Proposal</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Kegiatan</th>
				<th>Tahun Ajaran</th>
				<th>Semester</th>
				<th>Detail Kegiatan</th>
                <th>Info Pembina</th>
				<th>Info Waka</th>
				<th>Info Kepala Sekolah</th>
				<th style="width:15%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($dokumen as $doc):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $doc['nama_kegiatan']?></b></td>
				<td><?= $doc['tahun_akademik']?></td>
				<td><?= $doc['semester']?></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>
                    <a href="<?= base_url('admin/daftarPeserta')?>/<?= $doc['id_proposal']?>" class="btn btn-primary btn-sm">Edit</a>
					<a href="<?= base_url('admin/deleteKelas')?>/<?= $doc['id_proposal']?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                </td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>