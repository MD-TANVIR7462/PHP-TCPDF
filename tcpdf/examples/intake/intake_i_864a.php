<?php
$meta_title     =   "INTAKE FORM i_864A";
$page_heading   =   "INTAKE FORM i_864A, Contract Between Sponsor and Household Member";
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

    .my-1 {
        margin: 6px 0  0 0 ;
    }
.d-flex{
display: flex;
}
    .text-bold {
        font-weight: 600;

    }
</style>
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 8</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">For Government Use Only</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_864a_g_28_checkbox") ?> Select this box if Form G-28 or G-28I is attached.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>" disabled>
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row ">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You (the Household Member)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Full Name </i></b></h4>
            </div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">1. Family Name(Last Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Given Name(First Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Middle Name</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 10px;">
          <div class="bg-info">
                <h4><b><i>Mailing Address </i></b></h4>
            </div>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
            <input type="text" class="form-control" name="information_about_you_us_mailing_care_of_name" maxlength="34"
                value="<?php echo showData('information_about_you_us_mailing_care_of_name') ?>"
                style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
    </div>
    <div style="margin:0px 2% 0px 2%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value"
                    maxlength="5" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row"
            style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="28" value="<?php echo showData('information_about_you_us_mailing_city_town') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name="information_about_you_us_mailing_state"
                        style="width: 100%; padding: 5px; margin-top: 3%;">
                        <option value=''>Select</option>
                        <?php
foreach ($allDataCountry as $record)
{
    if ($record->state_code == showData('information_about_you_us_mailing_state')) $selected = "selected";
    else $selected = "";
    echo "<option value='$record->state_code' $selected>$record->state_code</option>";
}
?>
                    </select>
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                <div class='d-flexible'>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_us_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code') ?>"
                            style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>     

<div class="row">
<div class="col-md-4" >
                <label class="control-label ">Province</label>
           
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
         
            </div>
            <div class="col-md-3">
                <label class="control-label ">Postal Code</label>
           
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
          
            </div>
            <div class="col-md-5">
                <label class="control-label ">Country</label>
  <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
    </div>
</div>
    <div >
        <label class=" col-md-6 my-4">3. Is your current mailing address the same as your physical address?
        </label>
        <div class="col-md-2">
            <?php echo createRadio("is_your_current_mailing_address_same_as_physical") ?>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">If you answered "No" to Item Number 3., provide your physical address.</label>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
    <div class="bg-info">
                <h4><b><i>Physical Address 
                </i></b></h4>
            </div>
    </div>
    <div style="margin:0px 2% 0px 2%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="information_about_you_home_street_number" value="<?php echo showData('information_about_you_home_street_number') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt"
                            <?php echo (showData('information_about_you_home_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste"
                            <?php echo (showData('information_about_you_home_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr"
                            <?php echo (showData('information_about_you_home_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value"
                    maxlength="5" value="<?php echo showData('information_about_you_home_apt_ste_flr_value') ?>"
                    style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row"
            style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="information_about_you_home_city_town" maxlength="28" value="<?php echo showData('information_about_you_home_city_town') ?>"
                        style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                    <select class="form-control" name="information_about_you_home_state"
                        style="width: 100%; padding: 5px; margin-top: 3%;">
                        <option value=''>Select</option>
                        <?php
foreach ($allDataCountry as $record)
{
    if ($record->state_code == showData('information_about_you_home_state')) $selected = "selected";
    else $selected = "";
    echo "<option value='$record->state_code' $selected>$record->state_code</option>";
}
?>
                    </select>
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code </label>
                <div class='d-flexible'>
                    <div style="width: 100%;">
                        <input type="text" class="form-control" name="information_about_you_home_zip_code" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
<div class="col-md-4" >
                <label class="control-label ">Province</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-3">
                <label class="control-label ">Postal Code</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-5">
                <label class="control-label ">Country</label>
                      <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
    </div>
</div>
</div>
    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 2 of 8</b></p>
    <div class="row ">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You (the Household Member) (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Other Information </i></b></h4>
            </div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">5. Date of Birth (mm/dd/yyyy)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">6. Country of Birth</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">7. U.S. Social Security Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>
          <div class="form-group">
          <div class="col-md-5">
                <label class="control-label ">8. Alien Registration Number (A-Number) (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-5">
                <label class="control-label ">9.  USCIS Online Account Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
          </div>
          <div class="form-group" style="margin-bottom: 10px;">
          <div class="bg-info">
                <h4><b>Part 2. Your (the Household Member's) Relationship to the Sponsor</b></h4>
            </div>

    </div>
    <label class="control-label" style=" margin-bottom: 5px;">Select Item Number 1., 2., or 3.</label>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <span class="d-flexible">
                        <b>1. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>I am the intending immigrant and also the sponsor's spouse
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <span class="d-flexible">
                        <b>2. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>I am the intending immigrant and also a member of the sponsor's household
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">
                    <span class="d-flexible">
                        <b>3. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>I am not the intending immigrant. I am the sponsor's household member. I am related to the sponsor as his/her: 
                    </span>
                </label>
            </div>

            
            <div class="form-group">
                <label class="control-label col-md-8 mx-5">
                    <span class="d-flexible">
                        <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Spouse
                    </span>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-8 mx-5">
                    <span class="d-flexible">
                        <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Son or Daughter (at least 18 years of age)
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-8 mx-5">
                    <span class="d-flexible">
                        <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Parent
                    </span>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-8 mx-5">
                    <span class="d-flexible">
                        <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Brother or Sister
                    </span>
                </label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-8 mx-5">
                    <span class="d-flexible">
                        <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Other Dependent (Specify)
                    </span>
                    <input type="text" maxlength="34" class="form-control" name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
                </label>
            </div>
         <div class="form-group" style="margin-bottom: 5px;">
             <div class="bg-info">
                <h4><b><i>Part 3. Your (the Household Member's) Employment and Income </i></b></h4>
            </div>
         </div>
         <label class="control-label mx-4" style=" margin-bottom: 5px;">I am currently:</label>

         <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       1. <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>

            <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       2. Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>

         <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       3. Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>
         <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       4. <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>
         <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       5. <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>
         <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       6. <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
            </div>
         <div class="form-group d-flexible">
             <span class="col-md-6 ">
                        <label class="control-label ">
                       7. Name of Employer Number 2 (if applicable)
                    </label>
                    </span>
                    <input type="text" maxlength="34" class="form-control col-md-4 " name="information_about_you_us_mailing_street_number" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
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
    <p style="text-align: right"><b>Page 3 of 8</b></p>
    <div class="row ">
        <div class="col-md-12">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 4. Your (the Household Member's) Federal Income Tax Information and Assets</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10">1. Have you filed a Federal income tax return for each of the three most recent tax years?</label>
                    <div class="col-md-2 "><?php echo createRadio("sponsor_principal_status") ?></div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">NOTE: You MUST attach a photocopy or transcript of your Federal income tax return for only the most recent tax year.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">My total income (adjusted gross income on IRS Form 1040EZ) as reported on my Federal income tax returns for the most recent three years was:</label>
            </div>
            <div class="form-group" >
                <label class="control-label col-md-2 my-1">2. Most Recent</label>
                <div class="form-group">
                <label class="control-label col-md-2 my-1">Tax Year</label>
                    <div class="col-md-2 "> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                    <label class="control-label col-md-2 my-1">Total Income</label>
                        <div class="col-md-2 "> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-md-2 my-1">2nd Most Recent</label>
                <div class="form-group">
                <label class="control-label col-md-2 my-1">Tax Year</label>
                    <div class="col-md-2 "> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                    <label class="control-label col-md-2 my-1">Total Income</label>
                        <div class="col-md-2 "> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-md-2 my-1">3rd Most Recent</label>
                <div class="form-group">
                <label class="control-label col-md-2 my-1">Tax Year</label>
                    <div class="col-md-2 "> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                    <label class="control-label col-md-2 my-1">Total Income</label>
                        <div class="col-md-2 "> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
            <div class="form-group" ><label class="control-label col-md-12 ">My assets (complete only if necessary).</label></div>
            <div class="form-group" >
                <label class="control-label col-md-8 my-1">3. Enter the balance of all cash, savings, and checking accounts. </label>
                <div class="form-group">
                    <div class="col-md-4"> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-md-8 my-1">4. Enter the net cash value of real-estate holdings. (Net value means assessed value minus mortgage debt.) $ </label>
                <div class="form-group">
                    <div class="col-md-4"> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-md-8 my-1">5. Enter the cash value of all stocks, bonds, certificates of deposit, and other assets not listed on Item Numbers 3. - 4.</label>
                <div class="form-group">
                    <div class="col-md-4"> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
            <div class="form-group" >
                <label class="control-label col-md-8 my-1">6. Add together Item Numbers 3. - 5. and enter the number here.</label>
                <div class="form-group">
                    <div class="col-md-4"> <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                </div>
            </div>
        
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            </div> 
            <label class="control-label ">NOTE: Read the Penalties section of the Form I-864A Instructions before completing this part. </label>
            <div class="form-group">
          <div class="col-md-2"> <label class="control-label ">I, THE SPONSOR,</label></div>
          <div class="col-md-4"> <input type="text" maxlength="29" class="form-control " name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
          <div class="col-md-6"> <label class="control-label ">,in consideration of the household member's promise</label></div>
          <div class="col-md-12"> <label class="control-label ">to support the following intending immigrants and to be jointly and severally liable for any obligations I incur under the affidavit</label></div>
          <div class="col-md-12"> <label class="control-label ">of support, promise to complete and file an affidavit of support on behalf of the following named intending immigrants.</label></div>
          <div class="col-md-4"> <input type="text" maxlength="29" class="form-control " name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
        </div>

        <div class="form-group"><label class="control-label ">1. Intending Immigrant Number 1</label></div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Family Name (Last Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Given Name (First Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Middle Name (if applicable)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Alien Registration Number (A-Number, if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">USCIS Online Account Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
          </div>



        <div class="form-group"><label class="control-label ">2. Intending Immigrant Number 2</label></div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Family Name (Last Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Given Name (First Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Middle Name (if applicable)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Alien Registration Number (A-Number, if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">USCIS Online Account Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
          </div>
        <div class="form-group"><label class="control-label ">3. Intending Immigrant Number 3</label></div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Family Name (Last Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Given Name (First Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Middle Name (if applicable)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Alien Registration Number (A-Number, if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">USCIS Online Account Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
          </div>
</div>
</div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
----------------------------------------------------------------------->
<!-- <fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 8</b></p>
<div class="row">
<div class="bg-info" style="margin-top:10px;"><h4><b>Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature (continued)</b></h4></div>
<div class="form-group"><label class="control-label ">4. Intending Immigrant Number 4</label></div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Family Name (Last Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Given Name (First Name)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Middle Name (if applicable)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>
          <div class="form-group">
          <div class="col-md-4">
                <label class="control-label ">Date of Birth (mm/dd/yyyy)</label>
                    <input type="date" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">Alien Registration Number (A-Number, if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-4">
                <label class="control-label ">USCIS Online Account Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
          </div>
          <div class="bg-info" style="margin-top:10px;"><h4><b><i>Sponsor's Statement</i></b></h4></div>
          <div class="form-group">
                <label class="control-label col-md-12">
                    <span class="d-flexible">
                        <b>5.a. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>I can read and understand English, I and have read and understand every question and instruction on this contract and my
                        answer to every question
                    </span>
                </label>
            </div>

          <div class="form-group">
                <label class="control-label ">
                    <span class="d-flexible col-md-12">
                        <b>5.b. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>The interpreter named in Part 7. read to me every question and instruction on this contract and my answer to every 
                    </span>    
            </div>
            <div class="form-group">
          <div class="col-md-2"> <label class="control-label ">question in</label></div>
          <div class="col-md-4"> <input type="text" maxlength="29" class="form-control " name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
          <div class="col-md-6"> <label class="control-label ">, a language in which I am fluent, and I understood everything. </label></div>
        </div>

            <div class="form-group">
                <div class="col-md-5"> <label class="control-label "><b>6. </b> <?php echo createCheckbox("i_864a_i_can_read_understand_english_status") ?>At my request, the preparer named in Part 8.,</label></div>
                    <div class="col-md-4"> <input type="text" maxlength="29" class="form-control " name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" /></div>
                 <div class="col-md-3"> <label class="control-label ">, prepared this contract for</label></div>
            </div>


            <div class="form-group">
          <div class="col-md-12"> <label class="control-label ">me based only upon information I provided or authorized.</label></div>
        </div>

        <div class="bg-info" style="margin-top:10px;"><h4><b><i>Sponsor's Contact Information</i></b></h4></div>

        <div class="form-group">
          <div class="col-md-6">
                <label class="control-label ">7. Sponsor's Daytime Telephone Number</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">8. Sponsor's Mobile Telephone Number (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
            </div>
            <div class="col-md-6">
                <label class="control-label ">9. Sponsor's Email Address (if any)</label>
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
          </div>

          <div class="bg-info " style="margin-top:10px;"><h4><b><i>Sponsor's Declaration and Certification</i></b></h4></div>
          <label class="control-label mx-4">Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that U.S.
            Citizenship and Immigration Services (USCIS) or the U.S. Department of State (DOS) may require that I submit original documents
            to USCIS or DOS at a later date. Furthermore, I authorize the release of any information from any and all of my records that USCIS
            or DOS may need to determine my eligibility for the immigration benefit that I seek.
            I furthermore authorize release of information contained in this contract, in supporting documents, and in my USCIS or DOS records,
            to other entities and persons where necessary for the administration and enforcement of U.S. immigration law.
            I certify, under penalty of perjury, that all of the information in my contract and any document submitted with it were provided or
            authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my contract and that all of
            this information is complete, true, and correct</label>

            <div class="bg-info" style="margin-top:10px;"><h4><b><i>Sponsor's Signature</i></b></h4></div>
<div class="form-group">
  <div class="col-md-8">
        <label class="control-label ">10. Sponsor's Signature</label>
            <input type="text" readonly  maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
    </div>
    <div class="col-md-4">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
            <input type="date"  maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
    </div>
  </div>
  <label class="control-label mx-4" >NOTE TO ALL SPONSORS: If you do not completely fill out this contract or fail to submit required documents listed in the
  Instructions, USCIS may deny your contract.</label>

</div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
----------------------------------------------------------------------->
<!-- <fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 5 of 8</b></p>
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 6. Your (the Household Member's) Promise, Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            </div>
            <div class="form-group">
                <span class="d-flexible my-5">
                    <span>
                  <b>NOTE:</b> Read the Penalties section of the Form I-864A Instructions before completing this par
                    </span>
                </span>
<div class="row">
    <p class="col-md-3 my-4"><b>I, THE HOUSEHOLD MEMBER</b></p>
    <p class="col-md-3"> <input type="text"  maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" /></p>
    <p class="col-md-5 my-4"><b>, in consideration of the sponsor's promise to complete</b></p>
    <p class="col-md-7 my-4"><b>and file an affidavit of support on behalf of the above named intending immigrants</b></p>
    <p class="col-md-2"> <input type="text"  maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" /></p>
    <p class="col-md-3 my-4"><b>(Print number of intending</b></p>
    <p class="col-md-12 my-4"><b>immigrants noted in Part 5. Sponsor's Promise, Statement, Contact Information, Declaration, Certification, and Signature.)</b></p>
</div>
    



                <span class="d-flexible my-5"><b>A.</b>
                    <span>
                    Promise to provide any and all financial support necessary to assist the sponsor in maintaining the sponsored immigrants at or
above the minimum income provided for in the Immigration and Naturalization Act (INA) section 213A(a)(1)(A) (not less than
125 percent of the Federal Poverty Guidelines) during the period in which the affidavit of support is enforceable;
                    </span>
                </span>
                <span class="d-flexible my-5"><b>B.</b>
                    <span>
                    Agree to be jointly and severally liable for payment of any and all obligations owed by the sponsor under the affidavit of support
to the sponsored immigrants, to any agency of the Federal Government, to any agency of a state or local government, or to any
other private entity that provides means-tested public benefits;
                    </span>
                </span>
                <span class="d-flexible my-5"><b>C.</b>
                    <span>
                    Certify under penalty under the laws of the United States that the Federal income tax returns submitted in support of the contract
                    are true copies or unaltered tax transcripts filed with the Internal Revenue Service;
                    </span>
                </span>
                <span class="d-flexible my-5"><b>D.</b>
                    <span>
                    Consideration where the household member is also the sponsored immigrant: I understand that if I am the sponsored immigrant
and a member of the sponsor's household that this promise relates only to my promise to be jointly and severally liable for any obligation
owed by the sponsor under the affidavit of support to any of my dependents, to any agency of the Federal Government, to any agency of
a state or local government, or to any other private entity that provides means-tested public benefits and to provide any and all financial
support necessary to assist the sponsor in maintaining any of my dependents at or above the minimum income provided for in INA
section 213A(a)(1)(A) (not less than 125 percent of the Federal Poverty Guideline) during the period which the affidavit of support is
enforceable.
                    </span>
                </span>
                <span class="d-flexible my-5"><b>E.</b>
                    <span>
                    I understand that, if I am related to the sponsored immigrant or the sponsor by marriage, the termination of the marriage (by
                    divorce, dissolution, annulment, or other legal process) will not relieve me of my obligations under this Form I-864A.
                    </span>
                </span>
                <span class="d-flexible my-5"><b>F.</b>
                    <span>
                    I authorize the Social Security Administration to release information about me in its records to the Department of State and U.S.
                    Citizenship and Immigration Services (USCIS).
                    </span>
                </span>
            </div>
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
           <div class="row">
           <div class="col-md-6">
                <label class="control-label ">3. Your (the Household Member's) Daytime Telephone
                    Number</label>
                <div >
                    <input type="text" class="form-control  " name="i_864a_household_member_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_household_member_daytime_tel') ?>">
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label ">4. Your (the Household Member's) Mobile Telephone
                    Number (if any)</label>
                <div >
                    <input type="text" class="form-control" name="i_864a_household_member_mobile" maxlength="10" value="<?php echo showData('i_864a_household_member_mobile') ?>">
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label ">5. Your (the Household Member's) Email Address (if any)</label>
                <div >
                    <input type="email" class="form-control" name="i_864a_household_member_email" maxlength="41" value="<?php echo showData('i_864a_household_member_email') ?>">
                </div>
            </div>
           </div>

        
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;"><b>Page 7 of 8</b></p>
    <div class=" row mt-5 gap-4">
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 7. Interpreter's Contact Information, Certification, and Signature (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I certify, under penalty of perjury, that: that I am fluent in English and</p>
                <div class="col-md-5">
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
                <label class="control-label col-md-8">6. Interpreter's Signature</label>
                <label class="control-label col-md-4">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" disabled />
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" name="i_864a_interpreter_sign_date" value="<?php echo showData('i_864a_interpreter_sign_date') ?>" />
                </div>
            </div>
         
        </div>
        <div class="col-md-12">
            <div class="bg-info">
                <h4><b>Part 8. Contact Information, Declaration, and Signature of the Person Preparing this Contract, if Other
                Than the Sponsor or Household Member</b> </h4>
            </div>
           
<div>
    <div class="bg-info">
                <h4><b>Preparer's Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_mobile" maxlength="10" value="<?php echo showData('i_864a_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="41" name="i_864a_preparer_email" value="<?php echo showData('i_864a_preparer_email') ?>">
                </div>
            </div>
</div>
<div>
    <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_864a_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864a_preparer_mobile" maxlength="10" value="<?php echo showData('i_864a_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="41" name="i_864a_preparer_email" value="<?php echo showData('i_864a_preparer_email') ?>">
                </div>
            </div>
</div>
<div class="bg-info">
                <h4><b> Preparer's Certification and Signature</b></h4>
            </div>
            <p class="control-label">I certify, under penalty of perjury, that I prepared this contract for the sponsor and household member at their request and with express
consent and that all of the responses and information contained in and submitted with the contract are complete, true, and correct and
reflects only information provided by the sponsor and household member. The sponsor and household member reviewed the
responses and information and informed me that they understand the responses and information in or submitted with the contract.</p>
<div class="form-group">
                <label class="control-label col-md-8">6.  Preparer's Signature</label>
                <label class="control-label col-md-4">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" disabled />
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" name="i_864a_interpreter_sign_date" value="<?php echo showData('i_864a_interpreter_sign_date') ?>" />
                </div>
            </div>

        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
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
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
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
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>