<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$allDataCountry = $objQuery->indexByQueryAllData("SELECT * FROM countries");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
    #registration_form fieldset:not(:first-of-type) {
        display: none;
    }

    body,
    div,
    form,
    input,
    select,
    p {
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
        line-height: 22px;
    }

    form {
        width: 100%;
        padding: 20px;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 20px 0 #095484;
    }

    input:hover,
    select:hover {
        border: 1px solid transparent;
        box-shadow: 0 0 6px 0 #095484;
        color: #095484;
    }

    input {
        margin-top: 10px;
    }

    .bg-info>h4 {
        padding: 3px;
    }

    .form-horizontal .control-label {
        text-align: left;
    }

    .d-flexible {
        display: flex;
        align-items: baseline;
        gap: 1rem;
    }
    .d-flexible-floating{display: flex;align-items: baseline;justify-content: space-between;margin:0 5px;}

    /* .border-add{border:1px solid #000000;} */
    </style>
    <title>INTAKE FOR FORM I-192</title>
</head>

<body>
    <div class="container" style="padding: 20px;">
        <h1></h1>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <div CLASS="text-center">
            <h3>Intake Form I-192, Application for Employment Authorization</h3>
        </div>
        <form id="registration_form" class="form-horizontal" action="#" method="post">
            <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
            <input type="hidden" name="client_id" value="<?php echo $clientId?>" />
            <fieldset>
                <div class="form-group">
                    <div class="page_number">
						<b><p style="text-align:right;margin-right:20px;">Page 1 of 11</p></b>
					</div>

                    <div class="bg-info text-center">
                        <h4><b>To be completed by an attorney or accredited representative (if any).</b> </h4>
                        <!-- <h4><b><i>Your Full Legal Name</i></b> </h4> -->
                    </div>
                    <div class="border-add">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="d-flexible ">
                                    <input type="checkbox" name="" id="">
                                    <p><b>Select this box if Form G-28 or Form G-28I is attached.</b></p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="attorney">Volag Number (if any):</label>
                                <br>
                                <br>
                                <input type="text" class="form-control" name="volag_number" id="attorney"
                                    value="<?php echo showData('volag_number')?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Attorney State Bar Number (if applicable):</label>
                                <br>
                                <input type="text" class="form-control" name="attorney_state_bar_number"
                                    value="<?php echo showData('attorney_state_bar_number')?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label col-md-10">Attorney or According Representative USCIS Online
                                    Account Number (if any):</label>
                                <br>
                                <br>
                                <input type="text" class="form-control" maxlength="12"
                                    name="attorney_uscis_online_account_number"
                                    value="<?php echo showData('attorney_uscis_online_account_number')?>" />
                            </div>
                        </div>
                    </div>
                    <!--border add-->
                </div>
                <div class="row">
                    <div class="col-md-5">

                       <!--  <div>
                            <h4><b><span style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span>&nbsp; START HERE - Type or print in black
                                    ink.</b></h4>
                        </div> -->

                        <div class="bg-info">
                            <h4><b>Part 1. Application Type</b> </h4>
                        </div>
                        <p>I am applying to the Secretary of Homeland Security for
                            permission to enter the United States temporarily under the
                            provisions of the Immigration and Nationality Act (INA)
                            section 212(d)(3)(A)(ii), section 212(d)(13), or section
                            212(d)(14).</p>
                        <p>I am seeking this permission so that I may obtain (select <b> only
                                one </b> box):</p>
                        <div class="d-flexible">
                            1. <input type="hidden" name="i_192_part1_1_checkbox" id="i_192_part1_1_checkbox" value="<?php echo (showData('i_192_part1_1_checkbox') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'i_192_part1_1_checkbox')" <?php echo (showData('i_192_part1_1_checkbox') == 'Y') ? 'checked' : ''; ?>>

                            <p>Admission as a nonimmigrant (other than as a T or U
                                nonimmigrant).</p>
                        </div>
                        <div class="d-flexible">
                            2. <input type="hidden" name="i_192_part1_2_checkbox" id="i_192_part1_2_checkbox" value="<?php echo (showData('i_192_part1_2_checkbox') == 'Y') ? 'Y' : 'N'; ?>" />

								<input type="checkbox" onChange="checkboxValue(this,'i_192_part1_2_checkbox')" <?php echo (showData('i_192_part1_2_checkbox') == 'Y') ? 'checked' : ''; ?>>
                            <p>Status as a victim of trafficking (T nonimmigrant
                                status) or a victim of a crime (U nonimmigrant
                                status).</p>
                        </div>




                    </div><!-- left side column -->

                    <div class="col-md-6 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 2. Information About You</b> </h4>
                            <!-- <h4><b><i>Your Full Legal Name</i></b> </h4> -->
                        </div>
                        <div class="bg-info">
                            <h4><b>Your Full Name</b> </h4>
                            <!-- <h4><b><i>Your Full Legal Name</i></b> </h4> -->
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_family_last_name"
                                    value="<?php echo showData('information_about_you_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_given_first_name"
                                    value="<?php echo showData('information_about_you_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_middle_name"
                                    value="<?php echo showData('information_about_you_middle_name')?>" />
                            </div>
                        </div>

                    </div><!-- right side column -->
                </div>
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>
            <!-- ----------------------------------------------------------------------------------------
            ----------------------------------------------Page number 1 end ------------------------------
            ------------------------------------------------------------------------------------------------>

            <!-- ----------------------------------------------------------------------------------------
            ----------------------------------------------Page number 2 start ------------------------------
            ------------------------------------------------------------------------------------------------->
            <fieldset>
                <div class="row">
                    <div class="page_number">
						<b><p style="text-align:right;margin-right:20px;">Page 2 of 11</p></b>
					</div>

                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 2. Information About You (continued)</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Other Names Used (if any)</b> </h4>
                        </div>
                        <p>Provide all other names you have ever used, including aliases,
                            maiden name, and nicknames. If you need extra space to
                            complete this section, use the space provided in <b>Part 8.</b></p>
                        <h5><b>Additional Information.</b></h5>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_other_family_last_name"
                                    value="<?php echo showData('information_about_you_other_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_other_given_first_name"
                                    value="<?php echo showData('information_about_you_other_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_other_middle_name"
                                    value="<?php echo showData('information_about_you_other_middle_name')?>" />
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_other_names_used_last_name"
                                    value="<?php echo showData('information_about_other_names_used_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_other_names_used_first_name"
                                    value="<?php echo showData('information_about_other_names_used_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_other_names_used_middle_name"
                                    value="<?php echo showData('information_about_other_names_used_middle_name')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Other Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Alien Registration Number (A-Number) (if any) :
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
                                        class="form-control"
                                        name="other_information_about_you_alien_registration_number"
                                        value="<?php echo showData('other_information_about_you_alien_registration_number')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. USCIS Online Account Number (if any) : </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="other_information_about_you_uscis_online_account_number"
                                        value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Date of Birth (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                                    value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">7. Gender: </label>
                            <div class="col-md-6">
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_gender" value="male" <?php echo (showData('other_information_about_you_gender')=='male')? 'checked':''?>>
                                    Male
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_gender" value="female" <?php echo (showData('other_information_about_you_gender')=='female')? 'checked':''?>> Female
                                </label>
                            </div>
                        </div>
                        <p>Place of Birth</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.a. City or Town </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="information_about_you_city_town_village"
                                    value="<?php echo showData('information_about_you_city_town_village')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.b. State or Province </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="information_about_you_state_province"
                                    value="<?php echo showData('information_about_you_state_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.c. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_country_of_birth"
                                    value="<?php echo showData('other_information_about_you_country_of_birth')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">9. Country of Citizenship or Nationality </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_country_of_citizen"
                                    value="<?php echo showData('other_information_about_you_country_of_citizen')?>">
                            </div>
                        </div>
                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <div class="bg-info">
                            <div class="d-flexible-floating">
                            <h4><b>Mailing Address</b></h4>
                            <a data-element-id="2664R" title="https://tools.usps.com/go/ZipLookupAction_input" href="https://tools.usps.com/go/ZipLookupAction_input" target="_blank" rel="noopener noreferrer nofollow" id="pdfjs_internal_id_2664R">USPS ZIP Code Lookup</a></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">10.a. In Care Of Name (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_mailing_care_of_name"
                                    value="<?= showData('information_about_you_mailing_care_of_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.b. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_street_number"
                                    value="<?= showData('information_about_you_home_street_number') ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-md-6"><b>10.c. </b> &nbsp;

                                <input type="radio" name="" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="" value="ste" checked=""> Ste. &nbsp;

                                <input type="radio" name="" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_safe_mailing_number"
                                    value="Street">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.d. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_city_town"
                                    value="<?= showData('information_about_you_home_city_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.e. State </label>
                            <div class="col-md-7">
                                <select name="information_about_you_home_state" class="form-control">
                                    <option value="0">Select</option>
                                    <?php 
                                        if(showData('information_about_you_home_state')!='')
                                            echo"<option value='".showData('information_about_you_home_state')."' selected>".showData('information_about_you_home_state')."</option>";

                                    foreach($allDataCountry as $record){
                                    echo"<option value='$record->state_code'>$record->state_code</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.f. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_zip_code"
                                    value="<?= showData('information_about_you_home_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.g. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_province"
                                    value="<?= showData('information_about_you_safe_mailing_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.h. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_postal_code"
                                    value="<?= showData('information_about_you_safe_mailing_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">10.i. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_country"
                                    value="<?= showData('information_about_you_safe_mailing_country')?>">
                            </div>
                        </div>

                        <div class="bg-info">
                            <h4><b>Safe Mailing Address</b></h4>
                        </div>
                        <p>If you are a T or U visa applicant, and do not want U.S.
                            Citizenship and Immigration Services (USCIS) to send notices
                            about this application to your home, you may provide a safe
                            mailing address.</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">11.a. In Care Of Name (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_care_of_name"
                                    value="<?= showData('information_about_you_safe_mailing_care_of_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">11.b. Organization Name (if applicable)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_organization_name"
                                    value="<?= showData('information_about_you_safe_mailing_organization_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.c. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_street_number"
                                    value="<?= showData('information_about_you_safe_mailing_street_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>11.d. </b> &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_safe_mailing_number"
                                    value="<?= showData('information_about_you_safe_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.e. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_city_town"
                                    value="<?= showData('information_about_you_safe_mailing_city_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.f. State </label>
                            <div class="col-md-7">
                                <select name="information_about_you_safe_mailing_state" class="form-control">
                                    <option value="0">Select</option>
                                    <?php 
                                        if(showData('information_about_you_safe_mailing_state')!='')
                                            echo"<option value='".showData('information_about_you_safe_mailing_state')."' selected>".showData('information_about_you_safe_mailing_state')."</option>";

                                    foreach($allDataCountry as $record){
                                        echo"<option value='$record->state_code'>$record->state_code</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.g. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_zip_code"
                                    value="<?= showData('information_about_you_safe_mailing_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.h. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_province"
                                    value="<?= showData('information_about_you_safe_mailing_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.i. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_postal_code"
                                    value="<?= showData('information_about_you_safe_mailing_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">11.j. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_country"
                                    value="<?= showData('information_about_you_safe_mailing_country')?>">
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 2 end  -->
            <fieldset>
                <div class="row">
                    <div class="page_number">
						<b><p style="text-align:right;margin-right:20px;">Page 3 of 11</p></b>
					</div>
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 2. Information About You (continued)</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Address History</b> </h4>
                        </div>
                        <p>Provide physical addresses for everywhere you have lived
                            during the last five years, whether inside or outside the United
                            States. Provide your current address first. If you need extra
                            space to complete this section, use the space provided in <b>Part 8.</b>
                        </p>
                        <h5><b>Additional Information.</b></h5>
                        <p>Physical Address 1 (current address)</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_street_number"
                                    value="<?= showData('information_about_you_home_street_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>12.b. </b> &nbsp;

                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="information_about_you_home_safe_mailing_number"
                                    value="<?= showData('information_about_you_home_safe_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_city_town"
                                    value="<?= showData('information_about_you_home_city_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.e. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_zip_code"
                                    value="<?= showData('information_about_you_home_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.f. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_province"
                                    value="<?= showData('information_about_you_home_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.g. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_postal_code"
                                    value="<?= showData('information_about_you_home_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">12.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="information_about_you_home_country"
                                    value="<?= showData('information_about_you_home_country')?>">
                            </div>
                        </div>
                        <p>Dates of Residence</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">13.a. From (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_address_date_of_residence_from"
                                    value="<?= showData('address_history_physical_address_date_of_residence_from')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">13.b. To (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_address_date_of_residence_to"
                                    value="<?= showData('address_history_physical_address_date_of_residence_to')?>" />
                            </div>
                        </div>
                        <hr>
                        <p>Physical Address 2</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">14.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_street_number_and_name"
                                    value="<?= showData('information_about_you_second_home_street_number_and_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>14.b. </b> &nbsp;

                                <input type="radio" name="information_about_you_second_home_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_second_home_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_second_home_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_safe_mailing_number"
                                    value="<?= showData('information_about_you_second_home_safe_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_city_town"
                                    value="<?= showData('information_about_you_second_home_city_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14.e. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_zip_code"
                                    value="<?= showData('information_about_you_second_home_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14.f. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_province"
                                    value="<?= showData('information_about_you_second_home_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14.g. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_postal_code"
                                    value="<?= showData('information_about_you_second_home_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">14.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="information_about_you_second_home_country"
                                    value="<?= showData('information_about_you_second_home_country')?>">
                            </div>
                        </div>
                        <p>Dates of Residence</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">15.a. From (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_second_address_date_of_residence_from"
                                    value="<?= showData('address_history_physical_second_address_date_of_residence_from')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">15.b. To (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_second_address_date_of_residence_to"
                                    value="<?= showData('address_history_physical_second_address_date_of_residence_to')?>" />
                            </div>
                        </div>

                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <p>Physical Address 3</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_third_home_street_number_and_name"
                                    value="<?= showData('information_about_you_third_home_street_number_and_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>16.b. </b> &nbsp;

                                <input type="radio" name="information_about_you_third_home_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_third_home_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_third_home_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="information_about_you_third_home_safe_mailing_number"
                                    value="<?= showData('information_about_you_third_home_safe_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_third_home_city_town"
                                    value="<?= showData('information_about_you_third_home_city_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <?php foreach($allDataCountry as $record){ ?>
                                    <option value="<?= $record->state_code ?>" class="form-control">
                                        <?= $record->state_code ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.e. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_third_home_zip_code"
                                    value="<?= showData('information_about_you_third_home_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.f. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_second_home_province"
                                    value="<?= showData('information_about_you_second_home_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.g. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_third_home_postal_code"
                                    value="<?= showData('information_about_you_third_home_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">16.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="information_about_you_third_home_country"
                                    value="<?= showData('information_about_you_third_home_country')?>">
                            </div>
                        </div>
                        <p>Dates of Residence</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">17.a. From (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_third_address_date_of_residence_from"
                                    value="<?= showData('address_history_physical_third_address_date_of_residence_from')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">17.b. To (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_third_address_date_of_residence_to"
                                    value="<?= showData('address_history_physical_third_address_date_of_residence_to')?>" />
                            </div>
                        </div>
                        <hr>
                        <p>Physical Address 4</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">18.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_fourth_home_street_number_and_name"
                                    value="<?= showData('information_about_you_fourth_home_street_number_and_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>18.b. </b> &nbsp;

                                <input type="radio" name="information_about_you_fourth_home_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_fourth_home_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_fourth_home_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="information_about_you_fourth_home_safe_mailing_number"
                                    value="<?= showData('information_about_you_fourth_home_safe_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">18.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_fourth_home_city_town"
                                    value="<?= showData('information_about_you_fourth_home_city_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">18.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">18.e. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_fourth_home_zip_code"
                                    value="<?= showData('information_about_you_fourth_home_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">18.f. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_fourth_home_province"
                                    value="<?= showData('information_about_you_fourth_home_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">18.g. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_fourth_home_postal_code"
                                    value="<?= showData('information_about_you_fourth_home_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">18.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="information_about_you_fourth_home_country"
                                    value="<?= showData('information_about_you_fourth_home_country')?>">
                            </div>
                        </div>
                        <p>Dates of Residence</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">19.a. From (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_fourth_address_date_of_residence_from"
                                    value="<?= showData('address_history_physical_fourth_address_date_of_residence_from')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">19.b. To (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="address_history_physical_fourth_address_date_of_residence_to"
                                    value="<?= showData('address_history_physical_fourth_address_date_of_residence_to')?>" />
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 3 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 2. Information About You (continued)</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Travel Information</b> </h4>
                        </div>
                        <p><b>NOTE:</b> If you are applying for T or U nonimmigrant status and
                            are in the United States, you may skip <b>Item Numbers 20. - 25.</b>
                        </p>
                        <p>Location at Which you Plan to Enter the United States (desired
                            Port-of-Entry)</p>

                        <div class="form-group">
                            <label class="control-label col-md-5">20.a. City</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_travel_info_city"
                                    value="<?= showData('information_about_you_travel_info_city')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">20.b. State </label>
                            <div class="col-md-7">
                                <select name="information_about_you_travel_info_state" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">21. Name of Port-of-Entry </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_travel_info_port_of_entry"
                                    value="<?= showData('information_about_you_travel_info_port_of_entry')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">22. How do you plan to travel to the United States?
                                (For example, by plane, ship, car) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_travel_info_plan_to_travel"
                                    value="<?= showData('information_about_you_travel_info_plan_to_travel')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">23. When do you plan to enter the United States?
                                (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_you_travel_info_plan_to_enter"
                                    value="<?= showData('information_about_you_travel_info_plan_to_enter')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">24. Approximate Length of Stay in the United States
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_travel_info_approximate_length_of_stay"
                                    value="<?= showData('information_about_you_travel_info_approximate_length_of_stay')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">25. What is the purpose of your stay in the United
                                States? Explain fully below
                            </label>
                            <div class="col-md-12">
                                <textarea name="information_about_you_travel_info_explain_fully_purpose_of_stay" id=""
                                    class="form-control" cols="30" rows="10">
                                    <?= showData('information_about_you_travel_info_explain_fully_purpose_of_stay')?>
                                </textarea>
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Immigration and Criminal History</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">26. Do you believe that you may be inadmissible to
                                the United States?</label>
                            <div class="col-md-7 col-md-offset-8">
                                <input type="radio" name="" value="yes">
                                Yes &nbsp;

                                <input type="radio" name="" value="no"> No

                            </div>
                        </div>
                        <p>If you answered "Yes" to <b>Item Number 26.</b>, explain the
                            reasons why you believe, according to the best of your
                            knowledge, that you may be inadmissible in <b>Part 8.</b>
                            <b>Additional Information.</b> If you were told that you are
                            inadmissible, provide the reason you were given.
                        </p>

                        <div class="form-group">
                            <label class="control-label col-md-12">27. Have you previously filed an application for
                                advance
                                permission to enter the United States as a nonimmigrant?</label>
                            <div class="col-md-7 col-md-offset-8">
                                <input type="radio" name="" value="yes">
                                Yes &nbsp;

                                <input type="radio" name="" value="no"> No

                            </div>
                        </div>
                        <p>If you answered "Yes" to <b>Item Number 27.</b>, provide the
                            details in <b>Item Numbers 28. - 29.e.</b> If you need extra
                            space to complete this section, use the space provided in
                            <b>Part 8. Additional Information.</b>
                        </p>

                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label col-md-12">28. Date Application Filed (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_immigration_and_criminal_history_date_applic"
                                    value="<?= showData('information_about_immigration_and_criminal_history_date_applic')?>">
                            </div>
                        </div>
                        <p>Location where you filed your application (for example, USCIS
                            Office or Port-of-Entry).</p>

                        <div class="form-group">
                            <label class="control-label col-md-5">29.a. USCIS Office or U.S. Port-of-Entry </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">29.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry_city_or_town"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">29.c. State or Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry_state_or_province"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry_state_or_province')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">29.d. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry_country"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry_country')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">29.e. Receipt Number (if available) </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="information_about_uscis_office_or_port_of_entry_receipt_numb"
                                        value="<?= showData('information_about_uscis_office_or_port_of_entry_receipt_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">30. Have you <b>EVER</b> been in the United States
                                for a
                                period of
                                six months or more?</label>
                            <div class="col-md-7 col-md-offset-8">
                                <input type="radio" name="" value="yes">
                                Yes &nbsp;

                                <input type="radio" name="" value="no"> No

                            </div>
                        </div>
                        <p>If you answered "Yes" to <b>Item Number 30.</b>, provide the
                            dates you were in the United States (from and to) and
                            your immigration status at the time of entry into the
                            United States in the space provided in <b>Part 8. Additional
                                Information.</b></p>

                        <div class="form-group">
                            <label class="control-label col-md-12">31. Have you EVER filed an application or petition
                                for
                                immigration benefits with the U.S. Government, or has
                                one ever been filed on your behalf?</label>
                            <div class="col-md-7 col-md-offset-8">
                                <input type="radio" name="" value="yes">
                                Yes &nbsp;

                                <input type="radio" name="" value="no"> No

                            </div>
                        </div>
                        <p>If you answered "Yes" to <b>Item Number 31.</b>, provide the
                            information requested in <b>Item Numbers 32.a. - 32.c.</b></p>
                        <br>
                        <p>If you (or somebody else on your behalf) have filed multiple
                            applications or petitions for immigration benefits with the U.S.
                            Government, use the space provided in <b>Part 8. Additional
                                Information</b> to provide the answers to <b>Item Numbers
                                32.a. - 32.c.</b> for each of your additional applications or petitions.</p>

                        <div class="form-group">
                            <label class="control-label col-md-12">32.a. Type of Application or Petition Filed </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry_application_or_petition"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry_application_or_petition')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">32.b. Location Where You (or the Other Person) Filed
                                the
                                Application or Petition (for example, USCIS office or
                                Port-of-Entry); </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry_location_where_you"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry_location_where_you')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">32.c. Outcome of the Application or Petition (for
                                example,
                                approved, denied, or is pending). </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_uscis_office_or_port_of_entry_outcome_of_the_application_type"
                                    value="<?= showData('information_about_uscis_office_or_port_of_entry_outcome_of_the_application_type')?>">
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 4 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 2. Information About You (continued)</b> </h4>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><b>33.</b> Have you <b>EVER</b> been denied or refused an
                                immigration
                                benefit by the U.S. Government, or had a benefit revoked
                                or terminated (including but not limited to visas)?</div>
                            <div class="col-md-7 col-md-offset-8">
                                <input type="radio" name="" value="yes">
                                Yes &nbsp;

                                <input type="radio" name="" value="no"> No

                            </div>
                        </div>
                        <p>If you answered "Yes" to <b>Item Number 33.</b>, provide an
                            explanation the information in the space provided in
                            <b>Part 8. Additional Information.</b>
                        </p>
                        <div class="form-group">
                            <div class="col-md-12"><b>34.</b> Have you <b>EVER</b>, in or outside the United States,
                                been
                                arrested, cited, charged, indicted, fined, convicted, or
                                imprisoned for breaking or violating any law or
                                ordinance, excluding minor traffic violations?</div>
                            <div class="col-md-7 col-md-offset-8">
                                <input type="radio" name="" value="yes">
                                Yes &nbsp;

                                <input type="radio" name="" value="no"> No

                            </div>
                        </div>
                        <p>If you answered "Yes" to <b>Item Number 34</b>., describe the
                            incidents in detail and include all offenses where impaired
                            driving may have been an issue in the space provided in
                            <b>Part 8. Additional Information</b>.</b>
                        </p>
                        <div class="bg-info">
                            <h4><b>Part 3. Biographic Information</b> </h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">1. Ethnicity (Select <b>only one</b> box)</label>
                            <div class="col-md-12">

                                <input type="radio" name="information_about_biography_info_ethnicity"
                                    value="<?= showData('information_about_biography_info_ethnicity')?>">
                                Hispanic or Latino &nbsp;
                            </div>
                            <div class="col-md-12">

                                <input type="radio" name="information_about_biography_info_ethnicity"
                                    value="<?= showData('information_about_biography_info_ethnicity')?>">
                                Not Hispanic or Latino
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. Race (Select <b>all applicable</b> boxes)</label>
                            <div class="col-md-12">

                                <input type="checkbox" name="information_about_biography_info_race"
                                    value="<?= showData('information_about_biography_info_race')?>">
                                American Indian or Alaska Native &nbsp;
                            </div>
                            <div class="col-md-12">

                                <input type="checkbox" name="information_about_biography_info_race"
                                    value="<?= showData('information_about_biography_info_race')?>">
                                Asian &nbsp;
                            </div>
                            <div class="col-md-12">

                                <input type="checkbox" name="information_about_biography_info_race"
                                    value="<?= showData('information_about_biography_info_race')?>">
                                Black or African American &nbsp;
                            </div>
                            
                            <div class="col-md-12">

                                <input type="checkbox" name="information_about_biography_info_race"
                                    value="<?= showData('information_about_biography_info_race')?>">
                                Native Hawaiian or Other Pacific Islander &nbsp;
                            </div>
                            <div class="col-md-12">
                                <input type="checkbox" name="information_about_biography_info_race"
                                    value="<?= showData('information_about_biography_info_race')?>">
                                White
                            </div>

                        </div>
                        <div class="form-group">
                            <h5 class="control-label col-md-5">3. Height </h5>
                            <div class="col-md-3">
                                <div class="d-flexible">
                                    <span>Feet</span>
                                    <select name="information_about_biography_info_height_feet" id=""
                                        class="form-control">
                                        <option value="" class="form-control"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible">
                                    <span>Inches</span>
                                    <select name="information_about_biography_info_height_inches" id=""
                                        class="form-control">
                                        <option value="" class="form-control"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5 class="control-label col-md-5">4. Weight </h5>
                            <div class="col-md-3">
                                <div class="d-flexible">
                                    <span>Pounds</span>
                                    <input type="text" class="form-control"
                                        name="information_about_biography_info_weight_pounds" id="">
                                    <input type="text" class="form-control"
                                        name="information_about_biography_info_weight_pounds" id="">
                                    <input type="text" class="form-control"
                                        name="information_about_biography_info_weight_pounds" id="">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <h5 class="control-label col-md-12">5. Eye Color (Select <b>only one</b> box) </h5>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Black</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Blue</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Brown</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Gray</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Green</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Hazel</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Maroon</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Pink</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_eye_color" id="">
                                    <p>Unknown/Other</p>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <h5 class="control-label col-md-12">6. Hair Color (Select <b>only one</b> box) </h5>
                            <div class="col-md-4">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Bald (No hair)</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Black</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Blond</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Brown</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Gray</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Red</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Sandy</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>White</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flexible ">
                                    <input type="radio" name="information_about_biography_info_hair_color" id="">
                                    <p>Unknown/Other</p>
                                </div>
                            </div>

                        </div>


                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 4. Other Information About You</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Employment History</b></h4>
                        </div>
                        <p>Provide your employment history for the last five years,
                            whether inside or outside the United States. Provide the most
                            recent employment first. If you need extra space to complete
                            this section, use the space provided in <b>Part 8. Additional
                                Information.</b></p>
                        <p>Employer 1 (current or most recent)</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">1. Name of Employer or Company </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_company_name"
                                    value="<?= showData('other_information_employment_history_company_name')?>">
                            </div>
                        </div>
                        <p>Address of Employer or Company</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_street_number"
                                    value="<?= showData('other_information_employment_history_addr_street_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>2.b. </b> &nbsp;

                                <input type="radio" name="other_information_employment_history_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="other_information_employment_history_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="other_information_employment_history_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_safe_mailing_number"
                                    value="<?= showData('other_information_employment_history_safe_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_city_or_town"
                                    value="<?= showData('other_information_employment_history_addr_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.e. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_zip_code"
                                    value="<?= showData('other_information_employment_history_addr_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.f. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_province"
                                    value="<?= showData('other_information_employment_history_addr_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.g. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_postal_code"
                                    value="<?= showData('other_information_employment_history_addr_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_country"
                                    value="<?= showData('other_information_employment_history_addr_country')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3. Your Occupation </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="other_information_employment_history_addr_occupation"
                                    value="<?= showData('other_information_employment_history_addr_occupation')?>">
                            </div>
                        </div>
                        <p>Dates of Employment</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">4.a. Date From (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_employment_history_addr_dates_of_employee_from"
                                    value="<?= showData('other_information_employment_history_addr_dates_of_employee_from')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4.b. To (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_employment_history_addr_dates_of_employee_to"
                                    value="<?= showData('other_information_employment_history_addr_dates_of_employee_to')?>">
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 5 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 4. Other Information About You (continued)</b> </h4>
                        </div>
                        <p>Employer 2</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">1. Name of Employer or Company </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="other_information_name_of_employer_or_company"
                                    value="<?= showData('other_information_name_of_employer_or_company')?>">
                            </div>
                        </div>
                        <p>Address of Employer or Company</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="other_information_street_number_and_name"
                                    value="<?= showData('other_information_street_number_and_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>6.b. </b> &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_safe_mailing_number"
                                    value="Street">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="other_information_city_or_town"
                                    value="<?= showData('other_information_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.e. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="other_information_zip_code"
                                    value="<?= showData('other_information_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.f. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="other_information_province"
                                    value="<?= showData('other_information_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.g. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="other_information_postal_code"
                                    value="<?= showData('other_information_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="other_information_country"
                                    value="<?= showData('other_information_country')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">7. Your Occupation </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="other_information_occupation"
                                    value="<?= showData('other_information_occupation')?>">
                            </div>
                        </div>
                        <p>Dates of Employment</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.a. From (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_dates_of_employment_from"
                                    value="<?= showData('other_information_dates_of_employment_from')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.b. To (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="other_information_dates_of_employment_to"
                                    value="<?= showData('other_information_dates_of_employment_to')?>">
                            </div>
                        </div>

                        <div class="bg-info">
                            <h4><b>Information About Your Parents</b> </h4>
                        </div>
                        <p>Information About Your Mother</p>
                        <p>Mother's Legal Name</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">9.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_your_mother_family_last_name"
                                    value="<?php echo showData('information_about_your_mother_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">9.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_your_mother_given_first_name"
                                    value="<?php echo showData('information_about_your_mother_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">9.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_your_mother_middle_name"
                                    value="<?php echo showData('information_about_your_mother_middle_name')?>" />
                            </div>
                        </div>
                        <p>Mother's Name at Birth (if different than above)</p>


                        <div class="form-group">
                            <label class="control-label col-md-5">10.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="mother_maiden_name"
                                    value="<?= showData('mother_maiden_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="mother_maiden_name"
                                    value="<?= showData('mother_maiden_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="mother_maiden_name"
                                    value="<?= showData('mother_maiden_name')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">11. Date of Birth (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="mother_date_of_birth"
                                    value="<?php echo showData('mother_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">12. City or Town of Birth</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="mother_birth_location"
                                    value="<?php echo showData('mother_birth_location')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">13. Country of Birth</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="mother_country_of_birth"
                                    value="<?php echo showData('mother_country_of_birth')?>" />
                            </div>
                        </div>

                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label col-md-12">14. Current City or Town of Residence (if living)
                                :</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control" name="mother_city_town_village_of_residence"
                                    value="<?php echo showData('mother_city_town_village_of_residence')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">15. Current Country of Residence (if living)
                                :</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control" name="mother_country_of_residence"
                                    value="<?php echo showData('mother_country_of_residence')?>" />
                            </div>
                        </div>
                        <p>Information About Your Father</p>
                        <p>Father's Legal Name</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_your_father_family_last_name"
                                    value="<?php echo showData('information_about_your_father_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_your_father_given_first_name"
                                    value="<?php echo showData('information_about_your_father_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_your_father_middle_name"
                                    value="<?php echo showData('information_about_your_father_middle_name')?>" />
                            </div>
                        </div>
                        <p>Father's Name at Birth (if different than above)</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">17.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_father_name_of_birth_last_name"
                                    value="<?php echo showData('other_information_father_name_of_birth_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">17.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_father_name_of_birth_first_name"
                                    value="<?php echo showData('other_information_father_name_of_birth_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">17.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_father_name_of_birth_middle_name"
                                    value="<?php echo showData('other_information_father_name_of_birth_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">18. Date of Birth (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_your_father_date_of_birth"
                                    value="<?php echo showData('information_about_your_father_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">19. City or Town of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="father_birth_location"
                                    value="<?php echo showData('father_birth_location')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">20. Country of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="father_country_of_birth"
                                    value="<?php echo showData('father_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">21. Current City or Town of Residence (if living)
                                :</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control" name="father_city_town_village_of_residence"
                                    value="<?= showData('father_city_town_village_of_residence')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">22. Current Country of Residence (if living)
                                :</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control" name="father_country_of_residence"
                                    value="<?= showData('father_country_of_residence')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Information About Your Marital History</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">23. What is your current marital status? </label>
                            <div class="col-md-10 col-md-offset-2">

                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status" value="single"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>>
                                    Single, Never Married
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status"
                                        value="married"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'married') ? 'checked' : ''; ?>>
                                    Married
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status"
                                        value="divorced"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'divorced') ? 'checked' : ''; ?>>
                                    Divorced
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status"
                                        value="widowed"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'widowed') ? 'checked' : ''; ?>>
                                    Widowed
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status"
                                        value="legally separated"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'legally_separated') ? 'checked' : ''; ?>>
                                    Legally Separated
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status"
                                        value="marriage annulled"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'marriage_annulled') ? 'checked' : ''; ?>>
                                    Marriage Annulled
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status" value="other"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'other') ? 'checked' : ''; ?>>
                                    Other
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">24. How many times have you been married (including
                                annulled marriages and marriages to the same person)? </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="other_information_about_your_marital_history_annulled_marriages_and_marriages_same_person"
                                        value="<?= showData('other_information_about_your_marital_history_annulled_marriages_and_marriages_same_person')?>">
                                </div>
                            </div>
                        </div>

                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 6 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 4. Other Information About You (continued)</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Information About Your Current Marriage <br> </b>(including if you are legally
                                separated)</h4>
                        </div>
                        <p>If you are currently married, provide the following information
                            about your current spouse.</p>
                        <p>Current Spouse's Legal Name</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">25.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="spouse_last_name"
                                    value="<?php echo showData('spouse_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">25.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="spouse_first_name"
                                    value="<?php echo showData('spouse_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">25.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="spouse_middle_name"
                                    value="<?php echo showData('spouse_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">26. A-Number (if any) </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
                                        class="form-control" name="information_about_your_current_marriage_a_number_of"
                                        value="<?= showData('information_about_your_current_marriage_a_number_of')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">27. Current Spouse's Date of Birth
                                (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_spouse_children_date_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">28. Date of Marriage to Current Spouse
                                (mm/dd/yyyy):</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="current_marriage_date"
                                    value="<?php echo showData('current_marriage_date')?>" />
                            </div>
                        </div>
                        <p>Current Spouse's Place of Birth</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">29.a. City or Town </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="current_spouses_place_and_birth_city_or_town"
                                    value="<?= showData('current_spouses_place_and_birth_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">29.b. State or Province </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="current_spouses_place_and_birth_state_or_province"
                                    value="<?= showData('current_spouses_place_and_birth_state_or_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">29.c. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="current_spouses_place_and_birth_country"
                                    value="<?= showData('current_spouses_place_and_birth_country')?>">
                            </div>
                        </div>
                        <p>Place of Marriage to Current Spouse</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">30.a. City or Town </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="city_of_marriage"
                                    value="<?= showData('city_of_marriage')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">30.b. State or Province </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="state_of_marriage"
                                    value="<?= showData('state_of_marriage')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">30.c. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="country_of_marriage"
                                    value="<?= showData('country_of_marriage')?>">
                            </div>
                        </div>
                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Information About Prior Marriages (if any)</b> </h4>
                        </div>
                        <p>If you have been married before, whether in the United States or
                            in any other country, provide the information requested in <b>Item
                                Numbers 31.a. - 36.c.</b> about your prior marriage. If you have
                            had more than one previous marriage, use the space provided in
                            <b>Part 8. Additional Information</b> to provide the answers to <b>Item
                                Numbers 31.a. - 36.c.</b> for each additional marriage.
                        </p><br>
                        <p>Prior Spouse's Legal Name (provide family name before
                            marriage)</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">31.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="previous_spouse_name"
                                    value="<?php echo showData('previous_spouse_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">31.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_prior_marriage_given_first_name"
                                    value="<?php echo showData('information_about_prior_marriage_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">31.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_prior_marriage_given_middle_name"
                                    value="<?php echo showData('information_about_prior_marriage_given_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">32. Prior Spouse's Date of Birth (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_prior_marriage_date_of_birth"
                                    value="<?= showData('information_about_prior_marriage_date_of_birth')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">33. Date of Marriage to Prior Spouse
                                (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_prior_marriage_date_of_marriage"
                                    value="<?= showData('information_about_prior_marriage_date_of_marriage')?>">
                            </div>
                        </div>
                        <p>Place of Marriage to Prior Spouse</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">34.a. City or Town </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="place_of_marriage_to_prior_spouse_city_or_town"
                                    value="<?= showData('place_of_marriage_to_prior_spouse_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">34.b. State or Province </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="place_of_marriage_to_prior_spouse_state_or_province"
                                    value="<?= showData('place_of_marriage_to_prior_spouse_state_or_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">34.c. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="place_of_marriage_to_prior_spouse_country"
                                    value="<?= showData('place_of_marriage_to_prior_spouse_country')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">35. Date Marriage with Prior Spouse Legally Ended
                                (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="place_of_marriage_to_prior_spouse_legally_ended"
                                    value="<?= showData('place_of_marriage_to_prior_spouse_legally_ended')?>">
                            </div>
                        </div>
                        <p>Place Where Marriage with Prior Spouse Legally Ended</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">36.a. City or Town </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="place_where_marriage_with_prior_city_or_town"
                                    value="<?= showData('place_where_marriage_with_prior_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">36.b. State or Province </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="place_where_marriage_with_prior_state_or_province"
                                    value="<?= showData('place_where_marriage_with_prior_state_or_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">36.c. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="place_where_marriage_with_prior_country"
                                    value="<?= showData('place_where_marriage_with_prior_country')?>">
                            </div>
                        </div>

                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 7 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 5. Applicant's Statement, Contact
                                    Information, Declaration, Certification, and
                                    Signature</b> </h4>
                        </div>
                        <p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-192
                            Instructions before completing this section.</p>
                        <div class="bg-info">
                            <h4><b>Applicant's Statement</b> </h4>
                        </div>
                        <p><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
                            applicable, select the box for <b>Item Number 2.</b></p>
                        <div class="d-flexible">
                            <b>1.a.</b> <input type="checkbox" name="" id="">
                            <p>I can read and understand English, and I have read
                                and understand every question and instruction on this
                                application and my answer to every question.</p>
                        </div>
                        <div class="d-flexible">
                            <b>1.b.</b> <input type="checkbox" name="" id="">
                            <p>The interpreter named in <b>Part 6.</b> read to me every
                                question and instruction on this application and my
                                answer to every question in</p>
                        </div>
                        <input type="text" class="form-control">
                        <p>a language in which I am fluent, and I understood
                            everything.</p>
                        <div class="d-flexible">
                            <b>2.</b> <input type="checkbox" name="" id="">
                            <p>At my request, the preparer named in <b>Part 7.</b></p>
                        </div>
                        <input type="text" class="form-control">
                        <p>prepared this application for me based only upon
                            information I provided or authorized.</p>


                        <div class="bg-info">
                            <h4><b>Applicant's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3. Applicant's Daytime Telephone Number </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="application_contact_information_daytime"
                                    value="<?= showData('application_contact_information_daytime')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Applicant's Mobile Telephone Number (if any)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="application_contact_information_mobile_tel_number"
                                    value="<?= showData('application_contact_information_mobile_tel_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Applicant's Email Address (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="application_contact_information_email_addr"
                                    value="<?= showData('application_contact_information_email_addr')?>">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Applicant's Declaration and Certification</b> </h4>
                        </div>
                        <p>Copies of any documents I have submitted are exact
                            photocopies of unaltered, original documents, and I understand
                            that the U.S. Department of Homeland Security (DHS) may
                            require that I submit original documents to DHS at a later date.
                            Furthermore, I authorize the release of any information from
                            any and all of my records that DHS may need to determine my
                            eligibility for the immigration benefit that I seek</p>
                        <p>I furthermore authorize release of information contained in this
                            application, in supporting documents, and in my DHS records,
                            to other entities and persons where necessary for the
                            administration and enforcement of U.S. immigration law.</p>
                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <p>I understand that DHS may require me to appear for an
                            appointment to take my biometrics (fingerprints, photograph,
                            and/or signature) and, at that time, if I am required to provide
                            biometrics, I will be required to sign an oath reaffirming that:</p>
                        <p>&nbsp;&nbsp;<b>1)</b> I reviewed and understood all of the information
                            contained in, and submitted with, my application; and</p>
                        <p>&nbsp;&nbsp;<b>2)</b> All of this information was complete, true, and correct
                            at the time of filing</p>
                        <p>I certify, under penalty of perjury, that all of the information in
                            my application and any document submitted with it were
                            provided or authorized by me, that I reviewed and understand
                            all of the information contained in, and submitted with, my
                            application and that all of this information is complete, true,
                            and correct</p>
               
                        <div class="bg-info">
                            <h4><b>Applicant's Signature</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.a. Applicant's Signature </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="applicants_signature"
                                    value="<?= showData('applicants_signature')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="applicants_date_signature"
                                    value="<?= showData('applicants_date_signature')?>">
                            </div>
                        </div>
                        <p><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill
                            out this application or fail to submit required documents listed
                            in the Instructions, USCIS may deny your application.</p>
                        <div class="bg-info">
                            <h4><b>Part 6. Interpreter's Contact Information,
                                    Certification, and Signature</b> </h4>
                        </div>
                        <p>Provide the following information about the interpreter.</p>
                        <div class="bg-info">
                            <h4><b>Interpreter's Full Name</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="interpreters_last_name"
                                    value="<?= showData('interpreters_last_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="interpreters_first_name"
                                    value="<?= showData('interpreters_first_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if
                                any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="interpreters_business_and_organization_name"
                                    value="<?= showData('interpreters_business_and_organization_name')?>">
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 8 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 6. Interpreter's Contact Information,
                                    Certification, and Signature (continued)</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Interpreter's Mailing Address</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_street_num"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_street_num')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b. </b> &nbsp;
                                <input type="radio" name="interpreters_contact_info_mailing_addr_apt_ste_flr"
                                    value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="interpreters_contact_info_mailing_addr_apt_ste_flr"
                                    value="ste" checked=""> Ste. &nbsp;

                                <input type="radio" name="interpreters_contact_info_mailing_addr_apt_ste_flr"
                                    value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_mailing_number"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_mailing_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. City or Town</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_city_or_town"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. ZIP Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_zip_code"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_province"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_postal_code"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_country"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_country')?>">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Interpreter's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_daytime"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_daytime')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if
                                any)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_mobile_tel_num"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_mobile_tel_num')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_mailing_addr_email_addr"
                                    value="<?= showData('interpreters_contact_info_mailing_addr_email_addr')?>">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Interpreter's Certification</b> </h4>
                        </div>
                        <p>I certify, under penalty of perjury, that:</p>
                        <div class="form-group">
                            <p class="control-label col-md-5">I am fluent in English and</p>
                            <div class="col-md-5">
                                <input type="text" class="form-control"
                                    name="interpreters_contact_info_certification_lang"
                                    value="<?= showData('interpreters_contact_info_certification_lang')?>">
                            </div>
                        </div>
                        <p>which is the same language specified in <b>Part 5., Item Number
                                1.b.</b>, and I have read to this applicant in the identified language
                            every question and instruction on this application and his or her
                            answer to every question. The applicant informed me that he or
                            she understands every instruction, question, and answer on the
                            application, including the <b>Applicant's Declaration and
                                Certification</b>, and has verified the accuracy of every answer.</p>
                        <div class="bg-info">
                            <h4><b>Interpreter's Signature</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">7.a. Interpreter's Signature</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="interpreters_contact_info_signature"
                                    value="<?= showData('interpreters_contact_info_signature')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="interpreters_contact_info_date_of_sign"
                                    value="<?= showData('interpreters_contact_info_date_of_sign')?>">
                            </div>
                        </div>
                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 7. Contact Information, Declaration, and
                                    Signature of the Person Preparing this
                                    Application, if Other Than the Applicant</b> </h4>
                        </div>
                        <p>Provide the following information about the preparer.</p>
                        <div class="bg-info">
                            <h4><b>Preparer's Full Name</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contact_info_preparers_last_name"
                                    value="<?= showData('contact_info_preparers_last_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contact_info_preparers_first_name"
                                    value="<?= showData('contact_info_preparers_first_name')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if
                                any)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_business_and_organization_name"
                                    value="<?= showData('contact_info_preparers_business_and_organization_name')?>">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Preparer's Mailing Address</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_street_num"
                                    value="<?= showData('contact_info_preparers_mailing_addr_street_num')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b. </b> &nbsp;

                                <input type="radio" name="contact_info_preparers_mailing_addr_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="contact_info_preparers_mailing_addr_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="contact_info_preparers_mailing_addr_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_number"
                                    value="<?= showData('contact_info_preparers_mailing_addr_number')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. City or Town</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_city_or_town"
                                    value="<?= showData('contact_info_preparers_mailing_addr_city_or_town')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State</label>
                            <div class="col-md-7">
                                <select name="" class="form-control">
                                    <option value="0">N/A</option>
                                    <?php
                                foreach($allDataCountry as $record){
                                    echo "<option value='$record->state_code'>$record->state_code</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. ZIP Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_zip_code"
                                    value="<?= showData('contact_info_preparers_mailing_addr_zip_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_province"
                                    value="<?= showData('contact_info_preparers_mailing_addr_province')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_postal_code"
                                    value="<?= showData('contact_info_preparers_mailing_addr_postal_code')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="contact_info_preparers_mailing_addr_country"
                                    value="<?= showData('contact_info_preparers_mailing_addr_country')?>">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Preparer's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="preparers_contact_info_daytime"
                                    value="<?= showData('preparers_contact_info_daytime')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="preparers_contact_info_mobile_tel_num"
                                    value="<?= showData('preparers_contact_info_mobile_tel_num')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Preparer's Email Address (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="preparers_contact_info_email_addr"
                                    value="<?= showData('preparers_contact_info_email_addr')?>">
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 9 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 7. Contact Information, Declaration, and
                                    Signature of the Person Preparing this
                                    Application, if Other Than the Applicant
                                    (continued)</b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Preparer's Statement</b> </h4>
                        </div>
                        <div class="d-flexible">
                            <b>7.a.</b> <input type="checkbox" name="" id="">
                            <p>I am not an attorney or accredited representative but
                                have prepared this application on behalf of the
                                applicant and with the applicant's consent.</p>
                        </div>
                        <div class="d-flexible">
                            <b>7.b.</b> <input type="checkbox" name="" id="">
                            <p>I am an attorney or accredited representative and my
                                representation of the applicant in this case
                                <input type="checkbox" name="" id=""> extends <input type="checkbox" name="" id=""> does
                                not extend beyond the
                                preparation of this application.
                            </p>
                        </div>
                        <p><b>NOTE:</b> If you are an attorney or accredited
                            representative, you may need to submit a completed
                            Form G-28, Notice of Entry of Appearance as
                            Attorney or Accredited Representative, or Form
                            G-28I, Notice of Entry of Appearance as Attorney In
                            Matters Outside the Geographical Confines of the
                            United States, with this application.</p>
                        <div class="bg-info">
                            <h4><b>Preparer's Certification</b> </h4>
                        </div>
                        <p>By my signature, I certify, under penalty of perjury, that I
                            prepared this application at the request of the applicant. The
                            applicant then reviewed this completed application and
                            informed me that he or she understands all of the information
                            contained in, and submitted with, his or her application,
                            including the <b>Applicant's Declaration and Certification</b>, and
                            that all of this information is complete, true, and correct. I
                            completed this application based only on information that the
                            applicant provided to me or authorized me to obtain or use.</p>
                        <div class="bg-info">
                            <h4><b>Preparer's Signature</b> </h4>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-12">8.a. Preparer's Signature </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contact_information_preparers_signature"
                                    value="<?= showData('contact_information_preparers_signature')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="contact_information_preparers_date_of_sign"
                                    value="<?= showData('contact_information_preparers_date_of_sign')?>">
                            </div>
                        </div>
                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">

                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 10 end  -->
            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 8. Additional Information</b> </h4>
                        </div>
                        <p>If you need extra space to provide any additional information
                            within this application, use the space below. If you need more
                            space than what is provided, you may make copies of this page
                            to complete and file with this application or attach a separate
                            sheet of paper. Type or print your name and A-Number (if any)
                            at the top of each sheet; indicate the <b>Page Number, Part
                                Number</b>, and <b>Item Number</b> to which your answer refers; and
                            sign and date each sheet</p>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="additional_information_i_192_last_name"
                                    value="<?= showData('additional_information_i_192_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="additional_information_i_192_first_name"
                                    value="<?= showData('additional_information_i_192_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="additional_information_i_192_middle_name"
                                    value="<?= showData('additional_information_i_192_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. A-Number (if any) </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
                                        class="form-control" name="additional_information_i_192_a_numb"
                                        value="<?= showData('additional_information_i_192_a_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">3.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_first_page_numb"
                                        value="<?= showData('additional_information_i_192_first_page_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">3.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_first_part_numb"
                                        value="<?= showData('additional_information_i_192_first_part_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">3.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_first_item_numb"
                                        value="<?= showData('additional_information_i_192_first_item_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>3.d.</b></span>
                                <textarea name="additional_information_i_192_first_comment" class="form-control" id=""
                                    cols="30"
                                    rows="10"><?= showData('additional_information_i_192_first_comment')?></textarea>
                            </div>
                        </div>
                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">4.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_second_page_numb"
                                        value="<?= showData('additional_information_i_192_second_page_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_second_part_numb"
                                        value="<?= showData('additional_information_i_192_second_part_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_second_item_numb"
                                        value="<?= showData('additional_information_i_192_second_item_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>4.d.</b></span>
                                <textarea name="additional_information_i_192_second_comment" class="form-control" id=""
                                    cols="30"
                                    rows="10"><?= showData('additional_information_i_192_second_comment')?></textarea>
                            </div>
                        </div>



                    </div><!-- left side column end -->


                    <div class="col-md-6 col-md-offset-1">

                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">5.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_third_page_numb"
                                        value="<?= showData('additional_information_i_192_third_page_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_third_part_numb"
                                        value="<?= showData('additional_information_i_192_third_part_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_third_item_numb"
                                        value="<?= showData('additional_information_i_192_third_item_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>5.d.</b></span>
                                <textarea name="additional_information_i_192_third_comment" class="form-control" id=""
                                    cols="30"
                                    rows="10"><?= showData('additional_information_i_192_third_comment')?></textarea>
                            </div>
                        </div>

                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">6.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_fourth_page_numb"
                                        value="<?= showData('additional_information_i_192_fourth_page_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_fourth_part_numb"
                                        value="<?= showData('additional_information_i_192_fourth_part_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_fourth_item_numb"
                                        value="<?= showData('additional_information_i_192_fourth_item_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>6.d.</b></span>
                                <textarea name="additional_information_i_192_fourth_comment" class="form-control" id=""
                                    cols="30"
                                    rows="10"><?= showData('additional_information_i_192_fourth_comment')?></textarea>
                            </div>
                        </div>

                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">7.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_fifth_page_numb"
                                        value="<?= showData('additional_information_i_192_fifth_page_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_fifth_part_numb"
                                        value="<?= showData('additional_information_i_192_fifth_part_numb')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                        name="additional_information_i_192_fifth_item_numb"
                                        value="<?= showData('additional_information_i_192_fifth_item_numb')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>7.d.</b></span>
                                <textarea name="additional_information_i_192_fifth_comment" class="form-control" id=""
                                    cols="30"
                                    rows="10"><?= showData('additional_information_i_192_fifth_comment')?></textarea>
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <!-- <input type="button" name="data[password]" class="next btn btn-info" value="Next" 
                style="float: right;margin: 10px;" />-->
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 11 end  -->
        </form>
    </div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    var current = 1,
        current_step,
        next_step,
        steps;
    steps = $("fieldset").length;
    $(".next").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
});

$(document).on('submit', '#registration_form', function(event) {
    event.preventDefault();
    $.ajax({
        url: "fetch.php?formNo=9&<?php echo $getId?>",
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data) {
            alert(data);
        }
    });

});

function checkboxValue(input,output){
	inputValue = input.checked ? "Y" : "N";
	$('#'+output).val(inputValue);
}
</script>