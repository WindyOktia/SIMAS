<div class="card card-body border-warning mt-2">
    <form action="" id="filterRentang" method="get">
        <div class="form-group my-auto">
            <!-- <label for="">Filter Tahun Akademik</label> -->
            <div class="form-check form-check-switchery">
                <label class="form-check-label">
                    <input type="checkbox" name="rentang" id="useRentang" class="form-check-input-switchery" data-fouc 
                    <?php if(isset($_GET['rentang'])&&$_GET['rentang']=='on'){echo 'checked';};?>
                    >
                    Rentang Tahun
                </label>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <select name="dari" id="" class="form-control">
                        <option value="semua">semua tahun</option>
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                    </select>
                </div>
                <?php if(isset($_GET['rentang'])&&$_GET['rentang']=='on'){?>
                <span class=" my-auto"> sampai </span>
                <div class="col-md-2">
                    <select name="sampai" id="" class="form-control">
                        <option value="semua">semua tahun</option>
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                    </select>
                </div>
                <?php };?>
                <div class="col-md-2">
                    <select name="semester" id="" class="form-control">
                        <option value="semua" >semua semester</option>
                        <option value="Genap" >Genap</option>
                        <option value="Ganjil" >Ganjil</option>
                    </select>
                </div>
                <div class="col-md-2 ml-5">
                    <button type="submit" class="btn btn-success btn-block ">Filter Data</button>
                </div>
                <div class="col-md-2 ml-5">
                   <a href="<?=base_url('admin/detailPresensi')?>" class="btn btn-danger btn-block">Hapus Filter</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php if(isset($_GET['dari'])||isset($_GET['sampai'])||isset($_GET['semester'])){?>
    <h6> <i class="	fa fa-clock-o mr-2"></i>Rekam jejak nilai dari tahun akademik <b><?=$_GET['dari']?></b> 

    <?php if(isset($_GET['sampai'])){?>
        sampai <b><?=$_GET['sampai']?></b> 
    <?php } ; ?>
    
    | semester <?=$_GET['semester']?> </h6>
<?php } else { ?>
    <h6> <i class="	fa fa-clock-o mr-2"></i>Rekam jejak nilai dalam 2 tahun terakhir </h6>
<?php } ;?>

<div class="row">
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Rata - rata kehadiran</h5>
            <h3 class="text-center"><b>56 </b> hari</h3>
            <a href="" class="btn btn-sm btn-info btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Rata - rata keterlambatan</h5>
            <h3 class="text-center"><b>1 </b> x</h3>
            <a href="" class="btn btn-sm btn-info btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-success">
            <h5 class="text-center">Rata - rata kelebihan jam</h5>
            <h3 class="text-center"><b>0 </b> x</h3>
            <a href="" class="btn btn-sm btn-info btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    <div class="col">
        <div class="card card-body border-danger">
            <h5 class="text-center">Rata - rata ketidakhadiran</h5>
            <h3 class="text-center"><b>8 </b> x</h3>
            <a href="" class="btn btn-sm btn-danger btn-block">Lihat Detail <i class="fa fa-arrow-circle-right ml-2"></i></a>
        </div>
    </div>
    
</div>

<h6> <i class="	fa fa-clock-o mr-2"></i>Grafik perubahan nilai dalam 2 tahun terakhir </h6>

<div class="card card-body ">
<canvas id="chartTrack"  height="350"></canvas>
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

<script>
var chartTrack = document.getElementById('chartTrack').getContext('2d');
var chartTrack_graph = new Chart(chartTrack, {
    type: 'line',
    data: {
        labels: ['2018 / 2019 - Ganjil', '2018 / 2019 - Genap', '2019 / 2020 - Ganjil', '2019 / 2020 - Genap'],
        datasets: [{
            label: 'Kepuasan Siswa',
            data: [86, 88, 86, 89],
            borderColor: [
                '#3A3042'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Kehadiran Harian',
            data: [90, 90, 88, 95],
            borderColor: [
                'rgba(255, 99, 132, 1)'
               
            ],
            fill:false,
            borderWidth: 2
        },
        {
            label: 'Kehadiran Mengajar',
            data: [86, 90, 92, 85],
            borderColor: [
                '#20A39E'
               
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