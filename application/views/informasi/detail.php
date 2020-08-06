<a href="<?=base_url('admin/informasi')?>" class="btn btn-secondary btn-sm mb-3">Kembali</a>

<?php foreach($informasi as $info):?>
<div class="card card-body">
    <h5><b>Daftar Informasi</b></h5>
    <br>
    <form action="<?=base_url('admin/editInfo')?>" method="post">
        <div class="form-group">
            <label for="">Judul Informasi</label>
            <input type="hidden" name="id" class="form-control" value="<?=$info['id_informasi']?>" required>
            <input type="text" name="judul" class="form-control" value="<?=$info['judul_informasi']?>" required>
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"><?=$info['detail_informasi']?></textarea>
        </div>
        <button type="submit" class="btn btn-success float-right">Publish</button>
    </form>
</div>
<?php endforeach ?>