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
				<td><?= $info['rata_anggaran']?></td>
				<td><?= $info['rata_pendapatan']?></td>
				<td><?= $info['rata_pengeluaran']?></td>
				<td><?= $info['terlaksana']?></td>
               <td><a href="<?= base_url('admin/laporan_waka')?>?key1=<?=$info['tahun_akademik']?>&semester=<?= $info['semester']?>" class="btn btn-primary btn-sm">Lihat Dasbord</a></td>
            </tr>
        <?php endforeach?>
        </tbody>
        </table>
</div>