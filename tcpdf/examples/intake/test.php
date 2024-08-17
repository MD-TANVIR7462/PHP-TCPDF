<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 3 of 7

    </b></p>
    <div class="bg-info">
        <h4><b>Part 4. Information About Your Residence (continued)</b></h4>
    </div>
    <div class="form-group">
        <div class="form-group" style="margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">3. Current Mailing Address (Safe Mailing Address, if applicable)
            </label>
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="information_about_you_residence_mailing_care_of_name" maxlength="86" value="<?php echo showData('information_about_you_residence_mailing_care_of_name') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="63" class="form-control" name="information_about_you_residence_mailing_street_number" value="<?php echo showData('information_about_you_residence_mailing_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="information_about_you_residence_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_residence_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_residence_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_residence_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_residence_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_residence_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="information_about_you_residence_mailing_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_residence_mailing_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_mailing_city_town" maxlength="63" value="<?php echo showData('information_about_you_residence_mailing_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="information_about_you_residence_mailing_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_residence_mailing_state')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_residence_mailing_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_mailing_province" maxlength="26" value="<?php echo showData('information_about_you_residence_mailing_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_mailing_postal_code" maxlength="9" value="<?php echo showData('information_about_you_residence_mailing_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_mailing_country" maxlength="37" value="<?php echo showData('information_about_you_residence_mailing_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 5. Information About Your Marital History</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">1. What is your current marital status?</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : '' ?>> Single, Never Married</label>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : '' ?>> Married</label>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : '' ?>> Divorced</label>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="widowed" <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : '' ?>> Widowed</label>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="separated" <?php echo (showData('other_information_about_you_marital_status') == 'separated') ? 'checked' : '' ?>> Separated</label>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="other_information_about_you_marital_status" value="annulled" <?php echo (showData('other_information_about_you_marital_status') == 'annulled') ? 'checked' : '' ?>> Marriage Annulled</label>
            </div>
        </div>
        <label class="control-label col-md-12">If you are single and have never married, go to Part 6. Information About Your Children</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">2. If you are currently married, is your spouse a current member of the U.S. armed forces?</label>
        <div class="col-md-3 ">
            <?php echo createRadio("other_information_about_you_marital_spouse_armed_force_status") ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">3. How many times have you been married? (See the Specific Instructions by Item Number section of the Instructions for more information about which marriages to include.)</label>
        <div class="col-md-3 ">
            <input type="text" class="form-control" name="other_information_about_you_marital_married_number" maxlength="3" value="<?php echo showData('other_information_about_you_marital_married_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">Provide current marriage certificate and any divorce decree, annulment decree, or death certificate showing that your prior marriages were terminated (if applicable).</label>
        <label class="control-label col-md-12">If you are filing under one of the categories below, answer Item Numbers 4.a. - 8.:</label> <br>
    </div>
    <div class="form-group" style="font-size: small; font-weight: 600;">
        <li style="margin-left: 1.5%;">Spouse of U.S. Citizen, Part 1., Item Number 1.b.; or;</li>
        <li style="margin-left: 1.5%;">Spouse of U.S. Citizen in Qualified Employment Outside the United States, Part 1., Item Number 1.d.</li>
        <p class=" col-md-12">If you are not filing under one of the categories above, skip to Part 6.</p>
    </div>
    <div class="bg-info">
        <h4><b><i>Your Current Marriage</i></b></h4>
    </div>
    <p style="font-size: small; font-weight: 600;">If you are currently married, including if you are legally separated, provide the following information about your current spouse.</p>
    <div class="form-group" style="padding-left:1.5%; ">
        <h5><b>4.a. Current Spouse's Legal Name</b></h5>
    </div>
    <div class="row form-group" style="margin-bottom:20px ;">
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="current_spouse_family_last_name" maxlength="33" value="<?php echo showData('current_spouse_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="current_spouse_given_first_name" maxlength="29" value="<?php echo showData('current_spouse_given_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
            </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="current_spouse_family_middle_name" maxlength="21" value="<?php echo showData('current_spouse_family_middle_name') ?>">
            </div>
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">4.b. Current Spouse's Date of Birth(mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="current_spouse_date_of_birth" value="<?php echo showData('current_spouse_date_of_birth') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">4.c. Date You Entered into Marriage with Current Spouse (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="current_spouse_date_of_marriage" value="<?php echo showData('current_spouse_date_of_marriage') ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">4.d. Is your current spouse's present physical address the same as your physical address?</label>
        <div class="col-md-5   col-md-offset-5 ">
            <?php echo createRadio("current_spouse_physical_address_status") ?>
        </div>
        <label class="control-label col-md-12">NOTE : (If you answered “No,” provide address in Part 14. Additional Information.)</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">5.a. When did your current spouse become a U.S. citizen?</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label col-md-8" style="margin-left: 25px;"><?php echo createCheckbox("current_spouse_us_citizen_by_birth_status") ?>By Birth in the United States - Go to Item Number 7</label>
                <label class="control-label col-md-8" style="margin-left: 25px;"><?php echo createCheckbox("current_spouse_us_citizen_other_status") ?>Other - Complete Item Number 5.b.</label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-8">5.b. Date Your Current Spouse Became a U.S. Citizen (mm/dd/yyyy)</label>
            <div class="col-md-4">
                <input type="date" class="form-control" name="current_spouse_us_armed_force" value="<?php echo showData('current_spouse_us_armed_force') ?>">
            </div>
        </div>
    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>