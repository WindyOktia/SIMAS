<div class="card card-body">
    <h3>Dashboard</h3>
    <div class="form-group">
    <select name="" id="" class="form-control col-3">
        <option value="">- Tahun Ajaran -</option>
        <option value="">- 2016 -</option>
        <option value="">- 2017 -</option>
        <option value="">- 2018 -</option>
        <option value="">- 2019 -</option>
        <option value="">- 2020 -</option>
    </select>
    </div>
        <div class="col">
            <div class="card card-body border-info">
                <h6>Grafik Track Record Guru 2 Tahun Akhir</h6>
                <div class="row">
                    <div class="col-md-12">
                    <canvas id="dashSiswa" height="80"></canvas>
                    </div>
                    <!-- <div class="col-md-4">
                        <h5><b>Tahun Ajaran</b></h5>
                        2 Tahun Terakhir
                        <div class="mb-3"></div>
                        <h5><b>Kriteria</b></h5>
                        Baik : <br>
                        Kurang Baik : 
                    </div> -->
                </div>
            </div>
            <td><a href="" class="btn btn-sm btn-success float-right">Export</a></td>
        </div>
    </div>
</div>

<script>
var dash1 = document.getElementById('dashSiswa').getContext('2d');
var dashSiswa = new Chart(dash1, {
	type: 'line',
	data: {
		labels: ['2016', '2017','2018','2019','2020'],
		datasets: [{
			label: '# of Votes',
			data: [12, 19, 10, 17, 2],
			borderColor: [
				'#90FCF9'
			],
            borderWidth: 2 ,
            fill: false
		},{
			label: '# of Votes',
			data: [5, 12, 16, 19, 22],
			borderColor: [
				'#824C71'
			],
            borderWidth: 2 ,
            fill: false
            
		}]
	}
});
</script>