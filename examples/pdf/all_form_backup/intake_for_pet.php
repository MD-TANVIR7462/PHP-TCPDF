<?php

require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$petition = $adjustment = $other = $petitioner_name = $petitioner_date_of_birth = $petitioner_address = $petitioner_telephone = $petitioner_legal_status = $petitioner_civil_status = $petitioner_how_many_childreen = $applicant_name = $applicant_date_of_birth =   $applicant_address = $applicant_telephone = $applicant_legal_status = $applicant_civil_status = $applicant_how_many_times_married = $applicant_how_many_childreen = $applicant_when_enter_us = $applicant_how_enter = $applicant_any_deportation = $applicant_any_prior_petition = $applicant_who_filed =  $applicant_arrest = $petitioner_a_number = $petitioner_social_security = $petitioner_city_country_birth =  $petitioner_address_street = $petitioner_address_city = $petitioner_address_state =  $petitioner_address_zip = $petitioner_address_dates =  $petitioner_height =  $petitioner_weight =  $petitioner_eyes = $petitioner_hair = $petitioned_before = $petitioner_client_name = $petitioner_client_date_place_filed = $petitioner_result_of_the_case =  $petitioner_current_spouse_name =  $petitioner_current_spouse_date_marriage = $petitioner_current_spouse_date_birth =  $petitioner_spouse_city_state_province_mariage = $petitioner_spouse_country_of_mariage =  $petitioner_prior_spouse_name =  $petitioner_prior_spouse_date_of_marriage = $petitioner_prior_spouse_date_of_marriage_ended = $petitioner_parent1_name = $petitioner_parent1_birth_date = $petitioner_parent1_pob = $petitioner_parent1_country_residence = $petitioner_parent2_name = $petitioner_parent2_birth_date = $petitioner_parent2_pob = $petitioner_parent2_country_residence =  $petition_gain_residence_via_mariage = $petitioner_where_they_admited =  $desctibe_relationship =  $employee_company = $employee_phone = $employee_dates = $benificiary_other_name_used = $benificiary_height = $benificiary_weight = $benificiary_eyes = $benificiary_hair = $benificiary_current_spouse_name = $benificiary_current_spouse_date_marriage =  $benificiary_spouse_city_state_province_mariage = $benificiary_spouse_country_of_mariage = $benificiary_prior_spouse_name = $benificiary_prior_spouse_date_marriage = $benificiary_prior_spouse_date_marriage_ended =  $benificiary_where_live_together = $beneficiary_address_street = $beneficiary_address_city = $beneficiary_address_state = $beneficiary_address_zip = $beneficiary_address_dates = $benificiary_last_physical_address_outside_us = $benificiary_address_date_from = $benificiary_address_date_to = $benificiary_last_job_outside_us =  $benificiary_last_job_date_from = $benificiary_last_job_date_to = $benificiary_job_name = $benificiary_job_address = $benificiary_job_occupation = $beneficiary_parent1_date_of_birth = $beneficiary_parent1_pob = $beneficiary_parent1_country_resident = $beneficiary_parent2_name = $beneficiary_parent2_date_of_birth = $beneficiary_parent2_pob = $beneficiary_parent2_country_resident = $beneficiary_pasport_number = $beneficiary_pasport_expiry_date = $bebeficiary_ever_denied =  $bebeficiary_ever_denied_visa = $bebeficiary_when_applyed_tourist_visa = $bebeficiary_tell_where_working = $bebeficiary_did_tell_last_entry = $applicant_enter_illegally = $applicant_have_any_problems = $applicant_have_been_arrested = $applicant_comply_with = $did_been_commit_fraud = $did_apply_with_waiver = $certification = $new_york = $yo_certificato = $contract_marriage = $we_live_together = $we_live_address = $person_1_field_1 = $person_2_field_1 = $new_york_2 = $i_certificato = $entered_marriage_with = $we_live_together_at = $we_live_together_address = $person_1_field_2 = $person_2_field_2 = $tax_year = $total_income =  $tax_amount = $applicant_working = $on_the_book = $does_person_tax_id = $applicant_entered_with_j1 = $applicant_nationality =  $applicant_was_from = $applicant_was_to =  $certify_name = $fetcha = $benificiary_never_live = $did_they_work_last_5year = $if_yes_did_the_file_tax = $what_did_they_put_ds160 = $did_they_live_usa_illegal = $have_them_write_story = $was_visa_denied = $were_they_denied_entry_usa = $was_immigrant_ever_denied = ""; 









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


if(isset($singleDataNote->petition)) $petition = $singleDataNote->petition;
if(isset($singleDataNote->adjustment)) $adjustment = $singleDataNote->adjustment;
if(isset($singleDataNote->other)) $other = $singleDataNote->other;
if(isset($singleDataNote->petitioner_name)) $petitioner_name = $singleDataNote->petitioner_name;
if(isset($singleDataNote->petitioner_date_of_birth)) $petitioner_date_of_birth = $singleDataNote->petitioner_date_of_birth;
if(isset($singleDataNote->petitioner_address)) $petitioner_address = $singleDataNote->petitioner_address;
if(isset($singleDataNote->petitioner_telephone)) $petitioner_telephone = $singleDataNote->petitioner_telephone;
if(isset($singleDataNote->petitioner_legal_status)) $petitioner_legal_status = $singleDataNote->petitioner_legal_status;
if(isset($singleDataNote->petitioner_civil_status)) $petitioner_civil_status = $singleDataNote->petitioner_civil_status;
if(isset($singleDataNote->petitioner_how_many_childreen)) $petitioner_how_many_childreen = $singleDataNote->petitioner_how_many_childreen;
if(isset($singleDataNote->applicant_name)) $applicant_name = $singleDataNote->applicant_name;
if(isset($singleDataNote->applicant_date_of_birth)) $applicant_date_of_birth = $singleDataNote->applicant_date_of_birth;
if(isset($singleDataNote->applicant_address)) $applicant_address = $singleDataNote->applicant_address;
if(isset($singleDataNote->applicant_telephone)) $applicant_telephone = $singleDataNote->applicant_telephone;
if(isset($singleDataNote->applicant_legal_status)) $applicant_legal_status = $singleDataNote->applicant_legal_status;
if(isset($singleDataNote->applicant_civil_status)) $applicant_civil_status = $singleDataNote->applicant_civil_status;
if(isset($singleDataNote->applicant_how_many_times_married)) $applicant_how_many_times_married = $singleDataNote->applicant_how_many_times_married;
if(isset($singleDataNote->applicant_how_many_childreen)) $applicant_how_many_childreen = $singleDataNote->applicant_how_many_childreen;
if(isset($singleDataNote->applicant_when_enter_us)) $applicant_when_enter_us = $singleDataNote->applicant_when_enter_us;
if(isset($singleDataNote->applicant_how_enter)) $applicant_how_enter = $singleDataNote->applicant_how_enter;
if(isset($singleDataNote->applicant_any_deportation)) $applicant_any_deportation = $singleDataNote->applicant_any_deportation;
if(isset($singleDataNote->applicant_any_prior_petition)) $applicant_any_prior_petition = $singleDataNote->applicant_any_prior_petition;
if(isset($singleDataNote->applicant_who_filed)) $applicant_who_filed = $singleDataNote->applicant_who_filed;
if(isset($singleDataNote->applicant_arrest)) $applicant_arrest = $singleDataNote->applicant_arrest;
if(isset($singleDataNote->petitioner_a_number)) $petitioner_a_number = $singleDataNote->petitioner_a_number;
if(isset($singleDataNote->petitioner_social_security)) $petitioner_social_security = $singleDataNote->petitioner_social_security;
if(isset($singleDataNote->petitioner_city_country_birth)) $petitioner_city_country_birth = $singleDataNote->petitioner_city_country_birth;
if(isset($singleDataNote->petitioner_address_street)) $petitioner_address_street = $singleDataNote->petitioner_address_street;
if(isset($singleDataNote->petitioner_address_city)) $petitioner_address_city = $singleDataNote->petitioner_address_city;
if(isset($singleDataNote->petitioner_address_state)) $petitioner_address_state = $singleDataNote->petitioner_address_state;
if(isset($singleDataNote->petitioner_address_zip)) $petitioner_address_zip = $singleDataNote->petitioner_address_zip;
if(isset($singleDataNote->petitioner_address_dates)) $petitioner_address_dates = $singleDataNote->petitioner_address_dates;
if(isset($singleDataNote->petitioner_other_name_used)) $petitioner_other_name_used = $singleDataNote->petitioner_other_name_used;
if(isset($singleDataNote->petitioner_height)) $petitioner_height = $singleDataNote->petitioner_height;
if(isset($singleDataNote->petitioner_weight)) $petitioner_weight = $singleDataNote->petitioner_weight;
if(isset($singleDataNote->petitioner_eyes)) $petitioner_eyes = $singleDataNote->petitioner_eyes;
if(isset($singleDataNote->petitioner_hair)) $petitioner_hair = $singleDataNote->petitioner_hair;
if(isset($singleDataNote->petitioned_before)) $petitioned_before = $singleDataNote->petitioned_before;
if(isset($singleDataNote->petitioner_client_name)) $petitioner_client_name = $singleDataNote->petitioner_client_name;
if(isset($singleDataNote->petitioner_client_date_place_filed)) $petitioner_client_date_place_filed = $singleDataNote->petitioner_client_date_place_filed;
if(isset($singleDataNote->petitioner_result_of_the_case)) $petitioner_result_of_the_case = $singleDataNote->petitioner_result_of_the_case;
if(isset($singleDataNote->petitioner_current_spouse_name)) $petitioner_current_spouse_name = $singleDataNote->petitioner_current_spouse_name;
if(isset($singleDataNote->petitioner_current_spouse_date_marriage)) $petitioner_current_spouse_date_marriage = $singleDataNote->petitioner_current_spouse_date_marriage;
if(isset($singleDataNote->petitioner_current_spouse_date_birth)) $petitioner_current_spouse_date_birth = $singleDataNote->petitioner_current_spouse_date_birth;
if(isset($singleDataNote->petitioner_spouse_city_state_province_mariage)) $petitioner_spouse_city_state_province_mariage = $singleDataNote->petitioner_spouse_city_state_province_mariage;
if(isset($singleDataNote->petitioner_spouse_country_of_mariage)) $petitioner_spouse_country_of_mariage = $singleDataNote->petitioner_spouse_country_of_mariage;
if(isset($singleDataNote->petitioner_prior_spouse_name)) $petitioner_prior_spouse_name = $singleDataNote->petitioner_prior_spouse_name;
if(isset($singleDataNote->petitioner_prior_spouse_date_of_marriage)) $petitioner_prior_spouse_date_of_marriage = $singleDataNote->petitioner_prior_spouse_date_of_marriage;
if(isset($singleDataNote->petitioner_prior_spouse_date_of_marriage_ended)) $petitioner_prior_spouse_date_of_marriage_ended = $singleDataNote->petitioner_prior_spouse_date_of_marriage_ended;
if(isset($singleDataNote->petitioner_parent1_name)) $petitioner_parent1_name = $singleDataNote->petitioner_parent1_name;
if(isset($singleDataNote->petitioner_parent1_birth_date)) $petitioner_parent1_birth_date = $singleDataNote->petitioner_parent1_birth_date;
if(isset($singleDataNote->petitioner_parent1_pob)) $petitioner_parent1_pob = $singleDataNote->petitioner_parent1_pob;
if(isset($singleDataNote->petitioner_parent1_country_residence)) $petitioner_parent1_country_residence = $singleDataNote->petitioner_parent1_country_residence;
if(isset($singleDataNote->petitioner_parent2_name)) $petitioner_parent2_name = $singleDataNote->petitioner_parent2_name;
if(isset($singleDataNote->petitioner_parent2_birth_date)) $petitioner_parent2_birth_date = $singleDataNote->petitioner_parent2_birth_date;
if(isset($singleDataNote->petitioner_parent2_pob)) $petitioner_parent2_pob = $singleDataNote->petitioner_parent2_pob;
if(isset($singleDataNote->petitioner_parent2_country_residence)) $petitioner_parent2_country_residence = $singleDataNote->petitioner_parent2_country_residence;
if(isset($singleDataNote->petition_gain_residence_via_mariage)) $petition_gain_residence_via_mariage = $singleDataNote->petition_gain_residence_via_mariage;
if(isset($singleDataNote->petitioner_where_they_admited)) $petitioner_where_they_admited = $singleDataNote->petitioner_where_they_admited;
if(isset($singleDataNote->desctibe_relationship)) $desctibe_relationship = $singleDataNote->desctibe_relationship;
if(isset($singleDataNote->employee_company)) $employee_company = $singleDataNote->employee_company;
if(isset($singleDataNote->employee_phone)) $employee_phone = $singleDataNote->employee_phone;
if(isset($singleDataNote->employee_dates)) $employee_dates = $singleDataNote->employee_dates;
if(isset($singleDataNote->benificiary_other_name_used)) $benificiary_other_name_used = $singleDataNote->benificiary_other_name_used;
if(isset($singleDataNote->benificiary_height)) $benificiary_height = $singleDataNote->benificiary_height;
if(isset($singleDataNote->benificiary_weight)) $benificiary_weight = $singleDataNote->benificiary_weight;
if(isset($singleDataNote->benificiary_eyes)) $benificiary_eyes = $singleDataNote->benificiary_eyes;
if(isset($singleDataNote->benificiary_hair)) $benificiary_hair = $singleDataNote->benificiary_hair;
if(isset($singleDataNote->benificiary_current_spouse_name)) $benificiary_current_spouse_name = $singleDataNote->benificiary_current_spouse_name;
if(isset($singleDataNote->benificiary_current_spouse_date_marriage)) $benificiary_current_spouse_date_marriage = $singleDataNote->benificiary_current_spouse_date_marriage;
if(isset($singleDataNote->benificiary_spouse_city_state_province_mariage)) $benificiary_spouse_city_state_province_mariage = $singleDataNote->benificiary_spouse_city_state_province_mariage;
if(isset($singleDataNote->benificiary_spouse_country_of_mariage)) $benificiary_spouse_country_of_mariage = $singleDataNote->benificiary_spouse_country_of_mariage;
if(isset($singleDataNote->benificiary_prior_spouse_name)) $benificiary_prior_spouse_name = $singleDataNote->benificiary_prior_spouse_name;
if(isset($singleDataNote->benificiary_prior_spouse_date_marriage)) $benificiary_prior_spouse_date_marriage = $singleDataNote->benificiary_prior_spouse_date_marriage;
if(isset($singleDataNote->benificiary_prior_spouse_date_marriage_ended)) $benificiary_prior_spouse_date_marriage_ended = $singleDataNote->benificiary_prior_spouse_date_marriage_ended;
if(isset($singleDataNote->benificiary_where_live_together)) $benificiary_where_live_together = $singleDataNote->benificiary_where_live_together;
if(isset($singleDataNote->beneficiary_address_street)) $beneficiary_address_street = $singleDataNote->beneficiary_address_street;
if(isset($singleDataNote->beneficiary_address_city)) $beneficiary_address_city = $singleDataNote->beneficiary_address_city;
if(isset($singleDataNote->beneficiary_address_state)) $beneficiary_address_state = $singleDataNote->beneficiary_address_state;
if(isset($singleDataNote->beneficiary_address_zip)) $beneficiary_address_zip = $singleDataNote->beneficiary_address_zip;
if(isset($singleDataNote->beneficiary_address_dates)) $beneficiary_address_dates = $singleDataNote->beneficiary_address_dates;
if(isset($singleDataNote->benificiary_last_physical_address_outside_us)) $benificiary_last_physical_address_outside_us = $singleDataNote->benificiary_last_physical_address_outside_us;
if(isset($singleDataNote->benificiary_address_date_from)) $benificiary_address_date_from = $singleDataNote->benificiary_address_date_from;
if(isset($singleDataNote->benificiary_address_date_to)) $benificiary_address_date_to = $singleDataNote->benificiary_address_date_to;
if(isset($singleDataNote->benificiary_last_job_outside_us)) $benificiary_last_job_outside_us = $singleDataNote->benificiary_last_job_outside_us;
if(isset($singleDataNote->benificiary_last_job_date_from)) $benificiary_last_job_date_from = $singleDataNote->benificiary_last_job_date_from;
if(isset($singleDataNote->benificiary_last_job_date_to)) $benificiary_last_job_date_to = $singleDataNote->benificiary_last_job_date_to;
if(isset($singleDataNote->benificiary_job_name)) $benificiary_job_name = $singleDataNote->benificiary_job_name;
if(isset($singleDataNote->benificiary_job_address)) $benificiary_job_address = $singleDataNote->benificiary_job_address;
if(isset($singleDataNote->benificiary_job_occupation)) $benificiary_job_occupation = $singleDataNote->benificiary_job_occupation;
if(isset($singleDataNote->beneficiary_parent1_date_of_birth)) $beneficiary_parent1_date_of_birth = $singleDataNote->beneficiary_parent1_date_of_birth;
if(isset($singleDataNote->beneficiary_parent1_pob)) $beneficiary_parent1_pob = $singleDataNote->beneficiary_parent1_pob;
if(isset($singleDataNote->beneficiary_parent1_country_resident)) $beneficiary_parent1_country_resident = $singleDataNote->beneficiary_parent1_country_resident;
if(isset($singleDataNote->beneficiary_parent2_name)) $beneficiary_parent2_name = $singleDataNote->beneficiary_parent2_name;
if(isset($singleDataNote->beneficiary_parent2_date_of_birth)) $beneficiary_parent2_date_of_birth = $singleDataNote->beneficiary_parent2_date_of_birth;
if(isset($singleDataNote->beneficiary_parent2_pob)) $beneficiary_parent2_pob = $singleDataNote->beneficiary_parent2_pob;
if(isset($singleDataNote->beneficiary_parent2_country_resident)) $beneficiary_parent2_country_resident = $singleDataNote->beneficiary_parent2_country_resident;
if(isset($singleDataNote->beneficiary_pasport_number)) $beneficiary_pasport_number = $singleDataNote->beneficiary_pasport_number;
if(isset($singleDataNote->beneficiary_pasport_expiry_date)) $beneficiary_pasport_expiry_date = $singleDataNote->beneficiary_pasport_expiry_date;
if(isset($singleDataNote->bebeficiary_ever_denied)) $bebeficiary_ever_denied = $singleDataNote->bebeficiary_ever_denied;
if(isset($singleDataNote->bebeficiary_ever_denied_visa)) $bebeficiary_ever_denied_visa = $singleDataNote->bebeficiary_ever_denied_visa;
if(isset($singleDataNote->bebeficiary_when_applyed_tourist_visa)) $bebeficiary_when_applyed_tourist_visa = $singleDataNote->bebeficiary_when_applyed_tourist_visa;
if(isset($singleDataNote->bebeficiary_tell_where_working)) $bebeficiary_tell_where_working = $singleDataNote->bebeficiary_tell_where_working;
if(isset($singleDataNote->bebeficiary_did_tell_last_entry)) $bebeficiary_did_tell_last_entry = $singleDataNote->bebeficiary_did_tell_last_entry;
if(isset($singleDataNote->applicant_enter_illegally)) $applicant_enter_illegally = $singleDataNote->applicant_enter_illegally;
if(isset($singleDataNote->applicant_have_any_problems)) $applicant_have_any_problems = $singleDataNote->applicant_have_any_problems;
if(isset($singleDataNote->applicant_have_been_arrested)) $applicant_have_been_arrested = $singleDataNote->applicant_have_been_arrested;
if(isset($singleDataNote->applicant_comply_with)) $applicant_comply_with = $singleDataNote->applicant_comply_with;
if(isset($singleDataNote->did_been_commit_fraud)) $did_been_commit_fraud = $singleDataNote->did_been_commit_fraud;
if(isset($singleDataNote->did_apply_with_waiver)) $did_apply_with_waiver = $singleDataNote->did_apply_with_waiver;
if(isset($singleDataNote->certification)) $certification = $singleDataNote->certification;
if(isset($singleDataNote->new_york)) $new_york = $singleDataNote->new_york;
if(isset($singleDataNote->yo_certificato)) $yo_certificato = $singleDataNote->yo_certificato;
if(isset($singleDataNote->contract_marriage)) $contract_marriage = $singleDataNote->contract_marriage;
if(isset($singleDataNote->we_live_together)) $we_live_together = $singleDataNote->we_live_together;
if(isset($singleDataNote->we_live_address)) $we_live_address = $singleDataNote->we_live_address;
if(isset($singleDataNote->person_1_field_1)) $person_1_field_1 = $singleDataNote->person_1_field_1;
if(isset($singleDataNote->person_2_field_1)) $person_2_field_1 = $singleDataNote->person_2_field_1;
if(isset($singleDataNote->new_york_2)) $new_york_2 = $singleDataNote->new_york_2;
if(isset($singleDataNote->i_certificato)) $i_certificato = $singleDataNote->i_certificato;
if(isset($singleDataNote->entered_marriage_with)) $entered_marriage_with = $singleDataNote->entered_marriage_with;
if(isset($singleDataNote->we_live_together_at)) $we_live_together_at = $singleDataNote->we_live_together_at;
if(isset($singleDataNote->we_live_together_address)) $we_live_together_address = $singleDataNote->we_live_together_address;
if(isset($singleDataNote->person_1_field_2)) $person_1_field_2 = $singleDataNote->person_1_field_2;
if(isset($singleDataNote->person_2_field_2)) $person_2_field_2 = $singleDataNote->person_2_field_2;
if(isset($singleDataNote->tax_year)) $tax_year = $singleDataNote->tax_year;
if(isset($singleDataNote->total_income)) $total_income = $singleDataNote->total_income;
if(isset($singleDataNote->tax_amount)) $tax_amount = $singleDataNote->tax_amount;
if(isset($singleDataNote->applicant_working)) $applicant_working = $singleDataNote->applicant_working;
if(isset($singleDataNote->on_the_book)) $on_the_book = $singleDataNote->on_the_book;
if(isset($singleDataNote->does_person_tax_id)) $does_person_tax_id = $singleDataNote->does_person_tax_id;
if(isset($singleDataNote->applicant_entered_with_j1)) $applicant_entered_with_j1 = $singleDataNote->applicant_entered_with_j1;
if(isset($singleDataNote->applicant_nationality)) $applicant_nationality = $singleDataNote->applicant_nationality;
if(isset($singleDataNote->applicant_was_from)) $applicant_was_from = $singleDataNote->applicant_was_from;
if(isset($singleDataNote->applicant_was_to)) $applicant_was_to = $singleDataNote->applicant_was_to;
if(isset($singleDataNote->certify_name)) $certify_name = $singleDataNote->certify_name;
if(isset($singleDataNote->fetcha)) $fetcha = $singleDataNote->fetcha;
if(isset($singleDataNote->benificiary_never_live)) $benificiary_never_live = $singleDataNote->benificiary_never_live;
if(isset($singleDataNote->did_they_work_last_5year)) $did_they_work_last_5year = $singleDataNote->did_they_work_last_5year;
if(isset($singleDataNote->if_yes_did_the_file_tax)) $if_yes_did_the_file_tax = $singleDataNote->if_yes_did_the_file_tax;
if(isset($singleDataNote->what_did_they_put_ds160)) $what_did_they_put_ds160 = $singleDataNote->what_did_they_put_ds160;
if(isset($singleDataNote->did_they_live_usa_illegal)) $did_they_live_usa_illegal = $singleDataNote->did_they_live_usa_illegal;
if(isset($singleDataNote->have_them_write_story)) $have_them_write_story = $singleDataNote->have_them_write_story;
if(isset($singleDataNote->was_visa_denied)) $was_visa_denied = $singleDataNote->was_visa_denied;
if(isset($singleDataNote->were_they_denied_entry_usa)) $were_they_denied_entry_usa = $singleDataNote->were_they_denied_entry_usa;
if(isset($singleDataNote->was_immigrant_ever_denied)) $was_immigrant_ever_denied = $singleDataNote->was_immigrant_ever_denied;




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
        </style>
        <title>INTAKE FOR PET</title>
    </head>
    <body>
        <div class="container" style="padding: 20px;">
            <h1></h1>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <form id="registration_form" class="form-horizontal" action="#"  method="post" enctype="multipart/form-data">
                 <input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		         <input type="hidden" name="client_id" value="<?php echo $clientId?>" />
                <fieldset>
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 1 : INTAKE FOR PET</h2>
                    <br />
                    <div class="text-center bg-info">
                        <h4>TYPE OF PROCESS :- </h4> 
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petition">PETITION :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petition" id="petition" value="<?php echo $petition?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="adjustment">ADJUSTMENT :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="adjustment" id="adjustment" value="<?php echo $adjustment?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="other">OTHER :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="other" id="other" value="<?php echo $other?>"/>
                        </div>
                    </div>
                    <div class="text-center bg-info">
                        PETITIONER :- 
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_name" value="<?php echo $petitioner_name?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_date_of_birth">DOB :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_date_of_birth" value="<?php echo $petitioner_date_of_birth?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_address">ADDRESS :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_address" value="<?php echo $petitioner_address?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_telephone">TELEPHONE # :</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="petitioner_telephone" value="<?php echo $petitioner_telephone?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_legal_status">LEGAL STATUS :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_legal_status" value="<?php echo $petitioner_legal_status?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_civil_status">CIVIL STATUS(CURRENT) :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_civil_status" value="<?php echo $petitioner_civil_status?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_how_many_times_married">HOW MANY TIMES MARRIED? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_how_many_times_married" value="<?php echo $petitioner_civil_status?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_how_many_childreen">HOW MANY CHILDREN AND WHO ARE THEY? :</label>
                        <div class="col-md-5">
                            <textarea name="petitioner_how_many_childreen" cols="60" rows="4"><?php echo $petitioner_how_many_childreen?></textarea>
                        </div>
                    </div>

                    <div class="text-center bg-info">
                       <h4> BENEFICIARY/APPLICANT :- </h4> 
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_name" value="<?php echo $applicant_name?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_date_of_birth">DOB :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="applicant_date_of_birth" value="<?php echo $applicant_date_of_birth?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_address">ADDRESS :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_address" value="<?php echo $applicant_address?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_telephone">TELEPHONE # :</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="applicant_telephone" value="<?php echo $applicant_telephone?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_legal_status">LEGAL STATUS :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_legal_status" value="<?php echo $applicant_legal_status?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_civil_status">CIVIL STATUS(CURRENT) :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_civil_status" value="<?php echo $applicant_civil_status?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_how_many_times_married">HOW MANY TIMES MARRIED? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_how_many_times_married" value="<?php echo $applicant_how_many_times_married?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_how_many_childreen"> HOW MANY CHILDREN AND WHO ARE THEY? :</label>
                        <div class="col-md-5">
                            <textarea name="applicant_how_many_childreen" cols="60" rows="4"><?php echo $applicant_how_many_childreen?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_when_enter_us">WHEN DID BENEFICIARY/APPLICANT ENTER U.S.? :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="applicant_when_enter_us" value="<?php echo $applicant_when_enter_us?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_how_enter">HOW? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_how_enter" value="<?php echo $applicant_how_enter?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_any_deportation">ANY DEPORTATION PROCEEDINGS ? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_any_deportation" value="yes" <?php echo ($applicant_any_deportation=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_any_deportation" value="no"  <?php echo ($applicant_any_deportation=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_any_prior_petition"> ANY PRIOR PETITIONS? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_any_prior_petition" value="yes" <?php echo ($applicant_any_prior_petition=="yes") ? "checked" : " "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_any_prior_petition" value="no"  <?php echo ($applicant_any_prior_petition=="no") ? "checked" : " "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_who_filed">WHO FILED AND WHEN? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="applicant_who_filed" value="<?php echo $applicant_who_filed?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_arrest"> ARREST? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_arrest" value="yes"<?php echo ($applicant_arrest=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_arrest" value="no" <?php echo ($applicant_arrest=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>

                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset>

                <fieldset>
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 2: INTAKE FOR PET.</h2>
                    <br />

                    <div class="text-center bg-info">
                       <h4> PETITIONER :- </h4> 
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_a_number">A- NUMBER : </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_a_number" value="<?php echo $petitioner_a_number?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_social_security">SOCIAL SECURITY NUMBER :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_social_security" value="<?php echo $petitioner_social_security?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_city_country_birth">CITY AND COUNTRY OF BIRTH :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_city_country_birth" value="<?php echo $petitioner_city_country_birth?>" />
                        </div>
                    </div>
                    <div class="text-center bg-info">
                        <h4>ADDRESSES WHERE YOU LIVED IN THE LAST 5 YEARS:</h4>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td><h4>SL#</h4></td>
                                    <td><h4>STREET</h4></td>
                                    <td><h4>CITY</h4></td>
                                    <td><h4>STATE</h4></td>
                                    <td><h4>ZIP CODE</h4></td>
                                    <td><h4>DATES</h4></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input class="form-control" type="text" name="petitioner_address_street[]" value="<?php echo $petitioner_address_street[0]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_city[]" value="<?php echo $petitioner_address_city[0]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_state[]" value="<?php echo $petitioner_address_state[0]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_zip[]" value="<?php echo $petitioner_address_zip[0]?>" /></td>
                                    <td><input class="form-control" type="date" name="petitioner_address_dates[]" value="<?php echo $petitioner_address_dates[0]?>" /></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><input class="form-control" type="text" name="petitioner_address_street[]" value="<?php echo $petitioner_address_street[1]?>"/></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_city[]" value="<?php echo $petitioner_address_city[1]?>"/></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_state[]" value="<?php echo $petitioner_address_state[1]?>"/></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_zip[]" value="<?php echo $petitioner_address_zip[1]?>"/></td>
                                    <td><input class="form-control" type="date" name="petitioner_address_dates[]" value="<?php echo $petitioner_address_dates[1]?>"/></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><input class="form-control" type="text" name="petitioner_address_street[]" value="<?php echo $petitioner_address_street[2]?>"/></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_city[]" value="<?php echo $petitioner_address_city[2]?>"/></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_state[]" value="<?php echo $petitioner_address_state[2]?>"/></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_zip[]" value="<?php echo $petitioner_address_zip[2]?>" /></td>
                                    <td><input class="form-control" type="date" name="petitioner_address_dates[]" value="<?php echo $petitioner_address_dates[2]?>" /></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><input class="form-control" type="text" name="petitioner_address_street[]" value="<?php echo $petitioner_address_street[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_city[]" value="<?php echo $petitioner_address_city[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_state[]" value="<?php echo $petitioner_address_state[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_zip[]" value="<?php echo $petitioner_address_zip[3]?>" /></td>
                                    <td><input class="form-control" type="date" name="petitioner_address_dates[]" value="<?php echo $petitioner_address_dates[3]?>" /></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><input class="form-control" type="text" name="petitioner_address_street[]" value="<?php echo $petitioner_address_street[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_city[]" value="<?php echo $petitioner_address_city[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_state[]" value="<?php echo $petitioner_address_state[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="petitioner_address_zip[]" value="<?php echo $petitioner_address_zip[4]?>"/></td>
                                    <td><input class="form-control" type="date" name="petitioner_address_dates[]" value="<?php echo $petitioner_address_dates[4]?>" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_other_name_used">OTHER NAME USED :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_other_name_used" value="<?php echo $petitioner_other_name_used?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="petitioner_height">HEIGHT :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="petitioner_height" value="<?php echo $petitioner_height?>" />
                        </div>
                        <label class="control-label col-md-3" for="petitioner_weight">WEIGHT :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="petitioner_weight" value="<?php echo $petitioner_weight?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="petitioner_eyes">EYES :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="petitioner_eyes" value="<?php echo $petitioner_eyes?>" />
                        </div>
                        <label class="control-label col-md-3" for="petitioner_hair">HAIR :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="petitioner_hair" value="<?php echo $petitioner_hair?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioned_before">HAVE YOU EVER PETITIONED ANYONE BEFORE? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="petitioned_before" value="yes" <?php echo ($petitioned_before=="yes") ? "checked" : " "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="petitioned_before" value="no" <?php echo ($petitioned_before=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_client_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_client_name" value="<?php echo $petitioner_client_name?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_client_date_place_filed">DATE AND PLACE FILED? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_client_date_place_filed" value="<?php echo $petitioner_client_date_place_filed?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_result_of_the_case">RESULT OF THE CASE? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_result_of_the_case" value="<?php echo $petitioner_result_of_the_case?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="">CURRENT SPOUSE :- </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_current_spouse_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_current_spouse_name" value="<?php echo $petitioner_current_spouse_name?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_current_spouse_date_marriage">DATE OF MARRIAGE? :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_current_spouse_date_marriage" value="<?php echo $petitioner_current_spouse_date_marriage?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_current_spouse_date_birth">DOB? :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_current_spouse_date_birth" value="<?php echo $petitioner_current_spouse_date_birth?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_spouse_city_state_province_mariage">CITY/ STATE/ PROVINCE OF MARRIAGE? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_spouse_city_state_province_mariage" value="<?php echo $petitioner_spouse_city_state_province_mariage?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_spouse_country_of_mariage">COUNTRY OF MARRIAGE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_spouse_country_of_mariage" value="<?php echo $petitioner_spouse_country_of_mariage?>" />
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset>

                <fieldset>
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 2: INTAKE FOR PET(CONTINUED)</h2>
                    <br />

                    <div class="text-center bg-info">
                        <h4> PRIOR SPOUSES :- </h4>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_prior_spouse_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_prior_spouse_name" value="<?php echo $petitioner_prior_spouse_name?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_prior_spouse_date_of_marriage">DATE OF MARRIAGE:</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_prior_spouse_date_of_marriage" value="<?php echo $petitioner_prior_spouse_date_of_marriage?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_prior_spouse_date_of_marriage_ended">DATE OF MARRIAGE ENDED :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_prior_spouse_date_of_marriage_ended" value="<?php echo $petitioner_prior_spouse_date_of_marriage_ended?>" />
                        </div>
                    </div>

                    <div class="text-center bg-info">
                        <h4>PARENT 1 :-</h4> 
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent1_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_parent1_name" value="<?php echo $petitioner_parent1_name?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent1_birth_date">DOB:</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_parent1_birth_date" value="<?php echo $petitioner_parent1_birth_date?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent1_pob">POB(CITY/STATE/PROVINCE/COUNTRY) :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_parent1_pob" value="<?php echo $petitioner_parent1_pob?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent1_country_residence">CITY AND COUNTRY OF RESIDENCE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_parent1_country_residence" value="<?php echo $petitioner_parent1_country_residence?>" />
                        </div>
                    </div>

                    <div class="text-center bg-info">
                       <h4> PARENT 2 :- </h4> 
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent2_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_parent2_name" value="<?php echo $petitioner_parent2_name?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent2_birth_date">DOB:</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="petitioner_parent2_birth_date" value="<?php echo $petitioner_parent2_birth_date?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent2_pob">POB(CITY/STATE/PROVINCE/COUNTRY) :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_parent2_pob" value="<?php echo $petitioner_parent2_pob?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_parent2_country_residence">CITY AND COUNTRY OF RESIDENCE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_parent2_country_residence" value="<?php echo $petitioner_parent2_country_residence?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petition_gain_residence_via_mariage">1A) DID PET GAIN LAWFUL PERMANENT STATUS THROUGH MARRIAGE ? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="petition_gain_residence_via_mariage" value="yes" <?php echo ($petition_gain_residence_via_mariage=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="petition_gain_residence_via_mariage" value="no" <?php echo ($petition_gain_residence_via_mariage=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="petitioner_where_they_admited">1B) WHERE WERE THEY ADMITED AS LPR? EMBASSY USA WHERE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="petitioner_where_they_admited" value="<?php echo $petitioner_where_they_admited?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="desctibe_relationship">IF YOU ARE FILING THIS PETITION FOR YOUR CHILD OR PARENTS SELECT THE BOX THAT DESCRIBES YOUR RELATIONSHIP :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="desctibe_relationship" value="child_was_born" <?php echo ($desctibe_relationship=="child_was_born") ? "checked" : " "?> /> -CHILD WAS BORN TO PARENTS WHO WERE MARRIED TO EACH AT THE TIME OF THE CHILD'S BIRTH </label>

                            <label class="radio-inline"> <input type="radio" name="desctibe_relationship" value="stepchild"  <?php echo ($desctibe_relationship=="stepchild") ? "checked" : " "?>/> STEPHCHIL/STEPPARENT </label>

                            <label class="radio-inline"> <input type="radio" name="desctibe_relationship" value="child_was_parent" <?php echo ($desctibe_relationship=="child_was_parent") ? "checked" : " "?>/> CHILD WA SBORN TO PARENTS WHO WERE NOT MARRIED TO EACH OTHER AT THE TIME OF THE CHILD'S BIRTH </label>

                            <label class="radio-inline"> <input type="radio" name="desctibe_relationship" value="child_was_adopted" <?php echo ($desctibe_relationship=="child_was_adopted") ? "checked" : " "?>/> CHILD WAS ADOPTED (NOT ORPHAN OR HAGUE CONVENTION ADOPTEE) </label>
                        </div>
                    </div>

                    <div class="text-center bg-info">
                        <h3>WORK HISTORY FOR THE LAST 5 YEARS:</h3>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td><h4>SL#</h4></td>
                                    <td><h4>COMPANY</h4></td>
                                    <td><h4>PHONE</h4></td>
                                    <td><h4>DATES</h4></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input class="form-control" type="text" name="employee_company[]" value="<?php echo $employee_company[0]?>" /></td>
                                    <td><input class="form-control" type="text" name="employee_phone[]" value="<?php echo $employee_phone[0]?>" /></td>
                                    <td><input class="form-control" type="date" name="employee_dates[]" value="<?php echo $employee_dates[0]?>" /></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td><input class="form-control" type="text" name="employee_company[]" value="<?php echo $employee_company[1]?>" /></td>
                                    <td><input class="form-control" type="text" name="employee_phone[]" value="<?php echo $employee_phone[1]?>" /></td>
                                    <td><input class="form-control" type="date" name="employee_dates[]" value="<?php echo $employee_dates[1]?>" /></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td><input class="form-control" type="text" name="employee_company[]" value="<?php echo $employee_company[2]?>" /></td>
                                    <td><input class="form-control" type="text" name="employee_phone[]" value="<?php echo $employee_phone[2]?>" /></td>
                                    <td><input class="form-control" type="date" name="employee_dates[]" value="<?php echo $employee_dates[2]?>" /></td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td><input class="form-control" type="text" name="employee_company[]" value="<?php echo $employee_company[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="employee_phone[]" value="<?php echo $employee_phone[3]?>" /></td>
                                    <td><input class="form-control" type="date" name="employee_dates[]" value="<?php echo $employee_dates[3]?>" /></td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td><input class="form-control" type="text" name="employee_company[]" value="<?php echo $employee_company[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="employee_phone[]" value="<?php echo $employee_phone[4]?>" /></td>
                                    <td><input class="form-control" type="date" name="employee_dates[]" value="<?php echo $employee_dates[4]?>" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset>

                <fieldset>
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 2: INTAKE FOR PET(Continued).</h2>
                    <br />
                    <div class="text-center bg-info">
                         <h4>BENEFICIARY/ APPLICANT :- </h4>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_other_name_used">OTHER NAME USED :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_other_name_used" value="<?php echo $benificiary_other_name_used?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="benificiary_height">HEIGHT :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="benificiary_height" value="<?php echo $benificiary_height?>" />
                        </div>
                        <label class="control-label col-md-3" for="benificiary_weight">WEIGHT :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="benificiary_weight" value="<?php echo $benificiary_weight?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="benificiary_eyes">EYES :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="benificiary_eyes" value="<?php echo $benificiary_eyes?>"/>
                        </div>
                        <label class="control-label col-md-3" for="benificiary_hair">HAIR :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="benificiary_hair" value="<?php echo $benificiary_hair?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_current_spouse">CURRENT SPOUSE :- </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_current_spouse_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_current_spouse_name" value="<?php echo $benificiary_current_spouse_name?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_current_spouse_date_marriage">DATE OF MARRIAGE :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_current_spouse_date_marriage" value="<?php echo $benificiary_current_spouse_date_marriage?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_spouse_city_state_province_mariage">CITY/ STATE/ PROVINCE OF MARRIAGE? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_spouse_city_state_province_mariage" value="<?php echo $benificiary_spouse_city_state_province_mariage?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_spouse_country_of_mariage">COUNTRY OF MARRIAGE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_spouse_country_of_mariage" value="<?php echo $benificiary_spouse_country_of_mariage?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_prior_spouse">PRIOR SPOUSE :- </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_prior_spouse_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_prior_spouse_name" value="<?php echo $benificiary_prior_spouse_name?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_prior_spouse_date_marriage">DATE OF MARRIAGE :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_prior_spouse_date_marriage" value="<?php echo $benificiary_prior_spouse_date_marriage?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_prior_spouse_date_marriage_ended">DATE OF MARRIAGE ENDED :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_prior_spouse_date_marriage_ended" value="<?php echo $benificiary_prior_spouse_date_marriage_ended?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_where_live_together">IF FILING FOR YOUR SPOUSE, PROVIDE THE LAST ADDRESS AT WHICH YOU PHYSICALLY LIVED TOGETHER:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_where_live_together" value="<?php echo $benificiary_where_live_together?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5 checkbox-inline" for="benificiary_never_live"><input type="checkbox" name="benificiary_never_live" value="1" <?php echo ($benificiary_never_live=="1" ) ? "checked" : " "?> /> NEVER LIVED TOGETHER</label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for=""> ONLY IF FILING PETITION FOR SPOUSE BENE :- </label>
                    </div>
                    <div class="text-center bg-info">
                        <h4>ADDRESSES WHERE YOU LIVED IN THE LAST 5 YEARS:</h4>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <td><h4>SL#</h4></td>
                                    <td><h4>STREET</h4></td>
                                    <td><h4>CITY</h4></td>
                                    <td><h4>STATE</h4></td>
                                    <td><h4>ZIP CODE</h4></td>
                                    <td><h4>DATES</h4></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_street[]" value="<?php echo $beneficiary_address_street[0]?>"/></td> 
                                    <td><input class="form-control" type="text" name="beneficiary_address_city[]" value="<?php echo $beneficiary_address_city[0]?>"/></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_state[]" value="<?php echo $beneficiary_address_state[0]?>"/></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_zip[]" value="<?php echo $beneficiary_address_zip[0]?>"/></td>
                                    <td><input class="form-control" type="date" name="beneficiary_address_dates[]" value="<?php echo $beneficiary_address_dates[0]?>" /></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_street[]" value="<?php echo $beneficiary_address_street[1]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_city[]" value="<?php echo $beneficiary_address_city[1]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_state[]" value="<?php echo $beneficiary_address_state[1]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_zip[]" value="<?php echo $beneficiary_address_zip[1]?>" /></td>
                                    <td><input class="form-control" type="date" name="beneficiary_address_dates[]" value="<?php echo $beneficiary_address_dates[1]?>" /></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_street[]" value="<?php echo $beneficiary_address_street[2]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_city[]" value="<?php echo $beneficiary_address_city[2]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_state[]" value="<?php echo $beneficiary_address_state[2]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_zip[]" value="<?php echo $beneficiary_address_zip[2]?>" /></td>
                                    <td><input class="form-control" type="date" name="beneficiary_address_dates[]" value="<?php echo $beneficiary_address_dates[2]?>" /></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_street[]" value="<?php echo $beneficiary_address_street[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_city[]" value="<?php echo $beneficiary_address_city[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_state[]" value="<?php echo $beneficiary_address_state[3]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_zip[]" value="<?php echo $beneficiary_address_zip[3]?>" /></td>
                                    <td><input class="form-control" type="date" name="beneficiary_address_dates[]" value="<?php echo $beneficiary_address_dates[3]?>" /></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_street[]" value="<?php echo $beneficiary_address_street[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_city[]" value="<?php echo $beneficiary_address_city[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_state[]" value="<?php echo $beneficiary_address_state[4]?>" /></td>
                                    <td><input class="form-control" type="text" name="beneficiary_address_zip[]" value="<?php echo $beneficiary_address_zip[4]?>" /></td>
                                    <td><input class="form-control" type="date" name="beneficiary_address_dates[]" value="<?php echo $beneficiary_address_dates[4]?>" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_last_physical_address_outside_us"> LAST PHYSICAL ADDRESS OUTSIDE OF THE U.S? :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_last_physical_address_outside_us" value="<?php echo $benificiary_last_physical_address_outside_us?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_address_date_from"> FROM :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_address_date_from" value="<?php echo $benificiary_address_date_from?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_address_date_to"> TO :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_address_date_to" value="<?php echo $benificiary_address_date_to?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_last_job_outside_us"> LAST JOB OUTSIDE OF THE UNITED STATES :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_last_job_outside_us" value="<?php echo $benificiary_last_job_outside_us?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_last_job_date_from"> FROM :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_last_job_date_from" value="<?php echo $benificiary_last_job_date_from?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_last_job_date_to"> TO :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="benificiary_last_job_date_to" value="<?php echo $benificiary_last_job_date_to?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_job_name"> NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_job_name" value="<?php echo $benificiary_job_name?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_job_address"> ADDRESS :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_job_address" value="<?php echo $benificiary_job_address?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="benificiary_job_occupation">OCCUPATION :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="benificiary_job_occupation" value="<?php echo $benificiary_job_occupation?>" />
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset>  <!-- field set 4 end  -->

                <fieldset> <!-- field set 5 -->
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 2: INTAKE FOR PET(Continued).</h2>
                    <br/>
                    <div class="text-center bg-info">
                        <h4>Parent 1 :</h4> 
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent1_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_parent1_name" value="<?php echo $benificiary_job_occupation?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent1_date_of_birth">DOB :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="beneficiary_parent1_date_of_birth" value="<?php echo $beneficiary_parent1_date_of_birth?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent1_pob">POB(CITY/STATE/PROVINCE/COUNTRY) :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_parent1_pob" value="<?php echo $beneficiary_parent1_pob?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent1_country_resident">CITY AND COUNRTY OF RESIDENCE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_parent1_country_resident" value="<?php echo $beneficiary_parent1_country_resident?>" />
                        </div>
                    </div>

                    <div class="text-center bg-info">
                        <h4>Parent 2 : </h4>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent2_name">NAME :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_parent2_name" value="<?php echo $beneficiary_parent2_name?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent2_date_of_birth">DOB :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="beneficiary_parent2_date_of_birth" value="<?php echo $beneficiary_parent2_date_of_birth?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent2_pob">POB(CITY/STATE/PROVINCE/COUNTRY) :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_parent2_pob" value="<?php echo $beneficiary_parent2_pob?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_parent2_country_resident">CITY AND COUNRTY OF RESIDENCE :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_parent2_country_resident" value="<?php echo $beneficiary_parent2_country_resident?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_pasport_number">PASPORT #:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="beneficiary_pasport_number" value="<?php echo $beneficiary_pasport_number?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="beneficiary_pasport_expiry_date">PASSPORT EXPIRATION DATE :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="beneficiary_pasport_expiry_date" value="<?php echo $beneficiary_pasport_expiry_date?>"/>
                        </div>
                    </div>
                    <div class="text-center bg-info">
                        <h4> ADJUSTMENT : </h4> 
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="bebeficiary_ever_denied">HAVE YOU EVER BEEN DENIED ADMISSION TO THE UNITED STATES?:</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_ever_denied" value="yes" <?php echo ($bebeficiary_ever_denied=="yes") ? "checked" : " "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_ever_denied" value="no" <?php echo ($bebeficiary_ever_denied=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="bebeficiary_ever_denied_visa">HAVE YOU EVER BEEN REFUSED/ DENIED A VISA:</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_ever_denied_visa" value="yes" <?php echo ($bebeficiary_ever_denied_visa=="yes") ? "checked" : " "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_ever_denied_visa" value="no" <?php echo ($bebeficiary_ever_denied_visa=="no") ? "checked" : " "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="bebeficiary_when_applyed_tourist_visa">WHEN YOU APPLIED FOR YOUR TOURIST VISA, DO YOU REMEMBER EVEALING THE TRUTH?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_when_applyed_tourist_visa" value="yes" <?php echo ($bebeficiary_when_applyed_tourist_visa=="yes") ? "checked" : " "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_when_applyed_tourist_visa" value="no" <?php echo ($bebeficiary_when_applyed_tourist_visa=="no") ? "checked" : " "?> /> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="bebeficiary_tell_where_working">DID YOU TELL THE EMBASSY WHERE YOU WERE WORKING/ STUDYING?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_tell_where_working" value="yes" <?php echo ($bebeficiary_tell_where_working=="yes") ? "checked" : " "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_tell_where_working" value="no" <?php echo ($bebeficiary_tell_where_working=="no") ? "checked" : " "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="bebeficiary_did_tell_last_entry">WHEN LAST ENTERED, DID YOU TELL CUSTOMS THE TRUTH?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_did_tell_last_entry" value="yes" <?php echo ($bebeficiary_did_tell_last_entry=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="bebeficiary_did_tell_last_entry" value="no" <?php echo ($bebeficiary_did_tell_last_entry=="no") ? "checked" : " "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_enter_illegally">DID APPLICANT EVER ENTER THE U.S ILLEGALLY BEFORE LAST ENTRY?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_enter_illegally" value="yes" <?php echo ($applicant_enter_illegally=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_enter_illegally" value="no" <?php echo ($applicant_enter_illegally=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_have_any_problems"> DID APPLICANT HAVE ANY PROBLEMS WITH ALCOHOL, GAMBLING, PROSTITUTION OR DRUGS?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_have_any_problems" value="yes" <?php echo ($applicant_have_any_problems=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_have_any_problems" value="no" <?php echo ($applicant_have_any_problems=="no") ? "checked" : " "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_have_been_arrested">HAS APPLICANT EVER BEEN ARRESTED?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_have_been_arrested" value="yes" <?php echo ($applicant_have_been_arrested=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_have_been_arrested" value="no" <?php echo ($applicant_have_been_arrested=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_comply_with">IF SO, DID APPLICANT COMPLY WITH :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_comply_with" value="probation" <?php echo ($applicant_comply_with=="probation") ? "checked" : " "?>/> PROBATION </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_comply_with" value="parole" <?php echo ($applicant_comply_with=="parole") ? "checked" : " "?> /> PAROLE </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_comply_with" value="reha" <?php echo ($applicant_comply_with=="reha") ? "checked" : " "?>/> REHA </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_comply_with" value="class" <?php echo ($applicant_comply_with=="class") ? "checked" : " "?>/> CLASS </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_comply_with" value="community" <?php echo ($applicant_comply_with=="community") ? "checked" : " "?>/> COMMUNITY SERVICE </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="did_been_commit_fraud"> DID BENE COMMIT FRAUD? WITH EMBASSY OR CBP?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="did_been_commit_fraud" value="yes" <?php echo ($did_been_commit_fraud=="yes") ? "checked" : " "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="did_been_commit_fraud" value="no" <?php echo ($did_been_commit_fraud=="no") ? "checked" : " "?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="did_apply_with_waiver"> DID THIS PERSON APPLY WITH WAIVER ?: </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="did_apply_with_waiver" value="601A" <?php echo ($did_apply_with_waiver=="601A") ? "checked" : " "?>/> 601A </label>
                            <label class="radio-inline"> <input type="radio" name="did_apply_with_waiver" value="601" <?php echo ($did_apply_with_waiver=="601") ? "checked" : " "?>/> 601 </label>
                            <label class="radio-inline"> <input type="radio" name="did_apply_with_waiver" value="212" <?php echo ($did_apply_with_waiver=="212") ? "checked" : " "?> /> 212 </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <label class="checkbox-inline"> <input type="checkbox" name="certification" value="yes" <?php echo ($certification=="yes") ? "checked" : " "?> />Yo certifico que esta informacion esta correcta y verdadera. </label>
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset> <!-- field set 5 end -->

                <fieldset>  <!-- field set 6 start -->
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 3: INTAKE FOR PET.</h2>
                    <br />

                    <div class="form-group">
                        <label class="control-label col-md-5" for="new_york">New York, </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="new_york"  value="<?php echo $new_york?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="yo_certificato">Yo, </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="yo_certificato" value="<?php echo $yo_certificato?>"/>
                        </div>
                        <p> 
                            <h4>,  certifico que :</h4>
                        </p>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="contract_marriage">entre en buena fe al matrimonic contraido con : </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="contract_marriage"  value="<?php echo $contract_marriage?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="we_live_together"> vivimos juntos en la: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="we_live_together" value="<?php echo $we_live_together?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="we_live_address">vivimos juntos en dicha direccion desde_: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="we_live_address"  value="<?php echo $we_live_address?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-8 col-md-offset-1" for="we_live_address">
                            CERTIFICAMOS QUE ENTRAMOS A ESTE MATRIMONIC EN BUENA FE, QUE NOSOTROS NOS AMAMOS Y QUE ESTA RELACION ES UNA RELACION GENUINA.
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="person_1_field_1">X </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="person_1_field_1" value="<?php echo $person_1_field_1?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="person_2_field_1">X </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="person_2_field_1"  value="<?php echo $person_2_field_1?>" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-5" for="new_york_2">New York, </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="new_york_2" value="<?php echo $new_york_2?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="i_certificato">I , </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="i_certificato"  value="<?php echo $i_certificato?>" />
                        </div>
                        <p> <h4>, certify that :</h4></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="entered_marriage_with">I entered in good faith into marriage with : </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="entered_marriage_with" value="<?php echo $entered_marriage_with?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="we_live_together_at">we live together at _ : </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="we_live_together_at" value="<?php echo $we_live_together_at?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="we_live_together_address"> we live together in said address since_ :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="we_live_together_address" value="<?php echo $we_live_together_address?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-8 col-md-offset-1" for="we_live_address">
                            WE CERTFTY THAT WE ENTERED INTO THIS MARRIAGE IN GOOD FAITH, THAT WE LOVE EACH OTHER, AND THAT THIS RELATIONSHIP IS A GENUINE ONE.
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="person_1_field_2">X </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="person_1_field_2" value="<?php echo $person_1_field_2?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="person_2_field_2">X </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="person_2_field_2" value="<?php echo $person_2_field_2?>"/>
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset>

                <fieldset>
                    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
                    <h2>PART 4: INTAKE FOR PET.</h2>
                    <br />
                    <div class="form-group">
                        <div class="text-center bg-info">
                            <h4>Extra questions- questionnaire intake form</h4>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" for="person_2_field_2"> List here the year of taxes filed by individual : </label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>SL#</td>
                                        <td>TAX YEAR</td>
                                        <td>TOTAL INCOME</td>
                                        <td>TAX AMOUNT</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" name="tax_year[]" value="<?php echo $tax_year[0]?>"/></td>
                                        <td><input type="text" class="form-control" name="total_income[]" value="<?php echo $total_income[0]?>"/></td>
                                        <td><input type="text" class="form-control" name="tax_amount[]" value="<?php echo $tax_amount[0]?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="text" class="form-control" name="tax_year[]" value="<?php echo $tax_year[1]?>"/></td>
                                        <td><input type="text" class="form-control" name="total_income[]" value="<?php echo $total_income[1]?>"/></td>
                                        <td><input type="text" class="form-control" name="tax_amount[]" value="<?php echo $tax_amount[1]?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><input type="text" class="form-control" name="tax_year[]" value="<?php echo $tax_year[2]?>"/></td>
                                        <td><input type="text" class="form-control" name="total_income[]" value="<?php echo $total_income[2]?>"/></td>
                                        <td><input type="text" class="form-control" name="tax_amount[]" value="<?php echo $tax_amount[2]?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><input type="text" class="form-control" name="tax_year[]" value="<?php echo $tax_year[3]?>"/></td>
                                        <td><input type="text" class="form-control" name="total_income[]" value="<?php echo $total_income[3]?>"/></td>
                                        <td><input type="text" class="form-control" name="tax_amount[]" value="<?php echo $tax_amount[3]?>"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_working"> is applicant/ bene working at the moment? </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_working" value="yes" <?php echo ($applicant_working=="yes") ? "checked" : " " ?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_working" value="No" <?php echo ($applicant_working=="no") ? "checked" : " " ?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="on_the_book"> On the books?</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="on_the_book" value="yes" <?php echo ($on_the_book=="yes") ? "checked" : " " ?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="on_the_book" value="no" <?php echo ($on_the_book=="no") ? "checked" : " " ?> /> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="does_person_tax_id"> Does person have ITIN, tax ID? </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="does_person_tax_id" value="yes"  <?php echo ($does_person_tax_id=="yes") ? "checked" : " " ?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="does_person_tax_id" value="no" <?php echo ($does_person_tax_id=="no") ? "checked" : " " ?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="applicant_entered_with_j1"> Did applicant ever enter USA with a J1 visa? </label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="applicant_entered_with_j1" value="yes"<?php echo ($applicant_entered_with_j1=="yes") ? "checked" : " " ?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="applicant_entered_with_j1" value="no" <?php echo ($applicant_entered_with_j1=="no") ? "checked" : " " ?> /> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6" for="nationalities"> All nationalites held by applicant, please mention here : </label>
                    </div>
                    <div class="form-group" id="nationality">
                        <label class="control-label col-md-5" for="applicant_nationality"> NATIONALITY :</label>
                        <div class="col-md-4">
                            <textarea name="applicant_nationality" cols="55" rows="2"><?php echo $applicant_nationality?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6" for="applicant_was_here">Write here the dates applicant was here in their entire life : </label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>SL#</td>
                                        <td>From</td>
                                        <td>TO</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trip#1</td>
                                        <td><input type="date" class="form-control" name="applicant_was_from[]" value="<?php echo $applicant_was_from[0]?>"/></td>
                                        <td><input type="date" class="form-control" name="applicant_was_to[]" value="<?php echo $applicant_was_to[0]?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Trip#2</td>
                                        <td><input type="date" class="form-control" name="applicant_was_from[]" value="<?php echo $applicant_was_from[1]?>"/></td>
                                        <td><input type="date" class="form-control" name="applicant_was_to[]" value="<?php echo $applicant_was_to[1]?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Trip#3</td>
                                        <td><input type="date" class="form-control" name="applicant_was_from[]" value="<?php echo $applicant_was_from[2]?>"/></td>
                                        <td><input type="date" class="form-control" name="applicant_was_to[]" value="<?php echo $applicant_was_to[2]?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Trip#4</td>
                                        <td><input type="date" class="form-control" name="applicant_was_from[]" value="<?php echo $applicant_was_from[3]?>"/></td>
                                        <td><input type="date" class="form-control" name="applicant_was_to[]" value="<?php echo $applicant_was_to[3]?>"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label class="control-label col-md-8 col-md-offset-2" for="applicant_was_here">
                            Tuvo servicio comunitario por algun arresto? O alguna probatoria? O parole? O orden de proteccion en contra de dicho bene? - arrests resulted in comunity service, probation, parole, order of protection
                        </label>
                    </div>
                    <br />
                    <div class="form-group text-left">
                        <label class="control-label col-md-8 col-md-offset-2" for="applicant_was_here">
                            Al firmar este documento estoy certificando que entendi las preguntas que me han hecho en este formato y tambien en los otros formatos los cuales he verificado la informacion mia y veo toda la informacion
                            correcamente escrita aqui y en los demas documentos de notas legales hechas en la oficina de la DRA Maria Barnett, MAB LAW
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="certify_name"> X :</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="certify_name" value="<?php echo $certify_name?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="fecha">fecha :</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="fetcha" value="<?php echo $fetcha?>" />
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float: right;" />
                </fieldset>

                <fieldset>
                    <h2>PART 5: INTAKE FOR PET.</h2>
                    <br/>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="did_they_work_last_5year"> 1. Did they work for the last 5 years? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="did_they_work_last_5year" value="yes" <?php echo ($did_they_work_last_5year=="yes") ? "checked":" "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="did_they_work_last_5year" value="no"  <?php echo ($did_they_work_last_5year=="no") ? "checked":" "?> /> No </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-5" for="if_yes_did_the_file_tax"> If Yes - did they file taxes? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="if_yes_did_the_file_tax" value="yes" <?php echo ($if_yes_did_the_file_tax=="yes") ? "checked":" "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="if_yes_did_the_file_tax" value="no" <?php echo ($if_yes_did_the_file_tax=="no") ? "checked":" "?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label class="control-label col-md-4 col-md-offset-1" for="if_yes_did_the_file_tax">
                        If Yes - Have them bring the last 5 years of taxes
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-6" for="if_yes_did_the_file_tax">
                        * Note for self - On form 485 write they worked Illegal but they filed taxes
                        </label>
                    </div>

                        <br>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="what_did_they_put_ds160">2. What did they put in the DS-160 when they filed for Tourist Visa? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="what_did_they_put_ds160" value="address" <?php echo ($what_did_they_put_ds160=="address") ? "checked":" "?>/>Address</label>
                            <label class="radio-inline"> <input type="radio" name="what_did_they_put_ds160" value="work" <?php echo ($what_did_they_put_ds160=="work") ? "checked":" "?>/> Work </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="did_they_live_usa_illegal">3. Did they live in the USA Illegally before their last entry? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="did_they_live_usa_illegal" value="yes" <?php echo ($did_they_live_usa_illegal=="yes") ? "checked":" "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="did_they_live_usa_illegal" value="no" <?php echo ($did_they_live_usa_illegal=="no") ? "checked":" "?>/> No </label>
                        </div>
                    </div>
                    <div class="form-group" id="nationality">
                        <label class="control-label col-md-5" for="have_them_write_story">If Yes - have them write a story :</label>
                        <div class="col-md-4">
                            <textarea name="have_them_write_story" cols="55" rows="2"><?php echo $have_them_write_story ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="was_visa_denied"> 4. Was a visa ever denied? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="was_visa_denied" value="yes" <?php echo ($was_visa_denied=="yes") ? "checked":" "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="was_visa_denied" value="no" <?php echo ($was_visa_denied=="no") ? "checked":" "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="were_they_denied_entry_usa"> Were they ever denied an entry to the USA? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="were_they_denied_entry_usa" value="yes" <?php echo ($were_they_denied_entry_usa=="yes") ? "checked":" "?> /> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="were_they_denied_entry_usa" value="no" <?php echo ($were_they_denied_entry_usa=="no") ? "checked":" "?> /> No </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-5" for="was_immigrant_ever_denied"> Was an Immigrant Visa ever denied? :</label>
                        <div class="col-md-5">
                            <label class="radio-inline"> <input type="radio" name="was_immigrant_ever_denied" value="yes" <?php echo ($was_immigrant_ever_denied=="yes") ? "checked":" "?>/> Yes </label>
                            <label class="radio-inline"> <input type="radio" name="was_immigrant_ever_denied" value="no" <?php echo ($was_immigrant_ever_denied=="no") ? "checked":" "?>/> No </label>
                        </div>
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
		url:"fetch.php?formNo=4&<?php echo $getId?>",
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
