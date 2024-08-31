<?php
require_once('formheader.php');   //database connection file

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

        $this->Cell( 40, 6.4, 'Form I-918 Supplement A Edition 04/01/24 ', 0, 0, 'L' );

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
$pdf->SetTitle( 'Form I-918,Supplement A' );

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

$pdf->AddPage('P', 'LETTER');

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
$pdf->Image( $logo, 12, 7, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );

$pdf->Cell( 30, 5, '', 0, 0 );
$pdf->SetFont( 'times', 'B', 14 );
//* set font
$pdf->MultiCell( 120, 15, 'Supplement A, Petition for Qualifying Family Member 
', 0, 'C', 0, 1, 48, 6, true );
$pdf->SetFont( 'times', 'B', 14 );
//* set font
$pdf->MultiCell( 120, 15, 'of U-1 Recipient 
', 0, 'C', 0, 1, 48, 11, true );

$pdf->SetFont( 'times', 'B', 11 );
//* set font
$pdf->setCellPaddings( 2, 4, 6, 0 );
//* set cell padding
$pdf->MultiCell( 30, 5, 'USCIS  Form I-918', 0, 'C', 0, 1, 174.5, 5.5, true );

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
$pdf->MultiCell( 40, 5, 'OMB No. 1615-0104 Expires 02/28/2026', 0, 'C', 0, 1, 169, 18.5, true );

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

/********************************
******** Start Page No 1 ********
*********************************/

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'B', 11 );
$pdf->writeHTMLCell( 190, 47, 13, 35, '',  1,  0, false, false, 'C', true );
$pdf->writeHTMLCell( 15, 46.5, 13.2, 35.2, '',  'R',  1, true, true, 'L', true );
$html = '<div> For USCIS Use Only</div>';
$pdf->writeHTMLCell( 15, 30, 13, 50, $html, 0, 1, false, true, 'C', true );
$pdf->SetFont( 'times', '', 8 );

$pdf->SetFont( 'times', '', 9 );
$html = '<div><b>Remarks</b></div>';
$pdf->writeHTMLCell( 30, 5, 33, 35, $html, 0, 1, false, true, 'C', true );

//*............
$pdf->SetFont( 'times', '', 8 );
//* ! CheckBOx $pdf->writeHTMLCell( 3, 1, 30, 52, '',  1,  1, false, true, 'L', false );
//* Underline $pdf->writeHTMLCell( 31, 5, 35, 58, '', 'B', 1, false, true, 'L', true );
//*........
$pdf->writeHTMLCell( 1, 28, 68.5, 35, '', 'R', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 112.5, 10, 28.5, 63, '', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 1, 47, 140, 35, '', 'R', 1, false, true, 'L', true );
$pdf->SetFont( 'times', 'B', 9 );
$pdf->writeHTMLCell( 20, 5, 100, 35, 'Receipt', 0, 1, false, true, 'L', true );
$pdf->writeHTMLCell( 20, 5, 163, 35, 'Action Block', 0, 1, false, true, 'L', true );
$pdf->writeHTMLCell( 21, 19, 26, 66, ' U.S. &nbsp; <br> Embassy &nbsp; <br>Consulate', '', 1, false, true, 'C', true );
$pdf->SetFont( 'times', '', 9 );
$pdf->writeHTMLCell( 43, 5, 46, 62.5, '<b> Validity Dates </b> (mm/dd/yyyy)', 'B', 1, false, true, 'L', true );
$html = '<div><b> From : </b>  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; / &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  /     </div>';
$pdf->writeHTMLCell( 28, 1, 58, 68, '', 'B', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 43, 6, 46, 69, $html, 'B', 1, false, true, 'L', true );
$html = '<div><b> To : </b>  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; / &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  /     </div>';
$pdf->writeHTMLCell( 30, 1, 54, 74.5, '', 'B', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 43, 5, 46, 75.5, $html, '', 1, false, true, 'L', true );

$pdf->writeHTMLCell( 43, 19, 46, 63, '', 'LR', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 47, 5, 88.5, 62.5, '<b> Wait Listed', '', 1, false, true, 'L', true );
$pdf->SetFont( 'times', '', 8 );
$pdf->writeHTMLCell( 23, 3, 89, 77, 'Stamp Number', 'T', 1, false, true, 'L', true );
$pdf->writeHTMLCell( 25.5, 3, 115.5, 77, 'Date (mm/dd/yyyy)', 'T', 1, false, true, 'L', true );

$pdf->writeHTMLCell ( 190, 18, 13, 83.5, '', 1, 1, false, true, 'C', true );

$pdf->writeHTMLCell( 40, 17.7, 13.1, 83.6, '', 'R', 1, true, true, 'C', true );

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>To be completed by an attorney or accredited representative</b> (if any).  </div>';
$pdf->writeHTMLCell( 40, 7, 15, 85, $html,  0,  1, false, true, 'L', false );

$pdf->SetFont( 'times', '', 12 );

if(showData('i_918_g_28_box_is_selected') =='Y') $g_check='checked'; else $g_check = '';

$html = '<div><b>  </b>   <input type="checkbox" name="table_2_CheckBox" value="Y" checked="'.$g_check.'" /> </div>';
$pdf->writeHTMLCell( 40, 15, 20, 83.5, $html, 0, 1, false, true, 'R', true );

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>Select this box if <br>Form G-28 is <br>attached.</b></div>';
$pdf->writeHTMLCell( 40, 15, 61, 84.4, $html, 0, 1, false, true, 'L', true );

$pdf->writeHTMLCell( 48, 18, 94, 83.5, '',  'L',  1, false, true, 'L', true );

$pdf->writeHTMLCell( 48, 18, 143.7, 83.5, '',  'L',  1, false, true, 'L', true );

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>Attorney State Bar Number</b><br>(if applicable)</div>';
$pdf->writeHTMLCell( 50, 15, 94.9, 83.6, $html, 0, 1, false, true, 'L', true );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'attorney_state_bar_number', 46, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 96, 93.4 );

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>Attorney or Accredited Representative USCIS Online Account Number</b> (if any)</div>';
$pdf->writeHTMLCell( 60, 15, 143.7, 83.5, $html, 0, 1, false, true, 'L', true );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'Attorney_or_According_Representative', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 93.4 );

//*? <<< second Table End >>>.....

$pdf->SetFont( 'times', 'B', 10 );
//* set font
$pdf->MultiCell( 100, 6, 'START HERE - Type or print in black or blue ink.', '', 'L', 0, 1, 19.5, 101.7, true );
$pdf->SetFont( 'times', '', 10 );
//* set font
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 11, 100.7, false );
//* angle
$pdf->StopTransform();

//* ?<<< part 1 start >>>.........
//*................
$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>NOTE:</b> &nbsp; The recipient of the U-1 nonimmigrant classification is referred to as the "principal." His or her family members are referred
to as "derivatives." The principal should complete Supplement A.</b>';
$pdf->writeHTMLCell( 194, 5, 12, 107.7, $html, '', 0, 0, true, 'L' );
//*...........
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 1. Family Member's Relationship To You</b> (Principal)</div>";
$pdf->writeHTMLCell( 90, 5, 13, 119, $html, 1, 1, true, false, 'L', true );

//*................
$pdf->setFont( 'Times', '', 9.9 );
$html = '<div><b>1.</b>&nbsp; &nbsp; &nbsp;The family member that I am filing for is my:</div>';
$pdf->writeHTMLCell( 95, 0, 12, 132,  $html, 0, 1, false, 'L' );

$part1_relation_spouse = (showData('i_918a_part1_family_members_relations')=='spouse') ?'checked':'';
$part1_relation_parent = (showData('i_918a_part1_family_members_relations')=='parent') ?'checked':'';
$part1_relation_child = (showData('i_918a_part1_family_members_relations')=='child') ?'checked':'';
$part1_relation_sibling = (showData('i_918a_part1_family_members_relations')=='sibling') ?'checked':'';

$html = '
   <input type="checkbox" name="part1-spouse" value="Spouse" checked="'.$part1_relation_spouse.'" /> Spouse
   
   &nbsp;  &nbsp; <input type="checkbox" name="part1-Parent" value="Parent" checked="'.$part1_relation_parent.'"/> Parent

   &nbsp;  &nbsp; <input type="checkbox" name="part1-Child" value=" Child" checked="'.$part1_relation_child.'"/> Child

   ';
$pdf->writeHTMLCell( 195, 0, 19, 139, $html, 0, 1, false, true, 'J', 0 );
$html = '
<input type="checkbox" name="part1-Unmarried sibling under 18 years of age" value="Unmarried sibling under 18 years of age"checked="'.$part1_relation_sibling.'"/> Unmarried sibling under 18 years of age
   ';

$pdf->writeHTMLCell( 195, 0, 19, 145, $html, 0, 1, false, true, 'J', 0 );
//*....................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b>Part 2. Information About You</b> (Principal)</div>';
$pdf->writeHTMLCell( 90, 5, 13, 154, $html, 1, 1, true, false, 'J', true );
//*...............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 5, 12, 162, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_1a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 163 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 5, 12, 172, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_1b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 173 );

//*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 5, 12, 183, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_1c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 183 );
//*.................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b>Part 2. Information About You</b> (Principal)</div>';
$pdf->writeHTMLCell( 90, 5, 13, 154, $html, 1, 1, true, false, 'J', true );
//*...............

// //*?.............<<< Other information part -1 >>>.........Column 2
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font

$html = '<div><b> <i> Other Information </i> </b>  </div>';
$pdf->writeHTMLCell( 90.6, 6, 12.6, 197, $html, '', 1, true, false, 'J', true );
//*..................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>2.  </b> Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 12, 205, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_2_date_of_birth', 32, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 205 );

//*..................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3. </b>  &nbsp; &nbsp; Alien Registration Number (A-Number) (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 12, 213.4, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 40, 203.5, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell( 30, 7, 47, 219.3, $html, 0, 1, false, false, 'J', true );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_3_registration_Number', 50, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 53.5, 219 );
//*.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell( 80, 7, 12, 228, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 32, 221.4, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_4_online_account', 64, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 39.5, 233.4 );
//* //*...........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>5.</b>&nbsp; &nbsp; &nbsp;Status of your Form I-918</div>';
$pdf->writeHTMLCell( 95, 0, 12, 241,  $html, 0, 1, false, 'L' );
$form_status_pending  = (showData('i_918a_part_2_other_information_status')=='pending') ? 'checked':'';
$form_status_approve  = (showData('i_918a_part_2_other_information_status')=='approved') ? 'checked':'';
$html = '
   &nbsp;  &nbsp; <input type="checkbox" name="part2-5_Pending" value="Pending" checked="'.$form_status_pending .'"/> Pending

   &nbsp;  &nbsp; <input type="checkbox" name="part2-5_Approved" value="Approved" checked="'.$form_status_approve.'" /> Approved
   ';

$pdf->writeHTMLCell( 195, 0, 52, 247.8, $html, 0, 1, false, true, 'J', 0 );

//!column 1 finisned
//!2nd column.....
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font

$html = '<div><b>Part 3. Information About Your Qualifying
Family Member </b> (Derivative)</div>';
$pdf->writeHTMLCell( 90, 5, 113, 119, $html, 1, 1, true, false, 'L', true );

//*................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 10, 112, 132, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_1a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 133 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 10, 112, 141, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_1b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 142 );

//*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 10, 112, 151, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_1c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 151 );

//*.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>Other Names Used</b> (Include maiden name, nicknames, and <br>
aliases, if applicable) </div>';
$pdf->writeHTMLCell( 90, 5, 112, 160, $html, 0, 1, false, false, 'J', true );

// //*..................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 10, 112, 170, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 171 );
// //* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 10, 112, 179, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 180 );

// //*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 10, 112, 189, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 189 );

//*.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>NOTE:</b> If you need extra space to complete this section, use the
space provided in <b>Part 11. Additional Information.</b></div>';
$pdf->writeHTMLCell( 90, 5, 112, 198, $html, 0, 1, false, false, 'J', true );

// //*..................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'I', 10 );
//* set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
//* set font
$html = '<div><b>Residence or Intended Residence in the United
States</b></div>';
$pdf->writeHTMLCell( 91, 5, 112.5, 210, $html, 0, 1, true, false, 'L', true );
$pdf->SetFont( 'times', 'IB', 9 );
$html = '<div><a href="https://tools.usps.com/go/ZipLookupAction_input"><I>(USPS ZIP Code Lookup)</I></a></div>';
$pdf->writeHTMLCell( 90, 1, 112.5, 216, $html, 0, 1, true, false, 'R', true );
// //*.....
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.a. &nbsp;&nbsp;&nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell( 40, 5, 112, 222, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3a_street_number', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 223 );

// //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$part3_apt_check = (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') =='apt') ? 'checked':'';
$part3_ste_check = (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') =='ste') ? 'checked':'';
$part3_flr_check = (showData('information_about_your_qualifying_family_member_residence_apt_ste_flr') =='flr') ? 'checked':'';

$html = '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="3b_Apt" value="Apt" checked="'.$part3_apt_check.'"/>Apt. &nbsp;&nbsp;
<input type="checkbox" name="3b_Ste" value="Ste" checked="'.$part3_ste_check.'"/>Ste. 
<input type="checkbox" name="3b_Flr" value="Flr" checked="'.$part3_flr_check.'"/>Flr.
</div>';
$pdf->writeHTMLCell( 61, 0, 112, 231.8, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3b_apt_ste', 40, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 163.5, 231.7 );

// //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 241, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3c_city_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 240.5 );
//*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 249.2, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part3_3d_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 130, 249, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part3_3e_zip_code', 33.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 170, 249.3 );

/********************************
******** End Page No 1 **********
*********************************/

/********************************
******** Start Page No 2 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b>Part 3. Information About Your Qualifying Family Member (The Derivative)</b> &nbsp; (continued)</div>';
$pdf->writeHTMLCell( 91, 5, 13, 18, $html, 1, 1, true, false, 'L', true );
//*...........
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'I', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.2, 1, 0.2 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b>Safe Mailing Address</b> &nbsp; <I> (if other than Residence)</I></div>';
$pdf->writeHTMLCell( 91, 5, 13, 31.5, $html, 0, 1, true, false, 'J', true );
//*.................................
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.a.</b> &nbsp; In Care Of Name </div>';
$pdf->writeHTMLCell( 70, 0, 12, 38, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4a_care_of_name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 43 );

//*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>4.b. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 50.5, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4b_street_number', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 51.5 );

//* //* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$part3_4c_apt = (showData('information_about_you_mailing_apt_ste_flr')=='apt') ? 'checked':'';
$part3_4c_ste = (showData('information_about_you_mailing_apt_ste_flr')=='ste') ? 'checked':'';
$part3_4c_flr = (showData('information_about_you_mailing_apt_ste_flr')=='flr') ? 'checked':'';


$html = '<div><b>4.c. </b> 
<input type="checkbox" name="4c_Apt" value="Apt" checked="'.$part3_4c_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="4c_Ste" value="Ste" checked="'.$part3_4c_ste.'" />Ste. 
<input type="checkbox" name="Flr" value="4c_Flr" checked="'.$part3_4c_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 12, 60.8, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4c_apt_ste', 43, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 60 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 69, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4d_city_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42.6, 69 );
//* //*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>4.e.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>4.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 78, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part3_4e_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 29.5, 78, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font
$pdf->TextField( 'part3_4f_zip_code', 35, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 68, 78 );

//* //*..........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 87, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4g_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 87 );
//* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 96, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4h_Postal_code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 96 );
//*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 103, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_4i_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 108.5 );
//* //* //*.....

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );

$pdf->SetFontSize( 11.6 );
$html = '<div><b><i>Other Information About Qualifying Family
Member</i></b></div>';
$pdf->writeHTMLCell( 91, 5, 13, 120, $html, 0, 1, true, false, 'L', true );
//*.......................................

//*....
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5. </b>  &nbsp; &nbsp; A-Number (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 12, 134, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 42.5, 116, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell( 30, 7, 53, 134, $html, 0, 1, false, false, 'J', true );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_5_A_Number', 45, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 59, 133 );
// //* //*............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6. </b>  &nbsp; &nbsp;  U.S. Social Security Number (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 12, 141, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 45, 128.5, false );
// //* angle
$pdf->StopTransform();
$pdf->SetFont( 'times', '', 10 );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_6_social_security', 50, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),  53.5, 146.5 );

// //*.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell( 80, 7, 12, 155, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 31, 149, false );
// //* angle
$pdf->StopTransform();
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_7_online_account', 64, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 39.5, 160 );
//* //*...........

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>8.  </b> &nbsp; Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 12, 168.4, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_8_date_of_birth', 32, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 168.6 );
// //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>9.   </b>&nbsp; Country of Birth</div>';
$pdf->writeHTMLCell( 50, 0, 12, 175, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_9_Country_of_birth', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 180 );
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>10.   </b>&nbsp; Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell( 90, 0, 12, 188, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_10_Country_of_Citizenship', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 193 );
//*/...............

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>11.</b>&nbsp; &nbsp; &nbsp;Marital Status</div>';
$pdf->writeHTMLCell( 95, 0, 12, 200,  $html, 0, 1, false, 'L' );

$single_status = (showData('other_information_about_you_marital_status')=='single') ? 'checked':'';
$married_status = (showData('other_information_about_you_marital_status')=='married') ? 'checked':'';
$divorced_status = (showData('other_information_about_you_marital_status')=='divorced') ? 'checked':'';
$widowed_status = (showData('other_information_about_you_marital_status')=='widowed') ? 'checked':'';


$html = '
   <input type="checkbox" name="11_Single" value="Single" checked="'.$single_status.'"/> Single
   
   &nbsp;  &nbsp; <input type="checkbox" name="11_Married" value="Married" checked="'.$married_status.'"/> Married

   &nbsp;  &nbsp; <input type="checkbox" name="11_Divorced" value="Divorced" checked="'.$divorced_status.'"/> Divorced

   &nbsp;  &nbsp; <input type="checkbox" name="11_Widowed" value="Widowed" checked="'.$widowed_status.'"/> Widowed
   ';

$pdf->writeHTMLCell( 195, 0, 19, 205, $html, 0, 1, false, true, 'J', 0 );

//*...........
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>12.</b>&nbsp; &nbsp; &nbsp;Gender</div>';
$pdf->writeHTMLCell( 95, 0, 12, 212,  $html, 0, 1, false, 'L' );

$gender_status_m = (showData('other_information_about_you_gender')=='male') ? 'checked':'';
$gender_status_f = (showData('other_information_about_you_gender')=='female') ? 'checked':'';

$html = '<input type="checkbox" name="Part3_12_Male" value="Male" checked="'.$gender_status_m.'" />&nbsp;&nbsp; Male
   &nbsp;  &nbsp; <input type="checkbox" name="Part3_12_Female" value="Female" checked="'.$gender_status_f.'" />&nbsp;&nbsp;  Female';

$pdf->writeHTMLCell( 195, 0, 40, 213, $html, 0, 1, false, true, 'J', 0 );

// //*..........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>13.  </b>    Form I-94 Arrival-Departure Record Number</div>';
$pdf->writeHTMLCell( 80, 7, 12, 218, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 35, 208.8, false );
//* angle
$pdf->StopTransform();
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_13_Arrival_Departure', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 222.5 );

// //*..........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>14.</b> &nbsp;Passport Number </div>';
$pdf->writeHTMLCell( 50, 5, 12, 231, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_14_Passport_number', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 46, 231 );
// //*.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>15.</b> &nbsp;Travel Document Number </div>';
$pdf->writeHTMLCell( 50, 5, 12, 240, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_15_Travel_Document_Number', 46, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 57, 240 );
//*.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>16.   </b>Country of Issuance for Passport or Travel Document</div>';
$pdf->writeHTMLCell( 100, 0, 12, 247.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_16_Country_of_Issuance', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 252.4 );
// //*..............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>17.   </b>Date of Issuance for Passport or Travel Document </div>';
$pdf->writeHTMLCell( 90, 0, 112, 18.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 118, 22.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_17_Date_of_Issuance', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 165, 23 );
//*..............
$pdf->SetFont( 'times', '', 9.7 );
// //* set font
$html = '<div><b>18.   </b>Expiration Date for Passport or Travel Document</div>';
$pdf->writeHTMLCell( 90, 0, 112, 29, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 118, 33, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_18_Expiration_Date', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 165, 34 );
// //*..............1

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 0.5, 0.5, 0.5, 1 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b>Part 4. Additional Information About Your Qualifying Family Member</b></div>';
$pdf->writeHTMLCell( 90, 5, 113, 43, $html, 1, 1, true, false, 'L', true );
//*..................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>Provide the date of last entry, place of last entry, and current
immigration status for your family member if he or she is
currently in the United States</b></div>';
$pdf->writeHTMLCell( 90, 5, 112, 56, $html, 0, 0, false, false, 'L', true );
// //*......

//*..............
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>1.a.   </b>Date of Last Entry into the United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 72, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_1a_Date_of_LastEntry', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 165, 77 );
//*.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Place of Last Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 5, 112, 84, $html, 0, 0, false, false, 'L', true );

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>1.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 91, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_1b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 90 );
//*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>1.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 112, 98, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part4_1c_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 130, 98, $html, '', 0, 0, true, 'L' );
// //*..........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.d.   </b>Current Immigration Status</div>';
$pdf->writeHTMLCell( 90, 0, 112, 106, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_1d_Current', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 112 );

//*/......................................

//*..................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>Provide the date of entry, place of entry, and status at entry
for your family member's last entry if he or she has
previously traveled to the United States but is not currently
in the United States.</b></div>";
$pdf->writeHTMLCell( 90, 5, 112, 121, $html, 0, 0, false, false, 'L', true );
// //*......

//*..............
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>2.a.   </b>Date of Last Entry into the United States (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 140, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_2a_Date_of_LastEntry', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 165, 145 );
// //*.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Place of Last Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 5, 112, 153, $html, 0, 0, false, false, 'L', true );

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 160, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_2b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 160 );
//*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>2.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 112, 168, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part4_2c_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 130, 168, $html, '', 0, 0, true, 'L' );
//*.......................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.d.   </b>Date Authorized Stay Expired (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 176, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_2d_Date', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 165, 182 );
//..................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.e.   </b>Status at the Time of Entry (for example, F-1 student,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; B-2 tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 189, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_2e_Status', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 199 );

/********************************
******** End Page No 2 **********
*********************************/

/********************************
******** Start Page No 3 ********
*********************************/

$pdf->AddPage('P', 'LETTER');
$pdf->SetFont( 'times', '', 11.6 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 4. Additional Information About Your
Qualifying Family Member </b>(continued)</div>';
$pdf->writeHTMLCell( 90, 4, 13, 18, $html, 1, 1, true, false, 'L', true );
//*...........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>If your family member is outside the United States, provide
the U.S. Consulate or inspection facility or a safe foreign
mailing address you want notified if this supplement is
approved.</b></div>';
$pdf->writeHTMLCell( 91, 4, 12, 31, $html, 0, 1, false, false, 'L', true );

//*................
$pdf->setFont( 'Times', '', 9.9 );
$html = '<div><b>3.a.</b>&nbsp; &nbsp; &nbsp;Type of Office (Select <b>only one </b>box):</div>';
$pdf->writeHTMLCell( 95, 0, 12, 50,  $html, 0, 1, false, 'L' );

$office_type_us_consulate = (showData('i_918a_additional_info_type_of_office')=='us_consulate')? 'checked':'';
$office_type_pre_flight = (showData('i_918a_additional_info_type_of_office')=='pre_flight')? 'checked':'';
$office_type_port_entry = (showData('i_918a_additional_info_type_of_office')=='port_entry')? 'checked':'';


$html = '
   <input type="checkbox" name="part4-USConsulate" value="U.S. Consulate" checked="'.$office_type_us_consulate.'" /> U.S. Consulate
   &nbsp;  &nbsp; 
   <input type="checkbox" name="part4-Pre-Flight-Inspection" value="Pre-Flight Inspection" checked="'.$office_type_pre_flight.'" /> Pre-Flight Inspection';
$pdf->writeHTMLCell( 195, 0, 19, 57, $html, 0, 1, false, true, 'J', 0 );
$html = '<input type="checkbox" name="part4-Port-of-Entry" value="Port-of-Entry" checked="'.$office_type_port_entry.'" /> Port-of-Entry';
$pdf->writeHTMLCell( 195, 0, 19, 63, $html, 0, 1, false, true, 'J', 0 );
//*....................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 70, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_3b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 70 );
//*............

$pdf->SetFont( 'times', '', 10 );
//* set font
$html = '<b>3.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 80, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part4_3c_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 80, $html, '', 0, 0, true, 'L' );
// //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.d.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 86.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_3d_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 92.4 );
//* //* //*.....

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>Safe Foreign Address Where You Want Notification Sent</b><br>(if other than U.S. Consulate, Pre-Flight Inspection,or<br>
Port-of-Entry) </div>';
$pdf->writeHTMLCell( 90, 4, 12, 102, $html, 0, 1, false, false, 'L', true );

//*.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>4.a. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 7, 12, 118, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_4a_street_number', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42, 120 );

//* ...........
$pdf->SetFont( 'times', '', 9.7 );
//* set font
$street_apt = (showData('additional_information_about_your_qualifying_family_member_apt_ste_flr')=='apt')?'checked':'';
$street_ste = (showData('additional_information_about_your_qualifying_family_member_apt_ste_flr')=='ste')?'checked':'';
$street_flr = (showData('additional_information_about_your_qualifying_family_member_apt_ste_flr')=='flr')?'checked':'';

$html = '<div><b>4.b. </b>
<input type="checkbox" name="4b_Apt" value="Apt" checked="'.$street_apt.'"/>Apt. &nbsp;&nbsp;
<input type="checkbox" name="4b_Ste" value="Ste" checked="'.$street_ste.'"/>Ste. 
<input type="checkbox" name="4b_Flr" value="Flr" checked="'.$street_flr.'"/> Flr.
</div>';

$pdf->writeHTMLCell( 61, 0, 12, 129, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_4b_apt_ste', 42, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 60, 129 );

//* //*......

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 138, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_4c_city_town', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42, 138 );
//* //*............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.d.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 146.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_4d_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42, 146.7 );
//* //*...............

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.e.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 155, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_4e_Postal_code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 42, 155 );
//*........

$pdf->SetFont( 'times', '', 9.7 );
//* set font
$html = '<div><b>4.f.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 161, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_4f_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 167 );
//* //* //*.....
$pdf->SetFont( 'times', '', 9.6 );
$html = "<div><b>If your family member was previously married, list the
names of your family member's prior spouses and the dates
his or her marriages were terminated. You must attach
documents such as divorce decrees or death certificates.</b></div>";
$pdf->writeHTMLCell( 90, 4, 12, 174, $html, 0, 1, false, false, 'L', true );
//*...................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 5, 12, 192, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_5a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 193 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 5, 12, 202, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_5b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 203 );

//*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 5, 12, 212, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_5c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 213 );
//*.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>5.d.  </b> Date Marriage Ended (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 12, 222, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_5d_Marriage_Ended', 28, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 75, 222 );
// //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.e.   </b>&nbsp; Where did the marriage end?</div>';
$pdf->writeHTMLCell( 50, 0, 12, 227.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_5e_Where', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 233.6 );
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.f.   </b>&nbsp; How did the marriage end?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 242, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_5f', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 247 );
//*/...............

//*!page 2 column-1 Finished
//*...................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 17, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_6a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 18 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 27, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_6b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 29 );

//*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 5, 112, 38, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_6c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 38 );
//*.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>6.d.  </b> Date Marriage Ended (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 112, 47, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_6d_Marriage_Ended', 28, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 175, 47 );
// //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.e.   </b>&nbsp; Where did the marriage end?</div>';
$pdf->writeHTMLCell( 50, 0, 112, 55, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_6e_Where', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 61 );
//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.f.   </b>&nbsp; How did the marriage end?</div>';
$pdf->writeHTMLCell( 90, 0, 112, 68, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part4_6f', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 73.5 );

//*..............................
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = '<div><b> <i> Other Information </i> </b>  </div>';
$pdf->writeHTMLCell( 90.6, 6, 112.6, 84, $html, '', 1, true, false, 'J', true );

//*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.a.   &nbsp;  </b>     Your family member was or is in immigration
proceedings.</div>';
$pdf->writeHTMLCell( 90, 0, 112, 91, $html, '', 0, 0, true, 'L' );
$proceding_status_yes = (showData('other_info_family_immegration_process')=='Y')?'checked':'';
$proceding_status_no = (showData('other_info_family_immegration_process')=='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part4_7a_y" value="Y" checked="'.$proceding_status_yes .'"/> Yes &nbsp; &nbsp; 
<input type="checkbox" name="part4_7a_n" value="N" checked="'.$proceding_status_no.'"/> No
</div>';
$pdf->writeHTMLCell( 60, 0, 176, 96.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you answered "Yes," select the type of proceedings. If your
family member was in proceedings in the past and is no longer
in proceedings, provide the date of action. If your family
member is currently in proceedings, type or print “Current” in
the appropriate date field. Select <b>all applicable</b> boxes. Use the
space provided in <b>Part 11. Additional Information</b> to provide
an explanation.
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 103, $html, 0, 1, false, true, 'J', true );

//..................

if(showData('immigration_proceedings_removal')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><b>7.b. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7b" value="Y" checked="'.$checked_data.'" /> Removal Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 136, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 141, 'Removal Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_removal_date', 32, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 172, 141);

//..................

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_exclusion')=="Y") $checked_data = "checked"; else $checked_data = "";

$html = '<div><b>7.c. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7c" value="Y" checked="'.$checked_data.'" /> Exclusion Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 147, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 152, 'Exclusion Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_exclusion_date', 32, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 172, 152);

//..................

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_deportion')=="Y") $checked_data = "checked"; else $checked_data = "";

$html = '<div><b>7.d. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7d" value="Y" checked="'.$checked_data.'" /> Deportation Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 157, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 161.5, 'Deportation Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_deportion_date', 32, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 172, 161.5);

//..................

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_rescission')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><b>7.e. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7e" value="Y" checked="'.$checked_data.'" /> Rescission Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 167, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 171.5, 'Rescission Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_rescission_date', 32, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 172, 171.5);

//..................

$pdf->SetFont('times', '', 9.7);
if(showData('immigration_proceedings_judicial')=="Y") $checked_data = "checked"; else $checked_data = "";
$html = '<div><b>7.f. </b> &nbsp;&nbsp;
<input type="checkbox" name="part-2_7f" value="Y" checked="'.$checked_data.'" /> Judicial Proceedings</div>';
$pdf->writeHTMLCell( 90, 0, 112, 177, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 90, 0, 119, 182, 'Judicial Date (mm/dd/yyyy)', '', 0, 0, true, 'L' );
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('immigration_proceedings_judicial_date', 32, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 172, 182);

/* $pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 137.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.b.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Removal Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Removal Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 136, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 39, 3, 165, 139, '', 1, 1, false, true, 'L', true );

// //*........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 147.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.c.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Exclusion Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Exclusion Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 146, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 39, 3, 165, 149, '', 1, 1, false, true, 'L', true );

// //*........................
//*........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 157.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.d.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Deportation Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Deportation Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 156, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 39, 3, 165, 159, '', 1, 1, false, true, 'L', true );

// //*........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 167.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.e.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Rescission Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Rescission Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 166, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 39, 3, 165, 169, '', 1, 1, false, true, 'L', true );

// //*........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 177.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.f.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Judicial Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Judicial Date (mm/dd/yyyy)
</div>';
$pdf->writeHTMLCell( 90, 0, 112, 176, $html, '', 0, 0, true, 'L' );
$pdf->writeHTMLCell( 39, 3, 165, 179, '', 1, 1, false, true, 'L', true );
*/


$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>8.   &nbsp;  </b>     Your family member would like an Employment<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Authorization Document.</div>';
$pdf->writeHTMLCell( 90, 0, 112, 190, $html, '', 0, 0, true, 'L' );

$employement_status_yes = (showData('i_918a_part_4_other_info_employment_authorization')=='Y')?'checked':'';
$employement_status_no  = (showData('i_918a_part_4_other_info_employment_authorization')=='N')?'checked':'';


$html = '<div>
<input type="checkbox" name="part4_8_y" value="Y" checked="'.$employement_status_yes.'" /> Yes &nbsp; &nbsp; 
<input type="checkbox" name="part4_8_n" value="N" checked="'.$employement_status_no.'" /> No 
</div>';
$pdf->writeHTMLCell( 60, 0, 176, 196.3, $html, '', 0, 0, true, 'L' );

//*...............................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>NOTE:</b> If you answered "Yes," submit Form I-765,
Application for Employment Authorization Document,
separately. If your family member is living outside the
United States, he or she is not eligible to receive
employment authorization until he or she is lawfully
admitted to the United States. Do <b>not </b>file Form I-765 for
a family member living outside the United States.
</div>';
$pdf->writeHTMLCell( 85, 7, 119, 204, $html, 0, 1, false, true, 'L', true );

/********************************
******** End Page No 3 **********
*********************************/

/********************************
******** Start Page No 4 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 0, 0, 0, 0 );

$html = '<div><b>Part 5. Processing Information </b></div>';
$pdf->writeHTMLCell( 91, 6, 12.5, 18, $html, 1, 1, true, false, 'L', true );
//*...........
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Answer the following questions about the family member for
whom you are filing this supplement. For the purposes of this
supplement, you must answer “Yes” to the following questions,<br>
if applicable, even if your family member's records were sealed<br>
or otherwise cleared or if anyone, including a judge, law
enforcement officer, or attorney, told your family member that<br>
he or she no longer has a record. </div>";
$pdf->writeHTMLCell( 93, 7, 12, 26, $html, 0, 1, false, true, 'L', true );
//*........
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> If you answer “Yes” to <b>ANY</b> question in <b>Part 5.</b>,<br>
provide an explanation in the space provided in <b>Part 11.<br>
Additional Information.</b></div>";
$pdf->writeHTMLCell( 93, 7, 12, 60, $html, 0, 1, false, true, 'L', true );
//*........
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> Answering “Yes” does not necessarily mean that U.S.
Citizenship and Immigration Services (USCIS) will deny your
Supplement A, Petition for Qualifying Family Member of U-1
Recipient.</div>";
$pdf->writeHTMLCell( 93, 7, 12, 75, $html, 0, 1, false, true, 'L', true );
//*........
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Has your family member <b>EVER</b>:
</div>";
$pdf->writeHTMLCell( 93, 7, 12, 94, $html, 0, 1, false, true, 'L', true );
//*........

//*................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 101, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Committed a crime or offense for which he or she has not<br>
been arrested?<br>
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 101, $html, '', 0, 0, true, 'L' );

$part5_1a_yes = (showData('i_918a_part5_processing_info_1a_crime_status')=='Y')?'checked':'';
$part5_1a_no = (showData('i_918a_part5_processing_info_1a_crime_status')=='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1a_y_currently_active" value="Y" checked="'.$part5_1a_yes.'"/>   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1a_n_currently_active" value="N" checked="'.$part5_1a_no.'"/>   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 105.4, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 111, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been arrested, cited, or detained by any law enforcement<br>
officer (including Department of Homeland Security<br>
(DHS), former Immigration and Nationalization Service<br>
(INS), and military officers) for any reason?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 111, $html, '', 0, 0, true, 'L' );

$part5_1b_yes = (showData('i_918a_part_5_processing_information_1_b') =='Y')?'checked':'';
$part5_1b_no =  (showData('i_918a_part_5_processing_information_1_b') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1b_y_currently_active" value="Y" checked="'.$part5_1b_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1b_n_currently_active" value="N" checked="'.$part5_1b_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 129, $html, '', 0, 0, true, 'L' );
//*................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 135, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been charged with committing any crime or offense?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 135, $html, '', 0, 0, true, 'L' );

$part5_1c_yes = (showData('i_918a_part_5_processing_information_1_c') =='Y')?'checked':'';
$part5_1c_no  = (showData('i_918a_part_5_processing_information_1_c') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1c_y_currently_active" value="Y" checked="'.$part5_1c_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1c_n_currently_active" value="N" checked="'.$part5_1c_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 141.2, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.d.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 148.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been convicted of a crime or offense (even if the violation<br>
was subsequently expunged or pardoned)?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 148.6, $html, '', 0, 0, true, 'L' );

$part5_1d_yes = (showData('i_918a_part_5_processing_information_1_d') =='Y')?'checked':'';
$part5_1d_no  = (showData('i_918a_part_5_processing_information_1_d') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1d_y_currently_active" value="Y" checked="'.$part5_1d_yes.'" /> Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1d_n_currently_active" value="N" checked="'.$part5_1d_no.'" /> No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 157, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.e.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 164.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been placed in an alternative sentencing or a rehabilitative<br>
program (for example, diversion, deferred prosecution,<br>
withheld adjudication, deferred adjudication)?

 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 164.6, $html, '', 0, 0, true, 'L' );

$part5_1e_yes = (showData('i_918a_part_5_processing_information_1_e') =='Y')?'checked':'';
$part5_1e_no  = (showData('i_918a_part_5_processing_information_1_e') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1e_y_currently_active" value="Y" checked="'.$part5_1e_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1e_n_currently_active" value="N" checked="'.$part5_1e_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 178.5, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.f.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 183.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Received a suspended sentence, been placed on probation,<br>
or been paroled?

 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 183.7, $html, '', 0, 0, true, 'L' );

$part5_1f_yes = (showData('i_918a_part_5_processing_information_1_f') =='Y')?'checked':'';
$part5_1f_no  = (showData('i_918a_part_5_processing_information_1_f') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1f_y_currently_active" value="Y" checked="'.$part5_1f_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1f_n_currently_active" value="N" checked="'.$part5_1f_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 189, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.g.</b></div>';
$pdf->writeHTMLCell( 90, 0, 12, 199, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been held in jail or prison?

 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 199, $html, '', 0, 0, true, 'L' );

$part5_1g_yes = (showData('i_918a_part_5_processing_information_1_g') =='Y')?'checked':'';
$part5_1g_no  = (showData('i_918a_part_5_processing_information_1_g') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1g_y_currently_active" value="Y" checked="'.$part5_1g_yes.'" /> Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1g_n_currently_active" value="N" checked="'.$part5_1g_no.'" />  No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 200, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.h.</b></div>';
$pdf->writeHTMLCell( 90, 0, 12, 210, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been the beneficiary of a pardon, amnesty, rehabilitation,<br>
or other act of clemency or similar action?

 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 210, $html, '', 0, 0, true, 'L' );

$part5_1h_yes = (showData('i_918a_part_5_processing_information_1_h') =='Y')?'checked':'';
$part5_1h_no  = (showData('i_918a_part_5_processing_information_1_h') =='N')?'checked':'';

$html = '<div>
<input type="checkbox"  name="part5_1h_y_currently_active" value="Y" checked="'.$part5_1h_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_1h_n_currently_active" value="N" checked="'.$part5_1h_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 220, $html, '', 0, 0, true, 'L' );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>1.i.</b></div>';
$pdf->writeHTMLCell( 90, 0, 12, 225, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Exercised diplomatic immunity to avoid prosecution for a<br>
criminal offense in the United States?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 225, $html, '', 0, 0, true, 'L' );

$part5_1i_yes = (showData('i_918a_part_5_exercised_prosecution_1_i') =='Y')?'checked':'';
$part5_1i_no  = (showData('i_918a_part_5_exercised_prosecution_1_i') =='N')?'checked':'';

$html = '<div><input type="checkbox"  name="part5_1i_y_currently_active" value="Y" checked="'.$part5_1i_yes.'" />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part5_1i_n_currently_active" value="N" checked="'.$part5_1i_no.'" />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 75.5, 230, $html, '', 0, 0, true, 'L' );

//*..............................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>Information About Arrests, Citations, Detentions, or Charges</b> </b></div>';
$pdf->writeHTMLCell( 93, 7, 112, 18, $html, 0, 1, false, true, 'L', true );

//*..........................
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>2.a.   </b> Why was your family member arrested, cited, detained, or<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;charged?</div>';
$pdf->writeHTMLCell( 90, 0, 112, 25, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_2a', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 35 );
//*..........................
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>2.b.   </b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 100, 0, 112, 43.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_2b', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 166, 49 );
//*...............
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div>Where was your family member arrested, cited, detained, or<br>
charged?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 57, $html, '', 0, 0, true, 'L' );
//*...................

$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>2.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 70, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_2c', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 70 );
// //*............

$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<b>2.d.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 112, 82, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part5_2d" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 130, 82, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>2.e.   </b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 90, 0, 112, 90, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_2e', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 95 );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
// //* set font
$html = '<div><b>2.f.   </b>&nbsp;Outcome or disposition (for example, no charges filed, 
<br>      &nbsp;  &nbsp;&nbsp; charges dismissed, jail, probation)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 104, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_2f', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 114 );

$pdf->writeHTMLCell( 91, 5, 112.4, 120, '', 'B', 1, false, true, 'L', true );
//*............................

//*..........................
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>3.a.   </b> Why was your family member arrested, cited, detained, or<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;charged?</div>';
$pdf->writeHTMLCell( 90, 0, 112, 127, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3a', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 137 );
// *..........................
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>3.b.   </b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 100, 0, 112, 143.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3b', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 166, 149 );
//*...............
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div>Where was your family member arrested, cited, detained, or<br>
charged?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 157, $html, '', 0, 0, true, 'L' );
//*...................

$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 170, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3c', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 170 );
// //*............

$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 112, 182, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//* set font

$html = '<select name="part5_3d" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 130, 182, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div><b>3.e.   </b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 90, 0, 112, 190, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3e', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 195 );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
// //* set font
$html = '<div><b>3.f.   </b>&nbsp;Outcome or disposition (for example, no charges filed, 
<br>      &nbsp;  &nbsp;&nbsp; charges dismissed, jail, probation)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 204, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part5_3f', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 119, 214 );

$pdf->writeHTMLCell( 91, 5, 112.4, 120, '', 'B', 1, false, true, 'L', true );

/********************************
******** End Page No 4 **********
*********************************/

/********************************
******** Start Page No 5 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 5. Processing Information </b> (continued) </div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//*.........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member <b>EVER:</b>
</div>';
$pdf->writeHTMLCell( 90, 7, 12, 27, $html, 0, 1, false, true, 'J', true );

//*..............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.a.   &nbsp; </b> Engaged in, or does he or she intend to engage in,   <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
prostitution or procurement of prostitution?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 32, $html, '', 0, 0, true, 'L' );

$part5_4a_yes   = (showData('i_918a_part_5_processing_information_continued_4_a') =='Y')?'checked':'';
$part5_4a_no    = (showData('i_918a_part_5_processing_information_continued_4_a') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_4a_y_currently_active" value="Y" checked="'.$part5_4a_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_4a_n_currently_active" value="N" checked="'.$part5_4a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 40.4, $html, '', 0, 0, true, 'L' );

//*.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.b.   &nbsp;  </b>Engaged in any unlawful commercialized vice, including,  <br>      &nbsp; &nbsp; &nbsp; &nbsp;   but not limited to, illegal gambling? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 44, $html, '', 0, 0, true, 'L' );

$part5_4b_yes   = (showData('i_918a_part_5_processing_information_continued_4_b') =='Y')?'checked':'';
$part5_4b_no    = (showData('i_918a_part_5_processing_information_continued_4_b') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_4b_y_currently_active" value="Y" checked="'.$part5_4b_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_4b_n_currently_active" value="N" checked="'.$part5_4b_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 52, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.c.   &nbsp;  </b>    Knowingly encouraged, induced, assisted, abetted, or  <br>      &nbsp; &nbsp; &nbsp; &nbsp;   aided any alien to try to enter the United States illegally? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 58, $html, '', 0, 0, true, 'L' );

$part5_4c_yes   = (showData('i_918a_part_5_processing_information_continued_4_c') =='Y')?'checked':'';
$part5_4c_no    = (showData('i_918a_part_5_processing_information_continued_4_c') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_4c_y_currently_active" value="Y" checked="'.$part5_4c_yes.'"/>  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_4c_n_currently_active" value="N" checked="'.$part5_4c_no.'"/>  No
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 68, $html, '', 0, 0, true, 'L' );
//*.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.d.   &nbsp;  </b>    Illicitly trafficked in any controlled substance or knowingly <br>      &nbsp; &nbsp; &nbsp; &nbsp;    assisted, abetted, or colluded in the illicit trafficking of any 
<br>      &nbsp; &nbsp; &nbsp; &nbsp; controlled substance?</div>';
$pdf->writeHTMLCell( 95, 0, 12, 71, $html, '', 0, 0, true, 'L' );

$part5_4d_yes   = (showData('i_918a_part_5_processing_information_continued_4_d') =='Y')?'checked':'';
$part5_4d_no    = (showData('i_918a_part_5_processing_information_continued_4_d') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_4d_y_currently_active" value="Y" checked="'.$part5_4d_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_4d_n_currently_active" value="N" checked="'.$part5_4d_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 81, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member <b>EVER</b> committed, planned or prepared,
participated in, threatened to, attempted to, conspired to commit,
gathered information for, or solicited funds for any of the
following:</b>
</div>';
$pdf->writeHTMLCell( 90, 7, 12, 90, $html, 0, 1, false, true, 'J', true );
//*...............................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.a.   &nbsp;  </b>    Hijacking or sabotage of any conveyance (including an 
<br>      &nbsp; &nbsp; &nbsp; &nbsp;    aircraft, vessel, or vehicle)? 
</div>';
$pdf->writeHTMLCell( 95, 0, 12, 110, $html, '', 0, 0, true, 'L' );

$part5_5a_yes   = (showData('i_918a_part_5_processing_information_continued_5_a') =='Y')?'checked':'';
$part5_5a_no    = (showData('i_918a_part_5_processing_information_continued_5_a') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_5a_y_currently_active" value="Y" checked="'.$part5_5a_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_5a_n_currently_active" value="N" checked="'.$part5_5a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 116, $html, '', 0, 0, true, 'L' );
//*......................................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.b.   &nbsp;  </b> </div>';
$pdf->writeHTMLCell( 100, 0, 12, 121, $html, '', 0, 0, true, 'L' );
$html = '<div>Seizing or detaining, and threatening to kill, injure, or
continue to detain, another individual in order to compel a
third person (including a governmental organization) to<br>
do or abstain from doing any act as an explicit or implicit<br>
condition for the release of the individual seized or<br>
detained?</div>';
$pdf->writeHTMLCell( 86, 0, 20, 121, $html, '', 0, 0, true, 'L' );

$part5_5b_yes   = (showData('i_918a_part_5_processing_information_continued_5_b') =='Y')?'checked':'';
$part5_5b_no    = (showData('i_918a_part_5_processing_information_continued_5_b') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_5b_y_currently_active" value="Y" checked="'.$part5_5b_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_5b_n_currently_active" value="N" checked="'.$part5_5b_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 145, $html, '', 0, 0, true, 'L' );
//*.......................

//*.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.c.   &nbsp;  </b>    Assassination? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 152, $html, '', 0, 0, true, 'L' );


$part5_5c_yes   = (showData('i_918a_part_5_processing_information_continued_5_c') =='Y')?'checked':'';
$part5_5c_no    = (showData('i_918a_part_5_processing_information_continued_5_c') =='N')?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_5c_y_currently_active" value="Y" checked="'.$part5_5c_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_5c_n_currently_active" value="N" checked="'.$part5_5c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 152, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.d.   &nbsp;  </b>    The use of any firearm with intent to endanger, directly or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
indirectly, the safety of one or more individuals or to 
<br>  &nbsp; &nbsp;  &nbsp; &nbsp;  
cause substantial damage to property?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 159, $html, '', 0, 0, true, 'L' );

$part5_5d_yes   = (showData('i_918a_part_5_processing_information_continued_5_d') =='Y')?'checked':'';
$part5_5d_no    = (showData('i_918a_part_5_processing_information_continued_5_d') =='N')?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_5d_y_currently_active" value="Y" checked="'.$part5_5d_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_5d_n_currently_active" value="N" checked="'.$part5_5d_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 174, $html, '', 0, 0, true, 'L' );
// //*.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.e.   &nbsp;  </b>     The use of any biological agent, chemical agent, nuclear 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
weapon or device, explosive, or other weapon or  
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 dangerous device, with intent to endanger, directly or <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 indirectly, the safety of one or more individuals or to
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
  cause substantial damage to property?  </div>';
$pdf->writeHTMLCell( 100, 0, 12, 180, $html, '', 0, 0, true, 'L' );

$part5_5e_yes   = (showData('i_918a_part_5_processing_information_continued_5_e') =='Y')?'checked':'';
$part5_5e_no    = (showData('i_918a_part_5_processing_information_continued_5_e') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_5e_y_currently_active" value="Y" checked="'.$part5_5e_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_5e_n_currently_active" value="N" checked="'.$part5_5e_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 204, $html, '', 0, 0, true, 'L' );

//*?.............<<5th page first column done>> .............

$pdf->SetFont( 'times', '', 9.9 );
//* set font
$html = '<div>Has your family member <b>EVER</b> been a member of, solicited
money or members for, provided support for, attended military
training (as defined in section 2339D(c)(1) of Title 18, United
States Code) by or on behalf of, or been associated with any other
group of two or more individuals, whether organized or not,
which has been designated as, or has engaged in or has a
subgroup which has been designated as, or has engaged in:
</div>';
$pdf->writeHTMLCell( 90, 0, 112, 18, $html, '', 0, 0, true, 'L' );
//*...............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.a.   &nbsp;  </b>    A terrorist organization under section 219 of the   <br>      &nbsp; &nbsp; &nbsp; &nbsp;   Immigration and Nationality Act (INA)? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 51, $html, '', 0, 0, true, 'L' );

$part5_6a_yes   = (showData('i_918a_part_5_processing_information_continued_6_a') =='Y')?'checked':'';
$part5_6a_no    = (showData('i_918a_part_5_processing_information_continued_6_a') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_6a_y_currently_active" value="Y" checked="'.$part5_6a_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_6a_n_currently_active" value="N" checked="'.$part5_6a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 61, $html, '', 0, 0, true, 'L' );
//* //*.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.b.   &nbsp;  </b>     Hijacking or sabotage of any conveyance (including an 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
aircraft, vessel, or vehicle)?
</div>';
$pdf->writeHTMLCell( 100, 0, 112, 67, $html, '', 0, 0, true, 'L' );

$part5_6b_yes   = (showData('i_918a_part_5_processing_information_continued_6_b') =='Y')?'checked':'';
$part5_6b_no    = (showData('i_918a_part_5_processing_information_continued_6_b') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_6b_y_currently_active" value="Y" checked="'.$part5_6b_yes.'"/>  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_6b_n_currently_active" value="N" checked="'.$part5_6b_no.'"/>   No
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 73, $html, '', 0, 0, true, 'L' );

//*......................................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.c.   &nbsp;  </b> </div>';
$pdf->writeHTMLCell( 100, 0, 112, 80, $html, '', 0, 0, true, 'L' );
$html = '<div>Seizing or detaining, and threatening to kill, injure, or<br>
continue to detain, another individual in order to compel a<br>
third person (including a governmental organization) to<br>
do or abstain from doing any act as an explicit or implicit<br>
condition for the release of the individual seized or<br>
detained?</div>';
$pdf->writeHTMLCell( 86, 0, 120, 80, $html, '', 0, 0, true, 'L' );

$part5_6c_yes   = (showData('i_918a_part_5_processing_information_continued_6_c') =='Y')?'checked':'';
$part5_6c_no    = (showData('i_918a_part_5_processing_information_continued_6_c') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_6c_y_currently_active" value="Y" checked="'.$part5_6c_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_6c_n_currently_active" value="N" checked="'.$part5_6c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 102, $html, '', 0, 0, true, 'L' );
//*.......................

//*.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.d.   &nbsp;  </b>    Assassination? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 109, $html, '', 0, 0, true, 'L' );

$part5_6d_yes   = (showData('i_918a_part_5_processing_information_continued_6_d') =='Y')?'checked':'';
$part5_6d_no    = (showData('i_918a_part_5_processing_information_continued_6_d') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_6d_y_currently_active" value="Y" checked="'.$part5_6d_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_6d_n_currently_active" value="N" checked="'.$part5_6d_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 110, $html, '', 0, 0, true, 'L' );

//*................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.e.   &nbsp;  </b>    The use of any firearm with intent to endanger, directly or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
indirectly, the safety of one or more individuals or to cause
<br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
substantial damage to property?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 117, $html, '', 0, 0, true, 'L' );

$part5_6e_yes   = (showData('i_918a_part_5_processing_information_continued_6_e') =='Y')?'checked':'';
$part5_6e_no    = (showData('i_918a_part_5_processing_information_continued_6_e') =='N')?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_6e_y_currently_active" value="Y" checked="'.$part5_6e_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_6e_n_currently_active" value="N" checked="'.$part5_6e_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 127.6, $html, '', 0, 0, true, 'L' );
//*.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.f.   &nbsp;  </b> </div>';
$pdf->writeHTMLCell( 100, 0, 112, 133, $html, '', 0, 0, true, 'L' );
$html = '<div>The use of any biological agent, chemical agent, nuclear<br>
weapon or device, explosive, or other weapon or dangerous<br>
device, with intent to endanger, directly or indirectly, the<br>
safety of one or more individuals or to cause substantial<br>
damage to property?</div>';
$pdf->writeHTMLCell( 92, 0, 120, 133, $html, '', 0, 0, true, 'L' );


$part5_6f_yes   = (showData('i_918a_part_5_processing_information_continued_6_f') =='Y') ?'checked':'';
$part5_6f_no    = (showData('i_918a_part_5_processing_information_continued_6_f') =='N') ?'checked':'';


$html = '<div><input type="checkbox" name="part5_6f_y_currently_active" value="Y" checked="'.$part5_6f_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_6f_n_currently_active" value="N" checked="'.$part5_6f_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 152, $html, '', 0, 0, true, 'L' );
//*......................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.g.   &nbsp;  </b> </div>';
$pdf->writeHTMLCell( 100, 0, 112, 158, $html, '', 0, 0, true, 'L' );
$html = '<div>Soliciting money or members or otherwise providing<br>
material support to a terrorist organization?</div>';
$pdf->writeHTMLCell( 90, 0, 120, 158, $html, '', 0, 0, true, 'L' );

$part5_6g_yes   = (showData('i_918a_part_5_processing_information_continued_6_g') =='Y') ?'checked':'';
$part5_6g_no    = (showData('i_918a_part_5_processing_information_continued_6_g') =='N') ?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_6g_y_currently_active" value="Y" checked="'.$part5_6g_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_6g_n_currently_active" value="N" checked="'.$part5_6g_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 168, $html, '', 0, 0, true, 'L' );
//*......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Does your family member intend to engage in the United
States in:
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 173, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.a.   &nbsp;  </b>    Espionage? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 184, $html, '', 0, 0, true, 'L' );


$part5_7a_yes   = (showData('i_918a_part_5_processing_information_continued_7_a') =='Y') ?'checked':'';
$part5_7a_no    = (showData('i_918a_part_5_processing_information_continued_7_a') =='N') ?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_7a_y_currently_active" value="Y" checked="'.$part5_7a_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_7a_n_currently_active" value="N" checked="'.$part5_7a_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 184, $html, '', 0, 0, true, 'L' );


//*................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.b.   &nbsp;  </b>    Any unlawful activity, or any activity the purpose of
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
which is in opposition to, or the control, or overthrow of
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 the Government of the United States?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 191, $html, '', 0, 0, true, 'L' );



$part5_7b_yes   = (showData('i_918a_part_5_processing_information_continued_7_b') =='Y') ?'checked':'';
$part5_7b_no    = (showData('i_918a_part_5_processing_information_continued_7_b') =='N') ?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_7b_y_currently_active" value="Y" checked="'.$part5_7b_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_7b_n_currently_active" value="N" checked="'.$part5_7b_no.'" />  No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 205, $html, '', 0, 0, true, 'L' );
//*.......................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.c.   &nbsp;  </b>    Solely, principally, or incidentally in any activity related
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
to espionage or sabotage or to violate any law involving
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 the export of goods, technology, or sensitive information?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 210, $html, '', 0, 0, true, 'L' );

$part5_7c_yes   = (showData('i_918a_part_5_processing_information_continued_7_c') =='Y') ?'checked':'';
$part5_7c_no    = (showData('i_918a_part_5_processing_information_continued_7_c') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_7c_y_currently_active" value="Y" checked="'.$part5_7c_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_7c_n_currently_active" value="N" checked="'.$part5_7c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 224, $html, '', 0, 0, true, 'L' );
//*.......................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>8.   &nbsp;  </b>    Has your family member <b>EVER</b> been or does he or she 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
continue to be a member of the Communist or other 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 totalitarian party, except when membership was<br>      &nbsp; &nbsp;  &nbsp; &nbsp; involuntary?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 230, $html, '', 0, 0, true, 'L' );

$part5_8_yes   = (showData('i_918a_part_5_processing_information_continued_8_membership_was_involuntary') =='Y') ?'checked':'';
$part5_8_no    = (showData('i_918a_part_5_processing_information_continued_8_membership_was_involuntary') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_8_y_currently_active" value="Y" checked="'.$part5_8_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_8_n_currently_active" value="N" checked="'.$part5_8_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 245, $html, '', 0, 0, true, 'L' );

/********************************
******** End Page No 5 **********
*********************************/

/********************************
******** Start Page No 6 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );
$html = '<div><b>Part 5. Processing Information </b> (continued) </div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//*...................
$html = '<div><b>9.</b></div>';
$pdf->writeHTMLCell( 90, 0, 12, 27, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member <b>EVER,</b> during the period of
March 23, 1933 to May 8, 1945, in association with either
the Nazi Government of Germany or any organization or
government associated or allied with the Nazi Government
of Germany, ordered, incited, assisted or otherwise
participated in the persecution of any person because of
race, religion, nationality, membership in a particular
social group or political opinion?
</div>';
$pdf->writeHTMLCell( 80, 7, 20, 27, $html, 0, 1, false, true, 'J', true );


$part5_9_yes   = (showData('i_918a_part_5_processing_information_continued_9_political_opinion') =='Y') ?'checked':'';
$part5_9_no    = (showData('i_918a_part_5_processing_information_continued_9_political_opinion') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_9_y_currently_active" value="Y" checked="'.$part5_9_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_9_n_currently_active" value="N" checked="'.$part5_9_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 63, $html, '', 0, 0, true, 'L' );
//*....................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member <b>EVER </b>ordered, incited, called for,
committed, assisted, helped with, or otherwise participated in any
of the following:
</div>';
$pdf->writeHTMLCell( 92, 7, 12,70, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>10.a.   &nbsp; </b>Acts involving torture or genocide? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 84, $html, '', 0, 0, true, 'L' );

$part5_10a_yes   = (showData('i_918a_part_5_processing_information_continued_10_a') =='Y') ?'checked':'';
$part5_10a_no    = (showData('i_918a_part_5_processing_information_continued_10_a') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_10a_y_currently_active" value="Y" checked="'.$part5_10a_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10a_n_currently_active" value="N" checked="'.$part5_10a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 84.5, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>10.b.   &nbsp; </b>Killing any person?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 91, $html, '', 0, 0, true, 'L' );

$part5_10b_yes   = (showData('i_918a_part_5_processing_information_continued_10_b') =='Y') ?'checked':'';
$part5_10b_no    = (showData('i_918a_part_5_processing_information_continued_10_b') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_10b_y_currently_active" value="Y" checked="'.$part5_10b_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10b_n_currently_active" value="N" checked="'.$part5_10b_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 91.5, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>10.c.   &nbsp; </b>Intentionally and severely injuring any person?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 98, $html, '', 0, 0, true, 'L' );

$part5_10c_yes   = (showData('i_918a_part_5_processing_information_continued_10_c') =='Y') ?'checked':'';
$part5_10c_no    = (showData('i_918a_part_5_processing_information_continued_10_c') =='N') ?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_10c_y_currently_active" value="Y" checked="'.$part5_10c_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10c_n_currently_active" value="N" checked="'.$part5_10c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 103, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>10.d.   &nbsp; </b>Engaging in any kind of sexual conduct or relations with<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;any person who was being forced or threatened?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 108, $html, '', 0, 0, true, 'L' );

$part5_10d_yes   = (showData('i_918a_part_5_processing_information_continued_10_d') =='Y') ?'checked':'';
$part5_10d_no    = (showData('i_918a_part_5_processing_information_continued_10_d') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_10d_y_currently_active" value="Y" checked="'.$part5_10d_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10d_n_currently_active" value="N" checked="'.$part5_10d_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 117.5, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>10.e.   &nbsp; </b>Limiting or denying any person's ability to exercise <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;religious beliefs? </div>";
$pdf->writeHTMLCell( 90, 0, 12, 122, $html, '', 0, 0, true, 'L' );

$part5_10e_yes   = (showData('i_918a_part_5_processing_information_continued_10_e') =='Y') ?'checked':'';
$part5_10e_no    = (showData('i_918a_part_5_processing_information_continued_10_e') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_10e_y_currently_active" value="Y" checked="'.$part5_10e_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10e_n_currently_active" value="N" checked="'.$part5_10e_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 127.4, $html, '', 0, 0, true, 'L' );


//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>10.f.   &nbsp; </b>The persecution of any person because of race, religion,<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;national origin, membership in a particular social group, <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;or political opinion?</div>";
$pdf->writeHTMLCell( 90, 0, 12, 134, $html, '', 0, 0, true, 'L' );

$part5_10f_yes   = (showData('i_918a_part_5_processing_information_continued_10_f') =='Y') ?'checked':'';
$part5_10f_no    = (showData('i_918a_part_5_processing_information_continued_10_f') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_10f_y_currently_active" value="Y" checked="'.$part5_10f_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10f_n_currently_active" value="N" checked="'.$part5_10f_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 142.4, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>10.g.   &nbsp; </b>Displacing or moving any person from their residence by <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;force, threat of force, compulsion, or duress?</div>";
$pdf->writeHTMLCell( 90, 0, 12, 149, $html, '', 0, 0, true, 'L' );

$part5_10g_yes   = (showData('i_918a_part_5_processing_information_continued_10_g') =='Y') ?'checked':'';
$part5_10g_no    = (showData('i_918a_part_5_processing_information_continued_10_g') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_10g_y_currently_active" value="Y" checked="'.$part5_10g_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_10g_n_currently_active" value="N" checked="'.$part5_10g_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 157, $html, '', 0, 0, true, 'L' );

//*....................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>NOTE:</b> If you answered "Yes" to any question in <b>Item<br>
Numbers 10.a. - 10.g.</b>, please describe the circumstances in the<br>
spaces provided in<b> Part 11. Additional Information.</b>
</div>';
$pdf->writeHTMLCell( 92, 7, 12,164, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>11.   &nbsp; </b>Has your family member <b>EVER</b> advocated that another<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;person commit any of the acts described in <b>Item<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Numbers 10.a. - 10.g.</b>, urged, or encouraged another<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;person, to commit such acts?</div>";
$pdf->writeHTMLCell( 90, 0, 12, 180, $html, '', 0, 0, true, 'L' );


$part5_11_yes   = (showData('i_918a_part_5_processing_information_continued_11_commit_such_acts') =='Y') ?'checked':'';
$part5_11_no    = (showData('i_918a_part_5_processing_information_continued_11_commit_such_acts') =='N') ?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_11_y_currently_active" value="Y" checked="'.$part5_11_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_11_n_currently_active" value="N" checked="'.$part5_11_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 194, $html, '', 0, 0, true, 'L' );

//*....................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member <b>EVER</b> been present or nearby when<br>
any person was:
</b>
</div>';
$pdf->writeHTMLCell( 92, 7, 12,200, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>12.a.   &nbsp; </b>Intentionally killed, tortured, beaten, or injured?</div>";
$pdf->writeHTMLCell( 90, 0, 12, 215, $html, '', 0, 0, true, 'L' );

$part5_12a_yes   = (showData('i_918a_part_5_processing_information_continued_12_a') =='Y') ?'checked':'';
$part5_12a_no    = (showData('i_918a_part_5_processing_information_continued_12_a') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_12a_y_currently_active" value="Y" checked="'.$part5_12a_yes.'"/>  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_12a_n_currently_active" value="N" checked="'.$part5_12a_no.'"/>   No
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 220, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>12.b.   &nbsp; </b>Displaced or moved from his or her residence by force,<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;compulsion, or duress?</div>";
$pdf->writeHTMLCell( 90, 0, 12, 225, $html, '', 0, 0, true, 'L' );

$part5_12b_yes   = (showData('i_918a_part_5_processing_information_continued_12_b') =='Y') ?'checked':'';
$part5_12b_no    = (showData('i_918a_part_5_processing_information_continued_12_b') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_12b_y_currently_active" value="Y" checked="'.$part5_12b_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_12b_n_currently_active" value="N" checked="'.$part5_12b_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 230, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>12.c.   &nbsp; </b>In any way compelled or forced to engage in any kind of<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; sexual contact or relations?</div>";
$pdf->writeHTMLCell( 90, 0, 12, 237, $html, '', 0, 0, true, 'L' );

$part5_12c_yes   = (showData('i_918a_part_5_processing_information_continued_12_c') =='Y') ?'checked':'';
$part5_12c_no    = (showData('i_918a_part_5_processing_information_continued_12_c') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_12c_y_currently_active" value="Y" checked="'.$part5_12c_yes.'"/>  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_12c_n_currently_active" value="N" checked="'.$part5_12c_no.'"/>   No
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 245, $html, '', 0, 0, true, 'L' );
//*................................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member<b> EVER</b>
</b>
</div>';
$pdf->writeHTMLCell( 92, 7, 112,18, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>13.a.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 25, $html, '', 0, 0, true, 'L' );
$html = "<div>Served in, been a member of, assisted in, or participated<br>
in any military unit, paramilitary unit, police unit, self-<br>defense unit, vigilante unit, rebel group, guerilla group,<br>
militia, or other insurgent organization?</div>";
$pdf->writeHTMLCell( 90, 0, 121, 25, $html, '', 0, 0, true, 'L' );

$part5_13a_yes   = (showData('i_918a_part_5_processing_information_continued_13_a') =='Y') ?'checked':'';
$part5_13a_no    = (showData('i_918a_part_5_processing_information_continued_13_a') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_13a_y_currently_active" value="Y" checked="'.$part5_13a_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_13a_n_currently_active" value="N" checked="'.$part5_13a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 44, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>13.b.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 48, $html, '', 0, 0, true, 'L' );
$html = "<div>Served in any prison, jail, prison camp, detention facility,<br>
labor camp, or any other situation that involved detaining<br>
persons? 
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 48, $html, '', 0, 0, true, 'L' );

$part5_13b_yes   = (showData('i_918a_part_5_processing_information_continued_13_b') =='Y') ?'checked':'';
$part5_13b_no    = (showData('i_918a_part_5_processing_information_continued_13_b') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_13b_y_currently_active" value="Y" checked="'.$part5_13b_yes.'"/>  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_13b_n_currently_active" value="N" checked="'.$part5_13b_no.'"/>   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 57, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>13.c.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 64, $html, '', 0, 0, true, 'L' );
$html = "<div>Served in, been a member of, assisted in, or participated<br>
in any group, unit, or organization of any kind in which<br>
you or other persons transported, possessed, or used any<br>
type of weapon?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 64, $html, '', 0, 0, true, 'L' );

$part5_13c_yes   = (showData('i_918a_part_5_processing_information_continued_13_c') =='Y') ?'checked':'';
$part5_13c_no    = (showData('i_918a_part_5_processing_information_continued_13_c') =='N') ?'checked':'';


$html = '<div>
<input type="checkbox" name="part5_13c_y_currently_active" value="Y" checked="'.$part5_13c_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_13c_n_currently_active" value="N" checked="'.$part5_13c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 78, $html, '', 0, 0, true, 'L' );
//*....................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>NOTE:</b> If you answered "Yes" to any question in <b>Item<br>
Numbers 13.a. - 13.c.</b>, please describe the circumstances in<br>
<b>Part 11. Additional Information.</b></b>
</div>';
$pdf->writeHTMLCell( 92, 7, 112,84, $html, 0, 1, false, true, 'J', true );
//*................................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member<b> EVER</b>
</b>
</div>';
$pdf->writeHTMLCell( 92, 7, 112,99, $html, 0, 1, false, true, 'J', true );


//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>14.a.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 105, $html, '', 0, 0, true, 'L' );
$html = "<div>Received any type of military, paramilitary, or weapons
training?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 105, $html, '', 0, 0, true, 'L' );

$part5_14a_yes   = (showData('i_918a_part_5_processing_information_continued_14_a') =='Y') ?'checked':'';
$part5_14a_no    = (showData('i_918a_part_5_processing_information_continued_14_a') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_14a_y_currently_active" value="Y" checked="'.$part5_14a_yes.'" />   Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_14a_n_currently_active" value="N" checked="'.$part5_14a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 110, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>14.b.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 115, $html, '', 0, 0, true, 'L' );
$html = "<div>Been a member of, assisted in, or participated in any<br>
group, unit, or organization of any kind in which you or<br>
other persons used any type of weapon against any person<br>
or threatened to do so?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 115, $html, '', 0, 0, true, 'L' );

$part5_14b_yes   = (showData('i_918a_part_5_processing_information_continued_14_b') =='Y') ?'checked':'';
$part5_14b_no    = (showData('i_918a_part_5_processing_information_continued_14_b') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_14b_y_currently_active" value="Y" checked="'.$part5_14b_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_14b_n_currently_active" value="N" checked="'.$part5_14b_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 130, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>14.c.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 135, $html, '', 0, 0, true, 'L' );
$html = "<div>Assisted or participated in selling or providing weapons to<br>
any person who to your knowledge used them against<br>
another person, or in transporting weapons to any person<br>
who to your knowledge used them against another<br>
person?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 135, $html, '', 0, 0, true, 'L' );

$part5_14c_yes   = (showData('i_918a_part_5_processing_information_continued_14_c') =='Y') ?'checked':'';
$part5_14c_no    = (showData('i_918a_part_5_processing_information_continued_14_c') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_14c_y_currently_active" value="Y" checked="'.$part5_14c_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_14c_n_currently_active" value="N" checked="'.$part5_14c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 154, $html, '', 0, 0, true, 'L' );



//*....................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>NOTE:</b> If you answered "Yes" to any question in <b>Item<br>
Numbers 14.a. - 14.c.</b>, please describe the circumstances in<br>
<b>Part 11. Additional Information.</b></b>
</div>';
$pdf->writeHTMLCell( 92, 7, 112,160, $html, 0, 1, false, true, 'J', true );
//*................................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Has your family member<b> EVER</b>
</b>
</div>';
$pdf->writeHTMLCell( 92, 7, 112,175, $html, 0, 1, false, true, 'J', true );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>15.a.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 180, $html, '', 0, 0, true, 'L' );
$html = "<div>Recruited, enlisted, conscripted, or used any person under 15<br>
years of age to serve in or help an armed force or group?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 180, $html, '', 0, 0, true, 'L' );

$part5_15a_yes   = (showData('i_918a_part_5_processing_information_continued_15_a') =='Y') ?'checked':'';
$part5_15a_no    = (showData('i_918a_part_5_processing_information_continued_15_a') =='N') ?'checked':'';

$html = '<div>
<input type="checkbox" name="part5_15a_y_currently_active" value="Y" checked="'.$part5_15a_yes.'" />  Yes &nbsp; &nbsp; 
<input type="checkbox" name="part5_15a_n_currently_active" value="N" checked="'.$part5_15a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 190, $html, '', 0, 0, true, 'L' );
//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>15.b.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 197, $html, '', 0, 0, true, 'L' );
$html = "<div>Used any person under 15 years of age to take part in<br>
hostilities, or to help or provide services to people in<br>
combat?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 197, $html, '', 0, 0, true, 'L' );

$part5_15b_yes   = (showData('i_918a_part_5_processing_information_continued_15_b') =='Y') ?'checked':'';
$part5_15b_no    = (showData('i_918a_part_5_processing_information_continued_15_b') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_15b_y_currently_active" value="Y" checked="'.$part5_15b_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_15b_n_currently_active" value="N" checked="'.$part5_15b_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 206, $html, '', 0, 0, true, 'L' );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>16.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 212, $html, '', 0, 0, true, 'L' );
$html = "<div>Is your family member <b>NOW</b> in removal, exclusion,<br>
rescission, or deportation proceedings?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 212, $html, '', 0, 0, true, 'L' );

$part5_16_yes   = (showData('i_918a_part_5_processing_information_continued_16_deporation_processdings') =='Y') ?'checked':'';
$part5_16_no    = (showData('i_918a_part_5_processing_information_continued_16_deporation_processdings') =='N') ?'checked':'';


$html = '<div><input type="checkbox" name="part5_16_y_currently_active" value="Y" checked="'.$part5_16_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_16_n_currently_active" value="N" checked="'.$part5_16_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 220, $html, '', 0, 0, true, 'L' );

//*........................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>17.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 226, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member<b> EVER</b> had removal, exclusion,<br>
rescission, or deportation proceedings initiated against<br>
him or her?
</div>";
$pdf->writeHTMLCell( 90, 0, 121, 226, $html, '', 0, 0, true, 'L' );

$part5_17_yes   = (showData('i_918a_part_5_processing_information_continued_17_removal_exclusion_resission') =='Y') ?'checked':'';
$part5_17_no    = (showData('i_918a_part_5_processing_information_continued_17_removal_exclusion_resission') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_17_y_currently_active" value="Y" checked="'.$part5_17_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_17_n_currently_active" value="N" checked="'.$part5_17_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 173, 240, $html, '', 0, 0, true, 'L' );

/********************************
******** End Page No 6 **********
*********************************/

/********************************
******** Start Page No 7 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );
$html = '<div><b>Part 5. Processing Information </b> (continued) </div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );

//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>18.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 26, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member<b> EVER</b> been removed, excluded, <br>
or deported from the United States?
</div>";
$pdf->writeHTMLCell( 90, 0, 21, 26, $html, '', 0, 0, true, 'L' );

$part5_18_yes   = (showData('i_918a_part_5_processing_information_continued_18_deported_from_the_united_state') =='Y') ?'checked':'';
$part5_18_no    = (showData('i_918a_part_5_processing_information_continued_18_deported_from_the_united_state') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_18_y_currently_active" value="Y" checked="'.$part5_18_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_18_n_currently_active" value="N" checked="'.$part5_18_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 31, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>19.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 37, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member<b> EVER</b> been ordered to be <br>
removed, excluded, or deported from the United States?
</div>";
$pdf->writeHTMLCell( 90, 0, 21, 37, $html, '', 0, 0, true, 'L' );

$part5_19_yes   = (showData('i_918a_part_5_processing_information_continued_19') =='Y') ?'checked':'';
$part5_19_no    = (showData('i_918a_part_5_processing_information_continued_19') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_19_y_currently_active" value="Y" checked="'.$part5_19_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_19_n_currently_active" value="N" checked="'.$part5_19_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 45, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>20.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 49.5, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member<b> EVER</b> been denied a visa or  <br>
denied admission to the United States?
</div>";
$pdf->writeHTMLCell( 90, 0, 21, 49.5, $html, '', 0, 0, true, 'L' );

$part5_20_yes   = (showData('i_918a_part_5_processing_information_continued_20') =='Y') ?'checked':'';
$part5_20_no    = (showData('i_918a_part_5_processing_information_continued_20') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_20_y_currently_active" value="Y" checked="'.$part5_20_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_20_n_currently_active" value="N" checked="'.$part5_20_no.'" />   No
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 57, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>21.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 62, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member<b> EVER</b> been granted voluntary<br>
departure by an immigration officer or an immigration<br>
judge and failed to depart within the allotted time?
</div>";
$pdf->writeHTMLCell( 90, 0, 21, 62, $html, '', 0, 0, true, 'L' );

$part5_21_yes   = (showData('i_918a_part_5_processing_information_continued_21') =='Y') ?'checked':'';
$part5_21_no    = (showData('i_918a_part_5_processing_information_continued_21') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_21_y_currently_active" value="Y" checked="'.$part5_21_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_21_n_currently_active" value="N" checked="'.$part5_21_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 75, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>22.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 81, $html, '', 0, 0, true, 'L' );
$html = "<div>Is your family member<b> NOW</b> under a final order or civil<br>
penalty for violating section 274C of the INA (producing<br>
and/or using false documentation to unlawfully satisfy a<br>
requirement of the INA)?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 81, $html, '', 0, 0, true, 'L' );

$part5_22_yes   = (showData('i_918a_part_5_processing_information_continued_22') =='Y') ?'checked':'';
$part5_22_no    = (showData('i_918a_part_5_processing_information_continued_22') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_22_y_currently_active" value="Y" checked="'.$part5_22_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_22_n_currently_active" value="N" checked="'.$part5_22_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 95, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>23.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 101.5, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member<b> EVER</b>, by fraud or willful<br>
misrepresentation of a material fact, sought to procure or<br>
procured a visa or other documentation, for entry into the<br>
United States or any immigration benefit?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 101.5, $html, '', 0, 0, true, 'L' );

$part5_23_yes   = (showData('i_918a_part_5_processing_information_continued_23') =='Y') ?'checked':'';
$part5_23_no    = (showData('i_918a_part_5_processing_information_continued_23') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_23_y_currently_active" value="Y" checked="'.$part5_23_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_23_n_currently_active" value="N" checked="'.$part5_23_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 119, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>24.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 125, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member <b>EVER </b>left the United States to<br>
avoid being drafted into the U.S. Armed Forces or U.S.<br>
Coast Guard?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 125, $html, '', 0, 0, true, 'L' );

$part5_24_yes   = (showData('i_918a_part_5_processing_information_continued_24') =='Y') ?'checked':'';
$part5_24_no    = (showData('i_918a_part_5_processing_information_continued_24') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_24_y_currently_active" value="Y" checked="'.$part5_24_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_24_n_currently_active" value="N" checked="'.$part5_24_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 135, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>25.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 141, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member <b>EVER</b> been a J nonimmigrant<br>
exchange visitor who was subject to the 2-year foreign<br>
residence requirement and not yet complied with that<br>
requirement or obtained a waiver of such?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 141, $html, '', 0, 0, true, 'L' );

$part5_25_yes   = (showData('i_918a_part_5_processing_information_continued_25') =='Y') ?'checked':'';
$part5_25_no    = (showData('i_918a_part_5_processing_information_continued_25') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_25_y_currently_active" value="Y" checked="'.$part5_25_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_25_n_currently_active" value="N" checked="'.$part5_25_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 160, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>26.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 166, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member <b>EVER</b> detained, retained, or<br>
withheld the custody of a child, having a lawful claim to<br>
United States citizenship, outside the United States from a<br>
United States citizen granted custody?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 166, $html, '', 0, 0, true, 'L' );

$part5_26_yes   = (showData('i_918a_part_5_processing_information_continued_26') =='Y') ?'checked':'';
$part5_26_no    = (showData('i_918a_part_5_processing_information_continued_26') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_26_y_currently_active" value="Y" checked="'.$part5_26_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_26_n_currently_active" value="N" checked="'.$part5_26_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 184, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>27.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 188, $html, '', 0, 0, true, 'L' );
$html = "<div>Does your family member plan to practice polygamy in
the United States?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 188, $html, '', 0, 0, true, 'L' );

$part5_27_yes   = (showData('i_918a_part_5_processing_information_continued_27') =='Y') ?'checked':'';
$part5_27_no    = (showData('i_918a_part_5_processing_information_continued_27') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_27_y_currently_active" value="Y" checked="'.$part5_27_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_27_n_currently_active" value="N" checked="'.$part5_27_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 193, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>28.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 198.5, $html, '', 0, 0, true, 'L' );
$html = "<div>Has your family member <b>EVER </b>entered the United States<br>
as a stowaway?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 198.5, $html, '', 0, 0, true, 'L' );

$part5_28_yes   = (showData('i_918a_part_5_processing_information_continued_28') =='Y') ?'checked':'';
$part5_28_no    = (showData('i_918a_part_5_processing_information_continued_28') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_28_y_currently_active" value="Y" checked="'.$part5_28_yes.'" />  Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_28_n_currently_active" value="N" checked="'.$part5_28_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 205, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>29.a.  &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 210, $html, '', 0, 0, true, 'L' );
$html = "<div>Does your family member <b>NOW</b> have a communicable<br>
disease of public health significance?

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 210, $html, '', 0, 0, true, 'L' );


$part5_29a_yes   = (showData('i_918a_part_5_processing_information_continued_29_a') =='Y') ?'checked':'';
$part5_29a_no    = (showData('i_918a_part_5_processing_information_continued_29_a') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_29a_y_currently_active" value="Y" checked="'.$part5_29a_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_29a_n_currently_active" value="N" checked="'.$part5_29a_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 216, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>29.b.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 12, 223, $html, '', 0, 0, true, 'L' );
$html = "<div>Does your family member <b>NOW </b>have or has your family<br>
member <b>EVER</b> had a physical or mental disorder and<br>
behavior (or a history of behavior that is likely to recur)<br>
associated with the disorder which has posed or may pose<br>
a threat to the property, safety, or welfare of yourself or<br>
others? 

</div>";
$pdf->writeHTMLCell( 90, 0, 21, 223, $html, '', 0, 0, true, 'L' );

$part5_29b_yes   = (showData('i_918a_part_5_processing_information_continued_29_b') =='Y') ?'checked':'';
$part5_29b_no    = (showData('i_918a_part_5_processing_information_continued_29_b') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_29b_y_currently_active" value="Y" checked="'.$part5_29b_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_29b_n_currently_active" value="N" checked="'.$part5_29b_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 73, 247, $html, '', 0, 0, true, 'L' );
//*.....................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>29.c.   &nbsp; </b></div>";
$pdf->writeHTMLCell( 90, 0, 112, 18, $html, '', 0, 0, true, 'L' );
$html = "<div>Is your family member <b>NOW </b>or has your family member<br>
<b>EVER</b> been a drug abuser or drug addict?

</div>";
$pdf->writeHTMLCell( 90, 0, 121, 18, $html, '', 0, 0, true, 'L' );

$part5_29c_yes   = (showData('i_918a_part_5_processing_information_continued_29_c') =='Y') ?'checked':'';
$part5_29c_no    = (showData('i_918a_part_5_processing_information_continued_29_c') =='N') ?'checked':'';

$html = '<div><input type="checkbox" name="part5_29c_y_currently_active" value="Y" checked="'.$part5_29c_yes.'" />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part5_29c_n_currently_active" value="N" checked="'.$part5_29c_no.'" />   No 
</div>';
$pdf->writeHTMLCell( 60, 0,173, 27, $html, '', 0, 0, true, 'L' );



//*page 7 first column done......................
$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );
$html = "<div><b>Part 6. Information About Your Qualifying
Family Member's Spouse and/or Children</b></div>";
$pdf->writeHTMLCell( 90, 7, 113, 36, $html, 1, 1, true, false, 'L', true );

//*............................
$pdf->SetFont( 'times', '', 9.7 );
$html = "<div>Provide the following information about your family member's<br>
spouse and/or children. If you need extra space to complete this<br>
section, use the space provided in <b>Part 11. Additional<br>
Information.</b>

</div>";
$pdf->writeHTMLCell( 90, 0, 112, 49, $html, '', 0, 0, true, 'L' );

//*...................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 67, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 69 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 76, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 78 );

// //*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 5, 112, 87, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_1c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 87 );
// //*.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>2. &nbsp;&nbsp;&nbsp; </b>Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 112, 96, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_2', 28, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 175, 96 );
// // //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.   </b>&nbsp;&nbsp; Country of Birth</div>';
$pdf->writeHTMLCell( 50, 0, 112, 104, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_3', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 110 );
// //*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.   </b>&nbsp; &nbsp; Relationship</div>';
$pdf->writeHTMLCell( 90, 0, 112, 118, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_4', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 124 );

//*..............................
$pdf->writeHTMLCell( 90, 0, 113, 126.4, "", 'B', 0, 0, true, 'L' );
//*.....................................................................................................................>>>>>

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 133, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_5a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 135 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 141.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_5b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 143.5 );

// // //*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 5, 112, 152, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_5c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 152 );

// //*.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>6. &nbsp;&nbsp;&nbsp; </b>Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 112, 160, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_6', 28, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 175, 160 );
// // // //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.   </b>&nbsp;&nbsp; Country of Birth</div>';
$pdf->writeHTMLCell( 50, 0, 112, 166, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_7', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 172 );
// //*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>8.   </b>&nbsp; &nbsp; Relationship</div>';
$pdf->writeHTMLCell( 90, 0, 112, 178, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_8', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 184 );

//*..............................
$pdf->writeHTMLCell( 90, 0, 113, 186, "", 'B', 0, 0, true, 'L' );
//*.....................................................................................................................>>>>>
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>9.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 192.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_9a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 194.5 );
//* ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>9.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 5, 112, 201.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_9b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 203.5 );

// //*.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>9.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 5, 112, 212, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_9c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 212 );

// //*.................
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>10. &nbsp;&nbsp;&nbsp; </b>Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 112, 220.5, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_10', 28, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 175, 220.5 );
// //*..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>11.   </b>&nbsp;&nbsp; Country of Birth</div>';
$pdf->writeHTMLCell( 50, 0, 112, 228, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_11', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 234 );
// //*....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>12.   </b>&nbsp; &nbsp; Relationship</div>';
$pdf->writeHTMLCell( 90, 0, 112, 240, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part6_12', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 246 );

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
$html = "<div><b>Part 7. Petitioner's Statement, Contact
Information, Declaration, and Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 13, 18, $html, 1, 1, true, 'L' );
//*.................
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-918 <br>
Instructions before completing this part</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 29, $html, '', 0, 0, true, 'L' );
//*..............
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Statement</i></b></div>";
$pdf->writeHTMLCell( 92, 7, 13, 39.6, $html, '', 1, true, false, 'L', true );
//*...................

$pdf->SetFont( 'times', '', 9.7 );
$html = "<div><b>NOTE:</b> Select the box for either <b> Item Number 1.a.</b> or <b> 1.b.</b>
If applicable, select the box for <b> Item Number 2.</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 12, 46, $html, '', 0, 0, true, 'L' );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

$part7_1a_check = (showData('i_918a_prat_7_petitioner_statement')=='Y')?'checked':'';


$html = '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="part_7_1a" value="1" checked="'.$part7_1a_check.'" /></div>';
$pdf->writeHTMLCell( 93, 12, 12, 56, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I can read and understand English, and I have read <br>
and understand every question and instruction on <br>
this supplement and my answer to every question.</div>';
$pdf->writeHTMLCell( 90, 12, 26, 56, $html, 0, 1, 0, true, 'L', false, false );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$part7_1b_check = (showData('i_918a_prat_7_petitioner_statement_1_b')=='Y')?'checked':'';

$html = '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="part_7_1b" value="1" checked="'.$part7_1b_check.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 70, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>The interpreter named in <b>Part 9.</b> read to me every <br>
question and instruction on this supplement and my <br>
answer to every question in</div>';
$pdf->writeHTMLCell( 90, 5, 26, 70, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 86.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','

$part7_1b_answer = showData('i_918a_petitioner_info_language_name');

$pdf->writeHTMLCell( 76, 7, 26, 83, " $part7_1b_answer", 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell( 76, 5, 26, 89, $html, 0, 0, false, 'L' );

//*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$part7_2_check = (showData('i_918a_part_7_petitioner_statement_2')=='Y')?'checked':'';

$html = '<div><b>2.  </b> &nbsp; <input type="checkbox" name="part_7_2" value="1" checked="'.$part7_2_check.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 12, 100, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>At my request, the preparer named in <b>Part 10.</b>,</div>';
$pdf->writeHTMLCell( 90, 5, 26, 100, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 101.5, 107.6, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$part7_2_answer = showData('i_918a_petitioner_info_statement_preparer_named');
$pdf->writeHTMLCell( 76, 7, 26, 104.5, " $part7_2_answer", 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>prepared this supplement for me based only upon
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
$pdf->TextField( 'i_918a_petitioner_daytime_tel', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 139 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>4.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 146.5, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 146.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'i_918a_petitioner_mobile', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 153 );
//*............ */
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>5.</b></div>';
$pdf->writeHTMLCell( 35, 0, 12, 160, $html, 0, 1, false, false, 'J', true );
$html = "<div>Petitioner's Email Address (if any)</div>";
$pdf->writeHTMLCell( 90, 3, 20, 160, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'i_918a_petitioner_email', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 167 );
//*..................
$pdf->SetFont( 'times', '', 9.9 );
$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Declaration and Certification</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 12.5, 178, $html, '', 1, true, false, 'L', true );
//*.............

$pdf->SetFont( 'times', '', 9.8 );
$html = '<div>Copies of any documents I have submitted are exact
photocopies<br>of unaltered, original documents, and I understand
that USCIS<br>may require that I submit original documents to
USCIS at a later<br>date. Furthermore, I authorize the release of
any information<br>from any of my records that USCIS may need
to determine my<br>eligibility for the immigration benefit I seek.
<br><br>
I further authorize release of information contained in this<br>
supplement, in supporting documents, and in my USCIS records <br>to
other entities and persons where necessary for the<br>
administration and enforcement of U.S. immigration laws.
</div>';
$pdf->writeHTMLCell( 97, 10, 12.5, 186, $html, 0, 1, 0, true, 'L', false, false );

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
contained in, and submitted with, my supplement; 
</div>';
$pdf->writeHTMLCell( 85, 10, 120, 38, $html, 0, 1, 0, true, 'L', false, false );
//*.............

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div> <b>2)</b>&nbsp;&nbsp;  I reviewed and understood all of the information in,<br>
and submitted with, my supplement; and 
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
my supplement and any document submitted with it were
provided or authorized by me, that I reviewed and understand
all of the information contained in, and submitted with, my
supplement, and that all of this information is complete, true,
and correct
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 66, $html, 0, 1, 0, true, 'L', false, false );

//*..................

$pdf->SetFontSize( 11.6 );
$html = "<div><b><i>Petitioner's Signature</i></b></div>";
$pdf->writeHTMLCell( 91.5, 7, 112.5, 92, $html, '', 1, true, false, 'L', true );

//*......
$pdf->setFont( 'Times', '', 10 );
$html = "<div><b>6.a. </b> &nbsp;  Petitioner's Signature (sign in ink)</div>";
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
$pdf->TextField('i_918a_petitioner_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 174, 116 );
//*.........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE TO ALL PETITIONERS:</b>  If you do not completely
fill out this supplement or fail to submit required documents
listed in the Instructions, USCIS may deny your supplement.
</div>';
$pdf->writeHTMLCell( 95, 10, 112.5, 125, $html, 0, 1, 0, true, 'L', false, false );
//*.............
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', '', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//* set cell padding
$pdf->SetFontSize( 11.6 );
$html = "<div><b>Part 8. Qualifying Family Member's Statement,
Contact Information, Declaration, and Signature</b></div>";
$pdf->writeHTMLCell( 92, 2, 113, 142, $html, 1, 1, true, 'L' );
//*....................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE:</b> Read the <b>Penalties</b> section of the Form I-918
Instructions before completing this part.
</div>';
$pdf->writeHTMLCell( 95, 10, 112, 154, $html, 0, 1, 0, true, 'L', false, false );
//*...........................
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'times', 'BI', 12 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
$pdf->SetFontSize( 11.6 );
$html = "<div>Qualifying Family Member's Statement</div>";
$pdf->writeHTMLCell( 92, 2, 113, 166, $html, '', 1, true, 'L' );
//*...........................

//*.................
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> Select the box for either <b>Item Number 1.a.</b> or<b> 1.b.</b> If
applicable, select the box for <b>Item Number 2.</b></b>
 </div>";
$pdf->writeHTMLCell( 95, 0, 112, 173, $html, '', 0, 0, true, 'L' );

// //*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing

$part8_1a_check = (showData('i_918a_petitioner_info_part8_1a')=='Y')?'checked':'';

$html = '<div><b>1.a.  </b> &nbsp; <input type="checkbox" name="part_8_1a2" value="1" checked="'.$part8_1a_check.'" /></div>';
$pdf->writeHTMLCell( 93, 12, 112, 185, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>I can read and understand English, and I have read <br>
and understand every question and instruction on <br>
this petition and my answer to every question.</div>';
$pdf->writeHTMLCell( 90, 12, 126, 185, $html, 0, 1, 0, true, 'L', false, false );

// //*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// reset font spacing
$part8_1b_check = (showData('i_918a_petitioner_info_part8_1b')=='Y')?'checked':'';

$html = '<div><b>1.b.  </b> &nbsp; <input type="checkbox" name="part_8_1b2" value="1" checked="'.$part8_1b_check.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 112, 200, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>The interpreter named in <b>Part 9.</b> read to me every <br>
question and instruction on this supplement and my <br>
answer to every question in</div>';
$pdf->writeHTMLCell( 90, 5, 126, 200, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 201.3, 216, ',', 0, 1, 0, true, 'L', false, false );
//for comma ','
$part8_1b_ans = showData('i_918a_petitioner_info_part8_1b_answer');

$pdf->writeHTMLCell( 76, 7, 126, 213, " $part8_1b_ans", 1, 0, false, 'L' );
//  this is the empty  cell
$html = '<div>a language in which I am fluent, and I understood
everything.</div>';
$pdf->writeHTMLCell( 76, 5, 126, 221, $html, 0, 0, false, 'L' );

// //*..................
$pdf->setFont( 'Times', '', 10 );
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFontSpacing( 0.05 );
// // reset font spacing
$part8_2_check = (showData('i_918a_petitioner_info_part8_2')=='Y')?'checked':'';

$html = '<div><b>2.  </b> &nbsp; <input type="checkbox" name="part_8_2c2" value="1" checked="'.$part8_2_check.'" /></div>';
$pdf->writeHTMLCell( 93, 5, 112, 230, $html, 0, 1, 0, true, 'L', false, false );
$html = '<div>At my request, the preparer named in <b>Part 10.</b>,</div>';
$pdf->writeHTMLCell( 90, 5, 126, 230, $html, 0, 1, 0, true, 'L', false, false );
$pdf->writeHTMLCell( 78, 5, 201.5, 238, ',', 0, 1, 0, true, 'L', false, false );
// //for comma ','

$part8_2_ans = showData('i_918a_petitioner_info_part8_2_answer');

$pdf->writeHTMLCell( 76, 7, 126, 235.5, " $part8_2_ans", 1, 0, false, 'L' );
// //  this is the empty  cell
$html = '<div>prepared this supplement for me based only upon
information I provided or authorized.</div>';
$pdf->writeHTMLCell( 76, 5, 126, 242, $html, 0, 0, false, 'L' );

/********************************
******** End Page No 8 **********
*********************************/

/********************************
******** Start Page No 9 ********
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', '', 13);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= "<div><b>Part 8. Qualifying Family Member's Statement,
Contact Information, Declaration, and Signature </b> (Continued)</div>";
$pdf->writeHTMLCell(91, 7, 13, 17, $html, 1, 1, true, 'L');
//............
//...........
$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(11.6); // set font
$html= "<div>Qualifying Family Member's Contact Information </div>";
$pdf->writeHTMLCell(91, 7, 13, 37, $html, 0, 1, true, 'L');
//......

$pdf->setFont('Times', '', 10);
$html = "<div><b>3. </b>  &nbsp; Qualifying Family Member's Daytime Telephone Number</div>";
$pdf->writeHTMLCell(95, 7, 12, 44, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_3_telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),20, 49.5);
//.........

$pdf->setFont('Times', '', 10);
$html = "<div><b>4. </b> &nbsp; Qualifying Family Member's Mobile Telephone Number<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(if any)</div>";
$pdf->writeHTMLCell(95, 7, 12, 57, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_4_Telephone', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 67);
//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>5. </b>  &nbsp; Qualifying Family Member\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(95, 7, 12, 75, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('part8_5_email', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),20,81);

//......

$pdf->setFillColor(220, 220, 220); 
$pdf->setFont('Times', 'BI', 13);
$pdf->setCellHeightRatio(1.2);
$pdf->setCellPaddings(1, 1, 1, 1); // set cell padding
$pdf->SetFontSize(12); // set font
$html= "<div>Qualifying Family Member's Declaration and Certification</div>";
$pdf->writeHTMLCell(90, 7, 13, 91, $html, 0, 1, true, 'L');
// //.........
$pdf->SetFont('times', '', 10); // set font
$html = 'Copies of any documents I have submitted are exact
photocopies of unaltered, original documents, and I understand
that USCIS may require that I submit original documents to
USCIS at a later date. Furthermore, I authorize the release of
any information from any of my records that USCIS may need
to determine my eligibility for the immigration benefit I seek';
$pdf->writeHTMLCell(95, 7, 12, 104, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I further authorize release of information contained in this
supplement, in supporting documents, and in my USCIS records
to other entities and persons where necessary for the
administration and enforcement of U.S. immigration laws. Any
disclosure shall be in accordance with 8 U.S.C. section 1367
and 8 CFR 214.14(e).';
$pdf->writeHTMLCell(95, 7, 12, 132, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I understand that USCIS may require me to appear for an
appointment to take my biometrics (fingerprints, photograph,
and/or signature) and, at that time, if I am required to provide
biometrics, I will be required to sign an oath reaffirming that:';
$pdf->writeHTMLCell(95, 7, 12, 159, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 9.9); // set font
$html = '<b>1)</b>  I provided or authorized all of the information<br>
contained in, and submitted with, my supplement; 
<br><b>2)</b>  I reviewed and understood all of the information in,<br>
and submitted with, my supplement; and 
<br><b>3)</b> All of this information was complete, true, and<br> correct
at the time of filing.';
$pdf->writeHTMLCell(95, 7, 23, 177, $html, '', 0, 0, true, 'L');


$pdf->SetFont('times', '', 10); // set font
$html = 'I certify, under penalty of perjury, that all of the information in
my supplement and any document submitted with it were
provided or authorized by me, that I reviewed and understand
all of the information contained in, and submitted with, my
supplement, and that all of this information is complete, true,
and correct.';
$pdf->writeHTMLCell(95, 7, 12, 205, $html, '', 0, 0, true, 'L');



//?right column................
$pdf->SetFont('times', 'I', 12);
$html ="<div><b>Qualifying Family Member's Signature</b></div>";
$pdf->writeHTMLCell(91, 7, 113, 17, $html, 0, 0, true, false, 'L', false);

//.............

$pdf->SetFont('times', '', 10);
$html ="<div><b>6.a.  </b> Qualifying Family Member's Signature (sign in ink)</div>";
$pdf->writeHTMLCell(90, 7, 112, 24, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 121, 30, "", 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>6.b.  </b> Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 112, 39, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('part8_6b', 30, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),174, 40);

//.........

$pdf->SetFont('times', '', 10);
$html ='<div><b>NOTE TO ALL QUALIFYING FAMILY MEMBERS:</b> If<br>
you do not completely fill out this supplement or fail to submit<br>
required documents listed in the Instructions, USCIS may deny<br>
your supplement.</div>';
$pdf->writeHTMLCell(95, 10, 112, 49, $html, 0, 0, false, true, 'L', false);
//..........

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 9. Interpreter\'s Contact Information,
Certification, and Signature</b></div>';
$pdf->writeHTMLCell(91, 12, 113, 68, $html, 1, 0, true, false, 'L', false);
//...........


$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information about the interpreter.</div>';
$pdf->writeHTMLCell(91, 5, 112, 81, $html, 0, 0, false, true, 'L', false);
//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Interpreter\'s Full Name</b></div>';
$pdf->writeHTMLCell(91, 6, 113, 87, $html, 0, 0, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b> Interpreter\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 112, 94, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_interpreter_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 100);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b> Interpreter\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(92, 7, 112, 108, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_interpreter_family_given_first_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 114);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b> &nbsp; Interpreter\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 121, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_interpreter_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 120, 127);
//............
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Interpreter\'s Mailing Address </b></div>';
$pdf->writeHTMLCell(91, 6, 113, 136, $html, 0, 0, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(30, 7, 112, 141, $html, '', 0, 0, true, 'L'); 
$html = '<div> Street Number and Name</div>';
$pdf->writeHTMLCell(25, 7, 118, 142, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_interpreter_mailing_address_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 145);

$part9_3b_apt = (showData('i_918a_interpreter_mailing_address_apt_ste_flr')=='apt')?'checked':'';
$part9_3b_ste = (showData('i_918a_interpreter_mailing_address_apt_ste_flr')=='ste')?'checked':'';
$part9_3b_flr = (showData('i_918a_interpreter_mailing_address_apt_ste_flr')=='flr')?'checked':'';

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="part9_3bApt" value="Apt" checked="'.$part9_3b_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="part9_3bSte" value="Ste" checked="'.$part9_3b_ste.'" />Ste. 
<input type="checkbox" name="part9_3bFlr" value="Flr" checked="'.$part9_3b_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 153, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mailing_address_apt_ste_flr_value', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 154);


$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 162, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mailing_address_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 163);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> 3.e.</b>&nbsp;&nbsp; ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 171, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="i_918a_interpreter_mailing_address_state" size="0.25">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 171, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 172);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 180, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mailing_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 181);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 190, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mailing_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 190);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 197, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 203);

//............
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Interpreter\'s Contact Information</b></div>';
$pdf->writeHTMLCell(90, 6, 113, 212, $html, 0, 0, true, false, 'L', false);
//.............
$pdf->SetFont('Times', '', 10); // set font
$html = '<div><b>4. </b>  Interpreter\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 0, 112, 220, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_daytime_tel', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 226);
//................
$pdf->SetFont('Times', '', 10); // set font
$html = "<div><b>5. </b>  Interpreter's Mobile Telephone Number (if any)</div>";
$pdf->writeHTMLCell(90, 0, 112, 233, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_mobile', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 239);
//*............
$pdf->SetFont('Times', '', 10); // set font
$html = "<div><b>6. </b>  Interpreter's Email Address (if any)</div>";
$pdf->writeHTMLCell(90, 0, 112, 246, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_email', 86, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 253);

/********************************
******** End Page No 9 **********
*********************************/

/********************************
******** Start Page No 10 *******
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->SetFont('times', '', 12);
$html ='<div><b>Part 9. Interpreter\'s Contact Information,
Certification, and Signature</b> (continued)</div>';
$pdf->writeHTMLCell(91, 12, 13, 17, $html, 1, 0, true, false, 'L', false);
//...........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Interpreter\'s Certification</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 31, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 11);
$html ='<div>I certify, under penalty of perjury, that:</div>';
$pdf->writeHTMLCell(91, 6, 12, 38, $html, 0, 0, false, false, 'L', false);
//............

$pdf->SetFont('Times', '', 10); // set font
$html = '<div>I am fluent in English and</div>';
$pdf->writeHTMLCell(90, 5, 12, 45, $html, 0, 0, false, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_interpreter_certification_language_skill', 50, 6, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 54, 45.4);
//*>>>>>>>>>>>>>>>>
$pdf->SetFont('Times', '', 10); // set font
$html = '<div>,</div>';
$pdf->writeHTMLCell(90, 20, 102.9,47.6, $html, 0, 0, false, 'L');

$pdf->SetFont('Times', '', 10); // set font
$html = "<div>which is the same language specified in <b>Part 7., Item Number
1.b.</b>, and <b>Part 8. Item Number 1.b.</b>, and I have read to this
petitioner and qualifying family member in the identified
language(s) every question and instruction on this supplement
and the petitioner's and qualifying family member's answer to
every question. The petitioner and qualifying family member
informed me that they understand every instruction, question,
and answer on the supplement, including the <b>Petitioner's
Declaration and Certification and the Qualifying Family
Member's Declaration and Certification</b>, and have verified
the accuracy of every answer.</div>";
$pdf->writeHTMLCell(95, 20, 12, 51, $html, 0, 0, false, 'L');
//..........

$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Interpreter\'s Signature</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 102, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.a.  </b> Interpreter\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell(90, 7, 12, 110, $html, 0, 1, false, true, 'J', true);
$pdf->writeHTMLCell(83, 7, 21, 115, "", 1, 1, false, true, 'J', true);
//........

$pdf->SetFont('times', '', 10);
$html ='<div><b>7.b.  </b> Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell(90, 7, 12, 125, $html, 0, 1, false, true, 'J', true);
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_interpreter_sign_date', 30, 7,array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),74, 125);

//.........

$pdf->SetFont('times', '', 11.6);
$html ='<div><b>Part 10. Contact Information, Declaration, and
Signature of the Person Preparing this Petition, if
Other Than the Petitioner or Qualifying Family
Member</b></div>';
$pdf->writeHTMLCell(92, 12, 13, 136, $html, 1, 0, true, false, 'L', false);
//...........

$pdf->SetFont('times', '', 10);
$html ='<div>Provide the following information about the preparer.</div>';
$pdf->writeHTMLCell(90, 7, 12, 157, $html, 0, 1, false, true, 'J', true);

//...........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Preparer\'s Full Name</b></div>';
$pdf->writeHTMLCell(91, 6, 13, 164, $html, 0, 0, true, false, 'L', false);
//............

$pdf->SetFont('times', '', 10);
$html = '<div><b>1.a. </b> Preparer\'s Family Name (Last Name)</div>';
$pdf->writeHTMLCell(90, 7, 12, 174, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_family_last_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 179.5);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>1.b. </b> Preparer\'s Given Name (First Name)</div>';
$pdf->writeHTMLCell(92, 7, 12, 189, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_family_given_first_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 195);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>2.  </b> &nbsp; Preparer\'s Business or Organization Name (if any)</div>';
$pdf->writeHTMLCell(90, 7, 12, 203, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_business_name', 83, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 20, 209);

//.............Page 10 left side end .......................................

//............
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Preparer\'s Mailing Address </b></div>';
$pdf->writeHTMLCell(91, 6, 113, 17, $html, 0, 0, true, false, 'L', false);
//.............

$pdf->SetFont('times', '', 10);
$html = '<div><b>3.a. </b></div>';
$pdf->writeHTMLCell(30, 7, 112, 23, $html, '', 0, 0, true, 'L'); 
$html = '<div> Street Number and Name</div>';
$pdf->writeHTMLCell(25, 7, 118, 23, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_mailing_address_street_number', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 145, 25);
//..........

$part10_3b_apt = (showData('i_918a_preparer_mailing_address_apt_ste_flr')=='apt')?'checked':'';
$part10_3b_ste = (showData('i_918a_preparer_mailing_address_apt_ste_flr')=='ste')?'checked':'';
$part10_3b_flr = (showData('i_918a_preparer_mailing_address_apt_ste_flr')=='flr')?'checked':'';

$pdf->SetFont('times', '', 10); // set font
$html= '<div><b>3.b. </b>&nbsp; &nbsp; 
<input type="checkbox" name="Apt10" value="Apt" checked="'.$part10_3b_apt.'" />Apt. &nbsp;&nbsp;
<input type="checkbox" name="Ste10" value="Ste" checked="'.$part10_3b_ste.'" />Ste. 
<input type="checkbox" name="Flr10" value="Flr" checked="'.$part10_3b_flr.'" /> Flr.</div>';
$pdf->writeHTMLCell(60, 0, 112, 34, $html, '', 0, 0, true, 'L');
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_preparer_mailing_address_apt_ste_flr_value', 40, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 163, 34);

//..............
$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.c.</b> &nbsp;&nbsp;City or Town';
$pdf->writeHTMLCell(50, 0, 112, 43, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_preparer_mailing_address_city_town', 58, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 43);

$pdf->SetFont('times', '', 10); // set font
$html = '<b>3.d.</b> &nbsp; &nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> 3.e.</b>&nbsp;&nbsp; ZIP Code';
$pdf->writeHTMLCell(60, 0, 112, 52, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font

$html = '<select name="i_918a_preparer_mailing_address_state" size="0.50">';
foreach($allDataCountry as $record){
	$html .= '<option value="'.$record->state_code.'">'.$record->state_code.' </option>';
}
$html .= '</select>';
$pdf->writeHTMLCell(25, 0, 129.5, 52, $html, '', 0, 0, true, 'L');

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_preparer_mailing_address_zip_code', 33, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),169.5, 52);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.f.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell(50, 0, 112, 61, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_preparer_mailing_address_province', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 61);

$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.g.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell(50, 0, 112, 70, $html, '', 0, 0, true, 'L'); 

$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_preparer_mailing_address_postal_code', 57.5, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(),145, 70);


$pdf->SetFont('Times', '', 10); // set font
$html = '<b>3.h.</b> &nbsp;&nbsp;Country';
$pdf->writeHTMLCell(50, 0, 112, 76, $html, '', 0, 0, true, 'L'); 
$pdf->SetFont('courier', 'B', 10); // set font
$pdf->TextField('i_918a_preparer_mailing_address_country', 81, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 121.5, 82);

//..........
$pdf->SetFont('times', 'I', 12);
$html ='<div><b>Preparer\'s Contact Information</b></div>';
$pdf->writeHTMLCell(91, 7, 113, 92, $html, 0, 0, true, false, 'L', false);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>3.  </b>   Preparer\'s Daytime Telephone Number</div>';
$pdf->writeHTMLCell(90, 7, 112, 100, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_daytime_tel', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 106);

//.............
$pdf->SetFont('times', '', 10);
$html = '<div><b>4.  </b>  Preparer\'s Mobile Telephone Number (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 115, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_mobile', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 121);
//...........
$pdf->SetFont('times', '', 10);
$html = '<div><b>5.  </b>  Preparer\'s Email Address (if any)</div>';
$pdf->writeHTMLCell(90, 7, 112, 130, $html, 0, 0, false, 'L');
$pdf->SetFont('courier', 'B', 10);
$pdf->TextField('i_918a_preparer_email', 85, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 118, 136);
//..........

//..........
$pdf->SetFont('times', 'I', 12);
$pdf->setCellHeightRatio( 1.2 );
$html ='<div><b>Preparer\'s Statement</b></div>';
$pdf->writeHTMLCell(90, 7, 113, 145, $html, 0, 0, true, false, 'L', false);
//..........
$pdf->SetFont('times', '', 10);

$part10_7a = (showData('i_918a_preparer_statement_7a')=='Y')?'checked':'';

$html = '<div><b>7.a. </b> <input type="checkbox" name="part10_7a" value="Y" checked="'.$part10_7a.'" /></div>';
$pdf->writeHTMLCell(20, 7, 112, 152, $html, 0, 0, false, 'L');
$html = "<div>I am not an attorney or accredited representative but
have prepared this supplement on behalf of the
petitioner and qualifying family member and with the
petitioner's and qualifying family member's consent.</div>";
$pdf->writeHTMLCell(84, 7, 124, 152, $html, 0, 0, false, 'L');
//..........
$part10_7b = (showData('i_918a_preparer_statement_7b')=='Y')?'checked':'';

$html = '<div><b>7.b. </b><input type="checkbox" name="part10_7b" value="Y" checked="'.$part10_7b.'" /></div>';
$pdf->writeHTMLCell(20, 7, 112, 172, $html, 0, 0, false, 'L');

if(showData('i_918a_preparer_statement_7b_extend')=="Y") $checkbox_extend_status = "checked";
else $checkbox_extend_status = "";
if(showData('i_918a_preparer_statement_7b_not_extend')=="Y") $checkbox_not_extend_status = "checked";
else $checkbox_not_extend_status = "";

$html = '<div> I am an attorney or accredited representative and my representation of the petitioner and qualifying family member in this case <input type="checkbox" name="i_918a_extends" value="Y" checked="'.$checkbox_extend_status.'" /> extends <input type="checkbox" name="i_918a_not_extends" value="Y" checked="'.$checkbox_not_extend_status.'" /> does not extend beyond the preparation of this supplement.</div>';
$pdf->writeHTMLCell(80, 7, 124, 172, $html, 0, 0, false, 'L');

$html = '<div><b>NOTE:</b> If you are an attorney or accredited
representative whose representation extends beyond
preparation of this supplement, you may be obliged to
submit a completed Form G-28, Notice of Entry of
Appearance as Attorney or Accredited Representative,
with this supplement.</div>';
$pdf->writeHTMLCell(83, 7, 124, 192, $html, 0, 0, false, 'L');
/* $pdf->setCellHeightRatio( 0 );
$pdf->writeHTMLCell(2.5, 2.5, 155, 182.5, "", 1, 0, false, 'L');
$pdf->writeHTMLCell(2.5, 2.5, 171, 182.5, "", 1, 0, false, 'L'); */

/********************************
******** End Page No 10 *********
*********************************/

/********************************
******** Start Page No 11 *******
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'Times', '', 12 );
$pdf->setCellHeightRatio( 1.2 );

$pdf->setFont( 'Times', '', 12 );
$html = '<div><b>Part 10. Contact Information, Declaration, and
Signature of the Person Preparing this Petition, if
Other Than the Petitioner or Qualifying Family
Member </b>(continued)</div>';
$pdf->writeHTMLCell( 95, 7, 13, 18,  $html,  1, 1, true, 'L' );

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
$pdf->writeHTMLCell(95, 7, 13, 42, $html, 0, 1, true, 'L');
//............
$pdf->setCellHeightRatio(1.2);
$pdf->setFont('Times', '', 10);
$html= "<div>By my signature, I certify, under penalty of perjury, that I
prepared this supplement at the request of the petitioner and
qualifying family member. The petitioner and qualifying family
member then reviewed this completed supplement and informed
me that they understand all of the information contained in, and
submitted with, this supplement, including the <b> Petitioner's
Declaration and Certification, and the Qualifying Family
Member's Declaration and Certification</b>, and that all of this
information is complete, true, and correct. I completed this
supplement based only on information that the petitioner and
qualifying family member provided to me or authorized me to
obtain or use.</div>";
$pdf->writeHTMLCell( 97, 25, 12, 51, $html, 0, 1, 0, true, 'L', false, false );
//.........

//...........
$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'Times', 'BI', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 1, 1, 1, 1 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div>Preparer\'s Signature</div>';
$pdf->writeHTMLCell( 92, 7, 13, 109, $html, 0, 1, true, 'L' );
//.....
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>8.a. </b> &nbsp;Preparer\'s Signature (sign in ink)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 117, $html, 0, 1, false, 'L' );
$pdf->writeHTMLCell( 83, 7, 22, 123, '', 1, 0, false, 'L' );
$pdf->setFont( 'Times', '', 10 );
//.............
$html = '<div><b>8.b. </b>&nbsp;
Date of Signature (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 92, 7, 12, 134, $html, 0, 1, false, 'L' );
$pdf->setFont( 'courier', 'B', 10 );
$pdf->TextField( 'i_918a_preparer_sign_date', 30, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 75, 134 );

/********************************
******** End Page No 11 *********
*********************************/

/********************************
******** Start Page No 12 *******
*********************************/

$pdf->AddPage('P', 'LETTER');

$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'Times', 'B', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 1, 1, 1, 1 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div>Part 11. &nbsp;Additional Information</div>';
$pdf->writeHTMLCell( 91, 6.5, 13, 19, $html, 1, 1, true, 'L' );
//........
$pdf->setCellHeightRatio( 1.2 );
$pdf->setFont( 'Times', '', 9.8 );
$html = '<div>If you need extra space to provide any additional information<br>
within this supplement, use the space below. If you need more<br>
space than what is provided, you may make copies of this page<br>
to complete and file with this supplement or attach a separate<br>
sheet of paper. Include your name and A-Number (if any) at the<br>
top of each sheet; indicate the <b>Page Number, Part Number</b>,<br>
and <b>Item Number</b> to which your answer refers; and sign and<br>
date each sheet.</div>';
$pdf->writeHTMLCell( 100, 10, 12, 28, $html, 0, 1, 0, true, 'L', false, false );


$pdf->setFillColor( 220, 220, 220 );
$pdf->setFont( 'Times', '', 13 );
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 1, 1, 1, 1 );
// set cell padding
$pdf->SetFontSize( 11.6 );
// set font
$html = '<div><i><b>Your Full Name</b> (Principal)</i></div>';
$pdf->writeHTMLCell( 91, 6, 13, 65.8, $html, '', 1, true, 'L' );


$pdf->setFont('Times', '', 10);
$html = '<div><b>1.a. </b> &nbsp; Family Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (Last Name)</div>';
$pdf->writeHTMLCell( 35, 7, 12, 73, $html, 0, 1, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_last_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 74);
//........
$pdf->setFont('Times', '', 10);
$html = '<div><b>1.b. </b> &nbsp; Given Name<br> &nbsp; &nbsp; &nbsp; &nbsp; (First Name)</div>';
$pdf->writeHTMLCell( 35, 7, 12, 81.3, $html, 0, 1, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_first_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 82.3);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>1.c. </b> &nbsp; Middle Name</div>';
$pdf->writeHTMLCell( 35, 7, 12, 90.5, $html, 0, 1, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_middle_name', 61, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 43, 90.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>2. </b> &nbsp;&nbsp;&nbsp; A-Number (if any) &nbsp;&nbsp;&nbsp;&nbsp; <b>A-</b></div>';
$pdf->writeHTMLCell(49, 7, 12, 99, $html, 0, 1, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_a_number', 46, 7, array('strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array(), 58, 99);

$pdf->Image('images/right_angle.jpg', 50, 100.6, 3.2, 3.2, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.a. </b>&nbsp;Page Number</div>';
$pdf->writeHTMLCell(32, 7, 12, 107, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'i_918a_additional_info_3a_page_no', 18.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 112);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 43, 107, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'i_918a_additional_info_3b_part_no', 18, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 54, 112);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.c. </b>&nbsp;Item Number</div>';
$pdf->writeHTMLCell( 30, 7, 75, 107, $html, 0, 0, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'i_918a_additional_info_3c_item_no', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 84, 112);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>3.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 12, 120, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_3d', 83.5, 64, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_918a_additional_info_3d')), 21, 121);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.a. </b>&nbsp;Page Number</div>';
$pdf->writeHTMLCell(32, 7, 12, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_4a_page_no', 18.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21, 192.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(32, 7, 43, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_4b_part_no', 18, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 54, 192.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(32, 7, 75, 187, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_4c_item_no', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 84, 192.5);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>4.d. </b></div>';
$pdf->writeHTMLCell(10, 7, 12, 200, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_4d', 83.5, 63.5, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>0, 'borderStyle'=>'solid'), array('v' => showData('i_918a_additional_info_4d')), 21, 201);

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.a. </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell( 32, 7, 111.3, 18, $html, 0, 0, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_5a_page_no', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120.4, 23 );

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell( 30, 7, 145, 18, $html, 0, 0, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_5b_part_no', 18, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 153, 23 );

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.c. </b>&nbsp;Item Number </div>';
$pdf->writeHTMLCell( 30, 7, 175, 18, $html, 0, 0, false, 'L' );
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_5c_item_no', 19.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 184, 23 );

//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>5.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 111.3, 30.4, $html, 0, 0, false, 'L' );
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('i_918a_additional_info_5d', 83, 65, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_918a_additional_info_5d')), 120.5, 31.5);

$pdf->setFont('Times', '', 10);
$html = '<div><b>6.a. </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(32, 7, 111.3, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'i_918a_additional_info_6a_page_no', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120.4, 104);
//.....

$pdf->setFont('Times', '', 10);
$html = '<div><b>6.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(30, 7, 145, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField( 'i_918a_additional_info_6b_part_no', 18, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 153, 104);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>6.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 175, 98, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_6c_item_no', 19.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 184, 104);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>6.d. </b> </div>';
$pdf->writeHTMLCell(10, 7, 111.3, 111, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('i_918a_additional_info_6d', 83, 62.5,array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_918a_additional_info_6d')), 120.5, 113);

$pdf->setFont('Times', '', 10);
$html = '<div><b>7.a. </b> &nbsp;Page Number</div>';
$pdf->writeHTMLCell(32, 7, 111.3, 178, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_7a_page_no', 20, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120.4, 183.5);
//.....

$pdf->setFont('Times', '', 10);
$html = '<div><b>7.b. </b>&nbsp;Part Number</div>';
$pdf->writeHTMLCell(32, 7, 144, 178, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10);
$pdf->TextField('i_918a_additional_info_7b_part_no', 18, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 153, 183.5);

//......

$pdf->setFont('Times', '', 10);
$html = '<div><b>7.c. </b>&nbsp;&nbsp;Item Number</div>';
$pdf->writeHTMLCell(30, 7, 175, 178, $html, 0, 0, false, 'L');
$pdf->setFont('courier', 'B', 10 );
$pdf->TextField('i_918a_additional_info_7c_item_no', 19.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 184, 183.5);
//.........

$pdf->setFont('Times', '', 10);
$html = '<div><b>7.d. </b> </div>';
$pdf->writeHTMLCell( 10, 7, 111.3, 191.5, $html, 0, 0, false, 'L' );
$pdf->setFont('courier', 'B', 10);

$pdf->TextField('i_918a_additional_info_7d', 83, 62, array('multiline'=>true, 'strokeColor' => array(64, 64, 64), 'lineWidth'=>1, 'borderStyle'=>'solid'), array('v' => showData('i_918a_additional_info_7d')), 120.5, 192);


$js = "
var fields = {
'Attorney_or_According_Representative':' $attorneyData->uscis_online_account_number',
'attorney_state_bar_number':' $attorneyData->bar_number',

'part1-Unmarried sibling under 18 years of age': ' ',
//*part-1 finished
'part2_1a_lastname':' ".showData('information_about_you_family_last_name')."',
'part2_1b_firstname':' ".showData('information_about_you_given_first_name')."',
'part2_1c_middlename':' ".showData('information_about_you_middle_name')."',
'part2_2_date_of_birth': ' ".showData('other_information_about_you_date_of_birth')."',
'part2_3_registration_Number': ' ".showData('other_information_about_you_alien_registration_number')."',
'part2_4_online_account': ' ".showData('other_information_about_you_uscis_online_account_number')."',
'part2-5_Approved': ' ".showData('')."',

'part3_1a_lastname': ' ".showData('information_about_your_qualifying_family_member_family_last_name')."',
'part3_1b_firstname': ' ".showData('information_about_your_qualifying_family_member_given_first_name')."',
'part3_1c_middlename': ' ".showData('information_about_your_qualifying_family_member_middle_name')."',

'part3_2a_lastname': ' ".showData('information_about_your_qualifying_family_member_other_family_last_name')."',
'part3_2b_firstname': ' ".showData('information_about_your_qualifying_family_member_other_given_first_name')."',
'part3_2c_middlename': ' ".showData('information_about_your_qualifying_family_member_other_middle_name')."',

'part3_3a_street_number': ' ".showData('information_about_your_qualifying_family_member_residence_street_number')."',
'part3_3b_apt_ste': ' ".showData('information_about_your_qualifying_family_member_residence_apt_ste_flr_number')."',
'part3_3c_city_town': ' ".showData('information_about_you_qualifying_family_member_city_town')."',
'part3_3d_state': ' ".showData('information_about_you_qualifying_family_member_state')."',
'part3_3e_zip_code': ' ".showData('information_about_your_qualifying_family_member_zip_code')."',

// page 2
'part3_4a_care_of_name':' ".showData('information_about_you_mailing_care_of_name')."',
'part3_4b_street_number': ' ".showData('information_about_you_mailing_street_number')."',
'part3_4c_apt_ste' :' ".showData('information_about_you_mailing_apt_ste_flr_value')."',
'part3_4d_city_town':' ".showData('information_about_you_mailing_city_town')."',
'part3_4e_state': ' ".showData('information_about_you_mailing_state')."',
'part3_4f_zip_code':' ".showData('information_about_you_mailing_zip_code')."',
'part3_4g_province':' ".showData('information_about_you_mailing_province')."',
'part3_4h_Postal_code':' ".showData('information_about_you_mailing_postal_code')."',
'part3_4i_Country':' ".showData('information_about_you_mailing_country')."',

'part3_5_A_Number': ' ".showData('other_information_about_you_alien_registration_number')."',
'part3_6_social_security': ' ".showData('other_information_about_you_social_security_number')."',
'part3_7_online_account': ' ".showData('other_information_about_you_uscis_online_account_number')."',
'part3_8_date_of_birth': ' ".showData('other_information_about_you_date_of_birth')."',
'part3_9_Country_of_birth': ' ".showData('other_information_about_you_country_of_birth')."',
'part3_10_Country_of_Citizenship': ' ".showData('other_information_about_you_country_of_citizen')."',

'part3_13_Arrival_Departure': ' ".showData('i_94_imgt_arrival_record_number')."',
'part3_14_Passport_number': ' ".showData('other_information_about_you_passport_number')."',
'part3_15_Travel_Document_Number': ' ".showData('other_information_about_you_travel_document_number')."',
'part3_16_Country_of_Issuance': ' ".showData('i_94_imgt_country_issuance_passport')."',
'part3_17_Date_of_Issuance': ' ".showData('i_94_imgt_date_issuance_passport')."',
'part3_18_Expiration_Date': ' ".showData('i_94_imgt_expiry_date_of_authorized')."',

'part4_1a_Date_of_LastEntry': ' ".showData('other_information_about_you_date_of_entry')."',
'part4_1b_city_or_town': ' ".showData('other_information_about_you_place_of_entry_city_town')."',
'part4_1c_state': ' ".showData('other_information_about_you_state')."',
'part4_1d_Current': ' ".showData('i_94_imgt_current_status')."',

'part4_2a_Date_of_LastEntry': ' ".showData('i_918a_additional_info_about_your_2a_date_of_last_entry')."',
'part4_2b_city_or_town': ' ".showData('i_918a_additional_information_about_your_2b_city_or_town')."',
'part4_2c_state': ' ".showData('additional_information_about_your_qualifying_family_member_states')."',
'part4_2d_Date': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_authorized_stay_expired')."',
'part4_2e_Status': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_status_at_the_time_of_entry')."',

// page 3
'part4_3b_city_or_town': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town2')."',
'part4_3c_state': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states2')."',
'part4_3d_Country': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_country')."',

'part4_4a_street_number': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_street_number_and_name')."',
'part4_4b_apt_ste': ' ".showData('additional_information_about_your_qualifying_family_member_apt_ste_flr_input_field')."',
'part4_4c_city_town': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_city_or_town3')."',
'part4_4d_province': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_province')."',
'part4_4e_Postal_code': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_postal_code')."',
'part4_4f_Country': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_country')."',
'part4_5a_lastname': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_family_last_name')."',
'part4_5b_firstname': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_given_first_name')."',
'part4_5c_middlename': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_middle_name')."',
'part4_5d_Marriage_Ended': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_marriage_ended')."',
'part4_5e_Where': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_where_did_marriage_end')."',
'part4_5f': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_how_did_the_marriage_end')."',
'part4_6a_lastname': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_family_last_name2')."',
'part4_6b_firstname': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_given_first_name2')."',
'part4_6c_middlename': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_middle_name2')."',
'part4_6d_Marriage_Ended': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_date_marriage_ended2')."',
'part4_6e_Where': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_where_did_marriage_end2')."',
'part4_6f': ' ".showData('additional_information_about_your_qualifying_family_member_not_in_united_states_how_did_the_marriage_end2')."',
'immigration_proceedings_removal_date':' ".showData('immigration_proceedings_removal_date')."',
'immigration_proceedings_exclusion_date':' ".showData('immigration_proceedings_exclusion_date')."',
'immigration_proceedings_deportion_date':' ".showData('immigration_proceedings_deportion_date')."',
'immigration_proceedings_rescission_date':' ".showData('immigration_proceedings_rescission_date')."',
'immigration_proceedings_judicial_date':' ".showData('immigration_proceedings_judicial_date')."',





// page 4
'part5_2a': ' ".showData('processing_information_why_was_your_family_member_arested')."',
'part5_2b': ' ".showData('processing_information_family_member_date_of_arrest')."',
'part5_2c': ' ".showData('processing_information_family_member_arrest_city_town')."',
'part5_2d': ' ".showData('processing_information_family_member_arrest_state')."',
'part5_2e': ' ".showData('processing_information_family_member_arrest_country')."',
'part5_2f': ' ".showData('processing_information_family_member_arrest_outcome_disposition')."',
'part5_3a': ' ".showData('processing_information_why_was_your_family_member_arested2')."',
'part5_3b': ' ".showData('processing_information_family_member_date_of_arrest2')."',
'part5_3c': ' ".showData('processing_information_family_member_arrest_city_town2')."',
'part5_3d': ' ".showData('processing_information_family_member_arrest_state2')."',
'part5_3e': ' ".showData('processing_information_family_member_arrest_country2')."',
'part5_3f': ' ".showData('processing_information_family_member_arrest_outcome_disposition2')."',


// page 7
'part6_1a_lastname': ' ".showData('spouse_children1_family_last_name')."',
'part6_1b_firstname': ' ".showData('spouse_children1_given_first_name')."',
'part6_1c_middlename': ' ".showData('spouse_children1_middle_name')."',
'part6_2': ' ".showData('spouse_children1_date_of_birth')."',
'part6_3': ' ".showData('spouse_children1_country_of_birth')."',
'part6_4': ' ".showData('spouse_children1_relationship')."',

'part6_5a_lastname': ' ".showData('spouse_children2_family_last_name')."',
'part6_5b_firstname': ' ".showData('spouse_children2_given_first_name')."',
'part6_5c_middlename': ' ".showData('spouse_children2_middle_name')."',
'part6_6': ' ".showData('spouse_children2_date_of_birth')."',
'part6_7': ' ".showData('spouse_children2_country_of_birth')."',
'part6_8': ' ".showData('spouse_children2_relationship')."',

'part6_9a_lastname': ' ".showData('spouse_children3_family_last_name')."',
'part6_9b_firstname': ' ".showData('spouse_children3_given_first_name')."',
'part6_9c_middlename': ' ".showData('spouse_children3_middle_name')."',
'part6_10': ' ".showData('spouse_children3_date_of_birth')."',
'part6_11': ' ".showData('spouse_children3_country_of_birth')."',
'part6_12': ' ".showData('spouse_children3_relationship')."',

// page 8
'i_918a_petitioner_daytime_tel': ' ".showData('i_918a_petitioner_daytime_tel')."',
'i_918a_petitioner_mobile': ' ".showData('i_918a_petitioner_mobile')."',
'i_918a_petitioner_email': ' ".showData('i_918a_petitioner_email')."',
'i_918a_petitioner_sign_date': ' ".showData('i_918a_petitioner_sign_date')."',

// page 9
'part8_3_telephone': ' ".showData('qualifying_family_member_info_daytime_tel_number')."',
'part8_4_Telephone': ' ".showData('qualifying_family_member_info_mobile_tel_number')."',
'part8_5_email': ' ".showData('qualifying_family_member_info_email_address')."',
'part8_6b': ' ".showData('qualifying_family_member_info_date_of_signature')."',

'i_918a_interpreter_family_last_name': ' ".showData('i_918a_interpreter_family_last_name')."',
'i_918a_interpreter_family_given_first_name': ' ".showData('i_918a_interpreter_family_given_first_name')."',
'i_918a_interpreter_business_name': ' ".showData('i_918a_interpreter_business_name')."',

'i_918a_interpreter_mailing_address_street_number': ' ".showData('i_918a_interpreter_mailing_address_street_number')."',
'i_918a_interpreter_mailing_address_apt_ste_flr_value': ' ".showData('i_918a_interpreter_mailing_address_apt_ste_flr_value')."',
'i_918a_interpreter_mailing_address_city_town': ' ".showData('i_918a_interpreter_mailing_address_city_town')."',
'i_918a_interpreter_mailing_address_state': ' ".showData('i_918a_interpreter_mailing_address_state')."',
'i_918a_interpreter_mailing_address_zip_code': ' ".showData('i_918a_interpreter_mailing_address_zip_code')."',
'i_918a_interpreter_mailing_address_province': ' ".showData('i_918a_interpreter_mailing_address_province')."',
'i_918a_interpreter_mailing_address_postal_code': ' ".showData('i_918a_interpreter_mailing_address_postal_code')."',
'i_918a_interpreter_mailing_address_country': ' ".showData('i_918a_interpreter_mailing_address_country')."',
'i_918a_interpreter_daytime_tel': ' ".showData('i_918a_interpreter_daytime_tel')."',
'i_918a_interpreter_mobile': ' ".showData('i_918a_interpreter_mobile')."',
'i_918a_interpreter_email': ' ".showData('i_918a_interpreter_email')."',

// page 10
'i_918a_interpreter_certification_language_skill': ' ".showData('i_918a_interpreter_certification_language_skill')."',
'i_918a_interpreter_sign_date': ' ".showData('i_918a_interpreter_sign_date')."',

'i_918a_preparer_family_last_name': ' ".showData('i_918a_preparer_family_last_name')."',
'i_918a_preparer_family_given_first_name': ' ".showData('i_918a_preparer_family_given_first_name')."',
'i_918a_preparer_business_name': ' ".showData('i_918a_preparer_business_name')."',
'i_918a_preparer_mailing_address_street_number': ' ".showData('i_918a_preparer_mailing_address_street_number')."',
'i_918a_preparer_mailing_address_apt_ste_flr_value': ' ".showData('i_918a_preparer_mailing_address_apt_ste_flr_value')."',
'i_918a_preparer_mailing_address_city_town': ' ".showData('i_918a_preparer_mailing_address_city_town')."',
'i_918a_preparer_mailing_address_state': ' ".showData('i_918a_preparer_mailing_address_state')."',
'i_918a_preparer_mailing_address_zip_code': ' ".showData('i_918a_preparer_mailing_address_zip_code')."',
'i_918a_preparer_mailing_address_province': ' ".showData('i_918a_preparer_mailing_address_province')."',
'i_918a_preparer_mailing_address_postal_code': ' ".showData('i_918a_preparer_mailing_address_postal_code')."',
'i_918a_preparer_mailing_address_country': ' ".showData('i_918a_preparer_mailing_address_country')."',
'i_918a_preparer_daytime_tel': ' ".showData('i_918a_preparer_daytime_tel')."',
'i_918a_preparer_mobile': ' ".showData('i_918a_preparer_mobile')."',
'i_918a_preparer_email': ' ".showData('i_918a_preparer_email')."',

// page 11
'i_918a_preparer_sign_date': ' ".showData('i_918a_preparer_sign_date')."',

// page 12
'i_918a_additional_info_last_name':' ".showData('i_918a_additional_info_last_name')."',
'i_918a_additional_info_first_name':' ".showData('i_918a_additional_info_first_name')."',
'i_918a_additional_info_middle_name':' ".showData('i_918a_additional_info_middle_name')."',
'i_918a_additional_info_a_number':' ".showData('i_918a_additional_info_a_number')."',
'i_918a_additional_info_3a_page_no':' ".showData('i_918a_additional_info_3a_page_no')."',
'i_918a_additional_info_3b_part_no':' ".showData('i_918a_additional_info_3b_part_no')."',
'i_918a_additional_info_3c_item_no':' ".showData('i_918a_additional_info_3c_item_no')."',
'i_918a_additional_info_4a_page_no':' ".showData('i_918a_additional_info_4a_page_no')."',
'i_918a_additional_info_4b_part_no':' ".showData('i_918a_additional_info_4b_part_no')."',
'i_918a_additional_info_4c_item_no':' ".showData('i_918a_additional_info_4c_item_no')."',
'i_918a_additional_info_5a_page_no':' ".showData('i_918a_additional_info_5a_page_no')."',
'i_918a_additional_info_5b_part_no':' ".showData('i_918a_additional_info_5b_part_no')."',
'i_918a_additional_info_5c_item_no':' ".showData('i_918a_additional_info_5c_item_no')."',
'i_918a_additional_info_6a_page_no':' ".showData('i_918a_additional_info_6a_page_no')."',
'i_918a_additional_info_6b_part_no':' ".showData('i_918a_additional_info_6b_part_no')."',
'i_918a_additional_info_6c_item_no':' ".showData('i_918a_additional_info_6c_item_no')."',
'i_918a_additional_info_7a_page_no':' ".showData('i_918a_additional_info_7a_page_no')."',
'i_918a_additional_info_7b_part_no':' ".showData('i_918a_additional_info_7b_part_no')."',
'i_918a_additional_info_7c_item_no':' ".showData('i_918a_additional_info_7c_item_no')."',

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
$pdf->Output('i-918supa.pdf', 'I');