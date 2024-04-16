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
$html = '<div><input type="checkbox" name="part-1_1" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 215, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Status as a victim of trafficking (T nonimmigrant status) or
a victim of qualifying criminal activity (U nonimmigrant status). </div>';
$pdf->writeHTMLCell( 95, 5, 28, 215, $html, 0, 1, false, true, 'L', true );
//*....................

$pdf->SetFont( 'times', '', 13.4 );

$html = '<div><input type="checkbox" name="part-1_2" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 225.5, $html, 0, 1, false, false, 'J', true );
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
$pdf->writeHTMLCell(40, 7, 22, 30, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 30, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 29, $html, 0, 0, false, false, 'L', true);

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_legal_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,38);
$pdf->TextField('p2_about_you_legal_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,38);
$pdf->TextField('p2_about_you_legal_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,38);




















$js = "
var fields = {

//!Page 1

	'attorney_uscis_online_number': '  ',
	'attorney_statebar_number': '  ',
	'volga_number':'  ',
	'part2_1a_legal_lastname': '',
	'part2_1b_legal_firstname': '  ',
	'part2_1c_legal_middlename': '  ',
//!page 2
     'p2_about_you_legal_last_name': ' ',
     'p2_about_you_legal_first_name': '  ',
     'p2_about_you_legal_middle_name': '  ',

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