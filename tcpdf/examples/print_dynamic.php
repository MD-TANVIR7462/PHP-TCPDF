<?php
// require_once('formheader.php');
require_once("localconfig.php");


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

if (!isset($_SESSION)) session_start();

// Demo data setup
$company_name = "Mirtex Trading Corp.";
$currentDate = date('mdY');
$font = 'helvetica';

function entity($value) {
    return str_replace(array("&comma;", "&apos;", "&quot;"), array(",", "'", '"'), $value);
}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    public function Header() {
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
            $this->Cell(30, 6, date('m/d/Y'), 1, 1, 'L');

            // Invoice Number
            $this->SetX(154.4);
            $this->Cell(20, 6, '  Invoice', 1, 0, 'L');
            $this->Cell(30, 6, 'INV-001', 1, 1, 'L');
        }
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-25);
        $this->Ln(1.1);
        $this->MultiCell(202, 50, '', 'T', 'R', 0, 1, '', '', true);
    }
}

// Create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($company_name);
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Invoice');
$pdf->SetKeywords('Invoice');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(7, 32, 7, true);

// Set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont($font, '', 12);

// Demo invoice data
$invoiceId = 'INV-001';
$filename = "invoice-$invoiceId.pdf";

// Add a page
$pdf->AddPage('P', 'LETTER');

// Demo customer data
$customerCode = 'CUST-001';
$customerName = 'ABC Manufacturing Inc.';
$customerAddress = '123 Industrial Park Way';
$cityStateZip = 'Brooklyn, NY, 11201';
$invoiceDate = date('m/d/Y');
$beforeTaxAmount = 1250.75;
$invoiceTaxRate = '8.875%';
$invoiceTaxAmount = 110.98;
$afterTaxAmount = 1361.73;

// Demo items data
$items = [
    [
        'item_name' => 'Waste Disposal Service',
        'address' => '123 Industrial Park Way',
        'price' => 45.50,
        'transactions' => [
            [
                'date' => date('m/d/Y', strtotime('-1 week')),
                'quantity' => 5,
                'unit' => 'tons',
                'ticket_no' => 'TKT-1001',
                'po_box' => 'PO-001',
                'general_comments' => 'Regular pickup'
            ],
            [
                'date' => date('m/d/Y', strtotime('-2 weeks')),
                'quantity' => 7,
                'unit' => 'tons',
                'ticket_no' => 'TKT-1002',
                'po_box' => 'PO-001',
                'general_comments' => 'Extra pickup'
            ]
        ]
    ],
    [
        'item_name' => 'Recycling Service',
        'address' => '123 Industrial Park Way',
        'price' => 32.75,
        'transactions' => [
            [
                'date' => date('m/d/Y', strtotime('-1 week')),
                'quantity' => 3,
                'unit' => 'tons',
                'ticket_no' => 'TKT-2001',
                'po_box' => 'PO-001',
                'general_comments' => 'Cardboard recycling'
            ]
        ]
    ]
];

// Create columns content
$left_column = "$customerName <br>$customerAddress <br>$cityStateZip <br>Customer ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $customerCode";
$right_column = "Invoice No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $invoiceId <br>Invoice Date: $invoiceDate <br><br>";

$pdf->Ln(1.1);

$beforeTaxAmountShow = number_format($beforeTaxAmount, 2);
$invoiceTaxAmountShow = number_format($invoiceTaxAmount, 2);
$afterTaxAmountShow = number_format($afterTaxAmount, 2);

// Build the invoice table
$data = '<table border="0" cellspacing="0" cellpadding="1" style="width:100%">
        <thead>
            <tr>
                <td colspan="5">' . $left_column . '</td>
                <td colspan="2" align="right">' . $right_column . '</td>
            </tr>
            <tr height="30">
                <td colspan="7" style="text-align:center;"><h3 style="font-weight:400">INVOICE SUMMARY</h3></td>
            </tr>
            <tr>
                <td colspan="2" style="width:226px">&nbsp;Before Tax Total : $' . $beforeTaxAmountShow . '</td>
                <td colspan="2" align="center" style="width:145px">Tax Rate : ' . $invoiceTaxRate . '</td>
                <td style="width:130px" align="center">Tax : $' . $invoiceTaxAmountShow . '</td>
                <td colspan="2" style="width:215px" align="right">After Tax Total : $' . $afterTaxAmountShow . '&nbsp;</td>
            </tr>
            <tr style="line-height: 50%">
                <td colspan="7"></td>
            </tr>
        </thead>
        <tbody>';

// foreach ($items as $item) {
//     $totalQty = 0;
    
//     // Calculate total quantity for this item
//     foreach ($item['transactions'] as $transaction) {
//         $totalQty += $transaction['quantity'];
//     }
    
//     $data .= '<tr><td colspan="7"><b>Item :</b> ' . $item['item_name'] . '</td></tr>
//              <tr><td colspan="7"><b>Delivered To :</b> ' . $item['address'] . '</td></tr>';

//     // Add each transaction
//     foreach ($item['transactions'] as $transaction) {
//         $data .= '<tr>
//                     <td style="width:110px">' . $transaction['date'] . '</td>
//                     <td style="width:110px;text-align:right">' . $transaction['quantity'] . '</td>
//                     <td style="width:110px">' . $transaction['unit'] . '</td>
//                     <td style="width:130px">TKT # ' . $transaction['ticket_no'] . '</td>
//                     <td style="width:80px">' . $transaction['po_box'] . '</td>
//                     <td colspan="2" style="width:175px">' . $transaction['general_comments'] . '</td>
//                 </tr>';
//     }
    
//     $priceShow = number_format($item['price'], 4);
//     $totalQtyShow = number_format($totalQty, 2);
//     $totalPrice = number_format($totalQty * $item['price'], 2);
    
//     $data .= '<tr>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;"></td>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;" align="right">' . $totalQtyShow . '</td>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @</td>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;">$ &nbsp;&nbsp; ' . $priceShow . '</td>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;"></td>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;">Subtotal :</td>
//                 <td style="border-top:1px solid #000;border-bottom:1px solid #000;text-align:right;">$' . $totalPrice . '</td>
//             </tr>';
// }

$data .= '</tbody></table>';

$pdf->writeHTML($data, true, false, true, false, '');

// Add totals section
// $data = '<table border="0" style="width:100%;text-align:right;">
//             <tr>
//                 <td style="width:60%">Before Tax Total : </td>
//                 <td style="width:40%">$' . $beforeTaxAmountShow . '</td>
//             </tr>
//             <tr>
//                 <td>Tax : </td>
//                 <td>$' . $invoiceTaxAmountShow . '</td>
//             </tr>
//             <tr>
//                 <td>After Tax Total : </td>
//                 <td>$' . $afterTaxAmountShow . '</td>
//             </tr>
//         </table>';

// $pdf->writeHTML($data, true, false, true, false, '');

// Output the PDF
$pdf->Output($filename, 'I');