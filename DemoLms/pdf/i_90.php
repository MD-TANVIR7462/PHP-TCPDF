<?php

require_once('formheader.php');   //database connection file 
//require_once("config.php");

//$allDataCountry = indexByQueryAlldata("SELECT * FROM countries");

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
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form I-90  Edition  04/01/24  ", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/i90/I-90-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
        
    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-90');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetMargins(13.7, 15.3, 12.8, true);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 2, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

// define barcode style
/*$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);*/


// $html = '<h4>PDF Example</h4><br><p>Welcome to the Jungle</p>';

//$pdf->Text(50, 85, 'PDF417 (ISO/IEC 15438:2006)');
 
// $pdf->Ln(2);

// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(30, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13);	// set font
$pdf->MultiCell(120, 15, "Application to Replace Permanent Resident Card ", 0, 'C', 0, 1, 45, 10, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "USCIS\nForm I-90", 0, 'C', 0, 1, 170, 5.5, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No.  1615-0082\nExpires 02/28/2027", 0, 'C', 0, 1, 169, 18.5, true);

$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);

$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

//......table start

$pdf->writeHTMLCell(190, 45, 13, 33, "", 1, 1, true, false, 'C', true);

$pdf->SetFillColor(222,222,222);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(13, 44.7, 13, 33, "", "TLR", 0, true, true, 'C', true);
$pdf->writeHTMLCell(15, 39, 11.5, 45, "For USCIS <br> Use Only", 0, 0, false, true, 'C', true);

$pdf->writeHTMLCell(106, 2, 26, 60, "", "T", 0, false, false, 'C', true);
$pdf->writeHTMLCell(138, 45, 132, 33, "", "L", 0, false, true, 'C', true);

$pdf->writeHTMLCell(42, 2, 26, 47, "", "T", 0, false, false, 'C', true);

$pdf->writeHTMLCell(138, 27, 68, 33, "", "L", 0, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="applicant" value="Y" checked=" " /> <b>Applicant Interviewed</b></div>';
$pdf->writeHTMLCell(90, 7, 26, 33, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Date :_______________</div>';
$pdf->writeHTMLCell(90, 7, 28, 39, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Class of Admission</div>';
$pdf->writeHTMLCell(90, 7, 29, 47, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Remarks</div>';
$pdf->writeHTMLCell(90, 7, 27, 60, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='Receipt';
$pdf->writeHTMLCell(90, 7, 90, 33, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='Action Block';
$pdf->writeHTMLCell(90, 7, 155, 33, $html, 0, 1, false, true, 'J', true);
//............table end

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 1, 1, -8, 72, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. ", '', 'L', 0, 1, 19, 78.5, true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b></div>';
$pdf->writeHTMLCell(90, 6, 12.9, 86, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number)</div>';
$pdf->writeHTMLCell(90, 7, 12, 95, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 43, 80, false); 
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<div><b>A-</b></div>';
$pdf->writeHTMLCell(90, 7, 52, 100, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_alien_reg', 44.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 59, 99);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 13, 108, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 32, 100, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_uscis_online',62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 41, 112);
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Your Full  Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 122, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Your card will be issued in this name.</div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 135, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 136);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 144, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 145);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 155, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 154);
//..........

$pdf->SetFont('times', 'B', 10);
$html ='<div>4.  </div>';
$pdf->writeHTMLCell(90, 7, 12, 161, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Has your name legally changed since the issuance of your Permanent Resident Card? </div>';
$pdf->writeHTMLCell(90, 7, 18.5, 162, $html, 0, 1, false, true, 'L', true);
//............

$part1_4a = (showData('i_90_has_your_namechange_yes_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="part1_4a" value="Y" checked="'.$part1_4a.'" /> &nbsp;Yes (Proceed to <b>Item Numbers 5.a. - 5.c.</b>)</div>';
$pdf->writeHTMLCell(90, 7, 18, 172, $html, 0, 1, false, true, 'J', true);
//............

$part1_4b = (showData('i_90_has_your_namechange_no_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="part1_4b" value="Y" checked="'.$part1_4b.'" /> &nbsp;No (Proceed to <b>Item Numbers 6.a. - 6.i.</b>)</div>';

$pdf->writeHTMLCell(90, 7, 18, 178, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);

$part1_4c = (showData('i_90_has_your_namechange_na_status')=='Y')? 'checked':'';
$html ='<div> <input type="checkbox" name="part1_4c" value="Y" checked="'.$part1_4c.'" /> &nbsp;N/A - I never received my previous card. </b>)</div>';
$pdf->writeHTMLCell(90, 7, 18, 184, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>(Proceed to <b>Item Numbers 6.a. - 6.i.</b>) </div>';
$pdf->writeHTMLCell(90, 7, 24, 188, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Provide your name exactly as it is printed on your current 
Permanent Resident Card.</div>';
$pdf->writeHTMLCell(90, 7, 13, 195, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Attach all evidence of your legal name change with 
this application.</div>';
$pdf->writeHTMLCell(90, 7, 13, 205, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 215, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_names_used_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 216);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 223, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_names_used_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 225);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 235, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_names_used_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 234);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.</b>&nbsp;&nbsp;&nbsp; In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 92, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_in_care_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 97);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 105, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 106);
//..........

$apt6c =  (showData('information_about_you_us_mailing_apt_ste_flr')=='apt')?'checked':'';
$ste6c =  (showData('information_about_you_us_mailing_apt_ste_flr')=='ste')?'checked':'';
$flr6c =  (showData('information_about_you_us_mailing_apt_ste_flr')=='flr')?'checked':'';



$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>6.c. </b>&nbsp;  
<input type="checkbox" name="Apt" value="Apt" checked="'.$apt6c.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste" value="Ste" checked="'.$ste6c.'" />Ste. 
<input type="checkbox" name="Flr" value="Flr" checked="'.$flr6c.'" /> Flr.</div>';

$pdf->writeHTMLCell(60, 0, 113, 116, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 114);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>6.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 123, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 122);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>6.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 131, $html, '', 0, 0, true, 'L');

$html = '<select name="mailing_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 131, $html, '', 0, 0, true, 'L');
$html= '<div><b>6.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 131, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 130);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 140, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('mailing_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 139);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.h.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 148, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('mailing_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 148);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 154, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('mailing_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 159);
//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Mailing Address  &nbsp;&nbsp; &nbsp;&nbsp;</b> <a href="https://tools.usps.com/go/ZipLookupAction_input"><i>(USPS ZIP Code Lookup)</i></a></div>';
$pdf->writeHTMLCell(90, 7, 113, 85, $html, 0, 1, true, false, 'L', true);
//.............


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 170, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Provide this information only if different than mailing address.</div>';
$pdf->writeHTMLCell(95, 7, 112, 176, $html, 0, 1, false, false, 'L', true);





$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 183);
//...........

$apt7b =  (showData('information_about_you_home_apt_ste_flr')=='apt')?'checked':'';
$ste7b =  (showData('information_about_you_home_apt_ste_flr')=='ste')?'checked':'';
$flr7b =  (showData('information_about_you_home_apt_ste_flr')=='flr')?'checked':'';




$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.b. </b>&nbsp;  
<input type="checkbox" name="Apt1" value="Apt" checked="'.$apt7b.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste1" value="Ste" checked="'.$ste7b.'" />Ste. 
<input type="checkbox" name="Flr1" value="Flr" checked="'.$flr7b.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 193, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 192);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 202, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 201);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.d.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 210, $html, '', 0, 0, true, 'L');

$html = '<select name="physical_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 211, $html, '', 0, 0, true, 'L');
$html= '<div><b>7.e.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 211, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 210);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 219, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 219);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 228, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 228);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 236, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 241);
//..............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b>(continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Additional Information</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 28, $html, 0, 1, true, false, 'L', true);
//.............

$male_check = (showData('other_information_about_you_gender')=='male')? 'checked':'';
$female_check = (showData('other_information_about_you_gender')=='female')? 'checked':'';


$pdf->SetFont('times', '', 10);
$html= '<div><b>8.  </b>   &nbsp;Gender   &nbsp; &nbsp; 
<input type="checkbox" name="G" value="y" checked="'.$male_check.'" />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked="'.$female_check.'" /> Female</div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.</b> &nbsp;&nbsp; Date of Birth&nbsp;&nbsp;&nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 43, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_date_of_birth', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 42);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10. </b> City/Town/Village of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_city_town_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 55);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b>  &nbsp;  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_birth', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 68);
//...........

$pdf->SetFont('times', 'B', 10);
$html ='<div>Mother\'s Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 77, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp;(First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 85, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mother_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 86);


//............
$pdf->SetFont('times', 'B', 10);
$html ='<div>Father\'s Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 95, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp;(First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 103, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('father_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 103);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.  </b>  Class of Admission </div>';
$pdf->writeHTMLCell(90, 7, 12, 114, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('class_of_addmission', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 119);
//............


$pdf->SetFont('times', '', 10);
$html ='<div><b>15.  </b>  Date of Admission </div>';
$pdf->writeHTMLCell(90, 7, 12, 127, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 40, 130, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('date_of_admission', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 130);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.</b> &nbsp;&nbsp; U.S Social Security Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 139, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 's', 0, 1, 45, 125, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_social_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 145);
//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2.  &nbsp;Application Type</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 155, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If your conditional permanent resident status (for 
example: CR1, CR2, CF1, CF2) is expiring within the next 90 
days, then do <b>not</b> file this application. (See the <b>What is the 
Purpose of This Application</b> section of the Form I-90 
Instructions for further information.)</div>';
$pdf->writeHTMLCell(90, 7, 12, 163, $html, 0, 1, false, true, 'L', true);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>My status is</b> (Select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(90, 7, 12, 183, $html, 0, 1, false, true, 'L', true);
//................

$part2_1a = (showData('i_90_application_type_1a_resident_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.    </b> <input type="checkbox" name="part2_1a" value="Y" checked="'.$part2_1a.'" /> &nbsp;Lawful Permanent Resident (Proceed to <b>Section A.</b>)</div>';
$pdf->writeHTMLCell(90, 7, 12, 189, $html, 0, 1, false, true, 'J', true);
//............

$part2_1b = (showData('i_90_application_type_1b_commuter_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.    </b> <input type="checkbox" name="part2_1b" value="Y" checked="'.$part2_1b.'" /> &nbsp;Permanent Resident - In Commuter Status</div>';
$pdf->writeHTMLCell(90, 7, 12, 195, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>(Proceed to <b>Section A.</b>)</div>';
$pdf->writeHTMLCell(90, 7, 25, 199, $html, 0, 1, false, true, 'J', true);
//............
$part2_1c = (showData('i_90_application_type_1c_conditional_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.    </b> <input type="checkbox" name="part2_1c" value="Y" checked="'.$part2_1c.'" /> &nbsp;Conditional Permanent Resident</div>';
$pdf->writeHTMLCell(90, 7, 12, 206, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>(Proceed to <b>Section B.</b>)</div>';
$pdf->writeHTMLCell(90, 7, 25, 210, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b> Reason for Application</b> (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'L', true);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>Section A.</b> (To be used <b>only</b> by a lawful permanent resident or 
a permanent resident in commuter status.)</div>';
$pdf->writeHTMLCell(90, 7, 113, 28, $html, 0, 1, false, true, 'J', true);
//............
$part2_2a = (showData('i_90_application_reason_2a_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.    </b> <input type="checkbox" name="part2_2a" value="Y" checked="'.$part2_2a.'" /> &nbsp;My previous card has been lost, stolen, or destroyed.</div>';
$pdf->writeHTMLCell(90, 7, 113, 39, $html, 0, 1, false, true, 'J', true);
//............

$part2_2b = (showData('i_90_application_reason_2b_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.    </b> <input type="checkbox" name="part2_2b" value="Y" checked="'.$part2_2b.'" /> &nbsp;My previous card was issued but never received. </div>';
$pdf->writeHTMLCell(90, 7, 113, 45, $html, 0, 1, false, true, 'J', true);
//............


$part2_2c = (showData('i_90_application_reason_2c_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.    </b> <input type="checkbox" name="part2_2c" value="Y" checked="'.$part2_2c.'" /> &nbsp;My existing card has been mutilated.  </div>';
$pdf->writeHTMLCell(90, 7, 113, 51, $html, 0, 1, false, true, 'J', true);
//............

$part2_2d = (showData('i_90_application_reason_2d_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.d.    </b> <input type="checkbox" name="part2_2d" value="Y" checked="'.$part2_2d.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 57, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My existing card has incorrect data because of 
<br>Department of Homeland Security (DHS) error. 
<br>(Attach your existing card with incorrect data along 
<br>with this application.)  </div>';
$pdf->writeHTMLCell(90, 7, 126.5, 57, $html, 0, 1, false, true, 'J', true);
//............

$part2_2e = (showData('i_90_application_reason_2e_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.e.    </b> <input type="checkbox" name="part2_2e" value="Y" checked="'.$part2_2e.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 74, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My name or other biographic information has been 
<br>legally changed since issuance of my existing card. </div>';
$pdf->writeHTMLCell(90, 7, 126.5, 74, $html, 0, 1, false, true, 'J', true);
//............

$part2_2f = (showData('i_90_application_reason_2f_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.f.    </b> <input type="checkbox" name="part2_2f" value="Y" checked="'.$part2_2f.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 83, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My existing card has already expired or will expire 
<br>within six months.  </div>';
$pdf->writeHTMLCell(90, 7, 126.5, 83, $html, 0, 1, false, true, 'J', true);
//............

$part2_2g1 = (showData('i_90_application_reason_2g1_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.g.1.  </b><input type="checkbox" name="part2_2g1" value="Y" checked="'.$part2_2g1.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 92, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I have reached my 14th birthday and am registering 
<br>as required. My existing card will expire AFTER my 
<br>16th birthday. (See <b>NOTE</b> below for additional 
<br>information.)  </div>';
$pdf->writeHTMLCell(90, 7, 129, 92, $html, 0, 1, false, true, 'J', true);
//............
$part2_2g2 = (showData('i_90_application_reason_2g2_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.g.2.  </b><input type="checkbox" name="part2_2g2" value="Y" checked="'.$part2_2g2.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 111, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I have reached my 14th birthday and am registering 
<br>as required. My existing card will expire BEFORE my 
<br>16th birthday. (See <b>NOTE</b> below for additional 
<br>information.)  </div>';
$pdf->writeHTMLCell(90, 7, 129, 111, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you are filing this application before your 
<br>14th birthday, or more than 30 days after your 14th 
<br>birthday, you must select reason <b>2.j.</b> However, if 
<br>your card has expired, you must select reason <b>2.f.</b> </div>';
$pdf->writeHTMLCell(90, 7, 129, 130, $html, 0, 1, false, true, 'J', true);
//............
$part2_2h1 = (showData('i_90_application_reason_2h1_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.h.1.  </b><input type="checkbox" name="part2_2h1" value="Y" checked="'.$part2_2h1.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 150, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I am a permanent resident who is taking up commuter 
<br>status. </div>';
$pdf->writeHTMLCell(90, 7, 129, 150, $html, 0, 1, false, true, 'J', true);
//............
$part2_2h1a = (showData('i_90_application_reason_2h1a_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.h.1.a  </b><input type="checkbox" name="part2_2h1a" value="Y" checked="'.$part2_2h1a.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 161, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 9);
$html ='<div><b>My Port-of-Entry (POE) into the United States will be</b>:
<br>City or Town and State </div>';
$pdf->writeHTMLCell(88, 7, 131, 161, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(74, 7, 131, 172, ''.showData('i_90_application_reason_city_town_state').'', 1, 1, false, true, 'L', true);
//.............
$part2_2h2 = (showData('i_90_application_reason_2h2_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.h.2.  </b><input type="checkbox" name="part2_2h2" value="Y" checked="'.$part2_2h2.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 182, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I am a commuter who is taking up actual residence in 
<br>the United States. </div>';
$pdf->writeHTMLCell(88, 7, 130, 182, $html, 0, 1, false, true, 'J', true);
//............

$part2_2i = (showData('i_90_application_reason_2i_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.i.  </b><input type="checkbox" name="part2_2i" value="Y" checked="'.$part2_2i.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 192, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I have been automatically converted to lawful 
<br>permanent resident status. </div>';
$pdf->writeHTMLCell(88, 7, 130, 192, $html, 0, 1, false, true, 'J', true);
//............

$part2_2j = (showData('i_90_application_reason_2j_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.j.  </b><input type="checkbox" name="part2_2j" value="Y" checked="'.$part2_2j.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 203, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I have a prior edition of the Alien Registration Card, 
<br>or I am applying to replace my current Permanent 
<br>Resident Card for a reason that is not specified above.</div>';
$pdf->writeHTMLCell(88, 7, 130, 203, $html, 0, 1, false, true, 'J', true);
//............






// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2.&nbsp; Application Type</b> (continued)</div>';
$pdf->writeHTMLCell(93, 6, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Section B.</b> (To be used only by a conditional permanent resident.)</div>';
$pdf->writeHTMLCell(95, 7, 12, 28, $html, 0, 1, false, true, 'J', true);
//............
$part2_3a = (showData('i_90_application_reason_3a_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b><input type="checkbox" name="part2_3a" value="Y" checked="'.$part2_3a.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 13, 35, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My previous card has been lost, stolen, or destroyed.</div>';
$pdf->writeHTMLCell(88, 7, 27, 35, $html, 0, 1, false, true, 'J', true);
//............
$part2_3b = (showData('i_90_application_reason_3b_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b><input type="checkbox" name="part2_3b" value="Y" checked="'.$part2_3b.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 13, 41, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My previous card was issued but never received.</div>';
$pdf->writeHTMLCell(88, 7, 27, 41, $html, 0, 1, false, true, 'J', true);
//............
$part2_3c = (showData('i_90_application_reason_3c_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b><input type="checkbox" name="part2_3c" value="Y" checked="'.$part2_3c.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 13, 47, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My existing card has been mutilated.</div>';
$pdf->writeHTMLCell(88, 7, 27, 47, $html, 0, 1, false, true, 'J', true);
//............
$part2_3d = (showData('i_90_application_reason_3d_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.  </b><input type="checkbox" name="part2_3d" value="Y" checked="'.$part2_3d.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 13, 54, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My existing card has incorrect data because of DHS 
<br>error. (Attach your existing permanent resident card 
<br>with incorrect data along with this application.)
</div>';
$pdf->writeHTMLCell(88, 7, 27, 54, $html, 0, 1, false, true, 'J', true);
//............

$part2_3e = (showData('i_90_application_reason_3e_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.e.  </b><input type="checkbox" name="part2_3e" value="Y" checked="'.$part2_3e.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 13, 67, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>My name or other biographic information has legally 
<br>changed since the issuance of my existing card. 
</div>';
$pdf->writeHTMLCell(90, 7, 27, 67, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3.  &nbsp;Processing Information</b> (continued)</div>';
$pdf->writeHTMLCell(93, 6, 13, 81, $html, 1, 1, true, false, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>
</div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Location where you applied for an immigrant visa or 
<br>adjustment of status:
</div>';
$pdf->writeHTMLCell(90, 7, 20, 88, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_location', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 97);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>
</div>';
$pdf->writeHTMLCell(90, 7, 12, 105, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Location where your immigrant visa was issued or USCIS 
office where you were granted adjustment of status:
</div>';
$pdf->writeHTMLCell(85, 7, 20, 105, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_location1', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 114);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Complete <b>Item Numbers 3.a.</b> and <b>3.a1.</b> if you entered the 
United States with an immigrant visa. (If you were granted 
adjustment of status, proceed to <b>Item Number 4.</b>)
</div>';
$pdf->writeHTMLCell(85, 7, 12, 122, $html, 0, 1, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.</b> &nbsp; Destination in the United States at time of admission
</div>';
$pdf->writeHTMLCell(90, 7, 12, 137, $html, 0, 1, false, true, 'J', true);
//............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_destination', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 142);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.1.</b>&nbsp; <b>Port-of-Entry where admitted to the United States:</b>
</div>';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>City or Town and State
</div>';
$pdf->writeHTMLCell(90, 7, 22, 155, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_city_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 160);
//............


$pdf->SetFont('times', 'B', 10);
$html ='<div> 4.
</div>';
$pdf->writeHTMLCell(90, 7, 12, 172, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Have you ever been in exclusion, deportation, or removal 
proceedings or ordered removed from the United States?
</div>';
$pdf->writeHTMLCell(85, 7, 20, 172, $html, 0, 1, false, true, 'J', true);
//............

$part3_4y = (showData('i_90_processing_info_4_removal_status')=='Y')? 'checked':'';
$part3_4n = (showData('i_90_processing_info_4_removal_status')=='N')? 'checked':'';

$html ='<div>
<input type="checkbox" name="part3_4" value="Y" checked="'.$part3_4y.'" />  Yes   &nbsp; 
<input type="checkbox" name="part3_4" value="N" checked="'.$part3_4n.'" /> No</div>';

$pdf->writeHTMLCell(90, 7, 75, 182, $html, 0, 1, false, true, 'J', true);
//..........


$pdf->SetFont('times', 'B', 10);
$html ='<div> 5.
</div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Since you were granted permanent residence, have you 
ever filed Form I-407, Abandonment by Alien of Status as 
Lawful Permanent Resident, or otherwise been determined 
to have abandoned your status?
</div>';
$pdf->writeHTMLCell(85, 7, 20, 190, $html, 0, 1, false, true, 'J', true);
//............
$part3_5y = (showData('i_90_processing_info_5_residence_status')=='Y')? 'checked':'';
$part3_5n = (showData('i_90_processing_info_5_residence_status')=='N')? 'checked':'';

$html ='<div>
<input type="checkbox" name="part3_5" value="Y" checked="'.$part3_5y.'" />  Yes   &nbsp; 
<input type="checkbox" name="part3_5" value="N" checked="'.$part3_5n.'" /> No</div>';

$pdf->writeHTMLCell(90, 7, 75, 204, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered <b>"Yes"</b> to <b>Item Numbers 4.</b> or <b>5.</b> 
above, provide a detailed explanation in the space provided in 
<b>Part 8. Additional Information.</b>
</div>';
$pdf->writeHTMLCell(87, 7, 13, 212, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b> Biographic Information</b> </div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'L', true);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity<i>(Select <b>only one</b> box)</i> </div>';
$pdf->writeHTMLCell(90, 7, 113, 27, $html, 0, 1, false, true, 'J', true);
//.........

$bio_hispanic = (showData('biographic_info_ethnicity')=='hispanic')? "checked":"";
$bio_nothispanic = (showData('biographic_info_ethnicity')=='nothispanic')? "checked":"";

$pdf->SetFont('times', '', 10);
$html ='<div>   <input type="checkbox" name="Latino" value="Y" checked="'.$bio_hispanic.'" />&nbsp;&nbsp;Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 118, 32, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>   <input type="checkbox" name="Not Hispanic" value="Y" checked="'.$bio_nothispanic.'" />&nbsp;&nbsp;Not Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 118, 37, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;Race<i>(Select <b>all applicable</b> boxes)</i> </div>';
$pdf->writeHTMLCell(90, 7, 113, 44, $html, 0, 1, false, true, 'J', true);
//.........


$bio_race_white     = (showData('biographic_info_race_white')=='Y')? "checked":" ";
$bio_race_asian     = (showData('biographic_info_race_asian')=='Y')? "checked":" ";
$bio_race_black     = (showData('biographic_info_race_black_african')=='Y')? "checked":" ";
$bio_race_american  = (showData('biographic_info_race_american_native')=='Y')? "checked":" ";
$bio_race_islander  = (showData('biographic_info_race_native_islander')=='Y')? "checked":" ";

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="white" value="Y" checked="'.$bio_race_white.'" />&nbsp; White</div>';
$pdf->writeHTMLCell(90, 7, 120, 50, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Asian" value="Y" checked="'.$bio_race_asian.'"/>&nbsp; Asian</div>';
$pdf->writeHTMLCell(90, 7, 120, 55, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Black" value="Y" checked="'.$bio_race_black.'" />&nbsp; Black or African American</div>';
$pdf->writeHTMLCell(90, 7, 120, 60, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Alaska" value="Y" checked="'.$bio_race_american.'" />&nbsp; American Indian or Alaska Native</div>';
$pdf->writeHTMLCell(90, 7, 120, 65, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Hawaiian" value="Y" checked="'.$bio_race_islander.'" />&nbsp; Native Hawaiian or Other Pacific Islander</div>';
$pdf->writeHTMLCell(90, 7, 120, 70, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>8.   </b>  Height </div>';
$pdf->writeHTMLCell(90, 7, 113, 78, $html, 0, 0, false, true, 'J', true);
//...........
$html= '<div><label for="selection">Feet:</label>
<select name="processing_info_feet" size="0">
    <option value=" ">select</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 148, 78, $html, 0, 0, false, true, 'J', true);
//..........
$html1= '<div><label for="selection">Inches:</label>
<select name="processing_info_inches" size="0">
    <option value=" ">select</option>
    <option value="2">0</option>
    <option value="2">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 175, 78, $html1, 0, 0, false, true, 'J', true);
//..........

$html= '<div><b>9.    </b>   Weight   &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; Pounds </div>';
$pdf->writeHTMLCell(90, 7, 113, 85, $html, 0, 0, false, true, 'J', true);
//...
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_info_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 165, 85);
$pdf->TextField('processing_info_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172, 85);
$pdf->TextField('processing_info_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 85);

//...........
$pdf->SetFont('times', '', 10);
$html= '<div><b>10.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 113, 93, $html, 0, 0, false, true, 'J', true);
//......
$bio_eye_black  = (showData('biographic_info_eye_color')=='black')? "checked":"";
$bio_eye_blue   = (showData('biographic_info_eye_color')=='blue')? "checked":"";
$bio_eye_brown  = (showData('biographic_info_eye_color')=='brown')? "checked":"";
$bio_eye_gray   = (showData('biographic_info_eye_color')=='gray')? "checked":"";
$bio_eye_green  = (showData('biographic_info_eye_color')=='green')? "checked":"";
$bio_eye_hazel  = (showData('biographic_info_eye_color')=='hazel')? "checked":"";
$bio_eye_maroon = (showData('biographic_info_eye_color')=='maroon')? "checked":"";
$bio_eye_pink   = (showData('biographic_info_eye_color')=='pink')? "checked":"";
$bio_eye_unk    = (showData('biographic_info_eye_color')=='unknown')? "checked":"";





$pdf->SetFont('times', '', 10);
$html= '<div>   
&nbsp; &nbsp;&nbsp;
<input type="checkbox" name="black" value="black" checked="'.$bio_eye_black.'"/> Black 
&nbsp;  &nbsp;  &nbsp;&nbsp;
<input type="checkbox" name="blue" value="blue" checked="'.$bio_eye_blue.'"/> Blue 
&nbsp; &nbsp; &nbsp;&nbsp;
<input type="checkbox" name="brown" value="brown" checked="'.$bio_eye_brown.'"/> Brown <br>

&nbsp; &nbsp; &nbsp; 
<input type="checkbox" name="gray " value="gray" checked="'.$bio_eye_gray.'"/>  Gray
&nbsp; &nbsp; &nbsp; &nbsp;
<input type="checkbox" name="green " value="green" checked="'.$bio_eye_green.'"/> Green 
&nbsp; &nbsp; 
<input type="checkbox" name="hazel " value="hazel" checked="'.$bio_eye_hazel.'"/> Hazel <br>

&nbsp; &nbsp; &nbsp; 
<input type="checkbox" name="maroon" value="maroon" checked="'.$bio_eye_maroon.'"/> Maroon 
&nbsp; &nbsp;
<input type="checkbox" name="pink" value="pink" checked="'.$bio_eye_pink.'"/> Pink 
&nbsp;  &nbsp;  &nbsp; 
<input type="checkbox" name="unknown" value="unknown" checked="'.$bio_eye_unk.'" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 113, 99, $html, 0, 0, false, true, 'J', true);
//......
$pdf->SetFont('times', '', 10);
$html= '<div><b>11.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 113, 113, $html, 0, 0, false, true, 'J', true);


$bio_hair_bald      = (showData('biographic_info_hair_color')=='bald')? "checked":"";
$bio_hair_black     = (showData('biographic_info_hair_color')=='black')? "checked":"";
$bio_hair_blond     = (showData('biographic_info_hair_color')=='blond')? "checked":"";
$bio_hair_brown     = (showData('biographic_info_hair_color')=='brown')? "checked":"";
$bio_hair_gray      = (showData('biographic_info_hair_color')=='gray')? "checked":"";
$bio_hair_red       = (showData('biographic_info_hair_color')=='red')? "checked":"";
$bio_hair_sandy     = (showData('biographic_info_hair_color')=='sandy')? "checked":"";
$bio_hair_white     = (showData('biographic_info_hair_color')=='white')? "checked":"";
$bio_hair_unk       = (showData('biographic_info_hair_color')=='unknown')? "checked":"";


$html= '<div>   
&nbsp;
<input type="checkbox" name="blad" value="blad" checked="'.$bio_hair_bald.'"/> Blad(No hair) 
&nbsp;&nbsp;
<input type="checkbox" name="black1" value="black" checked="'.$bio_hair_black.'"/> Black
&nbsp; &nbsp; &nbsp;&nbsp;
<input type="checkbox" name="blond" value="blond" checked="'.$bio_hair_blond.'"/> Blond <br>
 &nbsp; 
<input type="checkbox" name="Brown1 " value="Brown" checked="'.$bio_hair_brown.'"/> Brown 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; 
<input type="checkbox" name="gray1 " value="gray" checked="'.$bio_hair_gray.'"/> Gray 
 &nbsp; &nbsp; &nbsp; &nbsp; 
<input type="checkbox" name="red " value="red" checked="'.$bio_hair_red.'"/> Red <br>
&nbsp; 
<input type="checkbox" name=" sandy" value=" sandy" checked="'.$bio_hair_sandy.'"/> Sandy  
&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; 
<input type="checkbox" name="white" value="white" checked="'.$bio_hair_white.'"/>  White
&nbsp;  &nbsp;  &nbsp; 
<input type="checkbox" name="unknown1" value="unknown" checked="'.$bio_hair_unk.'"/> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 116, 119, $html, 0, 0, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Accommodations for Individuals with 
Disabilities and/or Impairments</b> (Read the 
information in the Form I-90 Instructions before 
completing this part.)</div>';
$pdf->writeHTMLCell(90, 6, 114, 137, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you need extra space to complete this section, use 
the space provided in <b>Part 8. Additional Information.</b>

</div>';
$pdf->writeHTMLCell(85, 7, 113, 160, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>

</div>';
$pdf->writeHTMLCell(85, 7, 113, 171, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Are you requesting an accommodation because of your 
disabilities and/or impairments? 

</div>';
$pdf->writeHTMLCell(80, 7, 120, 171, $html, 0, 1, false, true, 'J', true);
//............

$part4_1y = (showData('i_90_accomodation_1_requesting_status')=='Y')? 'checked':'';
$part4_1n = (showData('i_90_accomodation_1_requesting_status')=='N')? 'checked':'';


$html ='<div>
<input type="checkbox" name="part4_1" value="Y" checked="'.$part4_1y.'"/>  Yes   &nbsp; 
<input type="checkbox" name="part4_1" value="N" checked="'.$part4_1n.'" /> No</div>';

$pdf->writeHTMLCell(90, 7, 178, 177, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes," select any applicable boxes: 

</div>';
$pdf->writeHTMLCell(80, 7, 114, 185, $html, 0, 1, false, true, 'J', true);
//............

$part4_1a = (showData('i_90_accomodation_1a_deaf_hard_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.    </b> <input type="checkbox" name="part2_1a" value="Y" checked="'.$part4_1a.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 113, 192, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I am deaf or hard of hearing and request the 
<br>following accommodation (If you are requesting a 
<br>sign-language interpreter, indicate for which 
<br>language (for example, American Sign Language): 

</div>';
$pdf->writeHTMLCell(80, 7, 126, 192, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="18" rows="7" name="accommodations_for_individuals_1a">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 126, 208, $html, 0, 0, false, 'L'); */

$pdf->setCellHeightRatio(1.8);
$pdf->TextField('accommodations_for_individuals_1a', 77, 40, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_accomodation_1a_deaf_hard_text_value')), 126, 210);
$pdf->setCellHeightRatio( 1.2 );

//.........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Accommodations for Individuals with 
Disabilities and/or Impairments</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........
$part4_1b = (showData('i_90_accomodation_1b_blind_vision_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.    </b> <input type="checkbox" name="part2_1b" value="Y" checked="'.$part4_1b.'"/> </div>';
$pdf->writeHTMLCell(90, 7, 12, 32, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I am blind or have low vision and request the 
<br>following accommodation:</div>';
$pdf->writeHTMLCell(80, 7, 26, 32, $html, 0, 1, false, true, 'J', true);
//............
 
$pdf->SetFont('courier', 'B', 10);
/*$html = <<<EOD
<textarea cols="18" rows="7" name="accommodations_for_individuals_1b">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 26, 40, $html, 0, 0, false, 'L'); */
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('accommodations_for_individuals_1b', 77, 28, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_accomodation_1b_blind_vision_text_value')), 26, 42);
$pdf->setCellHeightRatio( 1.2 );

//.........
$part4_1c = (showData('i_90_accomodation_1c_disability_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.    </b> <input type="checkbox" name="part2_1c" value="Y" checked="'.$part4_1c.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 70, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I have another type of disability and/or impairment 
(Describe the nature of your disability and/or 
impairment and the accommodation you are 
requesting):</div>';
$pdf->writeHTMLCell(75, 7, 26, 70, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="18" rows="7" name="accommodations_for_individuals_1c">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 26, 86, $html, 0, 0, false, 'L');
 */

$pdf->setCellHeightRatio(1.8);
$pdf->TextField('accommodations_for_individuals_1c', 77, 28, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_accomodation_1c_disability_text_value')), 26, 89);
$pdf->setCellHeightRatio( 1.2 );

//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. &nbsp;Applicant\'s Statement, Contact 
Information, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 118, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-90
Instructions before completing this part. ';
$pdf->writeHTMLCell(90, 7, 12, 131, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 143, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> 
<br>If applicable, select the box for <b>Item Number 2.</b>';
$pdf->writeHTMLCell(90, 7, 12, 152, $html, '', 0, 0, true, 'L');

$part5_1a = (showData('i_90_applicant_statement_1a_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 9);
$html ='<div><b>1.a.    </b> &nbsp; <input type="checkbox" name="part3_1a" value="Y" checked="'.$part5_1a.'" /></div>';
$pdf->writeHTMLCell(50, 15, 12, 163, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'I can read and understand English, and I have read 
<br>and understand every question and instruction on this 
<br>application and my answer to every question.';
$pdf->writeHTMLCell(90, 7, 25, 163, $html, '', 0, 0, true, 'L');


$part5_1b = (showData('i_90_applicant_statement_1b_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 9);
$html ='<div><b>1.b.    </b> &nbsp; <input type="checkbox" name="part3_1b" value="Y" checked="'.$part5_1b.'" /></div>';
$pdf->writeHTMLCell(50, 15, 12, 180, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'The interpreter named in <b>Part 6.</b> read to me every 
<br>question and instruction on this application and my 
<br>answer to every question in';
$pdf->writeHTMLCell(90, 7, 25, 180, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_statement_1b', 76, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 193);
//........

$pdf->SetFont('times', '', 10); // set font
$html = ' a language in which I am fluent, and I understood
<br>everything.
 ';
$pdf->writeHTMLCell(90, 7, 26, 200, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7, 102, 196, $html, '', 0, 0, true, 'L');
//.........
$part5_2 = (showData('i_90_applicant_statement_2_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.     </b> &nbsp; &nbsp; &nbsp;<input type="checkbox" name="2" value="Y" checked="'.$part5_2.'" /> &nbsp; At my request, the preparer named in <b>Part 7</b>.,';
$pdf->writeHTMLCell(90, 7, 13, 210, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_statement_2', 76, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 215);
//........
$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7, 102, 218, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = ' prepared this application for me based only upon
<br>information I provided or authorized. ';
$pdf->writeHTMLCell(90, 7, 26, 222, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. &nbsp;  &nbsp;&nbsp;</b> Requestor\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 114, 26, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_daytime', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 31);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Requestor\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 114, 39, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_mobile', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 44);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Requestor\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 114, 52, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_email', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 57);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Certification</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 68, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Copies of any documents I have submitted are exact 
<br>photocopies of unaltered, original documents, and I understand 
that USCIS may require that I submit original documents to 
USCIS at a later date. Furthermore, I authorize the release of 
<br>any information from any of my records that USCIS may need 
<br>to determine my eligibility for the immigration benefit I seek.';
$pdf->writeHTMLCell(95, 7, 113, 76, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I further authorize release of information contained in this 
application, in supporting documents, and in my USCIS records 
to other entities and persons where necessary for the 
administration and enforcement of U.S. immigration laws.';
$pdf->writeHTMLCell(95, 7, 113, 103, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I understand that USCIS will require me to appear for an 
appointment to take my biometrics (fingerprints, photograph, 
and/or signature) and, at that time, I will be required to sign an 
oath reaffirming that:';
$pdf->writeHTMLCell(95, 7, 113, 122, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = '1) I reviewed and provided or authorized all of the 
<br>information in my application; 
<br>2) I understood all of the information contained in, and 
<br>submitted with, my application; and 
<br>3) All of this information was complete, true, and correct 
<br>at the time of filing.';
$pdf->writeHTMLCell(95, 7, 123, 140, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that I provided or authorized 
all of the information in my application, I understand all of the 
information contained in, and submitted with, my application, 
and that all of this information is complete, true, and correct.';
$pdf->writeHTMLCell(95, 7, 113, 165, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 186, $html, 0, 1, true, false, 'L', true);
//.............






$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.</b> &nbsp;&nbsp;Applicant\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 113, 194, $html, 0, 1, false, true, 'J', true);
//...........



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 209);
//..........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(81.5, 7, 122, 200, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 113, 209, $html, 0, 1, false, true, 'J', true);
//............




//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(92, 7, 113, 199, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');


$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE TO ALL REQUESTORS:</b> If you do not completely 
fill out this application or fail to submit required documents listed 
in the Instructions, USCIS or DOS may deny your application.

</div>';
$pdf->writeHTMLCell(90, 7, 113, 219, $html, 0, 1, false, true, 'J', true);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
//............


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Interpreter\'s Contact Information,
Certification, and Signature </b>  </div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//............

$pdf->SetFont('times', '', 10); // set font
$html = ' Provide the following information about the interpreter.';
$pdf->writeHTMLCell(95, 7, 12, 30, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 38, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.  </b> &nbsp; Interpreter\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 12, 46, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_family', 80.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 51);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.  </b> &nbsp; Interpreter\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 12, 58, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_given', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 63);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b> &nbsp; &nbsp;&nbsp; Interpreter\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 12, 71, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_business', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 76);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 86, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 13, 94, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name', 58.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 95);
//.........

$part6_3b_apt =  (showData('i_90_interpreter_mailing_apt_ste_flr')=='apt')?'checked':'';
$part6_3b_ste =  (showData('i_90_interpreter_mailing_apt_ste_flr')=='ste')?'checked':'';
$part6_3b_flr =  (showData('i_90_interpreter_mailing_apt_ste_flr')=='flr')?'checked':'';


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="apT1" value="apT1" checked="'.$part6_3b_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="sTe1" value="sTe1" checked="'.$part6_3b_ste.'" />Ste. 
<input type="checkbox" name="fLr2" value="fLr2" checked="'.$part6_3b_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 13, 104, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address__apt_ste_flr', 40.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 103);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 13, 112, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_city_or_town', 58.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 111);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 13, 120, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 120, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_zip_code', 32.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70.5, 119);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 13, 128, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_province', 59.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 127);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 13, 135, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_postal_code', 59.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 135);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 13, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_country', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 146);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(89.2, 7, 14, 155, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 13, 163, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_daytime', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 168);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 175, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_mobile', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 180);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_email', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 192);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s  Certification</b></div>';
$pdf->writeHTMLCell(89.2, 7, 14, 203, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that:';
$pdf->writeHTMLCell(90, 7, 13, 210, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I am fluent in English and';
$pdf->writeHTMLCell(90, 7, 13, 217, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_certification', 51.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 215);
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'which is the same language provided in <b>Part 5., Item Number 
1.b.,</b> and I have read to this applicant in the identified language 
every question and instruction on this application and his or her 
answer to every question. The applicant informed me that he or 
she understands every instruction, question, and answer on the 
application, including the <b>Applicant\'s Certification</b>, and has 
verified the accuracy of every answer.';
$pdf->writeHTMLCell(95, 7, 13, 222, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b>  &nbsp; &nbsp;Interpreter\'s Signature';
$pdf->writeHTMLCell(90, 7, 114, 26, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(80, 7, 124, 31, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b>  &nbsp; &nbsp;Date of Signature (mm/dd/yyyy)';
$pdf->writeHTMLCell(90, 7, 114, 40, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_signature_date', 33.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 40);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, If Other than the Applicant</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 51, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'Provide the following information about the preparer.';
$pdf->writeHTMLCell(90, 7, 113, 67, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 75, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.  </b> &nbsp; Preparer\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 113, 83, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_family', 81.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122.5, 88);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.  </b> &nbsp; Preparer\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 113, 96, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_given', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 101);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b> &nbsp; &nbsp;&nbsp; Preparer\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 113, 109, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_business', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 114);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Preparer\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 124, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 113, 132, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 133);
//........

$part7_3b_apt =  (showData('i_90_preparer_mailing_apt_ste_flr')=='apt')?'checked':'';
$part7_3b_ste =  (showData('i_90_preparer_mailing_apt_ste_flr')=='ste')?'checked':'';
$part7_3b_flr =  (showData('i_90_preparer_mailing_apt_ste_flr')=='flr')?'checked':'';

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="Apt1" value="Apt2" checked="'.$part7_3b_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste1" value="Ste2" checked="'.$part7_3b_ste.'" />Ste. 
<input type="checkbox" name="Flr1" value="Flr2" checked="'.$part7_3b_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 113, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address__apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 142);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp; &nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 113, 152, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 151);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 160, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 130, 160, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 160);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 169, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 169);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 178, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 178);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 185, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 190);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 114, 200, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b>&nbsp;&nbsp;&nbsp; &nbsp;Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 209, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 214);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp; &nbsp; Preparer\'s  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 223, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121,228);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp; &nbsp; Preparer\'s Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 112, 237, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 242);
//...............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and 
Signature of the Person Preparing this 
Application, if Other Than the Applicant </b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 43, $html, 0, 1, true, false, 'L', true);
//...........
$part7_7a = (showData('i_90_preparer_statement_7a_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.   </b>    <input type="checkbox" name="preparer7a" value="Y" checked="'.$part7_7a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 51, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am not an attorney or accredited representative but 
<br>have prepared this application on behalf of the applicant 
<br>and with the applicant\'s consent. </div>';
$pdf->writeHTMLCell(90, 7, 25, 51, $html, 0, 1, false, true, 'J', true);
//.........

$part7_7b = (showData('i_90_preparer_statement_7b_status')=='Y')? 'checked':'';

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.   </b>    <input type="checkbox" name="preparer7b" value="Y" checked="'.$part7_7b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 64, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am an attorney or accredited representative and my
representation of the applicant in this case </div>';
$pdf->writeHTMLCell(78, 7, 25, 64 , $html, 0, 1, false, true, 'J', true);


$part7_7b1 = (showData('i_90_preparer_statement_7b1_status')=='Y')? 'checked':'';
$part7_7b2 = (showData('i_90_preparer_statement_7b2_status')=='Y')? 'checked':'';
$pdf->SetFont('times', '', 10);
$html ='<div> extends  
<input type="checkbox" name="extends" value="Y" checked="'.$part7_7b1.'" /> does not extend  
<input type="checkbox" name="dontextend" value="Y" checked="'.$part7_7b2.'" /> <br>&nbsp;beyond the preparation of this application.
</div>';
$pdf->writeHTMLCell(90, 7, 25, 72, $html, 0, 1, false, true, 'J', true);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you are an attorney or accredited 
representative whose representation extends beyond 
preparation of this application, you may be obliged to 
submit a completed Form G-28, Notice of Entry of 
Appearance as Attorney or Accredited 
Representative, with this application.  </div>';
$pdf->writeHTMLCell(90, 7, 12, 82, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 110, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I certify, under penalty of perjury, that I 
prepared this application at the request of the applicant. The 
applicant then reviewed this completed application and 
informed me that he or she understands all of the information 
contained in, and submitted with, his or her application, 
including the <b>Applicant\'s Certification</b>, and that all of this 
information is complete, true, and correct. I completed this 
application based only on information that the applicant 
provided to me or authorized me to obtain or use. 
</div>';
$pdf->writeHTMLCell(90, 7, 12, 118, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 160, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.</b> &nbsp;&nbsp;Preparer\'s Signature  (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 168, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 20, 173, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 183, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('peparer_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69, 182);
//.............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 7
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 8.  &nbsp;Additional Information</b><i></i></div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to provide any additional information
within this application, use the space below. If you need more
space than what is provided, you may make copies of this page

to complete and file with this application or attach a separate
sheet of paper. Type or print your name and A-Number (if any)
at the top of each sheet; indicate the <b>Page Number, Part
Number</b>, and <b>Item Number</b> to which your answer refers; and
sign and date each sheet.</div>';
$pdf->writeHTMLCell(90, 7, 12, 26, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_family_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 61);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 68, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_given_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 70);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 79);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 1, false, false, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 70, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 51, 88, $html, 0, 1, false, false, 'L', true);

$pdf->writeHTMLCell(45, 7, 57.9, 88, ''.showData('i_90_additional_info_a_number').'',  1,  1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 103);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 103);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 103);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 113, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="20" rows="17" name="aditional_inf0_name_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 20, 111, $html, 0, 0, false, 'L'); */

$pdf->setCellHeightRatio(1.8);
$pdf->TextField('aditional_inf0_name_3d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_additional_info_3d')), 20, 115);
$pdf->setCellHeightRatio( 1.2 );

//............


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 186);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 186);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 186);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="20" rows="17" name="aditional_inf0_name_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 20, 194, $html, 0, 0, false, 'L'); */

$pdf->setCellHeightRatio(1.8);
$pdf->TextField('aditional_inf0_name_4d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_additional_info_3d')), 20, 199);
$pdf->setCellHeightRatio( 1.2 );

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 146, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 22);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 177, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 185, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 31, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="19" rows="16" name="additional_info_name_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123, 31, $html, 0, 0, false, 'L'); */

$pdf->setCellHeightRatio(1.8);
$pdf->TextField('additional_info_name_5d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_additional_info_5d')), 123, 36);
$pdf->setCellHeightRatio( 1.2 );
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number3', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 103);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number3', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  154, 103);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number3', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 103);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 113, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="19" rows="17" name="additional_info_name_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123.5, 111, $html, 0, 0, false, 'L'); */


$pdf->setCellHeightRatio(1.8);
$pdf->TextField('additional_info_name_6d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_additional_info_6d')), 123, 115);
$pdf->setCellHeightRatio( 1.2 );

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number4', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 186);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_part_number4', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  154, 186);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_item_number4', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 184, 186);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 196, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="19" rows="17" name="additional_info_name_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123.5, 194, $html, 0, 0, false, 'L'); */

$pdf->setCellHeightRatio(1.8);
$pdf->TextField('additional_info_name_7d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_90_additional_info_7d')), 123, 199);
$pdf->setCellHeightRatio(1.2);

//..............


$js = "
var fields = {

    'info_about_you_alien_reg':' ".showData('other_information_about_you_alien_registration_number')."',
    'info_about_you_uscis_online':' ".showData('other_information_about_you_uscis_online_account_number')."',
    'your_full_name_last_name':' ".showData('information_about_you_family_last_name')."',
    'your_full_name_first_name':' ".showData('information_about_you_given_first_name')."',
    'your_full_name_middle_name':' ".showData('information_about_you_middle_name')."',
    'other_names_used_last_name':' ".showData('information_about_you_other_family_last_name')."',
    'other_names_used_first_name':' ".showData('information_about_you_other_given_first_name')."',
    'other_names_used_middle_name':' ".showData('information_about_you_other_middle_name')."',

    'mailing_in_care_name':' ".showData('information_about_you_us_mailing_care_of_name')."',
    'mailing_street_number_name':' ".showData('information_about_you_us_mailing_street_number')."',
    'mailing_apt_ste_flr':' ".showData('information_about_you_us_mailing_apt_ste_flr_value')."',
    'mailing_city_town':' ".showData('information_about_you_us_mailing_city_town')."',
    'mailing_state':' ".showData('information_about_you_us_mailing_state')."',
    'mailing_zipcode':' ".showData('information_about_you_us_mailing_zip_code')."',
    'mailing_province':' ".showData('information_about_you_us_mailing_province')."',
    'mailing_postal_code':' ".showData('information_about_you_us_mailing_postal_code')."',
    'mailing_country':' ".showData('information_about_you_us_mailing_country')."',

    'physical_street_number_name':' ".showData('information_about_you_home_street_number')."',
    'physical_apt_ste_flr':' ".showData('information_about_you_home_apt_ste_flr_value')."',
    'physical_city_town':' ".showData('information_about_you_home_city_town')."',
    'physical_state':' ".showData('information_about_you_home_state')."',
    'physical_zipcode':' ".showData('information_about_you_home_zip_code')."',
    'physical_province':' ".showData('information_about_you_home_province')."',
    'physical_postal_code':' ".showData('information_about_you_home_postal_code')."',
    'physical_country':' ".showData('information_about_you_home_country')."',

    //page 1 end 

    'information_about_you_date_of_birth':' ".showData('other_information_about_you_date_of_birth')."',
    'information_about_you_city_town_birth':' ".showData('other_information_about_you_city_of_birth')."',
    'information_about_you_country_birth':' ".showData('other_information_about_you_country_of_birth')."',
    'mother_name_first_name':' ".showData('parent2_info_given_first_name')."',
    'father_name_first_name':' ".showData('parent1_info_given_first_name')."',
    'class_of_addmission':' ".showData('other_information_about_you_class_of_addmission')."',
    'date_of_admission':' ".showData('other_information_about_you_date_of_admission')."',
    'information_about_you_us_social_number':' ".showData('other_information_about_you_social_security_number')."',

    //page 2 end 

    'process_info_location':' ".showData('i_90_processing_info_about_your_apply_location')."', 
    'process_info_location1':' ".showData('i_90_processing_info_about_your_immigrant_location')."',
    'process_info_destination':' ".showData('i_90_processing_info_about_your_destination_location')."',
    'process_info_city_town':' ".showData('i_90_processing_info_about_your_town_state_location')."',
    'processing_info_feet':' ".showData('biographic_info_height_feet')."',
    'processing_info_inches':' ".showData('biographic_info_height_inches')."',
    'processing_info_pound1':' ".showData('biographic_info_weight_in_pound1')."',
    'processing_info_pound2':' ".showData('biographic_info_weight_in_pound2')."',
    'processing_info_pound3':' ".showData('biographic_info_weight_in_pound3')."',

    //page 3 end 

    'applicant_statement_1b':' ".showData('i_90_applicant_statement_1b_text_value')."',
    'applicant_statement_2':' ".showData('i_90_applicant_statement_2_request_text_value')."',
    'applicant_contact_info_daytime':' ".showData('i_90_applicant_day_time_telephone')."',
    'applicant_contact_info_mobile':' ".showData('i_90_applicant_mobile_telephone')."',
    'applicant_contact_info_email':' ".showData('i_90_applicant_email_address')."',
    'applicant_date_of_signature':' ".showData('i_90_applicant_date_of_signature')."',

    //page 4 end

    'interpreter_contact_info_family':' ".showData('i_90_interpreter_family_lastname')."',
    'interpreter_contact_info_given':' ".showData('i_90_interpreter_given_firstname')."',
    'interpreter_contact_info_business':' ".showData('i_90_interpreter_business_org_name')."',

    'interpreter_mailing_address_street_name':' ".showData('i_90_interpreter_mailing_street_number')."',
    'interpreter_mailing_address__apt_ste_flr':' ".showData('i_90_interpreter_mailing_apt_ste_flr_value')."',
    'interpreter_mailing_address_city_or_town':' ".showData('i_90_interpreter_mailing_city_town')."',
    'interpreter_mailing_address_state':' ".showData('i_90_interpreter_mailing_state')."',
    'interpreter_mailing_address_zip_code':' ".showData('i_90_interpreter_mailing_zipcode')."',
    'interpreter_mailing_address_province':' ".showData('i_90_interpreter_mailing_province')."',
    'interpreter_mailing_address_postal_code':' ".showData('i_90_interpreter_mailing_postal_code')."',
    'interpreter_mailing_address_country':' ".showData('i_90_interpreter_mailing_country')."',

    'interpreter_contact_info_daytime':' ".showData('i_90_interpreter_contact_daytime_telephone')."',
    'interpreter_contact_info_mobile':' ".showData('i_90_interpreter_contact_mobile_telephone')."',
    'interpreter_contact_info_email':' ".showData('i_90_interpreter_contact_email_address')."',
    'interpreter_certification':' ".showData('i_90_interpreter_certification')."',
    'interpreter_signature_date':' ".showData('i_90_interpreter_date_of_signature')."',

    'preparer_contact_info_family':' ".showData('i_90_preparer_family_lastname')."',
    'preparer_contact_info_given':' ".showData('i_90_preparer_given_firstname')."',
    'preparer_contact_info_business':' ".showData('i_90_preparer_business_org_name')."',

    'preparer_mailing_address_street_name':' ".showData('i_90_preparer_mailing_street_number')."',
    'preparer_mailing_address__apt_ste_flr':' ".showData('i_90_preparer_mailing_apt_ste_flr_value')."',
    'preparer_mailing_address_city_or_town':' ".showData('i_90_preparer_mailing_city_town')."',
    'preparer_mailing_address_state':' ".showData('i_90_preparer_mailing_state')."',
    'preparer_mailing_address_zip_code':' ".showData('i_90_preparer_mailing_zipcode')."',
    'preparer_mailing_address_province':' ".showData('i_90_preparer_mailing_province')."',
    'preparer_mailing_address_postal_code':' ".showData('i_90_preparer_mailing_postal_code')."',
    'preparer_mailing_address_country':' ".showData('i_90_preparer_mailing_country')."',

    'preparer_contact_info_daytime':' ".showData('i_90_preparer_contact_daytime_telephone')."',
    'preparer_contact_info_mobile':' ".showData('i_90_preparer_contact_mobile_telephone')."',
    'preparer_contact_info_email':' ".showData('i_90_preparer_contact_email_address')."',
    'peparer_date_of_signature':' ".showData('i_90_preparer_date_of_signature')."',

    //page 5 end

    'additional_info_family_last_name':' ".showData('i_90_additional_info_last_name')."',
    'additional_info_given_first_name':' ".showData('i_90_additional_info_first_name')."',
    'additional_info_middle_name':' ".showData('i_90_additional_info_middle_name')."',

    'additional_info_page_number':' ".showData('i_90_additional_info_3a_page_no')."',
    'additional_info_part_number':' ".showData('i_90_additional_info_3b_part_no')."',
    'additional_info_item_number':' ".showData('i_90_additional_info_3c_item_no')."',

    'additional_info_page_number1':' ".showData('i_90_additional_info_4a_page_no')."',
    'additional_info_part_number1':' ".showData('i_90_additional_info_4b_part_no')."',
    'additional_info_item_number1':' ".showData('i_90_additional_info_4c_item_no')."',

    'additional_info_page_number2':' ".showData('i_90_additional_info_5a_page_no')."',
    'additional_info_part_number2':' ".showData('i_90_additional_info_5b_part_no')."',
    'additional_info_item_number2':' ".showData('i_90_additional_info_5c_item_no')."',

    'additional_info_page_number3':' ".showData('i_90_additional_info_6a_page_no')."',
    'additional_info_part_number3':' ".showData('i_90_additional_info_6b_part_no')."',
    'additional_info_item_number3':' ".showData('i_90_additional_info_6c_item_no')."',
    
    'additional_info_page_number4':' ".showData('i_90_additional_info_7a_page_no')."',
    'additional_info_part_number4':' ".showData('i_90_additional_info_7b_part_no')."',
    'additional_info_item_number4':' ".showData('i_90_additional_info_7c_item_no')."',

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
$pdf->Output('I-90.pdf', 'I');













