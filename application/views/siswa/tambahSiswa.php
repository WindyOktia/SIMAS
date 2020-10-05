<div>
    <ul class="nav nav-tabs nav-tabs-bottom border-bottom-0">
        <li class="nav-item"><a href="#bottom-divided-tab1" class="nav-link active" data-toggle="tab">Single</a></li>
        <li class="nav-item"><a href="#bottom-divided-tab2" class="nav-link" data-toggle="tab">Multiple</a></li>    
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="bottom-divided-tab1">
            <div class="card">
                <div class="card-body">
                    <legend>
                        TAMBAH DATA SISWA
                    </legend>
                    <form action="<?= base_url('admin/addSiswa')?>" method="post" enctype="multipart/form-data">
                    <fieldset class="mb-3">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">NIPD</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="nipd" placeholder="NIPD" name="nipd" autocomplete="off" required autofocus>
                                <div id="userav"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nama Siswa</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Nama Siswa" name="nama" required >
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nama Ibu</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Nama Ibu" name="ibu" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Nama Panggilan Ibu</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Nama Panggilan Ibu" name="panggilan_ibu" required >
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
                            <button type="submit" class="btn btn-primary" id="tbSubmit" disabled>Submit </button>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="bottom-divided-tab2">
            <div class="card">
                <div class="card-body">
                    <legend>TAMBAH DATA SISWA</legend>
                    <ul>
                        <li>
                            Format File <br>
                            <a href="<?=base_url('survei/downloadDefault')?>/format-dokumen.xlsx" class="btn btn-sm btn-info mb-3 mt-2">Download Format Dokumen</a>
                        </li>
                    </ul>
                    <form action="" method="post">
                        <ul>
                            <li>
                                <div class="form-group">
                                    <label for="">Upload Data Siswa | <i>xls, xlsx</i></label>
                                    <input type="file" name="exc_upload" class="form-control-file">
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-success float-right">Simpan Data  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$("#nipd").keyup(function(){
    $("#nipdav").html("<span class='text-warning'><i><small>Memeriksa..</small></i></span>");
    var nipd=$("#nipd").val();
    if(nipd.length<4){
        $("#userav").html("<span class='text-warning'><i><small>Min 4 karakter</small></i></span>");
        $('#pass').prop('disabled',true);
        $('#tbSubmit').prop('disabled',true);
    }else{
        $.ajax({
        type:"post",
        url:"<?= base_url('siswa/getNIPD')?>",
        data:"nipd="+nipd,
            success:function(data){
            if(data==0){
                $("#userav").html("<span class='text-success'><i><small>NIP Tersedia</small></i></span>");
                $('#pass').prop('disabled',false);
                $('#tbSubmit').prop('disabled',false);
            }
            else{
                $("#userav").html("<span class='text-danger'><i><small>NIP Tidak Tersedia</small></i></span>");
                $('#pass').prop('disabled',true);
                $('#tbSubmit').prop('disabled',true);
            }
        }
        });
    }
});
</script>
