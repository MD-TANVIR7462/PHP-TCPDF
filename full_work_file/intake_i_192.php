<?php
$meta_title 	= "INTAKE FORM I-192";
$page_heading 	= "Intake Form I-192, Application for Employment Authorization";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
----------------------------- Start page 1 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="page_number">
		<p style="text-align:right;margin-right:20px;"><b>Page 1 of 9</b></p>
	</div>
	<div class="form-group">
		<div class="bg-info text-center">
			<h4><b>To be completed by an attorney or accredited representative (if any).</b></h4>
		</div>
		<div class="border-add">
			<div class="row">
				<div class="col-md-2">
					<div class="d-flexible">
						<input type="hidden" name="i_192_select_g28" id="i_192_select_g28" value="<?php echo (showData('i_192_select_g28') == 'Y') ? 'Y' : 'N'; ?>" />
						<input type="checkbox" onChange="checkboxValue(this,'i_192_select_g28')"  <?php echo (showData('i_192_select_g28') == 'Y') ? 'checked' : ''; ?>>
						<p><b>Select this box if Form G-28 or Form G-28I is attached.</b></p>
					</div>
				</div>
				<div class="col-md-3">
					<label class="control-label" for="attorney">Volag Number (if any):</label>
					<br><br>
					<input type="text" class="form-control" value="<?php echo $attorneyData->volag_number ?>" disabled/>
				</div>
				<div class="col-md-3">
					<label class="control-label">Attorney State Bar Number (if applicable):</label>
					<br>
					<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled/>
				</div>
				<div class="col-md-4">
					<label class="control-label col-md-10">Attorney or According Representative USCIS Online
						Account Number (if any):</label>
					<br><br>
					<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled/>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="bg-info">
				<h4><b>Part 1. Application Type</b></h4>
			</div>
			<p>I am applying to the Secretary of Homeland Security for permission to enter the United States temporarily under the provisions of the Immigration and Nationality Act (INA) section 212(d)(3)(A)(ii), 212(d)(13), or 212(d)(14).</p>
			<br>
			<p>1. I am seeking this permission so that I may obtain (select <b>only one</b> box):</p>
			<div class="d-flexible">
				<?php echo createCheckbox("i_192_part1_1_checkbox")?>
				<p>Status as a victim of trafficking (T nonimmigrant status) or<br>
				a victim of qualifying criminal activity (U nonimmigrant status).</p>
			</div>
			<div class="d-flexible">
				<?php echo createCheckbox("i_192_part1_2_checkbox")?>
				<p>Admission as a nonimmigrant (other than as a T or U nonimmigrant).</p>
			</div>
		</div>
	</div>
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 1 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 2 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 2 of 9</b></p>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information About You</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>1. Your Full Legal Name (Do not provide a nickname)</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Family Name (Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_family_last_name" maxlength="29"
						value="<?php echo showData('information_about_you_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name(First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_given_first_name" maxlength="29"
						value="<?php echo showData('information_about_you_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name (if applicable)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_middle_name" maxlength="29"
						value="<?php echo showData('information_about_you_middle_name')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Other Names Used (if any)</b></h4>
			</div>
			<p>Provide all other names you have ever used, including aliases, maiden name, and nicknames. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></p>
			<div class="form-group">
				<label class="control-label col-md-5">Family Name (Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_other_family_last_name" maxlength="29"
						value="<?php echo showData('information_about_you_other_family_last_name')?>" />
					<input type="text" class="form-control" name="information_about_you_other_family_last_name2" maxlength="29"
						value="<?php echo showData('information_about_you_other_family_last_name2')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name (First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_other_given_first_name" maxlength="29"
						value="<?php echo showData('information_about_you_other_given_first_name')?>" />
					<input type="text" class="form-control" name="information_about_you_other_given_first_name2" maxlength="29"
						value="<?php echo showData('information_about_you_other_given_first_name2')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name (if applicable)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_other_middle_name" maxlength="29"
						value="<?php echo showData('information_about_you_other_middle_name')?>" />
					<input type="text" class="form-control" name="information_about_you_other_middle_name2" maxlength="29"
						value="<?php echo showData('information_about_you_other_middle_name2')?>" />
				</div>
			</div>
			<br>
			<div class="bg-info">
				<h4><b>Other Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. Alien Registration Number (A-Number) (if any) :</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
							class="form-control"
							name="other_information_about_you_alien_registration_number" maxlength="9"
							value="<?php echo showData('other_information_about_you_alien_registration_number')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. USCIS Online Account Number (if any) :</label>
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
			<div class="form-group">
				<label class="control-label col-md-12">5. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="other_information_about_you_date_of_birth"
						value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
				</div>
			</div>
		</div><!-- left side column end -->
		<div class="col-md-6">
			<p>6. Place of Birth</p>
			<div class="form-group">
				<label class="control-label col-md-12">City or Town</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="other_information_about_you_city_of_birth" maxlength="20"
						value="<?php echo showData('other_information_about_you_city_of_birth')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">State or Province</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="other_information_about_you_province_of_birth" maxlength="20"
						value="<?php echo showData('other_information_about_you_province_of_birth')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Country</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="39"
						value="<?php echo showData('other_information_about_you_country_of_birth')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7. Country of Citizenship or Nationality</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="other_information_about_you_country_of_citizen" maxlength="39"
						value="<?php echo showData('other_information_about_you_country_of_citizen')?>">
				</div>
			</div>			
			<div class="form-group">
				<label class="control-label col-md-4">8. Gender</label>
				<div class="col-md-6">
					<label class="control-label">
						<input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender')=='male')? 'checked':''?>>
						Male
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender')=='female')? 'checked':''?>> Female
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_gender" value="another" <?php echo (showData('other_information_about_you_gender')=='another')? 'checked':''?>> Another Gender Identity
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">
					<p>9. Mailing Address (Safe address, if applicable)</p>
					<p>Please provide an address where you can safely receive correspondence from USCIS.</p>
					<br>
					<p>In Care Of Name (if any)</p></label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="information_about_you_mailing_care_of_name" maxlength="36"
						value="<?= showData('information_about_you_mailing_care_of_name')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_mailing_street_number" maxlength="29"
						value="<?= showData('information_about_you_mailing_street_number') ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6">
					<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
					<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="information_about_you_mailing_apt_ste_flr_value" maxlength="6"
						value="<?= showData('information_about_you_mailing_apt_ste_flr_value')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_mailing_city_town" maxlength="20"
						value="<?= showData('information_about_you_mailing_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="information_about_you_mailing_state" class="form-control">						
						<option value="" style="display:none">Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_mailing_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_mailing_zip_code" maxlength="5"
						value="<?= showData('information_about_you_mailing_zip_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_province" maxlength="20"
						value="<?= showData('information_about_you_mailing_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_postal_code" maxlength="9"
						value="<?= showData('information_about_you_mailing_postal_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_mailing_country" maxlength="39"
						value="<?= showData('information_about_you_mailing_country')?>">
				</div>
			</div>
		</div><!-- right side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 2 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 3 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<b><p style="text-align:right;margin-right:20px;">Page 3 of 9</p></b>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information About You (continued)</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Address History</b></h4>
			</div>
			<p>Provide physical addresses for everywhere you have lived during the last five years, whether inside or outside the United States. Provide your current address first. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></p>
			<br>
			<p>10. Physical Address 1 (current address)</p>
			<div class="form-group">
				<label class="control-label col-md-5">Street Number and Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_street_number" maxlength="29"
						value="<?= showData('information_about_you_home_street_number')?>">
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6">
					<input type="radio" name="information_about_you_home_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="information_about_you_home_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 
					<input type="radio" name="information_about_you_home_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control"
						name="information_about_you_home_apt_ste_flr_value" maxlength="6"
						value="<?= showData('information_about_you_home_apt_ste_flr_value')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_city_town" maxlength="20"
						value="<?= showData('information_about_you_home_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="information_about_you_home_state" class="form-control">
						<option value="" style="dispaly:none">Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_home_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_zip_code" maxlength="5"
						value="<?= showData('information_about_you_home_zip_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_province" maxlength="20"
						value="<?= showData('information_about_you_home_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_postal_code" maxlength="9"
						value="<?= showData('information_about_you_home_postal_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_country" maxlength="39"
						value="<?= showData('information_about_you_home_country')?>">
				</div>
			</div>
			<p>Dates of Residence</p>
			<div class="form-group">
				<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="information_about_you_residence_from_date"
						value="<?= showData('information_about_you_residence_from_date')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_residence_to_date"
						value="<?= showData('information_about_you_residence_to_date')?>" />
				</div>
			</div>
		</div><!-- left side column end -->
		<div class="col-md-6">
			<hr>
			<p>11. Physical Address 2</p>
			<div class="form-group">
				<label class="control-label col-md-5">Street Number and Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_home_street_number2" maxlength="29"
						value="<?= showData('information_about_you_home_street_number2')?>">
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6">
					<input type="radio" name="information_about_you_home_apt_ste_flr2" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr2') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="information_about_you_home_apt_ste_flr2" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr2') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 
					<input type="radio" name="information_about_you_home_apt_ste_flr2" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr2') == 'flr') ? 'checked' : ''; ?>> Flr.:
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control"
						name="information_about_you_home_apt_ste_flr_value2" maxlength="6"
						value="<?= showData('information_about_you_home_apt_ste_flr_value2')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_home_city_town2" maxlength="20"
						value="<?= showData('information_about_you_home_city_town2')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="information_about_you_home_state2" class="form-control">
						<option value="" style="dispaly:none">Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_home_state2')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_home_zip_code2" maxlength="5"
						value="<?= showData('information_about_you_home_zip_code2')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_home_province2" maxlength="20"
						value="<?= showData('information_about_you_home_province2')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_home_postal_code2" maxlength="9"
						value="<?= showData('information_about_you_home_postal_code2')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_home_country2" maxlength="39"
						value="<?= showData('information_about_you_home_country2')?>">
				</div>
			</div>
			<p>Dates of Residence</p>
			<div class="form-group">
				<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="information_about_you_residence_from_date2"
						value="<?= showData('information_about_you_residence_from_date2')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="information_about_you_residence_to_date2"
						value="<?= showData('information_about_you_residence_to_date2')?>" />
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Information About Your Marital History</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">12. What is your current marital status? </label>
				<div class="col-md-10 col-md-offset-2">
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="single"
							<?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>> Single, Never Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="married"
							<?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : ''; ?>> Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="divorced"
							<?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : ''; ?>> Divorced
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="widowed"
							<?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : ''; ?>> Widowed
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="legally separated"
							<?php echo (showData('other_information_about_you_marital_status') == 'legally_separated') ? 'checked' : ''; ?>> Legally Separated
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status"
							value="marriage annulled"
							<?php echo (showData('other_information_about_you_marital_status') == 'marriage_annulled') ? 'checked' : ''; ?>> Marriage Annulled
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="other_information_about_you_marital_status" value="other"
							<?php echo (showData('other_information_about_you_marital_status') == 'other') ? 'checked' : ''; ?>> Other
					</label>
					<input type="text" class="form-control"
						name="other_information_about_you_marital_status_other_value" maxlength="43"
						value="<?= showData('other_information_about_you_marital_status_other_value')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">13. How many times have you been married (including annulled marriages and marriages to the same person)?</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control"
							name="other_information_about_you_total_married"
							value="<?= showData('other_information_about_you_total_married')?>">
					</div>
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Information About Your Current Marriage <br> </b>(including if you are legally separated)</h4>
			</div>
			<p>If you are currently married, provide the following information about your <b>current spouse</b>.</p>
			<p>14. Current Spouse's Legal Name</p>
			<div class="form-group">
				<label class="control-label col-md-5">Family Name (Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="current_spouse_family_last_name"
						value="<?php echo showData('current_spouse_family_last_name')?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name (First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="current_spouse_given_first_name"
						value="<?php echo showData('current_spouse_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name (if applicable)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="current_spouse_family_middle_name"
						value="<?php echo showData('current_spouse_family_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">15. A-Number (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
							class="form-control" name="current_spouse_a_number"
							value="<?= showData('current_spouse_a_number')?>">
					</div>
				</div>
			</div>
		</div><!-- right side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 3 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 4 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 4 of 9</b></p>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information About You (continued)</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">16. Date of Birth (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="current_spouse_date_of_birth" value="<?php echo showData('current_spouse_date_of_birth')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">17. Date of Marriage (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="current_spouse_date_of_marriage" value="<?php echo showData('current_spouse_date_of_marriage')?>" />
				</div>
			</div>
			<p>18. Place of Birth</p>
			<div class="form-group">
				<label class="control-label col-md-12">City or Town</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="current_spouse_birth_place_city_town" maxlength="29"
						value="<?= showData('current_spouse_birth_place_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">State or Province</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="current_spouse_birth_place_province" maxlength="39"
						value="<?= showData('current_spouse_birth_place_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Country</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="current_spouse_birth_place_country" maxlength="39" value="<?= showData('current_spouse_birth_place_country')?>">
				</div>
			</div>
			<p>19. Place of Marriage</p>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="current_spouse_marriage_place_city_town"
						value="<?= showData('current_spouse_marriage_place_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State or Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="current_spouse_marriage_place_province"
						value="<?= showData('current_spouse_marriage_place_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="current_spouse_marriage_place_country"
						value="<?= showData('current_spouse_marriage_place_country')?>">
				</div>
			</div>
		</div><!-- left side column end -->

		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Information About Prior Marriages</b> (if any)</h4>
			</div>
			<p>If you have been married before, anywhere in the world, provide the information requested in <b>Item Numbers 20. - 25.</b> about your prior marriage. If you have had more than one previous marriage, use the space provided in <b>Part 6. Additional Information</b> to provide the answers to <b>Item Numbers 20. - 25.</b> for each additional marriage.</p>
			<br>
			<p>20. Prior Spouse's Legal Name (provide family name before marriage)</p>
			<div class="form-group">
				<label class="control-label col-md-5">Family Name (Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="prior_spouse1_family_last_name" value="<?php echo showData('prior_spouse1_family_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name (First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="prior_spouse1_given_first_name" value="<?php echo showData('prior_spouse1_given_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name (if applicable)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="prior_spouse1_middle_name" value="<?php echo showData('prior_spouse1_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">21. Date of Birth (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control" name="prior_spouse1_date_of_birth" value="<?= showData('prior_spouse1_date_of_birth')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">22. Date of Marriage (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control" name="prior_spouse1_date_of_marriage" value="<?= showData('prior_spouse1_date_of_marriage')?>">
				</div>
			</div>
			<p>23. Place of Marriage</p>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20"
						name="prior_spouse1_marriage_place_city_town"
						value="<?= showData('prior_spouse1_marriage_place_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State or Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="prior_spouse1_marriage_place_province" maxlength="39"
						value="<?= showData('prior_spouse1_marriage_place_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="prior_spouse1_marriage_place_country" maxlength="39"
						value="<?= showData('prior_spouse1_marriage_place_country')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">24. Date Marriage Legally Ended (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control"
						name="prior_spouse1_marriage_end_date"
						value="<?= showData('prior_spouse1_marriage_end_date')?>">
				</div>
			</div>
			<p>25. Place Where Marriage Legally Ended</p>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="prior_spouse1_marriage_end_city_town" maxlength="20"
						value="<?= showData('prior_spouse1_marriage_end_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State or Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="prior_spouse1_marriage_end_province" maxlength="39"
						value="<?= showData('prior_spouse1_marriage_end_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="prior_spouse1_marriage_end_country" maxlength="39"
						value="<?= showData('prior_spouse1_marriage_end_country')?>">
				</div>
			</div>			
			<div class="bg-info">
				<h4><b>Immigration and Criminal History</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">26. Explain the grounds of inadmissibility that may apply in your case.</label>
				<div class="col-md-12">
					<textarea name="information_about_you_explain_grounds_of_inadmissibility" class="form-control" cols="30" rows="5" maxlength="213"></textarea>
				</div>
			</div>
		</div><!-- right side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 4 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 5 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 5 of 9</b></p>
		</div>
		<div class="col-md-12">
			<div class="bg-info">
				<h4><b>Part 2. Information About You</b> (continued)</h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">27. Have you previously filed an application for advance permission to enter the United States as a nonimmigrant?</label>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("pre_advance_permission_enter_united_states_nonimmigrant_status")?>
				</div>
			</div>
			<p>If you answered "Yes" to <b>Item Number 27.</b>, provide the details in <b>Item Numbers 28. - 29.</b>
			   If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></p>
			<div class="form-group">
				<label class="control-label col-md-12">28. Date Application Filed (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control"
						name="immigration_and_criminal_history_date_application_filed"
						value="<?= showData('immigration_and_criminal_history_date_application_filed')?>">
				</div>
			</div>
			<p>29. Location where you filed your application (for example, USCIS Office or Port of Entry).</p>
			<div class="form-group">
				<label class="control-label col-md-5">USCIS Office or U.S. Port-of-Entry</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="location_where_you_filed_your_application_uscis_office" maxlength="39"
						value="<?= showData('location_where_you_filed_your_application_uscis_office')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="location_where_you_filed_your_application_city_town" maxlength="39"
						value="<?= showData('location_where_you_filed_your_application_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State or Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="location_where_you_filed_your_application_state" maxlength="39"
						value="<?= showData('location_where_you_filed_your_application_state')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="location_where_you_filed_your_application_country" maxlength="39"
						value="<?= showData('location_where_you_filed_your_application_country')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Receipt Number (if available)</label>
				<div class="col-md-7">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control"
							name="location_where_you_filed_your_application_receipt_no"
							value="<?= showData('location_where_you_filed_your_application_receipt_no')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">30. Have you <b>EVER</b> been in the United States for a period of six months or more?</label>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("stay_in_united_states_six_month_or_more_status")?>
				</div>
			</div>
			<p>If you answered "Yes" to <b>Item Number 30.</b>, provide the dates you were in the United States (from and to) and your immigration status at the time of entry into the United States in the space provided in <b>Part 6. Additional Information.</b></p>
			<div class="form-group">
				<label class="control-label col-md-12">31. Have you EVER filed an application or petition for immigration benefits with the U.S. Government, or has one ever been filed on your behalf?</label>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("application_for_immigration_benefits_us_govt_status")?>
				</div>
			</div>
			<p>If you answered "Yes" to <b>Item Number 31.</b>, provide the information requested in <b>Item Numbers 32. - 34.</b></p>
			<br>
			<p>If you have (or somebody else on your behalf has) filed multiple applications or petitions for immigration benefits with the U.S. Government, use the space provided in <b>Part 6. Additional Information</b> to provide the answers to <b>Item Numbers 32. - 34.</b> for each of your additional applications or petitions.</p>
			<br>
			<div class="form-group">
				<label class="control-label col-md-12">32. Type of Application or Petition Filed</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="immigration_and_criminal_history_type_of_application"
						value="<?= showData('immigration_and_criminal_history_type_of_application')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">33. Location the application or petition was filed (for example, USCIS office or Port of Entry)</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="immigration_and_criminal_history_location_the_application"
						value="<?= showData('immigration_and_criminal_history_location_the_application')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">34. Outcome of the Application or Petition (for example, approved, denied, or is pending).</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="immigration_and_criminal_history_outcome_of_the_application"
						value="<?= showData('immigration_and_criminal_history_outcome_of_the_application')?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12"><b>35.</b> Have you <b>EVER</b> been denied or refused an immigration benefit by the U.S. Government, or had a benefit revoked or terminated (including but not limited to visas)?</div>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("immigration_and_criminal_history_refused_immigration_benefit_status")?>
				</div>
			</div>
			<p>If you answered "Yes" to <b>Item Number 35.</b>, provide an explanation the information in the space provided in <b>Part 6. Additional Information.</b></p>
			<div class="form-group">
				<div class="col-md-12"><b>36.</b> Have you <b>EVER</b>, in or outside the United States,
					been arrested, cited, charged, indicted, fined, convicted, or imprisoned for breaking or violating any law or ordinance, excluding minor traffic violations?
				</div>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("convicted_imprisoned_breaking_violating_any_law_status")?>
				</div>
			</div>
			<p>If you answered "Yes" to <b>Item Number 36</b>., describe the incidents in detail and include all offenses where impaired driving may have been an issue in the space provided in <b>Part 6. Additional Information.</b></p>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 5 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 6 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 6 of 9</b></p>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information About You (continued)</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Travel Information</b></h4>
			</div>
			<p><b>NOTE:</b> If you are applying for T or U nonimmigrant status and are in the United States, you may skip <b>Item Numbers 37. - 43.</b></p>
			<p>Location at Which you Plan to Enter the United States (desired Port of Entry)</p>
			<div class="form-group">
				<label class="control-label col-md-5">37. City</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="information_about_you_travel_info_city" maxlength="34"
						value="<?= showData('information_about_you_travel_info_city')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">38. State</label>
				<div class="col-md-7">
					<select name="information_about_you_travel_info_state" class="form-control">
						<option value="" style="dispaly:none">Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('information_about_you_travel_info_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">39. Name of Port of Entry</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="information_about_you_travel_info_port_of_entry" maxlength="39"
						value="<?= showData('information_about_you_travel_info_port_of_entry')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">40. How do you plan to travel to the United States? (For example, by plane, ship, car)</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="information_about_you_travel_info_plan_to_travel" maxlength="39"
						value="<?= showData('information_about_you_travel_info_plan_to_travel')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">41. When do you plan to enter the United States? (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control"
						name="information_about_you_travel_info_plan_to_enter"
						value="<?= showData('information_about_you_travel_info_plan_to_enter')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">42. Approximate Length of Stay in the United States</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="information_about_you_travel_info_approximate_length_of_stay" maxlength="25"
						value="<?= showData('information_about_you_travel_info_approximate_length_of_stay')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">43. What is the purpose of your stay in the United States? Explain fully below.</label>
				<div class="col-md-12">
					<textarea name="information_about_you_travel_info_explain_fully_purpose_of_stay" class="form-control" cols="30" rows="10" maxlength="213"><?= showData('information_about_you_travel_info_explain_fully_purpose_of_stay')?></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-6">			
			<div class="bg-info">
				<h4><b>Employment History</b></h4>
			</div>
			<p>Provide your employment history for the last five years, whether inside or outside the United States. Provide the most recent employment first. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></p>
			<br>
			<p>44. Employer 1 (current or most recent)</p>
			<div class="form-group">
				<label class="control-label col-md-12">Name of Employer or Company</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="employer1_name" maxlength="39" value="<?= showData('employer1_name')?>">
				</div>
			</div>
			<p>Address of Employer or Company</p>
			<div class="form-group">
				<label class="control-label col-md-5">Street Number and Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="employer1_address" maxlength="29" value="<?= showData('employer1_address')?>">
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6">
					<input type="radio" name="employer1_apt_ste_flr" value="apt" <?php echo (showData('employer1_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="employer1_apt_ste_flr" value="ste" <?php echo (showData('employer1_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 
					<input type="radio" name="employer1_apt_ste_flr" value="flr" <?php echo (showData('employer1_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:					
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" name="employer1_apt_ste_flr_value" maxlength="6" value="<?= showData('employer1_apt_ste_flr_value')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="employer1_city_town" value="<?= showData('employer1_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="employer1_state" class="form-control">
						<option value="0">Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('employer1_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="5" name="employer1_zip_code" value="<?= showData('employer1_zip_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="employer1_province" value="<?= showData('employer1_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="9" name="employer1_postal_code" value="<?= showData('employer1_postal_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="employer1_country" value="<?= showData('employer1_country')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Your Occupation</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="employer1_occupation" value="<?= showData('employer1_occupation')?>">
				</div>
			</div>
			<p>Dates of Employment</p>
			<div class="form-group">
				<label class="control-label col-md-12">From (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="employer1_from_date" value="<?= showData('employer1_from_date')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">To (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="employer1_to_date" value="<?= showData('employer1_to_date')?>">
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 6 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 7 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 7 of 9</b></p>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 2. Information About You</b> (continued)</h4>
			</div>
			<p>45. Employer 2</p>
			<div class="form-group">
				<label class="control-label col-md-12">Name of Employer or Company</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="39" name="employer2_name" value="<?= showData('employer2_name')?>">
				</div>
			</div>
			<p>Address of Employer or Company</p>
			<div class="form-group">
				<label class="control-label col-md-5">Street Number and Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="29" name="employer2_address" value="<?= showData('employer2_address')?>">
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-6">
					<input type="radio" name="employer2_apt_ste_flr" value="apt" <?php echo (showData('employer2_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="employer2_apt_ste_flr" value="ste" <?php echo (showData('employer2_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp; 
					<input type="radio" name="employer2_apt_ste_flr" value="flr" <?php echo (showData('employer2_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" maxlength="6" name="employer2_apt_ste_flr_value" value="<?= showData('employer2_apt_ste_flr_value')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="employer2_city_town" value="<?= showData('employer2_city_town')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="employer2_state" class="form-control">
						<option value="0" style="dispaly:none">Select</option>
						<?php
						foreach($allDataCountry as $record){
							if($record->state_code==showData('employer2_state')) $selected = "selected"; else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="5" name="employer2_zip_code" value="<?= showData('employer2_zip_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20" name="employer2_province" value="<?= showData('employer2_province')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="9" name="employer2_postal_code" value="<?= showData('employer2_postal_code')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Country</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="employer2_country" value="<?= showData('employer2_country')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Your Occupation</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="39" name="employer2_occupation" value="<?= showData('employer2_occupation')?>">
				</div>
			</div>
			<p>Dates of Employment</p>
			<div class="form-group">
				<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control" name="employer2_from_date" value="<?= showData('employer2_from_date')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
				<div class="col-md-7">
					<input type="date" class="form-control" name="employer2_to_date" value="<?= showData('employer2_to_date')?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">		
			<div class="bg-info">
				<h4><b>Part 3. Applicant's Statement, Contact Information, Certification, and Signature</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Applicant's Contact Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1. Applicant's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="15" name="i_192_applicant_daytime_tel" value="<?= showData('i_192_applicant_daytime_tel')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Applicant's Mobile Telephone Number (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control"  maxlength="15"  name="i_192_applicant_mobile" value="<?= showData('i_192_applicant_mobile')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. Applicant's Email Address (if any)</label>
				<div class="col-md-12">
					<input type="email" class="form-control"  maxlength="39"  name="i_192_applicant_email" value="<?= showData('i_192_applicant_email')?>">
				</div>
			</div>			
			<div class="bg-info">
				<h4><b>Applicant's Certification and Signature</b></h4>
			</div>
			<p>I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in Part 4., understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the information is complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the administration and enforcement of U.S. immigration law.</p>
			<div class="form-group">
				<label class="control-label col-md-12">4. Applicant's Signature</label>
				<div class="col-md-12">
					<input type="text" class="form-control" disabled />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="i_192_applicant_sign_date" value="<?= showData('i_192_applicant_sign_date')?>">
				</div>
			</div>
		</div><!-- right side column end -->		
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 7 end -->

<!----------------------------------------------------------------------
----------------------------- Start page 8 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 8 of 9</b></p>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 4. Interpreter's Contact Information, Certification, and Signature</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Interpreter's Full Name</b></h4>
			</div>			
			<div class="form-group">
				<label class="control-label col-md-5">1. Interpreter's Family Name (Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_interpreter_family_last_name"  maxlength="31" 
						value="<?= showData('i_192_interpreter_family_last_name')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Interpreter's Given Name (First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_interpreter_family_given_first_name" maxlength="31" 
						value="<?= showData('i_192_interpreter_family_given_first_name')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">2. Interpreter's Business or Organization Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" 
						name="i_192_interpreter_business_name" maxlength="31" 
						value="<?= showData('i_192_interpreter_business_name')?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Interpreter's Contact Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3. Interpreter's Daytime Telephone Number</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_interpreter_daytime_tel" maxlength="15"  value="<?= showData('i_192_interpreter_daytime_tel')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">4. Interpreter's Mobile Telephone Number (if any)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_interpreter_mobile" maxlength="15"  value="<?= showData('i_192_interpreter_mobile')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">5. Interpreter's Email Address (if any)</label>
				<div class="col-md-7">
					<input type="email" class="form-control" name="i_192_interpreter_email" maxlength="39"  value="<?= showData('i_192_interpreter_email')?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Interpreter's Certification</b></h4>
			</div>
			<p>I certify, under penalty of perjury, that I am fluent in English and</p>
			<div class="form-group">
				<p class="control-label col-md-5"></p>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_192_interpreter_certification_language_skill"
						value="<?= showData('i_192_interpreter_certification_language_skill')?>">
				</div>
			</div>
			<p>and I have interpreted every question on the application and instructions and interpreted the applicant's answers to the questions in that language, and the applicant informed me that they understood every instruction, question, and answer on the application.</p>
			<div class="form-group">
				<label class="control-label col-md-12">6. Interpreter's Signature</label>
				<div class="col-md-12">
					<input type="text" class="form-control" disabled />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="i_192_interpreter_sign_date" value="<?= showData('i_192_interpreter_sign_date')?>">
				</div>
			</div>
		</div><!-- left side column end -->
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 5. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Full Name</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">1. Preparer's Family Name (Last Name)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_192_preparer_family_last_name" maxlength="42" 
						value="<?= showData('i_192_preparer_family_last_name')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Preparer's Given Name (First Name)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_192_preparer_family_given_first_name" maxlength="42" 
						value="<?= showData('i_192_preparer_family_given_first_name')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Preparer's Business or Organization Name</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_192_preparer_business_name" maxlength="42"  value="<?= showData('i_192_preparer_business_name')?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Contact Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. Preparer's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="15"  name="i_192_preparer_daytime_tel" value="<?= showData('i_192_preparer_daytime_tel')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Preparer's Mobile Telephone Number (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="15"  name="i_192_preparer_mobile" value="<?= showData('i_192_preparer_mobile')?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Preparer's Email Address (if any)</label>
				<div class="col-md-12">
					<input type="email" class="form-control" maxlength="39"  name="i_192_preparer_email" value="<?= showData('i_192_preparer_email')?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Certification</b></h4>
			</div>
			<p>I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that all of the responses and information contained in and submitted with the application is complete, true, and correct and reflects only information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand the responses and information in or submitted with the application.</p>
			<div class="form-group">
				<label class="control-label col-md-12">6. Preparer's Signature</label>
				<div class="col-md-12">
					<input type="text" class="form-control" disabled />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control" name="i_192_preparer_sign_date" value="<?= showData('i_192_preparer_sign_date')?>">
				</div>
			</div>
		</div><!-- right side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 8 end  -->

<!----------------------------------------------------------------------
----------------------------- Start page 9 -----------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<div class="row">
		<div class="page_number">
			<p style="text-align:right;margin-right:20px;"><b>Page 9 of 9</b></p>
		</div>
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 6. Additional Information</b></h4>
			</div>
			<p>If you need extra space to provide any additional information within this application, use the space below. If you you need more space than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper. Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item Number</b> to which your answer refers; and sign and date each sheet.</p>
			<div class="form-group">
				<label class="control-label col-md-5">1. Family Name(Last Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_additional_info_last_name"
						value="<?= showData('i_192_additional_info_last_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name(First Name)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_additional_info_first_name"
						value="<?= showData('i_192_additional_info_first_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name (if applicable)</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_192_additional_info_middle_name"
						value="<?= showData('i_192_additional_info_middle_name')?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. A-Number (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
							class="form-control" name="i_192_additional_info_a_number"
							value="<?= showData('i_192_additional_info_a_number')?>">
					</div>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">3. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_3a_page_no" maxlength="2" 
							value="<?= showData('i_192_additional_info_3a_page_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_3b_part_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_3b_part_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_3c_item_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_3c_item_no')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_192_additional_info_3d" maxlength="321"  class="form-control" cols="30" rows="10"><?= showData('i_192_additional_info_3d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">4. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_4a_page_no" maxlength="2" 
							value="<?= showData('i_192_additional_info_4a_page_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_4b_part_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_4b_part_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_4c_item_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_4c_item_no')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_192_additional_info_4d" class="form-control" maxlength="357"  cols="30" rows="10"><?= showData('i_192_additional_info_4d')?></textarea>
				</div>
			</div>
		</div><!-- left side column end -->
		<div class="col-md-6">
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">5. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_5a_page_no" maxlength="2" 
							value="<?= showData('i_192_additional_info_5a_page_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_5b_part_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_5b_part_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_5c_item_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_5c_item_no')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_192_additional_info_5d" class="form-control" maxlength="321"  cols="30" rows="10"><?= showData('i_192_additional_info_5d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">6. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_6a_page_no" maxlength="2" 
							value="<?= showData('i_192_additional_info_6a_page_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_6b_part_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_6b_part_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_6c_item_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_6c_item_no')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_192_additional_info_6d" maxlength="321"  class="form-control" cols="30" rows="10"><?= showData('i_192_additional_info_6d')?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">7. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_7a_page_no" maxlength="2" 
							value="<?= showData('i_192_additional_info_7a_page_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_7b_part_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_7b_part_no')?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control"
							name="i_192_additional_info_7c_item_no" maxlength="6" 
							value="<?= showData('i_192_additional_info_7c_item_no')?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="i_192_additional_info_7d" class="form-control" maxlength="357"  cols="30" rows="10"><?= showData('i_192_additional_info_7d')?></textarea>
				</div>
			</div>
		</div><!-- right side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- fieldset 9 end  -->

<?php include "intake_footer.php"?>