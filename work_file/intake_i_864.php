<?php
$meta_title     =   "INTAKE FORM I-864";
$page_heading   =   "INTAKE FORM I-864, Affidavit of Support Under Section 213A of the INA";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 10</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_864_g_28_box") ?> Fill in box if G-28 is attached to represent the applicant.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>" disabled>
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number?>" disabled>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>part 1. Basis For Filing Affidavit of Support</b></h4>
            </div>
            <div class="form-group">
                <div class="col-md-12 ">
                    <div class="d-flexible">
                        I,<input type="text" class="form-control" maxlength="40" name="i_864_affidavit_support_sponsor" value="<?php echo showData('i_864_affidavit_support_sponsor') ?>">
                        <div style="font-size:20px; ">,</div>
                    </div>
                </div>
                <b> am the sponsor submitting this affidavit of support because (Select only one box): </b>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. <?php echo createCheckbox("i_864_affidavit_support_petitioner_status") ?>I am the petitioner. I filed or am filing for the immigration of my relative.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. <?php echo createCheckbox("i_864_affidavit_support_alien_status") ?>I filed an alien worker petition on behalf of the intending immigrant, who is related to me as my.</label>
                <div class="col-md-11"><input type="text" class="form-control" maxlength="36" name="i_864_affidavit_support_alien" value="<?php echo showData('i_864_affidavit_support_alien') ?>"></div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.c. <?php echo createCheckbox("i_864_affidavit_support_ownership_status")?>
                    I have an ownership interest of at least 5 percent in</label>
                <div class="col-md-11"><input type="text" class="form-control" maxlength="36" name="i_864_affidavit_support_ownership_value1" value="<?php echo showData('i_864_affidavit_support_ownership_value1') ?>"></div>
                <h5 class="col-md-12"><b>which filed an alien worker petition on behalf of the
                        intending immigrant, who is related to me as my </b></h5>
                <div class="col-md-11"><input type="text" class="form-control" maxlength="36" name="i_864_affidavit_support_ownership_value2" value="<?php echo showData('i_864_affidavit_support_ownership_value2') ?>"></div>
            </div>
            <div class="form-group">
                <label class="control-label " style="margin-left:17px;">1.d. <?php echo createCheckbox("i_864_affidavit_support_sponsor_status") ?>I am the only joint sponsor.</label>
            </div>
            <div class="form-group">
                <label class="control-label " style="margin-left:17px;">1.e. <?php echo createCheckbox("i_864_affidavit_support_i_am_status") ?>I am the</label>
                <label class="control-label " style="margin-left:10px"><?php echo createCheckbox("i_864_affidavit_support_first_status") ?>first</label>
                <label class="control-label " style="margin-left:10px"><?php echo createCheckbox("i_864_affidavit_support_second_status") ?>second of two joint sponsors.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.f. <?php echo createCheckbox("i_864_affidavit_support_substitute_status") ?>
                    The original petitioner is deceased. I am the substitute sponsor. I am the intending immigrant's</label>
                <div class="col-md-11"><input type="text" class="form-control" maxlength="37" name="i_864_affidavit_support_substitute" value="<?php echo showData('i_864_affidavit_support_substitute') ?>"></div>
            </div>
            <p><b>NOTE:</b> If you are filing this form as a sponsor, you must include proof of your U.S. citizenship, U.S. national status,or lawful permanent resident status.</p>
            <div class="bg-info">
                <h4><b><i>Part 2. Information About the Principal Immigrant</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>"/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b><i>Mailing Address</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="information_about_you_mailing_care_of_name" value="<?php echo showData('information_about_you_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_street_number" maxlength="25" value="<?php echo showData('information_about_you_mailing_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>2.c </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="information_about_you_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="information_about_you_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="information_about_you_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" class="form-control" name="information_about_you_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_city_town" maxlength="20" value="<?php echo showData('information_about_you_mailing_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_mailing_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('information_about_you_mailing_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_mailing_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_province" maxlength="20" value="<?php echo showData('information_about_you_mailing_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_postal_code" maxlength="9" value="<?php echo showData('information_about_you_mailing_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_mailing_country" maxlength="39" value="<?php echo showData('information_about_you_mailing_country') ?>">
                </div>
            </div>

            <div class="bg-info">
                <h4><b><i>Other Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Country of Citizenship or Nationality</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="39" value="<?php echo showData('other_information_about_you_country_of_citizen') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">4. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth') ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">5. Alien Registration Number (A-Number) (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ►A-<input type="text" class="form-control" maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. USCIS Online Account Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ► <input type="text" class="form-control" maxlength="12" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7. Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_daytime_tel" maxlength="12" value="<?php echo showData('information_about_you_daytime_tel') ?>">
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
    <p style=" text-align: right; margin-right: 15px;"><b>Page 2 of 10</b></p>
    <div class=" row">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 3. Information About the Immigrants You Are Sponsoring</b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. I am sponsoring the principal immigrant named in Part 2</label>
            <div class="col-md-9 ">
                <?php echo createRadio("sponsor_principal_status") ?> (Applicable only if you are sponsoring family members in Part 3. as the second joint sponsor or if you are sponsoring family members who are immigrating more than six months after the principal immigrant)</div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. <?php echo createCheckbox("sponsor_family_member_status") ?>
                I am sponsoring the following family members immigrating at the same time or within six months of the principal immigrant named in Part 2. (Do not include any relative listed on a separate visa petition.)</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. <?php echo createCheckbox("sponsor_family_member_immigrating_status") ?>
                I am sponsoring the following family members who are immigrating more than six months after the principal immigrant.</label>
        </div>
        <h4 style="margin-left:17px"><b>Family Member 1</b></h4>
        <div class="form-group">
            <label class="control-label col-md-5">4.a. Family Name(Last Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member1_family_last_name" value="<?php echo showData('sponsor_family_member1_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.b. Given Name(First Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member1_given_first_name" value="<?php echo showData('sponsor_family_member1_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.c. Middle Name</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member1_middle_name" value="<?php echo showData('sponsor_family_member1_middle_name') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">5. Relationship to Principal Immigrant</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_family_member1_relationship" maxlength="38" value="<?php echo showData('sponsor_family_member1_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">6. Date of Birth (mm/dd/yyyy)</label>
            <div class="col-md-6 ">
                <input type="date" class="form-control" name="sponsor_family_member1_date_of_birth" value="<?php echo showData('sponsor_family_member1_date_of_birth') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">7. Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ►A-<input type="text" class="form-control" maxlength="9" name="sponsor_family_member1_a_number" value="<?php echo showData('sponsor_family_member1_a_number') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">8. USCIS Online Account Number (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ► <input type="text" class="form-control" maxlength="12" name="sponsor_family_member1_uscis_online_account_number" value="<?php echo showData('sponsor_family_member1_uscis_online_account_number') ?>">
                </div>
            </div>
        </div>
        <h4 style="margin-left:17px"><b>Family Member 2</b></h4>
        <div class="form-group">
            <label class="control-label col-md-5">9.a. Family Name(Last Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member2_family_last_name" value="<?php echo showData('sponsor_family_member2_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">9.b. Given Name(First Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member2_given_first_name" value="<?php echo showData('sponsor_family_member2_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">9.c. Middle Name</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member2_middle_name" value="<?php echo showData('sponsor_family_member2_middle_name') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">10. Relationship to Principal Immigrant</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_family_member2_relationship" maxlength="38" value="<?php echo showData('sponsor_family_member2_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">11. Date of Birth (mm/dd/yyyy)</label>
            <div class="col-md-6 ">
                <input type="date" class="form-control" name="sponsor_family_member2_date_of_birth" value="<?php echo showData('sponsor_family_member2_date_of_birth') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">12. Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ►A-<input type="text" class="form-control" maxlength="9" name="sponsor_family_member2_a_number" value="<?php echo showData('sponsor_family_member2_a_number') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">13. USCIS Online Account Number (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ► <input type="text" class="form-control" maxlength="12" name="sponsor_family_member2_uscis_online_account_number" value="<?php echo showData('sponsor_family_member2_uscis_online_account_number') ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- left side -->
    <div class="col-md-6">

        <h4 style="margin-left:17px"><b>Family Member 3</b></h4>
        <div class="form-group">
            <label class="control-label col-md-5">14.a. Family Name(Last Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member3_family_last_name" value="<?php echo showData('sponsor_family_member3_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">14.b. Given Name(First Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member3_given_first_name" value="<?php echo showData('sponsor_family_member3_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">14.c. Middle Name</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member3_middle_name" value="<?php echo showData('sponsor_family_member3_middle_name') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">15. Relationship to Principal Immigrant</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_family_member3_relationship" maxlength="38" value="<?php echo showData('sponsor_family_member3_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">16. Date of Birth (mm/dd/yyyy)</label>
            <div class="col-md-6 ">
                <input type="date" class="form-control" name="sponsor_family_member3_date_of_birth" value="<?php echo showData('sponsor_family_member3_date_of_birth') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">17. Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ►A-<input type="text" class="form-control" maxlength="9" name="sponsor_family_member3_a_number" value="<?php echo showData('sponsor_family_member3_a_number') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">18. USCIS Online Account Number (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ► <input type="text" class="form-control" maxlength="12" name="sponsor_family_member3_uscis_online_account_number" value="<?php echo showData('sponsor_family_member3_uscis_online_account_number') ?>">
                </div>
            </div>
        </div>
        <h4 style="margin-left:17px"><b>Family Member 4</b></h4>
        <div class="form-group">
            <label class="control-label col-md-5">19.a. Family Name(Last Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member4_family_last_name" value="<?php echo showData('sponsor_family_member4_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">19.b. Given Name(First Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member4_given_first_name" value="<?php echo showData('sponsor_family_member4_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">19.c. Middle Name</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member4_middle_name" value="<?php echo showData('sponsor_family_member4_middle_name') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">20. Relationship to Principal Immigrant</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_family_member4_relationship" maxlength="38" value="<?php echo showData('sponsor_family_member4_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">21. Date of Birth (mm/dd/yyyy)</label>
            <div class="col-md-6 ">
                <input type="date" class="form-control" name="sponsor_family_member4_date_of_birth" value="<?php echo showData('sponsor_family_member4_date_of_birth') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">22. Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ►A-<input type="text" class="form-control" maxlength="9" name="sponsor_family_member4_a_number" value="<?php echo showData('sponsor_family_member4_a_number') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">23. USCIS Online Account Number (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ► <input type="text" class="form-control" maxlength="12" name="sponsor_family_member4_uscis_online_account_number" value="<?php echo showData('sponsor_family_member4_uscis_online_account_number') ?>">
                </div>
            </div>
        </div>
        <h4 style="margin-left:17px"><b>Family Member 5</b></h4>
        <div class="form-group">
            <label class="control-label col-md-5">24.a. Family Name(Last Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member5_family_last_name" value="<?php echo showData('sponsor_family_member5_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">24.b. Given Name(First Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member5_given_first_name" value="<?php echo showData('sponsor_family_member5_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">24.c. Middle Name</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_member5_middle_name" value="<?php echo showData('sponsor_family_member5_middle_name') ?>" />
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">25. Relationship to Principal Immigrant</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_family_member5_relationship" maxlength="38" value="<?php echo showData('sponsor_family_member5_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">26. Date of Birth (mm/dd/yyyy)</label>
            <div class="col-md-6 ">
                <input type="date" class="form-control" name="sponsor_family_member5_date_of_birth" value="<?php echo showData('sponsor_family_member5_date_of_birth') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">27. Alien Registration Number (A-Number) (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ►A-<input type="text" class="form-control" maxlength="9" name="sponsor_family_member5_a_number" value="<?php echo showData('sponsor_family_member5_a_number') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">28. USCIS Online Account Number (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ► <input type="text" class="form-control" maxlength="12" name="sponsor_family_member5_uscis_online_account_number" value="<?php echo showData('sponsor_family_member5_uscis_online_account_number') ?>">
                </div>
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
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;"><b>Page 3 of 10</b></p>
    <div class=" row mt-5 gap-4">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 3. Information About the Immigrants You Are Sponsoring (continued)</b></h4>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">29. Enter the total number of immigrants you are sponsoring on
                this affidavit which includes the principal immigrant listed
                in Part 2., any immigrants listed in Part 3., Item
                Numbers 1. - 28. and (if applicable), any immigrants listed
                for these questions in Part 11. Additional Information.
                Do not count the principal immigrant if you are only
                sponsoring family members entering more than 6 months
                after the principal immigrant.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_family_member5_total_number_of_immigrants" maxlength="3" value="<?php echo showData('sponsor_family_member5_total_number_of_immigrants') ?>">
            </div>
        </div>

        <div class="bg-info">
            <h4><b>Part 4. Information About You (Sponsor)</b></h4>
        </div>

        <div class="bg-info">
            <h4><b><i>Sponsor's Full Name</i></b></h4>
        </div>

        <div class="form-group">
            <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_family_last_name" value="<?php echo showData('sponsor_family_last_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_given_first_name" value="<?php echo showData('sponsor_given_first_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">1.c. Middle Name</label>
            <div class="col-md-7">
                <input type="text" maxlength="29" class="form-control" name="sponsor_middle_name" value="<?php echo showData('sponsor_middle_name') ?>" />
            </div>
        </div>
        <div class="bg-info">
            <h4><b><i>Sponsor's Mailing Address`</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2.a. In Care Of Name</label>
            <div class="col-md-12">
                <input type="text" class="form-control" maxlength="34" name="sponsor_mailing_care_of_name" value="<?php echo showData('sponsor_mailing_care_of_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">2.b. Street Number and Name</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_mailing_street_number" maxlength="25" value="<?php echo showData('sponsor_mailing_street_number') ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="control-label col-md-6"><b>2.c </b> &nbsp;
                <label class="control-label"> <input type="radio" name="sponsor_mailing_apt_ste_flr" value="apt" <?php echo (showData('sponsor_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>Apt. &nbsp;</label>
                <label class="control-label"><input type="radio" name="sponsor_mailing_apt_ste_flr" value="ste" <?php echo (showData('sponsor_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>Ste. &nbsp;</label>
                <label class="control-label"><input type="radio" name="sponsor_mailing_apt_ste_flr" value="flr" <?php echo (showData('sponsor_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>Flr.</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" type="text" class="form-control" name="sponsor_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('sponsor_mailing_apt_ste_flr_value') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">2.d. City or Town</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_mailing_city_town" maxlength="20" value="<?php echo showData('sponsor_mailing_city_town') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">2.e. State</label>
            <div class="col-md-7">
                <select class="form-control" name="sponsor_mailing_state">
                    <option value=''>Select</option>
                    <?php
                    foreach ($allDataCountry as $record) {
                        if ($record->state_code == showData('sponsor_mailing_state')) $selected = "selected";
                        else $selected = "";
                        echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">2.f. ZIP Code</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_mailing_zip_code" maxlength="5" value="<?php echo showData('sponsor_mailing_zip_code') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">2.g. Province</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_mailing_province" maxlength="20" value="<?php echo showData('sponsor_mailing_province') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">2.h. Postal Code</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_mailing_postal_code" maxlength="9" value="<?php echo showData('sponsor_mailing_postal_code') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2.i. Country</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_mailing_country" maxlength="39" value="<?php echo showData('sponsor_mailing_country') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Is your current mailing address the same as your physical address?</label>
            <div class="col-md-9 "><?php echo createRadio("sponsor_is_your_current_mailing_address_same_as_physical") ?> </div>
        </div>
        <h5 style="margin-left:17px;">If you answered "No" to <b>Item Number 3.</b>, provide your
            physical address in <b>Item Numbers 4.a. - 4.h.</b></h5>
    </div>
    <!-- left side end -->

    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Sponsor's Physical Address</b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.a. Street Number and Name</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_physical_street_number" maxlength="25" value="<?php echo showData('sponsor_physical_street_number') ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="control-label col-md-6"><b>4.b. </b> &nbsp;
                <label class="control-label">
                    <input type="radio" name="sponsor_physical_apt_ste_flr" value="apt" <?php echo (showData('sponsor_physical_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                </label>
                <label class="control-label">
                    <input type="radio" name="sponsor_physical_apt_ste_flr" value="ste" <?php echo (showData('sponsor_physical_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                </label>
                <label class="control-label">
                    <input type="radio" name="sponsor_physical_apt_ste_flr" value="flr" <?php echo (showData('sponsor_physical_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.
                </label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" class="form-control" name="sponsor_physical_apt_ste_flr_value" maxlength="6" value="<?php echo showData('sponsor_physical_apt_ste_flr_value') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.c. City or Town</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_physical_city_town" maxlength="20" value="<?php echo showData('sponsor_physical_city_town') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.d. State</label>
            <div class="col-md-7">
                <select class="form-control" name="sponsor_physical_state">
                    <option value=''>Select</option>
                    <?php
                    foreach ($allDataCountry as $record) {
                        if ($record->state_code == showData('sponsor_physical_state')) $selected = "selected";
                        else $selected = "";
                        echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.e. ZIP Code</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_physical_zip_code" maxlength="5" value="<?php echo showData('sponsor_physical_zip_code') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.f. Province</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_physical_province" maxlength="20" value="<?php echo showData('sponsor_physical_province') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-5">4.g. Postal Code</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="sponsor_physical_postal_code" maxlength="9" value="<?php echo showData('sponsor_physical_postal_code') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4.h. Country</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_physical_country" maxlength="39" value="<?php echo showData('sponsor_physical_country') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><b> <i>Other Information</i> </b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Country of Domicile</label>
            <div class="col-md-12">
                <input type="text" name="sponsor_other_information_country_of_domicile" value="<?php echo showData('sponsor_other_information_country_of_domicile') ?>" maxlength="39" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Date of Birth (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="sponsor_other_information_date_of_birth" value="<?php echo showData('sponsor_other_information_date_of_birth') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">7. City or Town of Birth</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_other_information_city_of_birth" maxlength="20" value="<?php echo showData('sponsor_other_information_city_of_birth') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">8. State or Province of Birth</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_other_information_province_of_birth" maxlength="20" value="<?php echo showData('sponsor_other_information_province_of_birth') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">9. Country of Birth </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_other_information_country_of_birth" maxlength="39" value="<?php echo showData('sponsor_other_information_country_of_birth') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">10. U.S. Social Security Number (Required)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ► <input type="text" class="form-control" maxlength="9" name="sponsor_other_information_social_security_number" value="<?php echo showData('sponsor_other_information_social_security_number') ?>">
                </div>
            </div>
        </div>
        <h5 style="margin-left:17px;"><b>Citizenship or Residency</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">11.a. <?php echo createCheckbox("sponsor_other_information_us_citizen_status") ?>I am a U.S. citizen.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">11.b. <?php echo createCheckbox("sponsor_other_information_us_national_status") ?>I am a U.S. national.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">11.c. <?php echo createCheckbox("sponsor_other_information_permanent_resident_status") ?>I am a lawful permanent resident</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">12. Sponsor's A-Number (if any)</label>
            <div class="col-md-8 col-md-offset-4">
                <div class="d-flexible">
                    ►A- <input type="text" class="form-control" maxlength="9" name="sponsor_other_information_a_number" value="<?php echo showData('sponsor_other_information_a_number') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">13. Sponsor's USCIS Online Account Number (if any)</label>
            <div class="col-md-9 col-md-offset-3">
                <div class="d-flexible">
                    ►<input type="text" class="form-control" maxlength="12" name="sponsor_other_information_uscis_online_account_number" value="<?php echo showData('sponsor_other_information_uscis_online_account_number') ?>">
                </div>
            </div>
        </div>
        <h5 style="margin-left:17px;"><b>Military Service (To be completed by petitioner sponsors only.)</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">14. I am currently on active duty in the U.S. Armed Forces or U.S. Coast Guard.</label>
            <div class="col-md-4 col-md-offset-8 "><?php echo createRadio("sponsor_other_information_active_duty_status") ?> </div>
        </div>
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
        <p style=" text-align: right;  margin-right: 25px;"><b>Page 4 of 10</b></p>
        <div class=" col-md-6">
        <div class="bg-info">
            <h4><b>Part 5. Sponsor's Household Size</b>
            </h4>
        </div>
        <h5 style="margin-left:17px;"><b>NOTE:</b> Do not count any member of your household more than once.</h5>
        <h5 style="margin-left:17px;"><b>Persons you are sponsoring in this affidavit:</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">1.Provide the number you entered in Part 3., Item Number 29.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_household_size_provide_the_number" maxlength="5" value="<?php echo showData('sponsor_household_size_provide_the_number') ?>">
            </div>
        </div>
        <h5 style="margin-left:17px;"><b>Persons NOT sponsored in this affidavit:</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">2. Yourself</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="" maxlength="5" value="        1" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. If you are currently married, enter "1" for your spouse.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_household_size_currently_married" maxlength="5" value="<?php echo showData('sponsor_household_size_currently_married') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. If you have dependent children, enter the number here.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_household_size_dependent_children" maxlength="5" value="<?php echo showData('sponsor_household_size_dependent_children') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. If you have any other dependents, enter the number here.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_household_size_other_dependents" maxlength="5" value="<?php echo showData('sponsor_household_size_other_dependents') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. If you have sponsored any other persons on Form I-864 or Form I-864EZ who are now lawful permanent residents, enter the number here.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_household_size_sponsored_i864" maxlength="5" value="<?php echo showData('sponsor_household_size_sponsored_i864') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">7. <b>OPTIONAL:</b> If you have siblings, parents, or adult children with the same principal residence who are
                combining their income with yours by submitting Form I-864A, enter the number here.</label>
            <div class="col-md-4 col-md-offset-8">
                <input type="text" class="form-control" name="sponsor_household_size_siblings" maxlength="5" value="<?php echo showData('sponsor_household_size_siblings') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">8. Add together Part 5., Item Numbers 1. - 7. and enter the number here. </label>
            <div class="row">
                <div class="col-md-8 d-flexible col-md-offset-4">
                    <span>Household Size:</span><input type="text" class="form-control" value=" 1 " disabled>
                </div>
            </div>
        </div>
        <div class="bg-info">
            <h4><b>Part 6. Sponsor's Employment and Income </b>
            </h4>
        </div>
        <h5 style="margin-left:17px;"><b>I am currently:</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">1. <?php echo createCheckbox("sponsor_employment_as_an_status") ?>Employed as a/an</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_employment_as_an" maxlength="38" value="<?php echo showData('sponsor_employment_as_an') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. Name of Employer 1 </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_employment_name_of_employer1" maxlength="38" value="<?php echo showData('sponsor_employment_name_of_employer1') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Name of Employer 2 (if applicable)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_employment_name_of_employer2" maxlength="38" value="<?php echo showData('sponsor_employment_name_of_employer2') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. <?php echo createCheckbox("sponsor_employment_occupation_status") ?>Self-Employed as a/an (Occupation)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_employment_occupation" maxlength="38" value="<?php echo showData('sponsor_employment_occupation') ?>">
            </div>
        </div>
    </div>
    <!-- left side column end -->
    <div class="col-md-6 ">
        <div class="form-group">
            <label class="control-label col-md-12">5. <?php echo createCheckbox("sponsor_employment_retired_date_status") ?>Retired Since (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="sponsor_employment_retired_date" value="<?php echo showData('sponsor_employment_retired_date') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. <?php echo createCheckbox("sponsor_employment_unemployed_date_status") ?>Unemployed Since (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="sponsor_employment_unemployed_date" value="<?php echo showData('sponsor_employment_unemployed_date') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">7. My current individual annual income is:</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="text" class="form-control" name="sponsor_employment_current_annual_income" maxlength="14" value="<?php echo showData('sponsor_employment_current_annual_income') ?>">
            </div>
        </div>
        <h5>
            <b>Income you are using from any other person who was counted in your household size,</b> including, in certain
            conditions, the intending immigrant. (See Form I-864 Instructions.) Please indicate name, relationship, and income.
        </h5>
        <h5 style="margin-left:17px;"><b>Person 1</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">8.Name</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_household_person1_name" maxlength="38" value="<?php echo showData('sponsor_household_person1_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">9. Relationship </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="sponsor_household_person1_relationship" maxlength="38" value="<?php echo showData('sponsor_household_person1_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">10. Current Income </label>
            <div class="col-md-6 d-flexible">
                $<input type="text" class="form-control" name="sponsor_household_person1_current_income" maxlength="16" value="<?php echo showData('sponsor_household_person1_current_income') ?>">
            </div>
        </div>
        <h5 style="margin-left:17px;"><b>Person 2</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">11. Name </label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="sponsor_household_person2_name" maxlength="38" value="<?php echo showData('sponsor_household_person2_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">12. Relationship </label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="sponsor_household_person2_relationship" maxlength="38" value="<?php echo showData('sponsor_household_person2_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">13. Current Income </label>
            <div class="col-md-6 d-flexible">
                $<input type="text" class="form-control  " name="sponsor_household_person2_current_income" maxlength="16" value="<?php echo showData('sponsor_household_person2_current_income') ?>">
            </div>
        </div>
        <h5 style="margin-left:17px;"><b>Person 3</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">14. Name </label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="sponsor_household_person3_name" maxlength="38" value="<?php echo showData('sponsor_household_person3_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">15. Relationship </label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="sponsor_household_person3_relationship" maxlength="38" value="<?php echo showData('sponsor_household_person3_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">16. Current Income </label>
            <div class="col-md-6 d-flexible">
                $<input type="text" class="form-control  " name="sponsor_household_person3_current_income" maxlength="16" value="<?php echo showData('sponsor_household_person3_current_income') ?>">
            </div>
        </div>
        <h5 style="margin-left:17px;"><b>Person 4</b></h5>
        <div class="form-group">
            <label class="control-label col-md-12">17. Name </label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="sponsor_household_person4_name" maxlength="38" value="<?php echo showData('sponsor_household_person4_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">18. Relationship </label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="sponsor_household_person4_relationship" maxlength="38" value="<?php echo showData('sponsor_household_person4_relationship') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-6">19. Current Income </label>
            <div class="col-md-6 d-flexible">
                $<input type="text" class="form-control  " name="sponsor_household_person4_current_income" maxlength="16" value="<?php echo showData('sponsor_household_person4_current_income') ?>">
            </div>
        </div>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <div class="row">
        <p style=" text-align: right; margin-right: 15px;"><b>Page 5 of 10</b></p>
        <div class="col-md-6">
            <!-- <div class="bg-info">
                <h4><b>For USCIS Use Only</b></h4>
            </div>
            <h5 style="margin-left:17px;"><b>Household Size</b></h5>
            <div class="row">
                <div class="col-md-5">
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 1</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 2</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 3</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 4</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 5</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 6</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 7</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 8</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 9</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> others______</label>
                </div>
            </div> -->
            <div class="bg-info">
                <h4><b>Part 6. Sponsor's Employment and Income </b>(continued)</h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">20. <b>My Current Annual Household Income </b>(Total all lines from <b>part 6. Item Numbers 7., 10., 13., 16.</b>, and <b>19</b>.; the total will be compared to Federal Poverty Guidelines on Form I-864P.)</label>
                <div class="col-md-6 col-md-offset-6">
                    <input type="text" class="form-control" name="sponsor_employment_current_household_income" maxlength="16" value="<?php echo showData('sponsor_employment_current_household_income') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">21. <?php echo createCheckbox("sponsor_employment_completed_form_i864_status") ?>The people listed in Item Numbers 8., 11.. 14.. and 17. have completed Form I-864A. I am filing along with this affidavit all necessary Form I-864 As completed by these people.</label>

            </div>
            <div class="form-group">
                <label class="control-label col-md-12">22. <?php echo createCheckbox("sponsor_employment_accompanying_dependents_status") ?>One or more of the people listed in Item Numbers 8.,
                    11., 14., and 17. do not need to complete Form I-864A
                    because he or she is the intending immigrant and has no
                    accompanying dependents.
                    <br>
                    Name</label>
                <div class="col-md-12 ">
                    <input type="text" class="form-control" name="sponsor_employment_accompanying_dependents" maxlength="36" value="<?php echo showData('sponsor_employment_accompanying_dependents') ?>">
                </div>
            </div>
            <div style="margin-left:17px">
                <b>Federal Income Tax Return Information
                </b>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">23.a. Have you filed a Federal income tax return for each of the three most recent tax years? </label>
                <div class="col-md-4 col-md-offset-8 "><?php echo createRadio("sponsor_employment_federal_income_tax_status") ?> </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 "><b>NOTE:</b> You <b>MUST</b> attach a photocopy or transcript of your Federal income tax return for only the most recent tax year.</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">23.b. <?php echo createCheckbox("sponsor_employment_photocopies_or_transcripts_status") ?>(Optional) I have attached photocopies or transcripts
                    of my Federal income tax returns for my second and third most recent tax years.</label>
                <div class="col-md-12 ">
                    <input type="text" class="form-control  " name="sponsor_employment_photocopies_or_transcripts" maxlength="39" value="<?php echo showData('sponsor_employment_photocopies_or_transcripts') ?>">
                </div>
            </div>
            <p style="margin-left: 17px;">My total income (adjusted gross income on Internal Revenue Service (IRS) Form 1040EZ) as reported on my Federal income tax returns for the most recent three years was: </p>
            <div class="d-flexible row" style="margin-left: 37%;">
                <div class="col-md-6"><b>Tax Year</b></div>
                <div class="col-md-6"><b>Total Income</b></div>
            </div>
            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <label class="control-label" style="flex: 1;">24.a. Most Recent</label>
                <input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_most_recent_tax_year" maxlength="4" value="<?php echo showData('sponsor_employment_most_recent_tax_year') ?>">
                $<input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_most_recent_total_income" maxlength="13" value="<?php echo showData('sponsor_employment_most_recent_total_income') ?>">
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <label class="control-label" style="flex: 1;">24.b. 2nd Most Recent</label>
                <input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_2nd_most_recent_tax_year" maxlength="4" value="<?php echo showData('sponsor_employment_2nd_most_recent_tax_year') ?>">
                $<input type="text" style="flex: 1;  padding: 10px;" class="form-control" name="sponsor_employment_2nd_most_recent_total_income" maxlength="13" value="<?php echo showData('sponsor_employment_2nd_most_recent_total_income') ?>">
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <label class="control-label" style="flex: 1;">24.c. 3rd Most Recent</label>
                <input type="text" class="form-control" style="flex: 1;  padding: 10px;" name="sponsor_employment_3rd_most_recent_tax_year" maxlength="4" value="<?php echo showData('sponsor_employment_3rd_most_recent_tax_year') ?>">
                $<input type="text" class="form-control" style="flex: 1;  padding: 10px;" name="sponsor_employment_3rd_most_recent_total_income" maxlength="13" value="<?php echo showData('sponsor_employment_3rd_most_recent_total_income') ?>">
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">25. <?php echo createCheckbox("sponsor_employment_irs_required_level") ?>I was not required to file a Federal income tax return
                    as my income was below the IRS required level and I have attached evidence to support this.</label>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Use of Assets to Supplement Income</b>(Optional)</h4>
            </div>
            <div class="form-group">
                If your income, or the total income for you and your household.from <b>Part 6., Item Numbers 20</b>. or <b>24.a. - 24.c.</b>, exceeds the
                Federal Poverty Guidelines for your household size, <b>YOU ARE NOT REQUIRED</b> to complete this <b>Part 7</b>. Skip to <b>Part 8.</b>
                <br>
                <br>
                <b>Your Assets (Optional)</b>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Enter the balance of all savings and checking accounts.</label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_saving_accounts" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_saving_accounts') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">2. Enter the net cash value of real-estate holdings. (Net value means current assessed value minus mortgage debt.)</label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_real_estate_holdings" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_real_estate_holdings') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">3. Enter the net cash value of all stocks, bonds, certificates of deposit, and any other assets not already included in Item Number 1. or Item Number 2.</span></label>
                <div class="col-md-6  col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_stocks_bonds_certificates" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_stocks_bonds_certificates') ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-12">4. Add together Item Numbers 1. - 3. and enter the number here</b>.</label>
                <div class="col-md-8  col-md-offset-4 d-flexible">
                    <div style="font-size: larger;"><b>TOTAL</b></div>:$<input type="text" class="form-control  " name="sponsor_assets_of_supplement_add_together1" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_add_together1') ?>">
                </div>
            </div>
            <div class="col-md-offset-1"><b>Assets from Form I-864A. Part 4., Item Number 3.d., for:</b></div>

            <div class="form-group">
                <label class="control-label col-md-12">5.a. Name of Relative.</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="sponsor_assets_of_supplement_name_of_relative" maxlength="38" value="<?php echo showData('sponsor_assets_of_supplement_name_of_relative') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5.b. Your household member's assets from Form I-864A (optional).</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_household_member" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_household_member') ?>">
                </div>
            </div>

            <div style="margin-left: 17px;"><b>Assets of the principal sponsored immigrant</b> (optional).</div><br>
            <div style="margin-left: 17px;">The principal sponsored immigrant is the person listed in <b>Part 2., Item Numbers 1.a. - 1.c. </b>Only include the assets if the
                principal immigrant is being sponsored by this affidavit of support.</div>

            <div class="form-group">
                <label class="control-label col-md-12">6. Enter the balance of the principal immigrant's savings and checking accounts.</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_immigrant_saving" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_immigrant_saving') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7. Enter the net cash value of all the principal immigrant's real estate holdings. (Net value means investment value minus mortgage debt.)</label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_immigrant_real_estate_holdings" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_immigrant_real_estate_holdings') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8. Enter the current cash value of the principal immigrant's stocks, bonds, certificates of deposit, and other assets not included in <b>Item Number 6</b>. or <b>Item Number 7.</b></label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control  " name="sponsor_assets_of_supplement_immigrant_stocks_bonds_certificates" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_immigrant_stocks_bonds_certificates') ?>">
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
-------------------------------- page 6--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 6 of 10</b></p>
    <div class="row">
        <div class="col-md-6">
            <!-- <div class="bg-info">
                <h4><b>For USCIS Use Only</b></h4>
            </div>
            <h5 style="margin-left:17px;"><b>Household Size</b></h5>
            <div class="row">
                <div class="col-md-5">
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 1</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 2</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 3</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 4</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 5</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 6</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 7</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 8</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> 9</label>
                    <label class="control-label"><span style="margin-left:17px;"><?php echo createCheckbox("") ?> </span> others______</label>
                </div>
            </div> -->
            <div class="bg-info">
                <h4><b>Part 7. Use of Assets to Supplement Income</b> (Optional) (continued)</h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9. <b>Add together Item Numbers 6. - 8. and enter the number here:</b></label>
                <div class="col-md-6 col-md-offset-6 d-flexible">
                    $<input type="text" class="form-control" name="sponsor_assets_of_supplement_add_together2" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_add_together2'); ?>">
                </div>
            </div>
            <h4 style="margin-left: 17px;"><b>Total Value of Assets </b></h4>
            <div class="form-group">
                <label class="control-label col-md-12">10. Add together Item Numbers 4., 5.b., and 9. and enter the number here.</label>
                <div class="col-md-8 col-md-offset-4 d-flexible ">
                    <div style="font-size: larger;"><b>TOTAL</b></div>:$<input type="text" class="form-control" name="sponsor_assets_of_supplement_add_together3" maxlength="16" value="<?php echo showData('sponsor_assets_of_supplement_add_together3'); ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Statement, Contact Information, Declaration, Certification, and Signature</b></h4>
            </div>
            <div style="margin-left: 17px;">
                <b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-864 Instructions before completing this part.
            </div>
            <div class="bg-info">
                <h4> <b> Sponsor's Contract</b></h4>
            </div>
            <div style="margin-left: 17px;">
                Please note that, by signing this Form I-864, you agree to
                assume certain specific obligations under the Immigration and
                Nationality Act (INA) and other Federal laws. The following
                paragraphs describe those obligations. Please read the following
                information carefully before you sign Form I-864. If you do not
                understand the obligations, you may wish to consult an attorney
                or accredited representative.
                <br><br>
                <b>What is the Legal Effect of My Signing Form I-864?</b>
                <br><br>
                If you sign Form I-864 on behalf of any person (called the
                intending immigrant) who is applying for an immigrant visa or
                for adjustment of status to a lawful permanent resident, and that
                intending immigrant submits Form I-864 to the U.S.
                Government with his or her application for an immigrant visa or
                adjustment of status, under INA section 213A, these actions
                create a contract between you and the U.S. Government. The
                intending immigrant becoming a lawful permanent resident is
                the consideration for the contract.
                <br><br>
                Under this contract, you agree that, in deciding whether the
                intending immigrant can establish that he or she is not
                inadmissible to the United States as a person likely to become a
                public charge, the U.S. Government can consider your income
                and assets as available for the support of the intending
                immigrant.
            </div>

        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div style="margin-left: 17px;">
                <b> What If I Choose Not to Sign Form I-864?</b>
                <br><br>
                The U.S. Government cannot make you sign Form I-864 if you
                do not want to do so. But if you do not sign Form I-864, the
                intending immigrant may not become a lawful permanent
                resident in the United States.
                <br><br>
                <b>What Does Signing Form I-864 Require Me To Do?</b>
                <br><br>
                If an intending immigrant becomes a lawful permanent resident
                in the United States based on a Form I-864 that you have
                signed, then, until your obligations under Form I-864 terminate,
                you must:
            </div>
            <br>
            <div class="col-md-offset-2">
                <b> A.</b> Provide the intending immigrant any support
                necessary to maintain him or her at an income that is
                at least 125 percent of the Federal Poverty Guidelines
                for his or her household size (100 percent if you are
                the petitioning sponsor and are on active duty in the
                U.S. Armed Forces or U.S. Coast Guard, and the
                person is your husband, wife, or unmarried child
                under 21 years of age); and
                <br><br>
                <b>B.</b> Notify U.S. Citizenship and Immigration Services
                (USCIS) of any change in your address, within 30
                days of the change, by filing Form I-865.
            </div>
            <br>
            <div>
                <b> What Other Consequences Are There?</b>
                <br><br>
                If an intending immigrant becomes a lawful permanent resident
                in the United States based on a Form I-864 that you have
                signed, then, until your obligations under Form I-864 terminate,
                the U.S. Government may consider (deem) your income and
                assets as available to that person, in determining whether he or
                she is eligible for certain Federal means-tested public and also
                for state or local means-tested public benefits, if the state or
                local government's rules provide for consideration (deeming) of
                your income and assets as available to the person.
                <br><br>
                This provision does not apply to public benefits specified in
                section 403(c) of the Welfare Reform Act such as emergency
                Medicaid, short-term, non-cash emergency relief; services
                provided under the National School Lunch and Child Nutrition
                Acts; immunizations and testing and treatment for
                communicable diseases; and means-tested programs under the
                Elementary and Secondary Education Act.
                <br><br>
                <b>What If I Do Not Fulfill My Obligations?</b>
                <br><br>
                If you do not provide sufficient support to the person who
                becomes a lawful permanent resident based on a Form I-864
                that you signed, that person may sue you for this support.
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 7--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 7 of 10</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Statement, Contact
                        Information, Declaration, Certification, and
                        Signaturee</b>(continued)</h4>
            </div>
            <div style="margin-left: 17px;">
                If a Federal, state, local, or private agency provided any covered
                means-tested public benefit to the person who becomes a lawful
                permanent resident based on a Form I-864 that you signed, the
                agency may ask you to reimburse them for the amount of the
                benefits they provided. If you do not make the reimbursement,
                the agency may sue you for the amount that the agency believes
                you owe.
                <br><br>
                If you are sued, and the court enters a judgment against you, the
                person or agency that sued you may use any legally permitted
                procedures for enforcing or collecting the judgment. You may
                also be required to pay the costs of collection, including
                attorney fees.
                <br><br>
                If you do not file a properly completed Form I-865 within 30
                days of any change of address, USCIS may impose a civil fine
                for your failing to do so.
                <br><br>
                <b>When Will These Obligations End?</b>
                <br><br>
                Your obligations under a Form I-864 that you signed will end if
                the person who becomes a lawful permanent resident based on
                that affidavit:
            </div>
            <div style="margin-left: 17px;">
                <b>A.</b> Becomes a U.S. citizen;<br><br>
                <b>B.</b> Has worked, or can receive credit for, 40 quarters of
                coverage under the Social Security Act;<br><br>
                <b>C.</b> No longer has lawful permanent resident status and has
                departed the United States;<br><br>
                <b>D.</b> Is subject to removal, but applies for and obtains, in
                removal proceedings, a new grant of adjustment of status,
                based on a new affidavit of support, if one is required; or <br><br>
                <b>E.</b> Dies.
            </div>
            <br>
            <div style="margin-left: 17px;"><b>NOTE:</b> Divorce <b>does not</b> terminate your obligations under
                Form I-864. <br><br>
                Your obligations under a Form I-864 that you signed also end
                if you die. Therefore, if you die, your estate is not required to
                take responsibility for the person's support after your death.
                However, your estate may owe any support that you
                accumulated before you died.
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Statement</i></b></h4>
            </div>
            <div style="margin-left:17px">
                <b>NOTE:</b> Select the box for either <b>Item Number 1.a</b>. or <b>1.b. If</b>
                applicable, select the box for <b>Item Number 2.</b>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. <?php echo createCheckbox("sponsor_statement_english_status") ?>I can read and understand English, and I have read and understand every question and instruction on this affidavit and my answer to every question. </label>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-12">1.b. <?php echo createCheckbox("sponsor_statement_interpreter_named_status") ?>The interpreter named in Part 9. read to me every question and instruction on this affidavit and my answer to every question in</label>
                <div class="col-md-12 d-flexible">
                    <input type="text" class="form-control  " name="sponsor_statement_interpreter_named" maxlength="35" value="<?php echo showData('sponsor_statement_interpreter_named') ?>"><b>,</b>
                </div>
                <div style="margin-left: 17px;"><b> a language in which I am fluent, and I understood everything.</b></div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. <?php echo createCheckbox("sponsor_statement_preparer_named_status") ?>At my request, the preparer named in Part 10.,</label>
                <div class="col-md-12 d-flexible">
                    <input type="text" class="form-control  " name="sponsor_statement_preparer_named" maxlength="35" value="<?php echo showData('sponsor_statement_preparer_named') ?>"><b>,</b>
                </div>
                <div style="margin-left: 17px;"><b>prepared this affidavit for me based only upon nformation I provided or authorized.</b></div>
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Sponsor's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="sponsor_daytime_tel" maxlength="12" value="<?php echo showData('sponsor_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Sponsor's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="sponsor_mobile" maxlength="13" value="<?php echo showData('sponsor_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Sponsor's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control  " name="sponsor_email" maxlength="38" value="<?php echo showData('sponsor_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Sponsor's Declaration and Certification</i></b></h4>
            </div>
            <div style="margin-left: 17px;">
                Copies of any documents I have submitted are exact
                photocopies of unaltered, original documents, and I understand
                that USCIS or the U.S. Department of State (DOS) may require
                that I submit original documents to USCIS or DOS at a later
                late. Furthermore, I authorize the release of any information
                from any and all of my records that USCIS or DOS may need to
                determine my eligibility for the benefit that I seek. <br><br>
                I furthermore authorize release of information contained in this
                affidavit, in supporting documents, and in my USCIS or DOS
                records, to other entities and persons where necessary for the
                administration and enforcement of U.S. immigration law. <br><br>
                certify, under penalty of perjury, that all of the information in
                my affidavit and any document submitted with it were provided
                or authorized by me, that I reviewed and understand all of the
                information contained in, and submitted with, my affidavit and
                that all of this information is complete, true, and correct.
            </div>
            <br>
            <div class="col-md-offset-2">
                <b> A.</b> I know the contents of this affidavit of support that I signed;
                <br><br>
                <b>B.</b> I have read and I understand each of the obligations
                described in Part 8., and I agree, freely and without any
                mental reservation or purpose of evasion, to accept
                each of those obligations in order to make it possible
                for the immigrants indicated in Part 3. to become
                lawful permanent residents of the United States;
                <br><br>
                <b>C.</b> I agree to submit to the personal jurisdiction of any
                Federal or state court that has subject matter
                jurisdiction of a lawsuit against me to enforce my
                obligations under this Form I-864;
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 8 of 10</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4> <b>Part 8. Sponsor's Contract, Statement, Contact
                        Information, Declaration, Certification, and
                        Signaturee</b>(continued)</h4>
            </div><br>
            <div class="col-md-offset-2">
                <b>D.</b> Each of the Federal income tax returns submitted in
                support of this affidavit are true copies, or are unaltered
                tax transcripts, of the tax returns I filed with the IRS;
                <br><br>
                <b>E.</b> I understand that, if I am related to the sponsored
                immigrant by marriage, the termination of the marriage
                (by divorce, dissolution, annulment, or other legal
                process) will not relieve me of my obligations under
                this Form I-864; and
                <br><br>
                <b>F.</b> I authorize the Social Security Administration to
                release information about me in its records to USCIS
                and DOS.
            </div><br>
            <div class="bg-info">
                <h4><b><i>Sponsor's Signature</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Sponsor's Signature</label>
                <div class="col-md-12">
                    <input type="text" disabled class="form-control"maxlength="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="sponsor_sign_date" value="<?php echo showData('sponsor_sign_date') ?>" />
                </div>
            </div>
            <div><b>NOTE TO ALL SPONSORS:</b> If you do not completely fill
                out this affidavit or fail to submit required documents listed in
                the Instructions, USCIS or DOS may deny your affidavit</div> <br>

            <div class="bg-info">
                <h4><b>Part 9. Interpreter's Contact Information,
                        Certification, and Signature</b></h4>
            </div> <br>
            <div><b>Provide the following information about the interpreter.</b></div><br>
            <div class="bg-info">
                <h4><b><i>Interpreter's Full Name</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_864_interpreter_family_last_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_864_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_864_interpreter_given_first_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864_interpreter_business_name" maxlength="39" value="<?php echo showData('i_864_interpreter_business_name') ?>">
                </div>
            </div>

        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Interpreters's Mailing Address </b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_864_interpreter_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_864_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_864_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_864_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_864_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_864_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_864_interpreter_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_864_interpreter_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_city_town" maxlength="20" value="<?php echo showData('i_864_interpreter_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_864_interpreter_address_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_864_interpreter_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_864_interpreter_address_zip_code" maxlength="5" value="<?php echo showData('i_864_interpreter_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_province" maxlength="20" value="<?php echo showData('i_864_interpreter_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('i_864_interpreter_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864_interpreter_address_country" maxlength="39" value="<?php echo showData('i_864_interpreter_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Interpreter's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="number" class="form-control  " name="i_864_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('i_864_interpreter_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="number" class="form-control  " name="i_864_interpreter_mobile" maxlength="10" value="<?php echo showData('i_864_interpreter_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control  " name="i_864_interpreter_email" maxlength="38" value="<?php echo showData('i_864_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_fluent_in_english" maxlength="23" value="<?php echo showData('i_864_interpreter_fluent_in_english') ?>">
                </div>
            </div>
            <div>which is the same language specified in <b>Part 8., Item Number
                    1.b.</b>, and I have read to this sponsor in the identified language
                every question and instruction on this affidavit and his or her
                answer to every question. The sponsor informed me that he or
                she understands every instruction, question, and answer on the
                affidavit, including the <b>Sponsor's Declaration and
                    Certification,</b> and has verified the accuracy of every answer. </div>
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
                    <input type="date" class="form-control" name="i_864_interpreter_sign_date" value="<?php echo showData('i_864_interpreter_sign_date') ?>"/>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 9 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 9 of 10</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 10. Contact Information, Declaration, and
                        Signature of the Person Preparing this Affidavit,
                        if Other Than the Sponsor
                    </b>
                </h4>
            </div>
            <h5><b>Provide the following information about the preparer</b></h5>
            <div class="bg-info">
                <h4><b>Preparer's Full Name</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_864_preparer_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_864_preparer_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864_preparer_business_name" maxlength="34" value="<?php echo showData('i_864_preparer_business_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_preparer_address_street_number" maxlength="25" value="<?php echo showData('i_864_preparer_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_864_preparer_address_apt_ste_flr" value="apt" <?php echo (showData('i_864_preparer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_864_preparer_address_apt_ste_flr" value="ste" <?php echo (showData('i_864_preparer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_864_preparer_address_apt_ste_flr" value="flr" <?php echo (showData('i_864_preparer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_864_preparer_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_864_preparer_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_preparer_address_city_town" maxlength="20" value="<?php echo showData('i_864_preparer_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_864_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_864_preparer_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_864_preparer_address_zip_code" maxlength="5" value="<?php echo showData('i_864_preparer_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_preparer_address_province" maxlength="20" value="<?php echo showData('i_864_preparer_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_preparer_address_postal_code" maxlength="9" value="<?php echo showData('i_864_preparer_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_864_preparer_address_country" maxlength="39" value="<?php echo showData('i_864_preparer_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="i_864_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_864_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="i_864_preparer_mobile" maxlength="10" value="<?php echo showData('i_864_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="38" name="i_864_preparer_email" value="<?php echo showData('i_864_preparer_email') ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">

                <label class="control-label col-md-12">7.a. <?php echo createCheckbox("i_864_preparer_not_attorney_status") ?> PI am not an attorney or accredited representative but
                    have prepared this affidavit on behalf of the sponsor and with the sponsor's consent.</label>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <div>
                    <label class="control-label col-md-12">7.b. <?php echo createCheckbox("i_864_preparer_an_attorney_status") ?>
                        I am an attorney or accredited representative and my
                        representation of the sponsor in this case</label><br>
                    <label class="control-label col-md-12"> <?php echo createCheckbox("i_864_preparer_extends_status") ?> extends </label><label class="control-label col-md-12"><?php echo createCheckbox("i_864_preparer_not_extends_status") ?>does not extend beyond the preparation of this affidavit</label>
                </div>
            </div>
            <p><b>NOTE:</b> If you are an attorney or accredited
                representative, you may be obliged to submit a
                completed Form G-28, Notice of Entry of Appearance
                as Attorney or Accredited Representative, or G-281,
                Notice of Entry of Appearance as Attorney In Matters
                Outside the Geographical Confines of the United
                States, with this ffidavit.</p>
            <div class="bg-info">
                <h4><b>Preparer's Certification</b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this affidavit at the request of the sponsor. The
                sponsor then reviewed this completed affidavit and informed
                me that he or she understands all of the information contained
                in, and submitted with, his or her affidavit, including the
                <b>Sponsor's Declaration and Certification</b>, and that all of this
                information is complete, true, and correct. I completed this
                affidavit based only on information that the sponsor provided
                to me or authorized me to obtain or use.
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
                    <input type="date" class="form-control" name="i_864_preparer_sign_date" value="<?php echo showData('i_864_preparer_sign_date') ?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 10 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 10 of 10</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 11. Additional Information </b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this affidavit, use the space below. If you need more space
                than what is provided, you may make copies of this page to
                complete and file with this affidavit or attach a separate sheet of
                paper. Type or print your name and A-Number (if any) at the top
                of each sheet; indicate the Page Number, Part Number, and
                Item Number to which your answer refers; and sign and date
                each sheet.
            </p>

            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864_additional_info_last_name" value="<?php echo showData('i_864_additional_info_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864_additional_info_first_name" value="<?php echo showData('i_864_additional_info_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_864_additional_info_middle_name" value="<?php echo showData('i_864_additional_info_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-6 col-md-offset-6">
                    <div class="d-flexible">
                        <b>A-</b><input type="text" maxlength="9" class="form-control" name="i_864_additional_info_a_number" value="<?php echo showData('i_864_additional_info_a_number') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_3a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_3b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_3c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>3.d.</b>
                    <textarea name="i_864_additional_info_3d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_864_additional_info_3d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_4a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_4b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_4c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>4.d.</b>
                    <textarea name="i_864_additional_info_4d" maxlength="343" class="form-control" cols="30" rows="10"><?php echo showData('i_864_additional_info_4d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_5b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_5c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>5.d.</b>
                    <textarea name="i_864_additional_info_5d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_864_additional_info_5d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_6a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_6b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_6c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>6.d.</b>
                    <textarea name="i_864_additional_info_6d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_864_additional_info_6d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_864_additional_info_7a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_864_additional_info_7b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_864_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_864_additional_info_7c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>7.d.</b>
                    <textarea class="form-control" name="i_864_additional_info_7d" maxlength="343" class="form-control" cols="30" rows="10"><?php echo showData('i_864_additional_info_7d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>