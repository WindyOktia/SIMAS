<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
  Tambah Mata Pelajaran
</button>

<div class="card card-body mt-3">
    <legend>Daftar Mata Pelajaran</legend>
        <table class="table datatable-show-all">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Deskripsi Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($mapel as $map):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $map['nama_mapel']?></td>
                    <td>
                        <?php if($map['deskripsi']==''){echo '[ tidak ada deskripsi ]';}?>
                        <?= $map['deskripsi']?></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEdit<?=$map['id_mapel']?>">
                            Edit
                        </button>   
                        <a href="<?= base_url('admin/deleteMapel')?>/<?= $map['id_mapel']?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
</div>

<!-- modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/tambahMapel')?>" method="post">
            <div class="form-group">
                <label class="col-form-label col-lg-4">Nama Mata Pelajaran</label>
                <div class="col-lg-12">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Nama Mata Pelajaran" name="nama_mapel" required >
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-lg-12">Deskripsi Mata Pelajaran <i>(Opsional)</i></label>
                <div class="col-lg-12">
                    <textarea type="text" autocomplete="off" rows="5" class="form-control" placeholder="Deskripsi Mata Pelajaran" name="deksripsi_mapel" ></textarea>
                </div>
            </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end of modal tambah -->

<!-- modal edit -->
<?php foreach($mapel as $edit):?>
<div class="modal fade" id="modalEdit<?= $edit['id_mapel']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/editMapel')?>" method="post">
            <div class="form-group">
                <input type="hidden" name="id_mapel" value="<?= $edit['id_mapel']?>">
                <label class="col-form-label col-lg-4">Nama Mata Pelajaran</label>
                <div class="col-lg-12">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Nama Mata Pelajaran" name="nama_mapel" value="<?= $edit['nama_mapel']?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label col-lg-12">Deskripsi Mata Pelajaran <i>(Opsional)</i></label>
                <div class="col-lg-12">
                    <textarea type="text" autocomplete="off" rows="5" class="form-control" placeholder="Deskripsi Mata Pelajaran" name="deksripsi_mapel" ><?= $edit['deskripsi']?></textarea>
                </div>
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
<!-- end of modal edit -->