
<a href="<?=base_url('document/proposal')?>" class="btn btn-primary btn-sm mb-3">Kembali</a>
<?php foreach ($dokumen as $dok):?>

<div class="card card-body border-success">
<h4><b>Detail Dokumen Proposal Kegiatan</b></h4>
    <ul>
        <li>
            <div class="row">
                <div class="col-md-3">Nama Kegiatan</div>
                <div class="col-md-9">: <?= $dok['nama_kegiatan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tahun Akademik</div>
                <div class="col-md-9">: <?= $dok['tahun_akademik']?> - <?= $dok['semester']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tanggal Pelaksanaan</div>
                <div class="col-md-9">: <?= $dok['tgl_pelaksanaan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tempat</div>
                <div class="col-md-9">: <?= $dok['tempat']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Total Rancangan Anggaran</div>
                <div class="col-md-9">: <?= $dok['tot_anggaran']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-3">Tanggal Pengajuan Proposal</div>
                <div class="col-md-9">: <?= $dok['tgl_pengajuan']?></div>
            </div>
        </li>
    </ul>
    <h6><b>Latar Belakang Kegiatan </b></h6>
    <?= $dok['lb_kegiatan']?> <br>
    <h6><b>Tujuan Kegiatan </b></h6>
    <?= $dok['tujuan_kegiatan']?> <br>
    <h6><b>Harapan Kegiatan </b></h6>
    <?= $dok['harapan_kegiatan']?> <br> <br>
    <h6><b>Arsip Dokumen</b></h6>
    <div class="row ml-2">
        <div class="col-1">1</div>
        <div class="col-3">Judul</div>
        <div class="col-2">
            <a href=""  class="btn btn-info btn-sm">download</a>
            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
        </div>
    </div>
</div>
<?php endforeach ?>