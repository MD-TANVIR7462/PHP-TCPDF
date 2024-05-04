<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$allDataCountry = $objQuery->indexByQueryAllData("SELECT * FROM countries");

$getId = $id = $clientId = $first_name = $last_name = $middle_name = $street_address  = $date_of_birth = $father_date_of_birth = $father_maiden_name = $father_first_name = $father_middle_name = $father_last_name = $mother_maiden_name = $mother_first_name = $mother_middle_name = $mother_last_name = $marital_status = $father_birth_location = $nationality = $city = $state = $zip  = $father_present_address = $mother_present_address = $mother_birth_location = $employee_company2 = $social_security_number = $city_town_village_of_birth = $mother_date_of_birth = $spouse_first_name = $spouse_middle_name = $spouse_last_name = $marital_times = $province = $postal_code = $country_name = $apt_ste_flr =  $apt_ste_flr_value = $a_number = $uscis_online_account_number = $a_r_uscis_online_account_number = $volag_number = $gender = $city_of_marriage = $state_of_marriage = $province_of_marriage = $father_country_of_birth = $mother_country_of_birth = "";

$home_phone = $business_phone = $city_nation_of_birth = $country_of_birth = $citizenship = $citizenship_value = $attorney_state_bar_number = $i94_number = $passport_number = $passport_date_expires = $passport_date_issued = $passport_location_issued = $type_of_non_immigrant_visa = $date_of_last_entry_to_us = $place_of_last_entry_to_us = $address_street = $address_city = $address_state = $address_zip = $address_dates = $employee_company = $employee_phone = $employee_dates = $father_city_town_village_of_residence = $father_country_of_residence = $mother_city_town_village_of_residence = $mother_country_of_residence = $current_marriage_date = $country_of_marriage = $spouse_birth = $spouse_nation_birth = $spouse_nationality = $spouse_ss_number = $prior_spouse1 = $date_of_mariage_of_prior_spouse1 = $place_of_mariage_of_prior_spouse1 = $date_of_divorce1 =$place_of_divorce1 = $prior_spouse2 = $date_of_mariage_of_prior_spouse2 = $place_of_mariage_of_prior_spouse2 = $date_of_divorce2 = $place_of_divorce2 = $spouse_street = $spouse_city = $spouse_state = $spouse_zip = $spouse_dates = $spouse_company = $spouse_company_phone = $spouse_company_dates = $spouse_father_name = $spouse_father_birth = $spouse_father_birth_location = $spouse_father_address = $spouse_mother = $spouse_mother_birth = $spouse_mother_birth_location = $spouse_mother_present_address = $alien_name_of_prior_spouse = $alien_date_of_birth = $alien_place_of_marriage = $alien_date_of_marriage = $alien_place_divorce = $alien_date_of_divorce = $spouse_prior_name  = $spouse_prior_date_of_birth = $spouse_prior_mariage_place = $spouse_prior_mariage_date = $spouse_prior_divorce_place = $spouse_prior_divorce_date = $spelling = "";

$other_names = $job_offer = $job_offer_detail = $family_member = $family_member_details = $reason_enter = $bring_members = $have_tourist = $type_visa_used = $denied_permission = $reason_denied = $convicted_crime = $convicted_crime_txt = $ordered_leave = $ordered_leave_txt = $political = $political_txt = $attorneys_worked = $attorneys_worked_details = $first_child_name = $first_child_a = $first_child_current_address = $first_child_ss = $first_child_us_entry_date = $first_child_dob = $second_child_name = $second_child_a = $second_child_current_address = $second_child_ss = $second_child_us_entry_date = $second_child_dob = $third_child_name = $third_child_a = $third_child_current_address = $third_child_ss = $third_child_us_entry_date = $third_child_dob = $fourth_child_name = $fourth_child_a = $fourth_child_current_address = $fourth_child_ss = $fourth_child_us_entry_date = $fourth_child_dob = $business_name = $employer_fein = $business_type = $business_address = $business_establish = $employee_number = $applicanat_nature = $soc_code = $naics_code = $employee_beneficiary = "";



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
				$response['create_date'] = "$clientInfo->open_date";
				$response['first_name'] = "$clientInfo->first_name";
				$response['last_name'] = "$clientInfo->last_name";
				$response['street_address'] = "$clientInfo->address";
				$response['home_phone'] = "$clientInfo->cell";
				$response['business_phone'] = "$clientInfo->cell_2";
				$response['city'] = "$clientInfo->city";
				$response['state'] = "$clientInfo->state";
				$response['zip'] = "$clientInfo->zip";
				$response['date_of_birth'] = "$clientInfo->dob";
				$response = json_encode($response);
				
				
				$sql = $conn->prepare("INSERT INTO `intake_form_info` SET `client_id` = $clientInfo->id, note='$response', form_type='1'");
				$result = $sql->execute();
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
	
if(isset($singleDataNote->create_date) AND $singleDataNote->create_date!="" AND $singleDataNote->create_date!="00/00/00"){
    $createDate = $singleDataNote->create_date;
} else {
    $createDate = date("Y-m-d");
}



if(isset($singleDataNote->first_name)) $first_name = $singleDataNote->first_name;
if(isset($singleDataNote->last_name)) $last_name = $singleDataNote->last_name;
if(isset($singleDataNote->middle_name)) $middle_name = $singleDataNote->middle_name;
if(isset($singleDataNote->street_address)) $street_address  = $singleDataNote->street_address;
if(isset($singleDataNote->date_of_birth)) $date_of_birth = $singleDataNote->date_of_birth;
if(isset($singleDataNote->father_date_of_birth)) $father_date_of_birth = $singleDataNote->father_date_of_birth;
if(isset($singleDataNote->father_maiden_name)) $father_maiden_name = $singleDataNote->father_maiden_name;
if(isset($singleDataNote->father_first_name)) $father_first_name = $singleDataNote->father_first_name;
if(isset($singleDataNote->father_middle_name)) $father_middle_name = $singleDataNote->father_middle_name;
if(isset($singleDataNote->father_last_name)) $father_last_name = $singleDataNote->father_last_name;
if(isset($singleDataNote->mother_maiden_name)) $mother_maiden_name = $singleDataNote->mother_maiden_name;
if(isset($singleDataNote->mother_first_name)) $mother_first_name = $singleDataNote->mother_first_name;
if(isset($singleDataNote->mother_middle_name)) $mother_middle_name = $singleDataNote->mother_middle_name;
if(isset($singleDataNote->mother_last_name)) $mother_last_name = $singleDataNote->mother_last_name;
if(isset($singleDataNote->marital_status)) $marital_status = $singleDataNote->marital_status;
if(isset($singleDataNote->father_birth_location)) $father_birth_location = $singleDataNote->father_birth_location;
if(isset($singleDataNote->nationality)) $nationality = $singleDataNote->nationality;
if(isset($singleDataNote->city)) $city = $singleDataNote->city;
if(isset($singleDataNote->state)) $state = $singleDataNote->state;
if(isset($singleDataNote->zip)) $zip  = $singleDataNote->zip;
if(isset($singleDataNote->father_present_address)) $father_present_address = $singleDataNote->father_present_address;
if(isset($singleDataNote->mother_present_address)) $mother_present_address = $singleDataNote->mother_present_address;
if(isset($singleDataNote->mother_birth_location)) $mother_birth_location = $singleDataNote->mother_birth_location;
if(isset($singleDataNote->employee_company2)) $employee_company2 = $singleDataNote->employee_company2;
if(isset($singleDataNote->social_security_number)) $social_security_number = $singleDataNote->social_security_number;
if(isset($singleDataNote->city_town_village_of_birth)) $city_town_village_of_birth = $singleDataNote->city_town_village_of_birth;
if(isset($singleDataNote->mother_date_of_birth)) $mother_date_of_birth = $singleDataNote->mother_date_of_birth;
if(isset($singleDataNote->spouse_first_name)) $spouse_first_name = $singleDataNote->spouse_first_name;
if(isset($singleDataNote->spouse_middle_name)) $spouse_middle_name = $singleDataNote->spouse_middle_name;
if(isset($singleDataNote->spouse_last_name)) $spouse_last_name = $singleDataNote->spouse_last_name;
if(isset($singleDataNote->marital_times)) $marital_times = $singleDataNote->marital_times;
if(isset($singleDataNote->province)) $province = $singleDataNote->province;
if(isset($singleDataNote->postal_code)) $postal_code = $singleDataNote->postal_code;
if(isset($singleDataNote->country_name)) $country_name = $singleDataNote->country_name;
if(isset($singleDataNote->apt_ste_flr)) $apt_ste_flr =  $singleDataNote->apt_ste_flr;
if(isset($singleDataNote->apt_ste_flr_value)) $apt_ste_flr_value = $singleDataNote->apt_ste_flr_value;
if(isset($singleDataNote->a_number)) $a_number = $singleDataNote->a_number;
if(isset($singleDataNote->uscis_online_account_number)) $uscis_online_account_number = $singleDataNote->uscis_online_account_number;
if(isset($singleDataNote->a_r_uscis_online_account_number)) $a_r_uscis_online_account_number = $singleDataNote->a_r_uscis_online_account_number;
if(isset($singleDataNote->volag_number)) $volag_number = $singleDataNote->volag_number;
if(isset($singleDataNote->gender)) $gender = $singleDataNote->gender;
if(isset($singleDataNote->city_of_marriage)) $city_of_marriage = $singleDataNote->city_of_marriage;
if(isset($singleDataNote->state_of_marriage)) $state_of_marriage = $singleDataNote->state_of_marriage;
if(isset($singleDataNote->province_of_marriage)) $province_of_marriage = $singleDataNote->province_of_marriage;
if(isset($singleDataNote->father_country_of_birth)) $father_country_of_birth = $singleDataNote->father_country_of_birth;
if(isset($singleDataNote->mother_country_of_birth)) $mother_country_of_birth = $singleDataNote->mother_country_of_birth;
if(isset($singleDataNote->home_phone)) $home_phone = $singleDataNote->home_phone;
if(isset($singleDataNote->business_phone)) $business_phone = $singleDataNote->business_phone;
if(isset($singleDataNote->city_nation_of_birth)) $city_nation_of_birth = $singleDataNote->city_nation_of_birth;
if(isset($singleDataNote->country_of_birth)) $country_of_birth = $singleDataNote->country_of_birth;
if(isset($singleDataNote->citizenship)) $citizenship = $singleDataNote->citizenship;
if(isset($singleDataNote->citizenship_value)) $citizenship_value = $singleDataNote->citizenship_value;
if(isset($singleDataNote->attorney_state_bar_number)) $attorney_state_bar_number = $singleDataNote->attorney_state_bar_number;
if(isset($singleDataNote->i94_number)) $i94_number = $singleDataNote->i94_number;
if(isset($singleDataNote->passport_number)) $passport_number = $singleDataNote->passport_number;
if(isset($singleDataNote->passport_date_expires)) $passport_date_expires = $singleDataNote->passport_date_expires;
if(isset($singleDataNote->passport_date_issued)) $passport_date_issued = $singleDataNote->passport_date_issued;
if(isset($singleDataNote->passport_location_issued)) $passport_location_issued = $singleDataNote->passport_location_issued;
if(isset($singleDataNote->type_of_non_immigrant_visa)) $type_of_non_immigrant_visa = $singleDataNote->type_of_non_immigrant_visa;
if(isset($singleDataNote->date_of_last_entry_to_us)) $date_of_last_entry_to_us = $singleDataNote->date_of_last_entry_to_us;
if(isset($singleDataNote->place_of_last_entry_to_us)) $place_of_last_entry_to_us = $singleDataNote->place_of_last_entry_to_us;
if(isset($singleDataNote->address_street)) $address_street = $singleDataNote->address_street;
if(isset($singleDataNote->address_city)) $address_city = $singleDataNote->address_city;
if(isset($singleDataNote->address_state)) $address_state = $singleDataNote->address_state;
if(isset($singleDataNote->address_zip)) $address_zip = $singleDataNote->address_zip;
if(isset($singleDataNote->address_dates)) $address_dates = $singleDataNote->address_dates;
if(isset($singleDataNote->employee_company)) $employee_company = $singleDataNote->employee_company;
if(isset($singleDataNote->employee_phone)) $employee_phone = $singleDataNote->employee_phone;
if(isset($singleDataNote->employee_dates)) $employee_dates = $singleDataNote->employee_dates;
if(isset($singleDataNote->father_city_town_village_of_residence)) $father_city_town_village_of_residence = $singleDataNote->father_city_town_village_of_residence;
if(isset($singleDataNote->father_country_of_residence)) $father_country_of_residence = $singleDataNote->father_country_of_residence;
if(isset($singleDataNote->mother_city_town_village_of_residence)) $mother_city_town_village_of_residence = $singleDataNote->mother_city_town_village_of_residence;
if(isset($singleDataNote->mother_country_of_residence)) $mother_country_of_residence = $singleDataNote->mother_country_of_residence;
if(isset($singleDataNote->current_marriage_date)) $current_marriage_date = $singleDataNote->current_marriage_date;
if(isset($singleDataNote->country_of_marriage)) $country_of_marriage = $singleDataNote->country_of_marriage;
if(isset($singleDataNote->spouse_birth)) $spouse_birth = $singleDataNote->spouse_birth;
if(isset($singleDataNote->spouse_nation_birth)) $spouse_nation_birth = $singleDataNote->spouse_nation_birth;
if(isset($singleDataNote->spouse_nationality)) $spouse_nationality = $singleDataNote->spouse_nationality;
if(isset($singleDataNote->spouse_ss_number)) $spouse_ss_number = $singleDataNote->spouse_ss_number;
if(isset($singleDataNote->prior_spouse1)) $prior_spouse1 = $singleDataNote->prior_spouse1;
if(isset($singleDataNote->date_of_mariage_of_prior_spouse1)) $date_of_mariage_of_prior_spouse1 = $singleDataNote->date_of_mariage_of_prior_spouse1;
if(isset($singleDataNote->place_of_mariage_of_prior_spouse1)) $place_of_mariage_of_prior_spouse1 = $singleDataNote->place_of_mariage_of_prior_spouse1;
if(isset($singleDataNote->date_of_divorce1)) $date_of_divorce1 = $singleDataNote->date_of_divorce1;
if(isset($singleDataNote->place_of_divorce1)) $place_of_divorce1 = $singleDataNote->place_of_divorce1;
if(isset($singleDataNote->prior_spouse2)) $prior_spouse2 = $singleDataNote->prior_spouse2;
if(isset($singleDataNote->date_of_mariage_of_prior_spouse2)) $date_of_mariage_of_prior_spouse2 = $singleDataNote->date_of_mariage_of_prior_spouse2;
if(isset($singleDataNote->place_of_mariage_of_prior_spouse2)) $place_of_mariage_of_prior_spouse2 = $singleDataNote->place_of_mariage_of_prior_spouse2;
if(isset($singleDataNote->date_of_divorce2)) $date_of_divorce2 = $singleDataNote->date_of_divorce2;
if(isset($singleDataNote->place_of_divorce2)) $place_of_divorce2 = $singleDataNote->place_of_divorce2;


if(isset($singleDataNote->spouse_father_name)) $spouse_father_name = $singleDataNote->spouse_father_name;
if(isset($singleDataNote->spouse_father_birth)) $spouse_father_birth = $singleDataNote->spouse_father_birth;
if(isset($singleDataNote->spouse_father_birth_location)) $spouse_father_birth_location = $singleDataNote->spouse_father_birth_location;
if(isset($singleDataNote->spouse_father_address)) $spouse_father_address = $singleDataNote->spouse_father_address;
if(isset($singleDataNote->spouse_mother)) $spouse_mother = $singleDataNote->spouse_mother;
if(isset($singleDataNote->spouse_mother_birth)) $spouse_mother_birth = $singleDataNote->spouse_mother_birth;
if(isset($singleDataNote->spouse_mother_birth_location)) $spouse_mother_birth_location = $singleDataNote->spouse_mother_birth_location;
if(isset($singleDataNote->spouse_mother_present_address)) $spouse_mother_present_address = $singleDataNote->spouse_mother_present_address;
if(isset($singleDataNote->alien_name_of_prior_spouse)) $alien_name_of_prior_spouse = $singleDataNote->alien_name_of_prior_spouse;
if(isset($singleDataNote->alien_date_of_birth)) $alien_date_of_birth = $singleDataNote->alien_date_of_birth;
if(isset($singleDataNote->alien_place_of_marriage)) $alien_place_of_marriage = $singleDataNote->alien_place_of_marriage;
if(isset($singleDataNote->alien_date_of_marriage)) $alien_date_of_marriage = $singleDataNote->alien_date_of_marriage;
if(isset($singleDataNote->alien_place_divorce)) $alien_place_divorce = $singleDataNote->alien_place_divorce;
if(isset($singleDataNote->alien_date_of_divorce)) $alien_date_of_divorce = $singleDataNote->alien_date_of_divorce;
if(isset($singleDataNote->spouse_prior_name)) $spouse_prior_name  = $singleDataNote->spouse_prior_name;
if(isset($singleDataNote->spouse_prior_date_of_birth)) $spouse_prior_date_of_birth = $singleDataNote->spouse_prior_date_of_birth;
if(isset($singleDataNote->spouse_prior_mariage_place)) $spouse_prior_mariage_place = $singleDataNote->spouse_prior_mariage_place;
if(isset($singleDataNote->spouse_prior_mariage_date)) $spouse_prior_mariage_date = $singleDataNote->spouse_prior_mariage_date;
if(isset($singleDataNote->spouse_prior_divorce_place)) $spouse_prior_divorce_place = $singleDataNote->spouse_prior_divorce_place;
if(isset($singleDataNote->spouse_prior_divorce_date)) $spouse_prior_divorce_date = $singleDataNote->spouse_prior_divorce_date;
if(isset($singleDataNote->spelling)) $spelling = $singleDataNote->spelling;
if(isset($singleDataNote->other_names)) $other_names = $singleDataNote->other_names;
if(isset($singleDataNote->job_offer)) $job_offer = $singleDataNote->job_offer;
if(isset($singleDataNote->job_offer_detail)) $job_offer_detail = $singleDataNote->job_offer_detail;
if(isset($singleDataNote->family_member)) $family_member = $singleDataNote->family_member;
if(isset($singleDataNote->family_member_details)) $family_member_details = $singleDataNote->family_member_details;
if(isset($singleDataNote->reason_enter)) $reason_enter = $singleDataNote->reason_enter;
if(isset($singleDataNote->bring_members)) $bring_members = $singleDataNote->bring_members;
if(isset($singleDataNote->have_tourist)) $have_tourist = $singleDataNote->have_tourist;
if(isset($singleDataNote->type_visa_used)) $type_visa_used = $singleDataNote->type_visa_used;
if(isset($singleDataNote->denied_permission)) $denied_permission = $singleDataNote->denied_permission;
if(isset($singleDataNote->reason_denied)) $reason_denied = $singleDataNote->reason_denied;
if(isset($singleDataNote->convicted_crime)) $convicted_crime = $singleDataNote->convicted_crime;
if(isset($singleDataNote->convicted_crime_txt)) $convicted_crime_txt = $singleDataNote->convicted_crime_txt;
if(isset($singleDataNote->ordered_leave)) $ordered_leave = $singleDataNote->ordered_leave;
if(isset($singleDataNote->ordered_leave_txt)) $ordered_leave_txt = $singleDataNote->ordered_leave_txt;
if(isset($singleDataNote->political)) $political = $singleDataNote->political;
if(isset($singleDataNote->political_txt)) $political_txt = $singleDataNote->political_txt;
if(isset($singleDataNote->attorneys_worked)) $attorneys_worked = $singleDataNote->attorneys_worked;
if(isset($singleDataNote->attorneys_worked_details)) $attorneys_worked_details = $singleDataNote->attorneys_worked_details;
if(isset($singleDataNote->first_child_name)) $first_child_name = $singleDataNote->first_child_name;
if(isset($singleDataNote->first_child_a)) $first_child_a = $singleDataNote->first_child_a;
if(isset($singleDataNote->first_child_current_address)) $first_child_current_address = $singleDataNote->first_child_current_address;
if(isset($singleDataNote->first_child_ss)) $first_child_ss = $singleDataNote->first_child_ss;
if(isset($singleDataNote->first_child_us_entry_date)) $first_child_us_entry_date = $singleDataNote->first_child_us_entry_date;
if(isset($singleDataNote->first_child_dob)) $first_child_dob = $singleDataNote->first_child_dob;
if(isset($singleDataNote->second_child_name)) $second_child_name = $singleDataNote->second_child_name;
if(isset($singleDataNote->second_child_a)) $second_child_a = $singleDataNote->second_child_a;
if(isset($singleDataNote->second_child_current_address)) $second_child_current_address = $singleDataNote->second_child_current_address;
if(isset($singleDataNote->second_child_ss)) $second_child_ss = $singleDataNote->second_child_ss;
if(isset($singleDataNote->second_child_us_entry_date)) $second_child_us_entry_date = $singleDataNote->second_child_us_entry_date;
if(isset($singleDataNote->second_child_dob)) $second_child_dob = $singleDataNote->second_child_dob;
if(isset($singleDataNote->third_child_name)) $third_child_name = $singleDataNote->third_child_name;
if(isset($singleDataNote->third_child_a)) $third_child_a = $singleDataNote->third_child_a;
if(isset($singleDataNote->third_child_current_address)) $third_child_current_address = $singleDataNote->third_child_current_address;
if(isset($singleDataNote->third_child_ss)) $third_child_ss = $singleDataNote->third_child_ss;
if(isset($singleDataNote->third_child_us_entry_date)) $third_child_us_entry_date = $singleDataNote->third_child_us_entry_date;
if(isset($singleDataNote->third_child_dob)) $third_child_dob = $singleDataNote->third_child_dob;
if(isset($singleDataNote->fourth_child_name)) $fourth_child_name = $singleDataNote->fourth_child_name;
if(isset($singleDataNote->fourth_child_a)) $fourth_child_a = $singleDataNote->fourth_child_a;
if(isset($singleDataNote->fourth_child_current_address)) $fourth_child_current_address = $singleDataNote->fourth_child_current_address;
if(isset($singleDataNote->fourth_child_ss)) $fourth_child_ss = $singleDataNote->fourth_child_ss;
if(isset($singleDataNote->fourth_child_us_entry_date)) $fourth_child_us_entry_date = $singleDataNote->fourth_child_us_entry_date;
if(isset($singleDataNote->fourth_child_dob)) $fourth_child_dob = $singleDataNote->fourth_child_dob;
if(isset($singleDataNote->business_name)) $business_name = $singleDataNote->business_name;
if(isset($singleDataNote->employer_fein)) $employer_fein = $singleDataNote->employer_fein;
if(isset($singleDataNote->business_type)) $business_type = $singleDataNote->business_type;
if(isset($singleDataNote->business_address)) $business_address = $singleDataNote->business_address;
if(isset($singleDataNote->business_establish)) $business_establish = $singleDataNote->business_establish;
if(isset($singleDataNote->employee_number)) $employee_number = $singleDataNote->employee_number;
if(isset($singleDataNote->applicanat_nature)) $applicanat_nature = $singleDataNote->applicanat_nature;
if(isset($singleDataNote->soc_code)) $soc_code = $singleDataNote->soc_code;
if(isset($singleDataNote->naics_code)) $naics_code = $singleDataNote->naics_code;
if(isset($singleDataNote->employee_beneficiary)) $employee_beneficiary = $singleDataNote->employee_beneficiary;

//array fields
if(isset($singleDataNote->address_street)) $address_street = $singleDataNote->address_street;
if(isset($singleDataNote->address_city)) $address_city = $singleDataNote->address_city;
if(isset($singleDataNote->address_state)) $address_state = $singleDataNote->address_state;
if(isset($singleDataNote->address_zip)) $address_zip = $singleDataNote->address_zip;
if(isset($singleDataNote->address_dates)) $address_dates = $singleDataNote->address_dates;
if(isset($singleDataNote->employee_company)) $employee_company = $singleDataNote->employee_company;
if(isset($singleDataNote->employee_phone)) $employee_phone = $singleDataNote->employee_phone;
if(isset($singleDataNote->employee_dates)) $employee_dates = $singleDataNote->employee_dates;





if(isset($singleDataNote->spouse_street)) $spouse_street = $singleDataNote->spouse_street;
if(isset($singleDataNote->spouse_city)) $spouse_city = $singleDataNote->spouse_city;
if(isset($singleDataNote->spouse_state)) $spouse_state = $singleDataNote->spouse_state;
if(isset($singleDataNote->spouse_zip)) $spouse_zip = $singleDataNote->spouse_zip;
if(isset($singleDataNote->spouse_dates)) $spouse_dates = $singleDataNote->spouse_dates;

if(isset($singleDataNote->spouse_company)) $spouse_company = $singleDataNote->spouse_company;
if(isset($singleDataNote->spouse_company_phone)) $spouse_company_phone = $singleDataNote->spouse_company_phone;
if(isset($singleDataNote->spouse_company_dates)) $spouse_company_dates = $singleDataNote->spouse_company_dates;
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
	.well {
		font-size: 26px;
		font-weight: 500;
		padding: 10px 0;
		margin-bottom: 10px;
	}
</style>
<title> IMMIGRATION INTAKE FORM </title>
</head>
<body>
<div class="container" style="padding: 20px;">
    <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	
    <form id="registration_form" class="form-horizontal" method="post">
		<input type="hidden" name="id" value="<?php echo $singleData->id?>" />
		<input type="hidden" name="client_id" value="<?php echo $clientId?>" />
        <fieldset>
            <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h2>Step 1 :INTAKE IMMIGRATION</h2>
            
                <div class="form-group">
					<label class="control-label col-md-2" for="create_date">Date: </label>
					<div class="col-md-2">
					   <input type="date" class="form-control" name="create_date" id="create_date" placeholder="Date" value="<?php echo $createDate?>" readonly>
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="last_name">Last Name:<span style="color: red">*</span></label>
					<div class="col-md-3">
						<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name?>" required>
					</div>
					<label class="control-label col-md-2" for="first_name">First Name:<span style="color: red">*</span></label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name?>" required>
					</div>
					<label class="control-label col-md-1" for="middle_name">MI:</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" value="<?php echo $middle_name?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="street_address">Street Address:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="street_address" id="street_address" placeholder="Street Address" value="<?php echo $street_address?>">
					</div>
                </div>


                <div class="form-group">
					<label class="control-label col-md-2"></label>
					<div class="col-md-3">
						<label class="radio-inline">
							<input type="radio" name="apt_ste_flr" value="Apt" <?php if($apt_ste_flr=="Apt") echo "checked='checked'"?> /> Apt.
						</label>
						<label class="radio-inline">
							<input type="radio" name="apt_ste_flr" value="Ste" <?php if($apt_ste_flr=="Ste") echo "checked='checked'"?> /> Ste.
						</label>
						<label class="radio-inline">
							<input type="radio" name="apt_ste_flr" value="Flr" <?php if($apt_ste_flr=="Flr") echo "checked='checked'"?> /> Flr.
						</label>
					</div>
					<div class="col-md-7">
						<input type="text" class="form-control" name="apt_ste_flr_value" value="<?php echo $apt_ste_flr_value?>" />
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="city">City:</label>
					<div class="col-md-3">
						<input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city?>">
					</div>
					<label class="control-label col-md-2" for="state">State:</label>
					<div class="col-md-2">
						<select name="state" id="state" class="form-control">
						<?php
						foreach($allDataCountry as $record){
							if($state==$record->state_code) {
								echo  '<option value="'.$record->state_code.'" selected>'.$record->state_code.' </option>';
							}
							else {
								echo '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
							}
						}
						?>
						</select>
					</div>
					<label class="control-label col-md-1" for="zip">Zip:</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="zip" id="zip" placeholder="Zip" value="<?php echo $zip?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="province">Province:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="province" id="province" placeholder="Province"  value="<?php echo $province?>">
					</div>
					<label class="control-label col-md-2" for="postal_code">Postal Code:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?php echo $postal_code?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="home_phone">Home Phone :</label>
					<div class="col-md-4">
						<input type="number" class="form-control" name="home_phone" id="home_phone" placeholder="Home Phone" value="<?php echo $home_phone?>">
					</div>
					<label class="control-label col-md-2" for="business_phone">Business Phone :</label>
					<div class="col-md-4">
						<input type="number" class="form-control" name="business_phone" id="business_phone" placeholder="Business Phone"  value="<?php echo $business_phone?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="date_of_birth ">Date of Birth : </label>
					<div class="col-md-4">
						<input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="dd-mm-yyyy" value="<?php echo $date_of_birth?>" >
					</div>
					<label class="control-label col-md-2" for="date_of_birth ">Sex : </label>
					<div class="col-md-4">
						<label class="radio-inline">
							<input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"?>> Male
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"?>> Female
						</label>
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-3" for=" city_nation_of_birth">City and Nation of Birth:</label>
					<div class="col-md-3">
						<input type="text" class="form-control" name="city_nation_of_birth" id="city_nation_of_birth" placeholder="City and Nation of Birth" value="<?php echo $city_nation_of_birth?>" >
					</div>
					<label class="control-label col-md-2" for="country_of_birth">Country of Birth:</label>
					<div class="col-md-4">
						<select name="country_of_birth" id="country_of_birth" class="form-control">
							<option value="" style="">Select a option</option>
							<?php
							foreach($allDataCountry as $record){
								if($record->country_name!=''){
									if($country_of_birth==$record->id) echo "<option value='$record->id' selected>$record->country_name</option>";
									else echo "<option value='$record->id'>$record->country_name</option>";
								}
							}
							?>
						</select>
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="nationality"> Nationality: </label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="nationality" id="nationality" placeholder="nationality" value="<?php echo $nationality?>" >
					</div>
                </div>

                 <div class="form-group">
					<label class="control-label col-md-3" for="other citizen "> Other Citizenship? (please circle) : </label>
					<div class="col-md-2">
						<label class="radio-inline">
							<input type="radio" name="citizenship" value="Yes" <?php echo ($citizenship=="Yes") ? "checked" : " "?> > Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="citizenship" value="No" <?php echo ($citizenship=="No") ? "checked" : " "?> > No
						</label>
					</div>
					<label class="control-label col-md-3" for="citizenship_value"> If yes, specify: </label>
					<div class="col-md-4">
						<textarea name="citizenship_value" id="citizenship_value" class="form-control" cols="36" rows="2" ><?php echo $citizenship_value?></textarea>
					</div>
                </div>
				
                <div class="form-group">
					<label class="control-label col-md-6" for="social_security_number">Social Security Number:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="social_security_number" id="social_security_number" placeholder="Social Security Number" value="<?php echo $social_security_number?>">
					</div>
                </div>
				
                <div class="form-group">
					<label class="control-label col-md-6" for="a_r_uscis_online_account_number">Attorney or Accredited Representative<br>USCIS Online Account Number:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="a_r_uscis_online_account_number" id="a_r_uscis_online_account_number" placeholder="USCIS Online Account Number" value="<?php echo $a_r_uscis_online_account_number?>">
					</div>
                </div>
				
                <div class="form-group">
					<label class="control-label col-md-6" for="uscis_online_account_number">USCIS Online Account Number<br>(Spouse Beneficiary):</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="uscis_online_account_number" id="uscis_online_account_number" placeholder="USCIS Online Account Number" value="<?php echo $uscis_online_account_number?>">
					</div>
                </div>
				
                <div class="form-group">
					<label class="control-label col-md-6" for="a_number">A number (green card or work permit):</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="a_number" id="a_number" placeholder="green card or work permit Number " value="<?php echo $a_number?>">
					</div>
                </div>
                
                <div class="form-group">
					<label class="control-label col-md-6" for="attorney_state_bar_number">Attorney State Bar Number:</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="attorney_state_bar_number" id="attorney_state_bar_number" placeholder="Attorney State Bar Number" value="<?php echo $attorney_state_bar_number?>">
					</div>
                </div>
                
                <div class="form-group">
					<label class="control-label col-md-2" for="volag_number">Volag Number:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="volag_number" id="volag_number" placeholder="Volag Number" value="<?php echo $volag_number?>">
					</div>
                </div>
                
                <div class="form-group">
					<label class="control-label col-md-2" for="I94_Number">I94 Number:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="i94_number" id="I94_Number" placeholder="I94 Number" value="<?php echo $i94_number?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for="passport_number">Passport Number:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="passport_number" id="passport_number" placeholder="Passport Number" value="<?php echo $passport_number?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-2" for=" passport_date_expires">Date Expires :</label>
					<div class="col-md-4">
						<input type="date" class="form-control" name="passport_date_expires" id="passport_date_expires" placeholder="Date Expires " value="<?php echo $passport_date_expires?>" >
					</div>

					<label class="control-label col-md-2" for="passport_date_issued">Date Issued: </label>
					<div class="col-md-4">
						<input type="date" class="form-control" name="passport_date_issued" id="passport_date_issued:" placeholder="Issued Date" value="<?php echo $passport_date_issued?>">
					</div>
                </div>


                <div class="form-group">
					<label class="control-label col-md-2" for="passport_location_issued">Location Issued:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="passport_location_issued" id="passport_location_issued" placeholder="Issued Location" value="<?php echo $passport_location_issued?>">
					</div>
                </div>


                <div class="form-group">
					<label class="control-label col-md-6" for="type_of_non_immigrant_visa">Type of Non-Immigrant Visa (visitor, fiancé, student, etc.):</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="type_of_non_immigrant_visa" id="type_of_non_immigrant_visa" placeholder="Type of Non-Immigrant Visa (visitor, fiancé, student, etc.)" value="<?php echo $type_of_non_immigrant_visa?>">
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-3" for="date_of_last_entry_to_us">Date of Last Entry to U.S.:</label>
					<div class="col-md-3">
						<input type="date" class="form-control" name="date_of_last_entry_to_us" id="date_of_last_entry_to_us" placeholder="Date of Last Entry to U.S." value="<?php echo $date_of_last_entry_to_us?>" >
					</div>

					<label class="control-label col-md-3" for="place_of_last_entry_to_us">Place of Last Entry to U.S. : </label>
					<div class="col-md-3">
						<input type="text" class="form-control" name="place_of_last_entry_to_us" id="place_of_last_entry_to_us" placeholder="Place of Last Entry to U.S." value="<?php echo $place_of_last_entry_to_us?>">
					</div>
                </div>

		    <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
        </fieldset>
        



        

<fieldset>
<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
	<h2> Step 2:  INTAKE IMMIGRATION </h2>
	<div class="text-center well">
		<span>ADDRESSES DURING THE LAST 5 YEARS</span>
	</div>
	<div class="text-center">
	<table class=" table table-bordered table-striped">
		<thead class="thead-dark">
		<tr>
		   <td><h4>SL#</h4></td>
		   <td><h4>Street</h4></td> 
		   <td><h4>City</h4></td> 
		   <td><h4>State</h4></td> 
		   <td><h4>Zip Code</h4></td> 
		   <td><h4>Dates</h4></td> 
		</tr>
			
		</thead>
		<tbody>
<tr>
	<td>1</td>
	<td><input class="form-control" type="text" name="address_street[]" placeholder="street" value="<?php if(isset($singleDataNote->address_street)) echo $singleDataNote->address_street[0]?>"></td>
	<td><input class="form-control" type="text" name="address_city[]"  placeholder="City" value="<?php if(isset($singleDataNote->address_city)) echo $singleDataNote->address_city[0]?>"></td>
	<td><input class="form-control" type="text" name="address_state[]"  placeholder="State" value="<?php if(isset($singleDataNote->address_state)) echo $singleDataNote->address_state[0]?>"></td>
	<td><input class="form-control" type="text" name="address_zip[]"  placeholder="Zip Code" value="<?php if(isset($singleDataNote->address_zip)) echo $singleDataNote->address_zip[0]?>"></td>
	<td><input class="form-control" type="date" name="address_dates[]"  placeholder="Dates" value="<?php if(isset($singleDataNote->address_street)) echo $singleDataNote->address_dates[0]?>"></td>
</tr>
<tr>
	<td>2</td>
	<td><input class="form-control" type="text" name="address_street[]"  placeholder="street" value="<?php if(isset($singleDataNote->address_street)) echo $singleDataNote->address_street[1]?>"></td>
	<td><input class="form-control" type="text" name="address_city[]"  placeholder="City" value="<?php if(isset($singleDataNote->address_city)) echo $singleDataNote->address_city[1]?>"></td>
	<td><input class="form-control" type="text" name="address_state[]" placeholder="State" value="<?php if(isset($singleDataNote->address_state)) echo $singleDataNote->address_state[1]?>"></td>
	<td><input class="form-control" type="text" name="address_zip[]"  placeholder="Zip Code" value="<?php if(isset($singleDataNote->address_zip)) echo $singleDataNote->address_zip[1]?>"></td>
	<td><input class="form-control" type="date" name="address_dates[]"  placeholder="Dates" value="<?php if(isset($singleDataNote->address_dates)) echo $singleDataNote->address_dates[1]?>"></td>
</tr>
<tr>
	<td>3</td>
	<td><input class="form-control" type="text" name="address_street[]"  placeholder="street" value="<?php if(isset($singleDataNote->address_street)) echo $singleDataNote->address_street[2]?>"></td>
	<td><input class="form-control" type="text" name="address_city[]" placeholder="City" value="<?php if(isset($singleDataNote->address_city)) echo $singleDataNote->address_city[2]?>"></td>
	<td><input class="form-control" type="text" name="address_state[]"  placeholder="State" value="<?php if(isset($singleDataNote->address_state)) echo $singleDataNote->address_state[2]?>"></td>
	<td><input class="form-control" type="text" name="address_zip[]"  placeholder="Zip Code" value="<?php if(isset($singleDataNote->address_zip)) echo $singleDataNote->address_zip[2]?>"></td>
	<td><input class="form-control" type="date" name="address_dates[]"  placeholder="Dates" value="<?php if(isset($singleDataNote->address_dates)) echo $singleDataNote->address_dates[2]?>"></td>
</tr>
<tr>
	<td>4</td>
	<td><input class="form-control" type="text" name="address_street[]"  placeholder="street" value="<?php if(isset($singleDataNote->address_street)) echo $singleDataNote->address_street[3]?>"></td>
	<td><input class="form-control" type="text" name="address_city[]"  placeholder="City" value="<?php if(isset($singleDataNote->address_city)) echo $singleDataNote->address_city[3]?>"></td>
	<td><input class="form-control" type="text" name="address_state[]"  placeholder="State" value="<?php if(isset($singleDataNote->address_state)) echo $singleDataNote->address_state[3]?>"></td>
	<td><input class="form-control" type="text" name="address_zip[]"  placeholder="Zip Code" value="<?php if(isset($singleDataNote->address_zip)) echo $singleDataNote->address_zip[3]?>"></td>
	<td><input class="form-control" type="date" name="address_dates[]"  placeholder="Dates" value="<?php if(isset($singleDataNote->address_dates)) echo $singleDataNote->address_dates[3]?>"></td>
</tr>
<tr>
	<td>5</td>
	<td><input class="form-control" type="text" name="address_street[]"  placeholder="street" value="<?php if(isset($singleDataNote->address_street)) echo $singleDataNote->address_street[4]?>"></td>
	<td><input class="form-control" type="text" name="address_city[]"  placeholder="City" value="<?php if(isset($singleDataNote->address_city)) echo $singleDataNote->address_city[4]?>"></td>
	<td><input class="form-control" type="text" name="address_state[]"  placeholder="State" value="<?php if(isset($singleDataNote->address_state)) echo $singleDataNote->address_state[4]?>"></td>
	<td><input class="form-control" type="text" name="address_zip[]"  placeholder="Zip Code" value="<?php if(isset($singleDataNote->address_zip)) echo $singleDataNote->address_zip[4]?>"></td>
	<td><input class="form-control" type="date" name="address_dates[]"  placeholder="Dates" value="<?php if(isset($singleDataNote->address_dates)) echo $singleDataNote->address_dates[4]?>"></td>
</tr>
		</tbody>
	</table>
</div>

<div class="text-center well">
	<span>EMPLOYMENT FOR THE LAST 5 YEARS</span>
</div>
<div class="text-center">
	<table class=" table table-bordered table-striped ">
		<thead class="thead-dark">
		<tr>
			<td><h4>SL#</h4></td>
		   <td><h4>Company</h4></td> 
		   <td><h4>Phone</h4></td> 
		   <td><h4>Dates</h4></td>  
		</tr>
		</thead>
		<tbody>
<tr>
	<td>1</td>
	<td><input class="form-control" type="text" name="employee_company[]"  placeholder="Company Name" value="<?php if(isset($singleDataNote->employee_company)) echo $singleDataNote->employee_company[0]?>"></td>
	<td><input class="form-control" type="text" name="employee_phone[]"  placeholder="Phone Number" value="<?php if(isset($singleDataNote->employee_phone)) echo $singleDataNote->employee_phone[0]?>"></td>
	<td><input class="form-control" type="date" name="employee_dates[]"  placeholder="State & Zip Code" value="<?php if(isset($singleDataNote->employee_dates)) echo $singleDataNote->employee_dates[0]?>"></td>
</tr>
<tr>
	<td>2</td>
	<td><input class="form-control" type="text" name="employee_company[]" placeholder="Company Name" value="<?php if(isset($singleDataNote->employee_company)) echo $singleDataNote->employee_company[1]?>"></td>
	<td><input class="form-control" type="text" name="employee_phone[]"  placeholder="Phone Number" value="<?php if(isset($singleDataNote->employee_phone)) echo $singleDataNote->employee_phone[1]?>"></td>
	<td><input class="form-control" type="date" name="employee_dates[]"  placeholder="State & Zip Code" value="<?php if(isset($singleDataNote->employee_dates)) echo $singleDataNote->employee_dates[1]?>"></td>
</tr>
<tr>
	<td>3</td>
	<td><input class="form-control" type="text" name="employee_company[]"  placeholder="Company Name" value="<?php if(isset($singleDataNote->employee_company)) echo $singleDataNote->employee_company[2]?>"></td>
	<td><input class="form-control" type="text" name="employee_phone[]"  placeholder="Phone Number" value="<?php if(isset($singleDataNote->employee_phone)) echo $singleDataNote->employee_phone[2]?>"></td>
	<td><input class="form-control" type="date" name="employee_dates[]"  placeholder="State & Zip Code" value="<?php if(isset($singleDataNote->employee_dates)) echo $singleDataNote->employee_dates[2]?>"></td>
</tr>
<tr>
	<td>4</td>
	<td><input class="form-control" type="text" name="employee_company[]" placeholder="Company Name" value="<?php if(isset($singleDataNote->employee_company)) echo $singleDataNote->employee_company[3]?>"></td>
	<td><input class="form-control" type="text" name="employee_phone[]"  placeholder="Phone Number" value="<?php if(isset($singleDataNote->employee_phone)) echo $singleDataNote->employee_phone[3]?>"></td>
	<td><input class="form-control" type="date" name="employee_dates[]"  placeholder="State & Zip Code" value="<?php if(isset($singleDataNote->employee_dates)) echo $singleDataNote->employee_dates[3]?>"></td>
</tr>
<tr>
	<td>5</td>
	<td><input class="form-control" type="text" name="employee_company[]"  placeholder="Company Name" value="<?php if(isset($singleDataNote->employee_company)) echo $singleDataNote->employee_company[4]?>"></td>
	<td><input class="form-control" type="text" name="employee_phone[]"  placeholder="Phone Number" value="<?php if(isset($singleDataNote->employee_phone)) echo $singleDataNote->employee_phone[4]?>"></td>
	<td><input class="form-control" type="date" name="employee_dates[]"  placeholder="State & Zip Code" value="<?php if(isset($singleDataNote->employee_dates)) echo $singleDataNote->employee_dates[4]?>"></td>
</tr>
		</tbody>
	</table>
</div>

<div class="text-center well">
	<span>EMPLOYMENT HISTORY</span>
</div>
<div class="text-center">
	<table class=" table table-bordered table-striped ">
		<thead class="thead-dark">
			<tr>
			   <td><h4 class="text-right">#</h4></td>
			   <td><h4>Employer 1</h4></td>
			   <td><h4>Employer 2</h4></td>
			   <td><h4>Outside of United States</h4></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="text-align:right;vertical-align:middle">Name of Employer / Company</td>
				<td><input class="form-control" type="text" name="employer1_name" placeholder="Name of Employer / Company" value="<?php if(isset($singleDataNote->employer1_name)) echo $singleDataNote->employer1_name?>"></td>
				<td><input class="form-control" type="text" name="employer2_name" placeholder="Name of Employer / Company" value="<?php if(isset($singleDataNote->employer2_name)) echo $singleDataNote->employer2_name?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_company_name" placeholder="Name of Employer / Company" value="<?php if(isset($singleDataNote->outside_of_ny_company_name)) echo $singleDataNote->outside_of_ny_company_name?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Address</td>
				<td><input class="form-control" type="text" name="employer1_address" placeholder="Address" value="<?php if(isset($singleDataNote->employer1_address)) echo $singleDataNote->employer1_address?>"></td>
				<td><input class="form-control" type="text" name="employer2_address" placeholder="Address" value="<?php if(isset($singleDataNote->employer2_address)) echo $singleDataNote->employer2_address?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_address" placeholder="Address" value="<?php if(isset($singleDataNote->outside_of_ny_address)) echo $singleDataNote->outside_of_ny_address?>"></td>
			</tr>
			<tr>
				<td rowspan="2" style="text-align:right;vertical-align:middle">Apt. / Ste. / Flr.</td>
				<td>
					<label class="radio-inline">
						<input type="radio" name="employer1_apt_ste_flr" value="Apt" <?php if(isset($singleDataNote->employer1_apt_ste_flr) && $singleDataNote->employer1_apt_ste_flr=="Apt") echo "checked";?> /> Apt.
					</label>
					<label class="radio-inline">
						<input type="radio" name="employer1_apt_ste_flr" value="Ste" <?php if(isset($singleDataNote->employer1_apt_ste_flr) && $singleDataNote->employer1_apt_ste_flr=="Ste") echo "checked";?> /> Ste.
					</label>
					<label class="radio-inline">
						<input type="radio" name="employer1_apt_ste_flr" value="Flr" <?php if(isset($singleDataNote->employer1_apt_ste_flr) && $singleDataNote->employer1_apt_ste_flr=="Flr") echo "checked";?> /> Flr.
					</label>
				</td>
				<td>
					<label class="radio-inline">
						<input type="radio" name="employer2_apt_ste_flr" value="Apt" <?php if(isset($singleDataNote->employer2_apt_ste_flr) && $singleDataNote->employer2_apt_ste_flr=="Apt") echo "checked";?> /> Apt.
					</label>
					<label class="radio-inline">
						<input type="radio" name="employer2_apt_ste_flr" value="Ste" <?php if(isset($singleDataNote->employer2_apt_ste_flr) && $singleDataNote->employer2_apt_ste_flr=="Ste") echo "checked";?> /> Ste.
					</label>
					<label class="radio-inline">
						<input type="radio" name="employer2_apt_ste_flr" value="Flr" <?php if(isset($singleDataNote->employer2_apt_ste_flr) && $singleDataNote->employer2_apt_ste_flr=="Flr") echo "checked";?> /> Flr.
					</label>
				</td>
				<td>
					<label class="radio-inline">
						<input type="radio" name="outside_of_ny_apt_ste_flr" value="Apt" <?php if(isset($singleDataNote->outside_of_ny_apt_ste_flr) && $singleDataNote->outside_of_ny_apt_ste_flr=="Apt") echo "checked";?> /> Apt.
					</label>
					<label class="radio-inline">
						<input type="radio" name="outside_of_ny_apt_ste_flr" value="Ste" <?php if(isset($singleDataNote->outside_of_ny_apt_ste_flr) && $singleDataNote->outside_of_ny_apt_ste_flr=="Ste") echo "checked";?> /> Ste.
					</label>
					<label class="radio-inline">
						<input type="radio" name="outside_of_ny_apt_ste_flr" value="Flr" <?php if(isset($singleDataNote->outside_of_ny_apt_ste_flr) && $singleDataNote->outside_of_ny_apt_ste_flr=="Flr") echo "checked";?> /> Flr.
					</label>
				</td>
			</tr>
			<tr>
				<td><input class="form-control" type="text" name="employer1_apt_ste_flr_value"  value="<?php if(isset($singleDataNote->employer1_apt_ste_flr_value)) echo $singleDataNote->employer1_apt_ste_flr_value?>"></td>
				<td><input class="form-control" type="text" name="employer2_apt_ste_flr_value"  value="<?php if(isset($singleDataNote->employer2_apt_ste_flr_value)) echo $singleDataNote->employer2_apt_ste_flr_value?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_apt_ste_flr_value"  value="<?php if(isset($singleDataNote->outside_of_ny_apt_ste_flr_value)) echo $singleDataNote->outside_of_ny_apt_ste_flr_value?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">City or Town</td>
				<td><input class="form-control" type="text" name="employer1_city_or_town" placeholder="City or Town" value="<?php if(isset($singleDataNote->employer1_city_or_town)) echo $singleDataNote->employer1_city_or_town?>"></td>
				<td><input class="form-control" type="text" name="employer2_city_or_town" placeholder="City or Town" value="<?php if(isset($singleDataNote->employer2_city_or_town)) echo $singleDataNote->employer2_city_or_town?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_city_or_town" placeholder="City or Town" value="<?php if(isset($singleDataNote->outside_of_ny_city_or_town)) echo $singleDataNote->outside_of_ny_city_or_town?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">State</td>
				<td>
					<select name="employer1_state" id="employer1_state" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($singleDataNote->employer1_state==$record->state_code) {
							echo  '<option value="'.$record->state_code.'" selected>'.$record->state_code.' </option>';
						}
						else {
							echo '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
						}
					}
					?>
					</select>
				</td>
				<td>
					<select name="employer2_state" id="employer2_state" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($singleDataNote->employer2_state==$record->state_code) {
							echo  '<option value="'.$record->state_code.'" selected>'.$record->state_code.' </option>';
						}
						else {
							echo '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
						}
					}
					?>
					</select>
				</td>
				<td>
					<select name="outside_of_ny_state" id="outside_of_ny_state" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($singleDataNote->outside_of_ny_state==$record->state_code) {
							echo  '<option value="'.$record->state_code.'" selected>'.$record->state_code.' </option>';
						}
						else {
							echo '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Zip Code</td>
				<td><input class="form-control" type="text" name="employer1_zip_code" placeholder="Zip Code" value="<?php if(isset($singleDataNote->employer1_zip_code)) echo $singleDataNote->employer1_zip_code?>"></td>
				<td><input class="form-control" type="text" name="employer2_zip_code" placeholder="Zip Code" value="<?php if(isset($singleDataNote->employer2_zip_code)) echo $singleDataNote->employer2_zip_code?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_zip_code" placeholder="Zip Code" value="<?php if(isset($singleDataNote->outside_of_ny_zip_code)) echo $singleDataNote->outside_of_ny_zip_code?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Province</td>
				<td><input class="form-control" type="text" name="employer1_province" placeholder="Province" value="<?php if(isset($singleDataNote->employer1_province)) echo $singleDataNote->employer1_province?>"></td>
				<td><input class="form-control" type="text" name="employer2_province" placeholder="Province" value="<?php if(isset($singleDataNote->employer2_province)) echo $singleDataNote->employer2_province?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_province" placeholder="Province" value="<?php if(isset($singleDataNote->outside_of_ny_province)) echo $singleDataNote->outside_of_ny_province?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Postal Code</td>
				<td><input class="form-control" type="text" name="employer1_postal_code" placeholder="Postal Code" value="<?php if(isset($singleDataNote->employer1_postal_code)) echo $singleDataNote->employer1_postal_code?>"></td>
				<td><input class="form-control" type="text" name="employer2_postal_code" placeholder="Postal Code" value="<?php if(isset($singleDataNote->employer2_postal_code)) echo $singleDataNote->employer2_postal_code?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_postal_code" placeholder="Postal Code" value="<?php if(isset($singleDataNote->outside_of_ny_postal_code)) echo $singleDataNote->outside_of_ny_postal_code?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Country</td>
				<td><input class="form-control" type="text" name="employer1_country" placeholder="Country" value="<?php if(isset($singleDataNote->employer1_country)) echo $singleDataNote->employer1_country?>"></td>
				<td><input class="form-control" type="text" name="employer2_country" placeholder="Country" value="<?php if(isset($singleDataNote->employer2_country)) echo $singleDataNote->employer2_country?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_country" placeholder="Country" value="<?php if(isset($singleDataNote->outside_of_ny_country)) echo $singleDataNote->outside_of_ny_country?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Occupation</td>
				<td><input class="form-control" type="text" name="employer1_occupation" placeholder="Occupation" value="<?php if(isset($singleDataNote->employer1_occupation)) echo $singleDataNote->employer1_occupation?>"></td>
				<td><input class="form-control" type="text" name="employer2_occupation" placeholder="Occupation" value="<?php if(isset($singleDataNote->employer2_occupation)) echo $singleDataNote->employer2_occupation?>"></td>
				<td><input class="form-control" type="text" name="outside_of_ny_occupation" placeholder="Occupation" value="<?php if(isset($singleDataNote->outside_of_ny_occupation)) echo $singleDataNote->outside_of_ny_occupation?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Date From</td>
				<td><input class="form-control" type="date" name="employer1_date_from" value="<?php if(isset($singleDataNote->employer1_date_from)) echo $singleDataNote->employer1_date_from?>"></td>
				<td><input class="form-control" type="date" name="employer2_date_from" value="<?php if(isset($singleDataNote->employer2_date_from)) echo $singleDataNote->employer2_date_from?>"></td>
				<td><input class="form-control" type="date" name="outside_of_ny_date_from" value="<?php if(isset($singleDataNote->outside_of_ny_date_from)) echo $singleDataNote->outside_of_ny_date_from?>"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:middle">Date To</td>
				<td><input class="form-control" type="date" name="employer1_date_to" value="<?php if(isset($singleDataNote->employer1_date_to)) echo $singleDataNote->employer1_date_to?>"></td>
				<td><input class="form-control" type="date" name="employer2_date_to" value="<?php if(isset($singleDataNote->employer2_date_to)) echo $singleDataNote->employer2_date_to?>"></td>
				<td><input class="form-control" type="date" name="outside_of_ny_date_to" value="<?php if(isset($singleDataNote->outside_of_ny_date_to)) echo $singleDataNote->outside_of_ny_date_to?>"></td>
			</tr>
		</tbody>
	</table>
</div>

<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
	
</fieldset>

        
   






    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h2>Step 3:  INTAKE IMMIGRATION</h2>
            <div class="text-center well">
                <span>FATHER'S INFORMATION</span>
            </div>
            <div class="form-group">
				<label class="control-label col-md-2" for="father_maiden_name">Maiden Name:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="father_maiden_name" id="father_maiden_name" placeholder="Father Maiden Name" value="<?php echo $father_maiden_name?>">
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-md-2" for="father_last_name">Last Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="father_last_name" id="father_last_name" placeholder="Last Name" value="<?php echo $father_last_name?>">
				</div>
				<label class="control-label col-md-2" for="father_first_name">First Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="father_first_name" id="father_first_name" placeholder="First Name" value="<?php echo $father_first_name?>">
				</div>
				<label class="control-label col-md-2" for="father_middle_name">Middle Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="father_middle_name" id="father_middle_name" placeholder="Middle Name" value="<?php echo $father_middle_name?>">
				</div>
			</div>

            <div class="form-group">
				<label class="control-label col-md-3" for="father_birth_location">Location of birth, city, nation:</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="father_birth_location" id="father_birth_location" placeholder="Location of birth" value="<?php echo $father_birth_location?>">
				</div>
				<label class="control-label col-md-2" for="father_date_of_birth">Date of Birth:</label>
				<div class="col-md-2">
					<input type="date" class="form-control" name="father_date_of_birth" id="father_date_of_birth" placeholder="" value="<?php echo $father_date_of_birth?>">
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-2" for="father_country_of_birth">Country of Birth: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="father_country_of_birth" id="father_country_of_birth" placeholder="Country of Birth" value="<?php echo $father_country_of_birth?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-2" for="father_present_address">Present Address: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="father_present_address" id="father_present_address" placeholder="Present Address" value="<?php echo $father_present_address?>">
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-3" for="father_city_town_village_of_residence">City/ Town/ Village of Residence:</label>
				<div class="col-md-3">
                    <input type="text" class="form-control" name="father_city_town_village_of_residence" id="father_city_town_village_of_residence" placeholder="City/ Town/ Village of Residence" value="<?php echo $father_city_town_village_of_residence?>">
                </div>
				<label class="control-label col-md-3" for="father_country_of_residence">Country of Residence:</label>
				<div class="col-md-3">
					<select name="father_country_of_residence" id="father_country_of_residence" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($record->country_name!=""){
							if($father_country_of_residence==$record->id) {
								echo  '<option value="'.$record->id.'" selected>'.$record->country_name.' </option>';
							}
							else {
								echo '<option value="'.$record->id.'">'.$record->country_name.' </option>';
							}
						}
					}
					?>
					</select>
                </div>
            </div>



                

            <br>
            <div class="text-center well">
                <span>MOTHER'S INFORMATION</span>
            </div>
            <div class="form-group">
				<label class="control-label col-md-2" for="mother_maiden_name">Maiden Name:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="mother_maiden_name" id="mother_maiden_name" placeholder="Mother Maiden Name" value="<?php echo $mother_maiden_name?>">
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-md-2" for="mother_last_name">Last Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mother_last_name" id="mother_last_name" placeholder="Last Name" value="<?php echo $mother_last_name?>">
				</div>
				<label class="control-label col-md-2" for="mother_first_name">First Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mother_first_name" id="mother_first_name" placeholder="First Name" value="<?php echo $mother_first_name?>">
				</div>
				<label class="control-label col-md-2" for="mother_middle_name">Middle Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="mother_middle_name" id="mother_middle_name" placeholder="Middle Name" value="<?php echo $mother_middle_name?>">
				</div>
			</div>

            <div class="form-group">
				<label class="control-label col-md-3" for="mother_birth_location">Location of birth, city, nation:</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="mother_birth_location" id="mother_birth_location" placeholder="Location of birth" value="<?php echo $mother_birth_location?>" >
				</div>
				<label class="control-label col-md-2" for="mother_date_of_birth">Date of Birth:</label>
				<div class="col-md-2">
					<input type="date" class="form-control" name="mother_date_of_birth" id="mother_date_of_birth" placeholder="Birth Date:" value="<?php echo $mother_date_of_birth?>" >
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-2" for="mother_country_of_birth">Country of Birth: </label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="mother_country_of_birth" id="mother_country_of_birth" placeholder="Country of Birth" value="<?php echo $mother_country_of_birth?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-2" for="mother_present_address">Present Address: </label>
				<div class="col-md-6">
                    <input type="text" class="form-control" name="mother_present_address" id="mother_present_address" placeholder="Present Address" value="<?php echo $mother_present_address?>">
                </div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-3" for="mother_city_town_village_of_residence">City/ Town/ Village of Residence:</label>
				<div class="col-md-3">
                    <input type="text" class="form-control" name="mother_city_town_village_of_residence" id="mother_city_town_village_of_residence" placeholder="City/ Town/ Village of Residence" value="<?php echo $mother_city_town_village_of_residence?>">
                </div>
				<label class="control-label col-md-3" for="mother_country_of_residence">Country of Residence:</label>
				<div class="col-md-3">
					<select name="mother_country_of_residence" id="mother_country_of_residence" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($record->country_name!=""){
							if($mother_country_of_residence==$record->id) {
								echo  '<option value="'.$record->id.'" selected>'.$record->country_name.' </option>';
							}
							else {
								echo '<option value="'.$record->id.'">'.$record->country_name.' </option>';
							}
						}
					}
					?>
					</select>
                </div>
            </div>

                
            <br> 
            <div class="text-center well">
                <span>MARITAL INFORMATION</span>
            </div>
			<div class="form-group">
                <label class="col-md-12"><h3>What is your marital status (please circle)?</h3></label>
                <div  class="text-center">
					<label class="radio-inline">
						<input type="radio" name="marital_status" value="Single" <?php echo ($marital_status=="Single") ? "checked" : " "?> > Single
					</label>
					<label class="radio-inline">
						<input type="radio" name="marital_status" value="Married" <?php echo ($marital_status=="Married") ? "checked" : " "?>> Married
					</label>
					<label class="radio-inline">
						<input type="radio" name="marital_status" value="Divorced"  <?php echo ($marital_status=="Divorced") ? "checked" : " "?>> Divorced
					</label>
					<label class="radio-inline">
						<input type="radio" name="marital_status" value="Separated"  <?php echo ($marital_status=="Separated") ? "checked" : " "?>> Separated
					</label>
					<label class="radio-inline">
						<input type="radio" name="marital_status" value="Widowed"  <?php echo ($marital_status=="Widowed") ? "checked" : " "?>> Widowed
					</label>
					<label class="radio-inline">
						<input type="radio" name="marital_status" value="Annulled"  <?php echo ($marital_status=="Annulled") ? "checked" : " "?>> Annulled
					</label>
				</div>
            </div>
			
            <br>
			
			<div class="form-group">
				<label class="control-label col-md-2" for="spouse_last_name">Spouse's Last Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="spouse_last_name" id="spouse_last_name" placeholder="Last Name" value="<?php echo $spouse_last_name?>">
				</div>
				<label class="control-label col-md-2" for="spouse_first_name">Spouse's First Name:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="spouse_first_name" id="spouse_first_name" placeholder="First Name" value="<?php echo $spouse_first_name?>">
				</div>
				<label class="control-label col-md-1" for="spouse_middle_name">MI:</label>
				<div class="col-md-2">
					<input type="text" class="form-control" name="spouse_middle_name" id="spouse_middle_name" placeholder="Middle Name" value="<?php echo $spouse_middle_name?>">
				</div>
			</div>
			
            <div class="form-group">
				<label class="control-label col-md-3" for="current_marriage_date">Date of current marriage : </label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="current_marriage_date" id="current_marriage_date" placeholder="Date of current marriage"  value="<?php echo $current_marriage_date?>">
                </div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-4" for="marital_times">How many times have you been married? : </label>
				<div class="col-md-4">
					<input type="number" class="form-control" name="marital_times" id="marital_times"  value="<?php echo $marital_times?>">
                </div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-4" for="city_of_marriage">City of Current Marriage:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="city_of_marriage" id="city_of_marriage"  value="<?php echo $city_of_marriage?>">
                </div>
            </div>


            <div class="form-group">
				<label class="control-label col-md-3" for="state_of_marriage">State/Nation of Current Marriage:</label>
				<div class="col-md-5">
					<select name="state_of_marriage" id="state_of_marriage" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($state_of_marriage==$record->state_code) {
							echo  '<option value="'.$record->state_code.'" selected>'.$record->state_code.' </option>';
						}
						else {
							echo '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
						}
					}
					?>
					</select>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-4" for="province_of_marriage">Province of Current Marriage:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" name="province_of_marriage" id="province_of_marriage"  value="<?php echo $province_of_marriage?>">
                </div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-4" for="country_of_marriage">Country of Current Marriage:</label>
				<div class="col-md-4">
					<select name="country_of_marriage" id="country_of_marriage" class="form-control">
						<option value="" style="display:none">Select an option</option>
					<?php
					foreach($allDataCountry as $record){
						if($record->country_name!=""){
							if($country_of_marriage==$record->id) {
								echo  '<option value="'.$record->id.'" selected>'.$record->country_name.' </option>';
							}
							else {
								echo '<option value="'.$record->id.'">'.$record->country_name.' </option>';
							}
						}
					}
					?>
					</select>
                </div>
            </div>

			<div class="form-group">
				<label class="control-label col-md-3" for="spouse_birth">Spouse's birth date:</label>
				<div class="col-md-5">
					<input type="date" class="form-control" name="spouse_birth" id="spouse_birth" placeholder="Spouse's birth date" value="<?php echo $spouse_birth?>">
				</div>
			</div>


            <div class="form-group">
				<label class="control-label col-md-3" for="spouse_nation_birth">Spouse's City and Nation of Birth:</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="spouse_nation_birth" id="spouse_nation_birth" placeholder="Spouse's  birth Nation" value="<?php echo $spouse_nation_birth?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-3" for="spouse_nationality">Spouse's nationality:</label>
				<div class="col-md-5">
					<input type="text" class="form-control" name="spouse_nationality" id="spouse_nationality" placeholder="Spouse's Nationality" value="<?php echo $spouse_nationality?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-3" for="spouse_ss_number">Spouse's Social Security Number:</label>
					<div class="col-md-5">
					<input type="text" class="form-control" name="spouse_ss_number" id="spouse_ss_number" placeholder="Spouse's Social Security Number"  value="<?php echo $spouse_ss_number?>">
				</div>
            </div>
			
			<hr style="background: #095484; height: 2px; width: 800px;">

            <div class="form-group">
				<label class="control-label col-md-3" for="prior_spouse1">Spouse's Prior Spouse:</label>
					<div class="col-md-3">
					<input type="text" class="form-control" name="prior_spouse1" id="prior_spouse1" placeholder="Spouse's Prior Spouse" value="<?php echo $prior_spouse1?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-3" for="date_of_mariage_of_prior_spouse1">Date of Marriage:</label>
					<div class="col-md-3">
					<input type="date" class="form-control" name="date_of_mariage_of_prior_spouse1" id="date_of_mariage_of_prior_spouse1" placeholder="Date of Marriage" value="<?php echo $date_of_mariage_of_prior_spouse1?>">
				</div>
				<label class="control-label col-md-3" for="place_of_mariage_of_prior_spouse1">Place of Marriage:</label>
					<div class="col-md-3">
					<input type="text" class="form-control" name="place_of_mariage_of_prior_spouse1" id="place_of_mariage_of_prior_spouse1" placeholder="Place of Marriage" value="<?php echo $place_of_mariage_of_prior_spouse1?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-3" for="date_of_divorce1">Date of Divorce:</label>
					<div class="col-md-3">
					<input type="date" class="form-control" name="date_of_divorce1" id="date_of_divorce1" placeholder="Date of Divorce"  value="<?php echo $date_of_divorce1?>">
				</div>
				<label class="control-label col-md-3" for="place_of_divorce1">Place of Divorce:</label>
					<div class="col-md-3">
					<input type="text" class="form-control" name="place_of_divorce1" id="place_of_divorce1" placeholder="Place of Divorce"  value="<?php echo $place_of_divorce1?>">
				</div>
            </div>
			
			<hr style="background: #095484; height: 2px; width: 800px;">
			
			<div class="form-group">
				<label class="control-label col-md-3" for="prior_spouse2">Spouse's Prior Spouse:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="prior_spouse2" id="prior_spouse2" placeholder="Spouse's Prior Spouse" value="<?php echo $prior_spouse2?>">
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-3" for="date_of_mariage_of_prior_spouse2">Date of Marriage:</label>
				<div class="col-md-3">
					<input type="date" class="form-control" name="date_of_mariage_of_prior_spouse2" id="date_of_mariage_of_prior_spouse2" placeholder="Date of Marriage" value="<?php echo $date_of_mariage_of_prior_spouse2?>">
				</div>
				<label class="control-label col-md-3" for="place_of_mariage_of_prior_spouse2">Place of Marriage:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="place_of_mariage_of_prior_spouse2" id="place_of_mariage_of_prior_spouse2" placeholder="Place of Marriage" value="<?php echo $place_of_mariage_of_prior_spouse2?>">
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-3" for="date_of_divorce2">Date of Divorce:</label>
					<div class="col-md-3">
					<input type="date" class="form-control" name="date_of_divorce2" id="date_of_divorce2" placeholder="Date of Divorce " value="<?php echo $date_of_divorce2?>">
				</div>
				<label class="control-label col-md-3" for="place_of_divorce2">Place of Divorce:</label>
					<div class="col-md-3">
					<input type="text" class="form-control" name="place_of_divorce2" id="place_of_divorce2" placeholder="Place of Divorce " value="<?php echo $place_of_divorce2?>">
				</div>
            </div>

            <br>
            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
            <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />

    </fieldset>




    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
        <h2>Step 4:  INTAKE IMMIGRATION</h2>
        <div class="text-center well">
            <span>SPOUSE'S ADDRESSES DURING THE LAST 5 YEARS</span>
        </div>
        <div class="text-center">
            <table class=" table table-bordered table-striped ">
                <thead class="thead-dark">
                <tr>
                    <td><h4>SL#</h4></td>
                   <td><h4>Street</h4></td> 
                   <td><h4>City</h4></td> 
                   <td><h4>State</h4></td> 
                   <td><h4>Zip Code</h4></td> 
                   <td><h4>Dates</h4></td> 
                </tr>
                    
                </thead>
                <tbody>
<tr>
	<td>1</td>
	<td><input class="form-control" type="text" name="spouse_street[]"     placeholder="street" value="<?php if(isset($singleDataNote->spouse_street)) echo $spouse_street[0]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_city[]"  placeholder="City"  value="<?php if(isset($singleDataNote->spouse_city)) echo $spouse_city[0]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_state[]"  placeholder="State "  value="<?php if(isset($singleDataNote->spouse_state)) echo $spouse_state[0]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_zip[]"  placeholder="Zip Code"  value="<?php if(isset($singleDataNote->spouse_zip)) echo $spouse_zip[0]?>" ></td>
	<td><input class="form-control" type="date" name="spouse_dates[]"  placeholder=""  value="<?php if(isset($singleDataNote->spouse_dates)) echo $spouse_dates[0]?>" ></td>
</tr>
<tr>
	<td>2</td>
	<td><input class="form-control" type="text" name="spouse_street[]"     placeholder="street"  value="<?php if(isset($singleDataNote->spouse_street)) echo $spouse_street[1]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_city[]"  placeholder="City"  value="<?php if(isset($singleDataNote->spouse_city)) echo $spouse_city[1]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_state[]"  placeholder="State "  value="<?php if(isset($singleDataNote->spouse_state)) echo $spouse_state[1]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_zip[]"  placeholder="Zip Code"  value="<?php if(isset($singleDataNote->spouse_zip)) echo $spouse_zip[1]?>" ></td>
	<td><input class="form-control" type="date" name="spouse_dates[]"  placeholder=""  value="<?php if(isset($singleDataNote->spouse_dates)) echo $spouse_dates[1]?>" ></td>
</tr>
<tr>
	<td>3</td>
	<td><input class="form-control" type="text" name="spouse_street[]"     placeholder="street"  value="<?php if(isset($singleDataNote->spouse_street)) echo $spouse_street[2]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_city[]"  placeholder="City"  value="<?php if(isset($singleDataNote->spouse_city)) echo $spouse_city[2]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_state[]"  placeholder="State "  value="<?php if(isset($singleDataNote->spouse_state)) echo $spouse_state[2]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_zip[]"  placeholder="Zip Code"  value="<?php if(isset($singleDataNote->spouse_zip)) echo $spouse_zip[2]?>" ></td>
	<td><input class="form-control" type="date" name="spouse_dates[]"  placeholder=""  value="<?php if(isset($singleDataNote->spouse_dates)) echo $spouse_dates[2]?>" ></td>
</tr>
<tr>
	<td>4</td>
	<td><input class="form-control" type="text" name="spouse_street[]"     placeholder="street"  value="<?php if(isset($singleDataNote->spouse_street)) echo $spouse_street[3]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_city[]"  placeholder="City"  value="<?php if(isset($singleDataNote->spouse_city)) echo $spouse_city[3]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_state[]"  placeholder="State "  value="<?php if(isset($singleDataNote->spouse_state)) echo $spouse_state[3]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_zip[]"  placeholder="Zip Code"  value="<?php if(isset($singleDataNote->spouse_zip)) echo $spouse_zip[3]?>" ></td>
	<td><input class="form-control" type="date" name="spouse_dates[]"  placeholder=""  value="<?php if(isset($singleDataNote->spouse_dates)) echo $spouse_dates[3]?>" ></td>
</tr>
<tr>
	<td>5</td>
	<td><input class="form-control" type="text" name="spouse_street[]"     placeholder="street" value="<?php if(isset($singleDataNote->spouse_street)) echo $spouse_street[4]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_city[]"  placeholder="City" value="<?php if(isset($singleDataNote->spouse_city)) echo $spouse_city[4]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_state[]"  placeholder="State " value="<?php if(isset($singleDataNote->spouse_state)) echo $spouse_state[4]?>" ></td>
	<td><input class="form-control" type="text" name="spouse_zip[]"  placeholder="Zip Code" value="<?php if(isset($singleDataNote->spouse_zip)) echo $spouse_zip[4]?>" ></td>
	<td><input class="form-control" type="date" name="spouse_dates[]"  placeholder="" value="<?php if(isset($singleDataNote->spouse_dates)) echo $spouse_dates[4]?>" ></td>
</tr>
                </tbody>
            </table>
        </div>
                <br>
        <div class="text-center well">
            <span>SPOUSE'S EMPLOYMENT FOR THE LAST 5 YEARS</span>
        </div>
        <div class="text-center">
            <table class=" table table-bordered table-striped ">
                <thead class="thead-dark">
                <tr>
                    <td><h4>SL#</h4></td>
                   <td><h4>Company</h4></td> 
                   <td><h4>Phone</h4></td>  
                   <td><h4>Dates</h4></td> 
                </tr>
                    
                </thead>
                <tbody>
<tr>
	<td>1</td>
	<td><input class="form-control" type="text" name="spouse_company[]"  placeholder="Company Name " value="<?php if(isset($singleDataNote->spouse_company)) echo $singleDataNote->spouse_company[0]?>"></td>
	<td><input class="form-control" type="text" name="spouse_company_phone[]" placeholder="Company phone" value="<?php if(isset($singleDataNote->spouse_company_phone)) echo $singleDataNote->spouse_company_phone[0]?>"></td>
	<td><input class="form-control" type="date" name="spouse_company_dates[]" placeholder="" value="<?php if(isset($singleDataNote->spouse_company_dates)) echo $singleDataNote->spouse_company_dates[0]?>"></td>
</tr>
<tr>
	<td>2</td>
	<td><input class="form-control" type="text" name="spouse_company[]"  placeholder="Company Name " value="<?php if(isset($singleDataNote->spouse_company)) echo $singleDataNote->spouse_company[1]?>"></td>
	<td><input class="form-control" type="text" name="spouse_company_phone[]" placeholder="Company phone" value="<?php if(isset($singleDataNote->spouse_company_phone)) echo $singleDataNote->spouse_company_phone[1]?>"></td>
	<td><input class="form-control" type="date" name="spouse_company_dates[]" placeholder="" value="<?php if(isset($singleDataNote->spouse_company_dates)) echo $singleDataNote->spouse_company_dates[1]?>"></td>
</tr>
<tr>
	<td>3</td>
	<td><input class="form-control" type="text" name="spouse_company[]"  placeholder="Company Name " value="<?php if(isset($singleDataNote->spouse_company)) echo $singleDataNote->spouse_company[2]?>"></td>
	<td><input class="form-control" type="text" name="spouse_company_phone[]" placeholder="Company phone" value="<?php if(isset($singleDataNote->spouse_company_phone)) echo $singleDataNote->spouse_company_phone[2]?>"></td>
	<td><input class="form-control" type="date" name="spouse_company_dates[]" placeholder="" value="<?php if(isset($singleDataNote->spouse_company_dates)) echo $singleDataNote->spouse_company_dates[2]?>"></td>
</tr>
<tr>
	<td>4</td>
	<td><input class="form-control" type="text" name="spouse_company[]"  placeholder="Company Name " value="<?php if(isset($singleDataNote->spouse_company)) echo $singleDataNote->spouse_company[3]?>"></td>
	<td><input class="form-control" type="text" name="spouse_company_phone[]" placeholder="Company phone" value="<?php if(isset($singleDataNote->spouse_company_phone)) echo $singleDataNote->spouse_company_phone[3]?>"></td>
	<td><input class="form-control" type="date" name="spouse_company_dates[]" placeholder="" value="<?php if(isset($singleDataNote->spouse_company_dates)) echo $singleDataNote->spouse_company_dates[3]?>"></td>
</tr>
<tr>
	<td>5</td>
	<td><input class="form-control" type="text" name="spouse_company[]"  placeholder="Company Name " value="<?php if(isset($singleDataNote->spouse_company)) echo $singleDataNote->spouse_company[4]?>"></td>
	<td><input class="form-control" type="text" name="spouse_company_phone[]" placeholder="Company phone" value="<?php if(isset($singleDataNote->spouse_company_phone)) echo $singleDataNote->spouse_company_phone[4]?>"></td>
	<td><input class="form-control" type="date" name="spouse_company_dates[]" placeholder="" value="<?php if(isset($singleDataNote->spouse_company_dates)) echo $singleDataNote->spouse_company_dates[4]?>"></td>
</tr>
                </tbody>
            </table>
        </div>
        <br>
        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>



    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
            <h2>Step 5:  INTAKE IMMIGRATION</h2>
            <div class="text-center well">
                <span>SPOUSE'S INFORMATION (CONTINUED)</span>
            </div>
                <div class="form-group">
					<label class="control-label col-md-3" for="spouse_father_name">Spouse's Father's Name:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="spouse_father_name" id="spouse_father_name" placeholder="Spouse's Father's Name"  value="<?php echo $spouse_father_name?>">
					</div>

					<label class="control-label col-md-2" for="spouse_father_birth">Birthdate:</label>
					<div class="col-md-2">
						<input type="date" class="form-control" name="spouse_father_birth" id="spouse_father_birth" placeholder="" value="<?php echo $spouse_father_birth?>"> 
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-3" for="spouse_father_birth_location">Location of birth, city, nation:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="spouse_father_birth_location" id="spouse_father_birth_location" placeholder="Location of birth, city, nation" value="<?php echo $spouse_father_birth_location?>" >
					</div>
                </div>

                <div class="form-group">
					<label class="control-label col-md-3" for="spouse_father_address">Present Address:</label>
					<div class="col-md-4">
						<textarea name="spouse_father_address" id="spouse_father_address" class="form-control" cols="60" rows="3"><?php echo $spouse_father_address?></textarea>
					</div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="spouse_mother">Spouse's Mother's Name:</label>
                    <div class="col-md-4">
						<input type="text" class="form-control" name="spouse_mother" id="spouse_mother" placeholder="Spouse's Mother's Name" value="<?php echo $spouse_mother?>">
                    </div>

                    <label class="control-label col-md-2" for="spouse_mother_birth">Birthdate:</label>
                    <div class="col-md-2">
						<input type="date" class="form-control" name="spouse_mother_birth" id="spouse_mother_birth" placeholder="Mother's birth date"  value="<?php echo $spouse_mother_birth?>">
                    </div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="spouse_mother_birth_location">Location of birth, city, nation:</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="spouse_mother_birth_location" id="spouse_mother_birth_location" placeholder="Location of birth, city, nation" value="<?php echo $spouse_mother_birth_location?>">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3" for="spouse_mother_present_address">Present Address:</label>
					<div class="col-md-4">
						<textarea name="spouse_mother_present_address" id="spouse_mother_present_address" class="form-control" cols="60" rows="3"> <?php echo $spouse_mother_present_address?></textarea>
					</div>
				</div>

            <div class="text-center well">
                <span>ALIEN'S PRIOR MARRIAGE INFORMATION</span>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="alien_name_of_prior_spouse"> Name of prior spouse:</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="alien_name_of_prior_spouse" id="alien_name_of_prior_spouse" placeholder="Name of prior spouse" value="<?php echo $alien_name_of_prior_spouse?>">
                </div>

                <label class="control-label col-md-2" for="alien_date_of_birth">Birthdate:</label>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="alien_date_of_birth" id="alien_date_of_birth" placeholder="prior birth date" value="<?php echo $alien_date_of_birth?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" for="alien_place_of_marriage">Place of Marriage:</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="alien_place_of_marriage" id="alien_place_of_marriage" placeholder="Place of Marriage" value="<?php echo $alien_place_of_marriage?>">
                </div>

                <label class="control-label col-md-2" for="alien_date_of_marriage">Date of Marriage:</label>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="alien_date_of_marriage" id="alien_date_of_marriage" placeholder="Date of Mariage"  value="<?php echo $alien_date_of_marriage?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3" for="alien_place_divorce">Place of Divorce:</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="alien_place_divorce" id="alien_place_divorce" placeholder="Place of Divorce"  value="<?php echo $alien_place_divorce?>">
                </div>
                <label class="control-label col-md-2" for="alien_date_of_divorce">Date of Divorce:</label>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="alien_date_of_divorce" id="alien_date_of_divorce" placeholder="Date of Divorce" value="<?php echo $alien_date_of_divorce?>">
                </div>
            </div>

                

                <br>
                <div class="text-center well">
                    <span>SPOUSE'S PRIOR MARRIAGE INFORMATION</span>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="spouse_prior_name"> Name of prior spouse:</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="spouse_prior_name" id="spouse_prior_name" placeholder="Name of prior spouse" value="<?php echo $spouse_prior_name?>">
                    </div>
                    <label class="control-label col-md-2" for="spouse_prior_date_of_birth">Birth Date:</label>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="spouse_prior_date_of_birth" id="spouse_prior_date_of_birth" placeholder="Date of Birth" value="<?php echo $spouse_prior_date_of_birth?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3" for="spouse_prior_mariage_place">Place of Marriage:</label>
                    <div class="col-md-4">
                <input type="text" class="form-control" name="spouse_prior_mariage_place" id="spouse_prior_mariage_place" placeholder="Place of Marriage" value="<?php echo $spouse_prior_mariage_place?>">
                    </div>

                    <label class="control-label col-md-2" for="spouse_prior_mariage_date">Date of Marriage:</label>
                    <div class="col-md-2">
                    <input type="date" class="form-control" name="spouse_prior_mariage_date" id="spouse_prior_mariage_date" placeholder="Date of Mariage" value="<?php echo $spouse_prior_mariage_date?>">
                    </div>
                </div>

                <div class="form-group">
                  
                    <label class="control-label col-md-3" for="spouse_prior_divorce_place">Place of Divorce:</label>
                    <div class="col-md-4">
                    <input type="text" class="form-control" name="spouse_prior_divorce_place" id="spouse_prior_divorce_place" placeholder="Place of Divorce" value="<?php echo $spouse_prior_divorce_place?>">
                    </div>

                    <label class="control-label col-md-2" for="spouse_prior_divorce_date">Date of Divorce:</label>
                    <div class="col-md-2">
                    <input type="date" class="form-control" name="spouse_prior_divorce_date" id="spouse_prior_divorce_date" placeholder="Date of Divorce" value="<?php echo $spouse_prior_divorce_date?>">
                    
                </div>
             </div>

                <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
    </fieldset>


    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
             <h2>Step 6:  INTAKE IMMIGRATION</h2> 
            <div class="text-center well">
                <h3 style="margin:0">GENERAL QUESTIONS:</h3>
                <h4 style="margin:0">(CIRCLE ANSWERS, provide detail as specified)</h4>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">Are you known by any other names?<br>Include maiden or native alphabetic question_spelling.</label>
				<div class="col-md-6">
					<label class="radio-inline">
						<input type="radio" name="spelling"  value="Yes" <?php echo ($spelling=="Yes") ? "checked" : " "?> > Yes 
					</label>
					<label class="radio-inline">
						<input type="radio" name="spelling"  value="No" <?php echo ($spelling=="No") ? "checked" : " "?> > No 
					</label>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">If yes, list other names you have used:</label>
				<div class="col-md-6">
					<textarea name="other_names" id="other_names" class="form-control" cols="50" rows="3"> <?php echo $other_names?></textarea>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">Do you have a job or offer from a U.S. employer?</label>
				<div class="col-md-6">
					<label class="radio-inline">
						<input type="radio" name="job_offer" value="Yes" <?php echo ($job_offer=="Yes") ? "checked" : " "?> > Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="job_offer" value="No" <?php echo ($job_offer=="No") ? "checked" : " "?> > No 
					</label>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">If yes, please provide the employer's name and address, and<br>a description of the job you have been offered:</label>
				<div class="col-md-6">
					<textarea name="job_offer_detail" id="job_offer_detail" class="form-control" cols="50" rows="3"><?php echo $job_offer_detail?> </textarea>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">Do you have family members now living in the U.S.?</label>
				<div class="col-md-6">
					<label class="radio-inline">
						<input type="radio" name="family_member"  value="Yes" <?php echo ($family_member=="Yes") ? "checked" : " "?> > Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="family_member"  value="No" <?php echo ($family_member=="No") ? "checked" : " "?> > No 
					</label>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">If yes, please provide the name and address of your family member, and <br>describe how you are related to that family member. :</label>
				<div class="col-md-6">
					<textarea name="family_member_details" id="family_member_details" class="form-control" cols="50" rows="3">   <?php echo $family_member_details?></textarea>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">Please set out the reason(s) you wish to enter, or remain in, the U.S. :</label>
				<div class="col-md-6">
					<textarea name="reason_enter" id="reason_enter" class="form-control" cols="50" rows="3"> <?php echo $reason_enter?> </textarea>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">If you are applying for a visa to enter the U.S., do you wish<br>to bring members of your family with you?</label>
				<div class="col-md-6">
					<label class="radio-inline">
						<input type="radio" name="bring_members" value="Yes" <?php echo ($bring_members=="Yes") ? "checked" : " "?> > Yes 
					</label>
					<label class="radio-inline">
						<input type="radio" name="bring_members" value="No" <?php echo ($bring_members=="No") ? "checked" : " "?> > No 
					</label>
				</div>
            </div>

            <div class="form-group">
				<label class="control-label col-md-6">Have you ever entered the U.S. on a visa other than a tourist visa?</label>
				<div class="col-md-2">
					<label class="radio-inline">
						<input type="radio" name="have_tourist" value="Yes" <?php echo ($have_tourist=="Yes") ? "checked" : " "?> > Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="have_tourist"value="No" <?php echo ($have_tourist=="No") ? "checked" : " "?> > No 
					</label>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">If yes, please provide the dates you were in the U.S. and the type of visa used.:</label>
				<div class="col-md-6">
					<textarea name="type_visa_used" id="type_visa_used" class="form-control" cols="50" rows="3"><?php echo $type_visa_used?> </textarea>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">Have you ever been denied permission to enter<br>the U.S., or ordered to leave the U.S.?</label>
				<div class="col-md-6">
					<label class="radio-inline">
						<input type="radio" name="denied_permission"  value="Yes" <?php echo ($denied_permission=="Yes") ? "checked" : " "?> > Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="denied_permission" value="No" <?php echo ($denied_permission=="No") ? "checked" : " "?> > No 
					</label>
				</div>
            </div>
            <div class="form-group">
				<label class="control-label col-md-6">If yes, please give the reason and the relevant dates:</label>
				<div class="col-md-6">
					<textarea name="reason_denied" id="reason_denied" class="form-control" cols="50" rows="3"><?php echo $reason_denied?> </textarea>
				</div>
            </div>


            <br>
            <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
            <input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />

        <br>
     </fieldset>


    <fieldset>
    <input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />
        <h2>Step 7: INTAKE IMMIGRATION</h2>
         <div class="text-center well">
                <h3 style="margin:0">GENERAL QUESTIONS:</h3> 
                <h4 style="margin:0">(Continued)</h4>
         </div>
         <div class="form-group">
			<label class="control-label col-md-6">Have you ever been convicted of a crime<br>(other than non-criminal traffic offense)?</label>
			<div class="col-md-2">
				<label class="radio-inline">
					<input type="radio" name="convicted_crime"value="Yes" <?php echo ($convicted_crime=="Yes") ? "checked" : " "?> > Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="convicted_crime"  value="No" <?php echo ($convicted_crime=="No") ? "checked" : " "?> > No 
				</label>
			</div>
        </div>
        <div class="form-group">
			<label class="control-label col-md-6">If yes, please provide the details, including the offense for which you were convicted, the sentence or penalty imposed, and the date of the offense.:</label>
			<div class="col-md-6">
				<textarea name="convicted_crime_txt" id="" class="form-control" cols="50" rows="4"><?php echo $convicted_crime_txt?>  </textarea>
			</div>
        </div>

        <div class="form-group">
			<label class="control-label col-md-6">If you are now in the U.S. have you been ordered to leave, or <br>do you believe you may be ordered to leave?</label>
			<div class="col-md-6">
				<label class="radio-inline">
					<input type="radio" name="ordered_leave"  value="Yes" <?php echo ($ordered_leave=="Yes") ? "checked" : " "?> > Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="ordered_leave"  value="No" <?php echo ($ordered_leave=="No") ? "checked" : " "?>> No 
				</label>
			</div>
        </div>
       
        <div class="form-group">
			<label class="control-label col-md-6">If yes, please provide the details, including the reason for the order :</label>
			<div class="col-md-6">
				<textarea name="ordered_leave_txt" class="form-control" cols="50" rows="4"> <?php echo $ordered_leave_txt?> </textarea>
			</div>
        </div>
        <div class="form-group">
			<label class="control-label col-md-6">Are you making a claim for political asylum?</label>
			<div class="col-md-6">
				<label class="radio-inline">
					<input type="radio" name="political"  value="Yes" <?php echo ($political=="Yes") ? "checked" : " "?> > Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="political"  value="No" <?php echo ($political=="No") ? "checked" : " "?> > No 
				</label>
			</div>
        </div>
        <div class="form-group">
			<label class="control-label col-md-6">If yes, please provide the details, including the reasons for your claim. :</label>
			<div class="col-md-6">
				<textarea name="political_txt" id="political_txt" class="form-control" cols="50" rows="4"> <?php echo $political_txt?> </textarea>
			</div>
        </div>

        <div class="form-group">
			<label class="control-label col-md-6">Have other attorneys worked on this matter?</label>
			<div class="col-md-6">
				<label class="radio-inline">
					<input type="radio" name="attorneys_worked" value="Yes" <?php echo ($attorneys_worked=="Yes") ? "checked" : " "?>> Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="attorneys_worked"  value="No" <?php echo ($attorneys_worked=="No") ? "checked" : " "?>> No 
				</label>
			</div>
		</div>
	
		<div class="form-group">
			<label class="control-label col-md-6">If yes, provide names, addresses, and a brief description of their involvement: </label>
			<div class="col-md-6">
				<textarea name="attorneys_worked_details" id="attorneys_worked_details" class="form-control" cols="50" rows="4"> <?php echo $attorneys_worked_details?> </textarea>
			</div>
		</div>
		
        <br>
		<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
		<input type="button" name="data[password]" class="next btn btn-info" value="Next" style="float:right" />
        
     </fieldset>



     <fieldset>
		 <h2>Step 8:  INTAKE IMMIGRATION</h2>
		<div class="text-center well">
			<span>CHILDREN INFORMATION</span>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="first_child_name">First Child's name:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="first_child_name" id="first_child_name" placeholder="First Child's name" value="<?php echo $first_child_name?>">
			</div>
			<label class="control-label col-md-1" for="first_child_a">A#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="first_child_a" id="first_child_a" placeholder="" value="<?php echo $first_child_a?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="first_child_current_address">Current Address:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="first_child_current_address" id="first_child_current_address" placeholder=" Child Current Address" value="<?php echo $first_child_current_address?>">
			</div>
			<label class="control-label col-md-1" for="first_child_ss">SS#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="first_child_ss" id="first_child_ss" placeholder="" value="<?php echo $first_child_ss?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3" for="first_child_us_entry_date">Date child entered United States:</label>
			<div class="col-md-4">
				<input type="date" class="form-control" name="first_child_us_entry_date" id="first_child_us_entry_date" placeholder=" " value="<?php echo $first_child_us_entry_date?>">
			</div>
			<label class="control-label col-md-1" for="first_child_dob">DOB:</label>
			<div class="col-md-3">
				<input type="date" class="form-control" name="first_child_dob" id="first_child_dob" placeholder="" value="<?php echo $first_child_dob?>">
			</div>
		</div>
		<br>
		<hr style="background: #095484; height: 2px; width: 800px;">

		<div class="form-group">
			<label class="control-label col-md-2" for="second_child_name">Second Child's name:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="second_child_name" id="second_child_name" placeholder="Second Child's name" value="<?php echo $second_child_name?>">
			</div>
			<label class="control-label col-md-1" for="second_child_a">A#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="second_child_a" id="second_child_a" placeholder="" value="<?php echo $second_child_a?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="second_child_current_address">Current Address:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="second_child_current_address" id="second_child_current_address" placeholder=" Child Current Address" value="<?php echo $second_child_current_address?>" >
			</div>
			<label class="control-label col-md-1" for="second_child_ss">SS#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="second_child_ss" id="second_child_ss" placeholder=""  value="<?php echo $second_child_ss?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3" for="second_child_us_entry_date">Date child entered United States:</label>
			<div class="col-md-4">
				<input type="date" class="form-control" name="second_child_us_entry_date" id="second_child_us_entry_date" placeholder=" "  value="<?php echo $second_child_us_entry_date?>">
			</div>
			<label class="control-label col-md-1" for="second_child_dob">DOB:</label>
			<div class="col-md-3">
				<input type="date" class="form-control" name="second_child_dob" id="second_child_dob" placeholder="" value="<?php echo $second_child_dob?>">
			</div>
		</div>
		<br>
		<hr style="background: #095484; height: 2px; width: 800px;">

		<div class="form-group">
			<label class="control-label col-md-2" for="third_child_name">Third Child's Name:</label> 
			<div class="col-md-5">
				<input type="text" class="form-control" name="third_child_name" id="third_child_name" placeholder="Third Child's name"  value="<?php echo $third_child_name?>">
			</div>
			<label class="control-label col-md-1" for="third_child_a">A#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="third_child_a" id="third_child_a" placeholder=""  value="<?php echo $third_child_a?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="third_child_current_address">Current Address:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="third_child_current_address" id="third_child_current_address" placeholder="Third Child Current Address" value="<?php echo $third_child_current_address?>">
			</div>
			<label class="control-label col-md-1" for="third_child_ss">SS#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="third_child_ss" id="third_child_ss" placeholder="" value="<?php echo $third_child_ss?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3" for="third_child_us_entry_date">Date child entered United States:</label>
			<div class="col-md-4">
				<input type="date" class="form-control" name="third_child_us_entry_date" id="third_child_us_entry_date" placeholder=" " value="<?php echo $third_child_us_entry_date?>">
			</div>
			<label class="control-label col-md-1" for="third_child_dob">DOB:</label>
			<div class="col-md-3">
				<input type="date" class="form-control" name="third_child_dob" id="third_child_dob" placeholder="" value="<?php echo $third_child_dob?>">
			</div>
		</div>
		<br>
		<hr style="background: #095484; height: 2px; width: 800px;">

		<div class="form-group">
			<label class="control-label col-md-2" for="fourth_child_name">Fourth Child's Name:</label> 
			<div class="col-md-5">
				<input type="text" class="form-control" name="fourth_child_name" id="fourth_child_name" placeholder="Fourth Child's name" value="<?php echo $fourth_child_name?>">
			</div>
			<label class="control-label col-md-1" for="fourth_child_a">A#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="fourth_child_a" id="fourth_child_a" placeholder="" value="<?php echo $fourth_child_a?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="fourth_child_current_address">Current Address:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="fourth_child_current_address" id="fourth_child_current_address" placeholder=" Fourth Child Current Address" value="<?php echo $fourth_child_current_address?>" >
			</div>
			<label class="control-label col-md-1" for="fourth_child_ss">SS#:</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="fourth_child_ss" id="fourth_child_ss" placeholder="" value="<?php echo $fourth_child_ss?>">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3" for="fourth_child_us_entry_date">Date child entered United States:</label>
			<div class="col-md-4">
				<input type="date" class="form-control" name="fourth_child_us_entry_date" id="fourth_child_us_entry_date" placeholder=" " value="<?php echo $fourth_child_us_entry_date?>">
			</div>
			<label class="control-label col-md-1" for="fourth_child_dob">DOB:</label>
			<div class="col-md-3">
				<input type="date" class="form-control" name="fourth_child_dob" id="fourth_child_dob" placeholder=""  value="<?php echo $fourth_child_dob?>">
			</div>
		</div>
		
		<br>
		
		<div class="text-center well">
			<span>EMPLOYER INFORMATION (If employer petition)</span>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="business_name">Name of Business:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="business_name" id="business_name" placeholder=" Name of Business"  value="<?php echo $business_name?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="employer_fein">FEIN#:</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="employer_fein" id="employer_fein" placeholder="Federal Employer Identification Number "  value="<?php echo $employer_fein?>" >
			</div>
			 <label class="control-label col-md-2" for="business_type">Type of Business:</label>
			<div class="col-md-2">
				<input type="text" class="form-control" name="business_type" id="business_type" placeholder="Type of Business " value="<?php echo $business_type?>" >
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="business_address">Business Address: </label>
			<div class="col-md-5">
				<textarea name="business_address" id="business_address" class="form-control" cols="60" rows="4"><?php echo $business_address?>  </textarea>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3" for="business_establish">Date business established:</label>
			<div class="col-md-4">
				<input type="date" class="form-control" name="business_establish" id="business_establish" placeholder="Date business established " value="<?php echo $business_establish?>" >
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3" for="employee_number">Number of Employees:</label>
		   <div class="col-md-4">
				<input type="number" class="form-control" name="employee_number" id="employee_number" placeholder="Number of Employees" value="<?php echo $employee_number?>">
		   </div>
	   </div>

		   <div class="form-group">
				<label class="control-label col-md-3" for="applicanat_nature">Nature of applicants work:</label>
			   <div class="col-md-4">
					<input type="text" class="form-control" name="applicanat_nature" id="applicanat_nature" placeholder="Nature of applicants work" value="<?php echo $applicanat_nature?>"> 
			   </div>
		   </div>

		   <div class="form-group">
				<label class="control-label col-md-3" for="soc_code">SOC Code:</label>
			   <div class="col-md-4">
					<input type="text" class="form-control" name="soc_code" id="soc_code" placeholder="SOC Code" value="<?php echo $soc_code?>">
			   </div>

			   <label class="control-label col-md-2" for="naics_code">NAICS Code:</label>
			   <div class="col-md-2">   
					<input type="text" class="form-control" name="naics_code" id="naics_code" placeholder="NAICS Code" value="<?php echo $naics_code?>">
			   </div>
		   </div>
		   <div class="form-group">
				<label class="control-label col-md-4" for="employee_beneficiary">Number of Employees beneficiary supervises:</label>
			   <div class="col-md-7">
					<input type="text" class="form-control" name="employee_beneficiary" id="employee_beneficiary" placeholder="Number of Employees beneficiary supervises" value="<?php echo $employee_beneficiary?>">
			   </div>
		   </div>
			   <br>



		<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
		<input style="float: right;" type="submit" name="submit" class="submit btn btn-success" value="Save" id="submit_data" />

		<br>
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
		url:"fetch.php?formNo=1&<?php echo $getId?>",
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