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
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(191.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('times', '', 9);
		
		$this->Cell(40, 6, "Form I-102 Edition 04/01/24", 0, 0, 'L');
		
		
		// if ($this->page == 1){
            
		$barcode_image = "images/i102/I-102-footer-pdf417-$this->page.png";
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
$pdf->SetTitle('Form I-102');

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
$pdf->SetFont('times', 'B', 14);	// set font
$pdf->MultiCell(120, 15, "Application for Replacement/Initial Nonimmigrant Arrival-Departure Document", 0, 'C', 0, 1, 47, 4, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-102", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0079\nExpires 02/28/2026", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->writeHTMLCell(147, 55, 13, 32, "", 1, 1, true, false, 'C', true);
$pdf->SetFillColor(222,222,222);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(13, 54.9, 13, 32, "", "TLR", 0, true, true, 'C', true);
$pdf->writeHTMLCell(15, 39, 11.5, 47, "For USCIS <br> Use Only", 0, 0, false, true, 'C', true);
$pdf->writeHTMLCell(134, 2, 26, 77.5, "", "T", 0, false, false, 'C', true);
$pdf->writeHTMLCell(63, 2, 26, 62, "", "T", 0, false, false, 'C', true);
$pdf->writeHTMLCell(1, 45.5, 88, 32, "", "R", 0, false, true, 'C', true);
$pdf->writeHTMLCell(40.9, 2, 162, 65, "", "T", 0, false, false, 'C', true);

$pdf->writeHTMLCell(41.3, 55, 162, 32, "", 1, 1, false, false, 'C', true);

//.........
$pdf->SetFont('times', 'B', 10);
$html ='<div>Receipt</div>';
$pdf->writeHTMLCell(20, 30, 38, 32, $html,  0,  1, false, true, 'R', false);
//......
$pdf->SetFont('times', 'B', 10);
$html ='<div>New I-94 Number</div>';
$pdf->writeHTMLCell(30, 30, 38, 62, $html,  0,  1, false, true, 'R', false);
//......
$pdf->SetFont('times', 'B', 10);
$html ='<div>Action Block</div>';
$pdf->writeHTMLCell(30, 30, 103, 32, $html,  0,  1, false, true, 'R', false);
//......
$pdf->SetFont('times', 'B', 10);
$html ='<div>Remarks</div>';
$pdf->writeHTMLCell(20, 30, 21, 78, $html,  0,  1, false, true, 'R', false);
//..........

$pdf->SetFont('times', 'B', 10);
$html ='<div>To Be Completed by an <i>Attorney or Accredited Representative,</i> <br>If any.</div>';
$pdf->writeHTMLCell(40, 30, 163, 33, $html,  0,  1, false, true, 'C', false);
//.......

$pdf->SetFont('times', '', 13);
$html ='<div><b>  </b>   <input type="checkbox" name="attached" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 15, 142, 48, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Select this box if Form <br>G-28 is attached to <br>represent the applicant.</div>';
$pdf->writeHTMLCell(60, 15, 168, 50, $html,  0,  1, false, true, 'L', false);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>Attorney State <br>License Number</div>';
$pdf->writeHTMLCell(60, 15, 153, 66, $html,  0,  1, false, true, 'C', false);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_license_number', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 165, 76);

//..........
//..........table end

$pdf->SetFont('times', 'B', 10);

$pdf->Image('images/right_angle.jpg', 13, 88.5, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

$html ='<div>START HERE.</div>';
$pdf->writeHTMLCell(60, 15, 17, 88, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 11);
$html ='<div>Type or print in black ink</div>';
$pdf->writeHTMLCell(60, 15, 43, 88, $html,  0,  1, false, true, 'L', false);
//......

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 93, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number)</div>';
$pdf->writeHTMLCell(90, 7, 13, 102, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 42, 87, false); 
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<div><b>A-</b></div>';
$pdf->writeHTMLCell(90, 7, 52, 107, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_alien_reg', 44.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 59, 106);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 13, 115, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 32, 106, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_uscis_online',62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 41, 119);
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Your Full Legal Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 130, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 138, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_legal_name_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 139);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_legal_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 148);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 158, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_legal_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 157);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Names Used (if any)</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 168, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide all other names used. Include nicknames, aliases,<br>maiden name, and names from previous marriages. Provide
<br>evidence of any name changes.</div>';
$pdf->writeHTMLCell(90, 7, 12, 175, $html, 0, 1, false, false, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_names_used_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 191);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 199, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_names_used_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 200);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 210, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_names_used_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 209);
//..........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 220, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  In Care Of Name   </div>';
$pdf->writeHTMLCell(90, 7, 13, 228, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing__incare', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22.5, 233);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b>&nbsp;&nbsp;&nbsp;Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 91, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_street_number_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122.5, 96);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 113, 105, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),160, 105);
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 114, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145.5, 114);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 123, $html, '', 0, 0, true, 'L');

$html = '<select name="us_mailing_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 123, $html, '', 0, 0, true, 'L');
$html= '<div><b>5.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 123, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171.5, 123);
//............

$pdf->SetFont('times', '', 10); 
$html= '<div><b>6.</b></div>';
$pdf->writeHTMLCell(50, 4, 113, 131, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); 
$html= '<div>Is your current U.S. mailing address the same as your <br>U.S. physical address?</div>';
$pdf->writeHTMLCell(90, 7, 120, 131, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="us_6" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="us_6" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 175, 136, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); 
$html= '<div>If you answered "No" to <b>Item Number 6</b>., provide your
<br>U.S. physical address in <b>Item Numbers 7.a. - 7.f.</b></div>';
$pdf->writeHTMLCell(90, 7, 120, 142, $html, '', 0, 0, true, 'L');
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 156, $html, 0, 1, true, false, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b>  In Care Of Name   </div>';
$pdf->writeHTMLCell(90, 7, 112, 165, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical__in_care', 82.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120.5, 170);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.</b>&nbsp;&nbsp;&nbsp;Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 178, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_street_number_name', 81.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 183);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 192, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),160, 192);
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 201, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145.5, 201);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 112, 210, $html, '', 0, 0, true, 'L');

$html = '<select name="us_physical_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 210, $html, '', 0, 0, true, 'L');
$html= '<div><b>7.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 210, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171.5, 210);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 220, $html, 0, 1, true, false, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b> &nbsp; Date of Birth&nbsp;&nbsp;&nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 229, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_date_birth', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172, 229);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.</b> &nbsp; &nbsp;&nbsp;Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 113, 235, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 11);
$pdf->ComboBox('other_info_country_birth', 83, 7, array(
'Afghanistan',
'Albania',
'Algeria',
'American Samoa',
'Andorra',
'Angola',
'Anguilla',
'Antarctica',
'Antigua and Barbuda',
'Argentina',
'Armenia',
'Aruba',
'Australia',
'Austria',
'Azerbaijan',
'Bahamas',
'Bahrain',
'Bangladesh',
'Barbados',
'Belarus',
'Belgium',
'Belize',
'Benin',
'Bermuda',
'Bhutan',
'Bolivia, Plurinational State of',
'Bonaire, Sint Eustatius and Saba',
'Bosnia and Herzegovina',
'Botswana',
'Bouvet Island',
'Brazil',
'British Indian Ocean Territory',
'Brunei Darussalam',
'Bulgaria',
'Burkina Faso',
'Burundi',
'Cambodia',
'Cameroon',
'Canada',
'Cape Verde',
'Cayman Islands',
'Central African Republic',
'Chad',
'Chile',
'China',
'Christmas Island',
'Cocos (Keeling) Islands',
'Colombia',
'Comoros',
'Congo',
'Congo, the Democratic Republic of the',
'Cook Islands',
'Costa Rica',
'Croatia',
'Cuba',
'Curaçao',
'Cyprus',
'Czech Republic',
'Cote d\'Ivoire',
'Denmark',
'Djibouti',
'Dominica',
'Dominican Republic',
'Ecuador',
'Egypt',
'El Salvador',
'Equatorial Guinea',
'Eritrea',
'Estonia',
'Ethiopia',
'Falkland Islands (Malvinas)',
'Faroe Islands',
'Fiji',
'Finland',
'France',
'French Guiana',
'French Polynesia',
'French Southern Territories',
'Gabon',
'Gambia',
'GA',
'Germany',
'Ghana',
'Gibraltar',
'Greece',
'Greenland',
'Grenada',
'Guadeloupe',
'Guam',
'Guatemala',
'Guernsey',
'Guinea',
'Guinea-Bissau',
'Guyana',
'Haiti',
'Heard Island and McDonald Islands',
'Holy See (Vatican City State)',
'Honduras',
'Hong Kong',
'Hungary',
'Iceland',
'India',
'Indonesia',
'Iran, Islamic Republic of',
'Iraq',
'Ireland',
'Isle of Man',
'Israel',
'Italy',
'Jamaica',
'Japan',
'Jersey',
'Jordan',
'Kazakhstan',
'Kenya',
'Kiribati',
'Korea Democratic People\'s Republic of',
'Korea, Republic of',
'Kuwait',
'Kyrgyzstan',
'Lao People\'s Democratic Republic',
'Latvia',
'Lebanon',
'Lesotho',
'Liberia',
'Libya',
'Liechtenstein',
'Lithuania',
'Luxembourg',
'Macao',
'Macedonia, the Former Yugoslav Republic of',
'Madagascar',
'Malawi',
'Malaysia',
'Maldives',
'Mali',
'Malta',
'Marshall Islands',
'Martinique',
'Mauritania',
'Mauritius',
'Mayotte',
'Mexico',
'Micronesia, Federated States of',
'Moldova, Republic of',
'Monaco',
'Mongolia',
'Montenegro',
'Montserrat',
'Morocco',
'Mozambique',
'Myanmar',
'Namibia',
'Nauru',
'Nepal',
'Netherlands',
'New Caledonia',
'New Zealand',
'Nicaragua',
'Niger',
'Nigeria',
'Niue',
'Norfolk Island',
'Northern Mariana Islands',
'Norway',
'Oman',
'Pakistan',
'Palau',
'Palestine, State of',
'Panama',
'Papua New Guinea',
'Paraguay',
'Peru',
'Philippines',
'Pitcairn',
'Poland',
'Portugal',
'Puerto Rico',
'Qatar',
'Russian Federation',
'Rwanda',
'Réunion',
'Saint Barthélemy',
'Saint Helena, Ascension and Tristan da Cunha',
'Saint Kitts and Nevis',
'Saint Martin (French part)',
'Saint Pierre and Miquelon',
'Saint Vincent and the Grenadines',
'Samoa',
'San Marino',
'Sao Tome and Principe',
'Saudi Arabia',
'Senegal',
'Serbia',
'Seychelles',
'Sierra Leone',
'Singapore',
'Sint Maarten (Dutch part)',
'Slovakia',
'Slovenia',
'Solomon Islands',
'Somalia',
'South Africa',
'South GA and the South Sandwich Islands',
'South Sudan',
'Spain',
'Sri Lanka',
'Sudan',
'Suriname',
'Svalbard and Jan Mayen',
'Swaziland',
'Sweden',
'Switzerland',
'Syrian Arab Republic',
'Taiwan, Province of China',
'Tajikistan',
'Tanzania, United Republic of',
'Thailand',
'Timor-Leste',
'Togo',
'Tokelau',
'Tonga',
'Trinidad and Tobago',
'Tunisia',
'Turkey',
'Turkmenistan',
'Turks and Caicos Islands',
'Tuvalu',
'Uganda',
'Ukraine',
'United Arab Emirates',
'United Kingdom',
'United States',
'United States Minor Outlying Islands',
'Uruguay',
'Uzbekistan',
'Vanuatu',
'Venezuela, Bolivarian Republic of',
'Viet Nam',
'Virgin Islands, British',
'Virgin Islands, U.S.',
'Wallis and Futuna',
'Western Sahara',
'Yemen',
'Zambia',
'Zimbabwe',
'Åland Islands',

), array(), array(), 120, 240);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>10.</b> &nbsp; Country of Citizenship</div>';
$pdf->writeHTMLCell(90, 7, 113, 247, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'B', 11);
$pdf->ComboBox('other_info_country_citizenship', 83, 7, array(
'Afghanistan',
'Albania',
'Algeria',
'American Samoa',
'Andorra',
'Angola',
'Anguilla',
'Antarctica',
'Antigua and Barbuda',
'Argentina',
'Armenia',
'Aruba',
'Australia',
'Austria',
'Azerbaijan',
'Bahamas',
'Bahrain',
'Bangladesh',
'Barbados',
'Belarus',
'Belgium',
'Belize',
'Benin',
'Bermuda',
'Bhutan',
'Bolivia, Plurinational State of',
'Bonaire, Sint Eustatius and Saba',
'Bosnia and Herzegovina',
'Botswana',
'Bouvet Island',
'Brazil',
'British Indian Ocean Territory',
'Brunei Darussalam',
'Bulgaria',
'Burkina Faso',
'Burundi',
'Cambodia',
'Cameroon',
'Canada',
'Cape Verde',
'Cayman Islands',
'Central African Republic',
'Chad',
'Chile',
'China',
'Christmas Island',
'Cocos (Keeling) Islands',
'Colombia',
'Comoros',
'Congo',
'Congo, the Democratic Republic of the',
'Cook Islands',
'Costa Rica',
'Croatia',
'Cuba',
'Curaçao',
'Cyprus',
'Czech Republic',
'Cote d\'Ivoire',
'Denmark',
'Djibouti',
'Dominica',
'Dominican Republic',
'Ecuador',
'Egypt',
'El Salvador',
'Equatorial Guinea',
'Eritrea',
'Estonia',
'Ethiopia',
'Falkland Islands (Malvinas)',
'Faroe Islands',
'Fiji',
'Finland',
'France',
'French Guiana',
'French Polynesia',
'French Southern Territories',
'Gabon',
'Gambia',
'GA',
'Germany',
'Ghana',
'Gibraltar',
'Greece',
'Greenland',
'Grenada',
'Guadeloupe',
'Guam',
'Guatemala',
'Guernsey',
'Guinea',
'Guinea-Bissau',
'Guyana',
'Haiti',
'Heard Island and McDonald Islands',
'Holy See (Vatican City State)',
'Honduras',
'Hong Kong',
'Hungary',
'Iceland',
'India',
'Indonesia',
'Iran, Islamic Republic of',
'Iraq',
'Ireland',
'Isle of Man',
'Israel',
'Italy',
'Jamaica',
'Japan',
'Jersey',
'Jordan',
'Kazakhstan',
'Kenya',
'Kiribati',
'Korea Democratic People\'s Republic of',
'Korea, Republic of',
'Kuwait',
'Kyrgyzstan',
'Lao People\'s Democratic Republic',
'Latvia',
'Lebanon',
'Lesotho',
'Liberia',
'Libya',
'Liechtenstein',
'Lithuania',
'Luxembourg',
'Macao',
'Macedonia, the Former Yugoslav Republic of',
'Madagascar',
'Malawi',
'Malaysia',
'Maldives',
'Mali',
'Malta',
'Marshall Islands',
'Martinique',
'Mauritania',
'Mauritius',
'Mayotte',
'Mexico',
'Micronesia, Federated States of',
'Moldova, Republic of',
'Monaco',
'Mongolia',
'Montenegro',
'Montserrat',
'Morocco',
'Mozambique',
'Myanmar',
'Namibia',
'Nauru',
'Nepal',
'Netherlands',
'New Caledonia',
'New Zealand',
'Nicaragua',
'Niger',
'Nigeria',
'Niue',
'Norfolk Island',
'Northern Mariana Islands',
'Norway',
'Oman',
'Pakistan',
'Palau',
'Palestine, State of',
'Panama',
'Papua New Guinea',
'Paraguay',
'Peru',
'Philippines',
'Pitcairn',
'Poland',
'Portugal',
'Puerto Rico',
'Qatar',
'Russian Federation',
'Rwanda',
'Réunion',
'Saint Barthélemy',
'Saint Helena, Ascension and Tristan da Cunha',
'Saint Kitts and Nevis',
'Saint Martin (French part)',
'Saint Pierre and Miquelon',
'Saint Vincent and the Grenadines',
'Samoa',
'San Marino',
'Sao Tome and Principe',
'Saudi Arabia',
'Senegal',
'Serbia',
'Seychelles',
'Sierra Leone',
'Singapore',
'Sint Maarten (Dutch part)',
'Slovakia',
'Slovenia',
'Solomon Islands',
'Somalia',
'South Africa',
'South GA and the South Sandwich Islands',
'South Sudan',
'Spain',
'Sri Lanka',
'Sudan',
'Suriname',
'Svalbard and Jan Mayen',
'Swaziland',
'Sweden',
'Switzerland',
'Syrian Arab Republic',
'Taiwan, Province of China',
'Tajikistan',
'Tanzania, United Republic of',
'Thailand',
'Timor-Leste',
'Togo',
'Tokelau',
'Tonga',
'Trinidad and Tobago',
'Tunisia',
'Turkey',
'Turkmenistan',
'Turks and Caicos Islands',
'Tuvalu',
'Uganda',
'Ukraine',
'United Arab Emirates',
'United Kingdom',
'United States',
'United States Minor Outlying Islands',
'Uruguay',
'Uzbekistan',
'Vanuatu',
'Venezuela, Bolivarian Republic of',
'Viet Nam',
'Virgin Islands, British',
'Virgin Islands, U.S.',
'Wallis and Futuna',
'Western Sahara',
'Yemen',
'Zambia',
'Zimbabwe',
'Åland Islands',
), array(), array(), 120, 252);
//.........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2

//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b>   (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.</b> &nbsp; &nbsp;&nbsp;U.S Social Security Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 26, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 46, 10, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_social_security',47.1, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 31);

//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Entry Information</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 42, $html, 0, 1, true, false, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.</b> &nbsp; &nbsp;&nbsp;Date of Last Entry into the United States</div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>(mm/dd/yyy)</div>';
$pdf->writeHTMLCell(90, 7, 50, 56, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_date_of_last',32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 56);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.</b> &nbsp; &nbsp;Place of Last Entry into the United States (City and State)</div>';
$pdf->writeHTMLCell(95, 7, 12, 64, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', 'B', 11);
$pdf->ComboBox('info_about_you_city_state', 82.5, 7, array(
'Los Angeles,CA',
'Chicago,IL',
'Houston,TX',
'Phoenix,AZ',
'San Antonio,TX',
'Philadelphia,PA',
'San Diego,CA',
'Dallas,TX',
'Austin,TX',
'San Jose,CA',
'Fort Worth,TX',
'Jacksonville,FL',
'Charlotte,NC',
'Columbus,Ohio',
'INpolis,IN',
'San Francisco,NC',
'Seattle,WA',
'Denver,CO',
'WA,District of Columbia',
'Boston,MA',
'El Paso,TX',
'Nashville,TN',
'OK City,OK',
'Portland,OR',
'Detroit,MI',
'Memphis,TN',
'Louisville,KY',
'Milwaukee,WI',
'Baltimore,MD',
'Albuquerque ,NM',
'Tucson,AZ',
'Mesa,AZ',
'Fresno,CA',
'Atlanta,GA',
'Sacramento, CA',
'KS City, MO',
'CO Springs,CO',
'Raleigh,NC',
'Miami,FL',
'Omaha,NE',
'Long Beach, CA',
'VA Beach,VA',
'Oakland,CA',
'Minneapolis, MN',
'Tampa,FL',
'Tulsa,OK',
'Arlington,TX',
'Aurora,CO',
'Wichita,KS',
'Bakersfield,CA',
'New Orleans,LA',
'Cleveland,Ohio',
'Henderson,NV',
'Anaheim,CA',
'Honolulu,HI',
'Riverside,CA',
'Santa Ana,CA',
'Corpus Christi,TX',
'Lexington,KY',
'San Juan,Puerto Rico',
'Stockton,CA',
'St. Pau,MN',
'Cincinnati,Ohio',
'Irvine,CA',
'Greensboro North,Carolina',
'Pittsburgh,PA',
'Lincoln,Nebrask',
'Durham,NC',
'Orlando,FL',
'St. Louis,MO',
'Chula Vista,CA',
'Plano,TX',
'Anchorage,AK',
'Fort Wayne,IN',
'Chandler,AZ',
'Reno,NV',
'Las Vegas,NV',
'North Las Vegas,NV',
'Scottsdale,AZ',
'St. Petersburg,FL',
'Laredo,TX',
'Gilbert,AZ',
'Toledo,Ohio',
'Lubbock,TX',
'Madison,WI',
'Glendal,AZ',
'Chesapeake,VA',
'Winston-Salem,NC',
'Fremont,CA',
'Norfolk,VA',
'Frisco,TX',
'Paradise,NV',
'Irving,TX',
'Garland,TX',
'Richmond,VA',
'Arlington,VA',
'Boise,ID',
'Spokane,WA',
'Hialeah,FL',
'Moreno Valley,CA',
'Tacoma,WA',
'Port St. Lucie,FL',
'McKinney,TX',
'Fontana,CA',
'Modesto,CA',
'Fayetteville,NC	',
'Baton Rouge,LA	',
'San Bernardino,CA',
'Santa Clarita,CA',
'Cape Coral,FL',
'Des Moines,IA',
'Tempe,AZ',
'Huntsville,AL',
'Oxnard,CA',
'Spring Valley,NV',
'Birmingham,AL',
'Overland Park,KS',
'Grand Rapids,MI',
'Salt Lake City,UT',
'Columbus,GA',
'Augusta,GA',
'Amarillo,TX',
'Tallahassee,FL',
'Ontario,CA',
'Montgomery,AL',
'Little Rock,AR',
'Akron,Ohio',
'Huntington Beach,CA',
'Grand Prairie,TX',
'Glendale,CA',
'Sioux Falls,SD',
'Sunrise Manor,NV',
'Aurora,IL',
'Vancouver,WA',
'Knoxville,TN	',
'Peoria,AZ',
'Mobile,AL',
'Chattanooga,TN',
'Worcester,MA',
'Brownsville,TX',
'Fort Lauderdale,FL',
'Newport News,VA',
'Elk Grove,CA',
'Providence,RI',
'Shrevepor,	LA',
'Salem,OR',
'Pembroke Pines,FL',
'Eugene,OR',
'Rancho Cucamonga,CA',
'Cary,NC',
'Santa Rosa,CA',
'Fort Collins,CO',
'Oceanside,CA',
'Corona,CA',
'Enterprise,NV',
'Garden Grove,CA',
'Springfield,MO',
'Clarksville,TN',
'Murfreesboro,TN',
'Lakewood,CO',
'Bayamon,Puerto Rico',
'Killeen,TX',
'Alexandria,VA',
'Midland,TX',
'Hayward,CA',
'Hollywood,FL',
'Salinas,CA',
'Lancaster,CA',
'Macon,GA',
'Surprise,AZ',
'KS City,KS',
'Sunnyvale,CA',
'Palmdale,CA',
'Bellevue,WA',
'Springfield,MA',
'Denton	TX',
'Jackson,MS',
'Escondido,CA',
'Pomona,CA',
'Naperville,IL',
'Roseville,CA',
'Thornton,CO',
'Round Rock,TX',
'Pasadena,TX',
'Joliet,IL',
'Carrollton,TX',
'McAllen,TX',
'Rockford,IL',
'Waco,TX',
'Bridgeport,CT',
'Miramar,FL',
'Olathe,KS',
'Metairie,LA',
'Abbeville',	
'Alexandria,LA',
'Bastrop,LA',
'Baton Rouge,LA',
'Bogalusa,LA',
'Bossier City,LA',
'Gretna,LA',
'Houma,LA',
'Lafayette,LA',
'Lake Charles,LA',
'Monroe,LA',
'Morgan City,LA',
'Natchitoches,LA',
'New Iberia,LA',
'New Orleans,LA',
'Opelousas,LA',
'Ruston,LA',
'Saint Martinville,LA',
'Shreveport,LA',
'Thibodaux,LA',
'Albany,OR',
'Ashland,OR',
'Astoria,OR',
'Baker City,OR',
'Beaverton,OR',
'Bend,OR',
'Brookings,OR',
'Burns,OR',
'Coos Bay,OR',
'Corvallis,OR',
'Eugene,OR',
'Grants Pass,OR',
'Hillsboro,OR',
'Jacksonville,OR',
'Hood River,OR',
'John Day,OR',
'Klamath Falls,OR',
'La Grande,OR',
'Lake Oswego,OR',
'Lakeview,OR',
'McMinnville,OR',
'Medford,OR',
'Newberg,OR',
'Newport,OR',
'Ontario,OR',
'Oregon City,OR',
'Pendleton,OR',
'Port Orford,OR',
'Portland,OR',
'Prineville,OR',
'Redmond,OR',
'Reedsport,OR',
'Roseburg,OR',
'Salem,OR',
'Seaside,OR',
'Springfield,OR',
'The Dalles,OR',
'Tillamook,OR',
'Abbeville,SC',
'Aiken,SC',
'Anderson,SC',
'Beaufort,SC',
'Camden,SC',
'Charleston,SC',
'Columbia,SC',
'Darlington,SC',
'Florence,SC',
'Gaffney,SC',
'Georgetown,SC',
'Greenville,SC',
'Greenwood,SC',
'Hartsville,SC',
'Lancaster,SC',
'Mount Pleasant,SC',
'Myrtle Beach,SC',
'Orangeburg,SC',
'Rock Hill,SC',
'Spartanburg,SC',
'Sumter,SC',
'Union,SC',
'Aberdeen,SD',
'Belle Fourche,SD',
'Brookings,SD',
'Canton,SD',
'Custer,SD',
'Deadwood,SD',
'Hot Springs,SD',
'Huron,SD',
'Lead,SD',
'Madison,SD',
'Milbank,SD',
'Mitchell,SD',
'Mobridge,SD',
'Pierre,SD',
'Rapid City,SD',
'Sioux Falls,SD',
'Spearfish,SD',
'Sturgis,SD',
'Vermillion,SD',
'Barre,VT',
'Bellows Falls,VT',
'Bennington,VT',
'Brattleboro,VT',
'Burlington,VT',
'Essex,VT',
'Manchester,VT',
'Middlebury,VT',
'Montpelier,VT',
'Newport,VT',
'Plymouth,VT',
'Rutland,VT',
'Saint Albans,VT',
'Saint Johnsbury,VT',
'Sharon,VT',
'Winooski,VT',
'Auburn,ME',
'Augusta,ME',
'Bangor,ME',
'Bar Harbor,ME',
'Bath,ME',
'Belfast,ME',
'Biddeford,ME',
'Boothbay Harbor,ME',
'Brunswick,ME',
'Calais,ME',
'Caribou,ME',
'Castine,ME',
'Eastport,ME',
'Ellsworth,ME',
'Farmington,ME',
'Fort Kent,ME',
'Gardiner,ME',
'Houlton,ME',
'Kennebunkport,ME',
'Kittery,ME',
'Lewiston,ME',
'Lubec,ME',
'Machias,ME',
'Orono,ME',
'Portland,ME',
'Presque Isle,ME',
'Rockland,ME',
'Rumford,ME',
'Saco,ME',
'Scarborough,ME',
'Waterville,ME',
'York,ME',
'Anaconda,MT',
'Billings,MT',
'Bozeman,MT',
'Butte,MT',
'Dillon,MT',
'Fort Benton,MT',
'Glendive,MT',
'Great Falls,MT',
'Havre,MT',
'Helena,MT',
'Kalispell,MT',
'Lewistown,MT',
'Livingston,MT',
'Miles City,MT',
'Missoula,MT',
'Virginia City,MT',
'Beatrice,NE',
'Bellevue,NE',
'Boys Town,NE',
'Chadron,NE',
'Columbus,NE',
'Fremont,NE',
'Grand Island,NE',
'Hastings,NE',
'Kearney,NE',
'Lincoln,NE',
'McCook,NE',
'Minden,NE',
'Nebraska City,NE',
'Norfolk,NE',
'North Platte,NE',
'Omaha,NE',
'Plattsmouth,NE',
'Red Cloud,NE',
'Sidney,NE',

'Berlin,NH',
'Claremont,NH',
'Concord,NH',
'Derry,NH',
'Dover,NH',
'Durham,NH',
'Exeter,NH',
'Franklin,NH',
'Hanover,NH',
'Hillsborough,NH',
'Keene,NH',
'Laconia,NH',
'Lebanon,NH',
'Manchester,NH',
'Nashua,NH',
'Peterborough,NH',
'Plymouth,NH',
'Portsmouth,NH',
'Rochester,NH',
'Salem,NH',
'Somersworth,NH',

'Asbury Park,NJ',
'Atlantic City,NJ',
'Bayonne,NJ',
'Bloomfield,NJ',
'Bordentown,NJ',
'Bound Brook,NJ',
'Bridgeton,NJ',
'Burlington,NJ',
'Caldwell,NJ',
'Camden,NJ',
'Cape May,NJ',
'Clifton,NJ',
'Cranford,NJ',
'East Orange,NJ',
'Edison,NJ',
'Elizabeth,NJ',
'Englewood,NJ',
'Fort Lee,NJ',
'Glassboro,NJ',
'Hackensack,NJ',
'Haddonfield,NJ',
'Hoboken,NJ',
'Irvington,NJ',
'Jersey City,NJ',
'Lakehurst,NJ',
'Lakewood,NJ',
'Long Beach,NJ',
'Long Branch,NJ',
'Madison,NJ',
'Menlo Park,NJ',
'Millburn,NJ',
'Millville,NJ',
'Montclair,NJ',
'Morristown,NJ',
'Mount Holly,NJ',
'New Brunswick,NJ',
'New Milford,NJ',
'Newark,NJ',
'Ocean City,NJ',
'Orange,NJ',
'Parsippany–Troy Hills,NJ',
'Passaic,NJ',
'Paterson,NJ',
'Perth Amboy,NJ',
'Plainfield,NJ',
'Princeton,NJ',
'Ridgewood,NJ',
'Roselle,NJ',
'Rutherford,NJ',
'Salem,NJ',
'Somerville,NJ',
'South Orange Village,NJ',
'Totowa,NJ',
'Trenton,NJ',
'Union,NJ',
'Union City,NJ',
'Vineland,NJ',
'Wayne,NJ',
'Weehawken,NJ',
'West New York,NJ',
'West Orange,NJ',
'Willingboro,NJ',
'Woodbridge,NJ',
'Albany,NY',
'Amsterdam,NY',
'Auburn,NY',
'Babylon,NY',
'Batavia,NY',
'Beacon,NY',
'Bedford,NY',
'Binghamton,NY',
'Bronx,NY',
'Brooklyn,NY',
'Buffalo,NY',
'Chautauqua,NY',
'Cheektowaga,NY',
'Clinton,NY',
'Cohoes,NY',
'Coney Island,NY',
'Cooperstown,NY',
'Corning,NY',
'Cortland,NY',
'Crown Point,NY',
'Dunkirk,NY',
'East Aurora,NY',
'East Hampton,NY',
'Eastchester,NY',
'Elmira,NY',
'Flushing,NY',
'Forest Hills,NY',
'Fredonia,NY',
'Garden City,NY',
'Geneva,NY',
'Glens Falls,NY',
'Gloversville,NY',
'Great Neck,NY',
'Hammondsport,NY',
'Harlem,NY',
'Hempstead,NY',
'Herkimer,NY',
'Hudson,NY',
'Huntington,NY',
'Hyde Park,NY',
'Ilion,NY',
'Ithaca,NY',
'Jamestown,NY',
'Johnstown,NY',
'Kingston,NY',
'Lackawanna,NY',
'Lake Placid,NY',
'Levittown,NY',
'Lockport,NY',
'Mamaroneck,NY',
'Manhattan,NY',
'Massena,NY',
'Middletown,NY',
'Mineola,NY',
'Mount Vernon,NY',
'New Paltz,NY',
'New Rochelle,NY',
'New Windsor,NY',
'New York City,NY',
'Newburgh,NY',
'Niagara Falls,NY',
'North Hempstead,NY',
'Nyack,NY',
'Ogdensburg,NY',
'Olean,NY',
'Oneida,NY',
'Oneonta,NY',
'Ossining,NY',
'Oswego,NY',
'Oyster Bay,NY',
'Palmyra,NY',
'Peekskill,NY',
'Plattsburgh,NY',
'Port Washington,NY',
'Potsdam,NY',
'Poughkeepsie,NY',
'Queens,NY',
'Rensselaer,NY',
'Rochester,NY',
'Rome,NY',
'Rotterdam,NY',
'Rye,NY',
'Sag Harbor,NY',
'Saranac Lake,NY',
'Saratoga Springs,NY',
'Scarsdale,NY',
'Schenectady,NY',
'Seneca Falls,NY',
'Southampton,NY',
'Staten Island,NY',
'Stony Brook,NY',
'Stony Point,NY',
'Syracuse,NY',
'Tarrytown,NY',
'Ticonderoga,NY',
'Tonawanda,NY',
'Troy,NY',
'Utica,NY',
'Watertown,NY',
'Watervliet,NY',
'Watkins Glen,NY',
'West Seneca,NY',
'White Plains,NY',
'Woodstock,NY',
'Yonkers,NY',
						
'Akron,OH',
'Alliance,OH',
'Ashtabula,OH',
'Athens,OH',
'Barberton,OH',
'Bedford,OH',
'Bellefontaine,OH',
'Bowling Green,OH',
'Canton,OH',
'Chillicothe,OH',
'Cincinnati,OH',
'Cleveland,OH',
'Cleveland Heights,OH',
'Columbus,OH',
'Conneaut,OH',
'Cuyahoga Falls,OH',
'Dayton,OH',
'Defiance,OH',
'Delaware,OH',
'East Cleveland,OH',
'East Liverpool,OH',
'Elyria,OH',
'Euclid,OH',
'Findlay,OH',
'Gallipolis,OH',
'Greenville,OH',
'Hamilton,OH',
'Kent,OH',
'Kettering,OH',
'Lakewood,OH',
'Lancaster,OH',
'Lima,OH',
'Lorain,OH',
'Mansfield,OH',
'Marietta,OH',
'Marion,OH',
'Martins Ferry,OH',
'Massillon,OH',
'Mentor,OH',
'Middletown,OH',
'Milan,OH',
'Mount Vernon,OH',
'New Philadelphia,OH',
'Newark,OH',
'Niles,OH',
'North College Hill,OH',
'Norwalk,OH',
'Oberlin,OH',
'Painesville,OH',
'Parma,OH',
'Piqua,OH',
'Portsmouth,OH',
'Put-in-Bay,OH',
'Salem,OH',
'Sandusky,OH',
'Shaker Heights,OH',
'Springfield,OH',
'Steubenville,OH',
'Tiffin,OH',
'Toledo,OH',
'Urbana,OH',
'Warren,OH',
'Wooster,OH',
'Worthington,OH',
'Xenia,OH',
'Yellow Springs,OH',
'Youngstown,OH',
'Zanesville,OH',
				

'Abington,PA',
'Aliquippa,PA',
'Allentown,PA',
'Altoona,PA',
'Ambridge,PA',
'Bedford,PA',
'Bethlehem,PA',
'Bloomsburg,PA',
'Bradford,PA',
'Bristol,PA',
'Carlisle,PA',
'Chambersburg,PA',
'Chester,PA',
'Columbia,PA',
'Easton,PA',
'Erie,PA',
'Franklin,PA',
'Germantown,PA',
'Gettysburg,PA',
'Greensburg,PA',
	'Hanover,PA',
'Harmony,PA',
'Harrisburg,PA',
'Hazleton,PA',
'Hershey,PA',
'Homestead,PA',
'Honesdale,PA',
'Indiana,PA',
'Jeannette,PA',
'Jim Thorpe,PA',
'Johnstown,PA',
'Lancaster,PA',
'Lebanon,PA',
'Levittown,PA',
'Lewistown,PA',
'Lock Haven,PA',
'Lower Southampton,PA',
'McKeesport,PA',
'Meadville,PA',
'Middletown,PA',
'Monroeville,PA',
'Nanticoke,PA',
'New Castle,PA',
'New Hope,PA',
'New Kensington,PA',
'Norristown,PA',
'Oil City,PA',
'Philadelphia,PA',
'Phoenixville,PA',
'Pittsburgh,PA',
'Pottstown,PA',
'Pottsville,PA',
'Reading,PA',
'Scranton,PA',
'Shamokin,PA',
'Sharon,PA',
'State College,PA',
'Stroudsburg,PA',
'Sunbury,PA',
'Swarthmore,PA',
'Tamaqua,PA',
'Titusville,PA',
'Uniontown,PA',
'Warren,PA',
'Washington,PA',
'West Chester,PA',
'Wilkes-Barre,PA',
'Williamsport,PA',
'York,PA',

'Abilene,TX',
'Alpine,TX',
'Amarillo,TX',
'Arlington,TX',
'Austin,TX',
'Baytown,TX',
'Beaumont,TX',
'Big Spring,TX',
'Borger,TX',
'Brownsville,TX',
'Bryan,TX',
'Canyon,TX',
'Cleburne,TX',
'College Station,TX',
'Corpus Christi,TX',
'Crystal City,TX',
'Dallas,TX',
'Del Rio,TX',
'Denison,TX',
'Denton,TX',
'Eagle Pass,TX',
'Edinburg,TX',
'El Paso,TX',
'Fort Worth,TX',
'Freeport,TX',
'Galveston,TX',
'Garland,TX',
'Goliad,TX',
'Greenville,TX',
'Harlingen,TX',
'Houston,TX',
'Huntsville,TX',
'Irving,TX',
'Johnson City,TX',
'Kilgore,TX',
'Killeen,TX',
'Kingsville,TX',
'Laredo,TX',
'Longview,TX',
'Lubbock,TX',
'Lufkin,TX',
'Marshall,TX',
'McAllen,TX',
'McKinney,TX',
'Mesquite,TX',
'Midland,TX',
'Mission,TX',
'Nacogdoches,TX',
'New Braunfels,TX',
'Odessa,TX',
'Orange,TX',
'Pampa,TX',
'Paris,TX',
'Pasadena,TX',
'Pecos,TX',
'Pharr,TX',
'Plainview,TX',
'Plano,TX',
'Port Arthur,TX',
'Port Lavaca,TX',
'Richardson,TX',
'San Angelo,TX',
'San Antonio,TX',
'San Felipe,TX',
'San Marcos,TX',
'Sherman,TX',
'Sweetwater,TX',
'Temple,TX',
'Texarkana,TX',
'Texas City,TX',
'Tyler,TX',
'Uvalde,TX',
'Victoria,TX',
'Waco,TX',
'Weatherford,TX',
'Wichita Falls,TX',
'YsletaTX,TX',
'Aberdeen,WA',
'Anacortes,WA',
'Auburn,WA',
'Bellevue,WA',
'Bellingham,WA',
'Bremerton,WA',
'Centralia,WA',
'Coulee Dam,WA',
'Coupeville,WA',
'Ellensburg,WA',
'Ephrata,WA',
'Everett,WA',
'Hoquiam,WA',
'Kelso,WA',
'Kennewick,WA',
'Longview,WA',
'Moses Lake,WA',
'Oak Harbor,WA',
'Olympia,WA',
'Pasco,WA',
'Point Roberts,WA',
'Port Angeles,WA',
'Pullman,WA',
'Puyallup,WA',
'Redmond,WA',
'Renton,WA',
'Richland,WA',
'Seattle,WA',
'Spokane,WA',
'Tacoma,WA',
'Vancouver,WA',
'Walla Walla,WA',
'Wenatchee,WA',
'Yakima,WA',
	
'Appleton,WI',
'Ashland,WI',
'Baraboo,WI',
'Belmont,WI',
'Beloit,WI',
'Eau Claire,WI',
'Fond du Lac,WI',
'Green Bay,WI',
'Hayward,WI',
'Janesville,WI',
'Kenosha,WI',
'La Crosse,WI',
'Lake Geneva,WI',
'Madison,WI',
'Manitowoc,WI',
'Marinette,WI',
'Menasha,WI',
'Milwaukee,WI',
'Neenah,WI',
'New Glarus,WI',
'Oconto,WI',
'Oshkosh,WI',
'Peshtigo,WI',
'Portage,WI',
'Prairie du Chien,WI',
' Racine,WI',
'Rhinelander,WI',
' Ripon,WI',
'Sheboygan,WI',
'Spring Green,WI',
'Stevens Point,WI',
'Sturgeon Bay,WI',
'Superior,WI',
'Waukesha,WI',
'Wausau,WI',
'Wauwatosa,WI',
'West Allis,WI',
'West Bend,WI',
'Buffalo,WY',
'Casper,WY',
'Cheyenne,WY',
'Cody,WY',
'Douglas,WY',
'Evanston,WY',
'Gillette,WY',
'Green River,WY',
'Jackson,WY',
'Lander,WY',
'Laramie,WY',
'Newcastle,WY',
'Powell,WY',
'Rawlins,WY',
'Riverton,WY',
'Rock Springs,WY',
'Sheridan,WY',
'Ten Sleep,WY',
'Thermopolis,WY',
'Torrington,WY',
'Worland,WY',

 ), array(), array(), 21, 69);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.</b> &nbsp; &nbsp;Class of Admission at Last Entry Into the United States</div>';
$pdf->writeHTMLCell(95, 7, 12, 77, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_class_of_addmission',83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20.1, 82);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.</b> &nbsp; &nbsp;Indicate the type of Port-of-Entry at which you last <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;entered the United States:</div>';
$pdf->writeHTMLCell(95, 7, 12, 90, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html= '<div>&nbsp; &nbsp; <input type="checkbox" name="Land Border" value="Land Border" checked="" />Land Border &nbsp;&nbsp;<input type="checkbox" name="Airport" value="Airport" checked="" />Airport. <input type="checkbox" name="Seaport" value="Seaport" checked="" /> Seaport.</div>';
$pdf->writeHTMLCell(90, 0, 15, 100, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.</b> &nbsp; &nbsp;Current Nonimmigartion Status</div>';
$pdf->writeHTMLCell(95, 7, 12, 107, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_current_nonimmigration_status',82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 112);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.</b> &nbsp; &nbsp;Dates Status Expires (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(95, 7, 12, 122, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_dates_status_expires',31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 121);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.a.</b> </div>';
$pdf->writeHTMLCell(100, 7, 12, 130, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div>Form 1-94, Form 1-94W, or Form 1-95 Arrival-Departure
Record Number </div>';
$pdf->writeHTMLCell(90, 7, 20, 130, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 42, 120, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_form_i94',53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 138);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.b.</b> Passport Number</div>';
$pdf->writeHTMLCell(100, 7, 12, 146, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_passport_number',53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 151);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.c.</b> Travel Document Number</div>';
$pdf->writeHTMLCell(100, 7, 12, 160, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_travel_document',82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 165);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.d.</b>  Country of Issuance for Passport or Travel Document </div>';
$pdf->writeHTMLCell(100, 7, 12, 173, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', 'B', 11);
$pdf->ComboBox('other_info_country_birth', 82, 7, array(
'Afghanistan',
'Albania',
'Algeria',
'American Samoa',
'Andorra',
'Angola',
'Anguilla',
'Antarctica',
'Antigua and Barbuda',
'Argentina',
'Armenia',
'Aruba',
'Australia',
'Austria',
'Azerbaijan',
'Bahamas',
'Bahrain',
'Bangladesh',
'Barbados',
'Belarus',
'Belgium',
'Belize',
'Benin',
'Bermuda',
'Bhutan',
'Bolivia, Plurinational State of',
'Bonaire, Sint Eustatius and Saba',
'Bosnia and Herzegovina',
'Botswana',
'Bouvet Island',
'Brazil',
'British Indian Ocean Territory',
'Brunei Darussalam',
'Bulgaria',
'Burkina Faso',
'Burundi',
'Cambodia',
'Cameroon',
'Canada',
'Cape Verde',
'Cayman Islands',
'Central African Republic',
'Chad',
'Chile',
'China',
'Christmas Island',
'Cocos (Keeling) Islands',
'Colombia',
'Comoros',
'Congo',
'Congo, the Democratic Republic of the',
'Cook Islands',
'Costa Rica',
'Croatia',
'Cuba',
'Curaçao',
'Cyprus',
'Czech Republic',
'Cote d\'Ivoire',
'Denmark',
'Djibouti',
'Dominica',
'Dominican Republic',
'Ecuador',
'Egypt',
'El Salvador',
'Equatorial Guinea',
'Eritrea',
'Estonia',
'Ethiopia',
'Falkland Islands (Malvinas)',
'Faroe Islands',
'Fiji',
'Finland',
'France',
'French Guiana',
'French Polynesia',
'French Southern Territories',
'Gabon',
'Gambia',
'Georgia',
'Germany',
'Ghana',
'Gibraltar',
'Greece',
'Greenland',
'Grenada',
'Guadeloupe',
'Guam',
'Guatemala',
'Guernsey',
'Guinea',
'Guinea-Bissau',
'Guyana',
'Haiti',
'Heard Island and McDonald Islands',
'Holy See (Vatican City State)',
'Honduras',
'Hong Kong',
'Hungary',
'Iceland',
'India',
'Indonesia',
'Iran, Islamic Republic of',
'Iraq',
'Ireland',
'Isle of Man',
'Israel',
'Italy',
'Jamaica',
'Japan',
'Jersey',
'Jordan',
'Kazakhstan',
'Kenya',
'Kiribati',
'Korea Democratic People\'s Republic of',
'Korea, Republic of',
'Kuwait',
'Kyrgyzstan',
'Lao People\'s Democratic Republic',
'Latvia',
'Lebanon',
'Lesotho',
'Liberia',
'Libya',
'Liechtenstein',
'Lithuania',
'Luxembourg',
'Macao',
'Macedonia, the Former Yugoslav Republic of',
'Madagascar',
'Malawi',
'Malaysia',
'Maldives',
'Mali',
'Malta',
'Marshall Islands',
'Martinique',
'Mauritania',
'Mauritius',
'Mayotte',
'Mexico',
'Micronesia, Federated States of',
'Moldova, Republic of',
'Monaco',
'Mongolia',
'Montenegro',
'Montserrat',
'Morocco',
'Mozambique',
'Myanmar',
'Namibia',
'Nauru',
'Nepal',
'Netherlands',
'New Caledonia',
'New Zealand',
'Nicaragua',
'Niger',
'Nigeria',
'Niue',
'Norfolk Island',
'Northern Mariana Islands',
'Norway',
'Oman',
'Pakistan',
'Palau',
'Palestine, State of',
'Panama',
'Papua New Guinea',
'Paraguay',
'Peru',
'Philippines',
'Pitcairn',
'Poland',
'Portugal',
'Puerto Rico',
'Qatar',
'Russian Federation',
'Rwanda',
'Réunion',
'Saint Barthélemy',
'Saint Helena, Ascension and Tristan da Cunha',
'Saint Kitts and Nevis',
'Saint Martin (French part)',
'Saint Pierre and Miquelon',
'Saint Vincent and the Grenadines',
'Samoa',
'San Marino',
'Sao Tome and Principe',
'Saudi Arabia',
'Senegal',
'Serbia',
'Seychelles',
'Sierra Leone',
'Singapore',
'Sint Maarten (Dutch part)',
'Slovakia',
'Slovenia',
'Solomon Islands',
'Somalia',
'South Africa',
'South GA and the South Sandwich Islands',
'South Sudan',
'Spain',
'Sri Lanka',
'Sudan',
'Suriname',
'Svalbard and Jan Mayen',
'Swaziland',
'Sweden',
'Switzerland',
'Syrian Arab Republic',
'Taiwan, Province of China',
'Tajikistan',
'Tanzania, United Republic of',
'Thailand',
'Timor-Leste',
'Togo',
'Tokelau',
'Tonga',
'Trinidad and Tobago',
'Tunisia',
'Turkey',
'Turkmenistan',
'Turks and Caicos Islands',
'Tuvalu',
'Uganda',
'Ukraine',
'United Arab Emirates',
'United Kingdom',
'United States',
'United States Minor Outlying Islands',
'Uruguay',
'Uzbekistan',
'Vanuatu',
'Venezuela, Bolivarian Republic of',
'Viet Nam',
'Virgin Islands, British',
'Virgin Islands, U.S.',
'Wallis and Futuna',
'Western Sahara',
'Yemen',
'Zambia',
'Zimbabwe',
'Åland Islands',

), array(), array(), 21, 178);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.e.</b> Expiration Date for Passport or Travel Document</div>';
$pdf->writeHTMLCell(100, 7, 12, 187, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 7, 48, 192, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_expiration_date',31.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 192);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Provide your name exactly as it appears on Form 1-94, Form
<br>1-94W. or Form 1-95. If the name on the form is different than
<br>your current legal name as entered in <b>Part 1., Item Numbers
<br>3.a. - 3.c</b>, provide evidence of the name change.</div>';
$pdf->writeHTMLCell(100, 7, 13, 200, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 217, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('entry_information_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 218);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 226, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('entry_information_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 227);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 237, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_legal_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 237);

//.............
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. &nbsp;Reason for Application</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 1, 1, true, false, 'L', true);
//.........



$pdf->SetFont('times', '', 10);
$html ='<div>Select the box that best describes your reason for requesting an initial or replacement document. (Select only one box)</div>';
$pdf->writeHTMLCell(90, 7, 113, 26, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.   </b>    <input type="checkbox" name="applicant1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 36, $html, 0, 1, false, true, 'J', true);
$html ='<div>  I am applying to replace my lost or stolen Form 1-94
<br>or Form 1-94W.</div>';
$pdf->writeHTMLCell(90, 7, 124, 36, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.   </b>    <input type="checkbox" name="applicant1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 46, $html, 0, 1, false, true, 'J', true);
$html ='<div>   I am applying to replace my lost or stolen Form 1-95.</div>';
$pdf->writeHTMLCell(90, 7, 124, 46, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.   </b>    <input type="checkbox" name="applicant1c" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 52, $html, 0, 1, false, true, 'J', true);
$html ='<div>  I am applying to replace my Form 1-94 or Form
<br>&nbsp;&nbsp;1-94W because it was mutilated. I have attached my
<br>&nbsp;&nbsp;original Form 1-94 or Form I-94W </div>';
$pdf->writeHTMLCell(90, 7, 125, 52, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.d.   </b>   <input type="checkbox" name="applicant1d" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 65, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am applying to replace my Form I-95 because it was
<br>&nbsp;mutilated. I have attached my original Form 1-95.  </div>';
$pdf->writeHTMLCell(90, 7, 126, 65, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.e.   </b>   <input type="checkbox" name="applicant1e" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 74, $html, 0, 1, false, true, 'J', true);
$html ='<div> I was not issued Form 1-94 when I was admitted by
<br>CBP at a port-of-entry in the United States (whether
<br>at a land border, airport, or seaport).  </div>';
$pdf->writeHTMLCell(90, 7, 126, 74, $html, 0, 1, false, true, 'J', true);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.f.   </b>   <input type="checkbox" name="applicant1f" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 88, $html, 0, 1, false, true, 'J', true);
$html ='<div> I was issued Form 1-94, Form 1-94W, or Form 1-95 by
<br>USCIS with an error or incorrect information, and I

<br>am requesting that USCIS correct the document. I
<br>have attached my original Form 1-94, Form 1-94W. or
<br>Form 1-95.
<br><br>Provide an explanation of the error or incorrect
<br>information entered on Form 1-94, Form I-94W, or
<br>Form I-95 at the time of issuance.  </div>';
$pdf->writeHTMLCell(90, 7, 126, 88, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="18" rows="11" name="reason_for_application_1f">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 30, 125, 124, $html, 0, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.g.   </b>   <input type="checkbox" name="applicant1f" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 113, 167, $html, 0, 1, false, true, 'J', true);
$html ='<div>I was not issued Form 1-94 when I entered as a
<br>nonimmigrant member of the military, and I am filing
<br>this application for an initial Form 1-94.
  </div>';
$pdf->writeHTMLCell(90, 7, 126, 167, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. &nbsp;&nbsp;Processing Information</b></div>';
$pdf->writeHTMLCell(90, 7, 114.5, 185, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); 
$html= '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell(50, 4, 113, 193, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); 
$html= '<div>Are you filing this application with any other petition or
application?</div>';
$pdf->writeHTMLCell(90, 7, 120, 193, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part3_1a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part3_1a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 198, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10); 
$html= '<div>If you answered "Yes" to <b>Items Number 1.a.,</b> provide the
USCIS form number and name of the application or
<br>petition you are filing in <b>Item Number 1.b.</b></div>';
$pdf->writeHTMLCell(90, 7, 120, 204, $html, '', 0, 0, true, 'L');

//........

$pdf->SetFont('times', '', 10); 
$html= '<div><b>1.b.</b> &nbsp;&nbsp;USCIS Form Number and Name</div>';
$pdf->writeHTMLCell(90, 4, 113, 220, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_form_number_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 225);

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3

//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. &nbsp;&nbsp;Processing Information</b> (Continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); 
$html= '<div><b>2.a.</b> &nbsp; Are you now in removal proceedings?</div>';
$pdf->writeHTMLCell(90, 4, 12, 27, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part3_2a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part3_2a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 27, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10); 
$html= '<div>If you answered "Yes" to <b>Item Number 2.a.,</b> complete
<br><b>Item Number 2.b.</b></div>';
$pdf->writeHTMLCell(90, 4, 20, 33, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('times', '', 10); 
$html= '<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(90, 4, 12, 43, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); 
$html= '<div>Provide detailed information regarding the proceedings.
<br>If you need extra space to complete this section, use the
<br>space provided in <b>Part 7. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 4, 20, 43, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="19" rows="8" name="procesing_information_2b">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 30, 20, 56, $html, 0, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. &nbsp;Applicant\'s Statement, Contact
Information, Certification, and Signature</b> </div>';
$pdf->writeHTMLCell(90, 7, 14, 91, $html, 1, 1, true, false, 'L', true);
//...........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Applicant\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 14, 105, $html, 0, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 114, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_contact_info_daytime', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 119);
//...............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 127, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_contact_info_mobile', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 132);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_contact_info_telephone', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 145);
//...............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Applicant\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 155, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>I certify, under penalty of perjury, that I provided or authorized 
all of the responses and information contained in and submitted 
with my application, I read and understand or, if interpreted to 
me in a language in which I am fluent by the interpreter listed in 
<b>Part 5.</b>, understood, all of the responses and information 
contained in, and submitted with, my application, and that all of 
the responses and the information is complete, true, and correct. 
Furthermore, I authorize the release of any information from 
any and all of my records that USCIS may need to determine 
my eligibility for an immigration request and to other entities 
and persons where necessary for the administration and 
enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(93, 7, 12, 163, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b> &nbsp;&nbsp;Applicant\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 212, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 217, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 20, 219, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 230, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 230);
//...............

//.............page 3 left side end 

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. &nbsp;Interpreter\'s Contact Information,
Certification, and Signature</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 18, $html, 1, 1, true, false, 'L', true);
//.........


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Interpreter\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 33, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>&nbsp;&nbsp;&nbsp; Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 112, 42, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_full_famiy_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 47);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>&nbsp;&nbsp;&nbsp; Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 118, 55, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_full_given_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 60);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Interpreter\'s Business or Organization Name (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 112, 68, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_full_business_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 73);
//...............


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Interpreter\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 85, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 95, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 100);
//...............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 108, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 113);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s E-mail Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 121, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 126);
//...............


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Interpreter\'s Certification and Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 138, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>I certify under penalty of perjury, that I am fluent in English and</div>';
$pdf->writeHTMLCell(95, 7, 112, 145, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certify', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 150);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>and I have interpreted every question on the application and Instructions and interpreted the applicant\'s answers to the questions in that language, and the applicant informed me that they understood every instruction, question, and answer on the application.</div>';
$pdf->writeHTMLCell(95, 7, 112, 157, $html, 0, 1, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b> &nbsp;&nbsp; Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 112, 180, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 120, 185, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 195, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('Interpreter_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 195);
//...............page 3 end ...........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
//...........



$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, If Other than the Applicant</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 38, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>&nbsp;&nbsp;&nbsp; Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 12, 46, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_full_famiy_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 51);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div> &nbsp; &nbsp; &nbsp; Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 14, 59, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_full_given_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 65);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Preparer\'s Business or Organization Name (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 12, 73, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_full_business_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 78);
//...............


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 90, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b>&nbsp;&nbsp;&nbsp; &nbsp;Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 99, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 104);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp; Preparer\'s  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 112, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 117);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp; Preparer\'s Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 12, 126, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 131);
//...............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Certification and Signature </i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 140, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>I certify, under penalty of perjury, that I prepared this 
application for the applicant at their request and with express 
consent and that all of the responses and information contained 
in and submitted with the application is complete, true, and 
correct and reflects only information provided by the applicant. 
The applicant reviewed the responses and information and 
informed me that they understand the responses and information 
in or submitted with the application.</div>';
$pdf->writeHTMLCell(93, 7, 12, 148, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b> &nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 185, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 18, 191, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 17, 200, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('peparer_date_of_signature', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 200);
//..........
 

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
//..........

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
$pdf->writeHTMLCell(90, 7, 12, 26, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 59, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_family_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 61);

//.......

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

$pdf->writeHTMLCell(45, 7, 57.9, 88, '',  1,  1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_page_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 103);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_part_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 103);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 98, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_item_number', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 103);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 113, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="20" rows="17" name="aditional_inf0_name_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 18, 111, $html, 0, 0, false, 'L');

//............


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_page_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 186);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.</b> &nbsp;&nbsp;Part Number</div>';
$pdf->writeHTMLCell(90, 7, 45, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_part_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 186);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.</b> &nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(90, 7, 75, 181, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_name_item_number1', 19, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 186);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.d.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="20" rows="17" name="aditional_inf0_name_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 18, 194, $html, 0, 0, false, 'L');

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
$html = <<<EOD
<textarea cols="19" rows="16" name="additional_info_name_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123, 31, $html, 0, 0, false, 'L');
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
$html = <<<EOD
<textarea cols="19" rows="17" name="additional_info_name_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123.5, 111, $html, 0, 0, false, 'L');
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
$html = <<<EOD
<textarea cols="19" rows="17" name="additional_info_name_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 123.5, 194, $html, 0, 0, false, 'L');
//..............


$js = "
var fields = {
    'attorney_state_license_number':' $attorneyData->bar_number',
    'info_about_you_alien_reg':' ',
    'info_about_you_uscis_online':' ',
    'your_legal_name_last_name':' ',
    'your_legal_name_first_name':' ',
    'your_legal_name_middle_name':' ',
    'other_names_used_last_name':' ',
    'other_names_used_first_name':' ',
    'other_names_used_middle_name':' ',
    'us_mailing__incare':' ', 
    'us_mailing_street_number_name':' ',
    'us_mailing_apt_ste_flr':' ',
    'us_mailing_city_town':' ',
    'us_mailing_state':' ',
    'us_mailing_zipcode':' ',
    'us_physical__in_care':' ',
    'us_physical_street_number_name':' ',
    'us_physical_apt_ste_flr':' ',
    'us_physical_state':' ',
    'us_physical_zipcode':' ',
    'us_physical_city_town':' ',
    'other_info_date_birth':' ',
    'other_info_country_birth':' ',
    'other_info_country_citizenship':' ',
    'info_about_you_us_social_security':' ',
    'info_about_you_us_date_of_last':' ',
    'info_about_you_city_state':' ',
    'info_about_you_class_of_addmission':' ',
    'info_about_you_current_nonimmigration_status':' ',
    'info_about_you_form_i94':' ',
    'info_about_you_dates_status_expires':' ',
    'info_about_you_passport_number':' ',
    'info_about_you_travel_document':' ',
    'info_about_you_expiration_date':' ',
    'entry_information_last_name':' ',
    'entry_information_first_name':' ',
    'uscis_form_number_name':' ',
    'reason_for_application_1f':' ',
    'applicant_statement_1b':' ',
    'applicant_statement_2':' ',
    'procesing_information_2b':' ',
    'applicant_contact_info_daytime':' ',
    'applicant_contact_info_mobile':' ',
    'applicant_contact_info_telephone':' ',
    'applicant_signature_date':' ',
    'interpreter_full_famiy_name':' ',
    'interpreter_full_given_name':' ',
    'interpreter_full_business_name':' ',
    'interpreter_mailing_address_street_name':' ',
    'interpreter_mailing_address__apt_ste_flr':' ',
    'interpreter_mailing_address_city_or_town':' ',
    'interpreter_mailing_address_state':' ',
    'interpreter_mailing_address_zip_code':' ',
    'interpreter_mailing_address_province':' ',
    'interpreter_mailing_address_postal_code':' ',
    'interpreter_mailing_address_country':' ',
    'interpreter_contact_info_daytime':' ',
    'interpreter_contact_info_mobile':' ',
    'interpreter_contact_info_email':' ',
    'interpreter_certification_perjury':' ',
    'interpreter_date_of_signature':' ',
    'preparer_full_famiy_name':' ',
    'preparer_full_given_name':' ',
    'preparer_full_business_name':' ',
    'preparer_mailing_address_street_name':' ',
    'preparer_mailing_address__apt_ste_flr':' ',
    'preparer_mailing_address_city_or_town':' ',
    'preparer_mailing_address_state':' ',
    'preparer_mailing_address_zip_code':' ',
    'preparer_mailing_address_province':' ',
    'preparer_mailing_address_postal_code':' ',
    'preparer_mailing_address_country':' ',
    'preparer_contact_info_daytime':' ',
    'preparer_contact_info_mobile':' ',
    'preparer_contact_info_email':' ',
    'peparer_date_of_signature':' ',
    'additional_info_family_last_name':' ',
    'additional_info_given_first_name':' ',
    'additional_info_middle_name':' ',
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
    'additional_inf0_5d':' ',
    'additional_info_page_number3':' ',
    'additional_info_part_number3':' ',
    'additional_info_item_number3':' ',
    'additional_inf0_6d':' ',
    'additional_info_page_number4':' ',
    'additional_info_part_number4':' ',
    'additional_info_item_number4':' ',
    'additional_inf0_7d':' ',
    'interpreter_certify':' ',
    'Interpreter_signature_date':' ',

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
$pdf->Output('Form_I-485.pdf', 'I');