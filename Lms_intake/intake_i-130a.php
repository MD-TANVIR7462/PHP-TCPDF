<?php
$meta_title 	=   "INTAKE FOR FORM I-130A";
$page_heading 	=   "INTAKE FOR FORM I-130A, Petition for Alien Relative ";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="form-group">
        <div class="page_number">
            <b>
                <p style="text-align: right;">Page 1 of 6</p>
            </b>
        </div>


    </div>
    <div class="">
        <table style="border-collapse: collapse; ">
            <thead>
                <tr>
                    <th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To be completed by an
                        attorney or accredited representative (if any). </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td style="padding: 5px;"><?php echo createCheckbox("i_130a_g28_checkbox")?> Select this box if Form
                        G-28 is
                        attached.
                    </td>

                    <td style="padding: 5px;">
                        <div>
                            <p>Volag Number
                                (if any)</p>
                            <br>
                            <input type="text" class="form-control" disabled
                                value="<?php echo $attorneyData->volag_number ?>" maxlength="">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div>
                            <p>Attorney State Bar Number
                                (if applicable)</p>
                            <br>
                            <input type="text" class="form-control" disabled
                                value="<?php echo $attorneyData->bar_number ?>" maxlength="">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div>
                            <p>Attorney or Accredited Representative
                                USCIS Online Account Number (if any)
                            </p>
                            <input type="text" class="form-control" disabled
                                value="<?php echo $attorneyData->uscis_online_account_number ?>" maxlength="">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row  mt-3 border-add">
            <div class="col-md-6 container border-add ">
                <div class="bg-info">
                    <h4><b>Part 1. Information About You (Spouse
                            Beneficiary)</b></h4>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12">1. Alien Registration Number (A-Number) (if any)
                    </label>
                    <div class="col-md-8 col-md-offset-4">
                        <div class="d-flexible">
                            <span
                                style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                role="presentation" dir="ltr">A-</span><input type="text" class="form-control"
                                maxlength="9" name="other_information_about_you_alien_registration_number"
                                value="<?php echo showData('other_information_about_you_alien_registration_number')?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">2. USCIS Online Account Number (if any) </label>
                    <div class="col-md-8 col-md-offset-4">
                        <div class="d-flexible">
                            <span
                                style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                name="other_information_about_you_uscis_online_account_number" maxlength="12"
                                value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-info">
                        <h4><b>Your Full Name</b> </h4>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5">3.a. Family Name(Last Name)</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="information_about_you_family_last_name"
                                value="<?php echo showData('information_about_you_family_last_name')?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">3.b. Given Name(First Name)</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="information_about_you_given_first_name"
                                value="<?php echo showData('information_about_you_given_first_name')?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">3.c. Middle Name</label>
                        <div class="col-md-7">
                            <input type="text" maxlength="29" class="form-control"
                                name="information_about_you_middle_name"
                                value="<?php echo showData('information_about_you_middle_name')?>" />
                        </div>
                    </div>

                    <div class="bg-info">
                        <h4><b>Address History</b> </h4>
                    </div>

                    <p>Provide your physical addresses for the last five years, whether
                        inside or outside the United States. Provide your current
                        address first. If you need extra space to complete this section,
                        use the space provided in Part 7. Additional Information.</p>

                    <p><b>Physical Address 1</b></p>
                    <div class="form-group">
                        <label class="control-label col-md-5">4.a. Street Number and Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="information_about_you_home_street_number"
                                maxlength="25"
                                value="<?php echo showData('information_about_you_home_street_number')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-md-6"><b>4.b. </b> &nbsp;
                            <label class="control-label">
                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt"
                                    <?php echo (showData('information_about_you_home_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                                Apt. &nbsp;
                            </label>
                            <label class="control-label">
                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste"
                                    <?php echo (showData('information_about_you_home_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;
                            </label>
                            <label class="control-label">
                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr"
                                    <?php echo (showData('information_about_you_home_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                                Flr.
                            </label>

                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" type="text" class="form-control"
                                name="information_about_you_home_apt_ste_flr_value" maxlength="6"
                                value="<?php echo showData('information_about_you_home_apt_ste_flr_value')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">4.c. City or Town</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="information_about_you_home_city_town"
                                maxlength="20" value="<?php echo showData('information_about_you_home_city_town')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">4.d. State</label>
                        <div class="col-md-7">
                            <select class="form-control" name="information_about_you_home_state">
                                <option style="" value=''>Select</option>
                                <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_home_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">4.e. ZIP Code</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="information_about_you_home_zip_code"
                                maxlength="5" value="<?php echo showData('information_about_you_home_zip_code')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">4.f. Province</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="information_about_you_home_province"
                                maxlength="20" value="<?php echo showData('information_about_you_home_province')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5">4.g. Postal Code</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="information_about_you_home_postal_code"
                                maxlength="9" value="<?php echo showData('information_about_you_home_postal_code')?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-12">4.h. Country</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="information_about_you_home_country"
                                maxlength="39" value="<?php echo showData('information_about_you_home_country')?>">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 mt-5">

                <div class="form-group">
                    <label class="control-label col-md-6">5.a. Date From (mm/dd/yyyy)</label>
                    <div class="col-md-6 ">
                        <input type="date" class="form-control" name="information_about_you_residence_from_date"
                            value="<?= showData('information_about_you_residence_from_date')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">5.b. Date To (mm/dd/yyyy)</label>
                    <div class="col-md-6 ">
                        <input type="date" class="form-control" name="information_about_you_residence_to_date"
                            value="<?= showData('information_about_you_residence_to_date')?>" />
                    </div>
                </div>
                <hr>



                <p><b>Physical Address 2</b></p>
                <div class="form-group">
                    <label class="control-label col-md-5">6.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="information_about_you_home_street_number2"
                            maxlength="25" value="<?php echo showData('information_about_you_home_street_number2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>6.b. </b> &nbsp;
                        <label class="control-label">
                            <input type="radio" name="information_about_you_home_apt_ste_flr2" value="apt"
                                <?php echo (showData('information_about_you_home_apt_ste_flr2') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label class="control-label">
                            <input type="radio" name="information_about_you_home_apt_ste_flr2" value="ste"
                                <?php echo (showData('information_about_you_home_apt_ste_flr2') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label class="control-label">
                            <input type="radio" name="information_about_you_home_apt_ste_flr2" value="flr"
                                <?php echo (showData('information_about_you_home_apt_ste_flr2') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>

                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" type="text" class="form-control"
                            name="information_about_you_home_apt_ste_flr_value2" maxlength="6"
                            value="<?php echo showData('information_about_you_home_apt_ste_flr_value2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="information_about_you_home_city_town2"
                            maxlength="20" value="<?php echo showData('information_about_you_home_city_town2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_home_state2">
                            <option style="" value=''>Select</option>
                            <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_home_state2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.e. ZIP Code</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="information_about_you_home_zip_code2"
                            maxlength="5" value="<?php echo showData('information_about_you_home_zip_code2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="information_about_you_home_province2"
                            maxlength="20" value="<?php echo showData('information_about_you_home_province2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="information_about_you_home_postal_code2"
                            maxlength="9" value="<?php echo showData('information_about_you_home_postal_code2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.h. Country</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_home_country2"
                            maxlength="39" value="<?php echo showData('information_about_you_home_country2')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">7.a. Date From (mm/dd/yyyy)</label>
                    <div class="col-md-6 ">
                        <input type="date" class="form-control" name="information_about_you_residence_from_date2"
                            value="<?= showData('information_about_you_residence_from_date2')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">7.b. Date To (mm/dd/yyyy)</label>
                    <div class="col-md-6 ">
                        <input type="date" class="form-control" name="information_about_you_residence_to_date2"
                            value="<?= showData('information_about_you_residence_to_date2')?>" />
                    </div>
                </div>
                <hr>
                <p><b>Last Physical Address Outside the United States</b></p>
                <p>Provide your last address outside the United States of more than
                    one year (even if listed above).</p>

                <div class="form-group">
                    <label class="control-label col-md-5">8.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="i_130a_last_physical_address_street_number"
                            maxlength="25" value="<?php echo showData('i_130a_last_physical_address_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>8.b. </b> &nbsp;
                        <label class="control-label">
                            <input type="radio" name="i_130a_last_physical_address_apt_ste_flr" value="apt"
                                <?php echo (showData('i_130a_last_physical_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                            Apt. &nbsp;
                        </label>
                        <label class="control-label">
                            <input type="radio" name="i_130a_last_physical_address_apt_ste_flr" value="ste"
                                <?php echo (showData('i_130a_last_physical_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                            Ste. &nbsp;
                        </label>
                        <label class="control-label">
                            <input type="radio" name="i_130a_last_physical_address_apt_ste_flr" value="flr"
                                <?php echo (showData('i_130a_last_physical_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                            Flr.
                        </label>

                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" type="text" class="form-control"
                            name="i_130a_last_physical_address_apt_ste_flr_value" maxlength="6"
                            value="<?php echo showData('i_130a_last_physical_address_apt_ste_flr_value')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">8.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="i_130a_last_physical_address_city_town"
                            maxlength="20" value="<?php echo showData('i_130a_last_physical_address_city_town')?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5">8.d. Province</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="i_130a_last_physical_address_province"
                            maxlength="20" value="<?php echo showData('i_130a_last_physical_address_province')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">8.e. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="i_130a_last_physical_address_postal_code"
                            maxlength="9" value="<?php echo showData('i_130a_last_physical_address_postal_code')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">8.f. Country</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_last_physical_address_country"
                            maxlength="39" value="<?php echo showData('i_130a_last_physical_address_country')?>">
                    </div>
                </div>
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
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 2 of 6</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You (The Spouse
                        Beneficiary)</b></h4>
            </div>


            <div class="form-group">
                <label class="control-label col-md-6">9.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="i_130a_last_physical_from_date"
                        value="<?= showData('i_130a_last_physical_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">9.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="i_130a_last_physical_to_date"
                        value="<?= showData('i_130a_last_physical_to_date')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4>
                    <i><b>Information About Parent 1</b></i>
                </h4>
            </div>

            <p>Full Name of Parent 1</p>


            <div class="form-group">
                <label class="control-label col-md-5">10.a. Family Name(Maiden Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="parent1_info_family_last_name"
                        value="<?php echo showData('parent1_info_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="parent1_info_given_first_name"
                        value="<?php echo showData('parent1_info_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="parent1_info_middle_name"
                        value="<?php echo showData('parent1_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">11. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="parent1_info_date_of_birth"
                        value="<?= showData('parent1_info_date_of_birth')?>" />
                </div>
            </div>


            <div class="control-label" style="padding-left:18px;">
                <b>12. Sex </b> &nbsp;
                <label class="control-label"> <input type="radio" name="parent1_info_gender" value="male"
                        <?php echo (showData('parent1_info_gender')=='male') ? 'checked' : '' ?>> Male
                    &nbsp;</label>
                <label class="control-label"> <input type="radio" name="parent1_info_gender" value="female"
                        <?php echo (showData('parent1_info_gender')=='female') ? 'checked' : '' ?>>
                    Female &nbsp;</label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">13. City/Town/Village of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent1_info_city_town_of_birth" maxlength="20"
                        value="<?php echo showData('parent1_info_city_town_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">14. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent1_info_country_of_birth" maxlength="20"
                        value="<?php echo showData('parent1_info_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">15. City/Town/Village of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent1_info_city_of_residence" maxlength="20"
                        value="<?php echo showData('parent1_info_city_of_residence')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. Country of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent1_info_country_of_Residence" maxlength="20"
                        value="<?php echo showData('parent1_info_country_of_Residence')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4>
                    <i><b>Information About Parent 2</b></i>
                </h4>
            </div>

            <p>Full Name of Parent 2</p>


            <div class="form-group">
                <label class="control-label col-md-5">17.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="parent2_info_family_last_name"
                        value="<?php echo showData('parent2_info_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">17.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="parent2_info_given_first_name"
                        value="<?php echo showData('parent2_info_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">17.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="parent2_info_middle_name"
                        value="<?php echo showData('parent2_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">18. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="parent2_info_date_of_birth"
                        value="<?= showData('parent2_info_date_of_birth')?>" />
                </div>
            </div>


            <div class="control-label" style="padding-left:18px;">
                <b>19. Sex </b> &nbsp;
                <label class="control-label"> <input type="radio" name="parent2_info_gender" value="male"
                        <?php echo (showData('parent2_info_gender')=='male') ? 'checked' : '' ?>> Male
                    &nbsp;</label>
                <label class="control-label"> <input type="radio" name="parent2_info_gender" value="female"
                        <?php echo (showData('parent2_info_gender')=='female') ? 'checked' : '' ?>>
                    Female &nbsp;</label>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">20. City/Town/Village of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent2_info_city_town_of_birth" maxlength="20"
                        value="<?php echo showData('parent2_info_city_town_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">21. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent2_info_country_of_birth" maxlength="20"
                        value="<?php echo showData('parent2_info_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">22. City/Town/Village of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent2_info_city_of_residence" maxlength="20"
                        value="<?php echo showData('parent2_info_city_of_residence')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">23. Country of Residence</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="parent2_info_country_of_Residence" maxlength="20"
                        value="<?php echo showData('parent2_info_country_of_Residence')?>">
                </div>
            </div>

        </div>

        <!-- left side end -->
        <div class="col-md-6">

            <div class="bg-info">
                <h4><i><b>Part 2. Information About Your Employment</b> </i></h4>
            </div>
            <p>Provide your employment history for the last five years,
                whether inside or outside the United States. Provide your
                current employment first. If you are currently unemployed,
                type or print "Unemployed" in Item Number 1. below. If you
                need extra space to complete this section, use the space
                provided in Part 7. Additional Information</p>
            <div class="bg-info">
                <h4><i><b>Employment History</b> </i></h4>
            </div>

            <p><b>Employer 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">1. Name of Employer/Company</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer1_name" maxlength="39"
                        value="<?php echo showData('employer1_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer1_address" maxlength="25"
                        value="<?php echo showData('employer1_address')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>2.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="employer1_apt_ste_flr" value="apt"
                            <?php echo (showData('employer1_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="employer1_apt_ste_flr" value="ste"
                            <?php echo (showData('employer1_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="employer1_apt_ste_flr" value="flr"
                            <?php echo (showData('employer1_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control"
                        name="employer1_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('employer1_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer1_city_town" maxlength="20"
                        value="<?php echo showData('employer1_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="employer1_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('employer1_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer1_zip_code" maxlength="5"
                        value="<?php echo showData('employer1_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer1_province" maxlength="20"
                        value="<?php echo showData('employer1_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer1_postal_code" maxlength="9"
                        value="<?php echo showData('employer1_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer1_country" maxlength="39"
                        value="<?php echo showData('employer1_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Your Occupation</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer1_occupation" maxlength="39"
                        value="<?php echo showData('employer1_occupation')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">4.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="employer1_from_date"
                        value="<?= showData('employer1_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">4 .b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="employer1_to_date"
                        value="<?= showData('employer1_to_date')?>" />
                </div>
            </div>

            <hr>


            <p><b>Employer 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-12">5. Name of Employer/Company</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer2_name" maxlength="39"
                        value="<?php echo showData('employer2_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer2_address" maxlength="25"
                        value="<?php echo showData('employer2_address')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>6.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="employer2_apt_ste_flr" value="apt"
                            <?php echo (showData('employer2_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="employer2_apt_ste_flr" value="ste"
                            <?php echo (showData('employer2_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="employer2_apt_ste_flr" value="flr"
                            <?php echo (showData('employer2_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control"
                        name="employer2_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('employer2_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer2_city_town" maxlength="20"
                        value="<?php echo showData('employer2_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="employer2_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('employer2_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer2_zip_code" maxlength="5"
                        value="<?php echo showData('employer2_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer2_province" maxlength="20"
                        value="<?php echo showData('employer2_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer2_postal_code" maxlength="9"
                        value="<?php echo showData('employer2_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer2_country" maxlength="39"
                        value="<?php echo showData('employer2_country')?>">
                </div>
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
    <div class="page_number">
        <b>
            <p style=" text-align: right;">Page 3 of 6</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Information About Your Employment
                        (continued)</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">7. Your Occupation</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer2_occupation" maxlength="39"
                        value="<?php echo showData('employer2_occupation')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">8.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="employer2_from_date"
                        value="<?= showData('employer2_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">8.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="employer2_to_date"
                        value="<?= showData('employer2_to_date')?>" />
                </div>
            </div>



            <div class="bg-info">
                <h4><b>Part 3. Information About Your Employment
                        Outside the United States</b></h4>
            </div>
            <p>Provide your last occupation outside the United States if not
                shown above. If you never worked outside the United States,
                provide this information in the space provided in Part 7.
                Additional Information.</p>



            <div class="form-group">
                <label class="control-label col-md-12">1. Name of Employer/Company</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer_outside_us_name" maxlength="39"
                        value="<?php echo showData('employer_outside_us_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_street_number" maxlength="25"
                        value="<?php echo showData('employer_outside_us_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>2.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="employer_outside_us_apt_ste_flr" value="apt"
                            <?php echo (showData('employer_outside_us_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="employer_outside_us_apt_ste_flr" value="ste"
                            <?php echo (showData('employer_outside_us_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="employer_outside_us_apt_ste_flr" value="flr"
                            <?php echo (showData('employer_outside_us_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control"
                        name="employer_outside_us_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('employer_outside_us_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_city_town" maxlength="20"
                        value="<?php echo showData('employer_outside_us_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="employer_outside_us_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('employer_outside_us_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_zip_code" maxlength="5"
                        value="<?php echo showData('employer_outside_us_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_province" maxlength="20"
                        value="<?php echo showData('employer_outside_us_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_postal_code" maxlength="9"
                        value="<?php echo showData('employer_outside_us_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer_outside_us_country" maxlength="39"
                        value="<?php echo showData('employer_outside_us_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Your Occupation</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer_outside_us_occupation" maxlength="39"
                        value="<?php echo showData('employer_outside_us_occupation')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">4.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="employer_outside_us_from_date"
                        value="<?= showData('employer_outside_us_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">4 .b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="employer_outside_us_to_date"
                        value="<?= showData('employer_outside_us_to_date')?>" />
                </div>
            </div>

            <div class="bg-info">
                <h4><b>Part 4. Spouse Beneficiary's Statement, Contact
                        Information, Certification, and Signature</b></h4>
            </div>

            <p><b>NOTE: </b>Read the Penalties section of the Form I-130 and
                Form I-130A Instructions before completing this part.</p>


            <div class="bg-info">
                <h4><b>Spouse Beneficiary's Statement</b></h4>
            </div>

            <p><b>NOTE</b>: Select the box for either Item Number 1.a. or 1.b. If
                applicable, select the box for Item Number 2.</p>

            <div class="form-group">
                <label class="control-label col-md-12">1.a.
                    <?php echo createCheckbox("i_130a_spouse_beneficiary_statement_1a_status")?>
                    I can read and understand English, and I have read
                    and understand every question and instruction on this
                    application and my answer to every question.
                </label>
            </div>
        </div>
        <!-- left side end -->

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">1.b.
                    <?php echo createCheckbox("i_130a_spouse_beneficiary_statement_1b_status")?>
                    The interpreter named in Part 5. read to me every
                    question and <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; instruction on this form and my answer
                    to every question in
                </label>
            </div>

            <div class="col-md-12" style="padding-left:40px;">
                <input type="text" maxlength="" class="form-control"
                    name="i_130a_spouse_beneficiary_statement_1b_text_value"
                    value="<?php echo showData('i_130a_spouse_beneficiary_statement_1b_text_value')?>" />
            </div>
            <p style="padding-left:40px;"><b> a language in which I am fluent, and I understood
                    everything </b></p>


            <div class="form-group">
                <label class="control-label col-md-12">2.
                    <?php echo createCheckbox("i_130a_spouse_beneficiary_statement_2_status")?>
                    At my request, the preparer name in Part 6.,
                </label>
            </div>
            <div class="col-md-12" style="padding-left:40px;">
                <input type="text" maxlength="" class="form-control"
                    name="i_130a_spouse_beneficiary_statement_2_text_value"
                    value="<?php echo showData('i_130a_spouse_beneficiary_statement_2_text_value')?>" />
            </div>
            <p style="padding-left:40px;"><b>prepared this form for me based only upon
                    information I provided or authorized.</b>



            <div class="bg-info">
                <h4><i><b> Spouse Beneficiary's Contact Information</b></i>
                </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Spouse Beneficiary's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_spouse_beneficiary_daytime_tel" maxlength="15"
                        value="<?php echo showData('i_130a_spouse_beneficiary_daytime_tel')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Spouse Beneficiary's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_spouse_beneficiary_mobile" maxlength="15"
                        value="<?php echo showData('i_130a_spouse_beneficiary_mobile')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. . Spouse Beneficiary's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="i_130a_spouse_beneficiary_email" maxlength="39"
                        value="<?php echo showData('i_130a_spouse_beneficiary_email')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b> Spouse Beneficiary's Certification</b></i>
                </h4>
            </div>
            <div>

                <p>Copies of any documents I have submitted are exact photocopies
                    of unaltered, original documents, and I understand that USCIS
                    may require that I submit original documents to USCIS at a later
                    date. Furthermore, I authorize the release of any information
                    from any of my records that USCIS may need to determine my
                    eligibility for the immigration benefit I seek.</p>
                <br>
                <p>I further authorize release of information contained in this form,
                    in supporting documents, and in my USCIS records to other
                    entities and persons where necessary for the administration and
                    enforcement of U.S. immigration laws.
                </p>
                <br>
                <p>I certify, under penalty of perjury, that I provided or authorized
                    all of the information in this form, I understand all of the
                    information contained in, and submitted with, my form, and that
                    all of this information is complete, true, and correct.</p>
                <br>

            </div>



            <div class="bg-info">
                <h4><b>Spouse Beneficiary's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Spouse Beneficiary's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_130a_spouse_beneficiary_sign_date"
                        value="<?php echo showData('i_130a_spouse_beneficiary_sign_date')?>" />
                </div>
            </div>
            <p><b>NOTE TO ALL SPOUSE BENEFICIARIES:</b> If you do not
                completely fill out this form or fail to submit required documents
                listed in the Instructions, USCIS may deny the Form I-130 filed
                on your behalf.
            </p>
        </div>
    </div>




    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 4 of 6</p>
            </b>
        </div>

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Interpreter's Contact Information,
                        Certification, and Signature</b>
                </h4>
            </div>
            <p>Provide the following information about the interpreter you
                used to complete Form I-130A if he or she is different from
                the interpreter used to complete the Form I-130 filed on your
                behalf</p>
            <h5><b>Provide the following information about the interpreter if you
                    used one</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_interpreter_family_last_name" maxlength="39"
                        value="<?php echo showData('i_130a_interpreter_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_interpreter_family_first_name" maxlength="39"
                        value="<?php echo showData('i_130a_interpreter_family_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if
                    any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_interpreter_business_name" maxlength="34"
                        value="<?php echo showData('i_130a_interpreter_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Mailing Address</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_interpreter_address_street_number"
                        maxlength="25" value="<?php echo showData('i_130a_interpreter_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_130a_interpreter_address_apt_ste_flr" value="apt"
                            <?php echo (showData('i_130a_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_130a_interpreter_address_apt_ste_flr" value="ste"
                            <?php echo (showData('i_130a_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_130a_interpreter_address_apt_ste_flr" value="flr"
                            <?php echo (showData('i_130a_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control"
                        name="i_130a_interpreter_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_130a_interpreter_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_interpreter_address_city_town" maxlength="20"
                        value="<?php echo showData('i_130a_interpreter_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_130a_interpreter_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_130a_interpreter_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_interpreter_address_zip_code" maxlength="5"
                        value="<?php echo showData('i_130a_interpreter_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_interpreter_address_province" maxlength="20"
                        value="<?php echo showData('i_130a_interpreter_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_interpreter_address_postal_code" maxlength="9"
                        value="<?php echo showData('i_130a_interpreter_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_interpreter_address_country" maxlength="39"
                        value="<?php echo showData('i_130a_interpreter_address_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Contact Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_interpreter_daytime_tel" maxlength="15"
                        value="<?php echo showData('i_130a_interpreter_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_interpreter_mobile" maxlength="15"
                        value="<?php echo showData('i_130a_interpreter_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_130a_interpreter_email"
                        value="<?php echo showData('i_130a_interpreter_email')?>">
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
                    <input type="text" class="form-control" name="i_130a_interpreter_certification" maxlength="20"
                        value="<?php echo showData('i_130a_interpreter_certification')?>">
                </div>
            </div>
            <p>which is the same language provided in <b>Part 4., Item Number
                    1.b.</b>, and I have read to this spouse beneficiary in the identified
                language every question and instruction on this form and his or
                her answer to every question. The spouse beneficiary informed
                me that he or she understands every instruction, question, and
                answer on the form, including the <b>Spouse Beneficiary's
                    Certification,</b> and has verified the accuracy of every answer</p>




            <div class="bg-info">
                <h4><b>Interpreter's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. Interpreter's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_130a_interpreter_sign_date"
                        value="<?php echo showData('i_130a_interpreter_sign_date')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 6. Contact Information, Declaration, and
                        Signature of the Person Preparing this Form, if
                        Other Than the Spouse Beneficiary</b>
                </h4>
            </div>
            <h5><b>Provide the following information about the preparer you used
                    to complete Form I-130A if he or she is different from the
                    preparer used to complete the Form I-130 filed on your behalf</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_preparer_family_last_name" maxlength="39"
                        value="<?php echo showData('i_130a_preparer_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_preparer_family_first_name" maxlength="39"
                        value="<?php echo showData('i_130a_preparer_family_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_preparer_business_name" maxlength="34"
                        value="<?php echo showData('i_130a_preparer_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_preparer_address_street_number" maxlength="25"
                        value="<?php echo showData('i_130a_preparer_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_130a_preparer_address_apt_ste_flr" value="apt"
                            <?php echo (showData('i_130a_preparer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_130a_preparer_address_apt_ste_flr" value="ste"
                            <?php echo (showData('i_130a_preparer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_130a_preparer_address_apt_ste_flr" value="flr"
                            <?php echo (showData('i_130a_preparer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control"
                        name="i_130a_preparer_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_130a_preparer_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_preparer_address_city_town" maxlength="20"
                        value="<?php echo showData('i_130a_preparer_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_130a_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_130a_preparer_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_preparer_address_zip_code" maxlength="5"
                        value="<?php echo showData('i_130a_preparer_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_preparer_address_province" maxlength="20"
                        value="<?php echo showData('i_130a_preparer_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_preparer_address_postal_code" maxlength="9"
                        value="<?php echo showData('i_130a_preparer_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_preparer_address_country" maxlength="39"
                        value="<?php echo showData('i_130a_preparer_address_country')?>">
                </div>
            </div>

        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>



<!----------------------------------------------------------------------
-------------------------------- page 5 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 5 of 6</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Contact Information, Declaration, and
                        Signature of the Person Preparing this Form, if
                        Other Than the Spouse Beneficiary (continued)</b>
                </h4>
            </div>


            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_preparer_daytime_tel" maxlength=""
                        value="<?php echo showData('i_130a_preparer_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_preparer_mobile" maxlength="15"
                        value="<?php echo showData('i_130a_preparer_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_130a_preparer_email"
                        value="<?php echo showData('i_130a_preparer_email')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a.
                    <?php echo createCheckbox("i_130a_preparer_statement_7a_status")?>
                    I am not an attorney or accredited representative but
                    have prepared <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; this form on behalf of the spouse
                    beneficiary and with the spouse <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; beneficiary's
                    consent.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.b.
                    <?php echo createCheckbox("i_130a_preparer_statement_7b_status")?>
                    I am an attorney or accredited representative and my <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; representation of the spouse beneficiary in this case<br>
                </label>
                <label class="control-label ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo createCheckbox("i_130a_preparer_statement_7b_extend")?> extends
                </label>
                <label class="control-label ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo createCheckbox("i_130a_preparer_statement_7b_not_extend")?> does not extend beyond
                    the preparation of this form.
                </label>
            </div>
            <p><b>NOTE</b>: If you are an attorney or accredited
                representative whose representation extends beyond
                preparation of this form, you may be obliged to submit
                a completed Form G-28, Notice of Entry of
                Appearance as Attorney or Accredited Representative,
                with this form </p>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this form at the request of the spouse beneficiary. The
                spouse beneficiary then reviewed this completed form and
                informed me that he or she understands all of the information
                contained in, and submitted with, his or her form, including the
                Spouse Beneficiary's Certification, and that all of this
                information is complete, true, and correct. I completed this
                form based only on information that the spouse beneficiary
                provided to me or authorized me to obtain or use.
            </p>
            <div class="bg-info">
                <h4><b>Preparer's Signature</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.a. Preparer's Signature (sign in ink) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_130a_preparer_sign_date"
                        value="<?php echo showData('i_130a_preparer_sign_date')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-5 col-md-offset-1"></div>
        <!-- no data needed -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 6 of 6</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this form, use the space below. If you need more space
                than what is provided, you may make copies of this page to
                complete and file with this form or attach a separate sheet of
                paper. Type or print your name and A-Number (if any) at the
                top of each sheet; indicate the Page Number, Part Number,
                and Item Number to which your answer refers; and sign and
                date each sheet.
            </p>

            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_additional_info_last_name"
                        value="<?php echo showData('i_130a_additional_info_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_additional_info_first_name"
                        value="<?php echo showData('i_130a_additional_info_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130a_additional_info_middle_name"
                        value="<?php echo showData('i_130a_additional_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span></span><b>A-</b><input type="text" class="form-control"
                            name="i_130a_additional_info_a_number"
                            value="<?php echo showData('i_130a_additional_info_a_number')?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_3a_page_no" maxlength="2"
                            value="<?php echo showData('i_130a_additional_info_3a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_3b_part_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_3b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_3c_item_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_3c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea name="i_130a_additional_info_3d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_130a_additional_info_3d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_4a_page_no" maxlength="2"
                            value="<?php echo showData('i_130a_additional_info_4a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_4b_part_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_4b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_4c_item_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_4c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea name="i_130a_additional_info_4d" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('i_130a_additional_info_4d')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_5a_page_no" maxlength="2"
                            value="<?php echo showData('i_130a_additional_info_5a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_5b_part_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_5b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_5c_item_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_5c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea name="i_130a_additional_info_5d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_130a_additional_info_5d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_6a_page_no" maxlength="2"
                            value="<?php echo showData('i_130a_additional_info_6a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_6b_part_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_6b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_6c_item_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_6c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea name="i_130a_additional_info_6d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_130a_additional_info_6d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_7a_page_no" maxlength="2"
                            value="<?php echo showData('i_130a_additional_info_7a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_7b_part_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_7b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130a_additional_info_7c_item_no" maxlength="6"
                            value="<?php echo showData('i_130a_additional_info_7c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="i_130a_additional_info_7d" maxlength="357" class="form-control"
                        cols="30" rows="10"><?php echo showData('i_130a_additional_info_7d')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<?php include "intake_footer.php"?>