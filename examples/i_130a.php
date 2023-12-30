<?php

require_once("config.php");
$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    //Page header
    public function Header() {
        $this->SetY(13);
		if ($this->page > 1){
			$this->SetLineWidth(2); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');
			
			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C');
		}
    }

    // Page footer
    public function Footer() {
        $this->SetY(-16); // Position at 15 mm from bottom
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        $this->SetFont('times', '', 9); // Set font
		
		$this->Cell(40, 6, "Form I-130A 02/13/19", 0, 0, 'L');
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 268.2, true);
    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-130A');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(13.7, 15.3, 12.8, true);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set a barcode on the page footer
// $pdf->setBarcode(date('Y-m-d H:i:s'));

// add a page
$pdf->AddPage('P', 'LETTER');

// set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 2, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(15, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(120, 15, "Supplemental Information for Spouse Beneficiary", 0, 'C', 0, 1, 50, 8, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-130A", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0012\nExpires 02/28/2021", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);
// End code for top section


$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220,220,220); // set filling color
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
$pdf->setCellHeightRatio(1.2);
// $pdf->MultiCell(13, 26, "For\nUSCIS\nUse\nOnly", 'LTB', 'C', 1, 1, 12.8, 32.5, true);







$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFillColor(255,255,255);


$pdf->MultiCell(189.5, 26.5, "", 'LTBR', 'C', 1, 1, 13, 33, true);


$pdf->SetFont('times', 'B', 9.8); // set font
$pdf->SetDrawColor(70,70,70); // set color for cell border
$pdf->SetFillColor(215,215,215); // set filling color
$pdf->MultiCell(188.8, 6, "To be completed by an attorney or accredited representative (if any).", 'B', 'C', 1, 1, 13.2, 33.25, true);

$pdf->SetFillColor(255,255,255); // set filling color
$pdf->MultiCell(25, 14, "Select this box if Form G-28 is attached.", '', 'L', 0, 0, 22, 40.8, true);
$pdf->MultiCell(2, 19.5, "", 'R', 'C', 1, 1, 50, 39.5, true);


$pdf->MultiCell(24, 5, "Volag Number", '', 'L', 0, 0, 55, 40.8, true);
$pdf->SetFont('times', '', 9.8); // set font
$pdf->MultiCell(24, 5, "(if any)", '', 'L', 0, 0, 55, 46, true);
$pdf->MultiCell(2, 19.5, "", 'R', 'C', 1, 1, 90, 39.5, true);

$pdf->SetFont('times', 'B', 9.8); // set font
$pdf->MultiCell(45, 5, "Attorney State Bar Number", '', 'L', 0, 0, 94, 40.8, true);
$pdf->SetFont('times', '', 9.8); // set font
$pdf->MultiCell(24, 5, "(if applicable)", '', 'L', 0, 0, 94, 46, true);
$pdf->MultiCell(2, 19.5, "", 'R', 'C', 1, 1, 136, 39.5, true);

$pdf->SetFont('times', 'B', 9.8); // set font
$pdf->MultiCell(65, 8, "Attorney or Accredited Representative USCIS Online Account Number", '', 'L', 0, 0, 140, 40.8, true);
$pdf->SetFont('times', '', 9.8); // set font
$pdf->MultiCell(15, 5, "(if any)", '', 'L', 0, 0, 188, 45, true);


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->TextField('volag_number', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 50.5);
$pdf->TextField('attorney_state_bar_number', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 94, 50.5);



// $pdf->setFontStretching(120);
// $pdf->setFontSpacing(2.254);
$pdf->TextField('a_r_uscis_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),140, 50.5);


$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 62, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 61, false); // angle
$pdf->StopTransform();

// $pdf->Ln(1.5);

$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1, 1, 1.3); // set cell padding //$pdf->setCellPaddings( $left = '', $top = '', $right = '', $bottom = '');
$pdf->SetFont('times', '', 10); // set font
/* $html = '<div style="font-stretch:96;margin: 0.3in;padding: 0.3in;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;START HERE - Type or print in black ink.</b></div>';
$pdf->writeHTML($html, true, false, true, false, ''); */


$html = '<div style="margin: 0.3in;padding: 0.3in;">The purpose of this form is to collect additional information for a spouse beneficiary of Form I-130, Petition for Alien Relative.
If  your spouse is a U.S. citizen, lawful permanent resident, or non-citizen U.S. national who is filing Form I-130 on your behalf, you  must complete and sign Form I-130A,
Supplemental Information for Spouse Beneficiary, and submit it with the Form I-130 filed by  your spouse. If you reside overseas, you still must complete Form I-130A,
but you do not need to sign the form.</div>';
$pdf->writeHTMLCell(189.5, 0, 13, 67, $html, 'LRTB', 1, 0, true, 'C'); 


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 1. Information About You</b> (Spouse<br>Beneficiary)</div>';
$pdf->writeHTMLCell(91, 12, 13, 88, $html, 1, 1, true, false, 'J', true);



$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(91, 6, 13, 101, $html, '', 0, 0, true, 'L'); 


$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 58, 133, false); // angle
$pdf->StopTransform();

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->MultiCell(80, 15, "A-", 0, 'C', 0, 1, 16, 106.5, true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('alien_registration_number', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),60, 107);

$pdf->SetFont('times', '', 10.5); // set font
$html ='<div><b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(91, 6, 13, 114, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('Times', 'B', 10); // set font
$pdf->TextField('street_number_and_name_by_physical_address_2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 115);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 60, 179, false); // angle
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('uscis_online_account_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),46, 120);




/* $pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('spouse_beneficiary_date_from', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 115);
 */
 
//Start left side code
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(90.5, 7, "Your Full Name", 0, 'L', 1, 1, 13, 130, true);


$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>3.a.</b> &nbsp;&nbsp;Family Name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Last Name)';
$pdf->writeHTMLCell(50, 0, 13, 137, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('last_name_by_family', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 139);


$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>3.b.</b> &nbsp;&nbsp;Given Name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(First Name)';
$pdf->writeHTMLCell(50, 0, 13, 147, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('first_name_by_given', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 148);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;Middle Name';
$pdf->writeHTMLCell(50, 0, 13, 157, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('middle_name', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 157);


$pdf->SetFont('times', '', 10); // set font
$html = 'Provide your physical addresses for the last five years, whether inside or outside the United States. Provide your current address first. If you need extra space to complete this section, use the space provided in <b>Part 7.Additional Information.</b>';
$pdf->writeHTMLCell(92, 0, 13, 172, $html, '', 0, 0, true, 'L'); 
$html = '<b>Physical Address 1</b>';
$pdf->writeHTMLCell(92, 0, 13, 192, $html, '', 0, 0, true, 'L'); 

$html = '<b>4.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 13, 197, $html, '', 0, 0, true, 'L');
$pdf->SetFont('Times', 'B', 10); // set font
$pdf->TextField('street_number_and_name_by_physical_address_1', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 198);










$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>4.b.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flr.';
$pdf->writeHTMLCell(50, 0, 13, 206.5, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),62.5, 206.5);


$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>4.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 13, 215, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),46, 215);

$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>4.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>4.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 13, 223, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 223.2, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70.5, 223.2);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>4.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 13, 233, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 233);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>4.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 13, 243, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),46, 243);




$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>4.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 13, 250, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('country_physical_address_2', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 257);



//End left side code




//Start right side code
$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 88, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('spouse_beneficiary_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 88);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 96, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->writeHTMLCell(30, 7, 172.5, 97, '', 'TLRB', 1, 0, true, 'L'); 

$pdf->writeHTMLCell(89, 2, 113, 106, '', 'T', 0, 0, true, 'L'); // top border

$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>Physical Address 2</b></div>';
$pdf->writeHTMLCell(50, 0, 112, 108, $html, '', 0, 0, true, 'L'); 

$html = '<b>6.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 114, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>6.b.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flr.';
$pdf->writeHTMLCell(50, 0, 112, 124, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),161.5, 124);


$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>6.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 133);

$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>6.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 140.5, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 141.5);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>6.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 150, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 150);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>6.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 158.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 158.5);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>6.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 166, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('country_physical_address_2', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 172);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 181, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('spouse_beneficiary_date_from_2', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 181);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 189, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('spouse_beneficiary_date_to_2', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 189.5);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>Last Physical address Outside the United States</b>';
$pdf->writeHTMLCell(90, 0, 112, 197, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10); // set font
$html = 'Provide your last address outside the United States of more than one year (even if listed above).';
$pdf->writeHTMLCell(90, 0, 112, 203, $html, '', 0, 0, true, 'L');


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 212, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('Times', 'B', 10); // set font
$pdf->TextField('street_number_and_name_by_physical_address_outside', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 213);



$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flr.';
$pdf->writeHTMLCell(50, 0, 112, 221, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),161.5, 221);



$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 229.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('city_or_town_2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 229.5);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.d.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 238, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('province_2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 238);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.e.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 246, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('postal_code_2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 246);



$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.f.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 253, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('country_physical_address_1', 81.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121, 258.5);
//End right side code





$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(90.5, 7, "Address History", 0, 'L', 1, 1, 13, 165, true);






/* // set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
// $pdf->Cell(35, 5, 'Gender:');
$pdf->ComboBox('state', 30, 5,array(array('', ''),array('AA', 'AA'),array('AE', 'AE'),array('AK', 'AK')));
$pdf->Ln(6);

$pdf->ComboBox('gender', 30, 5, array(array('', '-'), array('M', 'Male'), array('F', 'Female')));
$pdf->Ln(6); */







$pdf->setCellPaddings(0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(255,255,255);
$html = '<input type="checkbox" name="choose_form_g_28" value="1" />';
$pdf->writeHTMLCell(5, 5, 16, 41, $html, 0, 1, false, false, 'L', false);





$html = '<input type="checkbox" name="choose_apt" value="1" />';
$pdf->writeHTMLCell(5, 5, 120, 125.2, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="choose_ste" value="1" />';
$pdf->writeHTMLCell(5, 5, 133, 125.2, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="choose_flr" value="1" />';
$pdf->writeHTMLCell(5, 5, 144, 125.2, $html, 0, 1, false, false, 'L', false);


$html = '<input type="checkbox" name="choose_apt_2" value="1" />';
$pdf->writeHTMLCell(5, 5, 120, 222, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="choose_ste_2" value="1" />';
$pdf->writeHTMLCell(5, 5, 133, 222, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="choose_flr_2" value="1" />';
$pdf->writeHTMLCell(5, 5, 144, 222, $html, 0, 1, false, false, 'L', false);






$pdf->AddPage('P', 'LETTER'); // page number 2


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 1. Information About You</b> (Spouse<br>Beneficiary)</div>';
$pdf->writeHTMLCell(91, 12, 13, 88, $html, 1, 1, true, false, 'J', true);
	
	
	

// Submit Button
/* $pdf->Button(
	'submit', 30, 10, 'Submit',
	array(
		'S'=>'SubmitForm',
		'F'=>'fetch.php?post=i130a',
		'Flags'=>array('ExportFormat')
	),
	array(
		'lineWidth'=>2, 'borderStyle'=>'beveled',
		'fillColor'=>array(128, 196, 255),
		'strokeColor'=>array(64, 64, 64)
	)
); */

$pdf->Button('submit',30, 10,'Submit','SubmitCustomForm()',array('textColor'=>'yellow','fillColor'=>array(128, 196, 255)));
	
/* 
$pdf->AddPage('P', 'LETTER'); // page number 3

$pdf->AddPage('P', 'LETTER'); // page number 4

$pdf->AddPage('P', 'LETTER'); // page number 5

$pdf->AddPage('P', 'LETTER'); // page number 6 */



$js = "
var fields = {
	'volag_number':' ',
	'attorney_state_bar_number':' ',
	'a_r_uscis_online_account_number':' ',
	'spouse_beneficiary_date_from':' ',
	'alien_registration_number':' ',
	'uscis_online_account_number':' ',
	'apt_ste_flr':' ',
	'country_physical_address_1':' ',
	'country_physical_address_2':' ',
	'spouse_beneficiary_date_from_2':' ',
	'spouse_beneficiary_date_to_2':' ',
	'street_number_and_name_by_physical_address_outside':'',
	'street_number_and_name_by_physical_address_1':'',
	'street_number_and_name_by_physical_address_2':'',
	'city_or_town':'',
	'state':'',
	'zip_code':'',
	'province':' ',
	'postal_code':' ',
	'city_or_town_2':'',
	'province_2':' ',
	'postal_code_2':' ',
	'last_name_by_family':'',
	'first_name_by_given':'',
	'middle_name':' '
};
for (var fieldName in fields) {
    if (!fields.hasOwnProperty(fieldName)) continue;
    var field = getField(fieldName);
    if (field && field.value === '') {
        field.value = fields[fieldName];
    }
}

function SubmitCustomForm() {
	this.submitForm('https://lms.siscotech.com/views/work_file/pdf/fetch.php', true);
}
";
$pdf->IncludeJS($js);


// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');