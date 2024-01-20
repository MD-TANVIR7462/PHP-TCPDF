<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lms_db');

try {
// 	$conn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASS);
	$conn = new PDO("mysql:host=".HOST.";charset=utf8;dbname=".DB, USER, PASS);
	
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully"; 
}
catch(PDOException $e){
	//echo "Connection failed";
	// . $e->getMessage();
}

function indexByQueryAlldata($sql){
	global $conn;
	
    $data = $conn->query($sql);
    $data->setFetchMode(PDO::FETCH_OBJ);
    $allData = $data->fetchAll();
	
	return $allData;
}

function indexByQuerySingleData($sql){
	global $conn;
	
    $data = $conn->query($sql);
    $data->setFetchMode(PDO::FETCH_OBJ);
    $singleData = $data->fetch();
	
	return $singleData;
}


$allDataCountry = indexByQueryAllData("SELECT * FROM countries");
	$singleData = indexByQuerySingleData("SELECT * FROM client_profile WHERE client_id=10107");
	$jsonData = json_decode($singleData->profile_description);
	
	 function showData($name) {
		global $jsonData;

		if (isset($jsonData->{$name})) {
			$value = $jsonData->{$name};

			if(date("Y-m-d", strtotime($value)) == date($value)) {
				return date("m/d/Y", strtotime($value));
			} else {
				return $value;
			}
		} else {
			return '';
		}
	}


?>