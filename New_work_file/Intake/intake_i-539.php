<?php
$meta_title     =   "INTAKE FOR FORM I-539";
$page_heading     =   "Application to Extend/Change Nonimmigrant Status ";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 7</b></p>
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
                        <?php echo createCheckbox("i_539_g28_status") ?> Select this box if Form G-28 is attached.
                    </label>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney State Bar Number (if applicable)</label>
                        <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled>
                    </div>
                </td>
                <td style="padding: 5px;">
                    <div>
                        <label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number
                            (if any)</label>
                        <input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" maxlength="12" disabled>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group">
        <h4 class="col-md-12" style="margin-top: 2%;">► START HERE - Type or print in black ink.</h4>
    </div>
    <div class="bg-info col-md-12" style='margin-bottom:10px'>
        <h4><b>Part 1. Information About You</b></h4>
    </div>
    <h5><b>1. Your Full Legal Name</b> </h5>

    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_family_last_name" maxlength="29"
                value="<?php echo showData('information_about_you_family_last_name') ?>">
        </div>
    </div>
    <div class=" col-md-4">
        <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_given_first_name" maxlength="28"
                value="<?php echo showData('information_about_you_given_first_name') ?>">
        </div>
    </div>
    <div class=" col-md-4" style='margin-bottom:20px'>
        <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
        </label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="information_about_you_middle_name" maxlength="27"
                value="<?php echo showData('information_about_you_middle_name') ?>">
        </div>
    </div>

    <div class="col-md-6" style='margin-bottom:20px'>
        <label class="control-label ">2. Alien Registration Number (A-Number) (if any)</label>
        <div class="col-md-12 d-flexible"> ►A-<input type="text" class="form-control" name="other_information_about_you_alien_registration_number" maxlength="9" value="<?php echo showData('other_information_about_you_alien_registration_number') ?>">
        </div>
    </div>
    <div class=" col-md-6" style='margin-bottom:20px'>
        <label class="control-label ">3. USCIS Online Account Number (if any)</label>
        <div class="col-md-12 d-flexible"> ►<input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number" maxlength="12" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>">
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">4. Your U.S. Mailing Address (Safe Address, if applicable) </label>
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
                        foreach ($allDataCountry as $record) {
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
    </div>
    <div class="form-group row">
        <label class="control-label col-md-6">5. Is your mailing address the same as your physical address?</label>
        <div class="col-md-2">
            <?php echo createRadio("is_your_current_mailing_address_same_as_physical") ?>
        </div>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">If you answered “Yes” to Item Number 5. skip to Item Number 7. If you answered “No” to Item Number 5., provide information on your physical address in Item Number 6.</label>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">6. Your Current Physical Address </label>
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
                        foreach ($allDataCountry as $record) {
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
    </div>
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 2 of 7</b></p>
    <div class="bg-info">
        <h4><b>Part 1. Information About You (continued)</b></h4>
    </div>
    <div class="bg-info">
        <h4><b><i>Other Information About You</i></b></h4>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <label class="control-label ">7. Country of Birth</label>
            <div>
                <input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="39" value="<?php echo showData('other_information_about_you_country_of_birth') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label ">8. Country of Citizenship or Nationality</label>
            <div>
                <input type="text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="39" value="<?php echo showData('other_information_about_you_country_of_citizen') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label "> 9. Date of Birth (mm/dd/yyyy)</label>
            <div>
                <input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label "> 10. U.S. Social Security Number (if any)</label>
            <div class="d-flexible">
                ►<input type="text" class="form-control" name="other_information_about_you_social_security_number" maxlength="9" value="<?php echo showData('other_information_about_you_social_security_number') ?>">
            </div>
        </div>
    </div>
    <div style="margin-bottom: 2%;" class=" col-md-12">
        <label class="control-label ">11. Provide Information About Your Most Recent Entry Into the United States</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label ">Date of Last Arrival Into the</label>
            <label class="control-label ">United States (mm/dd/yyyy)</label>
            <div> <input type=" date" class="form-control" name="i_94_imgt_date_of_last_arival" value="<?php echo showData('i_94_imgt_date_of_last_arival') ?>"> </div>
        </div>
        <div class="col-md-4">
            <label class="control-label ">Form I-94 Arrival-Departure</label><br>
            <label class="control-label ">Record Number</label>
            <div class="d-flexible">►<input type=" text" class="form-control" name="i_94_imgt_arrival_record_number" maxlength="11" value="<?php echo showData('i_94_imgt_arrival_record_number') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Passport Number </label> <br>
            <label class="control-label ">(if any)</label>
            <div><input type=" text" class="form-control" name="other_information_about_you_passport_number" maxlength="30" value="<?php echo showData('other_information_about_you_passport_number') ?>"></div>
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label">Travel Document Number</label><br>
            <label class="control-label">(if any)</label>
            <div> <input type=" text" class="form-control" name="other_information_about_you_travel_document_number" maxlength="22" value="<?php echo showData('other_information_about_you_travel_document_number') ?>"> </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label">Country of Passport or</label>
            <label class="control-label">Travel Document Issuance</label>
            <div><input type=" text" class="form-control" name="i_94_imgt_country_issuance_passport" maxlength="32" value="<?php echo showData('i_94_imgt_country_issuance_passport') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label">Passport or Travel Document Expiration</label> <br>
            <label class="control-label">Date (mm/dd/yyyy)</label>
            <div><input type="date" class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport') ?>"></div>
        </div>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-8">
            <label class="control-label ">12. Current Nonimmigrant Status (for example, F-1 student, H-4 dependent, etc.)</label>
            <div>
                <select class="form-control" name="i_539_nonimmigrant_status_combobox">
                    <option value=''></option>
                    <?php
                    $values = [
                        "1B1 - H-1B1 SPECIALITY OCCUPATION",
                        "1B2 - H-1B2 DoD SPECIALITY",
                        "1B3 - H-1B3 FASHION MODEL",
                        "1B4 - H-1B4 UNIQUE PGM ARTIST-ENT",
                        "1B5 - H-1B5 ALIEN ATHLETE",
                        "1B6 - SUPPORT PERSON OF H-1",
                        "A1 - AMBASSADOR, DIPLOMAT",
                        "A2 - OTHER DIPLOMATIC OFFICIALS",
                        "A3 - ATTENDANTS OF A-1, A-2",
                        "AS - ASYLUM",
                        "ASD - ASYLUM STATUS DENIED",
                        "AW - RAW APPLIED FOR AT A PORT",
                        "B1 - TEMPORARY VISITOR FOR BUSINESS",
                        "B1A - NI PERSNL-DOM SRVANT OF NI EMP",
                        "B1B - NI DOMESTIC SERVANT OF USC",
                        "B1C - NI EMPLOYED BY FOREIGN AIRLINE",
                        "B1D - NI - MISSIONARIES",
                        "B2 - TEMPORARY VISITOR FOR PLEASURE",
                        "BE - BERING STRAIT ENTRIES",
                        "C1 - ALIEN IN TRANSIT THROUGH U.S.",
                        "C2 - ALIEN IN TRANSIT TO UN HQ",
                        "C3 - FRN GOV OFF IN TRANSIT THRU US",
                        "CW - TRANSIT WITHOUT A VISA",
                        "CC - CUBAN MASS MIGRATION PROJECT",
                        "CH - PAROLE (HUMANITARIAN-HQ AUTH)",
                        "CP - PAROLE (PUBLIC INT-HQ AUTH)",
                        "CW - PRINCIPAL TRANSITIONAL WORKERS",
                        "D1 - ALIEN CREW DEPART SAME VESSEL",
                        "D2 - ALIEN CREW DEPART OTHER VESSEL",
                        "DA - ADVANCE PAROLE (DISTRICT AUTH)",
                        "DE - PAROLEE (DEFERRED INSPECTION)",
                        "DF - PAROLEE (DISTRICT-POE AUTH)",
                        "DK - CREW ARRIVING DETAINED ON SHIP",
                        "E1 - TREATY TRADER-SPOUSE-CHILDREN",
                        "E2C - CNMI INVESTOR",
                        "E3 - AUSTRALIA FREE TRADE AGREE",
                        "E3D - SPOUSE OR CHILD OF E3",
                        "EAO - EMPLOYMENT ADVISORY OPTI",
                        "EWI - ENTRY WITHOUT INSPECTION",
                        "F1 - STUDENT - ACADEMIC",
                        "F2 - SPOUSE-CHILD OF F-1",
                        "FSM - CFA ADM FED STATES MICRO",
                        "FUG - FAMILY UNITY GRANTED",
                        "G1 - PRINCIPAL REP. FOREIGN GOVT",
                        "G2 - OTHER REP FOREIGN GOVT",
                        "G3 - REP NON-RECOGNIZED FOREIGN",
                        "G4 - OFFICER-EMPLOYEE INTL. ORG.",
                        "G5 - ATTENDANTS OF G1, G2, G3, G4",
                        "GB - VISITOR WITHOUT A VISA 15 DAY",
                        "GMB - Guam Mariana Business",
                        "GT - VISITOR WITHOUT A VISA 15 DAY",
                        "H1 - ALIEN OF DIST MERIT & ABILITY",
                        "H1A - REGISTERED NURSE",
                        "H1B - SPECIALITY OCCUPATION",
                        "H1C - NURSE RELIEF",
                        "H2 - TEMPORARY LABOR CERTIFICATION",
                        "H2A - TEMPORARY AGRICUL WORKER",
                        "H2B - TEMPORARY NON-AG WORKER",
                        "H2R - RET(H2B)WRK NOT SUBJECT TO CAP",
                        "H3 - ALIEN TRAINEE",
                        "H3A - TRAINEE",
                        "H3B - SPECIAL EDUCATION TRAINING",
                        "H4 - SPS OR CHLD OF H1,H2,H3 OR H2R",
                        "H1B1 - FREE TRADE H1B1",
                        "I - FOREIGN PRESS",
                        "IMM - IMMIGRANT",
                        "IN - INDEFINITE PAROLE",
                        "J1 - EXCHANGE VISITOR - OTHERS",
                        "J1S - EXCHANGE VISITOR - STUDENT",
                        "J2 - SPOUSE-CHILD OF J-1",
                        "J2S - SPOUSE-CHILD OF J-1S",
                        "K1 - ALIEN FIANCE(E) OF USC",
                        "K2 - CHILD OF K1",
                        "K3 - SPOUSE OF USC",
                        "K4 - CHILD OF USC",
                        "L1 - INTRA-COMPANY TRANSFEREE",
                        "L1A - MANAGER OR EXECUTIVE",
                        "L1B - SPECIALIZED KNOWLEDGE ALIEN",
                        "L2 - SPOUSE-CHILD OF L1",
                        "L1 - IMMIGRANT INVESTOR",
                        "M1 - STUDENT - VOCATIONAL-NON-ACAD.",
                        "M2 - SPOUSE-CHILD OF M-1",
                        "MP - CPA ADM MICRON. MARSHALL ISLANDS",
                        "M1 - IMMIGRANT",
                        "M3 - OTHER WORKER",
                        "M4 - VAWA SELF-PETITIONER",
                        "MW - SPOUSE-CHILD OF M1, M2",
                        "NA - CPA ADM FED STATES MICRO",
                        "NC - AMERASIAN IMMIGRANT AM INV",
                        "ND - EVACUEE AMERASIAN IMM INV",
                        "N8 - PARENT OF SPECIAL IMMIGRANT CHILD",
                        "N9 - SPOUSE-CHILD OF N8",
                        "O1 - ALIEN OF EXTRAORDINARY ABILITY",
                        "O2 - EXTRORDINARY ALIEN IN ARTS",
                        "O3 - ACCOMPANYING ALIEN TO O1",
                        "O4 - SPOUSE-CHILD OF O1, O2",
                        "P1A - ALIEN WITH ATHLETIC EVENT",
                        "P1B - ALIEN WITH ENTERTAINMENT GROUP",
                        "P2 - EXCHANGE ARTIST-ENTERTAINER",
                        "P3 - ALIEN WITH CULTURAL EVENT",
                        "P4 - SPOUSE-CHILD OF P-1, P-3",
                        "P5 - SPOUSE-CHILD OF P-2",
                        "P6 - SPOUSE-CHILD OF P-1, P-3",
                        "P9A - CPA AMERASIAN PALAU",
                        "PX - MANAGER",
                        "PX1 - PACIFIC ISLANDER",
                        "Q1 - INT'L CULTURAL EXCH VISITORS",
                        "Q2 - IRISH PEACE PROCESS PARTICIPANTS",
                        "Q3 - SPOUSE-CHILD OF Q2",
                        "R1 - RELIGIOUS OCCUPATION",
                        "R2 - SPOUSE-CHILD OF R-1",
                        "RE - REFUGEE",
                        "RN - NATIVE-BORN CHILD",
                        "S1 - ASYLUM GRANTED",
                        "S2 - SPECIAL AGRICULTURAL WORKERS",
                        "S3 - TEMPORARY FARM WORKERS",
                        "S4 - EMPLOYMENT ECONOMY FRAUD",
                        "S5 - GOVERNMENT",
                        "T1 - VICTIM OF HUMAN TRAFFICKING",
                        "T2 - SPOUSE OF T1",
                        "T3 - CHILD OF T1",
                        "T4 - PARENT OF T1",
                        "T5 - SPOUSE OF CHILD OF T1",
                        "T6 - VICTIM OF TRAFFICKING",
                        "TN - NAFTA PROFESSIONAL (CANADA)",
                        "TP - NAFTA PROFESSIONAL (MEXICO)",
                        "U1 - VICTIM OF CRIMINAL ACTIVITY",
                        "U2 - SPOUSE OF U1",
                        "U3 - CHILD OF U1",
                        "U4 - PARENT OF U1",
                        "U5 - UNMARRIED UNDER 18 SIBLG U1 NI",
                        "UN - UNKNOWN",
                        "UU - UNKNOWN",
                        "V1 - SPOUSE OF LPR",
                        "V2 - CHILD OF LPR",
                        "V2 - CHILD OF V2",
                        "WB - VISITOR FOR BUSINESS - VWPP",
                        "WD - WITHDRAWL (I-275)",
                        "WI - WITHOUT INSPECTION ",
                        "WT - VISITOR FOR PLEASURE - VWPP",
                        "X - EOIR"
                    ];
                    $selected_value = showData('i_539_nonimmigrant_status_combobox');
                    foreach ($values as $value) {
                        $selected = ($value == $selected_value) ? "selected" : "";
                        echo "<option value='$value' $selected>$value</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Date Status Expires (mm/dd/yyyy)</label><br>
            <div><input type="date" class="form-control" name="i_539_nonimmigrant_status_expires_date" maxlength="27" value="<?php echo showData('i_539_nonimmigrant_status_expires_date') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" style="margin:1% 0 0 1.5% "><?php echo createCheckbox("granted_duration_of_status_ds") ?>Select this box if you were granted Duration of Status (D/S).</label>
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 2. Application Type </b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">1. I am applying for (select only one box):</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="application_type_applying_for_status" value="reinstatement" <?php echo (showData('application_type_applying_for_status') == 'reinstatement') ? 'checked' : '' ?>> Reinstatement to student status.</label> <br>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="application_type_applying_for_status" value="stayCurrentCity" <?php echo (showData('application_type_applying_for_status') == 'stayCurrentCity') ? 'checked' : '' ?>> An extension of stay in my current status.</label> <br>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="application_type_applying_for_status" value="change" <?php echo (showData('application_type_applying_for_status') == 'change') ? 'checked' : '' ?>> A change of status.</label>
            </div>
        </div>
        </div>
        <label class="control-label col-md-12">2. If you are applying for a change of status or change of employer/information medium, complete the following:</label>
        <div class="row form-group" style="margin-bottom: 20px;">
            <div class=" col-md-8">
                <label class="control-label">I am requesting to change my status or employer/information </label><br>
                <label class="control-label">medium to:</label>
                <div>
                    <input type="text" class="form-control" name="i_539_application_type_request_to_change_info" maxlength="39" value="<?php echo showData('i_539_application_type_request_to_change_info') ?>">
                </div>
                <div class=" col-md-4">
                    <label class="control-label">I am requesting the change to be effective </label>
                    <label class="control-label">(mm/dd/yyyy)</label>
                    <div><input type="date" class="form-control" name="application_type_request_to_change_info_date" value="<?php echo showData('application_type_request_to_change_info_date') ?>">
                    </div>
                </div>
            </div>
            <label class="control-label col-md-12">3. Number of people included in this application (select only one box):</label>
            <div class="col-md-12 ">
                <div class="form-group">
                    <label class="control-label" style="margin-left: 30px;"><input type="radio" name="application_type_number_of_included_status" value="onlyapplicant" <?php echo (showData('application_type_number_of_included_status') == 'onlyapplicant') ? 'checked' : '' ?>> I am the only applicant</label> <br>
                    <label class="control-label" style="margin-left: 30px;"><input type="radio" name="application_type_number_of_included_status" value="myfamily" <?php echo (showData('application_type_number_of_included_status') == 'myfamily') ? 'checked' : '' ?>> I am filing this application for myself and members of my family. </label> <br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-9">4. The total number of people (including me) in the application is: (Form I-539A is required for each co-applicant.)</label>
                <div class="col-md-3">
                    <div><input type="text" class="form-control" name="application_type_i_539a_applicant" maxlength="8" value="<?php echo showData('application_type_i_539a_applicant') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. The name of the school you will attend (if applicable) as an Academic Student, Vocational Student, or Exchange Visitor</label>
                <div class="col-md-12">
                    <div><input type="text" class="form-control" name="application_type_name_of_school_visitor" maxlength="86" value="<?php echo showData('application_type_name_of_school_visitor') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-8">6. Your Student and Exchange Visitor Information System (SEVIS) ID Number, if applicable</label>
                <div class="col-md-4">
                    <div><input type="text" class="form-control" name="application_type_sevis_id_number" maxlength="24" value="<?php echo showData('application_type_sevis_id_number') ?>">
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 3. Processing Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-9">1. I/We request that my/our current or requested status be extended until (mm/dd/yyyy):</label>
                <div class="col-md-3">
                    <div><input type="date" class="form-control" name="processing_info_extended_date" value="<?php echo showData('processing_info_extended_date') ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-10">2. Is this application based on an extension or change of status already granted to your spouse, child, or parent?</label>
                <div class="col-md-2">
                    <?php echo createRadio("processing_info_granted_spouse_child_parent_status") ?>
                </div>
            </div>
        </div>
        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
        <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 3 of 7
        </b></p>
    <div class="bg-info">
        <h4><b>Part 3. Processing Information (continued)</b></h4>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">3. Is this application based on a separate petition or application to provide your spouse, child, or parent an extension or change of status?</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="processing_info_based_on_separate_petition_status" value="Y_539" <?php echo (showData('processing_info_based_on_separate_petition_status') == 'Y_539') ? 'checked' : '' ?>> Yes, filed with this Form I-539</label> <br>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="processing_info_based_on_separate_petition_status" value="N" <?php echo (showData('processing_info_based_on_separate_petition_status') == 'N') ? 'checked' : '' ?>> No</label> <br>
                <label class="control-label" style="margin-left: 30px;"><input type="radio" name="processing_info_based_on_separate_petition_status" value="Y_uscis" <?php echo (showData('processing_info_based_on_separate_petition_status') == 'Y_uscis') ? 'checked' : '' ?>> Yes, filed previously and pending with U.S. Citizenship and Immigration Services (USCIS).</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">4. If you answered "Yes" to Item Number 2. or Item Number 3., select the Form type below.</label>
        <div class="col-md-12 ">
            <div class="form-group">
                <label class="control-label col-md-8" style="margin-left: 25px;"><?php echo createCheckbox("processing_info_form_539_status") ?> Form I-539, Application to Extend/Change Nonimmigrant Status </label>
                <label class="control-label col-md-8" style="margin-left: 25px;"><?php echo createCheckbox("processing_info_form_129_status") ?> Form I-129, Petition for a Nonimmigrant Worker</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-8">5. If you answered "Yes" to Item Number 2. or 3., provide the USCIS Receipt Number.</label>
        <div class="col-md-4">
            <input type="text" maxlength="13" class="form-control" name="processing_info_uscis_receipt_number" value="<?php echo showData('processing_info_uscis_receipt_number') ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">If the petition or application is pending with USCIS, also provide the following information:</label>
    </div>
    <div class="form-group">
        <label class="control-label col-md-12">6. First and Last Name of Beneficiary or Applicant</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class="col-md-6">
            <label class="control-label ">First Name of Beneficiary or Applicant</label>
            <div>
                <input type="text" class="form-control" name="beneficiary_or_applicant_first_name" maxlength="41" value="<?php echo showData('beneficiary_or_applicant_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-6">
            <label class="control-label "> Last Name of Beneficiary or Applicant</label>
            <div>
                <input type="text" class="form-control" name="beneficiary_or_applicant_last_name" maxlength="43" value="<?php echo showData('beneficiary_or_applicant_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-5">
            <label class="control-label "> 7. Date Filed (mm/dd/yyyy)</label>
            <div>
                <input type="date" class="form-control" name="beneficiary_or_applicant_date_filed" value="<?php echo showData('beneficiary_or_applicant_date_filed') ?>">
            </div>
        </div>
    </div>
    <div class="bg-info">
        <h4><b>Part 4. Additional Information About the Principal Applicant</b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label " ">1. Current Passport Information</label>
        <label class=" control-label " ">If your current passport information is different from the information you provided in Part 1., provide your current passport information. If your current passport information matches the information you provided in Part 1., proceed to Item Number 3.</label>
    </div>

    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label ">Passport Number</label>
            <div> <input type=" text" class="form-control" name="principal_applicant_passport_number" maxlength="24" value="<?php echo showData('principal_applicant_passport_number') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Country of Passport Issuance</label>
            <div><input type=" text" class="form-control" name="principal_applicant_country_issuance_passport" maxlength="33" value="<?php echo showData('principal_applicant_country_issuance_passport') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Passport Expiration Date (mm/dd/yyyy)</label>
            <div><input type="date" class="form-control" name="principal_applicant_passport_exprire_date" value="<?php echo showData('principal_applicant_passport_exprire_date') ?>"></div>
        </div>
    </div>
    <div style="margin: 2%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style=" margin-bottom: 5px;">2. Physical Address Abroad </label>
                <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
                <div style="width: 100%;">
                    <input type="text" maxlength="34" class="form-control" name="principal_applicant_street_number" value="<?php echo showData('principal_applicant_street_number') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
                <div style="flex: 1; margin-left: 5%;">
                    <label>
                        <input type="radio" name="principal_applicant_apt_ste_flr" value="apt" <?php echo (showData('principal_applicant_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="principal_applicant_apt_ste_flr" value="ste" <?php echo (showData('principal_applicant_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="principal_applicant_apt_ste_flr" value="flr" <?php echo (showData('principal_applicant_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                    </label>
                </div>
            </div>
            <div style="flex: 1;">
                <label class="control-label">Number</label>
                <input type="text" class="form-control" name="principal_applicant_apt_ste_flr_value" maxlength="5" value="<?php echo showData('principal_applicant_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 70%;">
                    <input type="text" class="form-control" name="principal_applicant_city_town" maxlength="27" value="<?php echo showData('principal_applicant_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="principal_applicant_province" maxlength="20" value="<?php echo showData('principal_applicant_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="principal_applicant_postal_code" maxlength="9" value="<?php echo showData('principal_applicant_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                <div style="width: 100%;">
                    <input type="text" class="form-control" name="principal_applicant_country" maxlength="37" value="<?php echo showData('principal_applicant_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
            </div>
        </div>
    </div>
    <div class=" col-md-12" style="margin-bottom: 2%;">
        <label class="control-label ">Answer the following questions. If you answer "Yes" to any of the questions in Item Numbers 3. - 15., use the space provided in Part 8. Additional Information to provide an explanation</label>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">3. Are you an applicant for an immigrant visa?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_immmigrant_visa_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">4. Has an immigrant petition EVER been filed for you?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_immmigrant_petiton_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">5. Have you EVER filed Form I-485, Application to Register Permanent Residence or Adjust Status?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_permanent_residence_status") ?>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 4 of 7</b></p>
    <div class="bg-info">
        <h4><b>Part 4. Additional Information About the Applicant (continued)</b></h4>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">6. Have you been arrested or convicted of any criminal offense since last entering the United States?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_arrested_last_entering_us_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Have you EVER ordered, incited, called for, committed, assisted, helped with, or otherwise participated in any of the following:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.a. Acts involving torture or genocide?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_involving_torture_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.b. Killing any person?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_kill_any_person_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.c. Intentionally and severely injuring any person?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_injur_any_person_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.d. Engaging in any kind of sexual contact or relations with any person who did not consent or was unable to consent, or was being forced or threatened?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_sexual_contact_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">7.e. Limiting or denying any person's ability to exercise religious beliefs?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_religious_belief_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">Have you EVER:</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">8.a. Served in, been a member of, assisted, or participated in any military unit, paramilitary unit, police unit, self-defense unit, vigilante unit, rebel group, guerrilla group, militia, insurgent organization, or any other armed group?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_armed_group_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">8.b. Worked, volunteered, or otherwise served in any prison, jail, prison camp, detention facility, labor camp, or any other situation that involved detaining persons?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_volunteered_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">9. Have you EVER been a member of, assisted, or participated in any group, unit, or organization of any kind in which you or other persons used or threatened to use any type of weapon against any person or threatened to do so?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_threatened_weapon_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">10. Have you EVER sold, provided, or transported weapons, or assisted any person in selling, providing, or transporting weapons, which you knew or believed would be used against another person?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_transported_weapon_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">11. Have you EVER received any weapons training, paramilitary training, or other military-type training?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_military_training_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">12. Have you EVER violated the terms of the nonimmigrant status you now hold?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_violated_ninimmigrant_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">13. Are you now in removal proceedings?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_removal_proceeding_status") ?>
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-10">14. Have you EVER been employed in the United States since last admitted or granted an extension or change of status?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_us_last_employed_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">If you answered "No" to Item Number 14., fully describe how you are supporting yourself in Part 8. Additional Information.
            Include documentary evidence of the source, amount, and basis for any income. <br><br>
            If you answered "Yes" to Item Number 14., fully describe any and all periods of employment in Part 8. Additional Information.
            Include the name and address of the employer, weekly income, and whether the employment was specifically authorized by USCIS.</label></div>
    <div class="form-group row">
        <label class="control-label col-md-10">15. Are you currently or have you EVER been a J-1 exchange visitor or a J-2 dependent of a J-1 exchange visitor?</label>
        <div class="col-md-2">
            <?php echo createRadio("principal_applicant_visitor_status") ?>
        </div>
    </div>
    <div class="form-group"><label class="control-label col-md-12">If you answered "Yes" to Item Number 15., you must provide the dates you maintained status as a J-1 exchange visitor or J-2
            dependent in Part 8. Additional Information. </label></div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right;""><b>Page 5 of 7</b></p>

    <div class=" bg-info col-md-12" style="margin-top:10px;">
    <h4><b>Part 5. Applicant's Contact Information, Certification, and Signature </b></h4>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Applicant's Contact Information</i></b></h4>
    </div>
    <p class="form-group"><b>Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).</b></p>
    <div class="col-md-12">
        <div class="col-md-6">
            <label class="control-label ">1. Applicant's Daytime Telephone Number</label>
            <input type="text" class="form-control" name="i_539_applicant_daytime_tel" maxlength="15" value="<?= showData('i_539_applicant_daytime_tel') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">2. Applicant's Mobile Telephone Number (if any)</label>
            <input type="text" class="form-control" name="i_539_applicant_mobile" maxlength="15" value="<?= showData('i_539_applicant_mobile') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">3. Applicant's Email Address (if any)</label>
            <input type="email" class="form-control" name="i_539_applicant_email" maxlength="39" value="<?= showData('i_539_applicant_email') ?>">
        </div>

    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Applicant's Certification and Signature</i></b></h4>
    </div>
    <p class="form-group"><b>I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with
            my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in Part 6.,
            understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the
            information are complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records
            that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the
            administration and enforcement of U.S. immigration law. </b></p>

    <div class="col-md-8">
        <label class="control-label ">4. Applicant's Signature</label>
        <input type="text" class="form-control" disabled />
    </div>
    <div class="col-md-4">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="i_539_applicant_sign_date" value="<?= showData('i_539_applicant_sign_date') ?>">
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b>Part 6. Interpreter's Contact Information, Certification, and Signature </b></h4>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Interpreter's Full Name</i></b></h4>
    </div>
    <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label ">1. Interpreter's Family Name (Last Name)</label>
            <input type="text" class="form-control" name="i_539_interpreter_family_last_name" maxlength="41" value="<?= showData('i_539_interpreter_family_last_name') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">Interpreter's Given Name (First Name)</label>
            <input type="text" class="form-control" name="i_539_interpreter_given_first_name" maxlength="43" value="<?= showData('i_539_interpreter_given_first_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">2. Interpreter's Business or Organization Name (if any)</label>
            <input type="text" class="form-control" name="i_539_interpreter_business_name" maxlength="34" value="<?= showData('i_539_interpreter_business_name') ?>">
        </div>
    </div>

    <div class="row col-md-12" style='margin-bottom:10px'>
        <div class=" bg-info col-md-12" style="margin-top:10px;">
            <h4><b><i>Interpreter's Contact Information</i></b></h4>
        </div>

        <div class="col-md-6">
            <label class="control-label ">3. Interpreter's Daytime Telephone Number</label>
            <input type="text" class="form-control" name="i_539_interpreter_daytime_tel" maxlength="10" value="<?= showData('i_539_interpreter_daytime_tel') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">4. Interpreter's Mobile Telephone Number (if any)</label>
            <input type="text" class="form-control" name="i_539_interpreter_mobile" maxlength="10" value="<?= showData('i_539_interpreter_mobile') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">5. Interpreter's Email Address (if any)</label>
            <input type="email" class="form-control" name="i_539_interpreter_email" maxlength="42" value="<?= showData('i_539_interpreter_email') ?>">
        </div>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Interpreter's Certification and Signature</i></b></h4>
    </div>
    <label class="control-label ">I certify, under penalty of perjury, that I am fluent in English and</label><br>
    <input type="text" maxlength="29" class="form-control col-md-4" name="i_539_interpreter_certification_language_skill" value="<?= showData('i_539_interpreter_certification_language_skill') ?>">
    <label class="control-label ">, and I have interpreted every question on the application and Instructions and interpreted the applicant's answers to the questions in that language, and the
        applicant informed me that they understood every instruction, question, and answer on the application.</label>
    <div class="col-md-8">
        <label class="control-label ">6. Interpreter's Signature</label>
        <input type="text" class="form-control" disabled />
    </div>
    <div class="col-md-4">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="i_539_interpreter_sign_date" value="<?= showData('i_539_interpreter_sign_date') ?>">
    </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 6 of 7</b></p>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
    <h4><b>Part 7. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant</b></h4>
    </div>
    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Preparer's Full Name</i></b></h4>
    </div>
    <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label ">1. Preparer's Family Name (Last Name)</label>
            <input type="text" class="form-control" name="i_539_preparer_family_last_name" maxlength="40" value="<?= showData('i_539_preparer_family_last_name') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">Preparer's Given Name (First Name)</label>
            <input type="text" class="form-control" name="i_539_preparer_family_given_first_name" maxlength="40" value="<?= showData('i_539_preparer_family_given_first_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">2. Preparer's Business or Organization Name</label>
            <input type="text" class="form-control" name="i_539_preparer_business_name" maxlength="34" value="<?= showData('i_539_preparer_business_name') ?>">
        </div>
    </div>

    <div class="row col-md-12" style='margin-bottom:10px'>
        <div class=" bg-info col-md-12" style="margin-top:10px;">
            <h4><b><i>Preparer's Contact Information</i></b></h4>
        </div>

        <div class="col-md-6">
            <label class="control-label ">4. Preparer's Daytime Telephone Number</label>
            <input type="text" class="form-control" name="i_539_preparer_daytime_tel" maxlength="10" value="<?= showData('i_539_preparer_daytime_tel') ?>" />
        </div>
        <div class="col-md-6">
            <label class="control-label ">5. Preparer's Mobile Telephone Number (if any)</label>
            <input type="text" class="form-control" name="i_539_preparer_mobile" maxlength="10" value="<?= showData('i_539_preparer_mobile') ?>">
        </div>
        <div class="col-md-6">
            <label class="control-label ">6. Preparer's Email Address (if any)</label>
            <input type="email" class="form-control" name="i_539_preparer_email" maxlength="42" value="<?= showData('i_539_preparer_email') ?>">
        </div>
    </div>

    <div class=" bg-info col-md-12" style="margin-top:10px;">
        <h4><b><i>Preparer's Certification and Signature</i></b></h4>
    </div>
    <p class="form-group col-md-12">
        <b> I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that
            all of the responses and information contained in and submitted with the application are complete, true, and correct and reflects only
            information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand
            the responses and information in or submitted with the application.</b>
    </p>
    <div class="col-md-8">
        <label class="control-label ">6. Preparer's Signature</label>
        <input type="text" class="form-control" disabled />
    </div>
    <div class="col-md-4" style="margin-bottom:10px">
        <label class="control-label ">Date of Signature (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="i_539_preparer_sign_date" value="<?= showData('i_539_preparer_sign_date') ?>">
    </div>


    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 7--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right; margin-right: 15px;"><b>Page 7 of 7</b></p>

    <div class="bg-info">
        <h4><b>Part 8. Additional Information </b></h4>
    </div>
    <div class=" col-md-12">
        <label class="control-label ">If you need extra space to provide any additional information within this application, use the space below. If you need more space
            than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.
            Type or print your name and A-Number (if any) at the top of each sheet; indicate the Page Number, Part Number, and Item
            Number to which your answer refers; and sign and date each sheet.</label>
    </div>
    <div class="row form-group" style="margin-bottom: 20px;">
        <div class=" col-md-4">
            <label class="control-label ">1. Family Name (Last Name)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_539_additional_info_last_name" maxlength="29" value="<?php echo showData('i_539_additional_info_last_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label " style="margin-left: 15px;">Given Name (First Name) </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_539_additional_info_first_name" maxlength="25" value="<?php echo showData('i_539_additional_info_first_name') ?>">
            </div>
        </div>
        <div class=" col-md-4">
            <label class="control-label ">Middle (if applicable)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_539_additional_info_middle_name" maxlength="22" value="<?php echo showData('i_539_additional_info_middle_name') ?>">
            </div>
        </div>
    </div>
    <div class="row form-group " style="margin-bottom: 20px;">
        <div class=" col-md-6">
            <label class="control-label ">2. A-Number (if any) ► A-</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="i_539_additional_info_a_number" maxlength="9" value="<?php echo showData('i_539_additional_info_a_number') ?>">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">3. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_539_additional_info_3a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_539_additional_info_3b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_3c_item_no" maxlength="9" value="<?php echo showData('i_539_additional_info_3c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">

            <div class="col-md-12">
                <textarea name="i_539_additional_info_3d" class="form-control" maxlength="325" cols="30" rows="10"><?php echo showData('i_539_additional_info_3d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">4. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_539_additional_info_4a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_539_additional_info_4b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_4c_item_no" maxlength="9" value="<?php echo showData('i_539_additional_info_4c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea name="i_539_additional_info_4d" class="form-control" maxlength="325" cols="30" rows="10"><?php echo showData('i_539_additional_info_4d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">5. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_539_additional_info_5a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_539_additional_info_5b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_5c_item_no" maxlength="9" value="<?php echo showData('i_539_additional_info_5c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="i_539_additional_info_5d" maxlength="325" class="form-control" cols="30" rows="10"><?php echo showData('i_539_additional_info_5d') ?></textarea>
            </div>
        </div>
        <div class="d-flexible">
            <div class="form-group">
                <label class="control-label col-md-12">6. Page Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_539_additional_info_6a_page_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"> Part Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_539_additional_info_6b_part_no') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Item Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_539_additional_info_6c_item_no" maxlength="9" value="<?php echo showData('i_539_additional_info_6c_item_no') ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <textarea class="form-control" name="i_539_additional_info_6d" maxlength="325" class="form-control" cols="30" rows="10"><?php echo showData('i_539_additional_info_6d') ?></textarea>
            </div>
        </div>
    </div>
    <input type="submit" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>