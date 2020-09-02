<?php foreach($akademik as $akad):?>

<?php $split = explode(' / ', $akad['tahun_akademik']);

$tahun = $split[0];
$tahun2 = $split[1];

?>


<div class="card card-body">
    <h6><b>Setup Tahun Akademik</b></h6>
    <p>Ubah Tahun Akademik sesuai dengan yang sedang berjalan</p>

    <form action="<?=base_url('admin/updateAkademik')?>" method="post">
        <div class="form-group">
            <label for=""><b>Tahun Akademik</b></label>
            <div class="row">
                <div class="col-md-2">
                    <input type="hidden" class="form-control" name="id" value="<?=$akad['id_akademik']?>" required>
                    <input type="number" class="form-control" name="tahun" value="<?=$tahun?>" required>
                </div>
                <span class="my-auto"> / </span>
                <div class="col-md-2">
                    <input type="number" class="form-control" name="tahun2"  value="<?=$tahun2?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for=""><b>Semester</b></label>
            <select name="semester" class="form-control col-md-2" id="" required>
                <option value="Genap" <?php if($akad['semester']=='Genap'){echo 'selected';};?>>Genap</option>
                <option value="Ganjil" <?php if($akad['semester']=='Ganjil'){echo 'selected';};?>>Ganjil</option>
            </select>
        </div>
        <button type="submit" class="btn btn-sm btn-success float-right">Simpan Pengaturan</button>
    </form>

</div>

<?php endforeach?>