<?php
//$jsonData = json_decode($singleData->profile_description);
$getId = '';
$jsonData = json_decode(file_get_contents('http://demolms.siscotech.com/views/work_file/apiData.php'));

	 function showData($name) {
		global $jsonData;

		if (isset($jsonData->{$name})) {
			$value = $jsonData->{$name};

			if(date("Y-m-d", strtotime($value)) == date($value)) {
				return date("m/d/Y", strtotime($value));
			} else {
				return $value;
			}
		} else {
			return '';
		}
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

    /* .border-add{border:1px solid #000000;} */










    .font-2xl {
        font-size: 15px;
        font-weight: 400;

    }

    .font-3xl {
        font-size: 20px;
        font-weight: 400;
    }

    .font-4xl {
        font-size: 24px;
        font-weight: 400;
    }

    .font-5xl {
        font-size: 30px;
        font-weight: 400;
    }

    .font-6xl {
        font-size: 35px;
        font-weight: 400;
    }

    .heading-md {
        font-size: 18px;
        font-weight: 600;
        padding: 5px 5px;

    }

    .bg-colore {
        background-color: #e0ecf4;
    }

    .margin {
        margin-left: 10px;
    }

    .flex-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
        align-content: space-around;
    }

    .mt_15 {
        margin-top: 55px;
    }


    select.form-control option[disabled] {
        color: #888;
    }

    select.form-control option[selected] {
        font-weight: bold;
        background-color: #f0f0f0;
    }

    select.form-control option {
        color: #333;
    }
    </style>
    <title>INTAKE FOR FORM I-918A</title>
</head>

<body>
    <div class="container ">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <div class="text-center">
            <h2 class="text-center display-5 ">Intake Form I-918, Supplement A, Petition for Qualifying Family Member
                of U-1 Recipient </h2>
        </div>
        <form id="registration_form" class="form-horizontal" action="#" method="post">
            <!-- <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
            <input type="hidden" name="client_id" value="<?php echo $clientId?>" /> -->



            <!-- ---------------------------------------------------------------------------PAGE NUMBER 01------------------------------------------------------------------------------------------- -->


            <fieldset>


                <div class="form-group ">
                    <div class="page_number">
                        <b>
                            <p style="padding-left:1000px;">Page 1 of 12</p>
                        </b>
                    </div>
                    <div class="bg-info text-center">
                        <h4><b>To be completed by an attorney or accredited representative (if any).</b> </h4>

                    </div>
                    <div class="" style="padding:2%">
                        <div class="row">
                            <div class="col-lg-3 ">
                                <div class="d-flexible ">
                                    <input type="checkbox" name="g28_is_attached"
                                        value="<?php echo (showData('g28_is_attached') == 'Y') ? 'Y' : 'N'; ?>" id="">
                                    <p><b>Select this box if Form G-28 or Form G-28I is attached.</b></p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label class=""> <span class="font-weight-bold">Attorney State Bar Number</span> (if
                                    applicable):</label>
                                <br>
                                <input type="text" class="form-control" name="attorney_state_bar_number"
                                    value="<?php echo showData('attorney_state_bar_number')?>" />
                            </div>
                            <div class="col-lg-5">
                                <label class="control-label ">Attorney or According Representative USCIS Online
                                    Account Number (if any):</label>

                                <input type="text" class="form-control" maxlength="10"
                                    name="attorney_uscis_online_account_number"
                                    value="<?php echo showData('attorney_uscis_online_account_number')?>" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row  mt-3 border-add">
                    <div class="col-md-6 container border-add ">

                        <div>
                            <p><b><span class="fs-4"
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span>&nbsp;<span class="fs-6"> START HERE -
                                        Type or print in black
                                        ink.</span> </b></p>
                        </div>

                        <div class="bg-info">
                            <span class="heading-md">Part 1. Information About You (Person filing this
                                &nbsp;petition as a victim)
                            </span>

                        </div>
                        <p>
                            <span class="fs-6 fw-bold "> 1.</span> <span class="font-2xl">The family member that I am
                                filing for is my:</span>
                        </p>

                        <div class="margin">
                            <div class="form-check ">
                                <input type="radio" class="form-check-input " id="spouse" name="#" value="spouse">
                                <label class="form-check-label" for="spouse">Spouse</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="parent" name="#" value="parent">
                                <label class="form-check-label" for="parent">Parent</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="child" name="#" value="child">
                                <label class="form-check-label" for="child">Child</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="sibling" name="#" value="sibling">
                                <label class="form-check-label" for="sibling">Unmarried sibling under 18 years of
                                    age</label>
                            </div>
                        </div>


                        <div>
                            <div class="bg-info">
                                <h4><b>Part 2. Information About You</b> </h4>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_you_family_last_name"
                                        value="<?php echo showData('information_about_you_family_last_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">1.b. Given Name(First Name):</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_you_given_first_name"
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

                        </div>

                        <div>
                            <div class="bg-info ">
                                <h4><b>Other Information</b> </h4>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-md-5">2. Date of Birth (mm/dd/yyyy):</label>
                                <div class="col-md-7 ">
                                    <input type="date" class="form-control" name="other_information_about_you_date_of_birth"  value="<?php echo showData('other_information_about_you_date_of_birth')?>" />
                                </div>
                            </div> -->
                            <div class="form-group">
    <label class="control-label col-md-5">2. Date of Birth (mm/dd/yyyy):</label>
    <div class="col-md-7 ">
        <?php
            $dobValue = showData('other_information_about_you_date_of_birth');

            // Convert the date format if it's not empty
            if (!empty($dobValue)) {
                $formattedDate = date("Y-m-d", strtotime($dobValue));
                echo '<input type="date" class="form-control" name="other_information_about_you_date_of_birth" value="' . $formattedDate . '" />';
            } else {
                echo '<input type="date" class="form-control" name="other_information_about_you_date_of_birth" />';
            }
        ?>
    </div>
</div>


                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3. Alien Registration Number (A-Number) (if any) :
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><b>A-</b>
                                        <input type="text"
                                        class="form-control" name="other_information_about_you_alien_registration_number"  value="<?php echo showData('other_information_about_you_alien_registration_number')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. USCIS Online Account Number (if any) : </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="other_information_about_you_uscis_online_account_number" value="<?php echo showData('other_information_about_you_uscis_online_account_number')?>" >
                                </div>
                            </div> 
                        </div>



                        <div class="form-group">
                            <label class="col-md-12 ">5. Status of your Form I-918 </label>
                            <div class="col-md-12 " style='margin-left:10px; margin-top:0px;'>
                                <label class="control-label">
                                    <input type="radio" name="#" value="pending" > Pending
                                </label>
                                &nbsp;
                                <label class="control-label">
                                    <input type="radio" name="#" value="approved"> Approved
                                </label>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6 mt-5 ">
                        <div class="bg-info">
                            <h4><b>Part 3. Information About Your Qualifying
                                    Family Member</b> (Derivative)</h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_your_qualifying_family_member_family_last_name"
                                    value="<?php echo showData('information_about_your_qualifying_family_member_family_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"
                                    name="information_about_you_other_given_first_name"
                                    value="<?php echo showData('information_about_you_other_given_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">1.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="information_about_you_other_middle_name"
                                    value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.a. Family Name(Last Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.b. Given Name(First Name):</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2.c. Middle Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>


                        <div class="bg-info">
                            <span class="heading-md "><i> Residence or Intended Residence in the United &nbsp;States</i>


                            </span>

                        </div>

                        <div>
                            <div class="form-group">
                                <label class="control-label col-md-5">11.a. Street Number and Name:</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-6"><b>11.b. </b> &nbsp;

                                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr"
                                        value="apt">
                                    Apt. &nbsp;

                                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr"
                                        value="ste" checked=""> Ste. &nbsp;

                                    <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr"
                                        value="flr">
                                    Flr.:
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"
                                        name="information_about_you_safe_mailing_number" value="Street">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">11.c. City or Town </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_you_safe_mailing_city_town" value="<?= showData('')?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">11.d. State </label>
                                <div class="col-md-7">
                                    <select class="form-control ">
                                        <option disabled selected>Select State</option>
                                        <option value="AA">AA</option>
                                        <option value="AA">AE</option>
                                        <option value="AA">AK</option>
                                        <option value="AA">AL</option>
                                        <option value="AA">AP</option>
                                        <option value="AA">AR</option>
                                        <option value="AA">AS</option>
                                        <option value="AA">AZ</option>
                                        <option value="AA">CA</option>
                                        <option value="AA">AA</option>
                                        <option value="AA">AA</option>
                                        <option value="AA">AA</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5">11.e. ZIP Code </label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>






                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>

            <!-- ---------------------------------------------------------------------------PAGE NUMBER 02------------------------------------------------------------------------------------------- -->

            <fieldset>
                <div class="page_number">
                    <b>
                        <p style="padding-left:1000px;">Page 2 of 12</p>
                    </b>
                </div>
                <div class="row mt-5 gap-4">


                    <div class="col-md-6">
                        <div class="bg-info">
                            <span class="heading-md">Part 3. Information About Your Qualifying Family
                                Member &nbsp;(The Derivative) (continued)

                            </span>

                        </div>
                        <div class="bg-info">
                            <h4><b>Mailing Address</b> (if other than Residence)</h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">11.a. In Care Of Name (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_care_of_name"
                                    value="<?= showData('information_about_you_safe_mailing_care_of_name')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">11.b. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
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
                                    value="Street">
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
                                <select class="form-control ">
                                    <option disabled selected>Select State</option>

                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">11.g. ZIP Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
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
                        <div class="bg-info">
                            <span class="heading-md"><i>Other Information About Qualifying Family
                                    &nbsp;Member</i>

                            </span>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3. A-Number (if any)
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><b>A-</b><input type="text"
                                        class="form-control" name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Alien Registration Number (A-Number) (if any) :
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. USCIS Online Account Number (if any) : </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">2. Date of Birth (mm/dd/yyyy)</label>
                            <div class="col-md-7 ">
                                <input type="date" class="form-control" name="#" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">11.j. Country of Birth </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_country"
                                    value="<?= showData('information_about_you_safe_mailing_country')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">11.j. Country of Citizenship or Nationality </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="information_about_you_safe_mailing_country"
                                    value="<?= showData('information_about_you_safe_mailing_country')?>">
                            </div>
                        </div>
                        <div class="control-label  "><b>11. Marital Status </b> &nbsp;

                            <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="single">
                            Single &nbsp;

                            <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="married"
                                checked=""> Married &nbsp;

                            <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="divorced">
                            Divorced &nbsp;
                            <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="widowed">
                            Wodowed
                        </div>


                        <div class="control-label  "><b>11. Gender </b> &nbsp;

                            <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="single">
                            Male &nbsp;

                            <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="married"
                                checked=""> Female &nbsp;
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">13. Form I-94 Arrival-Departure Record Number
                            </label>
                            <div class="col-md-8 col-md-offset-4">
                                <div class="d-flexible">
                                    <span
                                        style="left: calc(var(--scale-factor)*36.00px); top: calc(var(--scale-factor)*531.66px); font-size: calc(var(--scale-factor)*10.00px); font-family: serif; gap:1rem;"
                                        role="presentation" dir="ltr">►</span><input type="text" class="form-control"
                                        name="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">14. Passport Number </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">15. Travel Document Number </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-12">16. Country of Issuance for Passport or Travel
                                Document</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">






                        <div class="form-group">
                            <label class="control-label col-md-12">17. Date of Issuance for Passport or Travel Document
                                (mm/dd/yyyy)
                            </label>
                            <div class="ms-10">
                                <div class="ms-auto col-md-7">
                                    <input type="text" class="form-control" name="" value="<?= showData('')?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">18. Expiration Date for Passport or Travel Document
                                (mm/dd/yyyy)
                            </label>
                            <div class="ms-10">
                                <div class="ms-auto col-md-7">
                                    <input type="text" class="form-control" name="" value="<?= showData('')?>">
                                </div>
                            </div>
                        </div>


                        <div class="bg-info">
                            <span class="heading-md">Part 4. Additional Information About Your
                                Qualifying Family &nbsp;Member


                            </span>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">1.a. Date of Last Entry into the United States
                                (mm/dd/yyyy)
                            </label>
                            <div class="ms-10">
                                <div class="ms-auto col-md-7">
                                    <input type="text" class="form-control" name="" value="<?= showData('')?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">1.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-5">1.c. State </label>
                            <div class="col-md-7">
                                <select class="form-control ">
                                    <option disabled selected>Select State</option>


                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">1.d. Current Immigration Status
                            </label>
                            <div class="">
                                <div class="ms-auto col-md-7">
                                    <input type="text" class="form-control" name="" value="<?= showData('')?>">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-12">2.a. Date of Last Entry into the United States
                                (mm/dd/yyyy)
                            </label>
                            <div class="ms-10">
                                <div class="ms-auto col-md-7">
                                    <input type="text" class="form-control" name="" value="<?= showData('')?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">2.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-5">2.c. State </label>
                            <div class="col-md-7">
                                <select class="form-control ">
                                    <option disabled selected>Select State</option>


                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">2.d. Date Authorized Stay Expired (mm/dd/yyyy)
                            </label>
                            <div class="">
                                <div class="ms-auto col-md-7">
                                    <input type="text" class="form-control" name="" value="<?= showData('')?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.e. Status at the Time of Entry (for example, F-1
                                student,
                                B-2 tourist, entered without inspection)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />
            </fieldset>
            <!-- ---------------------------------------------------------------------------PAGE NUMBER 03------------------------------------------------------------------------------------------- -->


            <fieldset>
                <div class="page_number">
                    <b>
                        <p style="padding-left:1000px;">Page 3 of 12</p>
                    </b>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-info">
                            <h4><b>Part 4. Additional Information About Your
                                    Qualifying Family Member (continued)</b> </h4>
                        </div>
                        <h6><b>If your family member is outside the United States, provide
                                the U.S. Consulate or inspection facility or a safe foreign
                                mailing address you want notified if this supplement is
                                approved.</b>
                        </h6>


                        <h5><b>3.a. Type of Office (Select only one box):</b></h5>

                        <div class="col-md-4">

                            <input type="radio" name="d" value="hispanic or latino">
                            U.S. Consulate &nbsp;
                        </div>
                        <div class="col-md-6">

                            <input type="radio" name="d" value="not hispanic or latino">
                            Pre-Flight Inspection
                        </div>
                        <div class="col-md-12">

                            <input type="radio" name="d" value="not hispanic or latino">
                            Port-of-Entry
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-5">3.b. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">3.c. State </label>
                            <div class="col-md-7">
                                <select class="form-control ">
                                    <option disabled selected>Select State</option>


                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="<?= showData('')?>">
                            </div>
                        </div>








                        <h6><b>Safe Foreign Address Where You Want Notification Sent
                                (if other than U.S. Consulate, Pre-Flight Inspection,or
                                Port-of-Entry) </b>
                        </h6>









                        <div class="form-group">
                            <label class="control-label col-md-5">4.b. Street Number and Name:</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>4.b. </b> &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="apt">
                                Apt. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="ste"
                                    checked=""> Ste. &nbsp;

                                <input type="radio" name="information_about_you_safe_mailing_apt_ste_flr" value="flr">
                                Flr.:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="" value="">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.c. City or Town </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-5">4.d. Province </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">4.e. Postal Code </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4.f. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>

                        <hr>
                        <h6><b>If your family member was previously married, list the
                                names of your family member's prior spouses and the dates
                                his or her marriages were terminated. You must attach
                                documents such as divorce decrees or death certificates</b>
                        </h6>


                        <div class="form-group">
                            <label class="control-label col-md-5">5.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">5.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">5.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">5.d. Date Marriage Ended (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_your_mother_date_of_birth"
                                    value="<?php echo showData('information_about_your_mother_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5.e. Where did the marriage end?</label>
                            <div class="col-md-7 col-md-offset-5">


                                <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5.f. How did the marriage end?</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                    </div>




















                    <section class="col-md-6 ">
                        <div class="form-group">
                            <label class="control-label col-md-5">6.a. Family Name(Last Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.b. Given Name(First Name) :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">6.c. Middle Name :</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">6.d. Date Marriage Ended (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="information_about_your_mother_date_of_birth"
                                    value="<?php echo showData('information_about_your_mother_date_of_birth')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.e. Where did the marriage end?</label>
                            <div class="col-md-7 col-md-offset-5">


                                <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.f. How did the marriage end?</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="text" class="form-control" name="" value="<?php echo showData('')?>" />
                            </div>
                        </div>


                        <div class="bg-info">
                            <h4><b> Other Information </b> </h4>
                        </div>


                        <div>

                            <h5><b>7.a. Your family member was or is in immigration
                                    proceedings. </b></h5>

                            <div class="col-md-3">

                                <input type="radio" name="d" value="hispanic or latino">
                                Yes &nbsp;
                            </div>
                            <div class="col-md-3">

                                <input type="radio" name="d" value="not hispanic or latino">
                                No
                            </div>


                        </div>
                        <h6 class='col-md-12'>If you answered "Yes," select the type of proceedings. If your
                            family member was in proceedings in the past and is no longer
                            in proceedings, provide the date of action. If your family
                            member is currently in proceedings, type or print “Current” in
                            the appropriate date field. Select <b>all applicable</b> boxes. Use the
                            space provided in <b>Part 11. Additional Information</b> to provide
                            an explanation.
                        </h6>

                        <div class="col-md-12">

                            <h5><b>8.a. Your family member would like an Employment
                                    Authorization Document. </b></h5>

                            <div class="col-md-3">

                                <input type="radio" name="d" value="hispanic or latino">
                                Yes &nbsp;
                            </div>
                            <div class="col-md-3">

                                <input type="radio" name="d" value="not hispanic or latino">
                                No
                            </div>


                        </div>
                        <h6 class='col-md-12'><b>NOTE:</b> If you answered "Yes," submit Form I-765,
                            Application for Employment Authorization Document,
                            separately. If your family member is living outside the United
                            States, he or she is <b>not</b> eligible to receive employment
                            authorization until he or she is lawfully admitted to the United
                            States. Do not file Form I-765 for a family member living
                            outside the United States.
                        </h6>

                    </section>






                </div>



                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />



            </fieldset>
            <!-- ---------------------------------------------------------------------------PAGE NUMBER 04------------------------------------------------------------------------------------------- -->


            <fieldset>
                <div class="page_number">
                    <b>
                        <p style="padding-left:1000px;">Page 4 of 12</p>
                    </b>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-info">
                            <h4><b>Part 5. Processing Information</b> </h4>
                        </div>

                        <h5>Answer the following questions about the family member for
                            whom you are filing this supplement. For the purposes of this
                            supplement, you must answer “Yes” to the following questions,
                            if applicable, even if your family member's records were sealed
                            or otherwise cleared or if anyone, including a judge, law
                            enforcement officer, or attorney, told your family member that
                            he or she no longer has a record</b>
                        </h5>
                        <h5><b>NOTE:</b> If you answer “Yes” to <b>ANY</b> question in <b>Part 5</b>.,
                            provide an explanation in the space provided in <b>Part 11.
                                Additional Information.</b>
                        </h5>
                        <h5><b>NOTE:</b> : Answering “Yes” does not necessarily mean that U.S.
                            Citizenship and Immigration Services (USCIS) will deny your
                            Supplement A, Petition for Qualifying Family Member of U-1
                            Recipient
                            <br>
                            <br>

                            Has your family member <b>EVER:</b>
                        </h5>



                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.a. Committed a crime or offense for which he or
                                    she
                                    has not
                                    been arrested?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.b. Been arrested, cited, or detained by any law
                                    enforcement
                                    officer (including Department of Homeland Security
                                    (DHS), former Immigration and Nationalization Service
                                    (INS), and military officers) for any reason?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.c. Been charged with committing any crime or
                                    offense? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.d. Been convicted of a crime or offense (even
                                    if the violation
                                    was subsequently expunged or pardoned)?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.e. Been placed in an alternative sentencing or
                                    a rehabilitative
                                    program (for example, diversion, deferred prosecution,
                                    withheld adjudication, deferred adjudication)?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.e. Been placed in an alternative sentencing or
                                    a rehabilitative
                                    program (for example, diversion, deferred prosecution,
                                    withheld adjudication, deferred adjudication)?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.f. Received a suspended sentence, been placed
                                    on probation,
                                    or been paroled? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.g. Been held in jail or prison?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.h. Been the beneficiary of a pardon, amnesty,
                                    rehabilitation,
                                    or other act of clemency or similar action?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">1.h. Exercised diplomatic immunity to avoid
                                    prosecution for a
                                    criminal offense in the United States?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                    </div>




                    <section class="col-md-6">

                        <p><b>Information About Arrests, Citations, Detentions, or Charges
                            </b></p>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.a. Why was your family member arrested, cited,
                                detained, or
                                charged?</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">2.b. Date of arrest, citation, detention, or charge
                                (mm/dd/yyyy)</label>
                            <div class="col-md-7 ">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <p><b>Where was your family member arrested, cited, detained, or
                                charged?
                            </b></p>

                        <div class="form-group">
                            <label class="control-label col-md-4">2.c. City or Town</label>
                            <div class="col-md-8 ">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">2.d. State </label>
                            <div class="col-md-8">
                                <select class="form-control ">
                                    <option disabled selected>Select State</option>

                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.e. Country</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.f. Outcome or disposition (for example, no charges
                                filed,
                                charges dismissed, jail, probation)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <hr>




                        <div class="form-group">
                            <label class="control-label col-md-12">3.a. Why was your family member arrested, cited,
                                detained, or
                                charged?</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">3.b. Date of arrest, citation, detention, or charge
                                (mm/dd/yyyy)</label>
                            <div class="col-md-7 ">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <p><b>Where was your family member arrested, cited, detained, or
                                charged?
                            </b></p>

                        <div class="form-group">
                            <label class="control-label col-md-4">3.c. City or Town</label>
                            <div class="col-md-8 ">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">3.d. State </label>
                            <div class="col-md-8">
                                <select class="form-control ">
                                    <option disabled selected>Select State</option>

                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>
                                    <option value="AA">AA</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.e. Country</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.f. Outcome or disposition (for example, no charges
                                filed,
                                charges dismissed, jail, probation)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>




                    </section>

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset>
            <!-- ---------------------------------------------------------------------------PAGE NUMBER 05------------------------------------------------------------------------------------------- -->

            <fieldset>
                <div class="page_number">
                    <b>
                        <p style="padding-left:1000px;">Page 5 of 12</p>
                    </b>
                </div>
                <div class="row">

                    <section class="col-md-6">
                        <div class="bg-info">
                            <h4><b>Part 5. Processing Information</b> (continued) </h4>
                        </div>


                        <h5>
                            Has your family member <b>EVER:</b>
                        </h5>



                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.a. Engaged in, or does he or she intend to
                                    engage in,
                                    prostitution or procurement of prostitution?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.b. Engaged in any unlawful commercialized vice,
                                    including,
                                    but not limited to, illegal gambling?
                                    Y</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.c. Knowingly encouraged, induced, assisted,
                                    abetted, or
                                    aided any alien to try to enter the United States illegally? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">4.d. Illicitly trafficked in any controlled
                                    substance or knowingly
                                    assisted, abetted, or colluded in the illicit trafficking of any
                                    controlled substance?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <h5>Has your family member <b>EVER</b> committed, planned or
                            prepared, participated in, threatened to, attempted to, conspired
                            to commit, gathered information for, or solicited funds for any
                            of the following:
                        </h5>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.a. Hijacking or sabotage of any conveyance
                                    (including an
                                    aircraft, vessel, or vehicle)?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.b. Seizing or detaining, and threatening to
                                    kill, injure, or
                                    continue to detain, another individual in order to compel a
                                    third person (including a governmental organization) to
                                    do or abstain from doing any act as an explicit or implicit
                                    condition for the release of the individual seized or
                                    detained?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.c. Assassination?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.d. The use of any firearm with intent to
                                    endanger, directly or
                                    indirectly, the safety of one or more individuals or to
                                    cause substantial damage to property?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.e. The use of any biological agent, chemical
                                    agent, nuclear
                                    weapon or device, explosive, or other weapon or
                                    dangerous device, with intent to endanger, directly or
                                    indirectly, the safety of one or more individuals or to
                                    cause substantial damage to property? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                    </section>



                    <section class="col-md-6">


                        <h5>
                            Has your family member <b>EVER</b> been a member of, solicited
                            money or members for, provided support for, attended military
                            training (as defined in section 2339D(c)(1) of Title 18, United
                            States Code) by or on behalf of, or been associated with any
                            other group of two or more individuals, whether organized or
                            not, which has been designated as, or has engaged in or has a
                            subgroup which has been designated as, or has engaged in:</b>
                        </h5>



                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.a. A terrorist organization under section 219
                                    of the
                                    Immigration and Nationality Act (INA)?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.b. Hijacking or sabotage of any conveyance
                                    (including an
                                    aircraft, vessel, or vehicle)?
                                    Y</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.c. Seizing or detaining, and threatening to
                                    kill, injure, or
                                    continue to detain, another individual in order to compel a
                                    third person (including a governmental organization) to
                                    do or abstain from doing any act as an explicit or implicit
                                    condition for the release of the individual seized or
                                    detained?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.d. Assassination?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.e. The use of any firearm with intent to
                                    endanger, directly or
                                    indirectly, the safety of one or more individuals or to cause
                                    substantial damage to property? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">6.f. The use of any biological agent, chemical
                                    agent, nuclear
                                    weapon or device, explosive, or other weapon or dangerous
                                    device, with intent to endanger, directly or indirectly, the
                                    safety of one or more individuals or to cause substantial
                                    damage to property?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">
                                    6.g. Soliciting money or members or otherwise
                                    providing
                                    material support to a terrorist organization?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <br>
                        <p><b>Does your family member intend to engage in the United States
                                in: </b></p>
                        <br>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.a. Espionag</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.b. Any unlawful activity, or any activity the
                                    purpose of
                                    which is in opposition to, or the control, or overthrow of
                                    the Government of the United States? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">7.c. Solely, principally, or incidentally in any
                                    activity related
                                    to espionage or sabotage or to violate any law involving
                                    the export of goods, technology, or sensitive information?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">8. Has your family member EVER been or does he
                                    or she
                                    continue to be a member of the Communist or other
                                    totalitarian party, except when membership was
                                    involuntary? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                    </section>


                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset>
            <!-- ---------------------------------------------------------------------------PAGE NUMBER 06------------------------------------------------------------------------------------------- -->

            <fieldset>
                <div class="page_number">
                    <b>
                        <p style="padding-left:1000px;">Page 6 of 12</p>
                    </b>
                </div>
                <div class="row">

                    <section class="col-md-6">
                        <div class="bg-info">
                            <h4><b>Part 5. Processing Information</b> (continued) </h4>
                        </div>





                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">9. &nbsp;&nbsp;Has your family member EVER,
                                    during the period
                                    of
                                    March 23, 1933 to May 8, 1945, in association with
                                    either the Nazi Government of Germany or any
                                    organization or government associated or allied with the
                                    Nazi Government of Germany, ordered, incited, assisted
                                    or otherwise participated in the persecution of any person
                                    because of race, religion, nationality, membership in a
                                    particular social group or political opinion?</label>

                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <h5>Has your family member <b>EVER</b> ordered, incited, called for,
                            committed, assisted, helped with, or otherwise participated in any
                            of the following: </h5>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-8">10.a. &nbsp;&nbsp;Acts involving torture or
                                    genocide?
                                </label>
                                <div class="col-md-3 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">10.b. &nbsp;&nbsp;Killing any person? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">10.c. &nbsp;&nbsp;Intentionally and severely
                                    injuring any
                                    person?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">10.d. &nbsp;&nbsp;Engaging in any kind of sexual
                                    conduct or
                                    relations with
                                    any person who was being forced or threatened?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">10.e. &nbsp;&nbsp;Limiting or denying any
                                    person's ability to
                                    exercise
                                    religious beliefs?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">10.f. &nbsp;&nbsp;The persecution of any person
                                    because of
                                    race, religion,
                                    national origin, membership in a particular social group,
                                    or political opinion?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">10.g. &nbsp;&nbsp;Displacing or moving any person
                                    from their
                                    residence by
                                    force, threat of force, compulsion, or duress?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <br>
                        <p><b>NOTE:</b> If you answered "Yes" to any question in <b>Item
                                Numbers 10.a</b>. - <b>10.g.</b>, please describe the circumstances in the
                            spaces provided in <b>Part 11. Additional Information.</b>
                        </p>
                        <br>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.a. &nbsp;&nbsp;Has your family member EVER
                                    advocated that
                                    another
                                    person commit any of the acts described in Item
                                    Numbers 10.a. - 10.g., urged, or encouraged another
                                    person, to commit such acts?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <p>Has your family member <b>EVER</b> been present or nearby when
                            any person was: </p><br>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.b. &nbsp;&nbsp;Intentionally killed, tortured,
                                    beaten, or
                                    injured?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.c. &nbsp;&nbsp;Displaced or moved from his or
                                    her residence
                                    by force,
                                    compulsion, or duress?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">5.d. &nbsp;&nbsp;In any way compelled or forced
                                    to engage in
                                    any kind of
                                    sexual contact or relations?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                    </section>



                    <section class="col-md-6">


                        <h5>
                            Has your family member <b>EVER</b>
                        </h5>



                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">13.a. &nbsp;&nbsp;Served in, been a member of,
                                    assisted in,
                                    or
                                    participated
                                    in any military unit, paramilitary unit, police unit, selfdefense unit, vigilante
                                    unit, rebel group, guerilla group,
                                    militia, or other insurgent organization?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">13.b. &nbsp;&nbsp;Served in any prison, jail,
                                    prison camp,
                                    detention facility,
                                    labor camp, or any other situation that involved detaining
                                    persons?
                                    Y</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">13.c. &nbsp;&nbsp;Served in, been a member of,
                                    assisted in,
                                    or
                                    participated
                                    in any group, unit, or organization of any kind in which
                                    you or other persons transported, possessed, or used any
                                    type of weapon? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <p>
                            <b>NOTE:</b> If you answered "Yes" to any question in <b>Item
                                Numbers 13.a. - 13.c.</b>, please describe the circumstances in
                            <b>Part 11. Additional Information.</b>
                            <br><br>
                            Has your family member <b>EVER</b>
                        </p>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">14.a. &nbsp;&nbsp;Received any type of military,
                                    paramilitary, or weapons
                                    training?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">14.b. &nbsp;&nbsp;Been a member of, assisted in,
                                    or
                                    participated in any
                                    group, unit, or organization of any kind in which you or
                                    other persons used any type of weapon against any person
                                    or threatened to do so? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">14.c. &nbsp;&nbsp;Assisted or participated in
                                    selling or
                                    providing weapons to
                                    any person who to your knowledge used them against
                                    another person, or in transporting weapons to any person
                                    who to your knowledge used them against another
                                    person?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <p>
                            <b>NOTE:</b> If you answered "Yes" to any question in <b>Item
                                Numbers 14.a. - 14.c.</b>, please describe the circumstances in
                            <b>Part 11. Additional Information.</b>
                            <br><br>
                            Has your family member <b>EVER</b>
                        </p>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">
                                    15.a. &nbsp;&nbsp;Recruited, enlisted, conscripted, or used any person under 15
                                    years of age to serve in or help an armed force or group? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12"> 15.b. &nbsp;&nbsp; Used any person under 15
                                    years of age to
                                    take part in
                                    hostilities, or to help or provide services to people in
                                    combat?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">16. &nbsp;&nbsp;Is your family member NOW in
                                    removal,
                                    exclusion,
                                    rescission, or deportation proceedings? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">17. &nbsp;&nbsp;Has your family member EVER had
                                    removal,
                                    exclusion,
                                    rescission, or deportation proceedings initiated against
                                    him or her?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                    </section>


                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset>
            <!-- ---------------------------------------------------------------------------PAGE NUMBER 07------------------------------------------------------------------------------------------- -->

            <fieldset>
                <div class="page_number">
                    <b>
                        <p style="padding-left:1000px;">Page 7 of 12</p>
                    </b>
                </div>
                <div class="row">
                    <section class="col-md-6">
                        <div class="bg-info">
                            <h4><b>Part 5. Processing Information</b> (continued) </h4>
                        </div>





                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">18. &nbsp;&nbsp;Has your family member EVER been
                                    removed, excluded,
                                    or deported from the United States?</label>

                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">19. &nbsp;&nbsp;Has your family member EVER been
                                    ordered to be
                                    removed, excluded, or deported from the United States?
                                </label>
                                <div class="col-md-3 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">20. &nbsp;&nbsp;Has your family member EVER been
                                    denied a visa or
                                    denied admission to the United States? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">21. &nbsp;&nbsp;Has your family member EVER been
                                    granted voluntary
                                    departure by an immigration officer or an immigration
                                    judge and failed to depart within the allotted time?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">22. &nbsp;&nbsp;Is your family member NOW under a
                                    final order or civil
                                    penalty for violating section 274C of the INA (producing
                                    and/or using false documentation to unlawfully satisfy a
                                    requirement of the INA)?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">23. &nbsp;&nbsp;Has your family member EVER, by
                                    fraud or willful
                                    misrepresentation of a material fact, sought to procure or
                                    procured a visa or other documentation, for entry into the
                                    United States or any immigration benefit?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">24. &nbsp;&nbsp;Has your family member EVER left
                                    the United States to
                                    avoid being drafted into the U.S. Armed Forces or U.S.
                                    Coast Guard?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">25. &nbsp;&nbsp;Has your family member EVER been
                                    a J nonimmigrant
                                    exchange visitor who was subject to the 2-year foreign
                                    residence requirement and not yet complied with that
                                    requirement or obtained a waiver of such? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">26. &nbsp;&nbsp;Has your family member EVER
                                    detained, retained, or
                                    withheld the custody of a child, having a lawful claim to
                                    United States citizenship, outside the United States from a
                                    United States citizen granted custody?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">27. &nbsp;&nbsp;Does your family member plan to
                                    practice polygamy in the
                                    United States? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">28. &nbsp;&nbsp;Has your family member EVER
                                    entered the United States
                                    as a stowaway? </label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">29.a. &nbsp;&nbsp;Does your family member NOW
                                    have a communicable
                                    disease of public health significance?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">29.b. &nbsp;&nbsp;Does your family member NOW
                                    have or has your family
                                    member EVER had a physical or mental disorder and
                                    behavior (or a history of behavior that is likely to recur)
                                    associated with the disorder which has posed or may pose
                                    a threat to the property, safety, or welfare of yourself or
                                    others?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                    </section>


                    <section class="col-md-6 ">
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-12">29.c. &nbsp;&nbsp;Is your family member NOW or
                                    has your family member
                                    EVER been a drug abuser or drug addict?</label>
                                <div class="col-md-7 col-md-offset-8">
                                    <input type="radio" name="" value="yes">
                                    Yes &nbsp;

                                    <input type="radio" name="" value="no"> No

                                </div>
                            </div>
                        </article>

                        <div class="bg-info">
                            <h4><b>Part 6. Information About Your Qualifying
                                    Family Member's Spouse and/or Children</b> </h4>
                        </div>
                        <p> Provide the following information about your family member's
                            spouse and/or children. If you need extra space to complete this
                            section, use the space provided in <b>Part 11. Additional Information.</b>
                        </p>
                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-5">1.a. Family Name(Last Name) :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_spouse_children_family_last_name"
                                        value="<?php echo showData('information_about_spouse_children_family_last_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">1.b. Given Name(First Name) :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_spouse_children_given_first_name"
                                        value="<?php echo showData('information_about_spouse_children_given_first_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">1.c. Middle Name :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">2. Date of Birth (mm/dd/yyyy) </label>
                                <div class="col-md-7 col-md-offset-5">
                                    <input type="date" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">3. Country of Birth </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">4. Relationship </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <hr>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-5">5.a. Family Name(Last Name) :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_spouse_children_family_last_name"
                                        value="<?php echo showData('information_about_spouse_children_family_last_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">5.b. Given Name(First Name) :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_spouse_children_given_first_name"
                                        value="<?php echo showData('information_about_spouse_children_given_first_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">5.c. Middle Name :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">6. Date of Birth (mm/dd/yyyy) </label>
                                <div class="col-md-7 col-md-offset-5">
                                    <input type="date" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">7. Country of Birth </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">8. Relationship </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <hr>
                        </article>


                        <article>
                            <div class="form-group">
                                <label class="control-label col-md-5">9.a. Family Name(Last Name) :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_spouse_children_family_last_name"
                                        value="<?php echo showData('information_about_spouse_children_family_last_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">9.b. Given Name(First Name) :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"
                                        name="information_about_spouse_children_given_first_name"
                                        value="<?php echo showData('information_about_spouse_children_given_first_name')?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">9.c. Middle Name :</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">10. Date of Birth (mm/dd/yyyy) </label>
                                <div class="col-md-7 col-md-offset-5">
                                    <input type="date" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">11. Country of Birth </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">12. Relationship </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                            </div>
                        </article>




                    </section>

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset>
            <!-- ---------------------------------------------------------------------------PAGE NUMBER 08------------------------------------------------------------------------------------------- -->

            <fieldset>
                <div class="row">
                    <div class="page_number">
                        <b>
                            <p style="padding-left:1000px;">Page 8 of 12</p>
                        </b>
                    </div>
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 7. Petitioner's Statement, Contact Information, Declaration, and Signature </b>
                            </h4>
                        </div>
                        <p><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-198
                            Instructions before completing this section.</p>

                        <div class="bg-info">
                            <h4><b>Petitioner's Statement</b> </h4>
                        </div>
                        <p><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
                            applicable, select the box for <b>Item Number 2.</b></p>
                        <div class="d-flexible">
                            <b>1.a.</b> <input type="checkbox" name="" id="">
                            <p>I can read and understand English, and I have read
                                and understand every question and instruction on
                                this supplement and my answer to every question.</p>
                        </div>
                        <div class="d-flexible">
                            <b>1.b.</b> <input type="checkbox" name="" id="">
                            <p>The interpreter named in <b>Part 9.</b> read to me every
                                question and instruction on this application and my
                                answer to every question in</p>
                        </div>
                        <input type="text" class="form-control"
                            name="petitioners_statement_contact_information_declaration_and_signature_1_b"
                            value="<?php echo showData('petitioners_statement_contact_information_declaration_and_signature_1_b')?>" />
                        <p>a language in which I am fluent, and I understood
                            everything.</p>
                        <div class="d-flexible">
                            <b>2.</b> <input type="checkbox" name="" id="">
                            <p>At my request, the preparer named in <b>Part 10.</b></p>
                        </div>
                        <input type="text" class="form-control"
                            name="petitioners_statement_contact_information_declaration_and_signature_2"
                            value="<?php echo showData('petitioners_statement_contact_information_declaration_and_signature_2')?>" />
                        <p>prepared this application for me based only upon
                            information I provided or authorized.</p>


                        <div class="bg-info">
                            <h4><b>Petitioner's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3. Petitioner's Daytime Telephone Number </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_3"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_3')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Petitioner's Mobile Telephone Number (if any)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_4"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_4')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Petitioner's Email Address (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_4"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_4')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Petitioner's Declaration and Certification</b> </h4>
                        </div>
                        <p>Copies of any documents I have submitted are exact photocopies
                            of unaltered, original documents, and I understand that USCIS
                            may require that I submit original documents to USCIS at a later
                            date. Furthermore, I authorize the release of any information
                            from any of my records that USCIS may need to determine my
                            eligibility for the immigration benefit I seek.
                        </p>
                        <p>I further authorize release of information contained in this
                            supplement, in supporting documents, and in my USCIS records
                            to other entities and persons where necessary for the
                            administration and enforcement of U.S. immigration laws.</p>
                    </div><!-- left side column end -->


                    <div class="col-md-5 col-md-offset-1">
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
                            <h4><b>Petitioner's Signature</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.a. Petitioner's Signature (sign in ink) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_signature_6_a"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_signature_6_a')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_signature_6_b"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_signature_6_b')?>" />
                            </div>
                        </div>
                        <p><b>NOTE TO ALL PETITIONERS:</b> If you do not completely fill
                            out this application or fail to submit required documents listed
                            in the Instructions, USCIS may deny your application.</p>
                        <div class="bg-info">
                            <h4><b>Part 8. Qualifying Family Member's Statement, Contact Information, Declaration, and
                                    Signature </b> </h4>
                        </div>
                        <h5><b>NOTE: Read the Penalties section of the Form I-918 Instructions before completing this
                                part.</b></h5>
                        <div class="bg-info">
                            <h4><b>Qualifying Family Member's Statement </b> </h4>
                        </div>
                        <h5><b>NOTE: Select the box for either Item Number 1.a. or 1.b. If applicable, select the box
                                for Item Number 2.</b></h5>

                        <div class="form-group">
                            <label class="control-label col-md-12">1.a.
                                <input type="hidden" name="reason_applying_replacement_of_lost"
                                    id="reason_applying_replacement_of_lost"
                                    value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />


                                <input type="checkbox"
                                    onChange="checkboxValue(this,'reason_applying_replacement_of_lost')"
                                    <?php echo (showData('reason_applying_replacement_of_lost') == 'Y') ? 'checked' : ''; ?>>
                                I can read and understand English, and I have read
                                and understand every question and instruction on
                                this petition and my answer to every question.
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12">1.b.
                                <input type="hidden" name="reason_applying_replacement_of_lost"
                                    id="reason_applying_replacement_of_lost"
                                    value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />


                                <input type="checkbox"
                                    onChange="checkboxValue(this,'reason_applying_replacement_of_lost')"
                                    <?php echo (showData('reason_applying_replacement_of_lost') == 'Y') ? 'checked' : ''; ?>>
                                The interpreter named in Part 9. read to me every
                                question and instruction on this supplement and my
                                answer to every question in </label>

                            <input type="text" class="form-control"
                                name="qualifying_family_member_statement_contact_information_declaration_1_b"
                                value="<?php echo showData('qualifying_family_member_statement_contact_information_declaration_1_b')?>" />
                            <p>a language in which I am fluent, and I understood
                                everything.</p>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-12">2.
                                <input type="hidden" name="reason_applying_replacement_of_lost"
                                    id="reason_applying_replacement_of_lost"
                                    value="<?php echo (showData('reason_applying_renewal_of_permission') == 'Y') ? 'Y' : 'N'; ?>" />


                                <input type="checkbox"
                                    onChange="checkboxValue(this,'reason_applying_replacement_of_lost')"
                                    <?php echo (showData('reason_applying_replacement_of_lost') == 'Y') ? 'checked' : ''; ?>>
                                At my request, the preparer named in Part 10.,</label>

                            <input type="text" class="form-control"
                                name="qualifying_family_member_statement_contact_information_declaration_1_b"
                                value="<?php echo showData('qualifying_family_member_statement_contact_information_declaration_1_b')?>" />
                            <p>prepared this supplement for me based only upon information I provided or authorized.
                            </p>
                        </div>




                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 8 end  -->

            <!-- -------------------------------------------------------------------------------PAGE NUMBER 09-------------------------------------------------------- -->

            <fieldset>
                <div class="row">
                    <div class="page_number">
                        <b>
                            <p style="padding-left:1000px;">Page 9 of 12</p>
                        </b>
                    </div>
                    <div class="col-md-5">

                        <div class="bg-info">
                            <h4><b>Part 8. Qualifying Family Member's Statement,
                                    Contact Information, Declaration, and Signature
                                    (Continued) </b> </h4>
                        </div>



                        <div class="bg-info">
                            <h4><b>Qualifying Family Member's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3. Qualifying Family Member's Daytime Telephone
                                Number </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="qualifying_family_member_statement_contact_information_declaration_contact_information_3"
                                    value="<?php echo showData('qualifying_family_member_statement_contact_information_declaration_contact_information_3')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Qualifying Family Member's Mobile Telephone Number
                                (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="qualifying_family_member_statement_contact_information_declaration_contact_information_4"
                                    value="<?php echo showData('qualifying_family_member_statement_contact_information_declaration_contact_information_4')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Preparer's Email Address (if any) (if any)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="qualifying_family_member_statement_contact_information_declaration_contact_information_5"
                                    value="<?php echo showData('qualifying_family_member_statement_contact_information_declaration_contact_information_5')?>" />
                            </div>
                        </div>

                        <div class="bg-info">
                            <h4><b>Qualifying Family Member's Declaration and Certification </b> </h4>
                        </div>

                        <h5><b>Copies of any documents I have submitted are exact
                                photocopies of unaltered, original documents, and I understand
                                that USCIS may require that I submit original documents to
                                USCIS at a later date. Furthermore, I authorize the release of
                                any information from any of my records that USCIS may need
                                to determine my eligibility for the immigration benefit I seek</b></h5>

                        <h5><b>I further authorize release of information contained in this
                                supplement, in supporting documents, and in my USCIS
                                records to other entities and persons where necessary for the
                                administration and enforcement of U.S. immigration laws. Any
                                disclosure shall be in accordance with 8 U.S.C. section 1367
                                and 8 CFR 214.14(e).
                            </b></h5>

                        <h5><b>I understand that USCIS may require me to appear for an
                                appointment to take my biometrics (fingerprints, photograph,
                                and/or signature) and, at that time, if I am required to provide
                                biometrics, I will be required to sign an oath reaffirming that: </b></h5>

                        <h5><b>1) I provided or authorized all of the information
                                contained in, and submitted with, my supplement;
                                2) I reviewed and understood all of the information in,
                                and submitted with, my supplement; and
                                3) All of this information was complete, true, and
                                correct at the time of filing.
                            </b></h5>

                        <h5><b>I certify, under penalty of perjury, that all of the information in
                                my supplement and any document submitted with it were
                                provided or authorized by me, that I reviewed and understand
                                all of the information contained in, and submitted with, my
                                supplement, and that all of this information is complete, true,
                                and correct.
                            </b></h5>



                    </div><!-- left side column end -->


                    <div class="col-md-5 col-md-offset-1">

                        <div class="bg-info">
                            <h4><b>Qualifying Family Member's Signature</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.a. Qualifying Family Member's Signature (sign in
                                ink) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_signature_6_a"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_signature_6_a')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control"
                                    name="petitioners_statement_contact_information_contact_information_signature_6_b"
                                    value="<?php echo showData('petitioners_statement_contact_information_contact_information_signature_6_b')?>" />
                            </div>
                        </div>
                        <p><b>NOTE TO ALL QUALIFYING FAMILY MEMBERS:</b> If you do not completely fill
                            out this application or fail to submit required documents listed
                            in the Instructions, USCIS may deny your application.</p>

                        <div class="bg-info">
                            <h4><b>Part 9. Interpreter's Contact Information,
                                    Certification, and Signature </b> </h4>
                        </div>
                        <h5><b>Provide the following information about the interpreter</b></h5>
                        <div class="bg-info">
                            <h4><b>Interpreter's Full Name</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.a. Interpreter's Family Name (Last Name) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="part_9_interpreter_contact_information_certification_signature_last_name"
                                    value="<?php echo showData('part_9_interpreter_contact_information_certification_signature_last_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.b. Interpreter's Family Name (First Name) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="part_9_interpreter_contact_information_certification_signature_first_name"
                                    value="<?php echo showData('part_9_interpreter_contact_information_certification_signature_first_name')?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2.Interpreter's Business or Organization Name (if
                                any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    name="part_9_interpreter_contact_information_certification_signature_organization_name"
                                    value="<?php echo showData('part_9_interpreter_contact_information_certification_signature_organization_name')?>" />
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Interpreter's Mailing Address</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b. </b> &nbsp;

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
                            <label class="control-label col-md-5">3.c. City or Town</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="" class="form-control"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. ZIP Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Interpreter's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Interpreter's Daytime Telephone Number</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Interpreter's Mobile Telephone Number (if
                                any)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Interpreter's Email Address (if any)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
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

            <!-- --------------------------------------------------------------PAGE 10-------------------------------------------------------------------------------- -->

            <fieldset>
                <div class="row">
                    <div class="page_number">
                        <b>
                            <p style="padding-left:1000px;">Page 10 of 12</p>
                        </b>
                    </div>
                    <div class="col-md-5">

                        <div class="bg-info">
                            <h4><b>Part 9. Interpreter's Contact Information,
                                    Certification, and Signature(continued) </b> </h4>
                        </div>
                        <div class="bg-info">
                            <h4><b>Interpreter's Certification</b> </h4>
                        </div>
                        <p>I certify, under penalty of perjury, that:</p>
                        <div class="form-group">
                            <p class="control-label col-md-5">I am fluent in English and</p>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <h5><b>which is the same language specified in Part 5., Item Number 1.b., and I have read to
                                this applicant in the identified language every question and instruction on this
                                application and his or her answer to every question. The applicant informed me that he
                                or she understands every instruction, question, and answer on the application, including
                                the Applicant's Declaration and Certification, and has verified the accuracy of every
                                answer.</b></h5>
                        <div class="bg-info">
                            <h4><b>Interpreter's Signature</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">7.a. Interpreter's Signature</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">7.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="" value="">
                            </div>
                        </div>
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
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">1.b. Preparer's Given Name (First Name)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">2. Preparer's Business or Organization Name (if
                                any)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>

                    </div><!-- left side column end -->


                    <div class="col-md-5 col-md-offset-1">
                        <div class="bg-info">
                            <h4><b>Preparer's Mailing Address</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.a. Street Number and Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-6"><b>3.b. </b> &nbsp;

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
                            <label class="control-label col-md-5">3.c. City or Town</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.d. State </label>
                            <div class="col-md-7">
                                <select name="" id="" class="form-control">
                                    <option value="" class="form-control"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.e. ZIP Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.f. Province</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">3.g. Postal Code</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">3.h. Country </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="bg-info">
                            <h4><b>Preparer's Contact Information</b> </h4>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">4. Preparer's Daytime Telephone Number </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">5. Preparer's Mobile Telephone Number (if any)
                            </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">6. Preparer's Email Address (if any) </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
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
                                preparation of this supplement.
                            </p>
                        </div>
                        <p><b>NOTE:</b> If you are an attorney or accredited
                            representative, you may need to submit a completed
                            Form G-28, Notice of Entry of Appearance as
                            Attorney or Accredited Representative, or Form
                            G-28, Notice of Entry of Appearance as Attorney In
                            Matters Outside the Geographical Confines of the
                            United States, with this supplement.</p>


                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset><!-- field set 10 end  -->

            <!------------------------------------------------------------------------- PAGE NUMBER 11 ------------------------------------------------------------->
            <fieldset>
                <div class="row">
                    <div class="page_number">
                        <b>
                            <p style="padding-left:1000px;">Page 11 of 12</p>
                        </b>
                    </div>
                    <div class="col-md-5">
                        <div class="bg-info">
                            <h4><b>Part 10. Contact Information, Declaration, and
                                    Signature of the Person Preparing this
                                    Application, if Other Than the Applicant
                                    (continued)</b> </h4>
                        </div>
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
                        <p>By my signature, I certify, under penalty of perjury, that I
                            prepared this application at the request of the applicant. The
                            applicant then reviewed this completed application and
                            informed me that he or she understands all of the information
                            contained in, and submitted with, his or her application,
                            including the <b>Applicant's Declaration and Certification</b>, and
                            that all of this information is complete, true, and correct. I
                            completed this application based only on information that the
                            applicant provided to me or authorized me to obtain or use.</p>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.a. Preparer's Signature </label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12">8.b. Date of Signature (mm/dd/yyyy)</label>
                            <div class="col-md-7 col-md-offset-5">
                                <input type="date" class="form-control" name="" value="">
                            </div>
                        </div>





                    </div><!-- left side column end -->


                    <div class="col-md-5 col-md-offset-1">


                    </div><!-- right side column end -->

                </div>


                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next"
                    style="float: right;margin: 10px;" />
                <!-- <input type="button" name="data[password]" class="next btn btn-info" value="Next" 
                style="float: right;margin: 10px;" />-->
                <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save"
                    id="submit_data" />

            </fieldset>


            <!-- -----------------------------------------------------------------PAGE NUMBER 12------------------------------------------------------------------------ -->

            <fieldset>
                <div class="row">
                    <div class="page_number">
                        <b>
                            <p style="padding-left:1000px;">Page 12 of 12</p>
                        </b>
                    </div>
                    <div class="col-md-5">

                        <div class="bg-info">
                            <h4><b>Part 11. Additional Information</b> </h4>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
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
</script>