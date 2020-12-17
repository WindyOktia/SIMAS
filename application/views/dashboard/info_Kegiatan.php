<?php
    $anggaran = array();
    $d_masuk = array();
    $d_pengeluaran = array();
    foreach ($rekam_jejak as $r){
            $anggaran[]+= $r['Anggaran_masuk'];
            $d_masuk[]+= $r['Dana_masuk'];
            $d_pengeluaran[]+= $r['Dana_pengeluaran'];
    }
    $an_masuk = array_sum($anggaran);
    $dana_masuk = array_sum($d_masuk);
    $dana_pengeluaran = array_sum($d_pengeluaran);
?>
<div class="card card-body border-info">
        <div class="row">
            <div class="col-md-4 float-right">
                <h5><i class="fa fa-info-circle mr-2 "></i>Detail Informasi Rekam Jejak Anggaran</h5>
                <ol>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Dana Anggaran </div>
                        <div class="col-md-6">: Rp. <?= number_format($an_masuk,2)?></div>
                    </div>
                    
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Dana Masuk </div>
                        <div class="col-md-6">: Rp. <?= number_format($dana_masuk,2)?></div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Dana Pengeluaran </div>
                        <div class="col-md-6">: Rp. <?= number_format($dana_pengeluaran,2)?></div>
                    </div>
                </li>
            </ol>
            </div>
            <div class="col-md-8">
                <canvas id="dashKegiatan" height="100"></canvas>
                <a href="<?=base_url('admin/unduhSemuaKegiatan')?>" class="btn btn-sm btn-success float-right ">Unduh</a>
            </div>
            
        </div>
    </div>
        


<div class="card card-body">
    <h4>Detail Informasi Kegiatan Sekolah</h4>
        <table class="table datatable-show-all">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tahun Akademik</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Rata - Rata Anggaran</th>
                    <th scope="col">Rata - Rata Dana Masuk</th>
                    <th scope="col">Rata - Rata Pengeluaran</th>
                    <th scope="col">Kegiatan Terlaksana</th>
                <th scope="col">Aksi</th>
                </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach ($info_keuangan as $info):?>
        <?php 
            $expAkad = explode(' / ',$info['tahun_akademik']); 
        ?>
            <tr>
            <td><?=$i++?></td>
				<td><b><?= $info['tahun_akademik']?></b></td>
				<td><b><?= $info['semester']?></b></td>
				<td>Rp. <?= number_format($info['rata_anggaran'],2)?></td>
				<td>Rp. <?= number_format($info['rata_pendapatan'],2)?></td>
				<td>Rp. <?= number_format($info['rata_pengeluaran'],2)?></td>
				<td><?= $info['terlaksana']?></td>
               <td><a href="<?= base_url('admin/laporan_waka')?>?key1=<?=$info['tahun_akademik']?>&semester=<?= $info['semester']?>" class="btn btn-primary btn-sm">Lihat Dasbord</a></td>
            </tr>
        <?php endforeach?>
        </tbody>
        </table>
</div>


<script>
var dash = document.getElementById('dashKegiatan').getContext('2d');
var dashKegiatan = new Chart(dash, {
    type: 'line',
    data: {
        labels: [
            <?php foreach ($rekam_jejak as $rekam_tahun):?>
            '<?=$rekam_tahun['tahun_akademik']?>-<?=$rekam_tahun['semester']?>',
            <?php endforeach ?>
        ],
        datasets: [{
            label: 'Dana Anggaran',
            data: [
                <?php foreach ($rekam_jejak as $rekam_anggaran1):?>
            '<?=$rekam_anggaran1['Anggaran_masuk']?>',
            <?php endforeach ?>
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Dana Masuk',
            data: [
                <?php foreach ($rekam_jejak as $rekam_masuk1):?>
            '<?=$rekam_masuk1['Dana_masuk']?>',
            <?php endforeach ?>
            ],
            borderColor: [
                '#20A39E'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Dana Pengeluaran',
            data: [
                <?php foreach ($rekam_jejak as $rekam_pengeluaran1):?>
            '<?=$rekam_pengeluaran1['Dana_pengeluaran']?>',
            <?php endforeach ?>
            ],
            borderColor: [
                '#CC4BC2'
               
            ],
            fill:false,
            borderWidth: 2
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                }
            }]
        }
    }
});
</script>