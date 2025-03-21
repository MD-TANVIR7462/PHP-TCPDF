<?php
$meta_title 	= "INTAKE FORM I-912";
$page_heading 	= "Intake Form I-912, Request for Fee Waiver";
include "intake_header.php";
?>

<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 1 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-6">
			<div>
				<h4><b><span style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span>&nbsp; START HERE - Type or print in black ink.</b></h4>
			</div>
			<div class="bg-info">
				<h4><b>Part 1. Basis for Your Request (Each basis is further explained in the Specific Instructions section of the Form I-912 Instructions)</b> </h4>
			</div>
			<p>1.</p>
			<div class="d-flexible">
				A.<?php echo createCheckbox("i_912_part_1_basis_for_your_request_1") ?>
				<p>I am, my spouse is, or the head of household living in my household is currently receiving a means-tested benefit. (Complete <b>Parts 2. - 4</b>. and <b>Parts 7. - 9</b>.)</p>
			</div>
			<div class="d-flexible">
				B. <?php echo createCheckbox("i_912_part_1_basis_for_your_request_2") ?>
				<p>My household income is at or below 150 percent of the Federal Poverty Guidelines. (Complete <b>Parts 2. - 3., Part 5</b>., and <b>7. - 10</b>.)</p>
			</div>
			<div class="d-flexible">
				C. <?php echo createCheckbox("i_912_part_1_basis_for_your_request_3") ?>
				<p>I have a financial hardship. (Complete <b>Parts 2. -3</b>. and <b>Parts 6. - 10</b>.)</p>
			</div>
			<div class="d-flexible">
				2. <p>What is your current immigrant or nonimmigrant status?</p><br>
				<input type="text" class="form-control" maxlength="36"
					name="current_immigrant_nonimmigrant_status"
					value="<?php echo showData('current_immigrant_nonimmigrant_status') ?>" />
			</div>
			<div class="bg-info">
				<h4><b>Part 2. Information About You (Requestor)</b></h4>
			</div>
			<p>Provide information about yourself if you are the person requesting a fee waiver for a petition or application that you are filing for
				yourself. If you are the parent or legal guardian filing on behalf of a child or person with a developmental or mental impairment,
				provide information about the child or person for whom you are filing this form.</p>

			<div class="d-flexible">
				1. <?php echo createCheckbox("i_912_part_2_legal_guardian_status") ?>
				<p>Check here if you are a parent or legal guardian filing on behalf of the person seeking the fee waiver</p>
			</div>

			<div><b>2. Full Name</b></div>
			<div class="form-group">
				<label class="control-label col-md-5">Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="36"
						name="information_about_you_family_last_name"
						value="<?php echo showData('information_about_you_family_last_name') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="27"
						name="information_about_you_given_first_name"
						value="<?php echo showData('information_about_you_given_first_name') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="22"
						name="information_about_you_middle_name"
						value="<?php echo showData('information_about_you_middle_name') ?>" />
				</div>
			</div>
		</div><!-- end of left side column -->
		<div class="col-md-6">
			<div><b>3. Other Names Used (if any)</b></div>
			<p>List all other names you have used, including nicknames, aliases, and maiden name.</p>
			<div class="form-group">
				<label class="control-label col-md-5">Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="36"
						name="information_about_you_other_family_last_name"
						value="<?php echo showData('information_about_you_other_family_last_name') ?>" />
					<input type="text" class="form-control" maxlength="36"
						name="information_about_you_other_family_last_name2"
						value="<?php echo showData('information_about_you_other_family_last_name2') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_other_given_first_name" maxlength="27"
						value="<?php echo showData('information_about_you_other_given_first_name') ?>" />
					<input type="text" class="form-control"
						name="information_about_you_other_given_first_name2" maxlength="27"
						value="<?php echo showData('information_about_you_other_given_first_name2') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="information_about_you_other_middle_name" maxlength="22"
						value="<?php echo showData('information_about_you_other_middle_name') ?>" />
					<input type="text" class="form-control"
						name="information_about_you_other_middle_name2" maxlength="22"
						value="<?php echo showData('information_about_you_other_middle_name2') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Alien Registration Number (A-Number) (if any)
				</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">► </span><b>A-</b><input type="text"
							class="form-control" maxlength="9"
							name="other_information_about_you_alien_registration_number"
							value="<?= showData('other_information_about_you_alien_registration_number') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. USCIS Online Account Number (if any)</label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">► </span><input type="text" class="form-control"
							name="other_information_about_you_uscis_online_account_number" maxlength="12"
							value="<?= showData('other_information_about_you_uscis_online_account_number') ?>">
					</div>
				</div>
			</div>
		</div><!-- end of right side column -->
	</div>
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 1 -->

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 2 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="bg-info">
				<h4><b>Part 2. Information About You (Requestor) (continued)</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Date of Birth (mm/dd/yyyy):</label>
				<div class="col-md-7 col-md-offset-5">
					<input type="date" class="form-control"
						name="other_information_about_you_date_of_birth"
						value="<?php echo showData('other_information_about_you_date_of_birth') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7. U.S. Social Security Number (if any) </label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">► </span><input type="text" class="form-control" maxlength="9"
							name="other_information_about_you_social_security_number"
							value="<?= showData('other_information_about_you_social_security_number') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">8. Marital Status</label>
				<div class="col-md-10 col-md-offset-2">
					<label class="control-label">
						<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'single') ? 'checked' : '' ?> value="single"> Single, Never Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'married') ? 'checked' : '' ?> value="married"> Married
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'divorced') ? 'checked' : '' ?> value="divorced"> Divorced
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'widowed') ? 'checked' : '' ?> value="widowed"> Widowed
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'separated') ? 'checked' : '' ?> value="separated"> Separated
					</label>
					&nbsp;
					<label class="control-label">
						<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'marriage annulled') ? 'checked' : '' ?> value="marriage annulled"> Marriage Annulled
					</label>
					<div class="d-flexible">
						<label class="control-label">
							<input type="radio" name="i_912_info_about_you_requestor_marital_status" <?php echo (showData('i_912_info_about_you_requestor_marital_status') == 'other') ? 'checked' : '' ?> value="other"> Other (Explain)
						</label>
						<div>
							<input type="text" class="form-control" name="i_912_info_about_you_requestor_other_expl" value="<?= showData('i_912_info_about_you_requestor_other_expl') ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Part 3. Applications and Petitions for Which You Are Requesting a Fee Waiver</b></h4>
			</div>
			<div><b>1.</b>&nbsp;&nbsp;In the table below, add the form numbers of the applications and petitions for which you are requesting a fee waiver</div>
			<table>
				<tr class="bg-info">
					<th colspan="5" style="padding:5px;">Applications or Petitions for You and Your Family Members</th>
				</tr>
				<tr>
					<th>Full Name</th>
					<th>A-Number (if any) </th>
					<th>Date of Birth</th>
					<th>Relationship to You</th>
					<th>Forms Being Filed</th>
				</tr>
				<tr>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_full_name[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '0') ?>">
					</td>
					<td>
						<div class="d-flexible">
							A- <input type="text" class="form-control" maxlength="9"
								name="applications_or_petitions_requesting_fee_waiver_family_memb_a_num[]"
								value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '0') ?>">
						</div>
					</td>
					<td><input type="date" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth[]"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '0') ?>">
					</td>
					<td>self</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed[]" maxlength="14"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '0') ?>">
					</td>
				</tr>
				<tr>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_full_name[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '1') ?>">
					</td>
					<td>
						<div class="d-flexible">
							A- <input type="text" class="form-control"
								name="applications_or_petitions_requesting_fee_waiver_family_memb_a_num[]" maxlength="9"
								value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '1') ?>">
						</div>
					</td>
					<td><input type="date" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth[]"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '1') ?>">
					</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_relate[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_relate', '0') ?>">
					</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed[]" maxlength="14"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '1') ?>">
					</td>
				</tr>
				<tr>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_full_name[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '2') ?>">
					</td>
					<td>
						<div class="d-flexible">
							A- <input type="text" class="form-control"
								name="applications_or_petitions_requesting_fee_waiver_family_memb_a_num[]" maxlength="9"
								value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '2') ?>">
						</div>
					</td>
					<td><input type="date" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth[]"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '2') ?>">
					</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_relate[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_relate', '1') ?>">
					</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed[]" maxlength="14"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '2') ?>">
					</td>
				</tr>
				<tr>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_full_name[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_full_name', '3') ?>">
					</td>
					<td>
						<div class="d-flexible">
							A- <input type="text" class="form-control"
								name="applications_or_petitions_requesting_fee_waiver_family_memb_a_num[]" maxlength="9"
								value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_a_num', '3') ?>">
						</div>
					</td>
					<td><input type="date" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth[]"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_date_of_birth', '3') ?>">
					</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_relate[]" maxlength="17"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_relate', '2') ?>">
					</td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed[]" maxlength="14"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_form_being_filed', '3') ?>">
					</td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:right;padding:5px;"><b>Total Number of Forms (including self)</b></td>
					<td><input type="text" class="form-control"
							name="applications_or_petitions_requesting_fee_waiver_family_memb_total_num" maxlength="15"
							value="<?= showData('applications_or_petitions_requesting_fee_waiver_family_memb_total_num') ?>">
					</td>
				</tr>
			</table>
			<div class="bg-info">
				<h4><b>Part 4. Means-Tested Benefits</b></h4>
			</div>
			<div><b>1.</b>&nbsp;&nbsp;If you, your spouse, or the head of household (including parent if the
				child is under 21 years of age) living with you is receiving
				any means-tested benefits, list the information in the table below and attach supporting
				documentation. If you are the parent or
				legal guardian filing on behalf of a child or person with a physical disability or
				developmental or mental impairment, provide
				information about the child or person for whom you are filing this form if he or she is
				receiving a means-tested benefit.</div>
			<table>
				<tr class="bg-info">
					<th colspan="6" style="padding:5px;">Means-Tested Benefit Recipients</th>
				</tr>
				<tr>
					<th>Full Name of Person Receiving the Benefit</th>
					<th>Relationship to You</th>
					<th>Name of Agency Awarding Benefit</th>
					<th>Type of Benefit</th>
					<th>Date Benefit was Awarded</th>
					<th>Date Benefit Expires or (must be renewed)</th>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '0') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '0') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '0') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '0') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '0') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '0') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '1') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '1') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '1') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '1') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '1') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '1') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '2') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '2') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '2') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '2') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '2') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '2') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '3') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '3') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '3') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '3') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '3') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '3') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '4') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '4') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '4') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '4') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '4') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '4') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '5') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '5') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '5') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '5') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '5') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '5') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '6') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '6') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '6') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '6') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '6') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '6') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="means_test_benefits_full_name[]" maxlength="19" value="<?= showData('means_test_benefits_full_name', '7') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_relate[]" maxlength="11" value="<?= showData('means_test_benefits_relate', '7') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_agency_award[]" maxlength="18" value="<?= showData('means_test_benefits_agency_award', '7') ?>"></td>
					<td><input type="text" class="form-control" name="means_test_benefits_type_of_benefit[]" maxlength="12" value="<?= showData('means_test_benefits_type_of_benefit', '7') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_award[]" maxlength="11" value="<?= showData('means_test_benefits_date_benefit_award', '7') ?>"></td>
					<td><input type="date" class="form-control" name="means_test_benefits_date_benefit_expire[]" maxlength="16" value="<?= showData('means_test_benefits_date_benefit_expire', '7') ?>"></td>
				</tr>
			</table>
		</div><!-- end of left side column -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 2 -->

<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 3 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="bg-info">
				<h4><b>Part 5. Income at or Below 150 Percent of the Federal Poverty Guidelines</b></h4>
			</div>
			<p>Provide information about your adjusted gross income. See Instructions for more details.</p>
			<p>If you selected <b>Item Number 1.B.</b> in <b>Part 1</b>., complete this section.</p>
			<div class="bg-info">
				<h4><b>Your Employment Status</b></h4>
			</div>
			<p><b>1. </b>&nbsp;&nbsp;Employment Status</p>
			<div class="d-flexible">
				<div class="d-flexible">
					<?php echo createCheckbox("i_912_part_5_income_guidence_emplyment_status_employed") ?>
					<p>Employed (full-time, part-time, seasonal, self-employed)</p>
				</div>
				<div class="d-flexible">
					<?php echo createCheckbox("i_912_part_5_income_guidence_emplyment_status_unemployed") ?>
					<p>Unemployed or Not Employed</p>
				</div>
				<div class="d-flexible">
					<?php echo createCheckbox("i_912_part_5_income_guidence_emplyment_status_retired") ?>
					<p>Retired</p>
				</div>
			</div>
			<div class="d-flexible">
				<?php echo createCheckbox("i_912_part_5_income_guidence_emplyment_status_others") ?>
				<p>Other (Explain)</p>
				<div><input type="text" class="form-control" name="income_federal_poverty_guide_other_exp" value="<?= showData('income_federal_poverty_guide_other_exp') ?>"></div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. If you are currently unemployed, are you currently
					receiving unemployment benefits?</label>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("i_912_part_5_income_continued_2") ?>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-12"><b>A.</b>&nbsp;&nbsp;Date you became unemployed (mm/dd/yyyy)</div>
				<div class="col-md-4">
					<input type="date" class="form-control"
						name="federal_poverty_guidelines_date_you_became_unemployed"
						value="<?= showData('federal_poverty_guidelines_date_you_became_unemployed') ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-5">3. What is your total household size</div>
				<div class="col-md-7">
					<div><input type="text" class="form-control" name="your_employment_status_total_household_size" value="<?= showData('your_employment_status_total_household_size') ?>"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-7">4. What is the total number of household members earning income including yourself</div>
				<div class="col-md-5">
					<div><input type="text" class="form-control" name="your_employment_status_total_household_earning" value="<?= showData('your_employment_status_total_household_earning') ?>"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-5">5. Name of head of household (if not you):</div>
				<div class="col-md-7">
					<div><input type="text" class="form-control" name="your_employment_status_name_of_head_of_household" value="<?= showData('your_employment_status_name_of_head_of_household') ?>"></div>
				</div>
			</div>

			<div class="bg-info">
				<h4><b>Your Annual Household Income</b></h4>
			</div>
			<p>Provide information about your adjusted gross income and the adjusted gross income of all family members counted as part of your household. You must list all amounts in U.S. dollars.</p>

			<div class="form-group">
				<div class="control-label col-md-12"> <b>6.</b> Your Annual Adjusted Gross Income</div>
				<div class="col-md-5 col-md-offset-7">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">$</span><input type="text" class="form-control" maxlength="14"
							name="your_annual_household_income"
							value="<?= showData('your_annual_household_income') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-12"><b>7.</b> Annual Adjusted Gross Income of All Family Members
					<p>&nbsp;&nbsp;&nbsp;&nbsp;Provide the annual adjusted gross income of all family members counted as part of your household.<br>
						&nbsp;&nbsp;&nbsp;&nbsp;(Do not include the amount provided in <b>Item Number 6.</b>)</p>
				</div>
				<div class="col-md-5 col-md-offset-7">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">$</span><input type="text" class="form-control" maxlength="14"
							name="your_annual_household_income_all_family_memb"
							value="<?= showData('your_annual_household_income_all_family_memb') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-12"><b>8.</b> Total Adjusted Gross Household Income (add the amounts from <b>Item Numbers 6.</b> and <b>7.</b>)</div>
				<div class="col-md-5 col-md-offset-7">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">$</span><input type="text" class="form-control" maxlength="14"
							name="your_annual_household_income_total_additional_income"
							value="<?= showData('your_annual_household_income_total_additional_income') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="control-label col-md-12"><b>9.</b> Has anything changed since the date you filed your Federal tax returns or is there any difference in your<br>
					circumstances from the information on your petition? &nbsp;(For example, your marital status, income, or<br>
					number of dependents as related to documents provided.)
				</div>
				<div class="col-md-7 col-md-offset-8">
					<?php echo createRadio("i_912_part_5_income_continued_federal_poverty_9") ?>
				</div>
			</div>
			<p>If you answered "Yes" to Item Number 9., provide an explanation below. Provide documentation if available. You may also<br>
				use this space to provide any additional information about your circumstances that you would like USCIS to consider.</p>

		</div><!-- left side column end -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 3 -->

<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 4 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 6. Financial Hardship</b></h4>
			</div>
			<p>1. If you selected <b>Item Number 1.C.</b> in <b>Part 1</b>., complete this section.</p>
			<p>You may also use this space to provide any additional information about your circumstances that you would like U.S. Citizenship
				and Immigration Services (USCIS) to consider. If you or any family members have a situation that has caused you to incur
				expenses, debts, or loss of income, describe the situation in the box below. Specify the amounts of the expenses, debts, and
				income losses in as much detail as possible. This may include homelessness, major medical debt for yourself or a family
				member, and natural disasters declaration posted to <b>www.uscis.gov</b>.</p>
			<textarea maxlength="673" name="financial_hardship_incur_expenses" cols="30" rows="10"
				class="form-control"><?= showData('financial_hardship_incur_expenses') ?></textarea>
			<p><b>2.</b> If you have cash or assets that you can quickly convert to cash, list those in the
				table below. For example, bank accounts, stocks,
				or bonds. (Do not include retirement accounts.)
			</p>
			<table>
				<tr class="bg-info">
					<th colspan="6" style="padding:5px;">Assets</th>
				</tr>
				<tr>
					<th>Type of Asset</th>
					<th>Value (U.S. Dollars)</th>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="financial_hardship_type_of_asset[]" maxlength="22" value="<?= showData('financial_hardship_type_of_asset', '0') ?>"></td>
					<td><input type="text" class="form-control" name="financial_hardship_type_of_asset_value[]" maxlength="22" value="<?= showData('financial_hardship_type_of_asset_value', '0') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="financial_hardship_type_of_asset[]" maxlength="22" value="<?= showData('financial_hardship_type_of_asset', '1') ?>"></td>
					<td><input type="text" class="form-control" name="financial_hardship_type_of_asset_value[]" maxlength="22" value="<?= showData('financial_hardship_type_of_asset_value', '1') ?>"></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" name="financial_hardship_type_of_asset[]" maxlength="22" value="<?= showData('financial_hardship_type_of_asset', '2') ?>"></td>
					<td><input type="text" class="form-control" name="financial_hardship_type_of_asset_value[]" maxlength="22" value="<?= showData('financial_hardship_type_of_asset_value', '2') ?>"></td>
				</tr>
				<tr>
					<td colspan="1" style="text-align:right;padding:5px;" name="financial_hardship_type_of_asset_total_value[]" value="<?= showData('financial_hardship_type_of_asset_total_value', '0') ?>"><b>Total Value of Assets</b></td>
				</tr>
			</table>
		</div><!-- end of left side column -->
		<div class="col-md-6">

			<div class="form-group">
				<div class="control-label col-md-12"><b>3.</b>&nbsp;&nbsp; Total Monthly Expenses and
					Liabilities </div>
				<div class="col-md-5 col-md-offset-7">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">$</span><input type="text" class="form-control"
							name="financial_hardship_monthly_liabilities" maxlength="14"
							value="<?= showData('financial_hardship_monthly_liabilities') ?>">
					</div>
				</div>
			</div>
			<p>Provide the total monthly amount of your expenses and liabilities. You must add all of the
				expense and liability amounts and type
				or print the total amount in the space provided. Type or print "0" in the total box if there
				are none. Select the types of expenses or
				liabilities you have each month and provide evidence of monthly payments, where possible.
			</p>
			<div class="form-group">
				<div class="col-md-5">
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Rent') ? 'checked' : '' ?> value="Rent" />
						<p>Rent and/or Mortgage</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Food') ? 'checked' : '' ?> value="Food" />
						<p>Food</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Utilities') ? 'checked' : '' ?> value="Utilities" />
						<p>Utilities</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Child Care') ? 'checked' : '' ?> value="Child Care" />
						<p>Child and/or Elder Care</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Insurance') ? 'checked' : '' ?> value="Insurance" />
						<p>Insurance</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Loans') ? 'checked' : '' ?> value="Loans" />
						<p>Loans and/or Credit Cards</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Car Payment') ? 'checked' : '' ?> value="Car Payment" />
						<p>Car Payment</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Commuting Costs') ? 'checked' : '' ?> value="Commuting Costs" />
						<p>Commuting Costs</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Medical Expenses') ? 'checked' : '' ?> value="Medical Expenses" />
						<p>Medical Expenses</p>
					</div>
					<div class="d-flexible">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'School Expenses') ? 'checked' : '' ?> value="School Expenses" />
						<p>School Expenses</p>
					</div>
				</div>
				<div class="col-md-12">
					<br>
					<div class="">
						<input type="radio" name="i_912_part_6_financial_hardship_3" <?php echo (showData('i_912_part_6_financial_hardship_3') == 'Others') ? 'checked' : '' ?> value="Other" /> Other (Explain)
					</div>
					<textarea maxlength="214" name="i_912_part_6_financial_hardship_chkbox_other" cols="75" rows="4" class="form-control"><?= showData('i_912_part_6_financial_hardship_chkbox_other') ?></textarea>
				</div>
			</div>

		</div><!-- end of right side column -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 4 -->

<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 5 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 7. Requestor's Statement, Contact Information, Certification, and Signature</b>
				</h4>
			</div>
			<p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-912 Instructions before
				completing this part</p>

			<p>Select the box for either <b>Item A</b>. or <b>B.</b> in <b>Item Number 1</b>. If applicable,
				select the box for <b>Item Number 2</b>.</p>
			<p><b>1.</b>&nbsp;&nbsp; Requestor's Statement Regarding the Interpreter</p>
			<p>
			<div class="d-flexible">
				<label for="">A.</label>
				<?php echo createCheckbox("i_912_part_7_financial_hardship_1a") ?>
				<p>I can read and understand English, and I have read and understand every question and
					instruction on this request and my
					answer to every question.
					B. The interpreter named in Part 9</p>
			</div>
			</p>
			<p>
			<div class="d-flexible">
				<label for="">B.</label>
				<?php echo createCheckbox("i_912_part_7_financial_hardship_1b") ?>
				<p>The interpreter named in Part 9. read to me every question and instruction on this request and my answer to every
					question, in <input type="text" class="form-control" name="requestor_every_ques"
						value="<?= showData('requestor_every_ques') ?>">, a language in which I am fluent, and I understood everything.
				</p>
			</div>
			</p>
			<p><b>2.</b>&nbsp;&nbsp; Requestor's Statement Regarding the Preparer (if applicable)</p>

			<div class="d-flexible">
				<?php echo createCheckbox("i_912_part_7_financial_hardship_2") ?>
				<p>At my request, the preparer named in <b>Part 9</b>.,<input type="text"
						class="form-control" name="requestor_authorized"
						value="<?= showData('requestor_authorized') ?>">prepared this request for me based only upon information I provided or authorized.
				</p>
			</div>
			<div class="bg-info">
				<h4><b>Requestor's Contact Information</b> </h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">3. Requestor's Daytime Telephone Number </label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="requestors_daytime_telephone_num" maxlength="10"
						value="<?= showData('requestors_daytime_telephone_num') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Requestor's Mobile Telephone Number (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="requestors_daytime_mobile_tel_num" maxlength="10"
						value="<?= showData('requestors_daytime_mobile_tel_num') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Requestor's Email Address (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="requestors_daytime_email_addr" maxlength="39"
						value="<?= showData('requestors_daytime_email_addr') ?>">
				</div>
			</div>
		</div><!-- end of left side column -->
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Requestor's Certification</b></h4>
			</div>
			<p>Copies of any documents I have submitted are exact photocopies of unaltered, original
				documents, and I understand that USCIS may
				require that I submit original documents to USCIS at a later date. Furthermore, I authorize
				the release of any information from any of
				my records that USCIS may need to determine my eligibility for the immigration benefit I
				seek.</p>
			<p>I further authorize release of information contained in this request, in supporting
				documents, and in my USCIS records to other entities
				and persons where necessary for the administration and enforcement of U.S. immigration laws.
			</p>
			<p>I certify, under penalty of perjury, that I provided or authorized all of the information in
				my request, I understand all of the information
				contained in, and submitted with, my request, and that all of this information is complete,
				true, and correct. </p>
			<p>I certify, under penalty of perjury, that I provided or authorized all of the information in my request, I understand all of the information contained in, and submitted with, my request, and that all of this information is complete, true, and correct.</p>
			<p><b>WARNING:</b> If you knowingly and willfully falsify or conceal a material fact or submit a false document with your Form I-912, USCIS will deny your fee waiver request and may deny any other immigration benefit. In addition, you may face severe penalties provided by law and may be subject to criminal prosecution.</p>

			<div class="bg-info">
				<h4><b>Requestor's Signature</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Requestor's Signature</label>
				<div class="col-md-12">
					<div class="d-flexible">
						<span style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-12">
					<div class="d-flexible">
						<input type="date" class="form-control" name="requestors_statement_date_of_sign"
							value="<?= showData('requestors_statement_date_of_sign') ?>">
					</div>
				</div>
			</div>
			<p><b>NOTE TO ALL REQUESTORS:</b> If you do not completely fill out this request or fail to
				submit required documents listed in the
				Instructions, USCIS may deny your request.</p>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 5 -->

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 6 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 8. Interpreter's Contact Information, Certification, and Signature</b></h4>
			</div>

			<p>Provide the following information about the interpreter.</p>

			<div class="bg-info">
				<h4><b>Interpreter's Full Name</b></h4>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">1. Interpreter's Family Name (Last Name)</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_interpreter_family_last_name" maxlength="44"
							value="<?= showData('i_912_interpreter_family_last_name') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12"> Interpreter's Given Name (First Name) </label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_interpreter_family_given_first_name" maxlength="42"
							value="<?= showData('i_912_interpreter_family_given_first_name') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="34" name="i_912_interpreter_business_name" value="<?= showData('i_912_interpreter_business_name') ?>">
				</div>
			</div>
			<div class="bg-info">
				<div class="d-flexible-floating">
					<h4><b>Interpreter's Mailing Address</b></h4> USPS ZIP Code Lookup
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3. Street Number and Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_street_number" maxlength="34"
						value="<?= showData('i_912_interpreter_mailing_address_street_number') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">
					<input type="radio" name="i_912_interpreter_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_912_interpreter_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="i_912_interpreter_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_912_interpreter_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
					<input type="radio" name="i_912_interpreter_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_912_interpreter_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
				</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_912_interpreter_mailing_address_apt_ste_flr_value') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_city_town" maxlength="20"
						value="<?= showData('i_912_interpreter_mailing_address_city_town') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="i_912_interpreter_mailing_address_state" class="form-control">
						<option style="display:none" value="">Select</option>
						<option value="0">N/A</option>
						<?php
						foreach ($allDataCountry as $record) {
							if ($record->state_code == showData('i_912_interpreter_mailing_address_state')) $selected = "selected";
							else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_zip_code" maxlength="5"
						value="<?= showData('i_912_interpreter_mailing_address_zip_code') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_province" maxlength="20"
						value="<?= showData('i_912_interpreter_mailing_address_province') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_postal_code" maxlength="9"
						value="<?= showData('i_912_interpreter_mailing_address_postal_code') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Country</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_interpreter_mailing_address_country" maxlength="33"
						value="<?= showData('i_912_interpreter_mailing_address_country') ?>">
				</div>
			</div>
		</div><!-- end of left side column -->
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Interpreter's Contact Information</b> </h4>
			</div>

			<div class="form-group">
				<label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_interpreter_daytime_tel" maxlength="10"
						value="<?= showData('i_912_interpreter_daytime_tel') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if any)
				</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_interpreter_mobile" maxlength="10"
						value="<?= showData('i_912_interpreter_mobile') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_interpreter_email" maxlength="39"
						value="<?= showData('i_912_interpreter_email') ?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Interpreter's Certification</b></h4>
			</div>
			<p>I certify, under penalty of perjury, that:
			</p>
			<p>I am fluent in English and
				<input type="text" class="form-control" style="display: inline;width: auto"
					name="i_912_interpreter_certification_language_skill" maxlength="46"
					value="<?= showData('i_912_interpreter_certification_language_skill') ?>">, which is the same language specified
				in Part 7., Item B. in Item Number 1., and I have read to this requestor in the identified language every question and instruction on
				this request and his or her answer to every question. The requestor informed me that he or she understands every instruction, question,
				and answer on the request, including the Applicant's Certification, and has verified the accuracy of every answer.
			</p>
			<div class="bg-info">
				<h4><b>Interpreter's Signature</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">7. Interpreter's Signature</label>
				<div class="col-md-12">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-12">
					<div class="d-flexible">
						<input type="date" class="form-control"
							name="i_912_interpreter_sign_date"
							value="<?= showData('i_912_interpreter_sign_date') ?>">
					</div>
				</div>
			</div>
		</div><!-- end of right side column -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 6 -->

<!----------------------------------------------------------------------
-------------------------------- page 7 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 7 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 9. Contact Information, Declaration, and Signature of the Person Preparing this Request, if Other Than the Requestor</b></h4>
			</div>
			<p>Provide the following information about the preparer for (if applicable).</p>
			<div class="bg-info">
				<h4><b>Preparer's Full Name</b></h4>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">1. Preparer's Family Name (Last Name)</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_preparer_family_last_name" maxlength="44"
							value="<?= showData('i_912_preparer_family_last_name') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">Preparer's Given Name (First Name)</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_preparer_family_given_first_name" maxlength="44"
							value="<?= showData('i_912_preparer_family_given_first_name') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
				<div class="col-md-12">
					<input type="text" class="form-control" maxlength="34" name="i_912_preparer_business_name" value="<?= showData('i_912_preparer_business_name') ?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Mailing Address</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">3. Street Number and Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="34"
						name="i_912_preparer_mailing_address_street_number"
						value="<?= showData('i_912_preparer_mailing_address_street_number') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-6">
					<input type="radio" name="i_912_preparer_mailing_address_apt_ste_flr" value="apt" <?php echo (showData('i_912_preparer_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
					<input type="radio" name="i_912_preparer_mailing_address_apt_ste_flr" value="ste" <?php echo (showData('i_912_preparer_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
					<input type="radio" name="i_912_preparer_mailing_address_apt_ste_flr" value="flr" <?php echo (showData('i_912_preparer_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
				</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="i_912_preparer_mailing_address_apt_ste_flr_value" maxlength="6" value="<?php echo showData('i_912_preparer_mailing_address_apt_ste_flr_value') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">City or Town</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_912_preparer_mailing_address_city_town" maxlength="20"
						value="<?= showData('i_912_preparer_mailing_address_city_town') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">State</label>
				<div class="col-md-7">
					<select name="i_912_preparer_mailing_address_state" class="form-control">
						<option style="display:none" value="">Select</option>
						<option value="0">N/A</option>
						<?php
						foreach ($allDataCountry as $record) {
							if ($record->state_code == showData('i_912_preparer_mailing_address_state')) $selected = "selected";
							else $selected = "";
							echo "<option value='$record->state_code' $selected>$record->state_code</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">ZIP Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="5"
						name="i_912_preparer_mailing_address_zip_code"
						value="<?= showData('i_912_preparer_mailing_address_zip_code') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Province</label>
				<div class="col-md-7">
					<input type="text" class="form-control" maxlength="20"
						name="i_912_preparer_mailing_address_province"
						value="<?= showData('i_912_preparer_mailing_address_province') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Postal Code</label>
				<div class="col-md-7">
					<input type="text" class="form-control"
						name="i_912_preparer_mailing_address_postal_code" maxlength="9"
						value="<?= showData('i_912_preparer_mailing_address_postal_code') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Country</label>
				<div class="col-md-12">
					<input type="text" class="form-control"
						name="i_912_preparer_mailing_address_country" maxlength="33"
						value="<?= showData('i_912_preparer_mailing_address_country') ?>">
				</div>
			</div>
		</div><!-- end of left side column -->
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Preparer's Contact Information</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_preparer_daytime_tel" maxlength="10"
						value="<?= showData('i_912_preparer_daytime_tel') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)
				</label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_preparer_mobile" maxlength="10"
						value="<?= showData('i_912_preparer_mobile') ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">6. Preparer's Email Address (if any) </label>
				<div class="col-md-12">
					<input type="text" class="form-control" name="i_912_preparer_email" maxlength="39"
						value="<?= showData('i_912_preparer_email') ?>">
				</div>
			</div>
			<div class="bg-info">
				<h4><b>Preparer's Statement</b></h4>
			</div>
			<p><b>7.</b></p>
			<div class="d-flexible">
				<b>A.</b>
				<?php echo createCheckbox("i_912_part_10_preparer_statment_9a") ?>
				<p>I am not an attorney or accredited representative but have prepared this request on behalf of the
					requestor and with the requestor's consent.</p>
			</div>
			<div class="d-flexible">
				<b>B.</b>
				<?php echo createCheckbox("i_912_part_10_preparer_statment_9b") ?>
				<p>I am an attorney or accredited representative and my representation of the requestor in this case
					<?php echo createCheckbox("i_912_preparer_statement_7b_extend") ?> extends <?php echo createCheckbox("i_912_preparer_statement_7b_not_extend") ?> does not extend beyond the preparation of this request.
				</p>
			</div>
			<p><b>NOTE:</b> If you are an attorney or accredited representative, you may be obliged to submit a
				completed Form G-28, Notice of Entry of Appearance as Attorney or Accredited Representative,
				or G-28I, Notice of Entry of Appearance as Attorney In Matters Outside the Geographical
				Confines of the United States, with this request.</p>
			<div class="bg-info">
				<h4><b>Preparer's Certification</b></h4>
			</div>
			<p>By my signature, I certify, under penalty of perjury, that I prepared this request at the request of the requestor. The requestor then
				reviewed this completed request and informed me that he or she understands all of the information contained in, and submitted with,
				his or her request, including the <b>Applicant's Certification</b>, and that all of this information is complete, true, and correct. I completed
				this request based only on information that the requestor provided to me or authorized me to obtain or use.</p>

			<div class="bg-info">
				<h4><b>Preparer's Signature</b></h4>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">8. Preparer's Signature</label>
				<div class="col-md-12">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><input type="text" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">Date of Signature (mm/dd/yyyy)</label>
				<div class="col-md-12">
					<div class="d-flexible">
						<input type="date" class="form-control" name="i_912_preparer_sign_date"
							value="<?= showData('i_912_preparer_sign_date') ?>">
					</div>
				</div>
			</div>
		</div><!-- end of right side column -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="submit" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 8 -->

<!----------------------------------------------------------------------
-------------------------------- page 8 -------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
	<!-- page Number -->
	<div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;padding:0px 5px 10px 0px;">
		<p style="display:flex;justify-content:flex-end;font-weight:bolder;">Page 8 of 8</p>
	</div>
	<!-- page Number -->
	<br>
	<div class="row">
		<div class="col-md-6">
			<div class="bg-info">
				<h4><b>Part 10. Additional Information</b></h4>
			</div>
			<p>If you need extra space to provide any additional information within this request, use the space below. If you need more space than
				what is provided, you may make copies of this page to complete and file with this request or attach a separate sheet of paper. Include
				your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number</b>, <b>Part Number</b>, and <b>Item Number</b> to
				which your answer refers.
			</p>
			<div class="form-group">
				<label class="control-label col-md-5">1. Family Name(Last Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_additional_info_last_name"
						value="<?= showData('i_912_additional_info_last_name') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Given Name(First Name):</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_additional_info_first_name"
						value="<?= showData('i_912_additional_info_first_name') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-5">Middle Name:</label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="i_912_additional_info_middle_name"
						value="<?= showData('i_912_additional_info_middle_name') ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">2. A-Number (if any) </label>
				<div class="col-md-8 col-md-offset-4">
					<div class="d-flexible">
						<span
							style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
							role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
							class="form-control" name="i_912_additional_info_a_number" maxlength="9"
							value="<?= showData('i_912_additional_info_a_number') ?>">
					</div>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">3. &nbsp;A. Page Number </label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_3a_page_no" maxlength="2"
							value="<?= showData('i_912_additional_info_3a_page_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">B. Part Number </label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_3b_part_no" maxlength="6"
							value="<?= showData('i_912_additional_info_3b_part_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">C. Item Number </label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_3c_item_no" maxlength="6"
							value="<?= showData('i_912_additional_info_3c_item_no') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>D.</b></span>
					<textarea name="i_912_additional_info_3d" class="form-control" cols="30" maxlength="316" rows="10"><?= showData('i_912_additional_info_3d') ?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">4. &nbsp;A. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_4a_page_no" maxlength="2"
							value="<?= showData('i_912_additional_info_4a_page_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">B. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_4b_part_no" maxlength="6"
							value="<?= showData('i_912_additional_info_4b_part_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">C. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_4c_item_no" maxlength="6"
							value="<?= showData('i_912_additional_info_4c_item_no') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>D.</b></span>
					<textarea name="i_912_additional_info_4d" class="form-control" cols="30" maxlength="316" rows="10"><?= showData('i_912_additional_info_4d') ?></textarea>
				</div>
			</div>
		</div><!-- left side column end -->
		<div class="col-md-6">
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">5. &nbsp;A. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_5a_page_no" maxlength="2"
							value="<?= showData('i_912_additional_info_5a_page_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">B. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_5b_part_no" maxlength="6"
							value="<?= showData('i_912_additional_info_5b_part_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">C. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_5c_item_no" maxlength="6"
							value="<?= showData('i_912_additional_info_5c_item_no') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>D.</b></span>
					<textarea name="i_912_additional_info_5d" class="form-control" cols="30" maxlength="316" rows="10"><?= showData('i_912_additional_info_5d') ?></textarea>
				</div>
			</div>
			<div class="d-flexible">
				<div class="form-group">
					<label class="control-label col-md-12">6. &nbsp;A. Page Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_6a_page_no" maxlength="2"
							value="<?= showData('i_912_additional_info_6a_page_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">B. Part Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_6b_part_no" maxlength="6"
							value="<?= showData('i_912_additional_info_6b_part_no') ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-12">C. Item Number</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="i_912_additional_info_6c_item_no" maxlength="6"
							value="<?= showData('i_912_additional_info_6c_item_no') ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<span><b>D.</b></span>
					<textarea name="i_912_additional_info_6d" class="form-control" cols="30" maxlength="316" rows="10"><?= showData('i_912_additional_info_6d') ?></textarea>
				</div>
			</div>
		</div><!-- end of right side column -->
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input style="float: right" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset><!-- end of fieldset 11 -->

<?php include "intake_footer.php" ?>