<!-- <div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('presensi/harian')?>" method="post" id="presensi">
                    <input type="text" name="id" class="rfid" autofocus required>
                    <button type="submit">tes</button>
                </form>
                <img src="<?= base_url('assets/images/tap.png')?>" alt="" srcset="" width="60%" class="mx-auto d-block">
                <p class="text-center text-warning" style="font-size:32px;">Tempelkan kartu presensi anda</p>
            </div>
        </div>
    </div>
</div> -->
<style>
    input{
        caret-color:transparent;
        border:0;
        color:transparent;
        outline:none;
        background-color:transparent;
    }
</style>

<div class="container">
        <form action="#" method="post" id="presensiMengajar">
            <input type="text" name="rfid" class="rfid" id="rfid" autocomplete="off" autofocus required>
            <!-- <button type="submit">tes</button> -->
        </form> 
    <h1 class="text-white text-center" style="font-size:34px"><b>Selamat Datang di SMA Bopkri 1 Yogyakarta</b></h1>
    <h2 class="text-white text-center">Silahkan tempelkan kartu presensi mengajar anda</h2>
    <div class="card card-body">
   
        <h2><b>Informasi</b></h2>
        <ul>
            <li><h4>Jika kartu presensi hilang / rusak silahkan akses halaman guru untuk melakukan presensi secara manual</h4></li>
            <li><h4>Segera hubungi waka kurikulum apabila kartu presensi hilang / rusak</h4></li>
            <li><h4>Cek kembali status kehadiran anda melalui halaman guru, info login silahkan menghubungi waka kurikulum</h4></li>
            <li><h4>Apabila jam mengajar < 15 menit, lakukan presensi jam selesai pada halaman guru</h4></li>
        </ul>
                
    </div>
    <div class="text-center">
        <button onclick="closeWin()" class="btn btn-success border-light"><i class="	fa fa-chevron-circle-left mr-2"></i>Kembali ke halaman utama</button>
    </div>
</div>

<script type="text/javascript">

		// presensi harian
		// 1. cek register rfid di tabel guru
		// 2. cek libur di tabel libur
		// 3. cek ada data presensi / belum di tabel presensi
		// 4. jika belum ada, data dismpan sebagai jam masuk, data pertama yang akan disimpan
		// 5. jika sudah ada, user menunggu min 15 menit untuk dapat presensi lagi
		// 6. setelah 15 menit data disimpan sebagai keluar, data terakhir yang disimpan
		
		// cek registrasi kartu
		$(function () {
			$('#presensiMengajar').on('submit', function (e) {
			// var id= $('.rfid').val();
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: '<?= base_url('presensi/getRFID')?>',
				data: $('#presensiMengajar').serialize(),
				success: function (result) {
					id= JSON.parse(result);
					if(id == 'fail')
					{
						console.log('fail')
						toastr.error('Kartu Tidak Terdaftar');
						$("#presensiMengajar")[0].reset();
						$('.rfid').focus();
					}else{
						console.log('success');
						getLibur(id);
					}
				}
			});
			});
		});
		// end of cek registrasi kartu

		// cek hari libur
		function getLibur(id){
			$.ajax({
            url: '<?= base_url('presensi/getLibur')?>'
            }).done(function(res) {
				var obs = JSON.parse(res);
				if(obs !=''){
					toastr.success(obs[0].keterangan);
					$("#presensiMengajar")[0].reset();
					$('.rfid').focus();
				}else{
					// cekPresensi(id);
                    cekJamMengajar(id);
				}
            });
		}

        function cekJamMengajar(id){
            $.ajax({
				type: 'post',
				url: '<?= base_url('presensi/cekJamMengajar')?>',
				data: {id:id},
				success: function (data) {
                    var dt = JSON.parse(data);
                    if(dt==''){
                        toastr.error('Tidak ada jam mengajar pada saat ini');
						$("#presensiMengajar")[0].reset();
                    }else{
                        id_jadwal = dt[0].id_jadwal_guru;
                        cekPresensi(id,id_jadwal,dt);
                        $("#presensiMengajar")[0].reset();
                    }
				}
			});
        }
		// end of cek hari libur

		// // cek presensi
		function cekPresensi(id,id_jadwal,dt){
			$.ajax({
				type: 'post',
				url: '<?= base_url('presensi/presensiMengajar')?>',
				data: {id_jadwal:id_jadwal},
				success: function (data) {
					var dat = JSON.parse(data);
                    if(dat==''){
                        insertJamMasuk(id,id_jadwal,dt);
                    }else{
                        updatePresensi(id,id_jadwal,dt);
                    }
				}
			});
		}

        function insertJamMasuk(id,id_jadwal,dt){
            $.ajax({
				type: 'post',
				url: '<?= base_url('presensi/insertMengajar')?>',
				data: {id_jadwal:id_jadwal},
				success: function (status) {
					if(status=='success'){
                        // console.log(dt);
                        getNotifJamMulai(id_jadwal);
                    }else{
                        toastr.error('Presensi Gagal, silahkan coba lagi');
                    }
				}
			});
        }

        function updatePresensi(id, id_jadwal,dt){
            $.ajax({
				type: 'post',
				url: '<?= base_url('presensi/updateMengajar')?>',
				data: {id_jadwal:id_jadwal},
				success: function (data) {
					if(data=='<_15'){
                        toastr.error('Tunggu hingga 15 menit untuk presensi selesai mengajar');
                    }
                    if(data=='fail'){
                        toastr.error('Presensi Gagal, silahkan coba lagi');
                    }
                    if(data=='success'){
                        getNotifJamSelesai(id_jadwal);
                    }
				}
			});
        } 

        function getNotifJamMulai(id_jadwal){
            $.ajax({
				type: 'post',
				url: '<?= base_url('presensi/getNotifMengajar')?>',
				data: {id_jadwal:id_jadwal},
				success: function (data) {
                    var notif = JSON.parse(data);
                    var time = '<?=date('H:i:s');?>';
					toastr.success('Presensi Mulai Mengajar <b>'+notif[0].nama_guru+ '</b> - <b>[ ' +notif[0].nama_mapel+' ]</b> pada jam ' + time);
				}
			});
        } 

        function getNotifJamSelesai(id_jadwal){
            $.ajax({
				type: 'post',
				url: '<?= base_url('presensi/getNotifMengajar')?>',
				data: {id_jadwal:id_jadwal},
				success: function (data) {
                    var notif = JSON.parse(data);
                    var time = '<?=date('H:i:s');?>';
					toastr.success('Presensi Selesai Mengajar <b>'+notif[0].nama_guru+ '</b> - <b>[ ' +notif[0].nama_mapel+' ]</b> pada jam ' + time);
				}
			});
        }                                                     

	

		function setAct(){
			$('#rfid').focus();
		}

        function closeWin() {
            window.close()
        }
</script>