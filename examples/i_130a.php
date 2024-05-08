<?php
require_once('formheader.php');

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
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 11.5, false, 'T', 'C');
			
			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 13.4, false, 'T', 'C');
		}
    }

    // Page footer
    public function Footer() {
        $this->SetY(-16); // Position at 15 mm from bottom
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(190.6, 4, '', $header_top_border, 1, 1);
		
        $this->SetFont('times', '', 9); // Set font
		
		$this->Cell(40, 6, "Form I-130A  Edition   04/01/24", 0, 0, 'L');
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 158.5, 268.2, true);
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
$pdf->AddPage('P', 'LETTER'); // page number 1

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
$pdf->MultiCell(40, 5, "OMB No. 1615-0012\nExpires 02/28/2027", 0, 'C', 0, 1, 169, 18.5, true);

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


$pdf->SetFont('times', '', 9.8); // set font
$pdf->SetDrawColor(70,70,70); // set color for cell border
$pdf->SetFillColor(215,215,215); // set filling color
$html ='<div><b>To be completed by an attorney or accredited representative</b> (if any)</div>';
$pdf->writeHTMLCell(188.8, 6, 13.2, 33.25, $html, 'B', 0, 1, true, 'C'); 



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
$pdf->SetFont('courier', 'B', 10); 
// set font

$pdf->TextField('volag_number', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 50.5);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 94, 50.5);



// $pdf->setFontStretching(120);
// $pdf->setFontSpacing(2.254);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('a_r_uscis_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),140, 50.5);

$pdf->SetFont('times', 'B', 10); // set font
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
$pdf->SetFontSize(12); // set font
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
$pdf->TextField('a_number', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),60, 107);

$pdf->SetFont('times', '', 10.5); // set font
$html ='<div><b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(91, 6, 13, 114, $html, '', 0, 0, true, 'L'); 


$pdf->setCellPaddings(2, 2.5, 1, 2.5); // set cell padding

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_name', 57.5, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 115);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 60, 177, false); // angle
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('uscis_online_account_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),46, 120);
 
//Start left side code
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(90.5, 7, "Your Full Name", 0, 'L', 1, 1, 13, 130, true);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.a.</b> &nbsp;&nbsp;Family Name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Last Name)';
$pdf->writeHTMLCell(50, 0, 13, 137, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);

// set font
$pdf->TextField('last_name', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid', 'align'=>'right'), array(),44, 139);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.b.</b> &nbsp;&nbsp;Given Name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(First Name)';
$pdf->writeHTMLCell(50, 0, 13, 147, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('first_name', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 148);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;Middle Name';
$pdf->writeHTMLCell(50, 0, 13, 157, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('middle_name', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 157);


$pdf->SetFont('times', '', 10); // set font
$html = 'Provide your physical addresses for the last five years, whether inside or outside the United States. Provide your current address first. If you need extra space to complete this section, use the space provided in <b>Part 7.Additional Information.</b>';
$pdf->writeHTMLCell(92, 0, 13, 172, $html, '', 0, 0, true, 'L'); 
$html = '<b>Physical Address 1</b>';
$pdf->writeHTMLCell(92, 0, 13, 191, $html, '', 0, 0, true, 'L'); 

$html = '<b>4.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 13, 196, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_name', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 197);





$pdf->SetFont('times', '', 10); // set font

$html= '<div><b>4.b. </b>&nbsp; 
<input type="checkbox" name="address1_apt_ste_flr1" value="Apt" checked="" />Apt. 
<input type="checkbox" name="address1_apt_ste_flr2" value="Ste" checked="" />Ste.
<input type="checkbox" name="address1_apt_ste_flr3" value="Flr" checked="" /> Flr.
</div>';

$pdf->writeHTMLCell(50, 0, 13, 207, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_apt_ste_flr_value', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),62.5, 206);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 13, 215, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),46, 215);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>4.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 13, 223, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="address1_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 223.2, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70.5, 223.2);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 13, 233, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 233);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 13, 243, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),46, 243);




$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 13, 250, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_country_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 257);



//End left side code




//Start right side code
$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 88, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 88);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 96, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address1_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 97);



/* $pdf->writeHTMLCell(50, 0, 112, 96, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->writeHTMLCell(30, 7, 172.5, 97, '', 'TLRB', 1, 0, true, 'L');  */

$pdf->writeHTMLCell(89, 2, 113, 106, '', 'T', 0, 0, true, 'L'); // top border

$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>Physical Address 2</b></div>';
$pdf->writeHTMLCell(50, 0, 112, 106.6, $html, '', 0, 0, true, 'L'); 

$html = '<b>6.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 112, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>6.b.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flr.';
$pdf->writeHTMLCell(60, 0, 112, 124, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('address2_apt_ste_flr_value', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),161.5, 124);


$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>6.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 133);

$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>6.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="address2_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 140.5, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10.5); // set font
$pdf->TextField('address2_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 141.5);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>6.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 150, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 150);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>6.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 158.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 158.5);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>6.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 166, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_country_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 172);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 181, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 181);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 189, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('address2_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 189.5);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>Last Physical address Outside the United States</b>';
$pdf->writeHTMLCell(90, 0, 112, 197, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10); // set font
$html = 'Provide your last address outside the United States of more than one year (even if listed above).';
$pdf->writeHTMLCell(90, 0, 112, 203, $html, '', 0, 0, true, 'L');


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 212, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);; // set font
$pdf->TextField('outside_address_name', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 213);



$pdf->SetFont('times', '', 10.5); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flr.';
$pdf->writeHTMLCell(50, 0, 112, 221, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_apt_ste_flr_value', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),161.5, 221);



$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 229.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 229.5);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.d.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 238, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 238);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.e.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 246, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_postalcode', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 246);



$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>8.f.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 253, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_country_name', 81.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121, 258.5);
//End right side code





$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(90.5, 6.3, "Address History", 0, 'L', 1, 1, 13, 165, true);





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
//......

// ............second page start ...................... second page start ...........................








$pdf->AddPage('P', 'LETTER'); // page number 2


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 1. Information About You</b> (Spouse<br>Beneficiary)</div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'J', true);
	
//....
$html = '<div><b>9.a. &nbsp; &nbsp;</b>Date From (mm/dd/yyyy)</div>';	
$pdf->writeHtmlCell(91, 12, 13, 31, $html, 0, 0, false, 'J', true);	
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),74, 31);
//.....

$pdf->setFont('times', '', 10);
$html = '<div><b>9.b. &nbsp; &nbsp;</b> Date To (mm/dd/yyyy)</div>';
$pdf->setFont('times', '', 10);	
$pdf->writeHtmlCell(91, 12, 13, 40, $html, 0, 0, false, 'J', true);	
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),74, 40);


//information about parents
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(90, 7, "Information About Parent 1", 0, 'L', 1, 1, 13, 49, true);
//.....

$pdf->setFont('Times','',10);
$html= '<div>Full Name of parent 1</div>';
$pdf->writeHTMLCell(91, 12, 13, 55,$html, 0, 0, false, 'L', true );
//....

$pdf->setFont('times','', 10);
$html= '<div><b>10.a. &nbsp; &nbsp;</b>Family Name <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; (Maiden Name)</div>';
$pdf->writeHTMLCell(91, 12, 13, 60, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_maiden_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 62);
//........
$pdf->setFont('times','', 10);
$html= '<div><b>10.b. &nbsp; &nbsp;</b>Given  Name <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(60, 12, 13, 70, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_first_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 71);
//..........

$pdf->setFont('times','', 10);
$html= '<div><b>10.c. &nbsp; &nbsp;</b>Middle Name</div>';
$pdf->writeHTMLCell(60, 12, 13, 81, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_middle_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 80);


//..............
$pdf->setFont('times','', 10);
$html= '<div><b>11.</b>&nbsp; &nbsp;Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(60, 12, 13, 89, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),73, 89);
//.......

$pdf->setFont('times','', 10);
$html= '<div><b>12. </b> &nbsp;  Sex &nbsp; &nbsp; <input type="checkbox" name="parent1_gender" value="Male" checked="checked" />Male &nbsp;&nbsp; <input type="checkbox" name="parent1_gender" value="Female" checked="" /> Female</div>';
$pdf->writeHTMLCell(60, 12, 13, 96, $html,0, 0, false, 'L', true);
//.........

$pdf->setFont('times', '', 10);
$html= '<div><b>13.</b> &nbsp;  City /Town /Village of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 102, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_city_town_village_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 108);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>14.</b> &nbsp; Country of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 115.5, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_country_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 122);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>15.</b> &nbsp; City / Town/ Village of Residence</div>';
$pdf->writeHTMLCell(60, 12, 13, 130, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_city_town_village_of_residence', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 137);
//.......

$pdf->setFont('times', '', 11);
$html= '<div><b>16.</b> &nbsp; Country Of Residence</div>';
$pdf->writeHTMLCell(60, 12, 13, 145, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_country_of_residence', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 151);


// Start Information About Parent 2 ...............
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(90, 7, "Information About Parent 2", 0, 'L', 1, 1, 13, 160, true);
//.......

$pdf->setFont('Times','',10);
$html= '<div>Full Name of Parent 2</div>';
$pdf->writeHTMLCell(91, 12, 13, 167, $html, 0, 0, false, 'L', true );
//......

$pdf->setFont('times','', 10);
$html= '<div><b>17.a. &nbsp; &nbsp;</b>Family Name <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(91, 12, 13, 171, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_family_last_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 174);
//...........

$pdf->setFont('times','', 10);
$html= '<div><b>17.b. &nbsp; &nbsp;</b>Given Name <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(90, 12, 13, 182, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_last_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 184);
//......

$pdf->setFont('times','', 10);
$html= '<div><b>17.c. &nbsp; &nbsp;</b>Middle Name </div>';
$pdf->writeHTMLCell(90, 12, 13, 193.5, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_middle_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 193.5);

//......

$pdf->setFont('times','', 10);
$html= '<div><b>18. &nbsp; &nbsp;</b> Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 12, 13, 202, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),73, 202);
//.......

$pdf->setFont('times','', 10);
$html= '<div><b>19. </b>  &nbsp;  Sex &nbsp; &nbsp; <input type="checkbox" name="sex" value="Male" checked="" />Male &nbsp;&nbsp; <input type="checkbox" name="sex" value="Female" checked="checked" /> Female</div>';
$pdf->writeHTMLCell(60, 12, 13, 209, $html,0, 0, false, 'L', true);
//.....


$pdf->setFont('times', '', 10);
$html= '<div><b>20.</b> &nbsp;  City /Town /Village of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 215, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_city_town_village_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 221);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>21.</b> &nbsp; Country of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 228, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_country_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 234);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>22.</b> &nbsp; City / Town/ Village of Residence</div>';
$pdf->writeHTMLCell(60, 12, 13, 241, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_city_town_village_of_residence', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 246);
// //.......


$pdf->setFont('times', '', 11);
$html= '<div><b>23.</b> &nbsp; Country of Residence</div>';
$pdf->writeHTMLCell(60, 12, 13, 253, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_country_of_residence', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 259);

//end ............ left side .....................






// start right side ...................start right side ...................
// employment history......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(92, 7, " Part 2. Information About Your Employeement ", 1, 'C', 1, 1, 112, 17, true);
//.........

$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div>Provide your Employment history of last five years,  wheather inside or out side of United States. Provide your current emploeement first. If your are currently unemployed, type or print "Unemployed" in <b>Item Number 1</b>. bellow. If you need extra space to complete this section, use the space provided in <b>Part 7. Additional Information.</b></div>';
$pdf->writeHTMLCell(91, 12, 112, 26,$html, 0, 1, 0, true, 'L', false, false);
//...........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$pdf->MultiCell(92, 7, "Employment History", 0, 'L', 1, 1, 112, 54, true);
//.........

$pdf->setFont('Times','',10);
$html= '<div><b>Employer 1</b></div>';
$pdf->writeHTMLCell(92, 12, 112, 60, $html, 0, 0, false, 'L', true );
//...........

$pdf->setFont('times', '', 11);
$html= '<div><b>1. &nbsp; </b> &nbsp;Name of Employer/ Company </div>';
$pdf->writeHTMLCell(60, 12, 112, 65, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),122, 71);
//............

$pdf->setFont('times', '', 11);
$html= '<div><b>2.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 78, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_address', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 79.5);

//.............

$pdf->SetFont('times', '', 10.5); // set font

$html= '<div><b>2.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="employer1_apt_ste_flr1" value="Apt" checked="" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="employer1_apt_ste_flr2" value="Ste" checked="" />Ste.
<input type="checkbox" name="employer1_apt_ste_flr3" value="Flr" checked="" /> Flr.
</div>';


$pdf->writeHTMLCell(60, 0, 112, 88, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_apt_ste_flr_value', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),164, 88);


//......

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 0, 112, 97, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_city_or_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 96.5);
//............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.d.</b>&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 112, 105, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="employer1_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->SetFont('Times', '', 10.5); // set font
$pdf->writeHTMLCell(25, 0, 129.5, 105, $html, '', 0, 0, true, 'L');
$html= '<div><b>2.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 105, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),171, 105);
//..........


$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 114.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_province', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 114.5);
//...............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 112, 124, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_postal_code', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 124);
//........


$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 131, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),122, 138);
//.....

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.</b> &nbsp; Your Occupation </div>';
$pdf->writeHTMLCell(60, 0, 112, 145, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_occupation', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),122, 151);
//......

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>4.a.</b> &nbsp; Date From (dd/mm/yyyy) </div>';
$pdf->writeHTMLCell(60, 0, 112, 160, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),174, 160);
//...........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>4.b.</b> &nbsp; Date To (dd/mm/yyyy) </div>';
$pdf->writeHTMLCell(60, 0, 112, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),174, 169);
//....

$pdf->writeHTMLCell(90, 2, 114, 178, '', 'T', 0, 0, true, 'L'); 
//.....
$pdf->setFont('Times','',10);
$html= '<div><b>Employer 2</b></div>';
$pdf->writeHTMLCell(92, 12, 112, 178, $html, 0, 0, false, 'L', true );


//.....employer 2...........................



$pdf->setFont('times', '', 11);
$html= '<div><b>5. &nbsp; </b> &nbsp;Name of Employer/ Company </div>';
$pdf->writeHTMLCell(60, 12, 112, 184, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121, 190);
//............
$pdf->setFont('times', '', 11);
$html= '<div><b>6.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 197, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_address', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 199);

//.............

$pdf->SetFont('times', '', 10.5); // set font

$html= '<div><b>6.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="employer2_apt_ste_flr1" value="Apt" checked="" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="employer2_apt_ste_flr2" value="Ste" checked="" />Ste.
<input type="checkbox" name="employer2_apt_ste_flr3" value="Flr" checked="" /> Flr.
</div>';

$pdf->writeHTMLCell(60, 0, 112, 209, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_apt_ste_flr_value', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),164, 208);

//......

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>6.c.</b> &nbsp; City Or Town </div>';
$pdf->writeHTMLCell(50, 0, 112, 216, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_city_or_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 217);
//............
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>6.d.</b>&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 112, 226, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="employer2_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->SetFont('Times', '', 10.5); // set font
$pdf->writeHTMLCell(25, 0, 129.5, 226, $html, '', 0, 0, true, 'L');
$html= '<div><b>6.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 226, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),171, 226);
//..........


$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>6.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 235, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_province', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 235);
//...............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>6.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 112, 243, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_postal_code', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 244);

//........

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>6.h.</b> &nbsp; Country</div>';
$pdf->writeHTMLCell(30, 0, 112, 251, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 258);

//........ end page two ..............end right side.................

//  page number 3................ page 3 start 


//.........continue spouse benifishioary............start left side .........
$pdf->AddPage();//................page number 3

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 2. Information About Your Employement.</b> (Continued)</div>';
$pdf->writeHTMLCell(90, 7, 12, 17, $html, 1, 1, true, 'L');

//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>7. </b>&nbsp; &nbsp;Your Occupation</div>';
$pdf->writeHTMLCell(90, 7, 12, 29, $html,'', 0,0,  true,'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_occupation', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 34.5);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 43, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('employer2_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72, 43);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 52, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10.5); 
$pdf->TextField('employer2_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 51.5);
//....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 3. Information About Your Employement Outside  the united States</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 1, 1, true, 'L');

//........
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div>Provide Your last occupation outside the United States if not show above. If you never worked ouitside the United States, provide this information in the space provided in <b>Part 7. Additional Information.</b></div>';
$pdf->writeHTMLCell(91, 12, 12, 76,$html, 0, 1, 0, true, 'L', false, false);
//......

$pdf->setFont('times', '', 11);
$html= '<div><b>1. &nbsp;</b>&nbsp; Name of Employer/Company </div>';
$pdf->writeHTMLCell(80, 12, 12, 92, $html,0, 0, false, 'L', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_company_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),20, 98);
//............
$pdf->setFont('times', '', 11);
$html= '<div><b>2.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 12, 105, $html,0, 0, false, 'L', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_address', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),47, 106.5);
//.............

$pdf->SetFont('times', '', 10.5); // set font

$html= '<div><b>6.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="outside_of_ny_apt_ste_flr1" value="Apt" checked="" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="outside_of_ny_apt_ste_flr2" value="Ste" checked="" />Ste.
<input type="checkbox" name="outside_of_ny_apt_ste_flr3" value="Flr" checked="" /> Flr.
</div>';

$pdf->writeHTMLCell(60, 0, 12, 116, $html, '', 0, 0, true, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_apt_ste_flr_value', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 115);
//......

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 0, 12, 124, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 123.5);
//............
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.d.</b>&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="outside_of_ny_state" size="0.10">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->SetFont('Times', '', 10.5); // set font
$pdf->writeHTMLCell(25, 0, 29.5, 133, $html, '', 0, 0, true, 'L');
$html= '<div><b>2.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69, 132);
//..........
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 141, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),42, 141);
//...............
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 12, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),42, 150);
//........
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 157, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 163);
//.....
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3. &nbsp;</b> &nbsp; &nbsp;Your Occupation </div>';
$pdf->writeHTMLCell(60, 0, 12, 170, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_occupation', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 176);
//......
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>4.a.</b> &nbsp; Date From (dd/mm/yyyy) </div>';
$pdf->writeHTMLCell(60, 0, 12, 184, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72, 184.5);
//...........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>4.b.</b> &nbsp; Date To (dd/mm/yyyy) </div>';
$pdf->writeHTMLCell(60, 0, 12, 193, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72, 193);
//.........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 4. Spouse Beneficiary\'s Statement, Contact Information, Certification, and Signature </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 203, $html, 1, 1, true, 'L');
//........
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-130 and Form I-30A Instructions before completing this part. </div>';
$pdf->writeHTMLCell(91, 12, 12, 215,$html, 0, 1, 0, true, 'L', false, false);
//........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Spouse Beneficiary\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 12, 226.5, $html, 0, 1, true, 'L');
//........

$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>NOTE: </b> Select the box for either<b> Item Number 1.a.</b> or <b>1.b.</b> If applicable, select the box for <b>Item Number 2.</b> </div>';
$pdf->writeHTMLCell(91, 12, 12, 235, $html, 0, 1, 0, true, 'L', false, false);
//......
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="agree" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(15, 12, 12, 250, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div> I can read and understand English, and I have read and understand every question and instruction on this form and my answer to every question </div>';
$pdf->writeHTMLCell(80, 12, 25, 250, $html, 0, 1, 0, true, 'L', false, false);

// ........left side end .....page 3 .......right side start..............

$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="agree" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(93, 12, 112, 17, $html, 0, 1, 0, true, 'L', false, false);
$html = '<div>The interpreter name in <b>Part 5. </b> read to me every question and instruction on this form and my answer to every question in  </div>';
$pdf->writeHTMLCell(78, 12, 127, 17, $html, 0, 1, 0, true, 'L', false, false);


$pdf->writeHTMLCell(78, 12, 203.5, 32, ',', 0, 1, 0, true, 'L', false, false);//for comma ','
$pdf->writeHTMLCell(78, 12, 203.5, 53, ',', 0, 1, 0, true, 'L', false, false);//for comma ','
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M');
$pdf->writeHTMLCell(76, 7, 128, 30.5, '', 1, 0, false, 'L');//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood everything. </div>';
$pdf->writeHTMLCell(76, 12, 127, 37, $html, 0, 0, false, 'L');
//....
$html= '<div><b>2.  </b> &nbsp; <input type="checkbox" name="agree" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(30, 12, 112, 47, $html, 0, 1, 0, true, 'L', false, false);
$html = '<div>At my request, the  prepare name in <b>Part 6.,</b> </div>';
$pdf->writeHTMLCell(80, 12, 127, 46, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(76, 7, 128, 52, '', 1, 0, false, 'L'); // empty cell....
$html = '<div>prepare this form for me based only upon information I proved or authorized.</div>';
$pdf->writeHTMLCell(80, 12, 127, 59, $html, 0, 0, false, 'L');
//....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0.5, 1, 0.5, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Spouse Beneficiary\'s Contact Information </div>';
$pdf->writeHTMLCell(92, 7, 112, 70, $html, 0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>3.</b>&nbsp; &nbsp; &nbsp;Spouse Beneficiary\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 112, 78, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_3_daytime_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 84);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Spouse Beneficiary\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 91, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_4_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 96.5);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp; &nbsp; Spouse Beneficiary\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 103, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_5_email', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 109);
//.....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0.5, 1, 0.5, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Spouse Beneficiary\'s Certification </div>';
$pdf->writeHTMLCell(92, 7, 112, 119, $html, 0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html = '<div>Copies of any documents I have submitted are exact photocopies
of unaltered, original documents, and I understand that USCIS
may require that I submit original documents to USCIS at a later
date. Furthermore, I authorize the release of any information
from any of my records that USCIS may need to determine my
eligibility for the immigration benefit I seek.</div>';
$pdf->writeHTMLCell(92, 7, 112, 127, $html, 0, 0, false, 'L');

$html = '<div>I further authorize release of information contained in this form,
n supporting documents, and in my USCIS records to other
entities and persons where necessary for the administration and
enforcement of U.S. immigration laws.</div>';
$pdf->writeHTMLCell(92, 7, 112, 155, $html, 0, 0, false, 'L');

$html = '<div>I certify, under penalty of perjury, that I provided or authorized
all of the information in this form, I understand all of the
information contained in, and submitted with, my form, and that
all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(92, 7, 112, 172, $html, 0, 0, false, 'L');
//.......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0.5, 1, 0.5, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Spouse Beneficiary\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 112, 192, $html, 0, 1, true, 'L');
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b> &nbsp; Spouse Beneficiary\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 112, 200, $html, 0, 1, false, 'L');
//.......
$pdf->writeHTMLCell(82, 7, 122, 206, '', 1, 0, false, 'L');
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 112, 204, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 215, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_6b_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 215);
//.........
$pdf->setFont('times', '', 10);
$html  = '<div><b>NOTE TO ALL SPOUSE BENEFICIARIES:  </b> If you do not
completely fill out this form or fail to submit required documents
listed in the Instructions, USCIS may deny the Form I-130 filed
on your behalf. </div>';
$pdf->writeHTMLCell(92, 7, 112, 225, $html, 0, 1, false, 'L');

//................end page 3 ......start page 4..........&&&&&&& start right side ............


$pdf->AddPage('P', 'LETTER'); // page number 4



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 5. Interpreter\'s Contact Information,
Certification, and Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, 'L');
//....
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the interpreter you used
to complete Form I-130A if he or she is different from the
interpreter used to complete the Form I-130 filed on your behalf.</div>';
$pdf->writeHTMLCell(94, 10, 12, 28, $html, 0, 1, false, 'L');
//......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 46, $html, 0, 1, true, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b> &nbsp; &nbsp;Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 53, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_1a_family_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 59);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b> &nbsp; &nbsp;Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 66, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_1b_given_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 72);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;  Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 79, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_2_organization', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 85);
//.....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(90, 7, 13, 95, $html, 0, 1, true, 'L');
//........
//............
$pdf->setFont('times', '', 11);
$html= '<div><b>3.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 12, 105, $html,0, 0, false, 'L', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_3a_street_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),47, 106.5);
//.............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt5" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste5" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr5" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 116, $html, '', 0, 0, true, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_3b_apt_ste', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 115);
//......

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 0, 12, 124, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3c_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 124);
//............
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.d.</b>&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="interpreter_state" size="0.10">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->SetFont('Times', '', 10.5); // set font
$pdf->writeHTMLCell(25, 0, 29.5, 133, $html, '', 0, 0, true, 'L');
$html= '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3e_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69, 132.5);
//..........
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 141, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3f_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),42, 141);
//...............
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 12, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3g_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),42, 150);
//........
$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 157, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3h_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 163);
//.....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Interpreter\'s Contact Information </div>';
$pdf->writeHTMLCell(90, 7, 13, 175, $html, 0, 1, true, 'L');
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>4. </b>&nbsp; &nbsp; &nbsp; Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(95, 7, 12, 183, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_4_daytime_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 189.5);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b>&nbsp; &nbsp; &nbsp; Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 197, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_5_mobile_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 203);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b>&nbsp; &nbsp; &nbsp; Interpreter\'s  Email Address (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 210, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_6_emailaddress', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 216);

//.....page 4 end left side ...........start page 4 right side ........................... 

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Interpreter\'s Certification </div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 9.5);
$html='<div>I certify, under penalty of perjury, that: </div>';
$pdf->writeHTMLCell(92, 7, 112, 25, $html, 0, 1, false, 'L');
$html='<div>I am fluent in English and</div>';
$pdf->writeHTMLCell(40, 7, 112, 31, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_certification', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),152, 31);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(78, 12, 203, 32.5, ',', 0, 1, 0, true, 'L', false, false);//for comma ','
$pdf->setCellHeightRatio(1.3);
$pdf->setFont('Times', '', 10);
$html='<div>which is the same language provided in<b>Part 4.,Item Number 1.b.,</b>and I have to read spouse beneficiary in the identified language every question and instruction on this form and his or her answer to every question.The spouse beneficiery informed me that he or she understands every instruction,question, and answer on the form,including the <b>Spouse beneficiary\'s Certification,</b>and has verified the accurecy of every answer.</div>';
$pdf->writeHTMLCell(95, 10, 112, 37, $html, 0, 1, false, 'L');
//.........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Interpreter\'s Signature </div>';
$pdf->writeHTMLCell(91, 7, 113, 72, $html, 0, 1, true, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Spouse Beneficiary\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 112, 80, $html, 0, 1, false, 'L');
//.......
$pdf->writeHTMLCell(82, 7, 122, 86, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 96, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_7b_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 95.5);
//........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 6. Contact Information, Declaration, and
Signature of the Person Preparing this Form, if
Other Than the Spouse Beneficiary</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 105, $html, 1, 1, true, 'L');
//.......
$pdf->setFont('times','', 10);
$html= '<div>Provide the following information about the preparer you used
to complete Form I-130A if he or she is different from the
preparer used to complete the Form I-130 filed on your behalf.</div>';
$pdf->writeHTMLCell(95, 7, 112, 123, $html, 0, 1, false, 'L');
//........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>preparer\'s Full Name</div>';
$pdf->writeHTMLCell(91, 7, 113, 139, $html, 0, 1, true, 'L');
//........
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp;preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 146.5, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_1a_family_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 152.5);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp;preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 159, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_1b_given_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 165);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>2.</b> &nbsp; &nbsp; Preparer\'s Business or Organization Name (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 172.5, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_2_organization', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 179);
//.....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 7, 113, 189, $html, 0, 1, true, 'L');
//.......


$pdf->setFont('times', '', 11);
$html= '<div><b>3.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 196, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 199);

//.............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt6" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste6" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr6" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 207.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3b_apt_ste', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),164, 207.5);


//......

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 0, 112, 216, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3c_city', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 216);
//............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.d.</b>&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 112, 224.5, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="preparer_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.'</option>';
}
$html .= '</select>';
$pdf->SetFont('Times', '', 10.5); // set font
$pdf->writeHTMLCell(25, 0, 129.5, 224.5, $html, '', 0, 0, true, 'L');
$html= '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 224.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3e_zip', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),171, 224.5);
//..........


$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 112, 232.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3f_province', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 233);
//...............

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 112, 242, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3g_postal', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 242);

//........


$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 248.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3h_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),122, 255);

//..... page number 4 end ...............
//.. page 5 start .................

$pdf->AddPage('P', 'LETTER'); // page number 5

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 13);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 6. Contact Information, Declaration, and
Signature of the Person Preparing this Form, if
Other Than the Spouse Beneficiary </b> (Continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, 'L');
//............
//...........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Preparer\'s Contact Information </div>';
$pdf->writeHTMLCell(90, 7, 13, 37, $html, 0, 1, true, 'L');
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>4. </b>&nbsp; &nbsp; &nbsp; Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(95, 7, 12, 44, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part6_4_telephone', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 49.5);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b>&nbsp; &nbsp; &nbsp; Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 57, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part6_5_Telephone', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 63);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b>&nbsp; &nbsp; &nbsp; Preparer\'s  Email Address (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 71, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part6_6_email', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 77);

//......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 13, 87, $html, 0, 1, true, 'L');
//.........

//......
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>7.a.  </b> &nbsp; <input type="checkbox" name="agree" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(15, 12, 12, 96, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div>I am not an attorney or accredited representative but
have prepared this form on behalf of the spouse
beneficiary and with the spouse beneficiary\'s consent. </div>';
$pdf->writeHTMLCell(83, 12, 25, 96, $html, 0, 1, 0, true, 'L', false, false);
//..........


$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.04); // reset font spacing
$html= '<div><b>7.b.  </b> &nbsp; <input type="checkbox" name="agree7b" value="1" checked=" " /></div>';
$pdf->writeHTMLCell(15, 12, 12, 111, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div>I am an attorney or accredited representative and my
representation of the spouse beneficiary in this  case <br>
&nbsp; &nbsp; &nbsp; extends &nbsp; &nbsp; &nbsp;does not extend beyond the  preparation <>of this form.</div>';
$pdf->writeHTMLCell(83, 12, 25, 111, $html, 0, 1, 0, true, 'L', false, false);

$pdf->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

$pdf->writeHTMLCell(4, 4, 26, 120, '', 1, 1, 0, true, 'L', false, false);
$pdf->writeHTMLCell(4, 4, 43, 120, '', 1, 1, 0, true, 'L', false, false);
//........
$html= '<div><b>NOTE: </b> If you are an attorney or accredited
representative whose representation extends beyond
preparation of this form, you may be obliged to submit
a completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited Representative,
with this form.</div>';
$pdf->writeHTMLCell(83, 12, 25, 130, $html, 0, 1, 0, true, 'L', false, false);
//.....
//...........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Preparer\'s Certification </div>';
$pdf->writeHTMLCell(92, 7, 13, 158, $html, 0, 1, true, 'L');
//............
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>By my signature, I certify, under penalty of perjury, that I
prepared this form at the request of the spouse beneficiary. The
spouse beneficiary then reviewed this completed form and
informed me that he or she understands all of the information
contained in, and submitted with, his or her form, including the
<b>Spouse Beneficiary\'s Certification,</b> and that all of this
information is complete, true, and correct. I completed this
form based only on information that the spouse beneficiary
provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(95, 25, 12, 167, $html, 0, 1, 0, true, 'L', false, false);
//.........

//...........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Preparer\'s Signature </div>';
$pdf->writeHTMLCell(92, 7, 13, 210, $html, 0, 1, true, 'L');
//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.a. </b> &nbsp; Preparer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 219, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(83, 7, 22, 225, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 234, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part6_8b_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 234);
//........ page number 5 end .............

$pdf->AddPage('P', 'LETTER'); // page number 6



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 7. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 18, $html, 1, 1, true, 'L');
//........
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>If you need extra space to provide any additional information
within this form, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this form or attach a separate sheet of
paper. Type or print your name and A-Number (if any) at the
top of each sheet; indicate the<b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
$pdf->writeHTMLCell(95, 25, 12, 26, $html, 0, 1, 0, true, 'L', false, false);
//...........
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 61, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 63, '', 1, 0, false, 'L');
//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 71, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 73, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 81, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 82, '', 1, 0, false, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 91, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 60, 91, '', 1, 0, false, 'L');
$pdf->StartTransform();
$pdf->Rotate(-31);
$pdf->SetFont('zapfdingbats', '', 10);  // symbol font
$pdf->writeHTMLCell(40, 7, 58, 119, TCPDF_FONTS::unichr(116), 0, 0, false, 'L');
$pdf->StopTransform();
$pdf->setFont('Times', '', 12);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(7, 7, 54, 91, $html, 0, 0, false, 'L');
//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 107.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 107.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 107.5);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 116, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="15" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 70, 20, 116, $html, 0, 0, false, 'L');

//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 188);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 188);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 188);
//.........


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 197, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="15" name="additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 70, 20, 197, $html, 0, 0, false, 'L');

//........end left  
// ....... start right side 


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 23);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 23);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 23);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 33, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="15" name="additional_information_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 70, 119, 32, $html, 0, 0, false, 'L');

//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 104);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 104);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 104);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="15" name="additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 70, 119, 114, $html, 0, 0, false, 'L');

//..........


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 186.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 186.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 186.5);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 198, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="15" name="additional_information_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 70, 119, 198, $html, 0, 0, false, 'L');




// java script 

// ".showData('')."

$js = "
var fields = {
    'selection':' ',
    'Employee_info':' ',
	'volag_number':' ".showData('volag_number')."',
    'parent_info':' ',
	'attorney_state_bar_number':' ".showData('attorney_state_bar_number')."',
	'a_r_uscis_online_account_number':' ".showData('a_r_uscis_online_account_number')."',
	'a_number':' ".showData('a_number')."',
	'uscis_online_account_number':' ".showData('uscis_online_account_number')."',
	'first_name':' ".showData('first_name')."',
	'last_name':' ".showData('last_name')."',
	'middle_name':' ".showData('middle_name')."',
	'address1_name':' ".showData('street_address')."',
	'address1_apt_ste_flr_value':' ".showData('address1_apt_ste_flr_value')."',
	'address1_city_or_town':' ".showData('city')."',
	'address1_state':' ".showData('state')."',
	'address1_zip_code':' ".showData('zip')."',
	'address1_province':' ".showData('province')."',
	'address1_postal_code':' ".showData('postal_code')."',
	'address1_country_name':' ".showData('country_name')."',
	'address1_date_from':' ',
	'address1_date_to':' ',
	'address2_name':' ',
	'address2_apt_ste_flr_value':' ',
	'address2_city_or_town':' ',
	'address2_state':' ',
	'address2_zip_code':' ',
	'address2_province':' ',
	'address2_postal_code':' ',
	'address2_country_name':' ',
	'address2_date_from':' ',
	'address2_date_to':' ',	
	'outside_address_name':' ',
	'outside_apt_ste_flr_value':' ',
	'outside_city_or_town':' ',
	'outside_province':' ',
	'outside_postalcode':' ',
	'outside_country_name':' ',
	'outside_date_from':' ',
	'outside_date_to':' ',
	'parent1_maiden_name':' ".showData('father_maiden_name')."',
	'parent1_first_name':' ".showData('father_first_name')."',
	'parent1_middle_name':' ".showData('father_middle_name')."',
	'parent1_date_of_birth':' ".showData('father_date_of_birth')."',
	'parent1_city_town_village_of_birth':' ".showData('father_birth_location')."',
    'parent1_country_of_birth':' ".showData('father_country_of_birth')."',
	'parent1_city_town_village_of_residence':' ".showData('father_city_town_village_of_residence')."',
	'parent1_country_of_residence':' ".showData('father_country_of_residence')."',
	'parent2_family_last_name':' ',
	'parent2_last_name':' ".showData('mother_last_name')."',
	'parent2_middle_name':' ".showData('mother_middle_name')."',
	'parent2_date_of_birth':' ".showData('mother_date_of_birth')."',
	'parent2_city_town_village_of_birth':' ".showData('mother_birth_location')."',
	'parent2_country_of_birth':' ".showData('mother_country_of_birth')."',
	'parent2_city_town_village_of_residence':' ".showData('mother_city_town_village_of_residence')."',
	'parent2_country_of_residence':' ".showData('mother_country_of_residence')."',
	'employer1_name':' ".showData('employer1_name')."',
	'employer1_address':' ".showData('employer1_address')."',
	'employer1_apt_ste_flr':' ".showData('employer1_apt_ste_flr')."',
	'employer1_city_or_town':' ".showData('employer1_city_or_town')."',
	'employer1_apt_ste_flr_value':' ".showData('employer1_apt_ste_flr_value')."',
	'employer1_state':' ".showData('employer1_state')."',
	'employer1_zip_code':' ".showData('employer1_zip_code')."',
	'employer1_province':' ".showData('employer1_province')."',
	'employer1_postal_code':' ".showData('employer1_postal_code')."',
	'employer1_country':' ".showData('employer1_country')."',
	'employer1_occupation':' ".showData('employer1_occupation')."',
	'employer1_date_from':' ".showData('employer1_date_from')."',
	'employer1_date_to':'   PRESENT ',
	'employer2_name':' ".showData('employer2_name')."',
	'employer2_address':' ".showData('employer2_address')."',
	'employer2_city_or_town':' ".showData('employer2_city_or_town')."',
	'employer2_apt_ste_flr_value':' ".showData('employer2_apt_ste_flr_value')."',
	'employer2_state':' ".showData('employer2_state')."',
	'employer2_zip_code':' ".showData('employer2_zip_code')."',
	'employer2_province':' ".showData('employer2_province')."',
	'employer2_postal_code':' ".showData('employer2_postal_code')."',
	'employer2_country':' ".showData('employer2_country')."',
	'employer2_occupation':' ".showData('employer2_occupation')."',
	'employer2_date_from':' ".showData('employer2_date_from')."',
	'employer2_date_to':' ".showData('employer2_date_to')."',
	'outside_of_ny_company_name':' ".showData('outside_of_ny_company_name')."',
	'outside_of_ny_address':' ".showData('outside_of_ny_address')."',
	'outside_of_ny_city_or_town':' ".showData('outside_of_ny_city_or_town')."',
	'outside_of_ny_apt_ste_flr_value':' ".showData('outside_of_ny_apt_ste_flr_value')."',
	'outside_of_ny_state':' ".showData('outside_of_ny_state')."',
	'outside_of_ny_zip_code':' ".showData('outside_of_ny_zip_code')."',
	'outside_of_ny_province':' ".showData('outside_of_ny_province')."',
	'outside_of_ny_postal_code':' ".showData('outside_of_ny_postal_code')."',
	'outside_of_ny_country':' ".showData('outside_of_ny_country')."',
	'outside_of_ny_occupation':' ".showData('outside_of_ny_occupation')."',
	'outside_of_ny_date_from':' ".showData('outside_of_ny_date_from')."',
	'outside_of_ny_date_to':' ".showData('outside_of_ny_date_to')."',
	
	'interpreter_state':' ',
	'preparer_state':' ',
	
	'part4_3_daytime_telephone':' ',
	'part4_4_telephone':' ',
	'part4_5_email':' ',
	'part4_6b_signature':' ',
	'part5_1a_family_name':' ',
	'part5_1b_given_name':' ',
	'part5_2_organization':' ',
	'part5_3a_street_number':' ',
	'part5_3b_apt_ste':' ',
	'part5_3c_city_town':' ',
	'part5_3e_zipcode':' ',
	'part5_3f_province':' ',
	'part5_3g_postal_code':' ',
	'part5_3h_country':' ',
	'part5_4_daytime_number':' ',
	'part5_5_mobile_number':' ',
	'part5_6_emailaddress':' ',
	'part5_certification':' ',
	'part5_7b_signature':' ',	
	'part6_1a_family_name':' ',
	'part6_1b_given_name':' ',
	'part6_2_organization':' ',
	'part6_3a_street':' ',
	'part6_3b_apt_ste':' ',
	'part6_3c_city':' ',
	'part6_3e_zip':' ',
	'part6_3f_province':' ',
	'part6_3g_postal':' ',
	'part6_3h_country':' ',
	'part6_4_telephone':' ',
	'part6_5_Telephone':' ',
	'part6_6_email':' ',
	'part6_8b_signature':' ',
	'additional_information_3a':' ',
	'additional_information_3b':' ',
	'additional_information_3c':' ',
	'additional_information_3d':' ',
	'additional_information_4a':' ',
	'additional_information_4b':' ',
	'additional_information_4c':' ',
	'additional_information_4d':' ',
	'additional_information_5a':' ',
	'additional_information_5b':' ',
	'additional_information_5c':' ',
	'additional_information_5d':' ',
	'additional_information_6a':' ',
	'additional_information_6b':' ',
	'additional_information_6c':' ',
	'additional_information_6d':' ',
	'additional_information_7a':' ',
	'additional_information_7b':' ',
	'additional_information_7c':' ',
	'additional_information_7d':' '
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
// $pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');