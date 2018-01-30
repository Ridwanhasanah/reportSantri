$(document).ready(function(){

	/*===== Date Picker Start =====*/
	$("#datepicker").datepicker({
		dateFormat:"yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2222"});
	/*===== Date Picker End =====*/

	function showmenu(menu,show){
		$('#'+menu).hover(function(){
			$('#'+show).toggle();
		});
	}

	showmenu('menu','show');
	showmenu('menu1','show1');
	showmenu('menu2','show2');
	showmenu('menu3','show3');
	showmenu('menu4','show4');
	showmenu('menu5','show5');
	

});
