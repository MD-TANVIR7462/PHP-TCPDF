<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery 		= new \App\dataTableQuery\dataTableQuery();
$objSettings 	= new \App\settings\settings();
$objClientFile 	= new \App\clientFile\clientFile();

$allDataForm 	= $objQuery->indexByQueryAllData("SELECT * FROM forms WHERE form_type='intake' AND form_no>0 ORDER BY form_no");
$allDataCountry = $objQuery->indexByQueryAllData("SELECT * FROM countries ORDER BY state_code");
$attorney 		= $objQuery->indexByQuerySingleData("SELECT * FROM attorney_info WHERE active='1' ORDER BY id LIMIT 1");
$attorneyData 	= json_decode($attorney->note);

$transIncLan 	= $objSettings->getValue("google_translate_inc_lan");

$expDateFormat = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$singleData = $objQuery->indexByQuerySingleData("SELECT *,DATE_ADD(created_at, INTERVAL +1 DAY) as expire_date FROM intake_form_info
													 WHERE sha1(MD5(id))='$id'");
	$expDateFormat = date("F d, Y H:i:s",strtotime($singleData->expire_date));
	
	$validTill 	= strtotime($singleData->expire_date);
	$currTime 	= strtotime(date('Y-m-d H:i:s'));
	
	if($validTill<$currTime) {
		echo "<center><h1>Form Expired</h1><center>";
		die();
	}
	$getId = "id=$id";
	$clientProfile	= $objQuery->indexByQuerySingleData("SELECT * FROM client_profile WHERE client_id='$singleData->client_id'");
	$clientId 		= sha1(MD5($singleData->client_id));
}
else if(isset($_GET['clientId'])){
	if(isset($_SESSION['userId'])){
		$clientId 		= $_GET['clientId'];
		$formNoEnc 		= $_GET['formNo'];
		$getId 			= "clientId=$clientId";

		$clientProfile	= $objQuery->indexByQuerySingleData("SELECT * FROM client_profile WHERE sha1(MD5(client_id))='$clientId'");
		
		
	
		$singleForm = $objQuery->indexByQuerySingleData("SELECT * FROM forms WHERE sha1(MD5(id))='$formNoEnc'");
		if($singleForm) $formNo = $singleForm->id;
		else $formNo = "";
	
		$singleData = $objQuery->indexByQuerySingleData("SELECT *,DATE_ADD(created_at, INTERVAL +1 DAY) as expire_date
														 FROM intake_form_info
														 WHERE sha1(MD5(client_id))='$clientId' AND sha1(MD5(form_type))='$formNoEnc'");
		if($singleData !=true){
			$clientInfo = $objQuery->indexByQuerySingleData("SELECT * FROM client_info WHERE sha1(MD5(id))='$clientId'");
			
			// echo "SELECT * FROM client_info WHERE sha1(MD5(id))='$clientId'";
			
			if($clientInfo) {
				$response = [];
				$response['first_name'] = "$clientInfo->first_name";
				$response = json_encode($response);				
				
				$result = $objQuery->inUpDel("INSERT INTO intake_form_info SET client_id=$clientInfo->id, note='$response', form_type='$formNo'");
				
				if($result)	{
					$singleData = $objQuery->indexByQuerySingleData("SELECT *,DATE_ADD(created_at, INTERVAL +1 DAY) as expire_date
																	FROM intake_form_info
																	WHERE sha1(MD5(client_id))='$clientId' and form_type='$formNo'");
				}		
			} else {
				echo "Sorry! Not found such as client";
				die();
			}
		}
	} else {
		echo "Please login to get the form.";		
		die();
	}
} else {
	echo "Sorry! Invalid parameter.";
	die();
}

if($clientProfile){
	$singleDataNote = json_decode($clientProfile->profile_description);
} else {
	$singleDataNote = json_decode("");
}

/* function showData($name){
	global $singleDataNote;
	if(isset($singleDataNote->$name)) return $singleDataNote->$name;
	else return '';
} */

function showData($name,$arrayNo=""){
	global $singleDataNote;
	
	if (isset($singleDataNote->{$name})) {
		if($arrayNo=="") $value = $singleDataNote->{$name};
		else $value = $singleDataNote->{$name}[$arrayNo];

		if(date("Y-m-d", strtotime($value)) == date($value)) {
			return date("Y-m-d", strtotime($value));
		} else {
			return $value;
		}
	} else {
		return '';
	}
}


function createCheckbox($fieldName,$fieldTitle=""){
	
	if(showData($fieldName) == "Y") {
		$fieldValue = "Y";
		$checked = "checked";
	} else {
		$fieldValue = "N";
		$checked = "";
	}
	
	$output = "<input type='hidden' name='$fieldName' id='$fieldName' value='$fieldValue' />
	           <input type='checkbox' onChange=\"checkboxValue(this,'$fieldName')\" $checked /> $fieldTitle";
	return $output;
}

function createRadio($fieldName){
	if(showData($fieldName) == "Y") $checkedYes = "checked";
	else $checkedYes = "";
	
	if(showData($fieldName) == "N") $checkedNo = "checked";
	else $checkedNo = "";
	
	$output = "<label class='control-label'>
					<input type='radio' name='$fieldName' $checkedYes value='Y'> Yes
				</label>
				&nbsp; &nbsp;
				<label class='control-label'>
					<input type='radio' name='$fieldName' $checkedNo value='N'> No
				</label>";
	return $output;
}