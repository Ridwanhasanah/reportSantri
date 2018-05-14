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
})