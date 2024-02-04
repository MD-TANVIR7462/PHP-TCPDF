<?php

//? require_once("config.php");

// $stateData = indexByQueryAlldata("SELECT * FROM countries ORDER BY state_code ASC");

// $singleDataNote = ''; /* json_decode($singleData->note); */

function showData($name){
	global $singleDataNote;
	if(isset($singleDataNote->$name)) return $singleDataNote->$name;
	else return '';
}

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

    p {
        padding-left: 12px;
    }
    </style>
    <title>INTAKE FOR FORM I-918</title>
</head>

<body>
    <div class="container" style="padding: 20px;">
        <h1></h1>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <div CLASS="text-center">
            <h3>Intake Form I-918, Petition for U Nonimmigrant Status.</h3>
        </div>
        <form id="registration_form" class="form-horizontal" action="#" method="post">
            <!-- <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		         <input type="hidden" name="client_id" value="<?php echo $clientId?>" /> -->
            <fieldset>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <label class="control-label">
                                <input type="hidden" name="form_918_g28_is_attached" id="form_918_g28_is_attached"
                                    value="<?php echo (showData('form_918_g28_is_attached') == 'Y') ? 'Y' : 'N'; ?>" />

                                <input type="checkbox" onChange="checkboxValue(this,'form_918_g28_is_attached')"
                                    <?php echo (showData('form_918_g28_is_attached') == 'Y') ? 'checked' : ''; ?>>
                                Select this box if Form G-28 is attached.
                            </label>
                            <br>
                            <br>

                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Attorney State Bar Number(if applicable):</label>
                            <br>
                            <br>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="attorney_state_bar_number"
                                    value="<?php echo showData('attorney_state_bar_number')?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label col-md-10">Attorney or According Representative USCIS Online
                                Account Number (if any):</label>
                            <br>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="attorney_uscis_online_account_number"
                                    maxlength="12"
                                    value="<?php echo showData('attorney_uscis_online_account_number')?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 1. Information About You</b> (Person filing this petition as a victim)</h4>
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
                        <div>
                            <h5><b>Other Names Used </b> (Include maiden name, nicknames, and aliases, if applicable)
                            </h5>
                        </div>
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
                        <div class="bg-info">
                            <h4><b>Home Address</b></h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_street_number"
                                    value="<?php echo showData('information_about_you_home_street_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b.</b> &nbsp;
                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="apt"
                                    <?php echo (showData('information_about_you_home_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                                Apt.&nbsp;

                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="ste"
                                    <?php echo (showData('information_about_you_home_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;

                                <input type="radio" name="information_about_you_home_apt_ste_flr" value="flr"
                                    <?php echo (showData('information_about_you_home_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                                Flr.:&nbsp;

                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_home_number"
                                    value="<?php echo showData('information_about_you_home_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. City or Town :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_city_town"
                                    value="<?php echo showData('information_about_you_home_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_state"
                                    value="<?php echo showData('information_about_you_home_state')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. Zip Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_zip_code"
                                    value="<?php echo showData('information_about_you_home_zip_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_province"
                                    value="<?php echo showData('information_about_you_home_province')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_postal_code"
                                    value="<?php echo showData('information_about_you_home_postal_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.h. Country :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_country"
                                    value="<?php echo showData('information_about_you_home_country')?>" />
                            </div>
                        </div>
                    </div><!-- left side column -->

                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Safe Mailing Address</b> (if other than Home Address)</h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.a. In Care Of Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_care_of_name"
                                    value="<?php echo showData('information_about_you_safe_mailing_care_of_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.b. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_street_number"
                                    value="<?php echo showData('information_about_you_safe_mailing_street_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>4.c. </b> &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt"
                                    <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste"
                                    <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr"
                                    <?php echo (showData('information_about_you_safe_mailing_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_safe_mailing_number"
                                    value="<?php echo showData('information_about_you_safe_mailing_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.d. City or Town :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_city_town"
                                    value="<?php echo showData('information_about_you_safe_mailing_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.e. State :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_safe_mailing_state"
                                    value="<?php echo showData('information_about_you_safe_mailing_state')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.f. Zip Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_zip_code"
                                    value="<?php echo showData('information_about_you_safe_mailing_zip_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.g. Province :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_province"
                                    value="<?php echo showData('information_about_you_safe_mailing_province')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.h. Postal Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_postal_code"
                                    value="<?php echo showData('information_about_you_safe_mailing_postal_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.i. Country :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_country"
                                    value="<?php echo showData('information_about_you_safe_mailing_country')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Other Information</b></h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Alien Registration Number (A-Number) (if any) :
                                &#x2B9E; </label>
                            <div class="col-md-8 col-md-offset-4">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_alien_registration_number"
                                    value="<?php echo showData('other_information_about_you_alien_registration_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. U.S. Social Security Number (if any) : &#x2B9E;
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_social_security_number"
                                    value="<?php echo showData('other_information_about_you_social_security_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">7. USCIS Online Account Number (if any) : &#x2B9E;
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_uscis_online_account_number"
                                    value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">8. Marital Status: </label>
                            <div class="col-md-10">
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_marital_status" value="single"
                                        <?php echo (showData('other_information_about_you_marital_status') == 'single') ? 'checked' : ''; ?>>
                                    Single
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
                            </div>
                        </div>
                    </div><!-- right side column -->
                </div>

                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset><!-- field set 1 end  -->


            <fieldset>
                <!-- field set 2 start  -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 1. Information About You </b> (continued)</h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">9. Gender: </label>
                            <div class="col-md-4">
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_gender" value="male"
                                        <?php echo (showData('other_information_about_you_gender') == 'male') ? 'checked' : ''; ?>>
                                    Male
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="other_information_about_you_gender" value="female"
                                        <?php echo (showData('other_information_about_you_gender') == 'female') ? 'checked' : ''; ?>>
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">10. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" name="other_information_about_you_date_of_birth"
                                    value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11. Country of Birth:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_country_of_birth"
                                    value="<?php echo showData('other_information_about_you_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">12. Country of Citizenship or Nationality:</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_country_of_citizen"
                                    value="<?php echo showData('other_information_about_you_country_of_citizen')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">13. Form I-94 Arrival-Departure Record Number:
                                &#x2B9E; </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_arival_record_number"
                                    value="<?php echo showData('other_information_about_you_arival_record_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14. Passport Number : </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_passport_number"
                                    value="<?php echo showData('other_information_about_you_passport_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">15. Travel Document Number : </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_travel_document_number"
                                    value="<?php echo showData('other_information_about_you_travel_document_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">16. Country of Issuance for Passport or Travel
                                Document : </label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_country_issuance_passport"
                                    value="<?php echo showData('other_information_about_you_country_issuance_passport')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">17. Date of Issuance for Passport or Travel Document
                                (mm/dd/yyyy) : </label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_about_you_date_issuance_passport"
                                    value="<?php echo showData('other_information_about_you_date_issuance_passport')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">18. Expiration Date for Passport or Travel Document
                                (mm/dd/yyyy) : </label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_about_you_expiry_date_issuance_passport"
                                    value="<?php echo showData('other_information_about_you_expiry_date_issuance_passport')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">19.a. City or Town : </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_last_entry_city_town"
                                    value="<?php echo showData('other_information_about_you_last_entry_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">19.b. State : </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_last_entry_state"
                                    value="<?php echo showData('other_information_about_you_last_entry_state')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">20. Date of Last Entry into the United States
                                (mm/dd/yyyy): </label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_about_you_date_of_last_entry_us"
                                    value="<?php echo showData('other_information_about_you_date_of_last_entry_us')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">21. Date Authorized Stay Expired (mm/dd/yyyy):
                            </label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="other_information_about_you_date_authorized_stay_expired"
                                    value="<?php echo showData('other_information_about_you_date_authorized_stay_expired')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">22. Current Immigration Status: </label>
                            <div class="col-md-9 col-md-offset-3">
                                <input type="text" class="form-control"
                                    name="other_information_about_you_current_immigration_status"
                                    value="<?php echo showData('other_information_about_you_current_immigration_status')?>" />
                            </div>
                        </div>

                    </div>
                    <!--end column-->


                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 2. Additional Information About You</b></h4>
                        </div>
                        <div class="form-group">
                            <p>
                                Answering “Yes” to the following questions below requires
                                explanations and supporting documentation. Attach relevant
                                documents in support of your claims that you are a victim of
                                criminal activity listed in the Immigration and Nationality Act
                                (INA) section 101(a)(15)(U)(iii). You must also attach a personal
                                narrative statement describing the criminal activity of which you are
                                a victim. If you are only petitioning for U derivative status for
                                qualifying family members subsequent to your (the principal
                                petitioner) initial filing, you are not required to submit evidence
                                supporting the original petition with the new Form I-918.
                            </p>
                        </div>
                        <div class="form-group">
                            <p>
                                If you need extra space to complete <b>Part 2.</b> , use the space
                                provided in <b>Part 8. Additional Information.</b>
                                Select "Yes" or "No," as appropriate, for each of the following
                                questions.
                            </p>
                        </div>
                        <div class="form-group">
                            <p><b>1.</b> I am a victim of criminal activity listed in the INA at section
                                101(a)(15)(U)(iii). </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q1_victim_of_criminal_activity"
                                        <?php echo (showData('part_2_q1_victim_of_criminal_activity')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q1_victim_of_criminal_activity"
                                        <?php echo (showData('part_2_q1_victim_of_criminal_activity')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>2.</b> I have suffered substantial physical or mental abuse as a result of having been
                                a victim of this criminal activity </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q2_i_have_suffered_substantial"
                                        <?php echo (showData('part_2_q2_i_have_suffered_substantial')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q2_i_have_suffered_substantial"
                                        <?php echo (showData('part_2_q2_i_have_suffered_substantial')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>3.</b> I possess information concerning the criminal activity of which I was a victim
                            </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q3_Pocess_information_concerning"
                                        <?php echo (showData('part_2_q3_Pocess_information_concerning')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q3_Pocess_information_concerning"
                                        <?php echo (showData('part_2_q3_Pocess_information_concerning')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>4.</b> I am submitting Form I-918, Supplement B, U Nonimmigrant Status Certification,
                                from a certifying official </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q4_submitting_form_non_immigrant"
                                        <?php echo (showData('part_2_q4_submitting_form_non_immigrant')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q4_submitting_form_non_immigrant"
                                        <?php echo (showData('part_2_q4_submitting_form_non_immigrant')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>5.</b> The crime of which I am a victim occurred in the United States (including
                                Indian country and military installations) or violated the laws of the United States.
                            </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q5_the_crime_which_im_victime"
                                        <?php echo (showData('part_2_q5_the_crime_which_im_victime')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q5_the_crime_which_im_victime"
                                        <?php echo (showData('part_2_q5_the_crime_which_im_victime')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>6.</b> I am under 16 years of age.</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q6_im_under_16_years"
                                        <?php echo (showData('part_2_q6_im_under_16_years')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q6_im_under_16_years"
                                        <?php echo (showData('part_2_q6_im_under_16_years')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>7.a.</b> I was or am in immigration proceedings.</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_2_q7_immigration_proceding"
                                        <?php echo (showData('part_2_q7_immigration_proceding')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_2_q7_immigration_proceding"
                                        <?php echo (showData('part_2_q7_immigration_proceding')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>
                                If you answered "Yes," select the type of proceedings. If you
                                were in proceedings in the past and are no longer in proceedings,
                                provide the date of action. If you are currently in proceedings,
                                type or print “Current” in the appropriate date field. Select <b>all
                                    applicable</b> boxes.Use the space provided in <b>Part 8. Additional
                                    Information</b> to provide an explanation.
                            </p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7"> 7.b.

                                <input type="hidden" name="part_2_7b_removal_proceding" id="part_2_7b_removal_proceding"
                                    value="<?php echo (showData('part_2_7b_removal_proceding') == 'Y') ? 'Y' : 'N'; ?>" />

                                <input type="checkbox" onChange="checkboxValue(this,'part_2_7b_removal_proceding')"
                                    <?php echo (showData('part_2_7b_removal_proceding')=='Y')? 'checked':'' ?>
                                    value="Y">
                                Removal Proceedings Removal Date (mm/dd/yyyy)

                            </label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" name="part_2_7b_removal_proceding_date"
                                    value="<?php echo showData('part_2_7b_removal_proceding_date')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-7"> 7.c.

                                <input type="hidden" name="part_2_7c_exclusion_proceding"
                                    id="part_2_7c_exclusion_proceding"
                                    value="<?php echo (showData('part_2_7c_exclusion_proceding') == 'Y') ? 'Y' : 'N'; ?>" />

                                <input type="checkbox" onChange="checkboxValue(this,'part_2_7c_exclusion_proceding')"
                                    <?php echo (showData('part_2_7c_exclusion_proceding')=='Y')? 'checked':'' ?>
                                    value="Y">
                                Exclusion Proceedings Exclusion Date (mm/dd/yyyy)

                            </label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" name="part_2_7c_exclusion_proceding_date"
                                    value="<?php echo showData('part_2_7c_exclusion_proceding_date')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7"> 7.d.

                                <input type="hidden" name="part_2_7d_deportion_proceding"
                                    id="part_2_7d_deportion_proceding"
                                    value="<?php echo (showData('part_2_7d_deportion_proceding') == 'Y') ? 'Y' : 'N'; ?>" />

                                <input type="checkbox" onChange="checkboxValue(this,'part_2_7d_deportion_proceding')"
                                    <?php echo (showData('part_2_7d_deportion_proceding')=='Y')? 'checked':'' ?>
                                    value="Y"> Deportation Proceedings Deportation Date(mm/dd/yyyy)
                            </label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" name="part_2_7d_deportion_proceding_date"
                                    value="<?php echo showData('part_2_7d_deportion_proceding_date')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7"> 7.e.

                                <input type="hidden" name="part_2_7e_rescission_proceding"
                                    id="part_2_7e_rescission_proceding"
                                    value="<?php echo (showData('part_2_7e_rescission_proceding') == 'Y') ? 'Y' : 'N'; ?>" />

                                <input type="checkbox" onChange="checkboxValue(this,'part_2_7e_rescission_proceding')"
                                    <?php echo (showData('part_2_7e_rescission_proceding')=='Y')? 'checked':'' ?>
                                    value="Y"> Rescission Proceedings Rescission Date (mm/dd/yyyy)
                            </label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" name="part_2_7e_rescission_proceding_date"
                                    value="<?php echo showData('part_2_7e_rescission_proceding_date')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-7"> 7.f.

                                <input type="hidden" name="part_2_7f_judicial_proceding"
                                    id="part_2_7f_judicial_proceding"
                                    value="<?php echo (showData('part_2_7f_judicial_proceding') == 'Y') ? 'Y' : 'N'; ?>" />

                                <input type="checkbox" onChange="checkboxValue(this,'part_2_7f_judicial_proceding')"
                                    <?php echo (showData('part_2_7f_judicial_proceding')=='Y')? 'checked':'' ?>
                                    value="Y"> Judicial Proceedings Judicial Date (mm/dd/yyyy)
                            </label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" name="part_2_7f_judicial_proceding_date"
                                    value="<?php echo showData('part_2_7f_judicial_proceding_date')?>">
                            </div>
                        </div>

                    </div>
                    <!--end column-->
                </div>

                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 2. Additional Information About You </b> (continued)</h4>
                        </div>
                        <div class="form-group">
                            <p>
                                <b>
                                    Provide the date of entry, place of entry, and status under
                                    which you entered the United States for each entry during the
                                    five years preceding the filing of this petition.
                                </b>
                            </p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">8.a Date of Entry (mm/dd/yyyy)</label>
                            <div class="col-md-5">
                                <input type="date" class="form-control"
                                    name="additional_information_about_you_date_of_entry"
                                    value="<?php echo showData('additional_information_about_you_date_of_entry')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Place of Entry into the United States</p>

                            <label class="control-label col-md-5">8.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_place_of_entry_city_town"
                                    value="<?php echo showData('additional_information_about_you_place_of_entry_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">8.c. State </label>
                            <div class="col-md-5">
                                <select class="form-control"
                                    name="additional_information_about_you_place_of_entry_state">
                                    <option value=''>Select</option>
                                    <?php 
                                        if(showData('additional_information_about_you_place_of_entry_state')!='')
                                            echo"<option value='".showData('additional_information_about_you_place_of_entry_state')."' selected>".showData('additional_information_about_you_place_of_entry_state')."</option>";
                                        foreach($stateData as $record){
                                            
                                            echo"<option value='$record->state_code'>$record->state_code</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.d. Status at the Time of Entry (for example, F-1
                                student, B-2 tourist, entered without inspection)</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_status_of_entry"
                                    value="<?php echo showData('additional_information_about_you_status_of_entry')?>" />
                            </div>
                        </div>
                        <hr style="background: #095484; height: 1px;">

                        <div class="form-group">
                            <label class="control-label col-md-7">9.a Date of Entry (mm/dd/yyyy)</label>
                            <div class="col-md-5">
                                <input type="date" class="form-control"
                                    name="additional_information_about_you_date_of_entry2"
                                    value="<?php echo showData('additional_information_about_you_date_of_entry2')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Place of Entry into the United States</p>

                            <label class="control-label col-md-5">9.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_place_of_entry_city_town2"
                                    value="<?php echo showData('additional_information_about_you_place_of_entry_city_town2')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">9.c. State </label>
                            <div class="col-md-5">
                                <select class="form-control"
                                    name="additional_information_about_you_place_of_entry_state2">
                                    <option value=''>Select</option>
                                    <?php 
                                        if(showData('additional_information_about_you_place_of_entry_state2')!='')
                                            echo"<option value='".showData('additional_information_about_you_place_of_entry_state2')."' selected>".showData('additional_information_about_you_place_of_entry_state2')."</option>";
                                        foreach($stateData as $record){
                                            
                                            echo"<option value='$record->state_code'>$record->state_code</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">9.d. Status at the Time of Entry (for example, F-1
                                student, B-2 tourist, entered without inspection)</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_status_of_entry2"
                                    value="<?php echo showData('additional_information_about_you_status_of_entry2')?>" />
                            </div>
                        </div>
                        <hr style="background: #095484; height: 1px;">

                        <div class="form-group">
                            <label class="control-label col-md-7">10.a Date of Entry (mm/dd/yyyy)</label>
                            <div class="col-md-5">
                                <input type="date" class="form-control"
                                    name="additional_information_about_you_date_of_entry3"
                                    value="<?php echo showData('additional_information_about_you_date_of_entry3')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Place of Entry into the United States</p>

                            <label class="control-label col-md-5">10.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_place_of_entry_city_town3"
                                    value="<?php echo showData('additional_information_about_you_place_of_entry_city_town3')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10.c. State </label>
                            <div class="col-md-5">
                                <select class="form-control"
                                    name="additional_information_about_you_place_of_entry_state3">
                                    <option value=''>Select</option>
                                    <?php 
                                        if(showData('additional_information_about_you_place_of_entry_state3')!='')
                                            echo"<option value='".showData('additional_information_about_you_place_of_entry_state3')."' selected>".showData('additional_information_about_you_place_of_entry_state3')."</option>";
                                        foreach($stateData as $record){
                                            
                                            echo"<option value='$record->state_code'>$record->state_code</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">10.d. Status at the Time of Entry (for example, F-1
                                student, B-2 tourist, entered without inspection)</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_status_of_entry3"
                                    value="<?php echo showData('additional_information_about_you_status_of_entry3')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <p><b>If you are outside of the United States, provide the U.S.
                                    Consulate or inspection facility or a safe foreign mailing
                                    address you want notified if this petition is approved. </b></p>
                        </div>

                        <div class="form-group">
                            <p><b>11.a. </b>Type of Office (Select <b>only one </b>box):</p>
                            <div class="col-md-11 col-md-offset-1">
                                <label class="control-label">
                                    <input type="radio" name="additional_information_about_you_type_of_office"
                                        <?php echo (showData('additional_information_about_you_type_of_office')=='us_consulate')? 'checked':'' ?>
                                        value="us_consulate"> U.S Consulate
                                </label>
                                <label class="control-label">
                                    <input type="radio" name="additional_information_about_you_type_of_office"
                                        <?php echo (showData('additional_information_about_you_type_of_office')=='pre_flight_inspection')? 'checked':'' ?>
                                        value="pre_flight_inspection"> Pre-Flight Inspection
                                </label>
                                <label class="control-label">
                                    <input type="radio" name="additional_information_about_you_type_of_office"
                                        <?php echo (showData('additional_information_about_you_type_of_office')=='port_of_entry')? 'checked':'' ?>
                                        value="port_of_entry"> Port-of-Entry
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_place_of_notification_outside_us_city_town"
                                    value="<?php echo showData('additional_information_about_you_place_of_notification_outside_us_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.c. State </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_place_of_notification_outside_us_state"
                                    value="<?php echo showData('additional_information_about_you_place_of_notification_outside_us_state')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.d. Country </label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="additional_information_about_you_place_of_notification_outside_us_country"
                                    value="<?php echo showData('additional_information_about_you_place_of_notification_outside_us_country')?>" />
                            </div>
                        </div>

                    </div>
                    <!--end column-->
                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 2. Additional Information About You </b> (continued)</h4>
                        </div>
                        <div class="form-group">
                            <p>
                                <b>Safe Foreign Address Where You Want Notification Sent</b> (if
                                other than U.S. Consulate, Pre-Flight Inspection, or Port-of Entry)
                            </p>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">12.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_foreign_notification_street_number"
                                    value="<?php echo showData('information_about_you_safe_foreign_notification_street_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>12.b.</b> &nbsp;
                                <input type="radio" name="information_about_you_safe_foreign_notification_apt_ste_flr"
                                    value="apt"
                                    <?php echo (showData('information_about_you_safe_foreign_notification_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                                Apt.&nbsp;

                                <input type="radio" name="information_about_you_safe_foreign_notification_apt_ste_flr"
                                    value="ste"
                                    <?php echo (showData('information_about_you_safe_foreign_notification_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;

                                <input type="radio" name="information_about_you_safe_foreign_notification_apt_ste_flr"
                                    value="flr"
                                    <?php echo (showData('information_about_you_safe_foreign_notification_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                                Flr.:&nbsp;

                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_foreign_notification_ste_apt_flr_number"
                                    value="<?php echo showData('information_about_you_safe_foreign_notification_ste_apt_flr_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.c. City or Town :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_foreign_notification_city_town"
                                    value="<?php echo showData('information_about_you_safe_foreign_notification_city_town')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">12.d. Province :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_foreign_notification_province"
                                    value="<?php echo showData('information_about_you_safe_foreign_notification_province')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.e. Postal Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_foreign_notification_postal_code"
                                    value="<?php echo showData('information_about_you_safe_foreign_notification_postal_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12.f. Country :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_foreign_notification_country"
                                    value="<?php echo showData('information_about_you_safe_foreign_notification_country')?>" />
                            </div>
                        </div>

                        <div class="bg-info">
                            <h4><b>Part 3. Processing Information </b></h4>
                        </div>

                        <div class="form-group">
                            <p>
                                Answer the following questions about yourself. For the
                                purposes of this petition, you must answer "Yes" to the
                                following questions, if applicable, even if your records were
                                sealed or otherwise cleared or if anyone, including a judge, law
                                enforcement officer, or attorney, told you that you no longer
                                have a record
                            </p>

                            <p><b>NOTE:</b> : If you answer “Yes” to <b>ANY</b> question in <b>Part 3.</b>,
                                provide an explanation in the space provided in <b>Part 8.
                                    Additional Information.</b></p>
                            <p><b>NOTE:</b> : Answering "Yes" does not necessarily mean that
                                U.S. Citizenship and Immigration Services (USCIS) will deny
                                your Petition for U Nonimmigrant Status.</p>
                            <p>Have you <b>EVER:</b></p>
                        </div>

                        <div class="form-group">
                            <p><b>1.a.</b> Committed a crime or offense for which you have not been arrested?.</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1a_committed_a_crime_or_offense"
                                        <?php echo (showData('part_3_1a_committed_a_crime_or_offense')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1a_committed_a_crime_or_offense"
                                        <?php echo (showData('part_3_1a_committed_a_crime_or_offense')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>1.b.</b> Been arrested, cited, or detained by any law enforcement
                                officer (including Department of Homeland Security (DHS),
                                former Immigration and Naturalization Service (INS), and
                                military officers) for any reason?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1b_Been_arrested_or_detained"
                                        <?php echo (showData('part_3_1b_Been_arrested_or_detained')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1b_Been_arrested_or_detained"
                                        <?php echo (showData('part_3_1b_Been_arrested_or_detained')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>1.c.</b> Been charged with committing any crime or offense?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1c_Been_charged_any_crime_offense"
                                        <?php echo (showData('part_3_1c_Been_charged_any_crime_offense')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1c_Been_charged_any_crime_offense"
                                        <?php echo (showData('part_3_1c_Been_charged_any_crime_offense')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>1.d.</b> Been convicted of a crime or offense (even if the violation was subsequently
                                expunged or pardoned)?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1c_been_charged_any_crime_offense"
                                        <?php echo (showData('part_3_1c_Been_charged_any_crime_offense')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1c_been_charged_any_crime_offense"
                                        <?php echo (showData('part_3_1c_Been_charged_any_crime_offense')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>1.e.</b> Been placed in an alternative sentencing or a rehabilitative
                                program (for example, diversion, deferred prosecution,
                                withheld adjudication, deferred adjudication)?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1e_been_placed_alternative_sentencing"
                                        <?php echo (showData('part_3_1e_been_placed_alternative_sentencing')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1e_been_placed_alternative_sentencing"
                                        <?php echo (showData('part_3_1e_been_placed_alternative_sentencing')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>1.f.</b> Received a suspended sentence, been placed on probation, or been paroled?
                            </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1f_received_a_suspended_sentence"
                                        <?php echo (showData('part_3_1f_received_a_suspended_sentence')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1f_received_a_suspended_sentence"
                                        <?php echo (showData('part_3_1f_received_a_suspended_sentence')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>1.g.</b> Been in jail or prison?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1g_been_in_jail_or_prison"
                                        <?php echo (showData('part_3_1g_been_in_jail_or_prison')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1g_been_in_jail_or_prison"
                                        <?php echo (showData('part_3_1g_been_in_jail_or_prison')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <p><b>1.h.</b> Been the beneficiary of a pardon, amnesty, rehabilitation, or other act of
                                clemency or similar action? </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1h_been_the_beneficiary_of_a_pardon"
                                        <?php echo (showData('part_3_1h_been_the_beneficiary_of_a_pardon')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1h_been_the_beneficiary_of_a_pardon"
                                        <?php echo (showData('part_3_1h_been_the_beneficiary_of_a_pardon')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>


                    </div>
                    <!--end column-->
                </div>
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 3. Processing Information </b> (Continued)</h4>
                        </div>

                        <div class="form-group">
                            <p><b>1.i.</b> Exercised diplomatic immunity to avoid prosecution for a criminal offense in
                                the United States?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_1i_exercised_diplomatic_immunity"
                                        <?php echo (showData('part_3_1i_exercised_diplomatic_immunity')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_1i_exercised_diplomatic_immunity"
                                        <?php echo (showData('part_3_1i_exercised_diplomatic_immunity')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>Information About Arrests, Citations, Detentions, or Charges</b>
                                If you answered “Yes” to any of the above questions, respond to
                                the questions below to provide additional details. If you need
                                extra space, use the space provided in <b>Part 8. Additional
                                    Information.</b></p>
                        </div>

                        <div class="form-group">
                            <p><b>Information About Arrests, Citations, Detentions, or Charges</b>
                                If you answered “Yes” to any of the above questions, respond to
                                the questions below to provide additional details. If you need
                                extra space, use the space provided in <b>Part 8. Additional
                                    Information.</b></p>
                        </div>
                        <div class="form-group">
                            <p><b>2.a.</b> Why were you arrested, cited, detained, or charged?</p>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="processing_information_why_were_you_arested"
                                    value="<?php echo showData('processing_information_why_were_you_arested')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>2.b.</b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</p>
                            <div class="col-md-8 col-md-offset-4">
                                <input type="text" class="form-control"
                                    name="processing_information_date_of_arrest_citation_detension_or_charge"
                                    value="<?php echo showData('processing_information_date_of_arrest_citation_detension_or_charge')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p> Where were you arrested, cited, detained, or charged?</p>
                            <label class="control-label col-md-5">2.c. City or Town</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="processing_information__arrest_city_town"
                                    value="<?php echo showData('processing_information__arrest_city_town')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">2.d. State </label>
                            <div class="col-md-5">
                                <select class="form-control" name="processing_information__arrest_state">
                                    <option value=''>Select</option>
                                    <?php 
                                        if(showData('processing_information__arrest_state')!='')
                                            echo"<option value='".showData('processing_information__arrest_state')."' selected>".showData('processing_information__arrest_state')."</option>";
                                        foreach($stateData as $record){
                                            
                                            echo"<option value='$record->state_code'>$record->state_code</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.e. Country</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control" name="processing_information__arrest_country"
                                    value="<?php echo showData('processing_information__arrest_country')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.f. Outcome or disposition (for example, no charges
                                filed, charges dismissed, jail, probation)</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="processing_information__arrest_outcome_disposition"
                                    value="<?php echo showData('processing_information__arrest_outcome_disposition')?>" />
                            </div>
                        </div>
                        <hr style="background: #095484; height: 1px;">

                        <div class="form-group">
                            <p><b>3.a.</b> Why were you arrested, cited, detained, or charged?</p>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="processing_information_why_were_you_arested2"
                                    value="<?php echo showData('processing_information_why_were_you_arested2')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>3.b.</b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</p>
                            <div class="col-md-8 col-md-offset-4">
                                <input type="text" class="form-control"
                                    name="processing_information_date_of_arrest_citation_detension_or_charge2"
                                    value="<?php echo showData('processing_information_date_of_arrest_citation_detension_or_charge2')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <p> Where were you arrested, cited, detained, or charged?</p>
                            <label class="control-label col-md-5">3.c. City or Town</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="processing_information__arrest_city_town2"
                                    value="<?php echo showData('processing_information__arrest_city_town2')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State </label>
                            <div class="col-md-5">
                                <select class="form-control" name="processing_information__arrest_state2">
                                    <option value=''>Select</option>
                                    <?php 
                                        if(showData('processing_information__arrest_state2')!='')
                                            echo"<option value='".showData('processing_information__arrest_state2')."' selected>".showData('processing_information__arrest_state2')."</option>";
                                        foreach($stateData as $record){
                                            
                                            echo"<option value='$record->state_code'>$record->state_code</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. Country</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control" name="processing_information__arrest_country2"
                                    value="<?php echo showData('processing_information__arrest_country2')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.f. Outcome or disposition (for example, no charges
                                filed, charges dismissed, jail, probation)</label>
                            <div class="col-md-11 col-md-offset-1">
                                <input type="text" class="form-control"
                                    name="processing_information__arrest_outcome_disposition2"
                                    value="<?php echo showData('processing_information__arrest_outcome_disposition2')?>" />
                            </div>
                        </div>

                    </div>
                    <!--end column-->

                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 3. Processing Information </b> (Continued)</h4>
                        </div>
                        <div class="form-group">
                            <p>Have you <b>EVER:</b></p>
                        </div>

                        <div class="form-group">
                            <p><b>4.a.</b> Engaged in, or do you intend to engage in, prostitution or procurement of
                                prostitution?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_4a_engaged_in_or_intend"
                                        <?php echo (showData('part_3_4a_engaged_in_or_intend')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_4a_engaged_in_or_intend"
                                        <?php echo (showData('part_3_4a_engaged_in_or_intend')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>4.b.</b> Engaged in any unlawful commercialized vice, including, but not limited to,
                                illegal gambling?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_4b_illegal_gambling"
                                        <?php echo (showData('part_3_4b_illegal_gambling')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_4b_illegal_gambling"
                                        <?php echo (showData('part_3_4b_illegal_gambling')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>4.c.</b> Knowingly encouraged, induced, assisted, abetted, or aided any alien to try
                                to enter the United States illegally?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_4c_knowingly_encouraged"
                                        <?php echo (showData('part_3_4c_knowingly_encouraged')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_4c_knowingly_encouraged"
                                        <?php echo (showData('part_3_4c_knowingly_encouraged')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>4.d.</b> Illicitly trafficked in any controlled substance or knowingly assisted,
                                abetted, or colluded in the illicit trafficking of any controlled substance?</p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_4d_Illicitly_trafficked"
                                        <?php echo (showData('part_3_4d_Illicitly_trafficked')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_4d_Illicitly_trafficked"
                                        <?php echo (showData('part_3_4d_Illicitly_trafficked')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Have you <b>EVER</b> committed, planned or prepared, participated
                                in, threatened to, attempted to, conspired to commit, gathered
                                information for, or solicited funds for any of the following:</p>
                        </div>
                        <div class="form-group">
                            <p><b>5.a. </b> Hijacking or sabotage of any conveyance (including an aircraft, vessel, or
                                vehicle)? </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_5a_hijacking_or_sabotage"
                                        <?php echo (showData('part_3_5a_hijacking_or_sabotage')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_5a_hijacking_or_sabotage"
                                        <?php echo (showData('part_3_5a_hijacking_or_sabotage')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><b>5.b. </b>Seizing or detaining, and threatening to kill, injure, or
                                continue to detain, another individual in order to compel a
                                third person (including a governmental organization) to
                                do or abstain from doing any act as an explicit or implicit
                                condition for the release of the individual seized or
                                detained? </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_5b_seizing_or_detaining"
                                        <?php echo (showData('part_3_5b_seizing_or_detaining')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_5b_seizing_or_detaining"
                                        <?php echo (showData('part_3_5b_seizing_or_detaining')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <p><b>5.c. </b> Assassination? </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_5c_Assassination"
                                        <?php echo (showData('part_3_5c_Assassination')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_5c_Assassination"
                                        <?php echo (showData('part_3_5c_Assassination')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <p><b>5.d. </b> The use of any firearm with intent to endanger, directly or
                                indirectly, the safety of one or more individuals or to
                                cause substantial damage to property? </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_5d_firearm_with_intent_to_endanger"
                                        <?php echo (showData('part_3_5d_firearm_with_intent_to_endanger')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_5d_firearm_with_intent_to_endanger"
                                        <?php echo (showData('part_3_5d_firearm_with_intent_to_endanger')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <p><b>5.e. </b> The use of any biological agent, chemical agent, nuclear
                                weapon or device, explosive, or other weapon or
                                dangerous device, with intent to endanger, directly or
                                indirectly, the safety of one or more individuals or to
                                cause substantial damage to property? </p>
                            <div class="col-md-4 col-md-offset-8">
                                <label class="control-label">
                                    <input type="radio" name="part_3_5e_any_biological_agent"
                                        <?php echo (showData('part_3_5e_any_biological_agent')=='Y')? 'checked':'' ?>
                                        value="Y"> Yes
                                </label>
                                &nbsp; &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="part_3_5e_any_biological_agent"
                                        <?php echo (showData('part_3_5e_any_biological_agent')=='N')? 'checked':'' ?>
                                        value="N"> No
                                </label>
                            </div>
                        </div>

                    </div>
                    <!--end column-->
                </div>
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 4. Information About Your Spouse and/or Children</b></h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_family_last_name"
                                    value="<?php echo showData('information_about_spouse_children_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_given_first_name"
                                    value="<?php echo showData('information_about_spouse_children_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_middle_name"
                                    value="<?php echo showData('information_about_spouse_children_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control"
                                    name="information_about_spouse_children_date_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3. Country of Birth :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_country_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4. Relationship :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_relationship"
                                    value="<?php echo showData('information_about_spouse_children_relationship')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">5. Current location :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_current_location"
                                    value="<?php echo showData('information_about_spouse_children_current_location')?>" />
                            </div>
                        </div>
                        <hr style="background: #095484; height: 1px;">

                        <div class="form-group">
                            <label class="control-label col-md-5">6.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_2_family_last_name"
                                    value="<?php echo showData('information_about_spouse_children_2_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_2_given_first_name"
                                    value="<?php echo showData('information_about_spouse_children_2_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_2_middle_name"
                                    value="<?php echo showData('information_about_spouse_children_2_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">7. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control"
                                    name="information_about_spouse_children_2_date_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_2_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">8. Country of Birth :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_2_country_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_2_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">9. Relationship :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_2_relationship"
                                    value="<?php echo showData('information_about_spouse_children_2_relationship')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">10. Current location :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_2_current_location"
                                    value="<?php echo showData('information_about_spouse_children_2_current_location')?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">11.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_3_family_last_name"
                                    value="<?php echo showData('information_about_spouse_children_3_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_3_given_first_name"
                                    value="<?php echo showData('information_about_spouse_children_3_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_3_middle_name"
                                    value="<?php echo showData('information_about_spouse_children_3_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">12. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control"
                                    name="information_about_spouse_children_3_date_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_3_date_of_birth')?>" />
                            </div>
                        </div>

                    </div>
                    <!--end column-->

                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Part 4. Information About Your Spouse and/or Children</b>(continued)</h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">13. Country of Birth :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_3_country_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_3_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14. Relationship :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_3_relationship"
                                    value="<?php echo showData('information_about_spouse_children_3_relationship')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">15. Current location :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_3_current_location"
                                    value="<?php echo showData('information_about_spouse_children_3_current_location')?>" />
                            </div>
                        </div>

                        <hr style="background: #095484; height: 1px;">

                        <div class="form-group">
                            <label class="control-label col-md-5">16.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_4_family_last_name"
                                    value="<?php echo showData('information_about_spouse_children_4_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_4_given_first_name"
                                    value="<?php echo showData('information_about_spouse_children_4_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">16.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_4_middle_name"
                                    value="<?php echo showData('information_about_spouse_children_4_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">17. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control"
                                    name="information_about_spouse_children_4_date_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_4_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">18. Country of Birth :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_4_country_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_4_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">19. Relationship :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_4_relationship"
                                    value="<?php echo showData('information_about_spouse_children_4_relationship')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">20. Current location :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_4_current_location"
                                    value="<?php echo showData('information_about_spouse_children_4_current_location')?>" />
                            </div>
                        </div>

                        <hr style="background: #095484; height: 1px;">

                        <div class="form-group">
                            <label class="control-label col-md-5">21.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_5_family_last_name"
                                    value="<?php echo showData('information_about_spouse_children_5_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">21.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_5_given_first_name"
                                    value="<?php echo showData('information_about_spouse_children_5_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">21.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_5_middle_name"
                                    value="<?php echo showData('information_about_spouse_children_5_middle_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">22. Date of Birth (mm/dd/yyyy) :</label>
                            <div class="col-md-7">
                                <input type="date" class="form-control"
                                    name="information_about_spouse_children_5_date_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_5_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">23. Country of Birth :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_5_country_of_birth"
                                    value="<?php echo showData('information_about_spouse_children_5_country_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">24. Relationship :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_5_relationship"
                                    value="<?php echo showData('information_about_spouse_children_5_relationship')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">25. Current location :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="information_about_spouse_children_5_current_location"
                                    value="<?php echo showData('information_about_spouse_children_5_current_location')?>" />
                            </div>
                        </div>

                    </div>
                    <!--end column-->
                </div>
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>


            <fieldset>
                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 5. Petitioner's Statement, Contact Information, Declaration, and Signature </b>
                            </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b><i>Petitioner's Contact Information</i></b></h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">3. Petitioner's Daytime Telephone Number :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="petitioner_information_daytime_telephone_number"
                                    value="<?php echo showData('petitioner_information_daytime_telephone_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Petitioner's Mobile Telephone Number (if any)
                                :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control"
                                    name="petitioner_information_mobile_telephone_number"
                                    value="<?php echo showData('petitioner_information_mobile_telephone_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Petitioner's Email Address (if any) :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="petitioner_information_email_address"
                                    value="<?php echo showData('petitioner_information_email_address')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Part 6. Interpreter's Contact Information, Certification, and Signature</b></h4>
                        </div>
                        <div class="bg-info">
                            <h4><b><i>Interpreter's Full Name </i></b></h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="interpreter_family_last_name"
                                    value="<?php echo showData('interpreter_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.b. Interpreter's Given Name (First Name) :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="interpreter_family_given_first_name"
                                    value="<?php echo showData('interpreter_family_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. Interpreter's Business or Organization Name (if
                                any) :</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="interpreter_business_organaization_name"
                                    value="<?php echo showData('interpreter_business_organaization_name')?>" />
                            </div>
                        </div>

                        <div class="bg-info">
                            <h4><b><i>Interpreter's Mailing Address</i></b></h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreter_information_mailing_address_street_number"
                                    value="<?php echo showData('interpreter_information_mailing_address_street_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b.</b> &nbsp;
                                <input type="radio" name="interpreter_information_mailing_address_apt_ste_flr"
                                    value="apt"
                                    <?php echo (showData('interpreter_information_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                                Apt.&nbsp;

                                <input type="radio" name="interpreter_information_mailing_address_apt_ste_flr"
                                    value="ste"
                                    <?php echo (showData('interpreter_information_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;

                                <input type="radio" name="interpreter_information_mailing_address_apt_ste_flr"
                                    value="flr"
                                    <?php echo (showData('interpreter_information_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                                Flr.:&nbsp;
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_home_number"
                                    value="<?php echo showData('information_about_you_home_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. City or Town :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_city_town"
                                    value="<?php echo showData('information_about_you_home_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_state"
                                    value="<?php echo showData('information_about_you_home_state')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. Zip Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_zip_code"
                                    value="<?php echo showData('information_about_you_home_zip_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_province"
                                    value="<?php echo showData('information_about_you_home_province')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_postal_code"
                                    value="<?php echo showData('information_about_you_home_postal_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.h. Country :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_country"
                                    value="<?php echo showData('information_about_you_home_country')?>" />
                            </div>
                        </div>

                    </div>
                    <!--end column-->










                    <!---------------------------------------------------------------------------Tanvir work------------------------------------------------------------------------- -->
                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b><i>Interpreter's Contact Information</i></b></h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="e" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if
                                any)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b><i>Interpreter's Certification </i></b></h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">I certify, under penalty of perjury, that:
                                I am fluent in English and
                               </label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="e" value="<?php echo showData('')?>" />
                            </div>
                            <label class="control-label col-md-12"> which is the same language specified in Part 5., 1.b., and I have
                                read to this petitioner in the identified language every question
                                and instruction on this petition and his or her answer to every
                                question. The petitioner informed me that he or she understands
                                every instruction, question, and answer on the petition, including
                                the Petitioner's Declaration and Certification, and has verified
                               </label>
                        </div>



                        <div class="bg-info">
                            <h4><b><i>Preparer's Full Name</i></b></h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.a. Preparer's Family Name (Last Name)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if any)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>





                        <div class="bg-info">
                            <h4><b><i>Preparer's Mailing Address</i></b></h4>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="interpreter_information_mailing_address_street_number"
                                    value="<?php echo showData('interpreter_information_mailing_address_street_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b.</b> &nbsp;
                                <input type="radio" name="interpreter_information_mailing_address_apt_ste_flr"
                                    value="apt"
                                    <?php echo (showData('interpreter_information_mailing_address_apt_ste_flr') == 'apt') ? 'checked' : ''; ?>>
                                Apt.&nbsp;

                                <input type="radio" name="interpreter_information_mailing_address_apt_ste_flr"
                                    value="ste"
                                    <?php echo (showData('interpreter_information_mailing_address_apt_ste_flr') == 'ste') ? 'checked' : ''; ?>>
                                Ste. &nbsp;

                                <input type="radio" name="interpreter_information_mailing_address_apt_ste_flr"
                                    value="flr"
                                    <?php echo (showData('interpreter_information_mailing_address_apt_ste_flr') == 'flr') ? 'checked' : ''; ?>>
                                Flr.:&nbsp;
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="information_about_you_home_number"
                                    value="<?php echo showData('information_about_you_home_number')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. City or Town :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_city_town"
                                    value="<?php echo showData('information_about_you_home_city_town')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_state"
                                    value="<?php echo showData('information_about_you_home_state')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. Zip Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_zip_code"
                                    value="<?php echo showData('information_about_you_home_zip_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_province"
                                    value="<?php echo showData('information_about_you_home_province')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_postal_code"
                                    value="<?php echo showData('information_about_you_home_postal_code')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.h. Country :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_home_country"
                                    value="<?php echo showData('information_about_you_home_country')?>" />
                            </div>
                        </div>




                        <div class="bg-info">
                            <h4><b><i>Preparer's Contact Information</i></b></h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="e" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Preparer's Email Address (if any)</label>
                            <div class="col-md-10 col-md-offset-2">
                                <input type="email" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                    </div>
                    <!--end column-->
                </div>
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>




           
            <fieldset>
                <div class="row">
                <div class="page_number">
						<b><p style="padding-left:1000px;">Page 12 of 12</p></b>
					</div>
                    <div class="col-md-5">
                   
                        <div class="bg-info">
                            <h4><b>Part 8. Additional Information </b> </h4>
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
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. A-Number (if any) </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
                                        class="form-control"
                                        name="other_information_about_you_alien_registration_number" value="225984">
                                </div>
                            </div>
                        </div>
                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">3.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">3.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">3.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>3.d.</b></span>
                                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">4.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>4.d.</b></span>
                                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>



                    </div><!-- left side column end -->


                    <div class="col-md-5 col-md-offset-1">

                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">5.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>5.d.</b></span>
                                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">6.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>6.d.</b></span>
                                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="d-flexible">
                            <div class="form-group">
                                <label class="control-label col-md-12">7.a. Page Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.b. Part Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.c. Item Number </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span><b>7.d.</b></span>
                                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <!-- <input type="button" name="data[password]" class="next btn btn-info" value="Next" 
                style="float: right;margin: 10px;" />-->
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset> 
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

/* $(document).on('submit', '#registration_form', function(event){
    event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=7&<?php echo $getId?>",
		method:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{	
			alert(data);
		}
	}); 
	
}); */

function checkboxValue(input, output) {
    inputValue = input.checked ? "Y" : "N";
    $('#' + output).val(inputValue);
}
</script>