<?php
$meta_title     =   "INTAKE FOR FORM I-539";
$page_heading     =   "Application to Extend/Change Nonimmigrant Status ";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 7</b></p>
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
                        <?php echo createCheckbox("n_600_g28_status") ?> Select this box if Form G-28 is attached.
                    </label>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney State Bar Number (if applicable)</label>
                        <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled>
                    </div>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number
                            (if any)</label>
                        <input type="text" class="form-control" value="" disabled>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <h4 class="col-md-12" style="margin-top: 2%;">► START HERE - Type or print in black ink.</h4>
    </div>
    <div class="bg-info col-md-12" style='margin-bottom:10px'>
        <h4><b>Part 1. Information About You</b></h4>
    </div>
    <h5><b>1. Your Full Legal Name</b> </h5>

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

    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">2. Alien Registration Number (A-Number) (if any)</label>
        <div class="col-md-12 d-flexible">
            ►A-<input type="text" class="form-control" name="other_information_about_you_date_of_birth" maxlength="22"
                value="<?php echo showData('other_information_about_you_date_of_birth') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">3. USCIS Online Account Number (if any)</label>
        <div class="col-md-12 d-flexible">
            ►<input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="35"
                value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">4. Your U.S. Mailing Address (Safe Address, if applicable) </label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
            <input type="text" class="form-control" name="information_about_you_us_mailing_care_of_name" maxlength="34"
                value="<?php echo showData('information_about_you_us_mailing_care_of_name') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>




    <div style="margin:0px 2% 0px 2%;">
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
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                <div class='d-flexible'>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code_value1" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code_value1') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">5. Is your mailing address the same as your physical address?</label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">If you answered “Yes” to Item Number 5. skip to Item Number 7. If you answered “No” to Item Number 5., provide information on your physical address in Item Number 6.</label>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">6. Your Current Physical Address </label>
    </div>

    <div style="margin:0px 2% 0px 2%;">
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
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                <div class='d-flexible'>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code_value1" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code_value1') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 3 of 7
        </b></p>
    <div class="bg-info">
        <h4><b>Part 4. Information About Your Residence (continued)</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">3. Is this application based on a separate petition or application to provide your spouse, child, or parent an extension or change of status?</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : '' ?>> Yes, filed with this Form I-539</label> <br>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : '' ?>> No</label> <br>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : '' ?>> Yes, filed previously and pending with U.S. Citizenship and Immigration Services (USCIS).</label>
            </div>
        </div>
        <label class="control-label col-md-12">If you are single and have never married, go to Part 6. Information About Your Children</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">4. If you answered "Yes" to Item Number 2. or Item Number 3., select the Form type below.</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label col-md-8" style="margin-left: 25px;"><?php echo createCheckbox("current_spouse_us_citizen_by_birth_status") ?>Form I-539, Application to Extend/Change Nonimmigrant Status </label>
                <label class="control-label col-md-8" style="margin-left: 25px;"><?php echo createCheckbox("current_spouse_us_citizen_other_status") ?>Form I-129, Petition for a Nonimmigrant Worker</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">5. If you answered "Yes" to Item Number 2. or 3., provide the USCIS Receipt Number.</label>
        <div class="col-md-4">
            <input type="text" maxlength="12" class="form-control" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">If the petition or application is pending with USCIS, also provide the following information:</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">6. First and Last Name of Beneficiary or Applicant</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <label class="control-label ">First Name of Beneficiary or Applicant</label>
            <div>
                <input type="text" class="form-control" name="information_about_you_legally_change_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_legally_change_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label "> Last Name of Beneficiary or Applicant</label>
            <div>
                <input type="text" class="form-control" name="information_about_you_legally_change_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_legally_change_given_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label "> 7. Date Filed (mm/dd/yyyy)</label>
            <div>
                <input type="date" class="form-control" name="information_about_you_legally_change_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_legally_change_given_first_name') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 4. Additional Information About the Principal Applicant</b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label " ">1. Current Passport Information</label>
        <label class=" control-label " ">If your current passport information is different from the information you provided in Part 1., provide your current passport information. If your current passport information matches the information you provided in Part 1., proceed to Item Number 3.</label>
    </div>

    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label ">Passport Number</label>
            <div> <input type=" text" class="form-control" name="information_about_you_legally_change_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_legally_change_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Country of Passport Issuance</label>
            <div><input type=" text" class="form-control" name="information_about_you_legally_change_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_legally_change_given_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Passport Expiration Date (mm/dd/yyyy)</label>
            <div><input type=" text" class="form-control" name="information_about_you_legally_change_middle_name" maxlength="22" value="<?php echo showData('information_about_you_legally_change_middle_name') ?>"></div>
        </div>
    </div>
    <div style="margin: 2%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">2. Physical Address Abroad </label>
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="63" class="form-control" name="" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 70%;">
                    <input type="text" class="form-control" name="information_about_you_residence_city_town" maxlength="63" value="<?php echo showData('information_about_you_residence_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_province" maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_postal_code" maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_country" maxlength="37" value="<?php echo showData('information_about_you_residence_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">Answer the following questions. If you answer "Yes" to any of the questions in Item Numbers 3. - 15., use the space provided in Part 8. Additional Information to provide an explanation</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">3. Are you an applicant for an immigrant visa?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_criminal_offense_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">4. Has an immigrant petition EVER been filed for you?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_torture_genocide_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">5. Have you EVER filed Form I-485, Application to Register Permanent Residence or Adjust Status?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_killing_status") ?>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 4 -------------------------
--------------------------------------------------------->
<!-- <fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 7</b></p>
    <div class="bg-info">
        <h4><b>Part 4. Additional Information About the Applicant (continued)</b></h4>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">6. Have you been arrested or convicted of any criminal offense since last entering the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_criminal_offense_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Have you EVER ordered, incited, called for, committed, assisted, helped with, or otherwise participated in any of the following:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.a. Acts involving torture or genocide?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_torture_genocide_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.b. Killing any person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_killing_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.c. Intentionally and severely injuring any person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_injury_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.d. Engaging in any kind of sexual contact or relations with any person who did not consent or was unable to consent, or was being forced or threatened?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_sexual_contact_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.e. Limiting or denying any person's ability to exercise religious beliefs?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_religious_beliefs_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Have you EVER:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">8.a. Served in, been a member of, assisted, or participated in any military unit, paramilitary unit, police unit, self-defense unit, vigilante unit, rebel group, guerrilla group, militia, insurgent organization, or any other armed group?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_military_participation_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">8.b. Worked, volunteered, or otherwise served in any prison, jail, prison camp, detention facility, labor camp, or any other situation that involved detaining persons?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_prison_service_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">9. Have you EVER been a member of, assisted, or participated in any group, unit, or organization of any kind in which you or other persons used or threatened to use any type of weapon against any person or threatened to do so?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_weapon_use_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">10. Have you EVER sold, provided, or transported weapons, or assisted any person in selling, providing, or transporting weapons, which you knew or believed would be used against another person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_weapon_transport_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">11. Have you EVER received any weapons training, paramilitary training, or other military-type training?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_military_training_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">12. Have you EVER violated the terms of the nonimmigrant status you now hold?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_nonimmigrant_status_violation") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">13. Are you now in removal proceedings?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_removal_proceedings_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">14. Have you EVER been employed in the United States since last admitted or granted an extension or change of status?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_employment_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">If you answered "No" to Item Number 14., fully describe how you are supporting yourself in Part 8. Additional Information.
            Include documentary evidence of the source, amount, and basis for any income. <br><br>
            If you answered "Yes" to Item Number 14., fully describe any and all periods of employment in Part 8. Additional Information.
            Include the name and address of the employer, weekly income, and whether the employment was specifically authorized by USCIS.</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">15. Are you currently or have you EVER been a J-1 exchange visitor or a J-2 dependent of a J-1 exchange visitor?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_j1_exchange_visitor_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">If you answered "Yes" to Item Number 15., you must provide the dates you maintained status as a J-1 exchange visitor or J-2
            dependent in Part 8. Additional Information. </label></div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right;""><b>Page 5 of 7</b></p>

    <div class=" bg-info col-md-12" style="margin-top:10px;">
    <h4><b>Part 5. Applicant's Contact Information, Certification, and Signature </b></h4>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Applicant's Contact Information</i></b></h4>
    </div>
    <p class="form-group"><b>Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).</b></p>
    <div class="col-md-12">
        <div class="col-md-6">
            <label class="control-label ">1. Applicant's Daytime Telephone Number</label>
            <input type="text" class="form-control" name="n_600_applicant_daytime_tel" maxlength="10" value="<?= showData('n_600_applicant_daytime_tel') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">2. Applicant's Mobile Telephone Number (if any)</label>
            <input type="text" class="form-control" name="n_600_applicant_mobile" maxlength="10" value="<?= showData('n_600_applicant_mobile') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">3. Applicant's Email Address (if any)</label>
            <input type="email" class="form-control" name="n_600_applicant_email" maxlength="42" value="<?= showData('n_600_applicant_email') ?>">
        </div>

    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Applicant's Certification and Signature</i></b></h4>
    </div>
    <p class="form-group"><b>I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with
            my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in Part 6.,
            understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the
            information are complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records
            that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the
            administration and enforcement of U.S. immigration law. </b></p>

    <div class="col-md-8">
        <label class="control-label ">4. Applicant's Signature</label>
        <input type="text" class="form-control" disabled />
    </div>
    <div class="col-md-4">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="i_600_applicant_sign_date" value="<?= showData('i_600_applicant_sign_date') ?>">
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b>Part 6. Interpreter's Contact Information, Certification, and Signature </b></h4>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Interpreter's Full Name</i></b></h4>
    </div>
    <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label ">1. Interpreter's Family Name (Last Name)</label>
            <input type="text" class="form-control" name="n_600_interpreter_family_last_name" maxlength="43" value="<?= showData('n_600_interpreter_family_last_name') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">Interpreter's Given Name (First Name)</label>
            <input type="text" class="form-control" name="n_600_interpreter_given_first_name" maxlength="43" value="<?= showData('n_600_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">2. Interpreter's Business or Organization Name (if any)</label>
            <input type="text" class="form-control" name="n_600_interpreter_business_name" maxlength="34" value="<?= showData('n_600_interpreter_business_name') ?>">
        </div>
    </div>

    <div class="row col-md-12" style='margin-bottom:10px'>
        <div class=" bg-info col-md-12" style="margin-top:10px;">
            <h4><b><i>Interpreter's Contact Information</i></b></h4>
        </div>

        <div class="col-md-6">
            <label class="control-label ">3. Interpreter's Daytime Telephone Number</label>
            <input type="text" class="form-control" name="n_600_interpreter_daytime_tel" maxlength="10" value="<?= showData('n_600_interpreter_daytime_tel') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">4. Interpreter's Mobile Telephone Number (if any)</label>
            <input type="text" class="form-control" name="n_600_interpreter_mobile" maxlength="10" value="<?= showData('n_600_interpreter_mobile') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">5. Interpreter's Email Address (if any)</label>
            <input type="email" class="form-control" name="n_600_interpreter_email" maxlength="42" value="<?= showData('n_600_interpreter_email') ?>">
        </div>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Interpreter's Certification and Signature</i></b></h4>
    </div>
    <label class="control-label ">I certify, under penalty of perjury, that I am fluent in English and</label><br>
    <input type="text" maxlength="18" class="form-control col-md-4" name="n_600_interpreter_certification_language_skill" value="<?= showData('n_600_interpreter_certification_language_skill') ?>">
    <label class="control-label ">, and I have interpreted every question on the application and Instructions and interpreted the applicant's answers to the questions in that language, and the
        applicant informed me that they understood every instruction, question, and answer on the application.</label>
    <div class="col-md-8">
        <label class="control-label ">6. Interpreter's Signature</label>
        <input type="text" class="form-control" disabled />
    </div>
    <div class="col-md-4">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="n_600_interpreter_sign_date" value="<?= showData('n_600_interpreter_sign_date') ?>">
    </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 6 of 7</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
    <h4><b>Part 7. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant</b></h4>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Preparer's Full Name</i></b></h4>
    </div>
    <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label ">1. Preparer's Family Name (Last Name)</label>
            <input type="text" class="form-control" name="n_600_preparer_family_last_name" maxlength="43" value="<?= showData('n_600_preparer_family_last_name') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">Preparer's Given Name (First Name)</label>
            <input type="text" class="form-control" name="n_600_preparer_family_given_first_name" maxlength="43" value="<?= showData('n_600_preparer_family_given_first_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">2. Preparer's Business or Organization Name</label>
            <input type="text" class="form-control" name="n_600_preparer_business_name" maxlength="34" value="<?= showData('n_600_preparer_business_name') ?>">
        </div>
    </div>

    <div class="row col-md-12" style='margin-bottom:10px'>
        <div class=" bg-info col-md-12" style="margin-top:10px;">
            <h4><b><i>Preparer's Contact Information</i></b></h4>
        </div>

        <div class="col-md-6">
            <label class="control-label ">4. Preparer's Daytime Telephone Number</label>
            <input type="text" class="form-control" name="n_600_preparer_daytime_tel" maxlength="10" value="<?= showData('n_600_preparer_daytime_tel') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">5. Preparer's Mobile Telephone Number (if any)</label>
            <input type="text" class="form-control" name="n_600_preparer_mobile" maxlength="10" value="<?= showData('n_600_preparer_mobile') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">6. Preparer's Email Address (if any)</label>
            <input type="email" class="form-control" name="n_600_preparer_email" maxlength="42" value="<?= showData('n_600_preparer_email') ?>">
        </div>
    </div>

    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Preparer's Certification and Signature</i></b></h4>
    </div>
    <p class="form-group col-md-12">
        <b> I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that
            all of the responses and information contained in and submitted with the application are complete, true, and correct and reflects only
            information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand
            the responses and information in or submitted with the application.</b>
    </p>
    <div class="col-md-8">
        <label class="control-label ">6. Preparer's Signature</label>
        <input type="text" class="form-control" disabled />
    </div>
    <div class="col-md-4" style="margin-bottom:10px">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="n_600_preparer_sign_date" value="<?= showData('n_600_preparer_sign_date') ?>">
    </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->

<!----------------------------------------------------------------------
-------------------------------- page 7--------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 7 of 7</b></p>

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
                <label class="control-label col-md-12">3. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_3a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_3b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_3b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_3c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_3c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
           
            <div class="col-md-12">
                <textarea name="n_600_additional_info_3d" class="form-control" maxlength="265" cols="30" rows="10"><?php echo showData('n_600_additional_info_3d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">4.  Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_4b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_4c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea name="n_600_additional_info_4d" class="form-control" maxlength="265" cols="30" rows="10"><?php echo showData('n_600_additional_info_4d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">5.  Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_5b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_5c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="n_600_additional_info_5d" maxlength="346" class="form-control" cols="30" rows="10"><?php echo showData('n_600_additional_info_5d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">6. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('n_600_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6b_part_no" maxlength="4" value="<?php echo showData('n_600_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_600_additional_info_6c_item_no" maxlength="9" value="<?php echo showData('n_600_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="n_600_additional_info_6d" maxlength="346" class="form-control" cols="30" rows="10"><?php echo showData('n_600_additional_info_6d') ?></textarea>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->


<?php include "intake_footer.php" ?>