<?php
require_once('config.php');

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
		
		$this->Cell(40, 6, "Form N-400 Edition 09/17/19  E", 0, 0, 'L');
		
		
		//if ($this->page == 1){
			$barcode_image = "images/n-400-footer-pdf417-$this->page.jpg";
		//)
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
$pdf->SetTitle('Form n_400');

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
$pdf->MultiCell(80, 15, "Application for Naturalization", 0, 'C', 0, 1, 67, 8, true);

$pdf->SetFont('times', 'B', 10.5); // set font
$pdf->setCellPaddings(2, 4, 6, 0); // set cell padding
$pdf->MultiCell(30, 5, "USCIS\nForm N-400", 0, 'C', 0, 1, 174.5, 6, true);

$pdf->SetFont('times', 'B', 10.6);	// set font
$pdf->MultiCell(80, 15, "Department of Homeland Security", 0, 'C', 0, 1, 67, 13, true);

$pdf->SetFont('times', '', 10.8);	// set font
$pdf->MultiCell(80, 15, "U.S. Citizenship and Immigration Services", 0, 'C', 0, 1, 67, 18, true);

$pdf->SetFont('times', '', 9);	// set font
$pdf->setCellPaddings(2, 1, 6, 0); // set cell padding
$pdf->MultiCell(40, 5, "OMB No. 1615-0052\nExpires 11/30/2025", 0, 'C', 0, 1, 169, 18.5, true);

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
$html = '
<div style="font-stretch:96;margin: 0.3in;padding: 0.3in;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;START HERE - Type or print in black ink.</b> Type or print "N/A" if an item is not applicable or the answer is none, unless otherwise indicated.
    Failure to answer all of the questions may delay U.S. Citezenship and Immigration Services (USCIS) processing your Form N-400.
    <b>NOTE: You must complete Parts 1.-15.</b></div>

<div style="margin: 0.3in;padding: 0.3in;">If your biological or legal adoptive mother or father is a U.S. citizen by birth, or was naturalized before you reached your 18th birthday, 
you may already be a U.S. citizen. Before you consider filing this application, please visit the USCIS Website at 
<a href="https://www.uscis.gov">www.uscis.gov</a> for more information on this topic and to review the instructions for Form N-600, Application for Certificate of 
Citizenship, and Form N-600K, Application for Citizenship and Inssurance of Certificate Under Section 322.</div>

<div style="font-stretch:96;margin: 0.3in;padding: 0.3in;"><b>NOTE:</b> Are either of your parents a United States citizen? IF you answer &#8220;Yes,&#8221; then complete 
<b>Part 6. Information About Your Parents</b> as part of this application. If you answer "No," then skip <b>Part 6.</b> and go to 
<b>Part 7. Biographic Information.</b></div>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(80, 15, "Enter Your 9 Digit A-Number:", 0, 'C', 0, 1, 132, 117.6, true);
$pdf->MultiCell(80, 15, "A-", 0, 'C', 0, 1, 115.7, 122.2, true);
// $pdf->TextField('a_number', 39.5, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 122);

$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
// $pdf->SetTextColor(245,245,245);
$pdf->SetFont('courier', 'B', 10);
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255);

$pdf->TextField('a_number', 42.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 160, 122);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, 126.5, 72, false); // angle
$pdf->Rotate(-240);
$pdf->MultiCell(10, 10, "t", '', 'C', 0, 1, -5.5, 25.5, false); // angle
$pdf->StopTransform();


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 10); // set font
// $pdf->setCellHeightRatio(1.25);
$pdf->setCellHeightRatio(1.3);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
// $pdf->Ln(3);
$html ='<div><b>Part 1. Information About Your Eligibility</b> (Select only one box or your Form N-400 may be delayed)</div>';
$pdf->writeHTMLCell(132, 0, '', 118, $html, 1, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 9.7); // set font
$pdf->Ln(1.1);
$html = '<b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are at least 18 years of age <b>and:</b>';
$pdf->writeHTML($html, true, false, true, false, ''); // output the HTML content

$pdf->setCellPaddings(0); // set cell padding

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(255,255,255);

$pdf->SetFont('times', '', 10); // set font
// $pdf->Ln(1.1);
$html = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>A.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have been a lawful permanent resident of the United States for at least 5 years.';
$pdf->writeHTML($html, true, false, true, false, ''); // output the HTML content

$html = 'Have been a lawful permanent resident of the United States for at least 3 years. In addition, you have married to and living with the same U.S. citizen spouse for the last 3 years, <b>and</b> your spouse has been a U.S. citizen for the last 3 years at the time you field your Form N-400.';
$pdf->writeHTMLCell(164, 0, 35, '', $html, '', 0, 1, true, 'L', true);

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(10, 0, "B.", 0, 'C', 0, 1, 17.5, 137.1, false);

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(3.5);
$html = 'Are a lawful permanent resident of the United States <b>and</b> you are the spouse of a U.S. citizen <b>and</b> your U.S. citizen spouse is regularly engaged in specified employment abroad. (See the Immigration and Nationality Act (INA) section 319(b). If your residential address is outside the United States and you are filing under Section 319(b), select the USCIS Field Office from the list below where you would like to have your naturalization interview:';
$pdf->writeHTMLCell(164, 0, 35, '', $html, '', 0, 0, true, 'L', true);

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(10, 0, "C.", 0, 'C', 0, 1, 17.5, 148.7, false);

$pdf->Ln(6.5);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->ComboBox('naturalization_interview', 168.5, 6, array(), array(), array(), 35);

// $pdf->TextField('mynumber2', 39.5, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'beveled'), array(), 50, 135);

// $pdf->ComboBox('gender', 100, 5, array(array('', '-'), array('M', 'Male'), array('F', 'Female')), 33, '');

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(6);
$html = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>D.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are applying on the basis of qualifying military service.';

$pdf->writeHTML($html, true, false, true, false, ''); // output the HTML content

$pdf->SetFont('times', '', 10); // set font
$html = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>E.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other (Explain):';
$pdf->writeHTMLCell(0, 0, '', '', $html, '', 0, 0, true, 'L', true);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->ComboBox('other_explain', 142.5, 6, array(), array(), array(), 61);






$pdf->setCellPaddings(0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(255,255,255); // set color 
$html = '<input type="checkbox" name="a_lawful_permanent_resident_a" value="1" />';
$pdf->writeHTMLCell(6, 6, 28, 136.5, $html, 0, 1, true, false, 'L', true);
$html = '<input type="checkbox" name="a_lawful_permanent_resident_b" value="1" />';
$pdf->writeHTMLCell(6, 6, 28, 141.9, $html, 0, 1, true, false, 'L', true);
$html = '<input type="checkbox" name="a_lawful_permanent_resident_c" value="1" />';
$pdf->writeHTMLCell(6, 6, 28, 156, $html, 0, 1, true, false, 'L', true);
$html = '<input type="checkbox" name="a_lawful_permanent_resident_d" value="1" />';
$pdf->writeHTMLCell(6, 6, 28, 180.5, $html, 0, 1, true, false, 'L', true);
$html = '<input type="checkbox" name="a_lawful_permanent_resident_e" value="1" />';
$pdf->writeHTMLCell(6, 6, 28, 185.8, $html, 0, 1, true, false, 'L', true);




$pdf->Ln(1.2);








$pdf->SetFillColor(220,220,220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b>Part 2. Information About You</b> (Person applying for naturalization)</div>';
$pdf->writeHTMLCell(0, 7, '', '', $html, 1, 1, true, false, 'J', true);

$pdf->SetFont('times', '', 10); // set font
$pdf->Ln(1.1);
$html = '&nbsp;<b>1.</b> &nbsp;&nbsp;&nbsp;Your Current Legal Name (<b>do not</b> provide a nickname)';
$pdf->writeHTML($html, true, false, true, false, ''); // output the HTML content

$pdf->Ln(1.1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20, 211, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 96, 210, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 209, $html, 0, 0, true, false, 'L', true);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('legal_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 217);
$pdf->TextField('legal_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 217);
$pdf->TextField('legal_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 217);

$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(255,255,255);
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp;Your Name Exactly As It Appears on Your Permanent Resident Card (if applicable)';
$pdf->writeHTMLCell(0, 0, '', 226, $html, 0, 0, true, false, 'L', true);

$pdf->Ln(1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20, 231, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 96, 230, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 229, $html, 0, 0, true, false, 'L', true);

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('exact_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 237);
$pdf->TextField('exact_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 237);
$pdf->TextField('exact_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 237);

/* $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));
 */
// Arrows
// $pdf->Text(185, 249, 'Arrows');
/* $pdf->SetLineStyle($style5);
$pdf->SetFillColor(0, 0, 0); */
// $pdf->Arrow(200, 280, 185, 266, 0, 5, 15);
// $pdf->Arrow(147, 124.5, 151, 124.5, 2, 4, 15);
// $pdf->Arrow(15, 72, 16.5, 72, 2, 4, 15);





$pdf->AddPage('P', 'LETTER'); // page number 2


$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(220,220,220);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.8); // set font
$html ='<div><b>Part 2.&nbsp;&nbsp;Information About You</b> (Person applying for naturalization) (continued)</div>';
$pdf->writeHTMLCell(141, 6.5, 13, 19.5, $html, 1, 1, true, false, 'J', true);

$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(6.5, 5, "A-", '', 'C', 0, 1, 154.5, 19.5, true);
$pdf->MultiCell(43, 5, "", 'LTBR', 'C', 1, 1, 161, 20, true);



$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(255,255,255);
$html = '<b>3.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Names You Have Used Since Birth (include nicknames, aliases, and maiden name, if applicable)';
$pdf->writeHTMLCell(0, 0, 12, 28, $html, 0, 0, true, false, 'L', true);


$pdf->Ln(1.1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20, 33, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 96, 32, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 31, $html, 0, 0, true, false, 'L', true);
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('since_birth_last_name1', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 39);
$pdf->TextField('since_birth_first_name1', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 39);
$pdf->TextField('since_birth_middle_name1', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 39);

$pdf->TextField('since_birth_last_name2', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 45.7);
$pdf->TextField('since_birth_first_name2', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 45.7);
$pdf->TextField('since_birth_middle_name2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 45.7);

$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(255,255,255);
$html = '<b>4.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name Change (Optional)';
$pdf->writeHTMLCell(0, 0, 12, 53, $html, 0, 0, true, false, 'L', true);




$html = '<b>Read the Form N-400 Instruction before you decide whether or not you would like to legally change your name.</b>';
$pdf->writeHTMLCell(0, 0, 20, 58.5, $html, 0, 1, true, false, 'L', true);

$html = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Would you like to legally change your name?
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Yes
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No';
$pdf->writeHTMLCell(0, 0, 13.7, 65, $html, 0, 1, true, false, 'L', true);


/* $pdf->Ln(1.1);
$pdf->MultiCell(0, 0, "Would you like to legally change your name?", '', 'L', 1, 1, 20, '', true);
 */
// $pdf->Ln(0.7);
$pdf->MultiCell(0, 0, 'If you answered "Yes," type or print the new name you would like to use in the spaces provided below.', '', 'L', 1, 1, 20, '', true);




$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20, 78, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 96, 77, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 76, $html, 0, 1, true, false, 'L', true);


$pdf->MultiCell(73, 7, '', 1, 'R', 1, 0, 21, 85, true); // Blank Field Family Name (Last Name)
$pdf->MultiCell(56, 7, '', 1, 'R', 1, 0, 97, 85, true); // Blank Field Given Name (First Name)
$pdf->MultiCell(48, 7, '', 1, 'R', 1, 0, 155, 85, true); // Blank Field Middle Name (if applicable)

$html = '<b>5.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if applicable)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(0, 0, 12, 93, $html, 0, 0, true, false, 'L', true);

$pdf->Ln(1.1);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 84.7, 56.9, false); // angle
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 22.5, 91, false); // angle
$pdf->StopTransform();

$pdf->setCellPaddings(0); // set cell padding
$pdf->SetFont('times', '', 10); // set font
$pdf->SetFillColor(255,255,255);
$html = '<input type="checkbox" name="status_legally_change_name1" value="1" />';
$pdf->writeHTMLCell(5, 5, 175, 66.8, $html, 0, 1, false, false, 'L', false);
$html = '<input type="checkbox" name="status_legally_change_name2" value="0" />';
$pdf->writeHTMLCell(5, 5, 189, 66.8, $html, 0, 1, false, false, 'L', false);




$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
// $pdf->SetTextColor(245,245,245);
$pdf->SetFont('courier', 'B', 10);
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255);

$pdf->TextField('us_social_security_number', 45, 6.7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 99);
$pdf->TextField('uscis_online_account_number', 61, 6.7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 99);
	




$pdf->SetFont('times', '', 10.5);
$pdf->setCellHeightRatio(1.2);
if(showData('gender')=='male') $male_check='checked'; else $male_check='';
if(showData('gender')=='female') $female_check='checked'; else $female_check='';
$html ='<b>7.  </b>   Gender  <br> <br>
   &nbsp;  &nbsp;    <input type="checkbox" name="gender" value="male" checked="'.$male_check.'" /> Male
   
   &nbsp;   &nbsp;   <input type="checkbox" name="gender" value="female" checked="'.$female_check.'" /> Female
   ';

$pdf->writeHTMLCell(50, 7, 12, 107, $html, 0, 1, false, true, 'J', 0);

$pdf->SetFont('times', '', 10.5);
$html ='<b>8.  </b>  Date of Birth <br>
  &nbsp;   &nbsp; (mm/dd/yyyy)';
$pdf->writeHTMLCell(59, 7, 60, 107, $html, 0, 1, false, true, 'J', 0);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('date_of_birth', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 65.5, 117);


$pdf->SetFont('times', '', 10.5);
$html ='<b>9.  </b>  Date You Became a Lawful <br>
  &nbsp;   &nbsp; Permanent Resident (mm/dd/yyyy) ';
$pdf->writeHTMLCell(59, 7, 120, 107, $html, 0, 1, false, true, 'J', 0);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('date_law_full_resident', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 125, 117);

//.................
$pdf->SetFont('times', '', 10.5);
$html ='<b>10.  </b>  Country of Birth';
$pdf->writeHTMLCell(59, 7, 12, 125, $html, 0, 1, false, true, 'J', 0);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_of_birth', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 130);
//............

$pdf->SetFont('times', '', 10.5);
$html ='<b>11.   </b>     Country of Citizenship or Nationality';
$pdf->writeHTMLCell(80, 7, 100, 125, $html, 0, 1, false, true, 'J', 0);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_cityzenship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 107, 130);

//..............

$pdf->SetFont('times', '', 9.7);
$html ='<b>12.    </b>     Do you have a physical or developmental disability or mental impairment that prevents you from <br>
  &nbsp;   &nbsp;  &nbsp;   demonstrating your knowledge and understanding of the English language and/or civics requirements <br>
  &nbsp;   &nbsp; &nbsp;  for naturalization? 
';
$pdf->writeHTMLCell(200, 7, 12, 139, $html, 0, 1, false, true, 'J', 0);

$pdf->SetFont('times', '', 9.7);
$html =' &nbsp;  &nbsp;  &nbsp;  &nbsp; If you answered "Yes," submit a completed Form N-648, Medical Certification for Disability Exceptions, when you file your <br>
 
&nbsp;  &nbsp; &nbsp; Form N-400.
';
$pdf->writeHTMLCell(200, 7, 12, 153, $html, 0, 1, false, true, 'J', 0);

//.............

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="physical_disability0" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="physical_disability1" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 142, $html, 0, 1, false, true, 'J', 0);


//...........

$html ='<div><b>13.    </b>     Exemptions from the English Language Test</div>';

$pdf->writeHTMLCell(80, 7, 12, 163, $html, 0, 1, false, true, 'J', 0);

//............


$html ='<div><b>A.    </b>    Are you <b>50</b> years of age or older <b>and</b> have you lived in the United States as a lawful permanent <br>  &nbsp; &nbsp; &nbsp; resident for periods totaling at least <b>20</b> years at the time you file your Form N-400?</div>';

$pdf->writeHTMLCell(150, 7, 20, 168, $html, 0, 1, false, true, 'J', 0);

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part2_13a0" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part2_13a" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 168, $html, 0, 1, false, true, 'J', 0);

//..................

$html ='<div><b>B.    </b>    Are you <b>55</b> years of age or older <b>and</b> have you lived in the United States as a lawful permanent<br>  &nbsp; &nbsp; &nbsp; resident for periods totaling at least <b>15</b> years at the time you file your Form N-400?</div>';

$pdf->writeHTMLCell(150, 7, 20, 178, $html, 0, 1, false, true, 'J', 0);

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part2_13b1" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part2_13b2" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 178, $html, 0, 1, false, true, 'J', 0);

$html ='<div><b>C.    </b>   Are you <b>65</b> years of age or older <b>and</b> have you lived in the United States as a lawful permanent<br>
   
&nbsp;   &nbsp;   resident for periods totaling at least <b>20</b> years at the time you file your Form N-400? (If you meet<br>
 &nbsp;   &nbsp;    his requirement, you will also be given a simplified version of the civics test.) </div>';

$pdf->writeHTMLCell(150, 7, 20, 188, $html, 0, 1, false, true, 'J', 0); 

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part2_13c1" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part2_13c2" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 188, $html, 0, 1, false, true, 'J', 0);



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 3.  Accommodations for Individuals With Disabilities and/or Impairments </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 204, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>NOTE: </b>Read the information in the Form N-400 Instructions before completing this part.</div>';
$pdf->writeHTMLCell(180, 7, 12, 213, $html, 0, 1, false, 'L');


$html= '<div><b>1.  </b>  Are you requesting an accomm odation because of your disabilities and/or impairments? <br>
 &nbsp; &nbsp; &nbsp;If you answered "Yes," select any applicable box</div>';
$pdf->writeHTMLCell(170, 7, 12, 219, $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part3_1_0" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part3_1_1" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 219, $html, 0, 1, false, true, 'J', 0);


//.............

$html= '<div>     <b>    A.  </b>  <input type="checkbox" name="A" value="Yes" checked="" />  I am deaf or hard of hearing and request the following accommodation. (If you are requesting a sign-language <br>
&nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; interpreter, indicate for which language (for example, American Sign Language).</div>';
$pdf->writeHTMLCell(190, 7, 12, 230, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_accomodation_1a', 174, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 240);

//................ 
$pdf->SetFont('times', '', 10);
$html= '<div>     <b>    B.  </b>  <input type="checkbox" name="b" value="Yes" checked="" />  I am blind or have low vision and request the following accommodation: </div>';
$pdf->writeHTMLCell(190, 7, 12, 247, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_accomodation_1b', 174, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 253);

//....................................... page 2 end .............   
	
$pdf->AddPage('P', 'LETTER'); // page number 3


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 3.  Accommodations for Individuals With Disabilities and/or Impairments </b>(continued)</div>';
$pdf->writeHTMLCell(138, 7, 13, 17, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 18, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 17, '', 1, 1, false, 'L');
//...............

$pdf->SetFont('times', '', 10);
$html= '<div>     <b>    C.  </b>  <input type="checkbox" name="c" value="Yes" checked="" />  I have another type of disability and/or impairment (for example, use a wheelchair). (Describe the nature of your<br>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;
disability and/or impairment and the accommodation you are requesting.) </div>';
$pdf->writeHTMLCell(190, 7, 12, 30, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part3_accomodation_1c', 175, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 28, 40);
//...............

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 4.   Information to Contact You</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 50, $html, 1, 1, true, 'L');

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>1.  </b>  Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 58, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_to_contact_you_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 64);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.  </b>  Work Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 58, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_to_contact_you_work_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 64);

//.................. 

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.  </b>  Evening Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 72, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_to_contact_you_evening_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 78);

//............


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.  </b>  Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 72, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_to_contact_you_mobile_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 78);
//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.  </b>  Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 86, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_information_to_contact_you_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 92);

//..............

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 5.  Information About Your Residence</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 103, $html, 1, 1, true, 'L');

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>1.  </b>   Where have you lived during the last five years? Provide your most recent residence and then list every location where you <br> &nbsp;  &nbsp;  &nbsp;
have lived during the last five years. If you need extra space, use additional sheets of paper.</div>';
$pdf->writeHTMLCell(195, 7, 12, 111, $html, 0, 1, false, 'L');

//..........

$pdf->setFont('Times', '', 10.5);
$html= '<div> <b>  &nbsp;   A.  </b>  Current Physical Address</div>';
$pdf->writeHTMLCell(95, 7, 12, 121, $html, 0, 1, false, 'L');

$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 23, 127, $html, 0, 1, false, 'L');


$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 127, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 132);
$pdf->setFont('Times', '', 10.5);


$html= '<div>  <input type="checkbox" name="apt" value="apt5_1a" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 132, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste" value="ste5_1a" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 132, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="flr" value="flr5_1a" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 132, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 132,'', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 23, 140, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 89.5, 140, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 149, 140, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 173, 140, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 145, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_city_town', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 145);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_country', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 145);


//..............
$pdf->setFont('Times', '', 11);
$html = '<select name="current_physical_address_state" size="0.50" disabled>'; // Adding disabled attribute here
$html .= '<option disabled style="display:none;">  Select </option>'; // Empty option for spacing
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148.5, 144.6, $html, '', 0, 0, true, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_zipcode', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 145);

$pdf->TextField('part5_information_to_contact_you_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 192, 145);
$pdf->setFont('Times', 'I', 7.2);
$html= '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><i>(USPS ZIP Code Lookup)</i></a></div>';
$pdf->writeHTMLCell(80, 7, 174, 153, $html, 0, 1, false, 'L');
//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 23, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 163);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 163);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 163);

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(18, 7, 23, 172, $html, 0, 1, false, 'L');

$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 45, 170, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_date_from', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 176);


$pdf->setFont('Times', '', 10.5);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 85, 170, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->writeHTMLCell(38, 6.7, 85, 176, "Present", 1, 1, false, 'C');
//...........
$pdf->writeHTMLCell(190, 7, 13, 186, '', 'T', 1, false, 'L');  
//.......................


$pdf->setFont('Times', '', 10.5);
$html= '<div> <b>  &nbsp;   B.  </b>  Current Mailing Address (if different from the address above)</div>';
$pdf->writeHTMLCell(110, 7, 12, 187, $html, 0, 1, false, 'L');
$html= '<div>In Care Of Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 23, 192, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_information_to_contact_you_in_care_of', 180, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 197);


$pdf->setFont('Times', '', 10.5);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 23, 205, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 210);
$pdf->setFont('Times', '', 10.5);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 205, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);

// $pdf->TextField('part5_b_information_to_contact_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 132);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt1" value="apt" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 211, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste1" value="ste" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 211, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr1" value="flr" checked=" "/>  </div>';
$pdf->writeHTMLCell(20, 7, 175, 211, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 210,'', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 23, 217, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 89.5, 217, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 149, 217, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 173, 217, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 222, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_city_town', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 222);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_country', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 222);






$pdf->setFont('Times', '', 11);
$html = '<select name="mailing_address_state" size="0.50" disabled>'; // Adding disabled attribute here
$html .= '<option disabled style="display:none;">  Select </option>'; // Empty option for spacing
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148.5, 222, $html, '', 0, 0, true, 'L');











$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_zipcode', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 222);

$pdf->TextField('part5_b_information_to_contact_you_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 192, 222);
$pdf->setFont('Times', '', 9);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 23, 229, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 239);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 229, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 239);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 229, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_b_information_to_contact_you_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 239);

$pdf->writeHTMLCell(190, 0, 13, 249, '', 'T', 1, false, 'L');







$pdf->AddPage('P', 'LETTER'); // page number 4




$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 5.  Information About Your Residence</b>(continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 17, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 18, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 17, '', 1, 1, false, 'L');


//....................................... physical address 2 .................................................


$pdf->setFont('Times', '', 10.5);
$html= '<div> <b>  &nbsp;   C.  </b>   Physical Address 2</div>';
$pdf->writeHTMLCell(95, 7, 12, 25, $html, 0, 1, false, 'L');

$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 23, 31, $html, 0, 1, false, 'L');


$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 31, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 36);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt2" value="apt2" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 36, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste2" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 36, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 36, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 36, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 23, 44, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 89.5, 44, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 149, 44, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 173, 44, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 49, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_city_town', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 49);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_country', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 49);






$pdf->setFont('Times', '', 11);
$html = '<select name="part5_c_information_to_contact_you_state" size="0.50" disabled>'; // Adding disabled attribute here
$html .= '<option disabled style="display:none;">  Select </option>'; // Empty option for spacing
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148.5, 49, $html, '', 0, 0, true, 'L');







$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_zipcode', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 49);

$pdf->TextField('part5_c_information_to_contact_you_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 192, 49);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 23, 57, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 67);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 57, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 67);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 57, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 67);

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(18, 7, 23, 76, $html, 0, 1, false, 'L');

$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 45, 74, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_date_from', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 80);


$pdf->setFont('Times', '', 10.5);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 85, 74, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_c_information_to_contact_you_date_to', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 80);


$pdf->writeHTMLCell(190, 1, 12,  89,  '',  'T',  1, false, 'L');




//....................................... physical address 3.................................................






$pdf->setFont('Times', '', 10.5);
$html= '<div> <b>  &nbsp;   D.  </b>   Physical Address 3</div>';
$pdf->writeHTMLCell(95, 7, 12, 90, $html, 0, 1, false, 'L');

$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 23, 96, $html, 0, 1, false, 'L');


$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 96, $html, 0, 1, false, 'L');
//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 101);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt3" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 101, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste3" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 101, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr3" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 101, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 101, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 23, 109, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 89.5, 109, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 149, 109, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 173, 109, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 114, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_city_town', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 114);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_country', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 114);









$pdf->setFont('Times', '', 11);
$html = '<select name="part5_d_information_to_contact_you_state" size="0.50" disabled>'; // Adding disabled attribute here
$html .= '<option disabled style="display:none;">  Select </option>'; // Empty option for spacing
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148.5, 114, $html, '', 0, 0, true, 'L');






$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_zipcode', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 114);

$pdf->TextField('part5_d_information_to_contact_you_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 192, 114);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 23, 122, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 132);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 122, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 132);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 122, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 132);

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(18, 7, 23, 142, $html, 0, 1, false, 'L');

$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 45, 140, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_date_from', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 146);


$pdf->setFont('Times', '', 10.5);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 85, 140, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_d_information_to_contact_you_date_to', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 146);


$pdf->writeHTMLCell(190, 1, 12,  155,  '',  'T',  1, false, 'L');


//....................................... physical address 4.................................................




$pdf->setFont('Times', '', 10.5);
$html= '<div> <b>  &nbsp;   E.  </b>   Physical Address 4</div>';
$pdf->writeHTMLCell(95, 7, 12, 156, $html, 0, 1, false, 'L');

$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 23, 161, $html, 0, 1, false, 'L');


$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 161, $html, 0, 1, false, 'L');


//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 166);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt4" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 166, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste4" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 166, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr4" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 166, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 166, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 23, 173, $html, 0, 1, false, 'L');

$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 89.5, 173, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 149, 173, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 173, 173, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 178, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_city_town', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 178);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_country', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 178);


$pdf->setFont('Times', '', 11);
$html = '<select name="part5_e_information_to_contact_you_state" size="0.50" disabled>'; // Adding disabled attribute here
$html .= '<option disabled style="display:none;">  Select </option>'; // Empty option for spacing
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 148.5,178, $html, '', 0, 0, true, 'L');



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_zipcode', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174, 178);

$pdf->TextField('part5_e_information_to_contact_you_zipcode1', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 192, 178);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 23, 186, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 196);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 186, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 196);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 186, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 196);

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(18, 7, 23, 206, $html, 0, 1, false, 'L');

$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 45, 204, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_date_from', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 209);


$pdf->setFont('Times', '', 10.5);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 85, 204, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part5_e_information_to_contact_you_date_to', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 209);




					//..............................................................part 6 start 



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 6. Information About Your Parents</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 218, $html, 1, 1, true, 'L');

//....................

$pdf->setFont('Times', 'B', 9.5);
$html= '<div>If neither one of your parents is a United States citizen, then skip this part and go to Part 7.</div>';
$pdf->writeHTMLCell(180, 7, 12, 225, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>1.    </b>   Were your parents married before your 18th birthday?</div>';
$pdf->writeHTMLCell(100, 5, 12, 231, $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="were_married1" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="were_married2" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 5, 170, 231, $html, 0, 1, false, true, 'J', 0);


$pdf->setFont('Times', 'BI', 12);
$html= '<div>Information About Your Mother</div>';
$pdf->writeHTMLCell(190, 6, 12, 237, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(1.3);
$html= '<div><b>2.    </b>  Is your mother a U.S. citizen?</div>';
$pdf->writeHTMLCell(190, 5, 12, 245, $html, 0, 1, false, 'L');
$html= '<div> <br>

&nbsp;    &nbsp; &nbsp; If you answered " Yes," complete the following information. If you answered "No," go to <b>Item Number 3</b>.</div>';
$pdf->writeHTMLCell(190, 5, 12, 244.5, $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="us_citizen1" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="us_citizen2" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 5, 170, 245, $html, 0, 1, false, true, 'J', 0);



$pdf->AddPage('P', 'LETTER');          //............... page number 5

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 6.  Information About Your Parents </b>(continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.  </b>   Current Legal Name of U.S. Citizen Mother</div>';
$pdf->writeHTMLCell(100, 7, 18, 26, $html, 0, 1, false, 'L');


// $pdf->setFont('Times', '', 10.5);
// $html= '<div>Family Name (Last Name)</div>';
// $pdf->writeHTMLCell(80, 7, 24, 31, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(60, 7, 25, 36.5, showData('mother_last_name'), 1, 1, false, 'L');
$pdf->setFont('Times', '', 10.5);
$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 24, 31, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 25, 36.5,'', 1, 1, false, 'L');

//...............


$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 87, 31, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(61, 7, 87, 36.5,'', 1, 1, false, 'L');
// $pdf->setFont('Times', '', 10.5);
// $html= '<div>Given Name (First Name)</div>';
// $pdf->writeHTMLCell(90, 7, 87, 31, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(60, 7, 87, 36.5,showData('mother_first_name'), 1, 1, false, 'L');


//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 150, 31, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(54, 7, 150, 36.5,'', 1, 1, false, 'L');

// $pdf->setFont('Times', '', 10.5);
// $html= '<div>Middle Name (if applicable)</div>';
// $pdf->writeHTMLCell(90, 7, 150, 31, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(54, 7, 150, 36.5,showData('mother_middle_name'), 1, 1, false, 'L');

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.  </b>   Mother\'s Country of Birth</div>';
$pdf->writeHTMLCell(100, 7, 18, 44, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(78, 7, 25, 49.5,'' , 1, 1, false, 'L');


//............
$mother_date_of_birth = date("m/d/Y",strtotime(showData('mother_date_of_birth')));
$pdf->setFont('Times', '', 10.5);
$html= '<div><b>C.  </b>   Mother\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 6.5, 110, 44, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 6.5, 117, 49.5,  '', 1, 1, false, 'L');


// $mother_date_of_birth = date("m/d/Y",strtotime(showData('mother_date_of_birth')));
// $pdf->setFont('Times', '', 10.5);
// $html= '<div><b>C.  </b>   Mother\'s Date of Birth (mm/dd/yyyy)</div>';
// $pdf->writeHTMLCell(100, 7, 110, 44, $html, 0, 1, false, 'L');
// $pdf->writeHTMLCell(60, 7, 117, 49.5,  $mother_date_of_birth, 1, 1, false, 'L');

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>D.  </b>   Date Mother Became a U.S. Citizen <br>
 &nbsp;  &nbsp;  &nbsp;  (if known) (mm/dd/yyyy)</div>';

$pdf->writeHTMLCell(100, 7, 18, 57, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 6.5, 25, 67, '', 1, 1, false, 'L');


//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>E.  </b>    Mother\'s A-Number<br>
	 &nbsp;  &nbsp;  &nbsp; (if any)</div>';

$pdf->writeHTMLCell(100, 7, 88, 57, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 106, 67, '', 1, 1, false, 'L');
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(50, 7, 99, 68,  $html, 0, 1, false, 'L');

//..............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 81.5, 26, false); // angle

$pdf->StopTransform();


//...............


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Information About Your Father</b></div>';
$pdf->writeHTMLCell(190, 6, 13, 77, $html, 0, 1, true, 'L');

//..............
$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.   </b>     Is your father a U.S. citizen?</div>';
$pdf->writeHTMLCell(90, 7, 12, 85,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="father_citizen1" value="Yes" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="father_citizen2" value="No" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 86, $html, 0, 1, false, true, 'J', 0);


$pdf->setFont('Times', '', 10.5);
$html= '<div>If you answered "Yes," complete the information below. If you answered "No." go to <b>Part 7.</b></b>';
$pdf->writeHTMLCell(190, 7, 18, 91,  $html, 0, 1, false, 'L');

//...........................


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.  </b>   Current Legal Name of U.S. Citizen Father</div>';
$pdf->writeHTMLCell(100, 7, 18, 97, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(80, 7, 24, 102, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 6.5, 25, 108, '', 1, 1, false, 'L');

//...............


$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(90, 7, 87, 102, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 6.5, 87, 108, '', 1, 1, false, 'L');


//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(90, 7, 150, 102, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(54, 6.5, 150, 108, '', 1, 1, false, 'L');

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.  </b>   Father\'s Country of Birth</div>';
$pdf->writeHTMLCell(100, 7, 18, 116, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(78, 6.5, 25, 121.5, '', 1, 1, false, 'L');


//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>C.  </b>   Father\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(100, 7, 110, 116, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 6.5, 117, 121.5, '', 1, 1, false, 'L');

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>D.  </b>   Date Father Became a U.S. Citizen <br>
 &nbsp;  &nbsp;  &nbsp;  (if known) (mm/dd/yyyy)</div>';

$pdf->writeHTMLCell(100, 7, 18, 129, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 25, 139, '', 1, 1, false, 'L');


//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>E.  </b>    Father\'s A-Number<br>
	 &nbsp;  &nbsp;  &nbsp; (if any)</div>';

$pdf->writeHTMLCell(100, 7, 88, 129, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(50, 7, 106, 139, '', 1, 1, false, 'L');
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(50, 7, 99, 139,  $html, 0, 1, false, 'L');

//..............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 81, 97, false); // angle

$pdf->StopTransform();


//...................................part 7 ..........................


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 7.  Biographic Information</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 150, $html, 1, 1, true, 'L');


//...............
$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE: </b> USCIS requires you to complete the categories below to conduct background checks. (See the Form N-400 Instructions for more information.)</div>';
$pdf->writeHTMLCell(195, 7, 12, 158,  $html, 0, 1, false, 'L');



$pdf->setFont('Times', '', 10.5);
$html= '<div><b>1.    </b>     Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 168,  $html, 0, 1, false, 'L');


$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="hispiano" value="hispiano" checked="" /> Hispanic or Latino
   
   &nbsp;   &nbsp;   <input type="checkbox" name="no_hispiano" value="no_hispiano" checked="" />  Not Hispanic or Latino
   ';

$pdf->writeHTMLCell(100, 7, 13, 174, $html, 0, 1, false, true, 'J', 0);


//.......

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.    </b>     Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(95, 7, 12, 180,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="white" value="white" checked="" /> White
   
   &nbsp;   &nbsp;   <input type="checkbox" name="asian" value="asian" checked="" /> Asian

   &nbsp;   &nbsp;   <input type="checkbox" name="black" value="black" checked="" /> Black or 

   &nbsp;   &nbsp;   &nbsp;   &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp; <input type="checkbox" name="american" value="american" checked="" /> American Indian

   &nbsp;   &nbsp;   <input type="checkbox" name="native" value="native" checked="" /> Native Hawaiian or
   ';

$pdf->writeHTMLCell(195, 7, 13, 186, $html, 0, 1, false, true, 'J', 0);

$pdf->setFont('Times', '', 10.5);
$html= '<div> African American    &nbsp;   &nbsp;  &nbsp;  &nbsp;  or Alaska Native    &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  Other Pacific Islander  </div>';
$pdf->writeHTMLCell(120, 7, 59, 189,  $html, 0, 1, false, 'L');

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.    </b>     Height &nbsp;&nbsp;&nbsp; Feet:</div>';
$pdf->writeHTMLCell(95, 7, 12, 197,  $html, 0, 1, false, 'L');

// $html= '<div><label for="selection">Feet:</label>



// <select name="part_7_feet" size="0.25">
    
//     <option value="2">2</option>
//     <option value="3">3</option>
//     <option value="4">4</option>
//     <option value="5">5</option>
//     <option value="6">6</option>
//     <option value="7">7</option>
//     <option value="8">8</option>
// </select></div>';
// $pdf->writeHTMLCell(30, 7, 33, 197, $html, 0, 0, false, true, 'J', true);
$pdf->SetFont( 'times', '', 10 );

$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 132, $html, '', 0, 0, true, 'L' );


$pdf->SetFont( 'courier', 'B', 10 );

$html = '<select name="part7_3d_state" size="0.25">';
$html .= '<option > As</option>';
$html .= '<option > Ts</option>';
$html .= '<option > Ts</option>';
$html .= '<option > Ts</option>';
$html .= '<option > Ts</option>';
$html .= '<option > Ts</option>';
$html .= '</select>';

$pdf->writeHTMLCell( 25, 5, 129.5, 131, $html, '', 0, 0, true, 'L' );



$html1= '<div><label for="selection">Inches:</label>
<select name="part_7_inches" size="0.50">
<option value=" " disable>Inc</option>
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
$pdf->writeHTMLCell(30, 7, 63, 197, $html1, 0, 0, false, true, 'J', true);

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.    </b>    Weight </div>';
$pdf->writeHTMLCell(95, 7, 97, 197,  $html, 0, 1, false, 'L');

$html= '<div>  Pounds </div>';
$pdf->writeHTMLCell(50, 7, 120, 197, $html, 0, 0, false, true, 'J', true);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 197);
$pdf->TextField('pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 142, 197);
$pdf->TextField('pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 150, 197);
//...........


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.    </b>     Eye color (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 205,  $html, 0, 1, false, 'L');

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

$pdf->writeHTMLCell(190, 7, 13, 212, $html, 0, 1, false, true, 'J', 0);



   
//.............



$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.    </b>     Hair color (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(95, 7, 12, 220,  $html, 0, 1, false, 'L');

$html ='
   <input type="checkbox" name="_bald" value="bald" checked="" /> Bald(No hair)
   
   &nbsp;  &nbsp; <input type="checkbox" name="_black" value="black" checked="" /> Black

   &nbsp;  &nbsp; <input type="checkbox" name="_blond" value="blond" checked="" /> Blond

   &nbsp;  &nbsp; <input type="checkbox" name="_brown" value="brown" checked="" /> Brown

   &nbsp;  &nbsp; <input type="checkbox" name="_gray" value="gray" checked="" /> Gray 

   &nbsp;  &nbsp; <input type="checkbox" name="_red" value="red" checked="" />  Red

   &nbsp;  &nbsp; <input type="checkbox" name="_sandy" value="sandy" checked="" /> Sandy

   &nbsp;  &nbsp; <input type="checkbox" name="_white" value="white" checked="" /> White

   &nbsp;  &nbsp; <input type="checkbox" name="_other" value="other" checked="" /> Unknown/Other
   ';

$pdf->writeHTMLCell(195, 7, 13, 228, $html, 0, 1, false, true, 'J', 0);



//..................................  page 6 start 

  


$pdf->AddPage('P', 'LETTER');                 // page number 6



//...............................................part 8 start here ...................

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 8.  Information About Your Employment and Schools You Attended </b></div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');


//...........................


$pdf->setFont('Times', '', 10);
$html= '<div>List where you have worked or attended school full time or part time during the last five years.
 Provide information for the complete time period. Include all military, police, and/or intelligence service.
 Begin by providing information about your most recent or current employment, studies, or unemployment (if applicable). Provide the and the locations and dates where you worked, were self-employed, were unemployed, or have studied for the last five years. If you worked for yourself, type or print "self-employed." If you were unemployed,
type or print "unemployed." If you need extra space, use additional sheets of paper.</div>';
$pdf->writeHTMLCell(195, 7, 12, 26, $html, 0, 1, false, 'L');


//........................................  Employer or School 1 ................




$pdf->setFont('Times', '', 10.5);
$html= '<div><b>1.      </b>   &nbsp;  Employer or School Name</div>';
$pdf->writeHTMLCell(80, 7, 12, 49, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_information_employeer_school', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 55);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 19, 63, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 63, $html, 0, 1, false, 'L');


//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employeer_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 68);
$pdf->setFont('Times', '', 10.5);


$html= '<div>  <input type="checkbox" name="apt4" value="apt" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 68, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste4" value="ste" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 68, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr4" value="flr" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 68, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 68, '', 1, 1, false, 'L');
//.................


$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 76, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 76, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 76, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 81, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_city_town', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 81);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="part8_information_employment_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 81, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 81);

$pdf->TextField('part8_information_employment_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 81);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 89, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 99);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 89, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 99);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 89, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 99);

//...........
$pdf->setFont('Times', '', 10.5);
$html= '<div>Date From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 20, 107, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_date_from', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 112);


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 70, 107, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_date_to', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 112);

//....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Your Occupation</div>';
$pdf->writeHTMLCell(50, 7, 115, 107, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);

$pdf->ComboBox('part8_information_employment_occupation', 88, 7, array(

'Architecture and Engineering',
'Arts, Design and Fashion',
'Audio/Video Technology',
'Building and Grounds Cleaning and Maintenance',
'Management and Administration',
'Computer, Mathematical and Information Technology',
'Construction and Extraction',
'Education, Training and Library',
'Entertainment and Sports',
'Farming, Fishing and Forestry',
'Business and Financial Operations',
'Food Preparation and Service',
'Government and Public Administration',
'Healthcare Practitioners',
'Healthcare Technicians and Support',
'Hospitality and Tourism',
'Human and Social Services',
'Law Enforcement, Public Safety and Security',
'Legal',
'Life, Physical and Social Science',
'Installation, Maintenance and Repair',
'Manufacturing and Production',
'Manufacturing and Production',
'Marketing, Sales, and Service',
'Media and Communication',
'Military',
'Office and & Administrative Support',
'Other',
'Personal Care and Service',
'Retired',
'Student'	
), array(), array(), 115, 112);

//....................
$pdf->writeHTMLCell(191, 0, 12, 121, '', 'T', 1, false, 'L');


 
//........................................  Employer or School 2 ................



$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.      </b>   &nbsp;  Employer or School Name</div>';
$pdf->writeHTMLCell(80, 7, 12, 122, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_information_employeer_school2', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 127);


//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 19, 135, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 135, $html, 0, 1, false, 'L');


//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employeer_street_number2', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 140);
$pdf->setFont('Times', '', 10.5);

$html= '<div>  <input type="checkbox" name="apt8" value="apt" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 140, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="ste8" value="ste" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 140, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="flr8" value="flr" checked=" " />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 140, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 140, '', 1, 1, false, 'L');


//.................


$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 148, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 148, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 148, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 153, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_city_town2', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 153);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="part8_2_information_employment_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 153, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_2_information_employment_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 153);

$pdf->TextField('part8_2_information_employment_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 153);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 161, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_region2', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 171);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 161, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_postalcode2', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 171);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 161, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_country2', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 171);

//...........
$pdf->setFont('Times', '', 10.5);
$html= '<div>Date From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 20, 179, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_date_from2', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 184);


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 70, 179, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_date_to2', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 184);

//....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Your Occupation</div>';
$pdf->writeHTMLCell(50, 7, 115, 179, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);

$pdf->ComboBox('part8_information_employment_occupation2', 88, 7, array(

'Architecture and Engineering',
'Arts, Design and Fashion',
'Audio/Video Technology',
'Building and Grounds Cleaning and Maintenance',
'Management and Administration',
'Computer, Mathematical and Information Technology',
'Construction and Extraction',
'Education, Training and Library',
'Entertainment and Sports',
'Farming, Fishing and Forestry',
'Business and Financial Operations',
'Food Preparation and Service',
'Government and Public Administration',
'Healthcare Practitioners',
'Healthcare Technicians and Support',
'Hospitality and Tourism',
'Human and Social Services',
'Law Enforcement, Public Safety and Security',
'Legal',
'Life, Physical and Social Science',
'Installation, Maintenance and Repair',
'Manufacturing and Production',
'Manufacturing and Production',
'Marketing, Sales, and Service',
'Media and Communication',
'Military',
'Office and & Administrative Support',
'Other',
'Personal Care and Service',
'Retired',
'Student'	
), array(), array(), 115, 184);

//....................
$pdf->writeHTMLCell(191, 0, 12, 193, '', 'T', 1, false, 'L');





//........................................  Employer or School 3 ................



$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.      </b>   &nbsp;  Employer or School Name</div>';
$pdf->writeHTMLCell(80, 7, 12, 193, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_information_employeer_school3', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 198);


//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 19, 205, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 205, $html, 0, 1, false, 'L');


//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employeer_street_number3', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 210);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt8_3" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 210, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste8_3" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 210, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr8" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 210, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 210, '', 1, 1, false, 'L');


//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 218, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 218, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 218, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 223, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_city_town3', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 223);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 223, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_3_information_employment_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 223);

$pdf->TextField('part8_3_information_employment_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 223);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 20, 230, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_region3', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 240);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 74, 230, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_postalcode3', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 240);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 128, 230, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_foreign_country3', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 240);

//...........
$pdf->setFont('Times', '', 10.5);
$html= '<div>Date From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 20, 247, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_date_from3', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 252);


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(50, 7, 70, 247, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_information_employment_date_to3', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 252);

//....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Your Occupation</div>';
$pdf->writeHTMLCell(50, 7, 115, 247, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);

$pdf->ComboBox('part8_information_employment_occupation3', 88, 7, array(

'Architecture and Engineering',
'Arts, Design and Fashion',
'Audio/Video Technology',
'Building and Grounds Cleaning and Maintenance',
'Management and Administration',
'Computer, Mathematical and Information Technology',
'Construction and Extraction',
'Education, Training and Library',
'Entertainment and Sports',
'Farming, Fishing and Forestry',
'Business and Financial Operations',
'Food Preparation and Service',
'Government and Public Administration',
'Healthcare Practitioners',
'Healthcare Technicians and Support',
'Hospitality and Tourism',
'Human and Social Services',
'Law Enforcement, Public Safety and Security',
'Legal',
'Life, Physical and Social Science',
'Installation, Maintenance and Repair',
'Manufacturing and Production',
'Manufacturing and Production',
'Marketing, Sales, and Service',
'Media and Communication',
'Military',
'Office and & Administrative Support',
'Other',
'Personal Care and Service',
'Retired',
'Student'	
), array(), array(), 115, 252);



//....................



$pdf->AddPage('P', 'LETTER'); // page number 7

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 9.  Time Outside the United States</b></div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

$html= '<div><b>1.  </b>  How many <b>total days (24 hours or longer)</b> did you spend outside the United States during the last 5 years?  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; days</div>';
$pdf->writeHTMLCell(195, 7, 12, 26, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); 
$pdf->TextField('part9_1_days', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 26);

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.  </b>    How many trips of <b>24 hours or longer</b> have you taken outside the United States during the last 5 years?  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; trips</div>';
$pdf->writeHTMLCell(195, 7, 12, 34, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10); 
$pdf->TextField('part9_1_trip', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 34);

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.  </b>    List below all the trips of <b>24 hours or longer</b> that you have taken outside the United States during the last 5 years. Start with<br> &nbsp; &nbsp; &nbsp;
your most recent trip and work backwards. If you need extra space, use additional sheets of paper.</div>';
$pdf->writeHTMLCell(195, 7, 12, 42, $html, 0, 1, false, 'L');

//................................start table  on page 7 .....part 9.....................

$pdf->writeHTMLCell(187, 55.5, 17, 53, '', 1, 1, false, 'J');

$pdf->setFont('Times', '', 10);
$pdf->setCellPaddings(0, 0, 0, 0);
$pdf->setCellHeightRatio(1.1);
$html= '<div><b>Date You Left the United States</b> (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(35, 16, 17, 53, $html, 1, 0, true, true, 'C',true);
//.........

$html= '<div><b> Date You Returned to the United States</b> (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(35, 16, 50, 53, $html, 1, 0, true, true, 'C',true);
//.........
$html= '<div><b>Did Trip Last<br>6 Months  or<br>More?</b></div>';
$pdf->writeHTMLCell(35, 16, 85, 53, $html, 1, 0, true, true, 'C',true);
//..........
$html= '<div><b>Countries to<br>Which You<br>Traveled</b></div>';
$pdf->writeHTMLCell(55, 16, 120, 53, $html, 1, 0, true, true, 'C',true);
//.........
$html= '<div><b>Total Days<br>Outside the<br>United States</b></div>';
$pdf->writeHTMLCell(29, 16, 175, 53, $html, 1, 0, true, true, 'C',true);


//.........................text field start  .. Date You Left the United States........

$pdf->SetFont('courier', 'B', 10);

$pdf->TextField('part9_date_left_united_states1', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 69);

$pdf->TextField('part9_date_left_united_states2', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 75.5);

$pdf->TextField('part9_date_left_united_states3', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 82);

$pdf->TextField('part9_date_left_united_states4', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 88.5);

$pdf->TextField('part9_date_left_united_states5', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 95);

$pdf->TextField('part9_date_left_united_states6', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 101.5);

//.........................text field start  ..  Date You Returned to the United States........

$pdf->TextField('part9_date_returned_united_states1', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 69);

$pdf->TextField('part9_date_returned_united_states2', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 75.5);

$pdf->TextField('part9_date_returned_united_states3', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 82);

$pdf->TextField('part9_date_returned_united_states4', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 88.5);

$pdf->TextField('part9_date_returned_united_states5', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 95);

$pdf->TextField('part9_date_returned_united_states6', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 101.5);

//.....................text field start............. Did Trip Last6 Months or  More?... part 9........

$pdf->SetFont('times', '', 10.5);
$html= '<div><input type="checkbox" name="trip1" value="Y" checked="" /> Yes  &nbsp;&nbsp;
<input type="checkbox" name="trip1" value="N" checked="" /> No </div>';
$pdf->writeHTMLCell(33, 0, 88, 70, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(35, 7, 85, 69, '', 1, 1, false, 'L');


$html= '<div>
<input type="checkbox" name="trip2" value="Y" checked="" /> Yes  &nbsp;&nbsp;
<input type="checkbox" name="trip2" value="N" checked="" /> No </div>';

$pdf->writeHTMLCell(33, 0, 88, 77, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(35, 6, 85, 76, '', 1, 1, false, 'L');


$html= '<div><input type="checkbox" name="trip3" value="Y" checked="" /> Yes  &nbsp;&nbsp;
<input type="checkbox" name="trip3" value="N" checked="" /> No </div>';
$pdf->writeHTMLCell(33, 0, 88, 84, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(35, 7, 85, 82, '', 1, 1, false, 'L');




$html= '<div><input type="checkbox" name="trip4" value="Y" checked="" /> Yes  &nbsp;&nbsp;
<input type="checkbox" name="trip4" value="N" checked="" /> No </div>';
$pdf->writeHTMLCell(33, 0, 88, 90, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(35, 6, 85, 89, '', 1, 1, false, 'L');



$html= '<div><input type="checkbox" name="trip5" value="Y" checked="" /> Yes  &nbsp;&nbsp;
<input type="checkbox" name="trip5" value="N" checked="" /> No </div>';
$pdf->writeHTMLCell(33, 0, 88, 96, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(35, 7, 85, 95, '', 1, 1, false, 'L');



$html= '<div><input type="checkbox" name="trip6" value="Y" checked="" /> Yes  &nbsp;&nbsp;
<input type="checkbox" name="trip6" value="N" checked="" /> No </div>';
$pdf->writeHTMLCell(33, 0, 88, 103, $html, '', 0, 0, true, 'L');
$pdf->writeHTMLCell(35, 6, 85, 102, '', 'R', 1, false, 'L');

//..................all text field ......Countries to Which You Traveled............


$pdf->SetFont('courier', 'B', 10); // set font 

$pdf->TextField('part9_countries_which_travel1', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 69);

$pdf->TextField('part9_countries_which_travel2', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 75.5);

$pdf->TextField('part9_countries_which_travel3', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 82);

$pdf->TextField('part9_countries_which_travel4', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 88.5);

$pdf->TextField('part9_countries_which_travel5', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 95);

$pdf->TextField('part9_countries_which_travel6', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 101.5);


//....................  text field.......Total Days Outside the United States ...........


$pdf->TextField('part9_days_outside_united_states1', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.8, 69);

$pdf->TextField('part9_days_outside_united_states2', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.8, 75.5);

$pdf->TextField('part9_days_outside_united_states3', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.8, 82);

$pdf->TextField('part9_days_outside_united_states4', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.8, 88.5);

$pdf->TextField('part9_days_outside_united_states5', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.8, 95);

$pdf->TextField('part9_days_outside_united_states6', 29, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 174.8, 101.5);




//........................ end table   ................... end table .........

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 10.   Information About Your Marital History</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 113, $html, 1, 1, true, 'L');
//............
$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>1.     </b>   &nbsp;   What is your current marital status?</div>';
$pdf->writeHTMLCell(80, 7, 12, 121, $html, '', 0, 0, true, 'L');



/* if($marital_status=="Single") $single_checked = "checked"; else $single_checked = "";
if($marital_status=="Married") $married_checked = "checked"; else $married_checked = "";
if($marital_status=="Divorced") $divorced_checked = "checked"; else $divorced_checked = "";
if($marital_status=="Widowed") $widowed_checked = "checked"; else $widowed_checked = "";
if($marital_status=="Separeted") $separeted_checked = "checked"; else $separeted_checked = "";
if($marital_status=="Annulled") $annulled_checked = "checked"; else $annulled_checked = ""; */
$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="single" value="single" checked="" /> Single,Never Married
   
   &nbsp;   &nbsp;   <input type="checkbox" name="married" value="married" checked="" /> Married

   &nbsp;   &nbsp;   <input type="checkbox" name="divorced" value="divorced" checked="" /> Divorced

   &nbsp;   &nbsp;   <input type="checkbox" name="widowed" value="widowed" checked="" /> Widowed

   &nbsp;   &nbsp;   <input type="checkbox" name="separated" value="separated" checked="" /> Separated

   &nbsp;   &nbsp;   <input type="checkbox" name="marriage" value="marriage" checked="" /> Marriage

   &nbsp;   &nbsp;   <input type="checkbox" name="annulled" value="annulled" checked="" /> Annulled

   ';       

$pdf->writeHTMLCell(190, 7, 15, 127, $html, 0, 1, false, true, 'J', 0);



$html= '<div>If you are single and have <b>never</b> married, go to <b>Part 11</b>.</div>';
$pdf->writeHTMLCell(100, 7, 18, 132, $html, '', 0, 0, true, 'L');

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.   </b>     If you are married, is your spouse a current member of the U.S. armed forces?</div>';
$pdf->writeHTMLCell(150, 7, 12, 137,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="marriage_armed" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="marriage_armed" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 137, $html, 0, 1, false, true, 'J', 0);

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.   </b>     How many times have you been married (including annulled marriages, marriages to other people, and <br>  &nbsp;   &nbsp;  marriages to the same person)?</div>';
$pdf->writeHTMLCell(165, 7, 12, 144,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_times_married', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 146);
//.................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.   </b>     If you are married now, provide the following information about your current spouse.</div>';
$pdf->writeHTMLCell(165, 7, 12, 155,  $html, 0, 1, false, 'L');


									//............ part A

$html= '<div><b>A.   </b>     Current Spouse\'s Legal Name</div>';
$pdf->writeHTMLCell(165, 7, 17, 162,  $html, 0, 1, false, 'L');


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 168,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_a_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 173);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 168,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_a_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 173);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 168,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_a_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 173);

//................
							//.................. part B

$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>B.   </b>     Current Spouse\'s  Previous Legal Name</div>';
$pdf->writeHTMLCell(165, 7, 17, 182,  $html, 0, 1, false, 'L');


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 187,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_b_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 192);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 187,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_b_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 192);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 187,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_b_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 192);

//................

								 //.................. part c


$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>C.   </b>      Other Names Used by Current Spouse (include nicknames, aliases, and maiden name, if applicable)</div>';
$pdf->writeHTMLCell(180, 7, 17, 200,  $html, 0, 1, false, 'L');


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 205,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_c_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 210);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 205,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_c_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 210);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 205,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_c_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 210);

//...............
										//.......part c 
$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>D.   </b>     Current Spouse\'s Date of Birth<br> &nbsp; &nbsp;  
&nbsp; (mmddyyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 220,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_d_spouse_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 230);



$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>E.   </b>    Date You Entered into Marriage<br> &nbsp; &nbsp;  
&nbsp;
with Current Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 85, 220,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_4_e_spouse_date_entred', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 230);

// page 7 end 





$pdf->AddPage('P', 'LETTER');                // page number 8


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 10.   Information About Your Marital History </b> (continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

//......................

$html= '<div><b>F.   </b>     Current Spouse\'s Present Home Address</div>';
$pdf->writeHTMLCell(165, 7, 17, 25,  $html, 0, 1, false, 'L');

//...........


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 30, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 30, $html, 0, 1, false, 'L');


//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_current_spouse_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 35);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt10" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 35, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste10" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 35, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr10" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 35, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 35, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 42, $html, 0, 1, false, 'L');


$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 85, 42, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 42, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code + 4</div>';
$pdf->writeHTMLCell(60, 7, 172, 42, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 47, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_information_spouse_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 47);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_information_spouse_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 47);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="current_spouse_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 145, 47, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_information_spouse_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 47);

$pdf->TextField('part10_f_information_spouse_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 47);


//......................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_information_spouse_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 64);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_information_spouse_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 64);

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_f_information_spouse_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 64);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>G. </b>  Current Spouse\'s Current Employer or Company</div>';
$pdf->writeHTMLCell(165, 7, 17, 72,  $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_g_information_spouse_current_company', 179, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 77);
//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.   </b>    &nbsp;    Is your current spouse a U.S. citizen?</div>';
$pdf->writeHTMLCell(150, 7, 12, 85,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="current_spouse" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="current_spouse" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 85, $html, 0, 1, false, true, 'J', 0);

$pdf->setFont('Times', '', 10.5);
$html= '<div>   If you answered "Yes," answer <b>Item Number 6.</b> If you answered "No," go to <b>Item Number 7</b>.</div>';
$pdf->writeHTMLCell(150, 7, 17, 91,  $html, 0, 1, false, 'L');

//..................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>6.   </b>    &nbsp;    Is your current spouse is U.S. citizen? complete the fllowing information. </div>';
$pdf->writeHTMLCell(150, 7, 12, 97,  $html, 0, 1, false, 'L');

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.   </b>    When did your current spouse become a U.S. citizen?</div>';
$pdf->writeHTMLCell(150, 7, 18, 103,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><input type="checkbox" name="when_did_" value="Y" checked="" /> At Birth - Go to <b>Item Number 8.</b>&nbsp;   &nbsp; <input type="checkbox" name="others" value="Y" checked="" /> Other - Complete the following information.  </div>';
$pdf->writeHTMLCell(150, 7, 21, 109,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.   </b>    Date Your Current Spouse Became<br> 
   &nbsp;  &nbsp;   a U.S. Citizen (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(62, 7, 18, 115,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_6b_date_spouse_citizen', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 125);

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>7.   </b>    &nbsp;    If your current spouse is not a U.S. citizen, complete the following information.</div>';
$pdf->writeHTMLCell(190, 7, 12, 132,  $html, 0, 1, false, 'L');
//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.   </b>    Current Spouse\'s Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 18, 138,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_7a_current_spouse_citizen', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 143);
//..................


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.   </b>    Current Spouse\'s A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 120, 138,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_7b_current_spouse_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 143);
$pdf->setFont('Times', 'B', 10.5);
$pdf->writeHTMLCell(50, 7, 129, 144,  'A-', 0, 1, false, 'L');
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 107, 87, false); // angle
$pdf->StopTransform();

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>C.   </b>    Current Spouse\'s Immigration Status</div>';
$pdf->writeHTMLCell(90, 7, 18, 150,  $html, 0, 1, false, 'L');
$pdf->setFont('Times', '', 10.5);
$html= '<div><input type="checkbox" name="lawfull_parmanent" value="Y" checked="" />  Lawful Permanent Resident &nbsp;   &nbsp; 

<input type="checkbox" name="others_explain" value="Y" checked="" />  Other (Explain): </div>';
$pdf->writeHTMLCell(150, 7, 23, 155,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_7c_explain', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 105, 155);
//..........................


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>8.   </b>  </div>';
$pdf->writeHTMLCell(40, 7, 12, 163,  $html, 0, 1, false, 'L');
$html= '<div>How many times has your current spouse been married (including annulled marriages, marriages to <br>
other people, and marriages to the same person)? If your current spouse has been married before, <br> provide the following information about your current spouse\'s prior spouse. <br><br>
If your current spouse has had more than one previous marriage, provide that information on additional sheets of paper.  </div>';

$pdf->writeHTMLCell(190, 7, 19, 163,  $html, 0, 1, false, 'L');

//..................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.   </b>    Legal Name of My Current Spouse\'s Prior Spouse</div>';
$pdf->writeHTMLCell(90, 7, 18, 187,  $html, 0, 1, false, 'L');



$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 192,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8a_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 197);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 192,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8a_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 197);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 192,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8a_middle_name', 49, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 197);
//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.   </b>     Immigration Status of My Current Spouse\'s Prior Spouse (if known)</div>';
$pdf->writeHTMLCell(190, 7, 18, 205,  $html, 0, 1, false, 'L'); 
//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><input type="checkbox" name="us_citizen" value="us" checked="" />  U.S. Citizen &nbsp;   &nbsp; 

<input type="checkbox" name="law_full" value="lawfull" checked="" />  Lawful Permanent Resident  &nbsp;   &nbsp; 

<input type="checkbox" name="others_ex" value="other_ex" checked="" />  Other (Explain): </div>';
$pdf->writeHTMLCell(150, 7, 23, 210,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8b_explain', 67, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 135, 210);
//................


$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>C.   </b>     Date of Birth of My Current Spouse\'s<br> &nbsp; &nbsp;  
&nbsp;  Prior Spouse (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(80, 7, 17, 220,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8c_spouse_date_of_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 230);



$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>D.   </b>     Country of Birth of My Current Spouse\'s<br> &nbsp; &nbsp;  
&nbsp; Prior Spouse</div>';
$pdf->writeHTMLCell(80, 7, 85, 220,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8d_spouse_prior_spouse', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 230);

//..............

$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>E.   </b>    Country of Citizenship or Nationality of My Current<br> &nbsp; &nbsp;  
&nbsp;  Spouse\'s Prior Spouse</div>';
$pdf->writeHTMLCell(90, 7, 17, 240,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8e_spouse_prior_spouse_country', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 250);

// ........................ page 8 end ..........





$pdf->AddPage('P', 'LETTER'); // page number 9

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 10.   Information About Your Marital History </b> (continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

//......................

$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>F.   </b>     My Current Spouse\'s Date of Marriage<br> &nbsp; &nbsp;  
&nbsp;with Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 25,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8_d_current_spouse_prior_date_marriage', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 35);


$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>G.   </b>     Date My Current Spouse\'s Marriage Ended<br> &nbsp; &nbsp;  
&nbsp; with Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 85, 25,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8_e_current_spouse_ended', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 35);

//....................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>H.   </b>      How My Current Spouse\'s Marriage Ended with Prior Spouse</div>';
$pdf->writeHTMLCell(190, 7, 18, 43,  $html, 0, 1, false, 'L'); 

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><input type="checkbox" name="ann" value="annuled" checked="" />  Annulled &nbsp;   &nbsp; 

<input type="checkbox" name="dv" value="divorced" checked="" />  Divorced   &nbsp;   &nbsp; 

<input type="checkbox" name="spd" value="spouse deceased" checked="" />  Spouse Deceased &nbsp;   &nbsp; 

<input type="checkbox" name="other_s" value="other" checked="" />  Other (Explain): </div>';
$pdf->writeHTMLCell(150, 7, 23, 48,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_8_h_explain', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 48);

//......................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>9.   </b>      If you were married before, provide the following information about your prior spouse. If you have more than one previous <br>  &nbsp;  &nbsp; 
marriage, provide that information on additional sheets of paper.</div>';
$pdf->writeHTMLCell(192, 7, 12, 55,  $html, 0, 1, false, 'L');

//......................


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.   </b>    My Prior Spouse\'s Legal Name</div>';
$pdf->writeHTMLCell(90, 7, 18, 65,  $html, 0, 1, false, 'L');



$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 70,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9a_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 75);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 70,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9a_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 75);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 70,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9a_middle_name', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 75);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.   </b>      My Prior Spouse\'s Immigration Status When My Marriage Ended (if known)</div>';
$pdf->writeHTMLCell(190, 7, 18, 83,  $html, 0, 1, false, 'L'); 

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div> 

<input type="checkbox" name="us_citizen_" value="us citizen" checked="" /> U.S. Citizen  &nbsp;   &nbsp; 

<input type="checkbox" name="lpr" value="lawful permanent" checked="" /> Lawful Permanent Resident    &nbsp;   &nbsp; 

<input type="checkbox" name="others_" value="other" checked="" />  Other (Explain): </div>';

$pdf->writeHTMLCell(150, 7, 23, 90,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9_b_explain', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 90);

//.................

$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>C.   </b>     My Prior Spouse\'s Date of Birth <br> &nbsp; &nbsp;  
&nbsp;(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 98,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9_c_spouse_prior_date_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 108);


$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>D.   </b>     My Prior Spouse\'s Country
<br>  &nbsp;   &nbsp;  of Birth </div>';
$pdf->writeHTMLCell(80, 7, 85, 98,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9_d_spouse_country_birth', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 91, 108);

//.................





$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>E.   </b>    My Prior Spouse\'s Country of
<br> &nbsp; &nbsp;  &nbsp; Citizenship or Nationality</div>';
$pdf->writeHTMLCell(80, 7, 17, 115,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9_e_spouse_country_citizen', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 125);


$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>F.   </b>     Date of Marriage with My Prior
<br>  &nbsp;   &nbsp;  Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 95, 115,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9_f_spouse_date_of_marriage', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 101, 125);

//.................


$pdf->setFont('Times', '', 10.5); 
$html= '<div><b>G.   </b>     Date Marriage Ended with My<br> &nbsp; &nbsp;  
&nbsp; Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(80, 7, 17, 133,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9g_spouse_date_ended_marriage', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 143);
//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>H.   </b>       How Marriage Ended with My Prior Spouse</div>';
$pdf->writeHTMLCell(190, 7, 18, 151,  $html, 0, 1, false, 'L'); 

//..............

$pdf->setFont('Times', '', 10.5);
$html= '<div><input type="checkbox" name="ann1" value="annuled" checked="" />  Annulled &nbsp;   &nbsp; 

<input type="checkbox" name="dv1" value="divorced" checked="" />  Divorced   &nbsp;   &nbsp; 

<input type="checkbox" name="spd1" value="spouse deceased" checked="" />  Spouse Deceased &nbsp;   &nbsp; 

<input type="checkbox" name="other_s1" value="other" checked="" />  Other (Explain): </div>';
$pdf->writeHTMLCell(150, 7, 23, 156,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_9_h_explain', 64, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 156);

//................


									//..............part 11 ....on.....page number 9


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 11.    Information About Your Children</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 168, $html, 1, 1, true, 'L');
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>1.   </b>  </div>';
$pdf->writeHTMLCell(40, 7, 12, 176,  $html, 0, 1, false, 'L');
$html= '<div>
Indicate your total number of children. (You must indicate <b>ALL</b> children, including: children who are alive, <br>
missing, or deceased: children born in the United States or in other countries; children under 18 years of age or <br>
older: children who are currently married or unmarried; children living with you or elsewhere; current <br>
stepchildren; legally adopted children; and children born when you were not married.)
</div>';

$pdf->writeHTMLCell(190, 7, 19, 176,  $html, 0, 1, false, 'L');

//.................


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.    </b>    Provide the following information about all your children (sons and daughters) listed in <b>Item Number 1.</b>, regardless of age.<br>   &nbsp;  &nbsp; 
To list any additional children, use additional sheets of paper.

</div>';

$pdf->writeHTMLCell(192, 7, 12, 196,  $html, 0, 1, false, 'L');

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A.  &nbsp;   Child 1 </b> <br> &nbsp;  &nbsp;  &nbsp;   Current Legal Name</div>';
$pdf->writeHTMLCell(192, 7, 17, 205,  $html, 0, 1, false, 'L');

//................


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 214,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2a_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 220);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 214,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2a_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 220);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 214,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2a_middle_name', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 220);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div>   A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 22, 229,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2a_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 37, 235);
$pdf->setFont('Times', 'B', 10.5);
$pdf->writeHTMLCell(50, 7, 30, 235,  'A-', 0, 1, false, 'L');
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 21, 227, false); // angle
$pdf->StopTransform();

//...............


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(65, 7, 90, 229,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2a_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 235);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country of Birth</div>';
$pdf->writeHTMLCell(60, 7, 140, 229,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2a_country_of_birth', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 235);


								// ............ page 9 end ............



$pdf->AddPage('P', 'LETTER'); // page number 10

														//part 11 continued 



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 11.    Information About Your Children</b> (continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');
//..............

$html= '<div>Current Address</div>';
$pdf->writeHTMLCell(165, 7, 24, 25,  $html, 0, 1, false, 'L');

//...........


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 30, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 30, $html, 0, 1, false, 'L');


//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 35);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt11" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 35, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste11" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 35, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr11" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 35, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 35, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 42, $html, 0, 1, false, 'L');


$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 85, 42, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 42, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 172, 42, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 47, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 47);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 47);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 145, 47, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 47);

$pdf->TextField('part11_2a_child_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 47);


//......................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 64);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 64);

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 64);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>What is your child\'s relationship to you? (for example, biological child,<br>
stepchild, legally adopted child) </div>';
$pdf->writeHTMLCell(165, 7, 24, 75,  $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2a_child_relationship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 75);
//..............
$pdf->writeHTMLCell(191, 7, 12, 86,  '', 'T', 1, false, 'L');

				//............................. child 2 .............................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.  &nbsp;   Child 2 </b> <br> &nbsp;  &nbsp;  &nbsp;   Current Legal Name</div>';
$pdf->writeHTMLCell(192, 7, 17, 86,  $html, 0, 1, false, 'L');

//................


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 95,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2b_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 100);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 95,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2b_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 100);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 95,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2b_middle_name', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 100);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div>   A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 22, 108,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2b_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 37, 113);
$pdf->setFont('Times', 'B', 10.5);
$pdf->writeHTMLCell(50, 7, 30, 113,  'A-', 0, 1, false, 'L');
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 21, 106, false); // angle
$pdf->StopTransform();

//...............


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(65, 7, 90, 108,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2b_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 113);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country of Birth</div>';
$pdf->writeHTMLCell(60, 7, 140, 108,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2b_country_of_birth', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 113);

$pdf->setFont('Times', '', 10.5);
$html= '<div>Current Address</div>';
$pdf->writeHTMLCell(165, 7, 24, 121,  $html, 0, 1, false, 'L');

//...........


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 127, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 127, $html, 0, 1, false, 'L');


//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 132);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt11b" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 132, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste11b" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 132, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr11b" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 132, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 132, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 140, $html, 0, 1, false, 'L');


$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 85, 140, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 140, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 172, 140, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 145, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 145);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 145);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 145, 145, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 145);

$pdf->TextField('part11_2b_child_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 145);


//......................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 163);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 163);

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 163);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>What is your child\'s relationship to you? (for example, biological child,<br>
stepchild, legally adopted child) </div>';
$pdf->writeHTMLCell(165, 7, 24, 172,  $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2b_child_relationship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 173);

$pdf->writeHTMLCell(191, 7, 12, 183,  '', 'T', 1, false, 'L');

				//............................. child 3 .............................

  

//...........

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>C.  &nbsp;   Child 3 </b> <br> &nbsp;  &nbsp;  &nbsp;   Current Legal Name</div>';
$pdf->writeHTMLCell(192, 7, 17, 184,  $html, 0, 1, false, 'L');

//................


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 194,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2c_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 200);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 194,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2c_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 200);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 194,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2c_middle_name', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 200);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div>   A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 22, 210,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2c_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 37, 215);
$pdf->setFont('Times', 'B', 10.5);
$pdf->writeHTMLCell(50, 7, 30, 215,  'A-', 0, 1, false, 'L');
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 21, 208, false); // angle
$pdf->StopTransform();

//...............


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(65, 7, 90, 210,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2c_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 215);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country of Birth</div>';
$pdf->writeHTMLCell(60, 7, 140, 210,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2c_country_of_birth', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 215);




//................ page 10 end ..............





$pdf->AddPage('P', 'LETTER'); // page number 11


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 11.    Information About Your Children</b> (continued)</div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

//..............

$html= '<div>Current Address</div>';
$pdf->writeHTMLCell(165, 7, 24, 25,  $html, 0, 1, false, 'L');

//...........


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 30, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 30, $html, 0, 1, false, 'L');


//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 35);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt11d" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 35, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste11d" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 35, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr11d" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 35, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 35, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 42, $html, 0, 1, false, 'L');


$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 85, 42, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 42, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 172, 42, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 47, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 47);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 47);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 145, 47, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 47);

$pdf->TextField('part11_2c_child_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 47);


//......................


$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 64);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 64);

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 54, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 64);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>What is your child\'s relationship to you? (for example, biological child,<br>
stepchild, legally adopted child) </div>';
$pdf->writeHTMLCell(165, 7, 24, 75,  $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2c_child_relationship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 75);
//..............
$pdf->writeHTMLCell(191, 7, 12, 86,  '', 'T', 1, false, 'L');


					//........................child 4 ....................



$pdf->setFont('Times', '', 10.5);
$html= '<div><b>D.  &nbsp;   Child 4 </b> <br> &nbsp;  &nbsp;  &nbsp;   Current Legal Name</div>';
$pdf->writeHTMLCell(192, 7, 17, 86,  $html, 0, 1, false, 'L');

//................


$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 24, 95,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2d_last_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 100);
//................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(65, 7, 90, 95,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2d_first_name', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 100);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 153, 95,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2d_middle_name', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 153, 100);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div>   A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 22, 108,  $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2d_a_number', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 37, 113);
$pdf->setFont('Times', 'B', 10.5);
$pdf->writeHTMLCell(50, 7, 30, 113,  'A-', 0, 1, false, 'L');
//............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 21, 106, false); // angle
$pdf->StopTransform();

//...............


$pdf->setFont('Times', '', 10.5);
$html= '<div>Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(65, 7, 90, 108,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2d_date_of_birth', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 113);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country of Birth</div>';
$pdf->writeHTMLCell(60, 7, 140, 108,  $html, 0, 1, false, 'L');

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part11_2d_country_of_birth', 63, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 140, 113);

$pdf->setFont('Times', '', 10.5);
$html= '<div>Current Address</div>';
$pdf->writeHTMLCell(165, 7, 24, 121,  $html, 0, 1, false, 'L');

//...........


$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 24, 127, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 158, 127, $html, 0, 1, false, 'L');


//...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_street_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 132);
$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt11b" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 159, 132, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste11b" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 132, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr11b" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 179, 132, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 132, '', 1, 1, false, 'L');
//.................



$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 24, 140, $html, 0, 1, false, 'L');


$html= '<div>Country</div>';
$pdf->writeHTMLCell(70, 7, 85, 140, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 144, 140, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 172, 140, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 145, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_city_town', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 145);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_country', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 145);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 145, 145, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 145);

$pdf->TextField('part11_2d_child_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 145);


//......................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province or Region<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 24, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_foreign_region', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 163);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code<br>(foreign address only)</div>';
$pdf->writeHTMLCell(70, 7, 82, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_foreign_postalcode', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 81, 163);

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country<br>(foreign address only)</div>';
$pdf->writeHTMLCell(80, 7, 134, 153, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_foreign_country', 69, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 134, 163);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>What is your child\'s relationship to you? (for example, biological child,<br>
stepchild, legally adopted child) </div>';
$pdf->writeHTMLCell(165, 7, 24, 172,  $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part11_2d_child_relationship', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 173);

//...................... chil section end .............. 




$pdf->setFillColor(220, 220, 220);     //............. part 12 start ................
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 12.   Additional Information About You </b> (Person Applying for Naturalization)  </div>';
$pdf->writeHTMLCell(190, 7, 13, 185, $html, 1, 1, true, 'L');
//................

$pdf->setFont('Times', '', 10);
$html ='<div>Answer<b> Item Numbers 1. - 21.</b> If you answer "Yes" to any of these questions, include a typed or printed explanation on additional
sheets of paper.</div>';
$pdf->writeHTMLCell(195, 7, 12, 192, $html, 0, 1);

//.....................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>1.   </b>     Have you <b>EVER</b> claimed to be a U.S. citizen (in writing or any other way)?</div>';
$pdf->writeHTMLCell(170, 7, 12, 202,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_1" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_1" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 202, $html, 0, 1, false, true, 'J', 0);

//................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>2.   </b>   Have you <b>EVER</b> registered to vote in any Federal, state, or local election in the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 209,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_2" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_2" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 209, $html, 0, 1, false, true, 'J', 0);

//.........................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>3.   </b>    Have you <b>EVER</b> voted in any Federal, state, or local election in the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 215,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_3" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_3" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 215, $html, 0, 1, false, true, 'J', 0);

//....................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.   &nbsp;  &nbsp;  A.   </b>    Do you now have, or did you <b>EVER</b> have, a hereditary title or an order of nobility in any foreign <br> &nbsp;   &nbsp; &nbsp;   &nbsp;  &nbsp;   &nbsp;  &nbsp; 
country?</div>';
$pdf->writeHTMLCell(170, 7, 12, 222,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_4a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_4a" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 223, $html, 0, 1, false, true, 'J', 0);

//.............


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>B.   </b>      If you answered "Yes," are you willing to give up any inherited titles or orders of nobility that you <br> &nbsp;  &nbsp; &nbsp; 
have in a foreign country at your naturalization ceremony?</div>';
$pdf->writeHTMLCell(170, 7, 20, 232,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_4b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_4b" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 235, $html, 0, 1, false, true, 'J', 0);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.   </b>    Have you EVER been declared legally incompetent or been confined to a mental institution?</div>';
$pdf->writeHTMLCell(170, 7, 12, 245,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_5" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_5" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 245, $html, 0, 1, false, true, 'J', 0);

						// page 11 end .............  


$pdf->AddPage('P', 'LETTER'); // page number 12


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 12.  Additional Information About You </b> (Person Applying for Naturalization) (Continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');
//................

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.   </b>    Do you owe any overdue Federal. state, or local taxes? </div>';
$pdf->writeHTMLCell(170, 7, 12, 30,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_6" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_6" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 30, $html, 0, 1, false, true, 'J', 0);

//..................


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.   </b><b>     A.   </b>      Have you <b>EVER</b> not filed a Federal, state, or local tax return since you became a lawful permanent <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  resident? </div>';
$pdf->writeHTMLCell(170, 7, 12, 37,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_7a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_7a" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 37, $html, 0, 1, false, true, 'J', 0);

//.............




$pdf->setFont('Times', '', 10);
$html= '<div><b>B.   </b>      If you answered "Yes." did you consider yourself to be a "non-U.S. resident"?</div>';
$pdf->writeHTMLCell(170, 7, 18, 47,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_7b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_7b" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 47, $html, 0, 1, false, true, 'J', 0);


//...............


$pdf->setFont('Times', '', 10);
$html= '<div><b>8.   </b>      Have you called yourself a "non-U.S. resident" on a Federal, state, or local tax return since you became a <br>&nbsp; &nbsp; &nbsp; lawful permanent resident? </div>';
$pdf->writeHTMLCell(170, 7, 12, 54,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_8" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_8" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 54, $html, 0, 1, false, true, 'J', 0);

//................  

$pdf->setFont('Times', '', 10);
$html= '<div><b>9.   </b><b>     A.   </b>      Have you <b>EVER</b> been a member of, involved in, or in any way associated with, any organization, <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; association, fund, foundation, party, club, society, or similar group in the United States or in any other<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  location in the world? </div>';
$pdf->writeHTMLCell(170, 7, 12, 65,  $html, 0, 1, false, 'L');

$html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_9a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_9a" value="N" checked="" /> No
   ';

$pdf->writeHTMLCell(50, 7, 170, 65, $html, 0, 1, false, true, 'J', 0);

//...............


$pdf->setFont('Times', '', 10);
$html= '<div><b>B.   </b>       If you answered "Yes, " provide the information below. If you need extra space, attach the names of the other groups on <br> &nbsp; &nbsp; &nbsp;  additional sheets of paper and provide any evidence to support your answers. </div>';
$pdf->writeHTMLCell(190, 7, 18, 80,  $html, 0, 1, false, 'L');



//.................. start table ................. 


$pdf->writeHTMLCell(179.8, 54.3, 24, 92,  '', 1, 1, false, 'L');

	// table header start 

$pdf->setFont('Times', '', 10);
$html= '<div><b>Name<br>of the<br>Group</b></div>';
$pdf->writeHTMLCell(65, 15, 24, 92, $html, 1, 0, true, true, 'C',true);


$pdf->setFont('Times', '', 10);
$html= '<div><b>Purpose<br>of the<br>Group</b></div>';
$pdf->writeHTMLCell(65, 15, 89, 92, $html, 1, 0, true, true, 'C',true);

$pdf->setFont('Times', '', 10);
$html= '<div><b>Dates of Membership</b></div>';
$pdf->writeHTMLCell(49, 5, 154.3, 92.5, $html, 0, 0, true, true, 'C',true);


$pdf->setFont('Times', '', 10);
$html= '<div><b>From </b> (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(25, 4, 154, 97, $html, 1, 0, true, true, 'C',true);



$pdf->setFont('Times', '', 10);
$html= '<div><b>To </b> (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell(25, 4, 178.8, 97, $html, 1, 0, true, true, 'C',true);

// table header end ....

// table body start 
// name of group

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_name_of_group_1', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 107);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_name_of_group_2', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 116.8);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_name_of_group_3', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 126.5);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_name_of_group_4', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 24, 136.3);

//.......  purpose of group 


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_purpose_of_group_1', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 89, 107);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_purpose_of_group_2', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 89, 116.8);



$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_purpose_of_group_3', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 89, 126.5);




$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_purpose_of_group_4', 65, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 89, 136.3);

//......... from 

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_from_date_1', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 107);



$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_from_date_2', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 116.8);



$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_from_date_3', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 126.5);



$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_from_date_4', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 154, 136.3);


// table to mm/dd/yyyy




$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_to_date_1', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178.8, 107);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_to_date_2', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178.8, 116.8);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_to_date_3', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178.8, 126.5);
 

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_table_to_date_4', 25, 10, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 178.8, 136.3);

//................ table end ..............



$pdf->setFont('Times', '', 10);
$html= '<div><b>10.   </b>     Have you <b>EVER</b> been a member of. or in any way associated (either directly or indirectly) with:</div>';
$pdf->writeHTMLCell(170, 7, 12, 148,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>A.   </b>     The Communist Party?</div>';
$pdf->writeHTMLCell(170, 7, 20, 155,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_10a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_10a" value="N" checked="" /> No
    ';

$pdf->writeHTMLCell(50, 7, 170, 155, $html, 0, 1, false, true, 'J', 0);



$pdf->setFont('Times', '', 10);
$html= '<div><b>B.   </b>     Any other totalitarian party?</div>';
$pdf->writeHTMLCell(170, 7, 20, 160,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_10b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_10b" value="N" checked="" /> No
    ';

$pdf->writeHTMLCell(50, 7, 170, 160, $html, 0, 1, false, true, 'J', 0);



$pdf->setFont('Times', '', 10);
$html= '<div><b>C.   </b>    A terrorist organization?</div>';
$pdf->writeHTMLCell(170, 7, 20, 165,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_10C" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_10C" value="N" checked="" /> No
    ';

$pdf->writeHTMLCell(50, 7, 170, 165, $html, 0, 1, false, true, 'J', 0);



$pdf->setFont('Times', '', 10);
$html= '<div><b>11.   </b>     Have you <b>EVER</b> advocated (either directly or indirectly) the overthrow of any government by force or <br>&nbsp;   &nbsp; &nbsp;   &nbsp;  
violence?</div>';
$pdf->writeHTMLCell(170, 7, 12, 175,  $html, 0, 1, false, 'L');


$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_11" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_11" value="N" checked="" /> No
 ';

$pdf->writeHTMLCell(50, 7, 170, 175, $html, 0, 1, false, true, 'J', 0);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>12.   </b>     Have you <b>EVER</b>  persecuted (either directly or indirectly) any person because of race, religion, national<br>&nbsp;   &nbsp; &nbsp;   &nbsp;  
origin, membership in a particular social group, or political opinion?</div>';
$pdf->writeHTMLCell(170, 7, 12, 190,  $html, 0, 1, false, 'L');


$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_12" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_12" value="N" checked="" /> No
 ';

$pdf->writeHTMLCell(50, 7, 170, 190, $html, 0, 1, false, true, 'J', 0);


$pdf->setFont('Times', '', 10);
$html= '<div><b>13.   </b>     Between March 23, 1933 and May 8, 1945, did you work for or associate in any way (either directly or <br> &nbsp;   &nbsp; &nbsp;   &nbsp;  indirectly) with: </div>';
$pdf->writeHTMLCell(170, 7, 12, 205,  $html, 0, 1, false, 'L');



$pdf->setFont('Times', '', 10);
$html= '<div><b>A.   </b>    The Nazi government of Germany?</div>';
$pdf->writeHTMLCell(170, 7, 20, 215,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_13a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_13a" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 215, $html, 0, 1, false, true, 'J', 0);




$pdf->setFont('Times', '', 10);
$html= '<div><b>B.   </b>     Any government in any area occupied by. allied with, or established with the help of the Nazi <br> &nbsp;  &nbsp;   &nbsp;  &nbsp; government of Germany? </div>';
$pdf->writeHTMLCell(170, 7, 20, 225,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_13b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_13b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 225, $html, 0, 1, false, true, 'J', 0);





$pdf->setFont('Times', '', 10);
$html= '<div><b>C.   </b>      Any German, Nazi, or S.S. military unit, paramilitary unit, self-defense unit, vigilante unit, citizen unit,<br>&nbsp; &nbsp; &nbsp;  &nbsp; police unit, government agency or office, extermination camp, concentration camp, prisoner of war <br>&nbsp; &nbsp; &nbsp; &nbsp; camp, prison, labor camp, or transit camp? </div>';
$pdf->writeHTMLCell(170, 7, 20, 235,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_13c" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_13c" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 235, $html, 0, 1, false, true, 'J', 0);

//................end page 12 



$pdf->AddPage('P', 'LETTER'); // page number 13

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 12.  Additional Information About You </b> (Person Applying for Naturalization) (Continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

//......

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>14.   </b>    Were you <b>EVER</b> involved in any way with any of the following:</div>';
$pdf->writeHTMLCell(170, 7, 12, 30,  $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div><b>A.   </b>    Genocide?</div>';
$pdf->writeHTMLCell(170, 7, 20, 38,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_14a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_14a" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 38, $html, 0, 1, false, true, 'J', 0);


$pdf->setFont('Times', '', 10);
$html= '<div><b>B.   </b>    Torture?</div>';
$pdf->writeHTMLCell(170, 7, 20, 45,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_14b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_14b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 45, $html, 0, 1, false, true, 'J', 0);




$pdf->setFont('Times', '', 10);
$html= '<div><b>C.   </b>     Killing, or trying to kill, someone?</div>';
$pdf->writeHTMLCell(170, 7, 20, 51,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_14c" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_14c" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 51, $html, 0, 1, false, true, 'J', 0);



$pdf->setFont('Times', '', 10);
$html= '<div><b>D.   </b>     Badly hurting, or trying to hurt, a person on purpose?</div>';
$pdf->writeHTMLCell(170, 7, 20, 57,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_14d" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_14d" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 57, $html, 0, 1, false, true, 'J', 0);


$pdf->setFont('Times', '', 10);
$html= '<div><b>E.   </b>    Forcing, or trying to force, someone to have any kind of sexual contact or relations?</div>';
$pdf->writeHTMLCell(170, 7, 20, 63,  $html, 0, 1, false, 'L');

 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_14e" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_14e" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 63, $html, 0, 1, false, true, 'J', 0);


$pdf->setFont('Times', '', 10);
$html= '<div><b>F.   </b>    Not letting someone practice his or her religion?</div>';
$pdf->writeHTMLCell(170, 7, 20, 70,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_14f" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_14f" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 70, $html, 0, 1, false, true, 'J', 0);

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>15.   </b>   Were you <b>EVER</b> a member of, or did you <b>EVER</b> serve in, help, or otherwise participate in, any of the <br> &nbsp;   &nbsp; &nbsp;   &nbsp;  following groups : </div>';
$pdf->writeHTMLCell(170, 7, 12, 77,  $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div><b>A.   </b>    Military unit?</div>';
$pdf->writeHTMLCell(170, 7, 20, 87,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15a" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 87, $html, 0, 1, false, true, 'J');



$html= '<div><b>B.   </b>    Paramilitary unit (a group of people who act like a military group but are not part of the official <br> &nbsp;   &nbsp;  &nbsp;  military)? </div>';
$pdf->writeHTMLCell(170, 7, 20, 93,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 93, $html, 0, 1, false, true, 'J');



$html= '<div><b>C.   </b> Police unit?</div>';
$pdf->writeHTMLCell(170, 7, 20, 103,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15c" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15c" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 103, $html, 0, 1, false, true, 'J');




$html= '<div><b>D.   </b>Self-defense unit?</div>';
$pdf->writeHTMLCell(170, 7, 20, 110,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15d" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15d" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 110, $html, 0, 1, false, true, 'J');




$html= '<div><b>E.   </b>Vigilante unit (a group of people who act like the police, but are not part of the official police)? </div>';
$pdf->writeHTMLCell(170, 7, 20, 117,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15e" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15e" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 117, $html, 0, 1, false, true, 'J');






$html= '<div><b>F.   </b> Rebel group?</div>';
$pdf->writeHTMLCell(170, 7, 20, 124,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15f" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15f" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 124, $html, 0, 1, false, true, 'J');




$html= '<div><b>G.   </b>Guerrilla group (a group of people who use weapons against or otherwise physically attack the<br>&nbsp;  &nbsp;  &nbsp; military, police, government, or other people)?</div>';
$pdf->writeHTMLCell(170, 7, 20, 131,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15g" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15g" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 132, $html, 0, 1, false, true, 'J');


$html= '<div><b>H.   </b>    Militia (an army of people, not part of the official military)?</div>';
$pdf->writeHTMLCell(170, 7, 20, 141,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15h" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15h" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 141, $html, 0, 1, false, true, 'J');



$html= '<div><b>I.   </b>   Insurgent organization (a group that uses weapons and fights against a government)? </div>';
$pdf->writeHTMLCell(170, 7, 20, 147,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_15i" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_15i" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 147, $html, 0, 1, false, true, 'J');



//...................


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>16.   </b>    Were you <b>EVER</b> a worker, volunteer, or soldier, or did you otherwise <b>EVER</b> serve in any of the<br>   &nbsp;   &nbsp;  &nbsp;  following:</div>';
$pdf->writeHTMLCell(170, 7, 12, 153,  $html, 0, 1, false, 'L');



$html= '<div><b>A.   </b>     Prison or jail? </div>';
$pdf->writeHTMLCell(170, 7, 20, 163,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_16a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_16a" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 163, $html, 0, 1, false, true, 'J');



$html= '<div><b>B.   </b>      Prison camp?</div>';
$pdf->writeHTMLCell(170, 7, 20, 170,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_16b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_16b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 170, $html, 0, 1, false, true, 'J');



$html= '<div><b>C.  </b>  Detention facility (a place where people are forced to stay)?</div>';
$pdf->writeHTMLCell(170, 7, 20, 177,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_16c" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_16c" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 177, $html, 0, 1, false, true, 'J');




$html= '<div><b>D.  </b>   Labor camp (a place where people are forced to work)?</div>';
$pdf->writeHTMLCell(170, 7, 20, 184,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_16d" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_16d" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 184, $html, 0, 1, false, true, 'J');




$html= '<div><b>E.  </b>   Any other place where people were forced to stay?</div>';
$pdf->writeHTMLCell(170, 7, 20, 190,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_16e" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_16e" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 190, $html, 0, 1, false, true, 'J');

//.................

$pdf->setFont('Times', '', 10);
$html= '<div><b>17.   </b>   Were you <b>EVER</b> a part of any group, or did you <b>EVER</b> help any group, unit, or organization that used a<br>  &nbsp;  &nbsp;  &nbsp; weapon against any person, or threatened to do so? </div>';
$pdf->writeHTMLCell(170, 7, 12, 197,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_17" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_17" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 197, $html, 0, 1, false, true, 'J');

 
$html= '<div><b>A.  </b>    If you answered "Yes." when you were part of this group, or when you helped this group, did you ever <br>    &nbsp;  &nbsp;  &nbsp;   use a weapon against another person?</div>';
$pdf->writeHTMLCell(170, 7, 20, 207,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_17a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_17a" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 207, $html, 0, 1, false, true, 'J');



$html= '<div><b>B.  </b>   If you answered "Yes." when you were part of this group, or when you helped this group, did you eve<br> &nbsp;  &nbsp;  &nbsp;  tell another person that you would use a weapon against that person?</div>';
$pdf->writeHTMLCell(170, 7, 20, 217,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_17b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_17b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 217, $html, 0, 1, false, true, 'J');

//................

$pdf->setFont('Times', '', 10);
$html= '<div><b>18.   </b>    Did you <b>EVER</b> sell, give, or provide weapons to any person, or help another person sell, give, or provide<br>  &nbsp;  &nbsp;  &nbsp;  weapons to any person?</div>';
$pdf->writeHTMLCell(170, 7, 12, 227,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_18" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_18" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 227, $html, 0, 1, false, true, 'J');



$html= '<div><b>A.  </b>   If you answered "Yes," did you know that this person was going to use the weapons against another<br> &nbsp;  &nbsp;  &nbsp;  person? </div>';
$pdf->writeHTMLCell(170, 7, 20, 236,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_18a" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_18a" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 236, $html, 0, 1, false, true, 'J');



$html= '<div><b>B.  </b>   If you answered "Yes." did you know that this person was going to sell or give the weapons to<br> &nbsp;  &nbsp;  &nbsp;  someone who was going to use them against another person?</div>';
$pdf->writeHTMLCell(170, 7, 20, 245,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_18b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_18b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 245, $html, 0, 1, false, true, 'J');


// .............page 23 end 


$pdf->AddPage('P', 'LETTER'); // page number 14

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 12.      Additional Information About You </b> (Person Applying for Naturalization) (Continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>19.   </b>    Did you <b>EVER</b> receive any type of military, paramilitary (a group of people who act like a military group<br>  &nbsp;  &nbsp;  &nbsp;  but are not part of the official military), or weapons training?</div>';
$pdf->writeHTMLCell(170, 7, 12, 30,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_19" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_19" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 30, $html, 0, 1, false, true, 'J');





$pdf->setFont('Times', '', 10);
$html= '<div><b>20.   </b>     Did you <b>EVER</b> recruit (ask), enlist (sign up), conscript (require), or use any person under 15 years of age<br>  &nbsp;  &nbsp;  &nbsp;  to serve in or help an armed force or group?</div>';
$pdf->writeHTMLCell(170, 7, 12, 40,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_20" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_20" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 40, $html, 0, 1, false, true, 'J');



$pdf->setFont('Times', '', 10);
$html= '<div><b>21.   </b>   Did you <b>EVER</b> use any person under 15 years of age to do anything that helped or supported people in<br>  &nbsp;  &nbsp;  &nbsp;  combat?</div>';
$pdf->writeHTMLCell(170, 7, 12, 50,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_21" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_21" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 50, $html, 0, 1, false, true, 'J');



$pdf->setFont('Times', '', 10);
$html= '<div><b> If any of Item Numbers 22. - 28. apply to you, you must answer "Yes" even if your records have been sealed, expunged, or
otherwise cleared.</b> You must disclose this information even if someone, including a judge, law enforcement officer, or attorney, told
you that it no longer constitutes a record or told you that you do not have to disclose the information.  </div>';
$pdf->writeHTMLCell(190, 7, 12, 60,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>22.   </b>   Have you <b>EVER</b> committed, assisted in commiting  or attempted to commit, a crime or offense for which <br>  &nbsp;  &nbsp;  &nbsp;  you were <b>NOT</b> arrested?</div>';
$pdf->writeHTMLCell(170, 7, 12, 75,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_22" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_22" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 75, $html, 0, 1, false, true, 'J');


$pdf->setFont('Times', '', 10);
$html= '<div><b>23.   </b>   Have you <b>EVER</b> been arrested, cited, or detained by any law enforcement officer (including any <br>  &nbsp;  &nbsp;  &nbsp;  immigration official or any official of the U.S. armed forces) for any reason?</div>';
$pdf->writeHTMLCell(170, 7, 12, 85,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_23" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_23" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 85, $html, 0, 1, false, true, 'J');



$html= '<div><b>24.   </b>   Have you <b>EVER</b> been charged with committing, attempting to commit, or assisting in committing a crime <br>  &nbsp;  &nbsp;  &nbsp;  or offense?</div>';
$pdf->writeHTMLCell(170, 7, 12, 95,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_24" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_24" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 95, $html, 0, 1, false, true, 'J');


$html= '<div><b>25.   </b>   Have you <b>EVER</b> been convicted of a crime or offense?</div>';
$pdf->writeHTMLCell(170, 7, 12, 105,  $html, 0, 1, false, 'L');

$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="convicted_of_a_crime" value="Yes" checked=" " /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="convicted_of_a_crime" value="No" checked=" " /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 105, $html, 0, 1, false, true, 'J');


$html= '<div><b>26.   </b>    Have you <b>EVER</b>Have you EVER been placed in an alternative sentencing or a rehabilitative program (for <br>  &nbsp;  &nbsp; &nbsp; example,  diversion, deferred prosecution, withheld adjudication, deferred adjudication)?</div>';
$pdf->writeHTMLCell(170, 7, 12, 113,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_26" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_26" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 114, $html, 0, 1, false, true, 'J');



$html= '<div><b>27.   &nbsp;   A.  </b>    Have you <b>EVER</b> received a suspended sentence, been placed on probation, or been paroled?</div>';
$pdf->writeHTMLCell(170, 7, 12, 125,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_27a" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_27a" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 125, $html, 0, 1, false, true, 'J');


$html= '<div><b>B.  </b>    If you answered " Yes," have you completed the probation or parole?</div>';
$pdf->writeHTMLCell(170, 7, 19, 131,  $html, 0, 1, false, 'L');
 
 $html ='
   &nbsp;  &nbsp;    <input type="checkbox" name="part12_27b" value="Y" checked="" /> Yes
   
   &nbsp;   &nbsp;   <input type="checkbox" name="part12_27b" value="N" checked="" /> No
    ';
$pdf->writeHTMLCell(50, 7, 170, 131, $html, 0, 1, false, true, 'J');


$html= '<div><b>28.   &nbsp;   A.  </b>    Have you <b>EVER</b> been in jail or prison?</div>';
$pdf->writeHTMLCell(170, 7, 12, 138,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_28a" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_28a" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 138, $html, 0, 1, false, true, 'J');


$html= '<div><b>B.  </b>    If you answered "Yes," how long were you in jail or prison?</div>';
$pdf->writeHTMLCell(170, 7, 19, 145,  $html, 0, 1, false, 'L');
 

$pdf->setFont('Times', '', 10);
$html= '<div>Years</div>';
$pdf->writeHTMLCell(30, 7, 120, 146,  $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part12_28b_years', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130,  145);

$pdf->setFont('Times', '', 10);
$html= '<div>Months</div>';
$pdf->writeHTMLCell(30, 7, 147, 146,  $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part12_28b_month', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 160,  145);

$pdf->setFont('Times', '', 10);
$html= '<div>Days</div>';
$pdf->writeHTMLCell(30, 7, 176, 146,  $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part12_28b_day', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 185, 145);

$pdf->setFont('Times', '', 10);
$html= '<div><b>29.  </b>     If you answered "No" to <b>ALL</b> questions in <b>Item Numbers 23. - 28.</b>, then skip this item and go to <b>Item Number 30.</b> <br><br> &nbsp;   &nbsp; &nbsp;   If you answered "Yes" to any question in Item Numbers 23. - 28., then complete this table. If you need extra space, use <br>   &nbsp;   &nbsp; &nbsp;   additional sheets of paper and provide any evidence to support your answers.</div>';
$pdf->writeHTMLCell(190, 7, 12, 153,  $html, 0, 1, false, 'L');


// start table .............  


$pdf->writeHTMLCell(185, 76.5, 17, 175, '', 1, 1, false, 'J');

// table header 

$pdf->setFont('Times', '', 10);
$html= '<div><b>Why were you<br>arrested, cited,<br>detained, or<br>charged?</b></div>';
$pdf->writeHTMLCell(45, 15, 17, 175, $html, 1, 0, true, true, 'C',true);

$pdf->setFont('Times', '', 10);
$html= '<div><b>Date arrested, cited,<br>detained, or<br>charged.</b><br>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(35, 15, 62, 175, $html, 1, 0, true, true, 'C',true);


$pdf->setFont('Times', '', 10);
$html= '<div><b>Where were you<br>arrested, cited, detained, or<br>charged?</b> (City or Town,<br> State, Country)</div>';
$pdf->writeHTMLCell(50, 15, 97, 175, $html, 1, 0, true, true, 'C',true);


$pdf->setFont('Times', '', 10);
$html= '<div><b>Outcome or disposition of the<br>
arrest, citation, detention, or<br>
charge</b> (no charges filed, charges<br>
smissed, jail, probation, etc.)</div>';
$pdf->writeHTMLCell(54.8, 15, 147, 175, $html, 1, 0, true, true, 'C',true);
// end header 


// table body 
		// where you arrested 
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_where_arested1', 45, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 193.5);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_where_arested2', 45, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 205);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_where_arested3', 45, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 216.5);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_where_arested4', 45, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 228);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_where_arested5', 45, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 17, 239.5);

		//date arrested


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_date_arrested1', 35, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 193.5);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_date_arrested2', 35, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 205);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_date_arrested3', 35, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 216.5);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_date_arrested4', 35, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 228);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_date_arrested5', 35, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62, 239.5);


		// where arested city town   


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_arrested_city_town1', 50, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 193.5);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_arrested_city_town2', 50, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 205);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_arrested_city_town3', 50, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 216.5);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_arrested_city_town4', 50, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 228);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_arrested_city_town5', 50, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 239.5);

	//outcome or disposition 

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_outcome_disposition1', 55, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 193.5);

$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_outcome_disposition2', 55, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 205);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_outcome_disposition3', 55, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 216.5);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_outcome_disposition4', 55, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 228);


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part12_29_table_outcome_disposition5', 55, 12, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 147, 239.5);

// end page 14 

$pdf->AddPage('P', 'LETTER'); // page number 15

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 12.  Additional Information About You </b> (Person Applying for Naturalization) (Continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');


//............

$html= '<div>Answer <b>Item Numbers 30. - 46.</b> If you answer "Yes" to any of these questions, except <b>Item Numbers 37.</b> and <b>38</b>, include a typed or
printed explanation on additional sheets of paper and provide any evidence to support your answers.</div>';
$pdf->writeHTMLCell(190, 7, 12, 30, $html, 0, 1, false, 'L');

$html= '<div><b>30.   </b>    Have you <b>EVER : </b></div>';
$pdf->writeHTMLCell(70, 7, 12, 41,  $html, 0, 1, false, 'L');

$html= '<div><b>A.   </b>   Been a habitual drunkard? </div>';
$pdf->writeHTMLCell(170, 7, 20, 47,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30a" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30a" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 47, $html, 0, 1, false, true, 'J');


$html= '<div><b>B.   </b>    Been a prostitute, or procured anyone for prostitution? </div>';
$pdf->writeHTMLCell(170, 7, 20, 53,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30b" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30b" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 53, $html, 0, 1, false, true, 'J');


$html= '<div><b>C.   </b>    Sold or smuggled controlled
substances, illegal drugs, or narcotics? </div>';
$pdf->writeHTMLCell(170, 7, 20, 60,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30c" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30c" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 60, $html, 0, 1, false, true, 'J');


$html= '<div><b>D.   </b>     Been married to more than one person at the same time?</div>';
$pdf->writeHTMLCell(170, 7, 20, 66,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30d" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30d" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170,66, $html, 0, 1, false, true, 'J');



$html= '<div><b>E.   </b>    Married someone in order to obtain an immigration benefit?</div>';
$pdf->writeHTMLCell(170, 7, 20, 72,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30e" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30e" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170,  72, $html, 0, 1, false, true, 'J');


$html= '<div><b>F.   </b>    Helped anyone to enter, or try to enter, the United States illegally?</div>';
$pdf->writeHTMLCell(170, 7, 20, 79,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30f" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30f" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170,  79, $html, 0, 1, false, true, 'J');



$html= '<div><b>G.   </b>     Gambled illegally or received income from illegal gambling?</div>';
$pdf->writeHTMLCell(170, 7, 20, 86,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30g" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30g" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170,  86, $html, 0, 1, false, true, 'J');


$html= '<div><b>H.   </b>     Failed to support your dependents or to pay alimony?</div>';
$pdf->writeHTMLCell(170, 7, 20, 93,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30h" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30h" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170,  93, $html, 0, 1, false, true, 'J');




$html= '<div><b>I.   </b>      Made any misrepresentation to obtain any public benefit in the United States?</div>';
$pdf->writeHTMLCell(170, 7, 20, 100,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_30i" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_30i" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170,  100, $html, 0, 1, false, true, 'J');

//.........................


$html= '<div><b>31.   </b>    Have you <b>EVER </b>given any U.S. Government officials any information or documentation that<br>  &nbsp;  &nbsp; &nbsp;   was false, 
fraudulent, or misleading?</div>';
$pdf->writeHTMLCell(170, 7, 12, 107,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_31" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_31" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 107, $html, 0, 1, false, true, 'J');



$html= '<div><b>32.   </b>    Have you <b>EVER </b> lied to any U.S. Government officials to gain entry or admission into the<br>  &nbsp;  &nbsp; &nbsp;    United States or to gain immigration benefits while in the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 118,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_32" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_32" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 118, $html, 0, 1, false, true, 'J');


$html= '<div><b>33.   </b>    Have you <b>EVER </b> been removed, excluded, or deported from the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 128,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_33" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_33" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 128, $html, 0, 1, false, true, 'J');



$html= '<div><b>34.   </b>    Have you <b>EVER </b> been ordered removed, excluded, or deported from the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 135,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_34" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_34" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 135, $html, 0, 1, false, true, 'J');



$html= '<div><b>35.   </b>    Have you <b>EVER </b>  been placed in removal, exclusion, rescission, or deportation proceedings?</div>';
$pdf->writeHTMLCell(170, 7, 12, 142,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_35" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_35" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 142, $html, 0, 1, false, true, 'J');



$html= '<div><b>36.   </b>     Are removal, exclusion, rescission, or deportation proceedings (including administratively<br>   &nbsp;   &nbsp;   &nbsp;   closed proceedings) <b>currently</b> pending against you?  </div>';
$pdf->writeHTMLCell(170, 7, 12, 149,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_36" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_36" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 149, $html, 0, 1, false, true, 'J');




$html= '<div><b>37.   </b>     Have you <b>EVER </b> served in the U.S. armed forces?</div>';
$pdf->writeHTMLCell(170, 7, 12, 160,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_37" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_37" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 160, $html, 0, 1, false, true, 'J');


$html= '<div><b>38. &nbsp;  A.   </b>     Are you </b>currently</b> a member of the U.S. armed forces?</div>';
$pdf->writeHTMLCell(170, 7, 12, 167,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_38a" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_38a" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 167, $html, 0, 1, false, true, 'J');



$html= '<div><b>B.   </b>   If you answered "Yes," are you scheduled to deploy overseas, including to a vessel, within the<br>  &nbsp;   &nbsp;   next three months? (Refer to the <b>Address Change</b> section in the Instructions on how to notify <br>   &nbsp;   &nbsp;  USCIS if  you learn of your deployment plans after you file your Form N-400.) </div>';
$pdf->writeHTMLCell(170, 7, 20, 174,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_38b" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_38b" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 174, $html, 0, 1, false, true, 'J');


$html= '<div><b>C.   </b>    If you answered "Yes," are you <b>currently</b> stationed overseas?</div>';
$pdf->writeHTMLCell(170, 7, 20, 190,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_38c" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_38c" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 190, $html, 0, 1, false, true, 'J');

//.............


$html= '<div><b>39.   </b>     Have you <b>EVER </b> been court-martialed, administratively separated, or disciplined, or have you<br>  &nbsp;  &nbsp;   &nbsp;  received an other than honorable discharge, while in the U.S. armed forces?</div>';
$pdf->writeHTMLCell(170, 7, 12, 198,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_39" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_39" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 198, $html, 0, 1, false, true, 'J');



$html= '<div><b>40.   </b>     Have you <b>EVER </b>  been discharged from  training or service in the U.S. armed forces because <br>  &nbsp;   &nbsp;   &nbsp;   you were an alien? </div>';
$pdf->writeHTMLCell(170, 7, 12, 208,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_40" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_40" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 208, $html, 0, 1, false, true, 'J');



$html= '<div><b>41.   </b>     Have you <b>EVER </b>left the United States to avoid being drafted in the U.S. armed forces?  </div>';
$pdf->writeHTMLCell(170, 7, 12, 219,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_41" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_41" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 219, $html, 0, 1, false, true, 'J');



$html= '<div><b>42.   </b>     Have you <b>EVER </b> applied for any kind of exemption from military service in the U.S. armed forces?</div>';
$pdf->writeHTMLCell(170, 7, 12, 227,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_42" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_42" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 227, $html, 0, 1, false, true, 'J');







$html= '<div><b>43.   </b>     Have you <b>EVER </b> deserted from the U.S. armed forces?</div>';
$pdf->writeHTMLCell(170, 7, 12, 235,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_43" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_43" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 235, $html, 0, 1, false, true, 'J');

// end page 15 

$pdf->AddPage('P', 'LETTER'); // page number 16

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 12.      Additional Information About You </b> (Person Applying for Naturalization) (Continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div><b>44.   &nbsp;    A.   </b>     Are you a male who lived in the United States at any time between your 18th and 26th birthdays? <br> &nbsp;  &nbsp; &nbsp; (This does not include living in the United States as a lawful nonimmigrant.) </div>';
$pdf->writeHTMLCell(170, 7, 12, 30,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_44a" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_44a" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 30, $html, 0, 1, false, true, 'J');

$html= '<div><b>B.   </b>    If you answered "Yes," when did you register for the Selective Service? Provide the information below. </div>';
$pdf->writeHTMLCell(170, 7, 18, 42,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>Date Registered <br>
(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 7, 25, 47,  $html, 0, 1, false, 'L');


$html= '<div>Selective Service<br>
Number </div>';
$pdf->writeHTMLCell(70, 7, 75, 47,  $html, 0, 1, false, 'L');



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_date_registered', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 25, 57);



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('additional_information_selective_service_number', 55, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 57);

$pdf->setFont('Times', '', 10);
$html= '<div><b>C.   </b>      If you answered "Yes," but you <b>did not register</b> with the Selective Service System and you are:</div>';
$pdf->writeHTMLCell(170, 7, 18, 65,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>1.   </b>      Still under 26 years of age, you must register before you apply for naturalization, and complete the Selective Service <br>&nbsp; &nbsp; &nbsp; information above; <b>OR</b> </div>';
$pdf->writeHTMLCell(180, 7, 25, 71,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>2.   </b>    Now 26 to 31 years of age (29 years of age if you are filing under INA section 319(a)), but you did not register with the <br>&nbsp; &nbsp; &nbsp;  Selective Service, you must attach a statement explaining why you did not register, and provide a status information <br>&nbsp; &nbsp; &nbsp; letter from the Selective Service. </div>';
$pdf->writeHTMLCell(180, 7, 25, 81,  $html, 0, 1, false, 'L');



$pdf->setFont('Times', '', 10);
$html= '<div>Answer <b>Item Numbers 45. - 50.</b> If you answer "No" to any of these questions, include a typed or printed explanation on additional sheets of paper and provide any evidence to support your answers.</div>';
$pdf->writeHTMLCell(190, 7, 12, 95,  $html, 0, 1, false, 'L');

//..................

$pdf->setFont('Times', '', 10);
$html= '<div><b>45.   </b>    Do you support the Constitution and form of Government of the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 106,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_45" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_45" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 106, $html, 0, 1, false, true, 'J');


$pdf->setFont('Times', '', 10);
$html= '<div><b>46.   </b>    Do you understand the full Oath of Allegiance to the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 113,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_46" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_46" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 113, $html, 0, 1, false, true, 'J');


$pdf->setFont('Times', '', 10);
$html= '<div><b>47.   </b>    Do you understand the full Oath of Allegiance to the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 119,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_47" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_47" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 119, $html, 0, 1, false, true, 'J');


$pdf->setFont('Times', '', 10);
$html= '<div><b>48.   </b>   If the law requires it, are you willing to bear arms on behalf of the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 126,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_48" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_48" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 126, $html, 0, 1, false, true, 'J');



$pdf->setFont('Times', '', 10);
$html= '<div><b>49.   </b>   If the law requires it, are you willing to bear arms on behalf of the United States?</div>';
$pdf->writeHTMLCell(170, 7, 12, 133,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_49" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_49" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 133, $html, 0, 1, false, true, 'J');


$pdf->setFont('Times', '', 10);
$html= '<div><b>50.   </b>  If the law requires it, are you willing to perform work of national importance under civilian direction?</div>';
$pdf->writeHTMLCell(170, 7, 12, 140,  $html, 0, 1, false, 'L');
$html ='
&nbsp;  &nbsp;    <input type="checkbox" name="part12_50" value="Y" checked="" /> Yes

&nbsp;   &nbsp;   <input type="checkbox" name="part12_50" value="N" checked="" /> No
 ';
$pdf->writeHTMLCell(50, 7, 170, 140, $html, 0, 1, false, true, 'J');



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 13. Applicant\'s Statement, Certification, and Signature</div>';
$pdf->writeHTMLCell(190, 7, 13, 150, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE: </b>  Read the <b>Penalties</b> section of the Form N-400 Instructions before completing this part.</div>';
$pdf->writeHTMLCell(170, 7, 12, 162,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);
$html= '<div>Applicant\'s Statement</div>';
$pdf->writeHTMLCell(190, 7, 13, 170,  $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE: </b>Select the box for either <b>Item A.</b> or <b>B.</b> in <b>Item Number 1.</b> If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(170, 7, 12, 178,  $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.   </b> Applicant\'s Statement Regarding the Interpreter </div>';
$pdf->writeHTMLCell(170, 7, 12, 184,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>A.   </b><input type="checkbox" name="13_1a_statement" value="1" />  I can read and understand English, and I have read and understand every question and instruction on this application <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; and my answer to every question. </div>';
$pdf->writeHTMLCell(190, 7, 18, 190,  $html, 0, 1, false, 'L');



$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(1.5);
$html= '<div><b>B.   </b><input type="checkbox" name="13_1b_statement" value="1" />  The interpreter named in Part 14. read to me every question and instruction on this application and my answer to every <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; question in </div>';
$pdf->writeHTMLCell(190, 7, 18, 200,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(65, 6, 47, 207,  '', 1, 1, false, 'L');

$html= '<div>,a language in which I am fluent, and I understood everything.</div>';
$pdf->writeHTMLCell(90, 7, 112, 206,  $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>2.   </b> Applicant\'s Statement Regarding the Preparer<br>
&nbsp; &nbsp; &nbsp;<input type="checkbox" name="13_2_statement" value="1" />At my request, the preparer named in <b>Part 15.</b>, </div>';
$pdf->writeHTMLCell(170, 7, 12, 215,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 90, 220,  '', 1, 1, false, 'L');
$pdf->writeHTMLCell(30, 7, 190, 220,  ',', 0, 1, false, 'L');

$html= '<div>prepared this application for me based only upon information I provided or authorized.</div>';
$pdf->writeHTMLCell(190, 7, 18, 226,  $html, 0, 1, false, 'L');


//.............page 16 end .........  

$pdf->AddPage('P', 'LETTER'); // page number 17

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 13. Applicant\'s Statement, Certification, and Signature</b> (continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);
$html= '<div>Applicant\'s Certification </div>';
$pdf->writeHTMLCell(191, 7, 13, 27, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of
my records that USCIS may need to determine my eligibility for the immigration benefit that I seek.
 <br>
 <br>
 I further authorize release of information contained in this application, in supporting documents, and in my USCIS records to other entities and persons where necessary for the administration and enforcement of U.S. immigration laws.
 
  <br>
 <br>
 I understand that USCIS will require me to appear for an appointment to take my biometrics (fingerprints, photograph, and/or
 signature) and, at that time, I will be required to sign an oath reaffirming that:

</div>';
$pdf->writeHTMLCell(190, 7, 12, 37, $html, 0, 1, false, 'L');




$pdf->setFont('Times', '', 10);
$html= '<div><b>1)   </b>    I reviewed and provided or authorized all of the information in my application; </div>';
$pdf->writeHTMLCell(170, 7, 20, 78, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>2)   </b>     I understood all of the information  contained in, and submitted with, my application; and </div>';
$pdf->writeHTMLCell(170, 7, 20, 85, $html, 0, 1, false, 'L');



$pdf->setFont('Times', '', 10);
$html= '<div><b>3)   </b>     All of this information was complete, true, and correct at the time of filing.</div>';
$pdf->writeHTMLCell(170, 7, 20, 92, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>certify, under penalty of perjury, that I provided or authorized all of the information in my application, I understand all of the
information contained in, and submitted with, my application, and that all of this information is complete, true, and correct.</div>';
$pdf->writeHTMLCell(190, 7, 12, 98, $html, 0, 1, false, 'L');

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Applicant\'s Signature</div>';
$pdf->writeHTMLCell(191, 7, 13, 110, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>3.    </b>   Applicant\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 117, $html, 0, 1, false, 'L');
//.......
$pdf->writeHTMLCell(120, 7, 22, 123, '', 1, 0, false, 'L');
//.........
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 121, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//........


$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 118, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_13_applicant_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 123);



$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE TO ALL APPLICANTS: </b>  If you do not completely fill out this application or fail to submit required documents listed in the
Instructions, USCIS may deny your application.</div>';
$pdf->writeHTMLCell(190, 7, 12, 133, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'B', 12);
$html= '<div>Part 14. Interpreter\'s Contact Information, Certification, and Signature</div>';
$pdf->writeHTMLCell(190, 7, 12, 145, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(190, 7, 12, 153, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div><b>1.    </b>      Interpreter\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(90, 7, 12, 160, $html, 0, 1, false, 'L');



$pdf->setFont('Times', '', 10);
$html= '<div>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(190, 7, 112, 160, $html, 0, 1, false, 'L');


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_14_interpreter_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 165);



$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_14_interpreter_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 112, 165);


$pdf->setFont('Times', '', 10);
$html= '<div><b>2.    </b>      Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 173, $html, 0, 1, false, 'L');


$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_business_org_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 178);

$pdf->setFont('Times', 'BI', 12);
$html= '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 192, $html, 0, 1, true, 'L');

//.......................

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 205, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 205, $html, 0, 1, false, 'L');


//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_street_name_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 210);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt14" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 210, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste14" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 210, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr14" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 210, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 210, '', 1, 1, false, 'L');


//.................


$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 218, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 218, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 218, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 224, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_city_town', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 224);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 224, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 224);

$pdf->TextField('interpreter_mailing_address_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 224);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 234, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_provience', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 240);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 234, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_postal_code', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 240);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 128, 234, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_mailing_address_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 240);

//........... end page 17   


$pdf->AddPage('P', 'LETTER'); // page number 18


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 14. Interpreter\'s Contact Information, Certification, and Signature</b> (continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');



$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 33, $html, 0, 1, true, 'L');

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.  </b> Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 42, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 48);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.  </b> Interpreter\'s Work Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 42, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_work_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 48);

//.................. 

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>6.  </b> Interpreter\'s Evening Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 55, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('interpreter_contact_evening_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 60);


//............
$pdf->setFont('Times', '', 12);
$html= '<div><b>Interpreter\'s Certificationion</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 70, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(90, 7, 12, 77, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>I am fluent in English and </div>';
$pdf->writeHTMLCell(190, 7, 12, 84, $html, 0, 1, false, 'L');
$pdf->TextField('interpreter_certificationion', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 83);
$pdf->setFont('Times', '', 10);
$html= '<div>, which is the same language specified in <b>Part 13., Item B.</b> in</div>';
$pdf->writeHTMLCell(90, 7, 112, 84, $html, 0, 1, false, 'L');

$html= '<div><b>Item Number 1.</b>, and I have read to this applicant in the identified language every question and instructiaction on this application and his
or her answer to every question. The applicant informed me that he or she understands every instruction, question and answer on the
application, including the <b>Applicant\'s Certification</b> and has verified the accuracy of every answer.</div>';
$pdf->writeHTMLCell(192, 7, 12, 90, $html, 0, 1, false, 'L');

//............

$pdf->setFont('Times', 'BI', 12);
$html= '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 107, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>7.    &nbsp;   &nbsp; </b>     Interpreter\'s Signature </div>';
$pdf->writeHTMLCell(80, 7, 12, 114, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 22, 120, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 118, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............


$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 116, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('interpreter_date_of_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 121);

//.............

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 15. Contact Information, Declaration, and Signature of the Person Preparing This Application, if Other Than the Applicant </div>';
$pdf->writeHTMLCell(190, 7, 13, 132, $html, 1, 0, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(100, 7, 12, 148, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Full Name</div>';
$pdf->writeHTMLCell(190, 7, 12, 155, $html, 0, 1, true, 'L');

$pdf->setFont('Times', '', 10);
$html = '<div><b>1</b> &nbsp;  &nbsp; Preparer\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(95, 7, 12, 162, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_last_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 168);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2.     </b>      Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 112, 162, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_first_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 168);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>3. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 176, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_business_org_name', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 182);

//.................

$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(190, 7, 12, 193, $html, 0, 1, true, 'L');

//..............

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 205, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 205, $html, 0, 1, false, 'L');


//...........


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_street_name_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 210);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt15" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 210, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste15" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 210, $html, 0, 1, false, 'L');


$html= '<div>  <input type="checkbox" name="flr15" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 210, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(15, 7, 188, 210, '', 1, 1, false, 'L');


//.................


$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 218, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 140, 218, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code   +   4</div>';
$pdf->writeHTMLCell(60, 7, 166, 218, $html, 0, 1, false, 'L');

$html= '<div><b> - </b></div>';
$pdf->writeHTMLCell(60, 7, 188, 224, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_city_town', 115, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 224);


$pdf->setFont('Times', '', 10.5);
$html = '<select name="state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 0, 140, 224, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_zipcode1', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 224);

$pdf->TextField('preparer_mailing_address_zipcode2', 10, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 193, 224);

//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 234, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_provience', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 240);
//.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 234, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_postal_code', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 240);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 128, 234, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_mailing_address_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128, 240);
//........... page 18 end 



$pdf->AddPage('P', 'LETTER'); // page number 19

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 15. Contact Information, Declaration, and Signature of the Person
Preparing This Application, if Other Than the Applicant</b> (continued) </div>';
$pdf->writeHTMLCell(140, 7, 13, 18, $html, 1, 1, true, 'L');

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');

//..........

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(190, 7, 13, 33, $html, 0, 1, true, 'L');

//...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>4.  </b> Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 42, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 48);

//............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>5.  </b> Preparer\'s Work Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 42, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_work_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 48);

//.................. 

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>6.  </b> Preparer\'s Evening Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 55, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('preparer_contact_evening_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 61);


$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Statement </div>';
$pdf->writeHTMLCell(190, 7, 13, 70, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);// set font
$html= '<div><b>7.    &nbsp;   A.     </b>     <input type="checkbox" name="preparer_statement_7a" value="1" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 80, $html, 0, 1, false, 'L');
$html= '<div> I am not an attorney or accredited representative but have prepared this application on behalf of <br>
the applicant and with the applicant\'s consent.</div>';
$pdf->writeHTMLCell(180, 7, 28, 80, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);// set font
$html= '<div><b>B.     </b>     <input type="checkbox" name="preparer_statement_7b" value="1" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 90, $html, 0, 1, false, 'L');

$html= '<div> I am an attorney or accredited representative and my representation of the applicant in this case<br><input type="checkbox" name="preparer_statement_7b1" value="1" />  extends   &nbsp; <input type="checkbox" name="preparer_statement_7b2" value="1" /> &nbsp;  does not extend beyond the preparation of this application. </div>';
$pdf->writeHTMLCell(190, 7, 28, 90, $html, 0, 1, false, 'L');


$html= '<div><b>NOTE:</b> If you are an attorney or accredited representative whose representation extends beyond
preparation of this application, you may be obliged to submit a completed Form G-28, Notice of
intry of Appearance as Attorney or Accredited Representative, with this application.</div>';
$pdf->writeHTMLCell(150, 7, 28, 100, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(190, 7, 13, 115, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);// set font
$html= '<div>By my signature, I certify, under penalty of perjury, that I prepared this application at the request of the applicant. The applicant then
reviewed this completed application and informed me that he or she understands all of the information contained in, and submitted
with, his or her application, including the <b>Applicant\'s Certification</b>, and that all of this information is complete, true, and correct. I
completed this application based only on information that the applicant provided to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell(190, 7, 12, 122, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(190, 7, 13, 147, $html, 0, 1, true, 'L');



$pdf->setFont('Times', '', 10.5);
$html= '<div><b>8.    &nbsp;   &nbsp; </b>     Preparer\'s Signature </div>';
$pdf->writeHTMLCell(80, 7, 12, 154, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(100, 7, 22, 160, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 159, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............


$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 154, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('preparer_date_of_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 160);



$pdf->setFont('Times', 'B', 12);
$html= '<div>NOTE: Do not complete Parts 16., 17., or 18. until the USCIS Officer instructs you to do so at the
interview.</div>';
$pdf->writeHTMLCell(190, 7, 13, 170, $html, 1, 0, 0, false, 'C', true);


$pdf->setFont('Times', 'B', 12);// set font
$html= '<div>Part 16. Signature at Interview</div>';
$pdf->writeHTMLCell(190, 7, 13, 187, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>I swear (affirm) and certify under penalty of perjury under the laws of the United States of America that I know that the contents of
his Form N-400, Application for Naturalization, subscribed by me, including corrections number 1 through___________ , are 
complete, true, and correct. The evidence submitted by me on numbered pages I through____________ are complete, true, and
correct. <br><br>Subscribed to and sworn to (affirmed) before me </div>';
$pdf->writeHTMLCell(192, 7, 12, 195, $html, 0, 1, false, 'L');

$pdf->writeHTMLCell(110, 7, 12, 224, '',  1, 1, false, 'L');
$html= '<div>USCIS Officer\'s Printed Name or Stamp</div>';
$pdf->writeHTMLCell(70, 7, 40, 231, $html, 0, 1, false, 'L');

$pdf->writeHTMLCell(70, 7, 133, 224, '', 1, 1, false, 'L');
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 7, 133, 231, $html, 0, 1, false, 'L');


$html= '<div> Applicant\'s Signature</div>';
$pdf->writeHTMLCell(70, 7, 12, 239, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 12, 245, '', 1, 1, false, 'L');

$html= '<div>USCIS Officer\'s Signature</div>';
$pdf->writeHTMLCell(70, 7, 112, 239, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 112, 245, '', 1, 1, false, 'L');
// ...... end page 19

$pdf->AddPage('P', 'LETTER'); // page number 20
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 17. Renunciation of Foreign Titles</b></div>';
$pdf->writeHTMLCell(138, 7, 13, 18, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10.5);
$html= '<div><b>A-</b></div>';
$pdf->writeHTMLCell(20, 7, 153, 19, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(45, 7, 159, 18, '', 1, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>If you answered "Yes" to <b>Part 12., Items A.</b> and <b>B.</b> in <b>Item Number 4.</b>, then you must affirm the following before a USCIS officer:</div>';
$pdf->writeHTMLCell(190, 7, 12, 26, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 11);
$html= '<div><b>I further renounce the title of   ________________________________________     which I have heretofore held; or</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 32, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 11);
$html= '<div>(list titles)</div>';
$pdf->writeHTMLCell(190, 7, 95, 37, $html, 0, 1, false, 'L');

//.................


$pdf->setFont('Times', '', 11);
$html= '<div><b>I further renounce the order of nobility of _____________________________to which I have heretofore belonged.</b></div>';
$pdf->writeHTMLCell(192, 7, 12, 45, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$html= '<div>(list order of nobility)</div>';
$pdf->writeHTMLCell(190, 7, 100, 50, $html, 0, 1, false, 'L');


//...............

$html= '<div>Applicant\'s Printed Name </div>';
$pdf->writeHTMLCell(70, 7, 12, 57, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 12, 63, '', 1, 1, false, 'L');

$html= '<div>Applicant\'s Signature</div>';
$pdf->writeHTMLCell(70, 7, 112, 57, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 112, 63, '', 1, 1, false, 'L');




$html= '<div>USCIS Officer\'s Printed Name </div>';
$pdf->writeHTMLCell(70, 7, 12, 72, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 12, 77, '', 1, 1, false, 'L');

$html= '<div>USCIS Officer\'s Signature</div>';
$pdf->writeHTMLCell(70, 7, 112, 72, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(90, 7, 112, 77, '', 1, 1, false, 'L');

$html= '<div>Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 7, 12, 86, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 12, 92, '', 1, 1, false, 'L');

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 1, 0, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Part 18. Oath of Allegiance</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 105, $html, 1, 1, true, 'L');


$pdf->setFont('Times', '', 10);
$html= '<div>If your application is approved, you will be scheduled for a public oath ceremony at which time you will be required to take the
following Oath of Allegiance immediately prior to becoming a naturalized citizen. By signing below you acknowledge your
willingness and ability to take this oath:<br><br>I hereby declare on oath, that I absolutely and entirely renounce and abjure all allegiance and fidelity to any foreign prince, potentate,
state, or sovereignty, of whom or which I have heretofore been a subject or citizen;
</div>';
$pdf->writeHTMLCell(190, 7, 12, 112, $html, 0, 1, false, 'L');

$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(2);
$html= '<div>that I will support and defend the Constitution and laws of the United States of America against all enemies, foreign, and domestic; <br>that I will bear true faith and allegiance to the same;<br>that I will bear arms on behalf of the United States when required by the law; <br>that I will perform nonecombatant service in the armed forces of the United States when required by the law; <br>that I will perform work of national importance under civilian direction when required by the law; and <br>that I take this obligation freely, without any mental reservation or purpose of evasion; so help me God. <br><br><b>Applicant\'s Printed Name</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 137, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);
$pdf->setCellHeightRatio(1.2);
$html= '<div>Family Name (Last Name)</div>';
$pdf->writeHTMLCell(65, 7, 12, 194, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(65, 7, 12, 200, '', 1, 1, false, 'L');


$html= '<div>Given Name (First Name)</div>';
$pdf->writeHTMLCell(55, 7, 80, 194, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(55, 7, 80, 200, '', 1, 1, false, 'L');



$html= '<div>Middle Name (if applicable)</div>';
$pdf->writeHTMLCell(60, 7, 140, 194, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(62, 7, 140, 200, '', 1, 1, false, 'L');



$html= '<div><b>Applicant\'s Signature</b></div>';
$pdf->writeHTMLCell(60, 7, 12, 216, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 12, 222, '', 1, 1, false, 'L');



$html= '<div><b>Date of Signature (mm/dd/yyyy)</b></div>';
$pdf->writeHTMLCell(60, 7, 140, 216, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(62, 7, 140, 222, '', 1, 1, false, 'L');




/* $date_of_birth = date("m/d/Y",strtotime(showData('dob')));
$date_law_full_resident = date("m/d/Y",strtotime(showData('residence_date')));
$part5_information_to_contact_you_date_from =  date("m/d/Y",strtotime(showData('address_dates')[0]));
$part5_c_information_to_contact_you_date_from = date("m/d/Y",strtotime(showData('address_dates')[1])); */




$js = "
var fields = {
	'a_number':' ',
	'naturalization_interview':' ',
	'other_explain':' ',
	'legal_last_name':' ".showData('last_name')."',
	'legal_first_name':' ".showData('first_name')."',
	'legal_middle_name':' ".showData('middle_name')."',
	'exact_last_name':' ".showData('last_name')."',
	'exact_first_name':' ".showData('first_name')."',
	'exact_middle_name':' ".showData('middle_name')."',
	'us_social_security_number':' ".showData('social_security_number')."',
	'uscis_online_account_number':' ".showData('uscis_online_account_number')."',
	'since_birth_last_name1':' ',
	'since_birth_first_name1':' ',
	'since_birth_middle_name1':' ',
	'since_birth_last_name2':' ',
	'since_birth_first_name2':' ',
	'since_birth_middle_name2':' ',
	'testname':' ',


	'date_of_birth':'',
	'date_law_full_resident':'',
	'information_about_you_country_of_birth':' ".showData('country_of_birth')."',
	'information_about_you_cityzenship':' ".showData('nationality')."',
	'part3_accomodation_1a':' ',
	'part3_accomodation_1b':' ',
	'part3_accomodation_1c':' ',
	'part4_information_to_contact_you_daytime_telephone':' ".showData('telephone')."',
	'part4_information_to_contact_you_work_telephone':' ".showData('business_phone')."',
	'part4_information_to_contact_you_evening_telephone':' ',
	'part4_information_to_contact_you_mobile_telephone':' ',
	'part4_information_to_contact_you_email':' ".showData('email')."',

	'part5_information_to_contact_you_street_number':' ".showData('address_street')[0]."',
	'state':' ',
	'part5_information_to_contact_you_city_town':' ".showData('address_city')[0]."',
	'current_physical_address_state':' ".showData('address_state')[0]."',
	'part5_information_to_contact_you_country':' ',
	'part5_information_to_contact_you_zipcode':' ".showData('address_zip')[0]."',
	'mailing_address_state':' ',
	'part5_information_to_contact_you_zipcode1':' ',
	'part5_information_to_contact_you_foreign_region':' ',
	'part5_information_to_contact_you_foreign_postalcode':' ',
	'part5_information_to_contact_you_foreign_country':' ',
	'part5_information_to_contact_you_in_care_of':' ',
	'part5_information_to_contact_you_date_from':' ',
	'part5_information_to_contact_you_date_to':' ',

	'part5_b_information_to_contact_you_street_number':' ',
	'part5_b_information_to_contact_you_city_town':' ',
	'part5_b_information_to_contact_you_country':' ',
	'part5_b_information_to_contact_you_zipcode':' ',
	'part5_b_information_to_contact_you_zipcode1':' ',
	
	'part5_b_information_to_contact_you_foreign_region':' ',
	'part5_b_information_to_contact_you_foreign_postalcode':' ',
	'part5_b_information_to_contact_you_foreign_country':' ',

	'part5_c_information_to_contact_you_street_number':' ".showData('address_street')[1]."',
	'part5_c_information_to_contact_you_city_town':' ".showData('address_city')[1]."',
	'part5_c_information_to_contact_you_country':' ',
	'part5_c_information_to_contact_you_state':' ".showData('address_state')[1]."',


	'part5_c_information_to_contact_you_zipcode':' ".showData('address_zip')[1]."',
	'part5_c_information_to_contact_you_zipcode1':' ',
	'part5_c_information_to_contact_you_foreign_region':' ',
	'part5_c_information_to_contact_you_foreign_postalcode':' ',
	'part5_c_information_to_contact_you_foreign_country':' ',
	'part5_c_information_to_contact_you_date_from':' ',
	'part5_c_information_to_contact_you_date_to':' ',
	'date_of_birth':' ',
	'date_law_full_resident':' ',

	'part5_d_information_to_contact_you_street_number':' ', 
	'part5_d_information_to_contact_you_state':' ',
	'part5_d_information_to_contact_you_city_town':' ',
	'part5_d_information_to_contact_you_country':' ',
	'part5_d_information_to_contact_you_zipcode':' ',
	'part5_d_information_to_contact_you_zipcode1':' ',
	'part5_d_information_to_contact_you_foreign_region':' ',
	'part5_d_information_to_contact_you_foreign_postalcode':' ',
	'part5_d_information_to_contact_you_foreign_country':' ',
	'part5_d_information_to_contact_you_date_from':' ',
	'part5_d_information_to_contact_you_date_to':' ',
	
	'part5_e_information_to_contact_you_street_number':' ',
	'part5_e_information_to_contact_you_state':' ',
	'part5_e_information_to_contact_you_city_town':' ',
	'part5_e_information_to_contact_you_country':' ',
	'part5_e_information_to_contact_you_zipcode':' ',
	'part5_e_information_to_contact_you_zipcode1':' ',
	'part5_e_information_to_contact_you_foreign_region':' ',
	'part5_e_information_to_contact_you_foreign_postalcode':' ',
	'part5_e_information_to_contact_you_foreign_country':' ',
	'part5_e_information_to_contact_you_date_from':' ',
	'part5_e_information_to_contact_you_date_to':' ',

	'part_7_feet':' ',
	'part_7_inches':' ',
	'pound1':' ',
	'pound2':' ',
	'pound3':' ',
	'part8_information_employeer_school':'  ',
	'part8_information_employeer_street_number':' ',
	'part8_information_employment_city_town':' ',
	'part8_information_employment_zipcode1':' ',
	'part8_information_employment_zipcode2':' ',
	'part8_information_employment_state':' ',
	'part8_information_employment_foreign_region':' ',
	'part8_information_employment_foreign_postalcode':' ',
	'part8_information_employment_foreign_country':' ',
	'part8_information_employment_date_from':' ',
	'part8_information_employment_date_to':' ',
	'part8_information_employment_occupation':' ',

	'part8_information_employeer_school2':' ',
	'part8_information_employment_city_town2':' ',
	'part8_2_information_employment_zipcode1':' ',
	'part8_2_information_employment_zipcode2':' ',
	'part8_2_information_employment_state':' ',

	'part8_information_employment_foreign_region2':' ',
	'part8_information_employment_foreign_postalcode2':' ',
	'part8_information_employment_foreign_country2':' ',
	'part8_information_employment_date_from2':' ',
	'part8_information_employment_date_to2':' ',
	'part8_information_employment_occupation2':' ',
	'part8_information_employeer_street_number2':' ',

	'part8_information_employeer_school3':' ',
	'part8_information_employeer_street_number3':' ',
	'part8_information_employment_city_town3':' ',
	'part8_3_information_employment_zipcode1':' ',
	'part8_3_information_employment_zipcode2':' ',
	'part8_information_employment_foreign_region3':' ',
	'part8_information_employment_foreign_postalcode3':' ',
	'part8_information_employment_foreign_country3':' ',
	'part8_information_employment_date_from3':' ',
	'part8_information_employment_date_to3':' ',
	'part8_information_employment_occupation3':' ',

	'part9_1_days':' ',
	'part9_1_trip':' ',
	'part9_date_left_united_states1':' ',
	'part9_date_left_united_states2':' ',
	'part9_date_left_united_states3':' ',
	'part9_date_left_united_states4':' ',
	'part9_date_left_united_states5':' ',
	'part9_date_left_united_states6':' ',

	'part9_date_returned_united_states1':' ',
	'part9_date_returned_united_states2':' ',
	'part9_date_returned_united_states3':' ',
	'part9_date_returned_united_states4':' ',
	'part9_date_returned_united_states5':' ',
	'part9_date_returned_united_states6':' ',

	'part9_did_trip_last_month1':' ',
	'part9_did_trip_last_month2':' ',
	'part9_did_trip_last_month3':' ',
	'part9_did_trip_last_month4':' ',
	'part9_did_trip_last_month5':' ',
	'part9_did_trip_last_month6':' ',

	'part9_countries_which_travel1':' ',
	'part9_countries_which_travel2':' ',
	'part9_countries_which_travel3':' ',
	'part9_countries_which_travel4':' ',
	'part9_countries_which_travel5':' ',
	'part9_countries_which_travel6':' ',

	'part9_days_outside_united_states1':' ',
	'part9_days_outside_united_states2':' ',
	'part9_days_outside_united_states3':' ',
	'part9_days_outside_united_states4':' ',
	'part9_days_outside_united_states5':' ',
	'part9_days_outside_united_states6':' ',
	

	'part10_times_married':' ',
	'part10_4_a_last_name':' ',
	'part10_4_a_first_name':' ',
	'part10_4_a_middle_name':' ',

	'part10_4_b_last_name':' ',
	'part10_4_b_first_name':' ',
	'part10_4_b_middle_name':' ',

	'part10_4_c_last_name':' ',
	'part10_4_c_first_name':' ',
	'part10_4_c_middle_name':' ',
	'part10_4_d_spouse_date_of_birth':' ',
	'part10_4_e_spouse_date_entred':' ',
	'part10_f_current_spouse_street_number':' ',
	'part10_f_information_spouse_city_town':' ',
	'part10_f_information_spouse_country':' ',
	'part10_f_information_spouse_zipcode1':' ',
	'part10_f_information_spouse_zipcode2':' ',
	'part10_f_information_spouse_foreign_region':' ',
	'part10_f_information_spouse_foreign_postalcode':' ',
	'part10_f_information_spouse_foreign_country':' ',
	'part10_g_information_spouse_current_company':' ',
	'part10_6b_date_spouse_citizen':' ',
	'part10_7a_current_spouse_citizen':' ',
	'current_spouse_state':' ',

	'part10_7b_current_spouse_a_number':' ',
	'part10_7c_explain':' ',
	'part10_8a_last_name':' ',
	'part10_8a_first_name':' ',
	'part10_8a_middle_name':' ',
	'part10_8b_explain':' ',
	'part10_8c_spouse_date_of_birth':' ',
	'part10_8d_spouse_prior_spouse':' ',
	'part10_8e_spouse_prior_spouse_country':' ',
	'part10_8_d_current_spouse_prior_date_marriage':' ',
	'part10_8_e_current_spouse_ended':' ',
	'part10_8_h_explain':' ',
	'part10_9a_last_name':' ',
	'part10_9a_first_name':' ',
	'part10_9a_middle_name':' ',
	'part10_9_b_explain':' ',
	'part10_9_c_spouse_prior_date_birth':' ',
	'part10_9_d_spouse_country_birth':' ',
	'part10_9_e_spouse_country_citizen':' ',
	'part10_9_f_spouse_date_of_marriage':' ',
	'part10_9g_spouse_date_ended_marriage':' ',
	'part10_9_h_explain':' ',

	'part11_2a_last_name':' ',
	'part11_2a_first_name':' ',
	'part11_2a_middle_name':' ',
	'part11_2a_a_number':' ',
	'part11_2a_date_of_birth':' ',
	'part11_2a_country_of_birth':' ',
	'part11_2a_child_street_number':' ',
	'part11_2a_child_country':' ',
	'part11_2a_child_zipcode1':' ',
	'part11_2a_child_zipcode2':' ',
	'part11_2a_child_foreign_region':' ',
	'part11_2a_child_foreign_postalcode':' ',
	'part11_2a_child_foreign_country':' ',
	'part11_2a_child_relationship':' ',
	'part11_2a_child_city_town':' ',

	'part11_2b_last_name':' ',
	'part11_2b_first_name':' ',
	'part11_2b_middle_name':' ',
	'part11_2b_a_number':' ',
	'part11_2b_date_of_birth':'  ',
	'part11_2b_country_of_birth':' ',
	'part11_2b_child_street_number':'  ',
	'part11_2b_child_city_town':' ',
	'part11_2b_child_country':' ',
	'part11_2b_child_zipcode1':' ',
	'part11_2b_child_zipcode2':' ',
	'part11_2b_child_foreign_region':' ',
	'part11_2b_child_foreign_postalcode':' ',
	'part11_2b_child_foreign_country':' ',
	'part11_2b_child_relationship':' ',

	'part11_2c_last_name':' ',
	'part11_2c_first_name':' ',
	'part11_2c_middle_name':' ',
	'part11_2c_a_number':' ',
	'part11_2c_date_of_birth':' ',
	'part11_2c_country_of_birth':' ',
	'part11_2c_child_street_number':' ',
	'part11_2c_child_city_town':' ',
	'part11_2c_child_country':' ',
	'part11_2c_child_zipcode1':' ',
	'part11_2c_child_zipcode2':' ',
	'part11_2c_child_foreign_region':' ',
	'part11_2c_child_foreign_postalcode':' ',
	'part11_2c_child_foreign_country':' ',
	'part11_2c_child_relationship':' ',

	'part11_2d_last_name':' ',
	'part11_2d_first_name':' ',
	'part11_2d_middle_name':' ',
	'part11_2d_a_number':' ',
	'part11_2d_date_of_birth':' ',
	'part11_2d_country_of_birth':' ',
	'part11_2d_child_street_number':' ',
	'part11_2d_child_city_town':' ',
	'part11_2d_child_country':' ',
	'part11_2d_child_zipcode1':' ',
	'part11_2d_child_zipcode2':' ',
	'part11_2d_child_foreign_region':' ',
	'part11_2d_child_foreign_postalcode':' ',
	'part11_2d_child_foreign_country':' ',
	'part11_2d_child_relationship':' ',

	
	'part12_table_name_of_group_1':' ',
	'part12_table_name_of_group_2':' ',
	'part12_table_name_of_group_3':' ',
	'part12_table_name_of_group_4':' ',

	'part12_table_purpose_of_group_1':' ',
	'part12_table_purpose_of_group_2':' ',
	'part12_table_purpose_of_group_3':' ',
	'part12_table_purpose_of_group_4':' ',

	'part12_table_from_date_1':' ',
	'part12_table_from_date_2':' ',
	'part12_table_from_date_3':' ',
	'part12_table_from_date_4':' ',

	'part12_table_to_date_1':' ',
	'part12_table_to_date_2':' ',
	'part12_table_to_date_3':' ',
	'part12_table_to_date_4':' ',

	'part12_28b_years':' ',
	'part12_28b_month':' ',
	'part12_28b_day':' ',

	'part12_29_table_where_arested1':' ',
	'part12_29_table_where_arested2':' ',
	'part12_29_table_where_arested3':' ',
	'part12_29_table_where_arested4':' ',
	'part12_29_table_where_arested5':' ',

	'part12_29_table_date_arrested1':' ',
	'part12_29_table_date_arrested2':' ',
	'part12_29_table_date_arrested3':' ',
	'part12_29_table_date_arrested4':' ',
	'part12_29_table_date_arrested5':' ',

	'part12_29_table_arrested_city_town1':' ',
	'part12_29_table_arrested_city_town2':' ',
	'part12_29_table_arrested_city_town3':' ',
	'part12_29_table_arrested_city_town4':' ',
	'part12_29_table_arrested_city_town5':' ',

	'part12_29_table_outcome_disposition1':' ',
	'part12_29_table_outcome_disposition2':' ',
	'part12_29_table_outcome_disposition3':' ',
	'part12_29_table_outcome_disposition4':' ',
	'part12_29_table_outcome_disposition5':' ',

	'additional_information_date_registered':' ',
	'additional_information_selective_service_number':' ',
	'part_13_applicant_signature':' ',
	'part_14_interpreter_first_name':' ',
	'part_14_interpreter_last_name':' ',
	'interpreter_business_org_name':' ',
	'interpreter_mailing_address_street_name_number':' ',
	'interpreter_mailing_address_city_town':' ',
	'interpreter_mailing_address_zipcode1':' ',
	'interpreter_mailing_address_zipcode2':' ',
	'interpreter_mailing_address_provience':' ',
	'interpreter_mailing_address_postal_code':' ',
	'interpreter_mailing_address_country':' ',

	'interpreter_contact_daytime_telephone':' ',
	'interpreter_contact_work_telephone':' ',
	'interpreter_contact_evening_telephone':' ',
	'interpreter_certificationion':' ',
	'interpreter_date_of_signature':' ',

	'preparer_last_name':' ',
	'preparer_first_name':' ',
	'preparer_business_org_name':' ',
	'preparer_mailing_address_street_name_number':' ',
	'preparer_mailing_address_city_town':' ',
	'preparer_mailing_address_zipcode1':' ',
	'preparer_mailing_address_zipcode2':' ',
	'preparer_mailing_address_provience':' ',
	'preparer_mailing_address_postal_code':' ',
	'preparer_mailing_address_country':' ',
	'preparer_contact_daytime_telephone':' ',
	'preparer_contact_work_telephone':' ',
	'preparer_contact_evening_telephone':' ',
	'preparer_date_of_signature':' ',
	'':' '
	
	
	
	




	

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
$pdf->Output('Form n_400.pdf', 'I');