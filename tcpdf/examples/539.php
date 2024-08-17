
<?php
//!database connection file 
// require_once('formheader.php');   
//!local server file
require_once("config.php");
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

//Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF
{

	//Page header
	public function Header()
	{
		$this->SetY(13);
		if ($this->page > 1) {
			$this->SetLineWidth(2); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255, 255, 255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');

			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255, 255, 255); // set filling color
			$this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C');
		}
	}

	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-17);

		$header_top_border = array(
			'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);

		// Set font
		$this->SetFont('times', '', 9);

		$this->Cell(40, 6, "Form I-539    Edition    07/27/24", 0, 0, 'L');


		// if ($this->page == 1){
		$barcode_image = "images/i539/I-539-footer-pdf417-$this->page.png";
		// )
		$this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		$this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 159, 267.5, true);
	}
}

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-539');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(13.7, 15.3, 12.8, true);
// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set a barcode on the page footer
// $pdf->setBarcode(date('Y-m-d H:i:s'));

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1

// set style for barcode
$style = array(
	'border' => 2,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0, 0, 0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 2, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(30, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(120, 15, "Application To Extend/Change Nonimmigrant Status", 0, 'C', 0, 1, 48, 9, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-539", 0, 'C', 0, 1, 174.5, 5.5, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0003\nExpires 02/28/2027", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
	'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);
//........
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');
//..............

//.......table1 start
$pdf->SetFillColor(220, 220, 220); // set filling color
$pdf->writeHTMLCell(190, 54, 13, 32, "", 1, 1, false, false, 'C', true); //inner table
$pdf->writeHTMLCell(119, 27, 13, 32, "", 1, 1, false, true, 'C', true);

$pdf->writeHTMLCell(26, 27, 67, 32, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(53.8, 5, 13, 32.5, "", "B", 1, true, true, 'C', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(50, 4, 19, 33, "For USCIS Use Only",  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(54, 25, 13, 44, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$l = '<div><b>Returned</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 39, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(54, 25, 13, 49, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$l = '<div><b>Resubmitted</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 44, $l,  0,  1, false, true, 'L', false);


$pdf->SetFont('times', '', 10);
$l = '<div><b>Relocated</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 51.5, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(26, 10, 30, 49, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(37, 25, 30, 54, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$l = '<div><b>Received</b>  </div>';
$pdf->writeHTMLCell(40, 7, 31, 49, $l,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 10);
$l = '<div><b>Sent</b>  </div>';
$pdf->writeHTMLCell(40, 7, 31, 54, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(26, 27, 40, 59, "", "L", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$l = '<div><b>Remarks:</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 60, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(26, 27, 88, 59, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(26, 27, 132, 59, "", "L", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>  </b>   <input type="checkbox" name="attached" value="Y" checked=" " /> <b>Granted</b></div>';
$pdf->writeHTMLCell(30, 15, 30, 60, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(48, 25, 40, 66, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>New Class_____________</div>';
$pdf->writeHTMLCell(40, 15, 45, 66, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(48, 25, 40, 73, '',  'T',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 13, 57.5, 73, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div>Dates:</div>';
$pdf->writeHTMLCell(40, 15, 16, 76, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(30.5, 25, 57.5, 79.5, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html = '<div>From ___/___/___</div>';
$pdf->writeHTMLCell(40, 15, 44, 73, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html = '<div>To ___/___/___</div>';
$pdf->writeHTMLCell(40, 15, 41, 80, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b></b><input type="checkbox" name="attached1" value="Y" checked=" " />&nbsp;&nbsp;<b>Denied</b></div>';
$pdf->writeHTMLCell(30, 15, 75, 60, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html = '<div><b></b><input type="checkbox" name="attached2" value="Y" checked=" " />&nbsp;&nbsp;Still within period of stay</div>';
$pdf->writeHTMLCell(50, 15, 79, 67, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html = '<div><b></b><input type="checkbox" name="attached3" value="Y" checked=" " />&nbsp;&nbsp;S/D to:______________</div>';
$pdf->writeHTMLCell(50, 15, 78, 73, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html = '<div><input type="checkbox" name="place_under_docket" value="Y" checked=" " />&nbsp;Place under docket control</div>';
$pdf->writeHTMLCell(50, 15, 80, 80, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(71, 25, 132, 79, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>  </b>   <input type="checkbox" name="attached5" value="Y" checked=" " /> &nbsp;<b>Applicant interviewed on</b> ______________</div>';
$pdf->writeHTMLCell(80, 15, 121, 79, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Action Block</b>  </div>';
$pdf->writeHTMLCell(80, 15, 95, 32, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Free Stamp</b>  </div>';
$pdf->writeHTMLCell(80, 15, 25, 32, $html, 0, 1, false, true, 'R', true);
//..............table1end

//.......table2start
$pdf->writeHTMLCell(190, 25, 13, 88, "", 1, 1, false, true, 'C', true);
$pdf->writeHTMLCell(40, 24.3, 13.5, 88.3, "", "R", 1, true, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>To be completed by an Attorney or Accredited Representative</b> (if any).  </div>';
$pdf->writeHTMLCell(40, 7, 15, 95, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 14);
$html = '<div><b>  </b>   <input type="checkbox" name="attached4" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(40, 15, 20, 89, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Select this box if <br>Form G-28 is <br>attached.</b></div>';
$pdf->writeHTMLCell(40, 15, 61, 89.5, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 25, 92, 88, '',  'L',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 25, 138, 88, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell(50, 15, 93, 90, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 100);

$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or According Representative USCIS Online Account Number</b>(if any)</div>';
$pdf->writeHTMLCell(60, 15, 140, 90, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_or_according_representative', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 100);
//.......table2end

$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 25, 136, false); // angle 1
//$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 55.5, false); // angle 2
$pdf->StopTransform();

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. ", '', 'L', 0, 1, 18, 113, true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About You</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 120, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 127, '<b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;Your Full Legal Name', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(40, 7, 18.5, 131.5, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 83.5, 130.7, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 143.5, 129.9, 'Middle Name (if applicable)', 0, 0, false, false, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p1_1_legal_last_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.2, 138);
$pdf->TextField('p1_1_legal_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83, 138);
$pdf->TextField('p1_1_legal_middle_name', 58.8, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144.5, 138);
//..................
$pdf->SetFont('times', '', 10);
$html = '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(0, 0, 11, 146.5, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(0, 0, 23, 151.6, "<b>A-</b>", 0, 0, false, true, 'L', true);
//!image......
$pdf->Image('images/right_angle.jpg', 19, 153.5, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 109, 153.5, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_2_alien_registration_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 30, 152);
$pdf->TextField('p1_2_uscis_online_acount_number', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 152);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 160, '<b>4.</b> &nbsp;&nbsp;&nbsp;&nbsp;Your U.S. Mailing Address (Safe Address, if applicable)', 0, 0, false, false, 'L', true);
//.........
$pdf->writeHTMLCell(40, 7, 18.5, 164.5, "In Care Of Name (if any)", 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(0, 0, 18.5, 178, 'Street Number and Name', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 152.5, 178, 'Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 175, 178.5, 'Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 18.5, 191, 'City or Town', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 152.5, 191, 'State', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 175, 191, 'ZIP Code', 0, 0, false, true, 'L', true);
// //...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_4_incare_name', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 171);
$pdf->TextField('p1_4_street_name', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 183.5);
$pdf->TextField('p1_4_flr_ste_number', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 176, 183.5);
$pdf->TextField('p1_4_city_town', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 196.5);
$pdf->TextField('p1_4_zip_code', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 176, 196.5);
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p1_4_state", 20, 7, $comboBoxOptions, array(), array(), 153, 196.5);
//...............
if (showData('information_about_you_residence_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_residence_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_residence_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', 'B', 14);
$pdf->writeHTMLCell(5, 1, 152, 183.5, '<input type="checkbox" name="p4_apt" value="apt"   checked="' . $checked_apt . '" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 159, 183.5, '<input type="checkbox" name="p4_ste" value="ste"   checked="' . $checked_ste . '"/>', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 167, 183.5, '<input type="checkbox" name="p4_flr" value="flr"   checked="' . $checked_flr . '"/>', 0, 1, false, false, 'L', false);
//..............
$pdf->SetFont('times', '', 10);
$html = '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Is your mailing address the same as your physical address?';
$pdf->writeHTMLCell(0, 0, 11, 206.5, $html, 0, 0, false, true, 'L', true);
//..............
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 178.5, 207, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('information_about_you_parent_citizen_before_birth_status') == "Y") $checked = "checked";
else $checked = "";
$html = '<input type="checkbox" name="18th_birthday" value="Y"  checked="' . $checked . '" />';
$pdf->writeHTMLCell(5, 1, 172, 206.5, $html, 0, 1, false, false, 'L', false);
if (showData('information_about_you_parent_citizen_before_birth_status') == "N") $checked = "checked";
else $checked = "";
$html = '<input type="checkbox" name="18th_birthday" value="N" checked="' . $checked . '" />';
$pdf->writeHTMLCell(5, 1, 186, 206.5, $html, 0, 1, false, false, 'L', false);
//.........
$pdf->SetFont('times', '', 10);
$html = 'If you answered “Yes” to <b>Item Number 5</b>. skip to <b>Item Number 7</b>. If you answered “No” to <b>Item Number 5</b>., provide<br>information on your physical address in <b>Item Number 6</b>.';
$pdf->writeHTMLCell(190, 1, 18.6, 212.5, $html, 0, 0, false, true, 'L', true);
//............
$pdf->writeHTMLCell(190, 6, 11, 223, '<b>6.</b> &nbsp;&nbsp;&nbsp;&nbsp;Your Current Physical Address', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(0, 0, 18.5, 228.5, 'Street Number and Name', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 152.5, 228.5, 'Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 175, 228.5, 'Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 18.5, 241, 'City or Town', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 152.5, 241, 'State', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 175, 241, 'ZIP Code', 0, 0, false, true, 'L', true);
// ............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_6_street_name', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 234);
$pdf->TextField('p1_6_flr_ste_number', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 176, 234);
$pdf->TextField('p1_6_city_town', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 246.5);
$pdf->TextField('p1_6_zip_code', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 176, 246.5);
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p1_6_state", 20, 7, $comboBoxOptions, array(), array(), 153, 246.5);
//..............
if (showData('information_about_you_residence_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_residence_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_residence_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', 'B', 14);
$pdf->writeHTMLCell(5, 1, 152, 234, '<input type="checkbox" name="p4_apt2" value="apt"   checked="' . $checked_apt . '" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 159, 234, '<input type="checkbox" name="p4_ste2" value="ste"   checked="' . $checked_ste . '"/>', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 167, 234, '<input type="checkbox" name="p4_flr2" value="flr"   checked="' . $checked_flr . '"/>', 0, 1, false, false, 'L', false);
/******************************
 ******** End Page No 1 ******
 ******************************/

/******************************
 ******** Start Page No 2 ****
 ******************************/
$pdf->AddPage('P', 'LETTER');
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 1. Information About You </b>(continued)</div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b><i>Other Information About You</i></b></div>';
$pdf->writeHTMLCell(191, 6.7, 13, 26.3, $html, 0, 1, true, false, 'L', true);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 34, '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 111, 34, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality', 0, 0, false, true, 'L', true);
//..................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_7_country_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 39.5);
$pdf->TextField('p1_8_country_citizenship', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, 39.5);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 48, '<b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 73, 48, '<b>10.</b>&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if any)', 0, 0, false, true, 'L', true);
//..................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_9_date_of_birth', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 53);
$pdf->TextField('p1_10_social_security_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87, 53);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 61, '<b>11.</b>&nbsp;&nbsp;&nbsp;Provide Information About Your Most Recent Entry Into the United States', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 19, 67.5, 'Date of Last Arrival Into the ', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 19, 72, 'United States (mm/dd/yyyy) ', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 69, 67.5, 'Form I-94 Arrival-Departure', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 69, 72, 'Record Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 139, 67.5, 'Passport Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 139, 72, '(if any)', 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_11_date_us', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 77.4);
$pdf->TextField('p1_11_record_number', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 76.5, 77.4);
$pdf->TextField('p1_11_passport_number', 63.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140.5, 77.4);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 19, 85, 'Travel Document Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 19, 89.5, '(if any)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 69, 85, 'Country of Passport or ', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 69, 89.5, 'Travel Document Issuance', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 139, 85, 'Passport or Travel Document Expiration ', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 139, 89.5, 'Date (mm/dd/yyyy)', 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_11_travel_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 95);
$pdf->TextField('p1_11_country_passport_issuance', 68.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 70, 95);
$pdf->TextField('p1_11_passport_travel_expiration_date', 63.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140.5, 95);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 103.6, '<b>12.</b>&nbsp;&nbsp;&nbsp;Current Nonimmigrant Status (for example, F-1 student, H-4 dependent, etc.)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 139, 103.6, 'Date Status Expires (mm/dd/yyyy) ', 0, 0, false, true, 'L', true);
//..................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p1_12_nonimmigran_status', 118.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 108.5);
$pdf->TextField('p1_12_date_status_expires', 63.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140.5, 108.5);
//............
//..............
$pdf->SetFont('times', '', 10); // set font
$html = 'Select this box if you were granted Duration of Status (D/S).';
$pdf->writeHTMLCell(190, 6, 24.5, 116, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 14); // set font
$pdf->writeHTMLCell(6, 6, 18, 115.6, '<input type="checkbox" name="p1_12_DS_status" value="Y" checked=""  />', 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 2. Application Type</b></div>';
$pdf->writeHTMLCell(191, 6.7, 13, 128, $html, 1, 1, true, false, 'L', true);
//...................

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 136, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am applying for (select <b>only one</b> box):', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 142.3, 'Reinstatement to student status.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 148.3, 'An extension of stay in my current status.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 154.3, 'A change of status.', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('current_spouse_us_citizen_by_birth_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 142, '<input type="checkbox" name="p2_1_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('current_spouse_us_citizen_other_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 148.2, '<input type="checkbox" name="p2_1_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('current_spouse_us_citizen_other_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 154.2, '<input type="checkbox" name="p2_1_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//............
$pdf->setCellHeightRatio(1.5); // set cell height ratio
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(1190, 6, 11, 162, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you are applying for a change of status or change of employer/information medium, complete the following:', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(100, 6, 19, 167, 'I am requesting to change my status or employer/information<br>medium to:', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(100, 6, 130, 164, 'I am requesting the change to be effective <br>(mm/dd/yyyy)', 0, 0, false, false, 'L', true);
$pdf->setCellHeightRatio(1.1); // set cell height ratio
//..............
$pdf->SetFont('courier', 'B', 10);
$pdf->ComboBox('p2_2_combobox', 92, 7, array(
	' A1 - AMBASSADOR, DIPLOMAT',
	' A2 - OTHER DIPLOMATIC OFFICIALS',
	' A3 - ATTENDANTS OF A-1, A-2',
	' B1 - TEMPORARY VISITOR FOR BUSINESS',
	' B1A - NI PERSNL-DOM SRVANT OF NI EMP',
	' B1B - NI DOMESTIC SERVANT OF USC',
	' B1C - NI EMPLOYED BY FOREIGN AIRLINE',
	' B1D - NI - MISSIONARIES',
	' B2 - TEMPORARY VISITOR FOR PLEASURE',
	' C1 - ALIEN IN TRANSIT THROUGH U.S.',
	' C2 - ALIEN IN TRANSIT TO UN HQ',
	' C3 - FRN GOV OFF IN TRANSIT THRU US',
	' C4 - TRANSIT WITHOUT A VISA',
	' CH - PAROLEE (HUMANITARIAN-HQ AUTH)',
	' CW1 - Principal Transitional Workers',
	' CW2 - Dependent of CW1',
	' E1S - Spouse of a Treaty Trader',
	' E1Y - Child of a Treaty Trader',
	' E2C - CNMI Investor',
	' E2S - Spouse of a Treaty Investor',
	' E2Y - Child of a Treaty Investor',
	' E3S - Spouse of Australian Free Trade',
	' E3Y - Child of Australian Free Trade',
	' F1 - Student - Academic',
	' F2 - Spouse-Child of F-1',
	' G1 - Principal Rep. Foreign Govt',
	' G2 - Other Rep Foreign Govt',
	' G3 - Rep Non-Recognized Foreign Gov',
	' G4 - Officer-Employee Intl. Org.',
	' G5 - Attendants of G1, G2, G3, G4',
	' H4 - SPS or Child of H1, H2, H3 or H2R',
	' I - Foreign Press',
	' J1 - Exchange Visitor - Others',
	' J1S - EXCHANGE VISITOR = STUDENT',
	' J2 - SPOUSE-CHILD OF J-1',
	' J2S - SPOUSE-CHILD OF J-1S',
	' K3 - SPOUSE OF USC',
	' K4 - CHILD OF USC',
	' L2S - SPOUSE OF AN L-1A OR L-1B',
	' L2Y - CHILD OF AN L-1A OR L-1B',
	' M1 - STUDENT - VOCATIONAL-NON-ACAD.',
	' M2 - SPOUSE-CHILD OF M-1',
	' N1 - PRINCIPAL REP. OF NATO MEMBER',
	' N2 - OTHER REP. OF NATO MEMBER',
	' N3 - CLERICAL STAFF FOR N-1, N-2',
	' N4 - OFFICIALS OF NATO',
	' N5 - EXPERTS EMPLOYED BY NATO',
	' N6 - CIVILIAN COMPONENT OF NATO',
	' N7 - ATTENDANTS OF N-1 THROUGH N-6',
	' N8 - PARENT OF SPEC IMMIGRANT CHILD',
	' N9 - SPOUSE-CHILD OF N8',
	' O3 - SPOUSE-CHILD OF O-1, O-2',
	' P4 - SPOUSE-CHILD OF P-1, P-2, P-3',
	' R2 - SPOUSE-CHILD OF R-1',
	' T1 - VICTIM OF SEVERE FORM OF TRAFK',
	' T2 - SPOUSE OF T1',
	' T3 - CHILD OF T1',
	' T4 - PARENT OF T1',
	' T5 - UNMARRIED UNDER 18 SIBLG T1 NI',
	' TD - NAFTA DEPENDENT',
	' U1 - VICTIM OF CRIMINAL ACTIVITY',
	' U2 - SPOUSE OF U1',
	' U3 - CHILD OF U1',
	' U4 - PARENT OF U1',
	' U5 - UNMARRIED UNDER 18 SIBLG U1 NI',
	' V1 - SPOUSE OF LPR',
	' V2 - CHILD OF LPR',
	' V3 - CHILD OF V2',
	' WB - VISITOR FOR BUSINESS - VWPP',
	' WT - VISITOR FOR PLEASURE - VWP'
), array(), array(), 37, 174);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_2_requesting_date', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 174.5);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 182, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of people included in this application (select only one box):', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 188.3, 'I am the only applicant.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 194.3, 'I am filing this application for myself and members of my family. ', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('current_spouse_us_citizen_by_birth_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 188, '<input type="checkbox" name="p2_3_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('current_spouse_us_citizen_other_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 194.2, '<input type="checkbox" name="p2_3_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 201, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The total number of people (including me) in the application is: (Form I-539A is required for each co-applicant.)', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_4_total_number_people', 24, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180, 201);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 208, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The name of the school you will attend (if applicable) as an Academic Student, Vocational Student, or Exchange Visitor.', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_5_exchange_visitor', 184, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 214);
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 223.5, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Student and Exchange Visitor Information System (SEVIS) ID Number, if applicable.', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_6_SEVIS_id_number', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 223);
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->writeHTMLCell(191, 6.7, 13, 233, '<div><b>Part 3. Processing Information </b></div>', 1, 1, true, false, 'L', true);
//.............
//.............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 241.5, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I/We request that my/our current or requested status be extended until (mm/dd/yyyy):', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p3_1_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142, 241.5);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 11, 249, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Is this application based on an extension or change of status already granted to your spouse, child, or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;parent?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 249.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_damage_property_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 249.5, '<input type="checkbox" name="p3_2_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_damage_property_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 249.5, '<input type="checkbox" name="p3_2_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//!image
$pdf->Image('images/right_angle.jpg', 83, 55, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 73, 79, 3.3, 3.3);
/******************************
 ******** End Page No 2 *******
 ******************************/

/******************************
 ******** Start Page No 3*****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 3. Processing Information </b>(continued)</div>';
$pdf->writeHTMLCell(191, 6.7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...................

$pdf->SetFont('times', '', 9.6); // set font
$pdf->writeHTMLCell(191, 6, 11, 26, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Is this application based on a separate petition or application to provide your spouse, child, or parent an extension or change of status?', 0, 0, false, false, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(140, 1, 25, 32.3, 'Yes, filed with this Form I-539.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 38.3, 'No.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 44.3, 'Yes, filed previously and pending with U.S. Citizenship and Immigration Services (USCIS).', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('current_spouse_us_citizen_by_birth_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 32, '<input type="checkbox" name="p3_3_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('current_spouse_us_citizen_other_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 38.2, '<input type="checkbox" name="p3_3_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('current_spouse_us_citizen_other_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 44.2, '<input type="checkbox" name="p3_3_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//...................
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(191, 6, 11, 55, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you answered "Yes" to <b>Item Number 2</b>. or <b>Item Number 3.</b>, select the Form type below.', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 61.3, 'Form I-539, Application to Extend/Change Nonimmigrant Status', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 67.3, 'Form I-129, Petition for a Nonimmigrant Worker.', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('current_spouse_us_citizen_by_birth_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 61, '<input type="checkbox" name="p3_4_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
if (showData('current_spouse_us_citizen_other_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 18.2, 67.2, '<input type="checkbox" name="p3_4_status" value="Y" checked="' . $checked . '" />', 0, 1, false, false, 'L', false);
//......................
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 11, 75, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you answered "Yes" to <b>Item Number 2. or 3</b>., provide the USCIS Receipt Number.', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 146, 76.4, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p3_uscis_reseipt_number', 54, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 75);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 11, 83, 'If the petition or application is pending with USCIS, also provide the following information:', '', 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 11, 90, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First and Last Name of Beneficiary or Applicant', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 19, 96, 'First Name of Beneficiary or Applicant', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 110, 96, 'Last Name of Beneficiary or Applicant', '', 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p3_6_first_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 101);
$pdf->TextField('p3_6_last_name', 93, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 111, 101);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 11, 109, '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Filed (mm/dd/yyyy)', '', 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p3_7_date_filed', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 114);
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 4. Additional Information About the Principal Applicant</b></div>';
$pdf->writeHTMLCell(191, 6.7, 13, 127, $html, 1, 1, true, false, 'L', true);
//...................
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 11, 134.6, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Passport Information', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 19, 141, 'If your current passport information is different from the information you provided in <b>Part 1.</b>, provide your current passport<br>
information. If your current passport information matches the information you provided in <b>Part 1.</b>, proceed to <b>Item Number 3</b>.', '', 1, false, 'L');
//............
//...........
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(40, 7, 19, 149, 'Passport Number', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 72, 148.5, 'Country of Passport Issuance ', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(100, 7, 143.5, 147.7, 'Passport Expiration Date (mm/dd/yyyy)', 0, 0, false, false, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p4_1_passport', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 157.9);
$pdf->TextField('p4_1_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 72, 158);
$pdf->TextField('p4_1_expiration_date', 59.9, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144.5, 158);
//...............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(197, 5, 11, 165.5, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Address Abroad', '', 1, false, 'L');
//..................
$pdf->writeHTMLCell(0, 0, 18.5, 171, 'Street Number and Name', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 152.5, 171, 'Apt.&nbsp;&nbsp;Ste.&nbsp;&nbsp;Flr.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 175, 171, 'Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 18.5, 184, 'City or Town', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 18.5, 197, 'Province', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 78.7, 197, 'Postal Code', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 125, 197, 'Country', 0, 0, false, true, 'L', true);
// ............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_2_street_name', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 177);
$pdf->TextField('p4_2_flr_ste_number', 28.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 176, 177);
$pdf->TextField('p4_2_city_town', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.5, 189.5);
$pdf->TextField('p4_2_province', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 19.7, 202);
$pdf->TextField('p4_2_postal_code', 44.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79.7, 202);
$pdf->TextField('p4_2_country', 78.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 126, 202);
//..............
if (showData('information_about_you_residence_apt_ste_flr') == "apt") $checked_apt = "checked";
else $checked_apt = "";
if (showData('information_about_you_residence_apt_ste_flr') == "ste") $checked_ste = "checked";
else $checked_ste = "";
if (showData('information_about_you_residence_apt_ste_flr') == "flr") $checked_flr = "checked";
else $checked_flr = "";
$pdf->SetFont('times', 'B', 14);
$pdf->writeHTMLCell(5, 1, 152, 177, '<input type="checkbox" name="p4_2_apt" value="apt"   checked="' . $checked_apt . '" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 159, 177, '<input type="checkbox" name="p4_2_ste" value="ste"   checked="' . $checked_ste . '"/>', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 167, 177, '<input type="checkbox" name="p4_2_flr" value="flr"   checked="' . $checked_flr . '"/>', 0, 1, false, false, 'L', false);
//...................................
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 11, 210, 'Answer the following questions. If you answer "Yes" to any of the questions <b>in Item Numbers 3</b>. - 15., use the space provided in<br>
<b>Part 8. Additional Information</b> to provide an explanation.', '', 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 221, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you an applicant for an immigrant visa?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 221.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_engaged_in_kidnapping_or_hijacking_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 221.6, '<input type="checkbox" name="p4_3_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_engaged_in_kidnapping_or_hijacking_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 221.6, '<input type="checkbox" name="p4_3_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 230, '<b>4</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Has an immigrant petition <b>EVER</b> been filed for you?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 230.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_attempted_planned_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 230.6, '<input type="checkbox" name="p4_4_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_attempted_planned_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 230.6, '<input type="checkbox" name="p4_4_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 238, '<b>5</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> filed Form I-485, Application to Register Permanent Residence or Adjust Status?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 238.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_torture_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 238.6, '<input type="checkbox" name="p4_5_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_torture_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 238.6, '<input type="checkbox" name="p4_5_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);







/******************************
 ******** End Page No 3 *******
 ******************************/

/******************************
 ******** Start Page No 4*****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
//....................
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(191, 6.5, 13, 19, "<b>Part 4. Additional Information About the Applicant (continued)</b>", 1, 1, true, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 28, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you been arrested or convicted of any criminal offense since last entering the United States? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 28.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_damage_property_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 28, '<input type="checkbox" name="p4_6_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_damage_property_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 28, '<input type="checkbox" name="p4_6_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 34.5, 'Have you <b>EVER</b> ordered, incited, called for, committed, assisted, helped with, or otherwise participated in any of the following: ', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 42, '<b>7.a.</b>&nbsp;&nbsp;&nbsp;Acts involving torture or genocide?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 42.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_engaged_in_kidnapping_or_hijacking_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 42.6, '<input type="checkbox" name="p4_7a_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_engaged_in_kidnapping_or_hijacking_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 42.6, '<input type="checkbox" name="p4_7a_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 50, '<b>7.b.</b>&nbsp;&nbsp;&nbsp;Killing any person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 50.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_attempted_planned_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 50.6, '<input type="checkbox" name="p4_7b_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_attempted_planned_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 50.6, '<input type="checkbox" name="p4_7b_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 58, '<b>7.c</b>&nbsp;&nbsp;&nbsp;&nbsp;Intentionally and severely injuring any person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 58.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_torture_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 58.6, '<input type="checkbox" name="p4_7c_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_torture_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 58.6, '<input type="checkbox" name="p4_7c_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 66, '<b>7.d.</b>&nbsp;&nbsp;&nbsp;Engaging in any kind of sexual contact or relations with any person who did not consent or was unable to<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;consent, or was being forced or threatened?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 66.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_genocide_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 66.6, '<input type="checkbox" name="p4_7d_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_genocide_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 66.6, '<input type="checkbox" name="p4_7d_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 76, "<b>7.e.</b>&nbsp;&nbsp;&nbsp;Limiting or denying any person's ability to exercise religious beliefs?", 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 76.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_kill_any_person_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 76.6, '<input type="checkbox" name="p4_7e_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_kill_any_person_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 76.6, '<input type="checkbox" name="p4_7e_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 83, 'Have you <b>EVER</b>', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 91, '<b>8.a.</b>&nbsp;&nbsp;&nbsp;Served in, been a member of, assisted, or participated in any military unit, paramilitary unit, police unit, self-<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defense unit, vigilante unit, rebel group, guerrilla group, militia, insurgent organization, or any other armed<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;group?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 91.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_injure_any_person_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 91.6, '<input type="checkbox" name="p4_8a_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_injure_any_person_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 91.6, '<input type="checkbox" name="p4_8a_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 106, '<b>8.b.</b>&nbsp;&nbsp;&nbsp;Worked, volunteered, or otherwise served in any prison, jail, prison camp, detention facility, labor camp, or<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;any other situation that involved detaining persons?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 106.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_injure_any_person_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 106.6, '<input type="checkbox" name="p4_8b_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_injure_any_person_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 106.6, '<input type="checkbox" name="p4_8b_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//......................


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 115, '<b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been a member of, assisted, or participated in any group, unit, or organization of any kind<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;in which you or other persons used or threatened to use any type of weapon against any person or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;threatened to do so? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 116.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_political_opinion_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 116, '<input type="checkbox" name="p4_9_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_political_opinion_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 116, '<input type="checkbox" name="p4_9_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 129, '<b>10.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 129, 'Have you <b>EVER</b>sold, provided, or transported weapons, or assisted any person in selling, providing, or <br>
transporting weapons, which, you knew or believed would be used against another person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 129.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_participate_in_armed_group_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 129, '<input type="checkbox" name="p4_10_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_participate_in_armed_group_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 129, '<input type="checkbox" name="p4_10_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 142, '<b>11.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 142, 'Have you <b>EVER</b>sold, received any weapons training, paramilitary training, or other military-type training?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 142.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_participate_in_armed_group_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 142, '<input type="checkbox" name="p4_11_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_participate_in_armed_group_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 142, '<input type="checkbox" name="p4_11_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 150, '<b>12.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 150, 'Have you <b>EVER</b>violated the terms of the nonimmigrant status you now hold?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 150.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_participate_in_armed_group_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 150, '<input type="checkbox" name="p4_12_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_participate_in_armed_group_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 150, '<input type="checkbox" name="p4_12_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 158, '<b>13.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 158, 'Are you now in removal proceedings?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 158.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_participate_in_armed_group_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 158, '<input type="checkbox" name="p4_13_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_participate_in_armed_group_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 158, '<input type="checkbox" name="p4_13_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 166, '<b>14.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 166, 'Have you <b>EVER</b>been employed in the United States since last admitted or granted an extension or change <br>of status?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 166.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_participate_in_armed_group_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 166, '<input type="checkbox" name="p4_14_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_participate_in_armed_group_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 166, '<input type="checkbox" name="p4_14_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 175, 'If you answered "No" to <b>Item Number 14</b>., fully describe how you are supporting yourself in <b>Part 8. Additional Information</b>.<br>
Include documentary evidence of the source, amount, and basis for any income', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 186, 'If you answered "Yes"  <b>to Item Number 14</b>., fully describe any and all periods of employment in <b>Part 8. Additional Information.</b><br>
Include the name and address of the employer, weekly income, and whether the employment was specifically authorized by USCIS.', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 197, '<b>15.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 197, 'Are you currently or have you <b>EVER</b> been a J-1 exchange visitor or a J-2 dependent of a J-1 exchange<br>visitor? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 197.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if (showData('additional_info_participate_in_armed_group_status') == "Y") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 175.5, 197, '<input type="checkbox" name="p4_15_staus" value="Y"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
if (showData('additional_info_participate_in_armed_group_status') == "N") $checked = "checked";
else $checked = "";
$pdf->writeHTMLCell(5, 1, 189, 197, '<input type="checkbox" name="p4_15_staus" value="N"    checked="' . $checked . '"  />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 207, 'If you answered "Yes" <b>to Item Number 15</b>., you must provide the dates you maintained status as a J-1 exchange visitor or J-2
dependent in <b>Part 8. Additional Information.</b> ', 0, 1, false, 'L');
//......................


/******************************
 ******** End Page No 4 ******
 ******************************/

/******************************
 ******** Start Page No 5 ****
 ******************************/
$pdf->AddPage('P', 'LETTER');
//....................
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(191, 6.5, 13, 19, "<b>Part 5. Applicant's Contact Information, Certification, and Signature</b>", 1, 1, true, 'L');
$pdf->writeHTMLCell(191, 6, 13, 29, "<b><i>Applicant's Contact Information</i></b>", '', 1, true, 'L');
//.......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 37, 'Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 45, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 45, "Applicant's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 45, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 45, "Applicant's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 59, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 58, "Applicant's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_applicant_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('p5_applicant_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 51);
$pdf->TextField('p5_applicant_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 63.4);
//....................
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(191, 6.3, 13, 74, "<b><i>Applicant's Certification and Signature</i></b>", '', 1, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 81, 'I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with<br>
my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in <b>Part 6.</b>,<br>
understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the<br>
information are complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records<br>
that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration law. ', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 106, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 106, "Applicant's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 106, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');

//.............
$pdf->writeHTMLCell(133, 6.4, 21, 111.5, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_applicant_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 111.5);
//........................
$pdf->setFont('Times', '', 12);
$html = "<div><b>Part 6. Interpreter's Contact Information, Certification, and Signature </b></div>";
$pdf->writeHTMLCell(191, 6.5, 13, 124, $html, 1, 1, true, 'L');
//...............
$html = '<div><b><i>Interpreter\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 135, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 143, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 143, "Interpreter's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114.6, 143, "Interpreter's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 157, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 157, "Interpreter's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_Interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 148.5);
$pdf->TextField('p6_Interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 148.5);
$pdf->TextField('p6_Interpreter_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 162.4);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 171.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 179, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 179, "Interpreter's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 179, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 179, "Interpreter's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 192.5, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 192.5, "Interpreter's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_Interpreter_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 184.5);
$pdf->TextField('p6_Interpreter_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 184.5);
$pdf->TextField('p6_Interpreter_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 197.7);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 207.6, $html, '', 1, true, 'L');
//.............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 215, 'I certify, under penalty of perjury, that I am fluent in English and', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 168, 215, ", ", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 170, 215, "and I have interpreted", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 221.5, "every question on the application and Instructions and interpreted the applicant's answers to the questions in that language, and the<br>applicant informed me that they understood every instruction, question, and answer on the application.", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 232, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 232, "Interpreter's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 232, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 237, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p6_interpreter_fluent_english', 62.5, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 215);
$pdf->TextField('p6_interpreter_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 237);
//.............
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 109.8, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 12, 235.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//...........
/******************************
 ******** End Page No 5 ******
 ******************************/

/******************************
 ******** Start Page No 6 ****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 7. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant </b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
$pdf->writeHTMLCell(191, 6.5, 13, 34.5, '<b><i>Preparer\'s Full Name</i></b>', '', 1, true, 'L');
//...............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 42, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 42, "Preparer's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114, 42, "Preparer's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 57, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 57, "Preparer's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Preparer_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 47);
$pdf->TextField('p7_Preparer_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 47);
$pdf->TextField('p7_Preparer_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 62);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 70.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 78, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 78, "Preparer's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 78, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 78, "Preparer's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 91, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 91, "Preparer's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Preparer_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 83);
$pdf->TextField('p7_Preparer_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 83);
$pdf->TextField('p7_Preparer_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 96);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 104.6, $html, '', 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 112, 'I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that<br>
all of the responses and information contained in and submitted with the application are complete, true, and correct and reflects only<br>
information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand<br>
the responses and information in or submitted with the application.', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 130.5, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 130.5, "Preparer's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 130.5, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 135.6, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_Preparer_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 135.5);
//.....................
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 133.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L'); //.............
/******************************
 ******** End Page No 6 ******
 ******************************/

/******************************
 ******** Start Page No 7 ****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 8. Additional Information</b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.<br>
Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item</b><br>
<b>Number</b> to which your answer refers; and sign and date each sheet. ', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 83, 46, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 144, 46, 'Middle Name (if applicable)', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_family_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('p8_additional_info_given_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 51);
$pdf->TextField('p8_additional_info_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number', '', 1, false, 'L');
$pdf->setFont('Times', '', 11);
$pdf->writeHTMLCell(197, 5, 53, 60, '<b>A-</b>', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 50, 61.4, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 59.5, 60);


//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 67, 'Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 67, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_3a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);
$pdf->TextField('p8_additional_info_3b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 72);
$pdf->TextField('p8_additional_info_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_3d', 175, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_3d')), 21, 81);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 89, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 95.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 101.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.8, 32.5, 21, 81, '', 1, 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 115, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 115, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 115, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_4a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 120);
$pdf->TextField('p8_additional_info_4b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 120);
$pdf->TextField('p8_additional_info_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 120);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_4d', 175, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_4d')), 21, 129);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 130, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 136.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 143, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 149.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.8, 32.5, 21, 129, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 162, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 162, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 162, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_5a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 167);
$pdf->TextField('p8_additional_info_5b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 167);
$pdf->TextField('p8_additional_info_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 167);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_5d', 175, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_5d')), 21, 176);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 177, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 183.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 190, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 196, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.8, 32.5, 21, 176, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 208.5, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 208.5, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 208.5, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 213.3);
$pdf->TextField('p8_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 213);
$pdf->TextField('p8_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 213);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_6d', 175, 33, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_6d')), 21, 222);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 223, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 229.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 236.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 242.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.8, 33.2, 21, 222, '', 1, 1, false, 'L');
//...........
$js = "
var fields = {

	'attorney_state_bar_number':' " . showData('') . "',

	'attorney_or_according_representative':' " . showData('') . "',

	'p1_1_legal_last_name':' " . showData('') . "',

	'p1_1_legal_first_name':' " . showData('') . "',

	'p1_1_legal_middle_name':' " . showData('') . "',

	'p1_2_alien_registration_number':' " . showData('') . "',

	'p1_2_uscis_online_acount_number':' " . showData('') . "',

	'p1_4_incare_name':' " . showData('') . "',

	'p1_4_street_name':' " . showData('') . "',

	'p1_4_flr_ste_number':' " . showData('') . "',

	'p1_4_city_town':' " . showData('') . "',

	'p1_4_state':' " . showData('') . "',

	'p1_4_zip_code':' " . showData('') . "',

	'p1_6_street_name':' " . showData('') . "',

	'p1_6_flr_ste_number':' " . showData('') . "',

	'p1_6_city_town':' " . showData('') . "',

	'p1_6_state':' " . showData('') . "',

	'p1_6_zip_code':' " . showData('') . "',

//!page 1 end..........

	'p1_7_country_birth':'  " . showData('') . "',
	'p1_8_country_citizenship':'  " . showData('') . "',
	'p1_9_date_of_birth':'  " . showData('') . "',
	'p1_10_social_security_number':'  " . showData('') . "',
	'p1_11_date_us':'  " . showData('') . "',
	'p1_11_record_number':'  " . showData('') . "',
	'p1_11_passport_number':'  " . showData('') . "',
	'p1_11_travel_number':'  " . showData('') . "',
	'p1_11_country_passport_issuance':'  " . showData('') . "',
	'p1_11_passport_travel_expiration_date':'  " . showData('') . "',
	'p1_12_nonimmigran_status':'  " . showData('') . "',
	'p1_12_date_status_expires':'  " . showData('') . "',
	'p2_2_combobox':'  " . showData('') . "',
	'p2_2_requesting_date':'  " . showData('') . "',
	'p2_4_total_number_people':'  " . showData('') . "',
	'p2_5_exchange_visitor':'  " . showData('') . "',
	'p2_6_SEVIS_id_number':'  " . showData('') . "',
	'p3_1_date':'  " . showData('') . "',


//!page 2 end..........
	'p3_uscis_reseipt_number':'  " . showData('') . "',
	'p3_6_first_name':'  " . showData('') . "',
	'p3_6_last_name':'  " . showData('') . "',
	'p3_7_date_filed':'  " . showData('') . "',
	'p4_1_passport':'  " . showData('') . "',
	'p4_1_country':'  " . showData('') . "',
	'p4_1_expiration_date':'  " . showData('') . "',
	'p4_2_street_name':'  " . showData('') . "',
	'p4_2_flr_ste_number':'  " . showData('') . "',
	'p4_2_city_town':'  " . showData('') . "',
	'p4_2_province':'  " . showData('') . "',
	'p4_2_postal_code':'  " . showData('') . "',
	'p4_2_country':'  " . showData('') . "',



//!page 3 end..........

	'p5_applicant_daytime':' " . showData('') . "',

	
	'p5_applicant_mobile':' " . showData('') . "',
	
	'p5_applicant_email':' " . showData('') . "',
	
	'p5_applicant_signature_date':' " . showData('') . "',

	'p6_Interpreter_family_name':' " . showData('') . "',

	'p6_Interpreter_given_name':' " . showData('') . "',

	'p6_Interpreter_business_name':' " . showData('') . "',

	'p6_Interpreter_daytime':' " . showData('') . "',

	'p6_Interpreter_mobile':' " . showData('') . "',

	'p6_Interpreter_email':' " . showData('') . "',

	'p6_interpreter_fluent_english':' " . showData('') . "',

	'p6_interpreter_signature_date':' " . showData('') . "',
//!page 5 end..........

	'p7_Preparer_family_name':' " . showData('') . "',

	'p7_Preparer_given_name':' " . showData('') . "',

	'p7_Preparer_business_name':' " . showData('') . "',

	'p7_Preparer_daytime':' " . showData('') . "',

	'p7_Preparer_mobile':' " . showData('') . "',

	'p7_Preparer_email':' " . showData('') . "',

	'p7_Preparer_signature_date':' " . showData('') . "',
//!page 6 end..........
'p8_additional_info_family_name':' " . showData('n_600_additional_info_last_name') . "',
'p8_additional_info_given_name':' " . showData('n_600_additional_info_first_name') . "',
'p8_additional_info_middle_name':' " . showData('n_600_additional_info_middle_name') . "',
'p8_additional_info_a_number':' " . showData('n_600_additional_info_a_number') . "',
'p8_additional_info_3a':' " . showData('n_600_additional_info_3a_page_no') . "',
'p8_additional_info_3b':' " . showData('n_600_additional_info_3b_part_no') . "',
'p8_additional_info_3c':' " . showData('n_600_additional_info_3c_item_no') . "',
'p8_additional_info_4a':' " . showData('n_600_additional_info_4a_page_no') . "',
'p8_additional_info_4b':' " . showData('n_600_additional_info_4b_part_no') . "',
'p8_additional_info_4c':' " . showData('n_600_additional_info_4c_item_no') . "',
'p8_additional_info_5a':' " . showData('n_600_additional_info_5a_page_no') . "',
'p8_additional_info_5b':' " . showData('n_600_additional_info_5b_part_no') . "',
'p8_additional_info_5c':' " . showData('n_600_additional_info_5c_item_no') . "',
'p8_additional_info_6a':' " . showData('n_600_additional_info_6a_page_no') . "',
'p8_additional_info_6b':' " . showData('n_600_additional_info_6b_part_no') . "',
'p8_additional_info_6c':' " . showData('n_600_additional_info_6c_item_no') . "',
//!page 7 end..........

};
for (var fieldName in fields) {
    if (!fields.hasOwnProperty(fieldName)) continue;
    var field = getField(fieldName);
    if (field && field.value === '') {
        field.value = fields[fieldName];
    }
}

";











$pdf->IncludeJS($js);

// $pdf->lastPage();
//Close and output PDF document
$pdf->Output('I-539.pdf', 'I');
