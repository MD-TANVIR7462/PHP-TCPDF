<?php
$meta_title     =   "INTAKE FOR FORM n-600";
$page_heading     =   "Application for Certificate of Citizenship ";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 15</b></p>
    <table style="border-collapse: collapse; ">
        <thead>
            <tr>
                <th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To 666 be completed by an
                    Attorney or Accredited Representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px;">
                    <label style="cursor: pointer;">
                        <?php echo createCheckbox("n_600_g28_status")?> Select this box if Form G-28 is attached.
                    </label>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney State Bar Number (if applicable)</label>
                        <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
                    </div>
                    <!-- <div>
						<p>Attorney State Bar Number (if applicable)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
					</div> -->
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number
                            (if any)</label>
                        <input type="text" class="form-control" value="" disabled>
                    </div>
                    <!-- <div>
						<p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number?>" disabled >
					</div> -->
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group"><h4 class="col-md-12" style="margin-top: 2%;">► START HERE - Type or print in black ink.</h4></div>
    <div class="bg-info col-md-12" style="margin-top:10px;">
        <h4><b>Part 1. Information About Your Eligibility</b></h4>
    </div>

    <div class="form-group">
        <label class="control-label col-md-offset-7 col-md-5">Enter Your 9 Digit A-Number:</label>
        <div class="col-md-offset-7 col-md-5">
            <span style="display: flex; justify-content: center; align-items: center;"><b>►A-</b> <input type="text"  maxlength="9" style="margin-left: 5px;" class="form-control" name="n_600_a_number" value="<?php echo showData('n_600_a_number') ?>" /></span>
        </div>
    </div>
    <div class="form-group">
        <label>1. This application is being filed based on the fact that: (Select only one box)</label><br>
        <div style='margin-left:5%'>
            <input type="radio" id="biological" name="information_about_you_application_filed_status" value="biological" <?php echo (showData('information_about_you_application_filed_status') == 'biological') ? 'checked' : '' ?>>
            <label for="biological">I am a BIOLOGICAL child of a U.S. citizen parent.</label><br>

            <input type="radio" id="adopted" name="information_about_you_application_filed_status" value="adopted" <?php echo (showData('information_about_you_application_filed_status') == 'adopted') ? 'checked' : '' ?>>
            <label for="adopted">I am an ADOPTED child of a U.S. citizen parent.</label><br>

            <input type="radio" id="other_fully" name="information_about_you_application_filed_status" value="other" <?php echo (showData('information_about_you_application_filed_status') == 'other') ? 'checked' : '' ?>>
            <label for="other_fully">Other (Explain fully):</label><br>
            <div class="col-md-11" style="margin-left: 4%;">
                <input type="text" maxlength="82" class="form-control" name="information_about_you_application_filed_other_value" value="<?php echo showData('information_about_you_application_filed_other_value') ?>" />
            </div>
            <p class='col-md-12'><b>NOTE:</b> If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information</b></p>
        </div>
    </div>


    <div class="bg-info col-md-12" style="margin-top:20px; margin-bottom: 15px;">
        <h4><b>Part 2. Information About You </b></h4>
    </div>
    <p class='col-md-12' style="margin-bottom: 15px;"><b>NOTE:</b> Provide information about yourself if you are a
        person applying for the Certificate of Citizenship. <b>Provide information
            about your child</b> if you are a U.S. citizen parent applying for a Certificate of Citizenship for your
        minor child.</p>

    <h5><b>1. Current Legal Name (do not provide a nickname)</b> </h5>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_middle_name') ?>">
        </div>
    </div>


    <h5><b>2. Your Name Exactly As It Appears on Your Permanent Resident Card (if different from above)</b> </h5>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_permanent_resident_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_permanent_resident_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_permanent_resident_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_permanent_resident_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_permanent_resident_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_permanent_resident_middle_name') ?>">
        </div>
    </div>


    <h5><b>3. Other Names You Have Used Since Birth Provide all other names you have ever used, include nicknames,
            maiden name, and aliases.</b> </h5>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_other_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_other_family_last_name') ?>">
            <input type="text" class="form-control" name="information_about_you_other_family_last_name2" maxlength="35"
                value="<?php echo showData('information_about_you_other_family_last_name2') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_other_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_other_given_first_name') ?>">
            <input type="text" class="form-control" name="information_about_you_other_given_first_name2" maxlength="27"
                value="<?php echo showData('information_about_you_other_given_first_name2') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_other_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_other_middle_name') ?>">
            <input type="text" class="form-control" name="information_about_you_other_middle_name2" maxlength="22"
                value="<?php echo showData('information_about_you_other_middle_name2') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">4. U.S. Social Security Number (if any)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="other_information_about_you_social_security_number" maxlength="9"
                value="<?php echo showData('other_information_about_you_social_security_number') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">5. USCIS Online Account Number (if any)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number" maxlength="12"
                value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">6. Date of Birth (mm/dd/yyyy)</label>
        <div class="col-md-12">
            <input type="date" class="form-control" name="other_information_about_you_date_of_birth" maxlength="22"
                value="<?php echo showData('other_information_about_you_date_of_birth') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">7. Country of Birth</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="35"
                value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">8. Country of Prior Citizenship or Nationality </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="35"
                value="<?php echo showData('other_information_about_you_country_of_citizen') ?>">
        </div>
    </div>
    <div class="col-md-6" >
        <label>9. Gender</label><br>
        <div style="margin-left: 5%; display: flex; align-items: center;">
            <div style="margin:0px 35px 0px 10px ">
                <input type="radio" id="p2_male" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : '' ?>>
                <label for="p2_male">Male</label>
            </div>
            <div>
                <input type="radio" id="p2_female" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : '' ?>>
                <label for="p2_female">Female</label>
            </div>
        </div>
    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 15</b></p>
   <div class=" form-group">
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">10. Mailing Address</label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
            <input type="text" class="form-control" name="information_about_you_us_mailing_care_of_name" maxlength="34"
                value="<?php echo showData('information_about_you_us_mailing_care_of_name') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div style="margin-left:1.5%; margin-right: 1.5%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value"
                    maxlength="5" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row"
            style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="40" value="<?php echo showData('information_about_you_us_mailing_city_town') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name="information_about_you_us_mailing_state"
                        style="width: 100%; padding: 5px; margin-top: 3%;">
                        <option value=''>Select</option>
                        <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_us_mailing_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code_value1" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code_value1') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code_value2" maxlength="4" value="<?php echo showData('information_about_you_us_mailing_zip_code_value2') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_foreign_province"
                        maxlength="26" value="<?php echo showData('information_about_you_us_mailing_foreign_province') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address  only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_foreign_postal_code"
                        maxlength="9" value="<?php echo showData('information_about_you_us_mailing_foreign_postal_code') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_foreign_country" maxlength="34" value="<?php echo showData('information_about_you_us_mailing_foreign_country') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="form-group">
        <div class="form-group" style="margin-bottom: 10px;">
            <h4 class="" style="width: 100%; margin-bottom: 5px;">11. Physical Address</h4>
        </div>
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px; font-size:13px;">Street Number and Name (Do
                        not provide a PO Box in this space unless it is your ONLY address.)</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="information_about_you_home_street_number" value="<?php echo showData('information_about_you_home_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value"  maxlength="5"  value="<?php echo showData('information_about_you_home_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row"
                style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_home_city_town"  maxlength="40" value="<?php echo showData('information_about_you_home_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="information_about_you_home_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_home_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                    <div class='d-flexible'>
                        <div style="width: 50%;">
                            <input type="text" class="form-control" name="information_about_you_home_zip_code_value1" maxlength="5"
                                value="<?php echo showData('information_about_you_home_zip_code_value1') ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                        <div style="width: 40%;">
                            <input type="text" class="form-control" name="information_about_you_home_zip_code_value2" maxlength="4"
                                value="<?php echo showData('information_about_you_home_zip_code_value2') ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_home_province"
                            maxlength="26" value="<?php echo showData('information_about_you_home_province') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_home_postal_code"
                            maxlength="9" value="<?php echo showData('information_about_you_home_postal_code') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_home_country" maxlength="34"
                            value="<?php echo showData('information_about_you_home_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>12. Current Marital Status</label><br>
        <div style="margin-left:2%">
            <input type="radio" id="single1" name="other_information_about_you_marital_status" value="single"
                <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : '' ?>>
            <label for="single1">Single, Never Married</label><br>

            <input type="radio" id="Married1" name="other_information_about_you_marital_status" value="married"
                <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : '' ?>>
            <label for="Married1">Married</label><br>

            <input type="radio" id="Divorced1" name="other_information_about_you_marital_status" value="divorced"
                <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : '' ?>>
            <label for="Divorced1">Divorced</label><br>

            <input type="radio" id="Widowed1" name="other_information_about_you_marital_status" value="widowed"
                <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : '' ?>>
            <label for="Widowed1">Widowed</label><br>

            <input type="radio" id="Separated1" name="other_information_about_you_marital_status" value="separated"
                <?php echo (showData('other_information_about_you_marital_status') == 'separated') ? 'checked' : '' ?>>
            <label for="Separated1">Separated</label><br>

            <input type="radio" id="Annulled1" name="other_information_about_you_marital_status" value="annulled"
                <?php echo (showData('other_information_about_you_marital_status') == 'annulled') ? 'checked' : '' ?>>
            <label for="Annulled1">Marriage Annulled </label><br>

            <input type="radio" id="Other1" name="other_information_about_you_marital_status" value="other"
                <?php echo (showData('other_information_about_you_marital_status') == 'other') ? 'checked' : '' ?>>
            <label for="Other1">Other (Explain):</label>
            <input type="text" class="form-control" name="other_information_about_you_marital_other_value" maxlength="82" value="<?php echo showData('other_information_about_you_marital_other_value') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-md-10">13. U.S. Armed Forces <br> Are you a member or veteran of any branch of the U.S. Armed Forces?</label>
        <div class="col-md-2"><?php echo createRadio("information_about_you_us_armed_force_status") ?></div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">14. Information About Your Admission into the United States and Current
            Immigration Status</label><br><br>
        <p style='margin-left:20px'><b>A. I arrived in the following manner</b></p><br>
        <p style='margin-left:20px'><b>Port-of-Entry</b></p>
    </div>
    <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 2; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="other_information_about_you_place_of_entry_city_town" maxlength="31" value="<?php echo showData('other_information_about_you_place_of_entry_city_town') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_port_of_entry_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_port_of_entry_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Date of Entry (mm/dd/yyyy)</label>
            <input type="date" class="form-control" name="other_information_about_you_date_of_entry" value="<?php echo showData('other_information_about_you_date_of_entry') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <h5 style="margin-left:25px"><b>Exact Name Used at Time of Entry</b> </h5>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="i_94_family_last_name" maxlength="35" value="<?php echo showData('i_94_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="i_94_given_first_name" maxlength="27"  value="<?php echo showData('i_94_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="i_94_middle_name" maxlength="22" value="<?php echo showData('i_94_middle_name') ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">B. I used the following travel document to be admitted to the United
            States</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"
                    style="margin-left: 30px;"><?php echo createCheckbox("other_information_about_you_passport_status") ?>Passport</label>
                <label class="control-label"
                    style="margin-left: 30px;"><?php echo createCheckbox("other_information_about_you_travel_document_status") ?>Travel Document</label>
            </div>
        </div>

        <div class=" col-md-5">
            <label class="control-label " style="margin-left: 15px;">Passport Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="other_information_about_you_passport_number" maxlength="25" value="<?php echo showData('other_information_about_you_passport_number') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Travel Document Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="other_information_about_you_travel_document_number" maxlength="25" value="<?php echo showData('other_information_about_you_travel_document_number') ?>">
            </div>
        </div>

        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Country of Issuance for Passport or</label> <br>
            <label class="control-label " style="margin-left: 15px;">Travel Document</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_94_imgt_country_issuance_passport" maxlength="37" value="<?php echo showData('i_94_imgt_country_issuance_passport') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Date Passport or Travel Document </label>
            <label class="control-label " style="margin-left: 15px;">Issued (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="i_94_imgt_date_issuance_passport"  maxlength="" value="<?php echo showData('i_94_imgt_date_issuance_passport') ?>">
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 3 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
    <h4><b>Part 2. Information About You (continued)</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">C. I am</label>
        <div style="margin-left:2%">
            <input type="radio" id="status_LPR" name="information_about_you_lpr_refugee_status" value="LPR" <?php echo (showData('information_about_you_lpr_refugee_status') == 'LPR') ? 'checked' : '' ?>>
            <label for="status_LPR">A Lawful Permanent Resident (LPR)</label><br>
            <input type="radio" id="status_Nonimmigrant" name="information_about_you_lpr_refugee_status" value="nonimmigrant"<?php echo (showData('information_about_you_lpr_refugee_status') == 'nonimmigrant') ? 'checked' : '' ?>>
            <label for="status_Nonimmigrant">A Nonimmigrant</label><br>
            <input type="radio" id="status_Refugee" name="information_about_you_lpr_refugee_status" value="refugee"<?php echo (showData('information_about_you_lpr_refugee_status') == 'refugee') ? 'checked' : '' ?>>
            <label for="status_Refugee">A Refugee/Asylee</label><br>
            <input type="radio" id="status_Other" name="information_about_you_lpr_refugee_status" value="other"<?php echo (showData('information_about_you_lpr_refugee_status') == 'other') ? 'checked' : '' ?>>
            <label for="status_Other">Other (Explain):</label>
            <input type="text" class="form-control" name="information_about_you_lpr_refugee_value" maxlength="82" value="<?php echo showData('information_about_you_lpr_refugee_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
        <p><b>NOTE</b>: If you select “Other” and you need extra space to complete this section, use the space provided
            in <b>Part 11.Additional Information</b>.</p>
    </div>
    <div class="form-group">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">D. I obtained LPR status through adjustment of status in the United States or admission as a LPR (if applicable)</label>
    </div>
    <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Date I became a LPR</label> <br>
            <label class="control-label " style="margin-left: 15px;">(mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_date_became_lpr" maxlength="" value="<?php echo showData('information_about_you_date_became_lpr') ?>">
            </div>
        </div>
        <div class=" col-md-8">
            <label class="control-label " style="margin-left: 15px;">U.S. Citizenship and Immigration Services (USCIS) Office That Granted My LPR </label>
            <label class="control-label " style="margin-left: 15px;">Status or Location Where I Was Admitted</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_uscis_granted_lpr"  maxlength="30" value="<?php echo showData('information_about_you_uscis_granted_lpr') ?>">
            </div>
        </div>
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">15. Have you previously applied for a Certificate of Citizenship or U.S. Passport?</label> <br>
        <div class="col-md-2 col-md-offset-7"><?php echo createRadio("information_about_you_applied_us_passport_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 15.</b>, provide an explanation below. If you need extra space to complete this section, use
        the space provided in <b>Part 11. Additional Information</b></p>
        <input type="text" class="form-control" name="information_about_you_applied_us_passport" maxlength="82" value="<?php echo showData('information_about_you_applied_us_passport') ?>" style="width: 95%; padding: 5px; margin:0px 0px 5px 2%" />
        </div>
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">16. Have you ever abandoned or lost your LPR status?</label> <br>
        <div class="col-md-2 col-md-offset-4"><?php echo createRadio("information_about_you_have_lost_lpr_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 16.</b>, provide an explanation below. If you need extra space to complete this section, use
        the space provided in <b>Part 11. Additional Information.</b></p>
        <input type="text" class="form-control" name="information_about_you_have_lost_lpr" maxlength="82" value="<?php echo showData('information_about_you_have_lost_lpr') ?>" style="width: 95%; padding: 5px; margin:0px 0px 5px 2%" />
        </div>
        
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">17. Were you adopted?</label> <br>
        <div class="col-md-2 col-md-offset-2"><?php echo createRadio("information_about_you_adopted_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 17</b>., complete <b>Items A. - D.</b></p>
        <p class="col-md-12"><b>A.</b> Place of Final Adoption</p>
        </div>

        <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="information_about_you_place_of_adoption_city_town" maxlength="34" value="<?php echo showData('information_about_you_place_of_adoption_city_town') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_place_of_adoption_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_place_of_adoption_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="form-group" style="flex: 2; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
            <input type="text" class="form-control" name="information_about_you_place_of_adaption_country" value="<?php echo showData('information_about_you_place_of_adaption_country') ?>"
             maxlength='40'   style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">B. Date of Adoption <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="date" class="form-control" name="information_about_you_date_of_adoption" maxlength="35" value="<?php echo showData('information_about_you_date_of_adoption') ?>"></div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">C. Date Legal Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="date" class="form-control" name="information_about_you_date_legal_custody" maxlength="27" value="<?php echo showData('information_about_you_date_legal_custody') ?>"></div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">D. Date Physical Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"> <input type="date" class="form-control" name="information_about_you_date_physical_custody" maxlength="22" value="<?php echo showData('information_about_you_date_physical_custody') ?>"> </div>
    </div>
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">18. Did you have to be re-adopted in the United States?</label> <br>
        <div class="col-md-2 col-md-offset-4"><?php echo createRadio("information_about_you_re_adopted_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 18</b>., complete <b>Items A. - D.</b></p>
        <p class="col-md-12"><b>A.</b> Place of Final Adoption</p>
        </div>

        <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="information_about_you_re_adopted_city_town" maxlength="34" value="<?php echo showData('information_about_you_re_adopted_city_town') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_re_adopted_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_re_adopted_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="form-group" style="flex: 2; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
            <input type="text" class="form-control" name="information_about_you_re_adopted_country" value="<?php echo showData('information_about_you_re_adopted_country') ?>"
             maxlength='40'   style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">B. Date of Adoption <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="date" class="form-control" name="information_about_you_date_of_re_adoption"  value="<?php echo showData('information_about_you_date_of_re_adoption') ?>"></div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">C. Date Legal Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="date" class="form-control" name="information_about_you_date_re_legal_custody" value="<?php echo showData('information_about_you_date_re_legal_custody') ?>"></div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">D. Date Physical Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"> <input type="date" class="form-control" name="information_about_you_date_re_physical_custody" value="<?php echo showData('information_about_you_date_re_physical_custody') ?>"> </div>
    </div>

    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">19. Were your parents married to each other when you were born (or adopted)?</label> <br>
        <div class="col-md-2 col-md-offset-6"><?php echo createRadio("information_about_you_parents_married_status") ?></div>
    </div>
    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">20. Did your parents marry after you were born?</label> <br>
        <div class="col-md-2 col-md-offset-4"><?php echo createRadio("information_about_you_parent_marry_after_you_born_status") ?></div>
    </div>
    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">21. Do you regularly reside in the United States in the legal and physical custody of your U.S. citizen parents?</label> <br>
        <div class="col-md-2 col-md-offset-8"><?php echo createRadio("information_about_you_legal_physical_us_parents_status") ?></div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 4 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 2. Information About You (continued)</b></h4></div>
    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">22. Have you been absent from the United States since you first arrived?</label> <br>
        <div class="col-md-2 col-md-offset-8"><?php echo createRadio("information_about_you_absent_since_first_arrived_status") ?></div>
    </div>
    <div class="form-group">
      <p style='margin-left:20px'>Complete the following information <b>only if you are claiming U.S. citizenship at the time of birth if you were born before
      October 10, 1952.</b> If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information</b>.</p>
    </div>
    <div class=" col-md-5">
            <label class="control-label " style="margin-left: 15px;">A. Date You Left the United States <br>(mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_date_left_us" maxlength="" value="<?php echo showData('information_about_you_date_left_us') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label " style="margin-left: 15px;">B. Date You Returned to the <br>United States (mm/dd/yyyy) </label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_date_returned_us"  maxlength="" value="<?php echo showData('information_about_you_date_returned_us') ?>">
            </div>
        </div>
        <div class="row form-group" >
            <label class="control-label" style="width: 100%; margin:0px 0px 5px 10px">C. Place of Entry Upon Return to the United States</label>
        <div class="form-group col-md-6">
            <label class="control-label" style="width: 100%; margin-bottom: 5px; ">City or Town</label>
            <div>
                <input type="text" class="form-control" name="information_about_you_place_of_entry_city_town" maxlength="31" value="<?php echo showData('information_about_you_place_of_entry_city_town') ?>" />
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" style=" margin-bottom: 5px;">State</label>
                <select class="form-control" name="information_about_you_place_of_entry_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php foreach ($allDataCountry as $record) { if ($record->state_code == showData('information_about_you_place_of_entry_state')) $selected = "selected"; else $selected = ""; echo "<option value='$record->state_code' $selected>$record->state_code</option>";}?>
                </select>
        </div>
    </div>
    <div class="row form-group" >
        <div class="form-group col-md-4">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">D. Date You Left the United States <br>(mm/dd/yyyy)</label>
            <div>
                <input type="date" class="form-control" name="information_about_you_date_left_us2" maxlength="63" value="<?php echo showData('information_about_you_date_left_us2') ?>" />
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">E. Date You Returned to the <br>United States (mm/dd/yyyy)</label>
            <div>
                <input type="date" class="form-control" name="information_about_you_date_returned_us2" maxlength="63" value="<?php echo showData('information_about_you_date_returned_us2') ?>" />
            </div>
        </div>

    </div>
    <div class="row form-group" >
            <label class="control-label" style="width: 100%; margin:0px 0px 5px 10px">F. Place of Entry Upon Return to the United States</label>
        <div class="form-group col-md-6">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div>
                <input type="text" class="form-control" name="information_about_you_place_of_entry_city_town2" maxlength="31" value="<?php echo showData('information_about_you_place_of_entry_city_town2') ?>" />
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" style=" margin-bottom: 5px;">State</label>
                <select class="form-control" name="information_about_you_place_of_entry_state2"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php foreach ($allDataCountry as $record) { if ($record->state_code == showData('information_about_you_place_of_entry_state2')) $selected = "selected"; else $selected = ""; echo "<option value='$record->state_code' $selected>$record->state_code</option>"; } ?>
                </select>
        </div>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 3. Biographic Information</b></h4></div>

    <div class="form-group">
        <label class="control-label col-md-12">1. Ethnicity (Select only one box)</label>
        <div class="col-md-6 ">
            <div class="form-group">
                <input type="radio" id="bg_info_ethnicity" style="margin-left: 30px;" name="biographic_info_ethnicity" value="hispanic" <?php echo (showData('biographic_info_ethnicity') == 'hispanic') ? 'checked' : '' ?>>
                <label for="bg_info_ethnicity">Hispanic or Latino</label>
                <input type="radio" id="bg_info_latino" style="margin-left: 30px;" name="biographic_info_ethnicity" value="nothispanic" <?php echo (showData('biographic_info_ethnicity') == 'nothispanic') ? 'checked' : '' ?>>
                <label for="bg_info_latino">Not Hispanic or Latino</label>
        </div>
    </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">2. Race (Select all applicable boxes)</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_white") ?>White</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_asian") ?>Asian</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_black_african") ?>Black or African American</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_american_native") ?>American Indian or Alaska Native</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_native_islander") ?>Native Hawaiian or Other Pacific Islander</label>
            </div>
        </div>
    </div>
    <div style="padding-left: 1.5%;">
        <div>
            <label>3.Height</label>
            <label style="padding-left:10%">Feet:</label>
            <select id="feet" name="biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <?php echo "<option value=" . showData('biographic_info_height_feet') . " selected>" . showData('biographic_info_height_feet') . "</option>"; ?>
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
                <?php echo "<option value=" . showData('biographic_info_height_inches') . " selected>" . showData('biographic_info_height_inches') . "</option>"; ?>
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

            <input type="text" maxlength="1" name="biographic_info_weight_in_pound1" value="<?php echo showData('biographic_info_weight_in_pound1') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

            <input type="text" maxlength="1" name="biographic_info_weight_in_pound2" value="<?php echo showData('biographic_info_weight_in_pound2') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

            <input type="text" maxlength="1" name="biographic_info_weight_in_pound3" value="<?php echo showData('biographic_info_weight_in_pound3') ?>" style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <br>
        <div class="form-group">
            <label>5. Eye Color (Select only one box )</label><br>
            <div>
                <input type="radio" id="eye_black" name="biographic_info_eye_color" value="black" <?php echo (showData('biographic_info_eye_color') == 'black') ? 'checked' : '' ?>>
                <label for="eye_black">Black</label><br>

                <input type="radio" id="eye_blue" name="biographic_info_eye_color" value="blue" <?php echo (showData('biographic_info_eye_color') == 'blue') ? 'checked' : '' ?>>
                <label for="eye_blue">Blue</label><br>

                <input type="radio" id="eye_brown" name="biographic_info_eye_color" value="brown" <?php echo (showData('biographic_info_eye_color') == 'brown') ? 'checked' : '' ?>>
                <label for="eye_brown">Brown</label><br>

                <input type="radio" id="eye_gray" name="biographic_info_eye_color" value="gray" <?php echo (showData('biographic_info_eye_color') == 'gray') ? 'checked' : '' ?>>
                <label for="eye_gray">Gray</label><br>

                <input type="radio" id="eye_green" name="biographic_info_eye_color" value="green" <?php echo (showData('biographic_info_eye_color') == 'green') ? 'checked' : '' ?>>
                <label for="eye_green">Green</label><br>

                <input type="radio" id="eye_hazel" name="biographic_info_eye_color" value="hazel" <?php echo (showData('biographic_info_eye_color') == 'hazel') ? 'checked' : '' ?>>
                <label for="eye_hazel">Hazel</label><br>

                <input type="radio" id="eye_maroon" name="biographic_info_eye_color" value="maroon" <?php echo (showData('biographic_info_eye_color') == 'maroon') ? 'checked' : '' ?>>
                <label for="eye_maroon">Maroon</label><br>

                <input type="radio" id="eye_pink" name="biographic_info_eye_color" value="pink" <?php echo (showData('biographic_info_eye_color') == 'pink') ? 'checked' : '' ?>>
                <label for="eye_pink">Pink</label><br>

                <input type="radio" id="eye_unknown" name="biographic_info_eye_color" value="unknown" <?php echo (showData('biographic_info_eye_color') == 'unknown') ? 'checked' : '' ?>>
                <label for="eye_unknown">Unknown/Other</label>
            </div>
            <br><br>
            <label>6. Hair Color (Select only one box )</label><br>
            <div>
                <input type="radio" id="hair_bald2" name="biographic_info_hair_color" value="bald" <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
                <label for="hair_bald2">Bald (No hair)</label><br>

                <input type="radio" id="hair_black2" name="biographic_info_hair_color" value="black" <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
                <label for="hair_black2">Black</label><br>

                <input type="radio" id="hair_blond2" name="biographic_info_hair_color" value="blond" <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
                <label for="hair_blond2">Blond</label><br>

                <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown" <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
                <label for="hair_brown">Brown</label><br>

                <input type="radio" id="hair_gray2" name="biographic_info_hair_color" value="gray" <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
                <label for="hair_gray2">Gray</label><br>

                <input type="radio" id="hair_red2" name="biographic_info_hair_color" value="red" <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
                <label for="hair_red2">Red</label><br>

                <input type="radio" id="hair_sandy2" name="biographic_info_hair_color" value="sandy" <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
                <label for="hair_sandy2">Sandy</label><br>

                <input type="radio" id="hair_white" name="biographic_info_hair_color" value="white" <?php echo (showData('biographic_info_hair_color') == 'white') ? 'checked' : '' ?>>
                <label for="hair_white">White</label><br>

                <input type="radio" id="hair_unknown" name="biographic_info_hair_color" value="unknown" <?php echo (showData('biographic_info_hair_color') == 'unknown') ? 'checked' : '' ?>>
                <label for="hair_unknown">Unknown/Other</label>
            </div>
            <br>
        </div>
        </div>
            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father)</b></h4></div>
                <p style='margin-left:20px'><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. biological father (of adoptive father). <b>Provide
                    information about yourself</b> if you are a U.S. citizen father applying for a Certificate of Citizenship on behalf of your minor biological or adopted child</p>
              <div><h5><b>1. Current Legal Name of U.S. Citizen Father</b> </h5></div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_family_last_name" maxlength="35" value="<?php echo showData('biological_father_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_given_first_name" maxlength="27" value="<?php echo showData('biological_father_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_middle_name" maxlength="22" value="<?php echo showData('biological_father_middle_name') ?>">
                    </div>
                </div>
            </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>
 <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 5 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father) (continued)</b></h4></div>
             
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">2. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="biological_father_date_of_birth"  value="<?php echo showData('biological_father_date_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">3. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_country_of_birth" maxlength="25" value="<?php echo showData('biological_father_country_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">4. Country of Citizenship or Nationality</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_country_of_citizen" maxlength="22" value="<?php echo showData('biological_father_country_of_citizen') ?>">
                    </div>
                </div>
            </div>
        <label class="control-label col-md-12">5. Physical Address</label>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin-bottom: 5px;">Street Number and Name (Type or print "Deceased" and the date of death if your father has passed away.)</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="biological_father_street_number" value="<?php echo showData('biological_father_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="biological_father_apt_ste_flr" value="apt" <?php echo (showData('biological_father_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_father_apt_ste_flr" value="ste" <?php echo (showData('biological_father_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_father_apt_ste_flr" value="flr" <?php echo (showData('biological_father_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="biological_father_apt_ste_flr_value" maxlength="5" value="<?php echo showData('biological_father_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_city_town" maxlength="40" value="<?php echo showData('biological_father_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="biological_father_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_father_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="biological_father_zip_code_value1" maxlength="5" value="<?php echo showData('biological_father_zip_code_value1') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="biological_father_zip_code_value2" maxlength="4" value="<?php echo showData('biological_father_zip_code_value2') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_province" maxlength="20" value="<?php echo showData('biological_father_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_postal_code" maxlength="9" value="<?php echo showData('biological_father_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_country" maxlength="34" value="<?php echo showData('biological_father_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">6. My father is a U.S. citizen by</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("biological_father_citizen_by_birth_in_us_status") ?>Birth in the United States</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biological_father_citizen_by_naturalization_status") ?>Acquisition after birth through naturalization of alien parents</label> <br>
                <label class="control-label" ><?php echo createCheckbox("biological_father_citizen_by_us_citizen_parents_status") ?>Birth abroad to U.S. citizen parents</label>
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Certificate of Citizenship Number</label>
            <div >
                <input type="text" class="form-control" name="biological_father_citizenship_number" maxlength="30" value="<?php echo showData('biological_father_citizenship_number') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="biological_father_a_number"maxlength="9" value="<?php echo showData('biological_father_a_number') ?>">
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("biological_father_naturalization_status") ?>Naturalization</label>   
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Place of Naturalization (Name of Court or USCIS Office Location)</label>
            <div >
                <input type="text" class="form-control" name="biological_father_place_of_naturalization" maxlength="40" value="<?php echo showData('biological_father_place_of_naturalization') ?>">
            </div>
        </div>
        <div class='row col-md-12'>
            <div class=" col-md-6">
                <label class="control-label" >City or Town</label>
                <div>
                    <input type="text" class="form-control" name="biological_father_citizen_by_city_town" maxlength="35" value="<?php echo showData('biological_father_citizen_by_city_town') ?>">
                </div>
            </div>
                   <div class="form-group col-md-3" >
                      <label class="control-label" >State</label>
                        <select class="form-control" name="biological_father_citizen_by_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_father_citizen_by_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">Certificate of Naturalization Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_naturalization_number" maxlength="35" value="<?php echo showData('biological_father_naturalization_number') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">A-Number (if any)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_citizen_by_a_number" maxlength="9" value="<?php echo showData('biological_father_citizen_by_a_number') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Date of Naturalization (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="biological_father_date_of_naturalization"  value="<?php echo showData('biological_father_date_of_naturalization') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label " style="margin-left: 15px;">7. Has your father ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</label> <br>
              <div class="col-md-2 col-md-offset-4"><?php echo createRadio("biological_father_loss_us_citizenship_status") ?></div>
            </div>
                  <P style='margin:0px 0px 5px 20px'>If you answered “Yes” to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information</b>.</P>
                  <P style='margin:0px 0px 5px 20px'><b>8. Marital History</b></P> 
            <div class=" col-md-10">
            <label class="control-label"  >A. How many times has your U.S. citizen father been married (including annulled marriages and marriages to the same person)?</label> <br>
            </div>
             <div class=" col-md-2">
                <input type="text" class="form-control" name="biological_father_how_many_times_married"maxlength="5" value="<?php echo showData('biological_father_how_many_times_married') ?>">
            </div>
            <br>

    <div class="form-group">
        <label style='margin-left:10px'>B. What is your U.S. citizen father's current marital status?</label><br>
        <div style="margin-left:2%">
            <input type="radio" id="signle2" name="biological_father_marital_status" value="single" <?php echo (showData('biological_father_marital_status') == 'single') ? 'checked' : '' ?>>
            <label for="signle2">Single, Never Married</label><br>

            <input type="radio" id="married2" name="biological_father_marital_status" value="married" <?php echo (showData('biological_father_marital_status') == 'married') ? 'checked' : '' ?>>
            <label for="married2">Married</label><br>

            <input type="radio" id="divorced2" name="biological_father_marital_status" value="divorced" <?php echo (showData('biological_father_marital_status') == 'divorced') ? 'checked' : '' ?>>
            <label for="divorced2">Divorced</label><br>

            <input type="radio" id="widowed2" name="biological_father_marital_status" value="widowed" <?php echo (showData('biological_father_marital_status') == 'widowed') ? 'checked' : '' ?>>
            <label for="widowed2">Widowed</label><br>

            <input type="radio" id="separated2" name="biological_father_marital_status" value="separated" <?php echo (showData('biological_father_marital_status') == 'separated') ? 'checked' : '' ?>>
            <label for="separated2">Separated</label><br>

            <input type="radio" id="annulled2" name="biological_father_marital_status" value="" <?php echo (showData('biological_father_marital_status') == 'annulled') ? 'checked' : '' ?>>
            <label for="annulled2">Marriage Annulled </label><br>

            <input type="radio" id="other2" name="biological_father_marital_status" value="other" <?php echo (showData('biological_father_marital_status') == 'other') ? 'checked' : '' ?>>
            <label for="other2">Other (Explain):</label>
            <input type="text" class="form-control" name="biological_father_marital_other_value" maxlength="82" value="<?php echo showData('biological_father_marital_other_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
        <p style='margin-left:20px'>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></p>
      </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 6 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father) (continued)</b></h4></div>
            <div class="row" style="margin-bottom: 20px;">
                <label class="control-label col-md-12 " style="margin-left: 12px;">9. Information About U.S. Citizen Father's Current Spouse</label>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">A. Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_current_spouse_family_last_name" maxlength="30" value="<?php echo showData('biological_father_current_spouse_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_current_spouse_given_first_name" maxlength="27" value="<?php echo showData('biological_father_current_spouse_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_current_spouse_family_middle_name" maxlength="25" value="<?php echo showData('biological_father_current_spouse_family_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">B. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="biological_father_current_spouse_date_of_birth"  value="<?php echo showData('biological_father_current_spouse_date_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-6">
                    <label class="control-label " style="margin-left: 15px;">C. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_current_spouse_country_of_birth" maxlength="35" value="<?php echo showData('biological_father_current_spouse_country_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-6">
                    <label class="control-label " style="margin-left: 15px;">D. Country of Citizenship or Nationality</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_current_spouse_nationality" maxlength="34" value="<?php echo showData('biological_father_current_spouse_nationality') ?>">
                    </div>
                </div>
            </div>
        <label class="control-label col-md-12" style='margin-bottom:5px'>E. Spouse's Physical Address</label>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin:0px 0px  5px 5px;">Street Number and Name </label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="biological_father_current_spouse_street_number" value="<?php echo showData('biological_father_current_spouse_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="biological_father_current_spouse_apt_ste_flr" value="apt" <?php echo (showData('biological_father_current_spouse_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_father_current_spouse_apt_ste_flr" value="ste" <?php echo (showData('biological_father_current_spouse_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_father_current_spouse_apt_ste_flr" value="flr" <?php echo (showData('biological_father_current_spouse_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="biological_father_current_spouse_apt_ste_flr_value" maxlength="5" value="<?php echo showData('biological_father_current_spouse_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_current_spouse_city_town" maxlength="40" value="<?php echo showData('biological_father_current_spouse_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="biological_father_current_spouse_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_father_current_spouse_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="biological_father_current_spouse_zip_code_value1" maxlength="5" value="<?php echo showData('biological_father_current_spouse_zip_code_value1') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="biological_father_current_spouse_zip_code_value2" maxlength="4" value="<?php echo showData('biological_father_current_spouse_zip_code_value2') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_current_spouse_province" maxlength="20" value="<?php echo showData('biological_father_current_spouse_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_current_spouse_postal_code" maxlength="9" value="<?php echo showData('biological_father_current_spouse_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_father_current_spouse_country" maxlength="34" value="<?php echo showData('biological_father_current_spouse_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
      </div>
        <div class=" col-md-4">
            <label class="control-label " >F. Date of Marriage (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="biological_father_current_spouse_date_of_marriage" maxlength="35" value="<?php echo showData('biological_father_current_spouse_date_of_marriage') ?>">

        </div>
        <label class="control-label col-md-12" >G. Place of Marriage</label>
        <div class='row col-md-12'>
            <div class=" col-md-5">
                <label class="control-label" >City or Town</label>
                      <input type="text" class="form-control" name="biological_father_current_spouse_marriage_city_town" maxlength="30" value="<?php echo showData('biological_father_current_spouse_marriage_city_town') ?>">
            </div>
                   <div class=" col-md-2" style='margin-top:1%' >
                      <label class="control-label" >State</label>
                        <select class="form-control" name='biological_father_current_spouse_marriage_state'>
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_father_current_spouse_marriage_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
            <div class=" col-md-5">
                <label class="control-label" >Country</label>
                      <input type="text" class="form-control" name="biological_father_current_spouse_marriage_country" maxlength="37" value="<?php echo showData('biological_father_current_spouse_marriage_country') ?>">
            </div>
            </div>
            <label class="control-label col-md-12">H. Spouse's Immigration Status</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("biological_father_spouse_immigration_us_citizen_status") ?>U.S. Citizen</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biological_father_spouse_immigration_permanent_resident_status") ?>Lawful Permanent Resident</label> <br>
                <label class="control-label" ><?php echo createCheckbox("biological_father_spouse_immigration_other_status") ?>Other (Explain):</label>
                <input type="text" class="form-control" name="biological_father_spouse_immigration_other_value" maxlength="81" value="<?php echo showData('biological_father_spouse_immigration_other_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
          <p style='margin-left:11px' class='col-md-12'>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information</b>.</p>
          <div class="form-group">
              <label class="control-label col-md-12 " >I. Is your U.S. citizen father's current spouse also your biological (or adopted) mother?</label> <br>
              <div class="col-md-2 col-md-offset-6"><?php echo createRadio("biological_father_spuse_your_biological_status") ?></div>
            </div>
            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 5. Information About Your U.S. Citizen Biological Mother (or Adoptive Mother)</b></h4></div>
            <p style='margin-left:11px' class='col-md-12'><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. citizen biological mother (or adoptive mother). <b>Provide
            information about yourself</b> if you are a U.S. citizen mother applying for a Certificate of Citizenship on behalf of your minor biological or adopted child.</p>

            <div class=" col-md-12" style="margin-top:10px;"><b>1. Current Legal Name of U.S. Citizen Mother </b></p></div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_family_last_name" maxlength="35" value="<?php echo showData('biological_father_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_given_first_name" maxlength="27" value="<?php echo showData('biological_father_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_family_middle_name" maxlength="22" value="<?php echo showData('biological_father_family_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">2. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="biological_father_date_of_birth"  value="<?php echo showData('biological_father_date_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">3. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_country_of_birth" maxlength="27" value="<?php echo showData('biological_father_country_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">4. Country of Citizenship or Nationality</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_father_country_of_citizen" maxlength="27" value="<?php echo showData('biological_father_country_of_citizen') ?>">
                    </div>
                </div>
            </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 7 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 5. Information About Your U.S. Citizen Biological Mother (or Adoptive Mother) (continued)</b></h4></div>
            

        <label class="control-label col-md-12" style='margin-bottom:5px'>5. Physical Address</label>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin:0px 0px  5px 5px;">Street Number and Name (Type or print "Deceased" and the date of death if your mother has passed away.) </label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="biological_mother_street_number" value="<?php echo showData('biological_mother_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="biological_mother_apt_ste_flr" value="apt" <?php echo (showData('biological_mother_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_mother_apt_ste_flr" value="ste" <?php echo (showData('biological_mother_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_mother_apt_ste_flr" value="flr" <?php echo (showData('biological_mother_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="biological_mother_apt_ste_flr_value" maxlength="5" value="<?php echo showData('biological_mother_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_city_town" maxlength="40" value="<?php echo showData('biological_mother_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="biological_mother_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_mother_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="biological_mother_zip_code_value1" maxlength="5" value="<?php echo showData('biological_mother_zip_code_value1') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="biological_mother_zip_code_value2" maxlength="4" value="<?php echo showData('biological_mother_zip_code_value2') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_province" maxlength="20" value="<?php echo showData('biological_mother_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_postal_code" maxlength="9" value="<?php echo showData('biological_mother_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_country" maxlength="34" value="<?php echo showData('biological_mother_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
      </div>
    
      <div class="form-group">
        <label class="control-label col-md-12">6. My mother is a U.S. citizen by</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("biological_mother_citizen_by_birth_in_us_status") ?>Birth in the United States</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biological_mother_citizen_by_naturalization_status") ?>Acquisition after birth through naturalization of alien parents</label> <br>
                <label class="control-label" ><?php echo createCheckbox("biological_mother_citizen_by_us_citizen_parents_status") ?>Birth abroad to U.S. citizen parents</label>
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Certificate of Citizenship Number</label>
            <div >
                <input type="text" class="form-control" name="biological_mother_citizenship_number" maxlength="30" value="<?php echo showData('biological_mother_citizenship_number') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >A-Number (if any)</label>
            <div >
                <input type="text" class="form-control" name="biological_mother_a_number" maxlength="9" value="<?php echo showData('biological_mother_a_number') ?>">
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("biological_mother_naturalization_status") ?>Naturalization</label>   
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Place of Naturalization (Name of Court or USCIS Office Location)</label>
            <div >
                <input type="text" class="form-control" name="biological_mother_place_of_naturalization" maxlength="40" value="<?php echo showData('biological_mother_place_of_naturalization') ?>">
            </div>
        </div>
        <div class='row col-md-12'>
            <div class=" col-md-6">
                <label class="control-label" >City or Town</label>
                <div>
                    <input type="text" class="form-control" name="biological_mother_citizen_by_city_town" maxlength="34" value="<?php echo showData('biological_mother_citizen_by_city_town') ?>">
                </div>
            </div>
                   <div class="form-group col-md-3" >
                      <label class="control-label" >State</label>
                        <select class="form-control" name="biological_mother_citizen_by_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_mother_citizen_by_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">Certificate of Naturalization Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_mother_naturalization_number" maxlength="30" value="<?php echo showData('biological_mother_naturalization_number') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">A-Number (if any)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_mother_citizen_by_a_number" maxlength="9" value="<?php echo showData('biological_mother_citizen_by_a_number') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Date of Naturalization (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="biological_mother_date_of_naturalization" maxlength="22" value="<?php echo showData('biological_mother_date_of_naturalization') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label " style="margin-left: 15px;">7. Has your mother ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</label> <br>
              <div class="col-md-2 col-md-offset-8"><?php echo createRadio("biological_mother_loss_us_citizenship_status") ?></div>
            </div>
                  <P style='margin:0px 0px 5px 20px'>If you answered “Yes” to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information</b>.</P>
                  <P style='margin:0px 0px 5px 20px'><b>8. Marital History</b></P> 
            <div class=" col-md-10">
            <label class="control-label"  >A. How many times has your U.S. citizen mother been married (including annulled marriages and marriages to the same person)?</label> <br>
            </div>
             <div class=" col-md-2">
                <input type="text" class="form-control" name="biological_mother_how_many_times_married"maxlength="5" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
            <br>

    <div class="form-group">
        <label style='margin-left:10px'>B. What is your U.S. citizen mother's current marital status?  </label><br>
        <div style="margin-left:2%">
            <input type="radio" id="Single" name="biological_mother_marital_status" value="single"
                <?php echo (showData('biological_mother_marital_status') == 'single') ? 'checked' : '' ?>>
            <label for="Single">Single, Never Married</label><br>

            <input type="radio" id="Married" name="biological_mother_marital_status" value="married"
                <?php echo (showData('biological_mother_marital_status') == 'married') ? 'checked' : '' ?>>
            <label for="Married">Married</label><br>

            <input type="radio" id="Divorced" name="biological_mother_marital_status" value="divorced"
                <?php echo (showData('biological_mother_marital_status') == 'divorced') ? 'checked' : '' ?>>
            <label for="Divorced">Divorced</label><br>

            <input type="radio" id="Widowed" name="biological_mother_marital_status" value="widowed"
                <?php echo (showData('biological_mother_marital_status') == 'widowed') ? 'checked' : '' ?>>
            <label for="Widowed">Widowed</label><br>

            <input type="radio" id="Separated" name="biological_mother_marital_status" value="annulled"
                <?php echo (showData('biological_mother_marital_status') == 'annulled') ? 'checked' : '' ?>>
            <label for="Separated">Separated</label><br>

            <input type="radio" id="Annulled" name="biological_mother_marital_status" value="separated"
                <?php echo (showData('biological_mother_marital_status') == 'separated') ? 'checked' : '' ?>>
            <label for="Annulled">Marriage Annulled </label><br>

            <input type="radio" id="Other" name="biological_mother_marital_status" value="other"
                <?php echo (showData('biological_mother_marital_status') == 'other') ? 'checked' : '' ?>>
            <label for="Other">Other (Explain):</label>
            <input type="text" class="form-control" name="biological_mother_marital_other" maxlength="81" value="<?php echo showData('biological_mother_marital_other') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
        <p style='margin-left:20px'>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></p>
      </div>

      <div class=" col-md-12" style="margin-top:10px;"><b>9. Information About U.S. Citizen Mother's Current Spouse </b></p></div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">A. Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_family_last_name" maxlength="30" value="<?php echo showData('biological_mother_current_spouse_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_given_first_name" maxlength="27" value="<?php echo showData('biological_mother_current_spouse_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_family_middle_name" maxlength="25" value="<?php echo showData('biological_mother_current_spouse_family_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">B. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="biological_mother_current_spouse_date_of_birth"  value="<?php echo showData('biological_mother_current_spouse_date_of_birth') ?>">
                    </div>
                </div>
                <div class=" col-md-6">
                    <label class="control-label " style="margin-left: 15px;">C. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_country_of_birth" maxlength="35" value="<?php echo showData('biological_mother_current_spouse_country_of_birth') ?>">
                    </div>
                </div>
            </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 8 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 8 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 5. Information About Your U.S. Citizen Biological Mother (or Adoptive Mother) (continued)</b></h4></div>
    <div class=" col-md-6">
            <label class="control-label " >D. Country of Citizenship or Nationality</label>
            <div >
                <input type="text" class="form-control" name="biological_mother_current_spouse_nationality" maxlength="34" value="<?php echo showData('biological_mother_current_spouse_nationality') ?>">
            </div>
    </div>
        <label class="control-label col-md-12" style='margin-bottom:5px'>E. Spouse's Physical Address</label>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin:0px 0px  5px 5px;">Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="biological_mother_current_spouse_street_number" value="<?php echo showData('biological_mother_current_spouse_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="biological_mother_current_spouse_apt_ste_flr" value="apt" <?php echo (showData('biological_mother_current_spouse_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_mother_current_spouse_apt_ste_flr" value="ste" <?php echo (showData('biological_mother_current_spouse_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="biological_mother_current_spouse_apt_ste_flr" value="flr" <?php echo (showData('biological_mother_current_spouse_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="biological_mother_current_spouse_apt_ste_flr_value" maxlength="5" value="<?php echo showData('biological_mother_current_spouse_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_city_town" maxlength="40" value="<?php echo showData('biological_mother_current_spouse_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="biological_mother_current_spouse_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_mother_current_spouse_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_zip_code_value1" maxlength="5" value="<?php echo showData('biological_mother_current_spouse_zip_code_value1') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_zip_code_value2" maxlength="4" value="<?php echo showData('biological_mother_current_spouse_zip_code_value2') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_province" maxlength="20" value="<?php echo showData('biological_mother_current_spouse_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_postal_code" maxlength="9" value="<?php echo showData('biological_mother_current_spouse_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="biological_mother_current_spouse_country" maxlength="34" value="<?php echo showData('biological_mother_current_spouse_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " >F. Date of Marriage (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="biological_mother_current_spouse_date_of_marriage" maxlength="35" value="<?php echo showData('biological_mother_current_spouse_date_of_marriage') ?>">

        </div>

      </div>
      
            <label class="control-label col-md-12" >G. Place of Marriage</label>
        <div class='row col-md-12'>
            <div class=" col-md-5">
                <label class="control-label" >City or Town</label>
                      <input type="text" class="form-control" name="biological_mother_current_spouse_marriage_city_town" maxlength="34" value="<?php echo showData('biological_mother_current_spouse_marriage_city_town') ?>">
            </div>
                   <div class=" col-md-2" style='margin-top:1%' >
                      <label class="control-label" >State</label>
                        <select class="form-control" name='biological_mother_current_spouse_marriage_state'>
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('biological_mother_current_spouse_marriage_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
            <div class=" col-md-5">
                <label class="control-label" >Country</label>
                      <input type="text" class="form-control" name="biological_mother_current_spouse_marriage_country" maxlength="34" value="<?php echo showData('biological_mother_current_spouse_marriage_country') ?>">
            </div>
            </div>
            <label class="control-label col-md-12">H. Spouse's Immigration Status</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("biological_mother_spouse_immigration_us_citizen_status") ?>U.S. Citizen</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biological_mother_spouse_immigration_permanent_resident_status") ?>Lawful Permanent Resident</label> <br>
                <label class="control-label" ><?php echo createCheckbox("biological_mother_spouse_immigration_other_status") ?>Other (Explain):</label>
                <input type="text" class="form-control" name="biological_mother_spouse_immigration_other_value" maxlength="81" value="<?php echo showData('biological_mother_spouse_immigration_other_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group">
              <label class="control-label col-md-12 " >I. Is your U.S. citizen mother's current spouse also your biological (or adopted) father?</label> <br>
              <div class="col-md-2 col-md-offset-6"><?php echo createRadio("biological_mother_spuse_your_biological_status") ?></div>
        </div>
        <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 6. Physical Presence in the United States From Birth Until Filing of Form N-600</b></h4></div>
            <p style='margin-left:11px' class='col-md-12'><b>NOTE:</b> Only applicants born outside the United States claiming to have been born U.S. citizens are required to provide all the dates
    when your U.S. citizen biological father or U.S. citizen biological mother resided in the United States. <b>Include all dates from your
    birth until the date you file your Form N-600</b>.</p>

    <label class="control-label col-md-12">1. Indicate whether this information relates to your U.S. citizen father or mother</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("physical_presence_citizen_father_status") ?>U.S. Citizen Father</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("physical_presence_citizen_mother_status") ?>U.S. Citizen Mother</label> <br>
            </div>
            </div>
            <label class="control-label col-md-12">2. Physical Presence in the United States </label>
            <div class='row col-md-12'>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">A.</span> From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date1" value="<?php echo showData('physical_presence_from_date1') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date1" value="<?php echo showData('physical_presence_to_date1') ?>">
            </div>
   
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">B.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date2" value="<?php echo showData('physical_presence_from_date2') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date2" value="<?php echo showData('physical_presence_to_date2') ?>">
            </div>
        
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">C.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date3" value="<?php echo showData('physical_presence_from_date3') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date3" value="<?php echo showData('physical_presence_to_date3') ?>">
            </div>
     
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">D.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date4" value="<?php echo showData('physical_presence_from_date4') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date4" value="<?php echo showData('physical_presence_to_date4') ?>">
            </div>
       
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">E.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date5" value="<?php echo showData('physical_presence_from_date5') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date5" value="<?php echo showData('physical_presence_to_date5') ?>">
            </div>
        
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">F.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date6" value="<?php echo showData('physical_presence_from_date6') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date6" value="<?php echo showData('physical_presence_to_date6') ?>">
            </div>
     
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">G.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date7" value="<?php echo showData('physical_presence_from_date7') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date7" value="<?php echo showData('physical_presence_to_date7') ?>">
            </div>
       
      </div>
      <div class="col-md-6">
                
            <div class=" col-md-6">
                <label class="control-label" ><span style="margin-right:8px">H.</span>From (mm/dd/yyyy) </label>
                      <input type="date" class="form-control" name="physical_presence_from_date8" value="<?php echo showData('physical_presence_from_date8') ?>">
            </div>
 
            <div class=" col-md-6">
                <label class="control-label" >To (mm/dd/yyyy)</label>
                      <input type="date" class="form-control" name="physical_presence_to_date8" value="<?php echo showData('physical_presence_to_date8') ?>">
            </div>
    
      </div>
  </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 9 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 9 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 7. Information About Military Service of U. S. Citizen Parents</b></h4></div>
    <div class=" col-md-12">
            <label class="control-label " >NOTE: Complete this only if you are an applicant claiming U.S. citizenship at time of birth abroad.</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12 " >1. Has your U.S. citizen parent served in the U.S. Armed Forces?</label> <br>
        <div class="col-md-2 col-md-offset-6"><?php echo createRadio("mlitary_service_parent_served_us_forces_status") ?></div>
    </div>
    <label class="control-label col-md-12">2. If you answered "Yes" to Item Number 1., which parent served in the U.S. Armed Forces?</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("mlitary_service_parent_served_us_forces_father_status") ?>U.S. Citizen Father</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("mlitary_service_parent_served_us_forces_mother_status") ?>U.S. Citizen Mother</label> <br>
            </div>
        </div>
        <label class="control-label col-md-12">3. Dates of Service (mm/dd/yyyy) (If time of service fulfills any of the required physical presence, submit evidence of the service.)</label>
    <div class="row">
    <div class="col-md-6">
                
                <div class=" col-md-6">
                    <label class="control-label" ><span style="margin-right:8px">A.</span>From (mm/dd/yyyy) </label>
                          <input type="date" class="form-control" name="mlitary_service_date_of_service_from_date1"  value="<?php echo showData('mlitary_service_date_of_service_from_date1') ?>">
                </div>
     
                <div class=" col-md-6">
                    <label class="control-label" >To (mm/dd/yyyy)</label>
                          <input type="date" class="form-control" name="mlitary_service_date_of_service_to_date1"  value="<?php echo showData('mlitary_service_date_of_service_to_date1') ?>">
                </div>
           
          </div>
          <div class="col-md-6">
                    
                <div class=" col-md-6">
                    <label class="control-label" ><span style="margin-right:8px">B.</span>From (mm/dd/yyyy) </label>
                          <input type="date" class="form-control" name="mlitary_service_date_of_service_from_date2"  value="<?php echo showData('mlitary_service_date_of_service_from_date2') ?>">
                </div>
     
                <div class=" col-md-6">
                    <label class="control-label" >To (mm/dd/yyyy)</label>
                          <input type="date" class="form-control" name="mlitary_service_date_of_service_to_date2"  value="<?php echo showData('mlitary_service_date_of_service_to_date2') ?>">
                </div>
        
          </div>
    </div>
    <label class="control-label col-md-12">4. Type of Discharge</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("mlitary_service_type_of_discharge_honorable_status") ?>Honorable</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("mlitary_service_type_of_discharge_other_status") ?>Other than Honorable</label> 
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("mlitary_service_type_of_discharge_dishobnorable_status") ?>Dishonorable</label> 
            </div>
        </div>
        <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 8. Applicant's Statement, Contact Information, Certification, and Signature</b></h4></div>
        <p style='margin-left:20px'><b>NOTE: </b>Read the <b>Penalties</b> section of the Form N-600 Instructions before completing this part.</p>
        <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Applicant's Statement</i></b></h4></div>
        <p style='margin-left:20px'><b>NOTE: </b>Select the box for either <b>Item A</b>. or <b>B</b>. <b>in Item Number 1</b>. If applicable, select the box for <b>Item Number 2</b></p>

        <label class="control-label col-md-12">1. Applicant's Statement Regarding the Interpreter</label>
        <div class="form-group">
    <label class="control-label col-md-12">A.
    <?php echo createCheckbox("n_600_applicant_english_status")?> I can read and understand English, and I have read and understand every question and instruction on this application and my answer to every question.  </label>
    </div>
    <div class="form-group row">
    <div class=" col-md-12">
        <label class="control-label" >B. <?php echo createCheckbox("n_600_applicant_interpreter_named_status")?> The interpreter named in Part 9. read to me every question and instruction on this application and my answer to  every question, in</label>
        <input type="text" class="form-control " name="n_600_applicant_a_lnaguage" maxlength="18" value="<?php echo showData('n_600_applicant_a_lnaguage') ?>">
        <label class="control-label" >a language in which I am fluent and I understood everything.  </label>
    </div>
    </div>
    <label class="control-label col-md-12">2. Applicant's Statement Regarding the Preparer</label>
    <div class="form-group row">
    <div class=" col-md-12">
        <label class="control-label" ><?php echo createCheckbox("n_600_applicant_regarding_preparer_status")?> At my request, the preparer named in Part 10.,</label>
        <input type="text" class="form-control " name="n_600_applicant_regarding_preparer_value" maxlength="50" value="<?php echo showData('n_600_applicant_regarding_preparer_value') ?>">
        <label class="control-label" >prepared this application for me based only upon information I provided or authorized.</label>
    </div>
    </div>
    <div class="row col-md-12" style='margin-bottom:10px'>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Applicant's  Contact Information</i></b></h4></div>

    <div class="col-md-6">
				<label class="control-label ">4. Applicant's  Daytime Telephone Number</label>
					<input type="text" class="form-control" name="n_600_applicant_daytime_tel" maxlength="10" value="<?= showData('n_600_applicant_daytime_tel')?>" />
	</div>
			<div class="col-md-6">
				<label class="control-label ">5. Applicant's  Mobile Telephone Number (if any)</label>
						<input type="text" class="form-control" name="n_600_applicant_mobile"  maxlength="10" value="<?= showData('n_600_applicant_mobile')?>">
			</div>
			<div class="col-md-6">
				<label class="control-label ">6. Applicant's  Email Address (if any)</label>
						<input type="email" class="form-control" name="n_600_applicant_email" maxlength="42" value="<?= showData('n_600_applicant_email')?>">
			</div>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Applicant's Certification</i></b></h4></div>
    <p class="form-group">
   <b>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
    require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of
    my records that USCIS may need to determine my eligibility for the immigration benefit I seek.</b> <br><br>
   <b>I further authorize release of information contained in this application, in supporting documents, and in my USCIS records to other
   entities and persons where necessary for the administration and enforcement of U.S. immigration laws.</b>
    </p>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 10 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 10 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 8. Applicant's Statement, Contact Information, Certification, and Signature (continued)</b></h4></div>
            <label class="control-label " >I understand that USCIS may require me to appear for an appointment to take my biometrics (fingerprints, photograph, and/or
            signature) and, at that time, if I am required to provide biometrics, I will be required to sign an oath reaffirming that:</label>
    <p style="padding:5px 0px 7px 25px"><b>1)</b> I reviewed and provided or authorized all of the information in my application;</p>
    <p style="padding:0px 0px 7px 25px"><b>2)</b> I understood all of the information contained in, and submitted with, my application; and </p>
    <p style="padding:0px 0px 7px 25px"><b>3)</b> All of this information was complete, true, and correct at the time of filing.</p>
    <label class="control-label " >I certify, under penalty of perjury, that I provided or authorized all of the information in my application, I understand all of the
    information contained in, and submitted with, my application, and that all of this information is complete, true, and correct.</label>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Applicant's Signature</i></b></h4></div>

 <div class="row col-md-12">

 <div class="col-md-8">
				<label class="control-label ">6. Applicant's Signature</label>
					<input type="text" class="form-control" disabled />
	</div>
			<div class="col-md-4">
				<label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
						<input type="date" class="form-control" name="i_600_applicant_sign_date" value="<?= showData('i_600_applicant_sign_date')?>">
			</div>

			<p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill out this application or fail to submit required documents listed in the Instructions, USCIS may deny your application</p>	

            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 9. Interpreter's Contact Information, Certification, and Signature</b></h4></div>

    <label class="control-label " >Provide the following information about the interpreter.</label>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Interpreter's Full Name</i></b></h4></div>

    <div class="col-md-6">
				<label class="control-label ">1. Interpreter's Family Name (Last Name)</label>
					<input type="text" class="form-control" name="n_600_interpreter_family_last_name"  maxlength="43" value="<?= showData('n_600_interpreter_family_last_name')?>" />
	</div>
			<div class="col-md-6">
				<label class="control-label ">Interpreter's Given Name (First Name)</label>
						<input type="text" class="form-control" name="n_600_interpreter_given_first_name" maxlength="43" value="<?= showData('n_600_interpreter_given_first_name')?>">
			</div>
			<div class="col-md-6">
				<label class="control-label ">2. Interpreter's Business or Organization Name (if any)</label>
						<input type="text" class="form-control" name="n_600_interpreter_business_name" maxlength="34" value="<?= showData('n_600_interpreter_business_name')?>">
			</div>
            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Interpreter's Mailing Address</i></b></h4></div>

    </div>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin:5px 0px  5px 5px;">3. Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="n_600_interpreter_address_street_number"  value="<?php echo showData('n_600_interpreter_address_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="n_600_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('n_600_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="n_600_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('n_600_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="n_600_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('n_600_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="n_600_interpreter_address_apt_ste_flr_value" maxlength="5" value="<?php echo showData('n_600_interpreter_address_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_interpreter_address_city_town" maxlength="35" value="<?php echo showData('n_600_interpreter_address_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="n_600_interpreter_address_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('n_600_interpreter_address_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="n_600_interpreter_address_zip_code_value1" maxlength="5" value="<?php echo showData('n_600_interpreter_address_zip_code_value1') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="n_600_interpreter_address_zip_code_value2" maxlength="4" value="<?php echo showData('n_600_interpreter_address_zip_code_value2') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province </label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_interpreter_address_province" maxlength="20" value="<?php echo showData('n_600_interpreter_address_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code </label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('n_600_interpreter_address_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country </label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_interpreter_address_country" maxlength="40" value="<?php echo showData('n_600_interpreter_address_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>

    <div class="row col-md-12" style='margin-bottom:10px'>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Interpreter's Contact Information</i></b></h4></div>

    <div class="col-md-6">
				<label class="control-label ">4. Interpreter's Daytime Telephone Number</label>
					<input type="text" class="form-control" name="n_600_interpreter_daytime_tel" maxlength="10" value="<?= showData('n_600_interpreter_daytime_tel')?>" />
	</div>
			<div class="col-md-6">
				<label class="control-label ">5. Interpreter's Mobile Telephone Number (if any)</label>
						<input type="text" class="form-control" name="n_600_interpreter_mobile" maxlength="10" value="<?= showData('n_600_interpreter_mobile')?>">
			</div>
			<div class="col-md-6">
				<label class="control-label ">6. Interpreter's Email Address (if any)</label>
						<input type="email" class="form-control" name="n_600_interpreter_email" maxlength="42" value="<?= showData('n_600_interpreter_email')?>">
			</div>
    </div>
    </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 11 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 11 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 8. Applicant's Statement, Contact Information, Certification, and Signature (continued)</b></h4></div>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Interpreter's Certification</i></b></h4></div>
            <label class="control-label " >I certify, under penalty of perjury, that:</label><br>
   
    <label class="control-label " >I am fluent in English and</label>
    <input type="text" maxlength="18"  class="form-control col-md-4" name="n_600_interpreter_certification_language_skill" value="<?= showData('n_600_interpreter_certification_language_skill')?>">
    <label class="control-label " >which is the same language specified in Part 8.,
    Item B. in Item Number 1., and I have read to this applicant in the identified language every question and instruction on this
    application and his or her answer to every question. The applicant informed me that he or she understands every instruction, question,
    and answer on the application, including the Applicant's Certification, and has verified the accuracy of every answer.</label>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Interpreter's Signature</i></b></h4></div>

    <div class="row col-md-12">

    <div class="col-md-8">
				<label class="control-label ">7. Interpreter's Signature</label>
					<input type="text" class="form-control" disabled />
	</div>
			<div class="col-md-4">
				<label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
						<input type="date" class="form-control" name="n_600_interpreter_sign_date" value="<?= showData('n_600_interpreter_sign_date')?>">
			</div>
            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant </b></h4></div>

    <label class="control-label " >Provide the following information about the preparer.</label>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Preparer's Full Name</i></b></h4></div>

    <div class="col-md-6">
				<label class="control-label ">1. Preparer's Family Name (Last Name)</label>
					<input type="text" class="form-control" name="n_600_preparer_family_last_name" maxlength="43" value="<?= showData('n_600_preparer_family_last_name')?>" />
	</div>
			<div class="col-md-6">
				<label class="control-label ">Preparer's Given Name (First Name)</label>
						<input type="text" class="form-control" name="n_600_preparer_family_given_first_name" maxlength="43" value="<?= showData('n_600_preparer_family_given_first_name')?>">
			</div>
			<div class="col-md-6">
				<label class="control-label ">2. Preparer's Business or Organization Name (if any)</label>
						<input type="text" class="form-control" name="n_600_preparer_business_name" maxlength="34" value="<?= showData('n_600_preparer_business_name')?>">
			</div>
            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Preparer's Mailing Address</i></b></h4></div>

    </div>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin:5px 0px  5px 5px;">3. Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="34" class="form-control" name="n_600_preparer_mailing_address_street_number" value="<?php echo showData('n_600_preparer_mailing_address_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="n_600_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('n_600_preparer_mailing_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="n_600_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('n_600_preparer_mailing_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="n_600_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('n_600_preparer_mailing_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="n_600_preparer_mailing_address_apt_ste_flr_value" maxlength="5" value="<?php echo showData('n_600_preparer_mailing_address_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_preparer_mailing_address_city_town" maxlength="25" value="<?php echo showData('n_600_preparer_mailing_address_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="n_600_preparer_mailing_address_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('n_600_preparer_mailing_address_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="n_600_preparer_mailing_address_zip_code_value1" maxlength="5" value="<?php echo showData('n_600_preparer_mailing_address_zip_code_value1') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="n_600_preparer_mailing_address_zip_code_value2" maxlength="4" value="<?php echo showData('n_600_preparer_mailing_address_zip_code_value2') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province </label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_preparer_mailing_address_province" maxlength="20" value="<?php echo showData('n_600_preparer_mailing_address_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code </label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_preparer_mailing_address_postal_code" maxlength="9" value="<?php echo showData('n_600_preparer_mailing_address_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country </label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="n_600_preparer_mailing_address_country" maxlength="40" value="<?php echo showData('n_600_preparer_mailing_address_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>

    <div class="row col-md-12" style='margin-bottom:10px'>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Preparer's Contact Information</i></b></h4></div>

    <div class="col-md-6">
				<label class="control-label ">4. Preparer's Daytime Telephone Number</label>
					<input type="text" class="form-control" name="n_600_preparer_daytime_tel" maxlength="10" value="<?= showData('n_600_preparer_daytime_tel')?>" />
	</div>
			<div class="col-md-6">
				<label class="control-label ">5. Preparer's Mobile Telephone Number (if any)</label>
						<input type="text" class="form-control" name="n_600_preparer_mobile" maxlength="10" value="<?= showData('n_600_preparer_mobile')?>">
			</div>
			<div class="col-md-6">
				<label class="control-label ">6. Preparer's Email Address (if any)</label>
						<input type="email" class="form-control" name="n_600_preparer_email" maxlength="42" value="<?= showData('n_600_preparer_email')?>">
			</div>
    </div>
    </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 12 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 12 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 10. Contact Information. Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant (continued)</b></h4></div>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Preparer's Statement</i></b></h4></div>
    <div class="form-group">
	
				<label class="control-label col-md-12">7. A.
                <?php echo createCheckbox("n_600_preparer_not_attorney_status")?> I am not an attorney or accredited representative but have prepared this application on behalf of the applicant and with the applicant's consent.
				</label>
	</div>
    <div class="form-group">
				<label class="control-label col-md-12" style="margin-left:16px">B.<?php echo createCheckbox("n_600_preparer_an_attorney_status")?> I am an attorney or accredited representative and my representation of the applicant in this case <br></label>
				<div class="d-flexible col-md-12">
                <label class="control-label " style="margin-left:35px"><?php echo createCheckbox("n_600_preparer_extends_status")?> extends </label>
				<label class="control-label "><?php echo createCheckbox("n_600_preparer_not_extends_status")?> does not extend beyond the preparation of this application.</label>
                </div>
	</div>
    <div class="form-group">
		<p><b>NOTE:</b> If you are an attorney or accredited representative whose representation extends beyond preparation of this
    application, you may be obliged to submit a completed Form G-28, Notice of Entry of Appearance as Attorney or
    Accredited Representative, with this application.</p>
	</div>

			
			
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Preparer's Certification</i></b></h4></div>
    <p class="form-group">
   <b> By my signature, I certify, under penalty of perjury, that I prepared this application at the request of the applicant. The applicant then
    reviewed this completed application and informed me that he or she understands all of the information contained in, and submitted
    with, his or her application, including the Applicant's Certification, and that all of this information is complete, true, and correct. I
    completed this application based only on information that the applicant provided to me or authorized me to obtain or use</b>
    </p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b><i>Preparer's Signature</i></b></h4></div>

    <div class="col-md-8">
				<label class="control-label ">7. Interpreter's Signature</label>
					<input type="text" class="form-control" disabled />
	</div>
			<div class="col-md-4" style="margin-bottom:10px">
				<label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
						<input type="date" class="form-control" name="n_600_preparer_sign_date" value="<?= showData('n_600_preparer_sign_date')?>">
			</div>
            
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 13 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 13 of 15</b></p>
    
    <div class="bg-info">
        <h4><b>Part 11. Additional Information </b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">If you need extra space to provide any additional information within this application, use the space below. If you need more space
        than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.
        Type or print your name and A-Number (if any) at the top of each sheet; indicate the Page Number, Part Number, and Item
        Number to which your answer refers; and sign and date each sheet.</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label ">1. Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_600_additional_info_last_name" maxlength="35" value="<?php echo showData('n_600_additional_info_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Given Name (First Name) </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_600_additional_info_first_name" maxlength="27" value="<?php echo showData('n_600_additional_info_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Middle (if applicable)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_600_additional_info_middle_name" maxlength="25" value="<?php echo showData('n_600_additional_info_middle_name') ?>">
            </div>
        </div>
    </div>
    <div class="row form-group " style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">2. A-Number (if any) ► A-</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_600_additional_info_a_number" maxlength="9" value="<?php echo showData('n_600_additional_info_a_number') ?>">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">3.  A. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_3a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">B. Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_3b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_3b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">C. Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_3c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_3c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-12">D.</label>
            <div class="col-md-12">
                <textarea name="n_600_additional_info_3d" class="form-control" maxlength="265" cols="30" rows="10"><?php echo showData('n_600_additional_info_3d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">4. A. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">B. Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">C. Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-12">D.</label>
            <div class="col-md-12">
                <textarea name="n_600_additional_info_6d" class="form-control" maxlength="265" cols="30" rows="10"><?php echo showData('n_600_additional_info_6d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">5. A. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">B. Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">C. Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-12">D.</label>
            <div class="col-md-12">
                <textarea class="form-control" name="n_600_additional_info_4d" maxlength="346" class="form-control" cols="30" rows="10"><?php echo showData('n_600_additional_info_4d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">6. A. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">B. Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">C. Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-md-12">D.</label>
            <div class="col-md-12">
                <textarea class="form-control" name="n_600_additional_info_6d" maxlength="346" class="form-control" cols="30" rows="10"><?php echo showData('n_600_additional_info_6d') ?></textarea>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 14 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 14 of 15</b></p>
    <div class="bg-info">
        <h4><b><span style="color:red">NOTE</span>: Do not complete Parts 12. and 13. unless the USCIS officer instructs you to do so at the interview.</b></h4>
    </div>
    <div class="bg-info">
    <h4><b>Part 12. Affidavit (do NOT complete this part unless instructed to do so AT THE INTERVIEW) </b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">I, the (applicant, parent, or legal guardian) ____________________________________________________ do swear or affirm, under
        penalty of perjury under the laws of the United States, that I know and understand the contents of this application signed by me, and the attached supplementary pages number ________ to _______ inclusive, that the same are true and correct to the best of my knowledge,
        and that corrections number ________ to _________  were made by me or at my request.
    
    
    </label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">Applicant's, Parent's, or Legal Guardian's Signature</label>
            
                <input type="text" class="form-control" disabled name" maxlength="" disabled value="<?php echo showData('') ?>">
        
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">Subscribed and sworn or affirmed before me upon examination of the applicant (parent, legal, guardian) on  at</label>
           <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
           <p style="text-align:center"><b>(Location)</b></p>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">USCIS Officer's Printed Name</label>
           <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
          
        </div>
        <div class=" col-md-6">
            <label class="control-label ">USCIS Officer's Title</label>
                <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">USCIS Officer's Signature</label>
            
                <input type="text" class="form-control" disabled name" maxlength="" disabled value="<?php echo showData('') ?>">
        
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <div class="bg-info"><h4><b>Part 13. Officer Report and Recommendation on Application for Certificate of Citizenship (for USCIS use ONLY)</b></h4></div>
    <label class="control-label ">On the basis of the documents, records, the testimony of persons examined, and the identification upon personal appearance of the
    underage beneficiary, I find that all the facts and conclusions set forth under oath in this application are:</label>
    <div class="form-group"><label class="control-label col-md-12">1. <?php echo createCheckbox("")?> True and correct</label></div>
    <div class="form-group"><label class="control-label col-md-12">2. <?php echo createCheckbox("")?> The applicant derived or acquired U.S. citizenship on </label></div>
   <div class="row form-group">
    <div class="col-md-5">
    <input type="date" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
    <p for="" class="" style="text-align:center"><b>Date (mm/dd/yyyy)</b> </p>
    </div>
   </div>
    <div class="form-group"><label class="control-label col-md-12">3. <?php echo createCheckbox("")?> The applicant derived or acquired U.S. citizenship through (Select the box next to the appropriate section of law, or if the
    section of law is not reflected, type or print the applicable section of law in the space next to “Other.”)</label></div>
    <div class="form-group"><label class="control-label col-md-12" style="margin-left:20px">A. <?php echo createCheckbox("")?> INA Section 301</label></div>
    <div class="form-group"><label class="control-label col-md-12" style="margin-left:20px">B. <?php echo createCheckbox("")?> INA Section 309</label></div>
    <div class="form-group"><label class="control-label col-md-12" style="margin-left:20px">C. <?php echo createCheckbox("")?> INA Section 320</label></div>
    <div class="form-group"><label class="control-label col-md-12" style="margin-left:20px">D. <?php echo createCheckbox("")?> INA Section 321</label></div>
    <div class="form-group"><label class="control-label col-md-12" style="margin-left:20px">E. <?php echo createCheckbox("")?> Other</label></div>
    <div class="row form-group"   >
    <div class="col-md-5">
    <input type="text"  class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
    </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">4. <?php echo createCheckbox("")?> The applicant has not been expatriated since that time</label></div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 15 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 15 of 15</b></p>
    <div class="bg-info">
    <h4><b>Part 13. Officer Report and Recommendation on Application for Certificate of Citizenship (for USCIS use ONLY) (continued)</b></h4>
    </div>
    <label class="control-label col-md-12">I recommend that this Form N-600 be:</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("") ?>Approved</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("") ?>Denied</label> 
            </div>
        </div>
            <label class="control-label col-md-12 ">Issue Certificate of Citizenship in the name of</label>
            <div class=" col-md-4">
        <label class="control-label " >Family Name (Last Name)</label>
     
            <input type="text" class="form-control" name="information_a" maxlength=""
                disabled value="<?php echo showData('') ?>">

    </div>
    <div class=" col-md-4">
        <label class="control-label ">Given Name (First Name)</label>

            <input type="text" class="form-control" name="information_a" maxlength=""
                disabled value="<?php echo showData('') ?>">

    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label ">Middle Name (if applicable)
        </label>
        
            <input type="text" class="form-control" name="informat" maxlength=""
                disabled value="<?php echo showData('') ?>">
   
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">USCIS Officer's Printed Name</label>
           <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
          
        </div>
        <div class=" col-md-6">
            <label class="control-label ">USCIS Officer's Title</label>
                <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">USCIS Officer's Signature</label>
            
                <input type="text" class="form-control" disabled name" maxlength="" disabled value="<?php echo showData('') ?>">
        
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <hr style="border:1px solid gray">
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("") ?>I do</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("") ?>do not concur with the USCIS Officer's recommendation of Form N-600.</label> 
            </div>
        </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">USCIS Officer's Signature</label>
                <input type="text" class="form-control" disabled name" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>