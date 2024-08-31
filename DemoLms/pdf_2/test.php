<?php
// require_once('formheader.php');   //database connection file 
require_once("config.php");
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
		
		$this->Cell(40, 6, "Form I-485 Edition 04/01/24", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/i485/I-485-footer-pdf417-$this->page.png";
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
        // $this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0);
		
		
		$this->MultiCell(61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 156, 264.5, true);
		
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

		// CODE 39 EXTENDED + CHECKSUMF
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
$pdf->SetTitle('Form I-485');

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


/********************************
******** Start Page No 1 ********
*********************************/

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
$pdf->Image($logo, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(100, 15, "Application to Register Permanent Residence or Adjust Status", 0, 'C', 0, 1, 55, 5, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-485", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0023\nExpires 02/28/2026", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 13);
$html ='<div><b>For USCIS Use Only</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 32, $html, 'LTR', 1, true, false, 'C', true);
$pdf->writeHTMLCell(190, 55, 13, 39, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', 'B', 8);
$pdf->writeHTMLCell(55, 6, 13, 39, 'Preference Category:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(55, 6, 13, 45, 'Country Chargeable:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(55, 6, 13, 51, 'Priority Date:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(55, 6, 13, 57, 'Date Form I-693 Received:',  'BR',  1, false, true, 'L', true);
$pdf->writeHTMLCell(15, 31, 53, 63, '',  'R',  1, false, true, 'L', true);//middle verticle row 1 
$pdf->writeHTMLCell(15, 31, 120, 63, '',  'R',  1, false, true, 'L', true);//middle verticle row 2


$pdf->SetFont('times', '', 6);
$pdf->writeHTMLCell(2, 1, 15, 66, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(17, 7, 18, 65, 'Applicant Interviewed',  0,  1, false, true, 'L', false);


$pdf->SetFont('times', '', 6);
$pdf->writeHTMLCell(2, 1, 43, 66, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(17, 7, 46, 65, 'Interview Waived',  0,  1, false, true, 'L', false);

$html ='<div>Date of <br>
Initial Interview :__________________</div>';
$pdf->writeHTMLCell(55, 7, 13, 73, $html,  0,  1, false, true, 'L', false);


$html ='<div>Lawful Permanent<br>
Resident as of :____________________</div>';
$pdf->writeHTMLCell(55, 7, 13, 82, $html,  0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(67, 24, 68, 39, '',  'BR',  1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 9);
$pdf->writeHTMLCell(80, 7, 95, 39, 'Receipt',   0,  1, false, true, 'L', true);
$pdf->writeHTMLCell(80, 7, 90, 62, 'Section of Law',   0,  1, false, true, 'L', true);
$pdf->writeHTMLCell(80, 7, 160, 39, 'Action Block',   0,  1, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 4);
$pdf->writeHTMLCell(2, 2, 70, 68, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 73, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 78, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 83, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 70, 88, '',  1,  1, false, true, 'L', false);
//.......
$pdf->writeHTMLCell(2, 2, 95, 68, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 73, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 78, '',  1,  1, false, true, 'L', false);
$pdf->writeHTMLCell(2, 2, 95, 83, '',  1,  1, false, true, 'L', false);

//.........

$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(20, 7, 72, 67.5, 'INA 209(a)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 71.5, 'INA 209(b)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 77.5, 'INA 245(a)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 82.5, 'INA 245(i)',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(20, 7, 72, 87.5, 'INA 245(m)',  0,  1, false, true, 'L', false);
//.......

$pdf->writeHTMLCell(30, 7,  97, 67.5, 'INA 249',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(30, 7,  97, 71.5, 'Sec. 13, Act of 9/1 1/57',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(30, 7,  97, 77.5, 'Cuban Adjustment Act',  0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(35, 7,  97, 82.5, 'Other__________________',  0,  1, false, true, 'L', false);

//upper table end 


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); 
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 1, 0, 0); 
$html ='<div><b>To be completed by an attorney or accredited representative </b> (if any).</div>';
$pdf->writeHTMLCell(190, 7, 13, 96, $html, 1, 1, true, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 10);
$checked = (showData('i_485_g28_box')=='Y')? "checked":"";
$html ='<div> <input type="checkbox" name="i_485_g28_box" value="Y" checked="'.$checked.'" />  Select this box if Form G-28 is<br>attached.</div>';
$pdf->writeHTMLCell(37, 20, 13, 103, $html, 'LRB', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html ='<div><b> Volag Number </b> <br>  (if any)</div>';
$pdf->writeHTMLCell(37, 20, 50, 103, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('volag_number', 33, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),52, 114);
//...............
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 20, 87, 103, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),88, 114);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div> <b>  Attorney or Accredited Representative
USCIS Online Account Number </b> (if any) <br> </div>';
$pdf->writeHTMLCell(71, 20, 132, 103, $html, 'RB', 0, false, true, 'C', true);

$pdf->SetFont('courier', 'B', 10);
/* $pdf->TextField('attorney_uscis_online_number', 65, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),135, 114); */

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255);
$pdf->setCellPaddings(0); // set cell padding

$html ='&nbsp;<input type="text" class="heighttext" name="attorney_uscis_online_number" value="'.showData('attorney_uscis_online_number').'" size="14" style="letter-spacing:2.8mm; width: 200px" maxlength="12" />';

$pdf->setCellHeightRatio(1.8);
$pdf->writeHTMLCell(56, 6, 138.7, 114, $html, 0, 1, false, true, 'J', 0);
$pdf->writeHTMLCell(60, 6, 140.5, 114, "", 1, 1, false, true, 'J', 0);

$pdf->setCellHeightRatio(1.2);
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->writeHTMLCell(5, 3, 145.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 155.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 165.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 175.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 185.7, 114, "", "LR", 1, false, true, 'L', true);
$pdf->writeHTMLCell(5, 3, 195.7, 114, "", "L", 1, false, true, 'L', true);





//..............table end .........

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 124, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 123, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 125, 55.5, false); // angle 2
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div>A-Number  </div>';
$pdf->writeHTMLCell(60, 7, 100, 120, $html, 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(60, 7, 120, 122, 'A-', 0, 1, false, false, 'C', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_485_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 124);

//..........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.1);
$html ='<div><b>NOTE TO ALL APPLICANTS: </b>If you do not completely fill out this application or fail to submit required documents listed in the Instructions, U.S. Citizenship and Immigration Services (USCIS) may deny your application.</div>';
$pdf->writeHTMLCell(190, 7, 13, 130, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b> (Person applying 
for lawful permanent residence)</div>';
$pdf->writeHTMLCell(90, 12, 13, 140, $html, 1, 1, true, false, 'L', true);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Your Current Legal Name </b>(do not provide a
nickname)</div>';
$pdf->writeHTMLCell(90, 12, 13, 154, $html, 0, 1, true, false, 'L', true);

//......


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 165, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 167);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 174, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_family_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 175.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 183, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_family_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 184);

//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Names You Have Used Since Birth</b>(if
applicable)</div>';
$pdf->writeHTMLCell(90, 12, 13, 192, $html, 0, 1, true, false, 'L', true);
//....
$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Provide all other names you have ever used, including
your family name at birth, other legal names, nicknames,
aliases, and assumed names. If you need extra space to
complete this section, use the space provided in <b>Part 14.
Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 12, 13, 204, $html, 0, 1, false, false, 'L', true);

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 224, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 226);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 232.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_family_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 234.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 243, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_family_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 243);

//.......... left side end 


$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 138, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_3_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 140);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 147, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_3_family_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 149);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 158, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_3_family_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 158);

//..........

$pdf->writeHTMLCell(91, 2, 112, 167, '', 'T', 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 168, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_4_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 170);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 177, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_4_family_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 179);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 188, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_4_family_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 188);
//......

//.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Other Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 197, $html, 0, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.   </b>   Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 10, 112, 206, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_you_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 206);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: </b>In addition to providing your actual date of birth,
include any other dates of birth you have used in
connection with any legal names or non-legal names in
he space provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 214, $html, 0, 1, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$checked_male = (showData('other_information_about_you_gender')=='male')? "checked":"";
$checked_female = (showData('other_information_about_you_gender')=='female')? "checked":"";
$html ='<div><b>6.    </b> Sex   <input type="checkbox" name="gender" value="M"  checked="'.$checked_male.'" />  Male  &nbsp;  <input type="checkbox" name="gender" value="F" checked="'.$checked_female.'"/>  Female</div>';
$pdf->writeHTMLCell(80, 10, 112, 232, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.   </b>  City or Town of Birth</div>';
$pdf->writeHTMLCell(80, 10, 112, 240, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_info_you_city_town_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 245);



/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/

$pdf->AddPage('P', 'LETTER'); //page number 2


$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 16, 140, false);// header angle
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
$html ='<div>A-Number  </div>';
$pdf->writeHTMLCell(60, 7, 100, 0, $html, 0, 1, false, false, 'C', true);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);



$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b>(Person
applying for lawful permanent residence) (continued)</div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>8. </b>  &nbsp; Country of Birth</div>';
$pdf->writeHTMLCell(35, 10, 12, 29, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('infor_about_you_country_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 34.5);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b>  Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 12, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_citizen_nationality', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 47.5);


//....
$pdf->SetFont('times', '', 10);
$html ='<div><b>10. </b>  &nbsp; &nbsp; Alien Registration Number (A-Number) (if any) </div>';
$pdf->writeHTMLCell(80, 5, 12, 54, $html, 0, 1, false, false, 'J', true);
//.......
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 38, 43, false); // angle 1

$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 48, 67, false); // angle 2 
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 46, 59, $html, 0, 1, false, false, 'J', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_alien_reg_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 59.5);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: </b>If you have <b>EVER</b> used other A-Numbers,
include the additional A-Numbers in the space provided
in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(80, 7, 22, 67, $html, 0, 1, false, false, 'J', true);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 81, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 87);

//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S. Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 109, $html, 0, 1, true, false, 'J', true);
$pdf->SetFont('times', 'BI', 8);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><b><i>(USPS ZIP Code Lookup)</i></b></a></div>';
$pdf->writeHTMLCell(90, 7, 13, 162, $html, 0, 1, false, false, 'R', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>12.a. </b>&nbsp; &nbsp;In Care Of Name ()</div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_mail_in_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 122);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>12.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 129, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_mail_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 130.5);

//...........
$mailing_apt = (showData('i_485_info_about_you_12c_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('i_485_info_about_you_12c_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('i_485_info_about_you_12c_apt_ste_flr')=='flr')? "checked":"";


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>12.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="'.$mailing_apt.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="'.$mailing_ste.'" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="'.$mailing_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 139, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_mail_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 139);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>12.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 148, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_mail_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 147.5);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>12.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 156, $html, '', 0, 0, true, 'L');

$html = '<select name="info_about_you_us_mail_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 156, $html, '', 0, 0, true, 'L');
$html= '<div><b>12.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 156, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_mail_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 156);
//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Alternate and/or Safe Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 167, $html, 0, 1, true, false, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html ='<div>If you are applying based on the Violence Against Women Act<br>
(VAWA) or as a special immigrant juvenile, human trafficking<br>
victim (T nonimmigrant), or victim of a qualifying crime (U<br>
nonimmigrant) and you do not want USCIS to send notices<br>
about this application to your home, you may provide an<br>
alternative and/or safe mailing address.</div>';
$pdf->writeHTMLCell(100, 7, 13, 175, $html, 0, 1, false, true, 'L', true);


//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.a. </b>&nbsp; &nbsp;In Care Of Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_safe_mailing_care_of_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 205);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>13.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 212, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_safe_mailing_street_number_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 214);

//...........
$mailing_apt2 = (showData('i_485_info_about_you_13c_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste2 = (showData('i_485_info_about_you_13c_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr2 = (showData('i_485_info_about_you_13c_apt_ste_flr')=='flr')? "checked":"";
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="'.$mailing_apt2.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="'.$mailing_ste2.'" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="'.$mailing_flr2.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 223, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_safe_mailing_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 223);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 232, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_safe_mailing_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 232);

//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 241, $html, '', 0, 0, true, 'L');

$html = '<select name="info_about_you_safe_mailing_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 241, $html, '', 0, 0, true, 'L');
$html= '<div><b>13.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 241, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_safe_mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 241);
//.........page 2 left side end 

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Social Security Card</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 18, $html, 0, 1, true, false, 'J', true);
//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>14.</b></div>';
$pdf->writeHTMLCell(30, 7, 113, 26, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html= '<div>Has the Social Security Administration (SSA) ever 
<br>officially issued a Social Security card to you?</div>';
$pdf->writeHTMLCell(90, 7, 121, 26, $html, '', 0, 0, true, 'L');


$p1_14_yes = (showData('i_485_social_security_status')=='Y')? "checked":"";
$p1_14_no = (showData('i_485_social_security_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part1_14" value="Y" checked="'.$p1_14_yes.'" />  Yes   &nbsp; <input type="checkbox" name="part1_14" value="N" checked="'.$p1_14_no.'" /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 36, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div>If you answered “Yes,” provide the information requested 
<br>in <b>Item Number 15.</b></div>';
$pdf->writeHTMLCell(90, 7, 121, 41, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>15.   </b> &nbsp;Provide your U.S. Social Security Number (SSN).</div>';
$pdf->writeHTMLCell(90, 7, 113, 51, $html, '', 0, 0, true, 'L');

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 136, 95, false); 
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_us_social_security_card',47.1, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 126, 56);

//..........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>16.</b></div>';
$pdf->writeHTMLCell(30, 7, 113, 64, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html= '<div>Do you want the SSA to issue you a Social Security card? 
(You must also answer “Yes” to <b>Item Number 17. 
<br>Consent for Disclosure</b>, to receive a card).</div>';
$pdf->writeHTMLCell(90, 7, 121, 64, $html, '', 0, 0, true, 'L');

$p1_16_yes = (showData('i_485_social_security_card_status')=='Y')? "checked":"";
$p1_16_no = (showData('i_485_social_security_card_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part1_16" value="Y" checked="'.$p1_16_yes.'" />  Yes   &nbsp; <input type="checkbox" name="part1_16" value="N" checked="'.$p1_16_no.'" /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 77, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>17.</b></div>';
$pdf->writeHTMLCell(30, 7, 113, 83, $html, '', 0, 0, true, 'L');

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>Consent for Disclosure:</b> I authorize disclosure of 
<br>information from this application to the SSA as required 
<br>for the purpose of assigning me an SSN and issuing me a 
Social Security Card.</div>';
$pdf->writeHTMLCell(90, 7, 121, 83, $html, '', 0, 0, true, 'L');
$p1_17_yes = (showData('i_485_social_authorize_disclousure_status')=='Y')? "checked":"";
$p1_17_no = (showData('i_485_social_authorize_disclousure_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part1_17" value="Y" checked="'.$p1_17_yes.'" />  Yes   &nbsp; <input type="checkbox" name="part1_17" value="N" checked="'.$p1_17_no.'" /> No</div>';
$pdf->writeHTMLCell(80, 7, 178, 96, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Recent Immigration History</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 106, $html, 0, 1, true, false, 'J', true);

//....

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the information for <b>Item Numbers 18. - 24.</b> if you last
entered the United States using a passport or travel document.</div>';
$pdf->writeHTMLCell(92, 7, 113, 114, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.       </b>        Passport Number Used at Last Arrival</div>';
$pdf->writeHTMLCell(90, 7, 112, 124, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_pasport_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 129);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.       </b>        Travel Document Number Used at Last Arrival</div>';
$pdf->writeHTMLCell(90, 7, 112, 136.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_travel_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 141);

//.........
 

$pdf->SetFont('times', '', 10);
$html ='<div><b>20.     </b>      Expiration Date of this Passport or Travel Document<br>  &nbsp;  &nbsp;  &nbsp; 
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 149, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_pasport_expire_date', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 160, 154);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.       </b>        Country that Issued this Passport or Travel Document</div>';
$pdf->writeHTMLCell(90, 7, 112, 161, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_country_issue_pasport', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 166);

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>22.       </b>        Nonimmigrant Visa Number from this Passport (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 174, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_nonimmigrant_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 179);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>Place of Last Arrival into the United States</div>';
$pdf->writeHTMLCell(90, 7, 112, 185.5, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>23.a. </b> City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 192, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_city_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 197);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>23.b.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 205, $html, '', 0, 0, true, 'L');

$html = '<select name="info_about_you_recent_immigration_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 205, $html, '', 0, 0, true, 'L');

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>24.  </b>  Date of Last Arrival (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 212, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_date_last_arrive', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 212);


/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/


// add a page
$pdf->AddPage('P', 'LETTER');  // page number 3
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 11, 137, false);// header angle
$pdf->StopTransform();




$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b> (Person applying 
for lawful permanent residence) (continued)</div>';
$pdf->writeHTMLCell(90, 12, 13, 18, $html, 1, 1, true, false, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>When I last arrived in the United States, I:</div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$p1_25a_yes = (showData('i_485_25a_inspected_admited_status')=='Y')? "checked":"";
$html ='<div><b>25.a.</b> <input type="checkbox" name="inspected" value="Y" checked="'.$p1_25a_yes.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 36, $html, 0, 1, false, true, 'J', true);
$html ='<div>Was inspected at a port of entry and admitted as (for
<br>example, exchange visitor; visitor, waived through;
<br>temporary worker; student):</div>';
$pdf->writeHTMLCell(90, 7, 25, 36, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(77, 7, 26, 49, ' '.showData('i_485_25a_inspected_admited_status_text_value').'', 1, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$p1_25b_yes = (showData('i_485_25b_inspected_port_entry_status')=='Y')? "checked":"";
$html ='<div><b>25.b.</b> <input type="checkbox" name="came_into" value="Y" checked="'.$p1_25b_yes.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 57, $html, 0, 1, false, true, 'J', true);
$html ='<div>Was inspected at a port of entry and paroled as (for
<br>example, humanitarian parole, Cuban parole):</div>';
$pdf->writeHTMLCell(90, 7, 25, 57, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(77, 7, 26, 66, ' '.showData('i_485_25b_inspected_port_entry_status_text_value').'', 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$p1_25c_yes = (showData('i_485_25c_admission_parole_status')=='Y')? "checked":"";
$html ='<div><b>25.c.</b> <input type="checkbox" name="inspect2" value="Y" checked="'.$p1_25c_yes.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 73, $html, 0, 1, false, true, 'J', true);
$html ='<div>Came into the United States without admission or
<br>parole.</div>';
$pdf->writeHTMLCell(90, 7, 25, 73, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', '', 10);
$p1_25d_yes = (showData('i_485_25d_other_status')=='Y')? "checked":"";
$html ='<div><b>25.d.</b> <input type="checkbox" name="other" value="Y" checked="'.$p1_25d_yes.'" />   other :</div>';
$pdf->writeHTMLCell(90, 7, 12, 83, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_other', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 88);

$pdf->SetFont('times', '', 9);
$html ='<div>If you were issued a Form I-94 Arrival-Departure Record Number:</div>';
$pdf->writeHTMLCell(90, 7, 12, 96, $html, 0, 1, false, true, 'J', true);
//.........
 
$pdf->SetFont('times', '', 10);
$html ='<div><b>26.a.</b>   Form I-94 Arrival-Departure Record Number</div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_arival_record_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 108);
//............
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 37, 123, false); // angle 2
$pdf->StopTransform();


//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>26.b. </b> Expiration Date of Authorized Stay Shown on Form I-94 <br>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
(mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(100, 7, 12, 115, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_pasport_expire_date_authorized', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 121);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>26.c. </b>     Status on Form I-94 (for example, class of admission, or<br>   &nbsp; &nbsp; &nbsp; &nbsp;
paroled, if paroled)</div>';
$pdf->writeHTMLCell(92, 7, 12, 128, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_recent_immigration_status_on_form_I94', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 137);






$pdf->SetFont('times', '', 10);
$html ='<div><b>27. </b>   What is your current immigration status (if it has changed<br>&nbsp; &nbsp; &nbsp; &nbsp;
since your arrival)?</div>';
$pdf->writeHTMLCell(92, 7, 12, 146, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_status_on_current_immigration', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 154);

//..........


$pdf->SetFont('times', '', 10);
$html ='<div>Provide your name exactly as it appears on your Form I-94 (if
any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 163, $html, 0, 1, false, true, 'J', false);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.a.  </b>  Family Name <br> &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 171, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_exactly_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 173);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>28.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 180, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_exactly_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 182);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>28.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 190, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_exactly_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 191);

//..........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Application Type or Filing Category</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 18, $html, 1, 1, true, false, 'J', true);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Attach a copy of the Form I-797 receipt or approval notice for the underlying petition or application, as appropriate.<br><br>
<b>I am applying</b> to register lawful permanent residence or adjust 
status to that of a lawful permanent resident based on the 
following immigrant category (select <b>only one</b> box). (See the 
Form I-485 Instructions for more information, including any 
<b>Additional Instructions</b> that relate to the immigrant category 
you select.)
</div>';
$pdf->writeHTMLCell(94, 7, 112, 26, $html, 0, 1, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. &nbsp; Family-based</b> 
</div>';
$pdf->writeHTMLCell(93, 7, 112, 68, $html, 0, 1, false, true, 'J', true);
//..........
$pdf->SetFont('times', '', 11);
$checked_no1a = (showData('i_485_part2_1a_immidiate_relative_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse1" value="Y" checked="'.$checked_no1a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 74, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Immediate relative spouse of a U.S. citizen, Form I-130</div>';
$pdf->writeHTMLCell(90, 7, 125, 75, $html, 0, 1, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 11);
$checked_no1a2 = (showData('i_485_part2_1a_other_relative_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse2" value="Y" checked="'.$checked_no1a2.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 81, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Other relative of a U.S. citizen or relative of a lawful 
<br>permanent resident under the family-based preference 
<br>categories, Form I-130</div>';
$pdf->writeHTMLCell(92, 7, 125, 81, $html, 0, 1, false, true, 'J', true);
//............ 

$pdf->SetFont('times', '', 11);
$checked_no1a3 = (showData('i_485_part2_1a_person_admitted_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse3" value="Y" checked="'.$checked_no1a3.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 94, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Person admitted to the United States as a fiancé(e) or 
<br>child of a fiancé(e) of a U.S. citizen, Form I-129F 
<br>(K-1/K-2 Nonimmigrant)</div>';
$pdf->writeHTMLCell(92, 7, 125, 94, $html, 0, 1, false, true, 'J', true);

//............ 
$pdf->SetFont('times', '', 11);
$checked_no1a4 = (showData('i_485_part2_1a_widow_widoer_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse4" value="Y" checked="'.$checked_no1a4.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 108, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Widow or widower of a U.S. citizen, Form I-360</div>';
$pdf->writeHTMLCell(92, 7, 125, 108, $html, 0, 1, false, true, 'J', true);

//............ 

$pdf->SetFont('times', '', 11);
$checked_no1a5 = (showData('i_485_part2_1a_vawa_self_petitioner_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse5" value="Y" checked="'.$checked_no1a5.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 114, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>VAWA self-petitioner, Form I-360</div>';
$pdf->writeHTMLCell(92, 7, 125, 114, $html, 0, 1, false, true, 'J', true);

//............ 


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b. &nbsp; Employment-based</b> 
</div>';
$pdf->writeHTMLCell(93, 7, 112, 121, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 11);
$checked_no1b_a = (showData('i_485_part2_1b_alien_worker_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse6" value="Y" checked="'.$checked_no1b_a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 127, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Alien worker, Form I-140</div>';
$pdf->writeHTMLCell(92, 7, 125, 127, $html, 0, 1, false, true, 'J', true);

//............ 

$pdf->SetFont('times', '', 11);
$checked_no1b_b = (showData('i_485_part2_1b_alien_enterprenure_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse7" value="Y" checked="'.$checked_no1b_b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 133, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Alien entrepreneur, Form I-526</div>';
$pdf->writeHTMLCell(92, 7, 125, 133, $html, 0, 1, false, true, 'J', true);

//............ 

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c. &nbsp; Special Immigrant</b> 
</div>';
$pdf->writeHTMLCell(93, 7, 112, 139, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 11);

$checked_no_1c_a = (showData('i_485_part2_1c_religious_worker_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse8" value="Y" checked="'.$checked_no_1c_a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 145, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Religious worker, Form I-360</div>';
$pdf->writeHTMLCell(92, 7, 125, 145, $html, 0, 1, false, true, 'J', true);

//............ 

$pdf->SetFont('times', '', 11);
$checked_no_1c_b = (showData('i_485_part2_1c_immigrant_juvenile_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse9" value="Y" checked="'.$checked_no_1c_b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 150, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Special immigrant juvenile, Form I-360
</div>';
$pdf->writeHTMLCell(92, 7, 125, 150, $html, 0, 1, false, true, 'J', true);

//............


$pdf->SetFont('times', '', 11);
$checked_no_1c_c = (showData('i_485_part2_1c_certain_afgan_iraqi_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse10" value="Y" checked="'.$checked_no_1c_c.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 155, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Certain Afghan or Iraqi national, Form I-360 <br> or Form DS-157</div>';
$pdf->writeHTMLCell(92, 7, 125, 155, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1c_d = (showData('i_485_part2_1c_certain_afgan_iraqi_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse11" value="Y" checked="'.$checked_no_1c_d.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 170, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Certain international broadcaster, Form I-360</div>';
$pdf->writeHTMLCell(92, 7, 125, 170, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1c_e = (showData('i_485_part2_1c_certain_g4_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse12" value="Y" checked="'.$checked_no_1c_e.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 175, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Certain G-4 international organization or family 
<br>member or NATO-6 employee or family member, 
<br>Form I-360

</div>';
$pdf->writeHTMLCell(92, 7, 125, 175, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.d. &nbsp; Asylee or Refugee</b> 
</div>';
$pdf->writeHTMLCell(93, 7, 112, 188, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 11);
$checked_no_1d_a = (showData('i_485_part2_1d_asylum_status_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse13" value="Y" checked="'.$checked_no_1d_a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 194, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Asylum status (INA section 208), Form I-589 or 
<br>Form I-730</div>';
$pdf->writeHTMLCell(92, 7, 125, 194, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1d_b = (showData('i_485_part2_1d_refugee_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse14" value="Y" checked="'.$checked_no_1d_b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 203, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Refugee status (INA section 207), Form I-590 or 
<br>Form I-730
</div>';
$pdf->writeHTMLCell(92, 7, 125, 203, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.e. &nbsp; Human Trafficking Victim or Crime Victim</b> 
</div>';
$pdf->writeHTMLCell(93, 7, 112, 214, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 11);
$checked_no_1e_a = (showData('i_485_part2_1e_human_traficking_victim_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse15" value="Y" checked="'.$checked_no_1e_a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 220, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Human trafficking victim (T Nonimmigrant), Form 
<br>I-914 or derivative family member, Form I-914A
</div>';
$pdf->writeHTMLCell(92, 7, 125, 220, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1e_b = (showData('i_485_part2_1e_crime_victim_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse16" value="Y" checked="'.$checked_no_1e_b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 117, 229, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Crime victim (U Nonimmigrant), Form I-918, 
<br>derivative family member, Form I-918A, or 
<br>qualifying family member, Form I-929
</div>';
$pdf->writeHTMLCell(92, 7, 125, 229, $html, 0, 1, false, true, 'J', true);

//............

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 4
//............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();




$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Application Type or Filing Category</b> (continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, false, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.f. &nbsp; Special Programs Based on Certain Public Laws</b> 
</div>';
$pdf->writeHTMLCell(93, 7, 12, 30, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 11);
$checked_no_1f_a = (showData('i_485_part2_1f_the_cuban_adjustment_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse17" value="Y" checked="'.$checked_no_1f_a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 36, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>The Cuban Adjustment Act 
</div>';
$pdf->writeHTMLCell(92, 7, 25, 36, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1f_b = (showData('i_485_part2_1f_the_cuban_adjustment_act_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse18" value="Y" checked="'.$checked_no_1f_b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 42, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>The Cuban Adjustment Act for battered spouses and 
<br>children 
</div>';
$pdf->writeHTMLCell(92, 7, 25, 42, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1f_c = (showData('i_485_part2_1f_the_dependant_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse19" value="Y" checked="'.$checked_no_1f_c.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 52, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Dependent status under the Haitian Refugee 
<br>Immigrant Fairness Act 
</div>';
$pdf->writeHTMLCell(92, 7, 25, 52, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1f_d = (showData('i_485_part2_1f_the_dependant_status_under_haitian')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse20" value="Y" checked="'.$checked_no_1f_d.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 62, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Dependent status under the Haitian Refugee 
<br>Immigrant Fairness Act for battered spouses and 
<br>children
</div>';
$pdf->writeHTMLCell(92, 7, 25, 62, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1f_e = (showData('i_485_part2_1f_lautenberg_parolees_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse21" value="Y" checked="'.$checked_no_1f_e.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 75, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Lautenberg Parolees
</div>';
$pdf->writeHTMLCell(92, 7, 25, 75, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1f_f = (showData('i_485_part2_1f_diplomate_or_high_ranking_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse22" value="Y" checked="'.$checked_no_1f_f.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 81, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Diplomats or high ranking officials unable to return 
<br>home (Section 13 of the Act of September 11, 1957)
</div>';
$pdf->writeHTMLCell(92, 7, 25, 81, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1f_g = (showData('i_485_part2_1f_indochinese_parole_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse23" value="Y" checked="'.$checked_no_1f_g.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 90, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Indochinese Parole Adjustment Act of 2000
</div>';
$pdf->writeHTMLCell(92, 7, 25, 90, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.g. &nbsp; Additional Options </b> 
</div>';
$pdf->writeHTMLCell(93, 7, 12, 97, $html, 0, 1, false, true, 'J', true);
//..........


$pdf->SetFont('times', '', 11);
$checked_no_1g_a = (showData('i_485_part2_1g_diversity_visa_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse24" value="Y" checked="'.$checked_no_1g_a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 103, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Diversity Visa program
</div>';
$pdf->writeHTMLCell(92, 7, 25, 103, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1g_b = (showData('i_485_part2_1g_continuous_residence_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse25" value="Y" checked="'.$checked_no_1g_b.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 108, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Continuous residence in the United States since 
<br>before January 1, 1972 ("Registry")
</div>';
$pdf->writeHTMLCell(92, 7, 25, 108, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1g_c = (showData('i_485_part2_1g_individual_born_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse26" value="Y" checked="'.$checked_no_1g_c.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 117, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Individual born in the United States under diplomatic 
<br>status
</div>';
$pdf->writeHTMLCell(92, 7, 25, 117, $html, 0, 1, false, true, 'J', true);

//............

$pdf->SetFont('times', '', 11);
$checked_no_1g_d = (showData('i_485_part2_1g_other_eligibility_status')=='Y')? "checked":"";
$html ='<div><b>  <input type="checkbox" name="relative_spouse27" value="Y" checked="'.$checked_no_1g_d.'" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 126, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Other eligibility
</div>';
$pdf->writeHTMLCell(92, 7, 25, 126, $html, 0, 1, false, true, 'J', true);

//............

$pdf->writeHTMLCell(77, 7, 25, 132, ''.showData('i_485_part2_1g_other_eligibility_status_text_value').'', 1, 1, false, true, 'J', true);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.   </b>    &nbsp; Are you applying for adjustment based on the<br>  &nbsp;  &nbsp;  &nbsp;
Immigration and Nationality Ac(INA) section 245(i)?</div>';
$p2_2_yes = (showData('i_485_part2_2_are_you_applying_for_adjustment')=='Y')? "checked":"";
$p2_2_no = (showData('i_485_part2_2_are_you_applying_for_adjustment')=='N')? "checked":"";
$pdf->writeHTMLCell(90, 7, 13, 144, $html, 0, 1, false, true, 'J', true);
$html ='<div><input type="checkbox" name="INA" value="Y" checked="'.$p2_2_yes.'" />  Yes   &nbsp; <input type="checkbox" name="INA" value="N" checked="'.$p2_2_no.'" /> No</div>';
$pdf->writeHTMLCell(80, 7, 70, 154, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Number 2.</b>, you
must have selected a family-based, employment-based,
special immigrant, or Diversity Visa immigrant category
listed above in <b>Item Numbers 1.a. - 1.g.</b> as the basis for
your application for adjustment of status. Fill out the rest
of this application <b>and</b> Supplement A to Form I-485,
Adjustment of Status Under Section 245(i) (Supplement
A). For detailed filing instructions, read the Form I-485
Instructions (including any <b>Additional Instructions</b> that
relate to the immigrant category that you selected <b>Item 
Numbers 1.a. - 1.g.)</b> and Supplement A Instructions.</div>';
$pdf->writeHTMLCell(85, 7, 19, 160, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Immigrant Category</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div>If you are the <b>principal applicant</b>, provide the following
information.</div>';
$pdf->writeHTMLCell(88, 7, 112, 25, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.    </b>      &nbsp; Receipt Number of Underlying Petition (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 35, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_receipt_number_underliying', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 41);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.    </b>     &nbsp; Priority Date from Underlying Petition (if any)<br> &nbsp; &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 48, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('info_about_you_priority_date_underliying', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169, 54);


$pdf->SetFont('times', '', 10);
$html ='<div>If you are a <b>derivative applicant</b> (the spouse or unmarried
child under 21 years of age of a principal applicant), provide the
following information for the <b>principal applicant.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 62, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Principal Applicant\'s Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 77, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.  </b>  Family Name <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 83, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 85);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>  Given Name <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 91, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 93);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 101, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 101);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.  </b>  Principal Applicant\'s A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 108, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 113);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(50, 7, 138, 112, 'A-', 0, 1, false, false, 'J', true);
//............
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 112, 51, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 130, 70, false); // angle 2
$pdf->StopTransform();

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>7.  </b>    Principal Applicant\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 120, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 125);

//........

$pdf->SetFont('times', '', 9.9);
$html ='<div><b>8. </b> Receipt Number of Principal\'s Underlying Petition (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 132, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_receipt_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 138);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b>    Priority Date of Principal Applicant\'s Underlying Petition<br> &nbsp; &nbsp; &nbsp; 
(if any) (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 145, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_priority_date', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 151);

//........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Additional Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 161, $html, 1, 0, true, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 168, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(85, 7, 117, 168, 'Have you ever applied for an immigrant visa to obtain
permanent resident status at a U.S. Embassy or U.S.
Consulate abroad?', 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$p3_1_yes = (showData('i_485_part3_1_immigrant_visa_status')=='Y')? "checked":"";
$p3_1_no = (showData('i_485_part3_1_immigrant_visa_status')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="part3_1" value="Y" checked="'.$p3_1_yes.'" /> Yes &nbsp; <input type="checkbox" name="part3_1" value="N" checked="'.$p3_1_no.'" /> No  </div>';
$pdf->writeHTMLCell(90, 7, 173, 177, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 1.</b>, complete
<b>Item Numbers 2.a. - 4.</b> below. If you need extra space to
complete this section, use the space provided in <b>Part 14.
Additional Information.</b></div>';
$pdf->writeHTMLCell(85, 7, 117, 183, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Location of U.S. Embassy or U.S. Consulate</div>';
$pdf->writeHTMLCell(90, 7, 112, 193, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  City</div>';
$pdf->writeHTMLCell(90, 7, 112, 205, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_location_city', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 206);

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Country </div>';
$pdf->writeHTMLCell(90, 7, 112, 212, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_location_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 218);


$pdf->SetFont('times', '', 10);
$html ='<div><b>3.    &nbsp;</b> &nbsp;     Decision (for example, approved, refused, denied,<br>  &nbsp;  &nbsp;  &nbsp;
withdrawn)</div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_decision', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 234);


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.    &nbsp;</b> &nbsp;     Date of Decision (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 243, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_info_decision1', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 243);

/********************************
******** End Page No 4 **********
*********************************/

/********************************
******** Start Page No 5 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
//..............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Additional Information About You</b><br>(Continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......


$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Address History</b></div>';
$pdf->writeHTMLCell(91, 7, 12.5, 31, $html, 0, 0, true, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide physical addresses for everywhere you have lived
during the last five years, whether inside or outside the United
States. Provide your current address first. If you need extra
space to complete this section, use the space provided in
<br><b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 11, 38, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div>Physical Address 1 (current address)</div>';
$pdf->writeHTMLCell(90, 7, 11, 59, $html, 0, 1, false, true, 'J', true);
//..............

$html = '<b>5.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 11, 65, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_address_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 65);


$pdf->SetFont('times', '', 10); // set font
//...........
$mailing_apt_p3_1 = (showData('i_485_additional_info_address_history_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste_p3_1 = (showData('i_485_additional_info_address_history_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr_p3_1 = (showData('i_485_additional_info_address_history_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>5.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="'.$mailing_apt_p3_1.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="'.$mailing_ste_p3_1.'" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="'.$mailing_flr_p3_1.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 11, 75, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62.5, 75);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 11, 84, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 84);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 11, 92, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 92, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69.5, 92.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 11, 101, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 101);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 11, 109.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 110);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 11, 116, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),21.5, 121);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(50, 0, 12, 129, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 135, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72.5, 134);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 143, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),72.5, 143);

$pdf->writeHTMLCell(89, 0, 13, 153, '', 'T', 0, 0, true, 'L'); 
//.........

$pdf->SetFont('times', '', 10);
$html ='<div>Physical Address 2</div>';
$pdf->writeHTMLCell(50, 7, 12, 154, $html, '', 0, 0, true, 'L');
//............

$html = '<b>7.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 12, 160, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_address2_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 160);


$pdf->SetFont('times', '', 10); // set font
$mailing_apt_p3_2 = (showData('i_485_additional_info_physical_address2_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste_p3_2 = (showData('i_485_additional_info_physical_address2_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr_p3_2 = (showData('i_485_additional_info_physical_address2_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>7.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt3" value="Apt3" checked="'.$mailing_apt_p3_2.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste3" checked="'.$mailing_ste_p3_2.'" />Ste. <input type="checkbox" name="Flr3" value="Flr3" checked="'.$mailing_flr_p3_2.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62.5, 168);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 176, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 176);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>7.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 184, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_address2_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 184, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69.5, 184);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 192, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 192);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 200, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 200);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 207, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 212);
//..............

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(50, 0, 12, 222, $html, '', 0, 0, true, 'L');
//.............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 228, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 228);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 237, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 237);

//.........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();

$pdf->SetFont('times', '', 10); // set font
$html = '<div>Provide your most recent address outside the United States
where you lived for more than one year (if not already listed
above).</div>';
$pdf->writeHTMLCell(90, 0, 113, 16, $html, '', 0, 0, true, 'L'); 

//........... 

$html = '<b>9.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 113, 29, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_address3_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 31);


$pdf->SetFont('times', '', 10); // set font
$mailing_apt_p3_3 = (showData('i_485_additional_info_recent_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste_p3_3 = (showData('i_485_additional_info_recent_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr_p3_3 = (showData('i_485_additional_info_recent_address_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>9.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt0" value="Apt0" checked="'.$mailing_apt_p3_3.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste0" value="Ste0" checked="'.$mailing_ste_p3_3.'" />Ste. <input type="checkbox" name="Flr0" value="Flr0" checked="'.$mailing_flr_p3_3.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 113, 39, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 39);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 113, 47, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_city_or_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 47);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>9.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 55, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_address3_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 55, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 55);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>9.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 113, 63, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 63);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>9.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 113, 70, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_postal_code', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 71);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>9.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 113, 77, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_country', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121.5, 82);
//..............

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(50, 0,  113, 90, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0,  113, 97, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.5, 97);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0,  113, 106, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  174.5, 106);

//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Employment History</i></b></div>';
$pdf->writeHTMLCell(90, 7, 114, 117, $html, 0, 1, true, false, 'L', true);
//.............


$pdf->SetFont('times', '', 10); // set font
$html = '<div>Provide your employment history for the last five years.
whether inside or outside the United States. Provide the most
recent employment first. If you need extra space to complete
this section, use the space provided in <b>Part 14. Additional
Information.</b></div>';
$pdf->writeHTMLCell(90, 0,  113, 125, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<div>Employer I (current or most recent)</div>';
$pdf->writeHTMLCell(90, 0,  113, 146, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>11.    </b>      Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 0, 113, 152, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employement_company', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  120, 157);

//........

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 113, 165, $html, 0, 1, false, true, 'J', true);


$html = '<b>12.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 113, 171, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_employer_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),146, 171);


$pdf->SetFont('times', '', 10); // set font
$mailing_apt_p3_4 = (showData('i_485_additional_info_employement_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste_p3_4 = (showData('i_485_additional_info_employement_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr_p3_4 = (showData('i_485_additional_info_employement_address_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>12.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt4" value="Apt4"checked="'.$mailing_apt_p3_4.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste4" value="Ste4" checked="'.$mailing_ste_p3_4.'" />Ste. 
<input type="checkbox" name="Flr4" value="Flr4" checked="'.$mailing_flr_p3_4.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 113, 180, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 179);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 113, 187, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_city_or_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 187);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.d.</b>&nbsp;&nbsp;State&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 113, 195, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_employer_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 195, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),170, 195);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 113, 203, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_province', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 203);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 113, 211, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_postal_code', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 211);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 113, 220, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_country', 79.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  123.5, 225);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.</b> &nbsp; &nbsp; Your Occupation';
$pdf->writeHTMLCell(50, 0, 113, 234, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_occupation', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),123.5, 240);


/********************************
******** End Page No 5 **********
*********************************/

/********************************
******** Start Page No 6 ********
*********************************/

$pdf->AddPage('P', 'LETTER');  // page number 6
//.............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 124, 4, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 121, 3, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10.5, 138, false);// header angle
$pdf->StopTransform();
//................

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Additional Information About You</b><br>(Continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Employment</div>';
$pdf->writeHTMLCell(50, 0, 12, 29, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 36, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_date_from', 30.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 36);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 45, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_date_to', 30.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 45);

//........

$pdf->writeHTMLCell(90, 0, 13, 54, '', 'T', 0, 0, true, 'L'); 

//.........
$pdf->SetFont('times', '', 10);
$html ='<div>Employer 2</div>';
$pdf->writeHTMLCell(50, 7, 12, 55, $html, '', 0, 0, true, 'L');
//............

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>15.    </b>      Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 0, 12, 61, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_company', 83.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 67);

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 12, 75, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('Times', '', 10); 
$html = '<b>16.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(52, 0, 12, 82, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_employer2_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45.5, 83);


$pdf->SetFont('times', '', 10); // set font
$mailing_apt_p3_5 = (showData('i_485_additional_info_employer2_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste_p3_5 = (showData('i_485_additional_info_employer2_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr_p3_5 = (showData('i_485_additional_info_employer2_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>16.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apte" value="Apt" checked="'.$mailing_apt_p3_5.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste3" checked="'.$mailing_ste_p3_5.'" />Ste. <input type="checkbox" name="Flre" value="Flr" checked="'.$mailing_flr_p3_5.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 92, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_apt_ste_flr', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62.5, 92);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>16.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 101, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_city_or_town', 58.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 101);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>16.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>16.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_employer2_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 110, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_zip_code', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69.5, 110);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>16.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 119, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_province', 58.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 119);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>16.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 128, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_postal_code', 58.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 128);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>16.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 136, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),23.5, 142);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>17.</b> &nbsp; &nbsp; Your Occupation';
$pdf->writeHTMLCell(50, 0, 12, 150, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22.5, 156);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Employment</div>';
$pdf->writeHTMLCell(50, 0, 12, 165, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>18.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 172, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_date_from', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 172);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>18.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 181, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_date_to', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 181);


$pdf->SetFont('times', '', 10); // set font
$html = '<div>Provide your most recent employment outside of the United
States (if not already listed above).</div>';
$pdf->writeHTMLCell(90, 7, 12, 189, $html,  0, 0, false, 'L'); 


$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>19.    </b>      Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 0, 12, 199, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_company', 83.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 205);

//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('Times', '', 10); 
$html = '<b>20.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 22, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_employer3_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 23);


$pdf->SetFont('times', '', 10); // set font
$mailing_apt_p3_6 = (showData('i_485_additional_info_recent_employment_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste_p3_6 = (showData('i_485_additional_info_recent_employment_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr_p3_6 = (showData('i_485_additional_info_recent_employment_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>20.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apte20a" value="Apt" checked="'.$mailing_apt_p3_6.'" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste20a" value="Ste3" checked="'.$mailing_ste_p3_6.'" />Ste. <input type="checkbox" name="Flre20a" value="Flr" checked="'.$mailing_flr_p3_6.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 31, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164.5, 31);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>20.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 38, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 39);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>20.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>20.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 47, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_employer3_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 47, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  171.5, 47);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>20.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 55, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 55);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>20.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 63, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  147, 63);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>20.h.</b> &nbsp;&nbsp;Country</div>';
$pdf->writeHTMLCell(50, 0, 112, 70, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_country', 79, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 125.5, 76);
//..............

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>21.</b> &nbsp; &nbsp; Your Occupation';
$pdf->writeHTMLCell(50, 0, 112, 84, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 90);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Employment</div>';
$pdf->writeHTMLCell(50, 0, 112, 98, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>22.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 105, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173.5, 105);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>22.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 113, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173.5, 114);

//........ 

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 4. Information About Your Parents</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 125, $html, 1, 0, true, true, 'L', true);

//.........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Parent 1</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 134, $html, 0, 1, true, true, 'L', true);

//.........


$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 1\'s Legal Name</div>';
$pdf->writeHTMLCell(50, 0, 112, 141, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 147, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 149);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 156, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 157);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 165, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 165);

//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 1\'s Name at Birth (if different than above)</div>'; 
$pdf->writeHTMLCell(90, 7, 112, 174, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 179, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_lastname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 181);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 188, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_firstname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 189);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 197, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_middlename_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 197);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3. </b> &nbsp; Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 112, 207, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_date_of_birth', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 206);

$pdf->SetFont('times', '', 11);
$checked_male2= (showData('i_485_parents1_info_gender')=='male')? "checked":"";
$checked_female2 = (showData('i_485_parents1_info_gender')=='female')? "checked":"";
$html= '<div><b>4. </b> Sex   &nbsp; &nbsp; <input type="checkbox" name="G" value="y" checked="'.$checked_male2.'" />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked="'.$checked_female2.'" /> Female</div>';
$pdf->writeHTMLCell(90, 7, 112, 215, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>5. </b>  &nbsp;  City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 10, 112, 222, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10.5);
$pdf->TextField('information_parent1_city_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 228);

//............

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>6.   </b>   &nbsp;  Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 112, 236, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10.5);
$pdf->TextField('information_parent1_country_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 241);

//.......

/********************************
******** End Page No 6 **********
*********************************/

/********************************
******** Start Page No 7 ********
*********************************/

$pdf->AddPage('P', 'LETTER');  // page number 7
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 138, false);// header angle
$pdf->StopTransform();



$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Information About Your Parents </b><br>(Continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>7.   </b>   &nbsp;  Current City or Town of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 12, 29, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_current_city_of_resident', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 35);
//..........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>8.   </b>   &nbsp;   Current Country of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 12, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_current_country_of_resident', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 48);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Parent 2 </b></div>';
$pdf->writeHTMLCell(92, 7, 12, 58, $html, 0, 1, true, true, 'L', true);

//.........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 2\'s Legal Name</div>';
$pdf->writeHTMLCell(50, 0, 11, 66, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 72, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_lastname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 73);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 80, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_firstname', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 81);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 88, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_middlename', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 89);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 2\'s Name at Birth (if different than above)</div>'; 
$pdf->writeHTMLCell(90, 7, 12, 97, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 103, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_lastname_at_birth', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 105);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 112, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_firstname_at_birth', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 113);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 121, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_middlename_at_birth', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 121);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b> &nbsp; Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 12, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_date_of_birth', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 130);

$pdf->SetFont('times', '', 11);
$checked_male3= (showData('i_485_parents2_info_gender')=='male')? "checked":"";
$checked_female3 = (showData('i_485_parents2_info_gender')=='female')? "checked":"";
$html= '<div><b>12. </b> Sex   &nbsp; &nbsp; <input type="checkbox" name="g" value="y" checked="'.$checked_male3.'" />Male  &nbsp; &nbsp;
<input type="checkbox" name="g" value="n" checked="'.$checked_female3.'" /> Female</div>';
$pdf->writeHTMLCell(90, 7, 12, 138, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>13. </b>&nbsp; City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 10, 12, 144, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10.5);
$pdf->TextField('information_parent2_city_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 150);

//............

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>14.  </b>&nbsp;Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 12, 157, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_country_of_birth', 84.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 163);

//.......

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>15.  </b>&nbsp;Current City or Town of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 12, 171, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_current_city_of_resident', 84.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 177);

//..........


$pdf->SetFont('times', '', 10.5);
$html ='<div><b>16.   </b>&nbsp;Current Country of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 12, 185, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_current_country_of_resident', 84.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 191);


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Information About Your Marital History</b></div>';
$pdf->writeHTMLCell(90.5, 7, 14, 204, $html, 1, 0, true, true, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b>  What is your current marital status?</div>';
$pdf->writeHTMLCell(80, 7, 13, 212, $html, 0, 1, false, false, 'J', true);

$check_marital_1 = (showData('i_485_info_about_current_marital_status')=='single')? "checked":"";
$check_marital_2 = (showData('i_485_info_about_current_marital_status')=='married')? "checked":"";
$check_marital_3 = (showData('i_485_info_about_current_marital_status')=='divorced')? "checked":"";
$check_marital_4 = (showData('i_485_info_about_current_marital_status')=='widowed')? "checked":"";
$check_marital_5 = (showData('i_485_info_about_current_marital_status')=='annulled')? "checked":"";
$check_marital_6 = (showData('i_485_info_about_current_marital_status')=='separated')? "checked":"";



$html= '<div>
<input type="checkbox" name="single" value="single" checked="'.$check_marital_1.'" />Single, Never Married &nbsp;&nbsp;
<input type="checkbox" name="mariage" value="married" checked="'.$check_marital_2.'" />Married  &nbsp;&nbsp;  
<input type="checkbox" name="divorce" value="divorce" checked="'.$check_marital_3.'" /> Divorcee  <br>
<input type="checkbox" name="widow" value="widowed" checked="'.$check_marital_4.'" /> Widowed  &nbsp;&nbsp;
<input type="checkbox" name="annuled" value="annulled" checked="'.$check_marital_5.'" /> Mariage Annulled <br>
<input type="checkbox" name="separeted" value="separeted" checked="'.$check_marital_6.'" /> Legally Separeted 

</div>';

$pdf->writeHTMLCell(90, 10, 18, 218, $html, '', 0, 0, true, 'L');
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>     If you are married, is your spouse a current member of the <br>  &nbsp;  &nbsp;
U.S. armed forces or U.S. Coast Guard?</div>';
$pdf->writeHTMLCell(90, 7, 12, 233, $html, 0, 1, false, false, 'J', true);
$check_2_a = (showData('i_485_info_about_current_spouse_is_armed_force')=='na')? "checked":"";
$check_2_b = (showData('i_485_info_about_current_spouse_is_armed_force')=='yes')? "checked":"";
$check_2_c = (showData('i_485_info_about_current_spouse_is_armed_force')=='no')? "checked":"";
$html= '<div>
<input type="checkbox" name="na" value="na" checked="'.$check_2_a.'" /> N/A &nbsp;&nbsp;
<input type="checkbox" name="yes" value="yes" checked="'.$check_2_b.'" /> Yes  &nbsp;&nbsp;  
<input type="checkbox" name="no" value="no" checked="'.$check_2_c.'" /> No  

</div>';

$pdf->writeHTMLCell(90, 10, 60, 242, $html, '', 0, 0, true, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.  </b>     How many times have you been married (including<br>   &nbsp;   &nbsp; 
annulled marriages and marriages to the same person)?</div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 1, false, false, 'J', true); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('how_many_times_married', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 25);
//.............

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Current Marriage </b> (including if you are legally separated)</div>';
$pdf->writeHTMLCell(90, 7, 113.5, 36, $html, 0, 0, true, true, 'L', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>If you are currently married, provide the following information
about your current spouse.</div>';
$pdf->writeHTMLCell(90, 7, 113, 49, $html, 0, 1, false, true, 'J', false); 

$pdf->SetFont('times', '', 10);
$html ='<div>Current Spouse\'s Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 59, $html, 0, 1, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 113, 64, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 65);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 113, 72, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 73);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 113, 82, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 81);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 113, 90, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 98);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 138, 97, 'A-', 0, 1, false, false, 'J', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
//$pdf->MultiCell(10, 10, "t", '1', 'C', 0, 1, 26, 70, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 114, 36, false); // angle 2 
$pdf->StopTransform();

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.   </b>   Current Spouse\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 107, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 112);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>7.   </b>  Date of Marriage to Current Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 120, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_date_of_marriage', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 125);

//......


$pdf->SetFont('times', '', 10);
$html ='<div>Current Spouse\'s Place of Birth</div>';
$pdf->writeHTMLCell(90, 7, 113, 132, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 113, 140, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_birth_city_town', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 146);

//........



$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 113, 154, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_birth_state', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 159);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>8.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 113, 167, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_birth_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 172);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div>Place of Marriage to Current Spouse</div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 187, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_current_spouse_city_or_town', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 192);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 199, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_current_spouse_province', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 204);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>9.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 212, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_current_spouse_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 217);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.   </b>   Is your current spouse applying with you ?</div>';
$pdf->writeHTMLCell(90, 7, 112, 226, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$checked_page_7_10_y = (showData('i_485_info_about_current_spouse_applying_with_you')=='Y')? "checked":"";
$checked_page_7_10_n = (showData('i_485_info_about_current_spouse_applying_with_you')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="spouse_apply" value="Y" checked="'.$checked_page_7_10_y.'" /> Yes   &nbsp;  <input type="checkbox" name="spouse_apply" value="N" checked="'.$checked_page_7_10_n.'" />  No </div>';
$pdf->writeHTMLCell(90, 7, 175, 232, $html, 0, 1, false, true, 'J', true);
//...........

/********************************
******** End Page No 7 **********
*********************************/

/********************************
******** Start Page No 8 ********
*********************************/
$pdf->AddPage('P', 'LETTER');  // page number 8
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//..............

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Information About Your Marital History </b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Information About Prior Marriages </b> (if any)</div>';
$pdf->writeHTMLCell(90, 7, 13, 31, $html, 0, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>If you have been married before, whether in the United States or
in any other country, provide the following information about
your prior spouse. If you have had more than one previous
marriage, use the space provided in <b>Part 14. Additional
Information</b> to provide the information below.</div>';
$pdf->writeHTMLCell(95, 7, 12, 40, $html, 0, 1, false, true, 'L', false);
$html ='<div>Prior Spouse\'s Legal Name (provide family name before
marriage)</div>';
$pdf->writeHTMLCell(90, 7, 12, 61, $html, 0, 1, false, true, 'L', false);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.a.    </b>    Family Name <br>  &nbsp;  &nbsp;  &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 70, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_prior_marriage_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 72);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>11.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 78, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_prior_marriage_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 80);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>11.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 88, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_prior_marriage_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 88);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.   </b>   Prior Spouse\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 96, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('prior_spouse_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 102);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>13.    </b>    Date of Marriage to Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 110, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('prior_spouse_date_of_marriage', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 116);

//......

$pdf->SetFont('times', '', 10);
$html ='<div>Place of Marriage to Prior Spouse</div>';
$pdf->writeHTMLCell(90, 7, 12, 124, $html, 0, 1, false, false, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 132, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_prior_spouse_city_town', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 137);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 145, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_prior_spouse_state_province', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 150);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>14.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 158, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_prior_spouse_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 163);

//.....

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.     </b>     Date Marriage with Prior Spouse Legally Ended<br>  &nbsp;   &nbsp;  &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 172, $html, 0, 1, false, false, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('legally_ended_date_of_prior_spouse_marriage', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 177);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Place Where Marriage with Prior Spouse Legally Ended</div>';
$pdf->writeHTMLCell(90, 7, 12, 185, $html, 0, 1, false, false, 'J', false);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 192, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_spouse_prior_marriage_ended_city_town', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 198);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 206, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_spouse_prior_marriage_ended_state_province', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 211);
 
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>16.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 219, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_spouse_prior_marriage_ended_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 224);

//.........

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 6. Information About Your Children</b></div>';
$pdf->writeHTMLCell(90, 7, 114, 17, $html, 1, 0, true, true, 'L', true);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b></div>';
$pdf->writeHTMLCell(90, 7, 113, 25, $html, 0, 1, false, false, 'J', true);
$html ='<div>Indicate the total number of ALL living children
(including adult sons and daughters) that you have.<br><br>

<b>NOTE:</b> The term "children" includes all biological or
legally adopted children, as well as current stepchildren
of any age, whether born in the United States or other
countries, married or unmarried, living with you or
elsewhere and includes any missing children and those
born to you outside of marriage.

</div>';
$pdf->writeHTMLCell(80, 7, 118, 25, $html, 0, 1, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('total_number_of_children', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 179, 58);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information for each of your children.
<br>If you have more than three children, use the space provided in
<b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 67, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div>Child 1</div>';
$pdf->writeHTMLCell(90, 7, 113, 81, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Current Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 87, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 113, 93, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 94);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 113, 101, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 103);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 113, 111, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 112);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 113, 120, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 126);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 139, 125, 'A-', 0, 1, false, false, 'J', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 157, 133, false); // angle 2 Right side 
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 116, 62, false); // angle 3 Right side  
$pdf->StopTransform();

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.   </b>    Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 135, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 135);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 113, 142, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_country_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 148);


$pdf->SetFont('times', '', 10);
$html ='<div><b>6.   </b> Is this child applying with you?</div>';
$pdf->writeHTMLCell(90, 7, 113, 157, $html, 0, 1, false, false, 'J', true);

//.....



$p6_6_yes = (showData('i_485_info_about_child1_applying_with')=='Y')? "checked":"";
$p6_6_no = (showData('i_485_info_about_child1_applying_with')=='N')? "checked":"";

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="child_apply" value="Y" checked="'.$p6_6_yes.'" /> Yes   &nbsp;  <input type="checkbox" name="child_apply" value="N" checked="'.$p6_6_no.'" />  No </div>';
$pdf->writeHTMLCell(90, 7, 175, 157, $html, 0, 1, false, true, 'J', true);

$pdf->writeHTMLCell(90, 0, 113, 164, '', 'T', 0, 0, true, 'L'); 

//.......child 2
$pdf->SetFont('times', '', 10);
$html ='<div>Child 2</div>';
$pdf->writeHTMLCell(90, 7, 113, 164, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Current Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 113, 170, $html, 0, 1, false, true, 'J', true);

//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 113, 176, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 178);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 113, 184, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 186);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 113, 194, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 194);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 113, 202, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_a_number', 54, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 149, 208);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 142, 207, 'A-', 0, 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.   </b>    Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 113, 217, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 217);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 113, 224, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_country_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 230);


$pdf->SetFont('times', '', 10);
$html ='<div><b>11.   </b> Is this child applying with you?</div>';
$pdf->writeHTMLCell(90, 7, 113, 239, $html, 0, 1, false, false, 'J', true);

//.......
$p6_11_yes = (showData('i_485_info_about_child2_applying_with')=='Y')? "checked":"";
$p6_11_no = (showData('i_485_info_about_child2_applying_with')=='N')? "checked":"";
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="child2_apply" value="Y" checked="'.$p6_11_yes.'" /> Yes   &nbsp;  <input type="checkbox" name="child2_apply" value="N" checked="'.$p6_11_no.'" />  No </div>';
$pdf->writeHTMLCell(90, 7, 175, 239, $html, 0, 1, false, true, 'J', true);

/********************************
******** End Page No 8 **********
*********************************/

/********************************
******** Start Page No 9 ********
*********************************/
// add a page
$pdf->AddPage('P', 'LETTER');  // page number 9

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220,220,220);
$html ='<div><b>Part 6. Information About Your Children</b>
(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...............

//..........child 3

$pdf->SetFont('times', '', 10);
$html ='<div>Child 3</div>';
$pdf->writeHTMLCell(90, 7, 12, 29, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Current Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 35, $html, 0, 1, false, true, 'J', true);

//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.a.  </b>  Family Name <br>  &nbsp;  &nbsp; &nbsp;  &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 41, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 42);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.b.  </b>  Given Name <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 49, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 50);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 59, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 58);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_a_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 70);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 49, 69, 'A-', 0, 1, false, false, 'J', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 36, 52, false); // angle 2 Right side 
$pdf->StopTransform();

//.......

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.   </b>    Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 79);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 86, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_country_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 92);


$pdf->SetFont('times', '', 10);
$html ='<div><b>16.   </b> Is this child applying with you?</div>';
$pdf->writeHTMLCell(90, 7, 12, 101, $html, 0, 1, false, false, 'J', true);

//.....

$pdf->SetFont('times', '', 10);
$checked_page_9_16_y = (showData('i_485_info_about_child3_applying_with')=='Y')? "checked":"";
$checked_page_9_16_n = (showData('i_485_info_about_child3_applying_with')=='N')? "checked":"";
$html ='<div><input type="checkbox" name="child3_apply" value="Y" checked="'.$checked_page_9_16_y.'" /> Yes   &nbsp;  <input type="checkbox" name="child3_apply" value="N" checked="'.$checked_page_9_16_n.'" />  No </div>';
$pdf->writeHTMLCell(90, 7, 75, 101, $html, 0, 1, false, true, 'J', true);

//..........


$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 7. Biographic Information</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 111, $html, 1, 0, true, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.     </b>     Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(90, 7, 12, 119, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$checked_page_9_1_y = (showData('i_485_biographic_info_ethnicity')=='hispanic')? "checked":"";
$checked_page_9_1_n = (showData('i_485_biographic_info_ethnicity')=='nothispanic')? "checked":"";
$html ='<div><input type="checkbox" name="ethnicity" value="Y" checked="'.$checked_page_9_1_y.'" /> Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 17, 125, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="ethnicity" value="Y" checked="'.$checked_page_9_1_n.'" /> Not Hispanic or Latino</div>';
$pdf->writeHTMLCell(90, 7, 17, 130, $html, 0, 1, false, true, 'J', true);
//................

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.     </b>     Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(90, 7, 12, 136, $html, 0, 1, false, false, 'J', true);
//....
$pdf->SetFont('times', '', 10);

$checked_page_9_2_a = (showData('i_485_biographic_info_race_white')=='Y')? "checked":" ";
$html ='<div><input type="checkbox" name="white" value="Y" checked="'.$checked_page_9_2_a.'" /> White</div>';
$pdf->writeHTMLCell(90, 7, 17, 141, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);

$checked_page_9_2_b = (showData('i_485_biographic_info_race_asian')=='Y')? "checked":"";
$html ='<div><input type="checkbox" name="asian" value="Y" checked="'.$checked_page_9_2_b.'" /> Asian</div>';
$pdf->writeHTMLCell(90, 7, 17, 146, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);

$checked_page_9_2_c = (showData('i_485_biographic_info_race_black_african')=='Y')? "checked":"";
$html ='<div><input type="checkbox" name="black" value="Y" checked="'.$checked_page_9_2_c.'" /> Black or African American</div>';
$pdf->writeHTMLCell(90, 7, 17, 152, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);

$checked_page_9_2_d = (showData('i_485_biographic_info_race_american_native')=='Y')? "checked":"";
$html ='<div><input type="checkbox" name="american" value="Y" checked="'.$checked_page_9_2_d.'" /> American Indian or Alaska Native</div>';
$pdf->writeHTMLCell(90, 7, 17, 158, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);

$checked_page_9_2_e = (showData('i_485_biographic_info_race_native_islander')=='Y')? "checked":"";
$html ='<div><input type="checkbox" name="native" value="Y" checked="'.$checked_page_9_2_e.'" /> Native Hawaiian or Other Pacific Islander</div>';
$pdf->writeHTMLCell(90, 7, 17, 164, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.   </b>  Height </div>';
$pdf->writeHTMLCell(30, 7, 12, 171, $html, 0, 0, false, true, 'J', true);
$html= '<div><label for="selection">Feet:</label>
<select name="biographic_info_feet" size="0.5">
    <option value=" ">select</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(40, 7, 42, 171, $html, 0, 0, false, true, 'J', true);

$html1= '<div><label for="selection">Inches:</label>
<select name="biographic_info_inches" size="0.5">
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
$pdf->writeHTMLCell(90, 7, 72, 171, $html1, 0, 0, false, true, 'J', true);

$html= '<div><b>4.    </b>   Weight   &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; Pounds </div>';
$pdf->writeHTMLCell(50, 7, 12, 179, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('biographic_info_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 76, 179);
$pdf->TextField('biographic_info_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 179);
$pdf->TextField('biographic_info_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 64, 179);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 189, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 10);

$checked_5_eye_1 = (showData('i_485_biographic_info_eye_color')=='black')? "checked":"";
$checked_5_eye_2= (showData('i_485_biographic_info_eye_color')=='blue')? "checked":"";
$checked_5_eye_3 = (showData('i_485_biographic_info_eye_color')=='brown')? "checked":"";
$checked_5_eye_4 = (showData('i_485_biographic_info_eye_color')=='gray')? "checked":"";
$checked_5_eye_5 = (showData('i_485_biographic_info_eye_color')=='green')? "checked":"";
$checked_5_eye_6 = (showData('i_485_biographic_info_eye_color')=='hazel')? "checked":"";
$checked_5_eye_7 = (showData('i_485_biographic_info_eye_color')=='maroon')? "checked":"";
$checked_5_eye_8 = (showData('i_485_biographic_info_eye_color')=='pink')? "checked":"";
$checked_5_eye_9 = (showData('i_485_biographic_info_eye_color')=='unknown')? "checked":"";

$html= '<div>   
&nbsp; &nbsp;&nbsp;<input type="checkbox" name="black" value="black" checked="'.$checked_5_eye_1.'" /> Black 
&nbsp;  &nbsp;  &nbsp;&nbsp;<input type="checkbox" name="blue" value="blue" checked="'.$checked_5_eye_2.'" /> Blue 
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="brown" value="brown" checked="'.$checked_5_eye_3.'" /> Brown <br>

&nbsp; &nbsp; &nbsp; <input type="checkbox" name="gray " value="gray" checked="'.$checked_5_eye_4.'" />  Gray
&nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" name="green " value="green" checked="'.$checked_5_eye_5.'" /> Green 
&nbsp; &nbsp; <input type="checkbox" name="hazel " value="hazel" checked="'.$checked_5_eye_6.'" /> Hazel <br>

&nbsp; &nbsp; &nbsp; <input type="checkbox" name="maroon" value="maroon" checked="'.$checked_5_eye_7.'" /> Maroon 
&nbsp; &nbsp;<input type="checkbox" name="pink" value="pink" checked="'.$checked_5_eye_8.'" /> Pink 
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown" value="unknown" checked="'.$checked_5_eye_9.'" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 14, 195, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html= '<div><b>6.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 210, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
$checked_5_hair_1 = (showData('i_485_biographic_info_hair_color')=='black')? "checked":"";
$checked_5_hair_2= (showData('i_485_biographic_info_hair_color')=='blond')? "checked":"";
$checked_5_hair_3 = (showData('i_485_biographic_info_hair_color')=='brown')? "checked":"";
$checked_5_hair_4 = (showData('i_485_biographic_info_hair_color')=='gray')? "checked":"";
$checked_5_hair_5 = (showData('i_485_biographic_info_hair_color')=='red')? "checked":"";
$checked_5_hair_6 = (showData('i_485_biographic_info_hair_color')=='sandy')? "checked":"";
$checked_5_hair_7 = (showData('i_485_biographic_info_hair_color')=='white')? "checked":"";
$checked_5_hair_8 = (showData('i_485_biographic_info_hair_color')=='bald')? "checked":"";
$checked_5_hair_9 = (showData('i_485_biographic_info_hair_color')=='unknown')? "checked":"";

$html= '<div>   
&nbsp;<input type="checkbox" name="blad" value="blad" checked="'.$checked_5_hair_8.'" /> Blad(No hair) 
&nbsp;&nbsp;<input type="checkbox" name="black1" value="black" checked="'.$checked_5_hair_1.'" /> Black
&nbsp; &nbsp; &nbsp;&nbsp;<input type="checkbox" name="blond" value="blond" checked="'.$checked_5_hair_2.'" /> Blond <br>

 &nbsp; <input type="checkbox" name="brown " value="brown" checked="'.$checked_5_hair_3.'" /> brown 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp; <input type="checkbox" name="gray1 " value="gray" checked="'.$checked_5_hair_4.'" /> Gray 
 &nbsp; &nbsp; &nbsp; &nbsp; <input type="checkbox" name="red " value="red" checked="'.$checked_5_hair_5.'" /> Red <br>

 &nbsp; <input type="checkbox" name=" sandy" value=" sandy" checked="'.$checked_5_hair_6.'" /> Sandy  
&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; <input type="checkbox" name="white" value="white" checked="'.$checked_5_hair_7.'" />  White
&nbsp;  &nbsp;  &nbsp; <input type="checkbox" name="unknown1" value="unknown" checked="'.$checked_5_hair_9.'" /> Unknown/Other 

 </div>';
$pdf->writeHTMLCell(90, 7, 14, 216, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> </div>';
$pdf->writeHTMLCell(92, 7, 112, 17, $html, 1, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.    </b></div>';
$pdf->writeHTMLCell(90, 7, 111, 29, $html, 0, 0, false, true, 'J', true);

$html= '<div>Have you <b>EVER</b> been a member of, involved in, or in
any way associated with any organization, association,
fund, foundation, party, club, society, or similar group in
the United States or in any other location in the world
including any military service?</div>';
$pdf->writeHTMLCell(85, 7, 117, 29, $html, 0, 0, false, true, 'L', true);
$page9_part8_1_yes = (showData('i_485_general_eligibility_military_status')=='Y')? "checked":"";
$page9_part8_1_no = (showData('i_485_general_eligibility_military_status')=='N')? "checked":"";
$html= '<div><input type="checkbox" name="gligiblity" value="Y" checked="'.$page9_part8_1_yes.'" />  Yes  &nbsp; <input type="checkbox" name="gligiblity" value="N" checked="'.$page9_part8_1_no.'" />  No</div>';
$pdf->writeHTMLCell(90, 7, 178, 46, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div>If you answered "Yes" to <b>Item Number 1.</b>, complete <b>Item
Numbers 2. - 13.b.</b> below. If you need extra space to complete
this section, use the space provided in <b>Part 14. Additional
Information.</b> If you answered "No," but are unsure of your
answer, provide an explanation of the events and circumstances
in the space provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 52, $html, 0, 0, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html= '<div>Organization 1</div>';
$pdf->writeHTMLCell(90, 7, 112, 77, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.       </b>     &nbsp;    Name of Organization</div>';
$pdf->writeHTMLCell(90, 7, 112, 83, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_name_of_org', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 89);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.a.     </b>    City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 96, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_city_or_town', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 102);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>3.b.     </b>     State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 109, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_state_or_province', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 115);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.c.     </b>     Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 123, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_counrty', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 128);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>4.        </b>      &nbsp;     Nature of Group</div>';
$pdf->writeHTMLCell(90, 7, 112, 136, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_nature_of_group', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 142);
//...............

$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Membership or Dates of Involvement</div>';
$pdf->writeHTMLCell(90, 7, 112, 150, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.a.        </b>      &nbsp;     From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 157, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_date_from', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 157);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.b.        </b>      &nbsp;     To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 165, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_date_to', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 166);

$pdf->writeHTMLCell(90, 0, 113, 175, '', 'T', 1, false, true, 'J', true);


//.......org 2

$pdf->SetFont('times', '', 10);
$html= '<div>Organization 2</div>';
$pdf->writeHTMLCell(90, 7, 112, 176, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>6.       </b>     &nbsp;    Name of Organization</div>';
$pdf->writeHTMLCell(90, 7, 112, 182, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_name_of_org', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 188);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.a.     </b>    City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 196, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_city_or_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 202);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>7.b.     </b>     State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 210, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_state_or_province', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 216);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.c.     </b>     Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 224, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_counrty', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 230);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>8.        </b>      &nbsp;     Nature of Group</div>';
$pdf->writeHTMLCell(90, 7, 112, 238, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_nature_of_group', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 244);

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();

/********************************
******** End Page No 9 **********
*********************************/

/********************************
******** Start Page No 10 ********
*********************************/

//......
$pdf->AddPage('P', 'LETTER'); //page number 10

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//..............

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b>  (continued)</div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Membership or Dates of Involvement</div>';
$pdf->writeHTMLCell(90, 7, 12, 29, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>9.a.        </b>      &nbsp;     From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 36, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_date_from', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 36);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>9.b.        </b>      &nbsp;     To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_date_to', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72, 45);

$pdf->writeHTMLCell(92, 0, 13, 54, '', 'T', 1, false, true, 'J', true);
//..........organization 3 

$pdf->SetFont('times', '', 10);
$html= '<div>Organization 3</div>';
$pdf->writeHTMLCell(90, 7, 12, 55, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>10.       </b>   &nbsp;    Name of Organization</div>';
$pdf->writeHTMLCell(90, 7, 12, 62, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_name_of_org', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 67);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>11.a.    </b>       City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 74, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_city_or_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 80);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>11.b.       </b>      State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 87, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_state_or_province', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 93);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>11.c.       </b>       Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 100, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_counrty', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 106);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>12.         </b>       &nbsp;     Nature of Group</div>';
$pdf->writeHTMLCell(90, 7, 12, 113, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_nature_of_group', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 119);


$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Membership or Dates of Involvement</div>';
$pdf->writeHTMLCell(90, 7, 12, 128, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>13.a.         </b>      &nbsp;     From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 136, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_date_from', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 136);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>13.b.        </b>      &nbsp;     To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 145, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_date_to', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 145);

//...............

$pdf->SetFont('times', '', 10);
$html= '<div>Answer <b>Item Numbers 14. - 86.b.</b> Choose the answer that you<br>
think is correct. If you answer "Yes" to any questions <b>(or if<br>
you answer "No," but are unsure of your answer)</b>, provide<br>
in explanation of the events and circumstances in the space<br>
provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(93, 7, 12, 154, $html, 0, 0, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>14.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 176, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been denied admission to the United <br>
 states?</div>';
$pdf->writeHTMLCell(85, 7, 19, 176, $html, 0, 0, false, true, 'J', true);
$page10_part8_14_yes = (showData('i_485_14_denied_admission_status')=='Y')? "checked":"";
$page10_part8_14_no = (showData('i_485_14_denied_admission_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="admission" value="Y" checked="'.$page10_part8_14_yes.'" /> Yes <input type="checkbox" name="admission" value="N" checked="'.$page10_part8_14_no.'" /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 181, $html, 0, 0, false, true, 'J', true);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>15.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 187, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <>EVER<> been denied a visa to the United States?</div>';
$pdf->writeHTMLCell(85, 7, 19, 187, $html, 0, 0, false, true, 'J', true);
$page10_part8_15_yes = (showData('i_485_15_denied_visa_status')=='Y')? "checked":"";
$page10_part8_15_no = (showData('i_485_15_denied_visa_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="denied" value="Y" checked="'.$page10_part8_15_yes.'" /> Yes <input type="checkbox" name="denied" value="N" checked="'.$page10_part8_15_no.'" /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 192, $html, 0, 0, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>16.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 198, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> worked in the United States without<br>
  authorization?</div>';
$pdf->writeHTMLCell(85, 7, 19, 198, $html, 0, 0, false, true, 'J', true);
$page10_part8_16_yes = (showData('i_485_16_work_authorization_status')=='Y')? "checked":"";
$page10_part8_16_no = (showData('i_485_16_work_authorization_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="authorize" value="Y" checked="'.$page10_part8_16_yes.'" /> Yes <input type="checkbox" name="authorize" value="N" checked="'.$page10_part8_16_no.'" /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 203, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>17.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 209, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> violated the terms or conditions of your<br>
  nonimmigrant status?</div>';
$pdf->writeHTMLCell(85, 7, 19, 209, $html, 0, 0, false, true, 'J', true);
$page10_part8_17_yes = (showData('i_485_17_violeted_terms_status')=='Y')? "checked":"";
$page10_part8_17_no = (showData('i_485_17_violeted_terms_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="violated" value="Y" checked="'.$page10_part8_17_yes.'" /> Yes <input type="checkbox" name="violated" value="N" checked="'.$page10_part8_17_no.'" /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 214, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>18.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 221, $html, 0, 0, false, true, 'J', true);
$html= '<div> Are you presently or have you <b>EVER</b> been in removal,<br>
 exclusion, rescission, or deportation proceedings?</div>';
$pdf->writeHTMLCell(85, 7, 19, 221, $html, 0, 0, false, true, 'J', true);
$page10_part8_18_yes = (showData('i_485_18_present_deportion_status')=='Y')? "checked":"";
$page10_part8_18_no = (showData('i_485_18_present_deportion_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="removal" value="Y" checked="'.$page10_part8_18_yes.'" />  Yes <input type="checkbox" name="removal" value="N" checked="'.$page10_part8_18_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 230, $html, 0, 0, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>19.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 237, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been issued a final order of exclusion,<br>
 deportation, or removal?</div>';
$pdf->writeHTMLCell(85, 7, 19, 237, $html, 0, 0, false, true, 'J', true);
$page10_part8_19_yes = (showData('i_485_19_final_order_exclution_status')=='Y')? "checked":"";
$page10_part8_19_no = (showData('i_485_19_final_order_exclution_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="exclusion" value="Y" checked="'.$page10_part8_19_yes.'" />  Yes <input type="checkbox" name="exclusion" value="N" checked="'.$page10_part8_19_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 242, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>20.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  had a prior final order of exclusion,<br>
deportation, or removal reinstated?</div>';
$pdf->writeHTMLCell(85, 7, 119, 16, $html, 0, 0, false, true, 'J', true);
$page10_part8_20_yes = (showData('i_485_20_prior_final_order_status')=='Y')? "checked":"";
$page10_part8_20_no = (showData('i_485_20_prior_final_order_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="reinstated" value="Y" checked="'.$page10_part8_20_yes.'" />  Yes <input type="checkbox" name="reinstated" value="N" checked="'.$page10_part8_20_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 21, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>21.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 26, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  held lawful permanent resident status<br>
 which was later rescinded?</div>';
$pdf->writeHTMLCell(85, 7, 119, 26, $html, 0, 0, false, true, 'J', true);
$page10_part8_21_yes = (showData('i_485_21_lawful_permanent_status')=='Y')? "checked":"";
$page10_part8_21_no = (showData('i_485_21_lawful_permanent_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="lawful" value="Y" checked="'.$page10_part8_21_yes.'" />  Yes <input type="checkbox" name="lawful" value="N" checked="'.$page10_part8_21_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 31, $html, 0, 0, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>22.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 37, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been granted voluntary departure by an<br>
 immigration officer or an immigration judge but failed to<br>
 depart within the allotted time?</div>';
$pdf->writeHTMLCell(85, 7, 119, 37, $html, 0, 0, false, true, 'J', true);
$page10_part8_22_yes = (showData('i_485_22_voluntary_departure_status')=='Y')? "checked":"";
$page10_part8_22_no = (showData('i_485_22_voluntary_departure_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="granted" value="Y" checked="'.$page10_part8_22_yes.'" />  Yes <input type="checkbox" name="granted" value="N" checked="'.$page10_part8_22_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 47, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>23.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 53, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  applied for any kind of relief or<br>
 protection from removal, exclusion, or deportation?</div>';
$pdf->writeHTMLCell(85, 7, 119, 53, $html, 0, 0, false, true, 'J', true);
$page10_part8_23_yes = (showData('i_485_23_relief_protection_status')=='Y')? "checked":"";
$page10_part8_23_no = (showData('i_485_23_relief_protection_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="relief" value="Y" checked="'.$page10_part8_23_yes.'" />  Yes <input type="checkbox" name="relief" value="N" checked="'.$page10_part8_23_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 62, $html, 0, 0, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html= '<div><b>24.a.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 68, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been a J nonimmigrant exchange visitor<br>
 who was subject to the two-year foreign residence<br>
 requirement?</div>';
$pdf->writeHTMLCell(85, 7, 119, 68, $html, 0, 0, false, true, 'J', true);
$page10_part8_24a_yes = (showData('i_485_24a_nonimmigrant_exchange_status')=='Y')? "checked":"";
$page10_part8_24a_no = (showData('i_485_24a_nonimmigrant_exchange_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="foreign" value="Y" checked="'.$page10_part8_24a_yes.'" />  Yes <input type="checkbox" name="foreign" value="N" checked="'.$page10_part8_24a_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 77, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div>If you answered "Yes" to <b>Item Number 24.a.</b>, complete <b>Item
Numbers 24.b. - 24.c.</b> If you answered "No" to <b>Item Number
24.a.</b>, skip to <b>Item Number 25</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 84, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>24.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 0, false, true, 'J', true);
$html= '<div>  Have you complied with the foreign residence<br>
  requirement?</div>';
$pdf->writeHTMLCell(85, 7, 119, 98, $html, 0, 0, false, true, 'J', true);
$page10_part8_24b_yes = (showData('i_485_2ba_complied_foreign_status')=='Y')? "checked":"";
$page10_part8_24b_no = (showData('i_485_2ba_complied_foreign_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="complied" value="Y" checked="'.$page10_part8_24b_yes.'" />  Yes <input type="checkbox" name="complied" value="N" checked="'.$page10_part8_24b_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 103, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>24.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 109, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you been granted a waiver or has Department of<br>
 State issued a favorable waiver recommendation letter<br>
 for you?</div>';
$pdf->writeHTMLCell(85, 7, 119, 109, $html, 0, 0, false, true, 'J', true);
$page10_part8_24c_yes = (showData('i_485_24c_granted_waiver_status')=='Y')? "checked":"";
$page10_part8_24c_no = (showData('i_485_24c_granted_waiver_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="waiver" value="Y" checked="'.$page10_part8_24c_yes.'" />  Yes <input type="checkbox" name="waiver" value="N" checked="'.$page10_part8_24c_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 118, $html, 0, 0, false, true, 'J', true);
//..........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Criminal Acts and Violations</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 130, $html, 0, 0, true, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html= '<div>For <b>Item Numbers 25. - 45.</b>, you must answer "Yes" to any
question that applies to you, even if your records were sealed or
otherwise cleared, or even if anyone, including a judge, law
enforcement officer, or attorney, told you that you no longer
have a record. You must also answer "Yes" to the following
questions whether the action or offense occurred here in the
United States or anywhere else in the world. If you answer
"Yes" to <b>Item Numbers 25. - 45.</b>, use the space provided in
<b>Part 14. Additional Information</b> to provide an explanation
that includes why you were arrested, cited, detained, or charged;
where you were arrested, cited, detained, or charged; when
(date) the event occurred; and the outcome or disposition (fo
example, no charges filed, charges dismissed, jail, probation,
community service).</div>';
$pdf->writeHTMLCell(92, 7, 112, 138, $html, 0, 0, false, true, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>25.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 199, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been arrested, cited, charged, or<br>
 detained for any reason by any law enforcement official<br>
 (including but not limited to any U.S. immigration<br>
 official or any official of the U.S. armed forces or U.S.<br>
 Coast Guard)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 199, $html, 0, 0, false, true, 'J', true);
$page10_part8_25_yes = (showData('i_485_25_granted_waiver_status')=='Y')? "checked":"";
$page10_part8_25_no = (showData('i_485_25_granted_waiver_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="arrested" value="Y" checked="'.$page10_part8_25_yes.'" />  Yes <input type="checkbox" name="arrested" value="N" checked="'.$page10_part8_25_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 218, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>26.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> committed a crime of any kind (even if<br>
 you were not arrested, cited, charged with, or tried for that<br>
 rime)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 225, $html, 0, 0, false, true, 'J', true);
$page10_part8_26_yes = (showData('i_485_26_comitted_crime_status')=='Y')? "checked":"";
$page10_part8_26_no = (showData('i_485_26_comitted_crime_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="crime" value="Y" checked="'.$page10_part8_26_yes.'" />  Yes   <input type="checkbox" name="crime" value="N" checked="'.$page10_part8_26_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 235, $html, 0, 0, false, true, 'J', true);

//...........

/********************************
******** End Page No 10 **********
*********************************/

/********************************
******** Start Page No 11 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 11
//..........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();

//...........
$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b>  (continued)</div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>27.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> pled guilty to or been convicted of a<br>
 crime or offense (even if the violation was subsequently<br>
 expunged or sealed by a court, or if you were granted a<br>
 pardon, amnesty, a rehabilitation decree, or other act of<br> 
 clemency)?</div>';
$pdf->writeHTMLCell(85, 7, 19, 30, $html, 0, 0, false, true, 'J', true);
$page10_part8_27_yes = (showData('i_485_27_pled_guilty_status')=='Y')? "checked":"";
$page10_part8_27_no = (showData('i_485_27_pled_guilty_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="guilty" value="Y" checked="'.$page10_part8_27_yes.'" />  Yes   <input type="checkbox" name="guilty" value="N" checked="'.$page10_part8_27_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 48, $html, 0, 0, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you were the beneficiary of a pardon, amnesty,
a rehabilitation decree, or other act of clemency, provide
documentation of that post-conviction action.</div>';
$pdf->writeHTMLCell(85, 7, 19, 54, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>28.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 69, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been ordered punished by a judge or had<br>
 conditions imposed on you that restrained your liberty<br>
 (such as a prison sentence, suspended sentence, house<br>
 arrest, parole, alternative sentencing, drug or alcohol<br>
 treatment, rehabilitative programs or classes, probation, or<br>
 community service)?</div>';
$pdf->writeHTMLCell(85, 7, 19, 69, $html, 0, 0, false, true, 'J', true);
$page10_part8_28_yes = (showData('i_485_28_punished_by_judge_status')=='Y')? "checked":"";
$page10_part8_28_no = (showData('i_485_28_punished_by_judge_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="punished" value="Y" checked="'.$page10_part8_28_yes.'" />  Yes   <input type="checkbox" name="punished" value="N" checked="'.$page10_part8_28_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 92, $html, 0, 0, false, true, 'J', true);
//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>29.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been a defendant or the accused in a<br>
 criminal proceeding (including pre-trial diversion,<br>
 deferred prosecution, deferred adjudication, or any<br>
 withheld adjudication)?</div>';
$pdf->writeHTMLCell(85, 7, 19, 98, $html, 0, 0, false, true, 'J', true);
$page10_part8_29_yes = (showData('i_485_29_defendant_accused_status')=='Y')? "checked":"";
$page10_part8_29_no = (showData('i_485_29_defendant_accused_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="accused" value="Y" checked="'.$page10_part8_29_yes.'" />  Yes   <input type="checkbox" name="accused" value="N" checked="'.$page10_part8_29_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 112, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>30.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 118, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> violated (or attempted or conspired to<br>
violate) any controlled substance law or regulation of a<br>
state, the United States, or a foreign country?</div>';
$pdf->writeHTMLCell(85, 7, 19, 118, $html, 0, 0, false, true, 'J', true);
$page10_part8_30_yes = (showData('i_485_30_violeted_status')=='Y')? "checked":"";
$page10_part8_30_no = (showData('i_485_30_violeted_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="conspired" value="Y" checked="'.$page10_part8_30_yes.'" />  Yes   <input type="checkbox" name="conspired" value="N" checked="'.$page10_part8_30_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 131, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>31.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 139, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been convicted of two or more offenses<br>
 (other than purely political offenses) for which the<br>
 combined sentences to confinement were five years or<br>
 more?</div>';
$pdf->writeHTMLCell(85, 7, 19,139, $html, 0, 0, false, true, 'J', true);
$page10_part8_31_yes = (showData('i_485_31_convicted_offense_status')=='Y')? "checked":"";
$page10_part8_31_no = (showData('i_485_31_convicted_offense_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="which" value="Y" checked="'.$page10_part8_31_yes.'" />  Yes   <input type="checkbox" name="which" value="N" checked="'.$page10_part8_31_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 154, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>32.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  illicitly (illegally) trafficked or benefited<br>
 from the trafficking of any controlled substances, such as<br>
 chemicals, illegal drugs, or narcotics?</div>';
$pdf->writeHTMLCell(85, 7, 19, 160, $html, 0, 0, false, true, 'J', true);
$page10_part8_32_yes = (showData('i_485_32_illicitly_trafficked_status')=='Y')? "checked":"";
$page10_part8_32_no = (showData('i_485_32_illicitly_trafficked_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="illicitly" value="Y" checked="'.$page10_part8_32_yes.'" />  Yes   <input type="checkbox" name="illicitly" value="N" checked="'.$page10_part8_32_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 172, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>33.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 178, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> knowingly aided, abetted, assisted,<br>
 conspired, or colluded in the illicit trafficking of any<br>
 illegal narcotic or other controlled substances?</div>';
$pdf->writeHTMLCell(85, 7, 19, 178, $html, 0, 0, false, true, 'J', true);
$page10_part8_33_yes = (showData('i_485_33_knowingly_aided_status')=='Y')? "checked":"";
$page10_part8_33_no = (showData('i_485_33_knowingly_aided_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="knowingly" value="Y" checked="'.$page10_part8_33_yes.'" />  Yes   <input type="checkbox" name="knowingly" value="N" checked="'.$page10_part8_33_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 193, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>34.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you the spouse, son, or daughter of a foreign national<br>
 who illicitly trafficked or aided (or otherwise abetted,<br>
 assisted, conspired, or colluded) in the illicit trafficking of<br>
 a controlled substance, such as chemicals, illegal drugs, or<br>
 narcotics and you obtained, within the last five years, any<br>
 financial or other benefit from the illegal activity of your<br>
 spouse or parent, although you knew or reasonably should<br>
 have known that the financial or other benefit resulted<br>
 from the illicit activity of your spouse or parent?</div>';
$pdf->writeHTMLCell(85, 7, 19, 200, $html, 0, 0, false, true, 'J', true);
$page10_part8_34_yes = (showData('i_485_34_spouse_daughter_foreign_national_status')=='Y')? "checked":"";
$page10_part8_34_no = (showData('i_485_34_spouse_daughter_foreign_national_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="national" value="Y" checked="'.$page10_part8_34_yes.'" />  Yes   <input type="checkbox" name="national" value="N" checked="'.$page10_part8_34_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 240, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>35.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> engaged in prostitution or are you<br>
 coming to the United States to engage in prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 119, 16, $html, 0, 0, false, true, 'J', true);
$page10_part8_35_yes = (showData('i_485_35_spouse_daughter_foreign_national_status')=='Y')? "checked":"";
$page10_part8_35_no = (showData('i_485_35_spouse_daughter_foreign_national_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="engaged" value="Y" checked="'.$page10_part8_35_yes.'" />  Yes   <input type="checkbox" name="engaged" value="N" checked="'.$page10_part8_35_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 26, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>36.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  directly or indirectly procured (or<br>
 attempted to procure) or imported prostitutes or persons<br>
 or the purpose of prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 119, 31, $html, 0, 0, false, true, 'J', true);
$page10_part8_36_yes = (showData('i_485_36_attempted_procure_status')=='Y')? "checked":"";
$page10_part8_36_no = (showData('i_485_36_attempted_procure_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="directly" value="Y" checked="'.$page10_part8_36_yes.'" />  Yes   <input type="checkbox" name="directly" value="N" checked="'.$page10_part8_36_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 42, $html, 0, 0, false, true, 'J', false);
//........


$pdf->SetFont('times', '', 10);
$html= '<div><b>37.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 48, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  received any proceeds or money from<br>
 prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 119, 48, $html, 0, 0, false, true, 'J', true);
$page10_part8_37_yes = (showData('i_485_37_received_proceeds_status')=='Y')? "checked":"";
$page10_part8_37_no = (showData('i_485_37_received_proceeds_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="received" value="Y" checked="'.$page10_part8_37_yes.'" />  Yes   <input type="checkbox" name="received" value="N" checked="'.$page10_part8_37_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 54, $html, 0, 0, false, true, 'J', false);

//........
$pdf->SetFont('times', '', 10);
$html= '<div><b>38.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 0, false, true, 'J', true);
$html= '<div> Do you intend to engage in illegal gambling or any other<br>
 form of commercialized vice, such as prostitution,<br>
 bootlegging, or the sale of child pornography, while in the<br>
 United States?</div>';
$pdf->writeHTMLCell(85, 7, 119, 60, $html, 0, 0, false, true, 'J', true);
$page10_part8_38_yes = (showData('i_485_38_illegal_gambling_status')=='Y')? "checked":"";
$page10_part8_38_no = (showData('i_485_38_illegal_gambling_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="intend" value="Y" checked="'.$page10_part8_38_yes.'" />  Yes   <input type="checkbox" name="intend" value="N" checked="'.$page10_part8_38_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 75, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>39.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 81, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> exercised immunity (diplomatic or<br>
 otherwise) to avoid being prosecuted for a criminal<br>
 offense in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 119, 81, $html, 0, 0, false, true, 'J', true);
$page10_part8_39_yes = (showData('i_485_39_exercised_immunity_status')=='Y')? "checked":"";
$page10_part8_39_no = (showData('i_485_39_exercised_immunity_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="exercised" value="Y" checked="'.$page10_part8_39_yes.'" />  Yes   <input type="checkbox" name="exercised" value="N" checked="'.$page10_part8_39_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 92, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>40.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>, while serving as a foreign government<br>
 official, been responsible for or directly carried out<br>
 violations of religious freedoms? </div>';
$pdf->writeHTMLCell(85, 7, 119, 98, $html, 0, 0, false, true, 'J', true);
$page10_part8_40_yes = (showData('i_485_40_while_erving_status')=='Y')? "checked":"";
$page10_part8_40_no = (showData('i_485_40_while_erving_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="freedoms" value="Y" checked="'.$page10_part8_40_yes.'" />  Yes   <input type="checkbox" name="freedoms" value="N" checked="'.$page10_part8_40_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 109, $html, 0, 0, false, true, 'J', false);


//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>41.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 115, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> induced by force, fraud, or coercion (or<br>
 otherwise been involved in) the trafficking of persons for<br>
 commercial sex acts?</div>';
$pdf->writeHTMLCell(85, 7, 119, 115, $html, 0, 0, false, true, 'J', true);
$page10_part8_41_yes = (showData('i_485_41_force_fraud_coercion_status')=='Y')? "checked":"";
$page10_part8_41_no = (showData('i_485_41_force_fraud_coercion_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="coercion" value="Y" checked="'.$page10_part8_41_yes.'" />  Yes   <input type="checkbox" name="coercion" value="N" checked="'.$page10_part8_41_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 126, $html, 0, 0, false, true, 'J', false);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>42.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 132, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> trafficked a person into involuntary<br>
 servitude, peonage, debt bondage, or slavery? Trafficking<br>
 includes recruiting, harboring, transporting, providing, or<br>
 obtaining a person for labor or services through the use of<br>
 force, fraud, or coercion.</div>';
$pdf->writeHTMLCell(85, 7, 119, 132, $html, 0, 0, false, true, 'J', true);
$page10_part8_42_yes = (showData('i_485_42_trafficked_person_status')=='Y')? "checked":"";
$page10_part8_42_no = (showData('i_485_42_trafficked_person_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="involuntary" value="Y" checked="'.$page10_part8_42_yes.'" />  Yes   <input type="checkbox" name="involuntary" value="N" checked="'.$page10_part8_42_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 151, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>43.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 157, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  knowingly aided, abetted, assisted,<br>
 conspired, or colluded with others in trafficking persons<br>
 for commercial sex acts or involuntary servitude,<br>
 peonage, debt bondage, or slavery?</div>';
$pdf->writeHTMLCell(85, 7, 119, 157, $html, 0, 0, false, true, 'J', true);
$page10_part8_43_yes = (showData('i_485_43_knowingly_aided_status')=='Y')? "checked":"";
$page10_part8_43_no = (showData('i_485_43_knowingly_aided_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="peonage" value="Y" checked="'.$page10_part8_43_yes.'" />  Yes   <input type="checkbox" name="peonage" value="N" checked="'.$page10_part8_43_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 173, $html, 0, 0, false, true, 'J', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>44.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 179, $html, 0, 0, false, true, 'J', true);
$html= '<div> Are you the spouse, son or daughter of a foreign national<br>
 who engaged in the trafficking of persons and have<br>
 received or obtained, within the last five years, any<br>
 financial or other benefits from the illicit activity of your<br>
 spouse or your parent, although you knew or reasonably<br>
 should have known that this benefit resulted from<br> 
 the illicitactivity of your spouse or parent?</div>';
$pdf->writeHTMLCell(85, 7, 119, 179, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_44_spouse_daughter_foreign_national_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_44_spouse_daughter_foreign_national_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="spouse" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="spouse" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 210, $html, 0, 0, false, true, 'J', false);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>45.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 216, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> engaged in money laundering or have
you <b>EVER</b> knowingly aided, assisted, conspired, or
colluded with others in money laundering or do you seek
to enter the United States to engage in such activity?</div>';
$pdf->writeHTMLCell(85, 7, 119, 216, $html, 0, 0, false, true, 'J', true);
$page10_part8_45_yes = (showData('i_485_45_engaged_money_laundering_status')=='Y')? "checked":"";
$page10_part8_45_no = (showData('i_485_45_engaged_money_laundering_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="laundering" value="Y" checked="'.$page10_part8_45_yes.'" />  Yes   <input type="checkbox" name="laundering" value="N" checked="'.$page10_part8_45_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 237, $html, 0, 0, false, true, 'J', false);
//......
/********************************
******** End Page No 11 **********
*********************************/

/********************************
******** Start Page No 12 ********
*********************************/
// add a page
$pdf->AddPage('P', 'LETTER');  // page number 12
//............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//..............

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> (continued) </div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Security and Related</b></div>';
$pdf->writeHTMLCell(92, 7, 13, 31, $html, 0, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html= '<div>Do you intend to:</div>';
$pdf->writeHTMLCell(90, 7, 12, 39, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 46, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity that violates or evades any law
relating to espionage (including spying) or sabotage in the
United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 46, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_46a_activity_violates_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_46a_activity_violates_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="evades" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="evades" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 57, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity in the United States that violates or
evades any law prohibiting the export from the United
States of goods, technology, or sensitive information?</div>';
$pdf->writeHTMLCell(85, 7, 20, 63, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_46b_engage_activity_violates_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_46b_engage_activity_violates_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="sensitive" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="sensitive" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 77, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 82, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity whose purpose includes opposing,
controlling, or overthrowing the U.S. Government by
force, violence, or other unlawful means while in the
United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 82, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_46c_engage_activity_purpose_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_46c_engage_activity_purpose_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="unlawful" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="unlawful" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 97, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity that could endanger the welfare,
safety, or security of the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 102, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_46d_could_endanger_welfare_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_46d_could_endanger_welfare_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="security" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="security" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 110, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 116.5, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any other unlawful activity? </div>';
$pdf->writeHTMLCell(85, 7, 20, 116.5, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_46e_unlawful_activity_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_46e_unlawful_activity_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="activity_" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="activity_" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 118, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>47.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 124, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you engaged in or, upon your entry into the United
States, do you intend to engage in any activity that could
have potentially serious adverse foreign policy
consequences for the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 124, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_47_upon_your_entry_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_47_upon_your_entry_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="consequences" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="consequences" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 140, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div>Have you <b>EVER</b>:</div>';
$pdf->writeHTMLCell(90, 7, 12, 146, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 152, $html, 0, 0, false, true, 'J', true);
$html= '<div>Committed, threatened to commit, attempted to commit,
conspired to commit, incited, endorsed, advocated,
planned, or prepared any of the following: hijacking,
sabotage, kidnapping, political assassination, or use of a
weapon or explosive to harm another individual or cause
substantial damage to property?</div>';
$pdf->writeHTMLCell(85, 7, 20, 152, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_48a_threatened_to_commit_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_48a_threatened_to_commit_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="committed" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="committed" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 175, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 0, false, true, 'J', true);
$html= '<div>Participated in, or been a member of, a group or
organization that did any of the activities described in
<b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 181, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_48b_Participated_been_member_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_48b_Participated_been_member_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="participated" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="participated" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 193, $html, 0, 0, false, true, 'J', false);

//.......


$pdf->SetFont('times', '', 10);
$html= '<div><b>48.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 199, $html, 0, 0, false, true, 'J', true);
$html= '<div>Recruited members or asked for money or things of value
for a group or organization that did any of the activities
described in <b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 199, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_48c_Recruited_members_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_48c_Recruited_members_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="recruited" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="recruited" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 210, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 216, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support for any of the activities
described in <b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 216, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_48d_provided_money_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_48d_provided_money_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="assistance" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="assistance" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 227, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
<br>any other assistance or support for an individual, group,
<br>or organization who did any of the activities described <br>in
<b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(90, 7, 120, 16, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_48e_provided_money_individual_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_48e_provided_money_individual_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="money_" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="money_" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 31, $html, 0, 0, false, true, 'J', false);
//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>49.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 37, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> received any type of military,
paramilitary, or weapons training?</div>';
$pdf->writeHTMLCell(85, 7, 120, 37, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_49_received_type_military_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_49_received_type_military_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="weapons" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="weapons" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 44, $html, 0, 0, false, true, 'J', false);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>50.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 50, $html, 0, 0, false, true, 'J', true);
$html= '<div>Do you intend to engage in any of the activities listed in
any part of <b>Item Numbers 48.a. - 49.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 50, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_50_intend_engage_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_50_intend_engage_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="engage" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="engage" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 56, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you answered "Yes" to any part of <b>Item Numbers
46.a. - 50.</b>, explain what you did, including the dates and
location of the circumstances, or what you intend to do in the
space provided in <b>Part 14. Additional Information.</b>
</div>';
$pdf->writeHTMLCell(90, 7, 112, 62, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div>Are you the spouse or child of an individual who <b>EVER:</b> </div>';
$pdf->writeHTMLCell(90, 7, 112, 80, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 86, $html, 0, 0, false, true, 'J', true);
$html= '<div>Committed, threatened to commit, attempted to commit,
conspired to commit, incited, endorsed, advocated,
planned, or prepared any of the following: hijacking,
sabotage, kidnapping, political assassination, or use of a
weapon or explosive to harm another individual or cause
substantial damage to property?</div>';
$pdf->writeHTMLCell(85, 7, 120, 86, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_51a_threatened_to_commit_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_51a_threatened_to_commit_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="property" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="property" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 109, $html, 0, 0, false, true, 'J', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 115, $html, 0, 0, false, true, 'J', true);
$html= '<div>Participated in, or been a member or a representative of a
group or organization that did any of the activities
described in <b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 115, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_51b_participated_representative_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_51b_participated_representative_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="representative" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="representative" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 127, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 133, $html, 0, 0, false, true, 'J', true);
$html= '<div>Recruited members, or asked for money or things of value,
for a group or organization that did any of the activities
described in <b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 133, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_51c_recruited_members_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_51c_recruited_members_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="things" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="things" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 144, $html, 0, 0, false, true, 'J', false);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 150, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support for any of the activities
described in <b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 150, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_51d_provided_money_thing_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_51d_provided_money_thing_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_51d" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_51d" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 161, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 167, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support to an individual, group, or
organization who did any of the activities described in
<b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 167, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_51e_recruited_members_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_51e_recruited_members_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_51e" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_51e" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 181, $html, 0, 0, false, true, 'J', false);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.f.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 187, $html, 0, 0, false, true, 'J', true);
$html= '<div>Received any type of military, paramilitary, or weapons
training from a group or organization that did any of the
activities described in ,<b>Item Number 51.a.,</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 187, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_51f_received_type_military_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_51f_received_type_military_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_51f" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_51f" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 181, 201, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you answered " Yes" to any part of <b>Item Number
51.</b>, explain the relationship and what occurred, including the
dates and location of the circumstances, in the space provided
in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 206, $html, 0, 0, false, true, 'J', true);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>52.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> assisted or participated in selling,
providing, or transporting weapons to any person who,
<br>to your knowledge, used them against another person?</div>';
$pdf->writeHTMLCell(85, 7, 120, 225, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_52_assisted_participated_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_52_assisted_participated_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_52" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_52" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 240, $html, 0, 0, false, true, 'J', false);


//........
/********************************
******** End Page No 12 **********
*********************************/

/********************************
******** Start Page No 13 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 13
//.............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//...........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> (continued) </div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.........


$pdf->SetFont('times', '', 10);
$html= '<div><b>53.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> worked, volunteered, or otherwise
served in any prison, jail, prison camp, detention facility,
labor camp, or any other situation that involved detaining
persons?</div>';
$pdf->writeHTMLCell(85, 7, 20, 30, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_53_ever_worked_volunteered_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_53_ever_worked_volunteered_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_53" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_53" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 44, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>54.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 49, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been a member of, assisted, or
participated in any group, unit, or organization of any
kind in which you or other persons used any type of
weapon against any person or threatened to do so?</div>';
$pdf->writeHTMLCell(85, 7, 20, 49, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_54_ever_been_member_assisted_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_54_ever_been_member_assisted_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_54" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_54" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 66, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>55.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 72, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> served in, been a member of, assisted,
or participated in any military unit, paramilitary unit,
police unit, self-defense unit, vigilante unit, rebel group,
guerilla group, militia, insurgent organization, or any
other armed group?</div>';
$pdf->writeHTMLCell(85, 7, 20, 72, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_55_ever_served_participated_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_55_ever_served_participated_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_55" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_55" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 91, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>56.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 97, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been a member of, or in any way
affiliated with, the Communist Party or any other
totalitarian party (in the United States or abroad)?</div>';
$pdf->writeHTMLCell(85, 7, 20, 97, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_56_affiliated_communist_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_56_affiliated_communist_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_56" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_56" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 111, $html, 0, 0, false, true, 'J', false);

//.........


$pdf->SetFont('times', '', 10);
$html= '<div><b>57.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 0, false, true, 'J', true);
$html= '<div>During the period from March 23, 1933 to May 8, 1945,
did you ever order, incite, assist, or otherwise participate
in the persecution of any person because of race, religion,
national origin, or political opinion, in association with
either the Nazi government of Germany or any
organization or government associated or allied with the
Nazi government of Germany?</div>';
$pdf->writeHTMLCell(85, 7, 20, 117, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_57_during_period_march_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_57_during_period_march_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_57" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_57" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 144, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div>Have you <b>EVER</b> ordered, incited, called for, committed, assisted,
helped with, or otherwise participated in any of the following:</div>';
$pdf->writeHTMLCell(95, 7, 12, 150, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 0, false, true, 'J', true);
$html= '<div>Acts involving torture or genocide?</div>';
$pdf->writeHTMLCell(85, 7, 20, 162, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_58a_acts_involving_torture_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_58a_acts_involving_torture_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_58a" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_58a" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 163, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 170, $html, 0, 0, false, true, 'J', true);
$html= '<div> Killing any person?</div>';
$pdf->writeHTMLCell(85, 7, 20, 170, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_58b_killing_any_person_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_58b_killing_any_person_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_58b" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_58b" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 171, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 178, $html, 0, 0, false, true, 'J', true);
$html= '<div>Intentionally and severely injuring any person?</div>';
$pdf->writeHTMLCell(85, 7, 20, 178, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_58c_intentionally_severely_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_58c_intentionally_severely_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_58c" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_58c" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  184, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>58.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 190, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engaging in any kind of sexual contact or relations with
any person who did not consent or was unable to consent,
or was being forced or threatened?</div>';
$pdf->writeHTMLCell(85, 7, 20, 190, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_58d_engaging_sexual_contact_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_58d_engaging_sexual_contact_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_58d" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_58d" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  201, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 208, $html, 0, 0, false, true, 'J', true);
$html= '<div>Limiting or denying any person\'s ability to exercise
religious beliefs?</div>';
$pdf->writeHTMLCell(85, 7, 20, 208, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_58e_limiting_denying_any_person_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_58e_limiting_denying_any_person_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_58e" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_58e" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  215, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>59.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 222, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> recruited, enlisted, conscripted, or used
any person under 15 years of age to serve in or help an
armed force or group?</div>';
$pdf->writeHTMLCell(85, 7, 20, 222, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_59_recruited_enlisted_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_59_recruited_enlisted_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_59" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_59" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  233, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>60.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 15, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> used any person under 15 years of age
to take part in hostilities, or to help or provide services to
people in combat?</div>';
$pdf->writeHTMLCell(85, 7, 120, 15, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_60_hostilities_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_60_hostilities_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_60" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_60" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  26, $html, 0, 0, false, true, 'J', false);

//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you answered "Yes" to any part of <b>Item Numbers
52. - 60.</b>, explain what occurred, including the dates and
location of the circumstances, in the space provided in <b>Part 14.
Additional Information.</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 31, $html, 0, 0, false, true, 'J', true);

//......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Public Charge</b></div>';
$pdf->writeHTMLCell(92, 7, 113, 52, $html, 0, 0, true, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>61.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 0, false, true, 'L', true);
$html= '<div>Are you subject to the public charge ground of inadmissibility under INA section 212(a)(4)?</div>';
$pdf->writeHTMLCell(85, 7, 120, 60, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_61_subject_public_charge_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_61_subject_public_charge_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_61" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_61" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  70, $html, 0, 0, false, true, 'L', false);

//.....

$pdf->SetFont('times', '', 10);
$html= '<div>If you answered "Yes" to <b>Item Number 61.</b>, complete <b>Item Numbers 62. - 68.d.</b> below. If you answered "No" to <b>Item Number 61.</b>, go to <b>Item Number 69.a.</b> If you need extra space to complete this section, use the space provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(91, 7, 112, 78, $html, 0, 0, false, true, 'L', true);

//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>62.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 103, $html, 0, 0, false, true, 'L', true);
$html= '<div>What is the size of your household?</div>';
$pdf->writeHTMLCell(85, 7, 120, 103, $html, 0, 0, false, true, 'L', true);
//.........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('general_eligibility_household_size', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 109);
//.......


$pdf->SetFont('times', '', 10);
$html= '<div><b>63.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 118, $html, 0, 0, false, true, 'L', true);
$html= '<div>Indicate your annual household income.</div>';
$pdf->writeHTMLCell(85, 7, 118, 118, $html, 0, 0, false, true, 'L', true);
$pdf->setCellHeightRatio(1.4);
$checked_63a    = (showData('i_485_general_eligibility_household_income')=='a')? "checked":"";
$checked_63b    = (showData('i_485_general_eligibility_household_income')=='b')? "checked":"";
$checked_63c    = (showData('i_485_general_eligibility_household_income')=='c')? "checked":"";
$checked_63d    = (showData('i_485_general_eligibility_household_income')=='d')? "checked":"";
$checked_63e    = (showData('i_485_general_eligibility_household_income')=='e')? "checked":"";

$html= '<div><input type="checkbox" name="part8_63_1" value="$0-27,000" checked="'.$checked_63a.'" />   $0-27,000<br>
<input type="checkbox" name="part8_63_2" value="$27,001-52,000" checked="'.$checked_63b.'" />  $27,001-52,000<br>
<input type="checkbox" name="part8_63_3" value="$52,001-85,000" checked="'.$checked_63c.'" />  $52,001-85,000<br>
<input type="checkbox" name="part8_63_4" value="$85,001-141,000" checked="'.$checked_63d.'" />  $85,001-141,000<br>
<input type="checkbox" name="part8_63_4" value="Over $141,000" checked="'.$checked_63e.'" />  Over $141,000

</div>';
$pdf->writeHTMLCell(85, 7, 118,  125, $html, 0, 0, false, true, 'L', false);

//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>64.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 150, $html, 0, 0, false, true, 'L', true);
$html= '<div>Identify the total value of your household assets.</div>';
$pdf->writeHTMLCell(85, 7, 118, 150, $html, 0, 0, false, true, 'L', true);

$checked_64a = (showData('i_485_general_eligibility_household_assets')=='a')? "checked":"";
$checked_64b = (showData('i_485_general_eligibility_household_assets')=='b')? "checked":"";
$checked_64c = (showData('i_485_general_eligibility_household_assets')=='c')? "checked":"";
$checked_64d = (showData('i_485_general_eligibility_household_assets')=='d')? "checked":"";
$checked_64e = (showData('i_485_general_eligibility_household_assets')=='e')? "checked":"";

$html= '<div><input type="checkbox" name="part8_64_1" value="$0-18,400" checked="'.$checked_64a.'" />   $0-18,400<br>
<input type="checkbox" name="part8_64_2" value="$18.401-136,000" checked="'.$checked_64b.'" />  $18.401-136,000<br>
<input type="checkbox" name="part8_64_3" value="$136,001-321,400" checked="'.$checked_64c.'" />  $136,001-321,400<br>
<input type="checkbox" name="part8_64_4" value="$321.401-707,100" checked="'.$checked_64d.'" />  $321.401-707,100<br>
<input type="checkbox" name="part8_64_4" value="Over $707,100" checked="'.$checked_64e.'" />  Over $707,100
</div>';
$pdf->writeHTMLCell(85, 7, 118,  157, $html, 0, 0, false, true, 'L', false);
$pdf->setCellHeightRatio(1.2);
//.....

/********************************
******** End Page No 12 **********
*********************************/

/********************************
******** Start Page No 14 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 14
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> (continued) </div>';
$pdf->writeHTMLCell(190, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.................

$pdf->SetFont('times', '', 10);
$html= '<div><b>65. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 25, $html, 0, 0, false, true, 'L', true);
$html= '<div>Identify the total value of your household liabilities (including both secured and unsecured liabilities).</div>';
$pdf->writeHTMLCell(190, 7, 20, 25, $html, 0, 0, false, true, 'L', true);

$checked_65a = (showData('i_485_general_eligibility_household_liabilities')=='a')? "checked":"";
$checked_65b= (showData('i_485_general_eligibility_household_liabilities')=='b')? "checked":"";
$checked_65c = (showData('i_485_general_eligibility_household_liabilities')=='c')? "checked":"";
$checked_65d= (showData('i_485_general_eligibility_household_liabilities')=='d')? "checked":"";
$checked_65e = (showData('i_485_general_eligibility_household_liabilities')=='e')? "checked":"";

$html= '<div><input type="checkbox" name="part8_65_1" value="$0" checked="'.$checked_65a.'" />  $0</div>';
$pdf->writeHTMLCell(85, 7, 20,  32, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_65_2" value="$1-10,100" checked="'.$checked_65b.'" />  $1-10,100</div>';
$pdf->writeHTMLCell(85, 7, 35,  32, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_65_3" value="$10,101-57,700" checked="'.$checked_65c.'" />  $10,101-57,700</div>';
$pdf->writeHTMLCell(85, 7, 60,  32, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_65_4" value="$57,701-186,800" checked="'.$checked_65d.'" />  $57,701-186,800</div>';
$pdf->writeHTMLCell(85, 7, 95,  32, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_65_5" value="Over $186,800" checked="'.$checked_65e.'" />  Over $186,800</div>';
$pdf->writeHTMLCell(85, 7, 130,  32, $html, 0, 0, false, true, 'L', false);


$pdf->SetFont('times', '', 10);
$html= '<div><b>66. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 40, $html, 0, 0, false, true, 'L', true);
$html= '<div> What is the highest degree or level of school you have completed?</div>';
$pdf->writeHTMLCell(190, 7, 20, 40, $html, 0, 0, false, true, 'L', true);

//..first row 
$checked_66a = (showData('i_485_general_eligibility_highest_degree')=='grades1_11')? "checked":"";
$checked_66b= (showData('i_485_general_eligibility_highest_degree')=='grades11_nodiploma')? "checked":"";
$checked_66c = (showData('i_485_general_eligibility_highest_degree')=='high_school_credential')? "checked":"";
$checked_66d= (showData('i_485_general_eligibility_highest_degree')=='no_degree')? "checked":"";
$checked_66e = (showData('i_485_general_eligibility_highest_degree')=='associate_degree')? "checked":"";
$checked_66f= (showData('i_485_general_eligibility_highest_degree')=='bachelor_degree')? "checked":"";
$checked_66g = (showData('i_485_general_eligibility_highest_degree')=='master_degree')? "checked":"";
$checked_66h= (showData('i_485_general_eligibility_highest_degree')=='professional_degree')? "checked":"";
$checked_66i = (showData('i_485_general_eligibility_highest_degree')=='doctorate_degree')? "checked":"";



$html= '<div><input type="checkbox" name="part8_66_1" value=" Grades 1" checked="'.$checked_66a.'" />  Grades 1 through 11</div>';
$pdf->writeHTMLCell(85, 7, 20,  47, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_66_2" value="12th grade - no diploma" checked="'.$checked_66b.'" />  12th grade - no diploma</div>';
$pdf->writeHTMLCell(85, 7, 55,  47, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_66_3" value="GED" checked="'.$checked_66c.'" />  High school diploma, GED, or alternative credential</div>';
$pdf->writeHTMLCell(85, 7, 95,  47, $html, 0, 0, false, true, 'L', false);

//..Second row 
$html= '<div><input type="checkbox" name="part8_66_4" value="1 more" checked="'.$checked_66d.'" />  1 or more years of college credit, no degree</div>';
$pdf->writeHTMLCell(85, 7, 20,  53, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_66_5" value="Associate degree" checked="'.$checked_66e.'" />  Associate\'s degree</div>';
$pdf->writeHTMLCell(85, 7, 95,  53, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_66_6" value="Bachelor" checked="'.$checked_66f.'" />  Bachelor\'s degree</div>';
$pdf->writeHTMLCell(85, 7, 130,  53, $html, 0, 0, false, true, 'L', false);
//third row 

$html= '<div><input type="checkbox" name="part8_66_7" value="Master" checked="'.$checked_66g.'" />  Master\'s degree</div>';
$pdf->writeHTMLCell(85, 7, 20,  59, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_66_8" value="Professional" checked="'.$checked_66h.'"  />  Professional degree (JD, MD, DMD, etc.)</div>';
$pdf->writeHTMLCell(85, 7, 55,  59, $html, 0, 0, false, true, 'L', false);

$html= '<div><input type="checkbox" name="part8_66_9" value="Doctorate degree" checked="'.$checked_66i.'" /> Doctorate degree</div>';
$pdf->writeHTMLCell(85, 7, 130,  59, $html, 0, 0, false, true, 'L', false);
//.........
$pdf->SetFont('times', '', 10);
$html= '<div><b>67. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 0, false, true, 'L', true);
$html= '<div> List your certifications, licenses, skills obtained through work experience, and educational certificates.</div>';
$pdf->writeHTMLCell(190, 7, 20, 67, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="42" rows="11" name="general_eligibility_inadmisibility67">
</textarea>
EOD; */
//$pdf->writeHTMLCell(180, 48, 20, 74, $html, 0, 0, false, 'L');

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('general_eligibility_inadmisibility67', 180, 50, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_general_eligibility_list_your_certification')), 20, 74);
$pdf->setCellHeightRatio( 1.2 );

//.........
$pdf->SetFont('times', '', 10);
$html= '<div><b>68.a. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 123, $html, 0, 0, false, true, 'L', true);
$html= '<div>Have you ever received Supplemental Security Income (SSI). Temporary Assistance for Needy Families (TANF), or State, Tribal, territorial, or local, cash benefit programs for income maintenance (often called "General Assistance" in the State context, but which also exist under other names)?</div>';
$pdf->writeHTMLCell(160, 7, 20, 123, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_68a_received_supplemental_security_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_68a_received_supplemental_security_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_68a" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_68a" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 175,  130, $html, 0, 0, false, true, 'L', false);

//.....
$html= '<div><b>68.b. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 0, false, true, 'L', true);
$html= '<div>Have you ever received long-term institutionalization at government expense?</div>';
$pdf->writeHTMLCell(160, 7, 20, 140, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_68b_longterm_institutionalization_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_68b_longterm_institutionalization_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_68b" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_68b" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 175,  140, $html, 0, 0, false, true, 'L', false);

//.....
$html= '<div><b>68.c. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 0, false, true, 'L', true);
$html= '<div>If your answer to Item Number 68.a. is "Yes." list the specific benefit(s) you received, the start and end dates of each period of receipt, and the dollar amount of benefits received.</div>';
$pdf->writeHTMLCell(160, 7, 20, 147, $html, 0, 0, false, true, 'L', true);
//..........


//................................start table  on page 14 .....part 8.....................

$pdf->writeHTMLCell(180, 35.6, 20, 157, "", 1, 1, false, true, 'C', true);


$pdf->SetFont('times', 'B', 10);
$html ='<div> Benefit Received</div>';
$pdf->writeHTMLCell(50, 5, 30, 157, $html, 0, 1, false, true, 'L', true);

$html ='<div> Start Date </div>';
$pdf->writeHTMLCell(50, 5, 85, 157, $html, 0, 1, false, true, 'L', true);

$html ='<div> End Date</div>';
$pdf->writeHTMLCell(50, 5, 125, 157, $html, 0, 1, false, true, 'L', true);

$html ='<div> Dollar Amount </div>';
$pdf->writeHTMLCell(50, 5, 162, 157, $html, 0, 1, false, true, 'L', true);


//.......
$pdf->writeHTMLCell(180, 1, 20, 158 , "", "B", 1, false, true, 'C', true); // horizontal line ..

$pdf->writeHTMLCell(180, 1, 20, 165 , "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(180, 1, 20, 172 , "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(180, 1, 20, 179 , "", "B", 1, false, true, 'C', true); // horizontal line ..
//.......
$pdf->writeHTMLCell(1, 35.6, 72, 157,  "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 35.6, 112, 157, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 35.6, 150, 157, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_table_benefit_received1', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 164);
$pdf->TextField('part8_table_benefit_received2', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 171);
$pdf->TextField('part8_table_benefit_received3', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 178);
$pdf->TextField('part8_table_benefit_received4', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 185.5);
//.........

$pdf->TextField('part8_table_startdate_68c_1', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 164);
$pdf->TextField('part8_table_startdate_68c_2', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 171);
$pdf->TextField('part8_table_startdate_68c_3', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 178);
$pdf->TextField('part8_table_startdate_68c_4', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 185.5);
//.........

$pdf->TextField('part8_table_end_date_68c_1', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 164);
$pdf->TextField('part8_table_end_date_68c_2', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 171);
$pdf->TextField('part8_table_end_date_68c_3', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 178);
$pdf->TextField('part8_table_end_date_68c_4', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 185.5);
//.........

$pdf->TextField('part8_table_dollaramount_68c_1', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 164);
$pdf->TextField('part8_table_dollaramount_68c_2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 171);
$pdf->TextField('part8_table_dollaramount_68c_3', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 178);
$pdf->TextField('part8_table_dollaramount_68c_4', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 185.5);
//.........


//.....
$pdf->SetFont('times', '', 10);
$html= '<div><b>68.d. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 195, $html, 0, 0, false, true, 'L', true);
$html= '<div>If your answer to Item Number 68.b. is "Yes," list the name, city, and state for each institution, the start and end dates of each period of institutionalization, and the reason you were institutionalized. </div>';
$pdf->writeHTMLCell(160, 7, 20, 195, $html, 0, 0, false, true, 'L', true);
//..........
$pdf->writeHTMLCell(180, 35.6, 20, 205, "", 1, 1, false, true, 'C', true);

$pdf->SetFont('times', 'B', 10);
$html ='<div> Institution Name/City/State </div>';
$pdf->writeHTMLCell(50, 5, 25, 205, $html, 0, 1, false, true, 'L', true);

$html ='<div> Date From </div>';
$pdf->writeHTMLCell(50, 5, 85, 205, $html, 0, 1, false, true, 'L', true);

$html ='<div> Date To </div>';
$pdf->writeHTMLCell(50, 5, 125, 205, $html, 0, 1, false, true, 'L', true);

$html ='<div> Reason </div>';
$pdf->writeHTMLCell(50, 5, 162, 205, $html, 0, 1, false, true, 'L', true);


//.......
$pdf->writeHTMLCell(180, 1, 20, 206 , "", "B", 1, false, true, 'C', true); // horizontal line ..

$pdf->writeHTMLCell(180, 1, 20, 213 , "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(180, 1, 20, 220 , "", "B", 1, false, true, 'C', true); // horizontal line ..
$pdf->writeHTMLCell(180, 1, 20, 227 , "", "B", 1, false, true, 'C', true); // horizontal line ..
//.......
$pdf->writeHTMLCell(1, 35.6, 72, 205,  "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 35.6, 112, 205, "", "R", 1, false, true, 'C', true); // verticle line ..
$pdf->writeHTMLCell(1, 35.6, 150, 205, "", "R", 1, false, true, 'C', true); // verticle line ..
//..........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_table_institution_68d_1', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 212);
$pdf->TextField('part8_table_institution_68d_2', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 219);
$pdf->TextField('part8_table_institution_68d_3', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 226);
$pdf->TextField('part8_table_institution_68d_4', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 233.5);
//.........

$pdf->TextField('part8_table_date_form_68d_1', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 212);
$pdf->TextField('part8_table_date_form_68d_2', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 219);
$pdf->TextField('part8_table_date_form_68d_3', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 226);
$pdf->TextField('part8_table_date_form_68d_4', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 233.5);
//.........

$pdf->TextField('part8_table_date_to_68d_1', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 212);
$pdf->TextField('part8_table_date_to_68d_2', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 219);
$pdf->TextField('part8_table_date_to_68d_3', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 226);
$pdf->TextField('part8_table_date_to_68d_4', 39, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 233.5);
//.........

$pdf->TextField('part8_table_reason_68d_1', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 212);
$pdf->TextField('part8_table_reason_68d_2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 219);
$pdf->TextField('part8_table_reason_68d_3', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 226);
$pdf->TextField('part8_table_reason_68d_4', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 233.5);
//.........

/********************************
******** End Page No 14 **********
*********************************/

/********************************
******** Start Page No 15 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 15
//............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//...........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> (continued) </div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Illegal Entries and Other Immigration Violations</b></div>';
$pdf->writeHTMLCell(92, 7, 13, 31, $html, 0, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>69.a. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 40, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER </b>failed or refused to attend or to remain in attendance at any removal proceeding filed against you on or after April 1, 1997?</div>';
$pdf->writeHTMLCell(85, 7, 20, 40, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_69a_failed_refused_attend_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_69a_failed_refused_attend_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_69" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_69" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 50, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>69.b. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 55, $html, 0, 0, false, true, 'J', true);
$html= '<div>If your answer to <b>Item Number 69.a.</b> is "Yes," do you believe you had reasonable cause? </div>';
$pdf->writeHTMLCell(85, 7, 20, 55, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_69b_reasonable_cause_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_69b_reasonable_cause_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_69b" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_69b" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 60, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>69.c. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 0, false, true, 'J', true);
$html= '<div>If your answer to <b>Item Number 69.b.</b> is "Yes," attach a written statement explaining why you had reasonable cause.</div>';
$pdf->writeHTMLCell(85, 7, 20, 65, $html, 0, 0, false, true, 'J', true);


//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>70. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> submitted fraudulent or counterfeit documentation to any U.S. Government official to obtain or attempt to obtain any immigration benefit, including a visa or entry into the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 80, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_70_submitted_fraudulent_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_70_submitted_fraudulent_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_70" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_70" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 95, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>71. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 100, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> lied about, concealed, or misrepresented any information on an application or petition to obtain a visa, other documentation required for entry into the United States, admission to the United States, or any other kind of immigration benefit?</div>';
$pdf->writeHTMLCell(85, 7, 20, 100, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_71_concealed_misrepresented_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_71_concealed_misrepresented_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_71" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_71" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 120, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>72. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 125, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> falsely claimed to be a U.S. citizen (in writing or any other way)?</div>';
$pdf->writeHTMLCell(85, 7, 20, 125, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_72_falsely_claimed_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_72_falsely_claimed_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_72" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_72" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 130, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>73. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 135, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been a stowaway on a vessel or aircraft arriving in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 135, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_73_stowaway_vessel_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_73_stowaway_vessel_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_73" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_73" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 140, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>74. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 145, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> knowingly encouraged, induced,
assisted, abetted, or aided any foreign national to enter or
to try to enter the United States illegally (alien
smuggling)?</div>';
$pdf->writeHTMLCell(85, 7, 20, 145, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_74_knowingly_encouraged_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_74_knowingly_encouraged_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_74" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_74" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 160, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>75. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 165, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you under a final order of civil penalty for violating
INA section 274C for use of fraudulent documents?</div>';
$pdf->writeHTMLCell(85, 7, 20, 165, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_75_under_final_order_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_75_under_final_order_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_75" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_75" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 175, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Removal, Unlawful Presence, or Illegal Reentry
After Previous Immigration Violations</b></div>';
$pdf->writeHTMLCell(92, 7, 13, 187, $html, 0, 0, true, true, 'L', true);
//.......


$pdf->SetFont('times', '', 10);
$html= '<div><b>76. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been excluded, deported, or removed
from the United States or have you ever departed the
United States on your own after having been ordered
excluded, deported, or removed from the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 200, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_76_excluded_deported_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_76_excluded_deported_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_76" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_76" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 220, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>77. <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 225, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> entered the United States without being
inspected and admitted or paroled? </div>';
$pdf->writeHTMLCell(85, 7, 20, 225, $html, 0, 0, false, true, 'J', true);
$checked_yes = (showData('i_485_77_without_being_inspected_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_77_without_being_inspected_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_77" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_77" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 235, $html, 0, 0, false, true, 'J', false);

//.......... left side end 

$html= '<div>Since April 1, 1997, have you been unlawfully present in the United States:</div>';
$pdf->writeHTMLCell(90, 7, 112, 15, $html, 0, 0, false, true, 'L', true);
//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>78.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 0, false, true, 'L', true);
$html= '<div>For more than 180 days but less than a year, and then
departed the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 25, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_78a_departed_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_78a_departed_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_78a" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_78a" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 32, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>78.b.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 38, $html, 0, 0, false, true, 'L', true);
$html= '<div>For one year or more and then departed the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 38, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_78b_more_then_departed_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_78b_more_then_departed_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_78b" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_78b" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 45, $html, 0, 0, false, true, 'L', false);

//......

$html= '<div><b>NOTE:</b> You were unlawfully present in the United States if you entered the United States without being inspected and admitted or inspected and paroled, or if you legally entered the United States but you stayed longer than permitted.<br>

<br>
Since April 1, 1997, have you <b>EVER</b> reentered or attempted to reenter the United States without being inspected and admitted or paroled after:</div>';
$pdf->writeHTMLCell(90, 7, 112, 50, $html, 0, 0, false, true, 'L', true);
//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>79.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 95, $html, 0, 0, false, true, 'L', true);
$html= '<div>Having been unlawfully present in the United States for more than one year in the aggregate?</div>';
$pdf->writeHTMLCell(85, 7, 120, 95, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_79a_unlawfully_present_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_79a_unlawfully_present_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_79a" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_79a" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 100, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>79.b.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 105, $html, 0, 0, false, true, 'L', true);
$html= '<div>Having been deported, excluded, or removed from the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 105, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_79b_been_deported_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_79b_been_deported_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_79b" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_79b" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 110, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Miscellaneous Conduct</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 120, $html, 0, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>80.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 128, $html, 0, 0, false, true, 'L', true);
$html= '<div>Do you plan to practice polygamy in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 128, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_80_practice_polygamy_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_80_practice_polygamy_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_80" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_80" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 133, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>81.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 137, $html, 0, 0, false, true, 'L', true);
$html= '<div>Are you accompanying another foreign national who requires your protection or guardianship but who is inadmissible after being certified by a medical officer as being helpless from sickness, physical or mental disability, or infancy, as described in INA section 232(c)?</div>';
$pdf->writeHTMLCell(85, 7, 120, 137, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_81_accompanying_another_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_81_accompanying_another_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_81" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_81" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 160, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>82.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 165, $html, 0, 0, false, true, 'L', true);
$html= '<div>Have you <b>EVER</b> assisted in detaining, retaining, or
withholding custody of a U.S. citizen child outside the
United States from a U.S. citizen who has been granted
custody of the child?</div>';
$pdf->writeHTMLCell(85, 7, 120, 165, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_82_assisted_detaining_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_82_assisted_detaining_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_82" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_82" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 180, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>83.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 185, $html, 0, 0, false, true, 'L', true);
$html= '<div>Have you <b>EVER</b> voted in violation of any Federal, state,
or local constitutional provision, statute, ordinance, or
regulation in the United States?</div>';
$pdf->writeHTMLCell(80, 7, 120, 185, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_83_violation_federal_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_83_violation_federal_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_83" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_83" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 200, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>84.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 205, $html, 0, 0, false, true, 'L', true);
$html= '<div>Have you <b>EVER</b> renounced U.S. citizenship to avoid
being taxed by the United States?</div>';
$pdf->writeHTMLCell(80, 7, 120, 205, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_84_renounced_citizenship_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_84_renounced_citizenship_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_84" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_84" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 212, $html, 0, 0, false, true, 'L', false);

//......
$pdf->SetFont('times', '', 10);
$html= '<div>Have you <b>EVER:<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 218, $html, 0, 0, false, true, 'L', true);



$pdf->SetFont('times', '', 10);
$html= '<div><b>85.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, 0, 0, false, true, 'L', true);
$html= '<div>Applied for exemption or discharge from training or
service in the U.S. armed forces or in the U.S. National
Security Training Corps on the ground that you are a
foreign national?</div>';
$pdf->writeHTMLCell(80, 7, 120, 225, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_85a_exemption_discharge_status')=='Y')? "checked":"";
$checked_no = (showData('i_485_85a_exemption_discharge_status')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_85" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_85" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 180, 240, $html, 0, 0, false, true, 'L', false);

//......
/********************************
******** End Page No 15 **********
*********************************/

/********************************
******** Start Page No 16 ********
*********************************/
// add a page
$pdf->AddPage('P', 'LETTER');  // page number 16

//....
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//...........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> (continued) </div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>85.b.<b/></div>';
$pdf->writeHTMLCell(80, 7, 12, 30, $html, 0, 0, false, true, 'L', true);
$html= '<div>Been relieved or discharged from such training or service on the ground that you are a foreign national?</div>';
$pdf->writeHTMLCell(85, 7, 20, 30, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_relieved_from_foreign_national_training')=='Y')? "checked":"";
$checked_no = (showData('i_485_relieved_from_foreign_national_training')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_85b" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_85b" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 80, 40, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>85.c.<b/></div>';
$pdf->writeHTMLCell(80, 7, 12, 45, $html, 0, 0, false, true, 'L', true);
$html='<div>Been convicted of desertion from the U.S. armed forces?</div>';
$pdf->writeHTMLCell(85, 7, 20, 45, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_convicted_desertion_us_armed_forces')=='Y')? "checked":"";
$checked_no = (showData('i_485_convicted_desertion_us_armed_forces')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_85c" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_85c" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 80, 52, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>86.a.<b/></div>';
$pdf->writeHTMLCell(80, 7, 12, 57, $html, 0, 0, false, true, 'L', true);
$html='<div>Have you <b>EVER</b> left or remained outside the United States to avoid or evade training or service in the U.S. armed forces in time of war or a period declared by the President to be a national emergency?</div>';
$pdf->writeHTMLCell(84, 7, 20, 57, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_remained_outside_united_states_during_war')=='Y')? "checked":"";
$checked_no = (showData('i_485_remained_outside_united_states_during_war')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part8_86a" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part8_86a" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(80, 7, 80, 72, $html, 0, 0, false, true, 'L', false);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>86.b.<b/></div>';
$pdf->writeHTMLCell(80, 7, 12, 77, $html, 0, 0, false, true, 'L', true);
$html='<div>If your answer to <b>Item Number 86.a. is "Yes,"</b> what was your nationality or immigration status immediately before you left (for example, U.S. citizen or national, lawful permanent resident, nonimmigrant, parolee, present without admission or parole, or any other status)?</div>';
$pdf->writeHTMLCell(84, 7, 20, 77, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(85, 7, 20, 100, ''.showData('i_485_remained_outside_united_states_during_war_nationality').'', 1, 0, false, true, 'L', false);

//......

//............
$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 9. Accommodations for Individuals With
Disabilities and/or Impairments</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 117, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> Read the information in the Form I-485 Instructions
before completing this part.</div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html, 0, 0, false, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 0, false, true, 'L', true);
$html= '<div>Are you requesting an accommodation because of your
disabilities and or impairments?</div>';
$pdf->writeHTMLCell(84, 7, 20,140, $html, 0, 0, false, true, 'L', true);
$checked_yes = (showData('i_485_requesting_accommodation_for_disabilities')=='Y')? "checked":"";
$checked_no = (showData('i_485_requesting_accommodation_for_disabilities')=='N')? "checked":"";
$html= '<div> <input type="checkbox" name="part9_1" value="Y" checked="'.$checked_yes.'" />  Yes   <input type="checkbox" name="part9_1" value="N" checked="'.$checked_no.'" />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  146, $html, 0, 0, false, true, 'J', false);
//.....

$html= '<div>If you answered "Yes" to <b>Item Number 1.</b>, select any
applicable box in <b>Item Numbers 2.a. - 2.c.</b> and provide
an answer.</div>';
$pdf->writeHTMLCell(84, 7, 20, 152, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_deaf_hard_of_hearing_req_for_accommodation')=='Y')? "checked":"";
$html= '<div><b>2.a.   <b/><input type="checkbox" name="part9_2a" value="Y" checked="'.$checked.'" /></div>';

$pdf->writeHTMLCell(90, 7, 12, 167, $html, 0, 0, false, true, 'L', true);
$html= '<div>I am deaf or hard of hearing and request the
following accommodation. (If you are requesting a
sign-language interpreter, indicate for which
language (for example, American Sign Language).):</div>';
$pdf->writeHTMLCell(80, 7, 25, 167, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="18" rows="4" name="part_9_2a_accomodation_for_individuals">
showData('i_485_remained_outside_united_states_during_war_nationality')
</textarea>
EOD;
$pdf->writeHTMLCell(80, 15, 25, 185, $html, 0, 0, false, true, 'L', true);
 */

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('part_9_2a_accomodation_for_individuals', 80, 15, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_deaf_hard_of_hearing_language_sign')), 25, 185);
$pdf->setCellHeightRatio( 1.2 );

//.......

$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_blind_low_vision_req_for_accommodation')=='Y')? "checked":"";
$html= '<div><b>2.b.   <b/><input type="checkbox" name="part9_2b" value="Y" checked="'.$checked.'" /></div>';

$pdf->writeHTMLCell(90, 7, 12, 205, $html, 0, 0, false, true, 'L', true);
$html= '<div>I am blind or have low vision and request the
following accommodation:</div>';
$pdf->writeHTMLCell(78, 7, 25, 205, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
/* $html = <<<EOD
<textarea cols="18" rows="4" name="part_9_2b_accomodation_for_individuals">

</textarea>
EOD;
$pdf->writeHTMLCell(80, 15, 25, 215, $html, 0, 0, false, true, 'L', true); */

$pdf->setCellHeightRatio(2.2);
$pdf->TextField('part_9_2b_accomodation_for_individuals', 80, 15, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_blind_low_vision_desc')), 25, 215);
$pdf->setCellHeightRatio(1.2);

//..........


$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_another_type_of_disability')=='Y')? "checked":"";
$html= '<div><b>2.c.   <b/><input type="checkbox" name="part9_2c" value="Y" checked="'.$checked.'" /></div>';

$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 0, false, true, 'L', true);
$html= '<div>I have another type of disability and/or impairment.
Describe the nature of your disability and/or
impairment and the accommodation you are
requesting.)</div>';
$pdf->writeHTMLCell(80, 7, 125, 16, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="18" rows="4" name="part_9_2c_accomodation_for_individuals">

</textarea>
EOD;
$pdf->writeHTMLCell(80, 15, 125, 35, $html, 0, 0, false, true, 'L', true); */

$pdf->setCellHeightRatio(2.2);
$pdf->TextField('part_9_2c_accomodation_for_individuals', 80, 15, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_another_type_of_disability_desc')), 125, 35);
$pdf->setCellHeightRatio(1.2);

//.......
$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 10. Applicant\'s Statement, Contact Information, Declaration, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 57, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-485
Instructions before completing this part. You must file Form
I-485 while in the United States.</div>';
$pdf->writeHTMLCell(90, 7, 112, 75, $html, 0, 0, false, true, 'L', true);

//.......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Applicant\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 90, $html, 0, 0, true, true, 'L', true);
//......
$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 100, $html, 0, 0, false, true, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_applicant_statement_1a_status')=='Y')? "checked":"";
$html= '<div><b>1.a. <b/><input type="checkbox" name="part10_1a" value="Y" checked="'.$checked.'" /></div>';

$pdf->writeHTMLCell(90, 7, 112, 110, $html, 0, 0, false, true, 'L', true);
$html= '<div>I can read and understand English, and I have read
and understand every question and instruction on this
application and my answer to every question.</div>';
$pdf->writeHTMLCell(79, 7, 124, 110, $html, 0, 0, false, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_applicant_statement_1b_status')=='Y')? "checked":"";
$html= '<div><b>1.b.   <b/><input type="checkbox" name="part10_1b" value="Y" checked="'.$checked.'" /></div>';

$pdf->writeHTMLCell(90, 7, 112, 126, $html, 0, 0, false, true, 'J', true);
$html= '<div>The interpreter named in <b>Part 11.</b> read to me every
question and instruction on this application and my
answer to every question in</div>';
$pdf->writeHTMLCell(79, 7, 124, 126, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(79, 7, 124, 140, ''.showData('i_485_applicant_statement_1b_language').'', 1, 0, false, true, 'L', true);
$html= '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell(79, 7, 124, 146, $html, 0, 0, false, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_applicant_statement_2_status')=='Y')? "checked":"";
$html= '<div><b>2.   <b/><input type="checkbox" name="part10_2" value="Y" checked="'.$checked.'" /></div>';

$pdf->writeHTMLCell(90, 7, 112, 156, $html, 0, 0, false, true, 'J', true);
$html= '<div>At my request, the preparer named in <b>Part 12.</b>,</div>';
$pdf->writeHTMLCell(79, 7, 124, 156, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(78, 7, 125, 162, ''.showData('i_485_applicant_statement_2_preparer').'', 1, 0, false, true, 'J', true);
$html= '<div>prepared this application for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell(79, 7, 124, 168, $html, 0, 0, false, true, 'L', true);

//.........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Applicant\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 182, $html, 0, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(79, 7, 120, 190, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_telephone', 82, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 196);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>4.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 206, $html, 0, 0, false, true, 'L', true);
$html= '<div>Applicant\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(79, 7, 120, 206, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_mobile', 82, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 213);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 223, $html, 0, 0, false, true, 'L', true);
$html= '<div>Applicant\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(79, 7, 120, 223, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_email', 82, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 230);

//.........

/********************************
******** End Page No 16 **********
*********************************/

/********************************
******** Start Page No 17 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 17
//..........

//....
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//...........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 10. Applicant\'s Statement, Contact 
Information, Declaration, Certification, and 
Signature  </b>(continued) </div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b> Applicant\'s Declaration and Certification</b></div>';
$pdf->writeHTMLCell(92, 7, 13, 37, $html, 0, 0, true, true, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html= '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any and all of my records that USCIS may need to determine my eligibility for the immigration benefit that I seek.</div>';
$pdf->writeHTMLCell(93, 7, 12, 45, $html, 0, 0, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html= '<div>I understand that if I am a male who is 18 to 26 years of age, submitting this application will automatically register me with the Selective Service System as required by the Military Selective Service Act.</div>';
$pdf->writeHTMLCell(93, 7, 12, 72, $html, 0, 0, false, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html= '<div>I furthermore authorize release of information contained in this application, in supporting documents, and in my USCIS records, to other entities and persons where necessary for the administration and enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(92, 7, 12, 90, $html, 0, 0, false, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html= '<div>I understand that USCIS may require me to appear for an appointment to take my biometrics (fingerprints, photograph, and/or signature) and, at that time, if I am required to provide biometrics, I will be required to sign an oath reaffirming that:</div>';
$pdf->writeHTMLCell(92, 7, 12, 109, $html, 0, 0, false, true, 'L', true);
//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1)<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 128, $html, 0, 0, false, true, 'L', true);
$html= '<div>I reviewed and understood all of the information contained in, and submitted with, my application; and</div>';
$pdf->writeHTMLCell(80, 7, 20, 128, $html, 0, 0, false, true, 'L', true);
//.......


$pdf->SetFont('times', '', 10);
$html= '<div><b>2)<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 138, $html, 0, 0, false, true, 'L', true);
$html= '<div>All of this information was complete, true, and correct at the time of filing.</div>';
$pdf->writeHTMLCell(80, 7, 20, 138, $html, 0, 0, false, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div>I certify, under penalty of perjury, that all of the information in my application and any document submitted with it were provided or authorized by me, that I reviewed and understand all of the information contained in, and submitted with, my application and that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(92, 7, 12, 150, $html, 0, 0, false, true, 'L', true);
//........
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b> Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 180, $html, 0, 0, true, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html= '<div><b>6.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 13, 190, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(79, 7, 20, 190, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(80, 7, 23, 197, '', 1, 0, false, true, 'J', true);
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 13, 195, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>6.b.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 0, false, true, 'J', true);
$html= '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(79, 7, 20, 207, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_date_of_signature', 34, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  69, 207);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill
out this application or fail to submit required documents listed
in the Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(92, 7, 12, 215, $html, 0, 0, false, true, 'J', true);

//...... right side ended ...

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 11. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 17, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(92, 7, 112, 30, $html, 0, 0, false, true, 'J', true);

//.....

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 37, $html, 0, 0, true, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 45, $html, 0, 0, false, true, 'J', true);
$html= '<div>Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(79, 7, 120, 45, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_last_name', 83.5, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 51);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.b.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 0, false, true, 'J', true);
$html= '<div> Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(79, 7, 120, 60, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_first_name', 83.5, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 66);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 75, $html, 0, 0, false, true, 'J', true);
$html= '<div>Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(79, 7, 120, 75, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_organization_name', 83.5, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 81);

//........ 

//.......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 90, $html, 0, 0, true, true, 'L', true);


//...........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 98, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_addres_street', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 100);

//...........
$pdf->SetFont('times', '', 10);
$mailing_apt = (showData('i_485_interpreter_mailing_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('i_485_interpreter_mailing_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('i_485_interpreter_mailing_address_apt_ste_flr')=='flr')? "checked":"";
$html= '<div><b>3.b.  </b>  <input type="checkbox" name="apt8" value="apt" checked="'.$mailing_apt.'" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste8" value="ste" checked="'.$mailing_ste.'" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr8" value="flr" checked="'.$mailing_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 109, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_addres_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 109);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 118);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 112, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="interpreter_mailing_addres_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_zipcode', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 127);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 136, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_province', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 136);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 145, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_postalcode', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 145);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 152, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 158);

//......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 113, 168,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Interpreter\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 113, 175, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_daytime_telephone', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 181);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Interpreter\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 113, 188, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_mobile_telephone', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 194);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Interpreter\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 113, 202, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_email', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 208);

//.......

/********************************
******** End Page No 17 **********
*********************************/

/********************************
******** Start Page No 18 ********
*********************************/

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 18
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//...........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 11. Interpreter\'s Contact Information,
Certification, and Signature</b>(continued)</div>';
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(91, 7, 13, 32,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html = '<div>I certify, under penalty of perjury, that:<br><br>
I am fluent in English and<br>
which is the same language specified in <b>Part 10., Item
Number 1.b.</b>, and I have read to this applicant in the identified
language every question and instruction on this application and
his or her answer to every question. The applicant informed me
that he or she understands every instruction, question, and
answer on the application, including the <b>Applicant\'s Declaration and
Certification</b>, and has verified the accuracy of every answer.</div>';
$pdf->writeHTMLCell(92, 7, 12, 39, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certification', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 46);

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 13, 90,  $html,  0, 1, true, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Interpreter\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 97, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81.5, 7, 22, 103, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 112, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73.5, 112);

//.......

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 12. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(92, 7, 13, 123, $html, 1, 0, true, true, 'L', true);
//......
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(91, 7, 12, 141, $html, 0, 1, false, 'L');

//.......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparers\'s Full Name</div>';
$pdf->writeHTMLCell(91, 7, 13, 150,  $html,  0, 1, true, 'L');

//..........



$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp; Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 157, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 163);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp; Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 170, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_given_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 176);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 183, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 189);

                                                        //.......  right side end ...



//.......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Preparer\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 24, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_addres_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 149, 26);

//..........
$pdf->SetFont('times', '', 10);

$mailing_apt = (showData('i_485_preparer_mailing_address_apt_ste_flr')=='apt')? "checked":"";
$mailing_ste = (showData('i_485_preparer_mailing_address_apt_ste_flr')=='ste')? "checked":"";
$mailing_flr = (showData('i_485_preparer_mailing_address_apt_ste_flr')=='flr')? "checked":"";

$html= '<div><b>3.b.  </b>  <input type="checkbox" name="apt8" value="apt" checked="'.$mailing_apt.'" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste8" value="ste" checked="'.$mailing_ste.'" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr8" value="flr" checked="'.$mailing_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 35, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_addres_apt_ste_flr', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 35);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 44, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 44);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 112, 53, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_addres_state" size="0.25">';
 foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
  }
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 53, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_zipcode', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 53);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 62, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 62);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 71, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_postalcode', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 71);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 78, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 84);

//..........

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(90.5, 7, 113, 95,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Preparers\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 112, 102, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 108);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Preparers\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 115, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 121);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Preparers\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 128, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 134);
//..........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(90.5, 7, 113, 145,  $html,  0, 1, true, 'L');

$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_preparer_statement_7a')=='Y')? "checked":"";

$html= '<div><b>7.a.   <b/><input type="checkbox" name="part12_7a" value="Y" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 112, 153, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am not an attorney or accredited representative<br> but
have prepared this application on behalf of <br>the
applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(79, 7, 124, 153, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$checked = (showData('i_485_preparer_statement_7b')=='Y')? "checked":"";
$html= '<div><b>7.b.   <b/><input type="checkbox" name="part12_7b" value="Y" checked="'.$checked.'" /></div>';
$pdf->writeHTMLCell(90, 7, 112, 169, $html, 0, 0, false, true, 'J', true);

$checked_extends = (showData('i_485_preparer_statement_7b_extend')=='Y')? "checked":"";
$checked_not_extends = (showData('i_485_preparer_statement_7b_not_extend')=='Y')? "checked":"";
$html= '<div>I am an attorney or accredited representative and<br> my
representation of the applicant in this case<br><input type="checkbox" name="a" value="Y" checked="'.$checked_extends.'" />  extends <input type="checkbox" name="b" value="Y" checked="'.$checked_not_extends.'" /> does not extend beyond the<br>
preparation of this application.</div>';
$pdf->writeHTMLCell(79, 7, 124, 169, $html, 0, 0, false, true, 'J', true);
//.........

$html= '<div><b>NOTE:</b> If you are an attorney or accredited
<br>representative, you may be obliged to submit a
<br>completed Form G-28, Notice of Entry of
<br>Appearance as Attorney or Accredited
<br>Representative, with this application.</div>';
$pdf->writeHTMLCell(90, 7, 124, 189, $html, 0, 0, false, true, 'J', true);

//.......

/********************************
******** End Page No 18 **********
*********************************/

/********************************
******** Start Page No 19 ********
*********************************/

$pdf->AddPage('P', 'LETTER'); //page number 19

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 125, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();
//...........
$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 12. Contact Information, Declaration, and Signature of the Person Preparing this
Application, if Other Than the Applicant</b>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, true, 'L', true);
//......

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(90.5, 7, 13, 45,  $html,  0, 1, true, 'L');

//.....

$pdf->setFont('Times', '', 10);
$html= '<div>By my signature, I certify, under penalty of perjury, that I prepared this application at the request of the applicant. The applicant then reviewed this completed application and informed me that he or she understands all of the information contained in, and submitted with, his or her application, including the <b>Applicant\'s Declaration and Certification,</b> and that all of this information is complete, true, and correct. I completed this application based only on information that the applicant provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(90, 7, 12, 53, $html, 0, 0, false, true, 'L', true);
//.......


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 13, 97,  $html,  0, 1, true, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.a. </b> &nbsp; Preparer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 104, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81.5, 7, 22, 110, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 119, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('Preparer_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73.5, 119);

//.......

$pdf->setFont('Times', 'B', 10);
$html= '<div>NOTE: Do not complete Part 13. until the USCIS Officer instructs you to do so at the interview.</div>';
$pdf->writeHTMLCell(92, 7, 12, 133, $html, 1, 1, false, 'L');


//.....left end ...

$pdf->setFont('Times', 'B', 12);
$html= '<div>Part 13. Signature at Interview</div>';
$pdf->writeHTMLCell(91, 7, 113, 17,  $html,  1, 1, true,true, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div>I swear (affirm) and certify under penalty of perjury under the laws of the United States of America that I know that the contents of this Form I-485, Application to Register Permanent Residence or Adjust Status, subscribed by me, including the corrections made to this application, <b>numbered</b></div>';
$pdf->writeHTMLCell(91, 7, 112, 26, $html, 0, 0, false, true, 'L', true);
//.......
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part13_numbered', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 44);
//......

$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(2);
$html= '<div><b>through</b>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
, are complete, true, and correct. All
additional pages submitted by me with this Form I-485, <b>on
numbered pages  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
through</b>   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
are complete,</div>';
$pdf->writeHTMLCell(91, 7, 112, 48, $html, 0, 0, false, true, 'L', true);
//....

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part13_through', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 126, 50);
$pdf->TextField('part13_numbered_pages', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 139, 64);
$pdf->TextField('part13_through2', 12, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 166, 64);
//......


$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html= '<div>true, and correct. All documents submitted at this interview were provided by me and are complete, true, and correct. Subscribed to and sworn to (affirmed) before me</div>';
$pdf->writeHTMLCell(91, 7, 112, 70, $html, 0, 0, false, true, 'L', true);

//.......
$pdf->setFont('Times', '', 10);
$html= '<div>USCIS Officer\'s Printed Name or Stamp</div>';
$pdf->writeHTMLCell(92, 7, 112, 87, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 112, 93, '', 1, 0, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 102, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_page_19_p13_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172, 102);
// $pdf->writeHTMLCell(30, 7, 172, 102, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div>Applicant\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 112, 112, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 112, 118, '', 1, 0, false, 'L');

//.......

$html= '<div>USCIS Officer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 112, 128, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 112, 134, '', 1, 0, false, 'L');


/********************************
******** End Page No 19 **********
*********************************/

/********************************
******** Start Page No 20 ********
*********************************/

//...........

$pdf->AddPage('P', 'LETTER'); //page number 20


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);

$pdf->writeHTMLCell(51, 7, 153, 3, ''.showData('i_485_a_number').'', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10.5, 138, false);// header angle
$pdf->StopTransform();





$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 14. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 18, $html, 1, 1, true, 'L');
//........
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>If you need extra space to provide any additional information
within this form, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this form or attach a separate sheet of
paper. Type or print your name and A-Number (if any) at the
top of each sheet; indicate the<b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
$pdf->writeHTMLCell(95, 25, 12, 26, $html, 0, 1, 0, true, 'L', false, false);
//...........
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 61, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_additional_info_1a', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 63);

// $pdf->writeHTMLCell(60, 7, 45, 63, '', 1, 0, false, 'L');
//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 71, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_additional_info_1b', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 73);
// $pdf->writeHTMLCell(60, 7, 45, 73, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 81, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_additional_info_1c', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 82);
// $pdf->writeHTMLCell(60, 7, 45, 82, '', 1, 0, false, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 91, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
// $pdf->TextField('i_485_additional_info_2_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 91);
$pdf->writeHTMLCell(45, 7, 60, 91, ''.showData('i_485_additional_info_a_number').'', 1, 0, false, 'L');
$pdf->StartTransform();
$pdf->Rotate(-31);
$pdf->SetFont('zapfdingbats', '', 10);  // symbol font
$pdf->writeHTMLCell(40, 7, 58, 119, TCPDF_FONTS::unichr(116), 0, 0, false, 'L');
$pdf->StopTransform();
$pdf->setFont('Times', '', 12);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(7, 7, 54, 91, $html, 0, 0, false, 'L');
//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_additional_info_3a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 107.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_additional_info_3b_part_no', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 107.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_485_additional_info_3c_item_no', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 107.5);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 116, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="20" rows="14" name="i_485_additional_info_3d">
</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 20, 116, $html, 0, 0, false, 'L');
 */

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('i_485_additional_info_3d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_additional_info_3d')), 20, 116);
$pdf->setCellHeightRatio( 1.2 );

//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 188);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 188);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 182, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 188);
//.........


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 197, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 20, 197, $html, 0, 0, false, 'L'); */

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('additional_information_4d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_additional_info_4d')), 20, 197);
$pdf->setCellHeightRatio( 1.2 );


                                            //.......page 20. left end 
// ....... start right side 


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 23);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>5.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 23);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 23);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 33, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 32, $html, 0, 0, false, 'L');
 */

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('additional_information_5d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_additional_info_5d')), 119, 32);
$pdf->setCellHeightRatio( 1.2 );

//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 104);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 104);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 104);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 114, $html, 0, 0, false, 'L');
 */

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('additional_information_6d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_additional_info_6d')), 119, 114);
$pdf->setCellHeightRatio( 1.2 );

//..........


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 186.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 186.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 186.5);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 198, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

/* $html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 119, 198, $html, 0, 0, false, 'L');
 */

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('additional_information_7d', 85, 60, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_485_additional_info_7d')), 119, 198);
$pdf->setCellHeightRatio( 1.2 );


$js = "
var fields = {
    
    

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