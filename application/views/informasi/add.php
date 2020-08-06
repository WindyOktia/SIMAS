<a href="<?=base_url('admin/informasi')?>" class="btn btn-secondary btn-sm mb-3">Kembali</a>

<div class="card card-body">
    <h5><b>Daftar Informasi</b></h5>
    <br>
    <form action="<?=base_url('admin/addInformasi')?>" method="post">
        <div class="form-group">
            <label for="">Judul Informasi</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-success float-right">Publish</button>
    </form>
</div>