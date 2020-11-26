    <div class="card mb-3">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                <i class="header-icon fa fa-reorder mr-3 text-muted opacity-6" style="font-size:16px"> </i>Daftar Survei
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example"
                    class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($kuesioner as $kuesioner) : ?>
                <tr>
                <td class="align-middle"><?= $i++ ?></td>
                    <td class="align-middle"><?= $kuesioner['nama_kegiatan']; ?></td>
                    <td class="align-middle"><?= $kuesioner['tgl_mulai']; ?></td>
                    <td class="align-middle"><?= $kuesioner['tgl_selesai']; ?></td>
                    <td class="align-middle"><a class="btn btn-info btn-sm" role="button" href="<?= base_url('siswa/addFormkuesioner')?>/<?= $kuesioner['id_kuesioner']?>">Isi Kuesioner</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div> 