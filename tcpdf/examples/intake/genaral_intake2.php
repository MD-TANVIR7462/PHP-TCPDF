<?php
$meta_title     =   "General Intake";
$page_heading     =   "General Intake";
include "intake_header.php";
?>
<style>
	.mt-5 {
		margin-top: 20px;
	}

	.mb-5 {
		margin-bottom: 15px;
	}

	.title {
		text-align: right;
		margin-bottom: 20px;
	}

	.heading {
		background-color: #bcd7ff;
		border: 1px solid #bce8f1;
		padding: 10px 15px;
		font-size: 1.5em;
		border-radius: 4px;
		text-align: center;
	}
</style>
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info ">
		<div class="panel-body">
			<p class="title"><b>Page 1 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>I-94 Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Immigration History</b></p>
						</h4>
					</div>
					<div id="collapseImmigration" class="panel-collapse collapse in">
						<div class="panel-body">
							<h4><code><b>Note : </b>I-102, I-130, I-485, I-765, I-918 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-12">Country that Issued this Passport or Travel Document</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="i_94_imgt_country_issuance_passport" value="<?php echo showData('i_94_imgt_country_issuance_passport') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Nonimmigrant Visa Number from this Passport (if any)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="i_94_imgt_nonimmigrant_visa_number" value="<?php echo showData('i_94_imgt_nonimmigrant_visa_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" maxlength="36" name="i_94_imgt_city_town" value="<?php echo showData('i_94_imgt_city_town') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="i_94_imgt_state">
												<option style="display:none" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('i_94_imgt_state')) $selected = "selected";
													else $selected = "";
													echo "<option value='$record->state_code' $selected>$record->state_code</option>";
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-12">Date of Last Arrival (mm/dd/yyyy)</label>
										<div class="col-md-12">
											<input type="date" class="form-control" name="i_94_imgt_date_of_last_arival" value="<?php echo showData('i_94_imgt_date_of_last_arival') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Form I-94, Arrival-Departure Record Number</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="i_94_imgt_arrival_record_number" value="<?php echo showData('i_94_imgt_arrival_record_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Date of issuance for passport or Travel Document </label>
										<div class="col-md-12">
											<input type="date" class="form-control" name="i_94_imgt_date_issuance_passport" value="<?php echo showData('i_94_imgt_date_issuance_passport') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Expiration Date of Authorized Stay Shown on Form I-94 </label>
										<div class="col-md-12">
											<input type="date" class="form-control" name="i_94_imgt_expiry_date_of_authorized" value="<?php echo showData('i_94_imgt_expiry_date_of_authorized') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Entry Information</b></p>
						</h4>
					</div>

					<div id="collapseEntry" class="">
						<div class="panel-body">
							<h4><code><b>Note : </b>I-102, I-485, I-918</code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-12">Date of Last Entry into the United States</label>
										<div class="col-md-12">
											<input type="date" class="form-control" name="other_information_about_you_date_of_entry" value="<?php echo showData('other_information_about_you_date_of_entry') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Place of Last Entry into the United States (City and State)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="other_information_about_you_place_of_entry_city_town" value="<?php echo showData('other_information_about_you_place_of_entry_city_town') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Class of Admission at Last Entry Into the United States</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="other_information_about_you_class_of_addmission" value="<?php echo showData('other_information_about_you_class_of_addmission') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Indicate the type of Port-of-Entry at which you last entered the United States</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="other_information_about_you_type_of_port_entry" value="<?php echo showData('other_information_about_you_type_of_port_entry') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Current Nonimmigration Status</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="36" name="other_information_about_you_current_nonimmigration_status" value="<?php echo showData('other_information_about_you_current_nonimmigration_status') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-12">Dates Status Expires (mm/dd/yyyy)</label>
										<div class="col-md-12">
											<input type="date" class="form-control" name="other_information_about_you_status_expire_date" value="<?php echo showData('other_information_about_you_status_expire_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<p>Provide your name exactly as it appears on Form 1-94, Form 1-94W or Form 1-95 If the name on the form is different than your current legal name</p>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Family Name (Last Name)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="29" name="i_94_family_last_name" value="<?php echo showData('i_94_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Given Name (First Name)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="29" name="i_94_given_first_name" value="<?php echo showData('i_94_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Middle Name</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="29" name="i_94_middle_name" value="<?php echo showData('i_94_middle_name') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 2 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Personal Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Legal Full Name</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div id="collapseLegalFullName" class="panel-collapse collapse in">
						<div class="panel-body">
							<h4><code><b>Note : </b>G-28, I-90, I-102, I-130, I-130A, I-131, I-192, I-485, I-765, I-918, I-912, I-918A </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Family Name (Last Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_family_last_name" maxlength="29" value="<?php echo showData('information_about_you_family_last_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Given Name (First Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_given_first_name" maxlength="29" value="<?php echo showData('information_about_you_given_first_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Middle Name </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_middle_name" maxlength="29" value="<?php echo showData('information_about_you_middle_name') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Other Name 1</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b>I-90, I-102, I-130, I-192, I-485, I-765, I-918, I-912 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Family Name (Last Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_family_last_name" maxlength="29" value="<?php echo showData('information_about_you_other_family_last_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Given Name (First Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_given_first_name" maxlength="29" value="<?php echo showData('information_about_you_other_given_first_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Middle Name </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_middle_name" maxlength="29" value="<?php echo showData('information_about_you_other_middle_name') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Other Name 2</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b>I-192, I-485, I-765, I-912 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Family Name (Last Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_family_last_name2" maxlength="29" value="<?php echo showData('information_about_you_other_family_last_name2') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Given Name (First Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_given_first_name2" maxlength="29" value="<?php echo showData('information_about_you_other_given_first_name2') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Middle Name </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_middle_name2" maxlength="29" value="<?php echo showData('information_about_you_other_middle_name2') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Other Name 3</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b>I-485, I-765 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Family Name (Last Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_family_last_name3" maxlength="29" value="<?php echo showData('information_about_you_other_family_last_name3') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Given Name (First Name)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_given_first_name3" maxlength="29" value="<?php echo showData('information_about_you_other_given_first_name3') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Middle Name </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_other_middle_name3" maxlength="29" value="<?php echo showData('information_about_you_other_middle_name3') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Other Information</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> G-28, I-90, I-102, I-130, I-130A, I-131, I-192, I-485, I-765, I-864, I-912, I-918, I-918A </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="<?php echo showData('other_information_about_you_date_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Sex/Gender</label>
										<div class="col-md-7">
											<label class="control-label">
												<input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : ''; ?>>
												Male
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : ''; ?>>
												Female
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Alien Registration Number (A-Number) (if any)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="9" name="other_information_about_you_alien_registration_number" value="<?php echo showData('other_information_about_you_alien_registration_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">USCIS Online Account Number (if any)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" maxlength="12" name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">US Social Security Number (if any)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="other_information_about_you_social_security_number" maxlength="9" value="<?php echo showData('other_information_about_you_social_security_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">What is your current marital status?</label>
										<div class="col-md-12">
											<div class="form-check">
												<label class="control-label">
													<input type="radio" name="other_information_about_you_marital_status" value="single" <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : '' ?>>
													Single, Never Married</label>
											</div>
											<div class="form-check">
												<label class="control-label">
													<input type="radio" name="other_information_about_you_marital_status" value="married" <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : '' ?>>
													Married</label>
											</div>
											<div class="form-check">
												<label class="control-label">
													<input type="radio" name="other_information_about_you_marital_status" value="divorced" <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : '' ?>>
													Divorced</label>
											</div>
											<div class="form-check">
												<label class="control-label">
													<input type="radio" name="other_information_about_you_marital_status" value="widowed" <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : '' ?>>
													Widowed</label>
											</div>
											<div class="form-check">
												<label class="control-label">
													<input type="radio" name="other_information_about_you_marital_status" value="annulled" <?php echo (showData('other_information_about_you_marital_status') == 'annulled') ? 'checked' : '' ?>>
													Marriage Annulled</label>
											</div>
											<div class="form-check">
												<label class="control-label">
													<input type="radio" name="other_information_about_you_marital_status" value="separated" <?php echo (showData('other_information_about_you_marital_status') == 'separated') ? 'checked' : '' ?>>
													Legally Separated</label>
											</div>
											<div class="form-check">
												<div class="col-md-4">
													<label class="control-label">
														<input type="radio" name="other_information_about_you_marital_status" value="other" <?php echo (showData('other_information_about_you_marital_status') == 'other') ? 'checked' : '' ?>> Other (Explain)</label>
												</div>
												<div class="col-md-8">
													<input type="text" class="form-control" name="other_information_about_you_marital_explain" maxlength="45" value="<?php echo showData('other_information_about_you_marital_explain') ?>" />
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-12">How many times have you been married (including annulled marriages and marriages to the same person)?</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="other_information_about_you_total_married" maxlength="9" value="<?php echo showData('other_information_about_you_total_married') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">City or Town of Birth</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="other_information_about_you_city_of_birth" maxlength="29" value="<?php echo showData('other_information_about_you_city_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Country of Birth</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="other_information_about_you_country_of_birth" maxlength="29" value="<?php echo showData('other_information_about_you_country_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">State or Province</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="other_information_about_you_province_of_birth" maxlength="29" value="<?php echo showData('other_information_about_you_province_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Country of Citizenship or Nationality</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="other_information_about_you_country_of_citizen" maxlength="29" value="<?php echo showData('other_information_about_you_country_of_citizen') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6">
											<h5><b>Your family member was or is in immigration
													proceedings. </b>
											</h5>
										</div>
										<div class="col-md-6">
											<?php echo createRadio("other_info_family_immegration_process") ?>
										</div>
									</div>
									<div class="col-md-12">
										<label class="control-label"> If you answered "Yes," select the type of proceedings. If your
											family member was in proceedings in the past and is no longer
											in proceedings, provide the date of action. If your family
											member is currently in proceedings, type or print “Current” in
											the appropriate date field. Select <b>all applicable</b> boxes. Use the
											space provided in <b>Part 11. Additional Information</b> to provide
											an explanation.</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-7"> 7.b.
											<?php echo createCheckbox("immigration_proceedings_removal") ?>
											Removal Proceedings <br>Removal Date (mm/dd/yyyy)
										</label>
										<div class="col-md-5">
											<input type="date" class="form-control" name="immigration_proceedings_removal_date" value="<?php echo showData('immigration_proceedings_removal_date') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-7"> 7.c.
											<?php echo createCheckbox("immigration_proceedings_exclusion") ?>
											Exclusion Proceedings <br>Exclusion Date (mm/dd/yyyy)
										</label>
										<div class="col-md-5">
											<input type="date" class="form-control" name="immigration_proceedings_exclusion_date" value="<?php echo showData('immigration_proceedings_exclusion_date') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-7"> 7.d.
											<?php echo createCheckbox("immigration_proceedings_deportion") ?>
											Deportation Proceedings <br>Deportation Date(mm/dd/yyyy)
										</label>
										<div class="col-md-5">
											<input type="date" class="form-control" name="immigration_proceedings_deportion_date" value="<?php echo showData('immigration_proceedings_deportion_date') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-7"> 7.e.
											<?php echo createCheckbox("immigration_proceedings_rescission") ?>
											Rescission Proceedings <br>Rescission Date (mm/dd/yyyy)
										</label>
										<div class="col-md-5">
											<input type="date" class="form-control" name="immigration_proceedings_rescission_date" value="<?php echo showData('immigration_proceedings_rescission_date') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-7"> 7.f.
											<?php echo createCheckbox("immigration_proceedings_judicial") ?>
											Judicial Proceedings <br>Judicial Date (mm/dd/yyyy)
										</label>
										<div class="col-md-5">
											<input type="date" class="form-control" name="immigration_proceedings_judicial_date" value="<?php echo showData('immigration_proceedings_judicial_date') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Contact Information</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> G-28, I-130 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Daytime Telephone Number (if any)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_daytime_tel" maxlength="15" value="<?php echo showData('information_about_you_daytime_tel') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Mobile Telephone Number (if any)</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="information_about_you_mobile" maxlength="15" value="<?php echo showData('information_about_you_mobile') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Email Address (if any)</label>
								<div class="col-md-7">
									<input type="email" class="form-control" name="information_about_you_email" maxlength="36" value="<?php echo showData('information_about_you_email') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Passport / Travel Information</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-102, I-130, I-485, I-765, I-918 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Passport Number Used at Last Arrival</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="other_information_about_you_passport_number" maxlength="36" value="<?php echo showData('other_information_about_you_passport_number') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Travel Document Number Used at Last Arrival</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="other_information_about_you_travel_document_number" maxlength="36" value="<?php echo showData('other_information_about_you_travel_document_number') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Expiration Date of this Passport or Travel Document (mm/dd/yyyy)</label>
								<div class="col-md-7">
									<input type="date" class="form-control" name="other_information_about_you_expiry_date_issuance_passport" value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<div class="panel-heading">
								<h4 class="panel-title">
									<p><b>Biographic Information</b></p>
								</h4>
							</div>
						</h4>
					</div>
					<div>
						<div class="panel-body">

							<h4><code><b>Note : </b> I-90, I-130, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">
												<input type="radio" name="biographic_info_ethnicity" value="hispanic" <?php echo (showData('biographic_info_ethnicity') == 'hispanic') ? 'checked' : '' ?>>
												Hispanic or Latino
											</label>
										</div>
										<div class="col-md-12">
											<label class="control-label">
												<input type="radio" name="biographic_info_ethnicity" value="nothispanic" <?php echo (showData('biographic_info_ethnicity') == 'nothispanic') ? 'checked' : '' ?>>
												Not Hispanic or Latino
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">2. Race (Select all applicable boxes)</label>
										<div class="col-md-12">
											<div class="form-check">
												<?php echo createCheckbox("biographic_info_race_white") ?>
												<label class="form-check-label">White</label>
											</div>
											<div class="form-check">
												<?php echo createCheckbox("biographic_info_race_asian") ?>
												<label class="form-check-label">Asian</label>
											</div>
											<div class="form-check">
												<?php echo createCheckbox("biographic_info_race_black_african") ?>
												<label class="form-check-label">Black or African American</label>
											</div>
											<div class="form-check">
												<?php echo createCheckbox("biographic_info_race_american_native") ?>
												<label class="form-check-label">American Indian or Alaska Native</label>
											</div>
											<div class="form-check">
												<?php echo createCheckbox("biographic_info_race_native_islander") ?>
												<label class="form-check-label">Native Hawaiian or Other Pacific Islander</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">3.Height</label>
										<div class="col-md-12">
											<label style="padding-left:10%">Feet:</label>
											<select id="feet" name="biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
												<?php echo "<option value=" . showData('biographic_info_height_feet') . " selected>" . showData('biographic_info_height_feet') . "</option>"; ?>
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
												<?php echo "<option value=" . showData('biographic_info_height_inches') . " selected>" . showData('biographic_info_height_inches') . "</option>"; ?>
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
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">4.Weight</label>
										<div class="col-md-12">
											<span style="padding-left:10%"><b> Pounds:</b></span>
											<input type="text" maxlength="1" name="biographic_info_weight_in_pound1" value="<?php echo showData('biographic_info_weight_in_pound1') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
											<input type="text" maxlength="1" name="biographic_info_weight_in_pound2" value="<?php echo showData('biographic_info_weight_in_pound2') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
											<input type="text" maxlength="1" name="biographic_info_weight_in_pound3" value="<?php echo showData('biographic_info_weight_in_pound3') ?>" style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-12">5. Eye Color (Select only one box)</label>
										<div class="col-md-12">
											<input type="radio" name="biographic_info_eye_color" value="black" <?php echo (showData('biographic_info_eye_color') == 'black') ? 'checked' : '' ?>> Black<br>

											<input type="radio" name="biographic_info_eye_color" value="blue" <?php echo (showData('biographic_info_eye_color') == 'blue') ? 'checked' : '' ?>> Blue<br>

											<input type="radio" name="biographic_info_eye_color" value="brown" <?php echo (showData('biographic_info_eye_color') == 'brown') ? 'checked' : '' ?>> Brown<br>

											<input type="radio" name="biographic_info_eye_color" value="gray" <?php echo (showData('biographic_info_eye_color') == 'gray') ? 'checked' : '' ?>> Gray<br>

											<input type="radio" name="biographic_info_eye_color" value="green" <?php echo (showData('biographic_info_eye_color') == 'green') ? 'checked' : '' ?>> Green<br>

											<input type="radio" name="biographic_info_eye_color" value="hazel" <?php echo (showData('biographic_info_eye_color') == 'hazel') ? 'checked' : '' ?>> Hazel<br>

											<input type="radio" name="biographic_info_eye_color" value="maroon" <?php echo (showData('biographic_info_eye_color') == 'maroon') ? 'checked' : '' ?>> Maroon<br>

											<input type="radio" name="biographic_info_eye_color" value="pink" <?php echo (showData('biographic_info_eye_color') == 'pink') ? 'checked' : '' ?>> Pink<br>

											<input type="radio" name="biographic_info_eye_color" value="unknown" <?php echo (showData('biographic_info_eye_color') == 'unknown') ? 'checked' : '' ?>> Unknown/Other<br>
											<br>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">6. Hair Color (Select only one box)</label>
										<div class="col-md-12">
											<input type="radio" name="biographic_info_hair_color" value="bald" <?php echo (showData('biographic_info_hair_color') == 'bald') ? 'checked' : '' ?>> Bald (No hair)<br>

											<input type="radio" name="biographic_info_hair_color" value="black" <?php echo (showData('biographic_info_hair_color') == 'black') ? 'checked' : '' ?>> Black<br>

											<input type="radio" name="biographic_info_hair_color" value="blond" <?php echo (showData('biographic_info_hair_color') == 'blond') ? 'checked' : '' ?>> Blond<br>

											<input type="radio" name="biographic_info_hair_color" value="brown" <?php echo (showData('biographic_info_hair_color') == 'brown') ? 'checked' : '' ?>> Brown<br>

											<input type="radio" name="biographic_info_hair_color" value="gray" <?php echo (showData('biographic_info_hair_color') == 'gray') ? 'checked' : '' ?>> Gray<br>

											<input type="radio" name="biographic_info_hair_color" value="red" <?php echo (showData('biographic_info_hair_color') == 'red') ? 'checked' : '' ?>> Red<br>

											<input type="radio" name="biographic_info_hair_color" value="sandy" <?php echo (showData('biographic_info_hair_color') == 'sandy') ? 'checked' : '' ?>> Sandy<br>

											<input type="radio" name="biographic_info_hair_color" value="white" <?php echo (showData('biographic_info_hair_color') == 'white') ? 'checked' : '' ?>> White<br>

											<input type="radio" name="biographic_info_hair_color" value="unknown" <?php echo (showData('biographic_info_hair_color') == 'unknown') ? 'checked' : '' ?>> Unknown/Other<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 3 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Address Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>U.S Mailing Address</b></p>
						</h4>
					</div>
					<div id="collapseUSMailingAddress" class="panel-collapse collapse in">
						<div class="panel-body">
							<!--<div class="bg-info">
									<h4><b>U.S Mailing Address</b></h4> 
								</div>-->
							<h4><code><b>Note : </b> I-90, I-102, I-485, I-765 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">In Care Of Name (if any)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_care_of_name" maxlength="29" value="<?php echo showData('information_about_you_us_mailing_care_of_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_street_number" maxlength="29" value="<?php echo showData('information_about_you_us_mailing_street_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-5">
											<label class="control-label">
												<input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
												Apt
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
												Ste
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_us_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
												Flr
											</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_us_mailing_apt_ste_flr_value') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_city_town" maxlength="29" value="<?php echo showData('information_about_you_us_mailing_city_town') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="information_about_you_us_mailing_state">
												<option style="display:none" value=''>Select</option>
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
									<div class="form-group">
										<label class="control-label col-md-5">ZIP Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_us_mailing_zip_code') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_province" maxlength="29" value="<?php echo showData('information_about_you_us_mailing_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_postal_code" maxlength="29" value="<?php echo showData('information_about_you_us_mailing_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_us_mailing_country" maxlength="29" value="<?php echo showData('information_about_you_us_mailing_country') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Is your current mailing address the same as your physical address?</label>
										<div class="col-md-12">
											<?php echo createRadio("is_your_current_mailing_address_same_as_physical") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Alternate and/or Safe Mailing Address</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<!--<div class="bg-info">
									<h4><b>Alternate and/or Safe Mailing Address</b></h4> 
								</div>-->
							<h4><code><b>Note : </b> I-102, I-192, I-485, I-918, I-918A </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">In Care Of Name (if any)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_care_of_name" maxlength="29" value="<?php echo showData('information_about_you_mailing_care_of_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_street_number" maxlength="26" value="<?php echo showData('information_about_you_mailing_street_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-5">
											<label class="control-label">
												<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
												Apt
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
												Ste
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_mailing_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
												Flr
											</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_mailing_apt_ste_flr_value') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_city_town" maxlength="20" value="<?php echo showData('information_about_you_mailing_city_town') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="information_about_you_mailing_state">
												<option style="display:none" value=''>Select</option>
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
										<label class="control-label col-md-5">ZIP Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_zip_code" maxlength="5" value="<?php echo showData('information_about_you_mailing_zip_code') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_province" maxlength="20" value="<?php echo showData('information_about_you_mailing_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_postal_code" maxlength="9" value="<?php echo showData('information_about_you_mailing_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_mailing_country" maxlength="29" value="<?php echo showData('information_about_you_mailing_country') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Physical Address 1</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<!--<div class="bg-info">
									<h4><b>Physical Address 1</b></h4> 
								</div>-->
							<h4><code><b>Note : </b> I-90, I-102, I-130A, I-131, I-192, I-485, I-765, I-918 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">In Care Of Name (if any)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_care_of_name" maxlength="29" value="<?php echo showData('information_about_you_home_care_of_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_street_number" maxlength="26" value="<?php echo showData('information_about_you_home_street_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-5">
											<label class="control-label">
												<input type="radio" name="information_about_you_home_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
												Apt
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_home_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
												Ste
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_home_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
												Flr
											</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_home_apt_ste_flr_value') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_city_town" maxlength="29" value="<?php echo showData('information_about_you_home_city_town') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="information_about_you_home_state">
												<option style="display:none" value=''>Select</option>
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
									<div class="form-group">
										<label class="control-label col-md-5">ZIP Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_zip_code" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_province" maxlength="29" value="<?php echo showData('information_about_you_home_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_postal_code" maxlength="9" value="<?php echo showData('information_about_you_home_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_country" maxlength="29" value="<?php echo showData('information_about_you_home_country') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="information_about_you_home_residence_from_date" value="<?= showData('information_about_you_home_residence_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="information_about_you_home_residence_to_date" value="<?= showData('information_about_you_home_residence_to_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Physical Address 2</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<!--<div class="bg-info">
									<h4><b> Physical Address 2</b></h4>
								</div>-->
							<h4><code><b>Note : </b> I-130A, I-192, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_street_number2" maxlength="29" value="<?php echo showData('information_about_you_home_street_number2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-5">
											<label class="control-label">
												<input type="radio" name="information_about_you_home_apt_ste_flr2" value="apt" <?php echo (showData('information_about_you_home_apt_ste_flr2') == 'apt') ? 'checked' : ''; ?>>
												Apt
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_home_apt_ste_flr2" value="ste" <?php echo (showData('information_about_you_home_apt_ste_flr2') == 'ste') ? 'checked' : ''; ?>>
												Ste
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_home_apt_ste_flr2" value="flr" <?php echo (showData('information_about_you_home_apt_ste_flr2') == 'flr') ? 'checked' : ''; ?>>
												Flr
											</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_apt_ste_flr_value2" maxlength="6" value="<?php echo showData('information_about_you_home_apt_ste_flr_value2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_city_town2" maxlength="20" value="<?php echo showData('information_about_you_home_city_town2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="information_about_you_home_state2">
												<option style="display:none" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('information_about_you_home_state2')) $selected = "selected";
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
											<input type="text" class="form-control" name="information_about_you_home_zip_code2" maxlength="5" value="<?php echo showData('information_about_you_home_zip_code2') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_province2" maxlength="20" value="<?php echo showData('information_about_you_home_province2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_postal_code2" maxlength="9" value="<?php echo showData('information_about_you_home_postal_code2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_home_country2" maxlength="29" value="<?php echo showData('information_about_you_home_country2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="information_about_you_home_residence_from_date2" value="<?= showData('information_about_you_home_residence_from_date2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="information_about_you_home_residence_to_date2" value="<?= showData('information_about_you_home_residence_to_date2') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Most Recent Address Outside Of the United States</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<!--<div class="bg-info">
									<h4><b> Most Recent Address Outside Of the United States</b></h4>
								</div>-->
							<h4><code><b>Note : </b> I-130A, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_outside_us_street_number" maxlength="29" value="<?php echo showData('information_about_you_outside_us_street_number') ?>" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-5">
											<label class="control-label">
												<input type="radio" name="information_about_you_outside_us_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_outside_us_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
												Apt
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_outside_us_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_outside_us_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
												Ste
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="information_about_you_outside_us_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_outside_us_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
												Flr
											</label>
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_outside_us_apt_ste_flr_value" maxlength="6" value="<?php echo showData('information_about_you_outside_us_apt_ste_flr_value') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_outside_us_city_town" maxlength="29" value="<?php echo showData('information_about_you_outside_us_city_town') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="information_about_you_outside_us_state">
												<option style="display:none" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('information_about_you_outside_us_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="information_about_you_outside_us_zip_code" maxlength="5" value="<?php echo showData('information_about_you_outside_us_zip_code') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_outside_us_province" maxlength="29" value="<?php echo showData('information_about_you_outside_us_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_outside_us_postal_code" maxlength="9" value="<?php echo showData('information_about_you_outside_us_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="information_about_you_outside_us_country" maxlength="29" value="<?php echo showData('information_about_you_outside_us_country') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="information_about_you_outside_us_residence_from_date" value="<?= showData('information_about_you_outside_us_residence_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="information_about_you_outside_us_residence_to_date" value="<?= showData('information_about_you_outside_us_residence_to_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 4 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Parents Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Parent 1 (Father)</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<!--<div class="bg-info">
									<h4><b>Parent 1</b></h4> 
								</div>-->
							<h4><code><b>Note : </b>I-90, I-130, I-130A, I-192, I-485, I-765 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_family_last_name" maxlength="29" value="<?php echo showData('parent1_info_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_given_first_name" maxlength="29" value="<?php echo showData('parent1_info_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_middle_name" maxlength="29" value="<?php echo showData('parent1_info_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (At Birth)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_at_birth_family_last_name" maxlength="29" value="<?php echo showData('parent1_info_at_birth_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (At Birth)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_at_birth_given_first_name" maxlength="29" value="<?php echo showData('parent1_info_at_birth_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name (At Birth) </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_at_birth_middle_name" maxlength="29" value="<?php echo showData('parent1_info_at_birth_middle_name') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="parent1_info_date_of_birth" value="<?php echo showData('parent1_info_date_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Sex</label>
										<div class="col-md-7">
											<input type="radio" name="parent1_info_gender" value="male" <?php echo (showData('parent1_info_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;

											<input type="radio" name="parent1_info_gender" value="female" <?php echo (showData('parent1_info_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_city_of_birth" maxlength="29" value="<?php echo showData('parent1_info_city_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent1_info_country_of_birth" maxlength="29" value="<?php echo showData('parent1_info_country_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Current City or Town of Residence (if living)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="parent1_info_current_city_of_residence" maxlength="29" value="<?php echo showData('parent1_info_current_city_of_residence') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Current Country of Residence (if living)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="parent1_info_current_country_of_Residence" maxlength="29" value="<?php echo showData('parent1_info_current_country_of_Residence') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Parent 2 (Mother)</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b>I-90, I-130, I-130A, I-192, I-485, I-765 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_family_last_name" maxlength="29" value="<?php echo showData('parent2_info_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_given_first_name" maxlength="29" value="<?php echo showData('parent2_info_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_middle_name" maxlength="29" value="<?php echo showData('parent2_info_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (At Birth)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_at_birth_family_last_name" maxlength="29" value="<?php echo showData('parent2_info_at_birth_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (At Birth)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_at_birth_given_first_name" maxlength="29" value="<?php echo showData('parent2_info_at_birth_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name (At Birth) </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_at_birth_middle_name" maxlength="29" value="<?php echo showData('parent2_info_at_birth_middle_name') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="parent2_info_date_of_birth" value="<?php echo showData('parent2_info_date_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Sex</label>
										<div class="col-md-7">
											<input type="radio" name="parent2_info_gender" value="male" <?php echo (showData('parent2_info_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;
											<input type="radio" name="parent2_info_gender" value="female" <?php echo (showData('parent2_info_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_city_of_birth" maxlength="29" value="<?php echo showData('parent2_info_city_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="parent2_info_country_of_birth" maxlength="29" value="<?php echo showData('parent2_info_country_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Current City or Town of Residence (if living)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="parent2_info_current_city_of_residence" maxlength="29" value="<?php echo showData('parent2_info_current_city_of_residence') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Current Country of Residence (if living)</label>
										<div class="col-md-12">
											<input type="text" class="form-control" name="parent2_info_current_country_of_Residence" maxlength="29" value="<?php echo showData('parent2_info_current_country_of_Residence') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 5 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Spouse / Children Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Current Spouse</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130, I-130A, I-192, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_family_last_name" value="<?php echo showData('current_spouse_family_last_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_given_first_name" value="<?php echo showData('current_spouse_given_first_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_family_middle_name" value="<?php echo showData('current_spouse_family_middle_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">A-Number (if any)</label>
										<div class="col-md-7">
											<input type="text" maxlength="9" class="form-control" name="current_spouse_a_number" value="<?php echo showData('current_spouse_a_number') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Current Spouse's Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7 col-md-offset-5">
											<input type="date" class="form-control" name="current_spouse_date_of_birth" value="<?php echo showData('current_spouse_date_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Date of Marriage to Current Spouse (mm/dd/yyyy)</label>
										<div class="col-md-7 col-md-offset-5">
											<input type="date" class="form-control" name="current_spouse_date_of_marriage" value="<?php echo showData('current_spouse_date_of_marriage') ?>">
										</div>
									</div>
									<div class="well well-sm">Current Spouse's Place of Birth</div>

									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_birth_place_city_town" value="<?php echo showData('current_spouse_birth_place_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State or Province</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_birth_place_province" value="<?php echo showData('current_spouse_birth_place_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_birth_place_country" value="<?php echo showData('current_spouse_birth_place_country') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="well well-sm">Place of Marriage to Current Spouse</div>

									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_marriage_place_city_town" value="<?php echo showData('current_spouse_marriage_place_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State or Province</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_marriage_place_province" value="<?php echo showData('current_spouse_marriage_place_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="current_spouse_marriage_place_country" value="<?php echo showData('current_spouse_marriage_place_country') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Is your current spouse applying with you?</label>
										<div class="col-md-7 col-md-offset-5">
											<?php echo createRadio("current_spouse_apply_with_you") ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">If you are married, is your spouse a current member of the US armed forces or US Coast Guard?</label>
										<div class="col-md-7 col-md-offset-5">
											<?php echo createRadio("current_spouse_us_armed_force") ?>
										</div>
									</div>

									<div class="well well-sm">Spouse/ Beneficiary's Contact Information</div>

									<div class="form-group">
										<label class="control-label col-md-12">Spouse Beneficiary's Daytime Telephone Number</label>
										<div class="col-md-7 col-md-offset-5">
											<input type="text" class="form-control" name="current_spouse_daytime_tel" maxlength="15" value="<?php echo showData('current_spouse_daytime_tel') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Spouse Beneficiary's Mobile Telephone Number (if any)</label>
										<div class="col-md-7 col-md-offset-5">
											<input type="text" class="form-control" name="current_spouse_mobile" maxlength="15" value="<?php echo showData('current_spouse_mobile') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Spouse Beneficiary's Email Address (if any)</label>
										<div class="col-md-7 col-md-offset-5">
											<input type="email" class="form-control" name="current_spouse_email" maxlength="36" value="<?php echo showData('current_spouse_email') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Prior Spouse 1</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b>I-130, I-192, I-485</code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_family_last_name" value="<?php echo showData('prior_spouse1_family_last_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_given_first_name" value="<?php echo showData('prior_spouse1_given_first_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_middle_name" value="<?php echo showData('prior_spouse1_middle_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Prior Spouse's Date of Birth:</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="prior_spouse1_date_of_birth" value="<?php echo showData('prior_spouse1_date_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Marriage to Prior Spouse:</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="prior_spouse1_date_of_marriage" value="<?php echo showData('prior_spouse1_date_of_marriage') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="well well-sm">Place of Marriage to Prior Spouse</div>

									<div class="form-group">
										<label class="control-label col-md-5">City or Town:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_marriage_place_city_town" value="<?php echo showData('prior_spouse1_marriage_place_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State or Province:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_marriage_place_province" value="<?php echo showData('prior_spouse1_marriage_place_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_marriage_place_country" value="<?php echo showData('prior_spouse1_marriage_place_country') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date Marriage with Prior Spouse Legally Ended:</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="prior_spouse1_marriage_end_date" value="<?php echo showData('prior_spouse1_marriage_end_date') ?>">
										</div>
									</div>
									<div class="well well-sm">Place Where Marriage with Prior Spouse Legally Ended</div>

									<div class="form-group">
										<label class="control-label col-md-5">City or Town:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_marriage_end_city_town" value="<?php echo showData('prior_spouse1_marriage_end_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State or Province:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_marriage_end_province" value="<?php echo showData('prior_spouse1_marriage_end_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse1_marriage_end_country" value="<?php echo showData('prior_spouse1_marriage_end_country') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Prior Spouse 2</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
					
							<h4><code><b>Note : </b>I-130</code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse2_family_last_name" value="<?php echo showData('prior_spouse2_family_last_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse2_given_first_name" value="<?php echo showData('prior_spouse2_given_first_name') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="prior_spouse2_middle_name" value="<?php echo showData('prior_spouse2_middle_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date Marriage Ended (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="prior_spouse2_marriage_end_date" value="<?php echo showData('prior_spouse2_marriage_end_date') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Spouse or children 01</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
						
							<h4><code><b>Note : </b>I-130, I-918, I-918A </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children1_family_last_name" maxlength="29" value="<?php echo showData('spouse_children1_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children1_given_first_name" maxlength="29" value="<?php echo showData('spouse_children1_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children1_middle_name" maxlength="29" value="<?php echo showData('spouse_children1_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="spouse_children1_date_of_birth" value="<?php echo showData('spouse_children1_date_of_birth') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children1_country_of_birth" maxlength="36" value="<?php echo showData('spouse_children1_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Relationship</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children1_relationship" maxlength="36" value="<?php echo showData('spouse_children1_relationship') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Current Location</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children1_current_location" maxlength="36" value="<?php echo showData('spouse_children1_current_location') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Spouse or children 02</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
				
							<h4><code><b>Note : </b>I-130, I-918, I-918A </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children2_family_last_name" maxlength="29" value="<?php echo showData('spouse_children2_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children2_given_first_name" maxlength="29" value="<?php echo showData('spouse_children2_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children2_middle_name" maxlength="29" value="<?php echo showData('spouse_children2_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="spouse_children2_date_of_birth" value="<?php echo showData('spouse_children2_date_of_birth') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children2_country_of_birth" maxlength="36" value="<?php echo showData('spouse_children2_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Relationship</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children2_relationship" maxlength="36" value="<?php echo showData('spouse_children2_relationship') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Current Location</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children2_current_location" maxlength="36" value="<?php echo showData('spouse_children2_current_location') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Spouse or children 03</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							
							<h4><code><b>Note : </b>I-130, I-918, I-918A </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children3_family_last_name" maxlength="29" value="<?php echo showData('spouse_children3_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children3_given_first_name" maxlength="29" value="<?php echo showData('spouse_children3_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children3_middle_name" maxlength="29" value="<?php echo showData('spouse_children3_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="spouse_children3_date_of_birth" value="<?php echo showData('spouse_children3_date_of_birth') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children3_country_of_birth" maxlength="36" value="<?php echo showData('spouse_children3_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Relationship</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children3_relationship" maxlength="36" value="<?php echo showData('spouse_children3_relationship') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Current Location</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children3_current_location" maxlength="36" value="<?php echo showData('spouse_children3_current_location') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Spouse or children 04</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							
							<h4><code><b>Note : </b>I-130, I-918 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children4_family_last_name" maxlength="29" value="<?php echo showData('spouse_children4_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children4_given_first_name" maxlength="29" value="<?php echo showData('spouse_children4_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children4_middle_name" maxlength="29" value="<?php echo showData('spouse_children4_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="spouse_children4_date_of_birth" value="<?php echo showData('spouse_children4_date_of_birth') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children4_country_of_birth" maxlength="36" value="<?php echo showData('spouse_children4_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Relationship</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children4_relationship" maxlength="36" value="<?php echo showData('spouse_children4_relationship') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Current Location</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children4_current_location" maxlength="36" value="<?php echo showData('spouse_children4_current_location') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>pouse or children 05</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b>I-130, I-918</code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children5_family_last_name" maxlength="29" value="<?php echo showData('spouse_children5_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name)</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children5_given_first_name" maxlength="29" value="<?php echo showData('spouse_children5_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children5_middle_name" maxlength="29" value="<?php echo showData('spouse_children5_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="spouse_children5_date_of_birth" value="<?php echo showData('spouse_children5_date_of_birth') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children5_country_of_birth" maxlength="36" value="<?php echo showData('spouse_children5_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Relationship</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children5_relationship" maxlength="36" value="<?php echo showData('spouse_children5_relationship') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Current Location</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="spouse_children5_current_location" maxlength="36" value="<?php echo showData('spouse_children5_current_location') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Spouse or children (Other)</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-485 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-9">Indicate the total number of all living children (including adult sons and daughters) that you have</label>
								<div class="col-md-3">
									<input type="number" class="form-control" name="total_number_of_all_children" maxlength="5" value="<?php echo showData('total_number_of_all_children') ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Child 1</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">

							<h4><code><b>Note : </b>I-130, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child1_family_last_name" value="<?php echo showData('child1_family_last_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child1_given_first_name" value="<?php echo showData('child1_given_first_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child1_middle_name" value="<?php echo showData('child1_middle_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">A-Number (if any):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child1_a_number" value="<?php echo showData('child1_a_number') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy):</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="child1_date_of_birth" value="<?php echo showData('child1_date_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child1_country_of_birth" value="<?php echo showData('child1_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Is this child applying with you?</label>
										<div class="col-md-7">
											<?php echo createRadio("child1_applying_with_you") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Child 2</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							
							<h4><code><b>Note : </b>I-130, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child2_family_last_name" value="<?php echo showData('child2_family_last_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child2_given_first_name" value="<?php echo showData('child2_given_first_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child2_middle_name" value="<?php echo showData('child2_middle_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">A-Number (if any):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child2_a_number" value="<?php echo showData('child2_a_number') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy):</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="child2_date_of_birth" value="<?php echo showData('child2_date_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child2_country_of_birth" value="<?php echo showData('child2_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Is this child applying with you?</label>
										<div class="col-md-7">
											<?php echo createRadio("child2_applying_with_you") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Child 3</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							
							<h4><code><b>Note : </b>I-130, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Family Name (Last Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child3_family_last_name" value="<?php echo showData('child3_family_last_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Given Name (First Name):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child3_given_first_name" value="<?php echo showData('child3_given_first_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Middle Name:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child3_middle_name" value="<?php echo showData('child3_middle_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">A-Number (if any):</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child3_a_number" value="<?php echo showData('child3_a_number') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy):</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="child3_date_of_birth" value="<?php echo showData('child3_date_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth:</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="child3_country_of_birth" value="<?php echo showData('child3_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Is this child applying with you?</label>
										<div class="col-md-7">
											<?php echo createRadio("child3_applying_with_you") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 6 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Employment Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Employer 1</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130A, I-192, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Name of Employer or Company</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer1_name" maxlength="29" value="<?php echo showData('employer1_name') ?>" />
										</div>
									</div>
									<p>Address of Employer or Company</p>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer1_address" maxlength="28" value="<?php echo showData('employer1_address') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="employer1_apt_ste_flr" value="apt" <?php echo (showData('employer1_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
											<input type="radio" name="employer1_apt_ste_flr" value="ste" <?php echo (showData('employer1_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
											<input type="radio" name="employer1_apt_ste_flr" value="flr" <?php echo (showData('employer1_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer1_apt_ste_flr_value" maxlength="6" value="<?php echo showData('employer1_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer1_city_town" maxlength="20" value="<?= showData('employer1_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="employer1_state">
												<option style="" value="">Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('employer1_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="employer1_zip_code" maxlength="5" value="<?php echo showData('employer1_zip_code') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer1_province" value="<?php echo showData('employer1_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer1_postal_code" value="<?php echo showData('employer1_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer1_country" value="<?php echo showData('employer1_country') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Your Occupation</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer1_occupation" value="<?php echo showData('employer1_occupation') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="employer1_from_date" value="<?= showData('employer1_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="employer1_to_date" value="<?= showData('employer1_to_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Employer 2</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130A, I-192, I-485 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Name of Employer or Company</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer2_name" value="<?php echo showData('employer2_name') ?>" />
										</div>
									</div>
									<p>Address of Employer or Company</p>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_address" maxlength="28" value="<?php echo showData('employer2_address') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="employer2_apt_ste_flr" value="apt" <?php echo (showData('employer2_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
											<input type="radio" name="employer2_apt_ste_flr" value="ste" <?php echo (showData('employer2_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
											<input type="radio" name="employer2_apt_ste_flr" value="flr" <?php echo (showData('employer2_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_apt_ste_flr_value" maxlength="6" value="<?php echo showData('employer2_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_city_town" maxlength="20" value="<?= showData('employer2_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="employer2_state">
												<option style="" value="">Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('employer2_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="employer2_zip_code" maxlength="5" value="<?php echo showData('employer2_zip_code') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_province" maxlength="29" value="<?php echo showData('employer2_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_postal_code" maxlength="29" value="<?php echo showData('employer2_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_country" maxlength="29" value="<?php echo showData('employer2_country') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Your Occupation</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer2_occupation" maxlength="29" value="<?php echo showData('employer2_occupation') ?>" />
										</div>
									</div>
									<p>Dates of Employment</p>
									<div class="form-group">
										<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="employer2_from_date" value="<?= showData('employer2_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="employer2_to_date" value="<?= showData('employer2_to_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Provide your most recent employment outside of the United States</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">									
									<h4><code><b>Note : </b>I-130, I-130A, I-485 </code></h4>
									<div class="form-group">
										<label class="control-label col-md-5">Name of Employer or Company</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer_outside_us_name" value="<?php echo showData('employer_outside_us_name') ?>" />
										</div>
									</div>
									<p>Address of Employer or Company</p>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer_outside_us_street_number" maxlength="28" value="<?php echo showData('employer_outside_us_street_number') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="employer_outside_us_apt_ste_flr" value="apt" <?php echo (showData('employer_outside_us_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
											<input type="radio" name="employer_outside_us_apt_ste_flr" value="ste" <?php echo (showData('employer_outside_us_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
											<input type="radio" name="employer_outside_us_apt_ste_flr" value="flr" <?php echo (showData('employer_outside_us_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>> Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer_outside_us_apt_ste_flr_value" maxlength="6" value="<?php echo showData('employer_outside_us_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="employer_outside_us_city_town" maxlength="20" value="<?= showData('employer_outside_us_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="employer_outside_us_state">
												<option style="" value="">Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('employer_outside_us_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="employer_outside_us_zip_code" maxlength="5" value="<?php echo showData('employer_outside_us_zip_code') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer_outside_us_province" value="<?php echo showData('employer_outside_us_province') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer_outside_us_postal_code" value="<?php echo showData('employer_outside_us_postal_code') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer_outside_us_country" value="<?php echo showData('employer_outside_us_country') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Your Occupation</label>
										<div class="col-md-7">
											<input type="text" maxlength="29" class="form-control" name="employer_outside_us_occupation" value="<?php echo showData('employer_outside_us_occupation') ?>" />
										</div>
									</div>
									<p>Dates of Employment</p>
									<div class="form-group">
										<label class="control-label col-md-5">From (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="employer_outside_us_from_date" value="<?= showData('employer_outside_us_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">To (mm/dd/yyyy)</label>
										<div class="col-md-7 ">
											<input type="date" class="form-control" name="employer_outside_us_to_date" value="<?= showData('employer_outside_us_to_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 7--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 7 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Petitioner Information</b></h4>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Petitioner Full Name</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130, I-290B </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Family Name(Last Name)</label>
								<div class="col-md-7">
									<input type="text" maxlength="29" class="form-control" name="petitioner_family_last_name" value="<?php echo showData('petitioner_family_last_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Given Name(First Name)</label>
								<div class="col-md-7">
									<input type="text" maxlength="29" class="form-control" name="petitioner_given_first_name" value="<?php echo showData('petitioner_given_first_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Middle Name</label>
								<div class="col-md-7">
									<input type="text" maxlength="29" class="form-control" name="petitioner_middle_name" value="<?php echo showData('petitioner_middle_name') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Other Name</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130 </code></h4>
							<div class="form-group">
								<label class="control-label col-md-5">Family Name(Last Name)</label>
								<div class="col-md-7">
									<input type="text" maxlength="29" class="form-control" name="petitioner_other_family_last_name" value="<?php echo showData('petitioner_other_family_last_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Given Name(First Name)</label>
								<div class="col-md-7">
									<input type="text" maxlength="29" class="form-control" name="petitioner_other_given_first_name" value="<?php echo showData('petitioner_other_given_first_name') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-5">Middle Name</label>
								<div class="col-md-7">
									<input type="text" maxlength="29" class="form-control" name="petitioner_other_middle_name" value="<?php echo showData('petitioner_other_middle_name') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Other Information</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130, I-290B </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">City/Town/Village of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" maxlength="29" name="petitioner_city_of_birth" value="<?= showData('petitioner_city_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country of Birth</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_country_of_birth" maxlength="39" value="<?= showData('petitioner_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_date_of_birth" value="<?= showData('petitioner_date_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Sex</label>
										<div class="col-md-6">
											<div class="control-label">
												<input type="radio" name="petitioner_gender" value="male" <?php echo (showData('petitioner_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;
												<input type="radio" name="petitioner_gender" value="female" <?php echo (showData('petitioner_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-6">Alien Registration Number (A-Number)</label>
										<div class="col-md-6">
											<div class="d-flexible">
												<input type="text" class="form-control" maxlength="9" name="petitioner_alien_registration_number" value="<?php echo showData('petitioner_alien_registration_number') ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">USCIS Online Account Number (if any)</label>
										<div class="col-md-6">
											<div class="d-flexible">
												<input type="text" class="form-control" name="petitioner_uscis_online_account_number" maxlength="12" value="<?php echo showData('petitioner_uscis_online_account_number') ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">U.S. Social Security Number (if any)</label>
										<div class="col-md-6">
											<div class="d-flexible">
												<input type="text" class="form-control" name="petitioner_social_security_number" maxlength="12" value="<?php echo showData('petitioner_social_security_number') ?>">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Mailing Address</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130, I-290B </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">In Care Of Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_care_of_name" maxlength="39" value="<?php echo showData('petitioner_us_mailing_care_of_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_street_number" maxlength="28" value="<?php echo showData('petitioner_us_mailing_street_number') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="apt" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
											Apt. &nbsp;
											<input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="ste" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
											Ste. &nbsp;
											<input type="radio" name="petitioner_us_mailing_apt_ste_flr" value="flr" <?php echo (showData('petitioner_us_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
											Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" type="text" class="form-control" name="petitioner_us_mailing_apt_ste_flr_value" maxlength="6" value="<?php echo showData('petitioner_us_mailing_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_city_town" maxlength="20" value="<?php echo showData('petitioner_us_mailing_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_us_mailing_state">
												<option style="" value=''>Select</option>
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
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">ZIP Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_zip_code" maxlength="5" value="<?php echo showData('petitioner_us_mailing_zip_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_province" maxlength="20" value="<?php echo showData('petitioner_us_mailing_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_postal_code" maxlength="9" value="<?php echo showData('petitioner_us_mailing_postal_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_us_mailing_country" maxlength="39" value="<?php echo showData('petitioner_us_mailing_country') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Address History</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="well well-sm">Physical Address 1</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_street_number" maxlength="25" value="<?php echo showData('petitioner_home_street_number') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="petitioner_home_apt_ste_flr" value="apt" <?php echo (showData('petitioner_home_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
											Apt. &nbsp;
											<input type="radio" name="petitioner_home_apt_ste_flr" value="ste" <?php echo (showData('petitioner_home_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
											Ste. &nbsp;
											<input type="radio" name="petitioner_home_apt_ste_flr" value="flr" <?php echo (showData('petitioner_home_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
											Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" type="text" class="form-control" name="petitioner_home_apt_ste_flr_value" maxlength="6" value="<?php echo showData('petitioner_home_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_city_town" maxlength="20" value="<?php echo showData('petitioner_home_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_home_state">
												<option style="" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('petitioner_home_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="petitioner_home_zip_code" maxlength="5" value="<?php echo showData('petitioner_home_zip_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_province" maxlength="20" value="<?php echo showData('petitioner_home_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_postal_code" maxlength="9" value="<?php echo showData('petitioner_home_postal_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_country" maxlength="39" value="<?php echo showData('petitioner_home_country') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date From (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_home_residence_from_date" value="<?= showData('petitioner_home_residence_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date To (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_home_residence_to_date" value="<?= showData('petitioner_home_residence_to_date') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="well well-sm">Physical Address 2</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_street_number2" maxlength="25" value="<?php echo showData('petitioner_home_street_number2') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b> </b> &nbsp;
											<input type="radio" name="petitioner_home_apt_ste_flr2" value="apt" <?php echo (showData('petitioner_home_apt_ste_flr2') == 'apt') ? 'checked' : ''; ?>>
											Apt. &nbsp;
											<input type="radio" name="petitioner_home_apt_ste_flr2" value="ste" <?php echo (showData('petitioner_home_apt_ste_flr2') == 'ste') ? 'checked' : ''; ?>>
											Ste. &nbsp;
											<input type="radio" name="petitioner_home_apt_ste_flr2" value="flr" <?php echo (showData('petitioner_home_apt_ste_flr2') == 'flr') ? 'checked' : ''; ?>>
											Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" type="text" class="form-control" name="petitioner_home_apt_ste_flr_value2" maxlength="6" value="<?php echo showData('petitioner_home_apt_ste_flr_value2') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_city_town2" maxlength="20" value="<?php echo showData('petitioner_home_city_town2') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_home_state2">
												<option style="" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('petitioner_home_state2')) $selected = "selected";
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
											<input type="text" class="form-control" name="petitioner_home_zip_code2" maxlength="5" value="<?php echo showData('petitioner_home_zip_code2') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_province2" maxlength="20" value="<?php echo showData('petitioner_home_province2') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_postal_code2" maxlength="9" value="<?php echo showData('petitioner_home_postal_code2') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_home_country2" maxlength="39" value="<?php echo showData('petitioner_home_country2') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date From (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_home_residence_from_date2" value="<?= showData('petitioner_home_residence_from_date2') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date To (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_home_residence_to_date2" value="<?= showData('petitioner_home_residence_to_date2') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Marital Information</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-7">How many times have you been married?</label>
										<div class="col-md-5">
											<div class="d-flexible">
												<input type="text" class="form-control" name="petitioner_total_married" maxlength="5" value="<?= showData('petitioner_total_married') ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12"><b>Current Marital Status</b></label>
										<div class="col-md-10 col-md-offset-2">
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="single" <?php echo (showData('petitioner_marital_status') == 'single') ? 'checked' : ''; ?>> Single, Never Married
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="married" <?php echo (showData('petitioner_marital_status') == 'married') ? 'checked' : ''; ?>> Married
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="divorced" <?php echo (showData('petitioner_marital_status') == 'divorced') ? 'checked' : ''; ?>> Divorced
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="widowed" <?php echo (showData('petitioner_marital_status') == 'widowed') ? 'checked' : ''; ?>> Widowed
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="legally_separated" <?php echo (showData('petitioner_marital_status') == 'legally_separated') ? 'checked' : ''; ?>> Legally Separated
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="marriage_annulled" <?php echo (showData('petitioner_marital_status') == 'marriage_annulled') ? 'checked' : ''; ?>> Marriage Annulled
											</label>
											&nbsp;
											<label class="control-label">
												<input type="radio" name="petitioner_marital_status" value="other" <?php echo (showData('petitioner_marital_status') == 'other') ? 'checked' : ''; ?>> Other
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Date of Current Marriage (if currently married) (mm/dd/yyyy)</label>
										<div class="col-md-7 col-md-offset-5">
											<input type="date" class="form-control" name="petitioner_current_spouse_date_of_marriage" value="<?php echo showData('petitioner_current_spouse_date_of_marriage') ?>" />
										</div>
									</div>
									<div class="well well-sm">Place of Your Current Marriage (if married)</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_current_spouse_marriage_place_city_town" maxlength="20" value="<?php echo showData('petitioner_current_spouse_marriage_place_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_current_spouse_marriage_place_state">
												<option style="" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('petitioner_current_spouse_marriage_place_state')) $selected = "selected";
													else $selected = "";
													echo "<option value='$record->state_code' $selected>$record->state_code</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_current_spouse_marriage_place_province" maxlength="5" value="<?php echo showData('petitioner_current_spouse_marriage_place_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_current_spouse_marriage_place_country" maxlength="20" value="<?php echo showData('petitioner_current_spouse_marriage_place_country') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<p>Names of All Your Spouses (if any)</p>
									<div class="well well-sm">Spouse 1</div>
									<div class="form-group">
										<label class="control-label col-md-6">Family Name(Last Name) </label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse1_family_last_name" value="<?php echo showData('petitioner_prior_spouse1_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Given Name(First Name) </label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse1_given_first_name" value="<?php echo showData('petitioner_prior_spouse1_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Middle Name </label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse1_middle_name" value="<?php echo showData('petitioner_prior_spouse1_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Date Marriage Ended (mm/dd/yyyy)</label>
										<div class="col-md-6">
											<input type="date" class="form-control" name="petitioner_prior_spouse1_marriage_end_date" value="<?= showData('petitioner_prior_spouse1_marriage_end_date') ?>" />
										</div>
									</div>
									<div class="well well-sm">Spouse 2</div>
									<div class="form-group">
										<label class="control-label col-md-6">Family Name(Last Name) </label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse2_family_last_name" value="<?php echo showData('petitioner_prior_spouse2_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Given Name(First Name) </label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse2_given_first_name" value="<?php echo showData('petitioner_prior_spouse2_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Middle Name </label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_prior_spouse2_middle_name" value="<?php echo showData('petitioner_prior_spouse2_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Date Marriage Ended (mm/dd/yyyy)</label>
										<div class="col-md-6">
											<input type="date" class="form-control" name="petitioner_prior_spouse2_marriage_end_date" value="<?= showData('petitioner_prior_spouse2_marriage_end_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Parents Information</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="well well-sm">Parent 1</div>
									<div class="form-group">
										<label class="control-label col-md-6">Family Name(Last Name)</label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_parent1_info_family_last_name" value="<?php echo showData('petitioner_parent1_info_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Given Name(First Name)</label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_parent1_info_given_first_name" value="<?php echo showData('petitioner_parent1_info_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Middle Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_parent1_info_middle_name" value="<?php echo showData('petitioner_parent1_info_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-6">
											<input type="date" class="form-control" name="petitioner_parent1_info_date_of_birth" value="<?= showData('petitioner_parent1_info_date_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Sex</label>
										<div class="col-md-6">
											<input type="radio" name="petitioner_parent1_info_gender" value="male" <?php echo (showData('petitioner_parent1_info_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;
											<input type="radio" name="petitioner_parent1_info_gender" value="female" <?php echo (showData('petitioner_parent1_info_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Country of Birth</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent1_info_country_of_birth" maxlength="20" value="<?php echo showData('petitioner_parent1_info_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">City/Town/Village of Residence</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent1_info_city_of_residence" maxlength="20" value="<?php echo showData('petitioner_parent1_info_city_of_residence') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Country of Residence</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent1_info_country_of_Residence" maxlength="20" value="<?php echo showData('petitioner_parent1_info_country_of_Residence') ?>">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="well well-sm">Parent 2</div>
									<div class="form-group">
										<label class="control-label col-md-6">Family Name(Last Name)</label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_parent2_info_family_last_name" value="<?php echo showData('petitioner_parent2_info_family_last_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Given Name(First Name)</label>
										<div class="col-md-6">
											<input type="text" class="form-control" maxlength="29" name="petitioner_parent2_info_given_first_name" value="<?php echo showData('petitioner_parent2_info_given_first_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Middle Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent2_info_middle_name" value="<?php echo showData('petitioner_parent2_info_middle_name') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Date of Birth (mm/dd/yyyy)</label>
										<div class="col-md-6 ">
											<input type="date" class="form-control" name="petitioner_parent2_info_date_of_birth" value="<?= showData('petitioner_parent2_info_date_of_birth') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Sex</label>
										<div class="col-md-6">
											<input type="radio" name="petitioner_parent2_info_gender" value="male" <?php echo (showData('petitioner_parent2_info_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;
											<input type="radio" name="petitioner_parent2_info_gender" value="female" <?php echo (showData('petitioner_parent2_info_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Country of Birth</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent2_info_country_of_birth" maxlength="20" value="<?php echo showData('petitioner_parent2_info_country_of_birth') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">City/Town/Village of Residence</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent2_info_city_of_residence" maxlength="20" value="<?php echo showData('petitioner_parent2_info_city_of_residence') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Country of Residence</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_parent2_info_country_of_Residence" maxlength="20" value="<?php echo showData('petitioner_parent2_info_country_of_Residence') ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Additional Information</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div style="padding-bottom:10px;">
										<p><b>I am a (Select only one box):</b></p>
										<label class="control-label">
											<input type="radio" name="petitioner_residence_status" value="us_citizen" <?php echo (showData('petitioner_residence_status') == 'us_citizen') ? 'checked' : '' ?>> U.S citizen &nbsp;
										</label>
										<label class="control-label">
											<input type="radio" name="petitioner_residence_status" value="lawful_residence" <?php echo (showData('petitioner_residence_status') == 'lawful_residence') ? 'checked' : '' ?>> Lawful Permanent Resident &nbsp;
										</label>
									</div>
									<p><b>If you are a U.S. citizen, complete Item</b></p>
									<div style="padding-bottom:10px;">
										<p><b>My citizenship was acquired through (Select only one box):</b></p>
										<label class="control-label">
											<input type="radio" name="petitioner_citizenship_acquired_status" value="birth" <?php echo (showData('petitioner_citizenship_acquired_status') == 'birth') ? 'checked' : '' ?>> Birth in the United States &nbsp;
										</label>
										<label class="control-label">
											<input type="radio" name="petitioner_citizenship_acquired_status" value="naturalization" <?php echo (showData('petitioner_citizenship_acquired_status') == 'naturalization') ? 'checked' : '' ?>> Naturalization &nbsp;
										</label>

										<label class="control-label">
											<input type="radio" name="petitioner_citizenship_acquired_status" value="parent" <?php echo (showData('petitioner_citizenship_acquired_status') == 'parent') ? 'checked' : '' ?>> Parents &nbsp;
										</label>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Have you obtained a Certificate of Naturalization or a Certificate of Citizenship?</label>
										<div class="col-md-offset-5">
											<?php echo createRadio("petitioner_citizenship_certificate") ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Certificate Number</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_citizenship_certificate_number" maxlength="29" value="<?php echo showData('petitioner_citizenship_certificate_number') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Place of Issuance</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="petitioner_citizenship_place_of_issuance" maxlength="29" value="<?php echo showData('petitioner_citizenship_place_of_issuance') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-6">Date of Issuance (mm/dd/yyyy)</label>
										<div class="col-md-6">
											<input type="date" class="form-control" name="petitioner_citizenship_date_of_issuance" value="<?= showData('petitioner_citizenship_date_of_issuance') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label col-md-5">Class of Admission</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_class_of_admission" maxlength="39" value="<?php echo showData('petitioner_class_of_admission') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date of Admission (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_date_of_admission" value="<?= showData('petitioner_date_of_admission') ?>" />
										</div>
									</div>
									<div class="well well-sm">Place of Admission</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_place_of_admission_city_town" maxlength="39" value="<?php echo showData('petitioner_place_of_admission_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_place_of_admission_state">
												<option style="" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('petitioner_place_of_admission_state')) $selected = "selected";
													else $selected = "";
													echo "<option value='$record->state_code' $selected>$record->state_code</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-12">Did you gain lawful permanent resident status through marriage to a U.S. citizen or lawful permanent resident?</label>
										<div class="col-md-5 col-md-offset-3">
											<?php echo createRadio("petitioner_gain_lawful_permanent_resident_status") ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Employment History</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130 </code></h4>
							<div class="row">
								<div class="col-md-6">
									<div class="well well-sm">Employer 1</div>
									<div class="form-group">
										<label class="control-label col-md-5">Name of Employer/Company</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_name" maxlength="39" value="<?php echo showData('petitioner_employer1_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_street_number" maxlength="25" value="<?php echo showData('petitioner_employer1_street_number') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="petitioner_employer1_apt_ste_flr" value="apt" <?php echo (showData('petitioner_employer1_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
											Apt. &nbsp;
											<input type="radio" name="petitioner_employer1_apt_ste_flr" value="ste" <?php echo (showData('petitioner_employer1_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
											Ste. &nbsp;
											<input type="radio" name="petitioner_employer1_apt_ste_flr" value="flr" <?php echo (showData('petitioner_employer1_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
											Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" type="text" class="form-control" name="petitioner_employer1_apt_ste_flr_value" maxlength="6" value="<?php echo showData('petitioner_employer1_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_city_town" maxlength="20" value="<?php echo showData('petitioner_employer1_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_employer1_state">
												<option style="" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('petitioner_employer1_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="petitioner_employer1_zip_code" maxlength="5" value="<?php echo showData('petitioner_employer1_zip_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_province" maxlength="20" value="<?php echo showData('petitioner_employer1_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_postal_code" maxlength="9" value="<?php echo showData('petitioner_employer1_postal_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_country" maxlength="39" value="<?php echo showData('petitioner_employer1_country') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Your Occupation</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer1_occupation" maxlength="39" value="<?php echo showData('petitioner_employer1_occupation') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date From (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_employer1_from_date" value="<?= showData('employer1_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date To (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_employer1_to_date" value="<?= showData('petitioner_employer1_to_date') ?>" />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="well well-sm">Employer 2</div>
									<div class="form-group">
										<label class="control-label col-md-5">Name of Employer/Company</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_name" maxlength="39" value="<?php echo showData('petitioner_employer2_name') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Street Number and Name</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_address" maxlength="25" value="<?php echo showData('petitioner_employer2_address') ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="control-label col-md-5"><b></b> &nbsp;
											<input type="radio" name="petitioner_employer2_apt_ste_flr" value="apt" <?php echo (showData('petitioner_employer2_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
											Apt. &nbsp;
											<input type="radio" name="petitioner_employer2_apt_ste_flr" value="ste" <?php echo (showData('petitioner_employer2_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
											Ste. &nbsp;
											<input type="radio" name="petitioner_employer2_apt_ste_flr" value="flr" <?php echo (showData('petitioner_employer2_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
											Flr.:
										</div>
										<div class="col-md-7">
											<input type="text" class="form-control" type="text" class="form-control" name="petitioner_employer2_apt_ste_flr_value" maxlength="6" value="<?php echo showData('petitioner_employer2_apt_ste_flr_value') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">City or Town</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_city_town" maxlength="20" value="<?php echo showData('petitioner_employer2_city_town') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">State</label>
										<div class="col-md-7">
											<select class="form-control" name="petitioner_employer2_state">
												<option style="" value=''>Select</option>
												<?php
												foreach ($allDataCountry as $record) {
													if ($record->state_code == showData('petitioner_employer2_state')) $selected = "selected";
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
											<input type="text" class="form-control" name="petitioner_employer2_zip_code" maxlength="5" value="<?php echo showData('petitioner_employer2_zip_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Province</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_province" maxlength="20" value="<?php echo showData('petitioner_employer2_province') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Postal Code</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_postal_code" maxlength="9" value="<?php echo showData('petitioner_employer2_postal_code') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Country</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_country" maxlength="39" value="<?php echo showData('petitioner_employer2_country') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Your Occupation</label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="petitioner_employer2_occupation" maxlength="39" value="<?php echo showData('petitioner_employer2_occupation') ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date From (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_employer2_from_date" value="<?= showData('petitioner_employer2_from_date') ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-5">Date To (mm/dd/yyyy)</label>
										<div class="col-md-7">
											<input type="date" class="form-control" name="petitioner_employer2_to_date" value="<?= showData('petitioner_employer2_to_date') ?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<p><b>Contact Information</b></p>
						</h4>
					</div>
					<div>
						<div class="panel-body">
							<h4><code><b>Note : </b> I-130, I-290B </code></h4>
							<div class="form-group">
								<label class="control-label col-md-6">Petitioner's Daytime Telephone Number </label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="petitioner_daytime_tel" maxlength="15" value="<?php echo showData('petitioner_daytime_tel') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-6">Petitioner's Mobile Telephone Number (if any)
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="petitioner_mobile" maxlength="15" value="<?php echo showData('petitioner_mobile') ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-6">Petitioner's Email Address (if any)</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="petitioner_email" maxlength="39" value="<?php echo showData('petitioner_email') ?>" />
								</div>
							</div>
						</div>
					</div>
				</div><!-- child pannel end  -->

			</div> <!-- parent pannel end  -->
		</div>
	</div>
	<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
	<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
	<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 8--------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
	<div class="panel-info">
		<div class="panel-body">
			<p class="title"><b>Page 8 of 8</b></p>
			<div class="panel-group">
				<div class="heading mb-5 col-md-12">
					<h4><b>Attorney Information</b></h4>
				</div>
				<h4><code><b>Note : </b> G-28, I-130, I-130A, I-192, I-485, I-765, I-918, I-918A </code></h4>
				<div class="row">
					<div class="col-md-4">
						<label class="control-label" for="attorney">Volag Number:</label><br>
						<input type="text" class="form-control" value="<?php echo $attorneyData->volag_number ?>" disabled="">
					</div>
					<div class="col-md-4">
						<label class="control-label">Attorney State Bar Number:</label><br>
						<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number ?>" disabled="">
					</div>
					<div class="col-md-4">
						<label class="control-label">Attorney USCIS Online Account Number:</label><br>
						<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number ?>" disabled="">
					</div>
				</div>
			</div>
		</div>
		<input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px" />
		<input type="submit" name="submit" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>


<?php include "intake_footer.php" ?>