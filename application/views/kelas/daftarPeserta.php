<div class="row">
    <div class="col-md-2">
        <a href="" class="btn btn-primary"data-toggle="modal" data-target="#modalAdd">Tambah Peserta</a>
    </div>
    <!-- <div class="col-md-2">
        <a href="" class="btn btn-danger">Hapus Semua</a>
    </div> -->
</div>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Kelas</h5>
        <table class="table datatable-show-all">
			<thead>
				<tr>
					<th>No</th>
					<th>NIPD</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
    </div>
</div>


<!-- modal -->
<div class="modal fade  bd-example-modal-lg" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('admin/addPeserta')?>>" method="post">
			<div id="containerNIPD">
				<div class="form-group">
					<input type="hidden" name="id_kelas" value="<?=$id?>">
					<div class="row">
						<div class="col-md-3">
							<label for="">Masukkan NIPD</label>
							<input type="number" name="NIPD[]" id="nipd1" onkeyup="cekNIPD(1)" class="form-control border-info" id="search" autocomplete="off">
							<input type="hidden" name="id_siswa[]" id="id_siswa1" class="form-control border-info" id="search" autocomplete="off">
						</div>
						<div class="col-md-9">
							<label for="">Nama Siswa</label>
							<div class="row">
								<div class="col-md-9">
									<input type="text" id="hasilNIPD1" placeholder="Nama siswa akan ditampilkan disini" class="form-control" style="background-color:#DEE8D5" readonly>
								</div>
								<div class="col-md-3">
									<button class="btn btn-success" type="button" id="addNIPD"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
		</form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var i = 1;
	$('#addNIPD').click(function(){
		i++;
		$('#containerNIPD').append(`
			<div class="form-group" id="form`+ i +`">
				<div class="row">
					<div class="col-md-3">
						<label for="">Masukkan NIPD</label>
						<input type="number" name="NIPD[]" id="nipd`+ i +`" onkeyup="cekNIPD(`+ i +`)" class="form-control border-info" id="search" autocomplete="off">
						<input type="hidden" name="id_siswa[]" id="id_siswa`+ i +`" class="form-control border-info" id="search" autocomplete="off">
					</div>
					<div class="col-md-9">
						<label for="">Nama Siswa</label>
						<div class="row">
							<div class="col-md-9">
								<input type="text" id="hasilNIPD`+i+`" placeholder="Nama siswa akan ditampilkan disini" class="form-control" style="background-color:#DEE8D5" readonly>
							</div>
							<div class="col-md-3">
								<button class="btn btn-danger" type="button" onclick="deleteRow(`+ i +`)"><i class="fa fa-remove"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		`);
	});

	function deleteRow(i)
	{
		$('#form'+i).remove();
	}

	function cekNIPD(i)
	{
		var nipd = $('#nipd'+i).val();
		$('#hasilNIPD'+i).val('mencari data...');
		$.ajax({
			type: 'post',
			url: '<?= base_url('siswa/nama_Siswa')?>',
			data: {nipd:nipd},
			success: function (data) {
				var namaSiswa = JSON.parse(data);
				var res = namaSiswa.split("/");
				$('#hasilNIPD'+i).val(res[0]);
				$('#id_siswa'+i).val(res[1]);
			}
		});
	}
</script>