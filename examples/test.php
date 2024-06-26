<?php
require_once('formheader.php');   //database connection file 
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF {
	
    // Page header
    public function Header() {
        $this->SetY(13);
		if ($this->page > 1){
			$this->SetLineWidth(2); // set border width
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C');
			
			$this->SetLineWidth(0.1); // set border width
			$this->SetFillColor(255,255,255); // set filling color
			$this->MultiCell(191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C');
		}
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-20);
		
		$header_top_border = array(
		   'B' => array('width' => 0.5, 'color' => array(0,0,0), 'dash' => 0, 'cap' => 'butt'),
		);
		if($this->page > 1){
			$this->Cell(189.5, 4, '', $header_top_border, 1, 1);
			$this->SetFont('times', '', 9);
			$this->Cell(36, 6, "Form I-589 (Rev. 08/25/20) ", 0, 0, 'R');	
			$this->MultiCell(59, 5.8, 'Page '.$this->getAliasNumPage(), 0, 'R', 0, 1, 152.5, 264.5, true);
		}
		
        // Set font
		if($this->page==1){
			$this->SetFont('times', '', 9.2);
			$this->MultiCell(59, 10, 'Page '.$this->getAliasNumPage(), 0, 'R', 0, 1, 152.5, 264.5, true);
			$this->MultiCell(59, 10, 'Form I-589 Edition 03/01/23', 0, 'L', 0, 1, 13, 264.5, true);
		}
    }
}

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-589');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(13.7, 15.3, 12.8, true);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage('P', 'LETTER');  // page number 1

// Calculate the height of your content
$contentHeight = 210;
// Check if the content exceeds the available space on the first page
if ($contentHeight > ($pdf->getPageHeight() - $pdf->GetY())) {
    // If it exceeds, add a new page
    $pdf->AddPage('P', 'LETTER');
}

// Now, add your content
function breakText($text, $maxLength) {
    $lines = [];
    $words = explode(" ", $text);
    $currentLine = '';
    
    foreach ($words as $word) {
        if (strlen($currentLine) + strlen($word) <= $maxLength) {
            // Word fits within the current line
            $currentLine .= $word . ' ';
        } else {
            // Word exceeds the maximum length, start a new line
            $lines[] = trim($currentLine);
            $currentLine = $word . ' ';
        }
    }
    
    // Add the remaining part of the last line
    if (!empty($currentLine)) {
        $lines[] = trim($currentLine);
    }
    
    return $lines;
}

$pdf->setFont('Times', '', 10);

$html = '<div><b>7.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell(30, 7, 112, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

// Your original text
$text = ''; // Put your text here

// Break the text into lines
$lines = breakText($text, 30);

// Insert each line into the PDF as a separate text field
$yPosition = 18.5; // Initial y position
foreach ($lines as $line) {
    $pdf->TextField('additional_information_7a', 60, 60, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 120, $yPosition);
    $pdf->Text(30, $s + 5, $line); // Adjust the x position as needed
    $yPosition -= 7; // Move to the next line
}

$js = "
var fields = {
    'additional_claim_to_asylum':' ',
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

// Close and output PDF document
$pdf->Output('I-864A.pdf', 'I');
