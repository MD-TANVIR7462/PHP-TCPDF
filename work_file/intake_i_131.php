<?php
$meta_title 	=   "INTAKE FORM I-131";
$page_heading 	=   "INTAKE FORM I-131, Application for Travel Document";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 5</b></p>
    <table style="border-collapse: collapse">
        <thead>
            <tr>
                <th colspan="4" style="padding: 5px; text-align: center;" class="bg-info">To Be Completed by an Attorney/ Representative, if any.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><?php echo createCheckbox("i_131_g28_checkbox")?> Fill in box if G-28 is attached to represent the applicant.
                </td>
                <td style="padding: 5px">
                    <p>Attorney State License Number:</p>
                    <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name"  value="<?php echo showData('information_about_you_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name"  value="<?php echo showData('information_about_you_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Physical Address</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. In Care of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_home_care_of_name" maxlength="36" value="<?php echo showData('information_about_you_home_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_street_number" maxlength="26" value="<?php echo showData('information_about_you_home_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>2.c. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value" maxlength="6"  value="<?php echo showData('information_about_you_home_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_city_town" maxlength="20" value="<?php echo showData('information_about_you_home_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_home_state">
                        <option style="" value=''>Select</option><?php foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_home_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>"; }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_zip_code" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_postal_code" maxlength="9" value="<?php echo showData('information_about_you_home_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.h. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_province" maxlength="20" value="<?php echo showData('information_about_you_home_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_home_country" maxlength="29" value="<?php echo showData('information_about_you_home_country')?>">
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <div class="bg-info">
                <h4><b> Other Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Alien Registration Number (A-Number) </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ►A-<input type="text" class="form-control" maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">4. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="36" value="<?php echo showData('other_information_about_you_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Country of Citizenship</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="36" value="<?php echo showData('other_information_about_you_country_of_citizen')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Class of Admission</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_131_information_about_you_class_of_admission" maxlength="36" value="<?php echo showData('i_131_information_about_you_class_of_admission')?>">
                </div>
            </div>
            <div class="control-label" style="padding-left:18px;">
                <b>7. Gender </b> &nbsp;
                <label class="control-label col-md-offset-2"> <input type="radio" name="other_information_about_you_gender" value="male"
                        <?php echo (showData('other_information_about_you_gender')=='male') ? 'checked' : '' ?>> Male &nbsp;
                </label>
                <label class="control-label"> <input type="radio" name="other_information_about_you_gender" value="female"
                        <?php echo (showData('other_information_about_you_gender')=='female') ? 'checked' : '' ?>> Female &nbsp;
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">8 . Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <div class="d-flexible">
                        ►A-<input type="date" class="form-control" name="other_information_about_you_date_of_birth" 
                        value="<?php echo showData('other_information_about_you_date_of_birth')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> 9. U.S. Social Security Number (if any)
                </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ►A-<input type="text" class="form-control" maxlength="9" name="other_information_about_you_social_security_number" 
                        value="<?php echo showData('other_information_about_you_social_security_number')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <p style=" text-align: right;"><b>Page 2 of 5</b></p>
    <div class="row mt-5 gap-4">
        <div class="bg-info">
            <h4><i><b>Part 2. Application Type</b> </i></h4>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">1.a.
                    <?php echo createCheckbox("i_131_permanent_residence_1a_status")?> I am a permanent resident or conditional resident of the United States, and I am applying for a reentry permit.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b.
                    <?php echo createCheckbox("i_131_refuge_asylee_residence_1b_status")?> I now hold U.S. refugee or asylee status, and I am applying for a Refugee Travel Document.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.c.
                    <?php echo createCheckbox("i_131_direct_result_refugee_1c_status")?> I am a permanent resident as a direct result of refugee or asylee status, and I am applying for a Refugee Travel Document.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.d.
                    <?php echo createCheckbox("i_131_direct_result_refugee_1d_status")?> I am applying for an Advance Parole Document to allow me to return to the United States after temporary foreign travel.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.e.
                    <?php echo createCheckbox("i_131_outside_united_1e_status")?> I am outside the United States, and I am applying for an Advance Parole Document.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.f.
                    <?php echo createCheckbox("i_131_applying_advance_parole_1f_status")?> I am applying for an Advance Parole Document for a person who is outside the United States.
                </label>
            </div>

            <p>If you checked box "1.f." provide the following information about that person in 2.a. through 2.p</p>

            <div class="form-group">
                <label class="control-label col-md-6">2.a. Family Name(Last Name)</label>
                <div class="col-md-6">
                    <input type="text" maxlength="29" class="form-control" name="travel_application_type_last_name" value="<?php echo showData('travel_application_type_last_name')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">2.b. Given Name(First Name)</label>
                <div class="col-md-6">
                    <input type="text" maxlength="29" class="form-control" name="travel_application_type_first_name" value="<?php echo showData('travel_application_type_first_name')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">2.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" maxlength="29" class="form-control" name="travel_application_type_middle_name" value="<?php echo showData('travel_application_type_middle_name')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">2.d. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <div class="d-flexible">
                        ►A-<input type="date" class="form-control" name="travel_application_type_date_of_birth" 
                        value="<?php echo showData('travel_application_type_date_of_birth')?>">
                    </div>
                </div>
            </div>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">2.e. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39" name="travel_application_type_country_of_birth" value="<?php echo showData('travel_application_type_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.f. Country of Citizenship</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39" name="travel_application_type_country_of_citizen" value="<?php echo showData('travel_application_type_country_of_citizen')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-12" style="margin-bottom: 10px;padding-left:15px;">2.g. Daytime Phone
                    Number</label>
                <div class="col-md-offset-2" style="display: flex; align-items: center;">
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="travel_application_type_daytime_tel1" value="<?php echo showData('travel_application_type_daytime_tel1')?>">
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="travel_application_type_daytime_tel2"  value="<?php echo showData('travel_application_type_daytime_tel2')?>">
                    </div>
                    <div style="flex: 1;">
                        <input type="text" class="form-control" maxlength="4" name="travel_application_type_daytime_tel3"  value="<?php echo showData('travel_application_type_daytime_tel3')?>">
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Physical Address (If you checked box 1.f.)</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.h. In Care of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="travel_application_physical_address_care_of_name" maxlength="25" value="<?php echo showData('travel_application_physical_address_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.i. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="25" name="travel_application_physical_street_number"  
                    value="<?php echo showData('travel_application_physical_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>2.j. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="travel_application_physical_address_apt_ste_flr" value="apt"
                            <?php echo (showData('travel_application_physical_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="travel_application_physical_address_apt_ste_flr" value="ste"
                            <?php echo (showData('travel_application_physical_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="travel_application_physical_address_apt_ste_flr" value="flr"
                            <?php echo (showData('travel_application_physical_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" maxlength="6" name="travel_application_physical_address_apt_ste_flr_value" 
                    value="<?php echo showData('travel_application_physical_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.k. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20"  name="travel_application_physical_address_city_town" 
                    value="<?php echo showData('travel_application_physical_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.l. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="travel_application_physical_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('travel_application_physical_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>"; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.m. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="5" name="travel_application_physical_address_zip_code" 
                    value="<?php echo showData('travel_application_physical_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.n. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="9" name="travel_application_physical_address_postal_code" 
                    value="<?php echo showData('travel_application_physical_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.o. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20" name="travel_application_physical_address_province" 
                    value="<?php echo showData('travel_application_physical_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.p. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39" name="travel_application_physical_address_country" 
                    value="<?php echo showData('travel_application_physical_address_country')?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info">
            <h4><i><b>Part 3. Processing Information</b> </i></h4>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-6">1. Date of Intended Departure (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <div class="d-flexible">
                        ►<input type="date" class="form-control" name="travel_processing_info_date_of_intended" value="<?php echo showData('travel_processing_info_date_of_intended')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">2. Expected Length of Trip (in days)</label>
                <div class="col-md-4 col-md-offset-1">
                    <input type="text" class="form-control"maxlength="9" name="travel_processing_info_expected_length_of_trip"  
                    value="<?php echo showData('travel_processing_info_expected_length_of_trip')?>">
                </div>
            </div>
            <div class="form-group">
                <label>3.a. Are you, or any person included in this application, now  in exclusion, deportation, removal, or rescission proceedings?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_person_included_application_3a_status")?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.b. If "Yes", Name of DHS office:</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="36" name="travel_processing_info_name_of_dhs_office" value="<?php echo showData('travel_processing_info_name_of_dhs_office')?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>4.a. Have you ever before been issued a reentry permit or Refugee Travel Document? (If "Yes" give the following information for the last document issued to you):</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_ever_before_issued_4a_status")?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">4.b. Date Issued (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <div class="d-flexible">
                        ►<input type="date" class="form-control"  name="travel_processing_info_date_issued" value="<?php echo showData('travel_processing_info_date_issued')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4.c. Disposition (attached, lost, etc.):</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="36" name="travel_processing_info_disposition" value="<?php echo showData('travel_processing_info_disposition')?>">
                </div>
            </div>
        </div>
    </div>
    <p><b>If you are applying for a non-DACA related Advance Parole Document, skip to Part 7; DACA recipients must complete Part 4 before skipping to Part 7</b></p>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
 <p style=" text-align: right;"><b>Page 3 of 5</b></p>
    <div class="row mt-5 gap-4">
        <div class="bg-info">
            <h4><i><b>Part 3. Processing Information (continued)</b> </i></h4>
        </div>
        <div class="col-md-6">
            <p><b>Where do you want this travel document sent? (Check one)</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">5.
                    <?php echo createCheckbox("i_131_where_do_travel_5_status")?>
                    To the U.S. address shown in Part 1 (2.a through
                    2.i.) of this form.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.
                    <?php echo createCheckbox("i_131_embasy_consulate_6_status")?>
                    To a U.S. Embassy or consulate at
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20" name="travel_processing_info_embassy_city_town" value="<?php echo showData('travel_processing_info_embassy_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">6.b. Country</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" maxlength="20" name="travel_processing_info_embassy_country" value="<?php echo showData('travel_processing_info_embassy_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.
                    <?php echo createCheckbox("i_131_dhs_office_overseas_7_status")?>
                    To a DHS office overseas at:
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20" name="travel_processing_info_dhs_office_city_town" value="<?php echo showData('travel_processing_info_dhs_office_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">7.b. Country</label>
                <div class="col-md-8">
                    <input type="text" class="form-control"maxlength="20" name="travel_processing_info_dhs_office_country"  value="<?php echo showData('travel_processing_info_dhs_office_country')?>">
                </div>
            </div>
            <p><b>If you checked "6" or "7", where should the notice to pick up the travel document be sent?</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">8.
                    <?php echo createCheckbox("i_131_where_should_notice_8_status")?>
                    To the address shown in Part 2 (2.h. through 2.p.)
                    of this form.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9.
                    <?php echo createCheckbox("i_131_address_shown_9_status")?>
                    To the address shown in Part 3 (10.a. through 10.i.)
                    of this form.:
                </label>
            </div>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">10.a. In Care of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="25" name="travel_processing_address_care_of_name" 
                    value="<?php echo showData('travel_processing_address_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="25" name="travel_processing_address_street_number" value="<?php echo showData('travel_processing_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>10.c. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="travel_processing_address_apt_ste_flr" value="apt"
                            <?php echo (showData('travel_processing_address_apt_ste_flr')==='apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="travel_processing_address_apt_ste_flr" value="ste"
                            <?php echo (showData('travel_processing_address_apt_ste_flr')==='ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="travel_processing_address_apt_ste_flr" value="flr"
                            <?php echo (showData('travel_processing_address_apt_ste_flr')==='flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" maxlength="6" name="travel_processing_address_apt_ste_flr_value"
                    value="<?php echo showData('travel_processing_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20" name="travel_processing_address_city_town" value="<?php echo showData('travel_processing_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="travel_processing_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('travel_processing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="travel_processing_address_zip_code" maxlength="5" 
                    value="<?php echo showData('travel_processing_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="9" name="travel_processing_address_postal_code" 
                    value="<?php echo showData('travel_processing_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.h. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20" name="travel_processing_address_province" 
                    value="<?php echo showData('travel_processing_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="36" name="travel_processing_address_country" value="<?php echo showData('travel_processing_address_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-12" style="margin-bottom: 10px;padding-left:15px;">10.j. Daytime Phone
                    Number</label>
                <div class="col-md-offset-2" style="display: flex; align-items: center;">
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="travel_processing_address_daytime_tel1"  value="<?php echo showData('travel_processing_address_daytime_tel1')?>">
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="travel_processing_address_daytime_tel2" value="<?php echo showData('travel_processing_address_daytime_tel2')?>">
                    </div>
                    <div style="flex: 1;">
                        <input type="text" class="form-control" maxlength="4" name="travel_processing_address_daytime_tel3" value="<?php echo showData('travel_processing_address_daytime_tel3')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info">
            <h4><i><b>Part 4. Information About Your Proposed Travel</b> </i></h4>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>1.a. </b><b>Purpose of trip. <i>(If you need more space, continue on a
                                separate sheet of paper.)</i></b> </span>
                    <textarea class="form-control" name="information_about_proposed_travel_purpose_trip" maxlength="120" class="form-control" cols="30" rows="10"><?php echo showData('information_about_proposed_travel_purpose_trip')?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>1.b. </b><b>List the countries you intend to visit. <i>(If you need more
                                space, continue on a separate sheet of paper.)</i></b> </span>
                    <textarea class="form-control" name="information_about_proposed_travel_country_list" maxlength="120" class="form-control" cols="30"
                        rows="10"><?php echo showData('information_about_proposed_travel_country_list')?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info">
            <h4><i><b>Part 5. Complete Only If Applying for a Re-entry Permit</b> </i></h4>
        </div>
        <div class="col-md-6">
            <p><b>Since becoming a permanent resident of the United States (or during the past 5 years, whichever is
                    less) how much total time have you spent outside the United States?</b></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-12">1.a.
                            <?php echo createCheckbox("i_131_lessthan_6_month_1a_status")?>
                            less than 6 months
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12">1.b.
                            <?php echo createCheckbox("i_131_6_month_to_1b_status")?>
                            6 months to 1 year
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12">1.c.
                            <?php echo createCheckbox("i_131_1_to_two_year_1b_status")?>
                            1 to 2 years
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-12">1.d.
                            <?php echo createCheckbox("i_131_2_to_3_year_1d_status")?>
                            2 to 3 years
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12">1.e.
                            <?php echo createCheckbox("i_131_3_to_4_year_1e_status")?>
                            3 to 4 years
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12">1.f.
                            <?php echo createCheckbox("i_131_morethan_4_year_1f_status")?>
                            more than 4 years
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>2. Since you became a permanent resident of the United States, have you ever filed a Federal income tax return as
                    a nonresident or failed to file a Federal income tax return because you considered yourself to be a nonresident? <i>(If "Yes" give details on a separate sheet of paper.)</i></label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_since_you_became_2_status")?>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
     <p style=" text-align: right;"><b>Page 4 of 5</b></p>
    <div class="row mt-5 gap-4">
        <div class="bg-info">
            <h4><i><b>Part 6. Complete Only If Applying for a Refugee Travel Document</b> </i></h4>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">1. Country from which you are a refugee or asylee:</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_131_country_which_are_you_refugee" maxlength="20" value="<?php echo showData('i_131_country_which_are_you_refugee')?>">
                </div>
            </div>
            <p><b>If you answer "Yes" to any of the following questions, you
                    must explain on a separate sheet of paper. Include your
                    Name and A-Number on the top of each sheet.</b></p>
            <div class="form-group">
                <label>2. Do you plan to travel to the country
                    named above?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_do_you_plan_to_travel_2_status")?>
                </div>
            </div>
            <p class="form-group"><b>Since you were accorded refugee/asylee status, have you ever:</b></p>
            <div class="form-group">
                <label>3.a. Returned to the country named
                    above?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_since_you_were_accorded_3a_status")?>
                </div>
            </div>
            <div class="form-group">
                <label>3.b. Applied for and/or obtained a national passport, passport
                    renewal, or entry permit of that country?
                </label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_applied_obtained_3b_status")?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>3.c. Applied for and/or received any benefit from such country
                    (for example, health insurance benefits)?
                </label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_received_benefit_3c_status")?>
                </div>
            </div>
            <p class="form-group"><b>Since you were accorded refugee/asylee status, have you, by
                    any legal procedure or voluntary act:
                </b></p>
            <div class="form-group">
                <label>4.a. Reacquired the nationality of the
                    country named above?
                </label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_reacquired_nationality_4a_status")?>
                </div>
            </div>
            <div class="form-group">
                <label>4.b. Acquired a new nationality?
                </label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_reacquired_new_nationality_4b_status")?>
                </div>
            </div>
            <div class="form-group">
                <label>
                    4.c. Been granted refugee or asylee status
                    in any other country?
                </label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_been_granted_refugee_4c_status")?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info">
            <h4><i><b>Part 7. Complete Only If Applying for Advance Parole</b> </i></h4>
        </div>
        <div class="col-md-6">
            <p class="form-group">On a separate sheet of paper, explain how you qualify for an
                Advance Parole Document, and what circumstances warrant
                issuance of advance parole. Include copies of any documents
                you wish considered. (See instructions.)</p>
            <div class="form-group">
                <label for=""> 1. How many trips do you intend to use this document?</label> <br>

                <label class="col-md-4 ">
                    <input type='radio' name='i_131_how_many_trip_entend' value="one" 
                    <?php echo (showData('i_131_how_many_trip_entend')=='one')?'checked':''?>>
                    One Trip
                </label>

                <div class="form-group">
                    <label class="col-md-6">
                        <input type='radio' name='i_131_how_many_trip_entend' value="more" 
                        <?php echo (showData('i_131_how_many_trip_entend')=='more')?'checked':''?>>
                        More than one trip
                    </label>
                </div>
            </div>
            <div class="form-group"> If the person intended to receive an Advance Parole Document is outside the United
                States, provide the location (City or Town and Country)
                of the U.S. Embassy or consulate or the DHS overseas office that you want us to notify. </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. City or Town</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="36" name="i_131_overseas_notification_city_town" 
                    value="<?php echo showData('i_131_overseas_notification_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.b. Country </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="36" name="i_131_overseas_notification_country" value="<?php echo showData('i_131_overseas_notification_country')?>">
                </div>
            </div>
            <div class="form-group">
                If the travel document will be delivered to an overseas office,
                where should the notice to pick up the document be sent?:
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.
                    <?php echo createCheckbox("i_131_the_address_shown_3_status")?>
                    To the address shown in <b>Part 2 (2.h. through 2.p.)</b>
                    of this form.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4.
                    <?php echo createCheckbox("i_131_the_address_shown_4_status")?>
                    To the address shown in Part 7 (4.a. through 4.i.)
                    of this form
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">4.a. In Care of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="travel_advance_parole_address_care_of_name" maxlength="29" value="<?php echo showData('travel_advance_parole_address_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="travel_advance_parole_address_street_number" maxlength="29" value="<?php echo showData('travel_advance_parole_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>4.c. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="travel_advance_parole_address_apt_ste_flr" value="apt"
                            <?php echo (showData('travel_advance_parole_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="travel_advance_parole_address_apt_ste_flr" value="ste"
                            <?php echo (showData('travel_advance_parole_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="travel_advance_parole_address_apt_ste_flr" value="flr"
                            <?php echo (showData('travel_advance_parole_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="travel_advance_parole_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('travel_advance_parole_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="travel_advance_parole_address_city_town" maxlength="20" 
                    value="<?php echo showData('travel_advance_parole_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="travel_advance_parole_address_state">
                        <option style="" value=''>Select</option>
                        <?php
            foreach ($allDataCountry as $record) {
                if($record->state_code==showData('travel_advance_parole_address_state')) $selected = "selected"; else $selected = "";
                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
            }
            ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="travel_advance_parole_address_zip_code" maxlength="5" 
                    value="<?php echo showData('travel_advance_parole_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="travel_advance_parole_address_postal_code" maxlength="9" 
                    value="<?php echo showData('travel_advance_parole_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.h. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="travel_advance_parole_address_province" maxlength="20" value="<?php echo showData('travel_advance_parole_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="travel_advance_parole_address_country" maxlength="29" 
                    value="<?php echo showData('travel_advance_parole_address_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-12" style="margin-bottom: 10px; padding-left:15px;">4.j. Daytime Phone
                    Number</label>
                <div class="col-md-offset-2" style="display: flex; align-items: center;">
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="travel_advance_parole_daytime_tel1"  value="<?php echo showData('travel_advance_parole_daytime_tel1')?>">
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="travel_advance_parole_daytime_tel2"  value="<?php echo showData('travel_advance_parole_daytime_tel2')?>">
                    </div>
                    <div style="flex: 1;">
                        <input type="text" class="form-control" maxlength="4" name="travel_advance_parole_daytime_tel3" value="<?php echo showData('travel_advance_parole_daytime_tel3')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info">
            <h4><i><b>Part 8. Employment Authorization For New Period of Parole Under Operation Allies Welcome</b> </i>
            </h4>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>1. I am requesting an Employment Authorization Document (EAD) upon approval of my new Operation
                    Allies Welcome (OAW) period of parole.</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("i_131_requesting_employment_authorization_1_status")?>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 5 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
 <p style=" text-align: right;"><b>Page 5 of 5</b></p>
    <div class="row mt-5 gap-4">
        <div class="bg-info">
            <h4><b>Part 9. Signature of Applicant </b> <i>(Read the information on penalties in the Form instructions 
                    before completing this Part.) If you are filing for a Re-entry Permit or Refugee Travel Document,
                    you must be in the United States to file this application.</i>
            </h4>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="padding-left: 15px;">
                <label>1.a. I certify, under penalty of perjury under the laws of the United States of America, that
                    this application and the evidence submitted with it is all true and correct. I authorize the release of any information from my records
                    that U.S. Citizenship and Immigration Services needs to determine eligibility for the benefit I am seeking. </label> 
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Signature of Applicant</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-6">1.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <div class="d-flexible">
                        ►<input type="date" class="form-control" name="i_131_applicant_sign_date" 
                        value="<?php echo showData('i_131_applicant_sign_date')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-12" style="margin-bottom: 5px; padding-left:15px;">2. Daytime Phone
                    Number</label>
                <div class="col-md-offset-2" style="display: flex; align-items: center;">
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="i_131_applicant_daytime_tel1"
                            value="<?php echo showData('i_131_applicant_daytime_tel1')?>">
                    </div>
                    <div style="flex: 1; margin-right: 10px;">
                        <input type="text" class="form-control" maxlength="3" name="i_131_applicant_daytime_tel2"
                            value="<?php echo showData('i_131_applicant_daytime_tel2')?>">
                    </div>
                    <div style="flex: 1;">
                        <input type="text" class="form-control" maxlength="4" name="i_131_applicant_daytime_tel3" 
                            value="<?php echo showData('i_131_applicant_daytime_tel3')?>">
                    </div>
                </div>
            </div>
            <div class="form-group" style="padding-left:15px;">
                <b> NOTE:</b> If you do not completely fill out this form or fail to submit required documents listed in
                the instructions, your application may be denied.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info">
            <h4><i><b>Part 10. Information About Person Who Prepared This Application, If Other Than the Applicant
                    </b></i></h4>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="padding-left:15px;">
                <b> NOTE:</b> If you are an attorney or representative, you must submit a completed Form G-28, Notice of
                Entry of Appearance as Attorney or Accredited Representative, along with this application
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b></h4>
            </div>
            <p><b>Provide the following information concerning the preparer:</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_131_preparer_family_last_name" value="<?php echo showData('i_131_preparer_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_131_preparer_family_given_first_name" value="<?php echo showData('i_131_preparer_family_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2. Preparer's Business or Organization Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="i_131_preparer_business_name" value="<?php echo showData('i_131_preparer_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_131_preparer_mailing_address_street_number" maxlength="25" value="<?php echo showData('i_131_preparer_mailing_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_131_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_131_preparer_mailing_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_131_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_131_preparer_mailing_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_131_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_131_preparer_mailing_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_131_preparer_mailing_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_131_preparer_mailing_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_131_preparer_mailing_address_city_town" maxlength="20" value="<?php echo showData('i_131_preparer_mailing_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_131_preparer_mailing_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_131_preparer_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>"; }?>
                    </select>
                </div>
            </div>
            <div class="form-group"><label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_131_preparer_mailing_address_zip_code" maxlength="5" value="<?php echo showData('i_131_preparer_mailing_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_131_preparer_mailing_address_postal_code" maxlength="9" value="<?php echo showData('i_131_preparer_mailing_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_131_preparer_mailing_address_province" maxlength="20" value="<?php echo showData('i_131_preparer_mailing_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_131_preparer_mailing_address_country" maxlength="39" value="<?php echo showData('i_131_preparer_mailing_address_country')?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <label>4. Preparer's Daytime Phone Number</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" maxlength="3" name="i_131_preparer_daytime_tel1" value="<?php echo showData('i_131_preparer_daytime_tel1')?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" maxlength="3" name="i_131_preparer_daytime_tel2" value="<?php echo showData('i_131_preparer_daytime_tel2')?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" maxlength="4"  name="i_131_preparer_daytime_tel3" value="<?php echo showData('i_131_preparer_daytime_tel3')?>">
                    </div>
                </div>
                <div class="col-md-4 from-group">
                    <label>Extension</label>
                    <input type="text" class="form-control" name="i_131_preparer_extension" maxlength="6" value="<?php echo showData('i_131_preparer_extension')?>">
                </div>
            </div>
            <div class="form-group">
              5. Preparer's E-mail Address (if any)
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_131_preparer_email_address" maxlength="25" value="<?php echo showData('i_131_preparer_email_address')?>">
                </div>
            </div>
            <p><b>Declaration</b></p>
            <p>
                To be completed by all preparers, including attorneys and authorized representatives: I declare that I
                prepared this benefit request at the request of the applicant, that it is based on all the information
                is true to the best of my knowledge.
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">6.a. Signature of Preparer </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">6.b. Date of Intended Departure (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <div class="d-flexible">
                        ►<input type="date" class="form-control" maxlength="" name="i_131_preparer_intended_sign_date" value="<?php echo showData('i_131_preparer_intended_sign_date')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <b>NOTE:</b> If you require more space to provide any additional information, use a separate sheet of paper. You must include your Name and A-Number on the top of each sheet.
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<?php include "intake_footer.php"?>