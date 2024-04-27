<?php
require_once("../../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();

$firstname = $_POST['firstname'];
// $firstname = $_GET['firstname'];
// $firstname = $_POST['address'];
// $firstname = $_GET['firstname'];

$objQuery->inUpDel("INSERT INTO notes_old (description) VALUES ('test222 $firstname')");
echo "testy";

/* echo "<pre>";
var_dump($_POST);
echo "</pre>"; */
?>