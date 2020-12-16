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
    <form action="<?=base_url('guru/addIjin')?>" enctype="multipart/form-data" method="post">
            <?php foreach($tahun_akademik as $th):?>
                <input type="hidden" name="tahun_akademik" value="<?= $th['tahun_akademik']?>">
                <input type="hidden" name="semester" value="<?= $th['semester']?>">
            <?php endforeach?>
        <div class="form-group col-md-3">
            <label for="">Jenis Ijin</label>
            <select name="jenis" id="" class="form-control" required>
                <option value="" selected disabled>- pilih -</option>
                <option value="1">Sakit</option>
                <option value="2">Ijin</option>
                <option value="3">Tugas</option>
                <option value="00">Lain-lain</option>
            </select>
        </div>
        <div class="form-group col-md-12" >
            <label for="">Perihal Ijin</label>
            <?php foreach($getIdGuru as $id):?>
            <input type="hidden" name="id_guru" value="<?=$id['id_guru']?>" class="form-control" required>
            <?php endforeach?>
            <input type="text" name="perihal" class="form-control" required>
        </div>
        <div class="form-group col-md-12">
            <label for="">Tanggal ijin</label>
            <div class="row">
                <div class="col-md-3">
                    <input type="date" name="tgl_mulai" value="<?= date('Y-m-d')?>" class="form-control" required>
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
            <input type="hidden" name="judul[]" placeholder="" value="Lampiran Surat" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
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
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Mulai</th>
                <th>Durasi</th>
                <th>Status Terakhir</th>
                <th style="width:30%">Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($ijin as $dafIjin):?>
            <tr>
                <td><?=$i++?></td>
                <td>
                    <?php
                        $string =  $dafIjin['perihal_ijin'];
                        $string = character_limiter($string, 25);
                        echo $string;
                    ?>
                </td>
                <td><?=$dafIjin['tanggal_pengajuan']?></td>
                <td><?=$dafIjin['tanggal_mulai']?></td>
                <td>
                    <?php
                        $date1 = strtotime($dafIjin['tanggal_mulai']);
                        $date2 = strtotime($dafIjin['tanggal_selesai']);
                        $datediff = $date2 - $date1;
                            
                        echo (round($datediff / (60 * 60 * 24)))+1;
                    ?>
                </td>
                
                <td>
                    <?php foreach($statusIjin as $stat):?>
                        <?php if($stat['id_ijin']==$dafIjin['id_ijin']){?>
                     <?php
                        if($stat['status']=='0'){
                            echo '<div class="badge badge-warning">Belum terverifikasi</div>';
                        }
                        if($stat['status']=='2'){
                            echo '<div class="badge badge-danger">Ditolak</div>';
                        }
                        if($stat['status']=='1'){
                            echo '<div class="badge badge-success">Disetujui</div>';
                        }
                    ?>
                    <?php }?>
                    <?php endforeach?>

                </td>
                <td>
                    
                    <!-- <a href="<?=base_url('guru/findFile')?>/<?= $dafIjin['id_ijin']?>" class="ml-2 btn btn-sm btn-success"><i class="fa fa-download"></i></a> -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDetail<?=$dafIjin['id_ijin']?>">
                            <i class="fa fa-eye"></i>
                        </button>
                    <?php foreach($statusIjin as $stat2):?>
                        <?php if($stat2['id_ijin']==$dafIjin['id_ijin']){?>
                     <?php if($stat2['status']=='0'){?>
                        <a href="<?=base_url('guru/hapusIjin')?>/<?=$dafIjin['id_ijin']?>" class="btn btn-danger btn-sm ml-2 tombol-hapus"><i class="fa fa-window-close"></i></a>
                     <?php } ?>
                    <?php }?>
                    <?php endforeach?>
                    
                </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>



<?php foreach($ijin as $detail):?>
<div class="modal fade bd-example-modal-lg" id="modalDetail<?=$detail['id_ijin']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan Ijin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
           

            <div class="form-group col-md-3">
                <label for="">Jenis Ijin</label>
                <select name="jenis" id="" class="form-control" required>
                    <option value="1" <?php if($detail['jenis_ijin']=='1'){echo 'selected';}?>>Sakit</option>
                    <option value="2" <?php if($detail['jenis_ijin']=='2'){echo 'selected';}?>>Ijin</option>
                    <option value="3" <?php if($detail['jenis_ijin']=='3'){echo 'selected';}?>>Tugas</option>
                    <option value="00" <?php if($detail['jenis_ijin']=='00'){echo 'selected';}?>>Lain-lain</option> 
                </select>
            </div>
            <div class="form-group col-md-12" >
                <label for="">Perihal Ijin</label>
                <input type="hidden" name="id_guru" value="<?= $this->session->userdata('id_user')?>" class="form-control" required>
                <input type="text" name="perihal" value="<?=$detail['perihal_ijin']?>" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <label for="">Tanggal ijin</label>
                <div class="row">
                    <div class="col-md-3">
                        <input type="date" value="<?=$detail['tanggal_mulai']?>" name="tgl_mulai" class="form-control" required>
                    </div>
                    <span class="my-auto">sampai</span>
                    <div class="col-md-3">
                        <input type="date" value="<?=$detail['tanggal_selesai']?>" name="tgl_selesai" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="">Deskripsi Ijin</label>
                <textarea name="editdeskripsi" id="" cols="30" rows="10" class="form-control" required><?=$detail['deskripsi']?></textarea>
                <script>
                    CKEDITOR.replace( 'editdeskripsi',{height:250} );
                </script>
            </div>
            <div class="form-group col-md-12">
                <label for="">Lampiran Dokumen</label>
                <a href="<?=base_url('guru/findFile')?>/<?= $dafIjin['id_ijin']?>" class="ml-2 btn btn-sm btn-success"><i class="fa fa-download"></i> Unduh File</a>
            </div>
            <!-- <div class="form-group">
                Riwayat Status Ijin
                
            </div> -->
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<?php endforeach ?>