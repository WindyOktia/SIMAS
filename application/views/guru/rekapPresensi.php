<h4><i class="fa fa-plus-circle mr-2" style="color:green"></i>Rekap Presensi Guru</h4>

<button type="button" class="btn btn-success mb-3 mt-1 mr-2 " data-toggle="modal" data-target="#tbhPresensi">
  Catat Presensi Harian Guru
</button>

<button type="button" class="btn btn-success mb-3 mt-1 " data-toggle="modal" data-target="#tbhPresensiMengajar">
  Catat Presensi Mengajar Guru
</button>


<div class="card">
    <div class="card-body">
        <legend>Riwayat Presensi Guru</legend>
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
				
			</tbody>
		</table>
    </div>
</div>


<div class="modal fade bd-example-modal-xl" id="tbhPresensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catat Presensi Harian Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post" id="containerForm" >
                <div class="row" id="rowId1">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Pilih Guru</label>
                            <select name="" id="" class="form-control">
                                <option value="" selected disabled>- pilih guru -</option>
                                <?php foreach($listGuru as $lst):?>
                                <option value="<?=$lst['id_guru']?>"><?=$lst['nama_guru']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tanggal Presensi</label>
                            <input type="date" value="<?=date('Y-m-d')?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jam Datang</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jam Pulang</label>
                            <div class="row">
                                <div class="col">
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-xl" id="tbhPresensiMengajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catat Presensi Mengajar Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="post" id="containerForm" >
                <div class="row" id="rowId1">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Pilih Guru</label>
                            <select name="" id="" class="form-control">
                                <option value="" selected disabled>- pilih guru -</option>
                                <?php foreach($listGuru as $lstMengajar):?>
                                <option value="<?=$lstMengajar['id_guru']?>"><?=$lstMengajar['nama_guru']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Tanggal Presensi</label>
                            <input type="date" value="<?=date('Y-m-d')?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Jadwal Mengajar</label>
                            <select name="" id="" class="form-control">
                                    <option value="" selected disabled>- pilih jadwal guru -</option>
                                    <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Jam Datang</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Jam Pulang</label>
                            <div class="row">
                                <div class="col">
                                    <input type="time" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
      </div>
    </div>
  </div>
</div>


