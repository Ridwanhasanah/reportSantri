$(document).ready(function () {
	// Close Modal
	$('.modal-close').click(function(){
		$('.modal-reg').hide();
	})
	// Datepicker
	$( "#datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth: true,
		changeYear: true
	});

	function checkVal(//function for check input
		name, //long string check and id 
		value, //value string for show
		error,//<span> id in the html for the show();
		condition //Kondisi if
		){
			name.focusout(function(){
				if (name.val().length < condition) {
					error.html(value).show(); //menampilkan text string yang ada
					error.show();//menampilkan span
				}else{
					error.hide(); //jika false maka hide
				}
			})
		
	}

	checkVal($('#name'),'Nama harus lebih dari 3 karakter',$('#errorName'),3)
	checkVal($('#email'),'Email harus harus lebih dari 5 karakter',$('#errorEmail'),5)
	checkVal($('#password'),'Password Minimal 6 karakter',$('#errorPassword'),5)
	checkVal($('#hp'),'No HP harus harus lebih dari 10 digit',$('#errorHp'),10)
	checkVal($('#date_birth'),'Tanggal lahir harus lebih dari 5 karakter',$('#errorDatebirth'),5)
	checkVal($('#address'),'Alamat harus lebih dari 10 karakter',$('#errorAddress'),10)



	var pass = $("#password");
	var repass = $("#repass");

	$("#repass").focusout(function () {
		if (pass.val() !== repass.val()) {
			$('#errorRePassword').html('Maaf Password Tidak Sama').show(); //menampilkan text string yang ada
			$('#errorRePassword').show();//menampilkan span
		}else{
			$('#errorRePassword').hide();
		}
	})



})