<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$full_name= $change_name = $application_type = $social_number = $date_of_birth = $height = $eyes = $hair = $residence_date =  $weight = $does_it_apply = $travel = $how_often = $travel_total_time = $date_left = $date_returned = $countries_travel = $total_day_travel = $marital_status = $howmany_married = $current_spouse_name = $current_spouse_place_birth = $current_spouse_direction = $current_spouse_nationality = $current_spouse_when_married = $current_spouse_mariage_time = $current_spouse_company_name = $previous_spouse_name = $previous_spouse_date_of_birth =  $previous_spouse_place_of_birth = $previous_spouse_direction = $previous_spouse_nationality = $previous_spouse_when_married = $when_marriage_over = $spouse_previous_spouse_date_of_birth = $spouse_previous_spouse_place_birth = $spouse_previous_spouse_direction = $spouse_previous_spouse_nationlity = $spouse_previous_spouse_when_married = $spouse_previous_spouse_mariage_end = $how_many_childreen = $childreen_name =  $childreen_date_of_birth =  $childreen_place_of_birth = $childreen_address = $Child_biological = $was_arested = $howmany_arrested =  $first_arrest_date = $second_arrest_date =  $third_arrest_date = $fourth_arrest_date = $fifth_arrest_date = $what_age_came_us = $even_illegal = $date_entered_us = $date_write_on_i485 = $selective_service = $company_name = $company_phone = $company_dates = $spouse_street = $spouse_city =  $spouse_State = $spouse_zip =  $spouse_dates = $own_taxes =  $have_you_arrest = $travel_outside_country = $child_support =  $have_you_lied_immigration = $have_been_deported = $have_you_problem_alcohol = $enlisted_armed_forches = $are_your_parent_uscitizen = $if_yes_how_oldyou_then = $did_you_live_citizen_parent =  $how_old_when_became_resident =  $apply_with_fee_waiver =  $client_apply_with_n_648 = $was_applicant_arested = $if_answer_yes_did_they = $greencard_through_mariage = $received_military_training = $applicant_ever_file_waiver = $any_occurence = $agreement = ''; 







$message = '';

if(isset($_GET['id'])){
	$id = $_GET['id'];	
	$singleData = $objQuery->indexByQuerySingleData("SELECT *,DATE_ADD(created_at, INTERVAL +1 DAY) as expire_date FROM intake_form_info WHERE sha1(MD5(id))='$id'");

	$validTill = strtotime($singleData->expire_date);
	$currTime = strtotime(date('Y-m-d H:i:s'));
	if($validTill<$currTime) {
		echo 'Form Expired';
		die();
	}
	$getId = "id=$id";
}
else if(isset($_GET['clientId'])){
	if(isset($_SESSION['userId'])){
		$clientId = $_GET['clientId'];
		$formType = $_GET['formNo'];	
		$singleData = $objQuery->indexByQuerySingleData("SELECT *,DATE_ADD(created_at, INTERVAL +1 DAY) as expire_date FROM intake_form_info WHERE sha1(MD5(client_id))='$clientId' and form_type='$formType'");
		
		$getId = "clientId=$clientId";
		if($singleData !=true){
			$clientInfo = $objQuery->indexByQuerySingleData("SELECT * from client_info WHERE sha1(MD5(id))='$clientId'");
			if($clientInfo) {
				
				$response = [];
				$response['first_name'] = "$clientInfo->first_name";
				$response = json_encode($response);
				
				
				$result = $objQuery->inUpDel("INSERT INTO intake_form_info SET client_id = $clientInfo->id, note='$response', form_type='$formType'");
				// $result = $sql->execute();
				if($result)	{
					$singleData = $objQuery->indexByQuerySingleData("SELECT *,DATE_ADD(created_at, INTERVAL +1 DAY) as expire_date FROM intake_form_info WHERE sha1(MD5(client_id))='$clientId' and form_type='$formType'");
				}		
			}
			else{
				echo "Sorry! Not found such as client";
				die();
			}
		}
	}
	else{
		echo "Please login to get the form.";		
		die();
	}
}
else {
	echo "Sorry! Invalid parameter.";
	die();
}


$singleDataNote = json_decode($singleData->note);

/*echo "<pre>";
var_dump($singleDataNote);
echo "</pre>";
die();*/

if(isset($singleDataNote->first_name)) $first_name = $singleDataNote->first_name;
if(isset($singleDataNote->change_name)) $change_name = $singleDataNote->change_name;
if(isset($singleDataNote->application_type)) $application_type = $singleDataNote->application_type;
if(isset($singleDataNote->social_number)) $social_number = $singleDataNote->social_number;
if(isset($singleDataNote->date_of_birth )) $date_of_birth  = $singleDataNote->date_of_birth;
if(isset($singleDataNote->height )) $height  = $singleDataNote->height;
if(isset($singleDataNote->eyes )) $eyes  = $singleDataNote->eyes;
if(isset($singleDataNote->hair )) $hair = $singleDataNote->hair;
if(isset($singleDataNote->residence_date )) $residence_date = $singleDataNote->residence_date;
if(isset($singleDataNote->weight )) $weight = $singleDataNote->weight;
if(isset($singleDataNote->does_it_apply )) $does_it_apply = $singleDataNote->does_it_apply;
if(isset($singleDataNote->travel )) $travel = $singleDataNote->travel;
if(isset($singleDataNote->how_often )) $how_often = $singleDataNote->how_often;
if(isset($singleDataNote->travel_total_time )) $travel_total_time = $singleDataNote->travel_total_time;
if(isset($singleDataNote->date_left )) $date_left = $singleDataNote->date_left;
if(isset($singleDataNote->date_returned )) $date_returned = $singleDataNote->date_returned;
if(isset($singleDataNote->countries_travel )) $countries_travel = $singleDataNote->countries_travel;
if(isset($singleDataNote->total_day_travel )) $total_day_travel = $singleDataNote->total_day_travel;
if(isset($singleDataNote->marital_status )) $marital_status = $singleDataNote->marital_status;
if(isset($singleDataNote->howmany_married )) $howmany_married = $singleDataNote->howmany_married;
if(isset($singleDataNote->current_spouse_name )) $current_spouse_name = $singleDataNote->current_spouse_name;
if(isset($singleDataNote->current_spouse_date_of_birth )) $current_spouse_date_of_birth = $singleDataNote->current_spouse_date_of_birth;
if(isset($singleDataNote->current_spouse_place_birth )) $current_spouse_place_birth = $singleDataNote->current_spouse_place_birth;
if(isset($singleDataNote->current_spouse_direction )) $current_spouse_direction = $singleDataNote->current_spouse_direction;
if(isset($singleDataNote->current_spouse_nationality )) $current_spouse_nationality = $singleDataNote->current_spouse_nationality;
if(isset($singleDataNote->current_spouse_when_married )) $current_spouse_when_married = $singleDataNote->current_spouse_when_married;
if(isset($singleDataNote->current_spouse_mariage_time )) $current_spouse_mariage_time = $singleDataNote->current_spouse_mariage_time;
if(isset($singleDataNote->current_spouse_company_name )) $current_spouse_company_name = $singleDataNote->current_spouse_company_name;
if(isset($singleDataNote->previous_spouse_name )) $previous_spouse_name = $singleDataNote->previous_spouse_name;
if(isset($singleDataNote->previous_spouse_date_of_birth )) $previous_spouse_date_of_birth = $singleDataNote->previous_spouse_date_of_birth;
if(isset($singleDataNote->previous_spouse_place_of_birth )) $previous_spouse_place_of_birth = $singleDataNote->previous_spouse_place_of_birth;
if(isset($singleDataNote->previous_spouse_direction )) $previous_spouse_direction = $singleDataNote->previous_spouse_direction;
if(isset($singleDataNote->previous_spouse_nationality )) $previous_spouse_nationality = $singleDataNote->previous_spouse_nationality;
if(isset($singleDataNote->previous_spouse_when_married )) $previous_spouse_when_married = $singleDataNote->previous_spouse_when_married;
if(isset($singleDataNote->when_marriage_over )) $when_marriage_over = $singleDataNote->when_marriage_over;
if(isset($singleDataNote->spouse_previous_spouse_name )) $spouse_previous_spouse_name = $singleDataNote->spouse_previous_spouse_name;
if(isset($singleDataNote->spouse_previous_spouse_date_of_birth )) $spouse_previous_spouse_date_of_birth = $singleDataNote->spouse_previous_spouse_date_of_birth;
if(isset($singleDataNote->spouse_previous_spouse_place_birth )) $spouse_previous_spouse_place_birth = $singleDataNote->spouse_previous_spouse_place_birth;
if(isset($singleDataNote->spouse_previous_spouse_direction )) $spouse_previous_spouse_direction = $singleDataNote->spouse_previous_spouse_direction;
if(isset($singleDataNote->spouse_previous_spouse_nationlity )) $spouse_previous_spouse_nationlity = $singleDataNote->spouse_previous_spouse_nationlity;
if(isset($singleDataNote->spouse_previous_spouse_when_married )) $spouse_previous_spouse_when_married = $singleDataNote->spouse_previous_spouse_when_married;
if(isset($singleDataNote->spouse_previous_spouse_mariage_end )) $spouse_previous_spouse_mariage_end = $singleDataNote->spouse_previous_spouse_mariage_end;
if(isset($singleDataNote->how_many_childreen )) $how_many_childreen = $singleDataNote->how_many_childreen;
if(isset($singleDataNote->childreen_name )) $childreen_name = $singleDataNote->childreen_name;
if(isset($singleDataNote->childreen_date_of_birth )) $childreen_date_of_birth = $singleDataNote->childreen_date_of_birth;
if(isset($singleDataNote->childreen_date_of_birth )) $childreen_date_of_birth = $singleDataNote->childreen_date_of_birth;
if(isset($singleDataNote->childreen_place_of_birth )) $childreen_place_of_birth = $singleDataNote->childreen_place_of_birth;
if(isset($singleDataNote->childreen_address )) $childreen_address = $singleDataNote->childreen_address;
if(isset($singleDataNote->Child_biological )) $Child_biological = $singleDataNote->Child_biological;
if(isset($singleDataNote->was_arested )) $was_arested = $singleDataNote->was_arested;
if(isset($singleDataNote->howmany_arrested )) $howmany_arrested = $singleDataNote->howmany_arrested;
if(isset($singleDataNote->first_arrest_date )) $first_arrest_date = $singleDataNote->first_arrest_date;
if(isset($singleDataNote->second_arrest_date )) $second_arrest_date = $singleDataNote->second_arrest_date;
if(isset($singleDataNote->third_arrest_date )) $third_arrest_date = $singleDataNote->third_arrest_date;
if(isset($singleDataNote->fourth_arrest_date )) $fourth_arrest_date = $singleDataNote->fourth_arrest_date;
if(isset($singleDataNote->fifth_arrest_date )) $fifth_arrest_date = $singleDataNote->fifth_arrest_date;
if(isset($singleDataNote->what_age_came_us )) $what_age_came_us = $singleDataNote->what_age_came_us;
if(isset($singleDataNote->even_illegal )) $even_illegal = $singleDataNote->even_illegal;
if(isset($singleDataNote->date_entered_us )) $date_entered_us = $singleDataNote->date_entered_us;
if(isset($singleDataNote->date_write_on_i485 )) $date_write_on_i485 = $singleDataNote->date_write_on_i485;
if(isset($singleDataNote->selective_service )) $selective_service = $singleDataNote->selective_service;
if(isset($singleDataNote->company_name )) $company_name = $singleDataNote->company_name;
if(isset($singleDataNote->company_phone )) $company_phone = $singleDataNote->company_phone;
if(isset($singleDataNote->company_dates )) $company_dates = $singleDataNote->company_dates;
if(isset($singleDataNote->spouse_street )) $spouse_street = $singleDataNote->spouse_street;
if(isset($singleDataNote->spouse_city )) $spouse_city = $singleDataNote->spouse_city;
if(isset($singleDataNote->spouse_State )) $spouse_State = $singleDataNote->spouse_State;
if(isset($singleDataNote->spouse_zip )) $spouse_zip = $singleDataNote->spouse_zip;
if(isset($singleDataNote->spouse_dates )) $spouse_dates = $singleDataNote->spouse_dates;
if(isset($singleDataNote->own_taxes )) $own_taxes = $singleDataNote->own_taxes;
if(isset($singleDataNote->have_you_arrest )) $have_you_arrest = $singleDataNote->have_you_arrest;
if(isset($singleDataNote->travel_outside_country )) $travel_outside_country = $singleDataNote->travel_outside_country;
if(isset($singleDataNote->child_support )) $child_support = $singleDataNote->child_support;
if(isset($singleDataNote->have_you_lied_immigration )) $have_you_lied_immigration = $singleDataNote->have_you_lied_immigration;
if(isset($singleDataNote->have_been_deported )) $have_been_deported = $singleDataNote->have_been_deported;
if(isset($singleDataNote->have_you_problem_alcohol )) $have_you_problem_alcohol = $singleDataNote->have_you_problem_alcohol;
if(isset($singleDataNote->enlisted_armed_forches )) $enlisted_armed_forches = $singleDataNote->enlisted_armed_forches;
if(isset($singleDataNote->are_your_parent_uscitizen )) $are_your_parent_uscitizen = $singleDataNote->are_your_parent_uscitizen;
if(isset($singleDataNote->if_yes_how_oldyou_then )) $if_yes_how_oldyou_then = $singleDataNote->if_yes_how_oldyou_then;
if(isset($singleDataNote->did_you_live_citizen_parent )) $did_you_live_citizen_parent = $singleDataNote->did_you_live_citizen_parent;
if(isset($singleDataNote->how_old_when_became_resident )) $how_old_when_became_resident = $singleDataNote->how_old_when_became_resident;

if(isset($singleDataNote->apply_with_fee_waiver )) $apply_with_fee_waiver = $singleDataNote->apply_with_fee_waiver;
if(isset($singleDataNote->client_apply_with_n_648 )) $client_apply_with_n_648 = $singleDataNote->client_apply_with_n_648;
if(isset($singleDataNote->was_applicant_arested )) $was_applicant_arested = $singleDataNote->was_applicant_arested;
if(isset($singleDataNote->if_answer_yes_did_they )) $if_answer_yes_did_they = $singleDataNote->if_answer_yes_did_they;
if(isset($singleDataNote->greencard_through_mariage )) $greencard_through_mariage = $singleDataNote->greencard_through_mariage;
if(isset($singleDataNote->received_military_training )) $received_military_training = $singleDataNote->received_military_training;
if(isset($singleDataNote->applicant_ever_file_waiver )) $applicant_ever_file_waiver = $singleDataNote->applicant_ever_file_waiver;
if(isset($singleDataNote->any_occurence )) $any_occurence = $singleDataNote->any_occurence;
if(isset($singleDataNote->agreement )) $agreement = $singleDataNote->agreement;


  












// if($singleDataNote->date_of_birth!="" && $singleDataNote->date_of_birth!="0000-00-00"){
//     $date_of_birth = date("Y-m-d",strtotime($singleDataNote->date_of_birth));
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <style type="text/css">
   #registration_form fieldset:not(:first-of-type) {
       display: none;
   }

    body, div, form, input, select, p { 
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

       input:hover, select:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #095484;
      color: #095484;
      }

 </style>
 <title>INTAKE FOR N-400 </title>
</head>
<body>
<div class="container" style="padding: 20px;">
    <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	
    <form id="registration_form" class="form-horizontal" action="#"  method="post">
            <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		    <input type="hidden" name="client_id" value="<?php echo $clientId?>" />
        <fieldset>
            <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h2>PART 1 : INTAKE FOR N-400</h2>
				<br>
                <div class="form-group">
                    <label class="control-label col-md-5" for="first_name">Nombre completo (Como consta en la residencia):</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="first_name" id="first_name"  value="<?php echo $first_name?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="change_name"> Quiere cambiar su nombre? :</label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="change_name"  value="Yes" <?php echo ($change_name=="Yes") ? "checked" : " "?>> Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="change_name"  value="No"  <?php echo ($change_name=="No") ? "checked" : " "?>> No
                    </label> 
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="application_type"> Como aplica?  :</label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="application_type"  value="3_year" <?php echo ($application_type=="3_year") ? "checked" : " "?>> 3 Anos 
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="application_type"  value="5_year"  <?php echo ($application_type=="5_year") ? "checked" : " "?>> 5 Anos 
                    </label> 
                    </div> 
                </div>
                

                <div class="form-group">
                        <div class="col-md-9 col-md-offset-1">
                            <p><b>nótese bien :</b> (if it is the 3 year rule: MUST be married for 3 years, spouse
                                must a be citizen for 3 years, and applicant must be resident for 3 years)- applicants qualify 90
                                days before reaching 3 year or 5 rule...</p>
                        </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-5" for="social_number"> Social # :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="social_number" id="social_number"  value="<?php echo $social_number?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="date_of_birth"> Fecha de nacimiento :</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"  value="<?php echo $date_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="height"> Height : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="height" id="height"  value="<?php echo $height?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="eyes"> Eyes : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="eyes" id="eyes"  value="<?php echo $eyes?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="hair"> Hair : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="hair" id="hair"  value="<?php echo $hair?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="residence_date"> Fecha en el que e hizo residente: </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="residence_date" id="residence_date"  value="<?php echo $residence_date?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="weight"> Weight: </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="weight" id="weight"  value="<?php echo $weight?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="does_it_apply"> Aplica en Espanol? : </label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="does_it_apply"  value="Yes" <?php echo ($does_it_apply=="Yes") ? "checked" : " "?>> Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="does_it_apply"  value="No"  <?php echo ($does_it_apply=="No") ? "checked" : " "?>> No 
                    </label> 
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="travel"> Viajo? : </label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="travel"  value="Yes" <?php echo ($travel=="Yes") ? "checked" : " "?>> Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="travel"  value="No" <?php echo ($travel=="No") ? "checked" : " "?>> No 
                    </label> 
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="how_often"> Cuantas veces? :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="how_often" id="how_often"  value="<?php echo $how_often?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="travel_total_time">Por cuanto tiempo en total? :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="travel_total_time" id="travel_total_time"  value="<?php echo $travel_total_time?>">
                    </div> 
                </div>

                <div class="form-group">
                    <div class="text-center">
                       <h4><b> Lista de viajes con fechas exactas de los ultimos 5 anos : </b></h4>
                    </div> 
                </div>

                <div class="form-group">
                   <div class="text-center">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead class="thead thead-dark">
                                <tr>
                                    <td><h4>Sl#</h4></td>
                                    <td><h4>Fecha en el que se fue de los EEUU</h4></td>
                                    <td><h4>Fecha en la que volvio a los EEUU</h4></td>
                                    <td><h4>Países a los que viajaste</h4></td>
                                    <td><h4>Total de días que viajó</h4></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input class="form-control" type="date" name="date_left[]" value="<?php echo $date_left[0]?>"></td>
                                    <td><input class="form-control" type="date" name="date_returned[]" value="<?php echo $date_returned[0]?>"></td>
                                    <td><input class="form-control" type="text" name="countries_travel[]" placeholder="Nombre del país "  value="<?php echo $countries_travel[0]?>"></td>
                                    <td><input class="form-control" type="text" name="total_day_travel[]"  placeholder="total de días de viaje" value="<?php echo $total_day_travel[0]?>"></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td><input class="form-control" type="date" name="date_left[]" value="<?php echo $date_left[1]?>"></td>
                                    <td><input class="form-control" type="date" name="date_returned[]" value="<?php echo $date_returned[1]?>"></td>
                                    <td><input class="form-control" type="text" name="countries_travel[]" placeholder="Nombre del país "  value="<?php echo $countries_travel[1]?>"></td>
                                    <td><input class="form-control" type="text" name="total_day_travel[]"  placeholder="total de días de viaje" value="<?php echo $total_day_travel[1]?>"></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td><input class="form-control" type="date" name="date_left[]" value="<?php echo $date_left[2]?>"></td>
                                    <td><input class="form-control" type="date" name="date_returned[]" value="<?php echo $date_returned[2]?>"></td>
                                    <td><input class="form-control" type="text" name="countries_travel[]" placeholder="Nombre del país "  value="<?php echo $countries_travel[2]?>"></td>
                                    <td><input class="form-control" type="text" name="total_day_travel[]"  placeholder="total de días de viaje" value="<?php echo $total_day_travel[2]?>"></td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td><input class="form-control" type="date" name="date_left[]" value="<?php echo $date_left[3]?>"></td>
                                    <td><input class="form-control" type="date" name="date_returned[]" value="<?php echo $date_returned[3]?>"></td>
                                    <td><input class="form-control" type="text" name="countries_travel[]" placeholder="Nombre del país "  value="<?php echo $countries_travel[3]?>"></td>
                                    <td><input class="form-control" type="text" name="total_day_travel[]"  placeholder="total de días de viaje" value="<?php echo $total_day_travel[3]?>"></td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td><input class="form-control" type="date" name="date_left[]" value="<?php echo $date_left[4]?>"></td>
                                    <td><input class="form-control" type="date" name="date_returned[]" value="<?php echo $date_returned[4]?>"></td>
                                    <td><input class="form-control" type="text" name="countries_travel[]" placeholder="Nombre del país "  value="<?php echo $countries_travel[4]?>"></td>
                                    <td><input class="form-control" type="text" name="total_day_travel[]"  placeholder="total de días de viaje" value="<?php echo $total_day_travel[4]?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   </div>
                </div>
		    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
        </fieldset>
        



    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
        <h2> PART 1:  INTAKE FOR N-400 (Continued)</h2>
			
                <div class="form-group">
                    <label class="control-label col-md-5" for="marital_status"> Cual es el estado marital actual : </label>
                    <div class="col-md-5">
                        
                    <label class="radio-inline">
							<input type="radio" name="marital_status"  value="single" <?php echo ($marital_status=="single") ? "checked" : " "?> > Nunca casada
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="marital_status"  value="married" <?php echo ($marital_status=="married") ? "checked" : " "?>> Casada/Casado 
                    </label> 

                    <label class="radio-inline">
							<input type="radio" name="marital_status"  value="divorced" <?php echo ($marital_status=="divorced") ? "checked" : " "?>> divorciada/divorciado 
                    </label> 

                    <label class="radio-inline">
							<input type="radio" name="marital_status"  value="widowed" <?php echo ($marital_status=="widowed") ? "checked" : " "?>> viuda/viudo
                    </label>
                    
                    <label class="radio-inline">
							<input type="radio" name="marital_status"  value="separated" <?php echo ($marital_status=="separated") ? "checked" : " "?>> apartada/apartado
                    </label>
                    
                    <label class="radio-inline">
							<input type="radio" name="marital_status"  value="annuled" <?php echo ($marital_status=="annuled") ? "checked" : " "?>> matrimonio anulado
                    </label>

                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="howmany_married">Cuantas veces se caso? :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="howmany_married" id="howmany_married"  value="<?php echo $howmany_married?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse"><h4> <b>Esposa/o actual:- </b></h4></label>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_name"> Nombre: </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_name" id="current_spouse_name"  value="<?php echo $current_spouse_name?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_date_of_birth"> Fecha de Nacimiento :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_date_of_birth" id="current_spouse_date_of_birth"  value="<?php echo $current_spouse_date_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_place_birth"> Lugar de Nacimiento : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_place_birth" id="current_spouse_place_birth"  value="<?php echo $current_spouse_place_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_direction">Direccion :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_direction" id="current_spouse_direction"  value="<?php echo $current_spouse_direction?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_nationality">Nacionalidad : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_nationality" id="current_spouse_nationality"  value="<?php echo $current_spouse_nationality?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_when_married"> Cuando se Caso: </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_when_married" id="current_spouse_when_married"  value="<?php echo $current_spouse_when_married?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_mariage_time"> Cuantas veces se caso el conyuge actual? : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_mariage_time" id="current_spouse_mariage_time"  value="<?php echo $current_spouse_mariage_time?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_company_name"> Nombre de compania donde trabaja el conyuge
                        actual : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="current_spouse_company_name" id="current_spouse_company_name"  value="<?php echo $current_spouse_company_name?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse"><h4><b>Esposa/o anterior :-</b></h4></label>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse_name"> Nombre: </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="previous_spouse_name" id="previous_spouse_name"  value="<?php echo $previous_spouse_name?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse_date_of_birth">Fecha de Nacimiento : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="previous_spouse_date_of_birth" id="previous_spouse_date_of_birth"  value="<?php echo $previous_spouse_date_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse_place_of_birth"> Lugar de Nacimiento: </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="previous_spouse_place_of_birth" id="previous_spouse_place_of_birth"  value="<?php echo $previous_spouse_place_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse_direction"> Direccion :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="previous_spouse_direction" id="previous_spouse_direction"  value="<?php echo $previous_spouse_direction?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse_nationality"> Nacionalidad : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="previous_spouse_nationality" id="previous_spouse_nationality"  value="<?php echo $previous_spouse_nationality?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="previous_spouse_when_married">Cuando se caso : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="previous_spouse_when_married" id="previous_spouse_when_married"  value="<?php echo $previous_spouse_when_married?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="when_marriage_over"> Cuando se termino el matrimonialy como : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="when_marriage_over" id="when_marriage_over"  value="<?php echo $when_marriage_over?>">
                    </div> 
                </div>

        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
        
    </fieldset>
   
        
   






    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h2> PART 1:  INTAKE FOR N-400 (Continued) </h2>
            <br>
			
			
                <div class="form-group">
                    <label class="control-label col-md-5" for="current_spouse_previous_spouse"><h4><b> Esposa/o anterior de esposa/o actual:- </b></h4></label>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_name"> Nombre :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="spouse_previous_spouse_name" id="spouse_previous_spouse_name"  value="<?php echo $spouse_previous_spouse_name?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_date_of_birth"> Fecha de Nacimiento :</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="spouse_previous_spouse_date_of_birth" id="spouse_previous_spouse_date_of_birth"  value="<?php echo $spouse_previous_spouse_date_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_place_birth"> Lugar de Nacimiento :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="spouse_previous_spouse_place_birth" id="spouse_previous_spouse_place_birth"  value="<?php echo $spouse_previous_spouse_place_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_direction"> Direccion: :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="spouse_previous_spouse_direction" id="spouse_previous_spouse_direction"  value="<?php echo $spouse_previous_spouse_direction?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_nationlity"> Nacionalidad :</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="spouse_previous_spouse_nationlity" id="spouse_previous_spouse_nationlity"  value="<?php echo $spouse_previous_spouse_nationlity?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_when_married"> Cuando se caso :</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="spouse_previous_spouse_when_married" id="spouse_previous_spouse_when_married"  value="<?php echo $spouse_previous_spouse_when_married?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="spouse_previous_spouse_mariage_end"> Cuando se termino el matrimonial y como : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="spouse_previous_spouse_mariage_end" id="spouse_previous_spouse_mariage_end"  value="<?php echo $spouse_previous_spouse_mariage_end?>">
                    </div> 
                </div>
                   
                <div class="form-group">
                    <label class="control-label col-md-5" for="how_many_childreen">  How many children : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="how_many_childreen" id="how_many_childreen"  value="<?php echo $how_many_childreen?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="childreen_name">  Name : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="childreen_name" id="childreen_name"  value="<?php echo $childreen_name?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="childreen_date_of_birth"> DOB : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="childreen_date_of_birth" id="childreen_date_of_birth"  value="<?php echo $childreen_date_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="childreen_place_of_birth"> Place of Birth/Nationality : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="childreen_place_of_birth" id="childreen_place_of_birth"  value="<?php echo $childreen_place_of_birth?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="childreen_address"> Address : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="childreen_address" id="childreen_address"  value="<?php echo $childreen_address?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="Child_biological"> Child biological? :</label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="Child_biological"  value="Yes"   <?php echo ($Child_biological=="Yes") ? "checked" : " "?> > Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="Child_biological"  value="No" <?php echo ($Child_biological=="No") ? "checked" : " "?> > No
                    </label> 
                    </div> 
                </div>
                
                <div class="form-group">
                        <div class="col-md-9 col-md-offset-1">
                            <p> (I usually do not put step children on this form unless client wishes to do sof
                            normally you ONLY put biological children)* **for men with children that do NOT live with the
                            father at home and are NOT on the father's taxes, said father needs a child support letter from the
                            mother for date of interview to prove he is up to date with child support or letter from child
                            support agency or canceled checks and money order to prove child support payment)</p>
                        </div>
                </div>
				
				
		<div class="form-group">
                    <label class="control-label col-md-5" for="was_arested"> fue arrestado? :</label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="was_arested"  value="Yes"  <?php echo ($was_arested=="Yes") ? "checked" : " "?> > Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="was_arested"  value="No"  <?php echo ($was_arested=="No") ? "checked" : " "?> > No
                    </label> 
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="howmany_arrested">Cuantas veces? : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="howmany_arrested" id="howmany_arrested"  value="<?php echo $howmany_arrested?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="first_arrest_date">First arrest date : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="first_arrest_date" id="first_arrest_date"  value="<?php echo $first_arrest_date?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="second_arrest_date">Second arrest date : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="second_arrest_date" id="second_arrest_date"  value="<?php echo $second_arrest_date?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="third_arrest_date">Third arrest date : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="third_arrest_date" id="third_arrest_date"  value="<?php echo $third_arrest_date?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="fourth_arrest_date">Fourth arrest date : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="fourth_arrest_date" id="fourth_arrest_date"  value="<?php echo $fourth_arrest_date?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="fifth_arrest_date">Fifth arrest date : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="fifth_arrest_date" id="fifth_arrest_date"  value="<?php echo $fifth_arrest_date?>">
                    </div> 
                </div>

                <div class="form-group">
                        <div class="col-md-9 col-md-offset-1">
                            <p> (If person has had many or any arrests, it must be taken a look at by supervisor)- usually a client
                                should have 5 years of "statutory period" clean with no arrests and even if they have arrests in the
                                last 5 years client may still qualify and if person was arrested over 5 years ago, client may NOT be
                                eligible if crime was too serious... so ask supervisor)</p>
                        </div>
                </div>

            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
            <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />

    </fieldset>




    <fieldset>
	<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
        <h2> PART 1:  INTAKE FOR N-400 (Continued)</h2>
			<br>
                <div class="form-group">
                    <label class="control-label col-md-5" for="what_age_came_us">Si es hombre: cuantos anos tenia cuando llego a los EEUU? : </label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="what_age_came_us" id="what_age_came_us"  value="<?php echo $what_age_came_us?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="even_illegal"> Aun como ilegal? :</label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="even_illegal"  value="Yes" <?php echo ($even_illegal=="Yes") ? "checked" : " "?> > Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="even_illegal"  value="No" <?php echo ($even_illegal=="No") ? "checked" : " "?> > No
                    </label> 
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="date_entered_us"> Que fecha anoto en la
                    aplicacion de su residencia como la fecha en la que entro a los EEUU?  : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="date_entered_us" id="date_entered_us"  value="<?php echo $date_entered_us?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="date_write_on_i485"> Que fecha anoto en el I-485? : </label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="date_write_on_i485" id="date_write_on_i485"  value="<?php echo $date_write_on_i485?>">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-5" for="selective_service"> Esta registrado con el Selective Service? : </label>
                    <div class="col-md-5">
                    <label class="radio-inline">
							<input type="radio" name="selective_service"  value="Yes" <?php echo ($selective_service=="Yes") ? "checked" : " "?> > Yes
                    </label>  
                    <label class="radio-inline">
							<input type="radio" name="selective_service"  value="No" <?php echo ($selective_service=="No") ? "checked" : " "?> > No
                    </label> 
                    </div> 
                </div>

                <br>
        <div class="text-center bg-info">
            <h3>Trabajos de ahora y de los ultimos 5 anos: ( do NOT write it down if client did NOT file taxes)</h3>
        </div>
        <br>
        <div class="text-center">
            <table class=" table table-bordered table-striped ">
                <thead class="thead-dark">
                <tr>
                    <td><h4>SL#</h4></td>
                   <td><h4>Compañía</h4></td> 
                   <td><h4>Teléfono</h4></td>  
                   <td><h4>fechas</h4></td> 
                </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input class="form-control" type="text" name="company_name[]"  placeholder="" value="<?php echo $company_name[0]?>"></td>
                        <td><input class="form-control" type="number" name="company_phone[]" placeholder="" value="<?php echo $company_phone[0]?>"></td>
                        <td><input class="form-control" type="date" name="company_dates[]" placeholder="" value="<?php echo $company_dates[0]?>"></td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td><input class="form-control" type="text" name="company_name[]"  placeholder="" value="<?php echo $company_name[1]?>"></td>
                        <td><input class="form-control" type="number" name="company_phone[]" placeholder="" value="<?php echo $company_phone[1]?>"></td>
                        <td><input class="form-control" type="date" name="company_dates[]" placeholder="" value="<?php echo $company_dates[1]?>"></td>
                    </tr>
                    <tr>
                    <td>3</td>
                    <td><input class="form-control" type="text" name="company_name[]"  placeholder="" value="<?php echo $company_name[2]?>"></td>
                        <td><input class="form-control" type="number" name="company_phone[]" placeholder="" value="<?php echo $company_phone[2]?>"></td>
                        <td><input class="form-control" type="date" name="company_dates[]" placeholder="" value="<?php echo $company_dates[2]?>"></td>
                    </tr>
                    <tr>
                    <td>4</td>
                    <td><input class="form-control" type="text" name="company_name[]"  placeholder="" value="<?php echo $company_name[3]?>"></td>
                        <td><input class="form-control" type="number" name="company_phone[]" placeholder="" value="<?php echo $company_phone[3]?>"></td>
                        <td><input class="form-control" type="date" name="company_dates[]" placeholder="" value="<?php echo $company_dates[3]?>"></td>
                    </tr>
                    <tr>
                    <td>5</td>
                    <td><input class="form-control" type="text" name="company_name[]"  placeholder="" value="<?php echo $company_name[4]?>"></td>
                        <td><input class="form-control" type="number" name="company_phone[]" placeholder="" value="<?php echo $company_phone[4]?>"></td>
                        <td><input class="form-control" type="date" name="company_dates[]" placeholder="" value="<?php echo $company_dates[4]?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
		
		<div class="text-center bg-info">
            <h3>Vivienda de los ultimos.5 anos: </h3>
        </div>
        <br>
        <div class="text-center">
            <table class=" table table-bordered table-striped table-hovered">
                <thead class="thead-dark">
                <tr>
                    <td><h4>SL#</h4></td>
                   <td><h4>Calle</h4></td> 
                   <td><h4>Ciudad</h4></td> 
                   <td><h4>Expresar</h4></td> 
                   <td><h4>Código postal</h4></td> 
                   <td><h4>fechas</h4></td> 
                </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><input class="form-control" type="text" name="spouse_street[]" value="<?php echo $spouse_street[0]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_city[]"   value="<?php echo $spouse_city[0]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_State[]"  value="<?php echo $spouse_State[0]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_zip[]"    value="<?php echo $spouse_zip[0]?>" ></td>
                        <td><input class="form-control" type="date" name="spouse_dates[]"  value="<?php echo $spouse_dates[0]?>" ></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input class="form-control" type="text" name="spouse_street[]"      value="<?php echo $spouse_street[1]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_city[]"   value="<?php echo $spouse_city[1]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_State[]"   value="<?php echo $spouse_State[1]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_zip[]"    value="<?php echo $spouse_zip[1]?>" ></td>
                        <td><input class="form-control" type="date" name="spouse_dates[]"    value="<?php echo $spouse_dates[1]?>" ></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input class="form-control" type="text" name="spouse_street[]"      value="<?php echo $spouse_street[2]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_city[]"   value="<?php echo $spouse_city[2]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_State[]"    value="<?php echo $spouse_State[2]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_zip[]"   value="<?php echo $spouse_zip[2]?>" ></td>
                        <td><input class="form-control" type="date" name="spouse_dates[]"   value="<?php echo $spouse_dates[2]?>" ></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><input class="form-control" type="text" name="spouse_street[]"   value="<?php echo $spouse_street[3]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_city[]"   value="<?php echo $spouse_city[3]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_State[]"   value="<?php echo $spouse_State[3]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_zip[]"    value="<?php echo $spouse_zip[3]?>" ></td>
                        <td><input class="form-control" type="date" name="spouse_dates[]"  placeholder=""  value="<?php echo $spouse_dates[3]?>" ></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input class="form-control" type="text" name="spouse_street[]"     value="<?php echo $spouse_street[4]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_city[]"   value="<?php echo $spouse_city[4]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_State[]"   value="<?php echo $spouse_State[4]?>" ></td>
                        <td><input class="form-control" type="text" name="spouse_zip[]"   value="<?php echo $spouse_zip[4]?>" ></td>
                        <td><input class="form-control" type="date" name="spouse_dates[]"  placeholder="" value="<?php echo $spouse_dates[4]?>" ></td>
                    </tr>
                </tbody>
            </table>
        </div>
		 
		
        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>
	
	
	<fieldset>
	    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
        <h2> PART 2:  INTAKE FOR N-400</h2>
        <br>
		<div class="text-center bg-info">
            <h4>Cuestionario para el cliente (N-400)</h4>
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="own_taxes"> 1) Debe Ud. taxes/impuestos?  : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="own_taxes"  value="Yes" <?php echo ($own_taxes=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="own_taxes"  value="No" <?php echo ($own_taxes=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="have_you_arrest"> 2) Ha Ud. sido arrestado/a? : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="have_you_arrest"  value="Yes"  <?php echo ($have_you_arrest=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="have_you_arrest"  value="No"  <?php echo ($have_you_arrest=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="travel_outside_country">3) Ha Ud. viajado fuera del pais por mas de 6 meses consecutives en los ultimos 5 anos?  : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="travel_outside_country"  value="Yes" <?php echo ($travel_outside_country=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="travel_outside_country"  value="No" <?php echo ($travel_outside_country=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="lived_outside_country">Ha vivido Ud. por mas de la mitad de los ultimos 5 anos fuera de EEUU?: </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="lived_outside_country"  value="Yes" <?php echo ($travel_outside_country=="Yes") ? "checked" : " "?> > Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="lived_outside_country"  value="No" <?php echo ($travel_outside_country=="No") ? "checked" : " "?> > No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="child_support">4)  Pago Ud. manuntencion (child support)? (Solamente para hombres que NO tienen hijos menores de edad) : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="child_support"  value="Yes"  <?php echo ($child_support=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="child_support"  value="No"  <?php echo ($child_support=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="have_you_lied_immigration">5) Le ha mentido a inmigracion? : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="have_you_lied_immigration"  value="Yes"  <?php echo ($have_you_lied_immigration=="Yes") ? "checked" : " "?> > Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="have_you_lied_immigration"  value="No"  <?php echo ($have_you_lied_immigration=="No") ? "checked" : " "?> > No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="have_been_deported">6) Ha sido deportado/a? : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="have_been_deported"  value="Yes"  <?php echo ($have_been_deported=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="have_been_deported"  value="No"  <?php echo ($have_been_deported=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="have_you_problem_alcohol">7)  Ha tenido algun problema con el alcohol, jugar por dinero (gambling), prostitution o drogas? : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="have_you_problem_alcohol"  value="Yes" <?php echo ($have_you_problem_alcohol=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="have_you_problem_alcohol"  value="No" <?php echo ($have_you_problem_alcohol=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="enlisted_armed_forches">8)  Se ha enlistado Ud. en las fuerzas armandas de los EEUU o en cualquier otros pais? : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="enlisted_armed_forches"  value="Yes" <?php echo ($enlisted_armed_forches=="Yes") ? "checked" : " "?> > Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="enlisted_armed_forches"  value="No" <?php echo ($enlisted_armed_forches=="No") ? "checked" : " "?> > No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="are_your_parent_uscitizen">9) A. Sus padres son ciudadanos Americanos?:- </label>
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="are_your_parent_uscitizen">Padre / Madre : </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="are_your_parent_uscitizen"  value="Yes" <?php echo ($are_your_parent_uscitizen=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="are_your_parent_uscitizen"  value="No" <?php echo ($are_your_parent_uscitizen=="No") ? "checked" : " "?>> No
                 </label> 
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="if_yes_how_oldyou_then"> B. Si su respuesta es si, cuantos anos tenia Ud. cuando su madre o padre se hizo ciudadano/a Americano/a? : </label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="if_yes_how_oldyou_then" id="if_yes_how_oldyou_then"  value="<?php echo $if_yes_how_oldyou_then?>" >
             </div> 
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="did_you_live_citizen_parent">C. Si su repuesta es si, vivia Ud. con su padre/madre ciudadano/a Americano/a?: </label>
            <div class="col-md-5">
                <label class="radio-inline">
					<input type="radio" name="did_you_live_citizen_parent"  value="Yes"  <?php echo ($did_you_live_citizen_parent=="Yes") ? "checked" : " "?>> Yes
                </label>  
                <label class="radio-inline">
					<input type="radio" name="did_you_live_citizen_parent"  value="No" <?php echo ($did_you_live_citizen_parent=="No") ? "checked" : " "?>> No
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-5" for="how_old_when_became_resident"> D.  Si su respuesta es si, cuantos anos tenia Ud. cuando se hizo residente? : </label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="how_old_when_became_resident" id="how_old_when_became_resident"  value="<?php echo $how_old_when_became_resident?>" >
             </div> 
        </div>
		

        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>

    <fieldset>
	
        <h2> PART 3: INTAKE FOR N-400</h2>
        <br>

        <div class="text-center bg-info">
            <h4>N-400 ATTACHMENT</h4>
        </div>

		<div class="form-group">
            <label class="control-label col-md-6" for="apply_with_fee_waiver">WILL CLIENT APPLY WITH FEE WAIVER? : </label>
            <div class="col-md-2">
                <label class="radio-inline">
					<input type="radio" name="apply_with_fee_waiver"  value="Yes" <?php echo ($apply_with_fee_waiver=="Yes") ? "checked" : " "?>> YES
                </label>  
                <label class="radio-inline">
					<input type="radio" name="apply_with_fee_waiver"  value="No" <?php echo ($apply_with_fee_waiver=="No") ? "checked" : " "?>> NO
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="client_apply_with_n_648"> WILL CLIENT APPLY WITH N-648? : </label>
            <div class="col-md-2">
                <label class="radio-inline">
					<input type="radio" name="client_apply_with_n_648"  value="Yes" <?php echo ($client_apply_with_n_648=="Yes") ? "checked" : " "?>> YES
                </label>  
                <label class="radio-inline">
					<input type="radio" name="client_apply_with_n_648"  value="No" <?php echo ($client_apply_with_n_648=="No") ? "checked" : " "?>> No
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="was_applicant_arested">WAS APPLICANT ARRESTED? : </label>
            <div class="col-md-2">
                <label class="radio-inline">
					<input type="radio" name="was_applicant_arested"  value="Yes"  <?php echo ($was_applicant_arested=="Yes") ? "checked" : " "?>> YES
                </label>  
                <label class="radio-inline">
					<input type="radio" name="was_applicant_arested"  value="No"  <?php echo ($was_applicant_arested=="No") ? "checked" : " "?>> No
                 </label> 
            </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="if_answer_yes_did_they"> IF ANSWER IS YES, DID THEY... : </label>
            <div class="col-md-3">
                <br>

                <label class="radio-inline">
                    
					  <input type="radio" name="if_answer_yes_did_they"  value="parole" <?php echo ($if_answer_yes_did_they=="parole") ? "checked" : " "?>>  DO PAROLE?
                </label>  
                <label class="radio-inline">
				  <input type="radio" name="if_answer_yes_did_they"  value="probation" <?php echo ($if_answer_yes_did_they=="probation") ? "checked" : " "?>> DO PROBATION?
                 </label> 
                 <label class="radio-inline">
					<input type="radio" name="if_answer_yes_did_they"  value="rehabilitation" <?php echo ($if_answer_yes_did_they=="rehabilitation") ? "checked" : " "?>> DO A REHABILITATION CLASS?
                 </label> 
                 <label class="radio-inline">
					<input type="radio" name="if_answer_yes_did_they"  value="committed" <?php echo ($if_answer_yes_did_they=="committed") ? "checked" : " "?>> O COMMITTED FRAUD?
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="greencard_through_mariage"> DID APPLICANT RECEIVE GREENCARD THROUGH MARIAGE?: </label>
            <div class="col-md-2">
                <label class="radio-inline">
					<input type="radio" name="greencard_through_mariage"  value="Yes" <?php echo ($greencard_through_mariage=="Yes") ? "checked" : " "?>> YES
                </label>  
                <label class="radio-inline">
					<input type="radio" name="greencard_through_mariage"  value="No" <?php echo ($greencard_through_mariage=="No") ? "checked" : " "?> > No
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for=""> (IF SO, DOUBLE CHECK PHYSICAL ADDRESS HISTORY) </label>
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="received_military_training"> RECEIVED MILITARY TRAINING? : </label>
            <div class="col-md-2">
                <label class="radio-inline">
					<input type="radio" name="received_military_training"  value="Yes" <?php echo ($received_military_training=="Yes") ? "checked" : " "?>> YES
                </label>  
                <label class="radio-inline">
					<input type="radio" name="received_military_training"  value="No" <?php echo ($received_military_training=="No") ? "checked" : " "?>> No
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <label class="control-label col-md-6" for="applicant_ever_file_waiver"> DID APPLICANT EVER FILE ANY WAIVER FOR. : </label>
            <div class="col-md-2">
                <label class="radio-inline">
					<input type="radio" name="applicant_ever_file_waiver"  value="Yes" <?php echo ($applicant_ever_file_waiver=="Yes") ? "checked" : " "?> > YES
                </label>  
                <label class="radio-inline">
					<input type="radio" name="applicant_ever_file_waiver"  value="No" <?php echo ($applicant_ever_file_waiver=="No") ? "checked" : " "?>> No
                 </label> 
             </div>  
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                <label class="radio-inline">
					<input type="radio" name="any_occurence"  value="drugs" <?php echo ($any_occurence=="drugs") ? "checked" : " "?> > DRUGS? 
                 </label> 
                 <label class="radio-inline">
					<input type="radio" name="any_occurence"  value="prostitution" <?php echo ($any_occurence=="prostitution") ? "checked" : " "?> > PROSTITUTION?
                 </label>
                 <label class="radio-inline">
					<input type="radio" name="any_occurence"  value="deport" <?php echo ($any_occurence=="deport") ? "checked" : " "?> > DEPORT?
                 </label>
                 <label class="radio-inline">
					<input type="radio" name="any_occurence"  value="frood" <?php echo ($any_occurence=="frood") ? "checked" : " "?> > FRAUD?
                </label>  
             </div>  
        </div>

		<div class="text-center">
         <label class = "checkbox-inline">
            <input type = "checkbox" name="agreement"  id = "agreement" value = "1" <?php echo ($agreement=="1") ? "checked" : " "?>>Yo certifico que he leido toda la informacion en esta borrador y esta corroto todo. 
         </label>
      </div>

        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
    </fieldset>





	</form>
  </div>
</body>
</html>










<script type="text/javascript">
$(document).ready(function(){
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
	$(".next").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width",percent+"%")
			.html(percent+"%");		
	}
});
 

$(document).on('submit', '#registration_form', function(event){
	 event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=3&<?php echo $getId?>",
		method:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{	
			alert(data);
		}
	}); 
	
});
</script>