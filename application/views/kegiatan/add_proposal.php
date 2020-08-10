<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <?php endif; ?>

<legend>Tambah Proposal Kegiatan SMA Bopkri 1 Yogyakarta</legend>
<!-- <form action="<?= base_url('admin/addProposal')?>" method="post">
    <div class="row">
        <div class="col mx-auto my-auto">
			<button class="btn btn-primary btn-sm">Tambah Proposal</button>
        </div>
    </div>
</form> -->

<a href="<?=base_url('admin/proposal')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah dokumen Proposal Kegiatan</b></h5><br>
    <form action="<?=base_url('dokumen/do_addPenelitian')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="">Nama Kegiatan</label>
            <input name="tema_penelitian" type="text" class="form-control" required>
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
                        <option value="1">Ganjil</option>
                        <option value="2">Genap</option>
                    </select>
                </div>
            </div>
        </div>
               
       <div class="form-group">
            <label for="">Tujuan</label>
            <input name="judul_kegiatan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Hasil Yang diharapkan</label>
            <input name="judul_kegiatan" type="text" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Tanggal Pelaksanaan</label>
            <input name="judul_kegiatan" type="date" class="form-control" required>
       </div>

       <div class="form-group">
            <label for="">Tempat</label>
            <input name="judul_kegiatan" type="text" class="form-control" required>
       </div>

        <!-- Serial Code -->

       <!-- <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Keanggotaan</label>
                    <select name="" id="anggota" class="form-control border-warning" required>
                        <option value="" selected disabled>- pilih -</option>
                        <option value="1">Dengan Anggota</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="valAnggota"></div>

       <div id="danaContainer">
            <div class="row" id="parentDana">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Rincian Agenda Kegiatan</label>
                        <input name="sumber_dana[]" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Waktu Mulai Kegiatan</label>
                        <input name="sumber_dana[]" type="time" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Waktu Selesai Kegiatan</label>
                        <div class="row">
                            <div class="col">
                                <input type="time" name="jumlah[]" class="form-control" required>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success addDana">Tambah Agenda</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="danaContainer">
            <div class="row" id="parentDana">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Rincian Pengeluaran Kegiatan</label>
                        <input name="sumber_dana[]" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="">Jumlah ( Rp. )</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" name="jumlah[]" class="form-control" required>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success addDana">Tambah Dana</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Total Pengeluaran</label>
            <input type="number" name="sitasi" class="form-control col-2">
        </div>

        <div id="danaContainer">
            <div class="row" id="parentDana">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Sumber Dana</label>
                        <input name="sumber_dana[]" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="">Jumlah ( Rp. )</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" name="jumlah[]" class="form-control" required>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success addDana">Tambah Dana</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- End Serial Code -->

        <div class="form-group">
            <label for="">Rincian Peserta</label>
            <input type="hidden" name="judul[]" placeholder="" value="Surat Tugas" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="">Rincian Agenda</label>
            <input type="hidden" name="judul[]" placeholder="" value="Surat Kontrak" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Rencana Anggaran</label>
            <input type="hidden" name="judul[]" placeholder="" value="Laporan" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Sumber Dana</label>
            <input type="hidden" name="judul[]" placeholder="" value="Proposal" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="">Total Rancangan Anggaran ( Rp. )</label>
            <input name="judul_kegiatan" type="number" class="form-control" required>
       </div>

        <div class="form-group">
            <label for="">Tanggal Pengajuan Proposal</label>
            <input name="judul_kegiatan" type="date" class="form-control" required>
       </div>

        <!-- <h6><b>Dokumen Lain | </b>pdf / docx / png / jpg / jpeg</h6>
        
        
        <div class="input_fields_wrap">
            <div class="row mb-2">
                <div class="col-5">
                    <label for="">Judul Dokumen</label>
                    <input type="text" name="judul[]" placeholder="" class="form-control-file">
                </div>
                <div class="col-3">
                    <label for="">Pilih Arsip</label>
                    <input type="file" name="arsip[]" class="form-control-file">
                </div>
                <button type="button" class="btn btn-sm btn-secondary moreFile col-2">Tambah Lagi</button>
            </div>
        </div> -->

        <button type="submit" class="btn btn-success float-right">Simpan Proposal</button>
    </form>
</div>