<div class="row">
    <div class="col-md-6">
        <a href="" class="btn btn-primary"data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus-circle mr-1"></i>Tambah Peserta</a>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
			<i class="	fa fa-cloud-download mr-1"></i> Unduh Daftar Siswa
		</button>
		
    </div>
    <div class="col-md-6">
        <a href="" class="btn btn-secondary float-right">Pindah Peserta Kelas <i class="ml-1	fa fa-long-arrow-right"></i></a>
    </div>
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
					<th>Nama Ibu Kandung</th>
					<th>Nama Panggilan Ibu Kandung</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php $i=1;foreach($peserta as $psr):?>
				<tr>
					<td><?=$i++?></td>
					<td><?= $psr['nipd']?></td>
					<td><?= $psr['nama_siswa']?></td>
					<td><?= $psr['nama_ibu']?></td>
					<td><?= $psr['nama_panggilan_ibu']?></td>
					<td>
						<a href="<?= base_url('admin/hapusPeserta')?>/<?=$psr['id_peserta_kelas']?>/<?=$id?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
						<a href="" class="btn btn-sm btn-secondary">Pindah Kelas <i class="ml-1	fa fa-long-arrow-right"></i></a>
					</td>
				</tr>
			<?php endforeach?>
			</tbody>
		</table>
    </div>
</div>


<!-- modal tambah -->
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
        <form action="<?=base_url('admin/addPeserta')?>" method="post">
			<div id="containerNIPD">
				<div class="form-group">
					<input type="hidden" id="kelas" name="id_kelas" value="<?=$id?>">
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
        <button type="submit" id="tombolsimpan" class="btn btn-success" disabled>Simpan Data</button>
		</form>
      </div>
    </div>
  </div>
</div>
<!-- end modal tambah -->

<!-- modal unduh -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unduh Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-6 ">
				<a href="<?=base_url('siswa/exportSiswa')?>" class="btn btn-success "> <i class="	fa fa-cloud-download mr-1"></i> Unduh daftar seluruh siswa</a>
			</div>
			<div class="col-md-6">
				<a href="<?=base_url('siswa/exportSiswaID/'.$id)?>" class="btn btn-success "> <i class="	fa fa-cloud-download mr-1"></i> Unduh peserta kelas ini</a>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<!-- end modal unduh -->






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
		var kelas= $('#kelas').val();
		$('#hasilNIPD'+i).val('mencari data...');
		$('#hasilNIPD'+i).removeClass('border-danger');
		$('#hasilNIPD'+i).removeClass('border-success');
		$.ajax({
			type: 'post',
			url: '<?= base_url('siswa/nama_siswa')?>',
			data: {nipd:nipd,kelas:kelas},
			success: function (data) {
				var namaSiswa = JSON.parse(data);
				var res = namaSiswa.split("/");
				if(res[1]=='null'){
					$('#hasilNIPD'+i).val('Siswa sudah terdaftar pada kelas '+res[0]);
					$('#hasilNIPD'+i).addClass('border-danger');
					$('#tombolsimpan').prop('disabled',true);
				}else{
					$('#hasilNIPD'+i).val(res[0]);
					$('#id_siswa'+i).val(res[1]);
					$('#hasilNIPD'+i).addClass('border-success');
					$('#tombolsimpan').prop('disabled',false);
				}
			}
		});
	}
</script>

