<a href="<?=base_url('admin/')?>" class="btn btn-sm btn-secondary mb-3">Kembali</a>
<div class="card card-body">
<?php foreach ($detailmutu as $detMutu):?> 
    <h4>Detail Mutu Sekolah</h4>
    <ul>
        <li>
            <div class="row">
                <div class="col-md-2">Tahun Akademik</div>
                <div class="col">:<?= $detMutu['tahun_akademik']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-2">Semester</div>
                <div class="col">:<?= $detMutu['semester']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-2">Nama Mutu Sekolah</div>
                <div class="col">:<?= $detMutu['keterangan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-2">Nilai</div>
                <div class="col">:<?= $detMutu['nilai']?></div>
            </div>
        </li>
        <a href="<?= base_url('admin/downloadMutu')?>/<?=$detMutu['id_mutu']?>" class="btn btn-success btn-sm float-right mt-2">Unduh</a>
    </ul>
<?php endforeach?>
</div>