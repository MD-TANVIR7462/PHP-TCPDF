<?php
$meta_title     =   "INTAKE FORM i_589";
$page_heading   =   "I-589, Application for Asylum and for Withholding of Removal";
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

    .text-sm {
        font-size: small;
        font-weight: 600;

    }

    .text-xs {
        font-size: 12px;
    }
</style>
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1</b></p>
    <div class="control-label col-md-12">
        <label class="control-label">START HERE - Type or print in black ink. See the instructions for information about eligibility and how to complete and file this application. There is no filing fee for this application.</label>
    </div>
    <div class="control-label col-md-12">
        <label class="control-label">
            <b>NOTE: </b> <?php echo createCheckbox("i_589_holding_of_removal_status") ?> Check this box if you also want to apply for withholding of removal under the Convention Against Torture.
        </label>
    </div>
    <div class="col-md-12">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part A.I. Information About You</b></h4>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">1. Alien Registration Number(s) (A-Number) (if any)</label>
                <input type="text" class="form-control" name="other_information_about_you_alien_registration_number" maxlength="9" value="<?php echo showData('other_information_about_you_alien_registration_number') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">2. U.S. Social Security Number (if any)</label>
                <input type="text" class="form-control" name="other_information_about_you_social_security_number" maxlength="9" value="<?php echo showData('other_information_about_you_social_security_number') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">3. USCIS Online Account Number (if any)</label>
                <input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number" maxlength="12" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">4. Complete Last Name</label>
                <input type="text" class="form-control" name="information_about_you_family_last_name" maxlength="42" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">5. First Name </label>
                <input type="text" class="form-control" name="information_about_you_given_first_name" maxlength="30" value="<?php echo showData('information_about_you_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">6. Middle Name</label>
                <input type="text" class="form-control" name="information_about_you_middle_name" maxlength="23" value="<?php echo showData('information_about_you_middle_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">7. What other names have you used (include maiden name and aliases)?</label>
                <input type="text" class="form-control" name="i-589_information_about_you_other_names" maxlength="99" value="<?php echo showData('i-589_information_about_you_other_names') ?>" />
            </div>
        </div>
        <div>
            <p class="control-label text-sm col-md-12 ">8. Residence in the U.S. (where you physically reside) </p>
            <div class="col-md-8">
                <label class="control-label text-sm ">Street Number and Name</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_street_number" maxlength="64" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Apt. Number</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <label class="control-label text-sm ">City</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="34" value="<?php echo showData('information_about_you_us_mailing_city_town') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">State</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_state" maxlength="22" value="<?php echo showData('information_about_you_us_mailing_state') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Zip Code</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Telephone Number</label>
                <div>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="i_589_information_about_you_phone_value1" maxlength="3" value="<?php echo showData('i_589_information_about_you_phone_value1') ?>">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control " name="i_589_information_about_you_phone_value2" maxlength="7" value="<?php echo showData('i_589_information_about_you_phone_value2') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <label class="control-label text-sm col-md-12 ">9. Mailing Address in the U.S. (if different than the address in Item Number 8) </label>
            <div class="col-md-8">
                <label class="control-label text-sm ">In Care Of (if applicable):</label>
                <input type="text" class="form-control" name="information_about_you_mailing_care_of_name" maxlength="67" value="<?php echo showData('information_about_you_mailing_care_of_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Telephone Number</label>
                <div>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="i_589_information_about_you_phone2_value1" maxlength="3" value="<?php echo showData('i_589_information_about_you_phone2_value1') ?>">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control " name="i_589_information_about_you_phone2_value1" maxlength="7" value="<?php echo showData('i_589_information_about_you_phone2_value1') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">Street Number and Name</label>
                <input type="text" class="form-control" name="information_about_you_mailing_street_number" maxlength="66" value="<?php echo showData('information_about_you_mailing_street_number') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Apt. Number</label>
                <input type="text" class="form-control" name="information_about_you_mailing_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">City</label>
                <input type="text" class="form-control" name="information_about_you_mailing_city_town" maxlength="32" value="<?php echo showData('information_about_you_mailing_city_town') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">State</label>
                <input type="text" class="form-control" name="information_about_you_mailing_state" maxlength="33" value="<?php echo showData('information_about_you_mailing_state') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Zip Code</label>
                <input type="text" class="form-control" name="information_about_you_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_mailing_zip_code') ?>">
            </div>
        </div>
        <div class="col-md-12 my-5">
            <label>10. Gender</label><br>
            <input type="radio" name="other_information_about_you_gender" id="male" value="male" <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : '' ?>> <label for="male">Male</label><br>
            <input type="radio" name="other_information_about_you_gender" id="female" value="female" <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : '' ?>> <label for="female">Female</label><br>
        </div>
        <div class="col-md-12">
            <label>11. Marital Status: </label><br>
            <input type="radio" name="other_information_about_you_marital_status" id="single" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : '' ?>> <label for="single">Single</label><br>
            <input type="radio" name="other_information_about_you_marital_status" id="married" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : '' ?>> <label for="married">Married</label><br>
            <input type="radio" name="other_information_about_you_marital_status" id="divorced" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : '' ?>> <label for="divorced">Divorced</label><br>
            <input type="radio" name="other_information_about_you_marital_status" id="widowed" value="widowed" <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : '' ?>> <label for="widowed">Widowed</label><br>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">12. Date of Birth (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth') ?>" />
            </div>
            <div class="col-md-8">
                <label class="control-label text-sm ">13. City and Country of Birth</label>
                <input type="text" class="form-control" name="other_information_about_you_city_of_birth" maxlength="68" value="<?php echo showData('other_information_about_you_city_of_birth') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <label class="control-label text-sm ">14. Present Nationality (Citizenship)</label>
                <input type="text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="29" value="<?php echo showData('other_information_about_you_country_of_citizen') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">15. Nationality at Birth</label>
                <input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="26" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">16. Race, Ethnic, or Tribal Group</label>
                <input type="text" class="form-control" name="i_589_information_about_you_race_ethnic" maxlength="23" value="<?php echo showData('i_589_information_about_you_race_ethnic') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">17. Religion</label>
                <input type="text" class="form-control" name="i_589_information_about_you_religion" maxlength="18" value="<?php echo showData('i_589_information_about_you_religion') ?>">
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label class="">
                <b>18.</b>Check the box, a through c, that applies:
            </label>
            <br>
            <label class="control-label">
                <b>a.</b> <?php echo createCheckbox("i_589_never_in_imgt_court_proceeding_status") ?> I have never been in Immigration Court proceedings.
            </label><br>
            <label class="control-label">
                <b>b.</b> <?php echo createCheckbox("i_589_am_now_imgt_court_proceeding_status") ?> I am now in Immigration Court proceedings
            </label><br>
            <label class="control-label">
                <b>c.</b> <?php echo createCheckbox("i_589_not_now_imgt_court_proceeding_status") ?> I am not now in Immigration Court proceedings, but I have been in the past.
            </label>
        </div><br>
        <div>
            <label class="control-label col-md-12">19. Complete 19 a through c.</label>
            <div class="col-md-5">
                <label class="control-label text-sm ">a. When did you last leave your country? (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_589_last_leave_country" value="<?php echo showData('i_589_last_leave_country') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label text-sm ">b. What is your current I-94 Number, if any?</label>
                <input type="text" class="form-control" name="i_589_current_i94_number" maxlength="11" value="<?php echo showData('i_589_current_i94_number') ?>">
            </div>
        </div>
        <div>
            <label class="control-label col-md-12">c. List each entry into the U.S. beginning with your most recent entry. List date (mm/dd/yyyy), place, and your status for each entry. (Attach additional sheets as needed.)</label>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_589_most_recent_entry_date" value="<?php echo showData('i_589_most_recent_entry_date') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_589_most_recent_entry_place" maxlength="20" value="<?php echo showData('i_589_most_recent_entry_place') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_589_most_recent_entry_status" maxlength="15" value="<?php echo showData('i_589_most_recent_entry_status') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date Status Expires
                </label>
                <input type="date" class="form-control" name="i_589_most_recent_entry_expires_date" value="<?php echo showData('i_589_most_recent_entry_expires_date') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_589_most_recent_entry_date2" value="<?php echo showData('i_589_most_recent_entry_date2') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_589_most_recent_entry_place2" maxlength="20" value="<?php echo showData('i_589_most_recent_entry_place2') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_589_most_recent_entry_status2" maxlength="15" value="<?php echo showData('i_589_most_recent_entry_status2') ?>">
            </div>

            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_589_most_recent_entry_date3" value="<?php echo showData('i_589_most_recent_entry_date3') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_589_most_recent_entry_place3" maxlength="20" value="<?php echo showData('i_589_most_recent_entry_place3') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_589_most_recent_entry_status3" maxlength="15" value="<?php echo showData('i_589_most_recent_entry_status3') ?>">
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div>
            <div class="col-md-5">
                <label class="control-label text-sm ">20. What country issued your last passport or travel document?</label>
                <input type="text" class="form-control" name="i_94_imgt_country_issuance_passport" maxlength="37" value="<?php echo showData('i_94_imgt_country_issuance_passport') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">21. Passport Number</label>
                <input type="text" class="form-control" name="other_information_about_you_passport_number" maxlength="25" value="<?php echo showData('other_information_about_you_passport_number') ?>">
                <label class="control-label text-sm ">Travel Document Number</label>
                <input type="text" class="form-control" name="other_information_about_you_travel_document_number" maxlength="21" value="<?php echo showData('other_information_about_you_travel_document_number') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">22. Expiration Date (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">23. What is your native language (include dialect, if applicable)?</label>
                <input type="text" class="form-control" name="i_589_native_language" maxlength="41" value="<?php echo showData('i_589_native_language') ?>" />
            </div>
            <div class="col-md-4">
                <div class="col-md-12 my-5">
                    <label>24. Are you fluent in English?</label><br>
                    <div>
                        <?php echo createRadio("i_589_fluent_in_english_status") ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">25. What other languages do you speak fluently?</label>
                <input type="text" class="form-control" name="i_589_fluent_other_language" maxlength="32" value="<?php echo showData('i_589_fluent_other_language') ?>">
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
    <p style=" text-align: right; margin-right: 15px;"><b>Page 2</b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part A.II. Information About Your Spouse and Children</b></h4>
        </div>
        <div class="control-label col-md-12">
            <label class="control-label">
                <?php echo createCheckbox("i_589_not_married_status") ?> I am not married. (Skip to Your Children below.)
            </label>
        </div>
        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                <input type="date" class="form-control" name="current_spouse_a_number" maxlength="9" value="<?php echo showData('current_spouse_a_number') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                <input type="text" class="form-control" name="i_539_current_spouse_passport_id_number" maxlength="23" value="<?php echo showData('i_539_current_spouse_passport_id_number') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">3. Date of Birth (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="current_spouse_date_of_birth" value="<?php echo showData('current_spouse_date_of_birth') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                <input type="text" class="form-control" name="i_539_current_spouse_social_security_number" maxlength="9" value="<?php echo showData('i_539_current_spouse_social_security_number') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">5. Complete Last Name</label>
                <input type="date" class="form-control" name="current_spouse_family_last_name" value="<?php echo showData('current_spouse_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">6. First Name</label>
                <input type="text" class="form-control" name="current_spouse_given_first_name" maxlength="23" value="<?php echo showData('current_spouse_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">7. Middle Name</label>
                <input type="text" class="form-control" name="current_spouse_family_middle_name" maxlength="22" value="<?php echo showData('current_spouse_family_middle_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">8. Other names used (include maiden name and aliases)</label>
                <input type="text" class="form-control" name="i_539_current_spouse_other_name" maxlength="22" value="<?php echo showData('i_539_current_spouse_other_name') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-4">
                <label class="control-label " style="font-size: smaller;">9. Date of Marriage (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="current_spouse_date_of_marriage" value="<?php echo showData('current_spouse_date_of_marriage') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label " style="font-size: smaller;">10. Place of Marriage</label>
                <input type="text" class="form-control" name="current_spouse_marriage_place_country" maxlength="27" value="<?php echo showData('current_spouse_marriage_place_country') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label " style="font-size: smaller;">11. City and Country of Birth</label>
                <input type="text" class="form-control" name="current_spouse_birth_place_country" maxlength="29" value="<?php echo showData('current_spouse_birth_place_country') ?>">
            </div>
        </div>
        <div class="col-md-12 d-flexible">
            <div class="col-md-4" style="align-items: center;">
                <label class="control-label " style="font-size: smaller;">12. Nationality (Citizenship)</label>
                <input type="date" class="form-control" name="i_589_current_spouse_nationality" maxlength="37" value="<?php echo showData('i_589_current_spouse_nationality') ?>" />
            </div>
            <div class="col-md-4" style="align-items: center;">
                <label class="control-label " style="font-size: smaller;">13. Race, Ethnic, or Tribal Group</label>
                <input type="text" class="form-control" name="i_589_current_spouse_race_ethnic" maxlength="36" value="<?php echo showData('i_589_current_spouse_race_ethnic') ?>">
            </div>
            <div class="col-md-4" style="align-items: center;">
                <label style="font-size: smaller;">14. Gender</label><br>
                <div class="d-flexible">
                    <input type="radio" name="i_589_current_spouse_gender" id="male_14" value="male" <?php echo (showData('i_589_current_spouse_gender') == 'male') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="male_14">Male</label><br>
                    <input type="radio" name="i_589_current_spouse_gender" id="female_14" value="female" <?php echo (showData('i_589_current_spouse_gender') == 'female') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="female_14">Female</label><br>
                </div>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <div class="col-md-5" style="align-items: center;">
                <label style="font-size: smaller;">15. Is this person in the U.S.?</label><br>
                <div class="d-flexible">
                    <input type="radio" name="i_589_current_spouse_in_usa" id="15_YES" value="Y" <?php echo (showData('i_589_current_spouse_in_usa') == 'Y') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="15_YES">Yes (Complete Blocks 16 to 24.)</label><br>
                    <input type="radio" name="i_589_current_spouse_in_usa" id="15_NO" value="N" <?php echo (showData('i_589_current_spouse_in_usa') == 'N') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="15_NO">No (Specify location):</label><br>
                </div>
            </div>
            <div class="col-md-6" style="align-items: center;">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="50" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">16. Place of last entry into the U.S. </label>
                <input type="date" class="form-control" name="i_589_current_spouse_place_of_last_entry" maxlength="21" value="<?php echo showData('i_589_current_spouse_place_of_last_entry') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">17. Date of last entry into the U.S. (mm/dd/yyyy) </label>
                <input type="text" class="form-control" name="i_589_current_spouse_date_of_last_entry" value="<?php echo showData('i_589_current_spouse_date_of_last_entry') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">18. I-94 Number (if any)</label>
                <input type="text" class="form-control" name="i_589_current_spouse_i94_number" maxlength="11" value="<?php echo showData('i_589_current_spouse_i94_number') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">19. Status when last admitted (Visa type, if any)</label>
                <input type="text" class="form-control" name="i_589_current_spouse_visa_type" maxlength="24" value="<?php echo showData('i_589_current_spouse_visa_type') ?>">
            </div>
        </div>

        <div class="col-md-12 my-4">
            <div class="col-md-3">
                <label class="control-label" style="font-size: 12px;">20. What is your spouse's current status?</label>
                <input type="text" class="form-control" name="i_589_current_spouse_current_status" value="<?php echo showData('i_589_current_spouse_current_status'); ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label" style="font-size: 12px;">21. Expiration date of authorized stay, if any (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_589_current_spouse_expiration_date" value="<?php echo showData('i_589_current_spouse_expiration_date'); ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label" style="font-size: 12px;">22. Is your spouse in Immigration Court proceedings?</label>
                <div><?php echo createRadio("i_589_current_spouse_immigration_proceedings"); ?></div>
            </div>
            <div class="col-md-3">
                <label class="control-label" style="font-size: 12px;">23. Date of previous arrival (if any) (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_589_current_spouse_previous_arrival_date" value="<?php echo showData('i_589_current_spouse_previous_arrival_date'); ?>" />
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label col-md-12" style="font-size: 12px;">24. Is your spouse included in this application?</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_589_current_spouse_included_in_application"); ?>
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label col-md-12" style="font-size: 12px;">Your Children. List all of your children, regardless of age, location, or marital status.</label>
        </div>

        <div class="col-md-12">
            <div class="col-md-12">
                <label class="control-label" style="font-size: 12px;">
                    <?php echo createCheckbox("i_589_no_children_status"); ?> I do not have any children. (Skip to Part A.III., Information about your background.)
                </label>
            </div>
            <div class="col-md-12">
                <label class="control-label" style="font-size: 12px;">
                    <?php echo createCheckbox("i_589_have_children_status"); ?> I have children.
                </label>
            </div>
        </div>


        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number)</label>
                    <input type="text" class="form-control" name="i_589_child_alien_registration_number" maxlength="9" value="<?php echo showData('i_589_child_alien_registration_number'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_passport_id_card_number" maxlength="20" value="<?php echo showData('i_589_child_passport_id_card_number'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="i_589_child_marital_status" maxlength="24" value="<?php echo showData('i_589_child_marital_status'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_social_security_number" maxlength="9" value="<?php echo showData('i_589_child_social_security_number'); ?>" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="i_589_child_complete_last_name" maxlength="29" value="<?php echo showData('i_589_child_complete_last_name') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="i_589_child_first_name" maxlength="20" value="<?php echo showData('i_589_child_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="i_589_child_middle_name" maxlength="20" value="<?php echo showData('i_589_child_middle_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_birth" value="<?php echo showData('i_589_child_date_of_birth') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="i_589_child_city_country_of_birth" maxlength="29" value="<?php echo showData('i_589_child_city_country_of_birth') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="i_589_child_nationality" maxlength="20" value="<?php echo showData('i_589_child_nationality') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="i_589_child_ethnic_group" maxlength="24" value="<?php echo showData('i_589_child_ethnic_group') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">12. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_gender" id="male_12" value="male" <?php echo (showData('i_589_child_gender') == 'male') ? 'checked' : '' ?>> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="i_589_child_gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S.?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_in_us" id="yes_13" value="Y" <?php echo (showData('i_589_child_in_us') == 'Y') ? 'checked' : '' ?>> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="i_589_child_in_us" id="no_13" value="N" <?php echo (showData('i_589_child_in_us') == 'N') ? 'checked' : '' ?>> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_589_child_location_if_not_in_us" maxlength="32" value="<?php echo showData('i_589_child_location_if_not_in_us') ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="i_589_child_place_of_last_entry" maxlength="29" value="<?php echo showData('i_589_child_place_of_last_entry') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_last_entry" value="<?php echo showData('i_589_child_date_of_last_entry') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="i_589_child_i94_number" maxlength="11" value="<?php echo showData('i_589_child_i94_number') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="i_589_child_status_when_last_admitted" maxlength="20" value="<?php echo showData('i_589_child_status_when_last_admitted') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="i_589_child_current_status" maxlength="29" value="<?php echo showData('i_589_child_current_status') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_expiration_date_of_stay" value="<?php echo showData('i_589_child_expiration_date_of_stay') ?>">
                </div>
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_child_in_court_proceedings" id="yes_20" value="Y" <?php echo (showData('i_589_child_child_in_court_proceedings') == 'Y') ? 'checked' : '' ?>> <label for="yes_20" style="font-size: smaller;">Yes</label><br>
                        <input type="radio" name="i_589_child_child_in_court_proceedings" id="no_20" value="N" <?php echo (showData('i_589_child_child_in_court_proceedings') == 'Y') ? 'checked' : '' ?>> <label for="no_20" style="font-size: smaller;">No</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application") ?>
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
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;"><b>Page 3 </b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part A.II. Information About Your Spouse and Children (Continued)</b></h4>
        </div>
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number)</label>
                    <input type="text" class="form-control" name="i_589_child_alien_registration_number2" maxlength="9" value="<?php echo showData('i_589_child_alien_registration_number2'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_passport_id_card_number2" maxlength="20" value="<?php echo showData('i_589_child_passport_id_card_number2'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="i_589_child_marital_status2" maxlength="24" value="<?php echo showData('i_589_child_marital_status2'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_social_security_number2" maxlength="9" value="<?php echo showData('i_589_child_social_security_number2'); ?>" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="i_589_child_complete_last_name2" maxlength="29" value="<?php echo showData('i_589_child_complete_last_name2') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="i_589_child_first_name2" maxlength="20" value="<?php echo showData('i_589_child_first_name2') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="i_589_child_middle_name2" maxlength="20" value="<?php echo showData('i_589_child_middle_name2') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_birth2" value="<?php echo showData('i_589_child_date_of_birth2') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="i_589_child_city_country_of_birth2" maxlength="29" value="<?php echo showData('i_589_child_city_country_of_birth2') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="i_589_child_nationality2" maxlength="20" value="<?php echo showData('i_589_child_nationality2') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="i_589_child_ethnic_group2" maxlength="24" value="<?php echo showData('i_589_child_ethnic_group2') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">12. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_gender2" id="male_12_2" value="male" <?php echo (showData('i_589_child_gender2') == 'male') ? 'checked' : '' ?>> <label for="male_12_2" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="i_589_child_gender2" id="female_12_2" value="female"> <label for="female_12_2" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S.?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_in_us2" id="yes_13_2" value="Y" <?php echo (showData('i_589_child_in_us2') == 'Y') ? 'checked' : '' ?>> <label for="yes_13_2" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="i_589_child_in_us2" id="no_13_2" value="N" <?php echo (showData('i_589_child_in_us2') == 'N') ? 'checked' : '' ?>> <label for="no_13_2" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_589_child_location_if_not_in_us2" maxlength="32" value="<?php echo showData('i_589_child_location_if_not_in_us2') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="i_589_child_place_of_last_entry2" maxlength="29" value="<?php echo showData('i_589_child_place_of_last_entry2') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_last_entry2" value="<?php echo showData('i_589_child_date_of_last_entry2') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="i_589_child_i94_number2" maxlength="11" value="<?php echo showData('i_589_child_i94_number2') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="i_589_child_status_when_last_admitted2" maxlength="20" value="<?php echo showData('i_589_child_status_when_last_admitted2') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="i_589_child_current_status2" maxlength="29" value="<?php echo showData('i_589_child_current_status2') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_expiration_date_of_stay2" value="<?php echo showData('i_589_child_expiration_date_of_stay2') ?>">
                </div>
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_child_in_court_proceedings2" id="yes_20_2" value="Y" <?php echo (showData('i_589_child_child_in_court_proceedings2') == 'Y') ? 'checked' : '' ?>> <label for="yes_20_2" style="font-size: smaller;">Yes</label><br>
                        <input type="radio" name="i_589_child_child_in_court_proceedings2" id="no_20_2" value="n" <?php echo (showData('i_589_child_child_in_court_proceedings2') == 'n') ? 'checked' : '' ?>> <label for="no_20_2" style="font-size: smaller;">No</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application2") ?>
                </div>
            </div>
        </div>

        <hr style="border: 1px solid #729af8 ;" class="my-5">
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number)</label>
                    <input type="text" class="form-control" name="i_589_child_alien_registration_number3" maxlength="9" value="<?php echo showData('i_589_child_alien_registration_number3'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_passport_id_card_number3" maxlength="20" value="<?php echo showData('i_589_child_passport_id_card_number3'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="i_589_child_marital_status3" maxlength="24" value="<?php echo showData('i_589_child_marital_status3'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_social_security_number3" maxlength="9" value="<?php echo showData('i_589_child_social_security_number3'); ?>" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="i_589_child_complete_last_name3" maxlength="29" value="<?php echo showData('i_589_child_complete_last_name3') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="i_589_child_first_name3" maxlength="20" value="<?php echo showData('i_589_child_first_name3') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="i_589_child_middle_name3" maxlength="20" value="<?php echo showData('i_589_child_middle_name3') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_birth3" value="<?php echo showData('i_589_child_date_of_birth3') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="i_589_child_city_country_of_birth3" maxlength="29" value="<?php echo showData('i_589_child_city_country_of_birth3') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="i_589_child_nationality3" maxlength="20" value="<?php echo showData('i_589_child_nationality3') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="i_589_child_ethnic_group3" maxlength="24" value="<?php echo showData('i_589_child_ethnic_group3') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">12. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_gender3" id="male_12_3" value="male" <?php echo (showData('i_589_child_gender3') == 'male') ? 'checked' : '' ?>> <label for="male_12_3" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="i_589_child_gender3" id="female_12_3" value="female"> <label for="female_12_3" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S.?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_in_us3" id="yes_13_3" value="Y" <?php echo (showData('i_589_child_in_us3') == 'Y') ? 'checked' : '' ?>> <label for="yes_13_3" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="i_589_child_in_us3" id="no_13_3" value="N" <?php echo (showData('i_589_child_in_us3') == 'N') ? 'checked' : '' ?>> <label for="no_13_3" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_589_child_location_if_not_in_us3" maxlength="32" value="<?php echo showData('i_589_child_location_if_not_in_us3') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="i_589_child_place_of_last_entry3" maxlength="29" value="<?php echo showData('i_589_child_place_of_last_entry3') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_last_entry3" value="<?php echo showData('i_589_child_date_of_last_entry3') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="i_589_child_i94_number3" maxlength="11" value="<?php echo showData('i_589_child_i94_number3') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="i_589_child_status_when_last_admitted3" maxlength="20" value="<?php echo showData('i_589_child_status_when_last_admitted3') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="i_589_child_current_status3" maxlength="29" value="<?php echo showData('i_589_child_current_status3') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_expiration_date_of_stay3" value="<?php echo showData('i_589_child_expiration_date_of_stay3') ?>">
                </div>
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_child_in_court_proceedings3" id="yes_20_3" value="Y" <?php echo (showData('i_589_child_child_in_court_proceedings3') == 'Y') ? 'checked' : '' ?>> <label for="yes_20_3" style="font-size: smaller;">Yes</label><br>
                        <input type="radio" name="i_589_child_child_in_court_proceedings3" id="no_20_3" value="N" <?php echo (showData('i_589_child_child_in_court_proceedings3') == 'Y') ? 'checked' : '' ?>> <label for="no_20_3" style="font-size: smaller;">No</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application3") ?>
                </div>
            </div>
        </div>


        <hr style="border: 1px solid #729af8 ;" class="my-5">
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number)</label>
                    <input type="text" class="form-control" name="i_589_child_alien_registration_number4" maxlength="9" value="<?php echo showData('i_589_child_alien_registration_number4') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_passport_id_card_number4" maxlength="20" value="<?php echo showData('i_589_child_passport_id_card_number4') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="i_589_child_marital_status4" maxlength="24" value="<?php echo showData('i_589_child_marital_status4') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_social_security_number4" maxlength="9" value="<?php echo showData('i_589_child_social_security_number4') ?>" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="i_589_child_complete_last_name4" maxlength="29" value="<?php echo showData('i_589_child_complete_last_name4') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="i_589_child_first_name4" maxlength="20" value="<?php echo showData('i_589_child_first_name4') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="i_589_child_middle_name4" maxlength="20" value="<?php echo showData('i_589_child_middle_name4') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_birth4" value="<?php echo showData('i_589_child_date_of_birth4') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="i_589_child_city_country_of_birth4" maxlength="29" value="<?php echo showData('i_589_child_city_country_of_birth4') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="i_589_child_nationality4" maxlength="20" value="<?php echo showData('i_589_child_nationality4') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="i_589_child_ethnic_group4" maxlength="24" value="<?php echo showData('i_589_child_ethnic_group4') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">12. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_gender4" id="male_12_4" value="male" <?php echo (showData('i_589_child_gender') == 'male') ? 'checked' : '' ?>> <label for="male_12_4" style="font-size: smaller;">Male</label4><br>
                            <input type="radio" name="i_589_child_gender4" id="female_12_4" value="female"> <label for="female_12_4" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S.?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_in_us4" id="yes_13_4" value="Y" <?php echo (showData('i_589_child_in_us') == 'Y') ? 'checked' : '' ?>> <label for="yes_13_4" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label4><br>
                            <input type="radio" name="i_589_child_in_us4" id="no_13_4" value="N" <?php echo (showData('i_589_child_in_us') == 'N') ? 'checked' : '' ?>> <label for="no_13_4" style="font-size: smaller;">No (Specify location4):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_589_child_location_if_not_in_us4" maxlength="32" value="<?php echo showData('i_589_child_location_if_not_in_us4') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="i_589_child_place_of_last_entry4" maxlength="29" value="<?php echo showData('i_589_child_place_of_last_entry4') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_last_entry4" value="<?php echo showData('i_589_child_date_of_last_entry4') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="i_589_child_i94_number4" maxlength="11" value="<?php echo showData('i_589_child_i94_number4') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="i_589_child_status_when_last_admitted4" maxlength="20" value="<?php echo showData('i_589_child_status_when_last_admitted4') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="i_589_child_current_status4" maxlength="29" value="<?php echo showData('i_589_child_current_status4') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_expiration_date_of_stay4" value="<?php echo showData('i_589_child_expiration_date_of_stay4') ?>">
                </div>
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_child_in_court_proceedings4" id="yes_20_4" value="Y" <?php echo (showData('i_589_child_child_in_court_proceedings4') == 'Y') ? 'checked' : '' ?>> <label for="yes_20_4" style="font-size: smaller;">Yes</label4><br>
                            <input type="radio" name="i_589_child_child_in_court_proceedings4" id="no_20_4" value="N" <?php echo (showData('i_589_child_child_in_court_proceedings4') == 'N') ? 'checked' : '' ?>> <label for="no_20_4" style="font-size: smaller;">No4</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application4") ?>
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
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 </b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part A.III. Information About Your Background</b></h4>
        </div>
        <div>
            <label class="control-label col-md-12">1. List your last address where you lived before coming to the United States. If this is not the country where you fear persecution, also list the last
                address in the country where you fear persecution. <i>(List Address, City/Town, Department, Province, or State and Country.)</i> </label>
            <div class="col-md-12">
                <label class="control-label text-sm ">(<b>NOTE</b>: <i>Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</label>
            </div>
        </div>
        <div class="col-md-12">
            <table border="1" style="width: 100%;">
                <thead>
                    <tr class="bg-info">
                        <th>Number and Street (Provide if available)</th>
                        <th>City/Town</th>
                        <th>Department, Province, or State</th>
                        <th>Country</th>
                        <th>Date From (Mo/Yr)</th>
                        <th>Date To (Mo/Yr)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_1[]" value="<?php echo showData('info_about_your_background_number_street_1', '0') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_1[]" value="<?php echo showData('info_about_your_background_city_town_1', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_1[]" value="<?php echo showData('info_about_your_background_province_state_1', '0') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_1[]" value="<?php echo showData('info_about_your_background_country_1', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_1[]" value="<?php echo showData('info_about_your_background_date_from_1', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_1[]" value="<?php echo showData('info_about_your_background_date_to_1', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_1[]" value="<?php echo showData('info_about_your_background_number_street_1', '1') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_1[]" value="<?php echo showData('info_about_your_background_city_town_1', '1') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_1[]" value="<?php echo showData('info_about_your_background_province_state_1', '1') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_1[]" value="<?php echo showData('info_about_your_background_country_1', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_1[]" value="<?php echo showData('info_about_your_background_date_from_1', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_1[]" value="<?php echo showData('info_about_your_background_date_to_1', '1') ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <label class="control-label col-md-12">2. Provide the following info about your residences during the past 5 years. List your present address first. </label>
            <div class="col-md-12">
                <label class="control-label text-sm ">(<b>NOTE</b>: <i>Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</label>
            </div>
        </div>
        <div class="col-md-12 ">
            <table border="1" style="width: 100%;">
                <thead>
                    <tr class="bg-info">
                        <th>Number and Street</th>
                        <th>City/Town</th>
                        <th>Department, Province, or State</th>
                        <th>Country</th>
                        <th>Date From (Mo/Yr)</th>
                        <th>Date To (Mo/Yr)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_2[]" value="<?php echo showData('info_about_your_background_number_street_2', '0') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_2[]" value="<?php echo showData('info_about_your_background_city_town_2', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_2[]" value="<?php echo showData('info_about_your_background_province_state_2', '0') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_2[]" value="<?php echo showData('info_about_your_background_country_2', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_2[]" value="<?php echo showData('info_about_your_background_date_from_2', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_2[]" value="<?php echo showData('info_about_your_background_date_to_2', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_2[]" value="<?php echo showData('info_about_your_background_number_street_2', '1') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_2[]" value="<?php echo showData('info_about_your_background_city_town_2', '1') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_2[]" value="<?php echo showData('info_about_your_background_province_state_2', '1') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_2[]" value="<?php echo showData('info_about_your_background_country_2', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_2[]" value="<?php echo showData('info_about_your_background_date_from_2', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_2[]" value="<?php echo showData('info_about_your_background_date_to_2', '1') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_2[]" value="<?php echo showData('info_about_your_background_number_street_2', '2') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_2[]" value="<?php echo showData('info_about_your_background_city_town_2', '2') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_2[]" value="<?php echo showData('info_about_your_background_province_state_2', '2') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_2[]" value="<?php echo showData('info_about_your_background_country_2', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_2[]" value="<?php echo showData('info_about_your_background_date_from_2', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_2[]" value="<?php echo showData('info_about_your_background_date_to_2', '2') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_2[]" value="<?php echo showData('info_about_your_background_number_street_2', '3') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_2[]" value="<?php echo showData('info_about_your_background_city_town_2', '3') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_2[]" value="<?php echo showData('info_about_your_background_province_state_2', '3') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_2[]" value="<?php echo showData('info_about_your_background_country_2', '3') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_2[]" value="<?php echo showData('info_about_your_background_date_from_2', '3') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_2[]" value="<?php echo showData('info_about_your_background_date_to_2', '3') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_number_street_2[]" value="<?php echo showData('info_about_your_background_number_street_2', '4') ?>"></td>
                        <td><input type="text" maxlength="17" style="width: 100%; margin: 0;" name="info_about_your_background_city_town_2[]" value="<?php echo showData('info_about_your_background_city_town_2', '4') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="info_about_your_background_province_state_2[]" value="<?php echo showData('info_about_your_background_province_state_2', '4') ?>"></td>
                        <td><input type="text" maxlength="14" style="width: 100%; margin: 0;" name="info_about_your_background_country_2[]" value="<?php echo showData('info_about_your_background_country_2', '4') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_from_2[]" value="<?php echo showData('info_about_your_background_date_from_2', '4') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_date_to_2[]" value="<?php echo showData('info_about_your_background_date_to_2', '4') ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <label class="control-label col-md-12">3. Provide the following information about your education, beginning with the most recent school that you attended. </label>
            <div class="col-md-12">
                <label class="control-label text-sm ">(<b>NOTE</b>: <i>Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</label>
            </div>
        </div>
        <div class="col-md-12 ">
            <table border="1" style="width: 100%;">
                <thead>
                    <tr class="bg-info">
                        <th>Name of School</th>
                        <th>Type of School</th>
                        <th>Location (Address)</th>
                        <th>Attended From (Mo/Yr)</th>
                        <th>Attended To (Mo/Yr)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" maxlength="29" style="width: 100%; margin: 0;" name="info_about_your_background_education_name_of_school_1[]" value="<?php echo showData('info_about_your_background_education_name_of_school_1', '0') ?>"></td>
                        <td><input type="text" maxlength="20" style="width: 100%; margin: 0;" name="info_about_your_background_education_type_of_school_1[]" value="<?php echo showData('info_about_your_background_education_type_of_school_1', '0') ?>"></td>
                        <td><input type="text" maxlength="26" style="width: 100%; margin: 0;" name="info_about_your_background_education_location_address_1[]" value="<?php echo showData('info_about_your_background_education_location_address_1', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_education_attended_from_1[]" value="<?php echo showData('info_about_your_background_education_attended_from_1', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_education_attended_to_1[]" value="<?php echo showData('info_about_your_background_education_attended_to_1', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="29" style="width: 100%; margin: 0;" name="info_about_your_background_education_name_of_school_1[]" value="<?php echo showData('info_about_your_background_education_name_of_school_1', '1') ?>"></td>
                        <td><input type="text" maxlength="20" style="width: 100%; margin: 0;" name="info_about_your_background_education_type_of_school_1[]" value="<?php echo showData('info_about_your_background_education_type_of_school_1', '1') ?>"></td>
                        <td><input type="text" maxlength="26" style="width: 100%; margin: 0;" name="info_about_your_background_education_location_address_1[]" value="<?php echo showData('info_about_your_background_education_location_address_1', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_education_attended_from_1[]" value="<?php echo showData('info_about_your_background_education_attended_from_1', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_education_attended_to_1[]" value="<?php echo showData('info_about_your_background_education_attended_to_1', '1') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="29" style="width: 100%; margin: 0;" name="info_about_your_background_education_name_of_school_1[]" value="<?php echo showData('info_about_your_background_education_name_of_school_1', '2') ?>"></td>
                        <td><input type="text" maxlength="20" style="width: 100%; margin: 0;" name="info_about_your_background_education_type_of_school_1[]" value="<?php echo showData('info_about_your_background_education_type_of_school_1', '2') ?>"></td>
                        <td><input type="text" maxlength="26" style="width: 100%; margin: 0;" name="info_about_your_background_education_location_address_1[]" value="<?php echo showData('info_about_your_background_education_location_address_1', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_education_attended_from_1[]" value="<?php echo showData('info_about_your_background_education_attended_from_1', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_education_attended_to_1[]" value="<?php echo showData('info_about_your_background_education_attended_to_1', '2') ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <label class="control-label col-md-12">4. Provide the following information about your employment during the past 5 years. List your present employment first. </label>
            <div class="col-md-12">
                <label class="control-label text-sm ">(<b>NOTE</b>: <i> Use Form I-589 Supplement B, or additional sheets of paper, if necessary.</i>)</label>
            </div>
        </div>
        <div class="col-md-12 ">
            <table border="1" style="width: 100%;">
                <thead>
                    <tr class="bg-info">
                        <th>Name and Address of Employer</th>
                        <th>Your Occupation</th>
                        <th>Dates From (Mo/Yr)</th>
                        <th>Dates To (Mo/Yr)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" maxlength="50" style="width: 100%; margin: 0;" name="info_about_your_background_employer_name_address_1[]" value="<?php echo showData('info_about_your_background_employer_name_address_1', '0') ?>"></td>
                        <td><input type="text" maxlength="28" style="width: 100%; margin: 0;" name="info_about_your_background_employer_occupation_1[]" value="<?php echo showData('info_about_your_background_employer_occupation_1', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_employer_dates_from_1[]" value="<?php echo showData('info_about_your_background_employer_dates_from_1', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_employer_dates_to_1[]" value="<?php echo showData('info_about_your_background_employer_dates_to_1', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="50" style="width: 100%; margin: 0;" name="info_about_your_background_employer_name_address_1[]" value="<?php echo showData('info_about_your_background_employer_name_address_1', '1') ?>"></td>
                        <td><input type="text" maxlength="28" style="width: 100%; margin: 0;" name="info_about_your_background_employer_occupation_1[]" value="<?php echo showData('info_about_your_background_employer_occupation_1', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_employer_dates_from_1[]" value="<?php echo showData('info_about_your_background_employer_dates_from_1', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_employer_dates_to_1[]" value="<?php echo showData('info_about_your_background_employer_dates_to_1', '1') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="50" style="width: 100%; margin: 0;" name="info_about_your_background_employer_name_address_1[]" value="<?php echo showData('info_about_your_background_employer_name_address_1', '2') ?>"></td>
                        <td><input type="text" maxlength="28" style="width: 100%; margin: 0;" name="info_about_your_background_employer_occupation_1[]" value="<?php echo showData('info_about_your_background_employer_occupation_1', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_employer_dates_from_1[]" value="<?php echo showData('info_about_your_background_employer_dates_from_1', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0;" name="info_about_your_background_employer_dates_to_1[]" value="<?php echo showData('info_about_your_background_employer_dates_to_1', '2') ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <label class="control-label col-md-12">5. Provide the following information about your parents and siblings (brothers and sisters). Check the box if the person is deceased. </label>
            <div class="col-md-12">
                <label class="control-label text-sm ">(<b>NOTE</b>: <i> : Use Form I-589 Supplement B, or additional sheets of paper, if necessary</i>)</label>
            </div>
        </div>
        <div class="col-md-12">
            <table border="1" style="width: 100%;">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 6%;"></th>
                        <th style="width: 21%;">Full Name</th>
                        <th style="width: 26%;">City/Town and Country of Birth</th>
                        <th style="width: 10%;"></th>
                        <th style="width: 25%;">Current Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mother</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_mother_name[]" value="<?php echo showData('info_about_your_background_mother_name', '0') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_mother_birth_place[]" value="<?php echo showData('info_about_your_background_mother_birth_place', '0') ?>"></td>                       
                        <td><input type="checkbox" value="Y" name="info_about_your_background_mother_deceased" id="mother_deceased2"> <?php echo (showData('info_about_your_background_mother_deceased') == 'Y') ? 'checked' : '' ?><label for="mother_deceased2" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="22" style="width: 100%; margin: 0;" name="info_about_your_background_mother_current_location[]" value="<?php echo showData('info_about_your_background_mother_current_location', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td>Father</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_father_name[]" value="<?php echo showData('info_about_your_background_father_name', '1') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_father_birth_place[]" value="<?php echo showData('info_about_your_background_father_birth_place', '1') ?>"></td>
                        <td><input type="checkbox" value="Y" name="info_about_your_background_father_deceased" id="father_deceased2">  <?php echo (showData('info_about_your_background_father_deceased') == 'Y') ? 'checked' : '' ?><label for="father_deceased2" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="info_about_your_background_father_current_location[]" value="<?php echo showData('info_about_your_background_father_current_location', '1') ?>"></td>
                    </tr>
                    <tr>
                        <td>Sibling</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_sibling1_name[]" value="<?php echo showData('info_about_your_background_sibling1_name', '2') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_sibling1_birth_place[]" value="<?php echo showData('info_about_your_background_sibling1_birth_place', '2') ?>"></td>
                        <td><input type="checkbox" value="Y" name="info_about_your_background_sibling1_deceased" id="sibling1_deceased"> <?php echo (showData('info_about_your_background_sibling1_deceased') == 'Y') ? 'checked' : '' ?><label for="sibling1_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="22" style="width: 100%; margin: 0;" name="info_about_your_background_sibling1_current_location[]" value="<?php echo showData('info_about_your_background_sibling1_current_location', '2') ?>"></td>
                    </tr>
                    <tr>
                        <td>Sibling</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_sibling2_name[]" value="<?php echo showData('info_about_your_background_sibling2_name', '3') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_sibling2_birth_place[]" value="<?php echo showData('info_about_your_background_sibling2_birth_place', '3') ?>"></td>
                        <td><input type="checkbox" value="Y" name="info_about_your_background_sibling2_deceased" id="sibling2_deceased"> <?php echo (showData('info_about_your_background_sibling2_deceased') == 'Y') ? 'checked' : '' ?><label for="sibling2_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="22" style="width: 100%; margin: 0;" name="info_about_your_background_sibling2_current_location[]" value="<?php echo showData('info_about_your_background_sibling2_current_location', '3') ?>"></td>
                    </tr>
                    <tr>
                        <td>Sibling</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_sibling3_name[]" value="<?php echo showData('info_about_your_background_sibling3_name', '4') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_sibling3_birth_place[]" value="<?php echo showData('info_about_your_background_sibling3_birth_place', '4') ?>"></td>
                        <td><input type="checkbox" value="Y" name="info_about_your_background_sibling3_deceased" id="sibling3_deceased"> <?php echo (showData('info_about_your_background_sibling3_deceased') == 'Y') ? 'checked' : '' ?><label for="sibling3_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="22" style="width: 100%; margin: 0;" name="info_about_your_background_sibling3_current_location[]" value="<?php echo showData('info_about_your_background_sibling3_current_location', '4') ?>"></td>
                    </tr>
                    <tr>
                        <td>Sibling</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_sibling4_name[]" value="<?php echo showData('info_about_your_background_sibling4_name', '5') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_sibling4_birth_place[]" value="<?php echo showData('info_about_your_background_sibling4_birth_place', '5') ?>"></td>
                        <td><input type="checkbox" value="Y" name="info_about_your_background_sibling4_deceased" id="sibling4_deceased"> <?php echo (showData('info_about_your_background_sibling4_deceased') == 'Y') ? 'checked' : '' ?><label for="sibling4_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="22" style="width: 100%; margin: 0;" name="info_about_your_background_sibling4_current_location[]" value="<?php echo showData('info_about_your_background_sibling4_current_location', '5') ?>"></td>
                    </tr>
                    <tr>
                        <td>Sibling</td>
                        <td><input type="text" maxlength="23" style="width: 100%; margin: 0;" name="info_about_your_background_sibling5_name[]" value="<?php echo showData('info_about_your_background_sibling5_name', '6') ?>"></td>
                        <td><input type="text" maxlength="35" style="width: 100%; margin: 0;" name="info_about_your_background_sibling5_birth_place[]" value="<?php echo showData('info_about_your_background_sibling5_birth_place', '6') ?>"></td>
                        <td><input type="checkbox" value="Y" name="info_about_your_background_sibling5_deceased" id="sibling5_deceased"> <?php echo (showData('info_about_your_background_sibling5_deceased') == 'Y') ? 'checked' : '' ?><label for="sibling5_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="22" style="width: 100%; margin: 0;" name="info_about_your_background_sibling5_current_location[]" value="<?php echo showData('info_about_your_background_sibling5_current_location', '6') ?>"></td>
                    </tr>
                </tbody>
            </table>
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
    <p style="text-align: right; margin-right: 15px;"><b>Page 5</b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part B. Information About Your Application</b></h4>
        </div>
        <div>
            <label class="control-label col-md-12">(NOTE: Use Form I-589 Supplement B, or attach additional sheets of paper as needed to complete your responses to the questions contained in Part B.)</label>
            <hr class="my-5" style="border: 1px solid #729af8;">
            <div class="col-md-12">
                <label class="control-label text-sm ">When answering the following questions about your asylum or other protection claim (withholding of removal under 241(b)(3) of the INA or
                    withholding of removal under the Convention Against Torture), you must provide a detailed and specific account of the basis of your claim to asylum
                    or other protection. To the best of your ability, provide specific dates, places, and descriptions about each event or action described. You must attach
                    documents evidencing the general conditions in the country from which you are seeking asylum or other protection and the specific facts on which
                    you are relying to support your claim. If this documentation is unavailable or you are not providing this documentation with your application, explain
                    why in your responses to the following questions. </label>
                <label class="control-label text-sm ">Refer to Instructions, Part 1: Filing Instructions, Section II, "Basis of Eligibility," Parts A - D, Section V, Completing the Form," Part B, and Section
                    VII, "Additional Evidence That You Should Submit," for more information on completing this section of the form. </label>
                <label class="control-label text-sm ">1. Why are you applying for asylum or withholding of removal under section 241(b)(3) of the INA, or for withholding of removal under the
                    Convention Against Torture? Check the appropriate box(es) below and then provide detailed answers to questions A and B below.</label>
            </div>
            <div class="col-md-12">
                <label class="control-label">I am seeking asylum or withholding of removal based on:</label> <br>
                <input type="radio" name="info_about_you_removal_based" id="Race" value="race" <?php echo (showData('info_about_you_removal_based') == 'race') ? 'checked' : '' ?>> <label for="Race">Race</label><br>
                <input type="radio" name="info_about_you_removal_based" id="Political_opinion" value="political_opinion" <?php echo (showData('info_about_you_removal_based') == 'political_opinion') ? 'checked' : '' ?>> <label for="Political_opinion">Political opinion</label><br>
                <input type="radio" name="info_about_you_removal_based" id="Religion" value="religion" <?php echo (showData('info_about_you_removal_based') == 'religion') ? 'checked' : '' ?>> <label for="Religion">Religion</label><br>
                <input type="radio" name="info_about_you_removal_based" id="Membership_in_a_particular_social_group" value="membership_in_particular_social_group" <?php echo (showData('info_about_you_removal_based') == 'membership_in_particular_social_group') ? 'checked' : '' ?>> <label for="Membership_in_a_particular_social_group">Membership in a particular social group</label><br>
                <input type="radio" name="info_about_you_removal_based" id="Nationality" value="nationality" <?php echo (showData('info_about_you_removal_based') == 'nationality') ? 'checked' : '' ?>> <label for="Nationality">Nationality</label><br>
                <input type="radio" name="info_about_you_removal_based" id="Torture_Convention" value="torture_convention" <?php echo (showData('info_about_you_removal_based') == 'torture_convention') ? 'checked' : '' ?>> <label for="Torture_Convention">Torture Convention</label><br>
            </div>

        </div>
        <hr class="my-5" style="border: 1px solid #729af8;">
        <div class="col-md-12 my-5">
            <label>A. Have you, your family, or close friends or colleagues ever experienced harm or mistreatment or threats in the past by anyone?</label><br>
            <div>
                <?php echo createRadio("i_589_harm_or_mistreatment_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <label>If "Yes," explain in detail: </label><br>
            <label>1. What happened; </label><br>
            <label>2. When the harm or mistreatment or threats occurred; </label><br>
            <label>3. Who caused the harm or mistreatment or threats; and </label><br>
            <label>4. Why you believe the harm or mistreatment or threats occurred.</label><br>
            <div class="col-md-12 my-4">
                <textarea class="form-control" name="i_589_hard_mistreatment_value" maxlength="500" class="form-control" cols="30" rows="10"><?php echo showData('i_589_hard_mistreatment_value') ?></textarea>
            </div>
        </div>
        <hr style="border: 1px solid #729af8; margin-top: 10px;">
        <div class="col-md-12 my-5">
            <label>B. Do you fear harm or mistreatment if you return to your home country?</label><br>
            <div>
                <?php echo createRadio("i_589_return_to_home_country_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <label>If "Yes," explain in detail: </label><br>
            <label>1. What harm or mistreatment you fear;</label><br>
            <label>2. Who you believe would harm or mistreat you; and</label><br>
            <label>3. Why you believe you would or could be harmed or mistreated.</label><br>
            <div class="col-md-12">
                <textarea class="form-control" name="i_589_return_to_home_country_value" maxlength="500" class="form-control" cols="30" rows="10"><?php echo showData('i_589_return_to_home_country_value') ?></textarea>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 6 </b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part B. Information About Your Application (Continued)</b></h4>
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>2. Have you or your family members ever been accused, charged, arrested, detained, interrogated, convicted and sentenced, or imprisoned in any
                    country other than the United States (including for an immigration law violation)?</label><br>
                <div>
                    <?php echo createRadio("i_589_accused_charged_arrested_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain the circumstances and reasons for the action.</label><br>
                <div class="col-md-12 my-4">

                    <textarea class="form-control" name="i_589_accused_charged_arrested_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_accused_charged_arrested_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>3.A. Have you or your family members ever belonged to or been associated with any organizations or groups in your home country, such as, but not
                    limited to, a political party, student group, labor union, religious organization, military or paramilitary group, civil patrol, guerrilla organization,
                    ethnic group, human rights group, or the press or media?</label><br>
                <div>
                    <?php echo createRadio("i_589_associate_organization_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe for each person the level of participation, any leadership or other positions held, and the length of time you or your family
                    members were involved in each organization or activity.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_associate_organization_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_associate_organization_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>3.B. Do you or your family members continue to participate in any way in these organizations or groups?</label><br>
                <div>
                    <?php echo createRadio("i_589_family_member_participate_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe for each person your or your family members' current level of participation, any leadership or other positions currently held,
                    and the length of time you or your family members have been involved in each organization or group.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_family_member_participate_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_family_member_participate_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>4. Are you afraid of being subjected to torture in your home country or any other country to which you may be returned?</label><br>
                <div>
                    <?php echo createRadio("i_589_other_country_returned_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain why you are afraid and describe the nature of torture you fear, by whom, and why it would be inflicted</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_other_country_returned_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_other_country_returned_value') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!------------------------------------------ ----------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 7 </b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part C. Additional Information About Your Application</b></h4>
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>(NOTE: Use Form I-589 Supplement B, or attach additional sheets of paper as needed to complete your responses to the questions contained in Part C.)</label><br>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
            <div class="col-md-12 my-5">
                <label>1. Have you, your spouse, your child(ren), your parents or your siblings ever applied to the U.S. Government for refugee status, asylum, or
                    withholding of removal?</label><br>
                <div>
                    <?php echo createRadio("i_589_refugee_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain the decision and what happened to any status you, your spouse, your child(ren), your parents, or your siblings received as a
                    result of that decision. Indicate whether or not you were included in a parent or spouse's application. If so, include your parent or spouse's
                    A-number in your response. If you have been denied asylum by an immigration judge or the Board of Immigration Appeals, describe any
                    change(s) in conditions in your country or your own personal circumstances since the date of the denial that may affect your eligibility for
                    asylum.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_refugee_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_refugee_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>2.A. After leaving the country from which you are claiming asylum, did you or your spouse or child(ren) who are now in the United States travel
                    through or reside in any other country before entering the United States?</label><br>
                <div>
                    <?php echo createRadio("i_589_spouse_before_entering_status") ?>
                </div>
            </div>
            <div class="col-md-12 my-5">
                <label>2.B. Have you, your spouse, your child(ren), or other family members, such as your parents or siblings, ever applied for or received any lawful status
                    in any country other than the one from which you are now claiming asylum?</label><br>
                <div>
                    <?php echo createRadio("i_589_applied_for_received_lawful_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes" to either or both questions (2A and/or 2B), provide for each person the following: the name of each country and the length of stay, the
                    person's status while there, the reasons for leaving, whether or not the person is entitled to return for lawful residence purposes, and whether the
                    person applied for refugee status or for asylum while there, and if not, why he or she did not do so.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_applied_for_received_lawful_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_applied_for_received_lawful_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>3. Have you, your spouse or your child(ren) ever ordered, incited, assisted or otherwise participated in causing harm or suffering to any person
                    because of his or her race, religion, nationality, membership in a particular social group or belief in a particular political opinion?</label><br>
                <div>
                    <?php echo createRadio("i_589_particular_political_opinion_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe in detail each such incident and your own, your spouse's, or your child(ren)'s involvement.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_particular_political_opinion_value" maxlength="430" class="form-control" cols="30" rows="10"><?php echo showData('i_589_particular_political_opinion_value') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!------------------------------------------ ----------------------------
-------------------------------- page 8 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 8</b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part C. Additional Information About Your Application (Continued)</b></h4>
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>4. After you left the country where you were harmed or fear harm, did you return to that country?</label><br>
                <div>
                    <?php echo createRadio("i_589_harmed_or_fear_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe in detail the circumstances of your visit(s) (for example, the date(s) of the trip(s), the purpose(s) of the trip(s), and the length
                    of time you remained in that country for the visit(s).)</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_harmed_or_fear_value" maxlength="500" class="form-control" cols="30" rows="10"><?php echo showData('i_589_harmed_or_fear_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>5. Are you filing this application more than 1 year after your last arrival in the United States?</label><br>
                <div>
                    <?php echo createRadio("i_589_last_arrival_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain why you did not file within the first year after you arrived. You must be prepared to explain at your interview or hearing why
                    you did not file your asylum application within the first year after you arrived. For guidance in answering this question, see Instructions, Part 1:
                    Filing Instructions, Section V. "Completing the Form," Part C.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_last_arrival_value" maxlength="500" class="form-control" cols="30" rows="10"><?php echo showData('i_589_last_arrival_value') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>6. Have you or any member of your family included in the application ever committed any crime and/or been arrested, charged, convicted, or
                    sentenced for any crimes in the United States (including for an immigration law violation)?</label><br>
                <div>
                    <?php echo createRadio("i_589_included_the_application_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," for each instance, specify in your response: what occurred and the circumstances, dates, length of sentence received, location, the
                    duration of the detention or imprisonment, reason(s) for the detention or conviction, any formal charges that were lodged against you or your
                    relatives included in your application, and the reason(s) for release. Attach documents referring to these incidents, if they are available, or an
                    explanation of why documents are not available.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_589_included_the_application_value" maxlength="500" class="form-control" cols="30" rows="10"><?php echo showData('i_589_included_the_application_value') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!------------------------------------------ ----------------------------
-------------------------------- page 9 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 9 </b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part D. Your Signature</b></h4>
        </div>
        <div>
            <div class="col-md-12">
                <label>I certify, under penalty of perjury under the laws of the United States of America, that this application and the evidence submitted with it are all true
                    and correct. Title 18, United States Code, Section 1546(a), provides in part: Whoever knowingly makes under oath, or as permitted under penalty of
                    perjury under Section 1746 of Title 28, United States Code, knowingly subscribes as true, any false statement with respect to a material fact in any
                    application, affidavit, or other document required by the immigration laws or regulations prescribed thereunder, or knowingly presents any such
                    application, affidavit, or other document containing any such false statement or which fails to contain any reasonable basis in law or fact - shall be
                    fined in accordance with this title or imprisoned for up to 25 years. I certify that I am physically present in the United States or seeking admission at
                    a Port of Entry when I execute this application. I authorize the release of any information from my immigration record that U.S. Citizenship and
                    Immigration Services (USCIS) needs to determine eligibility for the benefit I am seeking.</label><br>
                <hr class="my-5" style="border: 1px solid #729af8;">
                <label>WARNING: Applicants who are in the United States unlawfully are subject to removal if their asylum or withholding claims are not
                    granted by an asylum officer or an immigration judge. Any information provided in completing this application may be used as a basis for
                    the institution of, or as evidence in, removal proceedings even if the application is later withdrawn. Applicants determined to have
                    knowingly made a frivolous application for asylum will be permanently ineligible for any benefits under the Immigration and Nationality
                    Act. You may not avoid a frivolous finding simply because someone advised you to provide false information in your asylum application. If
                    filing with USCIS, unexcused failure to appear for an appointment to provide biometrics (such as fingerprints) and your biographical
                    information within the time allowed may result in an asylum officer dismissing your asylum application or referring it to an immigration
                    judge. Failure without good cause to provide DHS with biometrics or other biographical information while in removal proceedings may
                    result in your application being found abandoned by the immigration judge. See sections 208(d)(5)(A) and 208(d)(6) of the INA and 8 CFR
                    sections 208.10, 1208.10, 208.20, 1003.47(d) and 1208.20.</label><br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label class="control-label" style="font-size: 12px;">Print your complete name</label>
                <input type="text" class="form-control" name="i_589_print_complete_name" maxlength="50" value="<?php echo showData('i_589_print_complete_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label" style="font-size: 12px;">Write your name in your native alphabet.</label>
                <input type="text" class="form-control" name="i_589_native_alphabet_name" maxlength="50" value="<?php echo showData('i_589_native_alphabet_name') ?>">
            </div>
        </div>

        <div class="col-md-12 my-4">
            <label>Did your spouse, parent, or child(ren) assist you in completing this application?</label><br>
            <div>
                <?php echo createRadio("i_589_spouse_child_assist_status") ?>
            </div>
        </div>
        <div class="col-md-12 ">
            <p><b>NOTE : </b>(If "Yes," list the name and relationship.)</p><br>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_signature_name1" maxlength="25" value="<?php echo showData('i_539_signature_name1') ?>" />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Name)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_signature_relationship1" maxlength="25" value="<?php echo showData('i_539_signature_relationship1') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Relationship)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_signature_name2" maxlength="25" value="<?php echo showData('i_539_signature_name2') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Name)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_signature_relationship2" maxlength="25" value="<?php echo showData('i_539_signature_relationship2') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Relationship)</p>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label>Did someone other than your spouse, parent, or child(ren) prepare this application?</label><br>
            <div>
                <?php echo createRadio("i_589_someone_other_status") ?>
            </div>
        </div>
        <div class="col-md-12 ">
            <p><b>NOTE : </b>(If "Yes,"complete Part E.)</p><br>
        </div>
        <div class="col-md-12 my-4">
            <label>Asylum applicants may be represented by counsel. Have you been provided with a list of
                persons who may be available to assist you, at little or no cost, with your asylum claim?</label><br>
            <div>
                <?php echo createRadio("i_589_represented_by_counsel_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Signature of Applicant (The person in Part. A.I.)</label>
                <input type="text" disabled class="form-control" />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Sign your name so it all appears within the brackets</p>
            </div>
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Date (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_589_represented_by_counsel_date_of_signature" value="<?php echo showData('i_589_represented_by_counsel_date_of_signature') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info" style="margin-top:10px;">
        <h4><b>Part E. Declaration of Person Preparing Form, if Other Than Applicant, Spouse, Parent, or Child</b></h4>
    </div>
    <div class="col-md-12">
        <label>I declare that I have prepared this application at the request of the person named in Part D, that the responses provided are based on all information of
            which I have knowledge, or which was provided to me by the applicant, and that the completed application was read to the applicant in his or her
            native language or a language he or she understands for verification before he or she signed the application in my presence. I am aware that the
            knowing placement of false information on the Form I-589 may also subject me to civil penalties under 8 U.S.C. 1324c and/or criminal penalties
            under 18 U.S.C. 1546(a).
        </label>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <label class="control-label" style="font-size: 12px;">Signature of Person Preparing Form</label>
            <input type="text" disabled class="form-control" name="i_589_signature_person_preparing" />
        </div>
        <div class="col-md-6">
            <label class="control-label" style="font-size: 12px;">Print Complete Name of Person Preparing Form</label>
            <input type="text" class="form-control" name="i_589_name_person_preparing" maxlength="50" value="<?php echo showData('i_589_name_person_preparing') ?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-5">
            <label class="control-label" style="font-size: 12px;">Daytime Telephone Number</label>
            <div class="d-flexible">
                <span class="col-md-4 d-flexible"> <b>(</b> <input type="text" class="form-control" name="i_589_person_preparing_phone_area_code" maxlength="3" value="<?php echo showData('i_589_person_preparing_phone_area_code') ?>"> <b>)</b> </span>
                <span class="col-md-8"><input type="text" class="form-control" name="i_589_person_preparing_phone_number" maxlength="7" value="<?php echo showData('i_589_person_preparing_phone_number') ?>"></span>
            </div>
        </div>
        <div class="col-md-7">
            <label class="control-label" style="font-size: 12px;">Address of Person Preparing Form: Street Number and Name</label>
            <input type="text" class="form-control" name="i_589_person_preparing_address_street" maxlength="62" value="<?php echo showData('i_589_person_preparing_address_street') ?>">
        </div>
    </div>
    <div class="col-md-12 my-5">
        <div class="col-md-3">
            <label class="control-label" style="font-size: 12px;">Apt. Number</label>
            <input type="text" class="form-control" name="i_589_person_preparing_address_apartment" maxlength="6" value="<?php echo showData('i_589_person_preparing_address_apartment') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label" style="font-size: 12px;">City</label>
            <input type="text" class="form-control" name="i_589_person_preparing_address_city" maxlength="44" value="<?php echo showData('i_589_person_preparing_address_city') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label" style="font-size: 12px;">State</label>
            <input type="text" class="form-control" name="i_589_person_preparing_address_state" maxlength="20" value="<?php echo showData('i_589_person_preparing_address_state') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label" style="font-size: 12px;">Zip Code</label>
            <input type="text" class="form-control" name="i_589_person_preparing_address_zip" maxlength="6" value="<?php echo showData('i_589_person_preparing_address_zip') ?>">
        </div>
    </div>

    <table style="border-collapse: collapse" class="my-4">
        <thead>
            <tr>
                <th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To be completed by an
                    Attorney or Accredited Representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px;">
                    <label style="cursor: pointer;">
                        <?php echo createCheckbox("i_589_g28_status") ?> Select this box if Form G-28 is attached.
                    </label>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney State Bar Number (if applicable)</label>
                        <input type="text" class="form-control" disabled>
                        <!-- <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled> -->
                    </div>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number
                            (if any)</label>
                        <input type="text" class="form-control" maxlength="12" disabled>
                        <!-- <input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" maxlength="12" disabled> -->
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!------------------------------------------ ----------------------------
-------------------------------- page 10 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 10 </b></p>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part F. To Be Completed at Asylum Interview, if Applicable</b></h4>
        </div>
        <div>
            <div class="col-md-12">
                <label>NOTE: You will be asked to complete this part when you appear for examination before an asylum officer of the Department of Homeland Security,
                    U.S. Citizenship and Immigration Services (USCIS).</label><br>
                <hr class="my-5" style="border: 1px solid #729af8;">
                <p style="font-weight: 500">I swear (affirm) that I know the contents of this application that I am signing, including the attached documents and supplements, that they are
                    <label style="cursor: pointer;">
                        <?php echo createCheckbox("i_589_asylum_interview_all_true_status") ?> all true
                    </label> or <label style="cursor: pointer;">
                        <?php echo createCheckbox("i_589_not_asylum_interview_true_status") ?> not all true
                    </label> e to the best of my knowledge and that correction(s) numbered _________ to _________
                    were made by me or at my request.
                    Furthermore, I am aware that if I am determined to have knowingly made a frivolous application for asylum I will be permanently ineligible for any
                    benefits under the Immigration and Nationality Act, and that I may not avoid a frivolous finding simply because someone advised me to provide
                </p><br>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-6">
                <input type="text" class="form-control" disabled />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Signature of Applicant</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" disabled>
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Date (mm/dd/yyyy)</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" disabled>
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Write Your Name in Your Native Alphabet</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" disabled>
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Signature of Asylum Officer</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part G. To Be Completed at Removal Hearing, if Applicable</b></h4>
        </div>
        <div>
            <div class="col-md-12">
                <label>NOTE: You will be asked to complete this Part when you appear before an immigration judge of the U.S. Department of Justice, Executive Office
                    for Immigration Review (EOIR), for a hearing. </label><br>
                <hr class="my-5" style="border: 1px solid #729af8;">
                <p style="font-weight: 500">I swear (affirm) that I know the contents of this application that I am signing, including the attached documents and supplements, that they are
                    <label style="cursor: pointer;"><?php echo createCheckbox("i_589_removal_hearing_all_true_status") ?> all true</label>
                    or
                    <label style="cursor: pointer;"> <?php echo createCheckbox("i_589_removal_hearing_not_true_status") ?> not all true</label>
                    to the best of my knowledge and that correction(s) numbered _________ to _________
                    were made by me or at my request.
                    Furthermore, I am aware that if I am determined to have knowingly made a frivolous application for asylum I will be permanently ineligible for any
                    benefits under the Immigration and Nationality Act, and that I may not avoid a frivolous finding simply because someone advised me to provide false information in my asylum application
                </p><br>
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-6">
                <input type="text" class="form-control" disabled />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Signature of Applicant</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" disabled>
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Date (mm/dd/yyyy)</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" disabled>
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Write Your Name in Your Native Alphabet</p>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" disabled>
                <p style="font-size: 12px; text-align: center; font-weight: 600;">Signature of Asylum Officer</p>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 11 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;"><b>Page 11</b></p>
    <div class="row" style="border: 1px solid black; padding: 5px ;">
        <div class="col-md-12">
            <div class="col-md-6">
                <label class="control-label" style="font-size: smaller;">A-Number (If available)</label>
                <input type="text" class="form-control" disabled>

            </div>
            <div class="col-md-6">
                <label class="control-label" style="font-size: smaller;">Date</label>
                <input type="date" class="form-control" name="passport_id_card_number" maxlength="43">
            </div>
            <div class="col-md-6">
                <label class="control-label" style="font-size: smaller;">Applicant's Name</label>
                <input type="text" class="form-control" disabled>

            </div>
            <div class="col-md-6">
                <label class="control-label" style="font-size: smaller;">Applicant's Signature</label>
                <input type="text" class="form-control" disabled>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>List All of Your Children, Regardless of Age or Marital Status</b></h4>
            <h5><i>(NOTE: Use this form and attach additional pages and documentation as needed, if you have more than four children)</i></h5>
        </div>
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number)</label>
                    <input type="text" class="form-control" name="i_589_child_alien_registration_number5" maxlength="9" value="<?php echo showData('i_589_child_alien_registration_number5'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_passport_id_card_number5" maxlength="20" value="<?php echo showData('i_589_child_passport_id_card_number5'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="i_589_child_marital_status5" maxlength="24" value="<?php echo showData('i_589_child_marital_status5'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_social_security_number5" maxlength="9" value="<?php echo showData('i_589_child_social_security_number5'); ?>" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="i_589_child_complete_last_name5" maxlength="29" value="<?php echo showData('i_589_child_complete_last_name5') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="i_589_child_first_name5" maxlength="20" value="<?php echo showData('i_589_child_first_name5') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="i_589_child_middle_name5" maxlength="20" value="<?php echo showData('i_589_child_middle_name5') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_birth5" value="<?php echo showData('i_589_child_date_of_birth5') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="i_589_child_city_country_of_birth5" maxlength="29" value="<?php echo showData('i_589_child_city_country_of_birth5') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="i_589_child_nationality5" maxlength="20" value="<?php echo showData('i_589_child_nationality5') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="i_589_child_ethnic_group5" maxlength="24" value="<?php echo showData('i_589_child_ethnic_group5') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">12. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_gender5" id="male_12_5" value="male" <?php echo (showData('i_589_child_gender5') == 'male') ? 'checked' : '' ?>> <label for="male_12_5" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="i_589_child_gender5" id="female_12_5" value="female"> <label for="female_12_5" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S.?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_in_us5" id="yes_13_5" value="Y" <?php echo (showData('i_589_child_in_us5') == 'Y') ? 'checked' : '' ?>> <label for="yes_13_5" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="i_589_child_in_us5" id="no_13_5" value="N" <?php echo (showData('i_589_child_in_us5') == 'N') ? 'checked' : '' ?>> <label for="no_13_5" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_589_child_location_if_not_in_us5" maxlength="32" value="<?php echo showData('i_589_child_location_if_not_in_us5') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="i_589_child_place_of_last_entry5" maxlength="29" value="<?php echo showData('i_589_child_place_of_last_entry5') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_last_entry5" value="<?php echo showData('i_589_child_date_of_last_entry5') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="i_589_child_i94_number5" maxlength="11" value="<?php echo showData('i_589_child_i94_number5') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="i_589_child_status_when_last_admitted5" maxlength="20" value="<?php echo showData('i_589_child_status_when_last_admitted5') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="i_589_child_current_status5" maxlength="29" value="<?php echo showData('i_589_child_current_status5') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_expiration_date_of_stay5" value="<?php echo showData('i_589_child_expiration_date_of_stay5') ?>">
                </div>
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_child_in_court_proceedings5" id="yes_20_4" value="Y" <?php echo (showData('i_589_child_child_in_court_proceedings5') == 'Y') ? 'checked' : '' ?>> <label for="yes_20_4" style="font-size: smaller;">Yes</label4><br>
                            <input type="radio" name="i_589_child_child_in_court_proceedings5" id="no_20_4" value="N" <?php echo (showData('i_589_child_child_in_court_proceedings5') == 'N') ? 'checked' : '' ?>> <label for="no_20_4" style="font-size: smaller;">No4</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_589_include_child_in_application5") ?>
                </div>
            </div>
        </div>
        <hr style="border: 1px solid #729af8 ;" class="my-5">
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number)</label>
                    <input type="text" class="form-control" name="i_589_child_alien_registration_number6" maxlength="9" value="<?php echo showData('i_589_child_alien_registration_number6'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_passport_id_card_number6" maxlength="20" value="<?php echo showData('i_589_child_passport_id_card_number6'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="i_589_child_marital_status6" maxlength="24" value="<?php echo showData('i_589_child_marital_status6'); ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="i_589_child_social_security_number6" maxlength="9" value="<?php echo showData('i_589_child_social_security_number6'); ?>" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="i_589_child_complete_last_name6" maxlength="29" value="<?php echo showData('i_589_child_complete_last_name6') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="i_589_child_first_name6" maxlength="20" value="<?php echo showData('i_589_child_first_name6') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="i_589_child_middle_name6" maxlength="20" value="<?php echo showData('i_589_child_middle_name6') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_birth6" value="<?php echo showData('i_589_child_date_of_birth6') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="i_589_child_city_country_of_birth6" maxlength="29" value="<?php echo showData('i_589_child_city_country_of_birth6') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="i_589_child_nationality6" maxlength="20" value="<?php echo showData('i_589_child_nationality6') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="i_589_child_ethnic_group6" maxlength="24" value="<?php echo showData('i_589_child_ethnic_group6') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">12. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_gender6" id="male_12_6" value="male" <?php echo (showData('i_589_child_gender6') == 'male') ? 'checked' : '' ?>> <label for="male_12_6" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="i_589_child_gender6" id="female_12_6" value="female"> <label for="female_12_6" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S.?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_in_us6" id="yes_13_6" value="Y" <?php echo (showData('i_589_child_in_us6') == 'Y') ? 'checked' : '' ?>> <label for="yes_13_6" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="i_589_child_in_us6" id="no_13_6" value="N" <?php echo (showData('i_589_child_in_us6') == 'N') ? 'checked' : '' ?>> <label for="no_13_6" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="i_589_child_location_if_not_in_us6" maxlength="32" value="<?php echo showData('i_589_child_location_if_not_in_us6') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="i_589_child_place_of_last_entry6" maxlength="29" value="<?php echo showData('i_589_child_place_of_last_entry6') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_date_of_last_entry6" value="<?php echo showData('i_589_child_date_of_last_entry6') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="i_589_child_i94_number6" maxlength="11" value="<?php echo showData('i_589_child_i94_number6') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="i_589_child_status_when_last_admitted6" maxlength="20" value="<?php echo showData('i_589_child_status_when_last_admitted6') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="i_589_child_current_status6" maxlength="29" value="<?php echo showData('i_589_child_current_status6') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="i_589_child_expiration_date_of_stay6" value="<?php echo showData('i_589_child_expiration_date_of_stay6') ?>">
                </div>
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">20. Does your child have any medical condition or disability?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="i_589_child_medical_condition6" id="yes_20_6" value="Y" <?php echo (showData('i_589_child_medical_condition6') == 'Y') ? 'checked' : '' ?>> <label for="yes_20_6" style="font-size: smaller;">Yes</label><br>
                        <input type="radio" name="i_589_child_medical_condition6" id="no_20_6" value="N" <?php echo (showData('i_589_child_medical_condition6') == 'N') ? 'checked' : '' ?>> <label for="no_20_6" style="font-size: smaller;">No</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-4">
                    <label class="control-label" style="font-size: smaller;">21. If Yes, please specify:</label>
                    <input type="text" class="form-control" name="i_589_child_medical_condition_specify6" maxlength="29" value="<?php echo showData('i_589_child_medical_condition_specify6') ?>" />
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 12--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <p style="text-align:right;margin-right:20px;"><b>Page 12</b></p>
        </div>
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Additional Information About Your Claim to Asylum</b></h4>
            </div>
            <div class="row" style="border: 1px solid black; padding: 5px ;">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <label class="control-label" style="font-size: smaller;">A-Number (If available)</label>
                        <input type="text" class="form-control" disabled>

                    </div>
                    <div class="col-md-6">
                        <label class="control-label" style="font-size: smaller;">Date</label>
                        <input type="date" class="form-control" name="additional_info_claim_to_asylum_date" value="<?php echo showData('additional_info_claim_to_asylum_date') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" style="font-size: smaller;">Applicant's Name</label>
                        <input type="text" class="form-control" disabled>

                    </div>
                    <div class="col-md-6">
                        <label class="control-label" style="font-size: smaller;">Applicant's Signature</label>
                        <input type="text" class="form-control" disabled>

                    </div>
                </div>
            </div>
            <h5><b>NOTE: </b><i>Use this as a continuation page for any additional information requested. Copy and complete as needed</i></h5>
            <hr style="border: 1px solid #729af8 ;" class="my-5">
            <div>
                <div class="form-group">
                    <label class="control-label col-md-12">Part</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="additional_info_claim_to_asylum_part" maxlength="13"
                            value="<?= showData('additional_info_claim_to_asylum_part') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">Question</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="additional_info_claim_to_asylum_question" maxlength="13"
                            value="<?= showData('additional_info_claim_to_asylum_question') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea name="additional_info_claim_to_asylum_value" class="form-control" maxlength="1456" cols="30" rows="30"><?= showData('additional_info_claim_to_asylum_value') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>