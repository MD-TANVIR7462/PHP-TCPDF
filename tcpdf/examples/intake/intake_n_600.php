<?php
$meta_title     =   "INTAKE FOR FORM n-600";
$page_heading     =   "Application for Certificate of Citizenship ";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 15</b></p>
    <table style="border-collapse: collapse; ">
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
                        <?php echo createCheckbox("")?> Select this box if Form G-28 is attached.
                    </label>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney State Bar Number (if applicable)</label>
                        <input type="text" class="form-control" value="" disabled>
                    </div>
                    <!-- <div>
						<p>Attorney State Bar Number (if applicable)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
					</div> -->
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number
                            (if any)</label>
                        <input type="text" class="form-control" value="" disabled>
                    </div>
                    <!-- <div>
						<p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number?>" disabled >
					</div> -->
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group"><h4 class="col-md-12" style="margin-top: 2%;">► START HERE - Type or print in black ink.</h4></div>
    <div class="bg-info col-md-12" style="margin-top:10px;">
        <h4><b>Part 1. Information About Your Eligibility</b></h4>
    </div>

    <div class="form-group">
        <label class="control-label col-md-offset-7 col-md-5">Enter Your 9 Digit A-Number:</label>
        <div class="col-md-offset-7 col-md-5">
            <span style="display: flex; justify-content: center; align-items: center;"><b>►A-</b> <input type="text"
                    maxlength="9" style="margin-left: 5px;" class="form-control" name=""
                    value="<?php echo showData('') ?>" /></span>
        </div>
    </div>
    <div class="form-group">
        <label>1. This application is being filed based on the fact that: (Select only one box)</label><br>
        <div style='margin-left:5%'>
            <input type="radio" id="biological" name="biographic_info_eye_color" value="black"
                <?php echo (showData('biographic_info_eye_color') == 'black') ? 'checked' : '' ?>>
            <label for="biological">I am a BIOLOGICAL child of a U.S. citizen parent.</label><br>

            <input type="radio" id="adopted" name="biographic_info_eye_color" value="blue"
                <?php echo (showData('biographic_info_eye_color') == 'blue') ? 'checked' : '' ?>>
            <label for="adopted">I am an ADOPTED child of a U.S. citizen parent.</label><br>

            <input type="radio" id="other_fully" name="biographic_info_eye_color" value="brown"
                <?php echo (showData('biographic_info_eye_color') == 'brown') ? 'checked' : '' ?>>
            <label for="other_fully">Other (Explain fully):</label><br>
            <div class="col-md-11" style="margin-left: 4%;">
                <input type="text" maxlength="39" class="form-control"
                    name="information_about_you_eligibility_reason_not_listed_value"
                    value="<?php echo showData('information_about_you_eligibility_reason_not_listed_value') ?>" />
            </div>
            <p class='col-md-12'><b>NOTE:</b> If you need extra space to complete this section, use the space provided
                in <b>Part 11. Additional Information</b></p>
        </div>
    </div>


    <div class="bg-info col-md-12" style="margin-top:20px; margin-bottom: 15px;">
        <h4><b>Part 2. Information About You </b></h4>
    </div>
    <p class='col-md-12' style="margin-bottom: 15px;"><b>NOTE:</b> Provide information about yourself if you are a
        person applying for the Certificate of Citizenship. <b>Provide information
            about your child</b> if you are a U.S. citizen parent applying for a Certificate of Citizenship for your
        minor child.</p>

    <h5><b>1. Current Legal Name (do not provide a nickname)</b> </h5>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_current_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_current_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>


    <h5><b>2. Your Name Exactly As It Appears on Your Permanent Resident Card (if different from above)</b> </h5>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_current_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_current_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>


    <h5><b>3. Other Names You Have Used Since Birth Provide all other names you have ever used, include nicknames,
            maiden name, and aliases.</b> </h5>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_current_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_current_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">4. U.S. Social Security Number (if any)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">5. USCIS Online Account Number (if any)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">6. Date of Birth (mm/dd/yyyy)</label>
        <div class="col-md-12">
            <input type="date" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">7. Country of Birth</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label " style="">8. Country of Prior Citizenship or Nationality 9</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class="col-md-6" >
        <label>9. Gender</label><br>
        <div style="margin-left: 5%; display: flex; align-items: center;">
            <div style="margin:0px 35px 0px 10px ">
                <input type="radio" id="p2_male" name="biographic_info_eye_color" value="black" <?php echo (showData('biographic_info_eye_color') == 'black') ? 'checked' : '' ?>>
                <label for="p2_male">Male</label>
            </div>
            <div>
                <input type="radio" id="p2_female" name="biographic_info_eye_color" value="blue" <?php echo (showData('biographic_info_eye_color') == 'blue') ? 'checked' : '' ?>>
                <label for="p2_female">Female</label>
            </div>
        </div>
    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 15</b></p>
   <div class=" form-group">
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">10. Mailing Address</label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
            <input type="text" class="form-control" name="information_about_you_residence_care_of_name" maxlength="86"
                value="<?php echo showData('information_about_you_residence_care_of_name') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div style="margin-left:1.5%; margin-right: 1.5%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="63" class="form-control" name="" value="<?php echo showData('') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value"
                    maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row"
            style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name="information_about_you_residence_state"
                        style="width: 100%; padding: 5px; margin-top: 3%;">
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
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address
                    only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_province"
                        maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address
                    only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_residence_postal_code"
                        maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address
                    only)</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="form-group">
        <div class="form-group" style="margin-bottom: 10px;">
            <h4 class="" style="width: 100%; margin-bottom: 5px;">11. Physical Address</h4>
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="information_about_you_residence_care_of_name"
                    maxlength="86" value="<?php echo showData('information_about_you_residence_care_of_name') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style=" margin-bottom: 5px; font-size:13px;">Street Number and Name (Do
                        not provide a PO Box in this space unless it is your ONLY address.)</label>
                    <div style="width: 100%;">
                        <input type="text" maxlength="63" class="form-control" name=""
                            value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                    <div style="flex: 1; margin-left: 5%;">
                        <label>
                            <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt"
                                <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste"
                                <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr"
                                <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value"
                        maxlength="5"
                        value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row"
                style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="63"
                            value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="information_about_you_residence_state"
                            style="width: 100%; padding: 5px; margin-top: 3%;">
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
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                    <div class='d-flexible'>
                        <div style="width: 50%;">
                            <input type="text" class="form-control" name="" maxlength="5"
                                value="<?php echo showData('') ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                        <div style="width: 40%;">
                            <input type="text" class="form-control" name="" maxlength="5"
                                value="<?php echo showData('') ?>"
                                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_province"
                            maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_residence_postal_code"
                            maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address
                        only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="37"
                            value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>12. Current Marital Status</label><br>
        <div style="margin-left:2%">
            <input type="radio" id="hair_bald" name="biographic_info_hair_color" value="bald"
                <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
            <label for="hair_bald">Single, Never Married</label><br>

            <input type="radio" id="hair_black" name="biographic_info_hair_color" value="black"
                <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
            <label for="hair_black">Married</label><br>

            <input type="radio" id="hair_blond" name="biographic_info_hair_color" value="blond"
                <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
            <label for="hair_blond">Divorced</label><br>

            <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown"
                <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
            <label for="hair_brown">Widowed</label><br>

            <input type="radio" id="hair_gray" name="biographic_info_hair_color" value="gray"
                <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
            <label for="hair_gray">Separated</label><br>

            <input type="radio" id="hair_red" name="biographic_info_hair_color" value="red"
                <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
            <label for="hair_red">Marriage Annulled </label><br>

            <input type="radio" id="hair_sandy" name="biographic_info_hair_color" value="sandy"
                <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
            <label for="hair_sandy">Other (Explain):</label>
            <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-md-10">13. U.S. Armed Forces <br> Are you a member or veteran of any branch of the U.S. Armed Forces?</label>
        <div class="col-md-2"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-12">14. Information About Your Admission into the United States and Current
            Immigration Status</label><br><br>
        <p style='margin-left:20px'><b>A. I arrived in the following manner</b></p><br>
        <p style='margin-left:20px'><b>Port-of-Entry</b></p>
    </div>
    <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 2; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_residence_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
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
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Date of Entry (mm/dd/yyyy)</label>
            <input type="date" class="form-control" name="" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <h5 style="margin-left:25px"><b>Exact Name Used at Time of Entry</b> </h5>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35"
                value="<?php echo showData('information_about_you_current_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27"
                value="<?php echo showData('information_about_you_current_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22"
                value="<?php echo showData('information_about_you_current_middle_name') ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">B. I used the following travel document to be admitted to the United
            States</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"
                    style="margin-left: 30px;"><?php echo createCheckbox("Passport") ?>Passport</label>
                <label class="control-label"
                    style="margin-left: 30px;"><?php echo createCheckbox("Travel Document") ?>Travel Document</label>
            </div>
        </div>

        <div class=" col-md-5">
            <label class="control-label " style="margin-left: 15px;">Passport Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_family_last_name"
                    maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Travel Document Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_given_first_name"
                    maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
        </div>

        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Country of Issuance for Passport or</label> <br>
            <label class="control-label " style="margin-left: 15px;">Travel Document</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_family_last_name"
                    maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Date Passport or Travel Document </label>
            <label class="control-label " style="margin-left: 15px;">Issued (mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_current_given_first_name"
                    maxlength="" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 3 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
    <h4><b>Part 2. Information About You (continued)</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">C. I am</label>
        <div style="margin-left:2%">
            <input type="radio" id="status_LPR" name="status" value="LPR" <?php echo (showData('status') == 'LPR') ? 'checked' : '' ?>>
            <label for="status_LPR">A Lawful Permanent Resident (LPR)</label><br>
            <input type="radio" id="status_Nonimmigrant" name="status" value="Nonimmigrant"<?php echo (showData('status') == 'Nonimmigrant') ? 'checked' : '' ?>>
            <label for="status_Nonimmigrant">A Nonimmigrant</label><br>
            <input type="radio" id="status_Refugee" name="status" value="Refugee/Asylee"<?php echo (showData('status') == 'Refugee/Asylee') ? 'checked' : '' ?>>
            <label for="status_Refugee">A Refugee/Asylee</label><br>
            <input type="radio" id="status_Other" name="status" value="Other"<?php echo (showData('status') == 'Other') ? 'checked' : '' ?>>
            <label for="status_Other">Other (Explain):</label>
            <input type="text" class="form-control" name="status_other" maxlength="37" value="<?php echo showData('status_other') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
        <p><b>NOTE</b>: If you select “Other” and you need extra space to complete this section, use the space provided
            in <b>Part 11.Additional Information</b>.</p>
    </div>
    <div class="form-group">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">D. I obtained LPR status through adjustment of status in the United States or admission as a LPR (if applicable)</label>
    </div>
    <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Date I became a LPR</label> <br>
            <label class="control-label " style="margin-left: 15px;">(mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_current_family_last_name" maxlength="" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-8">
            <label class="control-label " style="margin-left: 15px;">U.S. Citizenship and Immigration Services (USCIS) Office That Granted My LPR </label>
            <label class="control-label " style="margin-left: 15px;">Status or Location Where I Was Admitted</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_given_first_name"  maxlength="" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
        </div>
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">15. Have you previously applied for a Certificate of Citizenship or U.S. Passport?</label> <br>
        <div class="col-md-2 col-md-offset-7"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 15.</b>, provide an explanation below. If you need extra space to complete this section, use
        the space provided in <b>Part 11. Additional Information</b></p>
        <input type="text" class="form-control" name="status_other" maxlength="37" value="<?php echo showData('status_other') ?>" style="width: 95%; padding: 5px; margin:0px 0px 5px 2%" />
        </div>
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">16. Have you ever abandoned or lost your LPR status?</label> <br>
        <div class="col-md-2 col-md-offset-4"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 16.</b>, provide an explanation below. If you need extra space to complete this section, use
        the space provided in <b>Part 11. Additional Information.</b></p>
        <input type="text" class="form-control" name="status_other" maxlength="37" value="<?php echo showData('status_other') ?>" style="width: 95%; padding: 5px; margin:0px 0px 5px 2%" />
        </div>
        
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">17. Were you adopted?</label> <br>
        <div class="col-md-2 col-md-offset-2"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 17</b>., complete <b>Items A. - D.</b></p>
        <p class="col-md-12"><b>A.</b> Place of Final Adoption</p>
        </div>

        <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_residence_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
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
        <div class="form-group" style="flex: 2; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
            <input type="text" class="form-control" name="" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">B. Date of Adoption <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>"></div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">C. Date Legal Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>"></div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">D. Date Physical Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"> <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>"> </div>
    </div>
        <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">18. Did you have to be re-adopted in the United States?</label> <br>
        <div class="col-md-2 col-md-offset-4"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
        <p class="col-md-12">If you answered "Yes" to <b>Item Number 18</b>., complete <b>Items A. - D.</b></p>
        <p class="col-md-12"><b>A.</b> Place of Final Adoption</p>
        </div>

        <div class="row"
        style="display: flex; flex-wrap: wrap;  margin:0px 0px 10px 20px;  justify-items:center; align-items: center; width:98% ">
        <div class="form-group" style="flex: 1.5; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
                <select class="form-control" name="information_about_you_residence_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
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
        <div class="form-group" style="flex: 2; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
            <input type="text" class="form-control" name="" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">B. Date of Adoption <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>"></div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">C. Date Legal Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"><input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>"></div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">D. Date Physical Custody Began <br>(mm/dd/yyyy)</label>
        <div class="col-md-12"> <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>"> </div>
    </div>

    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">19. Were your parents married to each other when you were born (or adopted)?</label> <br>
        <div class="col-md-2 col-md-offset-6"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
    </div>
    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">20. Did your parents marry after you were born?</label> <br>
        <div class="col-md-2 col-md-offset-4"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
    </div>
    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">21. Do you regularly reside in the United States in the legal and physical custody of your U.S. citizen parents?</label> <br>
        <div class="col-md-2 col-md-offset-8"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 4 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 2. Information About You (continued)</b></h4></div>
    <div class="form-group">
        <label class="control-label " style="margin-left: 15px;">22. Have you been absent from the United States since you first arrived?</label> <br>
        <div class="col-md-2 col-md-offset-8"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
    </div>
    <div class="form-group">
      <p style='margin-left:20px'>Complete the following information <b>only if you are claiming U.S. citizenship at the time of birth if you were born before
      October 10, 1952.</b> If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information</b>.</p>
    </div>
    <div class=" col-md-5">
            <label class="control-label " style="margin-left: 15px;">A. Date You Left the United States <br>(mm/dd/yyyy)</label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_current_family_last_name" maxlength="" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label " style="margin-left: 15px;">B. Date You Returned to the <br>United States (mm/dd/yyyy) </label>
            <div class="col-md-12">
                <input type="date" class="form-control" name="information_about_you_current_given_first_name"  maxlength="" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
        </div>
        <div class="row form-group" >
            <label class="control-label" style="width: 100%; margin:0px 0px 5px 10px">C. Place of Entry Upon Return to the United States</label>
        <div class="form-group col-md-6">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div>
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" style=" margin-bottom: 5px;">State</label>
                <select class="form-control" name="information_about_you_residence_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
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
    <div class="row form-group" >
        <div class="form-group col-md-4">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">D. Date You Left the United States <br>(mm/dd/yyyy)</label>
            <div>
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">E. Date You Returned to the <br>United States (mm/dd/yyyy)</label>
            <div>
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>" />
            </div>
        </div>

    </div>
    <div class="row form-group" >
            <label class="control-label" style="width: 100%; margin:0px 0px 5px 10px">F. Place of Entry Upon Return to the United States</label>
        <div class="form-group col-md-6">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div>
                <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label" style=" margin-bottom: 5px;">State</label>
                <select class="form-control" name="information_about_you_residence_state"
                    style="width: 100%; padding: 5px; margin-top: 3%;">
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
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 3. Biographic Information</b></h4></div>

    <div class="form-group">
        <label class="control-label col-md-12">1. Ethnicity (Select only one box)</label>
        <div class="col-md-6 ">
            <div class="form-group">
                <input type="radio" id="bg_info_ethnicity" style="margin-left: 30px;" name="biographic_info_hair_color" value="bald" <?php echo (showData('biographic_info_ethnicity') == '') ? 'checked' : '' ?>>
                <label for="bg_info_ethnicity">Hispanic or Latino</label>
                <input type="radio" id="bg_info_latino" style="margin-left: 30px;" name="biographic_info_hair_color" value="black" <?php echo (showData('biographic_info_ethnicity') == '') ? 'checked' : '' ?>>
                <label for="bg_info_latino">Not Hispanic or Latino</label>
        </div>
    </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">2. Race (Select all applicable boxes)</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_white") ?>White</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_asian") ?>Asian</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_black_african") ?>Black or African American</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_american_native") ?>American Indian or Alaska Native</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("biographic_info_race_native_islander") ?>Native Hawaiian or Other Pacific Islander</label>
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
            <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father)</b></h4></div>
                <p style='margin-left:20px'><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. biological father (of adoptive father). <b>Provide
                    information about yourself</b> if you are a U.S. citizen father applying for a Certificate of Citizenship on behalf of your minor biological or adopted child</p>
              <div><h5><b>1. Current Legal Name of U.S. Citizen Father</b> </h5></div>
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
                    <label class="control-label " style="margin-left: 15px;">Middle Name
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 5 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father) (continued)</b></h4></div>
             
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">2. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">3. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">4. Country of Citizenship or Nationality</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
        <label class="control-label col-md-12">5. Physical Address</label>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin-bottom: 5px;">Street Number and Name (Type or print "Deceased" and the date of death if your father has passed away.)</label>
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
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="26" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">6. My father is a U.S. citizen by</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("Passport") ?>Birth in the United States</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("Travel Document") ?>Acquisition after birth through naturalization of alien parents</label> <br>
                <label class="control-label" ><?php echo createCheckbox("Travel Document") ?>Birth abroad to U.S. citizen parents</label>
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Certificate of Citizenship Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="information_about_you_current_given_first_name"maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("Passport") ?>Naturalization</label>   
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Place of Naturalization (Name of Court or USCIS Office Location)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class='row col-md-12'>
            <div class=" col-md-6">
                <label class="control-label" >City or Town</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                </div>
            </div>
                   <div class="form-group col-md-3" >
                      <label class="control-label" >State</label>
                        <select class="form-control" name="" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">Certificate of Naturalization Number</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">A-Number (if any)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Date of Naturalization (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label " style="margin-left: 15px;">7. Has your father ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</label> <br>
              <div class="col-md-2 col-md-offset-4"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
            </div>
                  <P style='margin-left:20px'>If you answered “Yes” to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information</b>.</P>
                  <P style='margin-left:20px'><b>8. Marital History</b></P>
            <div class=" col-md-10">
            <label class="control-label" style='margin-left:20px' >A. How many times has your U.S. citizen father been married (including annulled marriages and marriages to the same person)?</label>
            </div>
             <div class=" col-md-2">
                <input type="text" class="form-control" name="information_about_you_current_given_first_name"maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>

    <div class="form-group">
        <label style='margin-left:10px'>B. What is your U.S. citizen father's current marital status?</label><br>
        <div style="margin-left:2%">
            <input type="radio" id="hair_bald" name="biographic_info_hair_color" value="bald"
                <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
            <label for="hair_bald">Single, Never Married</label><br>

            <input type="radio" id="hair_black" name="biographic_info_hair_color" value="black"
                <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
            <label for="hair_black">Married</label><br>

            <input type="radio" id="hair_blond" name="biographic_info_hair_color" value="blond"
                <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
            <label for="hair_blond">Divorced</label><br>

            <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown"
                <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
            <label for="hair_brown">Widowed</label><br>

            <input type="radio" id="hair_gray" name="biographic_info_hair_color" value="gray"
                <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
            <label for="hair_gray">Separated</label><br>

            <input type="radio" id="hair_red" name="biographic_info_hair_color" value="red"
                <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
            <label for="hair_red">Marriage Annulled </label><br>

            <input type="radio" id="hair_sandy" name="biographic_info_hair_color" value="sandy"
                <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
            <label for="hair_sandy">Other (Explain):</label>
            <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
        <p style='margin-left:20px'>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></p>
      </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 6 of 15</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;"><h4><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father) (continued)</b></h4></div>
             
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">2. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">3. Country of Birth </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">4. Country of Citizenship or Nationality</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
        <label class="control-label col-md-12">5. Physical Address</label>
    <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 3.5; margin-bottom: 10px;">
                    <label  style=" margin-bottom: 5px;">Street Number and Name (Type or print "Deceased" and the date of death if your father has passed away.)</label>
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
                <div style="flex: 0.6;">
                    <label class="control-label">Number</label>
                    <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
                <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="63" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                    <div style="width: 100%;">
                        <select class="form-control" name="" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code + 4</label>
                <div class='d-flexible'>
                    <div style="width: 50%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>"  style="width: 100%; padding: 5px; margin-bottom: 5px;" /> 
                    </div>
                    <div style="width: 40%;">
                        <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="26" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="9" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                    <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country (foreign address only)</label>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">6. My father is a U.S. citizen by</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("Passport") ?>Birth in the United States</label>
                <label class="control-label" style="margin-left: 30px;"><?php echo createCheckbox("Travel Document") ?>Acquisition after birth through naturalization of alien parents</label> <br>
                <label class="control-label" ><?php echo createCheckbox("Travel Document") ?>Birth abroad to U.S. citizen parents</label>
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Certificate of Citizenship Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " style="margin-left: 15px;">Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="information_about_you_current_given_first_name"maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label"><?php echo createCheckbox("Passport") ?>Naturalization</label>   
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label " >Place of Naturalization (Name of Court or USCIS Office Location)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
            </div>
        </div>
        <div class='row col-md-12'>
            <div class=" col-md-6">
                <label class="control-label" >City or Town</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                </div>
            </div>
                   <div class="form-group col-md-3" >
                      <label class="control-label" >State</label>
                        <select class="form-control" name="" style="width: 100%; padding: 5px; margin-top: 3%;">
                            <option value=''>Select</option>
                            <?php
                            foreach ($allDataCountry as $record) {
                                if ($record->state_code == showData('')) $selected = "selected";
                                else $selected = "";
                                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 12px;">Certificate of Naturalization Number</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">A-Number (if any)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Date of Naturalization (mm/dd/yyyy)</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label " style="margin-left: 15px;">7. Has your father ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</label> <br>
              <div class="col-md-2 col-md-offset-4"><?php echo createRadio("additional_info_us_citizen_status") ?></div>
            </div>
                  <P style='margin-left:20px'>If you answered “Yes” to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information</b>.</P>
                  <P style='margin-left:20px'><b>8. Marital History</b></P>
            <div class=" col-md-10">
            <label class="control-label" style='margin-left:20px' >A. How many times has your U.S. citizen father been married (including annulled marriages and marriages to the same person)?</label>
            </div>
             <div class=" col-md-2">
                <input type="text" class="form-control" name="information_about_you_current_given_first_name"maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
            </div>

    <div class="form-group">
        <label style='margin-left:10px'>B. What is your U.S. citizen father's current marital status?</label><br>
        <div style="margin-left:2%">
            <input type="radio" id="hair_bald" name="biographic_info_hair_color" value="bald"
                <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>>
            <label for="hair_bald">Single, Never Married</label><br>

            <input type="radio" id="hair_black" name="biographic_info_hair_color" value="black"
                <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>>
            <label for="hair_black">Married</label><br>

            <input type="radio" id="hair_blond" name="biographic_info_hair_color" value="blond"
                <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>>
            <label for="hair_blond">Divorced</label><br>

            <input type="radio" id="hair_brown" name="biographic_info_hair_color" value="brown"
                <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>>
            <label for="hair_brown">Widowed</label><br>

            <input type="radio" id="hair_gray" name="biographic_info_hair_color" value="gray"
                <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>>
            <label for="hair_gray">Separated</label><br>

            <input type="radio" id="hair_red" name="biographic_info_hair_color" value="red"
                <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>>
            <label for="hair_red">Marriage Annulled </label><br>

            <input type="radio" id="hair_sandy" name="biographic_info_hair_color" value="sandy"
                <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>>
            <label for="hair_sandy">Other (Explain):</label>
            <input type="text" class="form-control" name="" maxlength="37" value="<?php echo showData('') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
        <p style='margin-left:20px'>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></p>
      </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>