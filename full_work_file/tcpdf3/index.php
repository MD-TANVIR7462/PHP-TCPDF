<?php 
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
		$this->Cell(195.5, 4, '', $header_top_border, 1, 1);
		
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
		//$created_date = date("F d, Y");
		//$this->Cell(40, 4, 'Form N-400 Edition 09/17/19');
		
 		// $this->write2DBarcode('N-400|09/17/19|1', 'PDF417', 20, 120, 0, 20, $style, 'N');
		
 		// $this->write2DBarcode('test');
		
        // set a barcode on the page footer
        //$this->setBarcode(date('Y-m-d H:i:s'));
		
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018    ', $single_border_top, 0, 0);
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018', 1, 0, 'L');
		// $this->MultiCell(60, 4,'1025GEJ Approved February 26, 2018','T','L',1,0);
		
        // set style for barcode
        $style = array(
            'border' => 0,
            'vpadding' => '0',
            'hpadding' => '0',
			'stretch' => true,
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 22, // width of a single module in points
            'module_height' => 2.5, // height of a single module in points
        );
        		
        $this->SetFont('times', '', 9);
		$this->Cell(100, 6, 'Form N-400 Edition 09/17/19',0, 0, 'L');
		// $this->MultiCell(60, 4,'Ex Parte Motion for Alternative Service','T','C',1,0);
		
        $this->write2DBarcode('N-400|09/17/19|'.$this->getAliasNumPage(), 'PDF417', 65, 265, 95, 0, $style, '');
		
		
		

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
		
		$pageNumber = 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages();
        $this->SetFont('times', '', 9);
        $this->Cell(104, 6, $pageNumber, 0, 0, 'R');
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
$pdf->SetTitle('Application for Naturalization');

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
$pdf->setBarcode(date('Y-m-d H:i:s'));

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
$pdf->MultiCell(40, 5, "OMB No. 1615-0052\nExpires 09/30/2022", 0, 'C', 0, 1, 169, 18.5, true);

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
$pdf->MultiCell(80, 15, "Enter Your 9 Digit A-Number:", 0, 'C', 0, 1, 130, 117.6, true);
$pdf->MultiCell(80, 15, "A-", 0, 'C', 0, 1, 113.7, 122, true);
$pdf->TextField('9_digit_number', 39.5, 5.5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156, 122);

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
$pdf->ComboBox('naturalization_interview', 142.5, 6, array(), array(), array(), 61);

$pdf->Ln(12);

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
$pdf->SetFont('times', 'B', 10); // set font
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
$pdf->SetFont('times', 'B', 10); // set font
$pdf->TextField('exact_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 237);
$pdf->TextField('exact_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 237);
$pdf->TextField('exact_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 237);

$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));

// Arrows
// $pdf->Text(185, 249, 'Arrows');
$pdf->SetLineStyle($style5);
$pdf->SetFillColor(0, 0, 0);
// $pdf->Arrow(200, 280, 185, 266, 0, 5, 15);
$pdf->Arrow(147, 124.5, 151, 124.5, 2, 4, 15);
$pdf->Arrow(15, 72, 16.5, 72, 2, 4, 15);

$js = "
var fields = {
	'9_digit_number':' ',
	'naturalization_interview':' ',
	'legal_last_name':' ',
	'legal_first_name':' ',
	'legal_middle_name':' ',
	'exact_last_name':' ',
	'exact_first_name':' ',
	'exact_middle_name':' ',
	'since_birth_last_name1':' ',
	'since_birth_first_name1':' ',
	'since_birth_middle_name1':' ',
	'since_birth_last_name2':' ',
	'since_birth_first_name2':' ',
	'since_birth_middle_name2':' ',
	'testname':' '
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
$pdf->SetFont('times', 'B', 11); // set font
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

$pdf->Ln(1.1);
$pdf->MultiCell(0, 0, "Would you like to legally change your name?", '', 'L', 1, 1, 20, '', true);

$pdf->Ln(1.1);
$pdf->MultiCell(0, 0, 'If you answered "Yes," type or print the new name you would like to use in the spaces provided below.', '', 'L', 1, 1, 20, '', true);




$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20, 78, $html, 0, 0, true, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 96, 77, $html, 0, 0, true, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 154, 76, $html, 0, 1, true, false, 'L', true);


$pdf->MultiCell(73, 7, '', 1, 'R', 1, 0, 21, 85, true);
$pdf->MultiCell(56, 7, '', 1, 'R', 1, 0, 97, 85, true);
$pdf->MultiCell(48, 7, '', 1, 'R', 1, 0, 155, 85, true);


$html = '<b>5.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U.S. Social Security Number (if applicable)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(0, 0, 12, 93, $html, 0, 0, true, false, 'L', true);

/* $pdf->Ln(1.1);
// set default form properties
$pdf->setFormDefaultProp(array('lineWidth' => 1, 'borderStyle' => 'solid', 'fillColor' => array(255, 255, 0), 'strokeColor' => array(255, 0, 0)));
$pdf->SetFont('helvetica', 'BI', 18);
$pdf->Cell(0, 5, 'Example of Form', 0, 1, 'L');
        // First name
        $pdf->Cell(35, 5, 'First name:');
        $pdf->TextField('firstname', 50, 5);
        $pdf->Ln(6); */
		

// set some text for example
$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

// Multicell test
// $pdf->MultiCell(0, 5, "Would you like to legally change your name?", 1, 'L', 1, 1, '', '', true);


/* $pdf->MultiCell(55, 5, '[RIGHT] '.$txt, 1, 'R', 0, 1, '', '', true);
$pdf->MultiCell(55, 5, '[CENTER] '.$txt, 1, 'C', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, '[JUSTIFY] '.$txt."\n", 1, 'J', 1, 2, '' ,'', true);
$pdf->MultiCell(55, 5, '[DEFAULT] '.$txt, 1, '', 0, 1, '', '', true); */




$pdf->AddPage('P', 'LETTER'); // page number 3
/* // create some HTML content
$html = <<<EOD
<div style="letter-spacing: 15px;">page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number page number </div>
<input type="text" name="testname" value="" style="letter-spacing: 15px;" size="20" maxlength="9" />
EOD;

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0); */



	
	


$pdf->AddPage('P', 'LETTER'); // page number 4



// ---------------------------------------------------------

/* // set a barcode on the page footer
$pdf->setBarcode(date('Y-m-d H:i:s'));

// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();

// print a message
$txt = "You can also export 1D barcodes in other formats (PNG, SVG, HTML). Check the examples inside the barcodes directory.\n";
$pdf->MultiCell(70, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);
$pdf->SetY(30); */

// -----------------------------------------------------------------------------



// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// TEST BARCODE STYLE


// $pdf->setBarcode(date('Y-m-d H:i:s'));

/* $pdf->AddPage('P', 'LETTER'); // page number 5

$pdf->AddPage('P', 'LETTER'); // page number 6

$pdf->AddPage('P', 'LETTER'); // page number 7

$pdf->AddPage('P', 'LETTER'); // page number 8

$pdf->AddPage('P', 'LETTER'); // page number 9

$pdf->AddPage('P', 'LETTER'); // page number 10

$pdf->AddPage('P', 'LETTER'); // page number 11

$pdf->AddPage('P', 'LETTER'); // page number 12

$pdf->AddPage('P', 'LETTER'); // page number 13

$pdf->AddPage('P', 'LETTER'); // page number 14

$pdf->AddPage('P', 'LETTER'); // page number 15

$pdf->AddPage('P', 'LETTER'); // page number 16

$pdf->AddPage('P', 'LETTER'); // page number 17

$pdf->AddPage('P', 'LETTER'); // page number 18

$pdf->AddPage('P', 'LETTER'); // page number 19

$pdf->AddPage('P', 'LETTER'); // page number 20 */

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');