<a href="<?=base_url('admin/tambahMutu')?>" class="btn btn-sm btn-success mb-3">Tambah Mutu</a>
<div class="card card-body">
    <h4>Laporan Mutu Sekolah</h4>
    <table class="table datatable-show-all">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tahun Akademik</th>
            <th scope="col">Semester</th>
            <th scope="col">Nilai</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach ($laporanmutu as $lapMutu):?>
            <tr>
            <td><?=$i++?></td>
				<td><b><?= $lapMutu['tahun_akademik']?></b></td>
				<td><?= $lapMutu['semester']?></td>
				<td><?= $lapMutu['nilai']?></td>
				<td><?= $lapMutu['keterangan']?></td>
                <!-- <td><span class="badge badge-success">Lengkap</span></td> -->
                <td>
                <a href="<?= base_url('admin/downloadMutu')?>/<?=$lapMutu['id_mutu']?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal<?=$lapMutu['id_mutu']?>">Edit</button>
                <a href="<?= base_url('admin/deleteMutu')?>/<?=$lapMutu['id_mutu']?>" class="btn tombol-hapus btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>


<?php $i=1; foreach ($laporanmutu as $editMutu):?>

<?php $list = explode('/', $editMutu['tahun_akademik']);

$tahun = $list[0];
$tahun2 = $list[1];

?>
<!-- Modal Edit -->

<div class="modal fade" id="exampleModal<?=$editMutu['id_mutu']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/updateMutu')?>" method="post">
            <div class="form-group">
                <label for="">Tahun Akademik</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="hidden" value="<?=$editMutu['id_mutu']?>" name='id_mutu'  class="form-control">
                            <input type="number" value="<?=$tahun?>" name='th_akademik1' class="form-control">
                        </div>
                        <span class="my-auto">/</span>
                        <div class="col-3">
                            <input type="number" value="<?=$tahun2?>" name='th_akademik2' class="form-control">
                        </div>
                    </div>
            </div>
        
        <div class="form-group">
                <label for="">Semester</label>
                    <div class="row">
                        <div class="col-3">
                            <select name="semester" id="" class="form-control">
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                    </div> 
        </div><br>
        
        <div class="form-group">
                <label for="">Nilai</label>
                    <div class="row">
                        <div class="col-3">
                        <input name="nilai"  type="text" value="<?=$editMutu['nilai']?>" class="form-control" required>
                        </div>
                    </div>
        </div><br>

        <div class="form-group">
            <label for="">Keterangan</label>
                    <div class="row">
                        <div class="col-6">
                        <textarea  rows="4" cols="60" name="keterangan"  class="form-control" required><?=$editMutu['keterangan']?></textarea>
                        </div>
                    </div>
        </div><br>

        <div class="form-group">
        <label for="">Lampiran File</label>
            <input type="hidden" name="judul[]" placeholder="" value="lampiran_file" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>