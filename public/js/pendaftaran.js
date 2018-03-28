$(document).ready(function(){
	

	/*Validasi select option*/
	$('#submit').hover(function(){

		var divisi = $('#divisi').val();
		var errorDivisi = $('#errorDivisi');

		function error(id,value){

			id.html(value).show(); //menampilkan text string yang ada
			id.show();//menampilkan span
		}

		if (divisi == 0) {
			

			swal({
                title: 'Oops',
                text: 'kamu harus pilih Jurusan terlebih dahulu',
                type: 'error',
              }).then(error($('#errorDivisi'),'kamu harus pilih Jurusan terlebih dahulu'))
		}else if($('#jml_ortu').val() == 0){
			swal({
                title: 'Oops',
                text: 'kamu harus pilih Jumlah Orantua terlebih dahulu',
                type: 'error',
              }).then(error($('#error_jml_ortu'),'kamu harus isi Jumlah ortang tua terlebih dahulu'))
		}else if($('#izin').val() == 0){
			swal({
                title: 'Oops',
                text: 'kamu harus isi form Izin Dari Ortu / Wali terlebih dahulu',
                type: 'error',
              }).then(error($('#error_izin'),'kamu harus isi form Izin Dari Ortu/Wali terlebih dahulu'))
		}else if($('#laptop').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom Punya Lapotop / tidak terlebih dahulu',
                type: 'error',
              }).then(error($('#error_laptop'),'Kamu harus isi kolom Punya Lapotop / tidak terlebih dahulu'))
		}else if($('#pacar').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom Punya Pacar / tidak terlebih dahulu',
                type: 'error',
              }).then(error($('#error_pacar'),'Kamu harus isi kolom Punya Pacar / tidak terlebih dahulu'))
		}else if($('#ada_tanggungan').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom "Tanggunan Pribadi" terlebih dahulu',
                type: 'error',
              }).then(error($('#error_ada_tanggungan'),'Kamu harus isi kolom "Tanggungan Pribadi" terlebih dahulu'))
		}else if($('#karya').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom "Siap Berkarya" terlebih dahulu',
                type: 'error',
              }).then(error($('#error_karya'),'Kamu harus isi kolom "Siap Berkarya" terlebih dahulu'))
		}else if($('#pernah').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom "Pernah Belajar dalam bidang yang dituju" terlebih dahulu',
                type: 'error',
              }).then(error($('#error_pernah'),'Kamu harus isi kolom "Pernah Belajar dalam bidang yang dituju" terlebih dahulu'))
		}else if($('#alokasi').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom "Siap alokasi ke Pondok" terlebih dahulu',
                type: 'error',
              }).then(error($('#error_alokasi'),'Kamu harus isi kolom "Siap alokasi ke Pondok" terlebih dahulu'))
		}else if($('#magang').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom "Siap untuk magang" terlebih dahulu',
                type: 'error',
              }).then(error($('#error_magang'),'Kamu harus isi kolom "Siap untuk magang" terlebih dahulu'))
		}else if($('#berjuang').val() == 0){
			swal({
                title: 'Oops',
                text: 'Kamu harus isi kolom "Siap Untuk Berjuang" terlebih dahulu',
                type: 'error',
              }).then(error($('#error_berjuang'),'Kamu harus isi kolom "Siap Untuk Berjuang" terlebih dahulu'))
		}

	})



	var errorName = $('#errorName');
	var name = $('#nama');
	var dadName = $('#nama_ayah');
	var errorDadName = $('#errorDadName');


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

	name.focusout(function(){
		checkVal(name.val().length, 'Nama harus harus lebih dari 3 karakter', errorName, 2)
	});

	$('#nama_ayah').focusout(function(){
		checkVal($('#nama_ayah').val().length, 'Nama harus harus lebih dari 3 karakter', $('#errornama_ayah'), 2)
	});

	$('#nama_ibu').focusout(function(){
		checkVal($('#nama_ibu').val().length, 'Nama harus harus lebih dari 3 karakter', $('#errornama_ibu'), 2)
	});

	$('#tempat_lahir').focusout(function(){
		checkVal($('#tempat_lahir').val().length, 'Tempat Lahir harus lebih dari 3 karakter', $('#error_tempat_lahir'), 2)
	});

	$('.tanggal_lahir').focusout(function(){
		checkVal($('.tanggal_lahir').val().length, 'Tanggal Lahir harus di isi', $('#error_tanggal_lahir'), 0)
	});

	$('#rumah').focusout(function(){
		checkVal($('#rumah').val().length, 'Rumah harus di isi', $('#error_rumah'), 0)
	});

	$('#kota').focusout(function(){
		checkVal($('#kota').val().length, 'Kota harus di isi', $('#error_kota'), 0)
	});
	$('#hobi').focusout(function(){
		checkVal($('#hobi').val().length, 'Hobi harus lebih dari 5 karakter', $('#error_hobi'), 4)
	});

	$('#cita').focusout(function(){
		checkVal($('#cita').val().length, 'Cita - Cita harus lebih dari 5 karakter', $('#error_cita'), 4)
	});

	$('#email').focusout(function(){
		checkVal($('#email').val().length, 'Email harus di isi', $('#error_email'), 0)
	});

	$('#facebook').focusout(function(){
		checkVal($('#facebook').val().length, 'Link facebook harus di isi', $('#error_facebook'), 0)
	});

	$('#hp').focusout(function(){
		checkVal($('#hp').val().length, 'Nomor Hp harus lebih dari 9 karakter dan maksimal 13 karakter', $('#error_hp'), 8)
	});

	$('#wa').focusout(function(){
		checkVal($('#wa').val().length, 'Nomor WA harus lebih dari 9 karakter dan maksimal 13 karakter', $('#error_wa'), 8)
	});

	$('#lulusan').focusout(function(){
		checkVal($('#lulusan').val().length, 'Lulusan harus di isi', $('#error_lulusan'), 0)
	});

	$('#sekolah').focusout(function(){
		checkVal($('#sekolah').val().length, 'Sekolah harus di isi', $('#error_sekolah'), 0)
	});

	$('#jurusan').focusout(function(){
		checkVal($('#jurusan').val().length, 'Jurusan di Sekolahmu harus di isi', $('#error_jurusan'), 0)
	});

	$('#hp_ortu').focusout(function(){
		checkVal($('#hp_ortu').val().length, 'Nomor Hp Orang tua harus lebih dari 9 karakter dan maksimal 13 karakter', $('#error_hp_ortu'), 9)
	});

	$('#rizki').focusout(function(){
		checkVal($('#rizki').val().length, 'Kolon ini harus di isi', $('#error_rizki'), 0)
	});

	$('#tau').focusout(function(){
		checkVal($('#tau').val().length, 'Kolom ini harus di isi', $('#error_tau'), 0)
	});

	$('#p_ayah').focusout(function(){
		checkVal($('#p_ayah').val().length, 'Pekerjan Ayah harus di isi lebih dari 5 karakter', $('#error_p_ayah'), 4)
	});

	$('#p_ibu').focusout(function(){
		checkVal($('#p_ibu').val().length, 'Pekerjan Ibu harus di isi lebih dari 5 karakter', $('#error_p_ibu'), 4)
	});

	$('#gaji').focusout(function(){
		checkVal($('#gaji').val().length, 'Gaji Orang tuan per bulan harus di isi', $('#error_gaji'), 0)
	});

	$('.j_saudara').focusout(function(){
		checkVal($('.j_saudara').val().length, 'kolom ini harus di isi', $('#error_j_saudara'), 0)
	});

	$('#iq').focusout(function(){
		checkVal($('#iq').val().length, 'Test Iq harus di isi', $('#error_iq'), 0)
	});

	$('#hafalan').focusout(function(){
		checkVal($('#hafalan').val().length, 'Jumlah Hafalan Quran harus di isi', $('#error_hafalan'), 0)
	});

	$('#skill').focusout(function(){
		checkVal($('#skill').val().length, 'kolom ini harus lebih dari 7 karakter', $('#error_skill'), 7)
	});

	$('#kekuranganmu').focusout(function(){
		checkVal($('#kekuranganmu').val().length, 'kolom Kekuranganmu harus di isi', $('#error_kekuranganmu'), 0)
	});

	$('#kelebihanmu').focusout(function(){
		checkVal($('#kelebihanmu').val().length, 'kolon kelebihanmu harus di isi', $('#error_kelebihanmu'), 0)
	});

	$('#idola').focusout(function(){
		checkVal($('#idola').val().length, 'kolom Tokoh idola harus lebih dari 3 karakter', $('#error_idola'), 2)
	});

	$('#buku').focusout(function(){
		checkVal($('#buku').val().length, 'kolom Buku favorite harus di isi', $('#error_buku'), 0)
	});

	$('#ustad').focusout(function(){
		checkVal($('#ustad').val().length, 'kolom idola ustadz harus lebih dari 3 karakter', $('#error_ustad'), 2)
	});

	$('#tanggungan').focusout(function(){
		checkVal($('#tanggungan').val().length, 'kolom ini harus di isi', $('#error_tanggungan'), 0)
	});

	$('#rokok').focusout(function(){
		checkVal($('#rokok').val().length, 'kolom ini harus di isi', $('#error_rokok'), 0)
	});

	$('#kesehatan').focusout(function(){
		checkVal($('#kesehatan').val().length, 'kolom ini harus di isi', $('#error_kesehatan'), 0)
	});

	$('#pemahaman').focusout(function(){
		checkVal($('#pemahaman').val().length, 'kolom ini harus di isi', $('#error_pemahaman'), 0)
	});

	$('#pernyataan').focusout(function(){
		checkVal($('#pernyataan').val().length, 'kolom ini harus di isi', $('#error_pernyataan'), 0)
	});

	$('#limam').focusout(function(){
		checkVal($('#limam').val().length, 'kolom ini harus lebih dari 19 karakter', $('#error_limam'), 19)
	});

	$('#kekurangan').focusout(function(){
		checkVal($('#kekurangan').val().length, 'kolom harus di isi minimal 5 karakter', $('#error_kekurangan'), 4)
	});

	$('#marah').focusout(function(){
		checkVal($('#marah').val().length, 'kolom harus di isi minimal 6 karakter', $('#error_marah'), 5)
	});

	$('#bahagia').focusout(function(){
		checkVal($('#bahagia').val().length, 'kolom harus di isi minimal 6 karakter', $('#error_bahagia'), 5)
	});

	$('#cita_pondok').focusout(function(){
		checkVal($('#cita_pondok').val().length, ' kolom ini harus di isi', $('#error_cita_pondok'), 0)
	});

	$('#berinfak').focusout(function(){
		checkVal($('#berinfak').val().length, 'kolom ini harus di isi', $('#error_berinfak'), 0)
	});

	$('#sudah_punya').focusout(function(){
		checkVal($('#sudah_punya').val().length, 'kolom harus di isi', $('#error_sudah_punya'), 0)
	});

	$('#peraturan').focusout(function(){
		checkVal($('#peraturan').val().length, 'kolom harus di isi minimal 15 karakter', $('#error_peraturan'), 14)
	});

	$('#kekurangan_pondok').focusout(function(){
		checkVal($('#kekurangan_pondok').val().length, 'Kolom ini harus di isi minimal  15 karakter', $('#error_kekurangan_pondok'), 14)
	});

	$('#impian').focusout(function(){
		checkVal($('#impian').val().length, 'kolom ini harus di isi minimal 15 karakter', $('#error_impian'), 14)
	});

	$('#harapan').focusout(function(){
		checkVal($('#harapan').val().length, 'kolom ini harus di isi minimal 15 karakter', $('#error_harapan'), 14)
	});

	$('#alasan').focusout(function(){
		checkVal($('#alasan').val().length, 'Kolom ini harus di isi minimal 10 kakater', $('#error_alasan'), 9)
	});

	$('#kamu_tau').focusout(function(){
		checkVal($('#kamu_tau').val().length, 'kolom ini harus di isi', $('#error_kamu_tau'), 0)
	});

	$('#jalani_kehidupan').focusout(function(){
		checkVal($('#jalani_kehidupan').val().length, 'kolom ini harus di isi', $('#error_jalani_kehidupan'), 0)
	});

	$('#ktp').focusout(function(){
		checkVal($('#ktp').val().length, 'Kolom KTP harus di isi dengan benar', $('#error_ktp'), 14)
	});

	$('#disc').focusout(function(){
		checkVal($('#disc').val().length, 'Kamu harus upload file', $('#error_disc'), 0)
	});

	$('#foto').focusout(function(){
		checkVal($('#foto').val().length, 'Kamu harus upload fotomu', $('#error_foto'), 0)
	});

})
