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
        $this->SetY( -16 );

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

        $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 157.5, 268, true );

    }
}

$pdf = new MyPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

//* set document information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( '' );
$pdf->SetTitle( 'Form I-912, Request for Fee Waiver' );

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
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3, 3, 29.5, 49.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,33, 50, 'Fee Waiver Approved ', '', 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,33, 59, 'Date:   _____________ ', '', 1, false, true, 'L', true );
//*....................
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3, 3, 72.5, 49.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,77, 50, 'Fee Waiver Approved ', '', 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,77, 59, 'Date:   _____________ ', '', 1, false, true, 'L', true );
//?....................>>
$pdf->writeHTMLCell(3, 3, 140.5, 43.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->setCellHeightRatio( 1.2 );
$pdf->SetFont( 'times', 'B', 10 );
$pdf->writeHTMLCell( 88, 10, 117, 42, 'USCIS Service Center ', '', 1, false, true, 'C', true );
// //*....................
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3, 3, 117.5, 49.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,121, 50, 'Fee Waiver Approved ', '', 1, false, true, 'L', true );
// //*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,121, 59, 'Date:   _____________ ', '', 1, false, true, 'L', true );
// //*....................
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3, 3, 162.5, 49.3, "", 1, 0, false, 'L');//!Custom sell
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,167, 50, 'Fee Waiver Approved ', '', 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->writeHTMLCell(  40, 10,167, 59, 'Date:   _____________ ', '', 1, false, true, 'L', true );
//!First page 1st Table Done/*....................
$pdf->SetFont( 'times', 'B', 10 );
$pdf->MultiCell( 100, 6, 'START HERE - Type or print in black ink.', '', 'L', 0, 1, 19.5, 70, true );
$pdf->SetFont( 'times', '', 10 );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 11, 66.7, false );
$pdf->StopTransform();
//*..........................-
$pdf->SetFont( 'times', '', 11 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->setCellHeightRatio( 1.3 );
$html = '<div><b>If you need extra space to complete any section of this request or if you would like to provide additional<br>
information about your circumstances, use the space provided in Part 11. Additional Information.<br>
Complete and submit as many copies of Part 11., as necessary, with your request. </b></div>';
$pdf->writeHTMLCell ( 190, 18, 13, 75,$html, 1, 1, false, false, 'C', true );
//*.........................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 1. Basis for Your Request</b> (Each basis is further explained in the <b>Specific Instructions</b> section of the
Form I-912 Instructions)</div>";
$pdf->writeHTMLCell(  190, 12, 13, 97, $html, 1, 1, true, false, 'L', true );
//*......................
$pdf->SetFontSize( 10 );

$html = "<div>Select at least one basis or more for which you may qualify and provide supporting documentation for any basis you select. You only<br>
need to qualify and provide documentation for one basis for U.S. Citizenship and Immigration Services (USCIS) to grant your fee<br>
waiver. If you choose, you may select more than one basis; you must provide supporting documentation for each basis you want<br>
considered.</div>";
$pdf->writeHTMLCell(  190, 10, 12, 109.4, $html, "", "", false, true, 'L', true );
//*....................

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>1.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 130, $html, 0, 1, false, false, 'J', true );
$html = '<div><input type="checkbox" name="part-1_1" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 130.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>I am, my spouse is, or the head of household living in my household is currently receiving a means-tested benefit.
(Complete <b>Parts 2. - 4.</b> and <b>Parts 7. - 10.</b>) </div>';
$pdf->writeHTMLCell( 170, 25, 24, 130, $html, 0, 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>2.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 140, $html, 0, 1, false, false, 'J', true );
$html = '<div><input type="checkbox" name="part-1_2" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 140.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>My household income is at or below 150 percent of the Federal Poverty Guidelines. (Complete <b>Parts 2. - 3., Part<br>
5.</b>, and <b>7. - 10.</b>) </div>';
$pdf->writeHTMLCell( 170, 25, 24, 140, $html, 0, 1, false, true, 'L', true );
//*....................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>3.</b> </div>';
$pdf->writeHTMLCell( 10, 5, 12, 150, $html, 0, 1, false, false, 'J', true );
$html = '<div><input type="checkbox" name="part-1_3" value="YES" checked="" /> </div>';
$pdf->writeHTMLCell( 10, 5, 17.5, 150.5, $html, 0, 1, false, false, 'J', true );
$html = '<div>I have a financial hardship. (Complete <b>Parts 2. -3.</b> and <b>Parts 6. - 10</b>.)</div>';
$pdf->writeHTMLCell( 170, 25, 24, 150, $html, 0, 1, false, true, 'L', true );

//*.........................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 2. Information About You (Requestor)</b></div>";
$pdf->writeHTMLCell(  190, 6, 13, 159, $html, 1, 0, true, false, 'L', true );

//*....................
$pdf->SetFontSize( 10 );
$html = "<div>Provide information about yourself if you are the person requesting a fee waiver for a petition or application you are filing. If you are
the parent or legal guardian filing on behalf of a child or person with a physical disability or developmental or mental impairment,
provide information about the child or person for whom you are filing this form.</div>";
$pdf->writeHTMLCell(  190, 10, 12, 166.4, $html, "", "", false, true, 'L', true );
//*....................

$pdf->SetFont('times', '', 10); // set font
$html = '<b>1.</b> &nbsp;&nbsp;&nbsp; Full Name';
$pdf->writeHTMLCell(180, 7, 12, 182, $html, 0, 0, false, false, 'L', true);

$pdf->Ln(1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 19, 186, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 186, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 186, $html, 0, 0, false, false, 'L', true);


$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-1_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19.4, 193);
$pdf->TextField('part2-1_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 193.3);
$pdf->TextField('part2-1_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 193.5);

//*....................

$pdf->SetFont('times', '', 10); // set font
$html = '<b>2.</b> &nbsp;&nbsp;&nbsp; Other Names Used (if any) ';
$pdf->writeHTMLCell(180, 7, 12, 200, $html, 0, 0, false, false, 'L', true);
$html = 'List all other names you have used, including nicknames, aliases, and maiden name.
';
$pdf->writeHTMLCell(130, 5, 19, 204, $html, 0, 0, false, false, 'L', true);
$pdf->Ln(1);
$pdf->SetFillColor(255,255,255);
$html = 'Family Name (Last Name)';
$pdf->writeHTMLCell(40, 7, 19, 210, $html, 0, 0, false, false, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 210, $html, 0, 0, false, false, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 210, $html, 0, 0, false, false, 'L', true);


$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-2_last_name', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 218);
$pdf->TextField('part2-2_first_name', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 218.3);
$pdf->TextField('part2-2_middle_name', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 218.5);
$pdf->TextField('part2-2_last_name2', 74, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 225);
$pdf->TextField('part2-2_first_name2', 56, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 97, 225.3);
$pdf->TextField('part2-2_middle_name2', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 155.5, 225.5);
// //...........

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3. </b>&nbsp;&nbsp;&nbsp; Alien Registration Number (A-Number) (if any)';
$pdf->writeHTMLCell(80, 7, 12, 233, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-3', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 31, 238.5);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>4. </b> USCIS Online Account Number (if any)';
$pdf->writeHTMLCell(80, 7, 96, 233, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-4', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 107, 238.5);
//.................

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1,222, 18, false); // angle 1
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1,222, 99, false); // angle 2
$pdf->StopTransform();
//.......................
$pdf->SetFont('times', '', 11); // set font
$html = '<b> A-</b>';
$pdf->writeHTMLCell(80, 7, 23, 238.5, $html, 0, 0, false, false, 'L', true);

//*/................
$pdf->SetFont('times', '', 10); // set font
$html = '<b>5. </b>&nbsp;&nbsp;&nbsp; Date of Birth (mm/dd/yyyy)';
$pdf->writeHTMLCell(80, 7, 12, 246.6, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-5', 48, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 252.5);

//*....................

$pdf->SetFont('times', '', 10); // set font
$html = '<b>6. </b>&nbsp;&nbsp;&nbsp; U.S. Social Security Number (if any)';
$pdf->writeHTMLCell(80, 7, 76, 246.6, $html, 0, 0, false, false, 'L', true);
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('part2-6', 57, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 90, 252.5);
$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(90);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1,202, 117, false); 
$pdf->StopTransform();


//! first page done....................


$pdf->AddPage( 'P', 'LETTER' );//Page 2 
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 2. Information About You (Requestor)</b> (continued)</div>";
$pdf->writeHTMLCell(  190, 6, 13, 18, $html, 1, 0, true, false, 'L', true );

//*....................


$pdf->setFont('Times', '', 10);
$html= '<div><b>7. </b> Marital Status</div>';
$pdf->writeHTMLCell(110, 7, 12, 26, $html, 0, 1, false, 'L');

$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part2-7single" value="single" checked="" /> Single,Never Married
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part2-7married" value="married" checked="" /> Married

   &nbsp;   &nbsp;   <input type="checkbox"      name="part2-7divorced" value="divorced" checked="" /> Divorced

   &nbsp;   &nbsp;   <input type="checkbox"      name="part2-7widowed" value="widowed" checked="" /> Widowed

   &nbsp;   &nbsp;   <input type="checkbox"      name="part2-7Annulled" value="Annulled" checked="" /> Marriage Annulled

   &nbsp;   &nbsp;   <input type="checkbox"      name="part2-7Separated" value="Separated" checked="" /> Separated';

      

$pdf->writeHTMLCell(190, 7, 15, 31, $html, 0, 1, false, true, 'J');
$html ='<div>&nbsp;<input type="checkbox" name="other" value="Y" checked=" " />  Other (Explain)</div>';
$pdf->writeHTMLCell(180, 7, 17.5, 37, $html, 0, 1, false, true, 'J');
$pdf->writeHTMLCell(137, 7, 52, 37, "", 1, 1, false, true, 'J', true);

//*....................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 3. Applications and Petitions for Which You Are Requesting a Fee Waiver </b></div>";
$pdf->writeHTMLCell(  190, 6, 13, 48, $html, 1, 0, true, false, 'L', true );
//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>1. </b> In the table below, add the form numbers of the applications and petitions for which you are requesting a fee waiver.</div>';
$pdf->writeHTMLCell(180, 7, 12, 56, $html, 0, 1, false, 'L');
//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Applications or Petitions for You and Your Family Members</b></div>";
$pdf->writeHTMLCell(  185, 6, 18, 62, $html, 1, 0, true, false, 'C', true );
//*....................
$pdf->writeHTMLCell( 185, 40.7, 18, 69, '',  1,  0, false, false, 'C', true );//main cell 
$pdf->writeHTMLCell( 185, 8, 18, 33.7, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 185, 8, 18, 38.7, '',  "B",  0, false, false, 'C', true );//second line
$pdf->writeHTMLCell( 185, 8, 18, 43.7, '',  "B",  0, false, false, 'C', true );//third line
$pdf->writeHTMLCell( 185, 8, 18, 49, '',  "B",  0, false, false, 'C', true );//4th line
$pdf->writeHTMLCell( 185, 8, 18, 55, '',  "B",  0, false, false, 'C', true );//5th line
$pdf->setCellHeightRatio( 0 );
//,...............
$pdf->writeHTMLCell( "32", "34", 18.2,69.2, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "32", "27", 24.2,76, "",  "R",  0, false, true, 'C', true );//2nd  vertical line
$pdf->writeHTMLCell( "1", "34", 105,69.2, '',  "R",  0, false, true, 'L', true );//3rd  vertical line
$pdf->writeHTMLCell( "1", "34", 135,69.2, '',  "R",  0, false, true, 'L', true );//4th  vertical line
$pdf->writeHTMLCell( "1", "40.6", 170,69.2, '',  "R",  0, false, true, 'L', true );//4th  vertical line
//...................
$pdf->SetFontSize( 11 );
$html = "<div><b>A- </b></div>";
$pdf->writeHTMLCell(  5, 6, 51, 78.4, $html, "", 0, false, false, 'C', true );//A-
$pdf->writeHTMLCell(  5, 6, 51, 85, $html, "", 0, false, false, 'C', true );//A-
$pdf->writeHTMLCell(  5, 6, 51, 91.8, $html, "", 0, false, false, 'C', true );//A-
$pdf->writeHTMLCell(  5, 6, 51, 98, $html, "", 0, false, false, 'C', true );//A-

//.,............
$pdf->SetFont( 'times', 'B', 10 );
$pdf->writeHTMLCell(  32, 6, 20, 69, "Full Name", "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>A-Number </b>(if any)</div>";
$pdf->writeHTMLCell(  55, 6, 50, 72,$html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Date of Birth </b></div>";
$pdf->writeHTMLCell(  55, 6, 93, 72,$html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Relationship to You</b></div>";
$pdf->writeHTMLCell(  55, 6, 126, 72,$html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Forms Being Filed</b></div>";
$pdf->writeHTMLCell(  55, 6, 159, 72,$html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', '', 10 );
$html = "<div><b>Total Number of Forms </b>(including self)</div>";
$pdf->writeHTMLCell(  75, 6, 93,105.5,$html, "", 0, false, false, 'R', true );

//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-1', 32, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 82.5 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-2', 32, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 89.1 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-3', 32, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 96.1 );
//................
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-4', 50, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 76 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-5', 50, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 82.5 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-6', 50, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 89.1 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-7', 50, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 56.2, 96.1 );

//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-8', 30, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 106.2, 82.5 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-9', 30, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 106.2, 89.1 );
//................
$pdf->SetFont( 'courier', 'B', 10 );

$pdf->TextField( 'part3_input-10', 30, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 106.2, 96.1);

//................
$pdf->SetFont( 'courier', 'B', 1 );
$pdf->writeHTMLCell(  34.5, 6.5,  136.2, 76,"Self", "", 0, false, false, 'C', true );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-11', 34.5, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 136.2, 82.5 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-12', 34.5, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 136.2, 89.1  );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-13', 34.5, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 136.2,  96.1 );

//................
$pdf->SetFont( 'courier', 'B', 10 );

$pdf->TextField( 'part3_input-14', 31.7, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1, 76 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-15', 31.7, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1, 82.5 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-16', 31.7, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1, 89.1  );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-17', 31.7, 6.9, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1,  96.1 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_input-18', 31.7, 6.6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),171.1,  103.1 );


//...............
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 4. Means-Tested Benefits </b></div>";
$pdf->writeHTMLCell(  190, 6, 13, 116, $html, 1, 0, true, false, 'L', true );

//*....................
$pdf->setFont('Times', '', 10);
$html= '<div>If you selected <b>Item Number 1.</b> in <b>Part 1.</b>, complete this section.</div>';
$pdf->writeHTMLCell(180, 7, 12, 124, $html, 0, 1, false, 'L');
//*....................
$pdf->setFont('Times', 'B', 10);
$html= '<div>1.</div>';
$pdf->writeHTMLCell(180, 7, 12, 130, $html, 0, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div>If you, your spouse, or the head of household (including parent if the child is under 21 years of age) living with you is receiving<br>
any means-tested benefits, list the information in the table below and attach supporting documentation. If you are the parent or<br>
legal guardian filing on behalf of a child or person with a physical disability or developmental or mental impairment, provide<br>
information about the child or person for whom you are filing this form if he or she is receiving a means-tested benefit</div>';
$pdf->writeHTMLCell(190, 7, 17, 130, $html, 0, 1, false, 'L');

//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Means-Tested Benefit Recipients</b></div>";
$pdf->writeHTMLCell(  185, 6, 18, 150.5, $html, 1, 0, true, false, 'C', true );
//................
$pdf->writeHTMLCell( 185, 40.7, 18, 157.5, '',  1,  0, false, false, 'C', true );//main cell 
$pdf->writeHTMLCell( 185, 8, 18, 125.7, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 185, 8, 18, 131.7, '',  "B",  0, false, false, 'C', true );//second line
$pdf->writeHTMLCell( 185, 8, 18, 137.7, '',  "B",  0, false, false, 'C', true );//third line
$pdf->writeHTMLCell( 185, 8, 18, 143.7, '',  "B",  0, false, false, 'C', true );//4th line
//.....................................
$pdf->writeHTMLCell( "1", "40.6", 54,157.5, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "1", "40.6", 78,157.5, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "1", "40.6", 118,157.5, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "1", "40.6", 145,157.5, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "1", "40.6", 170,157.5, '',  "R",  0, false, true, 'L', true );//1st  vertical line

//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Full Name of Person<br>
Receiving the Benefit</b></div>";
$pdf->writeHTMLCell(  42, 6, 16, 157.5, $html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Relationship<br>
to You</b></div>";
$pdf->writeHTMLCell(  42, 6, 46, 157.5, $html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Name of Agency<br>
Awarding Benefit</b></div>";
$pdf->writeHTMLCell(  42, 6, 76, 157.5, $html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Type of<br>
Benefit</b></div>";
$pdf->writeHTMLCell(  42, 6, 112, 157.5, $html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', 'B', 10 );
$html = "<div><b>Date Benefit<br>
was Awarded</b></div>";
$pdf->writeHTMLCell(  42, 6, 137, 157.5, $html, "", 0, false, false, 'C', true );
//.,............
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>Date Benefit Expires
</b><br>(or must be renewed)</div>";
$pdf->writeHTMLCell(  42, 6, 166, 157.5, $html, "", 0, false, false, 'C', true );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_input-1', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 167.9 );
$pdf->TextField( 'part4_input-2', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 175.5 );
$pdf->TextField( 'part4_input-3', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 183 );
$pdf->TextField( 'part4_input-4', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18.2, 190.6 );
//................
$pdf->TextField( 'part4_input-5', 23.5, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55.3, 167.9 );
$pdf->TextField( 'part4_input-6', 23.5, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55.3, 175.5 );
$pdf->TextField( 'part4_input-7', 23.5, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55.3, 183 );
$pdf->TextField( 'part4_input-8', 23.5, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55.3, 190.6 );
//................
$pdf->TextField( 'part4_input-9', 39.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 167.9 );
$pdf->TextField( 'part4_input-10', 39.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 175.5 );
$pdf->TextField( 'part4_input-11', 39.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 183 );
$pdf->TextField( 'part4_input-12', 39.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 190.6 );
//................
$pdf->TextField( 'part4_input-13', 27, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119.1, 167.9 );
$pdf->TextField( 'part4_input-14', 27, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119.1, 175.5 );
$pdf->TextField( 'part4_input-15', 27, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119.1, 183 );
$pdf->TextField( 'part4_input-16', 27, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119.1, 190.6 );
//................
$pdf->TextField( 'part4_input-17', 25, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 146.1, 167.9 );
$pdf->TextField( 'part4_input-18', 25, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 146.1, 175.5 );
$pdf->TextField( 'part4_input-19', 25, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 146.1, 183 );
$pdf->TextField( 'part4_input-20', 25, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 146.1, 190.6 );
//................
$pdf->TextField( 'part4_input-21', 31.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 171.1, 167.9 );
$pdf->TextField( 'part4_input-22', 31.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 171.1, 175.5 );
$pdf->TextField( 'part4_input-23', 31.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 171.1, 183 );
$pdf->TextField( 'part4_input-24', 31.8, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 171.1, 190.6 );

//...............
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 5. Income at or Below 150 Percent of the Federal Poverty Guidelines
</b></div>";
$pdf->writeHTMLCell(  190, 6, 13, 204, $html, 1, 0, true, false, 'L', true );
//...............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you selected <b>Item Number 2</b> in <b>Part 1.</b>, complete this section</div>';
$pdf->writeHTMLCell( 190, 10, 13, 212, $html, '', 1, false, true, 'L', true );
//...............
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b><i>Your Employment Status </i> </b>  </div>';
$pdf->writeHTMLCell( 190, 5, 13, 220, $html, '', 1, true, false, 'L', true );
//...................
$pdf->setFont('Times', '', 10);
$html= '<div><b>1. </b> Employment Status</div>';
$pdf->writeHTMLCell(110, 7, 12, 228, $html, 0, 1, false, 'L');

$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-1Employed" value="Employed" checked="" /> Employed (full-time, part-time,
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-1Unemploye" value="Unemploye" checked="" />Unemployed or 

   &nbsp;   &nbsp;  &nbsp; <input type="checkbox"      name="part5-1Retired" value="Retired" checked="" /> Retired

   &nbsp;   &nbsp;  &nbsp; <input type="checkbox"      name="part5-1Other" value="Other" checked="" /> Other (Explain)';

$pdf->writeHTMLCell(190, 7, 15, 234, $html, 0, 1, false, true, 'J');
$html ='<div>seasonal, self-employed) </div>';
$pdf->writeHTMLCell(180, 7, 23.5, 238, $html, 0, 1, false, true, 'J');
$html ='<div>Not Employed</div>';
$pdf->writeHTMLCell(180, 7, 77.5, 238, $html, 0, 1, false, true, 'J');
$pdf->writeHTMLCell(70, 7, 132, 240, "", 1, 1, false, true, 'J', true);
//!page 2 done......................





















$pdf->AddPage( 'P', 'LETTER' );//Page 3 
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 5. Income at or Below 150 Percent of the Federal Poverty Guidelines </b> (continued)</div>";
$pdf->writeHTMLCell(  190, 6, 13, 18, $html, 1, 0, true, false, 'L', true );
//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b>   If you are currently unemployed, are you currently receiving unemployment benefits?</div>';
$pdf->writeHTMLCell(160, 7, 12, 26, $html, 0, 1, false, 'L');
//...............
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-2" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-2" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 4, 175, 27, $html, 0, 1, false, true, 'J'); 

//..................
$pdf->setFont('Times', 'B', 10);
$html ='A.';
$pdf->writeHTMLCell(190, 5, 16, 32, $html, 0, 1, false, true, 'J'); 
//..................
$pdf->setFont('Times', '', 10);
$html ='Date you became unemployed <br>(mm/dd/yyyy)';
$pdf->writeHTMLCell(190, 5, 22, 32, $html, 0, 1, false, true, 'J'); 
//.................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_input-2a', 47, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 22, 42 );
//...............
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b><i>Information About Your Spouse</i> </b>  </div>';
$pdf->writeHTMLCell( 190, 3, 13, 53, $html, '', 1, true, false, 'L', true );
///................
$pdf->setFont('Times', '', 10);
$html= '<div><b>3. </b>   If you are married or separated, does your spouse live in your household?</div>';
$pdf->writeHTMLCell(160, 3, 12, 61, $html, 0, 1, false, 'L');
//...............
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-3" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-3" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 3, 175, 61, $html, 0, 1, false, true, 'J'); 
//..................
$pdf->setFont('Times', 'B', 10);
$html ='A.';
$pdf->writeHTMLCell(190, 3, 16, 68, $html, 0, 1, false, true, 'J'); 
//..................
$pdf->setFont('Times', '', 10); 
$html ='If you answered “No” to Item Number 3., does your spouse provide any financial support to your<br>
household?';
$pdf->writeHTMLCell(190, 3, 22, 68, $html, 0, 1, false, true, 'J'); 
//*....................
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-3A" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-3A" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 3, 175, 69, $html, 0, 1, false, true, 'J'); 
//......................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b><i>Your Household Size</i> </b>  </div>';
$pdf->writeHTMLCell( 190, 5, 13, 80, $html, '', 1, true, false, 'L', true );

///................
$pdf->setFont('Times', '', 10);
$html= '<div><b>4. </b>   Are you the person providing the primary financial support for your household? </div>';
$pdf->writeHTMLCell(160, 7, 12,87, $html, 0, 1, false, 'L');
//...............
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-4" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-4" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 5, 175,87, $html, 0, 1, false, true, 'J');
//...............
$html ="If you answered “Yes” to <b>Item Number 4.</b>, type or print your name on the line marked “self” in the table below. If you answered<br>
“No” to <b>Item Number 4.</b>, type or print your name on the line marked “self” in the table below and add the head of household's<br>
name on the line below yours. ";

$pdf->writeHTMLCell(190, 5, 16,94, $html, 0, 1, false, true, 'J');

//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Household Size</b></div>";
$pdf->writeHTMLCell(  187, 6, 18, 110, $html, 1, 0, true, false, 'C', true );
//................
$pdf->writeHTMLCell( 187, 50.7, 18, 117, '',  1,  0, false, false, 'C', true );//!main cell .....................................>>>
$pdf->writeHTMLCell( 187, 1, 18, 79, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 187, 1, 18, 85, '',  "B",  0, false, false, 'C', true );//second line
$pdf->writeHTMLCell( 187, 1, 18, 91, '',  "B",  0, false, false, 'C', true );//third line
$pdf->writeHTMLCell( 187, 1, 18, 97, '',  "B",  0, false, false, 'C', true );//4th line
$pdf->writeHTMLCell( 187, 1, 18, 103, '',  "B",  0, false, false, 'C', true );//5th line
//.....................................
$pdf->writeHTMLCell( "1", "44.1", 54,117, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "1", "44.1", 78,117, '',  "R",  0, false, true, 'L', true );/// vertical line
$pdf->writeHTMLCell( "1", "44.1", 104,117, '',  "R",  0, false, true, 'L', true );//  vertical line
$pdf->writeHTMLCell( "1", "44.1", 133,117, '',  "R",  0, false, true, 'L', true );//  vertical line
$pdf->writeHTMLCell( "1", "50.6", 162,117, '',  "R",  0, false, true, 'L', true );//  vertical line

//..............
$pdf->SetFont( 'times', '', 10 );
$html = "<div><b>Total Household Size
</b> (including self)</div>";
$pdf->writeHTMLCell(  62, 4, 99, 161.4, $html, "", 0, false, false, 'R', true );
$html = "<div><b>Full
Name</div>";
$pdf->writeHTMLCell(  10, 4, 29, 118.4, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Date of
Birth</div>";
$pdf->writeHTMLCell(  15, 4, 58.5, 118.4, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Relationship
to You</div>";
$pdf->writeHTMLCell(  20, 4, 82, 118.4, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Married</div>";
$pdf->writeHTMLCell(  15, 4, 111, 121, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Full-Time
Student</div>";
$pdf->writeHTMLCell(  20, 4, 138, 118.4, $html, "", 0, false, false, 'C', true );
$pdf->SetFont( 'times', '', 9.5 );
$html = "<div><b>Is any income earned by this
person counted towards the
household income?</div>";
$pdf->writeHTMLCell(  50, 6, 158.5, 116.4, $html, "", 0, false, false, 'C', true );
//.........................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_input-1', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 131.2 );
$pdf->TextField( 'part5_input-2', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 138.6 );
$pdf->TextField( 'part5_input-3', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 146.1 );
$pdf->TextField( 'part5_input-4', 37, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 153.6 );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_input-5', 24, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55, 131.2 );
$pdf->TextField( 'part5_input-6', 24, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55, 138.6 );
$pdf->TextField( 'part5_input-7', 24, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55, 146.1 );
$pdf->TextField( 'part5_input-8', 24, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 55, 153.6 );
//...............
$pdf->SetFont( 'courier', 'B', 10 );
$html = "<div>Self</div>";
$pdf->writeHTMLCell(   20, 6, 82, 125, $html, "", 0, false, false, 'C', true );
$pdf->TextField( 'part5_input-9', 26, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 138.6 );
$pdf->TextField( 'part5_input-10', 26, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 146.1 );
$pdf->TextField( 'part5_input-11', 26, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 79, 153.6 );
//..............
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M1" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M1" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 104, 132.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M2" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 104, 139.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M3" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M3" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 104, 146.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M4" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M4" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 104, 154.5, $html, 0, 1, false, true, 'J'); 
//...........
//...............
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S1" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S1" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 133, 132.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S2" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 133, 139.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S3" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S3" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 133, 146.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S4" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S4" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 133, 154.5, $html, 0, 1, false, true, 'J'); 
//...........
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-isAnyIncome_1" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-isAnyIncome_1" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 4, 168, 132.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-isAnyIncome_2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-isAnyIncome_2" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 168, 139.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-isAnyIncome_3" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-isAnyIncome_3" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 168, 146.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-isAnyIncome_4" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-isAnyIncome_4" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 168, 154.5, $html, 0, 1, false, true, 'J'); 
//...........
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_input-12', 42, 6.7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 163, 161.1 );

//......................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b><i>Your Annual Household Income</i> </b>  </div>';
$pdf->writeHTMLCell( 191, 5, 13, 170.4, $html, '', 1, true, false, 'L', true );


///................
$pdf->setFont('Times', '', 9.7);
$html= '<div>Provide information about your income and the income of all family members counted as part of your household. You must list all
amounts in U.S. dollars</div>';
$pdf->writeHTMLCell(190, 4, 12,176, $html, 0, 1, false, 'L');
///................
$pdf->setFont('Times', '', 9.7);
$html= '<div><b>5. </b>   Your Annual Income</div>';
$pdf->writeHTMLCell(160, 4, 12,185, $html, 0, 1, false, 'L');
$html= '<div>$</div>';
$pdf->writeHTMLCell(10, 4, 159,185.1, $html, 0, 1, false, 'L');
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_5input', 42, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 163, 184 );

//...............
$pdf->setFont('Times', '', 9.7);
$html= '<div><b>6. </b>   Annual Income of All Family Members </div>';
$pdf->writeHTMLCell(160, 4, 12,190, $html, 0, 1, false, 'L');
//............
$html= '<div>Provide the annual income of all family members counted as part of your household as listed in <b>Item Number 4.</b> (Do not include<br>
the amount provided in <b>Item Number 5.</b>)</div>';
$pdf->writeHTMLCell(190, 4, 17,195, $html, 0, 1, false, 'L');
//........
$html= '<div>$</div>';
$pdf->writeHTMLCell(10, 4, 159,200.1, $html, 0, 1, false, 'L');
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_6input', 42, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 163, 200 );

//.............

$pdf->setFont('Times', '', 9.7);
$html= '<div><b>7. </b>   Total Additional Income or Financial Support</div>';
$pdf->writeHTMLCell(160, 4, 12,207, $html, 0, 1, false, 'L');
$html= '<div>$</div>';
$pdf->writeHTMLCell(10, 4, 159,207, $html, 0, 1, false, 'L');
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_7input', 42, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 163, 207.5 );

//............
$pdf->setFont('Times', '', 9.9);
$html= '<div>Provide the total annual amount you receive in additional income or financial support from a source outside of your household.<br>
(Do not include the amount provided in <b>Item Numbers 5.</b> or <b>6.</b>) You must add all of the additional income and financial support<br>
amounts and put the total amount in the space provided. Type or print "0" in the total box if there are none. Select the type of<br>
additional income or financial support that you receive and provide documentation.</div>';
$pdf->writeHTMLCell(190, 7, 17,213, $html, 0, 1, false, 'L');




//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part5-7-1" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 232, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 10 );
$html ='<div>Parental Support</div>';
$pdf->writeHTMLCell(50, 2, 23, 232, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part5-7-2" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 238, $html, 0, 1, false, true, 'J'); 
$html ='<div>Spousal Support (Alimony)</div>';
$pdf->writeHTMLCell(50, 2, 23, 238, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part5-7-3" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 244, $html, 0, 1, false, true, 'J'); 
$html ='<div>Child Support</div>';
$pdf->writeHTMLCell(50, 2, 23, 244, $html, 0, 1, false, true, 'L'); 
//................



//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-4" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65, 232, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 9.7 );
$html ='<div>Educational Stipends</div>';
$pdf->writeHTMLCell(50, 2,71, 232, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-5" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65,238, $html, 0, 1, false, true, 'J'); 
$html ='<div>Royalties</div>';
$pdf->writeHTMLCell(50, 2,71,238, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-6" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65, 244, $html, 0, 1, false, true, 'J'); 
$html ='<div>Pensions</div>';
$pdf->writeHTMLCell(50, 2,71, 244, $html, 0, 1, false, true, 'L'); 
//................

//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-7" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 102, 232, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 9.7 );
$html ='<div>Unemployment Benefits</div>';
$pdf->writeHTMLCell(50, 2,108 , 232, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-8" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 102, 238, $html, 0, 1, false, true, 'J'); 
$html ='<div>Social Security Benefits</div>';
$pdf->writeHTMLCell(50, 2,108 , 238, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-9" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 102, 244, $html, 0, 1, false, true, 'J'); 
$html ="<div>Veteran's Benefits</div>";
$pdf->writeHTMLCell(50, 0,108 , 244, $html, 0, 1, false, true, 'L'); 
//................
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-10" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 0, 145, 232, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 9.7 );
$html ='<div>Financial Support From Adult
Children,<br>Dependents, Other People
Living in the <br>Household
 </div>';
$pdf->writeHTMLCell(80, 0,150 , 232, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part5-7-11" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 0, 145, 245, $html, 0, 1, false, true, 'J'); 
$html ="<div>Other (Explain)</div>";
$pdf->writeHTMLCell(50, 0,150.4 , 245, $html, 0, 1, false, true, 'L'); 
// // //................

$pdf->writeHTMLCell(50, 3.5,150.4 , 250.5, "", 1, 1, false, true, 'L'); 



//!add the 4th page 3rd page variable name set left multiple input feilds have the same name .............

$pdf->AddPage('P', 'LETTER'); //page number 4
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 5. Income at or Below 150 Percent of the Federal Poverty Guidelines </b> (continued)</div>";
$pdf->writeHTMLCell(  190, 6, 13, 18, $html, 1, 0, true, false, 'L', true );

//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>8. </b>   Total Household Income (add the amounts from <b>Item Numbers 5., 6.</b>, and<b> 7.</b>)</div>';
$pdf->writeHTMLCell(160, 2, 12, 26, $html, 0, 1, false, 'L');
//...............
$html ='$';
$pdf->writeHTMLCell(190, 4, 170, 27, $html, 0, 1, false, true, 'J'); 
$pdf->writeHTMLCell(30, 4, 173, 27,"" , 1, 1, false, true, 'J'); 

//..............
//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>9. </b>   Has anything changed since the date you filed your Federal tax returns? (For example, your marital status,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;income, or number of dependents.)</div>';
$pdf->writeHTMLCell(160, 2, 12, 36, $html, 0, 1, false, 'L');
//...............
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-9" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-9" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 4, 175, 37, $html, 0, 1, false, true, 'J'); 
//...............
$html ='If you answered "Yes" to Item Number 9., provide an explanation below. Provide documentation if available. You may 
also <br>use this space to provide any additional information about your circumstances that you would like USCIS to consider.';

$pdf->writeHTMLCell(190, 4, 16, 47, $html, 0, 1, false, true, 'L'); 

//.................
$pdf->writeHTMLCell( 187, 1, 16, 51, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 187, 1, 16, 56, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 187, 1, 16, 61, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 187, 1, 16, 66, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 187, 1, 16, 71, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 187, 1, 16, 76, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 187, 1, 16, 81, '',  "B",  0, false, false, 'C', true );
//...........
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 6. Financial Hardship </b></div>";
$pdf->writeHTMLCell(  190, 6, 13, 109, $html, 1, 0, true, false, 'L', true );
//................

$pdf->setFont('Times', '', 10);
$html ='If you selected <b>Item Number 3</b>. in <b>Part 1</b>., complete this section.';
$pdf->writeHTMLCell(190, 4, 12, 117, $html, 0, 1, false, true, 'L'); 


//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>1. </b>   If you or any family members have a situation that has caused you to incur expenses, debts, or loss of income, describe the<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;situation in the box below. Specify the amounts of the expenses, debts, and income losses in as much detail as possible.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Examples may include medical expenses, job loss, eviction, and homelessness.</div>';
$pdf->writeHTMLCell(190, 7, 12, 124, $html, 0, 1, false, 'L');
//..............
$pdf->setCellHeightRatio( 1 );
$pdf->setFont('courier', 'B', 10);
$html = <<<EOD
<textarea cols="44" rows="15" name="part6_1_input" multiline="true">
</textarea>
EOD;
$pdf->writeHTMLCell(10, 40,16, 140, $html, 0, 0, false, 'L');
//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>2. </b>   If you have cash or assets that you can quickly convert to cash, list those in the table below. For example, bank accounts, stocks, <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;or bonds. (Do not include retirement accounts.)</div>';
$pdf->writeHTMLCell(190, 2, 12, 194, $html, 0, 1, false, 'L');
//.........
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Assets</b></div>";
$pdf->writeHTMLCell(  90, 5, 18, 203, $html, 1, 0, true, false, 'C', true );
//.,.............
$pdf->writeHTMLCell( 90, 1, 18, 208, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 90, 1, 18, 213, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 90, 1, 18, 218, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 90, 1, 18, 223, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 90, 1, 18, 228, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell( 2, 33.5, 16, 209, '',  "R",  0, false, true, 'L', true );//1st line 
$pdf->writeHTMLCell( 2, 32.5, 60, 210, '',  "R",  0, false, true, 'L', true );//1st line 
$pdf->writeHTMLCell( 2, 33.5, 106, 209, '',  "R",  0, false, true, 'L', true );//1st line 
$pdf->SetFontSize( 9.7 );
$html = "<div><b>Type of Asset</b></div>";
$pdf->writeHTMLCell(  30, 2, 25, 212, $html, "", 0, false, true, 'C', true );
$html = "<div><b>Value </b>(U.S. Dollars)</div>";
$pdf->writeHTMLCell(  30, 2, 68, 212, $html, "", 0, false, true, 'C', true );
$html = "<div><b>Total Value of Assets</b></div>";
$pdf->writeHTMLCell(  40, 2, 25, 238, $html, "", 0, false, true, 'C', true );
//................
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_2_input-1', 44, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 216.5 );
$pdf->TextField( 'part6_2_input-2', 44, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 223 );
$pdf->TextField( 'part6_2_input-3', 44, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18, 229.5 );
$pdf->TextField( 'part6_2_input-4', 46, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 62, 216.5 );
$pdf->TextField( 'part6_2_input-5', 46, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 62, 223 );
$pdf->TextField( 'part6_2_input-6', 46, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 62, 229.5 );

//!page 4 done...........



$pdf->AddPage('P', 'LETTER'); //?page number 5
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 6. Financial Hardship</b> (continued)</div>";
$pdf->writeHTMLCell(  191, 6, 13, 18, $html, 1, 0, true, false, 'L', true );

//*....................
$pdf->setFont('Times', '', 10);
$html= '<div><b>3. </b>  Total Monthly Expenses and Liabilities </div>';
$pdf->writeHTMLCell(160, 2, 12, 26, $html, 0, 1, false, 'L');
//...............
$html ='$';
$pdf->writeHTMLCell(190, 4, 166, 27, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3_input', 35, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 169.5, 25.7 );
//..............

$pdf->setFont('Times', '', 10);
$html= '<div>Provide the total monthly amount of your expenses and liabilities. You must add all of the expense and liability amounts and type<br>
or print the total amount in the space provided. Type or print "0" in the total box if there are none. Select the types of expenses or<br>
liabilities you have each month and provide evidence of monthly payments, where possible.</div>';
$pdf->writeHTMLCell(190, 7, 17, 34, $html, 0, 1, false, 'L');

//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part6-3-checkBox-1" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 49, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 10 );
$html ='<div>Rent and/or Mortgage</div>';
$pdf->writeHTMLCell(50, 2, 23, 49, $html, 0, 1, false, true, 'L'); 
// //*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part6-3-checkBox-2" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 55, $html, 0, 1, false, true, 'J'); 
$html ='<div>Food</div>';
$pdf->writeHTMLCell(50, 2, 23, 55, $html, 0, 1, false, true, 'L'); 
// //*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part6-3-checkBox-3" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 61, $html, 0, 1, false, true, 'J'); 
$html ='<div>Utilities</div>';
$pdf->writeHTMLCell(50, 2, 23, 61, $html, 0, 1, false, true, 'L'); 
// //*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part6-3-checkBox-4" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 67, $html, 0, 1, false, true, 'J'); 
$html ='<div>Child and/or Elder Care</div>';
$pdf->writeHTMLCell(50, 2, 23, 67, $html, 0, 1, false, true, 'L'); 
// //*....................
$pdf->SetFont( 'times', '', 10 );
$html ='<input type="checkbox" name="part6-3-checkBox-5" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 18, 73, $html, 0, 1, false, true, 'J'); 
$html ='<div>Insurance</div>';
$pdf->writeHTMLCell(50, 2, 23, 73, $html, 0, 1, false, true, 'L'); 
// //................



//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part6-3-checkBox-6" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65,  49, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 9.7 );
$html ='<div>Loans and/or Credit Cards</div>';
$pdf->writeHTMLCell(50, 2,71,  49, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part6-3-checkBox-7" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65,55, $html, 0, 1, false, true, 'J'); 
$html ='<div>Car Payment</div>';
$pdf->writeHTMLCell(50, 2,71,55, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part6-3-checkBox-8" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65, 61, $html, 0, 1, false, true, 'J'); 
$html ='<div>Commuting Costs</div>';
$pdf->writeHTMLCell(50, 2,71, 61, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part6-3-checkBox-9" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65, 67, $html, 0, 1, false, true, 'J'); 
$html ='<div>Medical Expenses</div>';
$pdf->writeHTMLCell(50, 2,71, 67, $html, 0, 1, false, true, 'L'); 
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part6-3-checkBox-10" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 65, 73, $html, 0, 1, false, true, 'J'); 
$html ='<div>School Expenses
</div>';
$pdf->writeHTMLCell(50, 2,71, 73, $html, 0, 1, false, true, 'L'); 
//................
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html ='<input type="checkbox" name="part6-3-checkBox-11" value="Y" checked="" /><br>';
$pdf->writeHTMLCell(2, 2, 116,  49, $html, 0, 1, false, true, 'J'); 
$pdf->SetFont( 'times', '', 9.7 );
$html ='<div>Other</div>';
$pdf->writeHTMLCell(50, 2,122,  49, $html, 0, 1, false, true, 'L'); 

//.................
$pdf->writeHTMLCell( 77, 1, 123, 51, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 77, 1, 123, 56, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 77, 1, 123, 61, '',  "B",  0, false, false, 'C', true );
$pdf->writeHTMLCell( 77, 1, 123, 66, '',  "B",  0, false, false, 'C', true );

//.....................>>>

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 7. Requestor's Statement, Contact Information, Certification, and Signature</b></div>";
$pdf->writeHTMLCell(  191, 6, 13, 85, $html, 1, 0, true, false, 'L', true );

//.....................>>>


$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE</b>: Read the <b>Penalties</b> section of the Form I-912 Instructions before completing this part.</div>';
$pdf->writeHTMLCell(190, 7, 12, 93, $html, 0, 1, false, 'L');
//..............

$pdf->setFont('Times', '', 10);
$html= '<div>Each person applying for a fee waiver request must complete, sign, and date Form I-912 and provide the required documentation.<br>
This includes family members identified in Part 3. Signature fields for family members are at the end of this part. If an individual is<br>
under 14 years of age, a parent or legal guardian may sign the request on their behalf. USCIS rejects any Form I-912 that is not signed<br>
by all individuals requesting a fee waiver and may deny a request that does not provide required documentation.</div>';
$pdf->writeHTMLCell(190, 7, 12, 100, $html, 0, 1, false, 'L');
//..............

$pdf->setFont('Times', '', 10);
$html= '<div>Select the box for either <b>Item A.</b> or <b>B.</b> in <b>Item Number 1.</b> If applicable, select the box for <b>Item Number 2.</b></div>';
$pdf->writeHTMLCell(190, 7, 12, 119, $html, 0, 1, false, 'L');

//*....................
$pdf->setFont('Times', '', 10);
$html= "<div><b>1. </b>    Requestor's Statement Regarding the Interpreter</div>";
$pdf->writeHTMLCell(160, 2, 12, 125, $html, 0, 1, false, 'L');

//..............
$pdf->setFont('Times', '', 10); 
$html= '<div><b>A.  </b>  <input type="checkbox" name="part7-1-checkBox-A" value="Y" checked=" " /> &nbsp;  I can read and understand English, 
and I have read and understand every question and instruction on this request and my<br>
</div>';
$pdf->writeHTMLCell(190, 7, 17, 131,  $html, 0, 1, false, 'L');
$html= '<div>answer to every question.
</div>';
$pdf->writeHTMLCell(190, 7, 30, 134.5,  $html, 0, 1, false, 'L');

//..............
$html= '<div><b>B.  </b>  <input type="checkbox" name="part7-1-checkBox-B" value="Y" checked=" " />   The interpreter named in <b>Part 9</b>. read to me every question and instruction on this request and my answer to every<br> &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;question, in </div>';
$pdf->writeHTMLCell(190, 7, 17, 140,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 150, 144, " , a language in which I am fluent,", 0, 1, false, 'L');
$pdf->writeHTMLCell(103, 6, 47, 145.5,"", 1, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 29, 151, "and I understood everything.", 0, 1, false, 'L');

//..........

$pdf->setFont('Times', '', 10); 
$html= "<div><b>2.  </b>  Requestor's Statement Regarding the Preparer (if applicable)</b></div>";
$pdf->writeHTMLCell(190, 7, 12, 156,  $html, 0, 1, false, 'L');
//..............

$html= '<div><input type="checkbox" name="part7-2-checkBox" value="Y" checked=" " />&nbsp;  At my request, the preparer named in <b>Part 10.</b>, <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; prepared this request for me based only upon information I provided or authorized.</div>';
$pdf->writeHTMLCell(190, 7, 17, 162,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(103, 6, 91, 161,"", 1, 1, false, 'L');
$pdf->writeHTMLCell(5, 6, 194.2, 161,",", "", 1, false, 'L');
// //..........
$pdf->setFont('Times', 'I', 12); 
$html= "<div><b>Requestor's Contact Information</b></div>";
$pdf->writeHTMLCell(190, 7, 12, 175,  $html, 0, 1, true, 'L');
// //..............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>3.  </b> Requestor\'s Daytime Telephone Number </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 182.5,  $html, 0, 1, false, 'L');
// //..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_7-3_aplicant_contact_daytime_telephone', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 188);
// //..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>4.  </b> Requestor\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 182.5,  $html, 0, 1, false, 'L');
// //..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_7-4_aplicant_contact_mobile_telephone', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 188);
// //..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>5.  </b> Requestor\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 196,  $html, 0, 1, false, 'L');
// //..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_7-5_aplicant_contact_email_address', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 202);
// //..........
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Requestor\'s Certification </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 212,  $html, 0, 1, true, 'L');
// //..............

$pdf->setFont('Times', '', 9.9); 
$html= '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of
my records that USCIS may need to determine my eligibility for the immigration benefit I seek.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 220,  $html, 0, 1, false, 'L');
$html= '<div>I further authorize release of information contained in this request, in supporting documents, and in my USCIS records to other entities
and persons where necessary for the administration and enforcement of U.S. immigration laws.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 235,  $html, 0, 1, false, 'L');
$html= '<div>I certify, under penalty of perjury, that I provided or authorized all of the information in my request, I understand all of the
information contained in, and submitted with, my request, and that all of this information is complete, true, and correct.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 245,  $html, 0, 1, false, 'L');


//!page ---6...............starts here ................
$pdf->AddPage('P', 'LETTER'); //?page number 6
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 7. Requestor's Statement, Contact Information, Certification, and Signature</b> (continued)</div>";
$pdf->writeHTMLCell(  191, 6, 13, 18, $html, 1, 0, true, false, 'L', true );
//...........
$pdf->SetFont( 'times', '', 10 );
$html= '<div><b>WARNING</b>: If you knowingly and willfully falsify or conceal a material fact or submit a false document with your Form I-912,
USCIS will deny your fee waiver request and may deny any other immigration benefit. In addition, you may face severe penalties
provided by law and may be subject to criminal prosecution.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 25.5,  $html, 0, 1, false, 'L');
//..............................
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Requestor\'s Signature </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 43,  $html, 0, 1, true, 'L');
//..................

$pdf->setFont('Times', '', 10);
$html= "<div><b>6.      </b>    Requestor's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 51, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 20, 57, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 55, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

//..........................
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 51, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_6_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 57);


//...........
$pdf->SetFont( 'times', '', 10 );
$html= '<div><b>NOTE TO ALL REQUESTORS</b>: If you do not completely fill out this request or fail to submit required documents listed in the
Instructions, USCIS may deny your request.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 64.5,  $html, 0, 1, false, 'L');
//..............................
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Family Member\'s Signatures </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 76,  $html, 0, 1, true, 'L');


//...........
$pdf->SetFont( 'times', '', 10 );
$html= "<div><b>NOTE:</b> Each family member <b>must</b> type or print their full name and sign in the spaces below. You can find additional family<br>
members' signature spaces in <b>Item Numbers 7. - 10</b>. below. All family members identified in <b>Part 3</b>. must sign and date Form I-912.

</div>";
$pdf->writeHTMLCell(194, 7, 12, 84,  $html, 0, 1, false, 'L');
$html= "<div>
I certify that the information provided by the requestor in <b>Part 7</b>. applies to me.
</div>";
$pdf->writeHTMLCell(194, 7, 12, 94,  $html, 0, 1, false, 'L');

//*...................***
$pdf->setFont('Times', '', 10);
$html= "<div><b>7.      </b>    Family Member 1<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's Name</div>";
$pdf->writeHTMLCell(80, 7, 12, 100, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'part7_7_input', 184, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18,110 );
$pdf->setFont('Times', '', 10);
$html= "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's  Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 117.4, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(124, 6, 18, 122.4, '', 1, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 117.4, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_7_signature', 58, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 122.4);

//*...................***
$pdf->setFont('Times', '', 10);
$html= "<div><b>8.      </b>    Family Member 2<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's Name</div>";
$pdf->writeHTMLCell(80, 7, 12, 131, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'part7_8_input', 184, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18,141 );
$pdf->setFont('Times', '', 10);
$html= "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's  Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 148.4, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(124, 6, 18, 153.4, '', 1, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 148.4, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_8_signature', 58, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 153.4);

//*...................***
$pdf->setFont('Times', '', 10);
$html= "<div><b>9.      </b>    Family Member 3<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's Name</div>";
$pdf->writeHTMLCell(80, 7, 12, 162, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'part7_9_input', 184, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18,172 );
$pdf->setFont('Times', '', 10);
$html= "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's  Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 179.4, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(124, 6, 18, 185.4, '', 1, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 179.4, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_9_signature', 58, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 185.4);

//*...................***
$pdf->setFont('Times', '', 10);
$html= "<div><b>10.      </b>    Family Member 4<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's Name</div>";
$pdf->writeHTMLCell(80, 7, 12, 194, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'part7_10_input', 184, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18,204 );
$pdf->setFont('Times', '', 10);
$html= "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's  Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 211.4, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(124, 6, 18, 216.4, '', 1, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 211.4, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_10_signature', 58, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 216.4);

//*...................***
$pdf->setFont('Times', '', 10);
$html= "<div><b>11.      </b>    Family Member 5<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's Name</div>";
$pdf->writeHTMLCell(80, 7, 12, 225, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'part7_11_input', 184, 6.5, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 18,235 );
$pdf->setFont('Times', '', 10);
$html= "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Family Member's  Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 242.4, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(124, 6, 18, 247.4, '', 1, 1, false, 'L');
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 242.4, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part7_11_signature', 58, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 247.4);


// //!page 7 will be starts form here ............
$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 8. Family Member's Statement, Contact Information, Certification, and Signature</b> </div>";
$pdf->writeHTMLCell(  191, 6, 13, 18, $html, 1, 0, true, false, 'L', true );
//...........
$pdf->SetFont( 'times', '', 10 );
$html= '<div><b>NOTE</b>: Read the <b>Penalties</b> section of the Form I-912 Instructions before completing this part.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 25.5,  $html, 0, 1, false, 'L');
$pdf->SetFont( 'times', '', 10 );
$html= '<div>If the information provided by the requestor in <b>Part 7</b>. is not applicable to a family member identified in <b>Part 3</b>., (for example, the
family member used an interpreter or speaks a different language) that individual should complete <b>Part 8</b>. USCIS rejects any Form
I-912 that is not signed by all individuals requesting a fee waiver.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 32.5,  $html, 0, 1, false, 'L');
$pdf->SetFont( 'times', '', 10 );
$html= '<div>Select the box for either <b>Item A</b>. or <b>B</b>. in <b>Item Number 1</b>. If applicable, select the box for <b>Item Number 2</b>.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 46.5,  $html, 0, 1, false, 'L');

//.............................
$pdf->SetFont( 'times', '', 10 );
$html= "<div><b>1.</b>    &nbsp;  Family Member's Statement Regarding the Interpreter for</div>";
$pdf->writeHTMLCell(180, 7, 12, 53, $html, 0, 1, false, 'L');
//............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_1_input', 100, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 103, 53);
//...............
$pdf->SetFont( 'times', '', 10 );
$html= '<div><b>   &nbsp;  &nbsp;  A.     </b>     <input type="checkbox" name="part8-1-checkBox-A" value="1" /></div>';
$pdf->writeHTMLCell(180, 7, 12, 61, $html, 0, 1, false, 'L');
$html= '<div> I can read and understand English, and I have read and understand every question and instruction on this request and my
&nbsp;answer to every question.</div>';
$pdf->writeHTMLCell(180, 7, 28, 61, $html, 0, 1, false, 'L');
//!..................................................................


//..............
$html= '<div><b>B.  </b>  <input type="checkbox" name="part8-1-checkBox-B" value="Y" checked=" " />   The interpreter named in <b>Part 9</b>. read to me every question and instruction on this request and my answer to every<br> &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;question, in </div>';
$pdf->writeHTMLCell(190, 7, 17, 70,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 150, 74, " , a language in which I am fluent,and", 0, 1, false, 'L');
$pdf->writeHTMLCell(103, 6, 47, 75.5,"", 1, 1, false, 'L');
$pdf->writeHTMLCell(190, 7, 29, 80.5, " I understood everything.", 0, 1, false, 'L');

//..........

$pdf->setFont('Times', '', 10); 
$html= "<div><b>2.  </b>  Family Member's Statement Regarding the Preparer for</b></div>";
$pdf->writeHTMLCell(190, 7, 12, 87,  $html, 0, 1, false, 'L');
//............
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_2_input', 100, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 103,87);
//..............

$pdf->setFont('Times', '', 10); 
$html= '<div>
<input type="checkbox" name="part8-2-checkBox" value="Y" checked=" " />&nbsp; 
 At my request, the preparer named in <b>Part 10.</b>, <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; prepared this request for me based only upon information I provided or authorized.</div>';////////////////////!
$pdf->writeHTMLCell(190, 7, 17, 97,  $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(103, 6, 94, 96,"", 1, 1, false, 'L');
$pdf->writeHTMLCell(5, 6, 197, 97,",", "", 1, false, 'L');
// //..........
$pdf->setFont('Times', 'I', 12); 
$html= "<div><b>Family Member's Contact Information</b></div>";
$pdf->writeHTMLCell(190, 7, 12, 110,  $html, 0, 1, true, 'L');
// //..............

$pdf->setFont('Times', '', 10); 
$html= '<div><b>3.  </b> Family Member\'s Daytime Telephone Number </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 119,  $html, 0, 1, false, 'L');
// //..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8-3_aplicant_contact_daytime_telephone', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 125);
// //..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>4.  </b> Family Member\'s Mobile Telephone Number (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 112, 119,  $html, 0, 1, false, 'L');
// //..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8-4_aplicant_contact_mobile_telephone', 84, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 125);
// //..........
$pdf->setFont('Times', '', 10); 
$html= '<div><b>5.  </b> Family Member\'s Email Address (if any) </b></div>';
$pdf->writeHTMLCell(90, 7, 12, 133,  $html, 0, 1, false, 'L');
// //..............
$pdf->setFont('courier', 'B', 10); 
$pdf->TextField('part_8-5_aplicant_contact_email_address', 85, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 138);
// //..........
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Family Member\'s Certification </b></div>';
$pdf->writeHTMLCell(190, 7, 12, 149,  $html, 0, 1, true, 'L');
// //..............

$pdf->setFont('Times', '', 9.9); 
$html= '<div>Copies of any documents I have submitted are exact photocopies of unaltered, original documents, and I understand that USCIS may
require that I submit original documents to USCIS at a later date. Furthermore, I authorize the release of any information from any of
my records that USCIS may need to determine my eligibility for the immigration benefit I seek.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 157,  $html, 0, 1, false, 'L');
$html= '<div>I further authorize release of information contained in this request, in supporting documents, and in my USCIS records to other entities
and persons where necessary for the administration and enforcement of U.S. immigration laws.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 171.5,  $html, 0, 1, false, 'L');
$html= '<div>I certify, under penalty of perjury, that I provided or authorized all of the information in my request, I understand all of the information
contained in, and submitted with, my request, and that all of this information is complete, true, and correct. 
</div>';
$pdf->writeHTMLCell(190, 7, 12, 181.5,  $html, 0, 1, false, 'L');

//.................


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Family Member\'s Signature</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 194, $html, 0, 1, true, 'L');

//..................

$pdf->setFont('Times', '', 10);
$html= "<div><b>6.      </b>    Family Member's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 202, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 20, 207.5, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 205.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

// //..........................
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 202, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_6_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 207.5);

//.............
$pdf->setFont('Times', '', 10);
$html= '<div><b>NOTE TO ALL FAMILY MEMBERS</b>: If you do not completely fill out this request or fail to submit required documents listed in
the Instructions, USCIS may deny your request.
</div>';
$pdf->writeHTMLCell(190, 7, 12, 215.5,  $html, 0, 1, false, 'L');




























//!page 8.................
$pdf->AddPage('P', 'LETTER'); 
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 9. Interpreter's Contact Information, Certification, and Signature </b></div>";
$pdf->writeHTMLCell(  191, 6, 13, 18, $html, 1, 0, true, false, 'L', true );
//............
$pdf->setFont('Times', '', 10);
$html= "<div><b>1.      </b>    Did any person filing this request use an interpreter?</div>";
$pdf->writeHTMLCell(100, 7, 12, 26, $html, 0, 1, false, 'L');
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part9-1" value="Y" checked="" />Yes, (complete this section)
&nbsp;   &nbsp;   <input type="checkbox"      name="part9-1" value="N" checked="" />No (skip to <b>Part 10</b>.) ';
$pdf->writeHTMLCell(190, 4, 115, 26, $html, 0, 1, false, true, 'J'); 
//............
$pdf->setFont('Times', '', 10);
$html= "<div><b>2.      </b>    Was the same interpreter used for all individuals requesting a fee waiver (as listed in <b>Part 3</b>.)?</div>";
$pdf->writeHTMLCell(150, 7, 12, 32, $html, 0, 1, false, 'L');
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part9-2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part9-2" value="N" checked="" />No ';
$pdf->writeHTMLCell(190, 4, 175, 32, $html, 0, 1, false, true, 'J'); 
///..............
$pdf->setFont('Times', '', 10);
$html= "<div><b>NOTE for Family Members</b>: If you used a different interpreter than the one used by the requestor, make additional copies of <b>Part 9</b>.,<br>
provide the following information, indicate the family member for whom he or she interpreted, and include the pages with your<br>
completed Form I-912.
</div>";
$pdf->writeHTMLCell(195, 7, 12, 40, $html, 0, 1, false, 'L');
//...........
$pdf->setFont('Times', '', 10);
$html= "<div>Provide the following information about the interpreter for 
</div>";
$pdf->writeHTMLCell(195, 7, 12, 55, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part9_2_provide', 103, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 100, 55);
//...................
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Interpreter\'s Full Name  </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 65,  $html, 0, 1, true, 'L');

//?......................

$pdf->setFont('Times', '', 10);
$html = '<div><b>3</b> &nbsp;  &nbsp; Interpreter\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(95, 7, 12, 73, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 79);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div>Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 114, 73, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.8, 79);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>4. </b> &nbsp; &nbsp;Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 86, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_organiz_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 92);
//*.................
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Interpreter\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 102, $html, 0, 1, true, 'L');
$pdf->SetFont( 'times', 'IB', 9 );
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><I><b>(USPS ZIP Code Lookup)</b></I></a></div>';
$pdf->writeHTMLCell( 90, 1, 113, 103, $html, 0, 1, true, false, 'R', true );
// //..............
$pdf->setFont('Times', '', 10);
$html= '<div><b>5.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 110, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 110, $html, 0, 1, false, 'L');

// //...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_mailing_address_street_name_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 116);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt9" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 116, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste9" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 116, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="flr9" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 116, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_number',17.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),187, 116);


// //.................

$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 124, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 155, 124, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 180, 124, $html, 0, 1, false, 'L');




$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_mailing_address_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 130);


//? $pdf->setFont('Times', '', 10.5);
// ?$html = '<select name="part9_Interpreter_mailing_state" size="0.50">';
// ?foreach($allDataCountry as $record){
// ?	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
// ?}
// ?$html .= '</select>';

$html = '<select name="part9_5_state" size="0.25">';

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
$pdf->writeHTMLCell( 25, 5, 155, 130, $html, '', 0, 0, true, 'L' );


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_mailing_address_zipcode1', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 180, 130);


//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 137, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_mailing_address_provience', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 143);
// //.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 137, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_mailing_address_postal_code', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 143);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 133, 137, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_mailing_address_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 143);
// //.............
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 153, $html, 0, 1, true, 'L');

// //...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>6.  </b> Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 161.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 167.5);

// //............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>7.  </b> Interpreter\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 161.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_contact_mobile_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 167.5);
// //.................. 

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>8.  </b> Interpreter\'s  Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 175, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_contact_Email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 180.5);


// //.............

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 190, $html, 0, 1, true, 'L');

//..................
$pdf->setFont('Times', '', 9.8);
$html= '<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(191, 7, 12, 198, $html, 0, 1, false, 'L');
$pdf->setFont('Times', '', 9.8);
$html= '<div>I am fluent in English and</div>';
$pdf->writeHTMLCell(191, 7, 12, 205, $html, 0, 1, false, 'L');
$html= '<div>, which is the same language specified</div>';
$pdf->writeHTMLCell(191, 7, 150, 205, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part9_Interpreter_certification_input', 100, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 50.6,203.3);
$pdf->setFont('Times', '', 10);
$html= "<div>in <b>Part 7., Item B. in Item Number 1</b>., and I have read to this requestor in the identified language every question and instruction on<br>
this request and his or her answer to every question. The requestor informed me that he or she understands every instruction, question,<br>
and answer on the request, including the <b>Applicant's Certification</b>, and has verified the accuracy of every answer. </div>";
$pdf->writeHTMLCell(195, 7, 12, 210, $html, 0, 1, false, 'L');
//.................


$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 226, $html, 0, 1, true, 'L');

//..................

$pdf->setFont('Times', '', 10);
$html= "<div><b>9.      </b>    Interpreter's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 234, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 20, 239.5, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 237.5, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');

// //..........................
$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 234, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part9_9_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 239.5);

















//!page 9........
$pdf->AddPage('P', 'LETTER'); 
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing this Request, if Other
Than the Requestor</b></div>";
$pdf->writeHTMLCell(  191, 7, 13, 18, $html, 1, 0, true, false, 'L', true );
//............
$pdf->setFont('Times', '', 10);
$html= "<div><b>1.      </b>    Did any person prepare this request on your behalf? </div>";
$pdf->writeHTMLCell(100, 7, 12, 30, $html, 0, 1, false, 'L');
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part10 -1" value="Y" checked="" />Yes, (complete this section)
&nbsp;   &nbsp;   <input type="checkbox"      name="part10 -1" value="N" checked="" />No, skip';
$pdf->writeHTMLCell(190, 4, 115, 30, $html, 0, 1, false, true, 'J'); 
//............
$pdf->setFont('Times', '', 10);
$html= "<div><b>2.      </b>    Was the same preparer used for all individuals requesting a fee waiver (as listed in <b>Part 3</b>.)?</div>";
$pdf->writeHTMLCell(170, 7, 12, 36.5, $html, 0, 1, false, 'L');
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part10 -2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part10 -2" value="N" checked="" />No ';
$pdf->writeHTMLCell(190, 4, 175, 36.5, $html, 0, 1, false, true, 'J'); 
///..............
$pdf->setFont('Times', '', 10);
$html= "<div><b>NOTE for Family Members:</b> If you used a different preparer than the one used by the requestor, provide the following information,<br>
and include the pages with your completed Form I-912.
</div>";
$pdf->writeHTMLCell(195, 7, 12, 43, $html, 0, 1, false, 'L');
//...........
$pdf->setFont('Times', '', 10);
$html= "<div>Provide the following information about the preparer for
</div>";
$pdf->writeHTMLCell(195, 7, 12, 57, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part10_2_provide', 103, 6.3, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 100, 56);
//...................
$pdf->setFont('Times', 'I', 12); 
$html= '<div><b>Preparer\'s Full Name  </b></div>';
$pdf->writeHTMLCell(190, 7, 13, 65,  $html, 0, 1, true, 'L');

//?......................

$pdf->setFont('Times', '', 10);
$html = '<div><b>3</b> &nbsp;  &nbsp; Preparer\'s Family Name (Last Name) </div>';
$pdf->writeHTMLCell(95, 7, 12, 73, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_last_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 79);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div>Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(95, 7, 114, 73, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_first_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 113.8, 79);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>4. </b> &nbsp; &nbsp;Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 86, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_organiz_name', 90, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 19, 92);
//*.................
$pdf->setFont('Times', 'BI', 12);
$pdf->setCellPaddings(1, 1, 1, 1); 
$html= '<div>Preparer\'s Mailing Address</div>';
$pdf->writeHTMLCell(191, 7, 13, 102, $html, 0, 1, true, 'L');
// //..............
$pdf->setFont('Times', '', 10);
$html= '<div><b>5.    </b> &nbsp;      Street Number and Name</div>';
$pdf->writeHTMLCell(95, 7, 12, 110, $html, 0, 1, false, 'L');

$html= '<div> Apt. &nbsp;  &nbsp;   Ste. &nbsp;  &nbsp;   Flr.  &nbsp;  &nbsp;   Number </div>';
$pdf->writeHTMLCell(95, 7, 155, 110, $html, 0, 1, false, 'L');

// //...........

$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_mailing_address_street_name_number', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 116);

$pdf->setFont('Times', '', 10.5);
$html= '<div>  <input type="checkbox" name="apt10" value="apt" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 155, 116, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="ste10" value="ste" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 165, 116, $html, 0, 1, false, 'L');

$html= '<div>  <input type="checkbox" name="flr10" value="flr" checked="" />  </div>';
$pdf->writeHTMLCell(20, 7, 175, 116, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_number',17.7, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),187, 116);


// //.................

$pdf->setFont('Times', '', 10.5);
$html= '<div>City or Town</div>';
$pdf->writeHTMLCell(90, 7, 20, 124, $html, 0, 1, false, 'L');


$html= '<div>State</div>';
$pdf->writeHTMLCell(60, 7, 155, 124, $html, 0, 1, false, 'L');


$html= '<div>ZIP Code</div>';
$pdf->writeHTMLCell(60, 7, 180, 124, $html, 0, 1, false, 'L');


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_mailing_address_city_town', 130, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 130);


$html = '<select name="part10_5_state" size="0.25">';

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
$pdf->writeHTMLCell( 25, 5, 155, 130, $html, '', 0, 0, true, 'L' );


$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_mailing_address_zipcode1', 25, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 180, 130);


//......................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Province </div>';
$pdf->writeHTMLCell(80, 7, 20, 137, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_mailing_address_provience', 50, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 143);
// //.............
$pdf->setFont('Times', '', 10.5);
$html= '<div>Postal Code</div>';
$pdf->writeHTMLCell(70, 7, 74, 137, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_mailing_address_postal_code', 52, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 75, 143);

//.....................
$pdf->setFont('Times', '', 10.5);
$html= '<div>Country</div>';
$pdf->writeHTMLCell(80, 7, 133, 137, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_mailing_address_country', 71, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 133, 143);
// //.............
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= '<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 153, $html, 0, 1, true, 'L');

// //...............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>6.  </b> Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(80, 7, 12, 161.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_contact_daytime_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 167.5);

// //............

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>7.  </b> Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(80, 7, 112, 161.5, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_contact_mobile_telephone', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 167.5);
// //.................. 

$pdf->setFont('Times', '', 10.5);
$html= '<div><b>8.  </b> Preparer\'s  Email Address (if any)</div>';
$pdf->writeHTMLCell(80, 7, 12, 175, $html, 0, 1, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part10_Preparer_contact_Email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 18, 180.5);


// //.............

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'I', 12);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= "<div><b>Preparer's Statement</b></div>";
$pdf->writeHTMLCell(191, 7, 13, 190, $html, 0, 1, true, 'L');

//..................

$pdf->setFont('Times', '', 10);// set font
$html= '<div><b>9.    &nbsp;   A.     </b>     <input type="checkbox" name="part10_9A" value="1" /></div>';
$pdf->writeHTMLCell(90, 7, 12, 200, $html, 0, 1, false, 'L');
$html= '<div> I am not an attorney or accredited representative but have prepared this request on behalf of the<br>
 requestor and with the requestor\'s consent.</div>';
$pdf->writeHTMLCell(180, 7, 28, 200, $html, 0, 1, false, 'L');


$pdf->setFont('Times', '', 10);// set font
$html= '<div><b>B.     </b>     <input type="checkbox" name="part10_9B" value="1" /></div>';
$pdf->writeHTMLCell(90, 7, 17, 210, $html, 0, 1, false, 'L');

$html= '<div> I am an attorney or accredited representative and my representation of the requestor in this case<br>
&nbsp; &nbsp;   extends   &nbsp; 
 &nbsp;&nbsp; &nbsp; 
does not extend beyond the preparation of this request.</div>';
$pdf->writeHTMLCell(190, 7, 28, 210, $html, 0, 1, false, 'L');
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3.5, 3.5, 28, 215, "", 1, 0, false, 'L');//!Custom sell
$pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(3.5, 3.5, 45.5, 215, "", 1, 0, false, 'L');//!Custom sell
$pdf->setCellHeightRatio( 1.2 );
$html= '<div><b>NOTE:</b> If you are an attorney or accredited representative, you may be obliged to submit a<br>
completed Form G-28, Notice of Entry of Appearance as Attorney or Accredited Representative,<br>
or G-28I, Notice of Entry of Appearance as Attorney In Matters Outside the Geographical<br>
Confines of the United States, with this request.</div>';
$pdf->writeHTMLCell(150, 17, 28, 223, $html, 0, 1, false, 'L');
//!............page number 9 end ------------------------------------------------------------------------


$pdf->AddPage('P', 'LETTER'); //!page number 10
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$pdf->setCellHeightRatio( 1.3 );

$html ='<div><b>Part 10. Contact Information, Declaration, and Signature of the Person Preparing this Request, if Other
Than the Requestor </b>(continued)</div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'L', true);




$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Certification</div>';
$pdf->writeHTMLCell(191, 7, 13, 32, $html, 0, 1, true, 'L');


$pdf->setFont('Times', '', 10);// set font
$html= "<div>By my signature, I certify, under penalty of perjury, that I prepared this request at the request of the requestor. The requestor then
reviewed this completed request and informed me that he or she understands all of the information contained in, and submitted with,<br>
his or her request, including the <b>Applicant's Certification</b>, and that all of this information is complete, true, and correct. I completed<br>
this request based only on information that the requestor provided to me or authorized me to obtain or use</div>";
$pdf->writeHTMLCell(195, 7, 12, 39, $html, 0, 1, false, 'L');


$pdf->setFont('Times', 'BI', 12);// set font
$html= '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell(190, 7, 13, 62, $html, 0, 1, true, 'L');



$pdf->setFont('Times', '', 10);
$html= "<div><b>10.      </b>    Preparer's Signature</div>";
$pdf->writeHTMLCell(80, 7, 12, 70, $html, 0, 1, false, 'L');
$pdf->writeHTMLCell(120, 7, 20, 76, '', 1, 1, false, 'L');
$pdf->SetFont('zapfdingbats', '', 22);  // symbol font
$pdf->writeHTMLCell(82, 7, 12, 74, TCPDF_FONTS::unichr(225), 0, 0, false, 'L');
//............


$pdf->setFont('Times', '', 10);
$html= '<div>  Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(92, 7, 143, 70, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part_10_preparer_date_of_signature', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 76);

//!..........page number 10 end --------------------------------------------------------------------------------





//!page 11 
$pdf->AddPage('P', 'LETTER'); //page number 11
$pdf->SetFillColor(220,220,220);
$pdf->setCellPaddings(1, 0.5, 1, 1); // set cell padding
$pdf->SetFont('times', '', 12); // set font
$html ='<div><b>Part 11. Additional Information</b></div>';
$pdf->writeHTMLCell(191, 7, 13, 17, $html, 1, 1, true, false, 'J', true);


//............
$pdf->SetFont('times', '', 10);
$html ='<div>If you need extra space to provide any additional information within this request, use the space below. If you need more space than
what is provided, you may make copies of this page to complete and file with this request or attach a separate sheet of paper. Include
your name and A-Number (if any) at the top of each sheet; indicate the <b>Page Number, Part Number</b>, and <b>Item Number</b> to which
your answer refers..</div>';
$pdf->writeHTMLCell(190, 7, 12, 26, $html, 0, 0, false, true, 'J', true);
//.........
$pdf->SetFillColor(255,255,255);
$html = '<b>1.   </b>    Family Name (Last Name)';
$pdf->writeHTMLCell(60, 7, 12, 46, $html, 0, 0, false, true, 'L', true);
$html = 'Given Name (First Name)';
$pdf->writeHTMLCell(50, 7, 98, 46, $html, 0, 0, false, true, 'L', true);
$html = 'Middle Name';
$pdf->writeHTMLCell(50, 7, 156, 46, $html, 0, 0, false, true, 'L', true);

$pdf->SetFillColor(220,220,220);
$pdf->writeHTMLCell(70, 7, 20, 52, "", 1, 0, false, true, 'L', true);
$pdf->writeHTMLCell(56, 7, 97, 52, "", 1, 0, false, true, 'L', true);
$pdf->writeHTMLCell(48, 7, 155.5, 52, "", 1, 0, false, true, 'L', true);
//...........


$pdf->SetFont('times', '', 10);
$html = '<b>2.  </b>    A-Number (if any)    <b>   &nbsp;  &nbsp; &nbsp; &nbsp;  A- </b>';
$pdf->writeHTMLCell(60, 7, 12, 64, $html, 0, 0, false, true, 'L', true);
$pdf->writeHTMLCell(50, 7, 60, 64, "", 1, 0, false, true, 'L', true);

$pdf->StartTransform();
$pdf->SetFillColor(0,0,0);
$pdf->Rotate(-30);
$pdf->SetFont('zapfdingbats', 'B', 10);
$pdf->MultiCell(10, 10, "t", '', 'L', 0, 1, 58, 93, false); // angle 1
$pdf->StopTransform();
$pdf->SetFont('times', '', 10);
//..............aditional section.........
$pdf->setFont('Times', '', 10);
$html= '<div><b>3.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 72, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 77);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 72, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 77);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 72, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_3c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 77);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 85, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_3d">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 85, $html, 0, 0, false, 'L');
//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>4.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 117);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 117);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 112, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_4c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 117);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 125, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_4d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 125, $html, 0, 0, false, 'L');
//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>5.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 157);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 157);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 152, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_5c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 157);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 165, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_5d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 165, $html, 0, 0, false, 'L');
//....

$pdf->setFont('Times', '', 10);
$html= '<div><b>6.   &nbsp;  A. </b> &nbsp; Page Number </div>';
$pdf->writeHTMLCell(60, 7, 12, 192, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6a', 20, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 26, 197);
//.....


$pdf->setFont('Times', '', 10);
$html= '<div><b>B. </b>&nbsp;Part Number </div>';
$pdf->writeHTMLCell(50, 7, 48, 192, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6b', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 55, 197);

//......

$pdf->setFont('Times', '', 10);
$html= '<div><b>C. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell(30, 7, 80, 192, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('additional_information_6c', 22, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 87, 197);
//............
$pdf->setFont('Times', '', 10);
$html= '<div><b>D. </b> </div>';
$pdf->writeHTMLCell(10, 7, 18, 205, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$html = <<<EOD
<textarea cols="42" rows="6" name="additional_information_6d" multiline="true">

</textarea>
EOD;
$pdf->writeHTMLCell(90, 40, 25, 205, $html, 0, 0, false, 'L');

//....page number 13 end--------------------------------------------------------------------------------->>>






$js = "
var fields = {

'part2-1_middle_name':' ',
'part2-1_first_name':' ',
'part2-1_last_name':' ',
'part2-2_middle_name':' ',
'part2-2_first_name':' ',
'part2-2_last_name':' ',
'part2-2_middle_name2':' ',
'part2-2_first_name2':' ',
'part2-2_last_name2':' ',
'part2-3':' ',
'part2-4':' ',
'part2-5':' ',
'part2-6':' ',
'part-1_1':' ',
'part-1_2':' ',
'part-1_3':' ',
//*page 1 complete..........
'part2-7Separated':' ',
'part2-7Annulled':' ',
'part2-7widowed':' ',
'part2-7divorced':' ',
'part2-7divorced':' ',
'part2-7married':' ',
'part2-7single':'',
//*part 2 complete,.........
'part3_input-1':'',
'part3_input-2':'',
'part3_input-3':'',
'part3_input-4':'',
'part3_input-5':'',
'part3_input-6':'',
'part3_input-7':'',
'part3_input-8':'',
'part3_input-9':'',
'part3_input-10':'',
'part3_input-11':'',
'part3_input-12':'',
'part3_input-13':'',
'part3_input-14':'',
'part3_input-15':'',
'part3_input-16':'',
'part3_input-17':'',
'part3_input-18':'',
//*part 3 complete.................
'part4_input-1':'',
'part4_input-2':'',
'part4_input-3':'',
'part4_input-4':'',
'part4_input-5':'',
'part4_input-6':'',
'part4_input-7':'',
'part4_input-8':'',
'part4_input-9':'',
'part4_input-10':'',
'part4_input-11':'',
'part4_input-12':'',
'part4_input-13':'',
'part4_input-14':'',
'part4_input-15':'',
'part4_input-16':'',
'part4_input-17':'',
'part4_input-18':'',
'part4_input-19':'',
'part4_input-20':'',
'part4_input-21':'',
'part4_input-22':'',
'part4_input-23':'',
'part4_input-24':'',
//*part 4 complete.................
'part5-1Other':' ',
'part5-1Retired':' ',
'part5-1Unemploye':' ',
'part5-1Employed':' ',
'part5_input-2a':' ',

'part5_input-1':'',
'part5_input-2':'',
'part5_input-3':'',
'part5_input-4':'',
'part5_input-5':'',
'part5_input-6':'',
'part5_input-7':'',
'part5_input-8':'',
'part5_input-9':'',
'part5_input-10':'',
'part5_input-11':'',
'part5_input-12':'',
'part5_5input':' ',
'part5_6input':' ',
'part5_7input':' ',
'part5-7-1':' ',
'part5-7-2':' ',
'part5-7-3':' ',
'part5-7-4':' ',
'part5-7-5':' ',
'part5-7-6':' ',
'part5-7-7':' ',
'part5-7-8':' ',
'part5-7-9':' ',
'part5-7-10':' ',
'part5-7-11':' ',


//*part 6
'part6_1_input':'',
'part6_2_input-1':'',
'part6_2_input-2':'',
'part6_2_input-3':'',
'part6_2_input-4':'',
'part6_2_input-5':'',
'part6_2_input-6':'',
'part6_3_input':' ',
'part6-3-checkBox-1':' ',
'part6-3-checkBox-2':' ',
'part6-3-checkBox-3':' ',
'part6-3-checkBox-4':' ',
'part6-3-checkBox-5':' ',
'part6-3-checkBox-6':' ',
'part6-3-checkBox-7':' ',
'part6-3-checkBox-8':' ',
'part6-3-checkBox-9':' ',
'part6-3-checkBox-10':' ',
'part6-3-checkBox-11':' ',
//*part 7 done...
'part7-1-checkBox-A':' ',
'part7-1-checkBox-B':' ',
'part7-2-checkBox':' ',
'part_7-3_aplicant_contact_daytime_telephone':' ',
'part_7-4_aplicant_contact_mobile_telephone':' ',
'part_7-5_aplicant_contact_email_address':' ',

'part7_6_signature':' ',
'part7_7_input':' ',
'part7_7_signature':' ',
'part7_8_input':' ',
'part7_8_signature':' ',
'part7_9_input':' ',
'part7_9_signature':' ',
'part7_10_input':' ',
'part7_10_signature':' ',
'part7_11_input':' ',
'part7_11_signature':' ',
//*part 8
'part8-1-checkBox-A':' ',
'part8-1-checkBox-B':' ',
'part8-2-checkBox':' ',
'part8_6_signature':' ',
'part_8-5_aplicant_contact_email_address':' ',
'part_8-4_aplicant_contact_mobile_telephone':' ',
'part_8-3_aplicant_contact_daytime_telephone':' ',
'part8_1_input':' ',
'part8_2_input':' ',












//*part 9.................
'part9_2_provide':' ',
'part9_5_state':' ',
'part9_Interpreter_contact_Email':' ',
'part9_Interpreter_contact_mobile_telephone':' ',
'part9_Interpreter_contact_daytime_telephone':' ',
'part9_Interpreter_mailing_address_country':' ',
'part9_Interpreter_mailing_address_postal_code':' ',
'part9_Interpreter_mailing_address_provience':' ',
'part9_5_state':' ',
'part9_Interpreter_mailing_address_zipcode1':' ',
'part9_Interpreter_mailing_address_city_town':' ',
'part9_Interpreter_number':' ',
'part9_Interpreter_mailing_address_street_name_number':' ',
'part9_Interpreter_organiz_name':' ',
'part9_Interpreter_first_name':' ',
'part9_Interpreter_last_name':' ',
'part9_9_signature':' ',
'part9_Interpreter_certification_input':' ',
'flr9':' ',
'ste9':' ',
'apt9':' ',


//*part 10..............
'part10_2_provide':' ',
'part10_5_state':' ',
'part10_Preparer_contact_Email':' ',
'part10_Preparer_contact_mobile_telephone':' ',
'part10_Preparer_contact_daytime_telephone':' ',
'part10_Preparer_mailing_address_country':' ',
'part10_Preparer_mailing_address_postal_code':' ',
'part10_Preparer_mailing_address_provience':' ',
'part10_5_state':' ',
'part10_Preparer_mailing_address_zipcode1':' ',
'part10_Preparer_mailing_address_city_town':' ',
'part10_Preparer_number':' ',
'part10_Preparer_mailing_address_street_name_number':' ',
'part10_Preparer_organiz_name':' ',
'part10_Preparer_first_name':' ',
'part10_Preparer_last_name':' ',
'part10_9_signature':' ',
'part10_Preparer_certification_input':' ',
'flr10':' ',
'ste10':' ',
'apt10':' ',
'part10_9A':' ',
'part10_9B':' ',
'part_10_preparer_date_of_signature':' ',
//*aditional information...................
'additional_information_6d':' ',
'additional_information_6c':' ',
'additional_information_6b':' ',
'additional_information_6a':' ',
'additional_information_5d':' ',
'additional_information_5c':' ',
'additional_information_5b':' ',
'additional_information_5a':' ',
'additional_information_4d':' ',
'additional_information_4a':' ',
'additional_information_4b':' ',
'additional_information_4c':' ',
'additional_information_6b':' ',
'additional_information_3c':' ',
'additional_information_3d':' ',
'additional_information_3b':' ',
'additional_information_3a':' ',
'additional_information_middle_name':' ',
'additional_information_first_name':' ',
'additional_information_last_name':' ',








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
$pdf->Output( 'Form I-912, Request for Fee Waiver', 'I' );