<?php

require_once('formheader.php');   //database connection file 
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
		
		$this->Cell(40, 6, "Form I-131   Edition   04/01/24", 0, 0, 'L');
		
		
		// if ($this->page == 1){
        
		$barcode_image = "images/i131/I-131-footer-pdf417-$this->page.png";

		// )
        $this->Image($barcode_image, 65, 267, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 160, 267, true);

        
    }
}



$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-131, Application for Travel Document');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(13.7, 15.3, 12.8, true);

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


// Logo
$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(100, 15, "Application for Travel Document", 0, 'C', 0, 1, 55, 6, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-131", 0, 'C', 0, 1, 174.5, 5, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 5, "Department of Homeland Security", 0, 'C', 0, 1, 65, 9, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 5, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 63, 14, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 9.5, "OMB No. 1615-0013\nExpires 02/28/2027", 0, 'C', 0, 1, 169, 17.5, true);

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

//...........

//...table start 
$pdf->writeHTMLCell(148, 60, 13, 32, "", 1, 1, false, false, 'J', true);
$pdf->SetFillColor(225,225,225); // set filling color
$pdf->writeHTMLCell(13, 21, 13.4, 32.4, '', 'R', 1, true, true, 'J', true);
$pdf->SetFont('times', 'B', 10);
$html ='<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(12, 30, 13, 33, $html, 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(15, 30, 50, 32, 'Receipt', 0, 1, false, true, 'C', true);
$pdf->writeHTMLCell(25, 30, 110, 32, 'Action Block', 0, 1, false, true, 'C', true);

$pdf->writeHTMLCell(1, 60, 90, 32, '', 'R', 1, false, true, 'J', true); //middle vertical(|) line 
$pdf->writeHTMLCell(78, 1, 13, 47.8, '', 'B', 1, false, true, 'J', true); //under receipt  horizontal (---) line 

$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 15, 56, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(50, 7, 18, 54, 'Document Hand Delivered', 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 9);
$html ='<div>By:<b>__________________</b> Date:<b> _____/______/______</b></div>';
$pdf->writeHTMLCell(80, 7, 18, 60, $html, 0, 1, false, true, 'J', true);

$pdf->writeHTMLCell(78, 1, 13, 61, '', 'B', 1, false, true, 'J', true); //horizontal (---) line 

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(50, 7, 40, 65, 'Document Issued', 0, 1, false, false, 'J', true);
//........

$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 14.5, 73.5, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 8.6);
$html ='<div>Re-entry Permit<i> (Update "Mail To" Section)</i></div>';
$pdf->writeHTMLCell(35, 7, 16.8, 72.8, $html, 0, 1, false, false, 'l', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 51, 73.5, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 8.6);
$html ='<div>Refugee Travel Document <i> (Update "Mail To" Section)</i></div>';
$pdf->writeHTMLCell(40, 7, 53.4, 72, $html, 0, 1, false, true, 'L', true);
//.....


$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 14.5, 82.5, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 8.6);
$html ='<div>Single Advance Parole</i></div>';
$pdf->writeHTMLCell(30, 7,16.8, 82, $html, 0, 1, false, false, 'L', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 51, 82.5, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 8.6);
$html ='<div>Multiple Advance Parole <br><i>Valid Until</i>: <b>____/____/____</b></div>';
$pdf->writeHTMLCell(40, 7, 53.4, 81, $html, '', 1, false, false, 'L', true);
//.....

$pdf->writeHTMLCell(70, 1, 91, 65, '', 'B', 1, false, true, 'J', true); //horizontal (---) line 
//.........
$pdf->SetFont('times', '', 9.5);
$html ='<div><b>Mail To <b></div>';
$pdf->writeHTMLCell(18, 5, 91.6, 72, $html, 0, 1, false, false, 'L', true);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->SetFont('times', 'BI', 8.5);
$html ='<div>(Re-entry & Refugee Only)</div>';
$pdf->writeHTMLCell(17, 16, 90.6, 77, $html, '', 1, false, true, 'C', true);
//.....
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 110, 74, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 9.5);
$html ='<div>Address in <i>Part 1</i></i></div>';
$pdf->writeHTMLCell(30, 7, 112.5, 73, $html, 0, 1, false, true, 'J', false);
//.....

$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 110, 79, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 9.5);
$html ='<div>US Consulate at:<b>______________</b></i></div>';
$pdf->writeHTMLCell(50, 7, 112.5, 78, $html, 0, 1, false, false, 'J', false);
//.....


$pdf->SetFont('times', '', 7);
$pdf->setCellHeightRatio(0.8);
$pdf->writeHTMLCell(2, 2, 110, 84, '', 1, 1, false, true, 'J', false); //square qube 
$pdf->setCellHeightRatio(1.1);
$pdf->SetFont('times', '', 9.5);
$html ='<div>Intl DHS Ofc at:<b>______________</b></div>';
$pdf->writeHTMLCell(50, 7, 112.5, 83, $html, 0, 1, false, true, 'J', false);





//right side table start 
$pdf->writeHTMLCell(40, 60, 163, 32, "", 1, 1, false, true, 'J', true);

$pdf->SetFont('times', 'B', 10);
$html ='<div>To Be Completed by an <i>Attorney/ Representative,<br> if any.</i></div>';
$pdf->writeHTMLCell(28, 7, 167, 33, $html, 0, 1, false, true, 'C', false);
//.....

$pdf->SetFont('times', '', 14);
$checked = (showData('i_131_g28_checkbox')=='Y')? "checked":"";
$html ='<input type="checkbox"  name="i_131_g28_checkbox" value="1" checked="'.$checked.'" />';
$pdf->writeHTMLCell(37, 7, 163, 52, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Fill in box if G-28 is attached to represent<br>the applicant.</div>';
$pdf->writeHTMLCell(37, 7, 170, 53, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(40, 1, 163, 65, '', 'B', 1, false, true, 'J', true); //horizontal (---) line 


//............
$pdf->SetFont('times', '', 10);
$html ='<div>Attorney State License Number:  </div>';
$pdf->writeHTMLCell(30, 7, 165, 70, $html, 0, 0, false, true, 'C', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_licence', 35, 9,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),165, 80);
//.............
$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>Start Here.</b> Type or Print in Black Ink</div>';
$pdf->writeHTMLCell(100, 7, 15, 92, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10); // set font
$pdf->Image('images/right_angle.jpg', 12.5, 93.4, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);// angle 
//............
$pdf->SetFillColor(220,220,220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 1. Information About You</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 98, $html, 1, 1, true, false, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  <i>(Last Name)</i> </div>';
$pdf->writeHTMLCell(35, 10, 12, 106, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_lastname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 107);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; <i>(First Name)</i> </div>';
$pdf->writeHTMLCell(35, 10, 12, 114, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_firstname', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 116);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 125, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_middlename', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 125);

//...........
$pdf->setCellHeightRatio(1.4);
$pdf->setCellPaddings(1, 0, 0, 0);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Physical Address</b></div>';
$pdf->writeHTMLCell(91, 6.5, 13, 134, $html, 0, 0, true, false, 'L', false);

//........
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->SetFont('times', '', 8);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(USPS ZIP Code Lookup)</i></b></a></div>';
$pdf->writeHTMLCell(90, 7, 13, 135, $html, 0, 1, false, false, 'R', true);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.a.  </b>  In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 12, 141.7, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_physical_care_of_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 147);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(30, 0, 12, 155, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 20, 155, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_your_physical_street_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 156);

//.................
$pdf->SetFont('times', '', 10); 
$html= '<div><b>2.c.</b></div>';
$pdf->writeHTMLCell(15, 0, 12, 166, $html, '', 0, 0, true, 'L');

$mailing_apt = (showData('information_about_you_home_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('information_about_you_home_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('information_about_you_home_apt_ste_flr')=='flr')? "checked":"";

$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Apt1" value="Apt1" checked="'.$mailing_apt.'" />';
$pdf->writeHTMLCell(5, 0, 28.5, 165, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Apt.</div>';
$pdf->writeHTMLCell(25, 0, 20, 166, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Ste1" value="Ste1" checked="'.$mailing_ste.'" />';
$pdf->writeHTMLCell(5, 0, 42.5, 165, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Ste.</div>';
$pdf->writeHTMLCell(25, 0, 35, 166, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Flr1" value="Flr1" checked="'.$mailing_flr.'" />';
$pdf->writeHTMLCell(5, 0, 57, 165, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Flr.</div>';
$pdf->writeHTMLCell(25, 0, 50, 166, $html, '', 0, 0, true, 'L');
//

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_apt_ste_flr', 39.3, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 64.7, 165);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.d.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 174, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_city_or_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44, 174);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.e.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 183, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="about_your_physical_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 182, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_zip_code', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69, 183);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 192, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_postal_code', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44.5, 192);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.h.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 201, $html, '', 0, 0, true, 'L'); 
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_province', 59.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),44.5, 201);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12.7, 210, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_your_physical_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 33, 210);
//.......... left side end ...................


$pdf->SetFont('times', 'I', 12);
$pdf->setCellHeightRatio(1.5); // set cell height ratio
$html ='<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 108, $html, 0, 0, true, true, 'L', false);
$pdf->setCellHeightRatio(1.1); // set cell height ratio
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.  </b> Alien Registration Number (A-Number) </div>';
$pdf->writeHTMLCell(80, 10, 112, 116, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(80, 10, 150, 119, "A-", 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_alien_reg_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 122);
$pdf->Image('images/right_angle.jpg', 147, 123.4, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);// angle 
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.  </b> Country of Birth </div>';
$pdf->writeHTMLCell(80, 10, 112, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 135);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.  </b> Country of Citizenship </div>';
$pdf->writeHTMLCell(80, 10, 112, 143, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_country_of_citizenship', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 148);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.  </b> Class of Admission </div>';
$pdf->writeHTMLCell(80, 10, 112, 156, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_class_of_admission', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 161);
//.........
$pdf->SetFont('times', '', 10); 
$html= '<div><b>7.</b></div>';
$pdf->writeHTMLCell(15, 0, 112, 170, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Gender</div>';
$pdf->writeHTMLCell(25, 0, 117, 170, $html, '', 0, 0, true, 'L');
// //
$male = (showData('other_information_about_you_gender')=='male')? "checked":"";
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="gender" value="male" checked="'.$male.'" />';
$pdf->writeHTMLCell(5, 0, 130, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Male</div>';
$pdf->writeHTMLCell(25, 0, 136, 170, $html, '', 0, 0, true, 'L');
// //
$female = (showData('other_information_about_you_gender')=='female')? "checked":"";
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="gender" value="female" checked="'.$female.'" />';
$pdf->writeHTMLCell(5, 0, 145, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Female</div>';
$pdf->writeHTMLCell(25, 0, 151, 170, $html, '', 0, 0, true, 'L');

//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.  </b> Date of Birth   &nbsp; &nbsp;  <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(80, 10, 112, 177, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_date_of_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 177);
$pdf->Image('images/right_angle.jpg', 163, 178.5, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);// angle 
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b>U.S. Social Security Number  <i>(if any)</i> </div>';
$pdf->writeHTMLCell(80, 10, 112, 187, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('other_information_us_social_security', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 193);
$pdf->Image('images/right_angle.jpg', 144, 194.5, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);// angle 
//..........page number 1 end-----------------------------------------------------------------------------------------------



// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2

$pdf->SetFillColor(220,220,220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 2. Application Type</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//..........
$checked = (showData('i_131_permanent_residence_1a_status')=='Y')? "checked":"";
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b><input type="checkbox" name="part2_1a" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 25, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I am a permanent resident or conditional resident of
the United States, and I am applying for a reentry
permit.</div>';
$pdf->writeHTMLCell(80, 7, 24, 25, $html, 0, 1, false, true, 'L', true);
//........
$checked = (showData('i_131_refuge_asylee_residence_1b_status')=='Y')? "checked":"";
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b><input type="checkbox" name="part2_1b" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I now hold U.S. refugee or asylec status, and I am
applying for a Refugee Travel Document.</div>';
$pdf->writeHTMLCell(80, 7, 24, 37, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_direct_result_refugee_1c_status')=='Y')? "checked":"";
$html ='<div><b>1.c.  </b><input type="checkbox" name="part2_1c" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 47, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I am a permanent resident as a direct result of refugee
or asylee status, and I am applying for a Refugee
Travel Document.</div>';
$pdf->writeHTMLCell(80, 7, 24, 47, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_direct_result_refugee_1d_status')=='Y')? "checked":"";
$html ='<div><b>1.d.  </b><input type="checkbox" name="part2_1d" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I am applying for an Advance Parole Document to
allow me to return to the United States after
temporary foreign travel.</div>';
$pdf->writeHTMLCell(80, 7, 24, 60, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_outside_united_1e_status')=='Y')? "checked":"";
$html ='<div><b>1.e.  </b><input type="checkbox" name="part2_1e" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 73, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I am outside the United States, and I am applying for
an Advance Parole Document.</div>';
$pdf->writeHTMLCell(80, 7, 24, 73, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_applying_advance_parole_1f_status')=='Y')? "checked":"";
$html ='<div><b>1.f.&nbsp;&nbsp; </b><input type="checkbox" name="part2_1f" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 83, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I am applying for an Advance Parole Document for a
person who is outside the United States</div>';
$pdf->writeHTMLCell(80, 7, 24, 83, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>If you checked box "1.f." provide the following information
about that person in 2.a. through 2.p.</div>';
$pdf->writeHTMLCell(90, 7, 12, 93, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 105, $html, 0, 1, false, false, 'J', true);
$html ='<div>Family Name <br><i>(Last Name)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 105, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2a', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 106);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 115, $html, 0, 1, false, false, 'J', true);
$html ='<div>Given Name <br><i>(First Name)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 115, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2b', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 116);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 125, $html, 0, 1, false, false, 'J', true);
$html ='<div>Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 20, 125, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2c', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 125);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.d. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 135, $html, 0, 1, false, false, 'J', true);
$html ='<div>Date of Birth <i>&nbsp;&nbsp;&nbsp;&nbsp; (mm/dd/yyyy) </i></div>';
$pdf->writeHTMLCell(80, 7, 20, 135, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2d', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 135);
//...............image .............
$pdf->Image('images/right_angle.jpg', 66.5, 136, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 66.5, 161, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 165, 178, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//.....

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.e. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 26, $html, 0, 1, false, false, 'J', true);
$html ='<div>Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 119, 26, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2e', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 31);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.f. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 40, $html, 0, 1, false, false, 'J', true);
$html ='<div>Country of Citizenship</div>';
$pdf->writeHTMLCell(80, 7, 119, 40, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2f', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 45);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.g. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 54, $html, 0, 1, false, false, 'J', true);
$html ='<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 119, 54, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 15);
$html ='<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</div>';
$pdf->writeHTMLCell(80, 7, 154, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_2_application_2g1', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 157.6, 53.5);
$pdf->TextField('part_2_application_2g2', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173.5, 53.5);
$pdf->TextField('part_2_application_2g3', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 189, 53.5);


//...........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'BI', 12);
$html ='<div>Physical Address (If you checked box 1.f.)</div>';
$pdf->writeHTMLCell(91, 7, 113, 62, $html, 0, 1, true, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.h.   </b> In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 112, 70, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('application_your_physical_care_of_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 75);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.i.</b></div>';
$pdf->writeHTMLCell(30, 0, 112, 82, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 120, 82, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicationt_your_physical_street_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 84);


//.................
$mailing_apt = (showData('travel_application_physical_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('travel_application_physical_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('travel_application_physical_address_apt_ste_flr')=='flr')? "checked":"";
$pdf->SetFont('times', '', 10); 
$html= '<div><b>2.j.</b></div>';
$pdf->writeHTMLCell(15, 0, 112, 93.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Apt2" value="Apt2" checked="'.$mailing_apt.'" />';
$pdf->writeHTMLCell(5, 0, 127.5, 92.6, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Apt.</div>';
$pdf->writeHTMLCell(25, 0, 120, 93.5, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Ste2" value="Ste2" checked="'.$mailing_ste.'" />';
$pdf->writeHTMLCell(5, 0, 141.5, 92.6, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Ste.</div>';
$pdf->writeHTMLCell(25, 0, 134, 93.5, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Flr2" value="Flr2" checked="'.$mailing_flr.'" />';
$pdf->writeHTMLCell(5, 0, 155, 92.6, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Flr.</div>';
$pdf->writeHTMLCell(25, 0, 148, 93.5, $html, '', 0, 0, true, 'L');




$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 93);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.k.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 102, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_city_or_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 102);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.l.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2.m.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 111, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="application_your_physical_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_zip_code', 35.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),168.5, 111);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.n.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 120, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 120);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.o.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 129, $html, '', 0, 0, true, 'L'); 
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 129);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>2.p.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 138, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('application_your_physical_country', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 138);

//..........

$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 3. Processing Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 148, $html, 1, 1, true, false, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Date of Intended Departure</div>';
$pdf->writeHTMLCell(90, 7, 12, 155.5, $html, 0, 1, false, false, 'J', true);
$html ='<div><i>(mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(80, 7, 43, 160, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('date_of_independent_depreture', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 160);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Expected Length of Trip <i>(in days) </i></div>';
$pdf->writeHTMLCell(90, 7, 12, 172, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('except_day_of_length', 17, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 171);
//........
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'L', true);
$html ='<div>Are you, or any person included in this application, now <br>in exclusion, deportation, removal, or rescission<br>proceedings?</div>';
$pdf->writeHTMLCell(100, 7, 20, 180, $html, 0, 1, false, true, 'L', true);
$checked_yes = (showData('i_131_person_included_application_3a_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_person_included_application_3a_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part3" value="yes" checked="'.$checked_yes.'" />    Yes &nbsp;&nbsp;&nbsp; <input type="checkbox" name="part3" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 77, 189, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.&nbsp;&nbsp;&nbsp;</b>If "Yes",  Name of DHS office:  </div>';
$pdf->writeHTMLCell(90, 7, 12, 195, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_info_3b', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 200);


//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 155.7, $html, 0, 1, false, false, 'J', true);
$html ='<div>Have you ever before been issued a reentry permit or
Refugee Travel Document? <i>(If "Yes" give the following
information for the last document issued to you):</i></div>';
$pdf->writeHTMLCell(85, 7, 120, 155.7, $html, 0, 1, false, true, 'L', true);
$checked_yes = (showData('i_131_ever_before_issued_4a_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_ever_before_issued_4a_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part34a" value="yes" checked="'.$checked_yes.'" />   Yes &nbsp; &nbsp;&nbsp;<input type="checkbox" name="part34a" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 170, 168, $html, 0, 1, false, true, 'J', true);
//......


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 177, $html, 0, 1, false, false, 'J', true);
$html ='<div>Date Issued <i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy) </i></div>';
$pdf->writeHTMLCell(80, 7, 120, 177, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_info_4b', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 177);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.   </b> Disposition <i>(attached, lost, etc.):</i> </div>';
$pdf->writeHTMLCell(90, 7, 112, 186, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_info_4c', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 191);
//........


$pdf->SetFont('times', 'B', 10);
$html ='<div>If you are applying for a non-DACA related Advance Parole Document, skip to Part 7;<i> DACA recipients must complete Part 4
before skipping to Part 7.</i></div>';
$pdf->writeHTMLCell(190, 7, 12, 208, $html, 0, 1, false, true, 'J', true);

//--------------------------------------
// --------------page number 2 end -----
// -------------------------------------


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 3. Processing Information</b><i> (continued)</i></div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Where do you want this travel document sent? <i>(Check one)</i></div>';
$pdf->writeHTMLCell(90, 7, 12, 24.5, $html, 0, 1, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_where_do_travel_5_status')=='Y')? "checked":"";
$html ='<div><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part3_5" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 31, $html, 0, 1, false, false, 'J', true);
$html ='<div>To the U.S. address shown in <b>Part 1 (2.a through
2.i.)</b> of this form.</div>';
$pdf->writeHTMLCell(77, 7, 24, 31, $html, 0, 1, false, true, 'J', true);
//........


$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_embasy_consulate_6_status')=='Y')? "checked":"";
$html ='<div><b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part3_6" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 40.4, $html, 0, 1, false, false, 'J', true);
$html ='<div>To a U.S. Embassy or consulate at:</div>';
$pdf->writeHTMLCell(80, 7, 24, 40.4, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.&nbsp;&nbsp;</b>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 47, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_city_town', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 47);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.&nbsp;&nbsp;</b>Country </div>';
$pdf->writeHTMLCell(90, 7, 12, 56, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 33, 56);

//.......


$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_dhs_office_overseas_7_status')=='Y')? "checked":"";
$html ='<div><b>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part3_7" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 64, $html, 0, 1, false, false, 'J', true);
$html ='<div>To a DHS office overseas at:</div>';
$pdf->writeHTMLCell(80, 7, 24, 64, $html, 0, 1, false, true, 'J', true);
//........
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.&nbsp;&nbsp;</b>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 71, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_7a_city_town', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 71);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.&nbsp;&nbsp;</b>Country </div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part_3_processing_7b_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 33, 80);



//........
$pdf->SetFont('times', '', 10);
$html ='<div>if you checked "6" or "7", where should the notice to pick up
he travel document be sent?</div>';
$pdf->writeHTMLCell(90, 7, 12, 89, $html, 0, 1, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_where_should_notice_8_status')=='Y')? "checked":"";
$html ='<div><b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part3_8" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 99, $html, 0, 1, false, false, 'J', true);
$html ='<div>To the address shown in <b>Part 2 (2.h. through 2.p.)</b>
of this form.</div>';
$pdf->writeHTMLCell(77, 7, 24, 99, $html, 0, 1, false, true, 'L', true);
//........


$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_address_shown_9_status')=='Y')? "checked":"";
$html ='<div><b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="checkbox" name="part3_9" value="1" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 109, $html, 0, 1, false, false, 'J', true);
$html ='<div>To the address shown in <b>Part 3 (10.a. through 10.i.)</b>
of this form.:</div>';
$pdf->writeHTMLCell(77, 7, 24,109, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.a.</b>  &nbsp;In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 112, 25, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_your_physical_care_of_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 30);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>10.b. </b></div>';
$pdf->writeHTMLCell(30, 0, 112, 37, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 120.5, 37, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_your_physical_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 39);
//.................
$pdf->SetFont('times', '', 10); 
$html= '<div><b>10.c.</b></div>';
$pdf->writeHTMLCell(15, 0, 112, 49, $html, '', 0, 0, true, 'L');
$mailing_apt = (showData('travel_processing_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('travel_processing_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('travel_processing_address_apt_ste_flr')=='flr')? "checked":"";
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Apt3" value="Apt3" checked="'.$mailing_apt.'" />';
$pdf->writeHTMLCell(5, 0, 128.5, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Apt.</div>';
$pdf->writeHTMLCell(25, 0, 120.5, 49, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Ste3" value="Ste3" checked="'.$mailing_ste.'" />';
$pdf->writeHTMLCell(5, 0, 142.5, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Ste.</div>';
$pdf->writeHTMLCell(25, 0, 135, 49, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Flr3" value="Flr3" checked="'.$mailing_flr.'" />';
$pdf->writeHTMLCell(5, 0, 157, 48, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Flr.</div>';
$pdf->writeHTMLCell(25, 0, 150, 49, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_apt_ste_flr', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 48);

//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.d.</b>&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 57, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 57);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.e.</b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>10.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="processing_your_physical_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 65, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_zip_code', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169, 66);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>10.g.</b>&nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 75, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_postal_code', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 75);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>10.h.</b>&nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 84, $html, '', 0, 0, true, 'L'); 
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_province', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 84);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>10.i.</b>';
$pdf->writeHTMLCell(50, 0, 112, 93, $html, '', 0, 0, true, 'L'); 
$html ='<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 120.5,93, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('processing_your_physical_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 93);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.j. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 102, $html, 0, 1, false, false, 'J', true);
$html ='<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120.2, 103, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 15);
$html ='<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</div>';
$pdf->writeHTMLCell(80, 7, 155, 102, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part3_daytime_phone_10j_1', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158.2, 102.5);
$pdf->TextField('part3_daytime_phone_10j_2', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173.5, 102.5);
$pdf->TextField('part3_daytime_phone_10j_3', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 189, 102.5);



//.........
$pdf->SetFont('times', 'B', 12); // set font
$html ='<div>Part 4. Information About Your Proposed Travel</div>';
$pdf->writeHTMLCell(190, 7, 13, 121.6, $html, 1, 1, true, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.   </b>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 128.6, $html, 0, 1, false, false, 'J', true);
$html ='<div>Purpose of trip. <i>(If you need more space, continue on a
separate sheet of paper.)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 128.6, $html, 0, 1, false, true, 'J', true);
//........
$pdf->setFont('courier', 'B', 10);
$pdf->setCellHeightRatio( 1.9);
$pdf->writeHTMLCell( 82, 1, 21, 133, '',  "B",  0, false, false, 'C', true );// line 1
$pdf->writeHTMLCell( 82, 1, 21, 138, '',  "B",  0, false, false, 'C', true );// line 2
$pdf->writeHTMLCell( 82, 1, 21, 143, '',  "B",  0, false, false, 'C', true );// line 3
$pdf->writeHTMLCell( 82, 1, 21, 148, '',  "B",  0, false, false, 'C', true );// line 4
$pdf->TextField('part_4_1a', 82.7, 27, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), 
array('v' => showData('information_about_proposed_travel_purpose_trip')),21, 138);
$pdf->setCellHeightRatio( 1.1 );

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.   </b>  </div>';
$pdf->writeHTMLCell(90, 7, 112, 128.6, $html, 0, 1, false, false, 'J', true);
$html ='<div>List the countries you intend to visit. <i> (If you need more
space, continue on a separate sheet of paper.)</i></div>';
$pdf->writeHTMLCell(80, 7, 120, 128.6, $html, 0, 1, false, true, 'J', true);
//........
$pdf->setFont('courier', 'B', 10);
$pdf->setCellHeightRatio(1.9);
$pdf->writeHTMLCell( 81, 1, 121, 133, '',  "B",  0, false, false, 'C', true ); // line 1
$pdf->writeHTMLCell( 81, 1, 121, 138, '',  "B",  0, false, false, 'C', true ); // line 2
$pdf->writeHTMLCell( 81, 1, 121, 142, '',  "B",  0, false, false, 'C', true ); // line 3
$pdf->writeHTMLCell( 81, 1, 121, 147, '',  "B",  0, false, false, 'C', true ); // line 4
$pdf->TextField('part_4_1b', 81.7, 27, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), 
array('v' => showData('information_about_proposed_travel_country_list')),121, 138);
$pdf->setCellHeightRatio( 1.1);

//.........
$pdf->SetFont('times', 'B', 12); // set font
$html ='<div>Part 5. Complete Only If Applying for a Re-entry Permit</div>';
$pdf->writeHTMLCell(190, 7, 13, 170, $html, 1, 1, true, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Since becoming a permanent resident of the United States (or
during the past 5 years, whichever is less) how much total time
have you spent outside the United States?</div>';
$pdf->writeHTMLCell(91, 7, 12, 178, $html, 0, 1, false, true, 'L', true);
//..........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 178, $html, 0, 1, false, true, 'J', true);

$html ='<div>Since you became a permanent resident of the United
States, have you ever filed a Federal income tax return as
a nonresident or failed to file a Federal income tax return
because you considered yourself to be a nonresident? <i>(If
"Yes" give details on a separate sheet of paper.)</i></div>';
$pdf->writeHTMLCell(85, 7, 118, 178, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_since_you_became_2_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_since_you_became_2_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part5_2" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part3" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 180, 199, $html, 0, 1, false, true, 'J', true );
//......
$part5_1a = (showData('i_131_lessthan_6_month_1a_status')=='Y')? "checked":"";
$part5_1b = (showData('i_131_6_month_to_1b_status')=='Y')? "checked":"";
$part5_1c = (showData('i_131_1_to_two_year_1b_status')=='Y')? "checked":"";
$part5_1d = (showData('i_131_2_to_3_year_1d_status')=='Y')? "checked":"";
$part5_1e = (showData('i_131_3_to_4_year_1e_status')=='Y')? "checked":"";
$part5_1f = (showData('i_131_morethan_4_year_1f_status')=='Y')? "checked":"";



$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.</b>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part5_1a" value="1" checked="'.$part5_1a.'" /> &nbsp;   less than 6 months</div>';
$pdf->writeHTMLCell(90, 7, 12, 194, $html, 0, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.</b>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="part5_1b" value="1" checked="'.$part5_1b.'" /> &nbsp;   6 months to 1 year</div>';
$pdf->writeHTMLCell(90, 7, 12, 199, $html, 0, 1, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html ='<b>1.c.</b>';
$pdf->writeHTMLCell(90, 7, 12, 204, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 26, 204, "1 to 2 years", 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<input type="checkbox" name="part5_1c" value="1" checked="'.$part5_1c.'" />';
$pdf->writeHTMLCell(90, 7, 20, 204, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.d.  </b>   <input type="checkbox" name="part5_1d" value="1" checked="'.$part5_1d.'" /> &nbsp;    2 to 3 years</div>';
$pdf->writeHTMLCell(90, 7, 65, 194, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<b>1.e.</b>';
$pdf->writeHTMLCell(90, 7, 65, 199, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 79, 199, " 3 to 4 years", 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<input type="checkbox" name="part5_1e" value="1" checked="'.$part5_1e.'" />';
$pdf->writeHTMLCell(90, 7, 73, 199, $html, 0, 1, false, true, 'J', true);


//........
$pdf->SetFont('times', '', 10);
$html ='<b>1.f.</b>';
$pdf->writeHTMLCell(90, 7, 65, 204, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(90, 7, 79, 204, "more than 4 years", 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<input type="checkbox" name="part5_1f" value="1" checked="'.$part5_1f.'" />';
$pdf->writeHTMLCell(90, 7, 73, 204, $html, 0, 1, false, true, 'J', true);


//........page number 3 end --------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 6. Complete Only If Applying for a Refugee Travel Document</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Country from which you are a refugee or asylee: </div>';
$pdf->writeHTMLCell(90, 7, 12, 24, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_6_country_you_are_refugee', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 29);

//.......
$pdf->SetFont('times', 'B', 10);
$html ='<div>If you answer "Yes" to any of the following questions, you
must explain on a separate sheet of paper. Include your
Name and A-Number on the top of each sheet.</div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, 0, 1, false, true, 'L', true);
//....

$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_do_you_plan_to_travel_2_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_do_you_plan_to_travel_2_status')=='N')? "checked":"";
$html ='<div><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>Do you plan to travel to the country<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; named above?</div>';
$pdf->writeHTMLCell(70, 7, 12, 50, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part6_2" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_2" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 77, 52, $html, 0, 1, false, true, 'J', true );
//......

$pdf->SetFont('times', '', 10);
$html ='<div>Since you were accorded refugee/asylee status, have you ever:</div>';
$pdf->writeHTMLCell(91, 7, 12, 60, $html, 0, 1, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.&nbsp;&nbsp;</b>Returned to the country named<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
above?</div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_since_you_were_accorded_3a_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_since_you_were_accorded_3a_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part6_3a" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_3a" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 77, 70, $html, 0, 1, false, true, 'J', true );
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b. </b> Applied for and/or obtained a national passport, passport <br>&nbsp; &nbsp; &nbsp; &nbsp;
renewal, or entry permit of that country? </div>';
$pdf->writeHTMLCell(91, 7, 12, 79, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_applied_obtained_3b_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_applied_obtained_3b_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part6_3b" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_3b" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 77, 87, $html, 0, 1, false, true, 'J', true );
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c. </b>Applied for and/or received any benefit from such country <br> &nbsp; &nbsp; &nbsp;
(for example, health insurance benefits)?</div>';
$pdf->writeHTMLCell(91, 7, 112, 25, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_received_benefit_3c_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_received_benefit_3c_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part6_3c" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_3c" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 177, 33, $html, 0, 1, false, true, 'J', true );
//......

$pdf->SetFont('times', '', 10);
$html ='<div>Since you were accorded refugee/asylee status, have you, by
any legal procedure or voluntary act:</div>';
$pdf->writeHTMLCell(91, 7, 112, 40, $html, 0, 1, false, true, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a. </b>Reacquired the nationality of the<br> &nbsp; &nbsp; &nbsp;  
country named above?</div>';
$pdf->writeHTMLCell(91, 7, 112, 50, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_reacquired_nationality_4a_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_reacquired_nationality_4a_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part6_4a" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_4a" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 177, 51, $html, 0, 1, false, true, 'J', true );
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b. </b> Acquired a new nationality?  </div>';
$pdf->writeHTMLCell(91, 7, 112, 60, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_reacquired_new_nationality_4b_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_reacquired_new_nationality_4b_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part6_4b" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_4b" value="no" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell(90, 7, 177, 61, $html, 0, 1, false, true, 'J', true );
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c. </b>  Been granted refugee or asylee status<br>  &nbsp; &nbsp; &nbsp;
in any other country?</div>';
$pdf->writeHTMLCell(91, 7, 112, 70, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_been_granted_refugee_4c_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_been_granted_refugee_4c_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part6_4c" value="yes" checked="'.$checked_yes.'" />   &nbsp;   Yes  <input type="checkbox" name="part6_4c" value="no" checked="'.$checked_no.'" /> No </div>';
$pdf->writeHTMLCell(90, 7, 177, 71, $html, 0, 1, false, true, 'J', true );

//......
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 7. Complete Only If Applying for Advance Parole </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 95, $html, 1, 1, true, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>On a separate sheet of paper, explain how you qualify for an
Advance Parole Document, and what circumstances warrant
issuance of advance parole. Include copies of any documents
you wish considered. <i>(See instructions.)</i></div>';
$pdf->writeHTMLCell(91, 7, 12, 103, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b>How many trips do you intend to use this document?</div>';
$pdf->writeHTMLCell(91, 7, 12, 121, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$checked_one = (showData('i_131_how_many_trip_entend')=='one')? "checked":"";
$checked_more = (showData('i_131_how_many_trip_entend')=='more')? "checked":"";
$html ='<div><input type="checkbox" name="part7_1" value="yes" checked="'.$checked_one.'" />&nbsp;One Trip  &nbsp;&nbsp; <input type="checkbox" name="part7_1" value="no" checked="'.$checked_more.'" />   More than one trip </div>';
$pdf->writeHTMLCell(90, 7, 50, 126.5, $html, 0, 1, false, true, 'J', true );

//.......
$pdf->SetFont('times', '', 10);
$html ='<div>If the person intended to receive an Advance Parole Document<br>
is outside the United States, provide the location (City or Town<br>
and Country) of the U.S. Embassy or consulate or the DHS<br>
overseas office that you want us to notify.</div>';
$pdf->writeHTMLCell(94, 7, 12, 134, $html, 0, 1, false, true, 'L', true);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a. </b> City or Town  </div>';
$pdf->writeHTMLCell(90, 7, 12, 152, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_7_city_town', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 157);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b. </b> Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 165, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_7_country', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 171);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div>If the travel document will be delivered to an overseas office,
where should the notice to pick up the document be sent?:</div>';
$pdf->writeHTMLCell(90, 7, 12, 179, $html, 0, 1, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_the_address_shown_3_status')=='Y')? "checked":"";
$html ='<div><b>3. </b>  <input type="checkbox" name="part7_3" value="1" checked="'.$checked.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 1, false, true, 'J', true);
$html ='<div>To the address shown in<b> Part 2 (2.h. through 2.p.)</b>
of this form. </div>';
$pdf->writeHTMLCell(75, 7, 22, 190, $html, 0, 1, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$checked = (showData('i_131_the_address_shown_4_status')=='Y')? "checked":"";
$html ='<div><b>4. </b>  <input type="checkbox" name="part7_4" value="1" checked="'.$checked.'" /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 203, $html, 0, 1, false, true, 'J', true);
$html ='<div>To the address shown in <b>Part 7 (4.a. through 4.i.)</b>
of this form.</div>';
$pdf->writeHTMLCell(75, 7, 22, 203, $html, 0, 1, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.   </b> In Care of Name </div>';
$pdf->writeHTMLCell(60, 0, 112, 102, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part7_your_physical_care_of_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 107);

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b. </b></div>';
$pdf->writeHTMLCell(30, 0, 112, 115, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number <br>and Name</div>';
$pdf->writeHTMLCell(25, 0, 120, 115, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part7_your_physical_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 116);

//.................
$pdf->SetFont('times', '', 10); 
$html= '<div><b>4.c.</b></div>';
$pdf->writeHTMLCell(15, 0, 112, 126, $html, '', 0, 0, true, 'L');
$mailing_apt = (showData('travel_advance_parole_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('travel_advance_parole_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('travel_advance_parole_address_apt_ste_flr')=='flr')? "checked":"";
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Apt4" value="Apt4" checked="'.$mailing_apt.'" />';
$pdf->writeHTMLCell(5, 0, 128.5, 125, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Apt.</div>';
$pdf->writeHTMLCell(25, 0, 120, 126, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Ste4" value="Ste4" checked="'.$mailing_ste.'" />';
$pdf->writeHTMLCell(5, 0, 142.5, 125, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Ste.</div>';
$pdf->writeHTMLCell(25, 0, 135, 126, $html, '', 0, 0, true, 'L');
//
$pdf->SetFont('times', '', 14);    
$html= '<input type="checkbox" name="Flr4" value="Flr4" checked="'.$mailing_flr.'" />';
$pdf->writeHTMLCell(5, 0, 157, 125, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$html= '<div>Flr.</div>';
$pdf->writeHTMLCell(25, 0, 149.5, 126, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_apt_ste_flr', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 125);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.d.</b>&nbsp;&nbsp; City or Town';
$pdf->writeHTMLCell(50, 0, 112, 134, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 134);
//.......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.e. </b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<b>4.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 143, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="part7_your_physical_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 142, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B',10); // set font
$pdf->TextField('part7_your_physical_zip_code', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),167, 143);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 152, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_postal_code', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 152);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.h.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 161, $html, '', 0, 0, true, 'L'); 
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_province', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),142, 161);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>4.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 170, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_your_physical_country', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 170);

//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.j. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, false, 'J', true);
$html ='<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120, 180, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 15);
$html ='<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</div>';
$pdf->writeHTMLCell(80, 7, 155, 179.3, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part7_4j_daytime_phone1', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158.2, 179.7);
$pdf->TextField('part7_4j_daytime_phone2', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173.5, 179.7);
$pdf->TextField('part7_4j_daytime_phone3', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 189, 179.7);


//......
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 8. Employment Authorization For New Period of Parole Under Operation Allies Welcome </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 215, $html, 1, 1, true, true, 'L', true);

//........
$pdf->SetFont('times', '', 10);
$html ='<b>1. </b>';
$pdf->writeHTMLCell(70, 7, 12, 223, $html, 0, 1, false, true, 'L', true);
$html ='<div>I am requesting an Employment 
Authorization Document (EAD) 
upon approval of my new Operation 
Allies Welcome (OAW) period of 
parole.</div>';
$pdf->writeHTMLCell(55, 10, 18, 223, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$checked_yes = (showData('i_131_requesting_employment_authorization_1_status')=='Y')? "checked":"";
$checked_no = (showData('i_131_requesting_employment_authorization_1_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part8_1" value="Y" checked="'.$checked_yes.'"/>  Yes  <input type="checkbox" name="part8_1" value="N" checked="'.$checked_no.'"/> No </div>';
$pdf->writeHTMLCell(40, 7, 75, 224, $html, 0, 1, false, true, 'J', true);


//.........page number 4 end--------------------------------------------------------------------------


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
$pdf->SetFont('times', '', 11.7); // set font
$html ='<div><b>Part 9. Signature of Applicant </b><i>(Read the information on penalties in the Form instructions before completing<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this Part.)</i> If you are filing for a Re-entry Permit or Refugee Travel Document, you must be in the United
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;States to file this application.</div>';
$pdf->writeHTMLCell(192, 10, 12, 17, $html, 1, 1, true, false, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. </b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 33, $html, 0, 1, false, false, 'J', true);
$html ='<div>I certify, under penalty of perjury under the laws of the United States of America, that this application and the
evidence submitted with it is all true and correct. I authorize the release of any information from my records that U.S. Citizenship and Immigration Services needs<br>
to determine eligibility for the benefit I am seeking.</div>';
$pdf->writeHTMLCell(85, 7, 19, 33, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(85, 7, 19, 59, "Signature of Applicant", 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(81, 7, 20, 65, "", 1, 1, false, true, 'J', true);

$pdf->SetFont('zapfdingbats', '', 20);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 63.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.</b>&nbsp;&nbsp;&nbsp;Date of Signature &nbsp;<i>(dd/mm/yyyy)</i> </div>';
$pdf->writeHTMLCell(80, 10, 112, 35, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('signature_applicant_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 35);
$pdf->Image('images/right_angle.jpg', 169, 36.5, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//............

$pdf->SetFillColor(220,220,220);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 45, $html, 0, 1, false, true, 'J', true);
$html ='<div>Daytime Phone Number</div>';
$pdf->writeHTMLCell(80, 7, 120, 45, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 15);
$html ='<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</div>';
$pdf->writeHTMLCell(80, 7, 156, 44, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_2_daytime_phone1', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 159.2, 44.7);
$pdf->TextField('part9_2_daytime_phone2', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.5, 44.7);
$pdf->TextField('part9_2_daytime_phone3', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 190, 44.7);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: </b>If you do not completely fill out this form or fail to
submit required documents listed in the instructions, your
application may be denied.</div>';
$pdf->writeHTMLCell(90, 7, 112, 55, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 10. Information About Person Who Prepared This Application, If Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 76.8, $html, 1, 1, true, false, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: </b>If you are an attorney or representative, you must<br>submit a completed Form G-28, Notice of Entry of Appearance<br>as Attorney or Accredited Representative, along with this<br>application.</div>';
$pdf->writeHTMLCell(95, 7, 12, 84, $html, 0, 1, false, true, 'L', true);
//........
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 1, true, 'L');
$pdf->setFont('Times', '', 10);
$html = '<div>Provide the following information concerning the preparer.</div>';
$pdf->writeHTMLCell(90, 7, 12, 109, $html, 0, 0, false, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a. </b>&nbsp;Preparer\'s Family Name <i>(Last Name)</i> </div>';
$pdf->writeHTMLCell(95, 7, 12, 115, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_last_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 120);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b> Preparer\'s Given Name <i>(First Name)</i></div>';
$pdf->writeHTMLCell(95, 7, 12, 128, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_first_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 133);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp;  Preparer\'s Business or Organization Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 141, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_business_org_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 146);
//.................
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(90, 7, 12, 155, $html, 0, 1, true, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(30, 0, 12, 163, $html, '', 0, 0, true, 'L'); 
$html = '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(25, 0, 20, 163, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_your_mailing_street_number', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 165);

//.................
$pdf->SetFont('times', '', 10); 
$html= '<div><b>3.b.</b></div>';
$pdf->writeHTMLCell(15, 0, 12, 174, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$mailing_apt = (showData('i_131_preparer_mailing_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('i_131_preparer_mailing_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('i_131_preparer_mailing_address_apt_ste_flr')=='flr')? "checked":"";
//................
$html= '<input type="checkbox" name="Apt5" value="Apt5" checked="'.$mailing_apt.'" />';
$pdf->writeHTMLCell(5, 0, 27.5, 173.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 20, 174, "Apt.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Ste5" value="Ste5" checked="'.$mailing_ste.'" />';
$pdf->writeHTMLCell(5, 0, 41.5, 173.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 34, 174, "Ste.", '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 14); 
$html= '<input type="checkbox" name="Flr5" value="Flr5" checked="'.$mailing_flr.'" />';
$pdf->writeHTMLCell(5, 0, 56, 173.5, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); 
$pdf->writeHTMLCell(25, 0, 49, 174, "Flr.", '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_apt_ste_flr', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 64, 174);
//......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c. </b>&nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 183, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 183);
//.......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d. </b>&nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 192, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="part9_your_mailing_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 191, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69, 192);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 201, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 201);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 210, $html, '', 0, 0, true, 'L'); 
//.........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 210);

//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 219, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part9_your_mailing_country', 68, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 34, 219);

//........
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(91, 7, 112, 86, $html, 0, 1, true, 'L');

//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.  </b>  Preparer\'s Daytime Phone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 95, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(90, 7, 187, 95, "Extension", 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 15);
$html ='<div>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - </div>';
$pdf->writeHTMLCell(80, 7, 118, 100, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part10_daytime_phone_code1', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.4, 100.7);
$pdf->TextField('part10_daytime_phone_code2', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 136.5, 100.7);
$pdf->TextField('part10_daytime_phone_code3', 14, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 100.7);

$pdf->TextField('part10_daytime_phone_extension', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 188, 102);
//............
$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp;  Preparer\'s E-mail Address <i>(if any)</i></div>';
$pdf->writeHTMLCell(96, 7, 112, 110, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_email_address', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 115.6);
//.................
$pdf->setFont('Times', '', 11);
$html = '<div><b>Declaration</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 125, $html, 0, 0, false, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div>To be completed by all preparers, including attorneys and<br>authorized representatives: I declare that I prepared this benefit<br>request at the request of the applicant, that it is based on all the<br>
information of which I have knowledge, and that the<br>information is true to the best of my knowledge.</div>';
$pdf->writeHTMLCell(100, 7, 112, 133, $html, 0, 0, false, 'L');

//............
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.a. </b> Signature<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;of Preparer </div>';
$pdf->writeHTMLCell(40, 7, 112, 155, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(65, 7, 138, 157, "", 1, 0, false, 'L');
//.................
$pdf->setFont('Times', '', 10);
$html = '<div><b>6.b. </b>Date of Signature <i>(mm/ddyyyy)</i></div>';
$pdf->writeHTMLCell(90, 7, 112, 170, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_preparer_date_of_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 170);
$pdf->Image('images/right_angle.jpg', 169, 171.5, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>NOTE:  </b> If you require more space to provide any additional
information, use a separate sheet of paper. You must include
your Name and A-Number on the top of each sheet.</div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 0, false, 'L');


$js = "
var fields = {
    'attorney_state_licence':' $attorneyData->bar_number',
    'about_your_lastname':' ".showData('information_about_you_family_last_name')."',
    'about_your_firstname':' ".showData('information_about_you_given_first_name')."',
    'about_your_middlename':' ".showData('information_about_you_middle_name')."',
    'about_your_physical_care_of_name':' ".showData('information_about_you_home_care_of_name')."',
    'about_your_physical_street_number':' ".showData('information_about_you_home_street_number')."',
    'about_your_physical_apt_ste_flr':' ".showData('information_about_you_home_apt_ste_flr_value')."',
    'about_your_physical_city_or_town':' ".showData('information_about_you_home_city_town')."',
    'about_your_physical_state':' ".showData('information_about_you_home_state')."',
    'about_your_physical_zip_code':' ".showData('information_about_you_home_zip_code')."',
    'about_your_physical_postal_code':' ".showData('information_about_you_home_postal_code')."',
    'about_your_physical_province':' ".showData('information_about_you_home_province')."',
    'about_your_physical_country':' ".showData('information_about_you_home_country')."',
    'other_information_alien_reg_number':' ".showData('other_information_about_you_alien_registration_number')."',
    'other_information_country_of_birth':' ".showData('other_information_about_you_country_of_birth')."',
    'other_information_country_of_citizenship':' ".showData('other_information_about_you_country_of_citizen')."',
    'other_information_class_of_admission':' ".showData('i_131_information_about_you_class_of_admission')."',
    'other_information_date_of_birth':' ".showData('other_information_about_you_date_of_birth')."',
    'other_information_us_social_security':' ".showData('other_information_about_you_social_security_number')."',

//page 2 ....
    'part_2_application_2a':' ".showData('travel_application_type_last_name')."',
    'part_2_application_2b':' ".showData('travel_application_type_first_name')."',
    'part_2_application_2c':' ".showData('travel_application_type_middle_name')."',
    'part_2_application_2d':' ".showData('travel_application_type_date_of_birth')."',
    'part_2_application_2e':' ".showData('travel_application_type_country_of_birth')."',
    'part_2_application_2f':' ".showData('travel_application_type_country_of_citizen')."',
    'part_2_application_2g1':' ".showData('travel_application_type_daytime_tel1')."',
    'part_2_application_2g2':' ".showData('travel_application_type_daytime_tel2')."',
    'part_2_application_2g3':' ".showData('travel_application_type_daytime_tel3')."',
    'application_your_physical_care_of_name':' ".showData('travel_application_physical_address_care_of_name')."',
    'applicationt_your_physical_street_number':' ".showData('travel_application_physical_street_number')."',
    'application_your_physical_apt_ste_flr':' ".showData('travel_application_physical_address_apt_ste_flr_value')."',
    'application_your_physical_city_or_town':' ".showData('travel_application_physical_address_city_town')."',
    'application_your_physical_state':' ".showData('travel_application_physical_address_state')."',
    'application_your_physical_zip_code':' ".showData('travel_application_physical_address_zip_code')."',
    'application_your_physical_postal_code':' ".showData('travel_application_physical_address_postal_code')."',
    'application_your_physical_province':' ".showData('travel_application_physical_address_province')."',
    'application_your_physical_country':' ".showData('travel_application_physical_address_country')."',
    'date_of_independent_depreture':' ".showData('travel_processing_info_date_of_intended')."',
    'except_day_of_length':' ".showData('travel_processing_info_expected_length_of_trip')."',
    'part_3_processing_info_3b':' ".showData('travel_processing_info_name_of_dhs_office')."',
    'part_3_processing_info_4b':' ".showData('travel_processing_info_date_issued')."',
    'part_3_processing_info_4c':' ".showData('travel_processing_info_disposition')."',

//page 3 ....
    'part_3_processing_city_town':' ".showData('travel_processing_info_embassy_city_town')."',
    'part_3_processing_country':' ".showData('travel_processing_info_embassy_country')."',
    'part_3_processing_7a_city_town':' ".showData('travel_processing_info_dhs_office_city_town')."',
    'part_3_processing_7b_country':' ".showData('travel_processing_info_dhs_office_country')."',
    'processing_your_physical_care_of_name':' ".showData('travel_processing_address_care_of_name')."',
    'processing_your_physical_street_number':' ".showData('travel_processing_address_street_number')."',
    'processing_your_physical_apt_ste_flr':' ".showData('travel_processing_address_apt_ste_flr_value')."',
    'processing_your_physical_city_or_town':' ".showData('travel_processing_address_city_town')."',
    'processing_your_physical_state':' ".showData('travel_processing_address_state')."',
    'processing_your_physical_zip_code':' ".showData('travel_processing_address_zip_code')."',
    'processing_your_physical_postal_code':' ".showData('travel_processing_address_postal_code')."',
    'processing_your_physical_province':' ".showData('travel_processing_address_province')."',
    'processing_your_physical_country':' ".showData('travel_processing_address_country')."',
    'part3_daytime_phone_10j_1':' ".showData('travel_processing_address_daytime_tel1')."',
    'part3_daytime_phone_10j_2':' ".showData('travel_processing_address_daytime_tel2')."',
    'part3_daytime_phone_10j_3':' ".showData('travel_processing_address_daytime_tel3')."',


//page 4 ....
    'part_6_country_you_are_refugee':' ".showData('i_131_country_which_are_you_refugee')."',
    'part_7_city_town':' ".showData('i_131_overseas_notification_city_town')."',
    'part_7_country':' ".showData('i_131_overseas_notification_country')."',
    'part7_your_physical_care_of_name':' ".showData('travel_advance_parole_address_care_of_name')."',
    'part7_your_physical_street_number':' ".showData('travel_advance_parole_address_street_number')."',
    'part7_your_physical_apt_ste_flr':' ".showData('travel_advance_parole_address_apt_ste_flr_value')."',
    'part7_your_physical_city_or_town':' ".showData('travel_advance_parole_address_city_town')."',
    'part7_your_physical_state':' ".showData('travel_advance_parole_address_state')."',
    'part7_your_physical_zip_code':' ".showData('travel_advance_parole_address_zip_code')."',
    'part7_your_physical_postal_code':' ".showData('travel_advance_parole_address_postal_code')."',
    'part7_your_physical_province':' ".showData('travel_advance_parole_address_province')."',
    'part7_your_physical_country':' ".showData('travel_advance_parole_address_country')."',
    'part7_4j_daytime_phone1':' ".showData('travel_advance_parole_daytime_tel1')."',
    'part7_4j_daytime_phone2':' ".showData('travel_advance_parole_daytime_tel2')."',
    'part7_4j_daytime_phone3':' ".showData('travel_advance_parole_daytime_tel3')."',

//page 5 ....
    'signature_applicant_date_of_signature':' ".showData('i_131_applicant_sign_date')."',
    'part9_2_daytime_phone1':' ".showData('i_131_applicant_daytime_tel1')."',
    'part9_2_daytime_phone2':' ".showData('i_131_applicant_daytime_tel2')."',
    'part9_2_daytime_phone3':' ".showData('i_131_applicant_daytime_tel3')."',
    'part9_preparer_last_name':' ".showData('i_131_preparer_family_last_name')."',
    'part9_preparer_first_name':' ".showData('i_131_preparer_family_given_first_name')."',
    'part9_preparer_business_org_name':' ".showData('i_131_preparer_business_name')."',
    'part9_your_mailing_street_number':' ".showData('i_131_preparer_mailing_address_street_number')."',
    'part9_your_mailing_apt_ste_flr':' ".showData('i_131_preparer_mailing_address_apt_ste_flr_value')."',
    'part9_your_mailing_city_or_town':' ".showData('i_131_preparer_mailing_address_city_town')."',
    'part9_your_mailing_state':' ".showData('i_131_preparer_mailing_address_state')."',
    'part9_your_mailing_zip_code':' ".showData('i_131_preparer_mailing_address_zip_code')."',
    'part9_your_mailing_postal_code':' ".showData('i_131_preparer_mailing_address_postal_code')."',
    'part9_your_mailing_province':' ".showData('i_131_preparer_mailing_address_province')."',
    'part9_your_mailing_country':' ".showData('i_131_preparer_mailing_address_country')."',
    'part10_daytime_phone_code1':' ".showData('i_131_preparer_daytime_tel1')."',
    'part10_daytime_phone_code2':' ".showData('i_131_preparer_daytime_tel2')."',
    'part10_daytime_phone_code3':' ".showData('i_131_preparer_daytime_tel3')."',
    'part10_daytime_phone_extension':' ".showData('i_131_preparer_extension')."',
    'part9_preparer_email_address':' ".showData('i_131_preparer_email_address')."',
    'part9_preparer_date_of_signature':' ".showData('i_131_preparer_intended_sign_date')."',

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
$pdf->Output('I-131.pdf', 'I');