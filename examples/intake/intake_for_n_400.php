<?php
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
if(isset($singleDataNote->child_biological )) $Child_biological = $singleDataNote->child_biological;
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
        

                <?php
                
                include('intake_n400/part_1.php');
                include('intake_n400/part_2.php');
                include('intake_n400/part_3.php');
                include('intake_n400/part_4.php');
                include('intake_n400/part_5.php');
                include('intake_n400/part_6.php');
                ?>

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