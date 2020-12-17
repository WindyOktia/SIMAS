<div class="card card-body border-secondary">
    <h4>Verifikasi Ijin Guru</h4>
    <form action="" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Filter Guru</label>
                    <select name="" id="" class="form-control">
                        <option value="" selected disabled>- pilih guru -</option>
                    </select>
                </div>
            </div>
        </div>
    </form>

    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Jenis Ijin</th>
                <th>Perihal</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Mulai</th>
                <th>Durasi (hari)</th>
                <th>Status</th>
                <th >Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1;foreach($ijin as $dafIjin):?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $dafIjin['nama_guru']?></td>
                <td>
                    <?php
                        if($dafIjin['jenis_ijin']=='1'){echo 'Sakit';}
                        if($dafIjin['jenis_ijin']=='2'){echo 'ijin';}
                        if($dafIjin['jenis_ijin']=='3'){echo 'Tugas';}
                        if($dafIjin['jenis_ijin']=='00'){echo 'Lain - lain';}
                    ?>
                </td>
                <td>
                    <?php
                         $string =  $dafIjin['perihal_ijin'];
                         $string = character_limiter($string, 15);
                         echo $string;
                    ?>
                </td>
                <td><?= $dafIjin['tanggal_pengajuan']?></td>
                <td><?= $dafIjin['tanggal_mulai']?></td>
                <td>
                    <?php
                        $date1 = strtotime($dafIjin['tanggal_mulai']);
                        $date2 = strtotime($dafIjin['tanggal_selesai']);
                        $datediff = $date2 - $date1;
                            
                        echo (round($datediff / (60 * 60 * 24)))+1;
                    ?>
                </td>
                <td>
                    <?php foreach($statIjin as $stat):?>
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
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editIjin<?=$dafIjin['id_ijin']?>">
                        <i class="fa fa-eye"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>


<?php $i=1;foreach($ijin as $editIjin):?>
<div class="modal fade" id="editIjin<?=$editIjin['id_ijin']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ijin #<?=$editIjin['id_ijin']?>/<?=$editIjin['id_guru']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <tbody>
                <tr>
                    <td><b>Nama Guru</b> </td>
                    <td>: <?= $editIjin['nama_guru']?></td>
                </tr>
                
                <tr>
                    <td><b>Status Guru</b></td>
                    <td>: tetap / tidak tetap</td>
                </tr>
            </tbody>
        </table>
        <br>
        <legend>Detail ijin</legend>
        <table class="table">
            <tbody>

                <tr>
                    <td><b>Tanggal Pengajuan Ijin</b></td>
                    <td>: <?= $editIjin['tanggal_pengajuan']?></td>
                </tr>

                <tr>
                    <td><b>Jenis Ijin</b></td>
                    <td>: 
                        <?php
                            if($editIjin['jenis_ijin']=='1'){echo 'Sakit';}
                            if($editIjin['jenis_ijin']=='2'){echo 'ijin';}
                            if($editIjin['jenis_ijin']=='3'){echo 'Tugas';}
                            if($editIjin['jenis_ijin']=='00'){echo 'Lain - lain';}
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><b>Perihal</b></td>
                    <td>: <?= $editIjin['perihal_ijin']?></td>
                </tr>

                <tr>
                    <td colspan="2"><b>Keterangan :</b><br><?= $editIjin['deskripsi']?></td>
                </tr>

                <tr>
                    <td><b>Tanggal Mulai</b></td>
                    <td>: <?= $editIjin['tanggal_mulai']?></td>
                </tr>

                <tr>
                    <td><b>Tanggal Selesai</b></td>
                    <td>: <?= $editIjin['tanggal_mulai']?></td>
                </tr>

                <tr>
                    <td><b>Durasi</b></td>
                    <td>: xx hari</td>
                </tr>

                <tr>
                    <td><b>Lampiran Dokumen</b></td>
                    <td>:  <a href="<?=base_url('guru/findFile')?>/<?= $editIjin['id_ijin']?>" > Unduh File</a></td>
                </tr>
            </tbody>
        </table>
            
            
        <br>

        <h4 class="text-center">Keputusan</h4>
        <!-- <legend>Keputusan</legend> -->
        <form action="<?=base_url('admin/addStatIjin')?>" method="post" >
            <div class="form-group">
                <label for="">Status Ijin</label>
                <div class="row">
                    <div class="col-md-4 my-auto" id="statusTerakhir<?=$editIjin['id_ijin']?>">
                        <?php foreach($statIjin as $editStat):?>
                            <?php if($editStat['id_ijin']==$editIjin['id_ijin']){?>
                                <?php
                                    if($editStat['status']=='0'){
                                        echo '<div class="badge badge-warning">Belum terverifikasi</div>';
                                    }
                                    if($editStat['status']=='2'){
                                        echo '<div class="badge badge-danger">Ditolak</div>';
                                    }
                                    if($editStat['status']=='1'){
                                        echo '<div class="badge badge-success">Disetujui</div>';
                                    }
                                ?>
                            <?php }?>
                        <?php endforeach?>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="setuju<?=$editIjin['id_ijin']?>" onclick="setujui(<?=$editIjin['id_ijin']?>)" class="btn btn-sm btn-success btn-block">Setujui</button>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="tolak<?=$editIjin['id_ijin']?>" onclick="tolak(<?=$editIjin['id_ijin']?>)" class="btn btn-sm btn-danger btn-block">Tolak</button>
                    </div>
                </div>
                <input type="hidden" name="id_ijin" class="form-control" value="<?=$editIjin['id_ijin']?>">
                <input type="hidden" id="status<?=$editIjin['id_ijin']?>" name="status" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Catatan</label>
                <textarea name="catatan" id="" cols="" rows="4" class="form-control" placeholder="Biarkan kosong apabila tidak ada catatan"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" id="submit<?=$editIjin['id_ijin']?>" class="btn btn-primary" disabled>Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>

<script type="text/javascript">

    function setujui(id)
    {
        $('#status'+id).val('1');
        $('#setuju'+id).prop('disabled',true);
        $('#tolak'+id).prop('disabled',false);
        $('#submit'+id).prop('disabled',false);
        $('#statusTerakhir'+id).html('<div class="badge badge-success">Disetujui</div>');
    }

    function tolak(id)
    {
        $('#status'+id).val('2');
        $('#setuju'+id).prop('disabled',false);
        $('#tolak'+id).prop('disabled',true);
        $('#submit'+id).prop('disabled',false);
        $('#statusTerakhir'+id).html('<div class="badge badge-danger">Ditolak</div>');
    }

</script>