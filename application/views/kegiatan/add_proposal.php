
<!-- <legend>Tambah Proposal Kegiatan SMA Bopkri 1 Yogyakarta</legend> -->

<a href="<?=base_url('document/proposal')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah dokumen Proposal Kegiatan</b></h5><br>
    <form action="<?=base_url('Document/do_addProposal')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <input name="role" type="hidden" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Nama Kegiatan</label>
            <input name="nama_kegiatan" type="text" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" name="tahun_akademik_1" class="form-control" required>
                        </div>
                        <span class="mx-auto my-auto">/</span>
                        <div class="col">
                            <input type="number" name="tahun_akademik_2" class="form-control" required>
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
            <textarea name="lb_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'lb_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Tujuan</label>
            <textarea name="tujuan_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'tujuan_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Hasil Yang diharapkan</label>
            <textarea name="harapan_kegiatan" class="form-control" id="" cols="30" rows="10" ></textarea>
            <script>
                CKEDITOR.replace( 'harapan_kegiatan',{height:250} );
            </script>
       </div>

       <div class="form-group">
            <label for="">Tanggal Pelaksanaan</label>
            <input name="tgl_pelaksanaan" type="date" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Tempat</label>
            <input name="tempat" type="text" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Rincian Peserta</label>
            <input type="hidden" name="judul[]" placeholder="" value="Peserta" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="">Rincian Agenda</label>
            <input type="hidden" name="judul[]" placeholder="" value="Rincian Agenda" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Rencana Anggaran</label>
            <input type="hidden" name="judul[]" placeholder="" value="Rincian Anggaran" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Sumber Dana</label>
            <input type="hidden" name="judul[]" placeholder="" value="Sumber Dana" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="">Total Rancangan Anggaran ( Rp. )</label>
            <input name="tot_anggaran" type="number" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Tanggal Pengajuan Proposal</label>
            <input name="tgl_pengajuan" type="date" class="form-control" required>
       </div>


        <button type="submit" class="btn btn-success float-right">Simpan Proposal</button>
    </form>
</div>