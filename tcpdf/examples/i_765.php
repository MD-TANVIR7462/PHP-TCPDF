<?php
// require_once('formheader.php');   //database connection file 
require_once('localconfig.php');   //database connection file 



// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    // Page header
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
		
		// $this->Cell(40, 6, "Form I-765     Edition    10/31/22", 0, 266.5, 'L');
		
		$this->MultiCell(50, 6, 'Form I-765    Edition   08/28/24', 0, 'L', 0, 0, 13.5, 268, true);
		
		// if ($this->page == 1){
			$barcode_image = "images/i765/I-765-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 67, 268, 95, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 268, true);        
    }
}

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-765');

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

$logo = 'homeland_security_logo.png'; // Logo
$pdf->Image($logo, 12, 5.5, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(100, 15, "Application For Employment Authorization", 0, 'C', 0, 1, 58.5, 6, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-765", 0, 'C', 0, 1, 173.2, 2.5, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 68, 10, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 15, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0040\nExpires 09/30/2027", 0, 'C', 0, 1, 169, 15.5, true);

$pdf->Ln(1.4);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1); // Straight double Line

$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1.1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 28, false, 'T', 'C'); // Straight Single Line
//...........

//...table start 
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(190, 51, 13, 32, '',  1,  0, false, false, 'C', true);
$pdf->writeHTMLCell(13, 50.5, 13.2, 32.2, '',  'R',  1, true, true, 'L', true);
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(13.5, 28, 12.5, 48, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(3, 3, 27.5, 33, '',  1,  1, false, true, 'L', false); // Box
$pdf->SetFont('times', '', 9);
$html ="<div><b>Authorization/Extension Valid From</b></div>";
$pdf->writeHTMLCell(40, 5, 31.5, 31.5, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(31, 5, 31.5, 39, "", "B", 1, false, true, 'L', true); // Line
$pdf->writeHTMLCell(40, 5, 26.5, 41, "", "B", 1, false, true, 'L', true); // Table Bottom Line
//............

$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(3, 3, 27.5, 48, '',  1,  1, false, true, 'L', false); // Box
$pdf->SetFont('times', '', 9);
$html ="<div><b>Authorization/Extension Valid Through</b></div>";
$pdf->writeHTMLCell(40, 1, 31.5, 46, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(31, 5, 31.5, 54, "", "B", 1, false, true, 'L', true);  // Line
//........
$pdf->writeHTMLCell(1, 30, 65.5, 32, "", "R", 1, false, true, 'L', true); // Table Right Line
$pdf->writeHTMLCell(108, 10, 26.5, 62, "", "TB", 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 51, 133.5, 32, "", "R", 1, false, true, 'L', true); // Table Right Line

$pdf->SetFont('times', 'B', 9);
$pdf->writeHTMLCell(20, 5, 92, 32, "Fee Stamp", 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(20, 5, 158, 32, "Action Block", 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(50, 5, 26, 64, "Alien Registration Number &nbsp;&nbsp;&nbsp;  A-", 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(45, 6, 72.3, 64, "", 1, 1, false, true, 'L', true);
$html = '<span style="letter-spacing:3.3mm"></span>';
$pdf->writeHTMLCell(48, 6, 73.2, 64, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(5, 6, 77, 64, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 6, 87, 64, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 6, 97, 64, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 6, 107, 64, "", "LR", 1, false, true, 'L', true);

$pdf->writeHTMLCell(50, 5, 26, 72, "Remarks", 0, 1, false, true, 'L', true);
//table end

// table 2 start 
$pdf->setCellHeightRatio(1.25);
$pdf->writeHTMLCell(190, 18, 13, 87.5, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 12);
$pdf->writeHTMLCell(1, 18, 84, 87.5, '',  'R',  1, false, true, 'L', true); // Table Right Line
$html ="<div><b>To be completed by an attorney or Board of Immigration Appeals (BIA)- accredited representative</b> (if any).</div>";
$pdf->writeHTMLCell(71.8, 14.4, 13, 87.5, $html, 1, 1, true, true, 'C', true);
//..........
$pdf->setCellHeightRatio(1);
$pdf->SetFont('times', 'B', 15);

if(showData('i_765_g28_checkbox')=='Y') $attached_check='checked'; else $attached_check = '';
$html ='<div><input type="checkbox" name="i_765_g28_checkbox" value="Y" checked="'.$attached_check.'" /></div>';

$pdf->writeHTMLCell(10, 18, 85.5, 87, $html, '', 0, false, true, 'L', true); // Checkbox

$pdf->SetFont('times', 'B', 10);
$html ='<div>Select this box if Form G-28<br>is attached.</div>';
$pdf->writeHTMLCell(46, 18, 92.5, 87.5, $html, 'R', 0, false, true, 'L', true); // Table Right Line
//........

//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 140, 88, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
// $pdf->TextField('attorney_uscis_online_account_number', 60, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'),  array(),140.5, 97);



$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255);
$pdf->setCellPaddings(0); // set cell padding

// $html ='&nbsp;<input type="text" class="heighttext" name="attorney_uscis_online_account_number" value="'.$attorneyData->uscis_online_account_number.'" size="14" style="letter-spacing:2.8mm; width: 200px" maxlength="12" />';

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(56, 6, 140, 97, $html, 0, 1, false, true, 'J', 0);
$pdf->writeHTMLCell(60, 6, 140.5, 97, "", 1, 1, false, true, 'J', 0);

$pdf->setCellHeightRatio(1.2);
$pdf->SetDrawColor(200,200,200); // set color for cell border
$pdf->writeHTMLCell(5, 3, 145.7, 97, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 155.7, 97, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 165.7, 97, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 175.7, 97, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 185.7, 97, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 195.7, 97, "", "L", 1, false, true, 'L', true);

$pdf->Image('images/right_angle.jpg', 13.6, 109.3, 3.3, 3.3);

$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>START HERE - Type or print in black ink.</b></div>';
$pdf->writeHTMLCell(187, 10, 19, 108, $html, 0, 0, false, true, 'L', true);


//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);

$html ='<div><b>Part 1. Reason for Applying</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 118, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>I am applying for </b>(select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(92, 7, 12, 125, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. </b>';
$pdf->writeHTMLCell(10, 7, 12, 130.5, $html, 0, 1, false, true, 'L', true);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFont('times', '', 14);
if(showData('reason_applying_initial_permission_to_accept')=='Y') $initial_check='checked'; else $initial_check = '';
$html ='<div><input type="checkbox" name="initial" value="Y" checked="'.$initial_check.'" /></div>';
$pdf->writeHTMLCell(40, 7, 19, 130.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Initial permission to accept employment.</div>';
$pdf->writeHTMLCell(90, 7, 26, 131.5, $html, 0, 1, false, true, 'L', true);


$pdf->setCellHeightRatio(1.2);

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b. </b>';
$pdf->writeHTMLCell(10, 7, 12, 137, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if(showData('reason_applying_replacement_of_lost')=='Y') $replace_check='checked'; else $replace_check = '';
$html ='<div><input type="checkbox" name="replace" value="Y" checked="'.$replace_check.'" /></div>';
$pdf->writeHTMLCell(40, 7, 19, 137, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 9.8);
$html = '<div>Replacement of lost, stolen, or damaged employment authorization document, or correction 
of my employment authorization document <b>NOT DUE</b> to <br> U.S. Citizenship and Immigration Services (USCIS) error.</div>';
$pdf->writeHTMLCell(80, 7, 26, 138, $html, 0, 1, false, true, 'L', true);

$html = '<div><b>NOTE:</b> Replacement (correction) of an employment authorization document due to USCIS error does
 not require a new Form I-765 and filing fee. Refer to <b>Replacement for Card Error</b> in the <b>What is the <br>Filing Fee</b> section of the Form I-765 Instructions for further details .</div>';
$pdf->writeHTMLCell(80, 7, 26, 160.5, $html, 0, 1, false, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c. </b>';
$pdf->writeHTMLCell(10, 7, 12, 187.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 14);
if(showData('reason_applying_renewal_of_permission')=='Y') $renewal_check='checked'; else $renewal_check = '';

$html ='<div><input type="checkbox" name="renewal" value="Y" checked="'.$renewal_check.'" /></div>';
$pdf->writeHTMLCell(40, 7, 19, 186.7, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '<div>Renewal of my permission to accept employment. (Attach a copy of your previous employment authorization document.)</div>';
$pdf->writeHTMLCell(80, 7, 26, 187.5, $html, 0, 1, false, true, 'L', true);

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 206.5, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Your Full Legal Name</b></div>';
$pdf->writeHTMLCell(90, 5, 13, 217, $html, 0, 1, true, false, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 12, 224, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 226);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 12, 232, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 234);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 12, 242, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 242);

// Right Side

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Name Used</b></div>';
$pdf->writeHTMLCell(90, 5, 113, 117, $html, 0, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div>Provide all other names you have ever used, including aliases, maiden name, and nicknames. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 10, 112, 124, $html, 0, 1, false, true, 'L', true);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 142, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_family_last_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 143);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 151, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_given_first_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 152);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 112, 161, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_middle_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 161);

$pdf->writeHTMLCell(90, 1, 113, 164, "", "B", 1); // Straight Line
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 171, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);

$pdf->TextField('information_about_you_other_family_last_name2', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 172);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 180, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_given_first_name2', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 181);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 112, 190, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_middle_name2', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 190);

$pdf->writeHTMLCell(90, 1, 113, 193, "", "B", 1); // Straight Line
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 201, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_family_last_name3', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 202);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 210, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_given_first_name3', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 211);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 112, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_other_middle_name3', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 220);

/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/

$pdf->AddPage('P', 'LETTER');



//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Your U.S. Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 28, $html, 0, 1, true, false, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a. </b>&nbsp; In Care Of Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 35, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_in_care_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 41);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 49, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_street', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 50);

if(showData('information_about_you_us_mailing_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('information_about_you_us_mailing_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('information_about_you_us_mailing_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

//...........
$pdf->SetFont('times', '', 11); // set font
$html= '<div><b>5.c. </b>&nbsp; 
<input type="checkbox" name="Apt" value="Apt" checked="'.$apt_checked.'" /> Apt. &nbsp;
<input type="checkbox" name="Ste" value="Ste" checked="'.$ste_checked.'" /> Ste. &nbsp;
<input type="checkbox" name="Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';
$pdf->writeHTMLCell(60, 0, 12, 59, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_apt_ste_flr', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),66, 59);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 68, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 68);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.e.</b> &nbsp;&nbsp; State</div>';
$pdf->writeHTMLCell(50, 0, 12, 77, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="information_about_you_us_mail_state" size="0.45">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 28, 77, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10);
$html= '<div><b>5.f.</b>&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 44, 77, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_zipcode', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 77);
//..........

$pdf->SetFont('times', 'I', 8.3);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(USPS ZIP Code Lookup)</i></b></a></div>';
$pdf->writeHTMLCell(90, 7, 10, 83, $html, 0, 1, false, false, 'R', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6. </b>&nbsp;&nbsp;&nbsp; Is your current mailing address the same as your physical<br>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;address?</div>';
$pdf->writeHTMLCell(90, 7, 12, 89, $html, 0, 1, false, false, 'J', true);


if(showData('is_your_current_mailing_same_as_physical')=="Y") $current_mail_checked_yes = "checked"; else $current_mail_checked_yes = "";
if(showData('is_your_current_mailing_same_as_physical')=="N") $current_mail_checked_no = "checked"; else $current_mail_checked_no = "";

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="current_mail" value="Y" checked="'.$current_mail_checked_yes.'" /> Yes   &nbsp;
<input type="checkbox" name="current_mail" value="N" checked="'.$current_mail_checked_no.'" />  No</div>';
$pdf->writeHTMLCell(90, 7, 75, 95, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered "No" to <b>Item Number 6.</b>,
provide your physical address below.</div>';
$pdf->writeHTMLCell(80, 7, 20, 100, $html, 0, 1, false, false, 'J', true);

//......
$pdf->SetFont('times', 'I', 11.7);
$html ='<div><b>U.S. Physical Address </b></div>';
$pdf->writeHTMLCell(90, 6, 13, 114, $html, 0, 1, true, false, 'J', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b>&nbsp; Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 7, 12, 122, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 124);

//...........
if(showData('information_about_you_home_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('information_about_you_home_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('information_about_you_home_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

//...........
$pdf->SetFont('times', '', 11); // set font
$html= '<div><b>7.b. </b>&nbsp; 
<input type="checkbox" name="Apt" value="Apt" checked="'.$apt_checked.'" /> Apt. &nbsp;
<input type="checkbox" name="Ste" value="Ste" checked="'.$ste_checked.'" /> Ste. &nbsp;
<input type="checkbox" name="Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';

$pdf->writeHTMLCell(60, 7, 12, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 133);
//......
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.c.</b> &nbsp;&nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 142, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 142);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.d.</b> &nbsp;&nbsp; State</div>';
$pdf->writeHTMLCell(50, 0, 12, 151, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="about_you_us_physical_state" size="0.45">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 150, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10);
$html= '<div><b>7.e.</b>&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 151, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 151);
//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Information </b></div>';
$pdf->writeHTMLCell(90, 6, 13, 159, $html, 0, 1, true, false, 'J', true);

//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>8.  </b>&nbsp;&nbsp; Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 166, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_alien_reg_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 172);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(50, 7, 48, 171, 'A-', 0, 1, false, false, 'J', true);

$pdf->Image('images/right_angle.jpg', 44, 174, 4, 4);
$pdf->Image('images/right_angle.jpg', 40, 186, 4, 4);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b>&nbsp;&nbsp; USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 179, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_uscis_online_ac_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 185);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10. </b>&nbsp;&nbsp; Gender </div>';
$pdf->writeHTMLCell(90, 7, 12, 192, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);

if(showData('other_information_about_you_gender')=="male") $gender_male = "checked"; else $gender_male = "";
if(showData('other_information_about_you_gender')=="female") $gender_female = "checked"; else $gender_female = "";

$html ='<div>
<input type="checkbox" name="gender" value="M" checked="'.$gender_male.'" />Male &nbsp;&nbsp;&nbsp;
<input type="checkbox" name="gender" value="F" checked="'.$gender_female.'" />Female
</div>';
$pdf->writeHTMLCell(90, 7, 70, 192, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);

if(showData('other_information_about_you_marital_status')=="single") $marital_status_single = "checked"; else $marital_status_single = "";
if(showData('other_information_about_you_marital_status')=="married") $marital_status_married = "checked"; else $marital_status_married = "";
if(showData('other_information_about_you_marital_status')=="divorced") $marital_status_divorced = "checked"; else $marital_status_divorced = "";
if(showData('other_information_about_you_marital_status')=="widowed") $marital_status_widowed = "checked"; else $marital_status_widowed = "";

$html ='<div><b>11. </b>&nbsp;&nbsp; Marital Status </div>';
$pdf->writeHTMLCell(90, 7, 12, 197, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>
&nbsp;<input type="checkbox" name="s" value="single" checked="'.$marital_status_single.'" />Single &nbsp;
&nbsp;<input type="checkbox" name="m" value="m" checked="'.$marital_status_married.'" />Married &nbsp;
&nbsp;<input type="checkbox" name="d" value="divorced" checked="'.$marital_status_divorced.'" />Divorced &nbsp;
<input type="checkbox" name="w" value="Widowed" checked="'.$marital_status_widowed.'" /> Widowed
</div>';
$pdf->writeHTMLCell(90, 7, 18, 202, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b> &nbsp;&nbsp; Have you previously filed Form I-765? </div>';
$pdf->writeHTMLCell(90, 7, 12, 210, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);

if(showData('other_information_have_you_previously_filed_I_765')=="yes") $previously_filed_yes = "checked"; else $previously_filed_yes = "";
if(showData('other_information_have_you_previously_filed_I_765')=="no") $previously_filed_no = "checked"; else $previously_filed_no = "";

$html = '<div>
<input type="checkbox" name="previously_filed" value="y" checked="'.$previously_filed_yes.'" />Yes &nbsp;
<input type="checkbox" name="previously_filed" value="n" checked="'.$previously_filed_no.'" />No
</div>';
$pdf->writeHTMLCell(90, 7, 70, 215, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.a. </b> Has the Social Security Administration (SSA) ever<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
officially issued a Social Security card to you? </div>';
$pdf->writeHTMLCell(90, 5, 12, 221, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('times', '', 10);


if(showData('other_information_social_security_card')=='yes') $checkbox_check_y = 'checked'; else $checkbox_check_y = '';
if(showData('other_information_social_security_card')=='no') $checkbox_check_n = 'checked'; else $checkbox_check_n = '';
$html = '<div>
<input type="checkbox" name="other_information_social_security_card" value="y" checked="'.$checkbox_check_y.'" />Yes &nbsp;
<input type="checkbox" name="other_information_social_security_card" value="n" checked="'.$checkbox_check_n.'" />No
</div>';

$pdf->writeHTMLCell(90, 5, 70, 230, $html, 0, 1, false, true, 'J', true);

//........

$html = '<div><b>NOTE:</b> If you answered "No" to <b>Item Number 13.a.</b>, <br>
skip to <b>Item Number 14</b>. If you answered "Yes" to <b>Item <br>
Number 13.a.</b>, provide the information requested in <b>Item <br>
Number 13.b.</b></div>';
$pdf->writeHTMLCell(90, 6, 20, 236, $html, 0, 1, false, false, 'J', true);

$pdf->Image('images/right_angle.jpg', 138, 25, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>13.b. </b> Provide your Social Security number (SSN) (if known).</div>';
$pdf->writeHTMLCell(90, 5, 112, 18, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_ssn_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 24);

$pdf->SetFont('times', '', 10);
$html ='<div><b>14. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 32, $html, 0, 1, false, false, 'J', true);

$html ='<div>Do you want the SSA to issue you a Social Security card?<br>
(You must also answer "Yes" to <b>Item Number 15.</b>,<br>
<b>Consent for Disclosure</b>, to receive a card.)</div>';
$pdf->writeHTMLCell(100, 5, 120, 32, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);

if(showData('other_information_social_security_card_issue')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('other_information_social_security_card_issue')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="ssa_" value="y" checked="'.$checked_yes.'" />Yes &nbsp;
<input type="checkbox" name="ssa_" value="n" checked="'.$checked_no.'" />No
</div>';

$pdf->writeHTMLCell(90, 5, 180, 45, $html, 0, 1, false, true, 'J', true);

//........
$html ='<div><b>NOTE:</b> If you answered "No" to <b>Item Number 14.</b>, skip
to <b>Part 2., Item Number 18.a.</b> If you answered "Yes" to
<b>Item Number 14.</b>, you must also answer "Yes" to <b>Item
Number 15.<b/></div>';
$pdf->writeHTMLCell(82, 5, 120, 50, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>15. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 68, $html, 0, 1, false, false, 'J', true);

$html = '<div><b>Consent for Disclosure: </b>I authorize disclosure of<br>
information from this application to the SSA as required<br>
for the purpose of assigning me an SSN and issuing me a<br>
Social Security card.</div>';
$pdf->writeHTMLCell(100, 5, 120, 68, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);

if(showData('other_information_constant_for_disclosure')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('other_information_constant_for_disclosure')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="consent" value="y" checked="'.$checked_yes.'" />Yes &nbsp;
<input type="checkbox" name="consent" value="n" checked="'.$checked_no.'" />No
</div>';

$pdf->writeHTMLCell(90, 5, 180, 83.5, $html, 0, 1, false, true, 'J', true);

//........

$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Numbers<br>
14. - 15.</b>, provide the information requested in <b>Item<br>
Numbers 16.a. - 17.b.</b></div>';
$pdf->writeHTMLCell(100, 5, 120, 89, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Father\'s Name</b></div>';
$pdf->writeHTMLCell(90, 5, 112, 104, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Provide your father\'s birth name.</div>';
$pdf->writeHTMLCell(90, 5, 112, 110, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 116.6, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_father_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 119);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 126, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_father_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 128);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Mother\'s Name</b></div>';
$pdf->writeHTMLCell(90, 5, 112, 138, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><br>Provide your mother\'s birth name.</div>';
$pdf->writeHTMLCell(90, 5, 112, 139.5, $html, 0, 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 150.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_mother_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 152.5);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 160, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_mother_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 162);
//.......
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Your Country or Countries of Citizenship or
Nationality</b></div>';
$pdf->writeHTMLCell(90, 5, 113, 174.6, $html, 0, 1, true, false, 'L', true);

//..........
$pdf->SetFont('times', '', 10);
$html ='<div>List all countries where you are currently a citizen or national.
If you need extra space to complete this item, use the space
provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 5, 113, 188, $html, 0, 1, false, true, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.a.  </b>Country</div>';
$pdf->writeHTMLCell(35, 5, 112, 203, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('country1', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 209);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.b.  </b>Country</div>';
$pdf->writeHTMLCell(35, 5, 112, 216, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('country2', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 222);

/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setCellPaddings(1, 0.1, 0, 1); // set cell padding

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 5.5, 13, 17, $html, 1, 1, true, false, 'L', true);
//......

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Place of Birth</b></div>';
$pdf->writeHTMLCell(90, 4.4, 13, 26, $html, 0, 1, true, false, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div>List the city/town/village, state/province, and country where
you were born.</div>';
$pdf->writeHTMLCell(90, 5, 12, 33, $html, 0, 1, false, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>19.a. </b> City/Town/Village of Birth</div>';
$pdf->writeHTMLCell(90, 5, 12, 43, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_village_of_birth', 81, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 48.4);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.b. </b> State/Province of Birth</div>';
$pdf->writeHTMLCell(90, 5, 12, 55, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_province_of_birth', 81, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 60.4);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.c. </b> Country of Birth</div>';
$pdf->writeHTMLCell(90, 5, 12, 67, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_country_of_birth', 81, 6.6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 72.4);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>20. </b> Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 5, 12, 81, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_date_of_birth', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 81);
//...........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b> Information About Your Last Arrival in the  
United States </b></div>';
$pdf->writeHTMLCell(90, 4.5, 13, 92, $html, 0, 1, true, false, 'L', true);
//........

$pdf->SetFont('times', '', 9.8);
$html ='<div><b>21.a. </b> Form I-94 Arrival-Departure Record Number (if any)</div>';
$pdf->writeHTMLCell(90, 5, 12, 104.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_dept_record_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 110);
//...........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 44, 121, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 117, 235.6, false); // angle 2 
// $pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 130, 92, false); // angle right side 3
$pdf->StopTransform();

//.........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>21.b. </b>Passport Number of Your Most Recently Issued Passport</div>';
$pdf->writeHTMLCell(90, 5, 12, 117.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_passport_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 122.7);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>21.c. </b> Travel Document Number (if any)</div>';
$pdf->writeHTMLCell(90, 5, 12, 130, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_travel_document_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 135.4);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>21.d. </b>Country That Issued Your Passport or Travel Document</div>';
$pdf->writeHTMLCell(90, 5, 12, 143, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_country_issued_passport', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 148.4);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>21.e. </b>Expiration Date for Passport or Travel Document<br>
    &nbsp;  &nbsp; &nbsp;  &nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 5, 12, 156.3, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_passport_expire_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 161.6);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>22. </b> Date of Your Last Arrival Into the United States. On or<br>
    &nbsp;  &nbsp; &nbsp;&nbsp;About (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 5, 12, 170, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_last_arrival_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 175.5);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>23.  </b>  &nbsp; Place of Your Last Arrival Into the United States</div>';
$pdf->writeHTMLCell(90, 5, 12, 183.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_last_arrival_place', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 189.5);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>24. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 197.5, $html, 0, 1, false, true, 'J', true);
$html ='<div>Immigration Status at Your Last Arrival (for example,
B-2 visitor, F-1 student, or no status)</div>';
$pdf->writeHTMLCell(80, 5, 20, 197.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_last_arrival_status', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 206.5);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>25. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 214.5, $html, 0, 1, false, true, 'J', true);
$html ='<div>Your Current Immigration Status or Category (for example,<br>
B-2 visitor, F-1 student, parolee, deferred action, or no<br>
status or category) </div>';
$pdf->writeHTMLCell(100, 5, 20, 214.5, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_current_arrival_status', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 228);
//...........

$pdf->SetFont('times', '', 9.7);
$html ='<div><b>26. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 235, $html, 0, 1, false, true, 'J', true);
$html ='<div>Student and Exchange Visitor Information System
(SEVIS) Number (if any)</div>';
$pdf->writeHTMLCell(80, 5, 20, 235, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(80, 5, 50, 246, "N-", 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_sevis_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 246);

// start right side
$pdf->SetFillColor(220,220,220);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Eligibility Category</b></div>';
$pdf->writeHTMLCell(91, 3, 113, 17, $html, 0, 1, true, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>27. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 24, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>Eligibility Category.</b> Refer to the <b>Who May File Form
I-765</b> section of the Form I-765 Instructions to determine
the appropriate eligibility category for this application.
Enter the appropriate letter and number for your eligibility
category below (for example, (a)(8), (c)(17)(iii)).</div>';
$pdf->writeHTMLCell(85, 5, 120.2, 24, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
// $html =<<< EOD
// <div>(<input type="text" name="eligibility1" maxlength="5" value="" size="2" />)(<input type="text" name="eligibility2" maxlength="5" value="" size="3" />)(<input type="text" name="eligibility3" maxlength="5" value="" size="3" />)</div>
// EOD;
// $pdf->writeHTMLCell(85, 7, 150, 44, $html, 0, 1, false, true, 'J', true);

$pdf->TextField('eligibility1', 9.3, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164.5, 46);
$pdf->TextField('eligibility2', 9.3, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 46);
$pdf->TextField('eligibility3', 9.3, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193.4, 46);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(85, 5, 162, 45.6, '( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp;&nbsp;( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp;&nbsp;( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )', 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 54, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(3)(C) STEM OPT Eligibility Category.</b> If you
entered the eligibility category <b>(c)(3)(C) in Item Number
27.</b>, provide the information requested in <b>Item Numbers
28.a. - 28.c.</b></div>';
$pdf->writeHTMLCell(85, 5, 120.2, 53.6, $html, 0, 1, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.a. </b> Degree</div>';
$pdf->writeHTMLCell(90, 5, 112, 72, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_degree', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 72);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.b. </b> Employer\'s Name as Listed in E-Verify</div>';
$pdf->writeHTMLCell(90, 5, 112, 80, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_employee_everyfy', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 86);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.c. </b> </div>';
$pdf->writeHTMLCell(20, 5, 112, 93, $html, 0, 1, false, true, 'J', true);
$html ='<div> Employer\'s E-Verify Company Identification Number or a
Valid E-Verify Client Company Identification Number</div>';
$pdf->writeHTMLCell(83, 5, 120, 93, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_employee_everyfy_company_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 102);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>29.</b></div>';
$pdf->writeHTMLCell(20, 5, 112, 111, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(26) Eligibility Category.</b> If you entered the eligibility
category (c)(26) in <b>Item Number 27.</b>, provide the receipt
number of your H-IB spouse\'s most recent Form I-797
Notice for Form I-129, Petition for a Nonimmigrant
Worker</div>';
$pdf->writeHTMLCell(83, 5, 120, 111, $html, 0, 1, false, true, 'L', true);
$pdf->Image('images/right_angle.jpg', 128, 133, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_eligibility_category', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 132, 132);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 140, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(8) Eligibility Category.</b> If you entered the eligibility <br>
category (c)(8) in <b>Item Number 27.</b>, have you <b>EVER</b><br>
been arrested for and/or convicted of any crime?</div>';
$pdf->writeHTMLCell(95, 5, 120, 140, $html, 0, 1, false, true, 'L', true);
//........


if(showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested')=='yes') $checkbox_check_y = 'checked'; else $checkbox_check_y = '';
if(showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested')=='no') $checkbox_check_n = 'checked'; else $checkbox_check_n = '';
$html = '<div>
<input type="checkbox" name="arrested_status" value="y" checked="'.$checkbox_check_y.'" />Yes &nbsp;
<input type="checkbox" name="arrested_status" value="n" checked="'.$checkbox_check_n.'" />No
</div>';

$pdf->writeHTMLCell(90, 4, 175, 154, $html, 0, 1, false, true, 'J', true);

//..............

$html = '<div><b>NOTE:</b> If you answered "Yes" to <b>Item Number 30.</b>,<br>
refer to <b>Special Filing Instructions for Those With <br>
Pending Asylum Applications (c)(8)</b> in the <b>Required <br>
Documentation</b> section of the Form I-765 Instructions <br>
for information about providing court dispositions.</div>';
$pdf->writeHTMLCell(95, 5, 120, 160, $html, 0, 1, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>31.a. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 184.5, $html, 0, 1, false, true, 'L', true);
$pdf->setCellHeightRatio(1.1);
$html ='<div><b>(c)(35) and (c)(36) Eligibility Category.</b> If you entered <br>
the eligibility category (c)(35) in <b>Item Number 27.</b>, please <br>
provide the receipt number of your Form I-797 Notice for <br>
Form I-140, Immigrant Petition for Alien Worker. If you <br>
entered the eligibility category (c)(36) in <b>Item Number <br>
27.</b>, please provide the receipt number of your spouse\'s or <br>
parent\'s Form I-797 Notice for Form I-140.</div>';
$pdf->writeHTMLCell(95, 5, 120, 184.5, $html, 0, 1, false, true, 'L', true);

//..............
$pdf->Image('images/right_angle.jpg', 137.7, 214.5, 4, 4, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//.........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_eligibility_category_31a', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 213.2);


$pdf->SetFont('times', '', 10);
$html ='<div><b>31.b. </b></div>';

$pdf->writeHTMLCell(20, 5, 112, 221, $html, 0, 1, false, true, 'l', true);
$pdf->setCellHeightRatio(1.1);
$html ='<div>If you entered the eligibility category (c)(35) or (c)(36) in 
<b>Item Number 27.</b>, have you <b>EVER</b> been arrested for 
and/or convicted of any crime?</div>';
$pdf->writeHTMLCell(83, 5, 120, 221, $html, 0, 1, false, true, 'L', true);

if(showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2')=='yes') $checkbox_check_y = 'checked'; else $checkbox_check_y = '';
if(showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_arrested_2')=='no') $checkbox_check_n = 'checked'; else $checkbox_check_n = '';
$html = '<div>
<input type="checkbox" name="arrested_status2" value="y" checked="'.$checkbox_check_y.'" />Yes &nbsp;
<input type="checkbox" name="arrested_status2" value="n" checked="'.$checkbox_check_n.'" />No
</div>';

$pdf->writeHTMLCell(90, 5, 175, 229, $html, 0, 1, false, true, 'J', true);

//..............
$pdf->setCellHeightRatio(1);
$html ='<div><b>NOTE:</b> If you answered “Yes” to <b>Item Number 31.b.</b>, <br>
refer to <b>Employment-Based Nonimmigrant Categories, <br>
Items 8. - 9.</b>, in the <b>Who May File Form I-765</b> section <br>
of the Form I-765 Instructions for information about <br>
providing court dispositions.</div>';
$pdf->writeHTMLCell(83, 5, 120, 235, $html, 0, 1, false, false, 'L', false);

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12);
$pdf->setCellHeightRatio(1.2);
$html ='<div><b>Part 3. Applicant\'s Statement, Contact
Information, Declaration, Certification, and
Signature</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Read the<b> Penalties</b> section of the Form 1-765<br>
Instructions before completing this section. You must file<br>
Form I-765 while in the United States.</div>';
$pdf->writeHTMLCell(90, 5, 12, 34, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Statement</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 49, $html, 0, 1, true, false, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 5, 12, 56.7, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 68, $html, 0, 1, false, true, 'J', true);
if(showData('i_765_applicant_statement_1a_status')=='Y') $checkbox_check = 'checked'; else $checkbox_check = '';
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="i_765_applicant_statement_1a_status" value="y" checked="'.$checkbox_check.'" /></div>';
$pdf->writeHTMLCell(50, 7, 18, 68, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>I can read and understand English, and I have read<br>
and understand every question and instruction on this<br>
application and my answer to every question.</div>';
$pdf->writeHTMLCell(79, 7, 25, 68, $html, 0, 1, false, true, 'L', true);




//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 83, $html, 0, 1, false, true, 'J', true);
if(showData('i_765_applicant_statement_1b_status')=='Y') $checkbox_check = 'checked'; else $checkbox_check = '';
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="i_765_applicant_statement_1b_status" value="y" checked="'.$checkbox_check.'" /></div>';
$pdf->writeHTMLCell(50, 7, 18, 83, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_applicant_statement_1b_language', 74, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  26, 97);
$pdf->SetFont('times', '', 10);
$html ='<div>The interpreter named in <b>Part 4</b>. read to me every<br>
question and instruction on this application and my<br>
answer to every question in<br>
<br><br>
a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell(79, 7, 25, 83, $html, 0, 1, false, true, 'L', true);





//.........







$pdf->SetFont('times', '', 10);
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 114, $html, 0, 1, false, true, 'J', true);
if(showData('i_765_applicant_statement_2_status')=='Y') $checkbox_check = 'checked'; else $checkbox_check = '';
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="i_765_applicant_statement_2_status" value="y" checked="'.$checkbox_check.'" /></div>';
$pdf->writeHTMLCell(50, 7, 18, 114, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_applicant_statement_2_preparer', 74, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  26, 119);
$pdf->SetFont('times', '', 10);
$html ='<div>At my request, the preparer named in <b>Part 5.</b>,<br><br><br>
prepared this application for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell(79, 7, 25, 114, $html, 0, 1, false, true, 'L', true);





//.........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 4, 13, 139, $html, 0, 1, true, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(79, 7, 19.6, 147, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_daytime_tel', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 152);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>4.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(79, 7, 19.6, 160, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_mobile', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 166);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 173.5, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(79, 7, 19.6, 173.5, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_email', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 179);

//.........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell(50, 7, 12, 188.5, $html, 0, 1, false, true, 'J', true);
if(showData('applicant_statement_6')=='Y') $checkbox_check = 'checked'; else $checkbox_check = '';
$pdf->SetFont('times', '', 12);
$html = '<div><input type="checkbox" name="applicant_statement_6" value="y" checked="'.$checkbox_check.'" /></div>';
$pdf->writeHTMLCell(50, 7, 18, 188, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Select this box if you are a Salvadoran or Guatemalan<br>
national eligible for benefits under the ABC<br>
settlement agreement.</div>';
$pdf->writeHTMLCell(79, 7, 25, 188, $html, 0, 1, false, true, 'L', true);

//..........page 4 left end .............

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Declaration and Certification</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 17, $html, 0, 1, true, false, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div>
Copies of any documents I have submitted are exact photocopies <br>
of unaltered, original documents, and I understand that USCIS <br>
may require that I submit original documents to USCIS at a later <br>
date. Furthermore, I authorize the release of any information <br>
from any and all of my records that USCIS may need to <br>
determine my eligibility for the immigration benefit that I seek.</div>';
$pdf->writeHTMLCell(100, 7, 112, 24, $html, 0, 1, false, true, 'L', true);

$html ='<div>
I furthermore authorize release of information contained in this
application, in supporting documents, and in my USCIS
records, to other entities and persons where necessary for the
administration and enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(92, 7, 112, 52, $html, 0, 1, false, true, 'L', true);

//......
$pdf->SetFont('times', '', 10);
$html = '<div>I understand that USCIS may require me to appear for an appointment to take my biometrics (fingerprints, photograph, and/or signature) and, at that time, if I am required to provide biometrics, I will be required to sign an oath reaffirming that:</div>';
$pdf->writeHTMLCell(90, 7, 112, 71, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>1)</b> I reviewed and understood all of the information<br>&nbsp;&nbsp;
contained in, and submitted with, my application; and
<br><br>
<b>2)</b> All of this information was complete, true, and<br> &nbsp; &nbsp;
correct at the time of filing</div>';
$pdf->writeHTMLCell(80, 7, 122, 90, $html, 0, 1, false, true, 'L', true);
//......

$pdf->SetFont('times', '', 10);
$html ='<div>I certify, under penalty of perjury, that all of the information in my application and any document submitted with it were provided or authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my application and that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(90, 7, 112, 113, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 142, $html, 0, 1, true, false, 'L', true);

//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b>&nbsp;&nbsp; Applicant\'s Signature </div>';
$pdf->writeHTMLCell(92, 7, 112, 150, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 122, 155, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 166, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('applicant_sign_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 165);
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 112, 154, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill
out this application or fail to submit required documents listed
in the Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(92, 7, 113, 173, $html, 0, 1, false, 'L');

//..........
$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 4. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 191, $html, 1, 0, true, true, 'L', true);
//......
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(91, 7, 112, 204, $html, 0, 1, false, 'L');
//.......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 211,  $html,  0, 1, true, 'L');
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp; Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 218, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 224);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp; Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 233, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_family_given_first_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 239);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 247, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 253);

/********************************
******** End Page No 4 **********
*********************************/

/********************************
******** Start Page No 5 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 4. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 32, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 12, 40, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_mailing_address_street_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 42);
//..........
$pdf->SetFont('times', '', 10);

if(showData('i_765_interpreter_mailing_address_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('i_765_interpreter_mailing_address_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('i_765_interpreter_mailing_address_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

$html= '<div><b>3.b. </b>&nbsp; 
<input type="checkbox" name="Apt" value="Apt" checked="'.$apt_checked.'" /> Apt. &nbsp;
<input type="checkbox" name="Ste" value="Ste" checked="'.$ste_checked.'" /> Ste. &nbsp;
<input type="checkbox" name="Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';

$pdf->writeHTMLCell(90, 7, 12, 51, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_mailing_address_apt_ste_flr_value', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 51);
//.......... 
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 60, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_interpreter_mailing_address_city_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 60);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 12, 69, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="i_765_interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 69, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_interpreter_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 69);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 78, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_interpreter_mailing_address_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 78);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 87, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_interpreter_mailing_address_postal_code', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 87);

$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 92, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_interpreter_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 98);
//..........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 13, 108,  $html,  0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Interpreter\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 12, 117, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_daytime_tel', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 123);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Interpreter\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 12, 130, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 136);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Interpreter\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 12, 144, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 150);
//................

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 13, 160,  $html,  0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html = '<div>I certify, under penalty of perjury, that:<br><br>
I am fluent in English and<br>
which is the same language specified in <b>Part 3., Item
Number 1.b.</b>, and I have read to this applicant in the identified
language every question and instruction on this application and
his or her answer to every question. The applicant informed me
that he or she understands every instruction, question, and
answer on the application, including the <b>Applicant\'s Declaration and 
Certification</b>, and has verified the accuracy of every answer.</div>';
$pdf->writeHTMLCell(92, 7, 12, 167, $html, 0, 0, false, 'L');
$html = '<div>,</div>';
$pdf->writeHTMLCell(92, 7, 103, 176, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_certification_language_skill', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 174);

//........

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 213,  $html,  0, 1, true, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 221, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 22, 227, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 236, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_765_interpreter_sign_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 236);

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 5. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 1, 0, true, true, 'L', true);
//......
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(91, 7, 112, 35, $html, 0, 1, false, 'L');
//.......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparers\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 43,  $html,  0, 1, true, 'L');

//..........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp; Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 50, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 55.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp; Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 63, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_family_given_first_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 68.5);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 112, 76, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 82);

//.......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Preparer\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 91, $html, 0, 0, true, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 99, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_mailing_address_street_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 100);

//..........
$pdf->SetFont('times', '', 10);

if(showData('i_765_preparer_mailing_address_apt_ste_flr')=="apt") $apt_checked = "checked"; else $apt_checked = "";
if(showData('i_765_preparer_mailing_address_apt_ste_flr')=="ste") $ste_checked = "checked"; else $ste_checked = "";
if(showData('i_765_preparer_mailing_address_apt_ste_flr')=="flr") $flr_checked = "checked"; else $flr_checked = "";

$html= '<div><b>3.b. </b>&nbsp; 
<input type="checkbox" name="Apt" value="Apt" checked="'.$apt_checked.'" /> Apt. &nbsp;
<input type="checkbox" name="Ste" value="Ste" checked="'.$ste_checked.'" /> Ste. &nbsp;
<input type="checkbox" name="Flr" value="Flr" checked="'.$flr_checked.'" /> Flr.
</div>';

$pdf->writeHTMLCell(90, 7, 112, 109, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_mailing_address_apt_ste_flr_value', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 109);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_preparer_mailing_address_city_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 118);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 112, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="i_765_preparer_mailing_address_state" size="0.25">';
 foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
  }
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 127);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 136, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_preparer_mailing_address_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 136);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 145, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_preparer_mailing_address_postal_code', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 145);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 151, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_765_preparer_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 157);

//..........

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 113, 167,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Preparers\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 112, 174, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_daytime_tel', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 180);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Preparers\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 188, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 194);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Preparers\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 203, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 209);

/********************************
******** End Page No 5 **********
*********************************/

/********************************
******** Start Page No 6 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 5. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant</b><br>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 13, 42,  $html,  0, 1, true, 'L');

$pdf->SetFont('times', '', 10);

if(showData('i_765_preparer_statement_7a')=="Y") $checkbox_status = "checked"; else $checkbox_status = "";
$html= '<div><b>7.a.<b/> <input type="checkbox" name="i_765_preparer_statement_7a" value="Y" checked="'.$checkbox_status.'" /></div>';

$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am not an attorney or accredited representative<br>
but have prepared this application on behalf of<br>
the applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(100, 7, 24, 50, $html, 0, 0, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
if(showData('i_765_preparer_statement_7b')=="Y") $checkbox_status = "checked"; else $checkbox_status = "";
$html= '<div><b>7.b.<b/> <input type="checkbox" name="i_765_preparer_statement_7b" value="Y" checked="'.$checkbox_status.'" /></div>';

$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 0, false, true, 'J', true);


if(showData('i_765_preparer_statement_7b_extend')=="Y") $checkbox_extend_status = "checked"; else $checkbox_extend_status = "";
if(showData('i_765_preparer_statement_7b_not_extend')=="Y") $checkbox_not_extend_status = "checked"; else $checkbox_not_extend_status = "";

$html= '<div>I am an attorney or accredited representative and <br>
my representation of the applicant in this case<br><input type="checkbox" name="a" value="Y" checked="'.$checkbox_extend_status.'" />  extends <input type="checkbox" name="b" value="Y" checked="'.$checkbox_not_extend_status.'" /> does not extend beyond the<br>

preparation of this application.</div>';
$pdf->writeHTMLCell(79, 7, 24, 65, $html, 0, 0, false, true, 'L', true);
//.........

$html= '<div><b>NOTE:</b> If you are an attorney or accredited<br>
representative, you may be obliged to submit a<br>
completed Form G-28, Notice of Entry of<br>
Appearance as Attorney or Accredited<br>
Representative, with this application.</div>';
$pdf->writeHTMLCell(79, 7, 24, 85, $html, 0, 0, false, true, 'L', true);

//.......

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 13, 112,  $html,  0, 1, true, 'L');

//......

$pdf->SetFont('times', '', 10);
$html= '<div>By my signature, I certify, under penalty of perjury, that I<br>
prepared this application at the request of the applicant. The<br>
applicant then reviewed this completed application and<br>
informed me that he or she understands all of the information<br>
contained in, and submitted with, his or her application,<br>
including the <b>Applicant\'s Declaration and Certification</b>, and<br>
that all of this information is complete, true, and correct. I<br>
completed this application based only on information that the<br>
applicant provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(100, 7, 12, 120, $html, 0, 0, false, true, 'L', true);

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 164,  $html,  0, 1, true, 'L');


//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.a. </b> &nbsp; Preparer\'s Signature </div>';
$pdf->writeHTMLCell(92, 7, 12, 172, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 6, 22, 178, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 187, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_765_preparer_sign_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 187);

/********************************
******** End Page No 6 **********
*********************************/

/********************************
******** Start Page No 7 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1);
$html = '<div><b>Part 6.  &nbsp;Additional Information</b><i></i></div>';
$pdf->writeHTMLCell(91, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>If you need extra space to provide any additional information<br>
within this application, use the space below. If you need more<br>
space than what is provided, you may make copies of this page<br>
to complete and file with this application or attach a separate<br>
sheet of paper. Type or print your name and A-Number (if any)<br>
at the top of each sheet; indicate the <b>Page Number, Part<br>
Number</b>, and <b>Item Number</b> to which your answer refers; and<br>
sign and date each sheet.</div>';
$pdf->writeHTMLCell(120, 7, 12, 26, $html, 0, 1, false, true, 'L', true);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 61);
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 68, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 70);
//.........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 45, 79);
//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 1, false, false, 'L', true);
$pdf->StartTransform();
$pdf->SetFillColor(0, 0, 0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 70, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont('times', '', 11);
$html = '<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 51, 88, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 57.9, 88);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_3a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 103);
//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_3b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 98, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_3c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 103);
//............
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 113, $html, 0, 1, false, false, 'L', true);
//..........
$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 110.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 114.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 118.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 123.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 128, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 132.8, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 137.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 142.2, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 147, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->writeHTMLCell(82, 1, 21.6, 151.5, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->TextField('aditional_info_name_3d', 82.5, 66, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_765_additional_info_3d')), 21.5, 113);
$pdf->setCellHeightRatio(1.2);

//............


$pdf->SetFont('times', '', 10);
$html = '<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_4a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 22, 186);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_4b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 54, 186);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_4c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 186);

//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(82, 1, 21.6, 192, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(82, 1, 21.6, 196.1, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(82, 1, 21.6, 200.7, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(82, 1, 21.6, 205, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(82, 1, 21.6, 208.7, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(82, 1, 21.6, 213, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(82, 1, 21.6, 217, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(82, 1, 21.6, 221, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(82, 1, 21.6, 225, '',  "B",  0, false, false, 'C', true); // line 9
// $pdf->writeHTMLCell(82, 1, 21.6, 231.1, '',  "B",  0, false, false, 'C', true); // line 10
$pdf->writeHTMLCell( 82, 62, 21.6, 195, '', 1,  0, false, false, 'C', false );// line full Box
$pdf->TextField('aditional_info_name_4d', 82.5, 60, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_765_additional_info_4d')), 21.5, 195);
$pdf->setCellHeightRatio(1.2);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_5a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_5b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 154, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_5c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 22);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'L', true);

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 29.1, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 33.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 37.8, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 42.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 46.8, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 51, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 55.8, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 60.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 65.3, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell( 81.6, 58.8, 122.6, 31.8, '', 1,  0, false, false, 'C', false );// line full Box

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_name_5d', 82, 60, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_765_additional_info_5d')), 122.5, 31);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 92.7, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_6a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 98);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 93, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_6b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 98);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 93, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_6c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 98);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>6.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 106, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 104.7, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 109.5, '',  "B",  0, false, false, 'C', true); // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 114.3, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 119.3, '',  "B",  0, false, false, 'C', true); // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 124, '',  "B",  0, false, false, 'C', true);   // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 128.5, '',  "B",  0, false, false, 'C', true); // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 133, '',  "B",  0, false, false, 'C', true);   // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 137.6, '',  "B",  0, false, false, 'C', true); // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 142, '',  "B",  0, false, false, 'C', true);   // line 9
$pdf->writeHTMLCell( 81.6, 60, 122.6, 107, '', 1,  0, false, false, 'C', false );// line full Box

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_name_6d', 82, 60, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_765_additional_info_6d')), 122.5, 107);
$pdf->setCellHeightRatio(1.2);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 168.7, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_7a_page_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 122, 174.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 145, 168.7, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_7b_part_no', 19.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(),  154, 174.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.c.</b> &nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 176, 168.7, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_7c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 184, 174.2);

//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, false, 'L', true);
$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(81.6, 1, 122.6, 181.5, '',  "B",  0, false, false, 'C', true); // line 1
$pdf->writeHTMLCell(81.6, 1, 122.6, 186, '',  "B",  0, false, false, 'C', true);   // line 2
$pdf->writeHTMLCell(81.6, 1, 122.6, 190.5, '',  "B",  0, false, false, 'C', true); // line 3
$pdf->writeHTMLCell(81.6, 1, 122.6, 195, '',  "B",  0, false, false, 'C', true);   // line 4 
$pdf->writeHTMLCell(81.6, 1, 122.6, 199.5, '',  "B",  0, false, false, 'C', true); // line 5
$pdf->writeHTMLCell(81.6, 1, 122.6, 204, '',  "B",  0, false, false, 'C', true);   // line 6
$pdf->writeHTMLCell(81.6, 1, 122.6, 208.5, '',  "B",  0, false, false, 'C', true); // line 7
$pdf->writeHTMLCell(81.6, 1, 122.6, 213, '',  "B",  0, false, false, 'C', true);   // line 8 
$pdf->writeHTMLCell(81.6, 1, 122.6, 217.5, '',  "B",  0, false, false, 'C', true); // line 9
$pdf->writeHTMLCell( 81.6, 58.4, 122.6, 184, '', 1,  0, false, false, 'C', false );// line full Box

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_765_additional_info_name_7d', 82, 58.4, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_765_additional_info_7d')), 122.5, 184);

//..............

$js = "
var fields = {
	
	// Page 1
    'about_you_family_lastname':' ".showData('information_about_you_family_last_name')."',
    'about_you_family_firstname':' ".showData('information_about_you_given_first_name')."',
    'about_you_family_middlename':' ".showData('information_about_you_middle_name')."',
    'information_about_you_other_family_last_name':' ".showData('information_about_you_other_family_last_name')."',
    'information_about_you_other_given_first_name':' ".showData('information_about_you_other_given_first_name')."',
    'information_about_you_other_middle_name':' ".showData('information_about_you_other_middle_name')."',
    'information_about_you_other_family_last_name2':' ".showData('information_about_you_other_family_last_name2')."',
    'information_about_you_other_given_first_name2':' ".showData('information_about_you_other_given_first_name2')."',
    'information_about_you_other_middle_name2':' ".showData('information_about_you_other_middle_name2')."',
    'information_about_you_other_family_last_name3':' ".showData('information_about_you_other_family_last_name3')."',
    'information_about_you_other_given_first_name3':' ".showData('information_about_you_other_given_first_name3')."',
    'information_about_you_other_middle_name3':' ".showData('information_about_you_other_middle_name3')."',
	
	// Page 2
    'information_about_you_us_mail_in_care_name':' ".showData('information_about_you_us_mailing_care_of_name')."',
    'information_about_you_us_mail_street':' ".showData('information_about_you_us_mailing_street_number')."',
    'information_about_you_us_mail_apt_ste_flr':' ".showData('information_about_you_us_mailing_apt_ste_flr_value')."',
    'information_about_you_us_mail_city_town':' ".showData('information_about_you_us_mailing_city_town')."',
    'information_about_you_us_mail_state':' ".showData('information_about_you_us_mailing_state')."',
    'information_about_you_us_mail_zipcode':' ".showData('information_about_you_us_mailing_zip_code')."',

    'about_you_us_physical_street':' ".showData('information_about_you_home_street_number')."',
    'about_you_us_physical_apt_ste_flr':' ".showData('information_about_you_home_apt_ste_flr_value')."',
    'about_you_us_physical_city_town':' ".showData('information_about_you_home_city_town')."',
    'about_you_us_physical_state':' ".showData('information_about_you_home_state')."',
    'about_you_us_physical_zipcode':' ".showData('information_about_you_home_zip_code')."',

    'about_you_alien_reg_number':' ".showData('other_information_about_you_alien_registration_number')."',
    'about_you_uscis_online_ac_number':' ".showData('other_information_about_you_uscis_online_account_number')."',
    'about_you_ssn_number':' ".showData('other_information_about_you_social_security_number')."',

    'about_you_father_lastname':' ".showData('parent1_info_family_last_name')."',
    'about_you_father_firstname':' ".showData('parent1_info_given_first_name')."',

    'about_you_mother_lastname':' ".showData('parent2_info_family_last_name')."',
    'about_you_mother_firstname':' ".showData('parent2_info_given_first_name')."',
    'country1':' ".showData('other_information_about_you_country_of_citizen')."',
    'country2':' ".showData('other_information_about_you_country_of_citizen2')."',
	
	// Page 3
    'about_you_village_of_birth':' ".showData('other_information_about_you_city_of_birth')."',
    'about_you_province_of_birth':' ".showData('other_information_about_you_province_of_birth')."',
    'about_you_country_of_birth':' ".showData('other_information_about_you_country_of_birth')."',
    'about_you_date_of_birth':' ".showData('other_information_about_you_date_of_birth')."',

    'about_you_dept_record_number':' ".showData('i_94_imgt_arrival_record_number')."',
    'about_you_passport_number':' ".showData('other_information_about_you_passport_number')."',
    'about_you_travel_document_number':' ".showData('other_information_about_you_travel_document_number')."',
    'about_you_country_issued_passport':' ".showData('i_94_imgt_country_issuance_passport')."',
    'about_you_passport_expire_date':' ".showData('other_information_about_you_expiry_date_issuance_passport')."',
    'about_you_us_last_arrival_date':' ".showData('i_94_imgt_date_of_last_arival')."',
    'about_you_last_arrival_place':' ".showData('i_94_imgt_city_town')."',
    'about_you_last_arrival_status':' ".showData('information_about_you_place_your_immigration_status')."',
    'about_you_current_arrival_status':' ".showData('information_about_you_place_your_immigration_status_category')."',
    'about_you_sevis_number':' ".showData('information_about_you_place_your_student_exchange_visitor')."',

    'eligibility1':' ".showData('information_about_you_elligability_category1')."',
    'eligibility2':' ".showData('information_about_you_elligability_category2')."',
    'eligibility3':' ".showData('information_about_you_elligability_category3')."',
    'about_you_degree':' ".showData('information_about_you_elligability_degree')."',
    'about_you_employee_everyfy':' ".showData('information_about_you_place_your_employer_name_e_verify')."',
	
    'about_you_employee_everyfy_company_number':' ".showData('information_about_you_place_your_employer_name_e_verify_identification')."',
    'about_you_eligibility_category':' ".showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker')."',
    'about_you_eligibility_category_31a':' ".showData('information_about_you_place_your_employer_name_e_verify_nominigrant_worker_31')."',
    
	// Page 4
	'i_765_applicant_statement_1b_language':' ".showData('i_765_applicant_statement_1b_language')."',
    'i_765_applicant_statement_2_preparer':' ".showData('i_765_applicant_statement_2_preparer')."',
	
    'about_you_date_you_presented_dhs':' ',
    'about_you_location_presented_dhs':' ',
    'about_you_country_claimed_prescution':' ',
    'about_you_explain_didnt_enter':' ',
	
    'applicant_daytime_tel':' ".showData('applicant_daytime_tel')."',
    'applicant_mobile':' ".showData('applicant_mobile')."',
    'applicant_email':' ".showData('applicant_email')."',
    'applicant_sign_date':' ".showData('i_765_applicant_sign_date')."',	
    'i_765_interpreter_family_last_name':' ".showData('i_765_interpreter_family_last_name')."',
    'i_765_interpreter_family_given_first_name':' ".showData('i_765_interpreter_family_given_first_name')."',
    'i_765_interpreter_business_name':' ".showData('i_765_interpreter_business_name')."',
	
	// Page 5
    'i_765_interpreter_mailing_address_street_number':' ".showData('i_765_interpreter_mailing_address_street_number')."',
    'i_765_interpreter_mailing_address_apt_ste_flr_value':' ".showData('i_765_interpreter_mailing_address_apt_ste_flr_value')."',
    'i_765_interpreter_mailing_address_city_town':' ".showData('i_765_interpreter_mailing_address_city_town')."',
    'i_765_interpreter_mailing_address_state':' ".showData('i_765_interpreter_mailing_address_state')."',
    'i_765_interpreter_mailing_address_zip_code':' ".showData('i_765_interpreter_mailing_address_zip_code')."',
    'i_765_interpreter_mailing_address_province':' ".showData('i_765_interpreter_mailing_address_province')."',
    'i_765_interpreter_mailing_address_postal_code':' ".showData('i_765_interpreter_mailing_address_postal_code')."',
    'i_765_interpreter_mailing_address_country':' ".showData('i_765_interpreter_mailing_address_country')."',
    'i_765_interpreter_daytime_tel':' ".showData('i_765_interpreter_daytime_tel')."',
    'i_765_interpreter_mobile':' ".showData('i_765_interpreter_mobile')."',
    'i_765_interpreter_email':' ".showData('i_765_interpreter_email')."',
    'i_765_interpreter_certification_language_skill':' ".showData('i_765_interpreter_certification_language_skill')."',
    'i_765_interpreter_sign_date':' ".showData('i_765_interpreter_sign_date')."',
	
    'i_765_preparer_family_last_name':' ".showData('i_765_preparer_family_last_name')."',
    'i_765_preparer_family_given_first_name':' ".showData('i_765_preparer_family_given_first_name')."',
    'i_765_preparer_business_name':' ".showData('i_765_preparer_business_name')."',	
    'i_765_preparer_mailing_address_street_number':' ".showData('i_765_preparer_mailing_address_street_number')."',
    'i_765_preparer_mailing_address_apt_ste_flr_value':' ".showData('i_765_preparer_mailing_address_apt_ste_flr_value')."',
    'i_765_preparer_mailing_address_city_town':' ".showData('i_765_preparer_mailing_address_city_town')."',
    'i_765_preparer_mailing_address_state':' ".showData('i_765_preparer_mailing_address_state')."',
    'i_765_preparer_mailing_address_zip_code':' ".showData('i_765_preparer_mailing_address_zip_code')."',
    'i_765_preparer_mailing_address_province':' ".showData('i_765_preparer_mailing_address_province')."',
    'i_765_preparer_mailing_address_postal_code':' ".showData('i_765_preparer_mailing_address_postal_code')."',
    'i_765_preparer_mailing_address_country':' ".showData('i_765_preparer_mailing_address_country')."',
    'i_765_preparer_daytime_tel':' ".showData('i_765_preparer_daytime_tel')."',
    'i_765_preparer_mobile':' ".showData('i_765_preparer_mobile')."',
    'i_765_preparer_email':' ".showData('i_765_preparer_email')."',
	
	// Page 6
    'i_765_preparer_sign_date':' ".showData('i_765_preparer_sign_date')."',
	
	// Page 7
    'i_765_additional_info_last_name':' ".showData('i_765_additional_info_last_name')."',
    'i_765_additional_info_first_name':' ".showData('i_765_additional_info_first_name')."',
    'i_765_additional_info_middle_name':' ".showData('i_765_additional_info_middle_name')."',
    'i_765_additional_info_a_number':' ".showData('i_765_additional_info_a_number')."',	
    'i_765_additional_info_3a_page_no':' ".showData('i_765_additional_info_3a_page_no')."',
    'i_765_additional_info_3b_part_no':' ".showData('i_765_additional_info_3b_part_no')."',
    'i_765_additional_info_3c_item_no':' ".showData('i_765_additional_info_3c_item_no')."',
    'i_765_additional_info_4a_page_no':' ".showData('i_765_additional_info_4a_page_no')."',
    'i_765_additional_info_4b_part_no':' ".showData('i_765_additional_info_4b_part_no')."',
    'i_765_additional_info_4c_item_no':' ".showData('i_765_additional_info_4c_item_no')."',
    'i_765_additional_info_5a_page_no':' ".showData('i_765_additional_info_5a_page_no')."',
    'i_765_additional_info_5b_part_no':' ".showData('i_765_additional_info_5b_part_no')."',
    'i_765_additional_info_5c_item_no':' ".showData('i_765_additional_info_5c_item_no')."',
    'i_765_additional_info_6a_page_no':' ".showData('i_765_additional_info_6a_page_no')."',
    'i_765_additional_info_6b_part_no':' ".showData('i_765_additional_info_6b_part_no')."',
    'i_765_additional_info_6c_item_no':' ".showData('i_765_additional_info_6c_item_no')."',
    'i_765_additional_info_7a_page_no':' ".showData('i_765_additional_info_7a_page_no')."',
    'i_765_additional_info_7b_part_no':' ".showData('i_765_additional_info_7b_part_no')."',
    'i_765_additional_info_7c_item_no':' ".showData('i_765_additional_info_7c_item_no')."',



    
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
$pdf->Output('i-765.pdf', 'I');