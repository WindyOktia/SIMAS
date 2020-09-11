<div class="card card-body">
    <h4><i class="fa fa-plus-circle mr-2" style="color:green"></i>Pengajuan Ijin Guru</h4>
    <br>
    <h6><i class="fa fa-info-circle mr-2"></i><b>Informasi</b></h6>
    <h6>
        <ul>
            <li>Pengajuan ijin memerlukan verifikasi dari Kepala Sekolah </li>
            <li>Lakukan pengajuan ijin minimal H-2 sebelum anda mengambil ijin </li>
        </ul>
    </h6>
    
    <h6 class="mt-3"><i class="	fa fa-pencil-square mr-2"></i>Detail Pengajuan Ijin</h6>
    <form action="" method="post">
        <div class="form-group col-md-3">
            <label for="">Jenis Ijin</label>
            <select name="" id="" class="form-control">
                <option value="" selected disabled>- pilih -</option>
                <option value="">Sakit</option>
                <option value="">Ijin</option>
                <option value="">Tugas</option>
                <option value="">Lain-lain</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="">Perihal Ijin</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group col-md-12">
            <label for="">Tanggal ijin</label>
            <div class="row">
                <div class="col-md-3">
                    <input type="date" class="form-control">
                </div>
                <span class="my-auto">sampai</span>
                <div class="col-md-3">
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="">Deskripsi Ijin</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
            <script>
                CKEDITOR.replace( 'deskripsi',{height:250} );
            </script>
        </div>
        <div class="form-group col-md-12">
            <label for="">Lampiran Dokumen</label>
            <input type="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success float-right">Ajukan Permohonan Ijin</button>
    </form>
  
</div>

<div class="card card-body">
    <h6><i class="fa fa-history mr-2"></i>Riwayat Pengajuan Ijin</h6>
    <table class="table datatable-show-all">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Pengajuan</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th style="width:30%">Detail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>
</div>

