<a href="<?= base_url('admin/guru')?>" class="btn btn-primary btn-sm">Tambah Data Guru</a>

<?php		
	$ar = array();
	foreach($jadwal as $loop)
	{
		$ar[] = $loop['id_guru'];
	}
?>

<div class="card mt-3">
    <div class="card-body"> 
        <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Guru</h5>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>NIP</th>
					<th>Beban Mengajar</th>
					<th>Status Guru</th>
					<th style="width:30%">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;foreach($guru as $gr1):?>
				<tr>
					<td><?= $i++?></td>
					<td><b><?= $gr1['nama_guru']?></b></td>
					<td><?= $gr1['nip']?></td>
					<td>
						<?php foreach($jadwal as $jad):?>
							<?php if($jad['id_guru']==$gr1['id_guru']){?>
								<b><?= $jad['jml_mapel'];?></b> Mata Pelajaran ( <b><?= $jad['beban_mengajar'];?></b> Sesi )
							<?php }?>
						<?php endforeach?>
					</td>
					<td>
						<?php
							$stat = $gr1['status_guru'];
							if($stat=='1'){
								echo '<b>PNS</b>';
							}else if($stat== '2'){
								echo '<b>Guru Tidak Tetap</b>';							
							}else{
								echo '<b>Guru Tetap Yayasan</b>';
							}
						?>
					</td>
					<td>
						<a href="<?= base_url('admin/jadwalMengajar')?>/<?=$gr1['id_guru']?>"class="btn btn-success btn-sm mb-1">Jadwal Mengajar</a>
						<a href="<?= base_url('admin/detail')?>" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#modalGuru<?= $gr1['id_guru']?>">Edit</a>
						<a href="<?= base_url('admin/deleteGuru')?>/<?=$gr1['nip']?>" class="btn btn-danger btn-sm mb-1 tombol-hapus 
							<?php foreach($jadwal as $jds):?>
								<?php if($jds['id_guru']==$gr1['id_guru']&& $jds['beban_mengajar']>0){?>
								disabled
								<?php }?>
							<?php endforeach?>
						">Hapus</a>
					</td>
				</tr> 
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>




<?php foreach($guru as $gr):?>
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
		<input type="hidden" name="niplama" value="<?= $gr['nip']?>">
			<div class="form-group">
				<label for="">RFID</label>
				<input type="number" name="rfid" class="form-control border-warning" value="" placeholder="rfid saat ini : <?= $gr['rfid']?> - Isi hanya apabila ada perubahan" >
			</div>
			<div class="form-group">
				<label for="">NIP</label>
				<input type="text" name="nip" class="form-control" value="<?= $gr['nip']?>">
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
			<div class="form-group">
				<label for="">Status Guru</label>
				<select name="status" id="" class="form-control">
					<option value="1" <?php if($gr['status_guru']=='1'){echo 'selected';};?>>PNS</option>
					<option value="2" <?php if($gr['status_guru']=='2'){echo 'selected';};?>>Guru Tidak Tetap</option>
					<option value="3" <?php if($gr['status_guru']=='3'){echo 'selected';};?>>Guru Tetap Yayasan</option>
				</select>
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

