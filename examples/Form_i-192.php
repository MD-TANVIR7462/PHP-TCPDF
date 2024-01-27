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

$pdf->AddPage( 'P', 'LETTER' );
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
$pdf->TextField('information_about_you_alien_registration', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 53, 128);
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
$pdf->TextField('information_about_you_us_social_number', 65, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 38, 141.5);
// //.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b> &nbsp;&nbsp; Date of Birth&nbsp;&nbsp;&nbsp; (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 13, 150, $html, 0, 1, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_date_of_birth', 37, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 66, 151);

//............
$pdf->SetFont('times', '', 10);
$html= '<div><b>9. </b> Gender   &nbsp; &nbsp; <input type="checkbox" name="G" value="y" checked=" " />Male  &nbsp; &nbsp;
<input type="checkbox" name="G" value="n" checked=" " /> Female</div>';
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
$pdf->TextField('information_about_you_city_town_birth', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 177.8);

// //............

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b. </b>  &nbsp;  State or Province</div>';
$pdf->writeHTMLCell(90, 7, 13, 184, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_birth', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 189);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b>  &nbsp;  Country</div>';
$pdf->writeHTMLCell(90, 7, 13, 196, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_current_country', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 201);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b>  &nbsp; Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 13, 207.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('information_about_you_country_of_citizenship', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 213.2);
//........










///.......................
//! 8th page start...........................................................>>>>>
$pdf->AddPage( 'P', 'LETTER' );
//*8th page.........................>>>
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 5. Petitioner's Statement, Contact
Information, Declaration, and Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 13, 18, $html, 1, 1, true, 'L' );
//*.................
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-918 <br>
Instructions before completing this part</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 28, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Statement</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 13, 38, $html, '', 1, true, false, 'L', true );
//*...................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>NOTE:</b> Select the box for either <b>1.a.</b> or <b>1.b.</b> If applicable,
select the box for <b>2</b>.</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 46, $html, '', 0, 0, true, 'L' );




//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$html = '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="part_5_1a" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 93, 12, 12, 56, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I can read and understand English, and I have read <br>
and understand every question and instruction on <br>
this petition and my answer to every question.</div>';
$pdf->writeHTMLCell( 90, 12, 26, 56, $html, 0, 1, 0, true, 'L', false, false );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$html = '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="part_5_1b" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 70, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>The interpreter named in <b>Part 6.</b> read to me every <br>
question and instruction on this petition and my answer  <br>
to every question in</div>';
$pdf->writeHTMLCell( 90, 5, 26, 70, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 86.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$pdf->writeHTMLCell( 76, 7, 26, 83, '', 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 88.6, $html, 0, 0, false, 'L' );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$html = '<div><b>2.  </b> &nbsp; <input type="checkbox" name="part_5_2" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 100, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>At my request, the preparer named in <b>Part 7.</b>,</div>';
$pdf->writeHTMLCell( 90, 5, 26, 100, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 107.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$pdf->writeHTMLCell( 76, 7, 26, 104.5, '', 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>prepared this petition for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 111, $html, 0, 0, false, 'L' );

//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 125, $html, '', 1, true, false, 'L', true );

//*..................
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>3.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 133, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20, 133, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3_Telephone', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 139 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 146.5, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 146.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_4_Mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 153 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 160, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Email Address (if any)</div>";
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
that USCIS may require that I submit original documents to
USCIS at a later date. Furthermore, I authorize the release of
any information from any of my records that USCIS may need
to determine my eligibility for the immigration benefit I seek.
<br><br>
I further authorize release of information contained in this
petition, in supporting documents, and in my USCIS records to
other entities and persons where necessary for the
administration and enforcement of U.S. immigration laws.
</div>';
$pdf->writeHTMLCell( 95, 10, 12.5, 186, $html, 0, 1, 0, true, 'L', false, false );

//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I understand that USCIS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 17, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>1)</b>&nbsp;&nbsp; I provided or authorized all of the information<br>
 contained in, and submitted with, my petition; 
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 38, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>2)</b>&nbsp;&nbsp; I reviewed and understood all of the information in,<br>
 and submitted with, my petition; and
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 46.5, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>3)</b>&nbsp;&nbsp; All of this information was complete, true, and<br>
 correct at the time of filing.
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 54.5, $html, 0, 1, 0, true, 'L', false, false );

//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I certify, under penalty of perjury, that all of the information in
my petition and any document submitted with it were provided
or authorized by me, that I reviewed and understand all of the
information contained in, and submitted with, my petition, and
that all of this information is complete, true, and correct.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 66, $html, 0, 1, 0, true, 'L', false, false );

//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Signature</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 92, $html, '', 1, true, false, 'L', true );

//*......
$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>6.a. </b> &nbsp; Petitioner's Signature</div>";
$pdf->writeHTMLCell( 92, 7, 112.5, 101, $html, 0, 1, false, 'L' );
//*.......
$pdf->writeHTMLCell( 82, 7, 122.5, 106, '', 1, 0, false, 'L' );
//.........
$pdf->SetFont( 'zapfdingbats', '', 22 );
// symbol font
$pdf->writeHTMLCell( 82, 7, 112.5, 105, TCPDF_FONTS::unichr( 225 ), 0, 0, false, 'L' );
//*........
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 112.5, 116, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_6b_signature', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174, 116 );
//*.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE TO ALL PETITIONERS:</b> If you do not completely
fill out this petition or fail to submit required documents listed
in the Instructions, USCIS may deny your petition.
<br><br>
<b>NOTE:</b> A parent or legal guardian may sign for a person who
is less than 14 years of age. A legal guardian may sign for a
mentally incompetent person.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 125, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 6. Interpreter's Contact Information,
Certification, and Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 112.5, 162, $html, 1, 1, true, 'L' );

//*.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Provide the following information about the interpreter.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 175, $html, 0, 1, 0, true, 'L', false, false );
//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 182, $html, '', 1, true, false, 'L', true );

//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 192, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 192, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1a_LastName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 198 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 205, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 205, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1b_FirstName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 211 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 218, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 218, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_2_BusinessName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 224 );
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
$pdf->TextField( 'part6_Certification', 43, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 53, 176.2 );

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div>which is the same language specified in <b>Part 5., 1.b.</b>, and I have <br>
read to this petitioner in the identified language every question<br>
and instruction on this petition and his or her answer to every<br>
question. The petitioner informed me that he or she understands<br>
every instruction, question, and answer on the petition,
including the <b>Petitioner's Declaration and Certification</b>, and
has verified the accuracy of every answer.
</div>";
$pdf->writeHTMLCell( 95, 5, 12, 182, $html, 0, 1, 0, true, 'L', false, false );

//*............ */
$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Signature</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 213, $html, '', 1, true, false, 'L', true );
//*............ */

$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>7.a. </b> &nbsp; Interpreter's Signature (sign in ink)</div>";
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
Signature of the Person Preparing this Petition, if
Other Than the Petitioner</b></div>";
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

$pdf->setFillColor( 220, 220, 220 );

$pdf->setFont( 'Times', '', 12 );
$pdf->setCellHeightRatio( 1.2 );

$pdf->setFont( 'Times', 'BI', 12 );
$html = '<div>Preparer\'s Statement</div>';
$pdf->writeHTMLCell(91, 7, 13, 18,  $html,  0, 1, true, 'L');

//......
$pdf->setFont('Times','',10);
$pdf->setCellHeightRatio(1.2);
$pdf->setFontSpacing(0.05); // reset font spacing
$html= '<div><b>7.a.  </b> &nbsp;
<input type = "checkbox" name = "p7_7a_agree" value = "1" checked = " " /></div>';
$pdf->writeHTMLCell(15, 12, 12, 28, $html, 0, 1, 0, true, 'L', false, false);
$html= '<div>I am not an attorney or accredited representative but
have prepared this petition on behalf of the petitioner
and with the petitioner\'s consent.</div>';
$pdf->writeHTMLCell( 83, 12, 25, 28, $html, 0, 1, 0, true, 'L', false, false );
//..........

$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.04 );
// reset font spacing
$html = '<div><b>7.b.  </b> &nbsp; <input type="checkbox" name="p7_7b_agree" value="1" checked=" " /></div>';
$pdf->writeHTMLCell( 15, 12, 12, 44, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I am an attorney or accredited representative and my
representation of the petitioner  in this  case <br>
&nbsp; &nbsp; &nbsp; extends &nbsp; &nbsp; &nbsp;does not extend beyond the  preparation <br>of this petition.</div>';
$pdf->writeHTMLCell( 90, 12, 25, 44, $html, 0, 1, 0, true, 'L', false, false );

$pdf->SetLineStyle( array( 'width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array( 0, 0, 0 ) ) );

$pdf->writeHTMLCell( 4, 4, 26, 53, '', 1, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 4, 4, 43, 53, '', 1, 1, 0, true, 'L', false, false );
//........
$html = '<div><b>NOTE: </b> If you are an attorney or accredited
representative whose representation extends beyond
preparation of this petition, you may be obliged to
submit a completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited
Representative, with this petition.</div>';
$pdf->writeHTMLCell( 80, 12, 25, 65, $html, 0, 1, 0, true, 'L', false, false );
//.....
//...........
$pdf->setFillColor( 220, 220, 220 );

$pdf->setFont( 'Times', 'BI', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 1, 1, 1, 1 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div>Preparer\'s Certification </div>';
$pdf->writeHTMLCell(92, 7, 13, 98, $html, 0, 1, true, 'L');
//............
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= '<div>By my signature, I certify, under penalty of perjury, that I
prepared this petition at the request of the petitioner. The
petitioner then reviewed this completed petition and informed
me that he or she understands all of the information contained
in, and submitted with, his or her petition, including the
<b>Petitioner\'s Declaration and Certification</b>, and that all of this
information is complete, true, and correct. I completed this
petition based only on information that the petitioner provided
to me or authorized me to obtain or use.</div>';
$pdf->writeHTMLCell( 95, 25, 12, 107, $html, 0, 1, 0, true, 'L', false, false );
//.........

//...........
$pdf->setFillColor( 220, 220, 220 );

$pdf->setFont( 'Times', 'BI', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 1, 1, 1, 1 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div>Preparer\'s Signature </div>';
$pdf->writeHTMLCell(92, 7, 13, 150, $html, 0, 1, true, 'L');
//.....
$pdf->setFont('Times', '', 10);
$html= '<div><b>8.a. </b> &nbsp;
Preparer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 160, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 83, 7, 22, 166, '', 1, 0, false, 'L' );
$pdf->setFont( 'Times', '', 10 );
//.............
$html = '<div><b>8.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 177, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'part7_8b_signature', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 75, 177 );
//?........ page number 10 end .............

// ! 11TH page..................................................................................>>>>>
$pdf->AddPage( 'P', 'LETTER' );
//*11th page

$pdf->setFillColor( 220, 220, 220 );

$pdf->setFont( 'Times', 'B', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 1, 1, 1, 1 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div>Part 8. Additional Information </div>';
$pdf->writeHTMLCell( 92, 7, 13, 18, $html, 1, 1, true, 'L' );
//........
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFont( 'Times', '', 10 );
$html = '<div>If you need extra space to provide any additional information
within this petition, use the space below. If you need more space
than what is provided, you may make copies of this page to

complete and file with this petition or attach a separate sheet of
paper.  Include your name and A-Number (if any) at the
top of each sheet; indicate the<b>Page Number, Part Number,</b>
and <b>Item Number</b> to which your answer refers; and sign and
date each sheet.</div>';
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