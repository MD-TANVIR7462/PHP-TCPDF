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
$html = "<div><b>Total Number of Forms</b>(including self)</div>";
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

$pdf->AddPage( 'P', 'LETTER' );//Page 2 
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

$pdf->writeHTMLCell(190, 17, 175, 27, $html, 0, 1, false, true, 'J'); 

//..................
$pdf->setFont('Times', 'B', 10);
$html ='A.';
$pdf->writeHTMLCell(190, 5, 16, 32, $html, 0, 1, false, true, 'J'); 
//..................
$pdf->setFont('Times', '', 10);
$html ='Date you became unemployed <br>(mm/dd/yyyy)';
$pdf->writeHTMLCell(190, 5, 22, 32, $html, 0, 1, false, true, 'J'); 
//.................
$pdf->TextField( 'part5_input-2a', 47, 7.4, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 22, 42 );
//...............
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b><i>Information About Your Spouse</i> </b>  </div>';
$pdf->writeHTMLCell( 190, 5, 13, 53, $html, '', 1, true, false, 'L', true );
///................
$pdf->setFont('Times', '', 10);
$html= '<div><b>3. </b>   If you are married or separated, does your spouse live in your household?</div>';
$pdf->writeHTMLCell(160, 7, 12, 61, $html, 0, 1, false, 'L');
//...............
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-3" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-3" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 17, 175, 61, $html, 0, 1, false, true, 'J'); 
//..................
$pdf->setFont('Times', 'B', 10);
$html ='A.';
$pdf->writeHTMLCell(190, 5, 16, 68, $html, 0, 1, false, true, 'J'); 
//..................
$pdf->setFont('Times', '', 10); 
$html ='If you answered “No” to Item Number 3., does your spouse provide any financial support to your<br>
household?';
$pdf->writeHTMLCell(190, 5, 22, 68, $html, 0, 1, false, true, 'J'); 
//*....................
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-3A" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-3A" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 17, 175, 69, $html, 0, 1, false, true, 'J'); 
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
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-3" value="Y" checked="" />Yes
   
   &nbsp;   &nbsp;   <input type="checkbox"      name="part5-3" value="N" checked="" />No ';

$pdf->writeHTMLCell(190, 17, 175,87, $html, 0, 1, false, true, 'J');
//...............
$html ="If you answered “Yes” to <b>Item Number 4.</b>, type or print your name on the line marked “self” in the table below. If you answered<br>
“No” to <b>Item Number 4.</b>, type or print your name on the line marked “self” in the table below and add the head of household's<br>
name on the line below yours. ";

$pdf->writeHTMLCell(190, 17, 16,94, $html, 0, 1, false, true, 'J');

//*....................
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 12 );
$html = "<div><b>Household Size</b></div>";
$pdf->writeHTMLCell(  187, 6, 18, 110, $html, 1, 0, true, false, 'C', true );
//................
$pdf->writeHTMLCell( 187, 50.7, 18, 117, '',  1,  0, false, false, 'C', true );//main cell 
$pdf->writeHTMLCell( 187, 8, 18, 79, '',  "B",  0, false, false, 'C', true );//1st line 
$pdf->writeHTMLCell( 187, 8, 18, 85, '',  "B",  0, false, false, 'C', true );//second line
$pdf->writeHTMLCell( 187, 8, 18, 91, '',  "B",  0, false, false, 'C', true );//third line
$pdf->writeHTMLCell( 187, 8, 18, 97, '',  "B",  0, false, false, 'C', true );//4th line
$pdf->writeHTMLCell( 187, 8, 18, 103, '',  "B",  0, false, false, 'C', true );//5th line
//.....................................
$pdf->writeHTMLCell( "1", "44.1", 54,117, '',  "R",  0, false, true, 'L', true );//1st  vertical line
$pdf->writeHTMLCell( "1", "44.1", 78,117, '',  "R",  0, false, true, 'L', true );/// vertical line
$pdf->writeHTMLCell( "1", "44.1", 104,117, '',  "R",  0, false, true, 'L', true );//  vertical line
$pdf->writeHTMLCell( "1", "44.1", 133,117, '',  "R",  0, false, true, 'L', true );//  vertical line
$pdf->writeHTMLCell( "1", "50.6", 162,117, '',  "R",  0, false, true, 'L', true );//  vertical line

//..............
$pdf->SetFont( 'times', '', 10 );
$html = "<div><b>Total Household Size
</b>e (including self)</div>";
$pdf->writeHTMLCell(  62, 6, 99, 161.4, $html, "", 0, false, false, 'R', true );
$html = "<div><b>Full
Name</div>";
$pdf->writeHTMLCell(  10, 6, 29, 118.4, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Date of
Birth</div>";
$pdf->writeHTMLCell(  15, 6, 58.5, 118.4, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Relationship
to You</div>";
$pdf->writeHTMLCell(  20, 6, 82, 118.4, $html, "", 0, false, false, 'C', true );//i will be needed for.......
$html = "<div><b>Married</div>";
$pdf->writeHTMLCell(  15, 6, 111, 121, $html, "", 0, false, false, 'C', true );
$html = "<div><b>Full-Time
Student</div>";
$pdf->writeHTMLCell(  20, 6, 138, 118.4, $html, "", 0, false, false, 'C', true );
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
$pdf->writeHTMLCell(30, 6, 104, 132.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M2" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 104, 139.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M3" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M3" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 104, 146.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-M4" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-M4" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 104, 154.5, $html, 0, 1, false, true, 'J'); 
//...........
//...............
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S1" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S1" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 133, 132.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S2" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S2" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 133, 139.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S3" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S3" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 133, 146.5, $html, 0, 1, false, true, 'J'); 
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-S4" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-S4" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 133, 154.5, $html, 0, 1, false, true, 'J'); 
//...........
//*....................
$pdf->SetFont( 'times', '', 10 );
$html ='&nbsp;  &nbsp;    <input type="checkbox" name="part5-isAnyIncome_1" value="Y" checked="" />Yes
&nbsp;   &nbsp;   <input type="checkbox"      name="part5-isAnyIncome_1" value="N" checked="" />No ';
$pdf->writeHTMLCell(30, 6, 168, 132.5, $html, 0, 1, false, true, 'J'); 
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

$pdf->TextField( 'part5_input-12', 42, 6.7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 163, 161.1 );







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