<legend>Proposal Kegiatan SMA Bopkri 1 Yogyakarta</legend>

<a href="<?=base_url('document/addLaporan')?>" class="btn btn-primary btn-sm">Tambah Laporan </a>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Laporan</h5>
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
				<th style="width:20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($proposal as $prop):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $prop['lb_laporan']?></b></td>
				<td><?= $prop['tujuan_laporan']?></td>
				<td><?= $prop['tot_biaya']?></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>
                    <a href="<?= base_url('admin/daftarPeserta')?>/<?= $prop['id_laporan']?>"class="btn btn-primary btn-sm">Edit</a>
					<a href="<?= base_url('admin/deleteKelas')?>/<?= $prop['id_laporan']?>"class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                </td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>