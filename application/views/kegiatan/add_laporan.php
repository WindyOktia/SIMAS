<legend>Tambah Laporan Kegiatan SMA Bopkri 1 Yogyakarta</legend>

<a href="<?=base_url('document/laporan')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah dokumen Laporan Kegiatan</b></h5><br>
    <form action="<?=base_url('document/do_addLaporan')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="id_user" type="hidden" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Nama Kegiatan</label>
            <select name="id_proposal" id="" class="form-control">
                <?php foreach($idproposal as $idprop):?>
                <option value="<?=$idprop['id_proposal']?>"><?=$idprop['nama_kegiatan']?> - <?=$idprop['tahun_akademik']?> - <?=$idprop['semester']?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Latar Belakang</label>
            <textarea name="lb_laporan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'lb_laporan',{height:250} );
            </script>
       </div>
        
        <div class="form-group">
            <label for="">Tujuan</label>
            <textarea name="tujuan_laporan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'tujuan_laporan',{height:250} );
            </script>
       </div>

        <div class="form-group">
            <label for="">Laporan Jalannya Kegiatan</label>
            <textarea name="lp_jln_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'lp_jln_kegiatan',{height:250} );
            </script>
        </div>

        <div class="form-group">
            <label for="">Hasil Kegiatan</label>
            <textarea name="hasil_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'hasil_kegiatan',{height:250} );
            </script>
        </div>

        <div class="form-group">
            <label for="">Permasalahan dan Kendala</label>
            <textarea name="kendala_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'kendala_kegiatan',{height:250} );
            </script>
        </div>

        <div class="form-group">
            <label for="">Upaya Pencegahan Permasalahan</label>
            <textarea name="solusi_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'solusi_kegiatan',{height:250} );
            </script>
        </div>

        <div class="form-group">
            <label for="">Kesimpulan</label>
            <textarea name="kesimpulan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'kesimpulan',{height:250} );
            </script>
        </div>

        <div class="form-group">
            <label for="">saran</label>
            <textarea name="saran" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'saran',{height:250} );
            </script>
        </div>

            <div class="form-group">
            <label for="">Peserta</label>
            <input type="hidden" name="judul[]" placeholder="" value="Peserta" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="">Pembiayaan</label>
            <input type="hidden" name="judul[]" placeholder="" value="Rincian Biaya" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Sumber Dana</label>
            <input type="hidden" name="judul[]" placeholder="" value="Sumber Dana Laporan" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Lampiran</label>
            <input type="hidden" name="judul[]" placeholder="" value="Lampiran" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="">Biaya Yang Didapat ( Rp. )</label>
            <input name="biaya_pendapatan" type="number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Biaya Yang Dikeluarkan ( Rp. )</label>
            <input name="biaya_pengeluaran" type="number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Tanggal Pengajuan Laporan</label>
            <input name="tgl_pengajuan_lp" value="<?=date('Y-m-d')?>" type="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success float-right">Simpan Laporan</button>
    </form>
</div>