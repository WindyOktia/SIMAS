<?php if($this->session->userdata('role')!='4'){?>
<a href="<?=base_url('document/addProposal')?>" class="btn btn-primary btn-sm">Tambah Proposal </a>
<?php } ?>

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
				<th>Nama Pengunggah</th>
                <th>Info Pembina</th>
				<th>Info Waka</th>
				<th>Info Kepala Sekolah</th>
				<th style="width:15%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($dokumenproposal as $doc):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $doc['nama_kegiatan']?></b></td>
				<td><?= $doc['tahun_akademik']?></td>
				<td><?= $doc['semester']?></td>
				<td><?= $doc['nama']?></td>
				<td>
				<?php foreach ($verifikasiPJ as $PJ):?>
					<?php

					if($doc['id_proposal']==$PJ['id_proposal'] ){
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

					if($doc['id_proposal']==$Waka['id_proposal'] ){
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
					if($doc['id_proposal']==$Kepsek['id_proposal'] ){
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
                    <a href="<?= base_url('document/detailProposal')?>/<?= $doc['id_proposal']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                </td>
			</tr>
			<?php endforeach;?>

		</tbody>
	</table>
    </div>
</div>