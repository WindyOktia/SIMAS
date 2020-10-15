<div class="main-card card mb-3">
    <div class="card-body border border-warning">
        <h5 class="card-title">Tambah Data Kategori</h5>
        <form id="signupForm" class="mx-auto" action="<?=base_url('document/do_addKategori')?>" method="post" novalidate="novalidate">
        <div>
            <input type="text" name="nama_kategori" class="border rounded form-control d-inline-block align-middle col-7 form-control" placeholder="ex. Makrab" required>
            <button class="btn btn-primary btn-sm d-inline-block align-middle ml-2" type="submit">Simpan</button>
        </div>
        </form>
    </div>
</div>

<div class="main-card card mb-3">
    <div class="card-body border border-warning">
        <h5 class="card-title">Tambah Pertanyaan</h5>
        <form id="signupForm" class="mx-auto" action="<?=base_url('document/do_addPertanyaan')?>" method="post" novalidate="novalidate">
        <div>
                <div class="form-group col-6 align-middle">
                    <label for="username">Kategori</label>
                    <select name="id_kategori" class="multiselect-dropdown form-control">
                    <?php $i = 1; foreach ($kategori as $kat) : ?>
                        <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-10 d-inline-block align-middle">
                <div class="table-responsive">
						<table class="table" id="dynamicPertanyaan">
							<tr>
								<td><input type="text" name="pertanyaan[]" placeholder="Masukkan Pertanyaan" class="form-control name_list" /></td>
								<td><button type="button" name="add" id="addPertanyaan" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
					</div>    
                </div>
                <div>
                    <button class="btn btn-primary ml-2" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Kategori</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th style="width:30%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($kategori as $kat):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $kat['nama_kategori']; ?></b></td>
				<td>
					<a href="<?= base_url('document/deleteKategori')?>/<?= $kat['id_kategori']?>"class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
                </td>
			</tr>
			<?php endforeach;?>
			
		</tbody>
	</table>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body"> 
    <h5><i class="fa fa-navicon mr-2 text-warning"></i> Daftar Pertanyaan</h5>
        <table class="table datatable-show-all">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pertanyaan</th>
                <th>Kategori</th>
				<th style="width:30%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($pertanyaan as $tanya):?>
			<tr>
				<td><?=$i++?></td>
				<td><b><?= $tanya['pertanyaan']; ?></b></td>
                <td><b><?= $tanya['nama_kategori']; ?></b></td>
				<td>
					<a href="<?= base_url('document/deletePertanyaan')?>/<?= $tanya['id_pertanyaan']?>"class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-remove"></i></a>
                </td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    </div>
</div>

<script type="text/javascript">
    var i = 1;
    $('#addPertanyaan').click(function () {
		i++;
		$('#dynamicPertanyaan').append('<tr id="row' + i + '"><td><input type="text" name="pertanyaan[]" placeholder="Masukkan Pertanyaan" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
    $('#addJawaban').click(function () {
		i++;
		$('#dynamicJawaban').append('<tr id="row' + i + '"><td><input type="text" name="jawaban[]" placeholder="Masukkan Jawaban" class="form-control name_list" /></td><td><input type="number" name="skor_jawaban[]" placeholder="Masukkan Skor" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
    $(document).on('click', '.btn_remove', function () {
		var button_id = $(this).attr("id");
		$('#row' + button_id + '').remove();
	});
</script>

