<a href="<?=base_url('document/laporan')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>
<button type="button" class="btn btn-info mb-3 btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
  Edit
</button>
<button type="button" class="btn btn-success mb-3 btn-sm" data-toggle="modal" data-target="#modalTambah">
  Tambah Dokumen
</button>
<?php foreach ($joinlaporan as $dok):?>

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
                <div class="col-md-9">: <?= $dok['anggaran']?></div>
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
                <div class="col-md-9">: <?= $dok['tgl_pengajuan']?></div>
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
                    <a href="<?=base_url('document/deleteSingleDoc')?>/<?=$ars['id_trans_doc']?>/detailLaporan/<?=$id?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
                </div>
            </div>
            <?php endforeach?>
        </div>
    <?php endforeach ?>

    <!-- Modal Tambah Dokumen -->

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
                        <input type="hidden" name="backlink" value="detailLaporan">
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
</div>
<!-- End Modal Tambah -->
<!-- Modal Edit -->

<?php foreach($dokumenlaporan as $doclap):?>

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
        <form action="<?= base_url('document/updateLaporan')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
        <input name="id_user" type="hidden" class="form-control" required>
        <input name="id_laporan" value="<?=$id?>" type="hidden" class="form-control" required>
        <input name="back_id" value="<?=$id?>" type="hidden" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Latar Belakang</label>
            <textarea name="lb_laporan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['lb_laporan']?></textarea>
            <script>
                CKEDITOR.replace( 'lb_laporan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Tujuan</label>
            <textarea name="tujuan_laporan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['tujuan_laporan']?></textarea>
            <script>
                CKEDITOR.replace( 'tujuan_laporan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Laporan Jalannya Kegiatan</label>
            <textarea name="lp_jln_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['lp_jln_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'lp_jln_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Hasil Kegiatan</label>
            <textarea name="hasil_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['hasil_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'hasil_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Kendala</label>
            <textarea name="kendala_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['kendala_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'kendala_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Solusi</label>
            <textarea name="solusi_kegiatan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['solusi_kegiatan']?></textarea>
            <script>
                CKEDITOR.replace( 'solusi_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Kesimpulan</label>
            <textarea name="kesimpulan" class="form-control" id="" cols="30" rows="10" ><?=$doclap['kesimpulan']?></textarea>
            <script>
                CKEDITOR.replace( 'kesimpulan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Saran</label>
            <textarea name="saran" class="form-control" id="" cols="30" rows="10" ><?=$doclap['saran']?></textarea>
            <script>
                CKEDITOR.replace( 'saran',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Biaya Yang Didapat ( Rp. )</label>
            <input name="biaya_pendapatan"  value="<?=$doclap['biaya_pendapatan']?>" type="number" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Biaya Yang Dikeluarkan ( Rp. )</label>
            <input name="biaya_pengeluaran"  value="<?=$doclap['biaya_pengeluaran']?>" type="number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Tanggal Pengajuan Laporan</label>
            <input name="tgl_pengajuan_lp"  value="<?=$doclap['tgl_pengajuan_lp']?>" type="date" class="form-control" required>
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