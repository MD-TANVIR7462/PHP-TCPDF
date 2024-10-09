<?php
$meta_title     =   "INTAKE FOR FORM n-400";
$page_heading     =   "Application for Naturalization";
include "intake_header.php";
?>

<!---------------------------------------------------
------------------- page 1 --------------------------
----------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 14</b></p>

    <div class="form-group">
        <h4 class="col-md-12" style="margin-top: 2%;">► START HERE - Type or print in black ink. If you do not answer all of the questions, it may take longer for U.S. Citizenship
            and Immigration Services (USCIS) to process your Form N-400 </h4>
    </div>
    <div class="form-group">
        <h5 class="col-md-12" style="font-weight: 600; font-size: small;">If your parent (including legal adoptive parent) is a U.S. citizen by birth, or was naturalized before you reached your 18th birthday,
            you may not need to file Form N-400 as you may already be a U.S. citizen. Before you file this application, please visit the USCIS
            website at <a href="https://www.uscis.gov/n-600" style="text-decoration: underline;">www.uscis.gov/N-600</a> for Form N-600, Application for Certificate of Citizenship. </h5>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info col-md-12" style="margin-top:10px;">
                <h4><b>Part 1. Information About Your Eligibility (Select only one box to identify the basis of your eligibility or your Form N-400 may be delayed or rejected.)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-offset-7 col-md-5">Enter Your 9 Digit A-Number:</label>
                <div class="col-md-offset-7 col-md-5">
                    <span style="display: flex; justify-content: center; align-items: center;"><b>►A-</b> <input type="text" maxlength="9" style="margin-left: 5px;" class="form-control" name="" value="<?php echo showData('') ?>" /></span>
                </div>
            </div>

            <div>
                <h5><b>1. Reason for Filing (Please see Instructions for eligibility requirements under each provision.):</b> </h5>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span style="padding-right: 2%;">A.</span><?php echo createCheckbox("information_about_you_eligibility_provision_status") ?>General Provision. See Instructions: List of General Eligibility Requirements </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span style="padding-right: 2%;">B.</span><?php echo createCheckbox("information_about_you_eligibility_us_citizen_status") ?>Spouse of U.S. Citizen. See Instructions: <i>Eligibility Based on Marriage to a U.S. Citizen</i> </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span style="padding-right: 2%;">C.</span><?php echo createCheckbox("information_about_you_eligibility_vawa_women_act_status") ?>VAWA. See Instructions: <i>Eligibility for the Spouse, Former Spouse, or Child of a U.S. Citizen under the Violence Against Women Act (VAWA)</i></label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span style="padding-right: 2%;">D.</span><?php echo createCheckbox("information_about_you_eligibility_qualified_employment_status") ?>Spouse of U.S. Citizen in Qualified Employment Outside the United States. See Instructions: <i>Eligibility for the Spouse of a U.S. Citizen Working for a Qualified Employer Outside the United States</i></label>
            </div>
            <div class="form-group">
                <p class=" col-md-12">If your residential address is outside the United States and you are filing under Immigration and Nationality Actv (INA) section 319(b), select the USCIS field office where you would like to have your naturalization interview. You can find a USCIS field office at www.uscis.gov/field-offices.</p>
            </div>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name=" " disabled value="<?php echo showData('') ?>" />
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span style="padding-right: 2%;">E.</span><?php echo createCheckbox("information_about_you_eligibility_period_of_hostilities_status") ?>Military Service During Period of Hostilities. See Instructions: <i>Eligibility and Evidence for Current and Former Members of the U.S. Armed Forces</i></label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><span style="padding-right: 2%;">F.</span><?php echo createCheckbox("information_about_you_eligibility_member_us_armed_force_status") ?>At Least One Year of Honorable Military Service at Any Time. See Instructions: <i>Eligibility and Evidence for
                        Current and Former Members of the U.S. Armed Forces</i></label>
            </div>
            <div class="row" style="margin-left: 1px;">
                <div class="form-group">
                    <label class="control-label col-md-12"><span style="padding-right: 2%;">G.</span><?php echo createCheckbox("information_about_you_eligibility_reason_not_listed_status") ?>Other Reason for Filing Not Listed Above</label>
                </div>
                <div class="col-md-5" style="margin-left: 4%;">
                    <input type="text" maxlength="39" class="form-control" name="information_about_you_eligibility_reason_not_listed_value" value="<?php echo showData('information_about_you_eligibility_reason_not_listed_value') ?>" />
                </div>
            </div>

            <div class="bg-info col-md-12" style="margin-top:20px; margin-bottom: 15px;">
                <h4><b>Part 2. Information About You (Person applying for naturalization)</b></h4>
            </div>
            <div>
                <h5><b>1. Your Current Legal Name (do not provide a nickname)</b> </h5>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div>
                <h5><b>2. Other Names You Have Used Since Birth (see the Instructions for this Item Number for more information about which names
                        to include)</b> </h5>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_other_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_other_family_last_name') ?>">
                        <input type="text" class="form-control" name="information_about_you_other_family_last_name2" maxlength="35" value="<?php echo showData('information_about_you_other_family_last_name2') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_other_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_other_given_first_name') ?>">
                        <input type="text" class="form-control" name="information_about_you_other_given_first_name2" maxlength="27" value="<?php echo showData('information_about_you_other_given_first_name2') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_other_middle_name" maxlength="22" value="<?php echo showData('information_about_you_other_middle_name') ?>">
                        <input type="text" class="form-control" name="information_about_you_other_middle_name2" maxlength="22" value="<?php echo showData('information_about_you_other_middle_name2') ?>">
                    </div>
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
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 14</b></p>
    <div class=" row">
    <div class="col-md-12">
        <div class="bg-info">
            <h4><b>Part 2. Information About You (Person applying for naturalization) (continued)</b> </h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Name Change (Optional)</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Read the Instructions for this Item Number before you decide whether you would like to legally change your name.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">3. Would you like to legally change your name?</label>
            <div class="col-md-6 ">
                <?php echo createRadio("information_about_you_legally_change_name_status") ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">If you answered “Yes,” </label>
            <label class="control-label col-md-12">If you answered “No,” </label>

            <p class="control-label col-md-12"><b>NOTE : </b>If you answered <b>“Yes,”</b> type or print the new name you would like to use:</p>
            <p class="control-label col-md-12"><b>NOTE : </b>If you answered <b>“No,”</b> (skip to Item Number 4.)</p>

            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_legally_change_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_legally_change_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_legally_change_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_legally_change_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_legally_change_middle_name" maxlength="22" value="<?php echo showData('information_about_you_legally_change_middle_name') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">4. USCIS Online Account Number (if any)</label>
            <div class="col-md-6">
                <input type="text" maxlength="12" class="form-control" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Gender</label>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("other_information_about_you_gender") ?>Male</label>
                    <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("other_information_about_you_gender") ?>Female</label>
                    <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("other_information_about_you_gender") ?>Another Gender Identity</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Date of Birth (mm/dd/yyyy)</label>
            <div style="width:40%; margin-left: 3%;"">
                <input type=" date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">In addition to your actual date of birth, include any other dates of birth you have ever used, including dates used in connection
                with any legal names or non-legal names, in the space provided in Part 14. Additional Information.</label>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">7. If you are a lawful permanent resident, provide the date you became a lawful permanent resident (mm/dd/yyyy)</label>
            <div style="width:40%; margin-left: 3%;"">
                <input type=" date" class="form-control" name="information_about_you_lawful_permanent_resident_date" value="<?php echo showData('information_about_you_lawful_permanent_resident_date') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">8. Country of Birth </label>
            <div style="width:40%; margin-left: 3%;"">
                <input type=" text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="41" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">9. Country of Citizenship or Nationality</label>
            <div style="width:40%; margin-left: 3%;"">
                <input type=" text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="41" value="<?php echo showData('other_information_about_you_country_of_citizen') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">If you are a citizen or national of more than one country, list additional countries of nationality in the space provided in Part 14.
                Additional Information.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-9">10. Was one of your parents (including adoptive parents) a U.S. citizen before your 18th birthday?</label>
            <div class="col-md-3">
                <?php echo createRadio("information_about_you_parent_citizen_before_birth_status") ?>
            </div>
        </div>
        <div class="form-group">
            <p class="control-label col-md-12">If you answered “Yes,” you may already be a U.S. citizen. If you are a U.S. citizen, you should not complete Form N-400. </p>

        </div>
        <div class="form-group">
            <label class="control-label col-md-9">11. Do you have a physical or developmental disability or mental impairment that prevents you from
                demonstrating your knowledge and understanding of the English language or civics requirements for
                naturalization?</label>
            <div class="col-md-3 ">
                <?php echo createRadio("information_about_you_civics_for_naturalization_status") ?>
            </div>
        </div>
        <div class="form-group">
            <p class="control-label col-md-12">If you answered “Yes,” submit a completed Form N-648, Medical Certification for Disability Exceptions, when you file your
                Form N-400. See the Naturalization Testing and Exceptions section of the Instructions for additional information about
                exceptions from the English language test, including exceptions based on age and years as a lawful permanent resident.</p>
        </div>
        <div class="bg-info">
            <h4><b><i>Social Security Update</i></b> </h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-9">12.a. Do you have a physical or developmental disability or mental impairment that prevents you from
                demonstrating your knowledge and understanding of the English language or civics requirements for
                naturalization?</label>
            <div class="col-md-3 ">
                <?php echo createRadio("information_about_you_ssa_naturalizd_status") ?>
            </div>
            <p class="control-label col-md-12"><b>NOTE : </b>If you answered <b>“Yes,”</b> (Complete <b>Item Numbers 12.b. - 12.c.</b> )</p>
            <p class="control-label col-md-12"><b>NOTE : </b>(If you answered <b>“No,”</b> Go to <b>Part 3.</b> )</p>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">12.b. Provide your Social Security number (SSN) (if any)</label>
            <div class="col-md-3 ">
                <input type="text" class="form-control" name="other_information_about_you_social_security_number" maxlength="9" value="<?php echo showData('other_information_about_you_social_security_number') ?>">

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-9">12.c. Consent for Disclosure: I authorize disclosure of information from this application and USCIS systems
                to the SSA as required for the purpose of assigning me an SSN, issuing me an original or replacement
                Social Security card, and updating my immigration status with the SSA.</label>
            <div class="col-md-3 ">
                <?php echo createRadio("information_about_you_consent_for_disclosure_status") ?>
            </div>
        </div>
        <div class="form-group">
            <p class="col-md-12"><b>NOTE:</b> If you answered “Yes” to Item Number 12.a., you must also answer “Yes” to <b>Item Number 12.c., Consent for
                    Disclosure</b>, to receive a card. </p>
        </div>

    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- (page-3) ---------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;""><b>Page 3 of 14</b></p>
   
  <div class=" col-md-12">
    <div class="bg-info">
        <h4><b>Part 3. Biographic Information</b></h4>
    </div>

    <div class="form-group">
        <label class="control-label col-md-12">NOTE: USCIS requires you to complete the categories below to conduct background checks. (See the Form N-400 Instructions for more information.)</label>
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

    <div class="bg-info">
        <h4><b>Part 4. Information About Your Residence</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">1. Physical Addresses</label>
        <div class="col-md-12">
            <p>List every location where you have lived during the last 5 years if you are filing based on the general provision under <b>Part 1., Item Number 1.a</b>. If you are filing based on other naturalization eligibility options, see <b>Part 4</b>. in the <b>Specific Instructions by
                    Item Number</b> section of the Instructions for the applicable period of time for which you must enter this information. If you need extra space, use the space provided in <b>Part 14. Additional Information</b>.</p>
        </div>
    </div>
    <div class="form-group">
        <div class="form-group" style="margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Current Physical Address</label>
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="information_about_you_residence_care_of_name" maxlength="86" value="<?php echo showData('information_about_you_residence_care_of_name') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
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
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_city_town" maxlength="63" value="<?php echo showData('information_about_you_residence_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="information_about_you_residence_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('information_about_you_residence_state')) $selected = "selected";
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
                        <input type="text" class="form-control" name="information_about_you_residence_zip_code" maxlength="5" value="<?php echo showData('information_about_you_residence_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
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
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Residence: From (mm/dd/yyyy)</label>
                    <div style="width: 100%;">
                        <input type="date" class="form-control" name="information_about_you_residence_from_date" value="<?php echo showData('information_about_you_residence_from_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Residence: To (mm/dd/yyyy)</label>
                    <div style="width: 100%;">
                        <input type="date" class="form-control" name="information_about_you_residence_to_date" value="<?php echo showData('information_about_you_residence_to_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <table border="1" style="width: 100%;">
            <thead>
                <tr class="bg-info">
                    <th style="width: 11%;">Physical Address<br>(Street Number and Name)</th>
                    <th style="width: 7%;">City or Town</th>
                    <th style="width: 7%;">State <br>/ Province</th>
                    <th style="width: 7%;">ZIP Code <br>/ Postal Code</th>
                    <th style="width: 7%;">Country</th>
                    <th>From<br>(mm/dd/yyyy)</th>
                    <th>To<br>(mm/dd/yyyy)</th>
                </tr>
            </thead>
            <form action="process_form.php" method="POST">
                <tbody>
                    <tr>
                        <td><input type="text" maxlength="26" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_street_number[]" value="<?php echo showData('information_about_you_residence_street_number', '0') ?>"></td>
                        <td><input type="text" maxlength="10" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_city_town[]" value="<?php echo showData('information_about_you_residence_city_town', '0') ?>"></td>
                        <td><input type="text" maxlength="8" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_state_province[]" value="<?php echo showData('information_about_you_residence_state_province', '0') ?>"></td>
                        <td><input type="text" maxlength="9" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_zip_code[]" value="<?php echo showData('information_about_you_residence_zip_code', '0') ?>"></td>
                        <td><input type="text" maxlength="6" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_country[]" value="<?php echo showData('information_about_you_residence_country', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_from_date[]" value="<?php echo showData('information_about_you_residence_from_date', '0') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_to_date[]" value="<?php echo showData('information_about_you_residence_to_date', '0') ?>"></td>
                    </tr>

                    <tr>
                        <td><input type="text" maxlength="26" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_street_number[]" value="<?php echo showData('information_about_you_residence_street_number', '1') ?>"></td>
                        <td><input type="text" maxlength="10" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_city_town[]" value="<?php echo showData('information_about_you_residence_city_town', '1') ?>"></td>
                        <td><input type="text" maxlength="8" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_state_province[]" value="<?php echo showData('information_about_you_residence_state_province', '1') ?>"></td>
                        <td><input type="text" maxlength="9" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_zip_code[]" value="<?php echo showData('information_about_you_residence_zip_code', '1') ?>"></td>
                        <td><input type="text" maxlength="6" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_country[]" value="<?php echo showData('information_about_you_residence_country', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_from_date[]" value="<?php echo showData('information_about_you_residence_from_date', '1') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_to_date[]" value="<?php echo showData('information_about_you_residence_to_date', '1') ?>"></td>
                    </tr>

                    <tr>
                        <td><input type="text" maxlength="26" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_street_number[]" value="<?php echo showData('information_about_you_residence_street_number', '2') ?>"></td>
                        <td><input type="text" maxlength="10" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_city_town[]" value="<?php echo showData('information_about_you_residence_city_town', '2') ?>"></td>
                        <td><input type="text" maxlength="8" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_state_province[]" value="<?php echo showData('information_about_you_residence_state_province', '2') ?>"></td>
                        <td><input type="text" maxlength="9" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_zip_code[]" value="<?php echo showData('information_about_you_residence_zip_code', '2') ?>"></td>
                        <td><input type="text" maxlength="6" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_country[]" value="<?php echo showData('information_about_you_residence_country', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_from_date[]" value="<?php echo showData('information_about_you_residence_from_date', '2') ?>"></td>
                        <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="information_about_you_residence_to_date[]" value="<?php echo showData('information_about_you_residence_to_date', '2') ?>"></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>


    <div class="form-group">
        <label class="control-label col-md-12">2. Is your current physical address also your current mailing address?</label>
        <div class="col-md-3 col-md-offset-4">
            <?php echo createRadio("information_about_you_residence_curren_mailing_status") ?>
        </div>
        <p class="control-label col-md-12"><b>NOTE : </b>(If you answered <b>“Yes,”</b> skip to <b>Part 5.</b> )</p>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!---------------------------------------------------------
-------------------------------- page 4--------------------
----------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 14</b></p>
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
<!-------------------------------------------------------
------------------------ page 5 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 5 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 5. Information About Your Marital History (continued) </b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-6">6. Current Spouse's Alien Registration Number (A-Number) (if any) </label>
        <div class="col-md-5">
            <input type="text" class="form-control" name="current_spouse_a_number" maxlength="9" value="<?php echo showData('current_spouse_a_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-10">7. How many times has your current spouse been married? (See the Specific Instructions by Item
            Number section of the Instructions for more information about which marriages to include.)</label>
        <div class="col-md-2">
            <input type="text" class="form-control" maxlength="3" name="current_spouse_married" value="<?php echo showData('current_spouse_married') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">Provide divorce decrees, annulment decrees, or death certificates showing that all of your spouse's prior marriages were
            terminated (if applicable).</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-6">8. Current Spouse's Current Employer or Company</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="current_spouse_employer_or_company" maxlength="53" value="<?php echo showData('current_spouse_employer_or_company') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">Only answer Item Number 8. if you are filing under Part 1., Item Number 1.d., Spouse of U.S. Citizen in Qualified
            Employment Outside the United States.
        </label>
    </div>
    <div class="bg-info">
        <h4><b>Part 6. Information About Your Children </b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-10">1. Indicate your total number of children under 18 years of age.</label>
        <div class="col-md-2">
            <input type="text" class="form-control" maxlength="3" name="total_number_of_all_children" value="<?php echo showData('total_number_of_all_children') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">2. Provide the following information about your children identified in Item Number 1.For the residence and relationship
            columns, you must type or print one of the valid options listed. If any of your children do not reside with you, provide the
            address(es) where those children live in Part 14. Additional Information. If you have more than three children, use the space
            provided in Part 14. Additional Information.
        </label>

    </div>
    <div class="col-md-12">
        <table border="1" style="width: 100%;">
            <thead>
                <tr class="bg-info">
                    <th style="width: 11%;">Child's Name<br>(First Name and Family Name)</th>
                    <th style="width: 7%;">Date of Birth <br>(mm/dd/yyyy)</th>
                    <th style="width: 7%;">Residence <br>(Valid options include: resides with me, does not reside with me, or unknown/missing)</th>
                    <th style="width: 7%;">Relationship <br>(Valid options include: biological child, stepchild, legally adopted child)</th>
                    <th style="width: 7%;">Are you providing support for this child?</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" maxlength="27" style="width: 100%; margin: 0;" name="child_first_falmily_name[]" value="<?php echo showData('child_first_falmily_name', '0') ?>"></td>
                    <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="child_date_of_birth[]" value="<?php echo showData('child_date_of_birth', '0') ?>"></td>
                    <td><input type="text" maxlength="17" style="width: 100%; margin: 0; font-weight: 600;" name="child_residence[]" value="<?php echo showData('child_residence', '0') ?>"></td>
                    <td><input type="text" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="child_relationship[]" value="<?php echo showData('child_relationship', '0') ?>"></td>
                    <td><?php echo createRadio("child_support_status") ?></td>
                </tr>
                <tr>
                    <td><input type="text" maxlength="27" style="width: 100%; margin: 0;" name="child_first_falmily_name[]" value="<?php echo showData('child_first_falmily_name', '1') ?>"></td>
                    <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="child_date_of_birth[]" value="<?php echo showData('child_date_of_birth', '1') ?>"></td>
                    <td><input type="text" maxlength="17" style="width: 100%; margin: 0; font-weight: 600;" name="child_residence[]" value="<?php echo showData('child_residence', '1') ?>"></td>
                    <td><input type="text" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="child_relationship[]" value="<?php echo showData('child_relationship', '0') ?>"></td>
                    <td><?php echo createRadio("child_support_status2") ?></td>
                </tr>
                <tr>
                    <td><input type="text" maxlength="27" style="width: 100%; margin: 0;" name="child_first_falmily_name[]" value="<?php echo showData('child_first_falmily_name', '2') ?>"></td>
                    <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="child_date_of_birth[]" value="<?php echo showData('child_date_of_birth', '2') ?>"></td>
                    <td><input type="text" maxlength="17" style="width: 100%; margin: 0; font-weight: 600;" name="child_residence[]" value="<?php echo showData('child_residence', '2') ?>"></td>
                    <td><input type="text" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="child_relationship[]" value="<?php echo showData('child_relationship', '0') ?>"></td>
                    <td><?php echo createRadio("child_support_status3") ?></td>
                </tr>
            </tbody>
        </table>
        <div class="bg-info">
            <h4><b>Part 7. Information About Your Employment and Schools You Attended </b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. List where you have worked or attended school full time or part time during the last 5 years if you are filing based on the general
                provision under Part 1., Item Number 1.a. If you are filing based on other naturalization eligibility options, see Part 7. in the
                Specific Instructions by Item Number section of the Instructions for the applicable period of time for which you must enter
                this information. Provide information for the complete time period for all employment, including foreign government
                employment such as military, police, and intelligence services. Begin by providing information about your most recent or
                current employment, studies, or unemployment. Provide the locations and dates where you worked, were self-employed, were
                unemployed, or have studied. If you worked for yourself and not for a specific employer, type or print “self-employed” for the
                employer name. If you were unemployed, type or print “unemployed.” If you are retired, type or print “retired.” If you need
                extra space to complete Part 7., use the space provided in Part 14. Additional Information.
            </label>

        </div>
        <table border="1" style="width: 100%;">
            <thead>
                <tr class="bg-info">
                    <th>Name</th>
                    <th>City/Town</th>
                    <th>State/Province</th>
                    <th>ZIP Code/Postal Code</th>
                    <th>Country</th>
                    <th>From (mm/dd/yyyy)</th>
                    <th>To (mm/dd/yyyy)</th>
                    <th>Occupation or Field of Study</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" maxlength="15" style="width: 100%; margin: 0;" name="n_400_information_employment_and_school_name[]" value="<?php echo showData('n_400_information_employment_and_school_name', '0') ?>"></td>
                    <td><input type="text" maxlength="10" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_city_town[]" value="<?php echo showData('n_400_information_employment_and_school_city_town', '0') ?>"></td>
                    <td><input type="text" maxlength="5" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_state_province[]" value="<?php echo showData('n_400_information_employment_and_school_state_province', '0') ?>"></td>
                    <td><input type="text" maxlength="9" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_zip_code[]" value="<?php echo showData('n_400_information_employment_and_school_zip_code', '0') ?>"></td>
                    <td><input type="text" maxlength="8" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_country[]" value="<?php echo showData('n_400_information_employment_and_school_country', '0') ?>"></td>
                    <td><input type="date" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_from_date[]" value="<?php echo showData('n_400_information_employment_and_school_from_date', '0') ?>"></td>
                    <td><input type="date" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_to_date[]" value="<?php echo showData('n_400_information_employment_and_school_to_date', '0') ?>"></td>
                    <td><input type="text" maxlength="13" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_occupation[]" value="<?php echo showData('n_400_information_employment_and_school_occupation', '0') ?>"></td>
                </tr>
                <tr>
                    <td><input type="text" maxlength="15" style="width: 100%; margin: 0;" name="n_400_information_employment_and_school_name[]" value="<?php echo showData('n_400_information_employment_and_school_name', '1') ?>"></td>
                    <td><input type="text" maxlength="10" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_city_town[]" value="<?php echo showData('n_400_information_employment_and_school_city_town', '1') ?>"></td>
                    <td><input type="text" maxlength="5" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_state_province[]" value="<?php echo showData('n_400_information_employment_and_school_state_province', '1') ?>"></td>
                    <td><input type="text" maxlength="9" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_zip_code[]" value="<?php echo showData('n_400_information_employment_and_school_zip_code', '1') ?>"></td>
                    <td><input type="text" maxlength="8" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_country[]" value="<?php echo showData('n_400_information_employment_and_school_country',  '1') ?>"></td>
                    <td><input type="date" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_from_date[]" value="<?php echo showData('n_400_information_employment_and_school_from_date', '1') ?>"></td>
                    <td><input type="date" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_to_date[]" value="<?php echo showData('n_400_information_employment_and_school_to_date', '1') ?>"></td>
                    <td><input type="text" maxlength="13" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_occupation[]" value="<?php echo showData('n_400_information_employment_and_school_occupation', '1') ?>"></td>
                </tr>
                <tr>
                    <td><input type="text" maxlength="15" style="width: 100%; margin: 0;" name="n_400_information_employment_and_school_name[]" value="<?php echo showData('n_400_information_employment_and_school_name', '2') ?>"></td>
                    <td><input type="text" maxlength="10" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_city_town[]" value="<?php echo showData('n_400_information_employment_and_school_city_town', '2') ?>"></td>
                    <td><input type="text" maxlength="5" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_state_province[]" value="<?php echo showData('n_400_information_employment_and_school_state_province', '2') ?>"></td>
                    <td><input type="text" maxlength="9" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_zip_code[]" value="<?php echo showData('n_400_information_employment_and_school_zip_code', '2') ?>"></td>
                    <td><input type="text" maxlength="8" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_country[]" value="<?php echo showData('n_400_information_employment_and_school_country',  '2') ?>"></td>
                    <td><input type="date" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_from_date[]" value="<?php echo showData('n_400_information_employment_and_school_from_date', '2') ?>"></td>
                    <td><input type="date" maxlength="15" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_to_date[]" value="<?php echo showData('n_400_information_employment_and_school_to_date', '2') ?>"></td>
                    <td><input type="text" maxlength="13" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_information_employment_and_school_occupation[]" value="<?php echo showData('n_400_information_employment_and_school_occupation', '2') ?>"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 6 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 6 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 8. Time Outside the United States</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">1. List below all the trips that you have taken outside the United States during the last 5 years if you are filing based on the general
            provision under Part 1., Item Number 1.a. If you are filing based on other naturalization eligibility options, see Part 8. in the
            Specific Instructions by Item Number section of the Instructions for the applicable period of time for which you must enter
            this information. Start with your most recent trip and work backwards. Do not include day trips (where the entire trip was
            completed within 24 hours) in the table. If you have taken any trips outside the United States that lasted more than 6 months,
            see the Required Evidence - Continuous Residence section of the Instructions for evidence you should provide. If you need
            extra space to complete this section, use the space provided in Part 14. Additional Information.</label>
    </div>
    <table border="1" style="width: 100%;">
        <thead>
            <tr class="bg-info">
                <th style="width: 30%;">Date You Left the United States (mm/dd/yyyy)</th>
                <th style="width: 30%;">Date You Returned to the United States (mm/dd/yyyy)</th>
                <th style="width: 40%;">Countries to Which You Traveled</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="date" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_outside_the_us_left_date[]" value="<?php echo showData('n_400_outside_the_us_left_date', '0') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_outside_the_us_return_date[]" value="<?php echo showData('n_400_outside_the_us_return_date', '0') ?>"></td>
                <td><input type="text" maxlength="53" style="width: 100%; margin: 0;font-weight: 600;" name="[]" value="<?php echo showData('', '0') ?>"></td>
            </tr>
            <tr>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_left_date[]" value="<?php echo showData('n_400_outside_the_us_left_date', '1') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_return_date[]" value="<?php echo showData('n_400_outside_the_us_return_date', '1') ?>"></td>
                <td><input type="text" maxlength="53" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_country_traveled[]" value="<?php echo showData('n_400_outside_the_us_country_traveled', '1') ?>"></td>
            </tr>
            <tr>n_400_outside_the_us_country_traveled
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_left_date[]" value="<?php echo showData('n_400_outside_the_us_left_date', '2') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_return_date[]" value="<?php echo showData('n_400_outside_the_us_return_date', '2') ?>"></td>
                <td><input type="text" maxlength="53" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_country_traveled[]" value="<?php echo showData('n_400_outside_the_us_country_traveled', '2') ?>"></td>
            </tr>
            <tr>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_left_date[]" value="<?php echo showData('n_400_outside_the_us_left_date', '3') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_return_date[]" value="<?php echo showData('n_400_outside_the_us_return_date', '3') ?>"></td>
                <td><input type="text" maxlength="53" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_country_traveled[]" value="<?php echo showData('n_400_outside_the_us_country_traveled', '3') ?>"></td>
            </tr>
            <tr>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_left_date[]" value="<?php echo showData('n_400_outside_the_us_left_date', '4') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_return_date[]" value="<?php echo showData('n_400_outside_the_us_return_date', '4') ?>"></td>
                <td><input type="text" maxlength="53" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_country_traveled[]" value="<?php echo showData('n_400_outside_the_us_country_traveled', '4') ?>"></td>
            </tr>
            <tr>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_left_date[]" value="<?php echo showData('n_400_outside_the_us_left_date', '5') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_return_date[]" value="<?php echo showData('n_400_outside_the_us_return_date', '5') ?>"></td>
                <td><input type="text" maxlength="53" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_outside_the_us_country_traveled[]" value="<?php echo showData('n_400_outside_the_us_country_traveled', '5') ?>"></td>
            </tr>
        </tbody>
    </table>
    <div class="bg-info">
        <h4><b>Part 9. Additional Information About You </b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">When a question includes the word “EVER,” you must provide information about any of your actions or conduct that occurred
            anywhere in the world at any time, unless the question specifies otherwise. If you answer “Yes” to any of the questions in Item
            Numbers 1. - 14. in Part 9. Item Numbers 1. - 14., provide explanations and any additional information in the space provided in
            Part 14. Additional Information.
        </label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">1. Have you EVER claimed to be a U.S. citizen (in writing or any other way)? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_us_citizen_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">2. Have you EVER registered to vote or voted in any Federal, state, or local election in the United
            States? If you lawfully voted only in a local election where noncitizens are eligible to vote, you may
            answer “No.” </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_vote_federal_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">3. Do you currently owe any overdue Federal, state, or local taxes in the United States? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_local_taxes_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">4. Since you became a lawful permanent resident, have you called yourself a “nonresident alien” on a
            Federal, state, or local tax return or decided not to file a tax return because you considered yourself to
            be a nonresident? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_permanent_resident_status") ?>
        </div>
    </div>
    <div class="form-group row"><label class="control-label col-md-10">Have you EVER:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">5.a. Been a member of, involved in, or in any way associated with any Communist or totalitarian party
            anywhere in the world? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_communist_or_totalitarain_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">5.b. Advocated (supported and promoted) any of the following, or been a member of, involved in, or in any
            way associated with any group anywhere in the world that advocated any of the following: </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_advocated_status") ?>
        </div>
    </div>
    <div class="form-group" style="font-size: small; font-weight: 600;">
        <li style="margin-left: 1.5%;">Opposition to all organized government;</li>
        <li style="margin-left: 1.5%;">World communism;</li>
        <li style="margin-left: 1.5%;">The establishment in the United States of a totalitarian dictatorship;</li>
        <li style="margin-left: 1.5%;">The overthrow by force or violence or other unconstitutional means of the Government of the United States or all forms of law;</li>
        <li style="margin-left: 1.5%;">The unlawful assaulting or killing of any officer or officers of the Government of the United States or of any other organized government because of their official character;</li>
        <li style="margin-left: 1.5%;">The unlawful damage, injury, or destruction of property; or</li>
        <li style="margin-left: 1.5%;">Sabotage?</li>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 7 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 7 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 8. Time Outside the United States</b></h4>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Have you EVER been a member of, involved in, or in any way associated with, or have you EVER provided money, a thing of value, services or labor, or any other assistance or support to a group that:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">6.a. Used a weapon or explosive with intent to harm another person or cause damage to property?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_damage_property_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">6.b. Engaged (participated) in kidnapping, assassination, or hijacking or sabotage of an airplane, ship, vehicle, or other mode of transportation?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_engaged_in_kidnapping_or_hijacking_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">6.c. Threatened, attempted (tried), conspired (planned with others), prepared, planned, advocated for, or incited (encouraged) others to commit any of the acts listed in Item Numbers 6.a. or 6.b.?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_attempted_planned_status") ?>
        </div>
    </div>
    <div class="form-group row"><label class="control-label col-md-10">Have you EVER ordered, incited, called for, committed, assisted, helped with, or otherwise participated in any of the following:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.a. Torture?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_torture_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.b. Genocide?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_genocide_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.c. Killing or trying to kill any person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_kill_any_person_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.d. Intentionally and severely injuring or trying to injure any person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_injure_any_person_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.e. Any kind of sexual contact or activity with any person who did not consent (did not agree) or was unable to consent (could not agree), or was being forced or threatened by you or by someone else?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_sexual_contact_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.f. Not letting someone practice their religion?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_practice_religion_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.g. Causing harm or suffering to any person because of their race, religion, national origin, membership in a particular social group, or political opinion?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_political_opinion_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">8.a. Have you EVER served in, been a member of, assisted (helped), or participated in any military or police unit?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_participate_in_military_police_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">8.b. Have you EVER served in, been a member of, assisted (helped), or participated in any armed group (a
            group that carries weapons), for example: paramilitary unit (a group of people who act like a military
            group but are not part of the official military), self-defense unit, vigilante unit, rebel group, or guerrilla group?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_participate_in_armed_group_status") ?>
        </div>
    </div>
    <div class="form-group row"><label class="control-label col-md-10">If you answered “Yes” to Item Number 8.a. or Item Number 8.b., include the name of the country,
            the name of the military unit or armed group, your rank or position, and your dates of involvement in your explanation in Part 14. Additional Information.</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">9. Have you EVER worked, volunteered, or otherwise served in a place where people were detained
            (forced to stay), for example, a prison, jail, prison camp (a camp where prisoners of war or political
            prisoners are kept), detention facility, or labor camp, or have you EVER directed or participated in any
            other activity that involved detaining people?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_participate_detaining_people_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">10.a. Were you EVER a part of any group, or did you EVER help any group, unit, or organization that used
            a weapon against any person, or threatened to do so? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_help_organization_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">10.b. If you answered “Yes” to Item Number 10.a., when you were part of this group, or when you helped
            this group, did you ever use a weapon against another person?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_use_weapon_against_person_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">10.c. If you answered “Yes” to Item Number 10.a., when you were part of this group, or when you helped
            this group, did you ever threaten another person that you would use a weapon against that person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_threaten_another_person_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">11. Have you EVER sold, provided, or transported weapons, or assisted any person in selling, providing,
            or transporting weapons, which you knew or believed would be used against another person?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_transported_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">12. Have you EVER received any weapons training, paramilitary training, or other military-type training? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_weapons_training_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">13. Have you EVER recruited (asked), enlisted (signed up), conscripted (required to join), or used any
            person under 15 years of age to serve in or help an armed group, or attempted or worked with others to
            do so?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_used_person_under_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">14. Have you EVER used any person under 15 years of age to take part in hostilities or attempted or
            worked with others to do so? This could include participating in combat or providing services related
            to combat (such as serving as a messenger or transporting supplies).
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_used_person_hostilities_status") ?>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 8 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 8 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 9. Additional Information About You (continued) </b></h4>
    </div>
    <div class="form-group"><label class="control-label col-md-12">If you answer “Yes” to any part of Item Number 15. below, complete the table below with each crime or offense even if your
            records have been sealed, expunged, or otherwise cleared. You must disclose this information even if someone, including a judge,
            law enforcement officer, or attorney, told you that it is no longer on your record, or told you that you do not have to disclose the
            information. If you need extra space, use the space provided in Part 14. Additional Information. Submit evidence to support your
            answers with your Form N-400</label>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Include all the crimes and offenses in the United States or anywhere in the world (including domestic violence, driving under the
            influence of drugs or alcohol, and crimes and offenses while you were under 18 years of age) which you EVER:
        </label>
    </div>
    <div class="form-group" style="font-size: small; font-weight: 600;">
        <li style="margin-left: 1.5%;">Committed, agreed to commit, or asked someone else to commit;</li>
        <li style="margin-left: 1.5%;">Were arrested, cited, detained, or confined by any law enforcement officer, military official (in the U.S. or elsewhere), or
            immigration official;</li>
        <li style="margin-left: 1.5%;">Were charged with committing, helping commit, or trying to commit;</li>
        <li style="margin-left: 1.5%;">Pled guilty to;</li>
        <li style="margin-left: 1.5%;">Were convicted of</li>
        <li style="margin-left: 1.5%;">Were placed in alternative sentencing or a rehabilitative program for (for example, diversion, deferred prosecution, withheld
            adjudication, or deferred adjudication); or</li>
        <li style="margin-left: 1.5%;">Received a suspended sentence, clemency, amnesty, or pardon for, or were placed on probation or paroled for.
        </li>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">15.a. Have you EVER committed, agreed to commit, asked someone else to commit, helped commit, or
            tried to commit a crime or offense for which you were NOT arrested?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_commit_a_crime_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">15.b. Have you EVER been arrested, cited, detained or confined by any law enforcement officer, military
            official (in the U.S. or elsewhere), or immigration official for any reason, or been charged with a crime
            or offense?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_arrested_offense_status") ?>
        </div>
    </div>

    <table border="1" style="width: 100%;">
        <thead>
            <tr class="bg-info">
                <th>What was the crime or offense? (If convicted, provide crime of conviction. If not convicted, provide
                    crime or offense listed in arrest, citation, charging document, or crime committed.)</th>
                <th>Date of the Crime or Offense(mm/dd/yyyy)</th>
                <th>Date of your conviction or guilty plea (if applicable) (mm/dd/yyyy)</th>
                <th>Place of Crime or Offense (City or Town, State, Country)</th>
                <th>What was the result or disposition of the arrest, citation, or charge? (no charges filed, convicted, charges dismissed, detention, jail, probation, etc.)</th>
                <th>What was your sentence (if applicable)? (For example, 90 days in jail, 90 days on probation)</th>
            </tr>
        </thead>
        <tbody>n_400_additional_information_date_of_crime_or_offense
            <tr>
                <td><input type="text" maxlength="20" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_crime_or_offense', '0') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_date_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_date_of_crime_or_offense', '0') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_date_of_conviction[]" value="<?php echo showData('n_400_additional_information_date_of_conviction', '0') ?>"></td>
                <td><input type="text" maxlength="14" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_place_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_place_of_crime_or_offense', '0') ?>"></td>
                <td><input type="text" maxlength="17" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_result_of_disposition[]" value="<?php echo showData('n_400_additional_information_result_of_disposition', '0') ?>"></td>
                <td><input type="text" maxlength="10" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_sentence[]" value="<?php echo showData('n_400_additional_information_sentence', '0') ?>"></td>
            </tr>
            <tr>
                <td><input type="text" maxlength="20" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_crime_or_offense', '1') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_date_of_crime_or_offense', '1') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_conviction[]" value="<?php echo showData('n_400_additional_information_date_of_conviction', '1') ?>"></td>
                <td><input type="text" maxlength="14" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_place_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_place_of_crime_or_offense', '1') ?>"></td>
                <td><input type="text" maxlength="17" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_result_of_disposition[]" value="<?php echo showData('n_400_additional_information_result_of_disposition', '1') ?>"></td>
                <td><input type="text" maxlength="10" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_sentence[]" value="<?php echo showData('n_400_additional_information_sentence', '1') ?>"></td>
            </tr>
            <tr>
                <td><input type="text" maxlength="20" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_crime_or_offense', '2') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_date_of_crime_or_offense', '2') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_conviction[]" value="<?php echo showData('n_400_additional_information_date_of_conviction', '2') ?>"></td>
                <td><input type="text" maxlength="14" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_place_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_place_of_crime_or_offense', '2') ?>"></td>
                <td><input type="text" maxlength="17" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_result_of_disposition[]" value="<?php echo showData('n_400_additional_information_result_of_disposition', '2') ?>"></td>
                <td><input type="text" maxlength="10" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_sentence[]" value="<?php echo showData('n_400_additional_information_sentence', '2') ?>"></td>
            </tr>
            <tr>
                <td><input type="text" maxlength="20" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_crime_or_offense', '3') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_date_of_crime_or_offense', '3') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_conviction[]" value="<?php echo showData('n_400_additional_information_date_of_conviction', '3') ?>"></td>
                <td><input type="text" maxlength="14" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_place_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_place_of_crime_or_offense', '3') ?>"></td>
                <td><input type="text" maxlength="17" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_result_of_disposition[]" value="<?php echo showData('n_400_additional_information_result_of_disposition', '3') ?>"></td>
                <td><input type="text" maxlength="10" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_sentence[]" value="<?php echo showData('n_400_additional_information_sentence', '3') ?>"></td>
            </tr>
            <tr>
                <td><input type="text" maxlength="20" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_crime_or_offense', '4') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_date_of_crime_or_offense', '4') ?>"></td>
                <td><input type="date" style="width: 100%; margin: 0; font-weight: 600;" name="n_400_additional_information_date_of_conviction[]" value="<?php echo showData('n_400_additional_information_date_of_conviction', '4') ?>"></td>
                <td><input type="text" maxlength="14" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_place_of_crime_or_offense[]" value="<?php echo showData('n_400_additional_information_place_of_crime_or_offense', '4') ?>"></td>
                <td><input type="text" maxlength="17" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_result_of_disposition[]" value="<?php echo showData('n_400_additional_information_result_of_disposition', '4') ?>"></td>
                <td><input type="text" maxlength="10" style="width: 100%; margin: 0;font-weight: 600;" name="n_400_additional_information_sentence[]" value="<?php echo showData('n_400_additional_information_sentence', '4') ?>"></td>
            </tr>

        </tbody>
    </table>


    <div class="form-group row">n_400_additional_information_place_of_crime_or_offense
        <label class="control-label col-md-10">16. If you received a suspended sentence, were placed on probation, or were paroled, have you completed
            your suspended sentence, probation, or parole?
        </label>
        <div class="col-md-2 ">
            <?php echo createRadio("additional_info_probation_or_parole_status") ?>
        </div>
    </div>
    <div class="form-group row"><label class="control-label col-md-10">If you answer “Yes” to any of the questions in Item Numbers 17.a. - 19., provide an explanation in the space provided in Part 14. Additional Information. Submit evidence to support your answers.</label></div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 9 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 9 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 9. Additional Information About You (continued)</b></h4>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Have you EVER:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.a. Engaged in prostitution, attempted to procure or import prostitutes or persons for the purpose of
            prostitution, or received any proceeds or money from prostitution?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_engaged_in_prostitution_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.b. Manufactured, cultivated, produced, distributed, dispensed, sold, or smuggled (trafficked) any
            controlled substances, illegal drugs, narcotics, or drug paraphernalia in violation of any law or
            regulation of a U.S. state, the United States, or a foreign country?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_manufactured_foreign_country_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.c. Been married to more than one person at the same time? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_married_more_than_one_person_status") ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-md-10">17.d. Married someone in order to obtain an immigration benefit?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_immiagration_benefit_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.e. Helped anyone to enter, or try to enter, the United States illegally? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_us_illegally_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.f. Gambled illegally or received income from illegal gambling?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_gambled_illegal_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.g. Failed to support your dependents (pay child support) or to pay alimony (court-ordered financial
            support after divorce or separation)?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_pay_alimony_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">17.h. Made any misrepresentation to obtain any public benefit in the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_public_benefit_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">18. Have you EVER given any U.S. Government officials any information or documentation that was
            false, fraudulent, or misleading?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_fraudulent_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">19. Have you EVER lied to any U.S. Government officials to gain entry or admission into the United
            States or to gain immigration benefits while in the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_government_official_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">If you answer “Yes” to Item Numbers 20. - 21. below, provide an explanation in the space provided in Part 14. Additional
            Information and see the Specific Instructions by Item Number, Part 9. Additional Information About You of the Instructions for
            more information</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">20. Have you EVER been placed in removal, rescission, or deportation proceedings?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_removal_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">21. Have you EVER been removed or deported from the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_deported_us_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">Federal Law requires nearly all people born as male who are either U.S. citizens or immigrants, 18 through 25 years of age, to register
            with Selective Service. See <a href="https://www.sss.gov/">www.sss.gov</a> .</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">22.a. Are you a person born as a male who lived in the United States at any time between your 18th and 26th
            birthdays? (Do not select “Yes” if you were a lawful nonimmigrant for all of that time period.)

        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_born_as_male_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">22.b. If you answered “Yes,” to Item Number 22.a., did you register for the Selective Service?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_selective_service_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">22.c. If you answered “Yes,” to Item Number 22.b., provide information about your registration.</label>
    </div>
    <div class="row">
        <div class=" col-md-5">
            <label class="control-label " style="margin-left: 3.5%;">Date Registered (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="additional_info_ragistration_date" maxlength="" value="<?php echo showData('additional_info_ragistration_date') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label " style="margin-left: 3.5%;">Selective Service Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="additional_info_ragistration_service_number" maxlength="10" value="<?php echo showData('additional_info_ragistration_service_number') ?>">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">If you answered “No,” to Item Number 22.b. see the Specific Instructions by Item Number, Part 9. Additional Information
            About You of the Instructions for more information.
        </label>
        <label class="control-label col-md-12">If you answer “Yes” to Item Numbers 23. - 24., provide an explanation in the space provided in Part 14. Additional Information.</label>
    </div>



    <div class="form-group row">
        <label class="control-label col-md-10">23. Have you EVER left the United States to avoid being drafted in the U.S. armed forces?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_avoid_armed_force_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">24. Have you EVER applied for any kind of exemption from military service in the U.S. armed forces?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_applied_exemption_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">25. Have you EVER served in the U.S. armed forces?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_served_us_armed_force_status") ?>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 10 ------------------------
---------------  ------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 10 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 9. Additional Information About You (continued)</b></h4>
    </div>
    <div class="form-group"><label class="control-label col-md-12">If you answered “No” to Item Number 25., go to Item Number 30.a</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">26.a. Are you currently a member of the U.S. armed forces?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_currently_member_us_armed_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">26.b. If you answered “Yes” to Item Number 26.a., are you scheduled to deploy outside the United States,
            including to a vessel, within the next 3 months? (Call the Military Help Line at 877-247-4645 if you
            transfer to a new duty station after you file your Form N-400, including if you are deployed outside the
            United States or to a vessel.)
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_outside_us_vessel_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">26.c. If you answered “Yes,” to Item Number 26.a., are you currently stationed outside the United States? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_currently_stationed_status") ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-md-10">26.d. If you answered “No” to Item Number 26.a., are you a former U.S. military service member who is
            currently residing outside of the U.S.?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_former_us_military_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">If you answer “Yes” to Item Numbers 27. - 29., provide an explanation in the space provided in Part 14. Additional Information</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">27. Have you EVER been court-martialed or have you received a discharge characterized as other than
            honorable, bad conduct, or dishonorable, while in the U.S. armed forces?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_court_martialed_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">28. Have you EVER been discharged from training or service in the U.S. armed forces because you were
            an alien?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_discharged_training_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">29. Have you EVER deserted from the U.S. armed forces?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_deserted_us_armed_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">For Item Numbers 30.a. - 37. see Specific Instructions by Item Number, Part 9. Additional Information About You. If you
            answer “Yes” to Item Number 30.a., provide an explanation in the space provided in Part 14. Additional Information.</label>

    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">30.a. Do you now have, or did you EVER have, a hereditary title or an order of nobility in any foreign country? </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_hereditary_title_status") ?>
        </div>
        <label class="control-label col-md-10">(skip to Item Number 31.)</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">30.b. If you answered “Yes,” to Item Number 30.a., are you willing to give up any inherited titles or orders
            of nobility, <input type="text" class="form-control" name="additional_info_inherited_title" maxlength="41" value="<?php echo showData('additional_info_inherited_title') ?>"> (list titles), that you have in a
            foreign country at your naturalization ceremony?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_inherited_title_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">If you answer “'No” to any question except Item Number 33., see the Oath of Allegiance section of the Instructions for more information</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">31. Do you support the Constitution and form of Government of the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_constitution_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">32. Do you understand the full Oath of Allegiance to the United States (see Part 16. Oath of Allegiance)?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_allegiance_to_us_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">33. Are you unable to take the Oath of Allegiance because of a physical or developmental disability or
            mental impairment? If you answer “Yes,” skip Item Numbers 34. - 37. and see the Legal Guardian,
            Surrogate, or Designated Representative section in the Instructions.</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_physical_or_developmental_status") ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-md-10">34. Are you willing to take the full Oath of Allegiance to the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_willing_allegiance_to_us_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">35. If the law requires it, are you willing to bear arms (carry weapons) on behalf of the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_willing_bear_arms_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">36. If the law requires it, are you willing to perform noncombatant services (do something that does not include fighting in a war) in the U.S. armed forces?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_noncombatant_service_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">37. If the law requires it, are you willing to perform work of national importance under civilian direction (do non-military work that the U.S. Government says is important to the country)?</label>
        <div class="col-md-2">
            <?php echo createRadio("additional_info_importance_under_civilian_status") ?>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 11 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 11 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 10. Request for a Fee Reduction </b></h4>
    </div>
    <div class="form-group"><label class="control-label col-md-12">For information about fees, fee waivers, and reduced fees, see Form G-1055, Fee Schedule, at <a href="https://www.uscis.gov/g-1055">www.uscis.gov/g-1055</a>. To apply for a
            reduced fee, complete Item Numbers 1. - 5.b. If you are not eligible for a reduced fee, complete Item Number 1. and proceed to
            Part 11.</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">1. My household income is less than or equal to 400% of the Federal Poverty Guidelines (see Instructions for required documentation)</label>
        <div class="col-md-2">
            <?php echo createRadio("fee_reduction_household_income_status") ?>
        </div>
        <label class="control-label col-md-10">Note : If Yes (complete Item Numbers 2. - 5.b.)</label>
        <label class="control-label col-md-10">Note : If No (skip to Part 11.)</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">2. Total household income:</label>
        <div class="col-md-3 ">
            <input type="text" class="form-control" maxlength="7" name="fee_reduction_household_income" value="<?php echo showData('fee_reduction_household_income') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">3. My household size is:</label>
        <div class="col-md-3 ">
            <input type="text" class="form-control" maxlength="7" name="fee_reduction_household_size" value="<?php echo showData('fee_reduction_household_size') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">4. Total number of household members earning income including yourself</label>
        <div class="col-md-3 ">
            <input type="text" class="form-control" maxlength="7" name="fee_reduction_household_members_income" value="<?php echo showData('fee_reduction_household_members_income') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-10">5.a. I am the head of household</label>
        <div class="col-md-2">
            <?php echo createRadio("fee_reduction_household_head_status") ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">5.b. Name of head of household (if you selected “No” in Item Number 5.a.):</label>
        <div class="col-md-3 ">
            <input type="text" class="form-control" maxlength="35" name="fee_reduction_household_head_name" value="<?php echo showData('fee_reduction_household_head_name') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 11. Applicant's Contact Information, Certification, and Signature</b></h4>
    </div>

    <div class="bg-info">
        <h4><b> <i>Applicant's Contact Information</i> </b></h4>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">Provide your daytime telephone number, mobile telephone number (if any), and email address (if any)</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">1. Applicant's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_applicant_daytime_tel" maxlength="10" value="<?php echo showData('n_400_applicant_daytime_tel') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">2. Applicant's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_applicant_mobile" maxlength="10" value="<?php echo showData('n_400_applicant_mobile') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label ">3. Applicant's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_applicant_email" maxlength="38" value="<?php echo showData('n_400_applicant_email') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b> <i>Applicant's Certification and Signature</i> </b></h4>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with
            my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in Part 12.,
            understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the
            information are complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records
            that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the
            administration and enforcement of U.S. immigration law.
        </label>
    </div>

    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-9">
            <label class="control-label ">4. Applicant's Signature (or signature of a legal guardian, surrogate, or designated representative, if applicable)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class=" col-md-3">
            <label class="control-label " style="margin-left: 15px;">Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="i_192_applicant_sign_date" maxlength="" value="<?php echo showData('i_192_applicant_sign_date') ?>">
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>


<!---------------------------------------------------
------------------- page 12 --------------------------
----------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 12 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 10. Request for a Fee Reduction </b></h4>
    </div>
    <div class="bg-info">
        <h4><b><i>Interpreter's Full Name</i></b></h4>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">1. Interpreter's Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_interpreter_family_last_name" maxlength="43" value="<?php echo showData('n_400_interpreter_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Interpreter's Given Name (First Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_interpreter_given_first_name" maxlength="42" value="<?php echo showData('n_400_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label ">2. Interpreter's Business or Organization Name</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_interpreter_business_name" maxlength="43" value="<?php echo showData('n_400_interpreter_business_name') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b><i>Interpreter's Contact Information</i></b></h4>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">3. Interpreter's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('n_400_interpreter_daytime_tel') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">4. Interpreter's Mobile Telephone Number (if any) </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_interpreter_mobile" maxlength="10" value="<?php echo showData('n_400_interpreter_mobile') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label ">5. Interpreter's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_interpreter_email" maxlength="38" value="<?php echo showData('n_400_interpreter_email') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b> <i>Interpreter's Certification and Signature</i> </b></h4>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-6">I certify, under penalty of perjury, that I am fluent in English and </label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="n_400_interpreter_certification_language_skill" maxlength="18" value="<?php echo showData('n_400_interpreter_certification_language_skill') ?>">
        </div>
        <label class="control-label col-md-12">and I have interpreted every question on the application and Instructions and interpreted the applicant's answers to the questions in that
            language, and the applicant informed me that they understood every instruction, question, and answer on the application.</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-9">
            <label class="control-label ">6. Interpreter's Signature</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class=" col-md-3">
            <label class="control-label " style="margin-left: 15px;">Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="n_400_interpreter_sign_date" maxlength="" value="<?php echo showData('n_400_interpreter_sign_date') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 13. Contact Information, Certification, and Signature of the Person Preparing this Application, if Other Than the Applicant </b></h4>
    </div>
    <div class="bg-info">
        <h4><b><i>Preparer's Full Name</i></b></h4>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">1. Preparer's Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_preparer_family_last_name" maxlength="43" value="<?php echo showData('n_400_preparer_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Preparer's Given Name (First Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_preparer_family_given_first_name" maxlength="42" value="<?php echo showData('n_400_preparer_family_given_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label ">2. Preparer's Business or Organization Name</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_preparer_business_name" maxlength="43" value="<?php echo showData('n_400_preparer_business_name') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b><i>Preparer's Contact Information</i></b></h4>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">3. Preparer's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_preparer_daytime_tel" maxlength="10" value="<?php echo showData('n_400_preparer_daytime_tel') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">4. Preparer's Mobile Telephone Number (if any) </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_preparer_mobile" maxlength="10" value="<?php echo showData('n_400_preparer_mobile') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label ">5. Preparer's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_preparer_email" maxlength="38" value="<?php echo showData('n_400_preparer_email') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b> <i>Preparer's Certification and Signature</i> </b></h4>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that
            all of the responses and information contained in and submitted with the application are complete, true, and correct and reflects only
            information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand
            the responses and information in or submitted with the application</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-9">
            <label class="control-label ">6. Preparer's Signature</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="" maxlength="" disabled value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class=" col-md-3">
            <label class="control-label " style="margin-left: 15px;">Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="n_400_preparer_sign_date" maxlength="" value="<?php echo showData('n_400_preparer_sign_date') ?>">
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 13 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 13 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 14. Additional Information </b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">If you need extra space to provide any additional information within this application, use the space below. If you need more space
            than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.
            Type or print your name and A-Number at the top of each sheet; indicate the Page Number, Part Number, and Item Number to
            which your answer refers; and sign and date each sheet.</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label ">1. Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_additional_info_last_name" maxlength="35" value="<?php echo showData('n_400_additional_info_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Given Name (First Name) </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_additional_info_first_name" maxlength="27" value="<?php echo showData('n_400_additional_info_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Middle (if applicable)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="n_400_additional_info_middle_name" maxlength="22" value="<?php echo showData('n_400_additional_info_middle_name') ?>">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">2. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_2a_page_no" maxlength="2" value="<?php echo showData('n_400_additional_info_2a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_2b_part_no" maxlength="6" value="<?php echo showData('n_400_additional_info_2b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_2c_item_no" maxlength="6" value="<?php echo showData('n_400_additional_info_2c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea name="n_400_additional_info_2d" class="form-control" maxlength="255" cols="30" rows="10"><?php echo showData('n_400_additional_info_2d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">3. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('n_400_additional_info_3a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('n_400_additional_info_3b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('n_400_additional_info_3c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea name="n_400_additional_info_3d" class="form-control" maxlength="256" cols="30" rows="10"><?php echo showData('n_400_additional_info_3d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">4. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('n_400_additional_info_4a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('n_400_additional_info_4b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('n_400_additional_info_4c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="n_400_additional_info_4d" maxlength="341" class="form-control" cols="30" rows="10"><?php echo showData('n_400_additional_info_4d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">5. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('n_400_additional_info_5a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('n_400_additional_info_5b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="n_400_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('n_400_additional_info_5c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="n_400_additional_info_5d" maxlength="341" class="form-control" cols="30" rows="10"><?php echo showData('n_400_additional_info_5d') ?></textarea>
            </div>
        </div>
    </div>

    <h4 class="form-group"><b>Do not complete Parts 15. or 16. until the USCIS officer instructs you to do so at the interview</b></h4>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>


<!-------------------------------------------------------
------------------------ page 14 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 14 of 14</b></p>
    <div class="bg-info">
        <h4><b>Part 15. Signature at Interview </b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">I swear (affirm) and certify under penalty of perjury under the laws of the United States of America that I know that the contents of
            this Form N-400, Application for Naturalization, subscribed by me, including corrections, are complete, true, and correct. The
            evidence submitted by me are complete, true, and correct</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">Subscribed to and sworn to (affirmed) before me</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="signature_at_interview_subscribed_affirmed" maxlength="83" value="<?php echo showData('signature_at_interview_subscribed_affirmed') ?>">
            </div>
            <label class="control-label" style="text-align: center; width: 100%;">USCIS Officer's Printed Name or Stamp</label>
        </div>
        <div class=" col-md-4">
            <div class="col-md-12">
                <label class="control-label "></label>
                <input type="date" class="form-control" name="signature_at_interview_sign_date" maxlength="" value="<?php echo showData('signature_at_interview_sign_date') ?>">
            </div>
            <label class="control-label " style="text-align: center; width: 100%;">Date of Signature (mm/dd/yyyy)</label>
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">Applicant's Signature</label>
            <div class="col-md-12">
                <input type="text" disabled class="form-control" name="" maxlength="" value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <div class="col-md-12">
                <label class="control-label ">USCIS Officer's Signature</label>
                <input type="text" disabled class="form-control" name="" maxlength="" value="<?php echo showData('') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 16. Oath of Allegiance</b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">If your application is approved, you will be scheduled for a naturalization ceremony at which time you will be required to take the
            following Oath of Allegiance immediately prior to becoming a naturalized citizen. By signing below you acknowledge your
            willingness to take this Oath:
        </label>
        <label class="control-label ">I hereby declare on oath, that I absolutely and entirely renounce and abjure all allegiance and fidelity to any foreign prince, potentate,
            state, or sovereignty, of whom or which I have heretofore been a subject or citizen;
        </label>
        <label class="control-label ">that I will support and defend the Constitution and laws of the United States of America against all enemies, foreign, and domestic;</label>
        <label class="control-label ">that I will bear true faith and allegiance to the same;</label>
        <label class="control-label ">that I will bear arms on behalf of the United States when required by the law;</label>
        <label class="control-label ">that I will perform noncombatant service in the armed forces of the United States when required by the law;</label>
        <label class="control-label ">that I will perform work of national importance under civilian direction when required by the law; and</label>
        <label class="control-label ">that I take this obligation freely, without any mental reservation or purpose of evasion; so help me God.</label>
    </div>
    <div class="row" style="margin-bottom: 20px">
        <div class=" col-md-8">
            <label class="control-label" style="margin-left: 3%;">Applicant's Signature</label>
            <div class="col-md-12">
                <input type="text" disabled class="form-control" name="" maxlength="" value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <div class="col-md-12">
                <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="allegiance_sign_date" maxlength="6" value="<?php echo showData('allegiance_sign_date') ?>">
            </div>
        </div>
    </div>




    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>