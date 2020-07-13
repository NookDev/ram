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
(function radioCheck() {
	
	//hidden form inputs
	var hiddenInput1 = document.querySelector('#booking-hidden1');
	var hiddenInput2 = document.querySelector('#booking-hidden2');
	var hiddenInput3 = document.querySelector('#booking-hidden3');
	
	//visibility
	hiddenInput1.style.display = 'block';
	hiddenInput2.style.display = 'none';
	hiddenInput3.style.display = 'none';
	
	//radio buttons by name
	var radio = document.getElementsByName('radio-498');

	for (var i=0, im=radio.length; im>i; i++) {

		//when radio selected
		radio[i].addEventListener("click",function(e){
			
			if (radio[0].checked == true) {

				hiddenInput1.style.display = 'block';
				hiddenInput2.style.display = 'none';
				hiddenInput3.style.display  = 'none';

			} else if (radio[1].checked == true){

				hiddenInput2.style.display = 'block';
				hiddenInput3.style.display  = 'none';
				hiddenInput1.style.display = 'none';

			} else if (radio[2].checked == true){

				hiddenInput3.style.display  = 'block';
				hiddenInput2.style.display = 'none';
				hiddenInput1.style.display = 'none';

			}
		});
	}
})();