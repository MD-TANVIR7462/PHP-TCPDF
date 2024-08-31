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


$pdf->SetFont('times', 'B', 9.8); // set font
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->MultiCell(25, 14, "Select this box if Form G-28 is attached.", '', 'L', 0, 0, 22, 40.8, true);
$pdf->MultiCell(2, 19.5, "", 'R', 'C', 1, 1, 50, 39.5, true);
$pdf->SetFont('times', '', 10); // set font

$i_130a_g28 = (showData('i_130a_g28_checkbox')=='Y')?'checked':'';
$html = '<input type="checkbox" name="choose_form_g_28" value="1" checked="'.$i_130a_g28.'"/>';
$pdf->writeHTMLCell(5, 5, 16, 41, $html, 0, 1, false, false, 'L', false);

$pdf->SetFont('times', 'B', 9.8); // set font
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
$pdf->TextField('attorney_uscis_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),140, 50.5);

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 61, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 60, false); // angle
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
$pdf->TextField('alien_registration_number', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),60, 107);

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
$pdf->MultiCell(90.5, 6.6, "Your Full Name", 0, 'L', 1, 1, 13, 130, true);


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

$address1_apt= (showData('information_about_you_home_apt_ste_flr')=='apt')?"checked":"";
$address1_ste= (showData('information_about_you_home_apt_ste_flr')=='ste')?"checked":"";
$address1_flr= (showData('information_about_you_home_apt_ste_flr')=='flr')?"checked":"";



$pdf->SetFont('times', '', 10); // set font

$html= '<div><b>4.b. </b>&nbsp; 
<input type="checkbox" name="address1_apt_ste_flr1" value="Apt" checked="'.$address1_apt.'" />Apt. 
<input type="checkbox" name="address1_apt_ste_flr2" value="Ste" checked="'.$address1_ste.'" />Ste.
<input type="checkbox" name="address1_apt_ste_flr3" value="Flr" checked="'.$address1_flr.'" /> Flr.
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

$address2_apt= (showData('information_about_you_home_apt_ste_flr2')=='apt')?"checked":"";
$address2_ste= (showData('information_about_you_home_apt_ste_flr2')=='ste')?"checked":"";
$address2_flr= (showData('information_about_you_home_apt_ste_flr2')=='flr')?"checked":"";

$pdf->SetFont('times', '', 10); // set font

$html= '<div><b>6.b. </b>&nbsp; 
<input type="checkbox" name="address1_apt_ste_flr1" value="Apt" checked="'.$address2_apt.'" />Apt. 
<input type="checkbox" name="address1_apt_ste_flr2" value="Ste" checked="'.$address2_ste.'" />Ste.
<input type="checkbox" name="address1_apt_ste_flr3" value="Flr" checked="'.$address2_flr.'" /> Flr.
</div>';
$pdf->writeHTMLCell(50, 0, 113, 124, $html, '', 0, 0, true, 'L');



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



/* $pdf->SetFont('times', '', 10.5); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apt.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Flr.';
$pdf->writeHTMLCell(50, 0, 112, 221, $html, '', 0, 0, true, 'L'); */

$address8b_apt= (showData('information_about_you_outside_us_apt_ste_flr')=='apt')?"checked":"";
$address8b_ste= (showData('information_about_you_outside_us_apt_ste_flr')=='ste')?"checked":"";
$address8b_flr= (showData('information_about_you_outside_us_apt_ste_flr')=='flr')?"checked":"";

$pdf->SetFont('times', '', 10); // set font

$html= '<div><b>8.b. </b>&nbsp; 
<input type="checkbox" name="address1_apt_ste_flr1" value="Apt" checked="'.$address8b_apt.'" />Apt. 
<input type="checkbox" name="address1_apt_ste_flr2" value="Ste" checked="'.$address8b_ste.'" />Ste.
<input type="checkbox" name="address1_apt_ste_flr3" value="Flr" checked="'.$address8b_flr.'" /> Flr.
</div>';
$pdf->writeHTMLCell(50, 0, 112, 222, $html, '', 0, 0, true, 'L');


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

//......


$pdf->AddPage('P', 'LETTER'); // page number 2


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 1. Information About You</b> (The Spouse<br>Beneficiary)</div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'J', true);
	
//....

$pdf->SetFontSize(10);
$html = '<div><b>9.a. &nbsp; &nbsp;</b>Date From (mm/dd/yyyy)</div>';
$pdf->writeHtmlCell(91, 12, 13, 31, $html, 0, 0, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('outside_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),74, 31);
//.....

$pdf->setFont('times', '', 10);
$html = '<div><b>9.b. &nbsp; &nbsp;</b>Date To (mm/dd/yyyy)</div>';
$pdf->setFont('times', '', 10);	
$pdf->writeHtmlCell(91, 12, 13, 40, $html, 0, 0, false, 'J', true);	
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),74, 40);


//information about parents
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$pdf->MultiCell(90, 6.7, "Information About Parent 1", 0, 'L', 1, 1, 13, 48.5, true);
//.....

$pdf->setFont('Times','',10);
$html= '<div>Full Name of Parent 1</div>';
$pdf->writeHTMLCell(91, 12, 13, 55,$html, 0, 0, false, 'L', true );
//....

$pdf->setFont('times','', 10);
$html= '<div><b>10.a.&nbsp; &nbsp;</b>Family Name <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; (Maiden Name)</div>';
$pdf->writeHTMLCell(91, 12, 13, 60, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_maiden_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),48, 62);
//........
$pdf->setFont('times','', 10);
$html= '<div><b>10.b.&nbsp; &nbsp;</b>Given  Name <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; (First Name)</div>';
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
$html= '<div><b>11.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(60, 12, 13, 89, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),73, 89);
//.......

$parent1_male = (showData('parent1_info_gender')=='male')?'checked':'';
$parent1_female = (showData('parent1_info_gender')=='female')?'checked':'';

$pdf->setFont('times','', 10);
$html= '<div><b>12. </b>&nbsp;&nbsp;&nbsp;&nbsp; Sex &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;

<input type="checkbox" name="parent1_gender" value="Male" checked="'.$parent1_male.'"/> Male &nbsp;&nbsp; 
<input type="checkbox" name="parent1_gender" value="Female" checked="'.$parent1_female.'"/> Female</div>';

$pdf->writeHTMLCell(100, 12, 13, 96, $html,0, 0, false, 'L', true);
//.........

$pdf->setFont('times', '', 10);
$html= '<div><b>13.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; City /Town /Village of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 102, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_city_town_village_of_birth', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 108);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>14.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Country of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 115.5, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_country_of_birth', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 122);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>15.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; City / Town/ Village of Residence</div>';
$pdf->writeHTMLCell(100, 12, 13, 130, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_city_town_village_of_residence', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 137);
//.......

$pdf->setFont('times', '', 10);
$html= '<div><b>16.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Country Of Residence</div>';
$pdf->writeHTMLCell(100, 12, 13, 145, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent1_country_of_residence', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 151);


// Start Information About Parent 2 ...............
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.8); // set font
$pdf->MultiCell(90, 6.4, "Information About Parent 2", 0, 'L', 1, 1, 13, 159.5, true);
//.......

$pdf->setFont('Times','',10);
$html= '<div>Full Name of Parent 2</div>';
$pdf->writeHTMLCell(91, 12, 13, 166.5, $html, 0, 0, false, 'L', true );
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
$html= '<div><b>18.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 12, 13, 202, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_date_of_birth', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),73, 202);
//.......

$parent2_male = (showData('parent2_info_gender')=='male')?'checked':'';
$parent2_female = (showData('parent2_info_gender')=='female')?'checked':'';

$pdf->setFont('times','', 10);
$html= '<div><b>19.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Sex &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; 

<input type="checkbox" name="sex" value="Male" checked="'.$parent2_male.'" />Male &nbsp;&nbsp; 
<input type="checkbox" name="sex" value="Female" checked="'.$parent2_female.'" /> Female</div>';

$pdf->writeHTMLCell(60, 12, 13, 209, $html,0, 0, false, 'L', true);
//.....


$pdf->setFont('times', '', 10);
$html= '<div><b>20.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>City /Town /Village of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 215, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_city_town_village_of_birth', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 221);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Birth</div>';
$pdf->writeHTMLCell(60, 12, 13, 228, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_country_of_birth', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 234);
//.....

$pdf->setFont('times', '', 10);
$html= '<div><b>22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>City / Town/ Village of Residence</div>';
$pdf->writeHTMLCell(100, 12, 13, 241, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_city_town_village_of_residence', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 246);
// //.......


$pdf->setFont('times', '', 10);
$html= '<div><b>23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country of Residence</div>';
$pdf->writeHTMLCell(100, 12, 13, 253, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent2_country_of_residence', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),24, 259);

//end ............ left side .....................






// start right side ...................start right side ...................
// employment history......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$pdf->MultiCell(92, 6.6, "Part 2. Information About Your Employeement ", 1, 'L', 1, 1, 112, 17, true);
//.........

$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div>Provide your Employment history of last five years,  wheather inside or out side of United States. Provide your current emploeement first. If your are currently unemployed, type or print "Unemployed" in <b>Item Number 1</b>. bellow. If you need extra space to complete this section, use the space provided in <b>Part 7. Additional Information.</b></div>';
$pdf->writeHTMLCell(91, 12, 112, 25.5,$html, 0, 1, 0, true, 'L', false, false);
//...........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$pdf->MultiCell(92, 6.2, "Employment History", 0, 'L', 1, 1, 112, 53, true);
//.........

$pdf->setFont('Times','',10);
$html= '<div><b>Employer 1</b></div>';
$pdf->writeHTMLCell(92, 12, 112, 59.6, $html, 0, 0, false, 'L', true );
//...........

$pdf->setFont('times', '', 10.5);
$html= '<div><b>1. &nbsp; </b> &nbsp;Name of Employer/ Company </div>';
$pdf->writeHTMLCell(60, 12, 112, 65, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121, 71);
//............

$pdf->setFont('times', '', 10.5);
$html= '<div><b>2.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 78, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_address', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 79.5);

//.............
$emp1_apt = (showData('employer1_apt_ste_flr')=='apt')?'checked':'';
$emp1_ste = (showData('employer1_apt_ste_flr')=='ste')?'checked':'';
$emp1_flr = (showData('employer1_apt_ste_flr')=='flr')?'checked':'';

$pdf->SetFont('times', '', 10.5); // set font

$html= '<div><b>2.b. </b>
<input type="checkbox" name="employer1_apt_ste_flr1" value="Apt" checked="'.$emp1_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="employer1_apt_ste_flr2" value="Ste" checked="'.$emp1_ste.'" />Ste.
<input type="checkbox" name="employer1_apt_ste_flr3" value="Flr" checked="'.$emp1_flr.'" /> Flr.
</div>';

$pdf->writeHTMLCell(60, 0, 112, 88.5, $html, '', 0, 0, true, 'L');
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
$html= '<div><b>2.d.</b>&nbsp;&nbsp; State</div>';
$pdf->writeHTMLCell(50, 0, 112, 105, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="employer1_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 105, $html, '', 0, 0, true, 'L');
$pdf->SetFont('Times', '', 10.5); // set font
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
$html= '<div><b>2.g.</b> &nbsp;Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 112, 124, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_postal_code', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 124);
//........


$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>2.h.</b> &nbsp;Country </div>';
$pdf->writeHTMLCell(30, 0, 112, 131, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),122, 138);
//.....

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.</b> &nbsp;&nbsp;&nbsp;&nbsp;Your Occupation </div>';
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



$pdf->setFont('times', '', 10.5);
$html= '<div><b>5. &nbsp; </b> &nbsp;Name of Employer/ Company </div>';
$pdf->writeHTMLCell(60, 12, 112, 184, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121, 190);
//............
$pdf->setFont('times', '', 10.5);
$html= '<div><b>6.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 197, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_address', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 199);

//.............
$emp2_apt = (showData('employer2_apt_ste_flr')=='apt')?'checked':'';
$emp2_ste = (showData('employer2_apt_ste_flr')=='ste')?'checked':'';
$emp2_flr = (showData('employer2_apt_ste_flr')=='flr')?'checked':'';
$pdf->SetFont('times', '', 10.5); // set font

$html= '<div><b>6.b. </b>&nbsp;
<input type="checkbox" name="employer2_apt_ste_flr1" value="Apt" checked="'.$emp2_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="employer2_apt_ste_flr2" value="Ste" checked="'.$emp2_ste.'" />Ste.
<input type="checkbox" name="employer2_apt_ste_flr3" value="Flr" checked="'.$emp2_flr.'" /> Flr.
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
$pdf->writeHTMLCell(25, 0, 129.5, 226, $html, '', 0, 0, true, 'L');
$pdf->SetFont('Times', '', 10.5); // set font
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
$html= '<div><b>6.g.</b> &nbsp;Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 112, 243, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_postal_code', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 244);

//........

$pdf->SetFont('times', '', 10.5);
$html= '<div><b>6.h.</b> &nbsp;Country</div>';
$pdf->writeHTMLCell(30, 0, 112, 251, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 258);

//........ end page two ..............end right side.................

//  page number 3................ page 3 start 


//.........continue spouse benifishioary............start left side .........
$pdf->AddPage();//................page number 3

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div><b>Part 2. Information About Your Employement </b> (Continued)</div>';
$pdf->writeHTMLCell(90, 7, 12, 17, $html, 1, 1, true, 'L');

//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Occupation</div>';
$pdf->writeHTMLCell(90, 7, 12, 29, $html,'', 0,0,  true,'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_occupation', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 34.5);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 43, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('employer2_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72, 43);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.b.</b>&nbsp;&nbsp;Date To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 52, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10.5); 
$pdf->TextField('employer2_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 51.5);
//....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div><b>Part 3. Information About Your Employement Outside  the united States</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 1, 1, true, 'L');

//........
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.10);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div>Provide Your last occupation outside the United States if not show above. If you never worked ouitside the United States, provide this information in the space provided in <b>Part 7. Additional Information.</b></div>';
$pdf->writeHTMLCell(91, 12, 12, 75.6,$html, 0, 1, 0, true, 'L', false, false);
//......

$pdf->setFont('times', '', 10);
$html= '<div><b>1. &nbsp;</b>&nbsp; Name of Employer/Company </div>';
$pdf->writeHTMLCell(80, 12, 12, 92, $html,0, 0, false, 'L', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_company_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),20, 97.6);
//............
$pdf->setFont('times', '', 10);
$html= '<div><b>2.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 12, 105, $html,0, 0, false, 'L', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_address', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),47, 106.5);
//.............
$apt2b =  (showData('employer_outside_us_apt_ste_flr')=='apt')?'checked':'';
$ste2b =  (showData('employer_outside_us_apt_ste_flr')=='ste')?'checked':'';
$flr2b =  (showData('employer_outside_us_apt_ste_flr')=='flr')?'checked':'';


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.b. </b>&nbsp;
<input type="checkbox" name="outside_of_ny_apt_ste_flr1" value="Apt" checked="'.$apt2b.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="outside_of_ny_apt_ste_flr2" value="Ste" checked="'.$ste2b.'" />Ste.
<input type="checkbox" name="outside_of_ny_apt_ste_flr3" value="Flr" checked="'.$flr2b.'" /> Flr.
</div>';

$pdf->writeHTMLCell(60, 0, 12, 116, $html, '', 0, 0, true, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_apt_ste_flr_value', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 115);
//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 0, 12, 124, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 123.5);
//............
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.d.</b>&nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="outside_of_ny_state" size="0.5">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('Times', '', 10); // set font
$html= '<div><b>2.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69, 132);
//..........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell(30, 0, 12, 141, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),42, 141);
//...............
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell(50, 0, 12, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),42, 150);
//........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell(30, 0, 12, 157, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 163);
//.....
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3. &nbsp;</b> &nbsp; &nbsp;Your Occupation </div>';
$pdf->writeHTMLCell(60, 0, 12, 170, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21, 176);
//......
$pdf->SetFont('times', '', 10);
$html= '<div><b>4.a.</b> &nbsp;Date From (dd/mm/yyyy) </div>';
$pdf->writeHTMLCell(60, 0, 12, 184, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72, 184.5);
//...........
$pdf->SetFont('times', '', 10);
$html= '<div><b>4.b.</b> &nbsp;Date To (dd/mm/yyyy) </div>';
$pdf->writeHTMLCell(60, 0, 12, 193, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('outside_of_ny_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72, 193);
//.........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 12);
$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 4. Spouse Beneficiary\'s Statement, Contact Information, Certification, and Signature </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 206, $html, 1, 1, true, 'L');
//........
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-130 and Form I-30A Instructions before completing this part. </div>';
$pdf->writeHTMLCell(91, 12, 12, 219,$html, 0, 1, 0, true, 'L', false, false);
//........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.20);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Spouse Beneficiary\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 12, 230, $html, 0, 1, true, 'L');
//........

$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>NOTE: </b> Select the box for either<b> Item Number 1.a.</b> or <b>1.b.</b> If applicable, select the box for <b>Item Number 2.</b> </div>';
$pdf->writeHTMLCell(91, 12, 12, 239, $html, 0, 1, 0, true, 'L', false, false);
//......
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$benificiary1a = (showData('i_130a_spouse_beneficiary_statement_1a_status')=='Y')?'checked':'';
$html= '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="agree1" value="1" checked="'.$benificiary1a.'" /></div>';
$pdf->writeHTMLCell(15, 12, 12, 250, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div> I can read and understand English, and I have read and understand every question and instruction on this form and my answer to every question </div>';
$pdf->writeHTMLCell(80, 12, 25, 250, $html, 0, 1, 0, true, 'L', false, false);

// ........left side end .....page 3 .......right side start..............

$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$benificiary1b = (showData('i_130a_spouse_beneficiary_statement_1b_status')=='Y')?'checked':'';
$html= '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="agree2" value="1" checked="'.$benificiary1b.'" /></div>';
$pdf->writeHTMLCell(93, 12, 112, 17, $html, 0, 1, 0, true, 'L', false, false);
$html = '<div>The interpreter name in <b>Part 5. </b> read to me every question and instruction on this form and my answer to every question in  </div>';
$pdf->writeHTMLCell(78, 12, 127, 17, $html, 0, 1, 0, true, 'L', false, false);


$pdf->writeHTMLCell(78, 12, 203.5, 32, ',', 0, 1, 0, true, 'L', false, false);//for comma ','
$pdf->writeHTMLCell(78, 12, 203.5, 53, ',', 0, 1, 0, true, 'L', false, false);//for comma ','
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M');
// $pdf->writeHTMLCell(76, 7, 128, 30.5, '', 1, 0, false, 'L');//  this is the empty  cell


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_beneficiary_statement_1b', 76, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),128, 30.5);
$pdf->setFont('Times','',10);


$html = '<div>a language in which I am fluent, and I understood everything. </div>';
$pdf->writeHTMLCell(76, 12, 127, 37, $html, 0, 0, false, 'L');
//....
$part3_2 = (showData('i_130a_spouse_beneficiary_statement_2_status')=='Y')?'checked':'';
$html= '<div><b>2.  </b>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="agree3" value="1" checked="'.$part3_2.'"/></div>';
$pdf->writeHTMLCell(30, 12, 112, 47, $html, 0, 1, 0, true, 'L', false, false);
$html = '<div>At my request, the  prepare name in <b>Part 6.,</b> </div>';
$pdf->writeHTMLCell(80, 12, 127, 46, $html, 0, 0, false, 'L');
// $pdf->writeHTMLCell(76, 7, 128, 52, '', 1, 0, false, 'L'); // empty cell....

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_beneficiary_statement_2', 76, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),128, 52);
$pdf->setFont('Times','',10);
$html = '<div>prepare this form for me based only upon information I proved or authorized.</div>';
$pdf->writeHTMLCell(80, 12, 127, 59, $html, 0, 0, false, 'L');
//....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0.5, 1, 0.5, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Spouse Beneficiary\'s Contact Information </div>';
$pdf->writeHTMLCell(92, 7, 112, 70, $html, 0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>3.</b>&nbsp; &nbsp; &nbsp;Spouse Beneficiary\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 112, 78, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_beneficiary_daytime_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 84);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Spouse Beneficiary\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 91, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_beneficiary_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 96.5);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp; &nbsp; Spouse Beneficiary\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 103, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_beneficiary_email', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),120, 109);
//.....
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.15);
$pdf->setCellPaddings(0.5, 1, 0.5, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Spouse Beneficiary\'s Certification </div>';
$pdf->writeHTMLCell(92, 7, 112, 119, $html, 0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 9.7);
$html = '<div>Copies of any documents I have submitted are exact photocopies<br>
of unaltered, original documents, and I understand that USCIS<br>
may require that I submit original documents to USCIS at a later<br>
date. Furthermore, I authorize the release of any information<br>
from any of my records that USCIS may need to determine my<br>
eligibility for the immigration benefit I seek.</div>';
$pdf->writeHTMLCell(100, 7, 112, 127, $html, 0, 0, false, 'L');

$html = '<div>I further authorize release of information contained in this form,<br>
in supporting documents, and in my USCIS records to other<br>
entities and persons where necessary for the administration and<br>
enforcement of U.S. immigration laws.</div>';
$pdf->writeHTMLCell(100, 7, 112, 154, $html, 0, 0, false, 'L');

$html = '<div>I certify, under penalty of perjury, that I provided or authorized<br>
all of the information in this form, I understand all of the<br>
information contained in, and submitted with, my form, and that<br>
all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(100, 7, 112, 172, $html, 0, 0, false, 'L');
//.......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0.5, 1, 0.5, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
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
$pdf->TextField('spouse_beneficiary_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 215);
//.........
$pdf->setFont('times', '', 9.7);
$pdf->setCellHeightRatio(1.20);
$html  = '<div><b>NOTE TO ALL SPOUSE BENEFICIARIES:  </b> If you do not
completely fill out this form or fail to submit required documents
listed in the Instructions, USCIS may deny the Form I-130 filed <br>
on your behalf. </div>';
$pdf->writeHTMLCell(99, 7, 112, 225, $html, 0, 1, false, 'L');

//................end page 3 ......start page 4..........&&&&&&& start right side ............


$pdf->AddPage('P', 'LETTER'); // page number 4

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1.20);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Part 5. Interpreter\'s Contact Information,
Certification, and Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, 'L');
//....
$pdf->setFont('Times', '', 9.7);
$html= '<div>Provide the following information about the interpreter you used
to complete Form I-130A if he or she is different from the
interpreter used to complete the Form I-130 filed on your behalf.</div>';
$pdf->writeHTMLCell(94, 10, 12, 30, $html, 0, 1, false, 'L');
//......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 46, $html, 0, 1, true, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b> &nbsp; &nbsp;Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 53, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 59);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b> &nbsp; &nbsp;Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 66, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_given_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),22, 72);
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
$pdf->SetFontSize(12); // set font
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

$interpreter_apt = (showData('i_130a_interpreter_address_apt_ste_flr')=='apt')?'checked':'';
$interpreter_ste = (showData('i_130a_interpreter_address_apt_ste_flr')=='ste')?'checked':'';
$interpreter_flr = (showData('i_130a_interpreter_address_apt_ste_flr')=='flr')?'checked':'';

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.b.</b>&nbsp;&nbsp;
<input type="checkbox" name="Apt5" value="Apt" checked="'.$interpreter_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste5" value="Ste" checked="'.$interpreter_ste.'" />Ste. 
<input type="checkbox" name="Flr5" value="Flr" checked="'.$interpreter_flr.'" /> Flr.</div>';
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

$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="interpreter_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('Times', '', 10.5); // set font
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
$pdf->SetFontSize(12); // set font
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
$pdf->SetFontSize(12); // set font
$html= '<div>Interpreter\'s Certification </div>';
$pdf->writeHTMLCell(91, 7, 112, 17, $html, 0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 9.5);
$html='<div>I certify, under penalty of perjury, that: </div>';
$pdf->writeHTMLCell(92, 7, 111, 25, $html, 0, 1, false, 'L');
$html='<div>I am fluent in English and</div>';
$pdf->writeHTMLCell(40, 7, 112, 31, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_certification', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),152, 31);
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(78, 12, 203, 32.5, ',', 0, 1, 0, true, 'L', false, false);//for comma ','
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html='<div>which is the same language provided in <b> Part 4., Item Number 1.b., </b> and I have to read spouse beneficiary in the identified language every question and instruction on this form and his or her answer to every question.The spouse beneficiery informed me that he or she understands every instruction,question, and answer on the form,including the <b>Spouse beneficiary\'s Certification, </b> and has verified the accurecy of every answer.</div>';
$pdf->writeHTMLCell(97, 10, 111, 37, $html, 0, 1, false, 'L');
//.........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Interpreter\'s Signature </div>';
$pdf->writeHTMLCell(91, 7, 113, 72, $html, 0, 1, true, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Interpreter\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 112, 80, $html, 0, 1, false, 'L');
//.......
$pdf->writeHTMLCell(82, 7, 122, 86, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 96, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_7b_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 95.5);
//........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(12); // set font
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
$pdf->SetFontSize(12); // set font
$html= '<div>preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 7, 113, 189, $html, 0, 1, true, 'L');
//.......


$pdf->setFont('times', '', 11);
$html= '<div><b>3.a. &nbsp;</b>Street Number <br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(60, 12, 112, 196, $html,0, 0, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),149, 199);

//.............
$preparer_apt =  (showData('i_130a_preparer_address_apt_ste_flr')=='apt')?'checked':'';
$preparer_ste =  (showData('i_130a_preparer_address_apt_ste_flr')=='ste')?'checked':'';
$preparer_flr =  (showData('i_130a_preparer_address_apt_ste_flr')=='flr')?'checked':'';

$pdf->SetFont('times', '', 10.5); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="Apt6" value="Apt" checked="'.$preparer_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste6" value="Ste" checked="'.$preparer_ste.'" />Ste. 
<input type="checkbox" name="Flr6" value="Flr" checked="'.$preparer_flr.'" /> Flr.</div>';

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

$pdf->setCellHeightRatio(1.25);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 224.5, $html, '', 0, 0, true, 'L');


$pdf->SetFont('Times', '', 10.5); // set font
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
$preparer7a = (showData('i_130a_preparer_statement_7a_status')=='Y')?'checked':'';
$html= '<div><b>7.a.  </b> &nbsp; <input type="checkbox" name="agree" value="1" checked="'.$preparer7a.'" /></div>';
$pdf->writeHTMLCell(15, 12, 12, 96, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div>I am not an attorney or accredited representative but
have prepared this form on behalf of the spouse
beneficiary and with the spouse beneficiary\'s consent. </div>';
$pdf->writeHTMLCell(83, 12, 25, 96, $html, 0, 1, 0, true, 'L', false, false);
//..........


$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.04); // reset font spacing


$preparer7b = (showData('i_130a_preparer_statement_7b_status')=='Y')?'checked':'';
$extend = (showData('i_130a_preparer_statement_7b_extend')=='Y')?'checked':'';
$not_extend = (showData('i_130a_preparer_statement_7b_not_extend')=='Y')?'checked':'';


$html= '<div><b>7.b.  </b> &nbsp; <input type="checkbox" name="agree7b" value="1" checked="'.$preparer7b.'" /></div>';

$pdf->writeHTMLCell(15, 12, 12, 111, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div>I am an attorney or accredited representative and my
representation of the spouse beneficiary in this  case <br>
<input type="checkbox" name="extend" value="1" checked="'.$extend.'" /> &nbsp; &nbsp;  extends &nbsp; <input type="checkbox" name="not_extend" value="1" checked="'.$not_extend.'" /> &nbsp; does not extend beyond the  preparation <>of this form.</div>';
$pdf->writeHTMLCell(83, 12, 25, 111, $html, 0, 1, 0, true, 'L', false, false);

$pdf->SetLineStyle(array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
/* 
$pdf->writeHTMLCell(4, 4, 26, 120, '', 1, 1, 0, true, 'L', false, false);
$pdf->writeHTMLCell(4, 4, 43, 120, '', 1, 1, 0, true, 'L', false, false); */
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
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 61, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_130a_additional_info_last_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 63);
// $pdf->writeHTMLCell(60, 7, 45, 63, '', 1, 0, false, 'L');

//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 71, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_130a_additional_info_first_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 72);
// $pdf->writeHTMLCell(60, 7, 45, 73, '', 1, 0, false, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 81, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_130a_additional_info_middle_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 81);
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 91, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(45, 7, 60, 91, '', 1, 0, false, 'L');

$pdf->StartTransform();
$pdf->Rotate(-31);
$pdf->SetFont('zapfdingbats', '', 10);  // symbol font
$pdf->writeHTMLCell(40, 7, 40, 74, TCPDF_FONTS::unichr(116), 0, 0, false, 'L');
$pdf->StopTransform();



$pdf->setFont('Times', '', 12);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(7, 7, 53, 90.5, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_130a_additional_info_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 91);
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
// $pdf->setCellHeightRatio(2.5);
// $pdf->TextField('i_912_additional_info_6d', 85, 63, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v'=>showData('')), 20, 117.7);
// $pdf->setCellHeightRatio(1.25);


$pdf->writeHTMLCell( 85, 1, 20, 115, '',  "B",  0, false, false, 'C', true );// line1 3d
$pdf->writeHTMLCell( 85, 1, 20, 120, '',  "B",  0, false, false, 'C', true );// line2 3d
$pdf->writeHTMLCell( 85, 1, 20, 125, '',  "B",  0, false, false, 'C', true );// line3 3d
$pdf->writeHTMLCell( 85, 1, 20, 130, '',  "B",  0, false, false, 'C', true );// line4 3d
$pdf->writeHTMLCell( 85, 1, 20, 135, '',  "B",  0, false, false, 'C', true );// line5 3d
$pdf->writeHTMLCell( 85, 1, 20, 140, '',  "B",  0, false, false, 'C', true );// line6 3d
$pdf->writeHTMLCell( 85, 1, 20, 145, '',  "B",  0, false, false, 'C', true );// line7 3d
$pdf->writeHTMLCell( 85, 1, 20, 150, '',  "B",  0, false, false, 'C', true );// line8 3d
$pdf->writeHTMLCell( 85, 1, 20, 155, '',  "B",  0, false, false, 'C', true );// line9 3d
$pdf->setCellHeightRatio( 1.9);
$pdf->TextField('additional_information_3d', 85, 63, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_130a_additional_info_3d')), 20, 117.7);
$pdf->setCellHeightRatio( 1.2 );
// $html = <<<EOD
// <textarea cols="20" rows="15" name="additional_information_3d">

// </textarea>
// EOD;
// $pdf->writeHTMLCell(90, 70, 20, 116, $html, 0, 0, false, 'L');




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

// $html = <<<EOD
// <textarea cols="20" rows="15" name="additional_information_4d">

// </textarea>
// EOD;
// $pdf->writeHTMLCell(90, 70, 20, 197, $html, 0, 0, false, 'L');

$pdf->writeHTMLCell( 85, 1, 20, 196, '',  "B",  0, false, false, 'C', true );// line1 4d
$pdf->writeHTMLCell( 85, 1, 20, 201, '',  "B",  0, false, false, 'C', true );// line2 4d
$pdf->writeHTMLCell( 85, 1, 20, 205, '',  "B",  0, false, false, 'C', true );// line3 4d
$pdf->writeHTMLCell( 85, 1, 20, 210, '',  "B",  0, false, false, 'C', true );// line4 4d
$pdf->writeHTMLCell( 85, 1, 20, 215, '',  "B",  0, false, false, 'C', true );// line5 4d
$pdf->writeHTMLCell( 85, 1, 20, 220, '',  "B",  0, false, false, 'C', true );// line6 4d
$pdf->writeHTMLCell( 85, 1, 20, 225, '',  "B",  0, false, false, 'C', true );// line7 4d
$pdf->writeHTMLCell( 85, 1, 20, 230, '',  "B",  0, false, false, 'C', true );// line8 4d
$pdf->writeHTMLCell( 85, 1, 20, 235, '',  "B",  0, false, false, 'C', true );// line9 4d
$pdf->setCellHeightRatio( 1.9);

$pdf->TextField('additional_information_4d', 85, 63, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_130a_additional_info_4d')), 20, 198,);
$pdf->setCellHeightRatio( 1.2 );


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

// $html = <<<EOD
// <textarea cols="20" rows="15" name="additional_information_5d">

// </textarea>
// EOD;
// $pdf->writeHTMLCell(90, 70, 119, 32, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell( 85, 1, 119, 31, '',  "B",  0, false, false, 'C', true );// line1 5d
$pdf->writeHTMLCell( 85, 1, 119, 36, '',  "B",  0, false, false, 'C', true );// line2 5d
$pdf->writeHTMLCell( 85, 1, 119, 41, '',  "B",  0, false, false, 'C', true );// line3 5d
$pdf->writeHTMLCell( 85, 1, 119, 46, '',  "B",  0, false, false, 'C', true );// line4 5d
$pdf->writeHTMLCell( 85, 1, 119, 51, '',  "B",  0, false, false, 'C', true );// line5 5d
$pdf->writeHTMLCell( 85, 1, 119, 56, '',  "B",  0, false, false, 'C', true );// line6 5d
$pdf->writeHTMLCell( 85, 1, 119, 61, '',  "B",  0, false, false, 'C', true );// line7 5d
$pdf->writeHTMLCell( 85, 1, 119, 66, '',  "B",  0, false, false, 'C', true );// line8 5d
$pdf->writeHTMLCell( 85, 1, 119, 71, '',  "B",  0, false, false, 'C', true );// line9 5d
$pdf->setCellHeightRatio( 1.9);
$pdf->TextField('additional_information_5d', 85, 63, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_130a_additional_info_5d')),119, 34,);
$pdf->setCellHeightRatio( 1.2 );
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

// $html = <<<EOD
// <textarea cols="20" rows="15" name="additional_information_6d">

// </textarea>
// EOD;
// $pdf->writeHTMLCell(90, 70, 119, 114, $html, 0, 0, false, 'L');

$pdf->writeHTMLCell( 85, 1, 119, 113, '',  "B",  0, false, false, 'C', true );// line1 6d
$pdf->writeHTMLCell( 85, 1, 119, 118, '',  "B",  0, false, false, 'C', true );// line2 6d
$pdf->writeHTMLCell( 85, 1, 119, 122, '',  "B",  0, false, false, 'C', true );// line3 6d
$pdf->writeHTMLCell( 85, 1, 119, 127, '',  "B",  0, false, false, 'C', true );// line4 6d
$pdf->writeHTMLCell( 85, 1, 119, 132, '',  "B",  0, false, false, 'C', true );// line5 6d
$pdf->writeHTMLCell( 85, 1, 119, 137, '',  "B",  0, false, false, 'C', true );// line6 6d
$pdf->writeHTMLCell( 85, 1, 119, 142, '',  "B",  0, false, false, 'C', true );// line7 6d
$pdf->writeHTMLCell( 85, 1, 119, 147, '',  "B",  0, false, false, 'C', true );// line8 6d
$pdf->writeHTMLCell( 85, 1, 119, 152, '',  "B",  0, false, false, 'C', true );// line9 6d
$pdf->setCellHeightRatio( 1.9 );
$pdf->TextField('additional_information_6d', 85, 63, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_130a_additional_info_6d')),119, 115.5);
$pdf->setCellHeightRatio( 1.2 );
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

// $html = <<<EOD
// <textarea cols="20" rows="15" name="additional_information_7d">

// </textarea>
// EOD;
// $pdf->writeHTMLCell(90, 70, 119, 198, $html, 0, 0, false, 'L');

$pdf->writeHTMLCell( 85, 1, 119, 196, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 200, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 205, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 210, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 214, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 220, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 224, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 228, '',  "B",  0, false, false, 'C', true );// line 7d
$pdf->writeHTMLCell( 85, 1, 119, 234, '',  "B",  0, false, false, 'C', true );// line 7d
//$pdf->setCellHeightRatio(0);

$pdf->setCellHeightRatio( 1.9);
$pdf->TextField('additional_information_7d', 85, 63, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_130a_additional_info_7d')),119, 198);
$pdf->setCellHeightRatio( 1.2 );



// java script 

// ".showData('')."

$js = "
var fields = {
	
	// Page 1
	'volag_number':' $attorneyData->volag_number',
	'attorney_state_bar_number':'  $attorneyData->bar_number',
	'attorney_uscis_online_account_number':' $attorneyData->uscis_online_account_number',
	'alien_registration_number':' ".showData('other_information_about_you_alien_registration_number')."',
	'uscis_online_account_number':' ".showData('other_information_about_you_uscis_online_account_number')."',
	'first_name':' ".showData('information_about_you_given_first_name')."',
	'last_name':' ".showData('information_about_you_family_last_name')."',
	'middle_name':' ".showData('information_about_you_middle_name')."',
	

	'address1_name':' ".showData('information_about_you_home_street_number')."',
	'address1_apt_ste_flr_value':' ".showData('information_about_you_home_apt_ste_flr_value')."',
	'address1_city_or_town':' ".showData('information_about_you_home_city_town')."',
	'address1_state':' ".showData('information_about_you_home_state')."',
	'address1_zip_code':' ".showData('information_about_you_home_zip_code')."',
	'address1_province':' ".showData('information_about_you_home_province')."',
	'address1_postal_code':' ".showData('information_about_you_home_postal_code')."',
	'address1_country_name':' ".showData('information_about_you_home_country')."',
	'address1_date_from':' ".showData('information_about_you_home_residence_from_date')."',
	'address1_date_to':' ".showData('information_about_you_home_residence_to_date')."',
	
	'address2_name':' ".showData('information_about_you_home_street_number2')."',
	'address2_apt_ste_flr_value':' ".showData('information_about_you_home_apt_ste_flr_value2')."',
	'address2_city_or_town':' ".showData('information_about_you_home_city_town2')."',
	'address2_state':' ".showData('information_about_you_home_state2')."',
	'address2_zip_code':' ".showData('information_about_you_home_zip_code2')."',
	'address2_province':' ".showData('information_about_you_home_province2')."',
	'address2_postal_code':' ".showData('information_about_you_home_postal_code2')."',
	'address2_country_name':' ".showData('information_about_you_home_country2')."',
	'address2_date_from':' ".showData('information_about_you_home_residence_from_date2')."',
	'address2_date_to':' ".showData('information_about_you_home_residence_to_date2')."',	

	'outside_address_name':' ".showData('information_about_you_outside_us_street_number')."',
	'outside_apt_ste_flr_value':' ".showData('information_about_you_outside_us_apt_ste_flr_value')."',
	'outside_city_or_town':' ".showData('information_about_you_outside_us_city_town')."',
	'outside_province':' ".showData('information_about_you_outside_us_province')."',
	'outside_postalcode':' ".showData('information_about_you_outside_us_postal_code')."',
	'outside_country_name':' ".showData('information_about_you_outside_us_country')."',
	
	// Page 2
	
	'outside_date_from':' ".showData('information_about_you_outside_us_residence_from_date')."',
	'outside_date_to':' ".showData('information_about_you_outside_us_residence_to_date')."',

	'parent1_maiden_name':' ".showData('parent1_info_family_last_name')."',
	'parent1_first_name':' ".showData('parent1_info_given_first_name')."',
	'parent1_middle_name':' ".showData('parent1_info_middle_name')."',
	'parent1_date_of_birth':' ".showData('parent1_info_date_of_birth')."',
	'parent1_city_town_village_of_birth':' ".showData('parent1_info_city_of_birth')."',
    'parent1_country_of_birth':' ".showData('parent1_info_country_of_birth')."',
	'parent1_city_town_village_of_residence':' ".showData('parent1_info_current_city_of_residence')."',
	'parent1_country_of_residence':' ".showData('parent1_info_current_country_of_residence')."',

	
	'parent2_family_last_name':' ".showData('parent2_info_family_last_name')."',
	'parent2_last_name':' ".showData('parent2_info_given_first_name')."',
	'parent2_middle_name':' ".showData('parent2_info_middle_name')."',
	'parent2_date_of_birth':' ".showData('parent2_info_date_of_birth')."',
	'parent2_city_town_village_of_birth':' ".showData('parent2_info_city_of_birth')."',
	'parent2_country_of_birth':' ".showData('parent2_info_country_of_birth')."',
	'parent2_city_town_village_of_residence':' ".showData('parent2_info_current_city_of_residence')."',
	'parent2_country_of_residence':' ".showData('parent2_info_current_country_of_residence')."',

	'employer1_name':' ".showData('employer1_name')."',
	'employer1_address':' ".showData('employer1_address')."',
	'employer1_city_or_town':' ".showData('employer1_city_town')."',
	'employer1_apt_ste_flr_value':' ".showData('employer1_apt_ste_flr_value')."',
	'employer1_state':' ".showData('employer1_state')."',
	'employer1_zip_code':' ".showData('employer1_zip_code')."',
	'employer1_province':' ".showData('employer1_province')."',
	'employer1_postal_code':' ".showData('employer1_postal_code')."',
	'employer1_country':' ".showData('employer1_country')."',
	'employer1_occupation':' ".showData('employer1_occupation')."',
	'employer1_date_from':' ".showData('employer1_from_date')."',
	'employer1_date_to':' ".showData('employer1_to_date')."',

	'employer2_name':' ".showData('employer2_name')."',
	'employer2_address':' ".showData('employer2_address')."',
	'employer2_city_or_town':' ".showData('employer2_city_town')."',
	'employer2_apt_ste_flr_value':' ".showData('employer2_apt_ste_flr_value')."',
	'employer2_state':' ".showData('employer2_state')."',
	'employer2_zip_code':' ".showData('employer2_zip_code')."',
	'employer2_province':' ".showData('employer2_province')."',
	'employer2_postal_code':' ".showData('employer2_postal_code')."',
	'employer2_country':' ".showData('employer2_country')."',
	
	// Page 3
	
	'employer2_occupation':' ".showData('employer2_occupation')."',
	'employer2_date_from':' ".showData('employer2_from_date')."',
	'employer2_date_to':' ".showData('employer2_to_date')."',

	'outside_of_ny_company_name':' ".showData('employer_outside_us_name')."',
	'outside_of_ny_address':' ".showData('employer_outside_us_street_number')."',
	'outside_of_ny_apt_ste_flr_value':' ".showData('employer_outside_us_apt_ste_flr_value')."',
	'outside_of_ny_city_or_town':' ".showData('employer_outside_us_city_town')."',
	'outside_of_ny_state':' ".showData('employer_outside_us_state')."',
	'outside_of_ny_zip_code':' ".showData('employer_outside_us_zip_code')."',
	'outside_of_ny_province':' ".showData('employer_outside_us_province')."',
	'outside_of_ny_postal_code':' ".showData('employer_outside_us_postal_code')."',
	'outside_of_ny_country':' ".showData('employer_outside_us_country')."',
	'outside_of_ny_occupation':' ".showData('employer_outside_us_occupation')."',
	'outside_of_ny_date_from':' ".showData('employer_outside_us_from_date')."',
	'outside_of_ny_date_to':' ".showData('employer_outside_us_to_date')."',

	'spouse_beneficiary_statement_1b':' ".showData('i_130a_spouse_beneficiary_statement_1b_text_value')."',
	'spouse_beneficiary_statement_2':' ".showData('i_130a_spouse_beneficiary_statement_2_text_value')."',

	'spouse_beneficiary_daytime_telephone':' ".showData('current_spouse_daytime_tel')."',
	'spouse_beneficiary_telephone':' ".showData('current_spouse_mobile')."',
	'spouse_beneficiary_email':' ".showData('current_spouse_email')."',
	'spouse_beneficiary_signature_date':' ".showData('i_130a_spouse_beneficiary_sign_date')."',

	'interpreter_family_name':' ".showData('i_130a_interpreter_family_last_name')."',
	'interpreter_given_name':' ".showData('i_130a_interpreter_family_first_name')."',
	'part5_2_organization':' ".showData('i_130a_interpreter_business_name')."',
	'part5_3a_street_number':' ".showData('i_130a_interpreter_address_street_number')."',
	'part5_3b_apt_ste':' ".showData('i_130a_interpreter_address_apt_ste_flr_value')."',
	'part5_3c_city_town':' ".showData('i_130a_interpreter_address_city_town')."',
	'interpreter_state':' ".showData('i_130a_interpreter_address_state')."',
	'part5_3e_zipcode':' ".showData('i_130a_interpreter_address_zip_code')."',
	'part5_3f_province':' ".showData('i_130a_interpreter_address_province')."',
	'part5_3g_postal_code':' ".showData('i_130a_interpreter_address_postal_code')."',
	'part5_3h_country':' ".showData('i_130a_interpreter_address_country')."',

	'part5_4_daytime_number':' ".showData('i_130a_interpreter_daytime_tel')."',
	'part5_5_mobile_number':' ".showData('i_130a_interpreter_mobile')."',
	'part5_6_emailaddress':' ".showData('i_130a_interpreter_email')."',
	'part5_certification':' ".showData('i_130a_interpreter_certification')."',
	'part5_7b_signature_date':' ".showData('i_130a_interpreter_sign_date')."',

	'part6_1a_family_name':' ".showData('i_130a_preparer_family_last_name')."',
	'part6_1b_given_name':' ".showData('i_130a_preparer_family_first_name')."',
	'part6_2_organization':' ".showData('i_130a_preparer_business_name')."',
	'part6_3a_street':' ".showData('i_130a_preparer_address_street_number')."',
	'part6_3b_apt_ste':' ".showData('i_130a_preparer_address_apt_ste_flr_value')."',
	'part6_3c_city':' ".showData('i_130a_preparer_address_city_town')."',
	'preparer_state':' ".showData('i_130a_preparer_address_state')."',
	'part6_3e_zip':' ".showData('i_130a_preparer_address_zip_code')."',
	'part6_3f_province':' ".showData('i_130a_preparer_address_province')."',
	'part6_3g_postal':' ".showData('i_130a_preparer_address_postal_code')."',
	'part6_3h_country':' ".showData('i_130a_preparer_address_country')."',
	
	// Page 5
	
	'part6_4_telephone':' ".showData('i_130a_preparer_daytime_tel')."',
	'part6_5_Telephone':' ".showData('i_130a_preparer_mobile')."',
	'part6_6_email':' ".showData('i_130a_preparer_email')."',
	'part6_8b_signature':' ".showData('i_130a_preparer_sign_date')."',

	// Page 6
	
	'i_130a_additional_info_last_name':' ".showData('i_130a_additional_info_last_name')."',
	'i_130a_additional_info_first_name':' ".showData('i_130a_additional_info_first_name')."',
	'i_130a_additional_info_middle_name':' ".showData('i_130a_additional_info_middle_name')."',
	'i_130a_additional_info_a_number':' ".showData('i_130a_additional_info_a_number')."',

	'additional_information_3a':' ".showData('i_130a_additional_info_3a_page_no')."',
	'additional_information_3b':' ".showData('i_130a_additional_info_3b_part_no')."',
	'additional_information_3c':' ".showData('i_130a_additional_info_3c_item_no')."',
	

	'additional_information_4a':' ".showData('i_130a_additional_info_4a_page_no')."',
	'additional_information_4b':' ".showData('i_130a_additional_info_4b_part_no')."',
	'additional_information_4c':' ".showData('i_130a_additional_info_4c_item_no')."',
	

	'additional_information_5a':' ".showData('i_130a_additional_info_5a_page_no')."',
	'additional_information_5b':' ".showData('i_130a_additional_info_5b_part_no')."',
	'additional_information_5c':' ".showData('i_130a_additional_info_5c_item_no')."',
	

	'additional_information_6a':' ".showData('i_130a_additional_info_6a_page_no')."',
	'additional_information_6b':' ".showData('i_130a_additional_info_6b_part_no')."',
	'additional_information_6c':' ".showData('i_130a_additional_info_6c_item_no')."',
	

	'additional_information_7a':' ".showData('i_130a_additional_info_7a_page_no')."',
	'additional_information_7b':' ".showData('i_130a_additional_info_7b_part_no')."',
	'additional_information_7c':' ".showData('i_130a_additional_info_7c_item_no')."',
	
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