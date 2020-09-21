
<a href="<?=base_url('document/proposal')?>" class="btn btn-secondary btn-sm mb-3">Kembali</a>
<button type="button" class="btn btn-info mb-3 btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
  Edit
</button>
<button type="button" class="btn btn-success mb-3 btn-sm" data-toggle="modal" data-target="#modalTambah">
  Tambah Dokumen
</button>
<?php foreach ($dokumenproposal as $dok):?>

<div class="card card-body border-success">
<h4><b>Detail Dokumen Proposal Kegiatan</b></h4>
    <ul>
        <li>
            <div class="row">
                <div class="col-md-3">Nama Kegiatan</div>
                <div class="col-md-9">: <?= $dok['nama_kegiatan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tahun Akademik</div>
                <div class="col-md-9">: <?= $dok['tahun_akademik']?> - <?= $dok['semester']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tanggal Pelaksanaan</div>
                <div class="col-md-9">: <?= $dok['tgl_pelaksanaan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tempat</div>
                <div class="col-md-9">: <?= $dok['tempat']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Total Rancangan Anggaran</div>
                <div class="col-md-9">: <?= $dok['tot_anggaran']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tanggal Pengajuan Proposal</div>
                <div class="col-md-9">: <?= $dok['tgl_pengajuan']?></div>
            </div>
        </li>
    </ul>
    <h6><b>Latar Belakang Kegiatan </b></h6>
    <?= $dok['lb_kegiatan']?> <br>
    <h6><b>Tujuan Kegiatan </b></h6>
    <?= $dok['tujuan_kegiatan']?> <br>
    <h6><b>Harapan Kegiatan </b></h6>
    <?= $dok['harapan_kegiatan']?> <br> <br>
    <h6><b>Arsip Dokumen</b></h6>
    <?php $i=1; foreach($arsip as $ars):?>
    <div class="row ml-2 mt-2">
        <div class="col-1"><?=$i++?></div>
        <div class="col-3"><?=$ars['nama_doc']?></div>
        <div class="col-2">
            <a href="<?=base_url('document/downloadDocument')?>/<?=$ars['link_file']?>"  class="btn btn-info btn-sm">download</a>
            <a href="<?=base_url('document/deleteSingleDoc')?>/<?=$ars['id_trans_doc']?>/detailProposal/<?=$id?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
        </div>
    </div>
    <?php endforeach?>
    </div>
<?php endforeach ?>
<?=json_encode($arsip);?>
<?php foreach($arsip as $add):?>
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('document/addSingleDocument')?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="">Judul Dokumen</label>
                <input type="hidden" name="backlink" value="detailProposal">
                <input type="hidden" name="backid" value="<?= $id?>">
                <input type="hidden" name="code_id" value="<?= $add['code_id']?>">
                <input type="text" name="judul[]" placeholder=""class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">File Dokumen</label>
                <input type="file" name="arsip[]" class="form-control-file">
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
<?php endforeach?>
<!-- Modal Edit -->


<?php foreach($dokumenproposal as $docprop):?>

<?php $split = explode(' / ', $docprop['tahun_akademik']);

$tahun = $split[0];
$tahun2 = $split[1];

?>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
            <button tton type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('document/updateProposal')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="">Nama Kegiatan</label>
            <input name="nama_kegiatan" value="<?=$docprop['nama_kegiatan']?>" type="text" class="form-control" required>
            <input name="id_proposal" value="<?=$docprop['id_proposal']?>" type="hidden" class="form-control" required>
            <input name="back_id" value="<?=$id?>" type="hidden" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" value="<?=$tahun?>" name="tahun_akademik_1" class="form-control" required>
                        </div>
                        <span class="mx-auto my-auto">/</span>
                        <div class="col">
                            <input type="number" value="<?=$tahun2?>" name="tahun_akademik_2" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control col-md-2" required>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Latar Belakang</label>
            <textarea name="lb_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$docprop['lb_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'lb_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Tujuan</label>
            <textarea name="tujuan_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$docprop['tujuan_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'tujuan_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Hasil Yang diharapkan</label>
            <textarea name="harapan_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$docprop['harapan_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'harapan_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Tanggal Pelaksanaan</label>
            <input name="tgl_pelaksanaan"  value="<?=$docprop['tgl_pelaksanaan']?>" type="date" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Tempat</label>
            <input name="tempat" type="text"  value="<?=$docprop['tempat']?>" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Total Rancangan Anggaran ( Rp. )</label>
            <input name="tot_anggaran"  value="<?=$docprop['tot_anggaran']?>" type="number" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Tanggal Pengajuan Proposal</label>
            <input name="tgl_pengajuan"  value="<?=$docprop['tgl_pengajuan']?>" type="date" class="form-control" required>
       </div>

       <div class="form-group">
            <input name="status_pj"  value="" type="hidden" class="form-control" required>
        </div>

        <div class="form-group">
            <input name="status_waka"  value="" type="hidden" class="form-control" required>
        </div>

        <div class="form-group">
            <input name="status_kepsek"  value="" type="hidden" class="form-control" required>
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
<?php endforeach?>