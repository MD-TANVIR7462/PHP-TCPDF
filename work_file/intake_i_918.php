<?php
$meta_title 	= "INTAKE FORM I-918";
$page_heading 	= "INTAKE FORM I-918, Petition for U Nonimmigrant Status.";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 1 of 11</p>
		</b>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-3 col-md-offset-1">
				<label class="control-label">					
					<?php echo createCheckbox("form_918_g28_is_attached")?>	
					Select this box if Form G-28 is attached.
				</label>
				<br>
				<br>

			</div>
			<div class="col-md-4">
				<label class="control-label">Attorney State Bar Number(if applicable):</label>
				<br>
				<br>
				<div class="col-md-10">
					<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled/>
				</div>
			</div>
			<div class="col-md-4">
				<label class="control-label col-md-10">Attorney or According Representative USCIS Online
					Account Number (if any):</label>
				<br>
				<div class="col-md-10">
					<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number?>" disabled/>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 1. Information About You</b> (Person filing this petition as a victim)</h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_family_last_name"
						value="<?php echo showData('information_about_you_family_last_name')?>" maxlength="29"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_given_first_name"
						value="<?php echo showData('information_about_you_given_first_name')?>" maxlength="29"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_middle_name"
						value="<?php echo showData('information_about_you_middle_name')?>" maxlength="29"/>
				</div>
			</div>
			<div>
				<h5><b>Other Names Used </b> (Include maiden name, nicknames, and aliases, if applicable)
				</h5>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_other_family_last_name"
						value="<?php echo showData('information_about_you_other_family_last_name')?>" maxlength="29"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_other_given_first_name"
						value="<?php echo showData('information_about_you_other_given_first_name')?>" maxlength="29"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_other_middle_name"
						value="<?php echo showData('information_about_you_other_middle_name')?>" maxlength="29"/>
				</div>
			</div>
			<div class="bg-info">
				<div class="d-flexible-floating">
					<h4><b>Home Address</b></h4>
					<a data-element-id="2664R" title="https://tools.usps.com/go/ZipLookupAction_input"
						href="https://tools.usps.com/go/ZipLookupAction_input" target="_blank"
						rel="noopener noreferrer nofollow" id="pdfjs_internal_id_2664R">USPS ZIP Code
						Lookup</a>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_street_number"
						value="<?php echo showData('information_about_you_home_street_number')?>" maxlength="25"/>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6"><b>3.b.</b> &nbsp;
					<input type="radio" name="information_about_you_home_apt_ste_flr" value="apt"
						<?php echo (showData('information_about_you_home_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
					Apt.&nbsp;

					<input type="radio" name="information_about_you_home_apt_ste_flr" value="ste"
						<?php echo (showData('information_about_you_home_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
					Ste. &nbsp;

					<input type="radio" name="information_about_you_home_apt_ste_flr" value="flr"
						<?php echo (showData('information_about_you_home_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
					Flr.:&nbsp;

				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value"
						value="<?php echo showData('information_about_you_home_apt_ste_flr_value')?>" maxlength="6"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_city_town"
						value="<?php echo showData('information_about_you_home_city_town')?>" maxlength="20"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="information_about_you_home_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_home_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_zip_code"
						value="<?php echo showData('information_about_you_home_zip_code')?>" maxlength="5"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.f. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_province"
						value="<?php echo showData('information_about_you_home_province')?>" maxlength="20" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.g. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_postal_code"
						value="<?php echo showData('information_about_you_home_postal_code')?>" maxlength="9"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.h. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_country"
						value="<?php echo showData('information_about_you_home_country')?>" maxlength="39"/>
				</div>
			</div>
		</div><!-- left side column -->

		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Safe Mailing Address</b> (if other than Home Address)</h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.a. In Care Of Name :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_care_of_name"
						value="<?php echo showData('information_about_you_mailing_care_of_name')?>" maxlength="34"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.b. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_street_number"
						value="<?php echo showData('information_about_you_mailing_street_number')?>" maxlength="25"/>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6"><b>4.c. </b> &nbsp;

					<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="apt"
						<?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
					Apt. &nbsp;

					<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="ste"
						<?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
					Ste. &nbsp;

					<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="flr"
						<?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
					Flr.:
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="information_about_you_mailing_number"
						value="<?php echo showData('information_about_you_mailing_number')?>" maxlength="6"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.d. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_city_town"
						value="<?php echo showData('information_about_you_mailing_city_town')?>" maxlength="20"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.e. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="information_about_you_mailing_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.f. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_zip_code"
						value="<?php echo showData('information_about_you_mailing_zip_code')?>" maxlength="5"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.g. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_province"
						value="<?php echo showData('information_about_you_mailing_province')?>" maxlength="20"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.h. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_postal_code"
						value="<?php echo showData('information_about_you_mailing_postal_code')?>" maxlength="9"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.i. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_country"
						value="<?php echo showData('information_about_you_mailing_country')?>" maxlength="39" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Other Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Alien Registration Number (A-Number) (if any) :
				</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">&#x2B9E;</span>
						<b>A-</b>
						<input type="text" class="form-control"
							name="other_information_about_you_alien_registration_number"
							value="<?php echo showData('other_information_about_you_alien_registration_number')?>" maxlength="9"/>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. U.S. Social Security Number (if any) : &#x2B9E;
				</label>
				<div class="col-md-8 col-md-offset-4">
					<input type="text" class="form-control"
						name="other_information_about_you_social_security_number"
						value="<?php echo showData('other_information_about_you_social_security_number')?>" maxlength="9"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7. USCIS Online Account Number (if any) : &#x2B9E;
				</label>
				<div class="col-md-8 col-md-offset-4">
					<input type="text" class="form-control"
						name="other_information_about_you_uscis_online_account_number"
						value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" maxlength="12"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">8. Marital Status: </label>
				<div class="col-md-10">
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="single"
							<?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>>
						Single
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="married"
							<?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : ''; ?>>
						Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="divorced"
							<?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : ''; ?>>
						Divorced
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="widowed"
							<?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : ''; ?>>
						Widowed
					</label>
				</div>
			</div>
		</div><!-- right side column -->
	</div>
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- field set 1 end  -->

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 2 of 11</p>
		</b>
	</div>
	<!-- field set 2 start  -->
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 1. Information About You </b> (continued)</h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">9. Gender: </label>
				<div class="col-md-4">
					<label class="control-label">
						<input type="radio" name="other_information_about_you_gender" value="male"
							<?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : ''; ?>>
						Male
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_gender" value="female"
							<?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : ''; ?>>
						Female
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">10. Date of Birth (mm/dd/yyyy) :</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="other_information_about_you_date_of_birth"
						value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">11. Country of Birth:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39"
						name="other_information_about_you_country_of_birth" 
						value="<?php echo showData('other_information_about_you_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">12. Country of Citizenship or Nationality:</label>
				<div class="col-md-5">
					<input type="text" class="form-control" maxlength="39"
						name="other_information_about_you_country_of_citizen"
						value="<?php echo showData('other_information_about_you_country_of_citizen')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">13. Form I-94 Arrival-Departure Record Number:
					&#x2B9E; </label>
				<div class="col-md-5">
					<input type="text" class="form-control" maxlength="11" name="i_94_imgt_arrival_record_number"
						value="<?php echo showData('i_94_imgt_arrival_record_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">14. Passport Number : </label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="other_information_about_you_passport_number" maxlength="26"
						value="<?php echo showData('other_information_about_you_passport_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">15. Travel Document Number:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20"
						name="other_information_about_you_travel_document_number"
						value="<?php echo showData('other_information_about_you_travel_document_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">16. Country of Issuance for Passport or Travel Document : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="text" class="form-control" maxlength="39" name="i_94_imgt_country_issuance_passport"
						value="<?php echo showData('i_94_imgt_country_issuance_passport')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">17. Date of Issuance for Passport or Travel Document (mm/dd/yyyy) : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="i_94_imgt_date_issuance_passport"
						value="<?php echo showData('i_94_imgt_date_issuance_passport')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">18. Expiration Date for Passport or Travel Document (mm/dd/yyyy) : </label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control"
						name="other_information_about_you_expiry_date_issuance_passport"
						value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>" />
				</div>
			</div>
			<p>Place and Date of Last Entry into the United States and Date Authorized Stay Expired</p>
			<div class="form-group">
				<label class="control-label col-md-5">19.a. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_94_imgt_city_town" maxlength="20"
						value="<?php echo showData('i_94_imgt_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">19.b. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="i_94_imgt_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_94_imgt_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">20. Date of Last Entry into the United States (mm/dd/yyyy):</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="i_94_imgt_date_of_last_arival"
						value="<?php echo showData('i_94_imgt_date_of_last_arival')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">21. Date Authorized Stay Expired (mm/dd/yyyy):</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="i_94_imgt_expiry_date_of_authorized" value="<?php echo showData('i_94_imgt_expiry_date_of_authorized')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">22. Current Immigration Status: </label>
				<div class="col-md-9 col-md-offset-3">
					<input type="text" class="form-control" name="i_94_current_immigration_status" 
						value="<?php echo showData('i_94_current_immigration_status')?>" />
				</div>
			</div>

		</div>
		<!--end column-->


		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Additional Information About You</b></h4>
			</div>
			<div class="form-group">
				<p>
					Answering “Yes” to the following questions below requires
					explanations and supporting documentation. Attach relevant
					documents in support of your claims that you are a victim of
					criminal activity listed in the Immigration and Nationality Act
					(INA) section 101(a)(15)(U)(iii). You must also attach a personal
					narrative statement describing the criminal activity of which you are
					a victim. If you are only petitioning for U derivative status for
					qualifying family members subsequent to your (the principal
					petitioner) initial filing, you are not required to submit evidence
					supporting the original petition with the new Form I-918.
				</p>
			</div>
			<div class="form-group">
				<p>
					If you need extra space to complete <b>Part 2.</b> , use the space
					provided in <b>Part 8. Additional Information.</b>
					Select "Yes" or "No," as appropriate, for each of the following
					questions.
				</p>
			</div>
			<div class="form-group">
				<p><b>1.</b> I am a victim of criminal activity listed in the INA at section
					101(a)(15)(U)(iii). </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_2_q1_victim_of_criminal_activity"
							<?php echo (showData('part_2_q1_victim_of_criminal_activity')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_2_q1_victim_of_criminal_activity"
							<?php echo (showData('part_2_q1_victim_of_criminal_activity')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>2.</b> I have suffered substantial physical or mental abuse as a result of having been
					a victim of this criminal activity </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_2_q2_i_have_suffered_substantial"
							<?php echo (showData('part_2_q2_i_have_suffered_substantial')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_2_q2_i_have_suffered_substantial"
							<?php echo (showData('part_2_q2_i_have_suffered_substantial')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>3.</b> I possess information concerning the criminal activity of which I was a victim
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_2_q3_Pocess_information_concerning"
							<?php echo (showData('part_2_q3_Pocess_information_concerning')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_2_q3_Pocess_information_concerning"
							<?php echo (showData('part_2_q3_Pocess_information_concerning')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>4.</b> I am submitting Form I-918, Supplement B, U Nonimmigrant Status Certification,
					from a certifying official </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_2_q4_submitting_form_non_immigrant"
							<?php echo (showData('part_2_q4_submitting_form_non_immigrant')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_2_q4_submitting_form_non_immigrant"
							<?php echo (showData('part_2_q4_submitting_form_non_immigrant')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>5.</b> The crime of which I am a victim occurred in the United States (including
					Indian country and military installations) or violated the laws of the United States.
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_2_q5_the_crime_which_im_victime"
							<?php echo (showData('part_2_q5_the_crime_which_im_victime')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_2_q5_the_crime_which_im_victime"
							<?php echo (showData('part_2_q5_the_crime_which_im_victime')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>6.</b> I am under 16 years of age.</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_2_q6_im_under_16_years"
							<?php echo (showData('part_2_q6_im_under_16_years')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_2_q6_im_under_16_years"
							<?php echo (showData('part_2_q6_im_under_16_years')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>7.a.</b> I was or am in immigration proceedings.</p>
				<div class="col-md-4 col-md-offset-8">
					<?php echo createRadio("other_info_family_immegration_process")?>
				</div>
			</div>
			<div class="form-group">
				<p>
					If you answered "Yes," select the type of proceedings. If you
					were in proceedings in the past and are no longer in proceedings,
					provide the date of action. If you are currently in proceedings,
					type or print “Current” in the appropriate date field. Select <b>all
						applicable</b> boxes.Use the space provided in <b>Part 8. Additional
						Information</b> to provide an explanation.
				</p>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7"> 7.b.
					<?php echo createCheckbox("immigration_proceedings_removal")?>
					Removal Proceedings <br>Removal Date (mm/dd/yyyy)
				</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="immigration_proceedings_removal_date"
						value="<?php echo showData('immigration_proceedings_removal_date')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7"> 7.c.
					<?php echo createCheckbox("family_member_immigration_proceedings_exclusion")?>
					Exclusion Proceedings <br>Exclusion Date (mm/dd/yyyy)
				</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="immigration_proceedings_exclusion_date"
						value="<?php echo showData('immigration_proceedings_exclusion_date')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7"> 7.d.
					<?php echo createCheckbox("immigration_proceedings_deportion")?>
					Deportation Proceedings <br>Deportation Date(mm/dd/yyyy)
				</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="immigration_proceedings_deportion_date"
						value="<?php echo showData('immigration_proceedings_deportion_date')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7"> 7.e.
					<?php echo createCheckbox("immigration_proceedings_rescission")?>
					Rescission Proceedings <br>Rescission Date (mm/dd/yyyy)
				</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="immigration_proceedings_rescission_date"
						value="<?php echo showData('immigration_proceedings_rescission_date')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7"> 7.f.
					<?php echo createCheckbox("immigration_proceedings_judicial")?>
					Judicial Proceedings <br>Judicial Date (mm/dd/yyyy)
				</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="immigration_proceedings_judicial_date"
						value="<?php echo showData('immigration_proceedings_judicial_date')?>">
				</div>
			</div>
		</div>
		<!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 3 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Additional Information About You </b> (continued)</h4>
			</div>
			<div class="form-group">
				<p>
					<b>
						Provide the date of entry, place of entry, and status under
						which you entered the United States for each entry during the
						five years preceding the filing of this petition.
					</b>
				</p>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">8.a Date of Entry (mm/dd/yyyy)</label>
				<div class="col-md-5">
					<input type="date" class="form-control"
						name="other_information_about_you_date_of_entry"
						value="<?php echo showData('other_information_about_you_date_of_entry')?>" />
				</div>
			</div>
			<div class="form-group">
				<p>Place of Entry into the United States</p>

				<label class="control-label col-md-5">8.b. City or Town </label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="other_information_about_you_place_of_entry_city_town" maxlength="20"
						value="<?php echo showData('other_information_about_you_place_of_entry_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">8.c. State </label>
				<div class="col-md-7">
					<select class="form-control"
						name="additional_info_about_you_place_of_entry_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('additional_info_about_you_place_of_entry_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">8.d. Status at the Time of Entry (for example, F-1
					student, B-2 tourist, entered without inspection)</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control"
						name="additional_info_about_you_status_of_entry" maxlength="20"
						value="<?php echo showData('additional_info_about_you_status_of_entry')?>" />
				</div>
			</div>
			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<label class="control-label col-md-7">9.a Date of Entry (mm/dd/yyyy)</label>
				<div class="col-md-5">
					<input type="date" class="form-control"
						name="additional_info_about_you_date_of_entry2"
						value="<?php echo showData('additional_info_about_you_date_of_entry2')?>" />
				</div>
			</div>
			<div class="form-group">
				<p>Place of Entry into the United States</p>
				<label class="control-label col-md-5">9.b. City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="additional_info_about_you_place_of_entry_city_town2" maxlength="20"
						value="<?php echo showData('additional_info_about_you_place_of_entry_city_town2')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">9.c. State</label>
				<div class="col-md-7">
					<select class="form-control" name="additional_info_about_you_place_of_entry_state2">
						<option value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('additional_info_about_you_place_of_entry_state2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">9.d. Status at the Time of Entry (for example, F-1
					student, B-2 tourist, entered without inspection)</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control" maxlength="20"
						name="additional_info_about_you_status_of_entry2"
						value="<?php echo showData('additional_info_about_you_status_of_entry2')?>" />
				</div>
			</div>
			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<label class="control-label col-md-7">10.a Date of Entry (mm/dd/yyyy)</label>
				<div class="col-md-5">
					<input type="date" class="form-control"
						name="additional_info_about_you_date_of_entry3"
						value="<?php echo showData('additional_info_about_you_date_of_entry3')?>" />
				</div>
			</div>
			<div class="form-group">
				<p>Place of Entry into the United States</p>

				<label class="control-label col-md-5">10.b. City or Town </label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20"
						name="additional_info_about_you_place_of_entry_city_town3"
						value="<?php echo showData('additional_info_about_you_place_of_entry_city_town3')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">10.c. State </label>
				<div class="col-md-7">
					<select class="form-control" name="additional_info_about_you_place_of_entry_state3">
						<option value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('additional_info_about_you_place_of_entry_state3')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">10.d. Status at the Time of Entry (for example, F-1
					student, B-2 tourist, entered without inspection)</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control" maxlength="20"
						name="additional_info_about_you_status_of_entry3"
						value="<?php echo showData('additional_info_about_you_status_of_entry3')?>" />
				</div>
			</div>
			<div class="form-group">
				<p><b>If you are outside of the United States, provide the U.S.
						Consulate or inspection facility or a safe foreign mailing
						address you want notified if this petition is approved. </b></p>
			</div>
			<div class="form-group">
				<p><b>11.a. </b>Type of Office (Select <b>only one </b>box):</p>
				<div class="col-md-11 col-md-offset-1">
					<label class="control-label">
					<?php echo createCheckbox("additional_info_about_you_type_of_office_us_consulate","U.S Consulate")?>
					</label>
					<label class="control-label">
					<?php echo createCheckbox("additional_info_about_you_type_of_office_pre_flight_inspection","Pre-Flight Inspection")?>
					</label>
					<label class="control-label">
					<?php echo createCheckbox("additional_info_about_you_type_of_office_port_of_entry","Port-of-Entry")?>
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">11.b. City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20"
						name="additional_info_about_you_place_of_notification_outside_us_city_town"
						value="<?php echo showData('additional_info_about_you_place_of_notification_outside_us_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">11.c. State</label>
				<div class="col-md-7">
					<select class="form-control" name="additional_info_about_you_place_of_notification_outside_us_state">
						<option value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('additional_info_about_you_place_of_notification_outside_us_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">11.d. Country</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control" maxlength="39"
						name="additional_info_about_you_place_of_notification_outside_us_country"
						value="<?php echo showData('additional_info_about_you_place_of_notification_outside_us_country')?>" />
				</div>
			</div>

		</div>
		<!--end column-->
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Additional Information About You </b> (continued)</h4>
			</div>
			<div class="form-group">
				<p>
					<b>Safe Foreign Address Where You Want Notification Sent</b> (if
					other than U.S. Consulate, Pre-Flight Inspection, or Port-of Entry)
				</p>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">12.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_safe_foreign_notification_street_number" maxlength="26"
						value="<?php echo showData('information_about_you_safe_foreign_notification_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6"><b>12.b.</b> &nbsp;
					<input type="radio" name="information_about_you_safe_foreign_notification_apt_ste_flr"
						value="apt"
						<?php echo (showData('information_about_you_safe_foreign_notification_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
					Apt.&nbsp;

					<input type="radio" name="information_about_you_safe_foreign_notification_apt_ste_flr"
						value="ste"
						<?php echo (showData('information_about_you_safe_foreign_notification_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
					Ste. &nbsp;

					<input type="radio" name="information_about_you_safe_foreign_notification_apt_ste_flr"
						value="flr"
						<?php echo (showData('information_about_you_safe_foreign_notification_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
					Flr.:&nbsp;

				</div>
				<div class="col-md-6">
					<input type="text" class="form-control"
						name="information_about_you_safe_foreign_notification_ste_apt_flr_number" maxlength="6"
						value="<?php echo showData('information_about_you_safe_foreign_notification_ste_apt_flr_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">12.c. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_safe_foreign_notification_city_town" maxlength="20"
						value="<?php echo showData('information_about_you_safe_foreign_notification_city_town')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">12.d. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_safe_foreign_notification_province" maxlength="20"
						value="<?php echo showData('information_about_you_safe_foreign_notification_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">12.e. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_safe_foreign_notification_postal_code" maxlength="9"
						value="<?php echo showData('information_about_you_safe_foreign_notification_postal_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">12.f. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_safe_foreign_notification_country" maxlength="39"
						value="<?php echo showData('information_about_you_safe_foreign_notification_country')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Part 3. Processing Information </b></h4>
			</div>

			<div class="form-group">
				<p>
					Answer the following questions about yourself. For the
					purposes of this petition, you must answer "Yes" to the
					following questions, if applicable, even if your records were
					sealed or otherwise cleared or if anyone, including a judge, law
					enforcement officer, or attorney, told you that you no longer
					have a record
				</p>

				<p><b>NOTE:</b> : If you answer “Yes” to <b>ANY</b> question in <b>Part 3.</b>,
					provide an explanation in the space provided in <b>Part 8.
						Additional Information.</b></p>
				<p><b>NOTE:</b> : Answering "Yes" does not necessarily mean that
					U.S. Citizenship and Immigration Services (USCIS) will deny
					your Petition for U Nonimmigrant Status.</p>
				<p>Have you <b>EVER:</b></p>
			</div>

			<div class="form-group">
				<p><b>1.a.</b> Committed a crime or offense for which you have not been arrested?.</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1a_committed_a_crime_or_offense"
							<?php echo (showData('part_3_1a_committed_a_crime_or_offense')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1a_committed_a_crime_or_offense"
							<?php echo (showData('part_3_1a_committed_a_crime_or_offense')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.b.</b> Been arrested, cited, or detained by any law enforcement
					officer (including Department of Homeland Security (DHS),
					former Immigration and Naturalization Service (INS), and
					military officers) for any reason?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1b_Been_arrested_or_detained"
							<?php echo (showData('part_3_1b_Been_arrested_or_detained')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1b_Been_arrested_or_detained"
							<?php echo (showData('part_3_1b_Been_arrested_or_detained')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.c.</b> Been charged with committing any crime or offense?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1c_Been_charged_any_crime_offense"
							<?php echo (showData('part_3_1c_Been_charged_any_crime_offense')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1c_Been_charged_any_crime_offense"
							<?php echo (showData('part_3_1c_Been_charged_any_crime_offense')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.d.</b> Been convicted of a crime or offense (even if the violation was subsequently
					expunged or pardoned)?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1d_been_charged_any_crime_offense"
							<?php echo (showData('part_3_1d_been_charged_any_crime_offense')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1d_been_charged_any_crime_offense"
							<?php echo (showData('part_3_1d_been_charged_any_crime_offense')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.e.</b> Been placed in an alternative sentencing or a rehabilitative
					program (for example, diversion, deferred prosecution,
					withheld adjudication, deferred adjudication)?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1e_been_placed_alternative_sentencing"
							<?php echo (showData('part_3_1e_been_placed_alternative_sentencing')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1e_been_placed_alternative_sentencing"
							<?php echo (showData('part_3_1e_been_placed_alternative_sentencing')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
		</div>
		<!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 4 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 3. Processing Information </b> (Continued)</h4>
			</div>
			<div class="form-group">
				<p><b>1.f.</b> Received a suspended sentence, been placed on probation, or been paroled?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1f_received_a_suspended_sentence"
							<?php echo (showData('part_3_1f_received_a_suspended_sentence')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1f_received_a_suspended_sentence"
							<?php echo (showData('part_3_1f_received_a_suspended_sentence')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.g.</b> Been in jail or prison?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1g_been_in_jail_or_prison"
							<?php echo (showData('part_3_1g_been_in_jail_or_prison')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1g_been_in_jail_or_prison"
							<?php echo (showData('part_3_1g_been_in_jail_or_prison')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.h.</b> Been the beneficiary of a pardon, amnesty, rehabilitation, or other act of
					clemency or similar action? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1h_been_the_beneficiary_of_a_pardon"
							<?php echo (showData('part_3_1h_been_the_beneficiary_of_a_pardon')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1h_been_the_beneficiary_of_a_pardon"
							<?php echo (showData('part_3_1h_been_the_beneficiary_of_a_pardon')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>1.i.</b> Exercised diplomatic immunity to avoid prosecution for a criminal offense in
					the United States?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_1i_exercised_diplomatic_immunity"
							<?php echo (showData('part_3_1i_exercised_diplomatic_immunity')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_1i_exercised_diplomatic_immunity"
							<?php echo (showData('part_3_1i_exercised_diplomatic_immunity')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>Information About Arrests, Citations, Detentions, or Charges</b>
					If you answered “Yes” to any of the above questions, respond to
					the questions below to provide additional details. If you need
					extra space, use the space provided in <b>Part 8. Additional
						Information.</b></p>
			</div>

		
			<div class="form-group">
				<p><b>2.a.</b> Why were you arrested, cited, detained, or charged?</p>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control"  
						name="processing_information_why_were_you_arested" maxlength="39"
						value="<?php echo showData('processing_information_why_were_you_arested')?>" />
				</div>
			</div>
			<div class="form-group">
				<p><b>2.b.</b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</p>
				<div class="col-md-8 col-md-offset-4">
					<input type="date" class="form-control"
						name="processing_information_date_of_arrest_citation_detension_or_charge" 
						value="<?php echo showData('processing_information_date_of_arrest_citation_detension_or_charge')?>" />
				</div>
			</div>
			<div class="form-group">
				<p> Where were you arrested, cited, detained, or charged?</p>
				<label class="control-label col-md-5">2.c. City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="processing_information_arrest_city_town" maxlength="39"
						value="<?php echo showData('processing_information_arrest_city_town')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">2.d. State</label>
				<div class="col-md-5">
					<select class="form-control" name="processing_information_arrest_state">
						<option value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('processing_information_arrest_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.e. Country</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control" name="processing_information_arrest_country" maxlength="39"
						value="<?php echo showData('processing_information_arrest_country')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.f. Outcome or disposition (for example, no charges
					filed, charges dismissed, jail, probation)</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control"
						name="processing_information_arrest_outcome_disposition"
						value="<?php echo showData('processing_information_arrest_outcome_disposition')?>" />
				</div>
			</div>
			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<p><b>3.a.</b> Why were you arrested, cited, detained, or charged?</p>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control"
						name="processing_information_why_were_you_arested2" maxlength="39"
						value="<?php echo showData('processing_information_why_were_you_arested2')?>" />
				</div>
			</div>
			<div class="form-group">
				<p><b>3.b.</b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</p>
				<div class="col-md-8 col-md-offset-4">
					<input type="date" class="form-control"
						name="processing_information_date_of_arrest_citation_detension_or_charge2"
						value="<?php echo showData('processing_information_date_of_arrest_citation_detension_or_charge2')?>" />
				</div>
			</div>
			<div class="form-group">
				<p> Where were you arrested, cited, detained, or charged?</p>
				<label class="control-label col-md-5">3.c. City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="processing_information_arrest_city_town2" maxlength="20"
						value="<?php echo showData('processing_information_arrest_city_town2')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">3.d. State </label>
				<div class="col-md-7">
					<select class="form-control" name="processing_information_arrest_state2">
						<option value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('processing_information_arrest_state2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Country</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control" name="processing_information_arrest_country2" maxlength="39"
						value="<?php echo showData('processing_information_arrest_country2')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.f. Outcome or disposition (for example, no charges
					filed, charges dismissed, jail, probation)</label>
				<div class="col-md-11 col-md-offset-1">
					<input type="text" class="form-control"
						name="processing_information_arrest_outcome_disposition2" maxlength="39"
						value="<?php echo showData('processing_information_arrest_outcome_disposition2')?>" />
				</div>
			</div>

		</div>
		<!--end column-->

		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 3. Processing Information </b> (Continued)</h4>
			</div>
			<div class="form-group">
				<p>Have you <b>EVER:</b></p>
			</div>

			<div class="form-group">
				<p><b>4.a.</b> Engaged in, or do you intend to engage in, prostitution or procurement of
					prostitution?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_4a_engaged_in_or_intend"
							<?php echo (showData('part_3_4a_engaged_in_or_intend')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_4a_engaged_in_or_intend"
							<?php echo (showData('part_3_4a_engaged_in_or_intend')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>4.b.</b> Engaged in any unlawful commercialized vice, including, but not limited to,
					illegal gambling?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_4b_illegal_gambling"
							<?php echo (showData('part_3_4b_illegal_gambling')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_4b_illegal_gambling"
							<?php echo (showData('part_3_4b_illegal_gambling')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>4.c.</b> Knowingly encouraged, induced, assisted, abetted, or aided any alien to try
					to enter the United States illegally?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_4c_knowingly_encouraged"
							<?php echo (showData('part_3_4c_knowingly_encouraged')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_4c_knowingly_encouraged"
							<?php echo (showData('part_3_4c_knowingly_encouraged')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>4.d.</b> Illicitly trafficked in any controlled substance or knowingly assisted,
					abetted, or colluded in the illicit trafficking of any controlled substance?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_4d_Illicitly_trafficked"
							<?php echo (showData('part_3_4d_Illicitly_trafficked')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_4d_Illicitly_trafficked"
							<?php echo (showData('part_3_4d_Illicitly_trafficked')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p>Have you <b>EVER</b> committed, planned or prepared, participated
					in, threatened to, attempted to, conspired to commit, gathered
					information for, or solicited funds for any of the following:</p>
			</div>
			<div class="form-group">
				<p><b>5.a. </b> Hijacking or sabotage of any conveyance (including an aircraft, vessel, or
					vehicle)? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_5a_hijacking_or_sabotage"
							<?php echo (showData('part_3_5a_hijacking_or_sabotage')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_5a_hijacking_or_sabotage"
							<?php echo (showData('part_3_5a_hijacking_or_sabotage')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>5.b. </b>Seizing or detaining, and threatening to kill, injure, or
					continue to detain, another individual in order to compel a
					third person (including a governmental organization) to
					do or abstain from doing any act as an explicit or implicit
					condition for the release of the individual seized or
					detained? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_5b_seizing_or_detaining"
							<?php echo (showData('part_3_5b_seizing_or_detaining')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_5b_seizing_or_detaining"
							<?php echo (showData('part_3_5b_seizing_or_detaining')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>

			<div class="form-group">
				<p><b>5.c. </b> Assassination? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_5c_assassination"
							<?php echo (showData('part_3_5c_assassination')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_5c_assassination"
							<?php echo (showData('part_3_5c_assassination')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>

			<div class="form-group">
				<p><b>5.d. </b> The use of any firearm with intent to endanger, directly or
					indirectly, the safety of one or more individuals or to
					cause substantial damage to property? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="part_3_5d_firearm_with_intent_to_endanger"
							<?php echo (showData('part_3_5d_firearm_with_intent_to_endanger')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="part_3_5d_firearm_with_intent_to_endanger"
							<?php echo (showData('part_3_5d_firearm_with_intent_to_endanger')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>

			<div class="form-group">
				<p><b>5.e. </b> The use of any biological agent, chemical agent, nuclear
					weapon or device, explosive, or other weapon or
					dangerous device, with intent to endanger, directly or
					indirectly, the safety of one or more individuals or to
					cause substantial damage to property?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_use_of_biological_chemical_nuclear_weapon_cause_substantial_damage_status"
							<?php echo (showData('processing_info_use_of_biological_chemical_nuclear_weapon_cause_substantial_damage_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_use_of_biological_chemical_nuclear_weapon_cause_substantial_damage_status"
							<?php echo (showData('processing_info_use_of_biological_chemical_nuclear_weapon_cause_substantial_damage_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>

			</div>
			<div class="form-group">
				<p>Have you <b>EVER</b> been a member of, solicited money or
					members for, provided support for, attended military training (as
					defined in section 2339D(c)(1) of Title 18, United States Code)
					by or on behalf of, or been associated with any other group of
					two or more individuals, whether organized or not, which has
					been designated as, or has engaged in or has a subgroup which
					has been designated as, or has engaged in: </p>
				<br>
				<p><b>6.a. </b> A terrorist organization under section 219 of the INA? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_terrorist_organization_under_section_219_ina_status"
							<?php echo (showData('processing_info_terrorist_organization_under_section_219_ina_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_terrorist_organization_under_section_219_ina_status"
							<?php echo (showData('processing_info_terrorist_organization_under_section_219_ina_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>6.b. </b> Hijacking or sabotage of any conveyance (including an
					aircraft, vessel, or vehicle)? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_hijacking_of_any_conveyance_status"
							<?php echo (showData('processing_info_hijacking_of_any_conveyance_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_hijacking_of_any_conveyance_status"
							<?php echo (showData('processing_info_hijacking_of_any_conveyance_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
		</div>
		<!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 5 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 3. Processing Information </b> (Continued)</h4>
			</div>
			<div class="form-group">
				<p><b>6.c. </b> Seizing or detaining, and threatening to kill, injure, or
					continue to detain, another individual in order to compel a
					third person (including a governmental organization) to
					do or abstain from doing any act as an explicit or implicit
					condition for the release of the individual seized or
					detained? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_seizing_detaining_threatening_status"
							<?php echo (showData('processing_info_seizing_detaining_threatening_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_seizing_detaining_threatening_status"
							<?php echo (showData('processing_info_seizing_detaining_threatening_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>6.d. </b> Assassination?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="i_918_processing_info_6d_assassination_status"
							<?php echo (showData('i_918_processing_info_6d_assassination_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="i_918_processing_info_6d_assassination_status"
							<?php echo (showData('i_918_processing_info_6d_assassination_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>6.e. </b> The use of any firearm with intent to endanger, directly or
					indirectly, the safety of one or more individuals or to
					cause substantial damage to property? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_use_of_firearm_substantial_damage_status"
							<?php echo (showData('processing_info_use_of_firearm_substantial_damage_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_use_of_firearm_substantial_damage_status"
							<?php echo (showData('processing_info_use_of_firearm_substantial_damage_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>6.f. </b> The use of any biological agent, chemical agent, nuclear
					weapon or device, explosive, or other weapon or dangerous
					device, with intent to endanger, directly or indirectly, the
					safety of one or more individuals or to cause substantial
					damage to property? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_use_of_dangerous_device_substantial_damage_status"
							<?php echo (showData('processing_info_use_of_dangerous_device_substantial_damage_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_use_of_dangerous_device_substantial_damage_status"
							<?php echo (showData('processing_info_use_of_dangerous_device_substantial_damage_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>6.g. </b> Soliciting money or members or otherwise providing
					material support to a terrorist organization? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_providing_material_support_to_terrorist_organization_status"
							<?php echo (showData('processing_info_providing_material_support_to_terrorist_organization_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_providing_material_support_to_terrorist_organization_status"
							<?php echo (showData('processing_info_providing_material_support_to_terrorist_organization_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<p>Do you intend to engage in the United States in:</p>
			<div class="form-group">
				<p><b>7.a. </b> Espionage?</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_engage_to_united_states_espionage_status"
							<?php echo (showData('processing_info_engage_to_united_states_espionage_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_engage_to_united_states_espionage_status"
							<?php echo (showData('processing_info_engage_to_united_states_espionage_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>7.b. </b> Any unlawful activity, or any activity the purpose of
					which is in opposition to, or the control, or overthrow of
					the government of the United States? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_unlawful_activity_status"
							<?php echo (showData('processing_info_unlawful_activity_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_unlawful_activity_status"
							<?php echo (showData('processing_info_unlawful_activity_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>7.c. </b> Solely, principally, or incidentally in any activity related
					to espionage or sabotage or to violate any law involving
					the export of goods, technology, or sensitive information? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_activity_related_to_espionage_or_sabotage_status"
							<?php echo (showData('processing_info_activity_related_to_espionage_or_sabotage_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_activity_related_to_espionage_or_sabotage_status"
							<?php echo (showData('processing_info_activity_related_to_espionage_or_sabotage_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>8. </b> Have you EVER been or do you continue to be a member
					of the Communist or other totalitarian party, except when
					membership was involuntary? </p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_communist_membership_or_totalitarian_party_status"
							<?php echo (showData('processing_info_communist_membership_or_totalitarian_party_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_communist_membership_or_totalitarian_party_status"
							<?php echo (showData('processing_info_communist_membership_or_totalitarian_party_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>9. </b> Have you EVER , during the period of March 23, 1933
					to May 8, 1945, in association with either the Nazi
					Government of Germany or any organization or
					government associated or allied with the Nazi
					Government of Germany, ordered, incited, assisted or
					otherwise participated in the persecution of any person
					because of race, religion, nationality, membership in a
					particular social group, or political opinion?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_association_with_nazi_govt_of_germany_or_org_or_govt_associated_status"
							<?php echo (showData('processing_info_association_with_nazi_govt_of_germany_or_org_or_govt_associated_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_association_with_nazi_govt_of_germany_or_org_or_govt_associated_status"
							<?php echo (showData('processing_info_association_with_nazi_govt_of_germany_or_org_or_govt_associated_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
		</div>


		<!--end column-->

		<div class="col-md-6">
			<div class="form-group">
				<p>Have you <b>EVER</b> ordered, incited, called for, committed, assisted,
					helped with, or otherwise participated in any of the following:</p>
				<br>
				<p><b>10.a. </b> Acts involving torture or genocide?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_involving_torture_or_genocide_status"
							<?php echo (showData('processing_info_involving_torture_or_genocide_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_involving_torture_or_genocide_status"
							<?php echo (showData('processing_info_involving_torture_or_genocide_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>10.b. </b> Killing any person?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_killing_any_person_status"
							<?php echo (showData('processing_info_killing_any_person_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_killing_any_person_status"
							<?php echo (showData('processing_info_killing_any_person_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>10.c. </b> Intentionally and severely injuring any person?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_intentionally_severely_injuring_any_person_status"
							<?php echo (showData('processing_info_intentionally_severely_injuring_any_person_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_intentionally_severely_injuring_any_person_status"
							<?php echo (showData('processing_info_intentionally_severely_injuring_any_person_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>10.d. </b> Engaging in any kind of sexual conduct or relations with
					any person who was being forced or threatened?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_engaging_any_sexual_conduct_with_any_person_status"
							<?php echo (showData('processing_info_engaging_any_sexual_conduct_with_any_person_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_engaging_any_sexual_conduct_with_any_person_status"
							<?php echo (showData('processing_info_engaging_any_sexual_conduct_with_any_person_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>10.e. </b> Limiting or denying any person's ability to exercise
					religious beliefs?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_denying_religious_beliefs_status"
							<?php echo (showData('processing_info_denying_religious_beliefs_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_denying_religious_beliefs_status"
							<?php echo (showData('processing_info_denying_religious_beliefs_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>10.f. </b> The persecution of any person because of race, religion,
					national origin, membership in a particular social group,
					or political opinion?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_persecution_of_any_person_status"
							<?php echo (showData('processing_info_persecution_of_any_person_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_persecution_of_any_person_status"
							<?php echo (showData('processing_info_persecution_of_any_person_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>10.g. </b> Displacing or moving any person from their residence by
					force, threat of force, compulsion, or duress?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_moving_any_person_from_their_residence_by_force_status"
							<?php echo (showData('processing_info_moving_any_person_from_their_residence_by_force_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_moving_any_person_from_their_residence_by_force_status"
							<?php echo (showData('processing_info_moving_any_person_from_their_residence_by_force_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>NOTE:</b> If you answered 'Yes' to any question in <b>Item
						Numbers 10.a. - 10.g</b>., please describe the circumstances in
					<b>Part 8. Additional Information.</b>
				</p>
				<br>
				<p><b>11. </b> Have you <b>EVER</b> advocated that another person commit
					any of the acts described in the preceding question, urged,
					or encouraged another person, to commit such acts?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_urged_or_encouraged_preceding_question_status"
							<?php echo (showData('processing_info_urged_or_encouraged_preceding_question_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_urged_or_encouraged_preceding_question_status"
							<?php echo (showData('processing_info_urged_or_encouraged_preceding_question_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p>Have you <b>EVER</b> been present or nearby when any person was:
				</p>
				<br>
				<p><b>12.a. </b> Intentionally killed, tortured, beaten, or injured?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_intentionally_killed_tortured_beaten_or_injured_status"
							<?php echo (showData('processing_info_intentionally_killed_tortured_beaten_or_injured_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_intentionally_killed_tortured_beaten_or_injured_status"
							<?php echo (showData('processing_info_intentionally_killed_tortured_beaten_or_injured_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>12.b. </b> Displaced or moved from his or her residence by force,
					compulsion, or duress?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_moved_from_residence_by_force_status"
							<?php echo (showData('processing_info_moved_from_residence_by_force_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_moved_from_residence_by_force_status"
							<?php echo (showData('processing_info_moved_from_residence_by_force_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>12.c. </b> In any way compelled or forced to engage in any kind of
					sexual contact or relations?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_compelled_or_forced_to_engage_sexual_relations_stauts"
							<?php echo (showData('processing_info_compelled_or_forced_to_engage_sexual_relations_stauts')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_compelled_or_forced_to_engage_sexual_relations_stauts"
							<?php echo (showData('processing_info_compelled_or_forced_to_engage_sexual_relations_stauts')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p>Have you <b>EVER:</b></p><br>
				<p><b>13.a. </b> Served in, been a member of, assisted in, or participated
					in any military unit, paramilitary unit, police unit, selfdefense unit, vigilante unit,
					rebel group, guerilla group,
					militia, or other insurgent organization?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_participated_military_police_selfdefense_unit_status"
							<?php echo (showData('processing_info_participated_military_police_selfdefense_unit_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_participated_military_police_selfdefense_unit_status"
							<?php echo (showData('processing_info_participated_military_police_selfdefense_unit_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>

		</div>
		<!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 6 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 3. Processing Information </b> (Continued)</h4>
			</div>
			<div class="form-group">
				<p><b>13.b. </b> Served in any prison, jail, prison camp, detention facility,
					labor camp, or any other situation that involved detaining
					persons?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_served_in_prison_jail_labor_camp_status"
							<?php echo (showData('processing_info_served_in_prison_jail_labor_camp_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_served_in_prison_jail_labor_camp_status"
							<?php echo (showData('processing_info_served_in_prison_jail_labor_camp_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>13.c. </b> Served in, been a member of, assisted in, or participated
					in any group, unit, or organization of any kind in which
					you or other persons transported, possessed, or used any
					type of weapon?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_participated_weapon_organization_status"
							<?php echo (showData('processing_info_participated_weapon_organization_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_participated_weapon_organization_status"
							<?php echo (showData('processing_info_participated_weapon_organization_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>NOTE:</b> If you answered "Yes" to any question in <b>Item
						Numbers 13.a. - 13.c</b>., please describe the circumstances in
					<b>Part 8. Additional Information</b>
				</p><br>
				<p>Have you <b>EVER:</b></p>
				<p><b>14.a. </b> Received any type of military, paramilitary, or weapons
					training?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_received_military_weapons_training_status"
							<?php echo (showData('processing_info_received_military_weapons_training_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_received_military_weapons_training_status"
							<?php echo (showData('processing_info_received_military_weapons_training_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>14.b. </b> Been a member of, assisted in, or participated in any
					group, unit, or organization of any kind in which you or
					other persons used any type of weapon against any person
					or threatened to do so?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_participated_in_organization_which_used_weapon_against_any_person_status"
							<?php echo (showData('processing_info_participated_in_organization_which_used_weapon_against_any_person_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_participated_in_organization_which_used_weapon_against_any_person_status"
							<?php echo (showData('processing_info_participated_in_organization_which_used_weapon_against_any_person_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>14.c. </b> . Assisted or participated in selling or providing weapons to
					any person who to your knowledge used them against
					another person, or in transporting weapons to any person
					who to your knowledge used them against another
					person?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_participated_in_providing_weapons_status"
							<?php echo (showData('processing_info_participated_in_providing_weapons_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_participated_in_providing_weapons_status"
							<?php echo (showData('processing_info_participated_in_providing_weapons_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>NOTE:</b> If you answered "Yes" to any question in <b>Item
						Numbers 14.a. - 14.c</b>., please describe the circumstances in
					<b>Part 8. Additional Information</b>
				</p><br>
				<p>Have you <b>EVER:</b></p>
				<p><b>15.a. </b> Recruited, enlisted, conscripted, or used any person under
					15 years of age to serve in or help an armed force or group?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_recruited_any_person_under_15_years_age_to_help_armed_force_status"
							<?php echo (showData('processing_info_recruited_any_person_under_15_years_age_to_help_armed_force_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_recruited_any_person_under_15_years_age_to_help_armed_force_status"
							<?php echo (showData('processing_info_recruited_any_person_under_15_years_age_to_help_armed_force_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>15.b. </b> Used any person under 15 years of age to take part in
					hostilities, or to help or provide services to people in
					combat?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_used_any_person_under_15_years_age_to_take_part_in_hostilities_status"
							<?php echo (showData('processing_info_used_any_person_under_15_years_age_to_take_part_in_hostilities_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_used_any_person_under_15_years_age_to_take_part_in_hostilities_status"
							<?php echo (showData('processing_info_used_any_person_under_15_years_age_to_take_part_in_hostilities_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>16. </b> Are you <b>NOW</b> in removal, exclusion, rescission, or
					deportation proceedings?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_now_in_removal_exclusion_rescission_status"
							<?php echo (showData('processing_info_now_in_removal_exclusion_rescission_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_now_in_removal_exclusion_rescission_status"
							<?php echo (showData('processing_info_now_in_removal_exclusion_rescission_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>17. </b> Have you <b>EVER</b> had removal, exclusion, rescission, or
					deportation proceedings initiated against you?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_initiated_in_removal_exclusion_rescission_status"
							<?php echo (showData('processing_info_initiated_in_removal_exclusion_rescission_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_initiated_in_removal_exclusion_rescission_status"
							<?php echo (showData('processing_info_initiated_in_removal_exclusion_rescission_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>18. </b> Have you <b>EVER</b> been removed, excluded, or deported
					from the United States?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_removed_from_united_states_status"
							<?php echo (showData('processing_info_removed_from_united_states_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_removed_from_united_states_status"
							<?php echo (showData('processing_info_removed_from_united_states_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
		</div>
		<!--end column-->
		<div class="col-md-6">
			<div class="form-group">

				<p><b>19. </b> Have you <b>EVER</b> been ordered to be removed, excluded,
					or deported from the United States?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_ordered_to_be_removed_from_united_states_status"
							<?php echo (showData('processing_info_ordered_to_be_removed_from_united_states_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_ordered_to_be_removed_from_united_states_status"
							<?php echo (showData('processing_info_ordered_to_be_removed_from_united_states_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>20. </b> Have you <b>EVER</b> R been denied a visa or denied admission
					to the United States?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_denied_visa_to_united_states_status"
							<?php echo (showData('processing_info_denied_visa_to_united_states_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_denied_visa_to_united_states_status"
							<?php echo (showData('processing_info_denied_visa_to_united_states_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>21. </b> Have you <b>EVER</b> been granted voluntary departure by an
					immigration officer or an immigration judge and failed to
					depart within the allotted time?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_granted_voluntary_departure_by_immigration_officer_status"
							<?php echo (showData('processing_info_granted_voluntary_departure_by_immigration_officer_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_granted_voluntary_departure_by_immigration_officer_status"
							<?php echo (showData('processing_info_granted_voluntary_departure_by_immigration_officer_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">
				<p><b>22. </b> Are you <b>NOW</b> under a final order or civil penalty for
					violating section 274C of the INA (producing and/or
					using false documentation to unlawfully satisfy a
					requirement of the INA)?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_ina_violating_section_274c_using_false_documentation_status"
							<?php echo (showData('processing_info_ina_violating_section_274c_using_false_documentation_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_ina_violating_section_274c_using_false_documentation_status"
							<?php echo (showData('processing_info_ina_violating_section_274c_using_false_documentation_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>23. </b> Have you <b>EVER</b>, by fraud or willful misrepresentation of
					a material fact, sought to procure or procured a visa or
					other documentation, for entry into the United States or
					any immigration benefit?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_by_fraud_procured_a_visa_for_entry_into_the_united_states_status"
							<?php echo (showData('processing_info_by_fraud_procured_a_visa_for_entry_into_the_united_states_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_by_fraud_procured_a_visa_for_entry_into_the_united_states_status"
							<?php echo (showData('processing_info_by_fraud_procured_a_visa_for_entry_into_the_united_states_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>24. </b> Have you <b>EVER</b> left the United States to avoid being
					drafted into the U.S. Armed Forces or U.S. Coast Guard?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_left_united_states_to_avoid_being_drafted_into_us_armed_forces_status"
							<?php echo (showData('processing_info_left_united_states_to_avoid_being_drafted_into_us_armed_forces_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_left_united_states_to_avoid_being_drafted_into_us_armed_forces_status"
							<?php echo (showData('processing_info_left_united_states_to_avoid_being_drafted_into_us_armed_forces_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>25. </b> Have you <b>EVER</b> been a J nonimmigrant exchange visitor
					who was subject to the 2-year foreign residence
					requirement and not yet complied with that requirement
					or obtained a waiver of such?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_j_nonimmigrant_exchange_visitor_2_year_foreign_residence_status"
							<?php echo (showData('processing_info_j_nonimmigrant_exchange_visitor_2_year_foreign_residence_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_j_nonimmigrant_exchange_visitor_2_year_foreign_residence_status"
							<?php echo (showData('processing_info_j_nonimmigrant_exchange_visitor_2_year_foreign_residence_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>26. </b> Have you <b>EVER</b> detained, retained, or withheld the
					custody of a child, having a lawful claim to United States
					citizenship, outside the United States from a United States
					citizen granted custody?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_detained_a_child_having_a_lawful_claim_to_united_states_citizenship_status"
							<?php echo (showData('processing_info_detained_a_child_having_a_lawful_claim_to_united_states_citizenship_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_detained_a_child_having_a_lawful_claim_to_united_states_citizenship_status"
							<?php echo (showData('processing_info_detained_a_child_having_a_lawful_claim_to_united_states_citizenship_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>27. </b> Do you plan to practice polygamy in the United States?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_practice_polygamy_in_united_states_status"
							<?php echo (showData('processing_info_practice_polygamy_in_united_states_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_practice_polygamy_in_united_states_status"
							<?php echo (showData('processing_info_practice_polygamy_in_united_states_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>28. </b> Have you EVER entered the United States as a stowaway?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_entered_united_states_as_stowaway_status"
							<?php echo (showData('processing_info_entered_united_states_as_stowaway_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_entered_united_states_as_stowaway_status"
							<?php echo (showData('processing_info_entered_united_states_as_stowaway_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>29.a. </b> Do you NOW have a communicable disease of public
					health significance?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_communicable_disease_of_public_health_significance_status"
							<?php echo (showData('processing_info_communicable_disease_of_public_health_significance_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_communicable_disease_of_public_health_significance_status"
							<?php echo (showData('processing_info_communicable_disease_of_public_health_significance_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>29.b. </b> Do you <b>NOW</b> have or have you <b>EVER</b> had a physical or
					mental disorder and behavior (or a history of behavior
					that is likely to recur) associated with the disorder which
					has posed or may pose a threat to the property, safety, or
					welfare of yourself or others?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_physical_or_mental_disorder_and_behavior_status"
							<?php echo (showData('processing_info_physical_or_mental_disorder_and_behavior_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_physical_or_mental_disorder_and_behavior_status"
							<?php echo (showData('processing_info_physical_or_mental_disorder_and_behavior_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
			<div class="form-group">

				<p><b>29.c. </b> Are you <b>NOW</b> or have you <b>EVER</b> been a drug abuser or
					drug addict?
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="processing_info_drug_abuser_or_drug_addict_status"
							<?php echo (showData('processing_info_drug_abuser_or_drug_addict_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="processing_info_drug_abuser_or_drug_addict_status"
							<?php echo (showData('processing_info_drug_abuser_or_drug_addict_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
			</div>
		</div>
		<!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 7 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 4. Information About Your Spouse and/or Children</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children1_family_last_name" maxlength="29"
						value="<?php echo showData('spouse_children1_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children1_given_first_name" maxlength="29"
						value="<?php echo showData('spouse_children1_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children1_middle_name" maxlength="29"
						value="<?php echo showData('spouse_children1_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7">
					<input type="date" class="form-control" name="spouse_children1_date_of_birth" value="<?php echo showData('spouse_children1_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3. Country of Birth :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" 
						name="spouse_children1_country_of_birth" maxlength="39"
						value="<?php echo showData('spouse_children1_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4. Relationship :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children1_relationship" maxlength="39"
						value="<?php echo showData('spouse_children1_relationship')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5. Current location :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children1_current_location" maxlength="39"
						value="<?php echo showData('spouse_children1_current_location')?>" />
				</div>
			</div>
			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<label class="control-label col-md-5">6.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children2_family_last_name" maxlength="29"
						value="<?php echo showData('spouse_children2_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children2_given_first_name" maxlength="29"
						value="<?php echo showData('spouse_children2_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children2_middle_name" maxlength="29"
						value="<?php echo showData('spouse_children2_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">7. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="spouse_children2_date_of_birth"
						value="<?php echo showData('spouse_children2_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">8. Country of Birth :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children2_country_of_birth" maxlength="39"
						value="<?php echo showData('spouse_children2_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">9. Relationship :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children2_relationship" maxlength="39"
						value="<?php echo showData('spouse_children2_relationship')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">10. Current location :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children2_current_location" maxlength="39"
						value="<?php echo showData('spouse_children2_current_location')?>" />
				</div>
			</div>
			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<label class="control-label col-md-5">11.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children3_family_last_name"  maxlength="29"
						value="<?php echo showData('spouse_children3_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">11.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children3_given_first_name" maxlength="29"
						value="<?php echo showData('spouse_children3_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">11.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children3_middle_name" maxlength="29"
						value="<?php echo showData('spouse_children3_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">12. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="spouse_children3_date_of_birth"
						value="<?php echo showData('spouse_children3_date_of_birth')?>" />
				</div>
			</div>

		</div>
		<!--end column-->

		<div class="col-md-6">
			<!-- <div class="bg-info">
				<h4><b>Part 4. Information About Your Spouse and/or Children</b>(continued)</h4>
			</div> -->

			<div class="form-group">
				<label class="control-label col-md-5">13. Country of Birth :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" maxlength="39"
						name="spouse_children3_country_of_birth"
						value="<?php echo showData('spouse_children3_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">14. Relationship :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children3_relationship" maxlength="39"
						value="<?php echo showData('spouse_children3_relationship')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">15. Current location :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children3_current_location" maxlength="39"
						value="<?php echo showData('spouse_children3_current_location')?>" />
				</div>
			</div>

			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<label class="control-label col-md-5">16.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children4_family_last_name" maxlength="29"
						value="<?php echo showData('spouse_children4_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">16.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children4_given_first_name" maxlength="29"
						value="<?php echo showData('spouse_children4_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">16.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children4_middle_name" maxlength="29"
						value="<?php echo showData('spouse_children4_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">17. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="spouse_children4_date_of_birth"
						value="<?php echo showData('spouse_children4_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">18. Country of Birth :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children4_country_of_birth" maxlength="39"
						value="<?php echo showData('spouse_children4_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">19. Relationship :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children4_relationship" maxlength="39"
						value="<?php echo showData('spouse_children4_relationship')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">20. Current location :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children4_current_location" maxlength="39"
						value="<?php echo showData('spouse_children4_current_location')?>" />
				</div>
			</div>

			<hr style="background: #095484; height: 1px;">

			<div class="form-group">
				<label class="control-label col-md-5">21.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children5_family_last_name" maxlength="29"
						value="<?php echo showData('spouse_children5_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">21.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children5_given_first_name" maxlength="29"
						value="<?php echo showData('spouse_children5_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">21.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="spouse_children5_middle_name" maxlength="29"
						value="<?php echo showData('spouse_children5_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">22. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="spouse_children5_date_of_birth"
						value="<?php echo showData('spouse_children5_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">23. Country of Birth :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children5_country_of_birth" maxlength="39"
						value="<?php echo showData('spouse_children5_country_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">24. Relationship :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children5_relationship" maxlength="39"
						value="<?php echo showData('spouse_children5_relationship')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">25. Current location :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"
						name="spouse_children5_current_location" maxlength="39"
						value="<?php echo showData('spouse_children5_current_location')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Filing On Behalf of Family Members</b>
				</h4>
			</div>
			<div class="form-group">

				<p><b>26. </b> I am petitioning for one or more qualifying family
					members.
				</p>
				<div class="col-md-4 col-md-offset-8">
					<label class="control-label">
						<input type="radio" name="family_members_petitioning_for_one_or_more_qualifying_family_members_status"
							<?php echo (showData('family_members_petitioning_for_one_or_more_qualifying_family_members_status')=='Y')? 'checked':'' ?>
							value="Y"> Yes
					</label>
					&nbsp; &nbsp;
					<label class="control-label">
						<input type="radio" name="family_members_petitioning_for_one_or_more_qualifying_family_members_status"
							<?php echo (showData('family_members_petitioning_for_one_or_more_qualifying_family_members_status')=='N')? 'checked':'' ?>
							value="N"> No
					</label>
				</div>
				<p><b>NOTE:</b> If you answered “Yes” to <b>26</b>., you must
					complete and include Supplement A for each family
					member for whom you are petitioning. </p>
			</div>
		</div>
		<!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 8 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 8 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 5. Petitioner's Statement, Contact
						Information, Declaration, and Signature</b> </h4>
			</div>
			<p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-918
				Instructions before completing this part</p>
			<div class="bg-info">
				<h4><b>Petitioner's Statement</b> </h4>
			</div>
			<p><b>NOTE:</b> : Select the box for either <b>1.a.</b> or <b>1.b.</b> If applicable,
				select the box for <b>2</b>.</p>
			<div class="d-flexible">
				<b>1.a.</b>				
				<input type="hidden" name="i_918_petitioner_1a_read_and_understand_english_status" id="i_918_petitioner_1a_read_and_understand_english_status"
					value="<?php echo (showData('i_918_petitioner_1a_read_and_understand_english_status') == 'Y') ? 'Y' : 'N'; ?>" />
				<input type="checkbox" onChange="checkboxValue(this,'i_918_petitioner_1a_read_and_understand_english_status')"
					<?php echo (showData('i_918_petitioner_1a_read_and_understand_english_status') == 'Y') ? 'checked' : ''; ?>>				
				
				<p>I can read and understand English, and I have read
					and understand every question and instruction on
					this petition and my answer to every question.</p>
			</div>
			<div class="d-flexible">
				<b>1.b.</b>
				<input type="hidden" name="i_918_petitioner_1b_read_and_answer_status" id="i_918_petitioner_1b_read_and_answer_status"
					value="<?php echo (showData('i_918_petitioner_1b_read_and_answer_status') == 'Y') ? 'Y' : 'N'; ?>" />
				<input type="checkbox" onChange="checkboxValue(this,'i_918_petitioner_1b_read_and_answer_status')"
					<?php echo (showData('i_918_petitioner_1b_read_and_answer_status') == 'Y') ? 'checked' : ''; ?>>				
				
				<p>The interpreter named in <b>Part 6</b>. read to me every
					question and instruction on this petition and my answer
					to every question in</p>
			</div>
			<input type="text" class="form-control" name="i_918_petitioner_statement_1b" value="<?= showData('i_918_petitioner_statement_1b')?>">
			<p>a language in which I am fluent, and I understood
				everything.</p>
			<div class="d-flexible">
				<b>2.</b> 
				<input type="hidden" name="i_918_petitioner_request_preparer_named_status" id="i_918_petitioner_request_preparer_named_status"
					value="<?php echo (showData('i_918_petitioner_request_preparer_named_status') == 'Y') ? 'Y' : 'N'; ?>" />
				<input type="checkbox" onChange="checkboxValue(this,'i_918_petitioner_request_preparer_named_status')"
					<?php echo (showData('i_918_petitioner_request_preparer_named_status') == 'Y') ? 'checked' : ''; ?>>				
				
				<p>At my request, the preparer named in <b>Part 7</b>.,</p>
			</div>
			<input type="text" class="form-control" name="i_918_petitioner_statement_2" value="<?= showData('i_918_petitioner_statement_2')?>">
			<p>prepared this petition for me based only upon
				information I provided or authorized.
			</p>
			<div class="bg-info">
				<h4><b>Petitioner's Contact Information</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. Petitioner's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_918_petitioner_daytime_tel" maxlength="15"
						value="<?= showData('i_918_petitioner_daytime_tel')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Petitioner's Mobile Telephone Number (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_918_petitioner_mobile" maxlength="15"
						value="<?= showData('i_918_petitioner_mobile')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Petitioner's Email Address (if any)</label>
				<div class="col-md-12">
					<input type="email" class="form-control" name="i_918_petitioner_email" maxlength="39"
						value="<?= showData('i_918_petitioner_email')?>">
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Petitioner's Declaration and Certification</b> </h4>
			</div>
			<p>Copies of any documents I have submitted are exact
				photocopies of unaltered, original documents, and I understand
				that USCIS may require that I submit original documents to
				USCIS at a later date. Furthermore, I authorize the release of
				any information from any of my records that USCIS may need
				to determine my eligibility for the immigration benefit I seek.</p>
			<p>I further authorize release of information contained in this
				petition, in supporting documents, and in my USCIS records to
				other entities and persons where necessary for the
				administration and enforcement of U.S. immigration laws.</p>


		</div><!-- left side column end -->


		<div class="col-md-6">

			<p>I understand that USCIS may require me to appear for an
				appointment to take my biometrics (fingerprints, photograph,
				and/or signature) and, at that time, if I am required to provide
				biometrics, I will be required to sign an oath reaffirming that:</p>
			<p><b>1)</b>&nbsp;&nbsp; I provided or authorized all of the information
				contained in, and submitted with, my petition; </p>
			<p><b>2)</b>&nbsp;&nbsp; I reviewed and understood all of the information in,
				and submitted with, my petition; and</p>
			<p><b>3)</b>&nbsp;&nbsp; All of this information was complete, true, and
				correct at the time of filing. </p>
			<p>I certify, under penalty of perjury, that all of the information in
				my petition and any document submitted with it were provided
				or authorized by me, that I reviewed and understand all of the
				information contained in, and submitted with, my petition, and
				that all of this information is complete, true, and correct.</p>
			<div class="bg-info">
				<h4><b>Petitioner's Signature</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12"><b>6.b.</b> Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-12">
					<input type="date" class="form-control" name="i_918_petitioner_sign_date" value="<?= showData('i_918_petitioner_sign_date')?>">
				</div>
			</div>
			<p><b>NOTE TO ALL PETITIONERS:</b> If you do not completely fill
				out this petition or fail to submit required documents listed in
				the Instructions, USCIS may deny your petition.</p>
			<p><b>NOTE:</b> A parent or legal guardian may sign for a person who is
				less than 14 years of age. A legal guardian may sign for a
				mentally incompetent person.</p>
			<div class="bg-info">
				<h4><b>Part 6. Interpreter's Contact Information,
						Certification, and Signature</b> </h4>
			</div>
			<p>Provide the following information about the interpreter. </p>
			<div class="bg-info">
				<h4><b>Interpreter's Full Name</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" name="i_918_interpreter_family_last_name" maxlength="39"
						value="<?php echo showData('i_918_interpreter_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" name="i_918_interpreter_family_given_first_name" maxlength="39"
						value="<?php echo showData('i_918_interpreter_family_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any) :</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" name="i_918_interpreter_business_name" maxlength="39"
						value="<?php echo showData('i_918_interpreter_business_name')?>" />
				</div>
			</div>
		</div><!-- right side column end -->

	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />	
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 9 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align: right;"><b>Page 9 of 11</b></p>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b><i>Interpreter's Mailing Address</i></b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">3.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_918_interpreter_mailing_address_street_number" maxlength="26"
						value="<?php echo showData('i_918_interpreter_mailing_address_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6"><b>3.b.</b> &nbsp;
					<input type="radio" name="i_918_interpreter_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_918_interpreter_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt.&nbsp;
					<input type="radio" name="i_918_interpreter_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_918_interpreter_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
					<input type="radio" name="i_918_interpreter_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_918_interpreter_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:&nbsp;
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="i_918_interpreter_mailing_address_apt_ste_flr_value" maxlength="6"
						value="<?php echo showData('i_918_interpreter_mailing_address_apt_ste_flr_value')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_918_interpreter_mailing_address_city_town" maxlength="20"
						value="<?php echo showData('i_918_interpreter_mailing_address_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="i_918_interpreter_mailing_address_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_918_interpreter_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" 
						name="i_918_interpreter_mailing_address_zip_code" maxlength="5"
						value="<?php echo showData('i_918_interpreter_mailing_address_zip_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.f. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  
						name="i_918_interpreter_mailing_address_province" maxlength="20"
						value="<?php echo showData('i_918_interpreter_mailing_address_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.g. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" 
						name="i_918_interpreter_mailing_address_postal_code" maxlength="9"
						value="<?php echo showData('i_918_interpreter_mailing_address_postal_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.h. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" 
						name="i_918_interpreter_mailing_address_country" maxlength="39"
						value="<?php echo showData('i_918_interpreter_mailing_address_country')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b><i>Interpreter's Contact Information</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control"  maxlength="15"
						name="i_918_interpreter_daytime_tel"
						value="<?php echo showData('i_918_interpreter_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" 
						name="i_918_interpreter_mobile" maxlength="15"
						value="<?php echo showData('i_918_interpreter_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="email" class="form-control" 
						name="i_918_interpreter_email" maxlength="39"
						value="<?php echo showData('i_918_interpreter_email')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b><i>Interpreter's Certification </i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">I certify, under penalty of perjury, that:
					I am fluent in English and
				</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" 
						name="i_918_interpreter_certification_language_skill"
						value="<?php echo showData('i_918_interpreter_certification_language_skill')?>" />
				</div>
				<label class="control-label col-md-12"> which is the same language specified in Part 5.,
					1.b., and I have
					read to this petitioner in the identified language every question
					and instruction on this petition and his or her answer to every
					question. The petitioner informed me that he or she understands
					every instruction, question, and answer on the petition, including
					the Petitioner's Declaration and Certification, and has verified
				</label>
			</div>
			<div class="bg-info">
				<h4><b><i>Interpreter's Signature</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12"><b>7.b.</b> Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="date" class="form-control" name="i_918_interpreter_sign_date" value="<?= showData('i_918_interpreter_sign_date')?>" />
				</div>
			</div>
		</div><!-- left side column end -->

		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 7. Contact Information, Declaration, and Signature of the Person Preparing this
						Petition, if Other Than the Petitioner </b></h4>
			</div>
			<p>Provide the following information about the preparer. </p>
			<div class="bg-info">
				<h4><b><i>Preparer's Full Name</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" maxlength="39" name="i_918_preparer_family_last_name" value="<?= showData('i_918_preparer_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" maxlength="39" name="i_918_preparer_family_given_first_name" value="<?= showData('i_918_preparer_family_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Preparer's Business or Organization Name (if
					any)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" maxlength="39" name="i_918_preparer_business_name" value="<?= showData('i_918_preparer_business_name')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b><i>Preparer's Mailing Address</i></b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-5">3.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_918_preparer_mailing_address_street_number" maxlength="26"
						value="<?php echo showData('i_918_preparer_mailing_address_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6"><b>3.b.</b> &nbsp;
					<input type="radio" name="i_918_preparer_mailing_address_apt_ste_flr"
						value="apt"
						<?php echo (showData('i_918_preparer_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
					Apt.&nbsp;

					<input type="radio" name="i_918_preparer_mailing_address_apt_ste_flr"
						value="ste"
						<?php echo (showData('i_918_preparer_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
					Ste. &nbsp;

					<input type="radio" name="i_918_preparer_mailing_address_apt_ste_flr" 
						value="flr"
						<?php echo (showData('i_918_preparer_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
					Flr.:&nbsp;
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="i_918_preparer_mailing_address_apt_ste_flr_value" maxlength="6"
						value="<?php echo showData('i_918_preparer_mailing_address_apt_ste_flr_value')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_918_preparer_mailing_address_city_town" maxlength="20"
						value="<?php echo showData('i_918_preparer_mailing_address_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="i_918_preparer_mailing_address_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_918_preparer_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code'>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" 
						name="i_918_preparer_mailing_address_zip_code" maxlength="5"
						value="<?php echo showData('i_918_preparer_mailing_address_zip_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.f. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_918_preparer_mailing_address_province" maxlength="20"
						value="<?php echo showData('i_918_preparer_mailing_address_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.g. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_918_preparer_mailing_address_postal_code" maxlength="9"
						value="<?php echo showData('i_918_preparer_mailing_address_postal_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.h. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39"
						name="i_918_preparer_mailing_address_country"
						value="<?php echo showData('i_918_preparer_mailing_address_country')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b><i>Preparer's Contact Information</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="text" class="form-control" maxlength="15"
						name="i_918_preparer_daytime_tel"
						value="<?php echo showData('i_918_preparer_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if
					any)</label>
				<div class="col-md-10 col-md-offset-2"> 
					<input type="text" class="form-control" maxlength="15"
						name="i_918_preparer_mobile"
						value="<?php echo showData('i_918_preparer_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="email" class="form-control" name="i_918_preparer_email" maxlength="39" value="<?php echo showData('i_918_preparer_email')?>" />
				</div>
			</div>
		</div><!-- right side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 10 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 10 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Preparer's Statement</b> </h4>
			</div>
			<div class="d-flexible">
				<b>7.a.</b>
				<input type="hidden" name="i_918_preparer_statement_7a" id="i_918_preparer_statement_7a" value="<?php echo (showData('i_918_preparer_statement_7a') == 'Y') ? 'Y' : 'N'; ?>" />
				<input type="checkbox" onChange="checkboxValue(this,'i_918_preparer_statement_7a')" <?php echo (showData('i_918_preparer_statement_7a') == 'Y') ? 'checked' : ''; ?>>
				
				<p>I am not an attorney or accredited representative but
					have prepared this petition on behalf of the petitioner
					and with the petitioner's consent.</p>
			</div>
			<div class="d-flexible">
				<b>7.b.</b>
				<input type="hidden" name="i_918_preparer_statement_7b" id="i_918_preparer_statement_7b" value="<?php echo (showData('i_918_preparer_statement_7b') == 'Y') ? 'Y' : 'N'; ?>" />
				<input type="checkbox" onChange="checkboxValue(this,'i_918_preparer_statement_7b')" <?php echo (showData('i_918_preparer_statement_7b') == 'Y') ? 'checked' : ''; ?>>
				
				<p>I am an attorney or accredited representative and my
					representation of the petitioner in this case
					<input type="hidden" name="i_918_preparer_statement_7b_extend" id="i_918_preparer_statement_7b_extend" value="<?php echo (showData('i_918_preparer_statement_7b_extend') == 'Y') ? 'Y' : 'N'; ?>" />
					<input type="checkbox" onChange="checkboxValue(this,'i_918_preparer_statement_7b_extend')" <?php echo (showData('i_918_preparer_statement_7b_extend') == 'Y') ? 'checked' : ''; ?>>
					
					extends 
					<input type="hidden" name="i_918_preparer_statement_7b_not_extend" id="i_918_preparer_statement_7b_not_extend" value="<?php echo (showData('i_918_preparer_statement_7b_not_extend') == 'Y') ? 'Y' : 'N'; ?>" />
					<input type="checkbox" onChange="checkboxValue(this,'i_918_preparer_statement_7b_not_extend')" <?php echo (showData('i_918_preparer_statement_7b_not_extend') == 'Y') ? 'checked' : ''; ?>>
					
					does not extend beyond the preparation
					of this petition.</p>
			</div>
			<p><b>NOTE:</b> If you are an attorney or accredited
				representative whose representation extends beyond
				preparation of this petition, you may be obliged to
				submit a completed Form G-28, Notice of Entry of
				Appearance as Attorney or Accredited
				Representative, with this petition.</p>

			<div class="bg-info">
				<h4><b>Preparer's Certification </b> </h4>
			</div>
			<p>By my signature, I certify, under penalty of perjury, that I
				prepared this petition at the request of the petitioner. The
				petitioner then reviewed this completed petition and informed
				me that he or she understands all of the information contained
				in, and submitted with, his or her petition, including the
				<b>Petitioner's Declaration and Certification</b>, and that all of this
				information is complete, true, and correct. I completed this
				petition based only on information that the petitioner provided
				to me or authorized me to obtain or use.</p>
			<div class="bg-info">
				<h4><b>Preparer's Signature </b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12"><b>8.b.</b> Date of Signature (mm/dd/yyyy)
				</label>
				<div class="col-md-10 col-md-offset-2">
					<input type="date" class="form-control" name="i_918_preparer_sign_date" value="<?= showData('i_918_preparer_sign_date')?>" />
				</div>
			</div>
		</div><!-- left side column end -->

		<div class="col-md-5 col-md-offset-1">
		   
		</div><!-- right side column end -->

	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 11 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<b>
			<p style="text-align: right;">Page 11 of 11</p>
		</b>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 8. Additional Information </b> </h4>
			</div>
			<p>If you need extra space to provide any additional information
			within this supplement, use the space below. If you need more
			space than what is provided, you may make copies of this page
			to complete and file with this supplement or attach a separate
			sheet of paper. Include your name and A-Number (if any) at the
			top of each sheet; indicate the <b>Page Number, Part Number,</b>
			and <b>Item Number</b> to which your answer refers; and sign and
			date each sheet.</p>
			
			
			<div class="form-group">
				<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  name="i_918_additional_info_last_name" value="<?php echo showData('i_918_additional_info_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_918_additional_info_first_name" value="<?php echo showData('i_918_additional_info_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_918_additional_info_middle_name" value="<?php echo showData('i_918_additional_info_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2. A-Number (if any) ► A-</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_918_additional_info_a_number" value="<?php echo showData('i_918_additional_info_a_number')?>" />
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">3.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="i_918_additional_info_3a_page_no" value="<?php echo showData('i_918_additional_info_3a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">3.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_3b_part_no" value="<?php echo showData('i_918_additional_info_3b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">3.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_3c_item_no" value="<?php echo showData('i_918_additional_info_3c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>3.d.</b></span>
					<textarea class="form-control" id="i_918_additional_info_3d" name="i_918_additional_info_3d" rows="8" cols="50"><?php echo showData('i_918_additional_info_3d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">4.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="i_918_additional_info_4a_page_no" value="<?php echo showData('i_918_additional_info_4a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">4.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_4b_part_no" value="<?php echo showData('i_918_additional_info_4b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">4.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_4c_item_no" value="<?php echo showData('i_918_additional_info_4c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>4.d.</b></span>
					<textarea class="form-control" id="i_918_additional_info_4d" name="i_918_additional_info_4d" rows="8" cols="50"><?php echo showData('i_918_additional_info_4d')?></textarea>
				</div>
			</div>
		</div><!--end column-->
		
		<div class="col-md-6">
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">5.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="i_918_additional_info_5a_page_no" value="<?php echo showData('i_918_additional_info_5a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">5.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_5b_part_no" value="<?php echo showData('i_918_additional_info_5b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">5.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_5c_item_no" value="<?php echo showData('i_918_additional_info_5c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>5.d.</b></span>
					<textarea class="form-control" id="i_918_additional_info_5d" name="i_918_additional_info_5d" rows="8" cols="50"><?php echo showData('i_918_additional_info_5d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">6.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="i_918_additional_info_6a_page_no" value="<?php echo showData('i_918_additional_info_6a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">6.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_6b_part_no" value="<?php echo showData('i_918_additional_info_6b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">6.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_6c_item_no" value="<?php echo showData('i_918_additional_info_6c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>6.d.</b></span>
					<textarea class="form-control" id="i_918_additional_info_6d" name="i_918_additional_info_6d" rows="8" cols="50"><?php echo showData('i_918_additional_info_6d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">7.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="i_918_additional_info_7a_page_no" value="<?php echo showData('i_918_additional_info_7a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">7.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_7b_part_no" value="<?php echo showData('i_918_additional_info_7b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">7.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="i_918_additional_info_7c_item_no" value="<?php echo showData('i_918_additional_info_7c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>7.d.</b></span>
					<textarea class="form-control" id="i_918_additional_info_7d" name="i_918_additional_info_7d" rows="8" cols="50"><?php echo showData('i_918_additional_info_7d')?></textarea>
				</div>
			</div>
		</div><!--end column-->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php"?>