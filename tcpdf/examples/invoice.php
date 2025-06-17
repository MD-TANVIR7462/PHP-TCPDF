<?php

// require_once('formheader.php');
require_once("localconfig.php");


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// Extend the TCPDF class to create custom Header and Footer
class MyPDF extends TCPDF
{
    // Page header
    public function Header()
    {
        $this->SetY(10); // Moved everything higher

        if ($this->page === 1) {
            // Left section: Company info
            $this->SetFont('helvetica', 'B', 15);
            $this->SetTextColor(0, 0, 0);
            $this->SetXY(12, 10); // Top-left starting point
            $this->Cell(100, 6, 'Mirtex Trading Corp.', 0, 2, 'L');

            $this->SetFont('helvetica', '', 10);
            $this->Cell(100, 5, '20 Berry Street', 0, 2, 'L');
            $this->Cell(100, 5, 'Brooklyn, NY 11249', 0, 2, 'L');
            $this->Cell(100, 5, '718-486-7832', 0, 2, 'L');
            $this->Cell(100, 5, 'starofmirtex@aol.com', 0, 2, 'L');

            // Right section: Invoice info
            $this->SetXY(154.4, 10);
            $this->SetFont('helvetica', 'B', 15);
            $this->Cell(50, 6, 'Invoice', 0, 2, 'L');

            $this->SetFont('helvetica', '', 10);
            // Date
            $this->Cell(20, 6, '  Date', 1, 0, 'L');
            $this->Cell(30, 6, '', 1, 1, 'L');

            // Invoice Number
            $this->SetX(154.4);
            $this->Cell(20, 6, '  Invoice', 1, 0, 'L');
            $this->Cell(30, 6, '', 1, 1, 'L');
        }
    }




    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-18);

        $header_top_border = array(
            'B' => array('width' => 0.5, 'color' => array(0, 0, 0), 'dash' => 0, 'cap' => 'butt'),
        );
        $this->Cell(191.5, 4, '', $header_top_border, 1, 1);

        // Set font
        $this->SetFont('times', '', 9);

        $this->Cell(40, 6, "Form I-485    Edition    01/20/25 ", 0, 0, 'L');


        // if ($this->page == 1){
        $barcode_image = "images/i485/I-485-footer-pdf417-$this->page.png";
        // )
        $this->Image($barcode_image, 65, 267, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false); // Footer Barcode PDF417

        $this->MultiCell(61, 6, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 'R', 0, 1, 156, 266.5, true);
    }
}


$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Form I-485');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(13.7, 15.3, 12.8, true);


// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


/********************************
 ******** Start Page No 1 ********
 *********************************/

$pdf->AddPage('P', 'LETTER');
// Set font
$pdf->SetFont('helvetica', '', 9);

 
$pdf->SetX($leftX + 1);
$pdf->setCellHeightRatio(1.5);
$pdf->writeHTMLCell($colWidth - 2, '', '', '', "<b>06284 BD'S (PROVIDENCE)</b><br>BD&APOS;S 699 HARTFORD AVE. PROVIDENCE, RI,<br>PROVIDENCE, 02909,<br><b>Phone</b> : 401-331-8200<br><b>Email :</b>", 0, 1, false, true, 'L', true);
$pdf->setCellHeightRatio(1.2);



// Resale and Certificate #
$pdf->Rect($leftX, $topY + 35, $colWidth / 3, $rowHeight + 4); // Resale
$pdf->Rect($leftX + $colWidth / 3, $topY + 35, $colWidth / 2 + 15.3, $rowHeight + 4);
$pdf->setCellHeightRatio(1.5);
$pdf->SetXY($leftX + 1, $topY + 35);
$pdf->writeHTMLCell($colWidth / 2 - 2, $rowHeight, $leftX + 1, $topY + 35, "Resale<br>Certificate #", 0, 0, false, true, 'L', true);
$pdf->setCellHeightRatio(1.2);



// ---------- SHIP TO BOX ----------
$rightX = $leftX + $colWidth + 5;
$pdf->Rect($rightX, $topY, $colWidth + 3, 45); // Outer Bill To box

$pdf->SetXY($rightX + 1, $topY + 2);
$pdf->Cell($colWidth - 2, $rowHeight, 'Ship To :', 0, 1);
$pdf->Rect($rightX, $topY + 8, $colWidth + 3, 0); // Under  Bill To box border
$pdf->SetX($rightX + 1);
// Example: Sample data from database
$shipToData = [
    'name' => "BD'S (PROVIDENCE)",
    'address_line1' => "699 HARTFORD AVE.",
    'city' => "PROVIDENCE",
    'state' => "RI",
    'zip' => "02909",
    'phone' => "401-331-8200",
];

// Construct HTML string from database
$shipToHTML = "<b>" . htmlspecialchars($shipToData['name']) . "</b><br>" .
    htmlspecialchars($shipToData['name']) . " " . htmlspecialchars($shipToData['address_line1']) .
    " " . htmlspecialchars($shipToData['city']) . ", " . htmlspecialchars($shipToData['state']) .
    ",<br>" . htmlspecialchars($shipToData['zip']) . ",<br>" .
    "<b>Phone</b> : " . htmlspecialchars($shipToData['phone']);

// Use in TCPDF
$pdf->setCellHeightRatio(1.5);
$pdf->writeHTMLCell($colWidth + 12, '', '', '', $shipToHTML, 0, 1, false, true, 'L', true);
$pdf->setCellHeightRatio(1.2);


// ---------- CUSTOMER / PO / TERMS / SALESMAN BOX ----------

$infoTopY = 91; // Adjust Y position based on your layout
$infoLeftX = 12.4;
$infoTotalWidth = 190; // Total width of the full table
$colWidths = [66, 32.5, 32.5, 61]; // Four equal columns

$rowHeight = 8;

// Draw outer box
$pdf->Rect($infoLeftX, $infoTopY, array_sum($colWidths), $rowHeight * 2);

// Draw vertical column lines
$currentX = $infoLeftX;
foreach ($colWidths as $width) {
    $currentX += $width;
    $pdf->Line($currentX, $infoTopY, $currentX, $infoTopY + $rowHeight * 2);
}

// Draw horizontal middle line
$pdf->Line($infoLeftX, $infoTopY + $rowHeight, $infoLeftX + array_sum($colWidths), $infoTopY + $rowHeight);

// Set font and print headers
$pdf->SetFont('helvetica', '', 9);
$pdf->SetXY($infoLeftX + 1, $infoTopY + 2);
$pdf->Cell($colWidths[0] - 2, 5, 'Customer #', 0, 0);

$pdf->SetXY($infoLeftX + $colWidths[0] + 1, $infoTopY + 2);
$pdf->Cell($colWidths[1] - 2, 5, 'P.O. #', 0, 0);

$pdf->SetXY($infoLeftX + $colWidths[0] + $colWidths[1] + 1, $infoTopY + 2);
$pdf->Cell($colWidths[2] - 2, 5, 'Terms', 0, 0);

$pdf->SetXY($infoLeftX + $colWidths[0] + $colWidths[1] + $colWidths[2] + 1, $infoTopY + 2);
$pdf->Cell($colWidths[3] - 2, 5, 'Salesman', 0, 0);

// Data Input
$pdf->SetXY($infoLeftX + 1, $infoTopY + $rowHeight + 2);
$pdf->Cell($colWidths[1] - 2, 5, "06284 BD'S (Providence)", 0, 0);
$pdf->SetXY($infoLeftX + $colWidths[0] + 1, $infoTopY + $rowHeight + 2);
$pdf->Cell($colWidths[1] - 2, 5, "-", 0, 0);
$pdf->SetXY($infoLeftX + $colWidths[0] + $colWidths[1] + 1, $infoTopY + $rowHeight + 2);
$pdf->Cell($colWidths[1] - 2, 5, "30", 0, 0);
$pdf->SetXY($infoLeftX + $colWidths[0] + $colWidths[1] + $colWidths[2] + 1, $infoTopY + $rowHeight + 2);
$pdf->Cell($colWidths[1] - 2, 5, "Moustapha ", 0, 0);









$js = "
var fields = {
// page 1

   
   
   
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
$pdf->Output('Invoice', 'I');
