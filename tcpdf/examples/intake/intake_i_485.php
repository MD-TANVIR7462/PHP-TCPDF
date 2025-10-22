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
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 1 of 24</b></p>
  </div>


  <div class="form-group border ">
    <div class="bg-info text-center">
      <h4><b>To be completed by an attorney or accredited representative (if any).</b></h4>
    </div>

    <div style="padding: 2%;">
      <div class="row">

        <div class="col-lg-3">
          <div class="d-flexible">
            <?php echo createCheckbox("i_485_g28_checkbox"); ?>
            <p><b>Select this box if Form G-28 or Form G-28I is attached.</b></p>
          </div>
        </div>


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

  <div class="row">
    <div class="ml-6">
      <p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill out this application or fail to submit required documents listed in the instructions, U.S. Citizenship and Immigration Services (USCIS) may reject or deny your application.</p>
      <p>For all sections of this application, if you need to provide any additional information or are instructed to provide an explanation, use the space provided in Part 14. Additional Information.</p>
    </div>
  </div>

  <div class="col-md-12">
    <div class="bg-info">
      <h4><b>Part 1. Information About You (Person applying for lawful permanent residence)</b></h4>
    </div>

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

  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />

</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 2 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 2 of 24</b></p>
  </div>

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


    <div class="mt-5">


      <p class="font-bold mb-3">7. Place of Birth</p>
      <div class="row">
        <div class="col-md-8 mt-5">
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
            <select class="form-control" name="i_485_them_mailing_state"
              style="width: 100%; padding: 5px; margin-top: 3%;">
              <option value=''>Select</option>
              <?php
              foreach ($allDataCountry as $record) {
                if ($record->state_code == showData('i_485_them_mailing_state')) $selected = "selected";
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
              <span style="width: 20px; "><?php echo createCheckbox("i_485_pending485_status") ?></span>
              <span>
                I was inspected at a Port of Entry and admitted as (for example, exchange visitor, visitor, temporary worker, student):
              </span>
            </label>
            <div class="col-md-12">
              <input type="text" class="form-control" maxlength="82" name="i_485_pending485_value"
                value="<?php echo showData('i_485_pending485_value') ?>">
            </div>
          </div>
          <div>

            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_485_pending485_status") ?></span>
              <span>
                I was inspected at a Port of Entry and paroled as (for example, humanitarian parole, Cuban parole):
              </span>
            </label>
            <div class="col-md-12">
              <input type="text" class="form-control" maxlength="82" name="i_485_pending485_value"
                value="<?php echo showData('i_485_pending485_value') ?>">
            </div>
          </div>

          <div>
            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_485_pending485_status") ?></span>
              <span>
                I came into the United States without admission or parole.
              </span>
            </label>
          </div>
          <div>
            <label class="control-label col-md-12" style="display: flex; align-items: flex-start;">
              <span style="width: 20px; "><?php echo createCheckbox("i_485_pending485_status") ?></span>
              <span>
                Other:
              </span>
            </label>
            <div class="col-md-12">
              <input type="text" class="form-control" maxlength="82" name="i_485_pending485_value"
                value="<?php echo showData('i_485_pending485_value') ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />


</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 3 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 3 of 24</b></p>
  </div>


  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 1. Information About You (Person applying for lawful permanent residence) (continued)</b></h4>
    </div>


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

    <div class="flex gap-8 items-center   my-4">
      <p><b>Is this your current mailing address?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <p><b>If you answered "No," provide your current mailing address.</b></p>

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

  </div>
  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />

</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 4 --------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 4 of 24</b></p>
  </div>


  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 1. Information About You (Person applying for lawful permanent residence) (continued)</b></h4>
    </div>

    <div class="flex gap-8 items-center  my-4">
      <p><b>Have you resided at your current address for at least 5 years?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class=" gap- my-4">
      <p><b>If you answered "No," provide your prior address(es) for the last 5 years. Use the space provided in Part 14. Additional
          Information, if necessary</b></p>
    </div>
    <div class="flex gap- my-4">
      <p><b><span class="mr-5"></span>Prior Address</b></p>
    </div>


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
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_province" maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_postal_code" maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_country" maxlength="37" value="<?php echo showData('information_about_you_residence_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Residence: From (mm/dd/yyyy)</label>
            <div style="width: 100%;">
              <input type="date" class="form-control" name="information_about_you_residence_from_date" value="<?php echo showData('information_about_you_residence_from_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Residence: To (mm/dd/yyyy)</label>
            <div style="width: 100%;">
              <input type="date" class="form-control" name="information_about_you_residence_to_date" value="<?php echo showData('information_about_you_residence_to_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="my-5">
      <p><b>Most Recent Address Outside the United States </b></p>
      <p><b>Provide your most recent physical address outside the United States where you lived for more than one year (if not already listed above). </b></p>
    </div>

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
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_province" maxlength="26" value="<?php echo showData('information_about_you_residence_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_postal_code" maxlength="9" value="<?php echo showData('information_about_you_residence_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
            <div style="width: 100%;">
              <input type="text" class="form-control" name="information_about_you_residence_country" maxlength="37" value="<?php echo showData('information_about_you_residence_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Residence: From (mm/dd/yyyy)</label>
            <div style="width: 100%;">
              <input type="date" class="form-control" name="information_about_you_residence_from_date" value="<?php echo showData('information_about_you_residence_from_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="form-group" style="flex: 1; margin-bottom: 10px;">
            <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Residence: To (mm/dd/yyyy)</label>
            <div style="width: 100%;">
              <input type="date" class="form-control" name="information_about_you_residence_to_date" value="<?php echo showData('information_about_you_residence_to_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="my-5">
      <p><b><span>19.</span> Social Security Card</b></p>
    </div>
    <div class="flex gap-8 items-center mt-4 ">
      <p><b>Has the Social Security Administration (SSA) ever officially issued a Social Security card to you?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class="flex gap-8 items-center mt-4 ">
      <p><b>Do you want the SSA to issue you a Social Security card?</b></p>
      <div>
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
    <div class="flex gap-8 items-center my-4">
      <p><b>If you answered "Yes," you must also answer "Yes" to the Consent for Disclosure below</b></p>
    </div>
    <div class="row  items-center">
      <p class="col-md-10"><b>Consent for Disclosure:</b> I authorize disclosure of information from this application to the SSA as
        required for the purpose of assigning me an SSN and issuing me a Social Security Card.</p>
      <div class="col-md-2">
        <?php echo createRadio("i_485_social_authorize_disclousure_status"); ?>
      </div>
    </div>
  </div>
  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />

</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 5-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <p style="text-align: right"><b>Page 5 of 24</b></p>



  <div class="bg-info" style="margin-top:10px;">
    <h4><b>Part 2. Application Type or Filing Category</b></h4>
  </div>

  <div class="col-md-12">
    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>1.</b> Are you filing for adjustment of status with the Executive Office for Immigration Review (EOIR) while in removal, exclusion, rescission, or deportation proceedings?
      </label><br>
      <input type="radio" name="filing_with_eoir_status" id="filing_with_eoir_yes" value="yes" <?php echo (showData('filing_with_eoir_status') == 'yes') ? 'checked' : '' ?>>
      <label for="filing_with_eoir_yes">Yes</label><br>
      <input type="radio" name="filing_with_eoir_status" id="filing_with_eoir_no" value="no" <?php echo (showData('filing_with_eoir_status') == 'no') ? 'checked' : '' ?>>
      <label for="filing_with_eoir_no">No</label><br>
    </div>



    <div class="col-md-6">
      <label class="control-label "><span class="mr-5">2.</span>Receipt Number of Underlying Petition (if any)</label>
      <input type="text" class="form-control" name="underlying_petition_receipt_number" maxlength="13" value="<?php echo showData('underlying_petition_receipt_number') ?>" />
    </div>
    <div class="col-md-6">
      <label class="control-label ">Priority Date from Underlying Petition (if any) (mm/dd/yyyy)</label>
      <input type="date" class="form-control" name="underlying_petition_priority_date" value="<?php echo showData('underlying_petition_priority_date') ?>" />
    </div>


    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>I am filing this Form I-485 as a (select <b>only one</b> box):</b>
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("filing_as_principal") ?> Principal Applicant
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("filing_as_derivative") ?> Derivative Applicant (Provide the following information about the principal applicant.)
      </label>

      <div style="margin-left: 20px; margin-top: 10px;">
        <div class="col-md-4">
          <label class="control-label  ">Principal Applicant's Name - Family Name (Last Name)</label>
          <input type="text" class="form-control" name="principal_applicant_family_name" maxlength="35" value="<?php echo showData('principal_applicant_family_name') ?>" />
        </div>
        <div class="col-md-4">
          <label class="control-label  ">Given Name (First Name)</label>
          <input type="text" class="form-control" name="principal_applicant_given_name" maxlength="35" value="<?php echo showData('principal_applicant_given_name') ?>" />
        </div>
        <div class="col-md-4">
          <label class="control-label  ">Middle Name (if applicable)</label>
          <input type="text" class="form-control" name="principal_applicant_middle_name" maxlength="35" value="<?php echo showData('principal_applicant_middle_name') ?>" />
        </div>
        <div class="col-md-6">
          <label class="control-label  ">Principal Applicant's A-Number (if any)</label>
          <input type="text" class="form-control" name="principal_applicant_a_number" maxlength="9" value="<?php echo showData('principal_applicant_a_number') ?>" />
        </div>
        <div class="col-md-6">
          <label class="control-label  ">Principal Applicant's Date of Birth (mm/dd/yyyy)</label>
          <input type="date" class="form-control" name="principal_applicant_date_of_birth" value="<?php echo showData('principal_applicant_date_of_birth') ?>" />
        </div>
      </div>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>I am applying based on the following category (You must select <b>ONLY ONE</b> category. If you are filing as a derivative applicant, select the appropriate box based on the category under which the principal applicant is applying or has applied. See the Form I-485 Instructions for more information, including any <b>Additional Instructions</b> that relate to the immigrant category you select.):</b>
      </label>

      <div style="margin-left: 20px;">
        <h5><b>3.a. Family-based</b></h5>

        <label class="control-label"><b>Immediate relative of a U.S. citizen, Form I-130, I-129F, or I-360 (select your specific category below):</b></label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_spouse_citizen") ?> Spouse of a U.S. Citizen.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_child_under_21_citizen") ?> Unmarried child under 21 years of age of a U.S. citizen.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_parent_citizen") ?> Parent of a U.S. citizen (if the citizen is at least 21 years of age).
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_fiance_citizen") ?> Person admitted to the United States as a fiancé(e) or child of a fiancé(e) of a U.S. citizen (K-1/K-2 Nonimmigrant).
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_widow_citizen") ?> Widow or widower of a U.S. citizen.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_military_relative") ?> Spouse, child, or parent of a deceased U.S. active-duty service member in the armed forces under the National Defense Authorization Act (NDAA).
        </label><br>

        <label class="control-label" style="margin-top: 15px;"><b>Other relative of a U.S. citizen under the family-based preference categories, Form I-130 (select your specific category below):</b></label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_unmarried_son_daughter_21_plus") ?> Unmarried son or daughter of a U.S. citizen and I am 21 years of age or older.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_married_son_daughter") ?> Married son or daughter of a U.S. citizen.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_brother_sister") ?> Brother or sister of a U.S. citizen (if the citizen is at least 21 years of age).
        </label><br>

        <label class="control-label" style="margin-top: 15px;"><b>Relative of a lawful permanent resident under the family-based preference categories, Form I-130 (select your specific category below):</b></label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_spouse_lpr") ?> Spouse of a lawful permanent resident.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_child_under_21_lpr") ?> Unmarried child under 21 years of age of a lawful permanent resident.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_unmarried_son_daughter_21_plus_lpr") ?> Unmarried son or daughter of a lawful permanent resident and I am 21 years of age or older.
        </label><br>

        <label class="control-label" style="margin-top: 15px;"><b>VAWA self-petitioner (victim of battery or extreme cruelty), Form I-360 (select your specific category below):</b></label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_vawa_spouse") ?> VAWA self-petitioning spouse of a U.S. citizen or lawful permanent resident.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_vawa_child") ?> VAWA self-petitioning child of a U.S. citizen or lawful permanent resident.
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("category_vawa_parent") ?> VAWA self-petitioning parent of a U.S. citizen (if the citizen is at least 21 years of age).
        </label><br>
      </div>
    </div>
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />

</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 6-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <p style="text-align: right"><b>Page 6 of 24</b></p>

  <div class="bg-info" style="margin-top:10px;">
    <h4><b>Part 2. Application Type or Filing Category (continued)</b></h4>
  </div>

  <div class="col-md-12">
    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>3.b. Employment-based</b>
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_alien_investor") ?> Alien Investor, Form I-526 or Form I-526E
      </label><br>

      <label class="control-label"><b>Alien Workers, Form I-140 (select your category below and answer the following questions below, as applicable):</b></label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_extraordinary_ability") ?> Alien of Extraordinary Ability
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_outstanding_professor") ?> Outstanding Professor or Researcher
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_multinational_executive") ?> Multinational Executive or Manager
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_advanced_degree") ?> Member of the Professions Holding an Advanced Degree or Alien of Exceptional Ability (who is NOT seeking a National Interest Waiver)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_professional") ?> A Professional (at a minimum, requiring a bachelor's degree or a foreign degree equivalent to a U.S. bachelor's degree)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_skilled_worker") ?> A Skilled Worker (requiring at least 2 years of specialized training or experience)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_other_worker") ?> Any Other Worker (requiring less than 2 years of training or experience)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_national_interest") ?> An Alien Applying For a National Interest Waiver (who IS a member of the professions holding an advanced degree or an alien of exceptional ability)
      </label><br>

      <label class="control-label" style="margin-top: 15px;">
        <b>Did a relative file the associated Form I-140 for you (or for the principal applicant if you are a derivative applicant) or does a relative have a significant ownership interest (5 percent or more) in the business that filed Form I-140 for you (or for the principal applicant, if you are a derivative applicant)?</b>
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("relative_filed_i140_na") ?> N/A (I am adjusting on the basis of a Form I-140 self-petition)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("relative_filed_i140_no") ?> No
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("relative_filed_i140_yes") ?> Yes
      </label><br>

      <div style="margin-left: 20px; margin-top: 10px;">
        <label class="control-label"><b>If you answered "Yes," is this relative your (select only one box):</b></label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_father") ?> Father
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_mother") ?> Mother
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_child") ?> Child
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_adult_son") ?> Adult Son
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_adult_daughter") ?> Adult Daughter
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_brother") ?> Brother
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_sister") ?> Sister
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_relationship_none") ?> None of These
        </label><br>

        <label class="control-label" style="margin-top: 10px;"><b>Is the relative above a:</b></label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_status_citizen") ?> U.S. Citizen
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_status_national") ?> U.S. National
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_status_lpr") ?> Lawful Permanent Resident
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("relative_status_none") ?> None of These
        </label><br>
      </div>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>3.c. Special Immigrant</b>
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_sij") ?> Special Immigrant Juvenile, Form I-360
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_afghan_iraqi") ?> Certain Afghan or Iraqi National, Form I-360 or Form DS-157
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_broadcaster") ?> Certain International Broadcaster, Form I-360
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_g4_nato") ?> Certain G-4 International Organization or Family Member or NATO-6 Employee or Family Member, Form I-360
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_armed_forces") ?> Certain U.S. Armed Forces Members (also known as the Six and Six program), Form I-360
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_panama_canal") ?> Panama Canal Zone Employees, Form I-360
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_physicians") ?> Certain Physicians, Form I-360
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_us_gov_employee") ?> Certain Employee or Former Employee of the U.S. Government Abroad, DS-1884
      </label><br>

      <label class="control-label" style="margin-top: 15px;"><b>Religious Worker, Form I-360 (select your specific category below):</b></label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_minister") ?> Minister of Religion
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_other_religious") ?> Other Religious Worker
      </label><br>
    </div>
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />

</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 7-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <p style="text-align: right"><b>Page 7 of 24</b></p>

  <div class="bg-info" style="margin-top:10px;">
    <h4><b>Part 2. Application Type or Filing Category (continued)</b></h4>
  </div>

  <div class="col-md-12">
    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>3.d. Asylee or Refugee</b>
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_asylee") ?> Asylum Status (Immigration and Nationality Act (INA) section 208), Form I-589 or Form I-730
      </label><br>
      <div style="margin-left: 20px;">
        <label class="control-label ">If you selected asylum, date you were granted asylum (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="asylum_grant_date" value="<?php echo showData('asylum_grant_date') ?>" style="width: 200px; display: inline-block; margin-left: 10px;" />
      </div>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_refugee") ?> Refugee Status (INA section 207), Form I-590 or Form I-730
      </label><br>
      <div style="margin-left: 20px;">
        <label class="control-label ">If you selected refugee, date of initial admission as refugee (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="refugee_admission_date" value="<?php echo showData('refugee_admission_date') ?>" style="width: 200px; display: inline-block; margin-left: 10px;" />
      </div>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>3.e. Human Trafficking Victim or Crime Victim</b>
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_t_nonimmigrant") ?> Human Trafficking Victim (T Nonimmigrant), Form I-914 or Derivative Family Member, Form I-914A
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_u_nonimmigrant") ?> Victim of Qualifying Criminal Activity (U Nonimmigrant), Form I-918, Derivative Family Member, Form I-918A, or Qualifying Family Member, Form I-929
      </label><br>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>3.f. Special Programs Based on Certain Public Laws</b>
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_cuban_adjustment") ?> The Cuban Adjustment Act
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_cuban_battery_victim") ?> A Victim of Battery or Extreme Cruelty as a Spouse or Child Under the Cuban Adjustment Act
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_haitian_dependent") ?> Applicant Adjusting Based on Dependent Status Under the Haitian Refugee Immigrant Fairness Act
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_haitian_battery_victim") ?> A Victim of Battery or Extreme Cruelty as a Spouse or Child Applying Based on Dependent Status Under the Haitian Refugee Immigrant Fairness Act
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_lautenberg") ?> Lautenberg Parolees
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_diplomats") ?> Diplomats or High-Ranking Officials Unable to Return Home (Section 13 of the Act of September 11, 1957)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_vietnam_cambodia_laos") ?> Nationals of Vietnam, Cambodia, and Laos Applying for Adjustment of Status Under section 586 of Public Law 106-429
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_amensian_act") ?> Applicant Adjusting Under the Amensian Act (October 22, 1982), Form I-360
      </label><br>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>3.g. Additional Options</b>
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_diversity_visa") ?> Diversity Visa program
      </label><br>
      <div style="margin-left: 20px;">
        <label class="control-label ">If you selected Diversity Visa program, provide your Diversity Visa Rank Number:</label>
        <input type="text" class="form-control" name="diversity_visa_rank_number" maxlength="20" value="<?php echo showData('diversity_visa_rank_number') ?>" style="width: 200px; display: inline-block; margin-left: 10px;" />
      </div>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("category_continuous_residence") ?> Continuous Residence in the United States Since Before January 1, 1972 ("Registry")
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_diplomatic_birth") ?> Individual Born in the United States Under Diplomatic Status
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_s_nonimmigrant") ?> S Nonimmigrants and Qualifying Family Members (can only adjust in this category with an approved Form I-854B filed by a law enforcement officer)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("category_other_eligibility") ?> Other Eligibility
      </label><br>
    </div>

    <hr style="border-top: 1px solid #000; margin: 20px 0;">

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>4.</b> If you selected a family-based, employment-based, special immigrant, or Diversity Visa immigrant category listed above in Item Numbers 3.a. - 3.g. as the basis for your application for adjustment of status, are you applying for adjustment based on INA section 245(i)?
      </label><br>
      <input type="radio" name="ina_245i_status" id="ina_245i_yes" value="yes" <?php echo (showData('ina_245i_status') == 'yes') ? 'checked' : '' ?>>
      <label for="ina_245i_yes">Yes</label><br>
      <input type="radio" name="ina_245i_status" id="ina_245i_no" value="no" <?php echo (showData('ina_245i_status') == 'no') ? 'checked' : '' ?>>
      <label for="ina_245i_no">No</label><br>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>5.</b> Are you 21 years of age or older and applying for adjustment based on classification as a child, under the provisions of the Child Status Protection Act (CSPA)?
      </label><br>
      <input type="radio" name="cspa_status" id="cspa_yes" value="yes" <?php echo (showData('cspa_status') == 'yes') ? 'checked' : '' ?>>
      <label for="cspa_yes">Yes</label><br>
      <input type="radio" name="cspa_status" id="cspa_no" value="no" <?php echo (showData('cspa_status') == 'no') ? 'checked' : '' ?>>
      <label for="cspa_no">No</label><br>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>NOTE:</b> For more information to determine if you are eligible under CSPA, see the <b>Who May File Form I-485</b> section of these Instructions.
      </label>
    </div>
  </div>
  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 8-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <p style="text-align: right"><b>Page 8 of 24</b></p>

  <div class="bg-info" style="margin-top:10px;">
    <h4><b>Part 3. Request for Exemption for Intending Immigrant's Affidavit of Support Under Section 213A of the INA</b></h4>
  </div>

  <div>
    <div class="col-md-12 my-4">
      <label class="control-label">
        I am requesting an exemption from submitting an Affidavit of Support Under Section 213A of the INA (Form I-864 or Form I-864EZ) because (select only one):
      </label>
      <br>
      <label class="control-label">
        <?php echo createCheckbox("exemption_40_quarters") ?> <b>1.a.</b> I have earned or can receive credit for 40 qualifying quarters (credits) of work in the United States (as defined by the Social Security Act (SSA)). (Attach your SSA earnings statements. Do not count any quarters during which you received a means-tested public benefit.)
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("exemption_under_18") ?> <b>1.b.</b> I am under 18 years of age, unmarried, the child of a U.S. citizen, am not likely to become a public charge, and will automatically become a U.S. citizen under INA section 320, upon my admission as a lawful permanent resident.
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("exemption_widow") ?> <b>1.c.</b> I am applying under the widow or widower of a U.S. citizen (Form I-360) immigrant category.
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("exemption_vawa") ?> <b>1.d.</b> I am applying as a VAWA self-petitioner.
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("exemption_none_not_required") ?> <b>1.e.</b> None of these exemptions apply to me and I am not required by statute to submit an Affidavit of Support Under Section 213A of the INA, nor am I required to request an exemption.
      </label><br>
      <label class="control-label">
        <?php echo createCheckbox("exemption_none_required") ?> <b>1.f.</b> None of these exemptions apply to me and I am not requesting an exemption as I am required to submit an Affidavit of Support Under Section 213A of the INA.
      </label><br>
    </div>
  </div>

  <div class="col-md-12">

    <div class="bg-info" style="margin-top:20px;">
      <h4><b>Part 4. Additional Information About You</b></h4>
    </div>
    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>1.</b> Have you ever applied for an immigrant visa to obtain permanent resident status at a U.S. Embassy or U.S. Consulate abroad?
      </label><br>
      <input type="radio" name="applied_immigrant_visa" id="applied_visa_yes" value="yes" <?php echo (showData('applied_immigrant_visa') == 'yes') ? 'checked' : '' ?>>
      <label for="applied_visa_yes">Yes</label><br>
      <input type="radio" name="applied_immigrant_visa" id="applied_visa_no" value="no" <?php echo (showData('applied_immigrant_visa') == 'no') ? 'checked' : '' ?>>
      <label for="applied_visa_no">No</label><br>

      <label class="control-label" style="margin-top: 10px;">
        If you answered "Yes," complete Item Numbers 2. - 4. below.
      </label>
    </div>

    <div style="margin-left: 20px;">
      <div class="col-md-6">
        <label class="control-label "><b>2.</b> Location of U.S. Embassy or U.S. Consulate</label>
        <input type="text" class="form-control" name="embassy_city" placeholder="City or Town" maxlength="30" value="<?php echo showData('embassy_city') ?>" style="margin-bottom: 5px;" />
        <input type="text" class="form-control" name="embassy_country" placeholder="Country" maxlength="30" value="<?php echo showData('embassy_country') ?>" />
      </div>
      <div class="col-md-6">
        <label class="control-label "><b>3.</b> Decision (for example, approved, refused, denied, withdrawn)</label>
        <input type="text" class="form-control" name="visa_decision" maxlength="30" value="<?php echo showData('visa_decision') ?>" />
      </div>
      <div class="col-md-6">
        <label class="control-label "><b>4.</b> Date of Decision (mm/dd/yyyy)</label>
        <input type="date" class="form-control" name="visa_decision_date" value="<?php echo showData('visa_decision_date') ?>" />
      </div>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>5.</b> Have you previously applied for permanent residence while in the United States?
      </label><br>
      <input type="radio" name="applied_permanent_residence" id="applied_pr_yes" value="yes" <?php echo (showData('applied_permanent_residence') == 'yes') ? 'checked' : '' ?>>
      <label for="applied_pr_yes">Yes</label><br>
      <input type="radio" name="applied_permanent_residence" id="applied_pr_no" value="no" <?php echo (showData('applied_permanent_residence') == 'no') ? 'checked' : '' ?>>
      <label for="applied_pr_no">No</label><br>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>6.</b> Have you EVER held lawful permanent resident status which was later rescinded under INA section 246?
      </label><br>
      <input type="radio" name="lpr_rescinded" id="lpr_rescinded_yes" value="yes" <?php echo (showData('lpr_rescinded') == 'yes') ? 'checked' : '' ?>>
      <label for="lpr_rescinded_yes">Yes</label><br>
      <input type="radio" name="lpr_rescinded" id="lpr_rescinded_no" value="no" <?php echo (showData('lpr_rescinded') == 'no') ? 'checked' : '' ?>>
      <label for="lpr_rescinded_no">No</label><br>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>7.</b> Provide ALL of your employment and educational history for the last 5 years as indicated in the Instructions. Provide your current employment or school attended first. Include periods of self-employment, unemployment, or retirement. For each period of unemployment or retirement, list source of financial support. If you have additional employment or educational history, use the space provided in Part 14. Additional Information.
      </label>

      <div style="margin-top: 15px;">
        <div class="col-md-6">
          <label class="control-label ">Employer or School (current or most recent)</label>
          <input type="text" class="form-control" name="current_employer_school" maxlength="50" value="<?php echo showData('current_employer_school') ?>" />
        </div>
        <div class="col-md-6">
          <label class="control-label ">Name of Employer, Company, or School</label>
          <input type="text" class="form-control" name="employer_company_name" maxlength="50" value="<?php echo showData('employer_company_name') ?>" />
        </div>
        <div class="col-md-12">
          <label class="control-label ">Your Occupation (if unemployed or retired, so state)</label>
          <input type="text" class="form-control" name="current_occupation" maxlength="50" value="<?php echo showData('current_occupation') ?>" />
        </div>
      </div>
    </div>
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 9-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 9 of 24</b></p>
  </div>

  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 4. Additional Information About You (continued)</b></h4>
    </div>


    <div class="mt-4">
      <p class="font-bold mb-3">Address of Employer, Company, or School</p>

      <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
              <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
              <div style="width: 100%;">
                <input type="text" maxlength="63" class="form-control" name="employer_address_street" value="<?php echo showData('employer_address_street') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
              <div style="flex: 1; margin-left: 5%;">
                <label>
                  <input type="radio" name="employer_address_apt_ste_flr" value="apt" <?php echo (showData('employer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                </label>
                <label>
                  <input type="radio" name="employer_address_apt_ste_flr" value="ste" <?php echo (showData('employer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                </label>
                <label>
                  <input type="radio" name="employer_address_apt_ste_flr" value="flr" <?php echo (showData('employer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                </label>
              </div>
            </div>
            <div style="flex: 1;">
              <label class="control-label">Number</label>
              <input type="text" class="form-control" name="employer_address_apt_ste_flr_value" maxlength="5" value="<?php echo showData('employer_address_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="employer_address_city_town" maxlength="63" value="<?php echo showData('employer_address_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
              <div style="width: 100%;">
                <select class="form-control" name="employer_address_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                  <option value=''>Select</option>
                  <?php
                  foreach ($allDataCountry as $record) {
                    if ($record->state_code == showData('employer_address_state')) $selected = "selected";
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
                <input type="text" class="form-control" name="employer_address_zip_code" maxlength="5" value="<?php echo showData('employer_address_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="employer_address_province" maxlength="26" value="<?php echo showData('employer_address_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="employer_address_postal_code" maxlength="9" value="<?php echo showData('employer_address_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="employer_address_country" maxlength="37" value="<?php echo showData('employer_address_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Employment, Unemployment, Retirement, or School Attendance: <br> From (mm/dd/yyyy)</label>
              <div style="width: 100%;">
                <input type="date" class="form-control" name="employment_from_date" value="<?php echo showData('employment_from_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Employment, Unemployment, Retirement, or School Attendance: <br> To (mm/dd/yyyy)</label>
              <div style="width: 100%;">
                <input type="date" class="form-control" name="employment_to_date" value="<?php echo showData('employment_to_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">If unemployed or retired, source of financial support:</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="financial_support_source" maxlength="50" value="<?php echo showData('financial_support_source') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="mt-5">
      <p class="font-bold mb-3"><span class="mr-3">8.</span> Provide your most recent employer or school outside of the United States (if not already listed above).</p>

      <div class="row ml-2">
        <div class="col-md-6 mb-3">
          <label>Name of Employer, Company, or School</label>
          <input
            type="text"
            maxlength="50"
            class="form-control"
            name="foreign_employer_name"
            value="<?php echo showData('foreign_employer_name'); ?>" />
        </div>
        <div class="col-md-6 mb-3">
          <label>Your Occupation (if unemployed or retired, so state)</label>
          <input
            type="text"
            maxlength="50"
            class="form-control"
            name="foreign_occupation"
            value="<?php echo showData('foreign_occupation'); ?>" />
        </div>
      </div>


      <div class="form-group">
        <div style="margin-left:1.5%; margin-right: 1.5%;">
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
              <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
              <div style="width: 100%;">
                <input type="text" maxlength="63" class="form-control" name="foreign_employer_address_street" value="<?php echo showData('foreign_employer_address_street') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
              <div style="flex: 1; margin-left: 5%;">
                <label>
                  <input type="radio" name="foreign_employer_address_apt_ste_flr" value="apt" <?php echo (showData('foreign_employer_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                </label>
                <label>
                  <input type="radio" name="foreign_employer_address_apt_ste_flr" value="ste" <?php echo (showData('foreign_employer_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                </label>
                <label>
                  <input type="radio" name="foreign_employer_address_apt_ste_flr" value="flr" <?php echo (showData('foreign_employer_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                </label>
              </div>
            </div>
            <div style="flex: 1;">
              <label class="control-label">Number</label>
              <input type="text" class="form-control" name="foreign_employer_address_apt_ste_flr_value" maxlength="5" value="<?php echo showData('foreign_employer_address_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="foreign_employer_city_town" maxlength="63" value="<?php echo showData('foreign_employer_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
              <div style="width: 100%;">
                <select class="form-control" name="foreign_employer_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                  <option value=''>Select</option>
                  <?php
                  foreach ($allDataCountry as $record) {
                    if ($record->state_code == showData('foreign_employer_state')) $selected = "selected";
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
                <input type="text" class="form-control" name="foreign_employer_zip_code" maxlength="5" value="<?php echo showData('foreign_employer_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="foreign_employer_province" maxlength="26" value="<?php echo showData('foreign_employer_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="foreign_employer_postal_code" maxlength="9" value="<?php echo showData('foreign_employer_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="foreign_employer_country" maxlength="37" value="<?php echo showData('foreign_employer_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Employment, Unemployment, Retirement, or School Attendance: <br>From (mm/dd/yyyy)</label>
              <div style="width: 100%;">
                <input type="date" class="form-control" name="foreign_employment_from_date" value="<?php echo showData('foreign_employment_from_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">Dates of Employment, Unemployment, Retirement, or School Attendance: <br>To (mm/dd/yyyy)</label>
              <div style="width: 100%;">
                <input type="date" class="form-control" name="foreign_employment_to_date" value="<?php echo showData('foreign_employment_to_date') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 1; margin-bottom: 10px;">
              <label class="control-label" style="width: 100%; margin-bottom: 5px;">If unemployed or retired, source of financial support:</label>
              <div style="width: 100%;">
                <input type="text" class="form-control" name="foreign_financial_support_source" maxlength="50" value="<?php echo showData('foreign_financial_support_source') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-info">
      <h4><b>Part 5. Information About Your Parents</b></h4>
    </div>

    <div class="mt-4">
      <h5 class="font-bold">Information About Your Parent 1</h5>

      <div class="mt-4">
        <p><b>1. Parent 1's Legal Name</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>Family Name (Last Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent1_family_last_name"
              value="<?php echo showData('parent1_family_last_name'); ?>" />
          </div>

          <div class="col-md-4">
            <label>Given Name (First Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent1_given_first_name"
              value="<?php echo showData('parent1_given_first_name'); ?>" />
          </div>

          <div class="col-md-4">
            <label>Middle Name (if applicable)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent1_middle_name"
              value="<?php echo showData('parent1_middle_name'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <p><b>2. Parent 1's Name at Birth (if different than above)</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>Family Name (Last Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent1_birth_family_last_name"
              value="<?php echo showData('parent1_birth_family_last_name'); ?>" />
          </div>

          <div class="col-md-4">
            <label>Given Name (First Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent1_birth_given_first_name"
              value="<?php echo showData('parent1_birth_given_first_name'); ?>" />
          </div>

          <div class="col-md-4">
            <label>Middle Name (if applicable)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent1_birth_middle_name"
              value="<?php echo showData('parent1_birth_middle_name'); ?>" />
          </div>
        </div>
      </div>

      <div class="mt-4">
        <p><b>3. Date of Birth (mm/dd/yyyy)</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="date"
              class="form-control"
              name="parent1_date_of_birth"
              value="<?php echo showData('parent1_date_of_birth'); ?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />



</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 10-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 10 of 24</b></p>
  </div>
  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 5. Information About Your Parents (continued)</b></h4>
    </div>
    <div class="mt-4">
      <p><b>4. Country of Birth</b></p>
      <div class="row">
        <div class="col-md-4">
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="parent1_country_of_birth"
            value="<?php echo showData('parent1_country_of_birth'); ?>" />
        </div>
      </div>
    </div>
    <div class="mt-5">
      <div class="bg-info">
        <h4 class="font-bold ">Information About Your Parent 2</h4>
      </div>
      <div class="mt-4">
        <p><b>5. Parent 2's Legal Name</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>Family Name (Last Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_family_last_name"
              value="<?php echo showData('parent2_family_last_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Given Name (First Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_given_first_name"
              value="<?php echo showData('parent2_given_first_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Middle Name (if applicable)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_middle_name"
              value="<?php echo showData('parent2_middle_name'); ?>" />
          </div>
        </div>
      </div>
      <div class="mt-4">
        <p><b>6. Parent 2's Name at Birth (if different than above)</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>Family Name (Last Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_birth_family_last_name"
              value="<?php echo showData('parent2_birth_family_last_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Given Name (First Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_birth_given_first_name"
              value="<?php echo showData('parent2_birth_given_first_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Middle Name (if applicable)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_birth_middle_name"
              value="<?php echo showData('parent2_birth_middle_name'); ?>" />
          </div>
        </div>
      </div>
      <div class="mt-4">
        <p><b>7. Date of Birth (mm/dd/yyyy)</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="date"
              class="form-control"
              name="parent2_date_of_birth"
              value="<?php echo showData('parent2_date_of_birth'); ?>" />
          </div>
        </div>
      </div>
      <div class="mt-4">
        <p><b>8. Country of Birth</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="parent2_country_of_birth"
              value="<?php echo showData('parent2_country_of_birth'); ?>" />
          </div>
        </div>
      </div>
    </div>

    <hr class="my-5">


    <div class="bg-info">
      <h4><b>Part 6. Information About Your Marital History</b></h4>
    </div>


    <div class="mt-4">
      <p><b>1. What is your current marital status?</b></p>
      <div class="row">
        <div class="col-md-12">
          <label class="control-label">
            <?php echo createCheckbox("marital_status_single") ?> Single, Never Married
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("marital_status_married") ?> Married
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("marital_status_divorced") ?> Divorced
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("marital_status_widowed") ?> Widowed
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("marital_status_annulled") ?> Marriage Annulled
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("marital_status_separated") ?> Legally Separated
          </label><br>
        </div>
      </div>
    </div>


    <div class="mt-4">
      <p><b>2. If you are married, is your spouse a current member of the U.S. armed forces or U.S. Coast Guard?</b></p>
      <div class="row">
        <div class="col-md-12">
          <label class="control-label">
            <?php echo createCheckbox("spouse_military_na") ?> N/A
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("spouse_military_yes") ?> Yes
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("spouse_military_no") ?> No
          </label><br>
        </div>
      </div>
    </div>


    <div class="mt-4">
      <p><b>3. How many times have you been married (including your current marriage, marriages abroad, annulled marriages, and marriages to the same person)?</b></p>
      <div class="row">
        <div class="col-md-4">
          <input
            type="text"
            maxlength="2"
            class="form-control"
            name="number_of_marriages"
            value="<?php echo showData('number_of_marriages'); ?>" />
        </div>
      </div>
    </div>

    <div class="mt-5">
      <div class="bg-info">
        <h4 class="font-bold">Information About Your Current Marriage (including if you are legally separated)</h4>

      </div>

      <div class="mt-4">
        <p><b>4. Current Spouse's Legal Name</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>Family Name (Last Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="spouse_family_last_name"
              value="<?php echo showData('spouse_family_last_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Given Name (First Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="spouse_given_first_name"
              value="<?php echo showData('spouse_given_first_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Middle Name (if applicable)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="spouse_middle_name"
              value="<?php echo showData('spouse_middle_name'); ?>" />
          </div>
        </div>
      </div>

      <div class="mt-4">
        <p><b>5. Current Spouse's A-Number (if any)</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="text"
              maxlength="9"
              class="form-control"
              name="spouse_a_number"
              value="<?php echo showData('spouse_a_number'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Current Spouse's Date of Birth (mm/dd/yyyy)</label>
            <input
              type="date"
              class="form-control"
              name="spouse_date_of_birth"
              value="<?php echo showData('spouse_date_of_birth'); ?>" />
          </div>
        </div>
      </div>

      <div class="mt-4">
        <p><b>7. Current Spouse's Country of Birth</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="spouse_country_of_birth"
              value="<?php echo showData('spouse_country_of_birth'); ?>" />
          </div>
        </div>
      </div>

      <div class="mt-4">
        <p><b>8. Current Spouse's Current Physical Address</b></p>
        <div class="form-group">
          <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
            <div class="form-group" style="flex: 3; margin-bottom: 10px;">
              <label class="control-label" style=" margin-bottom: 5px;">Street Number and Name</label>
              <div style="width: 100%;">
                <input type="text" maxlength="63" class="form-control" name="spouse_address_street" value="<?php echo showData('spouse_address_street') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
              </div>
            </div>
            <div class="form-group" style="flex: 1; display: flex; align-items: center; margin-top: 40px; ">
              <div style="flex: 1; margin-left: 5%;">
                <label>
                  <input type="radio" name="spouse_address_apt_ste_flr" value="apt" <?php echo (showData('spouse_address_apt_ste_flr') === 'apt') ? 'checked' : ''; ?>> Apt. &nbsp;
                </label>
                <label>
                  <input type="radio" name="spouse_address_apt_ste_flr" value="ste" <?php echo (showData('spouse_address_apt_ste_flr') === 'ste') ? 'checked' : ''; ?>> Ste. &nbsp;
                </label>
                <label>
                  <input type="radio" name="spouse_address_apt_ste_flr" value="flr" <?php echo (showData('spouse_address_apt_ste_flr') === 'flr') ? 'checked' : ''; ?>> Flr.
                </label>
              </div>
            </div>
            <div style="flex: 1;">
              <label class="control-label">Number</label>
              <input type="text" class="form-control" name="spouse_address_apt_ste_flr_value" maxlength="5" value="<?php echo showData('spouse_address_apt_ste_flr_value') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
            </div>
          </div>
          <div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px; justify-items:center; align-items: center;">
              <div class="form-group" style="flex: 3; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">City or Town</label>
                <div style="width: 100%;">
                  <input type="text" class="form-control" name="spouse_address_city_town" maxlength="63" value="<?php echo showData('spouse_address_city_town') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
              </div>
              <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">State</label>
                <div style="width: 100%;">
                  <select class="form-control" name="spouse_address_state" style="width: 100%; padding: 5px; margin-top: 3%;">
                    <option value=''>Select</option>
                    <?php
                    foreach ($allDataCountry as $record) {
                      if ($record->state_code == showData('spouse_address_state')) $selected = "selected";
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
                  <input type="text" class="form-control" name="spouse_address_zip_code" maxlength="5" value="<?php echo showData('spouse_address_zip_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
              </div>
            </div>
            <div class="row" style="display: flex; flex-wrap: wrap; margin-bottom: 10px;">
              <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Province</label>
                <div style="width: 100%;">
                  <input type="text" class="form-control" name="spouse_address_province" maxlength="26" value="<?php echo showData('spouse_address_province') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
              </div>
              <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Postal Code</label>
                <div style="width: 100%;">
                  <input type="text" class="form-control" name="spouse_address_postal_code" maxlength="9" value="<?php echo showData('spouse_address_postal_code') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
              </div>
              <div class="form-group" style="flex: 1; margin-bottom: 10px;">
                <label class="control-label" style="width: 100%; margin-bottom: 5px;">Country</label>
                <div style="width: 100%;">
                  <input type="text" class="form-control" name="spouse_address_country" maxlength="37" value="<?php echo showData('spouse_address_country') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 11-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 11 of 24</b></p>
  </div>

  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 6. Information About Your Marital History (continued)</b></h4>
    </div>


    <div class="mt-4">
      <p><b>9. Place of Marriage to Current Spouse</b></p>
      <div class="row">
        <div class="col-md-6">
          <label>City or Town</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="current_marriage_city"
            value="<?php echo showData('current_marriage_city'); ?>" />
        </div>
        <div class="col-md-6">
          <label>State or Province</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="current_marriage_state"
            value="<?php echo showData('current_marriage_state'); ?>" />
        </div>
        <div class="col-md-6">
          <label>Country</label>
          <input
            type="text"
            maxlength="29"
            class="form-control"
            name="current_marriage_country"
            value="<?php echo showData('current_marriage_country'); ?>" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-6">
          <label>Date of Marriage to Current Spouse (mm/dd/yyyy)</label>
          <input
            type="date"
            class="form-control"
            name="current_marriage_date"
            value="<?php echo showData('current_marriage_date'); ?>" />
        </div>
      </div>
    </div>

    <div class="col-md-12 my-4">
      <label class="control-label">
        <b>10.</b> Is your current spouse applying with you?
      </label><br>
      <input type="radio" name="spouse_applying_yes" id="cspa_yes" value="yes" <?php echo (showData('spouse_applying_yes') == 'yes') ? 'checked' : '' ?>>
      <label for="cspa_yes">Yes</label><br>
      <input type="radio" name="spouse_applying_yes" id="cspa_no" value="no" <?php echo (showData('spouse_applying_yes') == 'no') ? 'checked' : '' ?>>
      <label for="cspa_no">No</label><br>
    </div>

    <div class="mt-5">
      <div class="bg-info">
        <h5 class="font-bold">Information About Prior Marriages (if any)</h5>
      </div>


      <div class="mt-4">
        <p><b>11. Prior Spouse's Legal Name (provide family name before marriage)</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>Family Name (Last Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_spouse_family_last_name"
              value="<?php echo showData('prior_spouse_family_last_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Given Name (First Name)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_spouse_given_first_name"
              value="<?php echo showData('prior_spouse_given_first_name'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Middle Name (if applicable)</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_spouse_middle_name"
              value="<?php echo showData('prior_spouse_middle_name'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <p><b>12. Prior Spouse's Date of Birth (mm/dd/yyyy)</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="date"
              class="form-control"
              name="prior_spouse_date_of_birth"
              value="<?php echo showData('prior_spouse_date_of_birth'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <div class="row">
          <div class="col-md-6">
            <p><b>13. Prior Spouse's Country of Birth</b></p>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_spouse_country_of_birth"
              value="<?php echo showData('prior_spouse_country_of_birth'); ?>" />
          </div>
          <div class="col-md-6">
            <p><b>14. Prior Spouse's Country of Citizenship or Nationality</b></p>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_spouse_country_of_citizenship"
              value="<?php echo showData('prior_spouse_country_of_citizenship'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <p><b>15. Date of Marriage to Prior Spouse (mm/dd/yyyy)</b></p>
        <div class="row">
          <div class="col-md-4">
            <input
              type="date"
              class="form-control"
              name="prior_marriage_date"
              value="<?php echo showData('prior_marriage_date'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <p><b>16. Place of Marriage to Prior Spouse</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>City or Town</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_marriage_city"
              value="<?php echo showData('prior_marriage_city'); ?>" />
          </div>
          <div class="col-md-4">
            <label>State or Province</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_marriage_state"
              value="<?php echo showData('prior_marriage_state'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Country</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_marriage_country"
              value="<?php echo showData('prior_marriage_country'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <p><b>17. Place Where Marriage with Prior Spouse Legally Ended</b></p>
        <div class="row">
          <div class="col-md-4">
            <label>City or Town</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_marriage_end_city"
              value="<?php echo showData('prior_marriage_end_city'); ?>" />
          </div>
          <div class="col-md-4">
            <label>State or Province</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_marriage_end_state"
              value="<?php echo showData('prior_marriage_end_state'); ?>" />
          </div>
          <div class="col-md-4">
            <label>Country</label>
            <input
              type="text"
              maxlength="29"
              class="form-control"
              name="prior_marriage_end_country"
              value="<?php echo showData('prior_marriage_end_country'); ?>" />
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-4">
            <label>Date of Marriage with Prior Spouse Legally Ended (mm/dd/yyyy)</label>
            <input
              type="date"
              class="form-control"
              name="prior_marriage_end_date"
              value="<?php echo showData('prior_marriage_end_date'); ?>" />
          </div>
        </div>
      </div>


      <div class="mt-4">
        <p><b>18. How Marriage Ended with Prior Spouse (select one):</b></p>
        <div class="row">
          <div class="col-md-12">
            <label class="control-label">
              <?php echo createCheckbox("prior_marriage_ended_annulled") ?> Annulled
            </label><br>
            <label class="control-label">
              <?php echo createCheckbox("prior_marriage_ended_divorced") ?> Divorced
            </label><br>
            <label class="control-label">
              <?php echo createCheckbox("prior_marriage_ended_spouse_deceased") ?> Spouse Deceased
            </label><br>
            <label class="control-label">
              <?php echo createCheckbox("prior_marriage_ended_other") ?> Other (Explain):
            </label>
            <input
              type="text"
              maxlength="50"
              class="form-control mt-2"
              name="prior_marriage_ended_other_explain"
              value="<?php echo showData('prior_marriage_ended_other_explain'); ?>"
              style="width: 50%;" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 12-------------------------------
------------------------------------------------------------------------>

<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 12 of 24</b></p>
  </div>

  <div class="p-5">
    <div class="bg-info">
      <h4><b>Part 7. Information About Your Children</b></h4>
    </div>

    <div class="mt-4">
      <p><b>1.</b> Indicate the total number of <b>ALL living children</b> anywhere in the world (including adult sons and daughters) that you have.</p>
      <div class="row mt-2">
        <div class="col-md-4">
          <input
            type="number"
            min="0"
            class="form-control"
            name="total_living_children"
            value="<?php echo showData('total_living_children'); ?>" />
        </div>
      </div>

      <p class="mt-3" style="font-size: 14px;">
        <b>NOTE:</b> The term “children” includes all biological or legally adopted children, as well as current stepchildren, of any age,
        whether born in the United States or other countries, married or unmarried, living with you or elsewhere and includes any missing
        children and those born to you outside of marriage.
      </p>

      <p class="mt-3">
        Provide the following information for each of your children. If you have more than two children, use the space provided in
        <b>Part 14. Additional Information.</b>
      </p>
    </div>

    <div class="mt-5">
      <p><b>2. Child 1</b></p>

      <p><b>Current Legal Name</b></p>
      <div class="row">
        <div class="col-md-4">
          <label>Family Name (Last Name)</label>
          <input type="text" class="form-control" name="child1_last_name" value="<?php echo showData('child1_last_name'); ?>" />
        </div>
        <div class="col-md-4">
          <label>Given Name (First Name)</label>
          <input type="text" class="form-control" name="child1_first_name" value="<?php echo showData('child1_first_name'); ?>" />
        </div>
        <div class="col-md-4">
          <label>Middle Name (if applicable)</label>
          <input type="text" class="form-control" name="child1_middle_name" value="<?php echo showData('child1_middle_name'); ?>" />
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <label>A-Number (if any) ► A-</label>
          <input type="text" class="form-control" name="child1_a_number" value="<?php echo showData('child1_a_number'); ?>" />
        </div>
        <div class="col-md-6">
          <label>Date of Birth (mm/dd/yyyy)</label>
          <input type="date" class="form-control" name="child1_dob" value="<?php echo showData('child1_dob'); ?>" />
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <label>Country of Birth</label>
          <input type="text" class="form-control" name="child1_country_birth" value="<?php echo showData('child1_country_birth'); ?>" />
        </div>
      </div>

      <div class="mt-3">
        <label>What is your child’s relationship to you? (for example, biological child, stepchild, legally adopted child)</label>
        <input type="text" class="form-control" name="child1_relationship" value="<?php echo showData('child1_relationship'); ?>" />
      </div>
      <div class="col-md-12 my-4">
        <label class="control-label">
          <b></b> Is this child also applying now on a separate Form I-485?
        </label><br>

        <input type="radio" name="child_relation1" id="child_relation1_yes" value="Y"
          <?php echo (showData('child_relation1') == 'Y') ? 'checked' : '' ?>>
        <label for="child_relation1_yes">Yes</label><br>

        <input type="radio" name="child_relation1" id="child_relation1_no" value="N"
          <?php echo (showData('child_relation1') == 'N') ? 'checked' : '' ?>>
        <label for="child_relation1_no">No</label><br>
      </div>
    </div>


    <div class="mt-5">
      <p><b>3. Child 2</b></p>

      <p><b>Current Legal Name</b></p>
      <div class="row">
        <div class="col-md-4">
          <label>Family Name (Last Name)</label>
          <input type="text" class="form-control" name="child2_last_name" value="<?php echo showData('child2_last_name'); ?>" />
        </div>
        <div class="col-md-4">
          <label>Given Name (First Name)</label>
          <input type="text" class="form-control" name="child2_first_name" value="<?php echo showData('child2_first_name'); ?>" />
        </div>
        <div class="col-md-4">
          <label>Middle Name (if applicable)</label>
          <input type="text" class="form-control" name="child2_middle_name" value="<?php echo showData('child2_middle_name'); ?>" />
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <label>A-Number (if any) ► A-</label>
          <input type="text" class="form-control" name="child2_a_number" value="<?php echo showData('child2_a_number'); ?>" />
        </div>
        <div class="col-md-6">
          <label>Date of Birth (mm/dd/yyyy)</label>
          <input type="date" class="form-control" name="child2_dob" value="<?php echo showData('child2_dob'); ?>" />
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <label>Country of Birth</label>
          <input type="text" class="form-control" name="child2_country_birth" value="<?php echo showData('child2_country_birth'); ?>" />
        </div>
      </div>

      <div class="mt-3">
        <label>What is your child’s relationship to you? (for example, biological child, stepchild, legally adopted child)</label>
        <input type="text" class="form-control" name="child2_relationship" value="<?php echo showData('child2_relationship'); ?>" />
      </div>
      <div class="col-md-12 my-4">
        <label class="control-label">
          <b></b> Is this child also applying now on a separate Form I-485?
        </label><br>

        <input type="radio" name="child_relation2" id="child_relation2_yes" value="Y"
          <?php echo (showData('child_relation2') == 'Y') ? 'checked' : '' ?>>
        <label for="child_relation2_yes">Yes</label><br>

        <input type="radio" name="child_relation2" id="child_relation2_no" value="N"
          <?php echo (showData('child_relation2') == 'N') ? 'checked' : '' ?>>
        <label for="child_relation2_no">No</label><br>
      </div>

    </div>
  </div>
  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right;margin: 10px;" />
  <input style="float: right;" type="button" name="button" class="submit btn btn-success" value="Save" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 13-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
    <div class="page_number">
      <p style="text-align: right;"><b>Page 13 of 24</b></p>
    </div>
    <div class="bg-info">
      <h4><b>Part 8. Biographic Information</b></h4>
    </div>
    <div class="form-group">
      <label class="control-label col-md-12">1. Ethnicity (Select only one box)</label>
      <div class="col-md-6">
        <div class="form-check">
          <input class="form-check-input" type="radio" id="hispanic" name="i_485_biographic_info_ethnicity" value="hispanic" <?php echo (showData('i_485_biographic_info_ethnicity') == 'hispanic') ? 'checked' : '' ?>>
          <label for="hispanic" class="form-check-label">Hispanic or Latino</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" id="not_hispanic" name="i_485_biographic_info_ethnicity" value="nothispanic" <?php echo (showData('i_485_biographic_info_ethnicity') == 'nothispanic') ? 'checked' : '' ?>>
          <label for="not_hispanic" class="form-check-label">Not Hispanic or Latino</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-12">2. Race (Select all applicable boxes)</label>
      <div class="col-md-12">
        <label class="control-label"><?php echo createCheckbox("i_485_biographic_info_race_american_native") ?>American Indian or Alaska Native</label><br>
        <label class="control-label"><?php echo createCheckbox("i_485_biographic_info_race_asian") ?>Asian</label><br>
        <label class="control-label"><?php echo createCheckbox("i_485_biographic_info_race_black_african") ?>Black or African American</label><br>
        <label class="control-label"><?php echo createCheckbox("i_485_biographic_info_race_native_islander") ?>Native Hawaiian or Other Pacific Islander</label><br>
        <label class="control-label"><?php echo createCheckbox("i_485_biographic_info_race_white") ?>White</label><br>
      </div>
    </div>

    <div style="padding-left: 1.5%;">
      <div>
        <label>3. Height</label>
        <label style="padding-left:10%">Feet:</label>
        <select id="feet" name="i_485_biographic_info_height_feet" style="padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px;">
          <?php echo "<option value=" . showData('i_485_biographic_info_height_feet') . " selected>" . showData('i_485_biographic_info_height_feet') . "</option>"; ?>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
        <label>Inches:</label>
        <select id="inches" name="i_485_biographic_info_height_inches" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
          <?php echo "<option value=" . showData('i_485_biographic_info_height_inches') . " selected>" . showData('i_485_biographic_info_height_inches') . "</option>"; ?>
          <?php for ($i = 0; $i <= 11; $i++) echo "<option value=\"$i\">$i</option>"; ?>
        </select>
      </div>

      <div>
        <label><b>4. Weight</b></label>
        <label style="padding-left:10%"><b>Pounds:</b></label>
        <input type="text" maxlength="1" name="i_485_biographic_info_weight_in_pound1" value="<?php echo showData('i_485_biographic_info_weight_in_pound1') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        <input type="text" maxlength="1" name="i_485_biographic_info_weight_in_pound2" value="<?php echo showData('i_485_biographic_info_weight_in_pound2') ?>" style="width: 40px; margin-right: 10px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        <input type="text" maxlength="1" name="i_485_biographic_info_weight_in_pound3" value="<?php echo showData('i_485_biographic_info_weight_in_pound3') ?>" style="width: 40px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <br>
      <div class="form-group">
        <label>5. Eye Color (Select only one box)</label><br>
        <?php
        $eye_colors = ['black', 'blue', 'brown', 'gray', 'green', 'hazel', 'maroon', 'pink', 'unknown'];
        foreach ($eye_colors as $color) {
          echo "<input type='radio' id='eye_$color' name='i_485_biographic_info_eye_color' value='$color' " . (showData('i_485_biographic_info_eye_color') == $color ? 'checked' : '') . ">";
          echo "<label for='eye_$color'>" . ucfirst($color) . "</label><br>";
        }
        ?>
      </div>

      <br>
      <div class="form-group">
        <label>6. Hair Color (Select only one box)</label><br>
        <?php
        $hair_colors = ['bald', 'black', 'blond', 'brown', 'gray', 'red', 'sandy', 'white', 'unknown'];
        foreach ($hair_colors as $color) {
          echo "<input type='radio' id='hair_$color' name='i_485_biographic_info_hair_color' value='$color' " . (showData('i_485_biographic_info_hair_color') == $color ? 'checked' : '') . ">";
          echo "<label for='hair_$color'>" . ucfirst($color) . "</label><br>";
        }
        ?>
      </div>


      <div class=" my-4">
        <div class="bg-info">
          <h4 class="font-bold ">Part 9. General Eligibility and Inadmissibility Grounds</h4>
        </div>
        <p>
          Choose the answer that you think is correct in Part 9. If you answer “Yes” to any questions (or if you answer “No,” but are unsure of your answer),
          provide an explanation of the events and circumstances in the space provided in <b>Part 14. Additional Information.</b>
        </p>

        <div class="col-md-12 my-3">
          <label class="control-label">
            <b>1.</b> Have you EVER been a member of, involved in, or in any way associated with any organization, association, fund, foundation, party, club, society, or similar group in the United States or in any other location in the world?
          </label>
          <div class="d-flex gap-3 mt-2">
            <div>
              <input type="radio" name="part9_member_in_organization" id="yes_1" value="Y"
                <?php echo (showData('part9_member_in_organization') == 'Y') ? 'checked' : ''; ?>>
              <label for="yes_1">Yes</label>
            </div>
            <div>
              <input type="radio" name="part9_member_in_organization" id="no_1" value="N"
                <?php echo (showData('part9_member_in_organization') == 'N') ? 'checked' : ''; ?>>
              <label for="no_1">No</label>
            </div>
          </div>
        </div>

        <div class="row  my-3">
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">2. Name of Organization</label>
            <input type="text" name="org1_name" class="form-control" value="<?php echo showData('org1_name'); ?>">
          </div>
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">3. City or Town</label>
            <input type="text" name="org1_city" class="form-control" value="<?php echo showData('org1_city'); ?>">
          </div>
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">State or Province</label>
            <input type="text" name="org1_state" class="form-control" value="<?php echo showData('org1_state'); ?>">
          </div>
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">Country</label>
            <input type="text" name="org1_country" class="form-control" value="<?php echo showData('org1_country'); ?>">
          </div>
          <div class="col-md-12">
            <label class="control-label" style="font-size: small;">4. Nature of Organization (including purposes and activities, whether illicit or legitimate)</label>
            <input name="org1_nature" class="form-control" rows="2"><?php echo showData('org1_nature'); ?></input>
          </div>
          <div class="col-md-12">
            <label class="control-label" style="font-size: small;">Nature of involvement (role or positions held, whether illicit or legitimate)</label>
            <input name="org1_involvement" class="form-control" rows="2"><?php echo showData('org1_involvement'); ?></input>
          </div>
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">5. Dates of Membership or Dates of Involvement (From)</label>
            <input type="date" name="org1_from" class="form-control" value="<?php echo showData('org1_from'); ?>">
          </div>
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">To</label>
            <input type="date" name="org1_to" class="form-control" value="<?php echo showData('org1_to'); ?>">
          </div>
        </div>

        <div class="row g-3 my-3 border-top pt-3">
          <div class="col-md-12">
            <label class="fw-bold" style="font-size: small;">Organization 2</label>
          </div>
          <div class="col-md-6">
            <label class="control-label" style="font-size: small;">6. Name of Organization</label>
            <input type="text" name="org2_name" class="form-control" value="<?php echo showData('org2_name'); ?>">
          </div>

        </div>
      </div>
    </div>

    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
    <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 14-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 14 of 24</b></p>
  </div>
  <div class="row">
    <div class="bg-info">
      <h4><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h4>
    </div>

    <div class="col-md-6">
      <label class="control-label" style="font-size: small;">City or Town</label>
      <input type="text" name="org2_city" class="form-control" value="<?php echo showData('org2_city'); ?>">
    </div>
    <div class="col-md-6">
      <label class="control-label" style="font-size: small;">State or Province</label>
      <input type="text" name="org2_state" class="form-control" value="<?php echo showData('org2_state'); ?>">
    </div>
    <div class="col-md-6">
      <label class="control-label" style="font-size: small;">Country</label>
      <input type="text" name="org2_country" class="form-control" value="<?php echo showData('org2_country'); ?>">
    </div>
    <div class="col-md-12">
      <label class="control-label" style="font-size: small;">Nature of Organization (including purposes and activities, whether illicit or legitimate)</label>
      <input name="org2_nature" class="form-control" rows="2"><?php echo showData('org2_nature'); ?></input>
    </div>
    <div class="col-md-12">
      <label class="control-label" style="font-size: small;">Nature of involvement (role or positions held, whether illicit or legitimate)</label>
      <input name="org2_involvement" class="form-control" rows="2"><?php echo showData('org2_involvement'); ?></input>
    </div>
    <div class="col-md-6">
      <label class="control-label" style="font-size: small;">Dates of Membership or Dates of Involvement : From (mm/dd/yyyy)</label>
      <input type="date" name="org2_from" class="form-control" value="<?php echo showData('org2_from'); ?>">
    </div>
    <div class="col-md-6">
      <label class="control-label" style="font-size: small;">To (mm/dd/yyyy)</label>
      <input type="date" name="org2_to" class="form-control" value="<?php echo showData('org2_to'); ?>">
    </div>

    <div class="col-md-12">
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">10. Have you EVER been denied admission to the United States?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_denied_admission" id="yes_10" value="Y" <?php echo (showData('i_589_denied_admission') == 'Y') ? 'checked' : '' ?>> <label for="yes_10" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_denied_admission" id="no_10" value="N" <?php echo (showData('i_589_denied_admission') == 'N') ? 'checked' : '' ?>> <label for="no_10" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">11. Have you EVER been denied a visa to the United States?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_denied_visa" id="yes_11" value="Y" <?php echo (showData('i_589_denied_visa') == 'Y') ? 'checked' : '' ?>> <label for="yes_11" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_denied_visa" id="no_11" value="N" <?php echo (showData('i_589_denied_visa') == 'N') ? 'checked' : '' ?>> <label for="no_11" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">12. Have you EVER worked in the United States without authorization?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_worked_without_auth" id="yes_12" value="Y" <?php echo (showData('i_589_worked_without_auth') == 'Y') ? 'checked' : '' ?>> <label for="yes_12" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_worked_without_auth" id="no_12" value="N" <?php echo (showData('i_589_worked_without_auth') == 'N') ? 'checked' : '' ?>> <label for="no_12" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">13. Have you EVER violated the terms or conditions of your nonimmigrant status?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_violated_status" id="yes_13" value="Y" <?php echo (showData('i_589_violated_status') == 'Y') ? 'checked' : '' ?>> <label for="yes_13" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_violated_status" id="no_13" value="N" <?php echo (showData('i_589_violated_status') == 'N') ? 'checked' : '' ?>> <label for="no_13" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">14. Are you presently or have you EVER been in removal, exclusion, rescission, or deportation proceedings?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_removal_proceedings" id="yes_14" value="Y" <?php echo (showData('i_589_removal_proceedings') == 'Y') ? 'checked' : '' ?>> <label for="yes_14" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_removal_proceedings" id="no_14" value="N" <?php echo (showData('i_589_removal_proceedings') == 'N') ? 'checked' : '' ?>> <label for="no_14" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">15. Have you EVER been issued a final order of exclusion, deportation, or removal?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_final_order" id="yes_15" value="Y" <?php echo (showData('i_589_final_order') == 'Y') ? 'checked' : '' ?>> <label for="yes_15" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_final_order" id="no_15" value="N" <?php echo (showData('i_589_final_order') == 'N') ? 'checked' : '' ?>> <label for="no_15" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">16. Have you EVER had a prior final order of exclusion, deportation, or removal reinstated?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_order_reinstated" id="yes_16" value="Y" <?php echo (showData('i_589_order_reinstated') == 'Y') ? 'checked' : '' ?>> <label for="yes_16" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_order_reinstated" id="no_16" value="N" <?php echo (showData('i_589_order_reinstated') == 'N') ? 'checked' : '' ?>> <label for="no_16" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">17. Have you EVER been granted voluntary departure but failed to depart within the allotted time?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_voluntary_departure" id="yes_17" value="Y" <?php echo (showData('i_589_voluntary_departure') == 'Y') ? 'checked' : '' ?>> <label for="yes_17" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_voluntary_departure" id="no_17" value="N" <?php echo (showData('i_589_voluntary_departure') == 'N') ? 'checked' : '' ?>> <label for="no_17" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">18. Have you EVER applied for any kind of relief or protection from removal, exclusion, or deportation?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_applied_relief" id="yes_18" value="Y" <?php echo (showData('i_589_applied_relief') == 'Y') ? 'checked' : '' ?>> <label for="yes_18" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_applied_relief" id="no_18" value="N" <?php echo (showData('i_589_applied_relief') == 'N') ? 'checked' : '' ?>> <label for="no_18" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">19. Have you EVER been a J-1 nonimmigrant exchange visitor subject to the two-year foreign residence requirement?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_j1_visitor" id="yes_19" value="Y" <?php echo (showData('i_589_j1_visitor') == 'Y') ? 'checked' : '' ?>> <label for="yes_19" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_j1_visitor" id="no_19" value="N" <?php echo (showData('i_589_j1_visitor') == 'N') ? 'checked' : '' ?>> <label for="no_19" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">20. If you answered "Yes" to Item Number 19, have you complied with the foreign residence requirement?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_complied_residence" id="yes_20" value="Y" <?php echo (showData('i_589_complied_residence') == 'Y') ? 'checked' : '' ?>> <label for="yes_20" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_complied_residence" id="no_20" value="N" <?php echo (showData('i_589_complied_residence') == 'N') ? 'checked' : '' ?>> <label for="no_20" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="control-label" style="font-size: smaller;">21. If you answered "Yes" to Item Number 19, and "No" to Item Number 20, have you been granted a waiver?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_granted_waiver" id="yes_21" value="Y" <?php echo (showData('i_589_granted_waiver') == 'Y') ? 'checked' : '' ?>> <label for="yes_21" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_granted_waiver" id="no_21" value="N" <?php echo (showData('i_589_granted_waiver') == 'N') ? 'checked' : '' ?>> <label for="no_21" style="font-size: smaller;">No</label>
        </div>
      </div>
      
      
      <div class="col-md-12" style="padding: 10px; margin-top: 10px;">
      <div class="bg-info">
          <h4 ><b>Criminal Acts and Violations</b></h4>
      </div>
        <p >
          For Item Numbers 22 - 41., you must answer "Yes" to any question that applies to you, even if your records were sealed or otherwise cleared, or even if anyone, including a judge, law enforcement officer, or attorney, told you that you no longer have a record. You must also answer "Yes" to the following questions whether the action or offense occurred here in the United States or anywhere else in the world: If you answer "Yes" to Item Numbers 22 - 41, use the space provided in Part 14. Additional Information to provide an explanation for each offense; if applicable, that includes a description of the criminal offense; where the criminal offense occurred; when the criminal offense occurred; whether you were arrested, cited, charged, or detained for the criminal offense you committed; and the outcome or disposition of that criminal offense (for example, convicted, placement in a diversion program, no charges filed, charges dismissed, jail, prison, detention, probation, or community service). Your explanation must include the duration of any sentence to confinement (even if suspended).
        </p>
      </div>
      
      <div class="col-md-12">
        <label class="control-label" style="font-size: smaller;">22. Have you EVER been arrested, cited, charged, or permitted to participate in a diversion program, or detained for any reason by any law enforcement official in any country?</label><br>
        <div class="d-flexible">
          <input type="radio" name="i_589_arrested" id="yes_22" value="Y" <?php echo (showData('i_589_arrested') == 'Y') ? 'checked' : '' ?>> <label for="yes_22" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_arrested" id="no_22" value="N" <?php echo (showData('i_589_arrested') == 'N') ? 'checked' : '' ?>> <label for="no_22" style="font-size: smaller;">No</label>
        </div>
      </div>
    </div>

  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 15-------------------------------
------------------------------------------------------------------------>
<!-- 
<fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 15 of 24</b></p>
  </div>
  <div class="row">
    <div class="bg-info">
      <h4><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h4>
    </div>


    <div class="col-md-12">
      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">23. Have you EVER committed a crime of any kind (even if you were not arrested, cited, charged with, or tried for that crime, or convicted)?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_committed_crime" id="yes_23" value="Y" <?php echo (showData('i_589_committed_crime') == 'Y') ? 'checked' : '' ?>> <label for="yes_23" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_committed_crime" id="no_23" value="N" <?php echo (showData('i_589_committed_crime') == 'N') ? 'checked' : '' ?>> <label for="no_23" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">24. Have you EVER pled guilty to or been convicted of a crime or offense (even if the violation was subsequently expunged or sealed by a court, or if you were granted a pardon, amnesty, a rehabilitation decree, or other act of clemency)?</label>
        <p style="font-style: italic;">NOTE: If you were the beneficiary of a pardon, amnesty, a rehabilitation decree, or other act of clemency, provide documentation of that post-conviction action.</p>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_convicted" id="yes_24" value="Y" <?php echo (showData('i_589_convicted') == 'Y') ? 'checked' : '' ?>> <label for="yes_24" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_convicted" id="no_24" value="N" <?php echo (showData('i_589_convicted') == 'N') ? 'checked' : '' ?>> <label for="no_24" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">25. Have you EVER been ordered punished by a judge or had conditions imposed on you that restrained your liberty (such as a prison sentence, suspended sentence, house arrest, parole, alternative sentencing, drug or alcohol treatment, rehabilitative programs or classes, probation, or community service)?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_ordered_punished" id="yes_25" value="Y" <?php echo (showData('i_589_ordered_punished') == 'Y') ? 'checked' : '' ?>> <label for="yes_25" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_ordered_punished" id="no_25" value="N" <?php echo (showData('i_589_ordered_punished') == 'N') ? 'checked' : '' ?>> <label for="no_25" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">26. Have you EVER violated (or attempted or conspired to violate) any controlled substance law or regulation of a state, the United States, or a foreign country?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_violated_substance_law" id="yes_26" value="Y" <?php echo (showData('i_589_violated_substance_law') == 'Y') ? 'checked' : '' ?>> <label for="yes_26" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_violated_substance_law" id="no_26" value="N" <?php echo (showData('i_589_violated_substance_law') == 'N') ? 'checked' : '' ?>> <label for="no_26" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">27. Have you EVER trafficked in or benefited from, or knowingly aided, abetted, assisted, conspired or colluded in the illegal trafficking of any controlled substances, such as chemicals, illegal drugs, or narcotics?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_trafficked_substances" id="yes_27" value="Y" <?php echo (showData('i_589_trafficked_substances') == 'Y') ? 'checked' : '' ?>> <label for="yes_27" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_trafficked_substances" id="no_27" value="N" <?php echo (showData('i_589_trafficked_substances') == 'N') ? 'checked' : '' ?>> <label for="no_27" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">28. Are you the spouse, son, or daughter of an alien who illicitly trafficked or aided (or otherwise abetted, assisted, conspired, or colluded) in the illicit trafficking of a controlled substance, such as chemicals, illegal drugs, or narcotics and you obtained, within the last 5 years, any financial or other benefit from this activity of your spouse or parent?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_family_trafficking" id="yes_28" value="Y" <?php echo (showData('i_589_family_trafficking') == 'Y') ? 'checked' : '' ?>> <label for="yes_28" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_family_trafficking" id="no_28" value="N" <?php echo (showData('i_589_family_trafficking') == 'N') ? 'checked' : '' ?>> <label for="no_28" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">29. If your answer to Item Number 28 is "Yes," did you know or should you have reasonably known that the financial or other benefit you obtained resulted from this activity of your spouse or parent?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_knew_benefit_source" id="yes_29" value="Y" <?php echo (showData('i_589_knew_benefit_source') == 'Y') ? 'checked' : '' ?>> <label for="yes_29" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_knew_benefit_source" id="no_29" value="N" <?php echo (showData('i_589_knew_benefit_source') == 'N') ? 'checked' : '' ?>> <label for="no_29" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">30. Have you EVER engaged in prostitution or are you coming to the United States to engage in prostitution?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_engaged_prostitution" id="yes_30" value="Y" <?php echo (showData('i_589_engaged_prostitution') == 'Y') ? 'checked' : '' ?>> <label for="yes_30" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_engaged_prostitution" id="no_30" value="N" <?php echo (showData('i_589_engaged_prostitution') == 'N') ? 'checked' : '' ?>> <label for="no_30" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">31. Have you EVER directly or indirectly procured or attempted to procure, or imported prostitutes or persons for the purpose of prostitution?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_procured_prostitution" id="yes_31" value="Y" <?php echo (showData('i_589_procured_prostitution') == 'Y') ? 'checked' : '' ?>> <label for="yes_31" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_procured_prostitution" id="no_31" value="N" <?php echo (showData('i_589_procured_prostitution') == 'N') ? 'checked' : '' ?>> <label for="no_31" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">32. Have you EVER received any proceeds or money from prostitution?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_prostitution_proceeds" id="yes_32" value="Y" <?php echo (showData('i_589_prostitution_proceeds') == 'Y') ? 'checked' : '' ?>> <label for="yes_32" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_prostitution_proceeds" id="no_32" value="N" <?php echo (showData('i_589_prostitution_proceeds') == 'N') ? 'checked' : '' ?>> <label for="no_32" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">33. Do you intend to engage in illegal gambling or any other form of commercialized vice, such as prostitution, bootlegging, or the sale of child pornography, while in the United States?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_commercial_vice" id="yes_33" value="Y" <?php echo (showData('i_589_intend_commercial_vice') == 'Y') ? 'checked' : '' ?>> <label for="yes_33" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_commercial_vice" id="no_33" value="N" <?php echo (showData('i_589_intend_commercial_vice') == 'N') ? 'checked' : '' ?>> <label for="no_33" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">34. Have you EVER exercised immunity (diplomatic or otherwise) to avoid being prosecuted for a criminal offense in the United States?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_exercised_immunity" id="yes_34" value="Y" <?php echo (showData('i_589_exercised_immunity') == 'Y') ? 'checked' : '' ?>> <label for="yes_34" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_exercised_immunity" id="no_34" value="N" <?php echo (showData('i_589_exercised_immunity') == 'N') ? 'checked' : '' ?>> <label for="no_34" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">35a. Have you EVER served as a foreign government official?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_foreign_official" id="yes_35a" value="Y" <?php echo (showData('i_589_foreign_official') == 'Y') ? 'checked' : '' ?>> <label for="yes_35a" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_foreign_official" id="no_35a" value="N" <?php echo (showData('i_589_foreign_official') == 'N') ? 'checked' : '' ?>> <label for="no_35a" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">35b. If your answer to Item Number 35a is "Yes," have you EVER been responsible for, enforced, or directly carried out violations of religious freedoms?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_religious_freedom_violations" id="yes_35b" value="Y" <?php echo (showData('i_589_religious_freedom_violations') == 'Y') ? 'checked' : '' ?>> <label for="yes_35b" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_religious_freedom_violations" id="no_35b" value="N" <?php echo (showData('i_589_religious_freedom_violations') == 'N') ? 'checked' : '' ?>> <label for="no_35b" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">36. Have you EVER induced by force, fraud, or coercion (or otherwise been involved in) the trafficking of another person for commercial sex acts (sex trafficking)?</label>
        <p style="font-style: italic;">NOTE: Sex trafficking involves inducing or causing an adult to engage in a commercial sex act (any sex act performed for anything of value) through fraud, force, or coercion, or inducing or causing any person under 18 years of age to engage in a commercial sex act (even without force, fraud, or coercion). Sex trafficking may include recruiting, enticing, harboring, transporting, providing, obtaining, advertising, maintaining, patronizing, or soliciting by any means a person to engage in the commercial sex act knowing (or, in the case of advertising, with reckless disregard of the fact) that the person is under 18 years of age or that force, fraud, or coercion was used to induce or cause the person to engage in the commercial sex act. Sex trafficking may also include knowingly benefiting financially or by receiving anything of value, from participation in a venture involving sex trafficking.</p>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_sex_trafficking" id="yes_36" value="Y" <?php echo (showData('i_589_sex_trafficking') == 'Y') ? 'checked' : '' ?>> <label for="yes_36" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_sex_trafficking" id="no_36" value="N" <?php echo (showData('i_589_sex_trafficking') == 'N') ? 'checked' : '' ?>> <label for="no_36" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">37. Have you EVER trafficked a person into involuntary servitude, peonage, debt bondage, or slavery?<br>Trafficking includes recruiting, harboring, transporting, providing, or obtaining a person for labor or services through the use of force, fraud, or coercion.</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_labor_trafficking" id="yes_37" value="Y" <?php echo (showData('i_589_labor_trafficking') == 'Y') ? 'checked' : '' ?>> <label for="yes_37" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_labor_trafficking" id="no_37" value="N" <?php echo (showData('i_589_labor_trafficking') == 'N') ? 'checked' : '' ?>> <label for="no_37" style="font-size: smaller;">No</label>
        </div>
      </div>
    </div>

  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->

<!----------------------------------------------------------------------
-------------------------------- page 16-------------------------------
------------------------------------------------------------------------>

<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 16 of 24</b></p>
  </div>
  <div class="row">
    <div class="bg-info">
      <h4><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h4>
    </div>

    <div class="col-md-12">
      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">38. Have you EVER knowingly aided, abetted, assisted, conspired, or colluded with others in trafficking in persons for commercial sex acts or involuntary servitude, peonage, debt bondage, or slavery?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_aided_trafficking" id="yes_38" value="Y" <?php echo (showData('i_589_aided_trafficking') == 'Y') ? 'checked' : '' ?>> <label for="yes_38" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_aided_trafficking" id="no_38" value="N" <?php echo (showData('i_589_aided_trafficking') == 'N') ? 'checked' : '' ?>> <label for="no_38" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">39. Are you the spouse, son, or daughter of an alien who engaged in the trafficking in persons and have received or obtained, within the last 5 years, any financial or other benefits from this activity of your spouse or your parent?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_family_trafficking_benefit" id="yes_39" value="Y" <?php echo (showData('i_589_family_trafficking_benefit') == 'Y') ? 'checked' : '' ?>> <label for="yes_39" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_family_trafficking_benefit" id="no_39" value="N" <?php echo (showData('i_589_family_trafficking_benefit') == 'N') ? 'checked' : '' ?>> <label for="no_39" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">40. If your answer is "Yes" to Item Number 39, did you know or reasonably should have known that this benefit resulted from this activity of your spouse or parent?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_knew_trafficking_benefit" id="yes_40" value="Y" <?php echo (showData('i_589_knew_trafficking_benefit') == 'Y') ? 'checked' : '' ?>> <label for="yes_40" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_knew_trafficking_benefit" id="no_40" value="N" <?php echo (showData('i_589_knew_trafficking_benefit') == 'N') ? 'checked' : '' ?>> <label for="no_40" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">41. Have you EVER engaged in money laundering or have you EVER knowingly aided, assisted, abetted, conspired, or colluded with others in money laundering or do you seek to enter the United States to engage in such activity?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_money_laundering" id="yes_41" value="Y" <?php echo (showData('i_589_money_laundering') == 'Y') ? 'checked' : '' ?>> <label for="yes_41" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_money_laundering" id="no_41" value="N" <?php echo (showData('i_589_money_laundering') == 'N') ? 'checked' : '' ?>> <label for="no_41" style="font-size: smaller;">No</label>
        </div>
      </div>
    </div>


    <div class="col-md-12">
      <div class="bg-info" style="padding: 10px; margin-top: 20px;">
        <h5><b>Security and Related</b></h5>
      </div>

      <div class="col-md-8 mt-4">
        <label class="control-label" style="font-size: smaller;">Do you intend to:</label>
      </div>
      <div class="col-md-4">
     
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">42.a. Engage in any activity that violates or evades any law relating to espionage (including spying) or sabotage in the United States?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_espionage" id="yes_42a" value="Y" <?php echo (showData('i_589_intend_espionage') == 'Y') ? 'checked' : '' ?>> <label for="yes_42a" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_espionage" id="no_42a" value="N" <?php echo (showData('i_589_intend_espionage') == 'N') ? 'checked' : '' ?>> <label for="no_42a" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">42.b. Engage in any activity in the United States that violates or evades any law prohibiting the export from the United States of goods, technology, or sensitive information?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_export_violation" id="yes_42b" value="Y" <?php echo (showData('i_589_intend_export_violation') == 'Y') ? 'checked' : '' ?>> <label for="yes_42b" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_export_violation" id="no_42b" value="N" <?php echo (showData('i_589_intend_export_violation') == 'N') ? 'checked' : '' ?>> <label for="no_42b" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">42.c. Engage in any activity whose purpose includes opposing, controlling, or overthrowing the U.S. Government by force, violence, or other unlawful means while in the United States?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_overthrow" id="yes_42c" value="Y" <?php echo (showData('i_589_intend_overthrow') == 'Y') ? 'checked' : '' ?>> <label for="yes_42c" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_overthrow" id="no_42c" value="N" <?php echo (showData('i_589_intend_overthrow') == 'N') ? 'checked' : '' ?>> <label for="no_42c" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">42.d. Engage in any other unlawful activity?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_unlawful" id="yes_42d" value="Y" <?php echo (showData('i_589_intend_unlawful') == 'Y') ? 'checked' : '' ?>> <label for="yes_42d" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_unlawful" id="no_42d" value="N" <?php echo (showData('i_589_intend_unlawful') == 'N') ? 'checked' : '' ?>> <label for="no_42d" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.a. Received any weapons training, paramilitary training, or other military-type training?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_weapons_training" id="yes_43a" value="Y" <?php echo (showData('i_589_weapons_training') == 'Y') ? 'checked' : '' ?>> <label for="yes_43a" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_weapons_training" id="no_43a" value="N" <?php echo (showData('i_589_weapons_training') == 'N') ? 'checked' : '' ?>> <label for="no_43a" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.b. Committed kidnapping, assassination, or hijacking or sabotage of a conveyance (including an aircraft, vessel, vehicle, or train)?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_violent_acts" id="yes_43b" value="Y" <?php echo (showData('i_589_violent_acts') == 'Y') ? 'checked' : '' ?>> <label for="yes_43b" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_violent_acts" id="no_43b" value="N" <?php echo (showData('i_589_violent_acts') == 'N') ? 'checked' : '' ?>> <label for="no_43b" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.c. Used a weapon or explosive or any dangerous device with the intent to endanger the safety of another person or people or cause damage to property?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_used_weapon" id="yes_43c" value="Y" <?php echo (showData('i_589_used_weapon') == 'Y') ? 'checked' : '' ?>> <label for="yes_43c" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_used_weapon" id="no_43c" value="N" <?php echo (showData('i_589_used_weapon') == 'N') ? 'checked' : '' ?>> <label for="no_43c" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.d. Threatened, attempted, conspired, prepared, or planned to do any of the things described in Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_planned_violence" id="yes_43d" value="Y" <?php echo (showData('i_589_planned_violence') == 'Y') ? 'checked' : '' ?>> <label for="yes_43d" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_planned_violence" id="no_43d" value="N" <?php echo (showData('i_589_planned_violence') == 'N') ? 'checked' : '' ?>> <label for="no_43d" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.e. Incited, under circumstances indicating an intention to cause death or serious bodily harm/injury, any of the activities described in Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_incited_violence" id="yes_43e" value="Y" <?php echo (showData('i_589_incited_violence') == 'Y') ? 'checked' : '' ?>> <label for="yes_43e" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_incited_violence" id="no_43e" value="N" <?php echo (showData('i_589_incited_violence') == 'N') ? 'checked' : '' ?>> <label for="no_43e" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.f. Participated in, or been a member of, a group or organization that did any of the activities described in Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_member_violent_group" id="yes_43f" value="Y" <?php echo (showData('i_589_member_violent_group') == 'Y') ? 'checked' : '' ?>> <label for="yes_43f" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_member_violent_group" id="no_43f" value="N" <?php echo (showData('i_589_member_violent_group') == 'N') ? 'checked' : '' ?>> <label for="no_43f" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.g. Recruited members or asked for money or things of value for a group or organization that did any of the activities described in Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_recruited_violent_group" id="yes_43g" value="Y" <?php echo (showData('i_589_recruited_violent_group') == 'Y') ? 'checked' : '' ?>> <label for="yes_43g" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_recruited_violent_group" id="no_43g" value="N" <?php echo (showData('i_589_recruited_violent_group') == 'N') ? 'checked' : '' ?>> <label for="no_43g" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.h. Provided money, a thing of value, services or labor, or any other assistance or support for any of the activities described in Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_supported_violence" id="yes_43h" value="Y" <?php echo (showData('i_589_supported_violence') == 'Y') ? 'checked' : '' ?>> <label for="yes_43h" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_supported_violence" id="no_43h" value="N" <?php echo (showData('i_589_supported_violence') == 'N') ? 'checked' : '' ?>> <label for="no_43h" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">43.i. Provided money, a thing of value, services or labor, or any other assistance or support for an individual, group, or organization who did any of the activities described in Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_supported_violent_entity" id="yes_43i" value="Y" <?php echo (showData('i_589_supported_violent_entity') == 'Y') ? 'checked' : '' ?>> <label for="yes_43i" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_supported_violent_entity" id="no_43i" value="N" <?php echo (showData('i_589_supported_violent_entity') == 'N') ? 'checked' : '' ?>> <label for="no_43i" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">44. Do you intend to engage in any of the activities listed in any part of Item Numbers 43.b. - 43.c.?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_violent_activities" id="yes_44" value="Y" <?php echo (showData('i_589_intend_violent_activities') == 'Y') ? 'checked' : '' ?>> <label for="yes_44" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_violent_activities" id="no_44" value="N" <?php echo (showData('i_589_intend_violent_activities') == 'N') ? 'checked' : '' ?>> <label for="no_44" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-3">
        <label class="control-label" style="font-size: smaller;">45. Do you intend to engage in any activity that could endanger the welfare, safety, or security of the United States?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_intend_endanger_security" id="yes_45" value="Y" <?php echo (showData('i_589_intend_endanger_security') == 'Y') ? 'checked' : '' ?>> <label for="yes_45" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_intend_endanger_security" id="no_45" value="N" <?php echo (showData('i_589_intend_endanger_security') == 'N') ? 'checked' : '' ?>> <label for="no_45" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-12 mt-4">
        <p style="font-size: smaller; font-style: italic;">
          <b>NOTE:</b> If you answered "Yes" to any part of Item Numbers 42.a. - 45, explain what you did, including the dates and location of the circumstances, or what you intend to do in the space provided in Part 14. Additional Information.
        </p>
      </div>
    </div>

  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->

<!----------------------------------------------------------------------
-------------------------------- page 17-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 17 of 24</b></p>
  </div>
  <div class="row">
    <div class="bg-info">
      <h4><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h4>
    </div>

    <div class="col-md-12">
      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">46. Are you the spouse or child of an individual who EVER engaged in any of the activities listed in Item Number 43.b. - 43.i?</label>
        <p style="font-size: smaller; font-style: italic;">NOTE: If you answered "Yes" to any part of Item Number 46., explain what your parent or spouse did, including the dates and location of the circumstances in Part 14. Additional Information.</p>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_family_violent_activities" id="yes_46" value="Y" <?php echo (showData('i_589_family_violent_activities') == 'Y') ? 'checked' : '' ?>> <label for="yes_46" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_family_violent_activities" id="no_46" value="N" <?php echo (showData('i_589_family_violent_activities') == 'N') ? 'checked' : '' ?>> <label for="no_46" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">47. Have you EVER sold, provided, or transported weapons, or assisted any person in selling, providing, or transporting weapons, which you have or believed would be used against another person?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_weapons_trafficking" id="yes_47" value="Y" <?php echo (showData('i_589_weapons_trafficking') == 'Y') ? 'checked' : '' ?>> <label for="yes_47" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_weapons_trafficking" id="no_47" value="N" <?php echo (showData('i_589_weapons_trafficking') == 'N') ? 'checked' : '' ?>> <label for="no_47" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">48. Have you EVER worked, volunteered, or otherwise served in any prison, jail, prison camp, detention facility, labor camp, or any other place where people were detained, or have you EVER directed or participated in any other activity that involved detaining people?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_detention_facility" id="yes_48" value="Y" <?php echo (showData('i_589_detention_facility') == 'Y') ? 'checked' : '' ?>> <label for="yes_48" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_detention_facility" id="no_48" value="N" <?php echo (showData('i_589_detention_facility') == 'N') ? 'checked' : '' ?>> <label for="no_48" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">49. Have you EVER been a member of, assisted, or participated in any group, unit, or organization of any kind in which you or other persons used any type of weapon against any person or threatened to do so?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_weapon_using_group" id="yes_49" value="Y" <?php echo (showData('i_589_weapon_using_group') == 'Y') ? 'checked' : '' ?>> <label for="yes_49" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_weapon_using_group" id="no_49" value="N" <?php echo (showData('i_589_weapon_using_group') == 'N') ? 'checked' : '' ?>> <label for="no_49" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">50. Have you EVER served in, been a member of, assisted (helped), or participated in any military or police unit?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_military_police" id="yes_50" value="Y" <?php echo (showData('i_589_military_police') == 'Y') ? 'checked' : '' ?>> <label for="yes_50" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_military_police" id="no_50" value="N" <?php echo (showData('i_589_military_police') == 'N') ? 'checked' : '' ?>> <label for="no_50" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">51. Have you EVER served in, been a member of, assisted (helped), or participated in any armed group (a group that carries weapons), for example: paramilitary unit (a group of people who act like a military group, but are not part of the official military), self-defense unit, vigilante unit, rebel group, or guerrilla group?</label>
        <p style="font-size: smaller; font-style: italic;">If you answered "Yes" to Item Number 50. or 51., include the name of the country, the name of the military unit or armed group, your rank or position, and your dates of involvement in your explanation in Part 14. Additional Information.</p>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_armed_group" id="yes_51" value="Y" <?php echo (showData('i_589_armed_group') == 'Y') ? 'checked' : '' ?>> <label for="yes_51" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_armed_group" id="no_51" value="N" <?php echo (showData('i_589_armed_group') == 'N') ? 'checked' : '' ?>> <label for="no_51" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">52. Have you EVER been a member of, or in any way affiliated with, the Communist Party or any totalitarian party (in the United States or abroad)?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_communist_party" id="yes_52" value="Y" <?php echo (showData('i_589_communist_party') == 'Y') ? 'checked' : '' ?>> <label for="yes_52" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_communist_party" id="no_52" value="N" <?php echo (showData('i_589_communist_party') == 'N') ? 'checked' : '' ?>> <label for="no_52" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">Have you EVER ordered, incited, called for, committed, assisted, helped with, or otherwise participated in any of the following:</label>
      </div>
      <div class="col-md-4">
       
      </div>

      <div class="col-md-8 mt-4">
        <label class="control-label" style="font-size: smaller;">53.a. Torture?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_participated_torture" id="yes_53a" value="Y" <?php echo (showData('i_589_participated_torture') == 'Y') ? 'checked' : '' ?>> <label for="yes_53a" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_participated_torture" id="no_53a" value="N" <?php echo (showData('i_589_participated_torture') == 'N') ? 'checked' : '' ?>> <label for="no_53a" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-4">
        <label class="control-label" style="font-size: smaller;">53.b. Genocide?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_participated_genocide" id="yes_53b" value="Y" <?php echo (showData('i_589_participated_genocide') == 'Y') ? 'checked' : '' ?>> <label for="yes_53b" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_participated_genocide" id="no_53b" value="N" <?php echo (showData('i_589_participated_genocide') == 'N') ? 'checked' : '' ?>> <label for="no_53b" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-4">
        <label class="control-label" style="font-size: smaller;">53.c. Killing, or trying to kill, any person?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_participated_killing" id="yes_53c" value="Y" <?php echo (showData('i_589_participated_killing') == 'Y') ? 'checked' : '' ?>> <label for="yes_53c" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_participated_killing" id="no_53c" value="N" <?php echo (showData('i_589_participated_killing') == 'N') ? 'checked' : '' ?>> <label for="no_53c" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-4">
        <label class="control-label" style="font-size: smaller;">53.d. Intentionally and severely injuring or trying to injure any person?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_participated_injuring" id="yes_53d" value="Y" <?php echo (showData('i_589_participated_injuring') == 'Y') ? 'checked' : '' ?>> <label for="yes_53d" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_participated_injuring" id="no_53d" value="N" <?php echo (showData('i_589_participated_injuring') == 'N') ? 'checked' : '' ?>> <label for="no_53d" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">54. Have you EVER recruited, enlisted, conscripted, or used any person under 15 years of age to take part in hostilities or to serve in or help an armed force or group, or attempted or worked with others to do so?</label>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_child_soldier_recruitment" id="yes_54" value="Y" <?php echo (showData('i_589_child_soldier_recruitment') == 'Y') ? 'checked' : '' ?>> <label for="yes_54" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_child_soldier_recruitment" id="no_54" value="N" <?php echo (showData('i_589_child_soldier_recruitment') == 'N') ? 'checked' : '' ?>> <label for="no_54" style="font-size: smaller;">No</label>
        </div>
      </div>

      <div class="col-md-8 mt-5">
        <label class="control-label" style="font-size: smaller;">55. Have you EVER used any person under 15 years of age to take part in hostilities, for instance, participating in combat or providing services related to combat (such as sabotage or serving as a courier) or providing support services (such as transporting supplies), or attempts or worked with others to do so?</label>
        <p style="font-size: smaller; font-style: italic;">NOTE: If you answered "Yes" to any part of Item Numbers 47. - 55., explain what occurred, including the dates and location of the circumstances, in the space provided in Part 14. Additional Information.</p>
      </div>
      <div class="col-md-4">
        <div class="d-flexible col-md-offset-8">
          <input type="radio" name="i_589_child_combat_use" id="yes_55" value="Y" <?php echo (showData('i_589_child_combat_use') == 'Y') ? 'checked' : '' ?>> <label for="yes_55" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_child_combat_use" id="no_55" value="N" <?php echo (showData('i_589_child_combat_use') == 'N') ? 'checked' : '' ?>> <label for="no_55" style="font-size: smaller;">No</label>
        </div>
      </div>
    </div>

  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 18-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 18 of 24</b></p>
  </div>
  <div class="row">
    <div class="bg-info">
      <h4><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h4>
    </div>

    <div class="bg-info mt-3">
      <h4><b>Public Charge</b></h4>
    </div>
    <div class="col-md-12">
      <div class="col-md-12 mt-4">
        <p style="font-size: smaller;">
          Each alien who is subject to the public charge ground of inadmissibility in INA section 212(a)(4) must complete <b>Item Numbers 57. - 66.</b> An alien is subject to the public charge ground of inadmissibility if the alien does not fall under one of the categories exempt from the public charge ground of inadmissibility listed below. If you fall under one of the exempt categories listed below, please select the exempt category, and skip <b>Item Numbers 57. - 66.</b> If you do not fall under one of the exempt categories listed below, select "I do not fall under any of the exempt categories listed above and will complete <b>Item Numbers 57. - 66.</b>"
        </p>
        <p style="font-size: smaller; font-style: italic;">
          <b>NOTE:</b> For more information, see <b>Part 9. General Eligibility and Inadmissibility Grounds</b>, <i>Public Charge</i> section of these Instructions.
        </p>
      </div>

      <div class="col-md-12 my-4">
        <label class="control-label">
          <b>56. I am exempt from the public charge ground of inadmissibility because I am a/an (select <u>only one</u> box):</b>
        </label>
        <br><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_vawa_self_petitioner") ?> VAWA Self-Petitioner (Form I-360)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_special_immigrant_juvenile") ?> Special Immigrant Juvenile (Form I-360)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_afghan_iraqi_national") ?> Certain Afghan or Iraqi National (Form I-360 or Form DS-157)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_asylee") ?> Asylee (Form I-589 or Form I-730)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_refugee") ?> Refugee (Form I-590 or Form I-730)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_u_nonimmigrant") ?> Victim of Qualifying Criminal Activity (U Nonimmigrant) under INA section 245(m) (Form I-918, Form I-918A, or Form I-929)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_u_nonimmigrant_other") ?> Any category other than INA section 245(m), but you are in valid U nonimmigrant status at the time you file your application for adjustment of status. (This exemption only applies if, at the time of the adjudication of Form I-485, you are still in valid U nonimmigrant status. If, at the time of adjudication of Form I-485, you are no longer in valid U nonimmigrant status, you will be subject to the public charge ground of inadmissibility.)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_t_nonimmigrant") ?> Human Trafficking Victim (T nonimmigrant) under INA section 245(l) (Form I-914 or Form I-914A)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_t_nonimmigrant_other") ?> Any category other than INA section 245(l), but you either have a pending application for T nonimmigrant status (Form I-914) that sets forth a prima facie case for eligibility or are in valid T nonimmigrant status at the time you file your application for adjustment of status. (This exemption only applies if your Form I-914 is still pending and deemed to be prima facie eligible or you are in valid T nonimmigrant status when we adjudicate your adjustment of status application.)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_cuban_adjustment") ?> Cuban Adjustment Act
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_cuban_adjustment_battered") ?> Cuban Adjustment Act for Battered Spouses and Children
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_haitian_dependent") ?> Dependent Status under the Haitian Refugee Immigrant Fairness Act
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_haitian_dependent_battered") ?> Dependent Status under the Haitian Refugee Immigrant Fairness Act for Battered Spouses and Children
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_cuban_haitian_entrants") ?> Cuban and Haitian Entrants Applying for Adjustment of Status under section 202 of the Immigration Reform and Control Act of 1986
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_lautenberg_parolee") ?> A Lautenberg Parolee
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_vietnam_cambodia_laos") ?> National of Vietnam, Cambodia, or Laos Applying under the Foreign Operations, Export Financing, and Related Programs
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_continuous_residence") ?> Continuous Residence in the United States Since Before January 1, 1972 ("Registry")
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_amerasian_homecoming") ?> Amerasian Homecoming Act
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_polish_hungarian_parolee") ?> Polish or Hungarian Parolee
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_nacara") ?> Nicaraguan and Other Central Americans under section 203 of the Nicaraguan Adjustment and Central American Relief Act (NACARA)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_american_indian") ?> American Indian Born in Canada (INA section 289) or the Texas Band of Kickapoo Indians of the Kickapoo Tribe of Oklahoma, Public Law 97-429 (Jan. 8, 1983)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_liberian_fairness") ?> Section 7611 of the National Defense Authorization Act for Fiscal Year 2020 (Liberian Refugee Immigration Fairness)
        </label><br>
        <br>

      </div>
    </div>

  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 19-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset class="setpage">
  <div class="page_number">
    <p style="text-align: right;"><b>Page 19 of 24</b></p>
  </div>
  <div class="row">
    <div class="bg-info">
      <h4><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h4>
    </div>
    <div class="col-md-12">
      <div class="col-md-12 my-4">
        <label class="control-label">
          <?php echo createCheckbox("exempt_syrian_national") ?> Syrian National Adjusting Status under Public Law 106-378
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_military_family") ?> Spouse, Child, or Parent of a U.S. Active-Duty Service Member in the Armed Forces under the National Defense Authorization Act (NDAA) (Form I-130 or Form I-360)
        </label><br>
        <label class="control-label">
          <?php echo createCheckbox("exempt_none_complete") ?> I do not fall under any of the exempt categories listed above and will complete Item Numbers 57. - 66.
        </label>
      </div>
      <div class="col-md-12 mt-4">
        <p style="font-size: smaller;">
          If you selected "I do not fall under any of the exempt categories listed above and will complete Item Numbers 57. - 66." in Item Number 56., complete Item Numbers 57. - 66. below. If you selected an exempt category in Item Number 56., go to Item Number 67. If you need extra space to complete this section, use the space provided in Part 14. Additional Information.
        </p>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">57. What is the size of your household?</label>
        <div style="flex: 1; width: 200px;">
          <input type="text" class="form-control" name="public_charge_household_size" value="<?php echo showData('public_charge_household_size') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">58. Indicate your annual household income.</label>
        <div class="col-md-12 my-4">
          <label class="control-label">
            <?php echo createCheckbox("income_0_27000") ?> $0-27,000
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("income_27001_52000") ?> $27,001-52,000
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("income_52001_85000") ?> $52,001-85,000
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("income_85001_141000") ?> $85,001-141,000
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("income_over_141000") ?> Over $141,000
          </label>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">59. Identify the total value of your household assets.</label>
        <div class="col-md-12 my-4">
          <label class="control-label">
            <?php echo createCheckbox("assets_0_18400") ?> $0-18,400
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("assets_18401_136000") ?> $18,401-136,000
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("assets_136001_321400") ?> $136,001-321,400
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("assets_321401_707100") ?> $321,401-707,100
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("assets_over_707100") ?> Over $707,100
          </label>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">60. Identify the total value of your household liabilities (including both secured and unsecured liabilities).</label>
        <div class="col-md-12 my-4">
          <label class="control-label">
            <?php echo createCheckbox("liabilities_0") ?> $0
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("liabilities_1_10100") ?> $1-10,100
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("liabilities_10101_57700") ?> $10,101-57,700
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("liabilities_57701_186800") ?> $57,701-186,800
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("liabilities_over_186800") ?> Over $186,800
          </label>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">61. What is the highest degree or grade of school you have completed?</label>
        <div class="col-md-12 my-4">
          <label class="control-label">
            <?php echo createCheckbox("education_less_than_high_school") ?> Less than a high school diploma. If you select this option, indicate the highest grade of school you have completed.
          </label><br>
          <div class="col-md-12">
            <input type="text" class="form-control" name="education_highest_grade" value="<?php echo showData('education_highest_grade') ?>" style="width: 100%; padding: 5px; margin-bottom: 5px;" />
          </div>
          <label class="control-label">
            <?php echo createCheckbox("education_high_school") ?> High school diploma, GED, or alternative credential
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("education_college_no_degree") ?> 1 or more years of college credit, no degree
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("education_associates") ?> Associate's degree
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("education_bachelors") ?> Bachelor's degree
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("education_masters") ?> Master's degree
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("education_professional") ?> Professional degree (JD, MD, DMD, etc.)
          </label><br>
          <label class="control-label">
            <?php echo createCheckbox("education_doctorate") ?> Doctorate degree
          </label>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">62. List your certifications, licenses, skills obtained through work experience, and educational certificates.</label>
        <p style="font-size: smaller; font-style: italic;">List of Certifications</p>
        <div class="col-md-12 ">
          <table border="1" style="width: 100%;">
            <thead>
              <tr class="bg-info">
                <th>List of Certifications</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '0') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '1') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '2') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '3') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '4') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '5') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '6') ?>"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" maxlength="23" style="width: 100%; margin: 0;" name="general_eligibility_list_of_certifications[]" value="<?php echo showData('general_eligibility_list_of_certifications', '7') ?>"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">63. Have you ever received Supplemental Security Income (SSI), Temporary Assistance for Needy Families (TANF), or state, Tribal, territorial, or local cash benefit programs for income maintenance (often called "General Assistance" in the state context, but which also exist under other names)?</label>
        <div class="d-flexible">
          <input type="radio" name="i_589_received_public_benefits" id="yes_63" value="Y" <?php echo (showData('i_589_received_public_benefits') == 'Y') ? 'checked' : '' ?>> <label for="yes_63" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_received_public_benefits" id="no_63" value="N" <?php echo (showData('i_589_received_public_benefits') == 'N') ? 'checked' : '' ?>> <label for="no_63" style="font-size: smaller;">No</label>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <label class="control-label" style="font-size: smaller;">64. Have you ever received long-term institutionalization at government expense?</label>
        <div class="d-flexible">
          <input type="radio" name="i_589_long_term_institutionalization" id="yes_64" value="Y" <?php echo (showData('i_589_long_term_institutionalization') == 'Y') ? 'checked' : '' ?>> <label for="yes_64" style="font-size: smaller;">Yes</label><br>
          <input type="radio" name="i_589_long_term_institutionalization" id="no_64" value="N" <?php echo (showData('i_589_long_term_institutionalization') == 'N') ? 'checked' : '' ?>> <label for="no_64" style="font-size: smaller;">No</label>
        </div>
      </div>
    </div>

  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 20-------------------------------
------------------------------------------------------------------------>
<!-- <fieldset>
    <div class="page_number">
    <p style="text-align: right;"><b>Page 20 of 24</b></p>
  </div>
  <div class="col-md-12 mt-4 bg-info">
    <h5><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h5>
  </div>
  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">65. If your answer to Item Number 63. is "Yes," list the specific benefit(s) you received, the start and end dates of each period of receipt, the dollar amount of benefits received, and whether you received the benefits while you were in an immigration category exempt from the public charge ground of inadmissibility.</label>
    <table border="1" style="width: 100%;">
      <thead>
        <tr class="bg-info">
          <th>Benefit Received</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Dollar Amount</th>
          <th>In a Category Exempt from Public Charge</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_received_1" value="<?php echo showData('benefit_received_1') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_start_date_1" value="<?php echo showData('benefit_start_date_1') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_end_date_1" value="<?php echo showData('benefit_end_date_1') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_dollar_amount_1" value="<?php echo showData('benefit_dollar_amount_1') ?>"></td>
          <td>
            <input type="radio" name="benefit_exempt_1" value="Y" <?php echo (showData('benefit_exempt_1') == 'Y') ? 'checked' : '' ?>> <b>Yes</b>
            <input type="radio" name="benefit_exempt_1" value="N" <?php echo (showData('benefit_exempt_1') == 'N') ? 'checked' : '' ?>> <b>No</b>
          </td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_received_2" value="<?php echo showData('benefit_received_2') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_start_date_2" value="<?php echo showData('benefit_start_date_2') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_end_date_2" value="<?php echo showData('benefit_end_date_2') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_dollar_amount_2" value="<?php echo showData('benefit_dollar_amount_2') ?>"></td>
          <td>
            <input type="radio" name="benefit_exempt_2" value="Y" <?php echo (showData('benefit_exempt_2') == 'Y') ? 'checked' : '' ?>> <b>Yes</b>
            <input type="radio" name="benefit_exempt_2" value="N" <?php echo (showData('benefit_exempt_2') == 'N') ? 'checked' : '' ?>> <b>No</b>
          </td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_received_3" value="<?php echo showData('benefit_received_3') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_start_date_3" value="<?php echo showData('benefit_start_date_3') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_end_date_3" value="<?php echo showData('benefit_end_date_3') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_dollar_amount_3" value="<?php echo showData('benefit_dollar_amount_3') ?>"></td>
          <td>
            <input type="radio" name="benefit_exempt_3" value="Y" <?php echo (showData('benefit_exempt_3') == 'Y') ? 'checked' : '' ?>> <b>Yes</b>
            <input type="radio" name="benefit_exempt_3" value="N" <?php echo (showData('benefit_exempt_3') == 'N') ? 'checked' : '' ?>> <b>No</b>
          </td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_received_4" value="<?php echo showData('benefit_received_4') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_start_date_4" value="<?php echo showData('benefit_start_date_4') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_end_date_4" value="<?php echo showData('benefit_end_date_4') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="benefit_dollar_amount_4" value="<?php echo showData('benefit_dollar_amount_4') ?>"></td>
          <td>
            <input type="radio" name="benefit_exempt_4" value="Y" <?php echo (showData('benefit_exempt_4') == 'Y') ? 'checked' : '' ?>> <b>Yes</b>
            <input type="radio" name="benefit_exempt_4" value="N" <?php echo (showData('benefit_exempt_4') == 'N') ? 'checked' : '' ?>> <b>No</b>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">66. If your answer to Item Number 64. is "Yes," list the name, city, and state for each institution, the start and end dates of each period of institutionalization, the reason you were institutionalized, and whether you were institutionalized while you were in an immigration category exempt from the public charge ground of inadmissibility.</label>
    <table border="1" style="width: 100%;">
      <thead>
        <tr class="bg-info">
          <th>Institution Name/City/State</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Reason</th>
          <th>In a Category Exempt from Public Charge</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_details_1" value="<?php echo showData('institution_details_1') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_from_1" value="<?php echo showData('institution_from_1') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_to_1" value="<?php echo showData('institution_to_1') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_reason_1" value="<?php echo showData('institution_reason_1') ?>"></td>
          <td>
            <input type="radio" name="institution_exempt_1" value="Y" <?php echo (showData('institution_exempt_1') == 'Y') ? 'checked' : '' ?>> <label for="institution_exempt_1">Yes</label> 
            <input type="radio" name="institution_exempt_1" value="N" <?php echo (showData('institution_exempt_1') == 'N') ? 'checked' : '' ?>> <label for="institution_exempt_1">No</label> 
          </td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_details_2" value="<?php echo showData('institution_details_2') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_from_2" value="<?php echo showData('institution_from_2') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_to_2" value="<?php echo showData('institution_to_2') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_reason_2" value="<?php echo showData('institution_reason_2') ?>"></td>
          <td>
            <input type="radio" name="institution_exempt_2" value="Y" <?php echo (showData('institution_exempt_2') == 'Y') ? 'checked' : '' ?>> <label for="institution_exempt_2">Yes</label> 
            <input type="radio" name="institution_exempt_2" value="N" <?php echo (showData('institution_exempt_2') == 'N') ? 'checked' : '' ?>> <label for="institution_exempt_1">No</label> 
          </td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_details_3" value="<?php echo showData('institution_details_3') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_from_3" value="<?php echo showData('institution_from_3') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_to_3" value="<?php echo showData('institution_to_3') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_reason_3" value="<?php echo showData('institution_reason_3') ?>"></td>
          <td>
            <input type="radio" name="institution_exempt_3" value="Y" <?php echo (showData('institution_exempt_3') == 'Y') ? 'checked' : '' ?>> <label for="institution_exempt_3">Yes</label> 
            <input type="radio" name="institution_exempt_3" value="N" <?php echo (showData('institution_exempt_3') == 'N') ? 'checked' : '' ?>> <label for="institution_exempt_1">No</label> 
          </td>
        </tr>
        <tr>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_details_4" value="<?php echo showData('institution_details_4') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_from_4" value="<?php echo showData('institution_from_4') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_to_4" value="<?php echo showData('institution_to_4') ?>"></td>
          <td><input type="text" class="form-control" style="width: 100%; margin: 0;" name="institution_reason_4" value="<?php echo showData('institution_reason_4') ?>"></td>
          <td>
            <input type="radio" name="institution_exempt_4" value="Y" <?php echo (showData('institution_exempt_4') == 'Y') ? 'checked' : '' ?>> <label for="institution_exempt_4">Yes</label> 
            <input type="radio" name="institution_exempt_4" value="N" <?php echo (showData('institution_exempt_4') == 'N') ? 'checked' : '' ?>> <label for="institution_exempt_1">No</label> 
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="col-md-12 mt-4 bg-info">
    <h5><b><i>Illegal Entries and Other Immigration Violations</i></b></h5>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">67. Have you EVER failed or refused to attend or to remain in attendance at any removal proceeding filed against you on or after April 1, 1997?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_failed_removal_proceeding" id="yes_67" value="Y" <?php echo (showData('i_589_failed_removal_proceeding') == 'Y') ? 'checked' : '' ?>> <label for="yes_67" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_failed_removal_proceeding" id="no_67" value="N" <?php echo (showData('i_589_failed_removal_proceeding') == 'N') ? 'checked' : '' ?>> <label for="no_67" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">68. Have you EVER submitted altered, fraudulent, or counterfeit documentation to any U.S. Government official to obtain or attempt to obtain any immigration benefit, including a visa or entry into the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_submitted_fraudulent_docs" id="yes_68" value="Y" <?php echo (showData('i_589_submitted_fraudulent_docs') == 'Y') ? 'checked' : '' ?>> <label for="yes_68" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_submitted_fraudulent_docs" id="no_68" value="N" <?php echo (showData('i_589_submitted_fraudulent_docs') == 'N') ? 'checked' : '' ?>> <label for="no_68" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">69. Have you EVER lied about, concealed, or misrepresented any information on an application or petition to obtain a visa, other documentation required for entry into the United States, admission to the United States, or any other kind of immigration benefit?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_misrepresented_info" id="yes_69" value="Y" <?php echo (showData('i_589_misrepresented_info') == 'Y') ? 'checked' : '' ?>> <label for="yes_69" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_misrepresented_info" id="no_69" value="N" <?php echo (showData('i_589_misrepresented_info') == 'N') ? 'checked' : '' ?>> <label for="no_69" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">70. Have you EVER falsely claimed to be a U.S. citizen (in writing or any other way)?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_false_us_citizen_claim" id="yes_70" value="Y" <?php echo (showData('i_589_false_us_citizen_claim') == 'Y') ? 'checked' : '' ?>> <label for="yes_70" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_false_us_citizen_claim" id="no_70" value="N" <?php echo (showData('i_589_false_us_citizen_claim') == 'N') ? 'checked' : '' ?>> <label for="no_70" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">71. Have you EVER been a stowaway on a vessel or aircraft arriving in the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_stowaway" id="yes_71" value="Y" <?php echo (showData('i_589_stowaway') == 'Y') ? 'checked' : '' ?>> <label for="yes_71" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_stowaway" id="no_71" value="N" <?php echo (showData('i_589_stowaway') == 'N') ? 'checked' : '' ?>> <label for="no_71" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">72. Have you EVER knowingly encouraged, induced, assisted, abetted, or aided any alien to enter or to try to enter the United States illegally (alien smuggling)?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_alien_smuggling" id="yes_72" value="Y" <?php echo (showData('i_589_alien_smuggling') == 'Y') ? 'checked' : '' ?>> <label for="yes_72" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_alien_smuggling" id="no_72" value="N" <?php echo (showData('i_589_alien_smuggling') == 'N') ? 'checked' : '' ?>> <label for="no_72" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">73. Are you under a final order of civil penalty for violating INA section 274C for use of fraudulent documents?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_final_order_fraudulent_docs" id="yes_73" value="Y" <?php echo (showData('i_589_final_order_fraudulent_docs') == 'Y') ? 'checked' : '' ?>> <label for="yes_73" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_final_order_fraudulent_docs" id="no_73" value="N" <?php echo (showData('i_589_final_order_fraudulent_docs') == 'N') ? 'checked' : '' ?>> <label for="no_73" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <h5><b>Removal, Unlawful Presence, or Illegal Reentry After Previous Immigration Violations</b></h5>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">74. Have you EVER been excluded, deported, or removed from the United States or have you ever departed the United States on your own after having been ordered excluded, deported, or removed from the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_excluded_deported_removed" id="yes_74" value="Y" <?php echo (showData('i_589_excluded_deported_removed') == 'Y') ? 'checked' : '' ?>> <label for="yes_74" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_excluded_deported_removed" id="no_74" value="N" <?php echo (showData('i_589_excluded_deported_removed') == 'N') ? 'checked' : '' ?>> <label for="no_74" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">75. Have you EVER entered the United States without being inspected and admitted or paroled?</label>
    <div class="d-flexible">
      <input type="radio" name="i_589_entered_without_inspection" id="yes_75" value="Y" <?php echo (showData('i_589_entered_without_inspection') == 'Y') ? 'checked' : '' ?>> <label for="yes_75" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="i_589_entered_without_inspection" id="no_75" value="N" <?php echo (showData('i_589_entered_without_inspection') == 'N') ? 'checked' : '' ?>> <label for="no_75" style="font-size: smaller;">No</label>
    </div>
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset> -->
<!----------------------------------------------------------------------
-------------------------------- page 21-------------------------------
------------------------------------------------------------------------>
<fieldset>
    <div class="page_number">
    <p style="text-align: right;"><b>Page 21 of 24</b></p>
  </div>
  <div class="col-md-12 mt-4 bg-info">
    <h5><b>Part 9. General Eligibility and Inadmissibility Grounds (continued)</b></h5>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">76. Since April 1, 1997, have you been unlawfully present in the United States? You were unlawfully present in the United States if you were present in the United States after the expiration of the period of stay authorized by the Department of Homeland Security (DHS) Secretary or were present in the United States without being admitted or paroled.</label>
    <div class="d-flexible">
      <input type="radio" name="unlawfully_present" id="yes_76" value="Y"> <label for="yes_76" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="unlawfully_present" id="no_76" value="N"> <label for="no_76" style="font-size: smaller;">No</label>
    </div>
    <div class="note" style="background-color: #e8f4fc; padding: 10px; margin-top: 10px; font-size: smaller;">
      <b>NOTE:</b> If you answered "Yes" to Item Number 76., give the dates of unlawful presence in the space provided in Part 14. Additional Information.
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">77. If you answered "Yes" to Item Number 76., was a severe form of trafficking in persons at least one central reason for your unlawful presence in the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="trafficking_reason" id="yes_77" value="Y"> <label for="yes_77" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="trafficking_reason" id="no_77" value="N"> <label for="no_77" style="font-size: smaller;">No</label>
    </div>
    <div class="note" style="background-color: #e8f4fc; padding: 10px; margin-top: 10px; font-size: smaller;">
      <b>NOTE:</b> Severe trafficking in persons involves sex trafficking (the recruitment, harboring, transportation, provision, or obtaining of a person to commit a commercial sex act) induced by force, fraud, coercion, or in which the person is induced to perform such act has not reached 18 years of age, or the recruitment, harboring, transportation, provision, or obtaining of a person for labor or services, through the use of force, fraud, or coercion for the purpose of subjection to involuntary servitude, peonage, debt bondage, or slavery.
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">Since April 1, 1997, have you EVER reentered or attempted to reenter the United States without being inspected and admitted or paroled after:</label>
    
    <div class="mt-3">
      <label class="control-label" style="font-size: smaller;">78.a. Having been unlawfully present in the United States for more than one year in the aggregate on or after April 1, 1997? You were unlawfully present in the United States for more than one year in the aggregate if you count all of the days during all of your stays that you were present in the United States after the expiration of the period of stay authorized by the DHS Secretary or were present in the United States without being admitted or paroled.</label>
      <div class="d-flexible">
        <input type="radio" name="reentry_after_one_year" id="yes_78a" value="Y"> <label for="yes_78a" style="font-size: smaller;">Yes</label><br>
        <input type="radio" name="reentry_after_one_year" id="no_78a" value="N"> <label for="no_78a" style="font-size: smaller;">No</label>
      </div>
    </div>

    <div class="mt-3">
      <label class="control-label" style="font-size: smaller;">78.b. Having been deported, excluded, or removed from the United States?</label>
      <div class="d-flexible">
        <input type="radio" name="reentry_after_removal" id="yes_78b" value="Y"> <label for="yes_78b" style="font-size: smaller;">Yes</label><br>
        <input type="radio" name="reentry_after_removal" id="no_78b" value="N"> <label for="no_78b" style="font-size: smaller;">No</label>
      </div>
    </div>
  </div>

  <div class="col-md-12 mt-4 bg-info">
    <h5><b><i>Miscellaneous Conduct</i></b></h5>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">79. Do you plan to practice polygamy in the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="practice_polygamy" id="yes_79" value="Y"> <label for="yes_79" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="practice_polygamy" id="no_79" value="N"> <label for="no_79" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">80. Are you accompanying an alien who is inadmissible and who has been certified by a medical officer as helpless from sickness, mental or physical disability, or infancy, and who requires your protection or guardianship, as described in INA section 232(c)?</label>
    <div class="d-flexible">
      <input type="radio" name="accompanying_inadmissible" id="yes_80" value="Y"> <label for="yes_80" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="accompanying_inadmissible" id="no_80" value="N"> <label for="no_80" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">81. Have you EVER assisted in detaining, retaining, or withholding custody of a U.S. citizen child outside the United States from a person who has been granted custody of the child?</label>
    <div class="d-flexible">
      <input type="radio" name="withholding_child_custody" id="yes_81" value="Y"> <label for="yes_81" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="withholding_child_custody" id="no_81" value="N"> <label for="no_81" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">82. Have you EVER voted in violation of any Federal, state, or local constitutional provision, statute, ordinance, or regulation in the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="voted_in_violation" id="yes_82" value="Y"> <label for="yes_82" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="voted_in_violation" id="no_82" value="N"> <label for="no_82" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">83. Have you EVER renounced U.S. citizenship to avoid being taxed by the United States?</label>
    <div class="d-flexible">
      <input type="radio" name="renounced_citizenship" id="yes_83" value="Y"> <label for="yes_83" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="renounced_citizenship" id="no_83" value="N"> <label for="no_83" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">Have you EVER:</label>
    
    <div class="mt-3">
      <label class="control-label" style="font-size: smaller;">84.a. Applied for exemption or discharge from training or service in the U.S. armed forces or in the U.S. National Security Training Corps on the ground that you are an alien?</label>
      <div class="d-flexible">
        <input type="radio" name="applied_exemption_military" id="yes_84a" value="Y"> <label for="yes_84a" style="font-size: smaller;">Yes</label><br>
        <input type="radio" name="applied_exemption_military" id="no_84a" value="N"> <label for="no_84a" style="font-size: smaller;">No</label>
      </div>
    </div>

    <div class="mt-3">
      <label class="control-label" style="font-size: smaller;">84.b. Been relieved or discharged from such training or service on the ground that you are an alien?</label>
      <div class="d-flexible">
        <input type="radio" name="discharged_military_alien" id="yes_84b" value="Y"> <label for="yes_84b" style="font-size: smaller;">Yes</label><br>
        <input type="radio" name="discharged_military_alien" id="no_84b" value="N"> <label for="no_84b" style="font-size: smaller;">No</label>
      </div>
    </div>

    <div class="mt-3">
      <label class="control-label" style="font-size: smaller;">84.c. Been convicted of desertion from the U.S. armed forces?</label>
      <div class="d-flexible">
        <input type="radio" name="convicted_desertion" id="yes_84c" value="Y"> <label for="yes_84c" style="font-size: smaller;">Yes</label><br>
        <input type="radio" name="convicted_desertion" id="no_84c" value="N"> <label for="no_84c" style="font-size: smaller;">No</label>
      </div>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">85. Have you EVER left or remained outside the United States to avoid or evade training or service in the U.S. armed forces in time of war or a period declared by the President to be a national emergency?</label>
    <div class="d-flexible">
      <input type="radio" name="left_to_avoid_service" id="yes_85" value="Y"> <label for="yes_85" style="font-size: smaller;">Yes</label><br>
      <input type="radio" name="left_to_avoid_service" id="no_85" value="N"> <label for="no_85" style="font-size: smaller;">No</label>
    </div>
  </div>

  <div class="col-md-12 mt-4">
    <label class="control-label" style="font-size: smaller;">86. If you answered "Yes" to Item Number 85., what was your nationality or immigration status immediately before you left (for example, U.S. citizen or national, lawful permanent resident, nonimmigrant, parolee, present without admission or parole, or any other status)?</label>
      
        <input
          type="text"
          maxlength="29"
          class="form-control"
          name="information_about_you_given_first_name"
          value="<?php echo showData('information_about_you_given_first_name'); ?>" />
  
  </div>

  <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
  <input type="button" name="next" class="next btn btn-info" value="Next" style="float: right; margin: 10px;" />
  <input type="button" name="button" class="submit btn btn-success" value="Save" style="float: right;" />
</fieldset>
<!----------------------------------------------------------------------
-------------------------------- page 22-------------------------------
------------------------------------------------------------------------>



<!----------------------------------------------------------------------
-------------------------------- page 23-------------------------------
------------------------------------------------------------------------>



<!----------------------------------------------------------------------
-------------------------------- page 24-------------------------------
------------------------------------------------------------------------>




<!-- end -->
<?php include "intake_footer.php" ?>