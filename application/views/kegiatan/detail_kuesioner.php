<div class="card mb-3 border-info">
    <div class="card-header-tab card-header">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
            <i class="header-icon fa fa-info-circle"> </i>Detail Informasi
        </div>  
    </div>
    <div class="card-body">
    <?php foreach ($kuesionerID as $detail) : ?>
        <h3><?= $detail['nama_kegiatan']; ?></h3>
        <p><?= $detail['deskripsi']; ?></p>
        <p class="text-danger float-right">Batas Isi Kuesioner : <?= $detail['tgl_selesai']; ?></p>
        <input type="hidden" name="id_kuesioner" id="" value="<?= $detail['id_kuesioner']; ?>">
    </div>
</div>   

<div class="card mb-3 ">
    <div class="card-header-tab card-header">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
            <i class="header-icon fa fa-bars"> </i>Kuesioner
        </div> 
    </div>
    <!-- start soal -->
    <div class="card-body">
        <?php $i = 1; foreach ($pertanyaan as $soal) { ?>
                <label for="pertanyaan"><?= $i ?>. <?= $soal['pertanyaan']; ?></label>
                <input type="hidden" name="pertanyaan[]" value="<?= $soal['id_pertanyaan']; ?>"> 
                <div class="position-relative form-group ml-3">
                    <div class="form-row ml-3"> 
                        <?php foreach ($jawaban as $jawab):?>
                            <div class="custom-radio custom-control col-md-2">
                            <input type="radio" id="exampleCustomRadio1<?=$i?>" name="opsi[<?=$i?>]" value="<?= $jawab['skor_jawaban']; ?>" class="">
                            <label class="" for="exampleCustomRadio1<?=$i?>"><?= $jawab['jawaban']; ?></label>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
        <?php $i++;} ?>
        <?php endforeach; ?>
        <div class="form-group">
            <label class="mt-4" for="username">Saran / Masukan</label>
            <div>
                <textarea id="exampleText" class="form-control" name="saran" placeholder="" required></textarea>
            </div>
        </div>
    </div>
    <!-- end soal -->
</div>   