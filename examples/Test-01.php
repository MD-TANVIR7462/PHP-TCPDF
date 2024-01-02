<?php
require_once( 'config.php' );

//*** $allDataCountry = indexByQueryAlldata( 'SELECT * FROM countries' );

//*** Include the main TCPDF library ( search for installation path ).
require_once( 'tcpdf_include.php' );

//*** Extend the TCPDF class to create custom Header and Footer

class MyPDF extends TCPDF {

    //***Page header

    public function Header() {
        $this->SetY( 13 );
        if ( $this->page > 1 ) {

            $this->SetLineWidth( 2 );
            //*** set border width
            //*** $this->SetDrawColor( 0, 0, 0 );
            //*** set color for cell border
            $this->SetFillColor( 255, 255, 255 );
            //*** set filling color
            $this->MultiCell( 0, 0, '', 'T', 1, 'C', 1, '', 13, false, 'T', 'C' );

            $this->SetLineWidth( 0.1 );
            //*** set border width
            //*** $this->SetDrawColor( 0, 0, 0 );
            //*** set color for cell border
            $this->SetFillColor( 255, 255, 255 );
            //*** set filling color
            $this->MultiCell( 191, 0, '', 'T', 1, 'C', 1, 12.8, 14.9, false, 'T', 'C' );

        }

    }

    //*** Page footer

    public function Footer() {
        //*** Position at 15 mm from bottom
        $this->SetY( -18 );

        $header_top_border = array(
            'B' => array( 'width' => 0.5, 'color' => array( 0, 0, 0 ), 'dash' => 0, 'cap' => 'butt' ),
        );
        $this->Cell( 191.5, 4, '', $header_top_border, 1, 1 );

        //*** Set font
        $this->SetFont( 'times', '', 9 );

        $this->Cell( 40, 6.4, 'Form I-918  Edition 12/06/21', 0, 0, 'L' );

        //*** if ( $this->page == 1 ) {
        $barcode_image = "images/G-639-footer-pdf417-$this->page.png";
        //*** )
        $this->Image( $barcode_image, 65, 265, 95, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );
        //*** Footer Barcode PDF417

        //*** $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 'T', 'R', 1, 0 );

        $this->MultiCell( 61, 6, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, 'R', 0, 1, 159, 266, true );

    }
}

$pdf = new MyPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false );

//*** set document information
$pdf->SetCreator( PDF_CREATOR );
$pdf->SetAuthor( '' );
$pdf->SetTitle( 'Form G-639' );

//*** set default header data
$pdf->SetHeaderData( PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING );

//*** set header and footer fonts
$pdf->setHeaderFont( Array( PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN ) );
$pdf->setFooterFont( Array( PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA ) );

//*** set default monospaced font
$pdf->SetDefaultMonospacedFont( PDF_FONT_MONOSPACED );

$pdf->SetMargins( 13.7, 15.3, 12.8, true );

//*** set auto page breaks
$pdf->SetAutoPageBreak( TRUE, PDF_MARGIN_BOTTOM );

//*** set image scale factor
$pdf->setImageScale( PDF_IMAGE_SCALE_RATIO );

//*** add a page
$pdf->AddPage( 'P', 'LETTER' );
//*** page number 1

//*** set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array( 0, 0, 0 ),
    'bgcolor' => false, //***array( 255, 255, 255 )
    'module_width' => 2, //*** width of a single module in points
    'module_height' => 1 //*** height of a single module in points
);

//*** Logo
$logo = 'homeland_security_logo.png';
$pdf->Image( $logo, 12, 9, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false );

$pdf->Cell( 30, 5, '', 0, 0 );
$pdf->SetFont( 'times', 'B', 14 );
//*** set font
$pdf->MultiCell( 120, 15, 'Petition for U Nonimmigrant Status ', 0, 'C', 0, 1, 48, 9, true );

$pdf->SetFont( 'times', 'B', 11 );
//*** set font
$pdf->setCellPaddings( 2, 4, 6, 0 );
//*** set cell padding
$pdf->MultiCell( 30, 5, 'USCIS\nForm I-918', 0, 'C', 0, 1, 174.5, 5.5, true );

$pdf->SetFont( 'times', 'B', 11 );
//*** set font
$pdf->MultiCell( 80, 15, 'Department of Homeland Security', 0, 'C', 0, 1, 67, 13, true );

$pdf->SetFont( 'times', '', 10.8 );
//*** set font
$pdf->MultiCell( 80, 15, 'U.S. Citizenship and Immigration Services', 0, 'C', 0, 1, 67, 18, true );

$pdf->SetFont( 'times', '', 9 );
//*** set font
$pdf->setCellPaddings( 2, 1, 6, 0 );
//*** set cell padding
$pdf->MultiCell( 40, 5, 'OMB No. 1615-0104\nExpires 06/30/2023', 0, 'C', 0, 1, 169, 18.5, true );

$pdf->Ln( 1.3 );

$top_border = array(
    'T' => array( 'width' => 2, 'color' => array( 0, 0, 0 ), 'dash' => 0, 'cap' => 'square' ),
);
$pdf->Cell( 188.5, 0, '', $top_border, 1, 1 );
//***........
$pdf->setCellPaddings( 1, 1, 0, 1 );
//*** set cell padding
$pdf->SetLineWidth( 0.1 );
//*** set border width
$pdf->SetDrawColor( 0, 0, 0 );
//*** set color for cell border
$pdf->SetFillColor( 255, 255, 255 );
//*** set filling color
$pdf->setCellHeightRatio( 1.1 );
//*** set cell height ratio
$pdf->MultiCell( 0, 0, '', 'T', 1, 'C', 1, 12.8, 30.65, false, 'T', 'C' );

//***!..............<<< Page 1 >>>-----------------//***

/**
* ?<<<<<<< First Page Starts from Here >>>>>
*/

//***?..Table Start ..............
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

//***............
$pdf->SetFont( 'times', '', 8 );
//*** ! CheckBOx $pdf->writeHTMLCell( 3, 1, 30, 52, '',  1,  1, false, true, 'L', false );
//***! Underline $pdf->writeHTMLCell( 31, 5, 35, 58, '', 'B', 1, false, true, 'L', true );
//***........
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
//***?..Table End......

//***?second Table Start ....

$pdf->writeHTMLCell ( 190, 18, 13, 83.5, '', 1, 1, false, true, 'C', true );

$pdf->writeHTMLCell( 40, 17.7, 13.1, 83.6, '', 'R', 1, true, true, 'C', true );

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>To be completed by an attorney or accredited representative</b> (if any).  </div>';
$pdf->writeHTMLCell( 40, 7, 15, 85, $html,  0,  1, false, true, 'L', false );

$pdf->SetFont( 'times', '', 12 );
$html = '<div><b>  </b>   <input type="checkbox" name="table_2_CheckBox" value="Y" checked=" " /> </div>';
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
$html = '<div><b>Attorney or According Representative USCIS Online Account Number</b> (if any)</div>';
$pdf->writeHTMLCell( 60, 15, 143.7, 83.5, $html, 0, 1, false, true, 'L', true );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'Attorney_or_According_Representative', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 93.4 );

//***? <<< second Table End >>>.....

$pdf->SetFont( 'times', 'B', 10 );
//*** set font
$pdf->MultiCell( 100, 6, 'START HERE - Type or print in black or blue ink.', '', 'L', 0, 1, 19.5, 101.7, true );
$pdf->SetFont( 'times', '', 10 );
//*** set font
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 11, 100.7, false );
//*** angle
$pdf->StopTransform();

//*** ?<<< part 1 start >>>.........

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
//*** set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//*** set cell padding
$pdf->SetFontSize( 11.6 );
//*** set font

$html = '<div><b>Part 1. Information About You</b> (Person filing this 
petition as a victim)</div>';
$pdf->writeHTMLCell( 90, 5, 13, 108, $html, 1, 1, true, false, 'J', true );
$pdf->SetFont( 'times', 'I', 11.6 );

//***................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 120, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_1a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 122 );
//*** ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 129, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_1b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 130.8 );

//***.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 10, 12, 140, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_1c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 139.6 );

//***.............
$pdf->setCellHeightRatio( 1 );
$pdf->setCellPaddings( 0, 0, 0, 0 );
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>Other Names Used </b> (Include maiden name, nicknames, and 
aliases, if applicable)</div>';
$pdf->writeHTMLCell( 90, 5, 13, 147.7, $html, 0, 1, false, true, 'L', false );

//***..................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.a.  </b> &nbsp; Family Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Last Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 156.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_2a_lastname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 157 );
//*** ............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.b.  </b> &nbsp; Given Name <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (First Name) </div>';
$pdf->writeHTMLCell( 35, 10, 12, 165.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_2b_firstname', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 166 );

//***.......
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.c.  </b>  &nbsp; Middle Name  </div>';
$pdf->writeHTMLCell( 35, 10, 12, 176.5, $html, 0, 1, false, false, 'J', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_2c_middlename', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 175 );
//***.............

//***?Home address section -Part-1------------------
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'I', 10 );
//*** set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//*** set cell padding
$pdf->SetFontSize( 11.6 );
//*** set font
$html = '<div><b>Home Address</b></div>';
$pdf->writeHTMLCell( 91, 7, 12.5, 183.5, $html, 0, 1, true, false, 'J', true );
$pdf->SetFont( 'times', 'IB', 9 );
$html = '<div><a href="https://***tools.usps.com/go/ZipLookupAction_input"><I>(Uses ZIP Code Lookup)</I></a></div>';
$pdf->writeHTMLCell( 90, 1, 13, 184, $html, 0, 1, true, false, 'R', true );

//***.....
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.a. &nbsp;&nbsp;&nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;  &nbsp; and Name </div>';
$pdf->writeHTMLCell( 40, 12, 12, 189.9, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3a_street_number', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 192 );

//*** ...........
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>3.b. </b>&nbsp; &nbsp; <input type="checkbox" name="3b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="3b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="3b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 12, 202, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3b_apt_ste', 40, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 63.5, 200.7 );

//***......

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 210, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3c_city_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 209.5 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>3.e.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 12, 219, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part1_3d_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 218.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font
$pdf->TextField( 'part1_3e_zip_code', 33.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 70, 218.3 );

//***..........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>3.f.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 12, 227.6, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3f_province', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 226.8 );
//***...............

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>3.g.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 12, 236.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3g_Postal Code', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 235.7 );
//***........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>3.h.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 12, 243.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3h_Country', 82.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 21.5, 248.7 );
//*** //***.....

//***? ... <<<Part 1 & page 1 first column Done >>..........<< second column started >>....

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', 'I', 10 );
//*** set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//*** set cell padding
$pdf->SetFontSize( 11.6 );
//*** set font
$html = '<div><b>Safe Mailing Address</b> &nbsp; <I>(if other than Home Address)</I></div>';
$pdf->writeHTMLCell( 91, 7, 112, 108, $html, 0, 1, true, false, 'J', true );

//***...........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>4.a.</b> &nbsp; In Care Of Name </div>';
$pdf->writeHTMLCell( 70, 0, 112, 116, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_4a_Care Of Name', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 121 );

//***.....
$pdf->SetFont( 'times', '', 9.5 );
$html = '<div><b>4.b. &nbsp;</b>Street Number  &nbsp; <br>  &nbsp;  &nbsp; &nbsp;   and Name </div>';
$pdf->writeHTMLCell( 40, 12, 112, 128, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_4b_street_number', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 130 );

//*** //*** ...........
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>4.c. </b> <input type="checkbox" name="Apt" value="4c_Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="4c_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="Flr" value="4c_Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 61, 0, 112, 139.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_4c_apt_ste', 43, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 160, 138.9 );

//*** //***......

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>4.d.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 147.4, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_4d_city_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 142.6, 147.9 );
//*** //***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>4.e.</b> &nbsp;&nbsp;State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<b>4.f.</b>&nbsp;&nbsp;ZIP Code';
$pdf->writeHTMLCell( 60, 0, 112, 157.3, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part1_4e_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 129.5, 157, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font
$pdf->TextField( 'part1_4f_zip_code', 35, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 168, 157 );

//*** //***..........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>4.g.</b> &nbsp; Province </div>';
$pdf->writeHTMLCell( 30, 0, 112, 165.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_4g_province', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 166 );
//*** //***...............

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>4.h.</b> &nbsp; Postal Code </div>';
$pdf->writeHTMLCell( 30, 0, 112, 175, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_4h_Postal Code', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 143, 174.9 );
//***........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>4.i.</b> &nbsp; Country </div>';
$pdf->writeHTMLCell( 30, 0, 112, 182, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_3h_Country', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 120, 187.5 );
//*** //*** //***.....

//***?.............<<< Other information part -1 >>>.........Column 2
$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$pdf->setCellHeightRatio( 1.3 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//*** set cell padding
$pdf->SetFontSize( 11.6 );
//*** set font

$html = '<div><b> <i> Other Information </i> </b>  </div>';
$pdf->writeHTMLCell( 90.6, 6, 112.6, 197, $html, '', 1, true, false, 'J', true );

//***....
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5. </b>  &nbsp; &nbsp; Alien Registration Number (A-Number) (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 112, 203.4, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 126.4, 143, false );
//*** angle
$pdf->StopTransform();
$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>A- </b></div>';
$pdf->writeHTMLCell( 30, 7, 147, 209, $html, 0, 1, false, false, 'J', true );

$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_5_registration_Number', 50, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 153.5, 209 );

//*** //***............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6. </b>  &nbsp; &nbsp;  U.S. Social Security Number (if any) </div>';
$pdf->writeHTMLCell( 80, 5, 112, 216, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 132.6, 154.5, false );
//*** angle
$pdf->StopTransform();
$pdf->SetFont( 'times', '', 10 );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_6_social_security', 50, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(),  153.5, 223 );

//***.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7. </b>   &nbsp; &nbsp;  USCIS Online Account Number (if any)</div>';
$pdf->writeHTMLCell( 80, 7, 112, 231, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 119, 174.8, false );
//*** angle
$pdf->StopTransform();
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_7_online_account', 64, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 139.5, 237 );
//*** //***...........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>8.</b>&nbsp; &nbsp; &nbsp;Marital Status</div>';
$pdf->writeHTMLCell( 95, 0, 112, 243,  $html, 0, 1, false, 'L' );

$html = '
   <input type="checkbox" name="8_Single" value="Single" checked="" /> Single
   
   &nbsp;  &nbsp; <input type="checkbox" name="8_Married" value="Married" checked="" /> Married

   &nbsp;  &nbsp; <input type="checkbox" name="8_Divorced" value="Divorced" checked="" /> Divorced

   &nbsp;  &nbsp; <input type="checkbox" name="8_Widowed" value="Widowed" checked="" /> Widowed
   ';

$pdf->writeHTMLCell( 195, 0, 119, 249.8, $html, 0, 1, false, true, 'J', 0 );

//***!..............<<< Page 2 >>>-----------------//***
$pdf->AddPage( 'P', 'LETTER' );
//*** page number 2
//***.........

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 1. Information About You</b>(continued)</div>';
$pdf->writeHTMLCell( 91, 4, 12, 18, $html, 1, 1, true, false, 'L', true );
//***...........
$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>9.</b>&nbsp; &nbsp; &nbsp;Gender</div>';
$pdf->writeHTMLCell( 95, 0, 12, 27,  $html, 0, 1, false, 'L' );

$html = '<input type="checkbox" name="9_Male" value="Male" checked="" />&nbsp;&nbsp; Male
   
   &nbsp;  &nbsp; <input type="checkbox" name="9_Female" value="Female" checked="" />&nbsp;&nbsp;  Female';

$pdf->writeHTMLCell( 195, 0, 40, 29, $html, 0, 1, false, true, 'J', 0 );

//***.........

$pdf->SetFont( 'times', '', 10 );
$html = '<div><b>10.  </b> Date of Birth (mm/dd/yyyy)  </div>';
$pdf->writeHTMLCell( 90, 7, 12, 34, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_10_date_of_birth', 32, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 35 );
//***..........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>11.   </b> Country of Birth</div>';
$pdf->writeHTMLCell( 50, 0, 12, 41, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_11_Country_of_birth', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 46.9 );
//***..............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>12.   </b> Country of Citizenship or Nationality</div>';
$pdf->writeHTMLCell( 90, 0, 12, 54, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_12_Country_of_Citizenship', 83, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 20, 61 );

//***..........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>13.  </b>    Form I-94 Arrival-Departure Record Number</div>';
$pdf->writeHTMLCell( 80, 7, 12, 67.7, $html, 0, 1, false, false, 'J', true );
$pdf->StartTransform();
$pdf->SetFillColor( 0, 0, 0 );
$pdf->Rotate( -30 );
$pdf->SetFont( 'zapfdingbats', 'B', 10 );
$pdf->MultiCell( 10, 10, 't', '', 'L', 0, 1, 36, 59.8, false );
//*** angle
$pdf->StopTransform();
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_13_Arrival_Departure', 60, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 74.5 );

//***..........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>14.</b> &nbsp;Passport Number </div>';
$pdf->writeHTMLCell( 50, 5, 12, 82.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_14_Passport Number', 57, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 46, 83 );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>15.</b> &nbsp;Travel Document Number </div>';
$pdf->writeHTMLCell( 50, 5, 12, 92.2, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_15_Travel_Document_Number', 46, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 57, 92 );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>16.   </b>Country of Issuance for Passport or Travel Document</div>';
$pdf->writeHTMLCell( 100, 0, 12, 99, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_16_Country_of_Issuance', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 106 );
//***..............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>17.   </b>Date of Issuance for Passport or Travel Document </div>';
$pdf->writeHTMLCell( 90, 0, 12, 113.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 18, 118.2, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_17_Date_of_Issuance', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 120 );
//***..............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>18.   </b>Expiration Date for Passport or Travel Document</div>';
$pdf->writeHTMLCell( 90, 0, 12, 126.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 18, 130.7, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_18_Expiration_Date', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 132 );
//***..............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div>Place and Date of Last Entry into the United States and Date
Authorized Stay Expired</div>';
$pdf->writeHTMLCell( 90, 0, 12.4, 139.7, $html, '', 0, 0, true, 'L' );

//***......

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>19.a.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 150, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_19a_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 150.5 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>19.b.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 158, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part1_19b_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 158, $html, '', 0, 0, true, 'L' );

//***..............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>21.   </b>Date of Last Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 0, 12, 164.5, $html, '', 0, 0, true, 'L' );
$html = '<div>(mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 18, 169.2, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_20_Date_of_LastEntry', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 170.4 );

//***..........
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>20.   </b> Date Authorized Stay Expired (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 177.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_21_Date_ Authorized', 38, 6, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 65, 183.4 );

//***..........
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>21.   </b>Current Immigration Status</div>';
$pdf->writeHTMLCell( 100, 0, 12, 188, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part1_21_Current', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 194 );

//***.............
$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 0.5, 0.5, 0, 1 );

$html = '<div><b>Part 2. Additional Information About You</b></div>';
$pdf->writeHTMLCell( 91, 3, 12, 203.9, $html, 1, 1, true, false, 'L', true );
//***.............
$pdf->SetFont( 'times', '', 9.2 );
$html = '<div>Answering “Yes” to the following questions below requires
explanations and supporting documentation. Attach relevant
documents in support of your claims that you are a victim of
criminal activity listed in the Immigration and Nationality Act
(INA) section 101(a)(15)(U)(iii). You must also attach a
personal narrative statement describing the criminal activity of
which you are a victim. If you are only petitioning for U
derivative status for qualifying family members subsequent to
your (the principal petitioner) initial filing, you are not required
to submit evidence supporting the original petition with the new
Form I-918.

</div>';
$pdf->writeHTMLCell( 90, 7, 12, 211.3, $html, 0, 1, false, true, 'J', true );

//***!page 2 column-1 Finished
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you need extra space to complete <b> Part 2. </b>, use the space
provided in <b> Part 8. Additional Information.</b>
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 18, $html, 0, 1, false, true, 'J', true );
//***.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Select "Yes" or "No," as appropriate, for each of the following
questions.</b>
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 29, $html, 0, 1, false, true, 'J', true );

//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.   &nbsp;  </b>      I am a victim of criminal activity listed in the INA at <br>      &nbsp;  &nbsp; &nbsp;  
section 101(a)(15)(U)(iii). </div>';
$pdf->writeHTMLCell( 90, 0, 112, 40, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_1_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_1_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 45, $html, '', 0, 0, true, 'L' );

//***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>2.   &nbsp;  </b>      I have suffered substantial physical or mental abuse as a <br>      &nbsp;  &nbsp; &nbsp;  
result of having been a victim of this criminal activity </div>';
$pdf->writeHTMLCell( 90, 0, 112, 53, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_2_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_2_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 63, $html, '', 0, 0, true, 'L' );

//***.................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>3.   &nbsp;  </b>      I possess information concerning the criminal activity of <br>      &nbsp;  &nbsp; &nbsp;  
which I was a victim </div>';
$pdf->writeHTMLCell( 90, 0, 112, 69, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_3_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_3_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 75, $html, '', 0, 0, true, 'L' );

//***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.   &nbsp;  </b>     I am submitting Form I-918, Supplement B, U <br>      &nbsp;  &nbsp; &nbsp;  
Nonimmigrant Status Certification, from a certifying <br>      &nbsp;  &nbsp; &nbsp;  
official</div>';
$pdf->writeHTMLCell( 90, 0, 112, 82, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_4_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_4_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 92, $html, '', 0, 0, true, 'L' );

//***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.   &nbsp;  </b>     The crime of which I am a victim occurred in the United 
<br>      &nbsp;  &nbsp; &nbsp;  
States (including Indian country and military installations) 
 <br>      &nbsp;  &nbsp; &nbsp;  
 or violated the laws of the United States.</div>';
$pdf->writeHTMLCell( 90, 0, 112, 100, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_5_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_5_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 115, $html, '', 0, 0, true, 'L' );

//***....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.   &nbsp;  </b>      I am under 16 years of age </div>';
$pdf->writeHTMLCell( 90, 0, 112, 124, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_6_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_6_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 125, $html, '', 0, 0, true, 'L' );
//***....................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.a.   &nbsp;  </b>      I was or am in immigration proceedings.</div>';
$pdf->writeHTMLCell( 90, 0, 112, 134, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part2_7_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part2_7_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 140, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>If you answered "Yes," select the type of proceedings. If you
were in proceedings in the past and are no longer in proceedings,
provide the date of action. If you are currently in proceedings,
type or print “Current” in the appropriate date field. Select <b>all
applicable </b> boxes. Use the space provided in <b> Part 8. Additional
Information </b> to provide an explanation.
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 148, $html, 0, 1, false, true, 'J', true );
//***..........................

$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 179.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.b.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Removal Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Removal Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 178, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 40, 3, 164, 182, '', 1, 1, false, true, 'L', true );

//***........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 190.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.c.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Exclusion Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Exclusion Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 189, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 40, 3, 164, 193, '', 1, 1, false, true, 'L', true );

//***........................
//***........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 200.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.d.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Exclusion Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Exclusion Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 199, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 40, 3, 164, 203, '', 1, 1, false, true, 'L', true );

//***........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 210.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.e.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Exclusion Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Exclusion Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 209, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 40, 3, 164, 213, '', 1, 1, false, true, 'L', true );

//***........................
$pdf->SetFont( 'times', '', 6 );
$pdf->writeHTMLCell( 3, 2, 120, 220.5, '', 1, 1, false, true, 'L', false );
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>7.f.   &nbsp;  </b>  &nbsp;   &nbsp;&nbsp; Exclusion Proceedings  <br>      &nbsp;  &nbsp; &nbsp;  Exclusion Date (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 0, 112, 219, $html, '', 0, 0, true, 'L' );

$pdf->writeHTMLCell( 40, 3, 164, 223, '', 1, 1, false, true, 'L', true );

//***........................

// ! <<3rd page>>-- add a page
$pdf->AddPage( 'P', 'LETTER' );
//*** page number 3
//***............

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 0, 0, 0, 0 );

$html = '<div><b> Part 2. Additional Information About You </b>&nbsp;&nbsp; (continued) </div>';
$pdf->writeHTMLCell( 91, 6, 12.5, 18, $html, 1, 1, true, false, 'L', true );
//***...........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>Provide the date of entry, place of entry, and status under
which you entered the United States for each entry during
the five years preceding the filing of this petition.</b></div>';
$pdf->writeHTMLCell( 93, 7, 12, 30, $html, 0, 1, false, true, 'L', true );
//***........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>8.a </b> &nbsp;&nbsp;Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 7, 12, 45, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_8a_date_of_Entry', 32.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 44.5 );
//***..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Place of Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 7, 12, 50, $html, 0, 1, false, false, 'L', true );
//***............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>8.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 58, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_8b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 57.5 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>8.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 66, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part2_8c_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 66, $html, '', 0, 0, true, 'L' );

//***..................
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>8.d   </b>&nbsp; Status at the Time of Entry (for example, F-1 student,
B-2<br>      &nbsp;  &nbsp; &nbsp;&nbsp; tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 72.9, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_8d_status', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 82.6 );
//***..........

$pdf->writeHTMLCell( 91, 5, 12, 86.5, '', 'B', 1, false, true, 'L', true );

//***.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>9.a </b>   &nbsp;&nbsp;Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 7, 12, 94.4, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_9a_date_of_Entry', 32.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 93.5 );
//***..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Place of Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 7, 12, 100, $html, 0, 1, false, false, 'L', true );
//***............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>9.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 108, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_9b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 108 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>9.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 116, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part2_9c_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 116, $html, '', 0, 0, true, 'L' );

//***..................
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>9.d.   </b>&nbsp; Status at the Time of Entry (for example, F-1 student,
 B-2<br>      &nbsp;  &nbsp; &nbsp;&nbsp; tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 124, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_9d_status', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 133.5 );
//***..........

$pdf->writeHTMLCell( 91, 5, 12, 137.4, '', 'B', 1, false, true, 'L', true );

//***.............
//***.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>10.a </b>   &nbsp;&nbsp;Date of Entry (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 90, 7, 12, 144.4, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10a_date_of_Entry', 32.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 71, 144.5 );
//***..........
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Place of Entry into the United States</div>';
$pdf->writeHTMLCell( 90, 7, 12, 150, $html, 0, 1, false, false, 'L', true );
//***............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>10.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 158, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 158 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>10.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 166, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part2_10c_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 166, $html, '', 0, 0, true, 'L' );

//***..................
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>10.d   </b>&nbsp; Status at the Time of Entry (for example, F-1 student,
B-2<br>      &nbsp;  &nbsp; &nbsp;&nbsp; tourist, entered without inspection)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 174, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_10d_status', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 183.5 );
//***..........

$pdf->writeHTMLCell( 91, 5, 12, 187.4, '', 'B', 1, false, true, 'L', true );

//***.............
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>If you are outside of the United States, provide the U.S.
 Consulate or inspection facility or a safe foreign mailing
 address you want notified if this petition is approved.</b></div>';
$pdf->writeHTMLCell( 93, 7, 12, 195, $html, 0, 1, false, true, 'L', true );
//***........

$pdf->setFont( 'Times', '', 10 );
$html = '<div><b>11.a.</b>&nbsp; &nbsp; &nbsp;Type of Office (Select <b>only one</b> box):</div>';
$pdf->writeHTMLCell( 95, 0, 12, 210.5,  $html, 0, 1, false, 'L' );

$html = '
    &nbsp;  &nbsp; <input type="checkbox" name="part2_11a_US_Consulate" value="Married" checked="" /> &nbsp; U.S. Consulate
    &nbsp;  &nbsp; <input type="checkbox" name="part2_11a_ Pre_Flight" value="Married" checked="" /> &nbsp; Pre-Flight Inspection ';

$pdf->writeHTMLCell( 195, 0, 22, 217.8, $html, 0, 1, false, true, 'J', 0 );
$html = '&nbsp;  &nbsp; <input type="checkbox" name="part2_11a_Port_of_Entry" value="Married" checked="" /> &nbsp; Port-of-Entry';
$pdf->writeHTMLCell( 195, 0, 22, 223.8, $html, 0, 1, false, true, 'J', 0 );

//***................
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>11.b.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 230, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11b_city_or_town', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 230 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>11.c.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 239, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part2_11c_state" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 238.5, $html, '', 0, 0, true, 'L' );

//***..................
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>11.d.   </b>&nbsp; Country </div>';
$pdf->writeHTMLCell( 90, 0, 12, 246, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_11d_country', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 251 );

//***?..........Page 3 -- <<< Column 1 finished >>>......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>Safe Foreign Address Where You Want Notification Sent</b>
(if other than U.S. Consulate, Pre-Flight Inspection, or
Port-of-Entry)</div>';
$pdf->writeHTMLCell( 90, 7, 112, 18, $html, 0, 1, false, true, 'J', true );
//***.............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>12.a.</b>&nbsp;&nbsp;&nbsp;Street Number  &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   and Name</div>';
$pdf->writeHTMLCell( 90, 7, 112, 32.5, $html, 0, 1, false, false, 'L', true );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12a', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 34 );
//***...........

$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div><b>12.b. </b>&nbsp;  <input type="checkbox" name="part2_12b_Apt" value="Apt" checked="" />Apt. &nbsp;&nbsp;<input type="checkbox" name="part2_12b_Ste" value="Ste" checked="" />Ste. <input type="checkbox" name="part2_12b_Flr" value="Flr" checked="" /> Flr.</div>';
$pdf->writeHTMLCell( 60, 0, 112, 44, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12b', 44.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 159.5, 42.6 );
//***...........

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<div><b>12.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 112, 52, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part2_12c_city_town', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 51.6 );
//***............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>12.d.</b> &nbsp;&nbsp;Province';
$pdf->writeHTMLCell( 90, 7, 112, 62, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font
$pdf->TextField( 'part2_12d_province', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 60.5 );
//***.............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>12.e.</b> &nbsp;&nbsp;Postal Code';
$pdf->writeHTMLCell( 90, 7, 112, 70.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font
$pdf->TextField( 'part2_12e_postal_code', 59, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 145, 69 );
//***.............

$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>12.f.</b> &nbsp;&nbsp; Country';
$pdf->writeHTMLCell( 90, 7, 112, 77.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font
$pdf->TextField( 'part2_12f_country', 82, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 122, 82.5 );
//***?............<<<Part 2 end -Page -3>>>>................

//***?.................<<Part 3 starts >>...................

$pdf->SetFillColor( 220, 220, 220 );
$pdf->SetFont( 'times', '', 10 );
//*** set font
$pdf->setCellHeightRatio( 1.1 );
$pdf->setCellPaddings( 1, 0.5, 1, 0.5 );
//*** set cell padding
$pdf->SetFontSize( 11.6 );
//*** set font
$html = '<div><b>Part 3. Processing Information</b></div>';
$pdf->writeHTMLCell( 90, 7, 114, 95, $html, 1, 1, true, false, 'L', true );
//***.............
$pdf->SetFont( 'times', '', 9.7 );
//*** set font
$html = '<div>Answer the following questions about yourself. For the
purposes of this petition, you must answer "Yes" to the
following questions, if applicable, even if your records were
sealed or otherwise cleared or if anyone, including a judge, law
enforcement officer, or attorney, told you that you no longer
have a record</div>';
$pdf->writeHTMLCell( 90, 7, 112, 103, $html, '', 1,  false, true, 'L', true );
//***................
$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>NOTE:</b> &nbsp;: If you answer “Yes” to <b>ANY</b> question in <b>Part 3.</b>,
provide an explanation in the space provided in <b>Part 8.
Additional Information.</b>';
$pdf->writeHTMLCell( 90, 7, 112, 127, $html, '', 0, 0, true, 'L' );
//***...........
$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<b>NOTE:</b> &nbsp;: Answering "Yes" does not necessarily mean that U.S.
Citizenship and Immigration Services (USCIS) will deny your
Petition for U Nonimmigrant Status.</b>';
$pdf->writeHTMLCell( 90, 7, 112, 141, $html, '', 0, 0, true, 'L' );
//***...........
$pdf->SetFont( 'times', '', 10 );
//*** set font
$html = '<> Have you <b>EVER:</b></>';
$pdf->writeHTMLCell( 90, 7, 112, 155.5, $html, '', 0, 0, true, 'L' );
//***...........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.a.   &nbsp;  </b>     Committed a crime or offense for which you have not <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
been arrested?. </div>';
$pdf->writeHTMLCell( 90, 0, 112, 163, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1a_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 168, $html, '', 0, 0, true, 'L' );

//***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.b.   &nbsp;  </b>    Been arrested, cited, or detained by any law enforcement <br> &nbsp; &nbsp;  &nbsp; &nbsp; 
officer (including Department of Homeland Security (DHS), <br>  &nbsp;&nbsp; &nbsp;  &nbsp; 
former Immigration and Naturalization Service (INS), and  <br> &nbsp; &nbsp; &nbsp;  &nbsp; 
 military officers) for any reason? </div>';
$pdf->writeHTMLCell( 100, 0, 112, 174, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1b_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 187, $html, '', 0, 0, true, 'L' );

//*** //***.................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.c.   &nbsp;  </b>    Been charged with committing any crime or offense?</div>';
$pdf->writeHTMLCell( 90, 0, 112, 193, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1c_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 197, $html, '', 0, 0, true, 'L' );

//*** //***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.d.   &nbsp;  </b>    Been convicted of a crime or offense (even if the  <br>      &nbsp;  &nbsp; &nbsp; &nbsp;  
violation was subsequently expunged or pardoned)? <br>   
</div>';
$pdf->writeHTMLCell( 90, 0, 112, 204, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1d_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1d_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 213, $html, '', 0, 0, true, 'L' );

//*** //***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.e.   &nbsp;  </b>     Been placed in an alternative sentencing or a  rehabilitative
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
program (for example, diversion, deferred prosecution, 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 withheld adjudication, deferred adjudication)?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 220, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1e_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1e_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 232, $html, '', 0, 0, true, 'L' );

//***!.......... << 3rd page done >>...............

//***! ...............<<4th page starts here >>------------------

//*** add a page
$pdf->AddPage( 'P', 'LETTER' );
//*** page number 3
//***...........

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 3. Processing Information </b> (continued) </div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.f.   &nbsp;  </b>    Received a suspended sentence, been placed on probation,  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
or been paroled? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 27, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1f_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1f_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 32, $html, '', 0, 0, true, 'L' );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.g.   &nbsp;  </b>    Been in jail or prison?  </div>';
$pdf->writeHTMLCell( 90, 0, 12, 37, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1g_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1g_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 37.5, $html, '', 0, 0, true, 'L' );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.h.   &nbsp;  </b>    Been the beneficiary of a pardon, amnesty, rehabilitation, <br>      &nbsp; &nbsp; &nbsp; &nbsp;   or other act of clemency or similar action? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 44, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1h_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1h_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 52, $html, '', 0, 0, true, 'L' );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>1.i.   &nbsp;  </b>    Exercised diplomatic immunity to avoid prosecution for a <br>      &nbsp; &nbsp; &nbsp; &nbsp;   criminal offense in the United States? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 58, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_1i_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_1i_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 70, 65, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.7 );
//*** set font

$html = '<div><b>Information About Arrests, Citations, Detentions, or Charges</b></div>';
$pdf->writeHTMLCell( 100, 7, 12, 71, $html, '', 1,  false, true, 'L', true );

$html = '<div>If you answered “Yes” to any of the above questions, respond to
the questions below to provide additional details. If you need
extra space, use the space provided in <b> Part 8. Additional
Information.</b></div>';
$pdf->writeHTMLCell( 90, 7, 12, 76.5, $html, '', 1,  false, true, 'L', true );

//***..........................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>2.a.   </b> Why were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 94, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2a', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 100 );
//***..........................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>2.b.   </b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 100, 0, 12, 108.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2b', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 66, 114 );
//***...............
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div>Where were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 121.5, $html, '', 0, 0, true, 'L' );
//***...................

$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>2.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 128, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2c', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 128 );
//***............

$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<b>2.d.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 136, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part3_2d" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 136, $html, '', 0, 0, true, 'L' );

//***..................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>2.e.   </b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 90, 0, 12, 143, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2e', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 148.5 );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>2.f.   </b>&nbsp;Outcome or disposition (for example, no charges filed, 
<br>      &nbsp;  &nbsp;&nbsp; charges dismissed, jail, probation)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 156, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_2f', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 165.5 );

$pdf->writeHTMLCell( 91, 5, 12.4, 170.4, '', 'B', 1, false, true, 'L', true );

//***?.........................<><>........................................

//***..........................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>3.a.   </b> Why were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 178, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3a', 84.3, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 184 );
//***..........................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>3.b.   </b> Date of arrest, citation, detention, or charge (mm/dd/yyyy)</div>';
$pdf->writeHTMLCell( 100, 0, 12, 191.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3b', 37, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 66, 197.5 );
//*** //***...............
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div>Where were you arrested, cited, detained, or charged?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 205.5, $html, '', 0, 0, true, 'L' );
//*** //***...................

$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>3.c.</b> &nbsp; City or Town </div>';
$pdf->writeHTMLCell( 50, 5, 12, 211.5, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3c', 60.5, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 43, 212 );
//*** //***............

$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<b>3.d.</b> &nbsp;&nbsp;State';
$pdf->writeHTMLCell( 60, 0, 12, 220, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'courier', 'B', 10 );
//*** set font

$html = '<select name="part3_3d" size="0.25">';

$html .= '<option > As</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value
$html .= '<option > Ts</option>';
//***Dummy Option Value

$html .= '</select>';
$pdf->writeHTMLCell( 25, 5, 30, 220, $html, '', 0, 0, true, 'L' );

//*** //***..................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>3.e.   </b>&nbsp; Country</div>';
$pdf->writeHTMLCell( 90, 0, 12, 227, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3e', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 232.5 );
//*** //***..................
$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div><b>3.f.   </b>&nbsp;Outcome or disposition (for example, no charges filed, 
<br>      &nbsp;  &nbsp;&nbsp; charges dismissed, jail, probation)</div>';
$pdf->writeHTMLCell( 90, 0, 12, 240, $html, '', 0, 0, true, 'L' );
$pdf->SetFont( 'courier', 'B', 10 );
$pdf->TextField( 'part3_3f', 84, 7, array( 'strokeColor' => array( 64, 64, 64 ), 'lineWidth'=>1, 'borderStyle'=>'solid' ), array(), 19, 249.5 );

//***?.............<<4th page first column done>> .............

$pdf->SetFont( 'times', '', 9.9 );
//*** set font
$html = '<div>Have you <b>EVER:</b
></div>';
$pdf->writeHTMLCell( 90, 0, 112, 18, $html, '', 0, 0, true, 'L' );
//***...............

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.a.   &nbsp;  </b>    Engaged in, or do you intend to engage in, prostitution or  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
procurement of prostitution? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 27, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_4a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_4a_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 32, $html, '', 0, 0, true, 'L' );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.b.   &nbsp;  </b>    Engaged in any unlawful commercialized vice, including,   <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
but not limited to, illegal gambling? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 37.4, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_4b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_4b_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 42.7, $html, '', 0, 0, true, 'L' );
//***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.c.   &nbsp;  </b>    Knowingly encouraged, induced, assisted, abetted, or  <br>      &nbsp; &nbsp; &nbsp; &nbsp;   aided any alien to try to enter the United States illegally? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 48.5, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_4c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_4c_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 58, $html, '', 0, 0, true, 'L' );
//*** //***.........

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>4.d.   &nbsp;  </b>     Illicitly trafficked in any controlled substance or knowingly
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
assisted, abetted, or colluded in the illicit trafficking of any 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 controlled substance?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 66, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_4d_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_4d_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 75, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Have you <b>EVER</b> committed, planned or prepared, participated
in, threatened to, attempted to, conspired to commit, gathered
information for, or solicited funds for any of the following:
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 82, $html, 0, 1, false, true, 'J', true );

//***........................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.a.   &nbsp;  </b>    Engaged in, or do you intend to engage in, prostitution or  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
procurement of prostitution? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 96, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_5a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_5a_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 101.4, $html, '', 0, 0, true, 'L' );

//***................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.b.   &nbsp;  </b>     Seizing or detaining, and threatening to kill, injure, or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
continue to detain, another individual in order to compel a 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 third person (including a governmental organization) to <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 do or abstain from doing any act as an explicit or implicit 
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
  condition for the release of the individual seized or <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; detained? </div>';
$pdf->writeHTMLCell( 100, 0, 112, 110, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_5b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_5b_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 131, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.c.   &nbsp;  </b>    Assassination? </div>';
$pdf->writeHTMLCell( 90, 0, 112, 137, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_5c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_5c_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 137.5, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.d.   &nbsp;  </b>    The use of any firearm with intent to endanger, directly or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
indirectly, the safety of one or more individuals or to 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 cause substantial damage to property?</div>';
$pdf->writeHTMLCell( 100, 0, 112, 144, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_5d_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_5d_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 156, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>5.e.   &nbsp;  </b>     The use of any biological agent, chemical agent, nuclear 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
weapon or device, explosive, or other weapon or  
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 dangerous device, with intent to endanger, directly or <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 indirectly, the safety of one or more individuals or to
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
  cause substantial damage to property?  </div>';
$pdf->writeHTMLCell( 100, 0, 112, 163, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_5e_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_5e_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 182.5, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.7 );
$html = '<div>Have you <b>EVER</b> been a member of, solicited money or members
for, provided support for, attended military training (as defined in
section 2339D(c)(1) of Title 18, United States Code) by or on
behalf of, or been associated with any other group of two or
more individuals, whether organized or not, which has been
designated as, or has engaged in or has a subgroup which has
been designated as, or has engaged in:
</div>';
$pdf->writeHTMLCell( 90, 7, 112, 188, $html, 0, 1, false, true, 'J', true );

//***........................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.a.   &nbsp;  </b>  A terrorist organization under section 219 of the INA?
</div>';
$pdf->writeHTMLCell( 90, 0, 112, 218, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_6a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6a_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 223, $html, '', 0, 0, true, 'L' );

//***.................
$pdf->SetFont( 'times', '', 9.7 );
$html = '<div><b>6.b.   &nbsp;  </b>    Hijacking or sabotage of any conveyance (including an  <br>      &nbsp; &nbsp; &nbsp; &nbsp;  
aircraft, vessel, or vehicle)?</div>';
$pdf->writeHTMLCell( 90, 0, 112, 228.7, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_6b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6b_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 170, 234.5, $html, '', 0, 0, true, 'L' );

//***!.......... <<< 4th page End >>> ................

//***! add a page <<5th page starts>>.................
$pdf->AddPage( 'P', 'LETTER' );
//*** page number 1
//***.............

$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 3. Processing Information</b>(continued)</div>';
$pdf->writeHTMLCell( 90, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//***...........

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.c.   &nbsp;  </b>     Seizing or detaining, and threatening to kill, injure, or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
continue to detain, another individual in order to compel a 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 third person (including a governmental organization) to <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 do or abstain from doing any act as an explicit or implicit
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
  condition for the release of the individual seized or <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; detained?
  </div>';
$pdf->writeHTMLCell( 100, 0, 12, 28, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_6c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6c_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 47.7, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.d.   &nbsp;  </b>    Assassination? </div>';
$pdf->writeHTMLCell( 90, 0, 12, 55, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_6d_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6d_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 55.7, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.e.   &nbsp;  </b>    The use of any firearm with intent to endanger, directly or 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
indirectly, the safety of one or more individuals or to 
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 cause substantial damage to property?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 63, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_6e_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6e_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 74, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.f.   &nbsp;  </b>     The use of any biological agent, chemical agent, nuclear 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
weapon or device, explosive, or other weapon or   dangerous
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 device, with intent to endanger, directly or indirectly, the <br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
 safety of one or more individuals or to cause substantial
  <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
   damage to property?  </div>';
$pdf->writeHTMLCell( 100, 0, 12, 81, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_6f_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6f_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 98, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>6.g.   &nbsp;  </b>    TSoliciting money or members or otherwise providing 
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
material support to a terrorist organization?
</div>';
$pdf->writeHTMLCell( 100, 0, 12, 103.6, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_6g_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_6g_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 112, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Do you intend to engage in the United States in:
</div>';
$pdf->writeHTMLCell( 100, 0, 12, 117.8, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>7.a.   &nbsp;  </b>Espionage?</div>';
$pdf->writeHTMLCell( 90, 0, 12, 124.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_7a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_7a_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 125, $html, '', 0, 0, true, 'L' );

//***................

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>7.b.   &nbsp;  </b>Any unlawful activity, or any activity the purpose of
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
which is in opposition to, or the control, or overthrow of
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 the government of the United States?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 132, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_7b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_7b_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 142.5, $html, '', 0, 0, true, 'L' );
//***.......................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>7.c.   &nbsp;  </b>  Solely, principally, or incidentally in any activity related
<br>      &nbsp;  &nbsp; &nbsp;  &nbsp; 
to espionage or sabotage or to violate any law involving
 <br>      &nbsp; &nbsp;  &nbsp; &nbsp;  
 the export of goods, technology, or sensitive information?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 149, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_7c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_7c_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 161.5, $html, '', 0, 0, true, 'L' );

//***.......................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>8.   &nbsp;  </b>   Have you <b>EVER</b> been or do you continue to be a member 
<br>      &nbsp;  &nbsp; &nbsp;   
of the Communist or other totalitarian party, except when 
 <br>      &nbsp; &nbsp;  &nbsp; 
 membership was involuntary?</div>';
$pdf->writeHTMLCell( 100, 0, 12, 167, $html, '', 0, 0, true, 'L' );

$html = '<div><input type="checkbox" name="part3_8_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_8_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 176, $html, '', 0, 0, true, 'L' );
//***.......................

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>9.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 184, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Have you EVER, during the period of March 23, 1933 <br>
to May 8, 1945, in association with either the Nazi<br>
Government of Germany or any organization or<br>
government associated or allied with the Nazi<br>
Government of Germany, ordered, incited, assisted or<br>
otherwise participated in the persecution of any person<br>
because of race, religion, nationality, membership in a<br>
particular social group, or political opinion?</div>';
$pdf->writeHTMLCell( 90, 0, 18, 184, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_9_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_9_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 216, $html, '', 0, 0, true, 'L' );
//*** //***.......................

//***?....5th page 1st column completed............//***

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Have you EVER ordered, incited, called for, committed, assisted,
helped with, or otherwise participated in any of the following:</div>';
$pdf->writeHTMLCell( 100, 0, 112, 18, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 29, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Acts involving torture or genocide?</div>';
$pdf->writeHTMLCell( 90, 0, 121, 29, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_10a_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 29, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 37, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Killing any person?</div>';
$pdf->writeHTMLCell( 90, 0, 121, 37, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_10b_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 37, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 44, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Intentionally and severely injuring any person?
</div>';
$pdf->writeHTMLCell( 90, 0, 121, 44, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
              <input type="checkbox" name="part3_10c_n_currently_active" value="N" checked=" " />   No 
</div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 48, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.d.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 53, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Engaging in any kind of sexual conduct or relations  with<br>
any person who was being forced or threatened?
 </div>';
$pdf->writeHTMLCell( 90, 0, 121, 53, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10d_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_10d_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 61.5, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.e.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 67, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Limiting or denying any person's ability to exercise <br>
religious beliefs? 
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 67, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10e_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox"name="part3_10e_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 72, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.f.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 77.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>The persecution of any person because of race, religion, <br>
national origin, membership in a particular social group, <br>or political opinion?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 77.7, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10f_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox"name="part3_10f_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 86, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>10.g.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 92.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Displacing or moving any person from their residence by<br>
force, threat of force, compulsion, or duress?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 92.7, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_10g_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox"name="part3_10g_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 102, $html, '', 0, 0, true, 'L' );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div><b>NOTE:</b> If you answered 'Yes' to any question in <b>Item
Numbers 10.a. - 10.g.</b>, please describe the circumstances in
<b>Part 8. Additional Information.</b>
</div>";
$pdf->writeHTMLCell( 90, 0, 112, 108, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>11.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 122, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> advocated that another person commit<br>
any of the acts described in the preceding question, urged,<br>or encouraged another person, to commit such acts?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 122, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_11_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_11_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 134, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> been present or nearby when any person was:
 </div>";
$pdf->writeHTMLCell( 90, 0, 112, 142, $html, '', 0, 0, true, 'L' );
//***..............
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>12.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 149, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Intentionally killed, tortured, beaten, or injured?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 149, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox" name="part3_12a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_12a_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 155, $html, '', 0, 0, true, 'L' );
//***..............
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>12.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 161, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Displaced or moved from his or her residence by force,<br>
compulsion, or duress?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 161, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_12b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_12b_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 166, $html, '', 0, 0, true, 'L' );
//***..............
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>12.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 172, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>In any way compelled or forced to engage in any kind of<br>
sexual contact or relations?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 172, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_12c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_12c_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 177, $html, '', 0, 0, true, 'L' );
//***......................

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER:</b>
 </div>";
$pdf->writeHTMLCell( 90, 0, 112, 186, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>13.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 193, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Served in, been a member of, assisted in, or participated <br>
in any military unit, paramilitary unit, police unit, self- <br>defense unit, vigilante unit, rebel group, guerilla group,<br>
militia, or other insurgent organization?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 193, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_13a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_13a_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 210, $html, '', 0, 0, true, 'L' );



//***! add a page <<6th page starts>>.................


$pdf->AddPage( 'P', 'LETTER' );
$pdf->SetFont( 'times', '', 12 );
$pdf->SetFillColor( 220, 220, 220 );
$pdf->setCellPaddings( 1, 1, 0, 1 );

$html = '<div><b>Part 3. Processing Information</b>(continued)</div>';
$pdf->writeHTMLCell( 92, 7, 13, 19, $html, 1, 1, true, false, 'L', true );
//***...........

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>13.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 27, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Served in any prison, jail, prison camp, detention facility,<br>
labor camp, or any other situation that involved detaining<br>
persons?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 27, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_13b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_13b_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 36.7, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>13.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 42.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Served in, been a member of, assisted in, or participated<br>
in any group, unit, or organization of any kind in which <br>
you or other persons transported, possessed, or used any <br>
type of weapon?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 42.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_13c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_13c_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 54.7, $html, '', 0, 0, true, 'L' );
//**........................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE: </b>If you answered "Yes" to any question in<b> Item<br>
Numbers 13.a. - 13.c.</b>, please describe the circumstances in<br>
<b>Part 8. Additional Information.</b>
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 61.5, $html, '', 0, 0, true, 'L' );
//**........................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Have you <b>EVER:</b
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 77.2, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>14.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 83.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Received any type of military, paramilitary, or weapons <br>
training?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 83.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_14a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_14a_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 87.7, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>14.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 94, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Been a member of, assisted in, or participated in any<br>
group, unit, or organization of any kind in which you or<br>
other persons used any type of weapon against any person<br>
or threatened to do so?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 94, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_14b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_14b_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 106.5, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>14.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 112.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Assisted or participated in selling or providing weapons to<br>
any person who to your knowledge used them against<br>
another person, or in transporting weapons to any person<br>
who to your knowledge used them against another<br>
person?             

 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 112.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_14c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_14c_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 129.5, $html, '', 0, 0, true, 'L' );
//**........................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>NOTE: </b>If you answered "Yes" to any question in<b> Item<br>
Numbers 14.a. - 14.c.</b>, please describe the circumstances in<br>
<b>Part 8. Additional Information.</b>
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 139.5, $html, '', 0, 0, true, 'L' );

//**........................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div>Have you <b>EVER:</b
 </div>';
$pdf->writeHTMLCell( 90, 0, 12, 155.2, $html, '', 0, 0, true, 'L' );

//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>15.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 161.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Recruited, enlisted, conscripted, or used any person under <br>
15 years of age to serve in or help an armed force or group?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 161.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_15a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_15a_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 170, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>15.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 176.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Used any person under 15 years of age to take part in<br>
hostilities, or to help or provide services to people in<br>
combat?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 176.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_15b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_15b_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 185, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>16.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 191.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Are you <b>NOW</b> in removal, exclusion, rescission, or<br>
deportation proceedings?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 191.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_16_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_16_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 196, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>17.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 202.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> had removal, exclusion, rescission, or<br>
deportation proceedings initiated against you?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 202.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_17_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_17_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 211, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>18.</b></div>';
$pdf->writeHTMLCell( 100, 0, 12, 217.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> been removed, excluded, or deported<br>
from the United States?
 </div>";
$pdf->writeHTMLCell( 90, 0, 21, 217.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_18_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_18_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 74.6, 222, $html, '', 0, 0, true, 'L' );

//? 6th page 1st column done...............
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>19.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 17.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> been ordered to be removed, excluded,<br>
or deported from the United States?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 17.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_19_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_19_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 22, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>20.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 30.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> been ordered to be removed, excluded,<br>
or deported from the United States?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 30.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_20_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_20_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 174.6, 36, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>21.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 42.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you<b> EVER</b> been granted voluntary departure by an<br>
immigration officer or an immigration judge and failed to<br>
depart within the allotted time?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 42.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_21_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_21_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 51.8, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>22.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 57.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Are you<b> NOW</b> under a final order or civil penalty for<br>
violating section 274C of the INA (producing and/or<br>
using false documentation to unlawfully satisfy a<br>
requirement of the INA)?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 57.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_22_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_22_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 70.8, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>23.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 76.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b>, by fraud or willful misrepresentation of<br>
a material fact, sought to procure or procured a visa or<br>
other documentation, for entry into the United States or<br>
any immigration benefit?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 76.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_23_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_23_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 89.2, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>24.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 95.5, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you<b> EVER </b>left the United States to avoid being<br>
drafted into the U.S. Armed Forces or U.S. Coast Guard?<br>
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 95.5, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_24_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_24_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 103.4, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>25.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 109, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> been a J nonimmigrant exchange visitor<br>
who was subject to the 2-year foreign residence<br>
requirement and not yet complied with that requirement<br>
or obtained a waiver of such?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 109, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_25_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_25_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 122.2, $html, '', 0, 0, true, 'L' );
//***................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>26.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 128.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER</b> detained, retained, or withheld the<br>
custody of a child, having a lawful claim to United States<br>
citizenship, outside the United States from a United States<br>
citizen granted custody?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 128.6, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_26_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_26_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 141.2, $html, '', 0, 0, true, 'L' );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>27.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 148.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Do you plan to practice polygamy in the United States?
 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 148.6, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_27_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_27_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 153.5, $html, '', 0, 0, true, 'L' );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>28.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 160.6, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Have you <b>EVER </b>entered the United States as a stowaway?

 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 160.6, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_28_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_28_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 165.5, $html, '', 0, 0, true, 'L' );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>29.a.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 170.7, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Do you <b>NOW</b> have a communicable disease of public<br>
health significance?

 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 170.7, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_29a_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_29a_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 176.5, $html, '', 0, 0, true, 'L' );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>29.b.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 183.2, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Do you <b>NOW</b> have or have you <b>EVER</b> had a physical or<br>
mental disorder and behavior (or a history of behavior<br>
that is likely to recur) associated with the disorder which<br>
has posed or may pose a threat to the property, safety, or<br>
welfare of yourself or others?

 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 183.2, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_29b_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_29b_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 200, $html, '', 0, 0, true, 'L' );
//***..................
$pdf->SetFont( 'times', '', 9.9 );
$html = '<div><b>29.c.</b></div>';
$pdf->writeHTMLCell( 100, 0, 112, 206, $html, '', 0, 0, true, 'L' );

$pdf->SetFont( 'times', '', 9.9 );
$html = "<div>Are you <b>NOW</b> or have you<b> EVER </b>been a drug abuser or<br>
drug addict?

 </div>";
$pdf->writeHTMLCell( 90, 0, 121, 206, $html, '', 0, 0, true, 'L' );
$html = '<div><input type="checkbox"  name="part3_29c_y_currently_active" value="Y" checked=" " />   Yes &nbsp; &nbsp; 
               <input type="checkbox" name="part3_29c_n_currently_active" value="N" checked=" " />   No 
 </div>';
$pdf->writeHTMLCell( 60, 0, 175.5, 212, $html, '', 0, 0, true, 'L' );






$js = "
var fields = {
'Attorney_or_According_Representative':' ',
'attorney_state_bar_number' : ' ',
'part1_1a_lastname':' ',
'part1_1b_firstname':' ',
'part1_1c_middlename':' ',
'part1_2a_lastname':' ',
'part1_2b_firstname':' ',
'part1_2c_middlename':' ',
'part1_3a_street_number': ' ',
'part1_3b_apt_ste':' ',
'part1_3c_city_town':' ',
'part1_3d_state' : ' ',
'part1_3e_zip_code' : ' ',
'part1_3f_province':' ',
'part1_3g_Postal Code' :' ',
'part1_3h_Country':' ',
'part1_4a_Care Of Name':' ',
'part1_4b_street_number': ' ',
'part1_4c_apt_ste' :' ',
'part1_4d_city_town':' ',
'part1_4e_state': ' ',
'part1_4f_zip_code':' ',
'part1_4g_province':' ',
'part1_4h_Postal Code':' ',
'part1_5_registration_Number':' ',
'part1_6_social_security':' ',
'part1_7_online_account':' ',
'table_2_CheckBox':' ',
'3b_Ste':' ',
'3b_Apt':' ',
'3b_Flr':' ',
'4c_Apt':' ',
'4c_Ste':' ',
'4c_Flr':' ',
'8_Single':' ',
'8_Married':' ',
'8_Divorced':' ',
'8_Widowed':' ',
'part1_10_date_of_birth':' ',
'part1_11_Country_of_birth':' ',
'part1_12_Country_of_Citizenship':' ',
'part1_13_Arrival_Departure':' ',
'part1_14_Passport Number':' ',
'part1_15_Travel_Document_Number':' ',
'part1_16_Country_of_Issuance':' ',
'part1_17_Date_of_Issuance':' ',
'part1_18_Expiration_Date':' ',
'part1_19b_state':' ',
'part1_19a_city_or_town':' ',
'part1_20_Date_of_LastEntry':' ',
'part1_21_Date_ Authorized':' ',
'part1_21_Current':' ',



'part2_1_y_currently_active':' ',
'part2_1_n_currently_active':' ',
'part2_2_y_currently_active':' ',
'part2_2_n_currently_active':' ',
'part2_3_y_currently_active':' ',
'part2_3_n_currently_active':' ',
'part2_4_y_currently_active':' ',
'part2_4_n_currently_active':' ',
'part2_5_y_currently_active':' ',
'part2_5_n_currently_active':' ',
'part2_6_y_currently_active':' ',
'part2_6_n_currently_active':' ',
'part2_7_y_currently_active':' ',
'part2_7_n_currently_active':' ',
'part2_8a_date_of_Entry':' ',
'part2_8b_city_or_town':' ',
'part2_8c_state':' ',
'part2_8d_status':' ',
'part2_9a_date_of_Entry':' ',
'part2_9b_city_or_town':' ',
'part2_9c_state':' ',
'part2_9d_status':' ',
'part2_10a_date_of_Entry':' ',
'part2_10b_city_or_town':' ',
'part2_10c_state':' ',
'part2_10d_status':' ',
'part2_11a_Port_of_Entry':' ',
'part2_11a_ Pre_Flight':' ',
'part2_11a_US_Consulate':' ',
'part2_11b_city_or_town':' ',
'part2_11c_state':' ',
'part2_11d_country':' ',
'part2_12a':' ',
'part2_12b':' ',
'part2_12b_Apt':' ',
'part2_12b_Ste':' ',
'part2_12b_Flr':' ',
'part2_12c_city_town':' ',
'part2_12d_province':' ',
'part2_12e_postal_code':' ',
'part2_12f_country':' ',

'part3_1a_y_currently_active':' ',
'part3_1a_n_currently_active':' ',
'part3_1b_y_currently_active':' ',
'part3_1b_n_currently_active':' ',
'part3_1c_y_currently_active':' ',
'part3_1c_n_currently_active':' ',
'part3_1d_y_currently_active':' ',
'part3_1d_n_currently_active':' ',
'part3_1e_currently_active':' ',
'part3_1e_n_currently_active':' ',
'part3_1f_y_currently_active':' ',
'part3_1f_n_currently_active':' ',
'part3_1g_y_currently_active':' ',
'part3_1g_n_currently_active':' ',
'part3_1h_y_currently_active':' ',
'part3_1h_n_currently_active':' ',
'part3_1i_y_currently_active':' ',
'part3_1i_n_currently_active':' ',
'part3_4a_y_currently_active':' ',
'part3_4a_n_currently_active':' ',
'part3_4b_y_currently_active':' ',
'part3_4b_n_currently_active':' ',
'part3_4c_y_currently_active':' ',
'part3_4c_n_currently_active':' ',
'part3_4d_y_currently_active':' ',
'part3_4d_n_currently_active':' ',
'part3_5a_y_currently_active':' ',
'part3_5a_n_currently_active':' ',
'part3_5b_y_currently_active':' ',
'part3_5b_n_currently_active':' ',
'part3_5c_y_currently_active':' ',
'part3_5c_n_currently_active':' ',
'part3_5d_y_currently_active':' ',
'part3_5d_n_currently_active':' ',
'part3_5e_y_currently_active':' ',
'part3_5e_n_currently_active':' ',
'part3_6a_y_currently_active':' ',
'part3_6a_n_currently_active':' ',
'part3_6b_y_currently_active':' ',
'part3_6b_n_currently_active':' ',
'part3_6c_y_currently_active':' ',
'part3_6c_n_currently_active':' ',
'part3_6d_y_currently_active':' ',
'part3_6d_n_currently_active':' ',
'part3_6e_y_currently_active':' ',
'part3_6e_n_currently_active':' ',
'part3_6f_y_currently_active':' ',
'part3_6f_n_currently_active':' ',
'part3_6g_y_currently_active':' ',
'part3_6g_n_currently_active':' ',
'part3_7a_y_currently_active':' ',
'part3_7a_n_currently_active':' ',
'part3_7b_y_currently_active':' ',
'part3_7b_n_currently_active':' ',
'part3_7c_y_currently_active':' ',
'part3_7c_n_currently_active':' ',
'part3_8_y_currently_active':' ',
'part3_8_n_currently_active':' ',
'part3_9_y_currently_active':' ',
'part3_9_n_currently_active':' ',
'part3_10a_y_currently_active':' ',
'part3_10a_n_currently_active':' ',
'part3_10b_y_currently_active':' ',
'part3_10b_n_currently_active':' ',
'part3_10c_y_currently_active':' ',
'part3_10c_n_currently_active':' ',
'part3_10d_y_currently_active':' ',
'part3_10d_n_currently_active':' ',
'part3_10e_y_currently_active':' ',
'part3_10e_n_currently_active':' ',
'part3_10f_y_currently_active':' ',
'part3_10f_n_currently_active':' ',
'part3_10g_y_currently_active':' ',
'part3_10g_n_currently_active':' ',
'part3_11_y_currently_active':' ',
'part3_11_n_currently_active':' ',
'part3_12a_y_currently_active':' ',
'part3_12a_n_currently_active':' ',
'part3_12b_y_currently_active':' ',
'part3_12b_n_currently_active':' ',
'part3_12c_y_currently_active':' ',
'part3_12c_n_currently_active':' ',
'part3_13a_y_currently_active':' ',
'part3_13a_n_currently_active':' ',
'part3_13b_y_currently_active':' ',
'part3_13b_n_currently_active':' ',
'part3_13c_y_currently_active':' ',
'part3_13c_n_currently_active':' ',
'part3_14a_y_currently_active':' ',
'part3_14a_n_currently_active':' ',
'part3_14b_y_currently_active':' ',
'part3_14b_n_currently_active':' ',
'part3_14c_y_currently_active':' ',
'part3_14c_n_currently_active':' ',
'part3_15a_y_currently_active':' ',
'part3_15a_n_currently_active':' ',
'part3_15b_y_currently_active':' ',
'part3_15b_n_currently_active':' ',
'part3_16_y_currently_active':' ',
'part3_16_n_currently_active':' ',
'part3_17_y_currently_active':' ',
'part3_17_n_currently_active':' ',
'part3_18_y_currently_active':' ',
'part3_18_n_currently_active':' ',
'part3_19_y_currently_active':' ',
'part3_19_n_currently_active':' ',
'part3_20_y_currently_active':' ',
'part3_20_n_currently_active':' ',
'part3_21_y_currently_active':' ',
'part3_21_n_currently_active':' ',
'part3_22_y_currently_active':' ',
'part3_22_n_currently_active':' ',
'part3_23_y_currently_active':' ',
'part3_23_n_currently_active':' ',
'part3_24_y_currently_active':' ',
'part3_24_n_currently_active':' ',
'part3_25_y_currently_active':' ',
'part3_25_n_currently_active':' ',
'part3_26_y_currently_active':' ',
'part3_26_n_currently_active':' ',
'part3_27_y_currently_active':' ',
'part3_27_n_currently_active':' ',
'part3_28_y_currently_active':' ',
'part3_28_n_currently_active':' ',
'part3_29a_y_currently_active':' ',
'part3_29a_n_currently_active':' ',
'part3_29b_y_currently_active':' ',
'part3_29b_n_currently_active':' ',
'part3_29c_y_currently_active':' ',
'part3_29c_n_currently_active':' ',
'part3_2a':' ',
'part3_2b':' ',
'part3_2c':' ',
'part3_2d':' ',
'part3_2e':' ',
'part3_2f':' ',
'part3_3a':' ',
'part3_3b':' ',
'part3_3c':' ',
'part3_3d':' ',
'part3_3e':' ',
'part3_3f':' ',
' ':' ',
' ':' ',
' ':' ',
' ':' ',
' ':' ',


//*** ?Exixting




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

//*** $pdf->lastPage();
//***Close and output PDF document
$pdf->Output( 'I-539.pdf', 'I' );