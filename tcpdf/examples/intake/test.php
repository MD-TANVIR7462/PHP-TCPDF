<fieldset class="setpage">
    <p style="text-align: right"><b>Page 1 of 14</b></p>

    <div class="form-group">
        <h4 class="col-md-12" style="margin-top: 2%;">► START HERE - Type or print in black ink.</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table style="border-collapse: collapse; ">
		        <thead>
			<tr>
				<th colspan="4" style="padding: 5px; text-align: center; " class="bg-info">To be completed by an Attorney or Accredited Representative (if any).</th>
            </tr>
		    </thead>
		    <tbody>
			<tr>
			<td style="padding: 5px;">
            <label style="cursor: pointer;">
            <?php echo createCheckbox("")?> Select this box if Form G-28 is attached.
         </label>
             </td>
				<td style="padding: 5px;">
					<div>
						<label class="control-label ">Attorney State Bar Number (if applicable)</label>
						<input type="text" class="form-control" value="" disabled>
					</div>
					<!-- <div>
						<p>Attorney State Bar Number (if applicable)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->bar_number?>" disabled>
					</div> -->
				</td>
				<td style="padding: 5px;">
					<div>
						<label class="control-label ">Attorney or Accredited Representative USCIS Online Account Number (if any)</label>
						<input type="text" class="form-control" value="" disabled >
					</div>
					<!-- <div>
						<p>Attorney or Accredited Representative USCIS Online Account Number (if any)</p>
						<input type="text" class="form-control" value="<?php echo $attorneyData->uscis_online_account_number?>" disabled >
					</div> -->
				</td>
			</tr>
		    </tbody>
	        </table>
            <div class="bg-info col-md-12" style="margin-top:10px;">
                <h4><b>Part 1. Information About Your Eligibility</b></h4>
            </div>

            <div class="form-group">
                <label class="control-label col-md-offset-7 col-md-5">Enter Your 9 Digit A-Number:</label>
                <div class="col-md-offset-7 col-md-5">
                    <span style="display: flex; justify-content: center; align-items: center;"><b>►A-</b> <input type="text" maxlength="9" style="margin-left: 5px;" class="form-control" name="" value="<?php echo showData('') ?>" /></span>
                </div>
            </div>
            <div class="form-group">
            <label>1. This application is being filed based on the fact that: (Select only one box)</label><br>
            <div style='margin-left:5%'>
                <input type="radio" id="biological" name="biographic_info_eye_color" value="black" <?php echo (showData('biographic_info_eye_color') == 'black') ? 'checked' : '' ?>>
                <label for="biological">I am a BIOLOGICAL child of a U.S. citizen parent.</label><br>

                <input type="radio" id="adopted" name="biographic_info_eye_color" value="blue" <?php echo (showData('biographic_info_eye_color') == 'blue') ? 'checked' : '' ?>>
                <label for="adopted">I am an ADOPTED child of a U.S. citizen parent.</label><br>

                <input type="radio" id="other_fully" name="biographic_info_eye_color" value="brown" <?php echo (showData('biographic_info_eye_color') == 'brown') ? 'checked' : '' ?>>
                <label for="other_fully">Other (Explain fully):</label><br>
                <div class="col-md-11" style="margin-left: 4%;">
                    <input type="text" maxlength="39" class="form-control" name="information_about_you_eligibility_reason_not_listed_value" value="<?php echo showData('information_about_you_eligibility_reason_not_listed_value') ?>" />
                </div> 
                <p class='col-md-12'><b>NOTE:</b> If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information</b></p>
            </div>
            </div>
         <div class='form-group'>

        <div class="bg-info col-md-12" style="margin-top:20px; margin-bottom: 15px;">
                <h4><b>Part 2. Information About You </b></h4>
            </div>
            <p class='col-md-12' ><b>NOTE:</b> Provide information about yourself if you are a person applying for the Certificate of Citizenship. <b>Provide information
            about your child</b> if you are a U.S. citizen parent applying for a Certificate of Citizenship for your minor child.</p>
                <h5><b>1. Current Legal Name (do not provide a nickname)</b> </h5>






                
          </div>















                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_current_family_last_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_current_given_first_name') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_current_middle_name" maxlength="22" value="<?php echo showData('information_about_you_current_middle_name') ?>">
                    </div>
                </div>
            </div>
            <div>
                <h5><b>2. Your Name Exactly As It Appears on Your Permanent Resident Card (if different from above)</b> </h5>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Family Name (Last Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_other_family_last_name" maxlength="35" value="<?php echo showData('information_about_you_other_family_last_name') ?>">
                        <input type="text" class="form-control" name="information_about_you_other_family_last_name2" maxlength="35" value="<?php echo showData('information_about_you_other_family_last_name2') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Given Name (First Name)</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_other_given_first_name" maxlength="27" value="<?php echo showData('information_about_you_other_given_first_name') ?>">
                        <input type="text" class="form-control" name="information_about_you_other_given_first_name2" maxlength="27" value="<?php echo showData('information_about_you_other_given_first_name2') ?>">
                    </div>
                </div>
                <div class=" col-md-4">
                    <label class="control-label " style="margin-left: 15px;">Middle Name (if applicable)
                    </label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="information_about_you_other_middle_name" maxlength="22" value="<?php echo showData('information_about_you_other_middle_name') ?>">
                        <input type="text" class="form-control" name="information_about_you_other_middle_name2" maxlength="22" value="<?php echo showData('information_about_you_other_middle_name2') ?>">
                    </div>
                </div>

    </div>
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
    <input style="float: right;" type="button" name="submit" class="submit btn btn-success" value="Save" />
</fieldset>