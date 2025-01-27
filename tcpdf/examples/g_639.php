<?php

// require_once('formheader.php');   //database connection file 
require_once('localconfig.php');   //local connection file 

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
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form G-639 Edition  12/12/24", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/G-639-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
        
    }
}


$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form G-639');

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


$logo = 'homeland_security_logo.png';
$pdf->Image($logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(30, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(120, 15, "Freedom of Information/Privacy Act Request", 0, 'C', 0, 1, 48, 9, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm G-639", 0, 'C', 0, 1, 174.5, 5.5, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0102\nExpires 12/31/2027", 0, 'C', 0, 1, 169, 18.5, true);

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
//..............page number 1
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>What Is the Purpose of Form G-639?</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 34, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Use Form G-639 to request access to U.S. Citizenship and Immigration Services (USCIS) records under the Freedom of Information 
Act (FOIA) at 5 U.S.C. 552 and the Privacy Act of 1974 (PA) at 5 U.S.C. 552a, if applicable. You may also use this form to request 
amendment or correction of records pertaining to you under the PA, if applicable.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 42, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Your Options to Make a FOIA or PA Request with USCIS</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 56, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div>You can make a FOIA or PA request:
</div>';
$pdf->writeHTMLCell(190, 7, 12, 63, $html, 0, 1, false, true, 'J', true);
//.............
$pdf->SetFont('times', 'B', 10);
$html = '<ul>
<li>Online at</li><br>
<li>Using this Form G-639; or</li><br>
<li>In writing and in accordance with the requirements of the FOIA and PA.</li>
</ul>';
$pdf->writeHTMLCell(190, 7, 12, 68, $html, 0, 1, false, true, 'J', true);

// Bold anchor tag with <b> tag or use inline CSS
$pdf->SetFont('times', 'B', 10);
$html_link = "<a href='http://www.uscis.gov/foia' ><b>www.uscis.gov/foia</b></a>;";
$pdf->writeHTMLCell(190, 6, 37, 68, $html_link, 0, 1, false, false, 'L', true);

//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Request and Receive Records Faster Online</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 90, $html, 1, 1, true, false, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div>
Our online FOIA and PA services are a more efficient way to request and receive records than by using Form G-639 to make a 
request.<br>
When you make your request online, USCIS receives it immediately and we can deliver the response to you immediately after the 
records are processed.<br><br>
You will also be able to:<br><br>
• Receive instant updates when we act on your request;<br><br>
• Respond faster if we ask you to give us more information; and<br><br>
Making your request online helps ensure your request contains the required information and reaches us immediately, rather than 
through a mailed postal delivery. Once you provide the information necessary to process your request, we will add it to the same first in, first-out processing queue ordinarily used for all requests.<br><br>
Once we release records you request online, you can use your online account to:<br><br>
• View them on any internet connected device, such as a smartphone, tablet, or computer;<br><br>
• Access the records as soon as they are available, rather than waiting for them by mail; and<br><br>
• Continue to access your records through your online account and print them whenever you need.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 98, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>If You Make Your Request Using This Form</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 186, $html, 1, 1, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>If you complete and submit this form, we will send all correspondence and any records we release through U.S. mail, requiring time 
for transit and receiving. Unless you specify another format, any records responsive to your request will be sent to you on a CD-ROM, so you will need to use a computer with an optical drive to view them. Alternately, if you request records online 
(<a><b>www.uscis.gov/foia</b></a>) using FIRST, you can download them without the need for equipment other than a computer, smartphone, or 
tablet that is connected to the internet.<br>

<b>Do not use Form G-639 for:</b>
<ul><li> <b>Status Inquires.</b> Contact the USCIS office where the application or petition was filed or visit <a><b>https://egov.uscis.gov</b></a> to check 
your case status online. You may also reach out to the USCIS Contact Center at <a><b>www.uscis.gov/contactcenter</b></a>. The USCIS 
Contact Center provides information in English and Spanish. For those who are deaf or hard of hearing and use a TTY relay 
service, call <b>1-800-767-1833.</b></li><br>
<li> <b>Consular Notification of a Visa Petition Approval.</b> Use Form I-824, Application for Action on an Approved Application or 
Petition, to request consular notification of visa petition approval.</li></ul>
</div>';
$pdf->writeHTMLCell(190, 7, 12, 193, $html, 0, 1, false, true, 'J', true);

//..............page number 1 end 


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
//.........
$pdf->SetFont('times', '', 10);
$html ='<ul>
<li><b>Return of Original Documents.</b> Use Form G-884, Request for the Return of Original Documents, to request the return of 
original documents.<li>
<li><b>Requesting a Certificate of Non-Existence</b><li>
<li><b>Naturalization Records Before September 27, 1906.</b> Contact the clerk of court where the naturalization occurred to request 
naturalization records before September 27, 1906.<li>
<li><b>USCIS Manifest Arrivals Before December 1982.</b> Contact the National Archives at <a><b>https://www.archives.gov/contact</b></a> to 
request information on USCIS manifest arrivals before December 1982.<li>
<li><b>Proof of Status for Non-Immigration Benefits.</b> Contact the Federal agency responsible for the benefit (for example, Social 
Security benefit, Selective Service requirement) to obtain proof of status.<li>
</ul>';
$pdf->writeHTMLCell(190, 7, 10, 17, $html, 0, 1, false, true, 'J', true);
//..........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>General Instructions</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 70, $html, 1, 1, true, false, 'L', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div>USCIS provides forms free of charge through the USCIS website. To view, print, or fill out our forms, you should use the latest 
version of Adobe Reader, which you can download for free at <a><b>https://www.archives.gov/contact</b></a>. If you do not have internet access, you 
may call the USCIS Contact Center at <b>1-800-375-5283 (TTY 1-800-767-1833)</b> and ask that we mail a form to you. The USCIS 
Contact Center provides information in English and Spanish.<br><br>
<b>How To Fill Out Form G-639</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 78, $html, 0, 1, false, true, 'J', true);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 103, $html, 0, 1, false, true, 'L', true);
$html ='<div>Type or print legibly in black ink.</div>';
$pdf->writeHTMLCell(93, 7, 17, 103, $html, 0, 1, false, true, 'L', true);
//........
$html ='<div><b>2.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 108, $html, 0, 1, false, true, 'L', true);
$html ='<div>If you need extra space to complete any item within this request, use the space provided in <b>Part 5. Additional Information</b> or 
attach a separate sheet of paper. Type or print the Subject of Record\'s name and Alien Registration Number (A-Number) (if any) 
at the top of each sheet; indicate the <b>Page Number, Part Number,</b> and <b>Item Number</b> to which your answer refers; and sign and 
date each sheet.</div>';
$pdf->writeHTMLCell(185, 7, 17, 108, $html, 0, 1, false, true, 'L', true);
//........
$html ='<div><b>3.</b></div>';
$pdf->writeHTMLCell(85, 7, 12, 125, $html, 0, 1, false, true, 'L', true);
$html ='<div>Answer all questions fully and accurately. If a question does not apply to you (for example, if you have never been married and 
the question asks, “Provide the name of your current spouse”), type or print “N/A” unless otherwise directed. If your answer to a 
question which requires a numeric response is zero or none (for example, “How many children do you have” or “How many times 
have you departed the United States”), type or print “None” unless otherwise directed.</div>';
$pdf->writeHTMLCell(185, 7, 17, 125, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Read the Entire Form and Complete as Much as Possible</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 145, $html, 1, 1, true, false, 'L', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div>The information USCIS requests in this form helps us locate the records and information you request.<br>
You are not required to respond to every item, but if you do not provide enough information we may:
<ul>
<li>Require more time to fulfill your request;</li>
<li>Need to request more information from you, delaying our response; or</li>
<li>Not be able to locate the records or information you request.</li>
</ul>
</div>';
$pdf->writeHTMLCell(190, 7, 13, 154, $html, 0, 1, false, true, 'J', true);

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
//............


$pdf->SetFont('times', '', 10); // set font
$html = '<b> START HERE - Type or print in black ink.</b>';
$pdf->writeHTMLCell(90, 7, 16, 17, $html, '', 0, 0, true, 'L');
//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 61, false); 
$pdf->StopTransform();
//..........

//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Specify the Nature of your Request</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 24, $html, 1, 1, true, false, 'L', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div>
<b>NOTE:</b> On this form, the individual to whom a record pertains is described as the subject of record
</div>';
$pdf->writeHTMLCell(190, 7, 13, 32, $html, 0, 1, false, true, 'J', true);


//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 38, $html, 0, 1, false, true, 'L', true);
$html ='<b>Select Type of Request</b>';
$pdf->writeHTMLCell(93, 7, 17, 38, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div>Select the box that indicates the nature of your request, and the type of records you are requesting. If you need extra space to 
complete this section, use the space provided in <b>Part 5. Additional Information.</b></div>';
$pdf->writeHTMLCell(185, 7, 17, 43, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part1_a" value="Y" checked=" " /> <b> A. </b> Information from your own immigration record;</div>';
$pdf->writeHTMLCell(185, 7, 17, 53, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part1_b" value="Y" checked=" " /> <b> B. </b>  Information from another person\'s immigration record;</div>';
$pdf->writeHTMLCell(185, 7, 17, 59, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part1_c" value="Y" checked=" " /> <b> C. </b>  USCIS business, operational, or policy records;</div>';
$pdf->writeHTMLCell(185, 7, 17, 65, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part1_d" value="Y" checked=" " /> <b> D. </b>  An amendment or correction of your record under the Privacy Act;</div>';
$pdf->writeHTMLCell(185, 7, 17, 71, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_d_field', 175, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 76);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_e" value="Y" checked=" " /> <b> E. </b>  An amendment or correction of another person\'s immigration record on their behalf under the Privacy Act; </div>';
$pdf->writeHTMLCell(185, 7, 17, 83, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_e_field', 165, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 88);
$pdf->SetFont('times', '', 10);
$html ='<div>or</div>';
$pdf->writeHTMLCell(18, 7, 195, 88, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part1_f" value="Y" checked=" " /> <b> F. </b>  Other records in USCIS custody. </div>';
$pdf->writeHTMLCell(185, 7, 17, 96, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_f_field', 175, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 101);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>If you selected <b>Item B.</b> or<b> E.</b> in <b>Item Number 1.</b>, complete <b>Part 4. Third-Party Requestor</b>, along with other pertinent sections 
of this form.<br>
If you selected <b>Item A., C., D.</b>, or <b>F.</b> in <b>Item Number 1.</b>, do not complete <b>Part 4. Third-Party Requestor</b> section of this form.</div>';
$pdf->writeHTMLCell(185, 7, 17, 108, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 122, $html, 0, 1, false, true, 'L', true);
$html ='<b>Request Specific Documents</b>';
$pdf->writeHTMLCell(93, 7, 17, 122, $html, 0, 1, false, true, 'L', true);
//........
$html ='<div>If you request specific documents, USCIS will usually be able to process your request faster than if you request a large set of 
records, such as an entire A-File.<br>
Select the types of records you are requesting, if applicable, from this list of commonly requested records:</div>';
$pdf->writeHTMLCell(185, 7, 17, 127, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part1_1" value="Y" checked=" " /> Apprehensions, and Date of Apprehension (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(185, 7, 17, 142, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_1_Apprehensions', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 105, 142);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_2" value="Y" checked=" " />  Birth certificate</div>';
$pdf->writeHTMLCell(185, 7, 17, 148, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="part1_3" value="Y" checked=" " />  Form I-94, with Date of Entry (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(185, 7, 17, 154, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_3_Apprehensions', 60, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 154);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_4" value="Y" checked=" " />  Passport</div>';
$pdf->writeHTMLCell(185, 7, 17, 160, $html, 0, 1, false, true, 'L', true);
//.......
$html ='<div><input type="checkbox" name="part1_5" value="Y" checked=" " /> Other Arrival/Departure documents into the U.S., with Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(185, 7, 17, 166, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_5_Arrival', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 166);
//........

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_6" value="Y" checked=" " />  I-129, Petition for a Nonimmigrant Worker</div>';
$pdf->writeHTMLCell(185, 7, 17, 172, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_7" value="Y" checked=" " />  I-90, Application to Replace Permanent Resident Card (Green Card)</div>';
$pdf->writeHTMLCell(185, 7, 17, 178, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_8" value="Y" checked=" " />  I-130, Petition for Alien Relative </div>';
$pdf->writeHTMLCell(185, 7, 17, 184, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_9" value="Y" checked=" " />    I-140, Immigrant Petition for Alien Workers </div>';
$pdf->writeHTMLCell(185, 7, 17, 190, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_10" value="Y" checked=" " />  I-485, Application to Register Permanent Residence or Adjust Status</div>';
$pdf->writeHTMLCell(185, 7, 17, 196, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_11" value="Y" checked=" " />   I-751, Petition to Remove Conditions on Residence</div>';
$pdf->writeHTMLCell(185, 7, 17, 202, $html, 0, 1, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_13" value="Y" checked=" " />   N-400, Application for Naturalization</div>';
$pdf->writeHTMLCell(185, 7, 17, 208, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_14" value="Y" checked=" " />   Labor certification issued by the U.S. Department of Labor</div>';
$pdf->writeHTMLCell(185, 7, 17, 214, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_15" value="Y" checked=" " />   Naturalization certificate</div>';
$pdf->writeHTMLCell(185, 7, 17, 220, $html, 0, 1, false, true, 'L', true);
//.......


//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_16" value="Y" checked=" " />   Proof of Lawful Permanent Resident (LPR) status </div>';
$pdf->writeHTMLCell(185, 7, 17, 226, $html, 0, 1, false, true, 'L', true);
//.......

//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_17" value="Y" checked=" " />    Record of removal from the U.S., with Date of Removal (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(185, 7, 17, 232, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_17_Record', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130, 232);
//........


//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_18" value="Y" checked=" " />    Other (Explain): </div>';
$pdf->writeHTMLCell(185, 7, 17, 240, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part1_18_other', 152, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 240);
//........


//........
$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to complete this section, use the space provided in <b>Part 5. Additional Information.</b></div>';
$pdf->writeHTMLCell(185, 7, 17, 247, $html, 0, 1, false, true, 'L', true);

//..............page number 3 end .................
// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
//...........
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Specify the Nature of your Request</b>(continued)</div>';
$pdf->writeHTMLCell(190, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 24, $html, 0, 1, false, true, 'L', true);
$html ='<b>Qualifications for Expedited Processing</b>';
$pdf->writeHTMLCell(93, 7, 17, 24, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div>Select any of the following circumstances if applicable to your request:</div>';
$pdf->writeHTMLCell(185, 7, 17, 29, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_19" value="Y" checked=" " />&nbsp;&nbsp;&nbsp;Circumstances in which the lack of expedited processing could reasonably be expected to pose an imminent threat to the life<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
or physical safety of an individual. </div>';
$pdf->writeHTMLCell(185, 7, 17, 35, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_20" value="Y" checked=" " />&nbsp;&nbsp;&nbsp;An urgency to inform the public about an actual or alleged Federal government activity, if made by a person primarily<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
engaged in disseminating information.</div>';
$pdf->writeHTMLCell(185, 7, 17, 45, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_21" value="Y" checked=" " />&nbsp;&nbsp;&nbsp;The loss of substantial due process rights.</div>';
$pdf->writeHTMLCell(185, 7, 17, 55, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_22" value="Y" checked=" " />&nbsp;&nbsp;&nbsp;A matter of widespread and exceptional media interest in which there are possible questions about the government\'s integrity <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
which affect public confidence. Requests for expedited processing based upon this category must be submitted to the Senior <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Director of FOIA Operations, the Privacy Office, U.S. Department of Homeland Security, 245 Murray Lane SW STOP -<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
0655, Washington, DC 20598-0655.</div>';
$pdf->writeHTMLCell(185, 7, 17, 61, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 78, $html, 0, 1, false, true, 'L', true);
$html ='<b>Statement Requesting Expedited Processing</b>';
$pdf->writeHTMLCell(93, 7, 17, 78, $html, 0, 1, false, true, 'L', true);
//........
$html ='To receive expedited processing, you must further explain why you are requesting it. In Part 5. Additional Information, type or 
print a detailed statement explaining your selection in <b>Item Number 3</b>.';
$pdf->writeHTMLCell(185, 7, 17, 84, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 94, $html, 0, 1, false, true, 'L', true);
$html ='<b>Information Pertaining to an Upcoming Immigration Court Proceeding</b>';
$pdf->writeHTMLCell(185, 7, 17, 94, $html, 0, 1, false, true, 'L', true);
//........

$html ='If the subject of record has an upcoming immigration court proceeding, USCIS may be able to process the request on an 
accelerated track. Select the box if the following circumstance applies to your request.';
$pdf->writeHTMLCell(185, 7, 17, 100, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part1_5_22" value="Y" checked=" " /> The subject of record has a date scheduled for an immigration court proceeding.</div>';
$pdf->writeHTMLCell(185, 7, 17, 110, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>If selected, include a copy of one of the following forms, as issued by the U.S. Department of Homeland Security or 
U.S. Department of Justice, with your request:<ul>
<li>Form I-862, Notice to Appear, documenting the upcoming date of the Subject\'s hearing before the Immigration Judge;</li>
<li>Form I-122, Order to Show Cause, documenting the upcoming date of the Subject\'s hearing before the Immigration Judge;</li>
<li>Form I-863, Notice of Referral to Immigration Judge; or</li>
<li>A written notice of continuation of a future scheduled hearing before the Immigration Judge.</li></ul></div>';
$pdf->writeHTMLCell(185, 7, 20, 117, $html, 0, 1, false, true, 'L', true);
//........

//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b> Part 2. Provide Information to Identify the Subject of Record </b></div>';
$pdf->writeHTMLCell(190, 6, 13, 148, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div>The individual to whom a record pertains is described as the subject of record. The more information you provide about the subject of 
record, the better USCIS can identify the records you are requesting.</div>';
$pdf->writeHTMLCell(190, 7, 12, 155, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Subject of Record\'s Identifying Information</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 165, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b> Alien Registration Number (A-Number):</div>';
$pdf->writeHTMLCell(190, 7, 12, 170, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>USCIS issues Alien Registration Numbers, otherwise known as an “A-Number,” to persons who apply for, or are granted, certain 
immigration benefits. U.S. Customs and Border Protection (CBP) or U.S. Immigration and Customs Enforcement (ICE) may also 
issue A-Numbers. If the subject of record was issued an A-Number(s), type or print it in the spaces provided. If they do not have 
an A-Number, or do not remember it, leave this space blank.</div>';
$pdf->writeHTMLCell(185, 7, 17, 175, $html, 0, 1, false, true, 'L', true);
//........
$pdf->Image('images/right_angle.jpg', 18, 197, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('times', '', 11);
$html ='<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 22, 195, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('identifying_information_A1', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 195);

//........
$pdf->Image('images/right_angle.jpg', 83, 197, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('times', '', 11);
$html ='<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 86, 195, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('identifying_information_A2', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 195);
//........
$pdf->Image('images/right_angle.jpg', 145, 197, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('times', '', 11);
$html ='<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 148, 195, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('identifying_information_A3', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 195);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2. </b> Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 7, 12, 205, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 205);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3. </b> Country of Birth</div>';
$pdf->writeHTMLCell(190, 7, 12, 215, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Provide the name of the country where the subject of record was born. If the country\'s name has changed or the country no longer 
exists, list the country as it was named when the subject of record was born.
</div>';
$pdf->writeHTMLCell(190, 7, 17, 220, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_country_of_birth', 184, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 230);
//........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b> Part 2. Provide Information to Identify the Subject of Record </b> (continued) </div>';
$pdf->writeHTMLCell(190, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.  </b>  Receipt Number</div>';
$pdf->writeHTMLCell(190, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Provide the USCIS receipt number that corresponds to any request the subject of record filed with USCIS.</div>';
$pdf->writeHTMLCell(190, 7, 17, 32, $html, 0, 1, false, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>A. </b></div>';
$pdf->writeHTMLCell(190, 7, 17, 40, $html, 0, 1, false, true, 'L', true); 
$pdf->Image('images/right_angle.jpg', 24, 41, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_4A_uscis_receipt_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 30, 40);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>B. </b></div>';
$pdf->writeHTMLCell(190, 7, 103, 40, $html, 0, 1, false, true, 'L', true); 
$pdf->Image('images/right_angle.jpg', 110, 41, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_4B_uscis_receipt_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115, 40);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>C. </b></div>';
$pdf->writeHTMLCell(190, 7, 17, 50, $html, 0, 1, false, true, 'L', true); 
$pdf->Image('images/right_angle.jpg', 24, 51, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_4C_uscis_receipt_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 30, 50);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Subject of Record</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 58, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.   &nbsp; Subject of Record\'s Name </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 63, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 22, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_5_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 73);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 84, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_5_family_given_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 73);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 146, 68, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_5_family_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 73);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.   &nbsp; Additional Names Used</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 82, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If applicable, list any additional names the subject of record has used, including any nicknames, aliases, and maiden name. If the 
subject\'s name has changed since they entered the United States, indicate the name used at the time of entry in <b>Item Number 7.</b> 
If you need extra space to complete this section, use the space provided in <b>Part 5. Additional Information</b>.</div>';
$pdf->writeHTMLCell(183, 7, 17, 87, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>A. &nbsp; Additional Name 1</b></div>';
$pdf->writeHTMLCell(183, 7, 17, 100, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 22, 105, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 110);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 84, 105, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6_family_given_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 110);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 146, 105, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6_family_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 110);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>B. &nbsp; Additional Name 2</b></div>';
$pdf->writeHTMLCell(183, 7, 17, 120, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 22, 125, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6B_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 130);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 84, 125, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6B_family_given_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 130);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 146, 125, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6B_family_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 130);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>C. &nbsp; Additional Name 3</b></div>';
$pdf->writeHTMLCell(183, 7, 17, 138, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 22, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6C_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 148);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 84, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6C_family_given_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 148);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 146, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6C_family_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 148);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.   &nbsp; Name Used Upon Entry to the United States</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 155, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 22, 160, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_7_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 165);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 84, 160, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_7_family_given_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 165);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 146, 160, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_7_family_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 165);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Subject of Record\'s Mailing Address and Contact Information</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 173, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8. </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 178, $html, 0, 1, false, true, 'L', true);

$html ='<div> List the subject\'s contact information. You may list a valid residence, Army Post Office (APO), Fleet Post Office (FPO), or 
commercial address in the United States. You may list a post office address (PO Box) if that is how the subject receives their 
mail.</div>';
$pdf->writeHTMLCell(185, 7, 17, 178, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div>Street Number and Name</div>';
$pdf->writeHTMLCell(185, 7, 17, 192, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_street_number_and_name', 114, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 197);
//........
$pdf->SetFont('times', '', 10);
$html ='<div> Apt. Ste. Flr.&nbsp;&nbsp;&nbsp;&nbsp;Number</div>';
$pdf->writeHTMLCell(85, 7, 132, 192, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 13);
$html ='<div> <input type="checkbox" name="part5_apt" value="Y" checked=" " /> <input type="checkbox" name="part5_ste" value="Y" checked=" " />  <input type="checkbox" name="part5_flr" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(85, 7, 132, 197, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_apt_flr_ste_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 197);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div>City or Town</div>';
$pdf->writeHTMLCell(185, 7, 17, 204, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_city_town', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 209);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>State</div>';
$pdf->writeHTMLCell(85, 7, 136, 204, $html, 0, 1, false, true, 'L', true);
$html = '<select name="part2_8_address_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 136, 209, $html, '', 0, 0, true, 'L');
///..........
$pdf->SetFont('times', '', 10);
$html ='<div>Zip Code </div>';
$pdf->writeHTMLCell(85, 7, 154.5, 204, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', 'BI', 9);
$pdf->writeHTMLCell(85, 7, 169, 204,'<a href="https://tools.usps.com/go/ZipLookupAction_input"><i><b>(USPS ZIP CodeLookup)</b></i></a>', 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_zipcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154.5, 209);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div>Province</div>';
$pdf->writeHTMLCell(185, 7, 17, 216, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_province', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 221);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Postal Code </div>';
$pdf->writeHTMLCell(185, 7, 90, 216, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_postal_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 221);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Country </div>';
$pdf->writeHTMLCell(185, 7, 125, 216, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 126, 221);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Telephone Number </div>';
$pdf->writeHTMLCell(185, 7, 17, 229, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_telephone_number', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 234);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Email Address </div>';
$pdf->writeHTMLCell(185, 7, 105, 229, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8_email_address',100, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 105, 234);
//........
//.......page number 5 end....

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b> Part 2. Provide Information to Identify the Subject of Record </b> (continued) </div>';
$pdf->writeHTMLCell(190, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........


//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.   &nbsp; Subject of Record\'s Father</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 25, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 17, 30, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_9_father_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 35);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 80, 30, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_9_father_family_given_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 35);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 142, 30, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_9_father_family_middle_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 35);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part2_9" value="Y" checked=" " /> &nbsp; Father\'s Name is unknown.</div>';
$pdf->writeHTMLCell(190, 7, 16, 42, $html, 0, 1, false, true, 'L', true);


//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.   &nbsp; Subject of Record\'s Mother</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 47, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 17, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_10_mother_family_last_name', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 58);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Maiden Name, or previous last names</div>';
$pdf->writeHTMLCell(190, 7, 105, 53, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_10_mother_previous_last_name', 98, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 105, 58);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 17, 65, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_10_mother_family_given_first_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 70);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 100, 65, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_10_mother_family_middle_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 100, 70);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part2_10" value="Y" checked=" " /> &nbsp; Mother\'s Name is unknown.</div>';
$pdf->writeHTMLCell(190, 7, 16, 77, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>11. Additional Family Members that May Appear on Requested Records</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 83, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Provide the family member\'s full name and their relationship to the subject of record for any individual that may appear on the 
requested records, for example, a spouse or children.</div>';
$pdf->writeHTMLCell(190, 7, 17, 88, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>A.&nbsp;&nbsp;&nbsp;Name 1</b></div>';
$pdf->writeHTMLCell(190, 7, 17, 98, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 23, 103, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11A_additional_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 108);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 85, 103, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11A_additional_family_given_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 108);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 147, 103, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11A_additional_family_middle_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 108);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Relationship</div>';
$pdf->writeHTMLCell(190, 7, 22, 117, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11A_relation_ship_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 117);
//..........................

$pdf->SetFont('times', '', 10);
$html ='<div><b>B.&nbsp;&nbsp;&nbsp;Name 2</b></div>';
$pdf->writeHTMLCell(190, 7, 17, 125, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 23, 130, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11B_additional_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 135);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 85, 130, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11B_additional_family_given_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 135);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 147, 130, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11B_additional_family_middle_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 135);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Relationship</div>';
$pdf->writeHTMLCell(190, 7, 22, 144, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11B_relation_ship_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 144);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>C.&nbsp;&nbsp;&nbsp;Name 3</b></div>';
$pdf->writeHTMLCell(190, 7, 17, 152, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 23, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11C_additional_family_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 162);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 85, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11C_additional_family_given_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 162);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 147, 157, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11C_additional_family_middle_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 162);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Relationship</div>';
$pdf->writeHTMLCell(190, 7, 22, 170, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_11C_relation_ship_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 42, 171);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to complete this section, use the space provided in <b>Part 5. Additional Information.</b></div>';
$pdf->writeHTMLCell(190, 7, 17, 178, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. &nbsp; Avoiding Redaction of Records Mentioning Additional Persons</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 185, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>To protect the privacy of each person mentioned in records we release, we redact their information unless you provide:
    <ul>
    <li>Their consent for us to release their information, either in a notarized document, or a document signed under penalty of 
    perjury, or;</li><br>

    <li>Proof they are deceased, with a death certificate, obituary, photograph of a funeral memorial or monument; or screen print 
    from the Social Security Death Index; or probate documents filed in court. This is not required if they were born more 
    than 100 years before you submit this form.
    </li>
    </ul>
Include these documents with this Form G-639 and complete pertinent sections of <b>Part 5. Additional Information.</b></div>';
$pdf->writeHTMLCell(190, 7, 17, 195, $html, 0, 1, false, true, 'L', true);


//.........
$pdf->AddPage('P', 'LETTER');  // page number 6
//...........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b> Part 3. Certification of Request and Consent to Release, Amend, or Correct Records </b></div>';
$pdf->writeHTMLCell(190, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Requestor Consent to Pay Potential Fees</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 24, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>USCIS will contact you with instructions if any fees are required. <b>Please do not send any payment at the time of your request.</b><br><br>
In accordance with Department of Homeland Security Regulations, your request constitutes an agreement to pay any fees that may be 
chargeable up to <b>$25.00.</b> We may charge fees for searching for records at the respective clerical, professional, and/or managerial rates 
of <b>$4.00/$7.00/$10.25</b> per quarter hour, and for duplication of copies at the rate of <b>$.10</b> per copy. We do not charge for the first 100 
copies and two hours of search time, and the remaining combined charges for search and duplication must exceed <b>$14.00 </b>before we 
will charge you any fees. Search and processing fees are not applicable for Privacy Act requests.<br><br>
If the total anticipated fees are more than <b>$250</b>, or you have failed to pay fees in the past, USCIS may request an advance deposit. 
USCIS will not process any Form G-639 until you pay all fees from prior requests.<br><br>
<input type="checkbox" name="part3_a" value="Y" checked=" "/> &nbsp;  I, the requestor, consent to pay all costs incurred for search, duplication, and review of documents up to <b>$25.</b>
</div>';
$pdf->writeHTMLCell(190, 7, 12, 30, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Declaration that the Request is True and Complete</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 80, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you are the subject of record and requesting records about yourself or requesting a correction or amendment of your records, you 
must verify your identity by providing the information requested in <b>Part 2.</b> You <b>MUST</b> also sign your request below and have your 
signature notarized <b>OR</b> submitted under penalty of perjury.<br><br>
Sign and date the request. A stamped or typewritten name in place of a signature is not acceptable.<br>
I certify, swear, or affirm, under penalty of perjury under the laws of the United States of America, that the information in this request 
is complete, true, and correct.</div>';
$pdf->writeHTMLCell(190, 7, 12, 85, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b>  Signature of Requestor</div>';
$pdf->writeHTMLCell(190, 7, 12, 114, $html, 0, 1, false, true, 'L', true);
//........
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 118, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(125, 7, 22, 120, '', 1, 0, false, 'L');
//.......
$pdf->SetFont('times', '', 10);
$html ='<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 150, 114, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3__date_of_signature', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 120);
//........
$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 4. Third-Party Requestor </b></div>';
$pdf->writeHTMLCell(190, 6, 13, 130, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  Third-Party Requestor Identifying Information</b> </div>';
$pdf->writeHTMLCell(190, 7, 12, 137, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 17, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_family_last_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 148);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 82, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_family_given_first_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 82, 148);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 142, 143, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_family_middle_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 148);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  Third-Party Requestor Mailing Address and Contact Information</b> </div>';
$pdf->writeHTMLCell(190, 7, 12, 155, $html, 0, 1, false, true, 'L', true);
//........
$html= '<div>In Care Of Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 17, 160, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_in_care_of_name', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 165);
//............
$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 17, 172, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_street_number_and_name', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 177);
//...........
$pdf->setFont('Times', '', 10);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 140, 172, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 140, 177, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 150, 177, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 160, 177, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(30, 7, 172, 177, '', 1, 1, false, 'L');
//.................
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 18, 185, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 185, $html, 0, 1, false, 'L');


$html= '<div> &nbsp; ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 155, 185, $html, 0, 1, false, 'L');

$pdf->setFont('Times', 'B', 8);
$html= '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><i>(USPS ZIP CodeLookup)</i></a></div>';
$pdf->writeHTMLCell(60, 7, 172, 185, $html, 0, 1, false, 'L');
//............


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_thirdparty_city_town', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 190);

$pdf->setFont('Times', '', 10);
$html = '<select name="part4_2_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(30, 0, 140, 189, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_thirdparty_zipcode', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 190);

//......................
$pdf->setFont('Times', '', 10);
$html= '<div>Province</div>';
$pdf->writeHTMLCell(80, 7, 18, 200, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_about_you_province', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 205);
//.............
$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code </div>';
$pdf->writeHTMLCell(70, 7, 74, 200, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_about_you_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 205);

//.....................
$pdf->setFont('Times', '', 10);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 128, 200, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_about_you_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 205);


//.............
$pdf->setFont('Times', '', 10);
$html= '<div>Telephone Number </div>';
$pdf->writeHTMLCell(40, 7, 18, 215, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_about_you_telephone_number', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 220);

//.....................
$pdf->setFont('Times', '', 10);
$html= '<div>Email Address</div>';
$pdf->writeHTMLCell(80, 7, 105, 215, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_about_you_email_address', 98, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 105, 220);


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 8

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 4. Third-Party Requestor </b> (continued)</div>';
$pdf->writeHTMLCell(190, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3. &nbsp; Third-Party Requestor\'s Relationship to the Subject of Record</b> </div>';
$pdf->writeHTMLCell(190, 7, 12, 25, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>What is the relationship of the subject of record to the third-party requestor?<br>
If you are requesting information or amendment or correction of records on behalf of the subject of record (select <b>only</b> one for<br>
<b>Items A. - F.</b>):</div>';
$pdf->writeHTMLCell(190, 7, 17, 30, $html, 0, 1, false, true, 'L', true);
//........


$html ='<div><input type="checkbox" name="part4_a" value="Y" checked=" " /> <b> A. </b> I am an attorney or accredited representative, acting on behalf of the subject of record.</div>';
$pdf->writeHTMLCell(185, 7, 17, 43, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part4_b" value="Y" checked=" " /> <b> B. </b>  I am requesting information about someone who is deceased.</div>';
$pdf->writeHTMLCell(185, 7, 17, 49, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part4_c" value="Y" checked=" " /> <b> C. </b>  I am requesting information on behalf of my child or a minor for whom I am a legal guardian.</div>';
$pdf->writeHTMLCell(185, 7, 17, 55, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><input type="checkbox" name="part4_d" value="Y" checked=" " /> <b> D. </b>  Other (Explain):</div>';
$pdf->writeHTMLCell(185, 7, 17, 63, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_d', 145, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 63);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you are requesting information about a subject of record with whom you have no relationship:</div>';
$pdf->writeHTMLCell(185, 7, 17, 72, $html, 0, 1, false, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part4_e" value="Y" checked=" " /> <b> E. </b> I am requesting as a member of the media.</div>';
$pdf->writeHTMLCell(185, 7, 17, 78, $html, 0, 1, false, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part4_f" value="Y" checked=" " /> <b> F. </b> Other (Explain): </div>';
$pdf->writeHTMLCell(185, 7, 17, 86, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_f', 145, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 86);
//........


$pdf->SetFont('times', '', 10);
$html ='<div>If you selected Item B. in Item Number 3., provide proof they are deceased, with a death certificate, obituary, photograph of a 
funeral memorial or monument; or screen print from the Social Security Death Index; or probate documents filed in court. This is 
not required if they were born more than 100 years before you submit this form.</div>';
$pdf->writeHTMLCell(185, 7, 17, 95, $html, 0, 1, false, true, 'L', true);

//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>4. &nbsp; </b>If you selected Item C. in Item Number 3., you must provide proof of parentage/guardianship, such as a birth certificate,<br> &nbsp;  &nbsp;
adoption decree, or similar document naming the requestor as the legal parent or guardian. You must also provide:</div>';
$pdf->writeHTMLCell(190, 7, 12, 110, $html, 0, 1, false, true, 'L', true);
//........

$html ='<div><b>A. &nbsp; </b> Parent/Guardian\'s Legal Name</div>';
$pdf->writeHTMLCell(190, 7, 17, 120, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(190, 7, 17, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_family_last_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 132);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 82, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_family_given_first_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 82, 132);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(190, 7, 142, 127, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_family_middle_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 132);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>B. &nbsp;</b>Parent/Guardian\'s Date of Birth </div>';
$pdf->writeHTMLCell(190, 7, 17, 140, $html, 0, 1, false, true, 'L', true);
$html ='<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 7, 22, 145, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_parent_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 146);

$pdf->SetFont('times', '', 10);
$html ='<div><b>C. &nbsp; </b> Parent/Guardian\'s Country of Birth </div>';
$pdf->writeHTMLCell(190, 7, 100, 140, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_parent_country_of_birth', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),107, 146);
//......

$pdf->SetFont('times', 'B', 10);
$html ='<div><b>Consent by Subject of Record to Release Records to a Third-Party Requestor or Allow Amendment or Correction <b>
of Records by a Third-Party Requestor<b/></div>';
$pdf->writeHTMLCell(190, 7, 13, 155, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>USCIS generally requests that third-party requestors prove they have the subject of the record\'s consent to receive the records. 
Alternately, third-party requestors must prove the subject of record is deceased, or otherwise demonstrate that the requested records 
are subject to release, such as when there is no privacy interest in the records, or if there is a public interest in the records that 
outweighs the subject\'s privacy interests. Consent by the subject of record is generally not requested if the subject of record\'s birthdate 
is more than 100 years before the submission of this request. Third party requestors who are seeking amendment or correction of 
records pertaining to the subject of record must demonstrate that they have the subject of record\'s consent and that they are acting on 
behalf of the subject of record.<br><br>To provide consent, complete one of the following options:</div>';
$pdf->writeHTMLCell(190, 7, 13, 165, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', 'B', 10);
$html ='<div><b>Option 1: Declaration Under Penalty of Perjury<b/></div>';
$pdf->writeHTMLCell(190, 7, 13, 202, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part4_" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(190, 7, 13, 208, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>I, the subject of record, consent to USCIS releasing my records to a third-party requestor and/or allowing amendment or 
correction of my records by a third-party requestor, as named in Part 4. I certify, swear, or affirm, under penalty of perjury under 
the laws of the United States of America, that the information in this request is complete, true, and correct.</div>';
$pdf->writeHTMLCell(180, 7, 18, 208, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.  </b> Signature of Subject of Record</div>';
$pdf->writeHTMLCell(190, 7, 13, 223, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(120, 7, 19, 229, '', 1, 1, false, true, 'L', true);
//........

//........
$pdf->SetFont('times', '', 10);
$html ='<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 7, 144, 223, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_date_of_signature', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 229);
//.......page number 8 end ........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 9

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b> Part 4. Third-Party Requestor </b> (continued)</div>';
$pdf->writeHTMLCell(190, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', 'B', 10);
$html ='<div><b>Option 1: Declaration Under Penalty of Perjury<b/></div>';
$pdf->writeHTMLCell(190, 7, 12, 25, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>IMPORTANT:</b> Do <b>NOT</b> sign and date below until the notary public provides instructions to you.</div>';
$pdf->writeHTMLCell(190, 7, 12, 32, $html, 0, 1, false, true, 'L', true);
//........

//........
$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I consent to USCIS releasing my records to a third-party requestor and/or allowing amendment or correction of the 
requested records to the third-party requestor, as named in Part 4. I certify, swear, or affirm that the information in this request is 
complete, true, and correct.</div>';
$pdf->writeHTMLCell(190, 7, 12, 38, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.  </b> Signature of Subject of Record</div>';
$pdf->writeHTMLCell(190, 7, 13, 54, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(125, 7, 19, 60, '', 1, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.  </b>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 7, 144, 54, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_7_date_of_signature', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),150, 60);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.  </b> Subscribed and Sworn to Before Me on (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 7, 13, 70, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_8_date_of_signature', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),98, 70);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b> Signature of Notary</div>';
$pdf->writeHTMLCell(190, 7, 13, 80, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(125, 7, 19, 86, '', 1, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.  </b>10. Notary\'s Telephone Number</div>';
$pdf->writeHTMLCell(190, 7, 144, 80, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_10_notarys_telephone', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),150, 86);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.  </b>My Commission Expires on (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 7, 13, 95, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_11_commission_expires', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),85, 95);
//....
$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to complete this section, use the space provided in <b>Part 5. Additional Information</b>.
</div>';
$pdf->writeHTMLCell(190, 7, 13, 105, $html, 0, 1, false, true, 'L', true);
//........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 10
//........
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 5. Additional Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//............

//....
$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to provide any additional information within this request, use the space below. You may also make copies of 
this page to complete this request or attach a separate sheet of paper.</div>';
$pdf->writeHTMLCell(190, 7, 13, 25, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you attach additional paper:<br><br>
<b>.</b> &nbsp;&nbsp; Type or print the subject of record\'s name and their A-number (if known) at the top of each sheet;<br>
<b>.</b> &nbsp;&nbsp; Indicate the <b>Page Number, Part Number,</b> and <b>Item Number</b> to which your answer refers; and<br>
<b>.</b> &nbsp;&nbsp; Sign and date each sheet.</div>';
$pdf->writeHTMLCell(190, 7, 13, 35, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b>Subject of Record\'s Family Name (Last Name)&nbsp;&nbsp;Subject of Record\'s Given Name (First Name)&nbsp;&nbsp;Subject of Record\'s Middle Name</div>';
$pdf->writeHTMLCell(190, 7, 13, 57, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(65, 7, 18, 63, '', 1, 1, false, true, 'L', true);
$pdf->writeHTMLCell(65, 7, 85, 63, '', 1, 1, false, true, 'L', true);
$pdf->writeHTMLCell(50, 7, 152, 63, '', 1, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html = '<b>2.  </b> Subject of Record\'s A-Number (if any)<b>&nbsp;  &nbsp; &nbsp; &nbsp;A- </b>';
$pdf->writeHTMLCell(80, 7, 12, 72, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(50, 7, 85, 72,"", 1, 0, false, true, 'L', true);
$pdf->Image('images/right_angle.jpg', 75, 73, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//........

//..............aditional section.........
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 82, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 87);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 82, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54,87);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 82, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 87);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 95, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="5" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 10, 25, 95, $html, 0, 0, false, 'L');
//....
$pdf->setFont('Times', '', 10);
$html= '<div><b>4.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 117, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 122);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 117, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 122);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 117, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 122);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 130, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="5" name="additional_information_4d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 10, 25, 130, $html, 0, 0, false, 'L');
//....


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 157);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 157);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 157);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 165, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="5" name="additional_information_5d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 10, 25, 165, $html, 0, 0, false, 'L');
//....
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 192);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 192);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 192);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 200, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="5" name="additional_information_6d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 10, 25, 200, $html, 0, 0, false, 'L');
//....


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 220, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 225);
//.....

$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 220, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 225);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 220, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 225);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 235, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="5" name="additional_information_7d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 10, 25, 235, $html, 0, 0, false, 'L');
//....


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 11
//........

//........
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>DHS Privacy Notice</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
//............

//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>AUTHORITIES: </b> The information requested on this form, and the associated evidence, is collected under the Freedom of Information 
Act (FOIA), 5 U.S.C. Section 552, and the Privacy Act of 1974 (PA), 5 U.S.C. Section 552a, together with the Department of Homeland 
Security implementing regulations found in volume 6 of the Code of Federal Regulations (CFR).</div>';
$pdf->writeHTMLCell(192, 7, 12, 27, $html, 0, 0, false, 'L');


//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>PURPOSE:  </b> The primary purpose for providing the requested information on this form is to request access to information under the 
FOIA and/or PA, or amendment or correction of records under the PA. DHS uses the information you provide to grant or deny the 
information request you are seeking.</div>';
$pdf->writeHTMLCell(192, 7, 12, 43, $html, 0, 0, false, 'L');


//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>DISCLOSURE: </b> The information you provide is voluntary. However, failure to provide the requested information, and any 
requested evidence, may delay access to information or result in denial of your information or amendment request.</div>';
$pdf->writeHTMLCell(192, 7, 12, 60, $html, 0, 0, false, 'L');

//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>ROUTINE USES: </b> DHS may share the information you provide on this form and any additional requested evidence with other 
Federal, state, local, and foreign government agencies and authorized organizations. DHS follows approved routine uses described in 
the associated published system of records notices [DHS/ALL-001 DHS FOIA and Privacy Act Record System and DHS/ALL-037 E- Authentication Records System of Records] and the published privacy impact assessments [DHS/USCIS/PIA-077 FOIA Immigration 
Records System (FIRST) and DHS/ALL/PIA-038 FOIA/PA Information Processing System], which you can find at  
 <a href="www.dhs.gov/privacy">www.dhs.gov/privacy. </a>  DHS may also share this information, as appropriate, for law enforcement purposes or in the interest of 
national security.</div>';
$pdf->writeHTMLCell(192, 7, 12, 75, $html, 0, 0, false, 'L');

//........
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Paperwork Reduction Act</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 105, $html, 1, 1, true, false, 'J', true);
//............

//............
$pdf->setFont('Times', '', 10);
$html= '<div>An agency may not conduct or sponsor an information collection, and a person is not required to respond to a collection of information, 
unless it displays a currently valid Office of Management and Budget (OMB) control number. The public reporting burden for this 
collection of information is estimated at 40 minutes per response, including the time for reviewing instructions, gathering the required 
documentation and information, completing the request, preparing statements, attaching necessary documentation, and submitting the 
request. Send comments regarding this burden estimate or any other aspect of this collection of information, including suggestions for 
reducing this burden, to: U.S. Citizenship and Immigration Services, Office of Policy and Strategy, Regulatory Coordination Division, 
5900 Capital Gateway Drive, Mail Stop #2140, Camp Springs, MD 20588-0009; OMB No. 1615-0102. <b> Do not mail your completed 
Form G-639 to this address.</b></div>';
$pdf->writeHTMLCell(192, 7, 12, 115, $html, 0, 0, false, 'L');






















$js = "
var fields = {

    'part1_d_field':' ',
    'part1_e_field':' ',
    'part1_f_field':' ',
    'part1_1_Apprehensions':' ',
    'part1_3_Apprehensions':' ',
    'part1_5_Arrival':' ',
    'part1_17_Record':' ',
    'part1_18_other':' ',
    'identifying_information_A1':' ',
    'identifying_information_A2':' ',
    'identifying_information_A3':' ',
    'part2_date_of_birth':' ',
    'part2_country_of_birth':' ',
    'part2_4A_uscis_receipt_number':' ',
    'part2_4B_uscis_receipt_number':' ',
    'part2_4C_uscis_receipt_number':' ',
    'part2_5_family_last_name':' ',
    'part2_5_family_given_first_name':' ',
    'part2_5_family_middle_name':' ',
    'part2_6_family_last_name':' ',
    'part2_6_family_given_first_name':' ',
    'part2_6_family_middle_name':' ',
    'part2_6B_family_last_name':' ',
    'part2_6B_family_given_first_name':' ',
    'part2_6B_family_middle_name':' ',
    'part2_6C_family_last_name':' ',
    'part2_6C_family_given_first_name':' ',
    'part2_6C_family_middle_name':' ',
    'part2_7_family_last_name':' ',
    'part2_7_family_given_first_name':' ',
    'part2_7_family_middle_name':' ',
    'part2_8_street_number_and_name':' ',
    'part2_8_apt_flr_ste_number':' ',
    'part2_8_city_town':' ',
    'part2_8_address_state':' ',
    'part2_8_zipcode':' ',
    'part2_8_province':' ',
    'part2_8_postal_code':' ',
    'part2_8_country':' ',
    'part2_8_telephone_number':' ',
    'part2_8_email_address':' ',
    'part2_9_father_family_last_name':' ',
    'part2_9_father_family_given_first_name':' ',
    'part2_9_father_family_middle_name':' ',
    'part2_10_mother_family_last_name':' ',
    'part2_10_mother_previous_last_name':' ',
    'part2_10_mother_family_given_first_name':' ',
    'part2_10_mother_family_middle_name':' ',
    'part2_11A_additional_family_last_name':' ',
    'part2_11A_additional_family_given_first_name':' ',
    'part2_11A_additional_family_middle_name':' ',
    'part2_11A_relation_ship_name':' ',
    'part2_11B_additional_family_last_name':' ',
    'part2_11B_additional_family_given_first_name':' ',
    'part2_11B_additional_family_middle_name':' ',
    'part2_11B_relation_ship_name':' ',
    'part2_11C_additional_family_last_name':' ',
    'part2_11C_additional_family_given_first_name':' ',
    'part2_11C_additional_family_middle_name':' ',
    'part2_11C_relation_ship_name':' ',
    'part3__date_of_signature':' ',
    'part3_family_last_name':' ',
    'part3_family_given_first_name':' ',
    'part3_family_middle_name':' ',
    'part4_in_care_of_name':' ',
    'part4_street_number_and_name':' ',
    'part4_thirdparty_city_town':' ',
    'part4_2_state':' ',
    'part4_thirdparty_zipcode':' ',
    'part4_information_about_you_province':' ',
    'part4_information_about_you_postalcode':' ',
    'part4_information_about_you_country':' ',
    'part4_information_about_you_telephone_number':' ',
    'part4_information_about_you_email_address':' ',
    'part4_d':' ',
    'part4_f':' ',
    'part4_family_last_name':' ',
    'part4_family_given_first_name':' ',
    'part4_family_middle_name':' ',
    'part4_parent_date_of_birth':' ',
    'part4_parent_country_of_birth':' ',
    'part4_date_of_signature':' ',
    'part4_7_date_of_signature':' ',
    'part4_8_date_of_signature':' ',
    'part4_10_notarys_telephone':' ',
    'part4_11_commission_expires':' ',
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
    'additional_information_7d':' ',
    '':' ',
    '':' ',
    '':' ',
    





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
$pdf->Output('I-539.pdf', 'I');