<div class="card">
    <div class="card-body">
        <legend>
            TAMBAH DATA GURU
        </legend>
        <form action="<?= base_url('admin/addGuru')?>" method="post" enctype="multipart/form-data">
        <fieldset class="mb-3">
            <div class="form-group row">
                <label class="col-form-label col-lg-2">RFID Register </label>
                <div class="col-lg-10">
                    <input type="number" autocomplete="off" id="rfid" class="form-control border-warning" placeholder="Tempelkan RFID" name="rfid" required autofocus>
                    <div id="RFIDav"></div>
                </div>
            </div>
            <div class="form-group row">
				<label for="" class="col-form-label col-lg-2">Status Guru</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">    
                            <select name="status" id="stats" class="form-control">
                                <option value="1" >PNS</option>
                                <option value="2" >Guru Tidak Tetap</option>
                                <option value="3" >Guru Tetap Yayasan</option>
                            </select>
                        </div>
                    </div>
                </div>
			</div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">NIP / ID Guru </label>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" autocomplete="off" id="nip" class="form-control" placeholder="NIP" name="nip" required autofocus disabled>
                        </div>
                        <div class="col-md-2">
                            <button type="button"  onclick="generateID()" class="btn btn-info">Generate ID</button>
                        </div>
                        <div class="col-md-7 my-auto">
                            <p class="my-auto"><b>|</b> Pilih status guru kemudian klik <b>Generate ID</b> apabila guru belum memiliki <b>NIP</b></p>
                        </div>
                    </div>
                    <div id="userav"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Nama Guru</label>
                <div class="col-lg-10">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Nama Guru" name="nama" required >
                </div>
            </div>

            <div class="form-group row">
				<label for="" class="col-form-label col-lg-2">Jenis Kelamin</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">    
                            <select name="" id="" class="form-control">
                                <option value="1" >Pria</option>
                                <option value="2" >Wanita</option>
                            </select>
                        </div>
                    </div>
                </div>
			</div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                <div class="col-lg-10">
                <div class="row">
                <div class="col-md-3">
                
                    <input type="date" autocomplete="off" class="form-control" placeholder="Nama Guru" name="" required >
                </div>
                </div>
                </div>
            </div>
           
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                    <textarea type="text" autocomplete="off" class="form-control" rows="4" placeholder="Alamat Lengkap" name="alamat" required ></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Password Baru </label>
                <div class="col-lg-10">
                    <input type="password" autocomplete="off" id="pass" class="form-control" placeholder="Password Baru" required disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Ulangi Password </label>
                <div class="col-lg-10">
                    <input type="password" autocomplete="off" id="repass" class="form-control" placeholder="Ulangi Password" name="pass" required disabled>
                    <div id="resultPass">
                </div>
            </div>
            
            </fieldset>

            <div class="text-right">
                <button type="submit" id="simpanEdit" class="btn btn-success" disabled>Simpan </button>
            </div>
            
            
        </form>
    </div>
</div>

<script>
// generateID

    function generateID()
    {
        var status = $('#stats').val();
        $.ajax({
            type:"post",
            url:"<?= base_url('guru/generateNIP')?>",
            data:{status:status},
                success:function(data){
                var enc = JSON.parse(data);
                $('#nip').val();
                $('#nip').val(enc);
                $('#simpanEdit').attr('disabled', false);
                $('#pass').prop('disabled',false);
                $('#repass').prop('disabled',false);
                console.log(data);
            }
        });
    }

//endGenerateID
// cek rfid
$("#rfid").change(function(){
    $("#RFIDav").html("<span class='text-warning'><i><small>Memeriksa..</small></i></span>");
    var rfid=$("#rfid").val();
    if(rfid.length<4){
        $("#RFIDav").html("<span class='text-warning'><i><small>Tap Kartu RFID</small></i></span>");
    }else{
        $.ajax({
            type:"post",
            url:"<?= base_url('guru/getRFID')?>",
            data:"rfid="+rfid,
                success:function(data){
                if(data==0){
                    $("#RFIDav").html("<span class='text-success'><i><small>RFID Tersedia</small></i></span>");
                    $('#nip').prop('disabled',false);
                    $("#nip").focus();
                }
                else{
                    $("#RFIDav").html("<span class='text-danger'><i><small>RFID Sudah Digunakan</small></i></span>");
                    $('#nip').prop('disabled',true);
                    $("#rfid").val('');
                    $("#rfid").focus();
                }
            }
        });
    }
});
// end of cek rfid

//cek nip
$("#nip").keyup(function(){
    $("#userav").html("<span class='text-warning'><i><small>Memeriksa..</small></i></span>");
    var nip=$("#nip").val();
    if(nip.length<4){
        $("#userav").html("<span class='text-warning'><i><small>Min 4 karakter</small></i></span>");
        $('#pass').prop('disabled',true);
        $('#repass').prop('disabled',true);
    }else{
        $.ajax({
        type:"post",
        url:"<?= base_url('guru/getNIP')?>",
        data:"nip="+nip,
            success:function(data){
            if(data==0){
                $("#userav").html("<span class='text-success'><i><small>NIP Tersedia</small></i></span>");
                $('#pass').prop('disabled',false);
                $('#repass').prop('disabled',false);
            }
            else{
                $("#userav").html("<span class='text-danger'><i><small>NIP Tidak Tersedia</small></i></span>");
                $('#pass').prop('disabled',true);
                $('#repass').prop('disabled',true);
            }
        }
        });
    }
});

// enc of cek nip


// cek pass
$('#repass').keyup(function () {
	var pass = $('#pass').val();
	var repass = $('#repass').val();
	if (pass != repass) {
		$('#resultPass').html('<small><span class="text-danger">Password Tidak Cocok</span></small>');
		$('#simpanEdit').attr('disabled', true);
	} else {
		$('#resultPass').html('<small><span class="text-success">Password Cocok</span></small>');
		$('#simpanEdit').attr('disabled', false);
	}
});

// end of cek pass

</script>