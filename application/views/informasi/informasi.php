<a href="<?= base_url('admin/tbhInformasi')?>" class="btn btn-success btn-sm mb-3">Tambah Dokumen</a>
<div class="card card-body">
    <h4><b>Daftar Informasi</b></h4>
    <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Informasi</th>
					<th>Dibuat Tanggal</th>
					<th>Dibuat Oleh</th>
					<th style="width:30%">Actions</th>
				</tr>
			</thead>
			<tbody>
            <?php $i=1;foreach($informasi as $info):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $info['judul_informasi']?></td>
                    <td><?= $info['dibuat_tanggal']?></td>
                    <td><?= $info['dibuat_oleh']?></td>
                    <td>
                        <a href="<?= base_url('admin/detailInformasi')?>/<?=$info['id_informasi']?>" class="btn btn-info btn-sm">detail</a>
                        <a href="<?= base_url('admin/deleteInformasi')?>/<?=$info['id_informasi']?>" class="btn btn-danger btn-sm tombol-hapus">hapus</a>
                    </td>
                </tr>
			<?php endforeach?>
			</tbody>
		</table>
</div>