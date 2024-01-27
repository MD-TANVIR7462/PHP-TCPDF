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

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 68,99, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8);
$html = '<div><b>Date of Action</b> (mm/dd/yyyy)_______________________</div>';
$pdf->writeHTMLCell( 95, 7, 14,149, $html,0, 1, false, true, 'L', true );
/////////..................
$html = '<div><b>DD or OIC</b>_____________________________</div>';
$pdf->writeHTMLCell( 95, 7, 86,149, $html,0, 1, false, true, 'L', true );
/////////..................
$html = '<div><b>Office</b>________________________________</div>';
$pdf->writeHTMLCell( 95, 7, 146,149, $html,0, 1, false, true, 'L', true );

//?!st table done.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 9.6); 
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 1, 0, 0); 
$html ='<div><b>To be completed by an attorney or accredited representative</b> (if any).</div>';
$pdf->writeHTMLCell(190, 7, 13, 156.5, $html, 1, 1, true, true, 'C', true);
//..........
$pdf->SetFont('times', 'B', 9.6);
$pdf->writeHTMLCell(37, 20, 13, 163.5, "", 'LRB', 0, false, true, 'L', true);
$html ='<div> <input type="checkbox" name="agree" value="1" checked=" " />&nbsp; Select this box if<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Form G-28 or<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Form G-28I is<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;attached.</div>';
$pdf->writeHTMLCell(37, 5, 15, 164.5,$html, '', 0, false, true, 'L', true);
// //........
$pdf->SetFont('times', '', 9.6);
$pdf->setCellHeightRatio(1.2);
$html ='<div><b> Volag Number </b> <br>  (if any)</div>';
$pdf->writeHTMLCell(37, 20, 50, 163.5, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 9.6);
$pdf->TextField('volga_number', 33, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),52, 173.4);
// //...............
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 20, 87, 163.5, $html, 'RB', 0, false, true, 'L', true);
// $pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_statebar_number', 43, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),88, 173.4);
// //.............
$pdf->SetFont('times', '', 10);
$html ='<div> <b>&nbsp;&nbsp;&nbsp;Attorney or Accredited Representative<br>
&nbsp;&nbsp;&nbsp;USCIS Online Account Number </b> (if any) <br> </div>';
$pdf->writeHTMLCell(71, 20, 132, 163.5, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_number', 65, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),135, 173.4);

//..............table end .........

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 183.6, true);
$pdf->SetFont('times', '', 10); // set font

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 182.7, false); // angle 1
$pdf->StopTransform();

//...............
$pdf->SetFont('times', '', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 1. Application Type</b></div>';
$pdf->writeHTMLCell(86, 7, 13, 190, $html, 1, 1, true, false, 'L', false);

$pdf->SetFont('times', '', 9.6);
$html ='<div>I am applying to the Secretary of Homeland Security for
permission to enter the United States temporarily under the
provisions of the Immigration and Nationality Act (INA)<br>
section 212(d)(3)(A)(ii), section 212(d)(13), or section
212(d)(14).</div>';
$pdf->writeHTMLCell(90, 5, 12, 196.5,$html, '', 0, false, true, 'L', true);

//.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div>I am seeking this permission so that I may obtain (select <b>only
one</b> box):</div>';
$pdf->writeHTMLCell( 90, 5, 12, 218, $html, 0, 1, false, true, 'L', true );
//..............
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>1.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 228, $html, 0, 1, false, false, 'J', true );
$html = '<div><input type="checkbox" name="part-1_1" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 228.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>Admission as a nonimmigrant (other than as a T or U
nonimmigrant). </div>';
$pdf->writeHTMLCell( 100, 5, 24, 228, $html, 0, 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>2.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 238, $html, 0, 1, false, false, 'J', true );
$html = '<div><input type="checkbox" name="part-1_2" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 238.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>Status as a victim of trafficking (T nonimmigrant<br>
status) or a victim of a crime (U nonimmigrant<br>status).

 </div>';
$pdf->writeHTMLCell( 100, 5, 24, 238, $html, 0, 1, false, true, 'L', true );
//...............
$pdf->SetFont('times', '', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 190, $html, 1, 1, true, false, 'L', false);
//...............
$pdf->SetFont('times', 'BI', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Your Full Name</b></div>';
$pdf->writeHTMLCell(90, 6, 113, 202, $html, "", 1, true, false, 'L', false);


//................
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 209, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_1a_legal_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 211);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 219, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_1b_legal_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 221);
// //.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 231, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_1c_legal_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 231);
//!page 1 complete and page 2 starting from here..........................

$pdf->AddPage( 'P', 'LETTER' );//?page 2 ..............
//...............
$pdf->SetFont('times', '', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', false);
//...............
$pdf->SetFont('times', 'I', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Other Names Used</b> (if any)</div>';
$pdf->writeHTMLCell(90, 6, 13, 29, $html, "", 1, true, false, 'L', false);

//........
$pdf->SetFont('times', '', 9.6);
$html ='<div>Provide all other names you have ever used, including aliases,
maiden name, and nicknames. If you need extra space to
complete this section, use the space provided in <b>Part 8.</b> 
<b>Additional Information.</b>

</div>';
$pdf->writeHTMLCell(90, 5, 12, 35.5,$html, '', 0, false, true, 'L', true);
//.................





$pdf->SetFont('times', '', 10);
$html ='<div><b>2.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 53, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_2a_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 55.5);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 63, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_2b_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 65.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 73, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_2c_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 74.7);

//..........

$pdf->writeHTMLCell(91, 2, 12, 84, '', 'T', 1, false, false, 'J', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>3.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 84, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_3a_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 86);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 94, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_3b_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 95.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 104, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_3c_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 105);
//......

//.........
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b><i>Other Information</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 115.5, $html, 0, 1, true, false, 'L', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b> &nbsp;&nbsp; Alien Registration Number (A-Number) <i>(if any)</i></div>';
$pdf->writeHTMLCell(90, 7, 13, 122, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 37, 112.5, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('times', '', 10);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(30, 7, 45, 127.5, $html, 0, 1, false, false, 'L', true);
// //...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_4', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 128);
// //.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b> &nbsp;&nbsp; USCIS Online Account Number (if any) </div>';
$pdf->writeHTMLCell(90, 7, 13, 135, $html, 0, 1, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 30, 130, false); // angle 1
$pdf->StopTransform();

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_5', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 38, 141.5);
// //.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b> &nbsp;&nbsp; Date of Birth&nbsp;&nbsp;&nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 13, 150, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_6', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 151);

//............
$pdf->SetFont('times', '', 10);
$html= '<div><b>7. </b> Gender   &nbsp; &nbsp; <input type="checkbox" name="part2_7_male" value="y" checked=" " />Male  &nbsp; &nbsp;
<input type="checkbox" name="part2_7_female" value="n" checked=" " /> Female</div>';
$pdf->writeHTMLCell(90, 7, 13, 161, $html, '', 0, 0, true, 'L');
// //.........
$pdf->SetFont('times', '', 10);
$html= '<div>Place of Birth</div>';
$pdf->writeHTMLCell(90, 7, 13, 167, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a. </b>  &nbsp;  City or Town</div>';
$pdf->writeHTMLCell(90, 7, 13,172, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8a', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 177.8);

// //............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b. </b>  &nbsp;  State or Province</div>';
$pdf->writeHTMLCell(90, 7, 13, 184, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8b', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 189);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b>  &nbsp;  Country</div>';
$pdf->writeHTMLCell(90, 7, 13, 196, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8c', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 201);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b>  &nbsp; Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 13, 207.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_9', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 213.2);
//........



//?second column..............
//*..............
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 18, $html, '', 1, true, false, 'L', true );

//*...............................................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>10.a.</b> &nbsp; In Care Of Name (if any) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 26, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10a_careName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 32 );
//* //* //*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>10.b. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 39, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10b_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 40 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.c. </b> <input type="checkbox" name="P2_10b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="p2_10b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="p2_10b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 51, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10c_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 50 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 60, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10d_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 60 );
//* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>10.e.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>10.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 70.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part2_10e_state" size="0.25">';

foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 70, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_10f_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 70 );

//* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 80, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10g_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 80 );
//* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 90, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10h_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 90 );
//*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 98, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10i_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 104 );
//? //* //*.....

//*..............
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Safe Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 116, $html, '', 1, true, false, 'L', true );
//.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you are a T or U visa applicant, and do not want U.S.
Citizenship and Immigration Services (USCIS) to send notices
about this application to your home, you may provide a safe
mailing address </div>';
$pdf->writeHTMLCell( 90, 0, 112, 124, $html, '', 0, 0, true, 'L' );
//.........................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.a.</b> &nbsp; In Care Of Name (if any) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 141, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11a_careName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 146.5 );
//.........................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.b.</b> &nbsp; Organization Name (if applicable) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 153.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11b_organizationName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 158.5 );





//* //* //*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.c. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 167, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11c_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 167.5 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.d. </b> <input type="checkbox" name="P2_11d_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="P2_11d_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="P2_11d_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 177, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11d_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 176 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.e.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 185, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11e_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 185);
// //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>11.f.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>11.g.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 195.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// //* set font

$html = '<select name="part2_11f_state" size="0.25">';

$html .= '<option > As</option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 195, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_11g_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 194.5 );

// //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.h.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 204, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11h_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 204 );
// //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.i.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112,213, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11i_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,213 );
// //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.j.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 221, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11j_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 227 );

//? page 2 complete,..................................





























$pdf->AddPage('P', 'LETTER'); //page number 3
$pdf->SetFont('times', '', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 17, $html, 1, 1, true, false, 'L', false);
//...............
$pdf->SetFont('times', 'I', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Address History</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 26.7, $html, "", 1, true, false, 'L', false);

//........
$pdf->SetFont('times', '', 9.6);
$html ='<div>Provide physical addresses for everywhere you have lived
during the last five years, whether inside or outside the United
States. Provide your current address first. If you need extra
space to complete this section, use the space provided in <b>Part 8.
Additional Information.</b>
</div>';
$pdf->writeHTMLCell(90, 5, 12, 32.5,$html, '', 0, false, true, 'L', true);

//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 1 (current address)</div>';
$pdf->writeHTMLCell(90, 7, 12, 53.5, $html, '', 0, 0, true, 'L');

//.......................






$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>12.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 58, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12a_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 59.7 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>12.b. </b> <input type="checkbox" name="P2_12b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="P2_12b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="P2_12b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 12, 68, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12b_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 68 );

// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>12.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 77, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12c_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42.6, 77);
// // //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>12.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>12.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 86.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// // //* set font

$html = '<select name="part2_12d_state" size="0.25">';

$html .= '<option > As</option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 29.5, 86, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_12e_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 86 );

// // //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>12.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 95, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12f_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 95 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>12.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12,104, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12g_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44,104 );
// // //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>12.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 110, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12h_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 116 );



//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 12, 124, $html, '', 0, 0, true, 'L');

// //.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>13.a.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 12, 131.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_13a', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 74   , 131.5 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>13.b.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 12,141, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_13b', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),74   ,141.5 );

$pdf->writeHTMLCell( 91, 1, 13, 147,"" , 'B', 0, 0, true, 'L' );




//* //*Down section //*.....
//..............

$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 2 </div>';
$pdf->writeHTMLCell(90, 7, 12, 154, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>14.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 162, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14a_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 162.5 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>14.b. </b> <input type="checkbox" name="P2_14b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="P2_14b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="P2_14b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 12, 171, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14b_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 171 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>14.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 180, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14c_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42.6, 180);
// //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>14.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>14.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 190.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// //* set font

$html = '<select name="part2_14d_state" size="0.25">';

$html .= '<option > As</option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 29.5, 190, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_14e_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 190.5 );

// //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>14.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 199, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14f_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 199 );
// //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>14.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12,208, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14g_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44,208 );
// //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>14.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 216, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14h_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 221 );



//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 12, 229, $html, '', 0, 0, true, 'L');

//.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>15.a.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 12, 234.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_15a', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 74   , 234.5 );
// //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>15.b.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 12,243, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_15b', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),74   ,243.5 );



$pdf->writeHTMLCell( 91, 1, 13, 248,"" , 'B', 0, 0, true, 'L' );






//.......page 5 column 1 done........................

$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 3 </div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.c. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 24, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11c_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 25.7 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.d. </b> <input type="checkbox" name="P2_11d_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="P2_11d_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="P2_11d_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 34, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11d_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 34 );

// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.e.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 43, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11e_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 43);
// // //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>11.f.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>11.g.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 52.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// // //* set font

$html = '<select name="part2_11f_state" size="0.25">';

$html .= '<option > As</option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 52, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_11g_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170,52 );

// // //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.h.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 61, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11h_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 61 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.i.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112,70, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11i_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,70 );
// // //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.j.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 77, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11j_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 82 );



//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 112, 90, $html, '', 0, 0, true, 'L');

// //.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.h.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 97, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11h_province', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174   , 97 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.i.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112,106, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11i_Postal_Code', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),174   ,106.5 );


$pdf->writeHTMLCell( 91, 1, 113, 109,"" , 'B', 0, 0, true, 'L' );

//...................................................................



$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 4 </div>';
$pdf->writeHTMLCell(90, 7, 112, 117, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.c. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 124, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11c_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 125.7 );

 //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.d. </b> <input type="checkbox" name="P2_11d_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="P2_11d_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="P2_11d_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 134, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11d_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 134 );

// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.e.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 143, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11e_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 143);
// // //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>11.f.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>11.g.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 152.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// // //* set font

$html = '<select name="part2_11f_state" size="0.25">';

$html .= '<option > As</option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 152, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_11g_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170,152 );

// // //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.h.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 161, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11h_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 161 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.i.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112,170, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11i_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,170 );
// // //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.j.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112,177, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11j_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 182 );



//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, '', 0, 0, true, 'L');

// //.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.h.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 199, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11h_province', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174   , 199 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.i.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112,208, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11i_Postal_Code', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),174   ,208.5 );














































///.......................
//! 8th page start...........................................................>>>>>
$pdf->AddPage( 'P', 'LETTER' );
//*8th page.........................>>>
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 5. Applicant's Statement, Contact
Information, Declaration, Certification, and
Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 13, 17, $html, 1, 1, true, 'L' );
//*.................
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-192 <br>
Instructions before completing this section.</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 34, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Statement</i></b></div>";
$pdf->writeHTMLCell( 92, 6, 13, 43.7, $html, '', 1, true, false, 'L', true );
//*...................

$pdf->SetFont( 'times', '', 9.6 );
$html = "<div><b>NOTE:</b>  Select the box for either <b>Item Number 1.a.</b> or <b>1.b</b>. If
applicable, select the box for <b>Item Number 2</b>.
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 50, $html, '', 0, 0, true, 'L' );




//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$html = '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="part_5_1a" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 93, 12, 12, 59, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I can read and understand English, and I have read
and understand every question and instruction on this
application and my answer to every question.</div>';
$pdf->writeHTMLCell( 90, 12, 26, 59, $html, 0, 1, 0, true, 'L', false, false );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$html = '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="part_5_1b" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 73, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>The interpreter named in <b>Part 6.</b> read to me every <br>
question and instruction on this application and my   <br>
answer to every question in</div>';
$pdf->writeHTMLCell( 90, 5, 26, 73, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 89.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$pdf->writeHTMLCell( 76, 7, 26, 86, '', 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 91.9, $html, 0, 0, false, 'L' );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$html = '<div><b>2.  </b> &nbsp; <input type="checkbox" name="part_5_2" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 103, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>At my request, the preparer named in <b>Part 7.</b>,</div>';
$pdf->writeHTMLCell( 90, 5, 26, 103, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 110.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$pdf->writeHTMLCell( 76, 7, 26, 107.5, '', 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>prepared this application for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 114, $html, 0, 0, false, 'L' );

//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 127, $html, '', 1, true, false, 'L', true );

//*..................
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>3.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 134, $html, 0, 1, false, false, 'J', true );
$html = "<div>Applicant's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20, 134, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3_Telephone', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 139.5 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 146.5, $html, 0, 1, false, false, 'J', true );
$html = "<div>Applicant's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 146.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_4_Mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 153 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 160, $html, 0, 1, false, false, 'J', true );
$html = "<div>Applicant's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 160, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_5_Email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 167 );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Declaration and Certification</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 178, $html, '', 1, true, false, 'L', true );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Copies of any documents I have submitted are exact
photocopies of unaltered, original documents, and I understand
that the U.S. Department of Homeland Security (DHS) may
require that I submit original documents to DHS at a later date.
Furthermore, I authorize the release of any information from
any and all of my records that DHS may need to determine my
eligibility for the immigration benefit that I seek.
<br><br>
I furthermore authorize release of information contained in this
application, in supporting documents, and in my DHS records,
to other entities and persons where necessary for the
administration and enforcement of U.S. immigration law.
</div>';
$pdf->writeHTMLCell( 95, 10, 12.5, 186, $html, 0, 1, 0, true, 'L', false, false );

//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I understand that DHS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 17, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>1)</b>&nbsp;&nbsp; I reviewed and understood all of the information<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; contained in, and submitted with, my application; and
</div>';
$pdf->writeHTMLCell( 90, 10, 120, 38, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>2)</b> &nbsp;All of this information was complete, true, and correct <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; at the time of filing.
</div>';
$pdf->writeHTMLCell( 90, 10, 120, 50.5, $html, 0, 1, 0, true, 'L', false, false );


//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I certify, under penalty of perjury, that all of the information in
my application and any document submitted with it were
provided or authorized by me, that I reviewed and understand
all of the information contained in, and submitted with, my
application and that all of this information is complete, true,
and correct.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 63, $html, 0, 1, 0, true, 'L', false, false );

//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Signature</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 92, $html, '', 1, true, false, 'L', true );

//*......
$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>6.a. </b> &nbsp; Applicant's Signature</div>";
$pdf->writeHTMLCell( 92, 7, 112.5, 101, $html, 0, 1, false, 'L' );
//*.......
$pdf->writeHTMLCell( 82, 7, 122.5, 106, '', 1, 0, false, 'L' );
//.........

//*........
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 112.5, 116, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_6b_signature', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174, 116 );
//*.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE TO ALL APPLICANTS: </b>   If you do not completely fill
out this application or fail to submit required documents listed
in the Instructions, USCIS may deny your application.
<br><br>';
$pdf->writeHTMLCell( 95, 10, 112.5, 127, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 6. Interpreter's Contact Information,
Certification, and Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 112.5, 147, $html, 1, 1, true, 'L' );

//*.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Provide the following information about the interpreter.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 160, $html, 0, 1, 0, true, 'L', false, false );
//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 168, $html, '', 1, true, false, 'L', true );

//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5,177, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5,177, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1a_LastName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 183 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 190, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 190, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1b_FirstName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 196 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 204, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 204, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_2_BusinessName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 210 );
//*............ */





//!Page-9 starts from here......>>>>.
$pdf->AddPage( 'P', 'LETTER' );
//*9th page
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 6. Interpreter's Contact Information,
Certification, and Signature</b>(continued)</div>";
$pdf->writeHTMLCell( 92, 2, 12, 18, $html, 1, 1, true, 'L' );
//*..............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 31, $html, '', 1, true, false, 'L', true );

//*...............................................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>3.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 39, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3a_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 40 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.b. </b> <input type="checkbox" name="P6_3b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="p6_3b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="p6_3b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 12, 51, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3b_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 50 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 60, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3c_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42.6, 60 );
//* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 70.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part6_3d_state" size="0.25">';

$html .= '<option > As</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 29.5, 70, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part6_3e_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 70 );

//* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 80, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3f_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 80 );
//* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 90, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3g_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 90 );
//*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 98, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3h_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 104 );
//* //* //*.....

//*..............
$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 116, $html, '', 1, true, false, 'L', true );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 124, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 124, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_4_Telephone', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 129.4 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 137, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 137, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_5_Mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 142.5 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 150, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 150, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_6_Email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 155 );
//*............ */
$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Certification </i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 164, $html, '', 1, true, false, 'L', true );
//*............ */

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I certify, under penalty of perjury, that:<br>I am fluent in English and
</div>';
$pdf->writeHTMLCell( 95, 5, 12, 172, $html, 0, 1, 0, true, 'L', false, false );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_Certification', 50, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 53, 176.2 );
$pdf->SetFont( 'times', '', 9.9 );
$pdf->writeHTMLCell( 95, 5, 103, 178, ",", 0, 1, 0, true, 'L', false, false );
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div>which is the same language specified in <b>Part 5.</b>, <b>Item Number
1.b.</b>, and I have read to this applicant in the identified language
every question and instruction on this application and his or her
answer to every question. The applicant informed me that he or
she understands every instruction, question, and answer on the
application, including the <b>Applicant's Declaration and
Certification</b>, and has verified the accuracy of every answer.
</div>";
$pdf->writeHTMLCell( 95, 5, 12, 182, $html, 0, 1, 0, true, 'L', false, false );

//*............ */
$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Signature</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 213, $html, '', 1, true, false, 'L', true );
//*............ */

$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>7.a. </b> &nbsp; Interpreter's Signature </div>";
$pdf->writeHTMLCell( 92, 7, 12, 220, $html, 0, 1, false, 'L' );
//*.......
$pdf->writeHTMLCell( 82, 7, 21.8, 225, '', 1, 0, false, 'L' );
//*........
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 235, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_7b_signature', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 74, 234 );
//*.................

//?column 1 complete................>>.
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant</b></div>";
$pdf->writeHTMLCell( 92, 2, 112, 18, $html, 1, 1, true, 'L' );
//*...................
$pdf->SetFont( 'times', '', 10 );
$html = "<div>Provide the following information about the preparer.
</div>";
$pdf->writeHTMLCell( 95, 5, 111, 35, $html, 0, 1, 0, true, 'L', false, false );

//*/.............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112, 45, $html, '', 1, true, false, 'L', true );

//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 55, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 55, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_1a_LastName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 60 );
// //*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 67, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 67, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_1b_FirstName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 72 );
// //*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 79, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 79, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_2_BusinessName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 84 );
// //*............ */

$pdf->SetFont( 'times', '', 11.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 95, $html, '', 1, true, false, 'L', true );

//*...............................................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 103, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_3a_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 104 );

// //* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.b. </b> <input type="checkbox" name="P7_3b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="p7_3b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="p7_3b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 113, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_3b_apt_ste', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 112.5 );

// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 122, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_3c_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 121.5 );
// //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 132, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// //* set font

$html = '<select name="part7_3d_state" size="0.25">';

$html .= '<option > As</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value
$html .= '<option > Ts</option>';
//*Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 131, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part7_3e_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 131 );

// //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
// //* set font
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 142, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_3f_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 141 );
//* //*...............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 150, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_3g_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 150 );
//*........

$pdf->SetFont( 'times', '', 9.7 );

$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 156.4, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_3h_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 163 );
// //* //* //*.....

//*..............
$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 175, $html, '', 1, true, false, 'L', true );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 182, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 182, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_4_Telephone', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 187.7 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 195, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 195, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_5_Mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 200 );
// //*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 208, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 208, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_6_Email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 213 );
// //*............ */

// ! 10TH page..................................................................................>>>>>
$pdf->AddPage( 'P', 'LETTER' );
//*10th page

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant 
</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 19, $html, 1, 1, true, false, 'L', true);
//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 43, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.   </b>    <input type="checkbox" name="p7_7a_agree" value="Y" checked=" " /></div>';
$pdf->writeHTMLCell(90, 7, 12, 51, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am not an attorney or accredited representative but 
<br>have prepared this request on behalf of the requestor 
<br>and with the requestor\'s consent. </div>';
$pdf->writeHTMLCell(90, 7, 25, 51, $html, 0, 1, false, true, 'J', true);
//.........


$html = '<div><b>7.b.  </b> &nbsp; <input type="checkbox" name="p7_7b_agree" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 15, 12, 12, 64, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I am an attorney or accredited representative and my
representation of the applicant  in this  case <br>
&nbsp; &nbsp; &nbsp;extends &nbsp; &nbsp; &nbsp; &nbsp;does not extend beyond the <br> preparation of this application.</div>';
$pdf->writeHTMLCell( 90, 12, 25, 64, $html, 0, 1, 0, true, 'L', false, false );

$pdf->SetLineStyle( array( 'width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array( 0, 0, 0 ) ) );

$pdf->writeHTMLCell( 4, 4, 26, 72, '', 1, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 4, 4, 44, 72, '', 1, 1, 0, true, 'L', false, false );
//........
$html = '<div><b>NOTE: </b> If you are an attorney or accredited
representative, you may need to submit a completed
Form G-28, Notice of Entry of Appearance as
Attorney or Accredited Representative, or Form
G-28I, Notice of Entry of Appearance as Attorney In
Matters Outside the Geographical Confines of the
United States, with this application.</div>';
$pdf->writeHTMLCell( 80, 12, 25, 81, $html, 0, 1, 0, true, 'L', false, false );

//...........


$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 110, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ="<div>By my signature, I certify, under penalty of perjury, that I
prepared this application at the request of the applicant. The
applicant then reviewed this completed application and
informed me that he or she understands all of the information
contained in, and submitted with, his or her application,
including the <b>Applicant's Declaration and Certification</b>, and
that all of this information is complete, true, and correct. I
completed this application based only on information that the
applicant provided to me or authorized me to obtain or use.

</div>";
$pdf->writeHTMLCell(93, 7, 12, 118, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Signature</i></b></div>';
$pdf->writeHTMLCell(90, 7, 13, 160, $html, 0, 1, true, false, 'L', true);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.</b> &nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 168, $html, 0, 1, false, true, 'J', true);
//...........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 20, 173, "", 1, 1, false, true, 'C', true);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 183, $html, 0, 1, false, true, 'J', true);
//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part7_8b_signature', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 182);
//?........ page number 10 end .............

// ! 11TH page..................................................................................>>>>>
$pdf->AddPage( 'P', 'LETTER' );
$pdf->setFillColor( 220, 220, 220 );

$pdf->setFont( 'Times', 'B', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 0,0 ,0 , 0 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div>Part 8. Additional Information </div>';
$pdf->writeHTMLCell( 92, 7, 13, 18, $html, 1, 1, true, 'L' );
//........
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFont( 'Times', '', 10 );
$html = '<div>If you need extra space to provide any additional information
within this application, use the space below. If you need more
space than what is provided, you may make copies of this page
to complete and file with this application or attach a separate
sheet of paper. Type or print your name and A-Number (if any)
at the top of each sheet; indicate the <b>Page Number, Part
Number</b>, and <b>Item Number</b> to which your answer refers; and
sign and date each sheet.</div>';
$pdf->writeHTMLCell( 95, 10, 12, 26, $html, 0, 1, 0, true, 'L', false, false );
//...........
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell( 35, 7, 12, 61, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 60, 7, 45, 63, '', 1, 0, false, 'L' );
//........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell( 35, 7, 12, 71, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 60, 7, 45, 73, '', 1, 0, false, 'L' );
//.......
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell( 35, 7, 12, 81, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 60, 7, 45, 82, '', 1, 0, false, 'L' );
//.......

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>2. </b> &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell( 40, 7, 12, 91, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 45, 7, 60, 91, '', 1, 0, false, 'L' );
$pdf->StartTransform();
$pdf->Rotate( -31 );
$pdf->SetFont( 'zapfdingbats', '', 10 );
// symbol font
$pdf->writeHTMLCell( 40, 7, 58, 119, TCPDF_FONTS::unichr( 116 ), 0, 0, false, 'L' );
$pdf->StopTransform();
$pdf->setFont( 'Times', '', 12 );
$html = '<div><b>A-</b></div>';
$pdf->writeHTMLCell( 7, 7, 54, 91, $html, 0, 0, false, 'L' );
//............

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>3.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell( 30, 7, 12, 102, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_3a', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 107.5 );
//.....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>3.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell( 30, 7, 43, 102, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_3b', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 50, 107.5 );

//......

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>3.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell( 30, 7, 75, 102, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_3c', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 83, 107.5 );
//............
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 12, 116, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );

$html = <<<EOD
<textarea cols = "20" rows = "15" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell( 90, 50, 20, 116, $html, 0, 0, false, 'L' );

//....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>4.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell( 30, 7, 12, 182, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_4a', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 188 );
//.....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>4.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell( 30, 7, 43, 182, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_4b', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 50, 188 );

//......

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>4.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell( 30, 7, 75, 182, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_4c', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 83, 188 );
//.........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>4.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 12, 197, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );

$html = <<<EOD
<textarea cols = "20" rows = "15" name = "additional_information_4d">

</textarea>
EOD;
$pdf->writeHTMLCell( 90, 50, 20, 197, $html, 0, 0, false, 'L' );

//........end left
// ....... start right side

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>5.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell( 30, 7, 112, 17, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_5a', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 23 );
//.....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>5.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell( 30, 7, 145, 17, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_5b', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 152, 23 );

//......

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell( 30, 7, 175, 17, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_5c', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 182, 23 );
//.........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 112, 33, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );

$html = <<<EOD
<textarea cols = "20" rows = "15" name = "additional_information_5d">

</textarea>
EOD;
$pdf->writeHTMLCell( 90, 50, 119, 32, $html, 0, 0, false, 'L' );

//.....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell( 30, 7, 112, 98, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_6a', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 104 );
//.....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell( 30, 7, 145, 98, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_6b', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 152, 104 );

//......

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell( 30, 7, 175, 98, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_6c', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 182, 104 );
//.........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 112, 114, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );

$html = <<<EOD
<textarea cols = "20" rows = "15" name = "additional_information_6d">

</textarea>
EOD;
$pdf->writeHTMLCell( 90, 50, 119, 114, $html, 0, 0, false, 'L' );

//..........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>7.a. </b>&nbsp;Page Number </div>';
$pdf->writeHTMLCell( 30, 7, 112, 180, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_7a', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 186.5 );
//.....

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>7.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell( 30, 7, 145, 180, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_7b', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 152, 186.5 );

//......

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>7.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell( 30, 7, 175, 180, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'additional_information_7c', 22, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 183, 186.5 );
//.........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 112, 198, $html, 0, 0, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );

$html = <<<EOD
<textarea cols = "20" rows = "15" name = "additional_information_7d">

</textarea>
EOD;
$pdf->writeHTMLCell( 90, 7, 119, 198, $html, 0, 0, false, 'L' );

































































$js = "
var fields = {

'part-1_2': ' ',

'part-1_1': ' ',
    
'attorney_uscis_online_number': ' ',

'attorney_statebar_number': ' ',

'volga_number': ' ',

'part2_1c_legal_middlename': ' ',

'part2_1b_legal_firstname': ' ',

'part2_1a_legal_lastname': ' ',

'part2_2b_firstname': ' ',

'part2_2c_middlename': ' ',

'part2_2a_lastname': ' ',

'part2_3b_firstname': ' ',

'part2_3c_middlename': ' ',

'part2_3a_lastname': ' ',

'part2_4': ' ',
'part2_5': ' ',
'part2_6': ' ',
'part2_7_male': ' ',
'part2_7_female': ' ',
'part2_8a': ' ',
'part2_8b': ' ',
'part2_8c': ' ',
'part2_9': ' ',

'part2_10a_careName': ' ',

'part2_10b_street_number': ' ',

'part2_10c_apt_ste': ' ',

'part2_10d_city_town': ' ',

'part2_10e_state': ' ',

'part2_10f_zip_code': ' ',

'part2_10g_province': ' ',

'part2_10h_Postal_Code': ' ',

'part2_10i_Country': ' ',

'p2_10b_Ste': ' ',

'p2_10b_Flr': ' ',

'P2_10b_Apt': ' ',

'part2_11a_careName': ' ',

'part2_11b_organizationName': ' ',

'part2_11c_street_number': ' ',

'part2_11d_apt_ste': ' ',

'part2_11e_city_town': ' ',

'part2_11f_state': ' ',

'part2_11g_zip_code': ' ',

'part2_11h_province': ' ',

'part2_11i_Postal_Code': ' ',

'part2_11j_Country': ' ',

'P2_11d_Flr': ' ',

'P2_11d_Ste': ' ',

'P2_11d_Apt': ' ',


'part2_12a_street_number': ' ',
'part2_12b_apt_ste': ' ',
'part2_12c_city_town':' ',
'part2_12d_state': ' ',
'part2_12e_zip_code': ' ',
'part2_12f_province': ' ',
'part2_12g_Postal_Code': ' ',
'part2_12h_Country': ' ',
'part2_13a': ' ',
'part2_13b': ' ',
'P2_12b_Apt': ' ',
'P2_12b_Ste': ' ',
'P2_12b_Flr': ' ',


'part2_14a_street_number': ' ',
'part2_14b_apt_ste': ' ',
'part2_14c_city_town':' ',
'part2_14d_state': ' ',
'part2_14e_zip_code': ' ',
'part2_14f_province': ' ',
'part2_14g_Postal_Code': ' ',
'part2_14h_Country': ' ',
'part2_15a': ' ',
'part2_15b': ' ',
'P2_14b_Apt': ' ',
'P2_14b_Ste': ' ',
'P2_14b_Flr': ' ',
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





















//*page 8
'part_5_1a':' ',
'part_5_1b':' ',
'part_5_2':' ',
'part5_3_Telephone':' ',
'part5_4_Mobile':' ',
'part5_5_Email':' ',
'part5_6b_signature':' ',
'part6_1a_LastName':' ',
'part6_1b_FirstName':' ',
'part6_2_BusinessName':' ',
//*page 9
'part6_3a_street_number':' ',

'part6_3b_apt_ste':' ',

'P6_3b_Apt':' ',

'p6_3b_Ste':' ',

'p6_3b_Flr':' ',

'part6_3c_city_town':' ',

'part6_3d_state':' ',

'part6_3e_zip_code':' ',

'part6_3f_province':' ',

'part6_3g_Postal_Code':' ',

'part6_3h_Country':' ',

'part6_4_Telephone':' ',

'part6_5_Mobile':' ',

'part6_6_Email':' ',

'part6_Certification':' ',

'part6_7b_signature':' ',

'part7_3a_street_number':' ',


'part7_3b_apt_ste':' ',

'P7_3b_Apt':' ',

'p7_3b_Ste':' ',

'p6_3b_Flr':' ',

'part7_3c_city_town':' ',

'part7_3d_state':' ',

'part7_3e_zip_code':' ',

'part7_3f_province':' ',

'part7_3g_Postal_Code':' ',

'part7_3h_Country':' ',

'part7_4_Telephone':' ',

'part7_5_Mobile':' ',

'part7_6_Email':' ',

'part7_1a_LastName':' ',

'part7_1b_FirstName':' ',

'part7_2_BusinessName':' ',

//*page 10
'part7_8b_signature':' ',
'p7_7a_agree':' ',
'p7_7b_agree':' ',

//*page 11

'additional_information_3a':' ',
'additional_information_3b':' ',
'additional_information_3c':' ',
'additional_information_3d':' ',
'additional_information_4a':' ',
'additional_information_4b':' ',
'additional_information_4c':' ',
'additional_information_4d':' ',
'additional_information_5a':' ',
'additional_information_5b':' ',
'additional_information_5c':' ',
'additional_information_5d':' ',
'additional_information_6a':' ',
'additional_information_6b':' ',
'additional_information_6c':' ',
'additional_information_6d':' ',
'additional_information_7a':' ',
'additional_information_7b':' ',
'additional_information_7c':' ',
'additional_information_7d':' ',




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