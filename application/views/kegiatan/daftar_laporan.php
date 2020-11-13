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
				<td><?= $lap['nama']?></td>
				<td>
				<?php foreach ($verifikasiPJ as $PJ):?>
					<?php
					if($lap['id_laporan']==$PJ['id_laporan'] ){
						if($PJ['status']=='Ditolak'){
							echo '<span class="badge badge-danger">'.$PJ['status'].'</span>';
						} else if($PJ['status']=='Disetujui'){
							echo '<span class="badge badge-success">'.$PJ['status'].'</span>';
						} else {
							echo '<span class="badge badge-warning">'.$PJ['status'].'</span>';
						}
					}
					?>
				<?php endforeach;?>
				</td>
				<td>
				<?php foreach ($verifikasiWaka as $Waka):?>
					<?php

					if($lap['id_laporan']==$Waka['id_laporan'] ){
						if($Waka['status']=='Ditolak'){
							echo '<span class="badge badge-danger">'.$Waka['status'].'</span>';
						} else if($Waka['status']=='Disetujui'){
							echo '<span class="badge badge-success">'.$Waka['status'].'</span>';
						} else {
							echo '<span class="badge badge-warning">'.$Waka['status'].'</span>';
						}
					}
					?>
				<?php endforeach;?>
				
				</td>

				<td>
				<?php foreach ($verifikasiKepsek as $Kepsek):?>
					<?php
					if($lap['id_laporan']==$Kepsek['id_laporan'] ){
						if($Kepsek['status']=='Ditolak'){
							echo '<span class="badge badge-danger">'.$Kepsek['status'].'</span>';
						} else if($Kepsek['status']=='Disetujui'){
							echo '<span class="badge badge-success">'.$Kepsek['status'].'</span>';
						} else {
							echo '<span class="badge badge-warning">'.$Kepsek['status'].'</span>';
						}
					}
					?>
				<?php endforeach;?>
				</td>
				<td>
                    <a href="<?= base_url('document/detailLaporan')?>/<?= $lap['id_laporan']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
					<!-- <a href="<?= base_url('document/deleteLaporan')?>/<?= $lap['id_laporan']?>"class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a> -->
                </td>
			</tr>
			<?php endforeach;?>
			
		</tbody>
	</table>
    </div>
</div>