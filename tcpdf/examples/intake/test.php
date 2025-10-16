<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 1 of 24</b></p>
  </div>

  <!-- Attorney Section -->
  <div class="form-group border ">
    <div class="bg-info text-center">
      <h4><b>To be completed by an attorney or accredited representative (if any).</b></h4>
    </div>

    <div style="padding: 2%;">
      <div class="row">
        <!-- G-28 Checkbox -->
        <div class="col-lg-3">
          <div class="d-flexible">
            <?php echo createCheckbox("i_485_g28_checkbox"); ?>
            <p><b>Select this box if Form G-28 or Form G-28I is attached.</b></p>
          </div>
        </div>

        <!-- Volag Number -->
        <div class="col-lg-3">
          <label><span class="font-weight-bold">Volag Number</span> (if any)</label>
          <br><br><br>
          <input
            type="text"
            maxlength="10"
            class="form-control"
            value="<?php echo $attorneyData->volag_number; ?>"
            disabled />
        </div>

        <!-- State Bar Number -->
        <div class="col-lg-3">
          <label><span class="font-weight-bold">Attorney State Bar Number</span> (if applicable)</label>
          <br><br>
          <input
            type="text"
            maxlength="15"
            class="form-control"
            value="<?php echo $attorneyData->bar_number; ?>"
            disabled />
        </div>

        <!-- USCIS Account Number -->
        <div class="col-lg-3">
          <label>Attorney or Accredited Representative USCIS Online Account Number (if any)</label>
          <input
            type="text"
            maxlength="12"
            class="form-control"
            value="<?php echo $attorneyData->uscis_online_account_number; ?>"
            disabled />
        </div>
      </div>
    </div>
  </div>

  <!-- Note Section -->
  <div class="row">
    <div class="ml-6">
      <p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill out this application or fail to submit required documents listed in the instructions, U.S. Citizenship and Immigration Services (USCIS) may reject or deny your application.</p>
      <p>For all sections of this application, if you need to provide any additional information or are instructed to provide an explanation, use the space provided in Part 14. Additional Information.</p>
    </div>
  </div>

  <!-- Applicant Information Section -->
  <div class="col-md-12">
    <div class="bg-info">
      <h4><b>Part 1. Information About You (Person applying for lawful permanent residence)</b></h4>
    </div>

    <!-- Current Legal Name -->
    <p><b>1. Your Current Legal Name (Do not provide a nickname)</b></p>
    <div class="row">
      <div class="col-md-4">
        <label>Family Name (Last Name)</label>
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_family_last_name"
          value="<?php echo showData('information_about_you_family_last_name'); ?>" />
      </div>

      <div class="col-md-4">
        <label>Given Name (First Name)</label>
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_given_first_name"
          value="<?php echo showData('information_about_you_given_first_name'); ?>" />
      </div>

      <div class="col-md-4">
        <label>Middle Name</label>
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_middle_name"
          value="<?php echo showData('information_about_you_middle_name'); ?>" />
      </div>
    </div>

    <!-- Other Names Used -->
    <div class="mt-5">
      <p><b>2. Other Names You Have Used Since Birth (if applicable)</b></p>
      <p>Provide all other names you have ever used, including your family name at birth, other legal names, nicknames, aliases, and assumed names.</p>

      <div class="row">
        <div class="col-md-4">
          <label>Family Name (Last Name)</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_family_last_name"
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" />
          <input
            type="text"
            maxlength="29"
            class="form-control mt-2"
            name="information_about_you_other_family_last_name"
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" />
        </div>

        <div class="col-md-4">
          <label>Given Name (First Name)</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_given_first_name"
            value="<?php echo showData('information_about_you_other_given_first_name'); ?>" />
          <input
            type="text"
            maxlength="29"
            class="form-control mt-2"
            name="information_about_you_other_given_first_name"
            value="<?php echo showData('information_about_you_other_given_first_name'); ?>" />
        </div>

        <div class="col-md-4">
          <label>Middle Name</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_middle_name"
            value="<?php echo showData('information_about_you_other_middle_name'); ?>" />
          <input
            type="text"
            maxlength="29"
            class="form-control mt-2"
            name="information_about_you_other_middle_name"
            value="<?php echo showData('information_about_you_other_middle_name'); ?>" />
        </div>
      </div>
    </div>

    <!-- Date of Birth -->
    <div class="row mt-4">
      <label class="control-label col-md-3">3. Date of Birth (mm/dd/yyyy)</label>
      <div class="col-md-4">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_dob"
          value="<?php echo showData('information_about_you_dob'); ?>" />
      </div>
    </div>

    <!-- Other Date of Birth -->
    <div class="row mt-3">
      <div class="col-md-12">
        <label class="col-md-5">Have you ever used any other date of birth?</label>
        <div class="col-md-5">
          <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
        </div>
      </div>

      <p class="mt-2 ml-5">If you answered "Yes," provide all other dates of birth (mm/dd/yyyy).</p>

      <div class="col-md-4">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_other_dob"
          value="<?php echo showData('information_about_you_other_dob'); ?>" />
        <input
          type="text"
          maxlength="29"
          class="form-control mt-2"
          name="information_about_you_other_dob"
          value="<?php echo showData('information_about_you_other_dob'); ?>" />
      </div>
    </div>
  </div>

  <!-- Buttons -->
  <input
    type="button"
    name="next"
    class="next btn btn-info"
    value="Next"
    style="float: right;margin: 10px;" />

  <input
    style="float: right;"
    type="button"
    name="button"
    class="submit btn btn-success"
    value="Save" />

</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 2 of 24</b></p>
  </div>
  <!-- Applicant Information Section -->
  <div class="">
    <div class="bg-info">
      <h4><b>Part 1. Information About You (Person applying for lawful permanent residence) (continued)</b></h4>
    </div>
    <div class="flex gap-8 my-4">
      <p><b>4. Do you have an Alien Registration Number (A-Number)?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <label>If you answered "Yes," provide your A-Number</label>
        <label>A-Number (if any) ► A</label>
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_family_last_name"
          value="<?php echo showData('information_about_you_family_last_name'); ?>" />
      </div>
    </div>
    <div class="flex gap-8 my-4">
      <p><b>5. Have you ever used, or been assigned, any other A-Number? </b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <label>If you answered "Yes," provide the A-Numbers</label>
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_family_last_name"
          value="<?php echo showData('information_about_you_family_last_name'); ?>" />
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_family_last_name"
          value="<?php echo showData('information_about_you_family_last_name'); ?>" />
      </div>


    </div>
    <div class="mt-5">
      <label>8.Sex</label>
      <div>
        <label> <input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : '' ?>> Male &nbsp;</label>
        <label> <input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : '' ?>> Female &nbsp;</label>

      </div>
    </div>

    <!-- Other Names Used -->
    <div class="mt-5">


      <p class="font-bold mb-3">7. Place of Birth</p>
      <div class="row">
        <div class="col-md-6">
          <label>City or Town of Birth</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_family_last_name"
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" />

        </div>

        <div class="col-md-6">
          <label>Country of Birth</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_given_first_name"
            value="<?php echo showData('information_about_you_other_given_first_name'); ?>" />

        </div>
      </div>


      <div class="row my-4">
        <div class="col-md-6">
          <label>8. Country of Citizenship or Nationality</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_family_last_name"
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" />

        </div>
      </div>
    </div>

    <!-- Date of Birth -->
    <div class="row mt-4">
      <label class="control-label col-md-12">9. USCIS Online Account Number (if any)</label>
      <div class="col-md-4">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_dob"
          value="<?php echo showData('information_about_you_dob'); ?>" />
      </div>
    </div>

    <!-- Other Date of Birth -->
    <div class="row mt-3">
      <p class="mt-2 ml-5 font-semibold">If one has been assigned, you can find it on a notice that USCIS may have sent to you.</p>
      <p class="font-bold m-5">10. Recent Immigration History</p>
      <p class="font-bold m-8">If you last entered the United States using a passport or travel document, provide the following information. </p>
      <div>
        <label class="control-label col-md-6 md-5">Passport or Travel Document Number Used at Last Arrival</label>
        <div class="col-md-6">
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_dob"
            value="<?php echo showData('information_about_you_other_dob'); ?>" />
        </div>
      </div>
      <div>
        <label class="control-label col-md-6 md-5">Expiration Date of this Passport or Travel Document (mm/dd/yyyy)</label>
        <div class="col-md-6">
          <input
            type="date"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_dob"
            value="<?php echo showData('information_about_you_other_dob'); ?>" />
        </div>
      </div>
      <div>
        <label class="control-label col-md-6 md-5">Country that Issued this Passport or Travel Document</label>
        <div class="col-md-6">
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_dob"
            value="<?php echo showData('information_about_you_other_dob'); ?>" />
        </div>
      </div>
      <div>
        <label class="control-label col-md-6 md-5">Nonimmigrant Visa Number Used During Most Recent Arrival (if any)</label>
        <div class="col-md-6">
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_dob"
            value="<?php echo showData('information_about_you_other_dob'); ?>" />
        </div>
      </div>
      <div>
        <label class="control-label col-md-6 md-5">Date Nonimmigrant Visa Was Issued (mm/dd/yyyy)</label>
        <div class="col-md-6">
          <input
            type="date"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_dob"
            value="<?php echo showData('information_about_you_other_dob'); ?>" />
        </div>
      </div>
      <!-- Current Legal Name -->
      <div class="p-6">
        <p><b>1. Your Current Legal Name (Do not provide a nickname)</b></p>
        <div class="row mt-5">
          <div class="col-md-4">
            <label>City or Town</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="information_about_you_family_last_name"
              value="<?php echo showData('information_about_you_family_last_name'); ?>" />
          </div>

          <div class="col-md-4">
            <label>State</label>
            <select class="form-control" name="i_131_them_mailing_state"
              style="width: 100%; padding: 5px; margin-top: 3%;">
              <option value=''>Select</option>
              <?php
              foreach ($allDataCountry as $record) {
                if ($record->state_code == showData('i_131_them_mailing_state')) $selected = "selected";
                else $selected = "";
                echo "<option value='$record->state_code' $selected>$record->state_code</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-4">
            <label>Date of Last Arrival (mm/dd/yyyy)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="information_about_you_middle_name"
              value="<?php echo showData('information_about_you_middle_name'); ?>" />
          </div>
        </div>
        <div class="mb-8 mt-5">
          <div>
            <label class="flex mb-2">
              <span style="width: 30px;">1.</span>
              <span>
                When I last arrived in the United States:
              </span>
            </label>
            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_131_pending485_status") ?></span>
              <span>
                I was inspected at a Port of Entry and admitted as (for example, exchange visitor, visitor, temporary worker, student):
              </span>
            </label>
            <div class="col-md-12">
              <input type="text" class="form-control" maxlength="82" name="i_131_pending485_value"
                value="<?php echo showData('i_131_pending485_value') ?>">
            </div>
          </div>
          <div>

            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_131_pending485_status") ?></span>
              <span>
                I was inspected at a Port of Entry and paroled as (for example, humanitarian parole, Cuban parole):
              </span>
            </label>
            <div class="col-md-12">
              <input type="text" class="form-control" maxlength="82" name="i_131_pending485_value"
                value="<?php echo showData('i_131_pending485_value') ?>">
            </div>
          </div>

          <div>
            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_131_pending485_status") ?></span>
              <span>
                I came into the United States without admission or parole.
              </span>
            </label>
          </div>
          <div>
            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_131_pending485_status") ?></span>
              <span>
                Other:
              </span>
            </label>
            <div class="col-md-12">
              <input type="text" class="form-control" maxlength="82" name="i_131_pending485_value"
                value="<?php echo showData('i_131_pending485_value') ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Buttons -->
  <div class="py-8">
    <input
      type="submit"
      name="next"
      class="next btn btn-info"
      value="Next"
      style="float: right;margin: 10px;" />

    <input
      style="float: right;"
      type="submit"
      name="submit"
      class="submit btn btn-success"
      value="Save" />
  </div>

</fieldset>

<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 3 of 24</b></p>
  </div>

  <!-- Applicant Information Section -->
  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 1. Information About You (Person applying for lawful permanent residence) (continued)</b></h4>
    </div>

    <!-- Other Names Used -->
    <div class="mt-5">
      <p class="font-bold mb-3"><span class="mr-5">12.</span> If you were issued a Form I-94 Arrival/Departure Record, provide the information from your most recent Form I-94 below:</p>
      <div class="row">
        <div class="col-md-6">
          <label>Family Name (Last Name)</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_family_last_name"
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" />
        </div>

        <div class="col-md-6">
          <label>Given Name (First Name) </label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_given_first_name"
            value="<?php echo showData('information_about_you_other_given_first_name'); ?>" />
        </div>
      </div>

      <div class="row my-4">
        <div class="col-md-6">
          <label>Form I-94 Arrival/Departure Record Number ►</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="information_about_you_other_family_last_name"
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" />
        </div>
      </div>
    </div>

    <!-- Date of Birth -->
    <div class="row mt-4">
      <label class="control-label col-md-12">Expiration Date of Authorized Stay Shown on Form I-94 (mm/dd/yyyy) or Type or Print "D/S" for Duration of Status </label>
      <div class="col-md-4">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_dob"
          value="<?php echo showData('information_about_you_dob'); ?>" />
      </div>
    </div>

    <!--  -->
    <div class="row mt-3">
      <label class="control-label col-md-6 ">Immigration Status on Form I-94 (for example, class of admission, or paroled, if paroled) </label>
      <div class="col-md-6">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_other_dob"
          value="<?php echo showData('information_about_you_other_dob'); ?>" />
      </div>
    </div>
    <div class="flex gap-8 my-4">
      <p><b><span class="mr-5 items-center">13.</span> Was your last arrival the first time you were physically present in the United States?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <!--  -->
    <div class="row mt-3">
      <label class="control-label col-md-6 "><span class="mr-5">14.</span> What is your current immigration status (if it has changed since your last arrival)? </label>
      <div class="col-md-6">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_other_dob"
          value="<?php echo showData('information_about_you_other_dob'); ?>" />
      </div>
    </div>
    <!--  -->
    <div class="row mt-3">
      <label class="control-label col-md-6 "><span class="mr-5">15.</span> Expiration Date of Current Immigration Status (mm/dd/yyyy) or Type or Print "D/S" for Duration of Status</label>
      <div class="col-md-6">
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_other_dob"
          value="<?php echo showData('information_about_you_other_dob'); ?>" />
      </div>
    </div>
    <div class="flex gap-8 my-4">
      <p><b><span class="mr-5">16.</span> Have you ever been issued an "alien crewman" visa?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class="flex gap- my-4 items-center">
      <p><b><span class="mr-5">17.</span>Did you last arrive in the United States to join a vessel as a seaman or crewman, or while serving in any
          capacity aboard a vessel or aircraft?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class="flex gap- my-4">
      <p><b><span class="mr-5">18.</span>Addresses</b></p>
    </div>

    <!-- address start    -->
    <div class="form-group">
      <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">Current Physical Address</label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
          <input type="text" class="form-control" name="information_about_you_residence_care_of_name" maxlength="86" value="<?php echo showData('information_about_you_residence_care_of_name') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
      </div>
      <div style="margin-left:1.5%; margin-right: 1.5%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
          <div class="form-group" style="flex: 3; margin-bottom: 10px;">
            <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
            <div style="width: 100%;">
              <input type="text" maxlength="63" class="form-control" name="" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
            <div style="flex: 1; margin-left: 5%;">
              <label>
                <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
              </label>
              <label>
                <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
              </label>
              <label>
                <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
              </label>
            </div>
          </div>
          <div style="flex: 1;">
            <label class="control-label">Number</label>
            <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
          </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
          <div class="form-group" style="flex: 3; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_city_town" maxlength="63" value="<?php echo showData('information_about_you_residence_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
              <select class="form-control" name="information_about_you_residence_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                <option value=''>Select</option>
                <?php
                foreach ($allDataCountry as $record) {
                  if ($record->state_code == showData('information_about_you_residence_state')) $selected = "selected";
                  else $selected = "";
                  echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_zip_code" maxlength="5" value="<?php echo showData('information_about_you_residence_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Date You First Resided at This Address (mm/dd/yyyy)</label>
            <div style="width: 50%;">
              <input type="date" class="form-control" name="information_about_you_residence_from_date" value="<?php echo showData('information_about_you_residence_from_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- address end    -->
    <div class="flex gap-8 items-center   my-4">
      <p><b>Is this your current mailing address?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <p><b>If you answered "No," provide your current mailing address.</b></p>
    <!-- address start    -->
    <div class="form-group">
      <div class="form-group" style="margin-bottom: 10px;">
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">Current Mailing Address (Safe or Alternate Mailing Address, if applicable)</label>
        <label class="control-label" style="width: 100%; margin-bottom: 5px;">In Care Of Name (if any)</label>
        <div style="width: 100%;">
          <input type="text" class="form-control" name="information_about_you_residence_care_of_name" maxlength="86" value="<?php echo showData('information_about_you_residence_care_of_name') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
      </div>
      <div style="margin-left:1.5%; margin-right: 1.5%;">
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
          <div class="form-group" style="flex: 3; margin-bottom: 10px;">
            <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
            <div style="width: 100%;">
              <input type="text" maxlength="63" class="form-control" name="" value="<?php echo showData('') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
            <div style="flex: 1; margin-left: 5%;">
              <label>
                <input type="radio" name="information_about_you_residence_apt_ste_flr" value="apt" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
              </label>
              <label>
                <input type="radio" name="information_about_you_residence_apt_ste_flr" value="ste" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
              </label>
              <label>
                <input type="radio" name="information_about_you_residence_apt_ste_flr" value="flr" <?php echo (showData('information_about_you_residence_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
              </label>
            </div>
          </div>
          <div style="flex: 1;">
            <label class="control-label">Number</label>
            <input type="text" class="form-control" name="information_about_you_residence_apt_ste_flr_value" maxlength="5" value="<?php echo showData('information_about_you_residence_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
          </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
          <div class="form-group" style="flex: 3; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_city_town" maxlength="63" value="<?php echo showData('information_about_you_residence_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
            <div style="width: 100%;">
              <select class="form-control" name="information_about_you_residence_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                <option value=''>Select</option>
                <?php
                foreach ($allDataCountry as $record) {
                  if ($record->state_code == showData('information_about_you_residence_state')) $selected = "selected";
                  else $selected = "";
                  echo "<option value='$record->state_code' $selected>$record->state_code</option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">ZIP Code</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_zip_code" maxlength="5" value="<?php echo showData('information_about_you_residence_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- address end    -->
  </div>

  <!-- Buttons -->
  <div class="py-8">
    <input
      type="submit"
      name="next"
      class="next btn btn-info"
      value="Next"
      style="float: right;margin: 10px;" />

    <input
      style="float: right;"
      type="submit"
      name="submit"
      class="submit btn btn-success"
      value="Save" />
  </div>
</fieldset>


