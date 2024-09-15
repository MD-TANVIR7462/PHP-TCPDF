<?php
$meta_title     =   "INTAKE FORM I-864W";
$page_heading   =   "INTAKE FORM I-864W, Affidavit of Support Under Section 213A of the INA";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 5</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_864w_g_28_checkbox") ?> FSelect this box if Form G-28 or G-28I is attached</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>" disabled>
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You or Your Adopted Child (Intending Immigrant)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Name of Requestor</i></b></h4>
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
                <div class="col-md-12">
                    <?php echo createRadio("864w_is_current_mailing_same_as_physical") ?>
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
            <div class="form-group">
                <label class="control-label col-md-12">6. City or Town of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_city_of_birth" maxlength="36" value="<?php echo showData('other_information_about_you_city_of_birth') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">7. State or Province of Birth (if applicable)</label>
                <div class="col-md-12">
                    <div class="d-flexible">
                        <input type="text" class="form-control" maxlength="9" name="other_information_about_you_province_of_birth" value="<?php echo showData('other_information_about_you_province_of_birth') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8. Country of Birth </label>
                <div class="col-md-12">
                    <div class="d-flexible">
                        ► <input type="text" class="form-control" maxlength="12" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9. Alien Registration Number (A-Number)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_alien_registration_number" maxlength="12" value="<?php echo showData('other_information_about_you_alien_registration_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10. USCIS Online Account Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number" maxlength="12" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">11. U.S. Social Security Number (Required)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_social_security_number" maxlength="12" value="<?php echo showData('other_information_about_you_social_security_number') ?>">
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
    <p style=" text-align: right; margin-right: 15px;"><b>Page 2 of 5</b></p>
    <div class=" row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Reason for Exemption</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    I am EXEMPT from filing Form I-864, Affidavit of Support
                    Under Section 213A of the INA, because:
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.a. </b> <?php echo createCheckbox("i_864w_i_have_earned_status") ?>
                        I have earned (or can be credited with) 40 quarters
                        (credits) of coverage under the Social Security Act
                        (SSA). (Attach SSA earnings statements. Do not
                        count any quarters during which you received a
                        means-tested public benefit.)

                    </div>
                </label>
            </div>
            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.b. </b> <?php echo createCheckbox("i_864w_i_am_under_18_year_status") ?>
                        I am under 18 years of age, unmarried, immigrating
                        as the child of a U.S. citizen, and will automatically
                        become a U.S. citizen under the Child Citizenship
                        Act of 2000 upon my admission to the United States.

                    </div>
                </label>
            </div>
            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.c. </b> <?php echo createCheckbox("i_864w_i_am_filing_an_immigrant_visa_status") ?>
                        I am filing for an immigrant visa or adjustment of
                        status as a self-petitioning widow(er) using Form
                        I-360, Petition for Amerasian, Widow(er), or Special
                        Immigrant.


                    </div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.d. </b> <?php echo createCheckbox("i_864w_i_am_filing_an_immigrant_visa_adjustment_status") ?>
                        I am filing for an immigrant visa or adjustment of
                        status as a battered spouse or child using Form I-360.

                    </div>
                </label>
            </div>
            <div class="bg-info">
                <h4><b>Part 3. Requestor's (Intending Immigrant's)
                        Contract, Statement, Contact Information,
                        Declaration, Certification, and Signature</b></h4>
            </div>
            <div class="form-group">
                <p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-864W
                    Instructions before completing this part.
                </p>
            </div>

            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.a. </b> <?php echo createCheckbox("i_864w_i_can_read_understand_english_status") ?>
                        I can read and understand English, and I have read
                        and understand every question and instruction on this
                        request and my answer to every question.
                    </div>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.b. </b> <?php echo createCheckbox("i_864w_the_interpreter_named_in_status") ?>
                        The interpreter named in Part 4. read to me every
                        question and instruction on this request and my
                        answer to every question in
                    </div>
                    <div class="col-md-11 col-md-offset-1">
                        <input type="text" class="form-control" name="i_864w_the_interpreter_named_in" maxlength="34" value="<?php echo showData('i_864w_the_interpreter_named_in') ?>">
                        <p>a language in which I am fluent, and I understood everything.</p>
                    </div>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>2. </b> <?php echo createCheckbox("i_864w_at_my_request_the_preparer_named_status") ?>
                        At my request, the preparer named in Part 5.,
                    </div>
                    <div class="col-md-11 col-md-offset-1">
                        <input type="text" class="form-control" name="i_864w_at_my_request_the_preparer_named" maxlength="34" value="<?php echo showData('i_864w_at_my_request_the_preparer_named') ?>">
                        <p>prepared this request for me based only upon
                            information I provided or authorized.</p>
                    </div>
                </label>
            </div>
        </div>
        <!-- left side -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b><i>Requestor's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Requestor's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_requestor_daytime_tel" maxlength="15" value="<?php echo showData('i_864w_requestor_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Requestor's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864w_requestor_mobile" maxlength="15" value="<?php echo showData('i_864w_requestor_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Requestor's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control  " name="i_864w_requestor_email" maxlength="34" value="<?php echo showData('i_864w_requestor_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Requestor's Declaration and Certification</i></b></h4>
            </div>
            <div class="form-group">
                <p>Copies of any documents I have submitted are exact
                    photocopies of unaltered, original documents, and I understand
                    that U.S. Citizenship and Immigration Services (USCIS) or the
                    U.S. Department of State (DOS) may require that I submit
                    original documents to USCIS or DOS at a later date.
                    Furthermore, I authorize the release of any information from
                    any and all of my records that USCIS or DOS may need to
                    determine my eligibility for the immigration benefit that I seek.
                    I furthermore authorize release of information contained in this
                    request, in supporting documents, and in my USCIS or DOS
                    records, to other entities and persons where necessary for the
                    administration and enforcement of U.S. immigration law.
                    I certify, under penalty of perjury, that all of the information in
                    my request and any document submitted with it were provided
                    or authorized by me, that I reviewed and understand all of the
                    information contained in, and submitted with, my request, and
                    that all of this information is complete, true, and correct.
                    In addition, I authorize the Social Security Administration
                    (SSA) to release information about me in its records to USCIS
                    and DOS.
                </p>
            </div>
            <div class="bg-info">
                <h4><b><i>Requestor's Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Requestor's Signature</label>
                <div class="col-md-12">
                    <input type="text" disabled class="form-control" maxlength="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="i_864w_requestor_sign_date" value="<?php echo showData('i_864w_requestor_sign_date') ?>" />
                </div>
            </div>
            <div class="form-group">
                <p><b>NOTE TO ALL REQUESTORS:</b> If you do not completely
                    fill out this request or fail to submit required documents listed
                    in the Instructions, USCIS or DOS may deny your request. </p>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;"><b>Page 3 of 5</b></p>
    <div class=" row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Interpreter's Contact Information,
                        Certification, and Signature </b></h4>
            </div>
            <div class="form-group">
                <p>Provide the following information about the interpreter.</p>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864w_interpreter_family_last_name" maxlength="34" value="<?php echo showData('i_864w_interpreter_family_last_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864w_interpreter_given_first_name" maxlength="34" value="<?php echo showData('i_864w_interpreter_given_first_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_interpreter_business_name" maxlength="34" value="<?php echo showData('i_864w_interpreter_business_name') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreters's Mailing Address </b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864w_interpreter_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_864w_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_864w_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864w_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_864w_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864w_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_864w_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_864w_interpreter_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_864w_interpreter_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_interpreter_address_city_town" maxlength="20" value="<?php echo showData('i_864w_interpreter_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_864w_interpreter_address_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_864w_interpreter_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_864w_interpreter_address_zip_code" maxlength="5" value="<?php echo showData('i_864w_interpreter_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_interpreter_address_province" maxlength="20" value="<?php echo showData('i_864w_interpreter_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('i_864w_interpreter_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_interpreter_address_country" maxlength="34" value="<?php echo showData('i_864w_interpreter_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Interpreter's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864w_interpreter_daytime_tel" maxlength="15" value="<?php echo showData('i_864w_interpreter_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_interpreter_mobile" maxlength="15" value="<?php echo showData('i_864w_interpreter_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_864w_interpreter_email" maxlength="34" value="<?php echo showData('i_864w_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_interpreter_fluent_in_english" maxlength="23" value="<?php echo showData('i_864w_interpreter_fluent_in_english') ?>">
                </div>
            </div>
            <div>which is the same language specified in <b>Part 8., Item Number
                    1.b.</b>, and I have read to this sponsor in the identified language
                every question and instruction on this affidavit and his or her
                answer to every question. The sponsor informed me that he or
                she understands every instruction, question, and answer on the
                affidavit, including the <b>Sponsor's Declaration and
                    Certification,</b> and has verified the accuracy of every answer. </div>


        </div>
        <!-- left side end -->

        <div class="col-md-6">
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
                    <input type="date" class="form-control" name="i_864w_interpreter_sign_date" value="<?php echo showData('i_864w_interpreter_sign_date') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 5. Contact Information, Declaration, and
                        Signature of the Person Preparing this Request,
                        if Other Than the Requestor</b> </h4>
            </div>
            <h5><b>Provide the following information about the preparer</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_preparer_family_last_name" maxlength="34" value="<?php echo showData('i_864w_preparer_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_preparer_given_first_name" maxlength="34" value="<?php echo showData('i_864w_preparer_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_preparer_business_name" maxlength="34" value="<?php echo showData('i_864w_preparer_business_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_preparer_address_street_number" maxlength="25" value="<?php echo showData('i_864w_preparer_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6 d-flexible"><b>3.b. </b> &nbsp;
                    <label class="control-label ">
                        <input type="radio" name="i_864w_preparer_address_apt_ste_flr" value="apt" <?php echo (showData('i_864w_preparer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label ">
                        <input type="radio" name="i_864w_preparer_address_apt_ste_flr" value="ste" <?php echo (showData('i_864w_preparer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;

                    </label>
                    <label class="control-label ">

                        <input type="radio" name="i_864w_preparer_address_apt_ste_flr" value="flr" <?php echo (showData('i_864w_preparer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_864w_preparer_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_864w_preparer_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_preparer_address_city_town" maxlength="20" value="<?php echo showData('i_864w_preparer_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_864w_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_864w_preparer_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_864w_preparer_address_zip_code" maxlength="5" value="<?php echo showData('i_864w_preparer_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_preparer_address_province" maxlength="20" value="<?php echo showData('i_864w_preparer_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864w_preparer_address_postal_code" maxlength="9" value="<?php echo showData('i_864w_preparer_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_preparer_address_country" maxlength="34" value="<?php echo showData('i_864w_preparer_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_preparer_daytime_tel" maxlength="15" value="<?php echo showData('i_864w_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864w_preparer_mobile" maxlength="15" value="<?php echo showData('i_864w_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="34" name="i_864w_preparer_email" value="<?php echo showData('i_864w_preparer_email') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right;  margin-right: 25px;"><b>Page 4 of 5</b></p>
        <div class=" col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Contact Information, Declaration, and
                        Signature of the Person Preparing this Request,
                        If Other than the Requestor </b> (continued)
                </h4>
            </div>
            <div class="bg-info">
                <h4><i>Preparer's Statement</i></h4>
            </div>
            <label class="from-control">
                <div class="form-group">
                    <div class="col-md-2">
                        <b>7.a. </b> <?php echo createCheckbox("i_864w_i_am_not_attorney_accredited_representative_status") ?>
                    </div>
                    <div class="col-md-10">
                        <p>I am not an attorney or accredited representative but
                            have prepared this request on behalf of the requestor
                            and with the requestor's consent.
                        </p>
                    </div>
                </div>
            </label>
            <label class="from-control">
                <div class="form-group">
                    <div class="col-md-2">
                        <b>7.b. </b> <?php echo createCheckbox("i_864w_i_am_an_attorney_accredited_representative_status") ?>
                    </div>
                    <div class="col-md-10">
                        <p>I am an attorney or accredited representative and my
                            representation of the applicant in this case
                            <?php echo createCheckbox("i_864w_7b_extends_status") ?> extends <?php echo createCheckbox("i_864w_7b_does_not_extends_status") ?> does not extend beyond the
                            preparation of this request.
                        </p>
                    </div>
                </div>
            </label>

            <div class="form-group">
                <p> <b> NOTE: </b> If you are an attorney or accredited representative you
                    may be obliged to submit a completed Form G-28, Notice of
                    Entry of Appearance as Attorney or Accredited Representative,
                    or G-28I, Notice of Entry of Appearance as Attorney In Matters
                    Outside the Geographical Confines of the United States, with
                    this request. </p>
            </div>
            <div class="bg-info">
                <h4><i>Preparer's Certification</i></h4>
            </div>
            <div class="form-group">
                <p> By my signature, I certify, under penalty of perjury, that I
                    prepared this request at the request of the requestor. The
                    requestor then reviewed this completed request and informed
                    me that he or she understands all of the information contained
                    in, and submitted with, his or her request, including the
                    <b> Requestor's Declaration and Certification, </b> and that all of this
                    information is complete, true, and correct. I completed this
                    request based only on information that the requestor provided to
                    me or authorized me to obtain or use.
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
                    <input type="date" class="form-control" name="i_864w_preparer_sign_date" value="<?php echo showData('i_864w_preparer_sign_date') ?>" />
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6 ">

        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 5 of 5</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Additional Information </b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this request, use the space below. If you need more
                space than what is provided, you may make copies of this page
                to complete and file with this request or attach a separate sheet
                of paper. Type or print your name and A-Number (if any) at the
                top of each sheet; indicate the<b> Page Number, Part Number,</b>
                and <b>Item Number</b> to which your answer refers; and sign and
                date each sheet
            </p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864w_additional_info_last_name" value="<?php echo showData('i_864w_additional_info_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864w_additional_info_first_name" value="<?php echo showData('i_864w_additional_info_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864w_additional_info_middle_name" value="<?php echo showData('i_864w_additional_info_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-6 col-md-offset-6">
                    <div class="d-flexible">
                        <b>A-</b><input type="text" maxlength="9" class="form-control" name="i_864w_additional_info_a_number" value="<?php echo showData('i_864w_additional_info_a_number') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_864w_additional_info_3a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_3b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_3c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>3.d.</b>
                    <textarea name="i_864w_additional_info_3d" class="form-control" maxlength="340" cols="30" rows="10"><?php echo showData('i_864w_additional_info_3d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_864w_additional_info_4a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_4b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_4c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>4.d.</b>
                    <textarea name="i_864w_additional_info_4d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_864w_additional_info_4d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_864w_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_5b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_5c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>5.d.</b>
                    <textarea name="i_864w_additional_info_5d" class="form-control" maxlength="340" cols="30" rows="10"><?php echo showData('i_864w_additional_info_5d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_864w_additional_info_6a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_6b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_6c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>6.d.</b>
                    <textarea name="i_864w_additional_info_6d" class="form-control" maxlength="340" cols="30" rows="10"><?php echo showData('i_864w_additional_info_6d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_864w_additional_info_7a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_7b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864w_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_864w_additional_info_7c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>7.d.</b>
                    <textarea class="form-control" name="i_864w_additional_info_7d" maxlength="340" class="form-control" cols="30" rows="10"><?php echo showData('i_864w_additional_info_7d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>