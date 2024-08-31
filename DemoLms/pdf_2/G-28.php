<?php

require_once('formheader.php');   //database connection file 

//require_once("config.php");
//$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    //Page header
    public function Header() {
        $this->SetY(13);
		if ($this->page > 1){
		  // return;
			// $this->Cell(0, 30, '<< Company Heading >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			
			/* $top_border = array(
			   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
			);
			$this->Cell(184, 0, '', $top_border, 1, 1); */
			
			$this->SetLineWidth(2); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');
			
			$this->SetLineWidth(0.1); // set border width
			// $this->SetDrawColor(0,0,0); // set color for cell border
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C');

            // $this->StartTransform();
            // $this->SetFillColor(0,0,0);
            // $this->Rotate(-270);
            // $this->SetFont('zapfdingbats', 'B', 10);
            // $this->MultiCell(10, 10, "t", '', 'R', 0, 0, 25, 150, false); header angle
            // $this->StopTransform();

            
            // $this->SetFont('times', 'B', 10);
            // $this->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
            // $this->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);

			
		}
		// parent::Header();
		
        // Logo
        /* $image_file = K_PATH_IMAGES.'logo_example.jpg';
           $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false); */
        // Set font
        /* $this->SetFont('helvetica', 'B', 20); */
        // Title
        /* $this->Cell(0, 15, '<< Company Heading >>', 0, false, 'C', 0, '', 0, false, 'M', 'M'); */
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
		
		
		// if ($this->page == 1){
			$barcode_image = "images/G-28-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 68, 268, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
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
$pdf->writeHTMLCell(90, 12, 13, 33, $html, 1, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b> USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 47, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_online_account_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 53);
//........

/* $pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 43, 67, false); // angle 2
$pdf->StopTransform(); */

$pdf->Image('images/right_angle.jpg', 40.7, 54, 3.1, 3.1, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Name of Attorney or Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 5, 13, 62, $html, 0, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 70, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 72);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 79, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_given_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 81);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 90, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 90);

//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Address of Attorney or Accredited Representative</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 100, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 110, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 19, 110, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 112);

//.........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 121, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 121);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 130);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="representative_address_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 139, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', 'I', 7);
$html = ' <a href="https://tools.usps.com/go/ZipLookupAction_input"><i>USPS ZIP Code Lookup</i></a> ';
$pdf->writeHTMLCell(35, 0, 43, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 139);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 148, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 148);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0,  12, 157, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 157);

//........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 163, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('representative_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 169);

//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Contact Information of Attorney or Accredited
Representative</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 179, $html, 0, 0, true, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>   Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_daytime_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 195);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 202, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_telephone_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 207);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 214, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_contact_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 219);
//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>7.  </b>  Fax Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('representative_fax_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 231);

// end of left side

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


$html = '<div><b>1.a. </b> <input type="checkbox" name="part2_1a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 113, 50, $html, 0, 0, false, 'L');
$html = '<div>I am an attorney eligible to practice law in, and a
member in good standing of, the bar of the highest
courts of the following states, possessions, territories,
commonwealths, or the District of Columbia. If you
need extra space to complete this section, use the
space provided in <b>Part 6. Additional Information</b></div>';
$pdf->writeHTMLCell(79, 7, 124, 50, $html, 0, 0, false, 'L');

//.........

$html = '<div>Licensing Authority </div>';
$pdf->writeHTMLCell(80, 7, 122, 76, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(80, 7, 123, 82, $attorneyData->licencing_authority, 1, 0, false, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>Bar Number (if applicable)</div>';
$pdf->writeHTMLCell(80, 7, 112, 90, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(83, 7, 120, 95, $attorneyData->bar_number, 1, 0, false, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b></div>';
$pdf->writeHTMLCell(80, 7, 112, 103, $html, 0, 0, false, 'L');

$html = '<div>I (select <b>only one</b> box) <input type="checkbox" name="part2_1c" value="Y" checked=" " />  am not <input type="checkbox" name="part2_1c" value="Y" checked=" " />  am <br>
subject to any order suspending, enjoining, restraining,
disbarring, or otherwise restricting me in the practice of
law. If you are subject to any orders, use the space
provided in <b>Part 6. Additional Information</b> to provide
an explanation.</div>';
$pdf->writeHTMLCell(83, 7, 120, 103, $html, 0, 0, false, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d.  </b>Name of Law Firm or Organization (if applicable)</div>';
$pdf->writeHTMLCell(80, 7, 112, 130, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(83, 7, 120, 135, $attorneyData->name_law_firm_organaization, 1, 0, false, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a. </b><input type="checkbox" name="part2_2a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(80, 7, 112, 145, $html, 0, 0, false, 'L');
$html = '<div>I am an accredited representative of the following
qualified nonprofit religious, charitable, social
service, or similar organization established in the
United States and recognized by the Department of
Justice in accordance with 8 CFR part 1292.</div>';
$pdf->writeHTMLCell(80, 7, 123, 145, $html, 0, 0, false, 'L');

//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b. </b> Name of Recognized Organization</div>';
$pdf->writeHTMLCell(80, 7, 112, 166, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(83, 7, 120, 172, $attorneyData->name_recognized_organization, 1, 0, false, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.c. </b>Date of Accreditation (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(43, 7, 160, 186, $attorneyData->date_of_accrediation, 1, 0, false, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b>  <input type="checkbox" name="part2_3" value="Y" checked=" " /> I am associated with</div>';
$pdf->writeHTMLCell(80, 7, 112, 193, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(80, 7, 123, 198,  $attorneyData->im_associated_with, 1, 0, false, 'L');
$pdf->SetFont('times', '', 10);
$html = '<div>the attorney or accredited representative of record
who previously filed Form G-28 in this case, and my
appearance as an attorney or accredited representative
for a limited purpose is at his or her request.</div>';
$pdf->writeHTMLCell(80, 7, 122, 206, $html, 0, 0, false, 'L');

//..........
$html = '<div><b>4.a.</b> <input type="checkbox" name="part2_4a" value="Y" checked=" " />  </div>';
$pdf->writeHTMLCell(80, 7, 112, 223, $html, 0, 0, false, 'L');
$html = '<div>I am a law student or law graduate working under the
direct supervision of the attorney or accredited
representative of record on this form in accordance
with the requirements in 8 CFR 292.1(a)(2).</div>';
$pdf->writeHTMLCell(80, 7, 123, 223, $html, 0, 0, false, 'L');

//.........
$html = '<div><b>4.b. </b> Name of Law Student or Law Graduate </div>';
$pdf->writeHTMLCell(80, 7, 112, 240, $html, 0, 0, false, 'L');
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
$part3_1a = (showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration')=='Y') ? "checked":"";



$html = '<div><b>1.a.</b> <input type="checkbox" name="part3_1a" value="Y" checked="'.$part3_1a.'" />  </div>';
$pdf->writeHTMLCell(80, 7, 12, 50, $html, 0, 0, false, 'L');
$html = '<div>U.S. Citizenship and Immigration Services (USCIS)</div>';
$pdf->writeHTMLCell(80, 7, 23, 50, $html, 0, 0, false, 'L');
//........
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 56, $html, 0, 0, false, 'L');
$html = '<div>List the form numbers or specific matter in which
appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 56, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 20, 65, ' '.showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration_spececific_matter').'', 1, 0, false, 'L');
//........

$part3_2a = (showData('us_immigration_and_custom_enforcement')=='Y') ? "checked":"";

$html = '<div><b>2.a.</b> <input type="checkbox" name="part3_2a" value="Y" checked="'.$part3_2a.'" />  </div>';
$pdf->writeHTMLCell(80, 7, 12, 72, $html, 0, 0, false, 'L');
$html = '<div>U.S. Immigration and Customs Enforcement (ICE)</div>';
$pdf->writeHTMLCell(80, 7, 23, 72, $html, 0, 0, false, 'L');
//........
$html = '<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 80, $html, 0, 0, false, 'L');
$html = '<div>List the specific matter in which appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 80, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 20, 85, ' '.showData('notice_apperance_as_attorney_or_accredited_reprentative_2b_list_the_specific_matter').'', 1, 0, false, 'L');
//........

$part3_3a = (showData('us_custom_and_border_protection')=='Y') ? "checked":"";

$html = '<div><b>3.a.</b> <input type="checkbox" name="part3_3a" value="Y" checked="'.$part3_3a.'" /></div>';
$pdf->writeHTMLCell(80, 7, 12, 93, $html, 0, 0, false, 'L');
//........
$html = '<div> U.S. Customs and Border Protection (CBP)</div>';
$pdf->writeHTMLCell(80, 7, 23, 93, $html, 0, 0, false, 'L');
//........
$html = '<div><b>3.b.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 100, $html, 0, 0, false, 'L');
$html = '<div>List the specific matter in which appearance is entered.</div>';
$pdf->writeHTMLCell(80, 7, 20, 100, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(82, 7, 20, 105, ' '.showData('notice_apperance_as_attorney_or_accredited_reprentative_3b_list_the_specific_matter').'', 1, 0, false, 'L');
//........
$html = '<div><b>4. </b> Receipt Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 112, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_receipt_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 37, 117);
//........
$pdf->Image('images/right_angle.jpg', 32.7, 119, 3.1, 3.1, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5. </b></div>';
$pdf->writeHTMLCell(80, 7, 12, 125, $html, 0, 0, false, 'L');
$html = '<div>I enter my appearance as an attorney or accredited
representative at the request of the (select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(85, 7, 17, 125, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', '', 10.5);

$part3_5_applicant = (showData('notice_apperance_as_attorney_or_accredited_reprentative_check')=='applicant') ? "checked":"";
$part3_5_petitioner = (showData('notice_apperance_as_attorney_or_accredited_reprentative_check')=='petitioner') ? "checked":"";
$part3_5_requester = (showData('notice_apperance_as_attorney_or_accredited_reprentative_check')=='requester') ? "checked":"";
$part3_5_benificiary = (showData('notice_apperance_as_attorney_or_accredited_reprentative_check')=='benificiary') ? "checked":"";
$part3_5_respondent = (showData('notice_apperance_as_attorney_or_accredited_reprentative_check')=='respondent') ? "checked":"";

$html = '<div>  
<input type="checkbox" name="applicant" value="Y" checked="'.$part3_5_applicant.'" />  Applicant    
<input type="checkbox" name="petitioner" value="Y" checked="'.$part3_5_petitioner.'" />    Petitioner    
<input type="checkbox" name="requestor" value="Y" checked="'.$part3_5_requester.'" />  Requestor <br>  
<input type="checkbox" name="benev_drivative" value="Y" checked="'.$part3_5_benificiary.'" />  Beneficiary/Derivative     
<input type="checkbox" name="respondent" value="Y" checked="'.$part3_5_respondent.'" />   Respondent (ICE, CBP)  
</div>';
$pdf->writeHTMLCell(85, 7, 15, 135, $html, 0, 0, false, 'L');
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
$html ='<div><b>7.a. </b>  Name of Entity (if applicable) </div>';
$pdf->writeHTMLCell(90, 10, 12, 193, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_name_of_entry', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 198);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b. </b> Title of Authorized Signatory for Entity (if applicable)  </div>';
$pdf->writeHTMLCell(90, 10, 12, 207, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_title_of_authorized_signatory', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 212);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.   </b>    Client\'s USCIS Online Account Number (if any) </div>';
$pdf->writeHTMLCell(90, 10, 12, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_client_uscis_online_account_number', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 40, 225);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>9. </b> Client\'s Alien Registration Number (A-Number) (if any)</div>';
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
$pdf->TextField('client_daytime_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 30);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>11.  </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(92, 7, 112, 38, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_mobile_telephone_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 43);
//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>12.  </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 51, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_email_address', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 56);  
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
$pdf->writeHTMLCell(25, 0, 119, 90, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('client_mailing_address_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 92);
//........
$mailing_apt = (showData('g28_mailing_address_client_flr')=='apt')? "checked":"";
$mailing_ste = (showData('g28_mailing_address_client_flr')=='ste')? "checked":"";
$mailing_flr = (showData('g28_mailing_address_client_flr')=='flr')? "checked":"";

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="Apt3" value="Apt3" checked="'.$mailing_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste3" value="Ste3" checked="'.$mailing_ste.'" />Ste. 
<input type="checkbox" name="Flr3" value="Flr3" checked="'.$mailing_flr.'" /> Flr.
</div>';
$pdf->writeHTMLCell(60, 0, 112, 101, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 101);
//......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 110);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.d.</b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>13.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 119, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="client_mailing_address_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 119, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 119);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 128, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 128);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0,  112, 137, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 137);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 143, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('client_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 149);
//........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Client\'s Consent to Representation and
Signature</b></div>';
$pdf->writeHTMLCell(90, 12, 113, 160, $html, 1, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Consent to Representation and Release of
Information</b></div>';
$pdf->writeHTMLCell(90, 10, 113, 177, $html, 0, 0, true, false, 'L', false);
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
$html = '<div>USCIS will send notices to both a represented party (the client)
and his, her, or its attorney or accredited representative either
through mail or electronic delivery. USCIS will send all secure
identity documents and Travel Documents to the client\'s U.S
mailing address.</div>';
$pdf->writeHTMLCell(92, 10, 12, 43, $html, '', 0, 0, true, 'L');
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If you want to have notices and/or secure identity documents sent to your attorney or accredited representative of  record rather than to you, please select <b>all applicable</b> items below. You may change these elections through written notice to USCIS.</div>';
$pdf->writeHTMLCell(92, 10, 12, 65, $html, '', 0, 0, true, 'L');
//........


$part4_1a = (showData('client_consent_to_representation_and_signature_continued_1_a')=='Y')? "checked":"";

$html = '<div><b>1.a. </b><input type="checkbox" name="part4_1a" value="Y" checked="'.$part4_1a.'" /> </div>';
$pdf->writeHTMLCell(80, 7, 12, 85, $html, 0, 0, false, 'L');
$html = '<div>I request that USCIS send original notices on an
application or petition to the business address of my
Attorney or accredited representative as listed in this
form.</div>';
$pdf->writeHTMLCell(80, 7, 23, 85, $html, 0, 0, false, 'L');
//.......
$part4_1b = (showData('request_that_uscis_send_any_secure_identity')=='Y')? "checked":"";
$html = '<div><b>1.b. </b><input type="checkbox" name="part4_1b" value="Y" checked="'.$part4_1b.'" /> </div>';
$pdf->writeHTMLCell(80, 7, 12, 102, $html, 0, 0, false, 'L');
$html = '<div>I request that USCIS send any secure identity
document (Permanent Resident Card, Employment
Authorization Document, or Travel Document) that I
receive to the U.S. business address of my attorney or
accredited representative (or to a designated military
or diplomatic address in a foreign country (if
permitted)).</div>';
$pdf->writeHTMLCell(80, 7, 23, 102, $html, 0, 0, false, 'L');
//........
$html = '<div><b>NOTE:</b> If your notice contains Form I-94,
Arrival-Departure Record, USCIS will send the
notice to the U.S. business address of your attorney
or accredited representative. If you would rather
have your Form I-94 sent directly to you, select
<b>Item Number 1.c.</b></div>';
$pdf->writeHTMLCell(80, 7, 23, 128, $html, 0, 0, false, 'L');
//........
$part4_1c = (showData('client_consent_to_representation_and_signature_continued_1_c')=='Y')? "checked":"";
$html = '<div><b>1.c. </b><input type="checkbox" name="part4_1c" value="Y" checked="'.$part4_1c.'" /> </div>';
$pdf->writeHTMLCell(80, 7, 12, 152, $html, 0, 0, false, 'L');
$html = '<div>I request that USCIS send my notice containing Form
I-94 to me at my U.S. mailing address.</div>';
$pdf->writeHTMLCell(80, 7, 23, 152, $html, 0, 0, false, 'L');
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

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 6. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 18, $html, 1, 1, true, 'L');
//.......
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>If you need extra space to provide any additional information
within this form, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this form or attach a separate sheet of 
paper.&nbsp; Type or print your name  at the
top of each sheet; indicate the <b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
$pdf->writeHTMLCell(91, 25, 12, 27, $html, 0, 1, 0, true, 'L', false, false);
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp;Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 58, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_last_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 59);
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp;Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 67, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_first_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 68);
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp;Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 77, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_middle_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 77);
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.a. </b>&nbsp;&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 12, 85, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_2a_page_no', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 91);
//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.b. </b>&nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 43, 85, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_2b_part_no', 18, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52.5, 91);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 75, 85, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_2c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 91);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 99, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('g_28_additional_info_2d', 83.5, 71, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_2d')), 21, 100);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;&nbsp;Page Number</div>';
$pdf->writeHTMLCell(32, 7, 12, 172, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_3a_page_no', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 178);
//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 43, 172, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_3b_part_no', 18, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52.5, 178);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 75, 172, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_3c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 178);
//.........
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d.</b></div>';
$pdf->writeHTMLCell(10, 7, 12, 186, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('g_28_additional_info_3d', 83.5, 69, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_3d')), 21, 187);
// end of page 4 left side

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 111.3, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_4a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 23);
//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 142.5, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_4b_part_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152.5, 23);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 175, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_4c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 23);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d.</b></div>';
$pdf->writeHTMLCell(10, 7, 111.3, 31, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('g_28_additional_info_4d', 83, 70,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_4d')), 120.5, 31.5);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>5.a. </b>&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 111.3, 103, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_5a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 109);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>5.b. </b>&nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 142.5, 103, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_5b_part_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152.5, 109);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>5.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 175, 103, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_5c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 109);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 111.3, 116, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('g_28_additional_info_5d', 83, 64,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_5d')), 120.5, 118);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b>&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 111.3, 184, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_6a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120.4, 190);
//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 145, 184, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_6b_part_no', 18, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 190);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 175, 184, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('g_28_additional_info_6c_item_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 190);
//......
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 111.3, 198, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('g_28_additional_info_6d', 83, 63,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('g_28_additional_info_6d')), 120.5, 199);
// enf of page 4 right side

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
    'part3_receipt_number':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_receipt_number')."',

    'part3_representative_family_lastname':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_last_name')."',
    'part3_representative_given_firstname':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_first_name')."',
    'part3_representative_middlename':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_middle_name')."',

    'part3_name_of_entry':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_immegration_name_of_entity_1')."',
    'part3_title_of_authorized_signatory':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_title_of_authorized_signatory')."',
    'part3_client_uscis_online_account_number':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_uscis_account_number')."',
    'part3_client_registration_number':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_information_about_client_alien_reg_no')."',
    'client_daytime_telephone_number':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_telephone_number')."',
    'client_mobile_telephone_number':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_mobile_number')."',
    'client_email_address':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_day_time_eamil_address')."',

    'client_mailing_address_street':' ".showData('notice_apperance_as_attorney_or_accredited_reprentative_client_contact_information_mailing_address_client_street_number')."',
    'client_mailing_address_apt_ste_flr':' ".showData('interpreter_contact_information_mailing_address_number')."',
    'client_mailing_address_city_or_town':' ".showData('interpreter_contact_information_mailing_address_city_or_town')."',
    'client_mailing_address_state':' ".showData('information_mailing_address_client_state')."',
    'client_mailing_address_zip_code':' ".showData('interpreter_contact_information_mailing_address_zip')."',
    'client_mailing_address_province':' ".showData('interpreter_contact_information_mailing_address_province')."',
    'client_mailing_address_postal_code':' ".showData('interpreter_contact_information_mailing_address_postel_code')."',
    'client_mailing_address_country':' ".showData('interpreter_contact_information_mailing_address_country')."',

    'part4_client_date_of_signature':' ".showData('client_consent_to_representation_and_signature_continued_signature_date_of_signature')."',
    'part5_representative_date_of_signature':' ".showData('signature_of_attorney_or_accredited_representative_signature_1_b')."',
    'part5_law_student_date_of_signature':' ".showData('signature_of_attorney_or_accredited_representative_signature_2_b')."',

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