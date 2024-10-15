<?php
$meta_title     =   "INTAKE FOR FORM i-601A";
$page_heading     =   " Notice of Appeal or Motion";
include "intake_header.php";
?>

<style>
    .mr-question {
        margin-right: 2%;
    }
</style>

<!---------------------------------------------------
------------------- page 1 --------------------------
----------------------------------------------------->


<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 9</b></p>
    <table>
            <thead>
                <tr>
                    <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_601a_g_28_box") ?> Fill in box if G-28 is attached to represent the applicant.</label></td>
                    <td style="padding: 5px">
                        <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>">
                    </td>
                    <td style="padding: 5px">
                        <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>">
                    </td>
                </tr>
            </tbody>
        </table>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You</b></h4>
            </div>
            <h5>Provide the following information about yourself</h5>
            <div class="form-group">
                <label class="control-label col-md-12">1. Alien Registration Number (A-Number) (if any)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="text" maxlength="9" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. U.S. Social Security Number (if any)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="text" maxlength="9" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. USCIS Online Account Number (if any)</label>
                <div class="col-md-8 col-md-offset-4 ">
                    <input type="text" maxlength="12" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Your Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.a. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.b. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Other Names Used (if any)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <hr style="border: 1px solid black;">
            <div class="form-group">
                <label class="control-label col-md-5">6.a. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b><i>Your U.S. Mailing Address</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. a. In Care Of Name (if any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="petitioner_us_mailing_care_of_name" value="<?php echo showData('petitioner_us_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_street_number" maxlength="28" value="<?php echo showData('petitioner_us_mailing_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>7.c </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_city_town" maxlength="20" value="<?php echo showData('petitioner_us_mailing_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_us_mailing_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('petitioner_us_mailing_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_zip_code" maxlength="5" value="<?php echo showData('petitioner_us_mailing_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8. Is your current physical address the same as your mailing
                    address?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
            <div class="col-md-12">
                <p>If you answered "No" to <b>Item Number 8.</b>, provide your physical address in <b>Item Numbers 9.a. - 9.e.</b></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b><i>Your U.S. Physical Address</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9.a. Street Number and Name </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="petitioner_us_mailing_care_of_name" value="<?php echo showData('petitioner_us_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>9.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_city_town" maxlength="20" value="<?php echo showData('petitioner_us_mailing_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_us_mailing_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('petitioner_us_mailing_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_zip_code" maxlength="5" value="<?php echo showData('petitioner_us_mailing_zip_code') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Other Information</i></b></h4>
            </div>
            <div class="form-group ">
                <div class="d-flexible">
                    <label class="col-md-4">10. Gender</label><br>
                    <div class="d-flexible col-md-7">
                        <input type="radio" name="i_589_child_gender" id="male_12" value="male" <?php echo (showData('i_589_child_gender') == 'male') ? 'checked' : '' ?>> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="i_589_child_gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class=" col-md-12">11. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="petitioner_us_mailing_zip_code"  value="<?php echo showData('petitioner_us_mailing_zip_code') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 9</b></p>
    <div class=" row">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 1. Information About You (continued)</b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">12. City or Town of Birth </label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="i_290b_appeal_or_motion_uscis_form_no" value="<?php echo showData('i_290b_appeal_or_motion_uscis_form_no') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">13. Country of Birth </label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="i_290b_appeal_or_motion_receipt_number" value="<?php echo showData('i_290b_appeal_or_motion_receipt_number') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">14. Country of Citizenship or Nationality</label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="i_290b_appeal_or_motion_nonimmigrant_or_immigrant" value="<?php echo showData('i_290b_appeal_or_motion_nonimmigrant_or_immigrant') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">15.a. Mother's Family Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">15.b. Mother's Given Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">16.a. Father's Family Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">16.b. Mother's Given Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>

        <div class="bg-info">
            <h4><b>Your Last Entry Into the United States</b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">17. Date of Entry (On or about mm/dd/yyyy) </label>
            <div class="col-md-6 col-md-offset-6 ">
                <input type="date" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">18.a. Place or Port-of-Entry (Actual or approximate city or town) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">18.b. State</label>
            <div class="col-md-7">
                <select class="form-control" name="petitioner_us_mailing_state">
                    <option value=''>Select</option>
                    <?php
                    foreach ($allDataCountry as $record) {
                        if ($record->state_code == showData('petitioner_us_mailing_state')) $selected = "selected";
                        else $selected = "";
                        echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">19. Immigration Status (At the time of entry) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><b>Your Previous Entries Into the United States</b></h4>
        </div>
        <div>
            <h5><b>You were previously in the United States as follows:</b></h5>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">20.a. Place or Port-of-Entry (Actual or approximate city or town)</label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">20.b. State</label>
            <div class="col-md-7">
                <select class="form-control" name="petitioner_us_mailing_state">
                    <option value=''>Select</option>
                    <?php
                    foreach ($allDataCountry as $record) {
                        if ($record->state_code == showData('petitioner_us_mailing_state')) $selected = "selected";
                        else $selected = "";
                        echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">21.a. From (On or about mm/dd/yyyy) </label>
            <div class="col-md-6 col-md-offset-6 ">
                <input type="date" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">21.b. To (On or about mm/dd/yyyy)</label>
            <div class="col-md-6 col-md-offset-6 ">
                <input type="date" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text"  value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">22. Immigration Status (At the time of entry)</label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div>
            <div class="form-group">
                <label class="control-label col-md-12">23.a. Place or Port-of-Entry (Actual or approximate city or town)</label>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">23.b. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_us_mailing_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('petitioner_us_mailing_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">24.a. From (On or about mm/dd/yyyy) </label>
                <div class="col-md-6 col-md-offset-6 ">
                    <input type="date" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text"  value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">24.b. To (On or about mm/dd/yyyy) </label>
                <div class="col-md-6 col-md-offset-6 ">
                    <input type="date" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" " value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">25. Immigration Status (At the time of entry)</label>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="39" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">26.</span> Are there other previous entries?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">If you answered "Yes" to <b>Item Number 26.</b>, include the
                    place of entry, dates, and your immigration status at the time of entry for any other prior entries in the space provided in <b>Part 9. Additional Information</b></label>
            </div>
            <div class="bg-info">
                <h4><b>Your Immigration or Criminal History</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">27.</span> Are you currently in removal, exclusion, or deportation
                    proceedings in which there is no final order issued by the
                    immigration judge, the Board of Immigration Appeals, a
                    DHS officer, or a Federal court yet? (This includes
                    proceedings under INA section 239, an exclusion or
                    deportation proceeding initiated before April 1,1997, a
                    Visa Waiver Program removal proceeding under INA
                    section 217, expedited removal under INA 235, and a
                    request for a judicial removal order under INA section
                    238(c))?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">If you answered “No” to Item Number 27., go to Item
                    Number 29.a. If you answered “Yes” to Item Number
                    27., select the statement below (either Item Number
                    28.a. or 28.b.)</b></label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span class="mr-question">28.a.</span><?php echo createCheckbox("i_290b_appeal_or_motion_additional_status") ?>I am in removal, exclusion, or deportation
                    proceedings that are administratively closed and, at
                    the time of filing my Form I-601A, have not been
                    placed back on EOIR's calendar to continue my
                    removal, exclusion, or deportation proceedings.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">NOTE: You may be eligible for a provisional
                    unlawful presence waiver. Provide a copy of the
                    administrative closure order. Also, if U.S.
                    Citizenship and Immigration Services (USCIS)
                    approves your provisional unlawful presence
                    waiver, it is important that you resolve your
                    removal, exclusion, or deportation proceedings
                    before you depart the United States for your
                    immigrant visa interview. </b></label>
            </div>
        </div>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 3 of 9</b></p>
    <div class=" row">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 1. Information About You (continued)</b></h4>
        </div>
        <div>
            <div class="form-group">
                <label class="control-label col-md-12"><span class="mr-question">28.b.</span><?php echo createCheckbox("i_290b_appeal_or_motion_additional_status") ?>I am currently in removal, exclusion, or deportation
                    proceedings that are not administratively closed, or
                    in removal, exclusion, or deportation proceedings
                    that were administratively closed, but EOIR has
                    placed my proceedings back on its calendar in order
                    to continue them.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">NOTE: You are ineligible for a provisional
                    unlawful presence waiver unless your proceedings
                    are administratively closed at the time you file your
                    Form I-601A, and the proceedings have not been
                    put back on EOIR's calendar to continue your
                    removal, exclusion, or deportation after having been
                    previously administratively closed. </b></label>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label class="control-label col-md-12"><span class="mr-question">29.a.</span> Are you currently subject to a final order of removal,
                    exclusion or deportation? (This includes an order entered
                    in proceedings under INA section 239, an exclusion or
                    deportation order entered in proceedings initiated before
                    April 1, 1997, a Visa Waiver Program removal order
                    under INA section 217, an expedited removal order under
                    INA section 235, and a judicial order under INA section
                    238(c))?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">NOTE: If you answered "Yes" to Item Number 29.a.,
                    you are ineligible for a provisional unlawful presence
                    waiver unless you applied for, and USCIS has already
                    approved, an application for permission to reapply for
                    admission under INA section 212(a)(9)(A)(iii) and 8 CFR
                    212.2 on Form I-212, Application for Permission to
                    Reapply for Admission into the United States after
                    Deportation or Removal. If you have already applied for
                    and if USCIS has already granted you permission to
                    reapply for admission, provide the relevant information in
                    Item Number 29.b. If you answered "No" to Item
                    Number 29.a., go to Item Number 31.</b></label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">29.b.</span> USCIS Receipt Number for Your Approved Form I-212:</label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="13" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12" style="font-size: 12px;">NOTE: You may also provide a copy of the approval
                notice that USCIS sent to you when it approved your
                Form I-212.</b></label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">30.a.</span> Has DHS served you with a DHS Form I-871, giving you
                notice that DHS intends to reinstate a prior deportation,
                exclusion, or removal order against you as permitted
                under INA section 241(a)(5)?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">30.b.</span> If you answered "Yes" to Item Number 30.a., has DHS
                served you with a final decision reinstating a prior
                deportation, exclusion, or removal order under INA
                section 241(a)(5)?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">31.</span> Are you currently subject to a grant of voluntary
                    departure that has not expired and that was granted to you
                    by the immigration judge or the Board of Immigration
                    Appeals during removal, exclusion, or deportation
                    proceedings? </label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">NOTE: If you answered "Yes" to Item Number 31., you
                    are ineligible for a provisional unlawful presence waiver.
                    <br>
                    If you were granted voluntary departure in the past, but
                    then you withdrew your voluntary departure request or
                    otherwise terminated voluntary departure you should not
                    select "Yes" to Item Number 31. In this case you may be
                    in removal proceedings or you may be the subject of a
                    final order of removal, deportation, or exclusion. You
                    should select the statements that apply to you in Item
                    Numbers 27. - 28.b. or Item Number 29.a. If you filed
                    a motion to withdraw your voluntary departure request,
                    please submit a copy with your Form I-601A.

                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;">Answer Item Numbers 32. - 38. If you answer "Yes" to any
                    question in Item Numbers 32. - 38., your application for a
                    provisional unlawful presence waiver may be denied as a matter
                    of discretion. For each "Yes" response for Item Numbers 32. -
                    38., provide the location and date of the event and a brief
                    description in Part 9. Additional Information. For Item
                    Number 34., if you were arrested but not charged with any
                    crime or offense, provide a statement or other documentation
                    from the arresting authority, prosecutor's office, or court to
                    show that you were not charged with any crime or offense. If
                    you answer "Yes" to Item Number 35., you must provide all
                    related court dispositions.
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">32.</span> Have you EVER knowingly and willfully given false or
                    misleading information to a U.S. Government official
                    while applying for an immigration benefit or to gain entry
                    or admission into the United States?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">33.</span> Have you EVER been engaged in alien smuggling?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">34.</span> Have you EVER been arrested, cited, or detained by a
                    law enforcement officer (including immigration and
                    military officers) in the United States, your home country,
                    and/or any other country for any reason other than traffic
                    violations?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">35.</span> Have you EVER been charged, indicted, convicted,
                    imprisoned, or jailed in the United States, your home
                    country, and/or any other country for any crime or
                    offense?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">36.</span> Have you EVER trafficked in or are you NOW trafficking
                    in any controlled substance?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 4 of 9</b></p>
    <div class=" row">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 1. Information About You (continued)</b></h4>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">37.</span> Are you NOW or have you EVER knowingly assisted,
                abetted, conspired, or colluded with others in the unlawful
                trafficking of any controlled substance?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">38.</span> Are you NOW or have you EVER been engaged in
                prostitution?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">Answer Item Numbers 39.a. - 45. If you answer "Yes" to any
                    question in Item Numbers 39.a. - 45., your application for a
                    provisional unlawful presence waiver may be denied as a
                    matter of discretion. For each "Yes" response for Item
                    Numbers 39.a. - 45., provide a complete explanation in
                    Part 9. Additional Information.</label>
        </div>
        <div class="form-group">
            <p class="control-p col-md-12"><span class="mr-question">Have you <b>EVER</b> ordered, incited, called for, committed, assisted,
                    helped with, or otherwise participated in any of the following</p>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">39.a.</span> Acts involving torture or genocide?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">39.b.</span>Killing any person?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">39.c.</span>Intentionally and severely injuring any person?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">39.d.</span> Engaging in any kind of sexual contact or relations with
                any person who was being forced or threatened?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">39.e.</span> Limiting or denying any person's ability to exercise
                religious beliefs?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">40.a.</span>. Served in, been a member of, assisted in, or participated
                in any military unit, paramilitary unit, police unit, selfdefense unit, vigilante unit, rebel group, guerilla group,
                militia, or insurgent organization? </label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">40.b.</span>Served in any prison, jail, prison camp, detention facility,
                labor camp, or any other situation that involved detaining
                persons?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"><span class="mr-question">41.</span>Have you EVER been a member of, assisted in, or
                participated in any group, unit, or organization of any
                kind in which you or other persons used any type of
                weapon against any person or threatened to do so?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_include_child_in_application") ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div>
            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">42.</span>Have you EVER assisted or participated in selling or
                    providing weapons to any person who to your knowledge
                    used them against another person, or in transporting
                    weapons to any person who to your knowledge used them
                    against another person?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">43.</span> Have you EVER received any type of military,
                    paramilitary, or weapons training?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">44.</span> Have you EVER recruited, enlisted, conscripted, or used
                    any person under 15 years of age to serve in or help an
                    armed force or group?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12" style="font-size: 12px;"><span class="mr-question">45.</span> Have you EVER used any person under 15 years of age
                    to take part in hostilities, or to help or provide services to
                    people in combat?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
        </div>
        <div class=" col-md-12">
            <div class="bg-info">
                <h4><b>Part 2. Biographic Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Ethnicity (Select only one box)</label>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_ethnicity") ?>Hispanic or Latino</label>
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_ethnicity") ?>Not Hispanic or Latino</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Race (Select all applicable boxes)</label>
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_american_native") ?>American Indian or Alaska Native</label>
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_asian") ?>Asian</label>
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_black_african") ?>Black or African American</label>
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_native_islander") ?>Native Hawaiian or Other Pacific Islander</label>
                        <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_white") ?>White</label>
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
                        <input type="radio" id="hair_bald" name="biographic_info_hair_color" value="bald" <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
                        <label for="hair_bald">Bald (No hair)</label><br>

                        <input type="radio" id="hair_black" name="biographic_info_hair_color" value="black" <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
                        <label for="hair_black">Black</label><br>

                        <input type="radio" id="hair_blond" name="biographic_info_hair_color" value="blond" <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
                        <label for="hair_blond">Blond</label><br>

                        <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown" <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
                        <label for="hair_brown">Brown</label><br>

                        <input type="radio" id="hair_gray" name="biographic_info_hair_color" value="gray" <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
                        <label for="hair_gray">Gray</label><br>

                        <input type="radio" id="hair_red" name="biographic_info_hair_color" value="red" <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
                        <label for="hair_red">Red</label><br>

                        <input type="radio" id="hair_sandy" name="biographic_info_hair_color" value="sandy" <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
                        <label for="hair_sandy">Sandy</label><br>

                        <input type="radio" id="hair_white" name="biographic_info_hair_color" value="white" <?php echo (showData('biographic_info_hair_color') == 'white') ? 'checked' : '' ?>>
                        <label for="hair_white">White</label><br>

                        <input type="radio" id="hair_unknown" name="biographic_info_hair_color" value="unknown" <?php echo (showData('biographic_info_hair_color') == 'unknown') ? 'checked' : '' ?>>
                        <label for="hair_unknown">Unknown/Other</label>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 5 of 9</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 3. Information About Your Immigrant Visa Case</b></h4>
            </div>
            <p style="margin: 5px;">Provide the basis on which you are immigrating to the United States using the check boxes below. (Select <b>only one</b> box)</p>
            <div class="form-group">
                <label><b>1.a.</b> <?php echo createCheckbox("visa_case_type_diversity_visa") ?>Diversity Visa Program Selectee or Derivative</label>
            </div>
            <div class="form-group">
                <label><b>1.b.</b> <?php echo createCheckbox("visa_case_type_immediate_relative") ?>Immediate Relative Petition (Form I-130)</label>
            </div>
            <div class="form-group">
                <label><b>1.c.</b> <?php echo createCheckbox("visa_case_type_family_based") ?>Preference-Based Family Petition (Form I-130),
                    including Derivatives</label>
            </div>
            <div class="form-group">
                <label><b>1.d.</b> <?php echo createCheckbox("visa_case_type_employment_based") ?>Employment-Based Petition (Form I-140), including Derivatives</label>
            </div>
            <div class="form-group">
                <label><b>1.e.</b> <?php echo createCheckbox("visa_case_type_special_immigrant") ?>Special Immigrant/Widow Petition (Form I-360), including Derivatives</label>
            </div>

            <!-- DOS DV Case Number -->
            <div class="form-group">
                <label>If you selected Item Number 1.a. because you are a Diversity
                    Visa (DV) Program selectee or derivative, provide information
                    about your (or your spouse's or parent's) DV case:</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. DOS DV Case Number (KCC Case Number)</label>
                <div class="col-md-10 col-md-offset-2">
                    <input type="text" maxlength="14" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label>DV Program Selectee's Full Name (If you are a derivative and
                    your parent or spouse is the DV Program Selectee)</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.d. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label>If you selected Item Numbers 1.b., 1.c., 1.d., or 1.e. provide
                    the following information about the approved immigrant visa
                    petition (Form I-130, Form I-140, or Form I-360) that was filed
                    on your (or your spouse's or parent's) behalf, or that you used to
                    self-petition on your behalf, that is your basis to immigrate and
                    the related Department of State (DOS) immigrant visa
                    application. </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">3.a. USCIS Receipt Number</label>
                <div class="col-md-10 col-md-offset-2">
                    <input type="text" maxlength="13" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">3.b. DOS Consular Case Number (NVC Case Number)</label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" maxlength="13" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label>Petitioner Name (Provide the full name of the family member or
                    the company who petitioned for you (or your spouse or parent).)</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.f. Company or Organization Name</label>
                <div class="col-md-12">
                    <input type="text" maxlength="34" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
        </div>

        <!-- Part 4. Information About Your Qualifying Relative -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Your Qualifying Relative</b></h4>
            </div>
            <div class="form-group">
                <label>Provide the following information about the qualifying relative
                    (the U.S. citizen or Lawful Permanent Resident (LPR) spouse or
                    parent) who would experience extreme hardship if you were
                    refused admission to the United States.</label>
            </div>
            <div class="bg-info">
                <h4><b>Your Qualifying Relative's Full Name and Relationship to You</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5 ">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label><b>2.a.</b> <?php echo createCheckbox("visa_case_type_diversity_visa") ?>U.S. Citizen Spouse</label>
            </div>
            <div class="form-group">
                <label><b>2.b.</b> <?php echo createCheckbox("visa_case_type_immediate_relative") ?>U.S. Citizen Parent</label>
            </div>
            <div class="form-group">
                <label><b>2.c.</b> <?php echo createCheckbox("visa_case_type_family_based") ?>LPR Spouse including Derivatives</label>
            </div>
            <div class="form-group">
                <label><b>2.d.</b> <?php echo createCheckbox("visa_case_type_employment_based") ?>LPR Parent</label>
            </div>
            <div class="bg-info">
                <h4><b>Your Other Qualifying Relative</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Do you have more than one qualifying relative (U.S. citizen or LPR spouse or parent)?</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
                </div>
            </div>
            <div class="form-group">
                <label>If you answered "Yes" to Item Number 3., provide the
                    other qualifying relative's name and your relationship to
                    the qualifying relative in Item Numbers 4.a. - 5.d.
                    Also provide evidence of the U.S. citizenship or LPR
                    status of the other qualifying relative with your
                    application. See the What Evidence Must I Submit
                    With Form I-601A section of the Instructions.</label>
            </div>
            <div class="bg-info">
                <h4><b>Additional Qualifying Relative's Full Name and Relationship to You</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.a. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.b. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5 ">4.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label><b>5.a.</b> <?php echo createCheckbox("visa_case_type_diversity_visa") ?>U.S. Citizen Spouse</label>
            </div>
            <div class="form-group">
                <label><b>5.b.</b> <?php echo createCheckbox("visa_case_type_immediate_relative") ?>U.S. Citizen Parent</label>
            </div>
            <div class="form-group">
                <label><b>5.c.</b> <?php echo createCheckbox("visa_case_type_family_based") ?>LPR Spouse including Derivatives</label>
            </div>
            <div class="form-group">
                <label><b>5.d.</b> <?php echo createCheckbox("visa_case_type_employment_based") ?>LPR Parent</label>
            </div>
        </div>
    </div>

    <!-- Next and Previous Buttons -->
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!---------------------------------------------------------
-------------------------------- page 6--------------------
----------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 6 of 9</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Statement From Applicant</b></h4>
            </div>
            <p class="form-group">
                <b>
                    In the space provided, explain in detail why you believe USCIS
                    should approve your application for a provisional unlawful
                    presence waiver as a matter of discretion. Provide all of the
                    reasons you believe support your application for this waiver,
                    including information about the extreme hardship your
                    qualifying relatives would experience if you were refused
                    admission to the United States. If you need extra space to
                    complete your statement, use the space provided in <b>Part 9.
                        Additional Information</b>
                </b>
            </p>
            <textarea class="form-control" name="i_290b_additional_info_7d" maxlength="1100" class="form-control" cols="30" rows="50"><?php echo showData('i_290b_additional_info_7d') ?></textarea>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Applicant's Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            </div>
            <p class="form-group">
                <span class="d-flexible my-5"><b>NOTE:</b> Read the Penalties section of the Form I-601A
                    Instructions before completing this section. You must file Form
                    I-601A while in the United States.
                </span>
            </p>
            <div class="bg-info">
                <h4><b><i>Applicant's Statement</i></b></h4>
            </div>
            <p class="form-group">
                <b>NOTE:</b> Select the box for either Item Number 1.a. or 1.b. If
                applicable, select the box for Item Number 2.
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>1.a. </b> <?php echo createCheckbox("i_601aa_i_can_read_understand_english_status2") ?>I can read and understand English, and I have read
                        and understand every question and instruction on this
                        application and my answer to every question.</p>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>1.b. </b> <?php echo createCheckbox("i_601aa_the_interpreter_name_status") ?>The interpreter named in Part 7. read to me every
                        question and instruction on this application and my
                        answer to every question in </p>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_601aa_the_interpreter_name_in2" maxlength="25" value="<?php echo showData('i_601aa_the_interpreter_name_in2') ?>"><b>a language in which I am fluent, and I understood
                        everything. </b>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>2. </b> <?php echo createCheckbox("i_601aa_the_preparer_named_in2_status") ?> At my request, the preparer named in Part 8.,</p>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_601aa_the_preparer_named_in2" maxlength="25" value="<?php echo showData('i_601aa_the_preparer_named_in2') ?>"><b>prepared this contract for me based only upon
                        information I provided or authorized.</b>
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Applicant's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Applicant's Daytime Telephone Number
                    Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_601aa_household_member_daytime_tel" maxlength="15" value="<?php echo showData('i_601aa_household_member_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Applicant's Mobile Telephone Number (if any)
                    Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601aa_household_member_mobile" maxlength="15" value="<?php echo showData('i_601aa_household_member_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Applicant's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_601aa_household_member_email" maxlength="39" value="<?php echo showData('i_601aa_household_member_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Applicant's Declaration and Certification</i></b></h4>
            </div>
            <p class="form-group">
                <b>
                    Copies of any documents I have submitted are exact photocopies
                    of unaltered, original documents, and I understand that USCIS
                    may require that I submit original documents to USCIS at a later
                    date. Furthermore, I authorize the release of any information
                    from any and all of my records that USCIS may need to
                    determine my eligibility for the immigration benefit that I seek. <br><br>
                    I furthermore authorize release of information contained in this
                    application, in supporting documents, and in my USCIS
                    records, to other entities and persons where necessary for the
                    administration and enforcement of U.S. immigration laws.
                </b>
            </p>
        </div>

    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 7--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 7 of 9</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4> <b>Part 6. Applicant's Statement, Contact
                        Information, Declaration, Certification, and
                        Signature</b>(continued)</h4>
            </div><br>
            <div class="">
                <b>I understand that USCIS will require me to appear for an
                    appointment to take my biometrics (fingerprints, photograph,
                    and/or signature) and, at that time, I will be required to sign an
                    oath reaffirming that: </b>
            </div><br>
            <div class="col-md-offset-2">
                <b>1.)</b> I reviewed and understood all of the information
                contained in, and submitted with, my application; and
                <br><br>
                <b>2.)</b> All of this information was complete, true, and correct
                at the time of filing.
            </div><br>
            <div class="">
                <b>I certify, under penalty of perjury, that all of the information in
                    my application and any document submitted with it were
                    provided or authorized by me, that I reviewed and understand
                    all of the information contained in, and submitted with, my
                    application and that all of this information is complete, true, and
                    correct.</b>
            </div><br>
            <div class="bg-info">
                <h4><b><i>Applicant's Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Applicant's Signature</label>
                <div class="col-md-12">
                    <input type="text" disabled class="form-control" maxlength="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="sponsor_sign_date" value="<?php echo showData('sponsor_sign_date') ?>" />
                </div>
            </div>
            <div><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill
                out this application or fail to submit required documents listed
                in the Instructions, USCIS may deny your application.</div> <br>
            <div class="bg-info">
                <h4><b>Part 7. Interpreter's Contact Information, Certification, and Signature</b></h4>
            </div> <br>
            <div><b>Provide the following information about the interpreter.</b></div><br>
            <div class="bg-info">
                <h4><b><i>Interpreter's Full Name</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_601a_interpreter_family_last_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_601a_interpreter_given_first_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_interpreter_business_name" maxlength="39" value="<?php echo showData('i_601a_interpreter_business_name') ?>">
                </div>
            </div>

        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Interpreters's Mailing Address </b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_601a_interpreter_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_601a_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_601a_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_601a_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_601a_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_601a_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_601a_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_601a_interpreter_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_601a_interpreter_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_interpreter_address_city_town" maxlength="20" value="<?php echo showData('i_601a_interpreter_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_601a_interpreter_address_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_601a_interpreter_address_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_interpreter_address_zip_code" maxlength="5" value="<?php echo showData('i_601a_interpreter_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_interpreter_address_province" maxlength="20" value="<?php echo showData('i_601a_interpreter_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('i_601a_interpreter_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_interpreter_address_country" maxlength="39" value="<?php echo showData('i_601a_interpreter_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Interpreter's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_interpreter_daytime_tel" maxlength="15" value="<?php echo showData('i_601a_interpreter_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_interpreter_mobile" maxlength="15" value="<?php echo showData('i_601a_interpreter_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_601a_interpreter_email" maxlength="39" value="<?php echo showData('i_601a_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_interpreter_fluent_in_english" maxlength="23" value="<?php echo showData('i_601a_interpreter_fluent_in_english') ?>">
                </div>
            </div>
            <div>which is the same language specified in Part 6., Item Number
                1.b., and I have read to this applicant in the identified language
                every question and instruction on this application and his or her
                answer to every question. The applicant informed me that he or
                she understands every instruction, question, and answer on the
                application, including the Applicant's Declaration and
                Certification, and has verified the accuracy of every answer.</div>
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
                    <input type="date" class="form-control" name="i_601a_interpreter_sign_date" value="<?php echo showData('i_601a_interpreter_sign_date') ?>" />
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 8 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 8 of 9</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Contact Information, Declaration, and
                        Signature of the Person Preparing this
                        Application, if Other Than the Applicant
                    </b>
                </h4>
            </div>
            <h5><b>Provide the following information about the preparer</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_601a_preparer_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_601a_preparer_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_preparer_business_name" maxlength="34" value="<?php echo showData('i_601a_preparer_business_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_preparer_address_street_number" maxlength="25" value="<?php echo showData('i_601a_preparer_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_601a_preparer_address_apt_ste_flr" value="apt" <?php echo (showData('i_601a_preparer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_601a_preparer_address_apt_ste_flr" value="ste" <?php echo (showData('i_601a_preparer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_601a_preparer_address_apt_ste_flr" value="flr" <?php echo (showData('i_601a_preparer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_601a_preparer_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_601a_preparer_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_preparer_address_city_town" maxlength="20" value="<?php echo showData('i_601a_preparer_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_601a_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_601a_preparer_address_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_preparer_address_zip_code" maxlength="5" value="<?php echo showData('i_601a_preparer_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_preparer_address_province" maxlength="20" value="<?php echo showData('i_601a_preparer_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_601a_preparer_address_postal_code" maxlength="9" value="<?php echo showData('i_601a_preparer_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_601a_preparer_address_country" maxlength="39" value="<?php echo showData('i_601a_preparer_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="i_601a_preparer_daytime_tel" maxlength="15" value="<?php echo showData('i_601a_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="i_601a_preparer_mobile" maxlength="15" value="<?php echo showData('i_601a_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_601a_preparer_email" value="<?php echo showData('i_601a_preparer_email') ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <label class="control-label col-md-12">7.a. <?php echo createCheckbox("i_601a_preparer_not_attorney_status") ?> I am not an attorney or accredited representative but
                    have prepared this application on behalf of the applicant and with the applicant's consent.</label>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <div>
                    <label class="control-label col-md-12">7.b. <?php echo createCheckbox("i_601a_preparer_an_attorney_status") ?>
                        I am an attorney or accredited representative and my
                        representation of the applicant in this case extends/
                        does not extend beyond the preparation of this
                        application.</label>
                </div>
            </div>
            <p><b>NOTE:</b> If you are an attorney or accredited
                representative, you may need to submit a completed
                Form G-28, Notice of Entry of Appearance as
                Attorney or Accredited Representative, with this
                application.</p>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this application at the request of the applicant. The
                applicant then reviewed this completed application and informed
                me that he or she understands all of the information contained
                in, and submitted with, his or her application, including the
                <b>Applicant's Declaration and Certification</b>, and that all of this
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
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_601a_preparer_sign_date" value="<?php echo showData('i_601a_preparer_sign_date') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 9 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align:right; margin-right:15px"><b>Page 9 of 9</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 9. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this form, use the space below. If you need more space
                than what is provided, you may make copies of this page to
                complete and file with this form or attach a separate sheet of
                paper. Type or print your name and A-Number at the top of
                each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item
                    Number</b> to which your answer refers; and sign and date each
                sheet.
            </p>

            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_601a_additional_info_last_name" value="<?php echo showData('i_601a_additional_info_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_601a_additional_info_first_name" value="<?php echo showData('i_601a_additional_info_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_601a_additional_info_middle_name" value="<?php echo showData('i_601a_additional_info_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-6 col-md-offset-6">
                    <div class="d-flexible">
                        <b>►A-</b><input type="text" maxlength="9" class="form-control" name="i_601a_additional_info_a_number" value="<?php echo showData('i_601a_additional_info_a_number') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_601a_additional_info_3a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_3b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_3c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>3.d.</b>
                    <textarea  name="i_601a_additional_info_3d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_601a_additional_info_3d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_601a_additional_info_4a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_4b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_4c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>4.d.</b>
                    <textarea name="i_601a_additional_info_4d" maxlength="343" class="form-control" cols="30" rows="10"><?php echo showData('i_601a_additional_info_4d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_601a_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_5b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_5c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>5.d.</b>
                    <textarea name="i_601a_additional_info_5d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_601a_additional_info_5d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_601a_additional_info_6a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_6b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_6c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>6.d.</b>
                    <textarea name="i_601a_additional_info_6d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_601a_additional_info_6d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_601a_additional_info_7a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_7b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_601a_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_601a_additional_info_7c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>7.d.</b>
                    <textarea class="form-control" name="i_601a_additional_info_7d" maxlength="343" class="form-control" cols="30" rows="10"><?php echo showData('i_601a_additional_info_7d') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>