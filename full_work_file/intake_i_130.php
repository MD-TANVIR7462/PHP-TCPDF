<?php
$meta_title 	=   "INTAKE FORM I-130";
$page_heading 	=   "INTAKE FORM I-130, Petition for Alien Relative";

include "intake_header.php";
?>

<!-------------------------------------------------------
------------------------ page 1 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align: right"><b>Page 1 of 12</b></p>
	</div>
	<table style="border-collapse: collapse; ">
		<thead>
			<tr>
				<th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To be completed by an attorney or accredited representative (if any).</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="padding: 5px;"><?php echo createCheckbox("i_130_g28_checkbox")?> Select this box if Form G-28 is attached.
				</td>
				<td style="padding: 5px;">
					<div>
						<p>Volag Number (if any)</p><br>
						<input type="text" class="form-control" value="<?php echo $attorneyData->volag_number?>" disabled>
					</div>
				</td>
				<td style="padding: 5px;">
					<div>
						<p>Attorney State Bar Number (if applicable)</p><br>
						<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
					</div>
				</td>
				<td style="padding: 5px;">
					<div>
						<p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number?>" disabled >
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b> Part 1. Relationship (You are the Petitioner. Your relative is the Beneficiary)</b></h4>
			</div>
			<div >
				<p><b>1. I am filing this petition for my (Select only one box):</b></p>
				<div class="form-group">
					<label class="control-label">
						<input type="radio" name="i_130_petition_filing_for" value="spouse" 
						<?php echo (showData('i_130_petition_filing_for')=='spouse')?'checked':'';?>> Spouse
					</label>
					<label class="control-label">
						<input type="radio" name="i_130_petition_filing_for" value="parent" 
						<?php echo (showData('i_130_petition_filing_for')=='parent')?'checked':'';?>> Parent
					</label>
					<label class="control-label">
						<input type="radio" name="i_130_petition_filing_for" value="brother" 
						<?php echo (showData('i_130_petition_filing_for')=='brother')?'checked':'';?>> Brother / Sister
					</label>
					<label class="control-label">
						<input type="radio" name="i_130_petition_filing_for" value="child" 
						<?php echo (showData('i_130_petition_filing_for')=='child')?'checked':'';?>> Child
					</label>
				</div>
			</div>
			<div class="form-group;">
				<p style="padding-bottom:10px;  "><b>2. If you are filing this petition for your child or parent,
						select the box that describes your relationship (Select only
						one box)</b></p>
				<p style="padding-bottom:10px;  "><?php echo createCheckbox("i_130_petition_filing_for_child")?>Child was born to parents who were
					married to each
					other at the time of the child's birth</p>
				<p style="padding-bottom:10px;  "><?php echo createCheckbox("i_130_petition_filing_for_stepchild")?>Stepchild / Stepparent
				</p>
				<p style="padding-bottom:10px;  "><?php echo createCheckbox("i_130_petition_filing_for_not_married_child")?>Child was born to parents who were
					not married to
					each other at the time of the child's birth
				</p>
				<p style="padding-bottom:10px;  "><?php echo createCheckbox("i_130_petition_filing_for_adopted")?>Child was adopted (not an Orphan or Hague Convention adoptee)</p>
			</div>
			<div class="form-group">
				<label>3. If the beneficiary is your brother/sister, are you related
					by adoption?</label>
				<div class=" col-md-offset-8">
					<?php echo createRadio("i_130_beneficiary_relation")?>
				</div>
			</div>
			<div class="form-group">
				<label>4. Did you gain lawful permanent resident status or
					citizenship through adoption?</label>
				<div class=" col-md-offset-8">
					<?php echo createRadio("i_130_did_you_gain_status")?>
				</div>
			</div>
		</div>
		<!-- left side end -->
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information About You (Petitioner)</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1. Alien Registration Number (A-Number) (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr"> ►A-</span><input type="text" class="form-control"
							maxlength="9" name="petitioner_alien_registration_number" value="<?php echo showData('petitioner_alien_registration_number')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. USCIS Online Account Number (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" name="petitioner_uscis_online_account_number"
							maxlength="12" value="<?php echo showData('petitioner_uscis_online_account_number')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. U.S. Social Security Number (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" name="petitioner_social_security_number"
							maxlength="12" value="<?php echo showData('petitioner_social_security_number')?>">
					</div>
				</div>
			</div>
			<div class="bg-info">
				<h4><b> <i>Your Full Name</i></b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
				<div class="col-md-7">
					<input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.b. Given Name(First Name)</label>
				<div class="col-md-7">
					<input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">1.c. Middle Name</label>
				<div class="col-md-7">
					<input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name')?>" />
				</div>
			</div>
		</div>
	</div>
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 2 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 2 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Information About You (Petitioner) (continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b>Other Names Used (if any)</b></h4>
            </div>
            <p>Provide all other names you have ever used, including aliases,
                maiden name, and nicknames.</p>
            <div class="form-group">
                <label class="control-label col-md-5">5.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="27" class="form-control" name="petitioner_other_family_last_name" value="<?php echo showData('petitioner_other_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" maxlength="27" class="form-control" name="petitioner_other_given_first_name" value="<?php echo showData('petitioner_other_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">5.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" maxlength="27" class="form-control" name="petitioner_other_middle_name" value="<?php echo showData('petitioner_other_middle_name')?>"/>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Other Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6. City/Town/Village of Birth</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"  maxlength="29" name="petitioner_city_of_birth" value="<?= showData('petitioner_city_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7. Country of Birth</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_country_of_birth" maxlength="39" value="<?= showData('petitioner_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">8. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="petitioner_date_of_birth" value="<?= showData('petitioner_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">9. Sex</label>
                <div class="col-md-6">
					<div class="control-label">
						<input type="radio" name="petitioner_gender" value="male" <?php echo (showData('petitioner_gender')=='male') ? 'checked' : '' ?>> Male &nbsp;
						<input type="radio" name="petitioner_gender" value="female" <?php echo (showData('petitioner_gender')=='female') ? 'checked' : '' ?>> Female &nbsp;
					</div>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Mailing Address</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.a. In Care Of Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_care_of_name" maxlength="39" value="<?php echo showData('petitioner_us_mailing_care_of_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">10.b. Street Number and Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_us_mailing_street_number" maxlength="28" value="<?php echo showData('petitioner_us_mailing_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>10.c. </b> &nbsp;
                    <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_us_mailing_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('petitioner_us_mailing_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_city_town" maxlength="20" value="<?php echo showData('petitioner_us_mailing_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.e. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_us_mailing_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_us_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_zip_code" maxlength="5" value="<?php echo showData('petitioner_us_mailing_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_province" maxlength="20" value="<?php echo showData('petitioner_us_mailing_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_postal_code" maxlength="9" value="<?php echo showData('petitioner_us_mailing_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">10.i. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_us_mailing_country" maxlength="39" value="<?php echo showData('petitioner_us_mailing_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">11. Is your current mailing address the same as your physical address?</label>
                <div class=" col-md-12">
                    <?php echo createRadio("i_130_is_current_address_same")?>
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
                <label class="control-label col-md-6">12.a. Street Number and Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_home_street_number" maxlength="25" value="<?php echo showData('petitioner_home_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>12.b. </b> &nbsp;
                    <input type="radio" name="petitioner_home_apt_ste_flr" value="apt" <?php echo (showData('petitioner_home_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="petitioner_home_apt_ste_flr" value="ste" <?php echo (showData('petitioner_home_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="petitioner_home_apt_ste_flr" value="flr" <?php echo (showData('petitioner_home_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_home_apt_ste_flr_value" maxlength="6"
                    value="<?php echo showData('petitioner_home_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_city_town" maxlength="20" value="<?php echo showData('petitioner_home_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_home_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_home_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_zip_code" maxlength="5" value="<?php echo showData('petitioner_home_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_province" maxlength="20" value="<?php echo showData('petitioner_home_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_postal_code" maxlength="9" value="<?php echo showData('petitioner_home_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_country" maxlength="39" value="<?php echo showData('petitioner_home_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">13.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="petitioner_home_residence_from_date" value="<?= showData('petitioner_home_residence_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">13.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="petitioner_home_residence_to_date" value="<?= showData('petitioner_home_residence_to_date')?>" />
                </div>
            </div>
            <hr>
            <p><b>Physical Address 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">14.a. Street Number and Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_home_street_number2" maxlength="25" value="<?php echo showData('petitioner_home_street_number2')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>14.b. </b> &nbsp;
                    <input type="radio" name="petitioner_home_apt_ste_flr2" value="apt" <?php echo (showData('petitioner_home_apt_ste_flr2') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="petitioner_home_apt_ste_flr2" value="ste" <?php echo (showData('petitioner_home_apt_ste_flr2') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="petitioner_home_apt_ste_flr2" value="flr" <?php echo (showData('petitioner_home_apt_ste_flr2') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_home_apt_ste_flr_value2" maxlength="6"
                        value="<?php echo showData('petitioner_home_apt_ste_flr_value2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_city_town2" maxlength="20" value="<?php echo showData('petitioner_home_city_town2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_home_state2">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_home_state2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_zip_code2" maxlength="5" value="<?php echo showData('petitioner_home_zip_code2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_province2" maxlength="20" value="<?php echo showData('petitioner_home_province2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_postal_code2" maxlength="9" value="<?php echo showData('petitioner_home_postal_code2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_home_country2" maxlength="39" value="<?php echo showData('petitioner_home_country2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">15.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="petitioner_home_residence_from_date2" value="<?= showData('petitioner_home_residence_from_date2')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">15.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="petitioner_home_residence_to_date2" value="<?= showData('petitioner_home_residence_to_date2')?>" />
                </div>
            </div>
            <hr>
            <div class="bg-info">
                <h4><i><b>Your Marital Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. How many times have you been married?</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control col-md-3"
                            name="petitioner_total_married" maxlength="5" value="<?= showData('petitioner_total_married')?>" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <p><b>17. Current Marital Status</b></p>
                <div class="col-md-10 col-md-offset-2">
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="single" <?php echo (showData('petitioner_marital_status')=='single')?'checked':'';?>> Single, Never Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="married" 
                        <?php echo (showData('petitioner_marital_status')=='married')?'checked':'';?>> Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="divorced" 
                        <?php echo (showData('petitioner_marital_status')=='divorced')?'checked':'';?>> Divorced
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="widowed" 
                        <?php echo (showData('petitioner_marital_status')=='widowed')?'checked':'';?>> Widowed
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="legally_separated" 
                        <?php echo (showData('petitioner_marital_status')=='legally_separated')?'checked':'';?>> Legally Separated
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="marriage_annulled" 
                        <?php echo (showData('petitioner_marital_status')=='marriage_annulled')?'checked':'';?>> Marriage Annulled
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="petitioner_marital_status" value="other" 
                        <?php echo (showData('petitioner_marital_status')=='other')?'checked':'';?>> Other
					</label>
				</div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 3 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 3 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 2. Information About You (Petitioner) (continued)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">18. Date of Current Marriage (if currently married) (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="petitioner_current_spouse_date_of_marriage" value="<?php echo showData('petitioner_current_spouse_date_of_marriage')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Place of Your Current Marriage (if married)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">19.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_current_spouse_marriage_place_city_town" maxlength="20" value="<?php echo showData('petitioner_current_spouse_marriage_place_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">19.b. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_current_spouse_marriage_place_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_current_spouse_marriage_place_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">19.c. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_current_spouse_marriage_place_province" maxlength="5" value="<?php echo showData('petitioner_current_spouse_marriage_place_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">19.d. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_current_spouse_marriage_place_country" maxlength="20" value="<?php echo showData('petitioner_current_spouse_marriage_place_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Names of All Your Spouses (if any)</b></h4>
            </div>
            <p>Provide information on your current spouse (if currently married) first and then list all your prior spouses (if any).</p>
            <br>
            <p><b>Spouse 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">20.a. Family Name(Last Name) </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse1_family_last_name" value="<?php echo showData('petitioner_prior_spouse1_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">20.b. Given Name(First Name) </label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  maxlength="29" name="petitioner_prior_spouse1_given_first_name" value="<?php echo showData('petitioner_prior_spouse1_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">20.c. Middle Name </label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  maxlength="29" name="petitioner_prior_spouse1_middle_name" value="<?php echo showData('petitioner_prior_spouse1_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">21. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="petitioner_prior_spouse1_marriage_end_date" value="<?= showData('petitioner_prior_spouse1_marriage_end_date')?>" />
                </div>
            </div>
            <hr>
            <p><b>Spouse 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">22.a. Family Name(Last Name) </label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  maxlength="29" name="petitioner_prior_spouse2_family_last_name" value="<?php echo showData('petitioner_prior_spouse2_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">22.b. Given Name(First Name) </label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  maxlength="29" name="petitioner_prior_spouse2_given_first_name" value="<?php echo showData('petitioner_prior_spouse2_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">22.c. Middle Name </label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  maxlength="29" name="petitioner_prior_spouse2_middle_name" value="<?php echo showData('petitioner_prior_spouse2_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">23. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="petitioner_prior_spouse2_marriage_end_date" value="<?= showData('petitioner_prior_spouse2_marriage_end_date')?>"/>
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Information About Your Parents</b></i></h4>
            </div>			
            <p><b>Parent 1's Information</b></p>
            <p>Full Name of Parent 1</p>
            <div class="form-group">
                <label class="control-label col-md-6">24.a. Family Name(Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" maxlength="29" name="petitioner_parent1_info_family_last_name" value="<?php echo showData('petitioner_parent1_info_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">24.b. Given Name(First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" maxlength="29" name="petitioner_parent1_info_given_first_name" value="<?php echo showData('petitioner_parent1_info_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">24.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" maxlength="29" name="petitioner_parent1_info_middle_name" value="<?php echo showData('petitioner_parent1_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">25. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="petitioner_parent1_info_date_of_birth" value="<?= showData('petitioner_parent1_info_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">26. Sex</label>
                <div class="col-md-6">
					<input type="radio" name="petitioner_parent1_info_gender" value="male" <?php echo (showData('petitioner_parent1_info_gender')=='male') ? 'checked' : '' ?>> Male &nbsp;
					<input type="radio" name="petitioner_parent1_info_gender" value="female" <?php echo (showData('petitioner_parent1_info_gender')=='female') ? 'checked' : '' ?>> Female &nbsp;
                </div>
            </div>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-6">27. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent1_info_country_of_birth" maxlength="20" value="<?php echo showData('petitioner_parent1_info_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">28. City/Town/Village of Residence</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent1_info_city_of_residence" maxlength="20" value="<?php echo showData('petitioner_parent1_info_city_of_residence')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">29. Country of Residence</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent1_info_country_of_Residence" maxlength="20" value="<?php echo showData('petitioner_parent1_info_country_of_Residence')?>">
                </div>
            </div>
            <p><b>Parent 2's Information</b></p>
            <p>Full Name of Parent 2</p>
            <div class="form-group">
                <label class="control-label col-md-6">30.a. Family Name(Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" maxlength="29" name="petitioner_parent2_info_family_last_name" value="<?php echo showData('petitioner_parent2_info_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">30.b. Given Name(First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" maxlength="29" name="petitioner_parent2_info_given_first_name" value="<?php echo showData('petitioner_parent2_info_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">30.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent2_info_middle_name" value="<?php echo showData('petitioner_parent2_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">31. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="petitioner_parent2_info_date_of_birth" value="<?= showData('petitioner_parent2_info_date_of_birth')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">32. Sex</label>
                <div class="col-md-6">
					<input type="radio" name="petitioner_parent2_info_gender" value="male" <?php echo (showData('petitioner_parent2_info_gender')=='male') ? 'checked' : '' ?>> Male &nbsp;
					<input type="radio" name="petitioner_parent2_info_gender" value="female" <?php echo (showData('petitioner_parent2_info_gender')=='female') ? 'checked' : '' ?>> Female &nbsp;
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">33. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent2_info_country_of_birth" maxlength="20" value="<?php echo showData('petitioner_parent2_info_country_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">34. City/Town/Village of Residence</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent2_info_city_of_residence" maxlength="20" value="<?php echo showData('petitioner_parent2_info_city_of_residence')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">35. Country of Residence</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_parent2_info_country_of_Residence" maxlength="20" value="<?php echo showData('petitioner_parent2_info_country_of_Residence')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Additional Information About You (Petitioner)</b></h4>
            </div>
            <div style="padding-bottom:10px;">
                <p><b>36. I am a (Select only one box):</b></p>
                <label class="control-label">
                   <input type="radio" name="petitioner_residence_status" value="us_citizen" 
                    <?php echo (showData(petitioner_residence_status)=='us_citizen') ? 'checked' : '' ?>> U.S citizen &nbsp; 
                </label>
                <label class="control-label">
                    <input type="radio" name="petitioner_residence_status" value="lawful_residence" 
                    <?php echo (showData('petitioner_residence_status')=='lawful_residence') ? 'checked' : '' ?>> Lawful Permanent Resident &nbsp;
                </label>
            </div>
            <p><b>If you are a U.S. citizen, complete Item Number 37.</b></p>
            <div style="padding-bottom:10px;">
                <p><b>37. My citizenship was acquired through (Select only one box):</b></p>
                <label class="control-label">
					<input type="radio" name="petitioner_citizenship_acquired_status" value="birth" 
                    <?php echo (showData('petitioner_citizenship_acquired_status')=='birth') ? 'checked' : '' ?>> Birth in the United States &nbsp; 
                </label>
                <label class="control-label">
                    <input type="radio" name="petitioner_citizenship_acquired_status" value="naturalization" 
                    <?php echo (showData('petitioner_citizenship_acquired_status')=='naturalization') ? 'checked' : '' ?>> Naturalization &nbsp;
                </label>

                <label class="control-label">
                    <input type="radio" name="petitioner_citizenship_acquired_status" value="parent" 
                    <?php echo (showData('petitioner_citizenship_acquired_status')=='parent') ? 'checked' : '' ?>> Parents &nbsp;
                </label>
            </div>
            <div class="form-group">
                <label>38. Have you obtained a Certificate of Naturalization or a Certificate of Citizenship?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("petitioner_citizenship_certificate")?>
                </div>
            </div>
            <p>If you answered "Yes" to Item Number 38., complete the following:</p>
            <div class="form-group">
                <label class="control-label col-md-6">39.a. Certificate Number</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_citizenship_certificate_number" maxlength="29" value="<?php echo showData('petitioner_citizenship_certificate_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">39.b. Place of Issuance</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_citizenship_place_of_issuance" maxlength="29" value="<?php echo showData('petitioner_citizenship_place_of_issuance')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">39.c. Date of Issuance (mm/dd/yyyy)</label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="petitioner_citizenship_date_of_issuance" value="<?= showData('petitioner_citizenship_date_of_issuance')?>" />
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next"
        style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 4 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 4 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Part 2. Information About You (Petitioner) (continued)</b></i></h4>
            </div>
            <p>If you are a lawful permanent resident, complete Item Numbers 40.a. - 41.</p>
            <div class="form-group">
                <label class="control-label col-md-5">40.a. Class of Admission</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_class_of_admission" maxlength="39" value="<?php echo showData('petitioner_class_of_admission')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-7">40.b. Date of Admission (mm/dd/yyyy)</label>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="petitioner_date_of_admission" value="<?= showData('petitioner_date_of_admission')?>" />
                </div>
            </div>
            <p>Place of Admission</p>
            <div class="form-group">
                <label class="control-label col-md-5">40.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_place_of_admission_city_town" maxlength="39" value="<?php echo showData('petitioner_place_of_admission_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">40.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_place_of_admission_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_place_of_admission_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>41. Did you gain lawful permanent resident status through marriage to a U.S. citizen or lawful permanent resident?</label>
				<?php echo createRadio("petitioner_gain_lawful_permanent_resident_status")?>
            </div>
            <div class="bg-info">
                <h4><i><b>Employment History</b></i></h4>
            </div>
            <p>Provide your employment history for the last five years, whether
                inside or outside the United States. Provide your current
                employment first. If you are currently unemployed, type or print
                "Unemployed" in Item Number 42. </p>
            <br>
            <p><b>Employer 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">42. Name of Employer/Company</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_name" maxlength="39" value="<?php echo showData('petitioner_employer1_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_street_number" maxlength="25" value="<?php echo showData('petitioner_employer1_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>43.b.</b> &nbsp;
                    <input type="radio" name="petitioner_employer1_apt_ste_flr" value="apt" <?php echo (showData('petitioner_employer1_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="petitioner_employer1_apt_ste_flr" value="ste" <?php echo (showData('petitioner_employer1_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="petitioner_employer1_apt_ste_flr" value="flr" <?php echo (showData('petitioner_employer1_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_employer1_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('petitioner_employer1_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_city_town" maxlength="20" value="<?php echo showData('petitioner_employer1_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_employer1_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_employer1_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_zip_code" maxlength="5" value="<?php echo showData('petitioner_employer1_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_province" maxlength="20" value="<?php echo showData('petitioner_employer1_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_postal_code" maxlength="9" value="<?php echo showData('petitioner_employer1_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">43.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_country" maxlength="39" value="<?php echo showData('petitioner_employer1_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">44. Your Occupation</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer1_occupation" maxlength="39" value="<?php echo showData('petitioner_employer1_occupation')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">45.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="petitioner_employer1_from_date" value="<?= showData('employer1_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">45.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-6 ">
                    <input type="date" class="form-control" name="petitioner_employer1_to_date" value="<?= showData('petitioner_employer1_to_date')?>" />
                </div>
            </div>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <p><b>Employer 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">46. Name of Employer/Company</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_employer2_name" maxlength="39" value="<?php echo showData('petitioner_employer2_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">47.a. Street Number and Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="petitioner_employer2_address" maxlength="25" value="<?php echo showData('petitioner_employer2_address')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>47.b.</b> &nbsp;
                    <input type="radio" name="petitioner_employer2_apt_ste_flr" value="apt" <?php echo (showData('petitioner_employer2_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="petitioner_employer2_apt_ste_flr" value="ste" <?php echo (showData('petitioner_employer2_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="petitioner_employer2_apt_ste_flr" value="flr" <?php echo (showData('petitioner_employer2_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="petitioner_employer2_apt_ste_flr_value" maxlength="6" value="<?php echo showData('petitioner_employer2_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer2_city_town" maxlength="20" value="<?php echo showData('petitioner_employer2_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="petitioner_employer2_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('petitioner_employer2_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer2_zip_code" maxlength="5" value="<?php echo showData('petitioner_employer2_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer2_province" maxlength="20" value="<?php echo showData('petitioner_employer2_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer2_postal_code" maxlength="9" value="<?php echo showData('petitioner_employer2_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">47.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer2_country" maxlength="39" value="<?php echo showData('petitioner_employer2_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">48. Your Occupation</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="petitioner_employer2_occupation" maxlength="39" value="<?php echo showData('petitioner_employer2_occupation')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">49.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="petitioner_employer2_from_date" value="<?= showData('petitioner_employer2_from_date')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">49.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="petitioner_employer2_to_date" value="<?= showData('petitioner_employer2_to_date')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Part 3. Biographic Information</b></i></h4>
            </div>
            <p><b>NOTE:</b> Provide the biographic information about you, the petitioner</p>
            <br>
            <div class="form-group">
                <label>1. Ethnicity (Select only one box)</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="biographic_info_ethnicity" value="hispanic" <?php echo (showData('biographic_info_ethnicity')=='hispanic') ? 'checked':''?>>
                    <label class="form-check-label">Hispanic or Latino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="biographic_info_ethnicity" value="nothispanic" <?php echo (showData('biographic_info_ethnicity')=='nothispanic') ? 'checked':''?>>
                    <label class="form-check-label">Not Hispanic or Latino</label>
                </div>
            </div>
            <!-- Race -->
            <div class="form-group">
                <label>2. Race (Select all applicable boxes)</label>
                <div class="form-check">
                    <?php echo createCheckbox("biographic_info_race_white")?>
                    <label class="form-check-label">White</label>
                </div>
                <div class="form-check">
                    <?php echo createCheckbox("biographic_info_race_asian")?>
                    <label class="form-check-label">Asian</label>
                </div>
                <div class="form-check">
                     <?php echo createCheckbox("biographic_info_race_black_african")?>
                    <label class="form-check-label">Black or African American</label>
                </div>
                <div class="form-check">
                    <?php echo createCheckbox("biographic_info_race_american_native")?>
                    <label class="form-check-label">American Indian or Alaska Native</label>
                </div>
                <div class="form-check">
                     <?php echo createCheckbox("biographic_info_race_native_islander")?>
                    <label class="form-check-label">Native Hawaiian or Other Pacific Islander</label>
                </div>
            </div>
            <div class="form-group">
                <label>3. Height</label>
                <label style="padding-left:10%">Feet:</label>
                <select id="feet" name="biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <?php echo"<option value=".showData('biographic_info_height_feet')." selected>".showData('biographic_info_height_feet')."</option>";?>
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
                    <?php echo"<option value=".showData('biographic_info_height_inches')." selected>".showData('biographic_info_height_inches')."</option>";?>
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
                <span><b>4. Weight</b></span>
                <span style="padding-left:10%"><b> Pounds:</b></span>

                <input type="text" maxlength="1" name="biographic_info_weight_in_pound1" value="<?php echo showData('biographic_info_weight_in_pound1')?>"
                    style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                <input type="text" maxlength="1" name="biographic_info_weight_in_pound2" value="<?php echo showData('biographic_info_weight_in_pound2')?>"
                    style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">

                <input type="text" maxlength="1" name="biographic_info_weight_in_pound3" value="<?php echo showData('biographic_info_weight_in_pound3')?>"
                    style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <br>
            <div>
                <label>5. Eye Color (Select only one box ) </label><br>
                <input type="radio"  name="biographic_info_eye_color" value="black" 
                <?php echo (showData('biographic_info_eye_color')=='black') ? 'checked':''?>> Black<br>

                <input type="radio"  name="biographic_info_eye_color" value="blue" 
                <?php echo (showData('biographic_info_eye_color')=='blue') ? 'checked':''?>> Blue<br>

                <input type="radio"  name="biographic_info_eye_color" value="brown" 
                <?php echo (showData('biographic_info_eye_color')=='brown') ? 'checked':''?>> Brown<br>

                <input type="radio"  name="biographic_info_eye_color" value="gray" 
                <?php echo (showData('biographic_info_eye_color')=='gray') ? 'checked':''?>> Gray<br>

                <input type="radio"  name="biographic_info_eye_color" value="green" 
                <?php echo (showData('biographic_info_eye_color')=='green') ? 'checked':''?>> Green<br>

                <input type="radio"  name="biographic_info_eye_color" value="hazel"
                <?php echo (showData('biographic_info_eye_color')=='hazel') ? 'checked':''?>> Hazel<br>

                <input type="radio"  name="biographic_info_eye_color" value="maroon" 
                <?php echo (showData('biographic_info_eye_color')=='maroon') ? 'checked':''?>> Maroon<br>

                <input type="radio"  name="biographic_info_eye_color" value="pink" 
                <?php echo (showData('biographic_info_eye_color')=='pink') ? 'checked':''?>> Pink<br>
                
                <input type="radio" name="biographic_info_eye_color" value="unknown" 
                <?php echo (showData('biographic_info_eye_color')=='unknown') ? 'checked':''?>> Unknown/Other<br>
                <br>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 5 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 5 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 3. Biographic Information (continued)</b></h4>
            </div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Hair Color (Select only one box)</label>
				<div class="col-md-12">
					<input type="radio"  name="biographic_info_hair_color" value="bald" 
					<?php echo (showData('biographic_info_hair_color')=='bald') ? 'checked':''?>> Bald (No hair)<br>
					<input type="radio" name="biographic_info_hair_color" value="black" 
					<?php echo (showData('biographic_info_hair_color')=='black') ? 'checked':''?>> Black<br>
					<input type="radio" name="biographic_info_hair_color" value="blond" 
					<?php echo (showData('biographic_info_hair_color')=='blond') ? 'checked':''?>> Blond<br>
					<input type="radio" name="biographic_info_hair_color" value="brown" 
					<?php echo (showData('biographic_info_hair_color')=='brown') ? 'checked':''?>> Brown<br>
					<input type="radio" name="biographic_info_hair_color" value="gray" 
					<?php echo (showData('biographic_info_hair_color')=='gray') ? 'checked':''?>> Gray<br>
					<input type="radio" name="biographic_info_hair_color" value="red" 
					<?php echo (showData('biographic_info_hair_color')=='red') ? 'checked':''?>> Red<br>
					<input type="radio" name="biographic_info_hair_color" value="sandy" 
					<?php echo (showData('biographic_info_hair_color')=='sandy') ? 'checked':''?>> Sandy<br>
					<input type="radio" name="biographic_info_hair_color" value="white" 
					<?php echo (showData('biographic_info_hair_color')=='white') ? 'checked':''?>> White<br>
					<input type="radio" name="biographic_info_hair_color" value="unknown" 
					<?php echo (showData('biographic_info_hair_color')=='unknown') ? 'checked':''?>> Unknown/Other<br>
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Part 4. Information About Beneficiary</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1. Alien Registration Number (A-Number) (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr"> ►A-</span><input type="text" class="form-control"
							maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number')?>" >
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. USCIS Online Account Number (if any) </label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" name="other_information_about_you_uscis_online_account_number"
							maxlength="12" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" >
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. U.S. Social Security Number (if any) </label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" name="other_information_about_you_social_security_number"
							maxlength="9" value="<?php echo showData('other_information_about_you_social_security_number')?>" >
					</div>
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Beneficiary's Full Name</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.a. Family Name(Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control"  maxlength="29" name="information_about_you_family_last_name" value="<?php echo showData('information_about_you_family_last_name')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.b. Given Name(First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_given_first_name" value="<?php echo showData('information_about_you_given_first_name')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4.c. Middle Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_middle_name" value="<?php echo showData('information_about_you_middle_name')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Other Names Used (if any)</b></h4>
			</div>
			<p>Provide all other names the beneficiary has ever used, including aliases, maiden name, and nicknames.</p>
			<div class="form-group">
				<label class="control-label col-md-5">5.a. Family Name(Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_other_family_last_name" value="<?php echo showData('information_about_you_other_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.b. Given Name(First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_other_given_first_name" value="<?php echo showData('information_about_you_other_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5.c. Middle Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="information_about_you_other_middle_name" value="<?php echo showData('information_about_you_other_middle_name')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b> Other Information About Beneficiary</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">6. City/Town/Village of Birth</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="other_information_about_you_city_of_birth" value="<?php echo showData('other_information_about_you_city_of_birth')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">7. Country of Birth</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="other_information_about_you_country_of_birth" value="<?php echo showData('other_information_about_you_country_of_birth')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">8. Date of Birth (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control" name="other_information_about_you_date_of_birth"
						value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">9. Sex</label>
				<div class="col-md-7">
					<input type="radio" name="other_information_about_you_gender" value="male" 
					<?php echo (showData('other_information_about_you_gender')=='male') ? 'checked' : '' ?>> Male &nbsp;
					<input type="radio" name="other_information_about_you_gender" value="female"
					<?php echo (showData('other_information_about_you_gender')=='female') ? 'checked' : '' ?>> Female &nbsp;
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">10. Has anyone else ever filed a petition for the beneficiary?</label>
				<div class="col-md-7 col-md-offset-5">
					<label class="control-label">
						<input type="radio" name="beneficiary_petition_filed_status" value="yes" <?php echo (showData('beneficiary_petition_filed_status')=='yes')?'checked':'';?>> Yes
					</label>
					<label class="control-label">
						<input type="radio" name="beneficiary_petition_filed_status" value="no" <?php echo (showData('beneficiary_petition_filed_status')=='no')?'checked':'';?>> No
					</label>
					<label class="control-label">
						<input type="radio" name="beneficiary_petition_filed_status" value="unknown" <?php echo (showData('beneficiary_petition_filed_status')=='unknown')?'checked':'';?>> Unknown
					</label>
				</div>
			</div>
			<p><b>NOTE:</b> Select "Unknown" only if you do not know, and
				the beneficiary also does not know, if anyone else has
				ever filed a petition for the beneficiary</p>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Beneficiary's Physical Address</b></i></h4>
            </div>
            <p>If the beneficiary lives outside the United States in a home
                without a street number or name, leave Item Numbers 11.a.
                and 11.b. blank.</p>
            <div class="form-group">
                <label class="control-label col-md-6">11.a. Street Number and Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="information_about_you_home_street_number_w1" maxlength="25" value="<?php echo showData('information_about_you_home_street_number_w1')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>11.b. </b> &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w1" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr_w1') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w1" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr_w1') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w1" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr_w1') == 'flr') ? 'checked' : ''; ?>> Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value_w1" maxlength="6"
                        value="<?php echo showData('information_about_you_home_apt_ste_flr_value_w1')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_city_town_w1" maxlength="20" value="<?php echo showData('information_about_you_home_city_town_w1')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_home_state_w1">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_home_state_w1')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_zip_code_w1" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code_w1')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_province_w1" maxlength="20" value="<?php echo showData('information_about_you_home_province_w1')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_postal_code_w1" maxlength="9" value="<?php echo showData('information_about_you_home_postal_code_w1')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">11.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_country_w1" maxlength="39" value="<?php echo showData('information_about_you_home_country_w1')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Other Address and Contact Information</b></i></h4>
            </div>
            <p>Provide the address in the United States where the beneficiary
                intends to live, if different from Item Numbers 11.a. - 11.h. If
                the address is the same, type or print "SAME" in Item Number
                12.a</p>
            <div class="form-group">
                <label class="control-label col-md-5">12.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_street_number_w2" maxlength="25" value="<?php echo showData('information_about_you_home_street_number_w2')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>12.b. </b> &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w2" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr_w2') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w2" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr_w2') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w2" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr_w2') == 'flr') ? 'checked' : ''; ?>> Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value_w2" maxlength="6"
                        value="<?php echo showData('information_about_you_home_apt_ste_flr_value_w2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_city_town_w2" maxlength="20" value="<?php echo showData('information_about_you_home_city_town_w2')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="information_about_you_home_state_w2">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('information_about_you_home_state_w2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">12.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_zip_code_w2" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code_w2')?>">
                </div>
            </div>
            <p>Provide the beneficiary's address outside the United States, if
                different from Item Numbers 11.a. - 11.h. If the address is the
                same, type or print "SAME" in Item Number 13.a</p>
            <div class="form-group">
                <label class="control-label col-md-5">13.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_street_number_w3" maxlength="25" value="<?php echo showData('information_about_you_home_street_number_w3')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>13.b. </b> &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w3" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr_w3') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w3" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr_w3') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                    <input type="radio" name="information_about_you_home_apt_ste_flr_w3" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr_w3') == 'flr') ? 'checked' : ''; ?>> Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value_w3" maxlength="6" value="<?php echo showData('information_about_you_home_apt_ste_flr_value_w3')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_city_town_w3" maxlength="20" value="<?php echo showData('information_about_you_home_city_town_w3')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.d. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_province_w3" maxlength="20" value="<?php echo showData('information_about_you_home_province_w3')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.e. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_postal_code_w3" maxlength="9" value="<?php echo showData('information_about_you_home_postal_code_w3')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">13.f. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_home_country_w3" maxlength="39" value="<?php echo showData('information_about_you_home_country_w3')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">14. Daytime Telephone Number (if any)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="information_about_you_daytime_tel" maxlength="39" value="<?php echo showData('information_about_you_daytime_tel')?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 6 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 6 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Beneficiary (continued)</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">15. Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="information_about_you_mobile" maxlength="39" value="<?php echo showData('information_about_you_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">16. Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="information_about_you_email" maxlength="39" value="<?php echo showData('information_about_you_email')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Beneficiary's Marital Information</i></b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">17. How many times has the beneficiary been married?</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="other_information_about_you_total_married" maxlength="" value="<?php echo showData('other_information_about_you_total_married')?>">
                </div>
            </div>
                <div class="form-group">
                <label class="control-label col-md-12">18. Current Marital Status</label>
                <div class="col-md-12">
                    <label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status')=='single')?'checked':'';?>> Single, Never Married &nbsp;
					</label>
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="married" 
                        <?php echo (showData('other_information_about_you_marital_status')=='married')?'checked':'';?>> Married &nbsp;
					</label>
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="divorced" 
                        <?php echo (showData('other_information_about_you_marital_status')=='divorced')?'checked':'';?>> Divorced &nbsp;
					</label>
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="widowed" 
                        <?php echo (showData('other_information_about_you_marital_status')=='widowed')?'checked':'';?>> Widowed &nbsp;
					</label>
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="separated" 
                        <?php echo (showData('other_information_about_you_marital_status')=='separated')?'checked':'';?>> Separated &nbsp;
					</label>
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="annulled"
                        <?php echo (showData('other_information_about_you_marital_status')=='annulled')?'checked':'';?>> Annulled
					</label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">19. Date of Current Marriage (if currently married) (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="current_spouse_date_of_marriage" value="<?php echo showData('current_spouse_date_of_marriage')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b><i>Place of Beneficiary's Current Marriage (if married)</i></b></h4>
            </div>
			<div class="form-group">
				<label class="control-label col-md-5">20.a. City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="current_spouse_marriage_place_city_town" maxlength="20"
						value="<?php echo showData('current_spouse_marriage_place_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">20.b. State</label>
				<div class="col-md-7">
					<select class="form-control" name="current_spouse_marriage_place_state">
						<option style="" value=''>Select</option>
						<?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('current_spouse_marriage_place_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">20.c. Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="current_spouse_marriage_place_province" maxlength="5" value="<?php echo showData('current_spouse_marriage_place_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">20.d. Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="current_spouse_marriage_place_country" maxlength="20"
						value="<?php echo showData('current_spouse_marriage_place_country')?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Names of Beneficiary's Spouses (if any)</b></h4>
			</div>
			<p>Provide information on the beneficiary's current spouse (if currently married) first and then list all the beneficiary's prior spouses (if any).<br><br><b>Spouse 1</b></p>
			<div class="form-group">
				<label class="control-label col-md-6">21.a. Family Name(Last Name)</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="prior_spouse1_family_last_name" value="<?php echo showData('prior_spouse1_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">21.b. Given Name(First Name)</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="prior_spouse1_given_first_name" value="<?php echo showData('prior_spouse1_given_first_name')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">21.c. Middle Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="prior_spouse1_middle_name" value="<?php echo showData('prior_spouse1_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">22. Date Marriage Ended (mm/dd/yyyy)</label>
				<div class="col-md-6">
					<input type="date" class="form-control" name="prior_spouse1_marriage_end_date" value="<?php echo showData('prior_spouse1_marriage_end_date')?>" />
				</div>
			</div>
			<hr>
			<p><b>Spouse 2</b></p>			
			<div class="form-group">
				<label class="control-label col-md-6">23.a. Family Name(Last Name)</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="prior_spouse2_family_last_name" value="<?php echo showData('prior_spouse2_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">23.b. Given Name(First Name)</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="prior_spouse2_given_first_name" value="<?php echo showData('prior_spouse2_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">23.c. Middle Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="prior_spouse2_middle_name" value="<?php echo showData('prior_spouse2_middle_name')?>" />
				</div>
			</div>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-6">24. Date Marriage Ended (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="prior_spouse2_marriage_end_date" value="<?php echo showData('prior_spouse2_marriage_end_date')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Information About Beneficiary's Family</b></i></h4>
            </div>
            <p>Provide information about the beneficiary's spouse and children.</p>
            <p><b>Person 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">25.a. Family Name (Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children1_family_last_name" maxlength="25" value="<?php echo showData('spouse_children1_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">25.b. Given Name (First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children1_given_first_name" maxlength="20" value="<?php echo showData('spouse_children1_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">25.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children1_middle_name" maxlength="5" value="<?php echo showData('spouse_children1_middle_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">26. Relationship</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children1_relationship" maxlength="20" value="<?php echo showData('spouse_children1_relationship')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">27. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="spouse_children1_date_of_birth" maxlength="9" value="<?php echo showData('spouse_children1_date_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">28. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children1_country_of_birth" maxlength="39" value="<?php echo showData('spouse_children1_country_of_birth')?>">
                </div>
            </div>
            <hr>
            <p><b>Person 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">29.a. Family Name (Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children2_family_last_name" maxlength="" value="<?php echo showData('spouse_children2_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">29.b. Given Name (First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children2_given_first_name" maxlength="" value="<?php echo showData('spouse_children2_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">29.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children2_middle_name" maxlength="" value="<?php echo showData('spouse_children2_middle_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">30. Relationship</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children2_relationship" maxlength="" value="<?php echo showData('spouse_children2_relationship')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">31. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="spouse_children2_date_of_birth" maxlength="9" value="<?php echo showData('spouse_children2_date_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">32. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children2_country_of_birth" maxlength="39" value="<?php echo showData('spouse_children2_country_of_birth')?>">
                </div>
            </div>
            <hr>
            <p><b>Person 3</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">33.a. Family Name (Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children3_family_last_name" maxlength="" value="<?php echo showData('spouse_children3_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">33.b. Given Name (First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children3_given_first_name" maxlength="" value="<?php echo showData('spouse_children3_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">33.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children3_middle_name" maxlength="" value="<?php echo showData('spouse_children3_middle_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">34. Relationship</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children3_relationship" maxlength="" value="<?php echo showData('spouse_children3_relationship')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">35. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="spouse_children3_date_of_birth" maxlength="9" value="<?php echo showData('spouse_children3_date_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">36. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children3_country_of_birth" maxlength="39" value="<?php echo showData('spouse_children3_country_of_birth')?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 7 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 7 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Beneficiary (continued)</b></h4>
            </div>
            <p><b>Person 4</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">37.a. Family Name (Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children4_family_last_name" maxlength="25" value="<?php echo showData('spouse_children4_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">37.b. Given Name (First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children4_given_first_name" maxlength="20" value="<?php echo showData('spouse_children4_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">37.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children4_middle_name" maxlength="5" value="<?php echo showData('spouse_children4_middle_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">38. Relationship</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children4_relationship" maxlength="20" value="<?php echo showData('spouse_children4_relationship')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">39. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="spouse_children4_date_of_birth" maxlength="9" value="<?php echo showData('spouse_children4_date_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">40. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children4_country_of_birth" maxlength="39" value="<?php echo showData('spouse_children4_country_of_birth')?>">
                </div>
            </div>
            <hr>
            <p><b>Person 5</b></p>
            <div class="form-group">
                <label class="control-label col-md-6">41.a. Family Name (Last Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children5_family_last_name" maxlength="25" value="<?php echo showData('spouse_children5_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">41.b. Given Name (First Name)</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children5_given_first_name" maxlength="20" value="<?php echo showData('spouse_children5_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">41.c. Middle Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children5_middle_name" maxlength="5" value="<?php echo showData('spouse_children5_middle_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">42. Relationship</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children5_relationship" maxlength="20" value="<?php echo showData('spouse_children5_relationship')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">43. Date of Birth (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="spouse_children5_date_of_birth" maxlength="9" value="<?php echo showData('spouse_children5_date_of_birth')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">44. Country of Birth</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="spouse_children5_country_of_birth" maxlength="39" value="<?php echo showData('spouse_children5_country_of_birth')?>">
                </div>
            </div>
            <hr>
            <div class="bg-info">
                <h4><b>Beneficiary's Entry Information</b></h4>
            </div>
            <div class="form-group">
                <label>45. Was the beneficiary EVER in the United States?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("ever_in_united_states_status")?>
                </div>
            </div>
            <p>If the beneficiary is currently in the United States, complete Items Numbers 46.a. - 46.d.</p>
            <div class="form-group">
                <label class="control-label col-md-12">46.a. He or she arrived as a (Class of Admission):</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="united_states_class_of_addmission" maxlength="39" value="<?php echo showData('united_states_class_of_addmission')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">46.b. Form I-94 Arrival-Departure Record Number</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span
                            style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                            role="presentation" dir="ltr">►</span><input type="text" class="form-control" name="i_94_imgt_arrival_record_number"
                            maxlength="12" value="<?php echo showData('i_94_imgt_arrival_record_number')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">46.c. Date of Arrival (mm/dd/yyyy)</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="i_94_imgt_date_of_last_arival" value="<?php echo showData('i_94_imgt_date_of_last_arival')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">46.d. Date authorized stay expired, or will expire, as shown on
                    Form I-94 or Form I-95 (mm/dd/yyyy) or type or print "D/S" for Duration of Status</label>
                <div class="col-md-6 col-md-offset-6">
                    <input type="date" class="form-control" name="i_94_95_imgt_expiry_date_of_authorized" maxlength="39" value="<?php echo showData('i_94_95_imgt_expiry_date_of_authorized')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">47. Passport Number</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="other_information_about_you_passport_number" maxlength="39" value="<?php echo showData('other_information_about_you_passport_number')?>">
                </div>
            </div>
        </div>
        <!-- left end -->
        <div class='col-md-6'>
            <div class="form-group">
                <label class="control-label col-md-12">48. Travel Document Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="other_information_about_you_travel_document_number" maxlength="39" value="<?php echo showData('other_information_about_you_travel_document_number')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">49. Country of Issuance for Passport or Travel Document</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_94_imgt_country_issuance_passport" maxlength="39" value="<?php echo showData('i_94_imgt_country_issuance_passport')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">50. Expiration Date for Passport or Travel Document (mm/dd/yyyy)</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="other_information_about_you_expiry_date_issuance_passport" maxlength="39" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Beneficiary's Employment Information</b></h4>
            </div>
            <p>Provide the beneficiary's current employment information (if applicable), even if they are employed outside of the United
                States. If the beneficiary is currently unemployed, type or print "Unemployed" in Item Number 51.a.</p>
            <div class="form-group">
                <label class="control-label col-md-12">51.a. Name of Current Employer (if applicable)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="employer_outside_us_name" maxlength="39" value="<?php echo showData('employer_outside_us_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.b. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_street_number" maxlength="25" value="<?php echo showData('employer_outside_us_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>51.c. </b> &nbsp;
                    <input type="radio" name="employer_outside_us_apt_ste_flr" value="apt" <?php echo (showData('employer_outside_us_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                    <input type="radio" name="employer_outside_us_apt_ste_flr" value="ste" <?php echo (showData('employer_outside_us_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                    <input type="radio" name="employer_outside_us_apt_ste_flr" value="flr" <?php echo (showData('employer_outside_us_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="employer_outside_us_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('employer_outside_us_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.d. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_city_town" maxlength="20" value="<?php echo showData('employer_outside_us_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.e. State</label>
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
                <label class="control-label col-md-5">51.f. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_zip_code" maxlength="5" value="<?php echo showData('employer_outside_us_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.g. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_province" maxlength="20" value="<?php echo showData('employer_outside_us_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.h. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_postal_code" maxlength="9" value="<?php echo showData('employer_outside_us_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">51.i. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="employer_outside_us_country" maxlength="39" value="<?php echo showData('employer_outside_us_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">52. Date Employment Began (mm/dd/yyyy)</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="employer_outside_us_from_date" maxlength="39" value="<?php echo showData('employer_outside_us_from_date')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Additional Information About Beneficiary</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">53. Was the beneficiary EVER in immigration proceedings?</label>
                <div class="col-md-7 col-md-offset-5">
                    <?php echo createRadio("additional_info_immigration_proceedings_status")?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
					<p><b>54. If you answered "Yes," select the type of proceedings and provide the location and date of the proceedings.</b></p>
					<p><?php echo createCheckbox("additional_info_immigration_removal_status")?>Removal</p>
					<p><?php echo createCheckbox("additional_info_immigration_exclusion_status")?>Exclusion/Deportation</p>
					<p><?php echo createCheckbox("additional_info_immigration_rescission_status")?>Rescission</p>
					<p><?php echo createCheckbox("additional_info_immigration_other_status")?>Other Judicial Proceedings</p>
				</div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">55.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_additional_info_city_town" maxlength="39" value="<?php echo showData('beneficiary_additional_info_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">55.b. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="beneficiary_additional_info_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('beneficiary_additional_info_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">56. Date (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="beneficiary_additional_info_date" maxlength="9" value="<?php echo showData('beneficiary_additional_info_date')?>">
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 8 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
		<p style="text-align: right"><b>Page 8 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 4. Information About Beneficiary (continued)</b></h4>
            </div>
            <p>If the beneficiary's native written language does not use
                Roman letters, type or print his or her name and foreign
                address in their native written language</p>
            <div class="form-group">
                <label class="control-label col-md-5">57.a. Family Name (Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_family_last_name" maxlength="25" value="<?php echo showData('beneficiary_native_family_last_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">57.b. Given Name (First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_given_first_name" maxlength="25" value="<?php echo showData('beneficiary_native_given_first_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">57.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_middle_name" maxlength="25" value="<?php echo showData('beneficiary_native_middle_name')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_address_street_number" maxlength="25" value="<?php echo showData('beneficiary_native_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>58.b. </b> &nbsp;
                    <input type="radio" name="beneficiary_native_address_apt_ste_flr" value="apt" <?php echo (showData('beneficiary_native_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="beneficiary_native_address_apt_ste_flr" value="ste" <?php echo (showData('beneficiary_native_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="beneficiary_native_address_apt_ste_flr" value="flr" <?php echo (showData('beneficiary_native_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="beneficiary_native_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('beneficiary_native_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_address_city_town" maxlength="20" value="<?php echo showData('beneficiary_native_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.d. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_address_province" maxlength="20" value="<?php echo showData('beneficiary_native_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.e. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_address_postal_code" maxlength="9" value="<?php echo showData('beneficiary_native_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">58.f. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_native_address_country" maxlength="39" value="<?php echo showData('beneficiary_native_address_country')?>">
                </div>
            </div>
            <p>If filing for your spouse, provide the last address at which
                you physically lived together. If you never lived together,
                type or print, "Never lived together" in Item Number 59.a.</p>
            <div class="form-group">
                <label class="control-label col-md-5">59.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_lived_together_address_street_number" maxlength="25" value="<?php echo showData('beneficiary_lived_together_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>59.b. </b> &nbsp;
                    <input type="radio" name="beneficiary_lived_together_address_apt_ste_flr" value="apt" <?php echo (showData('beneficiary_lived_together_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="beneficiary_lived_together_address_apt_ste_flr" value="ste" <?php echo (showData('beneficiary_lived_together_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="beneficiary_lived_together_address_apt_ste_flr" value="flr" <?php echo (showData('beneficiary_lived_together_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="beneficiary_lived_together_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('beneficiary_lived_together_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_lived_together_address_city_town" maxlength="20" value="<?php echo showData('beneficiary_lived_together_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="beneficiary_lived_together_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('beneficiary_lived_together_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_lived_together_address_zip_code" maxlength="5" value="<?php echo showData('beneficiary_lived_together_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_lived_together_address_province" maxlength="20" value="<?php echo showData('beneficiary_lived_together_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_lived_together_address_postal_code" maxlength="9" value="<?php echo showData('beneficiary_lived_together_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">59.h. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_lived_together_address_country" maxlength="39" value="<?php echo showData('beneficiary_lived_together_address_country')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">60.a. Date From (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="beneficiary_lived_together_from_date" maxlength="9" value="<?php echo showData('beneficiary_lived_together_from_date')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">60.b. Date To (mm/dd/yyyy)</label>
                <div class="col-md-7">
                    <input type="date" class="form-control" name="beneficiary_lived_together_to_date" maxlength="9" value="<?php echo showData('beneficiary_lived_together_to_date')?>">
                </div>
            </div>
            <p>The beneficiary is in the United States and will apply for
                adjustment of status to that of a lawful permanent resident
                at the U.S. Citizenship and Immigration Services (USCIS)
                office in:</p>
            <div class="form-group">
                <label class="control-label col-md-5">61.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_apply_adjustment_city_town" maxlength="20" value="<?php echo showData('beneficiary_apply_adjustment_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">61.b. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="beneficiary_apply_adjustment_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('beneficiary_apply_adjustment_state')) $selected = "selected"; else $selected = "";
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
                    <input type="text" class="form-control" name="beneficiary_not_apply_adjustment_city_town" maxlength="20" value="<?php echo showData('beneficiary_not_apply_adjustment_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">62.b. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_not_apply_adjustment_province" maxlength="9" value="<?php echo showData('beneficiary_not_apply_adjustment_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">62.c. Country</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_not_apply_adjustment_country" maxlength="39" value="<?php echo showData('beneficiary_not_apply_adjustment_country')?>">
                </div>
            </div>
            <p><b>NOTE:</b> Choosing a U.S. Embassy or U.S. Consulate outside
                the country of the beneficiary's last residence does not
                guarantee that it will accept the beneficiary's case for
                processing. In these situations, the designated U.S. Embassy or
                U.S. Consulate has discretion over whether or not to accept the
                beneficiary's case.</p>
            <div class="bg-info">
                <h4><b>Part 5. Other Information</b></h4>
            </div>
            <div class="form-group">
                <label>1. Have you EVER previously filed a petition for this beneficiary or any other alien?</label>
                <div class=" col-md-offset-8">
                    <?php echo createRadio("other_info_previously_filed_status")?>
                </div>
            </div>
            <p>If you answered "Yes," provide the name, place, date of filing, and the result.</p>
            <div class="form-group">
                <label class="control-label col-md-5">2.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_alien_family_last_name" value="<?php echo showData('beneficiary_alien_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_alien_given_first_name" value="<?php echo showData('beneficiary_alien_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_alien_middle_name" value="<?php echo showData('beneficiary_alien_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_alien_address_city_town" value="<?php echo showData('beneficiary_alien_address_city_town')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.b. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="beneficiary_alien_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('beneficiary_alien_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Date Filed (mm/dd/yyyy)</label>
                <div class="col-md-8 col-md-offset-4">
                    <input type="date" class="form-control" name="beneficiary_alien_filed_date" maxlength="39" value="<?php echo showData('beneficiary_alien_filed_date')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Result (for example, approved, denied, withdrawn)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="beneficiary_alien_filed_result" maxlength="39" value="<?php echo showData('beneficiary_alien_filed_result')?>">
                </div>
            </div>
            <p>If you are also submitting separate petitions for other relatives,
                provide the names of and your relationship to each relative.</p>

            <p><b>Relative 1</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">6.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative1_family_last_name" value="<?php echo showData('beneficiary_relative1_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative1_given_first_name" value="<?php echo showData('beneficiary_relative1_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">6.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative1_middle_name" value="<?php echo showData('beneficiary_relative1_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">7. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative1_relationship" value="<?php echo showData('beneficiary_relative1_relationship')?>"/>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 9 -------------------------
--------------------------------------------------------->

<fieldset class="setpage">
    <div class="page_number">
        <p style="text-align: right"><b>Page 9 of 12</b></p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 5. Other Information (continued)</b></h4>
            </div>
            <p><b>Relative 2</b></p>
            <div class="form-group">
                <label class="control-label col-md-5">8.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative2_family_last_name" value="<?php echo showData('beneficiary_relative2_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative2_given_first_name" value="<?php echo showData('beneficiary_relative2_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">8.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative2_middle_name" value="<?php echo showData('beneficiary_relative2_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">9. Relationship</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="beneficiary_relative2_relationship" value="<?php echo showData('beneficiary_relative2_relationship')?>"/>
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
                <h4><b>Part 6. Petitioner's Statement, Contact Information, Declaration, and Signature</b></h4>
            </div>
            <p><b>NOTE:</b> Read the Penalties section of the Form I-130
                Instructions before completing this part</p>
            <div class="bg-info">
                <h4><i><b>Petitioner's Statement</b></i></h4>
            </div>
            <p><b>NOTE:</b> Select the box for either Item Number 1.a. or 1.b. If
                applicable, select the box for Item Number 2.</p>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>1.a.</b>
                <?php echo createCheckbox("i_130_petitioner_statement_1a_status")?>
                <p>I can read and understand English, and I have read
                    and understand every question and instruction on this
                    application and my answer to every question.
                </p>
            </div>
            <span>
                <div class="d-flexible" style="">
                    <b>1.b.</b>
                    <?php echo createCheckbox("i_130_petitioner_statement_1b_status")?>
                    <p>The interpreter named in Part 7. read to me every
                        question and instruction on this application and my
                        answer to every question in
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="" class="form-control" name="i_130_petitioner_statement_1b_text_value" value="<?php echo showData('i_130_petitioner_statement_1b_text_value')?>" />
                </div>
                <p style="padding-left:40px;">a language in which I am fluent. I understood all of
                    this information as interpreted.</p>
            </span>
            <span>
                <div class="d-flexible" style="">
                    <b>2.</b>
                    <?php echo createCheckbox("i_130_petitioner_statement_2_status")?>
                    <p>At my request, the preparer named in Part 8.,
                    </p>
                </div>
                <div class="col-md-12" style="padding-left:40px;">
                    <input type="text" maxlength="" class="form-control" name="i_130_petitioner_statement_2_text_value" value="<?php echo showData('i_130_petitioner_statement_2_text_value')?>" />
                </div>
                <p style="padding-left:40px;">prepared this petition for me based only upon
                    information I provided or authorized.</p>
            </span>
        </div>
        <!-- left side end -->
        <div class="col-md-6">
            <div class="bg-info">
                <h4><i><b>Petitioner's Contact Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3. Petitioner's Daytime Telephone Number </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="petitioner_daytime_tel" maxlength="15" value="<?php echo showData('petitioner_daytime_tel')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Petitioner's Mobile Telephone Number (if any)
                </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="petitioner_mobile" maxlength="15" value="<?php echo showData('petitioner_mobile')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Petitioner's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="petitioner_email" maxlength="39" value="<?php echo showData('petitioner_email')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b> Petitioner's Declaration and Certification </b></i>
                </h4>
            </div>
			<p>Copies of any documents I have submitted are exact
				photocopies of unaltered, original documents, and I understand
				that USCIS may require that I submit original documents to
				USCIS at a later date. Furthermore, I authorize the release of
				any information from any of my records that USCIS may need
				to determine my eligibility for the immigration benefit I seek.</p><br>
			<p>I further authorize release of information contained in this
				petition, in supporting documents, and in my USCIS records to
				other entities and persons where necessary for the administration
				and enforcement of U.S. immigration laws.</p><br>
			<p>I understand that USCIS may require me to appear for an
				appointment to take my biometrics (fingerprints, photograph,
				and/or signature) and, at that time, if I am required to provide
				biometrics, I will be required to sign an oath reaffirming that:</p><br>
			<p>
				1) I provided or authorized all of the information
				contained in, and submitted with, my petition; <br> <br>
				2) I reviewed and understood all of the information in,
				and submitted with, my petition; and<br><br>
				3) All of this information was complete, true, and correct
				at the time of filing</p><br><br>
			<p>I certify, under penalty of perjury, that all of the information in
				my petition and any document submitted with it were provided
				or authorized by me, that I reviewed and understand all of the
				information contained in, and submitted with, my petition, and
				that all of this information is complete, true, and correct.</p>
            <div class="bg-info">
                <h4><b>Petitioner's Signature</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.a. Petitioner's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_130_petitioner_sign_date"
                        value="<?php echo showData('i_130_petitioner_sign_date')?>" />
                </div>
            </div>
            <p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely
                fill out this petition or fail to submit required documents listed
                in the Instructions, USCIS may deny your petition.
            </p>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 10 ------------------------
--------------------------------------------------------->

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align: right"><b>Page 10 of 12</b></p>
	</div>
    <div class="row">
        <div class="col-md-6">
            <div class="bg-info">
                <h4><b>Part 7. Interpreter's Contact Information, Certification, and Signature</b></h4>
            </div>
            <h5><b>Provide the following information about the interpreter if you
                    used one</b></h5>
            <div class="bg-info">
                <h4><b>Interpreter's Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_interpreter_family_last_name" maxlength="39" value="<?php echo showData('i_130_interpreter_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_interpreter_given_first_name" maxlength="39" value="<?php echo showData('i_130_interpreter_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if
                    any) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_interpreter_business_name" maxlength="34" value="<?php echo showData('i_130_interpreter_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Mailing Address</b> </i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_interpreter_address_street_number" maxlength="25" value="<?php echo showData('i_130_interpreter_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_130_interpreter_address_apt_ste_flr" value="apt" <?php echo (showData('i_130_interpreter_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_130_interpreter_address_apt_ste_flr" value="ste" <?php echo (showData('i_130_interpreter_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_130_interpreter_address_apt_ste_flr" value="flr" <?php echo (showData('i_130_interpreter_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_130_interpreter_address_apt_ste_flr_value" maxlength="6"
                    value="<?php echo showData('i_130_interpreter_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_interpreter_address_city_town" maxlength="20" value="<?php echo showData('i_130_interpreter_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_130_interpreter_address_state">
                        <option style="" value=''>Select</option>
                        <?php
						foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_130_interpreter_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_interpreter_address_zip_code" maxlength="5" value="<?php echo showData('i_130_interpreter_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_interpreter_address_province" maxlength="20" value="<?php echo showData('i_130_interpreter_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_interpreter_address_postal_code" maxlength="9" value="<?php echo showData('i_130_interpreter_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_interpreter_address_country" maxlength="39" value="<?php echo showData('i_130_interpreter_address_country')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><i><b>Interpreter's Contact Information</b></i></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_interpreter_daytime_tel" maxlength="15" value="<?php echo showData('i_130_interpreter_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_interpreter_mobile" maxlength="15" value="<?php echo showData('i_130_interpreter_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_130_interpreter_email" value="<?php echo showData('i_130_interpreter_email')?>">
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
                    <input type="text" class="form-control" name="i_130_interpreter_certification_text" maxlength="20" value="<?php echo showData('i_130_interpreter_certification_text')?>">
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
                <h4><b>Interpreter's Signature</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.a. Interpreter's Signature (sign in ink)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_130_interpreter_sign_date"
                        value="<?php echo showData('i_130_interpreter_sign_date')?>" />
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
                <h4><b>Preparer's Full Name</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_preparer_family_last_name" maxlength="39" value="<?php echo showData('i_130_preparer_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_preparer_given_first_name" maxlength="39" value="<?php echo showData('i_130_preparer_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_preparer_business_name" maxlength="34" value="<?php echo showData('i_130_preparer_business_name')?>" />
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Mailing Address</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.a. Street Number and Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_preparer_address_street_number" maxlength="25" value="<?php echo showData('i_130_preparer_address_street_number')?>">
                </div>
            </div>
            <div class="form-group">
                <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                    <input type="radio" name="i_130_preparer_address_apt_ste_flr" value="apt" <?php echo (showData('i_130_preparer_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                    Apt. &nbsp;
                    <input type="radio" name="i_130_preparer_address_apt_ste_flr" value="ste" <?php echo (showData('i_130_preparer_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                    Ste. &nbsp;
                    <input type="radio" name="i_130_preparer_address_apt_ste_flr" value="flr" <?php echo (showData('i_130_preparer_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                    Flr.:
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" type="text" class="form-control" name="i_130_preparer_address_apt_ste_flr_value" maxlength="6"
                        value="<?php echo showData('i_130_preparer_address_apt_ste_flr_value')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.c. City or Town</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_preparer_address_city_town" maxlength="20" value="<?php echo showData('i_130_preparer_address_city_town')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.d. State</label>
                <div class="col-md-7">
                    <select class="form-control" name="i_130_preparer_address_state">
                        <option style="" value=''>Select</option>
                        <?php
                        foreach ($allDataCountry as $record) {
							if($record->state_code==showData('i_130_preparer_address_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.e. ZIP Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_preparer_address_zip_code" maxlength="5" value="<?php echo showData('i_130_preparer_address_zip_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.f. Province</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_preparer_address_province" maxlength="20" value="<?php echo showData('i_130_preparer_address_province')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">3.g. Postal Code</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_preparer_address_postal_code" maxlength="9" value="<?php echo showData('i_130_preparer_address_postal_code')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">3.h. Country</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_preparer_address_country" maxlength="39" value="<?php echo showData('i_130_preparer_address_country')?>">
                </div>
            </div>

        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 11 ------------------------
--------------------------------------------------------->

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align: right"><b>Page 11 of 12</b></p>
	</div>
    <div class="row">
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
                    <input type="text" class="form-control" name="i_130_preparer_daytime_tel" maxlength="" value="<?php echo showData('i_130_preparer_daytime_tel')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="i_130_preparer_mobile" maxlength="15" value="<?php echo showData('i_130_preparer_mobile')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                <div class="col-md-12">
                    <input type="email" class="form-control" maxlength="39" name="i_130_preparer_email" value="<?php echo showData('i_130_preparer_email')?>">
                </div>
            </div>
            <div class="bg-info">
                <h4><b>Preparer's Statement</b></h4>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>7.a.</b>
                <?php echo createCheckbox("i_130_preparer_statement_7a_status")?>
                <p>I am not an attorney or accredited representative but
                    have prepared this application on behalf of the
                    applicant and with the applicant's consent.</p>
            </div>
            <div class="d-flexible" style="padding-bottom:10px;">
                <b>7.a.</b>
                <?php echo createCheckbox("i_130_preparer_statement_7b_status")?>
                <p>I am an attorney or accredited representative and my <br>
                    representation of the applicant in this case <br>
                    <?php echo createCheckbox("i_130_preparer_statement_7b1_status")?> extends <?php echo createCheckbox("i_130_preparer_statement_7b2_status")?>does not extend beyond the
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
                <h4><b>Preparer's Signature</b></h4>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.a. Preparer's Signature (sign in ink) </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" disabled/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                <div class="col-md-7 col-md-offset-5">
                    <input type="date" class="form-control" name="i_130_preparer_sign_date" value="<?php echo showData('i_130_preparer_sign_date')?>">
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-5 col-md-offset-1"></div>
        <!-- no data needed -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!-------------------------------------------------------
------------------------ page 12 ------------------------
--------------------------------------------------------->

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align: right"><b>Page 12 of 12</b></p>
	</div>
    <div class="row">
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
                date each sheet</p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_additional_info_last_name" value="<?php echo showData('i_130_additional_info_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name) </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_additional_info_first_name" value="<?php echo showData('i_130_additional_info_first_name')?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name </label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="i_130_additional_info_middle_name" value="<?php echo showData('i_130_additional_info_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-12">2. A-Number (if any)</label>
                <div class="col-md-8 col-md-offset-4">
                    <div class="d-flexible">
                        <span></span><b>A-</b><input type="text" class="form-control"
                            name="i_130_additional_info_a_number" value="<?php echo showData('i_130_additional_info_a_number')?>">
                    </div>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">3.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_3a_page_no" maxlength="2" value="<?php echo showData('i_130_additional_info_3a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_3b_part_no" maxlength="6" value="<?php echo showData('i_130_additional_info_3b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">3.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_3c_item_no" maxlength="6" value="<?php echo showData('i_130_additional_info_3c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>3.d.</b></span>
                    <textarea name="i_130_additional_info_3d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_130_additional_info_3d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">4.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_4a_page_no" maxlength="2" value="<?php echo showData('i_130_additional_info_4a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_4b_part_no" maxlength="6" value="<?php echo showData('i_130_additional_info_4b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">4.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_4c_item_no" maxlength="6" value="<?php echo showData('i_130_additional_info_4c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>4.d.</b></span>
                    <textarea name="i_130_additional_info_4d" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('i_130_additional_info_4d')?></textarea>
                </div>
            </div>
        </div>
        <!-- left side column end -->
        <div class="col-md-6">
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">5.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_5a_page_no" maxlength="2" value="<?php echo showData('i_130_additional_info_5a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_5b_part_no" maxlength="6" value="<?php echo showData('i_130_additional_info_5b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">5.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_5c_item_no" maxlength="6" value="<?php echo showData('i_130_additional_info_5c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>5.d.</b></span>
                    <textarea name="i_130_additional_info_5d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_130_additional_info_5d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">6.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_6a_page_no" maxlength="2" value="<?php echo showData('i_130_additional_info_6a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_6b_part_no" maxlength="6" value="<?php echo showData('i_130_additional_info_6b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">6.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_6c_item_no" maxlength="6" value="<?php echo showData('i_130_additional_info_6c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>6.d.</b></span>
                    <textarea name="i_130_additional_info_6d" class="form-control" maxlength="321" cols="30"
                        rows="10"><?php echo showData('i_130_additional_info_6d')?></textarea>
                </div>
            </div>
            <div class="d-flexible">
                <div class="form-group">
                    <label class="control-label col-md-12">7.a. Page Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_7a_page_no" maxlength="2" value="<?php echo showData('i_130_additional_info_7a_page_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.b. Part Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_7b_part_no" maxlength="6" value="<?php echo showData('i_130_additional_info_7b_part_no')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">7.c. Item Number</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="i_130_additional_info_7c_item_no" maxlength="6" value="<?php echo showData('i_130_additional_info_7c_item_no')?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <span><b>7.d.</b></span>
                    <textarea class="form-control" name="i_130_additional_info_7d" maxlength="357" class="form-control" cols="30"
                        rows="10"><?php echo showData('i_130_additional_info_7d')?></textarea>
                </div>
            </div>
        </div>
        <!-- right side column end -->
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<?php include "intake_footer.php"?>