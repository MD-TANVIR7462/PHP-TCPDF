<script type="text/javascript">
$("#Submit").click(function(){
	$('input[name=per]').click(function(){
		$('input[name=per]').removeAttr('checked');
		$(this).attr('checked', true);
	});
	document.getElementById("Form").submit();
});

</script>


<form name="Form" id="Form" method="POST" action="pdf/pdf.php">

	<input type="checkbox" name="per" value="bike">bike<br/>
	<input type="checkbox" name="per" value="car">Car<br/>
	<input type="checkbox" name="per" value="bus">bus<br/>
	<input type="hidden" name="formType" id="formType" value="veh" />
	<input type="button" name="Submit" id="Submit" value="Submit" class="formButton" />

</form>
<?php
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('S');
$pdf->SetTitle('S');
$pdf->SetSubject('S');
$pdf->SetKeywords('S');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$cper="";
if($_REQUEST["formType"] == "veh") {
$cper=$_REQUEST["cper"]; 

}
/* $username = "root";
$password = "";
$hostname = "localhost"; 
$db = "mun";
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
mysql_select_db($db,$dbhandle) or die('cannot select db');
mysql_query("INSERT INTO sjbhsmun1 (Name, age, grade, city, email,mobile, cper, choice1,choice2,choice3) 
                VALUES('$Name','$age','$per') ") or die(mysql_error()); */

?>

<tr>

                                        <td width="40%" style="border: 1px solid #ccc;">Preferences</td>
                                        <td width="60%" style="border: 1px solid #ccc;">';

    <?php $html .= $per;?>
</tr>