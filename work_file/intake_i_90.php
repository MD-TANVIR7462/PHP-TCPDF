<?php
$meta_title 	=   "INTAKE FOR FORM I-90";
$page_heading 	=   "INTAKE FOR FORM I-90, Application to Replace Permanent Resident Card";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align: right"><b>Page 1 of 7</b></p>
	</div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Alien Registration Number (A-Number) :
                </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">A-</span><input type="text" class="form-control" maxlength="9"
                            name="other_information_about_you_alien_registration_number" value="<?php echo showData("other_information_about_you_alien_registration_number")?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. USCIS Online Account Number (if any) </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number"
                            maxlength="29" value="<?php echo showData("other_information_about_you_uscis_online_account_number")?>">
                    </div>
                </div>
            </div>
			<div class="bg-info">
				<h4><b>Your Full Name</b></h4>
			</div>
			<label>
				<p><b>NOTE:</b> Your card will be issued in this name.</p>
			</label>
			<div class="form-group">
				<label class="control-label col-md-5">3.a. Family Name(Last Name)</label>
				<div class="col-md-7">
					<input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.b. Given Name(First Name)</label>
				<div class="col-md-7">
					<input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3.c. Middle Name</label>
				<div class="col-md-7">
					<input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
						value="<?php echo showData('information_about_you_middle_name')?>" />
				</div>
			</div>
			<label>
				<p>4. Has your name legally changed since the issuance of your Permanent Resident Card?</p>
			</label>
			<div class="d-flexible">
				<?php echo createCheckbox("i_90_has_your_namechange_yes_status")?>
				<p><b>Yes (Proceed to Item Numbers 5.a. - 5.c.)</b></p>
			</div>
			<div class="d-flexible">
				<?php echo createCheckbox("i_90_has_your_namechange_no_status")?>
				<p><b>No (Proceed to Item Numbers 6.a. - 6.i.)</b></p>
			</div>
			<div class="d-flexible">
				<?php echo createCheckbox("i_90_has_your_namechange_na_status")?>
				<p><b>N/A - I never received my previous card. (Proceed to Item Numbers 6.a. - 6.i.)</b></p>
			</div>
            <label>
                <p>Provide your name exactly as it is printed on your current Permanent Resident Card</p>
            </label>
            <label>
                <p>NOTE: Attach all evidence of your legal name change with this application.</p>
            </label>
            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_other_family_last_name" value="<?php echo showData('information_about_you_other_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_other_given_first_name" value="<?php echo showData('information_about_you_other_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_other_middle_name" value="<?php echo showData('information_about_you_other_middle_name')?>" />
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">

            <div class="bg-info">
                <h4><b> Mailing Address</b>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="information_about_you_us_mailing_care_of_name" value="<?= showData('information_about_you_us_mailing_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_street_number" maxlength="21" value="<?= showData('information_about_you_us_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>6.c. </b> &nbsp;
                    <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value" maxlength="6" value="<?= showData('information_about_you_us_mailing_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="20" value="<?= showData('information_about_you_us_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_us_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_us_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code" maxlength="5" value="<?= showData('information_about_you_us_mailing_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_province" maxlength="20" value="<?= showData('information_about_you_us_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_postal_code" maxlength="9" value="<?= showData('information_about_you_us_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.i. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_country" maxlength="39" value="<?php echo showData('information_about_you_us_mailing_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Physical Address </b></h4>
            </div>
            <label>Provide this information only if different than mailing address.</label>
            <div class="form-group">
                <label class="control-label col-md-5">7.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_street_number" maxlength="29" value="<?= showData('information_about_you_home_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>7.b. </b> &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value" maxlength="6" value="<?= showData('information_about_you_home_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value" maxlength="" value="<?= showData('information_about_you_home_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_home_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_home_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_zip_code" maxlength="5" value="<?= showData('information_about_you_home_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_province" maxlength="29" value="<?= showData('information_about_you_home_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_postal_code" maxlength="9" value="<?= showData('information_about_you_home_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_country" maxlength="34" value="<?php echo showData('information_about_you_home_country')?>">
                </div>
            </div>
        </div>
    </div>
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 2 of 7</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b> Part 1. Information About You (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b> Additional Information</b></h4>
            </div>
            <div class="form-group" style="padding-left:10px;">
                <div class="control-label">
                    <b>8. Gender </b> &nbsp;
                    <input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender')=='male') ? 'checked' : '' ?>> Male
                    &nbsp;
                    <input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender')=='female') ? 'checked' : '' ?>>
                    Female &nbsp;
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">9. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?= showData('other_information_about_you_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10. City/Town/Village of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_city_of_birth" maxlength="29" value="<?= showData('other_information_about_you_city_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">11. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="39" value="<?= showData('other_information_about_you_country_of_birth')?>">
                </div>
            </div>

            <label>Mother's Name </label>
            <div class="form-group">
                <label class="control-label col-md-5">12. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="parent2_info_given_first_name" value="<?php echo showData('parent2_info_given_first_name')?>" />
                </div>
            </div>
            <label>Father's Name </label>
            <div class="form-group">
                <label class="control-label col-md-5">13. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="parent1_info_given_first_name" value="<?php echo showData('parent1_info_given_first_name')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">14. Class of Admission </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_class_of_addmission" maxlength="29" value="<?= showData('other_information_about_you_class_of_addmission')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">15. Date of Admission (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="other_information_about_you_date_of_admission" value="<?= showData('other_information_about_you_date_of_admission')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">16. U.S. Social Security Number (if any)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="22" name="other_information_about_you_social_security_number" value="<?= showData('other_information_about_you_social_security_number')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 2. Application Type</b></h4>
            </div>
            <p><b>NOTE: </b>If your conditional permanent resident status (for
                example: CR1, CR2, CF1, CF2) is expiring within the next 90
                days, then do not file this application. (See the What is the
                Purpose of This Application section of the Form I-90
                Instructions for further information.)</p>
            <br>
            <p>My status is (Select <b>only one</b> box):</p>
            <br>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("i_90_application_type_1a_resident_status")?>
                <p>Lawful Permanent Resident (Proceed to Section A.)
                </p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.b.</b>
                <?php echo createCheckbox("i_90_application_type_1b_commuter_status")?>
                <p>Permanent Resident - In Commuter Status
                    (Proceed to Section A.)
                </p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.c.</b>
                <?php echo createCheckbox("i_90_application_type_1c_conditional_status")?>
                <p>Conditional Permanent Resident
                    (Proceed to Section B.)
                </p>
            </div>
        </div>

        <!-- left side end -->
        <div class="col-md-6">

            <div class="bg-info">
                <h4><b> Reason for Application (Select only one box)</b></h4>
            </div>

            <p><b>Section A. </b>(To be used only by a lawful permanent resident or
                a permanent resident in commuter status.)</p>


            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.a.</b>
                <?php echo createCheckbox("i_90_application_reason_2a_status")?>
                <p>My previous card has been lost, stolen, or destroyed.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.b.</b>
                <?php echo createCheckbox("i_90_application_reason_2b_status")?>
                <p>My previous card was issued but never received.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.c.</b>
                <?php echo createCheckbox("i_90_application_reason_2c_status")?>
                <p>My existing card has been mutilated.</p>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.d.</b>
                <?php echo createCheckbox("i_90_application_reason_2d_status")?>
                <p>My existing card has incorrect data because of
                    Department of Homeland Security (DHS) error.
                    (Attach your existing card with incorrect data along
                    with this application.)</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.e.</b>
                <?php echo createCheckbox("i_90_application_reason_2e_status")?>
                <p>My name or other biographic information has been legally changed since issuance of my existing card.
                </p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.f.</b>
                <?php echo createCheckbox("i_90_application_reason_2f_status")?>
                <p>My existing card has already expired or will expire within six months.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.g.1.</b>
                <?php echo createCheckbox("i_90_application_reason_2g1_status")?>
                <p>I have reached my 14th birthday and am registering as required. My existing card will expire AFTER my
                    16th birthday. (See NOTE below for additional information.)</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.g.2.</b>
                <?php echo createCheckbox("i_90_application_reason_2g2_status")?>
                <p>I have reached my 14th birthday and am registering
                    as required. My existing card will expire BEFORE
                    my 16th birthday. (See NOTE below for additional
                    information.)</p>
            </div>

            <p><b>NOTE:</b> If you are filing this application before your
                14th birthday, or more than 30 days after your 14th
                birthday, you must select reason 2.j. However, if
                your card has expired, you must select reason 2.f.
            </p>
            <br>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.h.1.</b>
                <?php echo createCheckbox("i_90_application_reason_2h1_status")?>
                <p>I am a permanent resident who is taking up commuter
                    status. </p>
            </div>

            <span>
                <div class="d-flexible" style="padding-bottom:5px;">
                    <b>2.h.1.a.</b>
                    <?php echo createCheckbox("i_90_application_reason_2h1a_status")?>
                    <p>My Port-of-Entry (POE) into the United States will be:</p>

                </div>
                <div class="form-group">
                    <label class="control-label col-md-10" style="padding-left:50px;">City or Town and State</label>
                    <div class="col-md-10" style="padding-left:50px;">
                        <input type="text" maxlength="29" class="form-control" name="i_90_application_reason_city_town_state"
                            value="<?php echo showData('i_90_application_reason_city_town_state')?>" />
                    </div>
                </div>

            </span>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.h.2.</b>
                <?php echo createCheckbox("i_90_application_reason_2h2_status")?>
                <p>I am a commuter who is taking up actual residence in the United States.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.i.</b>
                <?php echo createCheckbox("i_90_application_reason_2i_status")?>
                <p>I have been automatically converted to lawful permanent resident status.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.j.</b>
                <?php echo createCheckbox("i_90_application_reason_2j_status")?>
                <p>I have a prior edition of the Alien Registration Card, or I am applying to replace my current
                    Permanent Resident Card for a reason that is not specified above.</p>
            </div>

        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 3 of 7</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Application Type (continued)</b>
                </h4>
            </div>
            <p style="padding:10px 0px;"><b>Section B.</b> (To be used only by a conditional permanent resident.)</p>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.a.</b>
                <?php echo createCheckbox("i_90_application_reason_3a_status")?>
                <p>My previous card has been lost, stolen, or destroyed.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.b.</b>
                <?php echo createCheckbox("i_90_application_reason_3b_status")?>
                <p>My previous card was issued but never received.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.c.</b>
                <?php echo createCheckbox("i_90_application_reason_3c_status")?>
                <p>My existing card has been mutilated.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.d.</b>
                <?php echo createCheckbox("i_90_application_reason_3d_status")?>
                <p>My existing card has incorrect data because of DHS error. (Attach your existing permanent resident
                    card with incorrect data along with this application.)</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.e.</b>
                <?php echo createCheckbox("i_90_application_reason_3e_status")?>
                <p>My name or other biographic information has legally changed since the issuance of my existing card.
                </p>
            </div>
            <div class="bg-info">
                <h4><b>Part 3. Processing Information</b>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Location where you applied for an immigrant visa or
                    adjustment of status:</label>
                <div class="col-md-12">
                    <input type="text" maxlength="40" class="form-control" name="i_90_processing_info_about_your_apply_location" value="<?php echo showData('i_90_processing_info_about_your_apply_location')?>" />
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">2. Location where your immigrant visa was issued or USCIS office
                    where you were granted adjustment of status:</label>
                <div class="col-md-12">
                    <input type="text" maxlength="40" class="form-control" name="i_90_processing_info_about_your_immigrant_location" value="<?php echo showData('i_90_processing_info_about_your_immigrant_location')?>" />
                </div>
            </div>
            <p style="padding:10px 20px;">Complete <b>Item Numbers 3.a.</b> and <b>3.a1</b>. if you entered the
                United States with an immigrant visa. (If you were granted
                adjustment of status, proceed to <b>Item Number 4.</b> )</p>
            <div class="form-group">
                <label class="control-label col-md-12">3.a. Destination in the United States at time of
                    admission</label>
                <div class="col-md-12">
                    <input type="text" maxlength="40" class="form-control" name="i_90_processing_info_about_your_destination_location" value="<?php echo showData('i_90_processing_info_about_your_destination_location')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">3.a.1. Port-of-Entry where admitted to the United States:
                </label>
                <p style="padding:2px 12px;">City or Town and State</p>
                <div class="col-md-12">
                    <input type="text" maxlength="40" class="form-control" name="i_90_processing_info_about_your_town_state_location" value="<?php echo showData('i_90_processing_info_about_your_town_state_location')?>" />
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">4. Have you ever been in exclusion, deportation, or removal
                    proceedings or ordered removed from the United States?</label>
                <div class="col-md-7 col-md-offset-8">
                    <?php echo createRadio("i_90_processing_info_4_removal_status")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">5. Since you were granted permanent residence, have you
                    ever filed Form I-407, Abandonment by Alien of Status as
                    Lawful Permanent Resident, or otherwise been determined
                    to have abandoned your status?</label>
                <div class="col-md-7 col-md-offset-8">
                    <?php echo createRadio("i_90_processing_info_5_residence_status")?>
                </div>
            </div>


            <p><b>NOTE</b>: If you answered "Yes" to Item Numbers 4. or 5.
                above, provide a detailed explanation in the space provided in
                Part 8. Additional Information.</p>
        </div>

        <!-- left side end -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b> Biographic Information</b></i>
                </h4>
            </div>

           <div class="form-group">
                <label>6. Ethnicity (Select only one box)</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="biographic_info_ethnicity" value="hispanic" <?php echo (showData('biographic_info_ethnicity')=='hispanic') ? 'checked':''?>>
                    <label class="form-check-label">Hispanic or Latino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="biographic_info_ethnicity" value="nothispanic" <?php echo (showData('biographic_info_ethnicity')=='nothispanic') ? 'checked':''?>>
                    <label class="form-check-label">Not Hispanic or Latino</label>
                </div>
            </div>

            <!-- Race -->
            <div class="form-group">
                <label>7. Race (Select all applicable boxes)</label>
                <div class="form-check">
                    <?php echo createCheckbox("biographic_info_race_white")?>
                    <label class="form-check-label">White</label>
                </div>
                <div class="form-check">
                    <?php echo createCheckbox("biographic_info_race_asian")?>
                    <label class="form-check-label">Asian</label>
                </div>
                <div class="form-check">
                     <?php echo createCheckbox("biographic_info_race_black_african")?>
                    <label class="form-check-label">Black or African American</label>
                </div>
                <div class="form-check">
                    <?php echo createCheckbox("biographic_info_race_american_native")?>
                    <label class="form-check-label">American Indian or Alaska Native</label>
                </div>
                <div class="form-check">
                     <?php echo createCheckbox("biographic_info_race_native_islander")?>
                    <label class="form-check-label">Native Hawaiian or Other Pacific Islander</label>
                </div>
            </div>
            <div class="form-group">
                <label>8. Height</label>
                <label style="padding-left:10%">Feet:</label>
                <select id="feet" name="biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <?php echo"<option value=".showData('biographic_info_height_feet')." selected>".showData('biographic_info_height_feet')."</option>";?>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
                <label>Inches:</label>
                <select id="inches" name="biographic_info_height_inches" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                    <?php echo"<option value=".showData('biographic_info_height_inches')." selected>".showData('biographic_info_height_inches')."</option>";?>
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
                <span><b>9. Weight</b></span>
                <span style="padding-left:10%"><b> Pounds:</b></span>

                <input type="text" maxlength="1" name="biographic_info_weight_in_pound1" value="<?php echo showData('biographic_info_weight_in_pound1')?>"
                    style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                <input type="text" maxlength="1" name="biographic_info_weight_in_pound2" value="<?php echo showData('biographic_info_weight_in_pound2')?>"
                    style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                <input type="text" maxlength="1" name="biographic_info_weight_in_pound3" value="<?php echo showData('biographic_info_weight_in_pound3')?>"
                    style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <br>
            <div>
                <label>10. Eye Color (Select only one box ) </label><br>
                <input type="radio"  name="biographic_info_eye_color" value="black" 
                <?php echo (showData('biographic_info_eye_color')=='black') ? 'checked':''?>> Black<br>

                <input type="radio"  name="biographic_info_eye_color" value="blue" 
                <?php echo (showData('biographic_info_eye_color')=='blue') ? 'checked':''?>> Blue<br>

                <input type="radio"  name="biographic_info_eye_color" value="brown" 
                <?php echo (showData('biographic_info_eye_color')=='brown') ? 'checked':''?>> Brown<br>

                <input type="radio"  name="biographic_info_eye_color" value="gray" 
                <?php echo (showData('biographic_info_eye_color')=='gray') ? 'checked':''?>> Gray<br>

                <input type="radio"  name="biographic_info_eye_color" value="green" 
                <?php echo (showData('biographic_info_eye_color')=='green') ? 'checked':''?>> Green<br>

                <input type="radio"  name="biographic_info_eye_color" value="hazel"
                <?php echo (showData('biographic_info_eye_color')=='hazel') ? 'checked':''?>> Hazel<br>

                <input type="radio"  name="biographic_info_eye_color" value="maroon" 
                <?php echo (showData('biographic_info_eye_color')=='maroon') ? 'checked':''?>> Maroon<br>

                <input type="radio"  name="biographic_info_eye_color" value="pink" 
                <?php echo (showData('biographic_info_eye_color')=='pink') ? 'checked':''?>> Pink<br>
                
                <input type="radio" name="biographic_info_eye_color" value="unknown" 
                <?php echo (showData('biographic_info_eye_color')=='unknown') ? 'checked':''?>> Unknown/Other<br>
                <br>

                <label>11. Hair Color (Select only one box )</label><br>
                <input type="radio"  name="biographic_info_hair_color" value="bald" 
                <?php echo (showData('biographic_info_hair_color')=='bald') ? 'checked':''?>> Bald (No hair)<br>

                <input type="radio" name="biographic_info_hair_color" value="black" 
                <?php echo (showData('biographic_info_hair_color')=='black') ? 'checked':''?>> Black<br>

                <input type="radio" name="biographic_info_hair_color" value="blond" 
                <?php echo (showData('biographic_info_hair_color')=='blond') ? 'checked':''?>> Blond<br>

                <input type="radio" name="biographic_info_hair_color" value="brown" 
                <?php echo (showData('biographic_info_hair_color')=='brown') ? 'checked':''?>> Brown<br>

                <input type="radio" name="biographic_info_hair_color" value="gray" 
                <?php echo (showData('biographic_info_hair_color')=='gray') ? 'checked':''?>> Gray<br>

                <input type="radio" name="biographic_info_hair_color" value="red" 
                <?php echo (showData('biographic_info_hair_color')=='red') ? 'checked':''?>> Red<br>

                <input type="radio" name="biographic_info_hair_color" value="sandy" 
                <?php echo (showData('biographic_info_hair_color')=='sandy') ? 'checked':''?>> Sandy<br>

                <input type="radio" name="biographic_info_hair_color" value="white" 
                <?php echo (showData('biographic_info_hair_color')=='white') ? 'checked':''?>> White<br>

                <input type="radio" name="biographic_info_hair_color" value="unknown" 
                <?php echo (showData('biographic_info_hair_color')=='unknown') ? 'checked':''?>> Unknown/Other<br>
            </div>

            <div class="bg-info">
                <h4><b> Part 4. Accommodations for Individuals with
                        Disabilities and/or Impairments (Read the
                        information in the Form I-90 Instructions before
                        completing this part.) </b>
                </h4>
            </div>

            <p><b>NOTE:</b> If you need extra space to complete this section, use
                the space provided in Part 8. Additional Information.</p>




            <div class="form-group">
                <label class="control-label col-md-12">1. Are you requesting an accommodation because of your
                    disabilities and/or impairments?</label>
                <div class="col-md-7 col-md-offset-8">
                    <?php echo createRadio("i_90_accomodation_1_requesting_status")?>
                </div>
            </div>



            <p>If you answered "Yes," select any applicable boxes:</p>



            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("i_90_accomodation_1a_deaf_hard_status")?>
                <p>I am deaf or hard of hearing and request the
                    following accommodation (If you are requesting a
                    sign-language interpreter, indicate for which
                    language (for example, American Sign Language)):

                </p>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea class="form-control" name="i_90_accomodation_1a_deaf_hard_text_value" maxlength="160" class="form-control" cols="30" rows="10"><?php echo showData('i_90_accomodation_1a_deaf_hard_text_value')?></textarea>
                </div>
            </div>

        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />

</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="text-align: right;">Page 4 of 7</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Accommodations for Individuals with
                        Disabilities and/or Impairments (continued)</b>
                </h4>
            </div>

            <div>
                <div class="d-flexible" style="padding-bottom:10px;">
                    <b>1.b.</b>
                    <?php echo createCheckbox("i_90_accomodation_1b_blind_vision_status")?>
                    <p>I am blind or have low vision and request the
                        following accommodation:

                    </p>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" name="i_90_accomodation_1b_blind_vision_text_value" maxlength="160" class="form-control" cols="30" rows="10"><?php echo showData('i_90_accomodation_1b_blind_vision_text_value')?></textarea>
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flexible" style="padding-bottom:10px;">
                    <b>1.c.</b>
                    <?php echo createCheckbox("i_90_accomodation_1c_disability_status")?>
                    <p>I have another type of disability and/or impairment
                        (Describe the nature of your disability and/or
                        impairment and the accommodation you are
                        requesting):

                    </p>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" name="i_90_accomodation_1c_disability_text_value" maxlength="160" class="form-control" cols="30"
                            rows="10"><?php echo showData('i_90_accomodation_1c_disability_text_value')?></textarea>
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 5. Applicant's Statement, Contact
                        Information, Certification, and Signature</b>
                </h4>
            </div>

            <p><b>NOTE:</b> Read the Penalties section of the Form I-90
                Instructions before completing this part. </p>

            <div class="bg-info">
                <h4><i><b>Applicant's Statement</b></i>
                </h4>
            </div>

            <p><b>NOTE:</b> Select the box for either Item Number 1.a. or 1.b. If
                applicable, select the box for Item Number 2.</p>


            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("i_90_applicant_statement_1a_status")?>
                <p>I can read and understand English, and I have read
                    and understand every question and instruction on this
                    application and my answer to every question.


                </p>
            </div>

            <span>
                <div class="d-flexible" style="">
                    <b>1.b.</b>
                    <?php echo createCheckbox("i_90_applicant_statement_1b_status")?>
                    <p>The interpreter named in Part 6. read to me every
                        question and instruction on this application and my
                        answer to every question in
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="35" class="form-control" name="i_90_applicant_statement_1b_text_value" value="<?php echo showData('i_90_applicant_statement_1b_text_value')?>" />
                </div>
                <p style="padding-left:40px;">a language in which I am fluent and I understood
                    everything.</p>
            </span>

            <span>
                <div class="d-flexible" style="">
                    <b>2.</b>
                    <?php echo createCheckbox("i_90_applicant_statement_2_status")?>
                    <p>At my request, the preparer named in Part 7.,
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="35" class="form-control" name="i_90_applicant_statement_2_request_text_value" value="<?php echo showData('i_90_applicant_statement_2_request_text_value')?>" />
                </div>
                <p style="padding-left:40px;">prepared this application for me based only upon
                    information I provided or authorized.</p>
            </span>
        </div>
        <!-- left side end -->

        <div class="col-md-6">

            <div class="bg-info">
                <h4><i><b>Applicant's Contact Information</b></i>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Applicant's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_applicant_day_time_telephone" maxlength="15" value="<?php echo showData('i_90_applicant_day_time_telephone')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Applicant's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_applicant_mobile_telephone" maxlength="15" value="<?php echo showData('i_90_applicant_mobile_telephone')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Applicant's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_90_applicant_email_address" maxlength="39" value="<?php echo showData('i_90_applicant_email_address')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b> Applicant's Certification</b></i>
                </h4>
            </div>
            <div>

                <p>Copies of any documents I have submitted are exact
                    photocopies of unaltered, original documents, and I understand
                    that USCIS may require that I submit original documents to
                    USCIS at a later date. Furthermore, I authorize the release of
                    any information from any of my records that USCIS may need
                    to determine my eligibility for the immigration benefit I seek.</p>
                <br>
                <p>I further authorize release of information contained in this
                    application, in supporting documents, and in my USCIS records
                    to other entities and persons where necessary for the
                    administration and enforcement of U.S. immigration laws.</p>
                <br>
                <p>I understand that USCIS will require me to appear for an
                    appointment to take my biometrics (fingerprints, photograph,
                    and/or signature) and, at that time, I will be required to sign an
                    oath reaffirming that:</p>
                <br>
                <span>
                    1) I reviewed and provided or authorized all of the
                    information in my application; <br>
                    2) I understood all of the information contained in, and
                    submitted with, my application; and <br>
                    3) All of this information was complete, true, and correct
                    at the time of filing. <br>
                </span>
                <br>
                <p>I certify, under penalty of perjury, that I provided or authorized
                    all of the information in my application, I understand all of the
                    information contained in, and submitted with, my application,
                    and that all of this information is complete, true, and correct.</p>
            </div>



            <div class="bg-info">
                <h4><b>Applicant's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Applicant's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_90_applicant_date_of_signature"
                        value="<?php echo showData('i_90_applicant_date_of_signature')?>" />
                </div>
            </div>
            <p><b>NOTE TO ALL APPLICANTS:</b>If you do not completely fill
                out this application or fail to submit required documents listed
                in the Instructions, USCIS may deny your application.
            </p>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 5 of 7</p>
            </b>
        </div>

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Interpreter's Contact Information,
                        Certification, and Signature</b>
                </h4>
            </div>
            <h5><b>Provide the following information about the interpreter</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_interpreter_family_lastname" maxlength="39" value="<?php echo showData('i_90_interpreter_family_lastname')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_interpreter_given_firstname" maxlength="39" value="<?php echo showData('i_90_interpreter_given_firstname')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if
                    any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_interpreter_business_org_name" maxlength="34" value="<?php echo showData('i_90_interpreter_business_org_name')?>"/>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Mailing Address</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_interpreter_mailing_street_number" maxlength="25" value="<?php echo showData('i_90_interpreter_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_90_interpreter_mailing_apt_ste_flr" value="apt" <?php echo (showData('i_90_interpreter_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_90_interpreter_mailing_apt_ste_flr" value="ste" <?php echo (showData('i_90_interpreter_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_90_interpreter_mailing_apt_ste_flr" value="flr" <?php echo (showData('i_90_interpreter_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_90_interpreter_mailing_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_90_interpreter_mailing_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_interpreter_mailing_city_town" maxlength="20" value="<?php echo showData('i_90_interpreter_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_90_interpreter_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_90_interpreter_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_interpreter_mailing_zipcode" maxlength="5" value="<?php echo showData('i_90_interpreter_mailing_zipcode')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_interpreter_mailing_province" maxlength="20" value="<?php echo showData('i_90_interpreter_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_interpreter_mailing_postal_code" maxlength="9" value="<?php echo showData('i_90_interpreter_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_interpreter_mailing_country" maxlength="39" value="<?php echo showData('i_90_interpreter_mailing_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Contact Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_interpreter_contact_daytime_telephone" maxlength="15" value="<?php echo showData('i_90_interpreter_contact_daytime_telephone')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_interpreter_contact_mobile_telephone" maxlength="15" value="<?php echo showData('i_90_interpreter_contact_mobile_telephone')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_90_interpreter_contact_email_address" value="<?php echo showData('i_90_interpreter_contact_email_address')?>">
                </div>
            </div>

            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_interpreter_certification" maxlength="20" value="<?php echo showData('i_90_interpreter_certification')?>">
                </div>
            </div>
            <p>which is the same language provided in <b>Part 5., Item Number
                    1.b.</b>, and I have read to this applicant in the identified language
                every question and instruction on this application and his or her
                answer to every question. The applicant informed me that he or
                she understands every instruction, question, and answer on the
                application, including the <b>Applicant's Certification</b>, and has
                verified the accuracy of every answer.</p>

        </div>
        <!-- left side column end -->

        <div class="col-md-6">

            <div class="bg-info">
                <h4><b>Interpreter's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. Interpreter's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_90_interpreter_date_of_signature"
                        value="<?php echo showData('i_90_interpreter_date_of_signature')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 7. Contact Information, Declaration, and
                        Signature of the Person Preparing this
                        Application, if Other Than the Applicant</b>
                </h4>
            </div>
            <h5><b>Provide the following information about the preparer.</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_preparer_family_lastname" maxlength="39" value="<?php echo showData('i_90_preparer_family_lastname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_preparer_given_firstname" maxlength="39" value="<?php echo showData('i_90_preparer_given_firstname')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_preparer_business_org_name" maxlength="34" value="<?php echo showData('i_90_preparer_business_org_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_preparer_mailing_street_number" maxlength="25" value="<?php echo showData('i_90_preparer_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_90_preparer_mailing_apt_ste_flr" value="apt" <?php echo (showData('i_90_preparer_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_90_preparer_mailing_apt_ste_flr" value="ste" <?php echo (showData('i_90_preparer_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_90_preparer_mailing_apt_ste_flr" value="flr" <?php echo (showData('i_90_preparer_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_90_preparer_mailing_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_90_preparer_mailing_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_preparer_mailing_city_town" maxlength="20" value="<?php echo showData('i_90_preparer_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_90_preparer_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_90_preparer_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_preparer_mailing_zipcode" maxlength="5" value="<?php echo showData('i_90_preparer_mailing_zipcode')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_preparer_mailing_province" maxlength="20" value="<?php echo showData('i_90_preparer_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_preparer_mailing_postal_code" maxlength="9" value="<?php echo showData('i_90_preparer_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_preparer_mailing_country" maxlength="39" value="<?php echo showData('i_90_preparer_mailing_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_preparer_contact_daytime_telephone" maxlength="11" value="<?php echo showData('i_90_preparer_contact_daytime_telephone')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_90_preparer_contact_mobile_telephone" maxlength="15" value="<?php echo showData('i_90_preparer_contact_mobile_telephone')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_90_preparer_contact_email_address" value="<?php echo showData('i_90_preparer_contact_email_address')?>">
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>



<!----------------------------------------------------------------------
-------------------------------- page 6 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 6 of 7</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Contact Information, Declaration, and
                        Signature of the Person Preparing this
                        Application, if Other Than the Applicant
                        (continued)</b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>7.a.</b>
                <?php echo createCheckbox("i_90_preparer_statement_7a_status")?>
                <p>I am not an attorney or accredited representative but
                    have prepared this application on behalf of the
                    applicant and with the applicant's consent.

                </p>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>7.b.</b>
                <?php echo createCheckbox("i_90_preparer_statement_7b_status")?>
                <p>I am an attorney or accredited representative and my <br>
                    representation of the applicant in this case <br>
                    <?php echo createCheckbox("i_90_preparer_statement_7b1_status")?> extends <?php echo createCheckbox("i_90_preparer_statement_7b2_status")?>does not extend beyond the
                    <br>
                    preparation of this application.
                </p>
            </div>
            <p><b>NOTE</b>: If you are an attorney or accredited
                representative whose representation extends beyond
                preparation of this application, you may be obliged to
                submit a completed Form G-28, Notice of Entry of
                Appearance as Attorney or Accredited
                Representative, with this application. </p>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this application at the request of the applicant. The
                applicant then reviewed this completed application and
                informed me that he or she understands all of the information
                contained in, and submitted with, his or her application,
                including the <b>Applicant's Certification,</b> and that all of this
                information is complete, true, and correct. I completed this
                application based only on information that the applicant
                provided to me or authorized me to obtain or use.
            </p>
            <div class="bg-info">
                <h4><b>Preparer's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.a. Preparer's Signature (sign in ink) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_90_preparer_date_of_signature" value="<?php echo showData('i_90_preparer_date_of_signature')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-5 col-md-offset-1"></div>
        <!-- no data needed -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 7 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 7 of 7</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this application, use the space below. If you need more
                space than what is provided, you may make copies of this page
                to complete and file with this application or attach a separate
                sheet of paper. Include your name and A -Number (if any) at
                the top of each sheet; indicate the Page Number, Part
                Number, and Item Number to which your answer refers; and
                sign and date each sheet.
            </p>
            <div class="bg-info">
                <h4><b> Your Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_additional_info_last_name" maxlength="28" value="<?php echo showData('i_90_additional_info_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_additional_info_first_name" maxlength="28" value="<?php echo showData('i_90_additional_info_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_90_additional_info_middle_name" maxlength="28" value="<?php echo showData('i_90_additional_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><b>A-</b>
						<input type="text" class="form-control" name="i_90_additional_info_a_number" maxlength="9" value="<?php echo showData('i_90_additional_info_a_number')?>" />
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_90_additional_info_3a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_90_additional_info_3b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_90_additional_info_3c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea class="form-control" name="i_90_additional_info_3d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_90_additional_info_3d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_90_additional_info_4a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_90_additional_info_4b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_90_additional_info_4c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea class="form-control" name="i_90_additional_info_4d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_90_additional_info_4d')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_90_additional_info_5a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_90_additional_info_5b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_90_additional_info_5c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea class="form-control" name="i_90_additional_info_5d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_90_additional_info_5d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_90_additional_info_6a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_90_additional_info_6b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_90_additional_info_6c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea class="form-control" name="i_90_additional_info_6d" maxlength="321" class="form-control" cols="30" rows="10"><?php echo showData('i_90_additional_info_6d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_90_additional_info_7a_page_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_90_additional_info_7b_part_no')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_90_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_90_additional_info_7c_item_no')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="i_90_additional_info_7d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_90_additional_info_7d')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php"?>