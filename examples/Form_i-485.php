<?php
require_once("config.php");

$allDataCountry = indexByQueryAllData("SELECT * FROM countries");

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
		
		$this->Cell(40, 6, "Form I-485 Edition 10/15/19", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/I-485-footer-pdf417-$this->page.png";
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
$pdf->Image($logo, 12, 9, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

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
$pdf->MultiCell(40, 5, "OMB No. 1615-0023\nExpires 10/31/2020", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->SetFont('times', '', 10); 
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 1, 0, 0); 
$html ='<div><b>To be completed by an attorney or accredited representative </b> (if any).</div>';
$pdf->writeHTMLCell(190, 7, 13, 96, $html, 1, 1, true, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 10);
$html ='<div> <input type="checkbox" name="agree" value="1" checked=" " />  Select this box if Form G-28 is <br> attached.</div>';
$pdf->writeHTMLCell(37, 20, 13, 103, $html, 'LRB', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html ='<div><b> Volag Number </b> <br>  (if any)</div>';
$pdf->writeHTMLCell(37, 20, 50, 103, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('volga_number', 33, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),52, 114);
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
$pdf->TextField('attorney_uscis_online_number', 65, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),135, 114);

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
$pdf->TextField('a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 124);

//..........

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.1);
$html ='<div><b>NOTE TO ALL APPLICANTS: </b>If you do not completely fill out this application or fail to submit required documents listed in the nstructions, U.S. Citizenship and Immigration Services (USCIS) may deny your application.</div>';
$pdf->writeHTMLCell(190, 7, 13, 130, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b>(individual
applying for lawful permanent residence)</div>';
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
$pdf->TextField('your_current_legal_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 167);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 174, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_current_legal_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 175.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 183, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('your_current_legal_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 184);

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
$pdf->TextField('other_name_you_have2_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 226);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 232.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have2_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 234.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 243, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have2_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 243);

//.......... left side end 


$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 138, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have3_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 140);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 147, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have3_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 149);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 158, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have3_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 158);

//..........

$pdf->writeHTMLCell(91, 2, 112, 167, '', 'T', 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 168, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have4_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 170);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 177, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have4_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 179);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 188, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_name_you_have4_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 188);
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
$pdf->TextField('other_information_you_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 206);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: </b>In addition to providing your actual date of birth,
include any other dates of birth you have used in
connection with any legal names or non-legal names in
he space provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 214, $html, 0, 1, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.    </b>       Gender     <input type="checkbox" name="gender" value="M"  />  Male  &nbsp;  <input type="checkbox" name="gender" value="F"  />  Female</div>';
$pdf->writeHTMLCell(80, 10, 112, 232, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.   </b>  City or Town of Birth</div>';
$pdf->writeHTMLCell(80, 10, 112, 240, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('other_information_city_town_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 245);
//......end page 1 

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
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);



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
$pdf->TextField('information_about_you_country_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 34.5);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b>  Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 12, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_citizen_nationality', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 47.5);


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

$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 64, 72, false); // angle 3 
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 46, 59, $html, 0, 1, false, false, 'J', true);
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_alien_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 59.5);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE: </b>If you have <b>EVER</b> used other A-Numbers,
include the additional A-Numbers in the space provided
in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(80, 7, 12, 67, $html, 0, 1, false, false, 'J', true);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 81, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 86);

//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b>  &nbsp;  U.S. Social Security Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 94, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_social_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 99.5);

//............

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>U.S. Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 109, $html, 0, 1, true, false, 'J', true);
$pdf->SetFont('times', 'I', 8);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><i>(USPS ZIP Code Lookup)</i></a></div>';
$pdf->writeHTMLCell(90, 7, 13, 162, $html, 0, 1, false, false, 'R', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>13.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_in_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 122);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>13.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 129, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 130.5);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 139, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 139);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 148, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 147.5);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>13.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 156, $html, '', 0, 0, true, 'L');

$html = '<select name="information_about_you_us_mail_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 156, $html, '', 0, 0, true, 'L');
$html= '<div><b>13.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 156, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 156);
//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Alternate and/or Safe Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 167, $html, 0, 1, true, false, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html ='<div>If you are applying based on the Violence Against Women Act
(VAWA) or as a special immigrant juvenile, human trafficking
victim (T nonimmigrant), or victim of qualifying criminal
activity (U nonimmigrant) and you do not want USCIS to send
notices about this application to your home, you may provide an
alternative and/or safe mailing address.</div>';
$pdf->writeHTMLCell(90, 7, 13, 175, $html, 0, 1, false, true, 'J', true);


//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('alternate_mailing_care_of_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 205);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>14.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 212, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('alternate_mailing_street_number_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 214);

//...........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>14.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 223, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('alternate_mailing_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 223);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>14.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 232, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('alternate_mailing_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 232);

//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>14.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 241, $html, '', 0, 0, true, 'L');

$html = '<select name="alternate_mailing_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 241, $html, '', 0, 0, true, 'L');
$html= '<div><b>14.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 241, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('alternate_mailing_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 241);
//.........page 2 left side end 

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Recent Immigration History</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 1, true, false, 'J', true);

//....

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the information for <b>Item Numbers 15. - 19.</b> if you last
entered the United States using a passport or travel document.</div>';
$pdf->writeHTMLCell(92, 7, 112, 25, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.       </b>        Passport Number Used at Last Arrival</div>';
$pdf->writeHTMLCell(90, 7, 112, 35, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_pasport_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 40);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.       </b>        Travel Document Number Used at Last Arrival</div>';
$pdf->writeHTMLCell(90, 7, 112, 47.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_travel_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 52);

//.........
 

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.     </b>      Expiration Date of this Passport or Travel Document<br>  &nbsp;  &nbsp;  &nbsp; 
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_pasport_expire_date', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 160, 65);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.       </b>        Country that Issued this Passport or Travel Document</div>';
$pdf->writeHTMLCell(90, 7, 112, 72, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_country_issue_pasport', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 77);

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>19.       </b>        Nonimmigrant Visa Number from this Passport (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 85, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_nonimmigrant_number', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 90);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>Place of Last Arrival into the United States</div>';
$pdf->writeHTMLCell(90, 7, 112, 96.5, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>20.a. </b> City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 103, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_city_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 108);
//........

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>20.b.  </b>  State</div>';
$pdf->writeHTMLCell(50, 0, 112, 116, $html, '', 0, 0, true, 'L');

$html = '<select name="recent_immigration_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 116, $html, '', 0, 0, true, 'L');

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.  </b>  Date of Last Arrival (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 123, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_date_last_arrive', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 123);

$pdf->SetFont('times', '', 10);
$html ='<div>When I last arrived in the United States, I:</div>';
$pdf->writeHTMLCell(90, 7, 112, 131, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22.a.</b> <input type="checkbox" name="inspected" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 137, $html, 0, 1, false, true, 'J', true);
$html ='<div>Was inspected at a port of entry and admitted as (for
example, exchange visitor; visitor, waived through;
temporary worker; student):</div>';
$pdf->writeHTMLCell(80, 7, 125, 137, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(80, 7, 123, 150, '', 1, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22.b.</b> <input type="checkbox" name="came_into" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 158, $html, 0, 1, false, true, 'J', true);
$html ='<div>Was inspected at a port of entry and paroled as (for
example, humanitarian parole, Cuban parole):</div>';
$pdf->writeHTMLCell(80, 7, 125, 158, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(80, 7, 123, 167.5, '', 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22.c.</b> <input type="checkbox" name="inspect2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 175, $html, 0, 1, false, true, 'J', true);
$html ='<div>Came into the United States without admission or
parole.</div>';
$pdf->writeHTMLCell(80, 7, 125, 175, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>22.d.</b> <input type="checkbox" name="other" value="Y" checked=" " />   other :</div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, true, 'J', true);
$pdf->TextField('recent_immigration_other', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 125, 188);

$pdf->SetFont('times', '', 9);
$html ='<div>If you were issued a Form I-94 Arrival-Departure Record Number:</div>';
$pdf->writeHTMLCell(90, 7, 112, 196, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23.a.</b>   Form I-94 Arrival-Departure Record Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 201, $html, 0, 1, false, true, 'J', true);
$pdf->TextField('recent_immigration_arival_record_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 206);
//............
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 125, 172.5, false); // angle 2
$pdf->StopTransform();


//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23.b. </b> Expiration Date of Authorized Stay Shown on Form <br> &nbsp; &nbsp; &nbsp; &nbsp; I-94
(mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 112, 215, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_pasport_expire_date_authorized', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 160, 220);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23.c. </b>     Status on Form I-94 (for example, class of admission, or<br>   &nbsp; &nbsp; &nbsp; &nbsp;
paroled, if paroled)</div>';
$pdf->writeHTMLCell(92, 7, 112, 228, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_status_on_form_I94', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 238);

$pdf->AddPage('P', 'LETTER'); //page number 3


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
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);



$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About You</b>(Person
applying for lawful permanent residence) (continued)</div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 1, true, false, 'L', true);
//.......


$pdf->SetFont('times', '', 10);
$html ='<div><b>24. </b>   What is your current immigration status (if it has changed<br>&nbsp; &nbsp; &nbsp; &nbsp;
since your arrival)?</div>';
$pdf->writeHTMLCell(92, 7, 12, 29, $html, 0, 1, false, true, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('recent_immigration_status_on_current_immigration', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 38);

//..........


$pdf->SetFont('times', '', 10);
$html ='<div>Provide your name exactly as it appears on your Form I-94 (if
any</div>';
$pdf->writeHTMLCell(92, 7, 12, 46, $html, 0, 1, false, true, 'J', false);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>24.a.  </b>  Family Name <br> &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 55, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_exactly_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 57);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>24.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 64, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_exactly_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 66);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>24.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 75, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_exactly_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 75);

//..........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Application Type or Filing Category</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 85, $html, 1, 1, true, false, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.    </b>     I am filing this Form I-485 as a (select only one box):</div>';
$pdf->writeHTMLCell(90, 7, 12, 92, $html, 0, 1, false, false, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="principal" value="Y" checked=" " />   Principal applicant</div>';
$pdf->writeHTMLCell(90, 7, 18, 97, $html, 0, 1, false, true, 'J', true);

$html ='<div> <input type="checkbox" name="drivative" value="Y" checked=" " />   Derivative applicant</div>';
$pdf->writeHTMLCell(90, 7, 18, 103, $html, 0, 1, false, true, 'J', true);


$html ='<div><b>NOTE:</b> Attach a copy of the Form I-797 receipt or approval
notice for the underlying petition or application, as appropriate.<br><br>
<b>I am applying</b> as a principal or derivative applicant to register
lawful permanent residence or adjust status to that of a lawful
permanent resident based on the following immigrant category
(select <b>only one</b> category). (See the Form I-485 Instructions for
more information, including any <b>Additional Instructions</b> that
relate to the immigrant category you select.):

</div>';
$pdf->writeHTMLCell(90, 7, 12, 109, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Family-based</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 155, $html, 0, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.   </b>    <input type="checkbox" name="relative_spouse" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 165, $html, 0, 1, false, true, 'J', true);
$html ='<div>Immediate relative spouse of a U.S. citizen, parent of
a U.S. citizen if the U.S. citizen is 21 years of age or
older, and unmarried child under 21 years of age of a
U.S. citizen, Form I-130</div>';
$pdf->writeHTMLCell(77, 7, 25, 165, $html, 0, 1, false, true, 'J', true);

//............

$html ='<div><b>2.b.   </b>    <input type="checkbox" name="other_relative" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 184, $html, 0, 1, false, true, 'J', true);
$html ='<div>Other relative of a U.S. citizen or relative of a lawful
permanent resident under the family-based preference
categories, Form I-130</div>';
$pdf->writeHTMLCell(77, 7, 25, 184, $html, 0, 1, false, true, 'J', true);

//.........

$html ='<div><b>2.c.   </b>    <input type="checkbox" name="individual" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, true, 'J', true);
$html ='<div>Individual admitted to the United States as a fiance(e)
or child of a fiance(e) of a U.S. citizen, Form I-129F
K-1/K-2 Nonimmigrant)</div>';
$pdf->writeHTMLCell(77, 7, 25, 200, $html, 0, 1, false, true, 'J', true);
//.........

$html ='<div><b>2.d.   </b>    <input type="checkbox" name="widow" value="Y" checked=" " />     Widow or widower of a U.S. citizen, Form I-360</div>';
$pdf->writeHTMLCell(90, 7, 12, 215, $html, 0, 1, false, true, 'J', true);


$html ='<div><b>2.e.   </b>    <input type="checkbox" name="vawa" value="Y" checked=" " />    VAWA self-petitioner, Form I-360</div>';
$pdf->writeHTMLCell(90, 7, 12, 222, $html, 0, 1, false, true, 'J', true);

//..............

$html ='<div><b>2.f.   </b>    <input type="checkbox" name="spouse_child" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 230, $html, 0, 1, false, true, 'J', true);
$html ='<div>Spouse, child, or parent of a deceased U.S. active
duty service member in the armed forces under the
National Defense Authorization Act (NDAA), Form
I-130 or Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 25, 230, $html, 0, 1, false, true, 'J', true);

//..........left side end ......

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Employment-based</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 17, $html, 0, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.   </b>    <input type="checkbox" name="alien_worker" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 24, $html, 0, 1, false, true, 'J', true);
$html ='<div>Alien worker, Form I-140 (if you select this box, you
must answer Item Number 9.a.</div>';
$pdf->writeHTMLCell(77, 7, 125, 24, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.   </b>    <input type="checkbox" name="alien_enterprenure" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 33, $html, 0, 1, false, true, 'J', true);
$html ='<div>Alien entrepreneur, Form I-526</div>';
$pdf->writeHTMLCell(77, 7, 125, 33, $html, 0, 1, false, true, 'J', true);

//.......

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Special Immigrant</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 40, $html, 0, 1, true, false, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.   </b>    <input type="checkbox" name="religous_worker" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 47, $html, 0, 1, false, true, 'J', true);
$html ='<div>Religious worker, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 47, $html, 0, 1, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.   </b>    <input type="checkbox" name="juviline" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 52.5, $html, 0, 1, false, true, 'J', true);
$html ='<div>Special immigrant juvenile, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 52.5, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.   </b>    <input type="checkbox" name="certain" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 58, $html, 0, 1, false, true, 'J', true);
$html ='<div> Certain Afghan or Iraqi national, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 58, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.d.   </b>    <input type="checkbox" name="certain" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 64, $html, 0, 1, false, true, 'J', true);
$html ='<div>Certain international broadcaster, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 64, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.e.   </b>    <input type="checkbox" name="certaing4" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 70, $html, 0, 1, false, true, 'J', true);
$html ='<div>Certain G-4 international organization or family
member or NATO-6 employee or family member,
form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 70, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.f.   </b>    <input type="checkbox" name="certain_us" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 86, $html, 0, 1, false, true, 'J', true);
$html ='<div>Certain U.S. armed forces members (also known as
the Six and Six program), Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 86, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.g.   </b>    <input type="checkbox" name="panama_canal" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 96, $html, 0, 1, false, true, 'J', true);
$html ='<div>Panama Canal Zone employees, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 96, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.h.   </b>    <input type="checkbox" name="physicians" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 103, $html, 0, 1, false, true, 'J', true);
$html ='<div>Certain Physicians, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 103, $html, 0, 1, false, true, 'J', true);
//..........


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.i.   </b>    <input type="checkbox" name="certain_emp" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 111, $html, 0, 1, false, true, 'J', true);
$html ='<div>Certain employee or former employee of the U.S.
Government abroad, Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 125, 111, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Asylee or Refugee</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 127, $html, 0, 1, true, false, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a.   </b>    <input type="checkbox" name="asylum_status" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 137, $html, 0, 1, false, true, 'J', true);
$html ='<div>Asylum status (INA section 208), Form I-589 or
Form I-730</div>';
$pdf->writeHTMLCell(77, 7, 125, 137, $html, 0, 1, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.   </b>    <input type="checkbox" name="refugee_status" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 149, $html, 0, 1, false, true, 'J', true);
$html ='<div>Refugee status (INA section 207), Form I-590 or
Form I-730</div>';
$pdf->writeHTMLCell(77, 7, 125, 149, $html, 0, 1, false, true, 'J', true);



//.........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Human Trafficking Victim or Victim of Qualifying
Criminal Activity</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 164, $html, 0, 1, true, false, 'J', true);
//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.   </b>    <input type="checkbox" name="traficking" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 1, false, true, 'J', true);
$html ='<div>Human trafficking victim (T Nonimmigrant), Form
I-914 or derivative family member, Form I-914A</div>';
$pdf->writeHTMLCell(77, 7, 125, 180, $html, 0, 1, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.   </b>    <input type="checkbox" name="victime" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 195, $html, 0, 1, false, true, 'J', true);
$html ='<div>Victim of Qualifying Criminal Activity (U
Nonimmigrant), Form I-918, derivative family
member, Form I-918A, or qualifying family member,
Form I-929</div>';
$pdf->writeHTMLCell(77, 7, 125, 195, $html, 0, 1, false, true, 'J', true);



//......page 3 end .......

$pdf->AddPage('P', 'LETTER'); //page number 4

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();



$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Application Type or Filing Category
</b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, false, 'L', true);


$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Special Programs Based on Certain Public Laws</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 32, $html, 0, 1, true, false, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.   </b>    <input type="checkbox" name="applicant7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 40, $html, 0, 1, false, true, 'J', true);
$html ='<div>Applicant adjusting under the Cuban Adjustment Act</div>';
$pdf->writeHTMLCell(77, 7, 25, 40, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.   </b>    <input type="checkbox" name="applicant7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 47, $html, 0, 1, false, true, 'J', true);
$html ='<div>Applicant adjusting under the Cuban Adjustment Act
for battered spouses and children</div>';
$pdf->writeHTMLCell(77, 7, 25, 47, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.c.   </b>    <input type="checkbox" name="applicant7c" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 57, $html, 0, 1, false, true, 'J', true);
$html ='<div>Applicant adjusting based on dependent status under
the Haitian Refugee Immigrant Fairness Act</div>';
$pdf->writeHTMLCell(77, 7, 25, 57, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.d.   </b>    <input type="checkbox" name="applicant7d" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 67, $html, 0, 1, false, true, 'J', true);
$html ='<div>Applicant adjusting based on dependent status under
the Haitian Refugee Immigrant Fairness Act for
battered spouses and children</div>';
$pdf->writeHTMLCell(77, 7, 25, 67, $html, 0, 1, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.e.   </b>    <input type="checkbox" name="lautenberg" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, true, 'J', true);
$html ='<div>Lautenberg Parolees</div>';
$pdf->writeHTMLCell(77, 7, 25, 80, $html, 0, 1, false, true, 'J', true);

//.............


$pdf->SetFont('times', '', 10);
$html ='<div><b>7.f.   </b>    <input type="checkbox" name="lautenberg" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 87, $html, 0, 1, false, true, 'J', true);
$html ='<div> Diplomats or high ranking officials unable to return
home (Section 13 of the Act of September 1 1, 1957)</div>';
$pdf->writeHTMLCell(77, 7, 25, 87, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.g.   </b>    <input type="checkbox" name="indochinese" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 97, $html, 0, 1, false, true, 'J', true);
$html ='<div>Applicant adjusting under the Indochinese Parole
Adjustment Act of 2000</div>';
$pdf->writeHTMLCell(77, 7, 25, 97, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.h.   </b>    <input type="checkbox" name="adjusting" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 107, $html, 0, 1, false, true, 'J', true);
$html ='<div>Applicant adjusting under the Amerasian Act
October 22, 1982), Form I-360</div>';
$pdf->writeHTMLCell(77, 7, 25, 107, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Additional Options</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 122, $html, 0, 1, true, false, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.   </b>    <input type="checkbox" name="diversity" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 132, $html, 0, 1, false, true, 'J', true);
$html ='<div>Diversity Visa program</div>';
$pdf->writeHTMLCell(77, 7, 25, 132, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.   </b>    <input type="checkbox" name="registry" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 1, false, true, 'J', true);
$html ='<div>Continuous residence in the United States since
before January 1, 1972 ("Registry")</div>';
$pdf->writeHTMLCell(77, 7, 25, 140, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.c.   </b>    <input type="checkbox" name="diplomatic" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 152, $html, 0, 1, false, true, 'J', true);
$html ='<div>Individual born in the United States under diplomatic
status</div>';
$pdf->writeHTMLCell(77, 7, 25, 152, $html, 0, 1, false, true, 'J', true);

//...........



$pdf->SetFont('times', '', 10);
$html ='<div><b>8.d.   </b>    <input type="checkbox" name="nonimmigrants" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 1, false, true, 'J', true);
$html ='<div>S nonimmigrants and qualifying family members
(only law enforcement agencies can file Form I-485
or someone in this category.)</div>';
$pdf->writeHTMLCell(77, 7, 25, 162, $html, 0, 1, false, true, 'J', true);

//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>8.e.   </b>    <input type="checkbox" name="eligibility" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 176, $html, 0, 1, false, true, 'J', true);
$html ='<div>Other eligibility (see the Form I-485 Instructions,
<b>Who May Form I-485, Item Number 3. Other
Immigrant Categories</b> for examples)</div>';
$pdf->writeHTMLCell(77, 7, 25, 176, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 20, 191, '', 1, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Additional Alien Worker Information</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 200, $html, 0, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Answer <b>Item Number 9.a.</b> only if you selected <b>Item Number
3.a.</b> "Alien worker, Form I-140."</div>';
$pdf->writeHTMLCell(90, 7, 12, 208, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.   </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 219, $html, 0, 1, false, true, 'J', true);
$html ='<div> Did a relative file the associated Form I-140 for you or
does a relative have a significant ownership interest (five
percent or more) in the business that filed Form I-140 for
you? (The relative must be your husband, wife, father.
mother, child, adult son, adult daughter, brother. or sister.)</div>';
$pdf->writeHTMLCell(84, 7, 20, 219, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div> <input type="checkbox" name="additional" value="Y" checked=" " /> Yes  &nbsp;  <input type="checkbox" name="additional" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(90, 7, 75, 241, $html, 0, 1, false, true, 'J', true);


//page 4 ........left end ..

$html ='<div>If you answered "Yes" to <b>Item Number 9.a.</b>, answer
<b>Item Numbers 9.b. - 9.c.</b> If you answered "No," skip to
<b>Item Number 10.</b> </div>';
$pdf->writeHTMLCell(92, 7, 112, 17, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.   </b>    How is your relative related to you?</div>';
$pdf->writeHTMLCell(90, 7, 112, 35, $html, 0, 1, false, true, 'J', true);
$html ='<div><input type="checkbox" name="brother_sister" value="Y" checked=" " />  Brother or sister</div>';
$pdf->writeHTMLCell(77, 7, 119, 42, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="husband_wife" value="Y" checked=" " />    Husband, wife, father, mother, child, adult son, or <br>&nbsp; &nbsp; &nbsp;
adult daughter</div>';
$pdf->writeHTMLCell(77, 7, 119, 48, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.c.   </b>    This relative is a:</div>';
$pdf->writeHTMLCell(90, 7, 112, 58, $html, 0, 1, false, true, 'J', true);


$html ='<div><input type="checkbox" name="us_citizen" value="Y" checked=" " />  U.S. citizen</div>';
$pdf->writeHTMLCell(77, 7, 119, 64, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="us_nation" value="Y" checked=" " />    U.S. national</div>';
$pdf->writeHTMLCell(77, 7, 119, 70, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="lawful_parmanent" value="Y" checked=" " />    Lawful permanent resident</div>';
$pdf->writeHTMLCell(77, 7, 119, 76, $html, 0, 1, false, true, 'J', true);


$html ='<div><input type="checkbox" name="non_of" value="Y" checked=" " />    None of the above</div>';
$pdf->writeHTMLCell(77, 7, 119, 82, $html, 0, 1, false, true, 'J', true);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.   </b>    Regardless of the immigrant category you are adjusting<br>  &nbsp;  &nbsp;  &nbsp;
under, do you hold:</div>';
$pdf->writeHTMLCell(90, 7, 112, 90, $html, 0, 1, false, true, 'J', true);

$html ='<div>VAWA self-petitioner status </div>';
$pdf->writeHTMLCell(77, 7, 119, 102, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="petittion_status" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="petittioner_status" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(77, 7, 170, 102, $html, 0, 1, false, true, 'J', true);

//.......

$html ='<div>Victim of Qualifying Criminal Activity (U nonimmigrant)
status</div>';
$pdf->writeHTMLCell(85, 7, 119, 109, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="victim" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="victim" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 170, 114, $html, 0, 1, false, true, 'J', true);

//........... 

$html ='<div>Human trafficking victim (T nonimmigrant) status</div>';
$pdf->writeHTMLCell(85, 7, 119, 122, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="traffic_status" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="traffic_status" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 170, 128, $html, 0, 1, false, true, 'J', true);
//.............

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>INA Section 245(i)</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 136, $html, 0, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.   </b>    Are you applying for adjustment based on the<br>  &nbsp;  &nbsp;  &nbsp;
Immigration and Nationality Ac(INA) section 245(i)?</div>';
$pdf->writeHTMLCell(90, 7, 112, 144, $html, 0, 1, false, true, 'J', true);

$html ='<div><input type="checkbox" name="INA" value="Y" checked=" " />  Yes   &nbsp; <input type="checkbox" name="INA" value="N" checked=" " /> No</div>';
$pdf->writeHTMLCell(80, 7, 170, 154, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Number 11.</b>, you
must have selected a family-based, employment-based,
special immigrant, or Diversity Visa immigrant category
listed above in <b>Item Numbers 2.a. - 8.e.</b> as the basis for
your application for adjustment of status. Fill out the rest
of this application <b>AND</b> Supplement A to Form I-485,
Adjustment of Status Under Section 245(i) (Supplement
A). For detailed filing instructions, read the Form I-485
Instructions (including any <b>Additional Instructions</b> that
relate to the immigrant category that you selected <b>Item
Numbers 2.a. - 8.e.</b>) and Supplement A Instructions.</div>';
$pdf->writeHTMLCell(85, 7, 119, 160, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Immigrant Category</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 210, $html, 0, 1, true, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div>If you are the <b>principal applicant</b>, provide the following
information.</div>';
$pdf->writeHTMLCell(90, 7, 112, 217, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.    </b>      Receipt Number of Underlying Petition (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 228, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_receipt_number_underliying', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 233.5);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.    </b>     Priority Date from Underlying Petition (if any)<br> &nbsp; &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 240, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_you_priority_date', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 245.5);

$pdf->AddPage('P', 'LETTER'); //page number 5

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();




$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 2. Application Type or Filing Category
</b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>If you are a <b>derivative applicant</b> (the spouse or unmarried
child under 21 years of age of a principal applicant), provide the
following information for the <b>principal applicant.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div>Principal Applicant\'s Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a.  </b>  Family Name <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 50, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 52);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>14.b.  </b>  Given Name <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 59, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 61);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>14.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 70, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('principal_applicant_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 70);

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.  </b>  Principal Applicant\'s A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 77, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('principal_applicant_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 83);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(50, 7, 38, 81, 'A-', 0, 1, false, false, 'J', true);
//............
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 26, 70, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 45, 88, false); // angle 2 
// $pdf->MultiCell(10, 10, "t", '1', 'L', 0, 1, 64, 72, false); // angle 3 
$pdf->StopTransform();

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.  </b>    Principal Applicant\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 90, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('principal_applicant_date_of_birth', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 95.5);

//........

$pdf->SetFont('times', '', 9.9);
$html ='<div><b>17. </b> Receipt Number of Principal\'s Underlying Petition (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('principal_applicant_receipt_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 107.5);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.  </b>    Priority Date of Principal Applicant\'s Underlying Petition<br> &nbsp; &nbsp; &nbsp; 
(if any) (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 115, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('principal_applicant_priority_date', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 120.5);

//........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Additional Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 130, $html, 1, 0, true, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 137, $html, 0, 1, false, false, 'J', true);
$pdf->writeHTMLCell(85, 7, 17, 137, 'Have you ever applied for an immigrant visa to obtain
permanent resident status at a U.S. Embassy or U.S.
Consulate abroad?', 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="part3_1" value="Y" checked=" " /> Yes &nbsp; <input type="checkbox" name="part3_1" value="N" checked=" " /> No  </div>';
$pdf->writeHTMLCell(90, 7, 70, 146, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 1.</b>, complete
<b>Item Numbers 2.a. - 4.</b> below. If you need extra space to
complete this section, use the space provided in <b>Part 14.
Additional Information.</b></div>';
$pdf->writeHTMLCell(85, 7, 17, 153, $html, 0, 1, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Location of U.S. Embassy or U.S. Consulate</div>';
$pdf->writeHTMLCell(90, 7, 12, 164, $html, 0, 1, false, false, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  City</div>';
$pdf->writeHTMLCell(90, 7, 12, 178, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('additional_info_location_city', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 33, 178);

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Country </div>';
$pdf->writeHTMLCell(90, 7, 12, 186, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('additional_info_location_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 191.5);


$pdf->SetFont('times', '', 10);
$html ='<div><b>3.    &nbsp;</b> &nbsp;     Decision (for example, approved, refused, denied,<br>  &nbsp;  &nbsp;  &nbsp;
withdrawn)</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('additional_info_decision', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 210);


$pdf->SetFont('times', '', 10);
$html ='<div><b>4.    &nbsp;</b> &nbsp;     Date of Decision (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 220, $html, 0, 1, false, false, 'J', true);
$pdf->TextField('additional_info_decision', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 220);

//...........page 5 left end 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Address History</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide physical addresses for everywhere you have lived
during the last five years, whether inside or outside the United
States. Provide your current address first. If you need extra
space to complete this section, use the space provided in
<b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 24, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div>Physical Address 1 (current address)</div>';
$pdf->writeHTMLCell(90, 7, 112, 47, $html, 0, 1, false, true, 'J', true);

$html = '<b>5.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 52, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_address_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 53);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 63, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 62);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 71, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 71);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>5.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 79, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 79, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 79.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 88, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 88);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 96.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 96.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 102, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 108);



$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(50, 0, 112, 115, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 120, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 120);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 129, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 129);

$pdf->writeHTMLCell(90, 0, 112, 138, '', 'T', 0, 0, true, 'L'); 

//.........
$pdf->SetFont('times', '', 10);
$html ='<div>Physical Address 2</div>';
$pdf->writeHTMLCell(50, 7, 112, 140, $html, '', 0, 0, true, 'L');
//............



$html = '<b>7.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 146, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_address2_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 148);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt3" value="Apt3" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste3" checked="" />Ste. <input type="checkbox" name="Flr3" value="Flr3" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 156, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162.5, 158);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 167, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 167.5);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>7.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 177, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_address2_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 177, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 177);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 186, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 186.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 196, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 196.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 202, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 208);

//.......page 5 end 




$pdf->AddPage('P', 'LETTER'); //page number 6

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();







$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Additional Information About You </b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(50, 0, 12, 30, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 35, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 35);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 44, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address2_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 44);


$pdf->SetFont('times', '', 10); // set font
$html = '<div>Provide your most recent address outside the United States
where you lived for more than one year (if not already listed
above).</div>';
$pdf->writeHTMLCell(90, 0, 12, 52, $html, '', 0, 0, true, 'L'); 

//........... 
$html = '<b>9.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 12, 65, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_address3_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 66);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>9.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 76, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 75);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 84, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 84);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.d.</b> &nbsp; &nbsp;State&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>9.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 92, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_address3_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 92, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 69.5, 92.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>9.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 101, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 101);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>9.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 109.5, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 109.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>9.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 115, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  21.5, 121);



$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(50, 0,  12, 128, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0,  12, 133, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 133);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>10.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0,  12, 142, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_address3_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  72.5, 142);

//.........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Employment History</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 155, $html, 0, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10); // set font
$html = '<div>Provide your employment history for the last five years.
whether inside or outside the United States. Provide the most
recent employment first. If you need extra space to complete
this section, use the space provided in <b>Part 14. Additional
Information.</b></div>';
$pdf->writeHTMLCell(90, 0,  12, 165, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<div>Employer I (current or most recent)</div>';
$pdf->writeHTMLCell(90, 0,  12, 190, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>11.    </b>      Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 0, 12, 200, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employement_company', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 206);

//........

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 1, false, true, 'J', true);

$html = '<b>12.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 22, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_employer_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 24);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>12.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt2" value="Apt2" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste2" value="Ste2" checked="" />Ste. <input type="checkbox" name="Flr2" value="Flr2" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 32, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 33);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 42, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 42);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>12.d.</b>&nbsp;&nbsp;State&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>12.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 51, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_employer_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 51, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 51.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 60, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 60.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 69, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 69.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>12.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 75, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121.5, 80.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>13.</b> &nbsp; &nbsp; Your Occupation';
$pdf->writeHTMLCell(50, 0, 112, 87, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 92);

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Employement</div>';
$pdf->writeHTMLCell(50, 0, 112, 99, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 105, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 105);
//............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>14.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 114, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),172.5, 114);

$pdf->writeHTMLCell(90, 0, 112, 123, '', 'T', 0, 0, true, 'L'); 

//.........
$pdf->SetFont('times', '', 10);
$html ='<div>Employer 2</div>';
$pdf->writeHTMLCell(50, 7, 112, 123, $html, '', 0, 0, true, 'L');
//............


$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>15.    </b>      Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 0, 112, 128, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_company', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  120, 133);

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 112, 140, $html, 0, 1, false, true, 'J', true);




$pdf->SetFont('Times', '', 10); 
$html = '<b>16.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 112, 145, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_employer2_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 147);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>16.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apte" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste3" value="Ste3" checked="" />Ste. <input type="checkbox" name="Flre" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 156, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162.5, 156);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>16.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 165, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 165);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>16.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>16.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 174, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_employer2_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 174, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 174);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>16.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 182, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 183);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>16.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 191, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 192);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>16.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 197, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),121.5, 202.5);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>17.</b> &nbsp; &nbsp; Your Occupation';
$pdf->writeHTMLCell(50, 0, 112, 209, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 214.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Employment</div>';
$pdf->writeHTMLCell(50, 0, 112, 223, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>18.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 228, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172.5, 228);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>18.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 237, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer2_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172.5, 237);


//.......... page 6 end 

$pdf->AddPage('P', 'LETTER'); //page number 7


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();




$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 3. Additional Information About You </b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10); // set font
$html = '<div>Provide your most recent employment outside of the United
States (if not already listed above).</div>';
$pdf->writeHTMLCell(90, 7, 12, 29, $html,  0, 0, false, 'L'); 


$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>19.    </b>      Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 0, 12, 38, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_company', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 43.5);


$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 12, 51, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('Times', '', 10); 
$html = '<b>20.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 0, 12, 57, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('aditional_info_employer3_street', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 59);


$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>20.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apte20a" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste20a" value="Ste3" checked="" />Ste. <input type="checkbox" name="Flre20a" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 68, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62.5, 68);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>20.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 77, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 77);



$pdf->SetFont('times', '', 10); // set font
$html = '<b>20.d.</b> &nbsp;&nbsp;State&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>20.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 86, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="aditional_info_employer3_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 86, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  69.5, 86);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>20.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 94, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 95);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>20.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 104, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  45, 104);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>20.h.</b> &nbsp;&nbsp;Country</div>';
$pdf->writeHTMLCell(50, 0, 12, 110, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 115.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>21.</b> &nbsp; &nbsp; Your Occupation';
$pdf->writeHTMLCell(50, 0, 12, 122, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 127.5);


$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Dates of Employment</div>';
$pdf->writeHTMLCell(50, 0, 12, 135, $html, '', 0, 0, true, 'L'); 


$pdf->SetFont('times', '', 10); // set font
$html = '<b>22.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 140, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 140);

//............

$pdf->SetFont('times', '', 10); // set font
$html = '<b>22.b.</b> &nbsp;&nbsp; To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 149, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('aditional_info_employer3_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 149);

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 4. Information About Your Parents</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 158, $html, 1, 0, true, true, 'L', true);

//.........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Parent 1</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 167, $html, 0, 1, true, true, 'L', true);

//.........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 1\'s Legal Name</div>';
$pdf->writeHTMLCell(50, 0, 12, 174, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 180, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 182);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 189, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 191);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 200);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 1\'s Name at Birth (if different than above)</div>'; 
$pdf->writeHTMLCell(90, 7, 12, 207, $html, '', 0, 0, true, 'L');

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 214, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_lastname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 216);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 224, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_firstname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 225.5);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 235, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent1_middlename_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 235);


//.....page 7 left end ...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>3. </b> &nbsp; Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 112, 17, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_date_of_birth', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 17);

$pdf->SetFont('times', '', 11);
$html= '<div><b>4. </b> Gender   &nbsp; &nbsp; <input type="checkbox" name="G" value="y" checked=" " />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked=" " /> Female</div>';
$pdf->writeHTMLCell(90, 7, 112, 24, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>5. </b>  &nbsp;  City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 10, 112, 31, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10.5);
$pdf->TextField('information_parent1_city_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 37);

//............

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>6.   </b>   &nbsp;  Country Of Birth</div>';
$pdf->writeHTMLCell(80, 7, 112, 44, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 49.5);

//.......

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>7.   </b>   &nbsp;  Current City or Town of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 112, 56, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_current_city_of_resident', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 61.5);

//..........


$pdf->SetFont('times', '', 10.5);
$html ='<div><b>8.   </b>   &nbsp;   Current Country of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 112, 68, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent1_current_country_of_resident', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 73.5);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Parent 2 </b></div>';
$pdf->writeHTMLCell(92, 7, 113, 84, $html, 0, 1, true, true, 'L', true);

//.........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 2\'s Legal Name</div>';
$pdf->writeHTMLCell(50, 0, 112, 91, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 96, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 98);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 105, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 107);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 116, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 116);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Parent 2\'s Name at Birth (if different than above)</div>'; 
$pdf->writeHTMLCell(90, 7, 112, 124, $html, '', 0, 0, true, 'L');

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>10.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 130, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_lastname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 132);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 139, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_firstname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 141.5);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 150, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_parent2_middlename_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 150.5);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b> &nbsp; Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 10, 112, 160, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_date_of_birth', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 160);

$pdf->SetFont('times', '', 11);
$html= '<div><b>12. </b> Gender   &nbsp; &nbsp; <input type="checkbox" name="G" value="y" checked=" " />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked=" " /> Female</div>';
$pdf->writeHTMLCell(90, 7, 112, 167, $html, '', 0, 0, true, 'L');

//.........

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>13. </b>&nbsp; City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 10, 112, 175, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10.5);
$pdf->TextField('information_parent2_city_of_birth', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 180.5);

//............

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>14.  </b>&nbsp;Country Of Birth</div>';
$pdf->writeHTMLCell(80, 7, 112, 187, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 192.5 );

//.......

$pdf->SetFont('times', '', 10.5);
$html ='<div><b>15.  </b>&nbsp;Current City or Town of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 112, 201, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_current_city_of_resident', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 206.5);

//..........


$pdf->SetFont('times', '', 10.5);
$html ='<div><b>16.   </b>&nbsp;Current Country of Residence (if living)</div>';
$pdf->writeHTMLCell(80, 7, 112, 214, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('information_parent2_current_country_of_resident', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 219.5);


//..........page 7 end 


$pdf->AddPage('P', 'LETTER'); //page number 8




$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Information About Your Marital History</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b>  What is your current marital status?</div>';
$pdf->writeHTMLCell(80, 7, 12, 24, $html, 0, 1, false, false, 'J', true);

$html= '<div>
<input type="checkbox" name="single" value="single" checked=" " />Single, Never Married &nbsp;&nbsp;
<input type="checkbox" name="mariage" value="married" checked=" " />Married  &nbsp;&nbsp;  
<input type="checkbox" name="divorce" value="divorce" checked=" " /> Divorcee  <br>
<input type="checkbox" name="widow" value="widowed" checked=" " /> Widowed  &nbsp;&nbsp;
<input type="checkbox" name="separeted" value="separeted" checked=" " /> Legally Separeted <br>
<input type="checkbox" name="annuled" value="annulled" checked=" " /> Mariage Annulled 
</div>';

$pdf->writeHTMLCell(90, 10, 16, 30, $html, '', 0, 0, true, 'L');



$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b>     If you are married, is your spouse a current member of the <br>  &nbsp;  &nbsp;
U.S. armed forces or U.S. Coast Guard?</div>';
$pdf->writeHTMLCell(90, 7, 12, 44, $html, 0, 1, false, false, 'J', true);

$html= '<div>
<input type="checkbox" name="na" value="na" checked=" " /> N/A &nbsp;&nbsp;
<input type="checkbox" name="yes" value="yes" checked=" " /> Yes  &nbsp;&nbsp;  
<input type="checkbox" name="no" value="no" checked=" " /> No  

</div>';

$pdf->writeHTMLCell(90, 10, 60, 53, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10);
$html ='<div><b>3.  </b>     How many times have you been married (including<br>   &nbsp;   &nbsp; 
annulled marriages and marriages to the same individual)?</div>';
$pdf->writeHTMLCell(90, 7, 12, 58, $html, 0, 1, false, false, 'J', true); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('how_many_times_married', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 68);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Current Marriage </b> (including if you are legally separated)</div>';
$pdf->writeHTMLCell(90, 7, 13, 78, $html, 0, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>If you are currently married, provide the following information
about your current spouse.</div>';
$pdf->writeHTMLCell(90, 7, 12, 92, $html, 0, 1, false, true, 'J', false); 


$pdf->SetFont('times', '', 10);
$html ='<div>Current Spouse\'s Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 103, $html, 0, 1, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 108, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 110);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 117, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 119);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 127, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 128);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 135, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 142);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 39, 141, 'A-', 0, 1, false, false, 'J', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
//$pdf->MultiCell(10, 10, "t", '1', 'C', 0, 1, 26, 70, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 30, 129, false); // angle 2 
$pdf->StopTransform();

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.   </b>   Current Spouse\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 148, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_date_of_birth', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 154);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>7.   </b>  Date of Marriage to Current Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 161, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_date_of_marriage', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 167);

//......

$pdf->SetFont('times', '', 10);
$html ='<div>Current Spouse\'s Place of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 185, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_birth_city_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 190.5);

//........



$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_birth_state', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 205);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>8.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 215, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('current_mariage_spouse_birth_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 220.5);


//.........page 8 left end  


$pdf->SetFont('times', '', 10);
$html ='<div>Place of Marriage to Current Spouse</div>';
$pdf->writeHTMLCell(90, 7, 112, 14, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 19, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_current_spouse_city_or_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 24);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_current_spouse_province', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 36);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>9.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 43, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_current_spouse_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 48);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.   </b>   Is your current spouse applying with you ?</div>';
$pdf->writeHTMLCell(90, 7, 112, 55, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="spouse_apply" value="Y" checked=" " /> Yes   &nbsp;  <input type="checkbox" name="spouse_apply" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(90, 7, 175, 60, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Information About Prior Marriages </b> (if any)</div>';
$pdf->writeHTMLCell(90, 7, 113, 67, $html, 0, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>If you have been married before, whether in the United States or
in any other country, provide the following information about
your prior spouse. If you have had more than one previous
marriage, use the space provided in <b>Part 14. Additional
Information</b> to provide the information below.</div>';
$pdf->writeHTMLCell(90, 7, 112, 76, $html, 0, 1, false, true, 'J', false);
$html ='<div>Prior Spouse\'s Legal Name (provide family name before
marriage)</div>';
$pdf->writeHTMLCell(90, 7, 112, 99, $html, 0, 1, false, true, 'J', false);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.a.    </b>    Family Name <br>  &nbsp;  &nbsp;  &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 108, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_prior_marriage_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 110);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>11.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 117, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_prior_marriage_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 119);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>11.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 127, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_prior_marriage_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 128);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.   </b>   Prior Spouse\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 135, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('prior_spouse_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 140.5);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>13.    </b>    Date of Marriage to Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 149, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('prior_spouse_date_of_marriage', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 155);

//......

$pdf->SetFont('times', '', 10);
$html ='<div>Place of Marriage to Prior Spouse</div>';
$pdf->writeHTMLCell(90, 7, 112, 162, $html, 0, 1, false, false, 'J', true);
//.......




$pdf->SetFont('times', '', 10);
$html ='<div><b>14.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 170, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_prior_spouse_city_town', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 175.5);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 183, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_prior_spouse_state_province', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 188.5);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>14.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 196, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_mariage_prior_spouse_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 201.5);

//.....

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.     </b>     Date Marriage with Prior Spouse Legally Ended<br>  &nbsp;   &nbsp;  &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 212, $html, 0, 1, false, false, 'J', false);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('legally_ended_date_of_prior_spouse_marriage', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162, 216.5);

//........page 8 end 

$pdf->AddPage('P', 'LETTER'); //page number 9



$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();


$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 5. Information About Your Marital History </b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Place Where Marriage with Prior Spouse Legally Ended</div>';
$pdf->writeHTMLCell(90, 7, 12, 27, $html, 0, 1, false, false, 'J', false);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 36, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_spouse_prior_marriage_ended_city_town', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 41.5);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 48, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_spouse_prior_marriage_ended_state_province', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 53.5);
 
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>16.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('place_of_spouse_prior_marriage_ended_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 65.5);

//.........

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 6. Information About Your Children</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 75, $html, 1, 0, true, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 84, $html, 0, 1, false, false, 'J', true);
$html ='<div>Indicate the total number of ALL living children
(including adult sons and daughters) that you have.<br><br>

<b>NOTE:</b> The term "children" includes all biological or
legally adopted children, as well as current stepchildren
of any age, whether born in the United States or other
countries, married or unmarried, living with you or
elsewhere and includes any missing children and those
born to you outside of marriage.

</div>';
$pdf->writeHTMLCell(80, 7, 18, 84, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('total_number_of_children', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 78, 120);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information for each of your children.
If you have more than three children, use the space provided in
<b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 128, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div>Child 1</div>';
$pdf->writeHTMLCell(90, 7, 12, 143, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Current Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, 0, 1, false, true, 'J', true);

//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 157, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 159);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 166, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 168);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 176, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 177);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 184, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 190);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 39, 189, 'A-', 0, 1, false, false, 'J', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 48, 13.5, false); // angle 2 Right side 
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 28, 178, false); // angle 1 Left side  
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 92, 83, false); // angle 3 Right side  
$pdf->StopTransform();

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.   </b>    Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 199, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 199);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children1_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 213);


$pdf->SetFont('times', '', 10);
$html ='<div><b>6.   </b> Is this child applying with you?</div>';
$pdf->writeHTMLCell(90, 7, 12, 224, $html, 0, 1, false, false, 'J', true);

//.....

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="child_apply" value="Y" checked=" " /> Yes   &nbsp;  <input type="checkbox" name="child_apply" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(90, 7, 75, 224, $html, 0, 1, false, true, 'J', true);


//.........page 9 left end 


//.......child 2
$pdf->SetFont('times', '', 10);
$html ='<div>Child 2</div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Current Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 20, $html, 0, 1, false, true, 'J', true);

//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 26, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 28);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 35, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 37);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 45, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 46);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 53, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 59);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 139, 58, 'A-', 0, 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.   </b>    Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 68, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 68);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 112, 75, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children2_country_of_birth', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 80.5);


$pdf->SetFont('times', '', 10);
$html ='<div><b>11.   </b> Is this child applying with you?</div>';
$pdf->writeHTMLCell(90, 7, 112, 88, $html, 0, 1, false, false, 'J', true);

//.....

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="child2_apply" value="Y" checked=" " /> Yes   &nbsp;  <input type="checkbox" name="child2_apply" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(90, 7, 175, 88, $html, 0, 1, false, true, 'J', true);

$pdf->writeHTMLCell(91, 7, 112, 96, '', 'T', 1, false, true, 'J', true);

//..........child 3


$pdf->SetFont('times', '', 10);
$html ='<div>Child 3</div>';
$pdf->writeHTMLCell(90, 7, 112, 97, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div>Current Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 102, $html, 0, 1, false, true, 'J', true);

//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.a.  </b>  Family Name <br>  &nbsp;  &nbsp; &nbsp;  &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 107, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 109);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.b.  </b>  Given Name <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 116, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 118);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 126, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 127);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.   </b>    A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 135, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_a_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 142);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(90, 7, 139, 140, 'A-', 0, 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>14.   </b>    Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 152, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_date_of_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 152);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15.   </b>  Country of Birth</div>';
$pdf->writeHTMLCell(90, 7, 112, 158, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_children3_country_of_birth', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 163.5);


$pdf->SetFont('times', '', 10);
$html ='<div><b>16.   </b> Is this child applying with you?</div>';
$pdf->writeHTMLCell(90, 7, 112, 171, $html, 0, 1, false, false, 'J', true);

//.....

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="child3_apply" value="Y" checked=" " /> Yes   &nbsp;  <input type="checkbox" name="child3_apply" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(90, 7, 175, 171, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 7. Biographic Information</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 178, $html, 1, 0, true, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.     </b>     Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(90, 7, 112, 185, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="ethnicity" value="Y" checked=" " /> Hispanic or Latino </div>';
$pdf->writeHTMLCell(90, 7, 117, 191, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="ethnicity" value="Y" checked=" " /> Not Hispanic or Latino</div>';
$pdf->writeHTMLCell(90, 7, 117, 197, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.     </b>     Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(90, 7, 112, 203, $html, 0, 1, false, false, 'J', true);
//....
$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="white" value="Y" checked=" " /> White</div>';
$pdf->writeHTMLCell(90, 7, 117, 209, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="asian" value="Y" checked=" " /> Asian</div>';
$pdf->writeHTMLCell(90, 7, 117, 214, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="black" value="Y" checked=" " /> Black or African American</div>';
$pdf->writeHTMLCell(90, 7, 117, 220, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="american" value="Y" checked=" " /> American Indian or Alaska Native</div>';
$pdf->writeHTMLCell(90, 7, 117, 226, $html, 0, 1, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="native" value="Y" checked=" " /> Native Hawaiian or Other Pacific Islander</div>';
$pdf->writeHTMLCell(90, 7, 117, 232, $html, 0, 1, false, true, 'J', true);

//.......page 9 end 

$pdf->AddPage('P', 'LETTER'); //page number 10

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();




$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 7. Biographic Information</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.   </b>  Height </div>';
$pdf->writeHTMLCell(30, 7, 12, 26, $html, 0, 0, false, true, 'J', true);
$html= '<div><label for="selection">Feet:</label>
<select name="biographic_info_feet" size="0">
    <option value=" ">select</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(40, 7, 42, 26, $html, 0, 0, false, true, 'J', true);


$html1= '<div><label for="selection">Inches:</label>
<select name="biographic_info_inches" size="0">
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
$pdf->writeHTMLCell(90, 7, 72, 26, $html1, 0, 0, false, true, 'J', true);

$html= '<div><b>4.    </b>   Weight   &nbsp;  &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; Pounds </div>';
$pdf->writeHTMLCell(50, 7, 12, 34, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('biographic_info_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 76, 34);
$pdf->TextField('biographic_info_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 34);
$pdf->TextField('biographic_info_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 64, 34);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 41, $html, 0, 0, false, true, 'J', true);


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
$pdf->writeHTMLCell(90, 7, 14, 47, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html= '<div><b>6.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 61, $html, 0, 0, false, true, 'J', true);

$pdf->SetFont('times', '', 11);
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
$pdf->writeHTMLCell(90, 7, 14, 67, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 8. General Eligibility and Inadmissibility
Grounds</b> </div>';
$pdf->writeHTMLCell(90, 7, 13, 85, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.    </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 98, $html, 0, 0, false, true, 'J', true);

$html= '<div>Have you <b>EVER</b> been a member of, involved in, or in
any way associated with any organization, association,
fund, foundation, party, club, society, or similar group in
the United States or in any other location in the world
including any military service?</div>';
$pdf->writeHTMLCell(85, 7, 17, 98, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="gligiblity" value="Y" checked="" />  Yes  &nbsp; <input type="checkbox" name="gligiblity" value="N" checked="" />  No</div>';
$pdf->writeHTMLCell(90, 7, 78, 117, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div>If you answered "Yes" to <b>Item Number 1.</b>, complete <b>Item
Numbers 2. - 13.b.</b> below. If you need extra space to complete
this section, use the space provided in <b>Part 14. Additional
Information.</b> If you answered "No," but are unsure of your
answer, provide an explanation of the events and circumstances
in the space provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 125, $html, 0, 0, false, true, 'J', true);


$pdf->SetFont('times', '', 10);
$html= '<div>Organization 1</div>';
$pdf->writeHTMLCell(90, 7, 12, 156, $html, 0, 0, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html= '<div><b>2.       </b>     &nbsp;    Name of Organization</div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_name_of_org', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 167.5);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.a.     </b>    City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 175, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_city_or_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 180.5);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>3.b.     </b>     State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 188, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_state_or_province', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 193.5);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.c.     </b>     Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 201.5, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_counrty', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 207);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>4.        </b>      &nbsp;     Nature of Group</div>';
$pdf->writeHTMLCell(90, 7, 12, 215.5, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_nature_of_group', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 221);


//............ page 10 left side  end 

$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Membership or Dates of Involvement</div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.a.        </b>      &nbsp;     From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 22, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_date_from', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 22);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.b.        </b>      &nbsp;     To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 31, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization1_date_to', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 31);

$pdf->writeHTMLCell(92, 0, 112, 40, '', 'T', 1, false, true, 'J', true);


//.......org 2

$pdf->SetFont('times', '', 10);
$html= '<div>Organization 2</div>';
$pdf->writeHTMLCell(90, 7, 112, 41, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>6.       </b>     &nbsp;    Name of Organization</div>';
$pdf->writeHTMLCell(90, 7, 112, 46, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_name_of_org', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 51.5);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.a.     </b>    City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 58, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_city_or_town', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 64);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>7.b.     </b>     State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 71, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_state_or_province', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 76.5);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.c.     </b>     Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 83, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_counrty', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 88);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>8.        </b>      &nbsp;     Nature of Group</div>';
$pdf->writeHTMLCell(90, 7, 112, 95, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_nature_of_group', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 100);


$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Membership or Dates of Involvement</div>';
$pdf->writeHTMLCell(90, 7, 112, 108, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>9.a.        </b>      &nbsp;     From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 115, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_date_from', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 115);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>9.b.        </b>      &nbsp;     To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 124, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization2_date_to', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 125);

$pdf->writeHTMLCell(92, 0, 112, 134, '', 'T', 1, false, true, 'J', true);
//..........organization 3 



$pdf->SetFont('times', '', 10);
$html= '<div>Organization 3</div>';
$pdf->writeHTMLCell(90, 7, 112, 135, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>10.       </b>   &nbsp;    Name of Organization</div>';
$pdf->writeHTMLCell(90, 7, 112, 140, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_name_of_org', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 145.5);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>11.a.    </b>       City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 152, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_city_or_town', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 157.5);

//......


$pdf->SetFont('times', '', 10);
$html= '<div><b>11.b.       </b>      State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 164, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_state_or_province', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 169.5);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>11.c.       </b>       Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 176, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_counrty', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 182);
//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>12.         </b>       &nbsp;     Nature of Group</div>';
$pdf->writeHTMLCell(90, 7, 112, 189, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_nature_of_group', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 194.5);


$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Membership or Dates of Involvement</div>';
$pdf->writeHTMLCell(90, 7, 112, 202, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>13.a.         </b>      &nbsp;     From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 210, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_date_from', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 210);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>13.b.        </b>      &nbsp;     To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 220, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('organization3_date_to', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 220);

//...........page 10 end 

$pdf->AddPage('P', 'LETTER'); //page number 11



$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div>Answer <b>Item Numbers 14. - 80.b.</b> Choose the answer that you
think is correct. If you answer "Yes" to any questions <b>(or if
you answer "No," but are unsure of your answer)</b>, provide
in explanation of the events and circumstances in the space
provided in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>14.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 54, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been denied admission to the United <br>
 states?</div>';
$pdf->writeHTMLCell(85, 7, 19, 54, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="admission" value="Y" checked=" " /> Yes <input type="checkbox" name="admission" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 60, $html, 0, 0, false, true, 'J', true);
//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>15.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <>EVER<> been denied a visa to the United States?</div>';
$pdf->writeHTMLCell(85, 7, 19, 65, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="denied" value="Y" checked=" " /> Yes <input type="checkbox" name="denied" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 70, $html, 0, 0, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>16.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 75, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> worked in the United States without<br>
  authorization?</div>';
$pdf->writeHTMLCell(85, 7, 19, 75, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="authorize" value="Y" checked=" " /> Yes <input type="checkbox" name="authorize" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 80, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>17.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 85, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> violated the terms or conditions of your<br>
  nonimmigrant status?</div>';
$pdf->writeHTMLCell(85, 7, 19, 85, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="violated" value="Y" checked=" " /> Yes <input type="checkbox" name="violated" value="N" checked=" " /> No </div>';
$pdf->writeHTMLCell(85, 7, 80, 91, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>18.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 96, $html, 0, 0, false, true, 'J', true);
$html= '<div> Are you presently or have you <b>EVER</b> been in removal,<br>
 exclusion, rescission, or deportation proceedings?</div>';
$pdf->writeHTMLCell(85, 7, 19, 96, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="removal" value="Y" checked=" " />  Yes <input type="checkbox" name="removal" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 105, $html, 0, 0, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>19.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 110, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been issued a final order of exclusion,<br>
 deportation, or removal?</div>';
$pdf->writeHTMLCell(85, 7, 19, 110, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="exclusion" value="Y" checked=" " />  Yes <input type="checkbox" name="exclusion" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 115, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>20.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 122, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  had a prior final order of exclusion,<br>
deportation, or removal reinstated?</div>';
$pdf->writeHTMLCell(85, 7, 19, 122, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="reinstated" value="Y" checked=" " />  Yes <input type="checkbox" name="reinstated" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 127, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>21.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 134, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  held lawful permanent resident status<br>
 which was later rescinded?</div>';
$pdf->writeHTMLCell(85, 7, 19, 134, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="lawful" value="Y" checked=" " />  Yes <input type="checkbox" name="lawful" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 139, $html, 0, 0, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>22.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 145, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been granted voluntary departure by an<br>
 immigration officer or an immigration judge but failed to<br>
 depart within the allotted time?</div>';
$pdf->writeHTMLCell(85, 7, 19, 145, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="granted" value="Y" checked=" " />  Yes <input type="checkbox" name="granted" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 155, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>23.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  applied for any kind of relief or<br>
 protection from removal, exclusion, or deportation?</div>';
$pdf->writeHTMLCell(85, 7, 19, 162, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="relief" value="Y" checked=" " />  Yes <input type="checkbox" name="relief" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 172, $html, 0, 0, false, true, 'J', true);

//........
$pdf->SetFont('times', '', 10);
$html= '<div><b>24.a.  <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 177, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been a J nonimmigrant exchange visitor<br>
 who was subject to the two-year foreign residence<br>
 requirement?</div>';
$pdf->writeHTMLCell(85, 7, 19, 177, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="foreign" value="Y" checked=" " />  Yes <input type="checkbox" name="foreign" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 187, $html, 0, 0, false, true, 'J', true);

//........


$pdf->SetFont('times', '', 10);
$html= '<div>If you answered "Yes" to <b>Item Number 24.a.</b>, complete <b>Item
Numbers 24.b. - 24.c.</b> If you answered "No" to <b>Item Number
24.a.</b>, skip to <b>Item Number 25</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 195, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>24.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 212, $html, 0, 0, false, true, 'J', true);
$html= '<div>  Have you complied with the foreign residence<br>
  requirement?</div>';
$pdf->writeHTMLCell(85, 7, 19, 212, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="complied" value="Y" checked=" " />  Yes <input type="checkbox" name="complied" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 217, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>24.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 227, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you been granted a waiver or has Department of<br>
 State issued a favorable waiver recommendation letter<br>
 for you?</div>';
$pdf->writeHTMLCell(85, 7, 19, 227, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="waiver" value="Y" checked=" " />  Yes <input type="checkbox" name="waiver" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 237, $html, 0, 0, false, true, 'J', true);

//........page 11 left end 


$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Criminal Acts and Violations</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);

//.........

$pdf->SetFont('times', '', 11);
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
$pdf->writeHTMLCell(92, 7, 112, 25, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>25.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been arrested, cited, charged, or<br>
 detained for any reason by any law enforcement official<br>
 (including but not limited to any U.S. immigration<br>
 official or any official of the U.S. armed forces or U.S.<br>
 Coast Guard)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 98, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="arrested" value="Y" checked=" " />  Yes <input type="checkbox" name="arrested" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 117, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>26.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 123, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> committed a crime of any kind (even if<br>
 you were not arrested, cited, charged with, or tried for that<br>
 rime)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 123, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="crime" value="Y" checked=" " />  Yes   <input type="checkbox" name="crime" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 133, $html, 0, 0, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>27.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 140, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> pled guilty to or been convicted of a<br>
 crime or offense (even if the violation was subsequently<br>
 expunged or sealed by a court, or if you were granted a<br>
 pardon, amnesty, a rehabilitation decree, or other act of<br> 
 clemency)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 140, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="guilty" value="Y" checked=" " />  Yes   <input type="checkbox" name="guilty" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 158, $html, 0, 0, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you were the beneficiary of a pardon, amnesty,
a rehabilitation decree, or other act of clemency, provide
documentation of that post-conviction action.</div>';
$pdf->writeHTMLCell(85, 7, 119, 163, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>28.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been ordered punished by a judge or had<br>
 conditions imposed on you that restrained your liberty<br>
 (such as a prison sentence, suspended sentence, house<br>
 arrest, parole, alternative sentencing, drug or alcohol<br>
 treatment, rehabilitative programs or classes, probation, or<br>
 community service)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 180, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="punished" value="Y" checked=" " />  Yes   <input type="checkbox" name="punished" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 203, $html, 0, 0, false, true, 'J', true);
//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>29.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 210, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been a defendant or the accused in a<br>
 criminal proceeding (including pre-trial diversion,<br>
 deferred prosecution, deferred adjudication, or any<br>
 withheld adjudication)?</div>';
$pdf->writeHTMLCell(85, 7, 119, 210, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="accused" value="Y" checked=" " />  Yes   <input type="checkbox" name="accused" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 224, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>30.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 230, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> violated (or attempted or conspired to<br>
violate) any controlled substance law or regulation of a<br>
state, the United States, or a foreign country?</div>';
$pdf->writeHTMLCell(85, 7, 119, 230, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="conspired" value="Y" checked=" " />  Yes   <input type="checkbox" name="conspired" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 245, $html, 0, 0, false, true, 'J', true);

//.......page 11 end 

$pdf->AddPage('P', 'LETTER'); //page number 12


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>31.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> been convicted of two or more offenses<br>
 (other than purely political offenses) for which the<br>
 combined sentences to confinement were five years or<br>
 more?</div>';
$pdf->writeHTMLCell(85, 7, 19, 30, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="which" value="Y" checked=" " />  Yes   <input type="checkbox" name="which" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 45, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>32.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  illicitly (illegally) trafficked or benefited<br>
 from the trafficking of any controlled substances, such as<br>
 chemicals, illegal drugs, or narcotics?</div>';
$pdf->writeHTMLCell(85, 7, 19, 50, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="illicitly" value="Y" checked=" " />  Yes   <input type="checkbox" name="illicitly" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 60, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>33.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> knowingly aided, abetted, assisted,<br>
 conspired, or colluded in the illicit trafficking of any<br>
 illegal narcotic or other controlled substances?</div>';
$pdf->writeHTMLCell(85, 7, 19, 65, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="knowingly" value="Y" checked=" " />  Yes   <input type="checkbox" name="knowingly" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 80, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>34.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 85, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you the spouse, son, or daughter of a foreign national<br>
 who illicitly trafficked or aided (or otherwise abetted,<br>
 assisted, conspired, or colluded) in the illicit trafficking of<br>
 a controlled substance, such as chemicals, illegal drugs, or<br>
 narcotics and you obtained, within the last five years, any<br>
 financial or other benefit from the illegal activity of your<br>
 spouse or parent, although you knew or reasonably should<br>
 have known that the financial or other benefit resulted<br>
 from the illicit activity of your spouse or parent?</div>';
$pdf->writeHTMLCell(85, 7, 19, 85, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="national" value="Y" checked=" " />  Yes   <input type="checkbox" name="national" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 125, $html, 0, 0, false, true, 'J', false);

//...........


$pdf->SetFont('times', '', 10);
$html= '<div><b>35.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 130, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> engaged in prostitution or are you<br>
 coming to the United States to engage in prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 19, 130, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="engaged" value="Y" checked=" " />  Yes   <input type="checkbox" name="engaged" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 140, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>36.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 145, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  directly or indirectly procured (or<br>
 attempted to procure) or imported prostitutes or persons<br>
 or the purpose of prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 19, 145, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="directly" value="Y" checked=" " />  Yes   <input type="checkbox" name="directly" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 156, $html, 0, 0, false, true, 'J', false);
//........


$pdf->SetFont('times', '', 10);
$html= '<div><b>37.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  received any proceeds or money from<br>
 prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 19, 160, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="received" value="Y" checked=" " />  Yes   <input type="checkbox" name="received" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 167, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>37.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  received any proceeds or money from<br>
 prostitution?</div>';
$pdf->writeHTMLCell(85, 7, 19, 160, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="received" value="Y" checked=" " />  Yes   <input type="checkbox" name="received" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 167, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>38.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 172, $html, 0, 0, false, true, 'J', true);
$html= '<div> Do you intend to engage in illegal gambling or any other<br>
 form of commercialized vice, such as prostitution,<br>
 bootlegging, or the sale of child pornography, while in the<br>
 United States?</div>';
$pdf->writeHTMLCell(85, 7, 19, 172, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="intend" value="Y" checked=" " />  Yes   <input type="checkbox" name="intend" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 187, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>39.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 192, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> exercised immunity (diplomatic or<br>
 otherwise) to avoid being prosecuted for a criminal<br>
 offense in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 19, 192, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="exercised" value="Y" checked=" " />  Yes   <input type="checkbox" name="exercised" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 202, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>40.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>, while serving as a foreign government<br>
 official, been responsible for or directly carried out<br>
 violations of religious freedoms? </div>';
$pdf->writeHTMLCell(85, 7, 19, 207, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="freedoms" value="Y" checked=" " />  Yes   <input type="checkbox" name="freedoms" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 217, $html, 0, 0, false, true, 'J', false);


//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>41.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 222, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> induced by force, fraud, or coercion (or<br>
 otherwise been involved in) the trafficking of persons for<br>
 commercial sex acts?</div>';
$pdf->writeHTMLCell(85, 7, 19, 222, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="coercion" value="Y" checked=" " />  Yes   <input type="checkbox" name="coercion" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 234, $html, 0, 0, false, true, 'J', false);

//......page 12 left end 


$pdf->SetFont('times', '', 10);
$html= '<div><b>42.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b> trafficked a person into involuntary<br>
 servitude, peonage, debt bondage, or slavery? Trafficking<br>
 includes recruiting, harboring, transporting, providing, or<br>
 obtaining a person for labor or services through the use of<br>
 force, fraud, or coercion.</div>';
$pdf->writeHTMLCell(85, 7, 119, 17, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="involuntary" value="Y" checked=" " />  Yes   <input type="checkbox" name="involuntary" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 37, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>43.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 40, $html, 0, 0, false, true, 'J', true);
$html= '<div> Have you <b>EVER</b>  knowingly aided, abetted, assisted,<br>
 conspired, or colluded with others in trafficking persons<br>
 for commercial sex acts or involuntary servitude,<br>
 peonage, debt bondage, or slavery?</div>';
$pdf->writeHTMLCell(85, 7, 119, 40, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="peonage" value="Y" checked=" " />  Yes   <input type="checkbox" name="peonage" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 55, $html, 0, 0, false, true, 'J', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>44.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 0, false, true, 'J', true);
$html= '<div> Are you the spouse, son or daughter of a foreign national<br>
 who engaged in the trafficking of persons and have<br>
 received or obtained, within the last five years, any<br>
 financial or other benefits from the illicit activity of your<br>
 spouse or your parent, although you knew or reasonably<br>
 should have known that this benefit resulted from<br> 
 the illicitactivity of your spouse or parent?</div>';
$pdf->writeHTMLCell(85, 7, 119, 60, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="spouse" value="Y" checked=" " />  Yes   <input type="checkbox" name="spouse" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 92, $html, 0, 0, false, true, 'J', false);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>45.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 96, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> engaged in money laundering or have
you <b>EVER</b> knowingly aided, assisted, conspired, or
colluded with others in money laundering or do you seek
to enter the United States to engage in such activity?</div>';
$pdf->writeHTMLCell(85, 7, 119, 96, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="laundering" value="Y" checked=" " />  Yes   <input type="checkbox" name="laundering" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 115, $html, 0, 0, false, true, 'J', false);
//......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Security and Related</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 120, $html, 0, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html= '<div>Do you intend to:</div>';
$pdf->writeHTMLCell(90, 7, 112, 127, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 132, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity that violates or evades any law
relating to espionage (including spying) or sabotage in the
United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 132, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="evades" value="Y" checked=" " />  Yes   <input type="checkbox" name="evades" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 143, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 147, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity in the United States that violates or
evades any law prohibiting the export from the United
States of goods, technology, or sensitive information?</div>';
$pdf->writeHTMLCell(85, 7, 120, 147, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="sensitive" value="Y" checked=" " />  Yes   <input type="checkbox" name="sensitive" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 162, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 168, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity whose purpose includes opposing,
controlling, or overthrowing the U.S. Government by
force, violence, or other unlawful means while in the
United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 168, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="unlawful" value="Y" checked=" " />  Yes   <input type="checkbox" name="unlawful" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 183, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any activity that could endanger the welfare,
safety, or security of the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 190, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="security" value="Y" checked=" " />  Yes   <input type="checkbox" name="security" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 196, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>46.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 204, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engage in any other unlawful activity? </div>';
$pdf->writeHTMLCell(85, 7, 120, 204, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="activity_" value="Y" checked=" " />  Yes   <input type="checkbox" name="activity_" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 205, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>47.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 215, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you engaged in or, upon your entry into the United
States, do you intend to engage in any activity that could
have potentially serious adverse foreign policy
consequences for the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 215, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="consequences" value="Y" checked=" " />  Yes   <input type="checkbox" name="consequences" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 232, $html, 0, 0, false, true, 'J', false);

$pdf->AddPage('P', 'LETTER'); //page number 13



$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html= '<div>Have you <b>EVER</b>:</div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 35, $html, 0, 0, false, true, 'J', true);
$html= '<div>Committed, threatened to commit, attempted to commit,
conspired to commit, incited, endorsed, advocated,
planned, or prepared any of the following: hijacking,
sabotage, kidnapping, political assassination, or use of a
weapon or explosive to harm another individual or cause
substantial damage to property?</div>';
$pdf->writeHTMLCell(85, 7, 20, 35, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="committed" value="Y" checked=" " />  Yes   <input type="checkbox" name="committed" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 58, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 63, $html, 0, 0, false, true, 'J', true);
$html= '<div>Participated in, or been a member of, a group or
organization that did any of the activities described in
<b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 63, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="participated" value="Y" checked=" " />  Yes   <input type="checkbox" name="participated" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 73, $html, 0, 0, false, true, 'J', false);

//.......


$pdf->SetFont('times', '', 10);
$html= '<div><b>48.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 78, $html, 0, 0, false, true, 'J', true);
$html= '<div>Recruited members or asked for money or things of value
for a group or organization that did any of the activities
described in <b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 78, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="recruited" value="Y" checked=" " />  Yes   <input type="checkbox" name="recruited" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 88, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 93, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support for any of the activities
described in <b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 93, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="assistance" value="Y" checked=" " />  Yes   <input type="checkbox" name="assistance" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 103, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>48.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 108, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support for an individual, group,
or organization who did any of the activities described in
<b>Item Number 48.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 108, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="money_" value="Y" checked=" " />  Yes   <input type="checkbox" name="money_" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 123, $html, 0, 0, false, true, 'J', false);
//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>49.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 128, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> received any type of military,
paramilitary, or weapons training?</div>';
$pdf->writeHTMLCell(85, 7, 20, 128, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="weapons" value="Y" checked=" " />  Yes   <input type="checkbox" name="weapons" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 134, $html, 0, 0, false, true, 'J', false);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>50.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 0, false, true, 'J', true);
$html= '<div>Do you intend to engage in any of the activities listed in
any part of <b>Item Numbers 48.a. - 49.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 140, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="engage" value="Y" checked=" " />  Yes   <input type="checkbox" name="engage" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 145, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you answered "Yes" to any part of <b>Item Numbers
46.a. - 50.</b>, explain what you did, including the dates and
location of the circumstances, or what you intend to do in the
space provided in <b>Part 14. Additional Information.</b>
Are you the spouse or child of an individual who <b>EVER:</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 152, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 177, $html, 0, 0, false, true, 'J', true);
$html= '<div>Committed, threatened to commit, attempted to commit,
conspired to commit, incited, endorsed, advocated,
planned, or prepared any of the following: hijacking,
sabotage, kidnapping, political assassination, or use of a
weapon or explosive to harm another individual or cause
substantial damage to property?</div>';
$pdf->writeHTMLCell(85, 7, 20, 177, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="property" value="Y" checked=" " />  Yes   <input type="checkbox" name="property" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 200, $html, 0, 0, false, true, 'J', false);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, 0, 0, false, true, 'J', true);
$html= '<div>Participated in, or been a member or a representative of a
group or organization that did any of the activities
described in <b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 207, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="representative" value="Y" checked=" " />  Yes   <input type="checkbox" name="representative" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 217, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 224, $html, 0, 0, false, true, 'J', true);
$html= '<div>Recruited members, or asked for money or things of value,
for a group or organization that did any of the activities
described in <b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 20, 224, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="things" value="Y" checked=" " />  Yes   <input type="checkbox" name="things" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 234, $html, 0, 0, false, true, 'J', false);

//.........page 13 left end 

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support for any of the activities
described in <b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 17, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_51d" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_51d" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 28, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 34, $html, 0, 0, false, true, 'J', true);
$html= '<div>Provided money, a thing of value, services or labor, or
any other assistance or support to an individual, group, or
organization who did any of the activities described in
<b>Item Number 51.a.</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 34, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_51e" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_51e" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 49, $html, 0, 0, false, true, 'J', false);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>51.f.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 55, $html, 0, 0, false, true, 'J', true);
$html= '<div>Received any type of military, paramilitary, or weapons
training from a group or organization that did any of the
activities described in ,<b>Item Number 51.a.,</b>?</div>';
$pdf->writeHTMLCell(85, 7, 120, 55, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_51f" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_51f" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 70, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you answered " Yes" to any part of <b>Item Number
51.</b>, explain the relationship and what occurred, including the
dates and location of the circumstances, in the space provided
in <b>Part 14. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 77, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>52.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 96, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> assisted or participated in selling,
providing, or transporting weapons to any person who,
to your knowledge, used them against another person?</div>';
$pdf->writeHTMLCell(85, 7, 120, 96, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_52" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_52" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 110, $html, 0, 0, false, true, 'J', false);

//.........


$pdf->SetFont('times', '', 10);
$html= '<div><b>53.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 116, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> worked, volunteered, or otherwise
served in any prison, jail, prison camp, detention facility,
labor camp, or any other situation that involved detaining
persons?</div>';
$pdf->writeHTMLCell(85, 7, 120, 116, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_53" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_53" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 130, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>54.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 138, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been a member of, assisted, or
participated in any group, unit, or organization of any
kind in which you or other persons used any type of
weapon against any person or threatened to do so?</div>';
$pdf->writeHTMLCell(85, 7, 120, 138, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_54" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_54" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 156, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>55.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 162, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> served in, been a member of, assisted,
or participated in any military unit, paramilitary unit,
police unit, self-defense unit, vigilante unit, rebel group,
guerilla group, militia, insurgent organization, or any
other armed group?</div>';
$pdf->writeHTMLCell(85, 7, 120, 162, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_55" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_55" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 181, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>56.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 188, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been a member of, or in any way
affiliated with, the Communist Party or any other
totalitarian party (in the United States or abroad)?</div>';
$pdf->writeHTMLCell(85, 7, 120, 188, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_56" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_56" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 204, $html, 0, 0, false, true, 'J', false);

//.........


$pdf->SetFont('times', '', 10);
$html= '<div><b>57.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 210, $html, 0, 0, false, true, 'J', true);
$html= '<div>During the period from March 23, 1933 to May 8, 1945,
did you ever order, incite, assist, or otherwise participate
in the persecution of any person because of race, religion,
national origin, or political opinion, in association with
either the Nazi government of Germany or any
organization or government associated or allied with the
Nazi government of Germany?</div>';
$pdf->writeHTMLCell(85, 7, 120, 210, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_57" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_57" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180, 240, $html, 0, 0, false, true, 'J', false);

//.......page 13 end 


$pdf->AddPage('P', 'LETTER'); //page number 14



$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html= '<div>Have you <b>EVER</b> ordered, incited, called for, committed, assisted,
helped with, or otherwise participated in any of the following:</div>';
$pdf->writeHTMLCell(92, 7, 12, 30, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 46, $html, 0, 0, false, true, 'J', true);
$html= '<div>Acts involving torture or genocide?</div>';
$pdf->writeHTMLCell(85, 7, 20, 46, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_58a" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_58a" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 47, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 53, $html, 0, 0, false, true, 'J', true);
$html= '<div> Killing any person?</div>';
$pdf->writeHTMLCell(85, 7, 20, 53, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_58b" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_58b" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80, 55, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 0, false, true, 'J', true);
$html= '<div>Intentionally and severely injuring any person?</div>';
$pdf->writeHTMLCell(85, 7, 20, 60, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_58c" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_58c" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  67, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>58.d.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 72, $html, 0, 0, false, true, 'J', true);
$html= '<div>Engaging in any kind of sexual contact or relations with
any person who did not consent or was unable to consent,
or was being forced or threatened?</div>';
$pdf->writeHTMLCell(85, 7, 20, 72, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_58d" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_58d" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  83, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>58.e.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 0, false, true, 'J', true);
$html= '<div>Limiting or denying any person\'s ability to exercise
religious beliefs?</div>';
$pdf->writeHTMLCell(85, 7, 20, 88, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_58e" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_58e" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  94, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>59.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 100, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> recruited, enlisted, conscripted, or used
any person under 15 years of age to serve in or help an
armed force or group?</div>';
$pdf->writeHTMLCell(85, 7, 20, 100, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_59" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_59" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  112, $html, 0, 0, false, true, 'J', false);

//............

$pdf->SetFont('times', '', 10);
$html= '<div><b>60.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 117, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> used any person under 15 years of age
to take part in hostilities, or to help or provide services to
people in combat?</div>';
$pdf->writeHTMLCell(85, 7, 20, 117, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_60" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_60" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  127, $html, 0, 0, false, true, 'J', false);

//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If you answered "Yes" to any part of <b>Item Numbers
52. - 60.</b>, explain what occurred, including the dates and
location of the circumstances, in the space provided in <b>Part 14.
Additional Information.</b></div>';
$pdf->writeHTMLCell(92, 7, 12, 135, $html, 0, 0, false, true, 'J', true);

//......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Public Charge</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 155, $html, 0, 0, true, true, 'L', true);

//...........


$pdf->SetFont('times', '', 10);
$html= '<div>Those who are subject to the public charge ground of
inadmissibility under INA section 212(a)(4) must complete
Form I-944, Declaration of Self-Sufficiency, and may also have
to submit Form I-864, Affidavit of Support Under Section 213A
of the INA. Answer the questions below to determine whether
you need to submit these forms together with this Form I-485.</div>';
$pdf->writeHTMLCell(92, 7, 12, 163, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Declaration of Self-Sufficiency (Form I-944)</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 191, $html, 0, 0, true, true, 'L', true);

//...........


$pdf->SetFont('times', '', 10);
$html= '<div><b>61.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you exempt from the public charge ground of
inadmissibility?</div>';
$pdf->writeHTMLCell(85, 7, 20, 200, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_61" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_61" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  205, $html, 0, 0, false, true, 'J', false);

//...........


$pdf->SetFont('times', '', 10);
$html= '<div>To determine if you are exempt from the public charge ground
of inadmissibility, and therefore exempt from filing Form I-944,
read the Form I-485 Instructions, <b>What Evidence Must You
Submit, Item Number 9. Public Charge: Declaration of Self-
Sufficiency (Form I-944) and Affidavit of Support Under
Section 213A of the INA (Form I-864).</b> If you answered
"Yes" to <b>Item Number 61.</b>, proceed to <b>Item Number 63.a.</b> If
you answered "No," complete Form I-944 and include it with
your Form I-485 filing, and proceed to <b>Item Number 62.a.</b></div>';
$pdf->writeHTMLCell(92, 7, 12, 210, $html, 0, 0, false, true, 'J', true);


//..........page 14 left end 

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Affidavit of Support Under Section 213A of the
INA (Form I-864)</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);

$pdf->SetFont('times', '', 10);
$html= '<div>You may need to file Form I-864. For more information, read
the Form I-485 Instructions, <b>What Evidence Must You
Submit, Item Number 9. Public Charge: Declaration of Self-
Sufficiency (Form I-944) and Affidavit of Support Under
INA section 213A (Form I-864).</b> <br>
I am EXEMPT from filing Form I-864 because:</div>';
$pdf->writeHTMLCell(92, 7, 112, 29, $html, 0, 0, false, true, 'J', true);
 
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.a.   <b/><input type="checkbox" name=" " value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 56, $html, 0, 0, false, true, 'J', true);
$html= '<div>I have earned or can receive credit for 40 qualifying
quarters (credits) of work in the United States (as
defined by the Social Security Act (SSA). (Attach
your SSA earnings statements. Do not count any
quarters during which you received a means-tested
public benefit).</div>';
$pdf->writeHTMLCell(79, 7, 125, 56, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.b.   <b/><input type="checkbox" name="62_a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 84, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am under 18 years of age, unmarried, immigrating
as the child of a U.S. citizen, and will automatically
become a U.S. citizen under the Child Citizenship
Act of 2000 upon my admission to the United States.</div>';
$pdf->writeHTMLCell(79, 7, 125, 84, $html, 0, 0, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.c.   <b/><input type="checkbox" name="62_c" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 103, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the widow or widower of a U.S.
Citizen (Form I-360) immigrant category</div>';
$pdf->writeHTMLCell(79, 7, 125, 103, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.d.   <b/><input type="checkbox" name="62_d" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 113, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under an alien worker (Form I-140)
employment-based preference immigrant category
and both of the following apply:<br><br>
<b>(1)</b> I am not a relative of the Form I-140 petitioner;
  and<br><br>
<b>(2)</b> I do not have a relative with a significant
 ownership interest (at least five percent) in the
 business that filed Form I-140.</div>';
$pdf->writeHTMLCell(79, 7, 125, 113, $html, 0, 0, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html= '<div><b>62.e.   <b/><input type="checkbox" name="62_e" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 156, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the alien entrepreneur (Form
I-526) immigrant category.</div>';
$pdf->writeHTMLCell(79, 7, 125, 156, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.f.   <b/><input type="checkbox" name="62_f" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 166, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the human trafficking victim
(T nonimmigrant) immigrant category (INA section
245(l)).</div>';
$pdf->writeHTMLCell(79, 7, 125, 166, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.g.   <b/><input type="checkbox" name="62_g" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 180, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under a category other than the human
trafficking victim (T nonimmigrant) category (INA
section 245(l)), or as an alien worker under the
employment-based preference categories where a
relative filed Form I-140 for me or has a five percent
or more ownership interest in the business that filed
Form I-140. and I either have a pending application
for T nonimmigrant status or I am an individual who
is in valid T nonimmigrant status.</div>';
$pdf->writeHTMLCell(79, 7, 125, 180, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If, when USCIS adjudicates your adjustment
application, your Form I-914 is no longer pending a decision or
you are no longer in valid T nonimmigrant status, you may have
to submit a Form I-944 and Form I-864.</div>';
$pdf->writeHTMLCell(92, 7, 112, 219, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.h.   <b/><input type="checkbox" name="62_h" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 237, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the victim of qualifying criminal
activity (U nonimmigrant) immigrant category (INA
section 245(m)).</div>';
$pdf->writeHTMLCell(79, 7, 125, 237, $html, 0, 0, false, true, 'J', true);

//.........page 14 end 


$pdf->AddPage('P', 'LETTER'); //page number 15


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//...........
$pdf->SetFont('times', '', 10);
$html= '<div><b>62.i.   <b/><input type="checkbox" name="62_i" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under a category other than the victim
of qualifying criminal activity (U nonimmigrant)
category under INA section 245(m) or as an alien
worker under the employment-based preference
categories where a relative filed Form I-140 for me or
has a five percent or more ownership interest in the
business that filed Form I-140. but I either have a
pending petition for U nonimmigrant status or I am
an individual who is granted U nonimmigrant status.</div>';
$pdf->writeHTMLCell(79, 7, 25, 30, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> If, at the time of the adjudication of the Form I-485,
your Form I-918 is no longer pending a decision or you are no
longer in valid U nonimmigrant status, you may be required to
submit Form I-944 and Form I-864.</div>';
$pdf->writeHTMLCell(92, 7, 12, 70, $html, 0, 0, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.j.   <b/><input type="checkbox" name="62_j" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 88, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the diplomat or high ranking
official unable to return home (Section 13 of the Act
of September 11, 1957) immigrant category.</div>';
$pdf->writeHTMLCell(79, 7, 25, 88, $html, 0, 0, false, true, 'J', true);

//.....
$pdf->SetFont('times', '', 10);
$html= '<div><b>62.k.   <b/><input type="checkbox" name="62_k" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 102, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am a law enforcement officer filing this Form I-485
for an S nonimmigrant immigrant (or a qualifying
family member).</div>';
$pdf->writeHTMLCell(79, 7, 25, 102, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.l.   <b/><input type="checkbox" name="62_l" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 116, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the Diversity Visa program
mmigrant category.</div>';
$pdf->writeHTMLCell(79, 7, 25, 116, $html, 0, 0, false, true, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.m.   <b/><input type="checkbox" name="62_m" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 126, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under one of the following special
immigrant categories (select one):</div>';
$pdf->writeHTMLCell(79, 7, 25, 126, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="62_m1" value="Y" checked=" " />Armed forces (also known as the Six and Six<br>
  &nbsp; &nbsp; program)</div>';
$pdf->writeHTMLCell(79, 7, 25, 136, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="62_m2" value="Y" checked=" " />Panama Canal Zone</div>';
$pdf->writeHTMLCell(79, 7, 25, 146, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="62_m3" value="Y" checked=" " />Certain broadcasters</div>';
$pdf->writeHTMLCell(79, 7, 25, 152, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="62_m4" value="Y" checked=" " />G-4 or NATO-6 employees and their family <br> &nbsp; &nbsp;  members</div>';
$pdf->writeHTMLCell(79, 7, 25, 158, $html, 0, 0, false, true, 'J', true);


$html= '<div><input type="checkbox" name="62_m5" value="Y" checked=" " />International employees of the U.S. Government <br> &nbsp; &nbsp; abroad</div>';
$pdf->writeHTMLCell(79, 7, 25, 168, $html, 0, 0, false, true, 'J', true);


$html= '<div><input type="checkbox" name="62_m6" value="Y" checked=" " />Religious workers</div>';
$pdf->writeHTMLCell(79, 7, 25, 178, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="62_m7" value="Y" checked=" " />Certain physicians</div>';
$pdf->writeHTMLCell(79, 7, 25, 184, $html, 0, 0, false, true, 'J', true);

$html= '<div><input type="checkbox" name="62_m8" value="Y" checked=" " />Employed by or on behalf of the U.S.
Government</div>';
$pdf->writeHTMLCell(79, 7, 25, 190, $html, 0, 0, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>62.n.   <b/><input type="checkbox" name="62_n" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am applying under the Amerasian Act (October 22,
1982)</div>';
$pdf->writeHTMLCell(79, 7, 25, 196, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Illegal Entries and Other Immigration Violations</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 209, $html, 0, 0, true, true, 'L', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>63.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 219, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> failed or refused to attend or to remain
in attendance at any removal proceeding filed against you
on or after April 1, 1997?</div>';
$pdf->writeHTMLCell(85, 7, 20, 219, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_63a" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_63a" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 80,  230, $html, 0, 0, false, true, 'J', false);

//...........page 15 left end 



$pdf->SetFont('times', '', 10);
$html= '<div><b>63.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, 0, 0, false, true, 'J', true);
$html= '<div>If your answer to <b>Item Number 63.a.</b> is "Yes," do you
believe you had reasonable cause?</div>';
$pdf->writeHTMLCell(85, 7, 120, 17, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_63b" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_63b" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  23, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>63.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 28, $html, 0, 0, false, true, 'J', true);
$html= '<div>If your answer to <b>Item Number 63.b.</b> is "Yes," attach a
written statement explaining why you had reasonable
cause.</div>';
$pdf->writeHTMLCell(85, 7, 120, 28, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>64.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 42, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> submitted fraudulent or counterfeit
documentation to any U.S. Government official to obtain
or attempt to obtain any immigration benefit, including a
visa or entry into the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 42, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_64" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_64" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  57, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>64.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 42, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> submitted fraudulent or counterfeit
documentation to any U.S. Government official to obtain
or attempt to obtain any immigration benefit, including a
visa or entry into the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 42, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_64" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_64" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  57, $html, 0, 0, false, true, 'J', false);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>65.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 62, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> lied about, concealed, or misrepresented
any information on an application or petition to obtain a
visa, other documentation required for entry into the
United States, admission to the United States, or any other
kind of immigration benefit?</div>';
$pdf->writeHTMLCell(85, 7, 120, 62, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_65" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_65" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  82, $html, 0, 0, false, true, 'J', false);

//..........
$pdf->SetFont('times', '', 10);
$html= '<div><b>66.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 87, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> falsely claimed to be a U.S. citizen (in
writing or any other way)?</div>';
$pdf->writeHTMLCell(85, 7, 120, 87, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_66" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_66" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  93, $html, 0, 0, false, true, 'J', false);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>67.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been a stowaway on a vessel or aircraft
arriving in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 98, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_67" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_67" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  103, $html, 0, 0, false, true, 'J', false);


//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>68.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 108, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> knowingly encouraged, induced,
assisted, abetted, or aided any foreign national to enter or
to try to enter the United States illegally (alien
smuggling)?</div>';
$pdf->writeHTMLCell(85, 7, 120, 108, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_68" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_68" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  123, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>69.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 128, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you under a final order of civil penalty for violating
INA section 274C for use of fraudulent documents?</div>';
$pdf->writeHTMLCell(85, 7, 120, 128, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_69" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_69" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(85, 7, 180,  137, $html, 0, 0, false, true, 'J', false);
//..........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Removal, Unlawful Presence, or Illegal Reentry
After Previous Immigration Violations</b></div>';
$pdf->writeHTMLCell(92, 7, 113, 142, $html, 0, 0, true, true, 'L', true);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>70.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 155, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> been excluded, deported, or removed
from the United States or have you ever departed the
United States on your own after having been ordered
excluded, deported, or removed from the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 155, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_70" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_70" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 180,  174, $html, 0, 0, false, true, 'J', false); 

//.....

$pdf->SetFont('times', '', 10);
$html= '<div><b>71.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 179, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> entered the United States without being
inspected and admitted or paroled?</div>';
$pdf->writeHTMLCell(85, 7, 120, 179, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_71" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_71" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 180,  186, $html, 0, 0, false, true, 'J', false); 

//.......

$pdf->SetFont('times', '', 10);
$html= '<div>Since April 1, 1997, have you been unlawfully present in the
United States:</div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, 0, 0, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>72.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 200, $html, 0, 0, false, true, 'J', true);
$html= '<div>For more than 180 days but less than a year, and then
departed the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 200, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_72a" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_72a" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 180,  206, $html, 0, 0, false, true, 'J', false);

//........


$pdf->SetFont('times', '', 10);
$html= '<div><b>72.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 211, $html, 0, 0, false, true, 'J', true);
$html= '<div>For more than 180 days but less than a year, and then
departed the United States?</div>';
$pdf->writeHTMLCell(85, 7, 120, 211, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_72b" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_72b" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 180,  217, $html, 0, 0, false, true, 'J', false);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> You were unlawfully present in the United States if
you entered the United States without being inspected and
admitted or inspected and paroled, or if you legally entered the
United States but you stayed longer than permitted.</div>';
$pdf->writeHTMLCell(90, 7, 112, 225, $html, 0, 0, false, true, 'J', true);


//..............page 15 end 

$pdf->AddPage('P', 'LETTER'); //page number 16



$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(92, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html= '<div>Since April 1, 1997, have you <b>EVER</b> reentered or attempted to
reenter the United States without being inspected and admitted
or paroled after:</div>';
$pdf->writeHTMLCell(90, 7, 12, 30, $html, 0, 0, false, true, 'J', true);

//...........

$pdf->SetFont('times', '', 10);
$html= '<div><b>73.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 0, false, true, 'J', true);
$html= '<div>Having been unlawfully present in the United States for
more than one year in the aggregate? </div>';
$pdf->writeHTMLCell(85, 7, 20, 45, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_73a" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_73a" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  52, $html, 0, 0, false, true, 'J', false);

//..........


$pdf->SetFont('times', '', 10);
$html= '<div><b>73.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 58, $html, 0, 0, false, true, 'J', true);
$html= '<div>Having been deported, excluded, or removed from the
United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 58, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_73b" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_73b" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  65, $html, 0, 0, false, true, 'J', false);
//.........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Miscellaneous Conduct</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 70, $html, 0, 0, true, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>74.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 77, $html, 0, 0, false, true, 'J', true);
$html= '<div>Do you plan to practice polygamy in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 77, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_74" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_74" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  83, $html, 0, 0, false, true, 'J', false);


//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>75.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 90, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you accompanying another foreign national who
requires your protection or guardianship but who is
inadmissible after being certified by a medical officer as
being helpless from sickness, physical or mental
disability, or infancy, as described in INA section 232(c)?</div>';
$pdf->writeHTMLCell(85, 7, 20, 90, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_75" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_75" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  112, $html, 0, 0, false, true, 'J', false);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>76.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 118, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> assisted in detaining, retaining, or
withholding custody of a U.S. citizen child outside the
United States from a U.S. citizen who has been granted
custody of the child?</div>';
$pdf->writeHTMLCell(85, 7, 20, 118, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_76" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_76" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  134, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>77.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 140, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> voted in violat ion of any Federal, state,
or local constitutional provision, statute, ordinance, or
regulation in the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 140, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_77" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_77" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  150, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>78.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 156, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> renounced U.S. citizenship to avoid
being taxed by the United States?</div>';
$pdf->writeHTMLCell(85, 7, 20, 156, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_78" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_78" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  162, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div>Have you <b>EVER:<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 168, $html, 0, 0, false, true, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>79.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applied for exemption or discharge from training or
service in the U.S. armed forces or in the U.S. National
Security Training Corps on the ground that you are a
foreign national?</div>';
$pdf->writeHTMLCell(85, 7, 20, 174, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_79a" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_79a" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  190, $html, 0, 0, false, true, 'J', false);

//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>79.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 196, $html, 0, 0, false, true, 'J', true);
$html= '<div>Been relieved or discharged from such training or service
on the ground that you are a foreign national?</div>';
$pdf->writeHTMLCell(85, 7, 20, 196, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_79b" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_79b" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  206, $html, 0, 0, false, true, 'J', false);

//.............

$pdf->SetFont('times', '', 10);
$html= '<div><b>79.c.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 214, $html, 0, 0, false, true, 'J', true);
$html= '<div>Been convicted of desertion from the U.S. armed forces?</div>';
$pdf->writeHTMLCell(85, 7, 20, 214, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_79c" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_79c" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 80,  222, $html, 0, 0, false, true, 'J', false);



//.........page 16 left end 

$pdf->SetFont('times', '', 10);
$html= '<div><b>80.a.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 16, $html, 0, 0, false, true, 'J', true);
$html= '<div>Have you <b>EVER</b> left or remained outside the United
States to avoid or evade training or service in the U.S.
armed forces in time of war or a period declared by the
President to be a national emergency?</div>';
$pdf->writeHTMLCell(84, 7, 120, 16, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part8_80a" value="Y" checked=" " />  Yes   <input type="checkbox" name="part8_80a" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 180,  31, $html, 0, 0, false, true, 'J', false);

//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>80.b.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 36, $html, 0, 0, false, true, 'J', true);
$html= '<div>If your answer to <b>Item Number 80.a.</b> is "Yes," what was
your nationality or immigration status immediately before
you left (for example, U.S. citizen or national, lawful
permanent resident, nonimmigrant, parolee, present
without admission or parole, or any other status)?</div>';
$pdf->writeHTMLCell(84, 7, 120, 36, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(84, 7, 120, 59, '', 1, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 9. Accommodations for Individuals With
Disabilities and/or Impairments</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 68, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> Read the information in the Form I-485 Instructions
before completing this part.</div>';
$pdf->writeHTMLCell(90, 7, 112, 80, $html, 0, 0, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.   <b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 90, $html, 0, 0, false, true, 'J', true);
$html= '<div>Are you requesting an accommodation because of your
disabilities and or impairments?</div>';
$pdf->writeHTMLCell(84, 7, 120, 90, $html, 0, 0, false, true, 'J', true);

$html= '<div> <input type="checkbox" name="part9_1" value="Y" checked=" " />  Yes   <input type="checkbox" name="part9_1" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(84, 7, 180,  96, $html, 0, 0, false, true, 'J', false);
//.....

$html= '<div>If you answered "Yes" to <b>Item Number 1.</b>, select any
applicable box in <b>Item Numbers 2.a. - 2.c.</b> and provide
an answer.</div>';
$pdf->writeHTMLCell(84, 7, 120, 100, $html, 0, 0, false, true, 'J', true);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.a.   <b/><input type="checkbox" name="part9_2a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 115, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am deaf or hard of hearing and request the
following accommodation. (If you are requesting a
sign-language interpreter, indicate for which
language (for example, American Sign Language).):</div>';
$pdf->writeHTMLCell(80, 7, 125, 115, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(80, 15, 125, 134, '', 1, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.b.   <b/><input type="checkbox" name="part9_2b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 150, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am blind or have low vision and request the
following accommodation:</div>';
$pdf->writeHTMLCell(80, 7, 125, 150, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(80, 15, 125, 160, '', 1, 0, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.c.   <b/><input type="checkbox" name="part9_2c" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 177, $html, 0, 0, false, true, 'J', true);
$html= '<div>I have another type of disability and/or impairment.
Describe the nature of your disability and/or
impairment and the accommodation you are
requesting.)</div>';
$pdf->writeHTMLCell(80, 7, 125, 177, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(80, 15, 125, 197, '', 1, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 10. Applicant\'s Statement, Contact
Information, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(92, 7, 113, 215, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-485
Instructions before completing this part. You must file Form
I-485 while in the United States.</div>';
$pdf->writeHTMLCell(90, 7, 112, 228, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->AddPage('P', 'LETTER'); //page number 17


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();



$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$html ='<div><b>Part 10. Applicant\'s Statement, Contact
Information, Certification, and Signature  </b> (continued) </div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Applicant\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 37, $html, 0, 0, true, true, 'L', true);

//......

$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 7, 12, 45, $html, 0, 0, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.a.   <b/><input type="checkbox" name="part10_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 55, $html, 0, 0, false, true, 'J', true);
$html= '<div>I can read and understand English, and I have read
and understand every question and instruction on this
application and my answer to every question.</div>';
$pdf->writeHTMLCell(79, 7, 24, 55, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.b.   <b/><input type="checkbox" name="part10_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 70, $html, 0, 0, false, true, 'J', true);
$html= '<div>The interpreter named in <b>Part 11.</b> read to me every
question and instruction on this application and my
answer to every question in</div>';
$pdf->writeHTMLCell(79, 7, 24, 70, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(79, 7, 24, 85, '', 1, 0, false, true, 'J', true);
$html= '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell(79, 7, 24, 92, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.   <b/><input type="checkbox" name="part10_2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 103, $html, 0, 0, false, true, 'J', true);
$html= '<div>At my request, the preparer named in <b>Part 12.</b>,</div>';
$pdf->writeHTMLCell(79, 7, 24, 103, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(79, 7, 24, 109, '', 1, 0, false, true, 'J', true);
$html= '<div>prepared this application for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell(79, 7, 24, 115, $html, 0, 0, false, true, 'J', true);

//.........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Applicant\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 127, $html, 0, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 135, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(79, 7, 20, 135, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_telephone', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 140.5);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>4.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 148, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(79, 7, 20, 148, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_mobile', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 154);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.<b/></div>';
$pdf->writeHTMLCell(90, 7, 12, 161, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(79, 7, 20, 161, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_email', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  20, 167);


//.........

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Applicant\'s Certification</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 177, $html, 0, 0, true, true, 'L', true);
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding

$pdf->SetFont('times', '', 10);
$html= '<div>Copies of any documents I have submitted are exact photocopies
of unaltered, original documents, and I understand that USCIS
may require that I submit original documents to USCIS at a later
date. Furthermore, I authorize the release of any information
from any and all of my records that USCIS may need to
determine my eligibility for the immigration benefit that I seek.</div>';
$pdf->writeHTMLCell(91, 7, 12, 185, $html, 0, 0, false, true, 'J', false);

$html= '<div>I understand that if I am a male who is 18 to 26 years of age,
submitting this application will automatically register me with
the Selective Service System as required by the Military
Selective Service Act.</div>';
$pdf->writeHTMLCell(91, 7, 12, 216, $html, 0, 0, false, true, 'J', false);

$html= '<div>I furthermore authorize release of information contained in this
application, in supporting documents, and in my USCIS
records, to other entities and persons where necessary for the
administration and enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(91, 7, 12, 235, $html, 0, 0, false, true, 'J', false);

//.........page 17 left end 


$html= '<div>I understand that USCIS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:</div>';
$pdf->writeHTMLCell(91, 7, 112, 17, $html, 0, 0, false, true, 'J', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1)   <b/></div>';
$pdf->writeHTMLCell(90, 7, 120, 37, $html, 0, 0, false, true, 'J', true);
$html= '<div>I reviewed and understood all of the information
contained in, and submitted with, my application;
and</div>';
$pdf->writeHTMLCell(75, 7, 130, 37, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>2)   <b/></div>';
$pdf->writeHTMLCell(90, 7, 120, 52, $html, 0, 0, false, true, 'J', true);
$html= '<div>All of this information was complete, true, and
correct at the time of filing.</div>';
$pdf->writeHTMLCell(75, 7, 130, 52, $html, 0, 0, false, true, 'J', true);
//.....

$html= '<div>I certify, under penalty of perjury, that all of the information in
my application and any document submitted with it were
provided or authorized by me, that I reviewed and understand
all of the information contained in, and submitted with, my
application and that all of this information is complete, true,
and correct.</div>';
$pdf->writeHTMLCell(92, 7, 112, 62, $html, 0, 0, false, true, 'J', false);

//.......

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b> Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(92, 7, 113, 90, $html, 0, 0, true, true, 'L', true);


$pdf->SetFont('times', '', 10);
$html= '<div><b>6.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 98, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(79, 7, 120, 98, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(78, 7, 125, 103, '', 1, 0, false, true, 'J', true);
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 117, 102, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>6.b.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 113, $html, 0, 0, false, true, 'J', true);
$html= '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(79, 7, 120, 113, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_date_of_signature', 34, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  170, 112.5);

//........


$pdf->SetFont('times', '', 10);
$html= '<div><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill
out this application or fail to submit required documents listed
in the Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(92, 7, 112, 124, $html, 0, 0, false, true, 'J', true);

//......

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 11. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(92, 7, 113, 142, $html, 1, 0, true, true, 'L', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(92, 7, 112, 155, $html, 0, 0, false, true, 'J', true);

//.....

$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(92, 7, 113, 165, $html, 0, 0, true, true, 'L', true);

//..........

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.a.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 175, $html, 0, 0, false, true, 'J', true);
$html= '<div>Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(79, 7, 120, 175, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_last_name', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 181);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.b.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, 0, 0, false, true, 'J', true);
$html= '<div> Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(79, 7, 120, 190, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_first_name', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 196);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>2.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 204, $html, 0, 0, false, true, 'J', true);
$html= '<div>Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(79, 7, 120, 204, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_organization_name', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  121, 210);

//........page 17 end 

$pdf->AddPage('P', 'LETTER'); //page number 18



$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();



$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 11. Interpreter\'s Contact Information,
Certification, and Signature </b> (continued) </div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);

//.......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 34, $html, 0, 0, true, true, 'L', true);


//...........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 12, 42, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_addres_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 45);

//..........
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.b.  </b>  <input type="checkbox" name="apt8" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste8" value="ste" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr8" value="flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 12, 54, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_addres_apt_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 54);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 63, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_city_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 63);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 12, 72, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="interpreter_mailing_addres_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 72, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 72);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 81, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 81);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 90, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_postalcode', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 90);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 97, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 103);

//......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 13, 112,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Interpreter\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 12, 120, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 125.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Interpreter\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 12, 133, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 138.5);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Interpreter\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 12, 146, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 151.5);


//......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 13, 160,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 11);
$html = '<div>I certify, under penalty of perjury, that:<br><br>
I am fluent in English and<br>
which is the same language specified in <b>Part 10., Item
Number 1.b.</b>, and I have read to this applicant in the identified
language every question and instruction on this application and
his or her answer to every question. The applicant informed me
that he or she understands every instruction, question, and
answer on the application, including the <b>Applicant\'s
Certification</b>, and has verified the accuracy of every answer.</div>';
$pdf->writeHTMLCell(92, 7, 12, 167, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certification', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 175);

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 220,  $html,  0, 1, true, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Interpreter\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 227, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 22, 233, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 242, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 242);


//.......page 18 left end 

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 12. Contact Information, Declaration, and
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
$pdf->TextField('preparer_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 55.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp; Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 63, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_given_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 68.5);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 112, 76, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 82);



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
$pdf->TextField('preparer_mailing_addres_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 100);

//..........
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.b.  </b>  <input type="checkbox" name="apt8" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste8" value="ste" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr8" value="flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 109, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_addres_apt_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 109);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_city_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 118);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 112, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_addres_state" size="0.25">';
 foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
  }
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 127);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 136, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 136);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 145, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_postalcode', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 145);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 151, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 157);

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
$pdf->TextField('preparers_contact_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 180);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Preparers\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 190, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 196);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Preparers\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 205, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 211);
//..........page 18 end 





$pdf->AddPage('P', 'LETTER'); //page number 19


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-270);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'R', 0, 0, 10, 139, false);// header angle
$pdf->StopTransform();





$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 12. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant  </b>  (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 13, 42,  $html,  0, 1, true, 'L');

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.a.   <b/><input type="checkbox" name="part12_7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 50, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am not an attorney or accredited representative but
have prepared this application on behalf of the
applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(79, 7, 24, 50, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.a.   <b/><input type="checkbox" name="part12_7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 65, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am an attorney or accredited representative and my
representation of the applicant in this case<br><input type="checkbox" name="a" value="Y" checked=" " />  extends <input type="checkbox" name="b" value="Y" checked=" " /> does not extend beyond the<br>
preparation of this application.</div>';
$pdf->writeHTMLCell(79, 7, 24, 65, $html, 0, 0, false, true, 'J', true);
//.........

$html= '<div><b>NOTE:</b> If you are an attorney or accredited
representative, you may be obliged to submit a
completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited
Representative, with this application.</div>';
$pdf->writeHTMLCell(79, 7, 24, 85, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 13, 110,  $html,  0, 1, true, 'L');

//......

$pdf->SetFont('times', '', 11);
$html= '<div>By my signature, I certify, under penalty of perjury, that I
prepared this application at the request of the applicant. The
applicant then reviewed this completed application and
informed me that he or she understands all of the information
contained in, and submitted with, his or her application,<br>
including the <b>Applicant\'s Certification,</b> and that all of this
information is complete, true, and correct. I completed this
application based only on information that the applicant
provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(88, 7, 12, 120, $html, 0, 0, false, true, 'J', true);

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 13, 175,  $html,  0, 1, true, 'L');


//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Preparer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 183, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 22, 189, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 198, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('Preparer_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 198);

//........page 19 left end 

$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->setFont('Times', 'B', 10);
$html= '<div>NOTE: Do not complete Part 13. until the USCIS  Officer
instructs you to do so at the interview.</div>';
$pdf->writeHTMLCell(92, 10, 112, 17, $html, 1, 0, false, true, 'J', true);

$pdf->setFont('Times', 'B', 12);
$html= '<div>Part 13. Signature at Interview</div>';
$pdf->writeHTMLCell(90, 7, 113, 32,  $html,  1, 1, true, 'L');

//........

$pdf->setFont('Times', '', 10);
$html= '<div>I swear (affirm) and certify under penalty of perjury under the
laws of the United States of America that I know that the<br>
contents of this Form I-485, Application to Register Permanent<br>
Residence or Adjust Status, subscribed by me, including the<br>
corrections made to this application, <b>numbered</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 42,  $html,  0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_13_numbered', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 60);

//.......

$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(1.6);
$html= '<div><b>through</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;,
are complete, true, and correct. All<br>
additional pages submitted by me with this Form I-485. <b>on
numbered pages &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
through</b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
are complete,<br>
true, and correct. All documents submitted at this interview
were provided by me and are complete, true, and correct.
Subscribed to and sworn to (affirmed) before me</div>';
$pdf->writeHTMLCell(92, 7, 112, 70,  $html,  0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_13_through', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 70);

$pdf->TextField('part_13_pages', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 139, 82);

$pdf->TextField('part_13_through2', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 82);
//........

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(92, 7, 112, 105, 'USCIS Officer\'s Printed Name or Stamp', 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 113, 112, '', 1, 1, false, 'L');

$pdf->writeHTMLCell(92, 7, 112, 125, 'Date of Signature (mm/dd/yyyy)', 0, 1, false, 'L');
$pdf->writeHTMLCell(40, 7, 163, 125, '', 1, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(92, 7, 112, 135, 'Applicant\'s Signature (sign in ink)', 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 113, 142, '', 1, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(92, 7, 112, 151, 'USCIS Officer\'s Signature (sign in ink)', 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 113, 158, '', 1, 1, false, 'L');

//...........page 19 end

$pdf->AddPage('P', 'LETTER'); //page number 20


$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(20, 5, 120, 3, 'A-Number', 0, 1, false, true, 'C', false);
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(60, 7, 120, 2, 'A-', 0, 1, false, false, 'C', true);
$pdf->writeHTMLCell(51, 7, 153, 3, '', 1, 1, false, true, 'C', true);
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
$pdf->writeHTMLCell(60, 7, 45, 63, '', 1, 0, false, 'L');
//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 71, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 73, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 81, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 82, '', 1, 0, false, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 91, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 60, 91, '', 1, 0, false, 'L');
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
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 107.5);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 107.5);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 102, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 107.5);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 116, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 20, 116, $html, 0, 0, false, 'L');

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

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 20, 197, $html, 0, 0, false, 'L');

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

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_5d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 32, $html, 0, 0, false, 'L');

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

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 114, $html, 0, 0, false, 'L');

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

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 119, 198, $html, 0, 0, false, 'L');







$js = "
var fields = {
    'volga_number':' ',
    'attorney_statebar_number':' ',
    'attorney_uscis_online_number':' ',
    'a_number':' ',

    'your_current_legal_lastname':' ',
    'your_current_legal_firstname':' ',
    'your_current_legal_middlename':' ',

    'other_name_you_have2_lastname':' ',
    'other_name_you_have2_firstname':' ',
    'other_name_you_have2_middlename':' ',

    'other_name_you_have3_lastname':' ',
    'other_name_you_have3_firstname':' ',
    'other_name_you_have3_middlename':' ',

    'other_name_you_have4_lastname':' ',
    'other_name_you_have4_firstname':' ',
    'other_name_you_have4_middlename':' ',

    'other_information_you_date_of_birth':' ',
    'other_information_city_town_of_birth':' ',
    'information_about_you_country_birth':' ',
    'information_about_you_citizen_nationality':' ',
    'information_about_you_alien_number':' ',
    'information_about_you_online_account_number':' ',
    'information_about_you_us_social_number':' ',
    'information_about_you_us_mail_in_care_name':' ',
    'information_about_you_us_mail_street':' ',
    'information_about_you_us_mail_apt_ste_flr':' ',
    'information_about_you_us_mail_city_town':' ',
    'information_about_you_us_mail_state':' ',
    'information_about_you_us_mail_state':' ',
    'information_about_you_us_mail_zipcode':' ',

    'alternate_mailing_care_of_name':' ',
    'alternate_mailing_street_number_name':' ',
    'alternate_mailing_apt_ste_flr':' ',
    'alternate_mailing_city_town':' ',
    'alternate_mailing_state':' ',
    'alternate_mailing_zipcode':' ',

    'recent_immigration_pasport_number':' ',
    'recent_immigration_travel_number':' ',
    'recent_immigration_pasport_expire_date':' ',
    'recent_immigration_country_issue_pasport':' ',
    'recent_immigration_nonimmigrant_number':' ',
    'recent_immigration_city_town':' ',
    'recent_immigration_state':' ',
    'recent_immigration_date_last_arrive':' ',
    'recent_immigration_other':' ',
    'recent_immigration_arival_record_number':' ',
    'recent_immigration_pasport_expire_date_authorized':' ',
    'recent_immigration_status_on_form_I94':' ',
    'recent_immigration_status_on_current_immigration':' ',

    'information_you_exactly_lastname':' ',
    'information_you_exactly_firstname':' ',
    'information_you_exactly_middlename':' ',
    'information_you_receipt_number_underliying':' ',
    'information_you_priority_date':' ',

    'principal_applicant_lastname':' ',
    'principal_applicant_firstname':' ',
    'principal_applicant_middlename':' ',
    'principal_applicant_a_number':' ',
    'principal_applicant_date_of_birth':' ',
    'principal_applicant_receipt_number':' ',
    'principal_applicant_priority_date':' ',

    'additional_info_location_city':' ',
    'additional_info_location_country':' ',
    'additional_info_decision':' ',
    'aditional_info_address_street':' ',
    'aditional_info_address_apt_ste_flr':' ',
    'aditional_info_address_city_or_town':' ',
    'aditional_info_address_state':' ',
    'aditional_info_address_zip_code':' ',
    'aditional_info_address_province':' ',
    'aditional_info_address_postal_code':' ',
    'aditional_info_address_country':' ',
    'aditional_info_address_date_from':' ',
    'aditional_info_address_date_to':' ',

    'aditional_info_address2_street':' ',
    'aditional_info_address2_apt_ste_flr':' ',
    'aditional_info_address2_city_or_town':' ',
    'aditional_info_address2_state':' ',
    'aditional_info_address2_zip_code':' ',
    'aditional_info_address2_province':' ',
    'aditional_info_address2_postal_code':' ',
    'aditional_info_address2_country':' ',
    'aditional_info_address2_date_from':' ',
    'aditional_info_address2_date_to':' ',

    'aditional_info_address3_street':' ',
    'aditional_info_address3_apt_ste_flr':' ',
    'aditional_info_address3_city_or_town':' ',
    'aditional_info_address3_state':' ',
    'aditional_info_address3_zip_code':' ',
    'aditional_info_address3_province':' ',
    'aditional_info_address3_postal_code':' ',
    'aditional_info_address3_country':' ',
    'aditional_info_address3_date_from':' ',
    'aditional_info_address3_date_to':' ',
    
    'aditional_info_employement_company':' ',
    'aditional_info_employer_street':' ',
    'aditional_info_employer_apt_ste_flr':' ',
    'aditional_info_employer_city_or_town':' ',
    'aditional_info_employer_state':' ',
    'aditional_info_employer_zip_code':' ',
    'aditional_info_employer_province':' ',
    'aditional_info_employer_postal_code':' ',
    'aditional_info_employer_country':' ',
    'aditional_info_employer_country':' ',
    'aditional_info_employer_date_from':' ',
    'aditional_info_employer_date_to':' ',
    'aditional_info_employer_occupation':' ',

    'aditional_info_employer2_company':' ',
    'aditional_info_employer2_street':' ',
    'aditional_info_employer2_apt_ste_flr':' ',
    'aditional_info_employer2_city_or_town':' ',
    'aditional_info_employer2_state':' ',
    'aditional_info_employer2_zip_code':' ',
    'aditional_info_employer2_province':' ',
    'aditional_info_employer2_postal_code':' ',
    'aditional_info_employer2_country':' ',
    'aditional_info_employer2_country':' ',
    'aditional_info_employer2_date_from':' ',
    'aditional_info_employer2_date_to':' ',
    'aditional_info_employer2_occupation':' ',

    'aditional_info_employer3_company':' ',
    'aditional_info_employer3_street':' ',
    'aditional_info_employer3_apt_ste_flr':' ',
    'aditional_info_employer3_city_or_town':' ',
    'aditional_info_employer3_state':' ',
    'aditional_info_employer3_zip_code':' ',
    'aditional_info_employer3_province':' ',
    'aditional_info_employer3_postal_code':' ',
    'aditional_info_employer3_country':' ',
    'aditional_info_employer3_country':' ',
    'aditional_info_employer3_date_from':' ',
    'aditional_info_employer3_date_to':' ',
    'aditional_info_employer3_occupation':' ',

    'information_parent1_lastname':' ',
    'information_parent1_firstname':' ',
    'information_parent1_middlename':' ',
    'information_parent1_lastname_at_birth':' ',
    'information_parent1_firstname_at_birth':' ',
    'information_parent1_middlename_at_birth':' ',
    'information_parent1_date_of_birth':' ',
    'information_parent1_city_of_birth':' ',
    'information_parent1_country_of_birth':' ',
    'information_parent1_current_city_of_resident':' ',
    'information_parent1_current_country_of_resident':' ',

    'information_parent2_lastname':' ',
    'information_parent2_firstname':' ',
    'information_parent2_middlename':' ',
    'information_parent2_lastname_at_birth':' ',
    'information_parent2_firstname_at_birth':' ',
    'information_parent2_middlename_at_birth':' ',
    'information_parent2_date_of_birth':' ',
    'information_parent2_city_of_birth':' ',
    'information_parent2_country_of_birth':' ',
    'information_parent2_current_city_of_resident':' ',
    'information_parent2_current_country_of_resident':' ',

    'how_many_times_married':' ',
    'current_mariage_spouse_lastname':' ',
    'current_mariage_spouse_firstname':' ',
    'current_mariage_spouse_middlename':' ',
    'current_mariage_spouse_a_number':' ',
    'current_mariage_spouse_date_of_birth':' ',
    'current_mariage_spouse_date_of_marriage':' ',
    'current_mariage_spouse_birth_city_town':' ',
    'current_mariage_spouse_birth_state':' ',
    'current_mariage_spouse_birth_country':' ',
    'place_of_mariage_current_spouse_city_or_town':' ',
    'place_of_mariage_current_spouse_province':' ',
    'place_of_mariage_current_spouse_country':' ',

    'information_prior_marriage_lastname':' ',
    'information_prior_marriage_firstname':' ',
    'information_prior_marriage_middlename':' ',
    'prior_spouse_date_of_marriage':' ',
    'prior_spouse_date_of_birth':' ',
    'place_of_mariage_prior_spouse_city_town':' ',
    'place_of_mariage_prior_spouse_state_province':' ',
    'place_of_mariage_prior_spouse_country':' ',
    'legally_ended_date_of_prior_spouse_marriage':' ',
    'place_of_spouse_prior_marriage_ended_city_town':' ',
    'place_of_spouse_prior_marriage_ended_state_province':' ',
    'place_of_spouse_prior_marriage_ended_country':' ',

    'total_number_of_children':' ',
    'information_children1_lastname':' ',
    'information_children1_firstname':' ',
    'information_children1_middlename':' ',
    'information_children1_a_number':' ',
    'information_children1_date_of_birth':' ',
    'information_children1_country_of_birth':' ',

    'information_children2_lastname':' ',
    'information_children2_firstname':' ',
    'information_children2_middlename':' ',
    'information_children2_a_number':' ',
    'information_children2_date_of_birth':' ',
    'information_children2_country_of_birth':' ',

    'information_children3_lastname':' ',
    'information_children3_firstname':' ',
    'information_children3_middlename':' ',
    'information_children3_a_number':' ',
    'information_children3_date_of_birth':' ',
    'information_children3_country_of_birth':' ',

    'biographic_info_feet':' ',
    'biographic_info_inches':' ',
    'biographic_info_pound1':' ',
    'biographic_info_pound2':' ',
    'biographic_info_pound3':' ',

    'organization1_name_of_org':' ',
    'organization1_city_or_town':' ',
    'organization1_state_or_province':' ',
    'organization1_counrty':' ',
    'organization1_nature_of_group':' ',
    'organization1_date_from':' ',
    'organization1_date_to':' ',

    'organization2_name_of_org':' ',
    'organization2_city_or_town':' ',
    'organization2_state_or_province':' ',
    'organization2_counrty':' ',
    'organization2_nature_of_group':' ',
    'organization2_date_from':' ',
    'organization2_date_to':' ',

    'organization3_name_of_org':' ',
    'organization3_city_or_town':' ',
    'organization3_state_or_province':' ',
    'organization3_counrty':' ',
    'organization3_nature_of_group':' ',
    'organization3_date_from':' ',
    'organization3_date_to':' ',

    'applicants_contact_telephone':' ',
    'applicants_contact_mobile':' ',
    'applicants_contact_email':' ',
    'applicants_date_of_signature':' ',

    'interpreter_family_last_name':' ',
    'interpreter_family_first_name':' ',
    'interpreter_family_organization_name':' ',

    'interpreter_mailing_addres_street':' ',
    'interpreter_mailing_addres_apt_ste_flr':' ',
    'interpreter_mailing_addres_city_town':' ',
    'interpreter_mailing_addres_state':' ',
    'interpreter_mailing_addres_zipcode':' ',
    'interpreter_mailing_addres_province':' ',
    'interpreter_mailing_addres_postalcode':' ',
    'interpreter_mailing_addres_country':' ',
    'interpreter_contact_daytime_telephone':' ',
    'interpreter_contact_mobile_telephone':' ',
    'interpreter_contact_email':' ',
    'interpreter_certification':' ',
    'interpreter_signature_date':' ',
    'preparer_family_last_name':' ',
    'preparer_family_given_name':' ',
    'preparer_family_business_name':' ',

    'preparer_mailing_addres_street':' ',
    'preparer_mailing_addres_apt_ste_flr':' ',
    'preparer_mailing_addres_city_town':' ',
    'preparer_mailing_addres_state':' ',
    'preparer_mailing_addres_zipcode':' ',
    'preparer_mailing_addres_province':' ',
    'preparer_mailing_addres_postalcode':' ',
    'preparer_mailing_addres_country':' ',

    'preparers_contact_daytime_telephone':' ',
    'preparers_contact_mobile_telephone':' ',
    'preparers_contact_email':' ',
    'Preparer_signature_date':' ',

    'part_13_numbered':' ',
    'part_13_through':' ',
    'part_13_through2':' ',
    'part_13_pages':' ',
    
    'additional_information_3a':' ',
    'additional_information_3b':' ',
    'additional_information_3c':' ',
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







