<?php

require_once('formheader.php');   //database connection file 

/* require_once("config.php");
$allDataCountry = indexByQueryAllData("SELECT * FROM countries");
 */
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
		$this->Cell(40, 6, "Form N-600  02/13/17   N", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = 'barcode_1.jpg';
		// )
        $this->Image($barcode_image, 65, 265, 95, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417
		
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
$pdf->SetTitle('N-600');

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
$pdf->AddPage('P', 'LETTER'); //page number 1

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
$pdf->Image($logo, 12, 7, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(100, 7, "Application for Certificate of Citizenship", 0, 'C', 0, 1, 56, 8, true);

$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm N-600", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0057\nExpires 12/31/2018", 0, 'C', 0, 1, 169, 18.5, true);
$pdf->Ln(1.3);

$top_border = array(
   'T' => array('width' => 2, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'square'),
);
$pdf->Cell(188.5, 0, '', $top_border, 1, 1);


$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetLineWidth(0.1); // set border width
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255); // set filling color
$pdf->setCellHeightRatio(1); // set cell height ratio
$pdf->MultiCell(0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C');

// $pdf->Ln(1);
// set filling color
$pdf->SetLineWidth(0.4); // set border width
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->setCellPaddings(0, 4, 0, 4); // set cell padding
$pdf->setCellHeightRatio(1.2);
$pdf->MultiCell(13, 26, "For\nUSCIS\nUse\nOnly", 'LTB', 'C', 1, 1, 12.8, 32.5, true);

$pdf->SetFont('times', 'B', 9); // set font
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(35, 26, "Date Stamp", 'LTB', 'C', 1, 1, 25.7, 32.5, true);
$pdf->MultiCell(74, 26, "Receipt", 'LTB', 'C', 1, 1, 59.7, 32.5, true);
$pdf->MultiCell(69, 26, "Action Block", 'LTB', 'C', 1, 1, 133, 32.5, true);
$pdf->MultiCell(3, 26, "", 'TRB', 'C', 1, 1, 200, 32.5, true);

$pdf->setCellPaddings(1, 0, 0, 0); // set cell padding
$pdf->MultiCell(190.25, 10, "Remarks", 'LRB', 'L', 1, 1, 12.75, 58.7, true);

$pdf->Ln(1.5);

$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(0, 0, 0, 0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$html = '<div><b>START HERE - Type or print in black ink.</b></div>';

// output the HTML content

$pdf->writeHTMLCell(91, 7, 17, 91, $html, 0, 0, true, false, 'L', false);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 26, 136, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 146, 75, false); // angle 2
$pdf->StopTransform();

//..........

// table 2 start 
$pdf->SetFillColor(220,220,220);
$pdf->writeHTMLCell(190, 18, 13, 72, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(1, 18, 56, 72, '',  'R',  1, false, true, 'L', false);
$html ="<div><b>To be completed by an attorney or accredited representative </b>(if any).</div>";
$pdf->writeHTMLCell(43.2, 17.3, 13.4, 72.2, $html, 0, 1, true, true, 'C', true);
//..........

$pdf->SetFont('times', 'B', 11);
$html ='<div> <input type="checkbox" name="agree" value="1" checked=" " />  Select this box if Form G-28 is <br> attached.</div>';
$pdf->writeHTMLCell(40, 18, 53, 72, $html, 'R', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b><br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 18, 93, 72, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),94, 81);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 140, 72, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 60, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),140, 81);

//....table 2 end .........
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b> Part 1. Information About Your Eligibility</b></div>';
$pdf->writeHTMLCell(132, 7, 13, 97, $html, 1, 1, true, false, 'J', true);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(80, 15, "Enter Your 9 Digit A-Number:", 0, 'C', 0, 1, 130, 93, true);
$pdf->MultiCell(80, 15, "A-", 0, 'C', 0, 1, 113, 99, true);
$pdf->TextField('9_digit_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 98);

//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.  </b>This application is being filed based on the fact that: (Select <b>only one</b> box)  </div>';
$pdf->writeHTMLCell(180, 7, 12, 105, $html, 0, 1, false, false, 'J', true);

$html ='<div> <input type="checkbox" name="application" value="Y" checked=" " /> I am a BIOLOGICAL child of a U.S. citizen parent.  &nbsp; &nbsp; <input type="checkbox" name="application1" value="Y" checked=" " />   I am an ADOPTED child of a U.S. citizen parent.</div>';
$pdf->writeHTMLCell(180, 7, 15, 110, $html, 0, 1, false, true, 'J', true);

$html ='<div> <input type="checkbox" name="application2" value="Y" checked=" " />  Other (Explain fully):</div>';
$pdf->writeHTMLCell(180, 7, 15, 117, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(150, 7, 53, 116, "", 1, 1, false, true, 'J', true);
//.....
$html ='<div><b>NOTE:</b> If you need extra space to complete this section, use the space provided in<b> Part 11. Additional Information.</b> </div>';
$pdf->writeHTMLCell(180, 7, 17, 125, $html, 0, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b> Part 2.Information About You</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 132, $html, 1, 1, true, false, 'J', true);
//.....
$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>NOTE:</b> Provide information about yourself if you are a person applying for the Certificate of Citizenship. <b>Provide information
about your child</b> if you are a U.S. citizen parent applying for a Certificate of Citizenship for your minor child.</div>';
$pdf->writeHTMLCell(180, 7, 13, 140, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(1.1);
$html = '&nbsp;<b>1.</b> &nbsp;&nbsp;&nbsp;Your Current Legal Name (<b>do not</b> provide a nickname)';
$pdf->writeHTML($html, true, false, true, false, ''); // output the HTML content

$pdf->Ln(1.1);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 22, 155, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 154, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 154, $html, 0, 0, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_legal_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 160);
$pdf->TextField('about_you_legal_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 160);
$pdf->TextField('about_you_legal_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 160);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp;Your Name Exactly As It Appears on Your Permanent Resident Card (if applicable)';
$pdf->writeHTMLCell(180, 7, 12, 168, $html, 0, 0, false, false, 'L', true);

$pdf->Ln(1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 22, 171, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 171, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 171, $html, 0, 0, false, false, 'L', true);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_exact_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 177);
$pdf->TextField('about_you_exact_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 177);
$pdf->TextField('about_you_exact_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 177);
//...........


$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. </b>  Other Names You Have Used Since Birth <br> &nbsp;&nbsp;&nbsp; Provide all other names you have ever used, include nicknames, maiden name, and aliases.';
$pdf->writeHTMLCell(170, 7, 12, 185, $html, 0, 0, false, false, 'L', true);


$pdf->Ln(1.1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 21, 192, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 97, 192, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 192, $html, 0, 0, true, false, 'L', true);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_since_birth_last_name1', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 198);
$pdf->TextField('about_you_since_birth_first_name1', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 198);
$pdf->TextField('about_you_since_birth_middle_name1', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 198);

$pdf->TextField('about_you_since_birth_last_name2', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 204.7);
$pdf->TextField('about_you_since_birth_first_name2', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 204.7);
$pdf->TextField('about_you_since_birth_middle_name2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 204.7);

//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. </b> U.S. Social Security Number (if any)';
$pdf->writeHTMLCell(80, 7, 12, 213, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_us_cocial_security_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 217);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. </b> USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(80, 7, 90, 213, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_us_online_account_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 102, 217);
//.......

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 211, 8, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 211, 87, false); // angle 2
$pdf->StopTransform();
//.......


//.........
$pdf->SetFont('times', '', 10); // set font
$html = '<b>6.  </b>  Date of Birth(mm/dd/yyyy)';
$pdf->writeHTMLCell(80, 7, 12, 226, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_date_of_birth', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 230);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>7.  </b>   Country of birth';
$pdf->writeHTMLCell(80, 7, 90, 226, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_country_of_birth', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 95, 230);
//.......

$pdf->SetFont('times', '', 10); // set font
$html = '<b>8.  </b>  Country of Prior Citizenship or Nationality';
$pdf->writeHTMLCell(80, 7, 12, 242, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('about_you_country_of_prior_citizenship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 246);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>9.  </b>   Gender ';
$pdf->writeHTMLCell(80, 7, 110, 242, $html, 0, 0, false, false, 'L', true);

$html ='<input type="checkbox" name="gender" value="male" checked="" /> Male 
<input type="checkbox" name="gender" value="female" checked="" /> Female';
$pdf->writeHTMLCell(50, 7, 115, 246, $html, 0, 1, false, true, 'J', 0);

//....... page number one end ---------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER'); //page number 2
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 2.Information About You</b>(continued)</div>';
$pdf->writeHTMLCell(130, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//.....

$pdf->setFont('Times', '', 10);
$html= '<div><b>10. </b> Mailing Address </div>';
$pdf->writeHTMLCell(110, 7, 12, 25, $html, 0, 1, false, 'L');
$html= '<div>In Care Of Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 18, 30, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_in_care_of', 186, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 34);


$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 18, 42, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 46);
$pdf->setFont('Times', '', 10);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 42, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 47, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 47, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 47, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 47, '', 1, 1, false, 'L');
//.................

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 18, 54, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 54, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 168, 54, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 58, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_city_town', 110, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 58);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_10_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 58, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_zipcode', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 58);

$pdf->TextField('part2_information_about_you_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 58);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html= '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 18, 66, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 70);
//.............
$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 66, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 70);

//.....................
$pdf->setFont('Times', '', 10);
$html= '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 66, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_you_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 70);

//.......................
$pdf->setFont('Times', '', 10);
$html= '<div><b>11. </b> Physical Address</div>';
$pdf->writeHTMLCell(110, 7, 12, 79, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name (Do <b>not</b> provide a PO Box in this space unless it is your <b>ONLY</b> address.)</div>';
$pdf->writeHTMLCell(150, 7, 18, 84, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part2_physical_address_street_number', 140, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 88);
$pdf->setFont('Times', '', 10);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 160, 84, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt1" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 160, 88, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste1" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 170, 88, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr1" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 180, 88, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 88, '', 1, 1, false, 'L');
//.................

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 18, 96, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 96, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 168, 96, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 100, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_physical_city_town', 110, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 100);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_11_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 100, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_zipcode', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 100);

$pdf->TextField('part2_information_about_physical_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 100);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html= '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 18, 109, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 113);
//.............
$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 75, 109, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 113);

//.....................
$pdf->setFont('Times', '', 10);
$html= '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 109, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_about_physical_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 113);

//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>12. </b> Current Marital Status</div>';
$pdf->writeHTMLCell(110, 7, 12, 122, $html, 0, 1, false, 'L');

$html ='&nbsp;  &nbsp;    <input type="checkbox" name="single" value="single" checked="" /> Single,Never Married
   
   &nbsp;   &nbsp;   <input type="checkbox" name="married" value="married" checked="" /> Married

   &nbsp;   &nbsp;   <input type="checkbox" name="divorced" value="divorced" checked="" /> Divorced

   &nbsp;   &nbsp;   <input type="checkbox" name="widowed" value="widowed" checked="" /> Widowed

   &nbsp;   &nbsp;   <input type="checkbox" name="separated" value="separated" checked="" /> Separated

   &nbsp;   &nbsp;   <input type="checkbox" name="marriage" value="marriage" checked="" /> Marriage

   &nbsp;   &nbsp;   <input type="checkbox" name="annulled" value="annulled" checked="" /> Annulled';       

$pdf->writeHTMLCell(190, 7, 15, 127, $html, 0, 1, false, true, 'J');
$html ='<div> <input type="checkbox" name="other" value="Y" checked=" " />  Other (Explain fully):</div>';
$pdf->writeHTMLCell(180, 7, 17, 133, $html, 0, 1, false, true, 'J');
$pdf->writeHTMLCell(147, 7, 55, 132, "", 1, 1, false, true, 'J', true);
//.....
$html= '<div><b>13. </b> U.S. Armed Forces </div>';
$pdf->writeHTMLCell(110, 7, 12, 140, $html, 0, 1, false, 'L');
$html ='<div>Are you a member or veteran of any branch of the U.S. Armed Forces?</div>';
$pdf->writeHTMLCell(180, 7, 18, 145, $html, 0, 1, false, true, 'J');
$html ='<div><input type="checkbox" name="us_army" value="Y" checked=" " />  Yes   <input type="checkbox" name="us_army" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(180, 7, 170, 145, $html, 0, 1, false, true, 'J');
//..........

$html= '<div><b>14. </b> Information About Your Admission into the United States and Current Immigration Status </div>';
$pdf->writeHTMLCell(170, 7, 12, 152, $html, 0, 1, false, 'L');
$html= '<div><b>A.  </b>   I arrived in the following manner <br>&nbsp; &nbsp;&nbsp; &nbsp; Port-of-Entry</div>';
$pdf->writeHTMLCell(100, 7, 19, 157, $html, 0, 1, false, 'L');
//.......
$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 167, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 92, 167, $html, 0, 1, false, 'L');

$html= '<div> Date of Entry (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 120, 167, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_proentry_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 171);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_proentry_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 92, 172, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_proentry_date_of_entry', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 171);
//.......
$pdf->setFont('Times', '', 10);
$html= '<div>Exact Name Used at Time of Entry</div>';
$pdf->writeHTMLCell(80, 7, 25, 180, $html, 0, 1, false, 'L');

//........

$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 25, 186, $html, 0, 1, false, 'L');

$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(80, 7, 92, 186, $html, 0, 1, false, 'L');

$html= '<div>Middle Name</div>';
$pdf->writeHTMLCell(80, 7, 150, 186, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_admission_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 190);

$pdf->TextField('part2_information_admission_firstname', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 190);

$pdf->TextField('part2_information_admission_middlename', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 190);

//........
$pdf->setFont('Times', '', 10);
$html='<div><b>B.  </b> I used the following travel document to be admitted to the United States</div>';
$pdf->writeHTMLCell(170, 7, 19, 198, $html, 0, 1, false, 'L');

$html='<div><input type="checkbox" name="passport" value="passport" checked=" " />  Passport</div>';
$pdf->writeHTMLCell(100, 7, 25, 203, $html, 0, 1, false, 'L');

$html='<div><input type="checkbox" name="travel" value="travel" checked=" " />  Travel Document</div>';
$pdf->writeHTMLCell(100, 7, 80, 203, $html, 0, 1, false, 'L');
//.........

$html= '<div>Passport Number</div>';
$pdf->writeHTMLCell(80, 7, 25, 208, $html, 0, 1, false, 'L');
$html= '<div>Travel Document Number</div>';
$pdf->writeHTMLCell(80, 7, 84, 208, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_passport_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 212);

$pdf->TextField('part2_information_travel_document_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 212);
//..........

$pdf->setFont('Times', '', 10);
$html= '<div>Country of Issuance for Passport or<br>
Travel Document</div>';
$pdf->writeHTMLCell(80, 7, 25, 222, $html, 0, 1, false, 'L');
$html= '<div>Date Passport or Travel Document<br>
Issued (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 100, 222, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_country_issue_passport', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 231);

$pdf->TextField('part2_information_date_issue_passport', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 100, 231);


//..........page number 2 end ----------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER'); //page number 3
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 2.Information About You</b>(continued)</div>';
$pdf->writeHTMLCell(130, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//.....
$pdf->setFont('Times', '', 10);
$html='<div><b>C.  </b> I am </div>';
$pdf->writeHTMLCell(170, 7, 19, 27, $html, 0, 1, false, 'L');

//..............

$html ='&nbsp; &nbsp;<input type="checkbox" name="lawful" value="lawful" checked="" /> A Lawful Permanent Resident (LPR) 
&nbsp;   &nbsp;   <input type="checkbox" name="nominigrant" value="nominigrant" checked="" /> A Nonimmigrant 
&nbsp;   &nbsp;   <input type="checkbox" name="refugee" value="refugee" checked="" /> A Refugee/ Asylee';     
$pdf->writeHTMLCell(190, 7, 22, 32, $html, 0, 1, false, true, 'J');

$html ='<div> <input type="checkbox" name="other2" value="Y" checked=" " />  Other (Explain fully):</div>';
$pdf->writeHTMLCell(180, 7, 24, 38, $html, 0, 1, false, true, 'J');
$pdf->writeHTMLCell(142, 7, 62, 37, "", 1, 1, false, true, 'J', true);
//.....
$html ='<div><b>NOTE:</b> If you select "Other" and you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(175, 7, 24, 45, $html, 0, 1, false, true, 'J');
//.......

$pdf->setFont('Times', '', 10);
$html='<div><b>D.  </b> I obtained LPR status through adjustment of status in the United States or admission as a LPR (if applicable)</div>';
$pdf->writeHTMLCell(175, 7, 19, 55, $html, 0, 1, false, 'L');
//.........

$pdf->setFont('Times', '', 10);
$html= '<div>Date I became a LPR<br>
 (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 25, 60, $html, 0, 1, false, 'L');
$html='<div> U.S. Citizenship and Immigration Services (USCIS) Office That Granted My LPR<br>
 Status or Location Where I Was Admitted</div>';
$pdf->writeHTMLCell(120, 7, 80, 60, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_became_lpr', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 68);

$pdf->TextField('part2_information_location_where_admited', 122, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 68);

//...........

$pdf->setFont('Times', '', 10);
$html= '<div><b>15. </b> Have you previously applied for a Certificate of Citizenship or U.S. Passport?</div>';
$pdf->writeHTMLCell(170, 7, 12, 77, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="pre_applyed" value="Y" checked=" " />   Yes    <input type="checkbox" name="pre_applyed" value="N" checked=" " />   No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 77, $html, 0, 1, false, true, 'J');
//..........

$html='<div>If you answered "Yes" to <b>Item Number 15.</b>, provide an explanation below. If you need extra space to complete this section, use he space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(175, 7, 19, 83, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(183, 7, 19, 92, "", 1, 1, false, 'L');
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>16. </b> Have you ever abandoned or lost your LPR status? </div>';
$pdf->writeHTMLCell(170, 7, 12, 102, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="abandoned" value="Y" checked=" " />   Yes   <input type="checkbox" name="abandoned" value="N" checked=" " />   No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 102, $html, 0, 1, false, true, 'J');
//..........

$html='<div>If you answered "Yes" to <b>Item Number 16.</b>, provide an explanation below. If you need extra space to complete this section, use
he space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(175, 7, 19, 107, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(183, 7, 19, 116, "", 1, 1, false, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>17. </b> Were you adopted? </div>';
$pdf->writeHTMLCell(170, 7, 12, 125, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="adopted" value="Y" checked=" " />   Yes   <input type="checkbox" name="adopted" value="N" checked=" " />   No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 125, $html, 0, 1, false, true, 'J');

$html='<div>If you answered "Yes" to <b>Item Number 17.</b>, complete <b>Items A. - D.</b></div>';
$pdf->writeHTMLCell(175, 7, 19, 130, $html, 0, 1, false, 'L');
//..........
$html= '<div><b>A.  </b> Place of Final Adoption </div>';
$pdf->writeHTMLCell(100, 7, 19, 135, $html, 0, 1, false, 'L');
//.......
$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 140, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 92, 140, $html, 0, 1, false, 'L');

$html= '<div> Country </div>';
$pdf->writeHTMLCell(80, 7, 120, 140, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_adoption_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 144);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_adoption_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 92, 144, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_adoption_country', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 144);

//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>B.</b> Date of Adoption <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 152, $html, 0, 1, false, 'L');

$html= '<div><b>C.</b> Date Legal Custody Began  <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 87, 152, $html, 0, 1, false, 'L');

$html= '<div><b>D. </b>Date Physical Custody Began <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 145, 152, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_adoption', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 160);

$pdf->TextField('part2_information_date_custody_began', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 160);

$pdf->TextField('part2_information_date_physical_custody_began', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 160);

//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>18. </b> Did you have to be re-adopted in the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 170, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="re_adopted" value="Y" checked=" " />   Yes   <input type="checkbox" name="re_adopted" value="N" checked=" " />   No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 170, $html, 0, 1, false, true, 'J');

$html='<div>If you answered "Yes" to <b>Item Number 18.</b>, complete <b>Items A. - D.</b></div>';
$pdf->writeHTMLCell(175, 7, 19, 175, $html, 0, 1, false, 'L');
//..........
$html= '<div><b>A.  </b> Place of Final Adoption </div>';
$pdf->writeHTMLCell(100, 7, 19, 180, $html, 0, 1, false, 'L');
//..........
$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 185, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 92, 185, $html, 0, 1, false, 'L');

$html= '<div> Country </div>';
$pdf->writeHTMLCell(80, 7, 120, 185, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_re_adoption_city_town', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 190);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_re_adoption_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 92, 190, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_re_adoption_country', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 190);

//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>B.</b> Date of Adoption <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 199, $html, 0, 1, false, 'L');

$html= '<div><b>C.</b> Date Legal Custody Began  <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 87, 199, $html, 0, 1, false, 'L');

$html= '<div><b>D. </b>Date Physical Custody Began <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 145, 199, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_re_adoption', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 207);

$pdf->TextField('part2_information_date_re_adoption_custody_began', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 207);

$pdf->TextField('part2_information_date_physicalre_adoption_custody_began', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 207);

//.......



$pdf->setFont('Times', '', 10);
$html= '<div><b>19. </b> Were your parents married to each other when you were born (or adopted)?</div>';
$pdf->writeHTMLCell(170, 7, 12, 220, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="parent_married" value="Y" checked=" " />   Yes   <input type="checkbox" name="parent_married" value="N" checked=" " />   No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 220, $html, 0, 1, false, true, 'J');

//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>20. </b> Did your parents marry after you were born?</div>';
$pdf->writeHTMLCell(170, 7, 12, 230, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="you_born" value="Y" checked=" " />   Yes   <input type="checkbox" name="you_born" value="N" checked=" " />   No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 230, $html, 0, 1, false, true, 'J');

//.............


$pdf->setFont('Times', '', 10);
$html= '<div><b>21. </b> Do you regularly reside in the United States in the legal and physical custody of your U.S. citizen parents?</div>';
$pdf->writeHTMLCell(170, 7, 12, 240, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="regularly_reside" value="Y" checked=" " />    Yes   <input type="checkbox" name="regularly_reside" value="N" checked=" " />    No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 240, $html, 0, 1, false, true, 'J');


//......page number 3 end --------------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 4
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 2.Information About You</b>(continued)</div>';
$pdf->writeHTMLCell(130, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>22. </b>  Have you been absent from the United States since you first arrived?</div>';
$pdf->writeHTMLCell(170, 7, 12, 27, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="absent" value="Y" checked=" " />    Yes   <input type="checkbox" name="absent" value="N" checked=" " />    No  </div>';
$pdf->writeHTMLCell(80, 7, 170, 27, $html, 0, 1, false, true, 'J');

$pdf->setFont('Times', '', 10);
$html= '<div>Complete the following information <b>only if you are claiming U.S. citizenship at the time of birth if you were born before
October 10. 1952.</b> If you need extra space to complete this section, use the space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(182, 7, 19, 34, $html, 0, 1, false, 'L');
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>A.</b> Date You Left the United States <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 43, $html, 0, 1, false, 'L');

$html= '<div><b>B.</b> Date You Returned to the <br> &nbsp; &nbsp;
United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 87, 43, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_left_unitedstates', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 51);

$pdf->TextField('part2_information_date_return_unitedstates', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 51);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>C.</b>  Place of Entry Upon Return to the United States</div>';
$pdf->writeHTMLCell(80, 7, 20, 60, $html, 0, 1, false, 'L');

//..........
$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 65, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 102, 65, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_place_of_entry_return', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 70);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_place_of_entry_return_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 102, 70, $html, '', 0, 0, true, 'L');
//..........
$pdf->SetFont('times', '', 10);
$html= '<div><b>D.</b> Date You Left the United States <br> &nbsp; &nbsp;
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 80, $html, 0, 1, false, 'L');

$html= '<div><b>E.</b> Date You Returned to the <br> &nbsp; &nbsp;
United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 87, 80, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_date_left_unitedstates2', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 88);

$pdf->TextField('part2_information_date_return_unitedstates2', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 88);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>F.</b>  Place of Entry Upon Return to the United States</div>';
$pdf->writeHTMLCell(80, 7, 20, 98, $html, 0, 1, false, 'L');

//..........
$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 25, 104, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 102, 104, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_information_place_of_entry_return2', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 108);

$pdf->setFont('Times', '', 10);
$html = '<select name="part2_place_of_entry_return_state2" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 102, 108, $html, '', 0, 0, true, 'L');
//..............

$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 3.Biographic Information </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 120, $html, 1, 1, true, false, 'J', true);

//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.    </b>     Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 128,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="hispiano" value="hispiano" checked="" /> Hispanic or Latino
   
   &nbsp;   &nbsp;   <input type="checkbox" name="no_hispiano" value="no_hispiano" checked="" />  Not Hispanic or Latino
   ';

$pdf->writeHTMLCell(100, 7, 13, 133, $html, 0, 1, false, true, 'J', 0);

//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2.    </b>     Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(95, 7, 12, 140,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="white" value="white" checked="" /> White
   
   &nbsp;   &nbsp;   <input type="checkbox" name="asian" value="asian" checked="" /> Asian

   &nbsp;   &nbsp;   <input type="checkbox" name="black" value="black" checked="" /> Black or 

   &nbsp;   &nbsp;   &nbsp;   &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp; <input type="checkbox" name="american" value="american" checked="" /> American Indian

   &nbsp;   &nbsp;   <input type="checkbox" name="native" value="native" checked="" /> Native Hawaiian or
   ';

$pdf->writeHTMLCell(195, 7, 13, 145, $html, 0, 1, false, true, 'J', 0);

$pdf->setFont('Times', '', 10);
$html= '<div> African American    &nbsp;   &nbsp;  &nbsp;  &nbsp;  or Alaska Native    &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  Other Pacific Islander  </div>';
$pdf->writeHTMLCell(120, 7, 57, 149,  $html, 0, 1, false, 'L');

//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.    </b>     Height </div>';
$pdf->writeHTMLCell(95, 7, 12, 157,  $html, 0, 1, false, 'L');

$html= '<div><label for="selection">Feet:</label>
<select name="biographic_height_feet" size="0.40">
    <option value=" ">select</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
</select></div>';
$pdf->writeHTMLCell(30, 7, 33, 157, $html, 0, 0, false, true, 'J', true);


$html1= '<div><label for="selection">Inches:</label>
<select name="biographic_height_inches" size="0.40">
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
$pdf->writeHTMLCell(30, 7, 63, 157, $html1, 0, 0, false, true, 'J', true);

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.    </b>    Weight </div>';
$pdf->writeHTMLCell(95, 7, 97, 157,  $html, 0, 1, false, 'L');

$html= '<div>  Pounds </div>';
$pdf->writeHTMLCell(50, 7, 120, 157, $html, 0, 0, false, true, 'J', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('biographic_weight_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 157);
$pdf->TextField('biographic_weight_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 157);
$pdf->TextField('biographic_weight_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 157);
//...........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.    </b>     Eye color (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 166,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="black" value="black" checked="" /> Black
   
   &nbsp;   &nbsp;   <input type="checkbox" name="blue" value="blue" checked="" /> Blue

   &nbsp;   &nbsp;   <input type="checkbox" name="brown" value="brown" checked="" />Brown

   &nbsp;   &nbsp;   <input type="checkbox" name="gray" value="gray" checked="" /> Gray

   &nbsp;   &nbsp;   <input type="checkbox" name="green" value="green" checked="" /> Green

   &nbsp;   &nbsp;   <input type="checkbox" name="hazel" value="hazel" checked="" /> Hazel

   &nbsp;   &nbsp;   <input type="checkbox" name="maroon" value="maroon" checked="" /> Maroon

   &nbsp;   &nbsp;   <input type="checkbox" name="pink" value="pink" checked="" /> Pink

   &nbsp;   &nbsp;   <input type="checkbox" name="other" value="other" checked="" dir="ltr" /> Unknown/Other
   ';

$pdf->writeHTMLCell(190, 7, 13, 171, $html, 0, 1, false, true, 'J', 0);
 
//.............

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.    </b>     Hair color (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 179,  $html, 0, 1, false, 'L');

$html ='
   <input type="checkbox" name="_bald" value="bald" checked="" /> Bald(No hair)
   
   &nbsp;&nbsp; <input type="checkbox" name="_black" value="black" checked="" /> Black

   &nbsp;&nbsp; <input type="checkbox" name="_blond" value="blond" checked="" /> Blond

   &nbsp;&nbsp; <input type="checkbox" name="_brown" value="brown" checked="" /> Brown

   &nbsp;&nbsp; <input type="checkbox" name="_gray" value="gray" checked="" /> Gray 

   &nbsp;&nbsp; <input type="checkbox" name="_red" value="red" checked="" />  Red

   &nbsp;&nbsp; <input type="checkbox" name="_sandy" value="sandy" checked="" /> Sandy

   &nbsp;&nbsp; <input type="checkbox" name="_white" value="white" checked="" /> White

   &nbsp;&nbsp; <input type="checkbox" name="_other" value="other" checked="" /> Unknown/Other
   ';

$pdf->writeHTMLCell(195, 7, 17, 184, $html, 0, 1, false, true, 'J', 0);
//..........
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 4. Information About Your U.S. Citizen Biological Father (or Adoptive Father) </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 195, $html, 1, 1, true, false, 'J', true);
//.....

$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. biological father (of adoptive father).<b> Provide
information about yourself</b> if you are a U.S. citizen father applying for a Certificate of Citizenship on behalf of your minor
biological or adopted child.</div>';
$pdf->writeHTMLCell(180, 7, 13, 203, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(1.1);
$html = '<b>1.    </b>    Your Current Legal Name of U.S. Citizen Father';
$pdf->writeHTMLCell(195, 7, 12, 218, $html, 0, 1, false, true, 'J', 0);

$pdf->Ln(1.1);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 22, 223, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 223, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 223, $html, 0, 0, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_about_you_biological_father_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 229);
$pdf->TextField('part4_about_you_biological_father_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 229);
$pdf->TextField('part4_about_you_biological_father_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 229);

//........page number 4 end -----------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER'); //page number 5
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part  4.  Information About Your U.S. Citizen Biological Father<br>(or Adoptive Father) </b> (continued)</div>';
$pdf->writeHTMLCell(130, 10, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html= '<div><b>2.  </b>   Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 12, 32, $html, 0, 1, false, 'L');

$html= '<div><b>3.  </b>   Country of Birth</div>';
$pdf->writeHTMLCell(80, 7, 79, 32, $html, 0, 1, false, 'L');

$html= '<div><b>4.   </b>  Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 137, 32, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_about_you_biological_father_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 37);

$pdf->TextField('part4_about_you_biological_father_country_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 37);

$pdf->TextField('part4_about_you_biological_father_nationality', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 37);

//.......................

$pdf->setFont('Times', '', 10);
$html= '<div><b>5. </b> Physical Address</div>';
$pdf->writeHTMLCell(110, 7, 12, 45, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 9.3);
$html= '<div>Street Number and Name (Type or print "Deceased" and the date of death if your father has passed away.)</div>';
$pdf->writeHTMLCell(150, 7, 17, 50, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_father_physical_address_street_number', 140, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 55);

$pdf->setFont('Times', '', 10);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 160, 50, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt5" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 160, 55, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste5" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 170, 55, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr5" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 180, 55, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 55, '', 1, 1, false, 'L');
//.................

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 18, 64, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 64, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 168, 64, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 68, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_city_town', 110, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 69);

$pdf->setFont('Times', '', 10);
$html = '<select name="part4_father_physical_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 69, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_zipcode', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 69);

$pdf->TextField('part4_information_father_physical_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 69);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html= '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 18, 78, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 83);
//.............
$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 75, 78, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 83);

//.....................
$pdf->setFont('Times', '', 10);
$html= '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 78, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_father_physical_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 83);

//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.  </b>  My father is a U.S. citizen by</div>';
$pdf->writeHTMLCell(110, 7, 12, 92, $html, 0, 1, false, 'L');

$html= '<div><input type="checkbox" name="ctgen_by1" value="1" checked=" " />  Birth in the United States 
&nbsp; &nbsp; <input type="checkbox" name="ctgen_by2" value="1" checked=" " />  Acquisition after birth through naturalization of alien parents<br><input type="checkbox" name="ctgen_by3" value="1" checked=" " /> Birth abroad to U.S. citizen parents </div>';
$pdf->writeHTMLCell(170, 7, 17, 97, $html, 0, 1, false, 'L');


$html= '<div>Certificate of Citizenship Number</div>';
$pdf->writeHTMLCell(110, 7, 20, 107, $html, 0, 1, false, 'L');

$html= '<div>Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(110, 7, 90, 107, $html, 0, 1, false, 'L');

$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(110, 7, 98, 112, $html, 0, 1, false, 'L');

$pdf->writeHTMLCell(60, 7, 21, 112, "", 1, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 105, 112, "", 1, 1, false, 'L');

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 80, 70, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 90, 113, false); // angle 1
$pdf->StopTransform();

//..........
$pdf->setFont('Times', '', 10);
$pdf->SetFillColor(220,220,220);

$html= '<div><input type="checkbox" name="ctgen_by4" value="1" checked=" " /> Naturalization</div>';
$pdf->writeHTMLCell(170, 7, 17, 120, $html, 0, 1, false, 'L');

$html= '<div>Place of Naturalization (Name of Court or USCIS Office Location)</div>';
$pdf->writeHTMLCell(110, 7, 20, 125, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 21, 130, "", 1, 1, false, 'L');
//.........

$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 20, 137, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 102, 137, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_place_naturalization_city', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 142);

$pdf->setFont('Times', '', 10);
$html = '<select name="part4_place_of_naturalization_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 7, 102, 142, $html, '', 0, 0, true, 'L');

//..............

$pdf->SetFont('times', '', 10);
$html= '<div> Certificate of Naturalization Number </div>';
$pdf->writeHTMLCell(80, 7, 19, 151, $html, 0, 1, false, 'L');

$html= '<div>A-Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 84, 151, $html, 0, 1, false, 'L');

$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(80, 7, 84, 155, $html, 0, 1, false, 'L');


$html= '<div>Date of Naturalization (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 142, 151, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_about_father_certificate_of_naturalization', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 155);

$pdf->TextField('part4_about_father_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 155);

$pdf->TextField('part4_about_father_date_of_naturalization', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 155);

//...........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.  </b>  Has your father ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</div>';
$pdf->writeHTMLCell(170, 7, 12, 165, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="father_lost" value="Y" checked=" " />  Yes   <input type="checkbox" name="father_lost" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(180, 7, 170, 165, $html, 0, 1, false, true, 'J');

$html= '<div>If you answered "Yes" to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(170, 7, 17, 170, $html, 0, 1, false, 'L');

//..........

$html= '<div><b>8.  &nbsp;   Marital History</b></div>';
$pdf->writeHTMLCell(170, 7, 12, 178, $html, 0, 1, false, 'L');


$html= '<div><b>A.  </b>  How many times has your U.S. citizen father been married (including annulled marriages and<br> &nbsp; &nbsp; &nbsp;
marriages to the same person)?</div>';
$pdf->writeHTMLCell(160, 7, 17, 184, $html, 0, 1, false, 'L');
$pdf->TextField('part4_about_how_many_married', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 185);


$html= '<div><b>B.  </b> What is your U.S. citizen father\'s current marital status?</div>';
$pdf->writeHTMLCell(160, 7, 17, 197, $html, 0, 1, false, 'L');

$html ='&nbsp;  &nbsp;    <input type="checkbox" name="single_" value="single" checked="" /> Single,Never Married
   
   &nbsp;   &nbsp;   <input type="checkbox" name="married_" value="married" checked="" /> Married

   &nbsp;   &nbsp;   <input type="checkbox" name="divorced_" value="divorced" checked="" /> Divorced

   &nbsp;   &nbsp;   <input type="checkbox" name="widowed_" value="widowed" checked="" /> Widowed

   &nbsp;   &nbsp;   <input type="checkbox" name="separated_" value="separated" checked="" /> Separated

   &nbsp;   &nbsp;   <input type="checkbox" name="marriage_" value="marriage" checked="" /> Marriage   Annulled';       

$pdf->writeHTMLCell(190, 7, 20, 205, $html, 0, 1, false, true, 'J');

$html ='<div> <input type="checkbox" name="other_" value="Y" checked=" " />  Other (Explain):</div>';
$pdf->writeHTMLCell(180, 7, 23, 214, $html, 0, 1, false, true, 'J');
$pdf->writeHTMLCell(147, 7, 55, 213, "", 1, 1, false, true, 'J', true);

$html ='<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 23, 225, $html, 0, 1, false, true, 'J');
//..........page number 5 end -------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 6
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part  4.  Information About Your U.S. Citizen Biological Father<br>(or Adoptive Father) </b> (continued)</div>';
$pdf->writeHTMLCell(130, 10, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>9.  </b>  Information About U.S. Citizen Father\'s Current Spouse</div>';
$pdf->writeHTMLCell(110, 7, 12, 30, $html, 0, 1, false, 'L');

//.........

$html= '<div><b>A.  </b>  Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 20, 35,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 40);
//................

$pdf->setFont('Times', '', 10);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 35,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 40);

//.............

$pdf->setFont('Times', '', 10);
$html= '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 153, 35,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_middlename', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 40);
//.............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>B. </b> Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 48,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 53);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>C.   </b>   Country of Birth </div>';
$pdf->writeHTMLCell(80, 7, 85, 48,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_country_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 93, 53);
//......
$pdf->setFont('Times', '', 10); 
$html= '<div><b>D.   </b>   Country of Citizenship or Nationality </div>';
$pdf->writeHTMLCell(80, 7, 20, 61,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_nationality', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 66);
//......
$pdf->setFont('Times', '', 10); 
$html= '<div><b>E.   </b>  Spouse\'s Physical Address  </div>';
$pdf->writeHTMLCell(80, 7, 20, 74,  $html, 0, 1, false, 'L');

//................


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 80, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 80, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_street', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 85);
$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt_s" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 85, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste_s" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 85, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="flr_s" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 85, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 85, '', 1, 1, false, 'L');
//.................

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 93, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 93, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 172, 93, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 98, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_city_town', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 98);

$pdf->setFont('Times', '', 10);
$html = '<select name="part4_us_father_current_spouse_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148, 98, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 98);

$pdf->TextField('part4_us_father_current_spouse_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 98);


//......................

$pdf->setFont('Times', '', 10);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 107, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 116);

//.............

$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 107, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 116);

//.....................

$pdf->setFont('Times', '', 10);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 107, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 116);

//.....................

$pdf->setFont('Times', '', 10); 
$html= '<div><b>F. </b> Date of Mariage (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 125,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_date_of_mariage', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 130);
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>G. </b> Place of Marriage </div>';
$pdf->writeHTMLCell(80, 7, 20, 138,  $html, 0, 1, false, 'L');

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 144, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 85, 144, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 110, 144, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_city_of_mariage', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 150);
//..........
$pdf->setFont('Times', '', 10);
$html = '<select name="part4_us_father_current_spouse_state_of_mariage" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 85, 150, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_us_father_current_spouse_country_of_mariage', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 110, 150);

//.........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>H. </b>  Spouse\'s Immigration Status</div>';
$pdf->writeHTMLCell(80, 7, 20, 158,  $html, 0, 1, false, 'L');

$html ='<div> <input type="checkbox" name="sp_status0" value="Y" checked=" " />  U.S. Citizen &nbsp; &nbsp; <input type="checkbox" name="sp_status1" value="Y" checked=" " />  Lawful Permanent Resident </div>';
$pdf->writeHTMLCell(180, 7, 24, 165, $html, 0, 1, false, true, 'J', true);

$html ='<div> <input type="checkbox" name="sp_status2" value="Y" checked=" " />  Other (Explain):</div>';
$pdf->writeHTMLCell(180, 7, 24, 172, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(145, 7, 58, 172, "", 1, 1, false, true, 'J', true);
//.....
$html ='<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 24, 180, $html, 0, 1, false, true, 'J', true);

$pdf->setFont('Times', '', 10); 
$html= '<div><b>I.   </b>    Is your U.S. citizen father\'s current spouse also your biological (or adopted) mother?</div>';
$pdf->writeHTMLCell(180, 7, 20, 190,  $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="spouse_biological" value="Y" checked=" " />  Yes   <input type="checkbox" name="spouse_biological" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(180, 7, 170, 190, $html, 0, 1, false, true, 'J');
//..........

$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 5. Information About Your U.S. Citizen Biological Mother (or Adoptive Mother)</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 198, $html, 1, 1, true, false, 'J', true);
//.....
$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>NOTE:</b> Complete this section if you are claiming citizenship through a U.S. citizen biological mother (or adoptive mother).<b> Provide
information about yourself</b> if you are a U.S. citizen mother applying for a Certificate of Citizenship on behalf of your minor
biological or adopted child.</div>';
$pdf->writeHTMLCell(190, 7, 12, 205, $html, 0, 1, false, true, 'J', true);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.   </b>    Current Legal Name of U.S. Citizen Mother</div>';
$pdf->writeHTMLCell(110, 7, 12, 218, $html, 0, 1, false, 'L');
//.........

$html= '<div> Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 16, 223,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 228);
//................

$pdf->setFont('Times', '', 10);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 86, 223,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 228);

//.............

$pdf->setFont('Times', '', 10);
$html= '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 153, 223,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_middlename', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 228);
//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.   </b>   Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(65, 7, 12, 236,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 241);
//................

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.  </b>   Country of Birth</div>';
$pdf->writeHTMLCell(65, 7, 75, 236,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_country_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 82, 241);

//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>4.  </b>   Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 142, 236,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_citizenship', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 241);

//.............page number 6 end ---------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 7
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 5. Information About Your U.S. Citizen Biological Mother<br>
(or Adoptive Mother) </b> (continued) </div>';
$pdf->writeHTMLCell(130, 10, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);
//.........
$pdf->setFont('Times', '', 10);
$html= '<div><b>5. </b> Physical Address</div>';
$pdf->writeHTMLCell(110, 7, 12, 30, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 9.3);
$html= '<div>Street Number and Name (Type or print "Deceased" and the date of death if your mother has passed away.)</div>';
$pdf->writeHTMLCell(150, 7, 17, 35, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_street', 140, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 40);

$pdf->setFont('Times', '', 10);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 160, 35, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt_5" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 160, 40, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste_5" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 170, 40, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr_5" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 180, 40, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 40, '', 1, 1, false, 'L');
//.................

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 18, 49, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 49, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code &nbsp;  + &nbsp;  4</div>';
$pdf->writeHTMLCell(60, 7, 168, 49, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 53, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_city', 110, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 54);

$pdf->setFont('Times', '', 10);
$html = '<select name="part5_information_mother_physical_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 54, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_zipcode', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 54);

$pdf->TextField('part5_information_mother_physical_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 54);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10);
$html= '<div>Province (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 18, 63, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 68);
//.............
$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code (foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 75, 63, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 68);

//.....................
$pdf->setFont('Times', '', 10);
$html= '<div>Country (foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 63, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_mother_physical_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 68);

//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>6.  </b>  My mother is a U.S. citizen by</div>';
$pdf->writeHTMLCell(110, 7, 12, 77, $html, 0, 1, false, 'L');

$html= '<div><input type="checkbox" name="ctgen1_by" value="1" checked=" " />  Birth in the United States 
&nbsp; &nbsp; <input type="checkbox" name="ctgen2_by" value="1" checked=" " />  Acquisition after birth through naturalization of alien parents<br><input type="checkbox" name="ctgen3_by" value="1" checked=" " /> Birth abroad to U.S. citizen parents </div>';
$pdf->writeHTMLCell(170, 7, 17, 82, $html, 0, 1, false, 'L');


$html= '<div>Certificate of Citizenship Number</div>';
$pdf->writeHTMLCell(110, 7, 20, 92, $html, 0, 1, false, 'L');

$html= '<div>Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(110, 7, 90, 92, $html, 0, 1, false, 'L');

$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(110, 7, 98, 97, $html, 0, 1, false, 'L');

$pdf->writeHTMLCell(60, 7, 21, 97, "", 1, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 105, 97, "", 1, 1, false, 'L');

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 81, 55, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 90, 100, false); // angle 2
$pdf->StopTransform();

//..........
$pdf->setFont('Times', '', 10);
$pdf->SetFillColor(220,220,220);

$html= '<div><input type="checkbox" name="ctgen4_by" value="1" checked=" " /> Naturalization</div>';
$pdf->writeHTMLCell(170, 7, 17, 105, $html, 0, 1, false, 'L');

$html= '<div>Place of Naturalization (Name of Court or USCIS Office Location)</div>';
$pdf->writeHTMLCell(110, 7, 20, 110, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 21, 115, "", 1, 1, false, 'L');
//.........

$html= '<div>City or Town </div>';
$pdf->writeHTMLCell(80, 7, 20, 122, $html, 0, 1, false, 'L');

$html= '<div> State </div>';
$pdf->writeHTMLCell(80, 7, 102, 122, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_mother_place_naturalization_city', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 127);

$pdf->setFont('Times', '', 10);
$html = '<select name="part4_mother_place_of_naturalization_state" size="0.75">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 7, 102, 127, $html, '', 0, 0, true, 'L');

//..............

$pdf->SetFont('times', '', 10);
$html= '<div> Certificate of Naturalization Number </div>';
$pdf->writeHTMLCell(80, 7, 19, 136, $html, 0, 1, false, 'L');

$html= '<div>A-Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 84, 136, $html, 0, 1, false, 'L');

$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(80, 7, 84, 142, $html, 0, 1, false, 'L');

$html= '<div>Date of Naturalization (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 142, 136, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_about_mother_certificate_of_naturalization', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 141);

$pdf->TextField('part5_about_mother_a_number', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 141);

$pdf->TextField('part5_about_mother_date_of_naturalization', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 143, 141);

//...........
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.  </b>  Has your mother ever lost U.S. citizenship or taken any action that would cause loss of U.S. citizenship?</div>';
$pdf->writeHTMLCell(170, 7, 12, 150, $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="mother_lost" value="Y" checked=" " />  Yes   <input type="checkbox" name="mother_lost" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(180, 7, 170, 150, $html, 0, 1, false, true, 'J');

$html= '<div>If you answered "Yes" to <b>Item Number 7</b>., provide an explanation in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(170, 7, 17, 155, $html, 0, 1, false, 'L');

//..........

$html= '<div><b>8.  &nbsp;   Marital History</b></div>';
$pdf->writeHTMLCell(170, 7, 12, 163, $html, 0, 1, false, 'L');


$html= '<div><b>A.  </b>  How many times has your U.S. citizen mother been married (including annulled marriages and<br> &nbsp; &nbsp; &nbsp;
marriages to the same person)?</div>';
$pdf->writeHTMLCell(160, 7, 17, 169, $html, 0, 1, false, 'L');
$pdf->TextField('part5_about_mother_how_many_married', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 170);


$html= '<div><b>B.  </b> What is your U.S. citizen mother\'s current marital status?</div>';
$pdf->writeHTMLCell(160, 7, 17, 182, $html, 0, 1, false, 'L');

$html ='&nbsp;  &nbsp;    <input type="checkbox" name="single_m" value="single" checked="" /> Single,Never Married
   
   &nbsp;   &nbsp;   <input type="checkbox" name="married_m" value="married" checked="" /> Married

   &nbsp;   &nbsp;   <input type="checkbox" name="divorced_m" value="divorced" checked="" /> Divorced

   &nbsp;   &nbsp;   <input type="checkbox" name="widowed_m" value="widowed" checked="" /> Widowed

   &nbsp;   &nbsp;   <input type="checkbox" name="separated_m" value="separated" checked="" /> Separated

   &nbsp;   &nbsp;   <input type="checkbox" name="marriage_m" value="marriage" checked="" /> Marriage   Annulled';       

$pdf->writeHTMLCell(190, 7, 20, 190, $html, 0, 1, false, true, 'J');

$html ='<div> <input type="checkbox" name="other_s" value="Y" checked=" " />  Other (Explain):</div>';
$pdf->writeHTMLCell(180, 7, 23, 199, $html, 0, 1, false, true, 'J');
$pdf->writeHTMLCell(147, 7, 55, 198, "", 1, 1, false, true, 'J', true);

$html ='<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 23, 205, $html, 0, 1, false, true, 'J');
//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>9.  </b>  Information About U.S. Citizen mother\'s Current Spouse</div>';
$pdf->writeHTMLCell(110, 7, 12, 214, $html, 0, 1, false, 'L');

//.........

$html= '<div><b>A.  </b>  Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 20, 219,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_lastname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 224);
//................

$pdf->setFont('Times', '', 10);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 219,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_firstname', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 224);

//.............

$pdf->setFont('Times', '', 10);
$html= '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 153, 219,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_middlename', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 224);
//.............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>B. </b> Date of Birth (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 232,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 237);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>C.   </b>   Country of Birth </div>';
$pdf->writeHTMLCell(80, 7, 85, 232,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_country_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 93, 237);

//......page number 7 end -----------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER'); //page number 8
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part  5.  Information About Your U.S. Citizen Biological Mother<br>(or Adoptive Mother) </b> (continued)</div>';
$pdf->writeHTMLCell(130, 10, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);
//...............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>D.   </b>   Country of Citizenship or Nationality </div>';
$pdf->writeHTMLCell(80, 7, 20, 29,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_nationality', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 34);
//......
$pdf->setFont('Times', '', 10); 
$html= '<div><b>E.   </b>  Spouse\'s Physical Address  </div>';
$pdf->writeHTMLCell(80, 7, 20, 42,  $html, 0, 1, false, 'L');

//................


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 48, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 48, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_street', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 53);
$pdf->setFont('Times', '', 10);
$html= '<div>  <input type="checkbox" name="apt_sp" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 53, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste_sp" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 53, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="flr_sp" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 53, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 53, '', 1, 1, false, 'L');
//.................

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 61, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 61, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 172, 61, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 66, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_city_town', 120, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 66);

$pdf->setFont('Times', '', 10);
$html = '<select name="part5_us_mother_current_spouse_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148, 66, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 66);

$pdf->TextField('part5_us_mother_current_spouse_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 66);


//......................

$pdf->setFont('Times', '', 10);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 75, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 84);

//.............

$pdf->setFont('Times', '', 10);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 75, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 84);

//.....................

$pdf->setFont('Times', '', 10);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 75, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 84);

//.....................

$pdf->setFont('Times', '', 10); 
$html= '<div><b>F. </b> Date of Mariage (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 20, 93,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_date_of_mariage', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 98);
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>G. </b> Place of Marriage </div>';
$pdf->writeHTMLCell(80, 7, 20, 106,  $html, 0, 1, false, 'L');

$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 112, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 85, 112, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 110, 112, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_city_of_mariage', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 118);
//..........
$pdf->setFont('Times', '', 10);
$html = '<select name="part5_us_mother_current_spouse_state_of_mariage" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 85, 118, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_us_mother_current_spouse_country_of_mariage', 92, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 110, 118);

//.........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>H. </b>  Spouse\'s Immigration Status</div>';
$pdf->writeHTMLCell(80, 7, 20, 126,  $html, 0, 1, false, 'L');

$html ='<div> <input type="checkbox" name="ms_status0" value="Y" checked=" " />  U.S. Citizen &nbsp; &nbsp; <input type="checkbox" name="ms_status1" value="Y" checked=" " />  Lawful Permanent Resident </div>';
$pdf->writeHTMLCell(180, 7, 24, 133, $html, 0, 1, false, true, 'J', true);

$html ='<div> <input type="checkbox" name="ms_status2" value="Y" checked=" " />  Other (Explain):</div>';
$pdf->writeHTMLCell(180, 7, 24, 140, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(145, 7, 58, 140, "", 1, 1, false, true, 'J', true);
//.....
$html ='<div>If you selected "Other," provide an explanation. If you need extra space to complete this section, use the space provided in
<b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell(180, 7, 24, 148, $html, 0, 1, false, true, 'J', true);

$pdf->setFont('Times', '', 10); 
$html= '<div><b>I.   </b>    Is your U.S. citizen mother\'s current spouse also your biological (or adopted) mother?</div>';
$pdf->writeHTMLCell(180, 7, 20, 158,  $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="spouse_mother" value="Y" checked=" " />  Yes   <input type="checkbox" name="spouse_mother" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(180, 7, 170, 158, $html, 0, 1, false, true, 'J');
//..........

$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 6. Physical Presence in the United States From Birth Until Filing of Form N-600</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 164, $html, 1, 1, true, false, 'J', true);
//.....

$pdf->setFont('Times', '', 10); 
$html= '<div><b>NOTE: </b>Only applicants born outside the United States claiming to have been born U.S. citizens are required to provide all the dates
when your U.S. citizen biological father or U.S. citizen biological mother resided in the United States.<b> Include all dates from your
birth until the date you file your Form N-600.</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 171,  $html, 0, 1, false, 'L');

//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>1.   </b>   Indicate whether this information relates to your U.S. citizen father or mother</div>';
$pdf->writeHTMLCell(190, 7, 12, 184,  $html, 0, 1, false, 'L');
//.....
$pdf->setFont('Times', '', 10); 
$html= '<div><input type="checkbox" name="indicate" value="Y" checked=" " />  U.S. Citizen Father   <input type="checkbox" name="indicate" value="N" checked=" " /> U.S. Citizen Mother </div>';
$pdf->writeHTMLCell(190, 7, 17, 189,  $html, 0, 1, false, 'L');
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>2.   </b>  Physical Presence in the United States</div>';
$pdf->writeHTMLCell(190, 7, 12, 194,  $html, 0, 1, false, 'L');



//.......left side .............................................

$pdf->setFont('Times', '', 10); 
$html= '<div><b>A.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 199,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_a_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 204);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 64, 199,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_a_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 204);

//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>C.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 212,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_c_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 217);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 64, 212,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_c_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 217);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>E.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 225,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_e_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 230);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 64, 225,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_e_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 230);
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>G.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 238,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_g_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 243);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 64, 238,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_g_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 243);

//.....right side............................... 
$pdf->setFont('Times', '', 10); 
$html= '<div><b>B.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 199,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_b_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 204);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 160, 199,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_b_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 204);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>D.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 212,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_d_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 217);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 160, 212,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_d_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 217);
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>F.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 225,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_f_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 230);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 160, 225,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_f_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 230);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>H.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 238,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_h_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 243);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 160, 238,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_h_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 243);

//..........page number 8 end --------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 9
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 7.  Information About Military Service of U. S. Citizen Parents</b></div>';
$pdf->writeHTMLCell(130, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);
//.........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>NOTE:   </b>  Complete this only if you are an applicant claiming U.S. citizenship at time of birth abroad.</div>';
$pdf->writeHTMLCell(190, 7, 12, 25,  $html, 0, 1, false, 'L');
//............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>1.   </b>  Has your U.S. citizen parent served in the U.S. Armed Forces?</div>';
$pdf->writeHTMLCell(190, 7, 12, 30,  $html, 0, 1, false, 'L');

$html ='<div><input type="checkbox" name="parent_us_army" value="Y" checked=" " />  Yes   <input type="checkbox" name="parent_us_army" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(100, 7, 170, 30, $html, 0, 1, false, true, 'J');
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>2.   </b>  If you answered "Yes" <b>to Item Number 1.</b>, which parent served in the U.S. Armed Forces?</div>';
$pdf->writeHTMLCell(190, 7, 12, 35,  $html, 0, 1, false, 'L');

$html ='<div> <input type="checkbox" name="pt_1" value="Y" checked=" " /> U.S. Citizen Father  <input type="checkbox" name="pt_2" value="Y" checked=" " /> U.S. Citizen Mother </div>';
$pdf->writeHTMLCell(180, 7, 16, 40, $html, 0, 1, false, true, 'J', true);

//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>3.   </b>  Dates of Service (mm/dd/yyyy) (If time of service fulfills any of the required physical presence, submit evidence of the service.) </div>';
$pdf->writeHTMLCell(190, 7, 12, 45,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>A.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 50,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_date_of_service_a_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 55);
//........
$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 64, 50,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_date_of_service_a_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 55);
//............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>B.  </b>  From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 112, 50,  $html, 0, 1, false, 'L');
//..........
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_date_of_service_b_from', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 119, 55);

$pdf->setFont('Times', '', 10); 
$html= '<div> To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 160, 50,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('physical_presence_date_of_service_b_to', 40, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 55);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>4.   </b>  Type of Discharge</div>';
$pdf->writeHTMLCell(190, 7, 12, 63,  $html, 0, 1, false, 'L');
//..............
$html ='<div> <input type="checkbox" name="discharge1" value="Y" checked=" " />   Honorable    <input type="checkbox" name="discharge2" value="Y" checked=" " />   Other than Honorable  <input type="checkbox" name="discharge3" value="Y" checked=" " />   Dishonorable  </div>';
$pdf->writeHTMLCell(180, 7, 16, 68, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 8. Applicant\'s Statement, Contact Information, Certification, and Signature</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 75, $html, 1, 1, true, false, 'J', true);
//.....
$pdf->setFont('Times', '', 10); 
$html= '<div><b>NOTE:   </b>   Read the <b>Penalties</b> section of the Form N-600 Instructions before completing this part.</div>';
$pdf->writeHTMLCell(190, 7, 12, 83,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b> Applicant\'s Statement  </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 88,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>NOTE:   </b>  Select the box for either <b>Item A.</b> or <b>B.</b> in <b>Item Number 1.</b> If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 94,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>1.  </b>  Applicant\'s Statement Regarding the Interpreter</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 99,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>A.  </b>  <input type="checkbox" name="statement1" value="Y" checked=" " />   I can read and understand English, and I have read and understand every question and instruction on this application<br> &nbsp; &nbsp;  &nbsp;
and my answer to every question.</div>';
$pdf->writeHTMLCell(190, 7, 17, 105,  $html, 0, 1, false, 'L');

//..............
$html= '<div><b>B.  </b>  <input type="checkbox" name="statement2" value="Y" checked=" " />   The interpreter named in <b>Part 9.</b> read to me every question and instruction on this application and my answer to<br> &nbsp; &nbsp; &nbsp;
every question, in <br><br>  &nbsp; &nbsp; &nbsp; understood everything. </div>';
$pdf->writeHTMLCell(190, 7, 17, 115,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 130, 119, " , a language in which I am fluent and I", 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8_aplicant_statement', 80, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 120);
//..........

$pdf->setFont('Times', '', 10); 
$html= '<div><b>2.  </b>  Applicant\'s Statement Regarding the Preparer </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 132,  $html, 0, 1, false, 'L');
//..............

$html= '<div><input type="checkbox" name="statement_reg" value="Y" checked=" " />  At my request, the preparer named in <b>Part 10.</b>, <br>&nbsp;&nbsp;&nbsp;  prepared this application for me based only upon information I provided or authorized.</div>';
$pdf->writeHTMLCell(190, 7, 17, 138,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8_aplicant_statement_regarding_preparer', 113, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 89, 136);
//..........
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Applicant\'s Contact Information </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 148,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>3.  </b> Applicant\'s Daytime Telephone Number </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 158,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8_aplicant_contact_daytime_telephone', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 163);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>4.  </b> Applicant\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 158,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8_aplicant_contact_mobile_telephone', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 163);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>5.  </b> Applicant\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 172,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8_aplicant_contact_email_address', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 177);
//..........
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Applicant\'s Certification </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 190,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10); 
$html= '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of
my records that USCIS may need to determine my eligibility for the immigration benefit I seek.

<br><br>I further authorize release of information contained in this application, in supporting documents, and in my USCIS records to other
entities and persons where necessary for the administration and enforcement of U.S. immigration laws. </div>';
$pdf->writeHTMLCell(190, 7, 12, 200,  $html, 0, 1, false, 'L');

//.......page number 9 end --------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER'); //page number 10
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 8. Applicant\'s Statement, Contact Information, Certification,
and Signature </b> (continued)</div>';
$pdf->writeHTMLCell(130, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);
//.........
$pdf->setFont('Times', '', 10); 
$html= '<div>I understand that USCIS may require me to appear for an appointment to take my biometrics (fingerprints, photograph, and/or
signature) and, at that time. if I am required to provide biometrics, I will be required to sign an oath reaffirming that;</div>';
$pdf->writeHTMLCell(190, 7, 12, 28,  $html, 0, 1, false, 'L');
//............
$html= '<div><b>1)  </b>  I reviewed and provided or authorized all of the information in my application;</div>';
$pdf->writeHTMLCell(190, 7, 18, 38,  $html, 0, 1, false, 'L');
//..............
$html= '<div><b>2)  </b>  I understood all of the information contained in, and submitted with, my application: and</div>';
$pdf->writeHTMLCell(190, 7, 18, 45,  $html, 0, 1, false, 'L');
//.............. 
$html= '<div><b>3)  </b>  All of this information was complete, true, and correct at the time of filing.</div>';
$pdf->writeHTMLCell(190, 7, 18, 52,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('Times', '', 10); 
$html= '<div>I certify, under penalty of perjury, that I provided or authorized all of the information in my application, I understand all of the
information contained in, and submitted with, my application, and that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(190, 7, 12, 58, $html, 0, 1, false, 'L');
//............
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Applicant\'s Signature </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 68,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.  </b> &nbsp;   Applicant\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 76, $html, 0, 1, false, 'L');
//.......
$pdf->writeHTMLCell(120, 7, 20, 81, '', 1, 0, false, 'L');
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 80, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 76, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_8_applicant_date_of_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 81);
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE TO ALL APPLICANTS:  </b>  If you do not completely fill out this application or fail to submit required documents listed in the
Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(190, 7, 12, 90, $html, 0, 1, false, 'L');
//.......
$pdf->setFont('Times', 'B', 12);
$html= '<div>Part 9. Interpreter\'s Contact Information, Certification, and Signature</div>';
$pdf->writeHTMLCell(190, 7, 12, 100, $html, 1, 1, true, 'L');
//..........
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(190, 7, 12, 108, $html, 0, 1, false, 'L');
//.........
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(191, 7, 13, 113, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>1.    </b>      Interpreter\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 120, $html, 0, 1, false, 'L');
//..........
$pdf->setFont('Times', '', 10);
$html= '<div>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 112, 120, $html, 0, 1, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 125);
//..........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_9_interpreter_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 125);
//..........
$pdf->setFont('Times', '', 10);
$html= '<div><b>2.    </b>      Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 133, $html, 0, 1, false, 'L');
//.........
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_business_org_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 138);
//..........
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 148, $html, 0, 1, true, 'L');

//.......................
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 156, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 156, $html, 0, 1, false, 'L');
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 161);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt14" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 161, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste14" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 161, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr14" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 161, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 161, '', 1, 1, false, 'L');


//.................


$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 169, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 169, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 168, 169, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 174, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_city_town', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 174);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 174, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 174);

$pdf->TextField('interpreter_mailing_address_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 174);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 183, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_provience', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 188);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 183, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_postal_code', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 188);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 128, 183, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 188);
//...........
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Interpreter\'s Contact Information </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 198,  $html, 0, 1, true, 'L');
//..............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>4.  </b> Interpreter\'s Daytime Telephone Number </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 206,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_9_interpreter_contact_daytime_telephone', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 211);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>5.  </b> Interpreter\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 206,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_9_interpreter_contact_mobile_telephone', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 211);
//..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>6.  </b> Interpreter\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 220,  $html, 0, 1, false, 'L');
//..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_9_interpreter_contact_email_address', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 225);


//..........page number 10 end -------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 11
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 9. Interpreter\'s Contact Information, Certification, and Signature </b> (continued)</div>';
$pdf->writeHTMLCell(132, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//............
$pdf->setFont('Times', 'I', 12);
$html= '<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 30, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(90, 7, 12, 37, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>I am fluent in English and </div>';
$pdf->writeHTMLCell(190, 7, 12, 44, $html, 0, 1, false, 'L');
$pdf->TextField('interpreter_certificationion', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 43);
$pdf->setFont('Times', '', 10);
$html= '<div>, which is the same language specified in <b>Part 8., Item B.</b> in</div>';
$pdf->writeHTMLCell(90, 7, 112, 44, $html, 0, 1, false, 'L');

$html= '<div><b>Item Number 1.</b>, and I have read to this applicant in the identified language every question and instructiaction on this application and his
or her answer to every question. The applicant informed me that he or she understands every instruction, question and answer on the
application, including the <b>Applicant\'s Certification</b> and has verified the accuracy of every answer.</div>';
$pdf->writeHTMLCell(192, 7, 12, 50, $html, 0, 1, false, 'L');

//............
$pdf->setFont('Times', 'BI', 12);
$html= '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 67, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>7.    &nbsp;   &nbsp; </b>     Interpreter\'s Signature </div>';
$pdf->writeHTMLCell(80, 7, 12, 74, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 22, 80, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 78, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............

$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 76, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_date_of_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 81);
//.............
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing This Application, if Other Than the Applicant </div>';
$pdf->writeHTMLCell(190, 7, 13, 92, $html, 1, 0, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(100, 7, 12, 108, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(190, 7, 12, 115, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div><b>1</b> &nbsp;  &nbsp; Preparer\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(95, 7, 12, 122, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_last_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 128);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div>Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 117, 122, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_first_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 128);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>3. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 136, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_business_org_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 142);
//.................
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(190, 7, 12, 153, $html, 0, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 165, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 165, $html, 0, 1, false, 'L');

//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 170);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt15" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 170, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste15" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 170, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="flr15" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 170, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 170, '', 1, 1, false, 'L');

//.................

$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 178, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 178, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 168, 178, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 184, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_city_town', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 184);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="preparer_mailing_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 184, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 184);

$pdf->TextField('preparer_mailing_address_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 184);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 195, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_provience', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 200);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 194, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_postal_code', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 200);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 128, 194, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 200);
//.............
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 210, $html, 0, 1, true, 'L');

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.  </b> Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 218, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 224);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.  </b> Preparer\'s Work Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 218, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_work_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 224);
//.................. 

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>6.  </b> Preparer\'s Evening Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 233, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_evening_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 239);

//............page number 11 end ------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 12
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 10. Contact Information. Declaration, and Signature of the Person
Preparing this Application, if Other Than the Applicant </b> (continued)</div>';
$pdf->writeHTMLCell(132, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//............

$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Statement </div>';
$pdf->writeHTMLCell(190, 7, 13, 33, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);// set font
$html= '<div><b>7.    &nbsp;   A.     </b>     <input type="checkbox" name="preparer_statement_7a" value="1" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 43, $html, 0, 1, false, 'L');
$html= '<div> I am not an attorney or accredited representative but have prepared this application on behalf of <br>
the applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(180, 7, 28, 43, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);// set font
$html= '<div><b>B.     </b>     <input type="checkbox" name="preparer_statement_7b" value="1" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 53, $html, 0, 1, false, 'L');

$html= '<div> I am an attorney or accredited representative and my representation of the applicant in this case<br><input type="checkbox" name="preparer_statement_7b1" value="1" />  extends   &nbsp; <input type="checkbox" name="preparer_statement_7b2" value="1" /> &nbsp;  does not extend beyond the preparation of this application. </div>';
$pdf->writeHTMLCell(190, 7, 28, 53, $html, 0, 1, false, 'L');


$html= '<div><b>NOTE:</b> If you are an attorney or accredited representative whose representation extends beyond
preparation of this application, you may be obliged to submit a completed Form G-28, Notice of
intry of Appearance as Attorney or Accredited Representative, with this application.</div>';
$pdf->writeHTMLCell(150, 7, 28, 63, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(190, 7, 13, 78, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);// set font
$html= '<div>By my signature, I certify, under penalty of perjury, that I prepared this application at the request of the applicant. The applicant then
reviewed this completed application and informed me that he or she understands all of the information contained in, and submitted
with, his or her application, including the <b>Applicant\'s Certification</b>, and that all of this information is complete, true, and correct. I
completed this application based only on information that the applicant provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(190, 7, 12, 88, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(190, 7, 13, 115, $html, 0, 1, true, 'L');



$pdf->setFont('Times', '', 10);
$html= '<div><b>8.    &nbsp;   &nbsp; </b>     Preparer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(80, 7, 12, 123, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 22, 128, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 126, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............


$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 123, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('preparer_date_of_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 128);

//..........page number 12 end --------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER'); //page number 13
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 11. Additional Information</b></div>';
$pdf->writeHTMLCell(132, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);

//............
$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to provide any additional information within this application, use the space below. If you need more space
than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.
Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number, and Item
Number</b> to which your answer refers; and sign and date each sheet.</div>';
$pdf->writeHTMLCell(190, 7, 12, 26, $html, 0, 0, false, true, 'J', true);
//.........
$pdf->SetFillColor(255,255,255);
$html = '<b>1.   </b>    Family Name (Last Name)';
$pdf->writeHTMLCell(60, 7, 12, 46, $html, 0, 0, false, true, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 46, $html, 0, 0, false, true, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 46, $html, 0, 0, false, true, 'L', true);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('additional_information_last_name', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 52);
$pdf->TextField('additional_information_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 52);
$pdf->TextField('additional_information_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 52);
//...........


$pdf->SetFont('times', '', 10);
$html = '<b>2.  </b>    A-Number (if any)    <b>   &nbsp;  &nbsp; &nbsp; &nbsp;  A- </b>';
$pdf->writeHTMLCell(60, 7, 12, 64, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(50, 7, 60, 64, "", 1, 0, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 58, 93, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
//..............aditional section.........
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 72, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 77);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 72, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 77);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 72, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 77);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 85, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 85, $html, 0, 0, false, 'L');
//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 117);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 117);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 117);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 125, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_4d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 125, $html, 0, 0, false, 'L');
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
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 157);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 157);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 165, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_5d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 165, $html, 0, 0, false, 'L');
//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 192, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 197);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 192, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 197);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 192, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 197);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 205, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="8" name="additional_information_6d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 205, $html, 0, 0, false, 'L');

//....page number 13 end---------------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER'); //page number 14

$pdf->setFont('Times', 'B', 11);
$html= '<div>NOTE: Do not complete Parts 12. and 13. unless the USCIS officer instructs you to do so at the interview.</div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 0, false, 'L');
//........

$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 12.  Affidavit </b> (do <b>NOT</b> complete this part unless instructed to do so
<b>AT THE INTERVIEW</b>)</div>';
$pdf->writeHTMLCell(132, 7, 13, 27, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 28, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 27, "", 1, 0, false, true, 'J', true);

//.......

$pdf->setFont('Times', '', 10);
$html= '<div>I, the (applicant, parent, or legal guardian)____________________________________________________ do swear or affirm, under penalty of perjury under the laws of the United States, that I know and understand the contents of this application signed by me, and
the attached supplementary pages number______ to ______ inclusive, that the same are true and correct to the best of my knowledge. and that corrections number_________ to ________were made by me or at my request.</div>';
$pdf->writeHTMLCell(191, 7, 13, 42, $html, 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>Applicant\'s, Parent\'s, or Legal Guardian\'s Signature (Sign in ink)</div>';
$pdf->writeHTMLCell(100, 7, 13, 63, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 14, 68, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 63, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 153, 68, '', 1, 1, false, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html= '<div>Subscribed and sworn or affirmed before me upon examination of the applicant (parent, legal, guardian) on</div>';
$pdf->writeHTMLCell(191, 7, 13, 80, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(35, 7, 168, 80, '', 1, 1, false, 'L');
$html= '<div>Date(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 168, 87, $html, 0, 1, false, 'L');
//.....

$html= '<div>at</div>';
$pdf->writeHTMLCell(92, 7, 12, 92, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(80, 7, 17, 92, '', 1, 1, false, 'L');
$html= '<div>(Location)</div>';
$pdf->writeHTMLCell(92, 7, 50, 99, $html, 0, 1, false, 'L');

//..........
$html= '<div>USCIS Officer\'s Printed Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 105, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 13, 110, '', 1, 1, false, 'L');

//.....
$html= '<div>USCIS Officer\'s Title</div>';
$pdf->writeHTMLCell(90, 7, 112, 105, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 113, 110, '', 1, 1, false, 'L');
//.........

$pdf->setFont('Times', '', 10);
$html= '<div>USCIS Officer\'s Signature (Sign in ink)</div>';
$pdf->writeHTMLCell(100, 7, 13, 120, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 13, 125, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 120, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 153, 125, '', 1, 1, false, 'L');

//.........
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 13.  Officer Report and Recommendation on Application for Certificate of Citizenship<br>
</b>(for USCIS use <b>ONLY</b>)</div>';
$pdf->writeHTMLCell(190, 7, 13, 135, $html, 1, 1, true, false, 'J', true);

//........
$pdf->SetFont('times', '', 10); // set font
$html ='<div>On the basis of the documents, records, the testimony of persons examined, and the identification upon personal appearance of the
underage beneficiary, I find that all the facts and conclusions set forth under oath in this application are:</div>';
$pdf->writeHTMLCell(190, 7, 13, 148, $html, 0, 0, false, true, 'J', true);

//.....

$pdf->SetFont('times', '', 10);  // set font
$html ='<div><b>1.  </b>   <input type="checkbox" name="true_correct" value="T" checked=" " />  True and correct</div>';
$pdf->writeHTMLCell(190, 7, 13, 160, $html, 0, 0, false, true, 'J', true);

$html ='<div><b>2.  </b>   <input type="checkbox" name="applicant_drived" value="A" checked=" " /> The applicant derived or acquired U.S. citizenship on </div>';
$pdf->writeHTMLCell(190, 7, 13, 167, $html, 0, 0, false, true, 'J', true);
//...........
$pdf->writeHTMLCell(40, 7, 103, 166, '', 1, 1, false, 'L');
$html= '<div>Date(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 110, 173, $html, 0, 1, false, 'L');
//.....

$html ='<div><b>3.  </b>   <input type="checkbox" name="applicant_aquired" value="A" checked=" " />   The applicant derived or acquired U.S. citizenship through (Select the box next to the appropriate section of law, or if the<br> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
section of law is not reflected, type or print the applicable section of law in the space next to "Other.")</div>';
$pdf->writeHTMLCell(190, 7, 13, 178, $html, 0, 0, false, true, 'J', true);

//...........

$html ='<div><b>A.  </b>   <input type="checkbox" name="A3" value="A" checked=" " />   INA Section 301</div>';
$pdf->writeHTMLCell(100, 7, 19, 188, $html, 0, 0, false, true, 'J', true);

$html ='<div><b>B.  </b>   <input type="checkbox" name="B3" value="A" checked=" " />   INA Section 309</div>';
$pdf->writeHTMLCell(100, 7, 19, 195, $html, 0, 0, false, true, 'J', true);

$html ='<div><b>C.  </b>   <input type="checkbox" name="C3" value="A" checked=" " />   INA Section 320</div>';
$pdf->writeHTMLCell(100, 7, 19, 202, $html, 0, 0, false, true, 'J', true);

$html ='<div><b>D.  </b>   <input type="checkbox" name="D3" value="A" checked=" " />   INA Section 321</div>';
$pdf->writeHTMLCell(100, 7, 19, 209, $html, 0, 0, false, true, 'J', true);


$html ='<div><b>E.  </b>   <input type="checkbox" name="E3" value="A" checked=" " />   Other</div>';
$pdf->writeHTMLCell(100, 7, 19, 216, $html, 0, 0, false, true, 'J', true);
$pdf->writeHTMLCell(100, 7, 42, 216, "", 1, 0, false, true, 'J', true);

$html ='<div><b>4.  </b>   <input type="checkbox" name="expatriated" value="A" checked=" " />   The applicant has not been expatriated since that time</div>';
$pdf->writeHTMLCell(190, 7, 13, 225, $html, 0, 0, false, true, 'J', true);

//.........page number 14 end -------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //page number 15
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 13.  Officer Report and Recommendation on Application for Certificate of Citizenship
</b>(for USCIS use <b>ONLY</b>) (Continued)</div>';
$pdf->writeHTMLCell(132, 7, 13, 17, $html, 1, 1, true, false, 'J', true);
$html ='<div><b>A-</div>';
$pdf->writeHTMLCell(20, 7, 148, 18, $html, 0, 0, false, false, 'J', true);
$pdf->writeHTMLCell(50, 7, 154, 17, "", 1, 0, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>I recommend that this Form N-600 be:  <input type="checkbox" name="approved" value="1" checked=" " /> Approved   <input type="checkbox" name="denied" value="1" checked=" " />  Denied </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 30, $html, 0, 0, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10); // set font
$html ='<div>Issue Certificate of Citizenship in the name of</div>';
$pdf->writeHTMLCell(190, 7, 12, 37, $html, 0, 0, false, true, 'J', true);
//.......

$html= '<div> Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 12, 47,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 13, 52,  "", 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 84, 47,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 85, 52,  "", 1, 1, false, 'L');
//.............
$pdf->setFont('Times', '', 10);
$html= '<div> Middle Name</div>';
$pdf->writeHTMLCell(60, 7, 153, 47,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(49, 7, 154, 52,  "", 1, 1, false, 'L');
//.............

$html= '<div>USCIS Officer\'s Printed Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 60, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 13, 65, '', 1, 1, false, 'L');

//.....
$html= '<div>USCIS Officer\'s Title</div>';
$pdf->writeHTMLCell(90, 7, 112, 60, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 113, 65, '', 1, 1, false, 'L');
//.........

$pdf->setFont('Times', '', 10);
$html= '<div>USCIS Officer\'s Signature (Sign in ink)</div>';
$pdf->writeHTMLCell(100, 7, 13, 75, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 13, 80, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 75, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 153, 80, '', 1, 1, false, 'L');

$pdf->writeHTMLCell(191, 1, 12, 87, '', "B", 1, false, 'L');
//..........

$pdf->SetFont('times', '', 10); // set font
$html ='<div><input type="checkbox" name="i_do" value="1" checked=" " />   I do    <input type="checkbox" name="i_dont" value="1" checked=" " />   do not concur with the USCIS Officer\'s recommendation of Form N-600. </div>';
$pdf->writeHTMLCell(190, 7, 12, 95, $html, 0, 0, false, true, 'J', true);
//........

$pdf->setFont('Times', '', 10);
$html= '<div>USCIS District Director\'s or Field Office Director\'s Signature (Sign in ink)</div>';
$pdf->writeHTMLCell(120, 7, 13, 102, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 13, 107, '', 1, 1, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 150, 102, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 153, 107, '', 1, 1, false, 'L');






$js = "
var fields = {
	'attorney_statebar_number':' $attorneyData->bar_number',
	'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',
	'9_digit_number':' ',

	'about_you_legal_last_name':' ',
	'about_you_legal_first_name':' ',
	'about_you_legal_middle_name':' ',
	'about_you_exact_last_name':' ',
	'about_you_exact_first_name':' ',
	'about_you_exact_middle_name':' ',

	'about_you_since_birth_last_name1':' ',
	'about_you_since_birth_middle_name1':' ',
	'about_you_since_birth_first_name1':' ',
    'about_you_since_birth_last_name2':' ',
	'about_you_since_birth_middle_name2':' ',
	'about_you_since_birth_first_name2':' ',
	'about_you_us_cocial_security_number':' ',
	'about_you_us_online_account_number':' ',

	'about_you_date_of_birth':' ',
	'about_you_country_of_birth':' ',
	'about_you_country_of_prior_citizenship':' ',

	'part2_information_about_you_in_care_of':' ',
	'part2_information_about_you_street_number':' ',
	'part2_information_about_you_city_town':' ',
	'part2_10_state':' ',
	'part2_information_about_you_zipcode':' ',
	'part2_information_about_you_zipcode1':' ',
	'part2_information_about_you_foreign_region':' ',
	'part2_information_about_you_foreign_postalcode':' ',
	'part2_information_about_you_foreign_country':' ',

	'part2_physical_address_street_number':' ',
	'part2_information_physical_city_town':' ',
	'part2_11_state':' ',
	'part2_information_about_physical_zipcode':' ',
	'part2_information_about_physical_zipcode1':' ',
	'part2_information_about_physical_foreign_region':' ',
	'part2_information_about_physical_foreign_postalcode':' ',
	'part2_information_about_physical_foreign_country':' ',

	'part2_information_proentry_city_town':' ',
	'part2_proentry_state':' ',
	'part2_information_proentry_date_of_entry':' ',
	'part2_information_admission_lastname':' ',
	'part2_information_admission_firstname':' ',
	'part2_information_admission_middlename':' ',

	'part2_information_passport_number':' ',
	'part2_information_travel_document_number':' ',
	'part2_information_country_issue_passport':' ',
	'part2_information_date_issue_passport':' ',
	

	'part2_information_date_became_lpr':' ',
	'part2_information_location_where_admited':' ',
	'part2_information_adoption_city_town':' ',
	'part2_adoption_state':' ',
	'part2_information_adoption_country':' ',
	'part2_information_date_adoption':' ',
	'part2_information_date_custody_began':' ',
	'part2_information_date_physical_custody_began':' ',

	'part2_information_re_adoption_city_town':' ',
	'part2_re_adoption_state':' ',
	'part2_information_re_adoption_country':' ',
	'part2_information_date_re_adoption':' ',
	'part2_information_date_re_adoption_custody_began':' ',
	'part2_information_date_physicalre_adoption_custody_began':' ',

	'part2_information_date_return_unitedstates':' ',
	'part2_information_date_left_unitedstates':' ',
	'part2_information_place_of_entry_return':' ',
	'part2_place_of_entry_return_state':' ',
	'part2_information_date_return_unitedstates2':' ',
	'part2_information_date_left_unitedstates2':' ',
	'part2_information_place_of_entry_return2':' ',
	'part2_place_of_entry_return_state2':' ',

	'biographic_height_feet':' ',
	'biographic_height_inches':' ',
	'biographic_weight_pound1':' ',
	'biographic_weight_pound2':' ',
	'biographic_weight_pound3':' ',

	'part4_about_you_biological_father_last_name':' ',
	'part4_about_you_biological_father_first_name':' ',
	'part4_about_you_biological_father_middle_name':' ',
	'part4_about_you_biological_father_date_of_birth':' ',
	'part4_about_you_biological_father_country_birth':' ',
	'part4_about_you_biological_father_nationality':' ',

	'part4_father_physical_address_street_number':' ',
	'part4_information_father_physical_city_town':' ',
	'part4_information_father_physical_zipcode':' ',
	'part4_father_physical_state':' ',
	'part4_information_father_physical_zipcode1':' ',
	'part4_information_father_physical_foreign_region':' ',
	'part4_information_father_physical_foreign_postalcode':' ',
	'part4_information_father_physical_foreign_country':' ',
	
	'part4_information_place_naturalization_city':' ',
	'part4_place_of_naturalization_state':' ',
	'part4_about_father_certificate_of_naturalization':' ',
	'part4_about_father_a_number':' ',
	'part4_about_father_date_of_naturalization':' ',
	'part4_about_how_many_married':' ',

	'part4_us_father_current_spouse_middlename':' ',
	'part4_us_father_current_spouse_firstname':' ',
	'part4_us_father_current_spouse_lastname':' ',
	'part4_us_father_current_spouse_date_of_birth':' ',
	'part4_us_father_current_spouse_country_of_birth':' ',
	'part4_us_father_current_spouse_nationality':' ',

	'part4_us_father_current_spouse_street':' ',
	'part4_us_father_current_spouse_city_town':' ',
	'part4_us_father_current_spouse_state':' ',
	'part4_us_father_current_spouse_zipcode1':' ',
	'part4_us_father_current_spouse_zipcode2':' ',
	'part4_us_father_current_spouse_foreign_region':' ',
	'part4_us_father_current_spouse_postalcode':' ',
	'part4_us_father_current_spouse_foreign_country':' ',
	'part4_us_father_current_spouse_date_of_mariage':' ',

	'part4_us_father_current_spouse_state_of_mariage':' ',
	'part4_us_father_current_spouse_city_of_mariage':' ',
	'part4_us_father_current_spouse_country_of_mariage':' ',

	'part5_us_mother_lastname':' ',
	'part5_us_mother_firstname':' ',
	'part5_us_mother_middlename':' ',

	'part5_us_mother_date_of_birth':' ',
	'part5_us_mother_country_of_birth':' ',
	'part5_us_mother_citizenship':' ',

	'part5_information_mother_physical_street':' ',
	'part5_information_mother_physical_city':' ',
	'part5_information_mother_physical_state':' ',
	'part5_information_mother_physical_zipcode':' ',
	'part5_information_mother_physical_zipcode1':' ',
	'part5_information_mother_physical_foreign_region':' ',
	'part5_information_mother_physical_postalcode':' ',
	'part5_information_mother_physical_country':' ',

	'part4_information_mother_place_naturalization_city':' ',
	'part4_mother_place_of_naturalization_state':' ',
	'part5_about_mother_certificate_of_naturalization':' ',
	'part5_about_mother_a_number':' ',
	'part5_about_mother_date_of_naturalization':' ',
	'part5_about_mother_how_many_married':' ',

	'part5_us_mother_current_spouse_lastname':' ',
	'part5_us_mother_current_spouse_firstname':' ',
	'part5_us_mother_current_spouse_middlename':' ',
	'part5_us_mother_current_spouse_date_of_birth':' ',
	'part5_us_mother_current_spouse_country_of_birth':' ',

	'part5_us_mother_current_spouse_nationality':' ',
	'part5_us_mother_current_spouse_street':' ',
	'part5_us_mother_current_spouse_city_town':' ',
	'part5_us_mother_current_spouse_state':' ',
	'part5_us_mother_current_spouse_zipcode1':' ',
	'part5_us_mother_current_spouse_zipcode2':' ',
	'part5_us_mother_current_spouse_foreign_region':' ',
	'part5_us_mother_current_spouse_postalcode':' ',
	'part5_us_mother_current_spouse_foreign_country':' ',
	'part5_us_mother_current_spouse_date_of_mariage':' ',
	'part5_us_mother_current_spouse_city_of_mariage':' ',
	'part5_us_mother_current_spouse_state_of_mariage':' ',
	'part5_us_mother_current_spouse_country_of_mariage':' ',
	
	'physical_presence_a_from':' ',
	'physical_presence_a_to':' ',
	'physical_presence_b_from':' ',
	'physical_presence_b_to':' ',
	'physical_presence_c_from':' ',
	'physical_presence_c_to':' ',
	'physical_presence_d_from':' ',
	'physical_presence_d_to':' ',
	'physical_presence_e_from':' ',
	'physical_presence_e_to':' ',
	'physical_presence_f_from':' ',
	'physical_presence_f_to':' ',
	'physical_presence_g_from':' ',
	'physical_presence_g_to':' ',
	'physical_presence_h_from':' ',
	'physical_presence_h_to':' ',

	'physical_presence_date_of_service_a_from':' ',
	'physical_presence_date_of_service_a_to':' ',
	'physical_presence_date_of_service_b_from':' ',
	'physical_presence_date_of_service_b_to':' ',
	'part_8_aplicant_statement':' ',
	'part_8_aplicant_statement_regarding_preparer':' ',
	'part_8_aplicant_contact_daytime_telephone':' ',
	'part_8_aplicant_contact_mobile_telephone':' ',
	'part_8_aplicant_contact_email_address':' ',
	'part_8_applicant_date_of_signature':' ',

	'part_9_interpreter_last_name':' ',
	'part_9_interpreter_first_name':' ',
	'interpreter_business_org_name':' ',
	'interpreter_mailing_address_street_name_number':' ',
	'interpreter_mailing_address_city_town':' ',
	'interpreter_mailing_address_state':' ',
	'interpreter_mailing_address_zipcode1':' ',
	'interpreter_mailing_address_zipcode2':' ',
	'interpreter_mailing_address_provience':' ',
	'interpreter_mailing_address_postal_code':' ',
	'interpreter_mailing_address_country':' ',
	'part_9_interpreter_contact_daytime_telephone':' ',
	'part_9_interpreter_contact_mobile_telephone':' ',
	'part_9_interpreter_contact_email_address':' ',

	'interpreter_certificationion':' ',
	'interpreter_date_of_signature':' ',
	'preparer_last_name':' ',
	'preparer_first_name':' ',
	'preparer_business_org_name':' ',
	'preparer_mailing_address_street_name_number':' ',
	'preparer_mailing_address_city_town':' ',
	'preparer_mailing_state':' ',
	'preparer_mailing_address_zipcode1':' ',
	'preparer_mailing_address_zipcode2':' ',
	'preparer_mailing_address_provience':' ',
	'preparer_mailing_address_postal_code':' ',
	'preparer_mailing_address_country':' ',

	'preparer_contact_daytime_telephone':' ',
	'preparer_contact_work_telephone':' ',
	'preparer_contact_evening_telephone':' ',
	'preparer_date_of_signature':' ',

	'additional_information_last_name':' ',
	'additional_information_first_name':' ',
	'additional_information_middle_name':' ',
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


// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('Form_N-600.pdf', 'I');