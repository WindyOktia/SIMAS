
<a href="<?=base_url('document/verifikasilaporan')?>" class="btn btn-secondary btn-sm mb-3">Kembali</a>
<?php 
							$rl=array('7');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
							<button type="button" class="btn btn-danger mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Ditolak">
                Ditolak
              </button>
              <button type="button" class="btn btn-primary mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Revisi">
                Revisi
              </button>
              <button type="button" class="btn btn-success mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Setuju">
                Setuju
              </button>
<?php }?>
<?php 
              $prn=array('2','4');
							$peran=$this->session->userdata('role');
              foreach ($verifikasiButtonPJ as $PJ):
							if($PJ['status']=='Disetujui' && in_array($peran,$prn)){ ?>
							<button type="button" class="btn btn-primary mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Revisi">
                Revisi
              </button>
              <button type="button" class="btn btn-success mb-3 ml-1 float-right btn-sm" data-toggle="modal" data-target="#Setuju">
                Setuju
              </button>
<?php } endforeach?>
<?php foreach ($dokumenlaporan as $dok):?>

<div class="card card-body border-success">
<h5><b>Detail Dokumen Laporan Kegiatan</b></h5>
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
                <div class="col-md-3">Total Pendapatan</div>
                <div class="col-md-9">: <?= $dok['biaya_pendapatan']?></div>
            </div>
            </li>
            <li>
            <div class="row">
                <div class="col-md-3">Total pengeluaran</div>
                <div class="col-md-9">: <?= $dok['biaya_pengeluaran']?></div>
            </div>
            </li>
            <li>
            <div class="row">
                <div class="col-md-3">Tanggal Pengajuan Laporan</div>
                <div class="col-md-9">: <?= $dok['tgl_pengajuan_lp']?></div>
            </div>
            </li>
        </ul> <br>
        <h6><b>Latar Belakang LPJ </b></h6>
        <?= $dok['lb_laporan']?> <br>
        <h6><b>Tujuan LPJ </b></h6>
        <?= $dok['tujuan_laporan']?> <br>
        <h6><b>laporan jalannya kegiatan </b></h6>
        <?= $dok['lp_jln_kegiatan']?> <br>
        <h6><b>Hasil Kegiatan</b></h6>
        <?= $dok['hasil_kegiatan']?> <br>
        <h6><b>Kendala Kegiatan </b></h6>
        <?= $dok['kendala_kegiatan']?> <br>
        <h6><b>Solusi Kegiatan</b></h6>
        <?= $dok['solusi_kegiatan']?> <br>
        <h6><b>Kesimpulan </b></h6>
        <?= $dok['kesimpulan']?> <br>
        <h6><b>Saran</b></h6>
        <?= $dok['saran']?> <br> <br>
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

<?php foreach($dokumenlaporan as $add):?>
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
        <form action="<?= base_url('document/do_addVerifikasiLaporan')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_laporan" value="<?= $add['id_laporan']?>" type="hidden" class="form-control" required>
            <input name="id_user" type="hidden" class="form-control" required>
            <input name="status" value="Revisi" type="hidden" class="form-control" required>
            <input name="role" value="<?=$this->session->userdata('role');?>"type="hidden" class="form-control" required>
            <textarea name="catatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'catatan',{height:250} );
            </script>
       </div>
       <div class="form-group">
            <label for="">Tanggal Verifikasi</label>
            <input name="tgl_verifikasi_lp" value="<?=date('Y-m-d')?>" type="date" class="form-control" required>
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

<?php foreach($dokumenlaporan as $add):?>
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
        <form action="<?= base_url('document/do_addVerifikasiLaporan')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_laporan" value="<?= $add['id_laporan']?>" type="hidden" class="form-control" required>
            <input name="id_user" type="hidden" class="form-control" required>
            <input name="catatan" value="Ditolak" type="hidden" class="form-control" required>
            <input name="status" value="Ditolak" type="hidden" class="form-control" required>
            <input name="role" value="<?=$this->session->userdata('role');?>"type="hidden" class="form-control" required>
       </div>
       <div class="form-group">
            <label for="">Tanggal Verifikasi</label>
            <input name="tgl_verifikasi_lp" value="<?=date('Y-m-d')?>" type="date" class="form-control" required>
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

<?php foreach($dokumenlaporan as $add):?>
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
        <form action="<?= base_url('document/do_addVerifikasiLaporan')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_laporan" value="<?= $add['id_laporan']?>" type="hidden" class="form-control" required>
            <input name="id_user" type="hidden" class="form-control" required>
            <input name="catatan" value="Disetujui" type="hidden" class="form-control" required>
            <input name="status" value="Disetujui" type="hidden" class="form-control" required>
            <input name="role" value="<?=$this->session->userdata('role');?>"type="hidden" class="form-control" required>
       </div>
       <div class="form-group">
            <label for="">Tanggal Verifikasi</label>
            <input name="tgl_verifikasi_lp" value="<?=date('Y-m-d')?>" type="date" class="form-control" required>
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