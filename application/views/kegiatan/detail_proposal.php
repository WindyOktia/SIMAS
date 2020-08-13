
<a href="<?=base_url('document/proposal')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>
<button type="button" class="btn btn-success mb-3 btn-sm" data-toggle="modal" data-target="#modalTambah">
  Tambah Dokumen
</button>
<?php foreach ($dokumen as $dok):?>

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