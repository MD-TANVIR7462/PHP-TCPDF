<?php
$meta_title 	= "INTAKE FOR FORM I-765";
$page_heading 	= "Intake Form I-765, Application for Employment Authorization";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="form-group">
		<div class="page_number">
			<p style="text-align:right;padding-right:10px"><b>Page 1 of 7</b></p>
		</div>
	</div>
	<div class="form-group">
		<div class="row"> 
			<div class="col-md-4 col-md-offset-1">
				<label class="control-label col-md-10">Alien Registration Number</label>
				<input type="text" class="form-control" name="alien_registration_number" value="<?php echo showData('alien_registration_number')?>" maxlength="9" />
			</div>
			<div class="col-md-6 col-md-offset-1">
				<label class="control-label col-md-10">Attorney or According Representative USCIS Online Account Number (if any):</label>
				<input type="text" class="form-control" name="attorney_uscis_online_account_number" value="<?php echo showData('attorney_uscis_online_account_number')?>" maxlength="12" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row"> 
			<div class="col-md-5">
				<div class="d-flexible" style="margin-top:0">
					<input type="hidden" name="attached_form_g28" id="attached_form_g28" value="<?php echo (showData('attached_form_g28') == 'Y') ? 'Y' : 'N'; ?>" />
					<input type="checkbox" onChange="checkboxValue(this,'attached_form_g28')" <?php echo (showData('attached_form_g28') == 'Y') ? 'checked' : ''; ?>>
					<p><b>Select this box if Form G-28 is attached.</b></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">

			<div class="bg-info">
				<h4><b>Part 1. Reason for Applying</b> </h4>
			</div>
			<h5><b>I am applying for (select only one box): </b></h5>
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
	
				
			</div>
			<h4 class="bg-info"><b><i>Your Full Legal Name</i></b> </h4>
			<div class="form-group">
				<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_family_last_name"  value="<?php echo showData('information_about_you_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>" />
				</div>
			</div>
		</div><!-- left side column -->

		<div class="col-md-6">
			<div class="bg-info">
				<h4><b><i>Other Name Used</i></b> </h4>
			</div>
			<h5><b>Provide all other names you have ever used, including aliases, maiden name, and nicknames. If you need extra space to complete this section, use the space provided in Part 6. Additional Information.</b></h5>

			<div class="form-group">
				<label class="control-label col-md-5">2.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29"  name="information_about_you_other_family_last_name_2a" value="<?php echo showData('information_about_you_other_family_last_name_2a')?>" maxlength="29" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_given_first_name_2b" value="<?php echo showData('information_about_you_other_given_first_name_2b')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_middle_name_2c" value="<?php echo showData('information_about_you_other_middle_name_2c')?>" />
				</div>
			</div>
			<hr>
			<div class="form-group">
				<label class="control-label col-md-5">3.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_family_last_name_3a" value="<?php echo showData('information_about_you_other_family_last_name_3a')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_given_first_name_3b" value="<?php echo showData('information_about_you_other_given_first_name_3b')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_middle_name_3c" value="<?php echo showData('information_about_you_other_middle_name_3c')?>" />
				</div>
			</div>
			<hr>
			<div class="form-group">
				<label class="control-label col-md-5">4.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_family_last_name_4a" value="<?php echo showData('information_about_you_other_family_last_name_4a')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_given_first_name_4b" value="<?php echo showData('information_about_you_other_given_first_name_4b')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_other_middle_name_4c" value="<?php echo showData('information_about_you_other_middle_name_4c')?>" />
				</div>
			</div>

		</div><!-- right side column -->
	</div>
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="padding-left:1000px;">Page 2 of 7</p></b>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information about you (continued)</b> </h4>
			</div>
			<div class="bg-info">
				
				<h4><b>Your U.S.  Mailing Address</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.a. In Care Of Name (if any):</label>
				<div class="col-md-7">
					<input type="text" maxlength="34" class="form-control" name="information_about_you_safe_mailing_care_of_name" value="<?php echo showData('information_about_you_safe_mailing_care_of_name')?>"  />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.b. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" maxlength="27" class="form-control" name="information_about_you_safe_mailing_street_number" value="<?php echo showData('information_about_you_safe_mailing_street_number')?>" />
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
					 <input type="text" class="form-control" maxlength="20" name="information_about_you_safe_mailing_city_town" value="<?php echo showData('information_about_you_safe_mailing_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.e. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="information_about_you_safe_mailing_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_safe_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>	
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.f. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" maxlength="5" class="form-control" name="information_about_you_safe_mailing_zip_code" value="<?php echo showData('information_about_you_safe_mailing_zip_code')?>" />
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
			<h5><b>NOTE: If you answered "No" to Item Number 6.,provide your physical address below.</b></h5>
			<div class="bg-info">
				<h4><b>U.S. Physical Address</b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">7.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="27" name="information_about_you_safe_us_physical_street_number" value="<?php echo showData('information_about_you_safe_us_physical_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">7.b.  &nbsp; 
					<input type="radio" name="information_about_you_safe_us_physical_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_us_physical_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

					<input type="radio" name="information_about_you_safe_us_physical_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_us_physical_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

					<input type="radio" name="information_about_you_safe_us_physical_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_us_physical_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="information_about_you_safe_us_physical_number" value="<?php echo showData('information_about_you_safe_us_physical_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">7.c. City or Town :</label>
				<div class="col-md-7">
					 <input type="text" class="form-control" maxlength="20" name="information_about_you_safe_us_physical_city_town" value="<?php echo showData('information_about_you_safe_us_physical_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">7.d. State :</label>
				<div class="col-md-7">								
					<select class="form-control" name="information_about_you_safe_us_physical_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_safe_us_physical_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">7.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="5" name="information_about_you_safe_us_physical_zip_code" value="<?php echo showData('information_about_you_safe_us_physical_zip_code')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Other Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">8. Alien Registration Number (A-Number) (if any) : &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">9. USCIS Online Account Number (if any)  : &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					<input type="text" class="form-control" maxlength="12" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" />
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


			<div class="form-group">
				<label class="control-label col-md-12">13.a. Has the Social Security Administration (SSA) ever officially issued a Social Security card to you? : </label>
				<div class="col-md-5 col-md-offset-7">
					<label class="control-label">
						<input type="radio" name="other_information_social_security_card" value="yes" <?php echo (showData('other_information_social_security_card') == 'yes') ? 'checked' : ''; ?>> Yes
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_social_security_card" value="no" <?php echo (showData('other_information_social_security_card') == 'no') ? 'checked' : ''; ?>> No
					</label>
				</div>
			</div>
			<h5><b>NOTE: If you answered "No" to Item Number 13.a.,skip to Item Number 14. If you answered "Yes" to Item Number 13.a., provide the information requested in Item Number 13.b.</b></h5>
			

		</div><!-- left side column -->
		
		<div class="col-md-6">
				
			<div class="form-group">
				<label class="control-label col-md-12">13.b.Provide your Social Security number (SSN) (if known). : &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" name="other_information_social_security_number_ssn" value="<?php echo showData('other_information_social_security_number_ssn')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">14. Do you want the SSA to issue you a Social Security card? (You must also answer "Yes" to Item Number 15., Consent for Disclosure, to receive a card.): </label>
				<div class="col-md-5 col-md-offset-7">
					<label class="control-label">
						<input type="radio" name="other_information_social_security_card_issue" value="yes" <?php echo (showData('other_information_social_security_card_issue') == 'yes') ? 'checked' : ''; ?>> Yes
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_social_security_card_issue" value="no" <?php echo (showData('other_information_social_security_card_issue') == 'no') ? 'checked' : ''; ?>> No
					</label>
				</div>
			</div>

			<h5><b>NOTE: If you answered "No" to Item Number 14., skip
			to Part 2., Item Number 18.a. If you answered "Yes" to
			Item Number 14., you must also answer "Yes" to Item
			Number 15.
			</b></h5>
			<div class="form-group">
				<label class="control-label col-md-12">15.Consent for Disclosure: I authorize disclosure of information from this application to the SSA as required for the purpose of assigning me an SSN and issuing me a Social Security card.: </label>
				<div class="col-md-5 col-md-offset-7">
					<label class="control-label">
						<input type="radio" name="other_information_constant_for_disclosure" value="yes" <?php echo (showData('other_information_constant_for_disclosure') == 'yes') ? 'checked' : ''; ?>> Yes
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_constant_for_disclosure" value="no" <?php echo (showData('other_information_constant_for_disclosure') == 'no') ? 'checked' : ''; ?>> No
					</label>
				</div>
			</div>

			<h5><b>NOTE: If you answered "Yes" to Item Numbers 14. - 15., provide the information requested in Item Numbers 16.a. - 17.b.</b></h5>
			
			<div class="f-name">
				<b>Father's name</b></br>							
				<b>Provide your father's birth name.</b>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">16.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_your_father_family_last_name" value="<?php echo showData('information_about_your_father_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">16.b.Given Name (First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_your_father_given_first_name" value="<?php echo showData('information_about_your_father_given_first_name')?>" />
				</div>
			</div>
			<div class="f-name">
				<b>Mother's name</b></br>							
				<b>Provide your mother's birth name.</b>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">17.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_your_mother_family_last_name" value="<?php echo showData('information_about_your_mother_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">17.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_your_mother_given_first_name" value="<?php echo showData('information_about_your_mother_given_first_name')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Your Country or Countries of Citizenship or Nationality</b></h4>
			</div>
			<h5><b>List all countries where you are currently a citizen or national. If you need extra space to complete this item, use the space provided in Part 6. Additional Information.</b></h5>
			<div class="form-group">
				<label class="control-label col-md-5">18.a. Country:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="other_information_about_you_country_of_citizen" value="<?php echo showData('other_information_about_you_country_of_citizen')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">18.b. Country:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="other_information_about_you_country_of_citizen_2" value="<?php echo showData('other_information_about_you_country_of_citizen_2')?>" />
				</div>
			</div>						

		</div><!-- right side column -->
	</div>

	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="padding-left:1000px;">Page 3 of 7</p></b>
		</div>
		
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2.Information about you (continued)</b></h4>
			</div>
			
			<div class="bg-info">
				<h4><b>Place of Birth</b></h4>
			</div>
			<h5><b>List the city/town/village, state/province, and country where you were born.</b></h5>
			<div class="form-group">
				<label class="control-label col-md-5">19.a.  City/Town/Village of Birth:</label>
				<div class="col-md-7">
					<input type="text" maxlength="39" class="form-control" name="information_about_you_city_town_village" value="<?php echo showData('information_about_you_city_town_village')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">19.b.  State/Province of Birth:</label>
				<div class="col-md-7">
					<select class="form-control" name="information_about_you_state_province">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_state_province')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">19.c.  Country of Birth:</label>
				<div class="col-md-7">
					<input type="text" maxlength="39" class="form-control" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">20.  Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" maxlength="14" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Information about your last arrival in the United States</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">21.a.  Form I-94 Arrival-Deprature Record Number (if any): </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="11" class="form-control" name="other_information_about_you_arival_record_number" value="<?php echo showData('other_information_about_you_arival_record_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">21.b.  Passport Number of Your Most Recently Issued Passport: </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="39" class="form-control" name="other_information_about_you_passport_number" value="<?php echo showData('other_information_about_you_passport_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">21.c. Travel Document Number (if any): </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="39" class="form-control" name="other_information_about_you_travel_document_number" value="<?php echo showData('other_information_about_you_travel_document_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">21.d. Country That Issued Your Passport or Travel Document: </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="39" class="form-control" name="other_information_about_you_country_issuance_passport" value="<?php echo showData('other_information_about_you_country_issuance_passport')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">21.e. Expiration Date for Passport or Travel Document (mm/dd/yyyy): </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date"  class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">22. Date of Your Last Arrival Into the United States. On or About (mm/dd/yyyy) : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date"  class="form-control" name="information_about_you_last_arrivat_us" value="<?php echo showData('information_about_you_last_arrivat_us')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">23. Place of Your Last Arrival Into the United States: </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="39" class="form-control" name="information_about_you_place_your_last_arrival_us" value="<?php echo showData('information_about_you_place_your_last_arrival_us')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">24. Immigration Status at Your Last Arrival (for example, B-2 visitor, F-1 student, or no status) : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="39" class="form-control" name="information_about_you_place_your_immigration_status" value="<?php echo showData('information_about_you_place_your_immigration_status')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">25. Your Current Immigration Status or Category (for example B-2 visitor, F-1 student, parolee, deferred action, or no status or category) : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="39" class="form-control" name="information_about_you_place_your_immigration_status_category" value="<?php echo showData('information_about_you_place_your_immigration_status_category')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">26. Student and Exchange Visitor Information System (SEVIS) Number (if any) :  &#x2B9E; N-</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="10" class="form-control" name="information_about_you_place_your_student_exchange_visitor" value="<?php echo showData('information_about_you_place_your_immigration_status_category')?>" />
				</div>
			</div>
		
		</div><!--end of left side column -->
		
		<div class="col-md-6">
				
			<div class="bg-info">
				<h4><b>Information About Your Eligibility Category</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">27. Eligibility Category. Refer to the Who May File Form
				I-765 section of the Form I-765 Instructions to determine
				the appropriate eligibility category for this application.
				Enter the appropriate letter and number for your eligibility
				category below (for example, (a)(8), (c)(17)(iii)).: </label>
				<div class="col-md-2 col-md-offset-5">
					<input type="text" class="form-control" name="information_about_you_elligability_category1" maxlength="4" value="<?php echo showData('information_about_you_elligability_category1')?>" />
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control" name="information_about_you_elligability_category2" maxlength="3" value="<?php echo showData('information_about_you_elligability_category2')?>" />
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control" name="information_about_you_elligability_category3" maxlength="4" value="<?php echo showData('information_about_you_elligability_category3')?>" />
				</div>							
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">28.a. Degree:</label>
				<div class="col-md-7">
					<input type="text" maxlength="16" class="form-control" name="information_about_you_elligability_degree" value="<?php echo showData('information_about_you_elligability_degree')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">28.b.Employer's Name as Listed in E-Verify : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" class="form-control" maxlength="39" name="information_about_you_place_your_employer_name_e_verify" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">28.c.Employer's E-Verify Company Identification Number or a Valid E-Verify Client Company Identification Number : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" class="form-control" maxlength="39" name="information_about_you_place_your_employer_name_e_verify_identification" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify_identification')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">29.(c)(26) Eligibility Category. If you entered the eligibility category (c)(26) in Item Number 27., provide the receipt number of your H-IB spouse's most recent Form I-797 Notice for Form I-129, Petition for a Nonimmigrant Worker:   &#x2B9E; </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" maxlength="13" class="form-control" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">30. (c)(8) Eligibility Category. If you entered the eligibility
				category (c)(8) in Item Number 27., have you EVER
				been arrested for and/or convicted of any crime?: </label>
				<div class="col-md-5 col-md-offset-7">
					<label class="control-label">
						<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested" value="yes" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested') == 'yes') ? 'checked' : ''; ?>> Yes
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested" value="no" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested') == 'no') ? 'checked' : ''; ?>> No
					</label>
				</div>
			</div>
			<h5><b>NOTE: If you answered "Yes" to Item Number 30.,
				refer to Special Filing Instructions for Those With
				Pending Asylum Applications (c)(8) in the Required
				Documentation section of the Form I-765 Instructions
				for information about providing court dispositions</b></h5>

			<div class="form-group">
				<label class="control-label col-md-12">31.a. (c)(35) and (c)(36) Eligibility Category. If you enteredthe eligibility category (c)(35) in Item Number 27.,please provide the receipt number of your Form I-797 Notice for Form I-140, Immigrant Petition for Alien Worker. If you entered the eligibility category (c)(36) in Item Number 27., please provide the receipt number of your spouse's or parent's Form I-797 Notice for Form I-140:   &#x2B9E;</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" class="form-control" maxlength="13" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_31" value="<?php echo showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_31')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">31.b. If you entered the eligibility category (c)(35) or (c)(36) in
				Item Number 27., have you EVER been arrested for
				and/or convicted of any crime? </label>
				<div class="col-md-5 col-md-offset-7">
					<label class="control-label">
						<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2" value="yes" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2') == 'yes') ? 'checked' : ''; ?>> Yes
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2" value="no" <?php echo (showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2') == 'no') ? 'checked' : ''; ?>> No
					</label>
				</div>
			</div>
			<h5><b>NOTE: If you answered “Yes” to Item Number 31.b.,
			refer to Employment-Based Nonimmigrant Categories,
			Items 8. - 9., in the Who May File Form I-765 section
			of the Form I-765 Instructions for information about
			providing court dispositions</b></h5>
			
		</div><!--end of right side column -->
	</div>

	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="padding-left:1000px;">Page 4 of 7</p></b>
		</div>
		
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 3. Applicant's Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
			</div>
			<h5><b>NOTE: Read the Penalties section of the Form 1-765
			Instructions before completing this section. You must file
			Form I-765 while in the United States.</b></h5>
			<div class="bg-info">
				<h4><b><i>Applicant's Statement</i></b></h4>
			</div>
			<h5><b>NOTE: Select the box for either Item Number 1.a. or 1.b. If applicable, select the box for Item Number 2. </b></h5>

			<div class="form-group">
				<label class="control-label col-md-12">1.a.
					
					<input type="hidden" name="applicant_statement_1a" id="applicant_statement_1a" value="<?php echo (showData('applicant_statement_1a') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_1a')" <?php echo (showData('applicant_statement_1a') == 'Y') ? 'checked' : ''; ?>> I can read and understand English, and I have read and
					understand every question and instruction on this
					application and my answer to every question.: 

				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b.
					
					<input type="hidden" name="applicant_statement_1b" id="applicant_statement_1b" value="<?php echo (showData('applicant_statement_1b') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_1b')" <?php echo (showData('applicant_statement_1b') == 'Y') ? 'checked' : ''; ?>> The interpreter named in Part 4. read to me every
				question and instruction on this application and my
				answer to every question in
				</label>
			</div>
			
			<input type="text" class="form-control" name="applicant_statement_1_b_write" value="<?php echo showData('applicant_statement_1_b_write')?>" />
			<h5><b>a language in which I am fluent, and I understood everything</b></h5>

			<div class="form-group">
				<label class="control-label col-md-12">2.
					
					<input type="hidden" name="applicant_statement_2" id="applicant_statement_2" value="<?php echo (showData('applicant_statement_2') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_2')" <?php echo (showData('applicant_statement_2') == 'Y') ? 'checked' : ''; ?>> At my request, the preparer named in Part 5.,
				</label>
			</div>
			
			<input type="text" class="form-control" name="applicant_statement_2_write" value="<?php echo showData('applicant_statement_2_write')?>" />
			<h5><b>prepared this application for me based only upon information I provided or authorized.</b></h5>


			<div class="bg-info">
				<h4><b><i>Applicant's Contact Information</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.  Applicant's Daytime Telephone Number: </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" class="form-control" maxlength="10" name="applicant_daytime_tel" value="<?php echo showData('applicant_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4.  Applicant's Mobile Telephone Number (if any): </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" class="form-control" maxlength="10" name="applicant_mobile" value="<?php echo showData('applicant_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Applicant's Email Address (if any): </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="email" class="form-control" maxlength="38" name="applicant_email" value="<?php echo showData('applicant_email')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6.
					
					<input type="hidden" name="applicant_statement_6" id="applicant_statement_6" value="<?php echo (showData('applicant_statement_6') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'applicant_statement_6')" <?php echo (showData('applicant_statement_6') == 'Y') ? 'checked' : ''; ?>>Select this box if you are a Salvadoran or Guatemalan
				national eligible for benefits under the ABC settlement
				agreement.
				</label>
			</div>					
		
		</div><!--end of left side column -->
		
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b><i>Applicant's Signature</i></b></h4>
			</div>						
			<div class="form-group">
				<label class="control-label col-md-7">7.b. Date of Signature (mm/dd/yyyy) :</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="i_765_applicant_sign_date" value="<?php echo showData('i_765_applicant_sign_date')?>" />
				</div>
			</div>			
			<div class="bg-info">
				<h4><b>Part 4. Interpreter's Contact Information, Certification, and Signature</b></h4>
			</div>
			<h5><b>Provide the following information about the interpreter.</b></h5>
			<div class="bg-info">
				<h4><b><i>Interpreter's Full Name</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.a.  Interpreter's Family Name (Last Name)</label>
				<div class="col-md-12">
					<input type="text" maxlength="39" class="form-control" name="i_765_interpreter_family_last_name" value="<?php echo showData('i_765_interpreter_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b.Interpreter's Given Name (First Name) </label>
				<div class="col-md-12">
					<input type="text" maxlength="39" class="form-control" name="i_765_interpreter_family_given_first_name" value="<?php echo showData('i_765_interpreter_family_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any): </label>
				<div class="col-md-12">
					<input type="text" maxlength="34" class="form-control" name="i_765_interpreter_business_name" value="<?php echo showData('i_765_interpreter_business_name')?>" />
				</div>
			</div>
		</div><!--end of right side column -->
	</div>

	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="padding-left:1000px;">Page 5 of 7</p></b>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 4. Interpreter's Contact Information, Certification, and Signature</b></h4>
			</div>

			<div class="bg-info">
				<h4><b>Interpreter's Mailing Address</b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">3.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" maxlength="28" class="form-control" name="i_765_interpreter_mailing_address_street_number" value="<?php echo showData('i_765_interpreter_mailing_address_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">3.b.  &nbsp; 
					<input type="radio" name="i_765_interpreter_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_765_interpreter_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

					<input type="radio" name="i_765_interpreter_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_765_interpreter_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

					<input type="radio" name="i_765_interpreter_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_765_interpreter_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="i_765_interpreter_mailing_address_apt_ste_flr_value" value="<?php echo showData('i_765_interpreter_mailing_address_apt_ste_flr_value')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. City or Town :</label>
				<div class="col-md-7">
					 <input type="text" maxlength="20" class="form-control" name="i_765_interpreter_mailing_address_city_town" value="<?php echo showData('i_765_interpreter_mailing_address_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="i_765_interpreter_mailing_address_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_765_interpreter_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>								
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" maxlength="5" class="form-control" name="i_765_interpreter_mailing_address_zip_code" value="<?php echo showData('i_765_interpreter_mailing_address_zip_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.f. Province :</label>
				<div class="col-md-7">
					<input type="text" maxlength="20" class="form-control" name="i_765_interpreter_mailing_address_province" value="<?php echo showData('i_765_interpreter_mailing_address_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.g. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" maxlength="9" class="form-control" name="i_765_interpreter_mailing_address_postal_code" value="<?php echo showData('i_765_interpreter_mailing_address_postal_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.h. Country :</label>
				<div class="col-md-7">
					<input type="text" maxlength="39" class="form-control" name="i_765_interpreter_mailing_address_country" value="<?php echo showData('i_765_interpreter_mailing_address_country')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b><i>Interpreter's  Contact Information</i></b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">4.  Interpreter's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="10" name="i_765_interpreter_daytime_tel" value="<?php echo showData('i_765_interpreter_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)  </label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="10" name="i_765_interpreter_mobile" value="<?php echo showData('i_765_interpreter_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Interpreter's Email Address (if any) </label>
				<div class="col-md-12">
					<input type="email" class="form-control" maxlength="38" name="i_765_interpreter_email" value="<?php echo showData('i_765_interpreter_email')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b><i>Interpreter's Certification</i></b></h4>
			</div>
			
			<h5><b>I certify, under penalty of perjury, that:</b></h5>
			<h5><b>I am fluent in English and</b></h5><input type="text" maxlength="24" class="form-control" name="i_765_interpreter_certification_language_skill" value="<?php echo showData('i_765_interpreter_certification_language_skill')?>" />
			<h5><b>which is the same language specified in Part 3., Item Number
			1.b., and I have read to this applicant in the identified language
			every question and instruction on this application and his or her
			answer to every question. The applicant informed me that he or
			she understands every instruction, question, and answer on the
			application, including the Applicant's Declaration and
			Certification, and has verified the accuracy of every answer.</b></h5>

			<div class="bg-info">
				<h4><b><i>Interpreter's Signature</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">7.b. Date of Signature (mm/dd/yyyy) :</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="i_765_interpreter_sign_date" value="<?php echo showData('i_765_interpreter_sign_date')?>" />
				</div>
			</div>
		</div><!--end of left side column -->
		
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 5. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant</b></h4>
			</div>
			<h5><b>Provide the following information about the preparer.</b></h5>
			<div class="bg-info">
				<h4><b>Preparers's Full Name</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.a.  Preparer's Family Name (Last Name)</label>
				<div class="col-md-12">
					<input type="text" maxlength="39" class="form-control" name="i_765_preparer_family_last_name" value="<?php echo showData('i_765_preparer_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b.Preparer's Given Name (First Name)  </label>
				<div class="col-md-12">
					<input type="text" maxlength="39" class="form-control" name="i_765_preparer_family_given_first_name" value="<?php echo showData('i_765_preparer_family_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.Preparer's Business or Organization Name (if any) </label>
				<div class="col-md-12">
					<input type="text" maxlength="34" class="form-control" name="i_765_preparer_business_name" value="<?php echo showData('i_765_preparer_business_name')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Mailing Address</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" maxlength="28" class="form-control" name="i_765_preparer_mailing_address_street_number" value="<?php echo showData('i_765_preparer_mailing_address_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">3.b.  &nbsp; 
					<input type="radio" name="i_765_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_765_preparer_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

					<input type="radio" name="i_765_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_765_preparer_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

					<input type="radio" name="i_765_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_765_preparer_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="i_765_preparer_mailing_address_apt_ste_flr_value" value="<?php echo showData('i_765_preparer_mailing_address_apt_ste_flr_value')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. City or Town :</label>
				<div class="col-md-7">
					 <input type="text" maxlength="20" class="form-control" name="i_765_preparer_mailing_address_city_town" value="<?php echo showData('i_765_preparer_mailing_address_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="i_765_preparer_mailing_address_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_765_preparer_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code'>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="5" name="i_765_preparer_mailing_address_zip_code" value="<?php echo showData('i_765_preparer_mailing_address_zip_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.f. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="i_765_preparer_mailing_address_province" value="<?php echo showData('i_765_preparer_mailing_address_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.g. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="9" name="i_765_preparer_mailing_address_postal_code" value="<?php echo showData('i_765_preparer_mailing_address_postal_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.h. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="i_765_preparer_mailing_address_country" value="<?php echo showData('i_765_preparer_mailing_address_country')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b><i>Preparer's Contact Information</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4.  Preparer's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="10" name="i_765_preparer_daytime_tel" value="<?php echo showData('i_765_preparer_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5.Preparer's Mobile Telephone Number (if any)  </label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="10" name="i_765_preparer_mobile" value="<?php echo showData('i_765_preparer_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Preparer's Email Address (if any) </label>
				<div class="col-md-12">
					<input type="email" class="form-control" maxlength="38" name="i_765_preparer_email" value="<?php echo showData('i_765_preparer_email')?>" />
				</div>
			</div>
		</div><!--end of right side column -->				
	</div>

	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="padding-left:1000px;">Page 6 of 7</p></b>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 5. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant(continued)</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Statement</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7.a.
					
					<input type="hidden" name="i_765_preparer_statement_7a" id="i_765_preparer_statement_7a" value="<?php echo (showData('i_765_preparer_statement_7a') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7a')" <?php echo (showData('i_765_preparer_statement_7a') == 'Y') ? 'checked' : ''; ?>> I am not an attorney or accredited representative but
					have prepared this application on behalf of the
					applicant and with the applicant's consent.
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7.b.
					
					<input type="hidden" name="i_765_preparer_statement_7b" id="i_765_preparer_statement_7b" value="<?php echo (showData('i_765_preparer_statement_7b') == 'Y') ? 'Y' : 'N'; ?>" />
					<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7b')" <?php echo (showData('i_765_preparer_statement_7b') == 'Y') ? 'checked' : ''; ?>> I am an attorney or accredited representative and my
					representation of the applicant in this case 
					
					<input type="hidden" name="i_765_preparer_statement_7b_extend" id="i_765_preparer_statement_7b_extend" value="<?php echo (showData('i_765_preparer_statement_7b_extend') == 'Y') ? 'Y' : 'N'; ?>" />
					<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7b_extend')" <?php echo (showData('i_765_preparer_statement_7b_extend') == 'Y') ? 'checked' : ''; ?>> extends
					
					<input type="hidden" name="i_765_preparer_statement_7b_not_extend" id="i_765_preparer_statement_7b_not_extend" value="<?php echo (showData('i_765_preparer_statement_7b_not_extend') == 'Y') ? 'Y' : 'N'; ?>" />
					<input type="checkbox" onChange="checkboxValue(this,'i_765_preparer_statement_7b_not_extend')" <?php echo (showData('i_765_preparer_statement_7b_not_extend') == 'Y') ? 'checked' : ''; ?>> does not extend beyond the preparation of this application.
				</label>
			</div>
			
			<h5><b>NOTE: If you are an attorney or accredited
			representative, you may be obliged to submit a
			completed Form G-28, Notice of Entry of Appearance
			as Attorney or Accredited Representative, with this
			application.</b></h5>

			<div class="bg-info">
				<h4><b><i>Preparer's Signature</i></b></h4>
			</div>						
			<div class="form-group">
				<label class="control-label col-md-7">8.b. Date of Signature (mm/dd/yyyy) :</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="i_765_preparer_sign_date" value="<?php echo showData('i_765_preparer_sign_date')?>" />
				</div>
			</div>						
		</div><!--end of left side column -->
		
		<div class="col-md-6">

		</div><!--end of right side column -->
	</div>

	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
				<div class="row">
					<div class="page_number">
						<b><p style="padding-left:1000px;">Page 7 of 7</p></b>
					</div>
					
                    <div class="col-md-6">
						<div class="bg-info">
							<h4><b>Part 6. Additional Information</b></h4>
						</div>
						
                        <p>If you need extra space to provide any additional information
						within this application, use the space below. If you need more
						space than what is provided, you may make copies of this page
						to complete and file with this application or attach a separate
						sheet of paper. Type or print your name and A-Number (if any)
						at the top of each sheet; indicate the <b>Page Number, Part
						Number,</b> and <b>Item Number</b> to which your answer refers; and
						sign and date each sheet.</p>

						<div class="form-group">
							<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="i_765_additional_info_last_name" value="<?php echo showData('i_765_additional_info_last_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="i_765_additional_info_first_name" value="<?php echo showData('i_765_additional_info_first_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">1.c. Middle Name:</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="i_765_additional_info_middle_name" value="<?php echo showData('i_765_additional_info_middle_name')?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">2. A-Number (if any) ► A-</label>
							<div class="col-md-7">
								<input type="text" maxlength="9" class="form-control" name="i_765_additional_info_a_number" value="<?php echo showData('i_765_additional_info_a_number')?>" />
							</div>
						</div>
						<div class="d-flexible">
							<div class="form-group">
								<label class="control-label col-md-12">3.a. Page Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="2" class="form-control" name="i_765_additional_info_3a_page_no" value="<?php echo showData('i_765_additional_info_3a_page_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">3.b. Part Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_3b_part_no" value="<?php echo showData('i_765_additional_info_3b_part_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">3.c. Item Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="342" class="form-control" name="i_765_additional_info_3c_item_no" value="<?php echo showData('i_765_additional_info_3c_item_no')?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>3.d.</b></span>
								<textarea class="form-control" id="i_765_additional_info_3d" name="i_765_additional_info_3d" maxlength="310" rows="8" cols="50"><?php echo showData('i_765_additional_info_3d')?></textarea>
							</div>
						</div>
						<div class="d-flexible">
							<div class="form-group">
								<label class="control-label col-md-12">4.a. Page Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="2" class="form-control" name="i_765_additional_info_4a_page_no" value="<?php echo showData('i_765_additional_info_4a_page_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">4.b. Part Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_4b_part_no" value="<?php echo showData('i_765_additional_info_4b_part_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">4.c. Item Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_4c_item_no" value="<?php echo showData('i_765_additional_info_4c_item_no')?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>4.d.</b></span>
								<textarea class="form-control" id="i_765_additional_info_4d" name="i_765_additional_info_4d" maxlength="342" rows="8" cols="50"><?php echo showData('i_765_additional_info_4d')?></textarea>
							</div>
						</div>
					</div><!--end of left side column -->
                    
                    <div class="col-md-6">
						<div class="d-flexible">
							<div class="form-group">
								<label class="control-label col-md-12">5.a. Page Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="2" name="i_765_additional_info_5a_page_no" value="<?php echo showData('i_765_additional_info_5a_page_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">5.b. Part Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_5b_part_no" value="<?php echo showData('i_765_additional_info_5b_part_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">5.c. Item Number</label>
								<div class="col-md-12">
									<input type="text" maxlength="6" class="form-control" name="i_765_additional_info_5c_item_no" value="<?php echo showData('i_765_additional_info_5c_item_no')?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>5.d.</b></span>
								<textarea class="form-control" id="i_765_additional_info_5d" name="i_765_additional_info_5d" maxlength="227" rows="8" cols="50"><?php echo showData('i_765_additional_info_5d')?></textarea>
							</div>
						</div>
						<div class="d-flexible">
							<div class="form-group">
								<label class="control-label col-md-12">6.a. Page Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="2" name="i_765_additional_info_6a_page_no" value="<?php echo showData('i_765_additional_info_6a_page_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">6.b. Part Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_6b_part_no" value="<?php echo showData('i_765_additional_info_6b_part_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">6.c. Item Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_6c_item_no" value="<?php echo showData('i_765_additional_info_6c_item_no')?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>6.d.</b></span>
								<textarea class="form-control" id="i_765_additional_info_6d" name="i_765_additional_info_6d" maxlength="303" rows="8" cols="50"><?php echo showData('i_765_additional_info_6d')?></textarea>
							</div>
						</div>
						<div class="d-flexible">
							<div class="form-group">
								<label class="control-label col-md-12">7.a. Page Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="2" name="i_765_additional_info_7a_page_no" value="<?php echo showData('i_765_additional_info_7a_page_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">7.b. Part Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_7b_part_no" value="<?php echo showData('i_765_additional_info_7b_part_no')?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12">7.c. Item Number</label>
								<div class="col-md-12">
									<input type="text" class="form-control" maxlength="6" name="i_765_additional_info_7c_item_no" value="<?php echo showData('i_765_additional_info_7c_item_no')?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<span><b>7.d.</b></span>
								<textarea class="form-control" id="i_765_additional_info_7d" name="i_765_additional_info_7d" maxlength="342" rows="8" cols="50"><?php echo showData('i_765_additional_info_7d')?></textarea>
							</div>
						</div>
					</div><!--end of right side column -->
				</div>

				<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
				<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<?php include "intake_footer.php"?>