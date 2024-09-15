<?php
$meta_title 	= "INTAKE FORM G-28";
$page_heading 	= "Intake Form G-28, Notice of Entry of Apperance as attorny or Accredited Representative";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b>
				<p style="text-align:right;margin-right:2%">Page 1 of 4</p>
			</b>
		</div>

		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 1. Information About Attorney or Accredited Representative</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1. USCIS Online Account Number (if any) &#x2B9E; A- </label>
				<div class="col-md-8 col-md-offset-4">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->uscis_online_account_number ?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b><i>Name of Attorney or Accredited Representative</i></b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo  $attorneyData->family_last_name ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->given_first_name ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo  $attorneyData->middle_name ?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b><i>Address of Attorney or Accredited Representative</i></b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo  $attorneyData->street_number_and_name ?>" />
				</div>
			</div>
			<div class="form-group">
			<div class="col-md-6">
			<label class="control-label ">3.b. &nbsp;</label>
				<label>
					<input type="radio" name="apt_ste_flr_3_b" value="apt" <?php echo (showData('') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
				</label>
				<label>
					<input type="radio" name="apt_ste_flr_3_b" value="ste" <?php echo (showData('') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
				</label>
				<label>
					<input type="radio" name="apt_ste_flr_3_b" value="flr" <?php echo (showData('') === 'flr') ? 'checked' : ''; ?>> Flr.
				</label>
			</div>

				<div class="col-md-6">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->apt_ste_flr_value ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. City or Town :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="" value="<?php echo $attorneyData->city_or_town ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="">
						<option value=''>Select</option>
						<?php

						foreach ($allDataCountry as $record) {
							if ($record->state_code ==  $attorneyData->state) $selected = "selected";
							else $selected = "";
							echo "<option value='$record->state_code'  $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->zip_code ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.f. Province :</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->province ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.g. Postel Code :</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->postal_code ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.h. Country :</label>
				<div class="col-md-7">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->country ?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b><i>Contact Information of Attorney or Accredited Representative </i></b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Daytime Telephone Number: </label>
				<div class="col-md-12 ">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->day_time_telephone_number ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Mobile Telephone Number (if any)</label>
				<div class="col-md-12 ">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->mobile_telephone_number ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Email Address (if any): </label>
				<div class="col-md-12 ">
					<input type="email" disabled class="form-control" name="" value="<?php echo $attorneyData->email_address ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7. Fax Number (if any)</label>
				<div class="col-md-12 ">
					<input type="text" disabled class="form-control" name="" value="<?php echo  $attorneyData->fax_number ?>" />
				</div>
			</div>

		</div>

		<!-- left side column -->

		<div class="col-md-6">

			<div class="bg-info">
				<h4><b>Part 2. Eligibility Information for Attorney or Accredited Representative</b></h4>
			</div>

			<h5><b>Select all applicable items.</b></h5>
			<div class="form-group">
				<label class="control-label col-md-12">1.a.


					<input type="checkbox"> I am an attorney eligible to practice law in, and a
					member in good standing of, the bar of the highest courts of the following states, possessions, territories, commonwealths, or the District of Columbia. If you
					need extra space to complete this section, use the space provided in Part 6. Additional Information.I am an attorney eligible to practice law in, and a member in good standing of, the bar of the highest
					courts of the following states, possessions, territories, commonwealths, or the District of Columbia. If you need extra space to complete this section, use the space provided in Part 6. Additional Information.
				</label>
				<div class="form-group" style="margin-top: 10px;">
					<label class="control-label col-md-10 col-md-offset-2">Licensing Authority </label>
					<div class="col-md-10 col-md-offset-2">
						<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->licencing_authority ?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b. Bar Number (if applicable)</label>
				<div class="col-md-12">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->bar_number ?>" />
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-md-12">1.c. I (select only one box) </label><br>
				<div class="col-md-8 col-md-offset-3">
					<label><input type="radio" name="am_amnot" value=""> am not </label>&nbsp;
					<label><input type="radio" name="am_amnot" value=""> am </label>&nbsp;
				</div><br>
				<label class="control-label col-md-12">subject to any order suspending, enjoining, restraining, disbarring, or otherwise restricting me in the practice of law. If you are subject to any orders, use the space
					provided in Part 6. Additional Information to provide an explanation.</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.d. Name of Law Firm or Organization (if applicable)</label>
				<div class="col-md-12">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->name_law_firm_organaization ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.a.

					<input type="hidden" name="" id="" value="" />

					<input type="checkbox"> I am an accredited representative of the following
					qualified nonprofit religious, charitable, social service, or similar organization established in the
					United States and recognized by the Department of Justice in accordance with 8 CFR part 1292. </label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.b. Name of Recognized Organization</label>
				<div class="col-md-12">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->name_recognized_organization ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.c. Date of Accreditation (mm/dd/yyyy) </label>
				<div class="col-md-10 col-md-offset-2">
					<input type="date" class="form-control" name="" value="<?php echo $attorneyData->date_of_accrediation ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.
					<input type="hidden" name="" id="" value="" />
					<input type="checkbox"> I am associated with
				</label>
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->im_associated_with ?>" />
					</div>
					<label class="control-label col-md-12">the attorney or accredited representative of record
						who previously filed Form G-28 in this case, and my
						appearance as an attorney or accredited representative
						for a limited purpose is at his or her request.</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4.a. <input type="checkbox"> I am a law student or law graduate working under the
					direct supervision of the attorney or accredited
					representative of record on this form in accordance
					with the requirements in 8 CFR 292.1(a)(2).</label>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">4.b. Name of Law Student or Law Graduate</label>
				<div class="col-md-12">
					<input type="text" disabled class="form-control" name="" value="<?php echo $attorneyData->name_of_law_student_or_graduate ?>" />
				</div>
			</div>

		</div>

	</div>



	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align:right"><b>Page 2 of 4</b></p>
	</div>
	<div class="row">
		<div class="notice">
			<marquee behavior="" direction=""><h4 ><b>**Note: Part 1 and Part 2 are filled up by Attorny info</b> </h4></marquee>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 3. Notice of Appearance as Attorney or Accredited Representative</b> </h4>
			</div>
			<h5><b>If you need extra space to complete this section, use the space provided in Part 6. Additional Information. </b></h5>
			<h5><b>This appearance relates to immigration matters before (select only one box): </b></h5>
			<div class="form-group">
				<label class="control-label col-md-12">1.a.
					<?php echo createCheckbox("g_28_citizen_immigration_status")?> U.S. Citizenship and Immigration Services (USCIS)
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b. List the form numbers or specific matter in which appearance is entered.</label>
				<div class="col-md-12" >
					<input type="text" class="form-control" maxlength="36" name="g_28_list_spececific_matter" value="<?php echo showData('g_28_list_spececific_matter')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.a.
					 <?php echo createCheckbox("g_28_custom_enforcement_status")?> U.S. Immigration and Customs Enforcement (ICE)
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.b. List the specific matter in which appearance is entered.</label>
				<div class="col-md-12" >
					<input type="text" class="form-control" maxlength="36" name="g_28_list_specific_matter" value="<?php echo showData('g_28_list_specific_matter')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.a.
					<?php echo createCheckbox("g_28_custom_and_border_protection_status")?> U.S. Customs and Border Protection (CBP)
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.b. List the specific matter in which appearance is entered..</label>
				<div class="col-md-12" >
					<input type="text" class="form-control" maxlength="36" name="g_28_specific_matter_apearing" value="<?php echo showData('g_28_specific_matter_apearing')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">4. Receipt Number (if any) : &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" maxlength="13" name="g_28_receipt_number" value="<?php echo showData('g_28_receipt_number')?>" />
				</div>
			</div>


			<div class="form-group">
				<label class="control-label col-md-12">5. I enter my appearance as an attorney or accredited representative at the request of the (select only one box): </label><br>
				<div class="col-md-12">
					<label><input type="radio" name="g_28_notice_apperance_status" value="applicant" <?php echo (showData('g_28_notice_apperance_status') == 'applicant') ? 'checked' : ''; ?>> Applicant </label>&nbsp;
					<label><input type="radio" name="g_28_notice_apperance_status" value="petitioner" <?php echo (showData('g_28_notice_apperance_status') == 'petitioner') ? 'checked' : ''; ?>> Petitioner </label>&nbsp; 
					<label><input type="radio" name="g_28_notice_apperance_status" value="requester" <?php echo (showData('g_28_notice_apperance_status') == 'requester') ? 'checked' : ''; ?>> Requestor </label>&nbsp; &nbsp;<br>
					<label><input type="radio" name="g_28_notice_apperance_status" value="benificiary" <?php echo (showData('g_28_notice_apperance_status') == 'benificiary') ? 'checked' : ''; ?>> Beneficiary/Derivative  </label>&nbsp; 
					<label><input type="radio" name="g_28_notice_apperance_status" value="respondent" <?php echo (showData('g_28_notice_apperance_status') == 'respondent') ? 'checked' : ''; ?>> Respondent (ICE, CBP)</label>
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Information About Client (Applicant, Petitioner, Requestor, Beneficiary or Derivative, Respondent, or Authorized Signatory for an Entity)</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="36" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="36" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="36" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7.a. Name of Entity (if applicable) </label>
				<div class="col-md-12" >
					<input type="text" class="form-control" maxlength="36" name="g_28_name_of_entity" value="<?php echo showData('g_28_name_of_entity')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7.b. Title of Authorized Signatory for Entity (if applicable) </label>
				<div class="col-md-12" >
					<input type="text" class="form-control" maxlength="36" name="g_28_title_of_authorized_signatory" value="<?php echo showData('g_28_title_of_authorized_signatory')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">8. Client's USCIS Online Account Number (if any)  &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" maxlength="12" class="form-control" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">9. Client's Alien Registration Number (A-Number) (if any)  &#x2B9E; A- </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
				</div>
			</div>

			
		</div><!-- left side column -->

		<div class="col-md-6">
		
		<div class="bg-info">
				<h4><b><i>Client's Contact Information</i></b></h4>
		</div>
			<div class="form-group">
				<label class="control-label col-md-12">10. Daytime Telephone Number: </label>
				<div class="col-md-12 ">
					<input type="text" class="form-control" maxlength="15" name="information_about_you_daytime_tel" value="<?php echo showData('information_about_you_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">11. Mobile Telephone Number (if any): </label>
				<div class="col-md-12 ">
					<input type="text" class="form-control" maxlength="12" name="information_about_you_mobile" value="<?php echo showData('information_about_you_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">12. Email Address (if any): </label>
				<div class="col-md-12 ">
					<input type="email" class="form-control" maxlength="36" name="information_about_you_email" value="<?php echo showData('information_about_you_email')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b> Mailing Address of Client</b></h4>
			</div>
			<h5><b>NOTE: Provide the client's mailing address. Do not provide the business mailing address of the attorney or accredited representative unless it serves as the safe mailing address on the application or petition being filed with this Form G-28.</b></h5>

			<div class="form-group">
				<label class="control-label col-md-5">13.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="36" name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
					<div class="col-md-6"><label class="control-label ">13.b.</label>  &nbsp; 
				<label><input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;</label>	

				<label><input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; </label>	

				<label>	<input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.</label></div>
				<div class="col-md-6">
					<input type="text" class="form-control" maxlength="6" name="information_about_you_us_mailing_apt_ste_flr_value" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.c. City or Town :</label>
				<div class="col-md-7">
					 <input type="text" class="form-control" maxlength="36" name="information_about_you_us_mailing_city_town" value="<?php echo showData('information_about_you_us_mailing_city_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="information_about_you_us_mailing_state">
						<option style="" value=''>Select</option>
						<?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_us_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code'  $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="5" name="information_about_you_us_mailing_zip_code" value="<?php echo showData('information_about_you_us_mailing_zip_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.f. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="information_about_you_us_mailing_province" value="<?php echo showData('information_about_you_us_mailing_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.g. Postal Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="9" name="information_about_you_us_mailing_postal_code" value="<?php echo showData('information_about_you_us_mailing_postal_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.h. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_us_mailing_country" value="<?php echo showData('information_about_you_us_mailing_country')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Part 4. Client's Consent to Representation and Signature </b></h4>
			</div>
			<div class="bg-info">
				<h4><b><i>Consent to Representation and Release of Information</i> </b></h4>
			</div>
			<h5><b>I have requested the representation of and consented to being
			represented by the attorney or accredited representative named
			in Part 1. of this form. According to the Privacy Act of 1974
			and U.S. Department of Homeland Security (DHS) policy, 1
			also consent to the disclosure to the named attorney or
			accredited representative of any records pertaining to me that
			appear in any system of records of USCIS, ICE, or CBP.</b></h5>


		</div><!-- right side column -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- field set 1 end  -->
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="text-align:right;">Page 3 of 4</p></b>
		</div>
		<div class="col-md-6">
		

			<div class="bg-info">
				<h4><b>Part 4. Client's Consent to Representation and Signature (continued) </b></h4>
			</div>
			<div class="bg-info">
				<h4><b><i>Options Regarding Receipt of USCIS Notices and Documents</i> </b></h4>
			</div>
			<h5><b>USCIS will send notices to both a represented party (the client)
			and his, her, or its attorney or accredited representative either
			through mail or electronic delivery. USCIS will send all secure
			identity documents and Travel Documents to the client's U.S
			mailing address.</b></h5>
			<h5><b>If you want to have notices and/or secure identity documents
			sent to your attorney or accredited representative of record
			rather than to you, please select all applicable items below.
			You may change these elections through written notice to
			USCIS.</b></h5>

			<div class="form-group">
				<label class="control-label col-md-12">1.a. 
				<?php echo createCheckbox("g_28_request_the_uscis_original_status")?>
				 I request that USCIS send original notices on an application or petition to the business address of my Attorney or accredited representative as listed in this form.
				</label>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">1.b. 
				<?php echo createCheckbox("g_28_request_uscis_send_secure_identity")?> I request that USCIS send any secure identity document
				(Permanent Resident Card, Employment Authorization
				Document, or Travel Document) that I receive to the
				U.S. business address of my attorney or accredited
				representative (or to a designated military or diplomatic
				address in a foreign country (if permitted)).
				</label>
			</div>

			<h5><b>NOTE: If your notice contains Form I-94, ArrivalDeparture Record, USCIS will send the notice to the
			U.S. business address of your attorney or accredited
			representative. If you would rather have your Form
			I-94 sent directly to you, select Item Number 1.c.
			</b></h5>

			<div class="form-group">
				<label class="control-label col-md-12">1.c. 
				<?php echo createCheckbox("client_consent_to_representation_and_signature_continued_1_c")?> I request that USCIS send my notice containing Form I-94 to me at my U.S. mailing address.
				</label>
			</div>


			<div class="bg-info">
				<h4><b><i>Signature of Client or Authorized Signatory for an Entity</i> </b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">2.a.Signature of Client or Authorized Signatory for an Entity </label>
				<div class="col-md-12 ">
					<input type="text" class="form-control" disabled/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-7">2.b. Date of Signature (mm/dd/yyyy) </label>
					<div class="col-md-5">
						<input type="date" class="form-control" name="g_28_client_sign_date" value="<?php echo showData('g_28_client_sign_date')?>" />
					</div>
			</div>
		</div><!--end column-->  

		<div class="col-md-6">
			
			<div class="bg-info">
				<h4><b><i>Part 5. Signature of Attorney or Accredited Representative </i> </b></h4>
			</div>
			<h5><b>I have read and understand the regulations and conditions
			contained in 8 CFR 103.2 and 292 governing appearances and
			representation before DHS. I declare under penalty of perjury
			under the laws of the United States that the information I have
			provided on this form is true and correct.</b></h5>
			<div class="form-group">
				<label class="control-label col-md-12">1.a.Signature of Attorney or Accredited Representative</label>
				<div class="col-md-12 ">
					<input type="text" disabled class="form-control"/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-7">1.b. Date of Signature (mm/dd/yyyy) </label>
					<div class="col-md-5">
						<input type="date" class="form-control" name="g_28_attorney_sign_date" value="<?php echo showData('g_28_attorney_sign_date')?>" />
					</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.a.Signature of Law Student or Law Graduate </label>
				<div class="col-md-12 ">
					<input type="text" disabled class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">2.b. Date of Signature (mm/dd/yyyy) </label>
					<div class="col-md-5">
						<input type="date" class="form-control" name="g_28_law_student_sign_date" value="<?php echo showData('g_28_law_student_sign_date')?>" />
					</div>
			</div>
		</div><!--end column-->
	</div>

	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- field set 2 end  -->
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="text-align:right;">Page 4 of 4</p></b>
		</div>
		
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 6. Additional Information</b></h4>
			</div>
			
			<p>If you need extra space to provide any additional information
			within this form, use the space below. If you need more
			space than what is provided, you may make copies of this page
			to complete and file with this form or attach a separate
			sheet of paper. Type or print your name and A-Number (if any)
			at the top of each sheet; indicate the <b>Page Number, Part
			Number,</b> and <b>Item Number</b> to which your answer refers; and
			sign and date each sheet.</p>

			<div class="form-group">
				<label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="g_28_additional_info_last_name" value="<?php echo showData('g_28_additional_info_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="g_28_additional_info_first_name" value="<?php echo showData('g_28_additional_info_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="g_28_additional_info_middle_name" value="<?php echo showData('g_28_additional_info_middle_name')?>" />
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">2.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="g_28_additional_info_2a_page_no" value="<?php echo showData('g_28_additional_info_2a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">2.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_2b_part_no" value="<?php echo showData('g_28_additional_info_2b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">2.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_2c_item_no" value="<?php echo showData('g_28_additional_info_2c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>2.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_2d" maxlength="360" name="g_28_additional_info_2d" rows="8" cols="50"><?php echo showData('g_28_additional_info_2d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">3.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="g_28_additional_info_3a_page_no" value="<?php echo showData('g_28_additional_info_3a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">3.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_3b_part_no" value="<?php echo showData('g_28_additional_info_3b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">3.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_3c_item_no" value="<?php echo showData('g_28_additional_info_3c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>3.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_3d" maxlength="360" name="g_28_additional_info_3d" rows="8" cols="50"><?php echo showData('g_28_additional_info_3d')?></textarea>
				</div>
			</div>
		</div><!--end column-->
		
		<div class="col-md-6">
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">4.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="g_28_additional_info_4a_page_no" value="<?php echo showData('g_28_additional_info_4a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">4.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_4b_part_no" value="<?php echo showData('g_28_additional_info_4b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">4.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_4c_item_no" value="<?php echo showData('g_28_additional_info_4c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>4.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_4d" maxlength="360" name="g_28_additional_info_4d" rows="8" cols="50"><?php echo showData('g_28_additional_info_4d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">5.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="g_28_additional_info_5a_page_no" value="<?php echo showData('g_28_additional_info_5a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">5.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_5b_part_no" value="<?php echo showData('g_28_additional_info_5b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">5.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_5c_item_no" value="<?php echo showData('g_28_additional_info_5c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>5.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_5d" maxlength="360" name="g_28_additional_info_5d" rows="8" cols="50"><?php echo showData('g_28_additional_info_5d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">6.a. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="2" name="g_28_additional_info_6a_page_no" value="<?php echo showData('g_28_additional_info_6a_page_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">6.b. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_6b_part_no" value="<?php echo showData('g_28_additional_info_6b_part_no')?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">6.c. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" maxlength="6" name="g_28_additional_info_6c_item_no" value="<?php echo showData('g_28_additional_info_6c_item_no')?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>6.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_6d" maxlength="360" name="g_28_additional_info_6d" rows="8" cols="50"><?php echo showData('g_28_additional_info_6d')?></textarea>
				</div>
			</div>
		</div><!--end column-->
	</div>
	
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php" ?>