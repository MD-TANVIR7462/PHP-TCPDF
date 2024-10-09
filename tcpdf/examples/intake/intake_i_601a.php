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

<!-- <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_290b_g_28_box") ?> Fill in box if G-28 is attached to represent the applicant.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>">
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>">
                </td>
            </tr>
        </tbody>
    </table> -->

<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 5</b></p>

    <h5><b>Please visit <a href="https://www.uscis.gov/administrative-appeals/appeals-of-denied-petitions-under-the-jurisdiction-of-the-administrative-appeals-office-aao-by-form">www.uscis.gov/i-290b/jurisdiction</a> for information on the immigration benefit types that are eligible for an appeal or motion using this form.</b></h5>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You</b></h4>
            </div>
            <h5>Provide the following information about yourself</h5>
            <div class="form-group">
                <label class="control-label col-md-5">1. Alien Registration Number (A-Number) (if any)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2. U.S. Social Security Number (if any)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3. USCIS Online Account Number (if any)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
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
                <label class="control-label col-md-12" style="font-size: 12px;">8. Is your current physical address the same as your mailing
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
                <label class=" col-md-5">11. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_zip_code" maxlength="5" value="<?php echo showData('petitioner_us_mailing_zip_code') ?>">
                </div>
            </div>
        </div>






    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 5</b></p>
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
                <input type="text" maxlength="34" class="form-control" name="i_290b_appeal_or_motion_receipt_number" value="<?php echo showData('i_290b_appeal_or_motion_receipt_number') ?>" />
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
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">15.b. Mother's Given Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">16.a. Father's Family Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">16.b. Mother's Given Name (Last Name) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>

        <div class="bg-info">
            <h4><b>Your Last Entry Into the United States</b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">17. Date of Entry (On or about mm/dd/yyyy) </label>
            <div class="col-md-6 col-md-offset-6 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">18.a. Place or Port-of-Entry (Actual or approximate city or town) </label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
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
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
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
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
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
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">21.b. To (On or about mm/dd/yyyy)</label>
            <div class="col-md-6 col-md-offset-6 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">22. Immigration Status (At the time of entry)</label>
            <div class="col-md-12 ">
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div>
            <div class="form-group">
                <label class="control-label col-md-12">23.a. Place or Port-of-Entry (Actual or approximate city or town)</label>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
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
                    <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">24.b. To (On or about mm/dd/yyyy) </label>
                <div class="col-md-6 col-md-offset-6 ">
                    <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">25. Immigration Status (At the time of entry)</label>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
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
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
----------------------------------------------------------------------->
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 3 of 5</b></p>
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
                <input type="text" class="form-control" name="i_290b_appeal_or_motion_unfavorable_decision_text" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_unfavorable_decision_text') ?>">
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
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 4 of 5</b></p>
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
-------------------------------- page 3 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;""><b>Page 3 of 5</b></p>
    <div class=" row mt-5 gap-4">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 4. Applicant's or Petitioner's Contact Information, Certification, and Signature</b></h4>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Contact Information</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. Applicant's or Petitioner's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_applicant_or_petitioner_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_applicant_or_petitioner_daytime_tel') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. Applicant's or Petitioner's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_applicant_or_petitioner_mobile" maxlength="10" value="<?php echo showData('i_290b_applicant_or_petitioner_mobile') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Applicant's or Petitioner's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_applicant_or_petitioner_email" maxlength="39" value="<?php echo showData('i_290b_applicant_or_petitioner_email') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Certification and
                        Signature </i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">I certify, under penalty of perjury, that I provided or authorized
                all of the responses and information contained in and submitted
                with my appeal or motion, I read and understand or, if
                interpreted to me in a language in which I am fluent by the
                interpreter listed in Part 5., understood, all of the responses and
                information contained in, and submitted with, my appeal/
                motion, and that all of the responses and the information are
                complete, true, and correct. Furthermore, I authorize the release
                of any information from any and all of my records that USCIS
                may need to determine my eligibility for an immigration request
                and to other entities and persons where necessary for the
                administration and enforcement of U.S. immigration law.
            </label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Applicant's or Petitioner's Signature</label>
            <div class="col-md-12">
                <input type="text" name="" value="" maxlength="" disabled class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"> Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="i_290b_applicant_or_petitioner_sign_date" value="<?php echo showData('i_290b_applicant_or_petitioner_sign_date') ?>" />
            </div>
        </div>
        <div class="bg-info">
            <h4><b>Part 5. Interpreter's Contact Information, Certification, and Signature </b></h4>
        </div>
        <div class="bg-info">
            <h4><b><i>Interpreter's Full Name</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. Interpreter's Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="i_290b_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_290b_interpreter_family_last_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Interpreter's Given Name (First Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="i_290b_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_290b_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="i_290b_interpreter_business_name" maxlength="30" value="<?php echo showData('i_290b_interpreter_business_name') ?>">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b><i>Interpreter's Contact Information</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Interpreter's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="number" class="form-control  " name="i_290b_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_interpreter_daytime_tel') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Interpreter's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="number" class="form-control  " name="i_290b_interpreter_mobile" maxlength="10" value="<?php echo showData('i_290b_interpreter_mobile') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Interpreter's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="email" class="form-control  " name="i_290b_interpreter_email" maxlength="39" value="<?php echo showData('i_290b_interpreter_email') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><i><b>Interpreter's Certification and Signature</b></i></h4>
        </div>
        <p>I certify, under penalty of perjury, that I am fluent in English and</p>
        <div style="display:flex;  align-items: center;">
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_interpreter_fluent_english" maxlength="24" value="<?php echo showData('i_290b_interpreter_fluent_english') ?>">
            </div>
        </div>
        <div>and I have interpreted every question on the appeal/motion, and
            Instructions and interpreted the applicant's answers to the
            questions in that language, and the applicant/petitioner informed
            me that they understood every instruction, question, and answer
            on the appeal/motion.
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Interpreter's Signature</label>
            <div class="col-md-12">
                <input type="text" class="form-control" disabled />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="i_290b_interpreter_sign_date" value="<?php echo showData('i_290b_interpreter_sign_date') ?>" />
            </div>
        </div>


        <div class="bg-info">
            <h4><b>Part 6. Contact Information, Declaration, and
                    Signature of the Person Preparing This Appeal/
                    Motion, if Other Than the Applicant or
                    Petitioner
                </b>
            </h4>
        </div>
        <div class="bg-info">
            <h4><b><i>Preparer's Full Name</i></b> </h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. Preparer's Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_290b_preparer_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Preparer's Given Name (First Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_290b_preparer_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_preparer_business_name" maxlength="34" value="<?php echo showData('i_290b_preparer_business_name') ?>" />
            </div>
        </div>

        <div class="bg-info">
            <h4><b><i>Preparer's Contact Information</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Preparer's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="number" class="form-control" name="i_290b_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_preparer_daytime_tel') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Preparer's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="number" class="form-control" name="i_290b_preparer_mobile" maxlength="10" value="<?php echo showData('i_290b_preparer_mobile') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Preparer's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="email" class="form-control" maxlength="39" name="i_290b_preparer_email" value="<?php echo showData('i_290b_preparer_email') ?>">
            </div>
        </div>
    </div>
    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!---------------------------------------------------------
-------------------------------- page 4--------------------
----------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 5</b></p>
    <div class="row" style>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Contact Information, Declaration, and
                        Signature of the Person Preparing This Appeal/
                        Motion, if Other Than the Applicant or
                        Petitioner (continued)
                    </b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Certification and Signature </i></b></h4>
            </div>
            <p>I certify, under penalty of perjury, that I prepared this appeal or
                motion for the applicant or petitioner at their request and with
                express consent and that all of the responses and information
                contained in and submitted with the appeal or motion are
                complete, true, and correct and reflects only information
                provided by the applicant or petitioner. The applicant or
                petitioner reviewed the responses and information and informed
                me that they understand the responses and information in or
                submitted with the appeal or motion.
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_290b_preparer_sign_date" value="<?php echo showData('i_290b_preparer_sign_date') ?>">
                </div>
            </div>
        </div>

    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 5 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align:right; margin-right:15px"><b>Page 5 of 5</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Additional Information</b> </h4>
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
                    <input type="text" class="form-control" maxlength="29" name="i_290b_additional_info_last_name" value="<?php echo showData('i_290b_additional_info_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_290b_additional_info_first_name" value="<?php echo showData('i_290b_additional_info_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_290b_additional_info_middle_name" value="<?php echo showData('i_290b_additional_info_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-6 col-md-offset-6">
                    <div class="d-flexible">
                        <b>►A-</b><input type="text" maxlength="9" class="form-control" name="i_290b_additional_info_a_number" value="<?php echo showData('i_290b_additional_info_a_number') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_3a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_3b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_3c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>3.d.</b>
                    <textarea name="i_290b_additional_info_3d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_290b_additional_info_3d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_4a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_4b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_4c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>4.d.</b>
                    <textarea name="i_290b_additional_info_4d" maxlength="343" class="form-control" cols="30" rows="10"><?php echo showData('i_290b_additional_info_4d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_5b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_5c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>5.d.</b>
                    <textarea name="i_290b_additional_info_5d" class="form-control" maxlength="305" cols="30" rows="10"><?php echo showData('i_290b_additional_info_5d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_6a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_6b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_6c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>6.d.</b>
                    <textarea name="i_290b_additional_info_6d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_290b_additional_info_6d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_7a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_7b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_7c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>7.d.</b>
                    <textarea class="form-control" name="i_290b_additional_info_7d" maxlength="305" class="form-control" cols="30" rows="10"><?php echo showData('i_290b_additional_info_7d') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>