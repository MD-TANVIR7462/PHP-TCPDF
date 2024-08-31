<?php
require_once('formheader.php');

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
// Extend the TCPDF class to create custom Header and Footer
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
		$this->SetY(-16);

		$header_top_border = array(
			'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(190, 3, '', $header_top_border, 1, 1);

		// Set font
		$this->SetFont('times', '', 9);

		$this->Cell(40, 6, "Form N-400   Edition   04/01/24 ", 0, 0, 'L');
		//if ($this->page == 1){
		// $barcode_image = "images/n-400-footer-pdf417-$this->page.jpg";
		$barcode_image = "images/n400/n-400-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 269, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		// $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		if($this->page <= 9){
			$this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 156.5, 267.5, true);
		} else {
			$this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 155, 267.5, true);
		}
		
	}
}


$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form n_400');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(13.7, 15.3, 12.8, true);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage('P', 'LETTER');

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
$pdf->Image($logo, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(80, 15, "Application for Naturalization", 0, 'C', 0, 1, 67, 8, true);
$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm N-400", 0, 'C', 0, 1, 174.5, 6, true);
$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);
$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);
$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0052\nExpires 02/28/2027", 0, 'C', 0, 1, 169, 18.5, true);
$pdf->Ln(1.3);
$top_border = array(
	'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255); // set filling color
$pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');
// set filling color
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->MultiCell(13, 26, "For\nUSCIS\nUse\nOnly", 'LTB', 'C', 1, 1, 12.8, 32.5, true);
$pdf->SetFont('times', 'B', 9); // set font
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(35, 26, "Date Stamp", 'LTB', 'C', 1, 1, 25.7, 32.5, true);
$pdf->MultiCell(74, 26, "Receipt", 'LTB', 'C', 1, 1, 59.7, 32.5, true);
$pdf->MultiCell(69, 26, "Action Block", 'LTB', 'C', 1, 1, 133, 32.5, true);
$pdf->MultiCell(3, 26, "", 'TRB', 'C', 1, 1, 200, 32.5, true);
$pdf->setCellPaddings(1, 0, 0, 0); // set cell padding
$pdf->MultiCell(190.25, 10, "Remarks", 'LRB', 'L', 1, 1, 12.75, 58.7, true);
$pdf->Ln(1.5);
//...........
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$pdf->Image('images/right_angle.jpg', 12.3, 70.4, 3.3, 3.3);
$html = '<div ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;START HERE - Type or print in black ink.</b> If you do not answer all of the questions, it may take longer for U.S. Citizenship
and Immigration Services (USCIS) to process your Form N-400.</div>';
$pdf->writeHTMLCell(190, 5, 13, 70, $html, 0, 0, false, true, 'L', 0);
//...........
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$html = '<div >If your parent (including legal adoptive parent) is a U.S. citizen by birth, or was naturalized before you reached your 18th birthday,
you may not need to file Form N-400 as you may already be a U.S. citizen. Before you file this application, please visit the USCIS
website at <a href="https://www.uscis.gov/n-600"><b>www.uscis.gov/N-600</b></a> for Form N-600, Application for Certificate of Citizenship.</div>';
$pdf->writeHTMLCell(190, 5, 12.4, 82, $html, 0, 0, false, true, 'L', 0);
//..........
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 10); // set font
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 1, 1.7); // set cell padding
$pdf->SetFontSize(11.8); // set font
$html = '<div><b>Part 1.&nbsp;&nbsp;Information About Your Eligibility</b> (Select only one box to identify<br>
the basis of your eligibility or your Form N-400 may be delayed or rejected.)</div>';
$pdf->writeHTMLCell(133.5, 0, 12.4, 97, $html, 1, 1, true, false, 'J', true);
//........
$pdf->setCellHeightRatio(1.3);
$pdf->SetFont('times', 'B', 10.2); // set font
$pdf->MultiCell(80, 15, "Enter Your 9 Digit A-Number:", 0, 'C', 0, 1, 132, 96, true);
$pdf->MultiCell(80, 15, "A-", 0, 'C', 0, 1, 116.7, 101.2, true);
$pdf->Image('images/right_angle.jpg', 149, 103.4, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('9_digit_a_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 160, 101.3);
//.......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reason for Filing (Please see Instructions for eligibility requirements under each provision.):';
$pdf->writeHTMLCell(190, 0, 12.4, 110, $html, 0, 0, false, false, 'L', true);
//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>A</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>General Provision</b>. See Instructions: <b>List of General Eligibility Requirements</b>';
$pdf->writeHTMLCell(190, 6, 20.5, 116, $html, 0, 1, false, false, 'L', true);
//..............
$html = '<b>B</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Spouse of U.S. Citizen</b>. See Instructions: <b><i>Eligibility Based on Marriage to a U.S. Citizen</i></b>';
$pdf->writeHTMLCell(190, 6, 20.5, 123, $html, 0, 1, false, false, 'L', true);
//..........
$html = '<b>C</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>VAWA</b>. See Instructions: <b><i>Eligibility for the Spouse, Former Spouse, or Child of a U.S. Citizen under the Violence<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Against Women Act (VAWA)</i></b>';
$pdf->writeHTMLCell(190, 6, 20.5, 130, $html, 0, 1, false, false, 'L', true);
//.............
$html = '<b>D</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Spouse of U.S. Citizen in Qualified Employment Outside the United States.</b> See Instructions: <i>Eligibility for the<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Spouse of a U.S. Citizen Working for a Qualified Employer Outside the United States</i></b>';
$pdf->writeHTMLCell(190, 6, 20.5, 141, $html, 0, 1, false, false, 'L', true);
//.........
$html = '<div >If your residential address is outside the United States and you are filing under Immigration and Nationality Act<br>
(INA) section 319(b), select the USCIS field office where you would like to have your naturalization interview. You<br>
can find a USCIS field office at <a href="https://www.uscis.gov/about-us/find-a-uscis-office/field-offices"><b>www.uscis.gov/field-offices</b></a>.</div>';
$pdf->writeHTMLCell(190, 5, 34.6, 153, $html, 0, 0, false, true, 'L', 0);
$pdf->ComboBox('p1_d_combobox', 167.6, 7, array(), array(), array(), 35.5, 167);
//.............
$html = '<b>E</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Military Service During Period of Hostilities</b>. See Instructions:<b><i> Eligibility and Evidence for Current and Former</i></b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i>Members of the U.S. Armed Forces</i></b>';
$pdf->writeHTMLCell(190, 6, 20.5, 175, $html, 0, 1, false, false, 'L', true);
//..........
$html = '<b>F</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>At Least One Year of Honorable Military Service at Any Time</b>. See Instructions: <b><i>Eligibility and Evidence for</i></b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i>Current and Former Members of the U.S. Armed Forces</i></b>';
$pdf->writeHTMLCell(190, 6, 20.5, 185, $html, 0, 1, false, false, 'L', true);
//..........
$html = '<b>G</b>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Other Reason for Filing Not Listed Above</b>';
$pdf->writeHTMLCell(190, 6, 20.5, 196, $html, 0, 1, false, false, 'L', true);
// $pdf->writeHTMLCell(100, 6.6, 103, 196, '', 1, 1, false, false, 'L', false);
$pdf->TextField('other_explain_g', 100, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 103, 196,);

//..........
$pdf->SetFont('times', '', 14); // set font
$pdf->writeHTMLCell(6, 6, 28, 115.6, '<input type="checkbox" name="a_lawful_permanent_resident_a" value="Y" />', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(6, 6, 28, 122.6, '<input type="checkbox" name="a_lawful_permanent_resident_b" value="Y" />', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(6, 6, 28, 129.6, '<input type="checkbox" name="a_lawful_permanent_resident_c" value="Y" />', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(6, 6, 28, 140,   '<input type="checkbox" name="a_lawful_permanent_resident_d" value="Y" />', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(6, 6, 28, 174.6, '<input type="checkbox" name="a_lawful_permanent_resident_e" value="Y" />', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(6, 6, 28, 184.6, '<input type="checkbox" name="a_lawful_permanent_resident_f" value="Y" />', 0, 1, false, false, 'L', true);
$pdf->writeHTMLCell(6, 6, 28, 195.6, '<input type="checkbox" name="a_lawful_permanent_resident_g" value="Y" />', 0, 1, false, false, 'L', true);
//..........
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.8); // set font
$html = '<div><b>Part 2. Information About You</b> (Person applying for naturalization)</div>';
$pdf->writeHTMLCell(190.5, 6.7, 12.4, 209, $html, 1, 1, true, false, 'L', true);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b> &nbsp;&nbsp;&nbsp;Your Current Legal Name (<b>do not</b> provide a nickname)';
$pdf->writeHTMLCell(190, 6, 11, 216, $html, 0, 0, false, false, 'L', true);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 17.5, 220, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 93, 219, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 217.8, $html, 0, 0, false, false, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('legal_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 226);
$pdf->TextField('legal_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 226);
$pdf->TextField('legal_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 226);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp;Other Names You Have Used Since Birth (see the Instructions for this <b>Item Number</b> for more information about which names<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;to include)';
$pdf->writeHTMLCell(0, 0, '11', 233.5, $html, 0, 0, false, false, 'L', true);
//...........

$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 17, 240, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 93, 239, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 237.8, $html, 0, 0, false, false, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_name_last_name1', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 248.8);
$pdf->TextField('other_name_first_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 248.8);
$pdf->TextField('other_name_middle_name1', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 248.8);
$pdf->TextField('other_name_last_name2', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18.2, 255.5);
$pdf->TextField('other_name_first_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 255.5);
$pdf->TextField('other_name_middle_name2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 255.5);
/********************************
 ******** End Page No 1 *********
 sd******************************/

/********************************
 ******** Start Page No 2 *******
 ********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 10);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFontSize(11.8);
$html = '<div><b>Part 2.&nbsp;&nbsp;Information About You</b> (Person applying for naturalization) (continued)</div>';
$pdf->writeHTMLCell(141, 6.5, 13, 19.5, $html, 1, 1, true, false, 'J', true);
//...........
$pdf->Image('images/right_angle.jpg', 20, 71, 3.3, 3.3);
$pdf->Image('images/right_angle.jpg', 100, 226, 3.3, 3.3);
//........
$pdf->setCellPaddings(1, 0.4, 0.4, 1);
$pdf->SetFont('times', 'B', 10);
$html = "A-";
$pdf->MultiCell(6.5, 5, $html, '', 'C', 0, 1, 154.5, 19.5, true);
$pdf->writeHTMLCell(43, 0, 161, 19.5, '', 1, 1, false, false, 'L', true);
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>Name Change (Optional)</b>';
$pdf->writeHTMLCell(0, 0, 12, 27, $html, 0, 0, false, false, 'L', true);
$html = '<b>Read the Instructions for this Item Number before you decide whether you would like to legally change your name.</b>';
$pdf->writeHTMLCell(0, 0, 12, 33, $html, 0, 0, false, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Would you like to legally change your name?';
$pdf->writeHTMLCell(0, 0, 12, 40, $html, 0, 0, false, false, 'L', true);
//.............
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No (skip to <b>Item Number 4</b>.)</div>';
$pdf->writeHTMLCell(140, 0, 144, 40, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="legally_change_your_name" value="Y" />';
$pdf->writeHTMLCell(5, 0, 138, 39, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="legally_change_your_name" value="N" />';
$pdf->writeHTMLCell(5, 0, 154, 39, $html, 0, 1, false, false, 'L', false);
//.............
$pdf->SetFont('times', '', 10);
$html = 'If you answered “Yes,” type or print the new name you would like to use:';
$pdf->writeHTMLCell(110, 5, 19.3, 46, $html, 0, 0, false, true, 'L', true);
//.............
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 1, 19.1, 51, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 1, 93, 50, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 1, 154, 49.3, $html, 0, 0, false, false, 'L', true);
//.............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('legally_change_name_last_name', 71.8, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.1, 55.8);
$pdf->TextField('legally_change_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 55.8);
$pdf->TextField('legally_change_name_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 55.8);
//.............
$pdf->SetFont('times', '', 10);
$html = '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender';
$pdf->writeHTMLCell(0, 0, 12, 65, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_4_uscis_online_acount_number', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 69.5);
//.............
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 0, 98, 70, '<input type="checkbox" name="Male" value="male" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 0, 115, 70, '<input type="checkbox" name="Female" value="female" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 0, 135, 70, '<input type="checkbox" name="Another" value="Another" />', 0, 1, false, false, 'L', false);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div>Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Another Gender Identity</div>';
$pdf->writeHTMLCell(100, 0, 104, 70.6, $html, 0, 1, false, false, 'L', false);
//.........
$html = '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)';
$pdf->writeHTMLCell(0, 0, 12, 78, $html, 0, 0, false, true, 'L', true);
$html = 'In addition to your actual date of birth, include any other dates of birth you have ever used, including dates used in connection
with any legal names or non-legal names, in the space provided in <b>Part 14. Additional Information</b>.';
$pdf->writeHTMLCell(0, 0, 19, 90, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_date_of_birth', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 82.5);
//...........
$pdf->SetFont('times', '', 10);
$html = '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you are a lawful permanent resident, provide the date you became';
$pdf->writeHTMLCell(0, 0, 12, 99, $html, 0, 0, false, true, 'L', true);
$html = 'a lawful permanent resident (mm/dd/yyyy).';
$pdf->writeHTMLCell(0, 0, 19, 104, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_permanent_resident_date_of_birth', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83, 103.5);
//..............
$pdf->SetFont('times', '', 10);
$html = '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Birth';
$pdf->writeHTMLCell(0, 0, 12, 111, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_country_of_birth', 87, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 115.4);
//..............
$pdf->SetFont('times', '', 10);
$html = '<b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality';
$pdf->writeHTMLCell(0, 0, 12, 124, $html, 0, 0, false, true, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_country_of_nationality', 87, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 128.4);
$pdf->SetFont('times', '', 10);
$html = 'If you are a citizen or national of more than one country, list additional countries of nationality in the space provided in <b>Part 14.
Additional Information</b>.';
$pdf->writeHTMLCell(0, 0, 19, 136, $html, 0, 0, false, true, 'L', true);
//..............
$pdf->SetFont('times', '', 10);
$html = '<b>10.</b>&nbsp;&nbsp;&nbsp;Was one of your parents (including adoptive parents) a U.S. citizen before your 18th birthday?';
$pdf->writeHTMLCell(0, 0, 12, 145.5, $html, 0, 0, false, true, 'L', true);
//..............
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 178.5, 146, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="18th_birthday" value="Y" />';
$pdf->writeHTMLCell(5, 1, 172, 145.5, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="18th_birthday" value="N" />';
$pdf->writeHTMLCell(5, 1, 186, 145.5, $html, 0, 1, false, false, 'L', false);
$pdf->SetFont('times', '', 10);
$html = 'If you answered “Yes,” you may already be a U.S. citizen. If you are a U.S. citizen, you should not complete Form N-400. ';
$pdf->writeHTMLCell(190, 1, 19.1, 152, $html, 0, 0, false, true, 'L', true);
//..............
$pdf->SetFont('times', '', 10.2);
$html = '<b>11.</b>&nbsp;&nbsp;&nbsp;Do you have a physical or developmental disability or mental impairment that prevents you from<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;demonstrating your knowledge and understanding of the English language or civics requirements for<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;naturalization?';
$pdf->writeHTMLCell(0, 0, 12, 157.5, $html, 0, 0, false, true, 'L', true);
// //..............
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 178.5, 158.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="requirements_for_naturalizaion" value="Y" />';
$pdf->writeHTMLCell(5, 1, 172, 158, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="requirements_for_naturalizaion" value="N" />';
$pdf->writeHTMLCell(5, 1, 186, 158, $html, 0, 1, false, false, 'L', false);
// //..............
$pdf->SetFont('times', '', 10.2);
$html = 'If you answered “Yes,” submit a completed Form N-648, Medical Certification for Disability Exceptions, when you file your
Form N-400. See the<b><i> Naturalization Testing and Exceptions</i></b> section of the Instructions for additional information about
exceptions from the English language test, including exceptions based on age and years as a lawful permanent resident.';
$pdf->writeHTMLCell(0, 0, 19, 171.5, $html, 0, 0, false, true, 'L', true);
//.........
$pdf->SetFontSize(11.8);
$html = '<div><b><i>Social Security Update</i></b></div>';
$pdf->writeHTMLCell(191, 6.1, 13, 188, $html, 0, 1, true, false, 'J', true);
//...............
$pdf->setCellHeightRatio(1.3);
$pdf->SetFont('times', '', 10.2);
$html = '<b>12.a.</b>&nbsp;Do you want the Social Security Administration (SSA) to issue you an original or replacement Social Security card and update<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your immigration status with the SSA if and when you are naturalized?';
$pdf->writeHTMLCell(195, 0, 12, 195.2, $html, 0, 0, false, true, 'L', true);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 26, 208.5, "Yes (Complete <b>Item Numbers 12.b.</b> - <b>12.c.</b>)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 26, 215.5, "No (Go to <b>Part 3</b>.)", 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="immigration_status_SSA" value="Y" />';
$pdf->writeHTMLCell(5, 1, 19.3, 208.5, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="immigration_status_SSA" value="N" />';
$pdf->writeHTMLCell(5, 1, 19.3, 215.5, $html, 0, 1, false, false, 'L', false);
//.................
$pdf->SetFont('times', '', 10.2);
$html = '<b>12.b.</b>&nbsp;Provide your Social Security number (SSN) (if any).';
$pdf->writeHTMLCell(195, 0, 12, 224.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_Social_Security_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 104, 224);
//................

$pdf->SetFont('times', '', 10.2);
$html = '<b>12.c.</b>&nbsp;<b>Consent for Disclosure:</b> I authorize disclosure of information from this application and USCIS systems <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to the SSA as required for the purpose of assigning me an SSN, issuing me an original or replacement <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Social Security card, and updating my immigration status with the SSA.';
$pdf->writeHTMLCell(0, 0, 12, 232.5, $html, 0, 0, false, true, 'L', true);
// //..............
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 178.5, 233.5, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="consent_for_disclosure" value="Y" />';
$pdf->writeHTMLCell(5, 1, 172, 233, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="consent_for_disclosure" value="N" />';
$pdf->writeHTMLCell(5, 1, 186, 233, $html, 0, 1, false, false, 'L', false);
//................
$pdf->SetFont('times', '', 10.2);
$pdf->writeHTMLCell(0, 0, 20, 249.5,  '<b>NOTE:</b> If you answered “Yes” to <b>Item Number 12.a</b>., you must also answer “Yes” to <b>Item Number 12.c., Consent for</b>', 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(0, 0, 20, 254,  '<b>Disclosure</b>, to receive a card.', 0, 0, false, false, 'L', false);
/********************************
 ******** End Page No 2 *********
 ******************************/

/********************************
 ******** Start Page No 3 *******
 ********************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 3. Biographic Information</b></div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//........

$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//.......
$pdf->SetFont('times', '', 10);
$html = '<b>NOTE:</b> USCIS requires you to complete the categories below to conduct background checks. (See the <b>Form N-400 Instructions</b> for
more information.)';
$pdf->writeHTMLCell(195, 7, 12, 26, $html, 0, 1, false, 'L');
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, 12, 36, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="hispanic_not_hispanic" value="Y" />';
$pdf->writeHTMLCell(5, 1, 21, 41, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="hispanic_not_hispanic" value="Y" />';
$pdf->writeHTMLCell(5, 1, 58, 41, $html, 0, 1, false, false, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 27.7, 41.5, "Hispanic or Latino", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 65, 41.5, "Not Hispanic or Latino", 0, 0, false, true, 'L', true);
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Race (Select <b>all applicable</b> boxes)';
$pdf->writeHTMLCell(0, 0, 12, 49, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 21, 54, '<input type="checkbox" name="p3_race1" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 58, 54, '<input type="checkbox" name="p3_race2" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 78, 54, '<input type="checkbox" name="p3_race3" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 115, 54, '<input type="checkbox" name="p3_race4" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 158, 54, '<input type="checkbox" name="p3_race5" value="Y" />', 0, 1, false, false, 'L', false);
//.........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 27.7, 54.5, "American Indian<br>or Alaska Native", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 65, 54.5, "Asian", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 85, 54.5, "Black or<br>African American", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 122, 54.5, "Native Hawaiian or<br>Other Pacific Islander", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 165, 54.5, "White", 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 66, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feet', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 64, 66, 'Inches', 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->ComboBox('p3_height_feet', 19, 6.6, array('', '2', '3', '4', '5', '6', '7', '8'), array(), array(), 44, 65.5);
$pdf->ComboBox('p3_height_inch', 19, 6.6, array('', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'), array(), array(), 76, 65.5);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 100, 66, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pounds', 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p3_Pounds1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 137, 65.5);
$pdf->TextField('p3_Pounds2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 144, 65.5);
$pdf->TextField('p3_Pounds3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 65.5);
//...............
$pdf->SetFont('times', '', 10);
$html = '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye color (Select <b>only one</b> box)';
$pdf->writeHTMLCell(0, 0, 12, 73.3, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 21, 80, '<input type="checkbox" name="p3_eye_color_status1" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 42, 80, '<input type="checkbox" name="p3_eye_color_status2" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 60, 80, '<input type="checkbox" name="p3_eye_color_status3" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 80, 80, '<input type="checkbox" name="p3_eye_color_status4" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 100, 80, '<input type="checkbox" name="p3_eye_color_status5" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 120, 80, '<input type="checkbox" name="p3_eye_color_status6" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 140, 80, '<input type="checkbox" name="p3_eye_color_status7" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 160, 80, '<input type="checkbox" name="p3_eye_color_status8" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 176, 80, '<input type="checkbox" name="p3_eye_color_status9" value="Y" />', 0, 1, false, false, 'L', false);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 28, 80.3, "Black", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 49, 80.3, "Blue", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 67, 80.3, "Brown", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 87, 80.3, "Gray", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 107, 80.3, "Green", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 127, 80.3, "Hazel", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 147, 80.3, "Maroon", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 167, 80.3, "Pink", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 183, 80.3, "Unknown/<br>Other", 0, 0, false, true, 'L', true);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 87, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hair color (Select <b>only one</b> box)', 0, 0, false, true, 'L', true);
//.................
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 21, 93, '<input type="checkbox" name="p3_hair_color_status1" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 42, 93, '<input type="checkbox" name="p3_hair_color_status2" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 60, 93, '<input type="checkbox" name="p3_hair_color_status3" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 80, 93, '<input type="checkbox" name="p3_hair_color_status4" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 100, 93, '<input type="checkbox" name="p3_hair_color_status5" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 120, 93, '<input type="checkbox" name="p3_hair_color_status6" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 140, 93, '<input type="checkbox" name="p3_hair_color_status7" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 160, 93, '<input type="checkbox" name="p3_hair_color_status8" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 176, 93, '<input type="checkbox" name="p3_hair_color_status9" value="Y" />', 0, 1, false, false, 'L', false);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 28, 93.3, "Bald<br>(No hair)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 49, 93.3, "Black", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 67, 93.3, "Blond", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 87, 93.3, "Brown", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 107, 93.3, "Gray", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 127, 93.3, "Red", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 147, 93.3, "Sandy", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 167, 93.3, "White", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 183, 93.3, "Unknown/<br>Other", 0, 0, false, true, 'L', true);
//................
$pdf->SetFontSize(11.6);
$pdf->writeHTMLCell(191, 6.5, 13, 106, "<b>Part 4. Information About Your Residence</b>", 1, 1, true, 'L');
//................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 113, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Addresses', 0, 0, false, true, 'L', true);
$html = "List every location where you have lived during the last 5 years if you are filing based on the general provision under <b>Part 1.</b>,<br>
<b>Item Number 1.a.</b> If you are filing based on other naturalization eligibility options, see <b>Part 4</b>. in the <b>Specific Instructions by</b><br>
Item Number section of the Instructions for the applicable period of time for which you must enter this information. If you<br>
need extra space, use the space provided in <b>Part 14. Additional Information</b>.";
$pdf->writeHTMLCell(0, 0, 20.7, 118.5, $html, 0, 0, false, true, 'L', true);
//................
$pdf->writeHTMLCell(0, 0, 20.7, 138, "Current Physical Address", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 144, "In Care Of Name (if any)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 156.5, 'Street Number and Name', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 158, 156.5, 'Apt.&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;Flr.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 182, 156.5, 'Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 170, 'City or Town', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 158, 170, 'State', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 182, 170, 'ZIP Code', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 183, 'Province', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 78.7, 183, 'Postal Code', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 125, 183, 'Country', 0, 0, false, true, 'L', true);
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_1_incare_name', 182.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 149);
$pdf->TextField('p4_1_street_name', 134, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 161.5);
$pdf->TextField('p4_1_state_number', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 182.8, 161.5);
$pdf->TextField('p4_1_city_town', 134, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 174.5);
$pdf->TextField('p4_1_zip_code', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 182.8, 174.5);
$pdf->TextField('p4_1_province', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 187.5);
$pdf->TextField('p4_1_postal_code', 44.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79.7, 187.5);
$pdf->TextField('p4_1_country', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 126, 187.5);
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p4_1_state1", 23, 7, $comboBoxOptions, array(), array(), 158, 174.6);
//...............
$pdf->SetFont('times', 'B', 14);
$pdf->writeHTMLCell(5, 1, 158, 162.3, '<input type="checkbox" name="p4_apt" value="apt" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 166, 162.3, '<input type="checkbox" name="p4_ste" value="ste" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 174, 162.3, '<input type="checkbox" name="p4_flr" value="flr" />', 0, 1, false, false, 'L', false);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 20.7, '196.5', 'Dates of Residence: From (mm/dd/yyyy)', 0, 0, false, true, 'L', true);
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_date_of_residence_from_date', 31.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 81, 196);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 112.7, '196.5', 'Dates of Residence: To (mm/dd/yyyy)', 0, 0, false, true, 'L', true);
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_date_of_residence_to_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 169, 196);
//.........The Box ....
$pdf->writeHTMLCell(182, 45, 21.8, '205', '', 1, 0, true, true, 'L', true);
$pdf->writeHTMLCell(182, 1, 21.8, '212', '', 'B', 0, false, true, 'L', true);
$pdf->writeHTMLCell(182, 1, 21.8, '223', '', 'B', 0, false, true, 'L', true);
$pdf->writeHTMLCell(182, 1, 21.8, '233', '', 'B', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 13, 76.8, '205', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 13, 100, '205', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 13, 119, '205', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 13, 141, '205', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 13, 157, '205', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 13, 180, '210', '', 'R', 0, false, true, 'L', true);
//................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 5, 35, 206, '<b>Physical Address</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 30, 211, '(Street Number and Name)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 78, 208.7, '<b>City or Town</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 106, 206, '<b>State</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 102, 211, '<b>/ Province</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 122, 206, '<b>ZIP Code</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 120, 211, '<b>/ Postal Code</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 142.5, 209, '<b>Country</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(40, 0, 166, 205, '<b>Dates of Residence</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(40, 0, 163, 208.4, '<b>From</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(40, 0, 158.4, 212.4, '(mm/dd/yyyy)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(40, 0, 190, 208.4, '<b>To</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(40, 0, 181.4, 212.4, '(mm/dd/yyyy)', 0, 0, false, true, 'L', true);
//................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_1_physical_adress_1', 56, 10.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 217.8);
$pdf->TextField('p4_1_physical_adress_2', 56, 10.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 228.3);
$pdf->TextField('p4_1_physical_adress_3', 56, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 239);
//...............
$pdf->TextField('p4_1_city_town_1', 23.1, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 77.9, 217.8);
$pdf->TextField('p4_1_city_town_2', 23.1, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 77.9, 228.3);
$pdf->TextField('p4_1_city_town_3', 23.1, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 77.9, 239);
//...............
$pdf->TextField('p4_1_state_province_1', 19, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 101.1, 217.8);
$pdf->TextField('p4_1_state_province_2', 19, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 101.1, 228.3);
$pdf->TextField('p4_1_state_province_3', 19, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 101.1, 239);
//...............
$pdf->TextField('p4_1_zip_code_1', 22, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120.1, 217.8);
$pdf->TextField('p4_1_zip_code_2', 22, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120.1, 228.3);
$pdf->TextField('p4_1_zip_code_3', 22, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120.1, 239);
//...............
$pdf->TextField('p4_1_country_1', 16, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.1, 217.8);
$pdf->TextField('p4_1_country_2', 16, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.1, 228.3);
$pdf->TextField('p4_1_country_3', 16, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.1, 239);
//...............
$pdf->TextField('p4_1_from_date_1', 23, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158.1, 217.8);
$pdf->TextField('p4_1_from_date_2', 23, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158.1, 228.3);
$pdf->TextField('p4_1_from_date_3', 23, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158.1, 239);
//..............
$pdf->TextField('p4_1_to_date_1', 23, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 181.1, 217.8);
$pdf->TextField('p4_1_to_date_2', 23, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 181.1, 228.3);
$pdf->TextField('p4_1_to_date_3', 23, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 181.1, 239);
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 252, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Is your current physical address also your current mailing address?', 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p4_2_physical_address_status" value="Y" />';
$pdf->writeHTMLCell(5, 1, 20, 258, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p4_2_physical_address_status" value="N" />';
$pdf->writeHTMLCell(5, 1, 94, 258, $html, 0, 1, false, false, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 26, 258.4, "Yes (If you answered “Yes,” skip to <b> Part 5</b>.)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 101, 258.4, "No", 0, 0, false, true, 'L', true);
/******************************
 ******** End Page No 3 *******
 ******************************/

/******************************
 ******** Start Page No 4 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 4. Information About Your Residence </b> (continued) </div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->writeHTMLCell(0, 0, 12, 26, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Mailing Address (Safe Mailing Address, if applicable)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 21, 33, "In Care Of Name (if any)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 21, 45.5, 'Street Number and Name', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 157, 45.5, 'Apt.&nbsp;&nbsp;&nbsp;Ste.&nbsp;&nbsp;&nbsp;Flr.', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 182, 45.5, 'Number', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 59, 'City or Town', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 158, 59, 'State', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 182, 59, 'ZIP Code', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 72, 'Province', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 78.7, 72, 'Postal Code', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 125, 72, 'Country', 0, 0, false, true, 'L', true);
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p4_1_incare_name2', 182.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 38);
$pdf->TextField('p4_1_street_name2', 134, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 51.5);
$pdf->TextField('p4_1_state_number2', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 182.8, 51.5);
$pdf->TextField('p4_1_city_town2', 134, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 64.5);
$pdf->TextField('p4_1_zip_code2', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 182.8, 64.5);
$pdf->TextField('p4_1_province2', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 77.5);
$pdf->TextField('p4_1_postal_code2', 44.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79.7, 77.5);
$pdf->TextField('p4_1_country2', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 126, 77.5);
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("p4_1_state2", 23, 7, $comboBoxOptions, array(), array(), 158, 64.6);
//...............
$pdf->SetFont('times', 'B', 14);
$pdf->writeHTMLCell(5, 1, 158, 51.5, '<input type="checkbox" name="p4_apt2" value="apt" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 166, 51.5, '<input type="checkbox" name="p4_ste2" value="ste" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 174, 51.5, '<input type="checkbox" name="p4_flr2" value="flr" />', 0, 1, false, false, 'L', false);
//...............
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 5. Information About Your Marital History </b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 90, $html, 1, 1, true, 'L');
//..............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 98, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is your current marital status?', 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 20, 104, '<input type="checkbox" name="p5_maritial_status_1" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 62, 104, '<input type="checkbox" name="p5_maritial_status_2" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 83, 104, '<input type="checkbox" name="p5_maritial_status_3" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 105, 104, '<input type="checkbox" name="p5_maritial_status_4" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 127, 104, '<input type="checkbox" name="p5_maritial_status_5" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 150, 104, '<input type="checkbox" name="p5_maritial_status_6" value="Y" />', 0, 1, false, false, 'L', false);
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(140, 1, 26.5, 104.3, "Single, Never Married", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 68, 104.3, "Married", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 89, 104.3, "Divorced", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 111, 104.3, "Widowed", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 133, 104.3, "Separated", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 156, 104.3, "Marriage Annulled ", 0, 0, false, true, 'L', true);
//..........
$pdf->writeHTMLCell(0, 0, 21, 111, 'If you are single and have <b>never</b> married, go to <b>Part 6. Information About Your Children</b>', 0, 0, false, true, 'L', true);
//..........
$pdf->writeHTMLCell(0, 0, 12, 117, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you are currently married, is your spouse a current member of the U.S. armed forces?', 0, 0, false, true, 'L', true);
//..........
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 178.5, 117.5, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p5_2_status" value="Y" />';
$pdf->writeHTMLCell(5, 1, 172, 117, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p5_2_status" value="N" />';
$pdf->writeHTMLCell(5, 1, 186, 117, $html, 0, 1, false, false, 'L', false);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 124, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How many times have you been married? (See the Specific Instructions by Item Number section of ', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 129, 'the Instructions for more information about which marriages to include.)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 135, 'Provide current marriage certificate and any divorce decree, annulment decree, or death certificate showing that your prior<br>marriages were terminated (if applicable).', 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_3_how_many_times_married', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 189, 128);
//..................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 20.7, 145, 'If you are filing under one of the categories below, answer <b>Item Numbers 4.a. - 8.:</b>)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 28, 151, 'Spouse of U.S. Citizen, <b>Part 1., Item Number 1.b.</b>; or;', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 28, 156, 'Spouse of U.S. Citizen in Qualified Employment Outside the United States, <b>Part 1., Item Number 1.d.</b>', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(0, 0, 25, 150, '•', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 25, 155, '•', 0, 0, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 20.7, 162, 'If you are not filing <b>under one of the categories above, skip to Part 6.</b>', 0, 0, false, true, 'L', true);
//...............
$pdf->SetFontSize(11.6);
$html = '<div><b><i>Your Current Marriage</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 170, $html, 0, 1, true, 'L');
//.........
$pdf->SetFontSize(10);
$pdf->writeHTMLCell(0, 0, 12, 178, 'If you are currently married, including if you are legally separated, provide the following information about your current spouse.', 0, 0, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 184, '<b>4.a.</b>&nbsp;&nbsp;&nbsp;Current Spouse\'s Legal Name', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(40, 7, 19, 188.5, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 93, 187.6, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 157.5, 187, 'Middle Name (if applicable)', 0, 0, false, false, 'L', true);
//............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4a_legal_last_name', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.2, 194.5);
$pdf->TextField('p5_4a_legal_first_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 194.5);
$pdf->TextField('p5_4a_legal_middle_name', 46.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 158, 194.5);
//........... 
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 202, '<b>4.b.</b>&nbsp;&nbsp;&nbsp;Current Spouse\'s Date of Birth<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4b_date_of_birth', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20.2, 211.5);
//........... 
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 73, 202, '<b>4.c.</b>&nbsp;&nbsp;&nbsp;Date You Entered into Marriage <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;with Current Spouse (mm/dd/yyyy)', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_4c_current_spouse_date', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 82, 211.5);
//..............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 219, '<b>4.d.</b>&nbsp;&nbsp;&nbsp;Is your current spouse\'s present physical address the same as your physical address?', 0, 0, false, false, 'L', true);
//............
$pdf->writeHTMLCell(140, 1, 25, 225.3, 'Yes', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 231.3, 'No (If you answered “No,” provide address in <b>Part 14. Additional Information</b>.) ', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p5_4d_status" value="Y" />';
$pdf->writeHTMLCell(5, 1, 18.2, 225, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p5_4d_status" value="N" />';
$pdf->writeHTMLCell(5, 1, 18.2, 231, $html, 0, 1, false, false, 'L', false);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 238, '<b>5.a.</b>&nbsp;&nbsp;&nbsp;When did your current spouse become a U.S. citizen?', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 244.3, 'By Birth in the United States - Go to <b>Item Number 7</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25, 250.3, 'Other - Complete <b>Item Number 5.b.</b>', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p5_5a_status" value="Y" />';
$pdf->writeHTMLCell(5, 1, 18.2, 244, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p5_5a_status" value="Y" />';
$pdf->writeHTMLCell(5, 1, 18.2, 250, $html, 0, 1, false, false, 'L', false);
//............
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(190, 6, 11, 257, '<b>5.b.</b>&nbsp;&nbsp;&nbsp;Date Your Current Spouse Became a U.S. Citizen (mm/dd/yyyy)', 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p5_5b_us_citizen_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 256.5);
/******************************
 ******** End Page No 4 *******
 ******************************/

/******************************
 ******** Start Page No 5 ***** ..................................................................This page naming left.........................................................>>>>>
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 5. Information About Your Marital History </b> (continued) </div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(190, 6, 12, 28, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse\'s Alien Registration Number (A-Number) (if any)', 0, 0, false, false, 'L', true);
$pdf->setFont('Times', '', 10.3);
$pdf->writeHTMLCell(20, 0, 126, 28.5, '<b>A-</b>', 0, 1, false, 'L');
//.........
$pdf->Image('images/right_angle.jpg', 123, 30, 3.3, 3.3);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_6_a_number', 45, 6.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 28);
//..........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 35.5, '<b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How many times has your current spouse been married? (See the <b>Specific Instructions by Item</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 20.7, 40, '<b>Number</b> section of the Instructions for more information about which marriages to include.) ', 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_7_item_number', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 189, 37);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 20.7, 46, 'Provide divorce decrees, annulment decrees, or death certificates showing that all of your spouse\'s prior marriages were<br>terminated (if applicable). ', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 12, 56, '<b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse\'s Current Employer or Company</b>', 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p5_8_current_employer', 112, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 92, 56);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 20.7, 63.5, 'Only answer <b>Item Number 8.</b> if you are filing under <b>Part 1., Item Number 1.d., Spouse of U.S. Citizen in Qualified<br>Employment Outside the United States.</b>', 0, 0, false, true, 'L', true);
//.................

$pdf->SetFontSize(11.6);
$pdf->writeHTMLCell(191, 6.5, 13, 78, '<b>Part 6. Information About Your Children </b>', 1, 1, true, 'L');

//........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 13, 87, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indicate your total number of children under 18 years of age.', 0, 1, false, 'L');

//.....
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_1_under_18', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 189, 87);

//.......
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 13, 95, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provide the following information about your children identified in <b>Item Number 1</b>.For the residence and relationship', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20.7, 100, 'columns, you must type or print one of the valid options listed. If any of your children do not reside with you, provide the
address(es) where those children live in <b>Part 14. Additional Information</b>. If you have more than three children, use the space
provided in <b>Part 14. Additional Information.</b>', 0, 1, false, 'L');
//...........The box......
$pdf->writeHTMLCell(182, 57, 21.8, '115', '', 1, 0, true, true, 'L', true);
$pdf->writeHTMLCell(182, 1, 21.8, '135', '', 'B', 0, false, true, 'L', true);
$pdf->writeHTMLCell(182, 1, 21.8, '145.5', '', 'B', 0, false, true, 'L', true);
$pdf->writeHTMLCell(182, 1, 21.8, '155.5', '', 'B', 0, false, true, 'L', true);
//............
$pdf->writeHTMLCell(1, 57, 81, '115', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 57, 104, '115', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 57, 142, '115', '', 'R', 0, false, true, 'L', true);
$pdf->writeHTMLCell(1, 57, 176, '115', '', 'R', 0, false, true, 'L', true);
$pdf->setFillColor(255, 255, 255);
$pdf->writeHTMLCell(27.3, 10, 176, '141', '', '', 0, true, true, 'L', true);
$pdf->writeHTMLCell(27.5, 9.8, 176, '151.5', '', '', 0, true, true, 'L', true);
$pdf->writeHTMLCell(27.4, 9.9, 176, '162', '', '', 0, true, true, 'L', true);
$pdf->setFillColor(220, 220, 220);
// ................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(60, 5, 40, 122, '<b>Child\'s Name</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 27, 127, '(First Name and Family Name)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 82.5, 122, '<b>Date of Birth</b>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 82, 127, '(mm/dd/yyyy)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(0, 0, 116, 116, '<b>Residence</b>', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 9.2);
$pdf->writeHTMLCell(0, 0, 46, 121, '(Valid options include:<br>resides with me, does not<br>reside with me, or unknown/<br>missing)', 0, 0, false, true, 'C', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 150, 116, '<b>Relationship</b>', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(0, 0, 118, 121, '(Valid options include:<br>biological child,<br>stepchild, legally adopted<br>child)', 0, 0, false, true, 'C', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(70, 0, 156, 118, '<b>Are you<br>providing<br>support for this<br>child?</b>', 0, 0, false, true, 'C', true);
// ................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p6_2_childs_name1', 60.3, 10.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 140.6);
$pdf->TextField('p6_2_childs_name2', 60.3, 10.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 151);
$pdf->TextField('p6_2_childs_name3', 60.3, 10.7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.7, 161.4);
//...............
$pdf->TextField('p6_2_date_of_birth1', 23.3, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 81.8, 140.6);
$pdf->TextField('p6_2_date_of_birth2', 23.3, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 81.8, 151);
$pdf->TextField('p6_2_date_of_birth3', 23.3, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 81.8, 161.4);
//...............
$pdf->TextField('p6_2_residence1', 38.1, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 140.6);
$pdf->TextField('p6_2_residence2', 38.1, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 151);
$pdf->TextField('p6_2_residence3', 38.1, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105, 161.4);
//...............
$pdf->TextField('p6_2_relationship1', 34.2, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 140.6);
$pdf->TextField('p6_2_relationship2', 34.2, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 151);
$pdf->TextField('p6_2_relationship3', 34.2, 10.9, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 161.4);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(0, 0, 182, 144, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p6_suppor_1" value="Y" />';
$pdf->writeHTMLCell(5, 0, 176, 143.3, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p6_suppor_1" value="N" />';
$pdf->writeHTMLCell(5, 0, 189, 143.3, $html, 0, 1, false, false, 'L', false);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(0, 0, 182, 154, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p6_suppor_2" value="Y" />';
$pdf->writeHTMLCell(5, 0, 176, 153.3, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p6_suppor_2" value="N" />';
$pdf->writeHTMLCell(5, 0, 189, 153.3, $html, 0, 1, false, false, 'L', false);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(0, 0, 182, 164, $html, 0, 0, false, true, 'L', true);
//.............
$pdf->SetFont('times', '', 14);
$html = '<input type="checkbox" name="p6_suppor_3" value="Y" />';
$pdf->writeHTMLCell(5, 0, 176, 163.3, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="p6_suppor_3" value="N" />';
$pdf->writeHTMLCell(5, 0, 189, 163.3, $html, 0, 1, false, false, 'L', false);

//................
$pdf->SetFontSize(11.6);
$pdf->writeHTMLCell(191, 6.5, 13, 178, '<b>Part 7. Information About Your Employment and Schools You Attended</b>', 1, 1, true, 'L');
//.................
$pdf->SetFontSize(10);
$pdf->writeHTMLCell(190, 0, 13, 186, '<b>1.</b>', 0, '', '', 'L');
$pdf->writeHTMLCell(200, 0, 20.7, 186, 'List where you have worked or attended school full time or part time during the last 5 years if you are filing based on the general<br>provision under <b>Part 1., Item Number 1.a.</b> If you are filing based on other naturalization eligibility options, see <b>Part 7</b>. in the<br><b>Specific Instructions by Item Number</b> section of the Instructions for the applicable period of time for which you must enter<br>
this information. Provide information for the complete time period for all employment, including foreign government<br>employment such as military, police, and intelligence services. Begin by providing information about your most recent or<br>current employment, studies, or unemployment. Provide the locations and dates where you worked, were self-employed, were<br>
unemployed, or have studied. If you worked for yourself and not for a specific employer, type or print “self-employed” for the<br>employer name. If you were unemployed, type or print “unemployed.” If you are retired, type or print “retired.” If you need<br>
extra space to complete <b>Part 7</b>., use the space provided in <b>Part 14. Additional Information</b>.', 0, 1, false, 'L');

//...........The box......
$pdf->writeHTMLCell(182, 12, 21.8, '228', '', '1', 0, true, true, 'L', false);
$pdf->writeHTMLCell(151.4, 1, 21.8, '227.6', '', 'B', 0, false, true, 'L', false);
$pdf->writeHTMLCell(182, 1, 21.8, '244.5', '', 'B', 0, false, true, 'L', false);
$pdf->writeHTMLCell(182, 1, 21.8, '253', '', 'B', 0, false, true, 'L', false);
$pdf->writeHTMLCell(182, 1, 21.8, '261', '', 'B', 0, false, true, 'L', false);
///.............
$pdf->writeHTMLCell(1, 8, 55.9, '232', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 8, 79.9, '232', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 8, 94.9, '232', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 8, 114, '232', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 12, 133.5, '228', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 8, 153.5, '232', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 12, 173.5, '228', '', 'L', 0, false, true, 'L', false);
//..............
$pdf->writeHTMLCell(114, 1, 21.8, '227.6', '<b>Employer or School</b>', 0, 0, false, true, 'C', false);
$pdf->SetFontSize(9.8);
$pdf->writeHTMLCell(46, 1, 131, '227.6', '<b>Employment/School Dates</b>', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(15, 1, 33, '233.6', '<b>Name</b>', 0, 0, false, true, 'L', false);
$pdf->writeHTMLCell(25, 1, 59, '233.6', '<b>City/Town</b>', 0, 0, false, true, 'L', false);
$pdf->writeHTMLCell(18, 1, 79, '231.6', '<b>State/<br>Province</b>', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(25, 1, 92.4, '231.6', '<b>ZIP Code/<br>Postal Code</b>', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(25, 1, 111.7, '233.6', '<b>Country</b>', 0, 0, false, true, 'C', false);
$pdf->SetFontSize(9.6);
$pdf->writeHTMLCell(25, 1, 131.5, '231.6', '<b>From</b><br>(mm/dd/yyyy)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(25, 1, 151.5, '231.6', '<b>To</b><br>(mm/dd/yyyy)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(25, 1, 177, '230', '<b>Occupation or<br>Field of Study</b>', 0, 0, false, true, 'C', false);
//.......Box end..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p7_1_name1', 34.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.5, 239.9);
$pdf->TextField('p7_1_name2', 34.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.5, 248.5);
$pdf->TextField('p7_1_name3', 34.4, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.5, 257.1);
//.............
$pdf->TextField('p7_1_city_town1', 24.3, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.7, 239.9);
$pdf->TextField('p7_1_city_town2', 24.3, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.7, 248.5);
$pdf->TextField('p7_1_city_town3', 24.3, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.7, 257.1);
//.............
$pdf->TextField('p7_1_state1', 15.1, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79.8, 239.9);
$pdf->TextField('p7_1_state2', 15.1, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79.8, 248.5);
$pdf->TextField('p7_1_state3', 15.1, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79.8, 257.1);
//.............
$pdf->TextField('p7_1_zip_code1', 19.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94.7, 239.9);
$pdf->TextField('p7_1_zip_code2', 19.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94.7, 248.5);
$pdf->TextField('p7_1_zip_code3', 19.4, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94.7, 257.1);
//.............
$pdf->TextField('p7_1_country1', 19.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 114, 239.9);
$pdf->TextField('p7_1_country2', 19.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 114, 248.5);
$pdf->TextField('p7_1_country3', 19.4, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 114, 257.1);
//.............
$pdf->TextField('p7_1_from_date_1', 20.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 133.2, 239.9);
$pdf->TextField('p7_1_from_date_2', 20.4, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 133.2, 248.5);
$pdf->TextField('p7_1_from_date_3', 20.4, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 133.2, 257.1);
//.............
$pdf->TextField('p7_1_to_date_1', 20.3, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153.4, 239.9);
$pdf->TextField('p7_1_to_date_2', 20.3, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153.4, 248.5);
$pdf->TextField('p7_1_to_date_3', 20.3, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153.4, 257.1);
//.............
$pdf->TextField('p7_1_occupation1', 30.5, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.5, 239.9);
$pdf->TextField('p7_1_occupation2', 30.5, 8.8, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.5, 248.5);
$pdf->TextField('p7_1_occupation3', 30.5, 8.2, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173.5, 257.1);

/******************************
 ******** End Page No 5 *******
 ******************************/

/******************************
 ******** Start Page No 6 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 8. Time Outside the United States</b></div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->SetFontSize(10);
$pdf->writeHTMLCell(190, 0, 12, 26, '<b>1.</b>', 0, '', '', 'L');
$pdf->writeHTMLCell(200, 0, 20.7, 26, 'List below all the trips that you have taken outside the United States during the last 5 years if you are filing based on the general<br>provision under <b>Part 1., Item Number 1.a.</b> If you are filing based on other naturalization eligibility options, see <b>Part 8</b>. in the<br>
<b>Specific Instructions by Item Number</b> section of the Instructions for the applicable period of time for which you must enter<br>this information. Start with your most recent trip and work backwards. Do not include day trips (where the entire trip was<br>
completed within 24 hours) in the table. If you have taken any trips outside the United States that lasted more than 6 months,<br>see the <b>Required Evidence - Continuous Residence</b> section of the Instructions for evidence you should provide. If you need<br>
extra space to complete this section, use the space provided in <b>Part 14. Additional Information</b>.', 0, 1, false, 'L');
//...........The box......
$pdf->writeHTMLCell(182, 13, 21.8, '59', '', '1', 0, true, true, 'L', false);
///.............
$pdf->writeHTMLCell(1, 13, 56, '59', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 13, 90, '59', '', 'L', 0, false, true, 'L', false);
//..............
$pdf->writeHTMLCell(50, 1, 14.5, '58.6', '<b>Date You Left the<br>United States</b><br>(mm/dd/yyyy)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(50, 1, 48.5, '58.6', '<b>Date You Returned<br>to the United States </b><br>(mm/dd/yyyy)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(50, 1, 122.5, '58.6', '<b>Countries to<br>Which You<br>Traveled</b>', 0, 0, false, true, 'C', false);
// ..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_1_left_us_date_1', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.6, 71.9);
$pdf->TextField('p8_1_left_us_date_2', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.6, 78);
$pdf->TextField('p8_1_left_us_date_3', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.6, 84);
$pdf->TextField('p8_1_left_us_date_4', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.6, 90);
$pdf->TextField('p8_1_left_us_date_5', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.6, 96);
$pdf->TextField('p8_1_left_us_date_6', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21.6, 102);
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_1_return_us_date_1', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.8, 71.9);
$pdf->TextField('p8_1_return_us_date_2', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.8, 78);
$pdf->TextField('p8_1_return_us_date_3', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.8, 84);
$pdf->TextField('p8_1_return_us_date_4', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.8, 90);
$pdf->TextField('p8_1_return_us_date_5', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.8, 96);
$pdf->TextField('p8_1_return_us_date_6', 34.4, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.8, 102);
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p8_1_traveled_country1', 114, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.9, 71.9);
$pdf->TextField('p8_1_traveled_country2', 114, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.9, 78);
$pdf->TextField('p8_1_traveled_country3', 114, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.9, 84);
$pdf->TextField('p8_1_traveled_country4', 114, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.9, 90);
$pdf->TextField('p8_1_traveled_country5', 114, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.9, 96);
$pdf->TextField('p8_1_traveled_country6', 114, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 89.9, 102);
//................
$pdf->SetFont('times', 'B', 11.6); // set font
$pdf->writeHTMLCell(191, 6.5, 13, 115, '<b>Part 9. Additional Information About You </b>', 1, 1, true, 'L');
//.................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 0, 12, 123, 'When a question includes the word “<b>EVER</b>,” you must provide information about any of your actions or conduct that occurred<br><b>anywhere in the world</b> at any time, unless the question specifies otherwise. If you answer “Yes” to any of the questions in<b> Item</b><br>
<b>Numbers 1. - 14</b>. in <b>Part 9. Item Numbers 1. - 14.</b>, provide explanations and any additional information in the space provided in<br><b>Part 14. Additional Information</b>. ', 0, '', '', 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 142, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> claimed to be a U.S. citizen (in writing or any other way)?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 142.5, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 141.5, '<input type="checkbox" name="p9_1_status" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 141.5, '<input type="checkbox" name="p9_1_status" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 147.5, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> registered to vote or voted in any Federal, state, or local election in the United<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;States? If you lawfully voted only in a local election where noncitizens are eligible to vote, you may<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;answer “No.”', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 149.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 149, '<input type="checkbox" name="p9_2_status" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 149, '<input type="checkbox" name="p9_2_status" value="N" />', 0, 1, false, false, 'L', false);
//...................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 161, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Do you currently owe any overdue Federal, state, or local taxes in the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 161.5, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 161.5, '<input type="checkbox" name="p9_3_status" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 161.5, '<input type="checkbox" name="p9_3_status" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 167, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Since you became a lawful permanent resident, have you called yourself a “nonresident alien” on a<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Federal, state, or local tax return or decided not to file a tax return because you considered yourself to<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;be a nonresident?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 169.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 169, '<input type="checkbox" name="p9_4_status" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 169, '<input type="checkbox" name="p9_4_status" value="N" />', 0, 1, false, false, 'L', false);
//...........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 182, 'Have you <b>EVER</b>:', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 188, '<b>5.a.</b>&nbsp;&nbsp;&nbsp;Been a member of, involved in, or in any way associated with any Communist or totalitarian party<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>anywhere in the world? </b>', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 188.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 188, '<input type="checkbox" name="p9_5a_status" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 188, '<input type="checkbox" name="p9_5a_status" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 198, '<b>5.b.</b>&nbsp;&nbsp;&nbsp;Advocated (supported and promoted) any of the following, or been a member of, involved in, or in any<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;way associated with any group <b>anywhere in the world</b> that advocated any of the following:', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 198.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 198, '<input type="checkbox" name="p9_5b_status" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 198, '<input type="checkbox" name="p9_5b_status" value="N" />', 0, 1, false, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 20, 208, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 209, 'Opposition to all organized government;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 20, 214.5, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 215.5, 'World communism;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 20, 222, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 223, 'The establishment in the United States of a totalitarian dictatorship;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 20, 229, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 230, 'The overthrow by force or violence or other unconstitutional means of the Government of the<br>United States or all forms of law;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 20, 240, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 241, 'The unlawful assaulting or killing of any officer or officers of the Government of the United States<br>or of any other organized government because of their official character;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 20, 251, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 252, 'The unlawful damage, injury, or destruction of property; or', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 20, 258, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 24, 259, 'Sabotage?', 0, 1, false, 'L');
/******************************
 ******** End Page No 6 *******
 ******************************/

/******************************
 ******** Start Page No 7 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 9. Additional Information About You </b> (continued) </div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 26.5, 'Have you <b>EVER</b> been a member of, involved in, or in any way associated with, or have you <b>EVER</b> provided money, a thing of<br>value, services or labor, or any other assistance or support to a group that: ', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 36, '<b>6.a.</b>&nbsp;&nbsp;&nbsp;Used a weapon or explosive with intent to harm another person or cause damage to property? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 36.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 36, '<input type="checkbox" name="p9_6a_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 36, '<input type="checkbox" name="p9_6a_staus" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 42, '<b>6.b.</b>&nbsp;&nbsp;&nbsp;Engaged (participated) in kidnapping, assassination, or hijacking or sabotage of an airplane, ship,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vehicle, or other mode of transportation? 
 ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 42.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 42.6, '<input type="checkbox" name="p9_6b_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 42.6, '<input type="checkbox" name="p9_6b_staus" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 52, '<b>6.c.</b>&nbsp;&nbsp;&nbsp;Threatened, attempted (tried), conspired (planned with others), prepared, planned, advocated for, or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;incited (encouraged) others to commit any of the acts listed in <b>Item Numbers 6.a.</b> or <b>6.b.</b>?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 52.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 52.6, '<input type="checkbox" name="p9_6c_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 52.6, '<input type="checkbox" name="p9_6c_staus" value="N" />', 0, 1, false, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 63, 'Have you <b>EVER</b> ordered, incited, called for, committed, assisted, helped with, or otherwise participated in any of the following:', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 70, '<b>7.a.</b>&nbsp;&nbsp;&nbsp;Torture?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 70.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 70.6, '<input type="checkbox" name="p9_7a_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 70.6, '<input type="checkbox" name="p9_7a_staus" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 77, '<b>7.b.</b>&nbsp;&nbsp;&nbsp;Genocide?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 77.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 77.6, '<input type="checkbox" name="p9_7b_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 77.6, '<input type="checkbox" name="p9_7b_staus" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 84, '<b>7.c.</b>&nbsp;&nbsp;&nbsp;Killing or trying to kill any person? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 84.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 84.6, '<input type="checkbox" name="p9_7c_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 84.6, '<input type="checkbox" name="p9_7c_staus" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 91, '<b>7.d.</b>&nbsp;&nbsp;&nbsp;Intentionally and severely injuring or trying to injure any person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 91.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 91.6, '<input type="checkbox" name="p9_7d_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 91.6, '<input type="checkbox" name="p9_7d_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 98, '<b>7.e.</b>&nbsp;&nbsp;&nbsp;Any kind of sexual contact or activity with any person who did not consent (did not agree) or was<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unable to consent (could not agree), or was being forced or threatened by you or by someone else?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 98.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 99, '<input type="checkbox" name="p9_7e_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 99, '<input type="checkbox" name="p9_7e_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 109, '<b>7.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;Not letting someone practice their religion?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 109.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 109.6, '<input type="checkbox" name="p9_7f_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 109.6, '<input type="checkbox" name="p9_7f_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 115, '<b>7.g.</b>&nbsp;&nbsp;&nbsp;Causing harm or suffering to any person because of their race, religion, national origin, membership in<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a particular social group, or political opinion?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 116.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 116, '<input type="checkbox" name="p9_7g_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 116, '<input type="checkbox" name="p9_7g_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 125, '<b>8.a.</b>&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> served in, been a member of, assisted (helped), or participated in any military or <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;police unit? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 126.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 126, '<input type="checkbox" name="p9_8a_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 126, '<input type="checkbox" name="p9_8a_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 135, '<b>8.b.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 135, 'Have you <b>EVER</b> served in, been a member of, assisted (helped), or participated in any armed group (a<br>
group that carries weapons), for example: paramilitary unit (a group of people who act like a military<br>
group but are not part of the official military), self-defense unit, vigilante unit, rebel group, or guerrilla<br>
group?', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 154, 'If you answered “Yes” to <b>Item Number 8.a.</b> or <b>Item Number 8.b.</b>, include the name of the country,<br>
the name of the military unit or armed group, your rank or position, and your dates of involvement in<br>
your explanation in <b>Part 14. Additional Information</b>.', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 136.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 136, '<input type="checkbox" name="p9_8b_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 136, '<input type="checkbox" name="p9_8b_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 169, '<b>9.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 169, 'Have you <b>EVER</b> worked, volunteered, or otherwise served in a place where people were detained<br>
(forced to stay), for example, a prison, jail, prison camp (a camp where prisoners of war or political<br>
prisoners are kept), detention facility, or labor camp, or have you <b>EVER</b> directed or participated in any<br>
other activity that involved detaining people?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 170.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 170, '<input type="checkbox" name="p9_9_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 170, '<input type="checkbox" name="p9_9_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 188, '<b>10.a.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 188, 'Were you <b>EVER</b> a part of any group, or did you <b>EVER</b> help any group, unit, or organization that used<br>
a weapon against any person, or threatened to do so?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 189.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 189, '<input type="checkbox" name="p9_10a_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 189, '<input type="checkbox" name="p9_10a_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 198, '<b>10.b.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 198, 'If you answered “Yes” to <b>Item Number 10.a.</b>, when you were part of this group, or when you helped<br>
this group, did you ever use a weapon against another person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 199.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 199, '<input type="checkbox" name="p9_10b_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 199, '<input type="checkbox" name="p9_10b_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 208.5, '<b>10.c.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 208.5, 'If you answered “Yes” to <b>Item Number 10.a.</b>, when you were part of this group, or when you helped<br>
this group, did you ever threaten another person that you would use a weapon against that person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 209.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 209, '<input type="checkbox" name="p9_10c_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 209, '<input type="checkbox" name="p9_10c_staus" value="N" />', 0, 1, false, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 219, '<b>11.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 219, 'Have you <b>EVER</b> sold, provided, or transported weapons, or assisted any person in selling, providing,<br>
or transporting weapons, which you knew or believed would be used against another person?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 220.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 220, '<input type="checkbox" name="p9_11_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 220, '<input type="checkbox" name="p9_11_staus" value="N" />', 0, 1, false, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 230, '<b>12.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 230, 'Have you <b>EVER</b> received any weapons training, paramilitary training, or other military-type training?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 231.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 231, '<input type="checkbox" name="p9_12_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 231, '<input type="checkbox" name="p9_12_staus" value="N" />', 0, 1, false, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 237, '<b>13.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 237, 'Have you <b>EVER</b> recruited (asked), enlisted (signed up), conscripted (required to join), or used any<br>person under 15 years of age to serve in or help an armed group, or attempted or worked with others to<br>do so?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 239.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 239, '<input type="checkbox" name="p9_13_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 239, '<input type="checkbox" name="p9_13_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 251, '<b>14.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 251, 'Have you <b>EVER</b> used any person under 15 years of age to take part in hostilities or attempted or<br>worked with others to do so? This could include participating in combat or providing services related<br>to combat (such as serving as a messenger or transporting supplies).', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 252.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 252, '<input type="checkbox" name="p9_14_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 252, '<input type="checkbox" name="p9_14_staus" value="N" />', 0, 1, false, false, 'L', false);
/******************************
 ******** End Page No 7 *******
 ******************************/

/******************************
 ******** Start Page No 8 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 9. Additional Information About You </b> (continued) </div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 27, '<b>If you answer “Yes” to any part of Item Number 15. below, complete the table below with each crime or offense even if your<br>
records have been sealed, expunged, or otherwise cleared.</b> You must disclose this information even if someone, including a judge,<br>
law enforcement officer, or attorney, told you that it is no longer on your record, or told you that you do not have to disclose the<br>
information. If you need extra space, use the space provided in <b>Part 14. Additional Information</b>. Submit evidence to support your<br>answers with your Form N-400.', 0, 1, false, 'L');
//................
$pdf->writeHTMLCell(0, 0, 12, 50, 'Include all the crimes and offenses in the United States or <b>anywhere in the world</b> (including domestic violence, driving under the<br>influence of drugs or alcohol, and crimes and offenses while you were under 18 years of age) which you EVER: ', 0, 1, false, 'L');
//......
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 60, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 61, 'Committed, agreed to commit, or asked someone else to commit;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 12, 65.5, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 66.5, 'Were arrested, cited, detained, or confined by any law enforcement officer, military official (in the U.S. or elsewhere), or<br>immigration official;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 12, 76, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 77, 'Were charged with committing, helping commit, or trying to commit;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 12, 82, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 83, 'Pled guilty to;', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 12, 88, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 89, 'Were convicted of', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 12, 94., '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 95, 'Were placed in alternative sentencing or a rehabilitative program for (for example, diversion, deferred prosecution, withheld<br>adjudication, or deferred adjudication); or', 0, 1, false, 'L');
//....
$pdf->writeHTMLCell(0, 0, 12, 104, '<h2>•</h2>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 17, 105, 'Received a suspended sentence, clemency, amnesty, or pardon for, or were placed on probation or paroled for.', 0, 1, false, 'L');
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 112.5, '<b>15.a.</b>&nbsp;&nbsp;Have you <b>EVER</b> committed, agreed to commit, asked someone else to commit, helped commit, or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tried to commit a crime or offense for which you were NOT arrested?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 114.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 114, '<input type="checkbox" name="p9_15a_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 114, '<input type="checkbox" name="p9_15a_staus" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 122, '<b>15.b.</b>&nbsp;&nbsp;Have you <b>EVER</b> been arrested, cited, detained or confined by any law enforcement officer, military <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;official (in the U.S. or elsewhere), or immigration official for any reason, or been charged with a crime<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or offense?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 123.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 123, '<input type="checkbox" name="p9_15b_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 123, '<input type="checkbox" name="p9_15b_staus" value="N" />', 0, 1, false, false, 'L', false);

//............................The box...........................

$pdf->writeHTMLCell(191, 34, 13.2, '138', '', '1', 0, true, true, 'L', false);
$pdf->writeHTMLCell(1, 34, 56, '138', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 34, 84, '138', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 34, 112, '138', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 34, 143, '138', '', 'L', 0, false, true, 'L', false);
$pdf->writeHTMLCell(1, 34, 181, '138', '', 'L', 0, false, true, 'L', false);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(50, 1, 10.5, '137.9', '<b>What was the crime or<br>offense</b>? (If convicted,<br>provide crime of conviction.<br>If not convicted, provide<br>
crime or offense listed in<br>arrest, citation, charging<br>document, or crime<br>committed.)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(50, 1, 45.5, '147.9', '<b>Date of the Crime<br>or Offense</b><br>(mm/dd/yyyy)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(50, 1, 73, '144.9', '<b>Date of your<br>conviction or<br>guilty plea</b><br>(if applicable)<br>(mm/dd/yyyy)', 0, 0, false, true, 'C', false);
$pdf->SetFont('times', '', 9.7);
$pdf->writeHTMLCell(50, 1, 103, '147.9', '<b>Place of Crime or<br>Offense </b>(City or<br>Town, State, Country)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(50, 1, 137, '139.9', '<b>What was the result or<br>disposition of the arrest,<br>citation, or<br>charge?</b> (no charges<br>filed, convicted, charges<br>dismissed, detention,<br>jail, probation, etc.)', 0, 0, false, true, 'C', false);
$pdf->writeHTMLCell(50, 1, 168, '139.9', '<b>What was your<br>sentence</b><br>(if applicable)?<br>(For example,<br>90 days in jail,<br>90 days on<br>probation)', 0, 0, false, true, 'C', false);
// ..................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_15b_crime_1', 43.1, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 172);
$pdf->TextField('p9_15b_crime_2', 43.1, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 181.7);
$pdf->TextField('p9_15b_crime_3', 43.1, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 191.2);
$pdf->TextField('p9_15b_crime_4', 43.1, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 200.9);
$pdf->TextField('p9_15b_crime_5', 43.1, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 210.6);
// ..................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_15b_date_of_crime_1', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.9, 172);
$pdf->TextField('p9_15b_date_of_crime_2', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.9, 181.7);
$pdf->TextField('p9_15b_date_of_crime_3', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.9, 191.2);
$pdf->TextField('p9_15b_date_of_crime_4', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.9, 200.9);
$pdf->TextField('p9_15b_date_of_crime_5', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 55.9, 210.6);

// ..................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_15b_conviction_date_1', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83.9, 172);
$pdf->TextField('p9_15b_conviction_date_2', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83.9, 181.7);
$pdf->TextField('p9_15b_conviction_date_3', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83.9, 191.2);
$pdf->TextField('p9_15b_conviction_date_4', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83.9, 200.9);
$pdf->TextField('p9_15b_conviction_date_5', 28.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 83.9, 210.6);

// ..................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_15b_place_of_crime_1', 31.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 111.9, 172);
$pdf->TextField('p9_15b_place_of_crime_2', 31.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 111.9, 181.7);
$pdf->TextField('p9_15b_place_of_crime_3', 31.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 111.9, 191.2);
$pdf->TextField('p9_15b_place_of_crime_4', 31.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 111.9, 200.9);
$pdf->TextField('p9_15b_place_of_crime_5', 31.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 111.9, 210.6);

// ..................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_15b_arrest_result_1', 38.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 172);
$pdf->TextField('p9_15b_arrest_result_2', 38.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 181.7);
$pdf->TextField('p9_15b_arrest_result_3', 38.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 191.2);
$pdf->TextField('p9_15b_arrest_result_4', 38.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 200.9);
$pdf->TextField('p9_15b_arrest_result_5', 38.2, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 142.9, 210.6);

// ..................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_15b_your_sentence_1', 23.5, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180.9, 172);
$pdf->TextField('p9_15b_your_sentence_2', 23.5, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180.9, 181.7);
$pdf->TextField('p9_15b_your_sentence_3', 23.5, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180.9, 191.2);
$pdf->TextField('p9_15b_your_sentence_4', 23.5, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180.9, 200.9);
$pdf->TextField('p9_15b_your_sentence_5', 23.5, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 180.9, 210.6);
//.......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 223, '<b>16.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you received a suspended sentence, were placed on probation, or were paroled, have you completed<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;your suspended sentence, probation, or parole?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 224.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 224, '<input type="checkbox" name="p9_16_staus" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 224, '<input type="checkbox" name="p9_16_staus" value="N" />', 0, 1, false, false, 'L', false);
//..............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 235, 'If you answer “Yes” to any of the questions in <b>Item Numbers 17.a. - 19.</b>, provide an explanation in the space provided in <b>Part 14.<br>
Additional Information.</b> Submit evidence to support your answers.', 0, 1, false, 'L');
/******************************
 ******** End Page No 8 *******
 ******************************/

/******************************
 ******** Start Page No 9 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 9. Additional Information About You </b> (continued) </div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 27, 'Have you <b>EVER:</b> ', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 33, '<b>17.a.</b>&nbsp;&nbsp;Engaged in prostitution, attempted to procure or import prostitutes or persons for the purpose of<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;prostitution, or received any proceeds or money from prostitution? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 33.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 33, '<input type="checkbox" name="p9_17a" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 33, '<input type="checkbox" name="p9_17a" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 43.5, '<b>17.b.</b>&nbsp;&nbsp;Manufactured, cultivated, produced, distributed, dispensed, sold, or smuggled (trafficked) any <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;controlled substances, illegal drugs, narcotics, or drug paraphernalia in violation of any law or
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;regulation of a U.S. state, the United States, or a foreign country?
 ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 44.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 44, '<input type="checkbox" name="p9_17b" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 44, '<input type="checkbox" name="p9_17b" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 58, '<b>17.c.</b>&nbsp;&nbsp;Been married to more than one person at the same time?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 58, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 58, '<input type="checkbox" name="p9_17c" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 58, '<input type="checkbox" name="p9_17c" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 65, '<b>17.d.</b>&nbsp;&nbsp;Married someone in order to obtain an immigration benefit?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 65, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 65, '<input type="checkbox" name="p9_17d" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 65, '<input type="checkbox" name="p9_17d" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 72, '<b>17.e.</b>&nbsp;&nbsp;Helped anyone to enter, or try to enter, the United States illegally?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 72.1, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 72, '<input type="checkbox" name="p9_17e" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 72, '<input type="checkbox" name="p9_17e" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 79, '<b>17.f.</b>&nbsp;&nbsp;Gambled illegally or received income from illegal gambling? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 79.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 79.6, '<input type="checkbox" name="p9_17f" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 79.6, '<input type="checkbox" name="p9_17f" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 85, '<b>17.g.</b>&nbsp;&nbsp;Failed to support your dependents (pay child support) or to pay alimony (court-ordered financial<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;support after divorce or separation)?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 85.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 86.5, '<input type="checkbox" name="p9_17g" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 86.5, '<input type="checkbox" name="p9_17g" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 95, '<b>17.h.</b>&nbsp;&nbsp;Made any misrepresentation to obtain any public benefit in the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 95.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 95.6, '<input type="checkbox" name="p9_17h" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 95.6, '<input type="checkbox" name="p9_17h" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 102, '<b>18.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> given any U.S. Government officials <b>any</b> information or documentation that was<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;false, fraudulent, or misleading?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 103.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 103, '<input type="checkbox" name="p9_18" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 103, '<input type="checkbox" name="p9_18" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 112, '<b>19.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> lied to any U.S. Government officials to gain entry or admission into the United <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;States or to gain immigration benefits while in the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 113.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 113, '<input type="checkbox" name="p9_19" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 113, '<input type="checkbox" name="p9_19" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(195, 0, 12, 123, 'If you answer “Yes” to <b>Item Numbers 20. - 21.</b> below, provide an explanation in the space provided in <b>Part 14. Additional<br>
Information </b>and see the <b>Specific Instructions by Item Number, Part 9. Additional Information About You</b> of the Instructions for<br>more information.', 0, 1, false, 'L');
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 138, '<b>20.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 138, 'Have you <b>EVER</b> been placed in removal, rescission, or deportation proceedings?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 138.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 138, '<input type="checkbox" name="p9_20" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 138, '<input type="checkbox" name="p9_20" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 145, '<b>21.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 145, 'Have you <b>EVER</b> been removed or deported from the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 145.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 145, '<input type="checkbox" name="p9_21" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 145, '<input type="checkbox" name="p9_21" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(195, 0, 12, 151, 'Federal Law requires nearly all people born as male who are either U.S. citizens or immigrants, 18 through 25 years of age, to register<br>
with Selective Service. See <a href="#"><b>www.sss.gov</b>.</a>', 0, 1, false, 'L');
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 161, '<b>22.a.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 161, 'Are you a person born as a male who lived in the United States at any time between your 18th and 26th<br>
birthdays? (Do not select “Yes” if you were a lawful nonimmigrant for all of that time period.)', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 162.2, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 162, '<input type="checkbox" name="p9_22a" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 162, '<input type="checkbox" name="p9_22a" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 171, '<b>22.b.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 171, ' If you answered “Yes,” to <b>Item Number 22.a.</b>, did you register for the Selective Service?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 171.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 171.5, '<input type="checkbox" name="p9_22b" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 171.5, '<input type="checkbox" name="p9_22b" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 177, '<b>22.c.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 177, ' If you answered “Yes,” to <b>Item Number 22.b.</b>, provide information about your registration.', 0, 1, false, 'L');
//...........
$pdf->writeHTMLCell(0, 0, 20, 183, ' Date Registered (mm/dd/yyyy)', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 67.5, 183, ' Selective Service Number ', 0, 1, false, 'L');
//.............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p9_22c_register_date', 45.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 188);
$pdf->TextField('p9_22c_service_number', 53.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 68.5, 188);
//...............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 196, 'If you answered “No,” to <b>Item Number 22.b</b>. see the <b>Specific Instructions by Item Number, Part 9. Additional Information<br>
About You</b> of the Instructions for more information.', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 12, 206, 'If you answer “Yes” to <b>Item Numbers 23. - 24.</b>, provide an explanation in the space provided in <b>Part 14. Additional Information</b>.', 0, 1, false, 'L');
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 212, '<b>23.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 212, ' Have you <b>EVER</b> left the United States to avoid being drafted in the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 212.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 212.5, '<input type="checkbox" name="p9_23" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 212.5, '<input type="checkbox" name="p9_23" value="N" />', 0, 1, false, false, 'L', false);
//.........................

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 220, '<b>24.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 220, ' Have you <b>EVER</b> applied for any kind of exemption from military service in the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 220.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 220.5, '<input type="checkbox" name="p9_24" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 220.5, '<input type="checkbox" name="p9_24" value="N" />', 0, 1, false, false, 'L', false);
//.........................

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 227, '<b>25.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 20, 227, ' Have you <b>EVER</b> served in the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 227.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 227.5, '<input type="checkbox" name="p9_25" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 227.5, '<input type="checkbox" name="p9_25" value="N" />', 0, 1, false, false, 'L', false);
//.........................
/******************************
 ******** End Page No 9 *******
 ******************************/

/******************************
 ******** Start Page No 10 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 9. Additional Information About You </b> (continued) </div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 27, 'If you answered “No” to <b>Item Number 25</b>., go to <b>Item Number 30.a</b>.', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 33, '<b>26.a.</b>&nbsp;&nbsp;Are you <b>currently</b> a member of the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 33.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 33, '<input type="checkbox" name="p9_26a" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 33, '<input type="checkbox" name="p9_26a" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 39.5, '<b>26.b.</b>&nbsp;&nbsp;If you answered “Yes” to <b>Item Number 26.a.</b>, are you scheduled to deploy outside the United States,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
including to a vessel, within the next 3 months? (Call the Military Help Line at<b> 877-247-4645</b> if you<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
transfer to a new duty station after you file your Form N-400, including if you are deployed outside the<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
United States or to a vessel.)
 ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 40.4, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 40, '<input type="checkbox" name="p9_26b" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 40, '<input type="checkbox" name="p9_26b" value="N" />', 0, 1, false, false, 'L', false);
//..........................

//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 58, '<b>26.c.</b>&nbsp;&nbsp;If you answered “Yes,” to <b>Item Number 26.a</b>., are you <b>currently</b> stationed outside the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 58, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 58, '<input type="checkbox" name="p9_26c" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 58, '<input type="checkbox" name="p9_26c" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 64, '<b>26.d.</b>&nbsp;&nbsp;If you answered “No” to <b>Item Number 26.a</b>., are you a former U.S. military service member who is<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;currently residing outside of the U.S.?', 0, 1, false, 'L');

//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 64.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 64.6, '<input type="checkbox" name="p9_26d" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 64.6, '<input type="checkbox" name="p9_26d" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 75, 'If you answer “Yes” to <b>Item Numbers 27. - 29</b>., provide an explanation in the space provided in <b>Part 14. Additional Information.</b>', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 82, '<b>27.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been court-martialed or have you received a discharge characterized as other than <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;honorable, bad conduct, or dishonorable, while in the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 82.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 82.6, '<input type="checkbox" name="p9_27" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 82.6, '<input type="checkbox" name="p9_27" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 92, '<b>28.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been discharged from training or service in the U.S. armed forces because you were<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;an alien?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 92.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 92.6, '<input type="checkbox" name="p9_28" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 92.6, '<input type="checkbox" name="p9_28" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 101, '<b>29.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> deserted from the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 101.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 101.6, '<input type="checkbox" name="p9_29" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 101.6, '<input type="checkbox" name="p9_29" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 109, 'For <b>Item Numbers 30.a. - 37</b>. see <b>Specific Instructions by Item Number, Part 9. Additional Information About You</b>. If you<br>
answer “Yes” to <b>Item Number 30.a</b>., provide an explanation in the space provided in <b>Part 14. Additional Information</b>.', 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 120, '<b>30.a.</b>&nbsp;&nbsp;Do you now have, or did you <b>EVER</b> have, a hereditary title or an order of<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nobility in any foreign country?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No (skip to <b>Item Number 31</b>.)</div>';
$pdf->writeHTMLCell(140, 1, 142, 120.8, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 135.5, 120.6, '<input type="checkbox" name="p9_30a" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 150, 120.6, '<input type="checkbox" name="p9_30a" value="N" />', 0, 1, false, false, 'L', false);
//............................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 130, '<b>30.b.</b>&nbsp;&nbsp;If you answered “Yes,” to <b>Item Number 30.a.</b>, are you willing to give up any inherited titles or orders', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 136.6, 'of nobility,', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 126.7, 136.6, '(list titles), that you have in a ', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 143, 'foreign country at your naturalization ceremony?', 0, 1, false, 'L');
$pdf->writeHTMLCell(88, 6.7, 38.8, 136, '', 1, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 130.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 130.6, '<input type="checkbox" name="p9_30b" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 130.6, '<input type="checkbox" name="p9_30b" value="N" />', 0, 1, false, false, 'L', false);
//......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 149, "If you answer “'No” to any question except <b>Item Number 33.</b>, see the <b><i>Oath of Allegiance</i></b> section of the Instructions for more<br>information", 0, 1, false, 'L');
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 160, '<b>31.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Do you support the Constitution and form of Government of the United States? ', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 160.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 160.6, '<input type="checkbox" name="p9_31" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 160.6, '<input type="checkbox" name="p9_31" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 167, '<b>32.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Do you understand the full Oath of Allegiance to the United States (see <b>Part 16. Oath of Allegiance</b>)?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 167.7, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 167.6, '<input type="checkbox" name="p9_32" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 167.6, '<input type="checkbox" name="p9_32" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 174, '<b>33.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 174, 'Are you unable to take the Oath of Allegiance because of a physical or developmental disability or<br>
mental impairment? If you answer “Yes,” skip <b>Item Numbers 34. - 37.</b> and see the <b><i>Legal Guardian,<br>
Surrogate, or Designated Representative</i></b> section in the <b>Instructions</b>.', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 176.3, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 176, '<input type="checkbox" name="p9_33" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 176, '<input type="checkbox" name="p9_33" value="N" />', 0, 1, false, false, 'L', false);
//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 189, '<b>34.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 189, 'Are you willing to take the full Oath of Allegiance to the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 189.3, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 189, '<input type="checkbox" name="p9_34" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 189, '<input type="checkbox" name="p9_34" value="N" />', 0, 1, false, false, 'L', false);

//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 195, '<b>35.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 195, 'If the law requires it, are you willing to bear arms (carry weapons) on behalf of the United States?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 195.3, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 195, '<input type="checkbox" name="p9_35" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 195, '<input type="checkbox" name="p9_35" value="N" />', 0, 1, false, false, 'L', false);

//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 202, '<b>36.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 202, 'If the law requires it, are you willing to perform noncombatant services (do something that does not<br>include fighting in a war) in the U.S. armed forces?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 202.3, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 202, '<input type="checkbox" name="p9_36" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 202, '<input type="checkbox" name="p9_36" value="N" />', 0, 1, false, false, 'L', false);

//..........................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(0, 0, 12, 212, '<b>37.</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(0, 0, 21, 212, 'If the law requires it, are you willing to perform work of national importance under civilian direction<br>(do non-military work that the U.S. Government says is important to the country)?', 0, 1, false, 'L');
//....
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 213.3, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 213, '<input type="checkbox" name="p9_37" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 213, '<input type="checkbox" name="p9_37" value="N" />', 0, 1, false, false, 'L', false);

/******************************
 ******** End Page No 10 *******
 ******************************/

/******************************
 ******** Start Page No 11 *****
 ******************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$pdf->writeHTMLCell(138, 6.5, 13, 19, '<b>Part 10. Request for a Fee Reduction </b>', 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 26.4, 'For information about fees, fee waivers, and reduced fees, see Form G-1055, Fee Schedule, at <a href="https://www.uscis.gov/g-1055"><b>www.uscis.gov/g-1055</b></a>. To apply for a<br>reduced fee, complete <b>Item Numbers 1. - 5.b</b>. If you are not eligible for a reduced fee, complete <b>Item Number 1.</b> and proceed to<br><b>Part 11.</b>', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 42, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 42, 'My household income is less than or equal to 400% of the Federal Poverty Guidelines (see Instructions for required<br>documentation).', '', 1, false, 'L');
//.........
$pdf->writeHTMLCell(140, 1, 25.5, 55.5, 'Yes (complete <b>Item Numbers 2. - 5.b</b>.)', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(140, 1, 25.5, 62.5, 'No (skip to <b>Part 11</b>.)', 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 19, 55, '<input type="checkbox" name="p10_1" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 19, 62, '<input type="checkbox" name="p10_1" value="N" />', 0, 1, false, false, 'L', false);
//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 70, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 70, 'Total household income:', '', 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 78, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 78, 'My household size is:', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 85, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 85, 'Total number of household members earning income including yourself: ', '', 1, false, 'L');
//..............

$pdf->writeHTMLCell(197, 5, 12, 92, '<b>5.a.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 92, 'I am the head of household.', '', 1, false, 'L');
//..............

$pdf->writeHTMLCell(197, 5, 12, 99.5, '<b>5.b.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 99.5, 'Name of head of household (if you selected “No” in <b>Item Number 5.a.</b>):', '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_2_household_income', 17, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 187, 76.2);
$pdf->TextField('p10_3_household_size', 17, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 187, 68);
$pdf->TextField('p10_4_household_member', 17, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 187, 84.5);
//....................
$pdf->SetFont('times', '', 10);
$html = '<div>Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(140, 1, 182, 93.3, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(5, 1, 175.5, 93, '<input type="checkbox" name="p10_5a" value="Y" />', 0, 1, false, false, 'L', false);
$pdf->writeHTMLCell(5, 1, 189, 93, '<input type="checkbox" name="p10_5a" value="N" />', 0, 1, false, false, 'L', false);
//.......................
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p10_4_household_head', 79, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 99.5);
//....................
$pdf->SetFont('times', '', 11.6);
$pdf->writeHTMLCell(191, 6.5, 13, 112, "<b>Part 11. Applicant's Contact Information, Certification, and Signature</b>", 1, 1, true, 'L');
$pdf->writeHTMLCell(191, 6.3, 13, 122.5, "<b><i>Applicant's Contact Information</i></b>", '', 1, true, 'L');
//.......................
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 130, 'Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 138, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 138, "Applicant's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 138, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 138, "Applicant's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 152, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 151, "Applicant's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p11_1_applicant_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 143);
$pdf->TextField('p11_1_applicant_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 143);
$pdf->TextField('p11_1_applicant_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 156);
//....................
$pdf->SetFont('times', '', 11.6);
$pdf->writeHTMLCell(191, 6.3, 13, 167, "<b><i>Applicant's Certification and Signature</i></b>", '', 1, true, 'L');
//.............
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 174.4, 'I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with<br>
my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in <b>Part 12.</b>,<br>understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the<br>
information are complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records<br>that USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration law. ', '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 203, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 203, "Applicant's Signature (or signature of a legal guardian, surrogate, or designated<br>representative, if applicable)", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 203, "Date of Signature<br>(mm/dd/yyyy)", '', 1, false, 'L');

//.............
$pdf->writeHTMLCell(133, 6.4, 21, 212.4, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p11_1_applicant_signature_date', 47, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 212.4);
//.............
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 210.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');


/******************************
 ******** End Page No 11 *******
 ******************************/

/******************************
 ******** Start Page No 12 *****
 ******************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 10. Request for a Fee Reduction </b></div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');

//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//...............
$html = '<div><b><i>Interpreter\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 27.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 35, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 35, "Interpreter's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114.6, 35, "Interpreter's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 50, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 50, "Interpreter's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p12_interpreter_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 40);
$pdf->TextField('p12_interpreter_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 40);
$pdf->TextField('p12_interpreter_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 55);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 63.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 71, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 71, "Interpreter's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 71, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 71, "Interpreter's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 84, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 84, "Interpreter's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p12_interpreter_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 76);
$pdf->TextField('p12_interpreter_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 76);
$pdf->TextField('p12_interpreter_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 89);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Interpreter\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 97.6, $html, '', 1, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p12_interpreter_fluent_english', 96.2, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 106, 106);
//.........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 106, 'I certify, under penalty of perjury, that I am fluent in English and', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 202, 106, ", ", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 112, "and I have interpreted every question on the application and Instructions and interpreted the applicant's answers to the questions in that<br>language, and the applicant informed me that they understood every instruction, question, and answer on the application.", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 122.5, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 122.5, "Interpreter's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155, 122.5, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 6.4, 21, 127.5, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p12_interpreter_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 127.5);
//.....................
//........................
$pdf->setFont('Times', '', 12);
$html = '<div><b>Part 13. Contact Information, Certification, and Signature of the Person Preparing this Application, if<br>Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 138, $html, 1, 1, true, 'L');
//...............


$html = '<div><b><i>Preparer\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 154, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 162, '<b>1.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 162, "Preparer's Family Name (Last Name) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 114.6, 162, "Preparer's Given Name (First Name)", '', 1, false, 'L');
// //..............
$pdf->writeHTMLCell(197, 5, 12, 176, '<b>2.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 176, "Preparer's Business or Organization Name", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_family_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 167);
$pdf->TextField('p13_preparer_given_name', 89, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 167);
$pdf->TextField('p13_preparer_business_name', 92, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 181);
//...............
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Contact Information </i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 190.7, $html, '', 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 198, '<b>3.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 198, "Preparer's Daytime Telephone Number ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 112, 198, '<b>4.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 120, 198, "Preparer's Mobile Telephone Number (if any) ", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12, 211, '<b>5.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20, 211, "Preparer's Email Address (if any) ", '', 1, false, 'L');
//..............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_daytime', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 203);
$pdf->TextField('p13_preparer_mobile', 83, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 121, 203);
$pdf->TextField('p13_preparer_email', 87, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 216);

//........................
$pdf->setFont('Times', '', 11.6);
$html = '<div><b><i>Preparer\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 226.6, $html, '', 1, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
//.........
$pdf->setFont('Times', '', 10);

$pdf->writeHTMLCell(197, 5, 12, 234.5, "I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that<br>
all of the responses and information contained in and submitted with the application are complete, true, and correct and reflects only<br>
information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand<br>
the responses and information in or submitted with the application.", '', 1, false, 'L');
//..............
$pdf->writeHTMLCell(197, 5, 12,253, '<b>6.</b>', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 20,253, "Preparer's Signature", '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 155,253, "Date of Signature (mm/dd/yyyy)", '', 1, false, 'L');
//.............
$pdf->writeHTMLCell(133, 7, 21, 259, "", 1, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p13_preparer_signature_date', 48, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 258.2);
//.............
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 125.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');//.............
$pdf->writeHTMLCell(82, 7, 12, 257, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

/******************************
 ******** End Page No 12 *******
 ******************************/

/******************************
 ******** Start Page No 13 *****
 ******************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 14. Additional Information  </b></div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.<br>
Type or print your name and A-Number at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item Number</b> to<br>
which your answer refers; and sign and date each sheet. ', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 96.5, 46, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 156, 46, 'Middle (if applicable)', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_family_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('p14_additional_info_given_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 51);
$pdf->TextField('p14_additional_info_middle_name', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 157, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 47, 60, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 74, 60, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_3a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 65);
$pdf->TextField('p14_additional_info_3b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 65);
$pdf->TextField('p14_additional_info_3c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 65);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_3d', 183, 27, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 21, 74);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.3, 75, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 88.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 95, '', "B", 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 103.4, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 47, 103.4, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 74, 103.4, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_4a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 108.4);
$pdf->TextField('p14_additional_info_4b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 108.4);
$pdf->TextField('p14_additional_info_4c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 108.4);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_4d', 183, 27, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 21, 117.4);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.3, 118, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 124.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 131, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 138, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 146.4, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 47, 146.4, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 74, 146.4, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_5a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 151.4);
$pdf->TextField('p14_additional_info_5b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 151.4);
$pdf->TextField('p14_additional_info_5c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 151.4);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_5d', 183, 32, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 21, 160.4);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(182.5, 1, 21.3, 161, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 168, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 174, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 180.6, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 186.6, '', "B", 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 193.5, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 47, 193.5, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 74, 193.5, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p14_additional_info_6a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 198.4);
$pdf->TextField('p14_additional_info_6b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 48, 198.4);
$pdf->TextField('p14_additional_info_6c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 75, 198.4);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p14_additional_info_6d', 183, 32, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 21, 207.44);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(182.5, 1, 21.3, 208, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 214.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 221, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 227, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(182.5, 1, 21.3, 233, '', "B", 1, false, 'L');
//..............
$pdf->writeHTMLCell(191, 11, 13, 241.5, '', '1', 1, false, 'L');
$pdf->setFont('Times', 'B', 11.6);
$pdf->writeHTMLCell(191, 11, 21.5, 243, 'Do not complete Parts 15. or 16. until the USCIS officer instructs you to do so at the interview.', '', 1, false, 'L');

/******************************
 ******** End Page No 13 ******
 ******************************/

/******************************
 ******** Start Page No 14 ****
 ******************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 15. Signature at Interview </b></div>';
$pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
//............
$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 6.5, 159, 19, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 26.4, 'I swear (affirm) and certify under penalty of perjury under the laws of the United States of America that I know that the contents of<br>
this Form N-400, Application for Naturalization, subscribed by me, including corrections, are complete, true, and correct. The<br>evidence submitted by me are complete, true, and correct', '', 1, false, 'L');
//..........
$pdf->writeHTMLCell(197, 5, 12, 41, 'Subscribed to and sworn to (affirmed) before me', '', 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p15_name_or_stamp', 133, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 45.7);
$pdf->TextField('p15_date_of_signature', 54, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 45.7);
//...........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 48, 52, 'USCIS Officer\'s Printed Name or Stamp', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 153.5, 52, 'Date of Signature (mm/dd/yyyy)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 61, 'Applicant\'s Signature', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 112.5, 61, 'USCIS Officer\'s Signature', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(98, 6.5, 13, 66, '', 1, 1, false, 'L');
$pdf->writeHTMLCell(90.5, 6.5, 113.5, 66, '', 1, 1, false, 'L');
//..........
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 16. Oath of Allegiance</b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 77, $html, 1, 1, true, 'L');
//........
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 85, 'If your application is approved, you will be scheduled for a naturalization ceremony at which time you will be required to take the<br>
following Oath of Allegiance immediately prior to becoming a naturalized citizen. By signing below you acknowledge your<br>
willingness to take this Oath:', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 100, 'I hereby declare on oath, that I absolutely and entirely renounce and abjure all allegiance and fidelity to any foreign prince, potentate,<br>
state, or sovereignty, of whom or which I have heretofore been a subject or citizen;', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 111, 'that I will support and defend the Constitution and laws of the United States of America against all enemies, foreign, and domestic;', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 117, 'that I will bear true faith and allegiance to the same; ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 123, 'that I will bear arms on behalf of the United States when required by the law; ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 129, 'that I will perform noncombatant service in the armed forces of the United States when required by the law; ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 135, 'that I will perform work of national importance under civilian direction when required by the law; and ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 141, 'that I take this obligation freely, without any mental reservation or purpose of evasion; so help me God.', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 12, 150, 'Applicant\'s Signature', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 147.5, 150, 'Date of Signature (mm/dd/yyyy)', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(133, 6.5, 13, 155, '', 1, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p16_date_signature', 55.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148.5, 155);

/******************************
 ******** End Page No 14 *******
 ******************************/
















$js = "
var fields = {
	'9_digit_a_number':' ',
	'p1_d_combobox':' " . showData('') . "',
	'other_explain_g':' " . showData('information_about_you_eligibility_reason_not_listed_value') . "',
	'legal_last_name':' " . showData('information_about_you_current_family_last_name') . "',
	'legal_first_name':' " . showData('information_about_you_current_given_first_name') . "',
	'legal_middle_name':' " . showData('information_about_you_current_middle_name') . "',
	'other_name_last_name1':' " . showData('information_about_you_other_family_last_name') . "',
	'other_name_first_name1':' " . showData('information_about_you_other_given_first_name') . "',
	'other_name_middle_name1':' " . showData('information_about_you_other_middle_name') . "',
	'other_name_last_name2':' " . showData('information_about_you_other_family_last_name2') . "',
	'other_name_first_name2':' " . showData('information_about_you_other_given_first_name2') . "',
	'other_name_middle_name2':' " . showData('information_about_you_other_middle_name2') . "',
//page 1 end.....

	'legally_change_name_last_name':' " . showData(' ') . "',
	'legally_change_name_first_name':' " . showData(' ') . "',
	'legally_change_name_middle_name':' " . showData('') . "',
	'p2_4_uscis_online_acount_number':' " . showData('') . "',
	'p2_date_of_birth':' " . showData(' ') . "',
	'p2_permanent_resident_date_of_birth':' " . showData(' ') . "',
	'p2_country_of_birth':' " . showData(' ') . "',
	'p2_country_of_nationality':' " . showData(' ') . "',
	'p2_Social_Security_number':' " . showData(' ') . "',
//page 2 end.....
	'p3_height_feet':' " . showData('') . "',
	'p3_height_inch':' " . showData('') . "',
	'p3_Pounds1':' " . showData('') . "',
	'p3_Pounds2':' " . showData('') . "',
	'p3_Pounds3':' " . showData('') . "',

	'p4_1_incare_name':' " . showData('') . "',
	'p4_1_street_name':' " . showData('') . "',
	'p4_1_state_number':' " . showData('') . "',
	'p4_1_city_town':' " . showData('') . "',
    'p4_1_state1':' " . showData('') . "',
	'p4_1_zip_code':' " . showData('') . "',
	'p4_1_province':' " . showData('') . "',
	'p4_1_postal_code':' " . showData('') . "',
	'p4_1_country':' " . showData('') . "',

	'p4_date_of_residence_from_date':' " . showData('') . "',
	'p4_date_of_residence_to_date':' " . showData('') . "',

	'p4_1_physical_adress_1':' " . showData('') . "',
	'p4_1_physical_adress_2':' " . showData('') . "',
	'p4_1_physical_adress_3':' " . showData('') . "',

	'p4_1_city_town_1':' " . showData('') . "',
	'p4_1_city_town_2':' " . showData('') . "',
	'p4_1_city_town_3':' " . showData('') . "',

	'p4_1_state_province_1':' " . showData('') . "',
	'p4_1_state_province_2':' " . showData('') . "',
	'p4_1_state_province_3':' " . showData('') . "',

	'p4_1_zip_code_1':' " . showData('') . "',
	'p4_1_zip_code_2':' " . showData('') . "',
	'p4_1_zip_code_3':' " . showData('') . "',

	'p4_1_country_1':' " . showData('') . "',
	'p4_1_country_2':' " . showData('') . "',
	'p4_1_country_3':' " . showData('') . "',

	'p4_1_from_date_1':' " . showData('') . "',
	'p4_1_from_date_2':' " . showData('') . "',
	'p4_1_from_date_3':' " . showData('') . "',

	'p4_1_to_date_1':' " . showData('') . "',
	'p4_1_to_date_2':' " . showData('') . "',
	'p4_1_to_date_3':' " . showData('') . "',

//page 3 end..............

	'p4_1_incare_name2':' " . showData('') . "',
	'p4_1_street_name2':' " . showData('') . "',
	'p4_1_state_number2':' " . showData('') . "',
	'p4_1_city_town2':' " . showData('') . "',
    'p4_1_state2':' " . showData('') . "',
	'p4_1_zip_code2':' " . showData('') . "',
	'p4_1_province2':' " . showData('') . "',
	'p4_1_postal_code2':' " . showData('') . "',
	'p4_1_country2':' " . showData('') . "',

	'p5_3_how_many_times_married':' " . showData('') . "',

	'p5_4a_legal_last_name':' " . showData('') . "',
	'p5_4a_legal_first_name':' " . showData('') . "',
	'p5_4a_legal_middle_name':' " . showData('') . "',
	'p5_4b_date_of_birth':' " . showData('') . "',
	'p5_4c_current_spouse_date':' " . showData('') . "',
	'p5_5b_us_citizen_date':' " . showData('') . "',

//page 4 end.......

	'p5_6_a_number':' " . showData('') . "',
	'p6_1_total_children':' " . showData('') . "',
	'p5_7_item_number':' " . showData('') . "',
	'p5_8_current_employer':' " . showData('') . "',
	'p6_1_under_18':' " . showData('') . "',

	'p6_2_childs_name1':' " . showData('') . "',
	'p6_2_childs_name2':' " . showData('') . "',
	'p6_2_childs_name3':' " . showData('') . "',

	'p6_2_date_of_birth1':' " . showData('') . "',
	'p6_2_date_of_birth2':' " . showData('') . "',
	'p6_2_date_of_birth3':' " . showData('') . "',

	'p6_2_residence1':' " . showData('') . "',
	'p6_2_residence2':' " . showData('') . "',
	'p6_2_residence3':' " . showData('') . "',

	'p6_2_relationship1':' " . showData('') . "',
	'p6_2_relationship2':' " . showData('') . "',
	'p6_2_relationship3':' " . showData('') . "',
	
	'p7_1_name1':' " . showData('') . "',
	'p7_1_name2':' " . showData('') . "',
	'p7_1_name3':' " . showData('') . "',

	'p7_1_city_town1':' " . showData('') . "',
	'p7_1_city_town2':' " . showData('') . "',
	'p7_1_city_town3':' " . showData('') . "',

	'p7_1_state1':' " . showData('') . "',
	'p7_1_state2':' " . showData('') . "',
	'p7_1_state3':' " . showData('') . "',

	'p7_1_zip_code1':' " . showData('') . "', 
	'p7_1_zip_code2':' " . showData('') . "', 
	'p7_1_zip_code3':' " . showData('') . "', 

	'p7_1_country1':' " . showData('') . "', 
	'p7_1_country2':' " . showData('') . "', 
	'p7_1_country3':' " . showData('') . "', 

	'p7_1_from_date_1':' " . showData('') . "', 
	'p7_1_from_date_2':' " . showData('') . "', 
	'p7_1_from_date_3':' " . showData('') . "', 

	'p7_1_to_date_1':' PRESENT', 
	'p7_1_to_date_2':' " . showData('') . "', 
	'p7_1_to_date_3':' " . showData('') . "', 

	'p7_1_occupation1':' " . showData('') . "', 
	'p7_1_occupation2':' " . showData('') . "', 
	'p7_1_occupation3':' " . showData('') . "', 

//page 5 end.......

	'p8_1_left_us_date_1':' " . showData('') . "', 
	'p8_1_left_us_date_2':' " . showData('') . "', 
	'p8_1_left_us_date_3':' " . showData('') . "', 
	'p8_1_left_us_date_4':' " . showData('') . "', 
	'p8_1_left_us_date_5':' " . showData('') . "', 
	'p8_1_left_us_date_6':' " . showData('') . "', 

	'p8_1_return_us_date_1':' " . showData('') . "', 
	'p8_1_return_us_date_2':' " . showData('') . "', 
	'p8_1_return_us_date_3':' " . showData('') . "', 
	'p8_1_return_us_date_4':' " . showData('') . "', 
	'p8_1_return_us_date_5':' " . showData('') . "', 
	'p8_1_return_us_date_6':' " . showData('') . "', 

	'p8_1_traveled_country1':' " . showData('') . "', 
	'p8_1_traveled_country2':' " . showData('') . "', 
	'p8_1_traveled_country3':' " . showData('') . "', 
	'p8_1_traveled_country4':' " . showData('') . "', 
	'p8_1_traveled_country5':' " . showData('') . "', 
	'p8_1_traveled_country6':' " . showData('') . "', 

//page 6 end.......

	'p9_15b_crime_1':' " . showData('') . "', 
	'p9_15b_crime_2':' " . showData('') . "', 
	'p9_15b_crime_3':' " . showData('') . "', 
	'p9_15b_crime_4':' " . showData('') . "', 
	'p9_15b_crime_5':' " . showData('') . "', 

	'p9_15b_date_of_crime_1':' " . showData('') . "', 
	'p9_15b_date_of_crime_2':' " . showData('') . "', 
	'p9_15b_date_of_crime_3':' " . showData('') . "', 
	'p9_15b_date_of_crime_4':' " . showData('') . "', 
	'p9_15b_date_of_crime_5':' " . showData('') . "', 

	'p9_15b_conviction_date_1':' " . showData('') . "', 
	'p9_15b_conviction_date_2':' " . showData('') . "', 
	'p9_15b_conviction_date_3':' " . showData('') . "', 
	'p9_15b_conviction_date_4':' " . showData('') . "', 
	'p9_15b_conviction_date_5':' " . showData('') . "', 

	'p9_15b_place_of_crime_1':' " . showData('') . "', 
	'p9_15b_place_of_crime_2':' " . showData('') . "', 
	'p9_15b_place_of_crime_3':' " . showData('') . "', 
	'p9_15b_place_of_crime_4':' " . showData('') . "', 
	'p9_15b_place_of_crime_5':' " . showData('') . "', 

	'p9_15b_arrest_result_1':' " . showData('') . "', 
	'p9_15b_arrest_result_2':' " . showData('') . "', 
	'p9_15b_arrest_result_3':' " . showData('') . "', 
	'p9_15b_arrest_result_4':' " . showData('') . "', 
	'p9_15b_arrest_result_5':' " . showData('') . "', 

	'p9_15b_your_sentence_1':' " . showData('') . "', 
	'p9_15b_your_sentence_2':' " . showData('') . "', 
	'p9_15b_your_sentence_3':' " . showData('') . "', 
	'p9_15b_your_sentence_4':' " . showData('') . "', 
	'p9_15b_your_sentence_5':' " . showData('') . "', 

//page 8 end.......

	'p9_22c_register_date':' " . showData('') . "', 
	'p9_22c_service_number':' " . showData('') . "', 

//page 9 end.......


	'p10_2_household_income':' " . showData('') . "', 
	'p10_3_household_size':' " . showData('') . "', 
	'p10_4_household_member':' " . showData('') . "', 
	'p10_4_household_head':' " . showData('') . "',

	'p11_1_applicant_daytime':' " . showData('') . "', 
	'p11_1_applicant_mobile':' " . showData('') . "', 
	'p11_1_applicant_email':' " . showData('') . "', 
	'p11_1_applicant_signature_date':' " . showData('') . "', 
//page 11 end.......

	'p12_interpreter_family_name':' " . showData('') . "', 
	'p12_interpreter_given_name':' " . showData('') . "', 
	'p12_interpreter_business_name':' " . showData('') . "', 
	'p12_interpreter_daytime':' " . showData('') . "', 
	'p12_interpreter_mobile':' " . showData('') . "', 
	'p12_interpreter_email':' " . showData('') . "', 
	'p12_interpreter_fluent_english':' " . showData('') . "', 
	'p12_interpreter_signature_date':' " . showData('') . "', 

	'p13_preparer_family_name':' " . showData('') . "', 
	'p13_preparer_given_name':' " . showData('') . "', 
	'p13_preparer_business_name':' " . showData('') . "', 
	'p13_preparer_daytime':' " . showData('') . "', 
	'p13_preparer_mobile':' " . showData('') . "', 
	'p13_preparer_email':' " . showData('') . "', 
	'p13_preparer_fluent_english':' " . showData('') . "', 
	'p13_preparer_signature_date':' " . showData('') . "', 











//page 13.......

	'p14_additional_info_family_name':' " . showData('') . "', 
	'p14_additional_info_given_name':' " . showData('') . "', 
	'p14_additional_info_middle_name':' " . showData('') . "', 

	'p14_additional_info_3a':' " . showData('') . "', 
	'p14_additional_info_3b':' " . showData('') . "', 
	'p14_additional_info_3c':' " . showData('') . "', 
	
	'p14_additional_info_4a':' " . showData('') . "', 
	'p14_additional_info_4b':' " . showData('') . "', 
	'p14_additional_info_4c':' " . showData('') . "', 
	
	'p14_additional_info_5a':' " . showData('') . "', 
	'p14_additional_info_5b':' " . showData('') . "', 
	'p14_additional_info_5c':' " . showData('') . "', 

	'p14_additional_info_6a':' " . showData('') . "', 
	'p14_additional_info_6b':' " . showData('') . "', 
	'p14_additional_info_6c':' " . showData('') . "', 


//page 14.......

	'p15_name_or_stamp':' " . showData('') . "', 
	'p15_date_of_signature':' " . showData('') . "', 
	'p16_date_signature':' " . showData('') . "', 








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


// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('Form n_400.pdf', 'I');
