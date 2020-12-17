<ul class="nav nav-pills mb-1 mt-1" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kinerja Guru</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kegiatan Siswa</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <div class="card card-body mt-3">
    <table class="table datatable-show-all">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tahun Akademik</th>
            <th scope="col">Semester</th>
            <th scope="col">Nama Guru</th>
            <th scope="col">Nilai</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>2016 / 2017</td>
                <td>Ganjil</td>
                <td>Presensi Guru</td>
                <td>74</td>
                <td><a href="" class="btn btn-sm btn-info">Evaluasi</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>2017 / 2018</td>
                <td>Genap</td>
                <td>Cerdas Cermat</td>
                <td>80</td>
                <td><a href="" class="btn btn-sm btn-info">Evaluasi</a></td>
            </tr>
            <tr>
            <th scope="row">2</th>
                <td>2017 / 2018</td>
                <td>Ganjil</td>
                <td>Halal Bi Halal</td>
                <td>70</td>
                <td><a href="" class="btn btn-sm btn-info">Evaluasi</a></td>
            </tr>
        </tbody>
    </table>
</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="card card-body mt-3">
    <table class="table datatable-show-all">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Tahun Akademik</th>
            <th scope="col">Semester</th>
            <th scope="col">Nama Kegiatan</th>
            <th scope="col">Nilai</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach ($notif as $notifikasi):?>
            <?php 
            $expAkad = explode(' / ',$notifikasi['tahun_akademik']); 
        ?>
            <tr>
            <td><?=$i++?></td>
            <td><b><?= $notifikasi['tahun_akademik']?></b></td>
			<td><b><?= $notifikasi['semester']?></b></td>
			<td><?= $notifikasi['nama_kegiatan']?></td>
			<td><span class="badge badge-danger"><?= $notifikasi['Nilai']?></span></td>
            <td><a href="<?= base_url('admin/laporan_waka')?>?key1=<?=$notifikasi['tahun_akademik']?>&semester=<?= $notifikasi['semester']?>" class="btn btn-danger btn-sm">Evaluasi</a></td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>
  </div>
</div>
