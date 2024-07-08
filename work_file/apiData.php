<?php
require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();
$singleData = $objQuery->indexByQuerySingleData("SELECT * FROM client_profile WHERE sha1(MD5(client_id))='edf9f29e7d0ff8a61bfd6b7109bb305b10d3ef18'");
echo $singleData->profile_description;