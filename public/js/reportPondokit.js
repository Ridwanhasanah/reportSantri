$(document).ready(function(){

	/*===== Date Picker Start =====*/
	$("#datepicker").datepicker({
		dateFormat:"yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:2222"});
	/*===== Date Picker End =====*/

	function showmenu($menu,$show){
		$('#'+$menu).hover(function(){
			$('#'+$show).toggle();
		});
	}

	showmenu('menu','show');
	showmenu('menu1','show1');
	showmenu('menu2','show2');
	

});
