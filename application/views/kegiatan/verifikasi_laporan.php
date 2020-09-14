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
				<th>Anggaran</th>
				<th>Pengeluaran</th>
                <th>Info Pembina</th>
				<th>Info Waka</th>
				<th>Info Kepala Sekolah</th>
				<th style="width:30%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($dokumenlaporan as $lap):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $lap['nama_kegiatan']?></b></td>
				<td><?= $lap['tahun_akademik']?></td>
				<td><?= $lap['semester']?></td>
				<td><?= $lap['tot_anggaran']?></td>
				<td><?= $lap['biaya_pengeluaran']?></td>
				<td><?= $lap['status_pj']?></td>
				<td><?= $lap['status_waka']?></td>
				<td><?= $lap['status_kepsek']?></td>
				<td>
                    <a href="<?= base_url('document/detailVerifikasiLaporan')?>/<?= $lap['id_laporan']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                </td>
			</tr>
			<?php endforeach;?>
			
		</tbody>
	</table>
    </div>
</div>