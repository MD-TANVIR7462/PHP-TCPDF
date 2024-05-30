<?php
$meta_title 	=   "INTAKE FOR FORM I-130";
$page_heading 	=   " Petition for Alien Relative ";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 1 of 12</p>
            </b>
        </div>


    </div>
    <div class="">
        <table style="border-collapse: collapse; ">
            <thead>
                <tr>
                    <th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To be completed by an
                        attorney or accredited representative (if any).</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 5px;"><?php echo createCheckbox("")?> Select this box if Form G-28 is attached.
                    </td>
                    <td style="padding: 5px;">
                        <div>
                            <p>Volag Number
                                (if any)</p>
                            <input type="text" class="form-control" id="" name="" value="<?php echo showData('')?>"
                                maxlength="">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div>
                            <p>Attorney State Bar Number
                                (if applicable)</p>
                            <input type="text" class="form-control" id="" name="" value="<?php echo showData('')?>"
                                maxlength="">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div>
                            <p>Attorney or Accredited Representative
                                USCIS Online Account Number (if any)
                            </p>
                            <input type="text" class="form-control" id="" name="" value="<?php echo showData('')?>"
                                maxlength="">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6">

                <div class="bg-info">
                    <h4><b> Part 1. Relationship (You are the Petitioner. Your
                            relative is the Beneficiary)</b></h4>
                </div>


                <div style="padding-bottom:10px;">
                    <p><b>1. I am filing this petition for my (Select only one box):</b></p>
                    <div style="display: flex; margin-left:3%; ">

                        <p style="margin-right: 3%;"><?php echo createCheckbox("")?>Spouse</p>
                        <p style="margin-right: 3%;"><?php echo createCheckbox("")?>Parent</p>
                        <p style="margin-right: 3%;"><?php echo createCheckbox("")?>Brother / Sister</p>
                        <p style="margin-right: 3%;"><?php echo createCheckbox("")?>Child</p>


                    </div>
                </div>


                <div style="padding-bottom:10px; ">
                    <p style="padding-bottom:10px;  "><b>2. If you are filing this petition for your child or parent,
                            select the box that describes your relationship (Select only
                            one box)</b></p>
                    <p style="padding-bottom:10px;  "><?php echo createCheckbox("")?>Child was born to parents who were
                        married to each
                        other at the time of the child's birth</p>


                    <p style="padding-bottom:10px;  "><?php echo createCheckbox("")?>Stepchild / Stepparent
                    </p>

                    <p style="padding-bottom:10px;  "><?php echo createCheckbox("")?>Child was born to parents who were
                        not married to
                        each other at the time of the child's birth
                    </p>


                    <p style="padding-bottom:10px;  "><?php echo createCheckbox("")?>Child was adopted (not an Orphan or
                        Hague
                        Convention adoptee)</p>

                </div>


                <div class="form-group">
                    <label>3. If the beneficiary is your brother/sister, are you related
                        by adoption?</label>
                    <div class=" col-md-offset-8">
                        <?php echo createRadio("")?>
                    </div>
                </div>

                <div class="form-group">
                    <label>4. Did you gain lawful permanent resident status or
                        citizenship through adoption?</label>
                    <div class=" col-md-offset-8">
                        <?php echo createRadio("")?>
                    </div>
                </div>

            </div>
            <!-- left side end -->
            <div class="col-md-6">

                <div class="bg-info">
                    <h4><b>Part 2. Information About You (Petitioner)</b></h4>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">1. Alien Registration Number (A-Number) (if any)
                    </label>
                    <div class="col-md-8 col-md-offset-4">
                        <div class="d-flexible">
                            <span
                                style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                role="presentation" dir="ltr"> ►A-</span><input type="text" class="form-control"
                                maxlength="" name="" value="">
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
                <div class="form-group">
                    <label class="control-label col-md-12">3. U.S. Social Security Number (if any) </label>
                    <div class="col-md-8 col-md-offset-4">
                        <div class="d-flexible">
                            <span
                                style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                role="presentation" dir="ltr">►</span><input type="text" class="form-control" name=""
                                maxlength="12" value="">
                        </div>
                    </div>
                </div>

                <div class="bg-info">
                    <h4><b> <i>Your Full Name</i></b> </h4>
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
            <p style=" text-align: right;">Page 2 of 12</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Information About You (Petitioner)
                        (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b>Other Names Used (if any)</b></h4>
            </div>
            <p>Provide all other names you have ever used, including aliases,
                maiden name, and nicknames.</p>



            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4>
                    <i><b>Other Information</b></i>
                </h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">6. City/Town/Village of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="" value="<?= showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">7. Country of Birth </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?= showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-6">8. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>

            <div class="form-group" style="padding-left:10px;">
                <div class="control-label">
                    <b>9. Sex </b> &nbsp;
                    <input type="radio" name="" value="male" <?php echo (showData('')=='male') ? 'checked' : '' ?>> Male
                    &nbsp;
                    <input type="radio" name="" value="female" <?php echo (showData('')=='female') ? 'checked' : '' ?>>
                    Female &nbsp;
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Mailing Address</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>10.c. </b> &nbsp;
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
                <label class="control-label col-md-5">10.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.e. State</label>
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
                <label class="control-label col-md-5">10.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label>11. Is your current mailing address the same as your physical
                    address?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>
            <p>If you answered "No" to Item Number 11., provide
                information on your physical address in Item Numbers 12.a. -
                13.b.</p>
        </div>



        <!-- left side end -->
        <div class="col-md-6">

            <div class="bg-info">
                <h4><i><b>Address History</b> </i></h4>
            </div>
            <p>Provide your physical addresses for the last five years, whether
                inside or outside the United States. Provide your current
                address first if it is different from your mailing address in Item
                Numbers 10.a. - 10.i. </p>
            <p><b>Physical Address 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">12.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>12.b. </b> &nbsp;
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
                <label class="control-label col-md-5">12.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.d. State</label>
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
                <label class="control-label col-md-5">12.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">12.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">13.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">13.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <hr>
            <p><b>Physical Address 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">14.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>14.b. </b> &nbsp;
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
                <label class="control-label col-md-5">14.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.d. State</label>
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
                <label class="control-label col-md-5">14.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">14.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">15.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">15.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <hr>
            <div class="bg-info">
                <h4><i><b>Your Marital Information</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. How many times have you been married?</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control col-md-3"
                            name="" maxlength="12" value="">
                    </div>
                </div>
            </div>

            <div style="padding-bottom:10px;">
                <p><b>17. Current Marital Status</b></p>
                <div style="display: flex; margin-left:3%; ">


                    <p style=""><?php echo createCheckbox("")?>Single, Never Married</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Married</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Divorced</p>



                </div>
                <div style="display: flex; margin-left:3%; ">


                    <p style=""><?php echo createCheckbox("")?>Widowed</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Separated</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Annulled</p>



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
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 3 of 12</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Information About You (Petitioner)
                        (continued)</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">18. Date of Current Marriage (if currently married)
                    (mm/dd/yyyy) </label>
                <div class="col-md-7 ">
                    <input type="date" class="form-control col-md-offset-6" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4><b>Place of Your Current Marriage (if married)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">19.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">19.b. State</label>
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
                <label class="control-label col-md-5">19.c. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">19.d. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Names of All Your Spouses (if any)</b></h4>
            </div>
            <p>Provide information on your current spouse (if currently married)
                first and then list all your prior spouses (if any).</p>
            <br>
            <p><b>Spouse 1
                </b></p>
            <div class="form-group">
                <label class="control-label col-md-5">20.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">20.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">20.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-6">21. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <hr>
            <p><b>Spouse 2
                </b></p>
            <div class="form-group">
                <label class="control-label col-md-5">22.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">22.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">22.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-6">23. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4>
                    <i><b>Information About Your Parents</b></i>
                </h4>
            </div>
            <p><b>Parent 1's Information</b></p>
            <p>Full Name of Parent 1</p>


            <div class="form-group">
                <label class="control-label col-md-5">24.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">24.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">24.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">25. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>


            <div class="control-label" style="padding-left:18px;">
                <b>26. Sex </b> &nbsp;
                <input type="radio" name="" value="male" <?php echo (showData('')=='male') ? 'checked' : '' ?>> Male
                &nbsp;
                <input type="radio" name="" value="female" <?php echo (showData('')=='female') ? 'checked' : '' ?>>
                Female &nbsp;
            </div>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">27. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">28. City/Town/Village of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">29. Country of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>

            <p><b>Parent 2's Information</b></p>
            <p>Full Name of Parent 2</p>


            <div class="form-group">
                <label class="control-label col-md-5">30.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">30.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">30.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">31. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>


            <div class="control-label" style="padding-left:18px;">
                <b>32. Sex </b> &nbsp;
                <input type="radio" name="" value="male" <?php echo (showData('')=='male') ? 'checked' : '' ?>> Male
                &nbsp;
                <input type="radio" name="" value="female" <?php echo (showData('')=='female') ? 'checked' : '' ?>>
                Female &nbsp;
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">32. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">33. City/Town/Village of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">34. Country of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="bg-info">
                <h4><b>Additional Information About You (Petitioner)
                    </b></h4>
            </div>

            <div style="padding-bottom:10px;">
                <p><b>36. I am a (Select only one box):</b></p>
                <p><?php echo createCheckbox("")?>U.S. Citizen</p>
                <p><?php echo createCheckbox("")?>Lawful Permanent Resident</p>
            </div>
            <p><b>If you are a U.S. citizen, complete Item Number 37.</b></p>

            <div style="padding-bottom:10px;">
                <p><b>37. My citizenship was acquired through (Select only one
                        box):</b></p>
                <p><?php echo createCheckbox("")?>Birth in the United States</p>
                <p><?php echo createCheckbox("")?>Naturalization</p>
                <p><?php echo createCheckbox("")?>Parents</p>
            </div>

            <div class="form-group">
                <label>38. Have you obtained a Certificate of Naturalization or a
                    Certificate of Citizenship?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>
            <p>If you answered "Yes" to Item Number 38., complete the
                following:</p>



            <div class="form-group">
                <label class="control-label col-md-12">39.a. Certificate Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">39.b. Place of Issuance</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-6">39.c. Date of Issuance (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
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
            <p style=" text-align: right;">Page 4 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="bg-info">
                <h4><i><b>Part 2. Information About You (Petitioner)
                            (continued)</b></i>
                </h4>
            </div>

            <p>If you are a lawful permanent resident, complete Item
                Numbers 40.a. - 41.</p>




            <div class="form-group">
                <label class="control-label col-md-12">40.a. Class of Admission</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">40.b. Date of Admission (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>


            <p>Place of Admission</p>


            <div class="form-group">
                <label class="control-label col-md-12">40.c. City or Town </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">40.d. State</label>
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


            <div class="\">
                <label>41. Did you gain lawful permanent resident status through
                    marriage to a U.S. citizen or lawful permanent resident?</label>
                <div class="  ">
                    <?php echo createRadio("")?>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Employment History</b></i>
                </h4>
            </div>
            <p>Provide your employment history for the last five years, whether
                inside or outside the United States. Provide your current
                employment first. If you are currently unemployed, type or print
                "Unemployed" in Item Number 42. </p>
            <br>
            <p><b>Employer 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">42. Name of Employer/Company</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>43.b.</b> &nbsp;
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
                <label class="control-label col-md-5">43.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.d. State</label>
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
                <label class="control-label col-md-5">43.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">43.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">44. Your Occupation</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">45.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">45.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
        </div>

        <!-- left side end -->

        <div class="col-md-6">
            <p><b>Employer 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">46. Name of Employer/Company</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>47.b.</b> &nbsp;
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
                <label class="control-label col-md-5">47.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.d. State</label>
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
                <label class="control-label col-md-5">47.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">47.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">48. Your Occupation</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">49.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">49.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>


            <div class="bg-info">
                <h4><i><b>Part 3. Biographic Information</b></i>
                </h4>
            </div>
            <p><b>NOTE:</b> Provide the biographic information about you, the
                petitioner</p>
            <br>
            <div style="padding-bottom:10px;">
                <p><b>1.Ethnicity (Select only one box)</b></p>
                <p><?php echo createCheckbox("")?>Hispanic or Latino</p>
                <p><?php echo createCheckbox("")?>Not Hispanic or Latino</p>
            </div>

            <div style="padding-bottom:10px; ">
                <p><b>2.Race (Select all applicable boxes)</b></p>
                <p><?php echo createCheckbox("")?>White</p>
                <p><?php echo createCheckbox("")?>Asian</p>
                <p><?php echo createCheckbox("")?>Black or African American</p>
                <p><?php echo createCheckbox("")?>American Indian or Alaska Native</p>
                <p><?php echo createCheckbox("")?>Native Hawaiian or Other Pacific Islander</p>
            </div>

            <div class="row" style="display: flex;  padding-top:15px; ">
                <label class=" col-md-6">3. Height:</label>
                <div class="col-md-6" style="display: flex;">
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

            <div class="row">
                <label class=" col-md-6">4. Weight:</label>
                <div class="col-md-6" style="display: flex; justify-content: center; align-items: center; ">
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
                <p><b>5. Eye Color (Select only one box)</b></p>
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
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 5 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 3. Biographic Information (continued)</b>
                </h4>
            </div>

            <div>


                <div style="padding-bottom:10px;">
                    <p><b>6. Hair Color (Select only one box) </b></p>
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
                    <h4><b>Part 4. Information About Beneficiary</b>
                    </h4>
                </div>




                <div class="form-group">
                    <label class="control-label col-md-12">1. Alien Registration Number (A-Number) (if any)
                    </label>
                    <div class="col-md-8 col-md-offset-4">
                        <div class="d-flexible">
                            <span
                                style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                role="presentation" dir="ltr"> ►A-</span><input type="text" class="form-control"
                                maxlength="" name="" value="">
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
                <div class="form-group">
                    <label class="control-label col-md-12">3. U.S. Social Security Number (if any) </label>
                    <div class="col-md-8 col-md-offset-4">
                        <div class="d-flexible">
                            <span
                                style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                role="presentation" dir="ltr">►</span><input type="text" class="form-control" name=""
                                maxlength="12" value="">
                        </div>
                    </div>
                </div>

                <div class="bg-info">
                    <h4><b>Beneficiary's Full Name</b>
                    </h4>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5">4.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">4.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">4.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>

                <div class="bg-info">
                    <h4><b>Other Names Used (if any)</b>
                    </h4>
                </div>
                <p>Provide all other names the beneficiary has ever used, including
                    aliases, maiden name, and nicknames.</p>
                <div class="form-group">
                    <label class="control-label col-md-5">5.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>


                <div class="bg-info">
                    <h4><b> Other Information About Beneficiary</b>
                    </h4>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12">6. City/Town/Village of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12">7. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">8. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-7 col-md-offset-5">
                        <input type="date" class="form-control" name="i_918a_petitioner_sign_date"
                            value="<?php echo showData('')?>" />
                    </div>
                </div>


                <div class="form-group" style="padding-left:10px;">
                    <div class="control-label">
                        <b>9. Sex </b> &nbsp;
                        <input type="radio" name="" value="male" <?php echo (showData('')=='male') ? 'checked' : '' ?>>
                        Male
                        &nbsp;
                        <input type="radio" name="" value="female"
                            <?php echo (showData('')=='female') ? 'checked' : '' ?>>
                        Female &nbsp;
                    </div>
                </div>



                <div style="padding-bottom:10px;">
                    <p><b>10. Has anyone else ever filed a petition for the beneficiary?</b></p>
                    <p><?php echo createCheckbox("")?>Yes</p>
                    <p><?php echo createCheckbox("")?>No</p>
                    <p><?php echo createCheckbox("")?>UNknown</p>
                </div>

                <p><b>NOTE:</b> Select "Unknown" only if you do not know, and
                    the beneficiary also does not know, if anyone else has
                    ever filed a petition for the beneficiary</p>



            </div>

        </div>
        <!-- left side end -->

        <div class="col-md-6">

            <div class="bg-info">
                <h4><i><b>Beneficiary's Physical Address</b></i>
                </h4>
            </div>

            <p>If the beneficiary lives outside the United States in a home
                without a street number or name, leave Item Numbers 11.a.
                and 11.b. blank.</p>


            <div class="form-group">
                <label class="control-label col-md-5">11.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>11.b. </b> &nbsp;
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
                <label class="control-label col-md-5">11.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.d. State</label>
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
                <label class="control-label col-md-5">11.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">11.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>

            <div class="bg-info">
                <h4><i><b>Other Address and Contact Information</b></i>
                </h4>
            </div>

            <p>Provide the address in the United States where the beneficiary
                intends to live, if different from Item Numbers 11.a. - 11.h. If
                the address is the same, type or print "SAME" in Item Number
                12.a</p>


            <div class="form-group">
                <label class="control-label col-md-5">12.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>12.b. </b> &nbsp;
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
                <label class="control-label col-md-5">12.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.d. State</label>
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
                <label class="control-label col-md-5">12.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>



            <p>Provide the beneficiary's address outside the United States, if
                different from Item Numbers 11.a. - 11.h. If the address is the
                same, type or print "SAME" in Item Number 13.a</p>





            <div class="form-group">
                <label class="control-label col-md-5">13.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>13.b. </b> &nbsp;
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
                <label class="control-label col-md-5">13.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.d. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.e. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">13.f. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <div class="form-group">
                <label class="control-label col-md-12">14. Daytime Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
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
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 6 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Beneficiary
                        (continued)</b>
                </h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">15. Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <div class="bg-info">
                <h4><b><i>Beneficiary's Marital Information </i></b>
                </h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">17. How many times has the beneficiary been married?</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>


            </div>


            <div style="padding-bottom:10px;">
                <p><b>18. Current Marital Status</b></p>
                <div style="display: flex; margin-left:3%; ">


                    <p style=""><?php echo createCheckbox("")?>Single, Never Married</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Married</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Divorced</p>



                </div>
                <div style="display: flex; margin-left:3%; ">


                    <p style=""><?php echo createCheckbox("")?>Widowed</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Separated</p>
                    <p style="margin-left: 3%;"><?php echo createCheckbox("")?>Annulled</p>



                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">19. Date of Current Marriage (if currently married)
                    (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_918a_petitioner_sign_date"
                        value="<?php echo showData('')?>" />
                </div>
            </div>


            <div class="bg-info">
                <h4><b><i>Place of Beneficiary's Current Marriage
                            (if married)</i></b>
                </h4>
            </div>












            <div>

                <div class="form-group">
                    <label class="control-label col-md-5">20.a. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" maxlength="20"
                            value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.b. State</label>
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
                    <label class="control-label col-md-5">20.c. Province</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.d. Country</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" maxlength="20"
                            value="<?php echo showData('')?>">
                    </div>
                </div>



                <div class="bg-info">
                    <h4><b>Names of Beneficiary's Spouses (if any)</b>
                    </h4>
                </div>


                <p>Provide information on the beneficiary's current spouse (if
                    currently married) first and then list all the beneficiary's prior
                    spouses (if any).

                    <br>
                    <br>
                    <b>Spuuse 1</b>
                </p>
                <div class="form-group">
                    <label class="control-label col-md-5">21.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">21.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">21.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">22. Date Marriage Ended (mm/dd/yyyy)
                    </label>
                    <div class="col-md-7">
                        <input type="date" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>

                <hr>



                <b>Spuuse 2</b>
                </p>
                <div class="form-group">
                    <label class="control-label col-md-5">23.a. Family Name(Last Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">23.b. Given Name(First Name) </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">23.c. Middle Name </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                    </div>
                </div>
            </div>

        </div>
        <!-- left side end -->

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-5">22. Date Marriage Ended (mm/dd/yyyy)
                </label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Information About Beneficiary's Family</b></i>
                </h4>
            </div>

            <p>Provide information about the beneficiary's spouse and
                children. </p>
            <p><b>Person 1</b></p>

            <div class="form-group">
                <label class="control-label col-md-5">25.a. Family Name
                    (Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">25.b. Given Name
                    (First Name)
                </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">25.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">26. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">27. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">28. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <hr>

            <p><b>Person 2</b></p>

            <div class="form-group">
                <label class="control-label col-md-5">29.a. Family Name
                    (Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">29.b. Given Name
                    (First Name)
                </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">29.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">30. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">31. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">32. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <hr>
            <p><b>Person 3</b></p>

            <div class="form-group">
                <label class="control-label col-md-5">33.a. Family Name
                    (Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">33.b. Given Name
                    (First Name)
                </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">33.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">34. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">35. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">36. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>





<!-- ----------------------------------------
-------------------------page 7 ------------------------
--------------------------------------------------------------->
<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 7 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Beneficiary
                        (continued)</b>
                </h4>
            </div>

            <p><b>Person 4</b></p>

            <div class="form-group">
                <label class="control-label col-md-5">37.a. Family Name
                    (Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">37.b. Given Name
                    (First Name)
                </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">37.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">38. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">39. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">40. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <hr>
            <p><b>Person 3</b></p>

            <div class="form-group">
                <label class="control-label col-md-5">41.a. Family Name
                    (Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">41.b. Given Name
                    (First Name)
                </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">41.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">42. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">44. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>




            <div class="bg-info">
                <h4><b>Beneficiary's Entry Information</b>
                </h4>
            </div>



            <div class="form-group">
                <label>45. Was the beneficiary EVER in the United States?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>

            <p>If the beneficiary is currently in the United States, complete
                Items Numbers 46.a. - 46.d.
            </p>

            <div class="form-group">
                <label class="control-label col-md-12">46.a. He or she arrived as a (Class of Admission):</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>


            </div>
            <div class="form-group">
                <label class="control-label col-md-12">46.b. Form I-94 Arrival-Departure Record Number</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control" name=""
                            maxlength="12" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">46.c. Date of Arrival (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">46.d. Date authorized stay expired, or will expire, as shown on
                    Form I-94 or Form I-95 (mm/dd/yyyy) or type or print
                    "D/S" for Duration of Status</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">47. Passport Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>



        </div>

        <!-- left end -->
        <div class='col-md-6'>


            <div class="form-group">
                <label class="control-label col-md-12">48. Travel Document Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">49. Country of Issuance for Passport or Travel Document</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">50. Expiration Date for Passport or Travel Document
                    (mm/dd/yyyy)</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="bg-info">
                <h4><b>Beneficiary's Employment Information</b>
                </h4>
            </div>
            <p>Provide the beneficiary's current employment information (if
                applicable), even if they are employed outside of the United
                States. If the beneficiary is currently unemployed, type or print
                "Unemployed" in Item Number 51.a.</p>






            <div class="form-group">
                <label class="control-label col-md-12">51.a. Name of Current Employer (if applicable)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-5">51.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>51.c. </b> &nbsp;
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
                <label class="control-label col-md-5">51.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.e. State</label>
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
                <label class="control-label col-md-5">51.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">51.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">52. Date Employment Began (mm/dd/yyyy)</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Additional Information About Beneficiary</b>
                </h4>
            </div>
            <div class="form-group">
                <label>53. Was the beneficiary EVER in immigration proceedings?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>


            <div style="padding-bottom:10px; ">
                <p><b>54. If you answered "Yes," select the type of proceedings and
                        provide the location and date of the proceedings.</b></p>
                <p><?php echo createCheckbox("")?>Removal</p>
                <p><?php echo createCheckbox("")?>Exclusion/Deportation</p>
                <p><?php echo createCheckbox("")?>Rescission</p>
                <p><?php echo createCheckbox("")?>Other Judicial Proceedings</p>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">55.a. City or Town</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">55.b. State</label>
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
                <label class="control-label col-md-5">56. Date (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>


        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-- ----------------------------------------
-------------------------page 8 ------------------------
--------------------------------------------------------------->
<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 8 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Beneficiary
                        (continued)</b>
                </h4>
            </div>
            <p>If the beneficiary's native written language does not use
                Roman letters, type or print his or her name and foreign
                address in their native written language</p>


            <div class="form-group">
                <label class="control-label col-md-5">57.a. Family Name
                    (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">57.b. Given Name
                    (First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">57.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>58.b. </b> &nbsp;
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
                <label class="control-label col-md-5">58.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">58.d. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.e. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">58.f. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <p>If filing for your spouse, provide the last address at which
                you physically lived together. If you never lived together,
                type or print, "Never lived together" in Item Number 59.a.</p>
            <div class="form-group">
                <label class="control-label col-md-5">59.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>59.b. </b> &nbsp;
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
                <label class="control-label col-md-5">59.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.d. State</label>
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
                <label class="control-label col-md-5">59.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">59.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-5">60.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">60.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>

            <p>The beneficiary is in the United States and will apply for
                adjustment of status to that of a lawful permanent resident
                at the U.S. Citizenship and Immigration Services (USCIS)
                office in:</p>

            <div class="form-group">
                <label class="control-label col-md-5">61.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">61.b. State</label>
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

        </div>

        <!-- left end -->
        <div class='col-md-6'>
            <p>
                The beneficiary will not apply for adjustment of status in
                the United States, but he or she will apply for an immigrant
                visa abroad at the U.S. Embassy or U.S. Consulate in:
            </p>


            <div class="form-group">
                <label class="control-label col-md-5">62.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">62.b. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">62.c. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>

            <p><b>NOTE:</b> Choosing a U.S. Embassy or U.S. Consulate outside
                the country of the beneficiary's last residence does not
                guarantee that it will accept the beneficiary's case for
                processing. In these situations, the designated U.S. Embassy or
                U.S. Consulate has discretion over whether or not to accept the
                beneficiary's case.</p>

            <div class="bg-info">
                <h4><b>Part 5. Other Information</b>
                </h4>
            </div>
            <div class="form-group">
                <label>1. Have you EVER previously filed a petition for this
                    beneficiary or any other alien?
                </label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("")?>
                </div>
            </div>
            <p>If you answered "Yes," provide the name, place, date of filing,
                and the result. </p>


            <div class="form-group">
                <label class="control-label col-md-5">2.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">3.b. State</label>
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
                <label class="control-label col-md-12">4. Date Filed (mm/dd/yyyy)</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">5. Result (for example, approved, denied, withdrawn)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="39" value="<?php echo showData('')?>">
                </div>
            </div>
            <p>If you are also submitting separate petitions for other relatives,
                provide the names of and your relationship to each relative.</p>

            <p><b>Relative 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">6.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
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
-------------------------------- page 9 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 9 of 12</p>
        </b>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Other Information (continued)</b>
                </h4>
            </div>
            <p><b>Relative 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">8.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
            </div>
            <p><b>WARNING:</b> : USCIS investigates the claimed relationships and
                verifies the validity of documents you submit. If you falsify a
                family relationship to obtain a visa, USCIS may seek to have
                you criminally prosecuted. <br>
                <br>


                <b> PENALTIES:</b> By law, you may be imprisoned for up to 5
                years or fined $250,000, or both, for entering into a marriage
                contract in order to evade any U.S. immigration law. In
                addition, you may be fined up to $10,000 and imprisoned for
                up to 5 years, or both, for knowingly and willfully falsifying
                or concealing a material fact or using any false document in
                submitting this petition
            </p>


            <div class="bg-info">
                <h4><b>Part 6. Petitioner's Statement, Contact
                        Information, Declaration, and Signature</b>
                </h4>
            </div>

            <p><b>NOTE:</b> Read the Penalties section of the Form I-130
                Instructions before completing this part</p>

            <div class="bg-info">
                <h4><i><b>Petitioner's Statement</b></i>
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
                    <p>The interpreter named in Part 7. read to me every
                        question and instruction on this application and my
                        answer to every question in
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
                <p style="padding-left:40px;">a language in which I am fluent. I understood all of
                    this information as interpreted.</p>
            </span>

            <span>
                <div class="d-flexible" style="">
                    <b>2.</b>
                    <?php echo createCheckbox("")?>
                    <p>At my request, the preparer named in Part 8.,
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="" class="form-control" name="" value="<?php echo showData('')?>" />
                </div>
                <p style="padding-left:40px;">prepared this petition for me based only upon
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
                    petition, in supporting documents, and in my USCIS records to
                    other entities and persons where necessary for the administration
                    and enforcement of U.S. immigration laws.
                </p>
                <br>
                <p>I understand that USCIS may require me to appear for an
                    appointment to take my biometrics (fingerprints, photograph,
                    and/or signature) and, at that time, if I am required to provide
                    biometrics, I will be required to sign an oath reaffirming that:</p>
                <br>
                <span>
                    1) I provided or authorized all of the information
                    contained in, and submitted with, my petition; <br> <br>
                    2) I reviewed and understood all of the information in,
                    and submitted with, my petition; and<br><br>
                    3) All of this information was complete, true, and correct
                    at the time of filing
                    <br><br>
                    <p>I certify, under penalty of perjury, that all of the information in
                        my petition and any document submitted with it were provided
                        or authorized by me, that I reviewed and understand all of the
                        information contained in, and submitted with, my petition, and
                        that all of this information is complete, true, and correct.</p>
            </div>



            <div class="bg-info">
                <h4><b>Petitioner's Signature</b> </h4>
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
            <p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely
                fill out this petition or fail to submit required documents listed
                in the Instructions, USCIS may deny your petition.
            </p>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>






















<!----------------------------------------------------------------------
-------------------------------- page 10 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 10 of 12</p>
            </b>
        </div>

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Interpreter's Contact Information,
                        Certification, and Signature</b>
                </h4>
            </div>
            <h5><b>Provide the following information about the interpreter if you
                    used one</b></h5>
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


        </div>
        <!-- left side column end -->

        <div class="col-md-6">
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
            <p>which is the same language provided in <b>Part 6., Item Number
                    1.b.</b>, , and I have read to this petitioner in the identified language
                every question and instruction on this petition and his or her
                answer to every question. The petitioner informed me that he or
                she understands every instruction, question, and answer on the
                petition, including the <b> Petitioner's Declaration and
                    Certification,</b> and has verified the accuracy of every answer.</p>




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
                <h4><b>Part 8. Contact Information, Declaration, and
                        Signature of the Person Preparing this Petition, if
                        Other Than the Petitioner</b>
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
 
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next"
        style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>



<!----------------------------------------------------------------------
-------------------------------- page 11 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 11 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 8. Contact Information, Declaration, and
                        Signature of the Person Preparing this Petition, if
                        Other Than the Petitioner (continued)</b>
                </h4>
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
                prepared this petition at the request of the petitioner. The
                petitioner then reviewed this completed petition and informed
                me that he or she understands all of the information contained
                in, and submitted with, his or her petition, including the
                <b>Petitioner's Declaration and Certification,</b> and that all of this
                information is complete, true, and correct. I completed this
                petition based only on information that the petitioner provided
                to me or authorized me to obtain or use.
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
-------------------------------- page 12 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 12 of 12</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 9. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this petition, use the space below. If you need more
                space than what is provided, you may make copies of this page
                to complete and file with this petition or attach a separate sheet
                of paper. Type or print your name and A-Number (if any) at the
                top of each sheet; indicate the Page Number, Part Number,
                and Item Number to which your answer refers; and sign and
                date each sheet
            </p>

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