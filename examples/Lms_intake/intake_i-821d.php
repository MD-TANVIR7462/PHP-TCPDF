<?php
$meta_title     =   "INTAKE FOR FORM i-821d";
$page_heading     =   "Consideration of Deferred Action for Childhood Arrivals ";
include "intake_header.php";
?>

<!--------------------------------------------------------------------
-------------------------------- page 1 ------------------------------
---------------------------------------------------------------------->
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 6</b></p>
    <table>
        <thead>
            <tr>
                <th style="padding: 5px; text-align: center;" colspan="3" class="bg-info">To Be Completed by an Attorney or Accredited Representative, if any.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("") ?> Select this box if Form G-28 is attached to represent the requestor.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if any):</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="">
                </td>
            </tr>
            <!-- <tr>
                <td style="padding: 5px"><label class="control-label"><?php echo createCheckbox("") ?> Fill in box if G-28 is attached to represent the applicant.</label></td>
                <td style="padding: 5px">
                    <p>Attorney State Bar Number (if applicable)</p><input type="text" class="form-control" maxlength="22" style="margin-top:30px" value="<?php echo $attorneyData->bar_number ?>">
                </td>
                <td style="padding: 5px">
                    <p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p><input maxlength="12" type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>">
                </td>
            </tr> -->
        </tbody>
    </table>
    <h5><b> ► START HERE</b>- Type or print in black ink. Read Form I-821D Instructions for information on how to complete this form </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info" style="margin-top:10px;">
                <h4><b>Part 1. Information About You (For Initial and Renewal Requests)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("") ?>I am not in immigration detention.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12"><?php echo createCheckbox("") ?>I am in immigration detention</label>
            </div>
            <b>I am requesting</b>
            <div class="form-group">
                <label class="control-label col-md-12">1.<?php echo createCheckbox("") ?>Initial Request - Consideration of Deferred Action for Childhood Arrivals </label>
            </div>
            <div class="form-group">
                <h5 style="margin-left: 10%;"><i>OR</i></h5>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2<?php echo createCheckbox("") ?>Renewal Request - Consideration of Deferred Action for Childhood Arrivals </label>
            </div>
            <div class="form-group">
                <h5 style="margin-left: 10%;"><i>AND</i></h5>
            </div>
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
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Business or Organization (if applicable)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="30" name="information_about_you_mailing_care_of_name" value="<?php showData('information_about_you_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Alien Registration Number (A-Number, if any)</label>
                <div class="col-md-12 d-flexible col-md-6 col-md-offset-6">
                    ►A-<input type="text" class="form-control" maxlength="9" name="information_about_you_mailing_care_of_name" value="<?php showData('information_about_you_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. USCIS Online Account Number (if any)</label>
                <div class="col-md-12 d-flexible col-md-8 col-md-offset-4">
                    ►<input type="text" class="form-control " maxlength="12" name="information_about_you_mailing_care_of_name" value="<?php showData('information_about_you_mailing_care_of_name') ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Mailing Address</b> (or Military APO/FPO Address, if applicable) </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5.a. In Care Of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="34" name="information_about_you_mailing_care_of_name" value="<?php showData('information_about_you_mailing_care_of_name') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_care_of_name" maxlength="28" value="<?php showData('information_about_you_mailing_street_number') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>5.c </b> &nbsp;
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
                    <input type="text" class="form-control" type="text" class="form-control" name="information_about_you_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_city_town" maxlength="20" value="<?php showData('information_about_you_mailing_city_town') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.e. State</label>
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
                <label class="control-label col-md-5">5.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_zip_code" maxlength="5" value="<?php showData('information_about_you_mailing_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_province" maxlength="20" value="<?php showData('information_about_you_mailing_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_postal_code" maxlength="9" value="<?php showData('information_about_you_mailing_postal_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5.i. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_mailing_country" maxlength="39" value="<?php echo showData('information_about_you_mailing_country') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 2. Information About the Appeal or Motion</b></h4>
            </div>
            <h5>Please indicate whether you are filing an appeal to the Administrative Appeals Office (AAO) or a motion. You are not
                allowed to file both an appeal and a motion on a single form. <b>If you select more than one box, your filing may be rejected.</b><br><br><b>NOTE: DO NOT use this form if you are filing an appeal relating to a Form I-130, Petition for Alien Relative, or a
                    Form I-360, Self-Petition for a Widow(er) of a U.S. Citizen. You must file those appeals with the Board of Immigration Appeals using Form EOIR-29.</b></h5>
        </div>
    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style=" text-align: right; margin-right: 15px;""><b>Page 2 of 6</b></p>
    <div class=" row">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 3. Information About the Immigrants You
                    Are Sponsoring</b> </h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.a. <?php echo createCheckbox("") ?>I am filing an appeal to the AAO. My brief and/or additional evidence is attached.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.b. <?php echo createCheckbox("") ?>
                I am filing an appeal to the AAO. I will submit my brief and/or additional evidence to the AAO within 30 calendar days of filing the appeal. </label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.c. <?php echo createCheckbox("") ?> I am filing an appeal to the AAO. I will not be submitting a brief and/or additional evidence.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.d. <?php echo createCheckbox("") ?>I am filing a motion to reopen. My brief and/or additional evidence is attached.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.e. <?php echo createCheckbox("") ?>I am filing a motion to reconsider. My brief is attached.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.f. <?php echo createCheckbox("") ?>I am filing a motion to reopen and a motion to reconsider. My brief and/or additional evidence is attached</label>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">2. USCIS Form for the Application or Petition That is the Subject of This Appeal or Motion (for example, Form I-140, I-360, I-129, I-485, I-601)</label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Receipt Number for the Application or Petition</label>
            <div class="col-md-12">
                <input type="text" maxlength="34" class="form-control" name="" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Requested Nonimmigrant or Immigrant Classification (for example, H-1B, R-1, O-1, EB-1, EB-2, if applicable)</label>
            <div class="col-md-12">
                <input type="text" maxlength="39" class="form-control" name="" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Date of the Adverse Decision (mm/dd/yyyy)</label>
            <div class="col-md-6 col-md-offset-6">
                <input type="date" class="form-control" name="" maxlength="38" value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Office That Issued the Adverse Decision</label>
            <div class="col-md-12">
                <select class="form-control" name="">
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
        <div class="bg-info">
            <h4><b>Part 3. Basis for the Appeal or Motion</b> </h4>
        </div>
        <h5>In <b>Part 7. Additional Information</b>, or on a separate sheet of paper, you <b>must provide a statement regarding the basis for the appeal or motion</b>. If you attach a separate sheet of paper,
            type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number, and Item Number</b> to which your answer refers; and sign and date each sheet. <br><br>
            <b>Appeal:</b> Provide a statement that specifically identifies an erroneous conclusion of law or fact in the decision being appealed. <b>You must provide this information with your Form I-290B even if you intend to submit a brief later.</b> <br><br>
            <b> Motion to Reopen:</b> A motion to reopen must state new facts and be supported by documentary evidence demonstrating eligibility for the requested immigration benefit at the time you filed the application or petition.
        </h5>

    </div>

    <!-- left side -->

    <div class="col-md-6">

        <h5><b>Motion to Reconsider:</b> A motion to reconsider must demonstrate that the decision was based on an incorrect application of law or policy, and that the decision was incorrect based on the evidence in the case record at the time of the decision. The motion must be supported by citations to
            appropriate statutes, regulations, precedent decisions, or statements of USCIS policy.</h5>
        <div class="bg-info">
            <h4><b>Part 4. Applicant's or Petitioner's Statement, Contact Information, Certification, and Signature</b></h4>
        </div>
        <h5><b>NOTE</b>: Read the <b>Penalties</b> section of the Form I-290B
            Instructions before completing this part.</h5>
        <div class="bg-info">
            <h4><b>Section A</b></h4>
        </div>
        <h5>If you are filing an appeal or motion based on an <b>APPLICATION OR PETITION FILED BY AN INDIVIDUAL (NOT A BUSINESS OR ORGANIZATION),</b> complete this section:</h5>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Statement</i></b></h4>
        </div>
        <h5><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
            applicable, select the box for <b>Item Number 2</b>.</h5>
        <div class="form-group">
            <label class="control-label col-md-12">1.a. <?php echo createCheckbox("") ?>I can read and understand English, and I have read and understand every question and instruction on this form and my answer to every question.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.b. <?php echo createCheckbox("") ?>The interpreter named in Part 5. has read to me every question and instruction on this form, and my answer to every question, in</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="email" maxlength="34" value="<?php echo showData('') ?>">
            </div>
            <h5 class="control-label col-md-12"><b>a language in which I am fluent. I understood all of this information as interpreted.</b></h5>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. <?php echo createCheckbox("") ?>At my request, the preparer named in Part 6. prepared this form for me based only upon information I provided or authorized.</label>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Contact Information</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">3. Applicant's or Petitioner's Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="daytime_telephone" maxlength="10" value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Applicant's or Petitioner's Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="mobile_telephone" maxlength="10" value="<?php echo showData('') ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Applicant's or Petitioner's Email Address (if any)</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="email" maxlength="39" value="<?php echo showData('') ?>">
            </div>
        </div>
    </div>

    <!-- left side end div        -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
----------------------------------------------------------------------->
<fieldset class="setpage">
    <p style=" text-align: right;  margin-right: 15px;""><b>Page 3 of 6</b></p>
    <div class=" row mt-5 gap-4">
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b>Part 4. Applicant's or Petitioner's Statement, Contact Information, Certification, and Signature (continued)</b></h4>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Certification</i></b></h4>
        </div>

        <div class="form-group">
            <label class="control-label col-md-12">Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of my records that USCIS may need to determine my
                eligibility for the immigration benefit that I seek. <br> <br> Applicant's or Petitioner's Certification I further authorize release of information contained in this form,
                in supporting documents, and in my USCIS records, to other entities and persons where necessary for the administration and enforcement of U.S. immigration law. <br> <br>
                I certify, under penalty of perjury, that all of the information in my form and any document submitted with it were provided or authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my form, and that all of this information is complete, true, and correct.</label>
        </div>
        <div class="bg-info">
            <h4><b><i>Applicant's or Petitioner's Signature</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6.a. Applicant's or Petitioner's Signature</label>
            <div class="col-md-12">
                <input type="text" name="" value="" maxlength="" disabled class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div class="bg-info">
            <h4><b><i>Section B</i></b></h4>
        </div>
        <div class="from-group">
            If you are filing an appeal or motion based on a <b> PETITION
                FILED BY A BUSINESS OR ORGANIZATION (NOT AN
                INDIVIDUAL)</b>, complete this section:
        </div>
        <div class="bg-info">
            <h4><b><i>Petitioner's Statement</i></b></h4>
        </div>

        <div class="form-group">
            <b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
            applicable, select the box for <b>Item Number 2</b>.
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.a. <?php echo createCheckbox("") ?>I can read and understand English, and I have read and understand every question and instruction on this form and my answer to every question.</label>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">1.b. <?php echo createCheckbox("") ?>The interpreter named in Part 5. has read to me every question and instruction on this form, and my answer to every question, in</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="email" maxlength="34" value="<?php echo showData('') ?>">
            </div>
            <h5 class="control-label col-md-12"><b>a language in which I am fluent. I understood all of this information as interpreted.</b></h5>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">2. <?php echo createCheckbox("") ?>At my request, the preparer named in Part 6. prepared this form for me based only upon information I provided or authorized.</label>
        </div>
    </div>
    <!-- left side end -->
    <div class="col-md-6">
        <div class="bg-info">
            <h4><b><i>Petitioner's Contact Information</i></b></h4>
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
                <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">4. Title</label>
            <div class="col-md-12">
                <input type="text" maxlength="34" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">5. Daytime Telephone Number</label>
            <div class="col-md-12">
                <input type="text" maxlength="10" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">6. Mobile Telephone Number (if any)</label>
            <div class="col-md-12">
                <input type="text" maxlength="10" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">7. Email Address (if any)</label>
            <div class="col-md-12">
                <input type="email" maxlength="39" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name') ?>" />
            </div>
        </div>
        <div class="bg-info">
            <h4><b><i>Petitioner's Certification</i></b></h4>
        </div>
        <div class="from-group">
            Copies of any documents submitted are exact photocopies of unaltered, original documents, and I understand that, as the petitioner, I may be required to submit original documents to USCIS at a later date. <br><br>
            I authorize the release of any information from my records, or from the petitioning organization's records, to USCIS or other entities and persons where necessary to determine eligibility for the immigration benefit
            sought or where authorized by law. I recognize the authority of USCIS to conduct audits of this form using publicly available open source information. I also recognize that any supporting evidence submitted in support
            of this form may be verified by USCIS through any means determined appropriate by USCIS, including but not limited to, on-site compliance reviews.<br><br> If filing this form on behalf of an organization, I certify that I am authorized to do so by the organization. <br><br>
            I certify, under penalty of perjury, that I have reviewed this form, I understand all of the information contained in, and submitted with, my appeal or motion, and all of this information is complete, true, and correct. <br><br>
        </div>
        <div class="bg-info">
            <h4><b><i>Petitioner's Signature</i></b></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">8.a. Applicant's or Petitioner's Signature</label>
            <div class="col-md-12">
                <input type="text" name="" value="" maxlength="39" class="form-control" disabled />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
            <div class="col-md-7 col-md-offset-5">
                <input type="date" class="form-control" name="" value="<?php echo showData('') ?>" />
            </div>
        </div>
        <div>
            <b>NOTE TO ALL APPLICANTS AND PETITIONERS: If</b>
            you do not completely fill out this form or fail to submit
            required documents listed in the Instructions, USCIS may
            dismiss, deny, or reject your appeal or motion.
        </div>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
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
                    <input type="text" class="form-control  " name="i_864_interpreter_business_name" maxlength="30" value="<?php echo showData('i_864_interpreter_business_name') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreters's Mailing Address </b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_street_number" maxlength="28" value="<?php echo showData('i_864_interpreter_address_street_number') ?>">
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
                    <input type="text" class="form-control" name="i_864_interpreter_address_city_town" maxlength="20" value="<?php showData('i_864_interpreter_address_city_town') ?>">
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
                    <input type="text" class="form-control" name="i_864_interpreter_address_zip_code" maxlength="5" value="<?php showData('i_864_interpreter_address_zip_code') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_province" maxlength="20" value="<?php showData('i_864_interpreter_address_province') ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_864_interpreter_address_postal_code" maxlength="9" value="<?php showData('i_864_interpreter_address_postal_code') ?>">
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
                    <input type="email" class="form-control  " name="i_864_interpreter_email" maxlength="39" value="<?php echo showData('i_864_interpreter_email') ?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Certification</b></i></h4>
            </div>
            <p>I certify, under penalty of perjury, that:</p>
            <div class="form-group" style="display:flex;  align-items: center;">
                <p>I am fluent in English and</p>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="24" value="<?php echo showData('') ?>">
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
                    <input type="date" class="form-control" name="i_864_interpreter_sign_date" value="<?php echo showData('') ?>" />
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
                <h4><b><i>Preparer's Mailing Address</i></b> </h4>
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
                <h4><b><i>Preparer's Contact Information</i></b></h4>
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
                    <input type="email" class="form-control" maxlength="39" name="i_864_preparer_email" value="<?php echo showData('i_864_preparer_email') ?>">
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
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

                <label class="control-label col-md-12">7.a. <?php echo createCheckbox("") ?>I am not an attorney or accredited representative but
                    have prepared this form on behalf of the applicant or
                    petitioner and with the applicant's or petitioner's
                    consent.</label>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <div>
                    <label class="control-label col-md-12">7.b. <?php echo createCheckbox("") ?>
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
                    <input type="date" class="form-control" name="" value="<?php echo showData('i_864_preparer_sign_date') ?>">
                </div>
            </div>
        </div>

    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input type="button" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
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
                        <b>►A-</b><input type="text" maxlength="9" class="form-control" name="i_864_additional_info_a_number" value="<?php echo showData('i_864_additional_info_a_number') ?>">
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
                    <textarea name="i_864_additional_info_5d" class="form-control" maxlength="305" cols="30" rows="10"><?php echo showData('i_864_additional_info_5d') ?></textarea>
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
                    <textarea class="form-control" name="i_864_additional_info_7d" maxlength="305" class="form-control" cols="30" rows="10"><?php echo showData('i_864_additional_info_7d') ?></textarea>
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
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php" ?>