<?php 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');







// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    //Page header
    public function Header() {
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
		
		$footer_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		$this->Cell(180, 4, '', $footer_top_border, 1, 1);
		
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
		//$created_date = date("F d, Y");
		//$this->Cell(40, 4, 'Form N-400 Edition 09/17/19');
		
// 		$this->write2DBarcode('N-400|09/17/19|1', 'PDF417', 20, 120, 0, 20, $style, 'N');
		
// 		$this->write2DBarcode('test');
		
        // set a barcode on the page footer
        //$this->setBarcode(date('Y-m-d H:i:s'));
		
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018    ', $single_border_top, 0, 0);
		// $this->Cell(60, 4, '1025GEJ Approved February 26, 2018', 1, 0, 'L');
		// $this->MultiCell(60, 4,'1025GEJ Approved February 26, 2018','T','L',1,0);
		
// set style for barcode
$style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 15, // width of a single module in points
    'module_height' => 2 // height of a single module in points
);
		
        $this->SetFont('times', '', 9);
		$this->Cell(100, 6, 'Form N-400 Edition 09/17/19',0, 0, 'L');
		// $this->MultiCell(60, 4,'Ex Parte Motion for Alternative Service','T','C',1,0);

        $this->SetFont('times', '', 9);
        $this->write2DBarcode('N-400|09/17/19|'.$this->getAliasNumPage(), 'PDF417', 65, 281, 95, 30, $style, '0');
		
		$pageNumber = 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages();
        $this->SetFont('times', '', 9);
        $this->Cell(90, 6, $pageNumber, 0, 0, 'R');
        // $this->Cell(80, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 1, 0, 'R', 0, '', 0, false, 'L', 'R');

        
    }
}











// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
$pdf->SetMargins(12.3, PDF_MARGIN_TOP, 12.3);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set a barcode on the page footer
$pdf->setBarcode(date('Y-m-d H:i:s'));

// add a page
$pdf->AddPage('P', 'A4');

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
$image_file = 'homeland_security_logo.png';
$pdf->Image($image_file, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
 


// set color for background
// $pdf->SetFillColor(255, 235, 235);

// Fit text on cell by reducing font size
// $pdf->cell(120, 10, 'Application for Naturalization', 1, 'J', 0, 0, 80, 20, true, 0, false, true, 60, 'M', true);


$pdf->Cell(40, 5, '', 0, 0);
// $pdf->Cell(50, 10, 'Application for Naturalization', 1, 1, 'C', 0, '', 4);

$pdf->SetFont('times', 'B', 13);	// set font
$pdf->cell(70, 5, 'Application for Naturalization', 0, 0, 'C');
 
$pdf->Cell(40, 5, '', 0, 1);
 
$pdf->Ln(8);
/*$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 255)));
$pdf->SetFillColor(255,255,0);
$pdf->SetTextColor(0,0,255);
$pdf->MultiCell(60, 4, "", 1, 'C', 1, 0);
 
 */

$top_border = array(
   'B' => array('width' => 2, 'color' => array(0,0,0), 'dash' => '3,1,0.5,2', 'cap' => 'square'),
);
$pdf->Cell(185.5, 0, '', $top_border, 1, 1);
$top_border2 = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
);
$pdf->Cell(185.5, 0, '', $top_border2, 1, 1);














 
//$pdf->writeHTML($html, true, false, true, false, '');
// add a page
$pdf->AddPage('P', 'A4');

$html = '<h1>Hey</h1>';


/* $prop = [
    'style' => 'cr'
];

 $pdf->CheckBox('newsletter', 5, false, $prop, array(), 'OK1', 600/5, 500/5, false); */
 
/* $pdf->CheckBox('myCheckbox', 50, false, array(), array());

$js = <<<EOD
var f = this.getField("myCheckbox");
f.style = style.ch;
EOD;

$pdf->IncludeJS($js); */

/* $html = '<style>
    .dashed {
        border: 2px dashed gray;
        padding-left: 1em;
        padding-right: 1em;
        font-family: monospace;
    }
    .solid {
        border: 2px solid gray;
        padding-left: .75em;
        padding-right: .75em;
        margin-left: 1em;
        margin-right: .5em;
        font-family: monospace;
    }
    .solid:first-child {
        margin-left: 0;
    }
</style>

<table border="2" cellpadding="12" cellspacing="0">
    <tr>
        <td>What does 1 + 1 ?</td>
        <td><span class="dashed">&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </tr>
    <tr>
        <td>What does 2 + 2 ?</td>
        <td>
            <span class="solid">A</span>
            One
            <span class="solid">B</span>
            Two
            <span class="solid">C</span>
            Three
            <span class="solid">D</span>
            Four
        </td>
    </tr>
</table>';

$pdf->MultiCell(0, 0, '2.4 Welche Arten von Abscheideranlagen betreiben Sie?', $border, $align = 'L', $fill = false, $ln = 1, $x = '', $y = '', $reseth = true, $stretch = 0, $ishtml = false, $autopadding = true, $maxh = 0, $valign = 'T', $fitcell = false);
$pdf->Ln(5);
$pdf->setFormDefaultProp(array('lineWidth' => 1, 'borderStyle' => 'solid', 'fillColor' => array(255, 255, 200), 'strokeColor' => array(255, 128, 128)));
$pdf->CheckBox('separator_light_liquid', 5, $dataset->separator_light_liquid, $prop = array(), $opt = array(), $onvalue = true, $x = '', $y = '', $js = false);
$pdf->Cell(35, 0, 'Leichtflüssigkeit', 1, $ln = 0, $align = 'L', $fill = false, $link = '', $stretch = 0, $ignore_min_height = false, $calign = 'T', $valign = 'M');
$pdf->Ln(5);

($value ? $value = 'X' : $value = null);
$pdf->Cell(5, $h = 5, $txt = $value, $border = 1, $ln = 0, $align = '', 0, $link = '', $stretch = 1, $ignore_min_height = false, $calign = 'T', $valign = 'M');
$pdf->Cell(0, $h = 6, $txt = $label, $border = 0, $ln = 1, $align = '', 0, $link = '', $stretch = 1, $ignore_min_height = false, $calign = 'T', $valign = 'M');
 */
/* $customer_name = "Hello";

$pdf->TextField('customer', 159, 7, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none', 'defaultStyle' => array('textFont'=>array('fontWeight'=>'bold'))), array('v' => $customer_name), 0, 1);
// Date of the day
$pdf->Cell(35, 5, 'Date:');
$pdf->Ln(10);
$pdf->TextField('date', 30, 5, array(), array('v'=>date('Y-m-d'),
'dv'=>date('Y-m-d')));
$pdf->Ln(10); */



/* $pdf->StartTransform();

$pdf->Image('logo.png', 175, 5, 35, 0, 'PNG','https://franchimp.com');

$pdf->SetFont('Helvetica', 'B', 70);
$pdf->SetTextColor(31, 156, 239);
$pdf->SetAlpha(0.5);  
$pdf->SetXY(20, 180);
$pdf->Rotate(35);
$pdf->Write(0, 'franchimp.com');
$pdf->StopTransform();
$pdf->Ln(10); */



$pdf->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 1, 'color' => array(0, 0, 0)));
// $pdf->SetTextColor(245,245,245);
$pdf->SetFont('courier', 'B', 10);
$pdf->SetDrawColor(0,0,0); // set color for cell border
$pdf->SetFillColor(255,255,255);
$html ='<input type="text" name="us_social_security_number" value="" size="10" style="width:100px;height:100px;padding:50px;letter-spacing:20px;border:5px solid #00000" maxlength="9" />';
$pdf->writeHTMLCell(42.5, 3, 25, 100.2, $html, 1, 1, false, true, 'J', 0);



// output the HTML content
// $pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');