<div class="card">
    <div class="card-body">
        <legend>
            TAMBAH DATA GURU
        </legend>
        <form action="<?= base_url('admin/addGuru')?>" method="post" enctype="multipart/form-data">
        <fieldset class="mb-3">
            <div class="form-group row">
                <label class="col-form-label col-lg-2">RFID Register</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control border-warning" placeholder="Tempelkan RFID" name="rfid" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">NIP</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" placeholder="NIP" name="nip" required autofocus>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Nama Guru</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" placeholder="Nama Guru" name="nama" required >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                    <textarea type="text" class="form-control" rows="4" placeholder="Alamat Lengkap" name="alamat" required ></textarea>
                </div>
            </div>
            
            
            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit </button>
            </div>
            
            
        </form>
    </div>
</div>