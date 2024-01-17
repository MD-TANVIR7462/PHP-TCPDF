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
// $html = "<div><b>A- <br>A- <br>A- <br>A-</b></div>";
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
//*page 1 complete
'part2-7Separated':' ',
'part2-7Annulled':' ',
'part2-7widowed':' ',
'part2-7divorced':' ',
'part2-7divorced':' ',
'part2-7married':' ',
'part2-7single':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
'':' ',
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