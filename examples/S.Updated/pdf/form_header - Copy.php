<?php
require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$first_name = $last_name = $middle_name = $street_address  = $date_of_birth = $father_date_of_birth = $father_maiden_name = $father_first_name = $father_middle_name = $father_last_name = $mother_maiden_name = $mother_first_name = $mother_middle_name = $mother_last_name = $marital_status = $father_birth_location = $nationality = $city = $state = $zip = $father_present_address = $mother_present_address = $mother_birth_location = $employee_company1 = $employee_company2 = $employee_company3 = $social_security_number = $city_town_village_of_birth = $mother_date_of_birth = $spouse_first_name = $spouse_middle_name = $spouse_last_name = $marital_times = $province = $postal_code = $country_name = $apt_ste_flr =  $apt_ste_flr_value = $a_number = $uscis_online_account_number = $volag_number = $gender = $city_of_marriage = $state_of_marriage = $province_of_marriage = $father_country_of_birth = $mother_country_of_birth = $employer1_name = $employer1_address = $employer1_apt_ste_flr = $employer1_city_or_town = $employer1_state = $employer1_zip_code = $employer1_province = $employer1_postal_code = $employer1_country = $employer1_occupation = $employer1_date_from = $employer1_date_to = $employer2_name = $employer2_address = $employer2_apt_ste_flr = $employer2_city_or_town = $employer2_state = $employer2_zip_code = $employer2_province = $employer2_postal_code = $employer2_country = $employer2_occupation = $employer2_date_from = $employer2_date_to = $spouse_nationality = $spouse_prior_spouse = $spouse_prior_marriage_date = $spouse_prior_spouse_marriage_end_date = $spouse_birth_date = $frst_child_name =  $first_child_a_number = $first_child_dob = $first_child_adress = $second_child_address = $second_child_dob = $secon_child_a_number = $second_child_name = $third_child_name = $third_child_a_number = $third_child_dob = $third_child_address = $fourth_child_name = $fourth_child_a_number = $fourth_child_dob = $fourth_child_address = $evening_or_home_phone = $work_or_business_phone = $crime_convicted = $passport_number = $passport_expire_date = $country_issued_pasport = $last_arival_date_us = $last_arival_place_us = $address1_street_number =  $address1_city = $address1_state =  $address1_zip = $address1_date = $address2_street_number = $address2_city = $address2_state = $address2_zip = $address2_date  = $employee_dates1 = $employee_dates2 = $employee_dates3 = $spouse_city_town_birth = $spouse_prior_place_mariage = $spouse_prior_place_divorce = " "; 







$allDataCountry = $objQuery->indexByQueryAllData("SELECT * FROM countries");

if(isset($_GET['clientId'])){
	$clientId = $_GET['clientId'];
	$singleData = $objQuery->indexByQuerySingleData("SELECT * FROM intake_form_info WHERE sha1(MD5(client_id))='$clientId'");
	$singleDataNote = json_decode($singleData->note);
	
	if($singleData !=true){
		$clientInfo = $objQuery->indexByQuerySingleData("SELECT * from client_info WHERE sha1(MD5(id))='$clientId'");
		if($clientInfo) {
			$first_name = $clientInfo->first_name;
			$last_name = $clientInfo->last_name;
			$city = $clientInfo->city;
			$state = $clientInfo->state;
			$zip = $clientInfo->zip;
			if($clientInfo->dob!="" && $clientInfo->dob!="0000-00-00"){
				$date_of_birth = " ".date("m/d/Y",strtotime($clientInfo->dob));
			}
		}
	} else {
		$first_name = $singleDataNote->first_name;
		$last_name = $singleDataNote->last_name;
		$middle_name = $singleDataNote->middle_name;
		$father_maiden_name = $singleDataNote->father_maiden_name;
		$father_first_name = $singleDataNote->father_first_name;
		$father_middle_name = $singleDataNote->father_middle_name;
		$father_last_name = $singleDataNote->father_last_name;
		$mother_maiden_name = $singleDataNote->mother_maiden_name;
		$mother_first_name = $singleDataNote->mother_first_name;
		$mother_middle_name = $singleDataNote->mother_middle_name;
		$mother_last_name = $singleDataNote->mother_last_name;
		$marital_status = $singleDataNote->marital_status;
		$street_address = $singleDataNote->street_address;
		$state = $singleDataNote->state;
		$city = $singleDataNote->city;
		$zip = $singleDataNote->zip;
		$nationality = $singleDataNote->nationality;
		$employee_company1 = $singleDataNote->employee_company[0];
		$employee_company2 = $singleDataNote->employee_company[1];
		$employee_company3 = $singleDataNote->employee_company[2];
		$employee_dates1 = date("m/d/Y",strtotime($singleDataNote->employee_dates[0]));
		$employee_dates2 = date("m/d/Y",strtotime($singleDataNote->employee_dates[1]));
		$employee_dates3 = date("m/d/Y",strtotime($singleDataNote->employee_dates[2]));


		$evening_or_home_phone = $singleDataNote->home_phone;
		$work_or_business_phone = $singleDataNote->business_phone;
		if($singleDataNote->date_of_birth!="" && $singleDataNote->date_of_birth!="0000-00-00"){
			$date_of_birth = date("m/d/Y",strtotime($singleDataNote->date_of_birth));
		}
		
		if($singleDataNote->father_date_of_birth!="" && $singleDataNote->father_date_of_birth!="0000-00-00"){
			$father_date_of_birth = date("m/d/Y",strtotime($singleDataNote->father_date_of_birth));
		}
		if($singleDataNote->mother_date_of_birth!="" && $singleDataNote->mother_date_of_birth!="0000-00-00"){
			$mother_date_of_birth = date("m/d/Y",strtotime($singleDataNote->mother_date_of_birth));
		}
		$father_country_of_birth = $singleDataNote->father_country_of_birth;
		$mother_country_of_birth = $singleDataNote->mother_country_of_birth;
		
		$father_birth_location = $singleDataNote->father_birth_location; 
		$father_present_address = $singleDataNote->father_present_address; 
		
		$mother_birth_location = $singleDataNote->mother_birth_location;
		$mother_present_address = $singleDataNote->mother_present_address;
		$social_security_number = $singleDataNote->social_security_number;
		$city_town_village_of_birth = $singleDataNote->city_nation_of_birth;
		$spouse_first_name = $singleDataNote->spouse_first_name;
		$spouse_middle_name = $singleDataNote->spouse_middle_name;
		$spouse_last_name = $singleDataNote->spouse_last_name;
		$spouse_nationality = $singleDataNote->spouse_nationality;
		$spouse_prior_spouse = $singleDataNote->prior_spouse1;
		$spouse_prior_marriage_date = date("m/d/Y",strtotime($singleDataNote->date_of_mariage_of_prior_spouse1));
		$spouse_prior_spouse_marriage_end_date =  date("m/d/Y",strtotime($singleDataNote->date_of_divorce1));
		$spouse_birth_date =  date("m/d/Y",strtotime($singleDataNote->spouse_birth));
		$marital_times = $singleDataNote->marital_times;
		$province = $singleDataNote->province;
		$postal_code = $singleDataNote->postal_code;
		$address1_apt_ste_flr = $singleDataNote->apt_ste_flr;
		$address1_apt_ste_flr_value = $singleDataNote->apt_ste_flr_value;
		$a_number = $singleDataNote->a_number;
		$uscis_online_account_number = $singleDataNote->uscis_online_account_number;
		$volag_number = $singleDataNote->volag_number;
		$attorney_state_bar_number = $singleDataNote->attorney_state_bar_number;
		$a_r_uscis_online_account_number = $singleDataNote->a_r_uscis_online_account_number;
		$gender = $singleDataNote->gender;
		$city_of_marriage = $singleDataNote->city_of_marriage;
		$state_of_marriage = $singleDataNote->state_of_marriage;

		$frst_child_name = $singleDataNote->first_child_name;
		$first_child_a_number = $singleDataNote->first_child_a;
		$first_child_dob = date("m/d/Y",strtotime($singleDataNote->first_child_dob));
		$first_child_adress = $singleDataNote->first_child_current_address;

		$second_child_name = $singleDataNote->second_child_name;
		$secon_child_a_number = $singleDataNote->second_child_a;
		$second_child_dob = date("m/d/Y",strtotime($singleDataNote->second_child_dob));
		$second_child_address = $singleDataNote->second_child_current_address;

		$third_child_name = $singleDataNote->third_child_name;
		$third_child_a_number = $singleDataNote->third_child_a;
		$third_child_dob = date("m/d/Y",strtotime($singleDataNote->third_child_dob));
		$third_child_address = $singleDataNote->third_child_current_address;

		$fourth_child_name = $singleDataNote->fourth_child_name;
		$fourth_child_a_number = $singleDataNote->fourth_child_a;
		$fourth_child_dob = date("m/d/Y",strtotime($singleDataNote->fourth_child_dob));
		$fourth_child_address = $singleDataNote->fourth_child_current_address;

		$crime_convicted = $singleDataNote->convicted_crime;
		$passport_number = $singleDataNote->passport_number;
		$passport_expire_date = date("m/d/Y",strtotime($singleDataNote->passport_date_expires));
		$country_issued_pasport = $singleDataNote->passport_location_issued;
		$last_arival_date_us = date("m/d/Y",strtotime($singleDataNote->date_of_last_entry_to_us));
		$last_arival_place_us = $singleDataNote->place_of_last_entry_to_us;

		$address1_street_number = $singleDataNote->address_street[0];
		$address1_city = $singleDataNote->address_city[0];
		$address1_state = $singleDataNote->address_state[0];
		$address1_zip = $singleDataNote->address_zip[0];
		$address1_date = date("m/d/Y",strtotime($singleDataNote->address_dates[0]));

		$address2_street_number = $singleDataNote->address_street[1];
		$address2_city = $singleDataNote->address_city[1];
		$address2_state = $singleDataNote->address_state[1];
		$address2_zip = $singleDataNote->address_zip[1];
		$address2_date = date("m/d/Y",strtotime($singleDataNote->address_dates[1]));
		$spouse_city_town_birth = $singleDataNote->spouse_nation_birth;
		$spouse_social_security_number = $singleDataNote->spouse_ss_number;
		$spouse_prior_place_mariage = $singleDataNote->place_of_mariage_of_prior_spouse1;
		$spouse_prior_place_divorce = $singleDataNote->place_of_divorce1;















		if($singleDataNote->current_marriage_date!="") $current_marriage_date = date("m/d/Y",strtotime($singleDataNote->current_marriage_date));
		else $current_marriage_date = "";
		$singleDataCountry = $objQuery->indexByQuerySingleData("SELECT * from countries WHERE state_code='$singleDataNote->state'");
		$country_name = $singleDataCountry->country_name;
		$singleDataBirthCountry = $objQuery->indexByQuerySingleData("SELECT * from countries WHERE id='$singleDataNote->country_of_birth'");
		$country_of_birth = $singleDataBirthCountry->country_name;
		
		$province_of_marriage = $singleDataNote->province_of_marriage;
		
		$singleDataMarriageCountry = $objQuery->indexByQuerySingleData("SELECT * from countries WHERE id='$singleDataNote->country_of_marriage'");
		$country_of_marriage = $singleDataMarriageCountry->country_name;
		
		$father_city_town_village_of_residence = $singleDataNote->father_city_town_village_of_residence;
		$singleDataFatherCountry = $objQuery->indexByQuerySingleData("SELECT * from countries WHERE id='$singleDataNote->father_country_of_residence'");
		$father_country_of_residence = $singleDataFatherCountry->country_name;
		
		$mother_city_town_village_of_residence = $singleDataNote->mother_city_town_village_of_residence;
		$singleDataMotherCountry = $objQuery->indexByQuerySingleData("SELECT * from countries WHERE id='$singleDataNote->mother_country_of_residence'");
		$mother_country_of_residence = $singleDataMotherCountry->country_name;
		
		$employer1_name 			= $singleDataNote->employer1_name;
		$employer1_address 			= $singleDataNote->employer1_address;
		$employer1_apt_ste_flr 		= $singleDataNote->employer1_apt_ste_flr;
		$employer1_apt_ste_flr_value= $singleDataNote->employer1_apt_ste_flr_value;
		$employer1_city_or_town 	= $singleDataNote->employer1_city_or_town;
		$employer1_state 			= $singleDataNote->employer1_state;
		$employer1_zip_code 		= $singleDataNote->employer1_zip_code;
		$employer1_province 		= $singleDataNote->employer1_province;
		$employer1_postal_code 		= $singleDataNote->employer1_postal_code;
		$employer1_country 			= $singleDataNote->employer1_country;
		$employer1_occupation 		= $singleDataNote->employer1_occupation;
		if($singleDataNote->employer1_date_from!="" && $singleDataNote->employer1_date_from!="0000-00-00"){
			$employer1_date_from = date("m/d/Y",strtotime($singleDataNote->employer1_date_from));
		}
		if($singleDataNote->employer1_date_to!="" && $singleDataNote->employer1_date_to!="0000-00-00"){
			$employer1_date_to = date("m/d/Y",strtotime($singleDataNote->employer1_date_to));
		}
		$employer2_name 			= $singleDataNote->employer2_name;
		$employer2_address 			= $singleDataNote->employer2_address;
		$employer2_apt_ste_flr 		= $singleDataNote->employer2_apt_ste_flr;
		$employer2_apt_ste_flr_value= $singleDataNote->employer2_apt_ste_flr_value;
		$employer2_city_or_town 	= $singleDataNote->employer2_city_or_town;
		$employer2_state 			= $singleDataNote->employer2_state;
		$employer2_zip_code 		= $singleDataNote->employer2_zip_code;
		$employer2_province 		= $singleDataNote->employer2_province;
		$employer2_postal_code 		= $singleDataNote->employer2_postal_code;
		$employer2_country 			= $singleDataNote->employer2_country;
		$employer2_occupation 		= $singleDataNote->employer2_occupation;
		if($singleDataNote->employer2_date_from!="" && $singleDataNote->employer2_date_from!="0000-00-00"){
			$employer2_date_from = date("m/d/Y",strtotime($singleDataNote->employer2_date_from));
		}
		if($singleDataNote->employer2_date_to!="" && $singleDataNote->employer2_date_to!="0000-00-00"){
			$employer2_date_to = date("m/d/Y",strtotime($singleDataNote->employer2_date_to));
		}
		$outside_of_ny_company_name 	= $singleDataNote->outside_of_ny_company_name;
		$outside_of_ny_address 			= $singleDataNote->outside_of_ny_address;
		$outside_of_ny_apt_ste_flr 		= $singleDataNote->outside_of_ny_apt_ste_flr;
		$outside_of_ny_apt_ste_flr_value= $singleDataNote->outside_of_ny_apt_ste_flr_value;
		$outside_of_ny_city_or_town 	= $singleDataNote->outside_of_ny_city_or_town;
		$outside_of_ny_state 			= $singleDataNote->outside_of_ny_state;
		$outside_of_ny_zip_code 		= $singleDataNote->outside_of_ny_zip_code;
		$outside_of_ny_province 		= $singleDataNote->outside_of_ny_province;
		$outside_of_ny_postal_code 		= $singleDataNote->outside_of_ny_postal_code;
		$outside_of_ny_country 			= $singleDataNote->outside_of_ny_country;
		$outside_of_ny_occupation 		= $singleDataNote->outside_of_ny_occupation;
		if($singleDataNote->outside_of_ny_date_from!="" && $singleDataNote->outside_of_ny_date_from!="0000-00-00"){
			$outside_of_ny_date_from = date("m/d/Y",strtotime($singleDataNote->outside_of_ny_date_from));
		}
		if($singleDataNote->outside_of_ny_date_to!="" && $singleDataNote->outside_of_ny_date_to!="0000-00-00"){
			$outside_of_ny_date_to = date("m/d/Y",strtotime($singleDataNote->outside_of_ny_date_to));
		}
	}
}