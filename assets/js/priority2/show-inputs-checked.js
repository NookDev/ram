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