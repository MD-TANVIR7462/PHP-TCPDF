<?php

require_once('form_header.php');   //database connection file 

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
		
		$this->Cell(40, 6, "Form I-765 Edition 08/25/20 ", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/I-765-footer-pdf417-$this->page.png";
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

$pdf->Cell(25, 5, '', 0, 0);
$pdf->SetFont('times', 'B', 13.5);	// set font
$pdf->MultiCell(100, 15, "Application For Employment Authorization", 0, 'C', 0, 1, 55, 11, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-765", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0040\nExpires 07/31/2022", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->SetFont('times', 'B', 11);
$pdf->writeHTMLCell(190, 51, 13, 35, '',  1,  0, false, false, 'C', true);
$pdf->writeHTMLCell(15, 50.5, 13.2, 35.2, '',  'R',  1, true, true, 'L', true);
$html ='<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(15, 30, 13, 50, $html, 0, 1, false, true, 'C', true);
$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(3, 1, 30, 36, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9);
$html ="<div><b>Authorization/Extension Valid From</b></div>";
$pdf->writeHTMLCell(40, 5, 33, 34, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(31, 5, 35, 42, "", "B", 1, false, true, 'L', true);
$pdf->writeHTMLCell(41, 5, 28.5, 45, "", "B", 1, false, true, 'L', true);
//............

$pdf->SetFont('times', '', 8);
$pdf->writeHTMLCell(3, 1, 30, 52, '',  1,  1, false, true, 'L', false);
$pdf->SetFont('times', '', 9);
$html ="<div><b>Authorization/Extension Valid Through</b></div>";
$pdf->writeHTMLCell(40, 1, 33, 50, $html, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(31, 5, 35, 58, "", "B", 1, false, true, 'L', true);
//........
$pdf->writeHTMLCell(1, 32, 68.5, 35, "", "R", 1, false, true, 'L', true);
$pdf->writeHTMLCell(110, 10, 28.5, 67, "", "TB", 1, false, true, 'L', true);
$pdf->writeHTMLCell(1, 51, 137.5, 35, "", "R", 1, false, true, 'L', true);
$pdf->SetFont('times', 'B', 9);
$pdf->writeHTMLCell(20, 5, 100, 35, "Fee Stamp", 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(20, 5, 163, 35, "Action Block", 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(50, 5, 28, 69, "Alien Registration Number &nbsp;  A-", 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(50, 6, 73, 69, "", 1, 1, false, true, 'L', true);
$pdf->writeHTMLCell(50, 5, 28, 78, "Remarks", 0, 1, false, true, 'L', true);
//table end 




// table 2 start 
$pdf->writeHTMLCell(190, 18, 13, 92, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(1, 18, 72, 92, '',  'R',  1, false, true, 'L', false);
$html ="<div><b>To be completed by an attorney or Board of Immigration Appeals (BIA)- accredited representative  </b>  (if any).</div>";
$pdf->writeHTMLCell(59.5, 17.4, 13.3, 92.5, $html, 0, 1, true, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 11);
$html ='<div> <input type="checkbox" name="agree" value="1" checked=" " />  Select this box if Form G-28<br> &nbsp; &nbsp; &nbsp; is attached.</div>';
$pdf->writeHTMLCell(58, 18, 73, 92, $html, 'R', 0, false, true, 'L', true);
//........

//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 138, 92, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 60, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),140, 102);

//....table 2 end .........

$pdf->SetFont('times', '', 10); // set font
$html ='<div><b>START HERE - Type or print in black ink.</b> Answer all questions fully and accurately. If a question does not apply to you (for
example, if you have never been married and the question asks, "Provide the name of your current spouse"), type or print "N/A"
unless otherwise directed. If your answer to a question which requires a numeric response is zero or none (for example, "How
many children do you have" or "How many times have you departed the United States"), type or print "None" unless otherwise
directed.</div>';
$pdf->writeHTMLCell(187, 10, 20, 111, $html, 0, 0, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 198, false); // angle 1
$pdf->StopTransform();

//..........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Reason for Applying</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 133, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>I am applying for </b>(select <b>only one</b> box):</div>';
$pdf->writeHTMLCell(92, 7, 12, 140, $html, 0, 1, false, true, 'J', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. </b><input type="checkbox" name="initial" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 12, 146, $html, 0, 1, false, true, 'J', true);
$html ='<div>Initial permission to accept employment</div>';
$pdf->writeHTMLCell(90, 7, 23, 146, $html, 0, 1, false, true, 'J', true);

//.......


$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b. </b><input type="checkbox" name="replace" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 12, 152, $html, 0, 1, false, true, 'J', true);
$html ='<div>Replacement of lost, stolen, or damaged employment authorization document, or correction of my
employment authorization document <b>NOT DUE</b> to U.S. Citizenship and Immigration Services (USCIS) erro</div>';
$pdf->writeHTMLCell(80, 7, 23, 152, $html, 0, 1, false, true, 'J', true);

$html ='<div><b>NOTE:</b> Replacement (correction) of an employment
authorization document due to USCIS error does not
require a new Form I-765 and filing fee. Refer to
<b>Replacement for Card Error in the What is the
Filing Fee</b> section of the Form I-765 Instructions for
further details .</div>';
$pdf->writeHTMLCell(80, 7, 23, 173, $html, 0, 1, false, true, 'J', true);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c. </b><input type="checkbox" name="renewal" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 12, 197, $html, 0, 1, false, true, 'J', true);
$html ='<div>Renewal of my permission to accept employment.
(Attach a copy of your previous employment
authorization document.)</div>';
$pdf->writeHTMLCell(80, 7, 23, 197, $html, 0, 1, false, true, 'J', true);
//........
$html ='<div><b>Part 2. Information About You</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 211, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Your Full Legal Name</b></div>';
$pdf->writeHTMLCell(90, 5, 13, 218, $html, 0, 1, true, false, 'L', true);
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
$pdf->writeHTMLCell(35, 5, 12, 241, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 242);
//......

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Name Used</b></div>';
$pdf->writeHTMLCell(90, 5, 113, 130, $html, 0, 1, true, false, 'L', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div>Provide all other names you have ever used, including aliases,
maiden name, and nicknames. If you need extra space to
complete this section, use the space provided in <b>Part 6.
Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 10, 112, 136, $html, 0, 1, false, true, 'J', true);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 153, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_lastname2', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 155);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 162, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_firstname2', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 164);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 112, 173, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_middlename2', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 173);

$pdf->writeHTMLCell(90, 1, 113, 174, "", "B", 1, false, false, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 182, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_lastname3', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 184);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 191, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_firstname3', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 193);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 112, 202, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_middlename3', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 202);

$pdf->writeHTMLCell(90, 1, 113, 203, "", "B", 1, false, false, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 211, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_lastname4', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 213);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_firstname4', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 222);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 5, 112, 231, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_family_middlename4', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 231);

//.......page number 1 end -----------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER');  // page number 2

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFontSize(12); // set font
$html ='<div><b>U.S. Mailing Address </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 25, $html, 0, 1, true, false, 'J', true);
$pdf->SetFont('times', 'I', 8);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><i>(USPS ZIP Code Lookup)</i></a></div>';
$pdf->writeHTMLCell(90, 7, 13, 25, $html, 0, 1, false, false, 'R', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 12, 32, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_in_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 37);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 44, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 46);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 55, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 55);


//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 64, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 64);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 73, $html, '', 0, 0, true, 'L');

$html = '<select name="information_about_you_us_mail_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 73, $html, '', 0, 0, true, 'L');
$html= '<div><b>5.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 73, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_us_mail_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 73);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6. </b> Is your current mailing address the same as your physical<br>&nbsp; &nbsp; &nbsp;
address?  </div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="current_mail" value="Y" checked=" " /> Yes   &nbsp;  <input type="checkbox" name="current_mail" value="N" checked=" " />  No </div>';
$pdf->writeHTMLCell(90, 7, 75, 85, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you answered "No" to <b>Item Number 6.</b>,
provide your physical address below.</div>';
$pdf->writeHTMLCell(80, 7, 18, 90, $html, 0, 1, false, false, 'J', true);

//......
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>U.S. Physical Address </b></div>';
$pdf->writeHTMLCell(90, 6, 13, 100, $html, 0, 1, true, false, 'J', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.  </b>   Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 7, 12, 107, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 109);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 7, 12, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),63, 118);
//......
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 127, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 127);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>7.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 136, $html, '', 0, 0, true, 'L');

$html = '<select name="about_you_us_physical_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 29.5, 136, $html, '', 0, 0, true, 'L');
$html= '<div><b>7.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 136, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_physical_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 136);
//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Information </b></div>';
$pdf->writeHTMLCell(90, 6, 13, 144, $html, 0, 1, true, false, 'J', true);


//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.  </b> Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 150, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_alien_reg_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 155);
$pdf->SetFont('times', 'B', 12);
$pdf->writeHTMLCell(50, 7, 38, 153, 'A-', 0, 1, false, false, 'J', true);

//............
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 26, 142, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 40, 148, false); // angle 2 
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 73, 210, false); // angle 3
$pdf->StopTransform();

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.  </b> USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 162, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_uscis_online_ac_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 167);
//...............

$pdf->SetFont('times', '', 10);
$html ='<div><b>10. </b> Gender </div>';
$pdf->writeHTMLCell(90, 7, 12, 175, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="gender" value="M" checked=" " />Male &nbsp;&nbsp;&nbsp;  <input type="checkbox" name="gender" value="F" checked=" " />Female </div>';
$pdf->writeHTMLCell(90, 7, 70, 175, $html, 0, 1, false, true, 'J', true);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b> Marital Status </div>';
$pdf->writeHTMLCell(90, 7, 12, 181, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="s" value="single" checked=" " />Single &nbsp;<input type="checkbox" name="m_status" value="m" checked=" " />Married &nbsp;  <input type="checkbox" name="d" value="divorced" checked=" " />Divorced &nbsp; <input type="checkbox" name="w" value="Widowed" checked=" " /> Widowed </div>';
$pdf->writeHTMLCell(90, 7, 18, 186, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b> Have you previously filed Form I-765? </div>';
$pdf->writeHTMLCell(90, 7, 12, 192, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="previous_" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="previous_" value="n" checked=" " />No </div>';
$pdf->writeHTMLCell(90, 7, 70, 197, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.a. </b> Has the Social Security Administration (SSA) ever<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
officially issued a Social Security card to you? </div>';
$pdf->writeHTMLCell(90, 5, 12, 202, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="ssa" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="ssa" value="n" checked=" " />No </div>';
$pdf->writeHTMLCell(90, 5, 70, 210, $html, 0, 1, false, true, 'J', true);

//........

$html ='<div><b>NOTE:</b> If you answered "No" to <b>Item Number 13.a.</b>,
skip to <b>Item Number 14</b>. If you answered "Yes" to <b>Item
Number 13.a.</b>, provide the information requested in <b>Item
Number 13.b.</b></div>';
$pdf->writeHTMLCell(80, 6, 20, 215, $html, 0, 1, false, false, 'J', true);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>13.b. </b> Provide your Social Security number (SSN) (if known).</div>';
$pdf->writeHTMLCell(90, 5, 12, 232, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_ssn_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 238);

//............... page 2 left side end ....................................................


$pdf->SetFont('times', '', 10);
$html ='<div><b>14. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 17, $html, 0, 1, false, false, 'J', true);

$html ='<div>Do you want the SSA to issue you a Social Security card?
(You must also answer "Yes" to <b>Item Number 15.</b>,
<b>Consent for Disclosure</b>, to receive a card.)</div>';
$pdf->writeHTMLCell(80, 5, 120, 17, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="ssa_" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="ssa_" value="n" checked=" " />No </div>';
$pdf->writeHTMLCell(90, 5, 170, 29, $html, 0, 1, false, true, 'J', true);

//........
$html ='<div><b>NOTE:</b> If you answered "No" to <b>Item Number 14.</b>, skip
to <b>Part 2., Item Number 18.a.</b> If you answered "Yes" to
<b>Item Number 14.</b>, you must also answer "Yes" to <b>Item
Number 15.<b/></div>';
$pdf->writeHTMLCell(82, 5, 120, 34, $html, 0, 1, false, true, 'J', true);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>15. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 51, $html, 0, 1, false, false, 'J', true);

$html ='<div><b>Consent for Disclosure: </b>I authorize disclosure of
information from this application to the SSA as required
for the purpose of assigning me an SSN and issuing me a
Social Security card.</div>';
$pdf->writeHTMLCell(80, 5, 120, 51, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><input type="checkbox" name="consent" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="consent" value="n" checked=" " />No </div>';
$pdf->writeHTMLCell(90, 5, 175, 64, $html, 0, 1, false, true, 'J', true);

//........


$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Numbers
14. - 15.</b>, provide the information requested in <b>Item
Numbers 16.a. - 17.b.</b></div>';
$pdf->writeHTMLCell(80, 5, 120, 70, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Father\'s Name</b><br>Provide your father\'s birth name.</div>';
$pdf->writeHTMLCell(90, 5, 112, 85, $html, 0, 1, false, false, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 94, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_father_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 96);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 103, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_father_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 105);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>Mother\'s Name</b><br>Provide your mother\'s birth name.</div>';
$pdf->writeHTMLCell(90, 5, 112, 114, $html, 0, 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 124, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_mother_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 126);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 5, 112, 133, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_mother_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 135);
//.......
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Your Country or Countries of Citizenship or
Nationality</b></div>';
$pdf->writeHTMLCell(90, 5, 113, 147, $html, 0, 1, true, false, 'L', true);

//..........
$pdf->SetFont('times', '', 10);
$html ='<div>List all countries where you are currently a citizen or national.
If you need extra space to complete this item, use the space
provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(90, 5, 113, 160, $html, 0, 1, false, true, 'L', true);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.a.  </b>Country</div>';
$pdf->writeHTMLCell(35, 5, 112, 177, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('country1', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 183);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>18.b.  </b>Country</div>';
$pdf->writeHTMLCell(35, 5, 112, 192, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('country2', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 198);


//.......page number 2 end -------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER');  // page number 3

//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//......

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Place of Birth</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 25, $html, 0, 1, true, false, 'J', true);
//..........
$pdf->SetFont('times', '', 10);
$html ='<div>List the city/town/village, state/province, and country where
you were born.</div>';
$pdf->writeHTMLCell(90, 5, 12, 32, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>19.a. </b> City/Town/Village of Birth</div>';
$pdf->writeHTMLCell(90, 5, 12, 43, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_village_of_birth', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 48);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.b. </b> State/Province of Birth</div>';
$pdf->writeHTMLCell(90, 5, 12, 55, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_province_of_birth', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 60);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19.c. </b> Country of Birth</div>';
$pdf->writeHTMLCell(90, 5, 12, 67, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_country_of_birth', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 72);
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
$pdf->writeHTMLCell(90, 5, 13, 90, $html, 0, 1, true, false, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.a. </b> Form I-94 Arrival-Departure Record Number (if any)</div>';
$pdf->writeHTMLCell(90, 5, 12, 102, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_dept_record_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 107);
//...........

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 44, 118, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 108, 228, false); // angle 2 
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 130, 92, false); // angle right side 3
$pdf->StopTransform();

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.b. </b>Passport Number of Your Most Recently Issued Passport</div>';
$pdf->writeHTMLCell(90, 5, 12, 115, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_passport_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 120);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.c. </b> Travel Document Number (if any)</div>';
$pdf->writeHTMLCell(90, 5, 12, 127, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_travel_document_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 132);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.d. </b>Country That Issued Your Passport or Travel Document</div>';
$pdf->writeHTMLCell(90, 5, 12, 140, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_country_issued_passport', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 145);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>21.e. </b>Expiration Date for Passport or Travel Document<br>
    &nbsp;  &nbsp; &nbsp;  &nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 5, 12, 152, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_passport_expire_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 157);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22. </b> Date of Your Last Arrival Into the United States. On or<br>
    &nbsp;  &nbsp; &nbsp;&nbsp;About (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 5, 12, 165, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_us_last_arrival_date', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 170);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>23.  </b>  Place of Your Last Arrival Into the United States</div>';
$pdf->writeHTMLCell(90, 5, 12, 177, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_last_arrival_place', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 182);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>24. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 189, $html, 0, 1, false, true, 'J', true);
$html ='<div>Immigration Status at Your Last Arrival (for example,
B-2 visitor, F-1 student, or no status)</div>';
$pdf->writeHTMLCell(80, 5, 20, 189, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_last_arrival_status', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 198);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>25. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 205, $html, 0, 1, false, true, 'J', true);
$html ='<div>Your Current Immigration Status or Category (for example
B-2 visitor, F-1 student, parolee, deferred action, or no
status or category) </div>';
$pdf->writeHTMLCell(80, 5, 20, 205, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_current_arrival_status', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 218);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div><b>26. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 226, $html, 0, 1, false, true, 'J', true);
$html ='<div>Student and Exchange Visitor Information System
(SEVIS) Number (if any)</div>';
$pdf->writeHTMLCell(80, 5, 20, 226, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(80, 5, 45, 235, "N-", 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_sevis_number', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 235);

//...........page number 3 left end .......................................................

$pdf->SetFillColor(220,220,220);

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Eligibility Category</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 17, $html, 0, 1, true, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>27. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 24, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>Eligibility Category.</b> Refer to the <b>Who May File Form
I-765</b> section of the Form I-765 Instructions to determine
the appropriate eligibility category for this application.
Enter the appropriate letter and number for your eligibility
category below (for example, (a)(8), (c)(17)(iii)).</div>';
$pdf->writeHTMLCell(85, 5, 119, 24, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$html =<<< EOD
<div>(<input type="text" name="eligibility1" maxlength="5" value="" size="3" />)(<input type="text" name="eligibility2" maxlength="5" value="" size="3" />)(<input type="text" name="eligibility3" maxlength="5" value="" size="3" />)</div>
EOD;
$pdf->writeHTMLCell(85, 7, 150, 44, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 50, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(3)(C) STEM OPT Eligibility Category.</b> If you
entered the eligibility category <b>(c)(3)(C) in Item Number
27.</b>, provide the information requested in <b>Item Numbers
28.a. - 28.c.</b></div>';
$pdf->writeHTMLCell(85, 5, 119, 50, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.a. </b> Degree</div>';
$pdf->writeHTMLCell(90, 5, 112, 68, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_degree', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 68);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.b. </b> Employer\'s Name as Listed in E-Verify</div>';
$pdf->writeHTMLCell(90, 5, 112, 77, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_employee_everyfy', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 82);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.c. </b> </div>';
$pdf->writeHTMLCell(20, 5, 112, 90, $html, 0, 1, false, true, 'J', true);
$html ='<div> Employer\'s E-Verify Company Identification Number or a
Valid E-Verify Client Company Identification Number</div>';
$pdf->writeHTMLCell(83, 5, 120, 90, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_employee_everyfy_company_number', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 99);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>29.</b></div>';
$pdf->writeHTMLCell(20, 5, 112, 107, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(26) Eligibility Category.</b> If you entered the eligibility
category (c)(26) in <b>Item Number 27.</b>, provide the receipt
number of your H-IB spouse\'s most recent Form I-797
Notice for Form I-129, Petition for a Nonimmigrant
Worker</div>';
$pdf->writeHTMLCell(83, 5, 120, 107, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_eligibility_category', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 132, 128);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 136, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(8) Eligibility Category</b> If you entered the eligibility
category (c)(8) in <b>Item Number 27.</b>, provide the
information requested in <b>Item Numbers 30.a. - 30.g.</b></div>';
$pdf->writeHTMLCell(83, 5, 120, 136, $html, 0, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.a. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 150, $html, 0, 1, false, true, 'J', true);
$html ='<div>Have you <b>EVER</b> been arrested for, and/or charged with,
and/or convicted of any crime in any country?</div>';
$pdf->writeHTMLCell(83, 5, 120, 150, $html, 0, 1, false, true, 'J', true);
$html ='<div><input type="checkbox" name="arrested" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="arrested" value="n" checked=" " />No </div>';
$pdf->writeHTMLCell(90, 7, 175, 158, $html, 0, 1, false, true, 'J', true);
//..............

$html ='<div><b>NOTE:</b> If you answered "Yes" to <b>Item Number 30.a.</b>,
refer to <b>Special Filing Instructions for Those With
Pending Asylum Applications (c)(8)</b> of the Form I-765
instructions for information about providing court
dispositions.</div>';
$pdf->writeHTMLCell(83, 5, 120, 164, $html, 0, 1, false, true, 'J', true);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.b. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 185, $html, 0, 1, false, true, 'J', true);
$html ='<div>Did you enter the United States lawfully through a U.S.
port of entry and were you inspected and admitted or
paroled after inspection by an immigration officer? (If
you answer "Yes," you <b>MUST</b> provide evidence of your
lawful entry.)</div>';
$pdf->writeHTMLCell(83, 5, 120, 185, $html, 0, 1, false, true, 'J', true);
$html ='<div><input type="checkbox" name="did_enter" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="did_enter" value="n" checked=" " />No </div>';
$pdf->writeHTMLCell(90, 7, 175, 202, $html, 0, 1, false, true, 'J', true);

//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.c. </b></div>';
$pdf->writeHTMLCell(20, 5, 112, 210, $html, 0, 1, false, true, 'J', true);
$html ='<div>If you answered "No" to <b>Item Number 30.b.</b>, did you
present yourself to the Secretary of Homeland Security or
his or her delegate (DHS) within 48 hours of entry or
attempted entry <b>AND</b> express an intention to seek asylum
within the United States or express a fear of persecution
or torture in your home country?</div>';
$pdf->writeHTMLCell(83, 5, 120, 210, $html, 0, 1, false, true, 'J', true);
$html ='<div><input type="checkbox" name="dhs" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="dhs" value="n" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 175, 232, $html, 0, 1, false, true, 'J', true);

//..............page number 3 end ------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER');  // page number 4
//........
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 30.c.</b>, provide the
following information:</div>';
$pdf->writeHTMLCell(90, 5, 12, 25, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.d. </b> Date you presented yourself to DHS</div>';
$pdf->writeHTMLCell(90, 5, 12, 35, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_date_you_presented_dhs', 41, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 40);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.e. </b> Location where you presented yourself to DHS</div>';
$pdf->writeHTMLCell(90, 5, 12, 47, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_location_presented_dhs', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 52);

//..........
$pdf->SetFont('times', '', 10);
$html ='<div><b>30.f. </b> Country of claimed persecution</div>';
$pdf->writeHTMLCell(90, 5, 12, 59, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_country_claimed_prescution', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 64);

//..........


$pdf->SetFont('times', '', 10);
$html ='<div><b>30.g. </b></div>';
$pdf->writeHTMLCell(20, 5, 12, 72, $html, 0, 1, false, true, 'J', true);
$html ='<div>Provide an explanation for why you did not enter the
United States lawfully through a U.S. port of entry. If
you need extra space to complete this item, use the space
provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(83, 5, 20, 72, $html, 0, 1, false, true, 'J', true);
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="19" rows="8" name="about_you_explain_didnt_enter">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 10, 20, 88, $html, 0, 0, false, 'L');
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Refer to the <b>Special Filing Instructions for Those
With Pending Asylum Applications (c)(8)</b> section of the Form
I-765 Instructions for more information.</div>';
$pdf->writeHTMLCell(90, 5, 12, 122, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>31.a.</b></div>';
$pdf->writeHTMLCell(20, 5, 12, 137, $html, 0, 1, false, true, 'J', true);
$html ='<div><b>(c)(35) and (c)(36) Eligibility Category.</b> If you entered
the eligibility category (c)(35) in <b>Item Number 27.</b>, please
provide the receipt number of your Form I-797 Notice for
Form I-140, Immigrant Petition for Alien Worker. If you
entered the eligibility category (c)(36) in <b>Item Number
27.</b>, please provide the receipt number of your spouse\'s or
parent\'s Form I-797 Notice for Form I-140.</div>';
$pdf->writeHTMLCell(83, 5, 20, 137, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('about_you_eligibility_category_31a', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 32, 170);

//..........
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 30, 185, false); // angle 1
$pdf->StopTransform();

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>31.b.</b></div>';
$pdf->writeHTMLCell(20, 5, 12, 180, $html, 0, 1, false, true, 'J', true);
$html ='<div>If you entered the eligibility category (c)(35) or (c)(36) in
<b>Item Number 27.</b>, have you <b>EVER</b> been arrested for
and/or convicted of any crime?</div>';
$pdf->writeHTMLCell(83, 5, 20, 180, $html, 0, 1, false, true, 'J', true);
$html ='<div><input type="checkbox" name="ever_arested" value="y" checked=" " />Yes &nbsp;<input type="checkbox" name="ever_arested" value="n" checked=" " /> No</div>';
$pdf->writeHTMLCell(90, 7, 75, 190, $html, 0, 1, false, true, 'J', true);
//..............
$html ='<div><b>NOTE:</b> If you answered "Yes" to Item Number 31.b.
refer to <b>Employment-Based Nonimmigrant Categories,
Items 8. - 9.</b>, in the <b>Who May File Form I-765</b> section of
the Form I-765 Instructions for information about
providing court dispositions.</div>';
$pdf->writeHTMLCell(83, 5, 20, 200, $html, 0, 1, false, true, 'J', true);

//..........page 4 left end ...........................................................

//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 3. Applicant\'s Statement, Contact
Information, Declaration, Certification, and
Signature</b></div>';
$pdf->writeHTMLCell(90, 6, 113, 17, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Read the<b> Penalties</b> section of the Form 1-765
Instructions before completing this section. You must file
Form I-765 while in the United States.</div>';
$pdf->writeHTMLCell(90, 5, 112, 34, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Statement</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 49, $html, 0, 1, true, false, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a. or 1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 5, 112, 56, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a. </b><input type="checkbox" name="part3_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 112, 65, $html, 0, 1, false, true, 'J', true);
$html ='<div>I can read and understand English, and I have read
and understand every question and instruction on this
application and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 123, 65, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b. </b><input type="checkbox" name="part3_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 112, 80, $html, 0, 1, false, true, 'J', true);
$html ='<div>The interpreter named in Part 4. read to me every
question and instruction on this application and my
answer to every question in <br><br><br>
a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell(80, 7, 123, 80, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(80, 7, 123, 93, "", 1, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div><b>2. </b><input type="checkbox" name="part3_2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 112, 108, $html, 0, 1, false, true, 'J', true);
$html ='<div>At my request, the preparer named in <b>Part 5.</b>,<br><br><br>
prepared this application for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell(80, 7, 123, 108, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(80, 7, 123, 114, "", 1, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 130, $html, 0, 1, true, false, 'J', true);
//.........

$pdf->SetFont('times', '', 10);
$html= '<div><b>3.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 136, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(79, 7, 120, 136, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_telephone', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  120, 141);

//....

$pdf->SetFont('times', '', 10);
$html= '<div><b>4.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 149, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(79, 7, 120, 149, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_mobile', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),  120, 155);
//........

$pdf->SetFont('times', '', 10);
$html= '<div><b>5.<b/></div>';
$pdf->writeHTMLCell(90, 7, 112, 162, $html, 0, 0, false, true, 'J', true);
$html= '<div>Applicant\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(79, 7, 120, 162, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicants_contact_email', 83, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 168);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6. </b><input type="checkbox" name="part3_6" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(50, 7, 112, 176, $html, 0, 1, false, true, 'J', true);
$html ='<div>Select this box if you are a Salvadoran or Guatemalan
national eligible for benefits under the ABC
settlement agreement.</div>';
$pdf->writeHTMLCell(79, 7, 123, 176, $html, 0, 1, false, true, 'J', true);

//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Declaration and Certification</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 190, $html, 0, 1, true, false, 'J', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div>
Copies of any documents I have submitted are exact photocopies
of unaltered, original documents, and I understand that USCIS
may require that I submit original documents to USCIS at a later
date. Furthermore, I authorize the release of any information
from any and all of my records that USCIS may need to
determine my eligibility for the immigration benefit that I seek.
<br><br>
I furthermore authorize release of information contained in this
application, in supporting documents, and in my USCIS
records, to other entities and persons where necessary for the
administration and enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(92, 7, 112, 197, $html, 0, 1, false, true, 'J', true);

//.....page number 4 end -------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER');  // page number 5

//........
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 3. Applicant\'s Statement, Contact
Information, Declaration, Certification, and
Signature</b>(continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', true);
//......
$pdf->SetFont('times', '', 10);
$html ='<div>I understand that USCIS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:</div>';
$pdf->writeHTMLCell(90, 7, 12, 34, $html, 0, 1, false, true, 'J', true);

$pdf->SetFont('times', '', 10);
$html ='<div><b>1)</b> I reviewed and understood all of the information<br>&nbsp;&nbsp;
contained in, and submitted with, my application; and
<br><br>
<b>2)</b> All of this information was complete, true, and<br> &nbsp; &nbsp;
correct at the time of filing</div>';
$pdf->writeHTMLCell(80, 7, 22, 50, $html, 0, 1, false, true, 'J', true);
//......

$pdf->SetFont('times', '', 10);
$html ='<div>I certify, under penalty of perjury, that all of the information in
my application and any document submitted with it were
provided or authorized by me, that I reviewed and understand
all of the information contained in, and submitted with, my
application and that all of this information is complete, true, and
correct.</div>';
$pdf->writeHTMLCell(90, 7, 12, 72, $html, 0, 1, false, true, 'J', true);
//.........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 98, $html, 0, 1, true, false, 'J', true);

//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> Applicant\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(92, 7, 12, 105, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 22, 111, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 120, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('applicants_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 120);
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 109, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........
$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE TO ALL APPLICANTS:</b> If you do not completely fill
out this application or fail to submit required documents listed
in the Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(92, 7, 13, 128, $html, 0, 1, false, 'L');

//..........
$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 4. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 146, $html, 1, 0, true, true, 'L', true);
//......
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(91, 7, 12, 159, $html, 0, 1, false, 'L');
//.......
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 168,  $html,  0, 1, true, 'L');
//..........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp; Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 176, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 181);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp; Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 190, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_given_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 195);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 204, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_family_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 210);

//.......page 5 left end ........................................................................

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 4. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 1, 0, true, true, 'L', true);
//......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Interpreter\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 32, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 40, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_addres_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 42);
//..........
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.b.  </b>  <input type="checkbox" name="apt8" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste8" value="ste" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr8" value="flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 51, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_addres_apt_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 168, 51);
//.......... 
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 60, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_city_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 60);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 112, 69, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="interpreter_mailing_addres_state" size="0.25">';
 foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
  }
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 69, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 69);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 78, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 78);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 87, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_postalcode', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 87);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 92, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('interpreter_mailing_addres_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 98);
//..........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 113, 108,  $html,  0, 1, true, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Interpreter\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 112, 117, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 123);
//.........
$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Interpreter\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 130, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 136);
//......
$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Interpreter\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 112, 144, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 150);
//................

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 113, 160,  $html,  0, 1, true, 'L');
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
$pdf->writeHTMLCell(92, 7, 112, 167, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_certification', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155, 174);

//........

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 113, 213,  $html,  0, 1, true, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 112, 221, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 122, 227, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 236, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 236);

//..........page number 5 end ---------------------------------------------------------------------------



$pdf->AddPage('P', 'LETTER'); //page number 6

$pdf->SetFont('times', '', 12);
$pdf->setFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$html ='<div><b>Part 5. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//......
$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(91, 7, 12, 35, $html, 0, 1, false, 'L');
//.......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparers\'s Full Name</div>';
$pdf->writeHTMLCell(90, 7, 13, 43,  $html,  0, 1, true, 'L');

//..........



$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a.</b>&nbsp;&nbsp; Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 50, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 55.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b.</b>&nbsp;&nbsp; Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 12, 63, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_given_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 68.5);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 76, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_family_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 82);



//.......
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Preparer\'s Mailing Address</b></div>';
$pdf->writeHTMLCell(90, 7, 13, 91, $html, 0, 0, true, true, 'L', true);


//...........

$pdf->SetFont('times', '', 10);
$html = '<b>3.a.</b> &nbsp;&nbsp;Street Number<br> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 12, 99, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_addres_street', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 100);

//..........
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.b.  </b>  <input type="checkbox" name="apt8" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste8" value="ste" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr8" value="flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 12, 109, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_addres_apt_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 68, 109);
//.......... 

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 118, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_city_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 118);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; <b>3.e.</b>  &nbsp; ZIP Code'; 
$pdf->writeHTMLCell(65, 0, 12, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$html = '<select name="preparer_mailing_addres_state" size="0.25">';
 foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
  }
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 127, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_zipcode', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 127);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>7.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 136, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 136);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 145, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_postalcode', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 145);


$pdf->SetFont('Times', '', 10.5); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 151, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('preparer_mailing_addres_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 157);

//..........

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(90, 7, 13, 167,  $html,  0, 1, true, 'L');

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.</b>&nbsp; &nbsp; &nbsp; Preparers\'s Daytime Telephone Number </div>';
$pdf->writeHTMLCell(95, 7, 12, 174, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_daytime_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 180);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;  Preparers\'s Mobile Telephone Number (if any) </div>';
$pdf->writeHTMLCell(95, 7, 12, 190, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_mobile_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 196);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6. </b> &nbsp; &nbsp;  Preparers\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(95, 7, 12, 205, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparers_contact_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 211);

//..........page 6 left end ...................................................................





$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 0, 1);
$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(90, 7, 113, 17,  $html,  0, 1, true, 'L');

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.a.   <b/><input type="checkbox" name="part12_7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am not an attorney or accredited representative but
have prepared this application on behalf of the
applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(79, 7, 124, 25, $html, 0, 0, false, true, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>7.a.   <b/><input type="checkbox" name="part12_7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 112, 40, $html, 0, 0, false, true, 'J', true);
$html= '<div>I am an attorney or accredited representative and my
representation of the applicant in this case<br><input type="checkbox" name="a" value="Y" checked=" " />  extends <input type="checkbox" name="b" value="Y" checked=" " /> does not extend beyond the<br>
preparation of this application.</div>';
$pdf->writeHTMLCell(79, 7, 124, 40, $html, 0, 0, false, true, 'J', true);
//.........

$html= '<div><b>NOTE:</b> If you are an attorney or accredited
representative, you may be obliged to submit a
completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited
Representative, with this application.</div>';
$pdf->writeHTMLCell(79, 7, 124, 60, $html, 0, 0, false, true, 'J', true);

//.......

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(90, 7, 113, 85,  $html,  0, 1, true, 'L');

//......

$pdf->SetFont('times', '', 10);
$html= '<div>By my signature, I certify, under penalty of perjury, that I
prepared this application at the request of the applicant. The
applicant then reviewed this completed application and
informed me that he or she understands all of the information
contained in, and submitted with, his or her application,<br>
including the <b>Applicant\'s Declaration and  Certification,</b> and that all of this
information is complete, true, and correct. I completed this
application based only on information that the applicant
provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(88, 7, 112, 95, $html, 0, 0, false, true, 'J', true);

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 113, 145,  $html,  0, 1, true, 'L');


//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b> &nbsp; Preparer\'s Signature </div>';
$pdf->writeHTMLCell(92, 7, 112, 153, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(81, 7, 122, 159, '', 1, 0, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 112, 168, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('Preparer_signature_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 173, 168);


//.......page number 6 end ----------------------------------------------------------------------------------



$pdf->AddPage('P', 'LETTER'); //page number 7

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 6. Additional Information </div>';
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

                                            //.......page 6. left end 
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
    'attorney_uscis_online_number':' $attorneyData->uscis_online_account_number',
    'about_you_family_lastname':' ',
    'about_you_family_firstname':' ',
    'about_you_family_middlename':' ',

    'about_you_family_lastname2':' ',
    'about_you_family_firstname2':' ',
    'about_you_family_middlename2':' ',

    'about_you_family_lastname3':' ',
    'about_you_family_firstname3':' ',
    'about_you_family_middlename3':' ',

    'about_you_family_lastname4':' ',
    'about_you_family_firstname4':' ',
    'about_you_family_middlename4':' ',

    'information_about_you_us_mail_in_care_name':' ',
    'information_about_you_us_mail_street':' ',
    'information_about_you_us_mail_apt_ste_flr':' ',
    'information_about_you_us_mail_city_town':' ',
    'information_about_you_us_mail_state':' ',
    'information_about_you_us_mail_zipcode':' ',

    'about_you_us_physical_street':' ',
    'about_you_us_physical_apt_ste_flr':' ',
    'about_you_us_physical_city_town':' ',
    'about_you_us_physical_state':' ',
    'about_you_us_physical_zipcode':' ',

    'about_you_alien_reg_number':' ',
    'about_you_uscis_online_ac_number':' ',
    'about_you_ssn_number':' ',

    'about_you_father_lastname':' ',
    'about_you_father_firstname':' ',
    'about_you_mother_lastname':' ',
    'about_you_mother_firstname':' ',
    'country1':' ',
    'country2':' ',

    'about_you_village_of_birth':' ',
    'about_you_province_of_birth':' ',
    'about_you_country_of_birth':' ',
    'about_you_date_of_birth':' ',

    'about_you_dept_record_number':' ',
    'about_you_passport_number':' ',
    'about_you_travel_document_number':' ',
    'about_you_country_issued_passport':' ',
    'about_you_passport_expire_date':' ',
    'about_you_us_last_arrival_date':' ',
    'about_you_last_arrival_place':' ',
    'about_you_last_arrival_status':' ',
    'about_you_current_arrival_status':' ',
    'about_you_sevis_number':' ',

    'eligibility1':' ',
    'eligibility2':' ',
    'eligibility3':' ',
    'about_you_degree':' ',
    'about_you_employee_everyfy':' ',
    'about_you_eligibility_category':' ',
    'about_you_employee_everyfy_company_number':' ',
    'about_you_date_you_presented_dhs':' ',
    'about_you_location_presented_dhs':' ',
    'about_you_country_claimed_prescution':' ',
    'about_you_explain_didnt_enter':' ',
    'about_you_eligibility_category_31a':' ',

    'applicants_contact_telephone':' ',
    'applicants_contact_mobile':' ',
    'applicants_contact_email':' ',
    'applicants_signature_date':' ',

    'interpreter_family_last_name':' ',
    'interpreter_family_given_name':' ',
    'interpreter_family_business_name':' ',

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
$pdf->Output('I-751.pdf', 'I');

