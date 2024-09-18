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
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 12</b></p>
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
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">2. U.S. Social Security Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">3. USCIS Online Account Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="34" value="<?php echo showData('i_539_interpreter_business_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">4. Complete Last Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">5. First Name </label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">6. Middle Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="34" value="<?php echo showData('i_539_interpreter_business_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">7. What other names have you used (include maiden name and aliases)?</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">8. Residence in the U.S. (where you physically reside) </label>
                <label class="control-label text-sm ">Street Number and Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Apt. Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <label class="control-label text-sm ">City</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">State</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Zip Code</label>
                <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="34" value="<?php echo showData('i_539_interpreter_business_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Telephone Number</label>
                <div>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="3" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="34" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">8. Residence in the U.S. (where you physically reside) </label>
                <label class="control-label text-sm ">In Care Of (if applicable):</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Telephone Number</label>
                <div>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="3" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control " name="i_539_interpreter_business_name" maxlength="34" value="<?php echo showData('i_539_interpreter_business_name') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-8">
                <label class="control-label text-sm ">Street Number and Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Apt. Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-4">
                <label class="control-label text-sm ">City</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">State</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Zip Code</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-8">
                <label class="control-label text-sm ">13. City and Country of Birth</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <div class="col-md-3">
                <label class="control-label text-sm ">14. Present Nationality (Citizenship)</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">15. Nationality at Birth</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">16. Race, Ethnic, or Tribal Group</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">17. Religion</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label text-sm ">b. What is your current I-94 Number, if any?</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div>
            <label class="control-label col-md-12">c. List each entry into the U.S. beginning with your most recent entry. List date (mm/dd/yyyy), place, and your status for each entry. (Attach additional sheets as needed.)</label>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date Status Expires
                </label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>

            <div class="col-md-3">
                <label class="control-label text-sm ">Date</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Place</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">Status</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div>
            <div class="col-md-5">
                <label class="control-label text-sm ">20. What country issued your last passport or travel document?</label>
                <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label text-sm ">21. Passport Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
                <label class="control-label text-sm ">Travel Document Number</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label text-sm ">22. Expiration Date (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
    </div>
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;"><b>Page 2 of 8</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">1. Alien Registration Number (A-Number) (if any)</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">2. Passport/ID Card Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">3. Date of Birth (mm/dd/yyyy)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">4. U.S. Social Security Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">5. Complete Last Name</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">6. First Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">7. Middle Name</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: smaller;">8. Other names used (include maiden name and aliases)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 d-flexible">
            <div class="col-md-4" style="align-items: center;">
                <label class="control-label " style="font-size: smaller;">12. Nationality (Citizenship)</label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-4" style="align-items: center;">
                <label class="control-label " style="font-size: smaller;">13. Race, Ethnic, or Tribal Group</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
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
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">16. Place of last entry into the U.S. </label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">17. Date of last entry into the U.S. (mm/dd/yyyy) </label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">18. I-94 Number (if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">19. Status when last admitted (Visa type, if any)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>

        <div class="col-md-12 my-4">
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">20. What is your spouse's current status? </label>
                <input type="date" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?php echo showData('i_539_interpreter_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">21. What is the expiration date of his/her authorized stay, if any? (mm/dd/yyyy)</label>
                <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">22. Is your spouse in Immigration Court proceedings?</label>
                <div>
                    <?php echo createRadio("i_485_social_security_status") ?>
                </div>
            </div>
            <div class="col-md-3">
                <label class="control-label " style="font-size: 12px;">23. If previously in the U.S., date of previous arrival (mm/dd/yyyy)</label>
                <input type="date" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?php echo showData('i_539_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12">
            <label class="control-label col-md-12" style="font-size: 12px;">24. If in the U.S., is your spouse to be included in this application? (Check the appropriate box.)</label>
            <div class="col-md-5 col-md-offset-4">
                <?php echo createRadio("i_485_social_security_status") ?>
            </div>
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
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;"><b>Page 3 of 8</b></p>
    <div class="row"></div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 8</b></p>
    <div class="row">

    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
----------------------------------------------------------------------->

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
----------------------------------------------------------------------->


<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>

<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">

    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>