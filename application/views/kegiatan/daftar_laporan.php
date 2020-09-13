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
				<th>Tanggal Pengajuan</th>
				<th>Pengunggah Laporan</th>
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
				<td><?= $lap['tgl_pengajuan_lp']?></td>
				<td><?= $lap['username']?></td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>
                    <a href="<?= base_url('document/detailLaporan')?>/<?= $lap['id_laporan']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    <!-- <a href="<?= base_url('document/detailProposal')?>/<?= $doc['id_proposal']?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a> -->
					<a href="<?= base_url('document/deleteLaporan')?>/<?= $lap['id_laporan']?>"class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
                </td>
			</tr>
			<?php endforeach;?>
			
		</tbody>
	</table>
    </div>
</div>