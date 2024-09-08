<?php
$meta_title     =   "INTAKE FOR FORM i-290b";
$page_heading     =   " Notice of Appeal or Motion";
include "intake_header.php";
?>

<!---------------------------------------------------
------------------- page 1 --------------------------
----------------------------------------------------->
<!-- <fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 6</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("i_290b_g_28_box") ?> Fill in box if G-28 is attached to represent the applicant.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>">
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <h5><b>Please visit <a href="https://www.uscis.gov/administrative-appeals/appeals-of-denied-petitions-under-the-jurisdiction-of-the-administrative-appeals-office-aao-by-form">www.uscis.gov/i-290b/jurisdiction</a> for information on the immigration benefit types that are eligible for an appeal or motion using this form.</b></h5>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About the Applicant or Petitioner</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">2. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Business or Organization Name (if applicable)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="30" name="i_290b_principal_immigrant_business_name" value="<?php echo showData('i_290b_principal_immigrant_business_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Alien Registration Number (A-Number, if any)</label>
                <div class="col-md-12 d-flexible col-md-6 col-md-offset-6">
                    ►A-<input type="text" class="form-control" maxlength="9" name="petitioner_alien_registration_number" value="<?php echo showData('petitioner_alien_registration_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. USCIS Online Account Number (if any)</label>
                <div class="col-md-12 d-flexible col-md-8 col-md-offset-4">
                    ►<input type="text" class="form-control " maxlength="12" name="petitioner_uscis_online_account_number" value="<?php echo showData('petitioner_uscis_online_account_number') ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Mailing Address</b> (Safe or Alternate Address,<br>if applicable) </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="petitioner_us_mailing_care_of_name" value="<?php echo showData('petitioner_us_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_street_number" maxlength="28" value="<?php echo showData('petitioner_us_mailing_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>6.c </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_city_town" maxlength="20" value="<?php echo showData('petitioner_us_mailing_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_us_mailing_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('petitioner_us_mailing_state')) $selected = "selected";
                            else $selected = "";
                            echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_zip_code" maxlength="5" value="<?php echo showData('petitioner_us_mailing_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_province" maxlength="20" value="<?php echo showData('petitioner_us_mailing_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_postal_code" maxlength="9" value="<?php echo showData('petitioner_us_mailing_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="petitioner_us_mailing_country" maxlength="39" value="<?php echo showData('petitioner_us_mailing_country') ?>">
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
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 6</b></p>
    <div class=" row">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 2. Information About the Appeal or Motion</b></h4>
        </div>
        <h5>Please indicate whether you are filing an appeal to the Administrative Appeals Office (AAO) or a motion. You cannot
            file both an appeal and a motion on a single form. <b>If you select both an appeal and a motion, we may dismiss or reject your filing.</b><br><br>
            <b> NOTE: DO NOT use this form to file an appeal with the Board of Immigration Appeals (BIA). You must instead use Form EOIR-29.</b>
        </h5>
        <div class="form-group">
            <label class="control-label col-md-12">I am filing an appeal to the AAO.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.a. <?php echo createCheckbox("i_290b_appeal_or_motion_additional_status") ?>I have attached a brief and/or additional evidence.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.b. <?php echo createCheckbox("i_290b_appeal_or_motion_calendar_days_status") ?>
                I will submit a brief and/or additional evidence directly to the AAO within 30 calendar days of filing this appeal.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.c. <?php echo createCheckbox("i_290b_appeal_or_motion_submitting_status") ?> I will not be submitting any brief or additional evidence in support of this appeal.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">I am filing a motion.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2.a. <?php echo createCheckbox("i_290b_appeal_or_motion_reopen_status") ?>I am filing a motion to reopen. I have attached a brief and/or additional evidence.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2.b. <?php echo createCheckbox("i_290b_appeal_or_motion_reconsider_status") ?>I am filing a motion to reconsider. I have attached a brief.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2.c. <?php echo createCheckbox("i_290b_appeal_or_motion_reopen_and_reconsider_status") ?>I am filing a motion to reopen and a motion to reconsider. I have attached a brief and/or additional evidence.</label>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">3. Immigration Form That is the Subject of This Appeal or Motion (for example, Form I-140, I-360, I-129, I-485, I-601, I-730, I-131) (list only one form number)</label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="i_290b_appeal_or_motion_uscis_form_no" value="<?php echo showData('i_290b_appeal_or_motion_uscis_form_no') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Receipt Number for the Application, Petition, or Other Request (list only one Receipt Number)</label>
            <div class="col-md-12">
                <input type="text" maxlength="34" class="form-control" name="i_290b_appeal_or_motion_receipt_number" value="<?php echo showData('i_290b_appeal_or_motion_receipt_number') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Requested Immigrant or Nonimmigrant Classification (for example, H-1B, R-1, O-1, EB-1, EB-2, RE-2, AS-2) (if applicable)</label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="i_290b_appeal_or_motion_nonimmigrant_or_immigrant" value="<?php echo showData('i_290b_appeal_or_motion_nonimmigrant_or_immigrant') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Date of the Unfavorable Decision (mm/dd/yyyy)</label>
            <div class="col-md-6 col-md-offset-6">
                <input type="date" class="form-control" name="i_290b_appeal_or_motion_adverse_decision_date" maxlength="38" value="<?php echo showData('i_290b_appeal_or_motion_adverse_decision_date') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Office That Issued the Unfavorable Decision</label>
            <div class="col-md-12">
                <select class="form-control" name="i_290b_appeal_or_motion_adverse_decision">
                    <option value=''>Select</option>

                    <?php
                    $locations = [
                        'AAO',
                        'Humanitarian Affairs Branch  (RIH)',
                        'Agana  (AGA)',
                        'Albany  (ALB)',
                        'Albuquerque  (ABQ)',
                        'Anchorage  (ANC)',
                        'Atlanta  (ATL)',
                        'Baltimore  (BAL)',
                        'Boise  (BOI)',
                        'Boston  (BOS)',
                        'Buffalo  (BUF)',
                        'California Service Center  (WAC)',
                        'Charleston  (CHL)',
                        'Charlotte  (CLT)',
                        'Charlotte Amelie  (CHA)',
                        'Chicago  (CHI)',
                        'Chula Vista  (CVC)',
                        'Cincinnati  (CIN)',
                        'Cleveland  (CLE)',
                        'Columbus  (CLM)',
                        'Dallas  (DAL)',
                        'Denver  (DEN)',
                        'Des Moines  (DSM)',
                        'Detroit  (DET)',
                        'El Paso  (ELP)',
                        'Fresno  (FRE)',
                        'Ft. Smith, AR  (FSA)',
                        'Greer, SC  (GRR)',
                        'Harlingen  (HLG)',
                        'Hartford  (HAR)',
                        'Helena  (HEL)',
                        'Hialeah  (HIA)',
                        'Honolulu  (HHW)',
                        'Houston  (HOU)',
                        'Indianapolis  (INP)',
                        'Jacksonville  (JAC)',
                        'Kansas City  (KAN)',
                        'Kendall  (KND)',
                        'Las Vegas  (LVG)',
                        'Lawrence  (LAW)',
                        'Long Island  (LNY)',
                        'Los Angeles  (LAC)',
                        'Los Angeles  (LOS)',
                        'Los Angeles  (SFV)',
                        'Louisville  (LOU)',
                        'Manchester  (MAN)',
                        'Memphis  (MEM)',
                        'Miami (MIA)',
                        'Milwaukee  (MIL)',
                        'Mount Laurel  (MTL)',
                        'National Benefits Center  (NBC)',
                        'Nebaraska Service Center  (LIN)',
                        'New Jersey  (NEW)',
                        'New Orleans  (NOL)',
                        'New York City  (NYC)',
                        'Norfolk  (NOR)',
                        'Oakland park  (OKL)',
                        'Oklahoma City   (OKC)',
                        'Omaha  (OMA)',
                        'Orlando  (ORL)',
                        'Philadelphia  (PHI)',
                        'Phoenix  (PHO)',
                        'Pittsburgh  (PIT)',
                        'Portland   (POM)',
                        'Portland  (POO)',
                        'Providence  (PRO)',
                        'Queens  (QNS)',
                        'Raleigh  (RAL)',
                        'Refugee and International Humanitrian  (RIH)',
                        'Reno  (REN)',
                        'Sacramento  (SAC)',
                        'Salt Lake City  (SLC)',
                        'San Antonio  (SNA)',
                        'San Bernardino  (SBD)',
                        'San Diego  (SND)',
                        'San Francisco  (SFR)',
                        'San Jose  (SNJ)',
                        'San Juan  (SAJ)',
                        'Santa Ana  (SAA)',
                        'Seattle  (SEA)',
                        'Spokane  (SPO)',
                        'St. Albans  (STA)',
                        'St. Louis  (STL)',
                        'St. Paul  (SPM)',
                        'Tampa (TAM)',
                        'Texas Service Center (SRC)',
                        'Tucson (TUC)',
                        'Vermont Service Center  (EAC)',
                        'Washington  (WAS)',
                        'West Palm Beach  (WPB)',
                        'Yakima  (YAK)',
                        'Other'
                    ];
                    $selected_value = showData('i_290b_appeal_or_motion_adverse_decision');
                    foreach ($locations as $location) {
                        $selected = ($location == $selected_value) ? "selected" : "";
                        echo "<option value='$location' $selected>$location</option>";
                    }

                    ?>
                </select>
            </div>
        </div>


    </div>
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 3. Basis for the Appeal or Motion </b> </h4>
        </div>
        <h5>
            <b>
                You must provide a statement regarding the basis for your
                appeal or motion in the space provided on the next page. If
                you need additional space to provide your explanation, use Part
                7. Additional Information or a separate sheet of paper. <br><br>
                Appeal: Provide a statement that specifically identifies an
                erroneous conclusion of law or statement of fact in the decision
                you are appealing. You MUST provide this information with
                your Form I-290B even if you intend to submit a brief later. <br><br>
                NOTE: Your appeal must address all grounds of
                ineligibility identified in the unfavorable decision. If you do
                not address an issue in a statement on this form or in a
                supporting brief, we may deem it waived for the appeal. A
                waived ground of ineligibility may be the sole basis for a
                dismissed appeal. <br><br>
                Motion to Reopen: A motion to reopen must state new facts
                and must be supported by documentary evidence demonstrating
                eligibility for the requested immigration benefit at the time you
                filed the application or petition. <br><br>
                Motion to Reconsider: A motion to reconsider must state the
                reasons for reconsideration and must be supported by any
                pertinent precedent decisions to establish that the decision was
                based on an incorrect application of law or service policy, if
                applicable. A motion to reconsider must also establish that the
                decision was incorrect based on the evidence of record at the
                time of the decision. <br><br>
            </b>
        </h5>

        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="i_290b_motion_reconsider_record" maxlength="600"  cols="50"  rows="10" style="height: 500px;"><?php echo showData('i_290b_motion_reconsider_record') ?></textarea>
            </div>
        </div>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;""><b>Page 3 of 6</b></p>
    <div class=" row mt-5 gap-4">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 4. Applicant's or Petitioner's Contact Information, Certification, and Signature</b></h4>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Contact Information</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. Applicant's or Petitioner's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_applicant_or_petitioner_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_applicant_or_petitioner_daytime_tel') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. Applicant's or Petitioner's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_applicant_or_petitioner_mobile" maxlength="10" value="<?php echo showData('i_290b_applicant_or_petitioner_mobile') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Applicant's or Petitioner's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_applicant_or_petitioner_email" maxlength="39" value="<?php echo showData('i_290b_applicant_or_petitioner_email') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Certification and
                        Signature </i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">I certify, under penalty of perjury, that I provided or authorized
                all of the responses and information contained in and submitted
                with my appeal or motion, I read and understand or, if
                interpreted to me in a language in which I am fluent by the
                interpreter listed in Part 5., understood, all of the responses and
                information contained in, and submitted with, my appeal/
                motion, and that all of the responses and the information are
                complete, true, and correct. Furthermore, I authorize the release
                of any information from any and all of my records that USCIS
                may need to determine my eligibility for an immigration request
                and to other entities and persons where necessary for the
                administration and enforcement of U.S. immigration law.
            </label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Applicant's or Petitioner's Signature</label>
            <div class="col-md-12">
                <input type="text" name="" value="" maxlength="" disabled class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12"> Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="i_290b_applicant_or_petitioner_sign_date" value="<?php echo showData('i_290b_applicant_or_petitioner_sign_date') ?>" />
            </div>
        </div>
        <div class="bg-info">
            <h4><b>Part 5. Interpreter's Contact Information, Certification, and Signature </b></h4>
        </div>
        <div class="bg-info">
            <h4><b><i>Interpreter's Full Name</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1. Interpreter's Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="i_290b_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_290b_interpreter_family_last_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">Interpreter's Given Name (First Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="i_290b_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_290b_interpreter_given_first_name') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control  " name="i_290b_interpreter_business_name" maxlength="30" value="<?php echo showData('i_290b_interpreter_business_name') ?>">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b><i>Interpreter's Contact Information</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Interpreter's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="number" class="form-control  " name="i_290b_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_interpreter_daytime_tel') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Interpreter's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="number" class="form-control  " name="i_290b_interpreter_mobile" maxlength="10" value="<?php echo showData('i_290b_interpreter_mobile') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Interpreter's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="email" class="form-control  " name="i_290b_interpreter_email" maxlength="39" value="<?php echo showData('i_290b_interpreter_email') ?>">
            </div>
        </div>
        <div class="bg-info">
            <h4><i><b>Interpreter's Certification and Signature</b></i></h4>
        </div>
        <p>I certify, under penalty of perjury, that I am fluent in English and</p>
        <div style="display:flex;  align-items: center;">
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_290b_interpreter_fluent_english" maxlength="24" value="<?php echo showData('i_290b_interpreter_fluent_english') ?>">
            </div>
        </div>
        <div>and I have interpreted every question on the appeal/motion, and
            Instructions and interpreted the applicant's answers to the
            questions in that language, and the applicant/petitioner informed
            me that they understood every instruction, question, and answer
            on the appeal/motion.
        </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_290b_interpreter_sign_date" value="<?php echo showData('i_290b_interpreter_sign_date') ?>" />
                </div>
            </div>

    </div>
    </div>
 
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!---------------------------------------------------------
-------------------------------- page 4--------------------
----------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 6</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Interpreter's Contact Information, Certification, and Signature </b></h4>
            </div>
            <div><b>Provide the following information about the interpreter.</b></div>
            <div class="bg-info">
                <h4><b><i>Interpreter's Full Name</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_290b_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_290b_interpreter_family_last_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_290b_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_290b_interpreter_given_first_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control  " name="i_290b_interpreter_business_name" maxlength="30" value="<?php echo showData('i_290b_interpreter_business_name') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreters's Mailing Address </b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_interpreter_address_street_number" maxlength="28" value="<?php echo showData('i_290b_interpreter_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="i_290b_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_290b_interpreter_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_290b_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_290b_interpreter_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="i_290b_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_290b_interpreter_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_290b_interpreter_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_290b_interpreter_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_interpreter_address_city_town" maxlength="20" value="<?php echo showData('i_290b_interpreter_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_290b_interpreter_address_state">
                        <option value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_290b_interpreter_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_290b_interpreter_address_zip_code" maxlength="5" value="<?php echo showData('i_290b_interpreter_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_interpreter_address_province" maxlength="20" value="<?php echo showData('i_290b_interpreter_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('i_290b_interpreter_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_290b_interpreter_address_country" maxlength="39" value="<?php echo showData('i_290b_interpreter_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Interpreter's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="number" class="form-control  " name="i_290b_interpreter_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_interpreter_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="number" class="form-control  " name="i_290b_interpreter_mobile" maxlength="10" value="<?php echo showData('i_290b_interpreter_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control  " name="i_290b_interpreter_email" maxlength="39" value="<?php echo showData('i_290b_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_interpreter_fluent_english" maxlength="24" value="<?php echo showData('i_290b_interpreter_fluent_english') ?>">
                </div>
            </div>
            <div>which is the same language specified in <b>Part 4., Item Number 1.b. in Section A or Section B</b>, and I have read to this applicant or petitioner in the identified language every question and instruction on this form and his or her answer to every question.
                The applicant or petitioner informed me that he or she understands every instruction, question, and answer on the form, including the <b>Applicant's or Petitioner's Certification,</b> and has verified the accuracy of every answer.</div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
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
                    <input type="date" class="form-control" name="i_290b_interpreter_sign_date" value="<?php echo showData('i_290b_interpreter_sign_date') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 6. Contact Information, Declaration, and
                        Signature of the Person Preparing this Form, if
                        Other Than the Applicant or Petitioner
                    </b>
                </h4>
            </div>
            <h5><b>Provide the following information about the preparer</b></h5>
            <div class="bg-info">
                <h4><b><i>Preparer's Full Name</i></b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_290b_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_290b_preparer_family_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_290b_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_290b_preparer_given_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_290b_preparer_business_name" maxlength="34" value="<?php echo showData('i_290b_preparer_business_name') ?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Mailing Address</i></b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_preparer_address_street_number" maxlength="25" value="<?php echo showData('i_290b_preparer_address_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <label class="control-label"> <input type="radio" name="i_290b_preparer_address_apt_ste_flr" value="apt" <?php echo (showData('i_290b_preparer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label"> <input type="radio" name="i_290b_preparer_address_apt_ste_flr" value="ste" <?php echo (showData('i_290b_preparer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label"> <input type="radio" name="i_290b_preparer_address_apt_ste_flr" value="flr" <?php echo (showData('i_290b_preparer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_290b_preparer_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_290b_preparer_address_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_preparer_address_city_town" maxlength="20" value="<?php echo showData('i_290b_preparer_address_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_290b_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
                            if ($record->state_code == showData('i_290b_preparer_address_state')) $selected = "selected";
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
                    <input type="text" class="form-control" name="i_290b_preparer_address_zip_code" maxlength="5" value="<?php echo showData('i_290b_preparer_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_preparer_address_province" maxlength="20" value="<?php echo showData('i_290b_preparer_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_290b_preparer_address_postal_code" maxlength="9" value="<?php echo showData('i_290b_preparer_address_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_290b_preparer_address_country" maxlength="39" value="<?php echo showData('i_290b_preparer_address_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Contact Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="i_290b_preparer_daytime_tel" maxlength="10" value="<?php echo showData('i_290b_preparer_daytime_tel') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="i_290b_preparer_mobile" maxlength="10" value="<?php echo showData('i_290b_preparer_mobile') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_290b_preparer_email" value="<?php echo showData('i_290b_preparer_email') ?>">
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
------------------------ page 5 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 5 of 6</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Contact Information, Declaration, and
                        Signature of the Person Preparing this Form, if
                        Other Than the Applicant or Petitioner
                        (continued)
                    </b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Statement</i></b></h4>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">

                <label class="control-label col-md-12">7.a. <?php echo createCheckbox("i_290b_preparer_not_an_attorney_status") ?>I am not an attorney or accredited representative but
                    have prepared this form on behalf of the applicant or
                    petitioner and with the applicant's or petitioner's
                    consent.</label>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <div>
                    <label class="control-label col-md-12">7.b. <?php echo createCheckbox("i_290b_preparer_an_attorney_status") ?>
                        I am an attorney or accredited representative and
                        have prepared this form on behalf of the applicant or
                        petitioner and with the applicant's or petitioner's
                        consent</label><br>
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Preparer's Certification</i></b></h4>
            </div>
            <p>By my signature, I certify, under penalty of perjury, that I
                prepared this form at the request of the applicant or petitioner.
                The applicant or petitioner then reviewed this completed form
                and informed me that he or she understands all of the
                information contained in, and submitted with, his or her form,
                including the <b>Applicant's or Petitioner's Certification,</b> and
                that all of this information is complete, true, and correct. I
                completed this form based only on information that the
                applicant or petitioner provided to me or authorized me to
                obtain or use
            </p>
            <div class="bg-info">
                <h4><b><i>Preparer's Signature</i></b> </h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.a. Preparer's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_290b_preparer_sign_date" value="<?php echo showData('i_290b_preparer_sign_date') ?>">
                </div>
            </div>
        </div>

    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="sub mmit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!-------------------------------------------------------
------------------------ page 6 -------------------------
--------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align:right; margin-right:15px"><b>Page 6 of 6</b></p>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Additional Information</b> </h4>
            </div>
            <p>If you need extra space to provide any additional information
                within this form, use the space below. If you need more space
                than what is provided, you may make copies of this page to
                complete and file with this form or attach a separate sheet of
                paper. Type or print your name and A-Number at the top of
                each sheet; indicate the <b>Page Number, Part Number,</b> and <b>Item
                    Number</b> to which your answer refers; and sign and date each
                sheet.
            </p>

            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_290b_additional_info_last_name" value="<?php echo showData('i_290b_additional_info_last_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_290b_additional_info_first_name" value="<?php echo showData('i_290b_additional_info_first_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="29" name="i_290b_additional_info_middle_name" value="<?php echo showData('i_290b_additional_info_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-6 col-md-offset-6">
                    <div class="d-flexible">
                        <b>►A-</b><input type="text" maxlength="9" class="form-control" name="i_290b_additional_info_a_number" value="<?php echo showData('i_290b_additional_info_a_number') ?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_3a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_3b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_3c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>3.d.</b>
                    <textarea name="i_290b_additional_info_3d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_290b_additional_info_3d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_4a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_4b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_4c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>4.d.</b>
                    <textarea name="i_290b_additional_info_4d" maxlength="343" class="form-control" cols="30" rows="10"><?php echo showData('i_290b_additional_info_4d') ?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_5a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_5b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_5c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>5.d.</b>
                    <textarea name="i_290b_additional_info_5d" class="form-control" maxlength="305" cols="30" rows="10"><?php echo showData('i_290b_additional_info_5d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_6a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_6b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_6c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>6.d.</b>
                    <textarea name="i_290b_additional_info_6d" class="form-control" maxlength="343" cols="30" rows="10"><?php echo showData('i_290b_additional_info_6d') ?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_290b_additional_info_7a_page_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_7b_part_no') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_290b_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_290b_additional_info_7c_item_no') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <b>7.d.</b>
                    <textarea class="form-control" name="i_290b_additional_info_7d" maxlength="305" class="form-control" cols="30" rows="10"><?php echo showData('i_290b_additional_info_7d') ?></textarea>
                </div>
            </div>
            <div style="margin-left:21px;">
                <b>NOTE:</b> Make sure your appeal or motion is complete before
                filing.
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>