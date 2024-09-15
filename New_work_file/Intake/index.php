<?php
if(isset($_GET['formNo'])){	
	if(isset($_GET['clientId'])){
		$clientId = $_GET['clientId'];
	}
	$formNoEnc		= $_GET['formNo'];
	include 'common.php';
	
	$formArray 	= array();
	foreach($allDataForm as $record){
		$formArray[] = $record->form_no;
		if($formNoEnc==sha1(MD5($record->form_no))){
			$formNo = $record->form_no;
			include $record->form_link;
		}
	}
	
	if(!in_array($formNo, $formArray)){
		echo "<center><h1>Sorry! not found.</h1></center>";
		
		// include 'intake_form.php';
	}
}
?>