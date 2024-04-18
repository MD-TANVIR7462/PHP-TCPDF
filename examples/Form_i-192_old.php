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

        $this->Cell( 40, 6.4, 'Form I-192   Edition  07/20/21 ', 0, 0, 'L' );

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
$pdf->writeHTMLCell( 77, 17, 126,106.7, 'Nonimmigrant other than T or U nonimmigrant/Advance Permission
under INA 212(d)(3)(A) and 8 CFR 212.4', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,115, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,114.3, 'T Nonimmigrant/Advance Permission under INA 212(d)(3) and
8 CFR 212.16', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,122, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,121.3, 'T Nonimmigrant/Waiver under INA 212(d)(13) and 8 CFR 212.16', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,129, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 77, 17, 126,128.3, 'U Nonimmigrant/Waiver under INA 212(d)(14) and 8 CFR 212.17 ', "", 1, false, false, 'L', true );

//..............

$pdf->setCellHeightRatio( 0);
$pdf->writeHTMLCell( 2.7, 2.7, 122,136, '', 1, 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 75, 17, 125.6,135.3, 'U Nonimmigrant/Advance Permission under INA 212(d)(3)(A) and
8 CFR 212.17', "", 1, false, false, 'L', true );

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
$i_192_g28_check = (showData('i_192_select_g28')=='Y')? "checked":"";
$pdf->SetFont('times', 'B', 13);
$pdf->writeHTMLCell(37, 5, 15, 164.5, '<input type="checkbox" name="agree" value="1" checked="'.$i_192_g28_check.'" />', '', 0, false, true, 'L', true);
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
$pdf->writeHTMLCell(86, 5.7, 13, 191, $html, 1, 1, true, false, 'L', false);

$pdf->SetFont('times', '', 9.6);
$html ='<div>I am applying to the Secretary of Homeland Security for
permission to enter the United States temporarily under the
provisions of the Immigration and Nationality Act (INA)<br>
section 212(d)(3)(A)(ii), section 212(d)(13), or section
212(d)(14).</div>';
$pdf->writeHTMLCell(90, 5, 12, 197.5,$html, '', 0, false, true, 'L', true);

//.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div>I am seeking this permission so that I may obtain (select <b>only
one</b> box):</div>';
$pdf->writeHTMLCell( 90, 5, 12, 220.5, $html, 0, 1, false, true, 'L', true );
//..............
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>1.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 230, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 11.4 );

$i_192_part1_1 = (showData('i_192_select_g28')=='Y')? "checked":"";

$html = '<div><input type="checkbox" name="part-1_1" value="YES" checked="'.$i_192_part1_1.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 230.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Admission as a nonimmigrant (other than as a T or U
nonimmigrant). </div>';
$pdf->writeHTMLCell( 100, 5, 24, 230, $html, 0, 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>2.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 240, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 11.4 );

$status_as_victim = (showData('i_192_part1_2_checkbox')=='Y')?'checked':'';

$html = '<div><input type="checkbox" name="part-1_2" value="YES" checked="'.$status_as_victim.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 240.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Status as a victim of trafficking (T nonimmigrant<br>
status) or a victim of a crime (U nonimmigrant<br>status).

 </div>';
$pdf->writeHTMLCell( 100, 5, 24, 240, $html, 0, 1, false, true, 'L', true );
//...............
$pdf->SetFont('times', '', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b></div>';
$pdf->writeHTMLCell(90,5.8, 113, 191, $html, 1, 1, true, false, 'L', false);
//...............
$pdf->SetFont('times', 'BI', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0.5, 1); 
$html ='<div><b>Your Full Name</b></div>';
$pdf->writeHTMLCell(90, 5.7, 113, 202, $html, "", 1, true, false, 'L', false);


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

/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );
//...............
$pdf->SetFont('times', '', 12);
$pdf->setCellHeightRatio(1.3);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', false);
//...............
$pdf->SetFont('times', 'I', 12.2);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Other Names Used</b> (if any)</div>';
$pdf->writeHTMLCell(90, 5.7, 13, 28, $html, "", 1, true, false, 'L', false);

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
$pdf->writeHTMLCell(90, 5.7, 13, 115.5, $html, 0, 1, true, false, 'L', false);
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
if(showData('other_information_about_you_gender')=='male')   $male_check='checked'; else $male_check='';
if(showData('other_information_about_you_gender')=='female') $female_check='checked'; else $female_check='';

$pdf->SetFont('times', '', 10);
$html= '<div><b>7. </b> Gender   &nbsp; &nbsp; <input type="checkbox" name="part2_7_male" value="y" checked="'.$male_check.'" /> Male  &nbsp; &nbsp;
<input type="checkbox" name="part2_7_female" value="n" checked="'.$female_check.'" /> Female</div>';
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
$pdf->writeHTMLCell(90, 7, 13, 185, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8b', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 190);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.c. </b>  &nbsp;  Country</div>';
$pdf->writeHTMLCell(90, 7, 13, 197, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_8c', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 202);

// //.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>9. </b>  &nbsp; Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(90, 7, 13, 208.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part2_9', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 23, 214.2);
//........



//?second column..............
//*..............



$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', 'I', 10); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(12); // set font
$html ='<div><b>Mailing Address </b></div>';
$pdf->writeHTMLCell(92,6, 112, 18, $html, '', 1, true, false, 'L', true );
$pdf->SetFont('times', 'BI', 8.2);
$html ='<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><i><b>(USPS ZIP Code Lookup)</b></i></a></div>';
$pdf->writeHTMLCell(90, 7, 113, 19, $html, 0, 1, false, false, 'R', true);


//*...............................................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>10.a.</b> &nbsp; In Care Of Name (if any) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 26, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10a_careName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 31.5 );
//* //* //*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>10.b. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 39, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10b_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 40.4 );

//* //* ...........
$pdf->SetFont( 'times', '', 10 );

// checked="'.$apt_check.'" 
$apt_check = (showData('information_about_you_mailing_apt_ste_flr') == 'apt') ? 'checked' : '';
$ste_check = (showData('information_about_you_mailing_apt_ste_flr') == 'ste') ? 'checked' : '';
$flr_check = (showData('information_about_you_mailing_apt_ste_flr') == 'flr') ? 'checked' : '';

$html = '<div><b>10.c. </b> 
<input type="checkbox" name="P2_10b_Apt" value="Apt" checked="'.$apt_check.'" /> &nbsp; Apt. &nbsp;&nbsp;
<input type="checkbox" name="p2_10b_Ste" value="Ste" checked="'.$ste_check.'" /> &nbsp; Ste. 
<input type="checkbox" name="p2_10b_Flr" value="Flr" checked="'.$flr_check.'" /> &nbsp;Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 50, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10c_apt_ste', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 167, 49 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 58, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10d_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 58 );
//* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>10.e.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>10.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 67.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part2_10e_state" size="0.25">';
$html .= '<option value=""> </option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 67, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_10f_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 67 );

//* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112,76, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10g_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,76 );
//* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 85, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10h_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 85 );
//*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>10.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 93, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10i_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 99 );
//? //* //*.....

//*..............
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 12 );
$html = "<div><b><i>Safe Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 5.5, 112, 110, $html, '', 1, true, false, 'L', true );
//.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you are a T or U visa applicant, and do not want U.S.
Citizenship and Immigration Services (USCIS) to send notices
about this application to your home, you may provide a safe
mailing address </div>';
$pdf->writeHTMLCell( 90, 0, 112, 117.5, $html, '', 0, 0, true, 'L' );
//.........................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.a.</b> &nbsp; In Care Of Name (if any) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 135, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11a_careName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 140.5 );
//.........................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.b.</b> &nbsp; Organization Name (if applicable) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 148, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11b_organizationName', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 153 );





//* //* //*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>11.c. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 161.5, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11c_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 162 );

//* //* ...........
$pdf->SetFont( 'times', '', 10);
//* set font

// checked="'.$apt_check.'" 
$apt_check = (showData('information_about_you_safe_mailing_apt_ste_flr') == 'apt') ? 'checked' : '';
$ste_check = (showData('information_about_you_safe_mailing_apt_ste_flr') == 'ste') ? 'checked' : '';
$flr_check = (showData('information_about_you_safe_mailing_apt_ste_flr') == 'flr') ? 'checked' : '';

$html = '<div><b>11.d. </b> 
<input type="checkbox" name="P2_11d_Apt" value="Apt" checked="'.$apt_check.'" />&nbsp; Apt. &nbsp;&nbsp;
<input type="checkbox" name="P2_11d_Ste" value="Ste" checked="'.$ste_check.'" />&nbsp; Ste. 
<input type="checkbox" name="P2_11d_Flr" value="Flr" checked="'.$flr_check.'" /> &nbsp;Flr.
</div>';



$pdf->writeHTMLCell( 61, 0, 112, 172, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11d_apt_ste', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 167, 171 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.e.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 180, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11e_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 180);
// //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>11.f.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>11.g.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 190.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// //* set font

$html = '<select name="part2_11f_state" size="0.25">';
$html .= '<option value=""> </option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 190, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_11g_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 189.5 );

// //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.h.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 198.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11h_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 198.7 );
// //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.i.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112,208, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11i_Postal_Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,208);
// //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>11.j.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 215, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11j_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 220);

/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', false);
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
$pdf->writeHTMLCell(90, 7, 12, 54, $html, '', 0, 0, true, 'L');

//.......................






$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>12.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 58, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12a_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 59.7 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font

// checked="'.$apt_check.'" 
$apt_check = (showData('information_about_you_home_apt_ste_flr') == 'apt') ? 'checked' : '';
$ste_check = (showData('information_about_you_home_apt_ste_flr') == 'ste') ? 'checked' : '';
$flr_check = (showData('information_about_you_home_apt_ste_flr') == 'flr') ? 'checked' : '';


$html = '<div><b>12.b. </b> 
<input type="checkbox" name="P2_12b_Apt" value="Apt" checked="'.$apt_check.'" /> Apt. &nbsp;&nbsp;
<input type="checkbox" name="P2_12b_Ste" value="Ste" checked="'.$ste_check.'" /> Ste. 
<input type="checkbox" name="P2_12b_Flr" value="Flr" checked="'.$flr_check.'" /> Flr.
</div>';
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
$html .= '<option value=""> </option>';
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
$pdf->writeHTMLCell(90, 7, 12, 127, $html, '', 0, 0, true, 'L');

// //.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>13.a.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 12, 134, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_13a', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 74   , 134 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>13.b.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 12,143, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->writeHTMLCell( 30, 5.7, 74   ,143.5, "PRESENT", 1, 0, 0, true, 'L' );
$pdf->writeHTMLCell( 91, 1, 13, 146.5,"" , 'B', 0, 0, true, 'L' );




//* //*Down section //*.....
//..............

$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 2 </div>';
$pdf->writeHTMLCell(90, 7, 12, 154, $html, '', 0, 0, true, 'L');
//...........
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>14.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 161, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_14a_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 162.5 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font

// checked="'.$apt_check.'" 
$apt_check = (showData('information_about_you_home_apt_ste_flr2') == 'apt') ? 'checked' : '';
$ste_check = (showData('information_about_you_home_apt_ste_flr2') == 'ste') ? 'checked' : '';
$flr_check = (showData('information_about_you_home_apt_ste_flr2') == 'flr') ? 'checked' : '';

$html = '<div><b>14.b. </b> 
<input type="checkbox" name="P2_14b_Apt" value="Apt" checked="'.$apt_check.'"/> Apt. &nbsp;&nbsp;
<input type="checkbox" name="P2_14b_Ste" value="Ste" checked="'.$ste_check.'"/> Ste. 
<input type="checkbox" name="P2_14b_Flr" value="Flr" checked="'.$flr_check.'"/> Flr.
</div>';
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
$html .= '<option value=""> </option>';
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






//......column 1 done........................

$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 3 </div>';
$pdf->writeHTMLCell(90, 7, 112, 17, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>16.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 24, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_16a', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 25.7 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font

// checked="'.$apt_check.'" 
$apt_check = (showData('information_about_you_home_apt_ste_flr3') == 'apt') ? 'checked' : '';
$ste_check = (showData('information_about_you_home_apt_ste_flr3') == 'ste') ? 'checked' : '';
$flr_check = (showData('information_about_you_home_apt_ste_flr3') == 'flr') ? 'checked' : '';

$html = '<div><b>16.b. </b> 
<input type="checkbox" name="P2_11d_Apt" value="Apt" checked="'.$apt_check.'"  /> Apt. &nbsp;&nbsp;
<input type="checkbox" name="P2_11d_Ste" value="Ste" checked="'.$ste_check.'"  /> Ste. 
<input type="checkbox" name="P2_11d_Flr" value="Flr" checked="'.$flr_check.'"  /> Flr.
</div>';
$pdf->writeHTMLCell( 61, 0, 112, 34, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_16b', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 34 );

// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>16.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 43, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_16c', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 43);
// // //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>16.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>16.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 52.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// // //* set font

$html = '<select name="part2_16d" size="0.25">';
$html .= '<option value=""> </option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 52, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_16e', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170,52 );

// // //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>16.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 61, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_16f', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 61 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>16.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112,70, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_16g', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,70 );
// // //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>16.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 77, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_16h', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 82 );



//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 112, 90, $html, '', 0, 0, true, 'L');

// //.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>17.a.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 97, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_17a', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174   , 97 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>17.b.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112,106, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_17b', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),174   ,106.5 );


$pdf->writeHTMLCell( 91, 1, 113, 109,"" , 'B', 0, 0, true, 'L' );

//...................................................................



$pdf->SetFont('times', '', 10);
$html= '<div>Physical Address 4 </div>';
$pdf->writeHTMLCell(90, 7, 112, 117, $html, '', 0, 0, true, 'L');
//...............
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>18.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp; &nbsp;  and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 124, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_18a', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 125.7 );

 //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font

// checked="'.$apt_check.'" 
$apt_check = (showData('information_about_you_home_apt_ste_flr4') == 'apt') ? 'checked' : '';
$ste_check = (showData('information_about_you_home_apt_ste_flr4') == 'ste') ? 'checked' : '';
$flr_check = (showData('information_about_you_home_apt_ste_flr4') == 'flr') ? 'checked' : '';

$html = '<div><b>18.b. </b> 
<input type="checkbox" name="P2_11d_Apt" value="Apt" checked="'.$apt_check.'"/> Apt. &nbsp;&nbsp;
<input type="checkbox" name="P2_11d_Ste" value="Ste" checked="'.$ste_check.'"/> Ste. 
<input type="checkbox" name="P2_11d_Flr" value="Flr" checked="'.$flr_check.'"/> Flr.
</div>';
$pdf->writeHTMLCell( 61, 0, 112, 134, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_18b', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 134 );

// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>18.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 143, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_18c', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 143);
// // //* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>18.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <b>18.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 152.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
// // //* set font

$html = '<select name="part2_18d" size="0.25">';
$html .= '<option value=""> </option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 152, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part2_18e', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170,152 );

// // //* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font 
$html = '<div><b>18.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 161, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_18f', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 161 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>18.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112,170, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_18g', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144,170 );
// // //*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>18.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112,177, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_18h', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 182 );



//..............
$pdf->SetFont('times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 112, 190, $html, '', 0, 0, true, 'L');

// //.......................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>19.a.</b> &nbsp; From (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112, 199, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_19a', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174   , 199 );
// // //* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>19.b.</b> &nbsp; To (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 60, 0, 112,208, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_19b', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),174   ,208.5 );

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 17, $html, 1, 1, true, false, 'L', false);
//.....................
$pdf->SetFont('times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Travel Information</b></div>';
$pdf->writeHTMLCell(90, 6, 13, 26.7, $html, "", 1, true, false, 'L', false);
//.......................
//........
$pdf->SetFont('times', '', 9.6);
$html ='<div><b>NOTE</b>: If you are applying for T or U nonimmigrant status and
are in the United States, you may skip <b>Item Numbers 20. - 25.</b>
</div>';
$pdf->writeHTMLCell(90, 5, 12, 33,$html, '', 0, false, true, 'L', true);
//........
$pdf->SetFont('times', '', 9.6);
$html ='<div>Location at Which you Plan to Enter the United States (desired
Port-of-Entry)
</div>';
$pdf->writeHTMLCell(90, 5, 12, 43,$html, '', 0, false, true, 'L', true);
// //* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>20.a.</b> &nbsp; City </div>';
$pdf->writeHTMLCell( 50, 5, 12, 54, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_20a_city', 71, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 30, 54);

//..........................
$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>20.b.</b> &nbsp;&nbsp;State ';
$pdf->writeHTMLCell( 60, 0, 12, 62.3, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 11.5 );

$html = '<select name="part2_20b_state" size="0.25">';
$html .= '<option value=""> </option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.'         </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 30, 5, 44.5, 62, $html, '', 0, 0, true, 'L' );

//.................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>21.</b> &nbsp; Name of Port-of-Entry </div>';
$pdf->writeHTMLCell( 50, 0, 12,70, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_21', 83.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 76 );

//...............


$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>22.</b> &nbsp; How do you plan to travel to the United States?<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(For example, by plane, ship, car) </div>';
$pdf->writeHTMLCell( 90, 0, 12,82.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_22', 83.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 93.5 );

//...............


$pdf->SetFont( 'times', '', 9.5 );
//* set font
$html = '<div><b>23.</b> &nbsp; When do you plan to enter the United States? (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 100, 0, 12,100.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_23', 30.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 73, 106.5 );

//.................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>24.</b> &nbsp; Approximate Length of Stay in the United States </div>';
$pdf->writeHTMLCell( 90, 0, 12,113, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_24', 83.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 119 );

//...............
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>25.</b> &nbsp; What is the purpose of your stay in the United States?<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Explain fully below. </div>';
$pdf->writeHTMLCell( 100, 0, 12,127.5, $html, '', 0, 0, true, 'L' );
$pdf->setFont( 'courier', 'B', 10 );

$pdf->TextField('part2_25', 83.5, 40, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 137);

/* $html = <<<EOD
<textarea cols = "20" rows = "9" name = "part2_25">

</textarea>
EOD;
$pdf->writeHTMLCell( 80, 5, 19, 137, $html, 0, 0, false, 'L' ); */
//...............

$pdf->SetFont('times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Immigration and Criminal History</b></div>';
$pdf->writeHTMLCell(91.4, 6, 13, 179, $html, "", 1, true, false, 'L', false);
//.....................


$pdf->SetFont( 'times', '', 9.6 );
$html = '<div><b>26.   &nbsp;  </b>     Do you believe that you may be inadmissible to the  <br>      &nbsp; &nbsp; &nbsp;&nbsp;
&nbsp;United States? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 186, $html, '', 0, 0, true, 'L' );

// checked="'.$apt_check.'" 
$yes_check = (showData('travel_info_about_you_inadmissible_status') == 'yes') ? 'checked' : '';
$no_check = (showData('travel_info_about_you_inadmissible_status') == 'no') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="part2_26" value="Y" checked="'.$yes_check.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_26" value="N" checked="'.$no_check.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 191, $html, '', 0, 0, true, 'L' );

$html = '<div>If you answered "Yes" to <b>Item Number 26.</b>, explain the<br>
reasons why you believe, according to the best of your<br>
knowledge, that you may be inadmissible in <b>Part 8.<br>
Additional Information.</b> If you were told that you are<br>
inadmissible, provide the reason you were given.</div>';
$pdf->writeHTMLCell( 90, 0, 21, 198, $html, '', 0, 0, true, 'L' );
//.....................


$pdf->SetFont( 'times', '', 9.8 );
$html = '<div><b>27.   &nbsp;  </b>     Have you previously filed an application for advance  <br>      &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;permission to enter the United States as a nonimmigrant? </div>';
$pdf->writeHTMLCell( 95, 0, 12, 221.5, $html, '', 0, 0, true, 'L' );

// checked="'.$yes_check.'" 
$yes_check = (showData('travel_info_about_you_previous_application_status') == 'yes') ? 'checked' : '';
$no_check = (showData('travel_info_about_you_previous_application_status') == 'no') ? 'checked' : '';

$html = '<div><input type="checkbox" name="part2_27" value="Y" checked="'.$yes_check.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_27" value="N" checked="'.$no_check.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 230, $html, '', 0, 0, true, 'L' );

$html = '<div>If you answered "Yes" to <b>Item Number 27.</b>, provide the<br>
details in <b>Item Numbers 28. - 29.e</b>. If you need extra<br>
space to complete this section, use the space provided in<br>
<b>Part 8. Additional Information.</b></div>';
$pdf->writeHTMLCell( 90, 0, 21, 236, $html, '', 0, 0, true, 'L' );


//!.....................!...............................................................................................



$pdf->SetFont( 'times', '', 9.5 );
//* set font
$html = '<div><b>28.</b> &nbsp; Date Application Filed (mm/dd/yyyy) </div>';
$pdf->writeHTMLCell( 100, 0, 113,17, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_28', 33, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 171, 22.5 );

//......................
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div>Location where you filed your application (for example, USCIS<br>
Office or Port-of-Entry).</div>';
$pdf->writeHTMLCell( 100, 0, 113,30, $html, '', 0, 0, true, 'L' );



//...................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>29.a.</b>&nbsp; USCIS Office or U.S. Port-of-Entry </div>';
$pdf->writeHTMLCell( 70, 0, 112,40, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_29a', 81.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121.5, 46 );
//...................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>29.b.</b>&nbsp; City or Town </div>';
$pdf->writeHTMLCell( 70, 0, 112,53, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_29b', 81.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121.5, 59 );
//...................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>29.c.</b>&nbsp; State or Province </div>';
$pdf->writeHTMLCell( 70, 0, 112,66, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_29c', 81.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121.5, 72 );
//...................

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>29.d.</b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 70, 0, 112,79, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_29d', 81.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 85 );


//............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>29.e</b> &nbsp;Receipt Number (if available)</div>';
$pdf->writeHTMLCell( 70, 0, 112,93, $html, '', 0, 0, true, 'L' );
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 140, 121.7, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_29e', 69.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 134, 98.5 );
//..................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>30.   &nbsp;  </b>     Have you <b>EVER</b> been in the United States for a period of  <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
&nbsp;six months or more?
</div>';
$pdf->writeHTMLCell( 94, 0, 112, 108, $html, '', 0, 0, true, 'L' );

// checked="'.$yes_check.'" 
$yes_check = (showData('immigration_criminal_info_about_you_six_month_more_status') == 'yes') ? 'checked' : '';
$no_check = (showData('immigration_criminal_info_about_you_six_month_more_status') == 'no') ? 'checked' : '';


$html = '<div>
<input type="checkbox" name="part2_30" value="Y" checked="'.$yes_check.'" /> Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_30" value="N" checked="'.$no_check.'" /> No
</div>';
$pdf->writeHTMLCell( 60, 0, 175, 113, $html, '', 0, 0, true, 'L' );

$html = '<div>If you answered "Yes" to <b>Item Number 30</b>., provide the<br>
dates you were in the United States (from and to) and<br>
your immigration status at the time of entry into the<br>
United States in the space provided in <b>Part 8. Additional<br>
Information.</b></div>';
$pdf->writeHTMLCell( 90, 0,121, 119, $html, '', 0, 0, true, 'L' );
//........................................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>31.   &nbsp;  </b>     Have you <b>EVER</b> filed an application or petition for   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;immigration benefits with the U.S. Government, or has <br> &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;one ever been filed on your behalf?
</div>';
$pdf->writeHTMLCell( 90, 0, 112, 142, $html, '', 0, 0, true, 'L' );

// checked="'.$yes_check.'" 
$yes_check = (showData('immigration_criminal_info_about_you_filed_behalf_status') == 'yes') ? 'checked' : '';
$no_check = (showData('immigration_criminal_info_about_you_filed_behalf_status') == 'no') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="part2_31" value="Y" checked="'.$yes_check.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_31" value="N" checked="'.$no_check.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 175, 151, $html, '', 0, 0, true, 'L' );

$html = '<div>If you answered "Yes" to <b>Item Number 31.</b>, provide the<br>
information requested in <b>Item Numbers 32.a. - 32.c.</b></div>';
$pdf->writeHTMLCell( 90, 0,121, 157, $html, '', 0, 0, true, 'L' );
//...............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you (or somebody else on your behalf) have filed multiple<br>
applications or petitions for immigration benefits with the U.S.<br>
Government, use the space provided in <b>Part 8. Additional<br>
Information</b> to provide the answers to <b>Item Numbers<br>
32.a. - 32.c.</b> for each of your additional applications or petitions. 
 </div>';
$pdf->writeHTMLCell( 94, 0,112, 168, $html, '', 0, 0, true, 'L' );
//..............................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>32.a</b> &nbsp; Type of Application or Petition Filed </div>';
$pdf->writeHTMLCell( 70, 0, 112,191, $html, '', 0, 0, true, 'L' );

$value_32a = showData('information_about_uscis_office_or_port_of_entry_application_or_petition');
$pdf->writeHTMLCell( 80, 6, 122,197, " $value_32a", 1, 0, 0, true, 'L' );
//.......................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>32.b</b> </div>';
$pdf->writeHTMLCell( 70, 0, 112,204, $html, '', 0, 0, true, 'L' );
$html = '<div>Location Where You (or the Other Person) Filed the<br>
Application or Petition (for example, USCIS office or<br>
Port-of-Entry);</div>';
$pdf->writeHTMLCell( 90, 5, 121,204, $html, '', 0, 0, true, 'L' );

$value_32b = showData('information_about_uscis_office_or_port_of_entry_location_where_you');
$pdf->writeHTMLCell( 80, 6, 122,218, " $value_32b", 1, 0, 0, true, 'L' );
//.......................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>32.c</b> </div>';
$pdf->writeHTMLCell( 70, 0, 112,225, $html, '', 0, 0, true, 'L' );
$html = '<div>Outcome of the Application or Petition (for example,<br>
approved, denied, or is pending).</div>';
$pdf->writeHTMLCell( 90, 5, 121,225, $html, '', 0, 0, true, 'L' );

$value_32c = showData('information_about_uscis_office_or_port_of_entry_outcome_of_the_application_type');
$pdf->writeHTMLCell( 80, 6, 122,235, " $value_32c", 1, 0, 0, true, 'L' );

/********************************
******** End Page No 4 **********
*********************************/

/********************************
******** Start Page No 5 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12.5);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 2. Information About You</b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', false);
//...........................


$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>33.   &nbsp;  </b></div>';
$pdf->writeHTMLCell( 94, 0, 12, 24.5, $html, '', 0, 0, true, 'L' );
$html = '<div>Have you <b>EVER</b> been denied or refused an immigration<br>
benefit by the U.S. Government, or had a benefit revoked<br>
or terminated (including but not limited to visas)?</div>';
$pdf->writeHTMLCell( 94, 0, 20, 24.5, $html, '', 0, 0, true, 'L' );


// checked="'.$yes_check.'" 
$yes_check = (showData('info_about_you_revoke_terminate_status') == 'yes') ? 'checked' : '';
$no_check = (showData('info_about_you_revoke_terminate_status') == 'no') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="part2_33" value="Y" checked="'.$yes_check.'"/>   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_33" value="N" checked="'.$no_check.'"/>   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 75, 37, $html, '', 0, 0, true, 'L' );

$html = '<div>If you answered "Yes" to <b>Item Number 33</b>, provide an<br>
explanation the information in the space provided in<br>
<b>Part 8. Additional Information</b>.</div>';
$pdf->writeHTMLCell( 90, 0,20, 43, $html, '', 0, 0, true, 'L' );
//........................................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>34.   &nbsp;  </b></div>';
$pdf->writeHTMLCell( 94, 0, 12, 57, $html, '', 0, 0, true, 'L' );
$html = '<div>Have you <b>EVER</b>, in or outside the United States, been<br>
arrested, cited, charged, indicted, fined, convicted, or<br>
imprisoned for breaking or violating any law or<br>
ordinance, excluding minor traffic violations?</div>';
$pdf->writeHTMLCell( 94, 0, 20, 57, $html, '', 0, 0, true, 'L' );

// checked="'.$yes_check.'" 
$yes_check = (showData('info_about_you_breaking_violating_status') == 'yes') ? 'checked' : '';
$no_check = (showData('info_about_you_breaking_violating_status') == 'no') ? 'checked' : '';

$html = '<div>
<input type="checkbox" name="part2_34" value="Y" checked="'.$yes_check.'"/>   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part2_34" value="N" checked="'.$no_check.'"/>   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 75, 74, $html, '', 0, 0, true, 'L' );

$html = '<div>If you answered "Yes" to <b>Item Number 34</b>., describe the<br>
incidents in detail and include all offenses where impaired<br>
driving may have been an issue in the space provided in<br>
<b>Part 8. Additional Information</b>.</div>';
$pdf->writeHTMLCell( 90, 0,20, 80, $html, '', 0, 0, true, 'L' );
//........................................
//!........................
$pdf->SetFont('times', 'B', 12);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div>Part 3. Biographic Information</div>';
$pdf->writeHTMLCell(90, 5.7, 13, 102, $html, 1, 1, true, true, 'L', false);
//.......

$pdf->SetFont('times', '', 10);
$html= '<div><b>1.   </b>    Ethnicity (Select <b>only one</b> box)</div>';
$pdf->writeHTMLCell(90, 7, 13, 108, $html, 0, 0, false, true, 'J', true);
$pdf->setCellHeightRatio(1.3);
$pdf->SetFont('times', '', 10);


$hispanic_check = (showData('information_about_biography_info_ethnicity') == 'hispanic') ? 'checked' : '';
$nothispanic_check = (showData('information_about_biography_info_ethnicity') == 'nothispanic') ? 'checked' : '';
$html= '<div>
<input type="checkbox" name="Ethnicity" value="Hispanic" checked="'.$hispanic_check.'" />&nbsp;&nbsp; Hispanic or Latino
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 113, $html, '', 0, 0, true, 'L');


$html= '<div>
<input type="checkbox" name="Ethnicity" value="Hispanic" checked="'.$nothispanic_check.'" />&nbsp;&nbsp; Not Hispanic or Latino
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 119, $html, '', 0, 0, true, 'L');

///..................
$pdf->SetFont('times', '', 10);
$html= '<div><b>2.   </b> Race (Select <b>all applicable</b> boxes)</div>';
$pdf->writeHTMLCell(90, 7, 12, 126, $html, 0, 0, false, true, 'L', true);
//................

$american_check = (showData('information_about_biography_american') =='Y') ? 'checked':'';
$asian_check = (showData('information_about_biography_asian') =='Y') ? 'checked':'';
$african_check = (showData('information_about_biography_african') =='Y') ? 'checked':'';
$native_check = (showData('information_about_biography_hawaiian') =='Y') ? 'checked':'';
$white_check = (showData('information_about_biography_white') =='Y') ? 'checked':'';

$html= '<div>
	<input type="checkbox" name="American" value="Hispanic" checked="'.$american_check.'"/>&nbsp;&nbsp; American Indian or Alaska Native
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 132, $html, '', 0, 0, true, 'L');
$html= '<div>
	<input type="checkbox" name="Asian" value="Hispanic" checked="'.$asian_check.'"/>&nbsp;&nbsp; Asian
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 138, $html, '', 0, 0, true, 'L');
$html= '<div>
	<input type="checkbox" name="African" value="Hispanic" checked="'.$african_check.'"/>&nbsp;&nbsp; Black or African American
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 144, $html, '', 0, 0, true, 'L');
$html= '<div>
	<input type="checkbox" name="Islander" value="Hispanic" checked="'.$native_check.'"/>&nbsp;&nbsp; Native Hawaiian or Other Pacific Islander
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 150, $html, '', 0, 0, true, 'L');
$html= '<div>
	<input type="checkbox" name="White" value="Hispanic" checked="'.$white_check.'"/>&nbsp;&nbsp; White
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 156, $html, '', 0, 0, true, 'L');
//..............
 
$pdf->SetFont('times', '', 10);
$html= '<div><b>3.   </b>  Height </div>';
$pdf->writeHTMLCell(30, 7, 12, 163, $html, 0, 0, false, true, 'J', true);
$html= '<div><label for="selection">Feet:</label>
<select name="feet" size="0.25">
    <option value="Feet" disable="true" >Feet</option>
    <option value="2">2 </option>
    <option value="3">3 </option>
    <option value="4">4 </option>
    <option value="5">5 </option>
    <option value="6">6 </option>
    <option value="7">7 </option>
    <option value="8">8 </option>
</select></div>';
$pdf->writeHTMLCell(100, 7, 50, 163, $html, 0, 0, false, true, 'J', true);

$html= '<div><label for="selection">Inches</label>
<select name="inches" size="0.25">
<option value="inches" disable="true" >Inch</option>
    <option value="2">0</option>
    <option value="2">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
</select></div>';
$pdf->writeHTMLCell(90, 7, 74, 163, $html, 0, 0, false, true, 'J', true);

$html= '<div><b>4.    </b>   Weight   </div>';
$pdf->writeHTMLCell(90, 7, 12, 171, $html, 0, 0, false, true, 'J', true);
$html= '<div>Pounds </div>';
$pdf->writeHTMLCell(90, 7, 71, 172, $html, 0, 0, false, true, 'J', true);
//...........

$pdf->TextField('part3_4_pound1', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86, 172);
$pdf->TextField('part3_4_pound2', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 92, 172);
$pdf->TextField('part3_4_pound3', 5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 98, 172);

//...........
$html= '<div><b>5.    </b>  Eye Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 180, $html, 0, 0, false, true, 'J', true);
//.............

$black_color = (showData('information_about_biography_info_eye_color')=="black") ? 'checked':'';
$blue_color = (showData('information_about_biography_info_eye_color')=="blue") ? 'checked':'';
$brown_color = (showData('information_about_biography_info_eye_color')=="brown") ? 'checked':'';
$gray_color = (showData('information_about_biography_info_eye_color')=="gray") ? 'checked':'';
$green_color = (showData('information_about_biography_info_eye_color')=="green") ? 'checked':'';
$hazel_color = (showData('information_about_biography_info_eye_color')=="hazel") ? 'checked':'';
$maroon_color = (showData('information_about_biography_info_eye_color')=="maroon") ? 'checked':'';
$pink_color = (showData('information_about_biography_info_eye_color')=="pink") ? 'checked':'';
$other_color = (showData('information_about_biography_info_eye_color')=="other") ? 'checked':'';


$html= '<div>
<input type="checkbox" name="eyecolore1" value="eyecolore" checked="'.$black_color.'"/>&nbsp;&nbsp; Black
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 186, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore2" value="eyecolore"  checked="'.$blue_color.'"/>&nbsp;&nbsp; Gray
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 192, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore3" value="eyecolore" checked="'.$brown_color.'"/>&nbsp;&nbsp; Maroon

 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 198, $html, '', 0, 0, true, 'L');

///..................
$html= '<div>
<input type="checkbox" name="eyecolore4" value="eyecolore" checked="'.$gray_color.'"/>&nbsp;&nbsp; Blue
 </div>';
$pdf->writeHTMLCell(90, 7,46, 186, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore5" value="eyecolore" checked="'.$green_color.'"/>&nbsp;&nbsp; Green
 </div>';
$pdf->writeHTMLCell(90, 7,46, 192, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore6" value="eyecolore" checked="'.$hazel_color.'"/>&nbsp;&nbsp; Pink

 </div>';
$pdf->writeHTMLCell(90, 7,46, 198, $html, '', 0, 0, true, 'L');
//.................

$html= '<div>
<input type="checkbox" name="eyecolore7" value="eyecolore" checked="'.$maroon_color.'"/>&nbsp;&nbsp; Brown
 </div>';
$pdf->writeHTMLCell(90, 7,72, 186, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore8" value="eyecolore" checked="'.$pink_color.'"/>&nbsp;&nbsp; Hazel
 </div>';
$pdf->writeHTMLCell(90, 7,72, 192, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore9" value="eyecolore" checked="'.$other_color.'"/>&nbsp;&nbsp; Unknown/Other

 </div>';
$pdf->writeHTMLCell(90, 7,72, 198, $html, '', 0, 0, true, 'L');
//..........................

$bald_hairColor = (showData('information_about_biography_info_hair_color')=='bald') ? 'checked':'';
$black_hairColor = (showData('information_about_biography_info_hair_color')=='black') ? 'checked':'';
$blond_hairColor = (showData('information_about_biography_info_hair_color')=='blond') ? 'checked':'';
$brown_hairColor = (showData('information_about_biography_info_hair_color')=='brown') ? 'checked':'';
$gray_hairColor = (showData('information_about_biography_info_hair_color')=='gray') ? 'checked':'';
$red_hairColor = (showData('information_about_biography_info_hair_color')=='red') ? 'checked':'';
$sandy_hairColor = (showData('information_about_biography_info_hair_color')=='sandy') ? 'checked':'';
$white_hairColor = (showData('information_about_biography_info_hair_color')=='white') ? 'checked':'';
$other_hairColor = (showData('information_about_biography_info_hair_color')=='other') ? 'checked':'';

$html= '<div><b>6.    </b>  Hair Color (Select <b>only one</b> box )  </div>';
$pdf->writeHTMLCell(90, 7, 12, 205, $html, 0, 0, false, true, 'J', true);
//!...............420-75
$html= '<div>
<input type="checkbox" name="eyecolore10" value="eyecolore" checked="'.$bald_hairColor.'" />&nbsp;&nbsp; Bald (No hair) 
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 211, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore12" value="eyecolore" checked="'.$brown_hairColor.'"/>&nbsp;&nbsp; Brown
 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 217, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore13" value="eyecolore" checked="'.$sandy_hairColor.'"/>&nbsp;&nbsp; Sandy

 </div>';
$pdf->writeHTMLCell(90, 7,18.5, 223, $html, '', 0, 0, true, 'L');
//................
$html= '<div>
<input type="checkbox" name="eyecolore14" value="eyecolore" checked="'.$black_hairColor.'"/>&nbsp;&nbsp; Black
 </div>';
$pdf->writeHTMLCell(90, 7,51, 211, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore15" value="eyecolore" checked="'.$gray_hairColor.'"/>&nbsp;&nbsp; Gray
 </div>';
$pdf->writeHTMLCell(90, 7,51, 217, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore16" value="eyecolore" checked="'.$white_hairColor.'"/>&nbsp;&nbsp; White

 </div>';
$pdf->writeHTMLCell(90, 7,51, 223, $html, '', 0, 0, true, 'L');

//..............
$html= '<div>
<input type="checkbox" name="eyecolore17" value="eyecolore" checked="'.$blond_hairColor.'"/>&nbsp;&nbsp; Blond
 </div>';
$pdf->writeHTMLCell(90, 7,77, 211, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore18" value="eyecolore" checked="'.$red_hairColor.'"/>&nbsp;&nbsp; Red
 </div>';
$pdf->writeHTMLCell(90, 7,77, 217, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="eyecolore19" value="eyecolore" checked="'.$other_hairColor.'"/>&nbsp;&nbsp; Unknown/Other

 </div>';
$pdf->writeHTMLCell(90, 7,77, 223, $html, '', 0, 0, true, 'L');

//.....................

$pdf->SetFont('times', '', 12.5);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 4. Other Information About You</b></div>';
$pdf->writeHTMLCell(90, 6, 113, 18, $html, 1, 1, true, false, 'L', false);
//......................

$pdf->SetFont('times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 0.5);
$html= '<div>Employment History</div>';
$pdf->writeHTMLCell(90, 6, 113, 28, $html, 0, 1, true, true, 'J', true);

//..........
$pdf->SetFont('times', '', 10);
$html= '<div>Provide your employment history for the last five years,
whether inside or outside the United States. Provide the most
recent employment first. If you need extra space to complete
this section, use the space provided in<b> Part 8. Additional
Information.</b>
<br>
<br>
Employer 1 (current or most recent)
</div>';
$pdf->writeHTMLCell(90, 7, 112, 36, $html, 0, 1, false, true, 'L', true);
//.........
$pdf->SetFont('times', '', 9.8 );
$html= '<div><b>1.  </b>&nbsp;&nbsp;&nbsp;Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 112, 68, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_1_employer_company', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 73.5);
$pdf->SetFont('times', '', 10);
$html= '<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 7, 112, 82, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 9.8 );
$html = '<b>2.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 7, 112, 87.5, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_2a_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144, 90);
//..........
$pdf->SetFont('times', '', 9.8 );
$html= '<div><b>2.b.  </b>  <input type="checkbox" name="apt" value="apt" checked="" /> Apt.   &nbsp;&nbsp; <input type="checkbox" name="ste" value="ste" checked="" /> Ste. &nbsp;&nbsp; <input type="checkbox" name="flr" value="flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell(90, 7, 112, 99, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_2b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 99);
//..........


$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>2.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 108, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_2c_city_or_town', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 108);

$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>2.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>2.e.</b>&nbsp;&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 117, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="part4_2d_state" size="0.30">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 117, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_2e_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 117);

$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>2.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 126, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_2f_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 126);

$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>2.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 135, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_2g_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 135);


$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>2.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 142, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_2h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 148);

//........
$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>3.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Occupation';
$pdf->writeHTMLCell(50, 0, 112, 155, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_3_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 161);
//............

$pdf->SetFont('times', '', 9.8 ); // set font
$html = 'Dates of Employment';
$pdf->writeHTMLCell(50, 0, 112, 168.4,  $html, '', 0, 0, true, 'L'); 
//...........

$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>4.a.</b> &nbsp;&nbsp; From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 175,  $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_4a_date_from', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172.5, 175);
//............
$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>4.b.</b> &nbsp;&nbsp;To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 112, 185, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_4b_date_to', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 172.5, 185);
//..................
$pdf->writeHTMLCell(89.4, 0, 113, 189, "", 'B', 0, 0, true, 'L'); 

/********************************
******** End Page No 5 **********
*********************************/

/********************************
******** Start Page No 6 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 11.5);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html ='<div><b>Part 4. Other Information About You </b> (continued)</div>';
$pdf->writeHTMLCell(90, 6, 13, 18, $html, 1, 1, true, false, 'L', false);

//..............


$pdf->SetFont('times', '', 9.8 );
$html= '<div>Employer 2</div>';
$pdf->writeHTMLCell(90, 4, 12, 24, $html, 0, 1, false, true, 'J', true);

//..........
$pdf->SetFont('times', '', 9.8 );
$html= '<div><b>5.  </b>&nbsp;&nbsp;&nbsp;Name of Employer or Company</div>';
$pdf->writeHTMLCell(90, 3, 12, 29.5, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_5_employer_cmpany', 82, 6.7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 35.5);
$pdf->SetFont('times', '', 10);
$html= '<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(90, 3, 12, 42, $html, 0, 1, false, true, 'J', true);
//...........
$pdf->SetFont('times', '', 9.8 );
$html = '<b>6.a.</b> &nbsp;&nbsp;Street Number<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Name';
$pdf->writeHTMLCell(50, 3, 12, 47, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_6a_street', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 44, 49);
//..........

$employer_apt = (showData('employer2_apt_ste_flr')=='apt') ? 'checked':'';
$employer_ste = (showData('employer2_apt_ste_flr')=='ste') ? 'checked':'';
$employer_flr = (showData('employer2_apt_ste_flr')=='flr') ? 'checked':'';

$pdf->SetFont('times', '', 9.8 );
$html= '<div><b>6.b.  </b>  
<input type="checkbox" name="apt" value="apt" checked="'.$employer_apt.'" /> Apt.&nbsp;&nbsp; 
<input type="checkbox" name="ste" value="ste" checked="'.$employer_ste.'" /> Ste.&nbsp;&nbsp; 
<input type="checkbox" name="flr" value="flr" checked="'.$employer_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(90, 3, 12, 58, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_6b_ste_flr', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 58);
//..........


$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>6.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 12, 67, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_6c_city_or_town', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 67);;

$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>6.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>6.e.</b>&nbsp;&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell(60, 0, 12, 76, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="part4_6d_state" size="0.30">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 29.5, 76, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_6e_zip_code', 32.6, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),69.5, 76);

$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>6.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 12, 84, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_6f_province', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45,85 );

$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>6.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 12, 93, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_6g_postal_code', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),45, 94);


$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>6.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 12, 99, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_6h_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 104.5);

//........
$pdf->SetFont('Times', '', 9.8 ); // set font
$html = '<b>7.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Occupation';
$pdf->writeHTMLCell(50, 0, 12, 110.6, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_7_occupation', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5, 116);
//............

$pdf->SetFont('times', '', 9.8 ); // set font
$html = 'Dates of Employment';
$pdf->writeHTMLCell(50, 0, 12, 124,  $html, '', 0, 0, true, 'L'); 
//...........

$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>8.a.</b> &nbsp;&nbsp;Date From (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 129.7,  $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_8a_date_from', 30, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 129.7);
//............

$pdf->SetFont('times', '', 9.8 ); // set font
$html = '<b>8.b.</b> &nbsp;&nbsp;To (mm/dd/yyyy)';
$pdf->writeHTMLCell(50, 0, 12, 137, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part4_8b_date_to', 30, 6.5, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 72.5, 138); //!..............................

//..................
$pdf->SetFont('times', 'BI', 11.7);
$pdf->setCellPaddings(1, 1, 1, 1);
$html= '<div>Information About Your Parent </div>';
$pdf->writeHTMLCell(90, 5.6, 13,147.7, $html, 0, 1, true, true, 'J', true);

//.........

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Information About Your Mother</div>';
$pdf->writeHTMLCell(50, 0, 12, 155.5, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Mother\'s Legal Name</div>';
$pdf->writeHTMLCell(50, 0, 12, 161, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>9.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 3, 12, 167, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_9a_lastname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 169);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 3, 12, 175.6, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_9b_firstname', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 178);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>9.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 3, 12, 186, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_9c_middlename', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 187);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Mother\'s Name at Birth (if different than above)</div>'; 
$pdf->writeHTMLCell(90, 3, 12, 194, $html, '', 0, 0, true, 'L');

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>10.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 3, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_10a_lastname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 202);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>10.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 3, 12, 209.4, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_10b_firstname_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 211);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 3, 12, 219, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_10c_middlename_at_birth', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 220);

//..............
$pdf->SetFont('times', '', 10);
$html ='<div><b>11. </b> &nbsp; Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 3, 12, 228, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_11_date_of_birth', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 67, 228.5);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>12. </b>  &nbsp;  City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 3, 12, 234.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_12_city_of_birth', 82, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 241);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>13. </b>  &nbsp;  Country of Birth</div>';
$pdf->writeHTMLCell(60, 3, 12, 246.6, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_13_country_of_birth', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 253);
//.........................1st ccolumn done

$pdf->SetFont('times', '', 10);
$html ='<div><b>14. </b>  &nbsp;  Current City or Town of Residence (if living)</div>';
$pdf->writeHTMLCell(90, 3, 112, 17, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_14', 82, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 23);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>15. </b>  &nbsp;  Current Country of Residence (if living)</div>';
$pdf->writeHTMLCell(90, 3, 112, 30, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_15', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 36);


//.............................



$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Information About Your Father</div>';
$pdf->writeHTMLCell(50, 0, 112, 43.5, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Father\'s Legal Name</div>';
$pdf->writeHTMLCell(50, 0, 112, 50, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('times', '', 10);
$html ='<div><b>16.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 3, 112, 56, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_16a', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 57);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>16.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 3, 112, 64, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_16b', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 66);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>16.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 3, 112, 74, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_16c', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 75);
//.......
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>Father\'s Name at Birth (if different than above)</div>'; 
$pdf->writeHTMLCell(90, 3, 112, 83, $html, '', 0, 0, true, 'L');

//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>17.a.  </b>  Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 3, 112, 89, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_17a', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 91);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>17.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 3, 112, 98, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_17b', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 100);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>17.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 3, 112, 109, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_17c', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 109);

//..............
$pdf->SetFont('times', '', 10);
$html ='<div><b>18. </b> &nbsp; Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(70, 3, 112, 118, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 9);
$pdf->TextField('part4_18', 36, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 167, 119);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>19. </b>  &nbsp;  City or Town of Birth</div>';
$pdf->writeHTMLCell(60, 3, 112, 125, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_19', 82, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 132);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>20. </b>  &nbsp;  Country of Birth</div>';
$pdf->writeHTMLCell(60, 3, 112, 138, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_20', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121,145);
//..................
$pdf->SetFont('times', '', 10);
$html ='<div><b>21. </b>  &nbsp;  Current City or Town of Residence (if living)</div>';
$pdf->writeHTMLCell(90, 3, 112, 151, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_21', 82, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 158);
//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>22. </b>  &nbsp;  Current Country of Residence (if living)</div>';
$pdf->writeHTMLCell(90, 3, 112, 164, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_22', 82, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121,171);
//..................
//..................
$pdf->SetFont('times', 'BI', 11.7);
$pdf->setCellPaddings(1, 1, 1, 1);
$html= '<div>Information About Your Marital History </div>';
$pdf->writeHTMLCell(90, 5.6, 113,182, $html, 0, 1, true, true, 'J', true);

//...............
$single_status = (showData('other_information_about_you_marital_status')=='single') ? 'checked':'';
$married_status = (showData('other_information_about_you_marital_status')=='married') ? 'checked':'';
$divorced_status = (showData('other_information_about_you_marital_status')=='divorced') ? 'checked':'';
$widowed_status = (showData('other_information_about_you_marital_status')=='widowed') ? 'checked':'';
$legally_separated_status = (showData('other_information_about_you_marital_status')=='legally_separated') ? 'checked':'';
$marriage_annulled_status = (showData('other_information_about_you_marital_status')=='marriage_annulled') ? 'checked':'';
$other_status = (showData('other_information_about_you_marital_status')=='other') ? 'checked':'';

$pdf->SetFont('times', '', 10);
$html= '<div><b>23.    </b>  What is your current marital status?</div>';
$pdf->writeHTMLCell(90, 7, 112, 191, $html, 0, 0, false, true, 'J', true);
$html= '<div>
<input type="checkbox" name="Part4_5_1" value="Single" checked="'.$single_status.'" />&nbsp;&nbsp; Single, Never Married
 </div>';
$pdf->writeHTMLCell(90, 7,118.5, 197, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="Part4_5_2" value="Widowed" checked="'.$widowed_status.'" />&nbsp;&nbsp; Widowed
 </div>';
$pdf->writeHTMLCell(90, 7,118.5, 204, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="Part4_5_3" value="Annulled" checked="'.$marriage_annulled_status.'" />&nbsp;&nbsp; Marriage Annulled

 </div>';
$pdf->writeHTMLCell(90, 7,118.5, 210, $html, '', 0, 0, true, 'L');
//................
$html= '<div>
<input type="checkbox" name="Part4_5_4" value="Married" checked="'.$married_status.'" />&nbsp;&nbsp; Married
 </div>';
$pdf->writeHTMLCell(90, 7,159, 197, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="Part4_5_5" value="Separated" checked="'.$legally_separated_status.'" />&nbsp;&nbsp; Legally Separated
 </div>';
$pdf->writeHTMLCell(90, 7,146, 204, $html, '', 0, 0, true, 'L');
$html= '<div>
<input type="checkbox" name="Part4_5_6" value="Other" checked="'.$other_status.'" />&nbsp;&nbsp; Other

 </div>';
$pdf->writeHTMLCell(90, 7,158, 210, $html, '', 0, 0, true, 'L');

//..............
$html= '<div>
<input type="checkbox" name="Part4_5_7" value="divorced" checked="'.$divorced_status.'" />&nbsp;&nbsp; Divorced
 </div>';
$pdf->writeHTMLCell(90, 7,181, 197, $html, '', 0, 0, true, 'L');

///.....................


$pdf->SetFont('times', '', 10);
$html= '<div><b>24.    </b>  How many times have you been married (including<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;annulled marriages and marriages to the same person)?</div>';
$pdf->writeHTMLCell(90, 7, 112, 218, $html, 0, 0, false, true, 'J', true);
//....................

$pdf->StartTransform();
$pdf->Rotate( -31 );
$pdf->SetFont( 'zapfdingbats', '', 10 );
$pdf->writeHTMLCell( 40, 7, 193, 236, TCPDF_FONTS::unichr( 116 ), 0, 0, false, 'L' );
$pdf->StopTransform();
//...................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_24', 15, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 189,229);

/********************************
******** End Page No 6 **********
*********************************/

/********************************
******** Start Page No 7 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 4. Other Information About You</b>(continued)
</div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 0, true, true, 'L', true);

//......


//..............
$pdf->SetFont('times', 'I', 12);
$pdf->SetFillColor(220, 220, 220);
$html ='<div><b>Information About Your Current Marriage </b> <br>(including if you are legally separated)</div>';
$pdf->writeHTMLCell(90, 7, 13, 28, $html, 0, 0, true, true, 'L', true);

//.......

$pdf->SetFont('times', '', 10);
$html ='<div>If you are currently married, provide the following information<br>
about your current spouse.<br>
 </div>';
$pdf->writeHTMLCell(100, 7, 12, 42, $html, 0, 1, false, true, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html ='<div>Current Spouse\'s Legal Name
 </div>';
$pdf->writeHTMLCell(100, 7, 12, 53, $html, 0, 1, false, true, 'L', false);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>25.a.    </b>    Family Name <br>  &nbsp;  &nbsp;  &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 58, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_25a', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 60.5);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>25.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 12, 68, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_25b', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 69.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>25.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 12, 78, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_25c', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 45, 79);
//......

$pdf->SetFont('times', '', 10);
$html ='<div><b>26.   </b>  A-Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 87, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('times', '', 11);
$html ='<div><b>A-</b></div>';
$pdf->writeHTMLCell(90, 7, 50, 93.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_26', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 56, 93.5);
///...........
$pdf->StartTransform();
$pdf->Rotate( -31 );
$pdf->SetFont( 'zapfdingbats', '', 10 );
$pdf->writeHTMLCell( 40, 7,46, 101, TCPDF_FONTS::unichr( 116 ), 0, 0, false, 'L' );
$pdf->StopTransform();
// //........
$pdf->SetFont('times', '', 10);
$html ='<div><b>27.   </b>   Current Spouse\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 100.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_27', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 107);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>28.    </b>    Date of Marriage to Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 114, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_28', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 70, 120);

//......

$pdf->SetFont('times', '', 10);
$html ='<div>Current Spouse\'s Place of Birth</div>';
$pdf->writeHTMLCell(90, 7, 12, 127, $html, 0, 1, false, false, 'J', true);
//.......




$pdf->SetFont('times', '', 10);
$html ='<div><b>29.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 134, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_29a', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 140);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>29.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 147, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_29b', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 154);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>29.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 161, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_29c', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 168);


//........ 
$pdf->SetFont('times', '', 10);
$html ='<div>Place of Marriage to Current Spouse</div>';
$pdf->writeHTMLCell(90, 7, 12, 176, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>30.a.   </b>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 12, 185, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_30a', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 190.5);

//........



$pdf->SetFont('times', '', 10);
$html ='<div><b>30.b.   </b>State or Province</div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_30b', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 205);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>30.c.   </b>Country</div>';
$pdf->writeHTMLCell(90, 7, 12, 215, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_30c', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 220.5);
//............................1st column done

























$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><i> <b>Information About Prior Marriages</b>(if any) </i>
</div>';
$pdf->writeHTMLCell(91, 7, 113, 18, $html, "", 0, true, true, 'L', true);
//....................


$pdf->SetFont('times', '', 10);
$html ='<div>If you have been married before, whether in the United States or<br>
in any other country, provide the information requested in <b>Item<br>
Numbers 31.a. - 36.c.</b> about your prior marriage. If you have<br>
had more than one previous marriage, use the space provided in<br>
<b>Part 8. Additional Information</b> to provide the answers to <b>Item<br>
Numbers 31.a. - 36.c.</b> for each additional marriage.<br>
 </div>';
$pdf->writeHTMLCell(100, 7, 112, 27, $html, 0, 1, false, true, 'L', false);


//.............................

$pdf->SetFont('times', '', 10);
$html ='<div>Prior Spouse\'s Legal Name (provide family name before<br>
marriage)
 </div>';
$pdf->writeHTMLCell(100, 7, 112, 55, $html, 0, 1, false, true, 'L', false);

$pdf->SetFont('times', '', 10);
$html ='<div><b>31.a.    </b>    Family Name <br>  &nbsp;  &nbsp;  &nbsp; &nbsp;  (Last Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 64, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_31a', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 66);
//............
$pdf->SetFont('times', '', 10);
$html ='<div><b>31.b.  </b>  Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell(35, 10, 112, 74, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_31b', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 75.5);

//.......
$pdf->SetFont('times', '', 10);
$html ='<div><b>31.c.  </b>  Middle Name  </div>';
$pdf->writeHTMLCell(35, 10, 112, 84, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_31c', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 84.5);
//......
$pdf->SetFont('times', '', 10);
$html ='<div><b>32.   </b>  Prior Spouse\'s Date of Birth (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 92, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_32', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 98);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>33.    </b>    Date of Marriage to Prior Spouse (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 105.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_33', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 170, 111);

//......

$pdf->SetFont('times', '', 10);
$html ='<div>Place of Marriage to Prior Spouse </div>';
$pdf->writeHTMLCell(90, 7, 112, 118, $html, 0, 1, false, false, 'J', true);
//.......

$pdf->SetFont('times', '', 10);
$html ='<div><b>34.a.   </b>   City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 126, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_34a', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 132);

//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>34.b.   </b>    State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 141, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_34b', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 148);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>34.c.   </b>    Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 155, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_34c', 80, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 122, 162);

//........


$pdf->SetFont('times', '', 10);
$html ='<div><b>35.    </b>   Date Marriage with Prior Spouse Legally Ended<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 169.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_35', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 169, 176);

//........ 
$pdf->SetFont('times', '', 10);
$html ='<div>Place Where Marriage with Prior Spouse Legally Ended</div>';
$pdf->writeHTMLCell(90, 7, 112, 184, $html, 0, 1, false, false, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>36.a.   </b>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 112, 193, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_36a', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 198);

//........



$pdf->SetFont('times', '', 10);
$html ='<div><b>36.b.   </b>State or Province</div>';
$pdf->writeHTMLCell(90, 7, 112, 207.5, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_36b', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 213);
//.........


$pdf->SetFont('times', '', 10);
$html ='<div><b>36.c.   </b>Country</div>';
$pdf->writeHTMLCell(90, 7, 112, 220, $html, 0, 1, false, false, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part4_36c', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121, 225.5);

/********************************
******** End Page No 7 **********
*********************************/

/********************************
******** Start Page No 8 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 5. Applicant's Statement, Contact
Information, Declaration, Certification, and
Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 13, 17, $html, 1, 1, true, 'L' );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-192 <br>
Instructions before completing this section.</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 34, $html, '', 0, 0, true, 'L' );

//.........

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Statement</i></b></div>";
$pdf->writeHTMLCell( 92, 6.5, 13, 46, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.6 );
$html = "<div><b>NOTE:</b>  Select the box for either <b>Item Number 1.a.</b> or <b>1.b</b>. If
applicable, select the box for <b>Item Number 2</b>.
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 54.5, $html, '', 0, 0, true, 'L' );

//.........

$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

$applicant_1a = (showData('I_can_read_and_understand_status')=='Y') ? 'checked':'';

$html = '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="part_5_1a" value="1" checked="'.$applicant_1a.'" /></div>';
$pdf->writeHTMLCell( 93, 12, 12, 65, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I can read and understand English, and I have read
and understand every question and instruction on this
application and my answer to every question.</div>';
$pdf->writeHTMLCell( 90, 12, 26, 65, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

$applicant_1b = (showData('The_interpreter_named_in_status')=='Y') ? 'checked':'';

$html = '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="part_5_1b" value="1" checked="'.$applicant_1b.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 79, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>The interpreter named in <b>Part 6.</b> read to me every <br>
question and instruction on this application and my   <br>
answer to every question in</div>';
$pdf->writeHTMLCell( 90, 5, 26, 79, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 95.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','

$part_5_1b = showData('i_192_part5_1b_applicant_answer_question');
$pdf->writeHTMLCell( 76, 7, 26, 91.5, " $part_5_1b", 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 97.9, $html, 0, 0, false, 'L' );

//.........

$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

$applicant_2 = (showData('language_in_which_fluent_status')=='Y') ? 'checked':'';

$html = '<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="part_5_2" value="1" checked="'.$applicant_2.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 108, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>At my request, the preparer named in <b>Part 7.</b>,</div>';
$pdf->writeHTMLCell( 90, 5, 26, 108, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 102, 115.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$part_5_2 = showData('i_192_part5_2_applicant_answer_question');
$pdf->writeHTMLCell( 76, 7, 26.5, 112.5, " $part_5_2", 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>prepared this application for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 119, $html, 0, 0, false, 'L' );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 132, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>3.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 140, $html, 0, 1, false, false, 'J', true );
$html = "<div>Applicant's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20, 140, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('applicant_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 145.5);

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 153.5, $html, 0, 1, false, false, 'J', true );
$html = "<div>Applicant's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 153.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('applicant_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 160);

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 167, $html, 0, 1, false, false, 'J', true );
$html = "<div>Applicant's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 167, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('applicant_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 173);

//.........

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Declaration and Certification</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 184, $html, '', 1, true, false, 'L', true );

//.........

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
$pdf->writeHTMLCell( 95, 10, 12.5, 193, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I understand that DHS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 17, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>1)</b>&nbsp;&nbsp; I reviewed and understood all of the information<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; contained in, and submitted with, my application; and
</div>';
$pdf->writeHTMLCell( 90, 10, 120, 38, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>2)</b> &nbsp;All of this information was complete, true, and correct <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; at the time of filing.
</div>';
$pdf->writeHTMLCell( 90, 10, 120, 50.5, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I certify, under penalty of perjury, that all of the information in
my application and any document submitted with it were
provided or authorized by me, that I reviewed and understand
all of the information contained in, and submitted with, my
application and that all of this information is complete, true,
and correct.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 63, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Applicant's Signature</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 92, $html, '', 1, true, false, 'L', true );

//.........

$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>6.a. </b> &nbsp; Applicant's Signature</div>";
$pdf->writeHTMLCell( 92, 7, 112.5, 101, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 82, 7, 122.5, 106, '', 1, 0, false, 'L' );

//.........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>6.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 112.5, 116, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField('applicant_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174, 116);

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE TO ALL APPLICANTS: </b>   If you do not completely fill
out this application or fail to submit required documents listed
in the Instructions, USCIS may deny your application.
<br><br>';
$pdf->writeHTMLCell( 95, 10, 112.5, 127, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 6. Interpreter's Contact Information,
Certification, and Signature</b></div>";
$pdf->writeHTMLCell( 92, 12, 112.5, 147, $html, 1, 1, true, 'L' );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Provide the following information about the interpreter.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 160.6, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 168, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5,177, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5,177, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_family_last_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 183 );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 190, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 190, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_family_given_first_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 196 );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112.5, 204, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 204, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_business_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 210 );

/********************************
******** End Page No 8 **********
*********************************/

/********************************
******** Start Page No 9 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 6. Interpreter's Contact Information,
Certification, and Signature</b>(continued)</div>";
$pdf->writeHTMLCell( 92, 2, 12, 17.5, $html, 1, 1, true, 'L' );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 6, 12, 32, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>3.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 39, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 40 );

//.........

$pdf->SetFont( 'times', '', 9.7 );

$i_192_interpreter_apt= (showData('i_192_interpreter_mailing_address_apt_ste_flr')=='apt') ? 'checked':'';
$i_192_interpreter_ste= (showData('i_192_interpreter_mailing_address_apt_ste_flr')=='ste') ? 'checked':'';
$i_192_interpreter_flr= (showData('i_192_interpreter_mailing_address_apt_ste_flr')=='flr') ? 'checked':'';

$html = '<div><b>3.b. </b> 
<input type="checkbox" name="P6_3b_Apt" value="Apt" checked="'.$i_192_interpreter_apt.'" /> Apt. &nbsp;&nbsp;
<input type="checkbox" name="p6_3b_Ste" value="Ste" checked="'.$i_192_interpreter_ste.'" /> Ste. 
<input type="checkbox" name="p6_3b_Flr" value="Flr" checked="'.$i_192_interpreter_flr.'" /> Flr.
</div>';
$pdf->writeHTMLCell( 61, 0, 12, 51, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_apt_ste_flr_value', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 50 );

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 60, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42.6, 60);

//.........

$pdf->SetFont( 'times', '', 10 );
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 70.3, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$html = '<select name="i_192_interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell( 25, 5, 29.5, 70, $html, '', 0, 0, true, 'L' );

//.........

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 70);

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 80, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 80);

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 90, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_postal_code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 44, 90);

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 98, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mailing_address_country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 104);

//.........

$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 92, 6, 12, 115, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 123, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 123, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 128.4);

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 136, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 136, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 141.5);

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 149, $html, 0, 1, false, false, 'J', true );
$html = "<div>Interpreter's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20.5, 149, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 154);

//.........

$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Certification </i></b></div>";
$pdf->writeHTMLCell( 92, 7, 12, 164, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>I certify, under penalty of perjury, that:
</div>';
$pdf->writeHTMLCell( 95, 5, 12, 172, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I am fluent in English and
</div>';
$pdf->writeHTMLCell( 95, 5, 12, 177, $html, 0, 1, 0, true, 'L', false, false );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_certification_language_skill', 50, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 53, 176.2 );
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

//.........

$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Interpreter's Signature</i></b></div>";
$pdf->writeHTMLCell( 92, 6, 12, 214, $html, '', 1, true, false, 'L', true );

//.........

$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>7.a. </b> &nbsp; Interpreter's Signature</div>";
$pdf->writeHTMLCell( 92, 7, 12, 220, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 82, 7, 21.8, 225, '', 1, 0, false, 'L' );

//.........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>7.b. </b>&nbsp;  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 235, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_interpreter_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 74, 234 );

//.........

$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant</b></div>";
$pdf->writeHTMLCell( 92, 2, 112, 17.5, $html, 1, 1, true, 'L' );

//.........

$pdf->SetFont( 'times', '', 10 );
$html = "<div>Provide the following information about the preparer.
</div>";
$pdf->writeHTMLCell( 95, 5, 111, 35, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Full Name</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112, 45, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 55, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Family Name (Last Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 55, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_family_last_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 60 );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 67, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Given Name (First Name)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 67, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_family_given_first_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 72 );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>2.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 79, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Business or Organization Name (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 79, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_business_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 84 );

//.........

$pdf->SetFont( 'times', '', 11.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Mailing Address</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 95, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 103, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mailing_address_street_number', 61, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 104 );

//.........

$pdf->SetFont( 'times', '', 9.7 );

if(showData('i_192_preparer_mailing_address_apt_ste_flr')=='apt') $i_192_preparer_apt='checked'; else $i_192_preparer_apt='';
if(showData('i_192_preparer_mailing_address_apt_ste_flr')=='ste') $i_192_preparer_ste='checked'; else $i_192_preparer_ste='';
if(showData('i_192_preparer_mailing_address_apt_ste_flr')=='flr') $i_192_preparer_flr='checked'; else $i_192_preparer_flr='';

$html = '<div><b>3.b. </b> <input type="checkbox" name="P7_3b_Apt" value="Apt" checked="'.$i_192_preparer_apt.'" /> Apt. &nbsp;&nbsp;<input type="checkbox" name="p7_3b_Ste" value="Ste" checked="'.$i_192_preparer_ste.'" /> Ste. <input type="checkbox" name="p7_3b_Flr" value="Flr" checked="'.$i_192_preparer_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 113, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mailing_address_apt_ste_flr_value', 44, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 112.5 );

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 122, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mailing_address_city_town', 61.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 121.5 );

//.........

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 132, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );

//.........

$html = '<select name="i_192_preparer_mailing_address_state" size="0.25">';
$html .= '<option value=""> </option>';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 131, $html, '', 0, 0, true, 'L' );

//.........

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mailing_address_zip_code', 34, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 131 );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 142, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mailing_address_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 141 );

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 150, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mailing_address_postal_code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 144, 150 );

//.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 156.4, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'i_192_preparer_mailing_address_country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 163 );

//.........

$pdf->SetFont( 'times', '', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Preparer's Contact Information</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 112, 175, $html, '', 1, true, false, 'L', true );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 182, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Daytime Telephone Number</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 182, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 187.7 );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 195, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 195, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 200 );

//.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.</b></div>';
$pdf->writeHTMLCell( 35, 0, 112, 208, $html, 0, 1, false, false, 'J', true );
$html = "<div>Preparer's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 120.5, 208, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField('i_192_preparer_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 121, 213 );

/********************************
******** End Page No 9 **********
*********************************/

/********************************
******** Start Page No 10********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );

$pdf->SetFont('times', '', 12);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 0, 1); 
$html ='<div><b>Part 7. Contact Information, Declaration, and
Signature of the Person Preparing this
Application, if Other Than the Applicant 
</b> (continued)</div>';
$pdf->writeHTMLCell(90, 7, 13, 18, $html, 1, 1, true, false, 'L', true);

//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Statement</i></b></div>';
$pdf->writeHTMLCell(90, 6, 13, 43.6, $html, 0, 1, true, false, 'L', true);

//.........

$attorney_7a = (showData('i_192_7a_attorney_status')=='Y') ? 'checked':'';
$attorney_7b = (showData('i_192_7b_attorney_status')=='Y') ? 'checked':'';
$attorney_7b_extend = (showData('i_192_7b_extend_status')=='Y') ? 'checked':'';
$attorney_7b_dosnt = (showData('i_192_7b_doesnt_extend_status')=='Y') ? 'checked':'';


$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.   </b>    <input type="checkbox" name="p7_7a_agree" value="Y" checked="'.$attorney_7a.'" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 51, $html, 0, 1, false, true, 'J', true);
$html ='<div> I am not an attorney or accredited representative but 
<br> have prepared this request on behalf of the requestor 
<br> and with the requestor\'s consent. </div>';
$pdf->writeHTMLCell(90, 7, 25, 51, $html, 0, 1, false, true, 'J', true);

//.........

$html = '<div><b>7.b.  </b> &nbsp; <input type="checkbox" name="p7_7b_agree" value="1" checked="'.$attorney_7b.'" /></div>';
$pdf->writeHTMLCell( 15, 12, 12, 64, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I am an attorney or accredited representative and my
representation of the applicant  in this  case <br>
<input type="checkbox" name="p7_7b_extend" value="1" checked="'.$attorney_7b_extend.'" />  extends  <input type="checkbox" name="p7_7b_doesnt" value="1" checked="'.$attorney_7b_dosnt.'" /> does not extend beyond the <br> preparation of this application.</div>';
$pdf->writeHTMLCell( 90, 12, 25, 64, $html, 0, 1, 0, true, 'L', false, false );

/* $pdf->SetLineStyle( array( 'width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array( 0, 0, 0 ) ) );
$pdf->setCellHeightRatio(0);
$pdf->writeHTMLCell( 3, 3, 26, 72.5, '', 1, 1, 0, true, 'L', true, false );
$pdf->writeHTMLCell( 3, 3, 45, 72.5, '', 1, 1, 0, true, 'L', true, false ); */

$pdf->setCellHeightRatio(1.1);

//.........

$html = '<div><b>NOTE: </b> If you are an attorney or accredited
representative, you may need to submit a completed
Form G-28, Notice of Entry of Appearance as
Attorney or Accredited Representative, or Form
G-28I, Notice of Entry of Appearance as Attorney In
Matters Outside the Geographical Confines of the
United States, with this application.</div>';
$pdf->writeHTMLCell( 80, 12, 25, 81, $html, 0, 1, 0, true, 'L', false, false );

//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Certification</i></b></div>';
$pdf->writeHTMLCell(90, 6, 13, 111, $html, 0, 1, true, false, 'L', true);

//.........

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
$pdf->writeHTMLCell(95, 7, 12, 118, $html, 0, 1, false, true, 'L', true);

//.........

$pdf->SetFillColor(220,220,220);
$pdf->SetFont('times', '', 11); // set font
$pdf->setCellHeightRatio(1.1);
$pdf->setCellPaddings(1, 0.5, 1, 0.5); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html ='<div><b><i>Preparer\'s Signature</i></b></div>';
$pdf->writeHTMLCell(90, 6, 13, 161, $html, 0, 1, true, false, 'L', true);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.a.</b> &nbsp;&nbsp;Preparer\'s Signature</div>';
$pdf->writeHTMLCell(92, 7, 12, 168, $html, 0, 1, false, true, 'J', true);

//.........

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(83, 7, 20, 173, "", 1, 1, false, true, 'C', true);

//..........

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.b.</b> &nbsp;&nbsp;Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 12, 183, $html, 0, 1, false, true, 'J', true);

//..........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_sign_date', 30, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 182);

/********************************
******** End Page No 10 *********
*********************************/

/********************************
******** Start Page No 11 *******
*********************************/

$pdf->AddPage( 'P', 'LETTER' );
$pdf->setFillColor( 220, 220, 220 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0,0 ,0 , 0 );
$pdf->SetFont( 'times', 'B', 9.7 );
$pdf->SetFontSize( 11.6 );
$html = '<div>Part 8. Additional Information </div>';
$pdf->writeHTMLCell( 92, 6, 13, 18, $html, 1, 1, true, 'L' );

//.........

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

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 61, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_last_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 63);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell(35, 7, 12, 71, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_first_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 72);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell(35, 7, 12, 81, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_middle_name', 62, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 81);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b> &nbsp;&nbsp; A-Number (if any) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>A-</b></div>';
$pdf->writeHTMLCell(49, 7, 12, 90.3, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 58, 90);
$pdf->Image('images/right_angle.jpg', 48.5, 91, 3.5, 3.5, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.a. </b>&nbsp;&nbsp;Page Number</div>';
$pdf->writeHTMLCell(32, 7, 12, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_3a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 104);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 43, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_3b_part_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 52, 104);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 75, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_3c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 85, 104);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>3.d. </b></div>';
$pdf->writeHTMLCell(10, 7, 12, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_3d', 83.5, 64, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array("v"=>showData("i_192_additional_info_3d")), 21, 113);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.a. </b>&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 12, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_4a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 186);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 43, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_4b_part_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50, 186);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 75, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_4c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 84, 186);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.d. </b></div>';
$pdf->writeHTMLCell(10, 7, 12, 194, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_4d', 83.5, 62, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array("v"=>showData("i_192_additional_info_4d")), 21, 195);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.a. </b>&nbsp;&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 111.3, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_5a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120.4, 23);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_5b_part_no', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 23);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 17, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_5c_item_no', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 23);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 111.3, 30.4, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_5d', 83, 64,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array("v"=>showData("i_192_additional_info_5d")), 120.5, 31.5);

//..........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.a. </b>&nbsp;&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 111.3, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_6a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120.4, 104);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_6b_part_no', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 104);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_6c_item_no', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 182, 104);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 111.3, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('i_192_additional_info_6d', 83, 64,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array("v"=>showData("i_192_additional_info_6d")), 120.5, 113);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.a. </b>&nbsp;&nbsp;Page Number</div>';
$pdf->writeHTMLCell(30, 7, 111.3, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_7a_page_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120.4, 186);

//.........


$pdf->setFont('Times', '', 10);
$html= '<div><b>7.b. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(30, 7, 145, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_7b_part_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 152, 186);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 175, 180, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_192_additional_info_7c_item_no', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 186);

//.........

$pdf->setFont('Times', '', 10);
$html= '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 111.3, 194, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('i_192_additional_info_7d', 83, 62,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array("v"=>showData("i_192_additional_info_7d")), 120.5, 195);


// ".showData('')."



$js = "
var fields = {

	// Page 1

	'attorney_uscis_online_number': ' ".showData('attorney_uscis_online_account_number')." ',
	'attorney_statebar_number': ' ".showData('attorney_state_bar_number')." ',
	'volga_number':' ".showData('volag_number')." ',
	'part2_1a_legal_lastname': ' ".showData('information_about_you_family_last_name')." ',
	'part2_1b_legal_firstname': ' ".showData('information_about_you_given_first_name')." ',
	'part2_1c_legal_middlename': ' ".showData('information_about_you_middle_name')." ',
	
	// Page 2

	'part2_2a_lastname': ' ".showData('information_about_you_other_family_last_name_2a')." ',
	'part2_2b_firstname': ' ".showData('information_about_you_other_given_first_name_2b')." ',
	'part2_2c_middlename': ' ".showData('information_about_you_other_middle_name_2c')." ',
	
	'part2_3a_lastname': ' ".showData('information_about_you_other_family_last_name_3a')." ',
	'part2_3b_firstname':' ".showData('information_about_you_other_given_first_name_3b')." ',
	'part2_3c_middlename': ' ".showData('information_about_you_other_middle_name_3c')." ',
	
	'part2_4': ' ".showData('other_information_about_you_alien_registration_number')." ',
	'part2_5': ' ".showData('other_information_about_you_uscis_online_account_number')." ',
	'part2_6': ' ".showData('other_information_about_you_date_of_birth')."',
	'part2_8a': ' ".showData('information_about_you_city_town_village')."',
	'part2_8b': ' ".showData('information_about_you_state_province')."',
	'part2_8c': ' ".showData('other_information_about_you_country_of_birth')."',
	'part2_9': ' ".showData('other_information_about_you_country_of_citizen')."',

	'part2_10a_careName': ' ".showData('information_about_you_mailing_care_of_name')."',
	'part2_10b_street_number': ' ".showData('information_about_you_address_street_number')." ',
	'part2_10c_apt_ste': ' ".showData('information_about_you_mailing_apt_ste_flr_value')." ',
	'part2_10d_city_town': ' ".showData('information_about_you_mailing_city_town')." ',
	'part2_10e_state': ' ".showData('information_about_you_mailing_state')."',
	'part2_10f_zip_code':' ".showData('information_about_you_mailing_zip_code')." ',
	'part2_10g_province': ' ".showData('information_about_you_mailing_province')."',
	'part2_10h_Postal_Code': ' ".showData('information_about_you_mailing_postal_code')."',
	'part2_10i_Country': ' ".showData('information_about_you_mailing_country')."',

	'part2_11a_careName': ' ".showData('information_about_you_safe_mailing_care_of_name')." ',
	'part2_11b_organizationName': ' ".showData('information_about_you_safe_mailing_organization_name')."',
	'part2_11c_street_number': ' ".showData('information_about_you_safe_mailing_street_number')."',
	'part2_11d_apt_ste': ' ".showData('information_about_you_safe_mailing_apt_ste_flr_value')." ',
	'part2_11e_city_town': ' ".showData('information_about_you_safe_mailing_city_town')."',
	'part2_11f_state': ' ".showData('information_about_you_safe_mailing_state')."',
	'part2_11g_zip_code': ' ".showData('information_about_you_safe_mailing_zip_code')."',
	'part2_11h_province': ' ".showData('information_about_you_safe_mailing_province')." ',
	'part2_11i_Postal_Code': ' ".showData('information_about_you_safe_mailing_postal_code')." ',
	'part2_11j_Country': ' ".showData('information_about_you_safe_mailing_country')." ',

	// Page 3

	'part2_12a_street_number': ' ".showData('information_about_you_home_street_number')."',
	'part2_12b_apt_ste': ' ".showData('information_about_you_home_apt_ste_flr_value')." ',
	'part2_12c_city_town':' ".showData('information_about_you_home_city_town')."',
	'part2_12d_state': ' ".showData('information_about_you_home_state')."',
	'part2_12e_zip_code': ' ".showData('information_about_you_home_zip_code')."',
	'part2_12f_province': ' ".showData('information_about_you_home_province')."',
	'part2_12g_Postal_Code': ' ".showData('information_about_you_home_postal_code')."',
	'part2_12h_Country': '".showData('information_about_you_home_country')." ',
	'part2_13a': ' ".showData('information_about_you_residence_from_date')."',
	'part2_13b': ' ".showData('information_about_you_residence_to_date')."',


	'part2_14a_street_number': ' ".showData('information_about_you_home_street_number2')."',
	'part2_14b_apt_ste': ' ".showData('information_about_you_home_apt_ste_flr_value2')."',
	'part2_14c_city_town':' ".showData('information_about_you_home_city_town2')."',
	'part2_14d_state':' ".showData('information_about_you_home_state2')."',
	'part2_14e_zip_code':' ".showData('information_about_you_home_zip_code2')."',
	'part2_14f_province':' ".showData('information_about_you_home_province2')."',
	'part2_14g_Postal_Code':' ".showData('information_about_you_home_postal_code2')."',
	'part2_14h_Country':' ".showData('information_about_you_home_country2')."',
	'part2_15a':' ".showData('information_about_you_residence_from_date2')."',
	'part2_15b':' ".showData('information_about_you_residence_to_date2')."',

	'P2_14b_Apt':' ".showData('')."',
	'P2_14b_Ste':' ".showData('')." ',
	'P2_14b_Flr':' ".showData('')."',

	'part2_16a':' ".showData('information_about_you_home_street_number3')."',
	'part2_16b':' ".showData('information_about_you_home_apt_ste_flr_value3')." ',
	'part2_16c':' ".showData('information_about_you_home_city_town3')."',
	'part2_16d':' ".showData('information_about_you_home_state3')."',
	'part2_16e':' ".showData('information_about_you_home_zip_code3')."',
	'part2_16f':' ".showData('information_about_you_home_province3')."',
	'part2_16g':' ".showData('information_about_you_home_postal_code3')."',
	'part2_16h':' ".showData('information_about_you_home_country3')."',
	'part2_17a':' ".showData('information_about_you_residence_from_date3')."',
	'part2_17b':' ".showData('information_about_you_residence_to_date3')."',

	'part2_18a':' ".showData('information_about_you_home_street_number4')."',
	'part2_18b':' ".showData('information_about_you_home_apt_ste_flr_value4')." ',
	'part2_18c':' ".showData('information_about_you_home_city_town4')."',
	'part2_18d':' ".showData('information_about_you_home_state4')."',
	'part2_18e':' ".showData('information_about_you_home_zip_code4')."',
	'part2_18f':' ".showData('information_about_you_home_province4')."',
	'part2_18g':' ".showData('information_about_you_home_postal_code4')."',
	'part2_18h':' ".showData('information_about_you_home_country4')."',
	'part2_19a':' ".showData('information_about_you_residence_from_date4')."',
	'part2_19b':' ".showData('information_about_you_residence_to_date4')."',

	// Page 4

	'part2_20a_city':' ".showData('information_about_you_travel_info_city')."',
	'part2_20b_state':' ".showData('information_about_you_travel_info_state')."',
	'part2_21':' ".showData('information_about_you_travel_info_port_of_entry')."',
	'part2_22':' ".showData('information_about_you_travel_info_plan_to_travel')."',
	'part2_23':' ".showData('information_about_you_travel_info_plan_to_enter')."',
	'part2_24':' ".showData('information_about_you_travel_info_approximate_length_of_stay')."',
	'part2_25':' ".showData('information_about_you_travel_info_explain_fully_purpose_of_stay')."',

	'part2_28':' ".showData('information_about_immigration_and_criminal_history_date_applic')."',
	'part2_29a':' ".showData('information_about_uscis_office_or_port_of_entry')."',
	'part2_29b':' ".showData('information_about_uscis_office_or_port_of_entry_city_or_town')."',
	'part2_29c':' ".showData('information_about_uscis_office_or_port_of_entry_state_or_province')."',
	'part2_29d':' ".showData('information_about_uscis_office_or_port_of_entry_country')."',
	'part2_29e':' ".showData('information_about_uscis_office_or_port_of_entry_receipt_numb')."',

	// Page 5

	'feet': ' ".showData('information_about_biography_info_height_feet')."',
	'inches': ' ".showData('information_about_biography_info_height_inches')."',
	'part3_4_pound1': ' ".showData('information_about_biography_info_weight_pounds1')."',
	'part3_4_pound2': ' ".showData('information_about_biography_info_weight_pounds2')."',
	'part3_4_pound3': ' ".showData('information_about_biography_info_weight_pounds3')."',
	'part4_1_employer_company':' ".showData('employer1_name')."',
	'part4_2a_street': ' ".showData('employer1_address')."',
	'part4_2b_ste_flr': ' ".showData('employer1_apt_ste_flr_value')." ',
	'part4_2c_city_or_town': ' ".showData('employer1_city_or_town')."',
	'part4_2d_state': ' ".showData('employer1_state')."',
	'part4_2e_zip_code': ' ".showData('employer1_zip_code')."',
	
	'part4_2f_province': ' ".showData('employer1_province')."',
	'part4_2g_postal_code': ' ".showData('employer1_postal_code')."',
	'part4_2h_country': ' ".showData('employer1_country')."',
	'part4_3_occupation': ' ".showData('employer1_occupation')."',
	'part4_4a_date_from': ' ".showData('employer1_from_date')."',
	'part4_4b_date_to': ' ".showData('employer1_to_date')."',

	// Page 6

	'part4_5_employer_cmpany': ' ".showData('employer2_name')."',
	'part4_6a_street': ' ".showData('employer2_address')."',
	'part4_6b_ste_flr': ' ".showData('employer2_apt_ste_flr_value')." ',
	'part4_6c_city_or_town': ' ".showData('employer2_city_or_town')."',
	'part4_6d_state': ' ".showData('employer2_state')."',
	'part4_6e_zip_code': ' ".showData('employer2_zip_code')."',
	'part4_6f_province': ' ".showData('employer2_province')."',
	'part4_6g_postal_code': ' ".showData('employer2_postal_code')."',
	'part4_6h_country': ' ".showData('employer2_country')."',
	'part4_7_occupation': ' ".showData('employer2_occupation')."',
	'part4_8a_date_from': ' ".showData('employer2_from_date')."',
	'part4_8b_date_to': ' ".showData('employer2_to_date')."',
	'part4_9a_lastname':' ".showData('information_about_your_mother_family_last_name')." ',
	'part4_9b_firstname': ' ".showData('information_about_your_mother_given_first_name')." ',
	'part4_9c_middlename': ' ".showData('information_about_your_mother_middle_name')." ',
	'part4_10a_lastname_at_birth': ' ".showData('mother_last_name_at_birth')."',
	'part4_10b_firstname_at_birth': ' ".showData('mother_first_name_at_birth')."',
	'part4_10c_middlename_at_birth': ' ".showData('mother_middle_name_at_birth')."',	
	'part4_11_date_of_birth': ' ".showData('mother_date_of_birth')."',
	'part4_12_city_of_birth': ' ".showData('mother_city_of_birth')."',
	'part4_13_country_of_birth': ' ".showData('mother_country_of_birth')."',
	'part4_14':' ".showData('mother_city_town_of_residence')."',
	'part4_15':' ".showData('mother_country_of_residence')."',
	'part4_16a': ' ".showData('information_about_your_father_family_last_name')."',
	'part4_16b': ' ".showData('information_about_your_father_given_first_name')."',
	'part4_16c': ' ".showData('information_about_your_father_middle_name')."',
	'part4_17a': ' ".showData('father_last_name_at_birth')."',
	'part4_17b': ' ".showData('father_first_name_at_birth')."',
	'part4_17c': ' ".showData('father_middle_name_at_birth')."',
	'part4_18': ' ".showData('father_date_of_birth')."',
	'part4_19':' ".showData('father_city_town_of_birth')."',
	'part4_20':' ".showData('father_country_of_birth')."',
	'part4_21': ' ".showData('father_city_town_of_residence')."',
	'part4_22': ' ".showData('father_country_of_residence')."',

	// Page 7

	'part4_24': ' ".showData('total_married')."',
	'part4_25a': ' ".showData('current_spouse_last_name')."',
	'part4_25b': ' ".showData('current_spouse_first_name')."',
	'part4_25c': ' ".showData('current_spouse_middle_name')."',
	'part4_26': ' ".showData('current_spouse_a_number')."',
	'part4_27': ' ".showData('current_spouse_birth_date')."',
	'part4_28': ' ".showData('current_spouse_marriage_date')."',
	'part4_29a': ' ".showData('current_spouse_birth_place_city_town')."',
	'part4_29b': ' ".showData('current_spouse_birth_place_province')."',
	'part4_29c': ' ".showData('current_spouse_birth_place_country')."',

	'part4_30a': ' ".showData('current_spouse_marriage_place_city_town')."',
	'part4_30b': ' ".showData('current_spouse_marriage_place_province')."',
	'part4_30c': ' ".showData('current_spouse_marriage_place_country')."',
	'part4_31a': ' ".showData('prior_spouse_last_name')."',
	'part4_31b': ' ".showData('prior_spouse_first_name')."',
	'part4_31c': ' ".showData('prior_spouse_middle_name')."',
	'part4_32': ' ".showData('prior_spouse_birth_date')."',
	'part4_33': ' ".showData('prior_spouse_marriage_date')."',
	'part4_34a': ' ".showData('prior_spouse_marriage_place_city_town')."',
	'part4_34b': ' ".showData('prior_spouse_marriage_place_province')."',
	'part4_34c': ' ".showData('prior_spouse_marriage_place_country')."',
	'part4_35': ' ".showData('prior_spouse_marriage_legally_ended_date')."',
	'part4_36a': ' ".showData('prior_spouse_marriage_legally_ended_city_town')."',
	'part4_36b': ' ".showData('prior_spouse_marriage_legally_ended_province')."',
	'part4_36c': ' ".showData('prior_spouse_marriage_legally_ended_country')."',

	// page 8

	'applicant_daytime_tel':' ".showData('i_192_applicant_daytime_tel')."',
	'applicant_mobile':' ".showData('i_192_applicant_mobile')."',
	'applicant_email':' ".showData('i_192_applicant_email')."',
	'applicant_sign_date':' ".showData('i_192_applicant_sign_date')."',
	'i_192_interpreter_family_last_name':' ".showData('i_192_interpreter_family_last_name')."',
	'i_192_interpreter_family_given_first_name':' ".showData('i_192_interpreter_family_given_first_name')."',
	'i_192_interpreter_business_name':' ".showData('i_192_interpreter_business_name')."',

	// page 9

	'i_192_interpreter_mailing_address_street_number':' ".showData('i_192_interpreter_mailing_address_street_number')."',
	'i_192_interpreter_mailing_address_apt_ste_flr_value':' ".showData('i_192_interpreter_mailing_address_apt_ste_flr_value')."',
	'i_192_interpreter_mailing_address_city_town':' ".showData('i_192_interpreter_mailing_address_city_town')."',
	'i_192_interpreter_mailing_address_state':' ".showData('i_192_interpreter_mailing_address_state')."',
	'i_192_interpreter_mailing_address_zip_code':' ".showData('i_192_interpreter_mailing_address_zip_code')."',
	'i_192_interpreter_mailing_address_province':' ".showData('i_192_interpreter_mailing_address_province')."',
	'i_192_interpreter_mailing_address_postal_code':' ".showData('i_192_interpreter_mailing_address_postal_code')."',
	'i_192_interpreter_mailing_address_country':' ".showData('i_192_interpreter_mailing_address_country')."',
	'i_192_interpreter_daytime_tel':' ".showData('i_192_interpreter_daytime_tel')."',
	'i_192_interpreter_mobile':' ".showData('i_192_interpreter_mobile')."',
	'i_192_interpreter_email':' ".showData('i_192_interpreter_email')."',
	'i_192_interpreter_certification_language_skill':' ".showData('i_192_interpreter_certification_language_skill')."',
	'i_192_interpreter_sign_date':' ".showData('i_192_interpreter_sign_date')."',
	'i_192_preparer_note_for_family_member':' ".showData('i_192_preparer_note_for_family_member')."',
	'i_192_preparer_family_last_name':' ".showData('i_192_preparer_family_last_name')."',
	'i_192_preparer_family_given_first_name':' ".showData('i_192_preparer_family_given_first_name')."',
	'i_192_preparer_business_name':' ".showData('i_192_preparer_business_name')."',
	'i_192_preparer_mailing_address_street_number':' ".showData('i_192_preparer_mailing_address_street_number')."',
	'i_192_preparer_mailing_address_apt_ste_flr_value':' ".showData('i_192_preparer_mailing_address_apt_ste_flr_value')."',
	'i_192_preparer_mailing_address_city_town':' ".showData('i_192_preparer_mailing_address_city_town')."',
	'i_192_preparer_mailing_address_state':' ".showData('i_192_preparer_mailing_address_state')."',
	'i_192_preparer_mailing_address_zip_code':' ".showData('i_192_preparer_mailing_address_zip_code')."',
	'i_192_preparer_mailing_address_province':' ".showData('i_192_preparer_mailing_address_province')."',
	'i_192_preparer_mailing_address_postal_code':' ".showData('i_192_preparer_mailing_address_postal_code')."',
	'i_192_preparer_mailing_address_country':' ".showData('i_192_preparer_mailing_address_country')."',
	'i_192_preparer_daytime_tel':' ".showData('i_192_preparer_daytime_tel')."',
	'i_192_preparer_mobile':' ".showData('i_192_preparer_mobile')."',
	'i_192_preparer_email':' ".showData('i_192_preparer_email')."',

	// page 10

	'i_192_preparer_certification_language_skill':' ".showData('i_192_preparer_certification_language_skill')."',
	'i_192_preparer_sign_date':' ".showData('i_192_preparer_sign_date')."',

	//page 11

    'i_192_additional_info_last_name':' ".showData('i_192_additional_info_last_name')."',
    'i_192_additional_info_first_name':' ".showData('i_192_additional_info_first_name')."',
    'i_192_additional_info_middle_name':' ".showData('i_192_additional_info_middle_name')."',
    'i_192_additional_info_a_number':' ".showData('i_192_additional_info_a_number')."',

    'i_192_additional_info_3a_page_no':' ".showData('i_192_additional_info_3a_page_no')."',
    'i_192_additional_info_3b_part_no':' ".showData('i_192_additional_info_3b_part_no')."',
    'i_192_additional_info_3c_item_no':' ".showData('i_192_additional_info_3c_item_no')."',

    'i_192_additional_info_4a_page_no':' ".showData('i_192_additional_info_4a_page_no')."',
    'i_192_additional_info_4b_part_no':' ".showData('i_192_additional_info_4b_part_no')."',
    'i_192_additional_info_4c_item_no':' ".showData('i_192_additional_info_4c_item_no')."',

    'i_192_additional_info_5a_page_no':' ".showData('i_192_additional_info_5a_page_no')."',
    'i_192_additional_info_5b_part_no':' ".showData('i_192_additional_info_5b_part_no')."',
    'i_192_additional_info_5c_item_no':' ".showData('i_192_additional_info_5c_item_no')."',
    'i_192_additional_info_6a_page_no':' ".showData('i_192_additional_info_6a_page_no')."',
    'i_192_additional_info_6b_part_no':' ".showData('i_192_additional_info_6b_part_no')."',
    'i_192_additional_info_6c_item_no':' ".showData('i_192_additional_info_6c_item_no')."',
    'i_192_additional_info_7a_page_no':' ".showData('i_192_additional_info_7a_page_no')."',
    'i_192_additional_info_7b_part_no':' ".showData('i_192_additional_info_7b_part_no')."',
    'i_192_additional_info_7c_item_no':' ".showData('i_192_additional_info_7c_item_no')."',

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