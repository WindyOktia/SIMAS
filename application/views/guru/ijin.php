<div class="card card-body">
    <h4><i class="fa fa-plus-circle mr-2" style="color:green"></i>Pengajuan Ijin Guru</h4>
    <br>
    <h6><i class="fa fa-info-circle mr-2"></i><b>Informasi</b></h6>
    <h6>
        <ul>
            <li>Pengajuan ijin memerlukan verifikasi dari Kepala Sekolah </li>
            <li>Lakukan pengajuan ijin minimal H-2 sebelum anda mengambil ijin </li>
        </ul>
    </h6>
    
    <h6 class="mt-3"><i class="	fa fa-pencil-square mr-2"></i>Detail Pengajuan Ijin</h6>
    <form action="<?=base_url('guru/addIjin')?>" method="post">
        <div class="form-group col-md-3">
            <label for="">Jenis Ijin</label>
            <select name="jenis" id="" class="form-control" required>
                <option value="" selected disabled>- pilih -</option>
                <option value="Sakit">Sakit</option>
                <option value="Ijin">Ijin</option>
                <option value="Tugas">Tugas</option>
                <option value="Lainnya">Lain-lain</option>
            </select>
        </div>
        <div class="form-group col-md-12" >
            <label for="">Perihal Ijin</label>
            <input type="hidden" name="id_guru" value="<?= $this->session->userdata('id_user')?>" class="form-control" required>
            <input type="text" name="perihal" class="form-control" required>
        </div>
        <div class="form-group col-md-12">
            <label for="">Tanggal ijin</label>
            <div class="row">
                <div class="col-md-3">
                    <input type="date" name="tgl_mulai" class="form-control" required>
                </div>
                <span class="my-auto">sampai</span>
                <div class="col-md-3">
                    <input type="date" name="tgl_selesai" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="">Deskripsi Ijin</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" required></textarea>
            <script>
                CKEDITOR.replace( 'deskripsi',{height:250} );
            </script>
        </div>
        <div class="form-group col-md-12">
            <label for="">Lampiran Dokumen</label>
            <input type="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success float-right">Ajukan Permohonan Ijin</button>
    </form>
  
</div>

<div class="card card-body">
    <h6><i class="fa fa-history mr-2"></i>Riwayat Pengajuan Ijin</h6>
    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Perihal</th>
                <th>Tanggal Mulai</th>
                <th>Status</th>
                <th style="width:30%">Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($ijin as $dafIjin):?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$dafIjin['perihal_ijin']?></td>
                <td><?=$dafIjin['tanggal_pengajuan']?></td>
                
                <td>
                    <?php
                        if($dafIjin['status']=='0'){
                            echo '<div class="badge badge-warning">Belum terverifikasi</div>';
                        }
                        if($dafIjin['status']=='1'){
                            echo '<div class="badge badge-danger">Ditolak</div>';
                        }
                        if($dafIjin['status']=='2'){
                            echo '<div class="badge badge-success">Disetujui</div>';
                        }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDetail">
                    <i class="fa fa-eye"></i>
                    </button>
                    <a href="" class="ml-2 btn btn-sm btn-success"><i class="fa fa-download"></i></a>
                    <a href="<?=base_url('guru/hapusIjin')?>/<?=$dafIjin['id_ijin']?>" class="btn btn-danger btn-sm ml-2 tombol-hapus"><i class="fa fa-window-close"></i></a>
                </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>

<div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengajuan Ijin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group col-md-3">
                <label for="">Jenis Ijin</label>
                <select name="jenis" id="" class="form-control" required>
                    <option value="" selected disabled>- pilih -</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Tugas">Tugas</option>
                    <option value="Lainnya">Lain-lain</option>  
                </select>
            </div>
            <div class="form-group col-md-12" >
                <label for="">Perihal Ijin</label>
                <input type="hidden" name="id_guru" value="<?= $this->session->userdata('id_user')?>" class="form-control" required>
                <input type="text" name="perihal" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <label for="">Tanggal ijin</label>
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" name="tgl_mulai" class="form-control" required>
                    </div>
                    <span class="my-auto">sampai</span>
                    <div class="col-md-3">
                        <input type="date" name="tgl_selesai" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="">Deskripsi Ijin</label>
                <textarea name="editdeskripsi" id="" cols="30" rows="10" class="form-control" required></textarea>
                <script>
                    CKEDITOR.replace( 'editdeskripsi',{height:250} );
                </script>
            </div>
            <div class="form-group col-md-12">
                <label for="">Lampiran Dokumen</label>
                <input type="file" class="form-control-file">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
