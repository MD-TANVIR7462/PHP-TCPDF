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
</style>
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
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







    </div>
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

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
                        <b>1.a. </b> <?php echo createCheckbox("i_864a_intending_immigrant_status") ?> I am the intending immigrant and also the sponsor's spouse.
                    </div>
                </label>
            </div>
            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.b. </b> <?php echo createCheckbox("i_864a_intending_immigrant_household_status") ?> I am the intending immigrant and also a member of the sponsor's household.
                    </div>
                </label>
            </div>
            <div class="form-group">

                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>1.c. </b> <?php echo createCheckbox("i_864a_not_a_intending_immigrant_status") ?> I am not the intending immigrant. I am the sponsor's household member. I am related to the sponsor as his/her:
                    </div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_spouse_status") ?> Spouse</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_son_or_daughter_status") ?> Son or Daughter (at least 18 years of age)</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_parent_status") ?> Parent</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_brother_sister_status") ?> Brother or Sister</div>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10 col-md-offset-2">
                    <div class="d-flexible"> <?php echo createCheckbox("i_864a_other_dependent_status") ?> Other Dependent (Specify)</div>
                </label>
                <div class="col-md-10 col-md-offset-2">
                    <input type="text" class="form-control" name="i_864a_other_dependent_value" maxlength="29" value="<?php echo showData('i_864a_other_dependent_value') ?>">
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
                        <b>1. </b> <?php echo createCheckbox("i_864a_employed_status") ?> Employed as a/an
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_employed_value" maxlength="34" value="<?php echo showData('i_864a_employed_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>2.</b><span class="mx-5">Name of Employer Number 1</span>
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_employer_name1" maxlength="34" value="<?php echo showData('i_864a_employer_name1') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>3.</b><span class="mx-5">Name of Employer Number 2 (if applicable)</span>
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_employer_name2" maxlength="34" value="<?php echo showData('i_864a_employer_name2') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>4. </b> <?php echo createCheckbox("i_864a_selfemployed_status") ?> Self employed as a/an
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_selfemployed_value" maxlength="34" value="<?php echo showData('i_864a_selfemployed_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>5. </b> <?php echo createCheckbox("i_864a_retired_status") ?> Retired from (Company Name)
                    </div>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_retired_company" maxlength="34" value="<?php echo showData('i_864a_retired_company') ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-offset-2">
                    <label class="control-label col-md-6">Since (mm/dd/yyyy)</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="i_864a_retired_date" value="<?php echo showData('i_864a_retired_date') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        6. <?php echo createCheckbox("i_864a_unemployed_status") ?> Unemployed since (mm/dd/yyyy)
                    </div>
                </label>
                <div class="col-md-6 col-md-offset-6">
                    <input type="date" class="form-control" name="i_864a_unemployed_date" value="<?php echo showData('i_864a_unemployed_date') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        7. <span class="mx-4">My current individual annual income is:</span>
                    </div>
                </label>
                <div class="col-md-7 col-md-offset-5 d-flexible">
                    <b>$</b> <input type="text" class="form-control" name="i_864a_individual_annual_income" maxlength="16" value="<?php echo showData('i_864a_individual_annual_income') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 4. Your (the Household Member's) Federal Income Tax Information and Assets</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Have you filed a Federal income tax return for each of the
                    three most recent tax years?</label>
                <div class="col-md-4 col-md-offset-8">
                    <?php echo createRadio("i_864a_income_tax_return_status") ?>
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
                        <b>1.b. </b> <?php echo createCheckbox("i_864a_attached_photocopies_status") ?> (Optional) I have attached photocopies or transcripts of
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
                        <input type="text" class="form-control" name="i_864a_tax_year1" maxlength="4" value="<?php echo showData('i_864a_tax_year1') ?>">
                    </div>
                    <div class="col-md-4">
                        <p style="text-align: center;"><b>Total Income</b></p>
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_total_income1" maxlength="13" value="<?php echo showData('i_864a_total_income1') ?>"></span>
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-md-4">
                        <label>
                            <p>2.b. 2nd Most Recent </p>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="i_864a_tax_year2" maxlength="4" value="<?php echo showData('i_864a_tax_year2') ?>">
                    </div>
                    <div class="col-md-4">
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_total_income2" maxlength="13" value="<?php echo showData('i_864a_total_income2') ?>"></span>
                    </div>
                </div>
                <div class="row" style="display: flex; align-items: center;">
                    <div class="col-md-4">
                        <label>
                            <p>2.c. 3rd Most Recent </p>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="i_864a_tax_year3" maxlength="4" value="<?php echo showData('i_864a_tax_year3') ?>">
                    </div>
                    <div class="col-md-4">
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_total_income3" maxlength="13" value="<?php echo showData('i_864a_total_income3') ?>"></span>
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
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_balance_saving_accounts" maxlength="18" value="<?php echo showData('i_864a_balance_saving_accounts') ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.b.</b><span class="mx-5">Enter the net cash value of real-estate holdings. (Net value means assessed value minus mortgage debt.)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_real_estate_holdings" maxlength="18" value="<?php echo showData('i_864a_real_estate_holdings') ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.c.</b><span class="mx-5">Enter the cash value of all stocks, bonds, certificates of deposit, and other assets not listed on Item Numbers 3.a. or 3.b.</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_cash_value_stocks" maxlength="18" value="<?php echo showData('i_864a_cash_value_stocks') ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label ">
                        <div class="d-flexible">
                            <b>3.d.</b><span class="mx-5">Add together Item Numbers 3.a., 3.b., and 3.c. and enter the number here.</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5">
                        <span class="d-flexible">$<input type="text" class="form-control" name="i_864a_add_together_item_numbers" maxlength="18" value="<?php echo showData('i_864a_add_together_item_numbers') ?>"></span>
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
                    <input type="text" class="form-control" name="i_864a_the_sponsor_name" maxlength="42" value="<?php echo showData('i_864a_the_sponsor_name') ?>">
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
                    <input type="text" class="form-control" name="i_864a_the_sponsor_indicate_number" maxlength="42" value="<?php echo showData('i_864a_the_sponsor_indicate_number') ?>">
                </div>
                <p style="text-align: center;"><b>(Indicate Number)</b></p>
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
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature (continued)</b></h4>
            </div>

            <div>
                <div class="form-group">
                    <p><b>Intending Immigrant Number 1</b></p>
                </div>
                <div class="form-group">
                    <p><b>Name</b></p>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant1_family_last_name" value="<?php echo showData('i_864a_immigrant1_family_last_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant1_given_first_name" value="<?php echo showData('i_864a_immigrant1_given_first_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">1.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant1_middle_name" value="<?php echo showData('i_864a_immigrant1_middle_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>2.</b><span class="mx-5">Date of Birth (mm/dd/yyyy)</span>
                        </div>
                    </label>
                    <div class="col-md-6 col-md-offset-6">
                        <input type="date" class="form-control" name="i_864a_immigrant1_date_of_birth" value="<?php echo showData('i_864a_immigrant1_date_of_birth') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>3.</b><span class="mx-5">Alien Registration Number (A-Number, if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►A</b></span> <input type="text" class="form-control" name="i_864a_immigrant1_alien_registration_number" maxlength="9" value="<?php echo showData('i_864a_immigrant1_alien_registration_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>4.</b><span class="mx-5">U.S. Social Security Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►</b></span><input type="text" class="form-control" name="i_864a_immigrant1_social_security_number" maxlength="9" value="<?php echo showData('i_864a_immigrant1_social_security_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>5.</b><span class="mx-5">USCIS Online Account Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-8 col-md-offset-4 d-flexible">
                        <span><b>►</b></span> <input type="text" class="form-control" name="i_864a_immigrant1_online_account_number" maxlength="12" value="<?php echo showData('i_864a_immigrant1_online_account_number') ?>">
                    </div>
                </div>
            </div>

            <div>
                <div class="form-group">
                    <p><b>Intending Immigrant Number 2</b></p>
                </div>
                <div class="form-group">
                    <p><b>Name</b></p>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant2_family_last_name" value="<?php echo showData('i_864a_immigrant2_family_last_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant2_given_first_name" value="<?php echo showData('i_864a_immigrant2_given_first_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant2_middle_name" value="<?php echo showData('i_864a_immigrant2_middle_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>7.</b><span class="mx-5">Date of Birth (mm/dd/yyyy)</span>
                        </div>
                    </label>
                    <div class="col-md-6 col-md-offset-6">
                        <input type="date" class="form-control" name="i_864a_immigrant2_date_of_birth" value="<?php echo showData('i_864a_immigrant2_date_of_birth') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>8.</b><span class="mx-5">Alien Registration Number (A-Number, if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►A</b></span> <input type="text" class="form-control" name="i_864a_immigrant2_alien_registration_number" maxlength="9" value="<?php echo showData('i_864a_immigrant2_alien_registration_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>9.</b><span class="mx-5">U.S. Social Security Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►</b></span><input type="text" class="form-control" name="i_864a_immigrant2_social_security_number" maxlength="9" value="<?php echo showData('i_864a_immigrant2_social_security_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>10.</b><span class="mx-5">USCIS Online Account Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-8 col-md-offset-4 d-flexible">
                        <span><b>►</b></span> <input type="text" class="form-control" name="i_864a_immigrant2_online_account_number" maxlength="12" value="<?php echo showData('i_864a_immigrant2_online_account_number') ?>">
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <p><b>Intending Immigrant Number 3</b></p>
                </div>
                <div class="form-group">
                    <p><b>Name</b></p>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">11.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant3_family_last_name" value="<?php echo showData('i_864a_immigrant3_family_last_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">11.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant3_given_first_name" value="<?php echo showData('i_864a_immigrant3_given_first_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">11.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant3_middle_name" value="<?php echo showData('i_864a_immigrant3_middle_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>12.</b><span class="mx-5">Date of Birth (mm/dd/yyyy)</span>
                        </div>
                    </label>
                    <div class="col-md-6 col-md-offset-6">
                        <input type="date" class="form-control" name="i_864a_immigrant3_date_of_birth" value="<?php echo showData('i_864a_immigrant3_date_of_birth') ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>13.</b><span class="mx-5">Alien Registration Number (A-Number, if any)</span>
                    </div>
                </label>
                <div class="col-md-7 col-md-offset-5 d-flexible">
                    <span><b>►A</b></span> <input type="text" class="form-control" name="i_864a_immigrant3_alien_registration_number" maxlength="9" value="<?php echo showData('i_864a_immigrant3_alien_registration_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>14.</b><span class="mx-5">U.S. Social Security Number (if any)</span>
                    </div>
                </label>
                <div class="col-md-7 col-md-offset-5 d-flexible">
                    <span><b>►</b></span><input type="text" class="form-control" name="i_864a_immigrant3_social_security_number" maxlength="9" value="<?php echo showData('i_864a_immigrant3_social_security_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <div class="d-flexible">
                        <b>15.</b><span class="mx-5">USCIS Online Account Number (if any)</span>
                    </div>
                </label>
                <div class="col-md-8 col-md-offset-4 d-flexible">
                    <span><b>►</b></span> <input type="text" class="form-control" name="i_864a_immigrant3_online_account_number" maxlength="12" value="<?php echo showData('i_864a_immigrant3_online_account_number') ?>">
                </div>
            </div>


            <div>
                <div class="form-group">
                    <p><b>Intending Immigrant Number 4</b></p>
                </div>
                <div class="form-group">
                    <p><b>Name</b></p>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant4_family_last_name" value="<?php echo showData('i_864a_immigrant4_family_last_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant4_given_first_name" value="<?php echo showData('i_864a_immigrant4_given_first_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant4_middle_name" value="<?php echo showData('i_864a_immigrant4_middle_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>17.</b><span class="mx-5">Date of Birth (mm/dd/yyyy)</span>
                        </div>
                    </label>
                    <div class="col-md-6 col-md-offset-6">
                        <input type="date" class="form-control" name="i_864a_immigrant4_date_of_birth" value="<?php echo showData('i_864a_immigrant4_date_of_birth') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>18.</b><span class="mx-5">Alien Registration Number (A-Number, if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►A</b></span> <input type="text" class="form-control" name="i_864a_immigrant4_alien_registration_number" maxlength="9" value="<?php echo showData('i_864a_immigrant4_alien_registration_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>19.</b><span class="mx-5">U.S. Social Security Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►</b></span><input type="text" class="form-control" name="i_864a_immigrant4_social_security_number" maxlength="9" value="<?php echo showData('i_864a_immigrant4_social_security_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>20.</b><span class="mx-5">USCIS Online Account Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-8 col-md-offset-4 d-flexible">
                        <span><b>►</b></span> <input type="text" class="form-control" name="i_864a_immigrant4_online_account_number" maxlength="12" value="<?php echo showData('i_864a_immigrant4_online_account_number') ?>">
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <p><b>Intending Immigrant Number 5</b></p>
                </div>
                <div class="form-group">
                    <p><b>Name</b></p>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">21.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant5_family_last_name" value="<?php echo showData('i_864a_immigrant5_family_last_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">21.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant5_given_first_name" value="<?php echo showData('i_864a_immigrant5_given_first_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">21.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="i_864a_immigrant5_middle_name" value="<?php echo showData('i_864a_immigrant5_middle_name') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>22.</b><span class="mx-5">Date of Birth (mm/dd/yyyy)</span>
                        </div>
                    </label>
                    <div class="col-md-6 col-md-offset-6">
                        <input type="date" class="form-control" name="i_864a_immigrant5_date_of_birth" value="<?php echo showData('i_864a_immigrant5_date_of_birth') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>23.</b><span class="mx-5">Alien Registration Number (A-Number, if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►A</b></span> <input type="text" class="form-control" name="i_864a_immigrant5_alien_registration_number" maxlength="9" value="<?php echo showData('i_864a_immigrant5_alien_registration_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>24.</b><span class="mx-5">U.S. Social Security Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-7 col-md-offset-5 d-flexible">
                        <span><b>►</b></span><input type="text" class="form-control" name="i_864a_immigrant5_social_security_number" maxlength="9" value="<?php echo showData('i_864a_immigrant5_social_security_number') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">
                        <div class="d-flexible">
                            <b>25.</b><span class="mx-5">USCIS Online Account Number (if any)</span>
                        </div>
                    </label>
                    <div class="col-md-8 col-md-offset-4 d-flexible">
                        <span><b>►</b></span> <input type="text" class="form-control" name="i_864a_immigrant5_online_account_number" maxlength="12" value="<?php echo showData('i_864a_immigrant5_online_account_number') ?>">
                    </div>
                </div>
            </div>

            <div class="bg-info">
                <h4><b><i>Sponsor's Statement</i></b></h4>
            </div>

            <div class="form-group">
                <p>
                    <b>NOTE:</b> Select the box for either <b>Item Number 26.a</b>. or <b>26.b</b>.
                    If applicable, select the box for <b>Item Number 27</b>.
                </p>

            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <span class="d-flexible">
                        <b>26.a. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>I can read and understand English, and I have read
                        and understand every question and instruction on this
                        contract and my answer to every question.
                    </span>
                </label>
            </div>
        </div>
    </div>

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
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature (continued)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>26.b. </b> <?php echo createCheckbox("i_864a_the_interpreter_named_in_status") ?> The interpreter named in Part 7. read to me every question and instruction on this contract and my answer to every question in</p>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_named_in" maxlength="28" value="<?php echo showData('i_864a_the_interpreter_named_in') ?>"><b>a language in which I am fluent, and I understood everything.</b>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>27. </b> <?php echo createCheckbox("i_864a_the_preparer_named_in_status") ?> At my request, the preparer named in Part 8., </p>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_preparer_named_in" maxlength="28" value="<?php echo showData('i_864a_the_preparer_named_in') ?>"><b>prepared this contract for me based only upon information I provided or authorized. </b>
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">28. Sponsor's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864a_sponsor_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_sponsor_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">29. Sponsor's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_sponsor_mobile" maxlength="10" value="<?php echo showData('i_864a_sponsor_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">30. Sponsor's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_864a_sponsor_email" maxlength="41" value="<?php echo showData('i_864a_sponsor_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Declaration and Certification</i></b></h4>
            </div>
            <p class="form-group">
                <b>
                    Copies of any documents I have submitted are exact
                    photocopies of unaltered, original documents, and I understand
                    that U.S. Citizenship and Immigration Services (USCIS) or the
                    U.S. Department of State (DOS) may require that I submit
                    original documents to USCIS or DOS at a later date.
                    Furthermore, I authorize the release of any information from
                    any and all of my records that USCIS or DOS may need to
                    determine my eligibility for the immigration benefit that I seek. <br><br>
                    I furthermore authorize release of information contained in this
                    contract, in supporting documents, and in my USCIS or DOS
                    records, to other entities and persons where necessary for the
                    administration and enforcement of U.S. immigration law. <br><br>
                    I certify, under penalty of perjury, that all of the information in
                    my contract and any document submitted with it were provided
                    or authorized by me, that I reviewed and understand all of the
                    information contained in, and submitted with, my contract and
                    that all of this information is complete, true, and correct.
                </b>
            </p>
            <div class="bg-info">
                <h4><b><i>Sponsor's Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">31.a. Sponsor's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">31.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_864a_sponsor_sign_date" value="<?php echo showData('i_864a_sponsor_sign_date') ?>" />
                </div>
            </div>
            <p class="form-group">
                <b> NOTE TO ALL SPONSORS:</b>If you do not completely fill out this contract or fail to submit required documents listed in the Instructions, USCIS may deny your contract.
            </p>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Your (the Household Member's) Promise, Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            </div>
            <p class="form-group">
                <b> NOTE:</b>Read the <b>Penalties</b> section of the Form I-864A Instructions before completing this part.
            </p>
            <div class="form-group">
                <label>I, THE HOUSEHOLD MEMBER, </label>
                <div>
                    <input type="text" class="form-control" name="i_864a_the_household_member_print_name" maxlength="42" value="<?php echo showData('i_864a_the_household_member_print_name') ?>">
                </div>
                <p style="text-align: center;"><b>(Print Name)</b></p>
            </div>
            <div class="form-group">
                <label>in consideration of the sponsor's promise to complete and file an affidavit of support on behalf of the above named intending immigrants.</label>
                <div>
                    <input type="text" class="form-control" name="i_864a_the_consideration_of_sponsor" maxlength="42" value="<?php echo showData('i_864a_the_consideration_of_sponsor') ?>">
                </div>
                <label>(Print number of intending immigrants noted in Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification and Signature.)</label>
            </div>
            <p class="form-group">
                <span class="d-flexible my-5"><b>A.</b>
                    <span>
                        Promise to provide any and all financial support
                        necessary to assist the sponsor in maintaining the
                        sponsored immigrants at or above the minimum
                        income provided for in the Immigration and
                        Naturalization Act (INA) section 213A(a)(1)(A)
                        (not less than 125 percent of the Federal Poverty
                        Guidelines) during the period in which the affidavit
                        of support is enforceable;
                    </span>
                </span>
                <span class="d-flexible my-5"><b>B.</b>
                    <span>
                        Agree to be jointly and severally liable for payment
                        of any and all obligations owed by the sponsor
                        under the affidavit of support to the sponsored
                        immigrants, to any agency of the Federal
                        Government, to any agency of a state or local
                        government, or to any other private entity that
                        provides means-tested public benefits;
                    </span>
                </span>
                <span class="d-flexible my-5"><b>C.</b>
                    <span>
                        Certify under penalty under the laws of the United
                        States that the Federal income tax returns submitted
                        in support of the contract are true copies or
                        unaltered tax transcripts filed with the Internal
                        Revenue Service;
                    </span>
                </span>
                <span class="d-flexible my-5"><b>D.</b>
                    <span>
                        <b> Consideration where the household member is also
                            the sponsored immigrant:</b> I understand that if I am
                        the sponsored immigrant and a member of the sponsor's
                        household that this promise relates only to my promise
                        to be jointly and severally liable for any obligation
                        owed by the sponsor under the affidavit of support to
                        any of my dependents, to any agency of the Federal
                        Government, to any agency of a state or local
                        government, or to any other private entity that provides
                        means-tested public benefits and to provide any and all
                        financial support necessary to assist the sponsor in
                        maintaining any of my dependents at or above the
                        minimum income provided for in INA section 213A(a)
                        (1)(A) (not less than 125 percent of the Federal Poverty
                        Guideline) during the period which the affidavit of
                        support is enforceable.
                    </span>
                </span>
            </p>
        </div>
    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 5 of 8</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Your (the Household Member's) Promise, Statement, Contact Information, Declaration, Certification, and Signature (continued)</b></h4>
            </div>
            <p class="form-group">
                <span class="d-flexible my-5"><b>E.</b>
                    <span>
                        I understand that, if I am related to the sponsored
                        immigrant or the sponsor by marriage, the
                        termination of the marriage (by divorce, dissolution,
                        annulment, or other legal process) will not relieve
                        me of my obligations under this Form I-864A.
                    </span>
                </span>
                <span class="d-flexible my-5"><b>F.</b>
                    <span>
                        I authorize the Social Security Administration to
                        release information about me in its records to the
                        Department of State and U.S. Citizenship and
                        Immigration Services (USCIS).
                    </span>
                </span>
            </p>
            <div class="bg-info">
                <h4><b><i>Your (the Household Member's) Statement</i></b></h4>
            </div>
            <p class="form-group">
                <b>NOTE:</b> Select the box for either Item Number 1.a. or 1.b.
                If applicable, select the box for Item Number 2.
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>1.a. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status2") ?>I can read and understand English, and I have read
                        and understand every question and instruction on this
                        contract and my answer to every question.</p>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>1.b. </b> <?php echo createCheckbox("i_864a_the_interpreter_name_status") ?> The interpreter named in Part 7. read to me every
                        question and instruction on this contract and my
                        answer to every question in </p>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_interpreter_name_in2" maxlength="28" value="<?php echo showData('i_864a_the_interpreter_name_in2') ?>"><b>a language in which I am fluent, and I understood
                        everything. </b>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <p class="d-flexible"><b>2. </b> <?php echo createCheckbox("i_864a_the_preparer_named_in2_status") ?> At my request, the preparer named in Part 8., </p>
                </label>
                <div class="col-md-11 col-md-offset-1">
                    <input type="text" class="form-control" name="i_864a_the_preparer_named_in2" maxlength="28" value="<?php echo showData('i_864a_the_preparer_named_in2') ?>"><b>prepared this contract for me based only upon
                        information I provided or authorized.</b>
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Your (the Household Member's) Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Your (the Household Member's) Daytime Telephone
                    Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864a_household_member_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_household_member_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Your (the Household Member's) Mobile Telephone
                    Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_household_member_mobile" maxlength="10" value="<?php echo showData('i_864a_household_member_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Your (the Household Member's) Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_864a_household_member_email" maxlength="41" value="<?php echo showData('i_864a_household_member_email') ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="bg-info">
                <h4><b><i>Your (the Household Member's) Declaration and
                            Certification</i></b></h4>
            </div>
            <p class="form-group">
                <b>
                    Copies of any documents I have submitted are exact
                    photocopies of unaltered, original documents, and I understand
                    that USCIS or DOS may require that I submit original
                    documents to USCIS or DOS at a later date. Furthermore, I
                    authorize the release of any information from any and all of my
                    records that USCIS or DOS may need to determine my
                    eligibility for the immigration benefit that I seek. <br><br>
                    I furthermore authorize release of information contained in this
                    contract, in supporting documents, and in my USCIS or DOS
                    records, to other entities and persons where necessary for the
                    administration and enforcement of U.S. immigration law.<br><br>
                    I certify, under penalty of perjury, that all of the information in
                    my contract and any document submitted with it were provided
                    or authorized by me, that I reviewed and understand all of the
                    information contained in, and submitted with, my contract and
                    that all of this information is complete, true, and correct.
                </b>
            </p>
            <div class="bg-info">
                <h4><b><i>Your (the Household Member's) Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Your (the Household Member's) Printed Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_household_member_printed_name" value="<?php echo showData('i_864a_household_member_printed_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Your (the Household Member's) Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.c. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_864a_household_member_sign_date" value="<?php echo showData('i_864a_household_member_sign_date') ?>" />
                </div>
            </div>
            <p class="form-group">
                <b>NOTE TO ALL HOUSEHOLD MEMBERS:</b>If you do not
                completely fill out this contract or fail to submit required
                documents listed in the Instructions, USCIS may deny your
                contract.
            </p>
            <div class="bg-info">
                <h4><b>Part 7. Interpreter's Contact Information, Certification, and Signature</b> </h4>
            </div>
            <h5><b>Provide the following information about the interpreter.</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_864a_interpreter_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_864a_interpreter_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_interpreter_business_name" maxlength="39" value="<?php echo showData('i_864a_interpreter_business_name') ?>" />
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
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
                        <input type="radio" name="i_864a_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_864a_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864a_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_864a_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864a_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_864a_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>Flr.
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
                        } ?>
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
                    <input type="text" class="form-control  " name="i_864a_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_interpreter_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_interpreter_mobile" maxlength="10" value="<?php echo showData('i_864a_interpreter_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_864a_interpreter_email" maxlength="41" value="<?php echo showData('i_864a_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864a_interpreter_fluent_in_english" maxlength="20" value="<?php echo showData('i_864a_interpreter_fluent_in_english') ?>">
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
                    <input type="text" class="form-control" name="i_864a_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_864a_preparer_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_864a_preparer_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_business_name" maxlength="39" value="<?php echo showData('i_864a_preparer_business_name') ?>" />
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
                    <input type="text" class="form-control" name="i_864a_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_mobile" maxlength="10" value="<?php echo showData('i_864a_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="41" name="i_864a_preparer_email" value="<?php echo showData('i_864a_preparer_email') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

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
                <div class="col-md-2">
                    <b>7.b. </b> <?php echo createCheckbox("i_864a_i_am_an_attorney_accredited_representative_status") ?>
                </div>
                <div class="col-md-10">
                    <p>I am an attorney or accredited representative and my
                        representation of the sponsor and household member
                        in this case
                    </p>
                </div>

            </label>
            <div class="col-md-10 col-md-offset-2 ">
                <label class="from-control">
                    <div class="form-group">
                        <?php echo createCheckbox("i_864a_extends_status") ?> <span id="extend">extends</span>
                    </div>
                </label>
                <label class="from-control">
                    <div class="form-group">
                        <?php echo createCheckbox("i_864a_does_not_extends_status") ?> does not extend beyond the preparation of this contract.
                    </div>
                </label>
            </div>


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
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right;  margin-right: 25px;"><b>Page 8 of 8</b></p>
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
                    <textarea name="i_864a_additional_info_3d" class="form-control" maxlength="342" cols="30" rows="10"><?php echo showData('i_864a_additional_info_3d') ?></textarea>
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
                    <textarea name="i_864a_additional_info_5d" class="form-control" maxlength="342" cols="30" rows="10"><?php echo showData('i_864a_additional_info_5d') ?></textarea>
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
                    <textarea name="i_864a_additional_info_6d" class="form-control" maxlength="342" cols="30" rows="10"><?php echo showData('i_864a_additional_info_6d') ?></textarea>
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
                    <textarea class="form-control" name="i_864a_additional_info_7d" maxlength="342" class="form-control" cols="30" rows="10"><?php echo showData('i_864a_additional_info_7d') ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>