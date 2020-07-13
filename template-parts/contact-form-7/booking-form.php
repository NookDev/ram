<fieldset>

	<!-- name -->
	<div class="row form-name">
		<div class="col-xs-12">
			<label for="form-name">Name / Business</label> 
			[text* text-895 id:form-name placeholder "Enter your name ..."]
		</div>
	</div>
	
	<!-- email -->
	<div class="row form-email">
		<div class=" col-xs-12">
			<label for="form-email">Email</label> 
			[email* email-88 id:form-email placeholder "Enter your email ..."]
		</div>
	</div>

	<!-- ph no -->
	<div class="row form-ph">
		<div class="col-xs-12">
			<label for="form-phone">Phone Number</label> [text* phone id:form-phone placeholder "Enter your phone number ..."]
		</div>

	</div>

	<!-- which equipment -->
	<div class="row equipment-choice">

		<div class="col-xs-12">
			<h5>Equipment to hire</h5>
			<div>
				[radio radio-554 id:form-radio class:equipment-selection label_first use_label_element default:1 "Mini Dumper" "Mini Dumper + Excavator"]
			</div>
		</div>
	</div>

	<!-- pickup or delivery -->
	<div class="row pickup-choice">

		<div class="col-xs-12">
			<h5>Pick up or Delivery</h5>

			<div>
				[radio radio-498 id:form-radio-2 label_first use_label_element default:1 "Local Pickup (North of River)" "Delivery (Perth Metro)" "Delivery (WA Country)"]
			</div>

			<!-- hidden inputs -->
			<div id="booking-hidden1">
				<label class="hidden-input">Pickup Address</label>
				<span>We will contact you to provide the address. Located NOR 6025.</span>
			</div>
			
			<div id="booking-hidden2">
				<label class="hidden-input" for="booking-delivery">Delivery Address</label>
				[text text-11 id:booking-delivery placeholder "Enter the delivery address ..."]
			</div>

			<div id="booking-hidden3">
				<label class="hidden-input" for="booking-shipping">Shipping Address</label>
				[text text-12 id:booking-shipping placeholder "Enter the shipping address ..."]
			</div>

			
		</div>
	</div>

	<!-- booking period-->
	<div class="row booking-period">
		<div class="col-xs-12">
			<h5>Select Desired Booking Period</h5>
		</div>

		<div class="col-xs-6">
			<label for="booking-start">Start date</label> 
			[date* date-835 id:booking-start]
		</div>

		<div class="col-xs-6">
			<label for="booking-end">End date</label> 
			[date date-565 id:booking-end]
		</div>
	</div>

	<!-- textbox -->
	<div class="row form-textbox">
		<div class="col-xs-12">
			<label for="form-textarea">Additional Details</label> [textarea textarea-843 id:form-textarea "Add any relevant details here..."]
		</div>
	</div>

	<!-- submit -->
	<div class="row form-submit">
-
		<div class="col-xs-12 contact_form--submit">
			[submit class:button class:-menu_size "Send Email"]

		</div>
	</div>


</fieldset>