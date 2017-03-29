"use strict";

(function(){
	//var deadline = new Date("2016-05-06 21:00:00");
	initializeClock('clockdiv', deadline);
}());


function getTimeRemaining(endtime) {
	var t = Date.parse(endtime) - Date.parse(new Date());
	var segundos = Math.floor((t/1000)%60);
	var minutos = Math.floor((t/1000/60)%60);
	var horas = Math.floor((t/(1000*60*60))%24);
	var dias = Math.floor(t/(1000*60*60*24));
	return {
		'total': t,
		'dias': dias,
		'horas': horas,
		'minutos': minutos,
		'segundos': segundos
	};
}

function initializeClock(id, endtime) {
	var clock = document.getElementById(id);
	var diasSpan = clock.querySelector('.dias');
	var horasSpan = clock.querySelector('.horas');
	var minutosSpan = clock.querySelector('.minutos');
	var segundosSpan = clock.querySelector('.segundos');

	function updateClock() {
		var t = getTimeRemaining(endtime);

		diasSpan.innerHTML = t.dias;
		horasSpan.innerHTML = ('0' + t.horas).slice(-2);
		minutosSpan.innerHTML = ('0' + t.minutos).slice(-2);
		segundosSpan.innerHTML = ('0' + t.segundos).slice(-2);

		if (t.total <= 0) {
			clearInterval(timeinterval);
		}
	}

	updateClock();
	var timeinterval = setInterval(updateClock, 1000);
}