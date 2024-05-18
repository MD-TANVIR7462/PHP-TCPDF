<?php
$meta_title 	=   "INTAKE FOR FORM I-485";
$page_heading 	=   "Application to Register Permanent Residence or Adjust Status";
include "intake_header.php";
?>




<!----------------------------------------------------------------------
-------------------------------- page 5 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 5 of 20</p>
        </b>
    </div>
   
    <div class="row  mt-3 border-add">
        <div class="col-md-6 container border-add ">
            <div class="bg-info">
                <h4><b>Part 3. Additional Information About You(Continued)</b></h4>
            </div>
            <div class="bg-info">
                <h4><b>Address History</b></h4>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Provide physical addresses for everywhere you have lived
                during the last five years, whether inside or outside the United
                States. Provide your current address first. If you need extra
                space to complete this section, use the space provided in</span>
            </p>
            <p><b>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Part 14. Additional Information.</span>
                </b>
            </p>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Physical Address 1 (current address)</span>
            </p>
            <div>
                
                 <div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>5.b. </b> &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_apt_ste_flr_number" maxlength="6"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_you_qualifying_family_member_city_town"maxlength="20" value="<?= showData('information_about_you_qualifying_family_member_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_qualifying_family_member_state">
                            <option style="" value="">Select</option>
							<?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('information_about_you_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_zip_code" maxlength="5"
                            value="<?php echo showData('information_about_your_qualifying_family_member_zip_code')?>">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">5.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Residence</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">6.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">6.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <hr>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Physical Address 2.</span>
            </p>
            
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">7.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                    
            </div>
            <div class="form-group">
                    <div class="control-label col-md-6"><b>7.b. </b> &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_apt_ste_flr_number" maxlength="6"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')?>">
                    </div>
            </div>

            <div class="form-group">
                    <label class="control-label col-md-5">7.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_you_qualifying_family_member_city_town"maxlength="20" value="<?= showData('information_about_you_qualifying_family_member_city_town')?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5">7.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_qualifying_family_member_state">
                            <option style="" value="">Select</option>
							<?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('information_about_you_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">7.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_zip_code" maxlength="5"
                            value="<?php echo showData('information_about_your_qualifying_family_member_zip_code')?>">
                    </div>
                </div>
            

                <div class="form-group">
                    <label class="control-label col-md-5">7.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">7.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">7.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>

                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Residence</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">8.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">8.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>

                

        </div>





     
        <div class="col-md-6 mt-5">











        
        <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Provide your most recent address outside the United States  where you lived for more than one year (if not already listed
above).</span>
                 </p>
                 <div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>9.b. </b> &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_apt_ste_flr_number" maxlength="6"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_you_qualifying_family_member_city_town"maxlength="20" value="<?= showData('information_about_you_qualifying_family_member_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_qualifying_family_member_state">
                            <option style="" value="">Select</option>
							<?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('information_about_you_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_zip_code" maxlength="5"
                            value="<?php echo showData('information_about_your_qualifying_family_member_zip_code')?>">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">9.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Residence</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">10.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">10.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>


            <div class="bg-info">
                <h4><b>Employment History</b> 
                </h4>
            </div>
            <p>Provide your employment history for the last five years.
whether inside or outside the United States. Provide the most
recent employment first. If you need extra space to complete
this section, use the space provided in Part 14. Additional
Information.</p>
<p>Employer I (current or most recent)</p>
           
<div>
                
                <div class="form-group">
                    <label class="control-label col-md-5">11. Name of Employer or Company</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_family_last_name"
                            value="<?php echo showData('information_about_you_family_last_name')?>" />
                    </div>
                </div>
                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Address of Employer or Company</span>
                 </p>
                 <div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>12.b. </b> &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_apt_ste_flr_number" maxlength="6"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_you_qualifying_family_member_city_town"maxlength="20" value="<?= showData('information_about_you_qualifying_family_member_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_qualifying_family_member_state">
                            <option style="" value="">Select</option>
							<?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('information_about_you_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_zip_code" maxlength="5"
                            value="<?php echo showData('information_about_your_qualifying_family_member_zip_code')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">12.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">13. Your Occupation</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
            </div>
                
                
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 6 --------------------------------
------------------------------------------------------------------------>

<fieldset class="setpage">
    
    <div class="page_number">
        <b>
            <p style="padding-left:1000px;">Page 6 of 20</p>
        </b>
    </div>
   
    <div class="row  mt-3 border-add">
        <div class="col-md-6 container border-add ">
            <div class="bg-info">
                <h4><b>Part 3. Additional Information About You(Continued)</b></h4>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Employment</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">14.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">14.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <hr>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Employer 2</span>
            </p>
            <div>
                
                <div class="form-group">
                    <label class="control-label col-md-5">15. Name of Employer or Company</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_family_last_name"
                            value="<?php echo showData('information_about_you_family_last_name')?>" />
                    </div>
                </div>
                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Address of Employer or Company</span>
                 </p>
                 <div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>16.b. </b> &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_apt_ste_flr_number" maxlength="6"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_you_qualifying_family_member_city_town"maxlength="20" value="<?= showData('information_about_you_qualifying_family_member_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_qualifying_family_member_state">
                            <option style="" value="">Select</option>
							<?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('information_about_you_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_zip_code" maxlength="5"
                            value="<?php echo showData('information_about_your_qualifying_family_member_zip_code')?>">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">16.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">17. Your Occupation</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Employment</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">18.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">18.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Provide your most recent employment outside of the United States (if not already listed above).</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">19. Name of Employer or Company</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_family_last_name"
                            value="<?php echo showData('information_about_you_family_last_name')?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">

        <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Address of Employer or Company</span>
                 </p>
                 <div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.a. Street Number and Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="control-label col-md-6"><b>20.b. </b> &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>>
                        Apt. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>>
                        Ste. &nbsp;
                        <input type="radio" name="information_about_your_qualifying_family_member_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>>
                        Flr.:
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_apt_ste_flr_number" maxlength="6"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.c. City or Town</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_you_qualifying_family_member_city_town"maxlength="20" value="<?= showData('information_about_you_qualifying_family_member_city_town')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.d. State</label>
                    <div class="col-md-7">
                        <select class="form-control" name="information_about_you_qualifying_family_member_state">
                            <option style="" value="">Select</option>
							<?php
							foreach ($allDataCountry as $record) {
								if($record->state_code==showData('information_about_you_qualifying_family_member_state')) $selected = "selected"; else $selected = "";
								echo "<option value='$record->state_code' $selected>$record->state_code</option>";
							}
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.e. ZIP Code </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_zip_code" maxlength="5"
                            value="<?php echo showData('information_about_your_qualifying_family_member_zip_code')?>">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.f. Province</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control"
                            name="information_about_you_given_first_name"
                            value="<?php echo showData('information_about_you_given_first_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.g. Postal Code</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">20.h. Country</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">21. Your Occupation</label>
                    <div class="col-md-7">
                        <input type="text" maxlength="29" class="form-control" name="information_about_you_middle_name"
                            value="<?php echo showData('information_about_you_middle_name')?>" />
                    </div>
                </div>
                <p>
                <span class="fs-6 fw-bold "></span> <span class="font-2xl">Dates of Employment</span>
            </p>
            <div class="form-group">
                    <label class="control-label col-md-5">22.a. From (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">22.b. To (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>


            <div class="bg-info">
                <h4><b>Part 4. Information About Your Parents</b> 
                </h4>
            </div>
            <div class="bg-info">
                <h4><b><i>Information About Your Parent 1</i></b> 
                </h4>
            </div>
            <p>Parent 1's Legal Name</p>
            <div class="form-group">
                <label class="control-label col-md-5">1.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_family_last_name" maxlength="29"
                        value="<?php echo showData('information_about_your_qualifying_family_member_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_given_first_name" maxlength="29"
                        value="<?php echo showData('information_about_your_qualifying_family_member_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">1.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_middle_name" maxlength="29"
                        value="<?php echo showData('information_about_your_qualifying_family_member_middle_name')?>" />
                </div>
            </div>
            <p><b>Parent 1's Name at Birth (if different than above) </b></p>
            <div class="form-group">
                <label class="control-label col-md-5">2.a. Family Name(Last Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_family_last_name" maxlength="29"
                        value="<?php echo showData('information_about_your_qualifying_family_member_other_family_last_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.b. Given Name(First Name)</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_given_first_name" maxlength="29"
                        value="<?php echo showData('information_about_your_qualifying_family_member_other_given_first_name')?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-5">2.c. Middle Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control"
                        name="information_about_your_qualifying_family_member_other_middle_name" maxlength="29"
                        value="<?php echo showData('information_about_your_qualifying_family_member_other_middle_name')?>" />
                </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">3. Date of Birth (mm/dd/yyyy)</label>
                    <div class="col-md-7 ">
                        <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                            value="<?= showData('other_information_about_you_date_of_birth')?>" />
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-5">4. Sex</label>
                    <div class="col-md-7 ">
                    <div class="margin">
                <div class="form-check ">
                    <input type="radio" class="form-check-input" name="i_918a_part1_family_members_relations" value="spouse" 
                    <?php echo (showData('i_918a_part1_family_members_relations')=='spouse') ? 'checked':''?>>
                    <label class="form-check-label" for="spouse">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="i_918a_part1_family_members_relations" value="parent" 
                    <?php echo (showData('i_918a_part1_family_members_relations')=='parent') ? 'checked':''?>>
                    <label class="form-check-label" for="parent">Female</label>
                </div>
            </div>
                    </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="control-label col-md-5">5. City or Town of Birth</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">6. Country of Birth</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control"
                            name="information_about_your_qualifying_family_member_residence_street_number" maxlength="28"
                            value="<?php echo showData('information_about_your_qualifying_family_member_residence_street_number')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>


<?php include "intake_footer.php"?>