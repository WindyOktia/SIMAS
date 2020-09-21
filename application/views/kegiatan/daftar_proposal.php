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
				<?php $i=1; foreach ($verifikasiPJ as $PJ):?>
				<td><?= $PJ['status']?></td>
				<?php endforeach;?>
				<?php foreach ($verifikasiWaka as $Waka):?>
				<td><?= $Waka['status']?></td>
				<?php endforeach;?>
				<?php foreach ($verifikasiKepsek as $Kepsek):?>
				<td><?= $Kepsek['status']?></td>
				<?php endforeach;?>
				<td>
                    <a href="<?= base_url('document/detailProposal')?>/<?= $doc['id_proposal']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    <!-- <a href="<?= base_url('document/detailProposal')?>/<?= $doc['id_proposal']?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a> -->
					<a href="<?= base_url('document/deleteProposal')?>/<?= $doc['id_proposal']?>"class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
                </td>
			</tr>
			<?php endforeach;?>

		</tbody>
	</table>
    </div>
</div>