<?php
require_once("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objFileUpload 	= new \App\fileUpload\fileUpload();
$objQuery 		= new \App\dataTableQuery\dataTableQuery();
$objClientFile 	= new \App\clientFile\clientFile();

if (!isset($_SESSION)) session_start();

if(isset($_GET['formNo'])){
	$formNo = $_GET['formNo'];
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$response 	= [];
		$id 		= $_POST['id'];
		
		if($formNo==2){
			$allowed = array('gif', 'png', 'jpg', 'jpeg', 'doc','docx','xls','xlsx','pdf','csv');
			$path = "../uploads/intake/";
			
			$singleData = $objQuery->indexByQuerySingleData("SELECT * FROM intake_form_info WHERE id='$id'");
			$singleDataNote = json_decode($singleData->note);

			// start code for police_report_file
			$police_report_file = $_FILES['police_report_file']['name'];
			$police_report_file_ext = pathinfo($police_report_file, PATHINFO_EXTENSION);
			if (in_array($police_report_file_ext, $allowed)) {
				
				if($singleDataNote->police_report_file!=""){
					unlink($path.$singleDataNote->police_report_file);
				}
				$report_filename 				= $objFileUpload->upload("police_report_file",$path);
				$response['police_report_file'] = $report_filename;
			} else {
				$response['police_report_file'] = $singleDataNote->police_report_file;
			}
			// end code for police_report_file

			// start code for picture_file
			$picture_file = $_FILES['picture_file']['name'];
			$picture_file_ext = pathinfo($picture_file, PATHINFO_EXTENSION);
			if (in_array($picture_file_ext, $allowed)) {
				if($singleDataNote->picture_file!=""){
					unlink($path.$singleDataNote->picture_file);
				}
				$picture_filename 				= $objFileUpload->upload("picture_file",$path);
				$response['picture_file'] 		= $picture_filename;
			} else {
				$response['picture_file'] = $singleDataNote->picture_file;
			}
			// end code for picture_file
			
			// start code for photo_file
			$photo_file = $_FILES['photo_file']['name'];
			$photo_file_ext = pathinfo($photo_file, PATHINFO_EXTENSION);
			if (in_array($photo_file_ext, $allowed)) {
				if($singleDataNote->photo_file!=""){
					unlink($path.$singleDataNote->photo_file);
				}
				$photo_filename 				= $objFileUpload->upload("photo_file",$path);
				$response['photo_file'] 		= $photo_filename;
			} else {
				$response['photo_file'] = $singleDataNote->photo_file;
			}
			// end code for photo_file
			
			foreach($_POST as $key => $value){
				if($key!='submit' AND $key!='id'){
					$response[$key] = trim($value);
				}
			}
		} else {
			foreach($_POST as $key => $value){
				if($key!='submit' AND $key!='id'){
					$response[$key] = str_replace("'", "&apos;", $value);
				}
			}
		}
		
		$response 	= str_replace(array(",","'",'"',"\r\n"), array("&comma;","&apos;","&quot;","\\r\\n"), $response);
		$note 		= json_encode($response); 
		// Now we prepare a query
		if($id==""){
			$result = $objQuery->inUpDel("INSERT INTO intake_form_info SET client_id=".$_POST['client_id'].", note='$note', form_type='$formNo'");
		} else {
			$sqlQuery = "UPDATE intake_form_info SET note = '$note' WHERE id='$id'";
			$result = $objQuery->inUpDel($sqlQuery);
		}
		if($result){
			$clientId = $objQuery->indexByQuerySingleData("SELECT * FROM client_info WHERE sha1(MD5(id))='$_POST[client_id]'")->id;
			$values = str_replace(array(",","'",'"',"\r\n"), array("&comma;","&apos;","&quot;","\\r\\n"), $_POST);
			$objClientFile->clientProfileUpdate($clientId,$values);
			echo "Information Successfully Updated.";
		} else {
			echo "Failed to update.";
		}
	}
} else {
	echo "Failed to update.";
}
