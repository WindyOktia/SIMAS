<div class="card card-body">
<h3>Detail Laporan Pendanaan</h3>
    <div class="card card-body">
    <?php foreach ($nama_kegiatan as $nm_kegiatan):?> 
    <div class="row">
        <div class="col-md-4">
            <h6> <i class="fa fa-info-circle mr-2 mt-3"></i>Grafik Keuangan Kegiatan</h6>
            <ol>
            
                <li>
                    <div class="row h6">
                        <div class="col-md-12">Rata-Rata Anggaran</div>
                        <div class="col-md-12"><?=$nm_kegiatan['tot_anggaran'];?></div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-12">Rata-Rata Pendapatan Biaya </div>
                        <div class="col-md-12 ">Rp.2.500.000</div>
                    </div>
                </li>
                <li>
                    <div class="row h6">
                        <div class="col-md-12">Rata-Rata Pengeluaran Biaya </div>
                        <div class="col-md-12">Rp.2.800.000</div>
                    </div>
                </li>
            </ol>
        </div>
    <?php endforeach; ?>
        <div class="col-md-8">
           <h5><b> </b></h5>
           <canvas id="dashPendanaan"  height=""></canvas>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col md-12">
        <a href="<?=base_url('')?>" class="btn btn-sm btn-success float-right mt-2">Unduh</a>
        </div>
    </div>
    </div>

</div>

<script>
var chart = document.getElementById('dashPendanaan').getContext('2d');
var chartBiaya = new Chart(chart, {
	type: 'bar',
	data: {
		labels: ['Basket', 'Futsal','Renang','Bulutangkis','Catur'],
		datasets: [{
			label: 'Anggaran',
			data: [12, 19, 10, 17, 2],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 99, 132, 0.2)',
			],
            borderWidth: 2 ,
            fill: true
        },
        {
            label: 'Pengeluaran Biaya',
			data: [5, 12, 16, 19, 22],
			backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
			],
            borderWidth: 2 ,
            fill: true
            
        },
        {
            label: 'Pendapatan Biaya',
			data: [6, 10, 15, 20, 25],
			backgroundColor: [
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                '#EE4B6A',
                
                
			],
            borderWidth: 2 ,
            fill: true
            
        }
    ]
}
});
</script>