<?php
require_once("config.php");

$allDataCountry = indexByQueryAlldata("SELECT * FROM countries");

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
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form G-639   06/20/19", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/G-639-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 264.5, true);
		
        // Page number
		//$created_date = date("F d, Y");
		//$this->Cell(40, 4, 'Form N-400 Edition 09/17/19');
		
 		// $this->write2DBarcode('N-400|09/17/19|1', 'PDF417', 20, 120, 0, 20, $style, 'N');
		
 		// $this->write2DBarcode('test');
		
        // set style for barcode
        /* $style = array(
            'border' => 0,
            'vpadding' => '0',
            'hpadding' => '0',
			'stretch' => true,
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 22, // width of a single module in points
            'module_height' => 2.5, // height of a single module in points
        ); */
        // set a barcode on the page footer
        //$this->setBarcode(date('Y-m-d H:i:s'));
		
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018    ', $single_border_top, 0, 0);
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018', 1, 0, 'L');
		// $this->MultiCell(60, 4,'1025GEJ Approved February 26, 2018','T','L',1,0);
		
		// $this->MultiCell(60, 4,'Ex Parte Motion for Alternative Service','T','C',1,0);
		
        // $this->write2DBarcode('N-400|09/17/19|'.$this->getAliasNumPage(), 'PDF417', 65, 265, 95, 0, $style, '');
		
		
		 
		/* $logoX = 186; // 186mm. The logo will be displayed on the right side close to the border of the page
		$logoFileName = "barcode_1.jpg";
		$logoWidth = 15; // 15mm
		$logo = $this->PageNo() . ' | '. $this->Image($logoFileName, $logoX, $this->GetY()+2, $logoWidth);
 */

		// define barcode style
		/* $style = array(
			'position' => '',
			'align' => '',
			'stretch' => true,
			'fitwidth' => false,
			'cellfitalign' => '',
			'border' => true,
			'hpadding' => 'auto',
			'vpadding' => 'auto',
			'fgcolor' => array(0,0,128),
			'bgcolor' => array(255,255,128),
			'text' => true,
			'label' => '',
			'font' => 'helvetica',
			'fontsize' => 12,
			'stretchtext' => 4
		);

		// CODE 39 EXTENDED + CHECKSUM
		// $pdf->SetLineStyle(array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0)));
		// $this->write1DBarcode('tt', 'C39E+', '', '', 40, 15, 0.4, $style, '0');
		$this->write2DBarcode('N-400|09/17/19|', 'PDF417', 65, 265, 55, 25, $style, '0'); */
		
        // $this->Cell(80, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 1, 0, 'R', 0, '', 0, false, 'L', 'R');
        
    }
}

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// $pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);

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
$logo = 'images/homeland_security_logo.png';
$pdf->Image($logo, 12, 9, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

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
$pdf->MultiCell(40, 5, "OMB No. 1615-0102\nExpires 06/30/2022", 0, 'C', 0, 1, 169, 18.5, true);

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



$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> Use of this form is optional. USCIS accepts any
written request, regardless of format, provided that the request
complies with the applicable requirements under the FOIA and
the Privacy Act. However, using this form can help ensure we
have the appropriate information to handle your request.';
$pdf->writeHTMLCell(90, 7, 11.6, 33, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b> START HERE - Type or print in black ink.</b>';
$pdf->writeHTMLCell(90, 7, 16, 55, $html, '', 0, 0, true, 'L');
//..........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 99, false); 
$pdf->StopTransform();
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Type of Request</b></div>';
$pdf->writeHTMLCell(90, 6, 12.9, 64, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'Select <b>only one</b> box';
$pdf->writeHTMLCell(90, 7, 11.5, 72, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>Note:</b> &nbsp;If you are filing this request on behalf of another
individual, respond as it would apply to that individual.';
$pdf->writeHTMLCell(90, 7, 11.5, 78, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. </b> <input type="checkbox" name="part2_1a" value="Y" checked=" " /> &nbsp;Freedom of Information Act (FOIA)/Privacy Act (PA)</div>';
$pdf->writeHTMLCell(95, 7, 11.5, 88, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b. </b> <input type="checkbox" name="part2_1b" value="Y" checked=" " /> &nbsp;Amendment of Record (PA only)</div>';
$pdf->writeHTMLCell(95, 7, 11.5, 94, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Requestor Information</b></div>';
$pdf->writeHTMLCell(90, 6, 12.9, 105, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1. </b>  &nbsp; &nbsp;&nbsp;Are you the Subject of Record for this request?</div>';
$pdf->writeHTMLCell(95, 7, 11.5, 113, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part2_1" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part2_1" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 119, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 1</b>., skip to <b>Part 3.</b> If
<br>you answered "No" to  <b>Item Number 1</b>., provide the information requested in <b>Part 2., Item Numbers 2.a. - 3.c.</b></div>';
$pdf->writeHTMLCell(91, 7, 11.7, 125, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Representative Role to the Subject of Record</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 142, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div>Select your representative role to the Subject of the Record.</div>';
$pdf->writeHTMLCell(91, 7, 11.9, 150, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a. </b> <input type="checkbox" name="part2_2a" value="Y" checked=" " /> &nbsp;An Attorney</div>';
$pdf->writeHTMLCell(95, 7, 11.9, 157, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b. </b> <input type="checkbox" name="part2_2b" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(95, 7, 11.9, 163, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp;An Accredited Representative of a Qualified
<br>&nbsp; Organization</div>';
$pdf->writeHTMLCell(95, 7, 23, 163, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b> <input type="checkbox" name="part2_2c" value="Y" checked=" " /> &nbsp;A Family Member</div>';
$pdf->writeHTMLCell(95, 7, 11.9, 172, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Select the appropriate box to provide further information regarding your representative role to the Subject of the Record. </div>';
$pdf->writeHTMLCell(93, 7, 12, 180, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a. </b> <input type="checkbox" name="part2_3a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(95, 7, 11.9, 191, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp; I am requesting information on behalf of my child or <br>&nbsp; &nbsp;a minor I have guardianship over.</div>';
$pdf->writeHTMLCell(95, 7, 23, 191, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b. </b> <input type="checkbox" name="part2_3b" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(95, 7, 11.9, 202, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp; I am requesting information on behalf of someone<br>
&nbsp; &nbsp;who is deceased.</div>';
$pdf->writeHTMLCell(95, 7, 23, 202, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c. </b> <input type="checkbox" name="part2_3c" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(95, 7, 11.9, 212, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp; I am requesting information on behalf of someone for
<br>&nbsp; &nbsp;whom I have power of attorney.</div>';
$pdf->writeHTMLCell(95, 7, 23, 212, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Requestor\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 33, $html, 0, 1, true, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 41, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_info_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 42);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 49, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_info_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 50);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 113, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_info_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 58);

//.............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Requestor\'s Mailing Address</i></b></div>';
$pdf->writeHTMLCell(89.5, 7, 113.5, 68, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 113, 76, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_incare', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 80.5);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 88, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 89);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c. </b>&nbsp;  <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 113, 99, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 97);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 107, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 105);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 113, $html, '', 0, 0, true, 'L');

$html = '<select name="requestor_mailing_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 113, $html, '', 0, 0, true, 'L');
$html= '<div><b>5.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 113, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 113);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 122, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_mailing_address_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 121);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.h.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_mailing_address_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 129);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.i.</b> &nbsp;&nbsp; Country';
$pdf->writeHTMLCell(90, 7, 113, 136, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 141);
//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Requestor\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(89.5, 7, 113.5, 151, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp; &nbsp;Requestor\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112.5, 158, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 163);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp; Requestor\'s  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112.5, 170, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 175);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp; Requestor\'s Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 112.5, 182, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('requestor_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 187);
//...............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Requestor\'s Certification</i></b></div>';
$pdf->writeHTMLCell(89.5, 7, 113.5, 198, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I consent to pay all costs incurred for search,
duplication, and review of documents up to <b>$25</b>. (See the <b>What<br>Is the Filing Fee</b> section in the Form G-639 Instructions for

more information.)
</div>';
$pdf->writeHTMLCell(93, 7, 112.5, 205, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.</b>&nbsp;&nbsp;&nbsp;&nbsp; Requestor\'s Signature
</div>';
$pdf->writeHTMLCell(90, 7, 112.5, 223, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 112.5, 227, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(81, 7, 122, 228, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.</b>&nbsp;&nbsp;&nbsp;&nbsp; Date of Signature (mm/dd/yyyy)
</div>';
$pdf->writeHTMLCell(90, 7, 112.5, 236, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('requestor_certification_date_of_signature', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 236);
//..............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Description of Records Requested</b></div>';
$pdf->writeHTMLCell(91, 6, 12.9, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 9.5);
$html ='<div>While you are not required to respond to every <b>Item Number</b> in
<b>Part 3</b>., failure to provide complete and specific information may
delay processing of your request or prevent U.S. Citizenship and
Immigration Services 
(USCIS) from locating the records or
information requested.
</div>';
$pdf->writeHTMLCell(92, 7, 12, 25, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 9.5);
$html ='<div><b>1.  </b> &nbsp;State the purpose of your request.
</div>';
$pdf->writeHTMLCell(92, 7, 12, 46, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> This field is optional. However, providing this<br>
information may assist USCIS in locating the records and
<br>information needed to respond to your request.
</div>';
$pdf->writeHTMLCell(95, 7, 18, 52, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="20" rows="7" name="description_state_purpose">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 18, 64, $html, 0, 0, false, 'L');
//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Full Name of the Subject of Record</i></b></div>';
$pdf->writeHTMLCell(89.5, 7, 14, 96, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 104, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_name_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 105);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 112, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 113);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 121, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 121);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Other Names Used by the Subject of Record </i></b>(if any)</div>';
$pdf->writeHTMLCell(90, 7, 14, 130, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Provide all other names the Subject of Record has ever used, including aliases, maiden name, and nicknames. If you need extra space to complete this section, use the space provided in </div>';
$pdf->writeHTMLCell(92, 7, 13, 138, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>Part 6. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 150, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 155, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 156);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 163, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 164);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 173, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 172);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 180, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_last_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 181);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 188, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_first_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 189);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 198, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_middle_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 197);
//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Full Name of the Subject of Record at Time of Entry into the United States</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 207, $html, 0, 1, true, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 218, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_last_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 219);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 227, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_first_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 228);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 238, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_middle_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 237);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Other Names Used by the Subject of Record </i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 18, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.</b> &nbsp;&nbsp; Form 1-94 Arrival-Departure Record Number <i></i></div>';
$pdf->writeHTMLCell(90, 7, 112, 26, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 120, 92, false); // angle 1
$pdf->StopTransform();
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_form_194', 61.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 31);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b> &nbsp;&nbsp; Passport or Travel Document Number <i></i></div>';
$pdf->writeHTMLCell(90, 7, 112, 38, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_passport_travel', 82.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 43);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b> &nbsp; &nbsp; &nbsp; Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 51, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 128, 122, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 152, 56, $html, 0, 1, false, false, 'L', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_alien_registration', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 158, 56);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b> &nbsp; &nbsp; &nbsp; USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 64, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 119, 130, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_account', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 69);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.</b> &nbsp; &nbsp; &nbsp; Application or Petition Receipt Number
</div>';
$pdf->writeHTMLCell(90, 7, 112, 76, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 115, 140, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_application', 66, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 138, 81);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Information About Family Members that May
Appear on Requested Records </i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 92, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>For example, provide the requested information about a spouse
or children. If you need extra space to complete this section,
<br>use the space provided in <b>Part 6. Additional Information.</b> </div>';
$pdf->writeHTMLCell(93, 7, 112, 103, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 1</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 116, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 112, 122, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 122);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 112, 131, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 131);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 112, 141, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 140);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.  </b>  &nbsp; &nbsp;Relationship  </div>';
$pdf->writeHTMLCell(90, 7, 112, 147, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_relationship', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 152);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Family Member 2</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 160, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 112, 166, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 166);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 112, 174, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 174);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 182);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.  </b>  &nbsp; &nbsp;Relationship  </div>';
$pdf->writeHTMLCell(90, 7, 112, 189, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_relationship1', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 194);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Parents\' Names for the Subject of Record</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 204, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>Father</b></div>';
$pdf->writeHTMLCell(93, 7, 112, 213, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 218, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 219);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 227, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 228);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 113, 238, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 237);
//..........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Description of Records Requested</b> (continued) </div>';
$pdf->writeHTMLCell(91, 6, 12.9, 18, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>Mother</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 30, $html, 0, 1, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 36, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_last_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 37);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_first_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 46);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 56, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_middle_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 55);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.d.  </b>  Middle Name (if applicable) </div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('parent_name_middle_name_applicable', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 68);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.  </b>   </div>';
$pdf->writeHTMLCell(90, 7, 12, 76, $html, 0, 1, false, false, 'L', true);



$pdf->SetFont('times', '', 10);
$html ='<div>Describe the records you are seeking. If you need <br>additional space, use the space provided in <b>Part 6.
<br>Additional Information.</b>  </div>';
$pdf->writeHTMLCell(90, 7, 21, 76, $html, 0, 1, false, true, 'L', true);
//............

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="19" rows="7" name="description_records_seeking">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 21, 89, $html, 0, 0, false, 'L');
//..............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Verification of Identity and Subject of
Record Consent</b> </div>';
$pdf->writeHTMLCell(90, 7, 14, 122, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the information requested in <b>Item Numbers 1.a. - 7.</b>
In addition, the Subject of Record <b>MUST</b> sign in <b>Item
Numbers 8.a. - 8.c.</b>  </div>';
$pdf->writeHTMLCell(90, 7, 13, 134, $html, 0, 1, false, true, 'L', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Full Name of the Subject of Record</i></b></div>';
$pdf->writeHTMLCell(90, 7, 14, 151, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 159, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_name_record_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 160);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 168, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_name_record_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 169);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 179, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('full_name_record_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 178);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Other Information for the Subject of Record</i></b></div>';
$pdf->writeHTMLCell(90, 7, 14, 190, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>  &nbsp; &nbsp;Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell(90, 7, 13, 200, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 64, 199);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.  </b>  &nbsp; &nbsp;Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 13, 207, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_country_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 212);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Mailing Address for the Subject of Record</i></b></div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 113, 26, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_incare', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 31);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 39, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_street_number_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 40);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c. </b>&nbsp;  <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 113, 50, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_apt_ste_flr', 44.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 49);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 59, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_city_town', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 58);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.e.</b> &nbsp;&nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 68, $html, '', 0, 0, true, 'L');

$html = '<select name="mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129, 68, $html, '', 0, 0, true, 'L');
$html= '<div><b>5.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 68, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_address_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 67);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 76, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 76);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.h.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 86, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 85);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.i.</b> &nbsp;&nbsp; Country';
$pdf->writeHTMLCell(90, 7, 113, 94, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 99);
//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Contact Information for the Subject of Record
</i></b></div>';
$pdf->writeHTMLCell(90, 7, 114, 110, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>NOTE:</b> &nbsp;Providing this information is optional.';
$pdf->writeHTMLCell(90, 7, 113, 118, $html, '', 0, 0, true, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp;  Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 125, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('contact_info_daytime', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 130);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp;  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 113, 138, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('contact_info_mobile', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 143);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b>&nbsp;&nbsp;&nbsp; Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 113, 152, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('contact_info_email', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 157);
//...............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Verification of Identity and Subject of
Record Consent</b> (continued) </div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Signature of the Subject of Record
</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 34, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Select <b>only one</b> box.
</div>';
$pdf->writeHTMLCell(90, 7, 12, 42, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> The Subject of Record <b>MUST</b> provide a signature in
<b>Item Number 8.a. OR Item Number 8.b.</b> If the Subject of
Record is deceased, select <b>Item Number 8.c.</b> and attach an
obituary, death certificate, or other proof of death.

</div>';
$pdf->writeHTMLCell(90, 7, 12, 48, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.   </b>    <input type="checkbox" name="8a" value="Y" checked=" " /> 
<b>&nbsp;Notarized Affidavit of Identity</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 66, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>IMPORTANT:</b> Do <b>NOT</b> sign and date below until
the notary public provides instructions to you.

</div>';
$pdf->writeHTMLCell(80, 7, 25, 72, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I consent to USCIS releasing the
requested records to the requestor (if applicable)
named in <b>Part 2.</b> If filing this request on my own

behalf, I also consent to pay all costs incurred for
search, duplication, and review of documents up to
<b>$25.</b> (See the <b>What Is the Filing Fee</b> section in the
Form G-639 Instructions for more information.)

</div>';
$pdf->writeHTMLCell(80, 7, 25, 82.5, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 115, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 115, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Signature of Subject of Record</div>';
$pdf->writeHTMLCell(80, 7, 40, 119, $html, 0, 1, false, true, 'J', true);



$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 130, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 130, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 40, 134, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Subscribed and sworn to before me on this ________</div>';
$pdf->writeHTMLCell(80, 7, 25, 144, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>day of _________________ in the year __________.</div>';
$pdf->writeHTMLCell(80, 7, 25, 151, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Daytime Telephone Number ___________________ </div>';
$pdf->writeHTMLCell(80, 7, 25, 160, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 170, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 170, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div>Signature of Notary</div>';
$pdf->writeHTMLCell(80, 7, 46, 174, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 183, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>___________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 25, 183, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div>My Commission Expires on (mmddyyyy)</div>';
$pdf->writeHTMLCell(80, 7, 33, 187, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.   </b>    <input type="checkbox" name="8b" value="Y" checked=" " /> 
<b>&nbsp;Declaration Under Penalty of Perjury</b> </div>';
$pdf->writeHTMLCell(90, 7, 114, 19, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I consent to USCIS releasing the
requested records to the requestor (if applicable)
named in <b>Part 2.</b> If filing this request on my own behalf, I also consent to pay all costs incurred for
search, duplication, and review of documents up to
<b>$25.</b> (See the <b>What Is the Filing Fee</b> section in the
Form G-639 Instructions for more information.)</div>';
$pdf->writeHTMLCell(75, 7, 128, 25, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>I certify, swear, or affirm, under penalty of perjury under the laws of the United States of America, that
the information in this request is complete, true, and
correct. </div>';
$pdf->writeHTMLCell(75, 7, 128, 55, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>__________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 128, 76, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>__________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 128, 76, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Signature of Subject of Record</div>';
$pdf->writeHTMLCell(80, 7, 142, 80, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>__________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 128, 89, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>__________________________________________</div>';
$pdf->writeHTMLCell(80, 7, 128, 89, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 141, 93, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.c.   </b>    <input type="checkbox" name="8c" value="Y" checked=" " /> 
<b>&nbsp;Deceased Subject of Record</b> </div>';
$pdf->writeHTMLCell(90, 7, 114, 100, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Description of Records Requested</b></div>';
$pdf->writeHTMLCell(91, 6, 114.5, 110, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b> </div>';
$pdf->writeHTMLCell(80, 7, 114, 119, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Indicate if any of these circumstances apply to your
request (Select all that apply). </div>';
$pdf->writeHTMLCell(80, 7, 122, 119, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 12);
$html ='<div><b>  <input type="checkbox" name="part5_1a" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 120, 130, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Circumstances in which the lack of expedited
<br>treatment could reasonably be expected to pose an
<br>imminent threat to the life or physical safety of the
<br>individual.</div>';
$pdf->writeHTMLCell(90, 7, 129, 130, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 12);
$html ='<div><b>  <input type="checkbox" name="part5_1b" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 120, 148, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>An urgency to inform the public about an actual or
<br>alleged Federal government activity , if made by a <br>person primarily engaged in disseminating <br>information.
</div>';
$pdf->writeHTMLCell(88, 7, 129, 148, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 12);
$html ='<div><b>  <input type="checkbox" name="part5_1c" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 120, 167, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>The loss of substantial due process rights.
</div>';
$pdf->writeHTMLCell(88, 7, 129, 167, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 12);
$html ='<div><b>  <input type="checkbox" name="part5_1d" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 120, 174, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>A matter of widespread and exceptional media
<br>interest in which there exists possible questions about
<br>the government\'s integrity which affects public
<br>confidence.
</div>';
$pdf->writeHTMLCell(88, 7, 129, 174, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Submit a certified, detailed statement regarding the basis for
your request with your Form G-639.
</div>';
$pdf->writeHTMLCell(88, 7, 114.5, 192, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.     </b> &nbsp;Do you have a pending Immigration Court hearing date?

</div>';
$pdf->writeHTMLCell(88, 7, 114.5, 202, $html, 0, 1, false, true, 'J', true);
//...............

$html ='<div><input type="checkbox" name="part5_2" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part5_2" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 180, 208, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 2</b>., submit a copy of

one of the following documents with your Form G-639: 1-862,
Notice to Appear, Form 1-122, Order to Show Cause; Form
1-863, Note of Referral to Immigration Judge, or submit a
written notice of continuation of a future scheduled hearing
before the immigration judge.
</div>';
$pdf->writeHTMLCell(90, 7, 114.5, 215, $html, 0, 1, false, true, 'J', true);
//...............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1
//.............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7.  &nbsp;Additional Information</b><i></i></div>';
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
$pdf->writeHTMLCell(91, 7, 12, 26, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. </b> &nbsp; Subject of Record\'s Family Name (last Name)</div>';
$pdf->writeHTMLCell(91, 7, 12, 59, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_info_family_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 64);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b. </b> &nbsp; Subject of Record\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(91, 7, 12, 71, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_info_given_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 76);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c. </b> &nbsp; Subject of Record\'s Middle Name </div>';
$pdf->writeHTMLCell(91, 7, 12, 83, $html, 0, 1, false, true, 'J', true);
//...............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('add_info_middle_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 88);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>  &nbsp;&nbsp;&nbsp;Subject of Record\'s A-Number <i>(if any)</i>  </div>';
$pdf->writeHTMLCell(90, 7, 12, 96, $html, 0, 1, false, false, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 43, 83, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<b>A-</b>';
$pdf->writeHTMLCell(90, 7, 51, 102, $html, 0, 1, false, false, 'L', true);

$pdf->writeHTMLCell(45, 7, 57.9, 102, '',  1,  1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a. </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 10, 111, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_page_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 117);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 43, 111, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_part_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 117);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 111, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_item_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 117);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 10, 125, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="20" rows="15" name="aditional_inf0_name_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 18, 125, $html, 0, 0, false, 'L');

//............


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a. </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 10, 185, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_page_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 190);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 43, 185, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_part_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 190);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 185, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_item_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 190);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 10, 201, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="20" rows="16" name="aditional_inf0_name_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 18, 199, $html, 0, 0, false, 'L');

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b> &nbsp; Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number2', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124, 22);

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
$html = <<<EOD
<textarea cols="19" rows="16" name="additional_info_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123, 31, $html, 0, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.   </b> &nbsp; Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number3', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 125, 103);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 146, 98, $html, 0, 1, false, false, 'L', true);

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
$html = <<<EOD
<textarea cols="19" rows="17" name="additional_info_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123.5, 111, $html, 0, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b> &nbsp; Page Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_page_number4', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124.5, 186);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 146, 181, $html, 0, 1, false, false, 'L', true);

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
$html = <<<EOD
<textarea cols="19" rows="17" name="additional_info_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123.5, 194, $html, 0, 0, false, 'L');
//..............






































































































































$js = "
var fields = {

    'requestor_info_last_name':' ',
    'requestor_info_first_name':' ',
    'requestor_info_middle_name':' ',
    'requestor_mailing_incare':' ',
    'requestor_mailing_street_number_name':' ',
    'requestor_mailing_apt_ste_flr':' ',
    'requestor_mailing_city_town':' ',
    'requestor_mailing_state':' ',
    'requestor_mailing_zipcode':' ',
    'requestor_mailing_address_province':' ',
    'requestor_mailing_address_postal_code':' ',
    'requestor_mailing_address_country':' ',
    'requestor_contact_info_daytime':' ',
    'requestor_contact_info_mobile':' ',
    'requestor_contact_info_email':' ',
    'requestor_certification_date_of_signature':' ',
    'full_name_last_name':' ',
    'full_name_first_name':' ',
    'full_name_middle_name':' ',
    'description_state_purpose':' ',
    'other_name_last_name':' ',
    'other_name_first_name':' ',
    'other_name_middle_name':' ',
    'other_name_last_name1':' ',
    'other_name_first_name1':' ',
    'other_name_middle_name1':' ',
    'other_name_last_name2':' ',
    'other_name_first_name2':' ',
    'other_name_middle_name2':' ',
    'other_name_form_194':' ',
    'other_name_passport_travel':' ',
    'other_name_alien_registration':' ',
    'other_name_account':' ',
    'other_name_application':' ',
    'info_about_last_name':' ',
    'info_about_first_name':' ',
    'info_about_middle_name':' ',
    'info_about_relationship':' ',
    'info_about_last_name1':' ',
    'info_about_first_name1':' ',
    'info_about_middle_name1':' ',
    'info_about_relationship1':' ',
    'parent_name_last_name':' ',
    'parent_name_first_name':' ',
    'parent_name_middle_name':' ',
    'parent_name_last_name1':' ',
    'parent_name_first_name1':' ',
    'parent_name_middle_name1':' ',
    'parent_name_middle_name_applicable':' ',
    'description_records_seeking':' ',
    'full_name_record_last_name':' ',
    'full_name_record_first_name':' ',
    'full_name_record_middle_name':' ',
    'other_info_date_of_birth':' ',
    'other_info_country_of_birth':' ',
    'mailing_address_incare':' ',
    'mailing_address_street_number_name':' ',
    'mailing_address_apt_ste_flr':' ',
    'mailing_address_city_town':' ',
    'mailing_address_state':' ',
    'mailing_address_zipcode':' ',
    'mailing_address_province':' ',
    'mailing_address_postal_code':' ',
    'mailing_address_country':' ',
    'contact_info_daytime':' ',
    'contact_info_mobile':' ',
    'contact_info_email':' ',
    'add_info_family_name':' ',
    'add_info_given_name':' ',
    'add_info_middle_name':' ',
    'additional_info_name_page_number':' ',
    'additional_info_name_part_number':' ',
    'additional_info_name_item_number':' ',
    'aditional_inf0_name_3d':' ',
    'additional_info_name_page_number1':' ',
    'additional_info_name_part_number1':' ',
    'additional_info_name_item_number1':' ',
    'aditional_inf0_name_4d':' ',
    'additional_info_page_number2':' ',
    'additional_info_part_number2':' ',
    'additional_info_item_number2':' ',
    'aditional_inf0_5d':' ',
    'additional_info_page_number3':' ',
    'additional_info_part_number3':' ',
    'additional_info_item_number3':' ',
    'aditional_inf0_6d':' ',
    'additional_info_page_number4':' ',
    'additional_info_part_number4':' ',
    'additional_info_item_number4':' ',
    'aditional_inf0_7d':' ',
    '':' ',
    '':' ',
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