<?php
// require_once('formheader.php');      //database connection file....           
require_once('localconfig.php');
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
        $barcode_image = "images/i192/I-192-footer-pdf417-$this->page.png";
        // $barcode_image = "";
        //* )
        $this->Image( $barcode_image, 65, 270, 95, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //* Footer Barcode PDF417
		
        $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 157.5, 269, true );
    }
}

$pdf = new MyPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

//* set document information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( '' );
$pdf->SetTitle('Form I-192, Application for Advance Permission to Enter as a Nonimmigrant');

//* set default header data
$pdf->SetHeaderData( PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING );

//* set header and footer fonts
$pdf->setHeaderFont( Array( PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN ) );
$pdf->setFooterFont( Array( PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA ) );

//* set default monospaced font
$pdf->SetDefaultMonospacedFont( PDF_FONT_MONOSPACED );

$pdf->SetMargins( 13.7, 15.3, 12.8, true );

//* set auto page breaks
$pdf->SetAutoPageBreak( false, PDF_MARGIN_BOTTOM );

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
$pdf->Image( $logo, 12, 9, 18, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );

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
$pdf->MultiCell( 40, 5, 'OMB No. 1615-0017 Expires 03/31/2027', 0, 'C', 0, 1, 169, 18.5, true );

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

if(showData('i_192_select_g28')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><input type="checkbox" name="agree" value="1" checked="'.$checked_data.'" /> </div>';
$pdf->writeHTMLCell(37, 5, 15, 164.5, $html, '', 0, false, true, 'L', true);
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
$pdf->TextField('volag_number', 33, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),52, 173.4);
// //...............
$pdf->SetFont('times', '', 10);
$html ='<div><b> Attorney State Bar Number </b> <br> (if applicable) </div>';
$pdf->writeHTMLCell(45, 20, 87, 163.5, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_state_bar_number', 43, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),88, 173.4);
// //.............
$pdf->SetFont('times', '', 10);
$html ='<div> <b>&nbsp;&nbsp;&nbsp;Attorney or Accredited Representative<br>
&nbsp;&nbsp;&nbsp;USCIS Online Account Number </b> (if any) <br> </div>';
$pdf->writeHTMLCell(71, 20, 132, 163.5, $html, 'RB', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('attorney_uscis_online_account_number', 65, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),135, 173.4);

//..............table end .........

$pdf->SetFont('times', 'B', 10); // set font
$pdf->MultiCell(100, 6, "START HERE - Type or print in black ink.", '', 'L', 0, 1, 20, 183.6, true);
$pdf->SetFont('times', '', 10); // set font

/* $pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 12, 182.7, false); // angle 1
$pdf->StopTransform(); */

//...............
$pdf->SetFont('times', '', 11.6);
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 0); 
$html ='<div><b>Part 1. Application Type</b></div>';
$pdf->writeHTMLCell(190, 5.7, 13, 191, $html, 1, 1, true, false, 'L', false);

//.................

$pdf->SetFont('times', '', 9.6);
$html ='<div>I am applying to the Secretary of Homeland Security for permission to enter the United States temporarily under the provisions of the
Immigration and Nationality Act (INA) section 212(d)(3)(A)(ii), 212(d)(13), or 212(d)(14).</div>';
$pdf->writeHTMLCell(190, 5, 12, 197.5,$html, '', 0, false, true, 'L', true);

//.................

$pdf->SetFont('times', '', 9.6);
$html ='<div><b>1.</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I am seeking this permission so that I may obtain (select <b>only
one</b> box):</div>';
$pdf->writeHTMLCell(190, 5, 12, 208.5,$html, '', 0, false, true, 'L', true);

//.................

$pdf->SetFont( 'times', '', 13.4 );
if(showData('i_192_part1_1_checkbox')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><input type="checkbox" name="part-1_1a" value="YES" checked="'.$checked_data.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 215, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Status as a victim of trafficking (T nonimmigrant status) or</div>';
$pdf->writeHTMLCell( 95, 5, 28, 215, $html, 0, 1, false, true, 'L', true );
$html = '<div>a victim of qualifying criminal activity (U nonimmigrant status).</div>';
$pdf->writeHTMLCell( 95, 5, 28, 220, $html, 0, 1, false, true, 'L', true );
//*....................

$pdf->SetFont( 'times', '', 13.4 );

if(showData('i_192_part1_2_checkbox')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><input type="checkbox" name="part-1_1b" value="YES" checked="'.$checked_data.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 225.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Admission as a nonimmigrant (other than as a T or U nonimmigrant).</div>';
$pdf->writeHTMLCell( 120, 5, 28, 225.5, $html, 0, 1, false, true, 'L', true );


//*....................
$pdf->SetFont('times', '', 10);
$html ='<div>If filing this form concurrently with a USCIS Form I-914/I-914A or Form I-918/I-918A (T or U nonimmigrant, respectively) or in
relation to one that you previously filed, you should complete <b>Item Numbers 1. - 10.</b> and then skip to <b>Item Number 26.</b></div>';
$pdf->writeHTMLCell(189, 5, 12, 232.5,$html, '', 0, false, true, 'L', true);


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

//.................

$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(8, 7, 12, 25, '<b>1.</b>', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(100, 7, 20, 24,'<div>Your Full Legal Name (Do not provide a nickname)</div>', 0, 0, false, false, 'L',true);
$pdf->writeHTMLCell(40, 7, 20, 30, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 98, 30, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 156, 29, 'Middle Name (if applicable)', 0, 0, false, false, 'L', true);

//...............

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_1_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,38);
$pdf->TextField('p2_about_you_1_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,38);
$pdf->TextField('p2_about_you_1_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,38);

//...............
 
$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(8, 5, 12, 45, '<div><b>2.</b></div>', 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(100, 5, 20, 45.3, '<div>Other Names Used (if any)</div>', 0, 0, false, true, 'L', true);
$html = '<div>Provide all other names you have ever used, including aliases, maiden name, and nicknames. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(182, 5, 20, 51,$html, 0, 0, false, true, 'L', true);

//...............

$pdf->SetFont('times', '', 10); // set font
$pdf->writeHTMLCell(40, 7, 20, 58, 'Family Name (Last Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 98, 58, 'Given Name (First Name)', 0, 0, false, false, 'L', true);
$pdf->writeHTMLCell(50, 7, 156, 56.7, 'Middle Name (if applicable)', 0, 0, false, false, 'L', true);
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
$html = '<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Birth</div>';
$pdf->writeHTMLCell(190, 5, 12, 116.5,$html, '', 0, false, true, 'L', true);
//...................

$pdf->SetFont('times', '', 10);
$html = '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City or Town</div>';
$pdf->writeHTMLCell(190, 5, 12, 121.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6city', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,127.2);
//..............

$pdf->SetFont('times', '', 10);
$html = '<div>State or Province</div>';
$pdf->writeHTMLCell(190, 5, 113, 121.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6state', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.5,127.2);
//.................

$pdf->SetFont('times', '', 10);
$html = '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country</div>';
$pdf->writeHTMLCell(190, 5, 12, 134.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_6country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,140);

//.................

$pdf->SetFont('times', '', 10);
$html = '<div><b>7.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell(190, 5, 12, 147.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_7', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,153);

//.................

$pdf->SetFont('times', '', 10);
$html ='<div><b>8.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender</div>';
$pdf->writeHTMLCell(190, 5, 12, 160,$html, '', 0, false, true, 'L', true);

if(showData('other_information_about_you_gender')=="male") $male_checked = "checked"; else $male_checked = "";
if(showData('other_information_about_you_gender')=="female") $female_checked = "checked"; else $female_checked = "";
if(showData('other_information_about_you_gender')=="another") $another_checked = "checked"; else $another_checked = "";

$html = '<input type="checkbox" name="p2_other_info_8_gender" value="Male" checked="'.$male_checked.'" /> &nbsp; Male
&nbsp;&nbsp; <input type="checkbox" name="p2_other_info_8_gender" value="Female" checked="'.$female_checked.'" /> &nbsp; Female
&nbsp;&nbsp; <input type="checkbox" name="p2_other_info_8_gender" value="Another_Gender_Identity" checked="'.$another_checked.'" /> Another Gender Identity';
$pdf->writeHTMLCell( 195, 0, 19.5, 166.2, $html, 0, 1, false, true, 'J', 0 );

//.................

$pdf->SetFont('times', '', 10);
$html = '<div><b>9.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mailing Address (Safe address, if applicable)</div>';
$pdf->writeHTMLCell(190, 5, 12, 172, $html, '', 0, false, true, 'L', true);
$html = '<div>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Please provide an address where you can safely receive correspondence from USCIS.</div>';
$pdf->writeHTMLCell(190, 5, 12, 177, $html, '', 0, false, true, 'L', true);
$html = '<div>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;In Care Of Name (if any) </div>';
$pdf->writeHTMLCell(190, 5, 12, 183, $html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_9care_name', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20,188.5);

//.............

$pdf->setFont('Times', '', 10);
$html= '<div><b>     </b> &nbsp;    &nbsp;    Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 196.3, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 151, 196.3, $html, 0, 1, false, 'L');

//.............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_9street_number_name', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 202);

$pdf->setFont('Times', '', 10.5);

if(showData('information_about_you_mailing_apt_ste_flr')=="apt") $p2_apt = "checked"; else $p2_apt = "";
if(showData('information_about_you_mailing_apt_ste_flr')=="ste") $p2_ste = "checked"; else $p2_ste = "";
if(showData('information_about_you_mailing_apt_ste_flr')=="flr") $p2_flr = "checked"; else $p2_flr = "";

$html = '<div><input type="checkbox" name="p2_other_info_apt" value="apt" checked="'.$p2_apt.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 151, 202, $html, 0, 1, false, 'L');
$html = '<div><input type="checkbox" name="p2_other_info_ste" value="ste" checked="'.$p2_ste.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 160, 202, $html, 0, 1, false, 'L');
$html = '<div><input type="checkbox" name="p2_other_info_flr" value="flr" checked="'.$p2_flr.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 169, 202, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_9number',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),181, 202);

// .................

$pdf->setFont('Times', '', 10);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 209, $html, 0, 1, false, 'L');

$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 152, 209, $html, 0, 1, false, 'L');

$html= '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 180, 209, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 214.5);

$pdf->SetFont('courier', 'B', 10);
$html = '<select name="p2_other_info_state" size="0.50">';
$html .= '<option value=""  disabled selected>Select</option>'; // Disable the option
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 152, 214, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_zipcode', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 181, 214.5);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 222, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_other_info_mailing_address_province', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 228);

//.............

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

//...................

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Address History</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 27, $html, 0, 1, true, false, 'L', false);

//...................

$pdf->SetFont('times', '', 10);
$html ='<div>Provide physical addresses for everywhere you have lived during the last five years, whether inside or outside the United States. Provide your current address first. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(191, 6, 12, 33.4, $html, 0, 1, false, 'L');

//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>10.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Address 1 (current address)</div>';
$pdf->writeHTMLCell(190, 5, 12, 48,$html, '', 0, false, true, 'L', true);

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 21, 53, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 153, 53, $html, 0, 1, false, 'L');

//...................

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10street_number_name', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 58.5);

$pdf->setFont('Times', '', 10.5);

if(showData('information_about_you_home_apt_ste_flr')=="apt") $checked_apt = "checked"; else $checked_apt = "";
if(showData('information_about_you_home_apt_ste_flr')=="ste") $checked_ste = "checked"; else $checked_ste = "";
if(showData('information_about_you_home_apt_ste_flr')=="flr") $checked_flr = "checked"; else $checked_flr = "";

$html= '<div>  <input type="checkbox" name="p2_info_10_apt" value="apt" checked="'.$checked_apt.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 153, 58.5, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="p2_info_10_ste" value="ste" checked="'.$checked_ste.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 162, 58.5, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="pp2_info_10_flr" value="flr" checked="'.$checked_flr.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 171, 58.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_numbere',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),183, 58.5);

//...................

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 21.5, 66, '<div>City or Town</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 154, 66, '<div>State</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 182, 66, '<div>ZIP Code</div>', 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 72);

$html = '<select name="p2_info_10_state" size="0.50">';
$html .= '<option value=""  disabled selected>Select</option>'; // Disable the option
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 154, 72, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_zipcode', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 72.5);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 21.5, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_province', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 86);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 76, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 77, 86);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 130, 80, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130.5, 86);

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 21.5,93, $html, 0, 1, false, 'L');

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 21.5,98, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_10_from_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 104);

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 79.5,98, $html, 0, 1, false, 'L');
$pdf->setFont('Times', 'B', 10);
$pdf->writeHTMLCell(45, 6.5, 80,104, "PRESENT", 1, 1, false, 'L');

//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>11.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Address 2</div>';
$pdf->writeHTMLCell(190, 5, 12, 112,$html, '', 0, false, true, 'L', true);

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 21, 117, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 153, 117, $html, 0, 1, false, 'L');

//...................

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11street_number_name', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 122.5);

$pdf->setFont('Times', '', 10.5);

if(showData('information_about_you_home_apt_ste_flr2')=="apt") $checked_apt = "checked"; else $checked_apt = "";
if(showData('information_about_you_home_apt_ste_flr2')=="ste") $checked_ste = "checked"; else $checked_ste = "";
if(showData('information_about_you_home_apt_ste_flr2')=="flr") $checked_flr = "checked"; else $checked_flr = "";

$html= '<div>  <input type="checkbox" name="p2_info_11_apt" value="apt" checked="'.$checked_apt.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 153, 122.5, $html, 0, 1, false, 'L');
$html= '<div>  <input type="checkbox" name="p2_info_11_ste" value="ste" checked="'.$checked_ste.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 162,122.5, $html, 0, 1, false, 'L');
$html= '<div>  <input type="checkbox" name="pp2_info_11_flr" value="flr" checked="'.$checked_flr.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 171,122.5, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_numbere',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),183, 122.5);

//...................

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 21.5, 130, '<div>City or Town</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 154, 130, '<div>State</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 182, 130, '<div>ZIP Code</div>', 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22,136);

$html = '<select name="p2_info_11_state" size="0.50">';
$html .= '<option value=""  disabled selected>Select</option>'; // Disable the option
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 154, 136, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_zipcode', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 136.5);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 21.5, 144, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_province', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 150);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 76, 144, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 77, 150);

//...................

$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 130, 144, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_country', 75, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130.5, 150);

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>Dates of Residence</div>';
$pdf->writeHTMLCell(90, 7, 21.5,156.5, $html, 0, 1, false, 'L');

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>From (mm/dd/yyyy)</div>';

$pdf->writeHTMLCell(90, 7, 21.5,161.4, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_from_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 167);

//...................

$pdf->setFont('Times', '', 10);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 79.5,161.4, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_info_11_to_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 167);

//...................

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

$pdf->SetFont( 'times', '', 12.5 );

if(showData('other_information_about_you_marital_status')=="single") $checked_single = "checked"; else $checked_single = "";
if(showData('other_information_about_you_marital_status')=="married") $checked_married = "checked"; else $checked_married = "";
if(showData('other_information_about_you_marital_status')=="divorced") $checked_divorced = "checked"; else $checked_divorced = "";
if(showData('other_information_about_you_marital_status')=="widowed") $checked_widowed = "checked"; else $checked_widowed = "";
if(showData('other_information_about_you_marital_status')=="legally separated") $checked_separated = "checked"; else $checked_separated = "";
if(showData('other_information_about_you_marital_status')=="marriage annulled") $checked_annulled = "checked"; else $checked_annulled = "";
if(showData('other_information_about_you_marital_status')=="other") $checked_other = "checked"; else $checked_other = "";

$html = '<div><input type="checkbox" name="part_2_12single" value="single" checked="'.$checked_single.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 20.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Single, Never Married</div>';
$pdf->writeHTMLCell( 95, 5, 27, 188, $html, 0, 1, false, true, 'L', true );

//...................

$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12married" value="married" checked="'.$checked_married.'" /></div>';
$pdf->writeHTMLCell( 10, 5, 64.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Married</div>';
$pdf->writeHTMLCell( 95, 5, 71, 188, $html, 0, 1, false, true, 'L', true );

//...................

$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12divorced" value="divorced" checked="'.$checked_divorced.'" /></div>';
$pdf->writeHTMLCell( 10, 5, 84.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Divorced</div>';
$pdf->writeHTMLCell( 95, 5, 91, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12widowed" value="widowed" checked="'.$checked_widowed.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 106.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Widowed</div>';
$pdf->writeHTMLCell( 95, 5, 112, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12separeted" value="separated" checked="'.$checked_separated.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 128.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Legally Separated</div>';
$pdf->writeHTMLCell( 95, 5, 134, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12annulled" value="marriage_annulled" checked="'.$checked_annulled.'" /> </div>';
$pdf->writeHTMLCell( 10, 5, 161.5, 188, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Marriage Annulled</div>';
$pdf->writeHTMLCell( 95, 5, 167, 188, $html, 0, 1, false, true, 'L', true );
//.................
$pdf->SetFont( 'times', '', 12.5 );
$html = '<div><input type="checkbox" name="part_2_12other" value="other" checked="'.$checked_other.'" /> </div>';
$pdf->writeHTMLCell( 10, 5,20.5, 195, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'times', '', 10 );
$html = '<div>Other</div>';
$pdf->writeHTMLCell( 95, 5,27, 195, $html, 0, 1, false, true, 'L', true );
//........................
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_2_12_other', 91, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 40, 195);

//...................

$pdf->SetFont('times', '', 10);
$html ='<div><b>13.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How many times have you been married (including annulled marriages and marriages to the same person)?</div>';
$pdf->writeHTMLCell(190, 5, 12, 202,$html, '', 0, false, true, 'L', true);

//.................

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part_2_13', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 180, 202);

//.................

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Your Current Marriage</b> (including if you are legally separated)</div>';
$pdf->writeHTMLCell(191, 5.8, 13, 212, $html, 0, 1, true, false, 'L', false);

//.................

$pdf->SetFont('times', '', 10);
$html ='<div>If you are currently married, provide the following information about your <b>current spouse.</b></div>';
$pdf->writeHTMLCell(190, 5, 12, 219,$html, '', 0, false, true, 'L', true);

//.................

$pdf->SetFont('times', '', 10);
$html ="<div><b>14.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Spouse's Legal Name</div>";
$pdf->writeHTMLCell(190, 5, 12, 224,$html, '', 0, false, true, 'L', true);

//.................

$pdf->SetFont('times', '', 10); // set font
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 21, 228.6, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 228, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 227, $html, 0, 0, false, false, 'L', true);

//.................

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_14_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,235.5);
$pdf->TextField('p2_about_you_14_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97,235.5);
$pdf->TextField('p2_about_you_14_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5,235.5);

//.................

$pdf->SetFont('times', '', 10);
$html ="<div><b>15.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Spouse's Alien Registration Number (A-Number) (if any)</div>";
$pdf->writeHTMLCell(190, 5, 12, 245,$html, '', 0, false, true, 'L', true);

//.................

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 196,147, false); // angle 1
$pdf->StopTransform();

//.................

$pdf->SetFont('times', '', 11);
$html ="<div><b>A-</b></div>";
$pdf->writeHTMLCell(190, 5, 110, 245,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_15_registration_number', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 116,245);

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );
//*.................
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued) </div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);

//.................

$pdf->SetFont('times', '', 10);
$html ="<div><b>16.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 12, 25,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_16_date_birth', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 63,25.3);

//.................

$pdf->SetFont('times', '', 10);
$html ="<div><b>17.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Marriage (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 106, 25,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_17_date_marriage', 34, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163,25.3);

//.................

$pdf->SetFont('times', '', 10);
$html = "<div><b>18.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Birth</div>";
$pdf->writeHTMLCell(190, 5, 12, 32,$html, '', 0, false, true, 'L', true);
$html = "<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 38,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_18_city_or_town', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,43.5);

//.................

$pdf->SetFont('times', '', 10);
$html = "<div>State or Province</div>";
$pdf->writeHTMLCell(190, 5, 115, 38,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_18_state_or_province', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115,43.5);

//.................

$pdf->SetFont('times', '', 10);
$html = "<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 50,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_18_country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,55.5);

//.................

$pdf->SetFont('times', '', 10);
$html = "<div><b>19.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Marriages</div>";
$pdf->writeHTMLCell(190, 5, 12, 64,$html, '', 0, false, true, 'L', true);
$html = "<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 70,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_19_city_or_town', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,75.5);

//.................

$pdf->SetFont('times', '', 10);
$html = "<div>State or Province</div>";
$pdf->writeHTMLCell(190, 5, 115, 70,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_19_state_or_province', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 115,75.5);

//.................

$pdf->SetFont('times', '', 10);
$html = "<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 82,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_19_country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,87.5);

//.................

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Information About Prior Marriages</b>  (if any) </div>';
$pdf->writeHTMLCell(191, 6.2, 13, 98, $html, 0, 1, true, false, 'L', false);

//..................

$pdf->SetFont('times', '', 10);
$html ='<div>If you have been married before, anywhere in the world, provide the information requested in <b>Item Numbers 20. - 25</b>. about your
prior marriage. If you have had more than one previous marriage, use the space provided in <b>Part 6. Additional Information</b> to
provide the answers to <b>Item Numbers 20. - 25.</b> for each additional marriage.</div>';
$pdf->writeHTMLCell(191, 6.2, 13, 104.4, $html, 0, 0, false, true, 'L', true);

//..................

$pdf->SetFont('times', '', 10);
$html ="<div><b>20.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prior Spouse's Legal Name (provide family name before marriage)</div>";
$pdf->writeHTMLCell(190, 5, 12, 119.5,$html, '', 0, false, true, 'L', true);

//..................

$pdf->SetFont('times', '', 10); // set font
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 20.5, 124, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 123.4, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name (if applicable)';
$pdf->writeHTMLCell(50, 7, 156, 122.5, $html, 0, 0, false, false, 'L', true);

//..................

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('p2_about_you_20_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21.5,131);
$pdf->TextField('p2_about_you_20_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 98,131);
$pdf->TextField('p2_about_you_20_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 156,131);

//..................

$pdf->SetFont('times', '', 10);
$html ="<div><b>21.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 12, 140,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_21_date_birth', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 62.5,140);

//..................

$pdf->SetFont('times', '', 10);
$html ="<div><b>22.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Marriage (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 105, 140,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_22_date_marriage', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 162,140);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div><b>23.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place of Marriage</div>";
$pdf->writeHTMLCell(190, 5, 12, 147,$html, '', 0, false, true, 'L', true);
$html = "<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 152,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_23_city_or_town', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,157.4);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div>State or Province</div>";
$pdf->writeHTMLCell(190, 5, 115, 152,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_23_state_or_province', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.5,157.2);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 164.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_23_country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,170);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div><b>24.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Marriage Legally Ended (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 12, 178,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_24_marriage_legally_ended', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 86 , 178.5);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div><b>25.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Place Where Marriage Legally Ended</div>";
$pdf->writeHTMLCell(190, 5, 12, 186,$html, '', 0, false, true, 'L', true);

//..................

$html ="<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 21, 191,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_25_city_or_town', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,196.4);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div>State or Province</div>";
$pdf->writeHTMLCell(190, 5, 115, 191,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_25_state_or_province', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.5,196.4);

//..................

$pdf->SetFont('times', '', 10);
$html = "<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 21, 203,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_25_country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,209);

//..................

$pdf->SetFont('times', 'I', 12);
$html = '<div><b>Immigration and Criminal History</b></div>';
$pdf->writeHTMLCell(191, 6.2, 13,219, $html, 0, 1, true, false, 'L', false);

//..................

$pdf->SetFont('times', '', 10);
$html ="<div><b>26.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Explain the grounds of inadmissibility that may apply in your case.</div>";
$pdf->writeHTMLCell(190, 5, 12, 226,$html, '', 0, false, true, 'L', true);

//..................

/* $pdf->SetFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="43" rows="5" name="p2_about_you_26">
</textarea>
EOD;
$pdf->writeHTMLCell(90, 50, 21, 232, $html, 0, 0, false, 'L');*/

$pdf->SetFont('courier', 'B', 10);
$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('information_about_you_explain_grounds_of_inadmissibility', 182, 26, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v'=>showData('information_about_you_explain_grounds_of_inadmissibility')), 22, 234);
$pdf->setCellHeightRatio( 1.2 );

/********************************
******** End Page No 4 **********
*********************************/

/********************************
******** Start Page No 5 ********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued) </div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>27.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you previously filed an application for advance permission to enter the United States as a <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nonimmigrant?</div>";
$pdf->writeHTMLCell(150, 5, 12, 24.4,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 11);

if(showData('pre_advance_permission_enter_united_states_nonimmigrant_status')=="Y") $checked_yes = "checked";
else $checked_yes = "";
if(showData('pre_advance_permission_enter_united_states_nonimmigrant_status')=="N") $checked_no = "checked";
else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_27" value="Y" checked="'.$checked_yes.'" /> Yes &nbsp; 
<input type="checkbox" name="part2_27" value="N" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell( 60, 0, 175, 25, $html, '', 0, 0, true, 'L' );

//....................

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 27.</b>, provide the details in <b>Item Numbers 28. - 29.</b> <br>
If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(170, 5, 21, 35.4,$html, '', 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>28.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Application Filed (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(150, 5, 12, 46.4,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_and_criminal_history_date_application_filed', 35, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 78, 46.7);
// $pdf->writeHTMLCell(35, 7, 78, 46.7, '', 1, 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>29.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location where you filed your application (for example, USCIS Office or Port of Entry).</div>";
$pdf->writeHTMLCell(150, 5, 12, 54,$html, '', 0, false, true, 'L', true);

//....................

$html = "<div>USCIS Office or U.S. Port-of-Entry</div>";
$pdf->writeHTMLCell(190, 5, 21, 60,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('location_where_you_filed_your_application_uscis_office', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 66);
// $pdf->writeHTMLCell( 90, 6, 21,66,'', 1, 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html = "<div>City or Town</div>";
$pdf->writeHTMLCell(190, 5, 115, 60, $html, '', 0, false, true, 'L', true);

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('location_where_you_filed_your_application_city_town', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 114, 66);
// $pdf->writeHTMLCell( 90, 6,113.5, 66,'', 1, 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html = "<div>State or Province</div>";
$pdf->writeHTMLCell(190, 5, 20.5, 73,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('location_where_you_filed_your_application_state', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 79);
// $pdf->writeHTMLCell( 90, 6,  21, 79,'', 1, 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html = "<div>Country</div>";
$pdf->writeHTMLCell(190, 5, 115, 73,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('location_where_you_filed_your_application_country', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 114, 79);
// $pdf->writeHTMLCell( 90, 6, 114, 79, '', 1, 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html = "<div>Receipt Number (if available)</div>";
$pdf->writeHTMLCell(60, 5, 20.5, 88, $html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('location_where_you_filed_your_application_receipt_no', 70, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 73, 88.5);

$pdf->Image('images/right_angle.jpg', 68, 89.5, 3.3, 3.3);

//....................

/* $pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 87, 158.5, false);
$pdf->StopTransform();
$pdf->writeHTMLCell( 70, 6, 73, 89,'', 1, 0, false, true, 'L', true); */

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>30.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you EVER been in the United States for a period of six months or more?</div>";
$pdf->writeHTMLCell(150, 5, 12, 97.4,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 11);

if(showData('stay_in_united_states_six_month_or_more_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('stay_in_united_states_six_month_or_more_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_30" value="Y" checked="'.$checked_yes.'" />   Yes &nbsp;
<input type="checkbox" name="part2_30" value="N" checked="'.$checked_no.'" />   No</div>';
$pdf->writeHTMLCell( 60, 0, 175, 98, $html, '', 0, 0, true, 'L' );

//....................

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 30</b>., provide the dates you were in the United States (from and to)<br>
and your immigration status at the time of entry into the United States in the space provided in<br>
<b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(190, 5, 21, 103.6,$html, '', 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>31.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you EVER filed an application or petition for immigration benefits with the U.S. Government, or has <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;one ever been filed on your behalf?</div>";
$pdf->writeHTMLCell(190, 5, 12, 117.6,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 11);

if(showData('application_for_immigration_benefits_us_govt_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('application_for_immigration_benefits_us_govt_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_31" value="Y" checked="'.$checked_yes.'" /> Yes &nbsp;
<input type="checkbox" name="part2_31" value="N" checked="'.$checked_no.'" /> No</div>';
$pdf->writeHTMLCell( 60, 0, 175, 117.6, $html, '', 0, 0, true, 'L' );

//....................

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 31.</b>, provide the information requested in <b>Item Numbers 32. - 34.</b></div>';
$pdf->writeHTMLCell(190, 5, 21, 127.6,$html, '', 0, false, true, 'L', true);
//*.................
$pdf->SetFont('times', '', 10);
$html ='<div>If you have (or somebody else on your behalf has) filed multiple applications or petitions for immigration benefits with the U.S.
Government, use the space provided in <b>Part 6. Additional Information </b>to provide the answers to <b>Item Numbers 32. - 34.</b> for each of
your additional applications or petitions. </div>';
$pdf->writeHTMLCell(190, 5, 12, 134,$html, '', 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>32.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type of application or petition filed</div>";
$pdf->writeHTMLCell(190, 5, 12, 148.6,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_and_criminal_history_type_of_application', 180, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 155);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>33.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location the application or petition was filed (for example, USCIS office or Port of Entry)</div>";
$pdf->writeHTMLCell(190, 5, 12, 162,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_and_criminal_history_location_the_application', 180, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 169);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>34.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outcome of the application or petition (for example, approved, denied, or pending).</div>";
$pdf->writeHTMLCell(190, 5, 12, 176.6,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_and_criminal_history_outcome_of_the_application', 180, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 22, 183);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>35.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> been denied or refused an immigration benefit by the U.S. Government, or had a benefit<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; revoked or terminated (including but not limited to visas)?</div>";
$pdf->writeHTMLCell(190, 5, 12, 191,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 11);

if(showData('immigration_and_criminal_history_refused_immigration_benefit_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('immigration_and_criminal_history_refused_immigration_benefit_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div>
<input type="checkbox" name="part2_35" value="Y" checked="'.$checked_yes.'" /> Yes &nbsp;
<input type="checkbox" name="part2_35" value="N" checked="'.$checked_no.'" /> No</div>';
$pdf->writeHTMLCell( 60, 0, 175, 191.4, $html, '', 0, 0, true, 'L' );

//....................

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 35.</b>, provide an explanation the information in the space provided<br>
in <b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(190, 5, 21, 201,$html, '', 0, false, true, 'L', true);

//....................

$pdf->SetFont('times', '', 10);
$html ="<div><b>36.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have you <b>EVER</b> in or outside the United States, been arrested, cited, charged, indicted, fined, convicted,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; or imprisoned for breaking or violating any law or ordinance, excluding minor traffic violations?</div>";
$pdf->writeHTMLCell(190, 5, 12, 211.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 11);

if(showData('convicted_imprisoned_breaking_violating_any_law_status')=="Y") $checked_yes = "checked"; else $checked_yes = "";
if(showData('convicted_imprisoned_breaking_violating_any_law_status')=="N") $checked_no = "checked"; else $checked_no = "";

$html = '<div><input type="checkbox" name="36" value="Y" checked="'.$checked_yes.'" /> Yes &nbsp;
<input type="checkbox" name="36" value="N" checked="'.$checked_no.'" /> No</div>';
$pdf->writeHTMLCell( 60, 0, 175, 211.8, $html, '', 0, 0, true, 'L' );

//....................

$pdf->SetFont('times', '', 10);
$html ='<div>If you answered "Yes" to <b>Item Number 36.</b>, describe the incidents in detail and include all offenses where<br>
impaired driving may have been an issue in the space provided in<b>Part 6. Additional Information.</b></div>';
$pdf->writeHTMLCell(190, 5, 21, 223,$html, '', 0, false, true, 'L', true);

/********************************
******** End Page No 5 **********
*********************************/

/********************************
******** Start Page No 6 ********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued)</div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);

//.............

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Travel Information</b></div>';
$pdf->writeHTMLCell(191, 6, 13, 28, $html, '', 1, true, false, 'L', false);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE:</b> If you are applying for T or U nonimmigrant status and are in the United States, you may skip <b>Item Numbers 37. - 43.</b></b>
</div>';
$pdf->writeHTMLCell(190, 5, 12, 34,$html, '', 0, false, true, 'L', true);

//.............

$pdf->SetFont('times', '', 10);
$html ='<div>Location at Which you Plan to Enter the United States (desired Port of Entry)</b>
</div>';
$pdf->writeHTMLCell(190, 5, 12, 40.6,$html, '', 0, false, true, 'L', true);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>37.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City</div>";
$pdf->writeHTMLCell(190, 5, 12, 46,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_37_city', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 52);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>38.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State</div>";
$pdf->writeHTMLCell(190, 5, 105, 46,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$html = '<select name="p2_info_38_state" size="0.50">';
$html .= '<option value=""  disabled selected>Select</option>'; // Disable the option
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 7, 114, 51.5, $html, '', 0, 0, true, 'L');

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>39.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of Port of Entry</div>";
$pdf->writeHTMLCell(190, 5, 138, 46,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_39_port_entry', 60, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 144,52);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>40.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How do you plan to travel to the United States?<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(For example, by plane, ship, car)</div>";
$pdf->writeHTMLCell(190, 5, 12, 59,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_40_travel_plan', 78, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,69.5);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>41.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When do you plan to enter the United States? <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 105, 59,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_41_date_of_plan', 31, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 114,69.5);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>42.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approximate Length of Stay in the United States</div>";
$pdf->writeHTMLCell(190, 5, 12, 77.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('p2_about_you_42_stay_in_us', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,83);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>43.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is the purpose of your stay in the United States? Explain fully below.</div>";
$pdf->writeHTMLCell(190, 5, 12, 91,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);

$pdf->setCellHeightRatio( 2.2 );
$pdf->TextField('p2_about_you_43', 183, 32, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v'=>showData('information_about_you_travel_info_explain_fully_purpose_of_stay')), 21, 96.5);
$pdf->setCellHeightRatio( 1.2 );

//.............

$pdf->SetFont('times', 'I', 12);
$pdf->writeHTMLCell(191, 6, 13, 134, '<div><b>Employment History</b></div>', '', 1, true, false, 'L', false);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div>Provide your employment history for the last five years, whether inside or outside the United States. Provide the most recent <br>
employment first. If you need extra space to complete this section, use the space provided in <b>Part 6. Additional Information.</b></div>";
$pdf->writeHTMLCell(190, 5, 12, 140,$html, '', 0, false, true, 'L', true);


//...................
$pdf->SetFont('times', '', 10);
$html ="<div><b>44.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employer 1 (current or most recent)</div>";
$pdf->writeHTMLCell(190, 5, 12, 150,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html ="<div>Name of Employer or Company</div>";
$pdf->writeHTMLCell(190, 5, 21, 155.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_name', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,161);

//...................

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(190, 5, 20, 169,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('times', '', 10);
$html ='<div>Street Number and Name</div>';
$pdf->writeHTMLCell(190, 5, 20, 175,$html, '', 0, false, true, 'L', true);

//.............

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number </div>';
$pdf->writeHTMLCell(95, 7, 153, 175, $html, 0, 1, false, 'L');

//.............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_address', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 181);
$pdf->setFont('Times', '', 10.5);

if(showData('employer1_apt_ste_flr')=="apt") $checked_apt = "checked"; else $checked_apt = "";
if(showData('employer1_apt_ste_flr')=="ste") $checked_ste = "checked"; else $checked_ste = "";
if(showData('employer1_apt_ste_flr')=="flr") $checked_flr = "checked"; else $checked_flr = "";

$html= '<div>  <input type="checkbox" name="p2_info_44_apt" value="apt" checked="'.$checked_apt.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 153, 181, $html, 0, 1, false, 'L');
$html= '<div>  <input type="checkbox" name="p2_info_44_ste" value="ste" checked="'.$checked_ste.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 162,181, $html, 0, 1, false, 'L');
$html= '<div>  <input type="checkbox" name="pp2_info_44_flr" value="flr" checked="'.$checked_flr.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 171,181, $html, 0, 1, false, 'L');

//.............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_apt_ste_flr_value',21.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),183, 181);

//.............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 20, 189, '<div>City or Town</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 154, 189, '<div>State</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 182, 189, '<div>ZIP Code</div>', 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,195);

$html = '<select name="employer1_state" size="0.50">';
$html .= '<option value=""  disabled selected>Select</option>'; // Disable the option
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';

$pdf->writeHTMLCell(25, 5, 154, 195, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_zip_code', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 195);

//.............

$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 203, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_province', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 209);
// //.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 76, 203, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 77, 209);

// // //.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 130, 203, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_country', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130.5, 209);
// // // //.............

$pdf->SetFont('times', '', 10);
$html ="<div>Your Occupation</div>";
$pdf->writeHTMLCell(190, 5, 20, 217,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_occupation', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,222.5);
//.................

$pdf->setFont('Times', '', 10);
$html= '<div>Dates of Employment</div>';
$pdf->writeHTMLCell(90, 7, 20,230, $html, 0, 1, false, 'L');

// // // //.................
$pdf->setFont('Times', '', 10);
$html= '<div>From (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 20,235, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_from_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 241);

// // //.................
$pdf->setFont('Times', '', 10);
$html= '<div>To (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 79.5,235, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer1_to_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 241);


/********************************
******** End Page No 6 **********
*********************************/

/********************************
******** Start Page No 7 ********
*********************************/

$pdf->AddPage( 'P', 'LETTER' );
$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 2. Information About You</b>  (continued) </div>';
$pdf->writeHTMLCell(191, 6, 13, 18, $html, 1, 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>45.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employer 2</div>";
$pdf->writeHTMLCell(190, 5, 12, 25,$html, '', 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>Name of Employer or Company</div>";
$pdf->writeHTMLCell(190, 5, 21, 30.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_name', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,36);

//............

$pdf->SetFont('times', '', 10);
$html ='<div>Address of Employer or Company</div>';
$pdf->writeHTMLCell(190, 5, 20, 44,$html, '', 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ='<div>Street Number and Name</div>';
$pdf->writeHTMLCell(190, 5, 20, 50,$html, '', 0, false, true, 'L', true);

//............

$html= '<div> Apt. &nbsp;&nbsp;   Ste.&nbsp;  &nbsp;  Flr.  &nbsp;  &nbsp;  Number</div>';
$pdf->writeHTMLCell(95, 7, 153, 50, $html, 0, 1, false, 'L');

//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_address', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 56);
$pdf->setFont('Times', '', 10.5);

if(showData('employer2_apt_ste_flr')=="apt") $checked_apt = "checked"; else $checked_apt = "";
if(showData('employer2_apt_ste_flr')=="ste") $checked_ste = "checked"; else $checked_ste = "";
if(showData('employer2_apt_ste_flr')=="flr") $checked_flr = "checked"; else $checked_flr = "";

$html= '<div>  <input type="checkbox" name="p2_info_11_apt" value="apt" checked="'.$checked_apt.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 153, 56, $html, 0, 1, false, 'L');
$html= '<div>  <input type="checkbox" name="p2_info_11_ste" value="ste" checked="'.$checked_ste.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 162, 56, $html, 0, 1, false, 'L');
$html= '<div>  <input type="checkbox" name="pp2_info_11_flr" value="flr" checked="'.$checked_flr.'" />  </div>';
$pdf->writeHTMLCell(20, 7, 171, 56, $html, 0, 1, false, 'L');

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_apt_ste_flr_value',21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),183, 56);

//............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 20, 62.5, '<div>City or Town</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 154, 62.9, '<div>State</div>', 0, 1, false, 'L');
$pdf->writeHTMLCell(60, 7, 182, 62.9, '<div>ZIP Code</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,68.5);

$html = '<select name="employer2_state" size="0.50">';
$html .= '<option value=""  disabled selected>Select</option>'; // Disable the option
foreach($allDataCountry as $record){
    $html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 5, 154, 68.5, $html, '', 0, 0, true, 'L');

//............

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_zip_code', 21, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 183, 68.5);

//............

$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(80, 7, 20, 76, '<div>Province </div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_province', 53, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 82);

//............

$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(70, 7, 76, 76, '<div>Postal Code</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_postal_code', 51, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 77, 82);

//............

$pdf->setFont('Times', '', 10.5);
$pdf->writeHTMLCell(80, 7, 130, 76, '<div>Country</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_country', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 130.5, 82);

//............

$pdf->SetFont('times', '', 10);
$pdf->writeHTMLCell(190, 5, 20, 88.5, "<div>Your Occupation</div>", '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_occupation', 183, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21,94.5);

//............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 20,101, '<div>Dates of Employment</div>', 0, 1, false, 'L');

//............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 20,106, '<div>From (mm/dd/yyyy)</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_from_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 21, 112);

//............

$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(90, 7, 79.5,106, '<div>To (mm/dd/yyyy)</div>', 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('employer2_to_date', 45, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 80, 112);

//............

$pdf->SetFont('times', '', 12);
$html ="<div><b>Part 3. Applicant's Statement, Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 125, $html, 1, 1, true, false, 'L', false);

//............
 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Applicant's Contact Information</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 134, $html, '', 1, true, false, 'L', false);

//............

$pdf->setFont('Times', '', 10);
$html= '<div>Provide your daytime telephone number, mobile telephone number (if any), and email address (if any).</div>';
$pdf->writeHTMLCell(190, 7, 12,140, $html, 0, 1, false, 'L');

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant's Daytime Telephone Number</div>";
$pdf->writeHTMLCell(190, 5, 12, 146,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_applicant_daytime_tel', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 152);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell(190, 5, 110, 146,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_applicant_mobile', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 152);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant's Email Address (if any)r</div>";
$pdf->writeHTMLCell(190, 5, 12, 158.9,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_applicant_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 165);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Applicant's Certification and Signature</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 177, $html, '', 1, true, false, 'L', false);

//............

$pdf->setFont('Times', '', 10);
$html= '<div>I certify, under penalty of perjury, that I provided or authorized all of the responses and information contained in and submitted with<br>
my application, I read and understand or, if interpreted to me in a language in which I am fluent by the interpreter listed in <b>Part 4.</b>,<br>
understood, all of the responses and information contained in, and submitted with, my application, and that all of the responses and the<br>
information is complete, true, and correct. Furthermore, I authorize the release of any information from any and all of my records that<br>
USCIS may need to determine my eligibility for an immigration request and to other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration law. </div>';
$pdf->writeHTMLCell(195, 7, 12,185, $html, 0, 1, false, 'L');

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Applicant's Signaturer</div>";
$pdf->writeHTMLCell(190, 5, 12, 212.5,$html, '', 0, false, true, 'L', true);
$pdf->writeHTMLCell(132, 5, 20.5, 218.3,'', 1, 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>Date of Signature (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 155, 212.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_applicant_sign_date', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 218);

/********************************
******** End Page No 7 **********
*********************************/

/********************************
******** Start Page No 8  ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ="<div><b>Part 4. Interpreter's Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'J', true);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Interpreter's Full Name</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 26.2, $html, '', 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter's Family Name (Last Name)</div>";
$pdf->writeHTMLCell(190, 5, 12, 33,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_family_last_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 38.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div> Interpreter's Given Name (First Name)</div>";
$pdf->writeHTMLCell(190, 5, 112, 33,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_family_given_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 38.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter's Business or Organization Name</div>";
$pdf->writeHTMLCell(190, 5, 12, 46.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_business_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 52);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Interpreter's Contact Information</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 62, $html, '', 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter's Daytime Telephone Number</div>";
$pdf->writeHTMLCell(190, 5, 12, 69,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_daytime_tel', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 74.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell(190, 5, 112, 69,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_mobile', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 74.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter's Email Address (if any)</div>";
$pdf->writeHTMLCell(190, 5, 12, 82.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_email', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 88);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Interpreter's Certification</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 98, $html, '', 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>I certify, under penalty of perjury, that I am fluent in English and</div>";
$pdf->writeHTMLCell(190, 5, 12, 106.5,$html, '', 0, false, true, 'L', true);

$pdf->writeHTMLCell(190, 5, 203.5, 107.5,",", '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_certification_language_skill', 98, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 106, 106.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>and I have interpreted every question on the application and instructions and interpreted the applicant's answers to the questions in<br>
that language, and the applicant informed me that they understood every instruction, question, and answer on the application.</div>";
$pdf->writeHTMLCell(190, 5, 12, 113.5,$html, '', 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interpreter's Signaturer</div>";
$pdf->writeHTMLCell(190, 5, 12, 123,$html, '', 0, false, true, 'L', true);
$pdf->writeHTMLCell(132, 5, 20.5, 129.3,'', 1, 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>Date of Signature (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 155, 123,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_interpreter_sign_date', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 129);

//............

$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ="<div><b>Part 5. Contact Information, Declaration, and Signature of the Person Preparing this Application,
if Other Than the Applicant</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 139, $html, 1, 1, true, false, 'J', true);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Preparer's Full Name</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 152.7, $html, '', 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer's Family Name (Last Name)</div>";
$pdf->writeHTMLCell(190, 5, 12, 158,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_family_last_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 163.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div> Preparer's Given Name (First Name)</div>";
$pdf->writeHTMLCell(190, 5, 112, 158,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_family_given_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113, 163.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer's Business or Organization Name</div>";
$pdf->writeHTMLCell(190, 5, 12, 171.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_business_name', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 177);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Preparer's Contact Information</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 186, $html, '', 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer's Daytime Telephone Number</div>";
$pdf->writeHTMLCell(190, 5, 12, 192,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_daytime_tel', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 198);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell(190, 5, 112, 192,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_mobile', 84, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 198.5);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer's Email Address (if any)</div>";
$pdf->writeHTMLCell(190, 5, 12, 205.5,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_email', 89, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 211);

//............

$pdf->setCellHeightRatio(1.2);
$pdf->SetFillColor(220, 220, 220);
$pdf->setCellPaddings(1, 1, 1, 1); 
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Preparer's Certification</b></div>";
$pdf->writeHTMLCell(191, 6, 13, 220, $html, '', 1, true, false, 'L', false);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>I certify, under penalty of perjury, that I prepared this application for the applicant at their request and with express consent and that
all of the responses and information contained in and submitted with the application is complete, true, and correct and reflects only
information provided by the applicant. The applicant reviewed the responses and information and informed me that they understand
the responses and information in or submitted with the application.</div>";
$pdf->writeHTMLCell(190, 5, 12, 226,$html, '', 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ="<div><b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preparer's Signature</div>";
$pdf->writeHTMLCell(190, 5, 12, 243,$html, '', 0, false, true, 'L', true);
$pdf->writeHTMLCell(132, 5, 20.5, 249,'', 1, 0, false, true, 'L', true);

//............

$pdf->SetFont('times', '', 10);
$html ="<div>Date of Signature (mm/dd/yyyy)</div>";
$pdf->writeHTMLCell(190, 5, 155, 243,$html, '', 0, false, true, 'L', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_192_preparer_sign_date', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 249);

/********************************
******** End Page No 8 **********
*********************************/

/********************************
******** Start Page No 9  ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->setFillColor(220, 220, 220);
$pdf->setFont('Times', '', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1);
$pdf->SetFontSize(11.6);
$html = '<div><b>Part 6. Additional Information</b></div>';
$pdf->writeHTMLCell(191, 6.5, 13, 19, $html, 1, 1, true, 'L');
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 27, 'If you need extra space to provide any additional information within this application, use the space below. If you need more space<br>
than what is provided, you may make copies of this page to complete and file with this application or attach a separate sheet of paper.<br>
Type or print your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item</b><br>
<b>Number</b> to which your answer refers; and sign and date each sheet. ', '', 1, false, 'L');
//...............
$pdf->writeHTMLCell(197, 5, 12, 46, '<b>1.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Name (Last Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 83, 46, 'Given Name (First Name)', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 144, 46, 'Middle Name (if applicable)', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_family_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 51);
$pdf->TextField('p8_additional_info_given_name', 59, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 84, 51);
$pdf->TextField('p8_additional_info_middle_name', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 145, 51);
//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 60, '<b>2.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A-Number (if any)', '', 1, false, 'L');
$pdf->setFont('Times', '', 11);
$pdf->writeHTMLCell(197, 5, 53, 60, '<b>A-</b>', '', 1, false, 'L');
//.....................
$pdf->Image('images/right_angle.jpg', 50, 61.4, 3.3, 3.3);
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_a_number', 47, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 59.5, 60);


//............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 67, '<b>3.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 67, 'Part Number  ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 67, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_3a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 72);
$pdf->TextField('p8_additional_info_3b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 72);
$pdf->TextField('p8_additional_info_3c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 72);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_3d', 175, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_3d')), 21, 81);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 82, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 89, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 95.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 101.5, '', "B", 1, false, 'L');


//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 115, '<b>4.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 115, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 115, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_4a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 120);
$pdf->TextField('p8_additional_info_4b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 120);
$pdf->TextField('p8_additional_info_4c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 120);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_4d', 175, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_4d')), 21, 129);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 130, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 136.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 143, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 149.5, '', "B", 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 162, '<b>5.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 162, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 162, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_5a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 167);
$pdf->TextField('p8_additional_info_5b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 167);
$pdf->TextField('p8_additional_info_5c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71, 167);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_5d', 175, 32.5, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_5d')), 21, 176);
$pdf->setCellHeightRatio(1.2);

//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 177, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 183.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 190, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 196, '', "B", 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10);
$pdf->writeHTMLCell(197, 5, 12, 208.5, '<b>6.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Page Number', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 46, 208.5, 'Part Number ', '', 1, false, 'L');
$pdf->writeHTMLCell(197, 5, 70, 208.5, 'Item Number', '', 1, false, 'L');
//.....................
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('p8_additional_info_6a', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 21, 213.3);
$pdf->TextField('p8_additional_info_6b', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 47, 213);
$pdf->TextField('p8_additional_info_6c', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array(), 71.5, 213);
$pdf->setCellHeightRatio(1.8);
$pdf->TextField('p8_additional_info_6d', 175, 33, array('multiline' => true, 'strokeColor' => array(64, 64, 64), 'lineWidth' => 1, 'borderStyle' => 'solid'), array('v' => showData('i_539_additional_info_6d')), 21, 222);
$pdf->setCellHeightRatio(1.2);
//.................
$pdf->writeHTMLCell(174.5, 1, 21.2, 223, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 229.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 236.5, '', "B", 1, false, 'L');
$pdf->writeHTMLCell(174.5, 1, 21.2, 242.5, '', "B", 1, false, 'L');

//...........
// // Page 1FFF

// 'volag_number':' $attorneyData->volag_number',
// 'attorney_state_bar_number':' $attorneyData->bar_number',
// 'attorney_uscis_online_account_number':' $attorneyData->uscis_online_account_number',


$js = "
var fields = {



// page 2

'p2_about_you_1_last_name':' ".showData('information_about_you_family_last_name')."',
'p2_about_you_1_first_name':' ".showData('information_about_you_given_first_name')."',
'p2_about_you_1_middle_name':' ".showData('information_about_you_middle_name')."',
'p2_about_you_2a_last_name':' ".showData('information_about_you_other_family_last_name')."',
'p2_about_you_2b_last_name':' ".showData('information_about_you_other_family_last_name2')."',
'p2_about_you_2a_first_name':' ".showData('information_about_you_other_given_first_name')."',
'p2_about_you_2b_first_name':' ".showData('information_about_you_other_given_first_name2')."',
'p2_about_you_2a_middle_name':' ".showData('information_about_you_other_middle_name')."',
'p2_about_you_2b_middle_name':' ".showData('information_about_you_other_middle_name2')."',
'p2_other_info_3':' ".showData('other_information_about_you_alien_registration_number')."',
'p2_other_info_4':' ".showData('other_information_about_you_uscis_online_account_number')."',
'p2_other_info_5':' ".showData('other_information_about_you_date_of_birth')."',
'p2_other_info_6city':' ".showData('other_information_about_you_city_of_birth')."',
'p2_other_info_6state':' ".showData('other_information_about_you_province_of_birth')."',
'p2_other_info_6country':' ".showData('other_information_about_you_country_of_birth')."',
'p2_other_info_7':' ".showData('other_information_about_you_country_of_citizen')."',
'p2_other_info_9care_name':' ".showData('information_about_you_mailing_care_of_name')."',
'p2_other_info_9street_number_name':' ".showData('information_about_you_mailing_street_number')."',
'p2_other_info_9number':' ".showData('information_about_you_mailing_apt_ste_flr_value')."',
'p2_other_info_mailing_address_city_town':' ".showData('information_about_you_mailing_city_town')."',
'p2_other_info_state':' ".showData('information_about_you_mailing_state')."',
'p2_other_info_mailing_address_zipcode':' ".showData('information_about_you_mailing_zip_code')."',
'p2_other_info_mailing_address_province':' ".showData('information_about_you_mailing_province')."',
'p2_other_info_mailing_address_postal_code':' ".showData('information_about_you_mailing_postal_code')."',
'p2_other_info_mailing_address_country':' ".showData('information_about_you_mailing_country')."',

// page 3

'p2_info_10street_number_name':' ".showData('information_about_you_home_street_number')."',
'p2_info_10_numbere':' ".showData('information_about_you_home_apt_ste_flr_value')."',
'p2_info_10_city_town':' ".showData('information_about_you_home_city_town')."',
'p2_info_10_state':' ".showData('information_about_you_home_state')."',
'p2_info_10_zipcode':' ".showData('information_about_you_home_zip_code')."',
'p2_info_10_province':' ".showData('information_about_you_home_province')."',
'p2_info_10_postal_code':' ".showData('information_about_you_home_postal_code')."',
'p2_info_10_country':' ".showData('information_about_you_home_country')."',
'p2_info_10_from_date':' ".showData('information_about_you_home_residence_from_date')."',
'p2_info_11street_number_name':' ".showData('information_about_you_home_street_number2')."',
'p2_info_11_numbere':' ".showData('information_about_you_home_apt_ste_flr_value2')."',
'p2_info_11_city_town':' ".showData('information_about_you_home_city_town2')."',
'p2_info_11_state':' ".showData('information_about_you_home_state2')."',
'p2_info_11_zipcode':' ".showData('information_about_you_home_zip_code2')."',
'p2_info_11_province':' ".showData('information_about_you_home_province2')."',
'p2_info_11_postal_code':' ".showData('information_about_you_home_postal_code2')."',
'p2_info_11_country':' ".showData('information_about_you_home_country2')."',
'p2_info_11_from_date':' ".showData('information_about_you_home_residence_from_date2')."',
'p2_info_11_to_date':' ".showData('information_about_you_home_residence_to_date2')."',
'part_2_12_other':' ".showData('other_information_about_you_marital_status_other_value')."',
'part_2_13':' ".showData('other_information_about_you_total_married')."',

'p2_about_you_14_last_name':' ".showData('current_spouse_family_last_name')."',
'p2_about_you_14_first_name':' ".showData('current_spouse_given_first_name')."',
'p2_about_you_14_middle_name':' ".showData('current_spouse_family_middle_name')."',
'p2_about_you_15_registration_number':' ".showData('current_spouse_a_number')."',

// page 4

'p2_about_you_16_date_birth':' ".showData('current_spouse_date_of_birth')."',
'p2_about_you_17_date_marriage':' ".showData('current_spouse_date_of_marriage')."',
'p2_about_you_18_city_or_town':' ".showData('current_spouse_birth_place_city_town')."',
'p2_about_you_18_state_or_province':' ".showData('current_spouse_birth_place_province')."',
'p2_about_you_18_country':' ".showData('current_spouse_birth_place_country')."',
'p2_about_you_19_city_or_town':' ".showData('current_spouse_marriage_place_city_town')."',
'p2_about_you_19_state_or_province':' ".showData('current_spouse_marriage_place_province')."',
'p2_about_you_19_country':' ".showData('current_spouse_marriage_place_country')."',

'p2_about_you_20_last_name':' ".showData('prior_spouse1_family_last_name')."',
'p2_about_you_20_first_name':' ".showData('prior_spouse1_given_first_name')."',
'p2_about_you_20_middle_name':' ".showData('prior_spouse1_middle_name')."',
'p2_about_you_21_date_birth':' ".showData('prior_spouse1_date_of_birth')."',
'p2_about_you_22_date_marriage':' ".showData('prior_spouse1_date_of_marriage')."',
'p2_about_you_23_city_or_town':' ".showData('prior_spouse1_marriage_place_city_town')."',
'p2_about_you_23_state_or_province':' ".showData('prior_spouse1_marriage_place_province')."',
'p2_about_you_23_country':' ".showData('prior_spouse1_marriage_place_country')."',
'p2_about_you_24_marriage_legally_ended':' ".showData('prior_spouse1_marriage_end_date')."',
'p2_about_you_25_city_or_town':' ".showData('prior_spouse1_marriage_end_city_town')."',
'p2_about_you_25_state_or_province':' ".showData('prior_spouse1_marriage_end_province')."',
'p2_about_you_25_country':' ".showData('prior_spouse1_marriage_end_country')."',

'p2_about_you_26':' ".showData('test')."',
'additional_info_name_7d':' ".showData('test')."',

// page 5

'immigration_and_criminal_history_date_application_filed':' ".showData('immigration_and_criminal_history_date_application_filed')."',
'location_where_you_filed_your_application_uscis_office':' ".showData('location_where_you_filed_your_application_uscis_office')."',
'location_where_you_filed_your_application_city_town':' ".showData('location_where_you_filed_your_application_city_town')."',
'location_where_you_filed_your_application_state':' ".showData('location_where_you_filed_your_application_state')."',
'location_where_you_filed_your_application_country':' ".showData('location_where_you_filed_your_application_country')."',
'location_where_you_filed_your_application_receipt_no':' ".showData('location_where_you_filed_your_application_receipt_no')."',
'immigration_and_criminal_history_type_of_application':' ".showData('immigration_and_criminal_history_type_of_application')."',
'immigration_and_criminal_history_location_the_application':' ".showData('immigration_and_criminal_history_location_the_application')."',
'immigration_and_criminal_history_outcome_of_the_application':' ".showData('immigration_and_criminal_history_outcome_of_the_application')."',

// page 6

'p2_about_you_37_city':' ".showData('information_about_you_travel_info_city')."',
'p2_info_38_state':' ".showData('information_about_you_travel_info_state')."',
'p2_about_you_39_port_entry':' ".showData('information_about_you_travel_info_port_of_entry')."',
'p2_about_you_40_travel_plan':' ".showData('information_about_you_travel_info_plan_to_travel')."',
'p2_about_you_41_date_of_plan':' ".showData('information_about_you_travel_info_plan_to_enter')."',
'p2_about_you_42_stay_in_us':' ".showData('information_about_you_travel_info_approximate_length_of_stay')."',
'employer1_name':' ".showData('employer1_name')."',
'employer1_address':' ".showData('employer1_address')."',
'employer1_apt_ste_flr_value':' ".showData('employer1_apt_ste_flr_value')."',
'employer1_city_town':' ".showData('employer1_city_town')."',
'employer1_state':' ".showData('employer1_state')."',
'employer1_zip_code':' ".showData('employer1_zip_code')."',
'employer1_province':' ".showData('employer1_province')."',
'employer1_postal_code':' ".showData('employer1_postal_code')."',
'employer1_country':' ".showData('employer1_country')."',
'employer1_occupation':' ".showData('employer1_occupation')."',
'employer1_from_date':' ".showData('employer1_from_date')."',
'employer1_to_date':' ".showData('employer1_to_date')."',

// page 7

'employer2_name':' ".showData('employer2_name')."',
'employer2_address':' ".showData('employer2_address')."',
'employer2_apt_ste_flr_value':' ".showData('employer2_apt_ste_flr_value')."',
'employer2_city_town':' ".showData('employer2_city_town')."',
'employer2_state':' ".showData('employer2_state')."',
'employer2_zip_code':' ".showData('employer2_zip_code')."',
'employer2_province':' ".showData('employer2_province')."',
'employer2_postal_code':' ".showData('employer2_postal_code')."',
'employer2_country':' ".showData('employer2_country')."',
'employer2_occupation':' ".showData('employer2_occupation')."',
'employer2_from_date':' ".showData('employer2_from_date')."',
'employer2_to_date':' ".showData('employer2_to_date')."',
'i_192_applicant_daytime_tel':' ".showData('i_192_applicant_daytime_tel')."',
'i_192_applicant_mobile':' ".showData('i_192_applicant_mobile')."',
'i_192_applicant_email':' ".showData('i_192_applicant_email')."',
'i_192_applicant_sign_date':' ".showData('i_192_applicant_sign_date')."',

// page 8

'i_192_interpreter_family_last_name':' ".showData('i_192_interpreter_family_last_name')."', 
'i_192_interpreter_family_given_first_name':' ".showData('i_192_interpreter_family_given_first_name')."',
'i_192_interpreter_business_name':' ".showData('i_192_interpreter_business_name')."',
'i_192_interpreter_daytime_tel':' ".showData('i_192_interpreter_daytime_tel')."',
'i_192_interpreter_mobile':' ".showData('i_192_interpreter_mobile')."',
'i_192_interpreter_email':' ".showData('i_192_interpreter_email')."',
'i_192_interpreter_certification_language_skill':' ".showData('i_192_interpreter_certification_language_skill')."',
'i_192_interpreter_sign_date':' ".showData('i_192_interpreter_sign_date')."',
'i_192_preparer_family_last_name':' ".showData('i_192_preparer_family_last_name')."',
'i_192_preparer_family_given_first_name':' ".showData('i_192_preparer_family_given_first_name')."',
'i_192_preparer_business_name':' ".showData('i_192_preparer_business_name')."',
'i_192_preparer_daytime_tel':' ".showData('i_192_preparer_daytime_tel')."',
'i_192_preparer_mobile':' ".showData('i_192_preparer_mobile')."',
'i_192_preparer_email':' ".showData('i_192_preparer_email')."',
'i_192_preparer_sign_date':' ".showData('i_192_preparer_sign_date')."',

// page 9

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