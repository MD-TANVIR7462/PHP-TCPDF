<?php
require_once('formheader.php');

//* Include the main TCPDF library ( search for installation path ).
require_once( 'tcpdf_include.php' );

//* Extend the TCPDF class to create custom Header and Footer

class MyPDF extends TCPDF {


    // Page header
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

    // Page footer
    public function Footer() {
        //* Position at 15 mm from bottom
        $this->SetY( -15 );

        $header_top_border = array(
            'B' => array( 'width' => 0.5, 'color' => array( 0, 0, 0 ), 'dash' => 0, 'cap' => 'butt' ),
        );
        $this->Cell( 191.5, 4, '', $header_top_border, 1, 1 );

        //* Set font
        $this->SetFont( 'times', '', 9 );

        $this->Cell( 40, 6.4, 'Form I-192 Edition 04/01/24 ', 0, 0, 'L' );

        //* if ( $this->page == 1 ) {
        $barcode_image = "images/G-639-footer-pdf417-$this->page.png";
        //* )
        $this->Image( $barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );
        //* Footer Barcode PDF417
		
        $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 157.5, 269, true );
    }
}

$pdf = new MyPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

//* set document information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( '' );
$pdf->SetTitle('Form I-192, Application for Advance Permission to Enter 
as a Nonimmigrant');

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

/********************************
******** Start Page No 1 ********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );

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
$pdf->MultiCell( 40, 5, 'OMB No. 1615-0017 Expires 02/28/2026', 0, 'C', 0, 1, 169, 18.5, true );

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
$pdf->writeHTMLCell( 2.7, 2.7, 15,82.5, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,83.5, 'INA 212(a)(1)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,88.5, '', 'T', 1, false, true, 'L', true );
//*............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,90, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,91, 'INA 212(a)(2)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,96.5, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,98.5, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,99.5, 'INA 212(a)(3)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,105.3, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 15,107.5, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,108.5, 'INA 212(a)(4)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,114.1, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 2.7, 2.7, 15,116.5, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,117.5, 'INA 212(a)(6)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,123.1, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 2.7, 2.7, 15,125, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,126, 'INA 212(a)(7)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,131, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->writeHTMLCell( 2.7, 2.7, 15,133, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 15,134, 'INA 212(a)(8)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 19,139, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 65,82, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 65,83, 'INA 212(a)(9)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 72,88.5, '', 'T', 1, false, true, 'L', true );
//*............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 65,90, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 27, 7, 65,91, 'INA 212(a)(10)', "", 1, false, true, 'C', true );
$pdf->writeHTMLCell( 35, 1, 72,97, '', 'T', 1, false, true, 'L', true );
//*.............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 65,99, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.2 );
$pdf->writeHTMLCell( 27, 7, 69,100, 'Other:', "", 1, false, true, 'L', true );
$pdf->writeHTMLCell( 35, 1, 78,102, '', 'T', 1, false, true, 'L', true );
//*.............
$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 65,107, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.2 );
$pdf->writeHTMLCell( 50, 17, 69,106.7, 'Granted, subject to revocation at any time,
upon the following terms and conditions', "", 1, false, false, 'L', true );

//?.............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,107.5, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8.4 );
$pdf->writeHTMLCell( 77, 17, 126,106.7, 'T Nonimmigrant/Advance Permission under INA 212(d)(3) and
8 CFR 212.16', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,115, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,114.3, 'T Nonimmigrant/Waiver under INA 212(d)(13) and 8 CFR 212.16', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,122, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,121.3, 'U Nonimmigrant/Waiver under INA 212(d)(14) and 8 CFR 212.17', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,129, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,128.3, 'U Nonimmigrant/Advance Permission under INA 212(d)(3)(A) and
8 CFR 212.17', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,136, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 75, 17, 125.6,135.3, 'Nonimmigrant other than T or U nonimmigrant/Advance Permission
under INA 212(d)(3)(A) and 8 CFR 212.4', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);

$pdf->SetFont( 'times', '', 8);
$html = '<div><b>Date of Action</b> (mm/dd/yyyy)<b>_________________________</b></div>';
$pdf->writeHTMLCell( 95, 7, 14,149, $html,0, 1, false, true, 'L', true );
/////////..................
$html = '<div><b>DD or OIC</b><b>__________________________</b></div>';
$pdf->writeHTMLCell( 95, 7, 90,149, $html,0, 1, false, true, 'L', true );
/////////..................
$html = '<div><b>Office</b><b>___________________________</b></div>';
$pdf->writeHTMLCell( 95, 7, 153,149, $html,0, 1, false, true, 'L', true );

//?!st table done.............
$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 9.9); 
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(0, 1.2, 0, 0); 
$html ='<div><b>To be completed by an attorney or accredited representative</b> (if any).</div>';
$pdf->writeHTMLCell(190, 7, 13, 156.5, $html, 1, 1, true, true, 'C', true);
//..........
// $i_192_g28_check = (showData('i_192_select_g28')=='Y')? "checked":"";
$pdf->SetFont('times', 'B', 13);
$pdf->writeHTMLCell(37, 5, 15, 164.5, '<input type="checkbox" name="agree" value="1" checked="" />', '', 0, false, true, 'L', true);
$pdf->SetFont('times', 'B', 9.9);
$pdf->writeHTMLCell(37, 20, 13, 163.5, "", 'LRB', 0, false, true, 'L', true);
$html ='<div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Select this box if<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Form G-28 or<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Form G-28I is<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; attached.</div>';
$pdf->writeHTMLCell(37, 5, 15, 164.5,$html, '', 0, false, true, 'L', true);
// //........
$pdf->SetFont('times', '', 9.9);
$pdf->setCellHeightRatio(1.2);
$html ='<div><b>&nbsp; Volag Number </b> <br>  (if any)</div>';
$pdf->writeHTMLCell(37, 20, 50, 163.5, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 9.6);
$pdf->TextField('volga_number', 33, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),52, 173.4);
// //...............
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 20, 87, 163.5, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
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
$pdf->setCellPaddings(1, 1, 1, 0); 
$html ='<div><b>Part 1. Application Type</b></div>';
$pdf->writeHTMLCell(190, 5.7, 13, 191, $html, 1, 1, true, false, 'L', false);
//......................
$pdf->SetFont('times', '', 9.6);
$html ='<div>I am applying to the Secretary of Homeland Security for permission to enter the United States temporarily under the provisions of the
Immigration and Nationality Act (INA) section 212(d)(3)(A)(ii), 212(d)(13), or 212(d)(14).</div>';
$pdf->writeHTMLCell(190, 5, 12, 197.5,$html, '', 0, false, true, 'L', true);

//.................
//......................
$pdf->SetFont('times', '', 9.6);
$html ='<div><b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I am seeking this permission so that I may obtain (select <b>only
one</b> box):</div>';
$pdf->writeHTMLCell(190, 5, 12, 208.5,$html, '', 0, false, true, 'L', true);

//.................
$pdf->SetFont( 'times', '', 13.4 );
$html = '<div><input type="checkbox" name="part-1_1a" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 215, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Status as a victim of trafficking (T nonimmigrant status) or
a victim of qualifying criminal activity (U nonimmigrant status). </div>';
$pdf->writeHTMLCell( 95, 5, 28, 215, $html, 0, 1, false, true, 'L', true );
//*....................

$pdf->SetFont( 'times', '', 13.4 );

$html = '<div><input type="checkbox" name="part-1_1b" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 228.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Admission as a nonimmigrant (other than as a T or U nonimmigrant).</div>';
$pdf->writeHTMLCell( 120, 5, 28, 225.5, $html, 0, 1, false, true, 'L', true );


//*....................
$pdf->SetFont('times', '', 9.6);
$html ='<div>If filing this form concurrently with a USCIS Form I-914/I-914A or Form I-918/I-918A (T or U nonimmigrant, respectively) or in
relation to one that you previously filed, you should complete <b>Item Numbers 1. - 10.</b> and then skip to <b>Item Number 26.</b></div>';
$pdf->writeHTMLCell(190, 5, 12, 234.5,$html, '', 0, false, true, 'L', true);


/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/
$pdf->AddPage( 'P', 'LETTER' );
//*.................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);
//*.................
 
$pdf->SetFont('times', '', 10);
$html ='<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Full Legal Name (Do not provide a nickname)</div>';
$pdf->writeHTMLCell(190, 5, 12, 25,$html, '', 0, false, true, 'L', true);
//*.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20, 30, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 30, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 29, $html, 0, 0, false, false, 'L', true);
//*...............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_1_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,38);
$pdf->TextField('p2_about_you_1_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,38);
$pdf->TextField('p2_about_you_1_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,38);

//*...................
 
$pdf->SetFont('times', '', 10);
$html ='<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Names Used (if any)</div>';
$pdf->writeHTMLCell(190, 5, 12, 45,$html, '', 0, false, true, 'L', true);
$html ='<div>Provide all other names you have ever used, including aliases, maiden name, and nicknames. If you need extra space to
complete this section, use the space provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(190, 5, 19, 51,$html, '', 0, false, true, 'L', true);

//*.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 19, 58, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 58, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 56.7, $html, 0, 0, false, false, 'L', true);
//*...............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_2a_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20.5,67.2);
$pdf->TextField('p2_about_you_2a_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,67.2);
$pdf->TextField('p2_about_you_2a_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,67.2);
//*...............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_2b_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20.5,74);
$pdf->TextField('p2_about_you_2b_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,74);
$pdf->TextField('p2_about_you_2b_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,74);


//*...................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Other Information</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 85, $html, "", 1, true, false, 'L', false);

//*...............
$pdf->SetFont('times', '', 10);
$html ='<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alien Registration Number (A-Number) (if any)</div>';
$pdf->writeHTMLCell(190, 5, 12, 91.5,$html, '', 0, false, true, 'L', true);
//.............

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);

$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 47, 186, false); // angle 1
$pdf->StopTransform();
//...........
$pdf->SetFont('times', '', 11);
$html ='<div><b>A- </b></div>';
$pdf->writeHTMLCell(190, 5, 23, 97,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_3', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 29,97);
//.............
//*...............
$pdf->SetFont('times', '', 10);
$html ='<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell(190, 5, 96, 91.5,$html, '', 0, false, true, 'L', true);
//.......................
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);

$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 137.5, 141.5, false); // angle 1
$pdf->StopTransform();
//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_4', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 126,97);

//......................
$pdf->SetFont('times', '', 10);
$html ='<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(190, 5, 12, 104,$html, '', 0, false, true, 'L', true);

//...........
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_5', 44, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,109.4);
//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Birth</div>';
$pdf->writeHTMLCell(190, 5, 12, 116.5,$html, '', 0, false, true, 'L', true);
//...................

$pdf->SetFont('times', '', 10);
$html ='<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City or Town</div>';
$pdf->writeHTMLCell(190, 5, 12, 121.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6city', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,127.2);
//..............

$pdf->SetFont('times', '', 10);
$html ='<div>State or Province</div>';
$pdf->writeHTMLCell(190, 5, 113, 121.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6state', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.5,127.2);
//.................

$pdf->SetFont('times', '', 10);
$html ='<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country</div>';
$pdf->writeHTMLCell(190, 5, 12, 134.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,140);
//.................

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(190, 5, 12, 147.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_7', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,153);
//........................

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender</div>';
$pdf->writeHTMLCell(190, 5, 12, 160,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html = '
   <input type="checkbox" name="p2_other_info_8male" value="Male" checked="" /> &nbsp; Male
   
   &nbsp;  &nbsp; <input type="checkbox" name="p2_other_info_8female" value="Female" checked="" /> Female

   &nbsp;  &nbsp; <input type="checkbox" name="p2_other_info_8another_gender" value="Another_Gender_Identity" checked="" /> Another Gender Identity';

$pdf->writeHTMLCell( 195, 0, 19.5, 166.2, $html, 0, 1, false, true, 'J', 0 );
//./...................


$pdf->SetFont('times', '', 10);
$html ='<div><b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mailing Address (Safe address, if applicable) </div>';
$pdf->writeHTMLCell(190, 5, 12, 172,$html, '', 0, false, true, 'L', true);
$html ='<div>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Please provide an address where you can safely receive correspondence from USCIS. </div>';
$pdf->writeHTMLCell(190, 5, 12, 177,$html, '', 0, false, true, 'L', true);
$html ='<div>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;In Care Of Name (if any) </div>';
$pdf->writeHTMLCell(190, 5, 12, 183,$html, '', 0, false, true, 'L', true);
$pdf->TextField('p2_other_info_9care_name', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,188.5);

//........................









// //..............
$pdf->setFont('Times', '', 10);
$html= '<div><b>     </b> &nbsp;    &nbsp;    Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 196.3, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 151, 196.3, $html, 0, 1, false, 'L');

// //...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_9street_number_name', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 202);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="p2_other_info_apt" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 151, 202, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="p2_other_info_ste" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 160,202, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="p2_other_info_flr" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 169,202, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_9number',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),181, 202);


// //.................

$pdf->setFont('Times', '', 10);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 209, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 152, 209, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 180, 209, $html, 0, 1, false, 'L');




$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 214.5);




$html = '<select name="part2_9_state" size="0.50">';
$html .= '<option selected value="">State</option>'; 
$html .= '<option value="">BB</option>'; 
$html .= '<option value="">CC</option>'; 
$html .= '<option value="">DD</option>'; 
$html .= '<option value="">EE</option>'; 
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 152, 214, $html, '', 0, 0, true, 'L');



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_zipcode', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 181, 214.5);


//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 222, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_provience', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 228);
// //.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 222, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 228);

// //.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 128, 222, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 128.5, 228);
// //.............






/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/






$pdf->AddPage( 'P', 'LETTER' );
//*.................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued) </div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);
//*.................


$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Address History</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 27, $html, 0, 1, true, false, 'L', false);

//......................
$pdf->SetFont('times', '', 10);
$html ='<div>Provide physical addresses for everywhere you have lived during the last five years, whether inside or outside the United States.
Provide your current address first. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional
Information.</b> </div>';
$pdf->writeHTMLCell(191, 6, 12, 33.4, $html, 0, 1, false, 'L');

//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Address 1 (current address)</div>';
$pdf->writeHTMLCell(190, 5, 12, 48,$html, '', 0, false, true, 'L', true);
//...................


// //..............
$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 21, 53, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 153, 53, $html, 0, 1, false, 'L');

// //...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10street_number_name', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 58.5);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="p2_info_10_apt" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 153, 58.5, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="p2_info_10_ste" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 162,58.5, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="pp2_info_10_flr" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 171,58.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_numbere',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),183, 58.5);


// //.................

$pdf->setFont('Times', '', 10);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 21.5, 66, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 154, 66, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 182, 66, $html, 0, 1, false, 'L');




$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 72);




$html = '<select name="p2_info_10_state" size="0.50">';
$html .= '<option selected value="">State</option>'; 
$html .= '<option value="">BB</option>'; 
$html .= '<option value="">CC</option>'; 
$html .= '<option value="">DD</option>'; 
$html .= '<option value="">EE</option>'; 
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 154, 72, $html, '', 0, 0, true, 'L');



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_zipcode', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 72.5);


//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 21.5, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_provience', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 86);
// //.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 76, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 77, 86);

// //.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 130, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130.5, 86);
// //.............




$pdf->setFont('Times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 21.5,93, $html, 0, 1, false, 'L');

// //.................
$pdf->setFont('Times', '', 10);
$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 21.5,98, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_from_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 104);



// //.................
$pdf->setFont('Times', '', 10);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 79.5,98, $html, 0, 1, false, 'L');
// $pdf->TextField('p2_other_info_mailing_address_country', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 104);
$pdf->setFont('Times', 'B', 10);
$pdf->writeHTMLCell(45, 6.5, 80,104, "PRESENT", 1, 1, false, 'L');
// //.................

//!





//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Address 2</div>';
$pdf->writeHTMLCell(190, 5, 12, 112,$html, '', 0, false, true, 'L', true);
//...................


// // //..............
$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 21, 117, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 153, 117, $html, 0, 1, false, 'L');

// // //...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11street_number_name', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 122.5);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="p2_info_11_apt" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 153, 122.5, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="p2_info_11_ste" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 162,122.5, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="pp2_info_11_flr" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 171,122.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_numbere',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),183, 122.5);


// // //.................

$pdf->setFont('Times', '', 10);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 21.5, 130, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 154, 130, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 182, 130, $html, 0, 1, false, 'L');




$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22,136);




$html = '<select name="p2_info_11_state" size="0.50">';
$html .= '<option selected value="">State</option>'; 
$html .= '<option value="">BB</option>'; 
$html .= '<option value="">CC</option>'; 
$html .= '<option value="">DD</option>'; 
$html .= '<option value="">EE</option>'; 
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 154, 136, $html, '', 0, 0, true, 'L');



$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_zipcode', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 136.5);


// //......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 21.5, 144, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_provience', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 150);
// //.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 76, 144, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 77, 150);

// // //.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 130, 144, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130.5, 150);
// // //.............




$pdf->setFont('Times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 21.5,156.5, $html, 0, 1, false, 'L');

// // //.................
$pdf->setFont('Times', '', 10);
$html= '<div>From (mm/dd/yyyy)</div>';

$pdf->writeHTMLCell(90, 7, 21.5,161.4, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_from_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 167);



// //.................
$pdf->setFont('Times', '', 10);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 79.5,161.4, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_to_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 167);

//*.................


$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Marital History</b></div>';
$pdf->writeHTMLCell(191, 5.8, 13, 177, $html, 0, 1, true, false, 'L', false);

//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is your current marital status?</div>';
$pdf->writeHTMLCell(190, 5, 12, 183,$html, '', 0, false, true, 'L', true);
//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>12.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is your current marital status?</div>';
$pdf->writeHTMLCell(190, 5, 12, 183,$html, '', 0, false, true, 'L', true);



//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12single" value="single" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Single, Never Married</div>';
$pdf->writeHTMLCell( 95, 5, 27, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12married" value="married" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 64.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Married</div>';
$pdf->writeHTMLCell( 95, 5, 71, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12divorced" value="divorced" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 84.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Divorced</div>';
$pdf->writeHTMLCell( 95, 5, 91, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12widowed" value="widowed" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 106.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Widowed</div>';
$pdf->writeHTMLCell( 95, 5, 112, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12separeted" value="separated" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 128.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Legally Separated</div>';
$pdf->writeHTMLCell( 95, 5, 134, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12annulled" value="marriage_annulled" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 161.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Marriage Annulled</div>';
$pdf->writeHTMLCell( 95, 5, 167, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12other" value="other" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5,20.5, 195, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Other</div>';
$pdf->writeHTMLCell( 95, 5,27, 195, $html, 0, 1, false, true, 'L', true );
//........................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_2_12', 91, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 40, 195);


//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How many times have you been married (including annulled marriages and marriages to the same person)?</div>';
$pdf->writeHTMLCell(190, 5, 12, 202,$html, '', 0, false, true, 'L', true);
//........................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_2_13', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 180, 202);

//*.................


$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Current Marriage</b> (including if you are legally separated)</div>';
$pdf->writeHTMLCell(191, 5.8, 13, 212, $html, 0, 1, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html ='<div>If you are currently married, provide the following information about your <b>current spouse.</b>
</div>';
$pdf->writeHTMLCell(190, 5, 12, 219,$html, '', 0, false, true, 'L', true);

//...................

$pdf->SetFont('times', '', 10);
$html ="<div><b>14.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse's Legal Name</div>";
$pdf->writeHTMLCell(190, 5, 12, 224,$html, '', 0, false, true, 'L', true);
//*.............

$pdf->SetFont('times', '', 10); // set font
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 21, 228.6, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 228, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 227, $html, 0, 0, false, false, 'L', true);
// //*...............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_14_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,235.5);
$pdf->TextField('p2_about_you_14_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,235.5);
$pdf->TextField('p2_about_you_14_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,235.5);

//*...................



$pdf->SetFont('times', '', 10);
$html ="<div><b>15.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Spouse's Alien Registration Number (A-Number) (if any)</div>";
$pdf->writeHTMLCell(190, 5, 12, 245,$html, '', 0, false, true, 'L', true);

//...................
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 196,147, false); // angle 1
$pdf->StopTransform();
//..............


$pdf->SetFont('times', '', 11);
$html ="<div><b>A-</b></div>";
$pdf->writeHTMLCell(190, 5, 110, 245,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 116,245);

/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/






$pdf->AddPage( 'P', 'LETTER' );
//*.................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued) </div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);
//*.................





$pdf->SetFont('times', '', 10);
$html ="<div><b>16.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 12, 25,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63,25.3);
//*...................


$pdf->SetFont('times', '', 10);
$html ="<div><b>17.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Marriage (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 106, 25,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163,25.3);
//*...................
$pdf->SetFont('times', '', 10);
$html ="<div><b>18.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Birth</div>";
$pdf->writeHTMLCell(190, 5, 12, 32,$html, '', 0, false, true, 'L', true);
$html ="<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 38,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,43.5);
//*...................
$pdf->SetFont('times', '', 10);
$html ="<div>State or Provincen</div>";
$pdf->writeHTMLCell(190, 5, 115, 38,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115,43.5);

//*...................
$pdf->SetFont('times', '', 10);
$html ="<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 50,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,55.5);

//*...................
$pdf->SetFont('times', '', 10);
$html ="<div><b>18.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Birth</div>";
$pdf->writeHTMLCell(190, 5, 12, 64,$html, '', 0, false, true, 'L', true);
$html ="<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 70,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,75.5);
//*...................
$pdf->SetFont('times', '', 10);
$html ="<div>State or Provincen</div>";
$pdf->writeHTMLCell(190, 5, 115, 70,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115,75.5);

//*...................
$pdf->SetFont('times', '', 10);
$html ="<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 82,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,87.5);

//*...................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Prior Marriages</b>  (if any) </div>';
$pdf->writeHTMLCell(191, 6.2, 13, 98, $html, 0, 1, true, false, 'L', false);
//*...................
$pdf->SetFont('times', '', 10);
$html ='<div>If you have been married before, anywhere in the world, provide the information requested in <b>Item Numbers 20. - 25</b>. about your
prior marriage. If you have had more than one previous marriage, use the space provided in <b>Part 6. Additional Information</b> to
provide the answers to <b>Item Numbers 20. - 25.</b> for each additional marriage.</div>';
$pdf->writeHTMLCell(191, 6.2, 13, 104.4, $html, 0, 0, false, true, 'L', true);
//*...................
$pdf->SetFont('times', '', 10);
$html ="<div><b>20.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Legal Name (provide family name before marriage)</div>";
$pdf->writeHTMLCell(190, 5, 12, 119.5,$html, '', 0, false, true, 'L', true);
//*...................

$pdf->SetFont('times', '', 10); // set font
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20.5, 124, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 123.4, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 122.5, $html, 0, 0, false, false, 'L', true);
//*...............
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_1_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5,131);
$pdf->TextField('p2_about_you_1_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 98,131);
$pdf->TextField('p2_about_you_1_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156,131);

//*...................
$pdf->SetFont('times', '', 10);
$html ="<div><b>21.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 12, 140,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62.5,140);
//*...................

$pdf->SetFont('times', '', 10);
$html ="<div><b>22.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Marriage (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 105, 140,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162,140);
//*...................
$pdf->SetFont('times', '', 10);
$html ="<div><b>23.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Marriage</div>";
$pdf->writeHTMLCell(190, 5, 12, 147,$html, '', 0, false, true, 'L', true);
$html ="<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 152,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,157.4);
//..............
$pdf->SetFont('times', '', 10);
$html ="<div>State or Provincen</div>";
$pdf->writeHTMLCell(190, 5, 115, 152,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6state', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.5,157.2);
//.................
$pdf->SetFont('times', '', 10);
$html ="<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 164.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,170);
//.........................
$pdf->SetFont('times', '', 10);
$html ="<div><b>24.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Marriage Legally Ended (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 12, 178,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86 , 178.5);


//.........................
$pdf->SetFont('times', '', 10);
$html ="<div><b>25.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place Where Marriage Legally Ended</div>";
$pdf->writeHTMLCell(190, 5, 12, 186,$html, '', 0, false, true, 'L', true);

//....................

$html ="<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 191,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,196.4);
//..............
$pdf->SetFont('times', '', 10);
$html ="<div>State or Provincen</div>";
$pdf->writeHTMLCell(190, 5, 115, 191,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6state', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.5,196.4);
//.................
$pdf->SetFont('times', '', 10);
$html ="<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 203,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,209);
//*...................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Immigration and Criminal History</b></div>';
$pdf->writeHTMLCell(191, 6.2, 13,219, $html, 0, 1, true, false, 'L', false);

//.........................
$pdf->SetFont('times', '', 10);
$html ="<div><b>25.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Explain the grounds of inadmissibility that may apply in your case.</div>";
$pdf->writeHTMLCell(190, 5, 12, 226,$html, '', 0, false, true, 'L', true);

//..........................

$pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="43" rows="5" name="additional_info_name_7d">
</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 21, 232, $html, 0, 0, false, 'L');









$pdf->AddPage( 'P', 'LETTER' );
//*.................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued) </div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);
//*.................

















$js = "
var fields = {

//!Page 1

	'attorney_uscis_online_number':' ',
	'attorney_statebar_number':' ',
	'volga_number':' ',
	'part2_1a_legal_lastname':' ',
	'part2_1b_legal_firstname':' ',
	'part2_1c_legal_middlename':' ',
//!page 2
     'p2_about_you_1_last_name':' ',
     'p2_about_you_1_first_name':' ',
     'p2_about_you_1_middle_name':' ',
     'p2_about_you_2a_last_name':' ',
     'p2_about_you_2a_first_name':' ',
     'p2_about_you_2a_middle_name':' ',
     'p2_about_you_2b_last_name':' ',
     'p2_about_you_2b_first_name':' ',
     'p2_about_you_2b_middle_name':' ',
     'p2_other_info_3':' ',
     'p2_other_info_4':' ',
     'p2_other_info_5':' ',
     'p2_other_info_6city':' ',
     'p2_other_info_6state':' ',
     'p2_other_info_6country':' ',
     'p2_other_info_8female':' ',
     'p2_other_info_8another_gender':' ',
     'p2_other_info_8male':' ',
     'p2_other_info_7':' ',

     'p2_other_info_9care_name':' ',
     'p2_other_info_9street_number_name':' ',
     'p2_other_info_apt':' ',
     'p2_other_info_ste':' ',
     'p2_other_info_flr':' ',
     'p2_other_info_9number':' ',
     'p2_other_info_mailing_address_city_town':' ',
     'part2_9_state':' ',
     'p2_other_info_mailing_address_zipcode':' ',
     'p2_other_info_mailing_address_country':' ',
     'p2_other_info_mailing_address_postal_code':' ',
     'p2_other_info_mailing_address_provience':' ',
     
     
     //!page 3
     
     'p2_info_10street_number_name':' ',
     'p2_info_10_ste':' ',
     'p2_info_10_apt':' ',
     'pp2_info_10_flr':' ',
     'p2_info_10_numbere':' ',
     'p2_info_10_city_town':' ',
     'p2_info_10_zipcode':' ',
     'p2_info_10_state':' ',
     'p2_info_10_provience':' ',
     'p2_info_10_postal_code':' ',
     'p2_info_10_country':' ',
     'p2_info_10_from_date':' ',

     'p2_info_11street_number_name':' ',
     'p2_info_11_ste':' ',
     'p2_info_11_apt':' ',
     'pp2_info_11_flr':' ',
     'p2_info_11_numbere':' ',
     'p2_info_11_city_town':' ',
     'p2_info_11_zipcode':' ',
     'p2_info_11_state':' ',
     'p2_info_11_provience':' ',
     'p2_info_11_postal_code':' ',
     'p2_info_11_country':' ',
     'p2_info_11_from_date':' ',
     'p2_info_11_to_date':' ',

     
     'part_2_12single':' ',

     'part_2_12married':' ',

     'part_2_12divorced':' ',

     'part_2_12widowed':' ',

     'part_2_12separeted':' ',

     'part_2_12annulled':' ',

     'part_2_12other':' ',

     'part_2_12':' ',
     'part_2_13':' ',

     'p2_about_you_15_registration_number':' ',

     'p2_about_you_14_middle_name':' ',

     'p2_about_you_14_first_name':' ',

     'p2_about_you_14_last_name':' ',

     'p2_info_11_to_date':' ',
//!page 4     
     'additional_info_name_7d':' ',

 

	 
  

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
$pdf->Output('i-192.pdf', 'I');