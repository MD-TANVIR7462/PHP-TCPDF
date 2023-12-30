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
		
		$this->Cell(40, 6, "Form I-539 Edition 12/08/21", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/I-539-footer-pdf417-$this->page.png";
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
$pdf->SetTitle('Form I-539');

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
$pdf->MultiCell(120, 15, "Application To Extend/Change Nonimmigrant Status", 0, 'C', 0, 1, 48, 9, true);

$pdf->SetFont('times', 'B', 11); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-539", 0, 'C', 0, 1, 174.5, 5.5, true);

$pdf->SetFont('times', 'B', 11);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0003\nExpires 12/31/2023", 0, 'C', 0, 1, 169, 18.5, true);

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

//.......table1 start
$pdf->SetFillColor(220,220,220); // set filling color
$pdf->writeHTMLCell(190, 54, 13, 32, "", 1, 1, false, false, 'C', true);//inner table
$pdf->writeHTMLCell (119, 27,13,32, "", 1, 1, false,true,'C', true); 

$pdf->writeHTMLCell(26, 27, 67, 32, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(53.8, 5, 13, 32.5, "", "B", 1, true, true, 'C', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(50, 4, 19, 33, "For USCIS Use Only",  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(54, 25, 13, 44, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$l ='<div><b>Returned</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 39, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(54, 25, 13, 49, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$l ='<div><b>Resubmitted</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 44, $l,  0,  1, false, true, 'L', false);


$pdf->SetFont('times', '', 10);
$l ='<div><b>Relocated</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 51.5, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(26, 10, 30, 49, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(37, 25, 30, 54, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$l ='<div><b>Received</b>  </div>';
$pdf->writeHTMLCell(40, 7, 31, 49, $l,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 10);
$l ='<div><b>Sent</b>  </div>';
$pdf->writeHTMLCell(40, 7, 31, 54, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(26, 27, 40, 59, "", "L", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$l ='<div><b>Remarks:</b>  </div>';
$pdf->writeHTMLCell(40, 7, 13, 60, $l,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(26, 27, 88, 59, "", "L", 1, false, true, 'C', true);

$pdf->writeHTMLCell(26, 27, 132, 59, "", "L", 1, false, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>  </b>   <input type="checkbox" name="attached" value="Y" checked=" " /> <b>Granted</b></div>';
$pdf->writeHTMLCell(30, 15, 30, 60, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(48, 25, 40, 66, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>New Class_____________</div>';
$pdf->writeHTMLCell(40, 15, 45, 66, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(48, 25, 40, 73, '',  'T',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 13, 57.5, 73, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Dates:</div>';
$pdf->writeHTMLCell(40, 15, 16, 76, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(30.5, 25, 57.5, 79.5, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 9);
$html ='<div>From ___/___/___</div>';
$pdf->writeHTMLCell(40, 15, 44, 73, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html ='<div>To ___/___/___</div>';
$pdf->writeHTMLCell(40, 15, 41, 80, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>  </b>   <input type="checkbox" name="attached1" value="Y" checked=" " /> &nbsp;&nbsp;<b>Denied</b></div>';
$pdf->writeHTMLCell(30, 15, 75, 60, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html ='<div><b>  </b>   <input type="checkbox" name="attached2" value="Y" checked=" " /> &nbsp;Still within period of stay</div>';
$pdf->writeHTMLCell(50, 15, 80, 67, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html ='<div><b>  </b>   <input type="checkbox" name="attached3" value="Y" checked=" " /> &nbsp;S/D to:______________</div>';
$pdf->writeHTMLCell(50, 15, 79, 73, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 9);
$html ='<div><b>  </b>   <input type="checkbox" name="attached4" value="Y" checked=" " /> &nbsp;Place under docket control</div>';
$pdf->writeHTMLCell(50, 15, 81, 80, $html, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(71, 25, 132, 79, '',  'T',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>  </b>   <input type="checkbox" name="attached5" value="Y" checked=" " /> &nbsp;<b>Applicant interviewed on</b> ______________</div>';
$pdf->writeHTMLCell(80, 15, 121, 79, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Action Block</b>  </div>';
$pdf->writeHTMLCell(80, 15, 95, 32, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Free Stamp</b>  </div>';
$pdf->writeHTMLCell(80, 15, 25, 32, $html, 0, 1, false, true, 'R', true);
//..............table1end

//.......table2start
$pdf->writeHTMLCell (190, 25,13,88, "", 1, 1, false,true,'C', true); 
$pdf->writeHTMLCell(40, 24.3, 13.5, 88.3, "", "R", 1, true, true, 'C', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>To be completed by an Attorney or Accredited Representative</b> (if any)  </div>';
$pdf->writeHTMLCell(40, 7, 15, 95, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('times', '', 12);
$html ='<div><b>  </b>   <input type="checkbox" name="attached4" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(40, 15, 20, 89, $html, 0, 1, false, true, 'R', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Select this box if <br>Form G-28 is <br>attached.</b></div>';
$pdf->writeHTMLCell(40, 15, 61, 91, $html, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 25, 92, 88, '',  'L',  1, false, true, 'L', true);

$pdf->writeHTMLCell(48, 25, 138, 88, '',  'L',  1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell(50, 15, 93, 90, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 42, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 94, 100);

$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or According Representative USCIS Online Account Number</b>(if any)</div>';
$pdf->writeHTMLCell(60, 15, 140, 90, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_or_according_representative', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 100);
//.......table2end

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 25, 136, false); // angle 1
//$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 55.5, false); // angle 2
$pdf->StopTransform();

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(190, 6, "START HERE - Type or print in black ink. ", '', 'L', 0, 1, 18, 113, true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 120, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Your Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 129, $html, 0, 1, true, false, 'J', true);

//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 137, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_last_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 138);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 146, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_first_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 147);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(90, 7, 12, 156, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 156);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 165, $html,  0,  1, false, true, 'L', false);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 152, false); // angle 1
//$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 55.5, false); // angle 2
$pdf->StopTransform();

$pdf->SetFont('times', '', 11);
$html ='<div><b>A-</b></div>';
$pdf->writeHTMLCell(90, 7, 49, 170, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('alien_reg_number', 47.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55.5, 170);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 179, $html,  0,  1, false, true, 'L', false);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('uscis_online_account_number', 63.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 39, 184);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 39, 205, false);
$pdf->StopTransform();
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 195, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  In Care Of Name (if any)   </div>';
$pdf->writeHTMLCell(90, 7, 13, 203, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_address_incare', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22.5, 208);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.</b>&nbsp;&nbsp;&nbsp;Street Number and Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 216, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_address_street_number_name', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22.5, 221);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 13, 231, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_address_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),60, 230);
//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 13, 240, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_address_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45.5, 239);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>4.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 13, 248, $html, '', 0, 0, true, 'L');

$html = '<select name="us_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 28, 248, $html, '', 0, 0, true, 'L');
$html= '<div><b>4.f.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 45, 248, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_mailing_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71.5, 248);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S Physical Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 115, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 123, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_address_street_number_name', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 124);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.b. </b>&nbsp;  <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 113, 133, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_address_apt_ste_flr', 43.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),159.5, 132);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 113, 140, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_address_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 140);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 4, 113, 148, $html, '', 0, 0, true, 'L');

$html = '<select name="us_physical_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 128, 148, $html, '', 0, 0, true, 'L');
$html= '<div><b>5.e.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 3, 145, 148, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_physical_address_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 148);
//..............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 159, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b> &nbsp; &nbsp;&nbsp;Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 113, 167, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('country_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 172);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b> &nbsp;&nbsp;&nbsp;   Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 113, 180, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('country_of_citizenship_nationality', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 185);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b> &nbsp;&nbsp;&nbsp; Date of Birth&nbsp;&nbsp;&nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 193, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('date_birth', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 165, 193);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.</b> &nbsp; &nbsp;&nbsp;U.S Social Security Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 113, 200, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 7, 128, 135, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('us_social_security_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156.1, 205);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.</b>&nbsp;&nbsp;&nbsp;Date of last Arrival Into the United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 212, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('last_arrival_into_the_united_states', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 217);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Provide Information About Your Most Recent Entry Into The United States</div>';
$pdf->writeHTMLCell(90, 7, 114, 224, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.</b> &nbsp;&nbsp;Form I-94 Arrival-Departure Record Number</div>';
$pdf->writeHTMLCell(90, 7, 114, 233, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_form_194', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 238);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 7, 128, 200, false); // angle 1
$pdf->StopTransform();
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.</b> &nbsp;&nbsp;Passport Number</div>';
$pdf->writeHTMLCell(90, 7, 114, 247, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_passport_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 247);

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 2
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You </b>(Continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13. </b> &nbsp;Travel Document Number </div>';
$pdf->writeHTMLCell(90, 7, 12, 28, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_travel_document_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 58, 28);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a. </b>  Country of Passport or Travel Document Issuance </div>';
$pdf->writeHTMLCell(90, 7, 12, 36, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_passport', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 41);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.b. </b>  Passport or Travel Document Expiration Date </div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);

$pdf->SetFont('times', '', 10);
$html ='<div>(mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 20, 53, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);

$pdf->TextField('information_about_you_passport_travel', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 55);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.a. </b> Current Nonimmigrant Status (e.g. F-1 student, H-4<br> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;dependent, etc.)  </div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_current_nonimmigrant', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 72);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.b.</b> &nbsp;Expiration Date (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_expiration_date', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 80);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.   </b>   <input type="checkbox" name="16" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 87, $html, 0, 1, false, true, 'J', true);
$html ='<div> Select this box if you were granted Duration of Status
<br>(D/S).</div>';
$pdf->writeHTMLCell(90, 7, 24, 87, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Application Type </b> </div>';
$pdf->writeHTMLCell(90, 7, 13, 103, $html, 1, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>I am applying for (select <b>only on</b> box):</div>';
$pdf->writeHTMLCell(90, 7, 12, 111, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.   </b> <input type="checkbox" name="1" value="Y" checked=" " /> &nbsp;Reinstatement to student status.</div>';
$pdf->writeHTMLCell(90, 7, 12, 118, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.   </b> <input type="checkbox" name="2" value="Y" checked=" " /> &nbsp;An extension of stay in my current status.</div>';
$pdf->writeHTMLCell(90, 7, 12, 125, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a   </b> <input type="checkbox" name="2" value="Y" checked=" " /> &nbsp;A change of status</div>';
$pdf->writeHTMLCell(90, 7, 12, 131, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b   </b>  New status and effective date of change (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 137, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_new_status', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 142);



$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c   </b> The change of status I am requesting is: </div>';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_change_of_status', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 155);

$pdf->SetFont('times', '', 10);
$html ='<div>Number of people included in this application (select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(90, 7, 12, 164, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.   </b> <input type="checkbox" name="1" value="Y" checked=" " /> &nbsp;I am the only applicant.</div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.   </b> <input type="checkbox" name="1" value="Y" checked=" " /> </div>';
$pdf->writeHTMLCell(90, 7, 12, 180, $html, 0, 1, false, false, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> Members of my family are filing this application with <br>me. </div>';
$pdf->writeHTMLCell(90, 7, 25, 179, $html, 0, 1, false, false, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.</b> </div>';
$pdf->writeHTMLCell(90, 7, 12, 191, $html, 0, 1, false, false, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>  The total number of people (including me) in the <br>&nbsp;&nbsp;application is: (Complete the supplement for each co-<br>&nbsp;&nbsp;applicant.)</div>';
$pdf->writeHTMLCell(95, 7, 19, 191, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_total_number', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 200);
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Processing Information </b> </div>';
$pdf->writeHTMLCell(90, 7, 13, 212, $html, 1, 1, true, false, 'L', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b></div>';
$pdf->writeHTMLCell(95, 7, 12, 220, $html, 0, 1, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10);
$html ='<div>  I/We request that my/our current or requested status be <br>&nbsp;&nbsp;extended until (mm/dd/yyyy):</div>';
$pdf->writeHTMLCell(95, 7, 18, 220, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_info_request_that', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 225);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.</b></div>';
$pdf->writeHTMLCell(95, 7, 12, 233, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> Is this application based on an extension or change of <br>status already granted to your spouse, child, or parent?</div>';
$pdf->writeHTMLCell(95, 7, 19, 233, $html, 0, 1, false, true, 'J', true);
//............

$html ='<div><input type="checkbox" name="part3_2a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part3_2a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 243, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.</b></div>';
$pdf->writeHTMLCell(95, 7, 112, 18, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> If you answered "Yes" to <b>Item Number 2.a</b>., provide <br>&nbsp;USCIS Receipt Number. </div>';
$pdf->writeHTMLCell(95, 7, 119, 18, $html, 0, 1, false, true, 'J', true);
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 135, 1, false); // angle
$pdf->StopTransform();


//.......
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('processing_info_item_number', 66, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 138, 27);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.</b></div>';
$pdf->writeHTMLCell(95, 7, 112, 34, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Is this application based on a separate petition or application <br>to provide your spouse, child, or parent an extension or <br>change of status?</div>';
$pdf->writeHTMLCell(90, 7, 120, 34, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="3.a" value="Y" checked=" " />&nbsp;&nbsp;Yes, filed with this Form 1-539.</div>';
$pdf->writeHTMLCell(90, 7, 119, 47, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="3.a1" value="Y" checked=" " />&nbsp;&nbsp;No</div>';
$pdf->writeHTMLCell(90, 7, 180, 47, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="3.a2" value="Y" checked=" " />&nbsp;&nbsp;Yes, filed previously and pending with U.S.</div>';
$pdf->writeHTMLCell(90, 7, 119, 53, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>Citizenship and Immigration Services (USCIS). </div>';
$pdf->writeHTMLCell(90, 7, 113, 57, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.</b> </div>';
$pdf->writeHTMLCell(90, 7, 113, 63, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div>If pending with USCIS, provide USCIS Receipt Number. </div>';
$pdf->writeHTMLCell(90, 7, 121, 63, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_pending_with_uscis', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 137, 68);
//............

$pdf->SetFont('times', '', 10);
$html ='<div></div>';
$pdf->writeHTMLCell(90, 7, 121, 63, $html, 0, 1, false, true, 'J', true);
//............

//$pdf->StartTransform();
//$pdf->SetFillColor(0,0,0);
//$pdf->Rotate(-245);
//$pdf->SetFont('zapfdingbats', 'B', 10);
//$pdf->MultiCell(10, 10, "t", '', 'L', 1, 1, 20, 70, false); // angle 1
//$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div>If the petition or application is pending with USCIS, also provide the following information:</div>';
$pdf->writeHTMLCell(90, 7, 113, 75, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First and Last Name of Petitioner or Applicant</div>';
$pdf->writeHTMLCell(90, 7, 113, 85, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_first_and_last', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 90);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Filed (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 99, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_date_filed', 38, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 166, 99);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Additional Information About the Applicant </b> </div>';
$pdf->writeHTMLCell(90, 7, 114, 110, $html, 1, 1, true, false, 'L', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div>Provide Your Current Passport Information (if different from
<b>Part 1.</b>)</div>';
$pdf->writeHTMLCell(90, 7, 113, 122, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.</b> &nbsp;&nbsp;&nbsp;Passport Number</div>';
$pdf->writeHTMLCell(90, 7, 113, 132, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_passport_number', 54, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 132);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.</b> &nbsp;&nbsp;Country of Passport Issuance</div>';
$pdf->writeHTMLCell(90, 7, 113, 140, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_country_passport', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 145);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.</b> &nbsp;&nbsp;Passport Expiration Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 153, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('process_info_passport_expiration_date', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 158);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Physical Address Abroad</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 169, $html, 0, 1, true, false, 'J', true);

//..............

$pdf->SetFont('times', '', 10);
$html = '<b>2.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 113, 177, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('physical_address_abroad_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 178);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>2.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt1" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste1" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr1" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 113, 188, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_abroad_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 187);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 113, 197, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_abroad_city_or_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  144, 196);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.d.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 205, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_abroad_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 205);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.e.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 214, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_abroad_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 214);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.f.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 223, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('physical_address_abroad_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 228);
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Answer the following questions. If you answer "Yes" to any of
the questions in <b>Item Numbers 3. - 15.</b>, use the space provided
in <b>Part 8. Additional Information</b> to provide an explanation.';
$pdf->writeHTMLCell(95, 7, 113, 237, $html, '', 0, 0, true, 'L');

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Additional Information About the Applicant </b> </div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.</b>';
$pdf->writeHTMLCell(90, 7, 13, 30, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Are you, or any other person included on the application,
<br>an applicant for an immigrant visa?';
$pdf->writeHTMLCell(90, 7, 20, 30, $html, '', 0, 0, true, 'L');


$html ='<div><input type="checkbox" name="part4_3" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_3" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 36, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4.</b>';
$pdf->writeHTMLCell(90, 7, 13, 42, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Has an immigrant petition <b>EVER</b> been filed for you or for
<br>any other person included in this application?
';
$pdf->writeHTMLCell(90, 7, 20, 42, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_4" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_4" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 50, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.</b>';
$pdf->writeHTMLCell(90, 7, 13, 55, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Has Form 1-485, Application to Register Permanent
Residence or Adjust Status, EVER been filed by you or
<br>by any other person included in this application?
 ';
$pdf->writeHTMLCell(90, 7, 20, 55, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_5" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_5" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 67, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.</b>';
$pdf->writeHTMLCell(90, 7, 13, 73, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you, or any other person included in this application,
<b>EVER</b> been arrested or convicted of any criminal offense
since last entering the United States?
 ';
$pdf->writeHTMLCell(90, 7, 20, 73, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_6" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_6" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 83, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you, or any other person included on the application,
<b>EVER</b> ordered, incited, called for, committed, assisted, helped
with, or otherwise participated in any of the following:
 ';
$pdf->writeHTMLCell(90, 7, 13, 89, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b> &nbsp;&nbsp;Acts involving torture or genocide?';
$pdf->writeHTMLCell(90, 7, 13, 104, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part4_7a" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="part4_7a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 104, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b> &nbsp;&nbsp;Killing any person?';
$pdf->writeHTMLCell(90, 7, 13, 111, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part4_7b" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_7b" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 111, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.c.</b> &nbsp;&nbsp;Intentionally and severely injuring any person?';
$pdf->writeHTMLCell(90, 7, 13, 117, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part4_7c" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_7c" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 122, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.d.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 128, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = ' Engaging in any kind of sexual contact or relations with
<br>any person who did not consent or was unable to consent,
<br>or was being forced or threatened? ';
$pdf->writeHTMLCell(90, 7, 21, 128, $html, '', 0, 0, true, 'L');
//............

$html ='<div><input type="checkbox" name="part4_7d" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_7d" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 137, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.e.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 143, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 10); // set font
$html = 'Limiting or denying any person\'s ability to exercise
<br>religious beliefs? ';
$pdf->writeHTMLCell(90, 7, 21, 143, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_7e" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_7e" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 148, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'Have you, or any other person included on the application,
<b>EVER</b>: ';
$pdf->writeHTMLCell(90, 7, 13, 154, $html, '', 0, 0, true, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.a.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 164, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' Served in, been a member of, assisted, or participated in any

military unit, paramilitary unit, police unit, self-defense unit,
vigilante unit, rebel group, guerrilla group, militia, insurgent
organization, or any other armed group? ';
$pdf->writeHTMLCell(85, 7, 21, 164, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_8a" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_8a" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 180, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.b.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  Worked, volunteered, or otherwise served in any prison,
jail, prison camp, detention facility, labor camp, or any
other situation that involved detaining persons?
 ';
$pdf->writeHTMLCell(85, 7, 21, 187, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_8b" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_8b" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 200, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.</b> ';
$pdf->writeHTMLCell(90, 7, 13, 210, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' Have you, or any other person included in this application.
<b>EVER</b> been a member of, assisted, or participated in any
group, unit, or organization of any kind in which you or
other persons used any type of weapon against any person
or threatened to do so?
 ';
$pdf->writeHTMLCell(85, 7, 21, 210, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_9" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_9" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 78, 227, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.</b> ';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' Have you, or any other person included in this
<br>application, <b>EVER</b> assisted or participated in selling,
<br>providing, or transporting weapons to any person who, to
<br>your knowledge, used them against another person?
 ';
$pdf->writeHTMLCell(90, 7, 121, 17, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_10" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_10" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 34, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>11.</b> ';
$pdf->writeHTMLCell(90, 7, 113, 40, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  Have you, or any other person included in this
<br>application, <b>EVER</b> received any type of military,
<br>paramilitary, or weapons training?
 ';
$pdf->writeHTMLCell(90, 7, 121, 40, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_11" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_11" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 50, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.</b> ';
$pdf->writeHTMLCell(90, 7, 113, 57, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  Have you, or any other person included in this

application, done anything that violated the terms of the
nonimmigrant status you now hold?
 ';
$pdf->writeHTMLCell(90, 7, 121, 57, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_12" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_12" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 66, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>13.</b> ';
$pdf->writeHTMLCell(90, 7, 113, 72, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' Are you, or any other person included in this application
now in removal proceedings?
 ';
$pdf->writeHTMLCell(90, 7, 121, 72, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_13" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_13" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 77, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = 'If you answered "Yes" to <b>Item Number 13</b>., provide the
following information concerning the removal proceedings in
<br>the space provided in <b>Part 8. Additional Information.</b>Include <br>the name of the person in removal proceedings and information on jurisdiction, date proceedings began, and status of
<br>proceedings.
 ';
$pdf->writeHTMLCell(95, 7, 113, 84, $html, '', 0, 0, true, 'L');

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.</b> ';
$pdf->writeHTMLCell(90, 7, 113, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  Have you, or any other person included in this
<br>application, been employed in the United States since last
dmitted or granted an extension or change of status?
 ';
$pdf->writeHTMLCell(90, 7, 121, 110, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_14" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_14" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 180, 124, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '  If you answered "No" to <b>Item Number 14</b>., fully describe how

you are supporting yourself in <b>Part 8. Additional Information</b>
Include documentary evidence of the source, amount, and basis
for any income.
 ';
$pdf->writeHTMLCell(95, 7, 113, 131, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' If you answered "Yes" to <b>Item Number 14</b>., fully describe the
employment in <b>Part 8. Additional Information.</b> Include the
name of the person employed, name and address of the
<br>employer, weekly income, and whether the employment was
specifically authorized by USCIS.
 ';
$pdf->writeHTMLCell(95, 7, 113, 149, $html, '', 0, 0, true, 'L');
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>15.</b> ';
$pdf->writeHTMLCell(90, 7, 113, 171, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  Are you, or any other person included in this application,
currently or have you ever been a J-I exchange visitor or
<br>a J-2 dependent of a J-1 exchange visitor?

 ';
$pdf->writeHTMLCell(90, 7, 121, 171, $html, '', 0, 0, true, 'L');

$html ='<div><input type="checkbox" name="part4_15" value="Y" checked=" " />   Yes   &nbsp; <input type="checkbox" name="part4_15" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 180, 183, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html = ' If you answered "Yes" to <b>Item Number 15</b>., you must provide
he dates you maintained status as a J-1 exchange visitor or J-2
dependent in <b>Part 8. Additional Information</b>. ';
$pdf->writeHTMLCell(90, 7, 113, 188, $html, '', 0, 0, true, 'L');

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
//..............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5.  Applicant\'s Statement, Contact
Information, Declaration, Certification and
Signature </b> </div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//............

$pdf->SetFont('times', '', 10); // set font
$html = ' <b>NOTE:</b> &nbsp;Read the <b>Penalties</b> section of the Form I-539
Instructions before completing this section.
  ';
$pdf->writeHTMLCell(90, 7, 12, 35, $html, '', 0, 0, true, 'L');
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 48, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = ' <b>NOTE:</b> &nbsp;Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If
applicable, select the box for <b>Item Number 2.</b>
  ';
$pdf->writeHTMLCell(90, 7, 12, 56, $html, '', 0, 0, true, 'L');
//...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a   </b> &nbsp; &nbsp;  &nbsp;<input type="checkbox" name="1a" value="Y" checked=" " /> ';
$pdf->writeHTMLCell(90, 7, 12, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  I can read and understand English, and I have read
<br>and understand every question and instruction on this
<br>application and my answer to every question.

 ';
$pdf->writeHTMLCell(90, 7, 26, 66, $html, '', 0, 0, true, 'L');
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b  </b> &nbsp; &nbsp;  &nbsp;<input type="checkbox" name="1b" value="Y" checked=" " /> ';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '  The interpreter named in <b>Part 6.</b> read to me every <br>question and instruction on this application and my<br>
answer to every question in

 ';
$pdf->writeHTMLCell(90, 7, 26, 80, $html, '', 0, 0, true, 'L');

$pdf->writeHTMLCell(75, 7, 28, 93, '',  1,  1, false, true, 'R', true);

$pdf->SetFont('times', '', 10); // set font
$html = ' a language in which I am fluent, and I understood
<br>everything.
 ';
$pdf->writeHTMLCell(90, 7, 26, 100, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.     </b> &nbsp; &nbsp;  &nbsp;<input type="checkbox" name="2" value="Y" checked=" " /> &nbsp; &nbsp; At my request, the preparer named in <b>Part 7</b>.,';
$pdf->writeHTMLCell(90, 7, 13, 110, $html, '', 0, 0, true, 'L');

$pdf->writeHTMLCell(75, 7, 28, 115, '',  1,  1, false, true, 'R', true);

$pdf->SetFont('times', '', 10); // set font
$html = ' prepared this application for me based only upon
<br>information I provided or authorized. ';
$pdf->writeHTMLCell(90, 7, 26, 122, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 134, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. &nbsp;  &nbsp;&nbsp;</b> Applicant\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 13, 142, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_daytime', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 147);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Applicant\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 155, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_mobile', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 160);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Applicant\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 168, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_contact_info_email', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 173);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Declaration and Certification</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 184, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = 'Copies of any documents I have submitted are exact
<br>photocopies of unaltered, original documents, and I understand
that USCIS may require that I submit original documents to
USCIS at a later date. Furthermore, I authorize the release of
<br>any information from any and all of my records that USCIS

<br>may need to determine my eligibility for the immigration
<br>benefit that I seek. ';
$pdf->writeHTMLCell(95, 7, 13, 192, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I furthermore authorize release of information contained in this
application, in supporting docu
its, and in my USCIS
<br>records, to other entities and persons where necessary for the
dministration and enforcement of U.S. immigration law.
 ';
$pdf->writeHTMLCell(95, 7, 13, 222, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I understand that USCIS will require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, I will be required to sign an
oath reaffirming that:';
$pdf->writeHTMLCell(95, 7, 113, 17, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1)</b>';
$pdf->writeHTMLCell(95, 7, 120, 34, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' I reviewed and understood all of the information
<br>contained in, and submitted with, my application; and';
$pdf->writeHTMLCell(95, 7, 125, 34, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2)</b>';
$pdf->writeHTMLCell(95, 7, 120, 44, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' All of this information was complete, true, and correct
<br>at the time of filing.';
$pdf->writeHTMLCell(95, 7, 125, 44, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that all of the information in

my application and any document submitted with it were
provided or authorized by me, that I reviewed and understand
<br>all of the information contained in, and submitted with, my
application and that all of this information is complete, true, and
correct.';
$pdf->writeHTMLCell(95, 7, 113, 55, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 114, 83, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = ' <b>6.a. </b> &nbsp; Applicant\'s Signature';
$pdf->writeHTMLCell(95, 7, 114, 91, $html, '', 0, 0, true, 'L');

$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 114, 94, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 122, 96, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = ' <b>6.b. </b> &nbsp;Date of Signature (mm/dd/yyyy)';
$pdf->writeHTMLCell(95, 7, 114, 105, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('applicant_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 175, 105);
//............

$pdf->SetFont('times', '', 10); // set font
$html = ' <b> NOTE TO ALL APPLICANTS: </b>  If you do not completely fill
out this application or fail to submit required documents listed
<br>in the Instructions, USCIS may deny your application. ';
$pdf->writeHTMLCell(95, 7, 114, 115, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Interpreter\'s Contact Information,
Statement, Certification, and Signature </b> </div>';
$pdf->writeHTMLCell(90, 7, 115, 132, $html, 1, 1, true, false, 'L', true);
//............

$pdf->SetFont('times', '', 10); // set font
$html = ' Provide the following information about the interpreter.';
$pdf->writeHTMLCell(95, 7, 114, 144, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 115, 151, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.  </b> &nbsp; Interpreter\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 114, 159, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_family', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124, 164);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.  </b> &nbsp; Interpreter\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 114, 172, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_given', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124, 177);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b> &nbsp; &nbsp;&nbsp; Interpreter\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 114, 186, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_business', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 124, 191);
//............

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
//...........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 6. Interpreter\'s Contact Information,
Statement, Certification, and Signature </b> (continued) </div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 39, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 13, 47, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45.5, 48);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="apT1" value="apT1" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="sTe1" value="sTe1" checked="" />Ste. <input type="checkbox" name="fLr2" value="fLr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 13, 57, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address__apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63.5, 57);
//.........
                                        
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 13, 67, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45.5, 66);
//........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 13, 75, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 30, 75, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70.5, 75);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 13, 85, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 84);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 13, 94, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 93);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 13, 101, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 106);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 14, 117, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Daytime Telephone Number ';
$pdf->writeHTMLCell(90, 7, 13, 125, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_daytime', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 130);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Mobile Telephone Number (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 138, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_mobile', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 143);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6. &nbsp;  &nbsp;&nbsp;</b> Interpreter\'s Email Address (if any) ';
$pdf->writeHTMLCell(90, 7, 13, 151, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_contact_info_email', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 156);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Certifiaction</b></div>';
$pdf->writeHTMLCell(90, 7, 14, 167, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that:
     ';
$pdf->writeHTMLCell(90, 7, 13, 174, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = 'I am fluent in English and
     ';
$pdf->writeHTMLCell(90, 7, 13, 180, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_certification_english', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 179);
//............

$pdf->SetFont('times', '', 10); // set font
$html = ',';
$pdf->writeHTMLCell(90, 7, 102, 180, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html = ' which is the same language specified in <b>Part 5., Item Number</b>

<b>1.b</b>., and I have read to this applicant in the identified language
every question and instruction on this application and his or her answer to every question. The applicant informed me that he or
she understands every instruction, question, and answer on the
application, including the <b>Applicant\'s Declaration and
Certification</b>, and has verified the accuracy of every answer.';
$pdf->writeHTMLCell(95, 7, 13, 187, $html, '', 0, 0, true, 'L');
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 14, 218, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.a.</b>  &nbsp; &nbsp;Interpreter\'s Signature';
$pdf->writeHTMLCell(90, 7, 13, 226, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(80.5, 7, 23, 231, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.b.</b>  &nbsp; &nbsp;Date of Signature (mm/dd/yyyy)';
$pdf->writeHTMLCell(90, 7, 13, 241, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_signature_date', 33.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 240);
//............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, If Other than the Applicant</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 18.5, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = 'Provide the following information about the preparer.';
$pdf->writeHTMLCell(90, 7, 113, 35, $html, '', 0, 0, true, 'L');

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 44, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.a.  </b> &nbsp; Preparer\'s Family Name (Last Name) ';
$pdf->writeHTMLCell(95, 7, 112, 52, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_family', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122.5, 57);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.b.  </b> &nbsp; Preparer\'s Given Name (First Name) ';
$pdf->writeHTMLCell(95, 7, 112, 65, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_given', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 70);
//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.  </b> &nbsp; &nbsp;&nbsp; Preparer\'s Business or Organization Name (if any)';
$pdf->writeHTMLCell(95, 7, 112, 78, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_contact_info_business', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 83);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 94, $html, 0, 1, true, false, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(90, 7, 113, 102, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 103);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt1" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste1" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr1" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 113, 113, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address__apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 112);
//.........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp; &nbsp;City or Town';
$pdf->writeHTMLCell(90, 7, 113, 121, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  146, 121);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 130, 130, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 130);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(90, 7, 113, 138, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_province', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 139);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(90, 7, 113, 148, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_postal_code', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 148);
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(90, 7, 113, 155, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_address_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 160);
//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Contact Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 113, 174, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b>&nbsp;&nbsp;&nbsp; &nbsp;Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_daytime', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 188);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp; Preparer\'s  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 197, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_mobile', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 202);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp; Preparer\'s Email Address (if any)
</div>';
$pdf->writeHTMLCell(90, 7, 112, 210, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_info_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 215);
//...............


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 6
//.............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, If Other than the Applicant</b> (continued)</div>';
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

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.   </b>    <input type="checkbox" name="preparer7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 51, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am not an attorney or accredited representative but
<br>&nbsp;have prepared this application on behalf of the

<br>&nbsp;applicant and with the applicant\'s consent. </div>';
$pdf->writeHTMLCell(90, 7, 25, 51, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.   </b>    <input type="checkbox" name="preparer7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 64, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am an attorney or accredited representative and my
representation of the applicant in this case </div>';
$pdf->writeHTMLCell(78, 7, 25, 64 , $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div> extends  <input type="checkbox" name="extends" value="Y" checked=" " /> does not extend  <input type="checkbox" name="dontextend" value="Y" checked=" " /> <br>&nbsp;beyond the preparation of this application.
</div>';
$pdf->writeHTMLCell(90, 7, 25, 72, $html, 0, 1, false, true, 'J', true);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you are an attorney or accredited representative, you
may need to submit a completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited Representative, with this
application. </div>';
$pdf->writeHTMLCell(95, 7, 12, 82, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 103, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>By my signature, I certify, under penalty of perjury, that I prepared
this application at the request of the applicant. The applicant then
reviewed this completed application and informed me that he or
she understands all of the information contained in, and submitted
with, his or her application, including the <b>Applicant\'s

Certification</b>, and that all of this information is complete, true,
and correct. I completed this application based only on
information that the applicant provided to me or authorized me to
obtain or use.</div>';
$pdf->writeHTMLCell(93, 7, 12, 111, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 152, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.</b> &nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 160, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 20, 165, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 175, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('peparer_date_of_signature', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69, 174);
//..........

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 7
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
    'attorney_state_bar_number':' ',
    'attorney_or_according_representative':' ',
    'information_about_you_last_name':' ',
    'information_about_you_first_name':' ',
    'information_about_you_middle_name':' ',
    'alien_reg_number':' ',
    'uscis_online_account_number':' ',
    'us_mailing_address_incare':' ',
    'us_mailing_address_street_number_name':' ',
    'us_mailing_address_apt_ste_flr':' ',
    'us_mailing_address_city_town':' ',
    'us_mailing_address_state':' ',
    'us_mailing_address_zipcode':' ',
    'us_physical_address_street_number_name':' ',
    'us_physical_address_apt_ste_flr':' ',
    'us_physical_address_city_town':' ',
    'us_physical_address_state':' ',
    'us_physical_address_zipcode':' ',
    'country_of_birth':' ',
    'country_of_citizenship_nationality':' ',
    'date_birth':' ',
    'us_social_security_number':' ',
    'last_arrival_into_the_united_states':' ',
    'other_info_form_194':' ',
    'information_about_you_travel_document_number':' ',
    'information_about_you_country_passport':' ',
    'information_about_you_passport_travel':' ',
    'information_about_you_current_nonimmigrant':' ',
    'information_about_you_new_status':' ',
    'information_about_you_expiration_date':' ',
    'information_about_you_change_of_status':' ',
    'information_about_you_total_number':' ',
    'processing_info_request_that':' ',
    'processing_info_item_number':' ',
    'process_info_pending_with_uscis':' ',
    'process_info_first_and_last':' ',
    'process_info_date_filed':' ',
    'process_info_passport_number':' ',
    'process_info_country_passport':' ',
    'process_info_passport_expiration_date':' ',
    'physical_address_abroad_street_name':' ',
    'physical_address_abroad_apt_ste_flr':' ',
    'physical_address_abroad_city_or_town':' ',
    'physical_address_abroad_province':' ',
    'physical_address_abroad_address_postal_code':' ',
    'physical_address_abroad_country':' ',
    'applicant_contact_info_daytime':' ',
    'applicant_contact_info_mobile':' ',
    'applicant_contact_info_email':' ',
    'applicant_signature_date':' ',
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
    'interpreter_contact_info_daytime':' ',
    'interpreter_contact_info_mobile':' ',
    'interpreter_contact_info_email':' ',
    'interpreter_certification_english':' ',
    'interpreter_signature_date':' ',
    'preparer_contact_info_family':' ',
    'preparer_contact_info_given':' ',
    'preparer_contact_info_business':' ',
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
    'aditional_inf0_name_5d':' ',
    'additional_info_page_number3':' ',
    'additional_info_part_number3':' ',
    'additional_info_item_number3':' ',
    'aditional_inf0_name_6d':' ',
    'additional_info_page_number4':' ',
    'additional_info_part_number4':' ',
    'additional_info_item_number4':' ',
    'aditional_inf0_name_7d':' ',
    'other_info_passport_number':' ',
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