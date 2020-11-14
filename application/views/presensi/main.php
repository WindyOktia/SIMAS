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
        <form action="#" method="post" id="presensi">
            <input type="text" name="rfid" class="rfid" id="rfid" autocomplete="off" autofocus required>
            <!-- <button type="submit">tes</button> -->
        </form> 
    <h1 class="text-white text-center" style="font-size:34px"><b>Selamat Datang di SMA Bopkri 1 Yogyakarta</b></h1>
    <h2 class="text-white text-center">Silahkan tempelkan kartu presensi anda</h2>
    <div class="card card-body">
   
        <h2><b>Informasi</b></h2>
        <ul>
            <li><h4>Jika kartu presensi hilang / rusak silahkan akses halaman guru untuk melakukan presensi secara manual</h4></li>
            <li><h4>Segera hubungi waka kurikulum apabila kartu presensi hilang / rusak</h4></li>
            <li><h4>Cek kembali status kehadiran anda melalui halaman guru, info login silahkan menghubungi waka kurikulum</h4></li>
        </ul>
                
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
			$('#presensi').on('submit', function (e) {
			// var id= $('.rfid').val();
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: '<?= base_url('presensi/getRFID')?>',
				data: $('#presensi').serialize(),
				success: function (result) {
					id= JSON.parse(result);
					if(id == 'fail')
					{
						console.log('fail')
						toastr.error('Kartu Tidak Terdaftar');
						$("#presensi")[0].reset();
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
					$("#presensi")[0].reset();
					$('.rfid').focus();
				}else{
					cekPresensi(id);
				}
            });
		}
		// end of cek hari libur

		// cek presensi
		function cekPresensi(id){
			$.ajax({
				type: 'post',
				url: '<?= base_url('presensi/harian')?>',
				data: {id:id},
				success: function (data) {
					if(data=='"success : jam masuk"')
					{
						getNama(data, id);
					}
					if(data=='"false : <= 15 menit"')
					{
						toastr.error('Tunggu <b>15 menit </b> untuk presensi <b>jam keluar</b>');
						$("#presensi")[0].reset();
						$('.rfid').focus();
					}
					if(data=='"success : jam keluar"')
					{
						getNama(data, id);
					}
					// console.log(data);
				}
			});
		}

		function getNama(status,id){
			$.ajax({
				type: 'post',
				url: '<?= base_url('presensi/nama_pegawai')?>',
				data: {id:id},
				success: function (data) {
					if(status=='"success : jam masuk"'){
						toastr.success('Presensi jam masuk '+data);
					}else{
						toastr.success('Presensi jam keluar '+data);
					}
					$("#presensi")[0].reset();
					$('.rfid').focus();
					console.log(data);
				}
			});
		}
		// end of cek presensi

	

		function setAct(){
			$('#rfid').focus();
		}


		// presensi mengajar
		
	</script>