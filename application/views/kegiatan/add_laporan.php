<legend>Tambah Laporan Kegiatan SMA Bopkri 1 Yogyakarta</legend>

<a href="<?=base_url('document/laporan')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah dokumen Laporan Kegiatan</b></h5><br>
    <form action="<?=base_url('document/do_addLaporan')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="">Nama Kegiatan</label>
            <select name="id_proposal" id="" class="form-control">
                <?php foreach($proposal as $prop):?>
                <option value="<?=$prop['id_proposal']?>"><?=$prop['nama_kegiatan']?></option>
                <?php endforeach?>
            </select>
        </div>

       <div class="form-group">
            <label for="">Latar Belakang</label>
            <input name="lb_laporan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Tujuan</label>
            <input name="tujuan_laporan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Laporan Jalannya Kegiatan</label>
            <input name="lp_jln_kegiatan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Hasil Kegiatan</label>
            <input name="hasil_kegiatan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Permasalahan dan Kendala</label>
            <input name="kendala_kegiatan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Upaya Pencegahan Permasalahan</label>
            <input name="solusi_kegiatan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Kesimpulan</label>
            <input name="kesimpulan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">saran</label>
            <input name="saran" type="text" class="form-control" required>
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
            <label for="">Total Biaya ( Rp. )</label>
            <input name="tot_biaya" type="number" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Tanggal Pengajuan Laporan</label>
            <input name="tgl_pengajuan_lp" type="date" class="form-control" required>
       </div>

        <button type="submit" class="btn btn-success float-right">Simpan Laporan</button>
    </form>
</div>