<?php
$meta_title 	=   "INTAKE FOR FORM I-102";
$page_heading 	=   "Application for Replacement/Initial Nonimmigrant Arrival-Departure Document";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 5</b></p>
    <table style="border-collapse: collapse">
        <thead>
            <tr>
                <th colspan="4" style="padding: 5px; text-align: center;" class="bg-info">To Be Completed by an Attorney/ Representative, if any.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 5px"><?php echo createCheckbox("i_102_g28_checkbox")?> Fill in box if G-28 is attached to represent the applicant.
                </td>
                <td style="padding: 5px">
                    <p>Attorney State License Number:</p>
                    <input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Alien Registration Number (A-Number) </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ►A-<input type="text" class="form-control" maxlength="9" name="" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. USCIS Online Account Number (if any) </label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        ►A-<input type="text" class="form-control" maxlength="9" name="" value="<?php echo showData('')?>">
                    </div>
                </div>
            </div>
            <div class="bg-info">
                <h4><i>Your Full Legal Name</i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_family_last_name"  value="<?php echo showData('information_about_you_family_last_name')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_given_first_name"  value="<?php echo showData('information_about_you_given_first_name')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>"/>
                </div>
            </div>
            <div class="bg-info">
                <h4><i> Other Names Used (if any)</i></h4>
            </div>
            <div class="form-group">
                <p> Provide all other names used. Include nicknames, aliases,
                maiden name, and names from previous marriages. Provide
                evidence of any name changes.
                </p>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_other_family_last_name"  value="<?php echo showData('information_about_you_other_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_other_given_first_name"  value="<?php echo showData('information_about_you_other_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">4.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="29" class="form-control" name="information_about_you_other_middle_name" value="<?php echo showData('information_about_you_other_middle_name')?>"/>
                </div>
            </div>
            <div class="bg-info">
                <h4><i>U.S Mailing Address</i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5.a. In Care of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_mailing_care_of_name" maxlength="36" value="<?php echo showData('information_about_you_mailing_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_care_of_name" maxlength="26" value="<?php echo showData('information_about_you_mailing_care_of_name')?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="control-label col-md-6"><b>5.c. </b> &nbsp;
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
                    <input type="text" class="form-control" type="text" class="form-control" name="information_about_you_mailing_apt_ste_flr_value" maxlength="6"  value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_city_town" maxlength="20" value="<?php echo showData('information_about_you_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_mailing_state">
                        <option style="" value=''>Select</option><?php foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>"; }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_mailing_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Is your current U.S. mailing address the same as your U.S. physical address?</label>
                <div class="col-md-7 col-md-offset-5">
                    <?php echo createRadio("i_102_is_same_current_mailing_status")?>
                </div>
            </div>
            <div class="form-group">
                <p>If you answered "No" to Item Number 6., provide your
                U.S. physical address in Item Numbers 7.a. - 7.f.</p>
            </div>
            <div class="bg-info">
                <h4><i>U.S Physical Address</i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. In Care of Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="26" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>7.c. </b> &nbsp;
                    <label class="control-label">
                        <input type="radio" name="" value="apt" <?php echo (showData('') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="" value="ste" <?php echo (showData('') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                    </label>
                    <label class="control-label">
                        <input type="radio" name="" value="flr" <?php echo (showData('') === 'flr') ? 'checked' : ''; ?>>
                        Flr.
                    </label>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="" maxlength="6"  value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="20" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="">
                        <option style="" value=''>Select</option><?php foreach ($allDataCountry as $record) {
							if($record->state_code==showData('')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>"; }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i>Other Information</i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="other_information_about_you_date_of_birth" maxlength="5" value="<?php echo showData('other_information_about_you_date_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">9. Country of Birth</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">10. Country of Citizenship</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="5" value="<?php echo showData('')?>">
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
            <p style=" text-align: right;">Page 2 of 5</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 1. Information About You (continued)</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">11. U.S Social Security Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4>Entry Information</h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">12. Date of Last Entry into the United States (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">13. Place of Last Entry into the United States (City and State)</label>
                <div class="col-md-6 ">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">14. Class of Admission at Last Entry Into the United States</label>
                <div class="col-md-6 ">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">15. Indicate the type of Port-of-Entry at which you last
                    entered the United States:</label>
                <div class="col-md-6 ol-md-offset-3">
                    <label>
                       <input type="radio"  name="i_102_port_of_entry_status" value="land_border" 
                       <?php echo (showData('')=='land_border') ? 'checked':''?>/> Land Border 
                    </label>
                    <label>
                        <input type="radio"  name="i_102_port_of_entry_status" value="airport" <?php echo (showData('')=='airport') ? 'checked':''?>/> Airport 
                    </label>
                    <label>
                        <input type="radio"  name="i_102_port_of_entry_status" value="seaport" <?php echo (showData('')=='seaport') ? 'checked':''?>/> Seaport
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. Current Nonimmigartion Status</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-8">17. Dates Status Expires (mm/dd/yyyy)</label>
                <div class="col-md-4">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">18.a. Form 1-94, Form 1-94W, or Form 1-95 Arrival-Departure Record Number</label>
                <div class="col-md-6 col-md-offset-6">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">18.b. Passport Number</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">18.c. Travel Document Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">18.d. Country of Issuance for Passport or Travel Document</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" value="<?= showData('')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">18.e. Expiration Date for Passport or Travel Document (mm/dd/yyyy)</label>
                <div class="col-md-6 col-md-offset-6">
                    <input type="date" class="form-control" name="" value="<?= showData('')?>"/>
                </div>
            </div>
            <p>Provide your name exactly as it appears on Form 1-94, Form
            1-94W. or Form 1-95. If the name on the form is different than
            your current legal name as entered in <b>Part 1., Item Numbers
            3.a. - 3.c,</b> provide evidence of the name change.
            </p>

            <div class="form-group">
                <label class="control-label col-md-7">19.a. Family Name (Last Name)</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">19.b. Given Name (First Name)</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">19.c.  Middle Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
                </div>
            </div>
        </div>
        <!-- left side end -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b> Part 2. Reason for Application</b></i>
                </h4>
            </div>
            <p> Select the box that best describes your reason for requesting an
            initial or replacement document. (Select only one box)
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. <?php echo createCheckbox("")?> 
                I am applying to replace my lost or stolen Form I-94 or Form 1-94W. </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. <?php echo createCheckbox("")?> 
                I am applying to replace my lost or stolen Form I-95.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.c. <?php echo createCheckbox("")?> 
                I am applying to replace my Form I-94 or Form
                1-94W because it was mutilated. I have attached my
                original Form 1-94 or Form I-94W </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.d. <?php echo createCheckbox("")?> 
                I am applying to replace my Form I-95 because it was
                mutilated. I have attached my original Form I-95.</label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.e. <?php echo createCheckbox("")?> 
                I was not issued Form 1-94 when I was admitted by
                CBP at a port-of-entry in the United States (whether
                at a land border, airport, or seaport). </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.f. <?php echo createCheckbox("")?> 
                I was issued Form I-94, Form 1-94W, or Form I-95 by
                USCIS with an error or incorrect information, and I
                am requesting that USCIS correct the document. I
                have attached my original Form I-94, Form I-94W. or
                Form I-95.
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Provide an explanation of the error or incorrect
                    information entered on Form I-94, Form I-94W, or
                    Form I-95 at the time of issuance. 
                </label>
                <div class="col-md-12">
                    <textarea class="form-control" cols="30" rows="10" name=""><?php echo showData('')?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.g. <?php echo createCheckbox("")?> 
                I was not issued Form I-94 when I entered as a
                nonimmigrant member of the military, and I am filing
                this application for an initial Form I-94. 
                </label>
            </div>

            <div class="bg-info">
                <h4><b> Part 3. Processing Information </b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Are you filing this application with any other petition or application? </label>
                <div class="col-md-5 col-md-offset-5">
                    <?php echo createRadio("")?>
                </div>
            </div>
            <p>If you answered "Yes" to <b>Items Number 1.a.</b>, provide the
            USCIS form number and name of the application or
            petition you are filing in <b>Item Number 1.b.</b>
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. USCIS Form Number and Name </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="25" value="<?php echo showData('')?>">
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
            <p style=" text-align: right;">Page 3 of 5</p>
        </b>
    </div>
    <div class="row mt-5 gap-4">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 3. Processing Information (Continued)</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">2.a. Are you now in removal proceedings? </label>
                <div class="col-md-6 col-md-offset-2">
                    <?php echo createRadio("")?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <p>f you answered "Yes" to <b>Item Number 2.a.,</b> complete
                    <b>Item Number 2.b.</b></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.b. Provide detailed information regarding the proceedings.
                If you need extra space to complete this section, use the
                space provided in Part 7. Additional Information.
                </label>
                <div class="col-md-12">
                    <textarea class="form-control" cols="30" rows="7" name=""><?php echo showData('')?></textarea>
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Part 4. Applicant's Statement, Contact
                    Information, Certification, and Signature</b></h4>
            </div>

            <div class="bg-info">
                <h4>Applicant's Contact Information</h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-12">1. Applicant's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Applicant's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Applicant's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4>Applicant's Certification and Signature</h4>
            </div>

            <p>I certify, under penalty of perjury, that I provided or authorized
            all of the responses and information contained in and submitted
            with my application, I read and understand or, if interpreted to
            me in a language in which I am fluent by the interpreter listed in
            <b>Part 5.</b>, understood, all of the responses and information
            contained in, and submitted with, my application, and that all of
            the responses and the information is complete, true, and correct.
            Furthermore, I authorize the release of any information from
            any and all of my records that USCIS may need to determine
            my eligibility for an immigration request and to other entities
            and persons where necessary for the administration and
            enforcement of U.S. immigration law.</p>

            <div class="form-group">
                <label class="control-label col-md-12">4. Applicant's Signature</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name=""
                        value="<?php echo showData('')?>" />
                </div>
            </div>
            
        </div>
        <!-- left side end -->

        <div class="col-md-6">
            <div class="bg-info">
                <h4><b> Part 5. Interpreter's Contact Information, Certification, and Signature</b></h4>
            </div>
            <div class="bg-info">
                <h4><i>Interpreter's Full Name</i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Interpreter's Family Name (Last Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Interpreter's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130a_spouse_beneficiary_mobile" maxlength="15" value="<?php echo showData('i_130a_spouse_beneficiary_mobile')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any) </label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b> Interpreter's Contact Information</b></i>
                </h4>
            </div>
             <div class="form-group">
                <label class="control-label col-md-12">3. Interpreter's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="" maxlength="36" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Interpreter's Certification and Signature</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">I certify under penalty of perjury, that I am fluent in English and</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">and I have interpreted every question on the application and
                Instructions and interpreted the applicant's answers to the
                questions in that language, and the applicant informed me that
                they understood every instruction, question, and answer on the
                application </label>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Spouse Beneficiary's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name=""
                        value="<?php echo showData('')?>" />
                </div>
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
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 4 of 5</p>
            </b>
        </div>
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 6. Contact Information, Declaration, and
                    Signature of the Person Preparing this
                    Application, If Other than the Applicant</b>
                </h4>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="" maxlength="15" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any) </label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="36" name="" value="<?php echo showData('')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b> Preparer's Contact Information</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Preparer's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_102_preparer_daytime_tel" maxlength="15" value="<?php echo showData('i_102_preparer_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_102_preparer_mobile" maxlength="15" value="<?php echo showData('i_102_preparer_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="36" name="i_102_preparer_email" value="<?php echo showData('i_102_preparer_email')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Certification and Signature </b></h4>
            </div>
            <p>I certify, under penalty of perjury, that I prepared this
            application for the applicant at their request and with express
            consent and that all of the responses and information contained
            in and submitted with the application is complete, true, and
            correct and reflects only information provided by the applicant.
            The applicant reviewed the responses and information and
            informed me that they understand the responses and information
            in or submitted with the application.
            </p>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Signature (sign in ink) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_102_preparer_sign_date" value="<?php echo showData('i_102_preparer_sign_date')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-5 col-md-offset-1"></div>
        <!-- no data needed -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right; margin: 10px" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>



<!-------------------------------------------------------
------------------------ page 5 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="row">
        <div class="page_number">
            <b>
                <p style=" text-align: right;">Page 5 of 5</p>
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
                top of each sheet; indicate the<b> Page Number, Part Number,
                and Item Number</b> to which your answer refers; and sign and
                date each sheet.
            </p>

            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)  </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="26" name="i_102_additional_info_last_name" value="<?php echo showData('i_102_additional_info_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="26" name="i_102_additional_info_first_name" value="<?php echo showData('i_102_additional_info_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" maxlength="26" name="i_102_additional_info_middle_name" value="<?php echo showData('i_102_additional_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span></span><b>A-</b><input type="text" class="form-control"
                            name="i_102_additional_info_a_number" maxlength="9" value="<?php echo showData('i_102_additional_info_a_number')?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_102_additional_info_3a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_102_additional_info_3b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_102_additional_info_3c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea name="i_102_additional_info_3d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_102_additional_info_3d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_102_additional_info_4a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_102_additional_info_4b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_102_additional_info_4c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea name="i_102_additional_info_4d" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('i_102_additional_info_4d')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_102_additional_info_5a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_102_additional_info_5b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_102_additional_info_5c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea name="i_102_additional_info_5d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_102_additional_info_5d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_102_additional_info_6a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_102_additional_info_6b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_102_additional_info_6c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea name="i_102_additional_info_6d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_102_additional_info_6d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_102_additional_info_7a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_102_additional_info_7b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_102_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_102_additional_info_7c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="i_102_additional_info_7d" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('i_102_additional_info_7d')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"/>
</fieldset>


<?php include "intake_footer.php"?>