<?php
$meta_title 	=   "INTAKE FOR FORM I-90";
$page_heading 	=   " Application to Replace Permanent Resident Card";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 1 of 7</p>
            </b>
        </div>


    </div>
    <div class="row  mt-3 border-add">
        <div class="col-md-6 container border-add ">
            <div class="bg-info">
                <h4><b>Part 1. Information About You</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">1. Alien Registration Number (A-Number) :
                </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">A-</span><input type="text" class="form-control" maxlength="9"
                            name="" value="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. USCIS Online Account Number (if any) </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control" name=""
                            maxlength="12" value="">
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-info">
                    <h4><b>Your Full Name</b> </h4>
                </div>

                <label>
                    <p><b>NOTE:</b> Your card will be issued in this name.</p>
                </label>
                <div class="form-group">
                    <label class="control-label col-md-5">3.a. Family Name(Last Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">3.b. Given Name(First Name)</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">3.c. Middle Name</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name=""
                            value="<?php echo showData('')?>" />
                    </div>
                </div>
                <label>
                    <p>4. Has your name legally changed since the issuance of your Permanent Resident Card?</p>
                </label>

                <div class="d-flexible ">
                    <input type="hidden" name="" id="" value="<?php echo (showData('') == 'Y') ? 'Y' : 'N'; ?>" />
                    <input type="checkbox" <?php echo (showData('') == 'Y') ? 'checked' : ''; ?>>
                    <p><b>Yes (Proceed to Item Numbers 5.a. - 5.c.)</b></p>
                </div>
                <div class="d-flexible ">
                    <input type="hidden" name="" id="" value="<?php echo (showData('') == 'Y') ? 'Y' : 'N'; ?>" />
                    <input type="checkbox" <?php echo (showData('') == 'Y') ? 'checked' : ''; ?>>
                    <p><b>No (Proceed to Item Numbers 6.a. - 6.i.)</b></p>
                </div>
                <div class="d-flexible ">
                    <input type="hidden" name="" id="" value="<?php echo (showData('') == 'Y') ? 'Y' : 'N'; ?>" />
                    <input type="checkbox" <?php echo (showData('') == 'Y') ? 'checked' : ''; ?>>
                    <p><b>N/A - I never received my previous card. (Proceed to Item Numbers 6.a. - 6.i.)</b></p>
                </div>
            </div>



            <label>
                <p>Provide your name exactly as it is printed on your current Permanent Resident Card</p>
            </label>
            <label>
                <p>NOTE: Attach all evidence of your legal name change with this application.</p>
            </label>
            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
        </div>


        <div class="col-md-6 mt-5">

            <div class="bg-info">
                <h4><b> Mailing Address</b>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="28" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>6.c. </b> &nbsp;
                    <input type="radio" name="" value="apt" <?php echo (showData('') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="" value="ste" <?php echo (showData('') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="" value="flr" <?php echo (showData('') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="" maxlength="6" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="bg-info">
                <h4><b> Physical Address </b>
                </h4>
            </div>
            <label>Provide this information only if different than mailing address.</label>
            <div class="form-group">
                <label class="control-label col-md-5">7.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>7.b. </b> &nbsp;
                    <input type="radio" name="" value="apt" <?php echo (showData('') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="" value="ste" <?php echo (showData('') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="" value="flr" <?php echo (showData('') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="" maxlength="6" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>




        </div>
    </div>
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 2 of 7</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b> Part 1. Information About You (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b> Additional Information</b></h4>
            </div>

            <div class="form-group" style="padding-left:10px;">
                <div class="control-label">
                    <b>8. Gender </b> &nbsp;
                    <input type="radio" name="" value="male" <?php echo (showData('')=='male') ? 'checked' : '' ?>> Male
                    &nbsp;
                    <input type="radio" name="" value="female" <?php echo (showData('')=='female') ? 'checked' : '' ?>>
                    Female &nbsp;
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-6">9. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10. City/Town/Village of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">11. Country of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?= showData('')?>">
                </div>
            </div>

            <label>Mother's Name </label>
            <div class="form-group">
                <label class="control-label col-md-5">12. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <label>Father's Name </label>
            <div class="form-group">
                <label class="control-label col-md-5">13. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">14. Class of Admission </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-5">15. Date of Admission (mm/dd/yyyy)</label>
                <p>
                <div class="col-md-7">
                    <input type="date" class="form-control" maxlength="" name="" value="<?= showData('')?>">
                </div>
                </p>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">16. U.S. Social Security Number (if any)</label>
                <p>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="" name="" value="<?= showData('')?>">
                </div>
                </p>
            </div>


            <div class="bg-info">
                <h4><b> Part 2. Application Type</b></h4>
            </div>

            <p><b>NOTE: </b>If your conditional permanent resident status (for
                example: CR1, CR2, CF1, CF2) is expiring within the next 90
                days, then do not file this application. (See the What is the
                Purpose of This Application section of the Form I-90
                Instructions for further information.)</p>
            <br>
            <p>My status is (Select <b>only one</b> box):</p>
            <br>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("")?>
                <p>Lawful Permanent Resident (Proceed to Section A.)
                </p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.b.</b>
                <?php echo createCheckbox("")?>
                <p>Permanent Resident - In Commuter Status
                    (Proceed to Section A.)
                </p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.c.</b>
                <?php echo createCheckbox("")?>
                <p>Conditional Permanent Resident
                    (Proceed to Section B.)
                </p>
            </div>
        </div>

        <!-- left side end -->
        <div class="col-md-6">

            <div class="bg-info">
                <h4><b> Reason for Application (Select only one box)</b></h4>
            </div>

            <p><b>Section A. </b>(To be used only by a lawful permanent resident or
                a permanent resident in commuter status.)</p>


            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.a.</b>
                <?php echo createCheckbox("")?>
                <p>My previous card has been lost, stolen, or destroyed.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.b.</b>
                <?php echo createCheckbox("")?>
                <p>My previous card was issued but never received.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.c.</b>
                <?php echo createCheckbox("")?>
                <p>My existing card has been mutilated.</p>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.d.</b>
                <?php echo createCheckbox("")?>
                <p>My existing card has incorrect data because of
                    Department of Homeland Security (DHS) error.
                    (Attach your existing card with incorrect data along
                    with this application.)</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.e.</b>
                <?php echo createCheckbox("")?>
                <p>My name or other biographic information has been legally changed since issuance of my existing card.
                </p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.f.</b>
                <?php echo createCheckbox("")?>
                <p>My existing card has already expired or will expire within six months.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.g.1.</b>
                <?php echo createCheckbox("")?>
                <p>I have reached my 14th birthday and am registering as required. My existing card will expire AFTER my
                    16th birthday. (See NOTE below for additional information.)</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.g.2.</b>
                <?php echo createCheckbox("")?>
                <p>I have reached my 14th birthday and am registering
                    as required. My existing card will expire BEFORE
                    my 16th birthday. (See NOTE below for additional
                    information.)</p>
            </div>

            <p><b>NOTE:</b> If you are filing this application before your
                14th birthday, or more than 30 days after your 14th
                birthday, you must select reason 2.j. However, if
                your card has expired, you must select reason 2.f.
            </p>
            <br>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.h.1.</b>
                <?php echo createCheckbox("")?>
                <p>I am a permanent resident who is taking up commuter
                    status. </p>
            </div>

            <span>
                <div class="d-flexible" style="padding-bottom:5px;">
                    <b>2.h.1.a.</b>
                    <?php echo createCheckbox("")?>
                    <p>My Port-of-Entry (POE) into the United States will be:</p>

                </div>
                <div class="form-group">
                    <label class="control-label col-md-10" style="padding-left:50px;">City or Town and State</label>
                    <div class="col-md-10" style="padding-left:50px;">
                        <input type="text" maxlength="" class="form-control" name=""
                            value="<?php echo showData('')?>" />
                    </div>
                </div>

            </span>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.h.2.</b>
                <?php echo createCheckbox("")?>
                <p>I am a commuter who is taking up actual residence in the United States.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.i.</b>
                <?php echo createCheckbox("")?>
                <p>I have been automatically converted to lawful permanent resident status.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>2.j.</b>
                <?php echo createCheckbox("")?>
                <p>I have a prior edition of the Alien Registration Card, or I am applying to replace my current
                    Permanent Resident Card for a reason that is not specified above.</p>
            </div>

        </div>
    </div>




    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 3 of 7</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Application Type (continued)</b>
                </h4>
            </div>
            <p style="padding:10px 0px;"><b>Section B.</b> (To be used only by a conditional permanent resident.)</p>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.a.</b>
                <?php echo createCheckbox("")?>
                <p>My previous card has been lost, stolen, or destroyed.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.b.</b>
                <?php echo createCheckbox("")?>
                <p>My previous card was issued but never received.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.c.</b>
                <?php echo createCheckbox("")?>
                <p>My existing card has been mutilated.</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.d.</b>
                <?php echo createCheckbox("")?>
                <p>My existing card has incorrect data because of DHS error. (Attach your existing permanent resident
                    card with incorrect data along with this application.)</p>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>3.e.</b>
                <?php echo createCheckbox("")?>
                <p>My name or other biographic information has legally changed since the issuance of my existing card.
                </p>
            </div>
            <div class="bg-info">
                <h4><b>Part 3. Processing Information</b>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Location where you applied for an immigrant visa or
                    adjustment of status:</label>
                <div class="col-md-12">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">2. Location where your immigrant visa was issued or USCIS office
                    where you were granted adjustment of status:</label>
                <div class="col-md-12">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <p style="padding:10px 20px;">Complete <b>Item Numbers 3.a.</b> and <b>3.a1</b>. if you entered the
                United States with an immigrant visa. (If you were granted
                adjustment of status, proceed to <b>Item Number 4.</b> )</p>
            <div class="form-group">
                <label class="control-label col-md-12">3.a. Destination in the United States at time of
                    admission</label>
                <div class="col-md-12">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">3.a.1. Port-of-Entry where admitted to the United States:
                </label>
                <p style="padding:2px 12px;">City or Town and State</p>
                <div class="col-md-12">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">4. Have you ever been in exclusion, deportation, or removal
                    proceedings or ordered removed from the United States?</label>
                <div class="col-md-7 col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">5. Since you were granted permanent residence, have you
                    ever filed Form I-407, Abandonment by Alien of Status as
                    Lawful Permanent Resident, or otherwise been determined
                    to have abandoned your status?</label>
                <div class="col-md-7 col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>


            <p><b>NOTE</b>: If you answered "Yes" to Item Numbers 4. or 5.
                above, provide a detailed explanation in the space provided in
                Part 8. Additional Information.</p>
        </div>

        <!-- left side end -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b> Biographic Information</b></i>
                </h4>
            </div>

            <div style="padding-bottom:10px;">
                <p><b>6.Ethnicity (Select only one box)</b></p>
                <p><?php echo createCheckbox("")?>Hispanic or Latino</p>
                <p><?php echo createCheckbox("")?>Not Hispanic or Latino</p>
            </div>

            <div style="padding-bottom:10px; ">
                <p><b>7.Race (Select all applicable boxes)</b></p>
                <p><?php echo createCheckbox("")?>White</p>
                <p><?php echo createCheckbox("")?>Asian</p>
                <p><?php echo createCheckbox("")?>Black or African American</p>
                <p><?php echo createCheckbox("")?>American Indian or Alaska Native</p>
                <p><?php echo createCheckbox("")?>Native Hawaiian or Other Pacific Islander</p>
            </div>

            <div class="form-group" style="display: flex; align-items: center; padding-top:15px; ">
                <label class="control-label col-md-4">8. Height:</label>
                <div class="col-md-4" style="display: flex;">
                    <label " style=" margin-right: 5px;">Feet:</label>
                    <select class="form-control" id="feet" name="feet">
                        <?php
            for ($i = 2; $i <= 8; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
                    </select>
                </div>
                <div class="col-md-4" style="display: flex;">
                    <label style="margin-right: 5px;">Inches:</label>
                    <select class="form-control" id="inches" name="inches">
                        <?php
            for ($i = 0; $i <= 11; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4">9. Weight:</label>
                <div class="col-md-8" style="display: flex; justify-content: center; align-items: center; ">
                    <label>Pounds:</label>
                    <div>
                        <input type="text" class="form-control" id="" name="" value="<?php echo showData('')?>"
                            maxlength="">
                    </div>
                    <div style="margin:0px 10px;">
                        <input type="text" class="form-control" id="" name="" value="<?php echo showData('')?>"
                            maxlength="">
                    </div>
                    <div>
                        <input type="text" class="form-control" id="" name="" value="<?php echo showData('')?>"
                            maxlength="">
                    </div>
                </div>
            </div>




            <div style="padding-bottom:10px;">
                <p><b>10. Eye Color (Select only one box)</b></p>
                <div style="display: flex; margin-left:25px;">
                    <div style="flex: 1;">
                        <p><?php echo createCheckbox("")?>Black</p>
                        <p><?php echo createCheckbox("")?>Gray</p>
                        <p><?php echo createCheckbox("")?>Maroon</p>
                    </div>
                    <div style="flex: 1;">
                        <p><?php echo createCheckbox("")?>Blue</p>
                        <p><?php echo createCheckbox("")?>Green</p>
                        <p><?php echo createCheckbox("")?>Pink</p>
                    </div>
                    <div style="flex: 1;">
                        <p><?php echo createCheckbox("")?>Brown</p>
                        <p><?php echo createCheckbox("")?>Hazel</p>
                        <p><?php echo createCheckbox("")?>Unknown/Other</p>
                    </div>
                </div>
            </div>


            <div style="padding-bottom:10px;">
                <p><b>11. Hair Color (Select only one box) </b></p>
                <div style="display: flex; margin-left:25px;">
                    <div style="flex: 1;">
                        <p><?php echo createCheckbox("")?>Bald (No hair)</p>
                        <p><?php echo createCheckbox("")?>Brown</p>
                        <p><?php echo createCheckbox("")?>Sandy</p>
                    </div>
                    <div style="flex: 1;">
                        <p><?php echo createCheckbox("")?>Black</p>
                        <p><?php echo createCheckbox("")?>Gray</p>
                        <p><?php echo createCheckbox("")?>White</p>
                    </div>
                    <div style="flex: 1;">
                        <p><?php echo createCheckbox("")?>Blond</p>
                        <p><?php echo createCheckbox("")?>Red</p>
                        <p><?php echo createCheckbox("")?>Unknown/Other</p>
                    </div>
                </div>
            </div>


            <div class="bg-info">
                <h4><b> Part 4. Accommodations for Individuals with
                        Disabilities and/or Impairments (Read the
                        information in the Form I-90 Instructions before
                        completing this part.) </b>
                </h4>
            </div>

            <p><b>NOTE:</b> If you need extra space to complete this section, use
                the space provided in Part 8. Additional Information.</p>




            <div class="form-group">
                <label class="control-label col-md-12">1. Are you requesting an accommodation because of your
                    disabilities and/or impairments?</label>
                <div class="col-md-7 col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>



            <p>If you answered "Yes," select any applicable boxes:</p>



            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("")?>
                <p>I am deaf or hard of hearing and request the
                    following accommodation (If you are requesting a
                    sign-language interpreter, indicate for which
                    language (for example, American Sign Language)):

                </p>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea class="form-control" name="" maxlength="" class="form-control" cols="30"
                        rows="10"><?php echo showData('')?></textarea>
                </div>
            </div>

        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />




</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 4 of 7</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Accommodations for Individuals with
                        Disabilities and/or Impairments (continued)</b>
                </h4>
            </div>

            <div>
                <div class="d-flexible" style="padding-bottom:10px;">
                    <b>1.b.</b>
                    <?php echo createCheckbox("")?>
                    <p>I am blind or have low vision and request the
                        following accommodation:

                    </p>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" name="" maxlength="" class="form-control" cols="30"
                            rows="10"><?php echo showData('')?></textarea>
                    </div>
                </div>
            </div>

            <div>
                <div class="d-flexible" style="padding-bottom:10px;">
                    <b>1.c.</b>
                    <?php echo createCheckbox("")?>
                    <p>I have another type of disability and/or impairment
                        (Describe the nature of your disability and/or
                        impairment and the accommodation you are
                        requesting):

                    </p>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" name="" maxlength="357" class="form-control" cols="30"
                            rows="10"><?php echo showData('')?></textarea>
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 5. Applicant's Statement, Contact
                        Information, Certification, and Signature</b>
                </h4>
            </div>

            <p><b>NOTE:</b> Read the Penalties section of the Form I-90
                Instructions before completing this part. </p>

            <div class="bg-info">
                <h4><i><b>Applicant's Statement</b></i>
                </h4>
            </div>

            <p><b>NOTE:</b> Select the box for either Item Number 1.a. or 1.b. If
                applicable, select the box for Item Number 2.</p>


            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("")?>
                <p>I can read and understand English, and I have read
                    and understand every question and instruction on this
                    application and my answer to every question.


                </p>
            </div>

            <span>
                <div class="d-flexible" style="">
                    <b>1.b.</b>
                    <?php echo createCheckbox("")?>
                    <p>The interpreter named in Part 6. read to me every
                        question and instruction on this application and my
                        answer to every question in
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
                <p style="padding-left:40px;">a language in which I am fluent and I understood
                    everything.</p>
            </span>

            <span>
                <div class="d-flexible" style="">
                    <b>2.</b>
                    <?php echo createCheckbox("")?>
                    <p>At my request, the preparer named in Part 7.,
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
                <p style="padding-left:40px;">prepared this application for me based only upon
                    information I provided or authorized.</p>
            </span>
        </div>
        <!-- left side end -->

        <div class="col-md-6">

            <div class="bg-info">
                <h4><i><b>Applicant's Contact Information</b></i>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Applicant's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Applicant's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Applicant's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b> Applicant's Certification</b></i>
                </h4>
            </div>
            <div>

                <p>Copies of any documents I have submitted are exact
                    photocopies of unaltered, original documents, and I understand
                    that USCIS may require that I submit original documents to
                    USCIS at a later date. Furthermore, I authorize the release of
                    any information from any of my records that USCIS may need
                    to determine my eligibility for the immigration benefit I seek.</p>
                <br>
                <p>I further authorize release of information contained in this
                    application, in supporting documents, and in my USCIS records
                    to other entities and persons where necessary for the
                    administration and enforcement of U.S. immigration laws.</p>
                <br>
                <p>I understand that USCIS will require me to appear for an
                    appointment to take my biometrics (fingerprints, photograph,
                    and/or signature) and, at that time, I will be required to sign an
                    oath reaffirming that:</p>
                <br>
                <span>
                    1) I reviewed and provided or authorized all of the
                    information in my application; <br>
                    2) I understood all of the information contained in, and
                    submitted with, my application; and <br>
                    3) All of this information was complete, true, and correct
                    at the time of filing. <br>
                </span>
                <br>
                <p>I certify, under penalty of perjury, that I provided or authorized
                    all of the information in my application, I understand all of the
                    information contained in, and submitted with, my application,
                    and that all of this information is complete, true, and correct.</p>
            </div>



            <div class="bg-info">
                <h4><b>Applicant's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Applicant's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_918a_petitioner_sign_date"
                        value="<?php echo showData('')?>" />
                </div>
            </div>
            <p><b>NOTE TO ALL APPLICANTS:</b>If you do not completely fill
                out this application or fail to submit required documents listed
                in the Instructions, USCIS may deny your application.
            </p>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 5 of 7</p>
            </b>
        </div>

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Interpreter's Contact Information,
                        Certification, and Signature</b>
                </h4>
            </div>
            <h5><b>Provide the following information about the interpreter</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if
                    any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="34" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Mailing Address</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="" value="apt" <?php echo (showData('') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="" value="ste" <?php echo (showData('') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="" value="flr" <?php echo (showData('') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="" maxlength="6"
                        value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Contact Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <p>which is the same language provided in <b>Part 5., Item Number
                    1.b.</b>, and I have read to this applicant in the identified language
                every question and instruction on this application and his or her
                answer to every question. The applicant informed me that he or
                she understands every instruction, question, and answer on the
                application, including the <b>Applicant's Certification</b>, and has
                verified the accuracy of every answer.</p>

        </div>
        <!-- left side column end -->

        <div class="col-md-6">

            <div class="bg-info">
                <h4><b>Interpreter's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. Interpreter's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_918a_petitioner_sign_date"
                        value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 7. Contact Information, Declaration, and
                        Signature of the Person Preparing this
                        Application, if Other Than the Applicant</b>
                </h4>
            </div>
            <h5><b>Provide the following information about the preparer.</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="34" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="" value="apt" <?php echo (showData('') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="" value="ste" <?php echo (showData('') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="" value="flr" <?php echo (showData('') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="" maxlength="6"
                        value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="" value="<?php echo showData('')?>">
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>



<!----------------------------------------------------------------------
-------------------------------- page 6 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 6 of 7</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Contact Information, Declaration, and
                        Signature of the Person Preparing this
                        Application, if Other Than the Applicant
                        (continued)</b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>

            <div class="d-flexible" style="padding-bottom:10px;">
                <b>7.a.</b>
                <?php echo createCheckbox("")?>
                <p>I am not an attorney or accredited representative but
                    have prepared this application on behalf of the
                    applicant and with the applicant's consent.

                </p>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>7.a.</b>
                <?php echo createCheckbox("")?>
                <p>I am an attorney or accredited representative and my <br>
                    representation of the applicant in this case <br>
                    <?php echo createCheckbox("")?> extends <?php echo createCheckbox("")?>does not extend beyond the
                    <br>
                    preparation of this application.
                </p>
            </div>
            <p><b>NOTE</b>: If you are an attorney or accredited
                representative whose representation extends beyond
                preparation of this application, you may be obliged to
                submit a completed Form G-28, Notice of Entry of
                Appearance as Attorney or Accredited
                Representative, with this application. </p>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this application at the request of the applicant. The
                applicant then reviewed this completed application and
                informed me that he or she understands all of the information
                contained in, and submitted with, his or her application,
                including the <b>Applicant's Certification,</b> and that all of this
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
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="" value="<?php echo showData('')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-5 col-md-offset-1"></div>
        <!-- no data needed -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 7 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style="padding-left:1000px;">Page 7 of 7</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this application, use the space below. If you need more
                space than what is provided, you may make copies of this page
                to complete and file with this application or attach a separate
                sheet of paper. Include your name and A -Number (if any) at
                the top of each sheet; indicate the Page Number, Part
                Number, and Item Number to which your answer refers; and
                sign and date each sheet.
            </p>
            <div class="bg-info">
                <h4><b> Your Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span></span><b>A-</b><input type="text" class="form-control"
                            name="i_918a_additional_info_a_number" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="2" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea name="" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="2" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea name="" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="2" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea name="" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="2" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea name="" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="2" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="" maxlength="6" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php"?>