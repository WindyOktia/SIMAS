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
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>Pilih Kelas</option>
                            <option>XI IPS 1</option>
                            <option>XI IPA 1</option>
                        </select>
                    </div> 
                    <div class="form-group col-md">
                        <input type="time" class="form-control" placeholder="Jam Mulai">
                    </div> 
                    <div class="form-group col-md">
                        <input type="time" class="form-control" placeholder="Jam Selesai">
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
