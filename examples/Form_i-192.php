<?php
require_once( 'config.php' );

//* $allDataCountry = indexByQueryAlldata( 'SELECT * FROM countries' );

//* Include the main TCPDF library ( search for installation path ).
require_once( 'tcpdf_include.php' );

//* Extend the TCPDF class to create custom Header and Footer

class MyPDF extends TCPDF {

    //*Page header

    public function Header() {
        $this->SetY( 13 );
        if ( $this->page > 1 ) {

            $this->SetLineWidth( 2 );
            //* set border width
            //* $this->SetDrawColor( 0, 0, 0 );
            //* set color for cell border
            $this->SetFillColor( 255, 255, 255 );
            //* set filling color
            $this->MultiCell( 0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C' );

            $this->SetLineWidth( 0.1 );
            //* set border width
            //* $this->SetDrawColor( 0, 0, 0 );
            //* set color for cell border
            $this->SetFillColor( 255, 255, 255 );
            //* set filling color
            $this->MultiCell( 191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C' );

        }

    }

    //* Page footer

    public function Footer() {
        //* Position at 15 mm from bottom
        $this->SetY( -15 );

        $header_top_border = array(
            'B' => array( 'width' => 0.5, 'color' => array( 0, 0, 0 ), 'dash' => 0, 'cap' => 'butt' ),
        );
        $this->Cell( 191.5, 4, '', $header_top_border, 1, 1 );

        //* Set font
        $this->SetFont( 'times', '', 9 );

        $this->Cell( 40, 6.4, 'Form I-192 Edition 07/20/21 ', 0, 0, 'L' );

        //* if ( $this->page == 1 ) {
        $barcode_image = "images/G-639-footer-pdf417-$this->page.png";
        //* )
        $this->Image( $barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );
        //* Footer Barcode PDF417

        //* $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0 );

        $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 157.5, 269, true );

    }
}

$pdf = new MyPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

//* set document information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( '' );
$pdf->SetTitle( 'Form I-192' );

//* set default header data
$pdf->SetHeaderData( PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING );

//* set header and footer fonts
$pdf->setHeaderFont( Array( PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN ) );
$pdf->setFooterFont( Array( PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA ) );

//* set default monospaced font
$pdf->SetDefaultMonospacedFont( PDF_FONT_MONOSPACED );

$pdf->SetMargins( 13.7, 15.3, 12.8, true );

//* set auto page breaks
$pdf->SetAutoPageBreak( TRUE, PDF_MARGIN_BOTTOM );

//* set image scale factor
$pdf->setImageScale( PDF_IMAGE_SCALE_RATIO );

//* add a page
$pdf->AddPage( 'P', 'LETTER' );
//* page number 1

//* set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array( 0, 0, 0 ),
    'bgcolor' => false, //*array( 255, 255, 255 )
    'module_width' => 2, //* width of a single module in points
    'module_height' => 1 //* height of a single module in points
);

//* Logo
$logo = 'homeland_security_logo.png';
$pdf->Image( $logo, 12, 9, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );

$pdf->Cell( 30, 5, '', 0, 0 );
$pdf->SetFont( 'times', 'B', 14 );
//* set font
$pdf->MultiCell( 120, 15, 'Application for Advance Permission to Enter 
', 0, 'C', 0, 1, 48, 6, true );
$pdf->SetFont( 'times', 'B', 14 );
//* set font
$pdf->MultiCell( 120, 15, 'as a Nonimmigrant 
', 0, 'C', 0, 1, 48, 11, true );

$pdf->SetFont( 'times', 'B', 11 );
//* set font
$pdf->setCellPaddings( 2, 4, 6, 0 );
//* set cell padding
$pdf->MultiCell( 30, 5, 'USCIS  Form I-192 ', 0, 'C', 0, 1, 174.5, 5.5, true );

$pdf->SetFont( 'times', 'B', 11 );
//* set font
$pdf->MultiCell( 80, 15, 'Department of Homeland Security', 0, 'C', 0, 1, 67, 13.3, true );

$pdf->SetFont( 'times', '', 10.8 );
//* set font
$pdf->MultiCell( 80, 15, 'U.S. Citizenship and Immigration Services', 0, 'C', 0, 1, 67, 18, true );

$pdf->SetFont( 'times', '', 9 );
//* set font
$pdf->setCellPaddings( 2, 1, 6, 0 );
//* set cell padding
$pdf->MultiCell( 40, 5, 'OMB No. 1615-0017 Expires 10/31/2023', 0, 'C', 0, 1, 169, 18.5, true );

$pdf->Ln( 1.3 );

$top_border = array(
    'T' => array( 'width' => 2, 'color' => array( 0, 0, 0 ), 'dash' => 0, 'cap' => 'square' ),
);
$pdf->Cell( 188.5, 0, '', $top_border, 1, 1 );
//*........
$pdf->setCellPaddings( 1, 1, 0, 1 );
//* set cell padding
$pdf->SetLineWidth( 0.1 );
//* set border width
$pdf->SetDrawColor( 0, 0, 0 );
//* set color for cell border
$pdf->SetFillColor( 255, 255, 255 );
//* set filling color
$pdf->setCellHeightRatio( 1.1 );
//* set cell height ratio
$pdf->MultiCell( 0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C' );

//*!..............<<< Page 1 >>>-----------------//*

/**
* ?<<<<<<< First Page Starts from Here >>>>>
*/

//*?..Table Start ..............
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 10 );
$html = "<div><b>For DHS Use Only</b></div>";
$pdf->writeHTMLCell(  190, 5, 13, 33, $html, 1, 0, true, false, 'C', true );
$pdf->SetFont( 'times', '', 9 );
$html = '<div><b>Received</b></div>';
$pdf->writeHTMLCell( 30, 5, 25, 39, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Trans. In</b></div>';
$pdf->writeHTMLCell( 30, 5, 25, 55, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Returned Trans. Out</b></div>';
$pdf->writeHTMLCell( 30, 5, 79, 39, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Completed</b></div>';
$pdf->writeHTMLCell( 30, 5, 79, 55, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Fee Stamp</b></div>';
$pdf->writeHTMLCell( 30, 5, 145, 39, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Action by the Department of Homeland Security</b></div>';
$pdf->writeHTMLCell( 90, 6, 58, 70.5, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Ground of Inadmissibility</b></div>';
$pdf->writeHTMLCell( 50, 6, 40, 75.5, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Action Stamp</b></div>';
$pdf->writeHTMLCell( 50, 6, 136, 75.5, $html, 0, 1, false, true, 'C', true );
$html = '<div><b>Benefits Category:</b></div>';
$pdf->writeHTMLCell( 50, 6, 109, 101, $html, 0, 1, false, true, 'C', true );
//*............
$pdf->writeHTMLCell( 1, 115, 12, 39, '', 'R', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 1, 32, 68, 39, '', 'R', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 1, 32, 120, 39, '', 'R', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 1, 115, 202, 39, '', 'R', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 190, 1, 13, 71, '', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 190, 1, 13, 75.5, '', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 190, 1, 13, 146, '', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 190, 1, 13, 154, '', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 108, 1, 13, 55.5, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 108, 1, 13,80.5, '', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 1, 69.5, 120, 75.5, '', 'R', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 82, 1, 121,102, '', 'T', 1, false, true, 'L', true );

//*............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,82, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,83, 'INA 212(a)(1)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,88.5, '', 'T', 1, false, true, 'L', true );
//*............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,90, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,91, 'INA 212(a)(2)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,97, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,99, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,100, 'INA 212(a)(3)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,106, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,108, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,109, 'INA 212(a)(4)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,115, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 2.7, 2.7, 15,117, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,118, 'INA 212(a)(6)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,124, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 2.7, 2.7, 15,126, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,127, 'INA 212(a)(7)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,133, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 2.7, 2.7, 15,134.5, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 15,135.5, 'INA 212(a)(8)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,142, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 68,82, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 68,83, 'INA 212(a)(9)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 72,88.5, '', 'T', 1, false, true, 'L', true );
//*............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 68,90, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 68,91, 'INA 212(a)(10)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 72,97, '', 'T', 1, false, true, 'L', true );
//*.............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 68,99, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 27, 7, 72,100, 'Other:', "", 1, false, true, 'L', true );
$pdf->writeHTMLCell( 35, 1, 81,102, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 68,107, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 50, 17, 72,106.7, 'Granted, subject to revocation at any time,
upon the following terms and conditions', "", 1, false, false, 'L', true );

//?.............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,107, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 77, 17, 126,106.7, 'Nonimmigrant other than T or U nonimmigrant/Advance Permission
under INA 212(d)(3)(A) and 8 CFR 212.4', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,114, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,113.7, 'T Nonimmigrant/Advance Permission under INA 212(d)(3) and
8 CFR 212.16', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,121, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,120.7, 'T Nonimmigrant/Waiver under INA 212(d)(13) and 8 CFR 212.16', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,128, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,127.7, 'U Nonimmigrant/Waiver under INA 212(d)(14) and 8 CFR 212.17 ', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,135, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 125.6,134.7, 'U Nonimmigrant/Advance Permission under INA 212(d)(3)(A) and
8 CFR 212.17', "", 1, false, false, 'L', true );

//..............

// $pdf->SetFont( 'times', '', 9 );
// $pdf->writeHTMLCell( 38, 7, 14,150, 'Date of Action (mm/dd/yyyy)', "", 1, false, false, 'L', false );
// $pdf->writeHTMLCell( 35, 1, 81,102, '', 'T', 1, false, true, 'L', true );
























































































$js = "
var fields = {

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',

'': ' ',



};
for (var fieldName in fields) {
    if (!fields.hasOwnProperty(fieldName)) continue;
    var field = getField(fieldName);
    if (field && field.value === '') {
        field.value = fields[fieldName];
    }
}

";

$pdf->IncludeJS( $js );

//* $pdf->lastPage();
//*Close and output PDF document
$pdf->Output( 'I-539.pdf', 'I' );