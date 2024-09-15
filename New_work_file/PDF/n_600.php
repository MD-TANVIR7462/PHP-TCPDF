<?php

 require_once('formheader.php');   //database connection file 
// require_once("config.php");

// Include the main TCPDF library (search for installation path).

require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF
{
	//Page header
	public function Header()
	{
		$this->SetY(10);
		if ($this->page > 1) {
			$this->SetLineWidth(2); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255, 255, 255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 12, false, 'T', 'C');

			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255, 255, 255); // set filling color
			$this->MultiCell(191.8, 0, '', 'T', 1, 'C', 1, 12, 14, false, 'T', 'C');
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
		$this->Cell(190, 4, '', $header_top_border, 1, 1);

		// Set font
		$this->SetFont('times', '', 9);
		$this->Cell(40, 8, "Form N-600  Edition  04/01/24", 0, 0, 'L');


		// if ($this->page == 1){
		$barcode_image = "images/n600/n-600-footer-pdf417-$this->page.png";
		// )
		$this->Image($barcode_image, 68, 268, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

		// $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);


		
		if ($this->page <= 9) {
			$this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 156, 267.5, true);
		} else {
			$this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 154.2, 267.5, true);
		}

	}
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form N-600, Application for Certificate of Citizenship');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(13, 17, 13, true);


// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set a barcode on the page footer
// $pdf->setBarcode(date('Y-m-d H:i:s'));

/********************************
 ******** Start Page No 1 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 1

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
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(100, 7, "Application for Certificate of Citizenship", 0, 'C', 0, 1, 58, 9, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm N-600", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0057\n Expires 02/28/2027", 0, 'C', 0, 1, 169, 18.5, true);
$pdf->Ln(1.3);

$top_border = array(
	'T' => array('width' => 2, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'square'),
);

$pdf->Cell(189, 0, '', $top_border, 1, 1);


$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0, 0, 0); // set color for cell border
$pdf->SetFillColor(255, 255, 255); // set filling color
$pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12, 30.65, false, 'T', 'C');

// $pdf->Ln(1);
// set filling color
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->MultiCell(13, 37, "For\nUSCIS\nUse\nOnly", 'LTB', 'C', 1, 1, 12.8, 32.5, true);

$pdf->SetFont('times', 'B', 9); // set font
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(35, 26, "Date Stamp", 'LTB', 'C', 1, 1, 25.7, 32.5, true);
$pdf->MultiCell(74, 26, "Receipt", 'LTB', 'C', 1, 1, 59.7, 32.5, true);
$pdf->MultiCell(69, 26, "Action Block", 'LTB', 'C', 1, 1, 133, 32.5, true);
$pdf->MultiCell(3, 26, "", 'TRB', 'C', 1, 1, 200, 32.5, true);

$pdf->setCellPaddings(1, 0, 0, 0); // set cell padding
$pdf->MultiCell(177.4, 10.5, "Remarks", 'LRB', 'L', 1, 1, 25.6, 59, true);

$pdf->Ln(1.5);

$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>START HERE - Type or print in black ink.</b></div>';

// output the HTML content

$pdf->writeHTMLCell(91, 7, 17, 91, $html, 0, 0, true, false, 'L', false);
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 136, false); // angle 1
$pdf->StopTransform();

//..........

// table 2 start 
$pdf->SetFillColor(220, 220, 220);
$pdf->writeHTMLCell(190, 18, 13, 72, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(1, 18, 56, 72, '',  'R',  1, false, true, 'L', false);
$html = "<div><b>To be completed by an attorney or accredited representative </b>(if any).</div>";
$pdf->writeHTMLCell(43.2, 17.3, 13.4, 72.2, $html, 0, 1, true, true, 'C', true);
//..........

$pdf->SetFont('times', 'B', 10.4);
if (showData('n_600_g28_status') == "Y") $g_28 = "checked";else $g_28 = "";
$html = '<div> <input type="checkbox" name="agree" value="1" checked="' . $g_28 . '" />  Select this box if Form G-28 is <br> attached.</div>';
$pdf->writeHTMLCell(40, 18, 53, 72, $html, 'R', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b> Attorney State Bar Number </b><br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 18, 93, 72, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 81);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 140, 72, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 81);

//....table 2 end .........
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b> Part 1. Information About Your Eligibility</b></div>';
$pdf->writeHTMLCell(135, 7, 13, 97, $html, 1, 1, true, false, 'L', true);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(50, 7, "Enter Your 9 Digit A-Number:", 0, 'L', 0, 1, 155, 93, true);
$pdf->Image('images/right_angle.jpg', 155, 99, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //for 9 Digit a number
$pdf->MultiCell(30, 7, "A-", 0, 'C', 0, 1, 148, 99, true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('digit_a_number', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 166, 98);

//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.  </b> &nbsp; This application is being filed based on the fact that: (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(180, 7, 12, 105, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 14); //for checkbox

if (showData('information_about_you_application_filed_status') == "biological") $checked = "checked";else $checked = "";
$checkbox = '<div><input type="checkbox" name="application" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(180, 7, 20, 113, $checkbox, 0, 1, false, true, 'L', true);
if (showData('information_about_you_application_filed_status') == "adopted") $checked = "checked";else $checked = "";
$checkbox = '<div><input type="checkbox" name="application1"  value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(180, 7, 105, 113, $checkbox, 0, 1, false, true, 'L', true);
if (showData('information_about_you_application_filed_status') == "other") $checked = "checked";else $checked = "";
$checkbox = '<div><input type="checkbox" name="application2" value="Y" checked="' . $checked . '" /></div>';
$pdf->writeHTMLCell(180, 7, 20, 121, $checkbox, 0, 1, false, true, 'L', true);
//check box end 

$pdf->SetFont('times', '', 10);
$html = '<div>I am a BIOLOGICAL child of a U.S. citizen parent.</div>';
$pdf->writeHTMLCell(100, 7, 28, 113, $html, 0, 1, false, false, 'L', true);

$html = '<div>I am an ADOPTED child of a U.S. citizen parent.</div>';
$pdf->writeHTMLCell(100, 7, 113, 113, $html, 0, 1, false, false, 'L', true);

$html = '<div>Other (Explain fully): </div>';
$pdf->writeHTMLCell(100, 7, 28, 121, $html, 0, 1, false, false, 'L', true);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('application_other_explain', 143, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 60, 121);
//.....
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> If you need extra space to complete this section, use the space provided in<b> Part 11. Additional Information.</b> </div>';
$pdf->writeHTMLCell(180, 7, 20, 129, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b> Part 2. Information About You</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 138, $html, 1, 1, true, false, 'J', true);
//.....
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>NOTE:</b> Provide information about yourself if you are a person applying for the Certificate of Citizenship. <b>Provide information
about your child</b> if you are a U.S. citizen parent applying for a Certificate of Citizenship for your minor child.</div>';
$pdf->writeHTMLCell(180, 7, 13, 146, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(1.1);
$html = '&nbsp;<b>1.</b> &nbsp;&nbsp;&nbsp;Your Current Legal Name (<b>do not</b> provide a nickname)';
$pdf->writeHTML($html, true, false, true, false, ''); // output the HTML content

$pdf->Ln(1.1);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 22, 161, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 160, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 160, $html, 0, 0, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_legal_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 166);
$pdf->TextField('about_you_legal_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 166);
$pdf->TextField('about_you_legal_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 166);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp;Your Name Exactly As It Appears on Your Permanent Resident Card (if applicable)';
$pdf->writeHTMLCell(180, 7, 12, 174, $html, 0, 0, false, false, 'L', true);

$pdf->Ln(1);
$pdf->SetFillColor(255, 255, 255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 22, 177, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 177, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 177, $html, 0, 0, false, false, 'L', true);

$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_exact_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 183);
$pdf->TextField('about_you_exact_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 183);
$pdf->TextField('about_you_exact_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 183);
//...........


$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. </b>  Other Names You Have Used Since Birth <br> &nbsp;&nbsp;&nbsp; Provide all other names you have ever used, include nicknames, maiden name, and aliases.';
$pdf->writeHTMLCell(170, 7, 12, 195, $html, 0, 0, false, false, 'L', true);


$pdf->Ln(1.1);
$pdf->SetFillColor(255, 255, 255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 21, 202, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 97, 202, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 202, $html, 0, 0, true, false, 'L', true);
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_since_birth_last_name1', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 208);
$pdf->TextField('about_you_since_birth_first_name1', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 208);
$pdf->TextField('about_you_since_birth_middle_name1', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 208);

$pdf->TextField('about_you_since_birth_last_name2', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 214.7);
$pdf->TextField('about_you_since_birth_first_name2', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 214.7);
$pdf->TextField('about_you_since_birth_middle_name2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 214.7);

//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. </b> U.S. Social Security Number (if any)';
$pdf->writeHTMLCell(80, 7, 12, 225, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_us_social_security_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 229);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. </b> USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(80, 7, 90, 225, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_us_online_account_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 102, 229);
//.......

$pdf->Image('images/right_angle.jpg', 17, 231, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //for U.S social
$pdf->Image('images/right_angle.jpg', 98, 231, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //for U.S online


//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.  </b>  Date of Birth(mm/dd/yyyy)';
$pdf->writeHTMLCell(80, 7, 12, 238, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_date_of_birth', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 17, 242);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.  </b>   Country of birth';
$pdf->writeHTMLCell(80, 7, 85, 238, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_country_of_birth', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 90, 242);
//.......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.  </b>  Country of Prior Citizenship or Nationality';
$pdf->writeHTMLCell(80, 7, 12, 250, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_country_of_prior_citizenship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 255);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.  </b>   Gender ';
$pdf->writeHTMLCell(80, 7, 100, 250, $html, 0, 0, false, false, 'L', true);

$pdf->SetFont('times', '', 14); // for checkbox
if (showData('other_information_about_you_gender') == "male") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="gender" value="male" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(50, 7, 105, 255, $checkbox, 0, 1, false, true, 'L', 0);
if (showData('other_information_about_you_gender') == "female") $checked = "checked";
else $checked = "";
$checkbox = '<input type="checkbox" name="gender" value="female" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(50, 7, 123, 255, $checkbox, 0, 1, false, true, 'L', 0);

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(50, 7, 111, 256, 'Male', 0, 1, false, true, 'L', 0);
$pdf->writeHTMLCell(50, 7, 129, 256, 'Female', 0, 1, false, true, 'L', 0);

/********************************
 ******** End Page No 1 **********
 *********************************/

/********************************
 ******** Start Page No 2 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 2
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 0); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 2. Information About You  </b> (continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(18, 7, 155, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 161, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);
$pdf->setCellPaddings(0, 0, 0, 0); // reseting cell pading 
//.....

$pdf->setFont('Times', '', 10);
$html = '<div><b>10. </b> Mailing Address </div>';
$pdf->writeHTMLCell(110, 7, 13, 27, $html, 0, 1, false, 'L');
$html = '<div>In Care Of Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 20, 33, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_in_care_of', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 38);


$pdf->setFont('Times', '', 10);
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 20, 47, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_street_number', 142, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 51);
$pdf->setFont('Times', '', 10);
$html = '<div>Apt. &nbsp; Ste. &nbsp; Flr. &nbsp;Number </div>';
$pdf->writeHTMLCell(90, 7, 165, 47, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

if (showData('information_about_you_us_mailing_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('information_about_you_us_mailing_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$pdf->setFont('Times', '', 14); // for checkbox
$checkbox = '<div>  <input type="checkbox" name="apt" value="apt" checked="' . $checked_apt . '" /></div>';
$pdf->writeHTMLCell(20, 7, 163, 52, $checkbox, 0, 1, false, 'L');

$checkbox = '<div>  <input type="checkbox" name="ste" value="ste" checked="' . $checked_ste . '" /></div>';
$pdf->writeHTMLCell(20, 7, 170, 52, $checkbox, 0, 1, false, 'L');

$checkbox = '<div>  <input type="checkbox" name="flr" value="flr" checked="' . $checked_flr . '" /></div>';
$pdf->writeHTMLCell(20, 7, 177, 52, $checkbox, 0, 1, false, 'L');
// end checkbox
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_apt_ste_flr_value', 16, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 188, 51);

//.................
$pdf->setFont('Times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 59, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 150, 59, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 177, 60, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(10, 7, 190, 65, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_city_town', 128, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 64);

$pdf->setFont('courier', 'B', 10);

$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_10_state", 25, 7, $Options, array(), array(), 150, 64);



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_zipcode', 13.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 177, 64);

$pdf->TextField('part2_information_about_you_zipcode1', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 192.6, 64);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html = '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 72, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_foreign_region', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 77);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 80, 72, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 80, 77);

//.....................
$pdf->setFont('Times', '', 10);
$html = '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 133, 72, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_foreign_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 133, 77);

//.......................
$pdf->setFont('Times', '', 10);
$html = '<div><b>11. </b> &nbsp; Physical Address</div>';
$pdf->writeHTMLCell(110, 7, 12, 85, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div>Street Number and Name (Do <b>not</b> provide a PO Box in this space unless it is your <b>ONLY</b> address.)</div>';
$pdf->writeHTMLCell(150, 7, 20, 90, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part2_physical_address_street_number', 140, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 95);
$pdf->setFont('Times', '', 10);
$html = '<div>Apt. &nbsp; Ste. &nbsp; Flr. &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 165, 90, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

$pdf->setFont('Times', '', 14); //for checkbox
if (showData('information_about_you_home_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('information_about_you_home_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('information_about_you_home_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$checkbox = '<div>  <input type="checkbox" name="apt1" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 163, 95, $checkbox, 0, 1, false, 'L');

$checkbox = '<div>  <input type="checkbox" name="ste1" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 170, 95, $checkbox, 0, 1, false, 'L');

$checkbox = '<div>  <input type="checkbox" name="flr1" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 177, 95, $checkbox, 0, 1, false, 'L');
//for checkbox
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_address_apt_ste_flr_value', 16, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 188, 94);
//.................

$pdf->setFont('Times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 103, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 150, 103, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 177, 103, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(10, 7, 190, 109, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_physical_city_town', 128, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 108);


$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_11_state", 25, 7, $Options, array(), array(), 150, 108);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_zipcode', 13.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 177, 108);

$pdf->TextField('part2_information_about_physical_zipcode1', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 193, 108);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html = '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 117, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_foreign_region', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 122);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 80, 117, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 80, 122);

//.....................
$pdf->setFont('Times', '', 10);
$html = '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 133, 117, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_foreign_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 133, 122);

//........

$pdf->setFont('Times', '', 10);
$html = '<div><b>12. </b> &nbsp; Current Marital Status</div>';
$pdf->writeHTMLCell(110, 7, 12, 130, $html, 0, 1, false, 'L');
// for checkbox label 
$pdf->writeHTMLCell(50, 7, 27, 136, 'Single,Never Married', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 69, 136, 'Married', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 91, 136, 'Divorced', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 113, 136, 'Widowed', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 137, 136, 'Separated', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 161, 136, 'Marriage Annulled', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 27, 144, 'Other (Explain) :', 0, 1, false, true, 'L');

if (showData('other_information_about_you_marital_status') == "single") $checked_single = "checked";else $checked_single = "";
if (showData('other_information_about_you_marital_status') == "married") $checked_married = "checked";else $checked_married = "";
if (showData('other_information_about_you_marital_status') == "divorced") $checked_divorced = "checked";else $checked_divorced = "";
if (showData('other_information_about_you_marital_status') == "widowed") $checked_widowed = "checked";else $checked_widowed = "";
if (showData('other_information_about_you_marital_status') == "separated") $checked_separated = "checked";else $checked_separated = "";
if (showData('other_information_about_you_marital_status') == "annulled") $checked_annulled = "checked";else $checked_annulled = "";
if (showData('other_information_about_you_marital_status') == "other") $checked_other = "checked";else $checked_other = "";


$pdf->setFont('Times', '', 14); // for checkbox
$checkbox = '<input type="checkbox" name="single"  value="single" checked="' . $checked_single . '"/>';
$pdf->writeHTMLCell(30, 7, 20, 135, $checkbox, 0, 1, false, true, 'L');

$checkbox = '<input type="checkbox" name="married" value="married" checked="' . $checked_married . '"/>';
$pdf->writeHTMLCell(30, 7, 62, 135, $checkbox, 0, 1, false, true, 'L');

$checkbox = '<input type="checkbox" name="divorced" value="divorced" checked="' . $checked_divorced . '"/>';
$pdf->writeHTMLCell(30, 7, 84, 135, $checkbox, 0, 1, false, true, 'L');

$checkbox = '<input type="checkbox" name="widowed" value="widowed" checked="' . $checked_widowed . '"/>';
$pdf->writeHTMLCell(30, 7, 106, 135, $checkbox, 0, 1, false, true, 'L');

$checkbox = '<input type="checkbox" name="separated" value="separated" checked="' . $checked_separated . '"/>';
$pdf->writeHTMLCell(30, 7, 130, 135, $checkbox, 0, 1, false, true, 'L');

$checkbox = '<input type="checkbox" name="marriageannuled" value="marriageannuled" checked="' . $checked_annulled . '"/>';
$pdf->writeHTMLCell(30, 7, 154, 135, $checkbox, 0, 1, false, true, 'L');

$checkbox = '<input type="checkbox" name="other" value="other" checked="' . $checked_other . '"/>';
$pdf->writeHTMLCell(30, 7, 20, 143, $checkbox, 0, 1, false, true, 'L');

// end check box 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('marital_other_explain', 152, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 51, 143);

//.....

$pdf->setFont('Times', '', 10);
$html = '<div><b>13. </b> &nbsp;  U.S. Armed Forces </div>';
$pdf->writeHTMLCell(110, 7, 12, 150, $html, 0, 1, false, 'L');
$html = '<div>Are you a member or veteran of any branch of the U.S. Armed Forces?</div>';
$pdf->writeHTMLCell(180, 7, 20, 157, $html, 0, 1, false, true, 'J');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_us_armed_force_status') == "Y") $checked = "checked";else $checked = "";
$html = '<div><input type="checkbox" name="us_army" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 157, $html, 0, 1, false, true, 'L');
if (showData('information_about_you_us_armed_force_status') == "N") $checked = "checked";else $checked = "";
$html = '<div><input type="checkbox" name="us_army" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 157, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 158, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 158, 'No', 0, 1, false, true, 'L');
//..........

$html = '<div><b>14. </b> &nbsp;  Information About Your Admission into the United States and Current Immigration Status </div>';
$pdf->writeHTMLCell(170, 7, 12, 164, $html, 0, 1, false, 'L');
$html = '<div><b>A.  </b>   I arrived in the following manner <br><br>&nbsp; &nbsp;&nbsp; &nbsp; Port-of-Entry</div>';
$pdf->writeHTMLCell(100, 7, 20, 170, $html, 0, 1, false, 'L');

//.......
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 27, 183, $html, 0, 1, false, 'L');

$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 97, 183, $html, 0, 1, false, 'L');

$html = '<div> Date of Entry (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 125, 183, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_proentry_city_town', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 188);

$pdf->setFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_proentry_state", 25, 7, $Options, array(), array(), 97, 187);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_proentry_date_of_entry', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 188);
//.......
$pdf->setFont('Times', '', 10);
$html = '<div>Exact Name Used at Time of Entry</div>';
$pdf->writeHTMLCell(80, 7, 27, 197, $html, 0, 1, false, 'L');



//........
$html = '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 27, 202, $html, 0, 1, false, 'L');

$html = '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(80, 7, 95, 202, $html, 0, 1, false, 'L');

$html = '<div>Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 152, 202, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_admission_lastname', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 207);

$pdf->TextField('part2_information_admission_firstname', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 207);

$pdf->TextField('part2_information_admission_middlename', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 151, 207);



//........
$pdf->setFont('Times', '', 10);
$html = '<div><b>B.  </b> I used the following travel document to be admitted to the United States</div>';
$pdf->writeHTMLCell(170, 7, 20, 217, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for check box 
if (showData('other_information_about_you_passport_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="passport" value="passport" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(100, 7, 25, 222, $checkbox, 0, 1, false, 'L');
if (showData('other_information_about_you_travel_document_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="travel" value="travel" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(100, 7, 70, 222, $checkbox, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10); // end check box 

// check box label 
$pdf->writeHTMLCell(100, 7, 32, 223, 'Passport', 0, 1, false, 'L'); // 
$pdf->writeHTMLCell(100, 7, 77, 223, 'Travel Document', 0, 1, false, 'L');
//.........

$html = '<div>Passport Number</div>';
$pdf->writeHTMLCell(80, 7, 27, 229, $html, 0, 1, false, 'L');
$html = '<div>Travel Document Number</div>';
$pdf->writeHTMLCell(80, 7, 76, 229, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_passport_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 233);

$pdf->TextField('part2_information_travel_document_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 76, 233);
//..........

$pdf->setFont('Times', '', 10);
$html = '<div>Country of Issuance for Passport or<br>
Travel Document</div>';
$pdf->writeHTMLCell(80, 7, 27, 241, $html, 0, 1, false, 'L');
$html = '<div>Date Passport or Travel Document<br>
Issued (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 107, 241, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_country_issue_passport', 77, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 250);

$pdf->TextField('part2_information_date_issue_passport', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 107, 250);

/********************************
 ******** End Page No 2 **********
 *********************************/

/********************************
 ******** Start Page No 3 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 3
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 0); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 2. Information About You </b> (continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(18, 7, 154, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 161, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);

//.....
$pdf->setFont('Times', '', 10);
$html = '<div><b>C.  </b> I am </div>';
$pdf->writeHTMLCell(170, 7, 20, 26, $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 14); // for check box
if (showData('information_about_you_lpr_refugee_status') == "LPR") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="lawful" value="lawful" checked="' . $checked . '" /> ';
$pdf->writeHTMLCell(190, 7, 25, 32, $checkbox, 0, 1, false, true, 'L');
if (showData('information_about_you_lpr_refugee_status') == "nonimmigrant") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="nominigrant" value="nominigrant" checked="' . $checked . '" />';
$pdf->writeHTMLCell(190, 7, 89, 32, $checkbox, 0, 1, false, true, 'L');
if (showData('information_about_you_lpr_refugee_status') == "refugee") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="refugee" value="refugee" checked="' . $checked . '" />';
$pdf->writeHTMLCell(190, 7, 124, 32, $checkbox, 0, 1, false, true, 'L');
if (showData('information_about_you_lpr_refugee_status') == "other") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="other2" value="Y" checked="' . $checked . '" />';
$pdf->writeHTMLCell(190, 7, 25, 39, $checkbox, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end check box
//checkbox level 
$pdf->writeHTMLCell(180, 7, 32, 33, 'A Lawful Permanent Resident (LPR)', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(180, 7, 96, 33, 'A Nonimmigrant', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(180, 7, 131, 33, 'A Refugee/ Asylee', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(180, 7, 32, 40, 'Other (Explain):', 0, 1, false, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_other_explain', 146, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 57, 40);

//.....
$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE:</b> If you select "Other" and you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(175, 7, 25, 48, $html, 0, 1, false, true, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html = '<div><b>D.  </b>  I obtained LPR status through adjustment of status in the United States or admission as a LPR (if applicable)</div>';
$pdf->writeHTMLCell(175, 7, 20, 57, $html, 0, 1, false, 'L');
//.........

$pdf->setFont('Times', '', 10);
$html = '<div> Date I became a LPR<br>
 (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 25, 64, $html, 0, 1, false, 'L');
$html = '<div> U.S. Citizenship and Immigration Services (USCIS) Office That Granted My LPR<br>
 Status or Location Where I Was Admitted</div>';
$pdf->writeHTMLCell(120, 7, 77, 64, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_became_lpr', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 73);

$pdf->TextField('part2_information_location_where_admited', 123, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 73);
//...........


$pdf->setFont('Times', '', 10);
$html = '<div><b>15. </b> &nbsp; Have you previously applied for a Certificate of Citizenship or U.S. Passport?</div>';
$pdf->writeHTMLCell(170, 7, 12, 82, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_applied_us_passport_status') == "Y") $checked = "checked";else $checked = "";
$html = '<div><input type="checkbox" name="pre_applyed" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 82, $html, 0, 1, false, true, 'L');
if (showData('information_about_you_applied_us_passport_status') == "N") $checked = "checked";else $checked = "";
$html = '<div><input type="checkbox" name="pre_applyed" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 82, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 83, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 83, 'No', 0, 1, false, true, 'L');
//..........

$html = '<div>If you answered "Yes" to <b>Item Number 15.</b>, provide an explanation below. If you need extra space to complete this section, use he space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(185, 7, 20, 87, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('have_you_applied_previously', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 96);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>16. </b> &nbsp; Have you ever abandoned or lost your LPR status? </div>';
$pdf->writeHTMLCell(170, 7, 12, 106, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_have_lost_lpr_status') == "Y") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="abandoned" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 106, $html, 0, 1, false, true, 'L');

if (showData('information_about_you_have_lost_lpr_status') == "N") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="abandoned" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 106, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 107, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 107, 'No', 0, 1, false, true, 'L');
//..........


$html = '<div>If you answered "Yes" to <b>Item Number 16.</b>, provide an explanation below. If you need extra space to complete this section, use
he space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(185, 7, 19, 111, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('have_you_abandoned_lost_lpr', 182, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 120);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>17. </b> &nbsp;  Were you adopted? </div>';
$pdf->writeHTMLCell(170, 7, 12, 130, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_adopted_status') == "Y") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="adopted" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 130, $html, 0, 1, false, true, 'L');

if (showData('information_about_you_adopted_status') == "N") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="adopted" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 130, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 131, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 131, 'No', 0, 1, false, true, 'L');


$html = '<div>If you answered "Yes" to <b>Item Number 17.</b>, complete <b>Items A. - D.</b></div>';
$pdf->writeHTMLCell(175, 7, 20, 135, $html, 0, 1, false, 'L');
//..........
$html = '<div><b>A.  </b> Place of Final Adoption </div>';
$pdf->writeHTMLCell(100, 7, 20, 140, $html, 0, 1, false, 'L');
//.......



$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 26, 146, $html, 0, 1, false, 'L');

$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 92, 146, $html, 0, 1, false, 'L');

$html = '<div> Country </div>';
$pdf->writeHTMLCell(80, 7, 123, 146, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_adoption_city_town', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 151);

$pdf->SetFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_adoption_state", 25, 7, $Options, array(), array(), 95, 151);


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_adoption_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 151);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>B.</b> &nbsp; Date of Adoption <br> &nbsp; &nbsp; &nbsp;
	(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 158, $html, 0, 1, false, 'L');

$html = '<div><b>C.</b> Date Legal Custody Began  <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 79, 158, $html, 0, 1, false, 'L');

$html = '<div><b>D. </b>Date Physical Custody Began <br> &nbsp; &nbsp;
 (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 135, 158, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_adoption', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 168);

$pdf->TextField('part2_information_date_custody_began', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 168);

$pdf->TextField('part2_information_date_physical_custody_began', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 140, 168);

//............

$pdf->setFont('Times', '', 10);
$html = '<div><b>18. </b> &nbsp; Did you have to be re-adopted in the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 177, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_re_adopted_status') == "Y") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="re_adopted" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 177, $html, 0, 1, false, true, 'L');

if (showData('information_about_you_re_adopted_status') == "N") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="re_adopted" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 177, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 178, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 178, 'No', 0, 1, false, true, 'L');


$html = '<div>If you answered "Yes" to <b>Item Number 18.</b>, complete <b>Items A. - D.</b></div>';
$pdf->writeHTMLCell(175, 7, 20, 182, $html, 0, 1, false, 'L');
//..........
$html = '<div><b>A.  </b> Place of Final Adoption </div>';
$pdf->writeHTMLCell(100, 7, 20, 188, $html, 0, 1, false, 'L');
//..........
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 26, 194, $html, 0, 1, false, 'L');

$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 94, 194, $html, 0, 1, false, 'L');

$html = '<div> Country </div>';
$pdf->writeHTMLCell(80, 7, 123, 194, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_re_adoption_city_town', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 199);
$pdf->SetFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_re_adoption_state", 25, 7, $Options, array(), array(), 95, 199);


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_re_adoption_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 124, 199);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>B.</b> &nbsp; Date of Adoption <br> &nbsp; &nbsp; &nbsp;
	(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 206, $html, 0, 1, false, 'L');

$html = '<div><b>C.</b> Date Legal Custody Began  <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 89, 206, $html, 0, 1, false, 'L');

$html = '<div><b> D. </b>Date Physical Custody Began <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 145, 206, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_re_adoption', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 216);

$pdf->TextField('part2_information_date_re_adoption_custody_began', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 216);

$pdf->TextField('part2_information_date_physicalre_adoption_custody_began', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 216);

//.......



$pdf->setFont('Times', '', 10);
$html = '<div><b>19. </b> &nbsp; Were your parents married to each other when you were born (or adopted)?</div>';
$pdf->writeHTMLCell(170, 7, 12, 226, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_parents_married_status') == "Y") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="parent_married" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 226, $html, 0, 1, false, true, 'L');

if (showData('information_about_you_parents_married_status') == "N") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="parent_married" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 226, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 227, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 227, 'No', 0, 1, false, true, 'L');

//............

$pdf->setFont('Times', '', 10);
$html = '<div><b>20. </b> &nbsp; Did your parents marry after you were born?</div>';
$pdf->writeHTMLCell(170, 7, 12, 236, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_parent_marry_after_you_born_status') == "Y") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="you_born" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 236, $html, 0, 1, false, true, 'L');

if (showData('information_about_you_parent_marry_after_you_born_status') == "N") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="you_born" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 236, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 237, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 237, 'No', 0, 1, false, true, 'L');

//............



$pdf->setFont('Times', '', 10);
$html = '<div><b>21. </b> &nbsp; Do you regularly reside in the United States in the legal and physical custody of your U.S. citizen parents?</div>';
$pdf->writeHTMLCell(170, 7, 12, 246, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_legal_physical_us_parents_status') == "Y") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="regularly_reside" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 246, $html, 0, 1, false, true, 'L');

if (showData('information_about_you_legal_physical_us_parents_status') == "N") $checked = "checked";else $checked = "";

$html = '<div><input type="checkbox" name="regularly_reside" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 246, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 182, 247, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 247, 'No', 0, 1, false, true, 'L');

//............


/********************************
 ******** End Page No 3 **********
 *********************************/

/********************************
 ******** Start Page No 4 ********
 *********************************/


$pdf->AddPage('P', 'LETTER'); //page number 4
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 2. Information About You</b>(continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 153, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(44, 7, 160, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);

//.....

$pdf->setFont('Times', '', 10);
$html = '<div><b>22. </b> &nbsp;  Have you been absent from the United States since you first arrived?</div>';
$pdf->writeHTMLCell(170, 7, 12, 28, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('information_about_you_absent_since_first_arrived_status') == "Y") $checked = "checked";else $checked = "";
$html = '<div><input type="checkbox" name="absent" value="Y" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 175, 27, $html, 0, 1, false, true, 'L');
if (showData('information_about_you_absent_since_first_arrived_status') == "N") $checked = "checked";else $checked = "";
$html = '<div><input type="checkbox" name="absent" value="N" checked="' . $checked . '"/></div>';
$pdf->writeHTMLCell(80, 7, 190, 27, $html, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
//checkbox label
$pdf->writeHTMLCell(80, 7, 182, 28, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 28, 'No', 0, 1, false, true, 'L');
//..........

$pdf->setFont('Times', '', 10);
$html = '<div>Complete the following information <b>only if you are claiming U.S. citizenship at the time of birth if you were born before
October 10. 1952.</b> If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(185, 7, 20, 35, $html, 0, 1, false, 'L');
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>A. </b> Date You Left the United States <br>&nbsp; &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 45, $html, 0, 1, false, 'L');

$html = '<div><b>B. </b> Date You Returned to the <br>&nbsp; &nbsp; &nbsp;
United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 97, 45, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_left_unitedstates', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 25, 54);

$pdf->TextField('part2_information_date_return_unitedstates', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 102, 54);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>C. </b>  Place of Entry Upon Return to the United States</div>';
$pdf->writeHTMLCell(80, 7, 20, 63, $html, 0, 1, false, 'L');

//..........
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 68, $html, 0, 1, false, 'L');

$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 98, 68, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_place_of_entry_return', 68, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 73);
$pdf->SetFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_place_of_entry_return_state", 25, 7, $Options, array(), array(), 100, 73);

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>D. </b> Date You Left the United States <br> &nbsp;&nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 82, $html, 0, 1, false, 'L');

$html = '<div><b>E. </b> Date You Returned to the <br> &nbsp;&nbsp; &nbsp;
United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 97, 82, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_left_unitedstates2', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 91);

$pdf->TextField('part2_information_date_return_unitedstates2', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 104, 91);
//.......

$pdf->SetFont('times', '', 10);
$html = '<div><b>F. </b>  Place of Entry Upon Return to the United States</div>';
$pdf->writeHTMLCell(80, 7, 20, 98, $html, 0, 1, false, 'L');

//..........
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 104, $html, 0, 1, false, 'L');

$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 97, 104, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_place_of_entry_return2', 68, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 109);

$pdf->SetFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_22f_state", 25, 7, $Options, array(), array(), 98, 109);

//..............

$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 3. Biographic Information </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 122, $html, 1, 1, true, false, 'J', true);

//.....
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.    </b>&nbsp;  &nbsp;    Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 130,  $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biographic_info_ethnicity') == "hispanic") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="hispanic" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 135, $checkbox, 0, 1, false, true, 'L');

if (showData('biographic_info_ethnicity') == "nothispanic") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="hispanic" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 55, 135, $checkbox, 0, 1, false, true, 'L');

$pdf->setFont('Times', '', 10); // end checkbox
$pdf->writeHTMLCell(80, 7, 27, 136, 'Hispanic or Latino', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 62, 136, 'Not Hispanic or Latino', 0, 1, false, true, 'L');
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2.    </b>&nbsp;  &nbsp;     Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(95, 7, 12, 142,  $html, 0, 1, false, 'L');

//............
$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biographic_info_race_white') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="White2" value="White" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 148, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_race_asian') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Asian2" value="Asian" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 40, 148, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_race_black_african') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Black2" value="Black" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 59, 148, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_race_american_native') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="American2" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 93, 148, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_race_native_islander') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Native2" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 129, 148, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 149, 'White', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 47, 149, 'Asian', 0, 1, false, true, 'L');
$pdf->MultiCell(80, 7, "Black or\nAfrican American", 0, 'L', 0, 1, 66, 149, true);
$pdf->MultiCell(80, 7, "American Indian\n or Alaska Native", 0, 'L', 0, 1, 100, 149, true);
$pdf->MultiCell(80, 7, "Native Hawaiian or\nOther Pacific Islander", 0, 'L', 0, 1, 137, 149, true);

//............

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.    </b> &nbsp; &nbsp; Height </div>';
$pdf->writeHTMLCell(95, 7, 12, 161,  $html, 0, 1, false, 'L');


$html = '<div>Feet </div>';
$pdf->writeHTMLCell(30, 7, 33, 161, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', 'B', 10);
$pdf->ComboBox('biographic_height_feet', 10, 7, array(
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
), array(), array(), 44, 161);

$pdf->setFont('Times', '', 10);
$html1 = '<div>Inches </div>';
$pdf->writeHTMLCell(30, 7, 56, 161, $html1, 0, 0, false, true, 'L', true);

$pdf->SetFont('times', 'B', 10);
$pdf->ComboBox('biographic_height_inches', 10, 7, array(
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
	'10',
	'11',
), array(), array(), 67, 161);


$pdf->setFont('Times', '', 10);
$html = '<div><b>4. </b> Weight </div>';
$pdf->writeHTMLCell(95, 7, 80, 161,  $html, 0, 1, false, 'L');

$html = '<div>Pounds</div>';
$pdf->writeHTMLCell(50, 7, 100, 161, $html, 0, 0, false, true, 'J', true);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('biographic_weight_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 115, 161);
$pdf->TextField('biographic_weight_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 161);
$pdf->TextField('biographic_weight_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 129, 161);
//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.  </b> &nbsp;  &nbsp; Eye color (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 168,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biographic_info_eye_color') == "black") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Black5" value="Black" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "blue") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Blue5" value="Blue" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 38, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "brown") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Brown5" value="Brown" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 55, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "gray") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Gray5" value="Gray" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 74, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "green") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Green5" value="GreenN" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 91, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "hazel") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Hazel5" value="Hazel" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 111, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "maroon") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Maroon5" value="Maroon" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 128, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "pink") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Pink5" value="Pink" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 150, 173, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_eye_color') == "unknown") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Unknown5" value="Unknown" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 167, 173, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 174, 'Black', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 45, 174, 'Blue', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 62, 174, 'Brown', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 81, 174, 'Gray', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 98, 174, 'Green', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 118, 174, 'Hazel', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 135, 174, 'Maroon', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 157, 174, 'Pink', 0, 1, false, true, 'L');
$pdf->MultiCell(80, 7, "Unknown/\nOther", 0, 'L', 0, 1, 174, 174, true);
//..........

//.............

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b>  &nbsp;  &nbsp; Hair color (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 182,  $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biographic_info_hair_color') == "bald") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Bald" value="Bald" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "black") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Black" value="Black" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 43, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "blond") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Blond" value="Blond" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 60, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "brown") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Brown" value="Brown" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 79, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "gray") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Gray" value="Gray" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 99, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "red") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Red" value="Red" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 116, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "sandy") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Sandy" value="Sandy" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 133, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "white") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="White" value="White" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 155, 188, $checkbox, 0, 1, false, true, 'L');
if (showData('biographic_info_hair_color') == "unknown") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="Unknown" value="Unknown" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 172, 188, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label
$pdf->setFont('Times', '', 10);
$pdf->MultiCell(80, 7, "Bald\n(No hair)", 0, 'L', 0, 1, 27, 189, true);
$pdf->writeHTMLCell(80, 7, 50, 189, 'Black', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 67, 189, 'Blond', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 86, 189, 'Brown', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 106, 189, 'Gray', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 123, 189, 'Red', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 140, 189, 'Sandy', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 162, 189, 'White', 0, 1, false, true, 'L');
$pdf->MultiCell(80, 7, "Unknown/\nOther", 0, 'L', 0, 1, 179, 189, true);
//..........
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father) </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 205, $html, 1, 1, true, false, 'J', true);
//.....

$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. biological father (of adoptive father).<b> Provide
information about yourself</b> if you are a U.S. citizen father applying for a Certificate of Citizenship on behalf of your minor
biological or adopted child.</div>';
$pdf->writeHTMLCell(180, 7, 12, 215, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(1.1);
$html = '<b>1.    </b> &nbsp; &nbsp; Current Legal Name of U.S. Citizen Father';
$pdf->writeHTMLCell(195, 7, 12, 231, $html, 0, 1, false, true, 'L', 0);

$pdf->Ln(1.1);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 22, 233, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 233, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 233, $html, 0, 0, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_about_you_biological_father_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 240);
$pdf->TextField('part4_about_you_biological_father_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 240);
$pdf->TextField('part4_about_you_biological_father_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155.5, 240);


/********************************
 ******** End Page No 4 **********
 *********************************/

/********************************
 ******** Start Page No 5 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 5
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part  4.  Information About Your U.S. Citizen Biological Father <br> (or Adoptive Father) </b> (continued)</div>';
$pdf->writeHTMLCell(142, 10, 13, 19, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 155, 19, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 5, 161, 19, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b> &nbsp;  Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 12, 35, $html, 0, 1, false, 'L');

$html = '<div><b>3.  </b> &nbsp;  Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 72, 35, $html, 0, 1, false, 'L');

$html = '<div><b>4.   </b>  Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 139, 35, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_about_you_biological_father_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 40);

$pdf->TextField('part4_about_you_biological_father_country_birth', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 81, 40);

$pdf->TextField('part4_about_you_biological_father_nationality', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 40);

//.......................

$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp; Physical Address</div>';
$pdf->writeHTMLCell(110, 7, 12, 48, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div>Street Number and Name (Type or print "Deceased" and the date of death if your father has passed away.)</div>';
$pdf->writeHTMLCell(150, 7, 20, 53, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_father_physical_address_street_number', 140, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 58);

$pdf->setFont('Times', '', 10);
$html = '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  Number </div>';
$pdf->writeHTMLCell(95, 7, 162, 53, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for check box
if (showData('biological_father_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('biological_father_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('biological_father_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$html = '<input type="checkbox" name="apt5" value="apt" checked="' . $checked_apt . '" />';
$pdf->writeHTMLCell(20, 7, 162, 57, $html, 0, 1, false, 'L');

$html = '<input type="checkbox" name="ste5" value="ste" checked="' . $checked_ste . '" />';
$pdf->writeHTMLCell(20, 7, 172, 57, $html, 0, 1, false, 'L');

$html = '<input type="checkbox" name="flr5" value="flr" checked="' . $checked_flr . '" />';
$pdf->writeHTMLCell(20, 7, 182, 57, $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('father_physical_apt_ste_flr_value', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 190, 57);
//.................

$pdf->setFont('Times', '', 10); // for check box
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 67, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 150, 67, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 177, 67, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 71, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_city_town', 125, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);

$pdf->setFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part4_father_physical_state", 25, 7, $Options, array(), array(), 150, 72);
//........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_zipcode', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 177, 72);

$pdf->TextField('part4_information_father_physical_zipcode1', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 193, 72);


//......................
$pdf->setFont('Times', '', 10);
$html = '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_foreign_region', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 85);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 79, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 79, 85);

//.....................
$pdf->setFont('Times', '', 10);
$html = '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 132, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_foreign_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 85);

//.............
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.  </b>  &nbsp; My father is a U.S. citizen by</div>';
$pdf->writeHTMLCell(110, 7, 12, 93, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_citizen_by_birth_in_us_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen_by1" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 98, $checkbox, 0, 1, false, true, 'L');
if (showData('biological_father_citizen_by_naturalization_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen_by2" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 67, 98, $checkbox, 0, 1, false, true, 'L');
if (showData('biological_father_citizen_by_us_citizen_parents_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen_by3" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 105, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 99, 'Birth in the United States', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 74, 99, 'Acquisition after birth through naturalization of alien', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 27, 106, 'Birth abroad to U.S. citizen parents', 0, 1, false, true, 'L');
//..........

$html = '<div>Certificate of Citizenship Number</div>';
$pdf->writeHTMLCell(110, 7, 26, 112, $html, 0, 1, false, 'L');

$html = '<div>Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(110, 7, 89, 112, $html, 0, 1, false, 'L');

$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell(30, 7, 94, 117, $html, 0, 1, false, 'L');
$pdf->Image('images/right_angle.jpg', 90, 118, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('father_certificate_of_citizenship_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 117);
$pdf->TextField('father_alien_reg_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 100, 117);

//..........
$pdf->setFont('Times', '', 10);
$pdf->SetFillColor(220, 220, 220);

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_naturalization_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen_by4" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 124, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 125, 'Naturalization', 0, 1, false, true, 'L');
//..........


$html = '<div>Place of Naturalization (Name of Court or USCIS Office Location)</div>';
$pdf->writeHTMLCell(110, 7, 27, 130, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('father_place_of_naturalization', 95, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 28, 135);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 27, 143, $html, 0, 1, false, 'L');

$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 97, 143, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_place_naturalization_city', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 28, 148);

$pdf->setFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part4_place_of_naturalization_state", 25, 7, $Options, array(), array(), 97, 148);
//..............


$pdf->SetFont('times', '', 10);
$html = '<div> Certificate of Naturalization Number </div>';
$pdf->writeHTMLCell(80, 7, 27, 155, $html, 0, 1, false, 'L');

$html = '<div>A-Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 87, 155, $html, 0, 1, false, 'L');

$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell(80, 7, 93, 161, $html, 0, 1, false, 'L');
$pdf->Image('images/right_angle.jpg', 89, 162, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //

$html = '<div>Date of Naturalization (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 148, 155, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_about_father_certificate_of_naturalization', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 28, 160);

$pdf->TextField('part4_about_father_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 100, 160);

$pdf->TextField('part4_about_father_date_of_naturalization', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 160);

//...........

$pdf->setFont('Times', '', 10);
$html = '<div><b>7.  </b> &nbsp; &nbsp; Has your father ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</div>';
$pdf->writeHTMLCell(170, 7, 12, 170, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_loss_us_citizenship_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="father_lost" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 175, 170, $checkbox, 0, 1, false, true, 'L');
if (showData('biological_father_loss_us_citizenship_status') == "N") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="father_lost" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 190, 170, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 182, 171, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 171, 'No', 0, 1, false, true, 'L');
//..........


$html = '<div>If you answered "Yes" to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(170, 7, 20, 176, $html, 0, 1, false, 'L');

//..........

$html = '<div><b>8.  &nbsp; &nbsp;   Marital History</b></div>';
$pdf->writeHTMLCell(170, 7, 12, 183, $html, 0, 1, false, 'L');


$html = '<div><b>A.  </b>  &nbsp;  How many times has your U.S. citizen father been married (including annulled marriages and<br> &nbsp; &nbsp; &nbsp; &nbsp;
marriages to the same person)?</div>';
$pdf->writeHTMLCell(160, 7, 25, 189, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_about_how_many_married', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 178, 189);

$pdf->setFont('Times', '', 10);
$html = '<div><b>B.  </b>  What is your U.S. citizen father\'s current marital status?</div>';
$pdf->writeHTMLCell(160, 7, 20, 201, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_marital_status') == "single") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="single"  value="single" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 25, 206, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_marital_status') == "married") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="married" value="married" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 64, 206, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_marital_status') == "divorced") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="divorced" value="divorced" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 86, 206, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_marital_status') == "widowed") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="widowed" value="widowed" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 108, 206, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_marital_status') == "separated") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="separated" value="separated" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 132, 206, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_marital_status') == "annulled") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="marriageannuled" value="marriageannuled" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 156, 206, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_marital_status') == "other") $checked = "checked";else $checked = "";

$checkbox = '<input type="checkbox" name="other" value="other" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 25, 213, $checkbox, 0, 1, false, true, 'L');

// end check box 

// for checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(50, 7, 32, 207, 'Single,Never Married', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 69, 207, 'Married', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 91, 207, 'Divorced', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 113, 207, 'Widowed', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 137, 207, 'Separated', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 161, 207, 'Marriage Annulled', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 32, 214, 'Other (Explain):', 0, 1, false, true, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('citizen_father_marital_other_explain', 145, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 57, 213);

//.....

$pdf->setFont('Times', '', 10);
$html = '<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 27, 222, $html, 0, 1, false, true, 'L');

/********************************
 ******** End Page No 5 **********
 *********************************/

/********************************
 ******** Start Page No 6 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 6
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part  4.  Information About Your U.S. Citizen Biological Father<br>(or Adoptive Father) </b> (continued)</div>';
$pdf->writeHTMLCell(142, 12, 13, 18, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 155, 19, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(40, 7, 162, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);

//.............
$pdf->setFont('Times', '', 10);
$html = '<div><b>9.  </b>  Information About U.S. Citizen Father\'s Current Spouse</div>';
$pdf->writeHTMLCell(110, 7, 12, 34, $html, 0, 1, false, 'L');

//.........

$html = '<div><b>A.  </b>  Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 20, 39,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_lastname', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 44);
//................

$pdf->setFont('Times', '', 10);
$html = '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 39,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 91, 44);

//.............

$pdf->setFont('Times', '', 10);
$html = '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 150, 39,  $html, 0, 1, false, 'L');
//.............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_middlename', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 150, 44);
//.............

$pdf->setFont('Times', '', 10);
$html = '<div><b>B. </b> Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 52,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 57);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>C.   </b>   Country of Birth </div>';
$pdf->writeHTMLCell(80, 7, 78, 52,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_country_of_birth', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 57);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>D.   </b>   Country of Citizenship or Nationality </div>';
$pdf->writeHTMLCell(80, 7, 20, 65,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_nationality', 73, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 70);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>E.   </b>  Spouse\'s Physical Address  </div>';
$pdf->writeHTMLCell(80, 7, 20, 78,  $html, 0, 1, false, 'L');

//................


$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 26, 83, $html, 0, 1, false, 'L');

$html = '<div>Apt. &nbsp;&nbsp;  Ste. &nbsp;&nbsp;  Flr.  &nbsp;  &nbsp; Number </div>';
$pdf->writeHTMLCell(95, 7, 160, 83, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_street', 132, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 88);
$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_current_spouse_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('biological_father_current_spouse_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('biological_father_current_spouse_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$html = '<div>  <input type="checkbox" name="apt_s" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 88, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="ste_s" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 167, 88, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="flr_s" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 176, 88, $html, 0, 1, false, 'L');

//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_apt_ste_flr_value', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 188, 88);

//.................

$pdf->setFont('Times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 26, 96, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 150, 96, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 176, 96, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 101, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_city_town', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 101);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part4_us_father_current_spouse_state", 25, 7, $Options, array(), array(), 150, 101);

//.......

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_zipcode1', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 177, 101);

$pdf->TextField('part4_us_father_current_spouse_zipcode2', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 193, 101);


//......................

$pdf->setFont('Times', '', 10);
$html = '<div>Province <br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 26, 109, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_province', 54, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 118);

//.............

$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 84, 109, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_postalcode', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 118);

//.....................

$pdf->setFont('Times', '', 10);
$html = '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 130, 109, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_foreign_country', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 118);

//.....................

$pdf->setFont('Times', '', 10);
$html = '<div><b>F. </b> Date of Mariage (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 127,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_date_of_mariage', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 132);
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>G. </b> Place of Marriage </div>';
$pdf->writeHTMLCell(80, 7, 20, 140,  $html, 0, 1, false, 'L');

$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 26, 145, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 98, 145, $html, 0, 1, false, 'L');

$html = '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 124, 145, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_city_of_mariage', 66, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 150);
//..........

$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part4_biological_father_current_spouse_marriage_state", 25, 7, $Options, array(), array(), 98, 150);

//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_country_of_mariage', 77, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 125, 150);

//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>H. </b>  Spouse\'s Immigration Status</div>';
$pdf->writeHTMLCell(80, 7, 20, 158,  $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_spouse_immigration_us_citizen_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="sp_status0" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 25, 165, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_spouse_immigration_permanent_resident_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="sp_status1" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 52, 165, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_spouse_immigration_other_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="sp_status2" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 25, 172, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 32, 166, 'U.S. Citizen', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 59, 166, 'Lawful Permanent Resident', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 32, 173, 'Other (Explain):', 0, 1, false, true, 'L');
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_immigration_other_explain', 145, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 58, 172);

//.....
$pdf->setFont('Times', '', 10);
$html = '<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 25, 180, $html, 0, 1, false, true, 'J', true);

$pdf->setFont('Times', '', 10);
$html = '<div><b>I.   </b>    Is your U.S. citizen father\'s current spouse also your biological (or adopted) mother?</div>';
$pdf->writeHTMLCell(180, 7, 20, 192,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_father_spuse_your_biological_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="spouse_biological" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 175, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_father_spuse_your_biological_status') == "N") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="spouse_biological" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 190, 192, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 182, 193, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 193, 'No', 0, 1, false, true, 'L');
//..........

$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 5. Information About Your U.S. Citizen Biological Mother (or Adoptive Mother)</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 203, $html, 1, 1, true, false, 'J', true);
//.....
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. citizen biological mother (or adoptive mother).<b> Provide
information about yourself</b> if you are a U.S. citizen mother applying for a Certificate of Citizenship on behalf of your minor
biological or adopted child.</div>';
$pdf->writeHTMLCell(190, 7, 12, 212, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.   </b> &nbsp;  Current Legal Name of U.S. Citizen Mother</div>';
$pdf->writeHTMLCell(110, 7, 12, 226, $html, 0, 1, false, 'L');
//.........

$html = '<div> Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 20, 232,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_lastname', 73, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 237);
//................

$pdf->setFont('Times', '', 10);
$html = '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 97, 232,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_firstname', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 237);

//.............

$pdf->setFont('Times', '', 10);
$html = '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 155, 232,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_middlename', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 156, 237);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div><b>2.   </b> &nbsp;  Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(65, 7, 12, 245,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_date_of_birth', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 250);
//................

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.  </b>   Country of Birth</div>';
$pdf->writeHTMLCell(65, 7, 75, 245,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_country_of_birth', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 82, 250);

//.............
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.  </b>   Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 142, 245,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_citizenship', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 148, 250);

/********************************
 ******** End Page No 6 **********
 *********************************/

/********************************
 ******** Start Page No 7 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 7
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 5. Information About Your U.S. Citizen Biological Mother<br>
(or Adoptive Mother) </b> (continued) </div>';
$pdf->writeHTMLCell(140, 13, 13, 18, $html, 1, 1, true, false, 'L', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 154, 19, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 160, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'L', true);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp; &nbsp; Physical Address</div>';
$pdf->writeHTMLCell(80, 7, 12, 33, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 9.3);
$html = '<div>Street Number and Name (Type or print "Deceased" and the date of death if your mother has passed away.)</div>';
$pdf->writeHTMLCell(150, 7, 20, 39, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_street', 140, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 44);

$pdf->setFont('Times', '', 10);
$html = '<div>Apt. &nbsp;   Ste. &nbsp;   Flr.  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 163, 39, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('biological_mother_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('biological_mother_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$html = '<div>  <input type="checkbox" name="apt" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 44, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="ste" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 167, 44, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="flr" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 176, 44, $html, 0, 1, false, 'L');

//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_apt_ste_flr_value', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 188, 44);

$pdf->setFont('Times', '', 10);
//.................

$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 52, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 155, 52, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 175, 52, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 57, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_city', 127, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 57);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_adoption_state", 25, 7, $Options, array(), array(), 148, 57);

//..........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_zipcode', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 175, 57);

$pdf->TextField('part5_information_mother_physical_zipcode1', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 193, 57);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html = '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 65, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_foreign_region', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 70);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 79, 65, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 80, 70);

//.....................
$pdf->setFont('Times', '', 10);
$html = '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 132, 65, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 132, 70);

//.............
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.  </b>  &nbsp;  My mother is a U.S. citizen by</div>';
$pdf->writeHTMLCell(110, 7, 12, 78, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_citizen_by_birth_in_us_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen1_by" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 83, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_citizen_by_naturalization_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen2_by" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 67, 83, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_citizen_by_us_citizen_parents_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen3_by" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 90, $checkbox, 0, 1, false, true, 'L');

// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 84, 'Birth in the United States', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 74, 84, 'Acquisition after birth through naturalization of alien', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 27, 91, 'Birth abroad to U.S. citizen parents', 0, 1, false, true, 'L');
//..........

$html = '<div>Certificate of Citizenship Number</div>';
$pdf->writeHTMLCell(110, 7, 27, 96, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_certificate_of_citizenship_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 101);

$pdf->setFont('Times', '', 10);
$html = '<div>A-Number (if any)</div>';
$pdf->writeHTMLCell(110, 7, 88, 96, $html, 0, 1, false, 'L');

$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell(110, 7, 93, 102, $html, 0, 1, false, 'L');

$pdf->Image('images/right_angle.jpg', 90, 103, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //for 9 Digit a number

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_mother_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 99, 101);


//..........

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_naturalization_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="ctgen4_by" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 108, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 109, 'Naturalization', 0, 1, false, true, 'L');
//..........


$pdf->setFont('Times', '', 10);
$html = '<div>Place of Naturalization (Name of Court or USCIS Office Location)</div>';
$pdf->writeHTMLCell(110, 7, 27, 115, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_mother_place_of_naturalization', 95, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 120);

//.........
$pdf->setFont('Times', '', 10);
$html = '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 27, 128, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_mother_place_naturalization_city', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 133);

$pdf->setFont('Times', '', 10);
$html = '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 95, 128, $html, 0, 1, false, 'L');

//..........

$pdf->SetFont('courier', 'B', 10);
$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_adoption_state", 25, 7, $Options, array(), array(), 95, 133);

//..............

$pdf->SetFont('times', '', 10);
$html = '<div> Certificate of Naturalization Number </div>';
$pdf->writeHTMLCell(80, 7, 26, 141, $html, 0, 1, false, 'L');

//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_about_mother_certificate_of_naturalization', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 146);

//..........
$pdf->SetFont('times', '', 10);
$html = '<div>A-Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 85, 141, $html, 0, 1, false, 'L');


$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell(80, 7, 92, 147, $html, 0, 1, false, 'L');
$pdf->Image('images/right_angle.jpg', 87, 148, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false); //for a number


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_about_mother_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 98, 146);

$pdf->SetFont('times', '', 10);
$html = '<div>Date of Naturalization (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 149, 141, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_about_mother_date_of_naturalization', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 149, 146);

//...........
$pdf->setFont('Times', '', 10);
$html = '<div><b>7.  </b> &nbsp; &nbsp;  Has your mother ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</div>';
$pdf->writeHTMLCell(170, 7, 12, 155, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_loss_us_citizenship_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="mother_lost" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 175, 155, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_loss_us_citizenship_status') == "N") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="mother_lost" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 190, 155, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 182, 156, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 156, 'No', 0, 1, false, true, 'L');
//..........


$html = '<div>If you answered "Yes" to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(170, 7, 20, 162, $html, 0, 1, false, 'L');

//..........

$html = '<div><b>8.  &nbsp; &nbsp;  Marital History</b></div>';
$pdf->writeHTMLCell(170, 7, 12, 169, $html, 0, 1, false, 'L');


$html = '<div><b>A.  </b>  How many times has your U.S. citizen mother been married (including annulled marriages and<br> &nbsp; &nbsp; &nbsp;
marriages to the same person)? </div>';
$pdf->writeHTMLCell(160, 7, 20, 175, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_about_mother_how_many_married', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 177, 175);

$pdf->SetFont('Times', 'B', 10);
$html = '<div><b>B.  </b> What is your U.S. citizen mother\'s current marital status?</div>';
$pdf->writeHTMLCell(160, 7, 20, 185, $html, 0, 1, false, 'L');




$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_marital_status') == "single") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="single"  value="single" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 26, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_marital_status') == "married") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="married" value="married" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 64, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_marital_status') == "divorced") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="divorced" value="divorced" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 86, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_marital_status') == "widowed") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="widowed" value="widowed" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 108, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_marital_status') == "separated") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="separated" value="separated" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 132, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_marital_status') == "annulled") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="marriageannuled" value="marriageannuled" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 156, 192, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_marital_status') == "other") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="other" value="other" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(30, 7, 26, 199, $checkbox, 0, 1, false, true, 'L');

// end check box 

// for checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(50, 7, 33, 193, 'Single,Never Married', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 70, 193, 'Married', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 92, 193, 'Divorced', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 114, 193, 'Widowed', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 138, 193, 'Separated', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 162, 193, 'Marriage Annulled', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(50, 7, 33, 200, 'Other (Explain):', 0, 1, false, true, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('citizen_mother_marital_other_explain', 145, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 58, 199);
//............
$pdf->setFont('Times', '', 10);
$html = '<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 26, 207, $html, 0, 1, false, true, 'J');
//.............
$pdf->setFont('Times', '', 10);
$html = '<div><b>9.  </b> &nbsp;  Information About U.S. Citizen mother\'s Current Spouse</div>';
$pdf->writeHTMLCell(110, 7, 12, 218, $html, 0, 1, false, 'L');

//.........

$html = '<div><b>A.  </b>  Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 20, 223,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 228);
//................

$pdf->setFont('Times', '', 10);
$html = '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 223,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 91, 228);

//.............

$pdf->setFont('Times', '', 10);
$html = '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 153, 223,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_middlename', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 228);
//.............

$pdf->setFont('Times', '', 10);
$html = '<div><b>B. </b> Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 236,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 241);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>C.   </b>   Country of Birth </div>';
$pdf->writeHTMLCell(80, 7, 78, 236,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_country_of_birth', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 241);

/********************************
 ******** End Page No 7 **********
 *********************************/

/********************************
 ******** Start Page No 8 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 8
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part  5.  Information About Your U.S. Citizen Biological Mother<br>(or Adoptive Mother) </b> (continued)</div>';
$pdf->writeHTMLCell(140, 13, 13, 18, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 154, 19, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 160, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);
//...............
$pdf->setFont('Times', '', 10);
$html = '<div><b>D.   </b>   Country of Citizenship or Nationality </div>';
$pdf->writeHTMLCell(80, 7, 20, 33,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_nationality', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 38);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>E.   </b>  Spouse\'s Physical Address  </div>';
$pdf->writeHTMLCell(80, 7, 20, 46,  $html, 0, 1, false, 'L');

//................


$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 26, 52, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_street', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 57);


$pdf->setFont('Times', '', 10);
$html = '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 52, $html, 0, 1, false, 'L');

//...........

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_current_spouse_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('biological_mother_current_spouse_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('biological_mother_current_spouse_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$html = '<div>  <input type="checkbox" name="apt" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 57, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="ste" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 167, 57, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="flr" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 176, 57, $html, 0, 1, false, 'L');

//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_apt_ste_flr_value2', 14.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 190, 57);

//.................
$pdf->setFont('Times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 25, 64, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 149, 64, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 175, 64, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 69, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_city_town', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 69);

$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part5_us_mother_current_spouse_state", 22, 7, $Options, array(), array(), 150, 69);

//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_zipcode1', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 175, 69);

$pdf->TextField('part5_us_mother_current_spouse_zipcode2', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 193, 69);


//......................

$pdf->setFont('Times', '', 10);
$html = '<div>Province<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 26, 77, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_foreign_region', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 86);

//.............

$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 83, 77, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_postalcode', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 86);

//.....................

$pdf->setFont('Times', '', 10);
$html = '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 131, 77, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_foreign_country', 72, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 131, 86);

//.....................

$pdf->setFont('Times', '', 10);
$html = '<div><b>F. </b>  &nbsp; Date of Mariage (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 95,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_date_of_mariage', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 100);
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>G. </b> Place of Marriage </div>';
$pdf->writeHTMLCell(80, 7, 20, 107,  $html, 0, 1, false, 'L');

$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 25, 113, $html, 0, 1, false, 'L');

$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 96, 113, $html, 0, 1, false, 'L');

$html = '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 122, 113, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_city_of_mariage', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 26, 118);
//..........

$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("part2_adoption_state", 25, 7, $Options, array(), array(), 95, 118);
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_country_of_mariage', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 118);

//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>H. </b> &nbsp;   Spouse\'s Immigration Status</div>';
$pdf->writeHTMLCell(80, 7, 20, 126,  $html, 0, 1, false, 'L');

//.......

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_spouse_immigration_us_citizen_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="sp_status0" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 25, 133, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_spouse_immigration_permanent_resident_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="sp_status1" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 52, 133, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_spouse_immigration_other_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="sp_status2" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 25, 140, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 32, 134, 'U.S. Citizen', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 59, 134, 'Lawful Permanent Resident', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 32, 141, 'Other', 0, 1, false, true, 'L');
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('spouse_immigration_other', 158, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 140);

//.....
$pdf->setFont('Times', '', 10);
$html = '<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 26, 148, $html, 0, 1, false, true, 'J', true);

$pdf->setFont('Times', '', 10);
$html = '<div><b>I.   </b>    Is your U.S. citizen mother\'s current spouse also your biological (or adopted) mother?</div>';
$pdf->writeHTMLCell(180, 7, 20, 160,  $html, 0, 1, false, 'L');


//...........

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('biological_mother_spuse_your_biological_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="spouse_mother" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 175, 158, $checkbox, 0, 1, false, true, 'L');

if (showData('biological_mother_spuse_your_biological_status') == "N") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="spouse_mother" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 190, 158, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 182, 159, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 159, 'No', 0, 1, false, true, 'L');
//..........

$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 6. Physical Presence in the United States From Birth Until Filing of Form N-600</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 170, $html, 1, 1, true, false, 'J', true);
//.....

$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE: </b>Only applicants born outside the United States claiming to have been born U.S. citizens are required to provide all the dates
when your U.S. citizen biological father or U.S. citizen biological mother resided in the United States.<b> Include all dates from your
birth until the date you file your Form N-600.</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 179,  $html, 0, 1, false, 'L');

//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.   </b> &nbsp;  Indicate whether this information relates to your U.S. citizen father or mother</div>';
$pdf->writeHTMLCell(190, 7, 12, 194,  $html, 0, 1, false, 'L');
//.....

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('physical_presence_citizen_father_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="indicate" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 200, $checkbox, 0, 1, false, true, 'L');
if (showData('physical_presence_citizen_mother_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="indicate" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 57, 200, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 201, 'U.S. Citizen Father', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 64, 201, 'U.S. Citizen Mother', 0, 1, false, true, 'L');
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2.   </b> &nbsp; Physical Presence in the United States</div>';
$pdf->writeHTMLCell(190, 7, 12, 209,  $html, 0, 1, false, 'L');

//.......left side .............................................

$pdf->setFont('Times', '', 10);
$html = '<div><b>A.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 215,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_a_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 220);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 65, 215,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_a_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 67, 220);

//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>C.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 228,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_c_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 233);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 65, 228,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_c_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 67, 233);

//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>E.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 241,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_e_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 246);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 65, 241,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_e_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 67, 246);
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>G.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 253,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_g_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 258);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 65, 253,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_g_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 67, 258);

//.....right side............................... 
$pdf->setFont('Times', '', 10);
$html = '<div><b>B.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 215,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_b_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 220);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 161, 215,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_b_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 220);
//..........


$pdf->setFont('Times', '', 10);
$html = '<div><b>D.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 228,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_d_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 233);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 161, 228,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_d_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 233);

//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>F.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 241,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_f_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 246);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 161, 241,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_f_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 246);
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>H.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 253,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_h_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 258);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 161, 253,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_h_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 258);

/********************************
 ******** End Page No 8 **********
 *********************************/

/********************************
 ******** Start Page No 9 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 9
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 7.  Information About Military Service of U. S. Citizen Parents</b></div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 154, 19, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 160, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE:   </b>  Complete this only if you are an applicant claiming U.S. citizenship at time of birth abroad.</div>';
$pdf->writeHTMLCell(190, 7, 12, 27,  $html, 0, 1, false, 'L');
//............

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.   </b> &nbsp; Has your U.S. citizen parent served in the U.S. Armed Forces?</div>';
$pdf->writeHTMLCell(190, 7, 12, 34,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 14); // for checkbox
if (showData('mlitary_service_parent_served_us_forces_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="parent_us_army" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 175, 34, $checkbox, 0, 1, false, true, 'L');

if (showData('mlitary_service_parent_served_us_forces_status') == "N") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="parent_us_army" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 190, 34, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 182, 35, 'Yes', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 197, 35, 'No', 0, 1, false, true, 'L');
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2.   </b> &nbsp; If you answered "Yes" <b>to Item Number 1.</b>, which parent served in the U.S. Armed Forces?</div>';
$pdf->writeHTMLCell(190, 7, 12, 41,  $html, 0, 1, false, 'L');

//...........

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('mlitary_service_parent_served_us_forces_father_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="us_army" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 48, $checkbox, 0, 1, false, true, 'L');

if (showData('mlitary_service_parent_served_us_forces_mother_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="us_army" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 57, 48, $checkbox, 0, 1, false, true, 'L');
// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 49, 'U.S. Citizen Father', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 64, 49, 'U.S. Citizen Mother', 0, 1, false, true, 'L');
//.........

//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>3.   </b> &nbsp; Dates of Service (mm/dd/yyyy) (If time of service fulfills any of the required physical presence, submit evidence of the service.) </div>';
$pdf->writeHTMLCell(195, 7, 12, 56,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html = '<div><b>A.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 62,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_date_of_service_a_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 27, 67);
//........
$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 67, 62,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_date_of_service_a_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 69, 67);
//............
$pdf->setFont('Times', '', 10);
$html = '<div><b>B.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 62,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_date_of_service_b_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 119, 67);

$pdf->setFont('Times', '', 10);
$html = '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 160, 62,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('physical_presence_date_of_service_b_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 163, 67);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.   </b>  &nbsp; Type of Discharge</div>';
$pdf->writeHTMLCell(190, 7, 12, 76,  $html, 0, 1, false, 'L');
//..............

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('mlitary_service_type_of_discharge_honorable_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="discharge1" value="Y" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 20, 82, $checkbox, 0, 1, false, true, 'L');

if (showData('mlitary_service_type_of_discharge_other_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="discharge2" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 47, 82, $checkbox, 0, 1, false, true, 'L');

if (showData('mlitary_service_type_of_discharge_dishobnorable_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="discharge3" value="N" checked="' . $checked . '"/>';
$pdf->writeHTMLCell(80, 7, 90, 82, $checkbox, 0, 1, false, true, 'L');

// end checkbox

// checkbox label 
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(80, 7, 27, 83, 'Honorable', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 54, 83, 'Other than Honorable', 0, 1, false, true, 'L');
$pdf->writeHTMLCell(80, 7, 97, 83, 'Dishonorable', 0, 1, false, true, 'L');
//.........

$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 8.  Applicant\'s Statement, Contact Information, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 93, $html, 1, 1, true, false, 'J', true);
//.....
$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE:   </b>   Read the <b>Penalties</b> section of the Form N-600 Instructions before completing this part.</div>';
$pdf->writeHTMLCell(190, 7, 12, 103,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', 'I', 12);
$html = '<div><b> Applicant\'s Statement  </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 110,  $html, 0, 1, true, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE:   </b>  Select the box for either <b>Item A.</b> or <b>B.</b> in <b>Item Number 1.</b> If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 118,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.  </b>  Applicant\'s Statement Regarding the Interpreter</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 124,  $html, 0, 1, false, 'L');

//..............
$pdf->setFont('Times', '', 14); // for checkbox
if (showData('n_600_applicant_english_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="statement1" value="Y" checked="' . $checked . '"/>'; //for A
$pdf->writeHTMLCell(80, 7, 25, 130, $checkbox, 0, 1, false, true, 'L');

if (showData('n_600_applicant_interpreter_named_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="statement2" value="Y" checked="' . $checked . '"/>'; // for B
$pdf->writeHTMLCell(80, 7, 25, 141, $checkbox, 0, 1, false, true, 'L');
// end checkbox

$pdf->setFont('Times', '', 10);
$html = '<div><b>A.  </b>  &nbsp; &nbsp;  &nbsp;  I can read and understand English, and I have read and understand every question and instruction on this application<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
and my answer to every question.</div>';
$pdf->writeHTMLCell(190, 7, 20, 131,  $html, 0, 1, false, 'L');

//..............
$html = '<div><b>B.  </b>  &nbsp; &nbsp; &nbsp;   The interpreter named in <b>Part 9.</b> read to me every question and instruction on this application and my answer to<br> <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
every question, in <br>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; understood everything. </div>';
$pdf->writeHTMLCell(190, 7, 20, 141,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 128, 147, " , a language in which I am fluent and I", 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_aplicant_statement', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 60, 147);
//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2.  </b> &nbsp;  Applicant\'s Statement Regarding the Preparer </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 158,  $html, 0, 1, false, 'L');
//..............

$html = '<div>At my request, the preparer named in <b>Part 10.</b>, <br>prepared this application for me based only upon information I provided or authorized.</div>';
$pdf->writeHTMLCell(190, 7, 26, 165,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_aplicant_statement_regarding_preparer', 108, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 94, 162);

//..........

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('n_600_applicant_regarding_preparer_status') == "Y") $checked = "checked";else $checked = "";
$checkbox = '<input type="checkbox" name="statement_reg" value="Y" checked="' . $checked . '"/>'; //for 2
$pdf->writeHTMLCell(80, 7, 20, 164, $checkbox, 0, 1, false, true, 'L');
// end checkbox

//..........
$pdf->setFont('Times', 'I', 12);
$html = '<div><b>Applicant\'s Contact Information </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 176,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.  </b> Applicant\'s Daytime Telephone Number </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 185,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_aplicant_contact_daytime_telephone', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 190);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.  </b> Applicant\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 185,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_aplicant_contact_mobile_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 190);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>5.  </b> Applicant\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 197,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_aplicant_contact_email_address', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 202);
//..........
$pdf->setFont('Times', 'I', 12);
$html = '<div><b>Applicant\'s Certification </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 213,  $html, 0, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html = '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of
my records that USCIS may need to determine my eligibility for the immigration benefit I seek.

<br><br>I further authorize release of information contained in this application, in supporting documents, and in my USCIS records to other
entities and persons where necessary for the administration and enforcement of U.S. immigration laws. </div>';
$pdf->writeHTMLCell(190, 7, 12, 222,  $html, 0, 1, false, 'L');

/********************************
 ******** End Page No 9 **********
 *********************************/

/********************************
 ******** Start Page No 10 ********
 *********************************/

$pdf->AddPage('P', 'LETTER'); //page number 10
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 8. Applicant\'s Statement, Contact Information, Certification,
and Signature </b> (continued)</div>';
$pdf->writeHTMLCell(140, 13, 13, 17, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 154, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 160, 17, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div>I understand that USCIS may require me to appear for an appointment to take my biometrics (fingerprints, photograph, and/or
signature) and, at that time. if I am required to provide biometrics, I will be required to sign an oath reaffirming that;</div>';
$pdf->writeHTMLCell(190, 7, 12, 31,  $html, 0, 1, false, 'L');
//............
$html = '<div><b>1)  </b>  I reviewed and provided or authorized all of the information in my application;</div>';
$pdf->writeHTMLCell(190, 7, 18, 42,  $html, 0, 1, false, 'L');
//..............
$html = '<div><b>2)  </b>  I understood all of the information contained in, and submitted with, my application: and</div>';
$pdf->writeHTMLCell(190, 7, 18, 47,  $html, 0, 1, false, 'L');
//.............. 
$html = '<div><b>3)  </b>  All of this information was complete, true, and correct at the time of filing.</div>';
$pdf->writeHTMLCell(190, 7, 18, 53,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html = '<div>I certify, under penalty of perjury, that I provided or authorized all of the information in my application, I understand all of the
information contained in, and submitted with, my application, and that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(190, 7, 12, 60, $html, 0, 1, false, 'L');

//............
$pdf->setFont('Times', 'I', 12);
$html = '<div><b>Applicant\'s Signature </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 74,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10);
$html = '<div><b>6.  </b> &nbsp;   Applicant\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 82, $html, 0, 1, false, 'L');
//.......
$pdf->setCellPaddings(1, 2, 0, 1); // set cell padding
$html = '<div style="color:#ff0000;font-weight: bold;"> Don\' t  forget  to  sign! </div>';
$pdf->writeHTMLCell(132, 7, 20, 87, $html, 1, 0, false, 'L');
$pdf->setCellPaddings(1, 0.5, 1, 1); // reset set cell padding
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 85, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 153, 82, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_applicant_date_of_signature', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 155, 87);

//........
$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE TO ALL APPLICANTS:  </b>  If you do not completely fill out this application or fail to submit required documents listed in the
Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(193, 7, 12, 95, $html, 0, 1, false, 'L');
//.......
$pdf->setFont('Times', 'B', 12);
$html = '<div>Part 9. Interpreter\'s Contact Information, Certification, and Signature</div>';
$pdf->writeHTMLCell(190, 7, 12, 110, $html, 1, 1, true, 'L');
//..........
$pdf->setFont('Times', '', 10);
$html = '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(190, 7, 12, 118, $html, 0, 1, false, 'L');
//.........
$pdf->setFont('Times', 'BI', 12);
$html = '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(191, 7, 13, 127, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html = '<div><b>1.    </b>      Interpreter\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 134, $html, 0, 1, false, 'L');
//..........
$pdf->setFont('Times', '', 10);
$html = '<div>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 112, 134, $html, 0, 1, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_last_name', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 139);
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 112, 139);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>2.    </b>      Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 1, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_business_org_name', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 152);


//..........

$pdf->setFont('Times', 'BI', 12);
$html = '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 162, $html, 0, 1, true, 'L');

//.......................

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.    </b>  &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 169, $html, 0, 1, false, 'L');

$html = '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 145, 169, $html, 0, 1, false, 'L');
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name_number', 125, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 174);

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('n_600_interpreter_address_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('n_600_interpreter_address_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('n_600_interpreter_address_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$html = '<div>  <input type="checkbox" name="p9apt" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 144, 174, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="p9ste" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 152, 174, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="p9flr" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 161, 174, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_apt_ste_flr_value', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 174);

//.................


$pdf->setFont('Times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 182, $html, 0, 1, false, 'L');


$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 182, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 182, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 187, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_city_town', 117, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 187);



$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("interpreter_mailing_address_state", 25, 7, $Options, array(), array(), 140, 187);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 167, 187);

$pdf->TextField('interpreter_mailing_address_zipcode2', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 192, 187);

//......................
$pdf->setFont('Times', '', 10);
$html = '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_provience', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 200);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 90, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_postal_code', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 90, 200);

//.....................
$pdf->setFont('Times', '', 10);
$html = '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 123, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 200);
//...........
$pdf->setFont('Times', 'I', 12);
$html = '<div><b>Interpreter\'s Contact Information </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 211,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.  </b> Interpreter\'s Daytime Telephone Number </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 220,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 225);

//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>5.  </b> Interpreter\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 220,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_contact_mobile_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 225);
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.  </b> Interpreter\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 232,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_contact_email_address', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 237);


/********************************
 ******** End Page No 10 **********
 *********************************/

/********************************
 ******** Start Page No 11 ********
 *********************************/
$pdf->AddPage('P', 'LETTER'); //page number
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFont('times', '', 12); 
$html = '<div><b>Part 9. Interpreter\'s Contact Information, Certification, and Signature </b> (continued)</div>';
$pdf->writeHTMLCell(140, 12, 13, 18, $html, 1, 1, true, false, 'L', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 154, 19, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(43, 7, 160, 18, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);

//............
$pdf->setFont('Times', 'I', 12);
$html = '<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(190, 6.6, 13, 32, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(90, 7, 12, 38, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html = '<div>I am fluent in English and </div>';
$pdf->writeHTMLCell(190, 7, 12, 44, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certificationion', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 52, 43);
$pdf->setFont('Times', '', 10);
$html = '<div>, which is the same language specified in <b>Part 8., </b> </div>';
$pdf->writeHTMLCell(90, 7, 122, 44, $html, 0, 1, false, 'L');

$html = '<div><b>Item B.</b> in <b>Item Number 1.</b>, and I have read to this applicant in the identified language every question and instructiaction on this application and his
or her answer to every question. The applicant informed me that he or she understands every instruction, question, and answer on the
application, including the <b>Applicant\'s Certification</b> and has verified the accuracy of every answer.</div>';
$pdf->writeHTMLCell(192, 7, 12, 50, $html, 0, 1, false, 'L');

//............
$pdf->setFont('Times', 'BI', 12);
$html = '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 67, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html = '<div><b>7.    &nbsp;   &nbsp; </b>     Interpreter\'s Signature </div>';
$pdf->writeHTMLCell(80, 7, 12, 74, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(128.6, 7, 22, 80, '', 1, 1, false, 'L');

//............

$pdf->setFont('Times', '', 10);
$html = '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 152, 74, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_date_of_signature', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 80);
//.............
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFont('times', '', 12); 
$html = '<div><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing this Application, if Other Than the Applicant </b></div>';
$pdf->writeHTMLCell(190, 12, 13, 92, $html, 1, 1, true, false, 'L', true);
$pdf->setCellHeightRatio(1.1);
$pdf->setFont('Times', '', 10);
$html = '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(100, 7, 12, 108, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1);
$html = '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(190, 7, 12, 115, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div><b>1</b> &nbsp;  &nbsp; Preparer\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(95, 7, 12, 122, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_last_name', 91, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 128);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div>Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 122, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_first_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 128);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 136, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_business_org_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 142);
//.................


$pdf->setFont('Times', 'BI', 12);
$html = '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 162, $html, 0, 1, true, 'L');

//.......................

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.    </b>  &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 169, $html, 0, 1, false, 'L');

$html = '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 145, 169, $html, 0, 1, false, 'L');
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name_number', 125, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 174);

$pdf->setFont('Times', '', 14); // for checkbox
if (showData('n_600_preparer_mailing_address_apt_ste_flr') == "apt") $checked_apt = "checked";else $checked_apt = "";
if (showData('n_600_preparer_mailing_address_apt_ste_flr') == "ste") $checked_ste = "checked";else $checked_ste = "";
if (showData('n_600_preparer_mailing_address_apt_ste_flr') == "flr") $checked_flr = "checked";else $checked_flr = "";

$html = '<div>  <input type="checkbox" name="p9apt" value="apt" checked="' . $checked_apt . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 144, 174, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="p9ste" value="ste" checked="' . $checked_ste . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 152, 174, $html, 0, 1, false, 'L');

$html = '<div>  <input type="checkbox" name="p9flr" value="flr" checked="' . $checked_flr . '" />  </div>';
$pdf->writeHTMLCell(20, 7, 161, 174, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_apt_ste_flr_value', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 173, 174);

//.................
$pdf->setFont('Times', '', 10);
$html = '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 182, $html, 0, 1, false, 'L');


$html = '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 182, $html, 0, 1, false, 'L');


$html = '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 182, $html, 0, 1, false, 'L');

$html = '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 187, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_city_town', 117, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 187);



$Options = array('');
foreach ($allDataCountry as $record) {
	$Options[] = $record->state_code;
}
$pdf->ComboBox("preparer_mailing_address_state", 25, 7, $Options, array(), array(), 140, 187);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 167, 187);

$pdf->TextField('preparer_mailing_address_zipcode2', 11.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 192, 187);

//......................
$pdf->setFont('Times', '', 10);
$html = '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_provience', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 20, 200);
//.............
$pdf->setFont('Times', '', 10);
$html = '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 90, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_postal_code', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 90, 200);

//.....................
$pdf->setFont('Times', '', 10);
$html = '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 123, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 123, 200);
//...........
//.............
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html = '<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 210, $html, 0, 1, true, 'L');

//...............

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.  </b> Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 218, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 224);

//............

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.  </b> Preparer\'s Work Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 218, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_work_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 118, 224);
//.................. 

$pdf->setFont('Times', '', 10);
$html = '<div><b>6.  </b> Preparer\'s Evening Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 233, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_evening_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 18, 239);
/********************************
 ******** End Page No 11 **********
 *********************************/

/********************************
 ******** Start Page No 12 ********
 *********************************/
$pdf->AddPage('P', 'LETTER'); //page number 12
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 10. Contact Information. Declaration, and Signature of the Person
Preparing this Application, if Other Than the Applicant </b> (continued)</div>';
$pdf->writeHTMLCell(132, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$pdf->writeHTMLCell(20, 7, 148, 17, "<b>A-</b>", 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);
//............
$pdf->setFont('Times', 'BI', 12); // set font
$html = '<div>Preparer\'s Statement </div>';
$pdf->writeHTMLCell(190, 7, 13, 33, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10); // set font
$html = '<div><b>7.    &nbsp;   A.     </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 43, $html, 0, 1, false, 'L');
$html = '<div>I am not an attorney or accredited representative but have prepared this application on behalf of <br>
the applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(180, 7, 30, 43, $html, 0, 1, false, 'L');

//..........
$pdf->setFont('Times', '', 10); // set font
$html = '<b>B.</b>';
$pdf->writeHTMLCell(90, 7, 17, 53, $html, 0, 1, false, 'L');
$pdf->setFont('Times', '', 14); // set font
if (showData('n_600_preparer_not_attorney_status') == "Y") $checked = "checked";else $checked = "";
$pdf->writeHTMLCell(90, 7, 23, 43, '<input type="checkbox" name="preparer_statement_7a" value="1" checked="' . $checked . '"  />', 0, 1, false, 'L');
if (showData('n_600_preparer_an_attorney_status') == "Y") $checked = "checked";else $checked = "";
$pdf->writeHTMLCell(90, 7, 23, 53, '<input type="checkbox" name="preparer_statement_7b" value="1" checked="' . $checked . '" />', 0, 1, false, 'L');
if (showData('n_600_preparer_extends_status') == "Y") $checked = "checked";else $checked = "";
$pdf->writeHTMLCell(90, 7, 30, 58, '<input type="checkbox" name="preparer_statement_7b_checkbox1" checked="' . $checked . '" value="1" />', 0, 1, false, 'L');
if (showData('n_600_preparer_not_extends_status') == "Y") $checked = "checked";else $checked = "";
$pdf->writeHTMLCell(90, 7, 48, 58, '<input type="checkbox" name="preparer_statement_7b_checkbox2" checked="' . $checked . '" value="1" />', 0, 1, false, 'L');
$pdf->setFont('Times', '', 10); // set font
$html = '<div> I am an attorney or accredited representative and my representation of the applicant in this case</div>';
$pdf->writeHTMLCell(190, 7, 30, 54, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 36, 59, 'extends', 0, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 53.7, 59, 'does not extend beyond the preparation of this application.', 0, 1, false, 'L');


$html = '<div><b>NOTE:</b> If you are an attorney or accredited representative whose representation extends beyond preparation of this<br>
application, you may be obliged to submit a completed Form G-28, Notice of Entry of Appearance as Attorney or<br>
Accredited Representative, with this application.</div>';
$pdf->writeHTMLCell(190, 7, 30, 65, $html, 0, 1, false, 'L');

$pdf->setFont('Times', 'BI', 12); // set font
$html = '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(190, 7, 13, 83, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10); // set font
$html = "<div>By my signature, I certify, under penalty of perjury, that I prepared this application at the request of the applicant. The applicant then<br>
reviewed this completed application and informed me that he or she understands all of the information contained in, and submitted<br>
with, his or her application, including the Applicant's Certification, and that all of this information is complete, true, and correct. I<br>
completed this application based only on information that the applicant provided to me or authorized me to obtain or use. </div>";
$pdf->writeHTMLCell(200, 7, 12, 91, $html, 0, 1, false, 'L');
$pdf->setFont('Times', 'BI', 12); // set font
$html = '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(190, 7, 13, 112, $html, 0, 1, true, 'L');
$pdf->setFont('Times', '', 10);
$html = '<div><b>8.    &nbsp;   &nbsp; </b>     Preparer\'s Signature </div>';
$pdf->writeHTMLCell(80, 7, 12, 119.6, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(133.5, 7, 21.5, 125, '', 1, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 154, 119.6, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('preparer_date_of_signature', 46.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 157, 125);

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
 $html = '<div><b>Part 11. Additional Information </b></div>';
 $pdf->writeHTMLCell(138, 6.5, 13, 19, $html, 1, 1, true, 'L');
 //............
 $pdf->setFont('Times', '', 12);
 $pdf->writeHTMLCell(20, 0, 153, 19, '<b>A-</b>', 0, 1, false, 'L');
 $pdf->writeHTMLCell(45, 6.5, 159, 19, showData('other_information_about_you_alien_registration_number'), 1, 1, false, 'L');
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.<br>
Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item</b><br>
<b>Number</b> to which your answer refers; and sign and date each sheet. ', '', 1, false, 'L');
 //...............
 $pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 96.5, 46, 'Given Name (First Name)', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 156, 46, 'Middle Name', '', 1, false, 'L');
 //.....................
 $pdf->setFont('courier', 'B', 10);
 $pdf->TextField('p11_additional_info_family_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
 $pdf->TextField('p11_additional_info_given_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 97, 51);
 $pdf->TextField('p11_additional_info_middle_name', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 157, 51);
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>A-</b>', '', 1, false, 'L');
 //.....................
 $pdf->Image('images/right_angle.jpg', 50, 61, 3.3, 3.3);
 $pdf->setFont('courier', 'B', 10);
 $pdf->TextField('p11_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 61, 60);


 //............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 50, 67, '<b>B.</b>&nbsp;&nbsp;Part Number  ', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 81, 67, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 18, 81, '<b>D.</b>', '', 1, false, 'L');
 //.....................
 $pdf->setFont('courier', 'B', 10);
 $pdf->TextField('p11_additional_info_3a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 72);
 $pdf->TextField('p11_additional_info_3b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 72);
 $pdf->TextField('p11_additional_info_3c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 72);
 $pdf->setCellHeightRatio(1.8);
 $pdf->TextField('p11_additional_info_3d', 180, 27, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_3d')), 24, 81);
 $pdf->setCellHeightRatio(1.2);
 
 //.................
 $pdf->writeHTMLCell(179.2, 1, 24.2, 82, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 89, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 95.5, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 102, '', "B", 1, false, 'L');
 
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 110.4, '<b>4.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 50, 110.4, '<b>B.</b>&nbsp;&nbsp;Part Number ', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 81, 110.4, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 18, 125, '<b>D.</b>', '', 1, false, 'L');
 //.....................
 $pdf->setFont('courier', 'B', 10);
 $pdf->TextField('p11_additional_info_4a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 116);
 $pdf->TextField('p11_additional_info_4b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 116);
 $pdf->TextField('p11_additional_info_4c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 116);
 $pdf->setCellHeightRatio(1.8);
 $pdf->TextField('p11_additional_info_4d', 180, 27, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_4d')), 24, 125.2);
 $pdf->setCellHeightRatio(1.2);
 
 //.................
 $pdf->writeHTMLCell(179.2, 1, 24.2, 126.5, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 133, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 139.5, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 146, '', "B", 1, false, 'L');
 //..............
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 153.4, '<b>5.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 50, 153.4, '<b>B.</b>&nbsp;&nbsp;Part Number ', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 81, 153.4, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 18, 167, '<b>D.</b>', '', 1, false, 'L');
 //.....................
 $pdf->setFont('courier', 'B', 10);
 $pdf->TextField('p11_additional_info_5a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 158.4);
 $pdf->TextField('p11_additional_info_5b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 158.4);
 $pdf->TextField('p11_additional_info_5c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 158.4);
 $pdf->setCellHeightRatio(1.8);
 $pdf->TextField('p11_additional_info_5d', 180, 32, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_5d')), 24, 167.4);
 $pdf->setCellHeightRatio(1.5);
 
 //.................
 $pdf->writeHTMLCell(179.2, 1, 24.2, 167, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 173, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 179, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 185, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 191.4, '', "B", 1, false, 'L');
 //..............
 $pdf->setCellHeightRatio(1.2);
 $pdf->setFont('Times', '', 10);
 $pdf->writeHTMLCell(197, 5, 12, 198.5, '<b>6.&nbsp;&nbsp;&nbsp;&nbsp;A.</b>&nbsp;&nbsp;Page Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 50, 198.5, '<b>B.</b>&nbsp;&nbsp;Part Number ', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 81, 198.5, '<b>C.</b>&nbsp;&nbsp;Item Number', '', 1, false, 'L');
 $pdf->writeHTMLCell(197, 5, 18, 211.5, '<b>D.</b>', '', 1, false, 'L');
 //.....................
 $pdf->setFont('courier', 'B', 10);
 $pdf->TextField('p11_additional_info_6a', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 24, 203.4);
 $pdf->TextField('p11_additional_info_6b', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 56, 203.4);
 $pdf->TextField('p11_additional_info_6c', 23, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 87.5, 203.4);
 $pdf->setCellHeightRatio(1.8);
 $pdf->TextField('p11_additional_info_6d', 180, 32, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('n_600_additional_info_6d')), 24, 212.7);
 $pdf->setCellHeightRatio(1.2);
 //.................
 $pdf->writeHTMLCell(179.2, 1, 24.2, 213, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 219.5, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 226, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 232, '', "B", 1, false, 'L');
 $pdf->writeHTMLCell(179.2, 1, 24.2, 238, '', "B", 1, false, 'L');
/******************************
 ******** End Page No 13 *******
 ******************************/

/******************************
 ******** Start Page No 14 *****
 ******************************/
$pdf->AddPage('P', 'LETTER'); 

$pdf->setFont('Times', 'B', 11.5);
$html = '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOTE: Do not complete Parts 12. and 13. unless the USCIS officer instructs you to do so at the interview.</div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 0, false, 'L');
//........

$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 12.  Affidavit </b> (do <b>NOT</b> complete this part unless instructed to do so
<b>AT THE INTERVIEW</b>)</div>';
$pdf->writeHTMLCell(132, 7, 13, 27, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 28, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 27, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);

//.......

$pdf->setFont('Times', '', 10);
$html = '<div>I, the (applicant, parent, or legal guardian)<b>____________________________________________________ </b>do swear or affirm, under penalty of perjury under the laws of the United States, that I know and understand the contents of this application signed by me, and
the attached supplementary pages number<b>_____</b> to<b> _____ </b>inclusive, that the same are true and correct to the best of my knowledge. and that corrections number<b>______</b> to<b> ______</b>were made by me or at my request.</div>';
$pdf->writeHTMLCell(191, 7, 13, 42, $html, 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html = '<div>Applicant\'s, Parent\'s, or Legal Guardian\'s Signature</div>';
$pdf->writeHTMLCell(100, 7, 13, 63, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(136, 7, 14, 68, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 6.8, 150, 63, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
// $pdf->TextField('p12_applicants_guardian_signature_date', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 68);
$pdf->writeHTMLCell(50, 7, 153, 68, "", 1, 0, false, true, 'J', true);

//.........
$pdf->setFont('Times', '', 10);
$html = '<div>Subscribed and sworn or affirmed before me upon examination of the applicant (parent, legal, guardian) on</div>';
$pdf->writeHTMLCell(191, 7, 13, 80, $html, 0, 0, false, 'L');
$html = '<div>Date(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 168, 87, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
// $pdf->TextField('p12_applicants_date_of_signature', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 68);
// $pdf->TextField('p12_applicants_date_of_signature_2',35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 168, 80);
$pdf->writeHTMLCell(50, 7, 153, 68, "", 1, 0, false, true, 'J', true);
$pdf->writeHTMLCell(35, 7, 168, 80, "", 1, 0, false, true, 'J', true);

//.....
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(92, 7, 12, 86, '<div>at</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(10, 7, 96, 88.4, '.', '', 1, false, 'L');
$html = '<div>(Location)</div>';
$pdf->writeHTMLCell(92, 7, 50, 92, $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
// $pdf->TextField('p12_applicants_location',80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 17, 86);
$pdf->writeHTMLCell(80, 7, 17, 86, "", 1, 0, false, true, 'J', true);
//..........


$pdf->setFont('Times', '', 10);
$html = '<div>USCIS Officer\'s Printed Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 100, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
// $pdf->TextField('p12_uscis_officer_printed_name',93, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 105);
// $pdf->TextField('p12_uscis_officer_printed_title',93, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),110, 105);
$pdf->writeHTMLCell(93, 7, 13, 105, "", 1, 0, false, true, 'J', true);
$pdf->writeHTMLCell(93, 7, 110, 105, "", 1, 0, false, true, 'J', true);

//.....
$pdf->setFont('Times', '', 10);
$html = '<div>USCIS Officer\'s Title</div>';
$pdf->writeHTMLCell(90, 7, 109, 100, $html, 0, 1, false, 'L');

//.........
$pdf->setFont('Times', '', 10);
$html = '<div>USCIS Officer\'s Signature</div>';
$pdf->writeHTMLCell(100, 7, 13, 115, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(135.5, 7, 13, 120,'', 1, 1, false, 'L');

//........
$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 115, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
// $pdf->TextField('p12_uscis_officer_sign_date',50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 120);
$pdf->writeHTMLCell(50, 7, 153, 120, "", 1, 0, false, true, 'J', true);

//.........
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 13.  Officer Report and Recommendation on Application for Certificate of Citizenship<br>
</b>(for USCIS use <b>ONLY</b>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 134, $html, 1, 1, true, false, 'J', true);

//........
$pdf->SetFont('times', '', 10); // set font
$html = '<div>On the basis of the documents, records, the testimony of persons examined, and the identification upon personal appearance of the
underage beneficiary, I find that all the facts and conclusions set forth under oath in this application are:</div>';
$pdf->writeHTMLCell(190, 7, 13, 148, $html, 0, 0, false, true, 'J', true);

//.....

$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 13, 160, '<b>1.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 27, 160, 'True and correct', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 20, 159, '<input type="checkbox" name="true_correct" value="T" checked="" />', 0, 0, false, true, 'L', true);

//...............
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(190, 7, 13, 167, '<b>2.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 27, 167, 'The applicant derived or acquired U.S. citizenship on', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 20, 166, '<input type="checkbox" name="applicant_drived" value="A" checked="" />', 0, 0, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10); 
$html = '<div>Date(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 113, 173, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->writeHTMLCell(50, 7, 105.5, 166, "", 1, 0, false, true, 'J', true);
// $pdf->TextField('p13_us_citizen_date',50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 105.5, 166);

//...............
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(190, 7, 13, 178, '<b>3.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 27, 178, 'The applicant derived or acquired U.S. citizenship through (Select the box next to the appropriate section of law, or if the<br>
section of law is not reflected, type or print the applicable section of law in the space next to “Other.”)', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 20, 177, '<input type="checkbox" name="applicant_aquired" value="A" checked="" />', 0, 0, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 21, 188, '<b>A.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 34, 188, 'INA Section 301', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 26.6, 187, '<input type="checkbox" name="A3" value="A" checked="" />', 0, 0, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 21, 195, '<b>B.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 34, 195, 'INA Section 309', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 26.6, 194, '<input type="checkbox" name="B3" value="A" checked="" />', 0, 0, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 21, 202, '<b>C.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 34, 202, 'INA Section 320', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 26.6, 201, '<input type="checkbox" name="C3" value="A" checked="" />', 0, 0, false, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 21, 209, '<b>D.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 34, 209, 'INA Section 321', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 26.6, 208, '<input type="checkbox" name="D3" value="A" checked="" />', 0, 0, false, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 21, 216, '<b>E.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 34, 216, 'Other', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 26.6, 215, '<input type="checkbox" name="E3" value="A" checked="" />', 0, 0, false, true, 'L', true);
//.......
$pdf->setFont('courier', 'B', 10);
$pdf->writeHTMLCell(158, 7, 45, 216, "", 1, 0, false, true, 'J', true);
// $pdf->TextField('p13_3e_other_value',158, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 216);
//.............
$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 13, 225, '<b>4.</b>', 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(190, 7, 27, 225, 'The applicant has not been expatriated since that time', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 20, 224, '<input type="checkbox" name="expatriated" value="A" checked="" />', 0, 0, false, true, 'L', true);
/******************************
 ******** End Page No 14 *******
 ******************************/

/******************************
 ******** Start Page No 15 *****
 ******************************/
$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 0.5, 1, 1); 
$pdf->SetFont('times', '', 12); // set font
$html = '<div><b>Part 13.  Officer Report and Recommendation on Application for Certificate of Citizenship
</b>(for USCIS use <b>ONLY</b>) (Continued)</div>';
$pdf->writeHTMLCell(132, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html = '<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 17, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, showData('other_information_about_you_alien_registration_number'), 1, 0, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>I recommend that this Form N-600 be:</div>';
$pdf->writeHTMLCell(190, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 80, 30, '<b>Approved</b>', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 73, 29.5, '<input type="checkbox" name="approved" value="1" checked="" />', 0, 0, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);  // set font
$pdf->writeHTMLCell(190, 7, 105, 30, '<b>Denied</b>', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 98, 29.5, '<input type="checkbox" name="denied" value="1" checked="" />', 0, 0, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<div>Issue Certificate of Citizenship in the name of</div>';
$pdf->writeHTMLCell(190, 7, 12, 37, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->writeHTMLCell(65, 7, 12, 47,  '<div>Family Name (Last Name)</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(65, 7, 84, 47,  '<div>Given Name (First Name)</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 153, 47, '<div>Middle Name</div>', 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10);
$pdf->writeHTMLCell(70, 7, 13, 52, "", 1, 0, false, true, 'J', true);
$pdf->writeHTMLCell(67, 7, 85, 52, "", 1, 0, false, true, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 52, "", 1, 0, false, true, 'J', true);

// $pdf->TextField('p13_family_name',70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 52);
// $pdf->TextField('p13_given_name',67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 85, 52);
// $pdf->TextField('p13_middle_name',50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 52);
//.......................
$pdf->SetFont('times', '', 10); 
$html = '<div>USCIS Officer\'s Printed Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 1, false, 'L');
$html = '<div>USCIS Officer\'s Title</div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->writeHTMLCell(96, 7, 13, 65,"", 1, 0, false, true, 'J', true);
$pdf->writeHTMLCell(91, 7, 113,65, "", 1, 0, false, true, 'J', true);

// $pdf->TextField('p13_uscis_officer_name',96, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 13, 65);
// $pdf->TextField('p13_uscis_officer_titel',91, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 113, 65);
//.......................
$pdf->setFont('Times', '', 10);
$html = '<div>USCIS Officer\'s Signature</div>';
$pdf->writeHTMLCell(100, 7, 13, 75, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(137, 7, 13, 80, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 75, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->writeHTMLCell(51, 7, 153, 80, "", 1, 0, false, true, 'J', true);
// $pdf->TextField('p13_uscis_officer_sign_date',51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 80);

$pdf->writeHTMLCell(191, 1, 13, 87, '', "B", 1, false, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<div>         </div>';
$pdf->writeHTMLCell(190, 7, 12, 95, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 10);  
$pdf->writeHTMLCell(190, 7, 17.5, 95, 'I do', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 11.5, 94, '<input type="checkbox" name="i_do" value="1" checked="" />', 0, 0, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(190, 7, 32.2, 95, 'do not concur with the USCIS Officer\'s recommendation of Form N-600.', 0, 0, false, true, 'J', true);
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(190, 7, 26, 94, '<input type="checkbox" name="i_dont" value="1" checked="" />', 0, 0, false, true, 'L', true);



//........

$pdf->setFont('Times', '', 10);
$html = '<div>USCIS District Director\'s or Field Office Director\'s Signature</div>';
$pdf->writeHTMLCell(120, 7, 13, 102, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(137, 7, 13, 107, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html = '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 102, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->writeHTMLCell(51, 7, 153, 107, "", 1, 0, false, true, 'J', true);
// $pdf->TextField('p13_district_director_sign',51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 153, 107);



  
           



$js = "
var fields = {
	'attorney_statebar_number':' $attorneyData->bar_number',
	'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',
	'digit_a_number':' " . showData('other_information_about_you_alien_registration_number') . "',
	'application_other_explain':' " . showData('information_about_you_application_filed_other_value') . "',
	'about_you_legal_last_name':' " . showData('information_about_you_family_last_name') . "',
	'about_you_legal_first_name':' " . showData('information_about_you_given_first_name') . "',
	'about_you_legal_middle_name':' " . showData('information_about_you_middle_name') . "',
	'about_you_exact_last_name':' " . showData('information_about_you_permanent_resident_family_last_name') . "',
	'about_you_exact_first_name':' " . showData('information_about_you_permanent_resident_given_first_name') . "',
	'about_you_exact_middle_name':' " . showData('information_about_you_permanent_resident_middle_name') . "',
	'about_you_since_birth_last_name1':' " . showData('information_about_you_other_family_last_name') . "',
	'about_you_since_birth_middle_name1':' " . showData('information_about_you_other_given_first_name') . "',
	'about_you_since_birth_first_name1':' " . showData('information_about_you_other_middle_name') . "',
    'about_you_since_birth_last_name2':' " . showData('information_about_you_other_family_last_name2') . "',
	'about_you_since_birth_middle_name2':' " . showData('information_about_you_other_given_first_name2') . "',
	'about_you_since_birth_first_name2':' " . showData('information_about_you_other_middle_name2') . "',
	'about_you_us_social_security_number':' " . showData('other_information_about_you_social_security_number') . "',
	'about_you_us_online_account_number':' " . showData('other_information_about_you_uscis_online_account_number') . "',
	'about_you_date_of_birth':' " . showData('other_information_about_you_date_of_birth') . "',
	'about_you_country_of_birth':' " . showData('other_information_about_you_country_of_birth') . "',
	'about_you_country_of_prior_citizenship':' " . showData('other_information_about_you_country_of_citizen') . "',
//page 1 end.................

	'part2_information_about_you_in_care_of':' " . showData('information_about_you_us_mailing_care_of_name') . "',
	'part2_information_about_you_street_number':' " . showData('information_about_you_us_mailing_street_number') . "',
	'mailing_apt_ste_flr_value':' " . showData('information_about_you_us_mailing_apt_ste_flr_value') . "',
	'part2_information_about_you_city_town':' " . showData('information_about_you_us_mailing_city_town') . "',
	'part2_10_state':' " . showData('information_about_you_us_mailing_state') . "',
	'part2_information_about_you_zipcode':' " . showData('information_about_you_us_mailing_zip_code_value1') . "',
	'part2_information_about_you_zipcode1':' " . showData('information_about_you_us_mailing_zip_code_value2') . "',
	'part2_information_about_you_foreign_region':' " . showData('information_about_you_us_mailing_foreign_province') . "',
	'part2_information_about_you_foreign_postalcode':' " . showData('information_about_you_us_mailing_foreign_postal_code') . "',
	'part2_information_about_you_foreign_country':' " . showData('information_about_you_us_mailing_foreign_country') . "',
	'part2_physical_address_street_number':' " . showData('information_about_you_home_street_number') . "',
	'physical_address_apt_ste_flr_value':' " . showData('information_about_you_home_apt_ste_flr_value') . "',
	'part2_information_physical_city_town':' " . showData('information_about_you_home_city_town') . "',
	'part2_11_state':'  " . showData('information_about_you_home_state') . "',
	'part2_information_about_physical_zipcode':' " . showData('information_about_you_home_zip_code_value1') . "',
	'part2_information_about_physical_zipcode1':' " . showData('information_about_you_home_zip_code_value2') . "',
	'part2_information_about_physical_foreign_region':' " . showData('information_about_you_home_province') . "',
	'part2_information_about_physical_foreign_postalcode':' " . showData('information_about_you_home_postal_code') . "',
	'part2_information_about_physical_foreign_country':' " . showData('information_about_you_home_country') . "',
	'marital_other_explain':' " . showData('other_information_about_you_marital_other_value') . "',
	'part2_information_proentry_city_town':' " . showData('other_information_about_you_place_of_entry_city_town') . "',
	'part2_proentry_state':' " . showData('information_about_you_port_of_entry_state') . "',
	'part2_information_proentry_date_of_entry':' " . showData('other_information_about_you_date_of_entry') . "',
	'part2_information_admission_lastname':' " . showData('i_94_family_last_name') . "',
	'part2_information_admission_firstname':' " . showData('i_94_given_first_name') . "',
	'part2_information_admission_middlename':' " . showData('i_94_middle_name') . "',
	'part2_information_passport_number':' " . showData('other_information_about_you_passport_number') . "',
	'part2_information_travel_document_number':' " . showData('other_information_about_you_travel_document_number') . "',
	'part2_information_country_issue_passport':' " . showData('i_94_imgt_country_issuance_passport') . "',
	'part2_information_date_issue_passport':' " . showData('i_94_imgt_date_issuance_passport') . "',
//page 2 end...............	

	'part2_other_explain':' " . showData('information_about_you_lpr_refugee_value') . "',
	'part2_information_date_became_lpr':' " . showData('information_about_you_date_became_lpr') . "',
	'part2_information_location_where_admited':' " . showData('information_about_you_uscis_granted_lpr') . "',
	'have_you_applied_previously':' " . showData('information_about_you_applied_us_passport') . "',
	'have_you_abandoned_lost_lpr':' " . showData('information_about_you_have_lost_lpr') . "',
	'part2_information_adoption_city_town':' " . showData('information_about_you_place_of_adoption_city_town') . "',
	'part2_adoption_state':' " . showData('information_about_you_place_of_adoption_state') . "',
	'part2_information_adoption_country':' " . showData('information_about_you_place_of_adaption_country') . "',
	'part2_information_date_adoption':' " . showData('information_about_you_date_of_adoption') . "',
	'part2_information_date_custody_began':' " . showData('information_about_you_date_legal_custody') . "',
	'part2_information_date_physical_custody_began':' " . showData('information_about_you_date_physical_custody') . "',
	'part2_information_re_adoption_city_town':' " . showData('information_about_you_re_adopted_city_town') . "',
	'part2_re_adoption_state':' " . showData('information_about_you_re_adopted_state') . "',
	'part2_information_re_adoption_country':' " . showData('information_about_you_re_adopted_country') . "',
	'part2_information_date_re_adoption':' " . showData('information_about_you_date_of_re_adoption') . "',
	'part2_information_date_re_adoption_custody_began':' " . showData('information_about_you_date_re_legal_custody') . "',
	'part2_information_date_physicalre_adoption_custody_began':' " . showData('information_about_you_date_re_physical_custody') . "',
//page 3 end...............

	'part2_information_date_left_unitedstates':' " . showData('information_about_you_date_left_us') . "',
	'part2_information_date_return_unitedstates':' " . showData('information_about_you_date_returned_us') . "',
	'part2_information_place_of_entry_return':' " . showData('information_about_you_place_of_entry_city_town') . "',
	'part2_place_of_entry_return_state':' " . showData('information_about_you_place_of_entry_state') . "',
	'part2_information_date_return_unitedstates2':' " . showData('information_about_you_date_left_us2') . "',
	'part2_information_date_left_unitedstates2':' " . showData('information_about_you_date_returned_us2') . "',
	'part2_information_place_of_entry_return2':' " . showData('information_about_you_place_of_entry_city_town2') . "',
	'part2_22f_state':' " . showData('information_about_you_place_of_entry_state2') . "',
	'biographic_height_feet':' " . showData('biographic_info_height_feet') . "',
	'biographic_height_inches':' " . showData('biographic_info_height_inches') . "',
	'biographic_weight_pound1':' " . showData('biographic_info_weight_in_pound1') . "',
	'biographic_weight_pound2':' " . showData('biographic_info_weight_in_pound2') . "',
	'biographic_weight_pound3':' " . showData('biographic_info_weight_in_pound3') . "',
	'part4_about_you_biological_father_last_name':' " . showData('biological_father_family_last_name') . "',
	'part4_about_you_biological_father_first_name':' " . showData('biological_father_given_first_name') . "',
	'part4_about_you_biological_father_middle_name':' " . showData('biological_father_middle_name') . "',
//page 4 end...............	

	'part4_about_you_biological_father_date_of_birth':' " . showData('biological_father_date_of_birth') . "',
	'part4_about_you_biological_father_country_birth':' " . showData('biological_father_country_of_birth') . "',
	'part4_about_you_biological_father_nationality':' " . showData('biological_father_country_of_citizen') . "',
	'part4_father_physical_address_street_number':' " . showData('biological_father_street_number') . "',
	'father_physical_apt_ste_flr_value':' " . showData('biological_father_apt_ste_flr_value') . "',
	'part4_information_father_physical_city_town':' " . showData('biological_father_city_town') . "',
	'part4_father_physical_state':' " . showData('biological_father_state') . "',
	'part4_information_father_physical_zipcode':' " . showData('biological_father_zip_code_value1') . "',
	'part4_information_father_physical_zipcode1':' " . showData('biological_father_zip_code_value2') . "',
	'part4_information_father_physical_foreign_region':' " . showData('biological_father_province') . "',
	'part4_information_father_physical_foreign_postalcode':' " . showData('biological_father_postal_code') . "',
	'part4_information_father_physical_foreign_country':' " . showData('biological_father_country') . "',
	'father_certificate_of_citizenship_number':' " . showData('biological_father_citizenship_number') . "',
	'father_alien_reg_number':' " . showData('biological_father_a_number') . "',
	'father_place_of_naturalization':' " . showData('biological_father_place_of_naturalization') . "',
	'part4_information_place_naturalization_city':' " . showData('biological_father_citizen_by_city_town') . "',
	'part4_place_of_naturalization_state':' " . showData('biological_father_citizen_by_state') . "',
	'part4_about_father_certificate_of_naturalization':' " . showData('biological_father_naturalization_number') . "',
	'part4_about_father_a_number':' " . showData('biological_father_citizen_by_a_number') . "',
	'part4_about_father_date_of_naturalization':' " . showData('biological_father_date_of_naturalization') . "',
	'part4_about_how_many_married':' " . showData('biological_father_how_many_times_married') . "',
	'citizen_father_marital_other_explain':' " . showData('biological_father_marital_other_value') . "',
//page 5 end...............	

	'part4_us_father_current_spouse_lastname':' " . showData('biological_father_current_spouse_family_last_name') . "',
	'part4_us_father_current_spouse_firstname':' " . showData('biological_father_current_spouse_given_first_name') . "',
	'part4_us_father_current_spouse_middlename':' " . showData('biological_father_current_spouse_family_middle_name') . "',
	'part4_us_father_current_spouse_date_of_birth':' " . showData('biological_father_current_spouse_date_of_birth') . "',
	'part4_us_father_current_spouse_country_of_birth':' " . showData('biological_father_current_spouse_country_of_birth') . "',
	'part4_us_father_current_spouse_nationality':' " . showData('biological_father_current_spouse_nationality') . "',
	'part4_us_father_current_spouse_street':' " . showData('biological_father_current_spouse_street_number') . "',
	'part4_us_father_apt_ste_flr_value':' " . showData('biological_father_current_spouse_apt_ste_flr_value') . "',
	'part4_us_father_current_spouse_city_town':' " . showData('biological_father_current_spouse_city_town') . "',
	'part4_us_father_current_spouse_state':' " . showData('biological_father_current_spouse_state') . "',
	'part4_us_father_current_spouse_zipcode1':' " . showData('biological_father_current_spouse_zip_code_value1') . "',
	'part4_us_father_current_spouse_zipcode2':' " . showData('biological_father_current_spouse_zip_code_value2') . "',
	'part4_us_father_current_spouse_province':' " . showData('biological_father_current_spouse_province') . "',
	'part4_us_father_current_spouse_postalcode':' " . showData('biological_father_current_spouse_postal_code') . "',
	'part4_us_father_current_spouse_foreign_country':' " . showData('biological_father_current_spouse_country') . "',
	'part4_us_father_current_spouse_date_of_mariage':' " . showData('biological_father_current_spouse_date_of_marriage') . "',
	'part4_us_father_current_spouse_city_of_mariage':' " . showData('biological_father_current_spouse_marriage_city_town') . "',
	'part4_biological_father_current_spouse_marriage_state':' " . showData('biological_father_current_spouse_marriage_state') . "',
	'part4_us_father_current_spouse_country_of_mariage':' " . showData('biological_father_current_spouse_marriage_country') . "',
	'spouse_immigration_other_explain':' " . showData('biological_father_spouse_immigration_other_value') . "',
	'part5_us_mother_lastname':' " . showData('biological_mother_family_last_name') . "',
	'part5_us_mother_firstname':' " . showData('biological_mother_given_first_name') . "',
	'part5_us_mother_middlename':' " . showData('biological_mother_middle_name') . "',
	'part5_us_mother_date_of_birth':' " . showData('biological_mother_date_of_birth') . "',
	'part5_us_mother_country_of_birth':' " . showData('biological_mother_country_of_birth') . "',
	'part5_us_mother_citizenship':' " . showData('biological_mother_country_of_citizen') . "',
//page 6 end...............	

	'part5_information_mother_physical_street':' " . showData('biological_mother_street_number') . "',
	'part5_information_mother_apt_ste_flr_value':' " . showData('biological_mother_apt_ste_flr_value') . "',
	'part5_information_mother_physical_city':' " . showData('biological_mother_city_town') . "',
	'part5_information_mother_physical_state':' " . showData('biological_mother_state') . "',
	'part5_information_mother_physical_zipcode':' " . showData('biological_mother_zip_code_value1') . "',
	'part5_information_mother_physical_zipcode1':' " . showData('biological_mother_zip_code_value2') . "',
	'part5_information_mother_physical_foreign_region':' " . showData('biological_mother_province') . "',
	'part5_information_mother_physical_postalcode':' " . showData('biological_mother_postal_code') . "',
	'part5_information_mother_physical_country':' " . showData('biological_mother_country') . "',
	'part5_certificate_of_citizenship_number':' " . showData('biological_mother_citizenship_number') . "',
	'part5_mother_a_number':' " . showData('biological_mother_a_number') . "',
	'part5_mother_place_of_naturalization':' " . showData('biological_mother_place_of_naturalization') . "',
	'part4_information_mother_place_naturalization_city':' " . showData('biological_mother_citizen_by_city_town') . "',
	'part4_mother_place_of_naturalization_state':' " . showData('biological_mother_citizen_by_state') . "',
	'part5_about_mother_certificate_of_naturalization':' " . showData('biological_mother_naturalization_number') . "',
	'part5_about_mother_a_number':' " . showData('biological_mother_citizen_by_a_number') . "',
	'part5_about_mother_date_of_naturalization':' " . showData('biological_mother_date_of_naturalization') . "',
	'part5_about_mother_how_many_married':' " . showData('biological_mother_how_many_times_married') . "',
	'citizen_mother_marital_other_explain':' " . showData('biological_mother_marital_other') . "',
	'part5_us_mother_current_spouse_lastname':' " . showData('biological_mother_current_spouse_family_last_name') . "',
	'part5_us_mother_current_spouse_firstname':' " . showData('biological_mother_current_spouse_given_first_name') . "',
	'part5_us_mother_current_spouse_middlename':' " . showData('biological_mother_current_spouse_family_middle_name') . "',
	'part5_us_mother_current_spouse_date_of_birth':' " . showData('biological_mother_current_spouse_date_of_birth') . "',
	'part5_us_mother_current_spouse_country_of_birth':' " . showData('biological_mother_current_spouse_country_of_birth') . "',
//page 7 end...............	

	'part5_us_mother_current_spouse_nationality':' " . showData('biological_mother_current_spouse_nationality') . "',
	'part5_us_mother_current_spouse_street':' " . showData('biological_mother_current_spouse_street_number') . "',
	'part5_information_mother_apt_ste_flr_value2':' " . showData('biological_mother_current_spouse_apt_ste_flr_value') . "',
	'part5_us_mother_current_spouse_city_town':' " . showData('biological_mother_current_spouse_city_town') . "',
	'part5_us_mother_current_spouse_state':' " . showData('biological_mother_current_spouse_state') . "',
	'part5_us_mother_current_spouse_zipcode1':' " . showData('biological_mother_current_spouse_zip_code_value1') . "',
	'part5_us_mother_current_spouse_zipcode2':' " . showData('biological_mother_current_spouse_zip_code_value2') . "',
	'part5_us_mother_current_spouse_foreign_region':' " . showData('biological_mother_current_spouse_province') . "',
	'part5_us_mother_current_spouse_postalcode':' " . showData('biological_mother_current_spouse_postal_code') . "',
	'part5_us_mother_current_spouse_foreign_country':' " . showData('biological_mother_current_spouse_country') . "',
	'part5_us_mother_current_spouse_date_of_mariage':' " . showData('biological_mother_current_spouse_date_of_marriage') . "',
	'part5_us_mother_current_spouse_city_of_mariage':' " . showData('biological_mother_current_spouse_marriage_city_town') . "',
	'part5_us_mother_current_spouse_state_of_mariage':' " . showData('biological_mother_current_spouse_marriage_state') . "',
	'part5_us_mother_current_spouse_country_of_mariage':' " . showData('biological_mother_current_spouse_marriage_country') . "',
	'spouse_immigration_other':' " . showData('biological_mother_spouse_immigration_other_value') . "',
	'physical_presence_a_from':' " . showData('physical_presence_from_date1') . "',
	'physical_presence_a_to':' " . showData('physical_presence_to_date1') . "',
	'physical_presence_b_from':' " . showData('physical_presence_from_date2') . "',
	'physical_presence_b_to':' " . showData('physical_presence_to_date2') . "',
	'physical_presence_c_from':' " . showData('physical_presence_from_date3') . "',
	'physical_presence_c_to':' " . showData('physical_presence_to_date3') . "',
	'physical_presence_d_from':' " . showData('physical_presence_from_date4') . "',
	'physical_presence_d_to':' " . showData('physical_presence_to_date4') . "',
	'physical_presence_e_from':' " . showData('physical_presence_from_date5') . "',
	'physical_presence_e_to':' " . showData('physical_presence_to_date5') . "',
	'physical_presence_f_from':' " . showData('physical_presence_from_date6') . "',
	'physical_presence_f_to':' " . showData('physical_presence_to_date6') . "',
	'physical_presence_g_from':' " . showData('physical_presence_from_date7') . "',
	'physical_presence_g_to':' " . showData('physical_presence_to_date7') . "',
	'physical_presence_h_from':' " . showData('physical_presence_from_date8') . "',
	'physical_presence_h_to':' " . showData('physical_presence_to_date8') . "',
//page 8 end...............	

	'physical_presence_date_of_service_a_from':' " . showData('mlitary_service_date_of_service_from_date1') . "',
	'physical_presence_date_of_service_a_to':' " . showData('mlitary_service_date_of_service_to_date1') . "',
	'physical_presence_date_of_service_b_from':' " . showData('mlitary_service_date_of_service_from_date2') . "',
	'physical_presence_date_of_service_b_to':' " . showData('mlitary_service_date_of_service_to_date2') . "',
	'part_8_aplicant_statement':' " . showData('n_600_applicant_a_lnaguage') . "',
	'part_8_aplicant_statement_regarding_preparer':' " . showData('n_600_applicant_regarding_preparer_value') . "',
	'part_8_aplicant_contact_daytime_telephone':' " . showData('n_600_applicant_daytime_tel') . "',
	'part_8_aplicant_contact_mobile_telephone':' " . showData('n_600_applicant_mobile') . "',
	'part_8_aplicant_contact_email_address':' " . showData('n_600_applicant_email') . "',
//page 9 end...............	

	'part_8_applicant_date_of_signature':' " . showData('i_600_applicant_sign_date') . "',
	'part_9_interpreter_last_name':' " . showData('n_600_interpreter_family_last_name') . "',
	'part_9_interpreter_first_name':' " . showData('n_600_interpreter_given_first_name') . "',
	'interpreter_business_org_name':' " . showData('n_600_interpreter_business_name') . "',
	'interpreter_mailing_address_street_name_number':' " . showData('n_600_interpreter_address_street_number') . "',
	'interpreter_mailing_address_apt_ste_flr_value':' " . showData('n_600_interpreter_address_apt_ste_flr_value') . "',
	'interpreter_mailing_address_city_town':' " . showData('n_600_interpreter_address_city_town') . "',
	'interpreter_mailing_address_state':' " . showData('n_600_interpreter_address_state') . "',
	'interpreter_mailing_address_zipcode1':' " . showData('n_600_interpreter_address_zip_code_value1') . "',
	'interpreter_mailing_address_zipcode2':' " . showData('n_600_interpreter_address_zip_code_value2') . "',
	'interpreter_mailing_address_provience':' " . showData('n_600_interpreter_address_province') . "',
	'interpreter_mailing_address_postal_code':' " . showData('n_600_interpreter_address_postal_code') . "',
	'interpreter_mailing_address_country':' " . showData('n_600_interpreter_address_country') . "',
	'part_9_interpreter_contact_daytime_telephone':' " . showData('n_600_interpreter_daytime_tel') . "',
	'part_9_interpreter_contact_mobile_telephone':' " . showData('n_600_interpreter_mobile') . "',
	'part_9_interpreter_contact_email_address':' " . showData('n_600_interpreter_email') . "',
//page 10 end...............	

	'interpreter_certificationion':' " . showData('n_600_interpreter_certification_language_skill') . "',
	'interpreter_date_of_signature':' " . showData('n_600_interpreter_sign_date') . "',
	'preparer_last_name':' " . showData('n_600_preparer_family_last_name') . "',
	'preparer_first_name':' " . showData('n_600_preparer_family_given_first_name') . "',
	'preparer_business_org_name':' " . showData('n_600_preparer_business_name') . "',
	'preparer_mailing_address_street_name_number':' " . showData('n_600_preparer_mailing_address_street_number') . "',
	'preparer_mailing_address_apt_ste_flr_value':' " . showData('n_600_preparer_mailing_address_apt_ste_flr_value') . "',
	'preparer_mailing_address_city_town':' " . showData('n_600_preparer_mailing_address_city_town') . "',
	'preparer_mailing_address_state':' " . showData('n_600_preparer_mailing_address_state') . "',
	'preparer_mailing_address_zipcode1':' " . showData('n_600_preparer_mailing_address_zip_code_value1') . "',
	'preparer_mailing_address_zipcode2':' " . showData('n_600_preparer_mailing_address_zip_code_value2') . "',
	'preparer_mailing_address_provience':' " . showData('n_600_preparer_mailing_address_province') . "',
	'preparer_mailing_address_postal_code':' " . showData('n_600_preparer_mailing_address_postal_code') . "',
	'preparer_mailing_address_country':' " . showData('n_600_preparer_mailing_address_country') . "',
	'preparer_contact_daytime_telephone':' " . showData('n_600_preparer_daytime_tel') . "',
	'preparer_contact_work_telephone':' " . showData('n_600_preparer_mobile') . "',
	'preparer_contact_evening_telephone':' " . showData('n_600_preparer_email') . "',
//page 11 end...............	

	'preparer_date_of_signature':' " . showData('n_600_preparer_sign_date') . "',
//page 12 end...............	

	'p11_additional_info_family_name':' " . showData('n_600_additional_info_last_name') . "',
	'p11_additional_info_given_name':' " . showData('n_600_additional_info_first_name') . "',
	'p11_additional_info_middle_name':' " . showData('n_600_additional_info_middle_name') . "',
	'p11_additional_info_a_number':' " . showData('n_600_additional_info_a_number') . "',
	'p11_additional_info_3a':' " . showData('n_600_additional_info_3a_page_no') . "',
	'p11_additional_info_3b':' " . showData('n_600_additional_info_3b_part_no') . "',
	'p11_additional_info_3c':' " . showData('n_600_additional_info_3c_item_no') . "',
	'p11_additional_info_4a':' " . showData('n_600_additional_info_4a_page_no') . "',
	'p11_additional_info_4b':' " . showData('n_600_additional_info_4b_part_no') . "',
	'p11_additional_info_4c':' " . showData('n_600_additional_info_4c_item_no') . "',
	'p11_additional_info_5a':' " . showData('n_600_additional_info_5a_page_no') . "',
	'p11_additional_info_5b':' " . showData('n_600_additional_info_5b_part_no') . "',
	'p11_additional_info_5c':' " . showData('n_600_additional_info_5c_item_no') . "',
	'p11_additional_info_6a':' " . showData('n_600_additional_info_6a_page_no') . "',
	'p11_additional_info_6b':' " . showData('n_600_additional_info_6b_part_no') . "',
	'p11_additional_info_6c':' " . showData('n_600_additional_info_6c_item_no') . "',
//page 13 end..........

	'p12_applicants_guardian_signature_date':' " . showData('') . "',
	'p12_applicants_date_of_signature':' " . showData('') . "',
	'p12_applicants_date_of_signature_2':' " . showData('') . "',
	'p12_applicants_location':' " . showData('') . "',
	'p12_uscis_officer_printed_name':' " . showData('') . "',
	'p12_uscis_officer_printed_title':' " . showData('') . "',
	'p12_uscis_officer_sign_date':' " . showData('') . "',
	'p13_us_citizen_date':' " . showData('') . "',
	'p13_3e_other_value':' " . showData('') . "',

	
//page 14 end..........

	'p13_family_name':' " . showData('') . "',
	'p13_given_name':' " . showData('') . "',
	'p13_middle_name':' " . showData('') . "',
	'p13_uscis_officer_name':' " . showData('') . "',
	'p13_uscis_officer_titel':' " . showData('') . "',
	'p13_uscis_officer_sign_date':' " . showData('') . "',
	'p13_district_director_sign':' " . showData('') . "',
//page 15 end............

	

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
$pdf->Output('Form_N-600.pdf', 'I');
