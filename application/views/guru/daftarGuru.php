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
						<a href="<?= base_url('admin/deleteGuru')?>/<?=$guru['nip']?>"class="btn btn-danger btn-sm mb-1 tombol-hapus">Hapus</a>
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
	  <p class=""><b class="text-danger">Note</b></p>
	  <ul>
	  	<li>Kosongkan kolom apabila tidak ada perubahan	</li>
	  </ul>
        <form action="<?= base_url('admin/editGuru')?>" method="post">
		<input type="hidden" name="id" value="<?= $gr['id_guru']?>">
		<input type="hidden" name="nip_lama" value="<?= $gr['nip']?>">
			<div class="form-group">
				<label for="">RFID</label>
				<input type="text" name="rfid" class="form-control border-warning" value="" placeholder="rfid saat ini : <?= $gr['rfid']?> - Isi hanya apabila ada perubahan" >
			</div>
			<div class="form-group">
				<label for="">NIP</label>
				<input type="text" name="nip" class="form-control" value="" placeholder="NIP saat ini : <?= $gr['nip']?>">
			</div>
			<div class="form-group">
				<label for="">Nama Guru</label>
				<input type="text" name="nama" class="form-control" value="<?= $gr['nama_guru']?>">
			</div>
			<div class="form-group">
				<label for="">Alamat</label>
				<textarea rows="4" name="alamat" type="text" class="form-control"><?= $gr['alamat']?></textarea>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="pass" class="form-control" value="" placeholder="Kosongkan apabila tidak ada perubahan">
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