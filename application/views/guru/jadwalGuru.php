<div class="card">
    <div class="card-body">
        <legend>JADWAL MENGAJAR GURU</legend>
        <form action="" method="post">
            <div class="form-group">
                <select class="form-control col-5 border-warning" id="exampleFormControlSelect1">
                    <option>Pilih Guru</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        <p><i class="fa fa-th-list mr-2"></i> Tambah Jadwal</p> 
            <div class="input_fields_wrap">
                <div class="row">
                    <div class="form-group col-md">
                    <label for="">Pilih Hari</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>Pilih Hari</option>
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                            <option>Sabtu</option>
                            <option>Minggu</option>
                        </select>
                    </div> 
                    <div class="form-group col-md">
                    <label for="">Pilih Kelas</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>Pilih Kelas</option>
                            <option>XI IPS 1</option>
                            <option>XI IPA 1</option>
                        </select>
                    </div> 
                    <div class="form-group col-md">
                    <label for="">Jam Mulai</label>
                        <input type="time" class="form-control" placeholder="Jam Mulai">
                    </div> 
                    <div class="form-group col-md">
                    <label for="">Jam Selesai</label>
                        <input type="time" class="form-control" placeholder="Jam Selesai">
                    </div> 
                    <div class="form-group col-md">
                    <label for="">Aksi</label>
                    <a href="" class="tbhJadwal btn btn-success form-control">Add More</a>
                    </div> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>