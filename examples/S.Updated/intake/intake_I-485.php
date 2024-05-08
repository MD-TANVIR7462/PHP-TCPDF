<?php
$meta_title 	=   "INTAKE FOR FORM I-485";
$page_heading 	=   "Form I-485, Application to Register Permanent Residence or Adjust Status";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>


<fieldset class="setpage">

    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 1 of 20</p>
        </b>
    </div>
    <div style ="border: 1px solid black;" class="form-group">
        <div class="bg-info text-center">
            <h4><b>To be completed by an attorney or accredited representative (if any).</b></h4>
        </div>
        <div class="" style="padding:2%">
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flexible ">
                        <?php echo createCheckbox("i_485_g28_box")?>
                        <p><b>Select this box if Form G-28 or Form G-28I is attached.</b></p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class=""> <span class="font-weight-bold">Volag Number</span> (if any)</label>
                    <br> <br> <br>
                    <input type="text" maxlength="10" class="form-control" 
                        value="<?php echo $attorneyData->volag_number ?>"  disabled />
                </div>
                <div class="col-lg-3">
                    <label class=""> <span class="font-weight-bold">Attorney State Bar Number</span> (if
                    applicable)</label>
                    <br> <br>
                    <input type="text" maxlength="15" class="form-control"
                        value="<?php echo $attorneyData->bar_number ?>" disabled />
                </div>
                <div class="col-lg-3">
                    <label class="control-label">Attorney or According Representative USCIS Online
                    Account Number (if any)</label>
                    <input type="text" class="form-control" maxlength="12"
                        value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled />
                </div>
            </div>
        </div>
    </div>

    <div class="row  mt-3 border-add">
        <p><b> NOTE TO ALL APPLICANTS:</b> If you do not completely fill out this application or fail to submit required documents listed in the
            nstructions, U.S. Citizenship and Immigration Services (USCIS) may deny your application.</p>
        <div class="col-md-6 container border-add ">
            <div class="bg-info">
                <h4><b>Part 1. Information About You(Person applying
                    for lawful permanent residence)</b></h4>
            </div>
            <p>
               <b> Your Current Legal Name (do not provide a nickname)</b>
            </p>
            
            <div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_family_last_name"
                            value="<?php echo showData('information_about_you_family_last_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-info ">
                    <h4><b>Other Names You Have Used Since Birth (if applicable)</b> </h4>
                </div>
                <p><b>NOTE:</b> Provide all other names you have ever used, including
                    your family name at birth, other legal names, nicknames,
                    aliases, and assumed names. If you need extra space to
                    complete this section, use the space provided in <b>Part 14.
                    Additional Information.</b> </p>

                <div class="form-group">
                    <label class="control-label col-md-5">2.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_other_family_last_name"
                            value="<?php echo showData('information_about_you_other_family_last_name')?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">2.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_other_given_first_name"
                            value="<?php echo showData('information_about_you_other_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">2.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_other_middle_name"
                            value="<?php echo showData('information_about_you_other_middle_name')?>" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-5">
            <div class="form-group">
                <label class="control-label col-md-5">A-Number &nbsp; &nbsp; &nbsp; A-</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_a_number" maxlength="9" value="<?php echo showData('i_485_a_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_3a_family_lastname" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_3a_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_3b_given_firstname" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_3b_given_firstname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_3c_family_middlename" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_3c_family_middlename')?>" />
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="control-label col-md-5">4.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_4a_family_lastname" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_4a_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_4b_given_firstname" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_4b_given_firstname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_4c_middlename" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_4c_middlename')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Other Information About You</b> </h4>
            </div>
            <div>
                <div class="form-group">
                    <label class="control-label col-md-5">5. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-7">
                        <input type="date" class="form-control"
                            name="other_information_about_you_date_of_birth" maxlength="28"
                            value="<?php echo showData('other_information_about_you_date_of_birth')?>">
                    </div>
                </div>
                <p>NOTE: In addition to providing your actual date of birth,
                    include any other dates of birth you have used in connection
                    with any legal names or non-legal names in he space provided
                    in Part 14. Additional Information.
                    </p>

                <div class="form-group">
                    <label class="control-label col-md-5">6.  Sex </label>
                    <div class="col-md-7">
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
                    <label class="control-label col-md-5">7. City or Town of Birth</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_info_about_you_city_town_birth" maxlength="60"
                            value="<?php echo showData('i_485_info_about_you_city_town_birth')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input  type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>


<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 2 of 20</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You(Person applying
                    for lawful permanent residence) (continued)
                </b></h4> 
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9. Country of Citizenship or Nationality </label>
                <div class="col-md-12">
                    <input type="text" maxlength="29" class="form-control" name="other_information_about_you_country_of_citizen" 
                    value="<?php echo showData('other_information_about_you_country_of_citizen')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10. Alien Registration Number (A-Number) (if any)</label>
                <div class="col-md-12">
                    <input type="text" maxlength="29" class="form-control" name="other_information_about_you_alien_registration_number" 
                    value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
                </div>
            </div>
            <p><b>NOTE:</b> If you have <b>EVER</b> used other A-Numbers,
                include the additional A-Numbers in the space
                provided in <b>Part 14. Additional Information.</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">11. USCIS Online Account Number (if any)</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="12" class="form-control" name="other_information_about_you_social_security_number" 
                    value="<?php echo showData('other_information_about_you_social_security_number')?>"/>
                </div>
            </div>

            <div class="bg-info">
                <h4><b>U.S. Mailing Address</b></h4> 
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">12.a. In Care Of Name (if any)</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="35" class="form-control" name="i_485_info_about_you_12a_in_care_of_name" value="<?php echo showData('i_485_info_about_you_12a_in_care_of_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">12.b. Street Number and Name</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="29" class="form-control" name="i_485_info_about_you_12b_street_number_name" value="<?php echo showData('i_485_info_about_you_12b_street_number_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">12.c. </label>
                <div class="col-md-5">
                    <label class="control-label">
                        <input type="radio" name="i_485_info_about_you_12c_apt_ste_flr" value="apt"
                            <?php echo (showData('i_485_info_about_you_12c_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                        Apt
                    </label>
                    &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_485_info_about_you_12c_apt_ste_flr" value="ste"
                            <?php echo (showData('i_485_info_about_you_12c_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                        Ste
                    </label>
                     &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_485_info_about_you_12c_apt_ste_flr" value="flr"
                            <?php echo (showData('i_485_info_about_you_12c_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                        Flr
                    </label>
                </div>
                 <div class="col-md-5">
                    <input type="text"  maxlength="7" class="form-control" name="i_485_info_about_you_apt_value" value="<?php echo showData('i_485_info_about_you_apt_value')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.d. City or Town </label>
                <div class="col-md-7">
                    <input type="text"   maxlength="20" class="form-control" name="i_485_info_about_you_12d_city_town" value="<?php echo showData('i_485_info_about_you_12d_city_town')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">12.e. State </label>
                <div class="col-md-3">
                    <select class="form-control" name="i_485_info_about_you_12e_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_485_info_about_you_12e_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
                </div>
                <label class="control-label col-md-3">12.f. ZIP Code</label>
                <div class="col-md-3">
                    <input type="text"  maxlength="7" class="form-control" name="i_485_info_about_you_12f_zip_code" value="<?php echo showData('i_485_info_about_you_12f_zip_code')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4><b>Alternate and/or Safe Mailing Address</b></h4> 
            </div>
            <p>If you are applying based on the Violence Against Women
            Act (VAWA) or as a special immigrant juvenile, human
            trafficking victim (T nonimmigrant), or victim of qualifying
            criminal activity (U nonimmigrant) and you do not want
            USCIS to send notices about this application to your home,
            you may provide an alternative and/or safe mailing address.
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">13.a. In Care Of Name (if any)</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="35" class="form-control" name="i_485_info_about_you_13a_in_careof_name" value="<?php echo showData('i_485_info_about_you_13a_in_careof_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">13.b. Street Number and Name</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="29" class="form-control" name="i_485_info_about_you_13b_street_number_and_name" 
                    value="<?php echo showData('i_485_info_about_you_13b_street_number_and_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">13.c. </label>
                <div class="col-md-5">
                    <label class="control-label">
                        <input type="radio" name="i_485_info_about_you_13c_apt_ste_flr" value="apt"
                            <?php echo (showData('i_485_info_about_you_13c_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                        Apt
                    </label>
                    &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_485_info_about_you_13c_apt_ste_flr" value="ste"
                            <?php echo (showData('i_485_info_about_you_13c_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                        Ste
                    </label>
                     &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_485_info_about_you_13c_apt_ste_flr" value="flr"
                            <?php echo (showData('i_485_info_about_you_13c_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                        Flr
                    </label>
                </div>
                 <div class="col-md-5">
                    <input type="text"  maxlength="7" class="form-control" name="i_485_info_about_you_13c_flr_value" value="<?php echo showData('i_485_info_about_you_13c_flr_value')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.d. City or Town </label>
                <div class="col-md-7">
                    <input type="text"  maxlength="20" class="form-control" name="i_485_info_about_you_13d_city_town" value="<?php echo showData('i_485_info_about_you_13d_city_town')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">13.e. State </label>
                <div class="col-md-3">
                    <select class="form-control" name="i_485_info_about_you_13e_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_485_info_about_you_13e_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
                </div>
                <label class="control-label col-md-3">13.f. ZIP Code</label>
                <div class="col-md-3">
                    <input type="text"  maxlength="7" class="form-control" name="i_485_info_about_you_13e_zipcode" value="<?php echo showData('i_485_info_about_you_13e_zipcode')?>"/>
                </div>
            </div>
        </div> <!-- left side column end  -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Social Security Card</b></h4> 
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">14. Has the Social Security Administration (SSA) ever
                    officially issued a Social Security card to you?</label>
                <div class="col-md-5 col-md-offset-7">
                    <?php echo createRadio("i_485_social_security_status")?>
                </div>
                <label class="control-label col-md-12">If you answered “Yes,” provide the information requested
                in Item Number 15.</label>
            </div>
             <div class="form-group">
                <label class="control-label col-md-12">15. Provide your U.S. Social Security Number (SSN).</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="9" class="form-control" name="other_information_about_you_social_security_number" value="<?php echo showData('other_information_about_you_social_security_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. Do you want the SSA to issue you a Social Security card?
                    (You must also answer “Yes” to Item Number 17.
                    Consent for Disclosure, to receive a card).</label>
                <div class="col-md-5 col-md-offset-7">
                    <?php echo createRadio("i_485_social_security_card_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">17. Consent for Disclosure: I authorize disclosure of
                information from this application to the SSA as required
                for the purpose of assigning me an SSN and issuing me a
                Social Security Card.</label>
                <div class="col-md-5 col-md-offset-7">
                    <?php echo createRadio("i_485_social_authorize_disclousure_status")?>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Recent Immigration History </b></h4> 
            </div>
            <p>Provide the information for Item Numbers 18. - 24. if you last
                entered the United States using a passport or travel document.</p>

            <div class="form-group">
                <label class="control-label col-md-12">18. Passport Number Used at Last Arrival</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="38" class="form-control" name="other_information_about_you_passport_number" value="<?php echo showData('other_information_about_you_passport_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">19. Travel Document Number Used at Last Arrival</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="38" class="form-control" name="other_information_about_you_19_travel_document_number" value="<?php echo showData('other_information_about_you_19_travel_document_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">20. Expiration Date of this Passport or Travel Document
                (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">21. Country that Issued this Passport or Travel Document</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="29" class="form-control" name="other_information_about_you_country_issuance_passport" value="<?php echo showData('other_information_about_you_country_issuance_passport')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">22. Nonimmigrant Visa Number from this Passport (if any)</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="38" class="form-control" name="other_information_about_you_22_nonimmigrant_visa_number" value="<?php echo showData('other_information_about_you_22_nonimmigrant_visa_number')?>" />
                </div>
            </div>
            <p>Place of Last Arrival into the United States</p>

             <div class="form-group">
                <label class="control-label col-md-12">23.a. City or Town</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="29" class="form-control" name="other_information_about_you_last_entry_city_town" value="<?php echo showData('other_information_about_you_last_entry_city_town')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">23.b. State</label>
                <div class="col-md-6">
                    <select class="form-control" name="i_485_info_about_you_23b_state">
						<option style="display:none" value=''>Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('i_485_info_about_you_23b_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">24. Date of Last Arrival (mm/dd/yyyy)</label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="other_information_about_you_date_of_last_entry_us" value="<?php echo showData('other_information_about_you_date_of_last_entry_us')?>"/>
                </div>
            </div>
        </div> <!-- right side column end  -->
    </div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input  type="submit" name="next" class="next btn btn-info" value="Next"
		style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
		id="submit_data" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 3 of 20</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You(Person applying
                    for lawful permanent residence) (continued)</b></h4> 
            </div>
            <p>When I last arrived in the United States, I:</p>

            <div class="form-group">
                <label class="control-label col-md-12">25.a. <?php echo createCheckbox("i_485_25a_inspected_admited_status")?> Was inspected at a port of entry and admitted as (for example, exchange visitor; visitor, waived through; temporary worker; student):
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_25a_inspected_admited_status_text_value"  maxlength="29"
                    value="<?php echo showData('i_485_25a_inspected_admited_status_text_value')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">25.b. <?php echo createCheckbox("i_485_25b_inspected_port_entry_status")?> Was inspected at a port of entry and paroled as (for example, humanitarian parole, Cuban parole):</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_25b_inspected_port_entry_status_text_value"  maxlength="29" 
                    value="<?php echo showData('i_485_25b_inspected_port_entry_status_text_value')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">25.c. <?php echo createCheckbox("i_485_25c_admission_parole_status")?> Came into the United States without admission orparole.</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_25c_admission_parole_status_text_value"  maxlength="29" 
                    value="<?php echo showData('i_485_25c_admission_parole_status_text_value')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">25.d. <?php echo createCheckbox("i_485_25d_other_status")?> 25.d. other :</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="29" class="form-control" name="i_485_25d_other_status_text_value" value="<?php echo showData('i_485_25d_other_status_text_value')?>" />
                </div>
            </div>
            <p>If you were issued a Form I-94 Arrival-Departure Record Number:</p>
            <div class="form-group">
                <label class="control-label col-md-12">26.a. Form I-94 Arrival-Departure Record Number</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="text"  maxlength="29" class="form-control" name="other_information_about_you_arival_record_number" 
                    value="<?php echo showData('other_information_about_you_arival_record_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">26.b. Expiration Date of Authorized Stay Shown on Form
                I-94 (mm/dd/yyyy) </label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="i_485_information_about_you_26b_expiration_date_authorized" value="<?php echo showData('i_485_information_about_you_26b_expiration_date_authorized')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">26.c. Status on Form I-94 (for example, class of admission, or
                paroled, if paroled) </label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="i_485_information_about_you_26c_status_on_form_i94" value="<?php echo showData('i_485_information_about_you_26c_status_on_form_i94')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">27. What is your current immigration status (if it has changed
                since your arrival)? </label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="i_485_information_about_you_27_what_is_your_current_immigration" value="<?php echo showData('i_485_information_about_you_27_what_is_your_current_immigration')?>" />
                </div>
            </div>

            <p>Provide your name exactly as it appears on your Form I-94 (if any)</p>

            <div class="form-group">
                <label class="control-label col-md-5">28.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_information_about_you_28_family_lastname" maxlength="29"
                        value="<?php echo showData('i_485_information_about_you_28_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">28.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_information_about_you_28_given_firstname" maxlength="29"
                        value="<?php echo showData('i_485_information_about_you_28_given_firstname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">28.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_information_about_you_28_middlename" maxlength="29"
                        value="<?php echo showData('i_485_information_about_you_28_middlename')?>" />
                </div>
            </div>
        </div> <!-- left side column end  -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Application Type or Filing Category </b></h4> 
            </div>
            <p><b>NOTE: </b>Attach a copy of the Form I-797 receipt or approval notice for the underlying petition or application, as
            appropriate.</p>

            <p><b>I am applying</b> to register lawful permanent residence or
                adjust status to that of a lawful permanent resident based on
                the following immigrant category (select <b>only one</b> box). (See
                the Form I-485 Instructions for more information, including
                any <b>Additional Instructions</b> that relate to the immigrant
                category you select.)</p>
                <br>

            <p><b>1.a. Family-based</b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1a_immidiate_relative_status")?> Immediate relative spouse of a U.S. citizen, Form I-130</label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1a_other_relative_status")?> Other relative of a U.S. citizen or relative of a lawful permanent resident under the family-based preference categories, Form I-130</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1a_person_admitted_status")?> Person admitted to the United States as a fiancé(e) or child of a fiancé(e) of a U.S. citizen, Form I-129F (K-1/K-2 Nonimmigrant) </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1a_widow_widoer_status")?> Widow or widower of a U.S. citizen, Form I-360 </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1a_vawa_self_petitioner_status")?> VAWA self-petitioner, Form I-360
                </label>
            </div>
            
            <p><b>1.b. Employment-based </b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1b_alien_worker_status")?> Alien worker, Form I-140
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1b_alien_enterprenure_status")?> Alien entrepreneur, Form I-526
                </label>
            </div>

            
            <p><b>1.c. Special Immigrant</b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1c_religious_worker_status")?> Religious worker, Form I-360
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1c_immigrant_juvenile_status")?> Special immigrant juvenile, Form I-360 
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1c_certain_afgan_iraqi_status")?> Certain Afghan or Iraqi national, Form I-360 or Form DS-157</label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1c_certain_international_broadcuster_status")?> Certain international broadcaster, Form I-360 </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1c_certain_g4_status")?> Certain G-4 international organization or family member or NATO-6 employee or family member, Form I-360 </label>
            </div>

            <p><b>1.d. Asylee or Refugee</b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1d_asylum_status_status")?> Asylum status (INA section 208), Form I-589 or Form I-730 </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1d_refugee_status")?> Refugee status (INA section 207), Form I-590 or Form I-730 </label>
            </div>

            <p><b>1.e. Human Trafficking Victim or Crime Victim </b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1e_human_traficking_victim_status")?> Human trafficking victim (T Nonimmigrant), Form I-914 or derivative family member, Form I-914A </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1e_crime_victim_status")?> Crime victim (U Nonimmigrant), Form I-918, derivative family member, Form I-918A, or qualifying family member, Form I-929 </label>
            </div>

        </div> <!-- right side column end  -->
    </div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input  type="submit" name="next" class="next btn btn-info" value="Next"
		style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
		id="submit_data" />
</fieldset>


<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 4 of 20</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Application Type or Filing Category
                (continued)</b></h4>
            </div>
            <p><b>1.f. Special Programs Based on Certain Public Laws</b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_the_cuban_adjustment_status")?> The Cuban Adjustment Act  </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_the_cuban_adjustment_act_status")?> The Cuban Adjustment Act for battered spouses and children </label>
            </div>

             <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_the_dependant_status")?> Dependent status under the Haitian Refugee Immigrant Fairness Act  </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_the_dependant_status_under_haitian")?> Dependent status under the Haitian Refugee Immigrant Fairness Act for battered spouses and children </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_lautenberg_parolees_status")?> Lautenberg Parolees </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_diplomate_or_high_ranking_status")?> Diplomats or high ranking officials unable to return home (Section 13 of the Act of September 11, 1957) </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1f_indochinese_parole_status")?> Indochinese Parole Adjustment Act of 2000 </label>
            </div>
            <p><b>1.g. Additional Options </b></p>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1g_diversity_visa_status")?> Diversity Visa program </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1g_continuous_residence_status")?> Continuous residence in the United States since before January 1, 1972 ("Registry")</label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1g_individual_born_status")?> Individual born in the United States under diplomatic
                status </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("i_485_part2_1g_other_eligibility_status")?> Other eligibility </label>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input type="text"  maxlength="29" class="form-control" name="i_485_part2_1g_other_eligibility_status_text_value" 
                    value="<?php echo showData('i_485_part2_1g_other_eligibility_status_text_value')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"> 2. Are you applying for adjustment based on the
                    Immigration and Nationality Ac(INA) section 245(i)? </label>
                <div class="col-md-5 col-md-offset-7">
                    <?php echo createRadio("i_485_part2_2_are_you_applying_for_adjustment")?>
                </div>
            </div>

            <p><b>NOTE:</b> If you answered "Yes" to <b>Item Number 2.</b>, you
            must have selected a family-based, employment-based,
            special immigrant, or Diversity Visa immigrant category
            listed above in <b>Item Numbers 1.a. - 1.g.</b> as the basis for
            your application for adjustment of status. Fill out the rest
            of this application <b>and</b> Supplement A to Form I-485,
            Adjustment of Status Under Section 245(i) (Supplement
            A). For detailed filing instructions, read the Form I-485
            Instructions (including any <b>Additional Instructions</b> that
            relate to the immigrant category that you selected <b>Item
            Numbers 1.a. - 1.g.)</b> and Supplement A Instructions.</p>
        </div> <!-- right side column end  -->



        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Information About Your Immigrant Category </b></h4>
            </div>
            <p>If you are the <b>principal applicant,</b> provide the following information.</p>
            
            <div class="form-group">
                <label class="control-label col-md-12"> 3. Receipt Number of Underlying Petition (if any)</label>
                <div class="col-md-12">
                    <input type="text"  maxlength="38" name="i_485_info_about_you_part2_3_receipt_number_underlying" class="form-control" 
                    value="<?php echo showData("i_485_info_about_you_part2_3_receipt_number_underlying")?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"> 4. Priority Date from Underlying Petition (if any)
                (mm/dd/yyyy)
                </label>
                <div class="col-md-12">
                    <input type="date" name="i_485_info_about_you_part2_4_periority_date" class="form-control" 
                    value="<?php echo showData("i_485_info_about_you_part2_4_periority_date")?>">
                </div>
            </div>
            <p>If you are a <b>derivative applicant</b> (the spouse or unmarried
            child under 21 years of age of a principal applicant), provide
            the following information for the<b> principal applicant.</b></p>

            <p>Principal Applicant's Name</p>

            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_part2_5a_family_lastname" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_part2_5a_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_info_about_you_part2_5b_given_name" maxlength="29"
                        value="<?php echo showData('i_485_info_about_you_part2_5b_given_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_info_about_you_part2_5c_middle_name" maxlength="29" value="<?php echo showData('i_485_info_about_you_part2_5c_middle_name')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"> 6. Principal Applicant's A-Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="date" class="form-control" name="i_485_info_about_you_part2_6_principal_applicant_a_number" maxlength="29" value="<?php echo showData('i_485_info_about_you_part2_6_principal_applicant_a_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> 7. Principal Applicant's Date of Birth (mm/dd/yyyy)
                </label>
                <div class="col-md-12">
                    <input type="date" class="form-control" name="i_485_info_about_you_part2_7_applicant_date_of_birth" maxlength="29" value="<?php echo showData('i_485_info_about_you_part2_7_applicant_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> 8. Receipt Number of Principal's Underlying Petition (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_info_about_you_part2_8_receipt_number" maxlength="29" value="<?php echo showData('i_485_info_about_you_part2_8_receipt_number')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"> 9. Priority Date of Principal Applicant's Underlying Petition
                (if any) (mm/dd/yyyy) </label>
                <div class="col-md-12">
                    <input type="date" class="form-control" name="i_485_info_about_you_part2_9_priority_date" maxlength="29" value="<?php echo showData('i_485_info_about_you_part2_9_priority_date')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4><b> Part 3. Additional Information About You </b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12"> 1. Have you ever applied for an immigrant visa to obtain
                permanent resident status at a U.S. Embassy or U.S.
                Consulate abroad? </label>

                <div class="col-md-5 col-md-offset-7">
                    <?php echo createRadio("i_485_part3_1_immigrant_visa_status")?>
                </div>
            </div>

            <p>If you answered "Yes" to <b>Item Number 1.,</b> complete Item
            <b>Numbers 2.a. - 4.</b> below. If you need extra space to
            complete this section, use the space provided in <b>Part 14.
            Additional Information.</b></p>

            <p>Location of U.S. Embassy or U.S. Consulate </p>

            <div class="form-group">
                <label class="control-label col-md-5">2.a. City </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_additional_info_city" maxlength="29" value="<?php echo showData('i_485_additional_info_city')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Country </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_additional_info_country" maxlength="29" value="<?php echo showData('i_485_additional_info_country')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Decision (for example, approved, refused, denied,
                withdrawn)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_additional_info_decision_for_example" maxlength="29" value="<?php echo showData('i_485_additional_info_decision_for_example')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">4. Date of Decision (mm/dd/yyyy) </label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="i_485_additional_info_decision_date" maxlength="29" value="<?php echo showData('i_485_additional_info_decision_date')?>" />
                </div>
            </div>
        </div> <!-- right side column end  -->
    </div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input  type="submit" name="next" class="next btn btn-info" value="Next"
		style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
		id="submit_data" />
</fieldset>




<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">

    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 5 of 20</p>
        </b>
    </div>

    <div class="row  mt-3 border-add">
        <div class="col-md-6 container border-add ">
            <div class="bg-info">
                <h4><b>Part 3. Additional Information About You(Continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b>Address History</b></h4>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Provide physical addresses for everywhere you
                    have lived
                    during the last five years, whether inside or outside the United
                    States. Provide your current address first. If you need extra
                    space to complete this section, use the space provided in</span>
            </p>
            <p><b>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Part 14. Additional Information.</span>
                </b>
            </p>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Physical Address 1 (current address)</span>
            </p>
            <div>

                <div>
                    <div class="form-group">
                        <label class="control-label col-md-5">5.a. Street Number and Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_address_history_street_number_name"
                                maxlength="28"
                                value="<?php echo showData('i_485_additional_info_address_history_street_number_name')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-6"><b>5.b. </b> &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_address_history_apt_ste_flr" value="apt"
                                <?php echo (showData('i_485_additional_info_address_history_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_address_history_apt_ste_flr" value="ste"
                                <?php echo (showData('i_485_additional_info_address_history_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_address_history_apt_ste_flr" value="flr"
                                <?php echo (showData('i_485_additional_info_address_history_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.:
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_address_history_flr_value"
                                maxlength="6"
                                value="<?php echo showData('i_485_additional_info_address_history_flr_value')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">5.c. City or Town</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_address_history_city_town" maxlength="20"
                                value="<?= showData('i_485_additional_info_address_history_city_town')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">5.d. State</label>
                        <div class="col-md-7">
                            <select class="form-control" name="i_485_additional_info_address_history_state">
                                <option style="" value="">Select</option>
                                <?php
                                foreach ($allDataCountry as $record) {
                                    if($record->state_code==showData('i_485_additional_info_address_history_state')) $selected = "selected"; else $selected = "";
                                    echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">5.e. ZIP Code </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_address_history_zipcode" maxlength="5"
                                value="<?php echo showData('i_485_additional_info_address_history_zipcode')?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="i_485_additional_info_address_history_province"
                            value="<?php echo showData('i_485_additional_info_address_history_province')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_address_history_postal_code"
                            value="<?php echo showData('i_485_additional_info_address_history_postal_code')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_address_history_country"
                            value="<?php echo showData('i_485_additional_info_address_history_country')?>" />
                    </div>
                </div>
                <p>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Residence</span>
                </p>
                <div class="form-group">
                    <label class="control-label col-md-5">6.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="i_485_additional_info_address_history_residence_date_from"
                            value="<?= showData('i_485_additional_info_address_history_residence_date_from')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="i_485_additional_info_address_history_residence_date_to"
                            value="<?= showData('i_485_additional_info_address_history_residence_date_to')?>" />
                    </div>
                </div>
                <hr>
                <p>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Physical Address 2.</span>
                </p>

            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_additional_info_physical_address2_street_number" maxlength="28"
                        value="<?php echo showData('i_485_additional_info_physical_address2_street_number')?>">
                </div>

            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>7.b. </b> &nbsp;
                    <input type="radio" name="i_485_additional_info_physical_address2_apt_ste_flr"
                        value="apt"
                        <?php echo (showData('i_485_additional_info_physical_address2_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_485_additional_info_physical_address2_apt_ste_flr"
                        value="ste"
                        <?php echo (showData('i_485_additional_info_physical_address2_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_485_additional_info_physical_address2_apt_ste_flr"
                        value="flr"
                        <?php echo (showData('i_485_additional_info_physical_address2_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control"
                        name="i_485_additional_info_physical_address2_flr_value"
                        maxlength="6"
                        value="<?php echo showData('i_485_additional_info_physical_address2_flr_value')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">7.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_additional_info_physical_address2_city_town" maxlength="20"
                        value="<?= showData('i_485_additional_info_physical_address2_city_town')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">7.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_485_additional_info_physical_address2_state">
                        <option style="" value="">Select</option>
                        <?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('i_485_additional_info_physical_address2_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.e. ZIP Code </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_additional_info_physical_address2_zipcode" maxlength="5"
                        value="<?php echo showData('i_485_additional_info_physical_address2_zipcode')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-5">7.f. Province</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_physical_address2_province"
                        value="<?php echo showData('i_485_additional_info_physical_address2_province')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_physical_address2_postalcode"
                        value="<?php echo showData('i_485_additional_info_physical_address2_postalcode')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.h. Country</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_physical_address2_country"
                        value="<?php echo showData('i_485_additional_info_physical_address2_country')?>" />
                </div>
            </div>

            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Residence</span>
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">8.a. From (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_physical_address2_date_from"
                        value="<?= showData('i_485_additional_info_physical_address2_date_from')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8.b. To (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_physical_address2_date_to"
                        value="<?= showData('i_485_additional_info_physical_address2_date_to')?>" />
                </div>
            </div>



        </div>

        <div class="col-md-6 mt-5">

            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Provide your most recent address outside the
                    United States where you lived for more than one year (if not already listed
                    above).</span>
            </p>
            <div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_address_street_number"
                            maxlength="28"
                            value="<?php echo showData('i_485_additional_info_recent_address_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>9.b. </b> &nbsp;
                        <input type="radio" name="i_485_additional_info_recent_address_apt_ste_flr"
                            value="apt"
                            <?php echo (showData('i_485_additional_info_recent_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="i_485_additional_info_recent_address_apt_ste_flr"
                            value="ste"
                            <?php echo (showData('i_485_additional_info_recent_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="i_485_additional_info_recent_address_apt_ste_flr"
                            value="flr"
                            <?php echo (showData('i_485_additional_info_recent_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_address_flr_value"
                            maxlength="6"
                            value="<?php echo showData('i_485_additional_info_recent_address_flr_value')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_address_city_town" maxlength="20"
                            value="<?= showData('i_485_additional_info_recent_address_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="i_485_additional_info_recent_address_state">
                            <option style="" value="">Select</option>
                            <?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('i_485_additional_info_recent_address_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_address_zipcode" maxlength="5"
                            value="<?php echo showData('i_485_additional_info_recent_address_zipcode')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9.f. Province</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_address_province"
                        value="<?php echo showData('i_485_additional_info_recent_address_province')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_address_postalcode"
                        value="<?php echo showData('i_485_additional_info_recent_address_postalcode')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9.h. Country</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_address_country"
                        value="<?php echo showData('i_485_additional_info_recent_address_country')?>" />
                </div>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Residence</span>
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">10.a. From (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_recent_address_date_from"
                        value="<?= showData('i_485_additional_info_recent_address_date_from')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.b. To (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_recent_address_date_to"
                        value="<?= showData('i_485_additional_info_recent_address_date_to')?>" />
                </div>
            </div>


            <div class="bg-info">
                <h4><b>Employment History</b>
                </h4>
            </div>
            <p>Provide your employment history for the last five years.
                whether inside or outside the United States. Provide the most
                recent employment first. If you need extra space to complete
                this section, use the space provided in Part 14. Additional
                Information.</p>
            <p>Employer I (current or most recent)</p>

            <div>

                <div class="form-group">
                    <label class="control-label col-md-5">11. Name of Employer or Company</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="i_485_additional_info_employement_name_employer"
                            value="<?php echo showData('i_485_additional_info_employement_name_employer')?>" />
                    </div>
                </div>
                <p>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Address of Employer or Company</span>
                </p>
                <div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.a. Street Number and Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employement_address_street_number"
                                maxlength="28"
                                value="<?php echo showData('i_485_additional_info_employement_address_street_number')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-6"><b>12.b. </b> &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_employement_address_apt_ste_flr" value="apt"
                                <?php echo (showData('i_485_additional_info_employement_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_employement_address_apt_ste_flr" value="ste"
                                <?php echo (showData('i_485_additional_info_employement_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_employement_address_apt_ste_flr" value="flr"
                                <?php echo (showData('i_485_additional_info_employement_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.:
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employement_address_flr_value"
                                maxlength="6"
                                value="<?php echo showData('i_485_additional_info_employement_address_flr_value')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.c. City or Town</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employement_address_city_town" maxlength="20"
                                value="<?= showData('i_485_additional_info_employement_address_city_town')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.d. State</label>
                        <div class="col-md-7">
                            <select class="form-control" name="i_485_additional_info_employement_address_state">
                                <option style="" value="">Select</option>
                                <?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('i_485_additional_info_employement_address_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.e. ZIP Code </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employement_address_zipcode" maxlength="5"
                                value="<?php echo showData('i_485_additional_info_employement_address_zipcode')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.f. Province</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="i_485_additional_info_employement_address_province"
                                value="<?php echo showData('i_485_additional_info_employement_address_province')?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.g. Postal Code</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="i_485_additional_info_employement_address_postalcode"
                                value="<?php echo showData('i_485_additional_info_employement_address_postalcode')?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">12.h. Country</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="i_485_additional_info_employement_address_country"
                                value="<?php echo showData('i_485_additional_info_employement_address_country')?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">13. Your Occupation</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="i_485_additional_info_employement_your_occupation"
                                value="<?php echo showData('i_485_additional_info_employement_your_occupation')?>" />
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 6 of 20</p>
        </b>
    </div>

    <div class="row  mt-3 border-add">
        <div class="col-md-6 container border-add ">
            <div class="bg-info">
                <h4><b>Part 3. Additional Information About You(Continued)</b></h4>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Employment</span>
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">14.a. From (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_employement_date_from"
                        value="<?= showData('i_485_additional_info_employement_date_from')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.b. To (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_employement_date_to"
                        value="<?= showData('i_485_additional_info_employement_date_to')?>" />
                </div>
            </div>
            <hr>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Employer 2</span>
            </p>
            <div>

                <div class="form-group">
                    <label class="control-label col-md-5">15. Name of Employer or Company</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="i_485_additional_info_employer2_name_of_company"
                            value="<?php echo showData('i_485_additional_info_employer2_name_of_company')?>" />
                    </div>
                </div>
                <p>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Address of Employer or Company</span>
                </p>
                <div>
                    <div class="form-group">
                        <label class="control-label col-md-5">16.a. Street Number and Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employer2_address_of_company"
                                maxlength="28"
                                value="<?php echo showData('i_485_additional_info_employer2_address_of_company')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-6"><b>16.b. </b> &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_employer2_apt_ste_flr" value="apt"
                                <?php echo (showData('i_485_additional_info_employer2_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_employer2_apt_ste_flr" value="ste"
                                <?php echo (showData('i_485_additional_info_employer2_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                            <input type="radio"
                                name="i_485_additional_info_employer2_apt_ste_flr" value="flr"
                                <?php echo (showData('i_485_additional_info_employer2_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.:
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employer2_flr_value"
                                maxlength="6"
                                value="<?php echo showData('i_485_additional_info_employer2_flr_value')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">16.c. City or Town</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employer2_city_town" maxlength="20"
                                value="<?= showData('i_485_additional_info_employer2_city_town')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">16.d. State</label>
                        <div class="col-md-7">
                            <select class="form-control" name="i_485_additional_info_employer2_state">
                                <option style="" value="">Select</option>
                                <?php
                                foreach ($allDataCountry as $record) {
                                    if($record->state_code==showData('i_485_additional_info_employer2_state')) $selected = "selected"; else $selected = "";
                                    echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">16.e. ZIP Code </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control"
                                name="i_485_additional_info_employer2_zipcode" maxlength="5"
                                value="<?php echo showData('i_485_additional_info_employer2_zipcode')?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="i_485_additional_info_employer2_province"
                            value="<?php echo showData('i_485_additional_info_employer2_province')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_employer2_postalcode"
                            value="<?php echo showData('i_485_additional_info_employer2_postalcode')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_employer2_country"
                            value="<?php echo showData('i_485_additional_info_employer2_country')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">17. Your Occupation</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_employer2_occupation"
                            value="<?php echo showData('i_485_additional_info_employer2_occupation')?>" />
                    </div>
                </div>
                <p>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Employment</span>
                </p>
                <div class="form-group">
                    <label class="control-label col-md-5">18.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="i_485_additional_info_employer2_date_from"
                            value="<?= showData('i_485_additional_info_employer2_date_from')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">18.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="i_485_additional_info_employer2_date_to"
                            value="<?= showData('i_485_additional_info_employer2_date_to')?>" />
                    </div>
                </div>
                <p>
                    <span class="fs-6 fw-bold "></span> <span class="font-2xl">Provide your most recent employment
                        outside of the United States (if not already listed above).</span>
                </p>
                <div class="form-group">
                    <label class="control-label col-md-5">19. Name of Employer or Company</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="i_485_additional_info_recent_employment_company_name"
                            value="<?php echo showData('i_485_additional_info_recent_employment_company_name')?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">

            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Address of Employer or Company</span>
            </p>
            <div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_employment_street_number"
                            maxlength="28"
                            value="<?php echo showData('i_485_additional_info_recent_employment_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>20.b. </b> &nbsp;
                        <input type="radio" name="i_485_additional_info_recent_employment_apt_ste_flr"
                            value="apt"
                            <?php echo (showData('i_485_additional_info_recent_employment_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="i_485_additional_info_recent_employment_apt_ste_flr"
                            value="ste"
                            <?php echo (showData('i_485_additional_info_recent_employment_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="i_485_additional_info_recent_employment_apt_ste_flr"
                            value="flr"
                            <?php echo (showData('i_485_additional_info_recent_employment_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_employment_flr_value"
                            maxlength="6"
                            value="<?php echo showData('i_485_additional_info_recent_employment_flr_value')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_employment_city_town" maxlength="20"
                            value="<?= showData('i_485_additional_info_recent_employment_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="i_485_additional_info_recent_employment_state">
                            <option style="" value="">Select</option>
                            <?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('i_485_additional_info_recent_employment_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_additional_info_recent_employment_zipcode" maxlength="5"
                            value="<?php echo showData('i_485_additional_info_recent_employment_zipcode')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">20.f. Province</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_employment_province"
                        value="<?php echo showData('i_485_additional_info_recent_employment_province')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">20.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_employment_postalcode"
                        value="<?php echo showData('i_485_additional_info_recent_employment_postalcode')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">20.h. Country</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_employment_country"
                        value="<?php echo showData('i_485_additional_info_recent_employment_country')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">21. Your Occupation</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_485_additional_info_recent_employment_occupation"
                        value="<?php echo showData('i_485_additional_info_recent_employment_occupation')?>" />
                </div>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Employment</span>
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">22.a. From (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_recent_employment_date_from"
                        value="<?= showData('i_485_additional_info_recent_employment_date_from')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">22.b. To (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_additional_info_recent_employment_date_to"
                        value="<?= showData('i_485_additional_info_recent_employment_date_to')?>" />
                </div>
            </div>


            <div class="bg-info">
                <h4><b>Part 4. Information About Your Parents</b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Information About Your Parent 1</i></b>
                </h4>
            </div>
            <p>Parent 1's Legal Name</p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_parents1_info_family_lastname" maxlength="29"
                        value="<?php echo showData('i_485_parents1_info_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_parents1_info_given_firstname" maxlength="29"
                        value="<?php echo showData('i_485_parents1_info_given_firstname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_parents1_info_middlename" maxlength="29"
                        value="<?php echo showData('i_485_parents1_info_middlename')?>" />
                </div>
            </div>
            <p><b>Parent 1's Name at Birth (if different than above) </b></p>
            <div class="form-group">
                <label class="control-label col-md-5">2.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_parents1_info_at_birth_family_lastname" maxlength="29"
                        value="<?php echo showData('i_485_parents1_info_at_birth_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_parents1_info_at_birth_given_firstname" maxlength="29"
                        value="<?php echo showData('i_485_parents1_info_at_birth_given_firstname')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_485_parents1_info_at_birth_middlename" maxlength="29"
                        value="<?php echo showData('i_485_parents1_info_at_birth_middlename')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="i_485_parents1_info_date_of_birth"
                        value="<?= showData('i_485_parents1_info_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4. Sex</label>
                <div class="col-md-7 ">
                    <div class="margin">
                        <div class="form-check ">
                            <input type="radio" class="form-check-input" name="i_485_parents1_info_gender"
                                value="male"
                                <?php echo (showData('i_485_parents1_info_gender')=='male') ? 'checked':''?>>
                            <label class="form-check-label" for="spouse">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="i_485_parents1_info_gender"
                                value="female"
                                <?php echo (showData('i_485_parents1_info_gender')=='female') ? 'checked':''?>>
                            <label class="form-check-label" for="parent">Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="control-label col-md-5">5. City or Town of Birth</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_parents1_info_city_town_of_birth"
                            maxlength="28"
                            value="<?php echo showData('i_485_parents1_info_city_town_of_birth')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6. Country of Birth</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="i_485_parents1_info_country_of_birth"
                            maxlength="28"
                            value="<?php echo showData('i_485_parents1_info_country_of_birth')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 07 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 07 of 20</p>
            </b>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4 class="heading-md "><b>Part 4. Additional Information About You
                        (Continued)
                    </b>
                </h4>
            </div>
            <div>
                <div>
                    <label>7. Current City or Town of Residence (if living):</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_parents1_info_current_city_of_residence" value="<?php echo showData('i_485_parents1_info_current_city_of_residence')?>"><br>

                    <label>8. Current Country of Residence (if living):</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_parents1_info_current_country_of_residence" value="<?php echo showData('i_485_parents1_info_current_country_of_residence')?>">
                </div>
                <div class="bg-info">
                    <h4 class="heading-md "><b><i>Information About Your Parent 2 </i>
                        </b>
                    </h4>
                </div>
            </div>

            <div>
                <label>Parent 2's Legal Name:</label><br>
                <label>9.a. Family Name (Last Name):</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_legal_lastname" value="<?php echo showData('i_485_parents2_info_legal_lastname')?>"><br>

                <label>9.b. Given Name (First Name):</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_legal_given_firstname" value="<?php echo showData('i_485_parents2_info_legal_given_firstname')?>"><br>

                <label>9.c. Middle Name:</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_legal_middlename" 
                value="<?php echo showData('i_485_parents2_info_legal_middlename')?>"><br>

                <label>Parent 2's Name at Birth (if different than above):</label><br>
                <label>10.a. Family Name (Last Name):</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_at_birth_family_lastname" value="<?php echo showData('i_485_parents2_info_at_birth_family_lastname')?>"><br>

                <label>10.b. Given Name (First Name):</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_at_birth_given_name" value="<?php echo showData('i_485_parents2_info_at_birth_given_name')?>"><br>

                <label>10.c. Middle Name:</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_at_birth_middlename" value="<?php echo showData('i_485_parents2_info_at_birth_middlename')?>"><br>

                <label>11. Date of Birth (mm/dd/yyyy):</label><br>
                <input type="date" class="form-control" name="i_485_parents2_info_date_of_birth" value="<?php echo showData('i_485_parents2_info_date_of_birth')?>"><br>
                <label>12. Sex:</label>
                <input type="radio" name="i_485_parents2_info_gender" value="male" <?php echo (showData('i_485_parents2_info_gender')=='male') ? 'checked':''?>> Male
                <input type="radio" name="i_485_parents2_info_gender" value="female" <?php echo (showData('i_485_parents2_info_gender')=='female') ? 'checked':''?>> Female <br>

                <label>13. City or Town of Birth:</label><br>
                <input type="text" maxlength="20" class="form-control" name="i_485_parents2_info_city_town_birth" value="<?php echo showData('i_485_parents2_info_city_town_birth')?>"><br>

                <label>14. Country of Birth:</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_country_of_birth" value="<?php echo showData('i_485_parents2_info_country_of_birth')?>"><br>

                <label>15. Current City or Town of Residence (if living):</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_city_town_residence" value="<?php echo showData('i_485_parents2_info_city_town_residence')?>"><br>

                <label>16. Current Country of Residence (if living):</label><br>
                <input type="text" maxlength="29" class="form-control" name="i_485_parents2_info_city_country_of_residence" value="<?php echo showData('i_485_parents2_info_city_country_of_residence')?>"><br>
            </div>
            <h4 class="bg-info"><b>Part 5. Information About Your Marital History</b></h4>

            <div>
                <div class="form-group">
                    <label>1. What is your current marital status?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_marital_status"
                            value="single" <?php echo (showData('i_485_info_about_current_marital_status')=='single') ? 'checked':''?>>
                        <label class="form-check-label" for="marital-single">Single, Never Married</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_marital_status"
                            value="married" <?php echo (showData('i_485_info_about_current_marital_status')=='married') ? 'checked':''?>>
                        <label class="form-check-label" for="marital-married">Married</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_marital_status"
                            value="divorced" <?php echo (showData('i_485_info_about_current_marital_status')=='divorced') ? 'checked':''?>>
                        <label class="form-check-label" for="marital-divorced">Divorcee</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_marital_status" 
                            value="widowed" <?php echo (showData('i_485_info_about_current_marital_status')=='widowed') ? 'checked':''?>>
                        <label class="form-check-label" for="marital-widowed">Widowed</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_marital_status"
                            value="annulled" <?php echo (showData('i_485_info_about_current_marital_status')=='annulled') ? 'checked':''?>>
                        <label class="form-check-label" for="marital-annulled">Marriage Annulled</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_marital_status"
                            value="separated" <?php echo (showData('i_485_info_about_current_marital_status')=='separated') ? 'checked':''?>>
                        <label class="form-check-label" for="marital-separated">Legally Separated</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>2. If you are married, is your spouse a current member of the U.S. armed forces or U.S. Coast
                        Guard?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_spouse_is_armed_force"
                            value="na" <?php echo (showData('i_485_info_about_current_spouse_is_armed_force')=='na') ? 'checked':''?>>
                        <label class="form-check-label" for="spouse-military-na">N/A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_spouse_is_armed_force" 
                            value="yes" <?php echo (showData('i_485_info_about_current_spouse_is_armed_force')=='yes') ? 'checked':''?>>
                        <label class="form-check-label" for="spouse-military-yes">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="i_485_info_about_current_spouse_is_armed_force" 
                            value="no" <?php echo (showData('i_485_info_about_current_spouse_is_armed_force')=='no') ? 'checked':''?>>
                        <label class="form-check-label" for="spouse-military-no">No</label>
                    </div>
                </div>
            </div>
        </div>
            <!-- *************************************
            *****************left side done ******************
            ******************************************-->
        <div class="col-md-6">
            <div class="form-group">
                <label>3. How many times have you been married (including annulled marriages and marriages to the same
                    person)?</label>
                <input type="number" class="form-control" name="i_485_info_about_current_spouse_how_many_time_marriage" value="<?php echo showData('i_485_info_about_current_spouse_how_many_time_marriage')?>">
            </div>

            <h4 class="bg-info" style="padding:7px"> <b><i>Information About Your Current Marriage
                        (including if you are legally separated)</i></b></h4>
            <p>If you are currently married, provide the following
                information about your current spouse. <br> <br>
                Current Spouse's Legal Name</p>

            <div class="form-group">
                <label for="family-name">4.a. Family Name (Last Name)</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_family_lastname" value="<?php echo showData('i_485_info_about_marriage_current_spouse_family_lastname')?>">
            </div>
            <div class="form-group">
                <label for="given-name">4.b. Given Name (First Name)</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_given_firstname" value="<?php echo showData('i_485_info_about_marriage_current_spouse_given_firstname')?>">
            </div>
            <div class="form-group">
                <label for="middle-name">4.c. Middle Name</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_middlename" value="<?php echo showData('i_485_info_about_marriage_current_spouse_middlename')?>">
            </div>
            <div class="form-group">
                <label for="a-number">5. A-Number (if any)</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_a_number" value="<?php echo showData('i_485_info_about_marriage_current_spouse_a_number')?>">
            </div>
            <div class="form-group">
                <label for="spouse-dob">6. Current Spouse's Date of Birth (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_485_info_about_marriage_current_spouse_date_of_birth" value="<?php echo showData('i_485_info_about_marriage_current_spouse_date_of_birth')?>">
            </div>
            <div class="form-group">
                <label for="date-of-marriage">7. Date of Marriage to Current Spouse (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_485_info_about_marriage_current_spouse_date_of_marriage" value="<?php echo showData('i_485_info_about_marriage_current_spouse_date_of_marriage')?>">
            </div>

            <p>Current Spouse's Place of Birth</p>

            <div class="form-group">
                <label>8.a. City or Town </label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_birth_city_town" value="<?php echo showData('i_485_info_about_marriage_current_spouse_birth_city_town')?>">
            </div>
            <div class="form-group">
                <label>8.b. State or Province </label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_birth_province" value="<?php echo showData('i_485_info_about_marriage_current_spouse_birth_province')?>">
            </div>
            <div class="form-group">
                <label>8.c. Country </label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_marriage_current_spouse_birth_country" value="<?php echo showData('i_485_info_about_marriage_current_spouse_birth_country')?>">
            </div>
            
            <p>Place of Marriage to Current Spouse</p>
            <div class="form-group">
                <label>9.a. City or Town </label>
                <input type="text"  maxlength="29" class="form-control" name="i_485_info_about_current_spouse_mariage_place_city_town" value="<?php echo showData('i_485_info_about_current_spouse_mariage_place_city_town')?>">
            </div>
            <div class="form-group">
                <label>9.b. State or Province </label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_current_spouse_mariage_place_province" value="<?php echo showData('i_485_info_about_current_spouse_mariage_place_province')?>">
            </div>
            <div class="form-group">
                <label>9.c. Country </label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_current_spouse_mariage_place_country" value="<?php echo showData('i_485_info_about_current_spouse_mariage_place_country')?>">
            </div>
            <div class="form-group">
                <label>10. Is your current spouse applying with you?</label>
                <?php echo createRadio("i_485_info_about_current_spouse_applying_with_you")?>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>




<!----------------------------------------------------------------------
-------------------------------- page 08 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 08 of 20</p>
            </b>
        </div>
    </div>
    <div class="row  mt-3 border-add">

        <section class="col-md-6 mt-5">
            <div class="bg-info">
                <h4 class="heading-md "><b>Part 5. Information About Your Marital History
                        (continued)
                    </b>
                </h4>
            </div>

            <p class="bg-info"> <i>Information About Prior Marriages (if any)
                </i></p>
            <p>If you have been married before, whether in the United States
                or in any other country, provide the following information
                about your prior spouse. If you have had more than one
                previous marriage, use the space provided in Part 14.
                Additional Information to provide the information below.
                Prior Spouse's Legal Name (provide family name before
                marriage)
            </p>
            <!-- Name Information -->

            <section>

                <label>11.a. Family Name (Last Name):</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_prior_spouse_family_lastname" value="<?php echo showData('i_485_info_about_prior_spouse_family_lastname')?>"><br>

                    <label>11.b. Given Name (First Name):</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_prior_spouse_given_firstname" value="<?php echo showData('i_485_info_about_prior_spouse_given_firstname')?>"><br>

                    <label>11.c. Middle Name:</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_prior_spouse_middlename" value="<?php echo showData('i_485_info_about_prior_spouse_middlename')?>"><br>

                    <label>12. Prior Spouse's Date of Birth:</label><br>
                    <input type="date" class="form-control" name="i_485_info_about_prior_spouse_date_of_birth" value="<?php echo showData('i_485_info_about_prior_spouse_date_of_birth')?>"><br>

                    <label>13. Date of Marriage to Prior Spouse:</label><br>
                    <input type="date" class="form-control" name="i_485_info_about_prior_spouse_date_of_marriage" value="<?php echo showData('i_485_info_about_prior_spouse_date_of_marriage')?>"><br>

                    <label>Place of Marriage to Prior Spouse:</label><br>
                    <label>14.a. City or Town:</label><br>
                    <input type="text" maxlength="29"  class="form-control" name="i_485_info_about_prior_spouse_place_of_marriage" value="<?php echo showData('i_485_info_about_prior_spouse_place_of_marriage')?>"><br>
                    <label>14.b. State or Province:</label><br>
                    <input type="text" maxlength="29"  class="form-control" name="i_485_info_about_prior_spouse_state_province" value="<?php echo showData('i_485_info_about_prior_spouse_state_province')?>"><br>
                    <label>14.c. Country:</label><br>
                    <input type="text" maxlength="29"  class="form-control" name="i_485_info_about_prior_spouse_country" value="<?php echo showData('i_485_info_about_prior_spouse_country')?>"><br>

                    <label>15. Date Marriage with Prior Spouse Legally Ended:</label><br>
                    <input type="date"  class="form-control" name="i_485_info_about_prior_spouse_marriage_end_date" value="<?php echo showData('i_485_info_about_prior_spouse_marriage_end_date')?>"><br>
                    <label>Place Where Marriage with Prior Spouse Legally Ended:</label><br>
                    <label>16.a. City or Town:</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_prior_spouse_marriage_end_place" value="<?php echo showData('i_485_info_about_prior_spouse_marriage_end_place')?>"><br>
                    <label>16.b. State or Province:</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_prior_spouse_marriage_end_state_province" value="<?php echo showData('i_485_info_about_prior_spouse_marriage_end_state_province')?>"><br>
                    <label>16.c. Country:</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_prior_spouse_marriage_end_country" value="<?php echo showData('i_485_info_about_prior_spouse_marriage_end_country')?>"><br>

            </section>
        </section>   
        <!-- *************************************
        *****************left side done ******************
        ******************************************-->
        <section class="col-md-6 mt-5">
            <h4 class="bg-info" style="padding:7px" <b>Part 6. Information About Your Children</b></h4>
            <div>
                <label>1. Indicate the total number of ALL living children (including adult sons and daughters) that you
                    have.</label><br>
                <strong>Note:</strong><br>
                The term "children" includes all biological or legally adopted children, as well as current stepchildren
                of any age, whether born in the United States or other countries, married or unmarried, living with you
                or elsewhere and includes any missing children and those born to you outside of marriage.
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child_number_of_living_child" value="<?php echo showData('i_485_info_about_child_number_of_living_child')?>">

                <p>Provide the following information for each of your children.
                    If you have more than three children, use the space provided in
                    <b>Part 14. Additional Information.</b> <br>
                    Child 1 <br>
                    Current Legal Name <br>
                </p>


                <div>


                    <label>2.a. Family Name (Last Name):</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child1_curent_legal_family_lastname" 
                    value="<?php echo showData('i_485_info_about_child1_curent_legal_family_lastname')?>"><br>

                    <label>2.b. Given Name (First Name):</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child1_curent_legal_given_firstname" 
                    value="<?php echo showData('i_485_info_about_child1_curent_legal_given_firstname')?>"><br>

                    <label>2.c. Middle Name:</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child1_curent_legal_middlename" 
                    value="<?php echo showData('i_485_info_about_child1_curent_legal_middlename')?>"><br>

                    <label>3. A-Number (if any):</label><br>

                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child1_a_number" value="<?php echo showData('i_485_info_about_child1_a_number')?>"><br>

                    <label>4. Date of Birth (mm/dd/yyyy):</label><br>
                    <input type="date" class="form-control" name="i_485_info_about_child1_date_of_birth" value="<?php echo showData('i_485_info_about_child1_date_of_birth')?>"><br>

                    <label>5. Country of Birth:</label><br>
                    <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child1_country_of_birth" value="<?php echo showData('i_485_info_about_child1_country_of_birth')?>"><br>

                    <span><label>6. Is this child applying with you?</label><br>
                        <div class="col-md-6 col-md-offset-2">
                            <?php echo createRadio("i_485_info_about_child1_applying_with")?>
                        </div>
                        <hr>
                        <p>
                            <b>Child 2</b>
                        </p>

                        <div>
                            <label>Current Legal Name</label><br>
                            <label>7.a. Family Name (Last Name):</label><br>
                            <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child2_curent_legal_family_lastname" value="<?php echo showData('i_485_info_about_child2_curent_legal_family_lastname')?>"><br>

                            <label>7.b. Given Name (First Name):</label><br>
                            <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child2_curent_legal_given_firstname" value="<?php echo showData('i_485_info_about_child2_curent_legal_given_firstname')?>"><br>

                            <label>7.c. Middle Name:</label><br>
                            <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child2_curent_legal_middlename" value="<?php echo showData('i_485_info_about_child2_curent_legal_middlename')?>"><br>

                            <label>8. A-Number (if any):</label><br>

                            <input type="text" maxlength="9" class="form-control" name="i_485_info_about_child2_a_number" value="<?php echo showData('i_485_info_about_child2_a_number')?>"><br>

                            <label>9. Date of Birth (mm/dd/yyyy):</label><br>
                            <input type="date" class="form-control" name="i_485_info_about_child2_date_of_birth" value="<?php echo showData('i_485_info_about_child2_date_of_birth')?>"><br>

                            <label>10. Country of Birth:</label><br>
                            <input type="text" maxlength="38" class="form-control" name="i_485_info_about_child2_country_of_birth" value="<?php echo showData('i_485_info_about_child2_country_of_birth')?>"><br>

                            <label>11. Is this child applying with you?</label><br>
                            <div class="col-md-6 col-md-offset-2">
                                <?php echo createRadio("i_485_info_about_child2_applying_with")?>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<!----------------------------------------------------------------------
-------------------------------- page 09 --------------------------------
------------------------------------------------------------------------>


<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 09 of 20</p>
            </b>
        </div>
    </div>
    <div class="row  mt-3 border-add">
        <div class="col-md-6 mt-5">
            <div class="bg-info">
                <h4 class="heading-md"><b>Part 6. Information About Your Children
                        (continued) </b>
                </h4>
            </div>
            <!-- Name Information -->
            <p>child 3</p>
            <div class="form-group">
                <label>12.a. Family Name (Last Name)</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child3_curent_legal_family_lastname" value="<?php echo showData('i_485_info_about_child3_curent_legal_family_lastname')?>">
            </div>
            <div class="form-group">
                <label>12.b. Given Name (First Name)</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child3_curent_legal_given_firstname" value="<?php echo showData('i_485_info_about_child3_curent_legal_given_firstname')?>">
            </div>
            <div class="form-group">
                <label>12.c. Middle Name</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child3_curent_legal_middlename" value="<?php echo showData('i_485_info_about_child3_curent_legal_middlename')?>">
            </div>

            <!-- A-Number -->
            <div class="form-group">
                <label>13. A-Number (if any)</label>
                <input type="text" maxlength="9" class="form-control" name="i_485_info_about_child3_a_number" value="<?php echo showData('i_485_info_about_child3_a_number')?>">
            </div>

            <!-- Date of Birth -->
            <div class="form-group">
                <label>14. Date of Birth (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_485_info_about_child3_date_of_birth" value="<?php echo showData('i_485_info_about_child3_date_of_birth')?>">
            </div>

            <!-- Country of Birth -->
            <div class="form-group">
                <label>15. Country of Birth</label>
                <input type="text" maxlength="29" class="form-control" name="i_485_info_about_child3_country_of_birth" value="<?php echo showData('i_485_info_about_child3_country_of_birth')?>">
            </div>

            <!-- Child Application -->
            <div class="form-group">
                <label>16. Is this child applying with you?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_info_about_child3_applying_with")?>
                </div>
            </div>
            <h4 class="bg-info" style="padding:7px"><b>Part 7. Biographic Information
                </b></h4>

            <div class="form-group">
                <label>1. Ethnicity (Select only one box)</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="i_485_biographic_info_ethnicity" value="hispanic" <?php echo (showData('i_485_biographic_info_ethnicity')=='hispanic') ? 'checked':''?>>
                    <label class="form-check-label">Hispanic or Latino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="i_485_biographic_info_ethnicity" value="nothispanic" <?php echo (showData('i_485_biographic_info_ethnicity')=='nothispanic') ? 'checked':''?>>
                    <label class="form-check-label">Not Hispanic or Latino</label>
                </div>
            </div>

            <!-- Race -->
            <div class="form-group">
                <label>2. Race (Select all applicable boxes)</label>
                <div class="form-check">
                    <?php echo createCheckbox("i_485_biographic_info_race_white")?>
                    <label class="form-check-label">White</label>
                </div>
                <div class="form-check">
                    <?php echo createCheckbox("i_485_biographic_info_race_asian")?>
                    <label class="form-check-label">Asian</label>
                </div>
                <div class="form-check">
                     <?php echo createCheckbox("i_485_biographic_info_race_black_african")?>
                    <label class="form-check-label">Black or African American</label>
                </div>
                <div class="form-check">
                    <?php echo createCheckbox("i_485_biographic_info_race_american_native")?>
                    <label class="form-check-label">American Indian or Alaska Native</label>
                </div>
                <div class="form-check">
                     <?php echo createCheckbox("i_485_biographic_info_race_native_islander")?>
                    <label class="form-check-label">Native Hawaiian or Other Pacific Islander</label>
                </div>
            </div>
            <div class="form-group">
                <label>3.Height</label>
                <label style="padding-left:10%">Feet:</label>
                <select id="feet" name="i_485_biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <?php echo"<option value=".showData('i_485_biographic_info_height_feet')." selected>".showData('i_485_biographic_info_height_feet')."</option>";?>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
                <label>Inches:</label>
                <select id="inches" name="i_485_biographic_info_height_inches" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                    <?php echo"<option value=".showData('i_485_biographic_info_height_inches')." selected>".showData('i_485_biographic_info_height_inches')."</option>";?>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                </select>
            </div>

            <div>
                <span><b>4.Weight</b></span>
                <span style="padding-left:10%"><b> Pounds:</b></span>

                <input type="text" maxlength="1" name="i_485_biographic_info_weight_in_pound1" value="<?php echo showData('i_485_biographic_info_weight_in_pound1')?>"
                    style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                <input type="text" maxlength="1" name="i_485_biographic_info_weight_in_pound2" value="<?php echo showData('i_485_biographic_info_weight_in_pound2')?>"
                    style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                <input type="text" maxlength="1" name="i_485_biographic_info_weight_in_pound3" value="<?php echo showData('i_485_biographic_info_weight_in_pound3')?>"
                    style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <br>
            <div>
                <label>5. Eye Color (Select only one box ) </label><br>
                <input type="radio"  name="i_485_biographic_info_eye_color" value="black" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='black') ? 'checked':''?>> Black<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="blue" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='blue') ? 'checked':''?>> Blue<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="brown" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='brown') ? 'checked':''?>> Brown<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="gray" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='gray') ? 'checked':''?>> Gray<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="green" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='green') ? 'checked':''?>> Green<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="hazel"
                <?php echo (showData('i_485_biographic_info_eye_color')=='hazel') ? 'checked':''?>> Hazel<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="maroon" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='maroon') ? 'checked':''?>> Maroon<br>

                <input type="radio"  name="i_485_biographic_info_eye_color" value="pink" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='pink') ? 'checked':''?>> Pink<br>
                
                <input type="radio" name="i_485_biographic_info_eye_color" value="unknown" 
                <?php echo (showData('i_485_biographic_info_eye_color')=='unknown') ? 'checked':''?>> Unknown/Other<br>
                <br>

                <label>6. Hair Color (Select only one box )</label><br>
                <input type="radio"  name="i_485_biographic_info_hair_color" value="bald" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='bald') ? 'checked':''?>> Bald (No hair)<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="black" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='black') ? 'checked':''?>> Black<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="blond" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='blond') ? 'checked':''?>> Blond<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="brown" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='brown') ? 'checked':''?>> Brown<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="gray" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='gray') ? 'checked':''?>> Gray<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="red" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='red') ? 'checked':''?>> Red<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="sandy" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='sandy') ? 'checked':''?>> Sandy<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="white" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='white') ? 'checked':''?>> White<br>

                <input type="radio" name="i_485_biographic_info_hair_color" value="unknown" 
                <?php echo (showData('i_485_biographic_info_hair_color')=='unknown') ? 'checked':''?>> Unknown/Other<br>
            </div>
            <div>

            </div>

        </div>
            <!-- *************************************
            *****************left side done ******************
            ******************************************-->
        <div class="col-md-6 mt-5">
            <h4 class="bg-info" style="padding:7px">Part 8. General Eligibility and Inadmissibility
                Grounds</h4>
            <section>
                <div class="form-group">
                    <label class="col-md-12">1. Have you EVER been a member of, involved in, or in any
                        way associated with any organization, association, fund,
                        foundation, party, club, society, or similar group in the
                        United States or in any other location in the world
                        including any military service?</label>
                    <div class="col-md-6 col-md-offset-2">
                        <?php echo createRadio("i_485_general_eligibility_military_status")?>
                    </div>
                </div>
                <p>
                    <b> If you answered "Yes" to Item Number 1., complete Item
                        Numbers 2. - 13.b. below. If you need extra space to complete
                        this section, use the space provided in Part 14. Additional
                        Information. If you answered "No," but are unsure of your
                        answer, provide an explanation of the events and circumstances
                        in the space provided in Part 14. Additional Information. </b><br>

                    Organization 1
                    <br>
                </p>


                <!-- Organization Information -->
                <div class="form-group">
                    <label>2. Name of Organization (optional)</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org1_name" value="<?php echo showData('i_485_general_eligibility_org1_name')?>">
                </div>
                <div class="form-group">
                    <label>3.a. City or Town</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org1_city_town" value="<?php echo showData('i_485_general_eligibility_org1_city_town')?>">
                </div>
                <div class="form-group">
                    <label>3.b. State or Province</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org1_state_province" value="<?php echo showData('i_485_general_eligibility_org1_state_province')?>">
                </div>
                <div class="form-group">
                    <label>3.c. Country</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org1_country" value="<?php echo showData('i_485_general_eligibility_org1_country')?>">
                </div>
                <div class="form-group">
                    <label>4. Nature of Group</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org1_nature_group" value="<?php echo showData('i_485_general_eligibility_org1_nature_group')?>">
                </div>

                <!-- Dates of Membership or Involvement -->
                <p>Dates of Membership or Dates of Involvement</p> <br>
                <div class="form-group">
                    <label>5.a. From (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_485_general_eligibility_org1_date_from" value="<?php echo showData('i_485_general_eligibility_org1_date_from')?>">
                </div>
                <div class="form-group">
                    <label for="endDate">5.b. To (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_485_general_eligibility_org1_date_to" value="<?php echo showData('i_485_general_eligibility_org1_date_to')?>">
                </div>
                <hr>
                <p>Organization 2</p> <br>

                <div class="form-group">
                    <label>6. Name of Organization</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org2_name" value="<?php echo showData('i_485_general_eligibility_org2_name')?>">
                </div>
                <div class="form-group">
                    <label>7.a. City or Town</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org2_city_town" value="<?php echo showData('i_485_general_eligibility_org2_city_town')?>">
                </div>
                <div class="form-group">
                    <label>7.b. State or Province</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org2_state_province" value="<?php echo showData('i_485_general_eligibility_org2_state_province')?>">
                </div>
                <div class="form-group">
                    <label>7.c. Country</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org2_country" value="<?php echo showData('i_485_general_eligibility_org2_country')?>">
                </div>
                <div class="form-group">
                    <label>8. Nature of Group</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org2_nature_group" value="<?php echo showData('i_485_general_eligibility_org2_nature_group')?>">
                </div>
            </section>
        </div>

    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<!----------------------------------------------------------------------
-------------------------------- page 10 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 10 of 20</p>
            </b>
        </div>
    </div>
    <div class="row  mt-3 border-add">
        <div class="col-md-6 mt-5">
            <div class="bg-info">
                <h4 class="heading-md "><b>Part 8. General Eligibility and Inadmissibility
                        Grounds </b>(continued)
                </h4>
            </div>


            <div>

                <div class="form-group">
                    <label>9.a. From (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_485_general_eligibility_org2_date_from" value="<?php echo showData('i_485_general_eligibility_org2_date_from')?>">
                </div>
                <div class="form-group">
                    <label>9.b. To (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_485_general_eligibility_org2_date_to" value="<?php echo showData('i_485_general_eligibility_org2_date_to')?>">
                </div>
                <hr>
                <p>Organization 3
                </p> <br>
                <div class="form-group">
                    <label>10. Name of Organization</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org3_name" value="<?php echo showData('i_485_general_eligibility_org3_name')?>">
                </div>
                <div class="form-group">
                    <label>11.a. City or Town</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org3_city_town" value="<?php echo showData('i_485_general_eligibility_org3_city_town')?>">
                </div>
                <div class="form-group">
                    <label>11.b. State or Province</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org3_state_province" value="<?php echo showData('i_485_general_eligibility_org3_state_province')?>">
                </div>
                <div class="form-group">
                    <label>11.c. Country</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org3_country" value="<?php echo showData('i_485_general_eligibility_org3_country')?>">
                </div>
                <div class="form-group">
                    <label>12. Nature of Group</label>
                    <input type="text" maxlength="29" class="form-control" name="i_485_general_eligibility_org3_nature_group" value="<?php echo showData('i_485_general_eligibility_org3_nature_group')?>">
                </div>

                <!-- Dates of Membership or Involvement -->
                <p>Dates of Membership or Dates of Involvement</p><br>
                <div class="form-group">
                    <label>13. From (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_485_general_eligibility_org3_date_from" value="<?php echo showData('i_485_general_eligibility_org3_date_from')?>">
                </div>
                <div class="form-group">
                    <label>13.b. To (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_485_general_eligibility_org3_date_to" value="<?php echo showData('i_485_general_eligibility_org3_date_to')?>">
                </div>
            </div>
            <p>Answer Item Numbers 14. - 86.b. Choose the answer that
                you think is correct. If you answer "Yes" to any questions (or
                if you answer "No," but are unsure of your answer),
                provide in explanation of the events and circumstances in the
                space provided in Part 14. Additional Information.</p> <br>

            <div class="form-group">
                <label class="col-md-12">14. Have you EVER been denied admission to the United States?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_14_denied_admission_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">15. Have you EVER been denied a visa to the United States?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_15_denied_visa_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">16. Have you EVER worked in the United States without authorization?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_16_work_authorization_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">17. Have you EVER violated the terms or conditions of your nonimmigrant
                    status?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_17_violeted_terms_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">18. Are you presently or have you EVER been in removal, exclusion, rescission,
                    or deportation proceedings?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_18_present_deportion_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">19. Have you EVER been issued a final order of exclusion, deportation, or
                    removal?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_19_final_order_exclution_status")?>
                </div>
            </div>
        </div>
            <!-- *************************************
            *****************left side done ******************
            ******************************************-->
        <div class="col-md-6 mt-5">
            <div class="form-group">
                <label class="col-md-12">20. Have you EVER had a prior final order of exclusion, deportation, or removal
                    reinstated?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_20_prior_final_order_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">21. Have you EVER held lawful permanent resident status which was later
                    rescinded?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_21_lawful_permanent_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">22. Have you EVER been granted voluntary departure by an immigration officer or
                    an immigration judge but failed to depart within the allotted time?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_22_voluntary_departure_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">23. Have you EVER applied for any kind of relief or protection from removal,
                    exclusion, or deportation?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_23_relief_protection_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">24.a. Have you EVER been a J nonimmigrant exchange visitor who was subject to
                    the two-year foreign residence requirement?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_24a_nonimmigrant_exchange_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">If you answered "Yes" to Item Number 24.a., complete Item Numbers 24.b. - 24.c.
                    If you answered "No" to Item Number 24.a., skip to Item Number 25</label>
            </div>

            <div class="form-group">
                <label class="col-md-12">24.b. Have you complied with the foreign residence requirement?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_2ba_complied_foreign_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">24.c. Have you been granted a waiver or has Department of State issued a
                    favorable waiver recommendation letter for you?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_24c_granted_waiver_status")?>
                </div>
            </div>


            <h4 class="bg-info" style="padding:7px">Criminal Acts and Violations</h4>
            <p>For Item Numbers 25. - 45., you must answer "Yes" to any
                question that applies to you, even if your records were sealed or
                otherwise cleared, or even if anyone, including a judge, law
                enforcement officer, or attorney, told you that you no longer
                have a record. You must also answer "Yes" to the following
                questions whether the action or offense occurred here in the
                United States or anywhere else in the world. If you answer
                "Yes" to Item Numbers 25. - 45., use the space provided in
                Part 14. Additional Information to provide an explanation
                that includes why you were arrested, cited, detained, or charged;
                where you were arrested, cited, detained, or charged; when
                (date) the event occurred; and the outcome or disposition (fo
                example, no charges filed, charges dismissed, jail, probation,
                community service).</p>
            <br>
            <div class="form-group">
                <label class="col-md-12">25. Have you EVER been arrested, cited, charged, or detained for any reason by
                    any law enforcement official (including but not limited to any U.S. immigration official or any
                    official of the U.S. armed forces or U.S. Coast Guard)?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_25_granted_waiver_status")?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12">26. Have you EVER committed a crime of any kind (even if you were not arrested,
                    cited, charged with, or tried for that crime)?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_26_comitted_crime_status")?>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>



<!----------------------------------------------------------------------
-------------------------------- page 11 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 11 of 20</p>
            </b>
        </div>


    </div>
    <div class="row  mt-3 border-add">

        <div class="col-md-6 mt-5">
            <div class="bg-info">
                <h4 class="heading-md "><b>Part 8. General Eligibility and Inadmissibility
                        Grounds </b>(continued)
                </h4>
            </div>
            <div class="form-group">
                <label class="col-md-12">27. Have you EVER pled guilty to or been convicted of a
                    crime or offense (even if the violation was subsequently
                    expunged or sealed by a court, or if you were granted a
                    pardon, amnesty, a rehabilitation decree, or other act of
                    clemency)?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_27_pled_guilty_status")?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">28 <span class="ps-5"></span> .Have you EVER been ordered
                    punished by a judge or had
                    conditions imposed on you that restrained your liberty
                    (such as a prison sentence, suspended sentence, house
                    arrest, parole, alternative sentencing, drug or alcohol
                    treatment, rehabilitative programs or classes, probation, or
                    community service)?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_28_punished_by_judge_status")?>
                </div>
            </div>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">29 .Have you EVER been a defendant or the accused in a
                    criminal proceeding (including pre-trial diversion,
                    deferred prosecution, deferred adjudication, or any
                    withheld adjudication)? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_29_defendant_accused_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">30. Have you EVER violated (or attempted or conspired to
                    violate) any controlled substance law or regulation of a
                    state, the United States, or a foreign country?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_30_violeted_status")?>
                </div>
            </div>
            <!-- //.,.. -->


            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">31. Have you EVER been convicted of two or more offenses
                    (other than purely political offenses) for which the
                    combined sentences to confinement were five years or
                    more?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_31_convicted_offense_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">32. Have you EVER illicitly (illegally) trafficked or benefited
                    from the trafficking of any controlled substances, such as
                    chemicals, illegal drugs, or narcotics?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_32_illicitly_trafficked_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">33. Have you EVER knowingly aided, abetted, assisted,
                    conspired, or colluded in the illicit trafficking of any
                    illegal narcotic or other controlled substances?</label>
                <div class="col-md-10 col-md-offset-2">
                      <?php echo createRadio("i_485_33_knowingly_aided_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">34. Are you the spouse, son, or daughter of a foreign national
                    who illicitly trafficked or aided (or otherwise abetted,
                    assisted, conspired, or colluded) in the illicit trafficking of
                    a controlled substance, such as chemicals, illegal drugs, or
                    narcotics and you obtained, within the last five years, any
                    financial or other benefit from the illegal activity of your
                    spouse or parent, although you knew or reasonably should
                    have known that the financial or other benefit resulted
                    from the illicit activity of your spouse or parent?</label>
                <div class="col-md-10 col-md-offset-2">
                      <?php echo createRadio("i_485_34_spouse_daughter_foreign_national_status")?>
                </div>
            </div>
        </div>

        <!-- *************************************
        *****************left side done ******************
        ******************************************-->

        <div class="col-md-6 mt-5">

            <div class="form-group">
                <label class="col-md-12">35. Have you EVER engaged in prostitution or are you
                    coming to the United States to engage in prostitution?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_35_spouse_daughter_foreign_national_status")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">36. Have you EVER directly or indirectly procured (or
                    attempted to procure) or imported prostitutes or persons
                    for the purpose of prostitution?</label>
                <div class="col-md-10 col-md-offset-2">
                   <?php echo createRadio("i_485_36_attempted_procure_status")?>
                </div>
            </div>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">37 .Have you EVER received any proceeds or money from
                    prostitution? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_37_received_proceeds_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">38. Do you intend to engage in illegal gambling or any other
                    form of commercialized vice, such as prostitution,
                    bootlegging, or the sale of child pornography, while in the
                    United States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_38_illegal_gambling_status")?>
                </div>
            </div>
            <!-- //.,.. -->

            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">39. Have you EVER exercised immunity (diplomatic or
                    otherwise) to avoid being prosecuted for a criminal
                    offense in the United States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_39_exercised_immunity_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">40. Have you EVER, while serving as a foreign government
                    official, been responsible for or directly carried out
                    violations of religious freedoms?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_40_while_erving_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">41. Have you EVER induced by force, fraud, or coercion (or
                    otherwise been involved in) the trafficking of persons for
                    commercial sex acts?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_41_force_fraud_coercion_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">42. Have you EVER trafficked a person into involuntary
                    servitude, peonage, debt bondage, or slavery? Trafficking
                    includes recruiting, harboring, transporting, providing, or
                    obtaining a person for labor or services through the use of
                    force, fraud, or coercion.</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_42_trafficked_person_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">43. Have you EVER knowingly aided, abetted, assisted,
                    conspired, or colluded with others in trafficking persons
                    for commercial sex acts or involuntary servitude,
                    peonage, debt bondage, or slavery?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_43_knowingly_aided_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">44. Are you the spouse, son or daughter of a foreign national
                    who engaged in the trafficking of persons and have
                    received or obtained, within the last five years, any
                    financial or other benefits from the illicit activity of your
                    spouse or your parent, although you knew or reasonably
                    should have known that this benefit resulted from the illicit
                    activity of your spouse or parent?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_44_spouse_daughter_foreign_national_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">45. Have you EVER engaged in money laundering or have
                    you EVER knowingly aided, assisted, conspired, or
                    colluded with others in money laundering or do you seek
                    to enter the United States to engage in such activity?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_45_engaged_money_laundering_status")?>
                </div>
            </div>
            <!-- ............. -->
        </div>
    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 12 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 12 of 20</p>
            </b>
        </div>
    </div>
    <div class="row  mt-3 border-add">
        <div class="col-md-6 mt-5">
            <div class="bg-info">
                <h4 class="heading-md "><b>Part 8. General Eligibility and Inadmissibility
                        Grounds </b>(continued)
                </h4>
            </div>
            <div class="bg-info">
                <h4 class="heading-md "><i>Security and Related </i>
                </h4>
            </div>

            <h5>Do you intend to : </h5>

            <div class="form-group">
                <label class="col-md-12">46.a. Engage in any activity that violates or evades any law
                    relating to espionage (including spying) or sabotage in the
                    United States?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_46a_activity_violates_status")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">46.b. Engage in any activity in the United States that violates
                    or
                    evades any law prohibiting the export from the United
                    States of goods, technology, or sensitive information? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_46b_engage_activity_violates_status")?>
                </div>
            </div>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">46.c. Engage in any activity whose purpose includes opposing,
                    controlling, or overthrowing the U.S. Government by
                    force, violence, or other unlawful means while in the
                    United States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_46c_engage_activity_purpose_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">46.d. Engage in any activity that could endanger the welfare,
                    safety, or security of the United States? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_46d_could_endanger_welfare_status")?>
                </div>
            </div>
            <!-- //.,.. -->


            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">46.e. Engage in any other unlawful activity?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_46e_unlawful_activity_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">47. Are you engaged in or, upon your entry into the United
                    States, do you intend to engage in any activity that could
                    have potentially serious adverse foreign policy
                    consequences for the United States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_47_upon_your_entry_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <h4>Have you <b>Ever</b></h4>
            <div class="form-group">
                <label class="control-label col-md-12">48.a. Committed, threatened to commit, attempted to commit,
                    conspired to commit, incited, endorsed, advocated,
                    planned, or prepared any of the following: hijacking,
                    sabotage, kidnapping, political assassination, or use of a
                    weapon or explosive to harm another individual or cause
                    substantial damage to property?</label>
                <div class="col-md-10 col-md-offset-2">
                   <?php echo createRadio("i_485_48a_threatened_to_commit_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">48.b. Participated in, or been a member of, a group or
                    organization that did any of the activities described in
                    Item Number 48.a.? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_48b_Participated_been_member_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">48.c. Recruited members or asked for money or things of value
                    for a group or organization that did any of the activities
                    described in Item Number 48.a.?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_48c_Recruited_members_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">48.d. Provided money, a thing of value, services or labor, or
                    any other assistance or support for any of the activities
                    described in Item Number 48.a.? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_48d_provided_money_status")?>
                </div>
            </div>
        </div>

            <!-- *************************************
            *****************left side done ******************
            ******************************************-->

        <div class="col-md-6 mt-5">
            <div class="form-group">
                <label class="col-md-12">48.e. Provided money, a thing of value, services or labor, or
                    any other assistance or support for an individual, group,
                    or organization who did any of the activities described in
                    Item Number 48.a.?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_48e_provided_money_individual_status")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">49. Have you EVER received any type of military,
                    paramilitary, or weapons training? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_49_received_type_military_status")?>
                </div>
            </div>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">50. Do you intend to engage in any of the activities listed in
                    any part of Item Numbers 48.a. - 49.? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_50_intend_engage_status")?>
                </div>
            </div>
            <!-- ...////// -->
            <p><b>NOTE:</b> If you answered “Yes” to any part of Item Numbers
                46.a. - 50., explain what you did, including the dates and
                location of the circumstances, or what you intend to do in the
                space provided in Part 14. Additional Information. </p>
            <h4>Are you the spouse or child of an individual who <b>EVER:</b> </h4>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">51.a. Committed, threatened to commit, attempted to commit,
                    conspired to commit, incited, endorsed, advocated,
                    planned, or prepared any of the following: hijacking,
                    sabotage, kidnapping, political assassination, or use of a
                    weapon or explosive to harm another individual or cause
                    substantial damage to property?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_51a_threatened_to_commit_status")?>
                </div>
            </div>
            <!-- //.,.. -->


            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">51.b. Participated in, or been a member or a representative of a
                    group or organization that did any of the activities
                    described in Item Number 51.a.? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_51b_participated_representative_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">51.c. Recruited members, or asked for money or things of value,
                    for a group or organization that did any of the activities
                    described in Item Number 51.a.?
                </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_51c_recruited_members_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">51.d. Provided money, a thing of value, services or labor, or
                    any other assistance or support for any of the activities
                    described in Item Number 51.a.? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_51d_provided_money_thing_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">51.e. Provided money, a thing of value, services or labor, or
                    any other assistance or support to an individual, group, or
                    organization who did any of the activities described in
                    Item Number 51.a.?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_51e_recruited_members_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">51.f. Received any type of military, paramilitary, or weapons
                    training from a group or organization that did any of the
                    activities described in Item Number 51.a.?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_51f_received_type_military_status")?>
                </div>
            </div>

            <!-- ...// -->
            <p>NOTE: If you answered “Yes” to any part of Item Number
                51., explain the relationship and what occurred, including the
                dates and location of the circumstances, in the space provided
                in Part 14. Additional Information.</p>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">52. Have you EVER assisted or participated in selling,
                    providing, or transporting weapons to any person who,
                    to your knowledge, used them against another person?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_52_assisted_participated_status")?>
                </div>
            </div>
            <!-- ............. -->
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 13 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 13 of 20</p>
            </b>
        </div>
    </div>
    <div class="row  mt-3 border-add">

        <div class="col-md-6 mt-5">
            <div class="bg-info">
                <h4 class="heading-md "><b>Part 8. General Eligibility and Inadmissibility
                        Grounds </b>(continued)
                </h4>
            </div>
            <h5>Do you intend to : </h5>

            <div class="form-group">
                <label class="col-md-12">53. Have you EVER worked, volunteered, or otherwise
                    served in any prison, jail, prison camp, detention facility,
                    labor camp, or any other situation that involved detaining
                    persons?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_53_ever_worked_volunteered_status")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">54. Have you EVER been a member of, assisted, or
                    participated in any group, unit, or organization of any
                    kind in which you or other persons used any type of
                    weapon against any person or threatened to do so? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_54_ever_been_member_assisted_status")?>
                </div>
            </div>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">55. Have you EVER served in, been a member of, assisted,
                    or participated in any military unit, paramilitary unit,
                    police unit, self-defense unit, vigilante unit, rebel group,
                    guerilla group, militia, insurgent organization, or any
                    other armed group?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_55_ever_served_participated_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">56. Have you EVER been a member of, or in any way
                    affiliated with, the Communist Party or any other
                    totalitarian party (in the United States or abroad)?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_56_affiliated_communist_status")?>
                </div>
            </div>
            <!-- //.,.. -->


            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">57. During the period from March 23, 1933 to May 8, 1945,
                    did you ever order, incite, assist, or otherwise participate
                    in the persecution of any person because of race, religion,
                    national origin, or political opinion, in association with
                    either the Nazi government of Germany or any
                    organization or government associated or allied with the
                    Nazi government of Germany?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_57_during_period_march_status")?>
                </div>
            </div>

            <!-- .... -->
            <p>Have you <b>EVER</b> ordered, incited, called for, committed, assisted,
                helped with, or otherwise participated in any of the following:</p>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">58.a. Acts involving torture or genocide?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_58a_acts_involving_torture_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <h4>Have you <b>Ever</b></h4>
            <div class="form-group">
                <label class="control-label col-md-12">58.b. Killing any person?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_58b_killing_any_person_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">58.c. Intentionally and severely injuring any person? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_58c_intentionally_severely_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">58.d. Engaging in any kind of sexual contact or relations with
                    any person who did not consent or was unable to consent,
                    or was being forced or threatened?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_58d_engaging_sexual_contact_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">58.e. Limiting or denying any person's ability to exercise
                    religious beliefs?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_58e_limiting_denying_any_person_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">59. Have you EVER recruited, enlisted, conscripted, or used
                    any person under 15 years of age to serve in or help an
                    armed force or group?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_59_recruited_enlisted_status")?>
                </div>
            </div>
            <!--  -->
        </div>
            <!-- *************************************
            *****************left side done ******************
            ******************************************-->

        <div class="col-md-6 ">
            <div class="form-group">
                <label class="col-md-12">60. Have you EVER used any person under 15 years of age
                    to take part in hostilities, or to help or provide services to
                    people in combat?</label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("i_485_60_hostilities_status")?>
                </div>
            </div>

            <!-- ... -->
            <p><b>NOTE:</b> If you answered “Yes” to any part of Item Numbers
                52. - 60., explain what occurred, including the dates and
                location of the circumstances, in the space provided in Part 14.
                Additional Information.</p>

            <div class="bg-info">
                <h4><i>Public Charge</i></h4>
            </div>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">61. Are you subject to the public charge ground of
                    inadmissibility under INA section 212(a)(4)? </label>
                <div class="col-md-10 col-md-offset-2">
                   <?php echo createRadio("i_485_61_subject_public_charge_status")?>
                </div>
            </div>
            <!-- ...////// -->
            <p>If you answered “Yes” to Item Number 61., complete Item
                Numbers 62. - 68.d. below. If you answered “No” to Item
                Number 61., go to Item Number 69.a. If you need extra space
                to complete this section, use the space provided in Part 14.
                Additional Information.</h4>

                <!-- //.,.. -->


                <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">62. What is the size of your household?
                </label>
                <div class="col-md-12">
                    <input type="text" maxlength="3" class="form-control" name="i_485_general_eligibility_household_size" value="<?php echo showData('i_485_general_eligibility_household_size')?>">
                </div>
            </div>
            <!-- //.,.. -->
            <div class="control-label  "><b>63. Indicate your annual household income.</b> &nbsp;<br>
                <input type="radio" name="i_485_general_eligibility_household_income" value="a" 
                <?php echo (showData('i_485_general_eligibility_household_income')=='a') ? 'checked':''?>> $0-27,000 &nbsp; <br>

                <input type="radio" name="i_485_general_eligibility_household_income" value="b" 
                <?php echo (showData('i_485_general_eligibility_household_income')=='b') ? 'checked':''?>> $27,001-52,000 &nbsp;<br>

                <input type="radio" name="i_485_general_eligibility_household_income" value="c" 
                <?php echo (showData('i_485_general_eligibility_household_income')=='c') ? 'checked':''?>> $52,001-85,000 &nbsp;<br>

                <input type="radio" name="i_485_general_eligibility_household_income" value="d" 
                <?php echo (showData('i_485_general_eligibility_household_income')=='d') ? 'checked':''?>> $85,001-141,000<br>

                <input type="radio" name="i_485_general_eligibility_household_income" value="e" 
                <?php echo (showData('i_485_general_eligibility_household_income')=='e') ? 'checked':''?>> Over $141,000<br>
            </div>
            <!-- //.,.. -->

            <div class="control-label  "><b>64. Identify the total value of your household assets.</b> &nbsp;<br>
                <input type="radio" name="i_485_general_eligibility_household_assets" value="a" 
                <?php echo (showData('i_485_general_eligibility_household_assets')=='a') ? 'checked':''?>> $0-18,400 &nbsp; <br>

                <input type="radio" name="i_485_general_eligibility_household_assets" value="b" 
                <?php echo (showData('i_485_general_eligibility_household_assets')=='b') ? 'checked':''?>> $18,401-136,000 &nbsp;<br>

                <input type="radio" name="i_485_general_eligibility_household_assets" value="c" 
                <?php echo (showData('i_485_general_eligibility_household_assets')=='c') ? 'checked':''?>> $136,001-321,400 &nbsp;<br>

                <input type="radio" name="i_485_general_eligibility_household_assets" value="d" 
                <?php echo (showData('i_485_general_eligibility_household_assets')=='d') ? 'checked':''?>> $321,401-707,100<br>

                <input type="radio" name="i_485_general_eligibility_household_assets" value="e" 
                <?php echo (showData('i_485_general_eligibility_household_assets')=='e') ? 'checked':''?>> Over $707,100<br>
            </div>
            <!-- ............. -->
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<!----------------------------------------------------------------------
-------------------------------- page 14 --------------------------------
------------------------------------------------------------------------>


<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 14 of 20</p>
        </b>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="bg-info">
            <h4 class="heading-md"><b>Part 8. General Eligibility and Inadmissibility
                    Grounds </b>(continued)
            </h4>
        </div>
        <div class="control-label" style="margin: 20px;"><b>65. Identify the total value of your household liabilities
                (including both secured and unsecured liabilities).</b>&nbsp;<br>
            <input type="radio" name="i_485_general_eligibility_household_liabilities" value="a" 
            <?php echo (showData('i_485_general_eligibility_household_liabilities')=='a') ? 'checked':''?>> $0&nbsp;<br>

            <input type="radio" name="i_485_general_eligibility_household_liabilities" value="b" 
            <?php echo (showData('i_485_general_eligibility_household_liabilities')=='b') ? 'checked':''?>> $1-10,100 &nbsp; <br>

            <input type="radio" name="i_485_general_eligibility_household_liabilities" value="c" 
            <?php echo (showData('i_485_general_eligibility_household_liabilities')=='c') ? 'checked':''?>> $10,101-57,700 &nbsp; <br>

            <input type="radio" name="i_485_general_eligibility_household_liabilities" value="d" 
            <?php echo (showData('i_485_general_eligibility_household_liabilities')=='d') ? 'checked':''?>> $57,701-186,800 <br>

            <input type="radio" name="i_485_general_eligibility_household_liabilities" value="e" 
            <?php echo (showData('i_485_general_eligibility_household_liabilities')=='e') ? 'checked':''?>> Over $186,800 <br>
        </div>

        <!-- // -->

        <div class="control-label" style="margin: 20px;"><b>66. What is the highest degree or level of school you have
                completed? </b>&nbsp;<br>
            <input type="radio" name="i_485_general_eligibility_highest_degree" value="grades1_11"
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='grades1_11') ? 'checked':''?>> Grades 1 through 11 &nbsp;<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="grades11_nodiploma" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='grades11_nodiploma') ? 'checked':''?>> 12th grade - no diploma&nbsp;<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="high_school_credential" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='high_school_credential') ? 'checked':''?>> High school
            diploma, GED, or alternative credential&nbsp;<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="no_degree" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='no_degree') ? 'checked':''?>> 1 or more years of college
            credit, no degree<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="associate_degree" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='associate_degree') ? 'checked':''?>> Associate's degree<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="bachelor_degree" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='bachelor_degree') ? 'checked':''?>> Bachelor's degree<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="master_degree" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='master_degree') ? 'checked':''?>> Master's degree<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="professional_degree" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='professional_degree') ? 'checked':''?>> Professional degree (JD, MD,
            DMD, etc.)<br>

            <input type="radio" name="i_485_general_eligibility_highest_degree" value="doctorate_degree" 
            <?php echo (showData('i_485_general_eligibility_highest_degree')=='doctorate_degree') ? 'checked':''?>> Doctorate degree<br>
        </div>
        <!-- // -->
        <div class="form-group">
            <div class="col-md-10">
                <span><b>67. List your certifications, licenses, skills obtained through work experience, and
                        educational certificates.</b></span>
                <textarea name="i_485_general_eligibility_list_your_certification" class="form-control" maxlength="590" cols="30" rows="10"><?php echo showData('i_485_general_eligibility_list_your_certification');?></textarea>
            </div>
        </div>
        <!--  -->
        <div class="form-group">
            <label class="col-md-12">68.a. Have you ever received Supplemental Security Income (SSI), Temporary
                Assistance for Needy Families
                (TANF), or State, Tribal, territorial, or local, cash benefit programs for income maintenance (often
                called
                “General Assistance” in the State context, but which also exist under other names)?
            </label>
            <div class="col-md-6 col-md-offset-2" style="margin-left: 500px;">
            <?php echo createRadio("i_485_68a_received_supplemental_security_status")?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12">68.b. Have you ever received long-term institutionalization at government expense?
            </label>
            <div class="col-md-6 col-md-offset-2" style="margin-left: 500px;">
            <?php echo createRadio("i_485_68b_longterm_institutionalization_status")?>
            </div>
        </div>
        <!--  -->
        <div class="form-group">
            <label class="col-md-12">68.c. If your answer to Item Number 68.a. is “Yes,” list the specific benefit(s)
                you received, the start and end dates of each period of
                receipt, and the dollar amount of benefits received
            </label>
            <div class="col-md-10">
                <table border="1" style="width: 100%;">
                    <thead>
                        <tr class="bg-info">
                            <th>Benefit Received</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Dollar Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_receive[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_receive','0')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_start_date[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_start_date','0')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_end_date[]" value="<?php echo showData('i_485_general_eligibility_benefit_end_date','0')?>"></td>

                            <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_amount[]" value="<?php echo showData('i_485_general_eligibility_benefit_amount','0')?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_receive[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_receive','1')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_start_date[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_start_date','1')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_end_date[]" value="<?php echo showData('i_485_general_eligibility_benefit_end_date','1')?>"></td>

                            <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_amount[]" value="<?php echo showData('i_485_general_eligibility_benefit_amount','0')?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_receive[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_receive','2')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_start_date[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_start_date','2')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_end_date[]" value="<?php echo showData('i_485_general_eligibility_benefit_end_date','2')?>"></td>

                            <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_amount[]" value="<?php echo showData('i_485_general_eligibility_benefit_amount','2')?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_receive[]" 
                            value="<?php echo showData('i_485_general_eligibility_benefit_receive','3')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_start_date[]" value="<?php echo showData('i_485_general_eligibility_benefit_start_date','3')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_end_date[]" value="<?php echo showData('i_485_general_eligibility_benefit_end_date','3')?>"></td>

                            <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="i_485_general_eligibility_benefit_amount[]" value="<?php echo showData('i_485_general_eligibility_benefit_amount','3')?>"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>



        <!--  -->
        <div class="form-group">
            <label class="col-md-12">68.d. If your answer to Item Number 68.b. is “Yes,” list the name, city, and state
                for each institution, the start and end dates of each
                period of institutionalization, and the reason you were institutionalized.
            </label>
            <div class="col-md-10">
                <table border="1" style="width: 100%;">
                    <thead>
                        <tr class="bg-info">
                            <th>Institution Name/City/State</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_name[]" value="<?php echo showData('i_485_general_eligibility_institution_name','0')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_from[]" value="<?php echo showData('i_485_general_eligibility_institution_date_from','0')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_to[]" value="<?php echo showData('i_485_general_eligibility_institution_date_to','0')?>"></td>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_reason[]" value="<?php echo showData('i_485_general_eligibility_institution_reason','0')?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_name[]" value="<?php echo showData('i_485_general_eligibility_institution_name','1')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_from[]" value="<?php echo showData('i_485_general_eligibility_institution_date_from','1')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_to[]" value="<?php echo showData('i_485_general_eligibility_institution_date_to','1')?>"></td>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_reason[]" value="<?php echo showData('i_485_general_eligibility_institution_reason','1')?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_name[]" value="<?php echo showData('i_485_general_eligibility_institution_name','2')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_from[]" value="<?php echo showData('i_485_general_eligibility_institution_date_from','2')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_to[]" value="<?php echo showData('i_485_general_eligibility_institution_date_to','2')?>"></td>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_reason[]" value="<?php echo showData('i_485_general_eligibility_institution_reason','2')?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_name[]" value="<?php echo showData('i_485_general_eligibility_institution_name','3')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_from[]" value="<?php echo showData('i_485_general_eligibility_institution_date_from','3')?>"></td>

                            <td><input type="date" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_date_to[]" value="<?php echo showData('i_485_general_eligibility_institution_date_to','3')?>"></td>
                            <td><input type="text" maxlength="26" style="width: 100%; margin: 0;"  name="i_485_general_eligibility_institution_reason[]" value="<?php echo showData('i_485_general_eligibility_institution_reason','3')?>"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- finished -->
    </div>

    <!-- BUTTONS -->
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 15 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 15 of 20</p>
        </b>
    </div>
    <div class="row">
        <section class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. General Eligibility and Inadmissibility
                        Grounds</b> (continued) </h4>
            </div>
            <h5 class="bg-info">
                <i>Illegal Entries and Other Immigration Violations</i>
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">69.a. Have you EVER failed or refused to attend or to remain
                        in attendance at any removal proceeding filed against you
                        on or after April 1, 1997?</label>
                    <div class="col-md-7 col-md-offset-6">
                        <?php echo createRadio("i_485_69a_failed_refused_attend_status")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">69.b. If your answer to Item Number 69.a. is "Yes," do you
                        believe you had reasonable cause?
                        Y</label>
                    <div class="col-md-7 col-md-offset-6">
                        <?php echo createRadio("i_485_69b_reasonable_cause_status")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">69.c. If your answer to Item Number 69.b. is "Yes," attach a
                        written statement explaining why you had reasonable
                        cause</label>
                    <div class="col-md-7 col-md-offset-6">
                        <?php echo createRadio("i_485_69c_explaining_reasonable_status")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">70. Have you EVER submitted fraudulent or counterfeit
                        documentation to any U.S. Government official to obtain
                        or attempt to obtain any immigration benefit, including a
                        visa or entry into the United States?</label>
                    <div class="col-md-7 col-md-offset-6">
                        <?php echo createRadio("i_485_70_submitted_fraudulent_status")?>
                    </div>
                </div>
            </article>

            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">71. Have you EVER lied about, concealed, or misrepresented
                        any information on an application or petition to obtain a
                        visa, other documentation required for entry into the
                        United States, admission to the United States, or any other
                        kind of immigration benefit?</label>
                    <div class="col-md-7 col-md-offset-6">
                        <?php echo createRadio("i_485_71_concealed_misrepresented_status")?>
                    </div>
                </div>
            </article>
            <!-- //// -->
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">72. Have you EVER falsely claimed to be a U.S. citizen (in
                        writing or any other way)?</label>
                    <div class="col-md-7 col-md-offset-6">

                        <?php echo createRadio("i_485_72_falsely_claimed_status")?>

                    </div>
                </div>
            </article>
            <!-- //// -->
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">73. Have you EVER been a stowaway on a vessel or aircraft
                        arriving in the United States?</label>
                    <div class="col-md-7 col-md-offset-6">

                        <?php echo createRadio("i_485_73_stowaway_vessel_status")?>

                    </div>
                </div>
            </article>
            <!-- //// -->
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">74. Have you EVER knowingly encouraged, induced,
                        assisted, abetted, or aided any foreign national to enter or
                        to try to enter the United States illegally (alien
                        smuggling)?</label>
                    <div class="col-md-7 col-md-offset-6">

                        <?php echo createRadio("i_485_74_knowingly_encouraged_status")?>

                    </div>
                </div>
            </article>

            <!-- //// -->
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">75. Are you under a final order of civil penalty for
                        violating
                        INA section 274C for use of fraudulent documents?</label>
                    <div class="col-md-7 col-md-offset-6">

                        <?php echo createRadio("i_485_75_under_final_order_status")?>

                    </div>
                </div>
            </article>

            <!-- ,,-->
            <h4 class="bg-info"><i>Removal, Unlawful Presence, or Illegal Reentry
                    After Previous Immigration Violations</i></h4>


            <!-- //// -->
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">76. Have you EVER been excluded, deported, or removed
                        from the United States or have you ever departed the
                        United States on your own after having been ordered
                        excluded, deported, or removed from the United States?</label>
                    <div class="col-md-7 col-md-offset-6">

                        <?php echo createRadio("i_485_76_excluded_deported_status")?>

                    </div>
                </div>
            </article>

            <!-- //// -->
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">77. Have you EVER entered the United States without being
                        inspected and admitted or paroled?</label>
                    <div class="col-md-7 col-md-offset-6">

                        <?php echo createRadio("i_485_77_without_being_inspected_status")?>

                    </div>
                </div>
            </article>

        </section>


        <!-- left side end -->
        <div class="col-md-6 mt-5">

            <div class="form-group">
                <label class="col-md-12">78.a. For more than 180 days but less than a year, and then
                    departed the United States?</label>
                <div class="col-md-6 col-md-offset-2">

                    <?php echo createRadio("i_485_78a_departed_status")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">78.b. For one year or more and then departed the United States?
                </label>
                <div class="col-md-10 col-md-offset-2">

                    <?php echo createRadio("i_485_78b_more_then_departed_status")?>
                </div>
            </div>
            <!--  -->
            <h5><b>NOTE</b> You were unlawfully present in the United States if
                you entered the United States without being inspected and
                admitted or inspected and paroled, or if you legally entered the
                United States but you stayed longer than permitted. <br>

                Since April 1, 1997, have you EVER reentered or attempted to
                reenter the United States without being inspected and admitted
                or paroled after:
            </h5>
            <!-- //.......... -->
            <div class="form-group">
                <label class="control-label col-md-12">79.a. Having been unlawfully present in the United States for
                    more than one year in the aggregate?</label>
                <div class="col-md-10 col-md-offset-2">

                    <?php echo createRadio("i_485_79a_unlawfully_present_status")?>
                </div>
            </div>
            <!-- ...////// -->
            <div class="form-group">
                <label class="control-label col-md-12">79.b. Having been deported, excluded, or removed from the
                    United States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_79b_been_deported_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <h4 class="bg-info"><i>Miscellaneous Conduct</i></h4>
            <!--  -->
            <div class="form-group">
                <label class="control-label col-md-12">80. Do you plan to practice polygamy in the United
                    States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_80_practice_polygamy_status")?>
                </div>
            </div>
            <!-- //.,.. -->


            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">81. Are you accompanying another foreign national who
                    requires your protection or guardianship but who is
                    inadmissible after being certified by a medical officer as
                    being helpless from sickness, physical or mental
                    disability, or infancy, as described in INA section 232(c)?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_81_accompanying_another_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">82. Have you EVER assisted in detaining, retaining, or
                    withholding custody of a U.S. citizen child outside the
                    United States from a U.S. citizen who has been granted
                    custody of the child?
                </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_82_assisted_detaining_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">83. Have you EVER voted in violation of any Federal, state,
                    or local constitutional provision, statute, ordinance, or
                    regulation in the United States? </label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_83_violation_federal_status")?>
                </div>
            </div>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">84. Have you EVER renounced U.S. citizenship to avoid
                    being taxed by the United States?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_84_renounced_citizenship_status")?>
                </div>
            </div>
            <!-- / -->
            <h5>Have you <b>Ever</b></h5>
            <!-- //.,.. -->
            <div class="form-group">
                <label class="control-label col-md-12">85.a. Applied for exemption or discharge from training or
                    service in the U.S. armed forces or in the U.S. National
                    Security Training Corps on the ground that you are a
                    foreign national?</label>
                <div class="col-md-10 col-md-offset-2">
                    <?php echo createRadio("i_485_85a_exemption_discharge_status")?>
                </div>
            </div>

            <!-- ............. -->
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input  type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 16 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <p style="text-align: right;"><b>Page 16 of 20</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. General Eligibility and Inadmissibility Grounds</b> (continued)</h4>
            </div>
			<div class="form-group">
				<div class="col-md-12"><b>85.b.</b> Been relieved or discharged from such training or service on the ground that you are a foreign national?</div>
				<div class="col-md-7 col-md-offset-6">
					<?php echo createRadio("i_485_relieved_from_foreign_national_training")?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>85.c.</b> Been convicted of desertion from the U.S. armed forces?</div>
				<div class="col-md-7 col-md-offset-6">
					<?php echo createRadio("i_485_convicted_desertion_us_armed_forces")?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>86.a.</b> Have you <b>EVER</b> left or remained outside the United States to avoid or evade training or service in the U.S. armed forces in time of war or a period declared by the President to be a national emergency?</div>
				<div class="col-md-7 col-md-offset-6">
					<?php echo createRadio("i_485_remained_outside_united_states_during_war")?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>86.b.</b> If your answer to <b>Item Number 86.a.</b> is "Yes," what was your nationality or immigration status immediately before you left (for example, U.S. citizen or national, lawful permanent resident, nonimmigrant, parolee, present without admission or parole, or any other status)?</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_485_remained_outside_united_states_during_war_nationality" maxlength="28" value="<?php echo showData('i_485_remained_outside_united_states_during_war_nationality')?>" />
				</div>
			</div>
            <h4 class="bg-info">Part 9. Accommodations for Individuals With Disabilities and/or Impairments</h4>
				
            <p><b>NOTE:</b> Read the information in the Form I-485 Instructions before completing this part.</p>
            
			<div class="form-group">
				<div class="col-md-12">1. Are you requesting an accommodation because of your disabilities and/or impairments?</div>
				<div class="col-md-6 col-md-offset-6">
					<?php echo createRadio("i_485_requesting_accommodation_for_disabilities")?>
				</div>
				<div class="col-md-12">If you answered "Yes" to <b>Item Number 1.</b>, select any applicable box in <b>Item Numbers 2.a. - 2.c.</b> and provide an answer</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>2.a.</b> <span><?php echo createCheckbox("i_485_deaf_hard_of_hearing_req_for_accommodation")?> </span> I am deaf or hard of hearing and request the following accommodation. (If you are requesting a sign-language interpreter, indicate for which language (for example, American Sign Language).):</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_485_deaf_hard_of_hearing_language_sign" class="form-control" maxlength="36" cols="30" rows="4"><?php echo showData('i_485_deaf_hard_of_hearing_language_sign')?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>2.b.</b> <span> <?php echo createCheckbox("i_485_blind_low_vision_req_for_accommodation")?> </span> I am blind or have low vision and request the following accommodation:</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_485_blind_low_vision_desc" class="form-control" maxlength="36" cols="30" rows="4"><?php echo showData('i_485_blind_low_vision_desc')?></textarea>
				</div>
			</div>
        </div>
        <div class="col-md-6">
			<div class="form-group">
				<div class="col-md-12">2.c. <span><?php echo createCheckbox("i_485_another_type_of_disability")?></span> I have another type of disability and/or impairment. (Describe the nature of your disability and/or impairment and the accommodation you are requesting.)</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_485_another_type_of_disability_desc" class="form-control" maxlength="36" cols="30" rows="4"><?php echo showData('i_485_another_type_of_disability_desc')?></textarea>
				</div>
			</div>
            <h4 class="bg-info" style="padding:7px"><b>Part 10. Applicant's Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            <p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-485 Instructions before completing this part. You must file Form I-485 while in the United States.</p>

            <h4 class="bg-info" style="padding:7px"><b>Applicant's Statement</b></h4>
            <p><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If applicable, select the box for <b>Item Number 2.</b></p>
			<div class="form-group">
				<div class="col-md-12"><b>1.a.</b> <span><?php echo createCheckbox("i_485_applicant_statement_1a_status")?></span> I can read and understand English, and I have read and understand every question and instruction on this application and my answer to every question.</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>1.b.</b> <span><?php echo createCheckbox("i_485_applicant_statement_1b_status")?> </span> The interpreter named in <b>Part 11</b>. read to me every question and instruction on this application and my answer to every question in</div>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_485_applicant_statement_1b_language" maxlength="28" value="<?php echo showData('i_485_applicant_statement_1b_language')?>">
					<p>a language in which I am fluent, and I understood everything.</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>2.</b> <?php echo createCheckbox("i_485_applicant_statement_2_status")?></span> At my request, the preparer named in Part 12.,
				</div>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_485_applicant_statement_2_preparer" maxlength="28" value="<?php echo showData('i_485_applicant_statement_2_preparer')?>">
					<p>At my request, the preparer named in Part 12., prepared this application for me based only upon information I provided or authorized.</p>
				</div>
			</div>
            <h4 class="bg-info"><b>Applicant's Contact Information</b></h4>
			<div class="form-group">
				<label class="control-label col-md-12">3. Applicant's Daytime Telephone Number.</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_485_applicant_daytime_tel" maxlength="15" value="<?php echo showData('i_485_applicant_daytime_tel')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Applicant's Mobile Telephone Number (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_485_applicant_mobile" maxlength="15" value="<?php echo showData('i_485_applicant_mobile')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Applicant's Email Address (if any)</label>
				<div class="col-md-12">
					<input type="email" class="form-control" name="i_485_applicant_email" maxlength="39" value="<?php echo showData('i_485_applicant_email')?>" />
				</div>
			</div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 17 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <p style="text-align: right;"><b>Page 17 of 20</b></p>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 10. Applicant's Statement, Contact Information, Declaration, Certification, and Signature (continued)</b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><i><b>Applicant's Declaration and Certification</b></i></h4>
            </div>
            <p>Copies of any documents I have submitted are exact photocopies
            of unaltered, original documents, and I understand that USCIS
            may require that I submit original documents to USCIS at a later
            date. Furthermore, I authorize the release of any information
            from any and all of my records that USCIS may need to
            determine my eligibility for the immigration benefit that I seek.</p><br>

            <p>I understand that if I am a male who is 18 to 26 years of age,
            submitting this application will automatically register me with
            the Selective Service System as required by the Military
            Selective Service Act.</p><br>

            <p>I furthermore authorize release of information contained in this
            application, in supporting documents, and in my USCIS
            records, to other entities and persons where necessary for the
            administration and enforcement of U.S. immigration law.</p><br>

            <p>I understand that USCIS may require me to appear for an
            appointment to take my biometrics (fingerprints, photograph,
            and/or signature) and, at that time, if I am required to provide
            biometrics, I will be required to sign an oath reaffirming that:</p><br>

            <p>1) I reviewed and understood all of the information
                contained in, and submitted with, my application; and</p>

            <p>2) All of this information was complete, true, and correct
                at the time of filing.</p><br>

            <p>I certify, under penalty of perjury, that all of the information in
                my application and any document submitted with it were
                provided or authorized by me, that I reviewed and understand
                all of the information contained in, and submitted with, my
                application and that all of this information is complete, true, and
                correct. </p>

            <div class="bg-info">
                <h4><i><b>Applicant's Signature</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Applicant's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_485_applicant_sign_date" value="<?php echo showData('i_485_applicant_sign_date')?>" />
                </div>
            </div>
            <p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill out this application or fail to submit required documents listed in the Instructions, USCIS may deny your application
            </p>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 11. Interpreter's Contact Information, Certification, and Signature</b></h4>
            </div>
            <h5><b>Provide the following information about the interpreter</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_485_interpreter_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_interpreter_family_given_first_name" maxlength="39" value="<?php echo showData('i_485_interpreter_family_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_interpreter_business_name" maxlength="34" value="<?php echo showData('i_485_interpreter_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Mailing Address</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_interpreter_mailing_address_street_number" maxlength="25" value="<?php echo showData('i_485_interpreter_mailing_address_street_number')?>" />
                </div>
            </div>
            <div class="form-group">
				<div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_485_interpreter_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_485_interpreter_mailing_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_485_interpreter_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_485_interpreter_mailing_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_485_interpreter_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_485_interpreter_mailing_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" class="form-control" name="i_485_interpreter_mailing_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_485_interpreter_mailing_address_apt_ste_flr_value')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_interpreter_mailing_address_city_town" maxlength="20" value="<?php echo showData('i_485_interpreter_mailing_address_city_town')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_485_interpreter_mailing_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_485_interpreter_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_interpreter_mailing_address_zip_code" maxlength="5" value="<?php echo showData('i_485_interpreter_mailing_address_zip_code')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_interpreter_mailing_address_province" maxlength="20" value="<?php echo showData('i_485_interpreter_mailing_address_province')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_interpreter_mailing_address_postal_code" maxlength="9" value="<?php echo showData('i_485_interpreter_mailing_address_postal_code')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_interpreter_mailing_address_country" maxlength="39" value="<?php echo showData('i_485_interpreter_mailing_address_country')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_interpreter_daytime_tel" maxlength="15" value="<?php echo showData('i_485_interpreter_daytime_tel')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_interpreter_mobile" maxlength="15" value="<?php echo showData('i_485_interpreter_mobile')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_485_interpreter_email" value="<?php echo showData('i_485_interpreter_email')?>" />
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 18 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <p style="text-align: right"><b>Page 18 of 20</b></p>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 11. Interpreter's Contact Information, Certification, and Signature(continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Certification</b></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <p>I am fluent in English and
			<span><input type="text" maxlength="18" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" name="i_485_interpreter_certification_language_skill" value="<?php echo showData('i_485_interpreter_certification_language_skill')?>" /></span>,
            </p>
            <p>which is the same language specified in Part 10., Item Number 1.b., and I have read to this applicant in the identified language every question and instruction on this application and his or her answer to every question. The applicant informed me that he or she understands every instruction, question, and answer on the application, including the <b>Applicant's Declaration and Certification</b>, and has verified the accuracy of every answer</p>
            <div class="bg-info">
                <h4><b>Interpreter's Signature</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. Interpreter's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_485_interpreter_sign_date" value="<?php echo showData('i_485_interpreter_sign_date')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 12. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant</b></h4>
            </div>
            <p>Provide the following information about the preparer.</p>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_485_preparer_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_preparer_family_given_first_name" maxlength="39" value="<?php echo showData('i_485_preparer_family_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if
                    any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_preparer_business_name" maxlength="34" value="<?php echo showData('i_485_preparer_business_name')?>" />
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_street_number" maxlength="25" value="<?php echo showData('i_485_preparer_mailing_address_street_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_485_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_485_preparer_mailing_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_485_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_485_preparer_mailing_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_485_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_485_preparer_mailing_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_485_preparer_mailing_address_apt_ste_flr_value')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_city_town" maxlength="20" value="<?php echo showData('i_485_preparer_mailing_address_city_town')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_485_preparer_mailing_address_state">
                        <option style="" value="">Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_485_preparer_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_zip_code" maxlength="5" value="<?php echo showData('i_485_preparer_mailing_address_zip_code')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_province" maxlength="20" value="<?php echo showData('i_485_preparer_mailing_address_province')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_postal_code" maxlength="9" value="<?php echo showData('i_485_preparer_mailing_address_postal_code')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_preparer_mailing_address_country" maxlength="39" value="<?php echo showData('i_485_preparer_mailing_address_country')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_preparer_daytime_tel" maxlength="15" value="<?php echo showData('i_485_preparer_daytime_tel')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_485_preparer_mobile" maxlength="15" value="<?php echo showData('i_485_preparer_mobile')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_485_preparer_email" maxlength="39" value="<?php echo showData('i_485_preparer_email')?>"/>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>
            <div class="d-flexible">
                <b>7.a.</b>
                <?php echo createCheckbox("i_485_preparer_statement_7a")?>
                <p>I am not an attorney or accredited representative but have prepared this application on behalf of the applicant and with the applicant's consent.</p>
            </div>
            <div class="d-flexible">
                <b>7.b.</b>
                <?php echo createCheckbox("i_485_preparer_statement_7b")?>
                <p>I am an attorney or accredited representative and my representation of the applicant in this case
                    <?php echo createCheckbox("i_485_preparer_statement_7b_extend")?> extends
                    <?php echo createCheckbox("i_485_preparer_statement_7b_not_extend")?> does not extend beyond the
                    preparation of this supplement.
                </p>
            </div>
            <p><b>NOTE:</b> If you are an attorney or accredited representative, you may be obliged to submit a completed Form G-28, Notice of Entry of Appearance as Attorney or Accredited Representative, with this application</p>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 19 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <p style="text-align: right"><b>Page 19 of 20</b></p>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 12. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant(continued)</b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I prepared this application at the request of the applicant. The applicant then reviewed this completed application and informed me that he or she understands all of the information contained in, and submitted with, his or her application, including the Applicant's Declaration and Certification, and that all of this information is complete, true, and correct. I completed this application based only on information that the applicant provided to me or authorized me to obtain or use.
            </p>
            <div class="bg-info">
                <h4><b>Preparer's Signature</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.a. Preparer's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_485_preparer_sign_date" value="<?php echo showData('i_485_preparer_sign_date')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6 ">
            <div class="bg-info">
                <h4><b>Part 13. Signature at Interview</b></h4>
            </div>
            <p>
                I swear (affirm) and certify under penalty of perjury under the laws of the United States of America that I know that the contents of this Form I-485, Application to Register Permanent Residence or Adjust Status, subscribed by me, including the corrections made to this application, <b>numbered</b> <span><input type="text" maxlength="5" style="width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" name="i_485_sign_interview_permanent_residence_pages_from" value="<?php echo showData('i_485_sign_interview_permanent_residence_pages_from')?>" /></span> <b>through</b> <span><input type="text" maxlength="5" style="width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" name="i_485_sign_interview_permanent_residence_pages_to" value="<?php echo showData('i_485_sign_interview_permanent_residence_pages_to')?>" /></span>, are complete, true, and correct. All additional pages submitted by me with this Form I-485, on <b>numbered pages</b> <span><input type="text" maxlength="5" style="width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" name="i_485_sign_interview_additional_pages_from" value="<?php echo showData('i_485_sign_interview_additional_pages_from')?>" /></span> <b>through</b> <span><input type="text" maxlength="5" style="width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" name="i_485_sign_interview_additional_pages_to" value="<?php echo showData('i_485_sign_interview_additional_pages_to')?>" /></span> are complete, true, and correct. All documents submitted at this interview were provided by me and are complete, true, and correct. Subscribed to and sworn to (affirmed) before me
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">USCIS Officer's Printed Name or Stamp</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_485_uscis_officer_printed_date" value="<?php echo showData('i_485_uscis_officer_printed_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Applicant's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">USCIS Officer's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 20 -------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 20 of 20</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 14. Additional Information</b></h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this form, use the space below. If you need more space
                than what is provided, you may make copies of this page to
                complete and file with this form or attach a separate sheet of
                paper. Type or print your name and A-Number (if any) at the top
                of each sheet; indicate thePage Number, Part Number, and
                Item Number to which your answer refers; and sign and date
                each sheet.
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_additional_info_last_name" maxlength="28" value="<?php echo showData('i_485_additional_info_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_additional_info_first_name" maxlength="28" value="<?php echo showData('i_485_additional_info_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_485_additional_info_middle_name" maxlength="28" value="<?php echo showData('i_485_additional_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><b>A-</b>
						<input type="text" class="form-control" name="i_485_additional_info_a_number" maxlength="9" value="<?php echo showData('i_485_additional_info_a_number')?>" />
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_485_additional_info_3a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_485_additional_info_3b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_485_additional_info_3c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea class="form-control" name="i_485_additional_info_3d" maxlength="321" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_3d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_485_additional_info_4a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_485_additional_info_4b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_485_additional_info_4c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea class="form-control" name="i_485_additional_info_4d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_4d')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_485_additional_info_5a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_485_additional_info_5b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_485_additional_info_5c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea class="form-control" name="i_485_additional_info_5d" maxlength="321" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_5d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_485_additional_info_6a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_485_additional_info_6b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_485_additional_info_6c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea class="form-control" name="i_485_additional_info_6d" maxlength="321" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_6d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_485_additional_info_7a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_485_additional_info_7b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_485_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_485_additional_info_7c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php"?>