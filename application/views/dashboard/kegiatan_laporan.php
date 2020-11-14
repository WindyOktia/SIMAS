<h3>Detail Laporan Kegiatan Tahun <b><?=$_GET['key1']?></b> - Semester <b><?=$_GET['semester']?></b></h3>
<div class="row mt-3">
    <div class="col-md-3">
        <div class="card card-body bg-success-300">
            <h6>Jumlah Kegiatan Berjalan</h6>
            <h4 class="text-center"><b>5</b></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-success-300">
            <h6>Jumlah Laporan Masuk</h6>
            <h4 class="text-center"><b>3</b></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-success-300">
            <h6>Jumlah Survei Terlaksana</h6>
            <h4 class="text-center"><b>4</b></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body bg-success-300">
            <h6>Siswa Terlibat</h6>
            <h4 class="text-center">~ <b>15</b></h4>
        </div>
    </div>
</div>
<ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Laporan Anggaran Kegiatan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Keterlibatan Siswa</a>
  </li>
  <!-- <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li> -->
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    Laporan Umum
                    <canvas id="kegiatan"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    Alokasi Biaya
                    <canvas id="alokasiBiaya"></canvas>
                </div>
            </div>
        </div>
    <div class="col-md-4">
        <div class="card card-body">
            <h6><b>Nama Kegiatan 1</b></h6>
            <canvas id="anu"></canvas>
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                Keterlibatan Siswa
                <canvas id="keterlibatan"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-body">
                Minat Siswa
                <canvas id="minat"></canvas>
            </div>
        </div>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

<script>
var ctx = document.getElementById('kegiatan');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Anggaran', 'Dana Masuk', 'Dana Terpakai'],
        datasets: [{
            label: 'Laporan Umum',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var anu = document.getElementById('anu');
var myChartanu = new Chart(anu, {
    type: 'bar',
    data: {
        labels: ['Anggaran', 'Dana Masuk', 'Dana Terpakai'],
        datasets: [{
            label: 'Laporan Umum',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var alokasiBiaya = document.getElementById('alokasiBiaya');
var alokasi = new Chart(alokasiBiaya, {
    type: 'pie',
    data: {
        labels: ['Basket', 'Futsal', 'Catur'],
        datasets: [{
            label: 'Laporan Umum',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    }
});
var keterlibatan = document.getElementById('keterlibatan');
var Terlibat = new Chart(keterlibatan, {
    type: 'pie',
    data: {
        labels: ['Basket', 'Futsal', 'Catur'],
        datasets: [{
            label: 'Laporan Umum',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    }
});
var minat = document.getElementById('minat');
var minatsiswa = new Chart(minat, {
    type: 'bar',
    data: {
        labels: ['Futsal', 'Basket', 'Catur'],
        datasets: [{
            label: 'Laporan Umum',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>