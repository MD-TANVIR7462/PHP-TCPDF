<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>INTAKE FOR FORM I-765</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
#registration_form fieldset:not(:first-of-type) {
	display: none;
}

body,
div,
form,
input,
select,
p {
	padding: 0;
	margin: 0;
	outline: none;
	font-family: Roboto, Arial, sans-serif;
	font-size: 14px;
	color: #666;
	line-height: 22px;
}

form {
	width: 100%;
	padding: 20px;
	border-radius: 6px;
	background: #fff;
	box-shadow: 0 0 20px 0 #095484;
}
input:hover,
select:hover {
	border: 1px solid transparent;
	box-shadow: 0 0 6px 0 #095484;
	color: #095484;
}
input{
	margin-top:10px;
}
.bg-info > h4 {
	padding: 3px;
}
.form-horizontal .control-label {
	text-align: left;
}
</style>
</head>
<body>
	<div class="container" style="padding: 20px;">
		<h1></h1>
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<div CLASS="text-center">
		  <h3>Intake Form I-765, Application for Employment Authorization</h3>  
		</div>
		<form id="registration_form" class="form-horizontal" action="#" method="post">
			<input type="hidden" name="id" value="<?php echo $singleData->id?>" />
			<input type="hidden" name="client_id" value="<?php echo $clientId?>" />
			<fieldset>
				<div class="form-group"> 
					<div class="row"> 
						<div class="col-md-4 col-md-offset-1">
							<label class="control-label" for="attorney">Attorney State Bar Number(if applicable):</label>
							<br>
							<br>
							<input type="text" class="form-control" name="attorney_state_bar_number" id="attorney" value="<?php echo showData('attorney_state_bar_number')?>" /> 
						</div>
						<div class="col-md-4 col-md-offset-1">
							<label class="control-label col-md-10">Attorney or According Representative USCIS Online Account Number (if any):</label>
							<input type="text" class="form-control" name="attorney_uscis_online_account_number" value="<?php echo showData('attorney_uscis_online_account_number')?>"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">

						<div class="bg-info">
							<h4><b>Part 1. Reason for Applying</b> </h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.a.
								
								<input type="hidden" name="reason_applying_initial_permission_to_accept" id="reason_applying_initial_permission_to_accept" value="<?php echo (showData('reason_applying_initial_permission_to_accept') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'reason_applying_initial_permission_to_accept')" <?php echo (showData('reason_applying_initial_permission_to_accept') == 'Y') ? 'checked' : ''; ?>> Initial Permission to accept employment: 

							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.b. 
							<input type="hidden" name="reason_applying_replacement_of_lost" id="reason_applying_replacement_of_lost" value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />	
							
							
							<input type="checkbox" onChange="checkboxValue(this,'reason_applying_replacement_of_lost')"  <?php echo (showData('reason_applying_replacement_of_lost') == 'Y') ? 'checked' : ''; ?>> Replacement of lost, stolen, or damaged employment
							authorization document, or correction of my employment authorization document NOT DUE to U.S. Citizenship and Immigration Services (USCIS) erro
							NOTE: Replacement (correction) of an employment authorization document due to USCIS error does not require a new Form I-765 and filing fee. Refer to Replacement for Card Error in the What is the Filing Fee section of the Form I-765 Instructions for further details .
							</label>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">1.c. 

							<input type="hidden" name="reason_applying_renewal_of_permission" id="reason_applying_renewal_of_permission" value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />
							
							<input type="checkbox" onChange="checkboxValue(this,'reason_applying_renewal_of_permission')" <?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'checked' : ''; ?>> Renewal of my permission to accept employment.(Attach a copy of your previous employment authorization document.)

							</label>
						</div>

						<div class="bg-info">
							<h4><b>Part 2. Information About You</b> </h4>
							<h4><b><i>Your Full Legal Name</i></b> </h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.c. Middle Name:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b><i>Other Name Used</i></b> </h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.a. Family Name(Last Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_other_family_last_name" value="<?php echo showData('information_about_you_other_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.b. Given Name(First Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_other_given_first_name" value="<?php echo showData('information_about_you_other_given_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2.c. Middle Name:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_other_middle_name" value="<?php echo showData('information_about_you_other_middle_name')?>" />
							</div>
						</div>

						
						<div class="bg-info">
							<h4><b>Part 2. Information about you (continued)</b> </h4>
							<h4><b>U.S.  Mailing Address</b> </h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.a. In Care Of Name :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_safe_mailing_care_of_name" value="<?php echo showData('information_about_you_safe_mailing_care_of_name')?>"  />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.b. Street Number and Name:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_safe_mailing_street_number" value="<?php echo showData('information_about_you_safe_mailing_street_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">5.c.  &nbsp; 
								<input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

								<input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

								<input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="information_about_you_safe_mailing_number" value="<?php echo showData('information_about_you_safe_mailing_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.d. City or Town :</label>
							<div class="col-md-7">
								 <input type="text" class="form-control" name="information_about_you_safe_mailing_city_town" value="<?php echo showData('information_about_you_safe_mailing_city_town')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.e. State :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_safe_mailing_state" value="<?php echo showData('information_about_you_safe_mailing_state')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">5.f. Zip Code :</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_you_safe_mailing_zip_code" value="<?php echo showData('information_about_you_safe_mailing_zip_code')?>" />
							</div>
						</div>
						 <div class="form-group">
							<label class="control-label col-md-12">6.Is your current mailing address the same as your physical address?  </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="is_your_current_mailing_same_as_physical" value="yes" <?php echo (showData('is_your_current_mailing_same_as_physical') == 'yes') ? 'checked' : ''; ?>> Yes
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="is_your_current_mailing_same_as_physical" value="no" <?php echo (showData('is_your_current_mailing_same_as_physical') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>
						<div class="bg-info">
							<h4><b>Place of Birth</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">19.c.  Country of Birth:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">20.  Date of Birth (mm/dd/yyyy):</label>
							<div class="col-md-7 col-md-offset-5">
								<input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
							</div>
						</div>

					</div><!-- left side column -->

					<div class="col-md-5 col-md-offset-1">
						<div class="bg-info">
							<h4><b>Other Information</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">8. Alien Registration Number (A-Number) (if any) : &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								 <input type="text" class="form-control" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">9. USCIS Online Account Number (if any)  : &#x2B9E; </label>
							<div class="col-md-8 col-md-offset-4">
								<input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">10. Gender: </label>
							<div class="col-md-6">
								<label class="control-label">
									<input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : ''; ?>> Male
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : ''; ?>> Female
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-7">11. Marital Status: </label>
							<div class="col-md-10 col-md-offset-2">
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>> Single
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : ''; ?>> Married
								</label>
								 &nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : ''; ?>> Divorced
								</label>
								 &nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_about_you_marital_status" value="widowed" <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : ''; ?>> Widowed
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">12. Have you previously filed Form I-765? : </label>
							<div class="col-md-5 col-md-offset-7">
								<label class="control-label">
									<input type="radio" name="other_information_have_you_previously_filed_I_765" value="yes" <?php echo (showData('other_information_have_you_previously_filed_I_765') == 'yes') ? 'checked' : ''; ?>> Yes
								</label>
								&nbsp;
								<label class="control-label">
									<input type="radio" name="other_information_have_you_previously_filed_I_765" value="no" <?php echo (showData('other_information_have_you_previously_filed_I_765') == 'no') ? 'checked' : ''; ?>> No
								</label>
							</div>
						</div>
						<div class="f-name">
							<b>Father's name</b>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">16.a. Family Name(Last Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_your_father_family_last_name" value="<?php echo showData('information_about_your_father_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">16.b.Given Name (First Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_your_father_given_first_name" value="<?php echo showData('information_about_your_father_given_first_name')?>" />
							</div>
						</div>

						<div class="f-name">
							<b>Mother's name</b>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">17.a. Family Name(Last Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_your_mother_family_last_name" value="<?php echo showData('information_about_your_mother_family_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">17.b. Given Name(First Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="information_about_your_mother_given_first_name" value="<?php echo showData('information_about_your_mother_given_first_name')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b>Your Country or Countries of Citizenship or Nationality</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">18.a. Country:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="other_information_about_you_country_of_citizen" value="<?php echo showData('other_information_about_you_country_of_citizen')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b>Part 2.Information about your last arrival in the United States</b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.a.  Form I-94 Arrival-Deprature Record Number (if any): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" name="other_information_about_you_arival_record_number" value="<?php echo showData('other_information_about_you_arival_record_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.b.  Passport Number of Your Most Recently Issued Passport: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" name="other_information_about_you_passport_number" value="<?php echo showData('other_information_about_you_passport_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.c. Travel Document Number (if any): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" name="other_information_about_you_travel_document_number" value="<?php echo showData('other_information_about_you_travel_document_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.d. Country That Issued Your Passport or Travel Document: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" name="other_information_about_you_country_issuance_passport" value="<?php echo showData('other_information_about_you_country_issuance_passport')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">21.e. Expiration Date for Passport or Travel Document (mm/dd/yyyy): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="date" class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>" />
							</div>
						</div>
						<div class="bg-info">
							<h4><b>Part 3. Applicant's Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
						</div>
						<div class="bg-info">
							<h4><b><i>Applicant's Contact Information</i></b></h4>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">3.  Applicant's Daytime Telephone Number: </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" name="petitioner_information_daytime_telephone_number" value="<?php echo showData('petitioner_information_daytime_telephone_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">4.  Applicant's Mobile Telephone Number (if any): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="text" class="form-control" name="petitioner_information_mobile_telephone_number" value="<?php echo showData('petitioner_information_mobile_telephone_number')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12">5. Applicant's Email Address (if any): </label>
							<div class="col-md-7 col-md-offset-5">
								<input type="email" class="form-control" name="petitioner_information_email_address" value="<?php echo showData('petitioner_information_email_address')?>" />
							</div>
						</div>
					</div><!-- right side column -->
				</div>
				  
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
			</fieldset><!-- field set 1 end  -->
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function () {
	var current = 1,
		current_step,
		next_step,
		steps;
	steps = $("fieldset").length;
	$(".next").click(function () {
		current_step = $(this).parent();
		next_step = $(this).parent().next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function () {
		current_step = $(this).parent();
		next_step = $(this).parent().prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
			.html(percent + "%");
	}
});

$(document).on('submit', '#registration_form', function(event){
	event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=8&<?php echo $getId?>",
		method:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{	
			alert(data);
		}
	}); 
});

function checkboxValue(input,output){
	inputValue = input.checked ? "Y" : "N";
	$('#'+output).val(inputValue);
}
</script>