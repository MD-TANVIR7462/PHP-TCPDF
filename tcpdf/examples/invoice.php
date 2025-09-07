<?php
// Include TCPDF library
require_once('tcpdf_include.php');

// Extend TCPDF to create custom header and footer
class AGINGPDF extends TCPDF {
    public function Header() {
        $this->SetFont('helvetica', '', 18);
        $this->MultiCell(200, 6, 'MIRTEX INDUSTRIES INC', 0, 'L', 0, 1, '', 7, true);
        $this->SetFont('helvetica', '', 12);
        
        $html = "<table cellspacing='0' cellpadding='1' border='0' style='width:100%;text-align:center'>
                    <tr><td>20 Berry Street</td></tr>
                    <tr><td>Brooklyn, NY 11249</td></tr>
                    <tr><td>718-486-7832</td></tr>
                    <tr><td>starofmirtex@aol.com</td></tr>
                </table>";
        $this->writeHTMLCell(0, 0, 7, 9, $html, 0, 1, 0, true, 'L', true);
        
        $this->SetFont('helvetica', '', 18);
        $this->writeHTMLCell(0, 0, 165, 9, 'A/R Aging Report', 0, 1, 0, true, 'L', true);
        
        $this->SetFont('helvetica', '', 10);
        $currentDate = date('m/d/Y');
        $html = "<table cellspacing='0' cellpadding='4' border='1' style='width:100%; text-align:left; border-collapse:collapse;'>
                    <tr>
                        <td style='border:1px solid #000;'>As of Date</td>
                        <td style='border:1px solid #000;'>$currentDate</td>
                    </tr>
                </table>";
        $this->writeHTMLCell(0, 0, 165, 16, $html, 0, 1, 0, true, 'L', true);
        
        // Add report headers
        $this->SetY(40);
        $html = '<table cellspacing="0" cellpadding="4" border="1" style="width:100%; border-collapse:collapse;">
                    <tr style="background-color:#f2f2f2; font-weight:bold;">
                        <th style="width:8%;">ID</th>
                        <th style="width:25%;">Customer</th>
                        <th style="width:10%;">Balance</th>
                        <th style="width:10%;">Current</th>
                        <th style="width:8%;">1-30</th>
                        <th style="width:8%;">31-60</th>
                        <th style="width:8%;">61-90</th>
                        <th style="width:8%;">Over-90</th>
                        <th style="width:15%;">SP</th>
                    </tr>
                </table>';
        $this->writeHTML($html, true, false, true, false, '');
    }
    
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create demo data similar to the image
$demoData = array(
    array('02747', 'Fashion Mail', 4037.20, 0, 0, 0, 4027.30, 0, 6),
    array('05999', 'Trades', 126.42, 0, 0, 0, 120.42, 0, 8),
    array('06438', 'Galaxy Furniture', 40.00, 0, 0, 0, 40.00, 0, 9),
    array('03470', 'General Mode', 2005.20, 2805.20, 0, 0, 0, 0, 7),
    array('06765', 'Electric test 2', 184976.18, 184976.18, 0, 0, 0, 0, 7),
    array('06764', 'Sahraq_test', -102793.40, 10792.74, -113576.14, 0, 0, 0, 7),
    array('02987', 'J & G Variety Discount', 792.60, 0, 0, 0, 822.00, 0, 6),
    array('00757', 'Jackney Department Store', 1068.00, 0, 0, 0, 0, 0, 1),
    array('06228', 'Jersey Plaza', 3833.70, 0, 0, 0, 0, 0, 1),
    array('03092', 'Kennedy Dept Store', 17.46, 0, 0, 0, 0, 17.46, 1),
    array('06354', 'Stoney & Dept. Store', 4032.50, 0, 0, 0, 0, -37.00, 1),
    array('05354', 'Liberty Curtain & Clothing', 510.00, 510.00, 4110.60, 0, 0, 4300.85, 1),
    array('06197', 'NAS Wholesale Holdings LLC', 4306.95, 0, 0, 0, 0, -381.05, 1),
    array('05625', 'Mega Mail Discount', 2000.24, 0, 0, 0, 0, -0.01, 1),
    array('05633', 'Nelson Dept. & Furniture', 7014.00, 0, 0, 0, 0, 7214.00, 1),
    array('06245', 'National Warehouse Store', 12692.96, 0, 0, 0, 0, 5675.60, 1),
    array('06532', 'New Dream Discount', 2553.20, 0, 0, 0, 0, 0, 4),
    array('03376', 'New Jerome Enterprise INC', 3326.40, 3326.40, 2020.80, 0, 0, -20.00, 1),
    array('03155', 'New York Variety Store', 2000.80, 0, 0, 0, 0, 1346.00, 1),
    array('06115', 'Nicholas Discount', 1346.00, 0, 0, 0, 0, 0, 1),
    array('06741', 'Noor Pharmacy', 2200.00, 0, 0, 0, 0, 2200.00, 1),
    array('05862', 'Mr. Hut', -81.22, 0, 0, 0, 0, -81.28, 1),
    array('03455', 'Paradise Decorators', 3032.00, 0, 0, 0, 0, 0, 1),
    array('03692', 'Passatel-Linen', 1172.00, 0, 0, 0, 0, 1172.00, 1),
    array('01074', 'People\'s Bargain', 3627.65, 0, 0, 0, 0, 0, 1),
    array('03349', 'Quickly PSc Store', 1789.60, 0, 0, 0, 0, 1789.60, 1),
    array('06665', 'R & R Furniture World', -90.00, 0, 0, 0, 0, -90.00, 1),
    array('06247', 'Risk Furniture world #2', 2992.60, 0, 0, 0, 0, 2992.60, 1),
    array('02330', 'Ralph Chris, Inc.', 9943.79, 0, 0, 0, 0, 1111.88, 1),
    array('06750', 'Rice Departments', 10298.78, 0, 0, 0, 0, 5124.71, 1),
    array('02119', 'Robert\'s Variety', 4127.34, 0, 0, 0, 0, 4127.24, 1),
    array('03545', 'Sondesk Village Outlet', -152.00, 0, 0, 0, 0, 3139.50, 1),
    array('06662', 'Sara & 3', 1780.00, 1780.00, 0, 0, 0, 1838.48, 1),
    array('01150', 'Save A Thon', 1716.46, 0, 0, 0, 0, 965.20, 1),
    array('03728', 'Spring Smart Stores', 810.12, 0, 0, 0, 0, 938.25, 1),
    array('03946', 'Spring Valley', 3732.00, 0, 0, 0, 0, 3732.00, 1),
    array('02629', 'Stylish Curtain & Clothing', 50.00, 0, 0, 0, 0, 50.00, 1),
    array('06707', 'Stylish Furniture', 1617.00, 0, 0, 0, 0, 1617.00, 1),
    array('05227', 'Stylish Furniture #2', 3731.00, 3731.00, 0, 0, 0, 0, 1),
    array('05594', 'Super Discount', 1431.00, 0, 0, 0, 0, 0, 1),
    array('06745', 'Super Discount Outlet', 5045.40, 0, 0, 0, 0, 5045.40, 1),
    array('06744', 'TJJ Department Store', 2670.00, 0, 0, 0, 0, 2670.00, 1),
    array('03050', 'TGJ Corporation', 1230.25, 0, 0, 0, 0, 1230.25, 1),
    array('04056', 'Trials Deconvolumes', 474.00, 0, 0, 0, 0, 0, 1),
    array('06221', 'TMT Furniture & Mattress', -132.36, 0, 0, 0, 0, -132.36, 1),
    array('06730', 'United Discount Inc.', 607.00, 0, 0, 0, 0, 607.00, 1),
    array('06512', 'USA Super Store', -5657.00, 0, 0, 0, 0, 6218.40, 1),
    array('06754', 'White Queen', 6218.40, 0, 0, 0, 0, 6218.40, 1),
    array('01310', 'Value Zone #1', 2052.00, 0, 0, 0, 0, 2052.00, 1)
);

// Calculate totals
$totals = array('Balance' => 0, 'Current' => 0, '1-30' => 0, '31-60' => 0, '61-90' => 0, 'Over-90' => 0);
foreach ($demoData as $row) {
    $totals['Balance'] += $row[2];
    $totals['Current'] += $row[3];
    $totals['1-30'] += $row[4];
    $totals['31-60'] += $row[5];
    $totals['61-90'] += $row[6];
    $totals['Over-90'] += $row[7];
}

// Create new PDF document
$pdf = new AGINGPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MIRTEX INDUSTRIES INC');
$pdf->SetTitle('A/R Aging Report');
$pdf->SetSubject('A/R Aging Report');
$pdf->SetKeywords('Aging, Report, Accounts Receivable');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(7, 50, 7, true);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 9);

// Add a page
$pdf->AddPage();

// Create the table content
$html = '<table cellspacing="0" cellpadding="4" border="1" style="width:100%; border-collapse:collapse;">';

// Add data rows
foreach ($demoData as $row) {
    $html .= '<tr>';
    $html .= '<td style="width:8%;">' . $row[0] . '</td>';
    $html .= '<td style="width:25%;">' . $row[1] . '</td>';
    $html .= '<td style="width:10%; text-align:right;">' . number_format($row[2], 2) . '</td>';
    $html .= '<td style="width:10%; text-align:right;">' . number_format($row[3], 2) . '</td>';
    $html .= '<td style="width:8%; text-align:right;">' . number_format($row[4], 2) . '</td>';
    $html .= '<td style="width:8%; text-align:right;">' . number_format($row[5], 2) . '</td>';
    $html .= '<td style="width:8%; text-align:right;">' . number_format($row[6], 2) . '</td>';
    $html .= '<td style="width:8%; text-align:right;">' . number_format($row[7], 2) . '</td>';
    $html .= '<td style="width:15%; text-align:center;">' . $row[8] . '</td>';
    $html .= '</tr>';
}

// Add totals row
$html .= '<tr style="font-weight:bold; background-color:#f2f2f2;">';
$html .= '<td colspan="2" style="text-align:right;">Total:</td>';
$html .= '<td style="text-align:right;">' . number_format($totals['Balance'], 2) . '</td>';
$html .= '<td style="text-align:right;">' . number_format($totals['Current'], 2) . '</td>';
$html .= '<td style="text-align:right;">' . number_format($totals['1-30'], 2) . '</td>';
$html .= '<td style="text-align:right;">' . number_format($totals['31-60'], 2) . '</td>';
$html .= '<td style="text-align:right;">' . number_format($totals['61-90'], 2) . '</td>';
$html .= '<td style="text-align:right;">' . number_format($totals['Over-90'], 2) . '</td>';
$html .= '<td></td>';
$html .= '</tr>';

$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('ar_aging_report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+