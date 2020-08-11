<div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="bottom-divided-tab1">
            <div class="card">
                <div class="card-body">
                    <legend>
                        TAMBAH DATA PENGGUNA
                    </legend>
                    <form action="<?= base_url('admin/addPengguna')?>" method="post" enctype="multipart/form-data">
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nama Pengguna</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" autocomplete="off" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 ">Role</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="role" >
                                    <option value="1">Admin</option>
                                    <option value="2">Waka Kesiswaan</option>
                                    <option value="3">Waka Kurikulum</option>
                                    <option value="4">Kepala Sekolah</option>
                                    <option value="5">Osis</option>
                                    <option value="6">Admin Mutu</option>
                                    <option value="7">Penanggungjawab Kegiatan</option>
                                    <option value="8">Tim Sekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="username" name="user" autocomplete="off" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" placeholder="pass" name="pass" autocomplete="off" required >
                            </div>
                        </div>
                        
                        
                        </fieldset>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="card card-body border-info">
    <legend>Daftar pengguna</legend>
    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($user as $us):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $us['nama']?></td>
                    <td><?= $us['username']?></td>
                    <td>
                        <?php if($us['role']==1){echo 'Admin';}?>
                        <?php if($us['role']==2){echo 'Waka Kesiswaan';}?>
                        <?php if($us['role']==3){echo 'Waka Kurikulum';}?>
                        <?php if($us['role']==4){echo 'Kepala Sekolah';}?>
                        <?php if($us['role']==5){echo 'Osis';}?>
                        <?php if($us['role']==6){echo 'Admin Mutu';}?>
                        <?php if($us['role']==7){echo 'Penanggungjawab Kegiatan';}?>
                        <?php if($us['role']==8){echo 'Tim Sekolah';}?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#modalEdit<?= $us['id_user']?>">ubah</a>
                        <a href="<?= base_url('admin/deletePengguna')?>/<?= $us['id_user']?>" class="btn btn-sm btn-danger tombol-hapus">hapus</a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>

<?php foreach($user as $mod):?>
<div class="modal fade" id="modalEdit<?= $mod['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?= base_url('admin/editPengguna')?>" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Konfigurasi</h5>
      </div>
      <div class="modal-body">
        <div class="">
            
            <input type="hidden" name="id_user" id="" value="<?= $mod['id_user']?>">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $mod['nama']?>">
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select name="role" id="" class="form-control">
                <option value="1" <?php if($mod['role']==1){echo 'selected';}?>>Admin</option>
                <option value="3" <?php if($mod['role']==3){echo 'selected';}?>>Waka Kurikulum</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Username <i class="text-danger"> (kosongi jika tidak ada perubahan)</i></label>
            <input type="text" name="user" class="form-control" placeholder="username saat ini : <?= $mod['username']?>">
        </div>
        <div class="form-group">
            <label for="">Password <i class="text-danger"> (kosongi jika tidak ada perubahan)</i></label>
            <input type="password" name="pass" class="form-control" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-clear" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info">Ubah</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach?>
