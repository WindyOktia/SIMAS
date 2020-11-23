<div class="card card-body">
    <h3>Detail Dashboard Presensi</h3>
    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                <select name="" id="" class="form-control">
                    <option value="">- Kriteria -</option>
                    <option value="">Hadir</option>
                    <option value="">Izin</option>
                    <option value="">Tugas</option>
                    <option value="">Tidak Hadir</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="" id="" class="form-control">
                    <option value="">- Pilih Kondisi -</option>
                    <option value="">Lebih Dari</option>
                    <option value="">Kurang Dari</option>
                </select>
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" placeholder="">
            </div>
            <div class="col-md-3">
                <button class="btn  btn-info">Cari</button>
            </div>
        </div>
    </div>
    <div class="card card-body border-info">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fa fa-info-circle mr-2 "></i>Detail Informasi</h5>
                <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Kehadiran Harian </div>
                        <div class="col-md-6">: 12</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Izin Harian </div>
                        <div class="col-md-6">: 12</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Tugas </div>
                        <div class="col-md-6">: 12</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-6">Tidak Hadir</div>
                        <div class="col-md-6">: 12</div>
                    </div>
                </li>
            </ol>
            </div>
            <div class="col-md-8">
                <canvas id="dashGuru" height="100"></canvas>
            </div>
        </div>
    </div>
    <div class="card">
    <div class="card-body">
        <legend>Daftar Guru</legend>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>NIP</th>
					<th style="width:30%">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1;foreach($guru as $guru):?>
				<tr>
					<td><?= $i++?></td>
					<td><b><?= $guru['nama_guru']?></b></td>
					<td><?= $guru['nip']?></td>
					<td>
						<a href="<?= base_url('admin/detailPresensi')?>/<?=$guru['id_guru']?>"class="btn btn-success btn-sm mb-1">Detail Presensi</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
</div>
</div>

<script>
var dash = document.getElementById('dashGuru').getContext('2d');
var dashGuru = new Chart(dash, {
    type: 'line',
    data: {
        labels: ['2019 - Ganjil', '2019- Genap', '2020- Ganjil', '2020- Genap'],
        datasets: [{
            label: 'Kehadiran Harian',
            data: [90, 90, 85, 95],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Izin Harian',
            data: [80, 90, 90, 85],
            borderColor: [
                '#20A39E'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Tugas',
            data: [90, 95, 95, 90],
            borderColor: [
                '#CC4BC2'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Tidak Hadir',
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