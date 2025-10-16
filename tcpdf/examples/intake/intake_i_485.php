<?php
$meta_title     =   "INTAKE FORM I-485";
$page_heading     =   "INTAKE FORM I-485, Application to Register Permanent Residence or Adjust Status";
include "intake_header.php";
?>

<!-- Custom Styles  -->
<style>
  /* Spacing - Padding */
  .p-0 {
    padding: 0;
  }

  .p-1 {
    padding: 0.25rem;
  }

  .p-2 {
    padding: 0.5rem;
  }

  .p-3 {
    padding: 0.75rem;
  }

  .p-4 {
    padding: 1rem;
  }

  .p-5 {
    padding: 1.25rem;
  }

  .p-6 {
    padding: 1.5rem;
  }

  .p-8 {
    padding: 2rem;
  }

  .p-10 {
    padding: 2.5rem;
  }

  .px-0 {
    padding-left: 0;
    padding-right: 0;
  }

  .px-1 {
    padding-left: 0.25rem;
    padding-right: 0.25rem;
  }

  .px-2 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }

  .px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
  }

  .px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .px-5 {
    padding-left: 1.25rem;
    padding-right: 1.25rem;
  }

  .px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }

  .px-8 {
    padding-left: 2rem;
    padding-right: 2rem;
  }

  .py-0 {
    padding-top: 0;
    padding-bottom: 0;
  }

  .py-1 {
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
  }

  .py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }

  .py-3 {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
  }

  .py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }

  .py-5 {
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
  }

  .py-6 {
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
  }

  .py-8 {
    padding-top: 2rem;
    padding-bottom: 2rem;
  }

  .pt-1 {
    padding-top: 0.25rem;
  }

  .pt-2 {
    padding-top: 0.5rem;
  }

  .pt-3 {
    padding-top: 0.75rem;
  }

  .pt-4 {
    padding-top: 1rem;
  }

  .pt-5 {
    padding-top: 1.25rem;
  }

  .pt-6 {
    padding-top: 1.5rem;
  }

  .pt-8 {
    padding-top: 2rem;
  }

  .pb-1 {
    padding-bottom: 0.25rem;
  }

  .pb-2 {
    padding-bottom: 0.5rem;
  }

  .pb-3 {
    padding-bottom: 0.75rem;
  }

  .pb-4 {
    padding-bottom: 1rem;
  }

  .pb-5 {
    padding-bottom: 1.25rem;
  }

  .pb-6 {
    padding-bottom: 1.5rem;
  }

  .pb-8 {
    padding-bottom: 2rem;
  }

  .pl-1 {
    padding-left: 0.25rem;
  }

  .pl-2 {
    padding-left: 0.5rem;
  }

  .pl-3 {
    padding-left: 0.75rem;
  }

  .pl-4 {
    padding-left: 1rem;
  }

  .pl-5 {
    padding-left: 1.25rem;
  }

  .pl-6 {
    padding-left: 1.5rem;
  }

  .pl-8 {
    padding-left: 2rem;
  }

  .pr-1 {
    padding-right: 0.25rem;
  }

  .pr-2 {
    padding-right: 0.5rem;
  }

  .pr-3 {
    padding-right: 0.75rem;
  }

  .pr-4 {
    padding-right: 1rem;
  }

  .pr-5 {
    padding-right: 1.25rem;
  }

  .pr-6 {
    padding-right: 1.5rem;
  }

  .pr-8 {
    padding-right: 2rem;
  }

  /* Spacing - Margin */
  .m-0 {
    margin: 0;
  }

  .m-1 {
    margin: 0.25rem;
  }

  .m-2 {
    margin: 0.5rem;
  }

  .m-3 {
    margin: 0.75rem;
  }

  .m-4 {
    margin: 1rem;
  }

  .m-5 {
    margin: 1.25rem;
  }

  .m-6 {
    margin: 1.5rem;
  }

  .m-8 {
    margin: 2rem;
  }

  .m-10 {
    margin: 2.5rem;
  }

  .mx-0 {
    margin-left: 0;
    margin-right: 0;
  }

  .mx-1 {
    margin-left: 0.25rem;
    margin-right: 0.25rem;
  }

  .mx-2 {
    margin-left: 0.5rem;
    margin-right: 0.5rem;
  }

  .mx-3 {
    margin-left: 0.75rem;
    margin-right: 0.75rem;
  }

  .mx-4 {
    margin-left: 1rem;
    margin-right: 1rem;
  }

  .mx-5 {
    margin-left: 1.25rem;
    margin-right: 1.25rem;
  }

  .mx-6 {
    margin-left: 1.5rem;
    margin-right: 1.5rem;
  }

  .mx-8 {
    margin-left: 2rem;
    margin-right: 2rem;
  }

  .mx-auto {
    margin-left: auto;
    margin-right: auto;
  }

  .my-0 {
    margin-top: 0;
    margin-bottom: 0;
  }

  .my-1 {
    margin-top: 0.25rem;
    margin-bottom: 0.25rem;
  }

  .my-2 {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
  }

  .my-3 {
    margin-top: 0.75rem;
    margin-bottom: 0.75rem;
  }

  .my-4 {
    margin-top: 1rem;
    margin-bottom: 1rem;
  }

  .my-5 {
    margin-top: 1.25rem;
    margin-bottom: 1.25rem;
  }

  .my-6 {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
  }

  .my-8 {
    margin-top: 2rem;
    margin-bottom: 2rem;
  }

  .mt-1 {
    margin-top: 0.25rem;
  }

  .mt-2 {
    margin-top: 0.5rem;
  }

  .mt-3 {
    margin-top: 0.75rem;
  }

  .mt-4 {
    margin-top: 1rem;
  }

  .mt-5 {
    margin-top: 1.25rem;
  }

  .mt-6 {
    margin-top: 1.5rem;
  }

  .mt-8 {
    margin-top: 2rem;
  }

  .mb-1 {
    margin-bottom: 0.25rem;
  }

  .mb-2 {
    margin-bottom: 0.5rem;
  }

  .mb-3 {
    margin-bottom: 0.75rem;
  }

  .mb-4 {
    margin-bottom: 1rem;
  }

  .mb-5 {
    margin-bottom: 1.25rem;
  }

  .mb-6 {
    margin-bottom: 1.5rem;
  }

  .mb-8 {
    margin-bottom: 2rem;
  }

  .ml-1 {
    margin-left: 0.25rem;
  }

  .ml-2 {
    margin-left: 0.5rem;
  }

  .ml-3 {
    margin-left: 0.75rem;
  }

  .ml-4 {
    margin-left: 1rem;
  }

  .ml-5 {
    margin-left: 1.25rem;
  }

  .ml-6 {
    margin-left: 1.5rem;
  }

  .ml-8 {
    margin-left: 2rem;
  }

  .mr-1 {
    margin-right: 0.25rem;
  }

  .mr-2 {
    margin-right: 0.5rem;
  }

  .mr-3 {
    margin-right: 0.75rem;
  }

  .mr-4 {
    margin-right: 1rem;
  }

  .mr-5 {
    margin-right: 1.25rem;
  }

  .mr-6 {
    margin-right: 1.5rem;
  }

  .mr-8 {
    margin-right: 2rem;
  }

  /* Flexbox */
  .flex {
    display: flex;
  }

  .flex-col {
    flex-direction: column;
  }

  .flex-row {
    flex-direction: row;
  }

  .flex-wrap {
    flex-wrap: wrap;
  }

  .flex-nowrap {
    flex-wrap: nowrap;
  }

  .flex-1 {
    flex: 1 1 0%;
  }

  .flex-auto {
    flex: 1 1 auto;
  }

  .flex-initial {
    flex: 0 1 auto;
  }

  .flex-none {
    flex: none;
  }

  /* Flex Justify Content */
  .justify-start {
    justify-content: flex-start;
  }

  .justify-end {
    justify-content: flex-end;
  }

  .justify-center {
    justify-content: center;
  }

  .justify-between {
    justify-content: space-between;
  }

  .justify-around {
    justify-content: space-around;
  }

  .justify-evenly {
    justify-content: space-evenly;
  }

  /* Flex Align Items */
  .items-start {
    align-items: flex-start;
  }

  .items-end {
    align-items: flex-end;
  }

  .items-center {
    align-items: center;
  }

  .items-baseline {
    align-items: baseline;
  }

  .items-stretch {
    align-items: stretch;
  }

  /* Flex Align Self */
  .self-auto {
    align-self: auto;
  }

  .self-start {
    align-self: flex-start;
  }

  .self-end {
    align-self: flex-end;
  }

  .self-center {
    align-self: center;
  }

  .self-stretch {
    align-self: stretch;
  }

  /* Grid */
  .grid {
    display: grid;
  }

  .grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
  }

  .grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }

  .grid-cols-4 {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }

  .grid-cols-5 {
    grid-template-columns: repeat(5, minmax(0, 1fr));
  }

  .grid-cols-6 {
    grid-template-columns: repeat(6, minmax(0, 1fr));
  }

  /* Grid Gap */
  .gap-0 {
    gap: 0;
  }

  .gap-1 {
    gap: 0.25rem;
  }

  .gap-2 {
    gap: 0.5rem;
  }

  .gap-3 {
    gap: 0.75rem;
  }

  .gap-4 {
    gap: 1rem;
  }

  .gap-5 {
    gap: 1.25rem;
  }

  .gap-6 {
    gap: 1.5rem;
  }

  .gap-8 {
    gap: 2rem;
  }

  /* Text Alignment */
  .text-left {
    text-align: left;
  }

  .text-center {
    text-align: center;
  }

  .text-right {
    text-align: right;
  }

  .text-justify {
    text-align: justify;
  }

  /* Font Weight */
  .font-thin {
    font-weight: 100;
  }

  .font-light {
    font-weight: 300;
  }

  .font-normal {
    font-weight: 400;
  }

  .font-medium {
    font-weight: 500;
  }

  .font-semibold {
    font-weight: 600;
  }

  .font-bold {
    font-weight: 700;
  }

  .font-extrabold {
    font-weight: 800;
  }

  .font-black {
    font-weight: 900;
  }

  /* Text Size */
  .text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
  }

  .text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
  }

  .text-base {
    font-size: 1rem;
    line-height: 1.5rem;
  }

  .text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
  }

  .text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
  }

  .text-2xl {
    font-size: 1.5rem;
    line-height: 2rem;
  }

  .text-3xl {
    font-size: 1.875rem;
    line-height: 2.25rem;
  }

  /* Width */
  .w-full {
    width: 100%;
  }

  .w-auto {
    width: auto;
  }

  /* .w-1/2 {
    width: 50%;
  } */

  /* .w-1/3 {
    width: 33.333333%;
  }

  .w-2/3 {
    width: 66.666667%;
  }

  .w-1/4 {
    width: 25%;
  }

  .w-2/4 {
    width: 50%;
  } */

  /* .w-3/4 {
    width: 75%;
  } */

  /* Height */
  .h-full {
    height: 100%;
  }

  .h-auto {
    height: auto;
  }

  .h-screen {
    height: 100vh;
  }

  /* Border (Black Only) */
  .border {
    border: 1px solid #000;
  }

  .border-2 {
    border: 2px solid #000;
  }

  .border-4 {
    border: 4px solid #000;
  }

  .border-8 {
    border: 8px solid #000;
  }

  /* Border Sides */
  .border-t {
    border-top: 1px solid #000;
  }

  .border-r {
    border-right: 1px solid #000;
  }

  .border-b {
    border-bottom: 1px solid #000;
  }

  .border-l {
    border-left: 1px solid #000;
  }

  /* Border Radius */
  .rounded-none {
    border-radius: 0;
  }

  .rounded-sm {
    border-radius: 0.125rem;
  }

  .rounded {
    border-radius: 0.25rem;
  }

  .rounded-md {
    border-radius: 0.375rem;
  }

  .rounded-lg {
    border-radius: 0.5rem;
  }

  .rounded-xl {
    border-radius: 0.75rem;
  }

  .rounded-2xl {
    border-radius: 1rem;
  }

  .rounded-full {
    border-radius: 9999px;
  }

  /* Border Style */
  .border-solid {
    border-style: solid;
  }

  .border-dashed {
    border-style: dashed;
  }

  .border-dotted {
    border-style: dotted;
  }

  .border-double {
    border-style: double;
  }

  .border-none {
    border: none;
  }

  /* Border Opacity */
  .border-opacity-25 {
    border-color: rgba(0, 0, 0, 0.25);
  }

  .border-opacity-50 {
    border-color: rgba(0, 0, 0, 0.5);
  }

  .border-opacity-75 {
    border-color: rgba(0, 0, 0, 0.75);
  }

  .border-opacity-100 {
    border-color: rgba(0, 0, 0, 1);
  }
</style>
<!-- Custom Styles End  -->
<!----------------------------------------------------------------------
-------------------------------- page 1 --------------------------------
------------------------------------------------------------------------>



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





















<!-- end -->
<?php include "intake_footer.php" ?>