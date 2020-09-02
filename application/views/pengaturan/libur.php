
<div class="card">
    <div class="card-body">
        <legend>
            TAMBAH DATA LIBUR
        </legend>
        <form action="<?= base_url('admin/addLibur')?>" method="post" enctype="multipart/form-data">
        <fieldset class="mb-3">
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Tanggal Libur</label>
                <div class="col-lg-10">
                    <input type="date" class="form-control" placeholder="Nama Pengguna" name="tanggal" autocomplete="off" required >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-2">Keterangan</label>
                <div class="col-lg-10">
                    <textarea name="keterangan" id="" cols="30" rows="2" class="form-control" required></textarea>
                </div>
            </div>
            
            
        </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit </button>
            </div>           
            
        </form>
    </div>
</div>
  

<div class="card card-body border-info">
    <legend>Daftar pengguna</legend>
    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Libur</th>
                <th>Hari</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($libur as $data):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $data['tanggal_libur']?></td>
                    <td><?= $data['keterangan']?></td>
                    <td>hari</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#modalUbah<?=$data['id_libur']?>">ubah</a>
                        <a href="<?= base_url('admin/deleteLibur')?>/<?= $data['id_libur']?>" class="btn btn-sm btn-danger tombol-hapus">hapus</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>



<?php foreach($libur as $ubah):?>
<div class="modal fade" id="modalUbah<?=$ubah['id_libur']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Tanggal Libur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('admin/updateLibur')?>" method="post">
        <div class="form-group">
            <label for="">Tanggal Libur</label>
            <input type="hidden" name="id" value="<?=$ubah['id_libur']?>">
            <input type="date" class="form-control" name="tanggal" value="<?=$ubah['tanggal_libur']?>">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="2" class="form-control"><?=$ubah['keterangan']?></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>