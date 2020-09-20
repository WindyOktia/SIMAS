<a href="<?=base_url('admin/mutu')?>" class="btn btn-sm btn-secondary mb-3">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah Mutu Sekolah</b></h5><br>
    <form action="<?=base_url('admin/addMutunilai')?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <div class="row">
                        <div class="col-3">
                            <input type="text" name="th_akademik1"  class="form-control">
                        </div>
                        <span class="my-auto">/</span>
                        <div class="col-3">
                            <input type="text" name="th_akademik2"  class="form-control">
                        </div>
                    </div>
        </div>

        <div class="form-group">
                    <label for="">Semester</label>
                    <div class="row">
                        <div class="col-3">
                            <select name="semester" id="" class="form-control">
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
        </div> <br>

        <div class="form-group">
                    <label for="">Nilai</label>
                    <div class="row">
                        <div class="col-3">
                        <input name="nilai"  type="text" class="form-control" required>
                        </div>
        </div><br>

        <div class="form-group">
                    <label for="">Keterangan</label>
                    <div class="row">
                        <div class="col-6">
                        <textarea  rows="4" cols="60" name="keterangan"  class="form-control" required> </textarea>
                        </div>
        </div><br>

       <div class="form-group">
            <label for="">Lampiran File</label>
            <input type="hidden" name="judul[]" placeholder="" value="lampiran_file" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-success float-right">Tambah</button>
    </form>
</div>