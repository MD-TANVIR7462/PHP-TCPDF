<?php
$meta_title     =   "INTAKE FORM i_864a";
$page_heading   =   "INTAKE FORM i_864a, Contract Between Sponsor and Household Member";
include "intake_header.php";
?>
<style>
    .my-5 {
        margin: 3% 0 3% 0;
    }

    .my-4 {
        margin: 1.5% 0 1.5% 0;
    }

    .mx-5 {
        margin: 0 2% 0 3.5%;
    }

    .mx-4 {
        margin: 0 1.5% 0 1.5%;
    }

    .text-bold {
        font-weight: 600;

    }


    /*     
    .section {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .input-pair {
        display: flex;
        gap: 10px;
    }

    .input-pair input {
        flex: 1;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
    }

    h4 {
        margin-top: 20px;
    } */
</style>
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<!-- <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_864a_g_28_checkbox") ?> FSelect this box if Form G-28 or G-28I is attached</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>" disabled>
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled>
                </td>
            </tr>
        </tbody>
    </table> -->
<!-- //! Replace the table into the table of fieldset............... -->

<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 8</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("") ?>Select this box if Form G-28 or G-28I is attached.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="" disabled>
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="" disabled>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You (the Household Member)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Full Name </i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Mailing Address</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="information_about_you_us_mailing_care_of_name" value="<?php echo showData('information_about_you_us_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_street_number" maxlength="25" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>2.c </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="20" value="<?php echo showData('information_about_you_us_mailing_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_us_mailing_state">
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
            <div class="form-group">
                <label class="control-label col-md-5">2.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_province" maxlength="20" value="<?php echo showData('information_about_you_us_mailing_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_postal_code" maxlength="9" value="<?php echo showData('information_about_you_us_mailing_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_country" maxlength="34" value="<?php echo showData('information_about_you_us_mailing_country') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Is your current mailing address the same as your physical address?</label>
                <div class="col-md-4 col-md-offset-8">
                    <?php echo createRadio("i_864a_is_current_mailing_same_as_physical") ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">If you answered "No" to <b>Item Number 3.</b>, provide your physical address.</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Physical Address</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_street_number" maxlength="25" value="<?php echo showData('information_about_you_home_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>4.b. </b> &nbsp;
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
                    <input type="text" class="form-control" class="form-control" name="information_about_you_home_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_home_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_city_town" maxlength="20" value="<?php echo showData('information_about_you_home_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_home_state">
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
            <div class="form-group">
                <label class="control-label col-md-5">4.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_zip_code" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_province" maxlength="20" value="<?php echo showData('information_about_you_home_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_postal_code" maxlength="9" value="<?php echo showData('information_about_you_home_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_home_country" maxlength="34" value="<?php echo showData('information_about_you_home_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Other Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">5. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth') ?>" />
                </div>
            </div>
            <label class="my-5 text-bold mx-5">Place of Birth </label>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. City or Town</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_city_of_birth" maxlength="36" value="<?php echo showData('other_information_about_you_city_of_birth') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">6.b. State or Province</label>
                <div class="col-md-12">
                    <div class="d-flexible">
                        <input type="text" class="form-control" maxlength="9" name="other_information_about_you_province_of_birth" value="<?php echo showData('other_information_about_you_province_of_birth') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.c. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="12" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7. U.S. Social Security Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ► <input type="text" class="form-control" maxlength="12" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8. USCIS Online Account Number (if any)</label>
                <div class="col-md-10 col-md-offset-2">
                    <div class="d-flexible">
                        ► <input type="text" class="form-control" maxlength="12" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->

<!-- //!uncomment this 2 lines and replace them into button section............. -->

<!-- <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" /> -->
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;"><b>Page 2 of 8</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Your (the Household Member's) Relationship to the Sponsor</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.a. </b> <?php echo createCheckbox("i_864a_i_have_earned_status") ?> I am the intending immigrant and also the sponsor's spouse.
                    </div>
                </label>
            </div>
            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.b. </b> <?php echo createCheckbox("i_864a_i_am_under_18_year_status") ?> I am the intending immigrant and also a member of the sponsor's household.
                    </div>
                </label>
            </div>
            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.c. </b> <?php echo createCheckbox("i_864a_i_am_filing_an_immigrant_visa_status") ?> I am not the intending immigrant. I am the sponsor's household member. I am related to the sponsor as his/her:
                    </div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_i_am_filing_an_immigrant_visa_adjustment_status") ?> Spouse</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_i_am_filing_an_immigrant_visa_adjustment_status") ?> Son or Daughter (at least 18 years of age)</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_i_am_filing_an_immigrant_visa_adjustment_status") ?> Parent</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_i_am_filing_an_immigrant_visa_adjustment_status") ?> Brother or Sister</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_i_am_filing_an_immigrant_visa_adjustment_status") ?> Other Dependent (Specify)</div>
                </label>
                <div class="col-md-10 col-md-offset-2">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 3. Your (the Household Member's) Employment and Income</b></h4>
            </div>
            <div class="form-group">
                <p><b>I am currently:</b></p>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?> Employed as a/an
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>2.</b><span class="mx-5">Name of Employer Number 1</span>
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>3.</b><span class="mx-5">Name of Employer Number 2 (if applicable)</span>
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>4. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?> Self employed as a/an
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>5. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?> Retired from (Company Name)
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-offset-2">
                    <label class="control-label col-md-6">Since (mm/dd/yyyy)</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        6. <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?> Unemployed since (mm/dd/yyyy)
                    </div>
                </label>
                <div class="col-md-6 col-md-offset-6">
                    <input type="date" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        7. <span class="mx-4">My current individual annual income is:</span>
                    </div>
                </label>
                <div class="col-md-7 col-md-offset-5 d-flexible">
                    <b>$</b> <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 4. Your (the Household Member's) Federal Income Tax Information and Assets</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Have you filed a Federal income tax return for each of the
                    three most recent tax years?</label>
                <div class="col-md-4 col-md-offset-8">
                    <?php echo createRadio("i_864a_is_current_mailing_same_as_physical") ?>
                </div>
            </div>
        </div>





        <div class="col-md-6">
            <div class="form-group">
                <p><b>NOTE:</b> You <b>MUST</b> attach a photocopy or transcript of
                    your Federal income tax return for only the most recent
                    tax year.
                </p>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.a. </b> <?php echo createCheckbox("i_864a_i_have_earned_status") ?> (Optional) I have attached photocopies or transcripts of
                        my Federal income tax returns for my second and third most recent tax years.
                    </div>
                </label>
            </div>
            <div class="form-group">
                <p>My total income (adjusted gross income on IRS Form 1040EZ) as reported on my Federal income tax returns for the most recent three years was: </p>
            </div>

            <div class="mx-4">
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-md-4">
                        <label>
                            <p>2.a. Most Recent </p>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <p style="text-align: center;"><b>Tax Year</b> </p>
                        <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                    </div>
                    <div class="col-md-4">
                        <p style="text-align: center;"><b>Total Income</b></p>
                        <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-md-4">
                        <label>
                            <p>2.b. 2nd Most Recent </p>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-md-4">
                        <label>
                            <p>2.c. 3rd Most Recent </p>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                    </div>
                </div>
                <label style="margin-top: 4%;">
                    <p>My assets (complete only if necessary).</p>
                </label>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.a.</b><span class="mx-5">Enter the balance of all cash, savings, and checking accounts.</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.b.</b><span class="mx-5">Enter the net cash value of real-estate holdings. (Net value means assessed value minus mortgage debt.)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.c.</b><span class="mx-5">Enter the cash value of all stocks, bonds, certificates of deposit, and other assets not listed on Item Numbers 3.a. or 3.b.</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.d.</b><span class="mx-5">Add together Item Numbers 3.a., 3.b., and 3.c. and enter the number here.</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            </div>

            <div class="form-group">
                <p><b>NOTE:</b> Read the Penalties section of the Form I-864A
                    Instructions before completing this part.
                </p>
            </div>
            <div class="form-group">
                <label>I, THE SPONSOR,</label>
                <div>
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
                <p style="text-align: center;"><b>(Print Name)</b></p>
            </div>
            <div class="form-group">
                <label>in consideration of the household member's promise to support
                    the following intending immigrants and to be jointly and
                    severally liable for any obligations I incur under the affidavit of
                    support, promise to complete and file an affidavit of support on
                    behalf of the following named intending immigrants. </label>
                <div>
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>">
                </div>
                <p style="text-align: center;"><b>(Indicate Number)</b></p>
            </div>












            <!-- //!hellow section end div...... -->
        </div>





    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!-- <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" /> -->
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;"><b>Page 6 of 8</b></p>
    <div class=" row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Interpreter's Contact Information, Certification, and Signature (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreters's Mailing Address </b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864a_interpreter_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_864a_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_864a_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864a_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_864a_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864a_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_864a_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_864a_interpreter_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_864a_interpreter_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_interpreter_address_city_town" maxlength="20" value="<?php echo showData('i_864a_interpreter_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_864a_interpreter_address_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_864a_interpreter_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_864a_interpreter_address_zip_code" maxlength="5" value="<?php echo showData('i_864a_interpreter_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_interpreter_address_province" maxlength="20" value="<?php echo showData('i_864a_interpreter_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('i_864a_interpreter_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_interpreter_address_country" maxlength="34" value="<?php echo showData('i_864a_interpreter_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Interpreter's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864a_interpreter_daytime_tel" maxlength="15" value="<?php echo showData('i_864a_interpreter_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_interpreter_mobile" maxlength="15" value="<?php echo showData('i_864a_interpreter_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_864a_interpreter_email" maxlength="34" value="<?php echo showData('i_864a_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_interpreter_fluent_in_english" maxlength="23" value="<?php echo showData('i_864a_interpreter_fluent_in_english') ?>">
                </div>
            </div>
            <div>which is the same language specified in <b>Part 5., Item
                    Number 26.b. or Part 6., Item Number 1.b.</b>, and I have read
                to this sponsor or household member in the identified language
                every question and instruction on this contract and his or her
                answer to every question. The sponsor or household member
                informed me that he or she understands every instruction,
                question, and answer on the contract, including the <b>Sponsor's
                    or Household Member's Declaration and Certification</b>, and
                has verified the accuracy of every answer.</div>
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
                    <input type="date" class="form-control" name="i_864a_interpreter_sign_date" value="<?php echo showData('i_864a_interpreter_sign_date') ?>" />
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Contact Information, Declaration, and
                        Signature of the Person Preparing this Contract,
                        if Other Than the Sponsor or Household Member</b> </h4>
            </div>
            <h5><b>Provide the following information about the preparer</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_family_last_name" maxlength="34" value="<?php echo showData('i_864a_preparer_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_given_first_name" maxlength="34" value="<?php echo showData('i_864a_preparer_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_business_name" maxlength="34" value="<?php echo showData('i_864a_preparer_business_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Mailing Address</i></b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_preparer_address_street_number" maxlength="25" value="<?php echo showData('i_864a_preparer_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6 d-flexible"><b>3.b. </b> &nbsp;
                    <label class="control-label ">
                        <input type="radio" name="i_864a_preparer_address_apt_ste_flr" value="apt" <?php echo (showData('i_864a_preparer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label ">
                        <input type="radio" name="i_864a_preparer_address_apt_ste_flr" value="ste" <?php echo (showData('i_864a_preparer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;

                    </label>
                    <label class="control-label ">

                        <input type="radio" name="i_864a_preparer_address_apt_ste_flr" value="flr" <?php echo (showData('i_864a_preparer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_864a_preparer_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_864a_preparer_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_preparer_address_city_town" maxlength="20" value="<?php echo showData('i_864a_preparer_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_864a_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_864a_preparer_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_864a_preparer_address_zip_code" maxlength="5" value="<?php echo showData('i_864a_preparer_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_preparer_address_province" maxlength="20" value="<?php echo showData('i_864a_preparer_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_preparer_address_postal_code" maxlength="9" value="<?php echo showData('i_864a_preparer_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_address_country" maxlength="34" value="<?php echo showData('i_864a_preparer_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_daytime_tel" maxlength="15" value="<?php echo showData('i_864a_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_mobile" maxlength="15" value="<?php echo showData('i_864a_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="34" name="i_864a_preparer_email" value="<?php echo showData('i_864a_preparer_email') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!-- <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" /> -->
<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right;  margin-right: 25px;"><b>Page 7 of 8</b></p>
        <div class=" col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Contact Information, Declaration, and
                        Signature of the Person Preparing this Contract,
                        if Other Than the Sponsor or Household Member </b> (continued)
                </h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Statement</i></b></h4>
            </div>
            <label class="from-control">
                <div class="form-group">
                    <div class="col-md-2">
                        <b>7.a. </b> <?php echo createCheckbox("i_864a_i_am_not_attorney_accredited_representative_status") ?>
                    </div>
                    <div class="col-md-10">
                        <p>I am not an attorney or accredited representative but
                            have prepared this contract on behalf of the sponsor
                            and household member and with the sponsor's or
                            household member's consent.
                        </p>
                    </div>
                </div>
            </label>
            <label class="from-control">
                <div class="form-group">
                    <div class="col-md-2">
                        <b>7.b. </b> <?php echo createCheckbox("i_864a_i_am_an_attorney_accredited_representative_status") ?>
                    </div>
                    <div class="col-md-10">
                        <p>I am an attorney or accredited representative and my
                            representation of the sponsor and household member
                            in this case
                            <?php echo createCheckbox("i_864a_7b_extends_status") ?> extends <?php echo createCheckbox("i_864a_7b_does_not_extends_status") ?> does not extend beyond
                            the preparation of this contract.
                        </p>
                    </div>
                </div>
            </label>

            <div class="form-group">
                <p> <b> NOTE: </b> If you are an attorney or accredited
                    representative, you may be obliged to submit a
                    completed Form G-28, Notice of Entry of
                    Appearance as Attorney or Accredited
                    Representative, or G-28I, Notice of Entry of
                    Appearance as Attorney In Matters Outside the
                    Geographical Confines of the United States, with this
                    contract.</p>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Certification</i></b></h4>
            </div>
            <div class="form-group">
                <p> By my signature, I certify, under penalty of perjury, that I
                    prepared this contract at the request of the sponsor and
                    household member. The sponsor and household member then
                    reviewed this completed contract and informed me that he or
                    she understands all of the information contained in, and
                    submitted with, his or her contract, including the <b>Sponsor's</b> or
                    <b> Household Member's Declaration and Certification</b>, and that
                    all of this information is complete, true, and correct. I
                    completed this contract based only on information that the
                    sponsor and household member provided to me or authorized
                    me to obtain or use.
                </p>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.a. Preparer's Signature</label>
                <div class="col-md-12">
                    <input type="text" disabled class="form-control" maxlength="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="i_864a_preparer_sign_date" value="<?php echo showData('i_864a_preparer_sign_date') ?>" />
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!-- <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" /> -->
<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 8 of 8</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 9. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this contract, use the space below. If you need more
                space than what is provided, you may make copies of this page
                to complete and file with this contract or attach a separate sheet
                of paper. Type or print your name and A-Number (if any) at the
                top of each sheet; indicate the <b>Page Number, Part Number</b>,
                and <b>Item Number</b> to which your answer refers; and sign and
                date each sheet.
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864a_additional_info_last_name" value="<?php echo showData('i_864a_additional_info_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864a_additional_info_first_name" value="<?php echo showData('i_864a_additional_info_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864a_additional_info_middle_name" value="<?php echo showData('i_864a_additional_info_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-6 col-md-offset-6">
                    <div class="d-flexible">
                        <b>A-</b><input type="text" maxlength="9" class="form-control" name="i_864a_additional_info_a_number" value="<?php echo showData('i_864a_additional_info_a_number') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_864a_additional_info_3a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_3b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_3c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>3.d.</b>
                    <textarea name="i_864a_additional_info_3d" class="form-control" maxlength="340" cols="30" rows="10"><?php echo showData('i_864a_additional_info_3d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_864a_additional_info_4a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_4b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_4c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>4.d.</b>
                    <textarea name="i_864a_additional_info_4d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_864a_additional_info_4d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_864a_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_5b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_5c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>5.d.</b>
                    <textarea name="i_864a_additional_info_5d" class="form-control" maxlength="340" cols="30" rows="10"><?php echo showData('i_864a_additional_info_5d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_864a_additional_info_6a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_6b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_6c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>6.d.</b>
                    <textarea name="i_864a_additional_info_6d" class="form-control" maxlength="340" cols="30" rows="10"><?php echo showData('i_864a_additional_info_6d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_864a_additional_info_7a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_7b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864a_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_864a_additional_info_7c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>7.d.</b>
                    <textarea class="form-control" name="i_864a_additional_info_7d" maxlength="340" class="form-control" cols="30" rows="10"><?php echo showData('i_864a_additional_info_7d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>