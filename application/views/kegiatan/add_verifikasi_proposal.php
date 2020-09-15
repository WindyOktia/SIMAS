
<a href="<?=base_url('document/proposal')?>" class="btn btn-secondary btn-sm mb-3">Kembali</a>
<button type="button" class="btn btn-danger mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Ditolak">
  Ditolak
</button>
<button type="button" class="btn btn-primary mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Revisi">
  Revisi
</button>
<button type="button" class="btn btn-success mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Setuju">
  Setuju
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

<?php foreach($dokumenproposal as $add):?>
<div class="modal fade" id="Revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan Revisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('document/do_addVerifikasiProposal')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_proposal" value="<?= $add['id_proposal']?>" type="hidden" class="form-control" required>
            <input name="id_user" type="hidden" class="form-control" required>
            <input name="role" value="<?=$this->session->userdata('role');?>"type="hidden" class="form-control" required>
            <input name="status" value="Revisi" type="hidden" class="form-control" required>
            <textarea name="catatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'catatan',{height:250} );
            </script>
       </div>
       <div class="form-group">
            <label for="">Tanggal Verifikasi</label>
            <input name="tgl_verifikasi" type="date" class="form-control" required>
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

<?php foreach($dokumenproposal as $add):?>
<div class="modal fade" id="Ditolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan Revisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('document/do_addVerifikasiProposal')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_proposal" value="<?= $add['id_proposal']?>" type="hidden" class="form-control" required>
            <input name="id_user" type="hidden" class="form-control" required>
            <input name="status" value="Ditolak" type="hidden" class="form-control" required>
            <input name="catatan" value="-" type="hidden" class="form-control" required>
            <input name="role" value="<?=$this->session->userdata('role');?>"type="hidden" class="form-control" required>
       </div>
       <div class="form-group">
            <label for="">Tanggal Verifikasi</label>
            <input name="tgl_verifikasi" type="date" class="form-control" required>
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

<?php foreach($dokumenproposal as $add):?>
<div class="modal fade" id="Setuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan Revisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('document/do_addVerifikasiProposal')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_proposal" value="<?= $add['id_proposal']?>" type="hidden" class="form-control" required>
            <input name="id_user" type="hidden" class="form-control" required>
            <input name="status" value="Disetujui" type="hidden" class="form-control" required>
            <input name="catatan" value="-" type="hidden" class="form-control" required>
            <input name="role" value="<?=$this->session->userdata('role');?>"type="hidden" class="form-control" required>
       </div>
       <div class="form-group">
            <label for="">Tanggal Verifikasi</label>
            <input name="tgl_verifikasi" type="date" class="form-control" required>
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