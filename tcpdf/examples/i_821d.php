<?php

// require_once('formheader.php');   //database connection file 
// Include the main TCPDF library (search for installation path).
require_once("localconfig.php");
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
		
		$this->Cell(40, 6, "Form I-821D Edition 04/01/24 ", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/I-821d-footer-pdf417-$this->page.png";
		// )

        //! should be uncomment this line before put it on live site 
// $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
		
        
        
    }
}


$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-821D, Consideration of Deferred Action ... ');

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
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(100, 15, " Consideration of Deferred Action
for Childhood Arrivals ", 0, 'C', 0, 1, 55, 5, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-821D", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0124\nExpires 02/28/2027", 0, 'C', 0, 1, 169, 18.5, true);

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
//..............

//...table start 
$pdf->writeHTMLCell(190, 55, 13, 32, "", 1, 1, true, false, 'C', true);
$pdf->SetFillColor(222,222,222);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(15, 30, 13, 32, "For USCIS Use <br> Only", "TLR", 0, true, true, 'C', true);
$pdf->writeHTMLCell(130, 1, 13, 62, "", "T", 0, false, false, 'C', true);
$pdf->writeHTMLCell(40, 1, 13, 67, "", "T", 0, false, false, 'C', true);
$pdf->SetFont('times', '', 9);
$l ='<div><b>Returned:</b>  ____/____/____ </div>';
$pdf->writeHTMLCell(40, 7, 13, 62.5, $l,  0,  1, false, true, 'L', false);
//..........

$pdf->StartTransform();
$pdf->Rotate(90);
$pdf->SetFont('times', 'B', 6);
$pdf->writeHTMLCell(15, 10, 8, 106, "Relocated", 0, 0, false, false, 'C', true);
$pdf->StopTransform();
//..............
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(190, 5, 13, 75, "", "T", 0, false, false, 'C', true);
$html ='<div><b>Resubmitted:</b>____/____/____ </div>';
$pdf->writeHTMLCell(50, 7, 13, 69, $html,  0,  1, false, true, 'L', false);
//...........


$pdf->writeHTMLCell(4, 13, 53, 62, "", "LR", 0, false, false, 'C', true);
$pdf->writeHTMLCell(1, 43, 142, 32, "", "R", 0, false, true, 'C', true);

$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(45, 10, 28, 32, '',  'RB',  1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 10, 28, 33, 'A-',  0,  1, false, true, 'L', true);

$pdf->writeHTMLCell(37, 5, 34, 33.5, '',  1,  1, false, true, 'L', true);

$pdf->writeHTMLCell(45, 7, 28, 42, 'Case ID:',  'LRB',  1, false, true, 'L', true);
$pdf->writeHTMLCell(45, 13, 28, 49, '',  'R',  1, false, true, 'L', true);
$pdf->SetFont('times', '', 5);
// $pdf->writeHTMLCell(3, 5, 30, 52, '',  1,  1, false, true, 'L', true);
$pdf->writeHTMLCell(4, 2, 30, 51, '',  1,  1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(36, 5, 35, 50, "Requestor interviewed on", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(30, 1, 41, 58, "", "T", 0, false, false, 'C', true);


$pdf->SetFont('times', '', 8);
$html ='<div><b>Received:</b>____/____/____ </div>';
$pdf->writeHTMLCell(45, 7, 43, 65, $html,  0,  1, false, true, 'R', false);
$pdf->writeHTMLCell(57, 25, 33, 62, '',  'R',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 8);
$html ='<div><b>Sent:</b>____/____/____ </div>';
$pdf->writeHTMLCell(42, 7, 42, 71, $html,  0,  1, false, true, 'R', false);

$pdf->writeHTMLCell(33, 25, 57, 70, '',  'T',  1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div><b>Receipt</b></div>';
$pdf->writeHTMLCell(75, 30, 35, 33, $html,  0,  1, false, true, 'R', false);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Action Block</b></div>';
$pdf->writeHTMLCell(75, 40, 105, 33, $html,  0,  1, false, true, 'R', false);

$pdf->SetFont('times', '', 8);
$html ='<div><b>Remarks</b></div>';
$pdf->writeHTMLCell(45, 7, 58, 63, $html,  0,  1, false, true, 'R', false);

$pdf->SetFont('times', '', 8);
$html ='<div>Attorney State Bar Number <i>(if any)</i>:</div>';
$pdf->writeHTMLCell(80, 15, 155, 75, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 12);
$html ='<div><b>  </b>   <input type="checkbox" name="attached" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 15, 70, 77, $html, 0, 1, false, true, 'R', true);




$pdf->SetFont('times', '', 9);
$html ='<div>Select this box if Form G-28 is attached to </div>';
$pdf->writeHTMLCell(60, 15, 90, 77, $html,  0,  1, false, true, 'R', false);
$html ='<div>represent the requestor</div>';
$pdf->writeHTMLCell(66, 15, 59, 80, $html,  0,  1, false, true, 'R', false);

$pdf->SetFont('times', '', 10);
$html ='<div><b>To Be Completed by an Attorney or </b></div>';
$pdf->writeHTMLCell(70, 15, 7, 77, $html,  0,  1, false, true, 'R', false);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Accredited Representative, if any. </b></div>';
$pdf->writeHTMLCell(70, 15, 7, 82, $html,  0,  1, false, true, 'R', false);

$pdf->writeHTMLCell(1, 12, 150, 75, "", "R", 0, false, true, 'C', true);
//..........input field
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('atorney_state_bar_number', 45, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),155, 78.5);
//upper table end 

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. Read Form 1-821D Instructions for information on how to complete this form.", '', 'L', 0, 1, 16, 87, true);


$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 10, 86.5, false); // angle 1
//$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 55.5, false); // angle 2
$pdf->StopTransform();


//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b><i>(For Initial and
Renewal Requests)</i></div>';
$pdf->writeHTMLCell(90, 12, 13, 93, $html, 1, 1, true, false, 'L', true);
//.......


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="iam_not" value="Y" checked=" " /> &nbsp; &nbsp; <b> &nbsp; &nbsp;I am not</b> in immigration detention.</div>';
$pdf->writeHTMLCell(90, 7, 12, 106, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="iam" value="Y" checked=" " /> &nbsp; &nbsp; <b> &nbsp; &nbsp;I am</b> in immigration detention.</div>';
$pdf->writeHTMLCell(90, 7, 12, 112, $html, 0, 1, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>I am requesting:</div>';
$pdf->writeHTMLCell(98, 7, 12, 119, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 10);
$html ='<div><b>1. &nbsp;  </b>   <input type="checkbox" name="Intial_request" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 13, 123, $html, 0, 1, false, true, 'L', true);
$html ='<div><b>Initial Request</b> - Considertaion of Deferred Action for Childhood Arrivals </div>';
$pdf->writeHTMLCell(75, 7, 25, 123, $html, 0, 1, false, true, 'L', true);
$html ='<div><b><i>OR</i></b></div>';
$pdf->writeHTMLCell(88, 7, 15, 131, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>2. &nbsp;  </b>   <input type="checkbox" name="renewal_request" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(110, 7, 13, 138, $html, 0, 1, false, true, 'L', true);
$html ='<div><b>Renewal Request</b> - Considertaion of Deferred   </div>';
$pdf->writeHTMLCell(105, 7, 25, 138, $html, 0, 1, false, true, 'L', true);
$html ='<div>Action for Childhood Arrivals </div>';
$pdf->writeHTMLCell(90, 7, 25, 142, $html, 0, 1, false, true, 'L', true);
$html ='<div><b><i>AND</i></b></div>';
$pdf->writeHTMLCell(90, 7, 15, 146, $html, 0, 1, false, true, 'L', true);

$html ='<div>For this Renewal request, my most recent period of Deferred Action for Childhood Arrivals expires on </div>';
$pdf->writeHTMLCell(90, 7, 13, 150, $html, 0, 1, false, true, 'L', true);

//......
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 7, 53, 133, false); // angle 1
$pdf->StopTransform();


$pdf->SetFont('times', 'I', 10);
$html ='<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 35, 159, $html, 0, 1, false, true, 'L', true);

// $pdf->writeHTMLCell(37, 7, 66, 159, '',  1,  1, false, true, 'L', true);
$pdf->TextField('p1_2_date', 39, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),64, 159);

//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Full Legal Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 168, $html, 0, 1, true, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 175, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 177);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 183, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 185);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 193, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 193);

//.............


//.........page 2 left side end 

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S. Mailing Address</b>(Enter the same address on Form I-765)</div>';
$pdf->writeHTMLCell(90, 7, 113, 95, $html, 0, 1, true, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  In Care Of Name (if applicable)  </div>';
$pdf->writeHTMLCell(90, 7, 112, 105, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('US_Mailing__Incare', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 110);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b. </b>Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 7, 112, 117, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('US_mailing_street_number_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 119);

//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 127, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('US_mailing_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),163, 127);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 136, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('US_mailing_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 136);

//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 112, 145, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="us_mailing_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 145, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 146, 145, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 145);


//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Removal Proceedings Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 155, $html, 0, 1, true, false, 'J', true);
//.......

$pdf->SetFont('times', '', 11);
$html ='<div><b>5.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 165, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Are you <b>NOW</b> or have you <b>EVER</b> been in removal proceedings, or do you have a removal order issued in any other context <i>(for example, at the border or within the United States by an immigration agent)? </div>';
$pdf->writeHTMLCell(85, 7, 118, 165, $html, 0, 1, false, true, 'L', true);

$html ='<div><input type="checkbox" name="INA" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="INA" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 175, 183, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE : </b>   The term "removal proceedings" includes
exclusion or deportation proceedings initiated before
April 1, 1997; an Immigration and Nationality Act (INA)
section 240 removal proceeding; expedited removal;

reinstatement of a final order of exclusion, deportation, or
removal; an INA section 217 removal after admission
under the Visa Waiver Program; or removal as a criminal
alien under INA section 238.   </div>';
$pdf->writeHTMLCell(83, 7, 118, 190, $html, 0, 1, false, true, 'L', true);
//.......

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
//.........................

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b><i>(For Initial and
Renewal Requests) (continued)</i></div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 5.</b>, you must select a
box below indicating your current status or outcome of your
removal proceedings.</div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 1, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div>Status or outcome:</div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 1, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 1, false, true, 'L', true);
$html ='<div><input type="checkbox" name="active" value="active" checked=" " /> &nbsp; &nbsp; Currently in Proceedings <i>(Active)</i></div>';
$pdf->writeHTMLCell(80, 7, 20, 50, $html, 0, 1, false, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 57, $html, 0, 1, false, true, 'L', true);
$html ='<div><input type="checkbox" name="proceding" value="proceding" checked=" " /> &nbsp; &nbsp; Currently in Proceedings <i>(Administratively Closed)</i></div>';
$pdf->writeHTMLCell(85, 7, 20, 57, $html, 0, 1, false, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.c. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 64, $html, 0, 1, false, true, 'L', true);
$html ='<div><input type="checkbox" name="Terminated" value="Terminated" checked=" " /> &nbsp; &nbsp; Terminated </div>';
$pdf->writeHTMLCell(85, 7, 20, 64, $html, 0, 1, false, true, 'L', true);


//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.d. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 71, $html, 0, 1, false, true, 'L', true);
$html ='<div><input type="checkbox" name="Final" value="Final" checked=" " /> &nbsp; &nbsp; Subject to a Final Order </div>';
$pdf->writeHTMLCell(85, 7, 20, 71, $html, 0, 1, false, true, 'L', true);


//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.e. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, true, 'L', true);
$html ='<div><input type="checkbox" name="Other" value="Other" checked=" " /> &nbsp; &nbsp; Other. Explain in <b>Part 8. Additional Information.</b> </div>';
$pdf->writeHTMLCell(85, 7, 20, 78, $html, 0, 1, false, true, 'L', true);

//......
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.f. </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 85, $html, 0, 1, false, true, 'L', true);
$html ='<div>Most Recent Date of Proceedings</div>';
$pdf->writeHTMLCell(85, 7, 20, 85, $html, 0, 1, false, true, 'L', true);

//......

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 7, 48, 68, false); // angle 1
$pdf->StopTransform();


$pdf->SetFont('times', 'I', 10);
$html ='<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 35, 92, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('most_recent_date_of_proceding', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 65, 92);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.g.  </b>  Location of Proceedings  </div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('location_of_proceding', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 104);
//.......

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b><i>Other Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 115, $html, 0, 1, true, false, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b> &nbsp;&nbsp; Alien Registration Number (A-Number) <i>(if any)</i></div>';
$pdf->writeHTMLCell(90, 7, 13, 122, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 38, 112, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 45, 128, $html, 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_alien_registration', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 128);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b> &nbsp;&nbsp; U.S Social Security Number <i>(if any)</i></div>';
$pdf->writeHTMLCell(90, 7, 13, 135, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 42, 123, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_social_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 141);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.</b>&nbsp; Date of Birth <i> (mm/dd/yyyy)</i></div>';
$pdf->writeHTMLCell(90, 7, 13, 150, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 52, 126, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_date_of_birth', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 150);

//............
$pdf->SetFont('times', '', 10);
$html= '<div><b>10. </b> Gender   &nbsp; &nbsp; <input type="checkbox" name="G" value="y" checked=" " />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked=" " /> Female</div>';
$pdf->writeHTMLCell(90, 7, 13, 160, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>11.a. </b>  &nbsp;  City/Town/Village of Birth</div>';
$pdf->writeHTMLCell(90, 7, 13, 168, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_city_town_birth', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 174);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.b. </b>  &nbsp;  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 13, 182, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_birth', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 188);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b>  &nbsp;  Current Country of Residence</div>';
$pdf->writeHTMLCell(90, 7, 13, 196, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_current_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 202);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>13. </b>  &nbsp; Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 13, 210, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_of_citizenship', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 216);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14. </b>  &nbsp; Marital Status</div>';
$pdf->writeHTMLCell(90, 7, 13, 224, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html= '<div> <input type="checkbox" name="M" value="y" checked=" " />Married  &nbsp; &nbsp;
<input type="checkbox" name="W" value="n" checked=" " /> Widowed &nbsp; &nbsp;
<input type="checkbox" name="S" value="y" checked=" " />Single  &nbsp; &nbsp;
<input type="checkbox" name="D" value="y" checked=" " />Divorced</div>';
$pdf->writeHTMLCell(90, 7, 19, 230, $html, '', 0, 0, true, 'L');
//.........right side end 

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b><i>Other Names Used </b>(If Applicable)</i></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, 'L');
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you need additional space, use <b>Part 8. Additional
Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i>(Last Name)</i> </div>';
$pdf->writeHTMLCell(35, 10, 112, 34, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_used_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 35);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>15.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i>(First Name)</i> </div>';
$pdf->writeHTMLCell(35, 10, 112, 43, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_used_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 44);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>15.c.  </b>  Middle Name<br> </div>';
$pdf->writeHTMLCell(35, 10, 112, 53, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_used_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 53);
//.............
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Processing Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 62, $html, 0, 1, true, false, 'J', true);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>16.</b>&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity<i>(Select <b>only one</b> box)</i> </div>';
$pdf->writeHTMLCell(90, 7, 113, 69, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div>   <input type="checkbox" name="Latino" value="Y" checked=" " />&nbsp;&nbsp;Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 118, 75, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>   <input type="checkbox" name="Not Hispanic" value="Y" checked=" " />&nbsp;&nbsp;Not Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 118, 80, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.</b>&nbsp;&nbsp;&nbsp;&nbsp;Race<i>(Select <b>all applicable</b> boxes)</i> </div>';
$pdf->writeHTMLCell(90, 7, 113, 87, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="white" value="Y" checked=" " />&nbsp; White</div>';
$pdf->writeHTMLCell(90, 7, 120, 93, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Asian" value="Y" checked=" " />&nbsp; Asian</div>';
$pdf->writeHTMLCell(90, 7, 120, 98, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Black" value="Y" checked=" " />&nbsp; Black or African American</div>';
$pdf->writeHTMLCell(90, 7, 120, 103, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Alaska" value="Y" checked=" " />&nbsp; American Indian or Alaska Native</div>';
$pdf->writeHTMLCell(90, 7, 120, 108, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Hawaiian" value="Y" checked=" " />&nbsp; Native Hawaiian or Other Pacific Islander</div>';
$pdf->writeHTMLCell(90, 7, 120, 113, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>18.   </b>  Height </div>';
$pdf->writeHTMLCell(90, 7, 113, 123, $html, 0, 0, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html= '<div>  Feet </div>';
$pdf->writeHTMLCell(90, 7, 140, 123, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$html= '<div>
<select name="us_mailing_state2" size="0.5">
    <option value=" ">Ft </option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 150, 123, $html, 0, 0, false, true, 'J', true);



//..........
//...........
$pdf->SetFont('times', '', 10);
$html= '<div>  Inches </div>';
$pdf->writeHTMLCell(90, 7, 167, 123, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$html1= '<div>
<select name="processing_info_inches" size="0.5">
    <option value=" ">Inc</option>
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
$pdf->writeHTMLCell(90, 7, 179, 123, $html1, 0, 0, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>19.    </b>   Weight   &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; Pounds </div>';
$pdf->writeHTMLCell(90, 7, 113, 131, $html, 0, 0, false, true, 'J', true);
//...
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_info_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 165, 131);
$pdf->TextField('processing_info_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172, 131);
$pdf->TextField('processing_info_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 131);

//...........
$pdf->SetFont('times', '', 10);
$html= '<div><b>20.    </b>  Eye Color <i>(Select <b>only one</b> box )</i> </div>';
$pdf->writeHTMLCell(90, 7, 113, 140, $html, 0, 0, false, true, 'J', true);
//......
$pdf->SetFont('times', '', 10);
$html= '<div>   
&nbsp; &nbsp;&nbsp;<input type="checkbox" name="black" value="black" checked="" /> Black 
&nbsp;  &nbsp;  &nbsp;&nbsp;<input type="checkbox" name="blue" value="blue" checked="" /> Blue 
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="brown" value="brown" checked="" /> Brown <br>

&nbsp; &nbsp; &nbsp; <input type="checkbox" name="gray " value="gray" checked="" />  Gray
&nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" name="green " value="green" checked="" /> Green 
&nbsp; &nbsp; <input type="checkbox" name="hazel " value="hazel" checked="" /> Hazel <br>

&nbsp; &nbsp; &nbsp; <input type="checkbox" name="maroon" value="maroon" checked="" /> Maroon 
&nbsp; &nbsp;<input type="checkbox" name="pink" value="pink" checked="" /> Pink 
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown" value="unknown" checked="" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 113, 146, $html, 0, 0, false, true, 'J', true);
//......
$pdf->SetFont('times', '', 10);
$html= '<div><b>21.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 113, 163, $html, 0, 0, false, true, 'J', true);
//.........$pdf->SetFont('times', '', 11);
$html= '<div>   
&nbsp;<input type="checkbox" name="blad" value="blad" checked="" /> Blad(No hair) 
&nbsp;&nbsp;<input type="checkbox" name="black" value="black" checked="" /> Black
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="blond" value="blond" checked="" /> Blond <br>

 &nbsp; <input type="checkbox" name="brown " value="brown" checked="" /> brown 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; <input type="checkbox" name="gray " value="gray" checked="" /> Gray 
 &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox" name="red " value="red" checked="" /> Red <br>

 &nbsp; <input type="checkbox" name=" sandy" value=" sandy" checked="" /> Sandy  
&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; <input type="checkbox" name="white" value="white" checked="" />  White
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown" value="unknown" checked="" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 116, 169, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Residence and Travel Information </b> <i> (For Initial and Renewal Request)</i></div>';
$pdf->writeHTMLCell(90, 12, 113, 188, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', '', 10);
$html= '<div><b>1. </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 201, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html= '<div>I have been continuously residing in the U.S since at least  June 15,2007,up to the present time.</div>';
$pdf->writeHTMLCell(83, 7, 119, 201, $html, 0, 0, false, true, 'J', true);

//.........
$html ='<div><input type="checkbox" name="ina" value="Y" checked="" />  Yes   &nbsp; <input type="checkbox" name="ina" value="N" checked="" /> No</div>';
$pdf->writeHTMLCell(90, 7, 175, 209, $html, 0, 1, false, true, 'J', true);
//..........page 2 end ...


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3

//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Residence and Travel Information</b> <i> (For Initial and Renewal Request)  (continued)</i></div>';
$pdf->writeHTMLCell(90, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you departed the United States for some period of time before your 16th birthday and returned to the United States
on or after your 16th birthday to begin your current period of continuous residence, and if this is an initial request, submit evidence that you established residence in the United States prior to 16 years of age as set forth in the instructions to this form.</div>';
$pdf->writeHTMLCell(92, 7, 12, 30, $html, 0, 0, false, true, 'L', true);
//............


$pdf->SetFont('times', '', 10);
$html= '<div><b>For Initial Requests:</b> List your current address and, to the best of your knowledge, the addresses where you resided since the date of your initial entry into the United States to present.</div>';
$pdf->writeHTMLCell(90, 7, 12, 58, $html, 0, 0, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>For Renewal Requests:</b> List only the addresses where you resided since you submitted your last Form I-821D that was approved.</div>';
$pdf->writeHTMLCell(90, 7, 12, 71, $html, 0, 0, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div>If you require additional space,use <b>Part 8. Additional
Information.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 85, $html, 0, 0, false, true, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>Present Address
</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 94, $html, 0, 0, false, true, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.a.</b> &nbsp;&nbsp;Dates at this residence <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(90, 7, 12, 99, $html, 0, 0, false, true, 'L', true);

//..........
$pdf->Image('images/right_angle.jpg', 30, 106, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 71, 106, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', '', 10);
$html= '<div>From</div>';
$pdf->writeHTMLCell(90, 7, 20, 105, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_from', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 35, 105);

$pdf->SetFont('times', '', 10);
$html= '<div>To</div>';
$pdf->writeHTMLCell(90, 7, 65, 105, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('residence_and_travel_to', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 105);
$pdf->writeHTMLCell(27, 7, 75, 105, "Present", 1, 0, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<b>2.b.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 12, 112, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_street_name', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 114);
//........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 12, 123, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 123);
//..........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.d.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 12, 132, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 132);
//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.e.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="residence_and_travel_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 141, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 141);

$pdf->writeHTMLCell(90, 1, 13, 150, '','T', 1, 0, true, 'L');

//........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>Address 1</b> ';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, '', 0, 0, true, 'L');
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.a.</b> &nbsp;&nbsp;Dates at this residence <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(90, 7, 12, 155, $html, 0, 0, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div>From</div>';
$pdf->writeHTMLCell(90, 7, 20, 161, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_from_1', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 35, 161);

$pdf->SetFont('times', '', 10);
$html= '<div>To</div>';
$pdf->writeHTMLCell(90, 7, 64, 161, $html, 0, 0, false, true, 'J', true);
//........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_to_1', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 161);

//..........
$pdf->Image('images/right_angle.jpg', 30, 162, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 70, 162, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//........
$pdf->SetFont('times', '', 10);
$html = '<b>3.b.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 12, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_street_name_1', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 170);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt1" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste1" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr1" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 12, 179, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_apt_ste_flr_1', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 179);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 12, 188, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_city_or_town_1', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 188);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.e.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 197, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="residence_and_travel_state_1" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 197, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_zip_code_1', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 197);
//.............

$pdf->writeHTMLCell(90, 1, 13, 205, '','T', 1, 0, true, 'L');




//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>Address 2</b> ';
$pdf->writeHTMLCell(90, 7, 12, 204, $html, '', 0, 0, true, 'L');
//........
$pdf->SetFont('times', '', 10);
$html= '<div><b>4.a.</b> &nbsp;&nbsp;Dates at this residence <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(90, 7, 12, 208, $html, 0, 0, false, true, 'L', true);

//..........
$pdf->Image('images/right_angle.jpg', 30, 214, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 70, 214, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', '', 10);
$html= '<div>From</div>';
$pdf->writeHTMLCell(90, 7, 20, 213, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_from_2', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 35, 213);

$pdf->SetFont('times', '', 10);
$html= '<div>To</div>';
$pdf->writeHTMLCell(90, 7, 64, 213, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_to_2', 27, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 213);

//...........

$pdf->SetFont('times', '', 10);
$html = '<b>4.b.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 12, 221, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_street_name_2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 222);
//........3

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt3" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr3" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 12, 231, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_apt_ste_flr_2', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 231);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.d.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 12, 240, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_city_or_town_2', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 240);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.e.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>4.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 249, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font



$html = '<select name="residence_and_travel_state_2" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 249, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_zip_code_2', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 249);
//........page 3 right side end 


//.............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>Address 3</b> ';
$pdf->writeHTMLCell(90, 7, 112, 15, $html, '', 0, 0, true, 'L');
//........
$pdf->SetFont('times', '', 10);
$html= '<div><b>5.a.</b> &nbsp;&nbsp;Dates at this residence <i>(mm/dd/yyyy)</i> </div>';
$pdf->writeHTMLCell(90, 7, 112, 19, $html, 0, 0, false, true, 'L', true);

//..........
$pdf->Image('images/right_angle.jpg', 130, 25, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 170, 25, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', '', 10);
$html= '<div>From</div>';
$pdf->writeHTMLCell(90, 7, 120, 24, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_from_3', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 24);

$pdf->SetFont('times', '', 10);
$html= '<div>To</div>';
$pdf->writeHTMLCell(90, 7, 164, 24, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_to_3', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 175, 24);

//...........

$pdf->SetFont('times', '', 10);
$html = '<b>5.b.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 112, 32, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('residence_and_travel_street_name_3', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  145, 33);
//........3

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt3" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr3" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 42, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_apt_ste_flr_3', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 42);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.d.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 112, 51, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_city_or_town_3', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  145, 51);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.e.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 60, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="residence_and_travel_state_3" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 130, 60, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('residence_and_travel_zip_code_3', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169.5, 60);

//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Travel Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 75, $html, 0, 1, true, false, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>For Intial Requests:</b> List all of your absences from the United States since June 15 , 2007.';
$pdf->writeHTMLCell(91, 7, 112, 85, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>For Renewal Requests:</b> List only your absences from the United States since you submitted your last Form 1-821D that
was approved.';
$pdf->writeHTMLCell(91, 7, 112, 97, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you require additional space , use <b>Part 8. Additional
Information.</b>';
$pdf->writeHTMLCell(91, 7, 112, 113, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>Departure 1</b>';
$pdf->writeHTMLCell(91, 7, 112, 125, $html, '', 0, 0, true, 'L');
//..........
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 173, 148, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 177.5, 154, false); // angle 2
$pdf->StopTransform();
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.a.</b> &nbsp;&nbsp;Departure Date &nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(91, 7, 112, 131, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.b.</b>&nbsp;&nbsp;&nbsp;Return Date &nbsp;&nbsp;&nbsp;&nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(91, 7, 112, 140, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_departure_date', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 131);
//.............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_return_date', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 140);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.c.</b>&nbsp;&nbsp;&nbsp;Reason for Departure';
$pdf->writeHTMLCell(91, 7, 112, 147, $html, '', 0, 0, true, 'L');
//.......... 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_reason_for_departure', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 152);
$pdf->writeHTMLCell(90, 1, 113, 161, '','T', 1, 0, true, 'L');
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>Departure 2</b>';
$pdf->writeHTMLCell(91, 7, 112, 162, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b>&nbsp;&nbsp;&nbsp;Departure Date &nbsp;&nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(91, 7, 112, 168, $html, '', 0, 0, true, 'L');
//..........

$pdf->Image('images/right_angle.jpg', 165, 169, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->Image('images/right_angle.jpg', 165, 177, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//.............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_departure_date_2', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 167);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b>&nbsp;&nbsp;&nbsp;Return Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(91, 7, 112, 176, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_return_date_2', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 176);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.c.</b>&nbsp;&nbsp;&nbsp;Reason for Departure';
$pdf->writeHTMLCell(91, 7, 112, 182, $html, '', 0, 0, true, 'L');
//.......... 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_reason_for_departure_2', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 187);
$pdf->writeHTMLCell(90, 1, 113, 196, '','T', 1, 0, true, 'L');
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 197, $html, '', 0, 0, true, 'L');
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you left the United States without advance parole on <br> or after August 15,2012?';
$pdf->writeHTMLCell(90, 7, 120, 197, $html, '', 0, 0, true, 'L');
//.......... 

$html ='<div><input type="checkbox" name="YNA" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="INA" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 175, 202, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.a.</b>&nbsp;&nbsp; What country issued your last passport? ';
$pdf->writeHTMLCell(90, 7, 112, 208, $html, '', 0, 0, true, 'L');
//.......... 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_reason_for_9a', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 213);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.b.</b>&nbsp;&nbsp; Passport Number';
$pdf->writeHTMLCell(90, 7, 112, 221, $html, '', 0, 0, true, 'L');
//.......... 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_reason_for_9b', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 226);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.c.</b>&nbsp;&nbsp; &nbsp;Passport Expiration Date';
$pdf->writeHTMLCell(90, 7, 112, 233, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 145, 238, $html, '', 0, 0, true, 'L');

$pdf->Image('images/right_angle.jpg', 167, 239, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_reason_for_9c', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172, 237);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.</b>&nbsp;&nbsp; &nbsp;Border Crossing Card Number <i>(if any)</i>';
$pdf->writeHTMLCell(90, 7, 112, 245, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('travel_info_reason_for_10', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 250);
//..........

$pdf->AddPage('P', 'LETTER');  // page number 4

//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. For Initial Request Only</b> </div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b>';
$pdf->writeHTMLCell(90, 7, 12, 25, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', '', 10); // set font
$html = 'I initially arrived and established residence in the U.S. prior to 16 years of age';
$pdf->writeHTMLCell(80, 7, 21, 25, $html, '', 0, 0, true, 'L');
//..........
$html ='<div><input type="checkbox" name="WNA" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="XNA" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 75, 30, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of <b><i>Initial</i></b> Entry into the United States (on or about)';
$pdf->writeHTMLCell(90, 7, 12, 35, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 45, 40, $html, '', 0, 0, true, 'L');
//..........

$pdf->Image('images/right_angle.jpg', 67, 42, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('for_initial_date_of_initial', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 41);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b> &nbsp; &nbsp;&nbsp;&nbsp; Place of <b><i>Initial</i></b> Entry into the United States ';
$pdf->writeHTMLCell(90, 7, 12, 48, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('for_initial_place_of_initial', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 54);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 62, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Immigration Status on June 15,2012 <i>(e.g, No Lawful <br>Status, Status Expired, Parole Expired)</i> ';
$pdf->writeHTMLCell(90, 7, 20, 62, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->ComboBox('for_initial_request_immigration_status', 82, 7, array(
    ' No Lawful Status',
    ' Status Expired',
    ' Parole Expired'	
    ), array(), array(), 21, 72);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.a.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'Were you <b>EVER</b> issued an Arrival-Departure Record <br>(Form I-94, I-94W , or I-95)? ';
$pdf->writeHTMLCell(90, 7, 20, 80, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part3_5a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part3_5a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78, 85, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.b.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 92, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "Yes" to <b>Item Number 5.a.,</b> provide <br> your Form I-94,I-94W, or I-95 number <i>(if available). </i>';
$pdf->writeHTMLCell(90, 7, 20, 92, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('for_initial_place_of_initial', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 103);
//...........

$pdf->Image('images/right_angle.jpg', 44, 104, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.c.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "Yes" to <b>Item Number 5.a.,</b> provide the<br> date your authorized stay expired, as shown on Form I-94,I-94W, or I-95 <i>(if available).</i> ';
$pdf->writeHTMLCell(90, 7, 20, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 40, 124, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part3_5cdate_authorize', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69, 124);

$pdf->Image('images/right_angle.jpg', 64, 125, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Education Information</b></div>';
$pdf->writeHTMLCell(91, 7, 12, 133, $html, 0, 1, true, false, 'L', true);
//.......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Indicate how you meet the education guideline <i>(e.g..
Graduated from high school, Received a general<br>
educational development (GED) certificate or equivalent<br>
state-authorized exam, Currently in school)</i>
';
$pdf->writeHTMLCell(90, 7, 20, 140, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('education_info_indicate_how', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 157);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 165, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Name, City, and State of School Currently Attending or
Where Education Received
';
$pdf->writeHTMLCell(90, 7, 20, 165, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('education_info_name_city', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 174);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 181, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Date of Graduation <i>(e.g., Receipt of a Certificate of
Completion, GED certificate, other equivalent state-
authorized exam)</i> or, if currently in school, date of last
attendance.';
$pdf->writeHTMLCell(90, 7, 20, 181, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 40, 194, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part3_8date_authorize', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69, 194);

$pdf->Image('images/right_angle.jpg', 64, 195, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Military Service Information</b></div>';
$pdf->writeHTMLCell(91, 7, 12, 202, $html, 0, 1, true, false, 'L', true);
//.......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 209, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Were you a member of the U.S Armed Forces or U.S. <br>Coast Guard? ';
$pdf->writeHTMLCell(90, 7, 20, 209, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part3_9" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part3_9" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78, 214, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "Yes" to <b>Item Number 9.</b>, you must provide
responses to <b>Item Numbers 9.a. - 9.d.<b/>';
$pdf->writeHTMLCell(90, 7, 12, 218, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.a.</b> &nbsp;&nbsp;Military Branch';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', 'B', 10);
$pdf->ComboBox('military_service_info_military_branch', 82, 7, array(
    // ' Army',
    // ' Marine Corps',
    // ' Navy',
    // ' Air Force',
    // ' National Guard',
    // ' Cost Guard'
), array(), array(), 21, 231);

//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.b.</b> &nbsp;&nbsp;Service Start Date <i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 12, 239, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part3_9bdate_authorize', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 239);

$pdf->Image('images/right_angle.jpg', 68, 240, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.c.</b> &nbsp;Discharge Date &nbsp;&nbsp;&nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 12, 247, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part3_9cdate_authorize', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 247);

$pdf->Image('images/right_angle.jpg', 68, 248, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........


//........page 4 right end 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.d.</b> &nbsp;&nbsp;Type of Discharge ';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->ComboBox('military_service_info_type_of_discharge', 82, 7, array(
    // ' Bad Conduct (BCD)',
    // ' Clemency Discharge',
    // ' Dishonorable',
    // ' Entry Level Separation (ELS)',
    // ' General',
    // ' Honorable'
), array(), array(), 121, 22);
//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Criminal, National Security, and public Safety Information</b> <i>(For Initial and Renewal Requests)</i></div>';
$pdf->writeHTMLCell(90, 12, 113, 32, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'If any of the following questions apply to you, use <b>Part 8. Additional Information</b> to describe the circumstances and include a full explanation.';
$pdf->writeHTMLCell(90, 7, 112, 49, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b>';
$pdf->writeHTMLCell(90, 7, 112, 63, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times','', 10); // set font
$html = 'Have you <b>EVER</b> been arrested for, charged with, or <br>convicted of a felony or misdemeanor, <i>including incidents andled in juvenile court, in the United States? Do not
<br>include minor traffic violations unless they were alcohol-
<br>or drug-related.</i>';
$pdf->writeHTMLCell(90, 7, 120, 63, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_1" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_1" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 80, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>If you answered "Yes," you must include a certified
<br>court disposition, arrest record, charging document,
<br>sentencing record, etc., for each arrest, unless
<br>disclosure is prohibited under state law</b>.
';
$pdf->writeHTMLCell(90, 7, 120, 85, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b>';
$pdf->writeHTMLCell(90, 7, 112, 105, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> been arrested for, charged with, or
<br>convicted of a crime in any country other than the United
States? ';
$pdf->writeHTMLCell(90, 7, 120, 105, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_2" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_2" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 115, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>If you answered " Yes," you must include a certified
<br>court disposition, arrest record, charging document,
<br>sentencing record, etc., for each arrest.</b> ';
$pdf->writeHTMLCell(90, 7, 120, 122, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b>';
$pdf->writeHTMLCell(90, 7, 112, 137, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> engaged in, do you continue to engage
<br>in, or plan to engage in terrorist activities? ';
$pdf->writeHTMLCell(90, 7, 120, 137, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_3" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_3" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 145, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b>';
$pdf->writeHTMLCell(90, 7, 112, 152, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Are you <b>NOW</b> or have you <b>EVER</b> been a member of a
<br>gang?';
$pdf->writeHTMLCell(90, 7, 120, 152, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_4" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_4" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 157, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b>';
$pdf->writeHTMLCell(90, 7, 112, 165, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> engaged in, ordered, incited, assisted, or
otherwise participated in any of the following:';
$pdf->writeHTMLCell(90, 7, 120, 165, $html, '', 0, 0, true, 'L');

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.a.</b> &nbsp;&nbsp;Acts involving torture, genocide, or human trafficking?';
$pdf->writeHTMLCell(90, 7, 112, 175, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_5a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_5a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 180, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.b.</b> &nbsp;&nbsp;Killing any person?';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_5b" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_5b" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 190, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.c.</b> &nbsp;&nbsp;Severely injuring any person?';
$pdf->writeHTMLCell(90, 7, 112, 200, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_5c" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_5c" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 200, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.d.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 208, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' Any kind of sexual contact or relations with any person
who was being forced or threatened?';
$pdf->writeHTMLCell(90, 7, 120, 208, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_5d" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_5d" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 213, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 220, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you EVER recruited, enlisted, conscripted, or used <br>any person to serve in or help an armed force or group
<br>while such person was under age 15?';
$pdf->writeHTMLCell(90, 7, 120, 220, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_6" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_6" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 230, $html, 0, 1, false, true, 'J', true);


//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 236, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you EVER used any person under age 15 to take
<br>part in hostilities, or to help or provide services to people
<br>in combat?';
$pdf->writeHTMLCell(90, 7, 120, 236, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_7" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_7" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 245, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->AddPage('P', 'LETTER'); //page number 5

//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Statement,Certifiaction,Signature, and Contact Information of the Requestor</b> <i>(For Initial and Renewal Requests)</i></div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> Select the box for either <b> Item Number 1.a.</b> or <b>1.b.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 34, $html, '', 0, 0, true, 'L');
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.   </b>  <input type="checkbox" name="1.a." value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 13, 41, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div> I can read and understand English, and have read and

understand each and every question and instruction
<br>on this form, as well as my answer to each question.</div>';
$pdf->writeHTMLCell(90, 7, 26, 41, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.   </b>  <input type="checkbox" name="1.b." value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 13, 56, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div> The interpreter named in <b>Part 6.</b> has read to me each
<br>and every question and instruction on this form, as
<br>well as my answer to each question, in
 </div>';
$pdf->writeHTMLCell(90, 7, 26, 56, $html, 0, 1, false, true, 'L', true);

// $pdf->writeHTMLCell(73, 7, 28, 70, '', 1, 1, false, true, 'C', true);
$pdf->TextField('part5_1b', 73, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 70);


$pdf->SetFont('times', '', 10);
$html =' a language in which I am fluent. I understand each
<br>and every question and instruction on this form as
<br>translated to me by my interpreter, and have provided
<br>true and correct responses in the language indicated
<br>above.';
$pdf->writeHTMLCell(90, 7, 26, 77, $html, 0, 1, false, true, 'L', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Requestor\'s Declaration and Certification</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 102, $html, 0, 1, true, false, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='Copies of any documents I have submitted are exact<br>
photocopies of unaltered, original documents, and I understand<br>
that USCIS may require that I submit original documents to<br>
USCIS at a later date. Furthermore, I authorize the release of<br>
any information from any and all of my records that USCIS<br>
may need to determine my eligibility for the request that I seek.';
$pdf->writeHTMLCell(92, 7, 13, 110, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html ='I furthermore authorize release of information contained in this<br>
request, in supporting documents, and in my USCIS records, to<br>
other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration law.';
$pdf->writeHTMLCell(92, 7, 13, 135, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html ='I understand that USCIS may require me to appear for an<br>
appointment to take my biometrics (fingerprints, photograph,<br>
and/or signature) and, at that time, if I am required to provide<br>
biometrics, I will be required to sign an oath reaffirming that:';
$pdf->writeHTMLCell(92, 7, 13, 152, $html, 0, 1, false, true, 'L', true);
//............
//............
$pdf->SetFont('times', '', 10);
$html ='<b>1)</b> I reviewed and provided or authorized all of the<br>
information in my request; ';
$pdf->writeHTMLCell(92, 7, 19, 170, $html, 0, 1, false, true, 'L', true);
//............
//............
$pdf->SetFont('times', '', 10);
$html ='<b>2)</b> I understood all of the information contained in, and<br>
submitted with, my request; and  ';
$pdf->writeHTMLCell(92, 7, 19, 180, $html, 0, 1, false, true, 'L', true);
//............
//............
$pdf->SetFont('times', '', 10);
$html ='<b>3)</b> All of this information was complete, true, and correct<br>
at the time of filing. ';
$pdf->writeHTMLCell(92, 7, 19, 190, $html, 0, 1, false, true, 'L', true);
//............
//............
$pdf->SetFont('times', '', 10);
$html ='I certify, under penalty of perjury under the laws of the United<br>
States of America, that the foregoing is true and correct and that<br>
copies of documents submitted are exact photocopies of<br>
unaltered original documents. I understand that I may be<br>
required to submit original documents to U.S. Citizenship and<br>
Immigration Services (USCIS) at a later date. I also understand<br>
that knowingly and willfully providing materially false<br>
information on this form is a federal felony punishable by a<br>
fine, imprisonment up to 5 years, or both, under 18 U.S.C.<br>
section 1001. Furthermore, I authorize the release of any<br>
information from my records that USCIS may need to reach a<br>
determination on my deferred action request. ';
$pdf->writeHTMLCell(100, 7, 13, 204, $html, 0, 1, false, true, 'L', true);
//............

//.........
$pdf->SetFont('times', '', 10);
$html ='<b>2.a.</b> &nbsp;&nbsp;&nbsp;Requestor\'s Signature';
$pdf->writeHTMLCell(92, 7, 112, 16.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 112, 21, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
$pdf->setCellHeightRatio(0.7);

$pdf->writeHTMLCell(82, 5, 122, 22, '', 1, 0, false, 'L');
$pdf->setCellHeightRatio(1.1);

//............

$pdf->SetFont('times', '', 10);
$html ='<b>2.b.</b> &nbsp;&nbsp;&nbsp;Date of Signature (mm/dd/yyyy)';
$pdf->writeHTMLCell(92, 7, 112,30, $html, 0, 1, false, true, 'L', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 14.8, 190, false); // angle 1
$pdf->StopTransform();
$pdf->TextField('p5_2b_signature_date', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 30);
//......................

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Requestor\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6.5, 113, 41, $html, 0, 1, true, false, 'J', true);

//...........................






$pdf->setFont('Times', '', 10);
$html = '<div><b>3.</b>&nbsp; &nbsp; &nbsp; Requestor\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 112, 50, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_3', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 55);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp;  Requestor\'s Mobile Telephone Number</div>';
$pdf->writeHTMLCell(95, 7, 112, 62, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_4', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 67);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b> &nbsp; &nbsp;Requestor\'s Email Address</div>';
$pdf->writeHTMLCell(95, 7, 112, 74, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_5', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 79);








//!!!!

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div><b>Part 6. Contact Information, Certification, and
Signature of the Interpreter</b><i> (For Initial and
Renewal Requests)</i></div>';
$pdf->writeHTMLCell(91, 7, 113, 93, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information concerning the interpreter:</div>';
$pdf->writeHTMLCell(90, 7, 112, 120, $html, 0, 1, false, 'L');

//............

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 0); // set cell padding
$pdf->SetFontSize(12); // set font
$html= '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(91, 7, 113, 112, $html, 0, 1, true, 'L');

//................ 

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp;Interpreter\'s Family Name <i>(Last Name)</i> </div>';
$pdf->writeHTMLCell(95, 7, 112, 125, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_1a_lastname', 82.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 130);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp;Interpreter\'s Given Name <i>(First Name)</i></div>';
$pdf->writeHTMLCell(95, 7, 112, 137, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_1b_firstname', 82.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 143);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp;&nbsp;Interpreter\'s Business or Organization Name <i>(if any)</i></div>';
$pdf->writeHTMLCell(95, 7, 112, 151, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_2_organization', 82.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 157);
//.................

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 0); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 7, 113, 168, $html, 0, 1, true, 'L');

//...........
$pdf->SetFont('times', '', 10.5);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 176, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3a_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 178);

//..........
$pdf->SetFont('times', '', 10.5);
$html= '<div><b>3.b.  </b> Apt.   <input type="checkbox" name="apt6" value="apt" checked="" />  &nbsp;&nbsp; Ste.<input type="checkbox" name="ste6" value="ste" checked="" />  &nbsp;&nbsp; Flr.<input type="checkbox" name="flr6" value="flr" checked="" /> </div>';
$pdf->writeHTMLCell(90, 7, 112, 187, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_3b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 187);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 196, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part6_3c_city_or_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 196);
//.................
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 112, 205, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="part6_3d_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 205, $html, '', 0, 0, true, 'L');
//.;...........

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part6_3e_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 205);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 214, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part6_3f_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 214);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 224, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part6_3g_postal_code', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 224);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 232, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part6_3h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 238);


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6

//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Contact Information, Certification, and Signature of the Interpreter</b> <i>(For Initial and Renewal Requests)(Continued)</i></div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6.5, 13, 38, $html, 0, 1, true, false, 'J', true);
//...................................
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Daytime Telephone Number';
$pdf->writeHTMLCell(90, 7, 13, 46, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_daytime_tele_number', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 51);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Email Address';
$pdf->writeHTMLCell(90, 7, 13, 58, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_email', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 63);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(91, 6.5, 13, 75, $html, 0, 1, true, false, 'J', true);

// //..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>I certify that:</b>';
$pdf->writeHTMLCell(90, 7, 13, 83, $html, '', 0, 0, true, 'L');
// //.........

$pdf->SetFont('times', '', 10); // set font
$html = 'I am fluent in English and
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;which is the same language provided in <b>Part 5., Item Number 1.b</b>.;';

$pdf->writeHTMLCell(90, 7, 13, 90, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I have read to this requestor each and every question and instruction on this form, as well as the answer to each question, in the language provided in <b>Part 5., Item Number 1.b.;</b> and';

$pdf->writeHTMLCell(95, 7, 13, 100, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'The requestor has informed me that he or she understands each
and every instruction and question on the form, as well as the
answer to each question.';

$pdf->writeHTMLCell(95, 7, 13, 114, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_certification_i_certify_that', 37.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 88);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.a.</b> &nbsp;&nbsp; Interpreter\'s Signature';
$pdf->writeHTMLCell(95, 7, 13, 128, $html, '', 0, 0, true, 'L');

// $pdf->writeHTMLCell(80, 7, 23, 93, '',  1,  1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font

$pdf->TextField('part6_6a', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 133);

//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.b.</b> &nbsp;&nbsp; Date of Signature &nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(95, 7, 13, 143, $html, '', 0, 0, true, 'L');

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 75 ,160, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
// $pdf->writeHTMLCell(28, 7, 75, 102, '', 1, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font

$pdf->TextField('part6_6b', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 142);



//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this Request,
If Other than the Requestor</b> <i>(For Initial and Renewal Requests)</i></div>';
$pdf->writeHTMLCell(91, 12, 13, 157, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(91, 7, 13, 180, $html, 0, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = 'Provide the following information concerning the preparer:';
$pdf->writeHTMLCell(95, 7, 13, 188, $html, '', 0, 0, true, 'L');
//...............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.</b> &nbsp;&nbsp;Preparer\'s Family Name <i>(Last Name)</i>';
$pdf->writeHTMLCell(95, 7, 13, 194, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Preparer_family_last_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 199);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.</b> &nbsp;&nbsp;Preparer\'s Given Name <i> (First Name)</i>';
$pdf->writeHTMLCell(95, 7, 13, 208, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Preparer_family_first_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 213);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer\'s Business or Organization Name';
$pdf->writeHTMLCell(95, 7, 13, 222, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Preparer_business_or_organization_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 227);
//!............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Mailing Address</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 113, 25, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 26); 
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="APt1" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="STe1" value="Ste2" checked="" />Ste. <input type="checkbox" name="FLr1" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 113, 35, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address__apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 35);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 113, 44, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 44);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 54, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_address_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 130, 53, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 53);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 62, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 62);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 71, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 71);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 79, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 84);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 96, $html, 0, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer\'s Daytime Telephone Number';
$pdf->writeHTMLCell(90, 7, 113, 105, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_daytime_tele_number', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 110);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer\'s Fax Number';
$pdf->writeHTMLCell(90, 7, 113, 119, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_fax_number', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 124);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer\'s Email Address';
$pdf->writeHTMLCell(90, 7, 113, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mail_address', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 138);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Declaration</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 150, $html, 0, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = 'I declare that I prepared this Form 1-821D at the requestor\'s
behest, and it is based on all the information of which I have
knowledge.';
$pdf->writeHTMLCell(90, 7, 113, 159, $html, '', 0, 0, true, 'L');

//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b> &nbsp;&nbsp;&nbsp;Preparer\'s Signature';
$pdf->writeHTMLCell(90, 7, 113, 172, $html, '', 0, 0, true, 'L');

// $pdf->writeHTMLCell(81, 7, 123, 177, '',  1,  1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font

$pdf->TextField('part7_7a', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 177);

//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b> &nbsp;&nbsp;&nbsp;Date of Signature &nbsp;&nbsp;<i>(mm/dd/yyyy)</i>';
$pdf->writeHTMLCell(90, 7, 113, 186, $html, '', 0, 0, true, 'L');


$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 175 ,200, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10); // set font

// $pdf->writeHTMLCell(28, 7, 176, 186, '', 1, 1, false, true, 'L', true);
$pdf->TextField('part7_7b', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 176, 186);
//.......
$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> If you need extra space to complete any item within
his request, see the next page for <b>Part 8. Additional
Information.</b>';
$pdf->writeHTMLCell(90, 7, 113, 196, $html, '', 0, 0, true, 'L');
//..........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 7

//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 8. Additional Information</b> <i>(For Initial and Renewal Requests)</i></div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you need extra space to complete any item within this
request, use the space below. You may also make copies of this
page to complete and file with this request. Include your name
and A-Number <i>(if any)</i> at the top of each sheet of paper;
indicate the <b>Page Number, Part Number</b>, and <b>Item Number</b>
to which your answer refers; and sign and date each sheet.';
$pdf->writeHTMLCell(91, 7, 12, 30, $html, '', 0, 0, true, 'L');
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Full Legal Name</i></b></div>';
$pdf->writeHTMLCell(91, 7, 13, 61, $html, 0, 1, true, false, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  <i>(Last Name)</i> </div>';
$pdf->writeHTMLCell(90, 7, 12, 70, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_family_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 70);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; <i>(First Name)</i> </div>';
$pdf->writeHTMLCell(90, 7, 12, 79, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_given_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 79);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 89, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 88);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 97, $html, 0, 1, false, false, 'L', true);

//.............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 42 ,84, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 51, 102, $html, 0, 1, false, false, 'L', true);

// $pdf->writeHTMLCell(45, 7, 57.5, 102, '',  1,  1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_8_2_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 57.5, 102);


//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 115, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_page_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 120);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.</b> Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 115, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_part_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 120);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.</b> Item Number</div>';
$pdf->writeHTMLCell(90, 7, 74, 115, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_item_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 120);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(82.4, .5, 21, 128.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82.4, .5, 21, 134.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82.4, .5, 21, 140.5, '',  "B",  0, false, false, 'C', true); // line 3 
$pdf->writeHTMLCell(82.4, .5, 21, 146.5, '',  "B",  0, false, false, 'C', true); // line 4
$pdf->writeHTMLCell(82.4, .5, 21, 152.5, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82.4, .5, 21, 158.5, '',  "B",  0, false, false, 'C', true); // line 6 
$pdf->writeHTMLCell(82.4, .5, 21, 164.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82.4, .5, 21, 170.5, '',  "B",  0, false, false, 'C', true); // line 8
$pdf->writeHTMLCell(82.4, .5, 21, 176.5, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(82.4, .5, 21, 182.5, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->writeHTMLCell(82.4, .5, 21, 188.5, '',  "B",  0, false, false, 'C', true); // line 11
$pdf->writeHTMLCell(82.4, .5, 21, 194.5, '',  "B",  0, false, false, 'C', true); // line 12
$pdf->writeHTMLCell(82.4, .5, 21, 200.5, '',  "B",  0, false, false, 'C', true); // line 13
$pdf->writeHTMLCell(82.4, .5, 21, 206.5, '',  "B",  0, false, false, 'C', true); // line 14
$pdf->writeHTMLCell(82.4, .5, 21, 212.5, '',  "B",  0, false, false, 'C', true); // line 15
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_3d',82.5, 104.3, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 21, 130);
$pdf->setCellHeightRatio(1.2);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_page_number_1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.</b> Part Number</div>';
$pdf->writeHTMLCell(90, 7, 146, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_part_number_1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.</b> Item Number</div>';
$pdf->writeHTMLCell(90, 7, 175, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_item_number_1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 22);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 31, $html, 0, 1, false, false, 'L', true);


$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(82.8, .5, 122, 29.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82.8, .5, 122, 35.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82.8, .5, 122, 41.5, '',  "B",  0, false, false, 'C', true); // line 3 
$pdf->writeHTMLCell(82.8, .5, 122, 47.5, '',  "B",  0, false, false, 'C', true); // line 4
$pdf->writeHTMLCell(82.8, .5, 122, 53.5, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82.8, .5, 122, 59.5, '',  "B",  0, false, false, 'C', true); // line 6 
$pdf->writeHTMLCell(82.8, .5, 122, 65.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82.8, .5, 122, 71.5, '',  "B",  0, false, false, 'C', true); // line 8
$pdf->writeHTMLCell(82.8, .5, 122, 77.5, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell(82.8, .5, 122, 83.5, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->writeHTMLCell(82.8, .5, 122, 89.5, '',  "B",  0, false, false, 'C', true); // line 11
$pdf->writeHTMLCell(82.8, .5, 122, 95.5, '',  "B",  0, false, false, 'C', true); // line 12
$pdf->writeHTMLCell(82.8, .5, 122, 101.5, '',  "B",  0, false, false, 'C', true); // line 13
$pdf->writeHTMLCell(82.8, .5, 122, 107.5, '',  "B",  0, false, false, 'C', true); // line 14
$pdf->writeHTMLCell(82.8, .5, 122, 113.5, '',  "B",  0, false, false, 'C', true); // line 15
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_3d',83, 105, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('')), 122, 31);
$pdf->setCellHeightRatio(1.2);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 141, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_page_number_2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 146);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b> Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 141, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_part_number_2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 146);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.</b> Item Number</div>';
$pdf->writeHTMLCell(90, 7, 174, 141, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_legal_name_item_number_2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 181, 146);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 157, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(82.4, .5, 122, 153.5, '',  "B",  0, false, false, 'C', true); // line  
$pdf->writeHTMLCell(82.4, .5, 122, 159.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 165.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 171.5, '',  "B",  0, false, false, 'C', true); // line  
$pdf->writeHTMLCell(82.4, .5, 122, 177.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 183.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 189.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 195.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 201.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 207.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 213.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 219.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->writeHTMLCell(82.4, .5, 122, 225.5, '',  "B",  0, false, false, 'C', true); // line 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_3d',83, 91, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_130_additional_info_3d')), 122, 155);
$pdf->setCellHeightRatio(1.2);

//.........


        //! should be uncomment this line before put it on live site 
// 'atorney_state_bar_number':' $attorneyData->bar_number',
$js = "
var fields = {
    'p1_2_date':' ',
    'information_about_you_last_name':' ',
    'information_about_you_first_name':' ',
    'information_about_you_middle_name':' ',
    'US_Mailing__Incare':' ',
    'US_mailing_street_number_name':' ',
    'US_mailing_apt_ste_flr':' ',
    'US_mailing_city_town':' ',
    'us_mailing_state':' ',
    'us_mailing_state2':' ',
    'us_mailing_zipcode':' ',
    'information_about_you_alien_registration':' ',
    'information_about_you_us_social_number':' ',
    'information_about_you_date_of_birth':' ',
    'information_about_you_city_town_birth':' ',
    'information_about_you_country_birth':' ',
    'information_about_you_current_country':' ',
    'information_about_you_country_of_citizenship':' ',
    'other_name_used_last_name':' ',
    'other_name_used_first_name':' ',
    'other_name_used_middle_name':' ',
    'processing_info_feet':' ',
    'processing_info_inches':' ',
    'processing_info_pound1':' ',
    'processing_info_pound2':' ',
    'processing_info_pound3':' ',
    'residence_and_travel_from':' ',
    'residence_and_travel_to':' ',
    'residence_and_travel_street_name':' ',
    'residence_and_travel_apt_ste_flr':' ',
    'residence_and_travel_city_or_town':' ',
    'residence_and_travel_state':' ',
    'residence_and_travel_zip_code':' ',
    'residence_and_travel_from_1':' ',
    'residence_and_travel_to_1':' ',
    'residence_and_travel_street_name_1':' ',
    'residence_and_travel_apt_ste_flr_1':' ',
    'residence_and_travel_city_or_town_1':' ',
    'residence_and_travel_state_1':' ',
    'residence_and_travel_zip_code_1':' ',
    'residence_and_travel_from_2':' ',
    'residence_and_travel_to_2':' ',
    'residence_and_travel_street_name_2':' ',
    'residence_and_travel_apt_ste_flr_2':' ',
    'residence_and_travel_city_or_town_2':' ',
    'residence_and_travel_state_2':' ',
    'residence_and_travel_zip_code_2':' ',
    'residence_and_travel_from_3':' ',
    'residence_and_travel_to_3':' ',
    'residence_and_travel_street_name_3':' ',
    'residence_and_travel_apt_ste_flr_3':' ',
    'residence_and_travel_city_or_town_3':' ',
    'residence_and_travel_state_3':' ',
    'residence_and_travel_zip_code_3':' ',
    'travel_info_departure_date':' ',
    'travel_info_return_date':' ',
    'travel_info_reason_for_departure':' ',
    'travel_info_departure_date_2':' ',
    'travel_info_return_date_2':' ',
    'travel_info_reason_for_departure_2':' ',
    'travel_info_reason_for_9a':' ',
    'travel_info_reason_for_9b':' ',
    'travel_info_reason_for_9c':' ',
    'travel_info_reason_for_10':' ',
    'for_initial_date_of_initial':' ',
    'for_initial_place_of_initial':' ',
    'for_initial_request_immigration_status':' ',
    'education_info_indicate_how':' ',
    'education_info_name_city':' ',
    'military_service_info_military_branch':' ',
    'military_service_info_type_of_discharge':' ',
    'requestor_contact_daytime_telephone':' ',
    'requestor_contact_mobile_telephone':' ',
    'requestor_contact_email_address':' ',
    'contact_info_interpreter_family_name ':' ',
    'contact_info_interpreter_given_name':' ',
    'contact_info_interpreter_business':' ',
    'interpreter_mailing_address_street_name':' ',
    'interpreter_mailing_address__apt_ste_flr':' ',
    'interpreter_mailing_address_city_or_town':' ',
    'interpreter_mailing_address_state':' ',
    'interpreter_mailing_address_zip_code':' ',
    'interpreter_mailing_address_province':' ',
    'interpreter_mailing_address_postal_code':' ',
    'interpreter_mailing_address_country':' ',
    'interpreter_contact_info_daytime_tele_number':' ',
    'interpreter_contact_info_email_address':' ',
    'interpreter_certification_i_certify_that':' ',
    'Preparer_family_last_name':' ',
    'Preparer_family_first_name':' ',
    'Preparer_business_or_organization_name':' ', 
    'preparer_mailing_address_street_name':' ',
    'preparer_mailing_address__apt_ste_flr':' ',
    'preparer_mailing_address_city_or_town':' ',
    'preparer_mailing_address_state':' ',
    'preparer_mailing_address_zip_code':' ',
    'preparer_mailing_address_province':' ',
    'preparer_mailing_address_postal_code':' ',
    'preparer_mailing_address_country':' ',
    'preparer_daytime_tele_number':' ',
    'preparer_fax_number':' ',
    'preparer_mail_address':' ',
    'full_legal_name_family_last_name':' ',
    'full_legal_name_given_first_name':' ',
    'full_legal_name_middle_name':' ',
    'full_legal_name_page_number':' ',
    'full_legal_name_part_number':' ',
    'full_legal_name_item_number':' ',
    'full_legal_name_3d':' ',
    'full_legal_name_page_number_1':' ',
    'full_legal_name_part_number_1':' ',
    'full_legal_name_item_number_1':' ',
    'full_legal_name_4d':' ',
    'full_legal_name_page_number_2':' ',
    'full_legal_name_part_number_2':' ',
    'full_legal_name_item_number_2':' ',
    'full_legal_name_5d':' ',
    'most_recent_date_of_proceding':' ',
    'location_of_proceding':' ',
    'part3_5cdate_authorize':' ',
    'part3_8date_authorize':' ',
    'part3_9bdate_authorize':' ',
    'part3_9cdate_authorize':' ',
    'part5_1b':' ',
    'part7_7a':' ',
    'part7_7b':' ',
    'part6_6a':' ',
    'part6_6b':' ',
    'p5_2b_signature_date':' ',
    'part5_3':' ',
    'part5_4':' ',
    'part5_5':' ',
    'part6_1a_lastname':' ',
    'part6_1b_firstname':' ',
    'part6_2_organization':' ',
    'part6_3a_street':' ',
    'part6_3b_ste_flr':' ',
    'part6_3c_city_or_town':' ',
    'part6_3e_zip_code':' ',
    'part6_3f_province':' ',
    'part6_3g_postal_code':' ',
    'part6_3h_country':' ',
    'part6_3d_state':' ',
    'part_8_2_a_number':' ',
    'interpreter_daytime_tele_number':' ',
    'interpreter_email':' ',




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
$pdf->Output('Form_I-821D.pdf', 'I');