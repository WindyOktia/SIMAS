<div class="row">
        <div class="col-md-12">
            <div class="card card-body border-info">
                <h6>Grafik Mutu Sekolah</h6>
                <div class="row">
                    <div class="col-md-8">
                    <canvas id="dashBobot" height="100"></canvas>
                    </div>
                    <div class="col-md-4">
                    <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Detail Informasi Item Penilaian</h6>
            <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Kinerja Guru </div>
                        <div class="col-md-6">: 90</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Kegiatan </div>
                        <div class="col-md-6">: 80</div>
                    </div>
                </li>
                </div>
            </div>
                <div class="row">
                    <div class="col md-12">
                    <a href="<?=base_url('admin/info')?>" class="btn btn-sm btn-success float-right mt-2">Lihat Detail</a>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="card card-body">
    <h4>Detail Informasi Mutu Sekolah</h4>
        <table class="table datatable-show-all">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tahun Akademik</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Nama Mutu Sekolah</th>
                    <th scope="col">Nilai Rata - Rata</th>
                <th scope="col">Aksi</th>
                </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach ($laporanmutu as $lapMutu):?>
            <tr>
            <td><?=$i++?></td>
				<td><b><?= $lapMutu['tahun_akademik']?></b></td>
				<td><?= $lapMutu['semester']?></td>
				<td><?= $lapMutu['keterangan']?></td>
				<td><?= $lapMutu['nilai']?></td>
               <td><a href="<?= base_url('admin/detailMutu')?>/<?= $lapMutu['id_mutu']?>" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
        <?php endforeach?>
        </tbody>
        </table>
</div>


<script>
var dash1 = document.getElementById('dashBobot').getContext('2d');
var dashBobot = new Chart(dash1, {
	type: 'line',
    data: {
        labels: ['2019 - Ganjil', '2019- Genap', '2020- Ganjil', '2020- Genap'],
        datasets: [{
            label: 'Kinerja Guru',
            data: [90, 90, 85, 95],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Kegiatan Siswa',
            data: [80, 90, 90, 85],
            borderColor: [
                '#20A39E'
               
            ],
            fill:false,
            borderWidth: 2
        },
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