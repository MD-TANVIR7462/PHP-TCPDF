<?php
// !uncomment this line
require_once('formheader.php');   //database connection file 

// require_once("config.php");
//$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

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
        // Position at 15 mm from bottom
        $this->SetY(-17);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form G-28   09/17/18 ", 0, 0, 'L');
// !uncomment this line
		$barcode_image = "images/G-28-footer-pdf417-$this->page.png";
        $this->Image($barcode_image, 68, 268, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417	
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 158, 267.5, true);
    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form G-28, Notice of Entry of Appearance');

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
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

/********************************
******** Start Page No 1 ********
*********************************/

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
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(100, 15, "Notice of Entry of Appearance\nas Attorney or Accredited Representative", 0, 'C', 0, 1, 55, 9, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "DHS\nForm G-28 ", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0105\nExpires 05/31/2021", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);

//........
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');
//........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About Attorney or
Accredited Representative</b></div>';
$pdf->writeHTMLCell(91, 12, 13, 33, $html, 1, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 45.5, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_online_account_number', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 51);
//........
$pdf->Image('images/right_angle.jpg', 37, 52.4, 3.3, 3.3, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Name of Attorney or Accredited Representative</b></div>';
$pdf->writeHTMLCell(91, 5, 13, 62, $html, 0, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.</b>&nbsp;&nbsp;&nbsp;Family Name <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 70, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_family_lastname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 72);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 79, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_given_firstname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 81);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 90, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_middlename', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 90);

//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Address of Attorney or Accredited Representative</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 102, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 110, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 20, 110, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_address_street', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 112);
//.......................
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(25, 0, 12, 121, "<b>3.b.</b>", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$pdf->writeHTMLCell(5, 0, 20, 120,'<input type="checkbox" name="Apt1" value="Apt1"  />', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 26, 121, "Apt.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(5, 0, 35, 120, '<input type="checkbox" name="Ste1" value="Ste1"  />', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 41, 121, "Ste.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(5, 0, 49, 120, '<input type="checkbox" name="Flr1" value="Flr1"  />', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 55, 121, "Flr.", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_apt_ste_flr', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 121);
//..........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_city_or_town', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 130);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("representative_address_state", 13.5, 7, $comboBoxOptions, array(), array(),30.5, 139);
//.................
$pdf->SetFont('times', 'I', 6);
$html = ' <a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(USPS ZIP Code Lookup)</i></b></a> ';
$pdf->writeHTMLCell(35, 0, 44, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_zip_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68.1, 139);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 148, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_province',61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 148);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0,  12, 157, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_postal_code',61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 157);

//........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 163, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_country', 82.4, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 169);

//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Contact Information of Attorney or Accredited
Representative</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 179, $html, 0, 0, true, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 189, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_daytime_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 194.5);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 201.5, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 206.7);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 213.6, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 219);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_fax_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 231);
// end of left side.................
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Eligibility Information for Attorney or
Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 12, 113, 33, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div>Select <b>all applicable</b> items.</div>';
$pdf->writeHTMLCell(90, 7, 112, 45, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 112, 50,'<div><b>1.a. </b></div>', 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 119, 49, ' <input type="checkbox" name="part2_1a" value="Y" checked=" " /> ', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I am an attorney eligible to practice law in, and a
member in good standing of, the bar of the highest
courts of the following states, possessions, territories,
commonwealths, or the District of Columbia. If you
need extra space to complete this section, use the<br>
space provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(79, 7, 125, 50, $html, 0, 0, false, 'L');

//.........
$html = '<div>Licensing Authority </div>';
$pdf->writeHTMLCell(80, 7, 125, 76, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(77, 7, 126, 82, $attorneyData->licencing_authority, 1, 0, false, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.&nbsp;&nbsp;&nbsp;</b>Bar Number (if applicable)</div>';
$pdf->writeHTMLCell(80, 7, 112, 90, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 7, 121.3, 95, $attorneyData->bar_number, 1, 0, false, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b></div>';
$pdf->writeHTMLCell(80, 7, 112, 103, $html, 0, 0, false, 'L');

$html = '<div>I (select <b>only one</b> box)<br>
subject to any order suspending, enjoining, restraining,
disbarring, or otherwise restricting me in the practice of
law. If you are subject to any orders, use the space
provided in <b>Part 6. Additional Information</b> to provide
an explanation.</div>';
$pdf->writeHTMLCell(83, 7, 120, 103, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 159, 103, "am not", 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 179, 103, "am", 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(83, 7, 153, 102,'<input type="checkbox" name="part2_1c" value="Y" checked=" " />', 0, 0, false, 'L');
$pdf->writeHTMLCell(83, 7, 173, 102, '<input type="checkbox" name="part2_1c" value="Y" checked=" " />', 0, 0, false, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d.&nbsp;&nbsp;&nbsp;</b>Name of Law Firm or Organization (if applicable)</div>';
$pdf->writeHTMLCell(100, 7, 112, 130, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 7, 121, 135, $attorneyData->name_law_firm_organaization, 1, 0, false, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a. </b></div>';
$pdf->writeHTMLCell(80, 7, 112, 145, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 119, 144, '<input type="checkbox" name="part2_2a" value="Y" checked=" " /> ', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I am an accredited representative of the following
qualified nonprofit religious, charitable, social
service, or similar organization established in the
United States and recognized by the Department of
Justice in accordance with 8 CFR part 1292.</div>';
$pdf->writeHTMLCell(80, 7, 125, 145, $html, 0, 0, false, 'L');

//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.&nbsp;&nbsp;&nbsp;</b>Name of Recognized Organization</div>';
$pdf->writeHTMLCell(80, 7, 112, 166, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 7, 121, 172, $attorneyData->name_recognized_organization, 1, 0, false, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.c.&nbsp;&nbsp;&nbsp;</b>Date of Accreditation (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(43, 7, 160, 186, $attorneyData->date_of_accrediation, 1, 0, false, 'L'); 

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.</b></div>';
$pdf->writeHTMLCell(80, 7, 112, 193, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 125, 193, 'I am associated with', 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 119, 192, '<input type="checkbox" name="part2_3" value="Y" checked=" " />', 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(77, 7, 126, 198,  $attorneyData->im_associated_with, 1, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>the attorney or accredited representative of record
who previously filed Form G-28 in this case, and my
appearance as an attorney or accredited representative
for a limited purpose is at his or her request.</div>';
$pdf->writeHTMLCell(80, 7, 125, 206, $html, 0, 0, false, 'L');
//.........
$html = '<div><b>4.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 112, 223, $html, 0, 0, false, 'L'); 
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 119, 222,'<input type="checkbox" name="part2_4a" value="Y" checked=" " />', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I am a law student or law graduate working under the
direct supervision of the attorney or accredited
representative of record on this form in accordance
with the requirements in 8 CFR 292.1(a)(2).</div>';
$pdf->writeHTMLCell(80, 7, 125, 223, $html, 0, 0, false, 'L');
//.........
$pdf->writeHTMLCell(80, 7, 112, 240,'<div><b>4.b.</b></div>', 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 119.4, 240, 'Name of Law Student or Law Graduate ', 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(83, 7, 120, 245, $attorneyData->name_of_law_student_or_graduate, 1, 0, false, 'L');

/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/

$pdf->AddPage('P', 'LETTER');  // page number 1
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Notice of Appearance as Attorney or
Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div>If you need extra space to complete this section, use the space
provided in <b>Part 6. Additional Information.</b><br><br>
This appearance relates to immigration matters before
(select <b>only one </b> box):</div>';
$pdf->writeHTMLCell(80, 7, 12, 29, $html, 0, 0, false, true, 'L', true);
//........
$part3_1a = (showData('g_28_citizen_immigration_status')=='Y') ? "checked":"";



$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 50, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 19, 49, '<input type="checkbox" name="part3_1a" value="Y" checked="'.$part3_1a.'" />', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);

$html = '<div>U.S. Citizenship and Immigration Services (USCIS)</div>';
$pdf->writeHTMLCell(80, 7, 25, 50, $html, 0, 0, false, 'L');
//........
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 56, $html, 0, 0, false, 'L');
$html = '<div>List the form numbers or specific matter in which
appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 56, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 21, 65, ' '.showData('g_28_list_spececific_matter').'', 1, 0, false, 'L');
//........

$part3_2a = (showData('g_28_custom_enforcement_status')=='Y') ? "checked":"";

$html = '<div><b>2.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 73, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 19, 72, '<input type="checkbox" name="part3_2a" value="Y" checked="'.$part3_2a.'" /> ', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>U.S. Immigration and Customs Enforcement (ICE)</div>';
$pdf->writeHTMLCell(80, 7, 25, 73, $html, 0, 0, false, 'L');
//........
$html = '<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 80, $html, 0, 0, false, 'L');
$html = '<div>List the specific matter in which appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 80, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 21, 85, ' '.showData('g_28_list_specific_matter').'', 1, 0, false, 'L');
//........

$part3_3a = (showData('g_28_custom_and_border_protection_status')=='Y') ? "checked":"";
$html = '<div><b>3.a.</b> </div>';
$pdf->writeHTMLCell(80, 7, 12, 93, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 19, 92, '<input type="checkbox" name="part3_3a" value="Y" checked="'.$part3_3a.'" />', 0, 0, false, 'L');
//........
$pdf->SetFont('times', '', 10);
$html = '<div> U.S. Customs and Border Protection (CBP)</div>';
$pdf->writeHTMLCell(80, 7, 25, 93, $html, 0, 0, false, 'L');
//........
$html = '<div><b>3.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 100, $html, 0, 0, false, 'L');
$html = '<div>List the specific matter in which appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 100, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 21, 105, ' '.showData('g_28_specific_matter_apearing').'', 1, 0, false, 'L');
//........
$pdf->writeHTMLCell(80, 7, 12, 112,'<b>4.</b>', 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 19.4, 112,'Receipt Number (if any)', 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_receipt_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 38.1, 117.5);
//........
$pdf->Image('images/right_angle.jpg', 32.7, 119, 3.1, 3.1, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5. </b></div>';
$pdf->writeHTMLCell(80, 7, 12, 125, $html, 0, 0, false, 'L');
$html = '<div>I enter my appearance as an attorney or accredited
representative at the request of the (select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(85, 7, 19, 125, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', '', 14);

$part3_5_applicant = (showData('g_28_notice_apperance_status')=='applicant') ? "checked":"";
$part3_5_petitioner = (showData('g_28_notice_apperance_status')=='petitioner') ? "checked":"";
$part3_5_requester = (showData('g_28_notice_apperance_status')=='requester') ? "checked":"";
$part3_5_benificiary = (showData('g_28_notice_apperance_status')=='benificiary') ? "checked":"";
$part3_5_respondent = (showData('g_28_notice_apperance_status')=='respondent') ? "checked":"";
$pdf->writeHTMLCell(85, 7, 19, 133, '<input type="checkbox" name="applicant" value="Y" checked="'.$part3_5_applicant.'" /> ', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 42, 133, '<input type="checkbox" name="petitioner" value="Y" checked="'.$part3_5_petitioner.'" />    ', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 68, 133, '<input type="checkbox" name="requestor" value="Y" checked="'.$part3_5_requester.'" />  ', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 19, 139, '<input type="checkbox" name="benev_drivative" value="Y" checked="'.$part3_5_benificiary.'" />  ', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 61, 139, '<input type="checkbox" name="respondent" value="Y" checked="'.$part3_5_respondent.'" />  ', 0, 0, false, 'L');  
$pdf->SetFont('times', '', 10);      
$pdf->writeHTMLCell(85, 7, 25, 134, 'Applicant', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 48, 134, 'Petitioner', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 74, 134, 'Requestor ', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 25, 140, 'Beneficiary/Derivative ', 0, 0, false, 'L');        
$pdf->writeHTMLCell(85, 7, 67, 140, 'Respondent (ICE, CBP) ', 0, 0, false, 'L');        
      
//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 12);
$html = '<div>Information About Client (Applicant, Petitioner,
Requestor, Beneficiary or Derivative, Respondent,
or Authorized Signatory for an Entity)</div>';
$pdf->writeHTMLCell(90, 7, 13, 147, $html, 0, 1, true, 'L');
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 165, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_representative_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 167);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 174, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_representative_given_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 176);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 185, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_representative_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 185);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.</b>&nbsp;&nbsp;&nbsp;Name of Entity (if applicable) </div>';
$pdf->writeHTMLCell(90, 10, 12, 193, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_name_of_entry', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 198);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.&nbsp;&nbsp;&nbsp;</b>Title of Authorized Signatory for Entity (if applicable)  </div>';
$pdf->writeHTMLCell(90, 10, 12, 207, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_title_of_authorized_signatory', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 212);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Client\'s USCIS Online Account Number (if any) </div>';
$pdf->writeHTMLCell(90, 10, 12, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_client_uscis_online_account_number', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 40, 225);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Client\'s Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 10, 12, 234, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_client_registration_number', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 240);
$pdf->SetFont('times', 'B', 10);
$html ='<div><b>A-</b></div>';
$pdf->writeHTMLCell(90, 10, 44, 241, $html, 0, 1, false, false, 'L', true);
// end of page 2 left side

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Client\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, false, 'L', false);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.  </b>  Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_daytime_telephone_number', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 30);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>11.  </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(92, 7, 112, 38, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_mobile_telephone_number', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 43);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>12.  </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 51, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_email_address', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 56);  
//........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Mailing Address of Client</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 65, $html, 0, 0, true, false, 'L', false);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Provide the client\'s mailing address. <b>Do not</b> provide
the business mailing address of the attorney or accredited
representative <b>unless</b> it serves as the safe mailing address on the
application or petition being filed with this Form G-28.</div>';
$pdf->writeHTMLCell(90, 7, 112, 72, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>13.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 90, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 122, 90, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_mailing_address_street', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 92);
//........
$mailing_apt = (showData('information_about_you_us_mailing_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('information_about_you_us_mailing_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('information_about_you_us_mailing_apt_ste_flr')=='flr')? "checked":"";
//.................
$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(25, 0, 112, 101, "<b>13.b.</b>", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); // set font
$pdf->writeHTMLCell(5, 0, 121, 100,'<input type="checkbox" name="Apt1" value="Apt1" checked="'.$mailing_apt.'" />', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 127, 101, "Apt.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(5, 0, 135, 100, '<input type="checkbox" name="Ste1" value="Ste1" checked="'.$mailing_ste.'" />', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 141, 101, "Ste.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$pdf->writeHTMLCell(5, 0, 149, 100, '<input type="checkbox" name="Flr1" value="Flr1" checked="'.$mailing_flr.'" />', '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 155, 101, "Flr.", '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 101);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.c.</b>&nbsp;&nbsp;&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_city_or_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 110);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.d.</b>&nbsp;&nbsp;&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>13.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 119, $html, '', 0, 0, true, 'L');
//........
$pdf->SetFont('courier', 'B', 10); // set font
$comboBoxOptions = array('');
foreach ($allDataCountry as $record) {
	$comboBoxOptions[] = $record->state_code;
}
$pdf->ComboBox("client_mailing_address_state", 13.5, 7, $comboBoxOptions, array(), array(),132, 119);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_zip_code', 34.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 119);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 128, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 128);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0,  112, 137, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 137);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 143, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 149);
//........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Client\'s Consent to Representation and
Signature</b></div>';
$pdf->writeHTMLCell(91, 12, 113, 162, $html, 1, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Consent to Representation and Release of
Information</b></div>';
$pdf->writeHTMLCell(91, 10, 113, 178, $html, 0, 0, true, false, 'L', false);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I have requested the representation of and consented to being
represented by the attorney or accredited representative named
in <b>Part 1</b>. of this form. According to the Privacy Act of 1974
and U.S. Department of Homeland Security (DHS) policy, 1
also consent to the disclosure to the named attorney or
accredited representative of any records pertaining to me that
appear in any system of records of USCIS, ICE, or CBP.</div>';
$pdf->writeHTMLCell(90, 10, 112, 190, $html, '', 0, 0, true, 'L');

/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Client\'s Consent to Representation and
Signature </b>(continued)</div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Options Regarding Receipt of USCIS Notices and
Documents</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 32, $html, 0, 0, true, false, 'L', false);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>USCIS will send notices to both a represented party (the client)<br>
and his, her, or its attorney or accredited representative either<br>
through mail or electronic delivery. USCIS will send all secure<br>
identity documents and Travel Documents to the client\'s U.S<br>
mailing address.</div>';
$pdf->writeHTMLCell(100, 10, 12, 43, $html, '', 0, 0, true, 'L');
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If you want to have notices and/or secure identity documents<br>sent to your attorney or accredited representative of  record rather<br>than to you, please select <b>all applicable</b> items below. You may<br>change these elections through written notice to USCIS.</div>';
$pdf->writeHTMLCell(100, 10, 12, 65, $html, '', 0, 0, true, 'L');
//........


$part4_1a = (showData('g_28_request_the_uscis_original_status')=='Y')? "checked":"";

$pdf->writeHTMLCell(80, 7, 12, 85,'<div><b>1.a. </b> </div>', 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 19, 84,'<input type="checkbox" name="part4_1a" value="Y" checked="'.$part4_1a.'" />', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I request that USCIS send original notices on an
application or petition to the business address of my
Attorney or accredited representative as listed in this
form.</div>';
$pdf->writeHTMLCell(80, 7, 25, 85, $html, 0, 0, false, 'L');
//.......
$part4_1b = (showData('g_28_request_uscis_send_secure_identity')=='Y')? "checked":"";
$html = '<div><b>1.b. </b> </div>';
$pdf->writeHTMLCell(80, 7, 12, 102, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 19, 101, '<input type="checkbox" name="part4_1b" value="Y" checked="'.$part4_1b.'" />', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I request that USCIS send any secure identity
document (Permanent Resident Card, Employment
Authorization Document, or Travel Document) that I
receive to the U.S. business address of my attorney or
accredited representative (or to a designated military
or diplomatic address in a foreign country (if
permitted)).</div>';
$pdf->writeHTMLCell(80, 7, 25, 102, $html, 0, 0, false, 'L');
//........
$html = '<div><b>NOTE:</b> If your notice contains Form I-94,
Arrival-Departure Record, USCIS will send the
notice to the U.S. business address of your attorney
or accredited representative. If you would rather
have your Form I-94 sent directly to you, select
<b>Item Number 1.c.</b></div>';
$pdf->writeHTMLCell(80, 7, 25, 128, $html, 0, 0, false, 'L');
//........
$part4_1c = (showData('client_consent_to_representation_and_signature_continued_1_c')=='Y')? "checked":"";
$html = '<div><b>1.c. </b> </div>';
$pdf->writeHTMLCell(80, 7, 12, 152, $html, 0, 0, false, 'L');
$pdf->SetFont('times', '', 14);
$pdf->writeHTMLCell(80, 7, 19, 151, '<input type="checkbox" name="part4_1c" value="Y" checked="'.$part4_1c.'" />', 0, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>I request that USCIS send my notice containing Form
I-94 to me at my U.S. mailing address.</div>';
$pdf->writeHTMLCell(80, 7, 25, 152, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Signature of Client or Authorized Signatory for an
Entity</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 165, $html, 0, 0, true, false, 'L', false);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 175, $html, 0, 0, false, 'L');
$html = '<div>Signature of Client or Authorized Signatory for an Entity</div>';
$pdf->writeHTMLCell(90, 7, 20, 175, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 21, 181, "", 1, 0, false, 'L');
//........
$html = '<div><b>2.b.   </b>   Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 12, 192, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 179, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_client_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 192);
// end of page 3 left side

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Signature of Attorney or Accredited
Representative</b></div>';
$pdf->writeHTMLCell(91, 12, 113, 17, $html, 1, 1, true, false, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div>I have read and understand the regulations and conditions
contained in 8 CFR 103.2 and 292 governing appearances and
representation before DHS. I declare under penalty of perjury
under the laws of the United States that the information I have
provided on this form is true and correct.</div>';
$pdf->writeHTMLCell(90, 7, 112, 30, $html, 0, 0, false, 'L');
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 112, 53, $html, 0, 0, false, 'L');
$html = '<div>Signature of Attorney or Accredited Representative</div>';
$pdf->writeHTMLCell(90, 7, 120, 53, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 121, 58, "", 1, 0, false, 'L');
//.......
$html = '<div><b>1.b.   </b>   Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 68, $html, 0, 0, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_representative_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 68);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.</b></div>';
$pdf->writeHTMLCell(80, 7, 112, 78, $html, 0, 0, false, 'L');
$html = '<div>Signature of Law Student or Law Graduate</div>';
$pdf->writeHTMLCell(90, 7, 120, 78, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 121, 83, "", 1, 0, false, 'L');
//.......
$html = '<div><b>2.b.   </b>   Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 93, $html, 0, 0, false, 'L');
//.......
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_law_student_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 93);

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/
$pdf->AddPage('P', 'LETTER');
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6.  &nbsp;Additional Information</b><i></i></div>';
$pdf->writeHTMLCell(91, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->setCellHeightRatio(1.25); 
$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to provide any additional information<br>
within this form, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to<br>
complete and file with this form or attach a separate sheet of<br>
paper. Type or print your name at the top of each sheet;<br>
indicate the <b>Page Number, Part Number</b>, and <b>Item Number</b><br>
to which your answer refers; and sign and date each sheet.</div>';
$pdf->writeHTMLCell(93, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 58, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_last_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 60);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_first_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 69);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 77, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_middle_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 78);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 86.5, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_2a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 92.4);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 86.5, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_2b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 92.4);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 86.5, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_2c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 92.4);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8); 
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell( 82, 1, 21.6, 98.1, '',  "B",  0, false, false, 'C', true ); // line 1
$pdf->writeHTMLCell( 82, 1, 21.6, 102.5, '',  "B",  0, false, false, 'C', true ); // line 2
$pdf->writeHTMLCell( 82, 1, 21.6, 106.8, '',  "B",  0, false, false, 'C', true ); // line 3
$pdf->writeHTMLCell( 82, 1, 21.6, 110.3, '',  "B",  0, false, false, 'C', true ); // line 4 
$pdf->writeHTMLCell( 82, 1, 21.6, 115, '',  "B",  0, false, false, 'C', true );   // line 5
$pdf->writeHTMLCell( 82, 1, 21.6, 120.8, '',  "B",  0, false, false, 'C', true ); // line 6
$pdf->writeHTMLCell( 82, 1, 21.6, 125.5, '',  "B",  0, false, false, 'C', true ); // line 7
$pdf->writeHTMLCell( 82, 1, 21.6, 129.2, '',  "B",  0, false, false, 'C', true ); // line 8 
$pdf->writeHTMLCell( 82, 1, 21.6, 135, '',  "B",  0, false, false, 'C', true );   // line 9
$pdf->writeHTMLCell( 82, 1, 21.6, 139, '',  "B",  0, false, false, 'C', true );   // line 10
$pdf->writeHTMLCell( 82, 1, 21.6, 143.6, '',  "B",  0, false, false, 'C', true );   // line 11
$pdf->TextField('aditional_inf0_name_2d', 82.5, 72,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_2d')),21.5, 101);
$pdf->setCellHeightRatio(1.2); 
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_3a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 179.6);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 174, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_3b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 179.6);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 174, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_3c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 179.6);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 189, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8); 
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell( 82, 1, 21.6, 185.5, '',  "B",  0, false, false, 'C', true );// line 1
$pdf->writeHTMLCell( 82, 1, 21.6, 190.5, '',  "B",  0, false, false, 'C', true );// line 2
$pdf->writeHTMLCell( 82, 1, 21.6, 194.5, '',  "B",  0, false, false, 'C', true );// line 3
$pdf->writeHTMLCell( 82, 1, 21.6, 199.5, '',  "B",  0, false, false, 'C', true );// line 4 
$pdf->writeHTMLCell( 82, 1, 21.6, 203.5, '',  "B",  0, false, false, 'C', true );// line 5
$pdf->writeHTMLCell( 82, 1, 21.6, 207.5, '',  "B",  0, false, false, 'C', true );// line 6
$pdf->writeHTMLCell( 82, 1, 21.6, 211.5, '',  "B",  0, false, false, 'C', true );// line 7
$pdf->writeHTMLCell( 82, 1, 21.6, 215.5, '',  "B",  0, false, false, 'C', true );// line 8 
$pdf->writeHTMLCell( 82, 1, 21.6, 219.7, '',  "B",  0, false, false, 'C', true );// line 9
$pdf->writeHTMLCell( 82, 1, 21.6, 224, '',  "B",  0, false, false, 'C', true );// line 10
$pdf->writeHTMLCell( 82, 1, 21.6, 228.5, '',  "B",  0, false, false, 'C', true );// line 11
$pdf->TextField('aditional_inf0_name_3d', 82.5, 70,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_3d')),21.5, 188.5);
$pdf->setCellHeightRatio(1.2); 
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_4a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_4b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_4c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.9); 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 27.7, '',  "B",  0, false, false, 'C', true );// line 1
$pdf->writeHTMLCell( 81.6, 1, 122.6, 32, '',  "B",  0, false, false, 'C', true );// line 2
$pdf->writeHTMLCell( 81.6, 1, 122.6, 37, '',  "B",  0, false, false, 'C', true );// line 3
$pdf->writeHTMLCell( 81.6, 1, 122.6, 41.5, '',  "B",  0, false, false, 'C', true );// line 4 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 46.5,   '',  "B",  0, false, false, 'C', true );// line 5
$pdf->writeHTMLCell( 81.6, 1, 122.6, 50.5, '',  "B",  0, false, false, 'C', true );// line 6
$pdf->writeHTMLCell( 81.6, 1, 122.6, 55.5, '',  "B",  0, false, false, 'C', true );// line 7 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 61.5, '',  "B",  0, false, false, 'C', true );// line 8
$pdf->writeHTMLCell( 81.6, 1, 122.6, 66, '',  "B",  0, false, false, 'C', true );// line 9
$pdf->writeHTMLCell( 81.6, 1, 122.6, 72.1, '',  "B",  0, false, false, 'C', true );// line 10
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_4d', 82, 70,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_4d')),122.5, 30.5);
$pdf->setCellHeightRatio(1.2); 
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 100.6, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_5a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 106.3);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 100.6, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_5b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  154, 106.3);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 100.6, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_5c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 106.3);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 113, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8); 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 113.1, '',  "B",  0, false, false, 'C', true );// line 1
$pdf->writeHTMLCell( 81.6, 1, 122.6, 117.5, '',  "B",  0, false, false, 'C', true );// line 2
$pdf->writeHTMLCell( 81.6, 1, 122.6, 121.8, '',  "B",  0, false, false, 'C', true );// line 3
$pdf->writeHTMLCell( 81.6, 1, 122.6, 126.3, '',  "B",  0, false, false, 'C', true );// line 4 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 131, '',  "B",  0, false, false, 'C', true );// line 5
$pdf->writeHTMLCell( 81.6, 1, 122.6, 135.8, '',  "B",  0, false, false, 'C', true );  // line 6
$pdf->writeHTMLCell( 81.6, 1, 122.6, 141.5, '',  "B",  0, false, false, 'C', true );// line 7
$pdf->writeHTMLCell( 81.6, 1, 122.6, 145.2, '',  "B",  0, false, false, 'C', true );// line 8 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 150, '',  "B",  0, false, false, 'C', true );// line 9
$pdf->writeHTMLCell( 81.6, 1, 122.6, 155, '',  "B",  0, false, false, 'C', true );// line 10
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_5d', 82, 66,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_5d')),122.5, 116);
$pdf->setCellHeightRatio(1.2); 
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 183.6, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_6a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 189);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 183.6, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_6b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  154, 189);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 183.6, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_6c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 189);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 196, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8); 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 195.1, '',  "B",  0, false, false, 'C', true ); // line 1
$pdf->writeHTMLCell( 81.6, 1, 122.6, 199.5, '',  "B",  0, false, false, 'C', true ); // line 2
$pdf->writeHTMLCell( 81.6, 1, 122.6, 203.8, '',  "B",  0, false, false, 'C', true ); // line 3
$pdf->writeHTMLCell( 81.6, 1, 122.6, 208.3, '',  "B",  0, false, false, 'C', true ); // line 4 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 212.8, '',  "B",  0, false, false, 'C', true ); // line 5
$pdf->writeHTMLCell( 81.6, 1, 122.6, 217, '',  "B",  0, false, false, 'C', true );   // line 6
$pdf->writeHTMLCell( 81.6, 1, 122.6, 221.8, '',  "B",  0, false, false, 'C', true ); // line 7
$pdf->writeHTMLCell( 81.6, 1, 122.6, 226.6, '',  "B",  0, false, false, 'C', true ); // line 8 
$pdf->writeHTMLCell( 81.6, 1, 122.6, 231.1, '',  "B",  0, false, false, 'C', true ); // line 9
$pdf->writeHTMLCell( 81.6, 1, 122.6, 235.5, '',  "B",  0, false, false, 'C', true ); // line 10
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_6d', 82, 65,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'),array('v' => showData('g_28_additional_info_6d')),122.5, 198);

//..............


$js = "
var fields = {
    'uscis_online_account_number':' $attorneyData->uscis_online_account_number',
    'your_family_lastname':' $attorneyData->family_last_name',
    'your_given_firstname':' $attorneyData->given_first_name',
    'your_middlename':' $attorneyData->middle_name',
    'representative_address_street':' $attorneyData->street_number_and_name',
    'representative_address_apt_ste_flr':' $attorneyData->apt_ste_flr_value',
    'representative_address_city_or_town':' $attorneyData->city_or_town',
    'representative_address_state':' $attorneyData->state',
    'representative_address_zip_code':' $attorneyData->zip_code',
    'representative_address_province':' $attorneyData->province',
    'representative_address_postal_code':' $attorneyData->postal_code',
    'representative_address_country':' $attorneyData->country',
    'representative_contact_daytime_number':' $attorneyData->day_time_telephone_number',
    'representative_contact_telephone_number':' $attorneyData->mobile_telephone_number',
    'representative_contact_email':' $attorneyData->email_address',
    'representative_fax_number':' $attorneyData->fax_number',
    'part3_receipt_number':' ".showData('g_28_receipt_number')."',
    'part3_representative_family_lastname':' ".showData('information_about_you_family_last_name')."',
    'part3_representative_given_firstname':' ".showData('information_about_you_given_first_name')."',
    'part3_representative_middlename':' ".showData('information_about_you_middle_name')."',
    'part3_name_of_entry':' ".showData('g_28_name_of_entity')."',
    'part3_title_of_authorized_signatory':' ".showData('g_28_title_of_authorized_signatory')."',
    'part3_client_uscis_online_account_number':' ".showData('other_information_about_you_uscis_online_account_number')."',
    'part3_client_registration_number':' ".showData('other_information_about_you_alien_registration_number')."',
    'client_daytime_telephone_number':' ".showData('information_about_you_daytime_tel')."',
    'client_mobile_telephone_number':' ".showData('information_about_you_mobile')."',
    'client_email_address':' ".showData('information_about_you_email')."',
    'client_mailing_address_street':' ".showData('information_about_you_us_mailing_street_number')."',
    'client_mailing_address_apt_ste_flr':' ".showData('information_about_you_us_mailing_apt_ste_flr_value')."',
    'client_mailing_address_city_or_town':' ".showData('information_about_you_us_mailing_city_town')."',
    'client_mailing_address_state':' ".showData('information_about_you_us_mailing_state')."',
    'client_mailing_address_zip_code':' ".showData('information_about_you_us_mailing_zip_code')."',
    'client_mailing_address_province':' ".showData('information_about_you_us_mailing_province')."',
    'client_mailing_address_postal_code':' ".showData('information_about_you_us_mailing_postal_code')."',
    'client_mailing_address_country':' ".showData('information_about_you_us_mailing_country')."',
    'part4_client_date_of_signature':' ".showData('g_28_client_sign_date')."',
    'part5_representative_date_of_signature':' ".showData('g_28_attorney_sign_date')."',
    'part5_law_student_date_of_signature':' ".showData('g_28_law_student_sign_date')."',
    'g_28_additional_info_last_name':' ".showData('g_28_additional_info_last_name')."',
    'g_28_additional_info_first_name':' ".showData('g_28_additional_info_first_name')."',
    'g_28_additional_info_middle_name':' ".showData('g_28_additional_info_middle_name')."',
    'g_28_additional_info_2a_page_no':' ".showData('g_28_additional_info_2a_page_no')."',
    'g_28_additional_info_2b_part_no':' ".showData('g_28_additional_info_2b_part_no')."',
    'g_28_additional_info_2c_item_no':' ".showData('g_28_additional_info_2c_item_no')."',
    'g_28_additional_info_3a_page_no':' ".showData('g_28_additional_info_3a_page_no')."',
    'g_28_additional_info_3b_part_no':' ".showData('g_28_additional_info_3b_part_no')."',
    'g_28_additional_info_3c_item_no':' ".showData('g_28_additional_info_3c_item_no')."',
    'g_28_additional_info_4a_page_no':' ".showData('g_28_additional_info_4a_page_no')."',
    'g_28_additional_info_4b_part_no':' ".showData('g_28_additional_info_4b_part_no')."',
    'g_28_additional_info_4c_item_no':' ".showData('g_28_additional_info_4c_item_no')."',
    'g_28_additional_info_5a_page_no':' ".showData('g_28_additional_info_5a_page_no')."',
    'g_28_additional_info_5b_part_no':' ".showData('g_28_additional_info_5b_part_no')."',
    'g_28_additional_info_5c_item_no':' ".showData('g_28_additional_info_5c_item_no')."',
    'g_28_additional_info_6a_page_no':' ".showData('g_28_additional_info_6a_page_no')."',
    'g_28_additional_info_6b_part_no':' ".showData('g_28_additional_info_6b_part_no')."',
    'g_28_additional_info_6c_item_no':' ".showData('g_28_additional_info_6c_item_no')."',

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
$pdf->Output('g-28.pdf', 'I');