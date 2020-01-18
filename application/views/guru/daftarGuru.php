<a href="<?= base_url('admin/guru')?>" class="btn btn-primary btn-sm">Tambah Data Guru</a>

<div class="card mt-3">
    <div class="card-body"> 
        <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Guru</h5>
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
						<a href="<?= base_url('admin/jadwalMengajar')?>/<?=$guru['id_guru']?>"class="btn btn-success btn-sm mb-1">Jadwal Mengajar</a>
						<a href="<?= base_url('admin/detail')?>" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#modalGuru<?= $guru['id_guru']?>">Edit</a>
						<a href="<?= base_url('admin/detail')?>"class="btn btn-danger btn-sm mb-1 tombol-hapus">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>

<?php foreach($detail as $gr):?>
<div class="modal fade" id="modalGuru<?= $gr['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <p class="text-warning">Note : RFID yang sudah terdaftar tidak dapat diubah atau digunakan ulang, kecuali data Guru dihapus</p>
        <form action="" method="post">
			<div class="form-group">
				<label for="">RFID</label>
				<input type="text" class="form-control" value="<?= $gr['rfid']?>" readonly>
			</div>
			<div class="form-group">
				<label for="">NIP</label>
				<input type="text" class="form-control" value="<?= $gr['nip']?>">
			</div>
			<div class="form-group">
				<label for="">Nama Guru</label>
				<input type="text" class="form-control" value="<?= $gr['nama_guru']?>">
			</div>
			<div class="form-group">
				<label for="">Alamat</label>
				<textarea rows="4" type="text" class="form-control"><?= $gr['alamat']?></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<?php endforeach ;?>