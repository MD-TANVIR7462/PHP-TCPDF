<?php

//require_once('form_header.php');   //database connection file 

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
		
		$this->Cell(40, 6, "Form I-290B Edition 12/02/19 ", 0, 0, 'L');
		
		
		// if ($this->page == 1){
			$barcode_image = "images/I-290B-footer-pdf417-$this->page.png";
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
$pdf->SetTitle('Form I-290B');

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
$pdf->MultiCell(105, 7, "Notice of Appeal or Motion", 0, 'C', 0, 1, 55, 10, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm I-290B", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0095\nExpires 05/31/2020", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->SetFont('times', 'B', 10);
$pdf->writeHTMLCell(190, 45, 13, 33, '',  1,  0, false, false, 'C', true);
$pdf->writeHTMLCell(12, 44.5, 13.2, 33.3, '',  'R',  1, true, true, 'L', true);
$html ='<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell(12, 30, 13, 44, $html, 0, 1, false, true, 'C', true);


$pdf->writeHTMLCell(1, 44, 80, 33.5, '',  'R',  1, false, true, 'L', false);  //vertical line (|)
$pdf->writeHTMLCell(1, 44, 52, 33.5, '',  'R',  1, false, true, 'L', false);   //vertical line (|)
$pdf->writeHTMLCell(1, 44, 140, 33.5, '',  'R',  1, false, true, 'L', false);   //vertical line (|)

$pdf->writeHTMLCell(55, 1, 25.5, 38, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 45.5, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 52.7, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 60, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)
$pdf->writeHTMLCell(55, 1, 25.5, 67, '',  'B',  1, false, true, 'L', false);   //horizontal line (---)

$pdf->SetFont('times', '', 9);
$pdf->writeHTMLCell(55, 5, 25, 33, 'Returned', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 33, 'Reloc Sent', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 44, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 44, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 52, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 52, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 59, 'Resubmitted ', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 59, 'Reloc Rec\'d', 0,  1, false, true, 'L', false);


$pdf->writeHTMLCell(55, 5, 25, 66, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 66, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->writeHTMLCell(55, 5, 25, 73, 'Date____/____/____', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 53, 73, 'Date____/____/____', 0,  1, false, true, 'L', false);

$pdf->SetFont('times', 'B', 9);
$pdf->writeHTMLCell(55, 5, 105, 33, 'Receipt', 0,  1, false, true, 'L', false);
$pdf->writeHTMLCell(55, 5, 165, 33, 'Remarks', 0,  1, false, true, 'L', false);

//table end 


// table 2 start 
$pdf->writeHTMLCell(190, 18, 13, 80, '',  1,  0, false, false, 'C', true);
$pdf->SetFont('times', '', 11);
$pdf->writeHTMLCell(1, 18, 56, 80, '',  'R',  1, false, true, 'L', false);
$html ="<div><b>To be completed by an attorney or accredited representative </b>(if any).</div>";
$pdf->writeHTMLCell(43.3, 17.3, 13.2, 80.3, $html, 0, 1, true, false, 'C', false);
//..........
$pdf->SetFont('times', 'B', 11);
$html ='<div> <input type="checkbox" name="agree" value="1" checked=" " />  Select this box if Form G-28 is <br> attached.</div>';
$pdf->writeHTMLCell(40, 18, 53, 80, $html, 'R', 0, false, true, 'C', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 18, 93, 80, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),94, 90);
//.............
$pdf->SetFont('times', '', 10);
$html ='<div><b>Attorney or Accredited Representative USCIS Online Account Number </b>(if any) </div>';
$pdf->writeHTMLCell(62, 18, 138, 80, $html, 0, 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 60, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),140, 90);
//....table 2 end .........

$pdf->SetFont('times', 'B', 10);
$html ='<div>Please visit <a>www.uscis.gov/i-290b/jurisdiction</a> for information on the immigration benefit types that are eligible for an appeal
or motion using this form. </div>';
$pdf->writeHTMLCell(190, 7, 12, 98, $html, 0, 0, false, true, 'L', true);
//............

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 108, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 14, 105, false); // angle 1
$pdf->StopTransform();
//..........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 1. Information About the Applicant or
Petitioner</b></div>';
$pdf->writeHTMLCell(90, 12, 13, 115, $html, 1, 1, true, false, 'L', true);
//.........
$pdf->SetFont('times', '', 10);
$html ='<div>If you are an individual filing this appeal or motion, complete
<b>Item Number 1.</b> If you are a business or organization,
complete <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(90, 12, 12, 127, $html, 0, 1, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 139, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 141);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 148, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_given_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 150);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 7, 12, 159, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 159);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>2.  </b> Business or Organization (if applicable) </div>';
$pdf->writeHTMLCell(90, 7, 12, 167, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_middlename', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 173);
//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.   </b> Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 180, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_info_align_reg_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 185);
$pdf->SetFont('times', '', 12);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(10, 7, 45, 185, $html, 0, 1, false, true, 'J', true);
//.....
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 35, 170, false); // angle 2
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 37, 182, false); // angle 3
$pdf->StopTransform();
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.   </b>  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 192, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('applicant_info_usis_online_account_number', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 198);
//....page 1 left side end .................................................................
$pdf->SetFillColor(220, 220, 220);
//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Mailing Address  </b> (or Military APO/FPO Address,
if applicable) </div>';
$pdf->writeHTMLCell(90, 5, 113, 115, $html, 0, 1, true, false, 'L', true);

//......
$pdf->SetFont('times', 'I', 9);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input">(USPS ZIP Code Lookup)</a></div>';
$pdf->writeHTMLCell(80, 5, 118, 121, $html, 0, 1, true, false, 'R', true);
//.......
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.a. </b>&nbsp; &nbsp;In Care Of Name</div>';
$pdf->writeHTMLCell(90, 7, 112, 127, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_in_care_name', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 123, 132);
//.....
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.b. </b> Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 140, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_street', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 142);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.c. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 151, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_apt_ste_flr', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 151);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 160, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 160);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>5.e.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 112, 169, $html, '', 0, 0, true, 'L');

$html = '<select name="information_about_applicant_mail_state" size="0.50">';
foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 129.5, 169, $html, '', 0, 0, true, 'L');
$html= '<div><b>5.f.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 169, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_applicant_mail_zipcode', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 169);
//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.g.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 178, $html, '', 0, 0, true, 'L'); 
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 178);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.h.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 187, $html, '', 0, 0, true, 'L'); 
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 187);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>5.i.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 193, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_applicant_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 198);
//..........

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 2. Information About the Appeal or Motion</b></div>';
$pdf->writeHTMLCell(90, 7, 112, 208, $html, 1, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Please indicate whether you are filing an appeal to the
Administrative Appeals Office (AAO) or a motion. You are not
allowed to file both an appeal and a motion on a single form.<b> If
you select more than one box, your filing may be rejected.
NOTE: DO NOT use this form if you are filing an appeal
relating to a Form 1-130, Petition for Alien Relative, or a
Form 1-360, Self-Petition for a Widow(er) of a U.S. Citizen
You must file those appeals with the Board of Immigration
Appeals using Form EOIR-29</b>.</div>';
$pdf->writeHTMLCell(90, 7, 112, 216, $html, 0, 0, false, true, 'L', true);

//.......page number 1 end -------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER');  // page number 2
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 2. Information About the Appeal or Motion  </b>(continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b><input type="checkbox" name="part2_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 28, $html, 0, 0, false, 'L');
$html = '<div>I am filing an <b>appeal</b> to the AAO. My brief and/or
additional evidence is attached. </div>';
$pdf->writeHTMLCell(80, 7, 24, 28, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b><input type="checkbox" name="part2_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 38, $html, 0, 0, false, 'L');
$html = '<div>I am filing an <b>appeal</b> to the AAO. I will submit my
brief and or additional evidence to the AAO within
30 calendar days of filing the appeal. </div>';
$pdf->writeHTMLCell(80, 7, 24, 38, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.c. </b><input type="checkbox" name="part2_1c" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 52, $html, 0, 0, false, 'L');
$html = '<div>I am filing an <b>appeal</b> to the AAO. I will not b
submitting a brief and/or additional evidence.</div>';
$pdf->writeHTMLCell(80, 7, 24, 52, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.d. </b><input type="checkbox" name="part2_1d" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 62, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reopen.</b> My brief and/or
additional evidence is attached.</div>';
$pdf->writeHTMLCell(80, 7, 24, 62, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.e. </b><input type="checkbox" name="part2_1e" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 72, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reconsider.</b> My brief is
attached.</div>';
$pdf->writeHTMLCell(80, 7, 24, 72, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.f. </b><input type="checkbox" name="part2_1f" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 82, $html, 0, 0, false, 'L');
$html = '<div>I am filing a <b>motion to reopen</b> and a <b>motion to
reconsider.</b> My brief and/or additional evidence is
attached.</div>';
$pdf->writeHTMLCell(80, 7, 24, 82, $html, 0, 0, false, 'L');


//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 95, $html, 0, 0, false, 'L');
$html = '<div>USCIS Form for the Application or Petition That is the
Subject of This Appeal or Motion (for example, Form
1-140, 1-360, 1-129, 1-485, 1-601)</div>';
$pdf->writeHTMLCell(80, 7, 20, 95, $html, 0, 0, false, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_uscis_form', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 108);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 95, $html, 0, 0, false, 'L');
$html = '<div>USCIS Form for the Application or Petition That is the
Subject of This Appeal or Motion (for example, Form
1-140, 1-360, 1-129, 1-485, 1-601)</div>';
$pdf->writeHTMLCell(80, 7, 20, 95, $html, 0, 0, false, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('information_about_uscis_form', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 108);

//..........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 118, $html, 0, 0, false, 'L');
$html = '<div>Receipt Number for the Application or Petition</div>';
$pdf->writeHTMLCell(80, 7, 20, 118, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('receipt_number_for_the_applicant', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 123);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 131, $html, 0, 0, false, 'L');
$html = '<div>Requested Nonimmigrant or Immigrant Classification (for
example, H-IB, R-1, 0-1, EB-1, EB-2, if applicable)</div>';
$pdf->writeHTMLCell(80, 7, 20, 131, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2_4_request_nominigrant_example', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 143);
//..........

$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 150, $html, 0, 0, false, 'L');
$html = '<div>Date of the Adverse Decision (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 20, 150, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2_5_date_of_the_adverse_decision', 43, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 60, 155);
//..........


$pdf->SetFont('times', '', 10);
$html = '<div><b>6.  </div>';
$pdf->writeHTMLCell(20, 7, 12, 162, $html, 0, 0, false, 'L');
$html = '<div>Office That Issued the Adverse Decision</div>';
$pdf->writeHTMLCell(80, 7, 20, 162, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->ComboBox('part2_office_that_issued_advarse_decision', 82, 7, array(

'Administrative Appeals Office  (AAO)',
'Humanitrian Affairs Branch  (RIH)',
'Agana  (AGA)',
'Albany  (ALB)',
'Albuquerque  (ABQ)',
'Anchorage  (ANC)',
'Atlanta  (ATL)',
'Baltimore  (BAL)',
'Boise  (BOI)',
'Boston  (BOS)',
'Buffalo  (BUF)',
'California Service Center  (WAC)',
'Charleston  (CHL)',
'Charlotte  (CLT)',
'Charlotte Amalie  (CHA)',
'Chicago  (CHI)',
'Chula Vista  (CVC)',
'Cincinnati  (CIN)',
'Cleveland  (CLE) ',
'Columbus  (CLM)',
'Dallas  (DAL)',
'Denver  (DEN)',
'Des Moines  (DSM)',
'Detroit  (DET)',
'El Paso  (ELP)',
'Fresno  (FRE)',
'Fort Smith AR  (FSA)',
'Greer Field  (GRR)',
'Harlingen  (HLG)',
'Hartford  (HAR)',
'Helena  (HEL)',
'Hialeah  (HIA)',
'Honolulu  (HHW)',
'Houston  (HOU)',
'Humanitrian Affairs Branch  (HAB)',
'Indianapolis  (INP)',
'International Operation  (IO)',
'Jacksonville  (JAC)',
'Kansas City  (KAN)',
'Kendall  (KND)',
'Las Vegas  (LVG)',
'Lawrance  (LAW)',
'Long Island  (LNY)',
'Los Angles  (LAC)',
'Los Angles  (LOS)',
'Los Angles  (SFV)',
'Louisville  (LOU)',
'Manchester  (MAN)',
'Memphis  (MEM)',
'Miami (MIA)',
'Milwaukee  (MIL)',
'Mount Laurel  (MTL)',
'National Benefits Center  (NBC)',
'Nebaraska Service Center  (LIN)',
'New Jersey  (NEW)',
'New Orleans  (NOL)',
'New York City  (NYC)',
'Norfolk  (NOR)',
'Oakland park  (OKL)',
'Oklahoma City   (OKC)',
'Omaha  (OMA)',
'Orlando  (ORL)',
'Philadelphia  (PHI)',
'Phoenix  (PHO)',
'Pittsburgh  (PIT)',
'Portland,ME   (POM)',
'Portland  (POO)',
'Providence  (PRO)',
'Queens  (QNS)',
'Raleigh-Durham  (RAL)',
'Refugee International Humanitrian  (RIH)',
'Refugee, Asylum, and International Operations  (RAIO)',
'Reno  (REN)',
'Sacramento  (SAC)',
'Salt Lake City  (SLC)',
'San Antonio  (SNA)',
'San Bernardino  (SBD)',
'San Diego  (SND)',
'San Francisco  (SFR)',
'San Jose  (SNJ)',
'San Juan  (SAJ)',
'Santa Ana  (SAA)',
'Seattle Field  (SEA)',
'Spokane  (SPO)',
'St. Albans  (STA)',
'St. Louis  (STL)',
'St. Paul  (SPM)',
'Tampa T (AM)',
'Texas Service Center (SRC)',
'Tucson TUC',
'Vermont Service Center  (EAC)',
'Washington  (WAS)',
'West Palm Beach  (WPB)',
'Yakima  (YAK)',
'Other'
	
), array(), array(), 21, 167);



$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 3. Basis for the Appeal or Motion </b></div>';
$pdf->writeHTMLCell(90, 7, 13, 177, $html, 1, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>In <b>Part 7. Additional Information</b>, or on a separate sheet of 
paper, <b>you must provide a statement regarding the basis for 
the appeal or motion</b>. If you attach a separate sheet of paper, 
type or print your name and A-Number (if any) at the top of 
each sheet; indicate the <b>Page Number, Part Number, and Item 
Number</b> to which your answer refers; and sign and date each 
sheet.</div>';
$pdf->writeHTMLCell(91, 7, 12, 185, $html, 0, 0, false, 'L');
//.......
$pdf->SetFont('times', '', 10);
$html = '<div><b>Appeal:</b> Provide a statement that specifically identifies 
an erroneous conclusion of law or fact in the decision 
being appealed. <b>You must provide this information 
with your Form I-290B even if you intend to submit a 
brief later.</b></div>';
$pdf->writeHTMLCell(91, 7, 12, 214, $html, 0, 0, false, 'L');
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>Motion to Reopen:</b> A motion to reopen must state new facts 
and be supported by documentary evidence demonstrating 
eligibility for the requested immigration benefit at the time you 
filed the application or petition.</div>';
$pdf->writeHTMLCell(91, 7, 12, 233, $html, 0, 0, false, 'L');
//........... page 2 left end ..............................................

$pdf->SetFont('times', '', 10);
$html = '<div><b>Motion to Reconsider:</b> A motion to reconsider must 
demonstrate that the decision was based on an incorrect 
application of law or policy, and that the decision was incorrect 
based on the evidence in the case record at the time of the 
decision. The motion must be supported by citations to 
appropriate statutes, regulations, precedent decisions, or 
statements of USCIS policy.</div>';
$pdf->writeHTMLCell(91, 7, 112, 17, $html, 0, 0, false, 'L');
//.....
$pdf->SetFont('times', 'B', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Part 4. Applicant\'s or Petitioner\'s Statement, Contact Information, Certification, and Signature </div>';
$pdf->writeHTMLCell(91, 7, 112, 47, $html, 1, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Read the </b>Penalties</b> section of the Form I-290B 
Instructions before completing this part.</div>';
$pdf->writeHTMLCell(91, 7, 112, 63, $html, 0, 0, false, 'L');

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Section A</div>';
$pdf->writeHTMLCell(91, 7, 112, 73, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>If you are filing an appeal or motion based on an APPLICATION OR PETITION FILED BY AN INDIVIDUAL (NOT A BUSINESS OR ORGANIZATION), complete this section:</div>';
$pdf->writeHTMLCell(92, 7, 112, 80, $html, 0, 0, false, true, 'L', true);
//.....
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Applicant\'s or Petitioner\'s Statement</div>';
$pdf->writeHTMLCell(91, 7, 112, 97, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or <b>1.b.</b> If 
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(92, 7, 112, 105, $html, 0, 0, false, true, 'L', true); 

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b><input type="checkbox" name="part4_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 112, 115, $html, 0, 0, false, 'L');
$html = '<div>I can read and understand English, and I have read 
and understand every question and instruction on this 
form and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 124, 115, $html, 0, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b><input type="checkbox" name="part4_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 112, 128, $html, 0, 0, false, 'L');
$html = '<div>The interpreter named in Part 5. has read to me every 
question and instruction on this form, and my answer 
to every question, in <br><br><br>
a language in which I am fluent. I understood all of 
this information as interpreted.
</div>';
$pdf->writeHTMLCell(80, 7, 124, 128, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 124, 141, "", 1, 0, false, 'L');

//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b> <input type="checkbox" name="part4_2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 112, 157, $html, 0, 0, false, 'L');
$html = '<div>At my request, the preparer named in <b>Part 6</b>. 
prepared this form for me based only upon 
information I provided or authorized</div>';
$pdf->writeHTMLCell(80, 7, 124, 157, $html, 0, 0, false, 'L');

//.....
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Applicant\'s or Petitioner\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 7, 112, 173, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>3. </b>   Applicant\'s or Petitioner\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 181, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_daytime_telephone', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 186);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4. </b> Applicant\'s or Petitioner\'s Mobile Telephone Number<br> &nbsp; &nbsp; 
(if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 194, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_mobile_telephone', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 203);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5. </b> Applicant\'s or Petitioner\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 211, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_applicant_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 216);
//...........page number 2 end --------------------------------------------------------------------



$pdf->AddPage('P', 'LETTER');  // page number 3
//.....
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 4. Applicant\'s or Petitioner\'s Statement, Contact Information, Certification, and Signature </b>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Applicant\'s or Petitioner\'s Certification</div>';
$pdf->writeHTMLCell(91, 7, 13, 35, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of my records that USCIS may need to determine my eligibility for the immigration benefit that I seek.</div>';
$pdf->writeHTMLCell(92, 7, 12, 43, $html, 0, 0, false, true, 'L', false);

//......

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I further authorize release of information contained in this form, 
in supporting documents, and in my USCIS records, to other 
entities and persons where necessary for the administration and 
enforcement of U.S. immigration law.</div>';
$pdf->writeHTMLCell(92, 7, 12, 73, $html, 0, 0, false, true, 'L', false);
//......

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I certify, under penalty of perjury, that all of the information in 
my form and any document submitted with it were provided or 
authorized by me, that I reviewed and understand all of the 
information contained in, and submitted with, my form, and that 
all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(92, 7, 12, 90, $html, 0, 0, false, true, 'L', false);
//...........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 13, 112, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.a.  </b>   Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 122, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 127, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 136, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_applicant_signature', 30, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 74, 136);
//.........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Section B</div>';
$pdf->writeHTMLCell(91, 7, 13, 145, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If you are filing an appeal or motion based on a <b>PETITION FILED BY A BUSINESS OR ORGANIZATION (NOT AN INDIVIDUAL)</b>, complete this section:</div>';
$pdf->writeHTMLCell(92, 7, 12, 154, $html, 0, 0, false, true, 'L', false);
//...........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Petitioner\'s Statement</div>';
$pdf->writeHTMLCell(91, 7, 13, 168, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>NOTE:</b> Select the box for either<b> Item Number 1.a.</b> or <b>1.b.</b> If 
applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(92, 7, 12, 176, $html, 0, 0, false, true, 'L', false);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b><input type="checkbox" name="part4b_1a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 185, $html, 0, 0, false, 'L');
$html = '<div>I can read and understand English, and I have read 
and understand every question and instruction on this 
form and my answer to every question.</div>';
$pdf->writeHTMLCell(80, 7, 24, 185, $html, 0, 0, false, 'L');
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b><input type="checkbox" name="part4b_1b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 198, $html, 0, 0, false, 'L');
$html = '<div>The interpreter named in <b>Part 5.</b> has read to me every 
question and instruction on this form, and my answer 
to every question, in <br><br><br>

a language in which I am fluent. I understood all of 
this information as interpreted.
</div>';
$pdf->writeHTMLCell(80, 7, 24, 198, $html, 0, 0, false, 'L');
$pdf->writeHTMLCell(80, 7, 24, 210, "", 1, 0, false, 'L');

//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b>   <input type="checkbox" name="part4b_2" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 230, $html, 0, 0, false, 'L');
$html = '<div>At my request, the preparer named in<b> Part 6.</b>
prepared this form for me based only upon 
information I provided or authorized. </div>';
$pdf->writeHTMLCell(80, 7, 24, 230, $html, 0, 0, false, 'L');

//........page 3 left side end ..............................................................

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Petitioner\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div>Provide the following information about the petitioner\'s 
authorized signatory.</div>';
$pdf->writeHTMLCell(91, 7, 112, 24, $html, 0, 0, false, 'L');
//..............

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 33, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_family_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 35);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 42, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_given_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 44);
//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name </div>';
$pdf->writeHTMLCell(35, 7, 112, 53, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_petitioner_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 53);

//......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4. </b> Title</div>';
$pdf->writeHTMLCell(90, 0, 112, 60, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_title', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 65);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5. </b> Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 73, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_daytime_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 78);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>6. </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 86, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_mobile_telephone_number', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 91);

//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>7. </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 99, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_petitioner_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 104);

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Petitioner\'s Certification</div>';
$pdf->writeHTMLCell(91, 7, 113, 114, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Copies of any documents submitted are exact photocopies of 
unaltered, original documents, and I understand that, as the 
petitioner, I may be required to submit original documents to 
USCIS at a later date.</div>';
$pdf->writeHTMLCell(90, 0, 112, 122, $html, '', 0, 0, true, 'L'); 
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I authorize the release of any information from my records, or 
from the petitioning organization\'s records, to USCIS or other 
entities and persons where necessary to determine eligibility for 
the immigration benefit sought or where authorized by law. I 
recognize the authority of USCIS to conduct audits of this form 
using publicly available open source information. I also 
recognize that any supporting evidence submitted in support of 
this form may be verified by USCIS through any means 
determined appropriate by USCIS, including but not limited to, 
on-site compliance reviews.</div>';
$pdf->writeHTMLCell(90, 0, 112, 140, $html, '', 0, 0, true, 'L');
//.........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>If filing this form on behalf of an organization, I certify that I 
am authorized to do so by the organization.</div>';
$pdf->writeHTMLCell(90, 0, 112, 181, $html, '', 0, 0, true, 'L');

//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I certify, under penalty of perjury, that I have reviewed this 
form, I understand all of the information contained in, and 
submitted with, my appeal or motion, and all of this information 
is complete, true, and correct</div>';
$pdf->writeHTMLCell(90, 0, 112, 191, $html, '', 0, 0, true, 'L'); 
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 113, 209, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.  </b>   Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 112, 216, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 121, 221, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 112, 230, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_applicant_signature', 30, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 230);
//.........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>NOTE TO ALL APPLICANTS AND PETITIONERS:</b> If 
you do not completely fill out this form or fail to submit 
required documents listed in the Instructions, USCIS may 
dismiss, deny, or reject your appeal or motion.</div>';
$pdf->writeHTMLCell(90, 0, 112, 238, $html, '', 0, 0, true, 'L'); 
//..........page number 3 end ...............................................................................................

$pdf->AddPage('P', 'LETTER');  // page number 4
//.....
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 5. Interpreter\'s Contact Information, 
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(90, 0, 12, 28, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Interpreter\'s Full Name</div>';
$pdf->writeHTMLCell(91, 7, 13, 34, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.a. </b>  Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 0, 12, 42, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_family_lastname', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 47);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.b. </b>  Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 0, 12, 55, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_given_firstname', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 60);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2. </b> Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 0, 12, 68, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_business_org_name', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 73);
//.........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 7, 13, 82, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a. </b> Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 12, 90, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_street_name', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 46, 92);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 12, 101, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_apt_flor', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63, 101);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 12, 110, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 48, 110);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.d.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 12, 119, $html, '', 0, 0, true, 'L');

$html = '<select name="part5_interpreter_mailing_state" size="0.50">';
foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 7, 29.5, 119, $html, '', 0, 0, true, 'L');
$html= '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 46, 119, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_mailing_zip_code', 32, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 71, 119);
//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 128, $html, '', 0, 0, true, 'L'); 
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mailing_province', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 128);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 137, $html, '', 0, 0, true, 'L'); 
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mailing_postal_code', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 137);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 143, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mailing_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 148);
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Interpreter\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 7, 13, 157, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4. </b>   Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 12, 164, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_daytime_telephone', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 169);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5. </b>   Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 176, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_mobile_telephone', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 181);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>6. </b>  Interpreter\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(90, 0, 12, 188, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 193);
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Interpreter\'s Certification</div>';
$pdf->writeHTMLCell(91, 7, 13, 201, $html, 0, 0, true, true, 'L', true);
//.........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I certify, under penalty of perjury, that: <br><br>
I am fluent in English and<br>which is the same language specified in <b>Part 4., Item Number 
1.b</b>. in <b>Section A</b> or <b>Section B,</b> and I have read to this applicant 
or petitioner in the identified language every question and 
instruction on this form and his or her answer to every question. 
The applicant or petitioner informed me that he or she 
understands every instruction, question, and answer on the 
form, including the <b>Applicant\'s or Petitioner\'s Certification,</b> 
and has verified the accuracy of every answer. 

</div>';
$pdf->writeHTMLCell(90, 7, 12, 207, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_interpreter_certification', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 212);
//...........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Interpreter\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b>   Interpreter\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 112, 25, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 121, 30, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 112, 39, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_interpreter_signature', 30, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 39);

//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 6. Contact Information, Declaration, and 
Signature of the Person Preparing this Form, if 
Other Than the Applicant or Petitioner</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 48, $html, 1, 0, true, true, 'L', true);
//...........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(90, 0, 112, 64, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(91, 7, 113, 70, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.a. </b>  Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 0, 112, 78, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_family_lastname', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 83);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>1.b. </b>  Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 0, 112, 91, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_given_firstname', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 96);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>2. </b> Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 0, 112, 104, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_business_org_name', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 109);
//.........

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(91, 7, 113, 118, $html, 0, 0, true, true, 'L', true);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a. </b> Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell(40, 12, 112, 126, $html, 0, 1, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_preparer_mailing_street_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 146, 128);

//...........
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 137, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_preparer_mailing_apt_flor', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 164, 137);

//......

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell(50, 5, 112, 146, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_prepare_mailing_city_town', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 148, 146);
//............

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.d.</b> &nbsp;State</div>';
$pdf->writeHTMLCell(50, 0, 112, 155, $html, '', 0, 0, true, 'L');

$html = '<select name="part5_preparer_mailing_state" size="0.50">';
foreach($allDataCountry as $record){
$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 7, 129.5, 155, $html, '', 0, 0, true, 'L');
$html= '<div><b>3.e.</b>&nbsp;ZIP Code</div>';
$pdf->writeHTMLCell(30, 7, 146, 155, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_prepare_mailing_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 171, 155);
//..........

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 164, $html, '', 0, 0, true, 'L'); 
//.......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_mailing_province', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 164);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 173, $html, '', 0, 0, true, 'L'); 
//......
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_mailing_postal_code', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 173);
//........
$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 180, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_mailing_country', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 185);
//..........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Preparer\'s Contact Information</div>';
$pdf->writeHTMLCell(91, 7, 113, 194, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4. </b>   Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 203, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_daytime_telephone', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 208);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>5. </b>   Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 216, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_prepare_mobile_telephone', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 221);
//..........
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>6. </b>  Preparer\'s Email Address (if any) </div>';
$pdf->writeHTMLCell(90, 0, 112, 229, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part5_preparer_email_address', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 234);

//.......... page number 4 end ----------------------------------------------------------------------------------------

// add a page
$pdf->AddPage('P', 'LETTER');  // page number 5
//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Part 6. Contact Information, Declaration, and 
Signature of the Person Preparing this Form, if 
Other Than the Applicant or Petitioner</b>(continued)</div>';
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 0, true, true, 'L', true);
//...........


$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(91, 7, 13, 38, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.a. </b><input type="checkbox" name="part6_7a" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 46, $html, 0, 0, false, 'L');
$html = '<div>I am not an attorney or accredited representative but 
have prepared this form on behalf of the applicant or 
petitioner and with the applicant\'s or petitioner\'s 
consent.</div>';
$pdf->writeHTMLCell(80, 7, 24, 46, $html, 0, 0, false, 'L');
//........

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.b. </b><input type="checkbox" name="part6_7b" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(20, 7, 12, 63, $html, 0, 0, false, 'L');
$html = '<div>I am an attorney or accredited representative and 
have prepared this form on behalf of the applicant or 
petitioner and with the applicant\'s or petitioner\'s 
consent.</div>';
$pdf->writeHTMLCell(80, 7, 24, 63, $html, 0, 0, false, 'L');
//........
$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(91, 7, 13, 82, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html = '<div>By my signature, I certify, under penalty of perjury, that I 
prepared this form at the request of the applicant or petitioner. 
The applicant or petitioner then reviewed this completed form 
and informed me that he or she understands all of the 
information contained in, and submitted with, his or her form, 
including the <b>Applicant\'s or Petitioner\'s Certification,</b> and 
that all of this information is complete, true, and correct. I 
completed this form based only on information that the 
applicant or petitioner provided to me or authorized me to 
obtain or use.</div>';
$pdf->writeHTMLCell(90, 7, 12, 90, $html, 0, 0, false, 'L');

$pdf->SetFont('times', 'BI', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(91, 7, 13, 135, $html, 0, 0, true, true, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.  </b>   Applicant\'s or Petitioner\'s Signature</div>';
$pdf->writeHTMLCell(90, 7, 12, 144, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 150, "", 1, 1, false, true, 'J', true);
//........
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.  </b> Date of Signature (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part6_preparer_signature', 30, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 74, 160);


//......... page number 5 end ------------------------------------------------------------------------------------

$pdf->AddPage('P', 'LETTER');  // page number 6

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'B', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div>Part 7. Additional Information </div>';
$pdf->writeHTMLCell(92, 7, 13, 18, $html, 1, 1, true, 'L');
//........
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>If you need extra space to provide any additional information
within this form, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this form or attach a separate sheet of 
paper. Type or print your name and A-Number at the
top of each sheet; indicate the<b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
$pdf->writeHTMLCell(95, 25, 12, 26, $html, 0, 1, 0, true, 'L', false, false);
//...........


$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 73, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 74, '', 1, 0, false, 'L');
//........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 83, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 84, '', 1, 0, false, 'L');
//.......
$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 93, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 45, 94, '', 1, 0, false, 'L');
//.......

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell(40, 7, 12, 103, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 60, 103, '', 1, 0, false, 'L');
$pdf->StartTransform();
$pdf->Rotate(-31);
$pdf->SetFont('zapfdingbats', '', 10);  // symbol font
$pdf->writeHTMLCell(40, 7, 55, 133, TCPDF_FONTS::unichr(116), 0, 0, false, 'L');
$pdf->StopTransform();
$pdf->setFont('Times', '', 12);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(7, 7, 52, 103, $html, 0, 0, false, 'L');
//............

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 119);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 119);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 114, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 119);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 128, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 20, 128, $html, 0, 0, false, 'L');

//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 12, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 193);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 43, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 193);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 75, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 83, 193);
//.........


$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 202, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="13" name="additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 30, 20, 202, $html, 0, 0, false, 'L');

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
$pdf->writeHTMLCell(30, 7, 112, 94, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 100);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 94, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 100);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 94, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 100);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 110, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="14" name="additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 60, 119, 110, $html, 0, 0, false, 'L');

//..........


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 173, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 180);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 173, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 180);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 173, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_7c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 180);
//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 112, 190, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="20" rows="12" name="additional_information_7d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 119, 190, $html, 0, 0, false, 'L');
//.........
$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE:</b> Make sure your appeal or motion is complete before 
filing.</div>';
$pdf->writeHTMLCell(90, 7, 113, 242, $html, 0, 0, false, 'L');

























































$js = "
var fields = {
    'attorney_statebar_number':' ',
    'attorney_uscis_online_number':' ',

    'applicant_family_lastname':' ',
    'applicant_given_firstname':' ',
    'applicant_middlename':' ',
    'applicant_info_align_reg_number':' ',
    'applicant_info_usis_online_account_number':' ',

    'information_about_applicant_mail_in_care_name':' ',
    'information_about_applicant_mail_street':' ',
    'information_about_applicant_mail_apt_ste_flr':' ',
    'information_about_applicant_mail_city_town':' ',
    'information_about_applicant_mail_state':' ',
    'information_about_applicant_mail_zipcode':' ',
    'information_about_applicant_province':' ',
    'information_about_applicant_postal_code':' ',
    'information_about_applicant_country':' ',

    'information_about_uscis_form':' ',
    'receipt_number_for_the_applicant':' ',
    'part2_4_request_nominigrant_example':' ',
    'part2_5_date_of_the_adverse_decision':' ',
    'part2_office_that_issued_advarse_decision':' ',
    
    'part4_applicant_daytime_telephone':' ',
    'part4_applicant_mobile_telephone':' ',
    'part4_applicant_email_address':' ',
    'part4_applicant_signature':' ',
    'part4_petitioner_family_lastname':' ',
    'part4_petitioner_given_firstname':' ',
    'part4_petitioner_middlename':' ',

    'part4_petitioner_title':' ',
    'part4_petitioner_daytime_telephone_number':' ',
    'part4_petitioner_mobile_telephone_number':' ',
    'part4_petitioner_email_address':' ',

    'part5_interpreter_family_lastname':' ',
    'part5_interpreter_given_firstname':' ',
    'part5_interpreter_business_org_name':' ',

    'part5_interpreter_mailing_street_name':' ',
    'part5_interpreter_mailing_apt_flor':' ',
    'part5_interpreter_mailing_city_town':' ',
    'part5_interpreter_mailing_state':' ',
    'part5_interpreter_mailing_zip_code':' ',
    'part5_interpreter_mailing_province':' ',
    'part5_interpreter_mailing_postal_code':' ',
    'part5_interpreter_mailing_country':' ',

    'part5_interpreter_daytime_telephone':' ',
    'part5_interpreter_mobile_telephone':' ',
    'part5_interpreter_email_address':' ',
    'part5_interpreter_certification':' ',
    'part5_interpreter_signature':' ',

    'part5_preparer_family_lastname':' ',
    'part5_preparer_given_firstname':' ',
    'part5_preparer_business_org_name':' ',
    'part5_preparer_mailing_street_name':' ',
    'part5_preparer_mailing_apt_flor':' ',
    'part5_prepare_mailing_city_town':' ',
    'part5_preparer_mailing_state':' ',
    'part5_prepare_mailing_zip_code':' ',
    'part5_prepare_mailing_province':' ',
    'part5_preparer_mailing_postal_code':' ',
    'part5_preparer_mailing_country':' ',
    'part5_prepare_daytime_telephone':' ',
    'part5_prepare_mobile_telephone':' ',
    'part5_preparer_email_address':' ',

    'part6_preparer_signature':' ',
    
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
$pdf->Output('I-290b.pdf', 'I');
