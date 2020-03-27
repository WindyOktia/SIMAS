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
								<select class="form-control" name="hari[]">
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
								<select id="selectKelasB" class="form-control" name="kelas[]">
									<?php foreach($kelas as $kelas):?>
										<option value="<?= $kelas['id_kelas']?>"><?= $kelas['kelas']?> <?= $kelas['jurusan']?> <?= $kelas['sub']?></option>
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
		$(function () {
			$('#presensi').on('submit', function (e) {
			var id= $('.rfid').val();
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: '<?= base_url('presensi/harian')?>',
				data: $('#presensi').serialize(),
				success: function () {
					// toastr.success("Selamat Datang "+ id);
					$("#presensi")[0].reset();
					$('.rfid').focus();
					getNama(id);
				}
			});
			});
		});

		function getNama(id){
			var ids= id;
			$.ajax({
            url: '<?= base_url('presensi/nama_pegawai/')?>'+ids
            }).done(function(res) {
				var obs = JSON.parse(res);
				if(obs==''){
					toastr.error("Kartu tidak terdaftar");
				};
				console.log(obs[0].nama_guru);
				var nama=obs[0].nama_guru;
				var dt = new Date();
				var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                toastr.success("<h4>Selamat Datang "+ nama +"</h4>Jam : "+ time);
            });
		}

		function setAct(){
			$('#rfid').focus();
		}
	</script>
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/uploader_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 15:23:58 GMT -->
</html>
