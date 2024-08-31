<?php
require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery 		= new \App\dataTableQuery\dataTableQuery();

$allDataCountry = $objQuery->indexByQueryAllData("SELECT * FROM countries");
$attorney 		= $objQuery->indexByQuerySingleData("SELECT * FROM attorney_info WHERE active='1' ORDER BY id LIMIT 1");
$attorneyData 	= json_decode($attorney->note);

if(isset($_GET['clientId'])){
	$clientId 	= $_GET['clientId'];
	$singleData = $objQuery->indexByQuerySingleData("SELECT * FROM client_profile WHERE sha1(MD5(client_id))='$clientId'");
	
	$jsonData 	= json_decode($singleData->profile_description);
	
	function showData($name,$arrayNo=""){
		global $jsonData;

		if (isset($jsonData->{$name})) {
			if($arrayNo=="") $value = $jsonData->{$name};
			else $value = $jsonData->{$name}[$arrayNo];

			if(date("Y-m-d", strtotime($value)) == date($value)) {
				return date("m/d/Y", strtotime($value));
			} else {
				$value = str_replace(array("&comma;","&apos;","&quot;"), array(",","\'",'"'), $value);
				return $value;
			}
		} else {
			return '';
		}
	}
}
