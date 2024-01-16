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

        $this->Cell( 40, 6.4, 'Form I-912 Edition 09/03/21 ', 0, 0, 'L' );

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
$pdf->SetTitle( 'Form I-918' );

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
$pdf->MultiCell( 120, 15, 'Request for Fee Waiver', 0, 'C', 0, 1, 48, 9, true );

$pdf->SetFont( 'times', 'B', 11 );
//* set font
$pdf->setCellPaddings( 2, 4, 6, 0 );
//* set cell padding
$pdf->MultiCell( 30, 5, 'USCIS  Form I-912', 0, 'C', 0, 1, 174.5, 5.5, true );

$pdf->SetFont( 'times', 'B', 11 );
//* set font
$pdf->MultiCell( 80, 15, 'Department of Homeland Security', 0, 'C', 0, 1, 67, 13, true );

$pdf->SetFont( 'times', '', 10.8 );
//* set font
$pdf->MultiCell( 80, 15, 'U.S. Citizenship and Immigration Services', 0, 'C', 0, 1, 67, 18, true );

$pdf->SetFont( 'times', '', 9 );
//* set font
$pdf->setCellPaddings( 2, 1, 6, 0 );
//* set cell padding
$pdf->MultiCell( 40, 5, 'OMB No. 1615-0116 Expires: 09/30/2024', 0, 'C', 0, 1, 169, 18.5, true );

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
$pdf->SetFont( 'times', 'B', 11 );
$pdf->writeHTMLCell( 190, 31, 13, 35, '',  1,  0, false, false, 'C', true );
$pdf->writeHTMLCell( 14, 30.6, 13.2, 35.2, '',  'R',  1, true, true, 'L', true );
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell( 14, 30, 13, 41, $html, 0, 1, false, true, 'C', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 175.8, 7, 27.2,10, '',  "B",  0, false, false, '', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>Application Receipted At </b>(Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell( 175, 5, 28, 35, $html, 0, 1, false, true, 'C', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 1.5, 24,113.5, 42, '', 'R', 1, false, true, 'L', true );
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3, 3, 52.5, 43.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->setCellHeightRatio( 1.2 );
$pdf->SetFont( 'times', 'B', 10 );
$pdf->writeHTMLCell( 88, 10, 27, 42, 'USCIS Field Office ', '', 1, false, true, 'C', true );
//*....................
$pdf->writeHTMLCell(3, 3, 52.5, 43.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->setCellHeightRatio( 1.2 );
$pdf->SetFont( 'times', 'B', 10 );
$pdf->writeHTMLCell( 88, 10, 27, 42, 'Fee Waiver Approved ', '', 1, false, true, 'C', true );
// $pdf->writeHTMLCell( 1, 47, 140, 35, '', 'R', 1, false, true, 'L', true );
// $pdf->SetFont( 'times', 'B', 9 );
// $pdf->writeHTMLCell( 20, 5, 100, 35, 'Receipt', 0, 1, false, true, 'L', true );
// $pdf->writeHTMLCell( 20, 5, 163, 35, 'Action Block', 0, 1, false, true, 'L', true );
// $pdf->writeHTMLCell( 21, 19, 26, 66, ' U.S. &nbsp; <br> Embassy &nbsp; <br>Consulate', '', 1, false, true, 'C', true );
// $pdf->SetFont( 'times', '', 9 );
// $pdf->writeHTMLCell( 43, 5, 46, 62.5, '<b> Validity Dates </b> (mm/dd/yyyy)', 'B', 1, false, true, 'L', true );
// $html = '<div><b> From : </b>  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; / &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  /     </div>';
// $pdf->writeHTMLCell( 28, 1, 58, 68, '', 'B', 1, false, true, 'L', true );
// $pdf->writeHTMLCell( 43, 6, 46, 69, $html, 'B', 1, false, true, 'L', true );
// $html = '<div><b> To : </b>  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; / &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  /     </div>';
// $pdf->writeHTMLCell( 30, 1, 54, 74.5, '', 'B', 1, false, true, 'L', true );
// $pdf->writeHTMLCell( 43, 5, 46, 75.5, $html, '', 1, false, true, 'L', true );

// $pdf->writeHTMLCell( 43, 19, 46, 63, '', 'LR', 1, false, true, 'L', true );
// $pdf->writeHTMLCell( 47, 5, 88.5, 62.5, '<b> Wait Listed', '', 1, false, true, 'L', true );
// $pdf->SetFont( 'times', '', 8 );
// $pdf->writeHTMLCell( 23, 3, 89, 77, 'Stamp Number', 'T', 1, false, true, 'L', true );
// $pdf->writeHTMLCell( 25.5, 3, 115.5, 77, 'Date (mm/dd/yyyy)', 'T', 1, false, true, 'L', true );
//*?..Table End......

// //*?second Table Start ....

// $pdf->writeHTMLCell ( 190, 18, 13, 83.5, '', 1, 1, false, true, 'C', true );

// $pdf->writeHTMLCell( 40, 17.7, 13.1, 83.6, '', 'R', 1, true, true, 'C', true );

// $pdf->SetFont( 'times', '', 10 );
// $html = '<div><b>To be completed by an attorney or accredited representative</b> (if any).  </div>';
// $pdf->writeHTMLCell( 40, 7, 15, 85, $html,  0,  1, false, true, 'L', false );

// $pdf->SetFont( 'times', '', 12 );
// $html = '<div><b>  </b>   <input type="checkbox" name="table_2_CheckBox" value="Y" checked=" " /> </div>';
// $pdf->writeHTMLCell( 40, 15, 20, 83.5, $html, 0, 1, false, true, 'R', true );

// $pdf->SetFont( 'times', '', 10 );
// $html = '<div><b>Select this box if <br>Form G-28 is <br>attached.</b></div>';
// $pdf->writeHTMLCell( 40, 15, 61, 84.4, $html, 0, 1, false, true, 'L', true );

// $pdf->writeHTMLCell( 48, 18, 94, 83.5, '',  'L',  1, false, true, 'L', true );

// $pdf->writeHTMLCell( 48, 18, 143.7, 83.5, '',  'L',  1, false, true, 'L', true );

// $pdf->SetFont( 'times', '', 10 );
// $html = '<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
// $pdf->writeHTMLCell( 50, 15, 94.9, 83.6, $html, 0, 1, false, true, 'L', true );

// $pdf->SetFont( 'courier', 'B', 10 );
// $pdf->TextField( 'attorney_state_bar_number', 46, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 96, 93.4 );

// $pdf->SetFont( 'times', '', 9.7 );
// $html = '<div><b>Attorney or According Representative USCIS Online Account Number</b> (if any)</div>';
// $pdf->writeHTMLCell( 60, 15, 143.7, 83.5, $html, 0, 1, false, true, 'L', true );

// $pdf->SetFont( 'courier', 'B', 10 );
// $pdf->TextField( 'Attorney_or_According_Representative', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 93.4 );

// //*? <<< second Table End >>>.....


$js = "
var fields = {
'':' ',







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