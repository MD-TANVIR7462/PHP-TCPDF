<?php
$meta_title 	=   "INTAKE FOR FORM I-918A";
$page_heading 	=   "Intake Form I-918, Supplement A, Petition for Qualifying Family Member of U-1 Recipient";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 1 of 7</p>
            </b>
        </div>
       

    </div>
    <div class="row  mt-3 border-add">
        <div class="col-md-6 container border-add ">
            <!-- <div>
                <p><b><span class="fs-4"
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span>&nbsp;<span class="fs-6"> START HERE -
                            Type or print in black
                            ink.</span> </b></p>
                </div> -->
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
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control" maxlength="9"
                            name="information_about_your_qualifying_family_member_other_social_security_number"
                            value="<?php echo showData('information_about_your_qualifying_family_member_other_social_security_number')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. USCIS Online Account Number (if any) </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_other_uscis_online_account_number" maxlength="12"
                            value="<?php echo showData('information_about_your_qualifying_family_member_other_uscis_online_account_number')?>">
                    </div>
                </div>
            </div>
			
            <div>
                <div class="bg-info">
                    <h4><b>Your Full Name</b> </h4>
                </div>
				
					<label><p><b>NOTE:</b> Your card will be issued in this name.</p></label>
                <div class="form-group">
                    <label class="control-label col-md-5">3.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_family_last_name"
                            value="<?php echo showData('information_about_you_family_last_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">3.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">3.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
				<label><p>4. Has your name legally changed since the issuance of your Permanent Resident Card?</p></label>
			
                    <div class="d-flexible ">
                        <input type="hidden" name="i_918_g_28_box_is_selected" id="i_918_g_28_box_is_selected" 
                            value="<?php echo (showData('i_918_g_28_box_is_selected') == 'Y') ? 'Y' : 'N'; ?>" />
                        <input type="checkbox" onChange="checkboxValue(this,'i_918_g_28_box_is_selected')" <?php echo (showData('i_918_g_28_box_is_selected') == 'Y') ? 'checked' : ''; ?>>
                        <p><b>Yes (Proceed to Item Numbers 5.a. - 5.c.)</b></p>
                    </div>
					<div class="d-flexible ">
                        <input type="hidden" name="i_918_g_28_box_is_selected" id="i_918_g_28_box_is_selected" 
                            value="<?php echo (showData('i_918_g_28_box_is_selected') == 'Y') ? 'Y' : 'N'; ?>" />
                        <input type="checkbox" onChange="checkboxValue(this,'i_918_g_28_box_is_selected')" <?php echo (showData('i_918_g_28_box_is_selected') == 'Y') ? 'checked' : ''; ?>>
                        <p><b>No (Proceed to Item Numbers 6.a. - 6.i.)</b></p>
                    </div>
					<div class="d-flexible ">
                        <input type="hidden" name="i_918_g_28_box_is_selected" id="i_918_g_28_box_is_selected" 
                            value="<?php echo (showData('i_918_g_28_box_is_selected') == 'Y') ? 'Y' : 'N'; ?>" />
                        <input type="checkbox" onChange="checkboxValue(this,'i_918_g_28_box_is_selected')" <?php echo (showData('i_918_g_28_box_is_selected') == 'Y') ? 'checked' : ''; ?>>
                        <p><b>N/A - I never received my previous card. (Proceed to Item Numbers 6.a. - 6.i.)</b></p>
                    </div>
            </div>
			
			
					
<label><p>Provide your name exactly as it is printed on your current Permanent Resident Card</p></label>
<label><p>NOTE: Attach all evidence of your legal name change with this application.</p></label>
<div class="form-group">
                    <label class="control-label col-md-5">5.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_family_last_name"
                            value="<?php echo showData('information_about_you_family_last_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
</div>
			
            
			<div class="col-md-6 mt-5">
			
			<div class="bg-info">
                <h4><b> Mailing Address</b>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. In Care Of Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34"
                        name="information_about_you_safe_mailing_care_of_name"
                        value="<?= showData('information_about_you_safe_mailing_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_street_number" maxlength="28"
                        value="<?= showData('information_about_you_safe_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>6.c. </b> &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="information_about_you_safe_mailing_number" maxlength="6" value="<?= showData('information_about_you_safe_mailing_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_city_town"maxlength="20"
                        value="<?= showData('information_about_you_safe_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_safe_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_safe_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_zip_code" maxlength="5"
                        value="<?= showData('information_about_you_safe_mailing_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_province" maxlength="20"
                        value="<?= showData('information_about_you_safe_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_postal_code" maxlength="9"
                        value="<?= showData('information_about_you_safe_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_country"maxlength="39"
                        value="<?php echo showData('information_about_you_safe_mailing_country')?>">
                </div>
            </div>
			
			<div class="bg-info">
                <h4><b> Physical Address </b>
                </h4>
            </div>
			<label>Provide this information only if different than mailing address.</label>
            <div class="form-group">
                <label class="control-label col-md-5">7.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_street_number" maxlength="28"
                        value="<?= showData('information_about_you_safe_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>7.b. </b> &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="information_about_you_safe_mailing_number" maxlength="6" value="<?= showData('information_about_you_safe_mailing_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_city_town"maxlength="20"
                        value="<?= showData('information_about_you_safe_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_safe_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_safe_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_zip_code" maxlength="5"
                        value="<?= showData('information_about_you_safe_mailing_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_province" maxlength="20"
                        value="<?= showData('information_about_you_safe_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_postal_code" maxlength="9"
                        value="<?= showData('information_about_you_safe_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_country"maxlength="39"
                        value="<?php echo showData('information_about_you_safe_mailing_country')?>">
                </div>
            </div>
			
			
            
          
        </div>
    </div>
    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 2 of 7</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b> Part 1. Information About You (continued)</b></h4>
				<h4><b> Additional Information</b></h4>
            </div>
			
			<div class="control-label  "><b>8. Gender </b> &nbsp;
                <input type="radio" name="i_918a_infor_about_family_member_gender" value="male" 
                <?php echo (showData('i_918a_infor_about_family_member_gender')=='male') ?'checked':''?>> Male &nbsp;

                <input type="radio" name="i_918a_infor_about_family_member_gender" value="female" 
                <?php echo (showData('i_918a_infor_about_family_member_gender')=='female') ?'checked':''?>> Female &nbsp;
            </div>
			
			<div class="form-group">
                <label class="control-label col-md-5">9. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="information_about_your_qualifying_family_member_other_info_date_of_birth"
                        value="<?= showData('information_about_your_qualifying_family_member_other_info_date_of_birth')?>" />
                </div>
            </div>
			 <div class="form-group">
                <label class="control-label col-md-12">10. City/Town/Village of Birth  </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_country_of_birth" maxlength="39"
                        value="<?= showData('information_about_your_qualifying_family_member_other_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">11. Country of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_country_of_birth" maxlength="39"
                        value="<?= showData('information_about_your_qualifying_family_member_other_country_of_birth')?>">
                </div>
            </div>
			
			<label>Mother's Name </label>
			<div class="form-group">
                    <label class="control-label col-md-5">12. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
            </div>
			<label>Father's Name </label>
			<div class="form-group">
                    <label class="control-label col-md-5">12. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
            </div>
			
			<div class="form-group">
                <label class="control-label col-md-12">10. City/Town/Village of Birth  </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_country_of_birth" maxlength="39"
                        value="<?= showData('information_about_your_qualifying_family_member_other_country_of_birth')?>">
                </div>
            </div>
			
			
            <div class="form-group">
                <label class="control-label col-md-12">4.a. In Care Of Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34"
                        name="information_about_you_safe_mailing_care_of_name"
                        value="<?= showData('information_about_you_safe_mailing_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_street_number" maxlength="28"
                        value="<?= showData('information_about_you_safe_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>4.c. </b> &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="information_about_you_safe_mailing_number" maxlength="6" value="<?= showData('information_about_you_safe_mailing_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_city_town"maxlength="20"
                        value="<?= showData('information_about_you_safe_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_safe_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_safe_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_zip_code" maxlength="5"
                        value="<?= showData('information_about_you_safe_mailing_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_province" maxlength="20"
                        value="<?= showData('information_about_you_safe_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_postal_code" maxlength="9"
                        value="<?= showData('information_about_you_safe_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_you_safe_mailing_country"maxlength="39"
                        value="<?php echo showData('information_about_you_safe_mailing_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <span class="heading-md"><i>Other Information About Qualifying Family
                &nbsp;Member</i>
                </span>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. A-Number (if any)
                </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible ">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><b>A-</b><input type="text" maxlength="9"
                            class="form-control"
                            name="information_about_your_qualifying_family_member_other_a_number"
                            value="<?php echo showData('information_about_your_qualifying_family_member_other_a_number')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. U.S Social Security Number (if any) :
                </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control" maxlength="9"
                            name="information_about_your_qualifying_family_member_other_social_security_number"
                            value="<?php echo showData('information_about_your_qualifying_family_member_other_social_security_number')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7. USCIS Online Account Number (if any) : </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_other_uscis_online_account_number" maxlength="12"
                            value="<?php echo showData('information_about_your_qualifying_family_member_other_uscis_online_account_number')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control" name="information_about_your_qualifying_family_member_other_info_date_of_birth"
                        value="<?= showData('information_about_your_qualifying_family_member_other_info_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9. Country of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_country_of_birth" maxlength="39"
                        value="<?= showData('information_about_your_qualifying_family_member_other_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10. Country of Citizenship or Nationality </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_country_of_citizen" maxlength="39"
                        value="<?= showData('information_about_your_qualifying_family_member_other_country_of_citizen')?>">
                </div>
            </div>
            <div class="control-label  "><b>11. Marital Status </b> &nbsp;
                <input type="radio" name="i_918a_info_about_your_marital_status" value="single" 
                <?php echo (showData('i_918a_info_about_your_marital_status')=='single')?'checked':''?>> Single &nbsp;

                <input type="radio" name="i_918a_info_about_your_marital_status" value="married" 
                <?php echo (showData('i_918a_info_about_your_marital_status')=='married')?'checked':''?>> Married &nbsp;

                <input type="radio" name="i_918a_info_about_your_marital_status" value="divorced" 
                <?php echo (showData('i_918a_info_about_your_marital_status')=='divorced')?'checked':''?>> Divorced &nbsp;

                <input type="radio" name="i_918a_info_about_your_marital_status"  value="widowed" 
                <?php echo (showData('i_918a_info_about_your_marital_status')=='widowed')?'checked':''?>> Widowed
            </div>

            <div class="control-label  "><b>12. Gender </b> &nbsp;
                <input type="radio" name="i_918a_infor_about_family_member_gender" value="male" 
                <?php echo (showData('i_918a_infor_about_family_member_gender')=='male') ?'checked':''?>> Male &nbsp;

                <input type="radio" name="i_918a_infor_about_family_member_gender" value="female" 
                <?php echo (showData('i_918a_infor_about_family_member_gender')=='female') ?'checked':''?>> Female &nbsp;
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">13. Form I-94 Arrival-Departure Record Number
                </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_other_a_number" maxlength="11"
                            value="<?php echo showData('information_about_your_qualifying_family_member_other_a_number')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14. Passport Number </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_passport_number" maxlength="26"
                        value="<?= showData('information_about_your_qualifying_family_member_other_passport_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">15. Travel Document Number </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20"
                        name="information_about_your_qualifying_family_member_other_travel_document_number"
                        value="<?= showData('information_about_your_qualifying_family_member_other_travel_document_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. Country of Issuance for Passport or Travel
                Document</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39"
                        name="information_about_your_qualifying_family_member_other_country_of_issuance"
                        value="<?= showData('information_about_your_qualifying_family_member_other_country_of_issuance')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">17. Date of Issuance for Passport or Travel Document
                (mm/dd/yyyy)
                </label>
                <div class="ms-10">
                    <div class="ms-auto col-md-7">
                        <input type="date" class="form-control" name="information_about_your_qualifying_family_member_other_date_of_issuance_for_passport_travel"
                            value="<?= showData('information_about_your_qualifying_family_member_other_date_of_issuance_for_passport_travel')?>" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">18. Expiration Date for Passport or Travel Document
                (mm/dd/yyyy)
                </label>
                <div class="ms-10">
                    <div class="ms-auto col-md-7">
                        <input type="date" class="form-control"
                            name="information_about_your_qualifying_family_member_other_expiration_date_passport_travel"
                            value="<?= showData('information_about_your_qualifying_family_member_other_expiration_date_passport_travel')?>">
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Part 4. Additional Information About Your Qualifying Family &nbsp;Member</b></h4>
            </div>
            <h5><b>Provide the date of last entry, place of last entry, and
                current immigration status for your family member if he or
                she is currently in the United States
                </b>
            </h5>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Date of Last Entry into the United States
                (mm/dd/yyyy)
                </label>
                <div class="ms-10">
                    <div class="ms-auto col-md-7">
                        <input type="date" class="form-control"
                            name="additional_information_about_your_qualifying_family_member_date_of_last_entry"
                            value="<?= showData('additional_information_about_your_qualifying_family_member_date_of_last_entry')?>">
                    </div>
                </div>
            </div>
            <h5><b>Place of Last Entry into the United States</b></h5>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. City or Town </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="28"
                        name="additional_information_about_your_qualifying_family_member_city_or_town"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_city_or_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. State </label>
                <div class="col-md-7">
                    <select class="form-control" name="additional_information_about_your_qualifying_family_member_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('additional_information_about_your_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.d. Current Immigration Status
                </label>
                <div class="">
                    <div class="ms-auto col-md-7">
                        <input type="text" class="form-control" maxlength="39"
                            name="additional_information_about_your_qualifying_family_member_current_immigration_status"
                            value="<?= showData('additional_information_about_your_qualifying_family_member_current_immigration_status')?>">
                    </div>
                </div>
            </div>
            <h5><b>Provide the date of entry, place of entry, and status at entry
                for your family member's last entry if he or she has
                previously traveled to the United States but is not currently
                in the United States. </b>
            </h5>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. Date of Last Entry into the United States
                (mm/dd/yyyy)
                </label>
                <div class="ms-10">
                    <div class="ms-auto col-md-7">
                        <input type="date" class="form-control"
                            name="additional_information_about_your_qualifying_family_member_not_in_united_states_date_of_last_entry"
                            value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_of_last_entry')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. City or Town </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="28"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. State </label>
                <div class="col-md-7">
                    <select class="form-control" name="additional_information_about_your_qualifying_family_member_states">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('additional_information_about_your_qualifying_family_member_states')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.d. Date Authorized Stay Expired (mm/dd/yyyy)
                </label>
                <div class="">
                    <div class="ms-auto col-md-7">
                        <input type="date" class="form-control"
                            name="additional_information_about_your_qualifying_family_member_not_in_united_states_date_authorized_stay_expired"
                            value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_authorized_stay_expired')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.e. Status at the Time of Entry (for example, F-1
                student, B-2 tourist, entered without inspection)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_status_at_the_time_of_entry"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_status_at_the_time_of_entry')?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 3 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Additional Information About Your
                    Qualifying Family Member (continued)</b> 
                </h4>
            </div>
            <h6><b>If your family member is outside the United States, provide
                the U.S. Consulate or inspection facility or a safe foreign
                mailing address you want notified if this supplement is
                approved.</b>
            </h6>
            <h5><b>3.a. Type of Office (Select only one box)</b></h5>
            <div class="col-md-4">
                <input type="radio" name="i_918a_additional_info_type_of_office" value="us_consulate" 
                <?php echo (showData('i_918a_additional_info_type_of_office')=='us_consulate') ?'checked':'' ?>>
                U.S. Consulate &nbsp;
            </div>
            <div class="col-md-6">
                <input type="radio" name="i_918a_additional_info_type_of_office" value="pre_flight" 
                <?php echo (showData('i_918a_additional_info_type_of_office')=='pre_flight') ?'checked':'' ?>>
                Pre-Flight Inspection &nbsp;
            </div>
            <div class="col-md-12">
                <input type="radio" name="i_918a_additional_info_type_of_office" value="port_entry" 
                <?php echo (showData('i_918a_additional_info_type_of_office')=='port_entry') ?'checked':'' ?>>
                Port-of-Entry &nbsp;
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.b. City or Town </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="20"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town2"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. State </label>
                <div class="col-md-7">
                    <select class="form-control" name="additional_information_about_your_qualifying_family_member_not_in_united_states2">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('additional_information_about_your_qualifying_family_member_not_in_united_states2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. Country </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_country"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_country')?>">
                </div>
            </div>
            <h6><b>Safe Foreign Address Where You Want Notification Sent
                (if other than U.S. Consulate, Pre-Flight Inspection,or
                Port-of-Entry) </b>
            </h6>
            <div class="form-group">
                <label class="control-label col-md-5">4.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="25"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_street_number_and_name"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_street_number_and_name')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>4.b. </b> &nbsp;
                    <input type="radio" name="additional_information_about_your_qualifying_family_member_apt_ste_flr" value="apt" <?php echo (showData('additional_information_about_your_qualifying_family_member_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="additional_information_about_your_qualifying_family_member_apt_ste_flr" value="ste" <?php echo (showData('additional_information_about_your_qualifying_family_member_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="additional_information_about_your_qualifying_family_member_apt_ste_flr" value="flr" <?php echo (showData('additional_information_about_your_qualifying_family_member_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_apt_ste_flr_input_field" maxlength="6"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_apt_ste_flr_input_field')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.c. City or Town </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town3" maxlength="20"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town3')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.d. Province </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_province" maxlength="20"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.e. Postal Code </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_postal_code"maxlength="9"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4.f. Country </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_country" maxlength="39"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_country')?>">
                </div>
            </div>
            <hr>
            <h6><b>If your family member was previously married, list the
                names of your family member's prior spouses and the dates
                his or her marriages were terminated. You must attach
                documents such as divorce decrees or death certificates</b>
            </h6>
            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_family_last_name" maxlength="29"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_given_first_name"maxlength="29"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_middle_name"maxlength="29"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_middle_name')?>">
                </div>
            </div>
        </div>
        <section class="col-md-6 ">
            <div class="form-group">
                <label class="control-label col-md-12">5.d. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_date_marriage_ended"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_marriage_ended')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5.e. Where did the marriage end?</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_where_did_marriage_end" maxlength="39"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_where_did_marriage_end')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5.f. How did the marriage end?</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_how_did_the_marriage_end" maxlength="39"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_how_did_the_marriage_end')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_family_last_name2" maxlength="39"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_family_last_name2')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_given_first_name2" maxlength="29"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_given_first_name2')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_middle_name2" maxlength="29"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_middle_name2')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.d. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_date_marriage_ended2"
                        value="<?php echo showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_marriage_ended2')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.e. Where did the marriage end?</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="text" class="form-control" class="form-control" maxlength="29"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_where_did_marriage_end2"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_where_did_marriage_end2')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.f. How did the marriage end?</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="text" class="form-control"
                        name="additional_information_about_your_qualifying_family_member_not_in_united_states_how_did_the_marriage_end2" maxlength="29"
                        value="<?= showData('additional_information_about_your_qualifying_family_member_not_in_united_states_how_did_the_marriage_end2')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Other Information </b> </h4>
            </div>
            <div class="form-group">
                <h5><b>7.a. Your family member was or is in immigration
                    proceedings. </b>
                </h5>
                <div class="col-md-6">
                   <?php echo createRadio("i_918a_part_4_other_info_immegration_process")?> 
                </div>
            </div>
            <h6 class='col-md-12'>If you answered "Yes," select the type of proceedings. If your
                family member was in proceedings in the past and is no longer
                in proceedings, provide the date of action. If your family
                member is currently in proceedings, type or print “Current” in
                the appropriate date field. Select <b>all applicable</b> boxes. Use the
                space provided in <b>Part 11. Additional Information</b> to provide
                an explanation.
            </h6>
            <div class="col-md-12">
                <h5><b>8. Your family member would like an Employment
                    Authorization Document. </b>
                </h5>
                <div class="col-md-6">
                   <?php echo createRadio("i_918a_part_4_other_info_employment_authorization")?>  
                </div>
            </div>
            <h6 class='col-md-12'><b>NOTE:</b> If you answered "Yes," submit Form I-765,
                Application for Employment Authorization Document,
                separately. If your family member is living outside the United
                States, he or she is <b>not</b> eligible to receive employment
                authorization until he or she is lawfully admitted to the United
                States. Do not file Form I-765 for a family member living
                outside the United States.
            </h6>
        </section>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 4 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Processing Information</b> </h4>
            </div>
            <h5>Answer the following questions about the family member for
                whom you are filing this supplement. For the purposes of this
                supplement, you must answer “Yes” to the following questions,
                if applicable, even if your family member's records were sealed
                or otherwise cleared or if anyone, including a judge, law
                enforcement officer, or attorney, told your family member that
                he or she no longer has a record
            </h5>
            <h5><b>NOTE:</b> If you answer “Yes” to <b>ANY</b> question in <b>Part 5</b>.,
                provide an explanation in the space provided in <b>Part 11.
                Additional Information.</b>
            </h5>
            <h5><b>NOTE:</b> : Answering “Yes” does not necessarily mean that U.S.
                Citizenship and Immigration Services (USCIS) will deny your
                Supplement A, Petition for Qualifying Family Member of U-1
                Recipient
                <br>
                <br>
                Has your family member <b>EVER:</b>
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.a. Committed a crime or offense for which he or
                    she
                    has not
                    been arrested?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part5_processing_info_1a_crime_status")?> 
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.b. Been arrested, cited, or detained by any law
                    enforcement
                    officer (including Department of Homeland Security
                    (DHS), former Immigration and Nationalization Service
                    (INS), and military officers) for any reason?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.c. Been charged with committing any crime or
                    offense? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_c")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.d. Been convicted of a crime or offense (even
                    if the violation
                    was subsequently expunged or pardoned)?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_d")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.e. Been placed in an alternative sentencing or
                    a rehabilitative
                    program (for example, diversion, deferred prosecution,
                    withheld adjudication, deferred adjudication)?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_e")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.f. Received a suspended sentence, been placed
                    on probation,
                    or been paroled? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_f")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.g. Been held in jail or prison?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_g")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.h. Been the beneficiary of a pardon, amnesty,
                    rehabilitation,
                    or other act of clemency or similar action?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_1_h")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">1.i. Exercised diplomatic immunity to avoid
                    prosecution for a
                    criminal offense in the United States?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_exercised_prosecution_1_i")?>
                    </div>
                </div>
            </article>
        </div>
        <section class="col-md-6">
            <p><b>Information About Arrests, Citations, Detentions, or Charges
                </b>
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. Why was your family member arrested, cited,
                detained, or
                charged?</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="processing_information_why_was_your_family_member_arested" maxlength="39"
                        value="<?= showData('processing_information_why_was_your_family_member_arested')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.b. Date of arrest, citation, detention, or charge
                (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control"
                        name="processing_information_family_member_date_of_arrest"
                        value="<?= showData('processing_information_family_member_date_of_arrest')?>">
                </div>
            </div>
            <p><b>Where was your family member arrested, cited, detained, or
                charged?
                </b>
            </p>
            <div class="form-group">
                <label class="control-label col-md-4">2.c. City or Town</label>
                <div class="col-md-8 ">
                    <input type="text" class="form-control" maxlength="39"
                        name="processing_information_family_member_arrest_city_town"
                        value="<?= showData('processing_information_family_member_arrest_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">2.d. State </label>
                <div class="col-md-8">
                    <select class="form-control" name="processing_information_family_member_arrest_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('processing_information_family_member_arrest_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.e. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="processing_information_family_member_arrest_country" maxlength="39"
                        value="<?= showData('processing_information_family_member_arrest_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.f. Outcome or disposition (for example, no charges
                filed,
                charges dismissed, jail, probation)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="processing_information_family_member_arrest_outcome_disposition" maxlength="39"
                        value="<?= showData('processing_information_family_member_arrest_outcome_disposition')?>">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="control-label col-md-12">3.a. Why was your family member arrested, cited,
                detained, or
                charged?</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="processing_information_why_was_your_family_member_arested2" maxlength="39"
                        value="<?= showData('processing_information_why_was_your_family_member_arested2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.b. Date of arrest, citation, detention, or charge
                (mm/dd/yyyy)</label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control"
                        name="processing_information_family_member_date_of_arrest2"
                        value="<?= showData('processing_information_family_member_date_of_arrest2')?>">
                </div>
            </div>
            <p><b>Where was your family member arrested, cited, detained, or
                charged?
                </b>
            </p>
            <div class="form-group">
                <label class="control-label col-md-4">3.c. City or Town</label>
                <div class="col-md-8 ">
                    <input type="text" class="form-control"
                        name="processing_information_family_member_arrest_city_town2" maxlength="20"
                        value="<?= showData('processing_information_family_member_arrest_city_town2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">3.d. State</label>
                <div class="col-md-8">
                    <select class="form-control" name="processing_information_family_member_arrest_state2">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('processing_information_family_member_arrest_state2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.e. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="processing_information_family_member_arrest_country2" maxlength="39"
                        value="<?= showData('processing_information_family_member_arrest_country2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.f. Outcome or disposition (for example, no charges
                filed,
                charges dismissed, jail, probation)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="processing_information_family_member_arrest_outcome_disposition2" maxlength="39"
                        value="<?= showData('processing_information_family_member_arrest_outcome_disposition2')?>">
                </div>
            </div>
        </section>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 5 of 12</p>
        </b>
    </div>
    <div class="row">
        <section class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Processing Information</b> (continued) </h4>
            </div>
            <h5>
                Has your family member <b>EVER:</b>
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Engaged in, or does he or she intend to
                    engage in,
                    prostitution or procurement of prostitution?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_4_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Engaged in any unlawful commercialized vice,
                    including,
                    but not limited to, illegal gambling?
                    Y</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_4_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Knowingly encouraged, induced, assisted,
                    abetted, or
                    aided any alien to try to enter the United States illegally? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_4_c")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">4.d. Illicitly trafficked in any controlled
                    substance or knowingly
                    assisted, abetted, or colluded in the illicit trafficking of any
                    controlled substance?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_4_d")?>
                    </div>
                </div>
            </article>
            <h5>Has your family member <b>EVER</b> committed, planned or
                prepared, participated in, threatened to, attempted to, conspired
                to commit, gathered information for, or solicited funds for any
                of the following:
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Hijacking or sabotage of any conveyance
                    (including an
                    aircraft, vessel, or vehicle)?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_5_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Seizing or detaining, and threatening to
                    kill, injure, or
                    continue to detain, another individual in order to compel a
                    third person (including a governmental organization) to
                    do or abstain from doing any act as an explicit or implicit
                    condition for the release of the individual seized or
                    detained?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_5_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Assassination?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_5_c")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">5.d. The use of any firearm with intent to
                    endanger, directly or
                    indirectly, the safety of one or more individuals or to
                    cause substantial damage to property?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_5_d")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">5.e. The use of any biological agent, chemical
                    agent, nuclear
                    weapon or device, explosive, or other weapon or
                    dangerous device, with intent to endanger, directly or
                    indirectly, the safety of one or more individuals or to
                    cause substantial damage to property? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_5_e")?>
                    </div>
                </div>
            </article>
        </section>
        <section class="col-md-6">
            <h5>
                Has your family member <b>EVER</b> been a member of, solicited
                money or members for, provided support for, attended military
                training (as defined in section 2339D(c)(1) of Title 18, United
                States Code) by or on behalf of, or been associated with any
                other group of two or more individuals, whether organized or
                not, which has been designated as, or has engaged in or has a
                subgroup which has been designated as, or has engaged in:
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. A terrorist organization under section 219
                    of the
                    Immigration and Nationality Act (INA)?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Hijacking or sabotage of any conveyance
                    (including an
                    aircraft, vessel, or vehicle)?
                    Y</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Seizing or detaining, and threatening to
                    kill, injure, or
                    continue to detain, another individual in order to compel a
                    third person (including a governmental organization) to
                    do or abstain from doing any act as an explicit or implicit
                    condition for the release of the individual seized or
                    detained?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_c")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">6.d. Assassination?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_d")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">6.e. The use of any firearm with intent to
                    endanger, directly or
                    indirectly, the safety of one or more individuals or to cause
                    substantial damage to property? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_e")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">6.f. The use of any biological agent, chemical
                    agent, nuclear
                    weapon or device, explosive, or other weapon or dangerous
                    device, with intent to endanger, directly or indirectly, the
                    safety of one or more individuals or to cause substantial
                    damage to property?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_f")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">
                    6.g. Soliciting money or members or otherwise
                    providing
                    material support to a terrorist organization?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_6_g")?>
                    </div>
                </div>
            </article>
            <br>
            <p><b>Does your family member intend to engage in the United States
                in: </b>
            </p>
            <br>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Espionag</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_7_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Any unlawful activity, or any activity the
                    purpose of
                    which is in opposition to, or the control, or overthrow of
                    the Government of the United States? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_7_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Solely, principally, or incidentally in any
                    activity related
                    to espionage or sabotage or to violate any law involving
                    the export of goods, technology, or sensitive information?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_7_c")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">8. Has your family member EVER been or does he
                    or she
                    continue to be a member of the Communist or other
                    totalitarian party, except when membership was
                    involuntary? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_8_membership_was_involuntary")?>
                    </div>
                </div>
            </article>
        </section>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 6 of 12</p>
        </b>
    </div>
    <div class="row">
        <section class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Processing Information</b> (continued) </h4>
            </div>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">9. &nbsp;&nbsp;Has your family member EVER,
                    during the period
                    of
                    March 23, 1933 to May 8, 1945, in association with
                    either the Nazi Government of Germany or any
                    organization or government associated or allied with the
                    Nazi Government of Germany, ordered, incited, assisted
                    or otherwise participated in the persecution of any person
                    because of race, religion, nationality, membership in a
                    particular social group or political opinion?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_9_political_opinion")?>
                    </div>
                </div>
            </article>
            <h5>Has your family member <b>EVER</b> ordered, incited, called for,
                committed, assisted, helped with, or otherwise participated in any
                of the following: 
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-8">10.a. &nbsp;&nbsp;Acts involving torture or
                    genocide?
                    </label>
                    <div class="col-md-3 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">10.b. &nbsp;&nbsp;Killing any person? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">10.c. &nbsp;&nbsp;Intentionally and severely
                    injuring any
                    person?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_c")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">10.d. &nbsp;&nbsp;Engaging in any kind of sexual
                    conduct or
                    relations with
                    any person who was being forced or threatened?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_d")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">10.e. &nbsp;&nbsp;Limiting or denying any
                    person's ability to
                    exercise
                    religious beliefs?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_e")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">10.f. &nbsp;&nbsp;The persecution of any person
                    because of
                    race, religion,
                    national origin, membership in a particular social group,
                    or political opinion?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_f")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">10.g. &nbsp;&nbsp;Displacing or moving any person
                    from their
                    residence by
                    force, threat of force, compulsion, or duress?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_10_g")?>
                    </div>
                </div>
            </article>
            <br>
            <p><b>NOTE:</b> If you answered "Yes" to any question in <b>Item
                Numbers 10.a</b>. - <b>10.g.</b>, please describe the circumstances in the
                spaces provided in <b>Part 11. Additional Information.</b>
            </p>
            <br>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">11. &nbsp;&nbsp;Has your family member EVER
                    advocated that
                    another
                    person commit any of the acts described in Item
                    Numbers 10.a. - 10.g., urged, or encouraged another
                    person, to commit such acts?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_11_commit_such_acts")?>
                    </div>
                </div>
            </article>
            <p>Has your family member <b>EVER</b> been present or nearby when
                any person was: 
            </p>
            <br>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">12.a. &nbsp;&nbsp;Intentionally killed, tortured,
                    beaten, or
                    injured?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_12_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">12.b. &nbsp;&nbsp;Displaced or moved from his or
                    her residence
                    by force,
                    compulsion, or duress?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_12_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">12.c. &nbsp;&nbsp;In any way compelled or forced
                    to engage in
                    any kind of
                    sexual contact or relations?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_12_c")?>
                    </div>
                </div>
            </article>
        </section>
        <section class="col-md-6">
            <h5>
                Has your family member <b>EVER</b>
            </h5>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">13.a. &nbsp;&nbsp;Served in, been a member of,
                    assisted in,
                    or
                    participated
                    in any military unit, paramilitary unit, police unit, selfdefense unit, vigilante
                    unit, rebel group, guerilla group,
                    militia, or other insurgent organization?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_13_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">13.b. &nbsp;&nbsp;Served in any prison, jail,
                    prison camp,
                    detention facility,
                    labor camp, or any other situation that involved detaining
                    persons?
                    Y</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_13_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">13.c. &nbsp;&nbsp;Served in, been a member of,
                    assisted in,
                    or
                    participated
                    in any group, unit, or organization of any kind in which
                    you or other persons transported, possessed, or used any
                    type of weapon? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_13_c")?>
                    </div>
                </div>
            </article>
            <p>
                <b>NOTE:</b> If you answered "Yes" to any question in <b>Item
                Numbers 13.a. - 13.c.</b>, please describe the circumstances in
                <b>Part 11. Additional Information.</b>
                <br><br>
                Has your family member <b>EVER</b>
            </p>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">14.a. &nbsp;&nbsp;Received any type of military,
                    paramilitary, or weapons
                    training?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_14_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">14.b. &nbsp;&nbsp;Been a member of, assisted in,
                    or
                    participated in any
                    group, unit, or organization of any kind in which you or
                    other persons used any type of weapon against any person
                    or threatened to do so? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_14_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">14.c. &nbsp;&nbsp;Assisted or participated in
                    selling or
                    providing weapons to
                    any person who to your knowledge used them against
                    another person, or in transporting weapons to any person
                    who to your knowledge used them against another
                    person?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_14_c")?>
                    </div>
                </div>
            </article>
            <p>
                <b>NOTE:</b> If you answered "Yes" to any question in <b>Item
                Numbers 14.a. - 14.c.</b>, please describe the circumstances in
                <b>Part 11. Additional Information.</b>
                <br><br>
                Has your family member <b>EVER</b>
            </p>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">
                    15.a. &nbsp;&nbsp;Recruited, enlisted, conscripted, or used any person under 15
                    years of age to serve in or help an armed force or group? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_15_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12"> 15.b. &nbsp;&nbsp; Used any person under 15
                    years of age to
                    take part in
                    hostilities, or to help or provide services to people in
                    combat?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_15_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">16. &nbsp;&nbsp;Is your family member NOW in
                    removal,
                    exclusion,
                    rescission, or deportation proceedings? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_16_deporation_processdings")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">17. &nbsp;&nbsp;Has your family member EVER had
                    removal,
                    exclusion,
                    rescission, or deportation proceedings initiated against
                    him or her?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_17_removal_exclusion_resission")?>
                    </div>
                </div>
            </article>
        </section>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 7 of 12</p>
        </b>
    </div>
    <div class="row">
        <section class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Processing Information</b> (continued) </h4>
            </div>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">18. &nbsp;&nbsp;Has your family member EVER been
                    removed, excluded,
                    or deported from the United States?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_18_deported_from_the_united_state")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">19. &nbsp;&nbsp;Has your family member EVER been
                    ordered to be
                    removed, excluded, or deported from the United States?
                    </label>
                    <div class="col-md-3 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_19")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">20. &nbsp;&nbsp;Has your family member EVER been
                    denied a visa or
                    denied admission to the United States? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_20")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">21. &nbsp;&nbsp;Has your family member EVER been
                    granted voluntary
                    departure by an immigration officer or an immigration
                    judge and failed to depart within the allotted time?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_21")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">22. &nbsp;&nbsp;Is your family member NOW under a
                    final order or civil
                    penalty for violating section 274C of the INA (producing
                    and/or using false documentation to unlawfully satisfy a
                    requirement of the INA)?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_22")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">23. &nbsp;&nbsp;Has your family member EVER, by
                    fraud or willful
                    misrepresentation of a material fact, sought to procure or
                    procured a visa or other documentation, for entry into the
                    United States or any immigration benefit?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_23")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">24. &nbsp;&nbsp;Has your family member EVER left
                    the United States to
                    avoid being drafted into the U.S. Armed Forces or U.S.
                    Coast Guard?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_24")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">25. &nbsp;&nbsp;Has your family member EVER been
                    a J nonimmigrant
                    exchange visitor who was subject to the 2-year foreign
                    residence requirement and not yet complied with that
                    requirement or obtained a waiver of such? </label>
                    <div class="col-md-7 col-md-offset-8">
                         <?php echo createRadio("i_918a_part_5_processing_information_continued_25")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">26. &nbsp;&nbsp;Has your family member EVER
                    detained, retained, or
                    withheld the custody of a child, having a lawful claim to
                    United States citizenship, outside the United States from a
                    United States citizen granted custody?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_26")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">27. &nbsp;&nbsp;Does your family member plan to
                    practice polygamy in the
                    United States? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_27")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">28. &nbsp;&nbsp;Has your family member EVER
                    entered the United States
                    as a stowaway? </label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_28")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">29.a. &nbsp;&nbsp;Does your family member NOW
                    have a communicable
                    disease of public health significance?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_29_a")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">29.b. &nbsp;&nbsp;Does your family member NOW
                    have or has your family
                    member EVER had a physical or mental disorder and
                    behavior (or a history of behavior that is likely to recur)
                    associated with the disorder which has posed or may pose
                    a threat to the property, safety, or welfare of yourself or
                    others?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_29_b")?>
                    </div>
                </div>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-12">29.c. &nbsp;&nbsp;Is your family member NOW or
                    has your family member
                    EVER been a drug abuser or drug addict?</label>
                    <div class="col-md-7 col-md-offset-8">
                        <?php echo createRadio("i_918a_part_5_processing_information_continued_29_c")?>
                    </div>
                </div>
            </article>
        </section>
        <section class="col-md-6 ">
            <div class="bg-info">
                <h4><b>Part 6. Information About Your Qualifying
                    Family Member's Spouse and/or Children</b> 
                </h4>
            </div>
            <p> Provide the following information about your family member's
                spouse and/or children. If you need extra space to complete this
                section, use the space provided in <b>Part 11. Additional Information.</b>
            </p>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_family_last_name" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_family_last_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_given_first_name" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_middle_name" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">2. Date of Birth (mm/dd/yyyy) </label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control"
                            name="information_about_family_member_spouse_children_date_of_birth"
                            value="<?php echo showData('information_about_family_member_spouse_children_date_of_birth')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_country_of_birth" maxlength="39"
                            value="<?php echo showData('information_about_family_member_spouse_children_country_of_birth')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4. Relationship </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_relationship" maxlength="39"
                            value="<?php echo showData('information_about_family_member_spouse_children_relationship')?>">
                    </div>
                </div>
                <hr>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-5">5.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_family_last_name2" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_family_last_name2')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_given_first_name2" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_given_first_name2')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_middle_name2" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_middle_name2')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6. Date of Birth (mm/dd/yyyy) </label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control"
                            name="information_about_family_member_spouse_children_date_of_birth2"
                            value="<?php echo showData('information_about_family_member_spouse_children_date_of_birth2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_country_of_birth2" maxlength="39"
                            value="<?php echo showData('information_about_family_member_spouse_children_country_of_birth2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">8. Relationship </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_relationship2" maxlength="39"
                            value="<?php echo showData('information_about_family_member_spouse_children_relationship2')?>">
                    </div>
                </div>
                <hr>
            </article>
            <article>
                <div class="form-group">
                    <label class="control-label col-md-5">9.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_family_last_name3" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_family_last_name3')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_given_first_name3" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_given_first_name3')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_middle_name3" maxlength="29"
                            value="<?php echo showData('information_about_family_member_spouse_children_middle_name3')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">10. Date of Birth (mm/dd/yyyy) </label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control"
                            name="information_about_family_member_spouse_children_date_of_birth3"
                            value="<?php echo showData('information_about_family_member_spouse_children_date_of_birth3')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">11. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_country_of_birth3" maxlength="39"
                            value="<?php echo showData('information_about_family_member_spouse_children_country_of_birth3')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">12. Relationship </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control"
                            name="information_about_family_member_spouse_children_relationship3" maxlength="39"
                            value="<?php echo showData('information_about_family_member_spouse_children_relationship3')?>">
                    </div>
                </div>
            </article>
        </section>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 8 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 8 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Petitioner's Statement, Contact Information, Declaration, and Signature </b>
                </h4>
            </div>
            <p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-198
                Instructions before completing this part.
            </p>
            <div class="bg-info">
                <h4><b>Petitioner's Statement</b> </h4>
            </div>
            <p><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
                applicable, select the box for <b>Item Number 2.</b>
            </p>
            <div class="d-flexible">
                <b>1.a.</b>
                <?php echo createCheckbox("i_918a_prat_7_petitioner_statement")?>
                <p>I can read and understand English, and I have read
                    and understand every question and instruction on
                    this supplement and my answer to every question.
                </p>
            </div>
            <div class="d-flexible">
                <b>1.b.</b> 
                <?php echo createCheckbox("i_918a_prat_7_petitioner_statement_1_b")?>

                <p>The interpreter named in <b>Part 9.</b> read to me every
                    question and instruction on this application and my
                    answer to every question in
                </p>
            </div>
            <input type="text" class="form-control"
                name="i_918a_petitioner_info_language_name"
                value="<?php echo showData('i_918a_petitioner_info_language_name')?>" />
            <p>a language in which I am fluent, and I understood
                everything.
            </p>
            <div class="d-flexible">
                <b>2.</b> 
                <?php echo createCheckbox("i_918a_part_7_petitioner_statement_2")?>

                <p>At my request, the preparer named in <b>Part 10.</b></p>
            </div>
            <input type="text" class="form-control"
                name="i_918a_petitioner_info_statement_preparer_named"
                value="<?php echo showData('i_918a_petitioner_info_statement_preparer_named')?>" />
            <p>prepared this application for me based only upon
                information I provided or authorized.
            </p>
            <div class="bg-info">
                <h4><b>Petitioner's Contact Information</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Petitioner's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_petitioner_daytime_tel" maxlength="15" value="<?php echo showData('i_918a_petitioner_daytime_tel')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Petitioner's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_petitioner_mobile" maxlength="15" value="<?php echo showData('i_918a_petitioner_mobile')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Petitioner's Email Address (if any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_petitioner_email" maxlength="39" value="<?php echo showData('i_918a_petitioner_email')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Petitioner's Declaration and Certification</b> </h4>
            </div>
            <p>Copies of any documents I have submitted are exact photocopies
                of unaltered, original documents, and I understand that USCIS
                may require that I submit original documents to USCIS at a later
                date. Furthermore, I authorize the release of any information
                from any of my records that USCIS may need to determine my
                eligibility for the immigration benefit I seek.
            </p>
            <p>I further authorize release of information contained in this
                supplement, in supporting documents, and in my USCIS records
                to other entities and persons where necessary for the
                administration and enforcement of U.S. immigration laws.
            </p>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <p>I understand that USCIS may require me to appear for an
                appointment to take my biometrics (fingerprints, photograph,
                and/or signature) and, at that time, if I am required to provide
                biometrics, I will be required to sign an oath reaffirming that: 
            </p>
            <p>&nbsp;&nbsp;<b>1) </b> I provided or authorized all of the information
                contained in, and submitted with, my supplement;
            </p>
            <p>&nbsp;&nbsp;<b>2) </b> I reviewed and understood all of the information in,
                and submitted with, my supplement; and
            </p>
            <p>&nbsp;&nbsp;<b>3) </b> All of this information was complete, true, and
                correct at the time of filing. 
            </p>
            <p>I certify, under penalty of perjury, that all of the information in
                my supplement and any document submitted with it were
                provided or authorized by me, that I reviewed and understand
                all of the information contained in, and submitted with, my
                supplement, and that all of this information is complete, true,
                and correct 
            </p>
            <div class="bg-info">
                <h4><b>Petitioner's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Petitioner's Signature (sign in ink) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_918a_petitioner_sign_date" value="<?php echo showData('i_918a_petitioner_sign_date')?>"/>
                </div>
            </div>
            <p><b>NOTE TO ALL PETITIONERS:</b>If you do not completely fill
                out this supplement or fail to submit required documents listed
                in the Instructions, USCIS may deny your supplement.
            </p>
            <div class="bg-info">
                <h4><b>Part 8. Qualifying Family Member's Statement, Contact Information, Declaration, and
                    Signature </b> 
                </h4>
            </div>
            <h5><b>NOTE: Read the Penalties section of the Form I-918 Instructions before completing this
                part.</b>
            </h5>
            <div class="bg-info">
                <h4><b>Qualifying Family Member's Statement </b> </h4>
            </div>
            <h5><b>NOTE: Select the box for either Item Number 1.a. or 1.b. If applicable, select the box
                for Item Number 2.</b>
            </h5>
            <div class="form-group">
                <label class="control-label col-md-12">1.a.
                <?php echo createCheckbox("i_918a_petitioner_info_part8_1a")?>

                I can read and understand English, and I have read
                and understand every question and instruction on
                this petition and my answer to every question.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b.
                <?php echo createCheckbox("i_918a_petitioner_info_part8_1b")?>

                The interpreter named in Part 9. read to me every
                question and instruction on this supplement and my
                answer to every question in </label>
                <input type="text" class="form-control"
                    name="i_918a_petitioner_info_part8_1b_answer"
                    value="<?php echo showData('i_918a_petitioner_info_part8_1b_answer')?>" />
                <p>a language in which I am fluent, and I understood
                    everything.
                </p>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.
                <?php echo createCheckbox("i_918a_petitioner_info_part8_2")?>
                At my request, the preparer named in Part 10.,</label>
                <input type="text" class="form-control"
                    name="i_918a_petitioner_info_part8_2_answer"
                    value="<?php echo showData('i_918a_petitioner_info_part8_2_answer')?>" />
                <p>prepared this supplement for me based only upon information I provided or authorized.
                </p>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 9 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 9 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Qualifying Family Member's Statement,
                    Contact Information, Declaration, and Signature
                    (Continued) </b> 
                </h4>
            </div>
            <div class="bg-info">
                <h4><b>Qualifying Family Member's Contact Information</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Qualifying Family Member's Daytime Telephone
                Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="qualifying_family_member_info_daytime_tel_number" maxlength="15"
                        value="<?php echo showData('qualifying_family_member_info_daytime_tel_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Qualifying Family Member's Mobile Telephone Number
                (if any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="qualifying_family_member_info_mobile_tel_number" maxlength="15"
                        value="<?php echo showData('qualifying_family_member_info_mobile_tel_number')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Email Address (if any) (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="qualifying_family_member_info_email_address" maxlength="39"
                        value="<?php echo showData('qualifying_family_member_info_email_address')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Qualifying Family Member's Declaration and Certification </b> </h4>
            </div>
            <h5><b>Copies of any documents I have submitted are exact
                photocopies of unaltered, original documents, and I understand
                that USCIS may require that I submit original documents to
                USCIS at a later date. Furthermore, I authorize the release of
                any information from any of my records that USCIS may need
                to determine my eligibility for the immigration benefit I seek</b>
            </h5>
            <h5><b>I further authorize release of information contained in this
                supplement, in supporting documents, and in my USCIS
                records to other entities and persons where necessary for the
                administration and enforcement of U.S. immigration laws. Any
                disclosure shall be in accordance with 8 U.S.C. section 1367
                and 8 CFR 214.14(e).
                </b>
            </h5>
            <h5><b>I understand that USCIS may require me to appear for an
                appointment to take my biometrics (fingerprints, photograph,
                and/or signature) and, at that time, if I am required to provide
                biometrics, I will be required to sign an oath reaffirming that: </b>
            </h5>
            <h5><b>1) I provided or authorized all of the information
                contained in, and submitted with, my supplement;
                2) I reviewed and understood all of the information in,
                and submitted with, my supplement; and
                3) All of this information was complete, true, and
                correct at the time of filing.
                </b>
            </h5>
            <h5><b>I certify, under penalty of perjury, that all of the information in
                my supplement and any document submitted with it were
                provided or authorized by me, that I reviewed and understand
                all of the information contained in, and submitted with, my
                supplement, and that all of this information is complete, true,
                and correct.
                </b>
            </h5>
            <div class="bg-info">
                <h4><b>Qualifying Family Member's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Qualifying Family Member's Signature (sign in
                ink) </label>
                <div class="col-md-12">
                    <input type="text" disabled class="form-control" name="qualifying_family_member_info_sign_in_link"
                    value="<?php echo showData('qualifying_family_member_info_sign_in_link')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control"
                        name="qualifying_family_member_info_date_of_signature"
                        value="<?php echo showData('qualifying_family_member_info_date_of_signature')?>" />
                </div>
            </div>
            <p><b>NOTE TO ALL QUALIFYING FAMILY MEMBERS:</b> If
                you do not completely fill out this supplement or fail to submit
                required documents listed in the Instructions, USCIS may deny
                your supplement.
            </p>
        </div>

        <!-- left side column end -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 9. Interpreter's Contact Information,
                    Certification, and Signature </b> 
                </h4>
            </div>
            <h5><b>Provide the following information about the interpreter</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_interpreter_family_last_name" maxlength="39"
                    value="<?php echo showData('i_918a_interpreter_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_family_given_first_name"  maxlength="39"
                        value="<?php echo showData('i_918a_interpreter_family_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if
                any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_business_name" maxlength="34"
                        value="<?php echo showData('i_918a_interpreter_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_street_number" maxlength="25"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_918a_interpreter_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_918a_interpreter_mailing_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_918a_interpreter_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_918a_interpreter_mailing_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_918a_interpreter_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_918a_interpreter_mailing_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_city_town" maxlength="20"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_918a_interpreter_mailing_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_918a_interpreter_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_zip_code" maxlength="5"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_province" maxlength="20"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_postal_code" maxlength="9"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mailing_address_country" maxlength="39"
                        value="<?php echo showData('i_918a_interpreter_mailing_address_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_daytime_tel" maxlength="15"
                        value="<?php echo showData('i_918a_interpreter_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_mobile" maxlength="15"
                        value="<?php echo showData('i_918a_interpreter_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="39"
                        name="i_918a_interpreter_email"
                        value="<?php echo showData('i_918a_interpreter_email')?>">
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 10 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 10 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 9. Interpreter's Contact Information,
                    Certification, and Signature  (continued) </b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Certification</b> </h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group">
                <p class="control-label col-md-5">I am fluent in English and</p>
                <div class="col-md-5">
                    <input type="text" class="form-control"
                        name="i_918a_interpreter_certification_language_skill"
                        value="<?php echo showData('i_918a_interpreter_certification_language_skill')?>">
                </div>
            </div>
            <h5><b>which is the same language specified in Part 7., Item Number
                1.b., and Part 8. Item Number 1.b., and I have read to this
                petitioner and qualifying family member in the identified
                language(s) every question and instruction on this supplement
                and the petitioner's and qualifying family member's answer to
                every question. The petitioner and qualifying family member
                informed me that they understand every instruction, question,
                and answer on the supplement, including the Petitioner's
                Declaration and Certification and the Qualifying Family
                Member's Declaration and Certification, and have verified
                the accuracy of every answer</b>
            </h5>
            <div class="bg-info">
                <h4><b>Interpreter's Signature</b> </h4>
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
                    <input type="date" class="form-control" name="i_918a_interpreter_sign_date" value="<?php echo showData('i_918a_interpreter_sign_date')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 10. Contact Information, Declaration, and
                    Signature of the Person Preparing this Petition, if
                    Other Than the Petitioner or Qualifying Family
                    Member</b> 
                </h4>
            </div>
            <p>Provide the following information about the preparer.</p>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                    name="i_918a_preparer_family_last_name" maxlength="39"
                    value="<?php echo showData('i_918a_preparer_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_preparer_family_given_first_name" maxlength="39"
                        value="<?php echo showData('i_918a_preparer_family_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if
                any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_preparer_business_name" maxlength="34"
                        value="<?php echo showData('i_918a_preparer_business_name')?>">
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
                    <input type="text" class="form-control" name="i_918a_preparer_mailing_address_street_number" maxlength="25"
                        value="<?php echo showData('i_918a_preparer_mailing_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_918a_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_918a_preparer_mailing_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_918a_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_918a_preparer_mailing_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_918a_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_918a_preparer_mailing_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_918a_preparer_mailing_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_918a_preparer_mailing_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_918a_preparer_mailing_address_city_town" maxlength="20"
                        value="<?php echo showData('i_918a_preparer_mailing_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_918a_preparer_mailing_address_state">
                        <option style="" value="">Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_918a_preparer_mailing_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_918a_preparer_mailing_address_zip_code" maxlength="5"
                        value="<?php echo showData('i_918a_preparer_mailing_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_918a_preparer_mailing_address_province" maxlength="20"
                        value="<?php echo showData('i_918a_preparer_mailing_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_918a_preparer_mailing_address_postal_code"maxlength="9"
                        value="<?php echo showData('i_918a_preparer_mailing_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"  name="i_918a_preparer_mailing_address_country" maxlength="39"
                        value="<?php echo showData('i_918a_preparer_mailing_address_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Contact Information</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_preparer_daytime_tel" maxlength="15"
                        value="<?php echo showData('i_918a_preparer_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_preparer_mobile" maxlength="15"
                        value="<?php echo showData('i_918a_preparer_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_918a_preparer_email" maxlength="39"
                        value="<?php echo showData('i_918a_preparer_email')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Statement</b> </h4>
            </div>
            <div class="d-flexible">
                <b>7.a.</b> 
                <?php echo createCheckbox("i_918a_preparer_statement_7a")?>

                <p>I am not an attorney or accredited representative but
                    have prepared this supplement on behalf of the
                    petitioner and qualifying family member and with the
                    petitioner's and qualifying family member's consent.
                </p>
            </div>
            <div class="d-flexible">
                <b>7.b.</b> 
                <?php echo createCheckbox("i_918a_preparer_statement_7b")?>

                <p>I am an attorney or accredited representative and my
                    representation of the petitioner and qualifying family
                    member in this case
                    <?php echo createCheckbox("i_918a_preparer_statement_7b_extend")?>  extends 
                    <?php echo createCheckbox("i_918a_preparer_statement_7b_not_extend")?>  does not extend beyond the preparation of this supplement.
                </p>
            </div>
            <p><b>NOTE:</b> If you are an attorney or accredited
                representative whose representation extends beyond
                preparation of this supplement, you may be obliged to
                submit a completed Form G-28, Notice of Entry of
                Appearance as Attorney or Accredited Representative,
                with this supplement.
            </p>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 11 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 11 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 10. Contact Information, Declaration, and
                    Signature of the Person Preparing this Petition, if
                    Other Than the Petitioner or Qualifying Family
                    Member (continued)</b> 
                </h4>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this supplement at the request of the petitioner and
                qualifying family member. The petitioner and qualifying family
                member then reviewed this completed supplement and informed
                me that they understand all of the information contained in, and
                submitted with, this supplement, including the Petitioner's
                Declaration and Certification, and the Qualifying Family
                Member's Declaration and Certification, and that all of this
                information is complete, true, and correct. I completed this
                supplement based only on information that the petitioner and
                qualifying family member provided to me or authorized me to
                obtain or use.
            </p>
            <div class="bg-info">
                <h4><b>Preparer's Signature</b> </h4>
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
                    <input type="date" class="form-control" name="i_918a_preparer_sign_date"
                        value="<?php echo showData('i_918a_preparer_sign_date')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-5 col-md-offset-1"></div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="data[password]" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 12 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 12 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 11. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information,
                within this supplement, use the space below. If you need more
                space than what is provided, you may make copies of this page
                to complete and file with this supplement or attach a separate
                sheet of paper. Include your name and A-Number ( if any ) at the
                top of each sheet; indicate the Page Number, Part Number,
                and Item Number to which your answer refers; and sign and
                date each sheet.
            </p>
            <div class="bg-info">
                <h4><b>Your Full Name (Principal)</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control"  name="i_918a_additional_info_last_name"
                        value="<?php echo showData('i_918a_additional_info_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_918a_additional_info_first_name"
                        value="<?php echo showData('i_918a_additional_info_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_918a_additional_info_middle_name"
                        value="<?php echo showData('i_918a_additional_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
                            class="form-control"
                            name="i_918a_additional_info_a_number"
                            value="<?php echo showData('i_918a_additional_info_a_number')?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_3a_page_no" maxlength="2"
                            value="<?php echo showData('i_918a_additional_info_3a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_3b_part_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_3b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_3c_item_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_3c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea name="i_918a_additional_info_3d" class="form-control" maxlength="321" cols="30" rows="10"><?php echo showData('i_918a_additional_info_3d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_4a_page_no" maxlength="2"
                            value="<?php echo showData('i_918a_additional_info_4a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_4b_part_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_4b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_4c_item_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_4c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea name="i_918a_additional_info_4d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_918a_additional_info_4d')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_5a_page_no" maxlength="2"
                            value="<?php echo showData('i_918a_additional_info_5a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_5b_part_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_5b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_5c_item_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_5c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea name="i_918a_additional_info_5d" class="form-control" maxlength="321" cols="30" rows="10"><?php echo showData('i_918a_additional_info_5d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_6a_page_no" maxlength="2"
                            value="<?php echo showData('i_918a_additional_info_6a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_6b_part_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_6b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_6c_item_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_6c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea name="i_918a_additional_info_6d" class="form-control" maxlength="321" cols="30" rows="10"><?php echo showData('i_918a_additional_info_6d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_7a_page_no" maxlength="2"
                            value="<?php echo showData('i_918a_additional_info_7a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_7b_part_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_7b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_918a_additional_info_7c_item_no" maxlength="6"
                            value="<?php echo showData('i_918a_additional_info_7c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="i_918a_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_918a_additional_info_7d')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php"?>