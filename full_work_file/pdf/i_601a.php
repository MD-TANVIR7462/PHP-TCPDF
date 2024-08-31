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
		
		$this->Cell(40, 6, "Form I-601A   Edition 04/01/24 ", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/i601A/I-601A-footer-pdf417-$this->page.png";
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
$pdf->SetTitle('Form I-601A');

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
$pdf->MultiCell(120, 15, "Application for Provisional Unlawful Presence Waiver ", 0, 'C', 0, 1, 45, 10, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "USCIS\nForm  I-601A", 0, 'C', 0, 1, 170, 5.5, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No.   1615-0123\nExpires 02/28/2026", 0, 'C', 0, 1, 169, 18.5, true);

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

//.........table1 start

$pdf->writeHTMLCell(190, 50, 13, 33, "", 1, 1, true, false, 'C', true);

$pdf->SetFillColor(222,222,222);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(13, 49.5, 13, 33, "", "TLR", 0, true, true, 'C', true);
$pdf->writeHTMLCell(15, 39, 11.5, 47, "For USCIS <br> Use Only", 0, 0, false, true, 'C', true);


$pdf->writeHTMLCell(107, 2, 26, 57, "", "T", 0, false, false, 'C', true);

$pdf->writeHTMLCell(138, 50, 133, 33, "", "L", 0, false, true, 'C', true);

$pdf->writeHTMLCell(138, 50, 65, 33, "", "L", 0, false, true, 'C', true);

$pdf->writeHTMLCell(68, 2, 65, 64, "", "T", 0, false, false, 'C', true);

$pdf->writeHTMLCell(138, 19, 98, 64, "", "L", 0, false, true, 'C', true);


$pdf->SetFont('times', 'B', 10);
$html ='<div>Initial Receipt</div>';
$pdf->writeHTMLCell(90, 7, 33, 33, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Resubmitted</div>';
$pdf->writeHTMLCell(90, 7, 34, 57, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Fee Stamp</div>';
$pdf->writeHTMLCell(90, 7, 87, 33, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Relocated</div>';
$pdf->writeHTMLCell(90, 7, 90, 57, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Received</div>';
$pdf->writeHTMLCell(90, 7, 73, 64, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Sent</div>';
$pdf->writeHTMLCell(90, 7, 109, 64, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', 'B', 10);
$html ='<div>Action Block</div>';
$pdf->writeHTMLCell(90, 7, 155, 33, $html, 0, 1, false, true, 'J', true);
//............table2 end

//.......table2start
$pdf->writeHTMLCell (190, 18,13,85, "", 1, 1, false,true,'C', true); 
$pdf->writeHTMLCell(38, 17.4, 13.4, 85.5, "", "R", 1, true, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>To be completed by an 
attorney or 
<br>BIA-accredited 
representative </b> (if any)  </div>';
$pdf->writeHTMLCell(40, 7, 12, 86, $html,  0,  1, false, true, 'C', false);

$pdf->SetFont('times', '', 12);
$html ='<div><b>  </b>   <input type="checkbox" name="attached4" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(40, 15, 17, 86, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Select this box if 
<br>Form G-28 is 
<br>attached to represent 
<br>the applicant.</b></div>';
$pdf->writeHTMLCell(40, 15, 57.5, 86, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 18, 92, 85, '',  'L',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 18, 138, 85, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell(50, 15, 93, 85, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 94, 95);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or Accredited Representative USCIS Online Account Number</b>(if any)</div>';
$pdf->writeHTMLCell(60, 15, 140, 85, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_or_according_representative', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 95);
//............table2end

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "s", '', 'L', 0, 1, 17, 67.5, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. ", '', 'L', 0, 1, 18, 103.5, true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b></div>';
$pdf->writeHTMLCell(90, 6, 13, 110, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information about yourself.</div>';
$pdf->writeHTMLCell(90, 15, 12, 117, $html, 0, 1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 124, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 43, 109.5, false); 
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<div><b>A-</b></div>';
$pdf->writeHTMLCell(90, 7, 52, 130, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_alien_reg', 44.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 59, 129);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12.5, 138, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 47, 121, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_social_security',44.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 59, 142);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12.5, 150, $html,  0,  1, false, true, 'L', false);
//.............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_uscis_online',62.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 41, 155);
//........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 174, false); 
$pdf->StopTransform();


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Your Full  Name</i></b></div>';
$pdf->writeHTMLCell(90, 6.5, 13, 163.5, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 2, 12, 170, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 171);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 2, 12, 178, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 179);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 2, 12, 187, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 187);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Other Names Used</i></b> (if any)</div>';
$pdf->writeHTMLCell(90, 6.5, 13, 196, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 2, 12, 203, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_last_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 204);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 2, 12, 211, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_first_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 212);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 2, 12, 221, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_middle_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 220);
//..........
$pdf->writeHTMLCell(90, 2, 13, 222.5, "", "B", 1, false, false, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 2, 12, 229, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_last_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 230);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 2, 12, 237, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_first_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 238);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 2, 12, 245, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_full_name_middle_name2', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 246);
//..........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Your U.S. Mailing Address</i></b></div>';
$pdf->writeHTMLCell(90, 6.5, 113, 109, $html, 0, 1, true, false, 'L', true);
$pdf->SetFont( 'times', 'IB', 9 );
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><I><b>(USPS ZIP Code Lookup)</b></I></a></div>';
$pdf->writeHTMLCell( 90, 1, 113, 109.8, $html, 0, 1, true, false, 'R', true );
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.</b>&nbsp;&nbsp;&nbsp; In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 117, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_in_care_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 122);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 129, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 130);
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.c. </b>&nbsp;  <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 139, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 138);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 147, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 146);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 112, 154, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="mailing_state" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 154, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 154, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 154);
//..............

$pdf->SetFont('times', '', 10); 
$html= '<div><b>8.</b></div>';
$pdf->writeHTMLCell(50, 4, 112.5, 162, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); 
$html= '<div>Is your current physical address the same as your mailing 
address?</div>';
$pdf->writeHTMLCell(90, 7, 120, 162, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part1_8" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_8" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 175, 166, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); 
$html= '<div>If you answered "No" to <b>Item Number 8.</b>, provide your 
physical address in <b>Item Numbers 9.a. - 9.e.</b></div>';
$pdf->writeHTMLCell(90, 7, 120, 173, $html, '', 0, 0, true, 'L');
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Your U.S. Physical Address</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 184, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 191, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 192);
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>9.b. </b>&nbsp;  <input type="checkbox" name="Apt1" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste1" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr1" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 201, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 200);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>9.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 208, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 208);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>9.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 112, 217, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="physical_state" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 217, $html, '', 0, 0, true, 'L');
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>9.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 217, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 216);
//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Other Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 226, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>10.  </b>   &nbsp;Gender   &nbsp; &nbsp; <input type="checkbox" name="G" value="y" checked=" " />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked=" " /> Female</div>';
$pdf->writeHTMLCell(90, 7, 112, 235, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.</b> &nbsp;&nbsp; Date of Birth&nbsp;&nbsp;&nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 242, $html, 0, 1, false, true, 'L', true);
//.........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_date_of_birth', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 166, 241);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
//.........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b>(continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b> &nbsp; &nbsp;City or Town of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 26, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_city_town_birth', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 31);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>13. </b>  &nbsp;  &nbsp;Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 38, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_birth', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 43);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14. </b>  &nbsp;  &nbsp;Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_citizenship', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 55);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.a. </b>  &nbsp;Mother\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 62, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mother_last_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 67);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.b. </b>  &nbsp;Mother\'s  Given Name (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 74, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_mother_first_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 79);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.a. </b>  &nbsp;Father\'s  Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 86, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_father_last_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 91);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.b. </b>  &nbsp;Father\'s  Given Name (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_father_first_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 103);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Your Last Entry Into the United States</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 114, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>17. </b> &nbsp; &nbsp;Date of Entry (On or about mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 122, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_date_entry', 28, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 127);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.a. </b>Place or Port-of-Entry (Actual or approximate city or town) </div>';
$pdf->writeHTMLCell(100, 7, 12, 135, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_place_port', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 140);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>18.b.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 12, 148, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="info_about_you_state" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 30, 148, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19. </b> &nbsp; &nbsp;Immigration Status (At the time of entry) </div>';
$pdf->writeHTMLCell(90, 7, 12, 154, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_immigration_status', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 159);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Your Previous Entries Into the United States</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 169, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>You were previously in the United States as follows:</div>';
$pdf->writeHTMLCell(90, 7, 12, 175, $html, 0, 1, false, false, 'J', true);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>20.a. </b>Place or Port-of-Entry (Actual or approximate city or town) </div>';
$pdf->writeHTMLCell(100, 7, 12, 182, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_place_port1', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 187);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>20.b.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 12, 195, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="info_about_you_state1" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 30, 195, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.a. </b>  From (On or about mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 7, 12, 202, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 202);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.b. </b>  To (On or about mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 7, 12, 211, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 211);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22. </b>  &nbsp; Immigration Status (At the time of entry)</div>';
$pdf->writeHTMLCell(100, 7, 12, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_immigration', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 225);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23.a. </b>  Place or Port-of-Entry (Actual or approximate city or town)</div>';
$pdf->writeHTMLCell(98, 7, 110, 18, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_place_port2', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 23);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>23.b.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 110, 31, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="info_about_you_state2" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 130, 31, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.a. </b>  From (On or about mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 7, 110, 38, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_from1', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 38);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.b. </b>  To (On or about mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 7, 110, 48, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_to1', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 47);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>25. </b>  &nbsp; &nbsp; Immigration Status (At the time of entry)</div>';
$pdf->writeHTMLCell(100, 7, 110, 55, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_immigration_status1', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 60);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>26. </b>  &nbsp; &nbsp; Are there other previous entries?</div>';
$pdf->writeHTMLCell(100, 7, 110, 69, $html, 0, 1, false, false, 'J', true);
$html ='<div><input type="checkbox" name="part1_26" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_26" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 175, 70, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 26.,</b> include the 
<br>place of entry, dates, and your immigration status at the 
<br>time of entry for any other prior entries in the space 
<br>provided in <b>Part 9. Additional Information</b>.</div>';
$pdf->writeHTMLCell(85, 7, 120, 77, $html, 0, 1, false, true, 'J', true);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Your Immigration or Criminal History</b></div>';
$pdf->writeHTMLCell(93, 7, 111, 98, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>27.</b></div>';
$pdf->writeHTMLCell(85, 7, 110, 106, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Are you currently in removal, exclusion, or deportation 
proceedings in which there is no final order issued by the 
immigration judge, the Board of Immigration Appeals, a 
DHS officer, or a Federal court yet? (This includes 
proceedings under INA section 239, an exclusion or 
deportation proceeding initiated before April 1,1997, a 
Visa Waiver Program removal proceeding under INA 
section 217, expedited removal under INA 235, and a 
request for a judicial removal order under INA section 
238(c))?</div>';
$pdf->writeHTMLCell(85, 7, 120, 106, $html, 0, 1, false, true, 'J', true);


$html ='<div><input type="checkbox" name="part1_27" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_27" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 180, 143, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered “No” to <b>Item Number 27.</b>, go to <b>Item 
Number 29.a.</b> If you answered “Yes” to <b>Item Number 
27.</b>, select the statement below (either <b>Item Number 
28.a</b>. or <b>28.b</b>.) that most accurately describes your current 
situation.</div>';
$pdf->writeHTMLCell(85, 7, 120, 150, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>28.a.   </b> <input type="checkbox" name="part1_28a " value="Y" checked=" " /> </b></div>';
$pdf->writeHTMLCell(90, 7, 110, 172, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I am in removal, exclusion, or deportation 
<br>proceedings that are administratively closed and, at 
<br>the time of filing my Form I-601A, have not been 
<br>placed back on EOIR\'s calendar to continue my 
<br>removal, exclusion, or deportation proceedings.
</div>';
$pdf->writeHTMLCell(90, 7, 125, 172, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> You may be eligible for a provisional 
<br>unlawful presence waiver. Provide a copy of the 
<br>administrative closure order. Also, if U.S. 
<br>Citizenship and Immigration Services (USCIS) 
<br>approves your provisional unlawful presence 
<br>waiver, it is important that you resolve your 
<br>removal, exclusion, or deportation proceedings 
<br>before you depart the United States for your 
<br>immigrant visa interview. 
</div>';
$pdf->writeHTMLCell(90, 7, 125, 194, $html, 0, 1, false, true, 'J', true);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b>(continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.b.   </b> <input type="checkbox" name="part1_28a " value="Y" checked=" " /> </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 26, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>I am currently in removal, exclusion, or deportation 
<br>proceedings that are not administratively closed, or 
<br>in removal, exclusion, or deportation proceedings 
<br>that were administratively closed, but EOIR has 
<br>placed my proceedings back on its calendar in order 
<br>to continue them.
</div>';
$pdf->writeHTMLCell(93, 7, 27, 26, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> You are ineligible for a provisional 
<br>unlawful presence waiver unless your proceedings 
<br>are administratively closed at the time you file your 
<br>Form I-601A, and the proceedings have not been 
<br>put back on EOIR\'s calendar to continue your 
<br>removal, exclusion, or deportation after having been 
<br>previously administratively closed.
</div>';
$pdf->writeHTMLCell(93, 7, 27, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>29.a.   </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 82, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Are you currently subject to a final order of removal, 
<br>exclusion or deportation? (This includes an order entered 
<br>in proceedings under INA section 239, an exclusion or 
<br>deportation order entered in proceedings initiated before 
<br>April 1, 1997, a Visa Waiver Program removal order 
<br>under INA section 217, an expedited removal order under 
<br>INA section 235, and a judicial order under INA section 
<br>238(c))?</div>';
$pdf->writeHTMLCell(95, 7, 21, 82, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_29" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_29" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78, 111, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Number 29.a.</b>, 
<br>you are ineligible for a provisional unlawful presence 
<br>waiver unless you applied for, and USCIS has already 
<br>approved, an application for permission to reapply for 
<br>admission under INA section 212(a)(9)(A)(iii) and 8 CFR 
<br>212.2 on Form I-212, Application for Permission to 
<br>Reapply for Admission into the United States after 
<br>Deportation or Removal. If you have already applied for 
<br>and if USCIS has already granted you permission to 
<br>reapply for admission, provide the relevant information in 
<br><b>Item Number 29.b.</b> If you answered "No" to <b>Item 
<br>Number 29.a</b>., go to <b>Item Number 31.</b></div>';
$pdf->writeHTMLCell(95, 7, 21, 118, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>29.b.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 167, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>USCIS Receipt Number for Your Approved Form I-212: </div>';
$pdf->writeHTMLCell(90, 7, 21, 167, $html, 0, 1, false, true, 'J', true);
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 29, 162, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_uscis_receipt',66, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 36, 173);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> You may also provide a copy of the approval 
<br>notice that USCIS sent to you when it approved your 
<br>Form I-212. </div>';
$pdf->writeHTMLCell(90, 7, 21, 180, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.a.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 193, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Has DHS served you with a DHS Form I-871, giving you 
<br>notice that DHS intends to reinstate a prior deportation, 
<br>exclusion, or removal order against you as permitted 
<br>under INA section 241(a)(5)?
</div>';
$pdf->writeHTMLCell(95, 7, 21, 193, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_30a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_30a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78, 207, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.b.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 213, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 30.a</b>., has DHS 
<br>served you with a final decision reinstating a prior 
<br>deportation, exclusion, or removal order under INA 
<br>section 241(a)(5)?
</div>';
$pdf->writeHTMLCell(95, 7, 21, 213, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_30b" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_30b" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78, 227, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>31.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Are you currently subject to a grant of voluntary 
<br>departure that has not expired and that was granted to you 
<br>by the immigration judge or the Board of Immigration 
<br>Appeals during removal, exclusion, or deportation 
<br>proceedings?
</div>';
$pdf->writeHTMLCell(95, 7, 121, 17, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_31" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_31" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 178,34, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Number 31.</b>, you 
<br>are ineligible for a provisional unlawful presence waiver.
</div>';
$pdf->writeHTMLCell(95, 7, 121, 41, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>If you were granted voluntary departure in the past, but 
<br>then you withdrew your voluntary departure request or 
<br>otherwise terminated voluntary departure you should not 
<br>select "Yes" to <b>Item Number 31.</b> In this case you may be 
<br>in removal proceedings or you may be the subject of a 
<br>final order of removal, deportation, or exclusion. You 
<br>should select the statements that apply to you in <b>Item 
<br>Numbers 27. - 28.b.</b> or <b>Item Number 29.a.</b> If you filed 
<br>a motion to withdraw your voluntary departure request, 
<br>please submit a copy with your Form I-601A. 

</div>';
$pdf->writeHTMLCell(95, 7, 121, 50, $html, 0, 1, false, true, 'J', true);
//............


$pdf->SetFont('times', '', 10);
$html ='<div>Answer <b>Item Numbers 32. - 38.</b> If you answer "Yes" to any 
<br>question in <b>Item Numbers 32. - 38.</b>, your application for a 
<br>provisional unlawful presence waiver may be denied as a matter 
<br>of discretion. For each "Yes" response for <b>Item Numbers 32. - 
<br>38.</b>, provide the location and date of the event and a brief 
<br>description in <b>Part 9. Additional Information.</b> For <b>Item 
<br>Number 34.</b>, if you were arrested but not charged with any 
<br>crime or offense, provide a statement or other documentation 
<br>from the arresting authority, prosecutor\'s office, or court to 
<br>show that you were not charged with any crime or offense. If 
<br>you answer "Yes" to <b>Item Number 35.</b>, you must provide all 
<br>related court dispositions.
</div>';
$pdf->writeHTMLCell(95, 7, 112, 92, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>32.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 141, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Have you <b>EVER</b> knowingly and willfully given false or 
<br>misleading information to a U.S. Government official 
<br>while applying for an immigration benefit or to gain entry 
<br>or admission into the United States?
</div>';
$pdf->writeHTMLCell(95, 7, 121, 141, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_32" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_32" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 178,155, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>33.</b> &nbsp; &nbsp; Have you <b>EVER</b> been engaged in alien smuggling?</div>';
$pdf->writeHTMLCell(90, 7, 112, 162, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_33" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_33" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 178,168, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>34.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 176, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Have you <b>EVER</b> been arrested, cited, or detained by a 
<br>law enforcement officer (including immigration and 
<br>military officers) in the United States, your home country, 
<br>and/or any other country for any reason other than traffic 
<br>violations?
</div>';
$pdf->writeHTMLCell(95, 7, 121, 176, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_34" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_34" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 178,192, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>35.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 200, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Have you <b>EVER</b> been charged, indicted, convicted, 
<br>imprisoned, or jailed in the United States, your home 
<br>country, and/or any other country for any crime or 
<br>offense?
</div>';
$pdf->writeHTMLCell(95, 7, 121, 200, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_35" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_35" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 178,213, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>36.</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 221, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Have you <b>EVER</b> trafficked in or are you <b>NOW</b> trafficking 
<br>in any controlled substance?
</div>';
$pdf->writeHTMLCell(95, 7, 121, 221, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_36" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_36" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 178,227, $html, 0, 1, false, true, 'J', true);
//..........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b>(continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>37.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 26, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Are you <b>NOW</b> or have you <b>EVER</b> knowingly assisted, 
<br>abetted, conspired, or colluded with others in the unlawful 
<br>trafficking of any controlled substance?
</div>';
$pdf->writeHTMLCell(95, 7, 20, 26, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_37" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_37" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78,36, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>38.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 41, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Are you <b>NOW </b> or have you <b>EVER</b> been engaged in 
<br>prostitution?
</div>';
$pdf->writeHTMLCell(95, 7, 20, 41, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part1_38" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_38" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 78,48, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div>Answer <b>Item Numbers 39.a. - 45.</b> If you answer "Yes" to any 
question in <b>Item Numbers 39.a. - 45.</b>, your application for a 
provisional unlawful presence waiver may be denied as a 
<br>matter of discretion. For each "Yes" response for <b>Item 
<br>Numbers 39.a. - 45.</b>, provide a complete explanation in 
<br><b>Part 9. Additional Information.</b>
</div>';
$pdf->writeHTMLCell(90, 7, 12, 55, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Have you <b>EVER</b> ordered, incited, called for, committed, assisted, 
helped with, or otherwise participated in any of the following:</b>
</div>';
$pdf->writeHTMLCell(85, 7, 12, 80, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>39.a.</b> &nbsp;&nbsp;Acts involving torture or genocide?';
$pdf->writeHTMLCell(90, 7, 12, 94, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_39a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part1_39a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 94, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>39.b.</b> &nbsp;&nbsp;Killing any person?';
$pdf->writeHTMLCell(90, 7, 12, 101, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_39b" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_39b" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 101, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>39.c.</b> &nbsp;&nbsp;Intentionally and severely injuring any person?';
$pdf->writeHTMLCell(90, 7, 12, 109, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_39c" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_39c" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 115, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>39.d.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 122, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Engaging in any kind of sexual contact or relations with 
<br>any person who was being forced or threatened? ';
$pdf->writeHTMLCell(90, 7, 21, 122, $html, '', 0, 0, true, 'L');
//............


$html ='<div><input type="checkbox" name="part1_39d" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_39d" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 131, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>39.e.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 137, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Limiting or denying any person\'s ability to exercise 
<br>religious beliefs? ';
$pdf->writeHTMLCell(90, 7, 21, 137, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_39e" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_39e" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 143, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER:</b> ';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>40.a.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 156, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Served in, been a member of, assisted in, or participated 
<br>in any military unit, paramilitary unit, police unit, self-<br>defense unit, vigilante unit, rebel group, guerilla group, 
militia, or insurgent organization? ';
$pdf->writeHTMLCell(90, 7, 21, 156, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_40a" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_40a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 170, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>40.b.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 178, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Served in any prison, jail, prison camp, detention facility, 
labor camp, or any other situation that involved detaining 
persons? ';
$pdf->writeHTMLCell(90, 7, 21, 178, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_40b" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_40b" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 188, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>41.</b> ';
$pdf->writeHTMLCell(90, 7, 12, 194, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> been a member of, assisted in, or 
<br>participated in any group, unit, or organization of any 
<br>kind in which you or other persons used any type of 
<br>weapon against any person or threatened to do so? ';
$pdf->writeHTMLCell(90, 7, 21, 194, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_41" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_41" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 211, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>42.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> assisted or participated in selling or 
providing weapons to any person who to your knowledge 
<br>used them against another person, or in transporting 
<br>weapons to any person who to your knowledge used them 
against another person? ';
$pdf->writeHTMLCell(90, 7, 121, 16, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_42" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_42" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 33, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>43.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 39, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> received any type of military, 
<br>paramilitary, or weapons training? ';
$pdf->writeHTMLCell(90, 7, 121, 39, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_43" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_43" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 45, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>44.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 52, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> recruited, enlisted, conscripted, or used 
<br>any person under 15 years of age to serve in or help an 
<br>armed force or group? ';
$pdf->writeHTMLCell(90, 7, 121, 52, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_44" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_44" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 61, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>45.</b> ';
$pdf->writeHTMLCell(90, 7, 112, 68, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you <b>EVER</b> used any person under 15 years of age 
<br>to take part in hostilities, or to help or provide services to 
<br>people in combat? ';
$pdf->writeHTMLCell(95, 7, 121, 68, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part1_45" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part1_45" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 77, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Biographic Information</b></div>';
$pdf->writeHTMLCell(90, 6, 114, 83, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;Ethnicity (Select <b>only one</b> box) </div>';
$pdf->writeHTMLCell(90, 7, 113, 91, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div>   <input type="checkbox" name="Latino" value="Y" checked=" " />&nbsp;&nbsp;Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 118, 96, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div>   <input type="checkbox" name="Not Hispanic" value="Y" checked=" " />&nbsp;&nbsp;Not Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 118, 101, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;Race (Select <b>all applicable</b> boxes) </div>';
$pdf->writeHTMLCell(90, 7, 113, 108, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="white" value="Y" checked=" " />&nbsp; White</div>';
$pdf->writeHTMLCell(90, 7, 120, 114, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Asian" value="Y" checked=" " />&nbsp; Asian</div>';
$pdf->writeHTMLCell(90, 7, 120, 119, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Black" value="Y" checked=" " />&nbsp; Black or African American</div>';
$pdf->writeHTMLCell(90, 7, 120, 124, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Alaska" value="Y" checked=" " />&nbsp; American Indian or Alaska Native</div>';
$pdf->writeHTMLCell(90, 7, 120, 129, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="Hawaiian" value="Y" checked=" " />&nbsp; Native Hawaiian or Other Pacific Islander</div>';
$pdf->writeHTMLCell(90, 7, 120, 134, $html, 0, 1, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.   </b>  Height </div>';
$pdf->writeHTMLCell(90, 7, 113, 141, $html, 0, 0, false, true, 'J', true);
//...............
$pdf->SetFont('times', '', 10);
$html= '<div>Feet </div>';
$pdf->writeHTMLCell(90, 7, 155, 141.3, $html, 0, 0, false, true, 'J', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$html= '<div>
<select name="processing_info_feet" size="0.5">
    <option value=" ">FT </option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 162, 141, $html, 0, 0, false, true, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html= '<div>Inches  </div>';
$pdf->writeHTMLCell(90, 7, 177.5, 141.3, $html, 0, 0, false, true, 'J', true);
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
$pdf->writeHTMLCell(90, 7, 188.5, 141, $html1, 0, 0, false, true, 'J', true);
//..........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.    </b>   Weight   &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp;Pounds </div>';
$pdf->writeHTMLCell(90, 7, 113, 149, $html, 0, 0, false, true, 'J', true);
// //...
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_info_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 149);
$pdf->TextField('processing_info_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 190, 149);
$pdf->TextField('processing_info_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 197, 149);

//...........
$pdf->SetFont('times', '', 10);
$html= '<div><b>5.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 113, 157, $html, 0, 0, false, true, 'J', true);
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
$pdf->writeHTMLCell(90, 7, 113, 163, $html, 0, 0, false, true, 'J', true);
//......
$pdf->SetFont('times', '', 10);
$html= '<div><b>6.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 113, 177, $html, 0, 0, false, true, 'J', true);
//.........$pdf->SetFont('times', '', 11);
$html= '<div>   
&nbsp;<input type="checkbox" name="blad" value="blad" checked="" /> Blad(No hair) 
&nbsp;&nbsp;<input type="checkbox" name="black1" value="black" checked="" /> Black
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="blond" value="blond" checked="" /> Blond <br>

 &nbsp; <input type="checkbox" name="brown " value="brown" checked="" /> brown 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; <input type="checkbox" name="gray1 " value="gray" checked="" /> Gray 
 &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox" name="red " value="red" checked="" /> Red <br>

 &nbsp; <input type="checkbox" name=" sandy" value=" sandy" checked="" /> Sandy  
&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; <input type="checkbox" name="white1" value="white" checked="" />  White
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown1" value="unknown" checked="" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 116, 183, $html, 0, 0, false, true, 'J', true);

//.......

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Information About Your Immigrant 
<br>Visa Case</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html= '<div>Provide the basis on which you are immigrating to the United 
States using the check boxes below. (Select only <b>one</b> box) </div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b><input type="checkbox" name="part3_1a" value="Y" checked=" " /> Diversity Visa Program Selectee or Derivative</div>';
$pdf->writeHTMLCell(90, 7, 12, 40, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b><input type="checkbox" name="part3_1b" value="Y" checked=" " /> Immediate Relative Petition (Form I-130)</div>';
$pdf->writeHTMLCell(90, 7, 12, 46, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b><input type="checkbox" name="part3_1c" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Preference-Based Family Petition (Form I-130), 
<br>including Derivatives </div>';
$pdf->writeHTMLCell(90, 7, 24, 52, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.d.  </b><input type="checkbox" name="part3_1d" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 61, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Employment-Based Petition (Form I-140), including 
<br>Derivatives </div>';
$pdf->writeHTMLCell(95, 7, 24, 61, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.e.  </b><input type="checkbox" name="part3_1e" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 69, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Special Immigrant/Widow Petition (Form I-360), 
<br>including Derivatives </div>';
$pdf->writeHTMLCell(95, 7, 24, 69, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>If you selected <b>Item Number 1.a.</b> because you are a Diversity 
<br>Visa (DV) Program selectee or derivative, provide information 
<br>about your (or your spouse\'s or parent\'s) DV case: </div>';
$pdf->writeHTMLCell(95, 7, 12, 80, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.     </b> DOS DV Case Number (KCC Case Number)</div>';
$pdf->writeHTMLCell(95, 7, 12, 94, $html, 0, 1, false, true, 'J', true);
//............


$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 91, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_dos_dv',69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 33, 100);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>DV Program Selectee\'s Full Name (If you are a derivative and 
your parent or spouse is the DV Program Selectee)  </div>';
$pdf->writeHTMLCell(90, 7, 12, 108, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 117, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 118);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 125, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 126);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.d.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 134, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 134);
//..........

$pdf->SetFont('times', '', 10);
$html ='If you selected <b>Item Numbers 1.b., 1.c., 1.d</b>., or <b>1.e.</b> provide 
<br>the following information about the approved immigrant visa 
petition (Form I-130, Form I-140, or Form I-360) that was filed 
on your (or your spouse\'s or parent\'s) behalf, or that you used to 
self-petition on your behalf, that is your basis to immigrate and 
the related Department of State (DOS) immigrant visa 
application.   </div>';
$pdf->writeHTMLCell(93, 7, 13, 143, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.     </b> USCIS Receipt Number</div>';
$pdf->writeHTMLCell(95, 7, 13, 172, $html, 0, 1, false, true, 'J', true);
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 29, 167, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_uscis_receipt_number',66, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 36, 178);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.     </b> DOS Consular Case Number (NVC Case Number)</div>';
$pdf->writeHTMLCell(95, 7, 13, 186, $html, 0, 1, false, true, 'J', true);
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 182, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_dos_consular_case',69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 33, 191);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Petitioner Name</b> (Provide the full name of the family member or 
the company who petitioned for you (or your spouse or parent).)</div>';
$pdf->writeHTMLCell(90, 7, 13, 199, $html, 0, 1, false, false, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 212, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 213);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.d.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 13, 221, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 222);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.e.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 231, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name1', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 231);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.f.  </b>  Company or Organization Name  </div>';
$pdf->writeHTMLCell(90, 7, 13, 238, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_company_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 243.5);
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Information About Your Qualifying 
Relative</b></div>';
$pdf->writeHTMLCell(90, 6, 114, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information about the qualifying relative 
(the U.S. citizen or Lawful Permanent Resident (LPR) spouse or 
parent) who would experience extreme hardship if you were 
refused admission to the United States.</div>';
$pdf->writeHTMLCell(93, 7, 113, 30, $html, 0, 1, false, true, 'L', true);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Your Qualifying Relative\'s Full Name and 
Relationship to You</i></b></div>';
$pdf->writeHTMLCell(90, 7, 114, 50, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 61, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name2', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 62);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 70, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name2', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 71);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 113, 80, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name2', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 80);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b><input type="checkbox" name="part4_2a" value="Y" checked=" " /> U.S. Citizen Spouse</div>';
$pdf->writeHTMLCell(90, 7, 113, 89, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b><input type="checkbox" name="part4_2b" value="Y" checked=" " /> U.S. Citizen Parent</div>';
$pdf->writeHTMLCell(90, 7, 113, 96, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b><input type="checkbox" name="part4_2c" value="Y" checked=" " /> LPR Spouse</div>';
$pdf->writeHTMLCell(90, 7, 113, 102, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.d.  </b><input type="checkbox" name="part4_2d" value="Y" checked=" " /> LPR Parent</div>';
$pdf->writeHTMLCell(90, 7, 113, 108, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Your Other Qualifying Relative</i></b></div>';
$pdf->writeHTMLCell(91, 7, 114, 117, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</div>';
$pdf->writeHTMLCell(90, 7, 113, 125, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Do you have more than one qualifying relative (U.S. citizen 
or LPR spouse or parent)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 125, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part4_3" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_3" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 175, 131, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 3.</b>, provide the 
other qualifying relative\'s name and your relationship to 
the qualifying relative in <b>Item Numbers 4.a. - 5.d.</b> 
<br>Also provide evidence of the U.S. citizenship or LPR 
status of the other qualifying relative with your 
application. See the <b>What Evidence Must I Submit
<br>With Form I-601A</b>  section of the Instructions.</div>';
$pdf->writeHTMLCell(83, 7, 119, 138, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Additional Qualifying Relative\'s Full Name and 
Relationship to You</i></b></div>';
$pdf->writeHTMLCell(91, 7, 114, 170, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 181, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_last_name3', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 182);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 113, 190, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_first_name3', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 191);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 113, 201, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_middle_name3', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 200);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b><input type="checkbox" name="part4_5a" value="Y" checked=" " /> U.S. Citizen Spouse</div>';
$pdf->writeHTMLCell(90, 7, 113, 210, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b><input type="checkbox" name="part4_5b" value="Y" checked=" " /> U.S. Citizen Parent</div>';
$pdf->writeHTMLCell(90, 7, 113, 217, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b><input type="checkbox" name="part4_5c" value="Y" checked=" " /> LPR Spouse</div>';
$pdf->writeHTMLCell(90, 7, 113, 224, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.d.  </b><input type="checkbox" name="part4_5d" value="Y" checked=" " /> LPR Parent</div>';
$pdf->writeHTMLCell(90, 7, 113, 231, $html, 0, 1, false, true, 'J', true);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Statement From Applicant</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>In the space provided, explain in detail why you believe USCIS 
should approve your application for a provisional unlawful 
presence waiver as a matter of discretion. Provide all of the 
reasons you believe support your application for this waiver, 
including information about the extreme hardship your 
qualifying relatives would experience if you were refused 
admission to the United States. If you need extra space to 
complete your statement, use the space provided in <b>Part 9. 
Additional Information.</b></div>';
$pdf->writeHTMLCell(91, 7, 12, 26, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="21" rows="51" name="statement_from_applicant">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 12, 61, $html, 0, 0, false, 'L');
//..............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Applicant\'s Statement, Contact 
Information, Declaration, Certification, and 
Signature</b></div>';
$pdf->writeHTMLCell(90, 6, 113, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-601A 
Instructions before completing this section. You must file Form 
I-601A while in the United States.</div>';
$pdf->writeHTMLCell(90, 7, 112, 34, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Applicant\'s Statement</i></b></div>';
$pdf->writeHTMLCell(91, 7, 112, 50, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b>  Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If 
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 58, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.    </b> &nbsp; <input type="checkbox" name="part6_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 15, 112, 68, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'I can read and understand English, and I have read 
and understand every question and instruction on this 
<br>application and my answer to every question.';
$pdf->writeHTMLCell(90, 7, 125, 68, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.    </b> &nbsp; <input type="checkbox" name="part6_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 15, 112, 81, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = 'The interpreter named in <b>Part 7.</b> read to me every 
<br>question and instruction on this application and my 
<br>answer to every question in';
$pdf->writeHTMLCell(90, 7, 125, 81, $html, '', 0, 0, true, 'L');

$pdf->writeHTMLCell(75, 7, 126, 94, '',  1,  1, false, true, 'R', true);

$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7, 201, 97, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'a language in which I am fluent, and I understood 
<br>everything. ';
$pdf->writeHTMLCell(90, 7, 125, 101, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.     </b> &nbsp; &nbsp; &nbsp;<input type="checkbox" name="part6_2" value="Y" checked=" " /> &nbsp; At my request, the preparer named in <b>Part 8</b>.,';
$pdf->writeHTMLCell(90, 7, 113, 110, $html, '', 0, 0, true, 'L');

$pdf->writeHTMLCell(75, 7, 126, 115, '',  1,  1, false, true, 'R', true);

$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7,201, 117, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = ' prepared this request for me based only upon
<br>information I provided or authorized. ';
$pdf->writeHTMLCell(90, 7, 126, 122, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. &nbsp;  &nbsp;&nbsp;</b> Applicant\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 113, 142, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_daytime', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 147);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Applicant\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 113, 155, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_mobile', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 160);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Applicant\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 113, 168, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_email', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 173);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Applicant\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(91, 7, 114, 134, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Applicant\'s Declaration and Certification</i></b></div>';
$pdf->writeHTMLCell(91, 7, 114, 184, $html, 0, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'Copies of any documents I have submitted are exact photocopies 
of unaltered, original documents, and I understand that USCIS 
may require that I submit original documents to USCIS at a later 
date. Furthermore, I authorize the release of any information 
from any and all of my records that USCIS may need to 
determine my eligibility for the immigration benefit that I seek. ';
$pdf->writeHTMLCell(95, 7, 113, 192, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I furthermore authorize release of information contained in this 
application, in supporting documents, and in my USCIS 
records, to other entities and persons where necessary for the 
administration and enforcement of U.S. immigration laws.
 ';
$pdf->writeHTMLCell(95, 7, 113, 217, $html, '', 0, 0, true, 'L');

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 7

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Applicant\'s Statement, Contact 
Information, Declaration, Certification, and 
Signature</b>(continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'I understand that USCIS will require me to appear for an 
appointment to take my biometrics (fingerprints, photograph, 
and/or signature) and, at that time, I will be required to sign an 
oath reaffirming that:

 ';
$pdf->writeHTMLCell(95, 7, 12, 34, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1)</b> I reviewed and understood all of the information 
<br>contained in, and submitted with, my application; and

 ';
$pdf->writeHTMLCell(95, 7, 20, 51, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = '<b>2)</b>  All of this information was complete, true, and correct 
<br>at the time of filing.

 ';
$pdf->writeHTMLCell(95, 7, 20, 60, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that all of the information in 
my application and any document submitted with it were 
<br>provided or authorized by me, that I reviewed and understand 
<br>all of the information contained in, and submitted with, my 
application and that all of this information is complete, true, <br>and 
correct.
 ';
$pdf->writeHTMLCell(95, 7, 13, 70, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 14, 97, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.</b> &nbsp;&nbsp;Applicant\'s Signature </div>';
$pdf->writeHTMLCell(92, 7, 13, 105, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(81.5, 7, 22, 110, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 13, 119, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 119);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill 
out this application or fail to submit required documents listed 
in the Instructions, USCIS may deny your application.

</div>';
$pdf->writeHTMLCell(93, 7, 13, 130, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Interpreter\'s Contact Information,
Certification, and Signature </b>  </div>';
$pdf->writeHTMLCell(90, 7, 14, 146, $html, 1, 1, true, false, 'L', true);
//............


$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information about the interpreter.

</div>';
$pdf->writeHTMLCell(93, 7, 13, 158, $html, 0, 1, false, true, 'J', true);
//............


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 14, 167, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.  </b> &nbsp; Interpreter\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 13, 175, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_family', 80.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 181);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.  </b> &nbsp; &nbsp;Interpreter\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 12, 189, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_given', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 195);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b> &nbsp; &nbsp;&nbsp; Interpreter\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 12, 203, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_business', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 208);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Interpreter\'s Mailing Address</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 18, $html, 0, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 113, 26, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 27); 
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="APt1" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="STe1" value="Ste2" checked="" />Ste. <input type="checkbox" name="FLr1" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 113, 36, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address__apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 36);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 113, 45, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 45);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 55, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="interpreter_mailing_address_state" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 130, 54, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 54);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 63, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 63);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 72, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 72);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 80, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 85);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Interpreter\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 96, $html, 0, 1, true, false, 'J', true);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Daytime Telephone Number';
$pdf->writeHTMLCell(90, 7, 113, 105, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_daytime_tele_number', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 110);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Mobile Telephone Number (if any)';
$pdf->writeHTMLCell(90, 7, 113, 119, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mobile_number', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 124);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter\'s Email Address (if any)';
$pdf->writeHTMLCell(90, 7, 113, 133, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mail_address', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 138);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Interpreter\'s  Certification</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 149, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that:';
$pdf->writeHTMLCell(90, 7, 113, 157, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I am fluent in English and';
$pdf->writeHTMLCell(90, 7, 113, 164, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_certification', 51.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 164);
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'which is the same language provided in <b>Part 6., Item Number 
1.b.,</b> and I have read to this applicant in the identified language 
every question and instruction on this application and his or her 
answer to every question. The applicant informed me that he or 
she understands every instruction, question, and answer on the 
application, including the <b>Applicant\'s Declaration and
Certification</b>, and has 
verified the accuracy of every answer.';
$pdf->writeHTMLCell(95, 7, 113, 171, $html, '', 0, 0, true, 'L');


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 204, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b>  &nbsp; &nbsp; Interpreter\'s Signature';
$pdf->writeHTMLCell(90, 7, 113, 212, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(80, 7, 124, 217, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b>  &nbsp; &nbsp;Date of Signature (mm/dd/yyyy)';
$pdf->writeHTMLCell(90, 7, 114, 227, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_signature_date', 33.2, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 226);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 1
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 8. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, If Other than the Applicant</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(92, 7, 12, 35, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Full Name</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 44, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.</b>&nbsp;&nbsp;&nbsp; Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 12, 52, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_full_famiy_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 57);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.</b>&nbsp;&nbsp;&nbsp; Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_full_given_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 70);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Preparer\'s Business or Organization Name (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_full_business_name', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 83);
//...............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Mailing Address</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 95.5, $html, 0, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number <br> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; and Name';
$pdf->writeHTMLCell(90, 7, 13, 105, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 107);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt1" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste1" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr1" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 13, 117, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address__apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 116);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 13, 126, $html, '', 0, 0, true, 'L');
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 126);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 13, 135, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_address_state" size="0.6">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 135, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 135);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 13, 144, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 144);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 13, 154, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 153);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 13, 161, $html, '', 0, 0, true, 'L');
$pdf->TextField('p8_mailing_address_3h', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 166.4);



$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 177, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b>&nbsp;&nbsp;&nbsp; &nbsp;Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 186, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 191);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp; Preparer\'s  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 205);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp; Preparer\'s Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 12, 213, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 218);
//...............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 18, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.   </b>    <input type="checkbox" name="preparer7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 26, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am not an attorney or accredited representative but
<br>&nbsp;have prepared this application on behalf of the

<br>&nbsp;applicant and with the applicant\'s consent. </div>';
$pdf->writeHTMLCell(90, 7, 125, 26, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.   </b>    <input type="checkbox" name="preparer7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 39, $html, 0, 1, false, true, 'J', true);
$html ='<div>I am an attorney or accredited representative and my<br>
representation of the applicant in this case extends/<br>
does not extend beyond the preparation of this<br>
application.</div>';
$pdf->writeHTMLCell(78, 7, 125, 39 , $html, 0, 1, false, true, 'J', true);

// $pdf->SetFont('times', '', 10);
// $html ='<div> extends  <input type="checkbox" name="extends" value="Y" checked=" " /> does not extend  <input type="checkbox" name="dontextend" value="Y" checked=" " /> <br>&nbsp;beyond the preparation of this application.
// </div>';
// $pdf->writeHTMLCell(90, 7, 124, 47, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you are an attorney or accredited <br>representative, you
may need to submit a completed <br>Form G-28, Notice of Entry of
Appearance as <br>Attorney or Accredited Representative, with this
<br>application. </div>';
$pdf->writeHTMLCell(95, 7, 125, 57, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Certification
</i></b></div>';
$pdf->writeHTMLCell(91, 7, 113, 81, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I certify, under penalty of perjury, that I<br>
prepared this application at the request of the applicant. The<br>
applicant then reviewed this completed application and informed<br>
me that he or she understands all of the information contained<br>
in, and submitted with, his or her application, including the<br>
<b>Applicant\'s Declaration and Certification</b>, and that all of this<br>
information is complete, true, and correct. I completed this<br>
application based only on information that the applicant<br>
provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(100, 7, 112, 89, $html, 0, 1, false, true, 'L', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b><i>Preparer\'s Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 130, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.</b> &nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 112, 140, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(82, 7, 121, 145, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 155, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('peparer_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169, 155);
//..........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 9
//..............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 9.  &nbsp;Additional Information</b><i></i></div>';
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

// $pdf->writeHTMLCell(45, 7, 57.9, 88, '',  1,  1, false, true, 'L', true);
$pdf->TextField('p9_additional_2_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 57.9, 88);

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
$html = <<<EOD
<textarea cols="20" rows="17" name="aditional_inf0_name_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 20, 111, $html, 0, 0, false, 'L');

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
$html = <<<EOD
<textarea cols="20" rows="17" name="aditional_inf0_name_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 20, 194, $html, 0, 0, false, 'L');

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


    'attorney_state_bar_number':' ',
    'attorney_or_according_representative':' ',
    'info_about_you_alien_reg':' ',
    'info_about_you_social_security':' ',
    'info_about_you_uscis_online':' ',
    'your_full_name_last_name':' ',
    'your_full_name_first_name':' ',
    'your_full_name_middle_name':' ',
    'your_full_name_last_name1':' ',
    'your_full_name_first_name1':' ',
    'your_full_name_middle_name1':' ',
    'your_full_name_last_name2':' ',
    'your_full_name_first_name2':' ',
    'your_full_name_middle_name2':' ',
    'mailing_in_care_name':' ',
    'mailing_street_number_name':' ',
    'mailing_apt_ste_flr':' ',
    'mailing_city_town':' ',
    'mailing_state':' ',
    'mailing_zipcode':' ',
    'physical_street_number_name':' ',
    'physical_apt_ste_flr':' ',
    'physical_city_town':' ',
    'physical_state':' ',
    'physical_zipcode':' ',
    'information_about_you_date_of_birth':' ',
    'information_about_you_city_town_birth':' ',
    'information_about_you_country_birth':' ',
    'information_about_you_country_citizenship':' ',
    'information_about_you_mother_last_name':' ',
    'information_about_you_mother_first_name':' ',
    'information_about_you_father_last_name':' ',
    'information_about_you_father_first_name':' ',
    'information_about_you_date_entry':' ',
    'info_about_you_state':' ',
    'information_about_you_place_port':' ',
    'information_about_you_immigration_status':' ',
    'information_about_you_place_port1':' ',
    'info_about_you_state1':' ',
    'information_about_you_from':' ',
    'information_about_you_to':' ',
    'information_about_you_immigration':' ',
    'information_about_you_place_port2':' ',
    'info_about_you_state2':' ',
    'information_about_you_from1':' ',
    'information_about_you_to1':' ',
    'information_about_you_immigration_status1':' ',
    'info_about_you_uscis_receipt':' ',
    'processing_info_feet':' ',
    'processing_info_inches':' ',
    'processing_info_pound1':' ',
    'processing_info_pound2':' ',
    'processing_info_pound3':' ',
    'info_about_you_dos_dv':' ',
    'info_about_last_name':' ',
    'info_about_first_name':' ',
    'info_about_middle_name':' ',
    'info_about_uscis_receipt_number':' ',
    'info_about_dos_consular_case':' ',
    'info_about_last_name1':' ',
    'info_about_first_name1':' ',
    'info_about_middle_name1':' ',
    'info_about_company_name':' ',
    'info_about_last_name2':' ',
    'info_about_first_name2':' ',
    'info_about_middle_name2':' ',
    'info_about_last_name3':' ',
    'info_about_first_name3':' ',
    'info_about_middle_name3':' ',
    'statement_from_applicant':' ',
    'applicant_contact_info_daytime':' ',
    'applicant_contact_info_mobile':' ',
    'applicant_contact_info_email':' ',
    'applicant_date_of_signature':' ',
    'interpreter_contact_info_family':' ',
    'interpreter_contact_info_given':' ',
    'interpreter_contact_info_business':' ',
    'interpreter_mailing_address_street_name':' ',
    'interpreter_mailing_address__apt_ste_flr':' ',
    'interpreter_mailing_address_city_or_town':' ',
    'interpreter_mailing_address_state':' ',
    'interpreter_mailing_address_zip_code':' ',
    'interpreter_mailing_address_province':' ',
    'interpreter_mailing_address_postal_code':' ',
    'interpreter_mailing_address_country':' ',
    'interpreter_daytime_tele_number':' ',
    'interpreter_mobile_number':' ',
    'interpreter_mail_address':' ',
    'interpreter_certification':' ',
    'interpreter_signature_date':' ',
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
    'additional_info_page_number':' ',
    'additional_info_part_number':' ',
    'additional_info_item_number':' ',
    'aditional_inf0_name_3d':' ',
    'additional_info_page_number1':' ',
    'additional_info_part_number1':' ',
    'additional_info_item_number1':' ',
    'aditional_inf0_name_4d':' ',
    'additional_info_page_number2':' ',
    'additional_info_part_number2':' ',
    'additional_info_item_number2':' ',
    'aditional_inf0_name_5d':' ',
    'additional_info_page_number3':' ',
    'additional_info_part_number3':' ',
    'additional_info_item_number3':' ',
    'aditional_inf0_name_6d':' ',
    'additional_info_page_number4':' ',
    'additional_info_part_number4':' ',
    'additional_info_item_number4':' ',
    'aditional_inf0_name_7d':' ',
    'p9_additional_2_a_number':' ',
    'p8_mailing_address_3h':' ',
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
$pdf->Output('I-601A.pdf', 'I');




