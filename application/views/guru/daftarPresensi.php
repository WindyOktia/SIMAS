<div class="card">
    <div class="card-body">
        <legend>Daftar Guru</legend>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>NIP</th>
					<th style="width:30%">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;foreach($guru as $guru):?>
				<tr>
					<td><?= $i++?></td>
					<td><b><?= $guru['nama_guru']?></b></td>
					<td><?= $guru['nip']?></td>
					<td>
						<a href="<?= base_url('admin/detailPresensi')?>/<?=$guru['id_guru']?>"class="btn btn-success btn-sm mb-1">Detail Presensi</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>