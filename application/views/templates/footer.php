</div>
		</div>
	</div>

	<script src="<?= base_url('assets/js/script.js')?>"></script>
	<script src="<?= base_url('assets/js/custom.js')?>"></script>
	<script src="<?= base_url();?>assets/js/sweetalert2.all.min.js"></script>
	<script src="<?= base_url();?>assets/js/sweetalertcontrol.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript">
		toastr.options = {
		"closeButton": true,
		"debug": false,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-bottom-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "100",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
		}
		<?php if($this->session->flashdata('success')){ ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>");
		<?php }else if($this->session->flashdata('error')){  ?>
			toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		<?php }else if($this->session->flashdata('warning')){  ?>
			toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
		<?php }else if($this->session->flashdata('info')){  ?>
			toastr.info("<?php echo $this->session->flashdata('info'); ?>");
		<?php } ?>
	</script>

	<script type="text/javascript">
		$(document).ready(function () {

			var max_fields = 50; //maximum input boxes allowed
			var wrapper = $(".input_fields_wrap"); //Fields wrapper
			var add_button = $(".add_field_button"); //Add button ID
			var tbhJadwal = $(".tbhJadwal"); //Add button ID

			var x = 1; //initlal text box count
			$(add_button).click(function (e) { //on add input button click
				e.preventDefault();
				if (x < max_fields) { //max input box allowed
					x++; //text box increment
					$(wrapper).append('<div class="row mt-1"><div class="col-10"><input type="text" name="mytext[]" class="form-control"/></div><a href="#" class="remove_field col-2 mx-auto my-auto float-right"><i class="fa fa-close text-danger" style="font-size:24px"></i></a></div>'); //add input box
				}
			});
			$(tbhJadwal).click(function (e) { //on add input button click
				e.preventDefault();
				if (x < max_fields) { //max input box allowed
					x++; //text box increment
					$(wrapper).append(`
					<div class="row">
							<div class="form-group col-md">
								<select class="form-control" name="hari[]" required>
									<option selected disabled value="">- pilih -</option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</div> 
							<div class="form-group col-md">
								<select id="selectKelasB" class="form-control" name="kelas[]" required>
								<option selected disabled value="">- pilih -</option>
									<?php foreach($kelas as $kelas):?>
										<option value="<?= $kelas['id_kelas']?>"><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group col-md">
								<select id="selectKelasA" class="form-control" name="mapel[]" required>
								<option selected disabled value="">- pilih -</option>
									<?php foreach($mapel as $mapel):?>
										<option value="<?= $mapel['id_mapel']?>"><?= $mapel['nama_mapel']?></option>
									<?php endforeach;?>
								</select>
							</div> 
							<div class="form-group col-md">
								<input type="time" class="form-control" placeholder="Jam Mulai" name="mulai[]" required>
							</div> 
							<div class="form-group col-md">
								<input type="time" class="form-control" placeholder="Jam Selesai" name="selesai[]" required>
							</div> 
							<a href="" class="form-group col-md remove_field"><button class=" btn btn-danger form-control">Remove</button></a>
						</div>`); //add input box
				}
			});

			$(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
				e.preventDefault();
				$(this).parent('div').remove();
				x--;
			})

			var table = $('#example').DataTable({
				responsive: true
			});

			

		});

	</script>
	 <script>
    var baseurl = "<?= base_url(''); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
    </script>

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
	</script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/uploader_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 15:23:58 GMT -->
</html>
