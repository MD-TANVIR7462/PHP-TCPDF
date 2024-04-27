<?php
require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();
$objQuery = new \App\dataTableQuery\dataTableQuery();
// Your JSON data
$clientId = $_GET['clientId'];
$singleData = $objQuery->indexByQuerySingleData("SELECT * FROM client_profile WHERE sha1(MD5(client_id))='$clientId'");
$jsonData = json_decode($singleData->profile_description, true);
// Decode the JSON data into an associative array

//Shorting by key
function recursiveKSort(&$array) {
    foreach ($array as &$value) {
        if (is_array($value)) {
            recursiveKSort($value);
        }
    }
    ksort($array);
}
recursiveKSort($jsonData);
$sortedJson = json_encode($jsonData, JSON_PRETTY_PRINT);
$jsonData  = json_decode($sortedJson, true);
//Shorting by key


echo '<h2>' . $jsonData->first_name . '</h2>';
// Check if decoding was successful
if ($jsonData !== null) {
    // Start HTML output
    echo '<div style="display: flex; flex-wrap: wrap;">';


    // Counter for serial number
    $serialNumber = 0;
    // Loop through the associative array
    echo "<table id=customers>
             <tr>
                <th>#SL</th>
                <th>DB-KEY</th>
                <th>Form Lebel</th>
                <th>Form Value</th>
            </tr>";


    foreach ($jsonData as $section => $content) {
        $serialNumber++;
        // Display label and input field for each key-value pair
        //  echo '<div style="width: 100%;">                
        echo   '  <tr>
                    <td>' . $serialNumber . '</td>
                    <td>' . $section . '</td>
                    <td>' . strtoupper(str_replace('_', ' ', $section)) . '</td>
                    <td>' . $content . '</td>
                </tr>';
    }
    echo "</table>";
    // Close the div
    // echo '</div>';
} else {
    // Handle JSON decoding error
    echo 'Error decoding JSON data';
}
?>

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<!--  <td>' . strtoupper(str_replace('_', ' ',$section)) . '</td>   <td>' . $section . ' : ' . $content . '</td>-->