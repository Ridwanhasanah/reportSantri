$(document).ready(function(){
	function bounce(bouncingCount, speed,id) {
		var top = 20;
		var speedRatio = speed / top;
		var heightRatio = top / bouncingCount;

		for (var i = 1; i <= 100; i++) {
			$(id).animate({
				'top' : top
			}, speed);
			$(id).animate({
				'top' : 0
			}, speed / 2);
			top = top - (heightRatio);
			speed = speedRatio * top;
		}
	}

	$('#bounce1').hover(function() {
		bounce(10000000, 1000,'#bouncing1');
	});
	$('#bounce1').hover(function() {
		bounce(10000000, 1000,'#bouncing2');
	});

	function checkVal(//function for check input
		name, //long string check 
		value, //value string for show
		error,//<span> id in the html for the show();
		condition //Kondisi if
		){
		if (name <= condition) {
			error.html(value).show(); //menampilkan text string yang ada
			error.show();//menampilkan span
		}else{
			error.hide(); //jika false maka hide
		}
	}

	$('#name').focusout(function(){
		checkVal($('#name').val().length, 'Nama harus harus lebih dari 3 karakter', $('#errorName'), 2)
	});
	$('#email').focusout(function(){
		checkVal($('#email').val().length, 'Email harus harus lebih dari 5 karakter', $('#errorEmail'), 4)
	});
	$('#password').focusout(function(){
		checkVal($('#password').val().length, 'Password harus harus lebih dari 5 karakter', $('#errorPassword'), 5)
	});
	$('#hp').focusout(function(){
		checkVal($('#hp').val().length, 'No HP harus harus lebih dari 10 digit', $('#errorHp'), 10)
	});
	$('#date_place').focusout(function(){
		checkVal($('#date_place').val().length, 'Tempat lahir harus lebih dari 3 karakter', $('#errorDateplace'), 3)
	});
	$('#date_birth').focusout(function(){
		checkVal($('#date_birth').val().length, 'Tanggal lahir harus lebih dari 5 karakter', $('#errorDatebirth'), 5)
	});
	$('#address').focusout(function(){
		checkVal($('#address').val().length, 'Alamat harus lebih dari 10 karakter', $('#errorAddress'), 10)
	});

	var pass = $("#password");
	var repass = $("#repass");

	function PopUp(name,condition,warning){
		$("#submit").hover(function(){
			if ($(name).val().length <= condition) {
	            swal({
	                title: 'Oops',
	                text: warning,
	                type: 'error',
	              })
	          }
		})
	}

	PopUp("#name", 2, 'Nama harus lebih dari 2 karakter')
	PopUp('#email',4,'Email harus lebih dari 4 karakter')
	PopUp('#password',5,'Password harus lebih dari 5 karakter')
	PopUp('#hp',10,'Nomor HP harus lebih dari 10 digit')
	PopUp('#date_place',3,'Tempat Lahir harus lebih dari 3 karakter')
	PopUp('#address',10,'Alamat harus lebih dari 10 karakter')

	$("#submit").hover(function(){
			if (pass.val() !== repass.val()) {
	            swal({
	                title: 'Oops',
	                text: 'Password tidak Sama',
	                type: 'error',
	              })
	          }
		})

	

})