
<!-- family name given name and middle name -->
$startX = 20;
$startY = 80;
$lineHeight = 6;
$fieldHeight = 7;
$labelFont = ['times', '', 10];
$fieldFont = ['courier', 'B', 10];
$stroke = ['strokeColor' => [64, 64, 64], 'lineWidth' => 1, 'borderStyle' => 'solid'];

// Labels
$pdf->SetFont(...$labelFont);
$pdf->writeHTMLCell(130, 1, $startX, $startY, "Family Name (Last Name)", 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(60, 1, $startX + 72.3, $startY, "Given Name (First Name)", 0, 0, false, false, 'L', false);
$pdf->writeHTMLCell(60, 1, $startX + 131,$startY-0.5, "Middle Name (if applicable)", 0, 0, false, false, 'L', true);

// Fields
$pdf->SetFont(...$fieldFont);
$pdf->TextField('p1_1a', 70, $fieldHeight, $stroke, array(), $startX + 0.8, $startY + 5);    // Family Name
$pdf->TextField('p1_1b', 57.5, $fieldHeight, $stroke, array(), $startX + 72.2, $startY + 5); // Given Name
$pdf->TextField('p1_1c', 52, $fieldHeight, $stroke, array(), $startX + 132, $startY + 5);    // Middle Name

