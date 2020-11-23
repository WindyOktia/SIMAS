<div class="card card-body border-info">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fa fa-info-circle mr-2 "></i>Detail Informasi Rekam Jejak Anggaran</h5>
                <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Anggaran Masuk </div>
                        <div class="col-md-6">: Rp. 5.250.000</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Dana Masuk </div>
                        <div class="col-md-6">: Rp. 7.750.000</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Dana Pengeluaran </div>
                        <div class="col-md-6">: Rp. 6.750.000</div>
                    </div>
                </li>
            </ol>
            </div>
            <div class="col-md-8">
                <canvas id="dashKegiatan" height="100"></canvas>
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
				<td><?= number_format($info['rata_anggaran'],2)?></td>
				<td><?= number_format($info['rata_pendapatan'],2)?></td>
				<td><?= number_format($info['rata_pengeluaran'],2)?></td>
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
        labels: ['2019 - Ganjil', '2019- Genap', '2020- Ganjil', '2020- Genap'],
        datasets: [{
            label: 'Dana Anggaran',
            data: [90, 90, 85, 95],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Dana Masuk',
            data: [80, 90, 90, 85],
            borderColor: [
                '#20A39E'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Dana Pengeluaran',
            data: [90, 95, 95, 90],
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