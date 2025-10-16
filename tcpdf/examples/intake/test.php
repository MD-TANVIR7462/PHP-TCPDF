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
            disabled 
          />
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
            disabled 
          />
        </div>

        <!-- USCIS Account Number -->
        <div class="col-lg-3">
          <label>Attorney or Accredited Representative USCIS Online Account Number (if any)</label>
          <input 
            type="text" 
            maxlength="12" 
            class="form-control" 
            value="<?php echo $attorneyData->uscis_online_account_number; ?>" 
            disabled 
          />
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
          value="<?php echo showData('information_about_you_family_last_name'); ?>" 
        />
      </div>

      <div class="col-md-4">
        <label>Given Name (First Name)</label>
        <input 
          type="text" 
          maxlength="29" 
          class="form-control" 
          name="information_about_you_given_first_name" 
          value="<?php echo showData('information_about_you_given_first_name'); ?>" 
        />
      </div>

      <div class="col-md-4">
        <label>Middle Name</label>
        <input 
          type="text" 
          maxlength="29" 
          class="form-control" 
          name="information_about_you_middle_name" 
          value="<?php echo showData('information_about_you_middle_name'); ?>" 
        />
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
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" 
          />
          <input 
            type="text" 
            maxlength="29" 
            class="form-control mt-2" 
            name="information_about_you_other_family_last_name" 
            value="<?php echo showData('information_about_you_other_family_last_name'); ?>" 
          />
        </div>

        <div class="col-md-4">
          <label>Given Name (First Name)</label>
          <input 
            type="text" 
            maxlength="29" 
            class="form-control" 
            name="information_about_you_other_given_first_name" 
            value="<?php echo showData('information_about_you_other_given_first_name'); ?>" 
          />
          <input 
            type="text" 
            maxlength="29" 
            class="form-control mt-2" 
            name="information_about_you_other_given_first_name" 
            value="<?php echo showData('information_about_you_other_given_first_name'); ?>" 
          />
        </div>

        <div class="col-md-4">
          <label>Middle Name</label>
          <input 
            type="text" 
            maxlength="29" 
            class="form-control" 
            name="information_about_you_other_middle_name" 
            value="<?php echo showData('information_about_you_other_middle_name'); ?>" 
          />
          <input 
            type="text" 
            maxlength="29" 
            class="form-control mt-2" 
            name="information_about_you_other_middle_name" 
            value="<?php echo showData('information_about_you_other_middle_name'); ?>" 
          />
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
          value="<?php echo showData('information_about_you_dob'); ?>" 
        />
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
          value="<?php echo showData('information_about_you_other_dob'); ?>" 
        />
        <input 
          type="text" 
          maxlength="29" 
          class="form-control mt-2" 
          name="information_about_you_other_dob" 
          value="<?php echo showData('information_about_you_other_dob'); ?>" 
        />
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

<!-- page 1 end  -->