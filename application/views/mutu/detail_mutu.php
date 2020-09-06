<a href="<?=base_url('admin/mutu')?>" class="btn btn-sm btn-secondary mb-3">Kembali</a>

<div class="card card-body">
    <h4>Detail Mutu Sekolah</h4>
    <ul>
        <li>
            <div class="row">
                <div class="col-md-2">Tahun Akademik</div>
                <div class="col">:</div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-2">Semester</div>
                <div class="col">:</div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-2">Nilai</div>
                <div class="col">:</div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-md-2">Keterangan</div>
                <div class="col">:</div>
            </div>
        </li>
    </ul>
</div>

<div class="card mt-3 card-body">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Item Penilaian</th>
            <th scope="col">Bobot Nilai ( % )</th>
            <th scope="col">Nilai</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Kinerja Guru</td>
                <td>3</td>
                <td>1</td>  
                <td><a href="<?= base_url('admin/detailMutu')?>" class="btn btn-danger tombol-hapus btn-sm">Hapus</a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Nilai kegiatan siswa</td>
                <td>3</td>
                <td>1</td>  
                <td><a href="<?= base_url('admin/detailMutu')?>" class="btn btn-danger tombol-hapus btn-sm">Hapus</a></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>[..data lain..]</td>
                <td>3</td>
                <td>1</td>  
                <td><a href="<?= base_url('admin/detailMutu')?>" class="btn btn-danger tombol-hapus btn-sm">Hapus</a></td>
            </tr>
        </tbody>
    </table>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Item Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Item Penilaian</label>
                <input type="text" class="form-control">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Bobot Nilai ( % )</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>