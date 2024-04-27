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
			<b><p style="text-align:right;">Page 2 of 4</p></b>
		</div>

		<div class="notice">
			<marquee behavior="" direction=""><h4 ><b>**Note: Part 1 and Part 2 are filled up by Attorny info</b> </h4></marquee>
		</div>
		<div class="col-md-5">
			<div class="bg-info">
				<h4><b>Part 3. Notice of Appearance as Attorney or Accredited Representative</b> </h4>
			</div>
			<h5><b>If you need extra space to complete this section, use the space provided in Part 6. Additional Information. </b></h5>
			<h5><b>This appearance relates to immigration matters before (select only one box): </b></h5>
			<div class="form-group">
				<label class="control-label col-md-12">1.a.
					
					<input type="hidden" name="notice_apperance_as_attorney_or_accredited_reprentative_immegration" id="notice_apperance_as_attorney_or_accredited_reprentative_immegration" 
					value="<?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'notice_apperance_as_attorney_or_accredited_reprentative_immegration')" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration') == 'Y') ? 'checked' : ''; ?>> U.S. Citizenship and Immigration Services (USCIS)

				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1.b. List the form numbers or specific matter in which appearance is entered.</label>
				<div class="col-md-12" >
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_immegration_spececific_matter" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration_spececific_matter')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.a.
					
					<input type="hidden" name="us_immigration_and_custom_enforcement" id="us_immigration_and_custom_enforcement" value="<?php echo (showData('us_immigration_and_custom_enforcement') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'us_immigration_and_custom_enforcement')" <?php echo (showData('us_immigration_and_custom_enforcement') == 'Y') ? 'checked' : ''; ?>> U.S. Immigration and Customs Enforcement (ICE)
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.b. List the specific matter in which appearance is entered.</label>
				<div class="col-md-12" >
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_2b_list_the_specific_matter" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_2b_list_the_specific_matter')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.a.
					
					<input type="hidden" name="us_custom_and_border_protection" id="us_custom_and_border_protection" value="<?php echo (showData('us_custom_and_border_protection') == 'Y') ? 'Y' : 'N'; ?>" />

					<input type="checkbox" onChange="checkboxValue(this,'us_custom_and_border_protection')" <?php echo (showData('us_custom_and_border_protection') == 'Y') ? 'checked' : ''; ?>> U.S. Customs and Border Protection (CBP)
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3.b. List the specific matter in which appearance is entered..</label>
				<div class="col-md-12" >
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_3b_list_the_specific_matter" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_3b_list_the_specific_matter')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">4. Receipt Number (if any) : &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_receipt_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_receipt_number')?>" />
				</div>
			</div>


			<div class="form-group">
				<label class="control-label col-md-12">5. I enter my appearance as an attorney or accredited representative at the request of the (select only one box):
				 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="applicant" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'applicant') ? 'checked' : ''; ?>> Applicant &nbsp;
					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="petitioner" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'petitioner') ? 'checked' : ''; ?>> Petitioner &nbsp; 
					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="requester" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'requester') ? 'checked' : ''; ?>> Requestor &nbsp; &nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="benificiary" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'benificiary') ? 'checked' : ''; ?>> Beneficiary/Derivative  &nbsp; 
					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_check" value="respondent" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_check') == 'respondent') ? 'checked' : ''; ?>> Respondent (ICE, CBP)</label>
			</div>

			<div class="bg-info">
				<h4><b>Information About Client (Applicant, Petitioner, Requestor, Beneficiary or Derivative, Respondent, or Authorized Signatory for an Entity)</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.a. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_last_name" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_first_name" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_middle_name" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7.a. Name of Entity (if applicable) </label>
				<div class="col-md-12" >
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_immegration_name_of_entity_1" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration_name_of_entity_1')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7.b. Title of Authorized Signatory for Entity (if applicable) </label>
				<div class="col-md-12" >
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_title_of_authorized_signatory" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_title_of_authorized_signatory')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">8. Client's USCIS Online Account Number (if any)  &#x2B9E; </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_uscis_account_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_uscis_account_number')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">9. Client's Alien Registration Number (A-Number) (if any)  &#x2B9E; A- </label>
				<div class="col-md-8 col-md-offset-4">
					 <input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_alien_reg_no" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_alien_reg_no')?>" />
				</div>
			</div>

			
		</div><!-- left side column -->

		<div class="col-md-5 col-md-offset-1">
		
		<div class="bg-info">
				<h4><b><i>Client's Contact Information</i></b></h4>
		</div>
			<div class="form-group">
				<label class="control-label col-md-12">10. Daytime Telephone Number: </label>
				<div class="col-md-12 ">
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_telephone_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_telephone_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">11. Mobile Telephone Number (if any): </label>
				<div class="col-md-12 ">
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_mobile_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_mobile_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">12. Email Address (if any): </label>
				<div class="col-md-12 ">
					<input type="email" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_eamil_address" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_eamil_address')?>" />
				</div>
			</div>

			<div class="bg-info">
				<h4><b> Mailing Address of Client</b></h4>
			</div>
			<h5><b>NOTE: Provide the client's mailing address. Do not provide the business mailing address of the attorney or accredited representative unless it serves as the safe mailing address on the application or petition being filed with this Form G-28.</b></h5>

			<div class="form-group">
				<label class="control-label col-md-5">13.a. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_street_number" value="<?php echo showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_street_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">13.b.  &nbsp; 
					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr" value="apt" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;

					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr" value="ste" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 

					<input type="radio" name="notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr" value="flr" <?php echo (showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_number" value="<?php echo showData('information_about_you_safe_us_physical_number')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.c. City or Town :</label>
				<div class="col-md-7">
					 <input type="text" class="form-control" name="interpreter_contact_information_mailing_address_city_or_town" value="<?php echo showData('interpreter_contact_information_mailing_address_city_or_town')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.d. State :</label>
				<div class="col-md-7">
					<select class="form-control" name="information_mailing_address_client_state">
						<option style="" value=''>Select</option>
						<?php
						
						if(showData('information_mailing_address_client_state')!='')
								echo"<option value='".showData('information_mailing_address_client_state')."' selected>".showData('information_mailing_address_client_state')."</option>";
							
						foreach ($allDataCountry as $record) {
							echo "<option value='$record->state_code'>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.e. Zip Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_zip" value="<?php echo showData('interpreter_contact_information_mailing_address_zip')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.f. Province :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_province" value="<?php echo showData('interpreter_contact_information_mailing_address_province')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.g. Postel Code :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_postel_code" value="<?php echo showData('interpreter_contact_information_mailing_address_postel_code')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">13.h. Country :</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="interpreter_contact_information_mailing_address_country" value="<?php echo showData('interpreter_contact_information_mailing_address_country')?>" />
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
	<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset><!-- field set 1 end  -->

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="text-align:right;">Page 3 of 4</p></b>
		</div>
		<div class="col-md-5">
		

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
				<input type="hidden" name="client_consent_to_representation_and_signature_continued_1_a" id="client_consent_to_representation_and_signature_continued_1_a" value="<?php echo (showData('client_consent_to_representation_and_signature_continued_1_a') == 'Y') ? 'Y' : 'N'; ?>" />	
				

				<input type="checkbox" onChange="checkboxValue(this,'client_consent_to_representation_and_signature_continued_1_a')"  <?php echo (showData('client_consent_to_representation_and_signature_continued_1_a') == 'Y') ? 'checked' : ''; ?>> I request that USCIS send original notices on an application or petition to the business address of my Attorney or accredited representative as listed in this form.
				</label>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">1.b. 
				<input type="hidden" name="request_that_uscis_send_any_secure_identity" id="request_that_uscis_send_any_secure_identity" value="<?php echo (showData('request_that_uscis_send_any_secure_identity') == 'Y') ? 'Y' : 'N'; ?>" />	
				

				<input type="checkbox" onChange="checkboxValue(this,'request_that_uscis_send_any_secure_identity')"  <?php echo (showData('request_that_uscis_send_any_secure_identity') == 'Y') ? 'checked' : ''; ?>> I request that USCIS send any secure identity document
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
				<input type="hidden" name="client_consent_to_representation_and_signature_continued_1_c" id="client_consent_to_representation_and_signature_continued_1_c" value="<?php echo (showData('client_consent_to_representation_and_signature_continued_1_c') == 'Y') ? 'Y' : 'N'; ?>" />	
				

				<input type="checkbox" onChange="checkboxValue(this,'client_consent_to_representation_and_signature_continued_1_c')"  <?php echo (showData('client_consent_to_representation_and_signature_continued_1_c') == 'Y') ? 'checked' : ''; ?>> I request that USCIS send my notice containing Form I-94 to me at my U.S. mailing address.
				</label>
			</div>


			<div class="bg-info">
				<h4><b><i>Signature of Client or Authorized Signatory for an Entity</i> </b></h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">2.a.Signature of Client or Authorized Signatory for an Entity </label>
				<div class="col-md-12 ">
					<input type="text" class="form-control" disabled name="client_consent_to_representation_and_signature_continued_signature" value="<?php echo showData('client_consent_to_representation_and_signature_continued_signature')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-7">2.b. Date of Signature (mm/dd/yyyy) </label>
					<div class="col-md-5">
						<input type="date" class="form-control" name="client_consent_to_representation_and_signature_continued_signature_date_of_signature" value="<?php echo showData('client_consent_to_representation_and_signature_continued_signature_date_of_signature')?>" />
					</div>
			</div>
		</div><!--end column-->  

		<div class="col-md-5 col-md-offset-1">
			
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
					<input type="text" disabled class="form-control" name="signature_of_attorney_or_accredited_representative_1_a" value="<?php echo showData('signature_of_attorney_or_accredited_representative_1_a')?>" />
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-7">1.b. Date of Signature (mm/dd/yyyy) </label>
					<div class="col-md-5">
						<input type="date" class="form-control" name="signature_of_attorney_or_accredited_representative_signature_1_b" value="<?php echo showData('signature_of_attorney_or_accredited_representative_signature_1_b')?>" />
					</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2.a.Signature of Law Student or Law Graduate </label>
				<div class="col-md-12 ">
					<input type="text" disabled class="form-control" name="signature_of_attorney_or_accredited_representative_2_a" value="<?php echo showData('signature_of_attorney_or_accredited_representative_2_a')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-7">2.b. Date of Signature (mm/dd/yyyy) </label>
					<div class="col-md-5">
						<input type="date" class="form-control" name="signature_of_attorney_or_accredited_representative_signature_2_b" value="<?php echo showData('signature_of_attorney_or_accredited_representative_signature_2_b')?>" />
					</div>
			</div>
		</div><!--end column-->
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
			<b><p style="text-align:right;">Page 4 of 4</p></b>
		</div>
		
		<div class="col-md-5">
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
					<input type="text" class="form-control" name="g_28_additional_info_last_name" value="<?php echo showData('g_28_additional_info_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_first_name" value="<?php echo showData('g_28_additional_info_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_middle_name" value="<?php echo showData('g_28_additional_info_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.a. Page Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_2a_page_no" value="<?php echo showData('g_28_additional_info_2a_page_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.b. Part Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_2b_part_no" value="<?php echo showData('g_28_additional_info_2b_part_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2.c. Item Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_2c_item_no" value="<?php echo showData('g_28_additional_info_2c_item_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>2.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_2d" name="g_28_additional_info_2d" rows="8" cols="50"><?php echo showData('g_28_additional_info_2d')?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.a. Page Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_3a_page_no" value="<?php echo showData('g_28_additional_info_3a_page_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.b. Part Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_3b_part_no" value="<?php echo showData('g_28_additional_info_3b_part_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. Item Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_3c_item_no" value="<?php echo showData('g_28_additional_info_3c_item_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>3.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_3d" name="g_28_additional_info_3d" rows="8" cols="50"><?php echo showData('g_28_additional_info_3d')?></textarea>
				</div>
			</div>
		</div><!--end column-->
		
		<div class="col-md-5 col-md-offset-1">
			<div class="form-group">
				<label class="control-label col-md-5">4.a. Page Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_4a_page_no" value="<?php echo showData('g_28_additional_info_4a_page_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.b. Part Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_4b_part_no" value="<?php echo showData('g_28_additional_info_4b_part_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.c. Item Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_4c_item_no" value="<?php echo showData('g_28_additional_info_4c_item_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>4.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_4d" name="g_28_additional_info_4d" rows="8" cols="50"><?php echo showData('g_28_additional_info_4d')?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.a. Page Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_5a_page_no" value="<?php echo showData('g_28_additional_info_5a_page_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.b. Part Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_5b_part_no" value="<?php echo showData('g_28_additional_info_5b_part_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.c. Item Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_5c_item_no" value="<?php echo showData('g_28_additional_info_5c_item_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>5.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_5d" name="g_28_additional_info_5d" rows="8" cols="50"><?php echo showData('g_28_additional_info_5d')?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.a. Page Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_6a_page_no" value="<?php echo showData('g_28_additional_info_6a_page_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.b. Part Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_6b_part_no" value="<?php echo showData('g_28_additional_info_6b_part_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6.c. Item Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="g_28_additional_info_6c_item_no" value="<?php echo showData('g_28_additional_info_6c_item_no')?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>6.d.</b></span>
					<textarea class="form-control" id="g_28_additional_info_6d" name="g_28_additional_info_6d" rows="8" cols="50"><?php echo showData('g_28_additional_info_6d')?></textarea>
				</div>
			</div>
		</div><!--end column-->
	</div>
	
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
</fieldset>

<?php include "intake_footer.php"?>