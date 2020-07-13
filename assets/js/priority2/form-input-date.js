//add current dates form inputs

(function(){
	
	var todaysDate = new Date().toISOString().substr(0, 10);
	
	document.querySelector("#booking-start").value = todaysDate;
	document.querySelector("#booking-start").min = todaysDate;
	
	//debugging
	console.log(todaysDate);
	
	
	
	var tomorrowsDate = new Date();
	
	tomorrowsDate.setDate(tomorrowsDate.getDate() +1);
	
	tomorrowsDate = tomorrowsDate.toISOString().substr(0, 10);
	
	document.querySelector("#booking-end").value = tomorrowsDate;
	document.querySelector("#booking-end").min = tomorrowsDate;
	
	//debugging
	console.log(tomorrowsDate);
	
	/*var dayAfterTomorrowsDate = new Date().toISOString().substr(0, 10);
	
	dayAfterTomorrowsDate.setDate(dayAfterTomorrowsDate.getGate() +2)
	
	document.querySelector("#booking-end").value = dayAfterTomorrowsDate;
	document.querySelector("#booking-end").min = dayAfterTomorrowsDate;*/
	
})();

// or

/*(function(){
	document.querySelector("#booking-start").valueAsDate = new Date();
}) ();*/