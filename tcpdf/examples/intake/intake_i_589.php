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
            <b>NOTE: </b> <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> Check this box if you also want to apply for withholding of removal under the Convention Against Torture.
        </label>
    </div>
    <div class="col-md-12">
        <div class="bg-info" style="margin-top:10px;">
            <h4><b>Part A.I. Information About You</b></h4>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">1. Alien Registration Number(s) (A-Number) (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="9" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">2. U.S. Social Security Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="9" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">3. USCIS Online Account Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="12" value="<?php echo showData('i_539_interpreter_business_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">4. Complete Last Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="42" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">5. First Name </label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="30" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">6. Middle Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="23" value="<?php echo showData('i_539_interpreter_business_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">7. What other names have you used (include maiden name and aliases)?</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="99" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">8. Residence in the U.S. (where you physically reside) </label>
                <label class="control-label text-sm ">Street Number and Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="64" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Apt. Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="6" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <label class="control-label text-sm ">City</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="34" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">State</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="22" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Zip Code</label>
                <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="5" value="<?php echo showData('i_539_interpreter_business_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Telephone Number</label>
                <div>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="3" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="7" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">8. Residence in the U.S. (where you physically reside) </label>
                <label class="control-label text-sm ">In Care Of (if applicable):</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="67" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Telephone Number</label>
                <div>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="3" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="7" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">Street Number and Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="66" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Apt. Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="5" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">City</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="32" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">State</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="33" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Zip Code</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="5" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 my-5">
            <label>10. Gender</label><br>
            <input type="radio" name="biographic_info_hair_color" id="male" value="male" <?php echo (showData('biographic_info_hair_color') == 'male') ? 'checked' : '' ?>> <label for="male">Male</label><br>
            <input type="radio" name="biographic_info_hair_color" id="female" value="female" <?php echo (showData('biographic_info_hair_color') == 'female') ? 'checked' : '' ?>> <label for="female">Female</label><br>
        </div>
        <div class="col-md-12">
            <label>11. Marital Status: </label><br>
            <input type="radio" name="biographic_info_hair_color" id="single" value="single" <?php echo (showData('biographic_info_hair_color') == 'single') ? 'checked' : '' ?>> <label for="single">Single</label><br>
            <input type="radio" name="biographic_info_hair_color" id="married" value="married" <?php echo (showData('biographic_info_hair_color') == 'married') ? 'checked' : '' ?>> <label for="married">Married</label><br>
            <input type="radio" name="biographic_info_hair_color" id="divorced" value="divorced" <?php echo (showData('biographic_info_hair_color') == 'divorced') ? 'checked' : '' ?>> <label for="divorced">Divorced</label><br>
            <input type="radio" name="biographic_info_hair_color" id="widowed" value="widowed" <?php echo (showData('biographic_info_hair_color') == 'widowed') ? 'checked' : '' ?>> <label for="widowed">Widowed</label><br>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">12. Date of Birth (mm/dd/yyyy)</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-8">
                <label class="control-label text-sm ">13. City and Country of Birth</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="68" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <label class="control-label text-sm ">14. Present Nationality (Citizenship)</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="29" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">15. Nationality at Birth</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="26" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">16. Race, Ethnic, or Tribal Group</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="23" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">17. Religion</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="18" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label class="">
                <b>18.</b>Check the box, a through c, that applies:
            </label>
            <br>
            <label class="control-label">
                <b>a.</b> <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> I have never been in Immigration Court proceedings.
            </label><br>
            <label class="control-label">
                <b>b.</b> <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> I am now in Immigration Court proceedings
            </label><br>
            <label class="control-label">
                <b>c.</b> <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> I am not now in Immigration Court proceedings, but I have been in the past.
            </label>
        </div><br>
        <div>
            <label class="control-label col-md-12">19. Complete 19 a through c.</label>
            <div class="col-md-5">
                <label class="control-label text-sm ">a. When did you last leave your country? (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name"  value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label text-sm ">b. What is your current I-94 Number, if any?</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="11" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <label class="control-label col-md-12">c. List each entry into the U.S. beginning with your most recent entry. List date (mm/dd/yyyy), place, and your status for each entry. (Attach additional sheets as needed.)</label>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name"  value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="20" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="15" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date Status Expires
                </label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name"  value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="20" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="15" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>

            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name"  value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="20" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="15" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div>
            <div class="col-md-5">
                <label class="control-label text-sm ">20. What country issued your last passport or travel document?</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="37" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">21. Passport Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="25" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <label class="control-label text-sm ">Travel Document Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="21" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">22. Expiration Date (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">23. What is your native language (include dialect, if applicable)?</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <div class="col-md-12 my-5">
                    <label>24. Are you fluent in English?</label><br>
                    <div>
                        <?php echo createRadio("i_485_social_security_status") ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">25. What other languages do you speak fluently?</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="32" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="9" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="23" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">3. Date of Birth (mm/dd/yyyy)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="9" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">5. Complete Last Name</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="29" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">6. First Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="23" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">7. Middle Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="22" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">8. Other names used (include maiden name and aliases)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="22" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 d-flexible">
            <div class="col-md-4" style="align-items: center;">
                <label class="control-label " style="font-size: smaller;">12. Nationality (Citizenship)</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="37" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4" style="align-items: center;">
                <label class="control-label " style="font-size: smaller;">13. Race, Ethnic, or Tribal Group</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="36" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4" style="align-items: center;">
                <label style="font-size: smaller;">14. Gender</label><br>
                <div class="d-flexible">
                    <input type="radio" name="biographic_info_hair_color" id="male" value="male" <?php echo (showData('biographic_info_hair_color') == 'male') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="male">Male</label><br>
                    <input type="radio" name="biographic_info_hair_color" id="female" value="female" <?php echo (showData('biographic_info_hair_color') == 'female') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="female">Female</label><br>
                </div>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <div class="col-md-5" style="align-items: center;">
                <label style="font-size: smaller;">15. Is this person in the U.S.?</label><br>
                <div class="d-flexible">
                    <input type="radio" name="biographic_info_hair_color" id="15_YES" value="male" <?php echo (showData('biographic_info_hair_color') == 'male') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="15_YES">Yes (Complete Blocks 16 to 24.)</label><br>
                    <input type="radio" name="biographic_info_hair_color" id="15_NO" value="female" <?php echo (showData('biographic_info_hair_color') == 'female') ? 'checked' : '' ?>> <label style="font-size: smaller;" for="15_NO">No (Specify location):</label><br>
                </div>
            </div>
            <div class="col-md-6" style="align-items: center;">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="50" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">16. Place of last entry into the U.S. </label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="21" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">17. Date of last entry into the U.S. (mm/dd/yyyy) </label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">18. I-94 Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="11" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">19. Status when last admitted (Visa type, if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="24" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12 my-4">
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">20. What is your spouse's current status? </label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="21" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">21. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">22. Is your spouse in Immigration Court proceedings?</label>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">23. If previously in the U.S., date of previous arrival (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label col-md-12" style="font-size: 12px;">24. If in the U.S., is your spouse to be included in this application? (Check the appropriate box.)</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label col-md-12" style="font-size: 12px;">Your Children. List all of your children, regardless of age, location, or marital status.</label>
        </div>
        <div class="col-md-12">
            <div class=" col-md-12">
                <label class="control-label" style="font-size: 12px;">
                    <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> I do not have any children. (Skip to Part A.III., Information about your background.)
                </label>
            </div>
            <div class=" col-md-12">
                <label class="control-label" style="font-size: 12px;">
                    <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> I have children
                </label>
            </div>
        </div>
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" class="form-control" name="alien_registration_number" maxlength="9" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="passport_id_card_number" maxlength="20" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status</label>
                    <input type="text" class="form-control" name="marital_status" maxlength="24" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="social_security_number" maxlength="9" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="complete_last_name" maxlength="29"  name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>"/>
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="first_name" maxlength="20" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" maxlength="20" name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control"  name="i_539_interpreter_given_first_name"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="nationality" maxlength="29"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="20"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="24"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label" style="font-size: smaller;">11. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_12" value="male"> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S. ?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="child_in_us" id="yes_13" value="yes"> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="child_in_us" id="no_13" value="no"> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location_if_not_in_us" maxlength="32"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="place_of_last_entry" maxlength="29"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="date_of_last_entry"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="11"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="20"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="nationality" maxlength="29"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="ethnic_group"  value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                </div>
                <div class="col-md-4 ">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_20" value="male"> <label for="male_20" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_20" value="female"> <label for="female_20" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_485_social_security_status") ?>
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
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" class="form-control" name="alien_registration_number" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="passport_id_card_number" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. 3. Marital Status (Married, Single, Divorced, Widowed)</label>
                    <input type="text" class="form-control" name="marital_status" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="social_security_number" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="complete_last_name" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="first_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="other_names_used" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label" style="font-size: smaller;">11. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_12" value="male"> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S. ?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="child_in_us" id="yes_13" value="yes"> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="child_in_us" id="no_13" value="no"> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location_if_not_in_us">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="place_of_last_entry" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="date_of_last_entry">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-4 ">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_20" value="male"> <label for="male_20" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_20" value="female"> <label for="female_20" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
        </div>
        <hr style="border: 1px solid #729af8 ;" class="my-5">
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" class="form-control" name="alien_registration_number" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="passport_id_card_number" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. 3. Marital Status (Married, Single, Divorced, Widowed)</label>
                    <input type="text" class="form-control" name="marital_status" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="social_security_number" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="complete_last_name" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="first_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="other_names_used" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label" style="font-size: smaller;">11. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_12" value="male"> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S. ?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="child_in_us" id="yes_13" value="yes"> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="child_in_us" id="no_13" value="no"> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location_if_not_in_us">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="place_of_last_entry" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="date_of_last_entry">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-4 ">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_20" value="male"> <label for="male_20" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_20" value="female"> <label for="female_20" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
        </div>
        <hr class="my-5" style="border: 1px solid #729af8;">
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" class="form-control" name="alien_registration_number" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="passport_id_card_number" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. 3. Marital Status (Married, Single, Divorced, Widowed)</label>
                    <input type="text" class="form-control" name="marital_status" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="social_security_number" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="complete_last_name" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="first_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="other_names_used" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label" style="font-size: smaller;">11. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_12" value="male"> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S. ?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="child_in_us" id="yes_13" value="yes"> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="child_in_us" id="no_13" value="no"> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location_if_not_in_us">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="place_of_last_entry" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="date_of_last_entry">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-4 ">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_20" value="male"> <label for="male_20" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_20" value="female"> <label for="female_20" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_485_social_security_status") ?>
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
                        <th>Number and Street(Provide if available)</th>
                        <th>City/Town</th>
                        <th>Department, Province, or State</th>
                        <th>Country</th>
                        <th>Date From (Mo/Yr)</th>
                        <th>Date To (Mo/Yr)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '1') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '1') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '1') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <label class="control-label col-md-12">2. Provide the following information about your residences during the past 5 years. List your present address first. </label>
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
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
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
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
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
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="text" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
                        <td><input type="date" maxlength="21" style="width: 100%; margin: 0;" name="" value="<?php echo showData('', '0') ?>"></td>
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
                        <td> Mother</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="mother_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="mother_current_location" value=""></td>
                        <td><input type="checkbox" name="mother_deceased" id="mother_deceased"><label for="mother_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="mother_current_location" value=""></td>
                    </tr>
                    <tr>
                        <td> Father</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="father_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="father_current_location" value=""></td>
                        <td><input type="checkbox" name="father_deceased" id="father_deceased"><label for="father_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="father_current_location" value=""></td>
                    </tr>
                    <tr>
                        <td> Sibling</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling1_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling1_current_location" value=""></td>
                        <td><input type="checkbox" name="sibling1_deceased" id="sibling1_deceased"><label for="sibling1_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling1_current_location" value=""></td>
                    </tr>
                    <tr>
                        <td> Sibling</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling2_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling2_current_location" value=""></td>
                        <td><input type="checkbox" name="sibling2_deceased" id="sibling2_deceased"><label for="sibling2_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling2_current_location" value=""></td>
                    </tr>
                    <tr>
                        <td> Sibling</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling3_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling3_current_location" value=""></td>
                        <td><input type="checkbox" name="sibling3_deceased" id="sibling3_deceased"><label for="sibling3_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling3_current_location" value=""></td>
                    </tr>
                    <tr>
                        <td> Sibling</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling4_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling4_current_location" value=""></td>
                        <td><input type="checkbox" name="sibling4_deceased" id="sibling4_deceased"><label for="sibling4_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling4_current_location" value=""></td>
                    </tr>
                    <tr>
                        <td> Sibling</td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling5_birth_place" value=""></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling5_current_location" value=""></td>
                        <td><input type="checkbox" name="sibling5_deceased" id="sibling5_deceased"><label for="sibling5_deceased" style="margin-left: 5px;"> Deceased</label></td>
                        <td><input type="text" maxlength="33" style="width: 100%; margin: 0;" name="sibling5_current_location" value=""></td>
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
                <input type="radio" name="biographic_info_hair_color" id="Race" value="Race" <?php echo (showData('biographic_info_hair_color') == 'Race') ? 'checked' : '' ?>> <label for="Race">Race</label><br>
                <input type="radio" name="biographic_info_hair_color" id="Political opinion" value="Political opinion" <?php echo (showData('biographic_info_hair_color') == 'Political opinion') ? 'checked' : '' ?>> <label for="Political opinion">Political opinion</label><br>
                <input type="radio" name="biographic_info_hair_color" id="Religion" value="Religion" <?php echo (showData('biographic_info_hair_color') == 'Religion') ? 'checked' : '' ?>> <label for="Religion">Religion</label><br>
                <input type="radio" name="biographic_info_hair_color" id="Membership in a particular social group" value="Membership in a particular social group" <?php echo (showData('biographic_info_hair_color') == 'Membership in a particular social group') ? 'checked' : '' ?>> <label for="Membership in a particular social group">Membership in a particular social group</label><br>
                <input type="radio" name="biographic_info_hair_color" id="Nationality" value="Nationality" <?php echo (showData('biographic_info_hair_color') == 'Nationality') ? 'checked' : '' ?>> <label for="Nationality">Nationality</label><br>
                <input type="radio" name="biographic_info_hair_color" id="Torture Convention" value="Torture Convention" <?php echo (showData('biographic_info_hair_color') == 'Torture Convention') ? 'checked' : '' ?>> <label for="Torture Convention">Torture Convention</label><br>

            </div>
        </div>
        <hr class="my-5" style="border: 1px solid #729af8;">
        <div class="col-md-12 my-5">
            <label>A. Have you, your family, or close friends or colleagues ever experienced harm or mistreatment or threats in the past by anyone?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <label>If "Yes," explain in detail: </label><br>
            <label>1. What happened; </label><br>
            <label>2. When the harm or mistreatment or threats occurred; </label><br>
            <label>3. Who caused the harm or mistreatment or threats; and </label><br>
            <label>4. Why you believe the harm or mistreatment or threats occurred.</label><br>
            <div class="col-md-12 my-4">
                <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
            </div>
        </div>
        <hr style="border: 1px solid #729af8; margin-top: 10px;">
        <div class="col-md-12 my-5">
            <label>B. Do you fear harm or mistreatment if you return to your home country?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12">
            <label>If "Yes," explain in detail: </label><br>
            <label>1. What harm or mistreatment you fear;</label><br>
            <label>2. Who you believe would harm or mistreat you; and</label><br>
            <label>3. Why you believe you would or could be harmed or mistreated.</label><br>
            <div class="col-md-12">
                <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
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
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain the circumstances and reasons for the action.</label><br>
                <div class="col-md-12 my-4">

                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
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
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe for each person the level of participation, any leadership or other positions held, and the length of time you or your family
                    members were involved in each organization or activity.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>3.B. Do you or your family members continue to participate in any way in these organizations or groups?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe for each person your or your family members' current level of participation, any leadership or other positions currently held,
                    and the length of time you or your family members have been involved in each organization or group.</label><br>
                <div class="col-md-12 my-4">

                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>4. Are you afraid of being subjected to torture in your home country or any other country to which you may be returned?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain why you are afraid and describe the nature of torture you fear, by whom, and why it would be inflicted</label><br>
                <div class="col-md-12 my-4">

                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
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
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain the decision and what happened to any status you, your spouse, your child(ren), your parents, or your siblings received as a
                    result of that decision. Indicate whether or not you were included in a parent or spouse's application. If so, include your parent or spouse's
                    A-number in your response. If you have been denied asylum by an immigration judge or the Board of Immigration Appeals, describe any
                    change(s) in conditions in your country or your own personal circumstances since the date of the denial that may affect your eligibility for
                    asylum.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>2.A. After leaving the country from which you are claiming asylum, did you or your spouse or child(ren) who are now in the United States travel
                    through or reside in any other country before entering the United States?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12 my-5">
                <label>2.B. Have you, your spouse, your child(ren), or other family members, such as your parents or siblings, ever applied for or received any lawful status
                    in any country other than the one from which you are now claiming asylum?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes" to either or both questions (2A and/or 2B), provide for each person the following: the name of each country and the length of stay, the
                    person's status while there, the reasons for leaving, whether or not the person is entitled to return for lawful residence purposes, and whether the
                    person applied for refugee status or for asylum while there, and if not, why he or she did not do so.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>3. Have you, your spouse or your child(ren) ever ordered, incited, assisted or otherwise participated in causing harm or suffering to any person
                    because of his or her race, religion, nationality, membership in a particular social group or belief in a particular political opinion?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe in detail each such incident and your own, your spouse's, or your child(ren)'s involvement.</label><br>
                <div class="col-md-12 my-4">

                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
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
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," describe in detail the circumstances of your visit(s) (for example, the date(s) of the trip(s), the purpose(s) of the trip(s), and the length
                    of time you remained in that country for the visit(s).)</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>5. Are you filing this application more than 1 year after your last arrival in the United States?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," explain why you did not file within the first year after you arrived. You must be prepared to explain at your interview or hearing why
                    you did not file your asylum application within the first year after you arrived. For guidance in answering this question, see Instructions, Part 1:
                    Filing Instructions, Section V. "Completing the Form," Part C.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
                </div>
            </div>
            <hr class="my-5" style="border: 1px solid #729af8;">
        </div>
        <div>
            <div class="col-md-12 my-5">
                <label>6. Have you or any member of your family included in the application ever committed any crime and/or been arrested, charged, convicted, or
                    sentenced for any crimes in the United States (including for an immigration law violation)?</label><br>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-12">
                <label>If "Yes," for each instance, specify in your response: what occurred and the circumstances, dates, length of sentence received, location, the
                    duration of the detention or imprisonment, reason(s) for the detention or conviction, any formal charges that were lodged against you or your
                    relatives included in your application, and the reason(s) for release. Attach documents referring to these incidents, if they are available, or an
                    explanation of why documents are not available.</label><br>
                <div class="col-md-12 my-4">
                    <textarea class="form-control" name="i_485_additional_info_7d" maxlength="357" class="form-control" cols="30" rows="10"><?php echo showData('i_485_additional_info_7d') ?></textarea>
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
                <label class="control-label " style="font-size: 12px;">Print your complete name </label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label " style="font-size: 12px;">Write your name in your native alphabet.</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label>Did your spouse, parent, or child(ren) assist you in completing this application?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12 ">
            <p><b>NOTE : </b>(If "Yes," list the name and relationship.)</p><br>
        </div>
        <div class="col-md-12 ">
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Name)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Relationship)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Name)</p>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <p style="font-size: 12px; text-align: center; font-weight: 600;">(Relationship)</p>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <label>Did someone other than your spouse, parent, or child(ren) prepare this application?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
        </div>
        <div class="col-md-12 ">
            <p><b>NOTE : </b>(If "Yes,"complete Part E.)</p><br>
        </div>
        <div class="col-md-12 my-4">
            <label>Asylum applicants may be represented by counsel. Have you been provided with a list of
                persons who may be available to assist you, at little or no cost, with your asylum claim?</label><br>
            <div>
                <?php echo createRadio("i_485_social_security_status") ?>
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
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
            <label class="control-label " style="font-size: 12px;">Signature of Preparer</label>
            <input type="text" disabled class="form-control" />
        </div>
        <div class="col-md-6">
            <label class="control-label " style="font-size: 12px;">Print Complete Name of Preparer</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-5">
            <label class="control-label " style="font-size: 12px;">Daytime Telephone Number</label>
            <div class="d-flexible">
                <span class="col-md-4 d-flexible"> <b>(</b> <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>"> <b>)</b> </span>
                <span class="col-md-8"><input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>"></span>
            </div>
        </div>
        <div class="col-md-7">
            <label class="control-label " style="font-size: 12px;">Address of Preparer: Street Number and Name</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
    </div>
    <div class="col-md-12 my-5">
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">Apt. Number</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">City</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">State</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-3">
            <label class="control-label " style="font-size: 12px;">Zip Code</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                        <?php echo createCheckbox("i_539_g28_status") ?> Select this box if Form G-28 is attached.
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
                        <?php echo createCheckbox("i_589_all_true_status") ?> all true
                    </label> or <label style="cursor: pointer;">
                        <?php echo createCheckbox("i_589_not_true_status") ?> not all true
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
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                    <label style="cursor: pointer;"><?php echo createCheckbox("i_589_all_true_status") ?> all true</label>
                    or
                    <label style="cursor: pointer;"> <?php echo createCheckbox("i_589_not_true_status") ?> not all true</label>
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
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" class="form-control" name="alien_registration_number" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="passport_id_card_number" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status (Married, Single, Divorced, Widowed)</label>
                    <input type="text" class="form-control" name="marital_status" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="social_security_number" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="complete_last_name" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="first_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="other_names_used" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label" style="font-size: smaller;">11. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_12" value="male"> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S. ?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="child_in_us" id="yes_13" value="yes"> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="child_in_us" id="no_13" value="no"> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location_if_not_in_us">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="place_of_last_entry" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="date_of_last_entry">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-4 ">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_20" value="male"> <label for="male_20" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_20" value="female"> <label for="female_20" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
        </div>
        <hr style="border: 1px solid #729af8 ;" class="my-5">
        <div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" class="form-control" name="alien_registration_number" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                    <input type="text" class="form-control" name="passport_id_card_number" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">3. Marital Status (Married, Single, Divorced, Widowed)</label>
                    <input type="text" class="form-control" name="marital_status" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                    <input type="text" class="form-control" name="social_security_number" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">5. Complete Last Name</label>
                    <input type="text" class="form-control" name="complete_last_name" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">6. First Name</label>
                    <input type="text" class="form-control" name="first_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">7. Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">8. Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="other_names_used" maxlength="43">
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">9. City and Country of Birth </label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">10. Nationality (Citizenship)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">11. Race, Ethnic, or Tribal Group</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label" style="font-size: smaller;">11. Gender</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_12" value="male"> <label for="male_12" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_12" value="female"> <label for="female_12" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">13. Is this child in the U.S. ?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="child_in_us" id="yes_13" value="yes"> <label for="yes_13" style="font-size: smaller;">Yes (Complete Blocks 14 to 21.)</label><br>
                        <input type="radio" name="child_in_us" id="no_13" value="no"> <label for="no_13" style="font-size: smaller;">No (Specify location):</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location_if_not_in_us">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">14. Place of last entry into the U.S.</label>
                    <input type="text" class="form-control" name="place_of_last_entry" maxlength="41" />
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">15. Date of last entry into the U.S. (mm/dd/yyyy)</label>
                    <input type="date" class="form-control" name="date_of_last_entry">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">16. I-94 Number (If any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">17. Status when last admitted (Visa type, if any)</label>
                    <input type="text" class="form-control" name="visa_type" maxlength="43">
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <label class="control-label" style="font-size: smaller;">18. What is your child's current status?</label>
                    <input type="text" class="form-control" name="nationality" maxlength="41" />
                </div>
                <div class="col-md-5">
                    <label class="control-label" style="font-size: smaller;">19. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                    <input type="text" class="form-control" name="ethnic_group" maxlength="43">
                </div>
                <div class="col-md-4 ">
                    <label class="control-label" style="font-size: smaller;">20. Is your child in Immigration Court proceedings?</label><br>
                    <div class="d-flexible">
                        <input type="radio" name="gender" id="male_20" value="male"> <label for="male_20" style="font-size: smaller;">Male</label><br>
                        <input type="radio" name="gender" id="female_20" value="female"> <label for="female_20" style="font-size: smaller;">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="control-label col-md-12" style="font-size: 12px;">21. If in the U.S., is this child to be included in this application? (Check the appropriate box.)</label>
                <div class="col-md-5 col-md-offset-4">
                    <?php echo createRadio("i_485_social_security_status") ?>
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
            <h5><b>NOTE: </b><i>Use this as a continuation page for any additional information requested. Copy and complete as needed</i></h5>
            <hr style="border: 1px solid #729af8 ;" class="my-5">
            <div>
                <div class="form-group">
                    <label class="control-label col-md-12">Part</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="i_192_additional_info_5a_page_no" maxlength="2"
                            value="<?= showData('i_192_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">Part</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="i_192_additional_info_5b_part_no" maxlength="6"
                            value="<?= showData('i_192_additional_info_5b_part_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea name="i_192_additional_info_5d" class="form-control" maxlength="321" cols="30" rows="40"><?= showData('i_192_additional_info_5d') ?></textarea>
                </div>
            </div>

        </div><!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>