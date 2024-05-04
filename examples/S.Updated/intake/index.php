<?php
if(isset($_GET['formNo'])){	
	if(isset($_GET['clientId'])){
		$clientId = $_GET['clientId'];
	}
	$formNo		= $_GET['formNo'];
	include 'common.php';
	
	$formArray 	= array();
	foreach($allDataForm as $record){
		$formArray[] = $record->form_no;
		if($formNo==$record->form_no){
			include $record->form_link;
		}
	}
	
	if(!in_array($formNo, $formArray)){
		include 'intake_form.php';
	}
}
?>