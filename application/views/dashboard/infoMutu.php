<h3><i class="fa fa-info-circle mr-1"></i>Dashbord Mutu Sekolah</h3>
<div class="card card-body border-info mt-2">
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

                <input type="hidden" name="key1" value="true">

                    <select name="dari" id="" class="form-control">
                        <option value="semua">semua tahun</option>
                        <?php foreach ($tahun_akademik as $th_1): ?>
                        <option value="<?=$th_1['tahun_akademik']?>"
                            <?php if (isset($_GET['dari']) && $_GET['dari'] == $th_1['tahun_akademik'])
                            {
                                echo 'selected';
                            }
                            ?>
                        ><?=$th_1['tahun_akademik']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php if(isset($_GET['rentang'])&&$_GET['rentang']=='on'){?>
                <span class=" my-auto"> sampai </span>
                <div class="col-md-2">
                    
                <input type="hidden" name="key2" value="true">


                    <select name="sampai" id="" class="form-control">
                        <option value="semua">semua tahun</option>
                        <?php foreach ($tahun_akademik as $th_2): ?>
                        <option value="<?=$th_2['tahun_akademik']?>"
                        <?php if (isset($_GET['sampai']) && $_GET['sampai'] == $th_2['tahun_akademik'])
                            {
                                echo 'selected';
                            }
                            ?>
                        ><?=$th_2['tahun_akademik']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php };?>
                <div class="col-md-2">
                    <select name="semester" id="" class="form-control">
                        <option value="semua" >semua semester</option>
                        <option value="Genap" 
                        <?php if (isset($_GET['semester']) && $_GET['semester'] == 'Genap')
                            {
                                echo 'selected';
                            }
                            ?>
                        >Genap</option>
                        <option value="Ganjil" 
                        <?php if (isset($_GET['semester']) && $_GET['semester'] == 'Ganjil')
                            {
                                echo 'selected';
                            }
                            ?>
                        >Ganjil</option>
                    </select>
                </div>
                <div class="col-md-2 ml-5">
                    <button type="submit" class="btn btn-success btn-block ">Filter Data</button>
                </div>
                <div class="col-md-2 ml-3">
                   <a href="<?=base_url('admin/info')?>" class="btn btn-danger btn-block">Hapus Filter</a>
                </div>
            </div>
        </div>
    </form>
</div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body border-info">
                <h6>Grafik Nilai Guru</h6>
                <div class="row">
                    <div class="col-md-8">
                    <canvas id="dashGuru" width="100" height="100"></canvas>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Tahun Ajaran</b></h5>
                        2 Tahun Terakhir
                        <div class="mb-3"></div>
                        <h5><b>Persentase</b></h5>
                        Baik : <br>
                        Kurang Baik : 
                    </div>
                </div>
                <a href="<?=base_url('admin/detailRecordPresensi')?>" class="btn btn-sm btn-info float-right mt-3">Lihat Detail</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body border-info">
                <h6>Grafik Kegiatan Siswa</h6>
                <div class="row">
                    <div class="col-md-8">
                    <canvas id="dashSiswa" width="100" height="100"></canvas>
                    </div>
                    <div class="col-md-4">
                        <h5><b>Tahun Ajaran</b></h5>
                        2 Tahun Terakhir
                        <div class="mb-3"></div>
                        <h5><b>Persentase</b></h5>
                        <?php foreach ($nilai_kegiatan as $nilai): ?>
                            <?php 
                                if($nilai['Baik']==null||$nilai['Cukup']==null||$nilai['Kurang']==null){
                                    $baik = 0;
                                    $cukup=0;
                                    $kurang=0;
                                }else if($nilai['Baik']==0 && $nilai['Cukup']==0 && $nilai['Kurang']==0){
                                    $baik = 0;
                                    $cukup=0;
                                    $kurang=0;
                                }else{
                                    $baik=$nilai['Baik'] / ($nilai['Baik'] + $nilai['Cukup'] + $nilai['Kurang']) * 100;
                                    $cukup=$nilai['Cukup'] / ($nilai['Baik'] + $nilai['Cukup'] + $nilai['Kurang']) * 100;
                                    $kurang=$nilai['Kurang'] / ($nilai['Baik'] + $nilai['Cukup'] + $nilai['Kurang']) * 100;
                                }
                            ?>
                        Baik    : <?= number_format($baik,2); ?> %<br>
                        Cukup   : <?= number_format($cukup,2); ?> %<br>
                        Kurang  : <?= number_format($kurang,2); ?> %
                        <?php endforeach ?>
                                <br>
                                <br>
                    </div>
                </div>
                <?php if(!isset($_GET['key1'])&& !isset($_GET['key2'])){?>
                <a href="<?=base_url('admin/info_kegiatan')?>" class="btn btn-sm btn-info float-right mt-3">Lihat Detail</a>
                <?php }?>
                <?php if(isset($_GET['key1'])&& !isset($_GET['key2'])){?>
                <a href="<?=base_url('admin/info_kegiatan')?>?key1=<?=$_GET['dari']?>&semester=<?=$_GET['semester']?>" class="btn btn-sm btn-info float-right mt-3">Lihat Detail</a>
                <?php }?>
                <?php if(isset($_GET['key1'])&& isset($_GET['key2'])){?>
                <a href="<?=base_url('admin/info_kegiatan')?>?key1=<?=$_GET['dari']?>&key2=<?=$_GET['sampai']?>&semester=<?=$_GET['semester']?>" class="btn btn-sm btn-info float-right mt-3">Lihat Detail</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>


<script>
var dash = document.getElementById('dashGuru').getContext('2d');
var dashGuru = new Chart(dash, {
	type: 'pie',
	data: {
		labels: ['Baik', 'Kurang Baik'],
		datasets: [{
			label: '# of Votes',
			data: [12, 19],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)'
			],
			borderWidth: 2
		}]
	}
});
var dash1 = document.getElementById('dashSiswa').getContext('2d');
var dashSiswa = new Chart(dash1, {
	type: 'pie',
	data: {
		labels: [
            'Baik', 'Cukup', 'Kurang'
            ],
		datasets: [{
			label: '# of Votes',
			data: [
               <?= number_format($baik,2) ; ?>,
               <?= number_format($cukup,2) ; ?>,
               <?= number_format($kurang,2) ; ?>
            ],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)'
			],
			borderWidth: 2
		}]
	}
});
</script>